<?php

namespace App\Http\Controllers;

use App\Models\Game;
use Illuminate\Http\Request;
use App\Service\EloService;

class GameController extends Controller
{
    public function index($id)
    {
        $game = Game::findOrFail($id);

        $rating = new EloService(1100, 1000, 0, 1);
        dd($rating->getEloTeam1() ,
        $rating->getEloTeam2() );
    }
}
