<div class="bg-[#f2f6fa] max-h-[100svh] overflow-x-hidden ">


    <x-doctor.aside>
        <section x-data='main'
            class="text-gray-900 py-10 px-5  lg:p-10 max-h-[calc(100svh-5rem)] overflow-y-auto relative  "
            :class="aside ? 'w-full lg:max-w-[calc(100svw-17rem)] ' : 'max-w-[calc(100svw-17rem)] lg:max-w-[100%] min-w-[100%]'">


            <!-- Breadcrumb -->
            <nav class="flex  " aria-label="Breadcrumb">
                <ol class="inline-flex items-center space-x-1 md:space-x-2 rtl:space-x-reverse">
                    <li class="inline-flex items-center">
                        <a href="#"
                            class="inline-flex items-center text-sm font-medium text-gray-700 hover:text-blue-600 ">
                            <svg class="w-3 h-3 me-2.5" aria-hidden="true" xmlns="http://www.w3.org/2000/svg"
                                fill="currentColor" viewBox="0 0 20 20">
                                <path
                                    d="m19.707 9.293-2-2-7-7a1 1 0 0 0-1.414 0l-7 7-2 2a1 1 0 0 0 1.414 1.414L2 10.414V18a2 2 0 0 0 2 2h3a1 1 0 0 0 1-1v-4a1 1 0 0 1 1-1h2a1 1 0 0 1 1 1v4a1 1 0 0 0 1 1h3a2 2 0 0 0 2-2v-7.586l.293.293a1 1 0 0 0 1.414-1.414Z" />
                            </svg>
                            Dashboard
                        </a>
                    </li>

                </ol>
            </nav>




            {{-- table --}}
            <div class="bg-white shadow-md rounded-md mt-7  p-5  ">
                <h2 class="font-robotoBold ">Confirmed Booked
                </h2>
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
                                <th class="py-2 whitespace-nowrap text-center px-2">Pref Date & Time
                                </th>
                                <th class="py-2 whitespace-nowrap text-center px-2">Action</th>

                                {{-- <th class="py-2 whitespace-nowrap text-center px-2">Action</th> --}}

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

                                    <td class="py-3 text-center px-2 space-x-3 text-sm">
                                        <button x-on:click='showPatientHistory({{ $appointment->patient_id }})'
                                            class="text-blue-500 font-robotoBold hover:underline">View
                                            History</button>
                                        <button x-on:click='showUploadModal({{ $appointment->id }})'
                                            class="text-green-500 font-robotoBold hover:underline">
                                            Upload</button>
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

            {{-- modal --}}
            <div class="fixed top-0 left-0 w-full min-h-[100svh] max-h-[100svh] bg-black/45 flex justify-center pt-20 z-50"
                :class="showHistory ? 'block' : 'hidden'">


                <div class="bg-white shadow-md border w-[25rem] sm:w-[40rem] h-fit p-3 rounded-md">
                    <div class="flex justify-between items-center">
                        <h1 class="font-robotoBold text-xl text-primary">Patient History
                        </h1>
                        <button type="button" x-on:click="showHistory = false">
                            <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24"
                                fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round"
                                stroke-linejoin="round" class="text-red-600">
                                <circle cx="12" cy="12" r="10"></circle>
                                <line x1="15" y1="9" x2="9" y2="15"></line>
                                <line x1="9" y1="9" x2="15" y2="15"></line>
                            </svg>
                        </button>
                    </div>
                    <div class=" overflow-x-auto max-h-[20rem] rounded-md  relative mt-5">
                        <table class="w-full text-white  ">
                            <thead class="bg-btnDark  sticky top-0">
                                <tr class=" ">
                                    <th class="py-2 whitespace-nowrap text-center px-2">Doctor</th>
                                    <th class="py-2 whitespace-nowrap text-center px-2">Procedure</th>
                                    <th class="py-2 whitespace-nowrap text-center px-2">Date | Time</th>
                                    <th class="py-2 whitespace-nowrap text-center px-2">Image</th>
                                    <th class="py-2 whitespace-nowrap text-center px-2">Description</th>
                                </tr>
                            </thead>
                            <tbody class="text-gray-900 ">


                                @forelse ($patientHistory as $history)
                                    <tr>

                                        <td class="py-3 text-center px-2 text-sm">{{ $history->doctorInfo->fullname }}
                                        </td>
                                        <td class="py-3 text-center px-2 text-sm">{{ $history->procedure }}</td>
                                        <td class="py-3 text-center px-2 text-sm">
                                            {{ Carbon\Carbon::parse($history->date)->format('M d, Y  h:m A') }}</td>
                                        <td class="py-3 text-center px-2 text-sm">
                                                @if (!!$history->image)
                                                <a href="{{ asset('/storage/history/'.$history->image) }}" class="border-2" target="_blank" rel="noopener noreferrer">
                                                    <img src="{{ asset('/storage/history/'.$history->image) }}" class="w-[5rem] h-[5rem]" alt="">
                                                </a>
                                                @else

                                                    <img src="{{ asset('images/noimage.png') }}" class="w-[4rem] h-[4rem]" alt="">

                                                @endif
                                        </td>
                                        <td class="py-3 text-center px-2 text-sm">
                                           <article> {{ $history->description }}</article></td>
                                    </tr>
                                @empty
                                    <tr>
                                        <td class="py-3 text-gray-500 px-2">No Found!</td>
                                    </tr>
                                @endforelse

                            </tbody>
                        </table>

                    </div>

                </div>

            </div>
            <div class="fixed top-0 left-0 w-full min-h-[100svh] max-h-[100svh] bg-black/45 flex justify-center pt-20 z-50"
                :class="showUpload ? 'block' : 'hidden'">


                <div class="bg-white shadow-md border w-[30rem] h-fit p-3 rounded-md">
                    <div class="flex justify-between items-center">
                        <h1 class="font-robotoBold text-xl text-primary">Upload FIle
                        </h1>
                        <button type="button" x-on:click="showUpload = false">
                            <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24"
                                fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round"
                                stroke-linejoin="round" class="text-red-600">
                                <circle cx="12" cy="12" r="10"></circle>
                                <line x1="15" y1="9" x2="9" y2="15"></line>
                                <line x1="9" y1="9" x2="15" y2="15"></line>
                            </svg>
                        </button>
                    </div>
                    <div class=" overflow-x-auto max-h-[20rem] rounded-md  relative mt-5">
                        <form wire:submit.prevent='uploadFile' enctype="multipart/form-data">
                            <div class="grid mt-2 ">
                                <label for="" class="font-medium text-gray-800">Image<span
                                        class="text-red-600">*</span></label>
                                <input type="file" wire:model="image" autocomplete="off" accept="image/*"
                                    class="border py-2 pl-2 pr-[3.1rem] focus:border-ylw outline-none bg-gray-50 rounded ">
                                @error('number')
                                    <small class="text-red-500">{{ $message }}</small>
                                @enderror
                            </div>
                            <div class="grid mt-2 ">
                                <label for="" class="font-medium text-gray-800">Description<span
                                        class="text-red-600">*</span></label>
                                <textarea wire:model='description' id="" cols="2" rows="2" required
                                    class="border py-2 pl-2 pr-[3.1rem] focus:border-ylw outline-none bg-gray-50 rounded "></textarea>
                                @error('number')
                                    <small class="text-red-500">{{ $message }}</small>
                                @enderror
                            </div>
                            <div class="grid mt-4 ">
                                <button type="submit"
                                    class="border py-2   outline-none hover:opacity-70 bg-ylw text-white rounded">
                                    <span wire:loading.class='hidden'>
                                        Submit
                                    </span>
                                    <div wire:loading wire:target='uploadFile' wire:loading.delay.longest>
                                        loading .....
                                    </div>
                                </button>
                            </div>
                        </form>

                    </div>

                </div>

            </div>
        </section>

    </x-doctor.aside>


</div>
@script
    <script>
        Alpine.data('main', () => ({
            showHistory: false,
            showUpload: false,
            async showPatientHistory(id) {
                await $wire.showHistory(id);
                this.showHistory = !this.showHistory;
            },
            async showUploadModal(id) {
                await $wire.set('ids', id);
                await $wire.edit(id);
                this.showUpload = !this.showUpload;
            },
            init()
            {
                Livewire.on('added', async () => {
                    this.showUpload = !this.showUpload;
                    await Swal.fire({
                        position: "center",
                        icon: "success",
                        title: "Submitted Successfully!",
                        showConfirmButton: false,
                        timer: 1500
                    });

                    location.reload()

                })
            }
        }))
    </script>
@endscript
