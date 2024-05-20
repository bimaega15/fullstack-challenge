<?php

namespace App\Services;

use App\Interfaces\BarangInterface;
use App\Models\Barang;
use Yajra\DataTables\Facades\DataTables;

class BarangService implements BarangInterface
{
    public function datatableData()
    {
        $data = Barang::query()->with('kategoriBarang');
        return DataTables::eloquent($data)
            ->addColumn('action', function ($row) {
                $buttonUpdate = '
                    <a class="btn btn-warning btn-edit btn-sm" 
                    data-typemodal="mediumModal"
                    data-urlcreate="' . url('barang/' . $row->id . '/edit') . '"
                    >
                        <i class="fa-solid fa-pencil"></i>
                    </a>
                    ';
                $buttonDelete = '
                    <button type="button" class="btn-delete btn btn-danger btn-sm" data-url="' . url('barang/' . $row->id) . '?_method=delete">
                        <i class="fa-solid fa-trash"></i>
                    </button>
                    ';

                $button = '
                <div class="text-center">
                    ' . $buttonUpdate . '
                    ' . $buttonDelete . '
                </div>
                ';
                return $button;
            })
            ->rawColumns(['action'])
            ->toJson();
    }

    public function storeData(array $data)
    {
        try {
            $result = Barang::create($data);
            return $result;
        } catch (\Throwable $th) {
            \Log::error('Error : ' . $th->getMessage());
            return false;
        }
    }

    public function editData(string $id)
    {
        try {
            $result = Barang::with('kategoriBarang')->find($id);
            return $result;
        } catch (\Throwable $th) {
            \Log::error('Error : ' . $th->getMessage());
            return false;
        }
    }

    public function updateData(string $id, array $data)
    {
        try {
            unset($data['_method']);
            $result = Barang::find($id)->update($data);
            return $result;
        } catch (\Throwable $th) {
            \Log::error('Error : ' . $th->getMessage());
            return false;
        }
    }

    public function deleteData(string $id)
    {
        try {
            $result = Barang::destroy($id);
            return $result;
        } catch (\Throwable $th) {
            \Log::error('Error : ' . $th->getMessage());
            return false;
        }
    }
}
