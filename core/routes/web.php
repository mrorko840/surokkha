<?php

use App\Http\Controllers\CardController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\RechargeController;
use App\Http\Controllers\SettingController;
use App\Http\Controllers\UserController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});

//card-verify
Route::get('check-verify/{id?}', [CardController::class, 'check_verify'])->name('card.check.verify');

Route::middleware(['auth', 'verified'])->group(function(){
    Route::get('dashboard', [UserController::class, 'dashboard'])->name('dashboard');
    Route::get('pass_change', [UserController::class, 'pass_change'])->name('pass_change');

    //card
    Route::get('new-card', [CardController::class, 'newCard'])->name('new.card');
    Route::post('new-card-store', [CardController::class, 'newCardStore'])->name('new.card.store');
    Route::get('print-details/{id?}', [CardController::class, 'printDetails'])->name('card.print.details');


    //recharge
    Route::get('recharge', [RechargeController::class, 'recharge'])->name('recharge');
    Route::post('recharge', [RechargeController::class, 'newRecharge'])->name('new.recharge');
    Route::get('get-recharge-history', [RechargeController::class, 'getRechargeHistory'])->name('get.recharge.history');

    /**************
     * admin section
     **************/

     Route::middleware('checkAdmin')->group(function(){
         //control
         Route::get('control', [SettingController::class, 'control'])->name('control');
         Route::post('control', [SettingController::class, 'controlUpdate'])->name('control.update');

         //recharge
         Route::get('recharge-notify', [SettingController::class, 'rechargeNotify'])->name('recharge.notify');
         Route::get('pending-recharge', [SettingController::class, 'pendingRecharge'])->name('pending.recharge');
         Route::post('accpet-recharge', [SettingController::class, 'accpetRecharge'])->name('accpet.recharge');
         Route::post('cancel-recharge', [SettingController::class, 'cancelRecharge'])->name('cancel.recharge');
     });

});

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__.'/auth.php';
