<?php

namespace App\Http\Controllers;

use BeyondCode\LaravelWebSockets\Facades\WebSocketsRouter;
use Illuminate\Http\Request;

class WebSocketController extends Controller
{
    public function handleWebSocketRequest(Request $request)
    {
        // Tạo kênh
        $channel = WebSocketsRouter::createChannel('my-channel');

        // Đăng ký sự kiện trên kênh
        $channel->on('my-event', function ($data) {
            echo $data;
        });

        // Gửi sự kiện đến kênh
        $channel->broadcast('my-event', 'Hello world!');

        // Xem danh sách các kênh đang hoạt động
        $activeChannels = WebSocketsRouter::getChannels();

        // Xử lý các thao tác khác nếu cần

        return response()->json([
            'message' => 'WebSocket request handled successfully.',
            'active_channels' => $activeChannels,
        ]);
    }
}
