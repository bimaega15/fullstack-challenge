<?php

namespace App\Http\Controllers;

use App\Http\Requests\KategoriBarangRequest;
use App\Models\KategoriBarang;
use App\Services\KategoriBarangService;
use Illuminate\Http\Request;

class KategoriBarangController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public $kategoriBarangService;
    public function __construct(KategoriBarangService $kategoriBarangService)
    {
        $this->kategoriBarangService = $kategoriBarangService;
    }
    public function dataTables(Request $request)
    {
        if ($request->ajax()) {
            return $this->kategoriBarangService->datatableData();
        }
    }

    public function index()
    {
        //
        return view('kategoriBarang.index');
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
        $action = url('kategoriBarang');
        return view('kategoriBarang.form', compact('action'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(KategoriBarangRequest $request)
    {
        //
        $response = $this->kategoriBarangService->storeData($request->all());
        if ($response) {
            return response()->json('Berhasil menambahkan kategori barang', 201);
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
        $action = url('kategoriBarang/' . $id . '?_method=put');
        $row = $this->kategoriBarangService->editData($id);
        return view('kategoriBarang.form', compact('action', 'row'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(KategoriBarangRequest $request, string $id)
    {
        //
        $response = $this->kategoriBarangService->updateData($id, $request->all());
        if ($response) {
            return response()->json('Berhasil mengubah kategori barang', 201);
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
        $response = $this->kategoriBarangService->deleteData($id);
        if ($response) {
            return response()->json('Berhasil menghapus kategori barang', 201);
        } else {
            return response()->json('Teradi kesalahan server', 500);
        }
    }
}
