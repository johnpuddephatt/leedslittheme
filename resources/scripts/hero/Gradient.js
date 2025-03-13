import { Gradient } from 'canvas-mesh-gradient';

export function createGradient(canvas, colors, density, amplitude = 320) {
  let canvasRunning = false;
  const callback = (entries, observer) => {
    entries.forEach((entry) => {
      if (entry.isIntersecting && !canvasRunning) {
        let wrapper = document.querySelector(canvas + '-wrapper');
        let canvasElem = document.createElement('canvas');
        canvasElem.id = canvas.replace('#', '');
        canvasElem.classList.add(
          'absolute',
          'top-0',
          'left-0',
          'w-full',
          'h-full',
          'opacity-0',
          'transition-opacity',
          'duration-[3000ms]',
        );
        setTimeout(() => {
          canvasElem.classList.remove('opacity-0');
        }, 50);
        wrapper.appendChild(canvasElem);
        new Gradient({
          canvas: 'canvas' + canvas,
          colors: colors,
          density: density,
          amplitude: amplitude,
        });
        canvasRunning = true;
      } else {
        let canvasElem = document.querySelector(canvas);
        if (canvasElem) {
          canvasElem.remove();
        }
        canvasRunning = false;
      }
    });
  };

  let observer = new IntersectionObserver(callback, {
    root: null,
    rootMargin: '0px',
    threshold: 0.1,
  });

  if (document.querySelector(canvas + '-wrapper')) {
    observer.observe(document.querySelector(canvas + '-wrapper'));
  }
}
