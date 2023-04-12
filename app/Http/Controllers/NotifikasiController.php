<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\NotifUser;
use App\Models\Notifikasi;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Http\Controllers\Controller;

class NotifikasiController extends Controller
{
    //

    public function index()
    {
        $notifikasi = User::with(['notifikasi' => function($query){
            $query->orderBy('created_at','desc');
        }])->where('id', auth()->user()->id)->first()->notifikasi;
        return view('pages.notifikasi', [
            'title' => 'notifikasi',
            'notifikasis' => $notifikasi
        ]);
    }
    public function show(Notifikasi $notif)
    {
    }

    public function delete(Notifikasi $notif)
    {
        $notif->delete();
        return redirect('/notifikasi');
    }

    public function mark()
    {
        $datas = User::with('notifikasi')->where('id', auth()->user()->id)->first();
        $data = $datas->notifikasi->where('mark', 'false');
        // $data = DB::table('notifikasis')->get();
        foreach ($data as $not) {
            Notifikasi::where('id', $not->id)->update(['mark' => 'true']);
        }
        $data = User::with(['notifikasi' => function ($query) {
            $query->orderBy('created_at', 'desc')->limit(3);
        }])->orderBy('created_at', 'desc')->where('id', auth()->user()->id)->first()->notifikasi;
        return response()->json($data);
    }

    public function delAll()
    {
        $datas = Notifikasi::where('user_id', auth()->user()->id)->orderBy('created_at', 'desc')->get();
        foreach ($datas as $d) {
            Notifikasi::where('id', $d->id)->delete();
        }
        return redirect()->back()->with('success', 'pesan berhasil dihapus semua');
    }
}
