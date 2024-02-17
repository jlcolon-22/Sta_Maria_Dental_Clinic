<div>
    <x-pages.header  />

    <section class=" bg-[#f2f6fa] pb-28 pt-20 text-primary px-2 lg:px-0" >
        <div x-data="{map: true}" class=" container mx-auto">
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
                                        <span class="bg-yellow-100 text-yellow-800 text-xs font-medium me-2 px-2.5 py-0.5 rounded ">Processing</span>
                                        @elseif($appointment->status == 1)
                                        <span class="bg-green-100 text-green-800 text-xs font-medium me-2 px-2.5 py-0.5 rounded ">Approved</span>
                                        @else
                                        <span class="bg-red-100 text-red-800 text-xs font-medium me-2 px-2.5 py-0.5 rounded ">Canceled</span>
                                        @endif
                                    </td>
                                    <td class="py-3 text-center px-2 text-sm">{{ $appointment->branchInfo->branch_name }}</td>
                                    <td class="py-3 text-center px-2 text-sm">{{ $appointment->fullname }}</td>
                                    <td class="py-3 text-center px-2 text-sm">{{ $appointment->email }}</td>
                                    <td class="py-3 text-center px-2 text-sm">{{ $appointment->number }}</td>
                                    <td class="py-3 text-center px-2 text-sm">{{ $appointment->age }}</td>
                                    <td class="py-3 text-center px-2 text-sm">{{ $appointment->doctorInfo?->fullname }}</td>

                                    <td class="py-3 text-center px-2 text-sm">{{ $appointment->procedure }}</td>
                                    <td class="py-3 text-center px-2 text-sm">{{ Carbon\Carbon::parse($appointment->date)->format('M d, Y  h:m A') }}</td>



                                    <td class="py-3 text-center px-2 flex justify-center gap-x-2 text-sm">

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
    </section>

    {{-- footer --}}
    <x-pages.footer/>
</div>
