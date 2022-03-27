<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\itemController;



Route::group(['middleware' => ['auth:api']], function () {
  
  
  Route::Post('/add', [itemController::class,'store']);
  Route::Post('/edit/{id}', [itemController::class,'update']);
  Route::Post('/delete/{id}', [itemController::class,'destroy']);
  Route::get('/{id}', [itemController::class,'show']);
  Route::get('/', [itemController::class,'showAll']);

  
});




