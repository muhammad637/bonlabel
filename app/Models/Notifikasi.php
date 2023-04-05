<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Notifikasi extends Model
{
    use HasFactory;

    protected $guarded = ['id'];
    // protected $with = ['user'];
    public function user(){
        return $this->belongsTo(User::class,'user_id');
    }

    public static function notif($tb,$msg,$jn,$st) {
        return [
            'nama_table' => $tb,
            'msg' => $msg,
            'user_id' => auth()->user()->id,
            'jenis_notifikasi' => $jn,
            'status' => $st
        ];
     }
}
