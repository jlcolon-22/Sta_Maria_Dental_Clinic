<header class=" bg-primary h-[5rem] flex items-center">
    <div class="container mx-auto flex justify-between items-center">
        {{-- logo and clinic name --}}
        <a href="/" class="flex items-center gap-x-4">
         <img src="{{ asset('favicon.ico') }}" alt="Clinic Logo">
         <h2 class="text-3xl">Sta.Maria Dental Clinic</h2>
       </a>
        {{-- nav / links --}}
        <nav x-data="{path: window.location.pathname}" class="flex items-center gap-x-7">
            <div class="relative">

                <a href="/" class="text-lg  peer" :class="path == '/'  ? 'text-ylw font-bold' : 'font-medium'">Home</a>
                <div class="transition-all ease-in-out duration-500  bg-ylw  h-[2px] peer-hover:w-full absolute bottom-0 " :class="path == '/' ? 'w-full' : 'w-0'"></div>
            </div>
            <div class="relative">
                <a href="/services"   class="text-lg peer" :class="path == '/services'  ? 'text-ylw font-bold' : 'font-medium'">Services</a>

                <div class="transition-all ease-in-out duration-500  bg-ylw  h-[2px] peer-hover:w-full absolute bottom-0 " :class="path == '/services' ? 'w-full' : 'w-0'"></div>
            </div>
            <div class="relative">
                <a href="/location" class="text-lg peer"  :class="path == '/location'  ? 'text-ylw font-bold' : 'font-medium'">Location</a>
                <div class="transition-all ease-in-out duration-500  bg-ylw  h-[2px] peer-hover:w-full absolute bottom-0 " :class="path == '/location' ? 'w-full' : 'w-0'"></div>
            </div>
            <div class="relative mr-10">
                <a href="/appointment" class="text-lg peer"  :class="path == '/appointment'  ? 'text-ylw font-bold' : 'font-medium'">Appointment</a>
                <div class="transition-all ease-in-out duration-500  bg-ylw  h-[2px] peer-hover:w-full absolute bottom-0 " :class="path == '/appointment' ? 'w-full' : 'w-0'"></div>
            </div>

            <a href="/auth/type" class="text-base rounded bg-btnPrimary px-6 py-2 ">Login</a>
        </nav>
    </div>
</header>
