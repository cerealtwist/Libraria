<!DOCTYPE html>
<html :class="{ 'theme-dark': dark }" x-data="data()" lang="en">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="csrf-token" content="{{ csrf_token() }}">

        <title>{{ config('app.name', 'Laravel') }}</title>

        <!--   Chart Link   -->
        <link
        rel="stylesheet"
        href="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.9.3/Chart.min.css"
        />
        
        <!-- Fonts -->
        <link
        href="https://fonts.googleapis.com/css2?family=Inter:wght@400;500;600;700;800&display=swap"
        rel="stylesheet"
        />
        
        <link rel="stylesheet" href="{{ asset('admin/css/tailwind.output.css')}}" />
        
        <!-- Scripts -->
        {{-- @vite(['resources/css/app.css', 'resources/js/app.js']) --}}

        @livewireStyles
    </head>
    <body class="font-sans antialiased">

        <div
        class="flex h-screen bg-gray-50 dark:bg-gray-900"
        :class="{ 'overflow-hidden': isSideMenuOpen }"
        >
            <aside
            class="z-20 hidden w-64 overflow-y-auto bg-white dark:bg-gray-800 md:block flex-shrink-0"
            >
                @include('layouts.inc.admin.sidebar')
            </aside>

            <div class="flex flex-col flex-1 w-full">
                @include('layouts.inc.admin.navbar')
                <main class="h-full overflow-y-auto">
                    <div class="container px-6 mx-auto grid">
                        @yield('content')
                    </div>
                </main>
            </div>
        </div>
        
        <script
        src="https://cdn.jsdelivr.net/gh/alpinejs/alpine@v2.x.x/dist/alpine.min.js"
        defer
        ></script>
        <script src="{{ asset('admin/js/init-alpine.js')}}"></script>
        <script
        src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.9.3/Chart.min.js"
        defer
        ></script>
        <script src="{{ asset('admin/js/charts-lines.js')}}" defer></script>
        <script src="{{ asset('admin/js/charts-pie.js')}}" defer></script>
        <script>
            function deleteAlert() {
              alert("Are you sure want to delete this?");
            }
            </script>
        @livewireScripts
        @stack('script')
    </body>
</html>