<html>

<head>
    <meta charset='utf-8' />
    <link href='/docs/dist/demo-to-codepen.css' rel='stylesheet' />
    <script src='https://cdn.jsdelivr.net/npm/fullcalendar@6.1.11/index.global.min.js'></script>
    <script src='/docs/dist/demo-to-codepen.js'></script>
    <style>
        .fc-event {
            padding-top: 10px;
            height: 40px;
        }

        .calendar {
            height: 350px;
        }
    </style>
    <?php
    $eventsJson = json_encode($assignment);
    // var_dump($eventsJson);
    ?>

    <script>
        document.addEventListener('DOMContentLoaded', function() {
            var calendarEl = document.getElementById('calendar');
            var calendar = new FullCalendar.Calendar(calendarEl, {
                timeZone: 'UTC',
                initialView: 'dayGridWeek',
                headerToolbar: {
                    left: 'prev,next',
                    center: 'title',
                    right: 'dayGridWeek,dayGridDay'
                },
                editable: true,
                events: <?php echo $eventsJson ?>.map(function(event) {
                    var link = '/student_classwork?id=' + event.classroom_code;

                    return {
                        title: event.title,
                        start: event.dateline,

                        url: link
                    };
                }),
                eventClick: function(info) {
                    info.jsEvent.preventDefault();
                    if (info.event.url) {
                        window.location.href = info.event.url;
                    }
                }
            });
            calendar.render();
        });
    </script>

    <div class="calendar col-xl-9 ">

        <div class='demo-topbar'></div>
        <div class="w-100 mx-1 h-100" id='calendar'></div>

    </div>