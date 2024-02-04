
<div class="bg-[#f2f6fa] max-h-[100svh]  ">


    <x-doctor.aside>
        <section  x-data="main"
        class="text-gray-900 p-10 max-h-[calc(100svh-5rem)] overflow-y-auto relative" :class="aside ? ' max-w-[calc(100svw-17rem)]' : ' max-w-[100svw]'">

        <!-- Breadcrumb -->
        <nav class="flex " aria-label="Breadcrumb">
            <ol class="inline-flex items-center space-x-1 md:space-x-2 rtl:space-x-reverse">
                <li class="inline-flex items-center">
                    <a href="/doctor/dashboard"
                        class="inline-flex items-center text-sm font-medium text-gray-700 hover:text-blue-600 ">
                        <svg class="w-3 h-3 me-2.5" aria-hidden="true" xmlns="http://www.w3.org/2000/svg"
                            fill="currentColor" viewBox="0 0 20 20">
                            <path
                                d="m19.707 9.293-2-2-7-7a1 1 0 0 0-1.414 0l-7 7-2 2a1 1 0 0 0 1.414 1.414L2 10.414V18a2 2 0 0 0 2 2h3a1 1 0 0 0 1-1v-4a1 1 0 0 1 1-1h2a1 1 0 0 1 1 1v4a1 1 0 0 0 1 1h3a2 2 0 0 0 2-2v-7.586l.293.293a1 1 0 0 0 1.414-1.414Z" />
                        </svg>
                        Dashboard
                    </a>
                </li>

                <li aria-current="page">
                    <div class="flex items-center">
                        <svg class="rtl:rotate-180  w-3 h-3 mx-1 text-gray-400" aria-hidden="true"
                            xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 6 10">
                            <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round"
                                stroke-width="2" d="m1 9 4-4-4-4" />
                        </svg>
                        <span
                            class="ms-1 text-sm font-medium text-gray-500 md:ms-2 dark:text-gray-400">Setting</span>
                    </div>
                </li>
            </ol>
        </nav>

        <div class="bg-white shadow-md rounded-md mt-7  p-5  ">
            <h2 class="font-robotoBold">Account Settings</h2>
            <div class="mt-5 flex">
                <img src="{{ asset('assets/admin.png') }}" class="h-[14rem] w-[14rem] rounded-full" alt="">
                <form wire:submit.prevent='update' class="w-full px-10 pt-3 grid grid-cols-2 gap-10 ">
                    <div>
                        <label for="" class="font-medium text-gray-800">Branch Name</label>
                        <input type="text" autocomplete="off" wire:model="name"
                            class="border py-2 pl-2 pr-[3.1rem] focus:border-ylw outline-none  w-full  "
                            :class="edit ? 'bg-gray-100 ' : 'bg-gray-300 opacity-55 '"
                            :disabled="edit ? false : true">
                    </div>
                    <div>
                        <label for="" class="font-medium text-gray-800">Branch Email</label>
                        <input type="email" autocomplete="off" wire:model="email"
                            class="border py-2 pl-2 pr-[3.1rem] focus:border-ylw outline-none  w-full"
                            :class="edit ? 'bg-gray-100 ' : 'bg-gray-300 opacity-55 '"
                            :disabled="edit ? false : true">
                    </div>
                    <div>
                        <label for="" class="font-medium text-gray-800">Branch Number</label>
                        <input type="tel" autocomplete="off" wire:model="number"
                            class="border py-2 pl-2 pr-[3.1rem] focus:border-ylw outline-none  w-full"
                            :class="edit ? 'bg-gray-100 ' : 'bg-gray-300 opacity-55 '"
                            :disabled="edit ? false : true">
                    </div>
                    <div x-data="{ password: false }" class=" relative">
                        <label for="" class="font-medium text-gray-800">Branch Password</label>
                        <input :type="password ? 'text' : 'password'" wire:model='password' autocomplete="off"
                            class="border py-2 pl-2 pr-[3.1rem] focus:border-ylw outline-none  w-full"
                            placeholder="Password" :class="edit ? 'bg-gray-100 ' : 'bg-gray-300 opacity-55 '"
                            :disabled="edit ? false : true">
                        @error('password')
                            <small class="text-red-500 w-[23rem]"> {{ $message }}</small>
                        @enderror
                        <div class="absolute right-1 bottom-0  px-2 py-[8.5px]">

                            <input type="checkbox" id="eye" class="fill-btnPrimary hidden" x-model="password">
                            <label for="eye" class="text-sm">
                                <svg x-show="password" xmlns="http://www.w3.org/2000/svg" width="24"
                                    height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor"
                                    stroke-width="2" stroke-linecap="round" stroke-linejoin="round"
                                    class="feather feather-eye w-[1rem]">
                                    <path d="M1 12s4-8 11-8 11 8 11 8-4 8-11 8-11-8-11-8z"></path>
                                    <circle cx="12" cy="12" r="3"></circle>
                                </svg>
                                <svg x-show="password == false" xmlns="http://www.w3.org/2000/svg" width="24"
                                    height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor"
                                    stroke-width="2" stroke-linecap="round" stroke-linejoin="round"
                                    class="feather feather-eye-off w-[1rem]">
                                    <path
                                        d="M17.94 17.94A10.07 10.07 0 0 1 12 20c-7 0-11-8-11-8a18.45 18.45 0 0 1 5.06-5.94M9.9 4.24A9.12 9.12 0 0 1 12 4c7 0 11 8 11 8a18.5 18.5 0 0 1-2.16 3.19m-6.72-1.07a3 3 0 1 1-4.24-4.24">
                                    </path>
                                    <line x1="1" y1="1" x2="23" y2="23"></line>
                                </svg>
                            </label>
                        </div>
                    </div>

                    <div class="flex justify-end col-span-2 gap-x-2">
                        <button x-show="edit == false" type="button" x-on:click="edit = true"
                            class="bg-ylw text-white py-2 px-6 rounded hover:opacity-70">Edit</button>
                        <button x-show="edit == true" type="submit" x-on:click="edit = false"
                            class="bg-blue-500 text-white py-2 px-6 rounded hover:opacity-70">Update</button>
                        <button x-show="edit == true" type="button" x-on:click="edit = false"
                            class="bg-red-500 text-white py-2 px-6 rounded hover:opacity-70">Cancel</button>
                    </div>
                </form>
            </div>
        </div>



    </section>

    </x-doctor.aside>


</div>
@script
    <script>
        Alpine.data('main', () => ({
            edit: false,


            init() {

                Livewire.on('updated', () => {

                    Swal.fire({
                        position: "center",
                        icon: "success",
                        title: "Updated Successfully!",
                        showConfirmButton: false,
                        timer: 1500
                    });

                })

            }
        }))
    </script>
@endscript
