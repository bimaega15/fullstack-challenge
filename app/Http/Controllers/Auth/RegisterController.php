<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Http\Requests\Auth\RegisterRequest;
use App\Services\UserService;

class RegisterController extends Controller
{
    protected $userService;

    public function __construct(UserService $userService)
    {
        $this->userService = $userService;
    }

    public function index()
    {
        return view('auth.register');
    }

    public function store(RegisterRequest $request)
    {
        $response = $this->userService->storeData($request->all());
        if ($response) {
            return response()->json('Berhasil melakukan registrasi, silahkan check email anda untuk melakukan verifikasi email', 201);
        } else {
            return response()->json('Gagal melakukan registrasi, Kesalahan server', 500);
        }
    }
}
