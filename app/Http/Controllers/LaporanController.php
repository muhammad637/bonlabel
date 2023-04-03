<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\Order;
use Illuminate\Http\Request;
use Illuminate\Routing\Controller;
use Rap2hpoutre\FastExcel\Facades\FastExcel;

class LaporanController extends Controller
{
    //
    public  function index(){
        $users = User::all();
        // return $users;
        return (new FastExcel($users))->export('file.xlsx');
        // return view('admin.pages.laporan.index',[
        //     'title' => 'laporan',
        //     'orders' => Order::orderBy('updated_at','desc')->get()
        // ]);
    }
}
