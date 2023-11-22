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

Route::get('/', function () {
    return view('welcome');
});

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

Route::get('Todos/index',[TodoController::class, 'index'])->name('Todos.index');
Route::get('Todos/create',[TodoController::class, 'create'])->name('Todos.create');
Route::post('/Todos/store', [TodoController::class, 'store'])->name('todos.store');
Route::get('/Todos/show/{id}', [TodoController::class, 'show'])->name('todos.show');
