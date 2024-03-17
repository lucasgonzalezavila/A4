<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Subscription extends Model
{
    protected $fillable = [
        'user_id', 'active', 'start_date', 'end_date'
    ];

    // Relación con el modelo User
    public function user(){
    return $this->belongsTo(User::class, 'user_id');
    }
    
}
