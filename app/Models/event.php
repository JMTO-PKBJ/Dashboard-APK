<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class event extends Model
{
    use HasFactory;

    protected $table = 'event';

    protected $guarded = ['id'];

    public function cctv()
    {
        return $this->belongsTo(CCTV::class, 'cctv_id');
    }
}
