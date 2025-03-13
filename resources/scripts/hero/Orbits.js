import { OrbitingBody } from './OrbitingBody';

export function setupCanvas(canvas) {
  let ctx = canvas.getContext('2d');
  canvas.width = canvas.clientWidth;
  canvas.height = canvas.clientHeight;
  let hw = canvas.width / 2;
  let hh = canvas.height / 2;
  ctx.transform(1, 0, 0, -1, hw, hh);
  ctx.fillStyle = 'white';
  return { ctx, canvas };
}

export function createOrbits(elem, bodies) {
  if (!elem) return;
  let { ctx, canvas } = setupCanvas(elem);

  bodies = bodies.map((body) => new OrbitingBody(...body));

  window.addEventListener('resize', function () {
    setupCanvas(elem);
  });

  setTimeout(() => {
    setupCanvas(elem);
  }, 50);

  function next() {
    ctx.clearRect(
      -canvas.width / 2,
      -canvas.height / 2,
      canvas.width,
      canvas.height,
    );
    bodies.forEach((body) => {
      body.updatePosition();
      body.draw(ctx);
    });
    window.requestAnimationFrame(next);
  }

  next();
}
