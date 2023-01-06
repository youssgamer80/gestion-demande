<?php

use App\Http\Controllers\DemandeController;
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

Route::post('creer-demande',[DemandeController::class,'createDemande']);
Route::get('liste-demande',[DemandeController::class,'listeDemande']);