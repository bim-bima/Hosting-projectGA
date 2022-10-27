<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Carbon\Carbon;
use App\Models\Kendaraan;
use App\Models\MasterPic;
use App\Models\MasterKendaraan;
use RealRashid\SweetAlert\Facades\Alert;
use Illuminate\Support\Facades\Auth;

class KendaraanController extends Controller
{
        /**
        * Display a listing of the resource.
        *
        * @return \Illuminate\Http\Response
        */
        public function index()
        {
            $cek = Kendaraan::count();
            $kendaraan = Kendaraan::all();
            $datakendaraan = MasterKendaraan::all();
            $now = Carbon::now()->toDAteString();
            return view('app.kendaraan.index', compact(['kendaraan','datakendaraan','now','cek']));
        }
        /**
        * Show the form for creating a new resource.
        *
        * @return \Illuminate\Http\Response
        */
        public function create()
        {
        $namaKendaraan = MasterKendaraan::all();
        $datapic = Masterpic::all();
        return view('app.kendaraan.create', compact(['namaKendaraan','datapic']));
        }
        /**
        * Store a newly created resource in storage.    
        *
        * @param  \Illuminate\Http\Request  $request
        * @return \Illuminate\Http\Response
        */
        public function store(Request $request)
        {
        // $request->validate([
        //     'ak_mk_id'=>'required|min:2|max:100', 
        //     'ak_pengguna'=>'required',
        //     'ak_tanggal_mulai'=>'min:2|max:100', 
        //     'as_harga'=>'required|min:2|max:100', 
        //     'ak_lokasi_tujuan'=>'min:2|max:100', 
        // ]);

        $datakendaraan = new Kendaraan;
        $datakendaraan->ak_mk_id = $request->ak_mk_id;
        $datakendaraan->ak_pengguna = $request->ak_pengguna;
        $datakendaraan->ak_tanggal_mulai = $request->ak_tanggal_mulai;
        $datakendaraan->ak_jam = $request->ak_jam;
        $datakendaraan->ak_tanggal_selesai = $request->ak_tanggal_selesai;
        $datakendaraan->ak_jam_selesai = $request->ak_jam_selesai;
        $datakendaraan->ak_lokasi_tujuan = $request->ak_lokasi_tujuan;
        $datakendaraan->ak_tujuan_pemakaian = $request->ak_tujuan_pemakaian;
        $datakendaraan->save();

        Alert::success('Berhasil', 'Data Berhasil Dikirim');
        $cek = Kendaraan::count();
        $namaKendaraan = MasterKendaraan::all();
        $datapic = Masterpic::all();
        if(auth()->user()->level == "pegawai"){
          $datakendaraan = MasterKendaraan::paginate(8);
          $pengguna = Auth::user()->name;
          $booking = Kendaraan::with('namaKendaraan','pic')->Where('ak_pengguna',$pengguna)->get(); 
            return view('home',compact(['datakendaraan','booking','cek']));
        }else{
            return redirect()->route('app_kendaraan.index');
        } 
        
    }
        /**
        * Display the specified resource.
        *
        * @param  \App\MasterPic  $pic
        * @return \Illuminate\Http\Response
        */
        public function show($id)
        {
            $namaKendaraan = MasterKendaraan::all();
            $pic = MasterPic::all();
            $kendaraan = Kendaraan::find($id);
            return view('app.kendaraan.show', compact(['kendaraan','namaKendaraan','pic']));
        }
        /**
        * Show the form for editing the specified resource.
        *
        * @param  \App\MasterPic  $pic
        * @return \Illuminate\Http\Response
        */
        public function edit($id)
        {
            $namaKendaraan = MasterKendaraan::all();
            $pic = MasterPic::all();
            $kendaraan = Kendaraan::find($id);
            return view('app.kendaraan.edit',compact('kendaraan','namaKendaraan','pic'));
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
        // 'mp_nama' => 'required|min:5|max:50',
        ]);
        $kendaraan = Kendaraan::find($id);
        $kendaraan->ak_mk_id = $request->ak_mk_id;
        $kendaraan->ak_pengguna = $request->ak_pengguna;
        $kendaraan->ak_tanggal_mulai = $request->ak_tanggal_mulai;
        $kendaraan->ak_jam = $request->ak_jam;
        $kendaraan->ak_kondisi = $request->ak_kondisi;
        $kendaraan->ak_lokasi_tujuan = $request->ak_lokasi_tujuan;
        $kendaraan->ak_tujuan_pemakaian = $request->ak_tujuan_pemakaian;
        $kendaraan->save();
        Alert::success('Berhasil', 'Data Berhasil Diedit');
        return redirect()->route('app_kendaraan.index');
        }
        /**
        * Remove the specified resource from storage.
        *
        * @param  \App\Company  $company
        * @return \Illuminate\Http\Response
        */
        public function destroy($id)
        {
            $id = Kendaraan::find($id);
            $id->delete();
        // Alert::success('Berhasil', 'Data Berhasil Dihapus');
        // return redirect()->route('app_kendaraan.index');
        return response()->json(['status' => 'Data Berhasil di hapus!']);
        }
}
