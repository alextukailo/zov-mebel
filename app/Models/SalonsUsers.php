<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Salons extends Model
{
    protected $fillable = [
        'user_id',
        'salon_id',
    ];

    public function user()
    {
        return $this->hasOne(User::class, 'id', 'user_id');
    }

    public function salon()
    {
        return $this->hasOne(Salons::class, 'id', 'salon_id');
    }
}
