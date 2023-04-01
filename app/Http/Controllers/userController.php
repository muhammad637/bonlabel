<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\Ruangan;
use Illuminate\Http\Request;
use Illuminate\Validation\Rule;
use Illuminate\Routing\Controller;
use Illuminate\Support\Facades\Hash;

class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        return response(view('admin.pages.User.listUser', [
            'users' => User::all(),
        ]));
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
        try {
            $validatedData = $request->validate([
                'nama' => 'required',
                'username' => 'required|unique:users',
                'password' => 'required',
                // 'image' => '|image|file|max:1024',
                'cekLevel' => 'required',
                // 'address' => '',
                'no_telephone' => 'required',
            ]);
            $validatedData['password'] = Hash::make($validatedData['password']);
            $create = User::create($validatedData);
            $create;
            $user = User::where('username', $request->username)->first();
            // return $user->id;

            // return 'kelas';
            // return User::all();
            foreach ($request->ruangan as $index => $val) {
                // dd($val);
                # code...
                Ruangan::where('id', $val)->update(['user_id' => $user->id]);
            }
            return response(redirect('/user'));    //code...
        } catch (\Throwable $th) {
            //throw $th;
            return $th->getMessage();
        }
    }


    /**
     * Display the specified resource.
     *
     * @param  \App\Models\User  $user
     * @return \Illuminate\Http\Response
     */
    public function show(User $user)
    {
        $phoneNumber = '185156327536';
       return $this->phoneGenerate($phoneNumber);
    }

    private function phoneGenerate($phoneNumber){
        
        $a = $phoneNumber;
        $b = str_split($a);
        $c = [];
        if ($b[0] != '6') {
            # code...
            $b[0] = '62';
            return implode('',$b);
        }else{
            return $a;
        }
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
            'title' => 'edit - user'
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

        $validatedData = $request->validate([
            'nama' => 'required',
            'username' => 'required |' . Rule::unique('users')->ignore($user->id),
            'password' => '',
            'cekLevel' => 'required',
            'no_telephone' => 'required | min:8',
        ]);
           $validatedData['no_telephone'] = $this->phoneGenerate($validatedData['no_telephone']);
        if ($validatedData['password']  == null) {
            $validatedData['password'] = $user->password;
        } else {
            $validatedData['password'] = Hash::make($validatedData['password']);
        }
        $update = $user->update($validatedData);
        $update;
        // foreach ($user->ruangan as  $val) {
        //     array_push($p,$val->id);
        //     // Ruangan::where('id', $val->id)->update(['user_id' == null]);
        // }
        // return $p;
        foreach ($user->ruangan as $item) {
            Ruangan::where('id', $item->id)->update(['user_id' => null]);
        }
        if ($request->ruangan !== null) {
            foreach ($request->ruangan as $index => $id) {
                Ruangan::where('id', $id)->update(['user_id' => $user->id]);
                // return Ruangan::where('id', $val)->get();
            }
        }
        return redirect(route('user.index'));
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

        try {
            //code...
            $status = 'nonaktif';
            User::where('id', $user->id)->update(['status' => $status]);
            return redirect()->back();
        } catch (\Exception $e) {
            //throw $th;
            return $e->getMessage();
        }
    }
    public function aktif(User $user)
    {
        try {
            //code...
            $status = 'aktif';
            User::where('id', $user->id)->update(['status' => $status]);
            return  redirect()->back();
        } catch (\Exception $e) {
            //throw $th;
            return  $e->getMessage();
        }
    }
}
