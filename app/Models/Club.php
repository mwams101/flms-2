<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Club extends Model
{
    use HasFactory;

    protected $table = 'clubs';

    //Primary key
    protected $primaryKey = 'id';

    //timestamps
    public $timestamps = true;


    protected $fillable = [
        'name',
        'description',
        'country',
        'founded',
    ];

    public function players()
    {
        return $this->hasMany(Player::class);
    }

    public function leagues()
    {
        return $this->belongsTo(League::class);
    }

    public function tables()
    {
        return $this->belongsTo(Table::class, 'club_id');
    }

}
