<?php

namespace App\Http\Controllers;

use Auth;
use Carbon\Carbon;
use App\Models\Asset;
use App\Models\MasterLokasiAsset;
use App\Models\MasterCategoryAsset;
use Illuminate\Http\Request;
use RealRashid\SweetAlert\Facades\Alert;

class AssetController extends Controller
{
    public function index()
        {
            $cek = Asset::count();
            $dataasset = Asset::all();
            return view('app.asset.index', compact(['dataasset','cek']));
        }

    public function create()
    {
            $lokasiAsset = MasterLokasiAsset::all();
        $categoryasset = MasterCategoryAsset::all();
        return view('app.asset.create', compact(['lokasiAsset','categoryasset']));
        
    }
    
    public function store(Request $request)
    {
        $request->validate([
            'nama_asset'            => 'required|min:2|max:150', 
            'jumlah_asset'          => 'required|regex:/^[0-9]+$/', 
            'lokasi_asset'          => 'required',
            'category_asset'        => 'required',
            'tanggal'               => 'required',
            // 'tahun_pembelian_asset' => 'required|min:4|max:4|after:1900|regex:/^[0-9]+$/',
            // 'bulan_pembelian_asset' => 'required',
            'harga_asset'           => 'required|min:4|max:11|regex:/^[0-9]+$/', 
            'umur_manfaat_asset'    => 'required', 
        ]);
         $prefik = "L9";
         if( $request->umur_manfaat_asset == 4){
            $masa = 1;
         }elseif($request->umur_manfaat_asset == 8){
            $masa = 2;
         }elseif($request->umur_manfaat_asset == 12){
            $masa = 3;
         }elseif($request->umur_manfaat_asset == 16){
            $masa = 4;
         }elseif($request->umur_manfaat_asset == 20){
            $masa = 5;
         }else{
            $masa = 5;
         }
         $kelompok = $masa;

         $category1 = $request->category_asset;
         $category2 = MasterCategoryAsset::where('mca_category', $category1)->get('id');
         $category = preg_replace("/[^0-9]/", "", $category2);
         $ambil2 = $request->nama_asset;
         $subcategory = substr($ambil2,-0,3);
         $nourut = 001;
         // $ambil3 = $request->tanggal;
         // $bulantahun = substr($ambil3,-0,7);
         $tanggal22 = $request->tanggal;
         $tahunbulan1 = substr($tanggal22,2);
         $tahunbulan = substr($tahunbulan1,0,-3);

         $kodeasset = $prefik.'.'.$kelompok.'.'.$category.'.'.$subcategory;  

        for($c=1; $c<=$request->jumlah_asset; $c++){            
        $dataasset = new Asset;
        $dataasset->as_nama_asset = $request->nama_asset;
        $dataasset->as_jumlah = $request->jumlah_asset;
        $dataasset->as_mla_id = $request->lokasi_asset;
        $dataasset->as_mca_id = $request->category_asset;
        $dataasset->as_tanggal = $request->tanggal;
        $dataasset->as_kode_asset = $kodeasset.'.'.$nourut++.'.'.$tahunbulan;
        // $dataasset->as_kode_asset = 'kodeasset';
        $dataasset->as_harga = $request->harga_asset;
        $dataasset->as_umur_manfaat = $request->umur_manfaat_asset;
        $dataasset->save();
        }
        Alert::success('Berhasil', 'Data Berhasil Ditambahkan');
        return redirect()->route('app_asset.index');
    }

    public function show($id)
    {
        $asset = Asset::find($id);
        return view('app.asset.show', compact(['asset']));
    }

    public function edit($id)
    {
        $asset = Asset::find($id);
        $lokasiAsset = MasterLokasiAsset::all();
        $categoryAsset = MasterCategoryAsset::all();
    return view('app.asset.edit', compact(['asset','lokasiAsset','categoryAsset']));

    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'nama_asset'            => 'required|min:2|max:150', 
            'lokasi_asset'          => 'required',
            'category_asset'        => 'required',
            'tanggal'        => 'required',
            'harga_asset'           => 'required|min:4|max:11|regex:/^[0-9]+$/', 
            'umur_manfaat_asset'    => 'required',
        ]);
        $dataasset = Asset::find($id);
        $prefik = "L9";
         if( $request->umur_manfaat_asset == 4){
            $masa = 1;
         }elseif($request->umur_manfaat_asset == 8){
            $masa = 2;
         }elseif($request->umur_manfaat_asset == 12){
            $masa = 3;
         }elseif($request->umur_manfaat_asset == 16){
            $masa = 4;
         }elseif($request->umur_manfaat_asset == 20){
            $masa = 5;
         }else{
            $masa = 5;
         }
         $kelompok = $masa;
         $category1 = $request->category_asset;
         $category2 = MasterCategoryAsset::where('mca_category', $category1)->get('id');
         $category = preg_replace("/[^0-9]/", "", $category2);
         $ambil2 = $request->nama_asset;
         $subcategory = substr($ambil2,-0,3);
         $no = $request->as_kode_asset;
         $urut = substr($no,11);
         $nourut = substr($urut,0,-6);        
         $tanggal22 = $request->tanggal;
         $tahunbulan1 = substr($tanggal22,2);
         $tahunbulan = substr($tahunbulan1,0,-3);
         $kodeasset = $prefik.'.'.$kelompok.'.'.$category.'.'.$subcategory;  

        $dataasset->as_nama_asset = $request->nama_asset;
        $dataasset->as_mla_id = $request->lokasi_asset;
        $dataasset->as_mca_id = $request->category_asset;
        $dataasset->as_kode_asset = $kodeasset.'.'.$nourut.'.'.$tahunbulan;
        $dataasset->as_harga = $request->harga_asset;
        $dataasset->as_umur_manfaat = $request->umur_manfaat_asset;
        $dataasset->save();
        Alert::success('Berhasil', 'Data Berhasil Diedit');
        return redirect()->route('app_asset.index');

    }
    public function destroy($id)
    {
        $dataasset = Asset::find($id);
        $dataasset->delete();
      //   Alert::success('Berhasil', 'Data Berhasil Dihapus');
      //   return redirect()->route('app_asset.index'); 
        return response()->json(['status' => 'Data Berhasil di hapus!']);   
    }




}


