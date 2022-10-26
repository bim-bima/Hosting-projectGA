<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Kendaraan extends Model
{
    use HasFactory;
    protected $table = 'app_kendaraan';
    protected $guarded = [];

    public function namaKendaraan()
    {
        return $this->belongsTo('App\Models\MasterKendaraan', 'ak_mk_id');
    }
    public function pic()
    {
        return $this->belongsTo('App\Models\MasterPic', 'ak_mp_id');
    }
}
