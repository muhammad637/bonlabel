<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Routing\Controller;
use Illuminate\Support\Facades\Auth;

class LoginController extends Controller
{
    //

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
                    return redirect()->intended('/dashboardAdmin');
                } elseif(auth()->user()->cekLevel == "user" && auth()->user()->status == "aktif"){
                    # code...
                    return redirect('/dashboardUser');
                }else{
                    return "maaf";
                }
            }
        } catch (\Throwable $th) {
            //throw $th;
            return $th->getMessage();
        }

        return "salah";
    }
    public function logout(Request $request){
        Auth::logout();
 
        $request->session()->invalidate();
 
        $request->session()->regenerateToken();
     
        return redirect('/login');
    }
}
