<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>HANDA</title>
    <link rel="stylesheet" href="{{ asset('css/sidebar.css') }}">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css">
    @vite('resources/css/app.css')
</head>
<body class="bg-gray-100 antialiased">
    <div class="flex min-h-screen">
        <aside class="w-72 bg-white border-r border-gray-200 flex flex-col h-screen sticky top-0">
            <div class="p-4">
                <div class="bg-blue-600 rounded-2xl p-4 flex items-center space-x-3 text-white shadow-md">
                    <div class="w-10 h-10 bg-white text-blue-600 flex items-center justify-center rounded-xl font-bold">H</div>
                    <div>
                        <h1 class="font-bold text-lg leading-tight">HANDA</h1>
                        <p class="text-[10px] opacity-80 leading-tight">Disaster Preparedness</p>
                    </div>
                </div>
            </div>
            <nav class="flex-1 px-4 mt-4 space-y-1">
                <a href="{{ route('admin.dashboard') }}" class="flex items-center space-x-3 px-4 py-3 rounded-xl {{ request()->routeIs('admin.dashboard') ? 'bg-blue-50 text-blue-600 font-bold' : 'text-gray-500' }}">
                    <i class="fa-solid fa-house-chimney"></i> <span>Dashboard</span>
                </a>
                <a href="{{ route('admin.households') }}" class="flex items-center space-x-3 px-4 py-3 rounded-xl {{ request()->routeIs('admin.households') ? 'bg-blue-50 text-blue-600 font-bold' : 'text-gray-500' }}">
                    <i class="fa-solid fa-clipboard-list"></i> <span>Households</span>
                </a>
            </nav>
        </aside>

        <main class="flex-1 p-10">
            @yield('content')
        </main>
    </div>
</body>
</html>