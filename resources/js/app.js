import Alpine from 'alpinejs';
import { initTravelBusScene } from './travel-bus-scene';

window.Alpine = Alpine;
window.initTravelBusScene = initTravelBusScene;

Alpine.start();

document.addEventListener('DOMContentLoaded', () => {
    if (document.getElementById('travel-bus-canvas')) {
        initTravelBusScene('travel-bus-canvas');
    }
});
