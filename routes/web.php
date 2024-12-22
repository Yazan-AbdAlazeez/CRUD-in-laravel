<?php

use App\Http\Controllers\PostController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\AuthController;

use Illuminate\Support\Facades\Route;


// Route::resource('posts', PostController::class);


Route::middleware("guest")->group(function () {
    Route::get('/login', [AuthController::class, 'showLoginForm'])->name('login');
    Route::post('/login', [AuthController::class, 'login']);
});

Route::middleware("auth")->group(function () {
    Route::get('/', [PostController::class, "index"])->name("posts.index");
    Route::get('/create', [PostController::class, "create"])->name("posts.create");
    Route::post('/store', [PostController::class, "store"])->name("posts.store");
    Route::get('/edit/{post}', [PostController::class, "edit"])->name("posts.edit");
    Route::put('/update/{post}', [PostController::class, "update"])->name("posts.update");
    Route::delete('/delete/{post}', [PostController::class, "destroy"])->name("posts.destroy");
    Route::get('/show/{post}', [PostController::class, "show"])->name("posts.show");
    Route::post('/logout', [AuthController::class, 'logout'])->name('logout');
    Route::delete('/deleteAll', [PostController::class, 'destroyAll'])->name('posts.destroyAll');
    Route::resource('users', UserController::class);
});


