<?php

namespace App\Http\Controllers;

use App\Models\User;
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
        $notif = Notifikasi::notif('ruangan', "$request->nama_ruangan berhasil di tambahkan by ".auth()->user()->nama, 'tambah', 'berhasil');
        $validatedData = Validator::make($request->all(), [
            'nama_ruangan' => 'required',
            'no_telephone' => 'required|unique:ruangans',
        ]);
        if ($validatedData->fails()) {
            $notif['msg'] = "$request->nama_ruangan gagal di tambahkan by ".auth()->user()->nama;
            $notif['status'] = 'gagal';
            Notifikasi::create($notif)->user()->sync(User::adminId());
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
            Notifikasi::create($notif)->user()->sync(User::adminId());
            return redirect()->back()->with('toast_success', $notif['msg']);
            //code...

        } catch (\Throwable $th) {
            //throw $th;
            return redirect()->back()->with('toast_error', $th->getMessage());
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
        $notif = Notifikasi::notif('ruangan',"$request->nama_ruangan berhasil di update by ".auth()->user()->nama, 'update', 'berhasil');
        //code...
        $validatedData = Validator::make($request->all(), [
            'nama_ruangan' => 'required',
            'no_telephone' => 'required|'.Rule::unique('users')->ignore($ruangan->id),
        ]);
        if ($validatedData->fails()) {
            $notif['msg'] = 'data gagal dimasukkan';
            $notif['status'] = 'gagal';
            Notifikasi::create($notif)->user()->sync(User::adminId());
            return redirect()
                ->back()
                ->with('toast_error', $notif['msg'])
                ->withErrors($validatedData)
                ->withInput();
        }
        try {
            Notifikasi::create($notif)->user()->sync(User::adminId());
            Ruangan::where('id', $ruangan->id)->update($validatedData->validate());
            return redirect()->back()->with('toast_success', $notif['msg']);
            //code...
        } catch (\Throwable $th) {
            //throw $th;
            return redirect()->back()->with('toast_error', $th->getMessage());
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
        $notif = Notifikasi::notif('ruangan', "$ruangan->nama_ruangan berhasil dinonaktifkan by ".auth()->user()->nama, 'nonaktif', 'berhasil');
        Notifikasi::create($notif)->user()->sync(User::adminId());
        $status = 'nonaktif';
        Ruangan::where('id', $ruangan->id)->update(['status' => $status]);
        return redirect()->back()->with('toast_success', $notif['msg']);
    }
    public function aktif(Ruangan $ruangan)
    {
        //code...
        $notif = Notifikasi::notif('ruangan', "$ruangan->nama_ruangan berhasil diaktifkan by ".auth()->user()->nama, 'aktif', 'berhasil');
        $status = 'aktif';
        Ruangan::where('id', $ruangan->id)->update(['status' => $status]);
        Notifikasi::create($notif)->user()->sync(User::adminId());
        return redirect()->back()->with('toast_success', $notif['msg']);
    }
}
