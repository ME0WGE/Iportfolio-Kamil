<?php

use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('home');
});
Route::get('/back', function () {
    return view('back-end.dashboard');
});