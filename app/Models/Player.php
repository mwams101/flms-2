<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Player extends Model
{
    use HasFactory;

    protected $table = 'players';

    //Primary key
    protected $primaryKey = 'id';

    //timestamps
    public $timestamps = true;


    protected $fillable = [
        'first_name',
        'last_name',
        'age',
        'nationality',
        'club_id',
    ];
    public function club()
    {
        return $this->belongsTo(Club::class);
    }
}
