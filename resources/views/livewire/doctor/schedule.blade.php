@assets
<style>
    .fc-day-today {
    background: #34d399 !important;
    border: none !important;

}
</style>

@endassets
<div class="bg-[#f2f6fa] max-h-[100svh]  ">

    {{-- :class="aside ? ' max-w-[calc(100svw-17rem)]' : ' max-w-[100svw]'" --}}
    <x-doctor.aside>
        <section x-data="main" class="text-gray-900  py-10 px-5  lg:p-10 max-h-[calc(100svh-5rem)] overflow-y-auto relative"
             :class="aside ? 'w-full lg:max-w-[calc(100svw-17rem)] ' : 'max-w-[calc(100svw-17rem)] lg:max-w-[100%] min-w-[100%]'">

            <!-- Breadcrumb -->
            <nav class="flex " aria-label="Breadcrumb">

                <ol class="inline-flex items-center space-x-1 md:space-x-2 rtl:space-x-reverse">
                    <li class="inline-flex items-center">
                        <a href="/doctor/dashboard"
                            class="inline-flex items-center text-sm font-medium text-gray-700 hover:text-blue-600 ">
                            <svg class="w-3 h-3 me-2.5" aria-hidden="true" xmlns="http://www.w3.org/2000/svg"
                                fill="currentColor" viewBox="0 0 20 20">
                                <path
                                    d="m19.707 9.293-2-2-7-7a1 1 0 0 0-1.414 0l-7 7-2 2a1 1 0 0 0 1.414 1.414L2 10.414V18a2 2 0 0 0 2 2h3a1 1 0 0 0 1-1v-4a1 1 0 0 1 1-1h2a1 1 0 0 1 1 1v4a1 1 0 0 0 1 1h3a2 2 0 0 0 2-2v-7.586l.293.293a1 1 0 0 0 1.414-1.414Z" />
                            </svg>
                            Dashboard
                        </a>
                    </li>

                    <li aria-current="page">
                        <div class="flex items-center">
                            <svg class="rtl:rotate-180  w-3 h-3 mx-1 text-gray-400" aria-hidden="true"
                                xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 6 10">
                                <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round"
                                    stroke-width="2" d="m1 9 4-4-4-4" />
                            </svg>
                            <span
                                class="ms-1 text-sm font-medium text-gray-500 md:ms-2 dark:text-gray-400">Schedule</span>
                        </div>
                    </li>
                </ol>
            </nav>

            <div class="bg-white shadow-md rounded-md mt-7  p-5  ">
                <h2 class="font-robotoBold">Your Schedule</h2>


                <div class="mt-5 ">
                    <div x-ref="calendar" wire:ignore></div>
                </div>
            </div>



        </section>

    </x-doctor.aside>


</div>
@script
    <script>
        Alpine.data('main', () => ({
            edit: false,
            calendar: null,

            show(datas) {
                var x = datas.map(function(value) {
                    return {
                        id: value.id,
                        title: 'Not Available',
                        display: 'block',
                        start: value.date,
                        backgroundColor: '#ff0000'
                    };

                })

                this.calendar = new Calendar(this.$refs.calendar, {
                    plugins: [dayGridPlugin, timeGridPlugin, listPlugin, interactionPlugin],

                    headerToolbar: {
                        left: 'prev,next',
                        center: 'title',
                        right: 'today'
                    },
                    events: x,
                    hiddenDays: [ 0],
                    validRange: function(nowDate) {
                        // Calculate the current date
                        var now = new Date(nowDate);

                        // Set the valid range to start from the current date
                        return {
                            start: now.toISOString().split("T")[0], // Format: YYYY-MM-DD
                        };
                    },
                    // validRange: {
                    //     start: '2024-01-11'
                    // }




                })
                this.calendar.on('dateClick', function(info) {
                    $wire.disabledDate(info.dateStr);



                });
                this.calendar.on('eventClick', function(info) {
                    var date = new Date(info.event.start);
                    $wire.disabledDate(`${date.getFullYear()}-${date.getMonth()+1}-${date.getDate()}`);
                    console.log()
                });



            },
            init() {
                this.show(@js($schedules));
                this.calendar.render()

                Livewire.on('added', (value) => {
                    if (value[0].date) {
                        this.calendar.addEvent({
                            id: value[0].id,
                            title: 'Not Available',
                            display: 'block',
                            start: value[0].date,
                            backgroundColor: '#ff0000',
                            borderColor: 'red'
                        })
                    } else {
                        var event = this.calendar.getEventById(value[0].id);
                        event.remove();
                    }


                })

            }
        }))
    </script>
@endscript
