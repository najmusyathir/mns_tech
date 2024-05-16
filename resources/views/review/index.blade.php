<style>
    .rating {
        direction: rtl;
        font-size: 2rem;
        unicode-bidi: bidi-override;
    }

    .rating>input {
        display: none;
    }

    .rating>label {
        color: grey;
        cursor: pointer;
    }

    .rating>input:checked~label,
    .rating>input:checked~label~label {
        color: red;
        
    }

    .rating>input:hover~label,
    .rating>input:hover~label~label {
        color: red;
    }
</style>
<x-app-layout style="background: #000;">

    <div class="py-12 min-h-screen" style="background: black">
        <div class="bg-gray-50 text-black/50 dark:bg-black dark:text-white/50">
            <img id="background" class="absolute -left-20 top-0 max-w-[877px]" src="https://laravel.com/assets/img/welcome/background.svg" alt="background picture" style="z-index: 0" />
            <div class="relative min-h-screen flex flex-col items-center justify-center selection:bg-[#FF2D20] selection:text-white">
                <div class="relative w-full max-w-2xl px-6 lg:max-w-7xl">

                    <div class="content " style="border-radius: 20px; background: #0009;">
                        <div class="flex items-center justify-center relative p-10 ">
                            <a href="{{route('products.index')}}" class="bg-red-900 p-2 m-4 absolute rounded-full " style="top: 0;left:0">
                                <img src="{{asset('assets/icons/ic_left.svg')}}" style="height: 40px; width:auto">
                            </a>
                            <div class="form-containermin-w-full">
                                <div class="flex p-10 flex-wrap justify-center">
                                   
                                    <form class="flex flex-col justify-center mr-3 ml-0 my-0 text-white" method="POST" action="{{ route('review.store',['id'=>$order_item->id]) }}">
                                        @csrf
                                        <h2 class="font-bold text-2xl">{{$product->prod_title}}</h2>
                                        {{$product}}
                                        {{$order_item}}
                                        <label for="rating">Rating: </label>
                                        <div class="rating flex justify-center items-center" style="justify-content:left">
                                            <input type="radio" name="rating" id="star5" value="5" required>
                                            <label for="star5" title="5 stars">☆</label>
                                            <input type="radio" name="rating" id="star4" value="4" required>
                                            <label for="star4" title="4 stars">☆</label>
                                            <input type="radio" name="rating" id="star3" value="3" required>
                                            <label for="star3" title="3 stars">☆</label>
                                            <input type="radio" name="rating" id="star2" value="2" required>
                                            <label for="star2" title="2 stars">☆</label>
                                            <input type="radio" name="rating" id="star1" value="1" required>
                                            <label for="star1" title="1 star">☆</label>
                                        </div>
                                        <label for="description">Description: </label>
                                        <input type="hidden" name="prod_id" value="{{$product->id}}">
                                        <textarea id="description" class="m-2" rows="5" cols="60" style="background: none; border: 2px solid red" name="description" required></textarea>
                                        <input type="submit" class="btn" value="Submit">
                                    </form>
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