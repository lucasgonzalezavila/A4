<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Game extends Model
{
    protected $fillable = [
        'title', 'description', 'price', 'stock', 'image', 'developer', 'release_date', 'genre','key'
    ];

    public function makers(){
        return $this->belongsToMany(User::class, 'game_user', 'game_id', 'user_id');
    }

}
