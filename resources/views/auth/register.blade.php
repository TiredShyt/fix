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
        <form method="POST" action="{{ route('register.post') }}">
    @csrf

    <!-- First Name -->
    <div class="mb-4">
        <label class="block text-sm font-medium text-gray-700 mb-1">First Name</label>
        <input type="text" name="firstName" placeholder="Enter first name" value="{{ old('firstName') }}"
            class="w-full px-4 py-2 rounded-lg bg-gray-100 border border-gray-200 focus:ring-2 focus:ring-gray-400">

        <!-- Validation Error for First Name -->
        @error('firstName')
        <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
        @enderror
    </div>

    
    <!-- Last Name -->
    <div class="mb-4">
        <label class="block text-sm font-medium text-gray-700 mb-1">Last Name</label>
        <input type="text" name="lastName" placeholder="Enter last name" value="{{ old('lastName') }}"
            class="w-full px-4 py-2 rounded-lg bg-gray-100 border border-gray-200 focus:ring-2 focus:ring-gray-400">
    
        <!-- Validation Error for Last Name -->
        @error('lastName')
        <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
        @enderror
    </div>

    

    <!-- Email -->
    <div class="mb-4">
        <label class="block text-sm font-medium text-gray-700 mb-1">Email</label>
        <input type="email" name="email" placeholder="Enter email" value="{{ old('email') }}"
            class="w-full px-4 py-2 rounded-lg bg-gray-100 border border-gray-200 focus:ring-2 focus:ring-gray-400">
        
        <!-- Validation Error for Email -->
        @error('email')
        <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
        @enderror
    </div>

    

    <!-- Contact Number -->
    <div class="mb-4">
        <label class="block text-sm font-medium text-gray-700 mb-1">Contact Number</label>
        <input type="text" name="contactNumber" placeholder="Enter contact number" value="{{ old('contactNumber') }}"
            class="w-full px-4 py-2 rounded-lg bg-gray-100 border border-gray-200 focus:ring-2 focus:ring-gray-400">
    
        <!-- Validation Error for Contact Number -->
        @error('contactNumber')
        <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
        @enderror
    </div>

    <!-- User ID -->
    <div class="mb-4">
        <label class="block text-sm font-medium text-gray-700 mb-1">
            User ID
        </label>
        <input type="text" name="user_id" placeholder="Enter your BHW/FHW ID" value="{{ old('user_id') }}"
            class="w-full px-4 py-2 rounded-lg bg-gray-100 border border-gray-200 focus:ring-2 focus:ring-gray-400">
    
        <!-- Validation Error for User ID -->
        @error('user_id')
        <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
        @enderror
    </div>

    

    <!-- Role Selection -->
    <div class="mb-4">
        <label class="block text-sm font-medium text-gray-700 mb-1">Register As</label>
        <select name="role"
            class="w-full px-4 py-2 rounded-lg bg-gray-100 border border-gray-200 focus:ring-2 focus:ring-gray-400">
            <option value="" disabled selected>Select role</option>
            <option value="bhw">Barangay Health Worker (BHW)</option>
            <option value="fhw">Field Health Worker (FHW)</option>
        </select>
    
        <!-- Validation Error for Role -->
        @error('role')
        <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
        @enderror
    </div>

    

    <!-- Password -->
    <div class="mb-6">
        <label class="block text-sm font-medium text-gray-700 mb-1">Password</label>
        <input type="password" name="password" placeholder="Enter password"
            class="w-full px-4 py-2 rounded-lg bg-gray-100 border border-gray-200 focus:ring-2 focus:ring-gray-400">
    
        <!-- Validation Error for Password -->
        @error('password')
        <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
        @enderror
    </div>

    

    <!-- Confirm Password -->
    <div class="mb-6">
        <label class="block text-sm font-medium text-gray-700 mb-1">Confirm Password</label>
        <input type="password" name="password_confirmation" placeholder="Confirm password"
            class="w-full px-4 py-2 rounded-lg bg-gray-100 border border-gray-200 focus:ring-2 focus:ring-gray-400">
    
        <!-- Validation Error for Confirm Password -->
        @error('password_confirmation')
        <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
        @enderror
    </div>

    

    <!-- Register Button -->
    <button type="submit"
        class="w-full bg-gray-600 hover:bg-gray-700 text-white py-2.5 rounded-lg transition">
        Register
    </button>
</form>

        <!-- Login Button -->
        <div class="mt-6 text-center">
    <p class="text-sm text-gray-500 mb-2">
        Already have an account?
    </p>

    <a href="{{ route('login') }}"
        class="inline-block w-full border border-gray-300 text-gray-700 py-2 rounded-lg hover:bg-gray-100 transition">
        Log In
    </a>
</div>

    </div>

</body>
</html>

