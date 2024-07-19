<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Cctv extends Model
{
    use HasFactory;

    protected $table = 'cctv';

    // protected $primaryKey = 'cctv_id';

    protected $guarded = ['id'];

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
