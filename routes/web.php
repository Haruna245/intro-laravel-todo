<?php

use App\Http\Controllers\articleController;
use App\Http\Controllers\TodoListController;
use App\Http\Controllers\UserController;
use Illuminate\Support\Facades\Route;
use App\Http\Resources\UserResource;
use App\Models\User;

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

Route::get('/', function () {
    return view('welcome');
});


Route::get('/index',[TodoListController::class,'index']);
Route::post('create',[TodoListController::class,'create']);
Route::get('delete/{id}',[TodoListController::class,'delete']);
Route::get('updatePage/{id}',[TodoListController::class,'updatePage']);
Route::post('updatePage/update',[TodoListController::class,'update']);
Route::get('insert',[articleController::class,'store']);
//Route::get('articles',[articleController::class,'index']);
Route::get('userIndex',[UserController::class,'Userindex']);
Route::post('UserCreate',[UserController::class,'UserCreate']);

Route::get('/user/{id}', function (string $id) {
    return new UserResource(User::findOrFail($id));
});