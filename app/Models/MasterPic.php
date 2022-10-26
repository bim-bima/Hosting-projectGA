<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class MasterPic extends Model
{
    use HasFactory;
    protected $table = 'm_pic';
    protected $guarded = [];

    public function kendaraan(){
        return $this->hasMany('App\Models\Kendaraan','ak_mp_id');
    }
    public function pengajuanp(){
        return $this->hasMany('App\Models\pengajuan','ak_mp_id');
    }
}
