document.addEventListener('DOMContentLoaded', () => {
  const dot = document.getElementById('cursor-dot');
  const ring = document.getElementById('cursor-ring');

  if (!dot || !ring) return;

  // Track cursor position
  document.addEventListener('mousemove', (e) => {
    dot.style.left = `${e.clientX}px`;
    dot.style.top = `${e.clientY}px`;
    ring.style.left = `${e.clientX}px`;
    ring.style.top = `${e.clientY}px`;
  });

  // Click animation triggers
  document.addEventListener('mousedown', () => {
    ring.classList.add('active');
  });

  document.addEventListener('mouseup', () => {
    ring.classList.remove('active');
  });
});