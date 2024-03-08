
<x-client-layout>
<section class="relative py-32 lg:py-36 bg-white">
    <div
        class="mx-auto lg:max-w-7xl w-full px-5 sm:px-10 md:px-12 lg:px-5 flex flex-col lg:flex-row gap-10 lg:gap-12">
        <div class="absolute w-full lg:w-1/2 inset-y-0 lg:right-0 hidden lg:block">
            <span
                class="absolute -left-6 md:left-4 top-24 lg:top-28 w-24 h-24 rotate-90 skew-x-12 rounded-3xl bg-red-400 blur-xl opacity-60 lg:opacity-95 lg:block hidden"></span>
            <span class="absolute right-4 bottom-12 w-24 h-24 rounded-3xl bg-red-600 blur-xl opacity-80"></span>
        </div>
        <span
            class="w-4/12 lg:w-2/12 aspect-square bg-gradient-to-tr from-red-600 to-gray-400 absolute -top-5 lg:left-0 rounded-full skew-y-12 blur-2xl opacity-40 skew-x-12 rotate-90"></span>
        <div class="relative flex flex-col items-center text-center lg:text-left lg:py-7 xl:py-8 
            lg:items-start lg:max-w-none max-w-3xl mx-auto lg:mx-0 lg:flex-1 lg:w-1/2">

            <h1 class="text-3xl leading-tight sm:text-4xl md:text-5xl xl:text-6xl
            font-bold text-gray-900">
                Find Exciting Events Near You!
            </h1>
            <p class="mt-8 text-gray-700">
                Explore a wide range of events happening in your area. From workshops to concerts, there's something for everyone.
            </p>
            <div class="mt-10  w-full flex max-w-md mx-auto lg:mx-0">
                <div class="flex sm:flex-row flex-col gap-5 w-full">
                    <form action="{{route('event.search')}}" method="get"
                        class="py-1 pl-6 w-full pr-1 flex gap-3 items-center text-gray-600 shadow-lg shadow-gray-200/20
                            border border-gray-200 bg-gray-100 rounded-full ease-linear focus-within:bg-white  focus-within:border-red-600">
                        @csrf
                            <span class="min-w-max pr-2 border-r border-gray-200">
                            <svg xmlns="http://www.w3.org/2000/svg" class="icon icon-tabler icon-tabler-calendar-event" width="24" height="24" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round">
                                <path stroke="none" d="M0 0h24v24H0z" fill="none"/>
                                <rect x="4" y="4" width="16" height="16" rx="2" />
                                <line x1="16" y1="2" x2="16" y2="6" />
                                <line x1="8" y1="2" x2="8" y2="6" />
                                <line x1="4" y1="10" x2="20" y2="10" />
                                <rect x="8" y="14" width="2" height="2" />
                                <rect x="14" y="14" width="2" height="2" />
                            </svg>

                        </span>
                        <input type="search" name="search" id="search" placeholder="search by title"
                            class="w-full py-3 outline-none bg-transparent">
                        <button type="submit" class="flex text-white justify-center items-center w-max min-w-max sm:w-max px-6 h-12 rounded-full outline-none relative overflow-hidden border duration-300 ease-linear
                                after:absolute after:inset-x-0 after:aspect-square after:scale-0 after:opacity-70 after:origin-center after:duration-300 after:ease-linear after:rounded-full after:top-0 after:left-0 after:bg-black    hover:after:opacity-100 hover:after:scale-[2.5] bg-red-600 border-transparent hover:border-red-600">
                            <span class="hidden sm:flex relative z-[5]">
                                Search
                            </span>
                            <span class="flex sm:hidden relative z-[5]">
                               
                                <svg xmlns="http://www.w3.org/2000/svg" class="icon icon-tabler icon-tabler-search" width="24" height="24" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round">
                                <path stroke="none" d="M0 0h24v24H0z" fill="none"/>
                                <circle cx="10" cy="10" r="7" />
                                <line x1="21" y1="21" x2="15" y2="15" />
                                </svg>

                            </span>
                        </button>
                    </form>
                </div>
            </div>
        </div>
        <div class="flex flex-1 lg:w-1/2 lg:h-auto relative lg:max-w-none lg:mx-0 mx-auto max-w-3xl">
            <div id="default-carousel" class="relative w-full" data-carousel="slide">
                <!-- Carousel wrapper -->
                <div class="relative h-56 overflow-hidden rounded-lg md:h-96">
                    <!-- Item 1 -->
                    <div class="hidden duration-700 ease-in-out" data-carousel-item>
                        <img src="{{asset('imgs/img1.jpg')}}" class="lg:absolute lg:w-full lg:h-full rounded-3xl object-cover lg:max-h-none max-h-96" alt="Hero image" width="2350" height="2359">
                    </div>
                    <!-- Item 2 -->
                    <div class="hidden duration-700 ease-in-out" data-carousel-item>
                        <img src="{{asset('imgs/img2.jpg')}}" class="lg:absolute lg:w-full lg:h-full rounded-3xl object-cover lg:max-h-none max-h-96" alt="Hero image" width="2350" height="2359">
                    </div>
                    <!-- Item 3 -->
                    <div class="hidden duration-700 ease-in-out" data-carousel-item>
                        <img src="{{asset('imgs/img3.jpg')}}" class="lg:absolute lg:w-full lg:h-full rounded-3xl object-cover lg:max-h-none max-h-96" alt="Hero image" width="2350" height="2359">
                    </div>
                    <!-- Item 4 -->
                    <div class="hidden duration-700 ease-in-out" data-carousel-item>
                        <img src="{{asset('imgs/img1.jpg')}}" class="lg:absolute lg:w-full lg:h-full rounded-3xl object-cover lg:max-h-none max-h-96" alt="Hero image" width="2350" height="2359">
                    </div>
                    <!-- Item 5 -->
                    <div class="hidden duration-700 ease-in-out" data-carousel-item>
                        <img src="{{asset('imgs/img4.jpg')}}" class="lg:absolute lg:w-full lg:h-full rounded-3xl object-cover lg:max-h-none max-h-96" alt="Hero image" width="2350" height="2359">
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
<section>
    <div>
         <h1 class="text-3xl leading-tight sm:text-xl md:text-2xl xl:text-3xl mb-3 pl-5
            font-bold text-gray-900"> Discover Categories <i class="fas fa-fire text-yellow-600"></i></h1>
         <div class ="border-b-2 border-black w-full mb-7"></div>
        <div class="flex flex-wrap gap-3 justify-center">
            @foreach ($categories as $category)
                <form method="get" action="{{ route('event.filter') }}" class="">
                    @csrf
                    <input type="hidden" name="filter" value="{{ $category->id }}">
                    <button type="submit" class="text-white before:ease rounded-md relative h-12 w-40 overflow-hidden border border-red-600 bg-red-600 shadow-2xl before:absolute before:left-0 before:-ml-2 before:h-48 before:w-48 before:origin-top-right before:-translate-x-full before:translate-y-12 before:-rotate-90 before:bg-white before:transition-all before:duration-500 hover:text-red-600 hover:shadow-black hover:before:-rotate-180">
                         <span class="relative z-10">{{ $category->name }}</span>
                    </button>
                   
                </form>            
            @endforeach
        </div>
        
    </div>
