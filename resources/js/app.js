import axios from 'axios';
window.axios = axios;
window.axios.defaults.headers.common['X-Requested-With'] = 'XMLHttpRequest';

document.addEventListener('DOMContentLoaded', () => {
    const button = document.getElementById('mobile-menu-button');
    const menu = document.getElementById('mobile-menu');
    const icon = document.getElementById('mobile-menu-icon');

    if (!button || !menu || !icon) return;

    const closeMenu = () => {
        menu.classList.add('hidden');
        button.setAttribute('aria-expanded', 'false');
        button.setAttribute('aria-label', 'Ouvrir le menu');
        icon.textContent = '☰';
    };

    const openMenu = () => {
        menu.classList.remove('hidden');
        button.setAttribute('aria-expanded', 'true');
        button.setAttribute('aria-label', 'Fermer le menu');
        icon.textContent = '×';
    };

    closeMenu();

    button.addEventListener('click', (event) => {
        event.stopPropagation();
        const isOpen = button.getAttribute('aria-expanded') === 'true';
        isOpen ? closeMenu() : openMenu();
    });

    menu.querySelectorAll('a').forEach((link) => link.addEventListener('click', closeMenu));

    document.addEventListener('click', (event) => {
        if (!menu.contains(event.target) && !button.contains(event.target)) closeMenu();
    });

    document.addEventListener('keydown', (event) => {
        if (event.key === 'Escape') closeMenu();
    });

    window.addEventListener('resize', () => {
        if (window.innerWidth >= 1280) closeMenu();
    });
});
