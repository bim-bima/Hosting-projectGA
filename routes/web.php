<?php

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\SlackController;
use App\Http\Controllers\PasswordController;
use App\Http\Controllers\AdduserController;
use App\Http\Controllers\ProfileController;
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
use App\Http\Controllers\UpdatePasswordController;
use App\Http\Controllers\MasterJenisBarangController;
use App\Http\Controllers\MasterStatusFollowupController;
use App\Http\Controllers\MasterLokasiAssetController;
use App\Http\Controllers\MasterCategoryBarangController;
use App\Http\Controllers\MasterJenisPengajuanController;
use App\Http\Controllers\MAsterCategoryAssetController;


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
        return view('/auth/login');
        // return view('public/index');
    });
});

Auth::routes();

Route::group(['middleware' => ['auth', 'level:pegawai']], function(){
Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
    // app routes
    Route::resource('/app_asset', AssetController::class);
    Route::resource('/app_pengajuan', PengajuanController::class);
    Route::resource('/app_kendaraan', KendaraanController::class);
    Route::resource('/app_aktivitas', AktivitasController::class);
    Route::resource('/app_aktivitas/index/{}', AktivitasController::class);
    Route::resource('/app_perencanaan', PerencanaanController::class);
    Route::resource('/app_request', RequestController::class);

});

Route::group(['middleware' => ['auth', 'level:general-affair']], function(){
    Route::resource('/master_pic', MasterPicController::class);
    Route::resource('/master_kendaraan', MasterKendaraanController::class);
    Route::resource('/master_aktivitas', MasterAktivitasController::class);
    Route::resource('/master_vendor', MasterVendorController::class);
    Route::resource('/master_barang', MasterBarangController::class);
    Route::resource('/master_jenisbarang', MasterJenisBarangController::class);
    Route::resource('/master_categorybarang', MasterCategoryBarangController::class);
    Route::resource('/master_statusfollowup', MasterStatusFollowupController::class);
    Route::resource('/master_lokasiasset', MasterLokasiAssetController::class);
    Route::resource('/master_jenispengajuan', MasterJenisPengajuanController::class);
    Route::resource('/master_categoryasset', MAsterCategoryAssetController::class);
    Route::patch('app_aktivitas/update/{id}',[AktivitasController::class,'update']);
    //   Route::get('web', function () {
    //     Notification::route('slack',env('SLACK_URL'))
    //     ->notify(new AppNotificationsErrorNotification());
    // });

});

    // ga
Route::group(['middleware' => ['auth', 'level:management']], function(){
    Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
    // app routes
    Route::resource('/app_asset', AssetController::class);
    Route::resource('/app_pengajuan', PengajuanController::class);
    Route::resource('/app_kendaraan', KendaraanController::class);
    Route::resource('/app_aktivitas', AktivitasController::class);
    Route::resource('/app_aktivitas/index/{}', AktivitasController::class);
    Route::resource('/app_perencanaan', PerencanaanController::class);
    Route::resource('add_user', AdduserController::class);
    
});


    Route::get('edit_profile', [ProfileController::class, 'edit'])->name('edit_profile');
    Route::put('update_profile', [ProfileController::class, 'update'])->name('update_profile');
    Route::get('edit', [UpdatePasswordController::class, 'edit'])->name('edit_password');
    Route::put('update', [UpdatePasswordController::class, 'update'])->name('update_password');
    Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
    Route::resource('master_kendaraan', MasterKendaraanController::class);

    Route::resource('/app_asset', AssetController::class);
    Route::resource('/app_request', RequestController::class);
    Route::resource('/app_pengajuan', PengajuanController::class);
    Route::resource('/app_kendaraan', KendaraanController::class);
    Route::resource('/app_aktivitas', AktivitasController::class);
    Route::resource('app_aktivitas/index/{}', AktivitasController::class);
    Route::post('app_aktivitas/store',[AktivitasController::class,'store']);
    Route::patch('app_aktivitas/update/{id}',[AktivitasController::class,'update']);
    Route::delete('app_aktivitas/destroy/{id}',[AktivitasController::class,'destroy']);
    Route::delete('app_perencanaan/destroy/{id}',[AktivitasController::class,'destroy']);
    Route::resource('/app_perencanaan', PerencanaanController::class);
    Route::resource('/app_request', RequestController::class);
    Route::get('/perencanaan/list', function () {
        return view('/app/perencanaan/list');
    });
    Route::resource('slack', SlackController::class)->only('index');
    Route::get('downloadlist', [AktivitasController::class,'download']);


