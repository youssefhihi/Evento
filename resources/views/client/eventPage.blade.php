<x-client-layout>

@if(session('noPlace'))
    <p>{{ session('noPlace') }}</p>
@endif

@if(session('success'))
    <p>{{ session('success') }}</p>
@endif
    <section class="p-14 py-36 ">
    <div class="fixed top-1/2 right-28 border border-red-600 p-5 rounded-md">
    <div class="flex flex-col gap-4  max-w-sm ">
      
        <p class="text-center text-xl font-semibold">Take Your Place</p>
        <button onclick="openToReserve()" class="bg-red-200 w-40 h-10 rounded-md border-red-600 border-2 text-red-600 hover:text-white hover:shadow-[inset_13rem_0_0_0] hover:shadow-black duration-[400ms,700ms] transition-[color,box-shadow]">
            Get Ticket
        </button>
</div>
</div>

        <div class="flex flex-col max-w-4xl mx-auto bg-gray-100 p-8 rounded-xl">
            
              <p class="pl-10 text-gray-500 ">Published on: <span class="text-black font-semibold">{{ $event->created_at }}</span></p>
                <h1 class="text-4xl mt-5 font-bold text-gray-900 text-center">{{ $event->title }}</h1>
                <div class="flex flex-col mt-6">
                    <p class="mt-2 text-2xl  text-gray-700">Location</p>
                    <div class="flex space-x-2 mt-2">
                                <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 text-gray-400" fill="none"
                                    viewBox="0 0 24 24" stroke="currentColor">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                        d="M17.657 16.657L13.414 20.9a1.998 1.998 0 01-2.827 0l-4.244-4.243a8 8 0 1111.314 0z">
                                    </path>
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                        d="M15 11a3 3 0 11-6 0 3 3 0 016 0z"></path>
                                </svg>
                         <p >{{ $event->local }}</p>       
                    </div>
                    <div class="flex flex-col mt-6">
                    <p class="mt-2 text-2xl  text-gray-700">Date</p>
                    <div class="flex space-x-2 mt-2">
                    <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 mr-2 text-gray-400" fill="none"
                        viewBox="0 0 24 24" stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                            d="M12 8v4l3 3m6-3a9 9 0 11-18 0 9 9 0 0118 0z"></path>
                    </svg> 
                         <p >{{ $event->date }}</p>       
                    </div>
                    
                </div>
                <div class="flex flex-col mt-6">
                    <p class="mt-2 text-2xl  text-gray-700">About this Event</p>
                    <div class="flex space-x-10 mt-2">
                        <div class="flex space-x-2 rounded-md bg-gray-100 p-1 ">
                            <i class="fas fa-chair text-red-600 p-1 "></i>
                            <p class=" text-sm text-gray-500">number of places:{{ $event->placesNumber }}</p>
                        </div>
                        <div class="flex space-x-2 rounded-md bg-gray-100 p-1">
                            <i class="fas fa-ticket text-red-600 p-1 "></i>
                            <p class=" text-sm text-gray-500">Available Tickets {{ $event->placesNumber }}</p>
                        </div>
                    </div>
                    <p class="mt-3 pl-3 text-gray-500">{{ $event->description }}</p>  
                </div>
                <div class="flex flex-col mt-6">
                    <p class="mt-2 text-2xl  text-gray-700">About the Organizer</p>
                    <p class="mt-3 pl-3 text-gray-500"> organised by <span class="text-black font-semibold">{{ $event->organizer->user->name }}</span> </p> 
                    <p class="mt-1 pl-3 text-gray-500"> email: <span class="text-black font-semibold">{{ $event->organizer->user->email }}</span></p> 

                </div>
            </div>
        </div>
    </section>



 


    
    <div id="reserve" class="hidden min-w-screen h-screen animated fadeIn faster bg-black bg-opacity-70 fixed left-0 top-0 flex justify-center items-center inset-0 z-50 outline-none focus:outline-none bg-no-repeat bg-center bg-cover">
    <div class="bg-white shadow-md rounded-3xl p-4 lg:w-3/4 xl:w-1/2 relative mx-auto my-auto rounded-xl shadow-lg">
    <button class="absolute top-2 right-2 text-gray-600 hover:text-gray-800" onclick="closeReserve()">
            <svg class="h-6 w-6" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12"></path>
            </svg>
        </button>
    <div class="flex-none lg:flex">
                        <div class=" h-full w-full lg:h-48 lg:w-48   lg:mb-0 mb-3">
                            <img src="https://images.unsplash.com/photo-1622180203374-9524a54b734d?ixid=MnwxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8&amp;ixlib=rb-1.2.1&amp;auto=format&amp;fit=crop&amp;w=1950&amp;q=80"
                                alt="Just a flower" class=" w-full  object-scale-down lg:object-cover  lg:h-48 rounded-2xl">
                        </div>
                        <form action="{{ route('reservation.store',$event) }}" method="post" class="flex-auto ml-3 justify-evenly py-2">
                    
                            @csrf
                            @method('POST')
                            <input type="hidden" name="event_id" value="{{ $event->id }}">
                            <input type="hidden" name="client_id" value="{{ Auth::user()->client->id }}">
                            <div class="flex flex-wrap ">
                            
                                <h2 class="flex-auto text-lg font-medium">{{ $event->title }}</h2>
                            </div>
                            <p class="mt-3"></p>
                            <div class="flex py-4  text-sm text-gray-500">
                                <div class=" items-center w-full">
                                <x-input-label for="number_places" :value="__('How Many Tickets')" />
                                <x-text-input id="number_places" placeholder="enter number of ticktes you want" class="block mt-1 w-full" type="number" name="number_places" :value="old('number_places')" required autofocus autocomplete="number_places" />
                                <x-input-error :messages="$errors->get('number_places')" class="mt-2" />
                                </div>
                            </div>
                            <div class="flex p-4 pb-2 border-t border-gray-200 "></div>
                            <div class="flex space-x-3 text-sm font-medium">
                                <div class="flex-auto flex space-x-3">
                                    <button
                                        class="mb-2 md:mb-0 bg-white px-4 py-2 shadow-sm tracking-wider border text-gray-600 rounded-full hover:bg-gray-100 inline-flex items-center space-x-2 ">
                                        <span class=" rounded-lg">
                                                <i class="fas fa-ticket text-red-600 p-1 "></i>
                                        </span>
                                        <span>Available Tickets {{ $event->placesNumber }}</span>
                                    </button>
                                </div>
                                <button type="submit"
                                    class="mb-2 md:mb-0 bg-red-600 px-5 py-2 shadow-sm tracking-wider text-white rounded-full hover:bg-red-800"
                                    type="button" aria-label="like"> Check Out</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
  
</x-client-layout>


