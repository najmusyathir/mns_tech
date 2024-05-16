<title>Order Details | MNS Tech</title>
<style>
    #shipping_status {
        background: none;
        border: #f00 solid 1px;

        background-image: url('data:image/svg+xml;utf8,<svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" viewBox="0 0 24 24"><path fill="red" d="M12 15.5l-8-8 1.4-1.4L12 12.7l6.6-6.6 1.4 1.4z"/></svg>');
        background-repeat: no-repeat;
        background-position: right 10px center;

        &:hover {
            cursor: pointer;
        }
    }

    .shipping_status:focus {
        outline: none;
    }

    option {
        background-color: black;
        padding: 10px;
        margin: 10px;
        color: red;

        &hover {
            cursor: pointer;
            background: red;
            color: white;

        }
    }
</style>
<x-app-layout style="background: #000;">

    <div class="pt-12" style="background: black">
        <img id="background" class="absolute -left-20 top-0 max-w-[877px]" src="{{asset('assets/images/setup.jpg')}}"
            alt="background_pic" />

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
                                <h2 class="font-semibold text-xl mt-3 leading-tight"
                                    style="color: #f00; width:100%; z-index:10 !important;">
                                    User ID: {{$order->user_id}}
                                </h2>
                                <h2 class="font-semibold text-4xl mt-0 mb-3 leading-tight"
                                    style="color: white; width:100%; z-index:10 !important;">
                                    Payment for order: {{$order->id}}
                                </h2>

                                @elseIf (Auth::user()->user_type === 'user')
                                <h2 class="font-semibold text-4xl my-3 leading-tight"
                                    style="color: white; width:100%; z-index:10 !important;">
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
                                        @if (Auth::user()->user_type === 'user' && $shipping[0]['status'] == "Order Delivered")
                                            <td>Submit Review</td>
                                        @endif
                                    </thead>
                                    <tbody>
                                        @foreach ($order_items as $index => $item)
                                            <tr>
                                                <td>{{$index + 1}}.</td>
                                                <td>{{$item['prod_title']}}</td>
                                                <td>{{$item['quantity']}}</td>
                                                <td>{{$item['price_per_item']}}</td>

                                                @if (Auth::user()->user_type === 'user' && $shipping[0]['status'] == "Order Delivered")
                                                    <td>

                                                        @if ($reviews->isEmpty())
                                                            <a class="btn m-1"
                                                                href="{{route('review.index', ['order_item_id' => $item['id']])}}">Add
                                                            </a>
                                                        @else
                                                            @foreach ($reviews as $review)
                                                                @if ($review->prod_id == $item->prod_id)
                                                                    <a class="btn m-1"
                                                                        href="{{route('review.index', ['order_item_id' => $item['id']])}}">Add
                                                                    </a>

                                                                @else
                                                                    <a class="btn m-1"
                                                                        href="{{route('products.details', ['id' => $item['product_id']])}}">Check
                                                                        Review
                                                                    </a>
                                                                @endif
                                                            @endforeach

                                                        @endif


                                                    </td>
                                                @endif
                                            </tr>
                                        @endforeach
                                    </tbody>
                                </table>

                                <h3 class="text-xl text-red-600 font-bold text-right p-3 mb-6"
                                    style="border-bottom: dashed 1px white; border-top: dashed 1px white"><strong
                                        class="my-5">Total Price</strong> : RM {{$order->total_price}}</h3>
                                <table class="order-table my-3">
                                    <thead>
                                        <td>No.</td>
                                        <td class="whitespace-nowrap">Payment ID</td>
                                        <td>Status</td>
                                        <td>Resource</td>

                                    </thead>
                                    <tbody>
                                        @foreach ($payments as $index => $transaction)
                                            <tr>
                                                <td>{{$index + 1}}.</td>
                                                <td>{{$transaction['id']}}</td>
                                                <td>{{$transaction['status']}}</td>
                                                <td> <a href="{{ asset($transaction['payment_evidence']) }}"
                                                        class="font-bold text-blue-500 underline" download>Download</a>
                                                </td>
                                                @if ($transaction['status'] != "Payment Accepted")
                                                    <td class="flex justify-center">

                                                        @if (Auth::user()->user_type === 'admin')
                                                            <form class="flex justify-center mr-3 ml-0 my-0" id="acceptForm"
                                                                method="POST"
                                                                action="{{ route('payment.update_status', ['id' => $transaction['id']]) }}">
                                                                @csrf
                                                                <input type="hidden" name="new_status" value="Payment Accepted">
                                                                <input type="hidden" name="shipping_status" value="Order Preparing">
                                                                <button class="green-btn m-0" type="button"
                                                                    onclick="confirmAccept()">Accept</button>
                                                            </form>

                                                            @if ($transaction['status'] != "Payment Accepted")

                                                                <form class="mr-3 ml-0 my-0 flex justify-center" method="POST"
                                                                    action="{{ route('payment.update_status', ['id' => $transaction['id']]) }}">
                                                                    @csrf
                                                                    <input type="hidden" name="new_status" value="Payment Rejected">
                                                                    <input type="hidden" name="shipping_status"
                                                                        value="Order Processing">
                                                                    <button class="btn m-0" type="submit">Reject</button>
                                                                </form>

                                                                <form class="m-0 flex justify-center" method="POST"
                                                                    action="{{ route('payment.delete', ['payment_id' => $transaction['id']]) }}">
                                                                    @csrf
                                                                    @method('DELETE')
                                                                    <input type="hidden" name="order_id"
                                                                        value="{{$transaction->order_id}}">
                                                                    <button class="btn m-0" type="submit">Delete</button>
                                                                </form>
                                                            @endif

                                                            @elseIf (Auth::user()->user_type === 'user')
                                                            <form class="m-0 flex justify-center" method="POST"
                                                                action="{{ route('payment.delete', ['payment_id' => $transaction['id']]) }}">
                                                                @csrf
                                                                @method('DELETE')
                                                                <input type="hidden" name="order_id"
                                                                    value="{{$transaction->order_id}}">
                                                                <button class="btn m-0" type="submit">Delete</button>
                                                            </form>

                                                        @endif

                                                    </td>
                                                @endif

                                            </tr>
                                        @endforeach
                                    </tbody>
                                </table>
                            </div>
                        </div>

                        @if (Auth::user()->user_type === 'user')

                            @if ($order->status == 'Payment Accepted')
                                <div class="text-white flex flex-col justify-center">
                                    <div class="flex flex-col items-center">
                                        <div style="border: solid red 3px; border-radius: 50%; padding:10px; ">
                                            <img src="{{asset('assets/icons/ic_truck_red.svg')}}"
                                                style="width:100px; margin-left:6px; margin-top:6px;">
                                        </div>
                                    </div>

                                    <div class="flex flex-col mt-4 text-center" style="width:200px">

                                        @foreach ($shipping as $ship)
                                            <p for="shipping_status" class="text-red-500 font-semibold text-2xl">Shipment Status:
                                            </p>
                                            <p class="text-red-500 btn text-nowrap w-full mx-0 my-2 font-semibold">{{$ship->status}}
                                            </p>

                                            @if($user->phone_no == null || $user->address == null)
                                                <p class="text-red-600 text-lg font-semibold my-3">Waiting user to update Address and
                                                    Phone No</p>
                                            @endif

                                            @if ($ship->status == 'Order Shipped' || $ship->status == 'Order Delivered')
                                                <p class="text-red-500 text-xl font-semibold">Tracking number:<br>
                                                    DHL - {{$ship->tracking_no}}
                                                </p>
                                                @if ($ship->status == 'Order Shipped')
                                                    <form method="POST" class="flex flex-col items-center"
                                                        action="{{route('shipping.update_tracking', ['id' => $ship->order_id])}}"
                                                        class="w-full flex flex-col justify-center text-center"
                                                        enctype="multipart/form-data">
                                                        @csrf
                                                        @method('POST')
                                                        <p class="text-red-500">Tracking number: </p>
                                                        <input type="hidden" value="{{$ship->tracking_no}}" name="tracking_no"
                                                            class="bg-black text-white">

                                                        <input type="hidden" name="status" value="Order Delivered "
                                                            class="bg-black text-white">

                                                        <input type="submit" value="Item received" class="w-fit btn m-0 mt-3">
                                                    </form>
                                                @endif
                                            @endif
                                        @endforeach
                                    </div>
                                </div>

                            @else
                                <div class="text-white flex flex-col justify-center">
                                    <div class="flex flex-col items-center">
                                        <img src="{{asset('assets/images/qr.jpeg')}}" style="min-width: 250px; width:300px">
                                        <p class="font-extrabold mt-3 mb-1 text-xl text-[#cd1f52]">Encik Muhammad Badrul Salam
                                            Bin Yah</p>
                                        <p class="text-lg">Bank Islam : <strong
                                                class="font-bold text-[#cd1f52]">03148020102026</strong></p>
                                    </div>

                                    <div class="flex mt-4" style="width:200px">

                                        <form method="POST" action="{{route('payment.create', ['order_id' => $order->id]) }}"
                                            enctype="multipart/form-data">
                                            @csrf
                                            @method('POST')

                                            <div class="my-30 mx-auto flex items-center" style="color: grey">
                                                <label for='payment_evidence' class="prod-img-container m-0">Upload </label>
                                                <div class="ml-3">
                                                    <input type="file" style="display:block; height:fit-content"
                                                        id="payment_evidence" accept="*" name="payment_evidence"
                                                        style="padding:5px; margin:5px; ">
                                                    <input type="submit" value="Add" class="btn m-0 mt-3">
                                                </div>
                                                <input type="hidden" name="order_id" value="{{$order->id}}">

                                            </div>
                                        </form>
                                    </div>
                                </div>
                            @endif

                        @else

                            <div class="text-white flex flex-col justify-center">
                                <div class="flex flex-col items-center">
                                    <div style="border: solid red 3px; border-radius: 50%; padding:10px; ">
                                        <img src="{{asset('assets/icons/ic_truck_red.svg')}}"
                                            style="width:100px; margin-left:6px; margin-top:6px;">
                                    </div>
                                </div>

                                <div class="flex mt-4 flex-col text-center" style="width:200px">

                                    @foreach ($shipping as $ship)
                                        <p for="shipping_status" class="text-red-500 font-semibold text-2xl">Shipment Status:
                                        </p>
                                        <p class="text-red-500 btn text-nowrap w-full mx-0 my-3 font-semibold">{{$ship->status}}
                                        </p>

                                        @if ($ship->status == 'Order Preparing')
                                            <form method="POST"
                                                action="{{route('shipping.update_tracking', ['id' => $ship->order_id])}}"
                                                class="w-full flex flex-col justify-center text-center"
                                                enctype="multipart/form-data">
                                                @csrf
                                                @method('POST')
                                                <p class="text-red-500">Tracking number: </p>
                                                <input type="text" name="tracking_no" class="bg-black text-white" required>
                                                <input type="hidden" name="status" value="Order Shipped "
                                                    class="bg-black text-white">

                                                @if($user->phone_no == null || $user->address == null)
                                                    <p class="text-red-600 text-lg font-semibold my-3">Waiting user to update Address
                                                        and Phone No</p>
                                                    @else <input type="submit" value="Update" class="w-fit btn m-0 mt-3">
                                                @endif
                                            </form>
                                        @endif

                                        @if ($ship->status == 'Order Shipped' || $ship->status == 'Order Delivered')
                                            <p class="text-red-500 text-xl font-semibold">Tracking number:<br>
                                                DHL - {{$ship->tracking_no}}

                                            </p>
                                        @endif
                                    @endforeach
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
    <script>
        function confirmAccept() {
            if (confirm('Are you sure you want to accept?')) {
                document.getElementById('acceptForm').submit();
            }
        }
    </script>
</x-app-layout>