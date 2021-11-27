<?php

namespace App\Http\Controllers\API;

use App\Events\messageCreated;
use App\Http\Controllers\Controller;
use App\Models\Conversation;
use App\Models\Recipient;
use Illuminate\Database\Console\Migrations\RollbackCommand;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Http\JsonResponse;
use Illuminate\Support\Facades\Response;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Validation\Rule;
use Throwable;

class MessagesController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @param int $id
     * @return Response
     */
    public function index(int $id): Response
    {
        $user = Auth::guard('sanctum')->user();
        $conversation = $user->conversations()->findOrfail($id);
        return $conversation->messages()->paginate();
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param Request $request
     * @return JsonResponse
     */
    public function store(Request $request): JsonResponse
    {
        $sender = Auth::guard('sanctum')->user();

        $request->validate([
            'message' => ['required', 'string'],
            'conversation_id' => [
                Rule::requiredIf(function () use ($request) {
                    return !$request->input('user_id');
                }),
                'int',
                'exists:conversations,id',
            ],
            'user_id' => [
                Rule::requiredIf(function () use ($request) {
                    return !$request->input('conversation_id');
                }),
                'int',
                'exists:users,id',
            ],
        ]);

        $conversation_id = $request->post('conversation_id');
        $user_id = $request->post('user_id');

        DB::beginTransaction();
        try {
            if ($conversation_id):
                $conversation = $sender
                    ->conversations()->findOrfail($conversation_id);
            else:
                $conversation = Conversation::where('type', '=', 'peer')
                    ->whereHas('participants', function (Builder $builder) use ($sender, $user_id) {
                        $builder->join('participants as participants2', 'participants2.conversation_id', '=', 'participants.conversation_id')
                            ->where('participants.user_id', '=', $user_id)
                            ->where('participants2.user_id', '=', $sender->id);
                    })->first();
                if (!$conversation):
                    $conversation = Conversation::create([
                        'user_id' => $user_id,
                        'type' => 'peer',
                    ]);

                    $conversation->participants()->attach([
//                        $sender->id, $user_id,
                        // OR
                        $sender->id => ['joined_at' => now()],
                        $user_id => ['joined_at' => now()],
                    ]);

                endif;
            endif;

            $message = $conversation->messages()->create([
                'user_id' => $sender->id,
                'body' => $request->post('message'),
            ]);

            DB::statement('INSERT INTO recipients (user_id,message_id)
            select user_id, ? from participants
            where conversation_id= ?', [$message->id, $conversation->id]);
            $conversation->update([
                'last_message_id' => $message->id,
            ]);

            DB::commit();

//            event(new messageCreated($message));
            //Or
            broadcast(new messageCreated($message));

        } catch (Throwable $exception) {
            Db::rollBack();
            throw $exception;
        }

        return Response::json([
            'alert' => 'You send message to user ' . $user_id,
            'message' => $message,
        ], 200);

    }

    /**
     * Display the specified resource.
     *
     * @param int $id
     * @return Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param Request $request
     * @param int $id
     * @return Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param int $id
     * @return JsonResponse
     */
    public function destroy(int $id): JsonResponse
    {
        $user_id = Auth::id();
        Recipient::where([
            'user_id' => $user_id,
            'message_id' => $id,
        ])->delete();

        return Response::json([
            'message' => 'You delete message',
        ], 200);
    }
}
