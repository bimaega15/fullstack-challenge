<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class UserChat extends Model
{
    use HasFactory;
    protected $table = 'user_chat';
    protected $guarded = [];
    public $timestamps = true;

    public function message()
    {
        return $this->hasMany(Message::class, 'user_chat_id', 'id');
    }
}
