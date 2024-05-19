<?php

namespace App\Interfaces;

use App\Models\KategoriBarang;

interface KategoriBarangInterface
{
    public function datatableData();
    public function storeData(array $data);
    public function updateData(KategoriBarang $kategoriBarang, array $data);
    public function deleteData(KategoriBarang $id);
}
