// window._ = require('lodash');
require('particles.js');
window.$ = require( 'jquery' );


$(function () {

    try {
        if($('#particles-js').length) {
            // setTimeout(() => {
            //     $('.loader-wrapper').addClass('disappear');
            // }, 500);
            particlesJS.load('particles-js', '/plugins/particles/particles.min.json');
        }

        let _isActive = localStorage.getItem('isDarkModeActive');
        let _body = $(document.body);
        let _button = $('.toggle-dark-mode');
        toggleDarkMode(_button, _isActive);
        $(document).on('click', '.toggle-dark-mode', function () {
            let _this = $(this);
            let _isActive = !_this.hasClass('active')
            // let _isActive = localStorage.getItem('isDarkModeActive');
            _this.addClass('pushed');
            setTimeout(() => {
                _this.removeClass('pushed');
            }, 300);
            toggleDarkMode(_this, _isActive);
        });

        function toggleDarkMode(button, isActive) {
            if (isActive) {
                _body.addClass('dark-mode');
                button.addClass('active');
                localStorage.setItem('isDarkModeActive', true);
            } else {
                _body.removeClass('dark-mode');
                button.removeClass('active');
                localStorage.removeItem('isDarkModeActive');
            }
        }
    } catch (error) {

    }
});
