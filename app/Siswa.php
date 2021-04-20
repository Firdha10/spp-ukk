<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Siswa extends Model
{
    protected $table ='siswas';
    protected $fillable = ['nama', 'nisn', 'jk', 'no_telp', 'alamat', 'kelas_id','jurusan_id', 'user_id', 'spp_id'];
    public $timestamps = true;

    public function kelas(){
        return $this->belongsTo(Kelas::class);
    }

    public function jurusan(){
        return $this->belongsTo(Jurusan::class);
    }
    
    public function user(){
        return $this->belongsTo(User::class);
    }

    public function spp()
    {
        return $this->belongsTo(Spp::class,'spp_id','id');
    }

    public function pembayaran(){
        return  $this->hasMany(Pembayaran::class,'spp_id');
    }
}
