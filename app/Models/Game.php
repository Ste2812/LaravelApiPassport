<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class Game extends Model
{
    use HasFactory;

    protected $fillable = ['dice_one', 'dice_two', 'user_id', 'result', 'success_results', 'ranking', 'lowest_ranking', 'highest_ranking'];

    public function user()
    {
        return $this->belongsTo(User::class);

    }

    $updateRanking =DB::table('game')->where('id', '=', $id)->update(['ranking' => $ranking]);
}
