<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class konser extends Model
{
    use HasFactory;

    protected $fillable = [
        'nama',
        'tanggal',
        'tempat',
        'harga',
        'deskripsi',
        'poster',
    ];

    public function transaksi()
    {
        return $this->hasMany(transaksi::class);
    }
}
