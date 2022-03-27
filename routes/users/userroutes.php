<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UserController;



Route::Post('/login', [UserController::class,'login']);
Route::Post('/register', [UserController::class,'store']);


Route::group(['middleware' => ['auth:api']], function () {
  
  
  Route::Post('/update/name', [UserController::class,'updateName']);
  Route::get('/', [UserController::class,'show']);
});






