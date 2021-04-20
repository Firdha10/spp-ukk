<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Admin extends Model
{
    protected $table='admin';
    protected $fillable = ['nama', 'jk','user_id'];
    public $timestamps = true;

    public function users(){
        return $this->belongsTo(User::class);
    }
}
