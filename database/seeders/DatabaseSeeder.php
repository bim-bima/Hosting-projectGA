<?php

namespace Database\Seeders;
use App\Models\MasterPic;
use App\Models\MasterVendor;
use App\Models\User;
use App\Models\Asset;
use App\Models\Aktivitas;
use App\Models\MasterKendaraan;
use App\Models\MasterLokasiAsset;
use App\Models\MasterAktivitas;
use App\Models\Perencanaan;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        // \App\Models\User::factory(10)->create();
        // Asset::factory(10)->create();
        User::factory()->create([
            'name' => 'general-affair',
            'email' => 'ga@gmail.com',
            'level' => 'general-affair',
            'password' => bcrypt('password')
        ]);
        User::factory()->create([
            'name' => 'management',
            'email' => 'management@gmail.com',
            'level' => 'management',
            'password' => bcrypt('password')
        ]);
        User::factory()->create([
            'name' => 'pegawai',
            'email' => 'pegawai@gmail.com',
            'level' => 'pegawai',
            'password' => bcrypt('password')
        ]);

        Aktivitas::factory()->create([
            'title' => 'tes',
            'ulangi' => 'oneday',
            'start_date' => '2050-11-11',
            'end_date' =>  '2050-11-11',
            'prioritas' => 'rendah'
        ]);
        MasterKendaraan::factory()->create([
            'mk_nama_kendaraan' => 'toyota avanza',
            'mk_no_polisi' => 'AK 9811 OK',
            'mk_jenis' => 'Roda 4',
            'mk_merk' => 'toyota',
            'mk_warna' => 'Merah maroon',
            'mk_perlengkapan' => 'STNK-BPKB',
            'mk_status' => 'tersedia',
            'mk_bahan_bakar' => '10 liter',
            'mk_kilometer' => '277',
            'mk_kondisi_lain' => 'tidak ada'
        ]);
        MasterKendaraan::factory()->create([
            'mk_nama_kendaraan' => 'Honda Vario Old',
            'mk_no_polisi' => 'EJ 7663 OK',
            'mk_jenis' => 'Roda 2',
            'mk_merk' => 'honda',
            'mk_warna' => 'putih',
            'mk_perlengkapan' => 'STNK-BPKB',
            'mk_status' => 'tersedia',
            'mk_bahan_bakar' => '2 liter',
            'mk_kilometer' => '397',
            'mk_kondisi_lain' => 'tidak ada'
        ]);
        // Perencanaan::factory()->create([
        //     'ap_bulan' => '-11',
        //     'ap_tahun' => '2022'
        // ]);
        MasterPic::factory()->create([
            'mp_nama' => 'PIC 1'
        ]);
        MasterPic::factory()->create([
            'mp_nama' => 'PIC 2'
        ]);
        MasterPic::factory()->create([
            'mp_nama' => 'PIC 3'
        ]);

        MasterLokasiAsset::factory()->create([
            'mla_lokasi_asset' => 'lantai bawah'
        ]);

        MasterLokasiAsset::factory()->create([
            'mla_lokasi_asset' => 'lantai atas'
        ]);

        MasterAktivitas::factory()->create([
            'ma_nama_aktivitas' => 'memanaskan mobil'
        ]);
        MasterAktivitas::factory()->create([
            'ma_nama_aktivitas' => 'membershkan area depan'
        ]);
        MasterAktivitas::factory()->create([
            'ma_nama_aktivitas' => 'membersihkan area kolam'
        ]);
        MasterAktivitas::factory()->create([
            'ma_nama_aktivitas' => 'membersihkan toilet'
        ]);
        MasterAktivitas::factory()->create([
            'ma_nama_aktivitas' => 'membersihkan lantai atas'
        ]);
        MasterAktivitas::factory()->create([
            'ma_nama_aktivitas' => 'perpanjang surat mobil'
        ]);
        MasterAktivitas::factory()->create([
            'ma_nama_aktivitas' => 'perpanjang surat motor'
        ]);
        MasterAktivitas::factory()->create([
            'ma_nama_aktivitas' => 'menghidupkan hidropnik'
        ]);

        MasterVendor::factory()->create([
            'mv_nama_vendor' => 'Toko komputer',
            'mv_lokasi' => 'tangsel'
        ]);
        MasterVendor::factory()->create([
            'mv_nama_vendor' => 'Toko Matrial',
            'mv_lokasi' => 'tangsel'
        ]);
        MasterVendor::factory()->create([
            'mv_nama_vendor' => 'Toko Mable',
            'mv_lokasi' => 'tangsel'
        ]);

    }
}
