<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Pembayaran;
use Session;
use App\User;

class HistoryPembayaranController extends Controller
{
    public function index(){
        $pembayaran = Pembayaran::orderBy('id', 'DESC')->paginate(15);
         
        return view('history-pembayaran.index', compact('pembayaran'));
    }
}
