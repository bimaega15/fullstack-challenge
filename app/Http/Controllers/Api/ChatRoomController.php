<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Services\Api\ChatAppService;
use Illuminate\Http\Request;

class ChatRoomController extends Controller
{
    public $chatAppService;
    public function __construct(ChatAppService $chatAppService)
    {
        $this->chatAppService = $chatAppService;
    }
    public function index()
    {
        $response = $this->chatAppService->indexData();
        if ($response) {
            return response()->json($response, 200);
        } else {
            return response()->json('Terjadi kesalahan server', 500);
        }
    }

    public function store(Request $request)
    {
        $response = $this->chatAppService->storeData($request);
        if ($response) {
            return response()->json($response, 201);
        } else {
            return response()->json('Terjadi kesalahan server', 500);
        }
    }
}
