<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Complaint extends Model
{
    protected $table = 'Complaint';

    protected $fillable = [
        'user_id',
        'kamar_id',
        'complaint_text'
    ];

    public function kamar(){
        return $this->belongsTo(Kamar::class, 'kamar_id', 'id');
    }

    public function user(){
        return $this->belongsTo(User::class, 'user_id', 'id');
    }
}
