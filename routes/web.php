<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\IndexController;

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
Route::get('/resume', [
    IndexController::class, 'index'
]);

Route::get('/resume/show', [
    IndexController::class, 'show'
]);

Route::get('/resume/add', [
    IndexController::class, 'add'
]);

Route::post('/resume/add', [
    IndexController::class, 'resumeStore'
])->name('resumeStore');
