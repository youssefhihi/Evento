<x-client-layout>
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



 

<div id="reserve" class=" hidden min-w-screen h-screen animated fadeIn faster   fixed  left-0 top-0 flex justify-center items-center inset-0 z-50 outline-none focus:outline-none bg-no-repeat bg-center bg-cover" >
    <div class="w-full  max-w-lg p-5 relative mx-auto my-auto rounded-xl shadow-lg  bg-white ">
    <form action="{{ route('reservation.store',$event) }}" method="post">
    @csrf
    @method('POST')
    <input type="hidden" name="event_id" value="{{ $event->id }}">
    <input type="hidden" name="client_id" value="{{ Auth::user()->client->id }}">
    <div class=" ">
        <h1>{{ $event->title }}</h1>
    </div>
    <div>
        <x-input-label for="number_places" :value="__('How Many Tickets')" />
        <x-text-input id="number_places" class="block mt-1 w-full" type="number" name="number_places" :value="old('number_places')" required autofocus autocomplete="number_places" />
        <x-input-error :messages="$errors->get('number_places')" class="mt-2" />
    </div>
    <div class="p-3   mt-2   md:block">       
        <button type="submit" class="mb-2 md:mb-0 w-full   bg-red-500 border border-red-500 px-5 py-2 text-sm shadow-sm font-medium tracking-wider text-white rounded-full hover:shadow-lg hover:bg-red-600">
            Check Out
        </button>
    </div>
</form>

       
      </div>
    </div>
  </div>
</x-client-layout>


