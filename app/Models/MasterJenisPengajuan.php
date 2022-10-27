<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class MasterJenisPengajuan extends Model
{
    use HasFactory;
    protected $table = 'm_jenispengajuan';
    protected $guarded = [];

    public function pengajuanj(){
        return $this->hasMany('App\Models\Pengajuan','ap_mjp_id');
    }
}
