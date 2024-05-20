<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Http\Requests\Auth\LoginRequest;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class LoginController extends Controller
{
    public function index()
    {
        return view('auth.login');
    }

    public function login(LoginRequest $request)
    {
        $user = User::where('email', $request->input('email'))->first();
        if ($user) {
            if (!$user->hasVerifiedEmail()) {
                return response()->json([
                    'status' => 400,
                    'message' => 'Email belum diverifikasi'
                ], 200);
            }

            $credentials = $request->only('email', 'password');
            $remember = $request->has('remember') ? true : false;

            if (Auth::attempt($credentials, $remember)) {
                return response()->json([
                    'status' => 200,
                    'message' => 'Berhasil login'
                ], 200);
            } else {
                return response()->json([
                    'status' => 400,
                    'message' => 'Password anda salah'
                ], 200);
            }
        }

        return response()->json([
            'status' => 400,
            'message' => 'Email tidak ditemukan'
        ], 200);
    }
}
