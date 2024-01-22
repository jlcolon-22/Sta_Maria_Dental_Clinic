<div>
    <x-pages.header  />

    <section class=" bg-[#f2f6fa] pb-28 pt-20">
        <div x-data="{map: true}" class=" container mx-auto">
            <h2 class="text-6xl font-bold text-center font-serif text-btnPrimary mb-6">Dental Clinic Locations</h2>
            <hr class="bg-black/20 min-h-[2px] w-full">
            <div class="grid grid-cols-2 w-[30rem] mx-auto mt-10">
                <button x-on:click="map = true" class=" py-2" :class="map ? 'bg-ylw' : 'bg-ylw/75'">Novaliches
                    Branch</button>
                <button x-on:click="map = false" class=" py-2 " :class="!map ? 'bg-ylw' : 'bg-ylw/75'">Malabon Branch</button>
            </div>


                <div x-show="map" class="px-20" id="map1">
                    <h2 class="text-center text-black text-2xl mt-10">43 Camilo Osias Street, New haven Village,
                        Novaliches Q.C.</h2>
                    <iframe
                        src="https://www.google.com/maps/embed?pb=!1m17!1m12!1m3!1d2361.6082260672883!2d121.05200292024983!3d14.731355008708231!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m2!1m1!2s!5e0!3m2!1sen!2sph!4v1678946646762!5m2!1sen!2sph"
                        class="w-full border" height="450" style="border:0;" allowfullscreen="" loading="lazy"
                        referrerpolicy="no-referrer-when-downgrade"></iframe>
                </div>


                <div x-show="!map" class="px-20" id="map2">
                    <h2 class="text-center text-black text-2xl mt-10">168 Gen. Luna Street, Malabon, Metro Manila</h2>
                    <iframe
                        src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d964.963551986337!2d120.94960032667348!3d14.664213907402948!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x3397b4511cb0e409%3A0x24228184ec2ba42f!2s168%20Gen.%20Luna%20St%2C%20Malabon%2C%201470%20Metro%20Manila!5e0!3m2!1sen!2sph!4v1680637820563!5m2!1sen!2sph"
                        class="w-full border" height="450" style="border:0;" allowfullscreen="" loading="lazy"
                        referrerpolicy="no-referrer-when-downgrade"></iframe>
                </div>

        </div>
    </section>

    {{-- footer --}}
    <x-pages.footer/>
</div>
