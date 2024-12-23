<?php

use App\Http\Controllers\BlogController;
use Illuminate\Support\Facades\Route;

Route::get("/", [BlogController::class, "index"]);
Route::get("/{category:slug}", [BlogController::class, "posts"]);
Route::get("/{slugCategory}/{slugPost}", [BlogController::class, "post"]);
