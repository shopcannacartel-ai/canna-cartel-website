(() => {
  const menuButton = document.querySelector('.ccu-menu-toggle');
  const nav = document.getElementById('ccu-site-nav');
  if (!menuButton || !nav) return;
  const close = () => { menuButton.setAttribute('aria-expanded', 'false'); nav.classList.remove('is-open'); };
  menuButton.addEventListener('click', () => {
    const open = menuButton.getAttribute('aria-expanded') !== 'true';
    menuButton.setAttribute('aria-expanded', String(open));
    nav.classList.toggle('is-open', open);
  });
  nav.addEventListener('click', (event) => { if (event.target.closest('a')) close(); });
  document.addEventListener('keydown', (event) => { if (event.key === 'Escape') close(); });
})();
