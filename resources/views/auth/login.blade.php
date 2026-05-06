<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login - HANDA</title>
    @vite('resources/css/app.css')
</head>
<body class="bg-gray-100 flex items-center justify-center min-h-screen">

    <div class="w-full max-w-md bg-white rounded-2xl shadow-md p-8">

        <!-- Logo -->
        <div class="flex justify-center mb-4">
            <div class="w-14 h-14 bg-gray-500 text-white flex items-center justify-center rounded-xl text-xl font-semibold">
                H
            </div>
        </div>

        <!-- Title -->
        <h2 class="text-center text-2xl font-semibold text-gray-800">
            HANDA System
        </h2>

        <p class="text-center text-gray-500 mt-2 mb-6 text-sm">
            Barangay Household Disaster Preparedness Monitoring
        </p>

        <!-- Form -->
        <form method="POST" action="{{ route('login.post') }}">
            @csrf

            <!-- Email -->
            <div class="mb-4">
                <label class="block text-sm font-medium text-gray-700 mb-1">
                    Email
                </label>
                <input type="email" name="email"
                    placeholder="Enter email"
                    value="{{ old('email') }}"
                    class="w-full px-4 py-2 rounded-lg bg-gray-100 border border-gray-200 focus:outline-none focus:ring-2 focus:ring-gray-400">
                
                <!-- Validation Error for Email -->
                @error('email')
                <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
                @enderror
            </div>

            <!-- Password -->
            <div class="mb-6">
                <label class="block text-sm font-medium text-gray-700 mb-1">
                    Password
                </label>
                <input type="password" name="password"
                    placeholder="Enter password"
                    class="w-full px-4 py-2 rounded-lg bg-gray-100 border border-gray-200 focus:outline-none focus:ring-2 focus:ring-gray-400">
                
                <!-- Validation Error for Password -->
                @error('password')
                <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
                @enderror
            </div>

            <!-- Login Button -->
            <button type="submit"
                class="w-full bg-gray-600 hover:bg-gray-700 text-white py-2.5 rounded-lg flex items-center justify-center gap-2 transition">
                
                <!-- Shield Icon -->
                <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5"
                    fill="none" viewBox="0 0 24 24" stroke="currentColor">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                        d="M12 11c0 .67-.34 1.29-.9 1.64l-2.2 1.32A2 2 0 018 15.72V17a4 4 0 008 0v-1.28a2 2 0 00-.9-1.76l-2.2-1.32A2 2 0 0112 11z" />
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                        d="M12 3l7 4v5c0 5-3.5 9-7 9s-7-4-7-9V7l7-4z" />
                </svg>

                Log In
            </button>
        </form>

        <!-- Register Button -->
        <div class="mt-6 text-center">
            <p class="text-sm text-gray-500 mb-2">
                Don’t have an account?
            </p>

            <a href="{{ route('register') }}"
                class="inline-block w-full border border-gray-300 text-gray-700 py-2 rounded-lg hover:bg-gray-100 transition">
                Create Account
            </a>
        </div>

    </div>

</body>
</html>