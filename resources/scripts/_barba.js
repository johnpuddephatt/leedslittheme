import barba from '@barba/core';

export default function setupBarba() {
  let wipe = document.querySelector('.pageload--wipe circle');

  try {
    barba.hooks.before(() => {
      // navTrigger.checked = false;
      barba.wrapper.classList.add('is-animating');
    });

    barba.hooks.after(() => {
      barba.wrapper.classList.remove('is-animating');
      document.body.className = document.querySelector(
        '[data-barba="container"]',
      ).dataset.barbaClass; // copy new classes onto body class

      document
        .querySelector('meta[property="og:image"]')
        .setAttribute(
          'content',
          document.querySelector('[data-barba="container"]').dataset.ogimage,
        );
      document
        .querySelector('meta[property="og:title"]')
        .setAttribute(
          'content',
          document.querySelector('[data-barba="container"]').dataset.ogtitle,
        );
      document
        .querySelector('meta[property="og:description"]')
        .setAttribute(
          'content',
          document.querySelector('[data-barba="container"]').dataset
            .ogdescription,
        );
      // window.routes.loadEvents();
      // window.gtag('config', 'G-1XNVY0FD6J', {'page_path': window.location.pathname});
      // window.gtag('set', 'page', window.location.pathname);
      // window.gtag('send', 'pageview');
    });

    barba.hooks.enter(() => {
      history.scrollRestoration = 'manual';
      // if (window.location.hash) {
      //   let hash = window.location.hash.substring(1);
      //   let el = document.getElementById(hash);
      //   if (el) {
      //     el.scrollIntoView({ behavior: 'smooth' });
      //   }
      // }
    });

    barba.init({
      debug: true,
      transitions: [
        {
          name: 'new',
          from: {
            custom: ({ trigger }) => {
              return trigger != 'back' && trigger != 'forward';
            },
          },
          sync: true,
          leave() {
            setTimeout(() => {
              wipe.removeAttribute('class');
            }, 1000);
            return new Promise((resolve) => {
              setTimeout(() => {
                window.scrollTo(0, 0);
                resolve();
              }, 500);
            });
          },
          enter() {
            // return new Promise((resolve) => {
            //   setTimeout(() => {
            //     console.log('enter');
            //     resolve();
            //   }, 0);
            // });
          },
          before(e) {
            if (e.trigger) {
              let triggerBounds = e.trigger.getBoundingClientRect();
              wipe.setAttribute(
                'cx',
                triggerBounds.x + triggerBounds.width / 2 || 0,
              );
              wipe.setAttribute(
                'cy',
                triggerBounds.y + triggerBounds.height / 2 || 0,
              );
              wipe.setAttribute('class', 'triggered');
            }
          },
          afterLeave() {
            // barba.wrapper.scrollTop = 0;
          },
          after() {
            // wipe.removeAttribute('class');
          },
        },
      ],
    });
  } catch (err) {
    console.error(err);
  }
}
