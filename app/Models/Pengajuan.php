<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Pengajuan extends Model
{
    protected $table = 'app_pengajuan';
    protected $guarded = [];

    public function vendor()
    {
        return $this->belongsTo('App\Models\MasterVendor', 'ap_mv_id');
    }
    public function pic()
    {
        return $this->belongsTo('App\Models\MasterPic', 'ap_mp_id');
    }
    public function jenispengajuan()
    {
        return $this->belongsTo('App\Models\MasterJenisPengajuan', 'ap_mjp_id');
    }

}
