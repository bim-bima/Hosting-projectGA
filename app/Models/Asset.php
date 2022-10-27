<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Asset extends Model
{
    use HasFactory;
    protected $table = 'app_asset';
    protected $guarded = [];

    public function lokasiAsset()
    {
        return $this->belongsTo('App\Models\MasterLokasiAsset', 'as_mla_id');
    }
    public function categoryasset()
    {
        return $this->belongsTo('App\Models\MasterCategoryAsset', 'as_mca_id');
    }
}
