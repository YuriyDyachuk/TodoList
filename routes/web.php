<?php

use App\Http\Controllers\CustomAuthController;
use App\Http\Controllers\TodoListController;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
*/

/* TODO LIST */

Route::middleware('auth.check')->group(function () {

    Route::prefix('todo')->group(function () {
        Route::get('', [TodoListController::class, 'index'])->name('todo');
        Route::get('create', [TodoListController::class, 'create'])->name('todo.new');
        Route::post('', [TodoListController::class, 'store'])->name('todo.store');

        Route::prefix('{id}')->group(function () {
            Route::delete('', [TodoListController::class, 'destroy'])->name('todo.delete');
            Route::get('change-status', [TodoListController::class, 'changeStatus'])->name('todo.change-status');
        });
    });
    Route::get('event', function () {
        event(new \App\Events\TaskEvent());
        return 'ok';
    });
});

/* AUTH */

Route::prefix('login')->group(function () {
    Route::get('', [CustomAuthController::class, 'index'])->name('login');
    Route::post('custom', [CustomAuthController::class, 'customLogin'])->name('login.custom');
});

Route::prefix('registration')->group(function () {
    Route::get('', [CustomAuthController::class, 'registration'])->name('register-user');
    Route::post('custom', [CustomAuthController::class, 'customRegistration'])->name('register.custom');
});

Route::get('signout', [CustomAuthController::class, 'signOut'])->name('signout');