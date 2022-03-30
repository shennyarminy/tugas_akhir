<?php
namespace App;


use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\CriteriaController;

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
Route::post('/login', [LoginController::class, 'authenticate']);
Route::get('/login',  [LoginController::class, 'login']);

// HOME (DASHBOARD)
Route::get('/', [HomeController::class, 'home'])->name('home');
Route::get('/home', [HomeController::class, 'home'])->name('home');


// KRITERIA
Route::resource('criteria', CriteriaController::class);





 

// SUBKRITERIA 




