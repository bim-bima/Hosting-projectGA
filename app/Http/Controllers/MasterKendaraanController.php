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
            $datakendaraan = MasterKendaraan::paginate(4);
            return view('master.masterkendaraan.index', compact(['datakendaraan']));
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
        'mk_nama_kendaraan' => 'required|min:5|max:20',
        ]);
        $kendaraan = new MasterKendaraan();
        $kendaraan->mk_nama_kendaraan = $request->mk_nama_kendaraan;
        $kendaraan->mk_no_polisi = $request->mk_no_polisi;
        $kendaraan->mk_jenis = $request->mk_jenis;
        $kendaraan->mk_merk = $request->mk_merk;
        $kendaraan->mk_warna = $request->mk_warna;
        $kendaraan->mk_perlengkapan = $request->mk_perlengkapan;
        $kendaraan->mk_status = $request->mk_status;
        $kendaraan->mk_bahan_bakar = $request->mk_bahan_bakar;
        $kendaraan->mk_kilometer = $request->mk_kilometer;
        $kendaraan->mk_kondisi_lain = $request->mk_kondisi_lain;
        $kendaraan->save();
        Alert::success('Berhasil', 'Data Berhasil Ditambahkan');
        return redirect()->route('master_kendaraan.index');
        }
        /**
        * Display the specified resource.
        *
        * @param  \App\MasterKendaraan  $pic
        * @return \Illuminate\Http\Response
        */
        public function show(MasterKendaraan $pic)
        {
        // return view('',compact(''));
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
        'mk_nama_kendaraan' => 'required|min:5|max:15',
        ]);
        $kendaraan = MasterKendaraan::find($id);
        $kendaraan->mk_nama_kendaraan = $request->mk_nama_kendaraan;
        $kendaraan->mk_no_polisi = $request->mk_no_polisi;
        $kendaraan->mk_jenis = $request->mk_jenis;
        $kendaraan->mk_merk = $request->mk_merk;
        $kendaraan->mk_warna = $request->mk_warna;
        $kendaraan->mk_perlengkapan = $request->mk_perlengkapan;
        $kendaraan->mk_status = $request->mk_status;
        $kendaraan->mk_bahan_bakar = $request->mk_bahan_bakar;
        $kendaraan->mk_kilometer = $request->mk_kilometer;
        $kendaraan->mk_kondisi_lain = $request->mk_kondisi_lain;
        $kendaraan->save();
        Alert::success('Berhasil', 'Data Berhasil Diedit');
        return redirect()->route('master_kendaraan.index');
        }

        // public function show($id)
        // {
        //     $kendaraan = MasterKendaraan::find($id);
        //     return view('master.masterkendaraan.editstatus',compact('kendaraan'));
        // }

        /**
        * Update the specified resource in storage.
        *
        * @param  \Illuminate\Http\Request  $request
        * @param  \App\MasterKendaraan  $pic
        * @return \Illuminate\Http\Response
        */
        // public function update(Request $request, $id)
        // {
        // $request->validate([
        // 'mk_nama_kendaraan' => 'required|min:5|max:15',
        // ]);
        // $kendaraan = MasterKendaraan::find($id);
        // $kendaraan->mk_nama_kendaraan = $request->mk_nama_kendaraan;
        // $kendaraan->mk_no_polisi = $request->mk_no_polisi;
        // $kendaraan->mk_jenis = $request->mk_jenis;
        // $kendaraan->mk_merk = $request->mk_merk;
        // $kendaraan->mk_warna = $request->mk_warna;
        // $kendaraan->mk_perlengkapan = $request->mk_perlengkapan;
        // $kendaraan->save();
        // Alert::success('Berhasil', 'Data Berhasil Diedit');
        // return redirect()->route('master_kendaraan.index');
        // }

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
