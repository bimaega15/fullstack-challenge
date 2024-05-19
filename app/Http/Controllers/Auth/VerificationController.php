<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Services\UserService;
use Illuminate\Http\Request;

class VerificationController extends Controller
{
    protected $userService;

    public function __construct(UserService $userService)
    {
        $this->userService = $userService;
    }

    public function index(Request $request)
    {
        $response = $this->userService->verifyEmail($request->token);
        if ($response) {
            return redirect()->route('completeProfile', ['token' => $request->token])->with('success', 'Email berhasil diverifikasi silahkan lengkapi data profil anda');
        } else {
            return redirect()->route('page.page404');
        }
    }
}
