<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Support\Facades\Validator;
use Illuminate\Validation\Rule;

class Product extends Model
{
    use HasFactory;
    protected $primaryKey = 'id';

    protected $guarded = ['id'];

    protected $attributes = [
        'status_product' => 'aktif',
    ];
     
    
//    public static $rule = Validator::make($data, [
//         'e' => [
//             'required',
//             Rule::unique('users')->ignore($user->id),
//         ],
//     ]);
    
}
