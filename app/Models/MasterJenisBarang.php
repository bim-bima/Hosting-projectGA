<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class MasterJenisBarang extends Model
{
    use HasFactory;
    protected $table = 'm_jenis_barang';
    protected $guarded = [];
}
