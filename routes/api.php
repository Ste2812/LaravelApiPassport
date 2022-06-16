<?php

use App\Http\Controllers\PlayerController;
use App\Http\Controllers\UserController;
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

//rutas para registro y login

Route::group([
    'prefix' => 'users'], function() {
        Route::post('signup', [UserController::class, 'user_create']);//separar registro usuario y registro jugador
        Route::post('login', [UserController::class, 'login']);

        //rutas de acceso solo para usuarios logeados

        Route::group(['middleware'=>'auth:api'], function() {
            Route::put('user-update/{id}', [UserController::class, 'user_update']);
            Route::delete('user-delete/{id}', [UserController::class, 'user_delete']);
            Route::get('index', [UserController::class, 'user_index']);
            Route::post('logout', [UserController::class, 'logout']);
            Route::post('/players', [PlayerController::class, 'store']);//subconjunto controller user para crear usuario a partir del registro
            Route::put('/players/{id}', [PlayerController::class, 'update']);
            Route::post('/player/{id}/games/', [PlayerController::class, 'create_game']);
            Route::delete('/players/{id}/games', [PlayerController::class, 'delete_game']);
            Route::get('players', [PlayerController::class, 'show_players']);
            Route::get('players/{id}/games', [PlayerController::class, 'show_games']);
            Route::get('/players/ranking', [PlayerController::class, 'ranking']);
            Route::get('/players/ranking/loser', [PlayerController::class, 'lowest_ranking']);
            Route::get('/players/ranking/winner', [PlayerController::class, 'highest_ranking']);
        });

    });

