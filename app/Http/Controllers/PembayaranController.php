<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Pembayaran;
use App\Siswa;
use Auth;

class PembayaranController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $datas= Pembayaran::get();
        return view('pembayaran.index', compact('datas'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('pembayaran.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $message = [
            'required' => ':attribute harus di isi',
            'numeric' => ':attribute harus berupa angka',
            'min' => ':attribute minimal harus :min angka',
            'max' => ':attribute maksimal harus :max angka',
         ];
         
        $validate = $request->validate([
            'nisn' => 'required',
            'spp_bulan' => 'required',
            'jumlah_bayar' => 'required|numeric'
         ], $message);
         
         if(Siswa::where('nisn',$request->nisn)->exists() == false):
            return redirect()->route('pembayaran.index')->with(['message' => 'Siswa dengan NISN ini tidak tersedia', 'type' => 'danger']);
         endif;
            
         
         $siswa = Siswa::where('nisn',$request->nisn)->first();
         
        
         
         Pembayaran::create([
            'petugas_id' => Auth::user()->id,
            'siswa_id' => $siswa->id,
            'spp_bulan' => $request->spp_bulan,
            'jumlah_bayar' => $request->jumlah_bayar,
         ]);
         
         return redirect()->route('pembayaran.index')->with(['message' => 'Berhasil Menambah Data SPP', 'type' => 'success']);
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
        $data = Pembayaran::where('id', $id)->first();
        return view('pembayaran.edit', compact('data'));
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
        $message = [
            'required' => ':attribute harus di isi',
            'numeric' => ':attribute harus berupa angka',
            'min' => ':attribute minimal harus :min angka',
            'max' => ':attribute maksimal harus :max angka',
        ];
         
        $validate = $request->validate([
            'nisn' => 'required',
            'spp_bulan' => 'required',
            'jumlah_bayar' => 'required|numeric'
        ], $message);

        $pembayaran = Pembayaran::find($id);

        $pembayaran->update([
            'spp_bulan' => $request->spp_bulan,
            'jumlah_bayar' => $request->jumlah_bayar
        ]);
        
        if(Siswa::where('nisn',$request->nisn)->exists() == false):
           return redirect()->route('pembayaran.index')->with(['message' => 'Siswa dengan NISN ini tidak tersedia', 'type' => 'danger']);
        endif;

        if($request->nisn != $pembayaran->siswa->nisn) :
           $siswa = Siswa::where('nisn',$request->nisn)->get();
        
           foreach($siswa as $val){
              $siswa_id = $val->id;
           }
           
           $pembayaran->update([
              'siswa_id' => $siswa_id,
           ]);
        endif;

        return redirect()->route('pembayaran.index')->with(['message' => 'Berhasil Mengubah Data SPP', 'type' => 'success']);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        Pembayaran::destroy($id);
        return redirect()->route('pembayaran.index', ['id' => $id]);
    }
}
