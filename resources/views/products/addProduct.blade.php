<x-app-layout class="font-sans antialiased dark:bg-black dark:text-white/50">

    <div class="bg-gray-50 text-black/50 dark:bg-black dark:text-white/50">
        <img id="background" class="absolute -left-20 top-0 max-w-[877px]" src="https://laravel.com/assets/img/welcome/background.svg" alt="background picture" />
        <div class="relative min-h-screen flex flex-col items-center justify-center selection:bg-[#FF2D20] selection:text-white">
            <div class="relative w-full max-w-2xl px-6 lg:max-w-7xl">
       
                <h1 class="text-5xl mt-20 mb-10 font-semibold text-white">Add Product</h1>
                <div class="content">
                    <div class="flex items-center justify-center ">
                        <div class="form-container min-w-full relative">
                            <a href="{{route('products.index')}}" class="bg-red-900 p-2 absolute rounded-full " style="top: 0;left:0">
                                <img src="{{asset('assets/icons/ic_left.svg')}}" style="height: 40px; width:auto">
                            </a>

                            <div class="form-container px-10 mx-10 my-2 min-w-full">
                                <main class="mt-6">
                                    <form method="POST" action="{{ route('products.store') }}" enctype="multipart/form-data">
                                        @csrf
                                        <div class="my-30 mx-auto flex flex-col" style="margin:10px; color: grey">
                                            <label for='prodTitle'>Product Title</label>
                                            <input type="text" id="prodTitle" name="prod_title" placeholder="Product Title">
                                        </div>

                                        <div class="my-30 mx-auto flex flex-col align-top" style="margin:10px; color: grey;">
                                            <label for='prodDesc' style="min-width: 150px;">Product Description</label>
                                            <textarea type="text" id="prodDesc" name="prod_desc"></textarea>
                                        </div>

                                        <div class="my-30 mx-auto flex flex-col " style="margin:10px; color: grey">
                                            <label for='prodBrand'>Product Brand</label>
                                            <input type="text" id="prodBrand" name="prod_brand" placeholder="Product Brand">
                                        </div>

                                        <div class="my-30 mx-auto flex flex-col " style="margin:10px; color: grey">
                                            <label for='prodType'>Product Type</label>
                                            <input type="text" id="prodType" name="prod_type" placeholder="Product Type">
                                        </div>


                                        <div class="my-30 mx-auto flex flex-col " style="margin:10px; color: grey">
                                            Product Image
                                            <label for='prodPic' class="prod-img-container">Upload

                                                <div id="image-preview" class="my-30 mx-auto" style="margin:10px;">
                                                    <img id="preview" src="#" alt="Image Preview" style="max-width: 100px; max-height: 100px; display: none;">
                                                </div>
                                            </label>
                                            <input type="file" id="prodPic" name="prod_pic" accept="image/*" onchange="previewImage(event)" style="padding:5px; margin:5px;">
                                        </div>

                                        <div class="my-30 mx-auto flex flex-col" style="margin:10px; color: grey">
                                            <label for='prodPrice'>Product Price</label>
                                            <input type="number" step="0.01" id="prodPrice" name="prod_price" placeholder="Product Price">
                                        </div>

                                        <div class="my-30 mx-auto flex flex-col" style="margin:10px; color: grey">

                                            <label for='prodStock'>Product Stock</label>
                                            <input type="number" id="prodStock" name="prod_stock" placeholder="Product Stock">
                                        </div>

                                        <input type="submit" value="Add" class="btn my-3">
                                    </form>
                                </main>
                            </div>
                        </div>
                    </div>


                </div>

                <footer class="py-16 text-center text-sm text-black dark:text-white/70">
                    Laravel v{{ Illuminate\Foundation\Application::VERSION }} (PHP v{{ PHP_VERSION }})
                </footer>


            </div>
        </div>

        <script>
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


</x-app-layout>
