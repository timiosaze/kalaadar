import './bootstrap';

import Alpine from 'alpinejs';
import countries from './alpine/countries';
window.Alpine = Alpine;

Alpine.data('countries', countries);


Alpine.start();
