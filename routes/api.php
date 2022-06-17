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
        Route::post('signup', [UserController::class, 'user_create'])->name('user_create');//separar registro usuario y registro jugador
        Route::post('login', [UserController::class, 'login'])->name('login');

        //rutas de acceso solo para usuarios logeados

        Route::group(['middleware'=>'auth:api'], function() {//subconjunto controller user para crear usuario a partir del registro
            Route::put('user-update/{id}', [UserController::class, 'user_update'])->name('user_update');
            Route::delete('user-delete/{id}', [UserController::class, 'user_delete'])->name('user_delete');
            //Route::get('index', [UserController::class, 'user_index'])->name('user_index');
            Route::post('logout', [UserController::class, 'logout'])->name('logout');
            Route::post('/players', [PlayerController::class, 'store'])->name('store');
            Route::put('/players/{id}', [PlayerController::class, 'update'])->name('update');
            Route::post('/player/{id}/games/', [PlayerController::class, 'create_game'])->name('create_game');
            Route::delete('/players/{id}/games', [PlayerController::class, 'delete_game'])->name('delete_game');
            Route::get('players', [PlayerController::class, 'show_players'])->name('show_players');
            Route::get('players/{id}/games', [PlayerController::class, 'show_games'])->name('show_games');
            Route::get('/players/ranking', [PlayerController::class, 'ranking'])->name('ranking');
            Route::get('/players/ranking/loser', [PlayerController::class, 'lowest_ranking'])->name('lowest_ranking');
            Route::get('/players/ranking/winner', [PlayerController::class, 'highest_ranking'])->name('highest_ranking');
        });

    });

