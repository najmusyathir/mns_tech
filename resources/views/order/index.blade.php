<x-app-layout style="background: #000;">
    <div class="py-12" style="background: black">
        <img id="background" class="absolute -left-20 top-0 max-w-[877px]" src="{{asset('assets/images/setup.jpg')}}"
            alt="background_pic" />

        <div class="bg-gray-50 text-black/50 dark:bg-black dark:text-white/50">

            <div class="relative flex flex-col items-center justify-center selection:bg-[#FF2D20] selection:text-white">
                <div class="relative w-full max-w-2xl px-6 lg:max-w-7xl">
                    <h2 class="font-semibold text-4xl my-10 leading-tight" style="color: white; z-index:10 !important;">
                        Orders
                    </h2>
         
                    <div class="flex flex-col py-3" id="scrollable-div" style="min-height:60vh; overflow-y:scroll;">
                        @foreach ($orders as $order)
                                                @if (Auth::user()->user_type === 'admin')
                                                    <a href="{{ route('payment.attempt', ['order_id' => $order->id]) }}"
                                                        class="justify-between flex my-2 p-3 h-fit w-full"
                                                        style="border: red 2px solid; border-radius:20px; background: #222a;">
                                                @elseif (Auth::user()->user_type === 'user')
                                                    <a href="{{ route('order.details', ['order_id' => $order->id]) }}"
                                                        class="justify-between flex my-2 p-3 h-fit w-full"
                                                        style="border: red 2px solid; border-radius:20px; background: #222a;">
                                                @endif
                                                        <div class="flex-col">
                                                            <div class="flex">
                                                                <p class="mr-3"><strong>User ID:</strong> {{ $order->user_id }}</p>
                                                                <p><strong>Order ID:</strong> {{ $order->id }}</p>
                                                            </div>
                                                            <div class="flex">
                                                                <strong>Total Price:</strong> ${{ number_format($order->total_price, 2) }}
                                                                <p>
                                                                    <strong class="m-3">Created At:</strong> {{ $order->created_at }}
                                                                    <strong class="m-3">Updated At:</strong> {{ $order->updated_at }}
                                                                </p>
                                                            </div>
                                                        </div>
                                                        @php
                                                            // Find the corresponding shipping for this order
                                                            $shipping = $shippings->firstWhere('order_id', $order->id);
                                                        @endphp

                                                        @if($order->status == "Order Cancelled")

                                                            <p class="flex text-2xl font-extrabold items-center text-red-500">
                                                                {{$order->status}}
                                                            </p>

                                                        @elseif ($shipping)
                                                            <p class="flex text-2xl font-extrabold items-center text-red-500">
                                                                @if ($order->status == "Payment Rejected" || $order->status == "Payment Pending" || $order->status == "Order Cancelled")
                                                                    {{$order->status}}

                                                                @else
                                                                    {{ $shipping->status }}
                                                                @endif
                                                            </p>
                                                        @else
                                                            <p class="flex text-2xl font-extrabold items-center text-red-500">
                                                                No Shipping Information
                                                            </p>
                                                        @endif
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

<script>
    window.addEventListener('load', function () {
        var scrollableDiv = document.getElementById('scrollable-div');
        if (scrollableDiv.scrollHeight <= scrollableDiv.clientHeight) {
            scrollableDiv.style.overflowY = 'hidden';
        }
    });
</script>