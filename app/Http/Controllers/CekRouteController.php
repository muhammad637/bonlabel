<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class CekRouteController extends Controller
{
    //
    public function master(){
        return view('errors.403');
    }
    public function home(){
        return "home";
    }
    public function cekLevel(){
        $path = '/login';
        if(auth()->user()){
            if (auth()->user()->cekLevel == 'admin') {
                $path = '/dashboardAdmin';
            }else{
                $path= '/dashboardUser';
            }
        }
        return redirect($path);
    }
}
