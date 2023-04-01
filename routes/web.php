<?php

use App\Http\Controllers\ProjectController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\ClientController;

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
    Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');


    //!show USERS route in table and all
    Route::get('/show_members', [UserController::class,'showsmember'])->name('showmmp');
    Route::get('/edit-user/{idu}', [UserController::class,'edit']);
    Route::post('/edit-users/{idu}', [UserController::class,'update']);
    Route::post('/delete-user/{idu}', [UserController::class,'destroy']);
    Route::post('/member', [UserController::class,'store']);
    

    //!show Clients route in table and all
    Route::get('/show_clients', [ClientController::class,'showsclient'])->name('shwsclients');
    Route::get('/edit-client/{id_client}', [ClientController::class,'edit']);
    Route::post('/addclients', [ClientController::class,'store']);
    Route::post('/edit-clients/{id_client}', [ClientController::class,'update']);
    Route::post('/deleting-clients/{id}', [ClientController::class,'destroy']);
    Route::get('/client', [ClientController::class,'index']);
    Route::get('/company', function () {
        return redirect('/client');
    });


   //! Profile routs
    Route::get('/profile', function () {
        return view('profile');
    });

//!rout for project
Route::get('/projet', [ProjectController::class,'index']);
Route::get('/show_projects', [ProjectController::class,'showprojetcs'])->name('showprojetc');
Route::get('/edit-projets/{id_projet}', [ProjectController::class,'edit']);
Route::post('/deleting-projects/{id_pr}', [ProjectController::class,'destroy']);
Route::post('/edit-projects/{id_projet}', [ProjectController::class,'update']);
Route::post('/addprojects', [ProjectController::class,'store']);
Route::get('/project', function () {
    return redirect('/projet');
});



//olds

});
Auth::routes(['login' => false]);

Route::get('/login', function () {
    return redirect('/connexion');
});


Route::get('connexion', 'App\Http\Controllers\Auth\LoginController@showLoginForm');
Route::post('connexion', 'App\Http\Controllers\Auth\LoginController@login')->name('login');

