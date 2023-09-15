<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Sampah extends Model
{
    use HasFactory;

    protected $guarded = ['id_sampah'];

    public function users()
    {
        return $this->belongsToMany(User::class, 'transaksis', 'sampah_id', 'user_id');
    }

    public function transaksis()
    {
        return $this->hasMany(Transaksi::class);
    }
}
