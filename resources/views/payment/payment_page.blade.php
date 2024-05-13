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

                            @if (Auth::user()->user_type === 'admin')
                            <h2 class="font-semibold text-xl mt-3 leading-tight" style="color: #f00; width:100%; z-index:10 !important;">
                                User ID: {{$order->user_id}}
                            </h2>
                            <h2 class="font-semibold text-4xl mt-0 mb-3 leading-tight" style="color: white; width:100%; z-index:10 !important;">
                                Payment for order: {{$order->id}}
                            </h2>

                            @elseIf (Auth::user()->user_type === 'user')
                            <h2 class="font-semibold text-4xl my-3 leading-tight" style="color: white; width:100%; z-index:10 !important;">
                                Payment for order: {{$order->id}}
                               <p class="text-white">
                     
                               </p>
                            </h2>
                            @endif

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
                                <table class="order-table my-3">
                                    <thead>
                                        <td>No.</td>
                                        <td class="whitespace-nowrap">Payment ID</td>
                                        <td>Status</td>
                                        <td>Resource</td>
                                        <td></td>
                                    </thead>
                                    <tbody>
                                        @foreach ($payments as $index => $transaction)
                                        <tr>
                                            <td>{{$index + 1}}.</td>
                                            <td>{{$transaction['id']}}</td>
                                            <td>{{$transaction['status']}}</td>
                                            <td> <a href="{{ asset($transaction['payment_evidence']) }}" class="font-bold text-blue-500 underline" download>Download</a>
                                            </td>
                                            <td class="flex justify-center">

                                                @if (Auth::user()->user_type === 'admin')
                                                <form class="flex justify-center mr-3 ml-0 my-0" method="POST" action="{{ route('payment.update_status', ['id' => $transaction['id']]) }}">
                                                    @csrf
                                                    <input type="hidden" name="new_status" value="Payment Accepted">
                                                    <button class="green-btn m-0" type="submit">Accept</button>
                                                </form>

                                                <form class="mr-3 ml-0 my-0 flex justify-center" method="POST" action="{{ route('payment.update_status', ['id' => $transaction['id']]) }}">
                                                    @csrf
                                                    <input type="hidden" name="new_status" value="Payment Rejected">
                                                    <button class="btn m-0" type="submit">Reject</button>
                                                </form>
                                                <form class="m-0 flex justify-center" method="POST" action="{{ route('payment.delete', ['payment_id' => $transaction['id']]) }}">
                                                    @csrf
                                                    @method('DELETE')
                                                    <input type="hidden" name="order_id" value="{{$transaction->order_id}}">
                                                    <button class="btn m-0" type="submit">Delete</button>
                                                </form>

                                                @elseIf (Auth::user()->user_type === 'user')
                                                <form class="m-0 flex justify-center" method="POST" action="{{ route('payment.delete', ['payment_id' => $transaction['id']]) }}">
                                                    @csrf
                                                    @method('DELETE')
                                                    <input type="hidden" name="order_id" value="{{$transaction->order_id}}">
                                                    <button class="btn m-0" type="submit">Delete</button>
                                                </form>

                                                @endif

                                            </td>
                                        </tr>
                                        @endforeach
                                    </tbody>
                                </table>
                            </div>
                        </div>

                        @if (Auth::user()->user_type === 'user')
                        <div class="text-white flex flex-col justify-center">
                            <div class="flex flex-col items-center">
                                <img src="{{asset('assets/images/qr.jpeg')}}" style="min-width: 250px; width:300px">
                                <p class="font-extrabold mt-3 mb-1 text-xl text-[#cd1f52]">Encik Muhammad Badrul Salam Bin Yah</p>
                                <p class="text-lg">Bank Islam : <strong class="font-bold text-[#cd1f52]">03148020102026</strong></p>
                            </div>

                            <div class="flex mt-4" style="width:200px">

                                <form method="POST" action="{{route('payment.create', ['order_id' => $order->id] ) }}" enctype="multipart/form-data">
                                    @csrf
                                    @method('POST')

                                    <div class="my-30 mx-auto flex items-center" style="color: grey">
                                        <label for='payment_evidence' class="prod-img-container m-0">Upload </label>
                                        <div class="ml-3">
                                            <input type="file" style="display:block; height:fit-content" id="payment_evidence" accept="*" name="payment_evidence" style="padding:5px; margin:5px; ">
                                            <input type="submit" value="Add" class="btn m-0 mt-3">
                                        </div>
                                        <input type="hidden" name="order_id" value="{{$order->id}}">

                                    </div>

                                </form>


                            </div>


                        </div>
                        @endif


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