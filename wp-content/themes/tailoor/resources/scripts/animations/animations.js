import {gsap} from "gsap";

import {ScrollTrigger} from "gsap/ScrollTrigger";

gsap.registerPlugin(ScrollTrigger);
export const TailoorAnimations = {
  bind() {
    if (tailoor.needAnimations === '1') {
      this.home();
    }
  },
  home() {
    const productCarousel = document.querySelector('#products__carousel__container');

    gsap.matchMedia().add(`(min-height: 650px)`, () => {
      gsap.timeline({
        scrollTrigger: {
          trigger: productCarousel,
          start: '50% 50%',
          end: 'bottom top',
          markers: false,
          scrub: 1,
          pin: productCarousel,
          snap: {
            snapTo: [0, .25, .5, .75, 1],
            duration: {min: .1, max: .4},
            directional: true,
          },
          invalidateOnRefresh: true,
          anticipatePin: true,
          pinSpacing: true,
          onUpdate({progress}) {
            let currentTab = Math.floor(progress / .25);
            let changeTabEvent = new CustomEvent('home-product-new-tab', {
              detail: {currentTab: currentTab},
              bubbles: true,
            });
            window.dispatchEvent(changeTabEvent);
          },
        },
      });
    });
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
    gsap.from('#reports__img', {
      opacity: 0,
      x: '-75%',
      scrollTrigger: {
        trigger: '#reports__img',
        start: 'top bottom',
        end: 'top 50%',
        scrub: 1,
        markers: false,
        invalidateOnRefresh: true,
      }
    });
    gsap.from('.tailoor__touch', {
      opacity: 0,
      x: '75%',
      scrollTrigger: {
        trigger: '.tailoor__touch',
        start: 'top bottom',
        end: 'top top',
        scrub: 1,
        markers: false,
        invalidateOnRefresh: true,
      }
    });

    gsap.matchMedia().add(`(min-height: 1200px)`, () => {

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
            duration: 0,
            directional: true,
          },
          onUpdate({progress}) {
            let currentRealTab = Math.floor(progress / .33);
            if (currentRealTab !== currentTab) {
              currentTab = currentRealTab;
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
      });
    });
  }
};
