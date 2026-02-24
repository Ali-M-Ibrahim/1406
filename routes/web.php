<?php

use App\Http\Controllers\DataController;
use App\Http\Controllers\FirstController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\RController;
use App\Http\Controllers\APIController;
use App\Http\Controllers\InvokeController;
use App\Http\Controllers\ItemController;


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


Route::resource("item",RController::class)
//->only(['index','create'])
->except(["store",'update'])
;

Route::apiResource('item2',APIController::class);

Route::get('invoke', InvokeController::class);


Route::get("data",[DataController::class,'index']);


Route::get('create1',[ItemController::class,'create1']);
Route::get('create2',[ItemController::class,'create2']);
Route::get('create3',[ItemController::class,'create3']);
Route::post('create4',[ItemController::class,'create4']);
Route::post('create5',[ItemController::class,'create5']);
Route::get('getById/{id}',[ItemController::class,'getById']);
Route::get('getAll',[ItemController::class,'getAll']);
Route::get('getByCondition',[ItemController::class,'getByCondition']);
Route::get('getByConditionOr',[ItemController::class,'getByConditionOr']);
Route::get('getWhereIn',[ItemController::class,'getWhereIn']);
Route::get('getBetween',[ItemController::class,'getBetween']);
Route::get('getItemsOrderBy',[ItemController::class,'getItemsOrderBy']);
Route::get('getJoin',[ItemController::class,'getJoin']);
Route::get('getFields',[ItemController::class,'getFields']);
Route::get('update1',[ItemController::class,'update1']);
Route::put('update2',[ItemController::class,'update2']);
Route::get('updateOrCreate',[ItemController::class,'updateOrCreate']);
Route::get('delete',[ItemController::class,'delete']);

Route::get('statistics',[ItemController::class,'statistics']);
Route::get('massUpdate',[ItemController::class,'massUpdate']);








