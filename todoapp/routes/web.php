<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\TodoController;

Route::get('/home', [TodoController::class,'index']);
Route::post('/create', [TodoController::class,'create']);
Route::post('/update', [TodoController::class,'update']);
Route::post('/delete', [TodoController::class,'delete']);

Route::get('/', function () {
    return view('welcome');
});

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth'])->name('dashboard');

require __DIR__.'/auth.php';
