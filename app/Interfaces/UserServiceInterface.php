<?php

namespace App\Interfaces;

use App\Models\User;

interface UserServiceInterface
{
    public function storeData(array $data);
    
    public function verifyEmail(string $token);
    public function getToken(string $token);
}
