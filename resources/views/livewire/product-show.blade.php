@section('pagetitle', $blance->name)
<div>
    <x-layouts.nav />

    <div class="bg-white">
        <div class="mx-auto py-8 px-4 sm:py-8 sm:px-6 lg:max-w-7xl lg:px-8">
            <!-- Product -->
            <form wire:submit.prevent="OrderSave">
                @csrf
                <div class="lg:grid lg:grid-rows-1 lg:grid-cols-7 lg:gap-x-8 lg:gap-y-10 xl:gap-x-16">
                    <!-- Product image -->
                    <div class="lg:row-end-1 lg:col-span-4">
                        <div class=" flex rounded-lg bg-white overflow-hidden justify-center">
                            <img src="{{ asset( 'storage/'.$blance->picture) }}" alt="Sample of 30 icons with friendly and fun details in outline, filled, and brand color styles." class="object-center object-cover">
                        </div>
                    </div>
                    <!-- Product details -->
                    <div class="max-w-2xl mx-auto mt-14 sm:mt-16 lg:max-w-none lg:mt-0 lg:row-end-2 lg:row-span-2 lg:col-span-3">
                        <div class="flex flex-col-reverse">
                            <div class="mt-4">
                                <h1 class="text-2xl font-extrabold tracking-tight text-gray-900 sm:text-3xl">{{$blance->name}}</h1>

                                <h2 id="information-heading" class="sr-only">Product information</h2>

                                <p class="text-sm text-gray-500 mt-2">

                                    <a href="#descrition" class="text-indigo-500 hover:text-indigo-600 active:text-indigo-700 text-sm font-semibold transition duration-100 ml-4">view all {{$reviews->total()}} reviews</a>
                                </p>
                            </div>
                            <div>
                                <h3 class="sr-only">Reviews</h3>

                                <p class="sr-only">4 out of 5 stars</p>
                            </div>
                        </div>
                        <!-- jianjie star -->

                        <!-- amount  star -->
                        <ul class="mt-6 grid grid-flow-col gap-1  ">
                            @foreach($blance->amount as $value)
                            <li>
                                <input wire:model='amount' type="radio" id="{{ $value->id}}" value="{{ $value->amount}}" class="hidden peer" required="">
                                <label for="{{ $value->id}}" class="inline-flex justify-between items-center p-4 w-full text-gray-500 bg-white rounded-lg border border-gray-200 cursor-pointer dark:hover:text-gray-300 dark:border-gray-700 dark:peer-checked:text-blue-500 peer-checked:border-blue-600 peer-checked:text-blue-600 hover:text-gray-600 hover:bg-gray-100 dark:text-gray-400 dark:bg-gray-800 dark:hover:bg-gray-700">
                                    <font style="vertical-align: inherit;">
                                        <font style="vertical-align: inherit;">
                                            @switch($blance->country)
                                            @case('USA')
                                            $ {{ $value->amount}}
                                            @break
                                            @case('UK')
                                            ￡ {{ $value->amount}}
                                            @break
                                            @case('EU')
                                            €{{ $value->amount}}
                                            @break
                                            @endswitch
                                        </font>
                                    </font>
                                </label>
                            </li>
                            @endforeach
                        </ul>
                        <!-- Price  star -->
                        @if($price)
                        <h2 class="text-sm mt-4 font-medium text-gray-900">Orederprice</h2>
                        <div class="mt-2">
                            <span wire:model='price' class="text-xl font-medium text-gray-900">


                                ${{$price}}


                            </span>
                        </div>
                        @endif
                        <!-- email star -->
                        <h2 class="text-sm mt-4 font-medium text-gray-900">Your email</h2>
                        @error('buyeremail')
                        <p class="mt-2 text-sm text-red-600 dark:text-red-500"><span class="font-medium">Oh, snapp!</span>{{ $message }}</p>
                        @enderror
                        <input type="email" wire:model='buyeremail' id="helper-text" aria-describedby="helper-text-explanation" class="  mt-2 bg-white border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5  dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" placeholder="Used for Order search">
                        <p id="helper-text-explanation" class="mt-2 text-sm text-gray-500 dark:text-gray-400">Please fill in the email address where you can receive emails.</p>
                        <!-- payway star -->
                        <div class="payway mt-4">
                            <h2 class="text-sm mt-6 font-medium text-gray-900">Payment method</h2>
                            <ul class="grid gap-6 w-full md:grid-cols-2 mt-2">

                                @foreach($payway as $pay)

                                <li>
                                    <input type="radio" wire:model='pay' id="{{$pay->pay_slug}}" value="{{$pay->id}}" class="hidden peer" required>
                                    <label for="{{$pay->pay_slug}}" class="inline-flex justify-between items-center p-5 w-full text-gray-500 bg-white rounded-lg border border-gray-200 cursor-pointer dark:hover:text-gray-300 dark:border-gray-700 dark:peer-checked:text-blue-500 peer-checked:border-blue-600 peer-checked:text-blue-600 hover:text-gray-600 hover:bg-gray-100 dark:text-gray-400 dark:bg-gray-800 dark:hover:bg-gray-700">
                                        <div class="block">
                                            <div class="w-full">{{$pay->pay_name}}</div>
                                        </div>
                                        <svg aria-hidden="true" class="ml-3 w-6 h-6" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg">
                                            <path fill-rule="evenodd" d="M12.293 5.293a1 1 0 011.414 0l4 4a1 1 0 010 1.414l-4 4a1 1 0 01-1.414-1.414L14.586 11H3a1 1 0 110-2h11.586l-2.293-2.293a1 1 0 010-1.414z" clip-rule="evenodd"></path>
                                        </svg>
                                    </label>
                                </li>
                                @endforeach
                            </ul>
                        </div>
                        <!-- paymemnt button star -->
                        <div class="mt-10 grid grid-cols-1 gap-x-6 gap-y-4 sm:grid-cols-2">

                            <button type="submit" class="w-full bg-indigo-600 border border-transparent rounded-md py-3 px-8 flex items-center justify-center text-base font-medium text-white hover:bg-indigo-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-offset-gray-50 focus:ring-indigo-500">Checkout</button>
                        </div>
            </form>
            <!--     telegram and whatsapp star -->
            <div class="border-t border-gray-200 mt-10 pt-10">
                <h3 class="text-sm font-medium text-gray-900">support</h3>
                <ul role="list" class="flex items-center space-x-6 mt-4">
                    <li>
                        <a href="https://t.me/Giftcard_s" class="flex items-center justify-center w-6 h-6 text-gray-400 hover:text-gray-500">
                            <span class="sr-only">Share on Facebook</span>
                            @svg('bi-telegram','w-5 h-5')
                        </a>
                    </li>
                    <li>
                        <a href="https://wa.me/31623518851" class="flex items-center justify-center w-6 h-6 text-gray-400 hover:text-gray-500">
                            @svg('ri-whatsapp-fill','w-5 h-5')
                        </a>
                    </li>

                </ul>
            </div>
            <!-- product tips star -->
            <div class="border-t border-gray-200 mt-10 pt-10">
                <h3 class="text-sm font-medium text-gray-900">Highlights</h3>
                <div class="mt-4 prose prose-sm text-gray-500">
                    <ul role="list">
                        <li>Online Email Delivery</li>

                        <li>Safe, Secure Purchase</li>

                        <li>No Expiration Date</li>
                    </ul>
                </div>
            </div>



        </div>

        <!-- product description star -->
        <div id="descrition" class="w-full  max-w-2xl mx-auto mt-16 lg:max-w-none lg:mt-0 lg:col-span-4">
            <div x-data="{tab: 'description'}">
                <div class="border-b border-gray-200">
                    <div class="-mb-px flex space-x-8">
                        <!-- Selected: "border-indigo-600 text-indigo-600", Not Selected: "border-transparent text-gray-700 hover:text-gray-800 hover:border-gray-300" -->
                        <button :class="{ 'text-blue-500 border-blue-500': tab === 'description' }" x-on:click.prevent="tab = 'description'" href="#" class="inline-block p-4 rounded-t-lg border-b-2 border-transparent hover:text-gray-600 hover:border-gray-300 dark:hover:text-gray-300">Description</button>

                        <button :class="{ 'text-blue-500 border-blue-500': tab === 'reviews' }" x-on:click.prevent="tab = 'reviews'" href="#" class="inline-block p-4 rounded-t-lg border-b-2 border-transparent hover:text-gray-600 hover:border-gray-300 dark:hover:text-gray-300">Reviews ({{$reviews->total()}})</button>

                        <button :class="{ 'text-blue-500 border-blue-500': tab === 'faq' }" x-on:click.prevent="tab = 'faq'" href="#" class="border-transparent 
                          text-gray-700 hover:text-gray-800 hover:border-gray-300 whitespace-nowrap py-6 border-b-2 font-medium text-sm">Faq</button>

                    </div>
                </div>

                <!-- Reviews  star -->
                <div x-show="tab === 'reviews'" id="reviews" class="-mb-10">
                    <h3 class="sr-only">Customer Reviews ({{$reviews->total()}})</h3>
                    @foreach ($reviews as $review)
                    <div class="flex text-sm text-gray-500 space-x-4">

                        <div class="py-10 pl-12  border-t border-gray-200">
                            <h3 class="font-medium text-gray-900">{{$review->name}}</h3>
                            <p><time datetime="2021-07-16">
                                    Published {{\Carbon\Carbon::parse($review->date)->locale('en')->diffForHumans()}}
                                </time></p>

                            <div class="flex items-center mt-4">
                                <div id="toast-simple" class="flex items-center p-4 space-x-4 w-full max-w-xs text-gray-500 bg-white rounded-lg divide-x divide-gray-200 shadow dark:text-gray-400 dark:divide-gray-700 space-x dark:bg-gray-800" role="alert">
                                    @svg('iconpark-success','w-5 h-5 text-blue-600 dark:text-blue-500')


                                    <div class="pl-4 text-sm font-normal">Verified Purchase.</div>
                                </div>


                            </div>


                            <div class="mt-4 prose prose-sm max-w-none text-gray-500">
                                <p>{{$review->content}}</p>
                            </div>
                        </div>
                    </div>
                    <div class="border-t border-gray-200"></div>

                    @endforeach
                    {{$reviews->links()}}
                    <!-- More reviews... -->
                </div>

                <!-- 'FAQ' panel, show/hide based on tab state -->
                <dl x-show="tab === 'faq'" id="faq" class="text-sm text-gray-500" aria-labelledby="tab-faq" role="tabpanel" tabindex="0">
                    <h3 class="sr-only">Frequently Asked Questions</h3>

                    <dt class="mt-10 font-medium text-gray-900">How does it work?</dt>
                    <dd class="mt-2 prose prose-sm max-w-none text-gray-500">
                        <p>When you purchase a digital gift card on GiftcardDiscount, you will receive the gift card code directly by email. After purchasing, you can also view all your previous purchases by mail..</p>
                    </dd>

                    <dt class="mt-10 font-medium text-gray-900">How fast will I get my gift card?</dt>
                    <dd class="mt-2 prose prose-sm max-w-none text-gray-500">
                        <p>Most orders will be approved and sent within a few minutes of your purchase..</p>
                    </dd>

                    <dt class="mt-10 font-medium text-gray-900">How do I pay?</dt>
                    <dd class="mt-2 prose prose-sm max-w-none text-gray-500">
                        <p>GiftcardDiscount only accept Bitcoin and Usdt for payment..</p>
                    </dd>

                    <!-- More FAQs... -->
                </dl>

                <!-- 'License' panel, show/hide based on tab state -->

                <div x-show="tab === 'description'" id="description" class="pt-10">
                    <h3 class="sr-only">License</h3>

                    <div class="prose prose-sm max-w-none text-gray-500">
                        {{$blance->detail}}
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
</div>
<x-layouts.footer />
</div>