<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthManager;
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
  return view('login');
})->name('login');

// Route::get('/home', function() {
//   return view('home');
// })->name('home');

// Route::get('/todo', function() {
//     return view('todo');
// })->name('todo');

// Route::get('/projects', function() {
//     return view('project');
// })->name('project');

Route::get('/login', [AuthManager::class, 'login'])->name('login');
Route::post('/login', [AuthManager::class, 'loginPost'])->name('login.post');

Route::get('/register', [AuthManager::class, 'register'])->name('register');
Route::post('/register', [AuthManager::class, 'registerPost'])->name('register.post');

Route::get('/logout', [AuthManager::class, 'logout'])->name('logout');

Route::middleware(['auth'])->group(function () {
  // Define your protected routes here
  Route::get('/home', function() {
    return view('home');
  })->name('home');
  
  Route::get('/todo', function() {
      return view('todo');
  })->name('todo');
  
  Route::get('/projects', function() {
      return view('project');
  })->name('project');
});
