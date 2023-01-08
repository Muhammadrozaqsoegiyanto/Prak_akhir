<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Produk extends Model
{
    use HasFactory;
    /**
    * The primary key associated with the table.
    *
    * @var string
    * @var bool
    * @var array
    */
    protected $fillable=[
        'nama',
        'harga',
        'jenis',
        'minimal_pesan',
        'kondisi',
        'deskripsi'
    ];

    public function pesanan()
    {
        return $this->hasMany(Pesanan::class, 'foreign_key');
    }
}
