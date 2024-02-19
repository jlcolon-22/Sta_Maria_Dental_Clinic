@push('scripts')
<script src='https://cdn.jsdelivr.net/npm/botman-web-widget@0/build/js/widget.js'></script>
@endpush
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

            <h1 class="text-2xl font-robotoBold  ">Verify your email!</h1>


            <div class="p-4 mb-4 text-sm text-center  text-gray-700  w-[23rem] mx-auto" role="alert">
               Please enter 6-digits verification code that was sent to your email address.
               <p>The code valid for 10 minutes.</p>
             </div>
             @if (Session::has('expired'))
            <div class="p-4 mb-4 text-sm font-bold text-red-800 rounded-lg bg-red-50   w-[23rem] mx-auto" role="alert">
                The code is expired.
             </div>
            @endif
            @if (Session::has('wrong'))
            <div class="p-4 mb-4 text-sm font-bold text-red-800 rounded-lg bg-red-50   w-[23rem] mx-auto" role="alert">
               Wrong Code!
             </div>
            @endif
            <form wire:submit='validate_code' class="grid  mt-4 " autocomplete="off">
                <div class="grid">
                    <label for="" class="font-robotoBold text-sm ">Verification Code:</label>
                    <input type="number" wire:model='code'
                        class="border  py-2.5 px-4 rounded focus:border-ylw outline-none bg-gray-50 "
                        >
                        @error('code')
                            <small class="text-red-500">{{ $message }}</small>
                        @enderror

                </div>

                <button type="button" wire:click='resend' class="text-blue-500 underline text-left  w-fit h-fit">resend</button>


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
