<?php

use App\Http\Controllers\PeopleController;
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

Route::get('/peoples', [PeopleController::class, 'index']);

Route::get('/people/{id}', [PeopleController::class, 'show']);

Route::post('/people', [PeopleController::class, 'store']);

Route::put('/people/{id}', [PeopleController::class, 'update']);

Route::delete('/people/{id}', [PeopleController::class, 'destroy']);