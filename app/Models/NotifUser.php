<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class NotifUser extends Model
{
    use HasFactory;
    // protected $table = 'notifikasi_user';
    protected $guarded = ['id'];
    protected $attributes = ['mark' => 'false'];

    // public function notifikasi(){
    //     return $this->belongsToMany(Notifikasi::class,'notifikasi_id');
    // }

    // public function user(){
    //     return $this->belongsToMany(User::class,'user_id');
    // }
    
}
