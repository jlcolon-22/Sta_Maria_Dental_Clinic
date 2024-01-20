<header class=" bg-primary h-[5rem] flex items-center">
    <div class="container mx-auto flex justify-between items-center">
        {{-- logo and clinic name --}}
        <a href="/" class="flex items-center gap-x-4">
         <img src="{{ asset('favicon.ico') }}" alt="Clinic Logo">
         <h2 class="text-3xl">Sta.Maria Dental Clinic</h2>
       </a>
        {{-- nav / links --}}
        <nav class="flex items-center gap-x-7">
            <div class="relative">
                <a href="/" class="text-lg {{ request()->is('/') ? 'text-ylw font-bold' : 'font-medium' }} peer">Home</a>
                <div class="transition-all ease-in-out duration-500  bg-ylw  h-[2px] peer-hover:w-full absolute bottom-0 {{ request()->is('/') ? 'w-full' : 'w-0' }}"></div>
            </div>
            <div class="relative">
                <a href="/services"   class="text-lg  {{ request()->routeIs('page_services') ? 'text-ylw font-bold' : 'font-medium' }} peer">Services</a>

                <div class="{{request()->is('services') ? 'w-full' : 'w-0' }} transition-all ease-in-out duration-500  bg-ylw  h-[2px] peer-hover:w-full absolute bottom-0 "></div>
            </div>
            <div class="relative">
                <a href="/location" class="text-lg {{ request()->is('location') ? 'text-ylw font-bold' : 'font-medium' }} peer">Location</a>
                <div class="transition-all ease-in-out duration-500  bg-ylw  h-[2px] peer-hover:w-full absolute bottom-0 {{ request()->is('location') ? 'w-full' : 'w-0' }}"></div>
            </div>
            <div class="relative mr-10">
                <a href="" class="text-lg font-medium  hover:text-ylw transition-all ease-in-out duration-500 peer ">Appointment</a>
                <div class="transition-all ease-in-out duration-500  bg-ylw w-0 h-[2px] peer-hover:w-full absolute bottom-0"></div>
            </div>

            <a href="/auth/type" class="text-base rounded bg-btnPrimary px-6 py-2 ">Login</a>
        </nav>
    </div>
</header>
