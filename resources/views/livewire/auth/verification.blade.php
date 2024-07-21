
@assets
<script>
    var botmanWidget = {
        title: 'Sta.Maria Dental Clinic',
        mainColor: '#1c98f7',
        bubbleBackground: '#feba02',
        color: 'white',
        aboutText: ' ',
        introMessage: 'Welcome to Sta.Maria Dental Clinic',
        chatServer: '/botman'
    };
    </script>
<script src='https://cdn.jsdelivr.net/npm/botman-web-widget@0/build/js/widget.js'></script>

@endassets
<div class="bg-[#f2f6fa] ">
    <x-pages.header />
    {{-- main --}}
    <main class="py-20 text-primary p-2">
        <div>
            <div class="container mx-auto p-4 pt-6 md:p-6 lg:p-12">
                <div class="max-w-md mx-auto bg-green-300">
                  <div class=" border border-green-500 text-black px-4 py-3 rounded relative" role="alert">
                    <svg class="w-32 h-32 mx-auto text-green-500" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                      <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z"></path>
                    </svg>
                    <p class="text-center"><strong class="font-bold ">Verification Successful!</strong></p>
                    <span class="block text-center sm:inline">Your email address has been successfully verified.</span>
                  </div>
                </div>
              </div>
        </div>
    </main>

    <x-pages.footer />
</di
