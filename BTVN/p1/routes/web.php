<?php
use App\Http\Controllers\ExampleController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});

Route::get('/example', function () {
    return 'Hello World';
    });

Route::get('/example', [ExampleController::class, 'show']);