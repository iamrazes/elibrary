<?php

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;

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

Route::get('/', function () {
    return view('welcome');
})->name('home');

Route::get('/admin', function () {
    return view('admin.index');
})->name('admin')->middleware(['auth', 'AdminOnly']);

Route::get('/admin/users', function () {
    return view('admin.users.index');
})->name('admin.users')->middleware(['auth', 'AdminOnly']);

Route::get('/admin/books', function () {
    return view('admin.books.index');
})->name('admin.books')->middleware(['auth', 'AdminOnly']);

Route::get('/dashboard', function () {
    if (Auth::user()->role == 'admin') {
        return redirect()->route('admin');
    }else{
        return redirect()->route('home');
    }

})->middleware(['auth'])->name('dashboard');

require __DIR__.'/auth.php';
