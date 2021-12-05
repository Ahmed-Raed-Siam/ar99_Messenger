<?php

use App\Http\Controllers\API\AuthTokensController;
use App\Http\Controllers\API\MessagesController;
use App\Http\Controllers\ConversationsController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});

//Register Token For user if user - password exists
Route::middleware('guest:sanctum')->post('auth/tokens', [AuthTokensController::class, 'store']);

Route::middleware('auth:sanctum')->group(function () {
    Route::get('auth/tokens', [AuthTokensController::class, 'index']);
    Route::delete('auth/tokens/logout', [AuthTokensController::class, 'current_logout']);
    Route::delete('auth/tokens/{id}', [AuthTokensController::class, 'destroy']);
    Route::delete('auth/tokens/', [AuthTokensController::class, 'logout_all']);

    // Conversations Controller
    Route::get('conversations', [ConversationsController::class, 'index']);
    Route::get('conversations/{conversation}', [ConversationsController::class, 'show']);
    Route::post('conversations/{conversation}/participants', [ConversationsController::class, 'add_participant']);
    Route::delete('conversations/{conversation}/participants', [ConversationsController::class, 'remove_participant']);
    // Messages Controller
    Route::get('conversations/{id}/messages', [MessagesController::class, 'index']);
    Route::post('messages', [MessagesController::class, 'store'])->name('api.messages.store');
    Route::delete('messages/{id}', [MessagesController::class, 'destroy']);
});
