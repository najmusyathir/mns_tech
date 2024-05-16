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

    .qs-container>* {
        padding: 20px;
    }

    .answer {
        max-width: 60ch;
        line-height: 1.75;
        margin-top: 10px;
        text-align: justify;
    }

    .question {
        color: #f00b;
        font-size: 1.3rem;
        font-weight: 600;
    }
</style>
<link href="https://cdn.jsdelivr.net/npm/tailwindcss@2.2.19/dist/tailwind.min.css" rel="stylesheet">
<x-app-layout style="background: #000;">
    <div class=" bg-black text-white/50">
        <div class="absolute top-0 left-0 overflow-hidden flex items-center" style="height:unset">
            <img id="background" class="w-full rela" src="{{ asset('assets/images/faqs_header.jpg') }}" />
            <div class=" absolute h-full w-full flex justify-center items-center" style="background:#0009"> </div>
        </div>

        <div
            class="relative min-h-screen flex flex-col items-center justify-center selection:bg-[#FF2D20] selection:text-white">
            <div class="relative w-full max-w-2xl px-6 lg:max-w-7xl">
                <main class="mt-4">
                    <div class="flex flex-col">
                        <h1 class="m-4 text-5xl text-red-600 font-extrabold">Frequently Asked Questions (FAQs)</h1>
                        <div class="flex flex-col relative bg-black/80 items-center justify-center rounded-lg">
                            <div class="flex flex-col items-start p-10 qs-container" style="max-height:unset">
                                <div>
                                    <div class="question">1. What types of products does MNS
                                        Tech Store offer?</div>
                                    <div id="answer-1" class="answer open">
                                        At MNS Tech Store, we offer a wide range of products including desktops,
                                        laptops, computer components (such as processors, graphics cards, and
                                        motherboards), peripherals, networking equipment, and software.
                                    </div>
                                </div>
                                <div>
                                    <div class="question">2. How can I track my order?</div>
                                    <div id="answer-2" class="answer">
                                        Once your order has been shipped, you will be provided with a tracking
                                        number and you may refer the tracking number on DHL official website.
                                    </div>
                                </div>
                                <div>
                                    <div class="question">3. What is your return policy?</div>
                                    <div id="answer-3" class="answer">
                                        We offer a 30-day return policy for most products. If you are not satisfied with
                                        your purchase, you can return it within 30 days of receipt for a refund or
                                        exchange. Please ensure the item is in its original condition and packaging.
                                    </div>
                                </div>
                                <div>
                                    <div class="question">4. Do you offer technical support?
                                    </div>
                                    <div id="answer-4" class="answer">
                                        Yes, we offer technical support for all products purchased from MNS Tech Store.
                                        Our expert technicians are available to assist you with any issues or questions
                                        you may have. You can contact our support team via email, or WhatsApp.
                                    </div>
                                </div>
                                <div>
                                    <div class="question">5. Are the products you sell covered
                                        by a warranty?</div>
                                    <div id="answer-5" class="answer">
                                        Yes, all products sold by MNS Tech Store come with a manufacturer's warranty.
                                        The warranty period and terms vary by product and manufacturer.
                                    </div>
                                </div>
                                <div>
                                    <div class="question">6. Can I change or cancel my order
                                        after it has been placed?</div>
                                    <div id="answer-6" class="answer">
                                        You may cancel your order before proceeding to payment. If you need to change or
                                        cancel your order, please contact our customer service team as soon as possible
                                        if the payment was made. However, once an order has been shipped,
                                        we may not be able to make changes or cancellations.
                                    </div>
                                </div>
                                <div>
                                    <div class="question">7. Do you offer international
                                        shipping?</div>
                                    <div id="answer-7" class="answer">
                                        Currently, MNS Tech Store only ships within the Malaysia only. We are working on
                                        expanding our shipping options to include international destinations in the
                                        future. Please stay tuned for updates.
                                    </div>
                                </div>
                                <div>
                                    <div class="question">8. Do you offer any internship
                                        positions?</div>
                                    <div id="answer-8" class="answer">
                                        We welcome university students studying Computer Science or related fields to
                                        join our internship program as Web Developers, Technicians, or in Human
                                        Resources. Please contact us via email for further inquiries.
                                    </div>

                                </div>

                            </div>
                            <p class="text-white/50" style="max-width:60ch">
                                For any additional questions, feel free to contact our customer service team. We're here
                                to help!
                            </p>
                        </div>
                </main>
            </div>

            <footer class="py-16 text-center text-sm text-gray-400">
                © 2024 MNS Tech. All rights reserved.

            </footer>
        </div>

    </div>
</x-app-layout>