<?php

use App\Http\Controllers\HomeController;
use App\Http\Controllers\RedirectController;
use Illuminate\Support\Facades\Route;

Route::get('/', [HomeController::class, 'index']);

Route::get('/{link}', [RedirectController::class, 'index']);