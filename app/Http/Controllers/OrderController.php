<?php

namespace App\Http\Controllers;
use Illuminate\Support\Arr;
use App\Models\Pesanan;
use App\Models\Produk;

use Illuminate\Http\Request;

class OrderController extends Controller
{
    public function index(){
        $produk = Produk::all();
        return view('input-order',compact('produk'));
    }
    public function input(Request $request){
        $validatedData = $request->validate([
            'produk_id'=>'required',
            'kode_pemesanan'=>['required','min:3','unique:Pesanans'],
            'jumlah'=>'required','integer',
            'tanggal_pemesanan'=>'required', 'date',
            'tanggal_pengiriman'=>'required', 'date',
            'resi'=>'required|unique:Pesanans',
            'kurir'=>'required'
        ]);

        $id=$request->produk_id;
        $model=Produk::find($id);
        $nama=$model->nama;
        // dd($nama);
        Pesanan::create([
            'produk_id'=>$validatedData['produk_id'],
            'kode_pemesanan'=>$validatedData['kode_pemesanan'],
            'jumlah'=>$validatedData['jumlah'],
            'tanggal_pemesanan'=>$validatedData['tanggal_pemesanan'],
            'tanggal_pengiriman'=>$validatedData['tanggal_pengiriman'],
            'resi'=>$validatedData['resi'],
            'kurir'=>$validatedData['kurir'],
            'nama_produk'=>$nama
        ]);
        // dd('Input Order Berhasil');
        return redirect('tampil-order')->with('status', 'Data Pemesanan Telah Dimasukan');
    }
    public function tampil(){
        $model = new Pesanan;
        $data=$model->all();
        return view('tampil-order',['data'=>$data]);
    }
    public function delete($id){
        $model = Pesanan::find($id);
        $model->delete();
        return redirect('tampil-order')->with('status-deleted','Data Produk Telah Dihapus');
    }
    public function edit($id){
        $model= Pesanan::find($id);
        $produk = Produk::all();
        return view('edit-order',compact('produk'))->with('post',$model);
    }
    public function update(Request $request, $id){
        // dd($id);
        $model= Pesanan::find($id);
        // dd($model->id);
        $idProduk=$request->produk_id;
        $produk=Produk::find($idProduk);
        $nama=$produk->nama;
        $rules = [
            'produk_id'=>'required',
            'jumlah'=>'required','integer',
            'tanggal_pemesanan'=>'required', 'date',
            'tanggal_pengiriman'=>'required', 'date',
            'kurir'=>'required',
        ];
        // dd($model->kode_pemesanan);

        if($request->kode_pemesanan != $model->kode_pemesanan) {
            $rules['kode_pemesanan']=['required','min:3','unique:pesanans'];
        }
        elseif($request->resi != $model->resi) {
            $rules['resi']=['required','unique:pesanans'];
        }

        // dd($validatedData['nama_produk']);
        $validatedData=$request->validate($rules);
        // $array = array_add($validatedData, 'nama_produk', $nama);
        $validatedData['nama_produk']=$nama;
        // dd($validatedData);
        Pesanan::where('kode_pemesanan', $model->kode_pemesanan)
            ->update($validatedData);
            // dd('behasil');
        return redirect('tampil-order')->with('status', 'Data Pesanan Telah Diperbarui');
    }
}
