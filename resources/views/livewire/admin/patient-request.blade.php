@assets
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/flatpickr/dist/flatpickr.min.css">
@endassets
<div class="bg-[#f2f6fa] max-h-[100svh]  ">


    <x-admin.aside>
        <section x-data="main(@entangle('date'),@entangle('doctorNotAvailable'))" class="text-gray-900 p-10 max-h-[calc(100svh-5rem)] overflow-y-auto relative  "
            :class="aside ? ' max-w-[calc(100svw-17rem)]' : ' max-w-[100svw]'">

            <!-- Breadcrumb -->
            <nav class="flex " aria-label="Breadcrumb">
                <ol class="inline-flex items-center space-x-1 md:space-x-2 rtl:space-x-reverse">
                    <li class="inline-flex items-center">
                        <a href="/admin/dashboard"
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
                            <span class="ms-1 text-sm font-medium text-gray-500 md:ms-2 dark:text-gray-400">Doctor
                                Accounts</span>
                        </div>
                    </li>
                </ol>
            </nav>



            {{-- table --}}
            <div class="bg-white shadow-md rounded-md mt-7  p-5  ">
                <h2 class="font-robotoBold">Patient Request</h2>
                <div class="py-2 flex items-center justify-end">

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


                                <th class="py-2 whitespace-nowrap text-center px-2">#</th>
                                <th class="py-2 whitespace-nowrap text-center px-2">Fullname</th>
                                <th class="py-2 whitespace-nowrap text-center px-2">Email</th>
                                <th class="py-2 whitespace-nowrap text-center px-2">Contact</th>
                                <th class="py-2 whitespace-nowrap text-center px-2">Age</th>

                                <th class="py-2 whitespace-nowrap text-center px-2">Procedure</th>
                                <th class="py-2 whitespace-nowrap text-center px-2">Date | Time</th>


                                <th class="py-2 whitespace-nowrap text-center px-2">Action</th>

                            </tr>
                        </thead>
                        <tbody class="text-gray-900">
                            @forelse ($appointments as $appointment)
                                <tr>
                                    <td class="py-3 text-center px-2 text-sm">{{ $appointment->id }}</td>
                                    <td class="py-3 text-center px-2 text-sm">{{ $appointment->fullname }}</td>
                                    <td class="py-3 text-center px-2 text-sm">{{ $appointment->email }}</td>
                                    <td class="py-3 text-center px-2 text-sm">{{ $appointment->number }}</td>
                                    <td class="py-3 text-center px-2 text-sm">{{ $appointment->age }}</td>

                                    <td class="py-3 text-center px-2 text-sm">{{ $appointment->procedure }}</td>
                                    <td class="py-3 text-center px-2 text-sm">
                                        {{ Carbon\Carbon::parse($appointment->date)->format('M d, Y  h:i A') }}</td>



                                    <td class="py-3 text-center px-2 flex justify-center gap-x-2 text-sm">


                                        <button class="text-yellow-500 font-robotoBold hover:underline"
                                            x-on:click="edit({{ $appointment->id }})">Update</button>
                                        <button class="text-green-500 font-robotoBold hover:underline"
                                            x-on:click="confirm({{ $appointment->id }})">Confirm</button>
                                        <button class="text-red-500 font-robotoBold hover:underline"
                                            x-on:click="reject({{ $appointment->id }})">Reject</button>

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
                        {{-- {{ $appointments->links('livewire::tailwind') }}e --}}
                    </div>
                </div>
            </div>


            {{-- add modal --}}
            <div x-show="update"
                class="fixed top-0 w-full min-h-[100svh] max-h-[100svh] flex justify-center overflow-y-auto bg-black/10 left-0 py-20">

                <form x-on:submit.prevent="submitForm" method="POST" x-show="update" x-transition
                    class="bg-white shadow-md border w-[30rem] h-fit p-3 rounded-md">
                    <div class="flex justify-between items-center">
                        <h1 class="font-robotoBold text-xl">Update Request</h1>
                        <button type="button" x-on:click="toggle">
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
                        <label for="" class="font-medium text-gray-800">Fullname<span
                                class="text-red-600">*</span></label>
                        <input type="text" autocomplete="off" wire:model="fullname"
                            class="border py-2 pl-2 pr-[3.1rem] focus:border-ylw outline-none bg-gray-50 rounded ">
                        @error('fullname')
                            <small class="text-red-500">{{ $message }}</small>
                        @enderror
                    </div>
                    <div class="grid mt-2 ">
                        <label for="" class="font-medium text-gray-800">Age<span
                                class="text-red-600">*</span></label>
                        <input type="tel" wire:model="age" autocomplete="off"
                            class="border py-2 pl-2 pr-[3.1rem] focus:border-ylw outline-none bg-gray-50 rounded ">
                        @error('number')
                            <small class="text-red-500">{{ $message }}</small>
                        @enderror
                    </div>
                    <div class="grid mt-2 ">
                        <label for="" class="font-medium text-gray-800">Phone Number<span
                                class="text-red-600">*</span></label>
                        <input type="tel" wire:model="number" autocomplete="off"
                            class="border py-2 pl-2 pr-[3.1rem] focus:border-ylw outline-none bg-gray-50 rounded ">
                        @error('number')
                            <small class="text-red-500">{{ $message }}</small>
                        @enderror
                    </div>

                    <div class="grid mt-2 ">
                        <label for="" class="font-medium text-gray-800">Email Address<span
                                class="text-red-600">*</span></label>
                        <input type="email" wire:model="email" autocomplete="off"
                            class="border py-2 pl-2 pr-[3.1rem] focus:border-ylw outline-none bg-gray-50 rounded ">
                        @error('email')
                            <small class="text-red-500">{{ $message }}</small>
                        @enderror
                    </div>


                    <div class="grid mt-2 ">
                        <label for="" class="font-medium text-gray-800">Procedure<span
                                class="text-red-600">*</span></label>
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
                        @error('username')
                            <small class="text-red-500">{{ $message }}</small>
                        @enderror
                    </div>
                    <div class="grid mt-2 ">
                        <label for="" class="font-medium text-gray-800">Doctor<span
                                class="text-red-600">*</span></label>
                        <select wire:model='doctor'  wire:change='doctor_change'
                            class="border py-3 rounded  px-4 focus:border-ylw outline-none bg-gray-50 ">
                            <option value="" :selected="true">Choose..</option>
                            @forelse ($allDoctor as $doctor)
                                <option value="{{ $doctor->id }}">{{ $doctor->fullname }}</option>

                            @empty
                                <option value="">No Available Doctor!</option>
                            @endforelse
                        </select>
                        @error('password')
                            <small class="text-red-500">{{ $message }}</small>
                        @enderror
                    </div>
                    <div class="grid mt-2 ">
                        <label for="" class="font-medium text-gray-800">Doctor<span
                                class="text-red-600">*</span></label>
                                <input x-ref="date" wire:model='date' type="text"
                                class="border  py-2.5 px-4 rounded focus:border-ylw outline-none bg-gray-50 ">
                        @error('password')
                            <small class="text-red-500">{{ $message }}</small>
                        @enderror
                    </div>
                    <div class="grid mt-4 ">
                        <button type="submit"
                            class="border py-2   outline-none hover:opacity-70 bg-ylw text-white rounded">
                            <span wire:loading.class='hidden'>
                                Update
                            </span>
                            <div wire:loading wire:loading.delay.longest>
                                loading .....
                            </div>
                        </button>
                    </div>
                </form>
            </div>
        </section>

    </x-admin.aside>


