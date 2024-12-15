<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Likes extends Model
{
    protected $table = 'Likes';

    protected $fillable = [
       'user_id',
       'kamar_id',
    ];

    public function user(){
        return $this->belongsTo(User::class);
    }
    public function kamar(){
        return $this->belongsTo(Kamar::class);
    }
}
