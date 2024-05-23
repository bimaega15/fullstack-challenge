<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Services\Api\MessageAppService;
use Illuminate\Http\Request;

class MessageController extends Controller
{
    //
    public $messageAppService;
    public function __construct(MessageAppService $messageAppService)
    {
        $this->messageAppService = $messageAppService;
    }
    public function index($id)
    {
        $response = $this->messageAppService->indexData($id);
        if ($response) {
            return response()->json($response, 200);
        } else {
            return response()->json('Terjadi kesalahan server', 500);
        }
    }

    public function store(Request $request)
    {
        $response = $this->messageAppService->storeData($request);
        if ($response) {
            return response()->json($response, 201);
        } else {
            return response()->json('Terjadi kesalahan server', 500);
        }
    }
}
