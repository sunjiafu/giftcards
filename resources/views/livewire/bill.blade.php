@section('pagetitle','Buy Discount Gfitcard Online')

<div>
    <x-layouts.nav />

    <div>
        @if (session()->has('message'))
            <div class="alert alert-success">
                {{ session('message') }}
            </div>
        @endif
    </div>
    <div class="lg:w-4/5 mx-auto flex justify-center flex-wrap">
        <div class="py-16 px-4 md:px-6 2xl:px-0 flex justify-center items-center 2xl:mx-auto 2xl:container">
            <div class="flex flex-col justify-start items-start w-full space-y-9">
                <div class="flex justify-start flex-col items-start space-y-2">
                    <p class="text-3xl lg:text-4xl font-semibold leading-7 lg:leading-9 text-gray-800 dark:text-gray-50">Checkout</p>
                    <p>#{{$order->order_sn}}</p>
                </div>


                <div class="p-8 bg-gray-100 dark:bg-gray-800 flex flex-col lg:w-full ">



                    <div class="flex flex-row justify-center items-center mt-6">

                    <div class="p-4 mb-4 text-sm text-blue-700 bg-blue-100 rounded-lg dark:bg-blue-200 dark:text-blue-800" role="alert">
  <span class="font-medium">Warning !!</span> Orders that are not paid within 30 minutes will be voided.
</div>

                    </div>

                    <div class="mt-4">

                        <dl class="max-w-full text-gray-900 divide-y divide-gray-200 dark:text-white dark:divide-gray-700">
                        <div class="flex flex-col  pb-3">
         
                                <dt class="mb-1 text-gray-500 md:text-lg dark:text-gray-400">Orderid</dt>
                                <dd class="text-lg font-semibold">{{$order->order_sn}}</dd>
                            </div>
                            <div class="flex flex-col pb-3">
                                <dt class="mb-1 text-gray-500 md:text-lg dark:text-gray-400">Product</dt>
                                <dd class="text-lg font-semibold">{{$order->title}}</dd>
                            </div>
                            <div class="flex flex-col py-3">
                                <dt class="mb-1 text-gray-500 md:text-lg dark:text-gray-400">Price</dt>
                                <dd class="text-lg font-semibold">${{$order->price}}</dd>
                            </div>
                            <div class="flex flex-col py-3">
                                <dt class="mb-1 text-gray-500 md:text-lg dark:text-gray-400">Email</dt>
                                <dd class="text-lg font-semibold">{{$order->buyeremail}}</dd>
                            </div>
                            <div class="flex flex-col py-3">
                                <dt class="mb-1 text-gray-500 md:text-lg dark:text-gray-400">Payment Method</dt>
                                @if($order->pay_id == 1)
                                <dd class="text-lg font-semibold">Bitcoin</dd>
                                @else($order->pay_id == 2)
                                <dd class="text-lg font-semibold">USDT</dd>
                                @endif
                            </div>
                        </dl>

                    </div>

                   
                 @if($order->status ==1)
                    <button wire:click = 'checkout' class="mt-8 border border-transparent hover:border-gray-300 dark:bg-white dark:hover:bg-gray-900 dark:text-gray-900 dark:hover:text-white dark:border-transparent bg-gray-900 hover:bg-white text-white hover:text-gray-900 flex justify-center items-center py-4 rounded w-full">
                        <div>
                            <p class="text-base leading-4">Pay Now</p>
                        </div>
                    </button>
                    @endif
                    <div wire:loading wire:target="checkout">
        Processing Payment...
    </div>
                    @if($order->status ==-1)
                    <div id="alert-additional-content-1" class="p-4 mb-4 border border-blue-300 rounded-lg bg-blue-50 dark:bg-blue-300" role="alert">
  <div class="flex items-center">
    <svg aria-hidden="true" class="w-5 h-5 mr-2 text-blue-900" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg"><path fill-rule="evenodd" d="M18 10a8 8 0 11-16 0 8 8 0 0116 0zm-7-4a1 1 0 11-2 0 1 1 0 012 0zM9 9a1 1 0 000 2v3a1 1 0 001 1h1a1 1 0 100-2v-3a1 1 0 00-1-1H9z" clip-rule="evenodd"></path></svg>
    <span class="sr-only">Info</span>
    <h3 class="text-lg font-medium text-blue-900">This is a info alert</h3>
  </div>
  <div class="mt-2 mb-4 text-sm text-blue-900">
  The order has expired, please place a new order
  </div>
  <div class="flex">
    <button wire:click = 'buyagain' type="button" class="text-white bg-blue-900 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-200 font-medium rounded-lg text-xs px-3 py-1.5 mr-2 text-center inline-flex items-center dark:bg-blue-800 dark:hover:bg-blue-900">
      <svg aria-hidden="true" class="-ml-0.5 mr-2 h-4 w-4" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg"><path d="M10 12a2 2 0 100-4 2 2 0 000 4z"></path><path fill-rule="evenodd" d="M.458 10C1.732 5.943 5.522 3 10 3s8.268 2.943 9.542 7c-1.274 4.057-5.064 7-9.542 7S1.732 14.057.458 10zM14 10a4 4 0 11-8 0 4 4 0 018 0z" clip-rule="evenodd"></path></svg>
      purchase again
    </button>
  
  </div>
</div>
                    @endif
                </div>
            </div>
        </div>
    </div>
</div>


</div>

</div>