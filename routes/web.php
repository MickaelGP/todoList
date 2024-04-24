<?php

use App\Http\Controllers\HomeController;
use App\Http\Controllers\TodoController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
})->name('welcome');

Auth::routes();

Route::get('/home', [HomeController::class, 'index'])->name('home');
Route::post('/home/store', [HomeController::class, 'store'])->name('store');
Route::delete('/todo/{todo}/delete', [HomeController::class,'destroy'])->name('destroy');
Route::get('/todo/{todo}/show', [TodoController::class,'show'])->name('show');
Route::post('/todo/store', [TodoController::class,'store'])->name('todo.store');
Route::delete('/todo/{item}/delete', [TodoController::class,'destroy'])->name('todo.destroy');
Route::put('/todos/{itemId}/update-status', [TodoController::class, 'updateStatus'])->name('todos.updateStatus');
