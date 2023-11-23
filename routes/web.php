<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\TodoController;




/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/', [TodoController::class, 'index'])->name('Todos.index')->middleware('auth');
Route::get('/Todos', [TodoController::class, 'TodosIndex'])->middleware('auth');

Auth::routes();


Route::get('/home', [App\Http\Controllers\TodoController::class, 'index'])->name('home')->middleware('auth');

// Route::get('Todos/index',[TodoController::class, 'index'])->name('Todos.index')->middleware('auth');
// Route::get('Todos/create',[TodoController::class, 'create'])->name('Todos.create')->middleware('auth');
// Route::post('/Todos/store', [TodoController::class, 'store'])->name('todos.store')->middleware('auth');
// Route::get('/Todos/show/{id}', [TodoController::class, 'show'])->name('todos.show')->middleware('auth');
// Route::get('Todos/{id}/edit', [TodoController::class, 'edit'])->name('todos.edit')->middleware('auth');
// Route::put('Todos/update', [TodoController::class, 'update'])->name('todos.update')->middleware('auth');
// Route::delete('Todos/destroy', [TodoController::class, 'destroy'])->name('todos.destroy')->middleware('auth');
// Route::get('Todos/{id}/compeleted', [TodoController::class, 'completed'])->name('todos.completed')->middleware('auth');

Route::prefix('Todos')->group(function () {
    Route::get('/index',[TodoController::class, 'index'])->name('Todos.index');
    Route::get('/create',[TodoController::class, 'create'])->name('Todos.create');
    Route::post('/store', [TodoController::class, 'store'])->name('todos.store');
    Route::get('/show/{id}', [TodoController::class, 'show'])->name('todos.show');
    Route::get('/{id}/edit', [TodoController::class, 'edit'])->name('todos.edit');
    Route::put('/update', [TodoController::class, 'update'])->name('todos.update');
    Route::delete('/destroy', [TodoController::class, 'destroy'])->name('todos.destroy');
    Route::get('/{id}/compeleted', [TodoController::class, 'completed'])->name('todos.completed');
})->middleware('auth');

