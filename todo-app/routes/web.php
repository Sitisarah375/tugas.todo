<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\TodoController;

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

// Route::get('/about', function () {
//     return view('dasboard.about');
// });

Route::middleware('isGuest')->group(function() {
    Route::get('/',[TodoController::class, 'index'])->name('login-page'); 
    Route::get('/complated',[TodoController::class, 'complated'])->name('complated'); 

    Route::get('/register',
    [TodoController::class, 'register'])->name('register-page'); 
    Route::post('/register/input', [TodoController::class, 'registerAccount'])->name('register-input');
    Route::get('/login/auth', [TodoController::class, 'auth'])->name('login-auth');
    Route::post('/login/auth', [TodoController::class, 'auth'])->name('login-auth');
});

Route::middleware('isLogin')->group(function() {
    Route::get('/todo',[TodoController::class, 'todo'])->name('todo');
    Route::get('/home', [TodoController::class, 'home'])->name('home-page');
    Route::get('/about', [TodoController::class, 'about'])->name('about-page');
    Route::get('/dasboard', [TodoController::class, 'dasboard'])->name('dasboard-page');
    Route::get('/create',[TodoController::class, 'create'])->name('create.input'); 
    Route::post('/store',[TodoController::class, 'store'])->name('store'); 
    // route path yang menggunakan {} berarti dia berperan sebagai parameter route
    //parameter ini bentuknya data dinamis (data yang dikirim ke route untuk diambil ke parameter function controller terkait)
    Route::get('/edit/{id}',[TodoController::class, 'edit'])->name('edit');
    // method route unutuk ubah data di db itu patch/put
    Route::patch('/todo/update/{id}',[TodoController::class, 'update'])->name('update'); 
    Route::get('',[TodoController::class, 'destroy'])->name('delete'); 
});

Route::get('/logout', [TodoController::class, 'logout'])->name('logout');

Route::get('/bisa', function () {
    return response('bisa');
});