<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class LoginController extends Controller
{
    public function index(){
        return view('tampil-login');
    }
    public function authenticate( Request $request){
        $credentials = $request->validate([
            'username' => 'required',
            'password' => 'required'
        ]);
        $remember = (request()->remember) ? true : false;
        // dd($remember);
        if (Auth::attempt($credentials,$remember)) {
            $request->session()->regenerate();
            return redirect()->intended('dashboard');
        }
        return back()->with('status-error','Email Atau Password Salah!');
        // dd('berhasil login');
    }
    public function logout(Request $request){
        // dd('haloo');
        Auth::logout();
        $request->session()->invalidate();
        $request->session()->regenerateToken();
        return redirect('/');
    }
}
