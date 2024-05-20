<?php

namespace App\Interfaces;

interface SatuanBarangInterface
{
    public function datatableData();
    public function storeData(array $data);
    public function updateData(string $barang, array $data);
    public function editData(string $barang);
    public function deleteData(string $id);
}
