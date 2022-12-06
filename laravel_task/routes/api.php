<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\InventoryController;

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

// Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
//     return $request->user();
// });

Route::post('test',function(){
    return "Test";
});

Route::post('inventory',[InventoryController::class,'create']);
Route::get('/inventoryAll',[InventoryController::class,'show']);
Route::get('/inventoryShow/{id?}',[InventoryController::class,'showByID']);
Route::put('/inventoryUpdate/{id}',[InventoryController::class,'update']);
Route::delete('/inventoryDelete/{id}',[InventoryController::class,'delete']);

