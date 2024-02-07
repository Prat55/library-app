<?php

use App\Http\Controllers\BookController;
use App\Http\Controllers\HomeCotroller;
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
    return view('welcome');
});

Route::middleware([
    'auth:sanctum',
    config('jetstream.auth_session'),
    'verified',
])->group(function () {
});

Route::middleware(['admin'])->group(function () {
    Route::get('/dashboard', function () {
        return view('backend.index');
    })->name('dashboard');

    // ?Books CRUD routes
    Route::get('/add-book', [BookController::class, 'index'])->name('add-book');
    Route::get('/manage-books', [BookController::class, 'manage_books'])->name('manage-books');


    // Route::post('theme', [HomeCotroller::class, 'theme'])->name('theme');


});
