<?php

namespace App\Interfaces\Api;

use Illuminate\Http\Request;

interface MessageAppInterface
{
    public function indexData(string $id);
    public function storeData(Request $request);
}
