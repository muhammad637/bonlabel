<?php

namespace App\Http\Controllers;

use App\Models\Ruangan;
use App\Models\Notifikasi;
use Illuminate\Http\Request;
use Illuminate\Validation\Rule;
use Illuminate\Routing\Controller;
use Illuminate\Support\Facades\Validator;

class RuanganController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        return view('admin.pages.Ruangan.listRuangan', [
            'ruangans' => Ruangan::all(),
            'title' => 'ruangan'
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        // return view('admin.pages.Ruangan.createRuangan');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
        // return $request->all();
        $notif = Notifikasi::notif('ruangan', 'data ruangan berhasil ditambahkan', 'tambah', 'berhasil');
            //code...
            $validatedData = Validator::make($request->validate(
                [
                    'nama_ruangan' => 'required',
                    'no_telephone' => 'required|unique:ruangans',
                    'status' => ''
                ]
            ));
            if($validatedData->fails()){
                $notif['msg'] = 'data ruangan gagal ditambahkan';
                $notif['status'] = 'gagal';
                Notifikasi::create($notif);
                return redirect()->back()->with('toast_error',$notif['msg']);
            }
            $validatedData['status'] = 'aktif';
            Ruangan::create($validatedData);
            Notifikasi::create($notif);
            return redirect()->back()->with('toast_success',$notif['msg']);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Ruangan  $ruangan
     * @return \Illuminate\Http\Response
     */
    public function show(Ruangan $ruangan)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Ruangan  $ruangan
     * @return \Illuminate\Http\Response
     */
    public function edit(Ruangan $ruangan)
    {
        //
        // return view('admin.pages.Ruangan.editRuangan',[
        //     'ruangan' => $ruangan,
        // ]);
        
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Ruangan  $ruangan
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Ruangan $ruangan)
    {

        //
        $notif = Notifikasi::notif('ruangan', 'data ruangan berhasil diupdate', 'update', 'berhasil');
            //code...
            $validatedData = Validator::make($request->validate(
                [
                    'nama_ruangan' => 'required',
                    'no_telephone' => 'required|'.Rule::unique('users')->ignore($ruangan->id),
                    'status' => ''
                ]
            ));
            if($validatedData->fails()){
                $notif['msg'] = 'data ruangan gagal diupdate';
                $notif['status'] = 'gagal';
                Notifikasi::create($notif);
                return redirect()->back()->with('toast_error',$notif['msg']);
            }
            Notifikasi::create($notif);
            $validatedData['status'] = 'aktif';
            Ruangan::where('id',$ruangan->id)->update($validatedData);
            return redirect()->back()->with('toast_success',$notif['msg']);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Ruangan  $ruangan
     * @return \Illuminate\Http\Response
     */
    public function destroy(Ruangan $ruangan)
    {
        //
    }

    public function nonaktif(Ruangan $ruangan)
    {

        // return "tes";
            //code...
            $notif = Notifikasi::notif('ruangan', 'data ruangan berhasil dinonaktifkan', 'nonaktif', 'berhasil');
            Notifikasi::create($notif);
            $status = 'nonaktif';
            Ruangan::where('id', $ruangan->id)->update(['status' => $status]);
            return redirect()->back()->with('toast_success',$notif['msg']);
    }
    public function aktif(Ruangan $ruangan)
    {
            //code...
            $notif = Notifikasi::notif('ruangan', 'data ruangan berhasil diaktifkan', 'aktif', 'berhasil');
            $status = 'aktif';
            Ruangan::where('id', $ruangan->id)->update(['status' => $status]);
            Notifikasi::create($notif);
            return redirect()->back()->with('toast_success',$notif['msg']);
        
    }
}
