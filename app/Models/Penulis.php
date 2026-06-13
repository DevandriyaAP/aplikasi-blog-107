<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Penulis extends Model
{
    protected $table = 'penulis';

    protected $fillable = [
        'nama',
        'email',
        'foto'
    ];

    public function artikel()
    {
        return $this->hasMany(Artikel::class, 'penulis_id');
    }
}
