// window._ = require('lodash');
require('particles.js');
window.$ = require( 'jquery' );
functions = require('./functions.js');



$(function () {

    try {
        functions.drawBrandText();
        if($('#particles-js').length) {
            // setTimeout(() => {
            //     $('.loader-wrapper').addClass('disappear');
            // }, 500);
            particlesJS.load('particles-js', '/plugins/particles/particles.min.json');
        }

        $('.banner-close').on('click', function (){
            $('.banner').remove();
        });
        let _body = $(document.body);
        $(document).on('click', '.toggle-dark-mode', function () {
            let _this = $(this);
            let _isActive = !_body.hasClass('dark-mode');
            // let _isActive = localStorage.getItem('isDarkModeActive');
            _this.addClass('pushed');
            setTimeout(() => {
                _this.removeClass('pushed');
            }, 300);
            functions.toggleDarkMode(_this, _isActive, _body);
        });

    } catch (error) {

    }
});
