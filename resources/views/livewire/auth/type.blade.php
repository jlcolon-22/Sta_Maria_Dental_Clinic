<div class="bg-[#f2f6fa] text-primary">

    {{-- main --}}
    <main class="py-20">
        <div class="bg-white w-[40rem] mx-auto py-6">
            <div class="flex items-center justify-center pb-10">
                <img src="{{ asset('favicon.ico') }}" alt="">
                <h2 class="text-4xl font-bold">
                    Sta.Maria Dental CLinic </h2>
            </div>

            <h1 class="text-3xl font-bold text-center">Select Type</h1>

            <div class="py-10 grid grid-cols-2 p-10 gap-x-10">
                <a href="/auth/patient/login" class="bg-btnDark hover:bg-btnSecondary font-bold p-3 text-center rounded text-white">Login<span class="text-gray-300">(Patient)</span></a>
                <a  href="/auth/doctor/login" class="bg-btnDark hover:bg-btnSecondary font-bold p-3 text-center rounded text-white">Login<span class="text-gray-300">(Doctor)</span></a>
            </div>
        </div>
    </main>

    <x-pages.footer />
</div>
