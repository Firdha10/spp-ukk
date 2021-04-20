<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Spp;
class SppController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $datas = Spp::get();
        return view('spp.index', compact('datas'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('spp.create');
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
            'tahun' => 'required',
            'nominal'=> 'required'
        ]);

       
        $insert = Spp::create([
            'tahun' => $request->tahun,
            'nominal' => $request->nominal
        ]);

        if($insert == true ){
            return redirect()->route('spp.index')->with(['message' => 'Berhasil Menambah Data SPP', 'type' => 'success']);
        } else {

            return redirect()->route('spp.index')->with(['message' => 'Gagal Menambah Data SPP', 'type' => 'error']);
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
        $data = Spp::where('id', $id)->first();
        return view('spp.edit', compact('data'));
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
            'tahun' => 'required',
            'nominal' => 'required'
        ]);

        $update = Spp::where('id', $id)->update([
            'tahun' => $request->tahun,
            'nominal' => $request->nominal
        ]);

        if($update == true) {
            return redirect()->route('spp.index')->with(['message' => 'Berhasil Mengubah Data SPP', 'type' => 'success']);
        } else {
            return redirect()->route('spp.index')->with(['message' => 'Gagal Mengubah Data SPP', 'type' => 'error']);
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
        Spp::destroy($id);
        return redirect()->route('spp.index', ['id' => $id]);
    }
}
