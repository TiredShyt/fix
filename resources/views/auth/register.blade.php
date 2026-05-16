<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>HANDA - Register</title>
    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>

<body style="margin: 0; padding: 0; background-color: #f1f5f9; display: flex; align-items: center; justify-content: center; min-height: 100vh; font-family: 'Segoe UI', Roboto, Helvetica, Arial, sans-serif;">

    <div style="display: flex; width: 1100px; min-height: 700px; background-color: white; border-radius: 20px; overflow: hidden; box-shadow: 0 20px 50px rgba(0,0,0,0.15);">
        
        <div style="flex: 1.2; background-color: #0f172a; color: white; padding: 70px; display: flex; flex-direction: column; justify-content: flex-start; relative; overflow: hidden;">
            
            <div style="display: flex; align-items: center; margin-bottom: 20px;">
                <div style="width: 40px; height: 40px; background-color: #3b82f6; border-radius: 8px; display: flex; align-items: center; justify-content: center; font-size: 24px; font-weight: bold; color: #ffffff; margin-right: 15px;">
                    H
                </div>

                <div>
                    <h1 style="font-size: 2.2rem; margin: 0; letter-spacing: 2px; font-weight: 800; color: #ffffff; line-height: 1;">
                        HANDA
                    </h1>
                    <p style="margin: 5px 0 0 0; font-size: 1rem; color: #ffffff; font-weight: 500; letter-spacing: 0.5px;">
                        Barangay Disaster Preparedness Monitoring System
                    </p>
                </div>
            </div>

            <div style="margin-top: 100px;">
                <h2 style="font-size: 2.8rem; margin: 0; font-weight: 700; line-height: 1.2; color: #ffffff; letter-spacing: 1px; max-width: 450px;">
                    Join us in building safer communities.
                </h2>
                <p style="color: #cbd5e1; margin-top: 20px; font-size: 1.1rem; line-height: 1.6;">
                    Create your account today to start monitoring household disaster preparedness and safeguarding lives.
                </p>
            </div>
            
            <div style="margin-top: auto; font-size: 0.9rem; opacity: 0.5; letter-spacing: 0.5px;">
                © 2026 HANDA Project. All rights reserved.
            </div>
        </div>

        <div style="flex: 1; padding: 50px 70px; display: flex; flex-direction: column; justify-content: center; background-color: #ffffff; max-height: 750px; overflow-y: auto;">

            <div style="max-width: 400px; margin: 0 auto; width: 100%;">

                <h2 style="margin: 0; font-size: 2.3rem; color: #1e293b; font-weight: 700;">
                    Create an Account
                </h2>

                <p style="color: #64748b; margin-top: 8px; margin-bottom: 30px; font-size: 1rem;">
                    Fill in the details below to register.
                </p>

                <form action="{{ route('register.post') }}" method="POST">
                    @csrf

                    <div style="display: flex; gap: 15px; margin-bottom: 20px;">
                        <div style="flex: 1;">
                            <label style="display: block; font-size: 0.9rem; margin-bottom: 8px; color: #334155; font-weight: 600;">First Name</label>
                            <input type="text" name="firstName" required style="width: 100%; padding: 12px; border: 2px solid #e2e8f0; border-radius: 10px; box-sizing: border-box; outline: none; font-size: 0.95rem;">
                        </div>
                        <div style="flex: 1;">
                            <label style="display: block; font-size: 0.9rem; margin-bottom: 8px; color: #334155; font-weight: 600;">Last Name</label>
                            <input type="text" name="lastName" required style="width: 100%; padding: 12px; border: 2px solid #e2e8f0; border-radius: 10px; box-sizing: border-box; outline: none; font-size: 0.95rem;">
                        </div>
                    </div>

                    <div style="margin-bottom: 20px;">
                        <label style="display: block; font-size: 0.9rem; margin-bottom: 8px; color: #334155; font-weight: 600;">Email Address</label>
                        <input type="email" name="email" required style="width: 100%; padding: 12px; border: 2px solid #e2e8f0; border-radius: 10px; box-sizing: border-box; outline: none; font-size: 0.95rem;">
                    </div>

                    <div style="margin-bottom: 20px;">
                        <label style="display: block; font-size: 0.9rem; margin-bottom: 8px; color: #334155; font-weight: 600;">Contact Number</label>                            <input type="text" name="contactNumber" maxlength="15" required style="width: 100%; padding: 12px; border: 2px solid #e2e8f0; border-radius: 10px; box-sizing: border-box; outline: none; font-size: 0.95rem;">
                    </div>

                    <div style="margin-bottom: 20px;">
                        <label style="display: block; font-size: 0.9rem; margin-bottom: 8px; color: #334155; font-weight: 600;">Your Role</label>
                        <select name="role" required style="width: 100%; padding: 12px; border: 2px solid #e2e8f0; border-radius: 10px; box-sizing: border-box; outline: none; font-size: 0.95rem; background-color: white; color: #334155;">
                            <option value="" disabled selected>Select your role</option>
                            <option value="bhw">Barangay Health Worker (BHW)</option>
                            <option value="fhw">Field Health Worker (FHW)</option>
                        </select>
                    </div>

                    <div style="margin-bottom: 20px;">
                        <label style="display: block; font-size: 0.9rem; margin-bottom: 8px; color: #334155; font-weight: 600;">Password</label>
                        <input type="password" name="password" required style="width: 100%; padding: 12px; border: 2px solid #e2e8f0; border-radius: 10px; box-sizing: border-box; outline: none; font-size: 0.95rem;">
                    </div>

                    <div style="margin-bottom: 30px;">
                        <label style="display: block; font-size: 0.9rem; margin-bottom: 8px; color: #334155; font-weight: 600;">Confirm Password</label>
                        <input type="password" name="password_confirmation" required style="width: 100%; padding: 12px; border: 2px solid #e2e8f0; border-radius: 10px; box-sizing: border-box; outline: none; font-size: 0.95rem;">
                    </div>

                    <button type="submit" style="width: 100%; padding: 15px; background-color: #0f172a; color: white; border: none; border-radius: 12px; font-size: 1.05rem; font-weight: 700; cursor: pointer; transition: 0.3s; box-shadow: 0 4px 12px rgba(15, 23, 42, 0.2);">
                        Sign Up
                    </button>

                </form>

                <p style="text-align: center; margin-top: 30px; font-size: 0.95rem; color: #64748b; margin-bottom: 0;">
                    Already have an account?
                    <a href="{{ route('login') }}" style="color: #2563eb; font-weight: 700; text-decoration: none; margin-left: 5px;">
                        Log In
                    </a>
                </p>

            </div>
        </div>

    </div>

</body>
</html>