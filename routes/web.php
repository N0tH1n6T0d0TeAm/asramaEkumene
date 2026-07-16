<?php

/*

                                        ,   ,
                                        $,  $,     ,
                                        "ss.$ss. .s'
                                ,     .ss$$$$$$$$$$s,
                                $. s$$$$$$$$$$$$$$`$$Ss
                                "$$$$$$$$$$$$$$$$$$o$$$       ,
                               s$$$$$$$$$$$$$$$$$$$$$$$$s,  ,s
                              s$$$$$$$$$"$$$$$$""""$$$$$$"$$$$$,
                              s$$$$$$$$$$s""$$$$ssssss"$$$$$$$$"
                             s$$$$$$$$$$'         `"""ss"$"$s""
                             s$$$$$$$$$$,              `"""""$  .s$$s
                             s$$$$$$$$$$$$s,...               `s$$'  `
                         `ssss$$$$$$$$$$$$$$$$$$$$####s.     .$$"$.   , s-
                           `""""$$$$$$$$$$$$$$$$$$$$#####$$$$$$"     $.$'
 Dibuat Oleh:                 ```"$$$$$$$$$$$$$$$$$$$$$####s""     .$$$|
   - Michael Patrick               "$$$$$$$$$$$$$$$$$$$$$$$$##s    .$$" $
                                   $$""$$$$$$$$$$$$$$$$$$$$$$$$$$$$$"   `
                                  $$"  "$"$$$$$$$$$$$$$$$$$$$$S""""'
                             ,   ,"     '  $$$$$$$$$$$$$$$$####s
                             $.          .s$$$$$$$$$$$$$$$$$####"
                 ,           "$s.   ..ssS$$$$$$$$$$$$$$$$$$$####"
                 $           .$$$S$$$$$$$$$$$$$$$$$$$$$$$$#####"
                 Ss     ..sS$$$$$$$$$$$$$$$$$$$$$$$$$$$######""
                  "$$sS$$$$$$$$$$$$$$$$$$$$$$$$$$$########"
           ,      s$$$$$$$$$$$$$$$$$$$$$$$$#########""'
           $    s$$$$$$$$$$$$$$$$$$$$$#######""'      s'         ,
           $$..$$$$$$$$$$$$$$$$$$######"'       ....,$$....    ,$
            "$$$$$$$$$$$$$$$######"' ,     .sS$$$$$$$$$$$$$$$$s$$
              $$$$$$$$$$$$#####"     $, .s$$$$$$$$$$$$$$$$$$$$$$$$s.
   )          $$$$$$$$$$$#####'      `$$$$$$$$$###########$$$$$$$$$$$.
  ((          $$$$$$$$$$$#####       $$$$$$$$###"       "####$$$$$$$$$$
  ) \         $$$$$$$$$$$$####.     $$$$$$###"             "###$$$$$$$$$   s'
 (   )        $$$$$$$$$$$$$####.   $$$$$###"                ####$$$$$$$$s$$'
 )  ( (       $$"$$$$$$$$$$$#####.$$$$$###'                .###$$$$$$$$$$"
 (  )  )   _,$"   $$$$$$$$$$$$######.$$##'                .###$$$$$$$$$$
 ) (  ( \.         "$$$$$$$$$$$$$#######,,,.          ..####$$$$$$$$$$$"
(   )$ )  )        ,$$$$$$$$$$$$$$$$$$####################$$$$$$$$$$$"
(   ($$  ( \     _sS"  `"$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$S$$,
 )  )$$$s ) )  .      .   `$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$"'  `$$
  (   $$$Ss/  .$,    .$,,s$$$$$$##S$$$$$$$$$$$$$$$$$$$$$$$$S""        '
    \)_$$$$$$$$$$$$$$$$$$$$$$$##"  $$        `$$.        `$$.
        `"S$$$$$$$$$$$$$$$$$#"      $          `$          `$
            `"""""""""""""'         '           '           '



*/
use Illuminate\Support\Facades\Route;
use App\Livewire\Visitor;
use App\Livewire\Plumpang;
use App\Livewire\Kirana;
use App\Livewire\EditPolling;
use App\Livewire\TiparCakung as TC;
use App\Livewire\Dorm as D;
use App\Livewire\Login;
use App\Livewire\Register;
use App\Livewire\Polling;
use App\Livewire\DetailPolling;
use App\Livewire\JadwalPiket as P;
use App\Livewire\DaftarPengguna;
use App\Livewire\EditPengguna;
use App\Livewire\Transportasi;
use App\Livewire\Makan;
use App\Livewire\Kesehatan;
use App\Livewire\Keamanan;
use App\Livewire\Escan;
use App\Livewire\PublikasiKegiatan;
use App\Livewire\EditKegiatan;
use App\Livewire\IzinKeluar;
use App\Livewire\CekTransportasi;
use App\Livewire\CekMakan;
use App\Livewire\CekKeamanan;

