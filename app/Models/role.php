<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class role extends Model
{
    protected $fillable = [
        'name',
        // tambahkan kolom lain yang ingin Anda masukkan
    ];
    public function users()
    {
        return $this->hasMany(user::class);
    }
}
