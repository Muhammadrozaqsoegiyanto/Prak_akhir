<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Pesanan extends Model
{
    use HasFactory;
    /**
    * The primary key associated with the table.
    *
    * @var string
    * @var bool
    * @var array
    */
    protected $primaryKey = 'kode_pemesanan';
    public $incrementing = false;
    protected $fillable=[
        'kode_pemesanan',
        'jumlah',
        'tanggal_pemesanan',
        'tanggal_pengiriman',
        'resi',
        'kurir',
        'nama_produk',
        'produk_id'
    ];
}
