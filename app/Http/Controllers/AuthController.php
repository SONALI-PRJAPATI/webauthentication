<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AuthController extends Controller
{
    public function login(Request $request)
    {
        $validated = $request->validate([
            'email' => 'required|string|email|max:255',
            'password' => 'required|string|min:8',
        ]);

        // Authentication logic
        if (Auth::attempt($validated)) {
            return redirect()->route('profile');
        }

        return back()->withErrors(['email' => 'Invalid credentials.']);
    }

    public function showlogin()
    {
        return view("auth.login");
    }

    public function register(Request $request)
    {
        $validated = $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|string|email|max:255|unique:users',
            'password' => 'required|string|min:8',
        ]);

        // Create new user
        $user = new User;
        $user->name = $validated['name'];
        $user->email = $validated['email'];
        $user->password = bcrypt($validated['password']); // Always hash passwords
        $user->save();

        Auth::login($user); // Log in the user after registration

        return redirect()->route('profile');
    }

    public function showregistration()
    {
        return view('auth.register');
    }

    
    public function profile()
    {
        $user = Auth::user();
        
        if ($user) {
            return view('profile', compact('user'));
        }
        
        return redirect()->route('login');
    }
    public function dashboard()
    {
        $user = Auth::user();
        return view('dashboard', compact('user'));
    }
}
