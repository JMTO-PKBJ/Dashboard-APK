<?php

// namespace App\Http\Controllers;

// use Illuminate\Http\Request;
// use Illuminate\Support\Facades\Auth;

// class AuthController extends Controller
// {
//     public function showLoginForm()
//     {
//         return view('test2');
//     }

//     // public function login(Request $request)
//     // {
//     //     $credentials = $request->only('username', 'password');

//     //     if (Auth::attempt($credentials)) {
//     //         // Authentication passed...
//     //         return response()->json([
//     //             'success' => true,
//     //             'token' => Auth::user()->createToken('access_token')->plainTextToken,
//     //         ]);
//     //     }

//     //     return response()->json([
//     //         'success' => false,
//     //         'message' => 'The provided credentials do not match our records.',
//     //     ], 401);
//     // }
// //     public function login(Request $request)
// //     {
// //         $credentials = $request->only('username', 'password');

// //         if (Auth::attempt($credentials)) {
// //             $user = Auth::user();
// //             $token = $user->createToken('Personal Access Token')->plainTextToken;

// //             return response()->json(['remember_token' => $token], 200);
// //         } else {
// //             return response()->json(['message' => 'Login failed'], 401);
// //         }
// //     }

// //     public function logout(Request $request)
// //     {
// //         Auth::logout();
// //         return response()->json(['success' => true]);
// //     }
// // }
// // namespace App\Http\Controllers;

// // use Illuminate\Http\Request;
// // use Illuminate\Support\Facades\Auth;
// // use App\Models\User;
// // use Tymon\JWTAuth\Facades\JWTAuth;

// // class AuthController extends Controller
// // {
// //     public function showLoginForm()
// //     {
// //         return view('test2');
// //     }

// //     public function login(Request $request)
// //     {
// //         $credentials = $request->only('email', 'password');

// //         if (!$token = JWTAuth::attempt($credentials)) {
// //             return redirect('login')->with('error', 'Login details are not valid');
// //         }

// //         return redirect()->intended('/dashboard')->with('token', $token);
// //     }

// //     public function logout()
// //     {
// //         Auth::logout();
// //         return redirect('/login')->with('success', 'Logout successful');
// //     }

// //     public function register(Request $request)
// //     {
// //         $request->validate([
// //             'email' => 'required|unique:users',
// //             'password' => 'required|confirmed'
// //         ]);

// //         User::create([
// //             'email' => $request->email,
// //             'password' => bcrypt($request->password),
// //             'role_id' => 3 // Assuming default role is operator
// //         ]);

// //         return redirect('/login')->with('success', 'Registration successful, please login');
// //     }
// // }
// }

// namespace App\Http\Controllers;

// use Illuminate\Http\Request;
// use Illuminate\Support\Facades\Auth;
// use App\Models\User;
// use Tymon\JWTAuth\Facades\JWTAuth;

// class AuthController extends Controller
// {
//     public function showLoginForm()
//     {
//         return view('test2');
//     }

//     public function login(Request $request)
//     {
//         $request->validate([
//             'username' => 'required|string',
//             'password' => 'required|string',
//         ]);

//         $credentials = $request->only('username', 'password');

//         if (Auth::attempt($credentials)) {
//             $request->session()->regenerate();
//             return redirect()->intended('testlog'); // Redirect ke halaman testlog setelah login
//         }

//         return back()->withErrors([
//             'error' => 'Login details are not valid',
//         ]);
//     }

//     public function logout(Request $request)
//     {
//         Auth::logout();

//         $request->session()->invalidate();
//         $request->session()->regenerateToken();

//         return redirect('/login');
//     }
// }

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AuthController extends Controller
{
    public function showLoginForm()
    {
        return view('login'); // Adjust the path as needed
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
                return redirect()->intended('/dashboard');
            case 2: // Supervisor
                return redirect()->intended('/testlog');
            case 3: // Supervisor
                return redirect()->intended('/testlog');
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