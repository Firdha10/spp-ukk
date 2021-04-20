<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Auth;
use App\Siswa;
use App\Jurusan;
use App\Kelas;
use App\User;
use App\Spp;

class SiswaController extends Controller
{

    public function __construct(User $users, Siswa $siswas){
        $this->users = $users;
        $this->siswas = $siswas;
    }
    
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        
        $datas = Siswa::get();
        return view('siswa.index', compact('datas'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $kelas = Kelas::all();
        $datas = Jurusan::all();
        $spp = Spp::all();
        return view('siswa.create', compact('kelas','datas', 'spp'));
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
            'nama'                  => 'required',
            'nisn'                  => 'required|unique:siswas',
            'jk'                    => 'required',
            'no_telp'               => 'required',
            'alamat'                => 'required',
            'kelas_id'              => 'required',
            'jurusan_id'            => 'required',
            'spp_id'                => 'required|integer',
            'email'                 => 'required|email|unique:users'
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
        $users->password = bcrypt($request->nisn);
        $users->level   = "siswa";
        $users->gambar  = $gambar;
        $users->save();

        $siswas = new Siswa();
        $siswas->nama = $request->nama;
        $siswas->nisn = $request->nisn;
        $siswas->jk = $request->jk;
        $siswas->no_telp = $request->no_telp;
        $siswas->alamat = $request->alamat;
        $siswas->kelas_id = $request->kelas_id;
        $siswas->jurusan_id = $request->jurusan_id;
        $siswas->spp_id = $request->spp_id;
        $siswas->user_id = $users->id;
        $siswas->save();

        return redirect()->route('siswa.index')->with(['message' => 'Berhasil Menambah Siswa', 'type' => 'success']);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $data = Siswa::where('id', $id)->first();
        return view('siswa.show', compact('data'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $kelas = Kelas::all();
        $jurusan = Jurusan::all();
        $spp = Spp::all();
        $data = Siswa::where('id', $id)->first();
        return view('siswa.edit', compact('kelas','jurusan', 'spp' ,'data'));
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
            'nisn'           => 'required',
            'jk'            => 'required',
            'no_telp'       => 'required',
            'alamat'        => 'required',
            'kelas_id'      => 'required',
            'jurusan_id'    => 'required',
            'spp_id'        => 'required',
        ]);

        Siswa::where('id', $id)->update([
            'nama'          => $request->nama,
            'nisn'          => $request->nisn,
            'jk'            => $request->jk,
            'no_telp'       => $request->no_telp,
            'alamat'        => $request->alamat,
            'kelas_id'      => $request->kelas_id,
            'jurusan_id'    => $request->jurusan_id,
            'spp_id'        => $request->spp_id,
            'user_id'       => $request->user_id,
        ]);
            return redirect()->route('siswa.index')->with(['message' => 'Berhasil Mengubah Data Siswa', 'type' => 'success']);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        Siswa::destroy($id);
        return redirect()->route('siswa.index', ['id' => $id]);
    }
}
