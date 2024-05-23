<?php

namespace App\Services\Api;

use App\Interfaces\Api\MessageAppInterface;
use App\Models\ChatRoom;
use App\Models\Message;
use App\Models\UserChat;
use Illuminate\Http\Request;

class MessageAppService implements MessageAppInterface
{
    public function indexData($id)
    {
        try {
            $chatRoom = ChatRoom::find($id)->message()->with('userChat')->get();
            return $chatRoom;
        } catch (\Throwable $th) {
            \Log::error('Error : ' . $th->getMessage());
            return false;
        }
    }

    public function storeData(Request $request)
    {
        try {
            $username = $request->input('username');
            $messageText = $request->input('message');
            $room = $request->input('room');

            $getUserChat = UserChat::where('username_userchat', $username)->first();

            if (!$getUserChat) {
                $getUserChat = UserChat::create([
                    'username_userchat' => $username,
                ]);
            }

            $message = Message::create([
                'user_chat_id' => $getUserChat->id,
                'chat_room_id' => $room,
                'message' => $messageText,
            ]);

            $mesageCreate = Message::with(['userChat'])->find($message->id);
            return $mesageCreate;
        } catch (\Throwable $th) {
            \Log::error('Error : ' . $th->getMessage());
            return false;
        }
    }
}
