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
            <a href="{{route('event.create')}}"class=" bg-black text-white px-3 py-1 rounded-md">create event</a>
        </nav>
    
<div class="flex flex-wrap gap-3">
     
   @foreach ($events as $event ) <!-- <a href="{{route('event.edit', $event->id)}}">update</a> -->
  
   <a href="{{route('eventPage', $event)}}" tabindex="0" class="focus:outline-none mx-2 w-72 xl:mb-0 mb-8 shadow-md hover:shadow-2xl ">
                        <div>
                            <img alt="person capturing an image" src="https://cdn.tuk.dev/assets/templates/classified/Bitmap (1).png" tabindex="0" class=" rounded-t-xl focus:outline-none w-full h-44" />
                        </div>
                        <div class="bg-white rounded-b-xl ">
                            <div class="flex items-center justify-between px-4 pt-4">
                            <div>
                      <button id="dropdownButton" data-dropdown-toggle="dropdown" class="inline-block text-gray-500 dark:text-gray-400 hover:bg-gray-100 dark:hover:bg-gray-700 focus:ring-4 focus:outline-none focus:ring-gray-200 dark:focus:ring-gray-700 rounded-lg text-sm p-1.5" type="button">
                            <span class="sr-only">Open dropdown</span>
                            <svg class="w-5 h-5" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="currentColor" viewBox="0 0 16 3">
                                <path d="M2 0a1.5 1.5 0 1 1 0 3 1.5 1.5 0 0 1 0-3Zm6.041 0a1.5 1.5 0 1 1 0 3 1.5 1.5 0 0 1 0-3ZM14 0a1.5 1.5 0 1 1 0 3 1.5 1.5 0 0 1 0-3Z"/>
                            </svg>
                    </button>
                        <!-- Dropdown menu -->
                        <div id="dropdown" class="z-10 hidden text-base list-none bg-white divide-y divide-gray-100 rounded-lg shadow w-44 dark:bg-gray-700">
                            <ul class="py-2" aria-labelledby="dropdownButton">
                            <li>
                                <a href="{{route('event.edit',$event)}}" class="block px-4 py-2 text-sm text-gray-700 hover:bg-gray-100 dark:hover:bg-gray-600 dark:text-gray-200 dark:hover:text-white">Edit</a>
                            </li>
                            <li>
                                <form action="{{route('event.destroy', $event)}}" method="post">
                                    @csrf
                                    @method('DELETE')
                                <button type="submit" class="block px-4 py-2 text-sm text-gray-700 hover:bg-gray-100 dark:hover:bg-gray-600 dark:text-gray-200 dark:hover:text-white">delete</p>
                                </form>
                                
                            </li>
                            </ul>
                      </div>
                      </div>
                                <div class="bg-red-200 py-1.5 px-6 rounded-full">
                                    <p tabindex="0" class="focus:outline-none text-xs text-red-700">{{$event->category->name}}</p>
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
                    </a>
    @endforeach  
</div>
  

       
      
</div></x-organizer-layout> 