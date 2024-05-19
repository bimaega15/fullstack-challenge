<?php

namespace App\Services;

use App\Http\Helpers\UtilsHelper;
use App\Interfaces\CompleteProfileInterface;
use App\Models\Profile;

class CompleteProfileService implements CompleteProfileInterface
{
    public function updateData(array $data)
    {
        try {
            $userService = new UserService();
            $user = $userService->getToken($data['token']);

            unset($data['_token']);
            unset($data['_method']);
            unset($data['token']);
            unset($data['pekerjaan_profile_value']);
            $fotoProfile = $data['foto_profile'];
            unset($data['foto_profile']);

            // update verifikasi user
            $user->email_verification_token = null;
            $user->save();

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
}
