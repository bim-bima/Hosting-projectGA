<?php

namespace App\Http\Controllers;

use App\Models\MasterCategoryAsset;
use Illuminate\Http\Request;
use RealRashid\SweetAlert\Facades\Alert;

class MAsterCategoryAssetController extends Controller
{
        /**
        * Display a listing of the resource.
        *
        * @return \Illuminate\Http\Response
        */
        public function index()
        {
            $cek = MasterCategoryAsset::count();
            $datacategory = MasterCategoryAsset::all();
            return view('master.mastercategoryasset.index', compact(['datacategory','cek']));
        }
        /**
        * Show the form for creating a new resource.
        *
        * @return \Illuminate\Http\Response
        */
        public function create()
        {
        return view('master.mastercategoryasset.create');
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
        'mca_category' => 'required|max:100',
        ]);
        $mastercategoryasset = new Mastercategoryasset();
        $mastercategoryasset->mca_category = $request->mca_category;
        $mastercategoryasset->save();
        Alert::success('Berhasil', 'Data Berhasil Ditambahkan');
        return redirect()->route('master_categoryasset.index');
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
            // dd($pic);
            $mastercategory = MasterCategoryAsset::find($id);
            return view('master.mastercategoryasset.edit',compact('mastercategory'));
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
        'mca_category' => 'required|max:100',
        ]);
        $category = MasterCategoryAsset::find($id);
        $category->mca_category = $request->mca_category;
        $category->save();
        Alert::success('Berhasil', 'Data Berhasil Diedit');
        return redirect()->route('master_categoryasset.index');
        }
        /**
        * Remove the specified resource from storage.
        *
        * @param  \App\Company  $company
        * @return \Illuminate\Http\Response
        */
        public function destroy($id)
        {
            $id = MasterCategoryAsset::find($id);
            $id->delete();
            return response()->json(['status' => 'Data Berhasil di hapus!']);
        }

}
