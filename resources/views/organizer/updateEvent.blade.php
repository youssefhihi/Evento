<x-organizer-layout>  
   
        
 
    <form method="POST" action="{{ route('event.update', $event) }}">
        @csrf
        @method('PUT')
        <input type="hidden" value="{{Auth::user()->organizer->id}}" name="organizer_id">
        <!-- Title-->
        <div>
            <x-input-label for="title" :value="__('Title')" />
            <x-text-input id="title" class="block mt-1 w-full" type="text" name="title" value="{{$event->title}}" required autofocus autocomplete="title"/>
            <x-input-error :messages="$errors->get('title')" class="mt-2" />
        </div>

        <!--  local -->
        <div class="mt-4">
            <x-input-label for="local" :value="__('Local')" />
            <x-text-input id="local" class="block mt-1 w-full" type="text" name="local" value="{{$event->local}}" required autocomplete="local" />
            <x-input-error :messages="$errors->get('local')" class="mt-2" />
        </div>
        <!--  Date -->
        <div class="mt-4">
            <x-input-label for="date" :value="__('Date')" />
            <x-text-input id="date" class="block mt-1 w-full" type="date" name="date" value="{{$event->date}}" required autocomplete="date" />
            <x-input-error :messages="$errors->get('date')" class="mt-2" />
        </div>
         <!--  Number of places -->
        <div class="mt-4">
            <x-input-label for="placesNumber" :value="__('Numbre of places')" />
            <x-text-input id="placesNumber" class="block mt-1 w-full" type="number" name="placesNumber" value="{{$event->placesNumber}}" required autocomplete="placesNumber" />
            <x-input-error :messages="$errors->get('placesNumber')" class="mt-2" />
        </div>

        <!--  Description -->
        <div class="mt-4">
            <x-input-label for="description" :value="__('Description')" />
            <x-text-input id="description" class="block mt-1 w-full" type="text" name="description" value="{{$event->description}}" required autocomplete="description" />
            <x-input-error :messages="$errors->get('description')" class="mt-2" />
        </div>

        <div class="mt-4">
            <x-input-label for="category_id" :value="__('Category')" />
            <select name="category_id" id="category_id">
            @foreach ($categories as $category)
                @if ($category->name === $event->category->name)
                    <option value="{{ $category->id }}" selected>{{ $category->name }}</option>  
                @else
                    <option value="{{ $category->id }}">{{ $category->name }}</option>  
                @endif
            @endforeach
           
            </select>
            <x-input-error :messages="$errors->get('category_id')" class="mt-2" />
        </div>

                <!-- Type Booking -->
        <div class="mt-4 flex space-x-8 items-center">
            <x-input-label for="type_booking" :value="__('Type Booking')" class="text-sm font-semibold text-gray-700 dark:text-gray-300"/>

            <!-- Manual -->
            @if ($event->type_booking === 'manual')
            <label class="inline-flex space-x-3 items-center">             
                <span class="ml-2"><i class="fa fa-pencil-alt text-3xl text-blue-500"></i></span>
                <span class="text-sm font-medium text-gray-700 dark:text-gray-300">Manual</span>              
                <input type="radio" class="form-radio text-blue-500" value="manual" name="type_booking" checked >
            </label>

            <!-- Automatic -->
            <label class="inline-flex space-x-3 items-center">
                <span class="ml-2 text-3xl text-red-500"><i class="fas fa-sync-alt "></i></span>                    
                <span class="text-sm font-medium text-gray-700 dark:text-gray-300">Automatic</span>  
                <input type="radio" class="form-radio text-red-500" value="automatic" name="type_booking"  >
            </label>
        
            @else
            <label class="inline-flex space-x-3 items-center">             
                <span class="ml-2"><i class="fa fa-pencil-alt text-3xl text-blue-500"></i></span>
                <span class="text-sm font-medium text-gray-700 dark:text-gray-300">Manual</span>              
                <input type="radio" class="form-radio text-blue-500" value="manual" name="type_booking" >
            </label>

            <!-- Automatic -->
            <label class="inline-flex space-x-3 items-center">
                <span class="ml-2 text-3xl text-red-500"><i class="fas fa-sync-alt "></i></span>                    
                <span class="text-sm font-medium text-gray-700 dark:text-gray-300">Automatic</span>  
                <input type="radio" class="form-radio text-red-500" value="automatic" name="type_booking" checked >
            </label>
        
            @endif
           </div>
            <x-input-error :messages="$errors->get('type_booking')" class="text-sm text-red-500 ml-2" />

            <x-primary-button class="ms-4">
                {{ __('Post') }}
            </x-primary-button>
        </div>
    </form>


</x-organizer-layout>