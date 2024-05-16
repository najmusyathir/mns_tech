<style>
    .review {
        border: 1px #fff4 solid;
        border-radius: 20px;
        margin: 20px;
        padding: 20px;
        transition: 300ms;

        &:hover {
            cursor: pointer;
            border: 1px solid #fff;
        }
    }
</style>

<x-app-layout style="background: #000;">
    <div class="py-12 min-h-screen" style="background: black">
        <div class="bg-gray-50 text-black/50 dark:bg-black dark:text-white/50">
            <img id="background" class="absolute -left-20 top-0 max-w-[877px]" src="https://laravel.com/assets/img/welcome/background.svg" alt="background picture" style="z-index: 0" />
            <div class="relative min-h-screen flex flex-col items-center justify-center selection:bg-[#FF2D20] selection:text-white">
                <div class="relative w-full max-w-2xl px-6 lg:max-w-7xl">

                    <div class="content flex flex-col" style="border-radius: 20px; background: #0009;">
                        <a href="{{route('products.index')}}" class="bg-red-900 p-2 m-4 rounded-full w-fit" style="top: 0;left:0">
                            <img src="{{asset('assets/icons/ic_left.svg')}}" style="height: 40px; width:auto;z-index:80; !important">
                        </a>
                        <div class="flex items-center justify-center relative pb-10 px-10 ">
                            <div class="form-containermin-w-full flex flex-col">
                                <div class="relative flex pb-10 px-10 flex-wrap justify-center">

                                    <div class="flex flex-col justify-top items-center w-1/2" style="min-width: 180px;">
                                        <h1 class="mb-10 text-4xl font-bold text-white">Product Details</h1>
                                        <img src="{{ asset($product->prod_pic) }}" alt="{{$product->prod_title}}" style="min-width:100px; margin:0 30px">
                                    </div>

                                    <div class="flex flex-col px-10 w-1/2 overflow-y-hidden relative" style="height: 70vh; min-width:180px">

                                        <h2 class="text-2xl min-h-100  font-bold">{{$product->prod_title}}</h2>

                                        <div class="py-4 flex align-center justify-between">
                                            <div>
                                                <p class="font-semibold text-l">Brand: {{$product -> prod_brand}}</p>
                                                <p class="font-semibold text-l">Product Type: {{$product -> prod_type}}</p>
                                            </div>

                                            <p class="text-red-700 text-3xl font-bold">RM {{$product->prod_price}}</p>
                                        </div>
                                        <strong class="text-xl">Description:</strong>
                                        <br>
                                        <div class="overflow-y-scroll" style="height: 30vh;">
                                            <p><br>{!! nl2br(e($product->prod_desc)) !!}</p>
                                        </div>
                                        <br>
                                        <p>
                                            Stock available: {{$product->prod_stock}}
                                        </p>
                                        @if (Auth::user()->user_type === 'admin')
                                        <div class="abs-rgt-btm flex">

                                            <form method="POST" action="{{ route('products.edit', ['id' => $product->id] ) }}" class="btn" style="margin-right: 0;">
                                                @csrf
                                                @method('GET')
                                                <button type="submit">Update</button>
                                            </form>

                                            <form method="POST" action="{{ route('products.delete.details', ['id' => $product->id]) }}" class="btn" style="background: #d00; color:white">
                                                @csrf
                                                @method('DELETE')
                                                <button type="submit">Delete</button>
                                            </form>
                                        </div>

                                        @else
                                        <form method="POST" class="w-full flex items-right" action="{{ route('cart.addItem') }}">
                                            @csrf
                                            <input type='hidden' name="user_id" value="{{ auth()->user()->id }}">
                                            <input type='hidden' name="product_id" value="{{$product->id}}">
                                            <input type='hidden' name='quantity' value='1'>
                                            <button type="submit" style="width:fit-content" class="mt-3 btn">Add to Cart</button>
                                        </form>

                                        @endif
                                    </div>
                                    <!-- Review -->
                                    <div class="mt-20 w-full">
                                        <h2 class="text-3xl font-bold text-white w-full text-center my-4">Reviews</h2>
                                        <div class="flex flex-row flex-wrap w-full items-center justify-center">
                                            @foreach ($reviews as $review)
                                            <div style="width: 50%">
                                                <div class="review">
                                                    <h2 class="text-red-500 text-2xl font-semibold">{{$review->user->name}}</h2>
                                                    <div class="text-red-500 text-xl font-medium">
                                                        @for($i = 0; $i < $review->rating ; $i++)☆
                                                            @endfor
                                                    </div>

                                                    <div class="desc">
                                                        Description:<br>
                                                        <div style="border: 1px solid #fff4; padding: 10px; margin:10px 0; border-radius:10px">
                                                            {{$review->description}}
                                                        </div>
                                                    </div>


                                                </div>
                                            </div>
                                            @endforeach

                                        </div>
                                    </div>

                                </div>
                            </div>

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
</x-app-layout>