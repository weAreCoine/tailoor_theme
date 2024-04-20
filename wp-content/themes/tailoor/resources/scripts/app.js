import domReady from '@roots/sage/client/dom-ready';
import Alpine from 'alpinejs';
import collapse from '@alpinejs/collapse'
import '@splidejs/splide/css/core';
import Splide from "@splidejs/splide";
import {AutoScroll} from '@splidejs/splide-extension-auto-scroll';
import {gsap} from "gsap";

import {ScrollTrigger} from "gsap/ScrollTrigger";

/**
 * HOME ANIMATIONS
 */
gsap.registerPlugin(ScrollTrigger);

gsap.timeline({
  scrollTrigger: {
    trigger: document.querySelector('#products__carousel__container').closest('section'),
    start: 'top top',
    end: 'bottom top',
    markers: false,
    scrub: 1,
    pin: document.querySelector('#products__carousel__container').closest('section'),
    snap: {
      snapTo: [0, .25, .5, .75, 1],
      duration: {min: .1, max: .4},
      directional: false,
    },
    invalidateOnRefresh: true,
    anticipatePin: true,
    pinSpacing: true,
  }
}).fromTo(
  '#products__carousel__container #screen__carousel img',
  {x: '-40%', ease: "none"},
  {x: '40%', ease: "none"}
);
gsap.from('#benefits__img', {
  opacity: 0,
  y: '-75%',
  scrollTrigger: {
    trigger: '#benefits__img',
    start: 'top bottom',
    end: 'top 50%',
    scrub: 1,
    markers: false,
    invalidateOnRefresh: true,
  }
});
let currentTab = 0;
gsap.timeline({
  scrollTrigger: {
    trigger: document.querySelector('#phygital'),
    start: 'top top',
    end: 'bottom top',
    markers: false,
    scrub: 1,
    pin: document.querySelector('#phygital > .container'),
    snap: {
      snapTo: [0, .3333, .6666, 1],
      duration: {min: .1, max: .4},
      directional: true,
    },
    onUpdate({progress}) {
      let currentRealTab = Math.floor(progress / .33);
      if (currentRealTab !== currentTab) {
        currentTab = currentRealTab;
        console.log(progress)
        let changeTabEvent = new CustomEvent('home-new-tab', {
          detail: {currentTab: currentTab},
          bubbles: true,
        });
        window.dispatchEvent(changeTabEvent);
      }
    },
    invalidateOnRefresh: true,
    anticipatePin: true,
    pinSpacing: true,
  }
})
window.Alpine = Alpine;
Alpine.plugin(collapse);
window.Splide = Splide;
window.SplideAutoscroll = AutoScroll;
Alpine.data('mainNavigation', () => ({
  open: false,
  isLargeScreen: window.innerWidth >= 1024,
  bind(component) {
    component.querySelectorAll('li > a').forEach(element => element.addEventListener('click', () => this.open = false));
  }
}));

Alpine.data('modal', (visible, name) => ({
  visible,
  name,
  body: null,
  onChangeVisibility(value) {
    if (this.body === null) {
      this.body = document.querySelector('body');
      console.log('entrato')
    }
    if (value) {
      this.body.classList.add('not-scroll');
    } else {
      this.body.classList.remove('not-scroll');
    }
  }
}))

Alpine.data('steps', (json) => ({
  contents: JSON.parse(json),
  selected: 0
}));

Alpine.data('bindSlider', () => ({
  init() {
    new Splide('.splide', {
      type: 'loop',
      drag: 'free',
      // snap: true,
      arrows: false,
      autoScroll: {
        speed: 1,
        //Attivando pauseOnHover si verifica un bug: se la finestra non ha focus all'hover l'animazione accelera
        pauseOnHover: false,
        rewindSpeed: 1,
      },
      pagination: false,
      lazyLoad: true,
      autoWidth: true,
      gap: '4rem',
      reducedMotion: {
        speed: 0,
        rewindSpeed: 0,
        autoplay: 'pause'
      }
    }).mount({AutoScroll});

  }
}));

Alpine.data('animateOnMouseMove', (image, positiveDirectionX, positiveDirectionY) => ({
  image,
  maxMovement: 20,
  velocityX: 0,
  velocityY: 0,
  maxWidth: 0,
  positiveDirectionX,
  positiveDirectionY,
  maxHeight: 0,
  gap: 0,
  coordinates: {},
  init() {
    this.maxHeight = window.innerHeight;
    this.maxWidth = window.innerWidth;
    this.velocityX = this.maxMovement / (window.innerWidth / 2);
    this.velocityY = this.maxMovement / (window.innerHeight / 2);

    document.addEventListener('mousemove', (e) => this.mouseMove(e));
    window.addEventListener('resize', this.debounceOnResize(this, this.init, 500));

  },
  debounceOnResize(context, func, delay) {
    let inDebounce;
    return () => {
      const args = arguments;
      clearTimeout(inDebounce);
      inDebounce = setTimeout(() => func.apply(context, args), delay);
    };
  },
  mouseMove(e) {
    const scrollY = window.scrollY || window.pageYOffset;
    let xOffset = Math.min(this.maxMovement, Math.max(-this.maxMovement, (e.pageX - this.maxWidth / 2) * this.velocityX)),
      yOffset = Math.min(this.maxMovement, Math.max(-this.maxMovement, (e.pageY - scrollY - window.innerHeight / 2) * this.velocityY));

    if (!this.positiveDirectionX) {
      xOffset = -xOffset;
    }
    if (!this.positiveDirectionY) {
      yOffset = -yOffset;
    }

    this.image.style.transform = `translate(${xOffset}px, ${yOffset}px)`;
  }
}));

Alpine.data('getInTouchForm', (formFields) => ({
  formFields,
  submitting: false,
  termsError: false,
  submit(button) {
    this.termsError = false;
    const form = button.closest('form');
    if (!this.formFields.privacy) {
      this.termsError = true;
    }
    if (form.reportValidity()) {
      this.submitting = true;
      form.submit();
    }
  }
}));


Alpine.start();
/**
 * Application entrypoint
 */
domReady(async () => {
  // ...
});

/**
 * @see {@link https://webpack.js.org/api/hot-module-replacement/}
 */
if (import.meta.webpackHot) import.meta.webpackHot.accept(console.error);

document.addEventListener('DOMContentLoaded', function () {

  /**
   * Trigger per l'apertura della modale di iscrizione alla demo
   */
  document.querySelectorAll('.demo_request a').forEach(function (toggle) {
    toggle.addEventListener('click', function (event) {
      event.preventDefault();
      const requestModalFormEvent = new CustomEvent('request-modal', {
        detail: {
          modalName: 'get__in__touch__form'
        }
      });
      window.dispatchEvent(requestModalFormEvent);
    });
  });

});
window.addEventListener('load', function () {
  /**
   * Mostra gli elementi che devono essere visibili al Window Load
   */
  document.querySelectorAll('.to__show__on__window__load').forEach(function (element) {
    element.classList.remove('to__show__on__window__load');
  });
})
