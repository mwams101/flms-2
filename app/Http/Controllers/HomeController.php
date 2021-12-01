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
            'clubs' => Club::take(4)->get(),
            'players' => Player::take(4)->get(),
            'leagues' => League::take(4)->get(),
            'seasons' => Season::take(4)->get()
        ];

        return view('home', $context);
    }
}
