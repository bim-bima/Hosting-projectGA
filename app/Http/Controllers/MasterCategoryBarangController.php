<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\MasterCategoryBarang;
use RealRashid\SweetAlert\Facades\Alert;

class MasterCategoryBarangController extends Controller
{
        /**
        * Display a listing of the resource.
        *
        * @return \Illuminate\Http\Response
        */
        public function index()
        {
            $datacategorybarang = MasterCategoryBarang::paginate(4);
            return view('master.mastercategorybarang.index', compact(['datacategorybarang']));
        }
        /**
        * Show the form for creating a new resource.
        *
        * @return \Illuminate\Http\Response
        */
        public function create()
        {
        return view('master.mastercategorybarang.create');
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
        'mcb_category' => 'required|min:3|max:100',
        ]);
        $masterCategorybarang = new MasterCategoryBarang();
        $masterCategorybarang->mcb_category = $request->mcb_category;
        $masterCategorybarang->save();
        Alert::success('Berhasil', 'Data Berhasil Ditambahkan');
        return redirect()->route('master_barang.index');
        }
        /**
        * Display the specified resource.
        *
        * @param  \App\MasterCategoryBarang  $pic
        * @return \Illuminate\Http\Response
        */
        public function show(MasterCategoryBarang $pic)
        {
        // return view('',compact(''));
        }
        /**
        * Show the form for editing the specified resource.
        *
        * @param  \App\MasterCategoryBarang  $pic
        * @return \Illuminate\Http\Response
        */
        public function edit($id)
        {
            // dd($pic);
            $categorybarang = MasterCategoryBarang::find($id);
            return view('master.mastercategorybarang.edit',compact('barang'));
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
        'mcb_category' => 'required|min:3|max:100',
        ]);
        $categorybarang = MasterCategoryBarang::find($id);
        $categorybarang->mcb_category = $request->mcb_category;
        $categorybarang->save();
        Alert::success('Berhasil', 'Data Berhasil Diedit');
        return redirect()->route('master_categorybarang.index');
        }
        /**
        * Remove the specified resource from storage.
        *
        * @param  \App\Company  $company
        * @return \Illuminate\Http\Response
        */
        public function destroy($id)
        {
            $id = MasterCategoryBarang::find($id);
            $id->delete();
        // Alert::success('Berhasil', 'Data Berhasil Dihapus');
        // return redirect()->route('master_barang.index');
        return response()->json(['status' => 'Data Berhasil di hapus!']);
        }
}
