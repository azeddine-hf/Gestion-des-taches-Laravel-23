<?php

use App\Http\Controllers\ProjectController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\ClientController;
use App\Http\Controllers\TasksController;
use App\Http\Controllers\RecycleController;
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
   Route::get('/profile', [ProfileController::class,'index']);
    //! recycle bin
    Route::get('/recycle', [RecycleController::class,'index']);
    //for deleted users
    Route::get('/show_members_deleted', [UserController::class,'showsmember_deleted'])->name('showmmp');
    Route::post('/restor-user/{id_recycle}', [UserController::class,'destroy_recycle']);
    Route::delete('/delete-user-ever/{id_dele}',[UserController::class,'destroy_ever']);
    //for client deleted
    Route::get('/show_clients_deleted', [ClientController::class,'showsclient_deleted'])->name('showmmp');
    Route::post('/restor-client/{id_recycl}', [ClientController::class,'destroy_recycle_client']);
    Route::delete('/delete-client-ever/{id_delever}',[ClientController::class,'destroy_fever']);




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


//! routs for tasks
Route::post('/addtasks', [TasksController::class,'store']);
Route::get('/show_tasks', [TasksController::class,'showtasks'])->name('showtaches');
Route::get('/edit-tasks/{id_task}', [TasksController::class,'edit']);
Route::post('/edit-task/{id_tasks}', [TasksController::class,'update']);
Route::post('/deleting-task/{id_tsks}', [TasksController::class,'destroy']);
Route::get('/taches', [TasksController::class,'index']);
Route::get('/tasks', function () {
    return redirect('/taches');
});


});
Auth::routes(['login' => false]);

Route::get('/login', function () {
    return redirect('/connexion');
});


Route::get('connexion', 'App\Http\Controllers\Auth\LoginController@showLoginForm');
Route::post('connexion', 'App\Http\Controllers\Auth\LoginController@login')->name('login');

