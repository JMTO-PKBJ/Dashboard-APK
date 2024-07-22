<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AuthController extends Controller
{
    public function showLoginForm()
    {
        return view('layouts.auth.login'); // Adjust the path as needed
    }

// Method to handle login
public function login(Request $request)
{
    $request->validate([
        'username' => 'required|string',
        'password' => 'required|string',
    ]);

    $credentials = $request->only('username', 'password');

    if (Auth::attempt($credentials)) {
        $request->session()->regenerate();
        $user = Auth::user();

        // Check user role and redirect accordingly
        switch ($user->role_id) {
            case 1: // Admin
                return redirect()->route('admin.dashboard');
            case 2: // Supervisor
                return redirect()->route('supervisor.dashboard');
            case 3: // Supervisor
                return redirect()->route('operator.dashboard');
            default:
                return redirect()->intended('/testlog');
        }
    }

    return back()->withErrors([
        'error' => 'Login details are not valid',
    ]);
}

public function logout(Request $request)
{
    Auth::logout();

    $request->session()->invalidate();
    $request->session()->regenerateToken();

    return redirect('/login');
}
}