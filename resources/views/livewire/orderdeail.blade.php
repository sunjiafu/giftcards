@section('pagetitle','Orderdeail')
<div>
    <x-layouts.nav />
    @if($order)
    <main class="max-w-7xl mx-auto py-16 px-4 sm:px-6 lg:pb-24 lg:px-8">
        <div class="max-w-xl">
            <h1 class="text-2xl font-extrabold tracking-tight text-gray-900 sm:text-3xl">Order history</h1>
            <p class="mt-1 text-sm text-gray-500">Check the status of recent orders.</p>
        </div>



        <section aria-labelledby="recent-heading" class="mt-6">

            <div class="space-y-20">
                <div>

                    <div class="bg-gray-50 rounded-lg py-6 px-4 sm:px-6 sm:flex sm:items-center sm:justify-between sm:space-x-6 lg:space-x-8">
                        <dl class="divide-y divide-gray-200 space-y-6 text-sm text-gray-600 flex-auto sm:divide-y-0 sm:space-y-0 sm:grid sm:grid-cols-3 sm:gap-x-6 lg:w-1/2 lg:flex-none lg:gap-x-8">
                            <div class="flex justify-between sm:block">
                                <dt class="font-medium text-gray-900">Date placed</dt>
                                <dd class="sm:mt-1">
                                    <time datetime="{{$order->created_at}}">{{$order->created_at}}</time>
                                </dd>
                            </div>
                            <div class="flex justify-between pt-6 sm:block sm:pt-0">
                                <dt class="font-medium text-gray-900">Order number</dt>
                                <dd class="sm:mt-1">{{$order->order_sn}}</dd>
                            </div>
                            <div class="flex justify-between pt-6 font-medium text-gray-900 sm:block sm:pt-0">
                                <dt>Status</dt>
                                <dd>
                                    @switch($order->status)
                                    @case(App\Models\Order::STATUS_COMPLETED)
                                    <span class="bg-green-100 text-green-800 text-sm font-medium mr-2 px-2.5 py-0.5 rounded dark:bg-green-200 dark:text-green-900">{{ __('order.fields.status_completed') }}</span>
                                    @break
                                    @case(App\Models\Order::STATUS_WAIT_PAY)
                                    <span class="bg-green-100 text-green-800 text-sm font-medium mr-2 px-2.5 py-0.5 rounded dark:bg-green-200 dark:text-green-900">{{ __('order.fields.status_wait_pay') }}</span>
                                    @break
                                    @case(App\Models\Order::STATUS_EXPIRED)
                                    <span class="bg-red-700 text-white text-sm font-medium mr-2 px-2.5 py-0.5 rounded dark:bg-green-200 dark:text-green-900">{{ __('order.fields.status_expired') }}</span>
                                    @break
                                    @endswitch
                                </dd>
                            </div>
                        </dl>

                        <div>
                            <label for="email" class="block text-sm pt-6 font-medium text-gray-700 sm:block sm:pt-0">Card Code</label>
                            <div x-data="{ input:'{{$order->code}}'}" class="mt-1 flex rounded-md  shadow-sm">
                                <div class="relative flex items-stretch flex-grow focus-within:z-10 sm:block sm:pt-0">

                                    <input type="email" x-model="input" name="email" id="email" value="{{$order->code}}" class="focus:ring-indigo-500 focus:border-indigo-500 block w-full rounded-none rounded-l-md pl-2 sm:text-sm border-gray-300" placeholder="Not code" readonly="readonly">
                                </div>
                                <button type="button" @click="$clipboard(input)" class="-ml-px relative inline-flex items-center space-x-2 px-4 py-2 border border-gray-300 text-sm font-medium rounded-r-md text-gray-700 bg-gray-50 hover:bg-gray-100 focus:outline-none focus:ring-1 focus:ring-indigo-500 focus:border-indigo-500">
                                    <!-- Heroicon name: solid/sort-ascending -->

                                    <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="h-5 w-5 text-gray-400">
                                        <path stroke-linecap="round" stroke-linejoin="round" d="M9 12h3.75M9 15h3.75M9 18h3.75m3 .75H18a2.25 2.25 0 002.25-2.25V6.108c0-1.135-.845-2.098-1.976-2.192a48.424 48.424 0 00-1.123-.08m-5.801 0c-.065.21-.1.433-.1.664 0 .414.336.75.75.75h4.5a.75.75 0 00.75-.75 2.25 2.25 0 00-.1-.664m-5.8 0A2.251 2.251 0 0113.5 2.25H15c1.012 0 1.867.668 2.15 1.586m-5.8 0c-.376.023-.75.05-1.124.08C9.095 4.01 8.25 4.973 8.25 6.108V8.25m0 0H4.875c-.621 0-1.125.504-1.125 1.125v11.25c0 .621.504 1.125 1.125 1.125h9.75c.621 0 1.125-.504 1.125-1.125V9.375c0-.621-.504-1.125-1.125-1.125H8.25zM6.75 12h.008v.008H6.75V12zm0 3h.008v.008H6.75V15zm0 3h.008v.008H6.75V18z" />
                                    </svg>


                                    <span>Copy</span>
                                </button>
                            </div>
                        </div>




                    </div>

                    <table class="mt-4 w-full text-gray-500 sm:mt-6">
                        <caption class="sr-only">
                            Products
                        </caption>
                        <thead class="sr-only text-sm text-gray-500 text-left sm:not-sr-only">
                            <tr>
                                <th scope="col" class="sm:w-2/5 lg:w-1/3 pr-8 py-3 font-normal">Product</th>
                                <th scope="col" class="hidden w-1/5 pr-8 py-3 font-normal sm:table-cell">Price</th>
                                <th scope="col" class="hidden pr-8 py-3 font-normal sm:table-cell">Payment Method</th>
                                <th scope="col" class="w-0 py-3 font-normal text-right">Email</th>
                            </tr>
                        </thead>
                        <tbody class="border-b border-gray-200 divide-y divide-gray-200 text-sm sm:border-t">
                            <tr>
                                <td class="py-6 pr-8">
                                    <div class="flex items-center">

                                        <div>
                                            <div class="font-medium text-gray-900">{{$order->title}}</div>
                                            <div class="mt-1 sm:hidden">${{$order->price}}</div>
                                            <div class="mt-1 sm:hidden">${{$order->buyeremail}}</div>

                                        </div>
                                    </div>
                                </td>
                                <td class="hidden py-6 pr-8 sm:table-cell">${{$order->price}}</td>
                                @switch($order->pay_id)
                                @case(1)
                                <td class="hidden py-6 pr-8 sm:table-cell">Bitcoin</td>
                                @break
                                @case(2)
                                <td class="hidden py-6 pr-8 sm:table-cell">USDT</td>
                                @break
                                @endswitch
                                <td class="py-6 font-medium text-right whitespace-nowrap">
                                    <span class="hidden lg:inline"> {{$order->buyeremail}}</span>
                                </td>
                            </tr>

                            <!-- More products... -->
                        </tbody>
                    </table>
                </div>

                <!-- More orders... -->
            </div>
        </section>
        @else
        <main class="flex-grow flex flex-col justify-center max-w-7xl w-full mx-auto px-4 sm:px-6 lg:px-8">
            <div class="flex-shrink-0 flex justify-center">

            </div>
            <div class="py-16">
                <div class="text-center">
                    <p class="text-sm font-semibold text-indigo-600 uppercase tracking-wide">Error</p>
                    <h1 class="mt-2 text-4xl font-extrabold text-gray-900 tracking-tight sm:text-5xl">The Order not found.</h1>
                    <p class="mt-2 text-base text-gray-500">Sorry, we couldn’t find the order you’re looking for.</p>
                    <div class="mt-6">
                        <a href="{{route('home')}}" class="text-base font-medium text-indigo-600 hover:text-indigo-500">Go back home<span aria-hidden="true"> &rarr;</span></a>
                    </div>
                </div>
            </div>
        </main>

        @endif
    </main>


</div>