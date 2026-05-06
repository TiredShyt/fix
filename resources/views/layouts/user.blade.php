<!DOCTYPE html>
<html>
<head>
    <title>HANDA</title>
    @vite('resources/css/app.css')
</head>
<body class="bg-gray-100">

    {{-- HEADER --}}
    <header class="bg-white shadow-sm border-b border-gray-200">
        <div class="max-w-7xl mx-auto px-4">
            <div class="flex justify-between items-center h-16">

                <!-- Left -->
                <div class="flex items-center space-x-4">
                    <div class="w-10 h-10 bg-gray-500 text-white flex items-center justify-center rounded-lg font-bold">
                        H
                    </div>
                    <div>
                        <h1 class="text-lg font-semibold text-gray-800">HANDA</h1>
                        <p class="text-sm text-gray-500">Disaster Preparedness Monitoring</p>
                    </div>
                </div>

                <!-- Right Nav -->
                <nav class="flex items-center space-x-4">
                    @guest
                        <a href="{{ route('login') }}"
                            class="{{ request()->routeIs('login') 
                            ? 'bg-gray-700 text-white px-4 py-2 rounded-xl' 
                            : 'text-gray-600 hover:text-gray-900 px-4 py-2' }}">
                            Login
                        </a>
                        <a href="{{ route('register') }}"
                            class="{{ request()->routeIs('register') 
                            ? 'bg-gray-700 text-white px-4 py-2 rounded-xl' 
                            : 'text-gray-600 hover:text-gray-900 px-4 py-2' }}">
                            Register
                        </a>
                        @endguest
                    @auth
                        <h3>Welcome, {{ Auth::user()->firstName }}</h3>

                        <!--Checklist Dashboard -->
                        <a href="{{ route('staff.dashboard') }}"
                            class="{{ request()->routeIs('staff.dashboard') 
                            ? 'bg-gray-700 text-white px-4 py-2 rounded-xl' 
                            : 'text-gray-600 hover:text-gray-900 px-4 py-2' }}">
                            Dashboard
                        </a>

                        <!-- Add Households -->
                        <a href="{{ route('staff.households') }}"
                            class="{{ request()->routeIs('staff.households') 
                            ? 'bg-gray-700 text-white px-4 py-2 rounded-xl' 
                            : 'text-gray-600 hover:text-gray-900 px-4 py-2' }}">
                            Add Households
                        </a>

                        <!-- Map -->
                        <a href="{{ route('staff.map') }}"
                            class="{{ request()->routeIs('staff.map') 
                            ? 'bg-gray-700 text-white px-4 py-2 rounded-xl' 
                            : 'text-gray-600 hover:text-gray-900 px-4 py-2' }}">
                            Map View
                        </a>

                        <!-- Logout -->
                        <form method="POST" action="{{ route('logout.post') }}" class="inline">
                            @csrf
                            <button type="submit" class="text-gray-600 hover:text-red-500 px-4 py-2">
                                Logout
                            </button>
                        </form>
                        @endauth
                </nav>

            </div>
        </div>
    </header>

    {{-- PAGE CONTENT --}}
    <main class="p-6">
        @yield('content')
    </main>

</body>
</html>