<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Pengajuan;
use App\Models\MasterVendor;
use App\Models\MasterPic;
use RealRashid\SweetAlert\Facades\Alert;

class PengajuanController extends Controller
{
        /**
        * Display a listing of the resource.
        *
        * @return \Illuminate\Http\Response
        */
        public function index()
        {
            $datapengajuan = Pengajuan::with('vendor','pic')->paginate(4);
            return view('app.pengajuan.index', compact(['datapengajuan']));
        }
        /**
        * Show the form for creating a new resource.
        *
        * @return \Illuminate\Http\Response
        */
        public function create()
        {
        $vendor = MasterVendor::all();
        $pic = MasterPic::all();
        return view('app.pengajuan.create', compact(['vendor','pic']));
        }
        /**
        * Store a newly created resource in storage.
        *
        * @param  \Illuminate\Http\Request  $request
        * @return \Illuminate\Http\Response
        */
        public function store(Request $request)
        {
        $request->validate([
        'ap_nama_pengajuan' => 'required|min:5|max:200',
        'ap_jenis_pengajuan' => 'required|min:5|max:200',
        'ap_mv_id' => 'nullable',
        'ap_biaya' => 'nullable',
        'ap_catatan' => 'required|min:5|max:500',
        'ap_tanggal_pengadaan' => 'nullable',
        'ap_mp_id' => 'nullable',
        ]);
        $pengajuan = new Pengajuan();
        $pengajuan->ap_nama_pengajuan = $request->ap_nama_pengajuan;
        $pengajuan->ap_jenis_pengajuan = $request->ap_jenis_pengajuan;
        $pengajuan->ap_mv_id = $request->ap_mv_id;
        $pengajuan->ap_biaya = $request->ap_biaya;
        $pengajuan->ap_catatan = $request->ap_catatan;
        $pengajuan->ap_tanggal_pengadaan = $request->ap_tanggal_pengadaan;
        $pengajuan->ap_mp_id = $request->ap_mp_id;
        $pengajuan->save();
        Alert::success('Berhasil', 'Data Berhasil Ditambahkan');
        return redirect()->route('app_pengajuan.index');
        }
        /**
        * Display the specified resource.
        *
        * @param  \App\MasterPic  $pic
        * @return \Illuminate\Http\Response
        */
        // public function show(MasterPic $pic)
        // {
        // return view('',compact(''));
        // }
        /**
        * Show the form for editing the specified resource.
        *
        * @param  \App\MasterPic  $pic
        * @return \Illuminate\Http\Response
        */
        public function edit($id)
        {
            $pengajuan = Pengajuan::find($id);
            return view('app.pengajuan.edit',compact('pengajuan'));
        }
        /**
        * Update the specified resource in storage.
        *
        * @param  \Illuminate\Http\Request  $request
        * @param  \App\MasterPic  $pic
        * @return \Illuminate\Http\Response
        */
        public function update(Request $request, $id)
        {
        $request->validate([
        'mp_nama' => 'required|min:5|max:50',
        ]);
        $pic = MasterPic::find($id);
        $pic->mp_nama = $request->mp_nama;
        $pic->save();
        Alert::success('Berhasil', 'Data Berhasil Diedit');
        return redirect()->route('master_pic.index');
        }
        /**
        * Remove the specified resource from storage.
        *
        * @param  \App\Company  $company
        * @return \Illuminate\Http\Response
        */
        public function destroy($id)
        {
            $id = MasterPic::find($id);
            $id->delete();
        // Alert::success('Berhasil', 'Data Berhasil Dihapus');
        // return redirect()->route('master_pic.index');
        return response()->json(['status' => 'Data Berhasil di hapus!']);


        }
}

