<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Customer;
use App\Models\Pesanan;
use App\Models\Produk;


class DashboardController extends Controller
{
    public function index(){
        $data=Pesanan::select()->get()->groupBy('nama_produk');
        // dd($data);
        $jumlah_customer=Customer::count();
        $jumlah_penjualan=Pesanan::count();
        $jumlah_produk=Produk::count();
        $jumlahs=[];
        $pesananCount=[];
        foreach($data as $jumlah => $values){
            $jumlahs[]=$jumlah;
            $pesananCount[]=count($values);
        }
        return view('dashboard',[
                    'jumlah_customer'=>$jumlah_customer,
                    'jumlah_penjualan'=>$jumlah_penjualan,
                    'jumlah_produk'=>$jumlah_produk,
                    'jumlahs'=>$jumlahs,
                    'pesananCount'=>$pesananCount
        ]);
    }
}
