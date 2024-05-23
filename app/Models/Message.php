<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Message extends Model
{
    use HasFactory;
    protected $table = 'message';
    protected $guarded = [];
    public $timestamps = true;

    public function chatRoom()
    {
        return $this->belongsTo(ChatRoom::class, 'chat_room_id', 'id');
    }

    public function userChat()
    {
        return $this->belongsTo(UserChat::class, 'user_chat_id', 'id');
    }
}
