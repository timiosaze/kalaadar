import './bootstrap';

import Alpine from 'alpinejs';
import countries from './alpine/countries';
import timezones from './alpine/timezones';
window.Alpine = Alpine;

Alpine.data('countries', countries);
Alpine.data('timezones', timezones);


Alpine.start();
