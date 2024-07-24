<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Validation\Rules\Password;
use App\Models\User;
use Twilio\Rest\Client;

class AuthController extends Controller
{
    // Register a new user
    public function register(Request $request)
    {
        $request->validate([
            'phone' => ['required'],
            'email' => ['required', 'string', 'email', 'max:255', 'unique:users'],
            'password' => ['required', Password::min(6)],
            'role' => ['required', 'in:employer,employee'], // Validate the role
        ]);

        // Create the user
        $user = User::create([
            'phone' => $request->phone,
            'email' => $request->email,
            'password' => Hash::make($request->password),
            'role' => $request->role, // Save the role
        ]);

        // Log in the user
        Auth::login($user);

        // OTP generation
        $otp = mt_rand(100000, 999999); // Simple OTP generator
        session(['otp' => $otp]);

        // Twilio OTP code
        $sid = config('services.twilio.sid');
        $token = config('services.twilio.token');
        $twilioNumber = config('services.twilio.phone_number');

        // Initialize Twilio client
        $client = new Client($sid, $token);

        // Send SMS
        $client->messages->create(
            $request->phone,
            [
                'from' => $twilioNumber,
                'body' => "Your OTP is: $otp"
            ]
        );

        // Redirect to OTP verification page
        return redirect()->route('verify-otp');
    }

    // Show OTP verification form
    public function showOtpForm()
    {
        return view('verify-otp'); // Create a view for OTP input
    }

    // Verify OTP
    public function verifyOtp(Request $request)
    {
        $request->validate([
            'otp' => ['required'],
        ]);

        // Retrieve stored OTP
        $storedOtp = session('otp');
        if ($request->otp == $storedOtp) {
            return redirect('/index'); // Redirect to the desired page
        } else {
            // OTP is invalid
            return redirect()->route('verify-otp')->withErrors(['otp' => 'The OTP you entered is incorrect.']);
        }
    }

    // Login user
    public function login(Request $request)
    {
        $request->validate([
            'email' => 'required|email',
            'password' => 'required',
        ]);

        if (Auth::attempt(['email' => $request->email, 'password' => $request->password])) {
            $request->session()->regenerate();
            return redirect('/index');
        }

        return back()->withErrors([
            'email' => 'The provided credentials do not match our records.',
        ])->onlyInput('email');
    }

    // Logout user
    public function logout(Request $request)
    {
        Auth::logout();
        $request->session()->invalidate();
        $request->session()->regenerateToken();
        return redirect('/login');
    }
}
