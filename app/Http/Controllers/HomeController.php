<?php

namespace App\Http\Controllers;

use Notification;
use Carbon\Carbon;
use Illuminate\Http\Request;
use App\Models\MasterKendaraan;
use App\Models\Aktivitas;
use App\Models\AppRequest;
use App\Models\Kendaraan;
use App\Models\Pengajuan;
use Illuminate\Support\Facades\DB;
use App\Notifications\SlackNotification;
use Illuminate\Support\Facades\Auth;


class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        $cekken = Kendaraan::count();
        // $kendaraan = Kendaraan::latest()->first();
        $kendaraan = Kendaraan::all();

          $now = Carbon::now();
          $tgl_sekarang = $now->toDateString();
          $tgl_besok = date('Y-m-d',strtotime("+1 day",strtotime(date("Y-m-d"))));
          $today = date('Y-m-d');
          $cekak = Aktivitas::where('start_date', '=', $today)->count();
          $jumlah = Aktivitas::where('reminder', '=', 'reminder', 'and')->where('start_date', '=', $tgl_besok)->count();
          $reminder = Aktivitas::where('reminder', '=', 'reminder', 'and')->where('start_date', '=', $tgl_besok)->get();

          $aktivitas = Aktivitas::where('start_date', '=', $tgl_sekarang)->get();
          $datakendaraan = MasterKendaraan::paginate(8);

          $pengguna = Auth::user()->name;
          $booking = Kendaraan::with('namaKendaraan','pic')->Where('ak_pengguna',$pengguna)->get();
          $perequest = Auth::user()->name;
          $cek = AppRequest::where('ar_perequest', $perequest)->count();
          $cekrequest = AppRequest::count();
          $listrequest = AppRequest::all();
          $request = AppRequest::where('ar_perequest', $perequest)->get();
          
          $cekpengajuan = pengajuan::count();
          $datapengajuan = Pengajuan::all();
          $ajuan = Pengajuan::where('ap_status', 'Menunggu Persetujuan')->get();
          $setuju = Pengajuan::where('ap_status', 'setujui')->with('vendor')->get();

          return view('home',compact(['datakendaraan','aktivitas','booking','cek','today','cekak','request','cekrequest','listrequest','datapengajuan','cekpengajuan','kendaraan','cekken']));
    }
}
