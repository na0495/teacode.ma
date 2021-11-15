// window._ = require('lodash');
require('particles.js');
window.$ = require('jquery');
// let functions = require('./js');
import { drawBrandText, initDarkMode, initParticlesJS, initCalendar } from "./functions";

$(function () {

    try {
        $.ajaxSetup({
            headers: {'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')}
        });
        initCalendar();
        drawBrandText();
        initParticlesJS();
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
                url: '/events/' + $(this).data('id'),
                data: data,
                success: function (response) {
                    console.log(response);
                },
                error: function (jqXHR, textStatus, errorThrown){
                    console.log(jqXHR, textStatus, errorThrown);
                }
            });
        });
        $('.event').on('click', '.delete-event', function (e) {
            // e.preventDefault();
            console.log($(this).data('id'));
            $.ajax({
                method: 'DELETE',
                url: '/events/' + $(this).data('id'),
                success: function (response) {
                    console.log(response);
                },
                error: function (jqXHR, textStatus, errorThrown){
                    console.log(jqXHR, textStatus, errorThrown);
                }
            });
        });

        initDarkMode();
    } catch (error) {
        console.log(error);
    }
});
