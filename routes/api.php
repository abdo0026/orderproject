<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\partone;
/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/


Route::post('/smallest/positive/number',[partone::class, 'smallestpositive']);

Route::get('/stringsequence', [partone::class, 'stringsequence']);



Route::get('/accessdenied', function(Request $request){
    return response()->json(['error'=>'Unauthorised'], 401);
})->name('accessdenied');

