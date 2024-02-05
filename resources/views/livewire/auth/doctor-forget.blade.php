<div class="bg-[#f2f6fa] ">
    <x-pages.header  />
    {{-- main --}}
    <main class="py-20 text-primary">
        <div class="bg-white w-[25rem] mx-auto  py-5 px-5 rounded shadow-md">
            {{-- <div class="flex items-center justify-center pb-10">
                <img src="{{ asset('favicon.ico') }}" alt="">
                <h2 class="text-4xl font-robotoBold">
                    Sta.Maria Dental CLinic </h2>
            </div> --}}

            <h1 class="text-2xl font-robotoBold  ">Forgot password?</h1>
            <p>
                Enter your registered email address to reset the password
            </p>
            @if (Session::has('error-credentials'))
            <div class="p-4 mb-4 text-sm font-bold text-red-800 rounded-lg bg-red-50 d-400  w-[23rem] mx-auto" role="alert">
                Wrong Credentials!
             </div>
            @endif
            @if (Session::has('info'))
            <div class="p-4 mb-4 text-sm font-bold text-blue-800 rounded-lg bg-blue-400  w-[23rem] mx-auto" role="alert">
                Account Not Active
             </div>
            @endif
            <form wire:submit='doctorLogin' class="grid  mt-4 " autocomplete="off">
                <div class="grid">
                    <label for="" class="font-robotoBold text-sm ">Email Address:</label>
                    <input type="email"
                        class="border  py-2.5 px-4 rounded focus:border-ylw outline-none bg-gray-50 "
                        >
                </div>

                <button class="bg-red-500 w-[23rem] mx-auto text-white py-2 mt-4">
                    <span wire:loading.class="hidden">Submit</span>
                    <div wire:loading>
                       Loading...
                    </div>
                </button>
            </form>

        </div>
    </main>

    <x-pages.footer />
</div>
