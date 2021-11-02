<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Season extends Model
{
    use HasFactory;

    protected $table = 'seasons';

    //Primary key
    protected $primaryKey = 'id';

    //timestamps
    public $timestamps = true;


    protected $fillable = [
        'league_id',
        'name',
        'start_date',
        'end_date',
    ];

    public function league()
    {
        return $this->belongsTo(League::class , 'league_id');
    }
    public function table()
    {
        return $this->hasMany(Table::class);
    }

}
