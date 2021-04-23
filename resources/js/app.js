// window._ = require('lodash');
require('particles.js');
window.$ = require( 'jquery' );


let _body = $(document.body);
let _isActive = !_body.hasClass('dark-mode');

function toggleDarkMode(button, isActive) {
    console.log(_isActive);
    if (isActive) {
        _body.addClass('dark-mode');
        button.addClass('dark-mode');
        setCookie('mode', 'dark');
        console.log('dark');
    } else {
        _body.removeClass('dark-mode');
        button.removeClass('dark-mode');
        setCookie('mode', 'light');
        console.log('light');
    }
    console.log(document.cookie);
}

function setCookie(name, value) {
    var d = new Date();
    d.setTime(d.getTime() + (365*24*60*60*1000));
    var expires = "expires=" + d.toUTCString();
    document.cookie = name + "=" + value + ";" + expires + ";path=/";
}


$(function () {

    try {
        if($('#particles-js').length) {
            // setTimeout(() => {
            //     $('.loader-wrapper').addClass('disappear');
            // }, 500);
            particlesJS.load('particles-js', '/plugins/particles/particles.min.json');
        }

        $(document).on('click', '.toggle-dark-mode', function () {
            let _this = $(this);
            let _isActive = !_body.hasClass('dark-mode');
            // let _isActive = localStorage.getItem('isDarkModeActive');
            _this.addClass('pushed');
            setTimeout(() => {
                _this.removeClass('pushed');
            }, 300);
            toggleDarkMode(_this, _isActive);
        });

    } catch (error) {

    }
});
