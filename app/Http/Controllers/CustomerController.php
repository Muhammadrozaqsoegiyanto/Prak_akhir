<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Customer;

class CustomerController extends Controller
{
    public function index(){
        return view('input-customer');
    }
    public function tampil(){
        $model = new Customer;
        $data=$model->all();
        return view('tampil-customer',['data'=>$data]);
    }
    public function input(Request $request){
        $validatedData = $request->validate([
            'ktp'=>['required','min:3','unique:Customers'],
            'nama'=>'required',
            'no_hp'=>'required|min:1',
            'alamat'=>'required',
            'usia'=>'required'
        ]);
        Customer::create($validatedData);
        return redirect('tampil-customer')->with('status', 'Data Customer Telah Dimasukan');
    }
    public function delete($ktp){
        $model = Customer::find($ktp);
        $model->delete();
        return redirect('tampil-customer')->with('status-deleted','Data Customer Telah Dihapus');
    }
    public function edit($id){
        $model= Customer::find($id);
        // dd($model);
        return view('edit-customer')->with('post',$model);
    }
    public function update(Request $request, $ktp){
        $model= Customer::find($ktp);
        $rules = [
            'nama'=>'required',
            'no_hp'=>'required|min:1',
            'alamat'=>'required',
            'usia'=>'required'
        ];
        if ($request->ktp != $model->ktp) {
            $rules['ktp'] = 'required|min:3|unique:Customers';
        }
        $validatedData=$request->validate($rules);
        Customer::where('ktp', $model->ktp)
            ->update($validatedData);
        return redirect('tampil-customer')->with('status', 'Data Customer Telah Diperbarui');
    }
}
