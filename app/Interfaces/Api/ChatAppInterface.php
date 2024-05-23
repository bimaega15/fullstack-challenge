<?php

namespace App\Interfaces\Api;

use Illuminate\Http\Request;

interface ChatAppInterface
{
    public function indexData();
    public function storeData(Request $request);
}
