<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class MasterCategoryAsset extends Model
{
    use HasFactory;
    protected $table = 'm_category_asset';
    protected $guarded = [];

    public function assetc()
    {
        return $this->belongsTo('App\Models\Asset', 'as_mca_id');
    }
}
