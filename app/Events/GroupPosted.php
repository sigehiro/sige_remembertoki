<?php

namespace App\Events;

use App\GroupChatMessage;
use Illuminate\Broadcasting\Channel;
use Illuminate\Queue\SerializesModels;
use Illuminate\Broadcasting\PrivateChannel;
use Illuminate\Broadcasting\PresenceChannel;
use Illuminate\Foundation\Events\Dispatchable;
use Illuminate\Broadcasting\InteractsWithSockets;
use Illuminate\Contracts\Broadcasting\ShouldBroadcast;

class GroupPosted implements ShouldBroadcast
{
    use SerializesModels;

    public $post;

    public function __construct(GroupChatMessage $post)
    {
        $this->post = $post;
    }

    public function broadcastOn()
    {
        return new Channel('post');
    }
}
