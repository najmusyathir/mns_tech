<title>Order Details | MNS Tech</title>
<x-app-layout style="background: #000;">

    <div class="pt-12" style="background: black">
        <img id="background" class="absolute -left-20 top-0 max-w-[877px]" src="{{asset('assets/images/setup.jpg')}}" alt="background_pic" />

        <div class="bg-black text-white/50">

            <div class="relative flex flex-col items-center justify-center">
                <div class="relative w-full max-w-2xl px-6 lg:max-w-7xl">

                    <div class="flex flex-wrap justify-center p-5" style="background: #000b; border-radius: 30px">
                        <div class="w-full">
                            <div class="bg-red-900 rounded-full p-2 w-fit">
                                <a href="{{route('orders.index')}}" style="top: 0;left:0">
                                    <img src="{{asset('assets/icons/ic_left.svg')}}" style="height: 40px; width:auto">
                                </a>
                            </div>
                        </div>
                        <h2 class="font-semibold text-4xl my-3 leading-tight" style="color: white; width:100%; z-index:10 !important;">
                            Order Details: {{$order->order_id}}
                        </h2>
                        <div style="width:60%">
                            <br>
                            <p class="text-red-500 text-xl my-2 mx-4 p-3 bg-black width:100%">
                                <strong class="text-extrabold">
                                    Status:
                                </strong> {{$order->status}}
                            </p>
                            <div class="flex flex-col flex-wrap text-white mx-10">
                                <p>
                                    Name: {{$user->name}}<br>
                                    Email: {{$user->email}}
                                </p>

                                <table class="order-table my-3">
                                    <thead>
                                        <td>No.</td>
                                        <td>Product Name</td>
                                        <td>Product Price</td>
                                    </thead>
                                    <tbody>
                                        @foreach ($orderItems as $index => $orderItem)
                                        <tr>
                                            <td>{{$index + 1}}.</td>
                                            <td>{{$orderItem->prod_title}}</td>
                                            <td>{{$orderItem->price_per_item}}</td>
                                        </tr>
                                        @endforeach
                                    </tbody>
                                </table>
                                <h3 class="text-3xl text-red-600 font-extrabold">RM {{$order->total_price}}</h3>
                            </div>
                        </div>

                        <div class="text-white flex flex-col justify-center">
                            Account: <br>

                            <img src="{{asset('assets/images/qr.jpg')}}" style="height: 400px;">

                        </div>
                    </div>

                    <!-- Upload Receipt -->
                    <div class="p-5 flex">
                        <div class="px-10">
                            <h3 class="text-white text-xl">
                                Upload your receipt here:
                            </h3>

                            <form method="POST" action="{{route('order.update_payment',['order_id' => $order->order_id])}}" enctype="multipart/form-data">
                                @csrf
                                @method('POST')

                                <div class="my-30 mx-auto flex flex-col " style="margin:10px; color: grey">

                                    Product Image:
                                    <label for='payment_evidence' class="prod-img-container">Upload
                                        <div id="image-preview" class="my-30 mx-auto" style="margin:10px;">
                                            <img id="preview" src="{{ asset($order->payment_evidence) }}" alt="Image Preview" style="display: none; max-width: 100px; max-height: 100px;">
                                        </div>
                                    </label>
                                    <input type="file" id="payment_evidence" name="payment_evidence" accept="payments/*" onchange="previewImage(event)" style="padding:5px; margin:5px;">
                                </div>

                                <input type="submit" value="Add" class="btn">
                            </form>
                        </div>
                        <div>
                            <img src="{{ asset($order->payment_evidence) }}" style="height: 400px;">
                     
                        </div>
                    </div>

                </div>

                <footer class="py-16 text-center text-sm text-white/70">
                    Laravel v{{ Illuminate\Foundation\Application::VERSION }} (PHP v{{ PHP_VERSION }})
                </footer>
            </div>


        </div>
    </div>
    </div>
</x-app-layout>

<script>
    document.addEventListener("DOMContentLoaded", function() {
        var paymentEvidence = "{{ $order->payment_evidence }}";
        if (paymentEvidence !== null && paymentEvidence !== "") {
            document.getElementById('preview').src = paymentEvidence;
            document.getElementById('preview').style.display = 'block';
        }
    });

    function previewImage(event) {
        var input = event.target;
        if (input.files && input.files[0]) {
            var reader = new FileReader();
            reader.onload = function(e) {
                document.getElementById('preview').src = e.target.result;
                document.getElementById('preview').style.display = 'block';
            };
            reader.readAsDataURL(input.files[0]);
        }
    }
</script>