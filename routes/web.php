<?php

use App\Http\Controllers\TodoListController;
use Illuminate\Support\Facades\Route;

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
