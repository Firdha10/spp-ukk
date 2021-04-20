<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Pembayaran extends Model
{
    protected $table = 'pembayaran';
   
    protected $fillable = [
         'petugas_id','siswa_id', 'spp_bulan', 'jumlah_bayar'
    ];

    public $timestamps = true;

    public function petugas()
    {
         return $this->belongsTo(Petugas::class);
    }

    public function user()
    {
         return $this->belongsTo(User::class, 'petugas_id');
    }

    public function siswa()
    {
         return $this->belongsTo(Siswa::class,'siswa_id','id','nisn');
    }
}
