<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ChatRoom extends Model
{
    use HasFactory;
    protected $table = 'chat_room';
    protected $guarded = [];
    public $timestamps = true;

    public function message()
    {
        return $this->hasMany(Message::class, 'chat_room_id', 'id');
    }
}
