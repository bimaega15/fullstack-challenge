<?php

namespace App\Http\Controllers;

use App\Http\Requests\ChangeStatusRequest;
use App\Http\Requests\SatuanBarangRequest;
use App\Services\SatuanBarangService;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Config;

class SatuanBarangController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public $satuanBarangService;
    public $statusSBarang;
    public function __construct(SatuanBarangService $satuanBarangService)
    {
        $this->satuanBarangService = $satuanBarangService;
        $this->statusSBarang = Config::get('datastatis.status_sbarang');
    }

    public function dataTables(Request $request)
    {
        if ($request->ajax()) {
            return $this->satuanBarangService->datatableData();
        }
    }

    public function index()
    {
        //
        return view('satuanBarang.index');
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
        $action = url('satuanBarang');
        $status_sbarang = $this->statusSBarang;
        $array_status_sbarang = [];
        foreach ($status_sbarang as $value => $label) {
            $array_status_sbarang[] = [
                'label' => $label,
                'value' => $value,
            ];
        }
        return view('satuanBarang.form', compact('action', 'array_status_sbarang'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(SatuanBarangRequest $request)
    {
        //
        $response = $this->satuanBarangService->storeData($request->all());
        if ($response) {
            return response()->json('Berhasil menambahkan satuan barang', 201);
        } else {
            return response()->json('Teradi kesalahan server', 500);
        }
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
        $action = url('satuanBarang/' . $id . '?_method=put');
        $row = $this->satuanBarangService->editData($id);
        $status_sbarang = $this->statusSBarang;
        $array_status_sbarang = [];
        foreach ($status_sbarang as $value => $label) {
            $array_status_sbarang[] = [
                'label' => $label,
                'value' => $value,
            ];
        }
        return view('satuanBarang.form', compact('action', 'row', 'array_status_sbarang'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(SatuanBarangRequest $request, string $id)
    {
        //
        $response = $this->satuanBarangService->updateData($id, $request->all());
        if ($response) {
            return response()->json('Berhasil mengubah satuan barang', 201);
        } else {
            return response()->json('Teradi kesalahan server', 500);
        }
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
        $response = $this->satuanBarangService->deleteData($id);
        if ($response) {
            return response()->json('Berhasil menghapus satuan barang', 201);
        } else {
            return response()->json('Teradi kesalahan server', 500);
        }
    }

    public function changeStatus($id)
    {
        $action = url('satuanBarang/' . $id . '/changeStatus?_method=put');
        $row = $this->satuanBarangService->editData($id);
        $status_sbarang = $this->statusSBarang;
        $array_status_sbarang = [];
        foreach ($status_sbarang as $value => $label) {
            $array_status_sbarang[] = [
                'label' => $label,
                'value' => $value,
            ];
        }
        return view('satuanBarang.changeStatus', compact('action', 'row', 'array_status_sbarang'));
    }

    public function updateChangeStatus(ChangeStatusRequest $request, string $id)
    {
        $response = $this->satuanBarangService->updateData($id, $request->all());
        if ($response) {
            return response()->json('Berhasil mengubah status barang', 201);
        } else {
            return response()->json('Teradi kesalahan server', 500);
        }
    }
}
