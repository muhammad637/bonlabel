<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Order extends Model
{
    use HasFactory;

    protected $guarded = [
        'id',
    ];
    // protected $with = ['user','ruangan','product'];
    public function user(){
        return $this->belongsTo(User::class,'user_id');
    }
    public function ruangan(){
        return $this->belongsTo(Ruangan::class,'ruangan_id');
    }
    public function product(){
        return $this->belongsTo(Product::class,'product_id');
    }


    public static function aksiOrderan($pengorder, $msg = "orderan diterima silahkan ambil di ruangan IT"){
        return [
            'nama_perubah' => auth()->user()->nama,
            'pengorder' => $pengorder,
            'msg' => $msg
        ];
    }

}
