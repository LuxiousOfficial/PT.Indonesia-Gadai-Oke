<?php

use App\Http\Controllers\DashboardController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UserController;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\EmployedController;
use App\Http\Controllers\RegistrationController;
use App\Http\Controllers\TaskController;
use App\Http\Controllers\TaskkController;
use App\Http\Controllers\TaskkkController;
use App\Http\Controllers\TaskkkkController;
use App\Http\Controllers\TaskkkkkController;

Route::get('/', [LoginController::class, 'index'])->middleware('guest');
Route::post('/', [LoginController::class, 'authenticate']);
Route::post('/logout', [LoginController::class, 'logout']);

Route::get('/registration', [RegistrationController::class, 'index']);
Route::post('/registration', [RegistrationController::class, 'store']);

Route::get('/user', [EmployedController::class, 'index'])->middleware('auth');

Route::get('/home', function() {
return view('home');
});

Route::get('/user', [DashboardController::class, 'index'])->middleware('auth');

Route::resource('/user/user', UserController::class)->middleware(['auth', 'manager']);
Route::resource('/user/user', UserController::class)->middleware('admin');

Route::resource('/user/task', TaskController::class)->middleware('Member', 'manager');
Route::resource('/user/task', TaskController::class)->middleware('auth');

Route::resource('/user/taskk', TaskkController::class)->middleware('Member', 'manager');
Route::resource('/user/taskk', TaskkController::class)->middleware('auth');

Route::resource('/user/taskkk', TaskkkController::class)->middleware('Member', 'manager');
Route::resource('/user/taskkk', TaskkkController::class)->middleware('auth');

Route::resource('/user/taskkkk', TaskkkkController::class)->middleware('Member', 'manager');
Route::resource('/user/taskkkk', TaskkkkController::class)->middleware('auth');

Route::resource('/user/taskkkkk', TaskkkkkController::class)->middleware('Member', 'manager');
Route::resource('/user/taskkkkk', TaskkkkkController::class)->middleware('auth');


