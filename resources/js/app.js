require('./bootstrap');


$(function () {

    particlesJS.load('particles-js', '/plugins/particles/particles.min.json');
    setTimeout(() => {
        $('.loader-wrapper').addClass('disappear');
    }, 500);
});
