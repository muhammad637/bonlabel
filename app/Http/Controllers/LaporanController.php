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
    
        $users = User::all();
        // return $users;
        return view('admin.pages.laporan.index', [
            'title' => 'laporan',
            'orders' => Order::whereNotNull('status')->orderBy('updated_at', 'desc')->get(),
            'ruangan' => $ruangan
        ]);
    }


    public function exportLaporan()
    {
        $data = $this->dataLaporan(Order::whereNotNull('status')->orderBy('updated_at','desc')->get());
        return $data;
    }

    private function dataLaporan($orders){
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
            Order::whereMonth('created_at',$bulan)
            ->whereYear('created_at',$tahun)
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
                Order::where('ruangan_id', $request->ruangan_id)->get()
            );
            return $ruangan;
        } catch (\Throwable $th) {
            //throw $th;
            return redirect()->back()->with('toast_error',$th->getMessage());
        }
    }
}
