
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
    filebox.on('dragleave', function (e){
        $('.file-box-txt').text('Drop your CV here to upload');
    });
    filebox.on('dragover', function (e){
        $('.file-box-txt').text('Drop Here');
    });
    filebox.on('drop', function (e){
        e.preventDefault();
        e.stopPropagation();
        var files = $('#resume-file')[0].files = e.originalEvent.dataTransfer.files;
        if (files[0].size/1000 > 3000) {
            let params = {
                class: 'alert-primary',
                icon: '<i class="fas fa-exclamation-triangle medium-text"></i>',
                message: 'The <span class=text-decoration-underline>CV file</span> must have a size of 3Mb or less'
            };
            appendAlertDom(params);
            $('#resume-file').val(null);
            return;
        }
        var fd = new FormData();
        fd.append('file', files[0]);
        $('.file-box-txt').text(files[0].name);
        return false;
    });
    $("#resume-file").on('change', function(){
        var fd = new FormData();
        var file = $('#resume-file')[0].files[0];
        if (file) {
            if (file.size/1000 > 3000) {
                let params = {
                    class: 'alert-primary',
                    icon: '<i class="fas fa-exclamation-triangle medium-text"></i>',
                    message: 'The <span class=text-decoration-underline>CV file</span> must have a size of 3Mb or less'
                };
                appendAlertDom(params);
                $('#resume-file').val(null);
                return;
            }
            fd.append('file',file);
            $('.file-box-txt').text(file.name);
            return;
        }
        $('#resume-file').val(null);
        $('.file-box-txt').text('Drop your CV here to upload');
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
        let params = {
            class: 'alert-info',
            icon: '<i class="fas fa-spinner spin medium-text"></i>',
            message: 'Processing ...'
        };
        appendAlertDom(params);

        let form_data = new FormData(this);
        $.ajax({
            method: 'POST',
            url: '/api/interview',
            data: form_data,
            processData: false,
            contentType: false,
            success: function (response) {
                console.log(response);
                let params = {
                    class : 'alert-success',
                    icon : '<i class="far fa-check-circle medium-text"></i>',
                    message: response.data.message
                };
                appendAlertDom(params);
            },
            error: function (jqXHR, textStatus, errorThrown){
                console.log(jqXHR, textStatus, errorThrown);
                let message = 'Something went wrong';
                if (jqXHR.responseJSON.errors) {
                    let errors = Object.values(jqXHR.responseJSON.errors);
                    let element = $('.loaderCalcul')
                    element.empty()
                    let params = {
                            class: 'alert-primary',
                            icon: '<i class="fas fa-exclamation-triangle medium-text"></i>'
                        };
                    for (let err of errors) {
                        params = {...params, message: err[0]}
                        element.append(alertDom(params))
                    }
                    element.removeClass('d-none');
                    return;
                } else if (jqXHR.responseJSON.data.message) {
                    message = jqXHR.responseJSON.data.message;
                }
                let params = {
                        class: 'alert-primary',
                        icon: '<i class="fas fa-exclamation-triangle medium-text"></i>',
                        message: message
                    };
                appendAlertDom(params);
            }
        });
        return false;
    });
}

function appendAlertDom(params){
    $('.loaderCalcul').empty().append(alertDom(params)).removeClass('d-none');
}

function alertDom(params){
    const loader = `<div class="alert ${params.class} alert-box" role="alert">
                            <div class="alert-txt-wrapper">
                                ${params.icon}
                                <div class="loader-text">${params.message}</div>
                            </div>
                            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                        </div>`;
    return loader;
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
