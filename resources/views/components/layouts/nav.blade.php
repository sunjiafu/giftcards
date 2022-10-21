<!-- This example requires Tailwind CSS v2.0+ -->

<div x-data="{ open: false }" class="relative bg-white">
  <div class="max-w-2xl mx-auto px-4 lg:max-w-7xl lg:px-8">
    <div class="flex justify-between items-center px-4 py-6 sm:px-6 md:justify-start md:space-x-10">
      <div class="flex justify-start lg:w-0 lg:flex-1">
        <a href="{{route('home')}}">

          <img class="h-8 w-auto sm:h-10" src="{{ asset('images/logo.png') }}" alt="Giftcard Discount Logo">
        </a>
      </div>
      <div class="-mr-2 -my-2 md:hidden">

     

        <button type="button" @click="open = true" class="bg-white rounded-md p-2 inline-flex items-center justify-center text-gray-400 hover:text-gray-500 hover:bg-gray-100 focus:outline-none focus:ring-2 focus:ring-inset focus:ring-indigo-500" aria-expanded="false">

          <!-- Heroicon name: outline/menu -->
          <svg class="h-6 w-6" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor" aria-hidden="true">
            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 6h16M4 12h16M4 18h16" />
          </svg>
        </button>


           
      </div>
      <nav class="hidden md:flex space-x-10">
        <div x-data="{dropdown:false}" class="relative">
          <!-- Item active: "text-gray-900", Item inactive: "text-gray-500" -->
          
          <!--
          'Solutions' flyout menu, show/hide based on flyout menu state.

          Entering: "transition ease-out duration-200"
            From: "opacity-0 translate-y-1"
            To: "opacity-100 translate-y-0"
          Leaving: "transition ease-in duration-150"
            From: "opacity-100 translate-y-0"
            To: "opacity-0 translate-y-1"
        -->
          <div x-show="dropdown" @click.outside="dropdown = false" class="absolute z-10 -ml-4 mt-3 transform w-screen max-w-md lg:max-w-2xl lg:ml-0 lg:left-1/2 lg:-translate-x-1/2">
            <div class="rounded-lg shadow-lg ring-1 ring-black ring-opacity-5 overflow-hidden">
           
       
            </div>
          </div>
        </div>
        <a href="{{route('product')}}" class="text-base font-medium text-gray-500 hover:text-gray-900"> All giftcard </a>
        <a href="{{route('reviews')}}" class="text-base font-medium text-gray-500 hover:text-gray-900"> Reviews </a>
        <a href="{{route('support')}}" class="text-base font-medium text-gray-500 hover:text-gray-900"> Support </a>


      </nav>
      <div class="hidden md:flex items-center justify-end md:flex-1 lg:w-0">



        <a href="{{route('ordersearch')}}" class="inline-flex whitespace-nowrap items-center justify-center px-4 py-2 border border-transparent rounded-md shadow-sm text-base font-medium  text-white bg-indigo-600 hover:bg-indigo-700">

          Order search
          <!-- Heroicon name: solid/external-link -->
          <svg class="-mr-1 ml-3 h-5 w-5" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20" fill="currentColor" aria-hidden="true">
            <path d="M11 3a1 1 0 100 2h2.586l-6.293 6.293a1 1 0 101.414 1.414L15 6.414V9a1 1 0 102 0V4a1 1 0 00-1-1h-5z" />
            <path d="M5 5a2 2 0 00-2 2v8a2 2 0 002 2h8a2 2 0 002-2v-3a1 1 0 10-2 0v3H5V7h3a1 1 0 000-2H5z" />
          </svg>
        </a>
      </div>
    </div>

    <!--
    Mobile menu, show/hide based on mobile menu state.

    Entering: "duration-200 ease-out"
      From: "opacity-0 scale-95"
      To: "opacity-100 scale-100"
    Leaving: "duration-100 ease-in"
      From: "opacity-100 scale-100"
      To: "opacity-0 scale-95"
  -->

    <div x-show="open" @click.outside="open=false" class="  relative 	top-0 inset-x-0 p-2 transition transform origin-top-right md:hidden">
      <div class="rounded-lg shadow-lg ring-1 ring-black ring-opacity-5 bg-white divide-y-2 divide-gray-50">
        <div class="pt-5 pb-6 px-5">
          <div class="flex items-center justify-between">
            <div>
              <img class="h-8 w-auto" src="{{ asset('images/logo.png') }}" alt="Workflow">
            </div>
            <div class="-mr-2">
              <button type="button" @click="open = false" class="bg-white rounded-md p-2 inline-flex items-center justify-center text-gray-400 hover:text-gray-500 hover:bg-gray-100 focus:outline-none focus:ring-2 focus:ring-inset focus:ring-indigo-500">
                <span class="sr-only">Close menu</span>
                <!-- Heroicon name: outline/x -->
                <svg class="h-6 w-6" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor" aria-hidden="true">
                  <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12" />
                </svg>
              </button>
            </div>
            
          </div>
          <div class="mt-6">
            <nav class="grid grid-cols-1 gap-7">
              <a href="{{route('product')}}" class="-m-3 p-3 flex items-center rounded-lg hover:bg-gray-50">
                <div class="flex-shrink-0 flex items-center justify-center h-10 w-10 rounded-md bg-indigo-500 text-white">
                  <!-- Heroicon name: outline/chart-bar -->


@svg('bi-gift-fill','h-6 w-6')

                
                </div>
                <div class="ml-4 text-base font-medium text-gray-900">All giftcard</div>
              </a>

              <a href="{{route('reviews')}}" class="-m-3 p-3 flex items-center rounded-lg hover:bg-gray-50">
                <div class="flex-shrink-0 flex items-center justify-center h-10 w-10 rounded-md bg-indigo-500 text-white">
                  <!-- Heroicon name: outline/cursor-click -->
                  @svg('ri-feedback-fill','h-6 w-6')
                </div>
                <div class="ml-4 text-base font-medium text-gray-900">Feedback</div>
              </a>

              <a href="{{route('support')}}" class="-m-3 p-3 flex items-center rounded-lg hover:bg-gray-50">
                <div class="flex-shrink-0 flex items-center justify-center h-10 w-10 rounded-md bg-indigo-500 text-white">
                  <!-- Heroicon name: outline/shield-check -->
              @svg('ri-customer-service-2-line','w-6 h-6')


                </div>
                <div class="ml-4 text-base font-medium text-gray-900">Support</div>
              </a>


            </nav>
          </div>
        </div>
        <div class="py-6 px-5">
         
          <div class="mt-6">
            <a href="{{route('ordersearch')}}" class="w-full flex items-center justify-center px-4 py-2 border border-transparent rounded-md shadow-sm text-base font-medium text-white bg-indigo-600 hover:bg-indigo-700"> Order Search </a>
            <p class="mt-6 text-center text-base font-medium text-gray-500">
            Not what you want?
              <a href="https://t.me/DiscountGiftcard_support" class="text-indigo-600 hover:text-indigo-500"> 24/7 telegram support</a>
            </p>
          </div>
        </div>
      </div>
    </div>
  </div>
</div>