<?php

namespace App\Events;

use App\Models\Personaje;
use Illuminate\Broadcasting\Channel;
use Illuminate\Broadcasting\InteractsWithSockets;
use Illuminate\Broadcasting\PresenceChannel;
use Illuminate\Broadcasting\PrivateChannel;
use Illuminate\Contracts\Broadcasting\ShouldBroadcast;
use Illuminate\Foundation\Events\Dispatchable;
use Illuminate\Queue\SerializesModels;

class personajeActualizado implements ShouldBroadcast
{
    use Dispatchable, InteractsWithSockets, SerializesModels;


    public $personaje;
    /**
     * Create a new event instance.
     */
    public function __construct(Personaje $personaje)
    {
        $this->personaje = $personaje;

    }

    /**
     * Get the channels the event should broadcast on.
     *
     * @return array<int, \Illuminate\Broadcasting\Channel>
     */
    public function broadcastOn(): array
    {

        return [
            new PrivateChannel('actualizacionPj'),
        ];
    }
}
