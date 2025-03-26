<?php

use App\Broadcasting\BulletinBoardChannel;
use Illuminate\Support\Facades\Broadcast;
use App\Models\User;

Broadcast::channel('User.{id}', function (User $user, int $id) {
    return (int) $user->id === (int) $id;
});

Broadcast::channel('BulletinBoard.{id}', BulletinBoardChannel::class);
