<?php

namespace App\Interfaces;

use App\Models\Barang;

interface BarangInterface
{
    public function datatableData();
    public function storeData(array $data);
    public function updateData(Barang $barang, array $data);
    public function deleteData(Barang $id);
}
