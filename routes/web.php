<?php

// use App\Http\Livewire\Ticket;

use App\Http\Controllers\TicketController;
// use App\Http\Livewire\Ticket\Create;
use App\Http\Livewire\Users\Index as UsersIndex;
use App\Http\Livewire\Tickets\Index;
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

Route::get('/', function () {
    return view('welcome');
});

Route::middleware(['auth:sanctum', 'verified'])->get('/dashboard', function () {
    return view('dashboard');
})->name('dashboard');

Route::group(['middleware' => ['auth']], function () {
    Route::get('tickets', Index::class)->name('tickets');

    Route::group(['middleware' => 'auth.manage-users'], function () {
        Route::get('users', UsersIndex::class)->name('users');
    });
});

Route::post('ticket', [TicketController::class, 'store'])->name('ticket');
