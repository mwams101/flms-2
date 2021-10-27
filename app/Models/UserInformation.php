<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class UserInformation extends Model
{
    use HasFactory;

    protected $table = 'user_informations';

    protected $primaryKey = 'id';

    public $timestamps = true;

    protected $fillable = [
        'first_name',
        'last_name',
    ];

    public function user()
    {
        return $this->belongsTo('App\Models\User', 'user_id');
    }


}
