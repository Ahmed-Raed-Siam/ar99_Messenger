<?php

namespace App\Events;

use App\Models\Message;
use Illuminate\Broadcasting\Channel;
use Illuminate\Broadcasting\InteractsWithSockets;
use Illuminate\Broadcasting\PresenceChannel;
use Illuminate\Broadcasting\PrivateChannel;
use Illuminate\Contracts\Broadcasting\ShouldBroadcast;
use Illuminate\Foundation\Events\Dispatchable;
use Illuminate\Queue\SerializesModels;
use Illuminate\Support\Facades\Auth;

class messageCreated implements ShouldBroadcast
{
    use Dispatchable, InteractsWithSockets, SerializesModels;

    /**
     * @var
     */
    public $message;

    /**
     * Create a new event instance.
     * @param Message $message
     */
    public function __construct(Message $message)
    {
        $this->message = $message;
    }

    /**
     * Get the channels the event should broadcast on.
     *
     * @return \Illuminate\Broadcasting\Channel|array
     */
    public function broadcastOn()
    {
        $auth_user_sender = Auth::user();
        // Or from message
        $auth_user_sender_id = $this->message->user_id;
        $recipient = $this->message->conversation->participants()
            ->where('user_id', '<>', $auth_user_sender->id)
            // Or
//            ->where('user_id', '<>', $auth_user_sender_id)
            ->first();
        return new PresenceChannel('Messenger.' . $recipient->id);
    }
}
