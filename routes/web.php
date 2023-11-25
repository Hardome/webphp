<?php

use Illuminate\Support\Facades\Auth;
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

//Route::get('/', function () {
//    return view('welcome');
//});

Auth::routes();

Route::get('/home', [
    App\Http\Controllers\HomeController::class, 'index'
])->name('home');

Route::get('/', [
    IndexController::class, 'index'
])->name('index');

Route::get('/add', [
    IndexController::class, 'add'
])->name('add');

Route::post('/add', [
    IndexController::class, 'storeNews'
])->name('storeNews');


Route::get('/rubric/{id}', [
    IndexController::class, 'rubric'
])->name('rubric');

Route::get('/statya/{id}', [
    IndexController::class, 'statya'
])->name('statya');

Route::delete('/statya/{id}', [
    IndexController::class, 'deleteNews'
])->name('deleteNews');
