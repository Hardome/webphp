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
])->name('index');

Route::get('/resume/show/{id}', [
    IndexController::class, 'showResume'
])->name('show');

Route::get('/resume/add', [
    IndexController::class, 'addResume'
])->name('add');

Route::post('/resume/add', [
    IndexController::class, 'storeResume'
])->name('storeResume');

Route::get('/resume/edit/{id}', [
    IndexController::class, 'editResume'
])->name('editResume');

Route::put('/resume/edit/{id}', [
    IndexController::class, 'updateResume'
])->name('updateResume');

Route::delete('/resume/delete/{resume}', [
    IndexController::class, 'deleteResume'
])->name('deleteResume');
