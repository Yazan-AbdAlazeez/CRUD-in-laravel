<?php

use App\Http\Controllers\PostController;
use Illuminate\Support\Facades\Route;

route::get('/', [PostController::class, "index"])->name("posts.index");
route::get('/create', [PostController::class, "create"])->name("posts.create");
route::post('/store', [PostController::class, "store"])->name("posts.store");
route::get('/edit/{post}', [PostController::class, "edit"])->name("posts.edit");
route::put('/update/{post}', [PostController::class, "update"])->name("posts.update");
route::delete('/delete/{post}', [PostController::class, "destroy"])->name("posts.destroy");
route::get('/show/{post}', [PostController::class, "show"])->name("posts.show");



// Route::resource('posts', PostController::class);
