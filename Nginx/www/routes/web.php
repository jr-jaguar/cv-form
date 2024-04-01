<?php

use App\Http\Controllers\ContactController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});

Route::get('/contact',[ContactController::class, 'showForm']);
Route::post('/contact',[ContactController::class, 'submitForm']);
