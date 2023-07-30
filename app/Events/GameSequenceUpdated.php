<?php

namespace App\Events;

use Illuminate\Broadcasting\Channel;
use Illuminate\Contracts\Broadcasting\ShouldBroadcast;
use Illuminate\Foundation\Events\Dispatchable;
use Illuminate\Queue\SerializesModels;

class GameSequenceUpdated implements ShouldBroadcast
{
    use Dispatchable, SerializesModels;

    public $gameSequence;

    /**
     * Create a new event instance.
     *
     * @param array $gameSequence
     * @return void
     */
    public function __construct($gameSequence)
    {
        $this->gameSequence = $gameSequence;
    }

    /**
     * Get the channels the event should broadcast on.
     *
     * @return \Illuminate\Broadcasting\Channel|array
     */
    public function broadcastOn()
    {
        return new Channel('game-sequence');
    }
}
