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

Route::get('/master', function () {
    return view('layouts.master');
});

Route::get('/property', function () {
    return view('pages.management');
});

Route::get('/', function () {
    return view('pages.landing');
});

Route::get('/schedule', function () {
    return view('pages.schedule');
});

Route::get('/data-user', function () {
    return view('pages.data-user');
});

Route::get('/admin', function () {
    return view('pages.admin');
});

Route::get('/home', function () {
    return view('pages.home');
});

Route::get('/login', function () {
    return view('pages.login');
});

// Route::post('/login', [LoginController::class, 'postlogin'])->name('postlogin');