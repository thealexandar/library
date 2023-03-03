<?php

use Illuminate\Support\Facades\Route;

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
    return redirect()->route('login');
});

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
Route::get('/dashboard', [App\Http\Controllers\DashboardController::class, 'index']);
Route::get('/authors', [App\Http\Controllers\AuthorController::class, 'index'])->name('authors');
Route::post('/authors', [App\Http\Controllers\AuthorController::class, 'store'])->name('authors.store');
Route::put('/authors/{id}', [App\Http\Controllers\AuthorController::class, 'update'])->name('authors.update');
Route::delete('/authors/{author}', [App\Http\Controllers\AuthorController::class, 'destroy'])->name('authors.destroy');

// Books routes
Route::get('/books', [App\Http\Controllers\BookController::class, 'index'])->name('books');

