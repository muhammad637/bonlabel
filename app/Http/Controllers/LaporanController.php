<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\Order;
use Illuminate\Http\Request;
use App\Exports\OrdersExport;
use App\Models\Ruangan;
use Carbon\Carbon;
use Illuminate\Routing\Controller;
use Maatwebsite\Excel\Facades\Excel;
use Rap2hpoutre\FastExcel\Facades\FastExcel;

class LaporanController extends Controller
{
    //
    public  function index()
    {
        $ruangan = Ruangan::all()->sortBy('nama_ruangan');
        // return $users;
        $orders = Order::whereNotNull('status')->orderBy('updated_at', 'desc')->get();
        if (session()->has('orders')) {
            # code...
            $orders = session()->get('orders');
        }
        return view('admin.pages.laporan.index', [
            'title' => 'laporan',
            'orders' => $orders,
            'ruangan' => $ruangan,
            // 'header' => 'Semua'
        ]);
    }

    public function laporanAll(){
        $orders = Order::whereNotNull('status')->orderBy('updated_at', 'desc')->get();
        session()->flash('orders',$orders);
        session()->flash('pageTitle','semua');
        session()->flash('header','list laporan semua');
        return redirect()->back();
    }

    public function laporanByBulan(Request $request)
    {
        $bulan = Carbon::parse($request->bulanan)->format('m');
        $tahun = Carbon::parse($request->bulanan)->format('Y');
        $orders = Order::whereMonth('created_at', $bulan)
            ->whereYear('created_at', $tahun)
            ->whereNotNull('status')
            ->get();
            
            session()->flash('pageTitle','bulan');
            session()->flash('header','orderan pada bulan ini masih kosong');
            $byBulan = Carbon::parse($request->bulanan)->format('M - Y');
            session()->flash('orders', 'tidak ada');
            if (count($orders) > 0) {
                # code...
                session()->flash('orders', $orders);
                session()->flash('header'," List Laporan Bulan $byBulan");
            }
        return redirect()->back();
    }
    public function laporanByRuangan(Request $request){
        $ruangan = Ruangan::where('nama_ruangan', $request->nama_ruangan)->first();
        $orders = Order::whereNotNull('status')->where('ruangan_id', $ruangan->id)->get();
        session()->flash('header',"orderan di ruangan $request->nama_ruangan");
        session()->flash('teks',"orderan di ruangan $request->nama_ruangan masih kosong");
        session()->flash('orders', 'tidak ada');
        if (count($orders) > 0) {
            # code...
            $header = $orders[0]->ruangan->nama_ruangan;
            session()->flash('orders', $orders);
            session()->flash('header'," List laporan Ruangan $header");
        }
        session()->flash('pageTitle', 'ruangan');
        return redirect()->back();
    }

    public function exportLaporan()
    {
        $data = $this->dataLaporan(Order::whereNotNull('status')->orderBy('updated_at', 'desc')->get(), 'LIST LAPORAN');
        return $data;
    }

    private function dataLaporan($orders, $judul = 'LIST LAPORAN')
    {
    
        $dataLaporan = [];
        foreach ($orders as $order) {
            array_push($dataLaporan, [
                'tanggal order' => Carbon::parse($order->created_at)->format('d/M/Y'),
                'nama User' => $order->user->nama,
                'nama ruangan' => $order->ruangan->nama_ruangan,
                'nama produk' => $order->product->nama_product,
                ($order->status == null) ? "pending" : "di$order->status",
                'jumlah order' => $order->jumlah_order
             
            ]);
        }
        $laporan = new OrdersExport([
            [$judul],
            ['tanggal order', 'nama User', 'nama_ruangan', 'nama produk', 'status', 'jumlah order', ],
            [...$dataLaporan]
        ]);
        return Excel::download($laporan, 'order.xlsx');
    }

   
    public function bulananExcel(Request $request)
    {
        $byBulan = Carbon::parse($request->bulanan)->format('M Y');
        $bulan = Carbon::parse($request->bulanan)->format('m');
        $tahun = Carbon::parse($request->bulanan)->format('Y');
        $data = $this->dataLaporan(
            Order::whereMonth('created_at', $bulan)
                ->whereYear('created_at', $tahun)
                ->whereNotNull('status')
                ->get(), "LIST LAPORAN BULAN $byBulan"
        );
        return $data;
    }


    public function ruanganExcel(Request $request)
    {
        try {
            //code...
            $ruang = Ruangan::find($request->ruangan_id);
            return $ruang;
            $ruangan = $this->dataLaporan(
                Order::whereNotNull('status')->where('ruangan_id', $request->ruangan_id)->get(), "LIST LAPORAN BY RUANGAN $ruang->nama_ruangan"
            );
            return $ruangan;
        } catch (\Throwable $th) {
            //throw $th;
            return redirect()->back()->with('toast_error', $th->getMessage());
        }
    }
}
