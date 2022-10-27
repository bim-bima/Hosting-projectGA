<?php
namespace App\Http\Controllers;

use App\Models\MasterKendaraan;
use RealRashid\SweetAlert\Facades\Alert;
use Illuminate\Http\Request;

class MasterKendaraanController extends Controller
{
        /**
        * Display a listing of the resource.
        *
        * @return \Illuminate\Http\Response
        */
        public function index()
        {
            $cek = MasterKendaraan::count();
            $datakendaraan = MasterKendaraan::all();
            return view('master.masterkendaraan.index', compact(['datakendaraan','cek']));
        }
        /**
        * Show the form for creating a new resource.
        *
        * @return \Illuminate\Http\Response
        */
        public function create()
        {
        return view('master.masterkendaraan.create');
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
        'bahan_bakar' => 'required|regex:/^[0-9]+$/|max:15',
        'kilometer' => 'required|regex:/^[0-9]+$/|max:15',
        'kondisi_lain' => 'required',
        'nama_kendaraan' => 'required|min:3|max:100',
        'no_polisi' => 'required|min:5|max:10',
        'mk_jenis' => 'required',
        'merk' => 'required|max:20',
        'warna' => 'required|max:20',
        'mk_perlengkapan' => 'required',
        ]);
        $kendaraan = new MasterKendaraan();
        $kendaraan->mk_bahan_bakar = $request->bahan_bakar;
        $kendaraan->mk_kilometer = $request->kilometer;
        $kendaraan->mk_kondisi_lain = $request->kondisi_lain;
        $kendaraan->mk_nama_kendaraan = $request->nama_kendaraan;
        $kendaraan->mk_no_polisi = $request->no_polisi;
        $kendaraan->mk_jenis = $request->mk_jenis;
        $kendaraan->mk_merk = $request->merk;
        $kendaraan->mk_warna = $request->warna;
        $kendaraan->save();
        Alert::success('Berhasil', 'Data Berhasil Ditambahkan');
        return redirect()->route('app_kendaraan.index');
        }
        /**
        * Display the specified resource.
        *
        * @param  \App\MasterKendaraan  $pic
        * @return \Illuminate\Http\Response
        */
        // public function show(MasterKendaraan $pic)
        // {
        // // return view('',compact(''));
        // }
        public function show($id)
        {
            $kendaraan = MasterKendaraan::find($id);
            return view('master.masterkendaraan.show',compact('kendaraan'));
            // return view('master.masterkendaraan.editstatus',compact('kendaraan'));
        }

        /**
        * Show the form for editing the specified resource.
        *
        * @param  \App\MasterKendaraan  $pic
        * @return \Illuminate\Http\Response
        */
        public function edit($id)
        {
            // dd($pic);
            $kendaraan = MasterKendaraan::find($id);
            return view('master.masterkendaraan.edit',compact('kendaraan'));
        }
        /**
        * Update the specified resource in storage.
        *
        * @param  \Illuminate\Http\Request  $request
        * @param  \App\MasterKendaraan  $pic
        * @return \Illuminate\Http\Response
        */
        public function update(Request $request, $id)
        {
        $request->validate([
        // 'bahan_bakar' => 'regex:/^[0-9]+$/|max:15',
        // 'kilometer' => 'regex:/^[0-9]+$/|max:15',
        // 'kondisi_lain' => 'required',
        // 'nama_kendaraan' => 'required|min:3|max:100',
        // 'no_polisi' => 'required|min:5|max:10',
        // 'mk_jenis' => 'required',
        // 'merk' => 'required|max:50',
        // 'warna' => 'required|max:50',
        // 'mk_perlengkapan' => 'required',
        ]);
        $kendaraan = MasterKendaraan::find($id);
        $kendaraan->mk_bahan_bakar = $request->bahan_bakar;
        $kendaraan->mk_kilometer = $request->kilometer;
        $kendaraan->mk_kondisi_lain = $request->kondisi_lain;
        $kendaraan->mk_nama_kendaraan = $request->nama_kendaraan;
        $kendaraan->mk_no_polisi = $request->no_polisi;
        $kendaraan->mk_jenis = $request->mk_jenis;
        $kendaraan->mk_merk = $request->merk;
        $kendaraan->mk_warna = $request->warna;
        $kendaraan->save();
        Alert::success('Berhasil', 'Data Berhasil Diedit');
        return redirect()->route('master_kendaraan.index');
        }

        /**
        * Remove the specified resource from storage.
        *
        * @param  \App\Company  $company
        * @return \Illuminate\Http\Response
        */
        public function destroy($id)
        {
            $id = MasterKendaraan::find($id);
            $id->delete();
        // Alert::success('Berhasil', 'Data Berhasil Dihapus');
        // return redirect()->route('master_pic.index');
        return response()->json(['status' => 'Data Berhasil di hapus!']);
        }
}
