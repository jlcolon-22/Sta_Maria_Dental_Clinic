<div class="bg-[#f2f6fa] max-h-[100svh]  ">


    <x-admin.aside>
        <section x-data="main"
            class="text-gray-900 py-10 px-5  lg:p-10 max-h-[calc(100svh-5rem)] overflow-y-auto relative  " :class="aside ? 'w-full lg:max-w-[calc(100svw-17rem)] ' : 'max-w-[calc(100svw-17rem)] lg:max-w-[100%] min-w-[100%]'">

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
                            <span
                                class="ms-1 text-sm font-medium text-gray-500 md:ms-2 dark:text-gray-400">Booked</span>
                        </div>
                    </li>
                </ol>
            </nav>



            <div class="bg-white shadow-md rounded-md mt-7  p-5 overflow-hidden  ">
                <h2 class="font-robotoBold">Confirmed Booked</h2>
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
                                <th class="py-2 whitespace-nowrap text-center px-2">Doctor</th>
                                <th class="py-2 whitespace-nowrap text-center px-2">Fullname</th>
                                <th class="py-2 whitespace-nowrap text-center px-2">Email</th>
                                <th class="py-2 whitespace-nowrap text-center px-2">Contact</th>
                                <th class="py-2 whitespace-nowrap text-center px-2">Age</th>

                                <th class="py-2 whitespace-nowrap text-center px-2">Procedure</th>
                                <th class="py-2 whitespace-nowrap text-center px-2">Pref Date & Time	</th>



                            </tr>
                        </thead>
                        <tbody class="text-gray-900">
                            @forelse ($appointments as $appointment)
                                <tr>
                                    <td class="py-3 text-center px-2 text-sm">{{ $appointment->id }}</td>
                                    <td class="py-3 text-center px-2 text-sm">{{ $appointment->doctorInfo->fullname }}</td>
                                    <td class="py-3 text-center px-2 text-sm">{{ $appointment->fullname }}</td>
                                    <td class="py-3 text-center px-2 text-sm">{{ $appointment->email }}</td>
                                    <td class="py-3 text-center px-2 text-sm">{{ $appointment->number }}</td>
                                    <td class="py-3 text-center px-2 text-sm">{{ $appointment->age }}</td>

                                    <td class="py-3 text-center px-2 text-sm">{{ $appointment->procedure }}</td>
                                    <td class="py-3 text-center px-2 text-sm">
                                        {{ Carbon\Carbon::parse($appointment->date)->format('M d, Y  h:i A') }}</td>



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


        </section>

    </x-admin.aside>


</div>

@script
    <script>
        Alpine.data('main', () => ({
            add: false,
            update: false,
            submitForm() {
                if (this.update) {
                    $wire.update();
                } else {
                    $wire.store();
                }
            },
            edit() {
                this.add = !this.add
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
            destroy(id) {

                Swal.fire({
                    title: "Are you sure?",
                    text: "You won't be able to revert this!",
                    icon: "warning",
                    showCancelButton: true,
                    confirmButtonColor: "#3085d6",
                    cancelButtonColor: "#d33",
                    confirmButtonText: "Yes, delete it!"
                }).then((result) => {
                    if (result.isConfirmed) {
                        $wire.destroy(id);
                        Swal.fire({
                            title: "Deleted!",
                            text: "Your file has been deleted.",
                            icon: "success"
                        });
                    }
                });
            },
            init() {
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

            }
        }))
    </script>
@endscript
