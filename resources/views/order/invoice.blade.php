<x-app-layout style="background: #000;">

    <div class="py-12 min-h-screen" style="background: black">
        <div class="bg-gray-50 text-black/50 dark:bg-black dark:text-white/50">
            <img id="background" class="absolute -left-20 top-0 max-w-[877px]" src="https://laravel.com/assets/img/welcome/background.svg" alt="background picture" style="z-index: 0" />
            <div class="relative min-h-screen flex flex-col items-center justify-center selection:bg-[#FF2D20] selection:text-white">
                <div class="relative w-full max-w-2xl px-6 lg:max-w-7xl">

                    <div class="content " style="border-radius: 20px; background: #0009;">
                        <div class="flex flex-col items-center justify-center relative p-10 ">
                            <a href="{{route('products.index')}}" class="bg-red-900 p-2 m-4 absolute rounded-full " style="top: 0;left:0">
                                <img src="{{asset('assets/icons/ic_left.svg')}}" style="height: 40px; width:auto">
                            </a>


                            <h2 class="text-3xl text-semibold text-white"> this is checkout page</h2>
                            <br>

                            <h1>Items</h1><br>
                            <div class="flex flex-col">
                                <div id="order_items">

                                </div>

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

    <script>
        fetch("{{$orderItems}}")
            .then(response => response.json())
            .then(data => {
                document.getElementById('order_items').innerHTML = data;

                console.log(data[1].order_item_id)
            })
            .catch(error => {
                console.error('Error:', error);
            });
    </script>
</x-app-layout>