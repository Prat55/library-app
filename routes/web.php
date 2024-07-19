<?php

use App\Http\Controllers\BookController;
use App\Http\Controllers\FineController;
use App\Http\Controllers\HomeCotroller;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\StripeController;
use App\Http\Controllers\UserController;
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

    // ? User profile page route
    Route::get('/profile', [ProfileController::class, 'profile'])->name('user.profile');
    // ? User profile information route
    Route::put('/profile/update', [ProfileController::class, 'updateProfile']);
    // ? User Library card upload route
    Route::put('/profile/library-card/update', [ProfileController::class, 'library_card_upload'])->name('user.library-card-upload');
    // ? User profile photo change route
    Route::post('/change-profile/{uid}', [ProfileController::class, 'changeProfilePhoto']);
    // ? User password updation route
    Route::post('/profile/password/update', [ProfileController::class, 'updatePassword'])->name('password.update');
    // ? User account deletion route
    Route::delete('/profile/account/delete', [ProfileController::class, 'removeAccount'])->name('user.delete');

    // ?Payment Gateway routes
    Route::post('/checkout', [StripeController::class, 'checkout'])->name('checkout');
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
    Route::get('/students', [UserController::class, 'students'])->name('students');
    Route::get('/teachers', [UserController::class, 'teachers'])->name('teachers');
    Route::get('/admins', [UserController::class, 'admins'])->name('admins');
    Route::get('/add-user', [UserController::class, 'new_user'])->name('new_user');
    Route::post('/add-user/new', [UserController::class, 'add_user'])->name('add_user');
    Route::get('/user/{id}', [UserController::class, 'user_detailed']);

    // ? Faculty route
    Route::get('/faculty', [BookController::class, 'faculty'])->name('faculty');

    // ? Edit and Update book routes
    Route::get('/book/edit/{token}', [BookController::class, 'edit_book']);
    Route::put('/book/update/{token}', [BookController::class, 'update_book']);

    // ? Issued book history routes
    Route::get('/issued-books-history', [BookController::class, 'issued_history'])->name('issued-history');

    // ?Fines route
    Route::get('/fines', [FineController::class, 'index'])->name('fines');
});
