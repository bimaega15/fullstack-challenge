<?php

namespace App\Services\Api;

use App\Interfaces\Api\ChatAppInterface;
use App\Models\ChatRoom;
use Illuminate\Http\Request;

class ChatAppService implements ChatAppInterface
{
    public function indexData()
    {
        try {
            $chatRooms = ChatRoom::with(['message' => function ($query) {
                $query->orderBy('created_at', 'desc')->limit(1);
                $query->with('userChat');
            }])->get();
            return $chatRooms;
        } catch (\Throwable $th) {
            \Log::error('Error : ' . $th->getMessage());
            return false;
        }
    }

    public function storeData(Request $request)
    {
        try {
            $chatRoom = ChatRoom::create([
                'name_chatroom' => $request->input('name')
            ]);
            return $chatRoom;
        } catch (\Throwable $th) {
            \Log::error('Error : ' . $th->getMessage());
            return false;
        }
    }
}
