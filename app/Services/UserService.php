<?php

namespace App\Services;

use App\Interfaces\UserServiceInterface;
use App\Models\Profile;
use App\Models\User;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Str;

class UserService implements UserServiceInterface
{
    public function storeData(array $data)
    {
        try {
            DB::beginTransaction();

            unset($data['password_confirmation']);
            $data['password'] = Hash::make($data['password']);
            $data['email_verification_token'] = Str::random(60);
            $user = User::create($data);

            Profile::create([
                'nama_profile' => $data['name'],
                'email_profile' => $data['email'],
                'users_id' => $user->id,
            ]);

            Mail::send('auth.verify-email', ['user' => $user], function ($message) use ($user) {
                $message->to($user->email);
                $message->subject('Verify your email address');
            });

            DB::commit();

            return $user;
        } catch (\Throwable $th) {
            DB::rollBack();
            \Log::error('Error : ' . $th->getMessage());
            return false;
        }
    }

    public function verifyEmail(string $token)
    {
        try {
            $user = User::where('email_verification_token', $token)->firstOrFail();
            $user->email_verified_at = now();
            $user->save();
            return $user;
        } catch (\Throwable $th) {
            \Log::error('Error : ' . $th->getMessage());
            return false;
        }
    }

    public function getToken(string $token)
    {
        try {
            $user = User::with('profile')->where('email_verification_token', $token)
                ->firstOrFail();
            return $user;
        } catch (\Throwable $th) {
            \Log::error('Error : ' . $th->getMessage());
            return false;
        }
    }
}