</section>
<section class=" p-10 flex flex-col gap-3">
<div class="flex flex-wrap items-center gap-10 justify-center">
    
   @foreach ($events as $event )
   <a href="{{route('eventPage.show', $event)}}" tabindex="0" class="focus:outline-none mx-2 w-72 xl:mb-0 mb-8 shadow-md hover:shadow-2xl ">
                        <div>
                            <img alt="person capturing an image" src="https://cdn.tuk.dev/assets/templates/classified/Bitmap (1).png" tabindex="0" class=" rounded-t-xl focus:outline-none w-full h-44" />
                        </div>
                        <div class="bg-white rounded-b-xl ">
                            <div class="flex items-center justify-between px-4 pt-4">
                                <div>
                                   
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

    {{ $events->links() }}

</section>


@if($eventSearch)
@foreach ( $eventSearch as $event)
<div id="eventSearch" class="fixed top-0 left-0 w-full h-full flex justify-center items-center bg-black bg-opacity-50 z-50">
    <div class="bg-white rounded-lg p-8 max-w-md">
      
        <div class="mb-6 flex justify-between">
            <h2 class="text-2xl font-bold mb-2">Event Details</h2>
            <button onclick="closePopup()" class="text-gray-600 hover:text-gray-800 focus:outline-none">
                <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12" />
                </svg>
            </button>
        </div>
        <div class="mb-6">
            <a href="{{ route('eventPage.show', $event) }}" class="block mb-2">
                <img src="https://cdn.tuk.dev/assets/templates/classified/Bitmap (1).png" alt="Event Image" class="w-full rounded-lg">
            </a>
            <div class="flex justify-between items-center mb-2">
                                <div ></div>

                <div class="bg-red-200 py-1.5 px-6 rounded-full">
                    <p class="text-xs text-red-700">{{ $event->category->name }}</p>
                </div>
            </div>
            <h2 class="text-xl font-semibold mb-2">{{ $event->title }}</h2>
            <p class="text-sm text-gray-600 mb-4">{{ substr($event->description, 0, 100) }}</p>
            <div class="flex items-center">
                <i class="fas fa-ticket-alt text-red-600 p-1"></i>
                <p class="text-sm text-gray-600 mr-4">Tickets Available: <span class="font-bold">{{ $event->placesNumber }}</span></p>
                <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 text-gray-400 mr-1" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17.657 16.657L13.414 20.9a1.998 1.998 0 01-2.827 0l-4.244-4.243a8 8 0 1111.314 0z"></path>
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 11a3 3 0 11-6 0 3 3 0 016 0z"></path>
                </svg>
                <p class="text-sm text-gray-600">{{ $event->local }}</p>
            </div>
        </div>
      
    </div>
</div>
@endforeach
@endif


</x-client-layout>
