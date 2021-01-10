require('./bootstrap');


$(function(){

    setTimeout(() => {
        $('.message').removeClass('d-none');
    }, 500);

    $(document).on('click', '.close, .message-bluring', function () {
        $('.message-wrapper').toggleClass('animate__rollIn animate__rollOut');
        setTimeout(() => {
            $('.message').addClass('d-none');
        }, 1000);
    });
});
