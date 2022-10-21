@section('pagetitle', 'Verified Purchase Feedback')
<div>
    <x-layouts.nav />
    <div class="bg-white">
        <div class="mx-auto py-8 px-4 sm:py-8 sm:px-6 lg:max-w-7xl lg:px-8">
            <h2 class="text-lg font-medium text-gray-900">Recent reviews({{$reviews->total()}})</h2>

            <div class="mt-6 pb-10 border-t border-b border-gray-200 divide-y divide-gray-200 space-y-10">
                @foreach ($reviews as $review)
                <div class="pt-10 lg:grid lg:grid-cols-12 lg:gap-x-8">
                    <div class="lg:col-start-5 lg:col-span-8 xl:col-start-4 xl:col-span-9 xl:grid xl:grid-cols-3 xl:gap-x-8 xl:items-start">
                        <div class="flex items-center xl:col-span-1">
                            <div class="flex items-center">
                                <!--
                Heroicon name: solid/star

                Active: "text-yellow-400", Inactive: "text-gray-200"
              -->
                                <div id="toast-simple" class="flex items-center p-4 space-x-4 w-full max-w-xs text-gray-500 bg-white rounded-lg divide-x divide-gray-200 shadow dark:text-gray-400 dark:divide-gray-700 space-x dark:bg-gray-800" role="alert">
                                    @svg('iconpark-success','w-5 h-5 text-blue-600 dark:text-blue-500')


                                    <div class="pl-4 text-sm font-normal">Verified Purchase.</div>
                                </div>
                            </div>

                        </div>

                        <div class="mt-4 lg:mt-6 xl:mt-0 xl:col-span-2">


                            <div class="mt-3 space-y-6 text-sm text-gray-500">
                                <p>{{$review->content}}</p>

                                <a href="{{url('product',$product->where('id',$review->product_id)->first()->url)}}" class="text-blue-600">
                                    <p class="mt-4 block">From Product {{$product->where('id',$review->product_id)->first()->name}}</p>
                               </a>
                            </div>
                        </div>
                    </div>

                    <div class="mt-6 flex items-center text-sm lg:mt-0 lg:col-start-1 lg:col-span-4 lg:row-start-1 lg:flex-col lg:items-start xl:col-span-3">
                        <p class="font-medium text-gray-900">{{$review->user_name}}</p>
                        <time datetime="2021-01-06" class="ml-4 border-l border-gray-200 pl-4 text-gray-500 lg:ml-0 lg:mt-2 lg:border-0 lg:pl-0">
                            Published {{\Carbon\Carbon::parse($review->date)->locale('en')->diffForHumans()}}
                        </time>
                    </div>

                </div>
                @endforeach

                <!-- More reviews... -->
            </div>
            {{$reviews->links()}}
        </div>
    </div>
    <x-layouts.footer />
</div>