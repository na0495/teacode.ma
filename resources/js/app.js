require('./bootstrap');


$(function () {

    try {
        if($('#particles-js').length) {
            particlesJS.load('particles-js', '/plugins/particles/particles.json');
            setTimeout(() => {
                $('.loader-wrapper').addClass('disappear');
            }, 500);
        }
    } catch (error) {

    }
});
