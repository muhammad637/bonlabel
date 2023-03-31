<?php

namespace App\Http\Controllers;

use App\Models\Order;
use Illuminate\Http\Request;
use Illuminate\Routing\Controller;

class LaporanController extends Controller
{
    //
    public  function index(){
        return view('admin.pages.laporan.index',[
            'title' => 'laporan',
            'orders' => Order::orderBy('updated_at','desc')->get()
        ]);
    }
}
