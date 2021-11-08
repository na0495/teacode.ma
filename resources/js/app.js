// window._ = require('lodash');
require('particles.js');
window.$ = require('jquery');
// let functions = require('./js');
import { drawBrandText, initDarkMode, initParticlesJS, initCalendar } from "./functions";

$(function () {

    try {
        initCalendar();
        drawBrandText();
        initParticlesJS();
        $('.banner-close').on('click', function () {
            $('.banner').remove();
        });
        initDarkMode();
    } catch (error) {
        console.log(error);
    }
});
