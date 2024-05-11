<x-app-layout style="background: #000;">

    <div class="py-12" style="background: black" >
    <img id="background" class="absolute -left-20 top-0 max-w-[877px]" src="{{asset('assets/images/setup.jpg')}}" alt="background_pic" />
        
        <div class="bg-gray-50 text-black/50 dark:bg-black dark:text-white/50" >

            <div class="relative flex flex-col items-center justify-center selection:bg-[#FF2D20] selection:text-white" >
                <div class="relative w-full max-w-2xl px-6 lg:max-w-7xl" >
                <h2 class="font-semibold text-4xl my-10 leading-tight" style="color: white; z-index:10 !important;">
                            Orders
                        </h2>
                    <div class="flex flex-wrap" style="min-height:60vh; overflow-y:scroll;">
                        @foreach ($orders as $order)
                        
                        <a href="{{route('order.details', ['order_id' => $order->order_id])}}" class="m-3 p-5 h-fit" style="height:fit-content; width: 100%; border: red 2px solid; border-radius:20px; background: #18181b;">
                            <h1><strong>Order ID:</strong> {{ $order->order_id }}</h1>
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