window.$ = require('jquery');
import { drawBrandText, initParticlesJS, initDarkMode, initGlobalActions, generateCode } from "./functions";

$(function () {

    try {
        initGlobalActions();
        drawBrandText();
        initParticlesJS();
        initDarkMode();
        setTimeout(() => {
            generateCode();
        }, 500);
    } catch (error) {
        console.log(error);
    }
});
