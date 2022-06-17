<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Game extends Model
{
    use HasFactory;

    protected $fillable = ['dice_one', 'dice_two', 'user_id', 'result', 'success_results', 'ranking', 'lowest_ranking', 'highest_ranking'];
}
