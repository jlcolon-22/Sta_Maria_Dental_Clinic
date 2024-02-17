<div class="bg-[#f2f6fa] ">
    <x-pages.header  />
    {{-- main --}}
    <main class="py-20 text-primary p-2">
        <div class="bg-white w-full sm:w-[35rem] mx-auto pb-20 pt-10 rounded shadow-md">
            <div class="flex items-center justify-center pb-10">
                <img src="{{ asset('favicon.ico') }}" alt="">
                <h2 class="text-2xl sm:text-3xl lg:text-4xl font-robotoBold">
                    Sta.Maria Dental CLinic </h2>
            </div>

            <h1 class="text-3xl font-robotoBold text-center  ">Doctor Login</h1>


            <form wire:submit.prevent='doctorLogin' class="space-y-3 px-3 sm:px-20 pt-10" autocomplete="off">
                @if (Session::has('error-credentials'))
                    <div class="p-4 mb-4 text-sm font-bold text-red-800 rounded-lg bg-red-50  " role="alert">
                        Wrong Credentials!
                    </div>
                @endif
                @if (Session::has('info'))
                <div class="p-4 mb-4 text-sm font-bold text-blue-800 rounded-lg bg-blue-400 " role="alert">
                    Account Not Active
                 </div>
                @endif
                @if (Session::has('error'))
                    <div class="p-4 mb-4 text-sm text-red-800 rounded-lg bg-red-50" role="alert">
                        Please log in first to see this page!
                    </div>
                @endif
                <div class="grid relative ">

                    <div class="absolute left-1 top-0  px-2 py-[8.5px]">
                        <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24"
                            fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round"
                            stroke-linejoin="round">
                            <path d="M20 21v-2a4 4 0 0 0-4-4H8a4 4 0 0 0-4 4v2"></path>
                            <circle cx="12" cy="7" r="4"></circle>
                        </svg>
                    </div>
                    <input type="text" autocomplete="off" wire:model='username'
                        class="border text-center px-10 py-2 focus:border-ylw outline-none bg-gray-50 "
                        placeholder="Username">
                    @error('password')
                        <small class="text-red-500">{{ $message }}</small>
                    @enderror
                </div>
                <div x-data="{ password: false }" class="grid relative mt-4 ">

                    <div class="absolute left-1 top-0  px-2 py-[8.5px]">
                        <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24"
                            fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round"
                            stroke-linejoin="round" class="feather feather-lock">
                            <rect x="3" y="11" width="18" height="11" rx="2" ry="2"></rect>
                            <path d="M7 11V7a5 5 0 0 1 10 0v4"></path>
                        </svg>
                    </div>
                    <input :type="password ? 'text' : 'password'" autocomplete="off" wire:model='password'
                        class="border text-center px-10 py-2 focus:border-ylw outline-none bg-gray-50 "
                        placeholder="Password">
                    <div class="absolute right-1 top-0  px-2 py-[8.5px]">

                        <input type="checkbox" id="eye" class="fill-btnPrimary hidden" x-model="password">
                        <label for="eye" class="text-sm">
                            <svg x-show="password" xmlns="http://www.w3.org/2000/svg" width="24" height="24"
                                viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"
                                stroke-linecap="round" stroke-linejoin="round" class="feather feather-eye w-[1rem]">
                                <path d="M1 12s4-8 11-8 11 8 11 8-4 8-11 8-11-8-11-8z"></path>
                                <circle cx="12" cy="12" r="3"></circle>
                            </svg>
                            <svg x-show="password == false" xmlns="http://www.w3.org/2000/svg" width="24"
                                height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"
                                stroke-linecap="round" stroke-linejoin="round" class="feather feather-eye-off w-[1rem]">
                                <path
                                    d="M17.94 17.94A10.07 10.07 0 0 1 12 20c-7 0-11-8-11-8a18.45 18.45 0 0 1 5.06-5.94M9.9 4.24A9.12 9.12 0 0 1 12 4c7 0 11 8 11 8a18.5 18.5 0 0 1-2.16 3.19m-6.72-1.07a3 3 0 1 1-4.24-4.24">
                                </path>
                                <line x1="1" y1="1" x2="23" y2="23"></line>
                            </svg>
                        </label>
                    </div>
                    @error('password')
                        <small class="text-red-500">{{ $message }}</small>
                    @enderror
                    <div class="flex items-center justify-end  ">
                        <a href="" class="text-blue-500 hover:underline">Forget password</a>

                    </div>

                </div>

                <div class="grid">
                    <button class="bg-btnDark  text-white py-2 mt-2">
                        <span wire:loading.class="hidden">Login</span>
                        <div wire:loading>
                            Loading...
                        </div>
                    </button>
                </div>
                <div class="flex items-center justify-center pt-4  ">

                    <span>Don't have an account? <a href="/auth/patient/signup"
                            class="text-blue-500 hover:underline font-robotoBold">Sign up</a></span>
                </div>
            </form>

        </div>
    </main>

    <x-pages.footer />
</div>