</div>

@script
    <script>
        Alpine.data('main', (date,disabledDate) => ({
            dataPick: null,
            notDate: disabledDate,
            update: false,
            notDate: disabledDate,
            dDate:date,
            submitForm() {

                $wire.update();

            },
            confirm(id) {
                Swal.fire({
                    title: "Do you want to confirm it?",
                    showCancelButton: true,
                    confirmButtonText: "Confirm",
                    confirmButtonColor: "#22c55e",
                    denyButtonText: `Don't save`
                }).then((result) => {

                    if (result.isConfirmed) {
                        $wire.confirmAppointment(id);

                    }
                });
            },
            reject(id) {
                Swal.fire({
                    title: "Do you want to reject it?",
                    showCancelButton: true,
                    confirmButtonText: "Reject",
                    confirmButtonColor: "#ef4444",
                    denyButtonText: `Don't save`
                }).then((result) => {

                    if (result.isConfirmed) {
                        $wire.rejectAppointment(id);
                        Swal.fire("Data Rejected!", "", "success");
                    }
                });
            },
            edit(id) {
                $wire.edit(id);
                this.update = true;

            },

            toggle() {
                if (this.add) {
                    $wire.fullname = '';
                    $wire.email = '';
                    $wire.number = '';
                    $wire.email = '';
                    $wire.username = '';
                }
                this.add = !this.add
                this.update = false;
            },
            showDate() {
                this.dataPick = flatpickr(this.$refs.date, {
                    minDate: "today",

                    enableTime: true,
                    dateFormat: "Y-m-d h:i K",

                    disable: this.notDate,
                    locale: {
                        firstDayOfWeek: 1
                    },
                    defaultDate:this.dDate,
                })

            },
            init() {
                this.showDate();

                this.$watch('dDate', () => {
                    console.log(this.dDate)
                    this.showDate();
                })
                this.$watch('notDate', () => {
                    this.showDate();
                })

                Livewire.on('added', () => {
                    this.toggle();
                    Swal.fire({
                        position: "center",
                        icon: "success",
                        title: "Created Successfully!",
                        showConfirmButton: false,
                        timer: 1500
                    });
                })
                Livewire.on('updated', () => {
                    this.toggle();

                    Swal.fire({
                        position: "center",
                        icon: "success",
                        title: "Updated Successfully!",
                        showConfirmButton: false,
                        timer: 1500
                    });

                })
                Livewire.on('confirm', () => {

                    Swal.fire({
                        position: "center",
                        icon: "success",
                        title: "Data successfully transfer!",
                        showConfirmButton: false,
                        timer: 1500
                    });
                })

            },


        }))
    </script>
@endscript