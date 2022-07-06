<?php

namespace App\Events;

use Illuminate\Broadcasting\Channel;
use Illuminate\Broadcasting\InteractsWithSockets;
use Illuminate\Broadcasting\PresenceChannel;
use Illuminate\Broadcasting\PrivateChannel;
use Illuminate\Contracts\Broadcasting\ShouldBroadcast;
use Illuminate\Foundation\Events\Dispatchable;
use Illuminate\Queue\SerializesModels;

class NotiEvent implements ShouldBroadcast
{
    use Dispatchable, InteractsWithSockets, SerializesModels;

    public $noti;

    public function __construct($noti)
    {
        $this->noti = $noti;
    }

    public function broadcastOn()
    {
        return new Channel('noti');
    }
    public function broadcastWith()
    {
        return [
            'noti' => $this->noti,
        ];
    }
}
