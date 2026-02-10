<?php

use App\Http\Controllers\FirstController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});



Route::get("route-1",[FirstController::class, 'index']);
Route::get("route-2",[FirstController::class, 'index2']);
Route::get("route-3",[FirstController::class,'index3']);
Route::get("route-4",[FirstController::class,'index4']);
Route::get("route-5",[FirstController::class,'index5']);
Route::get("route-6",[FirstController::class,'index6']);
Route::get("route-7",[FirstController::class,'index7']);
Route::get("route-8",[FirstController::class,'index8']);
Route::get("route-9",[FirstController::class,'index9']);
Route::get("route-10",[FirstController::class,'index10']);
Route::get("route-11",[FirstController::class,'index11']);
route::get('route-12/{id}',[FirstController::class,'index12']);
Route::get("route-13/{id}/{name}",[FirstController::class,'index13']);
route::get('route-14/{id?}',[FirstController::class,'index14']);

// Other  methods to create route
Route::get("route-1-duplicate",'App\Http\Controllers\FirstController@index');
Route::get('route-2-duplicate',[
    'uses'=> 'App\Http\Controllers\FirstController@index'
]);





Route::post('route-15',[FirstController::class,'index']);
Route::put('route-16',[FirstController::class,'index']);
