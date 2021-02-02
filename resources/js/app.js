require('./bootstrap');


$(function () {

    particlesJS.load('particles-js', '/plugins/particles/particles.json', function () {
        console.log('callback - particles.js config loaded');
    });
});