Route::get('/', function () {
    return view('welcome');
});


Route::get('/phpinfo', function(){
  return phpinfo();
});

Route::get('visitor', Visitor::class);
Route::get('visitor/plumpang', Plumpang::class);
Route::get('visitor/tipar_cakung', TC::class);
Route::get('visitor/kirana', Kirana::class);
Route::get('dorm/register', Register::class);
Route::get('dorm/polling', Polling::class);
Route::post('/dorm/tambah_tipe_polling', [Polling::class, 'tambah_tipe_polling']);
Route::post('/dorm/update_tipe_polling/{id}', [Polling::class, 'update_tipe_polling']);
Route::get('/dorm/hapus_polling_tipe/{id}', [Polling::class, 'hapus_polling']);
Route::post('tambah_polling',[Polling::class, 'tambah_detail_polling']);
Route::post('/dorm/user_polling', [Polling::class, 'user_polling']);
Route::get('/dorm/hapus_user_polling/{id}', [Polling::class, 'hapus_user_polling']);

Route::get('/dorm/detail_polling/{id}', DetailPolling::class);
Route::get('/dorm/hapus_polling/{id}', [Polling::class, 'hapus_polling_semua']);

Route::get('/dorm/edit_polling/{id}', EditPolling::class);
Route::post('/dorm/update_polling/{id}', [EditPolling::class, 'update_pollings']);

Route::get('/dorm/update_status_dibuka_polling/{id}', [EditPolling::class, 'update_status_dibuka_pollings']);
Route::get('/dorm/update_status_ditutup_polling/{id}', [EditPolling::class, 'update_status_ditutup_pollings']);


Route::get('dorm/jadwal_piket', P::class);
Route::post('/tugas-piket/tambah', [P::class, 'tambah']);
Route::post('/tugas-piket/edit/{id}', [P::class, 'edit']);
Route::delete('/tugas-piket/hapus/{id}', [P::class, 'hapus']);
Route::post('/edit-status-pengguna/{id}', [P::class, 'update_status']);

Route::get('dorm/daftar_pengguna', DaftarPengguna::class);
Route::get('dorm/show_gambar/{id}', [DaftarPengguna::class, 'show_gambar']);

Route::get('dorm/edit_pengguna/{id}', EditPengguna::class);
Route::get('dorm/hapus_pengguna/{id}', [DaftarPengguna::class, 'hapus_pengguna']);

Route::get('dorm/publikasi_kegiatan', PublikasiKegiatan::class);
Route::get('dorm/edit_kegiatan/{id}', EditKegiatan::class);
Route::post('/dorm/ubah_foto_kegiatan/{id}', [EditKegiatan::class, 'ubah_foto_k']);
Route::post('dorm/update_publikasi_kegiatan/{id}', [EditKegiatan::class, 'update_publikasi_kegiatan']);
Route::get('/dorm/hapus_kegiatan/{id}', [EditKegiatan::class, 'hapus_kegiatan']);

Route::get('transportasi', Transportasi::class);
Route::get('hapus_data_t/{id}', [Transportasi::class, 'hapus_t']);

Route::post('/check-password-t', [Transportasi::class, 'pass_check']);

Route::get('makan', Makan::class);
Route::get('hapus_data_m/{id}', [Makan::class, 'hapus_m']);

Route::post('/check-password-m', [Makan::class, 'pass_check']);



Route::get('kesehatan', Kesehatan::class);
Route::get('hapus_data_k/{id}', [Kesehatan::class, 'hapus_k']);

Route::post('/check-password-k', [Kesehatan::class, 'pass_check']);


Route::get('keamanan', Keamanan::class);
Route::get('hapus_data_km/{id}', [Keamanan::class, 'hapus_km']);

Route::post('/check-password-km', [Keamanan::class, 'pass_check']);

Route::get('/dorm/e-scan/', EScan::class);

Route::get('/cek-transportasi', CekTransportasi::class);
Route::get('/cek-makan', CekMakan::class);

Route::get('/cek-keamanan', CekKeamanan::class);
Route::post('/katalog-ibadah', [Keamanan::class, 'tambah_data_ibadah']);



Route::middleware('auth')->get('dorm/logout', [D::class, 'logout']);

Route::get('dorm/izin_keluar', IzinKeluar::class);

Route::middleware('guest')->get('dorm/login', Login::class)->name('login');
Route::middleware('auth')->get('dorm/dashboard', D::class);