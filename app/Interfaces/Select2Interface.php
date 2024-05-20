<?php

namespace App\Interfaces;

use Illuminate\Http\Request;

interface Select2Interface
{
    public function kategoriBarang(Request $request);
    public function barang(Request $request);
}
