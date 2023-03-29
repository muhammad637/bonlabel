<?php

namespace App\Http\Controllers;

use App\Models\Ruangan;
use Illuminate\Http\Request;
use Illuminate\Validation\Rule;
use Illuminate\Routing\Controller;

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
            'ruangans' => Ruangan::all()
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.pages.Ruangan.createRuangan');
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
        try {
            //code...
            $validatedData = $request->validate(
                [
                    'nama_ruangan' => 'required',
                    'no_telephone' => 'required|unique:ruangans',
                    'status' => ''
                ]
            );
            $validatedData['status'] = 'aktif';
            Ruangan::create($validatedData);
            return redirect('/ruangan');
        } catch (\Exception $e) {
            //throw $th;
            return $e->getMessage();
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
        return view('admin.pages.Ruangan.editRuangan',[
            'ruangan' => $ruangan,
        ]);
        
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
        try {
            //code...
            $validatedData = $request->validate(
                [
                    'nama_ruangan' => 'required',
                    'no_telephone' => 'required|'.Rule::unique('users')->ignore($ruangan->id),
                    'status' => ''
                ]
            );
            $validatedData['status'] = 'aktif';
            $ruangan->update($validatedData);
            return redirect('/ruangan');
        } catch (\Exception $e) {
            //throw $th;
            return $e->getMessage();
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
        try {
            //code...
            $status = 'nonaktif';
            Ruangan::where('id', $ruangan->id)->update(['status' => $status]);
            return redirect()->back();
        } catch (\Exception $e) {
            //throw $th;
            return $e->getMessage();
        }
    }
    public function aktif(Ruangan $ruangan)
    {
        try {
            //code...
            $status = 'aktif';
            Ruangan::where('id', $ruangan->id)->update(['status' => $status]);
            return  redirect()->back();
        } catch (\Exception $e) {
            //throw $th;
            return  $e->getMessage();
        }
    }
}
