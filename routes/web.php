<?php

namespace App;

use App\Models\Subcriteria;
use Illuminate\Foundation\Auth\User;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\CountController;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\siswaController;
use App\Http\Controllers\ValueController;
use App\Http\Controllers\ResultController;
use App\Http\Controllers\CriteriaController;
use App\Http\Controllers\RegisterController;
use App\Http\Controllers\SubcriteriaController;

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

// LOGIN (AUTH)
Route::post('/authenticate', [AuthController::class, 'authenticate']);
Route::post('/logout', [AuthController::class, 'logout']);
Route::get('/',  [AuthController::class, 'login'])->name('login');
Route::get('/register',  [AuthController::class, 'register']);
Route::post('/register',  [AuthController::class, 'store']);


// REGISTER
// Route::get('/register',  [RegisterController::class, 'index']);
// Route::post('/register',  [RegisterController::class, 'store']);


// HOME (DASHBOARD)
// Route::get('/', [HomeController::class, 'home'])->name('home');
Route::get('/home', [HomeController::class, 'home'])->name('home')->middleware('auth');


// KRITERIA
Route::resource('criteria', CriteriaController::class);


// SUBKRITERIA 
Route::resource('subcriteria', SubcriteriaController::class);

// siswa
Route::resource('siswa', SiswaController::class);

// VALUE
Route::resource('value', ValueController::class);
// USER
Route::resource('user', UserController::class);

// COUNT
Route::get('count.matrix', [CountController::class, 'matrix']);
Route::get('count.normalization', [CountController::class, 'normalization']);
Route::get('count.optimization', [CountController::class, 'optimization']);


// RESULT
Route::get('result.hasil', [ResultController::class, 'ranking']);
Route::get('result.cetak', [ResultController::class, 'cetak']);


Route::get('/list_subcriteria/{criteria_id}', [SubcriteriaController::class, 'listSubcriteria']);
Route::get('/list_item/{subcriteria_id}', [SubcriteriaController::class, 'listItem']);
