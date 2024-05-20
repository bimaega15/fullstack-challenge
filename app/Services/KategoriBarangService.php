<?php

namespace App\Services;

use App\Interfaces\KategoriBarangInterface;
use App\Models\KategoriBarang;
use Yajra\DataTables\Facades\DataTables;

class KategoriBarangService implements KategoriBarangInterface
{
    public function datatableData()
    {
        $data = KategoriBarang::query();
        return DataTables::eloquent($data)
            ->addColumn('action', function ($row) {
                $buttonUpdate = '
                    <a class="btn btn-warning btn-edit btn-sm" 
                    data-typemodal="mediumModal"
                    data-urlcreate="' . url('kategoriBarang/' . $row->id . '/edit') . '"
                    >
                        <i class="fa-solid fa-pencil"></i>
                    </a>
                    ';
                $buttonDelete = '
                    <button type="button" class="btn-delete btn btn-danger btn-sm" data-url="' . url('kategoriBarang/' . $row->id) . '?_method=delete">
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
            $result = KategoriBarang::create($data);
            return $result;
        } catch (\Throwable $th) {
            \Log::error('Error : ' . $th->getMessage());
            return false;
        }
    }

    public function editData(string $id)
    {
        try {
            $result = KategoriBarang::find($id);
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
            $result = KategoriBarang::find($id)->update($data);
            return $result;
        } catch (\Throwable $th) {
            \Log::error('Error : ' . $th->getMessage());
            return false;
        }
    }

    public function deleteData(string $id)
    {
        try {
            $result = KategoriBarang::destroy($id);
            return $result;
        } catch (\Throwable $th) {
            \Log::error('Error : ' . $th->getMessage());
            return false;
        }
    }
}
