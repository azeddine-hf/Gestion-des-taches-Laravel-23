<?php

use App\Http\Controllers\ProjectController;
use App\Http\Controllers\UserController;

use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth ;

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
Route::group(['middleware' => ['auth']], function() {
    Route::get('/equipe', [UserController::class,'index']);
    Route::get('/', function () {
        return view('welcome');
    });
    Route::get('/show_members', [UserController::class,'showsmember'])->name('showmmp');
    Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
//!rout for project 
Route::controller(ProjectController::class)->group(function() {
    Route::get('project', 'index');
    Route::get('projet', 'index');
});

});

Route::post('/member', [UserController::class,'store']);

//olds
Route::get('edit-user/{id}', [UserController::class,'edit']);
Route::put('edit-user', [UserController::class,'update']);


Auth::routes(['login' => false]);

Route::get('/login', function () {
    return redirect('/connexion');
});


Route::get('connexion', 'App\Http\Controllers\Auth\LoginController@showLoginForm');
Route::post('connexion', 'App\Http\Controllers\Auth\LoginController@login')->name('login');
