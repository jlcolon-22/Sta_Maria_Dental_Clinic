@assets
<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/swiper@11/swiper-bundle.min.css" />

<script src="https://cdn.jsdelivr.net/npm/swiper@11/swiper-bundle.min.js"></script>
    <style>
        /* Hide the scrollbar for Chrome, Safari and Opera */
        .swiper::-webkit-scrollbar {
            display: none;
        }

        /* Hide the scrollbar for Internet Explorer, Edge and Firefox */
        .swiper {
            -ms-overflow-style: none;
            /* IE and Edge */
            scrollbar-width: none;
            /* Firefox */
        }

        .swiper-slide {
            max-height: 33rem;
            object-fit: cover;

        }
    </style>
@endassets
<div>


    {{-- carousel --}}
    <div class="swiper text-violet-500 ">
        <!-- Additional required wrapper -->
        <div class="swiper-wrapper ">
            <!-- Slides -->
            <img class="swiper-slide" src="{{ asset('carousel/1.jpeg') }}" alt="carousel image" />
            <img class="swiper-slide" src="{{ asset('carousel/2.jpg') }}" alt="carousel image" />
            <img class="swiper-slide" src="{{ asset('carousel/4.jpg') }}" alt="carousel image" />


        </div>
        <!-- If we need pagination -->
        <div class="swiper-pagination"></div>

        <!-- If we need navigation buttons -->
        <div class="swiper-button-prev"></div>
        <div class="swiper-button-next"></div>
    </div>

    {{-- schedule appointment --}}
    <section class="text-btnPrimary flex flex-col items-center gap-y-5 py-28">
        <h2 class="text-6xl font-bold font-serif">Schedule your Appointment</h2>
        <p class="text-center max-w-[25rem] text-lg">
            Book an appointment today and experience
            quality and safe dental journey. We’ve
            got some promos and freebies too!
        </p>
        <a href="" class="bg-btnPrimary px-6 py-2 rounded text-white">Book Now</a>


    </section>

    {{-- services container --}}
    <section class="bg-primary pb-32 pt-44   relative overflow-hidden z-0">
        <svg data-name="Layer 1" class="fill-slate-50 absolute top-0" xmlns="http://www.w3.org/2000/svg"
            viewBox="0 0 1200 120" preserveAspectRatio="none">
            <path
                d="M0,0V46.29c47.79,22.2,103.59,32.17,158,28,70.36-5.37,136.33-33.31,206.8-37.5C438.64,32.43,512.34,53.67,583,72.05c69.27,18,138.3,24.88,209.4,13.08,36.15-6,69.85-17.84,104.45-29.34C989.49,25,1113-14.29,1200,52.47V0Z"
                opacity=".25" class="shape-fill"></path>
            <path
                d="M0,0V15.81C13,36.92,27.64,56.86,47.69,72.05,99.41,111.27,165,111,224.58,91.58c31.15-10.15,60.09-26.07,89.67-39.8,40.92-19,84.73-46,130.83-49.67,36.26-2.85,70.9,9.42,98.6,31.56,31.77,25.39,62.32,62,103.63,73,40.44,10.79,81.35-6.69,119.13-24.28s75.16-39,116.92-43.05c59.73-5.85,113.28,22.88,168.9,38.84,30.2,8.66,59,6.17,87.09-7.5,22.43-10.89,48-26.93,60.65-49.24V0Z"
                opacity=".5" class="shape-fill"></path>
            <path
                d="M0,0V5.63C149.93,59,314.09,71.32,475.83,42.57c43-7.64,84.23-20.12,127.61-26.46,59-8.63,112.48,12.24,165.56,35.4C827.93,77.22,886,95.24,951.2,90c86.53-7,172.46-45.71,248.8-84.81V0Z"
                class="shape-fill"></path>
        </svg>
        <h1 class="font-serif font-bold text-6xl text-center  z-20">Services</h1>

        {{-- card container --}}
        <div class="container mx-auto grid grid-cols-3 gap-x-16 px-20 py-10 mt-10">
            <a href="/services#generals" class="border border-white px-2 py-5 flex justify-center items-center flex-col group hover:border-ylw">
                <svg xmlns="http://www.w3.org/2000/svg" version="1.1" xmlns:xlink="http://www.w3.org/1999/xlink"
                    width="512" height="512" x="0" y="0" viewBox="0 0 496 496"
                    style="enable-background:new 0 0 512 512" xml:space="preserve"
                    class="h-[5rem] fill-white group-hover:fill-ylw">
                    <g>
                        <path
                            d="M112 158.68V156H96v2.68c0 4.584.12 9.168.352 13.728l15.984-.816A256.843 256.843 0 0 1 112 158.68zM113.608 187.088l-15.896 1.816c4.576 40.296 18.624 79.68 40.616 113.88l13.456-8.656c-20.672-32.152-33.864-69.168-38.176-107.04zM294.888 77.696C281.032 87.056 264.816 92 248 92s-33.024-4.944-46.88-14.296l-8.952 13.264C208.68 102.112 227.984 108 248 108s39.32-5.888 55.84-17.04l-8.952-13.264zM72 308H56c0 30.872-25.128 56-56 56v16c30.872 0 56 25.128 56 56h16c0-30.872 25.128-56 56-56v-16c-30.872 0-56-25.128-56-56zm-8 95.16A72.352 72.352 0 0 0 32.84 372 72.352 72.352 0 0 0 64 340.84 72.352 72.352 0 0 0 95.16 372 72.352 72.352 0 0 0 64 403.16z"
                            opacity="1" class=""></path>
                        <path
                            d="M440 100h-15.32c-15.152-37.688-52.24-64-94.264-64-19.84 0-38.496 5.368-53.952 15.512-17.112 11.264-39.808 11.264-56.928 0C204.088 41.368 185.432 36 165.584 36 109.568 36 64 81.568 64 137.584v21.096c0 57.36 16.4 113.168 47.416 161.416a282.04 282.04 0 0 1 36.432 84.24l8.704 34.832A27.43 27.43 0 0 0 183.216 460c13.72 0 25.16-9.848 27.184-23.416l17.944-119.664c1.48-9.8 9.744-16.92 19.656-16.92s18.176 7.12 19.648 16.92l17.944 119.664C287.624 450.152 299.064 460 312.784 460a27.43 27.43 0 0 0 26.664-20.832l8.712-34.832a281.884 281.884 0 0 1 36.44-84.24c18.232-28.368 31.568-60.048 39.368-92.928-.008.28.032.552.032.832h16c0-30.872 25.128-56 56-56v-16c-30.872 0-56-25.128-56-56zm-68.864 211.44a298.013 298.013 0 0 0-38.496 89.024l-8.72 34.832A11.452 11.452 0 0 1 312.784 444c-5.736 0-10.512-4.12-11.36-9.792L283.48 314.544C280.824 296.84 265.896 284 248 284s-32.824 12.84-35.48 30.544l-17.944 119.664c-.84 5.672-5.624 9.792-11.36 9.792-5.28 0-9.864-3.576-11.152-8.704l-8.712-34.832a297.633 297.633 0 0 0-38.496-89.024C95.512 265.784 80 212.96 80 158.68v-21.096C80 90.392 118.392 52 165.584 52c16.712 0 32.328 4.456 45.16 12.888C221.952 72.256 234.496 76 248 76c13.504 0 26.048-3.744 37.248-11.112C298.088 56.456 313.704 52 330.416 52c42.208 0 78.624 31.448 84.624 72.512l.336 5.208C405.456 145.472 387.952 156 368 156v16c18.784 0 35.4 9.328 45.56 23.56-5.4 41.024-20.056 81.08-42.424 115.88zM432 195.16A72.352 72.352 0 0 0 400.84 164 72.352 72.352 0 0 0 432 132.84 72.352 72.352 0 0 0 463.16 164 72.352 72.352 0 0 0 432 195.16z"
                            opacity="1" class=""></path>
                    </g>
                </svg>
                <h3 class="text-2xl group-hover:text-ylw group-hover:underline">General dentistry</h3>
            </a>
            <a href="/services#Cosmetics" class="border border-white px-2 py-5 flex justify-center items-center flex-col group hover:border-ylw">
                <svg xmlns="http://www.w3.org/2000/svg" version="1.1" xmlns:xlink="http://www.w3.org/1999/xlink" x="0"
                    y="0" viewBox="0 0 64 64" style="enable-background:new 0 0 512 512" xml:space="preserve"
                    class="h-[5rem] fill-white group-hover:fill-ylw">
                    <g>
                        <path
                            d="M57.182 8.185A36.147 36.147 0 0 0 44.786 6h-1.955C39.033 6 35.302 6.981 32 8.843A22.053 22.053 0 0 0 21.169 6h-1.955c-4.24 0-8.411.735-12.396 2.185A8.862 8.862 0 0 0 1 16.49a8.81 8.81 0 0 0 .632 3.282l.437 1.093c-.042.177-.069.36-.069.549 0 1.146.159 2.285.474 3.385l1.032 3.614A3.584 3.584 0 0 0 6.937 31a3.54 3.54 0 0 0 2.522-1.045l.232-.232c.445.174.922.277 1.421.277.779 0 1.533-.229 2.181-.66l1.375-.917c.108.069.215.138.332.196.5.249 1.06.381 1.618.381h2.764c.558 0 1.118-.132 1.618-.382.166-.083.322-.18.471-.284.313.45.766.803 1.312.985C24.141 29.771 25.56 30 27 30s2.859-.229 4.217-.682a2.58 2.58 0 0 0 .783-.42c.23.181.494.324.784.421.409.136.828.246 1.25.342-.013.243-.034.484-.034.729v.237l-10.394 4.454c-.224.096-.404.27-.51.489l-10 21A1.002 1.002 0 0 0 14 58h11a1 1 0 0 0 .943-.667l5.88-16.661 6.346-3.808c.607.084 1.22.136 1.831.136 1.44 0 2.859-.229 4.217-.682A2.607 2.607 0 0 0 46 33.84v-3.45c0-.467-.029-.93-.076-1.39h1.458c.558 0 1.118-.132 1.618-.382.116-.058.224-.127.332-.196l1.375.917c.647.432 1.401.66 2.181.66a3.92 3.92 0 0 0 1.422-.276l.232.232A3.538 3.538 0 0 0 57.063 31a3.584 3.584 0 0 0 3.431-2.588l1.032-3.612A12.3 12.3 0 0 0 62 21.414c0-.189-.027-.372-.069-.549l.437-1.093A8.805 8.805 0 0 0 63 16.49a8.862 8.862 0 0 0-5.818-8.305zM6.937 29a1.575 1.575 0 0 1-1.507-1.137l-1.032-3.614A10.287 10.287 0 0 1 4 21.414c.001-.338.468-.531.707-.293L7 23.414v1.536c0 .803.129 1.598.383 2.362.151.454.386.86.674 1.217l-.012.012A1.576 1.576 0 0 1 6.937 29zm5.247-1.324a1.93 1.93 0 0 1-1.072.324c-.833 0-1.568-.53-1.831-1.319A5.49 5.49 0 0 1 9 24.95v-5.996a.955.955 0 0 1 1.748-.529l2.534 3.802A18.543 18.543 0 0 0 13 25.382c0 .54.121 1.056.338 1.524zm7.921-.847a1.619 1.619 0 0 1-.723.171h-2.764c-.25 0-.5-.059-.724-.171A1.609 1.609 0 0 1 15 25.382c0-2.115.398-4.185 1.186-6.152.298-.748 1.01-1.23 1.814-1.23s1.516.482 1.815 1.231A16.48 16.48 0 0 1 21 25.382c0 .617-.343 1.172-.895 1.447zm10.479.592c-2.305.77-4.863.769-7.168.001A.612.612 0 0 1 23 26.84v-3.45c0-1.462.274-2.884.821-4.237a3.373 3.373 0 0 1 1.252-1.56 3.489 3.489 0 0 1 3.844-.006 3.385 3.385 0 0 1 1.267 1.578c.542 1.341.816 2.763.816 4.225v3.45a.61.61 0 0 1-.416.581zm2.832.001A.612.612 0 0 1 33 26.84v-3.45c0-1.462.274-2.884.821-4.237a3.373 3.373 0 0 1 1.252-1.56 3.489 3.489 0 0 1 3.844-.006 3.385 3.385 0 0 1 1.267 1.578c.377.932.615 1.907.731 2.934a5.497 5.497 0 0 0-3.958.835 5.346 5.346 0 0 0-1.994 2.481 13.205 13.205 0 0 0-.677 2.256 11.106 11.106 0 0 1-.87-.249zM15.584 56l9.156-19.229L34 32.802v1.038c0 .024.007.046.007.069l-7.401 3.172a.998.998 0 0 0-.528.531L18.336 56zm14.901-16.857c-.199.12-.351.306-.429.524L24.293 56h-3.787l7.259-17.24 11.753-5.036zM44 33.84a.609.609 0 0 1-.416.581c-.684.228-1.394.369-2.112.462l.042-.025c.301-.181.486-.506.486-.858v-2a.998.998 0 0 0-1.393-.919L36 33.055V30.39c0-1.462.274-2.884.821-4.237a3.373 3.373 0 0 1 1.252-1.56 3.494 3.494 0 0 1 3.845-.007c.58.396 1.016.938 1.266 1.579.542 1.341.816 2.763.816 4.225zm4.105-7.011a1.619 1.619 0 0 1-.723.171h-1.831c-.14-.533-.302-1.06-.509-1.572-.369-.953-1.015-1.768-1.866-2.388a16.582 16.582 0 0 1 1.009-3.81C44.484 18.482 45.196 18 46 18s1.516.482 1.815 1.231A16.48 16.48 0 0 1 49 25.382c0 .617-.343 1.172-.895 1.447zm3.711.847-1.154-.77c.217-.468.338-.985.338-1.524 0-1.065-.103-2.117-.283-3.155l2.535-3.802a.955.955 0 0 1 1.748.529v5.996c0 .588-.095 1.17-.281 1.729a1.93 1.93 0 0 1-2.903.997zm7.787-3.426-1.031 3.612A1.577 1.577 0 0 1 57.063 29c-.413 0-.816-.167-1.108-.459l-.012-.012c.288-.358.522-.763.674-1.218A7.465 7.465 0 0 0 57 24.95v-1.536l2.293-2.293c.237-.238.707-.045.707.293 0 .96-.134 1.914-.397 2.836zm.908-5.22-.055.138a2.401 2.401 0 0 0-.87-.168 2.43 2.43 0 0 0-1.707.707l-.879.879v-1.632A2.957 2.957 0 0 0 54.046 16a2.95 2.95 0 0 0-2.458 1.315l-1.528 2.292c-.123-.375-.24-.752-.388-1.122C49.067 16.976 47.626 16 46 16s-3.067.976-3.673 2.489c-.049.122-.088.248-.134.372-.052-.144-.094-.291-.151-.433a5.367 5.367 0 0 0-2.008-2.5 5.497 5.497 0 0 0-6.077.006A5.362 5.362 0 0 0 32 18.322a5.377 5.377 0 0 0-1.966-2.394 5.497 5.497 0 0 0-6.077.006 5.346 5.346 0 0 0-1.994 2.481c-.06.149-.104.303-.158.454-.048-.127-.082-.257-.133-.383C21.067 16.976 19.626 16 18 16s-3.067.976-3.673 2.489c-.147.368-.264.744-.387 1.118l-1.528-2.292A2.95 2.95 0 0 0 9.954 16 2.957 2.957 0 0 0 7 18.954v1.632l-.879-.879A2.43 2.43 0 0 0 4.414 19c-.307 0-.599.063-.87.168l-.055-.138A6.799 6.799 0 0 1 3 16.49a6.862 6.862 0 0 1 4.502-6.427A34.17 34.17 0 0 1 19.214 8h1.955c3.634 0 7.201.988 10.316 2.857.316.189.713.189 1.029 0A20.06 20.06 0 0 1 42.831 8h1.955c4.007 0 7.947.694 11.712 2.063A6.862 6.862 0 0 1 61 16.49c0 .874-.164 1.729-.489 2.54z"
                            opacity="1" class=""></path>
                    </g>
                </svg>
                <h3 class="text-2xl group-hover:text-ylw group-hover:underline">Cosmetics</h3>
            </a>
            <a href="/services#Orthodontics"
                class="border border-white px-2 py-5 flex justify-center items-center flex-col group hover:border-ylw">
                <svg xmlns="http://www.w3.org/2000/svg" version="1.1" xmlns:xlink="http://www.w3.org/1999/xlink" x="0"
                    y="0" viewBox="0 0 48 48" style="enable-background:new 0 0 512 512" xml:space="preserve"
                    class="h-[5rem] fill-white group-hover:fill-ylw">
                    <g>
                        <path
                            d="M43 21h-.832A15.746 15.746 0 0 0 43 16c0-6.888-3.738-11-10-11a17.483 17.483 0 0 0-9.1 2.854C21.278 6.461 18.179 5 15 5 8.738 5 5 9.112 5 16a15.746 15.746 0 0 0 .832 5H5a1 1 0 0 0 0 2h1.6c.517 1.169 1.107 2.28 1.691 3.375a22.292 22.292 0 0 1 2.725 6.79 23.274 23.274 0 0 0 4.092 9.67c.261.393.5.75.7 1.081A2.242 2.242 0 0 0 17.736 45 2.267 2.267 0 0 0 20 42.736V36a4 4 0 0 1 8 0v6.736A2.267 2.267 0 0 0 30.264 45a2.239 2.239 0 0 0 1.928-1.084c.2-.331.441-.688.7-1.081a23.288 23.288 0 0 0 4.091-9.67 22.318 22.318 0 0 1 2.725-6.79C40.3 25.28 40.885 24.169 41.4 23H43a1 1 0 0 0 0-2Zm-5.054 4.434a24.133 24.133 0 0 0-2.932 7.4 21.24 21.24 0 0 1-3.783 8.891c-.279.418-.532.8-.747 1.149a.27.27 0 0 1-.484-.138V36a6 6 0 0 0-12 0v6.736a.27.27 0 0 1-.485.139c-.214-.351-.467-.731-.745-1.149a21.226 21.226 0 0 1-3.784-8.891 24.133 24.133 0 0 0-2.932-7.4c-.435-.816-.86-1.62-1.252-2.434H16v1a4 4 0 0 0 4 4h8a4 4 0 0 0 4-4V23h7.2a68.62 68.62 0 0 1-1.254 2.434ZM18 24v-4a2 2 0 0 1 2-2h8a2 2 0 0 1 2 2v4a2 2 0 0 1-2 2h-8a2 2 0 0 1-2-2Zm22.064-3H32v-1a4 4 0 0 0-4-4h-8a4 4 0 0 0-4 4v1H7.937A14.07 14.07 0 0 1 7 16c0-5.72 2.916-9 8-9 3.126 0 6.407 1.774 9.045 3.2a25.082 25.082 0 0 0 3.639 1.749 1 1 0 0 0 .632-1.9 16.643 16.643 0 0 1-2.354-1.092A15.1 15.1 0 0 1 33 7c5.084 0 8 3.28 8 9a14.092 14.092 0 0 1-.936 5Z"
                            opacity="1" data-original="#000000"></path>
                    </g>
                </svg>
                <h3 class="text-2xl group-hover:text-ylw group-hover:underline">Orthodontic</h3>
            </a>
        </div>
        <img src="{{ asset('assets/teeth.png.png') }}" class="absolute -right-52 top-32 -z-10 opacity-20 h-[40rem]"
            alt="">
    </section>

    {{-- location container --}}
    <section class=" bg-[#f2f6fa] py-28">
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

@script
    <script>
        const swiper = new Swiper('.swiper', {
            // Optional parameters
            direction: 'horizontal',
            loop: true,

            // If we need pagination
            pagination: {
                el: '.swiper-pagination',
            },

            // Navigation arrows
            navigation: {
                nextEl: '.swiper-button-next',
                prevEl: '.swiper-button-prev',
            },

            // And if we need scrollbar
            // scrollbar: {
            //   el: '.swiper-scrollbar',
            // },
        });
    </script>
@endscript