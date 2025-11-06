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

// Route untuk Soal 1
Route::get('/soal1', function () {
    return view('soal1');
})->name('soal1.show');

// Route untuk Soal 2
Route::get('/soal2', function () {
    return view('soal2');
})->name('soal2.show');

// Route Root (Default) - Mengarahkan '/' ke Soal 1
Route::get('/', function () {
    return redirect()->route('soal1.show');
});