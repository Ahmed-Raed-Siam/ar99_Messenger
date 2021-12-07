<?php

use App\Http\Controllers\MessengerController;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

//Route::get('/{$id?}', function () {
////    return view('welcome');
//})->middleware(['auth']);

Route::middleware(['auth'])->group(function () {
//    Route::view('home', 'home')->name('home');
    Route::get('/', [MessengerController::class, 'index'])->name('messenger');
    Route::get('conversations/{id}', [MessengerController::class, 'index'])->name('messenger.chat');
    Route::get('conversations/{participant}', [MessengerController::class, 'index'])->name('messenger.new.chat');
});

//Route::get('/dashboard', function () {
//    return view('dashboard');
//})->middleware(['auth'])->name('dashboard');
//
require __DIR__.'/auth.php';
