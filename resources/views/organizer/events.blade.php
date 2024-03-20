<x-organizer-layout>
@if(session('success'))
    <script>
        setTimeout(function() {
            alert('{{ session('success') }}');
        }, 100);
    </script>
@endif
<nav class = "flex justify-between px-5 py-3 text-gray-700  rounded-lg bg-gray-50 dark:bg-[#1E293B] " aria-label="Breadcrumb">
            <ol class = "inline-flex items-center space-x-1 md:space-x-3">
                <li class = "inline-flex items-center">
                    <a href="{{route('event.index')}}" class = "inline-flex items-center text-sm font-medium text-gray-700 hover:text-gray-900 dark:text-gray-400 dark:hover:text-white">                    
                        Your Events
                    </a>
                </li>
                <li>
                    <div class = "flex items-center">
                        <svg class = "w-6 h-6 text-gray-400" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg"><path fillRule="evenodd" d="M7.293 14.707a1 1 0 010-1.414L10.586 10 7.293 6.707a1 1 0 011.414-1.414l4 4a1 1 0 010 1.414l-4 4a1 1 0 01-1.414 0z" clipRule="evenodd"></path></svg>
                        <a href="{{route('eventNotApproved')}}" class = "ml-1 text-sm font-medium text-gray-700 hover:text-gray-900 md:ml-2 dark:text-gray-400 dark:hover:text-white">
                        Event not approved yet
                        </a>
                    </div>
                </li>
            </ol>
            <a href="{{route('event.create')}}" class=" bg-black text-white px-3 py-1 rounded-md">create event</a>
        </nav>
    
    <div class="flex flex-wrap gap-5 items-center lg:justify-between justify-center">
   @foreach ($events as $event )

               
                    <div  tabindex="0" class="focus:outline-none mx-2 w-72 xl:mb-0 mb-8 shadow-md hover:shadow-2xl ">
                        <a href="{{route('eventPage', $event)}}">
                            <img alt="event" src="{{asset('imgs/event.png')}}" tabindex="0" class=" rounded-t-xl focus:outline-none w-full h-44" />
                        </a>
                        <div class="bg-white rounded-b-xl ">
                            <div class="flex items-center justify-between px-4 pt-4">
                           
                      <div>
                                <a href="{{route('event.edit',$event)}}" class="block px-4 py-2 text-sm text-gray-700 hover:bg-gray-100 dark:hover:bg-gray-600 dark:text-gray-200 dark:hover:text-white"><i class="fas fa-edit"></i>
                                    Edit</a>
                          
                                <form action="{{route('event.destroy', $event)}}" method="post">
                                    @csrf
                                    @method('DELETE')
                                <button type="submit" class="block px-4 py-2 text-sm text-gray-700 hover:bg-gray-100 dark:hover:bg-gray-600 dark:text-gray-200 dark:hover:text-white"><i class="fas fa-trash"></i> delete</p>
                                </form>                       
                      </div>
                        
                                <div class="bg-red-200 py-1.5 px-6 rounded-full">
                                    
                                    <p tabindex="0" class="focus:outline-none text-xs text-red-700">{{$event->category()->first()->name}}</p>
                                </div>
                            </div>
                            <div class="p-4">
                                <div class="flex items-center">
                                    <h2 tabindex="0" class="focus:outline-none text-lg font-semibold">{{$event->title}}</h2>
                                   
                                </div>
                                <p tabindex="0" class="focus:outline-none text-xs text-gray-600 mt-2">{{substr($event->description, 0, 30)}} </p>
                                <div class="flex mt-4">
                                    
                                    <div class="pl-2">
                                        <p tabindex="0" class="focus:outline-none rounded-md text-xs text-gray-600 px-2 bg-gray-200 py-1"><i class="fas fa-ticket-alt text-red-600 p-1 "></i> Tickects Avialible: <span class=" text-black font-bold">{{$event->placesNumber}}</span></p>
                                    </div>
                                </div>
                                <div class="flex items-center space-x-3 py-4">
                                <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 text-gray-400" fill="none"
                                        viewBox="0 0 24 24" stroke="currentColor">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                            d="M17.657 16.657L13.414 20.9a1.998 1.998 0 01-2.827 0l-4.244-4.243a8 8 0 1111.314 0z">
                                        </path>
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                            d="M15 11a3 3 0 11-6 0 3 3 0 016 0z"></path>
                                        </svg> 
                                    <h2 tabindex="0" class="focus:outline-none text-indigo-700 text-xs font-semibold">{{$event->local}}</h2>
                                </div>
                            </div>
                        </div>
                    </div>
    
    @endforeach  
</div>



</x-organizer-layout>   
<