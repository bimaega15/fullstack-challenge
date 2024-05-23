<?php

use App\Http\Controllers\Api\ChatRoomController;
use App\Http\Controllers\Api\MessageController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

Route::get('/user', function (Request $request) {
    return $request->user();
})->middleware('auth:sanctum');

Route::get('chat-rooms', [ChatRoomController::class, 'index']);
Route::post('chat-rooms/store', [ChatRoomController::class, 'store']);

Route::get('messages/{chatRoom}', [MessageController::class, 'index']);
Route::post('messages/{chatRoom}/store', [MessageController::class, 'store']);
