<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\FollowUpController;
use App\Events\MyEvent;
/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/', function () {
    return view('home');
});

//Auth::routes();
// Route::get('/register', function () {
//     return redirect('/login');
// });

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

Route::get('/followup', [App\Http\Controllers\HomeController::class, 'index'])->name('followup');

// Route::get('followup', function () {
//     return view('followup');
// });

Route::post('followup', [FollowUpController::class, 'store'])->name('followup.store');


Route::get('/trigger-event', function () {
    event(new MyEvent('hello world'));
    return 'Event has been sent!';
});


Route::get('/clear-cache', [HomeController::class, 'clearCache'])->name('clear-cache');
