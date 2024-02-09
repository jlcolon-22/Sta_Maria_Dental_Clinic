<div class="bg-[#f2f6fa] ">
    <x-pages.header  />
    {{-- main --}}
    <main x-data='main' class="py-20 text-primary">
        <div class="bg-white max-w-[35rem] mx-auto pb-20 pt-10 rounded shadow-md">
            <div class="flex items-center justify-center pb-10">
                <img src="{{ asset('favicon.ico') }}" alt="">
                <h2 class="text-4xl font-robotoBold">
                    Sta.Maria Dental CLinic </h2>
            </div>

            <h1 class="text-3xl font-robotoBold text-center  ">Patient Sign Up</h1>
            <form  wire:submit.prevent='store' class="space-y-4 px-10 pt-10" autocomplete="off">

                <div class="grid ">
                    <label for="" class="font-robotoBold text-sm ">Fullname:</label>
                    <input type="text" wire:model='fullname'
                        class="border  py-2.5 px-4 rounded focus:border-ylw outline-none bg-gray-50 "
                        >
                        @error('fullname')
                        <small class="text-red-500">{{$message}}</small>
                        @enderror
                </div>
                <div class="grid " >
                    <label for="" class="font-robotoBold text-sm ">Email address:</label>
                    <input type="email" wire:model='email'
                        class="border  py-2.5 px-4 rounded focus:border-ylw outline-none bg-gray-50 "
                        >
                        @error('email')
                        <small class="text-red-500">{{$message}}</small>
                        @enderror
                </div>
                <div class="grid " >
                    <label for="" class="font-robotoBold text-sm ">Phone Number:</label>
                    <input type="tel" wire:model='number'
                        class="border  py-2.5 px-4 rounded focus:border-ylw outline-none bg-gray-50 "
                        >
                        @error('number')
                        <small class="text-red-500">{{$message}}</small>
                        @enderror
                </div>
                <div class="grid " >
                    <label for="" class="font-robotoBold text-sm ">Username:</label>
                    <input type="text" wire:model='username'
                        class="border  py-2.5 px-4 rounded focus:border-ylw outline-none bg-gray-50 "
                        >
                        @error('username')
                        <small class="text-red-500">{{$message}}</small>
                        @enderror
                </div>


                <div x-data="{ password: false }" class=" grid relative mt-4 ">

                    <label for="" class="font-robotoBold text-sm ">Password:</label>
                    <input :type="password ? 'text' : 'password'" autocomplete="off" wire:model='password'
                    class="border  py-2.5 px-4 rounded focus:border-ylw outline-none bg-gray-50 "
                        >
                    <div class="absolute right-1 top-[22px] px-2 py-[8.5px]">

                        <input type="checkbox" id="eye" class="fill-btnPrimary hidden" x-model="password">
                        <label for="eye" class="text-sm cursor-pointer hover:opacity-65">
                            <svg x-show="password" xmlns="http://www.w3.org/2000/svg" width="24"
                                height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"
                                stroke-linecap="round" stroke-linejoin="round" class="feather feather-eye w-[1rem]">
                                <path d="M1 12s4-8 11-8 11 8 11 8-4 8-11 8-11-8-11-8z"></path>
                                <circle cx="12" cy="12" r="3"></circle>
                            </svg>
                            <svg x-show="password == false" xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-eye-off w-[1rem]"><path d="M17.94 17.94A10.07 10.07 0 0 1 12 20c-7 0-11-8-11-8a18.45 18.45 0 0 1 5.06-5.94M9.9 4.24A9.12 9.12 0 0 1 12 4c7 0 11 8 11 8a18.5 18.5 0 0 1-2.16 3.19m-6.72-1.07a3 3 0 1 1-4.24-4.24"></path><line x1="1" y1="1" x2="23" y2="23"></line></svg>
                        </label>
                    </div>
                    @error('password')
                    <small class="text-red-500">{{$message}}</small>
                    @enderror
                </div>
                <div class="grid">
                    <button class="bg-btnDark  text-white py-2 mt-2">Signup</button>
                </div>
                <div class="flex items-center justify-center pt-4  ">

                    <span >Already have an account?<a href="/auth/patient/login" class="text-blue-500 hover:underline font-robotoBold">Sign in</a></span>
                </div>
            </form>

        </div>
    </main>

    <x-pages.footer />
</div>
@script
<script>
    Alpine.data('main',() =>({
        init(){
            Livewire.on('added', () => {

                    Swal.fire({
                        position: "center",
                        icon: "success",
                        title: "Signup Successfully!",
                        showConfirmButton: true,
                        // timer: 1500
                    }).then((result) =>{
                        if (result.isConfirmed) {
                            window.location.href = '/'
                        }
                    });

                })
        }
    }))
</script>


@endscript
