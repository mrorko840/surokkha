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
Route::get('check-verify/{txt?}', [CardController::class, 'check_verify'])->name('card.check.verify');

Route::middleware(['auth', 'verified'])->group(function(){
    Route::get('dashboard', [UserController::class, 'dashboard'])->name('dashboard');
    Route::get('pass_change', [UserController::class, 'pass_change'])->name('pass_change');

    //card
    Route::get('new-card', [CardController::class, 'newCard'])->name('new.card');
    Route::post('new-card-store', [CardController::class, 'newCardStore'])->name('new.card.store');
    Route::get('card-edit/{id}', [CardController::class, 'cardEdit'])->name('card.edit');
    Route::post('card-update/{id}', [CardController::class, 'cardUpdate'])->name('card.update');
    Route::get('delete-card/{id?}', [CardController::class, 'deleteCard'])->name('delete.card');
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

        //card
        Route::get('all-cards', [CardController::class, 'allCards'])->name('all.cards');

        //allUsers
        Route::get('all-users', [UserController::class, 'allUsers'])->name('all.users');
        Route::get('delete-user/{id}', [UserController::class, 'deleteUser'])->name('delete.user');
        Route::post('add-balance', [SettingController::class, 'addBalance'])->name('add.balance');
        Route::post('set-cost', [SettingController::class, 'setCost'])->name('set.cost');
        Route::post('set-cost-all', [SettingController::class, 'setCostAll'])->name('set.cost.all');

     });

});

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__.'/auth.php';
