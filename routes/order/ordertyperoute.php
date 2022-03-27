<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ordertypecontroller;



Route::group(['middleware' => ['auth:api']], function () {
  
  
  Route::Post('/add', [ordertypecontroller::class,'store']);
  Route::Post('/edit/{id}', [ordertypecontroller::class,'update']);
  Route::Post('/delete/{id}', [ordertypecontroller::class,'destroy']);
  Route::get('/{id}', [ordertypecontroller::class,'show']);
  Route::get('/', [ordertypecontroller::class,'showAll']);

  
});




