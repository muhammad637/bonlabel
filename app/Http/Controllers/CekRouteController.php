<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class CekRouteController extends Controller
{
    //
    public function profil(){
        return view("pages.profile",[
            'title' => 'profile'
        ]) ;
    }

    public function master(){
        return redirect('/login');
    }

    public function home(){
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
