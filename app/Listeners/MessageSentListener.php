<?php

namespace App\Listeners;

use App\Events\MessageSent;

class MessageSentListener
{
    public function handle(MessageSent $event)
    {
        // In ra màn hình
        echo 'API message đã được gửi thành công!';
    }
}
