<style>
    .card {
        background: #000a !important;        
        margin: 20px;
        padding: 80px 0;
        border: 1px #fff5 solid !important;
        border-radius: 15px !important;
        transition: 400ms;
        justify-content: end;
    }

    .card:hover {
        cursor: pointer;
        scale: 1.01;
        border: 1px solid red !important;
    }
</style>
<link href="https://cdn.jsdelivr.net/npm/tailwindcss@2.2.19/dist/tailwind.min.css" rel="stylesheet">


<x-app-layout style="background: #000;">
    <div class=" bg-black text-white/50">
        <div class="absolute w-full">
            <div class="absolute w-full h-full -top-20" style="background: #0007"></div>
            <img id="background" class="w-full"
            src="{{ asset('assets/images/home_header2.jpg') }}" />
        </div>
        <div
            class="relative min-h-screen flex flex-col items-center justify-center selection:bg-[#FF2D20] selection:text-white">
            <div class="relative w-full max-w-2xl px-6 lg:max-w-7xl">
                <main class="mt-6">
                    <div class="flex flex-col">
                        <a
                            class="flex flex-col relative items-center justify-center overflow-hidden rounded-lg shadow-[0px_14px_34px_0px_rgba(0,0,0,0.08)] ring-1 ring-white/[0.05] transition duration-300 hover:text-black/70 hover:ring-black/20 focus:outline-none md:row-span-3 bg-zinc-900 ring-zinc-800 dark:hover:text-white/70 dark:hover:ring-zinc-700 focus-visible:ring-[#FF2D20]">
                            <div id="screenshot-container" class="relative flex w-full flex-1 items-stretch">
                                <img src="https://i.ytimg.com/vi/EA0YC9m6D4s/maxresdefault.jpg"
                                    alt="Laravel documentation screenshot"
                                    class="hidden aspect-video h-full w-full flex-1 rounded-[10px] object-top object-cover drop-shadow-[0px_4px_34px_rgba(0,0,0,0.25)] dark:block" />
                            </div>

                            <div class="absolute h-full w-full mx-10 bg-black bg-opacity-50">
                                <div class="relative w-full h-full flex items-center justify-center">
                                    <div class="flex items-start ">
                                        <div class="flex justify-between items-center">
                                            <h2 class="ml-5 text-5xl font-bold text-white" style="height: fit-content;">
                                                Welcome to <p class="text-red-600">
                                                    MNS Tech Store
                                                </p>
                                            </h2>
                                        </div>
                                    </div>

                                    <div
                                        class="absolute bottom-0 mt-10 py-5 w-full bg-black bg-opacity-50 flex justify-center items-center">
                                        <p class="text-l text-lg text-gray-400" style="width: 80%; text-align:justify">
                                            Welcome to MNS Tech Store, your one-stop shop for all things PC! Whether
                                            you're a hardcore gamer, a digital artist, or a professional in need of
                                            powerful computing solutions, we've got you covered. Explore our wide range
                                            of products, from cutting-edge gaming rigs to high-performance workstations,
                                            and discover the perfect PC for your needs. With top brands, expert advice,
                                            and unbeatable prices, MNS Tech Store is the ultimate destination for all
                                            your PC shopping needs.
                                        </p>
                                    </div>
                                </div>

                            </div>
                        </a>
                    </div>

                    <div class="flex flex-wrap text-gray-300 my-20 py-10 justify-center items center" style="border-top: 2px solid #900;border-bottom: 2px solid #900;">

                        <div class="flex flex-col ring-white/50 mx-3 px-4 card" style="width: 27%;min-width: 300px">
                            <img src="{{asset('assets/icons/ic_pc.svg')}}" style="width: 20%;">
                            <h2 class="text-3xl text-red-600 my-3 font-bold">Custom Desktop Build</h2>
                            <p class="text-white text-justify" style="width:25ch max-w-full">Tailor dekstop
                                configuration based on
                                individuals needs, ensuring optimal performance for various purposes.</p>
                        </div>
                        <div class="flex flex-col ring-white/50 mx-3 px-4 card" style="width: 27%;min-width: 300px">
                            <img src="{{asset('assets/icons/ic_person_expert.svg')}}" style="width: 20%;">
                            <h2 class="text-3xl text-red-600 my-3 font-bold">Custom Configuration</h2>
                            <p class="text-white text-justify" style="width:25ch max-w-full">Build your dream laptop
                                with our
                                customaizable configurations, ensuring you get the performance and your favourite
                                feature</p>
                        </div>
                        <div class="flex flex-col ring-white/50 mx-3 px-4 card" style="width: 27%;min-width: 300px">
                            <img src="{{asset('assets/icons/ic_phone.svg')}}" style="width: 18%; margin:0 0 17px 0">
                            <h2 class="text-3xl text-red-600 my-3 font-bold">Latest Device & Accessories</h2>
                            <p class="text-white text-justify" style="width:25ch max-w-full">Explore a curated selection
                                of latest
                                smartphones and gadget. Receive recommandation from our professional staffs</p>
                        </div>
                    </div>

                    <div class="flex flex-wrap justify-end items-center" style="background: #151517">
                        <div class="p-10">
                            <h2 class="text-3xl text-red-600 font-bold">We offer Customized device according to Your
                                Needs</h2>
                            <p style="max-width: 60ch; padding:30px 0 50px 0">Tailoring technology to fit your needs -
                                Delivering customized devices for a personalized digital experience</p>
                            <a href="" class='btn my-5'>Contact Us Now</a>
                        </div>
                        <img src="{{asset('assets/images/pc_custom.jpg')}}" style='max-height: 400px'>
                    </div>
                </main>


                <footer class="py-16 text-center text-sm text-gray-400">
                    © 2024 MNS Tech. All rights reserved.

                </footer>
            </div>

        </div>
    </div>
</x-app-layout>