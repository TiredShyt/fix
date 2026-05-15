<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>HANDA - Login</title>
    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>

<body class="m-0 p-0 bg-slate-100 flex items-center justify-center min-h-screen font-sans antialiased">

    <div class="flex w-[1100px] min-h-[650px] bg-white rounded-[20px] overflow-hidden shadow-[0_20px_50px_rgba(0,0,0,0.15)]">
        
        <div class="flex-[1.2] bg-slate-900 text-white p-[70px] flex flex-col justify-start">
            <div class="flex items-center mb-5">
                <div class="h-10 w-10 bg-blue-500 rounded-lg flex items-center justify-center text-2xl font-bold text-white mr-[15px]">H</div>
                <div>
                    <h1 class="text-[2.2rem] m-0 tracking-[2px] font-extrabold text-white leading-none">HANDA</h1>
                    <p class="mt-1 mb-0 mx-0 text-base text-white font-medium tracking-[0.5px]">
                        Barangay Disaster Preparedness Monitoring System
                    </p>
                </div>
            </div>

            <div class="mt-[100px]">
                <h2 class="text-[2.8rem] m-0 font-bold leading-snug text-white tracking-[1px] max-w-[450px]">
                    Join us in building safer communities.
                </h2>
            </div>
            
            <div class="mt-auto text-sm opacity-50 tracking-[0.5px]">
                © 2026 HANDA Project. All rights reserved.
            </div>
        </div>

        <div class="flex-1 p-[70px] flex flex-col justify-center bg-white">
            <div class="max-w-[400px] mx-auto w-full">
                <h2 class="m-0 text-[2.5rem] text-slate-800 font-bold">Welcome back</h2>
                <p class="text-slate-500 mt-2 mb-[45px] text-lg">Please enter your details to login.</p>

                {{-- FORM START --}}
                <form action="{{ route('login.post') }}" method="POST" autocomplete="off">
                    @csrf

                    <div class="mb-[30px]">
                        <label class="block text-base mb-3 text-slate-700 font-semibold">Email Address</label>
                        <input 
                            type="email" 
                            name="email" 
                            id="email"
                            value="" {{-- Gi-forced empty para mawala ang 202424 --}}
                            autocomplete="off" 
                            placeholder="name@example.com" 
                            required 
                            class="w-full p-4 border-2 border-slate-200 rounded-xl box-border outline-none text-base focus:border-blue-500 transition-colors @error('email') border-red-500 @enderror"
                        >
                        @error('email')
                            <span class="text-red-500 text-sm mt-1 block">{{ $message }}</span>
                        @enderror
                    </div>

                    <div class="mb-[25px]">
                        <div class="flex justify-between mb-3">
                            <label class="text-base text-slate-700 font-semibold">Password</label>
                            <a href="#" class="text-sm text-blue-600 no-underline font-semibold hover:underline">Forgot Password?</a>
                        </div>
                        <input 
                            type="password" 
                            name="password" 
                            id="password"
                            value="" 
                            autocomplete="new-password" {{-- Pugson ang browser nga dili i-autofill --}}
                            placeholder="••••••••" 
                            required 
                            class="w-full p-4 border-2 border-slate-200 rounded-xl box-border outline-none text-base focus:border-blue-500 transition-colors @error('password') border-red-500 @enderror"
                        >
                    </div>

                    <div class="flex items-center mb-10">
                        <input type="checkbox" id="remember" name="remember" class="w-5 h-5 cursor-pointer accent-slate-900">
                        <label for="remember" class="ml-3 text-base text-slate-500 cursor-pointer select-none">Remember this device</label>
                    </div>

                    <button type="submit" class="w-full p-[18px] bg-slate-900 text-white border-none rounded-xl text-lg font-bold cursor-pointer transition-all duration-300 shadow-[0_4px_12px_rgba(15,23,42,0.2)] hover:bg-slate-800">
                        Sign In
                    </button>
                </form>

                <p class="text-center mt-[45px] text-base text-slate-500">
                    Don't have an account?
                    <a href="{{ route('register') }}" class="text-blue-600 font-bold no-underline hover:underline">Sign Up</a>
                </p>
            </div>
        </div>
    </div>

</body>
</html>