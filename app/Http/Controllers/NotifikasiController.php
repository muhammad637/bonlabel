<?php

namespace App\Http\Controllers;

use App\Models\Notifikasi;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Http\Controllers\Controller;

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

    public function mark(){
        $data = Notifikasi::where('user_id' , auth()->user()->id)->where('mark','false')->get();
        // $data = DB::table('notifikasis')->get();
        foreach($data as $not){
            Notifikasi::where('id',$not->id)->update(['mark' => 'true']);
        }
        $data = Notifikasi::where('user_id' , auth()->user()->id)->orderBy('created_at','desc')->limit(3)->get();
        return response()->json($data);
    }

    public function delAll(){
        $datas = Notifikasi::where('user_id' , auth()->user()->id)->orderBy('created_at','desc')->get();
        foreach($datas as $d){
            Notifikasi::where('id',$d->id)->delete();
        }
        return redirect()->back()->with('success', 'pesan berhasil dihapus semua');
    }

}
