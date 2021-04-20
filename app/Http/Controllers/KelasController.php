<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Kelas;

class KelasController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $datas= Kelas::get();
        return view('kelas.index', compact('datas'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('kelas.create');
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
            'kelas'=> 'required'
        ]);

        $insert = Kelas::create([
            'kelas' =>$request->kelas
        ]);

        if($insert == true ){
            return redirect()->route('kelas.index')->with(['message' => 'Berhasil Menambah Data Kelas', 'type' => 'success']);
        } else {

            return redirect()->route('kelas.index')->with(['message' => 'Gagal Menambah Data Kelas', 'type' => 'error']);
        }
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
        $data = Kelas::where('id', $id)->first();
        return view('kelas.edit', compact('data'));
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
            'kelas'=> 'required'
        ]);

        $update = Kelas::where('id', $id)->update([
            'kelas' =>$request->kelas
        ]);

        if($update == true ){
            return redirect()->route('kelas.index')->with(['message' => 'Berhasil Mengubah Data Kelas', 'type' => 'success']);
        } else {

            return redirect()->route('kelas.index')->with(['message' => 'Gagal Mengubah Data Kelas', 'type' => 'error']);
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
        Kelas::destroy($id);
        return redirect()->route('kelas.index', ['id' => $id]);
    }
}
