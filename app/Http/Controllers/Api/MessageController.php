<?php

namespace App\Http\Controllers\Api;

use Illuminate\Support\Facades\Auth;
use App\Events\MessageSent;
use App\Http\Controllers\Controller;
use App\Models\Message;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class MessageController extends Controller
{
    //
    public function sendMessage(Request $request)
    {
        DB::beginTransaction();
        $message = Message::create([
            'sender_id' => 1,
            'recipient_id' => 1,
            'content' => $request->content,
            'type' => $request->type,
        ]);
        
        $message->load('sender', 'recipient');
        // 廣播消息
        
        MessageSent::dispatch($message);
        DB::commit();
        // broadcast(new MessageSent($message, Auth::user()))->toOthers();

        return response()->json($message, 201);
    }
}
