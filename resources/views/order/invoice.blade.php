<title>Order Details | MNS Tech</title>
<x-app-layout style="background: #000;">

    <div class="pt-12" style="background: black">
        <img id="background" class="absolute -left-20 top-0 max-w-[877px]" src="{{asset('assets/images/setup.jpg')}}" alt="background_pic" />

        <div class="bg-black text-white/50">

            <div class="relative flex flex-col items-center justify-center">
                <div class="relative w-full max-w-2xl px-6 lg:max-w-7xl">

                    <div class="flex flex-wrap justify-around p-5" style="background: #000b; border-radius: 30px">

                        <div style="width:60%">

                            <div class="bg-red-900 rounded-full p-2 w-fit">
                                <a href="{{route('order.index')}}" style="top: 0;left:0">
                                    <img src="{{asset('assets/icons/ic_left.svg')}}" style="height: 40px; width:auto">
                                </a>
                            </div>

                            <h2 class="font-semibold text-4xl my-3 leading-tight" style="color: white; width:100%; z-index:10 !important;">
                                Invoice for order: {{$order->id}}
                                <p class="text-white">

                                </p>
                            </h2>

                            <!-- User details -->
                            <div class="text-white">
                                <p>Name: {{$user->name}}</p>
                                <p>Email: {{$user->email}}</p>
                                <p>Address: {{$user->address}}</p>
                                <p>Phone No: {{$user->phone_no}}</p>
                            </div>


                            <div class="flex flex-col  text-white mx-10">

                                <table class="order-table my-3">
                                    <thead>
                                        <td>No.</td>
                                        <td>Product Name</td>
                                        <td>Quantity</td>
                                        <td>Product Price</td>
                                    </thead>
                                    <tbody>
                                        @foreach ($order_items as $index => $item)
                                        <tr>
                                            <td>{{$index + 1}}.</td>
                                            <td>{{$item['prod_title']}}</td>
                                            <td>{{$item['quantity']}}</td>
                                            <td>{{$item['price_per_item']}}</td>
                                        </tr>
                                        @endforeach
                                    </tbody>
                                </table>

                                <h3 class="text-xl text-red-600 font-bold text-right p-3 mb-6" style="border-bottom: dashed 1px white; border-top: dashed 1px white"><strong class="my-5">Total Price</strong> : RM {{$order->total_price}}</h3>
                                <div class="w-full flex justify-center">

                                    <a href="{{route('order.invoice.print',['order_id'=>$order->id])}}" class="btn m-1">
                                        Print Receipt
                                    </a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <footer class="py-10 text-center text-sm text-white/70">
                    Laravel v{{ Illuminate\Foundation\Application::VERSION }} (PHP v{{ PHP_VERSION }})
                </footer>
            </div>


        </div>
    </div>
    </div>
</x-app-layout>