<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class MasterVendor extends Model
{
    use HasFactory;
    protected $table = 'm_vendor';
    protected $guarded = [];

    public function pengajuanv(){
        return $this->hasMany('App\Models\Pengajuan','ap_mv_id');
    }
}
