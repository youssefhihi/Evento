<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="csrf-token" content="{{ csrf_token() }}">

        <title>{{ config('app.name', 'Laravel') }}</title>
        <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/tailwindcss@2.2.19/dist/tailwind.min.css">

        <!-- Fonts -->
        <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css" rel="stylesheet">
        <link rel="preconnect" href="https://fonts.bunny.net">
        <link href="https://fonts.bunny.net/css?family=figtree:400,500,600&display=swap" rel="stylesheet" />

        <!-- Scripts -->
   
    </head>
    <body >
    <div class="flex  overflow-y-hidden bg-white" x-data="setup()" x-init="$refs.loading.classList.add('hidden')">
      <!-- Loading screen -->
      <div
        x-ref="loading"
        class="fixed inset-0 z-50 flex items-center justify-center text-white bg-black bg-opacity-50"
        style="backdrop-filter: blur(14px); -webkit-backdrop-filter: blur(14px)"
      >
        Loading.....
      </div>

      <!-- Sidebar backdrop -->
      <div
        x-show.in.out.opacity="isSidebarOpen"
        class="fixed inset-0 z-10 bg-black bg-opacity-20 lg:hidden"
        style="backdrop-filter: blur(14px); -webkit-backdrop-filter: blur(14px)"
      ></div>
        @include('layouts.organizerSideBar')

       

      
         <!-- Main content -->
         <main class="flex flex-col gap-5 p-5 overflow-hidden overflow-y-scroll">
            {{ $slot }}
        </main>

        </div>

<!-- Setting panel button -->
<div>
  <button
    @click="isSettingsPanelOpen = true"
    class="fixed right-0 px-4 py-2 text-sm font-medium text-white uppercase transform rotate-90 translate-x-8 bg-gray-600 top-1/2 rounded-b-md"
  >
    Settings
  </button>
</div>

<!-- Settings panel -->
<div
  x-show="isSettingsPanelOpen"
  @click.away="isSettingsPanelOpen = false"
  x-transition:enter="transition transform duration-300"
  x-transition:enter-start="translate-x-full opacity-30  ease-in"
  x-transition:enter-end="translate-x-0 opacity-100 ease-out"
  x-transition:leave="transition transform duration-300"
  x-transition:leave-start="translate-x-0 opacity-100 ease-out"
  x-transition:leave-end="translate-x-full opacity-0 ease-in"
  class="fixed inset-y-0 right-0 flex flex-col bg-white shadow-lg bg-opacity-20 w-80"
  style="backdrop-filter: blur(14px); -webkit-backdrop-filter: blur(14px)"
>
  <div class="flex items-center justify-between flex-shrink-0 p-2">
    <h6 class="p-2 text-lg">Settings</h6>
    <button @click="isSettingsPanelOpen = false" class="p-2 rounded-md focus:outline-none focus:ring">
      <svg
        class="w-6 h-6 text-gray-600"
        xmlns="http://www.w3.org/2000/svg"
        fill="none"
        viewBox="0 0 24 24"
        stroke="currentColor"
      >
        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12" />
      </svg>
    </button>
  </div>
  <div class="flex-1 max-h-full p-4 overflow-hidden hover:overflow-y-scroll">
    <span>Settings Content</span>
    <!-- Settings Panel Content ... -->
  </div>
</div>
</div>



</body>
<script src="{{ asset('js/main.js') }}"></script>
<script src="https://cdn.jsdelivr.net/gh/alpinejs/alpine@v2.7.3/dist/alpine.min.js" defer></script>
    <script>
      const setup = () => {
        return {
          loading: true,
          isSidebarOpen: false,
          toggleSidbarMenu() {
            this.isSidebarOpen = !this.isSidebarOpen
          },
          isSettingsPanelOpen: false,
          isSearchBoxOpen: false,
        }
      }
    </script>
</html>
