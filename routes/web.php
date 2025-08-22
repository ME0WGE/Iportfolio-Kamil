<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AboutController;
use App\Http\Controllers\GeneralController;
use App\Http\Controllers\SkillController;

Route::get('/', [GeneralController::class, 'index']);

Route::get('/back', [GeneralController::class, 'nav_back']);