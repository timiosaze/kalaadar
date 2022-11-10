import './bootstrap';

import Alpine from 'alpinejs';
import countries from './alpine/countries';
import timezones from './alpine/timezones';
import available from './alpine/available';
import times from './alpine/times';
import booking from './alpine/booking';
window.Alpine = Alpine;

Alpine.data('countries', countries);
Alpine.data('timezones', timezones);
Alpine.data('available', available);
Alpine.data('times', times);
Alpine.data('booking', booking);


Alpine.start();
