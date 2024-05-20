<?php

namespace App\Interfaces;

interface KategoriBarangInterface
{
    public function datatableData();
    public function storeData(array $data);
    public function updateData(string $kategoriBarang, array $data);
    public function editData(string $kategoriBarang);
    public function deleteData(string $id);
}
