<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Auth;
use App\Models\User;

class AkunController extends Controller
{
    public function index(){
        return view('tampil-pengaturan');
    }
    public function update(Request $request){
        $request->validate([
            'old_password' => 'required',
            'new_password' => 'required|confirmed|min:6',
        ]);
        if(!Hash::check($request->old_password, auth()->user()->password)){
            return back()->with("status-error", "Password lama salah!");
        }
        User::whereId(auth()->user()->id)->update([
            'password' => Hash::make($request->new_password)
        ]);
        return back()->with("status", "Password berhasil diganti!");
    }
    public function delete(Request $request){
        $request->validate([
            'password' => 'required'
        ]);
        if(!Hash::check($request->password, auth()->user()->password)){
            return back()->with("status-error", "Password salah!");
        }
        $user = $request->user();
        Auth::logout();
        $user->delete();
        $request->session()->invalidate();
        $request->session()->regenerateToken();
        return redirect('/')->with('status','Akun anda berhasil dihapus!');
    }

}
