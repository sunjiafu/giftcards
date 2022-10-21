@section('pagetitle',' All Discount Giftcard')
<div>
    <x-layouts.nav />
    <main class="max-w-2xl mx-auto px-4 lg:max-w-7xl lg:px-8">
        <div class="border-b border-gray-200 pt-8 pb-10">
            <h1 class="text-4xl font-extrabold tracking-tight text-gray-900">All Products</h1>

        </div>


      
        <div class="pt-12 pb-24 lg:grid lg:grid-cols-3 lg:gap-x-8 xl:grid-cols-4">
            <aside x-data="{ open: false }">

                <!-- Mobile filter dialog toggle, controls the 'mobileFilterDialogOpen' state. -->

                <button @click="open = true" type="button" class="inline-flex items-center lg:hidden">
                    <span class="text-sm font-medium text-gray-700">Filters</span>
                    <!-- Heroicon name: solid/plus-sm -->
                    <svg class="flex-shrink-0 ml-1 h-5 w-5 text-gray-400" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20" fill="currentColor" aria-hidden="true">
                        <path fill-rule="evenodd" d="M10 5a1 1 0 011 1v3h3a1 1 0 110 2h-3v3a1 1 0 11-2 0v-3H6a1 1 0 110-2h3V6a1 1 0 011-1z" clip-rule="evenodd" />
                    </svg>
                </button>




                <div x-show="open" @click.outside="open = false" class="lg:block">

                    <div class="pt-10">

                        <fieldset>


                            <legend class="block text-sm font-medium text-gray-900">Category</legend>
                            @foreach ($category as $cate)
                            <div class="pt-6 space-y-3">

                                <div class="flex items-center">


                                    <input wire:model="categoryId" value="{{$cate->id}}" type="radio" class="h-4 w-4 border-gray-300 rounded text-indigo-600 focus:ring-indigo-500">
                                    <label for="{{$cate->id}}" class="ml-3 text-sm text-gray-600">{{$cate->name}}</label>

                                </div>



                            </div>
                            @endforeach
                        </fieldset>
                    </div>

                </div>



                <div class="hidden lg:block">


                    <div class="pt-10">

                        <fieldset>


                            <legend class="block text-sm font-medium text-gray-900">Category</legend>
                            @foreach ($category as $cate)
                            <div class="pt-6 space-y-3">

                                <div class="flex items-center">


                                    <input wire:model="categoryId" value="{{$cate->id}}" type="radio" class="h-4 w-4 border-gray-300 rounded text-indigo-600 focus:ring-indigo-500">
                                    <label for="{{$cate->id}}" class="ml-3 text-sm text-gray-600">{{$cate->name}}</label>

                                </div>



                            </div>
                            @endforeach
                        </fieldset>
                    </div>


                </div>
            </aside>

            <section aria-labelledby="product-heading" class="mt-6 lg:mt-0 lg:col-span-2 xl:col-span-3">

                <h2 id="product-heading" class="sr-only">Products</h2>

                <div class="grid grid-cols-1 gap-y-4 sm:grid-cols-2 sm:gap-x-6 sm:gap-y-10 lg:gap-x-8 xl:grid-cols-3">
                    @foreach($product as $products)
                    <div class="group relative bg-white border border-gray-200 rounded-lg flex flex-col overflow-hidden">
                        <div class="aspect-w-3 aspect-h-4 bg-gray-200 group-hover:opacity-75 sm:aspect-none sm:h-48">
                            <img src="{{ asset('/storage/'.$products->picture) }}" alt=" {{$products->name}}" class="w-full h-full object-center object-cover sm:w-full sm:h-full">
                        </div>
                        <div class="flex-1 p-4 space-y-2 flex flex-col">
                            <h3 class="text-sm font-medium text-gray-900">
                                <a href="{{route('show',$products->url)}}">
                                    <span aria-hidden="true" class="absolute inset-0"></span>
                                    {{$products->name}}
                                </a>
                            </h3>

                            <div class="flex-1 flex flex-col justify-end">
                                <p class="text-sm italic text-gray-500">    {{$products->reviews->count()}} reviews</p>
                                <div class="py-4">
                                    <button type="button" class="text-white bg-gradient-to-r from-red-400 via-red-500 to-red-600 hover:bg-gradient-to-br focus:ring-4 focus:outline-none focus:ring-red-300 dark:focus:ring-red-800 font-medium rounded-lg text-sm px-5 py-2.5 text-center mr-2 mb-2">Shop Now</button>
                                </div>
                            </div>

                        </div>


                    </div>

                    @endforeach
            
                    <!-- More products... -->
                </div>
                {{ $product->links() }}
            </section>
      
        </div>

    </main>
</div>