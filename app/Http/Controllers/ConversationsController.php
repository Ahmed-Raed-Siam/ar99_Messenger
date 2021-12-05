<?php

namespace App\Http\Controllers;

use App\Models\Conversation;
use App\Models\User;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class ConversationsController extends Controller
{
    /**
     */
    public function index()
    {
        $user = Auth::user();
//        $user_with_relations = User::where('users.id', '=', $user->id)
//            ->leftJoin('participants', 'users.id', '=', 'participants.user_id')
//            ->leftJoin('conversations', 'participants.conversation_id', '=', 'conversations.id')
//            ->leftJoin('messages', 'conversations.last_message_id', '=', 'messages.id')
//            ->select('*')->get();
        $conversations = $user->conversations()->paginate();
        return response()->json([
//            $user,
//            count($user_with_relations),
//            $user_with_relations,
            $conversations
        ], '200');
    }

    public function show(Conversation $conversation)
    {
        return $conversation->load('participants');
    }

    /**
     * @param Request $request
     * @param Conversation $conversation
     */
    public function add_participant(Request $request, Conversation $conversation)
    {
        $request->validate([
            'user_id' => ['required', 'int', 'exists:users,id']
        ]);

        $new_participant = $request->post('user_id');

        $conversation->participants()->attach($new_participant, [
            'joined_at' => Carbon::now(),
        ]);
    }

    /**
     * @param Request $request
     * @param Conversation $conversation
     */
    public function remove_participant(Request $request, Conversation $conversation)
    {
        $request->validate([
            'user_id' => ['required', 'int', 'exists:users,id']
        ]);

        $participant = $request->post('user_id');

        $conversation->participants()->detach($participant);
    }

}
