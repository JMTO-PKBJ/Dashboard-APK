<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Event extends Model
{
    use HasFactory;

    protected $table = 'event';

    protected $fillable = [
        'cctv_id',
        'event_waktu',
        'event_lokasi',
        'event_class',
        'event_gambar',
    ];

    public function cctv()
    {
        return $this->belongsTo(CCTV::class, 'cctv_id');
    }
}
