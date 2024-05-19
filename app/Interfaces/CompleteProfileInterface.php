<?php

namespace App\Interfaces;

use App\Models\User;

interface CompleteProfileInterface
{
    public function updateData(array $data);
}
