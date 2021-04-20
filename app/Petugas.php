<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Petugas extends Model
{
    protected $table='petugas';

    protected $fillable=['nama', 'jk', 'alamat', 'no_telp','user_id', 'nik'];

    public $timestamps = true;

    public function user(){
        return $this->belongsTo(User::class);
    }
    
    public function pembayaran()
    {
        return $this->hasMany(Pembayaran::class);
    }
}
