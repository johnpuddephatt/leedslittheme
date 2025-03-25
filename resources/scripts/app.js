import { createOrbits, setupCanvas } from './hero/Orbits';
import domReady from '@roots/sage/client/dom-ready';
import Alpine from 'alpinejs';
import setupBarba from './_barba';
import { createGradient } from './hero/Gradient';
window.Alpine = Alpine;

document.addEventListener('alpine:init', () => {
  Alpine.data('homeHero', () => ({
    init() {
      createGradient(
        '#hero-gradient',
        ['#FF7CE7', '#FF7CE7', '#0079CF', '#86b4db'],
        [0.06, 0.16],
      );

      createOrbits(document.querySelector('#orbits'), [
        // mass, rMajor, rMinor, focusDist, color, start%
        [10, 0.4, 0.4, 10, '0,121,207', 0.15],
        [10, 0.5, 0.4, 10, '0,121,207', 0.35],
        [10, 0.4, 0.4, 10, '0,121,207', 0.65],
        [10, 0.8, 0.7, -10, '0,121,207', 0.75],
        [25, 0.5, 0.4, 10, '255,124,231', 0.56],
        [25, 0.5, 0.5, 10, '255,124,231', 0.96],
        [15, 0.5, 0.4, -10, '255,124,231', 0.28],
        [25, 0.6, 0.5, 10, '255,124,231', 0.1],
        [20, 0.6, 0.5, 10, '255,255,255', 0.2],
        [25, 0.7, 0.6, 10, '255,255,255', 0.65],
      ]);

      const elements = ['halo', 'orbits', 'fallback', 'content'];
      setTimeout(() => {
        elements.forEach((id) =>
          document.getElementById(id)?.classList.remove('opacity-0'),
        );
      }, 500);
    },
  }));

  Alpine.data('newsletter', () => ({
    init() {
      createGradient(
        '#newsletter-canvas',
        ['#FF7CE7', '#0079CF', '#0079CF', '#86b4db'],
        [0.06, 0.16],
        100,
      );

      createOrbits(document.querySelector('#newsletter-orbits'), [
        // mass, rMajor, rMinor, focusDist, color, start%
        [10, 0.5, 0.45, 10, '0,121,207', 0.05],
        [12, 0.45, 0.5, 12, '255,124,231', 0.2],
        [10, 0.5, 0.4, 10, '0,121,207', 0.35],
        [12, 0.45, 0.5, 8, '255,124,231', 0.6],
        [8, 0.45, 0.5, 8, '255,124,231', 0.85],
      ]);
    },
  }));

  Alpine.data('header', () => ({
    init() {
      setTimeout(() => {
        createOrbits(document.querySelector('#header-orbits'), [
          // mass, rMajor, rMinor, focusDist, color, start%
          [20, 0.75, 0.5, 10, '0,121,207', 0.05],
          [22, 0.75, 0.55, 12, '255,124,231', 0.2],
          [20, 0.75, 0.5, 10, '0,121,207', 0.35],
          [22, 0.75, 0.55, 8, '255,124,231', 0.6],
          [18, 0.76, 0.5, 8, '255,124,231', 0.85],
        ]);
      }, 1000);
    },
  }));

  Alpine.data('eventHeader', () => ({
    init() {
      setTimeout(() => {
        createOrbits(document.querySelector('#event-orbits'), [
          // mass, rMajor, rMinor, focusDist, color, start%
          [18, 0.75, 0.5, 10, '0,121,207', -0.1],
          [26, 0.75, 0.5, 10, '0,121,207', 0.05],
          [18, 0.75, 0.55, 12, '255,124,231', 0.07],
          [22, 0.75, 0.5, 10, '0,121,207', 0.1],
          [20, 0.75, 0.55, 8, '255,124,231', 0.15],

          [18, 0.7, 0.5, 8, '0,121,207', 0.25],
          [24, 0.76, 0.5, 8, '255,124,231', 0.3],
          [28, 0.82, 0.5, 8, '0,121,207', 0.35],
          [23, 0.7, 0.5, 8, '0,121,207', 0.4],

          // [16, 0.7, 0.5, 8, '0,121,207', 0.4],
          [26, 0.76, 0.5, 8, '255,124,231', 0.46],
          [20, 0.82, 0.5, 8, '0,121,207', 0.52],
          [27, 0.7, 0.5, 8, '0,121,207', 0.58],

          [18, 0.7, 0.5, 8, '0,121,207', 0.6],
          [24, 0.76, 0.5, 8, '255,124,231', 0.65],
          [20, 0.82, 0.5, 8, '0,121,207', 0.7],
          [23, 0.7, 0.5, 8, '0,121,207', 0.75],
        ]);
      }, 1000);
    },
  }));
});

Alpine.start();

/**
 * Application entrypoint
 */
domReady(async () => {
  setupBarba();
});

/**
 * @see {@link https://webpack.js.org/api/hot-module-replacement/}
 */
if (import.meta.webpackHot) import.meta.webpackHot.accept(console.error);
