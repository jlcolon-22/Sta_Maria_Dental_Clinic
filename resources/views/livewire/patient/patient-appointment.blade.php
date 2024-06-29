@assets
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/flatpickr/dist/flatpickr.min.css">
    <script>
        var botmanWidget = {
            title: 'Sta.Maria Dental Clinic',
            mainColor: '#1c98f7',
            bubbleBackground: '#feba02',
            color: 'white',
            aboutText: 'Powered by SMDC'
        };
        </script>


    @endassets
<div>
    <x-pages.header />

    <section x-data="main(@entangle('doctorNotAvailable'))" class=" bg-[#f2f6fa] pb-28 pt-20 text-primary px-2 lg:px-0">
        <div class=" container mx-auto">
            {{-- table --}}
            <div class="bg-white shadow-md rounded-md  p-5  ">
                <h2 class="font-robotoBold">My Appointment</h2>
                <div class=" py-2 flex items-center justify-end">

                    <form action="" class="relative w-fit">
                        <input type="date" autocomplete="off"wire:model.live.debounce.500ms="search"
                            class="border rounded py-2 px-5 focus:border-ylw outline-none bg-gray-100 "
                            placeholder="Search">
                        {{-- <button
                            class="absolute h-full w-[3rem] flex justify-center items-center top-0 right-0  bg-primary hover:opacity-75">
                            <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24"
                                fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round"
                                stroke-linejoin="round" class="w-[2rem] text-white">
                                <circle cx="11" cy="11" r="8"></circle>
                                <line x1="21" y1="21" x2="16.65" y2="16.65"></line>
                            </svg>
                        </button> --}}
                    </form>


                </div>
                <div class=" overflow-x-auto rounded-md  relative">
                    <table class="w-full text-white  ">
                        <thead class="bg-btnDark ">
                            <tr class=" ">
                                <th class="py-2 whitespace-nowrap text-center px-2">Status</th>
                                <th class="py-2 whitespace-nowrap text-center px-2">Branch</th>
                                <th class="py-2 whitespace-nowrap text-center px-2">Fullname</th>
                                <th class="py-2 whitespace-nowrap text-center px-2">Email</th>
                                <th class="py-2 whitespace-nowrap text-center px-2">Number</th>
                                <th class="py-2 whitespace-nowrap text-center px-2">Age</th>
                                <th class="py-2 whitespace-nowrap text-center px-2">Doctor</th>

                                <th class="py-2 whitespace-nowrap text-center px-2">Procedure</th>
                                <th class="py-2 whitespace-nowrap text-center px-2">Date | Time</th>


                                <th class="py-2 whitespace-nowrap text-center px-2">Action</th>

                            </tr>
                        </thead>
                        <tbody class="text-gray-900">
                            @forelse ($appointments as $appointment)
                                <tr>
                                    <td class="py-3 text-center px-2 text-sm">
                                        @if ($appointment->status == 0)
                                            <span
                                                class="bg-yellow-100 text-yellow-800 text-xs font-medium me-2 px-2.5 py-0.5 rounded ">Processing</span>
                                        @elseif($appointment->status == 1)
                                            <span
                                                class="bg-green-100 text-green-800 text-xs font-medium me-2 px-2.5 py-0.5 rounded ">Approved</span>
                                        @else
                                            <span
                                                class="bg-red-100 text-red-800 text-xs font-medium me-2 px-2.5 py-0.5 rounded ">Canceled</span>
                                        @endif
                                    </td>
                                    <td class="py-3 text-center px-2 text-sm">
                                        {{ $appointment->branchInfo->branch_name }}</td>
                                    <td class="py-3 text-center px-2 text-sm">{{ $appointment->fullname }}</td>
                                    <td class="py-3 text-center px-2 text-sm">{{ $appointment->email }}</td>
                                    <td class="py-3 text-center px-2 text-sm">{{ $appointment->number }}</td>
                                    <td class="py-3 text-center px-2 text-sm">{{ $appointment->age }}</td>
                                    <td class="py-3 text-center px-2 text-sm">{{ $appointment->doctorInfo?->fullname }}
                                    </td>

                                    <td class="py-3 text-center px-2 text-sm">{{ $appointment->procedure }}</td>
                                    <td class="py-3 text-center px-2 text-sm">
                                        {{ Carbon\Carbon::parse($appointment->date)->format('M d, Y  h:m A') }}</td>



                                    <td class="py-3 text-center px-2 flex justify-center gap-x-2 text-sm">
                                        <button x-on:click='showReschedDate({{ $appointment->doctor_id }}, {{ $appointment->id }})' type="button"
                                            class="text-green-500 font-robotoBold hover:underline">Reschedule</button>

                                        @if ($appointment->status != 2)
                                            <button class="text-red-500 font-robotoBold hover:underline"
                                                wire:click="cancelAppointment({{ $appointment->id }})">Cancel</button>
                                        @endif
                                    </td>
                                </tr>
                            @empty
                                <tr>
                                    <td class="py-3 text-gray-500 px-2">No Product Found!</td>
                                </tr>
                            @endforelse

                        </tbody>
                    </table>
                    <div class="py-2">
                        {{ $appointments->links('livewire::tailwind') }}
                    </div>
                </div>
            </div>



        </div>





        {{-- modal --}}
        <div class="fixed top-0 left-0 w-full min-h-[100svh] max-h-[100svh] bg-black/45 flex justify-center pt-20 z-50" :class="showDates ? 'block' : 'hidden'">


            <form wire:submit.prevent='resched' method="POST" class="bg-white shadow-md border w-[30rem] h-fit p-3 rounded-md">
                <div class="flex justify-between items-center">
                    <h1 class="font-robotoBold text-xl text-primary">Reschedule
                    </h1>
                    <button type="button" x-on:click="toggleDate">
                        <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24"
                            fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round"
                            stroke-linejoin="round" class="text-red-600">
                            <circle cx="12" cy="12" r="10"></circle>
                            <line x1="15" y1="9" x2="9" y2="15"></line>
                            <line x1="9" y1="9" x2="15" y2="15"></line>
                        </svg>
                    </button>
                </div>
                <div class="grid mt-6 ">
                    <label for="" class="font-medium text-gray-800">Date</label>
                    <input x-ref="date" type="text" wire:model='date' autocomplete="off"
                        class="border p-2 focus:border-ylw outline-none bg-gray-100 ">
                </div>

                <div class="grid mt-4 ">
                    <button type="submit" class="border py-2  bg-green-500 outline-none hover:opacity-70 text-white ">
                        <span wire:loading.remove>
                            Resched
                        </span>
                        <div wire:loading wire:loading.delay.longest>
                            loading .....
                        </div>
                    </button>
                </div>
            </form>

        </div>
    </section>


    {{-- footer --}}
    <x-pages.footer />
