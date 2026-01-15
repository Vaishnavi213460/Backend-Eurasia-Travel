<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\User;
use Tymon\JWTAuth\Facades\JWTAuth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;


class AuthController extends Controller
{
    public function register(Request $request)
    {
        $validated = $request->validate([
            'full_name' => 'required|string|min:3',
            'email' => 'required|email|unique:users,email',
            'password' => 'required|min:6|confirmed',
        ]);

        $nameParts = explode(' ', trim($validated['full_name']), 2);

        $user = User::create([
            'first_name' => $nameParts[0],
            'last_name' => $nameParts[1] ?? '',
            'email' => $validated['email'],
            'password' => Hash::make($validated['password']),
        ]);

        return response()->json([
            'success' => true,
            'message' => 'Registration successful',
            'data' => [
                'user' => $user,
                'redirect_url' => '/login'
            ]
        ]);
    }

    public function login(Request $request)
    {
        $validated = $request->validate([
            'login_id' => 'required|email',
            'password' => 'required',
        ]);

        $credentials = [
            'email' => $validated['login_id'],
            'password' => $validated['password'],
        ];

        if (! $token = auth('api')->attempt($credentials)) {
            return response()->json([
                'success' => false,
                'message' => 'Invalid credentials',
                'data' => (object)[]
            ], 401);
        }

        return response()->json([
            'success' => true,
            'message' => 'Login successful',
            'data' => [
                'access_token' => $token,
                'token_type' => 'bearer',
                'expires_in' => auth('api')->factory()->getTTL() * 60,
                'redirect_url' => '/dashboard'
            ]
        ]);
    }

    public function verifyEmail(Request $request)
    {
        $validated = $request->validate([
            'email' => 'required|email|exists:users,email',
            'token' => 'required'
        ]);

        $user = User::where('email', $validated['email'])->first();

        $user->email_verified_at = now();
        $user->save();

        return response()->json([
            'success' => true,
            'message' => 'Email verified successfully',
            'data' => [
                'redirect_url' => '/login'
            ]
        ]);
    }

    public function forgotPassword(Request $request)
    {
        $request->validate([
            'email' => 'required|email|exists:users,email',
        ]);

        DB::table('password_reset_tokens')->updateOrInsert(
            ['email' => $request->email],
            [
                'token' => Str::random(64),
                'created_at' => now()
            ]
        );

        return response()->json([
            'success' => true,
            'message' => 'Password reset link sent',
            'data' => [
                'redirect_url' => '/reset-password'
            ]
        ]);
    }

    public function resetPassword(Request $request)
    {
        $validated = $request->validate([
            'email' => 'required|email',
            'token' => 'required',
            'password' => 'required|min:6|confirmed',
        ]);

        $record = DB::table('password_reset_tokens')
            ->where('email', $validated['email'])
            ->where('token', $validated['token'])
            ->first();

        if (! $record) {
            return response()->json([
                'success' => false,
                'message' => 'Invalid token',
                'data' => (object)[]
            ], 400);
        }

        User::where('email', $validated['email'])
            ->update(['password' => Hash::make($validated['password'])]);

        DB::table('password_reset_tokens')
            ->where('email', $validated['email'])->delete();

        return response()->json([
            'success' => true,
            'message' => 'Password reset successful',
            'data' => [
                'redirect_url' => '/login'
            ]
        ]);
    }




    public function logout()
    {
        auth()->logout();
        return response()->json(['message'=>'Logged out']);
    }
}
