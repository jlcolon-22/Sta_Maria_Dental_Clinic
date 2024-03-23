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


            @if (Session::has('error-email'))
            <div class="p-4 mb-4 text-sm font-bold text-red-800 rounded-lg bg-red-50 d-400  w-[23rem] mx-auto" role="alert">
                Email address is not registered.
             </div>
            @endif

            @if (Session::has('expired'))
            <div>
                <p class="text-2xl font-robotoBold ">
                    Unsuccessful Verification
                </p>
                <p>
                    The link you're trying to access is invalid or has expired. Kindly recheck your email or re-enter
                    your email address in the <a href="/auth/doctor/forget" class="text-blue-500 hover:underline">Forgot Password</a> page.</p>
            </div>
            @else
            <h1 class="text-2xl font-robotoBold  ">Reset Password</h1>

            <form wire:submit='reset_password' class="grid gap-2 mt-4 " autocomplete="off">
                <div class="grid">
                    <label for="" class="font-robotoBold text-sm ">Password:</label>
                    <input type="password" wire:model='password'
                        class="border  py-2.5 px-4 rounded focus:border-ylw outline-none bg-gray-50 "
                        >
                        @error('password')
                            <small class="text-red-500">{{ $message }}</small>
                        @enderror
                </div>
                <div class="grid">
                    <label for="" class="font-robotoBold text-sm ">Confirm Password:</label>
                    <input type="password" wire:model='password_confirmation'
                        class="border  py-2.5 px-4 rounded focus:border-ylw outline-none bg-gray-50 "
                        >
                        @error('password_confirmation')
                            <small class="text-red-500">{{ $message }}</small>
                        @enderror
                </div>
                <button class="bg-red-500 w-[23rem] mx-auto text-white py-2 mt-4">
                    <span wire:loading.class="hidden">Reset</span>
                    <div wire:loading>
                       Loading...
                    </div>
                </button>
            </form>
            @endif
        </div>
    </main>

    <x-pages.footer />
</div>
