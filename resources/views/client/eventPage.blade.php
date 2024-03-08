<x-client-layout>

    <section class="p-4 md:p-14 py-20 md:py-36 ">
    @if ($event->date > $currentDate)
        <div class="fixed top-1/2 right-4 md:right-28 border border-red-600 p-2 md:p-5 rounded-md">
            <div class="flex flex-col gap-2 md:gap-4 max-w-xs md:max-w-sm">
                <p class="text-center text-lg md:text-xl font-semibold">Take Your Place</p>
                <button onclick="openToReserve()" class="bg-red-200 w-full md:w-40 h-8 md:h-10 rounded-md border-red-600 border-2 text-red-600 hover:text-white hover:shadow-[inset_13rem_0_0_0] hover:shadow-black duration-[400ms,700ms] transition-[color,box-shadow]">
                    Get Ticket
                </button>
            </div>
        </div>
        @endif
       
        <div class="flex flex-col max-w-md md:max-w-4xl mx-auto bg-gray-100 p-4 md:p-8 rounded-xl">
            @if(session('noPlace'))
            <p class="w-full bg-red-400 text-center py-2 rounded-md text-white mb-2">{{ session('noPlace') }}</p>
            @endif
            @if ($currentDate >$event->date )
                <p class="w-full bg-red-400 text-center py-2 rounded-md text-white mb-2">This event has already passed</p>
                @endif
            @if(session('success'))
            <p class="w-full bg-green-400 text-center py-2 rounded-md text-white mb-2">{{ session('success') }}</p>
            @endif
            <p class="pl-2 md:pl-10 text-gray-500">Published on: <span class="text-black font-semibold">{{ $event->created_at }}</span></p>
            <h1 class="text-2xl md:text-4xl mt-2 md:mt-5 font-bold text-gray-900 text-center">{{ $event->title }}</h1>
            <div class="flex flex-col mt-4 md:mt-6">
                <p class="mt-2 text-lg md:text-2xl text-gray-700">Location</p>
                <div class="flex items-center mt-1">
                    <svg xmlns="http://www.w3.org/2000/svg" class="h-4 md:h-5 w-4 md:w-5 text-gray-400" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17.657 16.657L13.414 20.9a1.998 1.998 0 01-2.827 0l-4.244-4.243a8 8 0 1111.314 0z"></path>
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 11a3 3 0 11-6 0 3 3 0 016 0z"></path>
                    </svg>
                    <p class="ml-1">{{ $event->local }}</p>
                </div>
            </div>
            <div class="flex flex-col mt-4 md:mt-6">
                <p class="mt-2 text-lg md:text-2xl text-gray-700">Date</p>
                <div class="flex items-center mt-1">
                    <svg xmlns="http://www.w3.org/2000/svg" class="h-4 md:h-5 w-4 md:w-5 mr-1 md:mr-2 text-gray-400" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 14l9-5-9-5-9 5 9 5z"></path>
                    </svg>
                    <p>{{ $event->date }}</p>
                </div>
            </div>
            <div class="flex flex-col mt-4 md:mt-6">
                <p class="mt-2 text-lg md:text-2xl text-gray-700">About this Event</p>
                <div class="flex flex-wrap mt-1">
                    
                    <div class="flex items-center rounded-md bg-gray-100 p-1">
                        <i class="fas fa-ticket text-red-600 p-1 "></i>
                        <p class="text-sm text-gray-500">Available Tickets: {{ $event->placesNumber }}</p>
                    </div>
                </div>
                <p class="mt-3 pl-1 md:pl-3 text-gray-500">{{ $event->description }}</p>
            </div>
            <div class="flex flex-col mt-4 md:mt-6">
                <p class="mt-2 text-lg md:text-2xl text-gray-700">About the Organizer</p>
                <p class="mt-1 pl-1 md:pl-3 text-gray-500">Organised by <span class="text-black font-semibold">{{ $event->organizer->user->name }}</span></p>
                <p class="mt-1 pl-1 md:pl-3 text-gray-500">Email: <span class="text-black font-semibold">{{ $event->organizer->user->email }}</span></p>
            </div>
        </div>
    </section>

    <div id="reserve" class="hidden h-screen animated fadeIn faster bg-black bg-opacity-70 fixed left-0 top-0 flex justify-center items-center inset-0 z-50 outline-none focus:outline-none bg-no-repeat bg-center bg-cover">
        <div class="bg-white shadow-md rounded-3xl p-4 relative mx-auto my-auto rounded-xl shadow-lg">
            <button class="absolute top-2 right-2 text-gray-600 hover:text-gray-800" onclick="closeReserve()">
                <svg class="h-6 w-6" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12"></path>
                </svg>
            </button>
            
                        <h2 class=" text-lg font-medium text-center">{{ $event->title }}</h2>
                 
            <div class="flex-none lg:flex">
                <div class="h-full w-full lg:h-48 lg:w-48 lg:mb-0 mb-3">
                    <img src="{{asset('imgs/event.png')}}" alt="Just a flower" class="w-full object-scale-down lg:object-cover lg:h-48 rounded-2xl">
                </div>

                <form action="{{ route('reservation.store',$event) }}" method="post" class="flex-auto ml-3 justify-evenly py-2">
                    @csrf
                    @method('POST')
                    <input type="hidden" name="event_id" value="{{ $event->id }}">
                    <input type="hidden" name="client_id" value="{{ Auth::user()->client->id }}">
                    
                    <p class="mt-3"></p>
                    <div class="flex py-4  text-sm text-gray-500">
                        <div class=" items-center w-full">
                            <x-input-label for="number_places" :value="__('How Many Tickets')" />
                            <x-text-input id="number_places" placeholder="Enter number of tickets you want" class="block mt-1 w-full" type="number" name="number_places" :value="old('number_places')" required autofocus autocomplete="number_places" />
                            <x-input-error :messages="$errors->get('number_places')" class="mt-2" />
                        </div>
                    </div>
                    <div class="flex p-4 pb-2 border-t border-gray-200 "></div>
                    <div class="flex space-x-3 text-sm font-medium">
                        <div class="flex-auto flex space-x-3">
                            <button class="mb-2 md:mb-0 bg-white px-4 py-2 shadow-sm tracking-wider border text-gray-600 rounded-full hover:bg-gray-100 inline-flex items-center space-x-2 ">
                                <span class=" rounded-lg">
                                    <i class="fas fa-ticket text-red-600 p-1 "></i>
                                </span>
                                <span>Available Tickets {{ $event->placesNumber }}</span>
                            </button>
                        </div>
                        <button type="submit" class="mb-2 md:mb-0 bg-red-600 px-5 py-2 shadow-sm tracking-wider text-white rounded-full hover:bg-red-800" type="button" aria-label="like"> Check Out</button>
                    </div>
                </form>
            
            </div>
        </div>
    </div>

</x-client-layout>
