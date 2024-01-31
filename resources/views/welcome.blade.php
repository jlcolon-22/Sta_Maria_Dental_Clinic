<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>Laravel</title>

    <!-- Fonts -->
    <link rel="preconnect" href="https://fonts.bunny.net">
    <link href="https://fonts.bunny.net/css?family=figtree:400,600&display=swap" rel="stylesheet" />
    @vite(['resources/css/app.css', 'resources/js/app.js'])

</head>

<body class="antialiased">
    <div id="calendar"></div>


    <script>
        document.addEventListener('DOMContentLoaded', function() {
            const calendarEl = document.getElementById('calendar')
            const calendar = new Calendar(calendarEl, {
                plugins: [dayGridPlugin, timeGridPlugin, listPlugin, interactionPlugin],

                headerToolbar: {
                    left: 'prev,next today',
                    center: 'title',
                    right: 'dayGridMonth,timeGridWeek'
                }, events: [
                   {
                        display: 'background',
                        start: '2024-01-01',
                        backgroundColor: 'red'

                    },


                ],validRange: function(nowDate) {
                    // Calculate the current date
                    var now = new Date(nowDate);

                    // Set the valid range to start from the current date
                    return {
                        start: now.toISOString().split("T")[0], // Format: YYYY-MM-DD
                    };
                },



            })
            calendar.on('dateClick', function(info) {
                console.log('clicked on ' + info.dateStr);
            });

            calendar.on('eventClick', function(info) {
                console.log(info.event.start);
                console.log(info.event.id);
            });

            calendar.render()
        });
    </script>
</body>

</html>
