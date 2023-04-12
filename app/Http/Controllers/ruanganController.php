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
            'ruangans' => Ruangan::orderBy('updated_at','desc')->orderBy('created_at','desc')->get(),
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
        $notif = Notifikasi::notif('ruangan', 'data ruangan berhasil ditambahkan', 'tambah', 'berhasil');
        $validatedData = Validator::make($request->all(), [
            'nama_ruangan' => 'required',
            'no_telephone' => 'required|unique:ruangans',
        ]);
        if ($validatedData->fails()) {
            $notif['msg'] = 'data gagal dimasukkan';
            $notif['status'] = 'gagal';
            Notifikasi::create($notif);
            return redirect()
                ->back()
                ->with('toast_error', $notif['msg'])
                ->withErrors($validatedData)
                ->withInput();
        }
        try {
            //code...
            //  $validatedData['status'] = 'aktif';
            Ruangan::create($validatedData->validate());
            Notifikasi::create($notif);
            return redirect()->back()->with('toast_success', $notif['msg']);
            //code...

        } catch (\Throwable $th) {
            //throw $th;
            $notif['msg'] = 'data ruangan gagal ditambahkan';
            $notif['status'] = 'gagal';
            Notifikasi::create($notif);
            return redirect()->back()->with('toast_error', $notif['msg']);
        }
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
        $validatedData = Validator::make($request->all(), [
            'nama_ruangan' => 'required',
            'no_telephone' => 'required|'.Rule::unique('users')->ignore($ruangan->id),
        ]);
        if ($validatedData->fails()) {
            $notif['msg'] = 'data gagal dimasukkan';
            $notif['status'] = 'gagal';
            Notifikasi::create($notif);
            return redirect()
                ->back()
                ->with('toast_error', $notif['msg'])
                ->withErrors($validatedData)
                ->withInput();
        }
        try {
            Notifikasi::create($notif);
            Ruangan::where('id', $ruangan->id)->update($validatedData->validate());
            return redirect()->back()->with('toast_success', $notif['msg']);
            //code...
        } catch (\Throwable $th) {
            //throw $th;
            $notif['msg'] = 'data ruangan gagal diupdate';
            $notif['status'] = 'gagal';
            Notifikasi::create($notif);
            return redirect()->back()->with('toast_error', $notif['msg']);
        }
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
        return redirect()->back()->with('toast_success', $notif['msg']);
    }
    public function aktif(Ruangan $ruangan)
    {
        //code...
        $notif = Notifikasi::notif('ruangan', 'data ruangan berhasil diaktifkan', 'aktif', 'berhasil');
        $status = 'aktif';
        Ruangan::where('id', $ruangan->id)->update(['status' => $status]);
        Notifikasi::create($notif);
        return redirect()->back()->with('toast_success', $notif['msg']);
    }
}
