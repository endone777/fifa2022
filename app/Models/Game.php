<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Game extends Model
{
    use HasFactory;
    protected $original = [''];
    protected $table = 'games';

    protected $fillable = [
        'team_1',
        'team_2',
        'score_team_1',
        'score_team_2',
        'elo_team_1',
        'elo_team_2',
    ];
    protected $guarded = ['*'];
}
