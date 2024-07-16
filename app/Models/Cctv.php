<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Cctv extends Model
{
    use HasFactory;

    protected $table = 'cctv';

    // protected $primaryKey = 'cctv_id';

    protected $fillable = [
        'cctv_ruas',
        'roles_id',
        'cctv_lokasi',
        'cctv_waktu',
        'cctv_video',
        'cctv_status',
    ];

    protected $casts = [
        'cctv_waktu' => 'datetime',
    ];

    // Relationship with User (assuming roles_id refers to user's id)
    public function user()
    {
        return $this->belongsTo(User::class, 'roles_id');
    }
    public function events()
    {
        return $this->hasMany(Event::class);
    }
}
