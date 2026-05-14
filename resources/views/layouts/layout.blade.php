<!DOCTYPE html>
<html>
<head>
    <title>HANDA</title>
    @vite('resources/css/app.css')
    @stack('styles')
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

                        <!-- Dashboard -->
                        <a href="{{ route('admin.dashboard') }}"
                            class="{{ request()->routeIs('admin.dashboard') 
                            ? 'bg-gray-700 text-white px-4 py-2 rounded-xl' 
                            : 'text-gray-600 hover:text-gray-900 px-4 py-2' }}">
                            Dashboard
                        </a>

                        <!-- Households -->
                        <a href="{{ route('admin.households') }}"
                            class="{{ request()->routeIs('admin.households') 
                            ? 'bg-gray-700 text-white px-4 py-2 rounded-xl' 
                            : 'text-gray-600 hover:text-gray-900 px-4 py-2' }}">
                            Households
                        </a>

                        <!-- Map -->
                        <a href="{{ route('admin.map') }}"
                            class="{{ request()->routeIs('admin.map') 
                            ? 'bg-gray-700 text-white px-4 py-2 rounded-xl' 
                            : 'text-gray-600 hover:text-gray-900 px-4 py-2' }}">
                            Map View
                        </a>

                        <!-- Logout -->
                        <form method="POST" action="{{ route('logout') }}" class="inline">
                            @csrf
                            <button type="submit" class="text-gray-600 hover:text-red-500 px-4 py-2">
                                Logout
                            </button>
                        </form>
                    
                </nav>

            </div>
        </div>
    </header>

    {{-- PAGE CONTENT --}}
    <main class="p-6">
        @yield('content')
    </main>

    @stack('scripts')
</body>
</html>