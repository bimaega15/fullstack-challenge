<?php

namespace App\Services;

use App\Http\Helpers\UtilsHelper;
use App\Interfaces\AccountServiceInterface;
use App\Models\Profile;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class AccountService implements AccountServiceInterface
{
    public function indexData()
    {
        try {
            return UtilsHelper::myProfile();
        } catch (\Throwable $th) {
            \Log::error('Error : ' . $th->getMessage());
            return false;
        }
    }

    public function updateData($data)
    {
        try {
            $user = UtilsHelper::myProfile();

            unset($data['_method']);
            unset($data['pekerjaan_profile_value']);
            $fotoProfile = $data['foto_profile'];
            unset($data['foto_profile']);

            // update data profile
            $foto_profile = UtilsHelper::uploadFile($fotoProfile, 'profile', $user->profile->id, 'profile', 'foto_profile');
            $profile_id = $user->profile->id;
            $dataMerge = array_merge($data, ['foto_profile' => $foto_profile]);
            Profile::find($profile_id)->update($dataMerge);

            return $user;
        } catch (\Throwable $th) {
            \Log::error('Error : ' . $th->getMessage());
            return false;
        }
    }

    public function updatePassword($data)
    {
        try {
            $user = Auth::user();
            $user->password = Hash::make($data['password_new']);
            $user->save();

            return $user;
        } catch (\Throwable $th) {
            \Log::error('Error : ' . $th->getMessage());
            return false;
        }
    }
}
