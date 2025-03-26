<?php

namespace App\Http\Controllers\Api;

use App\Events\FriendRequestSent;
use App\Events\FriendRequestAccepted;
use App\Http\Controllers\Controller;
use App\Models\Friendship;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class FriendshipController extends Controller
{
    //
    function sendFriendRequest(Request $request) {
        $user = Auth::user();
        $friendship = Friendship::create([
            'user_id' => $user->id,
            'friend_id' => $request->friend_id,
            'status' => 'pending'
        ]);
        broadcast(new FriendRequestSent($friendship))->toOthers();
    }
    public function acceptFriendRequest(Friendship $friendship)
    {
        $friendship->update(['status' => 'accepted']);
        
        // 广播接受通知
        broadcast(new FriendRequestAccepted($friendship))->toOthers();
    }
}
