<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;
use Illuminate\Support\Facades\Hash;

class AdminController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $datas = User::get();
        return view('user.index', compact('datas'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
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
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $data = User::where('id', $id)->first();
        return view('user.edit', compact('data'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $validate = $request->validate([
            'email' => 'required',
            'level' => 'required'
        ]);

        if($request->file('gambar') == '') {
            $gambar = NULL;
        } else {
            $file = $request->file('gambar');
            $acak  = $file->getClientOriginalExtension();
            $fileName = rand(11111,99999).'-'.'.'.$acak; 
            $request->file('gambar')->move("pengguna", $fileName);
            $gambar = $fileName;
        }

        $update = User::where('id', $id)->update([
            'email'   => $request->email,
            'level' => $request->level,
            'gambar' => $gambar,
            'password'  => $request->password,
        ]);

        if($update == true) {
            return redirect()->route('user.index')->with(['message' => 'Berhasil Mengubah Pengguna', 'type' => 'success']);
        } else {
            return redirect()->route('user.index')->with(['message' => 'Gagal Mengubah Pengguna', 'type' => 'error']);
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        User::destroy($id);
        return redirect()->route('user.index', ['id' => $id]);
    }

    public function profil($id)
    {
       $data = User::where('id', $id)->first();
       return view('user.profil', compact('data'));
    }

    public function updateProfil(Request $request, $id)
    {
        $validate = $request->validate([
            'email' => 'required',
            'gambar'  => 'mimes:png,jpg,jpeg|max:2048'
        ]);

        if($request->file('gambar') == '') {
            $gambar = NULL;
        } else {
            $file = $request->file('gambar');
            $acak  = $file->getClientOriginalExtension();
            $fileName = rand(11111,99999).'-'.'.'.$acak; 
            $request->file('gambar')->move("pengguna", $fileName);
            $gambar = $fileName;
        }

        $update = User::where('id', $id)->update([
            'email'   => $request->email,
            'gambar' => $gambar
        ]);

        if($update) {
            return redirect()->route('profil.user', ['id' => $id])->with(['message' => 'Sukses Mengubah Data', 'type' => 'success']);
        } else {
            return redirect()->route('profil.user', ['id' => $id])->with(['message' => 'Gagal Mengubah Data', 'type' => 'danger']);
        }
    }

    public function login(){
        return view('auth.login');
    }

    public function ubahPass($id)
    {
        $user = User::where('id', $id)->first();
        return view('editpass', compact('user'));
    }

    public function updatePass(Request $request, $id)
    {
        $update = User::where('id', $id)->update([
            'password' => Hash::make($request->get('password'))
        ]);

        if($update == true) {
            return redirect()->back()->with(['message' => 'Berhasil Mengubah Password', 'type' => 'success']);
        } else {
            return redirect()->back()->with(['message' => 'Gagal Mengubah Password', 'type' => 'error']);
        }
    }
}
