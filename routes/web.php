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
  return view('home');
})->name('home');

Route::get('/todo', function() {
    return view('todo');
})->name('todo');

Route::get('/login', function() {
  return view('login');
})->name('login');

Route::get('/register', function() {
  return view('register');
})->name('register');
