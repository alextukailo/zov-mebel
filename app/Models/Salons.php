<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Salons extends Model
{
    protected $fillable = [
        'name_salon',
        'city_id',
        'address'
    ];

    public function city()
    {
        return $this->hasOne(Cities::class, 'id', 'city_id');
    }
}
