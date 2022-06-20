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
        Route::post('players', [UserController::class, 'user_create'])->/*middleware('can:store.player')->*/name('store.player');
        Route::post('login', [UserController::class, 'login'])->name('login');

        //rutas de acceso solo para usuarios logeados

        Route::group(['middleware'=>'auth:api'], function() {

            Route::delete('user-delete/{id}', [UserController::class, 'user_delete'])->middleware('can:user.delete')->name('user.delete');
            Route::get('index', [UserController::class, 'user_index'])->middleware('can:index')->name('index');
            Route::post('logout', [UserController::class, 'logout'])->middleware('can:logout')->name('logout');
            Route::put('/players/{id}', [UserController::class, 'user_update'])->middleware('can:update')->name('update');
            Route::post('/players/{id}/games/', [PlayerController::class, 'store'])->middleware('can:store.game')->name('store.game');
            Route::delete('/players/{id}/games', [PlayerController::class, 'delete_game'])->middleware('can:delete.game')->name('delete.game');
            Route::get('players', [PlayerController::class, 'show_players'])->middleware('can:show.player')->name('show.players');
            Route::get('players/{id}/games', [PlayerController::class, 'show_games'])->middleware('can:show.games')->name('show.games');
            Route::get('/players/ranking', [PlayerController::class, 'ranking'])->middleware('can:ranking')->name('ranking');
            Route::get('/players/ranking/loser', [PlayerController::class, 'lowest_ranking'])->middleware('can:lowest.ranking')->name('lowest.ranking');
            Route::get('/players/ranking/winner', [PlayerController::class, 'highest_ranking'])->middleware('can:highest.ranking')->name('highest.ranking');
        });

    });

    Route::get('/pruebaController', [PlayerController::class, 'store']);

