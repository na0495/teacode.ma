import { Calendar } from '@fullcalendar/core';
import interactionPlugin from '@fullcalendar/interaction';
import dayGridPlugin from '@fullcalendar/daygrid';
import timeGridPlugin from '@fullcalendar/timegrid';
import listPlugin from '@fullcalendar/list';
import 'bootstrap';

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
function drawBrandText() {
    let text = `
     /$$                                                   /$$
    | $$                                                  | $$
   /$$$$$$    /$$$$$$   /$$$$$$   /$$$$$$$  /$$$$$$   /$$$$$$$  /$$$$$$
  |_  $$_/   /$$__  $$ |____  $$ /$$_____/ /$$__  $$ /$$__  $$ /$$__  $$
    | $$    | $$$$$$$$  /$$$$$$$| $$      | $$  \\ $$| $$  | $$| $$$$$$$$
    | $$ /$$| $$_____/ /$$__  $$| $$      | $$  | $$| $$  | $$| $$_____/
    |  $$$$/|  $$$$$$$|  $$$$$$$|  $$$$$$$|  $$$$$$/|  $$$$$$$|  $$$$$$$
     \\___/   \\_______/ \\_______/ \\_______/ \\______/  \\_______/ \\_______/
    `;
    console.log(text);
}

function initCalendar() {
    var calendarEl = document.getElementById('calendar-wrapper');
    if (calendarEl) {
        var calendar = new Calendar(calendarEl, {
            plugins: [interactionPlugin, dayGridPlugin, timeGridPlugin, listPlugin],
            headerToolbar: {
                left: 'prev,next today',
                center: 'title',
                right: 'dayGridMonth,timeGridWeek,timeGridDay,listMonth'
            },
            // titleFormat: { year: 'numeric', month: 'short', day: 'numeric'  },
            themeSystem: 'standard',
            initialDate: new Date().toISOString(),
            nowIndicator: true,
            navLinks: true, // can click day/week names to navigate views
            allDaySlot: false,
            weekNumbers: true,
            // weekText: '',
            weekNumberFormat: { week: 'numeric' },
            // dayHeaders: true,
            // height: '100%',
            // timeZone: 'UTC+1',
            // editable: true,
            // handleWindowResize: true,
            // aspectRatio: 0.5,
            // contentHeight: 500,
            initialView: 'dayGridMonth',
            selectable: false,
            dayMaxEvents: true, // allow "more" link when too many events
            events: '/api/events',
            eventClick: function(info) {
                info.jsEvent.preventDefault();
                let event = info.event
                $('#event-detail .modal-body').empty();
                let date = event.start.toLocaleDateString() + ' ' + event.start.toLocaleTimeString().replace(/^(?:00:)?0?/, '') + ' - ';
                if (event.start.toLocaleDateString() == event.end.toLocaleDateString()) {
                    date += event.end.toLocaleTimeString().replace(/^(?:00:)?0?/, '');;
                } else {
                    date += event.end.toLocaleDateString() + ' ' + event.end.toLocaleTimeString().replace(/^(?:00:)?0?/, '') + ' - ';
                }
                let dom = `<div class="event-info event-title mb-2">
                                <div class="event-icon"><i class="fas fa-dot-circle"></i></div>
                                <div class="event-text"><span>${event.title}</span></div>
                            </div>
                            <div class="event-info event-date mb-2">
                                <div class="event-icon"><i class="fas fa-calendar-alt"></i></div>
                                <div class="event-text"><span>${date}</span></div>
                            </div>
                            <div class="event-info event-url mb-2">
                                <div class="event-icon"><i class="fas fa-link"></i></div>
                                <div class="event-text"><span><a href="${event.url}" target="_blank">${event.url}</a></span></div>
                            </div>`;
                if (event.extendedProps.video) {
                    dom += `<div class="event-info event-video mb-2">
                                <div class="event-icon"><i class="fab fa-youtube"></i></div>
                                <div class="event-text"><span><a href="${event.extendedProps.video}" target="_blank">Watch the record</a></span></div>
                            </div>`;
                }
                dom += `<div class="event-info event-description mb-2">
                            <div class="event-icon"><i class="far fa-file-alt"></i></div>
                            <div class="event-text"><span>${event.extendedProps?.description?.replaceAll('\n', '<br/>') || 'No description'}</span></div>
                        </div>`;
                $('#event-detail .modal-body').append(dom);
                $('#event-detail').addClass('d-block show in animate__fadeIn').removeClass('animate__fadeOut');
            },
        });
        calendar.render()
        // calendar.setOption('height', '100%');

        $('#event-detail .close').on('click', function (e) {
            // console.log('child', e.currentTarget, e.target);
            $('#event-detail').addClass('animate__fadeOut').removeClass('animate__fadeIn');
            setTimeout(() => {
                $('#event-detail').removeClass('d-block show in');
            }, 300);
        });

        $('#event-detail').on('click', function (e) {
            if (e.currentTarget == e.target || $(e.target)[0] == $('.close i')[0]) {
                $('#event-detail').addClass('animate__fadeOut').removeClass('animate__fadeIn');
                setTimeout(() => {
                    $('#event-detail').removeClass('d-block show in');
                }, 300);
            }
        });
    }
}

function initParticlesJS() {
    if ($('#particles-js').length) {
        // setTimeout(() => {
        //     $('.loader-wrapper').addClass('disappear');
        // }, 500);
        particlesJS.load('particles-js', '/plugins/particles/particles.min.json');
    }
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

export { drawBrandText, initDarkMode, initParticlesJS, initCalendar }
