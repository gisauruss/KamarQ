<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Review extends Model
{
    protected $table = 'Review';

    protected $fillable = [
       'user_id',
       'kamar_id',
       'review_text'
    ];

    public function user(){
        return $this->belongsTo(User::class, 'user_id', 'id');
    }
    public function kamar(){
        return $this->belongsTo(Kamar::class, 'kamar_id', 'id');
    }
}
