<?php

namespace App\Http\Controllers;

use App\Models\Notifikasi;
use Illuminate\Http\Request;

class NotifikasiController extends Controller
{
    //

    public function index()
    {
        $notifikasi = Notifikasi::where('user_id', auth()->user()->id)->latest()->get();
        return view('pages.notifikasi', [
            'title' => 'notifikasi',
            'notifikasis' => $notifikasi
        ]);
    }
    public function show(Notifikasi $notif){        
    }

    public function delete(Notifikasi $notif){
        $notif->delete();
        return redirect('/notifikasi');
    }

    public function delAll(){
        $notifs = Notifikasi::where('user_id' , auth()->user()->id)->get();
        foreach($notifs as $not){
            Notifikasi::where('id',$not->id)->delete();
        }
        return redirect()->back();
    }

}
