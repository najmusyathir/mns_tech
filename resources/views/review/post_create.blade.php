<x-app-layout style="background: #000;">

    <div class="py-12 min-h-screen" style="background: black">
        <div class="bg-gray-50 text-black/50 dark:bg-black dark:text-white/50">
            <img id="background" class="absolute -left-20 top-0 max-w-[877px]" src="https://laravel.com/assets/img/welcome/background.svg" alt="background picture" style="z-index: 0" />
            <div class="relative min-h-screen flex flex-col items-center justify-center selection:bg-[#FF2D20] selection:text-white">
                <div class="relative w-full max-w-2xl px-6 lg:max-w-7xl">

                    <div class="content " style="border-radius: 20px; background: #0009;">
                        <div class="flex flex-col items-center justify-center relative p-10" style="height:300px">
                            <a href="{{route('products.index')}}" class="bg-red-900 p-2 m-4 absolute rounded-full " style="top: 0;left:0">
                                <img src="{{asset('assets/icons/ic_left.svg')}}" style="height: 40px; width:auto">
                            </a>

                            <img src="{{asset('assets/icons/ic_tick_green.svg')}}" style="height: 40px; width:auto">
                            <h2 class="text-3xl font-semibold text-white">Review Submitted. Refirecting to product details to check your review</h2>
                            <br>
                            <a href="{{route('products.details',['id'=>$product->id])}}" class="btn">
                                Check Review
                            </a>
                        </div>
                    </div>
                </div>

                <footer class="py-16 text-center text-sm text-black dark:text-white/70">
                    Laravel v{{ Illuminate\Foundation\Application::VERSION }} (PHP v{{ PHP_VERSION }})
                </footer>
            </div>


        </div>
    </div>
    </div>

</x-app-layout>