<main class="flex max-h-[100svh]  " x-data="{ aside: true }">
    <aside class="bg-white min-w-[17rem] max-w-[17rem] min-h-screen" :class="aside ? '' : '  hidden'">
        <div class="flex items-center pt-5 justify-center gap-x-2">
            <img src="{{ asset('favicon.ico') }}" alt="">
            <h1 class="text-4xl font-robotoBold  text-primary">STDC</h1>
        </div>
        <h3 class="text-center  text-primary">(ADMIN {{ Auth::guard('web')->user()->branch_name }})</h3>

        {{-- links --}}
        <div class="px-5 grid gap-y-3 mt-10" x-data="{ path: window.location.pathname }">
            <h1 x-text="path"></h1>
            <a href="/admin/dashboard"
                class="flex gap-x-2   py-3 px-4  rounded-md group hover:text-gray-50 hover:bg-btnDark transition-all ease-in-out duration-500"
                :class="path == '/admin/dashboard' ? 'text-gray-50 bg-btnDark' : 'text-gray-500'">
                <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none"
                    stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"
                    class=" group-hover:text-gray-50 transition-all ease-in-out duration-500"
                    :class="path == '/admin/dashboard' ? 'text-gray-50' : 'text-gray-500 '">
                    <path d="M3 9l9-7 9 7v11a2 2 0 0 1-2 2H5a2 2 0 0 1-2-2z"></path>
                    <polyline points="9 22 9 12 15 12 15 22"></polyline>
                </svg>
                Dashboard
            </a>
            <a href="/admin/patient-request"
            class="flex gap-x-2   py-3 px-4  rounded-md group hover:text-gray-50 hover:bg-btnDark transition-all ease-in-out duration-500"
            :class="path == '/admin/patient-request' ? 'text-gray-50 bg-btnDark' : 'text-gray-500'">
                <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none"
                    stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"
                    class=" group-hover:text-gray-50 transition-all ease-in-out duration-500"
                    :class="path == '/admin/patient-request' ? 'text-gray-50' : 'text-gray-500 '">
                    <path d="M20 21v-2a4 4 0 0 0-4-4H8a4 4 0 0 0-4 4v2"></path>
                    <circle cx="12" cy="7" r="4"></circle>
                </svg>
                Request
            </a>
            <a href="/admin/patient-confirmed"
            class="flex gap-x-2   py-3 px-4  rounded-md group hover:text-gray-50 hover:bg-btnDark transition-all ease-in-out duration-500"
            :class="path == '/admin/patient-confirmed' ? 'text-gray-50 bg-btnDark' : 'text-gray-500'">
                <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none"
                    stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"
                    class=" group-hover:text-gray-50 transition-all ease-in-out duration-500"
                    :class="path == '/admin/patient-confirmed' ? 'text-gray-50' : 'text-gray-500 '">
                    <line x1="8" y1="6" x2="21" y2="6"></line>
                    <line x1="8" y1="12" x2="21" y2="12"></line>
                    <line x1="8" y1="18" x2="21" y2="18"></line>
                    <line x1="3" y1="6" x2="3.01" y2="6"></line>
                    <line x1="3" y1="12" x2="3.01" y2="12"></line>
                    <line x1="3" y1="18" x2="3.01" y2="18"></line>
                </svg>
                Booked
            </a>
            {{-- <a href=""
                class="flex gap-x-2  text-gray-500 py-3 px-4  rounded-md group hover:text-gray-50 hover:bg-btnDark transition-all ease-in-out duration-500">
                <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none"
                    stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"
                    class="text-gray-500 group-hover:text-gray-50 transition-all ease-in-out duration-500">
                    <rect x="3" y="4" width="18" height="18" rx="2" ry="2"></rect>
                    <line x1="16" y1="2" x2="16" y2="6"></line>
                    <line x1="8" y1="2" x2="8" y2="6"></line>
                    <line x1="3" y1="10" x2="21" y2="10"></line>
                </svg>
                Schedule
            </a> --}}
            <a href="/admin/doctor-account"
            class="flex gap-x-2   py-3 px-4  rounded-md group hover:text-gray-50 hover:bg-btnDark transition-all ease-in-out duration-500"
            :class="path == '/admin/doctor-account' ? 'text-gray-50 bg-btnDark' : 'text-gray-500'">

                <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24"
                    fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round"
                    stroke-linejoin="round"
                    class=" group-hover:text-gray-50 transition-all ease-in-out duration-500"
                    :class="path == '/admin/doctor-account' ? 'text-gray-50' : 'text-gray-500 '">
                    <path d="M17 21v-2a4 4 0 0 0-4-4H5a4 4 0 0 0-4 4v2"></path>
                    <circle cx="9" cy="7" r="4"></circle>
                    <path d="M23 21v-2a4 4 0 0 0-3-3.87"></path>
                    <path d="M16 3.13a4 4 0 0 1 0 7.75"></path>
                </svg>
                Doctor Account
            </a>
            <a href="/admin/inventory"
                class="flex gap-x-2   py-3 px-4  rounded-md group hover:text-gray-50 hover:bg-btnDark transition-all ease-in-out duration-500"
                :class="path == '/admin/inventory' ? 'text-gray-50 bg-btnDark' : 'text-gray-500'">
                <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24"
                    fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round"
                    stroke-linejoin="round" class=" group-hover:text-gray-50 transition-all ease-in-out duration-500"
                    :class="path == '/admin/inventory' ? 'text-gray-50' : 'text-gray-500 '">
                    <path
                        d="M21 16V8a2 2 0 0 0-1-1.73l-7-4a2 2 0 0 0-2 0l-7 4A2 2 0 0 0 3 8v8a2 2 0 0 0 1 1.73l7 4a2 2 0 0 0 2 0l7-4A2 2 0 0 0 21 16z">
                    </path>
                    <polyline points="3.27 6.96 12 12.01 20.73 6.96"></polyline>
                    <line x1="12" y1="22.08" x2="12" y2="12"></line>
                </svg>
                Inventory
            </a>


        </div>
    </aside>

    {{-- content section --}}
    <section class="w-[100%]">
        {{-- top bar --}}
        <nav x-data="{ dropdown: false }" class="bg-white w-full py-4 px-6 flex items-center justify-between h-[5rem]">
            <button x-on:click="aside = !aside" class="hover:opacity-55"><img src="{{ asset('icons/menu.svg') }}"
                    alt=""></button>

            <button class="relative group" x-on:click="dropdown = !dropdown">
                <img src="{{ asset('assets/software-engineer_6024190.png') }}"
                    class="min-h-[3rem] max-h-[3rem] min-w-[3rem] max-w-[3rem]  rounded-full border-2 border-btnSecondary"
                    alt="">

                <div class="z-10  absolute left-auto right-0 bg-white divide-y divide-gray-100 rounded-lg shadow w-44 "
                    :class="dropdown ? 'animate-in fade-in zoom-in' : 'hidden '">
                    <div class="px-4 py-3 text-sm text-gray-900 ">
                        <div class="font-medium ">{{ Auth::guard('web')->user()->branch_name }}</div>
                        <div class="truncate">{{ Auth::guard('web')->user()->branch_email }}</div>
                    </div>
                    <ul class="py-2 text-sm text-gray-700 "
                        aria-labelledby="dropdownInformdropdownAvatarNameButtonationButton">

                        <li>
                            <a href="/admin/setting" class="flex items-center gap-x-6 px-4 py-2 hover:bg-gray-100 ">
                                <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24"
                                    viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"
                                    stroke-linecap="round" stroke-linejoin="round" class="w-[1.2rem]">
                                    <circle cx="12" cy="12" r="3"></circle>
                                    <path
                                        d="M19.4 15a1.65 1.65 0 0 0 .33 1.82l.06.06a2 2 0 0 1 0 2.83 2 2 0 0 1-2.83 0l-.06-.06a1.65 1.65 0 0 0-1.82-.33 1.65 1.65 0 0 0-1 1.51V21a2 2 0 0 1-2 2 2 2 0 0 1-2-2v-.09A1.65 1.65 0 0 0 9 19.4a1.65 1.65 0 0 0-1.82.33l-.06.06a2 2 0 0 1-2.83 0 2 2 0 0 1 0-2.83l.06-.06a1.65 1.65 0 0 0 .33-1.82 1.65 1.65 0 0 0-1.51-1H3a2 2 0 0 1-2-2 2 2 0 0 1 2-2h.09A1.65 1.65 0 0 0 4.6 9a1.65 1.65 0 0 0-.33-1.82l-.06-.06a2 2 0 0 1 0-2.83 2 2 0 0 1 2.83 0l.06.06a1.65 1.65 0 0 0 1.82.33H9a1.65 1.65 0 0 0 1-1.51V3a2 2 0 0 1 2-2 2 2 0 0 1 2 2v.09a1.65 1.65 0 0 0 1 1.51 1.65 1.65 0 0 0 1.82-.33l.06-.06a2 2 0 0 1 2.83 0 2 2 0 0 1 0 2.83l-.06.06a1.65 1.65 0 0 0-.33 1.82V9a1.65 1.65 0 0 0 1.51 1H21a2 2 0 0 1 2 2 2 2 0 0 1-2 2h-.09a1.65 1.65 0 0 0-1.51 1z">
                                    </path>
                                </svg>
                                Settings
                            </a>
                        </li>
                        <li>
                            <a href="/admin/logout" class="flex items-center gap-x-7 px-4 py-2 hover:bg-gray-100 ">
                                <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24"
                                    viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"
                                    stroke-linecap="round" stroke-linejoin="round" class="w-[1.2rem]">
                                    <path d="M9 21H5a2 2 0 0 1-2-2V5a2 2 0 0 1 2-2h4"></path>
                                    <polyline points="16 17 21 12 16 7"></polyline>
                                    <line x1="21" y1="12" x2="9" y2="12"></line>
                                </svg>
                                Logout
                            </a>
                        </li>

                    </ul>

                </div>
            </button>
        </nav>
        {{ $slot }}
    </section>
</main>
