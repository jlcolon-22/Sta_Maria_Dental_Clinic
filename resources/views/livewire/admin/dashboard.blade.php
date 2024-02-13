<div class="bg-[#f2f6fa] max-h-[100svh]  ">


    <x-admin.aside>
        <section
            class="text-gray-900 p-10 max-h-[calc(100svh-5rem)] overflow-y-auto relative " :class="aside ? ' max-w-[calc(100svw-17rem)]' : ' max-w-[100svw]'">


            <!-- Breadcrumb -->
            <nav class="flex" aria-label="Breadcrumb">
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



            {{-- cards --}}
            <div class="grid grid-cols-3 gap-x-10 mt-7 p-4">
                <div class="bg-gray-50 border shadow-md flex justify-between  p-4 rounded-md">
                    <div class="grid justify-center">
                        <h1 class="text-primary font-robotoBold text-2xl text-center">DOCTORS</h1>
                        <p class="text-primary text-2xl">{{$doctorCount}} </p>
                    </div>
                    <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24"
                        fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round"
                        stroke-linejoin="round" class="w-[6rem] h-[6rem] text-primary">
                        <path d="M20 21v-2a4 4 0 0 0-4-4H8a4 4 0 0 0-4 4v2"></path>
                        <circle cx="12" cy="7" r="4"></circle>
                    </svg>

                </div>
                <div class="bg-gray-50 border shadow-md flex justify-between  p-4 rounded-md">
                    <div class="grid justify-center">
                        <h1 class="text-primary font-robotoBold text-2xl text-center">Booked</h1>
                        <p class="text-primary text-2xl">{{$bookedCount}}</p>
                    </div>
                    <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24"
                        fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round"
                        stroke-linejoin="round" class="w-[6rem] h-[6rem] text-primary">
                        <rect x="3" y="4" width="18" height="18" rx="2" ry="2"></rect>
                        <line x1="16" y1="2" x2="16" y2="6"></line>
                        <line x1="8" y1="2" x2="8" y2="6"></line>
                        <line x1="3" y1="10" x2="21" y2="10"></line>
                    </svg>

                </div>
                <div class="bg-gray-50 border shadow-md flex justify-between  p-4 rounded-md">
                    <div class="grid justify-center">
                        <h1 class="text-primary font-robotoBold text-2xl text-center">Request</h1>
                        <p class="text-primary text-2xl">{{$requestCount}}</p>
                    </div>
                    <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24"
                        fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round"
                        stroke-linejoin="round" class="w-[6rem] h-[6rem] text-primary">
                        <path d="M20 21v-2a4 4 0 0 0-4-4H8a4 4 0 0 0-4 4v2"></path>
                        <circle cx="12" cy="7" r="4"></circle>
                    </svg>

                </div>

            </div>

            {{-- table --}}
            <div class="bg-white shadow-md rounded-md  mt-10  p-5  ">
                <h2 class="font-robotoBold">Latest Request</h2>
                <div class=" overflow-x-auto rounded-md mt-5 relative">
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

                </div>
            </div>
        </section>

    </x-admin.aside>


</div>
