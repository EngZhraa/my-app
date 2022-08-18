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

Route::get('/', function () {
    return view('welcome');
});

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth'])->name('dashboard');

Route::get('/finances', function () {
    return view('finances');
})->middleware(['auth'])->name('finances');


Route::get('/subjects', function () {
    return view('subjects');
})->middleware(['auth'])->name('subjects');

Route::get('/contracts', function () {
    return view('contracts');
})->middleware(['auth'])->name('contracts');
require __DIR__.'/auth.php';

Route::get('/credits', function () {
    return view('credits');
})->middleware(['auth'])->name('credits');
require __DIR__.'/auth.php';

Route::get('/enforcments', function () {
    return view('enforcments');
})->middleware(['auth'])->name('enforcments');
require __DIR__.'/auth.php';

