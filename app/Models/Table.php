<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Table extends Model
{
    use HasFactory;

    protected $table = 'tables';

    //Primary key
    protected $primaryKey = 'id';

    //timestamps
    public $timestamps = true;


    protected $fillable = [
        'season_id',
        'club_id',
        'matches_played',
        'won',
        'drawn',
        'lost',
        'goals_scored',
        'goals_conceded',
        'goal_difference',
        'points',
    ];

    public function season()
    {
        return $this->belongsTo('App\Models\Season', 'season_id');
    }
    public function club()
    {
        return $this->belongsTo('App\Models\Club', 'Club_id');
    }
}

