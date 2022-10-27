<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\MasterBarang;
use RealRashid\SweetAlert\Facades\Alert;

class MasterBarangController extends Controller
{
        /**
        * Display a listing of the resource.
        *
        * @return \Illuminate\Http\Response
        */
        public function index()
        {
            $cek = MasterBarang::count();
            $databarang = MasterBarang::paginate(8);
            return view('master.masterBarang.index', compact(['databarang','cek']));
        }
        /**
        * Show the form for creating a new resource.
        *
        * @return \Illuminate\Http\Response
        */
        public function create()
        {
        return view('master.masterbarang.create');
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
        'mb_nama_barang' => 'required|min:3|max:100',
        ]);
        $masterbarang = new MasterBarang();
        $masterbarang->mb_nama_barang = $request->mb_nama_barang;
        $masterbarang->save();
        Alert::success('Berhasil', 'Data Berhasil Ditambahkan');
        return redirect()->route('master_barang.index');
        }
        /**
        * Display the specified resource.
        *
        * @param  \App\MasterBarang  $pic
        * @return \Illuminate\Http\Response
        */
        public function show(MasterBarang $pic)
        {
        // return view('',compact(''));
        }
        /**
        * Show the form for editing the specified resource.
        *
        * @param  \App\MasterBarang  $pic
        * @return \Illuminate\Http\Response
        */
        public function edit($id)
        {
            // dd($pic);
            $barang = MasterBarang::find($id);
            return view('master.masterbarang.edit',compact('barang'));
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
        'mb_nama_barang' => 'required|min:3|max:100',
        ]);
        $pic = MasterBarang::find($id);
        $pic->mb_nama_barang = $request->mb_nama_barang;
        $pic->save();
        Alert::success('Berhasil', 'Data Berhasil Diedit');
        return redirect()->route('master_barang.index');
        }
        /**
        * Remove the specified resource from storage.
        *
        * @param  \App\Company  $company
        * @return \Illuminate\Http\Response
        */
        public function destroy($id)
        {
            $id = MasterBarang::find($id);
            $id->delete();
        // Alert::success('Berhasil', 'Data Berhasil Dihapus');
        // return redirect()->route('master_barang.index');
        return response()->json(['status' => 'Data Berhasil di hapus!']);
        }

}
