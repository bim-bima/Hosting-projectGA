<?php

namespace App\Http\Controllers;

use App\Models\MasterPic;
use Illuminate\Http\Request;
use RealRashid\SweetAlert\Facades\Alert;

class MasterPicController extends Controller
{
        /**
        * Display a listing of the resource.
        *
        * @return \Illuminate\Http\Response
        */
        public function index()
        {
            $cek = MasterPic::count();
            $datapic = MasterPic::all();
            return view('master.masterpic.index', compact(['datapic','cek']));
        }
        /**
        * Show the form for creating a new resource.
        *
        * @return \Illuminate\Http\Response
        */
        public function create()
        {
        return view('master.masterpic.create');
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
        'nama_pic' => 'required|min:3|max:50|regex:/^[A-Za-z . ]+$/',
        ]);
        $masterpic = new MasterPic();
        $masterpic->mp_nama = $request->nama_pic;
        $masterpic->save();
        Alert::success('Berhasil', 'Data Berhasil Ditambahkan');
        return redirect()->route('master_pic.index');
        }
        /**
        * Display the specified resource.
        *
        * @param  \App\MasterPic  $pic
        * @return \Illuminate\Http\Response
        */
        public function show(MasterPic $pic)
        {
        // return view('',compact(''));
        }
        /**
        * Show the form for editing the specified resource.
        *
        * @param  \App\MasterPic  $pic
        * @return \Illuminate\Http\Response
        */
        public function edit($id)
        {
            // dd($pic);
            $pic = MasterPic::find($id);
            return view('master.masterpic.edit',compact('pic'));
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
        'nama_pic' => 'required|min:3|max:50|regex:/^[A-Za-z . ]+$/',
        ]);
        $pic = MasterPic::find($id);
        $pic->mp_nama = $request->nama_pic;
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
