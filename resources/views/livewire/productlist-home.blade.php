<section class="text-gray-600 body-font">
      <div class="cgrid max-w-screen-xl px-4 py-8 mx-auto lg:gap-8 xl:gap-0 lg:py-16 lg:grid-cols-12">
      <h2 class="text-center text-3xl font-extrabold text-gray-900 sm:text-4xl">
          Top Sellers
      </h2>
         <div class="flex flex-wrap -m-4">
           
             @foreach ($products as $product)
            <div class="lg:w-1/4 md:w-1/2 p-4 px-4 w-full">


               <div class="w-full max-w-sm bg-white rounded-lg shadow-md dark:bg-gray-800 dark:border-gray-700">
                  <a href="{{route('show',$product->url)}}">
                     <img class="p-8 rounded-t-lg" src="{{ asset('/storage/'.$product->picture) }}" alt="{{$product->name}}">  
                  </a>
                  <div class="px-5 pb-5">
                     <a href="{{route('show',$product->url)}}">
                        <h5 class="text-xl text-center font-semibold tracking-tight text-gray-900 dark:text-white">{{$product->name}}</h5>
                     </a>
                     <div class="flex  justify-center items-center mt-2.5 mb-5">
                       
                        <span class="bg-blue-100 text-blue-800 text-xs font-semibold mr-2 px-2.5 py-0.5 rounded dark:bg-blue-200 dark:text-blue-800 ml-3">{{$product->reviews->count()}} Reviews</span>
                     </div>
                     <div class="flex  justify-center items-center">
                      
                        <a href="{{route('show',$product->url)}}" class="text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm px-5 py-2.5 text-center dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800">Shop Now</a>
                     </div>
                  </div>
               </div>

            </div>
            @endforeach
           
          
            
         
         
         </div>
       <div class=" flex justify-center py-6">
       <a href="{{route('product')}}" class="inline-flex justify-center items-center p-5 text-base font-medium text-white bg-blue-500 rounded-lg hover:text-white hover:bg-blue-700 dark:text-white dark:bg-blue-700 dark:hover:bg-blue-700 dark:hover:text-white">
    <span class="w-full">All Giftcard</span>
    <svg aria-hidden="true" class="ml-3 w-6 h-6" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg"><path fill-rule="evenodd" d="M12.293 5.293a1 1 0 011.414 0l4 4a1 1 0 010 1.414l-4 4a1 1 0 01-1.414-1.414L14.586 11H3a1 1 0 110-2h11.586l-2.293-2.293a1 1 0 010-1.414z" clip-rule="evenodd"></path></svg>
</a> 
       </div>
      </div>
     
   </section>
