<div>
    <div  x-data='mainData' x-show="setting"  class="fixed bg-black/50 z-50 top-0 px-2 lg:px-0 left-0 w-full max-h-[100svh] text-primary overflow-y-scroll ">
        <div  x-show="setting"  class="bg-white max-w-[35rem] mx-auto pb-20 pt-10 rounded shadow-md my-10 relative" x-transition>

            <button class="absolute top-5 right-6 hover:opacity-60" x-on:click="setting = false" >
                <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-x"><line x1="18" y1="6" x2="6" y2="18"></line><line x1="6" y1="6" x2="18" y2="18"></line></svg>
            </button>

            <h1 class="text-3xl font-robotoBold text-center  ">Update Information</h1>
            <form   wire:submit='updatePatient' class="space-y-4 px-10 pt-10" autocomplete="off">

                <div class="grid ">
                    <label for="" class="font-robotoBold text-sm ">Fullname<span class="text-red-500">*</span> </label>
                    <input type="text" wire:model='pfullname'
                        class="border  py-2.5 px-4 rounded focus:border-ylw outline-none bg-gray-50 "
                        >
                        @error('fullname')
                        <small class="text-red-500">{{$message}}</small>
                        @enderror
                </div>
                <div class="grid " >
                    <label for="" class="font-robotoBold text-sm ">Email address<span class="text-red-500">*</span></label>
                    <input type="email" wire:model='pemail'
                        class="border  py-2.5 px-4 rounded focus:border-ylw outline-none bg-gray-50 "
                        >
                        @error('email')
                        <small class="text-red-500">{{$message}}</small>
                        @enderror
                </div>
                <div class="grid " >
                    <label for="" class="font-robotoBold text-sm ">Phone Number<span class="text-red-500">*</span></label>
                    <input type="tel" wire:model='pnumber'
                        class="border  py-2.5 px-4 rounded focus:border-ylw outline-none bg-gray-50 "
                        >
                        @error('number')
                        <small class="text-red-500">{{$message}}</small>
                        @enderror
                </div>
                <div class="grid " >
                    <label for="" class="font-robotoBold text-sm ">Age<span class="text-red-500">*</span></label>
                    <input type="number" wire:model='page'
                        class="border  py-2.5 px-4 rounded focus:border-ylw outline-none bg-gray-50 "
                        >
                        @error('page')
                        <small class="text-red-500">{{$message}}</small>
                        @enderror
                </div>
                <div class="grid " >
                    <label for="" class="font-robotoBold text-sm ">Username<span class="text-red-500">*</span></label>
                    <input type="text" wire:model='username'
                        class="border  py-2.5 px-4 rounded focus:border-ylw outline-none bg-gray-50 "
                        >
                        @error('username')
                        <small class="text-red-500">{{$message}}</small>
                        @enderror
                </div>


                <div x-data="{ password: false }" class=" grid relative mt-4 ">

                    <label for="" class="font-robotoBold text-sm ">Password</label>
                    <input :type="password ? 'text' : 'password'" autocomplete="off" wire:model='password'
                    class="border  py-2.5 px-4 rounded focus:border-ylw outline-none bg-gray-50 "
                        >
                    <div class="absolute right-1 top-[22px] px-2 py-[8.5px]">

                        <input type="checkbox" id="updateeye" class="fill-btnPrimary hidden" x-model="password">
                        <label for="updateeye" class="text-sm cursor-pointer hover:opacity-65">
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
                    <button type="submit" class="bg-btnDark  text-white py-2 mt-2">Update</button>
                </div>

            </form>

        </div>
    </div>
</div>
@script
<script>
    Alpine.data('mainData',() =>({
        init(){
            Livewire.on('updated', () => {

                    Swal.fire({
                        position: "center",
                        icon: "success",
                        title: "Updated Successfully!",
                        showConfirmButton: true,
                        // timer: 1500
                    }).then((result) =>{
                        if (result.isConfirmed) {
                            location.reload()
                        }
                    });

                })
        }
    }))
</script>


@endscript