</div>
@script
    <script>
        Alpine.data('main', (disabledDate) => ({
            showDates: false,
            dataPick: null,
            notDate: disabledDate,

            showDate(dd) {
                console.log(dd)
                this.dataPick = flatpickr(this.$refs.date, {
                    minDate: "today",
                    enableTime: true,
                    minTime: '11',
                    maxTime: '19',
                    time_24hr: true,
                    dateFormat: "Y-m-d h:i K",
                    disable: [...dd, function(date) {
       return (date.getDay() === 0 || date.getDay() === 6);
    }],
                    locale: {
                        firstDayOfWeek: 1
                    }
                })
                this.showDates = true;
            },
            toggleDate() {
                this.showDates = !this.showDate;

            },
            async showReschedDate(id,appid)
            {


                await $wire.showResched(id,appid);
                if(this.notDate[0] == 'no_available')
                        {
                            const date = new Date();

                            let day = date.getDate() ;
                            let month = date.getMonth() + 1;
                            let year = date.getFullYear();

                            this.showDate([`${year}-${month}-${day - 1}`]);
                        }else{
                            this.showDate(this.notDate)
                        }
            },
            init() {


                this.$watch('notDate', () => {





                })



                Livewire.on('updated', () => {
                    this.showDates = false;
                    Swal.fire({
                        position: "center",
                        icon: "success",
                        title: "Updated Successfully!",
                        showConfirmButton: true,

                    })

                })
            }

        }))
    </script>
@endscript
