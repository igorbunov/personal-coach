<?php

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

Route::view('/', 'pages.index')->name('index');
Route::view('/about', 'pages.about')->name('about');
Route::view('/login', 'pages.login')->name('login');
Route::view('/logout', 'pages.logout')->name('logout');
Route::view('/register', 'pages.register')->name('register');
Route::view('/profile', 'pages.profile')->name('profile');
