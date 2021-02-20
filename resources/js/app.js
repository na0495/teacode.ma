require('./bootstrap');


$(function () {

    particlesJS.load('particles-js', '/plugins/particles/particles.json');
    setTimeout(() => {
        $('.loader-wrapper').addClass('disappear');
    }, 500);
});
