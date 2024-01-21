<div class="bg-[#f2f6fa] max-h-[100svh]  ">


        <section class="text-gray-900 p-10 max-h-[calc(100svh-5rem)] overflow-y-auto">
                <h1 class="font-robotoBold text-3xl ">Dashboard</h1>

                {{-- cards --}}
                <div class="grid grid-cols-3 gap-x-10 mt-4 p-4">
                    <div class="bg-gray-50 border shadow-md flex justify-between  p-4 rounded-md">
                        <div class="grid justify-center" >
                            <h1 class="text-primary font-robotoBold text-2xl text-center">USERS</h1>
                            <p class="text-primary text-2xl">102 </p>
                        </div>
                        <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="w-[6rem] h-[6rem] text-primary"><path d="M20 21v-2a4 4 0 0 0-4-4H8a4 4 0 0 0-4 4v2"></path><circle cx="12" cy="7" r="4"></circle></svg>

                    </div>
                    <div class="bg-gray-50 border shadow-md flex justify-between  p-4 rounded-md">
                        <div class="grid justify-center">
                            <h1 class="text-primary font-robotoBold text-2xl text-center">Booked</h1>
                            <p class="text-primary text-2xl">102 |</p>
                        </div>
                        <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"  class="w-[6rem] h-[6rem] text-primary"><rect x="3" y="4" width="18" height="18" rx="2" ry="2"></rect><line x1="16" y1="2" x2="16" y2="6"></line><line x1="8" y1="2" x2="8" y2="6"></line><line x1="3" y1="10" x2="21" y2="10"></line></svg>

                    </div>
                    <div class="bg-gray-50 border shadow-md flex justify-between  p-4 rounded-md">
                        <div class="grid justify-center">
                            <h1 class="text-primary font-robotoBold text-2xl text-center">Doctors</h1>
                            <p class="text-primary text-2xl">102 |</p>
                        </div>
                        <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="w-[6rem] h-[6rem] text-primary"><path d="M20 21v-2a4 4 0 0 0-4-4H8a4 4 0 0 0-4 4v2"></path><circle cx="12" cy="7" r="4"></circle></svg>

                    </div>

                </div>

                {{-- table --}}
                <div class="bg-white shadow-md rounded-md border mt-10 py-5 px-5">
                    <h2 class="font-robotoBold">Latest Request</h2>
                    <table class="table-auto w-full text-white mt-5">
                        <thead class="bg-btnDark ">
                            <tr>
                                <th class="py-3 text-center px-2">#</th>
                                <th class="py-3 text-center px-2">Firstname</th>
                                <th class="py-3 text-center px-2">Lastname</th>
                                <th class="py-3 text-center px-2">Age</th>
                                <th class="py-3 text-center px-2">Contact</th>
                                <th class="py-3 text-center px-2">Email</th>
                                <th class="py-3 text-center px-2">Procedure</th>
                                <th class="py-3 text-center px-2">Pref Date & Time</th>
                                <th class="py-3 text-center px-2">Action</th>
                            </tr>
                        </thead>
                        <tbody class="text-gray-900">
                            <tr >
                                <td class="py-3 text-center px-2">22</td>
                                <td class="py-3 text-center px-2">Joshua</td>
                                <td class="py-3 text-center px-2">Aquino</td>
                                <td class="py-3 text-center px-2">22</td>
                                <td class="py-3 text-center px-2">091014210333</td>
                                <td class="py-3 text-center px-2">joshua@gmail.com</td>
                                <td class="py-3 text-center px-2">Root Canal Treatment</td>
                                <td class="py-3 text-center px-2">2025-02-22 01:31 PM</td>
                                <td class="py-3 text-center px-2 flex gap-x-2">
                                    <button class="text-yellow-500 font-robotoBold">Update</button>
                                    |
                                    <button class="text-green-500 font-robotoBold">Confirm</button>
                                    |
                                    <button class="text-red-500 font-robotoBold">Drop</button>
                                </td>
                            </tr>
                            <tr >
                                <td class="py-3 text-center px-2">22</td>
                                <td class="py-3 text-center px-2">Joshua</td>
                                <td class="py-3 text-center px-2">Aquino</td>
                                <td class="py-3 text-center px-2">22</td>
                                <td class="py-3 text-center px-2">091014210333</td>
                                <td class="py-3 text-center px-2">joshua@gmail.com</td>
                                <td class="py-3 text-center px-2">Root Canal Treatment</td>
                                <td class="py-3 text-center px-2">2025-02-22 01:31 PM</td>
                                <td class="py-3 text-center px-2 flex gap-x-2">
                                    <button class="text-yellow-500 font-robotoBold">Update</button>
                                    |
                                    <button class="text-green-500 font-robotoBold">Confirm</button>
                                    |
                                    <button class="text-red-500 font-robotoBold">Drop</button>
                                </td>
                            </tr>
                        </tbody>
                    </table>
                </div>
        </section>


</div>
