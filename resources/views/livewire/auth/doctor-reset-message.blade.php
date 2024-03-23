<div class="bg-[#f2f6fa] ">
    <x-pages.header  />
    {{-- main --}}
    <main class="py-20 text-gray-700">
        <div class="bg-white w-[25rem] mx-auto  py-5 px-5 rounded shadow-md">
            {{-- <div class="flex items-center justify-center pb-10">
                <img src="{{ asset('favicon.ico') }}" alt="">
                <h2 class="text-4xl font-robotoBold">
                    Sta.Maria Dental CLinic </h2>
            </div> --}}

            <h1 class="text-2xl font-robotoBold  ">Submitted Successfully!</h1>

            @if (Session::has('error-email'))
            <div class="p-4 mb-4 text-sm font-bold text-red-800 rounded-lg bg-red-50 d-400  w-[23rem] mx-auto" role="alert">
                Email address is not registered.
             </div>
            @endif

            <p class="p-2">
                Check your email for a link to reset your password. If it doesn’t appear within a few minutes, check your spam folder</p>

        </div>
    </main>

    <x-pages.footer />
</div>
