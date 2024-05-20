<?php

namespace App\Services;

use App\Interfaces\Select2Interface;
use App\Models\Barang;
use App\Models\KategoriBarang;
use Illuminate\Http\Request;

class Select2Service implements Select2Interface
{
    public function kategoriBarang(Request $request)
    {
        try {
            $search = $request->input('search');
            $page = $request->input('page');
            $getKBarang = KategoriBarang::query();
            if ($search != '') {
                $getKBarang->where('nama_kbarang', 'like', '%' . $search . '%');
            }
            $getKBarang = $getKBarang->paginate(10, ['*'], 'page', $page);

            $output = [];
            $output[] = [
                'id' => '-',
                'text' => 'Pilih Semua',
            ];
            foreach ($getKBarang as $key => $item) {
                $output[] = [
                    'id' => $item->id,
                    'text' => $item->nama_kbarang,
                ];
            }

            // count filtered
            $countFiltered = KategoriBarang::query();
            if ($search != '') {
                $countFiltered->where('nama_kbarang', 'like', '%' . $search . '%');
            }
            $countFiltered = $countFiltered->count();

            return [
                'results' => $output,
                'count_filtered' => $countFiltered,
            ];
        } catch (\Throwable $th) {
            \Log::error('Error : ' . $th->getMessage());
            return false;
        }
    }

    public function barang(Request $request)
    {
        try {
            $search = $request->input('search');
            $page = $request->input('page');
            $getKBarang = Barang::query();
            if ($search != '') {
                $getKBarang->where('nama_barang', 'like', '%' . $search . '%');
            }
            $getKBarang = $getKBarang->paginate(10, ['*'], 'page', $page);

            $output = [];
            $output[] = [
                'id' => '-',
                'text' => 'Pilih Semua',
            ];
            foreach ($getKBarang as $key => $item) {
                $output[] = [
                    'id' => $item->id,
                    'text' => $item->nama_barang,
                ];
            }

            // count filtered
            $countFiltered = Barang::query();
            if ($search != '') {
                $countFiltered->where('nama_barang', 'like', '%' . $search . '%');
            }
            $countFiltered = $countFiltered->count();

            return [
                'results' => $output,
                'count_filtered' => $countFiltered,
            ];
        } catch (\Throwable $th) {
            \Log::error('Error : ' . $th->getMessage());
            return false;
        }
    }
}
