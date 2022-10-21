@section('pagetitle','Buy Discount Gfitcard Online')

<div>
  <div>
    <x-layouts.nav />
  </div>
  <main>
    <div>
      <!-- Hero card -->
      <div class="relative">
        <div class="absolute inset-x-0 bottom-0 h-1/2 bg-gray-100"></div>
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
          <div class="relative shadow-xl sm:rounded-2xl sm:overflow-hidden">
            <div class="absolute inset-0">
              <img class="h-full w-full object-cover" src="{{ asset('images/giftcatd-banner.webp') }}" alt="People working on laptops">
              <div class="absolute inset-0 bg-indigo-700 mix-blend-multiply"></div>
            </div>
            <div class="relative px-4 py-16 sm:px-6 sm:py-24 lg:py-32 lg:px-8">
              <h1 class="text-center text-4xl font-extrabold tracking-tight sm:text-5xl lg:text-6xl">
                <span class="block text-white">Buy Giftcards Online </span>
                <span class="block text-indigo-200">best offer</span>
              </h1>
              <p class="mt-6 max-w-lg mx-auto text-center text-xl text-indigo-200 sm:max-w-3xl">Fast e-mail sms delivery 24/7 active support.</p>
              <div class="mt-10 max-w-sm  mx-auto sm:max-w-none sm:flex sm:justify-center">

                <div class=" w-auto md:w-2/4 ">
                  <livewire:search />
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>

    <!-- Logo cloud -->

    <!-- More main page content here... -->
  </main>


  <!-- 
产品列表start -->

  <livewire:productlist-home />





  <div class="bg-gray-50">
    <div class="max-w-7xl mx-auto py-12 px-4 sm:py-16 sm:px-6 lg:px-8 ">
      <div class="max-w-3xl mx-auto divide-y-2 divide-gray-200">
        <h2 class="text-center text-3xl font-extrabold text-gray-900 sm:text-4xl">Buy Giftcard FAQ</h2>
        <dl class="mt-6 space-y-6 divide-y divide-gray-200">
          <div class="pt-6" x-data="{activeAccordion : true}">
            <dt class="text-lg">
              <!-- Expand/collapse question button -->
              <button type="button" class="text-left w-full flex justify-between items-start text-gray-400" :aria-expanded="activeAccordion" aria-controls="accordion-panel-1" @click="activeAccordion = !activeAccordion">
                <span class="font-medium text-gray-900"> How does it work? </span>
                <span class="ml-6 h-7 flex items-center" :class="{ '-rotate-180': activeAccordion }" aria-hidden="true">
                  <!--
                  Expand/collapse icon, toggle classes based on question open state.

                  Heroicon name: outline/chevron-down

                  Open: "-rotate-180", Closed: "rotate-0"
                -->
                  <svg class="rotate-0 h-6 w-6 transform" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor" aria-hidden="true">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7" />
                  </svg>
                </span>
              </button>
            </dt>
            <dd class="mt-2 pr-12" id="accordion-panel-1" aria-labelledby="accordion-header-1" :hidden="! activeAccordion">
              <p class="text-base text-gray-500">When you purchase a digital gift card on GiftcardDiscount, you will receive the gift card code directly by email. After purchasing, you can also view all your previous purchases by mail.</p>
            </dd>
          </div>


          <div class="pt-6" x-data="{activeAccordion : false}">
            <dt class="text-lg">
              <!-- Expand/collapse question button -->
              <button type="button" class="text-left w-full flex justify-between items-start text-gray-400" :aria-expanded="activeAccordion" aria-controls="accordion-panel-2" @click="activeAccordion = !activeAccordion">
                <span class="font-medium text-gray-900"> How fast will I get my gift card? </span>
                <span class="ml-6 h-7 flex items-center" :class="{ '-rotate-180': activeAccordion }" aria-hidden="true">
                  <!--
                  Expand/collapse icon, toggle classes based on question open state.

                  Heroicon name: outline/chevron-down

                  Open: "-rotate-180", Closed: "rotate-0"
                -->
                  <svg class="rotate-0 h-6 w-6 transform" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor" aria-hidden="true">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7" />
                  </svg>
                </span>
              </button>
            </dt>
            <dd class="mt-2 pr-12" id="accordion-panel-2" aria-labelledby="accordion-header-2" :hidden="! activeAccordion">
              <p class="text-base text-gray-500">Most orders will be approved and sent within a few minutes of your purchase.</p>
            </dd>
          </div>

          <div class="pt-6" x-data="{activeAccordion : false}">
            <dt class="text-lg">
              <!-- Expand/collapse question button -->
              <button type="button" class="text-left w-full flex justify-between items-start text-gray-400"
               :aria-expanded="activeAccordion" aria-controls="accordion-panel-3" @click="activeAccordion = !activeAccordion">
                <span class="font-medium text-gray-900"> How do I pay? </span>
                <span class="ml-6 h-7 flex items-center" :class="{ '-rotate-180': activeAccordion }" aria-hidden="true">
                  <!--
                  Expand/collapse icon, toggle classes based on question open state.

                  Heroicon name: outline/chevron-down

                  Open: "-rotate-180", Closed: "rotate-0"
                -->
                  <svg class="rotate-0 h-6 w-6 transform" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor" aria-hidden="true">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7" />
                  </svg>
                </span>
              </button>
            </dt>
            <dd class="mt-2 pr-12" id="accordion-panel-3" aria-labelledby="accordion-header-3" :hidden="! activeAccordion">
              <p class="text-base text-gray-500">GiftcardDiscount only accept Bitcoin and Usdt for payment</p>
            </dd>
          </div>
          <!-- More questions... -->
        </dl>
      </div>
    </div>
  </div>


</div>
</div>
<x-layouts.footer />
</div>