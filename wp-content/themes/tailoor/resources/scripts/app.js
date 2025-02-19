import domReady from '@roots/sage/client/dom-ready';
import Alpine from 'alpinejs';
import collapse from '@alpinejs/collapse'
import '@splidejs/splide/css/core';
import Splide from "@splidejs/splide";
import {AutoScroll} from '@splidejs/splide-extension-auto-scroll';
import {TailoorAnimations} from './animations/animations.js'
import 'highlight.js/styles/tokyo-night-dark.min.css';
// Using ES6 import syntax
import hljs from 'highlight.js';
import Player from '@vimeo/player'

window.hljs = hljs;
TailoorAnimations.bind();

window.Alpine = Alpine;
Alpine.plugin(collapse);
window.Splide = Splide;
window.SplideAutoscroll = AutoScroll;
Alpine.data('mainNavigation', () => ({
  open: true,
  isLargeScreen: window.innerWidth >= 1024,
  bind(component) {
    this.isLargeScreen = window.innerWidth >= 1024;
    component.querySelectorAll('li:not(.menu-item-has-children) > a')
      .forEach(element => element.addEventListener('click', () => this.open = false));

    component.querySelectorAll('li.menu-item-has-children > a')
      .forEach(element => element.addEventListener('click', (event) => {
        event.preventDefault();
        if (window.innerWidth < 1024) {
          element.closest('li').classList.toggle('mobile-opened');
        } else {
          element.closest('li').classList.remove('mobile-opened');
        }
      }));
  }
}));

Alpine.data('modal', (visible, name) => ({
  visible,
  name,
  body: null,
  visibleForTheFirstTime: true,
  onChangeVisibility(value) {
    if (this.visibleForTheFirstTime) {
      this.visibleForTheFirstTime = false;
    }
    if (this.body === null) {
      this.body = document.querySelector('body');
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

Alpine.data('bindSlider', (id, gap = '4rem', pauseOnHover = false) => ({
  id,
  gap,
  pauseOnHover,
  init() {
    new Splide(`#${id}`, {
      type: 'loop',
      drag: 'free',
      // snap: true,
      arrows: false,
      autoScroll: {
        speed: 1,
        //Attivando pauseOnHover si verifica un bug: se la finestra non ha focus all'hover l'animazione accelera
        pauseOnHover: this.pauseOnHover,
        rewindSpeed: 1,
      },
      pagination: false,
      lazyLoad: true,
      autoWidth: true,
      gap: this.gap,
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
  hasTouch: false,
  gap: 0,
  coordinates: {},
  init() {
    if (!this.isTouchDevice()) {
      this.maxHeight = window.innerHeight;
      this.maxWidth = window.innerWidth;
      this.velocityX = this.maxMovement / (window.innerWidth / 2);
      this.velocityY = this.maxMovement / (window.innerHeight / 2);

      document.addEventListener('mousemove', (e) => this.mouseMove(e));
      window.addEventListener('resize', this.debounceOnResize(this, this.init, 500));
    }
  },
  isTouchDevice() {
    return (('ontouchstart' in window) ||
      (navigator.maxTouchPoints > 0) ||
      (navigator.msMaxTouchPoints > 0));
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
