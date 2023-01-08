<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use App\Models\User;

class RegisterController extends Controller
{
    public function index(){
        return view('register');
    }
    public function register(Request $request){
        $validatedData =$request->validate([
            'name'=>'required|max:255',
            'username'=>['required','min:3','unique:users'],
            'email'=>'required|email:dns|unique:users',
            'password'=>'min:6|required_with:konfirmasi_password|same:konfirmasi_password',
            'konfirmasi_password'=>'required|min:6',
        ]);
        $validatedData['password']=Hash::make($validatedData['password']);
        User::create($validatedData);
        // dd('berhasil');
        return redirect('/')->with('status', 'Registrasi Berhasil');
    }
}
