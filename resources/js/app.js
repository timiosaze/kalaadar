import './bootstrap';

import Alpine from 'alpinejs';
import countries from './alpine/countries';
import timezones from './alpine/timezones';
import available from './alpine/available';
import times from './alpine/times';
import booking from './alpine/booking';
import customselect from './alpine/customselect';
import Clipboard from '@ryangjchandler/alpine-clipboard';
window.Alpine = Alpine;

Alpine.plugin(Clipboard);

Alpine.data('countries', countries);
Alpine.data('timezones', timezones);
Alpine.data('available', available);
Alpine.data('times', times);
Alpine.data('booking', booking);
Alpine.data('customselect', customselect);


Alpine.start();
