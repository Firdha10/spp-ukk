<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Petugas;
use App\User;

class PetugasController extends Controller
{
    public function __construct(User $users, Petugas $petugas){
        $this->users = $users;
        $this->petugas = $petugas;
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $datas=Petugas::get();
        return view('petugas.index', compact('datas'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('petugas.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $validate = $request->validate([
            'nama'      => 'required',
            'alamat'    => 'required',
            'no_telp'   => 'required',
            'jk'        => 'required',
            'nik'       => 'required|unique:petugas',
            'email'     => 'required|email|unique:users'
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

        $users = new User();
        $users->email = $request->email;
        $users->password = bcrypt($request->nik);
        $users->level   = "petugas";
        $users->gambar  = $gambar;
        $users->save();

        $petugas = new Petugas();
        $petugas->nama = $request->nama;
        $petugas->jk = $request->jk;
        $petugas->no_telp = $request->no_telp;
        $petugas->nik = $request->nik;
        $petugas->alamat = $request->alamat;
        $petugas->user_id = $users->id;
        $petugas->save();

        return redirect()->route('petugas.index')->with(['message' => 'Berhasil Menambah Data Petugas', 'type' => 'success']);

    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $data = Petugas::where('id', $id)->first();
        return view('petugas.show', compact('data'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $data = Petugas::where('id', $id)->first();
        return view('petugas.edit', compact('data'));
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
            'nama'          => 'required',
            'jk'            => 'required',
            'no_telp'       => 'required',
            'alamat'        => 'required',
            'nik'           => 'required',
        ]);

        Petugas::where('id', $id)->update([
            'nama'          => $request->nama,
            'jk'            => $request->jk,
            'no_telp'       => $request->no_telp,
            'nik'           => $request->nik,
            'alamat'        => $request->alamat,
            'user_id'       => $request->user_id,
        ]);

            return redirect()->route('petugas.index')->with(['message' => 'Berhasil Mengubah Data Siswa', 'type' => 'success']);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        Petugas::destroy($id);
        return redirect()->route('petugas.index', ['id' => $id]);
    }
}
