<?php

namespace App\Models;

use App\Events\OrderStatusChanged;
use Carbon\Carbon;
use Illuminate\Database\Eloquent\Model;

class SewaKamar extends Model
{
    protected $table = 'sewa_kamar';

    protected $fillable = [
       'user_id',
       'kamar_id',
       'check_in',
       'check_out',
       'status',
       'fasilitas_tambahan',
       'deskripsi',
    ];

    protected $dispatchesEvents = [
        'updated' => OrderStatusChanged::class,
    ];

    public function user(){
        return $this->belongsTo(User::class, 'user_id', 'id');
    }
    public function kamar(){
        return $this->belongsTo(Kamar::class, 'kamar_id', 'id');
    }
}
