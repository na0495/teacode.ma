// window._ = require('lodash');
require('particles.js');
window.$ = require('jquery');
// let functions = require('./js');
import { drawBrandText, initParticlesJS, initCalendar } from "./functions";
import { initDarkMode, initActions } from "./events";


$(function () {

    try {
        $.ajaxSetup({
            headers: {'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')}
        });
        initCalendar();
        drawBrandText();
        initParticlesJS();
        initActions();
        initDarkMode();
    } catch (error) {
        console.log(error);
    }
});
