<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\SettingController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\DurableController;
use App\Http\Controllers\SearchController;
use App\Http\Controllers\RepairController;
use App\Http\Controllers\SurveyController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\DepartmentController;
use App\Http\Controllers\TypefasgrpController;

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

// Route::get('/welcome', function () {
//     return view('welcome');
// });

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

Route::get('/', [DashboardController::class, 'index'])->name('dashboard');
Route::get('/dashboard', [DashboardController::class, 'index'])->name('dashboard');

Route::group(['middleware' => 'auth:sanctum'], function() {

    Route::resource('/setting', SettingController::class);
    Route::resource('/user', UserController::class);
    Route::put('/user', [UserController::class, 'password'])->name('user.password');
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile');
    Route::put('/profile', [ProfileController::class, 'update'])->name('profile');
    Route::put('/profile/password', [ProfileController::class, 'password']);

    Route::resource('/durable', DurableController::class);
    Route::get('/durable9', [DurableController::class, 'index9'])->name('durable.index9');
    Route::get('/durable4', [DurableController::class, 'index4'])->name('durable.index4');

    Route::resource('/repair', RepairController::class);
    Route::get('/report', [ReportController::class, 'index'])->name('report');
    Route::get('/survey', [SurveyController::class, 'index'])->name('survey');
    Route::post('/survey', [SurveyController::class, 'index'])->name('survey');

    Route::resource('/department', DepartmentController::class);
    Route::resource('/typefasgrp', TypefasgrpController::class);
});

Route::resource('/search', SearchController::class);
Route::get('/didsearch', [SearchController::class, 'didsearch'])->name('didsearch');
Route::get('/durablesearch', [SearchController::class, 'durablesearch'])->name('durablesearch');
Route::get('/printpreview', [SearchController::class, 'printpreview'])->name('printpreview');
Route::get('/printallpreview', [SearchController::class, 'printallpreview'])->name('printallpreview');

Auth::routes();
