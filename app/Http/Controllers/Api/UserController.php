<?php

namespace App\Http\Controllers\Api;

use App\Models\User;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Hash;
use App\Http\Resources\UserResource;
use Tymon\JWTAuth\Facades\JWTAuth;
use App\Http\Controllers\Api\Response;


class UserController extends Controller
{
    const ROLES = [
        1 => 'Admin',
        2 => 'Supervisor',
        3 => 'Operator',
    ];

    public function register(Request $request)
    {
        $request->validate([
            'username' => 'required|string|max:255|unique:users',
            'password' => 'required|string|min:8',
            'role_id' => 'required|integer|exists:roles,id',
        ]);

        $user = User::create([
            'username' => $request->username,
            'password' => Hash::make($request->password),
            'role_id' => $request->role_id,
        ]);

        $token = JWTAuth::fromUser($user);
        $user->load('role');
        return response()->json([
            'user' => [
                'id' => $user->id,
                'username' => $user->username,
                'role' => self::ROLES[$user->role_id],
                'created_at' => $user->created_at,
            ],
            'remember_token' => $token,
        ], 201);
    }

    public function login(Request $request)
    {
        $credentials = $request->only('username', 'password');

        if (!$token = JWTAuth::attempt($credentials)) {
            return response()->json(['error' => 'Invalid credentials'], 401);
        }

        $user = auth()->user();
        $user->load('role');
        return response()->json([
            'user' => [
                'id' => $user->id,
                'username' => $user->username,
                'role' => self::ROLES[$user->role_id],
            ],
            'remember_token' => $token,
        ]);
    }

    public function logout(Request $request)
    {
        try {
            JWTAuth::invalidate(JWTAuth::getToken());
            return response()->json(['message' => 'User logged out successfully'], 200);
        } catch (\Exception $e) {
            return response()->json(['error' => 'Failed to logout, please try again.'], 500);
        }
    }

    public function refreshToken()
    {
        // try {
        //     $newToken = JWTAuth::refresh(JWTAuth::getToken());
        //     return response()->json([
        //         'remember_token' => $newToken
        //     ]);
        // } catch (\Exception $e) {
        //     return response()->json(['error' => 'Failed to refresh token'], 500);
        // }
        
            $token = JWTAuth::getToken();
            $newToken = JWTAuth::refresh($token);
    
            return response()->json([
                'remember_token' => $newToken,
            ]);
        
    }

    public function index()
    {
        $users = User::latest()->get();
        $users = $users->map(function ($user) {
            return [
                'id' => $user->id,
                'username' => $user->username,
                'role' => self::ROLES[$user->role_id],
            ];
        });

        return new UserResource($users);
    }

    public function update(Request $request, $id)
    {
        $user = User::findOrFail($id);

        $validator = Validator::make($request->all(), [
            'username' => 'string|max:255|unique:users,username,' . $user->id,
            'password' => 'string|min:8|nullable',
            'role_id' => 'integer|exists:roles,id',
        ]);

        if ($validator->fails()) {
            return response()->json($validator->errors(), 422);
        }

        if ($request->has('username')) {
            $user->username = $request->username;
        }
        if ($request->has('password')) {
            $user->password = Hash::make($request->password);
        }
        if ($request->has('role_id')) {
            $user->role_id = $request->role_id;
        }

        $user->save();

        return response()->json([
            'message' => 'User updated successfully',
            'user' => new UserResource($user),
        ], 200);
    }

    public function destroy($id)
    {
        $user = User::findOrFail($id);
        $user->delete();

        return response()->json(['message' => 'User deleted successfully'], 200);
    }

    public function showAll()
    {
        $users = User::latest()->get();
        $users = $users->map(function ($user) {
            return [
                'id' => $user->id,
                'username' => $user->username,
                'role' => self::ROLES[$user->role_id],
            ];
        });
        return view('show2', compact('users'));
    
    }

    public function exportUsersCsv()
    {
        $users = User::all();
        $csvData = "No,Username,Role\n";
        $index = 1;
    
        foreach ($users as $user) {
            // Assuming self::ROLES is defined somewhere in your controller or class
            $role = self::ROLES[$user->role_id];
            $csvData .= "{$index},{$user->username},{$role}\n";
            $index++;
        }
    
        $fileName = 'users.csv';
        return response()->make($csvData, 200, [
            'Content-Type' => 'text/csv',
            'Content-Disposition' => "attachment; filename=\"$fileName\"",
        ]);
    }

}