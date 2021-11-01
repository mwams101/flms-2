<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class League extends Model
{
    use HasFactory;

    protected $table = 'leagues';

    //Primary key
    protected $primaryKey = 'id';

    //timestamps
    public $timestamps = true;


    protected $fillable = [
        'league_name',
        'description',
    ];

    public function clubs()
    {
        return $this->hasMany(Club::class, 'id');
    }
    public function seasons()
    {
        return $this->belongsTo(Season::class);
    }


}

