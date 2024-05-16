<style>
    h2 {
        margin: 20px 0 !important;
    }
    h3{
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
</style>

<x-app-layout style="background: #000;">
    <div class=" bg-black text-white/50">
        <div class="absolute w-full ax-w-[877px]">
            <img id="background" 
            src="{{ asset('assets/images/about_header.jpg') }}" class="absolute w-full -top-20"/>
            <div class="w-full h-full bg-black">

            </div>
        </div>

        <div
            class="relative min-h-screen flex flex-col items-center justify-center selection:bg-[#FF2D20] selection:text-white">
            <div class="relative w-full max-w-2xl px-6 lg:max-w-7xl">
                <main class="mt-6">
                    <div class="flex flex-col">
                        <div
                            class="flex flex-col relative bg-black/80 items-center justify-center overflow-hidden rounded-lg shadow-[0px_14px_34px_0px_rgba(0,0,0,0.08)]">
                            <h1 class="m-5 text-5xl text-red-600 font-bold">About</h1>

                            <h2 class="text-3xl text-red-600 font-bold">
                                Welcome to MNS Tech Store
                            </h2>
                            <p class="" style="max-width: 65ch;">
                                At MNS Tech Store, we are dedicated to bringing you the latest and greatest in computer
                                technology. Since our inception, we have been committed to providing top-notch products
                                and
                                unparalleled customer service. Whether you are a tech enthusiast, a gamer, or a
                                professional
                                looking for reliable hardware, MNS Tech Store is your one-stop destination for all your
                                computing needs.
                            </p>

                            <h2 class="text-3xl text-red-600 font-bold">
                                Our Story
                            </h2>
                            <p class="">

                                MNS Tech Store was founded in [Year] with a simple mission: to make cutting-edge
                                technology
                                accessible to everyone. What started as a small local shop has grown into a thriving
                                e-commerce platform, serving customers nationwide. Our passion for technology drives us
                                to
                                continuously expand our product range and enhance our services to meet the evolving
                                demands
                                of our customers.
                            </p>

                            <h2 class="text-3xl text-red-600 font-bold">
                                Our Products
                            </h2>
                            <h3 class="text-xl font-medium" style="max-width: 65ch; color: #fffb">
                                We offer a comprehensive selection of products, including:
                            </h3>

                            <div>
                                <ul>
                                    <li> <strong>Desktops & Laptops:</strong> From high-performance gaming rigs to sleek
                                        ultrabooks, we have something for everyone.</li>
                                    <li>
                                        <strong>Components: </strong> Upgrade your system with the latest processors,
                                        graphics cards, motherboards, and more.
                                    </li>
                                    <li><strong> Peripherals:</strong> Enhance your computing experience with our range
                                        of keyboards,
                                        mice, monitors,
                                        and other accessories.</li>
                                    <li><strong>Networking:</strong> Stay connected with our reliable networking
                                        equipment, including
                                        routers,
                                        switches, and adapters.</li>
                                    <li> <strong>Software:</strong> Ensure your systems run smoothly with our selection
                                        of operating
                                        systems, security
                                        software, and productivity tools.</li>
                                </ul>
                            </div>



                            <h2 class="text-3xl text-red-600 font-bold">
                                Our Commitment
                            </h2>
                            <h3 class="text-lg">
                                We believe in providing more than just products. We are committed to:
                            </h3>
                            <ul>
                                <li> <strong>Quality: </strong>We source our products from reputable brands and ensure
                                    they meet our stringent quality standards.</li>
                                <li> <strong>Customer Service: </strong>Our dedicated support team is always here to
                                    assist you with any questions or concerns.</li>
                                <li> <strong>Competitive Prices: </strong> We strive to offer the best prices without
                                    compromising on quality.</li>
                                <li> <strong>Innovation: </strong>We keep abreast of the latest technological
                                    advancements to bring you the newest products on the market.</li>
                            </ul>
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