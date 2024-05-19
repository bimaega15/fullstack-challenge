<?php

namespace App\Http\Controllers;

use App\Http\Helpers\UtilsHelper;
use App\Http\Requests\AccountRequest;
use App\Http\Requests\updatePasswordRequest;
use App\Services\AccountService;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Config;

class AccountController extends Controller
{

    public $pekerjaan;
    public $accountService;
    public function __construct(AccountService $accountService)
    {
        $this->pekerjaan = Config::get('datastatis.pekerjaan');
        $this->accountService = $accountService;
    }


    public function index(Request $request)
    {
        $usersProfile = $this->accountService->indexData();
        $pekerjaan = $this->prepareJobData();
        if ($request->ajax()) {
            $accountProfile = view('account.partials.accountProfile', [
                'usersProfile' => $usersProfile,
            ])->render();

            $viewEditProfile = view('account.partials.editProfile', [
                'usersProfile' => $usersProfile,
                'pekerjaan' => $pekerjaan,
            ])->render();

            $viewChangePassword = view('account.partials.changePassword', [
                'usersProfile' => $usersProfile
            ])->render();

            return response()->json([
                'account_profile' => $accountProfile,
                'edit_profile' => $viewEditProfile,
                'change_password' => $viewChangePassword
            ]);
        }
        return view('account.index', [
            'usersProfile' => $usersProfile,
            'pekerjaan' => $pekerjaan,
        ]);
    }

    private function prepareJobData()
    {
        $data_pekerjaan = [];
        foreach ($this->pekerjaan as $key => $value) {
            $data_pekerjaan[] = (object) [
                'label' => $value,
                'value' => $value,
            ];
        }
        return $data_pekerjaan;
    }

    public function update(AccountRequest $request)
    {
        $data = $request->all();
        $data['foto_profile'] = $request->file('foto_profile');
        $response = $this->accountService->updateData($data);

        if ($response) {
            return response()->json('Berhasil mengubah data profile', 200);
        } else {
            return response()->json('Terjadi kesalahan server', 500);
        }
    }

    public function updatePassword(updatePasswordRequest $request)
    {
        $response = $this->accountService->updatePassword($request->all());
        if ($response) {
            return response()->json('Berhasil mengubah data profile', 200);
        } else {
            return response()->json('Terjadi kesalahan server', 500);
        }
    }
}
