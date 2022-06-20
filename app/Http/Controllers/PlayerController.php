<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use App\Models\Game;
use App\Http\Controllers\UserController;
use Illuminate\Support\Facades\Auth;

class PlayerController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return Auth::user()->id;
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
        //$game->dice_one=rand(1, 6);
        //$game->dice_two=rand(1, 6);
        //$game->success_result=0;
        //$game=$this->points=rand(true, false);
        //$game=$this->result=$this->dice_one+$this->dice_two;
        //$game->user_id=$request->$user;
        $game->user_id=$request->$user->id;
        $out=false;
        $count=1;

        while (!$out==false) {

            $input="";
            echo "tirada de dados numero: ".$count;
            $game->dice_one=rand(1, 6);
            $game->dice_two=rand(1, 6);

            echo "dado 1: ".$game->dice_one+" dado 2: "+$game->dice_two;
            $result= $game->dice_one+$game->dice_two;
            $result=$this->result=$result;
            echo "dado 1: ".$game->dice_one." dado 2: ".$game->dice_two;
            echo "resultado jugada: ".$result;


            if ($game->result==7){

                $game->points=1;
                echo 'Won! ;)';

            }else{
                $game->points=0;
                ;
                echo 'lost! try again ;(';
            }
            if($out==false){
                $game->save();
            }else{

            echo "volver a tirar otra mano de dados?(S/N)";
            sscanf($input, "%d");
            if($input==stristr($input, "n")||$input==stristr($input, "N")){
                $out=false;
            }else{
                $out=true;
            }
        }
        $count++;
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

    public function create_player()
    {


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
