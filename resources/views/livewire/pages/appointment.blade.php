@assets
    {{-- <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/flatpickr/dist/flatpickr.min.css"> --}}

    <script>
        var botmanWidget = {
            title: 'Sta.Maria Dental Clinic',
            mainColor: '#1c98f7',
            bubbleBackground: '#feba02',
            color: 'white',
            aboutText: ' ',
            introMessage: 'Welcome to Sta.Maria Dental Clinic',
            chatServer: '/botman'
        };
    </script>
    <script src='https://cdn.jsdelivr.net/npm/botman-web-widget@0/build/js/widget.js'></script>
@endassets

<div>
    <x-pages.header />

    <section class=" bg-[#f2f6fa] pb-28 pt-10 lg:pt-20 px-3">

        <div class="relative text-primary z-0 lg:hidden  pb-10">

            <h1 class="text-3xl font-extrabold font-robotoBold text-center z-20 ">Appointment Request Form</h1>

            <p class="text-sm text-center mt-2 w-[70%] mx-auto">Please be inform that this is not yet confirmed booking
                Our Patient Support Team will contact you to confirm your Appointment. Thank you</p>

        </div>
        <main x-data="main(@entangle('doctorNotAvailable'), @entangle('doctorSelect'))" class=" container mx-auto bg-white  grid grid-cols-1 lg:grid-cols-2">
            <div class="relative bg-primary z-0 hidden lg:block p-10">
                <img src="{{ asset('assets/logbg.png') }}"
                    class="absolute top-0 left-0 w-full h-full  object-cover opacity-20 -z-10" alt="">
                <h1 class="text-5xl font-extrabold font-robotoBold text-center z-20 mt-10">Appointment Request Form</h1>
                <p class="text-lg text-center mt-5">Please be inform that this is not yet confirmed booking</p>
                <p class="text-lg text-center">Our Patient Support Team will contact you to confirm</p>
                <p class="text-lg text-center">your Appointment. Thank you</p>
            </div>
            <div class="p-10">
                <form wire:submit='store' class="text-black space-y-4">
                    <div class="grid">
                        <label for="" class="font-robotoBold text-sm ">Branch:</label>

                        <select wire:model='branch' wire:change='branch_change'
                            class="border py-3 rounded  px-4 focus:border-ylw outline-none bg-gray-50 ">
                            <option hidden disabled selected value="">Choose...</option>
                            @forelse ($allBranch as $branch)
                                <option value="{{ $branch->id }}">{{ $branch->branch_name }}</option>
                            @empty
                                <option value="">No result</option>
                            @endforelse

                        </select>
                        @error('branch')
                            <p class="text-red-600 text-sm">{{ $message }}</p>
                        @enderror
                    </div>
                    <div class="grid">
                        <label for="" class="font-robotoBold text-sm ">Fullname:</label>
                        <input type="text" wire:model='fullname' autocomplete="off"
                            class="border  py-2.5 px-4 rounded focus:border-ylw outline-none bg-gray-50 ">
                        @error('fullname')
                            <p class="text-red-600 text-sm">{{ $message }}</p>
                        @enderror
                    </div>

                    <div class="grid">
                        <label for="" class="font-robotoBold text-sm ">Age:</label>
                        <input type="number" wire:model='age'
                            class="border  py-2.5 px-4 rounded focus:border-ylw outline-none bg-gray-50 ">
                        @error('age')
                            <p class="text-red-600 text-sm">{{ $message }}</p>
                        @enderror
                    </div>
                    <div class="grid">
                        <label for="" class="font-robotoBold text-sm ">Contact Number:</label>
                        <input type="tel" wire:model='number'
                            class="border  py-2.5 px-4 rounded focus:border-ylw outline-none bg-gray-50 ">
                        @error('number')
                            <p class="text-red-600 text-sm">{{ $message }}</p>
                        @enderror
                    </div>
                    <div class="grid">
                        <label for="" class="font-robotoBold text-sm ">Email address:</label>
                        <input type="email" wire:model='email'
                            class="border  py-2.5 px-4 rounded focus:border-ylw outline-none bg-gray-50 ">
                        @error('email')
                            <p class="text-red-600 text-sm text-sm">{{ $message }}</p>
                        @enderror
                    </div>
                    {{ $this->form }}
                    {{-- @error('procedure')
                    <p class="text-red-600 text-sm">{{ $message }}</p>
                @enderror --}}
                    {{-- <div class="grid">
                        <label for="" class="font-robotoBold text-sm ">Procedure:</label>

                        <select wire:model='procedure'
                            class="border py-3 rounded  px-4 focus:border-ylw outline-none bg-gray-50 ">
                            <option hidden disabled selected value=""> -- select an option -- </option>
                            <option value="braces">Braces</option>
                            <option value="cleaning">Cleaning (Oral Prophylaxis)</option>
                            <option value="consultation">Consultation</option>
                            <option value="clear Aligners">Clear Aligners</option>
                            <option value="Crowns-Veneers">Crowns / Veneers</option>
                            <option value="Dental Implant">Dental Implant</option>
                            <option value="Extraction">Extraction</option>
                            <option value="Pasta / Filling">Pasta / Filling</option>
                            <option value="Root Canal Treatment">Root Canal Treatment</option>
                            <option value="Surgery">Surgery</option>
                            <option value="Teeth Whitening">Teeth Whitening</option>
                            <option value="Xray">Xray</option>
                        </select>
                        @error('procedure')
                            <p class="text-red-600 text-sm">{{ $message }}</p>
                        @enderror
                    </div> --}}
                    <div class="grid">
                        <label for="" class="font-robotoBold text-sm ">Doctor:</label>

                        <select wire:model='doctor' wire:change='doctor_change'
                            class="border py-3 rounded  px-4 focus:border-ylw outline-none bg-gray-50 ">
                            <option value="" :selected="true">Choose..</option>
                            @forelse ($allDoctor as $doctor)
                                <option value="{{ $doctor->id }}">{{ $doctor->fullname }}</option>

                            @empty
                                <option value="no_available">No Available Doctor!</option>
                            @endforelse
                        </select>
                        @error('doctor')
                            <p class="text-red-600 text-sm">{{ $message }}</p>
                        @enderror
                    </div>

                    <div x-show='dateShow' class="grid">
                        <label for="" class="font-robotoBold text-sm ">Preferred Date:</label>

                        <input x-ref="date" wire:model='date' type="text"
                            class="border  py-2.5 px-4 rounded focus:border-ylw outline-none bg-gray-50 ">
                        @error('date')
                            <p class="text-red-600 text-sm">{{ $message }}</p>
                        @enderror
                    </div>

                    <div class="grid">

                        <button type="submit" class="bg-ylw py-2.5 px-5 text-white hover:opacity-75 rounded">
                            submit
                        </button>
                    </div>
                </form>
            </div>
        </main>
    </section>

    {{-- footer --}}
    <x-pages.footer />
</div>
@script
    <script>
        Alpine.data('main', (disabledDate, doctorSelect) => ({
            dataPick: null,
            notDate: disabledDate,
            dateShow: doctorSelect,



            showDate(dd) {


                this.dataPick = flatpickr(this.$refs.date, {
                    minDate: "today",
                    enableTime: true,
                    minTime: '11',
                    maxTime: '19',
                    time_24hr: true,
                    dateFormat: "Y-m-d h:i K",
                    disable: [...dd, function(date) {
                        return date.getDay() === 0;
                    }],
                    locale: {
                        firstDayOfWeek: 1
                    }
                })

            },

            init() {


                this.$watch('notDate', () => {

                    if (this.dateShow) {
                        if (this.notDate[0] == 'no_available') {
                            const date = new Date();

                            let day = date.getDate();
                            let month = date.getMonth() + 1;
                            let year = date.getFullYear();

                            this.showDate([`${year}-${month}-${day - 1}`]);
                        } else {

                            this.showDate(this.notDate)
                        }



                    }
                })


                Livewire.on('loginfirst', () => {

                    Swal.fire({
                        position: "center",
                        icon: "info",
                        title: "Login First!",
                        showConfirmButton: true,

                    })

                })

                Livewire.on('added', () => {

                    Swal.fire({
                        position: "center",
                        icon: "success",
                        title: "Submited Successfully!",
                        showConfirmButton: true,

                    })

                })
            }

        }))
    </script>
@endscript
