<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Pengajuan;
use App\Models\MasterVendor;
use App\Models\MasterPic;
use App\Models\MasterJenisPengajuan;
use RealRashid\SweetAlert\Facades\Alert;
use Illuminate\Support\Facades\DB;


class PengajuanController extends Controller
{
        /**
        * Display a listing of the resource.
        *
        * @return \Illuminate\Http\Response
        */
        public function index()
        {
            $cek = pengajuan::count();
            $datapengajuan = Pengajuan::all();
            $vendor = MasterVendor::all();
            $pic = MasterPic::all();
            $jenispengajuan = MasterJenisPengajuan::all();
            $ajuan = Pengajuan::where('ap_status', 'Menunggu Persetujuan')->get();
            $setuju = Pengajuan::where('ap_status', 'setujui')->with('vendor')->get();
            return view('app.pengajuan.index', compact(['datapengajuan','vendor','pic','jenispengajuan','setuju','ajuan','cek']));
        }
        /**
        * Show the form for creating a new resource.
        *
        * @return \Illuminate\Http\Response
        */
        public function create()
        {

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
        'nama_pengajuan'     => 'required|min:5|max:200',
        'jenis_pengajuan'    => 'required',
        'vendor'             => 'required',
        'biaya'              => 'required|min:4|max:11|regex:/^[0-9]+$/',
        'catatan'            => 'required',
        'tanggal_pengadaan'  => 'required|after:today',
        'ap_status'          => 'nullable',
        ]);

        $pengajuan = new Pengajuan();
        $pengajuan->ap_nama_pengajuan = $request->nama_pengajuan;
        $pengajuan->ap_mjp_id = $request->jenis_pengajuan;
        $pengajuan->ap_mv_id = $request->vendor;
        $pengajuan->ap_biaya = $request->biaya;
        $pengajuan->ap_catatan = $request->catatan;
        $pengajuan->ap_tanggal_pengadaan = $request->tanggal_pengadaan;
        $pengajuan->ap_status = 'Menunggu Persetujuan';
        $pengajuan->ap_reason = $request->ap_reason;
        $pengajuan->save();
        Alert::success('Berhasil', 'Data Berhasil Diajukan');
        return redirect()->route('app_pengajuan.index');
        }
        /**
        * Display the specified resource.
        *
        * @param  \App\MasterPic  $pic
        * @return \Illuminate\Http\Response
        */
        public function update(Request $request, $id)
        {
        $setujui = Pengajuan::find($id);
        $setujui->ap_status = $request->ap_status;
        $setujui->ap_reason = $request->ap_reason;
        $setujui->save();
        Alert::success('Berhasil', 'Pengajuan Berhasil Dikirim');
        return redirect()->route('app_pengajuan.index');
        }
        // public function show(MasterPic $pic)
        // {
        // return view('',compact(''));
        // }
        /**
        * Update the specified resource in storage.
        *
        * @param  \Illuminate\Http\Request  $request
        * @param  \App\MasterPic  $pic
        * @return \Illuminate\Http\Response
        */
        public function show($id)
        {
        $pengajuan = Pengajuan::find($id);
        return view('app.pengajuan.show', compact(['pengajuan']));
        }

        public function destroy($id)
        {
        $datapengajuan = Pengajuan::find($id);
        $datapengajuan->delete();
          //   Alert::success('Berhasil', 'Data Berhasil Dihapus');
        //   return redirect()->route('app_asset.index'); 
        return response()->json(['status' => 'Data Berhasil di hapus!']);   
        }
}

