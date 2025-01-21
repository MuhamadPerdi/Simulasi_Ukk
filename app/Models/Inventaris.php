<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Inventaris extends Model
{
    use HasFactory;

    protected $table  = 'inventaris';

    protected $fillable = [
        'id_inventaris',
        'nama_barang',
        'kondisi',
        'stok',
        'tanggal_register',
    ];

    public function peminjaman()
    {
        return $this->hasMany(Peminjaman::class, 'id_inventaris', 'id');
    }

    public function peminjaman_barang()
    {
        return $this->hasMany(Peminjaman::class, 'nama_barang', 'nama_barang');
    }
}
