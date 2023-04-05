<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\Ruangan;
use App\Models\Notifikasi;
use Illuminate\Http\Request;
use Illuminate\Validation\Rule;
use Illuminate\Routing\Controller;
use Illuminate\Support\Facades\Hash;
use RealRashid\SweetAlert\Facades\Alert;
use Illuminate\Support\Facades\Validator;

class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
     

    public function index()
    {
       
        return view('admin.pages.User.listUser', [
            'users' => User::orderBy('created_at', 'desc')->get(),
            'title' => 'user',
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        $ruangan = Ruangan::all();
        return response(view('admin.pages.User.createUser', [
            'ruangans' => $ruangan,
            'title' => 'Create User'
        ]));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
            $notif = Notifikasi::notif('user','data user berhasil ditambahkan','tambah', 'berhasil');
            $validatedData = Validator::make($request->validate([
                'nama' => 'required',
                'username' => 'required|unique:users',
                'password' => 'required',
                'cekLevel' => 'required',
                'no_telephone' => 'required',
            ]));
            $validatedData['password'] = Hash::make($validatedData['password']);
            if($validatedData->fails()){
                $notif['msg'] = 'data user gagal ditambahkan';
                $notif['status'] = 'gagal';
                Notifikasi::create($notif);
                return redirect()->back()->with('toast_error',$notif['msg']);

            }
            User::create($validatedData);
            Notifikasi::create($notif);
            $user = User::where('username', $request->username)->first();
            foreach ($request->ruangan as $index => $val) {
                // dd($val);
                # code...
                Ruangan::where('id', $val)->update(['user_id' => $user->id]);
            }
            // $notifikasi = [
            //     'nama_tabel' => 'user',
            //     'msg' => 'data berhasil dibuat',
            //     'user_id' => auth()->user()->id,
            //     'jenis_notifikasi' => 'tambah',
            //     'status' => 'berhasil'
            // ];
            Notifikasi::create($notif);
            return redirect('/master/user')->with('toast_success',$notif['msg']);    //code...
           
    }


    /**
     * Display the specified resource.
     *
     * @param  \App\Models\User  $user
     * @return \Illuminate\Http\Response
     */
    public function show(User $user)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\User  $user
     * @return \Illuminate\Http\Response
     */
    public function edit(User $user)
    {
        //
        // return $user->ruangan;
        return response(view('admin.pages.User.editUser', [
            'ruangans' => Ruangan::all(),
            'user' => $user,
            'title' => 'Edit User'
        ]));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\User  $user
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, User $user)
    {
            //code...
            $notif = Notifikasi::notif('user','data user berhasil diupdate','update', 'berhasil');
            $validatedData = Validator::make($request->validate([
                'nama' => 'required',
                'username' => 'required |' . Rule::unique('users')->ignore($user->id),
                'password' => '',
                'cekLevel' => 'required',
                'no_telephone' => 'required',
            ]));
            if ($validatedData['password']  == null) {
                $validatedData['password'] = $user->password;
            } else {
                $validatedData['password'] = Hash::make($validatedData['password']);
            }
            if($validatedData->fails()){
                $notif['msg'] = 'data user '.$user->nama.' gagal diupdate';
                $notif['status'] = 'gagal';
                Notifikasi::create($notif);
                return redirect()->back()->with('toast_error',$notif['msg']);
    
            }
            User::where('id', $user->id)->update($validatedData);
            Notifikasi::create($notif);
            foreach ($user->ruangan as $item) {
                Ruangan::where('id', $item->id)->update(['user_id' => null]);
            }
            if ($request->ruangan !== null) {
                foreach ($request->ruangan as $index => $id) {
                    Ruangan::where('id', $id)->update(['user_id' => $user->id]);
                    // return Ruangan::where('id', $val)->get();
                }
            }           
            return redirect('/master/user')->with('toast_success',$notif['msg']); 
       
       
        // return redirect('/master/user')->with(Alert::success('SuccessAlert','Lorem ipsum dolor sit amet.')
    // ); 
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\User  $user
     * @return \Illuminate\Http\Response
     */
    public function destroy(User $user)
    {
        //
    }

    public function nonaktif(User $user)
    {
            $notif = Notifikasi::notif('user','user '.$user->nama.' berhasil dinonaktifkan','nonaktif', 'berhasil');
            Notifikasi::create($notif);
            $status = 'nonaktif';
            User::where('id', $user->id)->update(['status' => $status]);
            return redirect()->back()->with('toast_success',$notif['msg']);
    }
    public function aktif(User $user)
    {
            //code...
            $notif = Notifikasi::notif('user','user '.$user->nama.' berhasil diaktifkan','aktif', 'berhasil');
            Notifikasi::create($notif);
            $status = 'aktif';
            User::where('id', $user->id)->update(['status' => $status]);
            return redirect()->back()->with('toast_success',$notif['msg']);
       
    }
}
