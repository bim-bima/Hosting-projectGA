<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\MasterJenisBarang;
use RealRashid\SweetAlert\Facades\Alert;

class MasterJenisBarangController extends Controller
{
        /**
        * Display a listing of the resource.
        *
        * @return \Illuminate\Http\Response
        */
        public function index()
        {
            $cek = MasterJenisBarang::count();
            $datajenisbarang = MasterJenisBarang::paginate(8);
            return view('master.masterJenisBarang.index', compact(['datajenisbarang','cek']));
        }
        /**
        * Show the form for creating a new resource.
        *
        * @return \Illuminate\Http\Response
        */
        public function create()
        {
        return view('master.masterjenisbarang.create');
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
        'mjb_jenis_barang' => 'required|min:5|max:15',
        ]);
        $masterJenisBarang = new MasterJenisBarang();
        $masterJenisBarang->mjb_jenis_barang = $request->mjb_jenis_barang;
        $masterJenisBarang->save();
        Alert::success('Berhasil', 'Data Berhasil Ditambahkan');
        return redirect()->route('master_jenisbarang.index');
        }
        /**
        * Display the specified resource.
        *
        * @param  \App\MasterJenisBarang  $pic
        * @return \Illuminate\Http\Response
        */
        public function show(MasterJenisBarang $pic)
        {
        // return view('',compact(''));
        }
        /**
        * Show the form for editing the specified resource.
        *
        * @param  \App\MasterJenisBarang  $pic
        * @return \Illuminate\Http\Response
        */
        public function edit($id)
        {
            // dd($pic);
            $jenisbarang = MasterJenisBarang::find($id);
            return view('master.masterjenisbarang.edit',compact('jenisbarang'));
        }
        /**
        * Update the specified resource in storage.
        *
        * @param  \Illuminate\Http\Request  $request
        * @param  \App\MasterJenisBarang  $pic
        * @return \Illuminate\Http\Response
        */
        public function update(Request $request, $id)
        {
        $request->validate([
        'mjb_jenis_barang' => 'required|min:5|max:50',
        ]);
        $pic = MasterJenisBarang::find($id);
        $pic->mjb_jenis_barang = $request->mjb_jenis_barang;
        $pic->save();
        Alert::success('Berhasil', 'Data Berhasil Diedit');
        return redirect()->route('master_jenisbarang.index');
        }
        /**
        * Remove the specified resource from storage.
        *
        * @param  \App\Company  $company
        * @return \Illuminate\Http\Response
        */
        public function destroy($id)
        {
            $id = MasterJenisBarang::find($id);
            $id->delete();
        // Alert::success('Berhasil', 'Data Berhasil Dihapus');
        // return redirect()->route('master_jenisbarang.index');
        return response()->json(['status' => 'Data Berhasil di hapus!']);
        }
}

