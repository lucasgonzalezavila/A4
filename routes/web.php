<?php

use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;
use App\Models\User;
use App\Http\Controllers\GameController;
use App\Http\Controllers\HomeController;
use App\Models\Game;
use App\Http\Controllers\NotesController;
use App\Http\Controllers\SubscriptionController;
use App\Http\Controllers\GamePurchaseController;
use App\Http\Controllers\DashboardController;


Route::get('/', [HomeController::class,'index'])->name('home');

Route::get('/subscription', [SubscriptionController::class, 'index']);
Route::patch('/subscription/{id}', [SubscriptionController::class, 'update'])->name('subscription.update');
Route::post('/subscription/extend', [SubscriptionController::class, 'extend'])->name('subscription.extend');



Route::middleware('auth')->group(function () {
    Route::get('/game/{id}', [GameController::class, 'index'])->name('game.index');
});
    
Route::get('/game/{id}/purchase', [GameController::class, 'purchase'])->name('game.purchase');
Route::delete('/game/{id}', [HomeController::class, 'delete'])->name('delete');
Route::get('/add-game', [GameController::class, 'create'])->name('add-game');
Route::post('/add-game', [GameController::class, 'store'])->name('store-game');

Route::get('/login', [LoginController::class,'index'])->name('login');

Route::get('/dashboard', [DashboardController::class, 'index'])->name('dashboard')
->middleware(['auth', 'verified']);
/*
Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');
*/
Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__.'/auth.php';
