<?php

namespace App\Http\Controllers;

use Excel;
use App\Models\Aktivitas;
use App\Exports\AktivitasExport;
use Illuminate\Http\Request;
use RealRashid\SweetAlert\Facades\Alert;

class AktivitasController extends Controller
{
    public function index()
    {
        // $events = array();
        $dataAktivitas = Aktivitas::paginate(8);
        foreach ($dataAktivitas as $aktivitas){
            $events[]=[
            'id'    => $aktivitas->id,
            'title' => $aktivitas->title,
            'reminder' => $aktivitas->reminder,
            'todate' => $aktivitas->todate,
            'ulangi' => $aktivitas->ulangi,
            'start' => $aktivitas->start_date,
            'end'   => $aktivitas->end_date,
            'deskripsi'   => $aktivitas->deskripsi,
            'prioritas'   => $aktivitas->prioritas,
            'color'   => $aktivitas->color,
            ];
        }
        
        return view('app.aktivitas.index', ['events' => $events]);
    }
    
    public function store(Request $request)
    {
        $request->validate([
            'title' => 'required|string|max:100|min:3',
            'reminder' => 'nullable',
            'reminder' => 'nullable',
            'ulangi' => 'required',
            'todate' => 'nullable|after:today',
            'deskripsi' => 'nullable',
        ]);

        $datetime1 = new \DateTime($request->start_date);
        $datetime2 = new \DateTime($request->todate);
        $interval = $datetime1->diff($datetime2);
        $jumlahhari = $interval->days;

        if($request->ulangi == "allday"){
            for($i=0; $i<=$jumlahhari; $i++){
                $aktivitas = Aktivitas::create([
                'title' => $request->title,
                'reminder' => $request->reminder,
                'ulangi' => $request->ulangi,
                'todate' => $request->todate,
                'start_date' => date('Y-m-d', strtotime($request->start_date. ' + '.$i.' days')),
                'end_date' => $request->end_date++,
                'deskripsi' => $request->deskripsi,
                'prioritas' => $request->prioritas,
                    ]);
            }
        }elseif($request->ulangi == "twodays") {
            
            for($i=0; $i<=$jumlahhari; $i+=2){
                $aktivitas = Aktivitas::create([
                'title' => $request->title,
                'reminder' => $request->reminder,
                'ulangi' => $request->ulangi,
                'todate' => $request->todate,
                'start_date' => date('Y-m-d', strtotime($request->start_date. ' + '.$i.' days')),
                'end_date' => date('Y-m-d', strtotime($request->end_date. ' + '.$i.' days')),
                // 'end_date' => $request->end_date+=2,
                'deskripsi' => $request->deskripsi,
                'prioritas' => $request->prioritas,
                    ]);
            }
        }elseif($request->ulangi == "threedays") {
            
            for($i=0; $i<=$jumlahhari; $i+=3){
                $aktivitas = Aktivitas::create([
                'title' => $request->title,
                'reminder' => $request->reminder,
                'ulangi' => $request->ulangi,
                'todate' => $request->todate,
                'start_date' => date('Y-m-d', strtotime($request->start_date. ' + '.$i.' days')),
                'end_date' => date('Y-m-d', strtotime($request->end_date. ' + '.$i.' days')),
                // 'end_date' => $request->end_date,
                'deskripsi' => $request->deskripsi,
                'prioritas' => $request->prioritas,
                    ]);
            }
        }elseif($request->ulangi == "fourdays") {
            
            for($i=0; $i<=$jumlahhari; $i+=4){
                $aktivitas = Aktivitas::create([
                'title' => $request->title,
                'reminder' => $request->reminder,
                'ulangi' => $request->ulangi,
                'todate' => $request->todate,
                'start_date' => date('Y-m-d', strtotime($request->start_date. ' + '.$i.' days')),
                'end_date' => date('Y-m-d', strtotime($request->end_date. ' + '.$i.' days')),
                // 'end_date' => $request->end_date,
                'deskripsi' => $request->deskripsi,
                'prioritas' => $request->prioritas,
                    ]);
            }
        }elseif($request->ulangi == "fivedays") {
            
            for($i=0; $i<=$jumlahhari; $i+=5){
                $aktivitas = Aktivitas::create([
                'title' => $request->title,
                'reminder' => $request->reminder,
                'ulangi' => $request->ulangi,
                'todate' => $request->todate,
                'start_date' => date('Y-m-d', strtotime($request->start_date. ' + '.$i.' days')),
                'end_date' => date('Y-m-d', strtotime($request->end_date. ' + '.$i.' days')),
                // 'end_date' => $request->end_date,
                'deskripsi' => $request->deskripsi,
                'prioritas' => $request->prioritas,
                    ]);
            }
        }elseif($request->ulangi == "sixdays") {
            
            for($i=0; $i<=$jumlahhari; $i+=6){
                $aktivitas = Aktivitas::create([
                'title' => $request->title,
                'reminder' => $request->reminder,
                'ulangi' => $request->ulangi,
                'todate' => $request->todate,
                'start_date' => date('Y-m-d', strtotime($request->start_date. ' + '.$i.' days')),
                'end_date' => date('Y-m-d', strtotime($request->end_date. ' + '.$i.' days')),
                // 'end_date' => $request->end_date,
                'deskripsi' => $request->deskripsi,
                'prioritas' => $request->prioritas,
                    ]);
            }
        }elseif($request->ulangi == "weekly") {
            
            for($i=0; $i<=$jumlahhari; $i+=7){
                $aktivitas = Aktivitas::create([
                'title' => $request->title,
                'reminder' => $request->reminder,
                'ulangi' => $request->ulangi,
                'todate' => $request->todate,
                'start_date' => date('Y-m-d', strtotime($request->start_date. ' + '.$i.' days')),
                'end_date' => date('Y-m-d', strtotime($request->end_date. ' + '.$i.' days')),
                // 'end_date' => $request->end_date,
                'deskripsi' => $request->deskripsi,
                'prioritas' => $request->prioritas,
                    ]);
            }
        }else{
                $aktivitas = Aktivitas::create([
                'title' => $request->title,
                'reminder' => $request->reminder,
                'ulangi' => $request->ulangi,
                'todate' => $request->todate,
                'start_date' => $request->start_date,
                'end_date' => $request->end_date,
                'deskripsi' => $request->deskripsi,
                'prioritas' => $request->prioritas,
                    ]);
        }
        return response()->json([
            'id'    => $aktivitas->id,
            'start' => $aktivitas->start_date,
            'end'   => $aktivitas->end_date,
            'title' => $aktivitas->title,
            'reminder'  => $aktivitas->reminder,
            'ulangi'    => $aktivitas->ulangi,
            'todate'    => $aktivitas->todate,
            'deskripsi' => $aktivitas->deskripsi,
            'prioritas'  => $aktivitas->prioritas,
            'color'  => $aktivitas->color,
        ]); 
    }
    public function update(Request $request,$id)
    {
        $aktivitas = Aktivitas::find($id);
        if (! $aktivitas) {
            return response()->json([
                'error' => 'enable to locate the event'
            ], 404);
        }
        $aktivitas->update([
            'start_date' => $request->start_date,
            'end_date' => $request->end_date,
        ]);
        return response()->json('Event updated');
    }
    public function updatestatus(Request $request,$id){
        
    }
    public function destroy($id)
    {
        $aktivitas = Aktivitas::find($id);
        if (! $aktivitas) {
            return response()->json([
                'error' => 'enable to locate the event'
            ], 404);
        }
        $aktivitas->delete();
        return $id;

    }
    public function download()
    {
        return Excel::download(new AktivitasExport, 'ListAktivitas.xlsx');
    }
    // public function destroym($id)
    // {
    //     $aktivitas = Aktivitas::where('start');
    //     $aktivitas = Aktivitas::find($id);
    //     $aktivitas->delete();

    // }
    


}
