<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Pembayaran;
use App\User;
use App\Siswa;
use App\Kelas;
use App;
use PDF;

class LaporanController extends Controller
{
   
    public function index(){
   
       $data = [
          'user' => User::find(auth()->user()->id),
          'kelas' => Kelas::orderBy('kelas', 'ASC')->get(),
        ];
      
        return view('laporan.index', $data);
    }
   
    public function create(){
      
        $title = 'LAPORAN PEMBAYARAN SPP';
        PDF::setOptions(['dpi' => 150, 'defaultFont' => 'sans-serif']);
     
        $pembayaran = Pembayaran::orderBy('created_at', 'DESC')->get();

        $pdf = PDF::loadView('laporan.laporan_pdf', compact('pembayaran','title'));
        return $pdf->download('Laporan-pembayaran-spp.pdf');
    }
}
