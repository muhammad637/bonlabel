<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    use HasFactory;
    protected $primaryKey = 'id_ruangan';

    protected $fillable = [
        'nama_product',
        'jenis_product',
        'limit_order',
        'jumlah_stock',
    ];
}
