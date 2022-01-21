<?php

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\BookController;
use App\Http\Controllers\HomepageController;
use App\Http\Controllers\NovelController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', [HomepageController::class, 'index'])->name('homepage');

Route::get('/books/{author}/{title}', [BookController::class, 'show'])->name('book.show');
Route::get('/novels/{author}/{title}', [NovelController::class, 'show'])->name('novel.show');

Route::prefix('admin')->middleware(['auth', 'AdminOnly'])->group(function() {

    Route::get('/', function () {
        return view('admin.index');
    })->name('admin');

    Route::get('/users', function () {
        return view('admin.users.index');
    })->name('admin.users');

    Route::get('/books', function () {
        return view('admin.books.index');
    })->name('admin.books');
    Route::get('/books', [BookController::class, 'index'])->name('admin.books');
    Route::get('/books-create', [BookController::class, 'create'])->name('admin.books.create');
    Route::post('/books-save', [BookController::class, 'store'])->name('admin.books.save');
    Route::delete('/books-delete/{id}', [BookController::class, 'destroy'])->name('admin.books.destroy');

    Route::get('/novels', function () {
        return view('admin.novels.index');
    })->name('admin.novels');
    Route::get('/novels', [NovelController::class, 'index'])->name('admin.novels');
    Route::get('/novels-create', [NovelController::class, 'create'])->name('admin.novels.create');
    Route::post('/novels-save', [NovelController::class, 'store'])->name('admin.novels.save');
    Route::delete('/novels-delete/{id}', [NovelController::class, 'destroy'])->name('admin.novels.destroy');
});

Route::get('/dashboard', function () {
    if (Auth::user()->role == 'admin') {
        return redirect()->route('admin');
    }else{
        return redirect()->route('homepage');
    }

})->middleware(['auth'])->name('dashboard');

require __DIR__.'/auth.php';

