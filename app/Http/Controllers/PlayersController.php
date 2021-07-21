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
            $words = explode(' ',$searchedText);
            // Separate and search by searched word? I am not sure if that is the wanted result but i
            foreach($words as $word) {
                $query->where(function($query) use ($word) {
                    $query->where('nickname', 'LIKE', '%' . $word . '%')
                        ->orWhere('status', 'LIKE', '%' . $word . '%');
                });
            }

        }

        return $query->paginate($perPage);


    }
}
