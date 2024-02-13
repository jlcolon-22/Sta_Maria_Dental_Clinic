<header x-data="{setting: false}" class=" bg-primary h-[5rem] flex items-center">
    <div class="container mx-auto flex justify-between items-center">
        {{-- logo and clinic name --}}
        <a href="/" class="flex items-center gap-x-4">
         <img src="{{ asset('favicon.ico') }}" alt="Clinic Logo">
         <h2 class="text-3xl">Sta.Maria Dental Clinic</h2>
       </a>
        {{-- nav / links --}}
        <nav x-data="{path: window.location.pathname}" class="flex items-center gap-x-7">
            <div class="relative">

                <a href="/" class="text-lg  peer" :class="path == '/'  ? 'text-ylw font-bold' : 'font-medium'">HOME</a>
                <div class="transition-all ease-in-out duration-500  bg-ylw  h-[2px] peer-hover:w-full absolute bottom-0 " :class="path == '/' ? 'w-full' : 'w-0'"></div>
            </div>
            <div class="relative">
                <a href="/services"   class="text-lg peer" :class="path == '/services'  ? 'text-ylw font-bold' : 'font-medium'">SERVICES</a>

                <div class="transition-all ease-in-out duration-500  bg-ylw  h-[2px] peer-hover:w-full absolute bottom-0 " :class="path == '/services' ? 'w-full' : 'w-0'"></div>
            </div>
            <div class="relative">
                <a href="/location" class="text-lg peer"  :class="path == '/location'  ? 'text-ylw font-bold' : 'font-medium'">LOCATION</a>
                <div class="transition-all ease-in-out duration-500  bg-ylw  h-[2px] peer-hover:w-full absolute bottom-0 " :class="path == '/location' ? 'w-full' : 'w-0'"></div>
            </div>
            <div class="relative mr-10">
                <a href="/appointment" class="text-lg peer"  :class="path == '/appointment'  ? 'text-ylw font-bold' : 'font-medium'">APPOINTMENT</a>
                <div class="transition-all ease-in-out duration-500  bg-ylw  h-[2px] peer-hover:w-full absolute bottom-0 " :class="path == '/appointment' ? 'w-full' : 'w-0'"></div>
            </div>

            @if (Auth::guard('patient')->check())

            <button x-data="{dropdown: false}" class="w-[3rem] h-[3rem] bg-btnSecondary rounded-full flex justify-center items-center relative" x-on:click="dropdown = !dropdown">
                <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="w-[2.5rem]"><path d="M20 21v-2a4 4 0 0 0-4-4H8a4 4 0 0 0-4 4v2"></path><circle cx="12" cy="7" r="4"></circle></svg>

                {{-- dropdown --}}

                <div x-show='dropdown' x-transition id="dropdownAvatar" class="z-10 absolute right-0 left-auto top-[3rem] bg-white divide-y divide-gray-100 rounded-lg shadow w-44 ">
                    <div class="px-4 py-3 text-sm text-gray-900 ">
                      <div>{{ Auth::guard('patient')->user()->fullname }}</div>
                      <div class="font-medium truncate">{{ Auth::guard('patient')->user()->email }}</div>
                    </div>
                    <ul class="py-2 text-sm text-gray-700 " aria-labelledby="dropdownUserAvatarButton">
                      <li>
                        <a href="/patient/appointment" class="block px-4 py-2 hover:bg-gray-100 ">My Appointment</a>
                      </li>
                      <li>
                        <a type="button" x-on:click="setting = true" class="block px-4 py-2 hover:bg-gray-100 ">Setting</a>
                      </li>
                    </ul>
                    <div class="py-2">
                      <a href="/patient/logout" class="block px-4 py-2 text-sm text-gray-700 hover:bg-gray-100 ">Sign out</a>
                    </div>
                </div>
            </button>
            @else
            <a href="/auth/type" class="text-base rounded bg-btnPrimary px-6 py-2 ">Login</a>
            @endif
        </nav>
    </div>


    @if (Auth::guard('patient')->check())
    <livewire:patient.patient-setting />
    @endif

</header>
