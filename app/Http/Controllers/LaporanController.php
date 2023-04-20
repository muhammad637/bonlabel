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
        $ruangan = Ruangan::all();
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

    public function laporanByBulan(Request $request)
    {
        $bulan = Carbon::parse($request->bulanan)->format('m');
        $tahun = Carbon::parse($request->bulanan)->format('Y');
        $orders = Order::whereMonth('created_at', $bulan)
            ->whereYear('created_at', $tahun)
            ->whereNotNull('status')
            ->get();
        $byBulan = Carbon::parse($request->bulanan)->format('M - Y');
        session()->flash('orders', $orders);
        session()->flash('pageTitle','bulan');
        session()->flash('header',"Bulan $byBulan");
        return redirect()->back();
    }
    public function laporanByRuangan(Request $request){
        $orders = Order::whereNotNull('status')->where('ruangan_id', $request->ruangan_id)->get();
        $header = $orders[0]->ruangan->nama_ruangan;
        session()->flash('orders', $orders);
        session()->flash('pageTitle', 'ruangan');
        session()->flash('header',"Ruangan $header");
        return redirect()->back();
    }

    public function exportLaporan()
    {
        $data = $this->dataLaporan(Order::whereNotNull('status')->orderBy('updated_at', 'desc')->get());
        return $data;
    }

    private function dataLaporan($orders)
    {
        $dataLaporan = [];
        foreach ($orders as $order) {
            array_push($dataLaporan, [
                'nama User' => $order->user->nama,
                'nama ruangan' => $order->ruangan->nama_ruangan,
                'nama produk' => $order->product->nama_product,
                ($order->status == null) ? "pending" : "di$order->status",
                'jumlah order' => $order->jumlah_order,
                'tanggal order' => Carbon::parse($order->created_at)->format('Y/M/d')
            ]);
        }
        $laporan = new OrdersExport([
            ['nama User', 'nama_ruangan', 'nama produk', 'status', 'jumlah order', 'tanggal order'],
            [...$dataLaporan]
        ]);
        return Excel::download($laporan, 'order.xlsx');
    }

    public function bulananExcel(Request $request)
    {
        $bulan = Carbon::parse($request->bulanan)->format('m');
        $tahun = Carbon::parse($request->bulanan)->format('Y');

        $data = $this->dataLaporan(
            Order::whereMonth('created_at', $bulan)
                ->whereYear('created_at', $tahun)
                ->whereNotNull('status')
                ->get()
        );
        return $data;
    }


    public function ruanganExcel(Request $request)
    {
        try {
            //code...
            $ruangan = $this->dataLaporan(
                Order::whereNotNull('status')->where('ruangan_id', $request->ruangan_id)->get()
            );
            return $ruangan;
        } catch (\Throwable $th) {
            //throw $th;
            return redirect()->back()->with('toast_error', $th->getMessage());
        }
    }
}
