<?php

use App\Http\Controllers\HomeController;
use App\Http\Controllers\TodoController;
use App\Http\Controllers\AdminController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
})->name('welcome');

Auth::routes();

Route::controller(AdminController::class)->prefix('/admin')->group(function(){
    Route::get('/gestion', 'index')->name('gestion');
    Route::post('/gestion', 'storeCategorie')->name('store.categorie');
    Route::get('/gestion/{categorie}/edit', 'editCategorie')->name('edit');
    Route::patch('/gestion/{categorie}/modifier', 'updateCategorie')->name('update.categorie');
    Route::delete('/gestion/{categorie}', 'destroyCategorie')->name('destroy.categorie');
});

Route::get('/home', [HomeController::class, 'index'])->name('home');
Route::post('/home/store', [HomeController::class, 'store'])->name('store');
Route::delete('/todo/{todo}/delete', [HomeController::class,'destroy'])->name('destroy');
Route::get('/todo/{todo}/show', [TodoController::class,'show'])->name('show');
Route::post('/todo/store', [TodoController::class,'store'])->name('todo.store');
Route::delete('/todo/{item}/delete', [TodoController::class,'destroy'])->name('todo.destroy');
Route::put('/todos/{itemId}/update-status', [TodoController::class, 'updateStatus'])->name('todos.updateStatus');
