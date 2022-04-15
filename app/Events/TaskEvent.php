<?php

declare(strict_types=1);

namespace App\Events;

use Illuminate\Broadcasting\Channel;
use Illuminate\Queue\SerializesModels;
use Illuminate\Broadcasting\PrivateChannel;
use Illuminate\Broadcasting\PresenceChannel;
use Illuminate\Foundation\Events\Dispatchable;
use Illuminate\Broadcasting\InteractsWithSockets;
use Illuminate\Contracts\Broadcasting\ShouldBroadcast;

class TaskEvent implements ShouldBroadcast
{
    use Dispatchable, InteractsWithSockets, SerializesModels;

    public function broadcastOn(): \Illuminate\Broadcasting\Channel
    {
        return new Channel('task');
    }

    public function broadcastAs(): string
    {
        return 'MessageEvent';
    }

    public function broadcastWith(): array
    {
        return ['message' => 'This task status change successfully.'];
    }
}
