<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Produk;

class ProdukController extends Controller
{
    public function index(){
        return view('input-produk');
    }
    public function input(Request $request){
        $validatedData = $request->validate([
            'nama'=>'required',
            'harga'=>'required',
            'jenis'=>'required',
            'minimal_pesan'=>'required',
            'kondisi'=>'required',
            'deskripsi'=>'required'
        ]);
        Produk::create($validatedData);
        return redirect('tampil-produk')->with('status', 'Data Produk Telah Dimasukan');
    }
    public function tampil(){
        $model = new Produk;
        $data=$model->all();
        return view('tampil-produk',['data'=>$data]);
    }
    public function delete($id){
        $model = Produk::find($id);
        $model->delete();
        return redirect('tampil-produk')->with('status-deleted','Data Produk Telah Dihapus');
    }
    public function edit($id){
        $model= Produk::find($id);
        // dd($model);
        return view('edit-produk')->with('post',$model);
    }
    public function update(Request $request, $id){
        $model= Produk::find($id);
        $validatedData = $request->validate([
            'nama'=>'required',
            'harga'=>'required',
            'jenis'=>'required',
            'minimal_pesan'=>'required',
            'kondisi'=>'required',
            'deskripsi'=>'required'
        ]);
        // dd($validatedData);
        Produk::where('id', $model->id)
            ->update($validatedData);
        return redirect('tampil-produk')->with('status', 'Data Produk Telah Diperbarui');
    }
}
