<?php

namespace App\Http\Controllers;

use Auth;
use Carbon\Carbon;
use Illuminate\Http\Request;
use App\Models\Perencanaan;
use App\Models\Aktivitas;
use App\Models\MasterAktivitas;
use RealRashid\SweetAlert\Facades\Alert;
use Illuminate\Support\Facades\DB;

class PerencanaanController extends Controller
{
    public function index()
    {
        $dataperencanaan = Perencanaan::paginate(5);
        return view('app.perencanaan.index', compact(['dataperencanaan']));
    }   
    public function store(Request $request)
    {
        $request->validate([
        // 'mp_nama' => 'required|min:5|max:15',
        ]);
        $dataperencanaan = new Perencanaan();
        $dataperencanaan->ap_bulan = $request->ap_bulan;
        $dataperencanaan->ap_tahun = $request->ap_tahun;
        $dataperencanaan->save();
        Alert::success('Berhasil', 'Data Berhasil Ditambahkan');
        return redirect()->route('app_perencanaan.index');
    }
    public function show($id)
    {
        $dataAktivitas = Aktivitas::all();
        foreach ($dataAktivitas as $aktivitas){
            $color = null;
            if($aktivitas->prioritas == 'utama'){
                $color = 'red';
            }elseif($aktivitas->prioritas == 'sedang'){
                $color = 'green';
            }else{
                $color = 'blue';
            }

            $events[]=[
            'id'    => $aktivitas->id,
            'title' => $aktivitas->title,
            'start' => $aktivitas->start_date,
            'end'   => $aktivitas->end_date,
            'deskripsi'   => $aktivitas->deskripsi,
            'penanganan'   => $aktivitas->penanganan,
            'prioritas'   => $aktivitas->prioritas,
            'color'   => $color,
            ];
        }
        $perencanaan = Perencanaan::find($id);
        $maktivitas = MasterAktivitas::all();
        $auto_delete = Aktivitas::where('start_date', '<', Carbon::now()->subDays(45))->get();
        foreach ($auto_delete as $delete) {
            $delete->delete();
        }
        return view('app.aktivitas.index', ['events' => $events], compact(['perencanaan','maktivitas']) );
    }
    public function destroy($id)
    {
        $perencanaan = Perencanaan::find($id);
        $tahun = $perencanaan->ap_tahun; 
        $bulan = $perencanaan->ap_bulan;
        $start_date = $tahun.$bulan; 
        DB::table("app_perencanaan")->where("id", $id)->delete();
        DB::table("app_aktivitas")->where("start_date", 'LIKE', '%'.$start_date.'%')->delete();

        // $id = Perencanaan::find($id);
        // $id->delete();

        Alert::success('Berhasil', 'Data Berhasil Dihapus');
        return redirect()->route('app_perencanaan.index');
        // return response()->json(['status' => 'Data Berhasil di hapus!']);
    }

   


}
