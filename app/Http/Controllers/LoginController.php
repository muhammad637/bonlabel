<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Routing\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Validator;

class LoginController extends Controller
{
    //

    public function login(){
        return view('login');
    }

    public function authenticate(Request $request){
        try {
            //code...
            $credential = $request->validate([
                'username' => 'required',
                'password' => 'required',
            ]);
            // dd($credential);
            if(Auth::attempt($credential)){
                $request->session()->regenerate();
                if (auth()->user()->cekLevel == "admin" && auth()->user()->status == 'aktif') {
                    # code...
                    return redirect('/dashboardAdmin')->with('success','selamat datang '.auth()->user()->nama);
                } elseif(auth()->user()->cekLevel == "user" && auth()->user()->status == "aktif"){
                    # code...
                    return redirect('/dashboardUser')->with('success','selamat datang '.auth()->user()->nama);
                }else{
                    return redirect('cek');
                }
            }
            
        } catch (\Throwable $th) {
            //throw $th;
            return $th->getMessage();
        }
        return redirect('/login')->with('toast_error', 'user atau password anda salah');
    }
    public function logout(Request $request){
        Auth::logout();
 
        $request->session()->invalidate();
 
        $request->session()->regenerateToken();
     
        return redirect('/login');
    }
}
