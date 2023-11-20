<?php

use App\Http\Controllers\TodoListController;
use App\Http\Controllers\UserController;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Hash;
use Illuminate\Validation\ValidationException;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "api" middleware group. Make something great!
|
*/

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});
Route::get('userIndex',[UserController::class,'Userindex']);//get all users 
Route::post('UserCreate',[UserController::class,'UserCreate']);//create a new user
Route::post('delete',[UserController::class,'UserDestroy']);//delete a user
Route::post('login',[UserController::class,'UserLogin']);
//Route::post('value',[UserController::class,'UserLoginVerify']);
Route::post('value',[TodoListController::class,'updateCheckbox']);

