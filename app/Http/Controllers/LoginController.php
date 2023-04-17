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
            //validasi login
            $credential = $request->validate([
                'username' => 'required',
                'password' => 'required',
            ]);
            // jika user dan password  ditemukan 
            if(Auth::attempt($credential)){
                // if(auth()->user()->status == 'nonaktif'){
                //     return redirect()->back()->with('error','status anda nonaktif');
                // }
                // else{
                //     return 'kok iso?';
                // }
                $request->session()->regenerate();
                if (auth()->user()->cekLevel == "admin" ) {
                    # jika yang login admin masuk ke halaman dashboard admin
                    return redirect(route('dashboard.admin'))->with('success','selamat datang '.auth()->user()->nama);
                } elseif(auth()->user()->cekLevel == "user" ){
                //     # jika yang login user masuk ke halaman dashboard user
                    return redirect(route('dashboard.user'))->with('success','selamat datang '.auth()->user()->nama);
                }
            }
            
        } catch (\Throwable $th) {
            //throw $th;
            return $th->getMessage();
        }
        return redirect('/login')->with('toast_error', 'user atau password anda salah');
    }

    public function logout(Request $request){
        return  $this->notifLogout($request,'success','logout berhasil');
    }

    public function logNonaktif(Request $request){
        return  $this->notifLogout($request,'toast_error','status anda nonaktif');
    }

    public function notifLogout($request, $toast,$msg){
        Auth::logout();
        $request->session()->invalidate();
        $request->session()->regenerateToken();
        return redirect(route('login'))->with($toast,$msg);
    }
}
