
function toggleDarkMode(button, isActive, _body) {
    if (isActive) {
        _body.addClass('dark-mode').removeClass('light-mode');
        button.addClass('dark-mode').removeClass('light-mode');
        $('.icon-mode').addClass('dark-mode').removeClass('light-mode');
        setCookie('mode', 'dark');
    } else {
        _body.removeClass('dark-mode').addClass('light-mode');
        button.removeClass('dark-mode').addClass('light-mode');
        $('.icon-mode').removeClass('dark-mode').addClass('light-mode');
        setCookie('mode', 'light');
    }
}

function setCookie(name, value) {
    var d = new Date();
    d.setTime(d.getTime() + (365*24*60*60*1000));
    var expires = "expires=" + d.toUTCString();
    document.cookie = name + "=" + value + ";" + expires + ";path=/";
}

function initActions() {

    let filebox = $('#file-box');
    filebox.on('drop', function (e){
        e.preventDefault();
        e.stopPropagation();
        console.log(e);
        var files = $('#formFile')[0].files = e.originalEvent.dataTransfer.files;
        var fd = new FormData();
        fd.append('file', files[0]);
        $('.file-box-txt').text(files[0].name);
        return false;
    });
    $("#formFile").on('change', function(){
        var fd = new FormData();
        var file = $('#formFile')[0].files[0];
        fd.append('file',file);
        $('.file-box-txt').text(file.name);
    });
    $("html").on("dragover", function(e) {
        e.preventDefault();
        e.stopPropagation();
    });
    $("html").on("drop", function(e) {
        e.preventDefault();
        e.stopPropagation();
    });

    $('.banner-close').on('click', function () {
        $('.banner').remove();
    });
    $('.event').on('click', '.add-extended_props', function (){
        let index = $('.extended_props_row').length;
        let dom = `<div class="row extended_props_row">
                        <div class="col-5"><input type="text" class="form-control" name="extended_props[${index}][]" placeholder="Field name"/></div>
                        <div class="col-6"><input type="text" class="form-control" name="extended_props[${index}][]" placeholder="Field value"/></div>
                        <div class="col-1 remove-extended_props"><i class="fas fa-minus-circle"></i></div>
                    </div>`;
        $('.extended_props_wrapper').append(dom);
    });
    $('.event').on('click', '.remove-extended_props', function (){
        $(this).parent('.extended_props_row').remove();
    });
    $('.event').on('click', '.update-event', function (e) {
        let data = $('.event form').serializeArray();
        $.ajax({
            method: 'PUT',
            url: '/_admin/events/' + $(this).data('id'),
            data: data,
            success: function (response) {
                console.log(response);
                alert('Updated');
            },
            error: function (jqXHR, textStatus, errorThrown){
                console.log(jqXHR, textStatus, errorThrown);
                alert('Error');
            }
        });
    });
    $('.event').on('click', '.delete-event', function (e) {
        // e.preventDefault();
        $.ajax({
            method: 'DELETE',
            url: '/_admin/events/' + $(this).data('id'),
            success: function (response) {
                console.log(response);
                history.back();
                alert('Deleted');
            },
            error: function (jqXHR, textStatus, errorThrown){
                console.log(jqXHR, textStatus, errorThrown);
                alert('Error');
            }
        });
    });

    $('#booking-form').on('submit', function (e) {
        e.preventDefault();
        let form_data = new FormData(this);

        const loader = `<div class="alert alert-info alert-box" role="alert">
                                    <div class="alert-txt-wrapper">
                                        <i class="fas fa-spinner spin medium-text"></i>
                                        <div class="loader-text">Processing ...</div>
                                    </div>
                                    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                                </div>`;
        let element = $('.loaderCalcul')
        element.empty().append(loader).removeClass('d-none');

        grecaptcha.ready(function() {
            grecaptcha.execute('6LcoEWwdAAAAAGp8RuoEUul7QmcPmz83bTOYv5Fa', {action: 'homepage'}).then(function(token) {
                // pass the token to the backend script for verification
                form_data.append("g-recaptcha", token);
                $.ajax({
                    method: 'POST',
                    url: '/api/interview',
                    data: form_data,
                    processData: false,
                    contentType: false,
                    success: function (response) {
                        console.log(response);
                        const loader = `<div class="alert alert-success alert-box" role="alert">
                                            <div class="alert-txt-wrapper">
                                                <i class="far fa-check-circle medium-text"></i>
                                                <div class="loader-text">${response.data.message}</div>
                                            </div>
                                            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                                        </div>`;
                        let element = $('.loaderCalcul')
                        element.empty().append(loader).removeClass('d-none');
                    },
                    error: function (jqXHR, textStatus, errorThrown){
                        console.log(jqXHR, textStatus, errorThrown);
                        let message = 'Something went wrong';
                        if (jqXHR.responseJSON.errors) {
                            let errors = Object.values(jqXHR.responseJSON.errors);
                            let element = $('.loaderCalcul')
                            element.empty()
                            for (let err of errors) {
                                message = err[0]
                                const loader = `<div class="alert alert-primary alert-box" role="alert">
                                                <div class="alert-txt-wrapper">
                                                    <i class="fas fa-exclamation-circle medium-text"></i>
                                                    <div class="loader-text">${message}</div>
                                                </div>
                                                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                                            </div>`;
                                element.append(loader)
                            }
                            element.removeClass('d-none');
                            return;
                        } else if (jqXHR.responseJSON.data.message) {
                            message = jqXHR.responseJSON.data.message;
                        }
                        const loader = `<div class="alert alert-primary alert-box" role="alert">
                                                <div class="alert-txt-wrapper">
                                                    <i class="fas fa-exclamation-circle medium-text"></i>
                                                    <div class="loader-text">${message}</div>
                                                </div>
                                                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                                            </div>`;
                        let element = $('.loaderCalcul')
                        element.empty().append(loader).removeClass('d-none');
                    }
                });
            });
        });
        return false;
    });
}


function initDarkMode() {
    let _body = $(document.body);
    $(document).on('click', '.toggle-dark-mode', function () {
        let _this = $(this);
        let _isActive = !_body.hasClass('dark-mode');
        // let _isActive = localStorage.getItem('isDarkModeActive');
        _this.addClass('pushed');
        setTimeout(() => {
            _this.removeClass('pushed');
        }, 300);
        toggleDarkMode(_this, _isActive, _body);
    });
}

export { initDarkMode, initActions }
