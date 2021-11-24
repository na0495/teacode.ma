// window._ = require('lodash');
require('particles.js');
window.$ = require('jquery');
// let functions = require('./js');
import { drawBrandText, initDarkMode, initParticlesJS, initCalendar, initActions } from "./functions";

$(function () {

    try {
        $.ajaxSetup({
            headers: {'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')}
        });
        var calendarEl = document.getElementById('calendar-wrapper');
        initCalendar(calendarEl);
        drawBrandText();
        initParticlesJS();
        initActions();

        initDarkMode();
    } catch (error) {
        console.log(error);
    }
});
