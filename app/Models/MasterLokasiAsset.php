<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class MasterLokasiAsset extends Model
{
    use HasFactory;
    protected $table = 'm_lokasi_asset';
    protected $guarded = [];

    public function asset(){
        return $this->hasMany('App\Models\Asset','as_mla_id');
    }
}
