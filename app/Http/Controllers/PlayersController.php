<?php

namespace App\Http\Controllers;

use App\Models\Player;
use Illuminate\Http\Request;

class PlayersController extends Controller
{
    public function index(Request $request)
    {
        $searchedText = $request->get('q') ?? null;
        $perPage = max($request->get('per_page', 100), 500);


        $playerById = Player::where('id', $searchedText)->first();
        if ($playerById !== null) {
            return ['data' => $playerById, 'id_match' => true];
        }

        $query = Player::query();
        if ($searchedText !== null) {
            // TODO: separate and search by searched word? I am not sure if that is the wanted result

            $query->orWhere(function($query) use ($searchedText) {
               $query->where('nickname', 'LIKE', '%' . $searchedText . '%')
                   ->orWhere('status', 'LIKE', '%' . $searchedText . '%');
            });
        }

        return $query->paginate($perPage);


    }
}
