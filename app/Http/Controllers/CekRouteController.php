<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class CekRouteController extends Controller
{
    //
    public function profil(){
        return view("admin.pages.user-profile",[
            'title' => 'user-profile'
        ]) ;
    }

    public function master(){
        return redirect('/login');
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
