<?php
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\AssetController;
use App\Http\Controllers\RequestController;
use App\Http\Controllers\KendaraanController;
use App\Http\Controllers\AktivitasController;
use App\Http\Controllers\PerencanaanController;
use App\Http\Controllers\PengajuanController;
use App\Http\Controllers\LokasiAssetContoller;
use App\Http\Controllers\MasterKendaraanController;
use App\Http\Controllers\MasterPicController;
use App\Http\Controllers\MasterAktivitasController;
use App\Http\Controllers\MasterVendorController;
use App\Http\Controllers\MasterBarangController;
use App\Http\Controllers\MasterJenisBarangController;
use App\Http\Controllers\MasterStatusFollowupController;
use App\Http\Controllers\MasterLokasiAssetController;
use App\Http\Controllers\MasterCategoryBarangController;


/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/
Route::middleware(['guest'])->group(function(){
    Route::get('/', function () {
        // return view('/auth/login');
        return view('public/index');
    });
});

Auth::routes();

Route::group(['middleware' => ['auth', 'level:general-affair']], function(){
    Route::resource('master_pic', MasterPicController::class);
    Route::resource('master_kendaraan', MasterKendaraanController::class);
    Route::resource('master_aktivitas', MasterAktivitasController::class);
    Route::resource('master_vendor', MasterVendorController::class);
    Route::resource('master_barang', MasterBarangController::class);
    Route::resource('master_jenisbarang', MasterJenisBarangController::class);
    Route::resource('master_categorybarang', MasterCategoryBarangController::class);
    Route::resource('master_statusfollowup', MasterStatusFollowupController::class);
    Route::resource('master_lokasiasset', MasterLokasiAssetController::class);
});

    // ga
Route::group(['middleware' => ['auth', 'level:management']], function(){
    Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
    // app routes
    Route::resource('app_asset', AssetController::class);
    Route::resource('app_pengajuan', PengajuanController::class);
    Route::resource('app_kendaraan', KendaraanController::class);
    Route::resource('app_aktivitas', AktivitasController::class);
    Route::resource('app_aktivitas/index/{}', AktivitasController::class);
    Route::resource('app_perencanaan', PerencanaanController::class);

    
});

    Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
    Route::resource('app_asset', AssetController::class);
    Route::resource('app_pengajuan', PengajuanController::class);
    Route::resource('app_kendaraan', KendaraanController::class);
    Route::resource('app_aktivitas', AktivitasController::class);
    Route::resource('app_aktivitas/index/{}', AktivitasController::class);
    Route::post('app_aktivitas/store',[AktivitasController::class,'store']);
    Route::patch('app_aktivitas/update/{id}',[AktivitasController::class,'update']);
    Route::delete('app_aktivitas/destroy/{id}',[AktivitasController::class,'destroy']);
    Route::delete('app_perencanaan/destroy/{id}',[AktivitasController::class,'destroy']);
    Route::resource('app_perencanaan', PerencanaanController::class);
    Route::resource('app_request', RequestController::class);
    Route::get('/perencanaan/list', function () {
        return view('/app/perencanaan/list');
    });
    Route::get('downloadlist', [AktivitasController::class,'download']);


