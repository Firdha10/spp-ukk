<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Jurusan;

class JurusanController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $datas = Jurusan::get();
        return view('jurusan.index', compact('datas'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('jurusan.create');
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
            'jurusan' => 'required'
        ]);

        $insert = Jurusan::create([
            'jurusan'   => $request->jurusan
        ]);

        if($insert == true){
            return redirect()->route('jurusan.index')->with(['message' => 'Berhasil Menambah Data Jurusan', 'type' => 'success']);
        }else{
            return redirect()->route('jurusan.index')->with(['message' => 'Gagal Menambah Data Jurusan', 'type' => 'error']);
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
        $data = Jurusan::where('id', $id)->first();
        return view('jurusan.edit', compact('data'));
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
            'jurusan'   => 'required'
        ]);

        $update = Jurusan::where('id', $id)->update([
            'jurusan'   => $request->jurusan
        ]);

        if($update == true){
            return redirect()->route('jurusan.index')->with(['message' => 'Berhasil Mengubah Data', 'type' => 'success']);
        }else{
            return redirect()->route('jurusan.index')->with(['message' => 'Gagal Mengubah Data', 'type' => 'error']);
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
        Jurusan::destroy($id);
        return redirect()->route('jurusan.index', ['id' => $id]);
    }
}
