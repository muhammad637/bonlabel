<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Ruangan extends Model
{
    use HasFactory;

    protected $guarded = ['id_ruangan'];

    protected $primaryKey = 'id_ruangan';

    public function user(){
       return $this->belongsTo(User::class,'id_user');
    }
}
