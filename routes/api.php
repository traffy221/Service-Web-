<?php

use App\Models\bassin;
use App\Models\electeur;
use App\Models\partie;
use App\Http\Controllers\ElecteurController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;


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

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});

Route::get('/electeurs', function(){
    return Electeur::all(['cni','num_electeur',]);
});
Route::get('/circonscriptions', function(){
    return bassin::all();
});

Route::get('/parties', function(){
    return Partie::all();
});

Route::post("add", [ElecteurController::class,'add']);

Route::post("login", [ElecteurController::class,'login']);



