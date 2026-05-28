<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\TutorialController;

Route::get('/', function () {
    return view('codalab');
});

Route::get('/dashboard', function () {
    return view('dashboard');
});

Route::get('/tutorial', [TutorialController::class, 'index']);

Route::get('/about', function () {
    return 'Halaman About';
});

Route::get('/shop', function () {
    return 'Halaman Shop';
});

Route::get('/chat', function () {
    return 'Halaman Chat';
});

Route::get('/demo', function () {
    return 'Halaman Demo';
});

Route::get('/codalab', function () {
    return view('codalab');
});
