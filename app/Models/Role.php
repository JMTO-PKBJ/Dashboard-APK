<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Role extends Model
{
    protected $fillable = [
        'name',
        // tambahkan kolom lain yang ingin Anda masukkan
    ];
    public function users()
    {
        return $this->hasMany(User::class);
    }
}
