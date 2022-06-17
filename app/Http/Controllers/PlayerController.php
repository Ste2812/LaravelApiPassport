<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use App\Models\Game;
use App\Http\Controllers\UserController;

class PlayerController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {

        return User::all();

    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $user= User::find($request->id);
        $game = new Game();
        $game->dice_one=rand(1, 6);
        $game->dice_two=rand(1, 6);
        $game->success_result=0;
        $game->result=$game->dice_one+$game->dice_two;
        $game->user_id=$request->$user;

        if ($game->result==7){

            $successResult=1;
            $game->$successResult;
            echo 'Won! ;)';

        }else{
            $successResult=0;
            $game->successResult;
            echo 'lost! try again ;(';
        }

        $game->save();

        return response()->json([$game]);

    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show_player()
    {

        return User::all();

    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Request $request)
    {

        $game = Game::find($request->user_id);
        $game->delete()->all();

        $response = 'Succesfully all plays deleted!';
        return response ($response, 200);

    }


    public function show_games(Request $request)
    {
        $game= Game::find($request->user_id);

        return response()->json([$game], 200);

    }

    public function ranking(Request $request)
    {

        $game= $request(Game::all());

        $sumGamesWon=$game->success_results;
        $ranking=0;
        $unitResults= $game->result;
        $totResults=array();
        $nGames= $game->count();

        foreach (Game::all() as $globalResults) {
            $totResults=$globalResults->result;
            $totResults+=$totResults;
        }

        for($i=0; $i<$sumGamesWon; $i++){
            $sumGamesWon=$i;
        }

        if ($unitResults==7) {
            $ranking=$totResults/$nGames;
        }

        $rankingValue=$sumGamesWon;
        $game->rankingValue=$rankingValue;
        $game->ranking=$ranking;
        $game->save();

        return response()->json([$game], 200);
    }

    public function lowest_ranking(Request $request)
    {
        $game= Game::all();
        $lowestRanking=0;




    }

    public function highest_ranking(Request $request)
    {
        $game= Game::all();
        $highestRanking=0;

    }
}
