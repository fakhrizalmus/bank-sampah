<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Transaksi extends Model
{
    use HasFactory;

    protected $guarded = ['id_transaksi'];

    public function users()
    {
        return $this->belongsTo(User::class, 'user_id', 'id');
    }

    public function sampahs()
    {
        return $this->belongsTo(Sampah::class, 'sampah_id', 'id_sampah');
    }
}
