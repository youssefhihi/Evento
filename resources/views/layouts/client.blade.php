<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="csrf-token" content="{{ csrf_token() }}">
<link rel="stylesheet" href="{{asset('css/style.css')}}">
        <title>{{ config('app.name', 'Laravel') }}</title>
        <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/tailwindcss@2.2.19/dist/tailwind.min.css">
        <link
            rel="stylesheet"
            href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.2/css/all.min.css"
            integrity="sha512-z3gLpd7yknf1YoNbCzqRKc4qyor8gaKU1qmn+CShxbuBusANI9QpRohGBreCFkKxLhei6S9CQXFEbbKuqLg0DA=="
            crossorigin="anonymous"
            referrerpolicy="no-referrer"
        />
       
        <!-- Fonts -->
        <link rel="preconnect" href="https://fonts.bunny.net">
        <link href="https://fonts.bunny.net/css?family=figtree:400,500,600&display=swap" rel="stylesheet" />
        <link href="https://fonts.googleapis.com/css2?family=Raleway:wght@300;400;500;600;700&display=swap"
        rel="stylesheet" />
        <!-- Scripts -->
       
        <script src="{{asset('js/main.js')}}"></script>
        <script src="https://cdn.tailwindcss.com"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/flowbite/2.3.0/flowbite.min.js"></script>
    </head>
    <body >
      
            @include('layouts.menu')

          

            <!-- Page Content -->
            <main>
                {{ $slot }}
            </main>
        
    </body>
    <script src="{{ asset('js/main.js') }}"></script>
    <script>  
    const btnHumb = document.querySelector("[data-toggle-navbar]")
      const navbar = document.querySelector("[data-navbar]")
      const overlay = document.querySelector("[data-nav-overlay]")
      if (btnHumb && navbar) {
          const toggleBtnAttr = () => {
              const isOpen = btnHumb.getAttribute("data-is-open")
              btnHumb.setAttribute("data-is-open", isOpen === "true" ? "false" : "true")
              if (isOpen === "false") {
                  overlay.classList.toggle("hidden")
              } else {
                  overlay.classList.add("hidden")
              }
          }
          btnHumb.addEventListener("click", () => {
              navbar.classList.toggle("invisible")
              navbar.classList.toggle("opacity-0")
              navbar.classList.toggle("translate-y-10")
              toggleBtnAttr()
          })
      
          overlay.addEventListener("click", () => {
              navbar.classList.add("invisible")
              navbar.classList.add("opacity-0")
              navbar.classList.add("translate-y-10")
              toggleBtnAttr()
          })
      }
      </script>
</html>
