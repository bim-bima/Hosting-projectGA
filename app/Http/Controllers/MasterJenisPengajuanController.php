<?php

namespace App\Http\Controllers;

use App\Models\MasterJenisPengajuan;
use Illuminate\Http\Request;
use RealRashid\SweetAlert\Facades\Alert;

class MasterJenisPengajuanController extends Controller
{
        /**
        * Display a listing of the resource.
        *
        * @return \Illuminate\Http\Response
        */
        public function index()
        {
            $cek = MasterJenisPengajuan::count();
            $jenispengajuan = MasterJenisPengajuan::all();
            return view('master.masterjenispengajuan.index', compact(['jenispengajuan','cek']));
        }
        /**
        * Show the form for creating a new resource.
        *
        * @return \Illuminate\Http\Response
        */
        public function create()
        {
        return view('master.masterjenispengajuan.create');
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
        'mjp_jenis' => 'required|max:200',
        ]);
        $MasterJenisPengajuan = new MasterJenisPengajuan();
        $MasterJenisPengajuan->mjp_jenis = $request->mjp_jenis;
        $MasterJenisPengajuan->save();
        Alert::success('Berhasil', 'Data Berhasil Ditambahkan');
        return redirect()->route('master_jenispengajuan.index');
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
            $jenispengajuan = MasterJenisPengajuan::find($id);
            return view('master.masterjenispengajuan.edit',compact('jenispengajuan'));
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
        'mjp_jenis' => 'required|max:200',
        ]);
        $jenispengajuan = MasterJenisPengajuan::find($id);
        $jenispengajuan->mjp_jenis = $request->mjp_jenis;
        $jenispengajuan->save();
        Alert::success('Berhasil', 'Data Berhasil Diedit');
        return redirect()->route('master_jenispengajuan.index');
        }
        /**
        * Remove the specified resource from storage.
        *
        * @param  \App\Company  $company
        * @return \Illuminate\Http\Response
        */
        public function destroy($id)
        {
            $id = MasterJenisPengajuan::find($id);
            $id->delete();
        // Alert::success('Berhasil', 'Data Berhasil Dihapus');
        // return redirect()->route('master_pic.index');
        return response()->json(['status' => 'Data Berhasil di hapus!']);


        }
}
