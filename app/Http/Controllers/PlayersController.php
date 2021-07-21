<?php

namespace App\Http\Controllers;

use App\Models\Player;
use Illuminate\Http\Request;

class PlayersController extends Controller
{
    public function index(Request $request)
    {
        return Player::query()->paginate(100);
    }
}
