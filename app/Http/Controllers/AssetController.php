<?php

namespace App\Http\Controllers;

use Auth;
use Carbon\Carbon;
use App\Models\Asset;
use App\Models\MasterLokasiAsset;
use Illuminate\Http\Request;
use RealRashid\SweetAlert\Facades\Alert;

class AssetController extends Controller
{
    public function index()
        {
            $dataasset = Asset::with('lokasiAsset')->paginate(5);
            return view('app.asset.index', compact(['dataasset']));
        }

    public function create()
    {
        $lokasiAsset = MasterLokasiAsset::all();
        return view('app.asset.create', compact(['lokasiAsset']));
        
    }
    
    public function store(Request $request)
    {
        // $request->validate([
        //     'as_nama_asset'=>'required|min:2|max:100', 
        //     'as_mla_id'=>'required',
        //     'as_kode_asset'=>'min:2|max:100', 
        //     'as_harga'=>'required|min:2|max:100', 
        //     'as_nilai_residu'=>'min:2|max:100', 
        //     'as_umur_manfaat'=>'min:2|max:100', 
        // ]);

        $dataasset = new Asset;
        $dataasset->as_nama_asset = $request->as_nama_asset;
        $dataasset->as_mla_id = $request->as_mla_id;
        $dataasset->as_kode_asset = $request->as_kode_asset;
        $dataasset->as_tahun_kepemilikan = $request->as_tahun_kepemilikan;
        $dataasset->as_harga = $request->as_harga;
        $dataasset->as_nilai_residu = $request->as_nilai_residu;
        $dataasset->as_umur_manfaat = $request->as_umur_manfaat;
        $dataasset->save();
        Alert::success('Berhasil', 'Data Berhasil Ditambahkan');
        return redirect()->route('app_asset.index');
    }

    public function show($id)
    {
        $asset = Asset::find($id);
        // 5.000.000 - 2.500.000 : 5 
        // = 2.500.000 : 5
        // = 500.000
        // 300.000.000 - 100.000.000 : 10
        // 200.000.000 : 10
        // 20.000.000
        $harga = $asset->as_harga;
        $residu = $asset->as_nilai_residu;
        $umur = $asset->as_umur_manfaat;
        $penurunan1 = $harga - $residu ;
        $penurunan2 = $penurunan1 / $umur ;
        $tahunawal = $asset->as_tahun_kepemilikan; //tahun awal 15
        $tahunakhir = $tahunawal + $umur; //tahun akhir 25
        return view('app.asset.show', compact(['asset','tahunawal','tahunakhir','harga','residu','umur','penurunan1','penurunan2']));

        // $penyusutan = Asset::select(DB::raw("CAST(SUM(as_harga) as int) as as_harga"))
        //               ->GroupBy(DB::raw("as_tahun_kepemilikan"))
        //               ->pluck('as_harga');
        // $tahun      = Asset::select(DB::raw("CAST(SUM(as_tahun_kepemilikan) as int) as as_tahun_kepemilikan"))
        //               ->GroupBy(DB::raw("as_tahun_kepemilikan"))
        //               ->pluck('as_tahun_kepemilikan'); 




        // $start = $asset->as_tahun_kepemilikan;
        // $umurManfaat = $asset->as_umur_manfaat;
        // $end   = $start + $umurManfaat;
        // $for = ($i=$start;$i<$end;$i++){
        //     echo "Ulang ke ".$i;
        //     }
      
        // $ste = Carbon::create($year);
        // $start = Carbon::now()->isoFormat('Y');
        // echo $mytime->toDateTimeString();
        // 5.000.000 - 2.500.000 : 5 
        // = 2.500.000 : 5
        // = 500.000
    }

    public function edit($id)
    {
        $asset = Asset::find($id);
        $lokasiAsset = MasterLokasiAsset::all();
        return view('app.asset.edit', compact(['asset','lokasiAsset']));

    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'as_nama_asset' => 'required',
            'as_mla_id' => 'required',
            'as_kode_asset' => 'required',
            'as_tahun_kepemilikan' => 'required',
            'as_harga' => 'required',
            'as_nilai_residu' => 'required',
            'as_umur_manfaat' => 'required',
        ]);
        $dataasset = Asset::find($id);
        $dataasset->as_nama_asset = $request->as_nama_asset;
        $dataasset->as_mla_id = $request->as_mla_id;
        $dataasset->as_kode_asset = $request->as_kode_asset;
        $dataasset->as_tahun_kepemilikan = $request->as_tahun_kepemilikan;
        $dataasset->as_harga = $request->as_harga;
        $dataasset->as_nilai_residu = $request->as_nilai_residu;
        $dataasset->as_umur_manfaat = $request->as_umur_manfaat;
        $dataasset->save();
        Alert::success('Berhasil', 'Data Berhasil Diedit');
        return redirect()->route('app_asset.index');

    }
    public function destroy($id)
    {
        $dataasset = Asset::find($id);
        $dataasset->delete();
        // Alert::success('Berhasil', 'Data Berhasil Dihapus');
        // return redirect()->route('app_asset.index'); 
        return response()->json(['status' => 'Data Berhasil di hapus!']);   
    }




}


