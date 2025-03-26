<?php

namespace App\Http\Controllers\Api;

use Illuminate\Support\Facades\Auth;
use App\Events\MessageSent;
use App\Http\Controllers\Controller;
use App\Models\Message;
use Illuminate\Http\Request;

class MessageController extends Controller
{
    //
    public function sendMessage(Request $request)
    {
        $message = Message::create([
            'sender_id' => Auth::user()->id,
            'recipient_id' => $request->recipientId,
            'content' => $request->content,
            'type' => $request->type,
        ]);

        $message->load('sender', 'recipient');

        // 廣播消息
        
        MessageSent::dispatch($message);
        // broadcast(new MessageSent($message, Auth::user()));

        return response()->json($message, 201);
    }
}
