<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\TeamsController;
use App\Http\Controllers\PlayersController;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\CommentsController;


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

// Route::get('/teams', [TeamsController::class, 'index']); //treba middleware auth
// Route::get('/teams/{team}', [TeamsController::class, 'show'])->name('team'); //treba middleware auth
// Route::get('/players/{player}', [PlayersController::class, 'show'])->name('player'); //treba middleware auth
// Route::get('/register', [AuthController::class, 'getRegisterForm']); //treba middleware auth
// Route::post('/register', [AuthController::class, 'register']);
// Route::post('/logout', [AuthController::class, 'logout']);
// Route::get('/login', [AuthController::class, 'getLoginBlade'])->name('login');
// Route::post('/login', [AuthController::class, 'login']);  

Route::group(['middleware' => 'auth'], function() {
    Route::get('/teams', [TeamsController::class, 'index']);
    Route::get('/teams/{team}', [TeamsController::class, 'show'])->name('team');
    Route::get('/players/{player}', [PlayersController::class, 'show'])->name('player');
    Route::post('/logout', [AuthController::class, 'logout']);
    Route::post('/teams/{team}/comments', [CommentsController::class, 'store'])->name('createComment');
});

Route::group(['middleware' => 'guest'], function() {
    Route::get('/register', [AuthController::class, 'getRegisterForm']);
    Route::post('/register', [AuthController::class, 'register']);
    Route::get('/login', [AuthController::class, 'getLoginBlade'])->name('login');
    Route::post('/login', [AuthController::class, 'login']);  
});