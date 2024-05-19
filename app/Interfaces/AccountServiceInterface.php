<?php

namespace App\Interfaces;

use App\Models\User;

interface AccountServiceInterface
{
    public function indexData();
    public function updateData(array $data);
}
