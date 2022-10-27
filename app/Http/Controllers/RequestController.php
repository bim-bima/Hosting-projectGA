<?php

namespace App\Http\Controllers;
use App\Models\AppRequest;
use Illuminate\Http\Request;
use RealRashid\SweetAlert\Facades\Alert;

class RequestController extends Controller
{
        public function index()
        {
            $cek = AppRequest::count();
            $datarequest = AppRequest::all();
            return view('app.request.index', compact(['datarequest','cek']));
        }

        public function store(Request $request)
        {
        $request->validate([
        'ar_request' => 'required|min:4|max:200',
        'tanggal_estimasi' => 'required|after:tomorrow',
        'ar_kebutuhan' => 'required',
        'ar_catatan' => 'required',
        ]);
        $datarequest = new AppRequest();
        $datarequest->ar_request = $request->ar_request;
        $datarequest->ar_perequest = $request->ar_perequest;
        $datarequest->ar_tanggal_estimasi = $request->tanggal_estimasi;
        $datarequest->ar_kebutuhan = $request->ar_kebutuhan;
        $datarequest->ar_catatan = $request->ar_catatan;
        $datarequest->save();
        Alert::success('Berhasil', 'Data Berhasil Dikirim');

        return redirect()->route('home');

        }
        
        public function show($id)
        {
        $request = AppRequest::find($id);
        return view('app.request.show', compact(['request']));
        }

        public function destroy($id)
        {
            $id = AppRequest::find($id);
            $id->delete();
        // Alert::success('Berhasil', 'Data Berhasil Dihapus');
        // return redirect()->route('app_request.index');
        return response()->json(['status' => 'Data Berhasil di hapus!']);
        }
}
