<?php

namespace App\Events;

use Illuminate\Broadcasting\Channel;
use Illuminate\Contracts\Broadcasting\ShouldBroadcastNow;
use Illuminate\Queue\SerializesModels;

class MessageSent implements ShouldBroadcastNow
{
    use SerializesModels;

    public function __construct()
    {
        // ...
    }

    public function broadcastOn()
    {
        return new Channel('message');
    }

    public function broadcastAs()
    {
        return 'message.sent';
    }
}
