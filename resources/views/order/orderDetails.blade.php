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
                                <a href="{{route('order.index')}}" style="top: 0;left:0">
                                    <img src="{{asset('assets/icons/ic_left.svg')}}" style="height: 40px; width:auto">
                                </a>
                            </div>
                        </div>
                        <h2 class="font-semibold text-4xl my-3 leading-tight" style="color: white; width:100%; z-index:10 !important;">
                            Order Details: {{$order->id}}
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
                            <div class="flex flex-col items-center">
                                <img src="{{asset('assets/images/qr.jpeg')}}" style="min-width: 250px; width:300px">
                                <p class="font-extrabold mt-3 mb-1 text-xl text-[#cd1f52]">Encik Muhammad Badrul Salam Bin Yah</p>
                                <p class="text-lg">Bank Islam : <strong class="font-bold text-[#cd1f52]">03148020102026</strong></p>
                            </div>
                            <a href="{{route("payment.attempt", ['order_id' => $order->id])}}" class="btn">
                                Make payment
                            </a>

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