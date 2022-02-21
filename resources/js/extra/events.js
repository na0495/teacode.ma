
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


export { initActions }
