<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;


class Team extends Model
{
    use HasFactory;

    public function players()
    {
        return $this->hasMany(Player::class);
    }
    
    public function comments()
    {
        return $this->hasMany(Comments::class);
    }
}
