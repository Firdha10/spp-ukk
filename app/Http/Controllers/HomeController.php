<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Pembayaran;
use App\User;
use Auth;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        if(Auth::user()->level == 'siswa')
        {
            $pembayaran = Pembayaran::where('siswa_id', Auth::user()->siswas->id)->get();
        }else{
            $pembayaran = Pembayaran::orderBy('id', 'desc')->paginate(3);
        }
        return view('user.home' , compact('pembayaran', 'pembayaran'));
    }
}
