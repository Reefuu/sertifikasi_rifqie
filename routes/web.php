<?php

use App\Http\Controllers\LibraryController;
use App\Http\Controllers\BookController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\MemberController;
use Illuminate\Support\Facades\Route;

Route::resource('books', BookController::class);
Route::resource('categories', CategoryController::class);
Route::resource('members', MemberController::class);
Route::resource('library', LibraryController::class);



Route::get('/', function () {
    return redirect()->route('library.index');
})->name('home');

Route::get('/members', [MemberController::class,'index']);
Route::get('/books', [BookController::class,'index']);
Route::get('/categories', [CategoryController::class,'index']);
