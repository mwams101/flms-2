<?php

namespace App\Http\Controllers;

use App\Models\Club;
use App\Models\League;
use App\Models\Player;
use App\Models\Season;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        $context = [
            'clubs' => Club::all()->count(),
            'players' => Player::all()->count(),
            'leagues' => League::all()->count(),
            'seasons' => Season::all()->count(),
        ];

        return view('home', $context);
    }
}
