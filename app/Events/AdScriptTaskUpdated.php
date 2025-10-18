<?php

namespace App\Events;

use App\Models\AdScriptTask;
use Illuminate\Broadcasting\Channel;
use Illuminate\Broadcasting\InteractsWithSockets;
use Illuminate\Contracts\Broadcasting\ShouldBroadcast;
use Illuminate\Queue\SerializesModels;

class AdScriptTaskUpdated implements ShouldBroadcast
{
    use InteractsWithSockets, SerializesModels;

    public AdScriptTask $task;

    public function __construct(AdScriptTask $task)
    {
        $this->task = $task;
    }

    public function broadcastOn(): array
    {
        return [new Channel('ad-script-tasks')];
    }

    public function broadcastAs(): string
    {
        return 'AdScriptTaskUpdated';
    }
}
