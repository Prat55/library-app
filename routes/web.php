<?php

use App\Http\Controllers\BookController;
use App\Http\Controllers\HomeCotroller;
use App\Http\Controllers\ProfileController;
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

Route::get('/', [HomeCotroller::class, 'home']);

Route::get('/contact', [BookController::class, 'contact'])->name('contact');
Route::get('/books', [BookController::class, 'books'])->name('books');

Route::middleware([
    'auth:sanctum',
    config('jetstream.auth_session'),
    'verified',
])->group(function () {

    Route::get('/profile', [BookController::class, 'profile'])->name('user.profile');
    Route::post('/change-profile/{uid}', [ProfileController::class, 'changeProfilePhoto']);
});

Route::middleware(['admin'])->group(function () {
    Route::get('/dashboard', function () {
        return view('backend.index');
    })->name('dashboard');

    // ?Books CRUD routes
    Route::get('/add-book', [BookController::class, 'index'])->name('add-book');
    Route::get('/manage-books', [BookController::class, 'manage_books'])->name('manage-books');
    Route::get('/book-assign-requests', [BookController::class, 'assign_request'])->name('assign-book-request');
    Route::get('/issued-books', [BookController::class, 'issued_books'])->name('issued-books');

    // ? Users management routes
    Route::get('/students', [BookController::class, 'students'])->name('students');
    Route::get('/teachers', [BookController::class, 'teachers'])->name('teachers');

    // ? Faculty route
    Route::get('/faculty', [BookController::class, 'faculty'])->name('faculty');

    // ? Edit and Update book routes
    Route::get('/book/edit/{token}', [BookController::class, 'edit_book']);
    Route::put('/book/update/{token}', [BookController::class, 'update_book']);
});
