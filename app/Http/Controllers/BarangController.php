<?php

namespace App\Http\Controllers;

use App\Http\Requests\BarangRequest;
use App\Models\Barang;
use App\Models\KategoriBarang;
use App\Services\BarangService;
use Illuminate\Http\Request;

class BarangController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public $barangService;
    public function __construct(BarangService $barangService)
    {
        $this->barangService = $barangService;
    }
    public function dataTables(Request $request)
    {
        if ($request->ajax()) {
            return $this->barangService->datatableData();
        }
    }

    public function index()
    {
        //
        return view('barang.index');
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
        $action = url('barang');
        return view('barang.form', compact('action'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(BarangRequest $request)
    {
        //
        $response = $this->barangService->storeData($request->all());
        if ($response) {
            return response()->json('Berhasil menambahkan barang', 201);
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
        $action = url('barang/' . $id . '?_method=put');
        $row = $this->barangService->editData($id);
        return view('barang.form', compact('action', 'row'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(BarangRequest $request, string $id)
    {
        //
        $response = $this->barangService->updateData($id, $request->all());
        if ($response) {
            return response()->json('Berhasil mengubah barang', 201);
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
        $response = $this->barangService->deleteData($id);
        if ($response) {
            return response()->json('Berhasil menghapus barang', 201);
        } else {
            return response()->json('Teradi kesalahan server', 500);
        }
    }
}
