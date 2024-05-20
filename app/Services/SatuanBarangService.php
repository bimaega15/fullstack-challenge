<?php

namespace App\Services;

use App\Interfaces\SatuanBarangInterface;
use App\Models\SatuanBarang;
use Yajra\DataTables\Facades\DataTables;

class SatuanBarangService implements SatuanBarangInterface
{
    public function datatableData()
    {
        $data = SatuanBarang::query()->with('barang');
        return DataTables::eloquent($data)
            ->addColumn('barang.nama_barang', function ($row) {
                return '<a href="#" class="text-primary btn-change-status" 
                data-typemodal="mediumModal"
                data-urlcreate="' . url('satuanBarang/' . $row->id . '/changeStatus') . '"
                >
                ' . $row->barang->nama_barang . '
                </a>';
            })
            ->addColumn('action', function ($row) {
                $buttonUpdate = '
                    <a class="btn btn-warning btn-edit btn-sm" 
                    data-typemodal="mediumModal"
                    data-urlcreate="' . url('satuanBarang/' . $row->id . '/edit') . '"
                    >
                        <i class="fa-solid fa-pencil"></i>
                    </a>
                    ';
                $buttonDelete = '
                    <button type="button" class="btn-delete btn btn-danger btn-sm" data-url="' . url('satuanBarang/' . $row->id) . '?_method=delete">
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
            ->rawColumns(['action', 'barang.nama_barang'])
            ->toJson();
    }

    public function storeData(array $data)
    {
        try {
            $result = SatuanBarang::create($data);
            return $result;
        } catch (\Throwable $th) {
            \Log::error('Error : ' . $th->getMessage());
            return false;
        }
    }

    public function editData(string $id)
    {
        try {
            $result = SatuanBarang::with('barang')->find($id);
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
            $result = SatuanBarang::find($id)->update($data);
            return $result;
        } catch (\Throwable $th) {
            \Log::error('Error : ' . $th->getMessage());
            return false;
        }
    }

    public function deleteData(string $id)
    {
        try {
            $result = SatuanBarang::destroy($id);
            return $result;
        } catch (\Throwable $th) {
            \Log::error('Error : ' . $th->getMessage());
            return false;
        }
    }
}
