<?php

namespace App\Http\Controllers;

use App\Http\Requests\CompleteProfileRequest;
use App\Services\CompleteProfileService;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Config;

class CompleteProfileController extends Controller
{
    public $completeProfileService;
    public $pekerjaan;

    public function __construct(CompleteProfileService $completeProfileService)
    {
        $this->completeProfileService = $completeProfileService;
        $this->pekerjaan = Config::get('datastatis.pekerjaan');
    }

    public function index(Request $request)
    {
        $token = $request->get('token');
        $data_pekerjaan = $this->prepareJobData();

        return view('completeProfile.index', [
            'pekerjaan' => $data_pekerjaan,
            'token' => $token,
        ]);
    }

    public function update(CompleteProfileRequest $request)
    {
        $data = $request->all();
        $file = $request->file('foto_profile');
        $data['foto_profile'] = $file;
        $response = $this->completeProfileService->updateData($data);
        if ($response) {
            return response()->json('Berhasil melengkapi data profile <br /> Silahkan login aplikasi', 200);
        } else {
            return response()->json('Terjadi kesalahan server', 500);
        }
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
}
