<x-app-layout style="background: #000;">

    <div class="py-12 min-h-screen" style="background: black">
        <div class="bg-gray-50 text-black/50 dark:bg-black dark:text-white/50">
            <div class="relative min-h-screen flex flex-col items-center justify-center selection:bg-[#FF2D20] selection:text-white">
                <div class="relative w-full max-w-2xl px-6 lg:max-w-7xl">
                    <div class="flex flex-wrap">
                        @foreach ($orders as $order)
                        <a class="m-3 p-5" style="width:35%; border: red 2px solid; border-radius:20px ">
                    
                            <h1><strong>Order ID:</strong> {{ $order->order_id }}</h1>
                            <p><strong>User ID:</strong> {{ $order->user_id }}</p>
                            <strong>Total Price:</strong class='m-3'> ${{ number_format($order->total_price, 2) }}
                            <strong class="m-3">Status:</strong> {{ $order->status }}</p>
                            <p><strong class="m-3">Created At:</strong> {{ $order->created_at }}
                           <strong class="m-3">Updated At:</strong> {{ $order->updated_at }}</p>
                        </a>
                        <hr>
                        @endforeach

                    </div>

                    <footer class="py-16 text-center text-sm text-black dark:text-white/70">
                        Laravel v{{ Illuminate\Foundation\Application::VERSION }} (PHP v{{ PHP_VERSION }})
                    </footer>
                </div>


            </div>
        </div>
    </div>
</x-app-layout>