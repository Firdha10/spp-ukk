<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Jurusan extends Model
{
    protected $table='jurusans';
    protected $fillable=['jurusan'];
    
    public $timestamps = true;

    public function siswa(){
        return $this->hasOne(Jurusan::class);
    }
}
