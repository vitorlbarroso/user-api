<?php

use App\Http\Controllers\Api\PeopleController;
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

Route::get('users', [PeopleController::class, 'index']);

Route::get('user/{id}', [PeopleController::class, 'store']);

Route::post('user', [PeopleCpostroller::class, 'create']);

Route::put('user/{id}', [PeopleCpostroller::class, 'update']);

Route::delete('user/{id}', [PeopleCpostroller::class, 'destroy']);