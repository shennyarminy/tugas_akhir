<?php


use Illuminate\Support\Facades\Route;
use App\Http\Controllers\LoginController;


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
    return view('welcome',[ 
        "title" => "Home"

    ]) ;
});

Route::get('/home', function () {
    return view('home', [
        "title" => "Home",
        "judul" => "Dasboard"
    ]);
});
Route::get('/login', function () {
    return view('login', [
        "title" => "Login"
    ]);
});
Route::get('/kriteria', function () {
    return view('kriteria', [
        "title" => "Kriteria",
        "judul" => "Data Kriteria"
    ]);
});


Route::post('/login', [LoginController::class, 'authenticate']);
