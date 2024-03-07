<x-organizer-layout>

<section >

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
                        
                        <div class="flex space-x-2 rounded-md bg-gray-100 p-1">
                            <i class="fas fa-ticket-alt text-red-600 p-1 "></i>
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



</x-organizer-layout>