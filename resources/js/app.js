import Alpine from 'alpinejs';
import { initHero3DBackground } from './hero-3d-background';

window.Alpine = Alpine;
Alpine.start();

document.addEventListener('DOMContentLoaded', () => {
    if (document.getElementById('hero-3d-background')) {
        initHero3DBackground('hero-3d-background');
    }
});
