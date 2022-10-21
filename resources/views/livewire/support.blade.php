
@section('pagetitle', 'Giftcatd Discount Support')
<div>
    <x-layouts.nav/>
    <div class="bg-gray-100">
        <div class="max-w-7xl mx-auto py-8 px-4 sm:py-8 sm:px-6 lg:px-8">
            <div class="relative bg-white shadow-xl">
                <h2 class="sr-only">Contact us</h2>

                <div class="grid grid-cols-1 lg:grid-cols-3">
                    <!-- Contact information -->
                    <div class="relative overflow-hidden py-10 px-6 bg-indigo-700 sm:px-10 xl:p-12">
                        <div class="absolute inset-0 pointer-events-none sm:hidden" aria-hidden="true">
                            <svg class="absolute inset-0 w-full h-full" width="343" height="388" viewBox="0 0 343 388" fill="none" preserveAspectRatio="xMidYMid slice" xmlns="http://www.w3.org/2000/svg">
                                <path d="M-99 461.107L608.107-246l707.103 707.107-707.103 707.103L-99 461.107z" fill="url(#linear1)" fill-opacity=".1" />
                                <defs>
                                    <linearGradient id="linear1" x1="254.553" y1="107.554" x2="961.66" y2="814.66" gradientUnits="userSpaceOnUse">
                                        <stop stop-color="#fff"></stop>
                                        <stop offset="1" stop-color="#fff" stop-opacity="0"></stop>
                                    </linearGradient>
                                </defs>
                            </svg>
                        </div>
                        <div class="hidden absolute top-0 right-0 bottom-0 w-1/2 pointer-events-none sm:block lg:hidden" aria-hidden="true">
                            <svg class="absolute inset-0 w-full h-full" width="359" height="339" viewBox="0 0 359 339" fill="none" preserveAspectRatio="xMidYMid slice" xmlns="http://www.w3.org/2000/svg">
                                <path d="M-161 382.107L546.107-325l707.103 707.107-707.103 707.103L-161 382.107z" fill="url(#linear2)" fill-opacity=".1" />
                                <defs>
                                    <linearGradient id="linear2" x1="192.553" y1="28.553" x2="899.66" y2="735.66" gradientUnits="userSpaceOnUse">
                                        <stop stop-color="#fff"></stop>
                                        <stop offset="1" stop-color="#fff" stop-opacity="0"></stop>
                                    </linearGradient>
                                </defs>
                            </svg>
                        </div>
                        <div class="hidden absolute top-0 right-0 bottom-0 w-1/2 pointer-events-none lg:block" aria-hidden="true">
                            <svg class="absolute inset-0 w-full h-full" width="160" height="678" viewBox="0 0 160 678" fill="none" preserveAspectRatio="xMidYMid slice" xmlns="http://www.w3.org/2000/svg">
                                <path d="M-161 679.107L546.107-28l707.103 707.107-707.103 707.103L-161 679.107z" fill="url(#linear3)" fill-opacity=".1" />
                                <defs>
                                    <linearGradient id="linear3" x1="192.553" y1="325.553" x2="899.66" y2="1032.66" gradientUnits="userSpaceOnUse">
                                        <stop stop-color="#fff"></stop>
                                        <stop offset="1" stop-color="#fff" stop-opacity="0"></stop>
                                    </linearGradient>
                                </defs>
                            </svg>
                        </div>
                        <h3 class="text-lg font-medium text-white">Before you ask...</h3>
                        <p class="mt-6 text-base text-indigo-50 max-w-3xl">Our customer service team provides 24/7 customer support, contact us on Telegram and Whatsapp.</p>
                        
                        <ul role="list" class="mt-8 flex space-x-12">
                            <li>
                                <a class="text-indigo-200 hover:text-indigo-100" href="https://t.me/Giftcard_s">
                                    <span class="sr-only">telegram</span>
                                    @svg('bi-telegram','w-6 h-6')
                                </a>
                            </li>
                            <li>
                                <a class="text-indigo-200 hover:text-indigo-100" href="https://wa.me/31623518851" >
                                    <span class="sr-only">whatsapp</span>
                                    @svg('ri-whatsapp-fill','w-6 h-6')
                                </a>
                            </li>
                            <li>
                              
                            </li>
                        </ul>
                    </div>

                    <!-- Contact form -->
                    <div class="py-10 px-6 sm:px-10 lg:col-span-2 xl:p-12">
                 
                        
                  

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
              <button type="button" class="text-left w-full flex justify-between items-start text-gray-400" :aria-expanded="activeAccordion" aria-controls="accordion-panel-3" @click="activeAccordion = !activeAccordion">
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

          <div class="pt-6" x-data="{activeAccordion : false}">
            <dt class="text-lg">
              <!-- Expand/collapse question button -->
              <button type="button" class="text-left w-full flex justify-between items-start text-gray-400" :aria-expanded="activeAccordion" aria-controls="accordion-panel-3" @click="activeAccordion = !activeAccordion">
                <span class="font-medium text-gray-900"> What is the expiration date of my gift card? </span>
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
            <dd class="mt-2 pr-12" id="accordion-panel-4" aria-labelledby="accordion-header-4" :hidden="! activeAccordion">
              <p class="text-base text-gray-500">You can keep ours for a long time,but the guarantee is 24-48 hours.</p>
            </dd>
          </div>
          <!-- More questions... -->
        </dl>
      </div>




                    </div>
                </div>
            </div>
        </div>
    </div>
    <x-layouts.footer/>
</div>