<?php

namespace App\Http\Controllers;

use App\Models\KategoriBarang;
use App\Services\Select2Service;
use Illuminate\Http\Request;

class Select2Controller extends Controller
{
    //
    public $select2Service;
    public function __construct(Select2Service $select2Service)
    {
        $this->select2Service = $select2Service;
    }
    public function kategoriBarang(Request $request)
    {
        $response = $this->select2Service->kategoriBarang($request);
        if ($response) {
            return response()->json($response, 200);
        } else {
            return response()->json('Terjadi kesalahan data', 500);
        }
    }
    public function barang(Request $request)
    {
        $response = $this->select2Service->barang($request);
        if ($response) {
            return response()->json($response, 200);
        } else {
            return response()->json('Terjadi kesalahan data', 500);
        }
    }
}
