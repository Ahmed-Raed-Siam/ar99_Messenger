<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Support\Facades\Auth;

class MessengerController extends Controller
{
    /**
     * @return Response
     */
    public function index($id = null): Response
    {
        $current_user = Auth::user();
        $current_user_id = $current_user->id;
        $friends = User::where('id', '<>', $current_user_id)
            ->orderBy('name')
            ->paginate();

//        $chats = $current_user->conversations()->paginate();

        /* Or */
//        $chats = $current_user->with(['conversations'])
//            ->where('id', '=', $current_user_id)
//            ->get();

        /* Or */
        $chats = $current_user->conversations()->with(['last_message',
            'participants' =>
                function ($builder) use ($current_user_id) {
                    $builder->where('id', '<>', $current_user_id);
                }])
            ->get();

        $messages = [];
        $active_chat = null;
        $participant = null;
        if ($id):
            $active_chat = $chats->where('id', '=', $id)->first();
            /*Check if user id has a chats and messages*/
            if (empty($active_chat) || $active_chat === null):
                $messages = null;
                if (count(User::where('id', '=', $id)->get()) > 0):
                    $participant = User::where('id', '=', $id)->first();
                endif;
            else:
                $messages = $active_chat->messages()->with('user')->paginate();
            endif;
/*            dd(
                $current_user,
                $current_user_id,
                //            $friends,
                '$id',
                $id,
                $chats,
                $active_chat,
                'Count',
                empty($active_chat),
                $participant,
                empty($participant),
            //                $active_chat->messages()->get(),
            );*/
        endif;

        /*        $user_with_relations = User::where('id', $current_user_id)
                    ->leftJoin('participants', 'users.id', '=', 'participants.user_id')
        //            ->leftJoin('conversations', 'participants.conversation_id', '=', 'conversations.id')
                    ->select('*')->first();*/

///*        dd(
//            $current_user,
//            $current_user_id,
////            $friends,
//            '$id',
//            $id,
//            $chats,
//            $active_chat,
//        );*/

        return response()->view('messenger', [
            'friends' => $friends,
            'chats' => $chats,
            'active_chat' => $active_chat,
            'messages' => $messages,
            'participant' => $participant,
        ]);
    }
}
