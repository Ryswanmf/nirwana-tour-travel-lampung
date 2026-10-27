import Alpine from 'alpinejs';
import { initTravelGlobe } from './travel-globe';

window.Alpine = Alpine;
window.initTravelGlobe = initTravelGlobe;

Alpine.start();

document.addEventListener('DOMContentLoaded', () => {
    if (document.getElementById('travel-globe-canvas')) {
        initTravelGlobe('travel-globe-canvas');
    }
});
