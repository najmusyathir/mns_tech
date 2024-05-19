<title>Product List | MNS Tech</title>

<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet"
    integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
<link href="https://cdn.jsdelivr.net/npm/tailwindcss@2.2.19/dist/tailwind.min.css" rel="stylesheet">

<link rel="stylesheet" href="https://cdn.datatables.net/1.11.3/css/dataTables.bootstrap4.min.css">
<script src="https://cdn.datatables.net/1.11.3/js/jquery.dataTables.min.js"></script>
<script src="https://cdn.datatables.net/1.11.3/js/dataTables.bootstrap4.min.js"></script>

<style>
    .filter a {
        width: 100% !important;
        height: 100%;
        padding: 10px;
        border-top: 1px solid red;
    }

    .filter a:hover {
        cursor: pointer;
    }
</style>


<script src="https://cdn.tailwindcss.com"></script>
<link href="{{ asset('css/styles.css') }}" rel="stylesheet">

<x-app-layout class="font-sans antialiased dark:bg-black dark:text-white/50">

    <div class=" text-black/50 bg-black dark:text-white/50">
        <img id="background" style="z-index: 1 !important;" class="absolute -left-20 top-0 max-w-[877px]"
            src="{{asset('assets/images/setup.jpg')}}" alt="background_pic" />
        <div
            class="z-10 relative min-h-screen flex flex-col items-center justify-center selection:bg-[#FF2D20] selection:text-white">
            <div class="relative w-full max-w-2xl px-6 lg:max-w-7xl ">

                <div
                    class="mt-24 content flex flex-col items-start gap-6 overflow-hidden rounded-lg bg-white p-6 shadow-[0px_14px_34px_0px_rgba(0,0,0,0.08)] ring-1 ring-white/[0.05] transition duration-300 hover:text-black/70 hover:ring-black/20 focus:outline-none focus-visible:ring-[#FF2D20] md:row-span-3 lg:p-10 lg:pb-10 dark:bg-zinc-900 dark:ring-zinc-800 dark:hover:text-white/70 ">

                    @if (Auth::user()->user_type === 'admin')
                        <div class="icons" style="position: fixed; right:50px;bottom:50px; z-index:1">
                            <a href="{{route('products.add')}}">
                                <img src="{{asset('assets/icons/ic_plus.svg')}}" style="width: 40px;">
                            </a>
                        </div>


                    @else
                        <!-- Cart Drawer-->
                        <div class="BS-drawer">

                            <button class="relative" type="button" data-bs-toggle="offcanvas"
                                data-bs-target="#offcanvasExample" aria-controls="offcanvasExample"
                                style="position: fixed; right:50px;bottom:50px; z-index:1">
                                <div class="icons">

                                    <img src="{{asset('assets/icons/ic_bag.svg')}}" style="width: 40px;">

                                </div>
                            </button>

                            <div class="offcanvas offcanvas-end bg-gray-900" tabindex="-1" id="offcanvasExample"
                                aria-labelledby="offcanvasExampleLabel">
                                <div class="offcanvas-header">
                                    <h2 class="offcanvas-title text-white text-3xl" id="offcanvasExampleLabel">Cart</h2>

                                    <button type="button"
                                        style="margin-right:10px; margin-top:10px; width:35px; height:40px;"
                                        class="btn-close text-reset" data-bs-dismiss="offcanvas" aria-label="Close">
                                        <img src="{{asset('assets/icons/ic_x.svg')}}" style="width: 40px" alt="X">
                                    </button>
                                </div>

                                <div class="offcanvas-body bg-none">
                                    <div class="text-white relative">

                                        <!-- Cart Items -->
                                        <div class="flex flex-col ">
                                            @foreach ($carts as $cart)

                                                @if ($cart->product)
                                                    <div
                                                        class="my-2 product flex flex-col items-start overflow-hidden rounded-lg p-6 shadow-[0px_14px_34px_0px_rgba(0,0,0,0.08)] ring-1 ring-white/[0.05] transition duration-300 hover:text-black/70 hover:ring-black/20 focus:outline-none focus-visible:ring-[#FF2D20] md:row-span-3 lg:p-10 lg:pb-10 dark:bg-zinc-900 dark:ring-zinc-800 dark:hover:text-white/70 dark:hover:ring-zinc-700 dark:focus-visible:ring-[#FF2D20]">
                                                        <a id="docs-card"
                                                            href="{{route('products.details', ['id' => $cart->product->id])}}"
                                                            class="">
                                                            <div style="display: flex; flex-direction:row; position:relative">
                                                                <div>
                                                                    <img src="{{ asset($cart->product->prod_pic) }}"
                                                                        alt="{{ $cart->product->prod_title }}"
                                                                        style="max-width: 100px; max-height: 100px;">
                                                                </div>
                                                                <div style="margin:10px">
                                                                    {{ $cart->product->prod_title }}
                                                                    <br>
                                                                    <div class="flex m-2">
                                                                        <form method="POST"
                                                                            action="{{route('cart.minus', ['cart_id' => $cart->cart_id])}}"
                                                                            style="padding: 5px; background:red; height: 25px; width: 25px;">
                                                                            @csrf
                                                                            <button type="submit">
                                                                                <img src="{{asset('assets/icons/ic_minus_white.svg')}}"
                                                                                    style="width: 100%">
                                                                            </button>
                                                                        </form>

                                                                        <div
                                                                            style="padding: 5px; background:none;
                                                                                                                                                                                                                                                display: flex; justify-content:center; font-weight: 600; align-items:center;
                                                                                                                                                                                                                                                text-align:center; height: 25px; width: 35px;">
                                                                            {{$cart->quantity }}
                                                                        </div>
                                                                        <form method="POST"
                                                                            action="{{route('cart.add', ['cart_id' => $cart->cart_id])}}"
                                                                            style="padding: 5px; background:red; height: 25px; width: 25px;">
                                                                            @csrf
                                                                            <button type="submit">
                                                                                <img src="{{asset('assets/icons/ic_plus_white.svg')}}"
                                                                                    style="width: 100%">
                                                                            </button>
                                                                        </form>
                                                                    </div>
                                                                </div>
                                                            </div>

                                                            <br>
                                                            <div style="font-size: 1.2em; font-weight:600; color:#F33;">
                                                                RM {{ $cart->product->prod_price }}
                                                            </div>
                                                            <!-- Edit for AddtoCart button -->
                                                            <div style="width: 100%; display: flex; justify-content: end">
                                                                <form method="POST"
                                                                    action="{{route('cart.removeItem', ['cart_id' => $cart->cart_id])}}"
                                                                    class="btn" style="margin: 0">
                                                                    @csrf
                                                                    @method('DELETE')
                                                                    <button type="submit">Remove</button>
                                                                </form>
                                                            </div>

                                                        </a>
                                                    </div>

                                                @endif
                                            @endforeach
                                        </div>

                                    </div>
                                </div>


                                <div class="offcanvas-footer p-3">
                                    <h2 class="text-2xl font-bold text-gray-50">Total Price: RM <span
                                            id="totalPrice">Loading...</span></h2>

                                    <form method="POST" action="{{route('order.create')}}" style="margin: 0">
                                        @csrf
                                        <input type='hidden' name="total_price" id="totalCheckoutPrice" value="">
                                        <input type='hidden' name="status" value="Payment pending">
                                        <button type='submit' class="btn m-0 my-3 w-full">Checkout</button>
                                    </form>

                                </div>
                            </div>
                        </div>

                    @endif

                    <h1 class="font-semibold text-black dark:text-white"
                        style="font-size: 2em; color: white !important">Product List</h1>

                    <!-- Product List container -->
                    <div class="flex">
                        <div class="mr-5">
                            <div class="flex flex-col p-2 filter">
                                <a href="{{ route('products.index') }}" class="w-full"> All Product</a>
                                <a href="{{ route('products.index', ['type' => 'cpu']) }}" class="w-full">CPU</a>
                                <a href="{{ route('products.index', ['type' => 'mb']) }}">Motherboards</a>
                                <a href="{{ route('products.index', ['type' => 'ram']) }}">RAM</a>
                                <a href="{{ route('products.index', ['type' => 'ssdhdd']) }}">Storage Device
                                </a>
                                <a href="{{ route('products.index', ['type' => 'gpu']) }}">GPU</a>
                                <a href="{{ route('products.index', ['type' => 'psu']) }}">Power Supply</a>
                                <a href="{{ route('products.index', ['type' => 'case']) }}">Casing</a>
                                <a href="{{ route('products.index', ['type' => 'cooler']) }}">CPU Cooler</a>
                                <a href="{{ route('products.index', ['type' => 'accesories']) }}">Accessories</a>
                                <a href="{{ route('products.index', ['type' => 'peripherals']) }}">Peripherals</a>
                                <a href="{{ route('products.index', ['type' => 'Others']) }}">Others</a>
                            </div>
                        </div>

                        <div id="productsContainer" class="grid gap-6 lg:grid-cols-2 lg:gap-8">
                            @foreach ($products as $product)
                                <a id="docs-card" href="{{ route('products.details', ['id' => $product->id]) }}"
                                    class="product flex flex-col items-start gap-6 overflow-hidden rounded-lg p-6 shadow-[0px_14px_34px_0px_rgba(0,0,0,0.08)] ring-1 ring-white/[0.05] transition duration-300 hover:text-black/70 hover:ring-black/20 focus:outline-none focus-visible:ring-[#FF2D20] md:row-span-3 lg:p-10 lg:pb-10 dark:bg-zinc-900 dark:ring-zinc-800 dark:hover:text-white/70 dark:hover:ring-zinc-700 dark:focus-visible:ring-[#FF2D20]"
                                    data-type="{{ $product->prod_type }}">
                                    <div style="display: flex; flex-direction:row;">
                                        <div style="margin:10px">
                                            {{ $product->prod_title }}
                                            <br>
                                            Stock: {{ $product->prod_stock }}
                                        </div>
                                        <div>
                                            <img src="{{ asset($product->prod_pic) }}" alt="{{ $product->prod_title }}"
                                                style="max-width: 100px; max-height: 100px;">
                                        </div>
                                    </div>
                                    <br>
                                    <div style="font-size: 1.2em; font-weight:600; color:#F33">
                                        RM {{ $product->prod_price }}
                                    </div>

                                    @if (Auth::user()->user_type === 'admin')
                                        <form method="POST" action="{{ route('products.delete', ['id' => $product->id]) }}"
                                            class="btn abs-rgt-btm" style="margin-right:20px">
                                            @csrf
                                            @method('DELETE')
                                            <button type="submit">Delete</button>
                                        </form>
                                    @else
                                        <form method="POST" action="{{ route('cart.addItem') }}" class="btn abs-rgt-btm m-3">
                                            @csrf
                                            <input type='hidden' name="user_id" value="{{ auth()->user()->id }}">
                                            <input type='hidden' name="product_id" value="{{ $product->id }}">
                                            <input type='hidden' name='quantity' value='1'>
                                            <button type="submit">Add to Cart</button>
                                        </form>
                                    @endif
                                </a>
                            @endforeach
                        </div>
                    </div>

                </div>

                <footer class="py-16 text-center text-sm text-black dark:text-white/70">
                    Laravel v{{ Illuminate\Foundation\Application::VERSION }} (PHP v{{ PHP_VERSION }})
                </footer>


            </div>
        </div>

        <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js"
            integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo"
            crossorigin="anonymous"></script>
        <script src="https://cdn.jsdelivr.net/npm/popper.js@1.14.7/dist/umd/popper.min.js"
            integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1"
            crossorigin="anonymous"></script>
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.3.1/dist/js/bootstrap.min.js"
            integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM"
            crossorigin="anonymous"></script>

        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"
            integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz"
            crossorigin="anonymous"></script>

        <script>
            // Make an AJAX GET request to the route
            fetch("{{ route('cart.total') }}")
                .then(response => response.json())
                .then(data => {
                    // Update the total price in the HTML
                    document.getElementById('totalPrice').innerText = data.totalPrice;
                    const totalPrice = parseFloat(data.totalPrice.replace(',', ''));
                    document.getElementById('totalCheckoutPrice').value = totalPrice;
                })
                .catch(error => {
                    console.error('Error:', error);
                });


        </script>

</x-app-layout>