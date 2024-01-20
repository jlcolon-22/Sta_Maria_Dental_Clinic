<div class="bg-[#f2f6fa]">
    {{-- include header --}}



    {{-- main section --}}
    <main class=" py-20">








        {{-- generals --}}
        <section id="generals" class="container mx-auto  py-10 ">
            <h1 class="text-primary text-center text-4xl font-bold ">General Services</h1>
            <p class="text-primary/85 text-center mb-4">Fast, simple and routine procedures to maintain oral health </p>
            <hr>
            <div  x-data="{ gen: 1 }" class=" w-fit mx-auto  bg-white mt-4">
                <div id="genBtnContainer" class="grid grid-cols-5 w-[60rem]">
                    <button  x-on:click="gen = 1"
                        class="whitespace-nowrap py-3 " :class="gen == 1 ? 'bg-white text-primary' : 'bg-ylw'">CONSULTATION </button>
                    <button x-on:click="gen = 2"  class="whitespace-nowrap py-3   " :class="gen == 2 ? 'bg-white text-primary' : 'bg-ylw'">RESTORATION</button>
                    <button  x-on:click="gen = 3"  class="whitespace-nowrap py-3" :class="gen == 3 ? 'bg-white text-primary' : 'bg-ylw'">ORAL
                        PROPHYLAXIS</button>
                    <button  x-on:click="gen = 4"  class="whitespace-nowrap py-3" :class="gen == 4 ? 'bg-white text-primary' : 'bg-ylw'">FLOURIDE</button>
                    <button  x-on:click="gen = 5"  class="whitespace-nowrap py-3 " :class="gen == 5 ? 'bg-white text-primary' : 'bg-ylw'">EXTRACTION</button>
                </div>
                {{-- Dental Consultation --}}
                <section id="gen1" x-show="gen == 1" class="w-[60rem] flex  shadow-md">
                    <img src="{{ asset('assets/consult.jpg') }}" class="max-w-[40%] h-fit  pl-10" alt="">
                    <div class="py-10 px-10">
                        <h2 class="text-primary text-3xl font-bold ">Dental Consultation</h2>
                        <p class="text-primary/85 text-base mt-2">During a dental checkup or recall exam, your dentist
                            is trained to look for oral health problems that you can’t always see or feel – problems
                            like deterioration of fillings, early signs of gum disease or oral cancer, and other
                            problems that could affect your general health.</p>
                        <p class="text-primary/85 text-base mt-8"> At the end of this appointment, you will have a more
                            thorough understanding of the condition of your teeth and mouth, as well as all options for
                            treatment. This provides you with all the information needed to choose the treatment that’s
                            right for you.</p>
                        <p class="text-primary/85 text-base mt-8"> It is very important to see your dentist every six
                            months in order to treat any problems and prevent further complications that will cost you a
                            lot.</p>
                    </div>
                </section>
                {{-- Dental Filling / Pasta --}}
                <section id="gen2" x-show="gen == 2" class="w-[60rem] flex shadow-md">

                    <video controls muted src="{{ asset('video/pasta.mp4') }}"
                        class="max-w-[40%] h-fit py-10 pl-10"></video>
                    <div class="py-10 px-10">
                        <h2 class="text-primary text-3xl font-bold ">Dental Filling / Pasta</h2>
                        <p class="text-primary/85 text-base mt-2">A dental filling or also known as pasta is a way to
                            restore a tooth damaged by decay back to its normal function and shape. When a dentist gives
                            you a filling, he or she first removes the decayed tooth material, cleans the affected area,
                            and then fills the cleaned out cavity with a filling material.</p>
                        <p class="text-primary/85 text-base mt-8"> Fillings are also used to repair cracked or broken
                            teeth and teeth that have been worn down from misuse such as from nail-biting or tooth
                            grinding. The dentist will tell you what type of restorative material will be used depending
                            on the case of your tooth.</p>

                    </div>
                </section>
                {{-- Oral Prophylaxis / Cleaning --}}
                <section id="gen3"  x-show="gen == 3" class="w-[60rem] flex shadow-md">

                    <video controls muted src="{{ asset('video/prophylaxis.mp4') }}"
                        class="max-w-[40%] h-fit py-10 pl-10"></video>
                    <div class="py-10 px-10">
                        <h2 class="text-primary text-3xl font-bold ">Oral Prophylaxis / Cleaning</h2>
                        <p class="text-primary/85 text-base mt-2"> An oral prophylaxis is a dental procedure that is
                            performed to help reduce the risk of gum and tooth disease. Also known simply as a
                            prophylaxis or prophy, this dental procedure is recommended to be taken every six months or
                            yearly, depending on a patient’s history.</p>
                        <p class="text-primary/85 text-base mt-8"> During a dental prophylaxis, your dentist will also
                            inspect your teeth and jaw for any obvious signs of ill health. This inspection may reveal
                            underlying medical issues such as receding gums, erupting wisdom teeth, dental cavities, or
                            even oral cancer – some of which will require immediate treatment. Early identification of
                            dental problems can help you deal with them before they become serious.</p>

                    </div>
                </section>
                {{-- Flouride Therapy --}}
                <section id="gen4"  x-show="gen == 4" class="w-[60rem] flex shadow-md">
                    <img src="{{ asset('assets/flouride.png') }}" class="max-w-[40%] h-fit  pl-10 py-10" alt="">
                    <div class="py-10 px-10">
                        <h2 class="text-primary text-3xl font-bold ">Flouride Therapy</h2>
                        <p class="text-primary/85 text-base mt-2">Fluoride’s primary benefit is that it helps prevent
                            tooth decay. It can also reverse erosion that has already taken place. If plaque forms on
                            the teeth and eats away at the enamel, fluoride treatments can replace the minerals in the
                            enamel that have eroded. This allows teeth to remain healthy.</p>
                        <p class="text-primary/85 text-base mt-8"> Fluoride treatments are especially important for
                            children under the age of six. Even though these young children don’t have their permanent
                            teeth yet, fluoride treatments can prevent bacteria build-up around the gums, fight
                            gingivitis, and help establish long-term dental health</p>

                    </div>
                </section>
                {{-- Tooth Extraction --}}
                <section id="gen5"  x-show="gen == 5" class="w-[60rem] flex shadow-md">

                    <video controls muted src="{{ asset('video/extraction.mp4') }}"
                        class="max-w-[40%] h-fit py-10 pl-10"></video>
                    <div class="py-10 px-10">
                        <h2 class="text-primary text-3xl font-bold ">Tooth Extraction</h2>
                        <p class="text-primary/85 text-base mt-2">You and your dentist may determine that you need a
                            tooth extraction for any number of reasons. Some teeth are extracted because they are
                            severely decayed; others may have advanced periodontal disease, or have broken in a way that
                            cannot be repaired. Other teeth may need removal because they are poorly positioned in the
                            mouth (such as impacted teeth), or in preparation for orthodontic treatment.</p>
                        <p class="text-primary/85 text-base mt-8"> The removal of a single tooth can lead to problems
                            related to your chewing ability, problems with your jaw joint, and shifting teeth, which can
                            have a major impact on your dental health.</p>
                        <p class="text-primary/85 text-base mt-8"> We will discuss alternatives to extractions as well
                            as replacement of the extracted tooth during your initial consultation</p>

                    </div>
                </section>
            </div>
        </section>

        {{-- Cosmetics --}}
        <section id="Cosmetics" class="container mx-auto  py-10 ">
            <h1 class="text-primary text-center text-4xl font-bold ">Cosmetics </h1>
            <p class="text-primary/85 text-center mb-4">Be more confident and improve your smile</p>
            <hr>
            <div x-data="{cos: 1}" class=" w-fit mx-auto  bg-white mt-4">
                <div id="cosBtnContainer" class="grid grid-cols-4 w-[60rem]">
                    <button  x-on:click="cos = 1" class="whitespace-nowrap py-3" :class="cos == 1 ? 'bg-white text-primary' : 'bg-ylw'">VENEERS</button>
                    <button  x-on:click="cos = 2" class="whitespace-nowrap py-3" :class="cos == 2 ? 'bg-white text-primary' : 'bg-ylw'">CROWN / BRIDGE</button>
                    <button  x-on:click="cos = 3" class="whitespace-nowrap py-3" :class="cos == 3 ? 'bg-white text-primary' : 'bg-ylw'">DENTURES</button>
                    <button  x-on:click="cos = 4" class="whitespace-nowrap py-3" :class="cos == 4 ? 'bg-white text-primary' : 'bg-ylw'">TEETH WHITENING</button>

                </div>
                {{-- Veneers / Laminates --}}
                <section id="cos1" x-show="cos == 1" class="w-[60rem] flex shadow-md">
                    <video controls muted src="{{ asset('video/veneers.mp4') }}"
                        class="max-w-[40%] h-fit py-10 pl-10"></video>
                    <div class="py-10 px-10">
                        <h2 class="text-primary text-3xl font-bold ">Veneers / Laminates</h2>
                        <p class="text-primary/85 text-base mt-2">A dental veneer is a thin layer or shell of material
                            that covers the front visible part of your tooth. It is similar in concept to how fake nails
                            are stuck onto your real ones.</p>
                        <p class="text-primary/85 text-base mt-8"> Porcelain veneers can improve shape, color and
                            position (if minor) all at once. Therefore if you have a range of cosmetic flaws such as
                            spaces, discolouration, staining, chipped or fractured teeth, these can all be dealt with at
                            the same time. A combined approach using other treatments may be needed depending on the
                            situation</p>

                    </div>
                </section>
                {{-- Crown / Bridge --}}
                <section id="cos2" x-show="cos == 2" class="w-[60rem] flex shadow-md">

                    <video controls muted src="{{ asset('video/bridge.mp4') }}"
                        class="max-w-[40%] h-fit py-10 pl-10"></video>
                    <div class="py-10 px-10">
                        <h2 class="text-primary text-3xl font-bold ">Crown / Bridge</h2>
                        <p class="text-primary/85 text-base mt-2">Dental crown or bridges are an natural looking option
                            to replace missing tooth or teeth.</p>
                        <p class="text-primary/85 text-base mt-8"> A bridge is fixed in your mouth so you don’t have to
                            worry about it falling while you are speaking or laughing. There is no need to take it out
                            and clean it like a denture. You just have to follow a special cleaning instruction from
                            your dentist.</p>
                        <p class="text-primary/85 text-base mt-8"> Based on studies fixed bridgework, like individual
                            crowns, is very predictable, durable and lasts a considerable length of time and it could
                            even last a lifetime. Though it may sometimes come loose or fall out. With proper care and
                            good oral hygiene, it is a good investment.</p>

                    </div>
                </section>
                {{-- Dentures --}}
                <section id="cos3" x-show="cos == 3" class="w-[60rem] flex shadow-md">

                    <video controls muted src="{{ asset('video/denture.mp4') }}"
                        class="max-w-[40%] h-fit py-10 pl-10"></video>
                    <div class="py-10 px-10">
                        <h2 class="text-primary text-3xl font-bold ">Dentures</h2>
                        <p class="text-primary/85 text-base mt-2"> A denture is a removable replacement for missing
                            teeth and surrounding tissues. There are two types of dentures available, complete and
                            partial dentures. Complete dentures are used when all the teeth are missing, while partial
                            dentures are used when some natural teeth remain.</p>
                        <p class="text-primary/85 text-base mt-8"> We want you to have the best dentures at a price
                            that suits your budget. That’s why we have several types of dentures for you.</p>

                    </div>
                </section>
                {{-- Laser Teeth Whitening --}}
                <section id="cos4" x-show="cos == 4" class="w-[60rem] flex shadow-md">
                    <img src="{{ asset('assets/laser.jpg') }}" class="max-w-[40%] h-fit  pl-10 py-10" alt="">
                    <div class="py-10 px-10">
                        <h2 class="text-primary text-3xl font-bold ">Laser Teeth Whitening</h2>
                        <p class="text-primary/85 text-base mt-2">Teeth whitening done in the dental office is the most
                            effective and safest way to whiten the teeth.</p>
                        <p class="text-primary/85 text-base mt-8"> A whitening solution will be applied to your teeth
                            followed by an exposure to light that will enhance the whitening process.</p>
                        <p class="text-primary/85 text-base mt-8"> Please do remember that results could vary from one
                            patient to another because of several factors such as the cause of stain and the natural
                            color of the teeth.</p>

                    </div>
                </section>

            </div>
        </section>

        {{-- Orthodontics --}}
        <section id="Orthodontics" class="container mx-auto  py-10 ">
            <h1 class="text-primary text-center text-4xl font-bold ">Orthodontics</h1>
            <p class="text-primary/85 text-center mb-4">Having straight teeth boosts the confidence </p>
            <hr>
            <div x-data="{ort: 1}" class=" w-fit mx-auto  bg-white mt-4">
                <div id="ortBtnContainer" class="grid grid-cols-5 w-[60rem]">
                    <button  x-on:click="ort = 1" class="whitespace-nowrap py-3" :class="ort == 1 ? 'bg-white text-primary' : 'bg-ylw'">CLEAR
                        ALIGNERS</button>
                    <button  x-on:click="ort = 2" class="whitespace-nowrap py-3" :class="ort == 2 ? 'bg-white text-primary' : 'bg-ylw'">METALLIC</button>
                    <button  x-on:click="ort = 3" class="whitespace-nowrap py-3" :class="ort == 3 ? 'bg-white text-primary' : 'bg-ylw'">CERAMIC</button>
                    <button  x-on:click="ort = 4" class="whitespace-nowrap py-3" :class="ort == 4 ? 'bg-white text-primary' : 'bg-ylw'">SAPPHIRE</button>
                    <button   x-on:click="ort = 5" class="whitespace-nowrap py-3" :class="ort == 5 ? 'bg-white text-primary' : 'bg-ylw'">SELF LIGATING</button>
                </div>
                {{-- Clear Aligners --}}
                <section id="ort1" x-show="ort == 1" class="w-[60rem] flex shadow-md">
                    <video controls muted src="{{ asset('video/aligners.mp4') }}"
                        class="max-w-[40%] h-fit py-10 pl-10"></video>
                    <div class="py-10 px-10">
                        <h2 class="text-primary text-3xl font-bold ">Clear Aligners</h2>
                        <p class="text-primary/85 text-base mt-2">Clear aligners is the newest form of having a
                            straight set of teeth. A series of clear and removable trays will be worn by the patient
                            that will gradually move the teeth towards a more desirable position. The combination of 3D
                            printing, CAD Cam and other orthodontic technology ensures the accurate movement of the
                            teeth</p>
                        <p class="text-primary/85 text-base mt-8"> The aligner is free from wires and brackets that
                            could bring discomfort to the patient </p>

                    </div>
                </section>
                {{-- Metal Braces --}}
                <section id="ort2" x-show="ort == 2" class="w-[60rem] flex shadow-md">

                    <video controls muted src="{{ asset('video/metal.mp4') }}"
                        class="max-w-[40%] h-fit py-10 pl-10"></video>
                    <div class="py-10 px-10">
                        <h2 class="text-primary text-3xl font-bold ">Metal Braces</h2>
                        <p class="text-primary/85 text-base mt-2">These are the metal brackets and wires that most
                            people picture when they hear the word “braces.” However, modern brackets are smaller and
                            less noticeable than the notorious “metal-mouth” braces than many adults remember. Plus, new
                            heat-activated archwires use your body heat to help teeth move more quickly and less
                            painfully than in the past.</p>
                        <p class="text-primary/85 text-base mt-8"> Metal braces is also the most affordable among all
                            the options.</p>

                    </div>
                </section>
                {{-- Ceramic Braces --}}
                <section id="ort3" x-show="ort == 3" class="w-[60rem] flex shadow-md">

                    <img src="{{ asset('assets/ceramic.jpg') }}" class="max-w-[40%] h-fit  pl-10 py-10"
                        alt="">
                    <div class="py-10 px-10">
                        <h2 class="text-primary text-3xl font-bold ">Ceramic Braces</h2>
                        <p class="text-primary/85 text-base mt-2">Ceramic braces are the same size and shape as metal
                            braces, except that they have tooth-colored brackets that blend in to teeth.</p>
                        <p class="text-primary/85 text-base mt-8"> Some even use tooth-colored wires to be even less
                            noticeable.</p>
                        <p class="text-primary/85 text-base mt-8"> However this is more expensive compared to metallic
                            braces.</p>
                        <p class="text-primary/85 text-base mt-8"> Maintain a good oral hygiene and care for your
                            brackets as this could cause staining of the ceramic brackets.</p>

                    </div>
                </section>
                {{-- Sapphire Braces --}}
                <section id="ort4" x-show="ort == 4" class="w-[60rem] flex shadow-md">
                    <img src="{{ asset('assets/laser.jpg') }}" class="max-w-[40%] h-fit  pl-10 py-10"
                        alt="">
                    <div class="py-10 px-10">
                        <h2 class="text-primary text-3xl font-bold ">Sapphire Braces</h2>
                        <p class="text-primary/85 text-base mt-2">Sapphire braces are crystal clear, made from
                            monocrystalline sapphire. </p>
                        <p class="text-primary/85 text-base mt-8"> These braces omit all the light coming through,
                            therefore making it practically invisible.</p>
                        <p class="text-primary/85 text-base mt-8"> Sapphire braces are highly esthetic, because the
                            tooth itself is more visible than the brace.</p>

                    </div>
                </section>
                {{-- Self Ligating Braces --}}
                <section id="ort5"x-show="ort == 5"  class="w-[60rem] flex shadow-md">

                    <img src="{{ asset('assets/ligited.png') }}" class="max-w-[40%] h-fit  pl-10 py-10"
                        alt="">
                    <div class="py-10 px-10">
                        <h2 class="text-primary text-3xl font-bold ">Self Ligating Braces</h2>
                        <p class="text-primary/85 text-base mt-2">Self ligating braces is also a new form of
                            orthodontics. Unlike conventional dental braces, self ligating does not use rubbers or
                            elastics to keep the wire attached to the brackets.</p>
                        <p class="text-primary/85 text-base mt-8">
                            The use of self ligating braces has a lot of advantages such as: reduced discomfort, faster
                            treatment time and easier to clean.</p>


                    </div>
                </section>
            </div>
        </section>
    </main>

    <x-pages.footer />

</div>
