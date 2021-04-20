<?php

namespace App;

use Illuminate\Notifications\Notifiable;
use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Foundation\Auth\User as Authenticatable;

class User extends Authenticatable
{
    use Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'email', 'password', 'gambar', 'level'
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];

    /**
     * The attributes that should be cast to native types.
     *
     * @var array
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];
    
    public $timestamps = true;
    
    public function siswas(){
        return $this->hasOne(Siswa::class);
    }

    public function petugas(){
        return $this->hasOne(Petugas::class);
    }

    public function admin(){
        return $this->hasOne(Admin::class);
    }

    public function spp()
    {
         return $this->hasOne(Spp::class);
    }
}
