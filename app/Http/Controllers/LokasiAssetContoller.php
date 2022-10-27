<?php

namespace App\Http\Controllers;

use App\Models\LokasiAsset;
use App\Models\Asset;
use Illuminate\Http\Request;

class LokasiAssetContoller extends Controller
{
    public function index(){
        $lokasiAsset = LokasiAsset::all();
        return view('lokasiasset.index',compact(['lokasiAsset']));
    }
    public function asset()
    {
        return view('lokasiasset.index2', [
            'title' => 'One to Many User',
            'asset' => Asset::get(),
        ]);
    }
}
