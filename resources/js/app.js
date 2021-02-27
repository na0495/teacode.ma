// window._ = require('lodash');
require('particles.js');
window.$ = require( 'jquery' );


$(function () {

    try {
        if($('#particles-js').length) {
            particlesJS.load('particles-js', '/plugins/particles/particles.min.json');
            setTimeout(() => {
                $('.loader-wrapper').addClass('disappear');
            }, 500);
        }
    } catch (error) {

    }
});
