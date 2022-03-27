<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ordercontroller;



Route::group(['middleware' => ['auth:api']], function () {
  
  
  Route::Post('/add', [ordercontroller::class,'store']);
  Route::Post('/add/item/', [ordercontroller::class,'additem']);
  Route::Post('/edit/{id}', [ordercontroller::class,'update']);
  Route::Post('/edit/item/{id}/{itemid}', [ordercontroller::class,'update']);
  Route::Post('/delete/{id}', [ordercontroller::class,'destroy']);
  Route::Post('/delete/item/{id}/{itemid}', [ordercontroller::class,'destroy']);
  Route::get('/{id}', [ordercontroller::class,'show']);
  Route::get('/', [ordercontroller::class,'showAll']);

  
});




