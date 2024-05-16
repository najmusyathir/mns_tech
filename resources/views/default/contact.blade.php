<style>
    h2 {
        margin: 20px 0 !important;
    }

    h3 {
        max-width: 65ch;
    }

    p {
        font-size: 1.125rem;
        line-height: 1.75rem;
        color: #fffa;
        max-width: 65ch;
        text-align: justify;
    }

    strong {
        color: #fffc;
    }

    li {
        font-size: 1.125rem;
        line-height: 1.75rem;
        margin: 10px;
        max-width: 65ch;
    }

    .card-item {
        width: 27%;
        min-width: 250px;
        margin: 20px 40px;
        padding: 20px;
        border: 1px solid red;
        border-radius: 20px;
        display: flex;
        flex-direction: column;
        justify-content: top;
        align-items: center;

        img {
            height: 50px;
            margin: 10px;
        }

        h3 {
            color: red;
            font-weight: 700;
            font-size: 1.5rem;
            margin-bottom: 10px;
        }
    }
</style>
<link href="https://cdn.jsdelivr.net/npm/tailwindcss@2.2.19/dist/tailwind.min.css" rel="stylesheet">
<x-app-layout style="background: #000;">
    <div class=" bg-black text-white/50">
        <div class="absolute top-0 left-0 overflow-hidden flex items-center w-full">
            <img id="background" class="w-full " src="{{ asset('assets/images/contact_header.jpg') }}" />
            <div class=" absolute h-full w-full flex justify-center items-center" style="background:#0006"> </div>
        </div>

        <div
            class="relative min-h-screen flex flex-col items-center justify-center selection:bg-[#FF2D20] selection:text-white">
            <div class="relative w-full max-w-2xl px-6 lg:max-w-7xl">
                <main class="mt-4">
                    <div class="flex flex-col">
                        <h1 class="m-4 text-5xl text-red-600 font-extrabold">Contact</h1>
                        <div
                            class="flex flex-col relative bg-black/80 items-center justify-center overflow-hidden rounded-lg">
                            <div class="flex justify-center flex-wrap items-center my-5">

                                <h2 class="text-3xl text-red-600 font-extrabold m-5">
                                    Our location
                                </h2>
                                <div style="border-left: 1px solid red; padding:20 60px ;">

                                    <iframe
                                        src="https://www.google.com/maps/embed?pb=!1m14!1m8!1m3!1d15868.61356101143!2d100.3614854!3d6.1100402!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x304b4490a9b1f957%3A0xf6a8994ef7b05ef4!2sPH%26CO%20-%20Alor%20Setar%20(formerly%20PC%20DEPOT)!5e0!3m2!1sen!2smy!4v1715876889433!5m2!1sen!2smy"
                                        width="600" height="350" style="border:0;" allowfullscreen="" loading="lazy"
                                        referrerpolicy="no-referrer-when-downgrade"></iframe>
                                </div>
                            </div>

                            <div class="flex">
                                <div class="card-item">
                                    <img src="{{asset('assets/icons/ic_pin.svg')}}">
                                    <h3>Location</h3>
                                    <p>No. 41, Kompleks Perniagaan Sultan Abdul Hamid, Persiaran Sultan Abdul Hamid,
                                        05050 Alor Setar, Kedah</p>
                                </div>
                                <div class="card-item">
                                    <img src="{{asset('assets/icons/ic_ws.svg')}}">
                                    <h3>WhatsApp</h3>
                                    <p>+60 11-6169 5932</p>
                                </div>
                                <div class="card-item">

                                    <img src="{{asset('assets/icons/ic_mail.svg')}}">
                                    <h3>Email</h3>
                                    <p>mns_tech@gmail.com</p>
                                </div>

                            </div>


                        </div>
                    </div>
                </main>
            </div>

            <footer class="py-16 text-center text-sm text-gray-400">
                © 2024 MNS Tech. All rights reserved.

            </footer>
        </div>

    </div>
    </div>
</x-app-layout>