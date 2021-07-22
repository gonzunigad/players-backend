<?php

namespace App\Http\Controllers;

use App\Models\Player;
use Illuminate\Http\Request;

class PlayersController extends Controller
{
    public function index(Request $request)
    {
        $searchedText = $request->get('q') ?? null;
        $perPage = min($request->get('per_page', 100), 500);


        $playerById = Player::where('id', $searchedText)->first();
        if ($playerById !== null) {
            return ['data' => $playerById, 'id_match' => true];
        }

        return Player::search($searchedText)->paginate($perPage);


    }
}
