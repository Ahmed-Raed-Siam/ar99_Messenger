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
use Illuminate\Support\Facades\Response;

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
     * @return array|Channel|\Illuminate\Http\JsonResponse
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
        if ($recipient === null):
//            die("message :You Can not send message to you self!");
            die(json_encode([
                'message' => 'You Can not send message to your self!',
            ], 200));
        endif;

        return new PresenceChannel('Messenger.' . $recipient->id);

    }
}
