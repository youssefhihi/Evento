<x-guest-layout>
<div class="font-[sans-serif] text-[#333]">
      <div class="min-h-screen flex flex-col items-center justify-center">
        <div class="grid md:grid-cols-2 items-center gap-4 max-w-6xl w-full p-4 m-4 shadow-[0_2px_10px_-3px_rgba(6,81,237,0.3)] rounded-md">
        <div class="md:h-full  max-md:mt-10 bg-[#000842] rounded-xl lg:p-12 p-8">
            <img src="{{asset('imgs/signup.jpg')}}" class="w-full h-full object-contain" alt="login-image" />
          </div>
        <div class="md:max-w-md w-full sm:px-6 py-4">
            <div class="flex justify-center mb-6">
                <a href="/">
                    <x-application-logo class="w-20 h-20 fill-current text-gray-500" />
                </a>
            </div>
    <form method="POST" action="{{ route('register') }}">
        @csrf

        <!-- Name -->
        <div>
            <x-input-label for="name" :value="__('Name')" />
            <x-text-input id="name" class="block mt-1 w-full" type="text" name="name" :value="old('name')" required autofocus autocomplete="name" />
            <x-input-error :messages="$errors->get('name')" class="mt-2" />
        </div>

        <!-- Email Address -->
        <div class="mt-4">
            <x-input-label for="email" :value="__('Email')" />
            <x-text-input id="email" class="block mt-1 w-full" type="email" name="email" :value="old('email')" required autocomplete="username" />
            <x-input-error :messages="$errors->get('email')" class="mt-2" />
        </div>

                <!-- Role Selection -->
        <div class="mt-4 flex space-x-8 items-center">
            <x-input-label for="role" :value="__('Role')" class="text-sm font-semibold text-gray-700 dark:text-gray-300"/>

            <!-- Organizer Role -->
            <label class="inline-flex space-x-3 items-center">             
                <span class="ml-2"><i class="fa fa-user-tie text-3xl text-blue-500"></i></span>
                <span class="text-sm font-medium text-gray-700 dark:text-gray-300">Organizer</span>              
                <input type="radio" class="form-radio text-blue-500" value="organizer" name="role" >
            </label>

            <!-- Client Role -->
            <label class="inline-flex space-x-3 items-center">
                <span class="ml-2 text-3xl text-red-500"><i class="fas fa-user-injured "></i></span>                    
                <span class="text-sm font-medium text-gray-700 dark:text-gray-300">Event Explorer</span>  
                <input type="radio" class="form-radio text-red-500" value="client" name="role" checked >
            </label>
        </div>
            <x-input-error :messages="$errors->get('role')" class="text-sm text-red-500 ml-2" />



        <!-- Password -->
        <div class="mt-4">
            <x-input-label for="password" :value="__('Password')" />

            <x-text-input id="password" class="block mt-1 w-full"
                            type="password"
                            name="password"
                            required autocomplete="new-password" />

            <x-input-error :messages="$errors->get('password')" class="mt-2" />
        </div>

        <!-- Confirm Password -->
        <div class="mt-4">
            <x-input-label for="password_confirmation" :value="__('Confirm Password')" />

            <x-text-input id="password_confirmation" class="block mt-1 w-full"
                            type="password"
                            name="password_confirmation" required autocomplete="new-password" />

            <x-input-error :messages="$errors->get('password_confirmation')" class="mt-2" />
        </div>

        <div class="flex items-center justify-end mt-4">
            <a class="underline text-sm text-gray-600 dark:text-gray-400 hover:text-gray-900 dark:hover:text-gray-100 rounded-md focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500 dark:focus:ring-offset-gray-800" href="{{ route('login') }}">
                {{ __('Already registered?') }}
            </a>

            <x-primary-button class="ms-4">
                {{ __('Register') }}
            </x-primary-button>
        </div>
    </form>
    </div>
          
        </div>
      </div>
    </div>
</x-guest-layout>
