<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;

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

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');

//Regsiter ===============================================
Route::get('/newRegister', function () {
    return view('newRegister');
});

//Login ===============================================
Route::get('/', function(){
    return view('newLogin');
})->name('login');

Route::post('/postLogin', 'Auth\loginController@postLogin')->name('postLogin');

Route::get('/logout', 'Auth\loginController@logout')->name('logout');

// ====================================================MIDDLEWARE=====================================

Route::group(['middleware' => ['auth']], function () {  
    // ==================================================== SISWA ===========================================
    // View ==============================================
    Route::get('/tambahsiswa', function () {
        return view('tambahSiswa');
    });

    // Controller get ====================================
    // Tampil Data Siswa
    Route::get('/siswa', 'controllerSiswa@tampilSemua');
    // Delete
    Route::get('/deletesiswa/{nis}', 'controllerSiswa@deleteSiswa');
    // Update
    Route::get('/editsiswa/{nis}', 'controllerSiswa@tampilEdit');

    // Controller post ===================================
    // Insert
    Route::post('/proses_tambah', 'controllerSiswa@tambahSiswa');
    // Update
    Route::post('/proses_edit', 'controllerSiswa@editSiswa');
    // Search
    Route::post('/proses_search', 'controllerSiswa@prosesSearch');

    // ===================================================== RAPOR ==========================================
    // View =================================================
    Route::get('/tambahraport', function () {
        return view('tambahRaport');
    });

    // Controller get =====================================
    // Tampil Data Rapor
    Route::get('/raport-kelas-7', 'controllerRaport@tampilData');
    Route::get('/raport-kelas-8', 'controllerRaport@tampilData8');
    Route::get('/raport-kelas-9', 'controllerRaport@tampilData9');
    // Tampil Detail
    Route::get('/detailraport/{kode_raport}', 'controllerRaport@tampilDetail');
    // Delete
    Route::get('/deleteraport/{kode_raport}', 'controllerRaport@deleteRaport');
    // Update
    Route::get('/editraport/{kode_raport}', 'controllerRaport@tampilEdit');
    // Print preview
    Route::get('/cetakraport/{kode_raport}', 'controllerRaport@tampilCetak');

    // Controller post ===================================
    // Insert
    Route::post('/proses_tambah_raport', 'controllerRaport@tambahRaport');
    // Update
    Route::post('/proses_edit_raport', 'controllerRaport@editRaport');
    // Tampil Search Rapor
    Route::post('/proses_search_raport', 'controllerRaport@searchRaport');


    // ==================================================== KELAS =========================================
    // View ===================================
    Route::get('/tambahkelas', function () {
        return view('tambahKelas');
    });
    // Controller get ===================================
    // Tampil Data Siswa
    Route::get('/kelas', 'controllerKelas@tampilKelas');
    // Delete
    Route::get('/deletekelas/{nama_kelas}', 'controllerKelas@deleteKelas');
    // Update
    Route::get('/editkelas/{id_kelas}', 'controllerKelas@tampilEdit');

    // Controller post ===================================
    // Insert
    Route::post('/proses_tambah_kelas', 'controllerKelas@tambahKelas');
    // Update
    Route::post('/proses_edit_kelas', 'controllerKelas@editKelas');
    // Search
    Route::post('/proses_search_kelas', 'controllerKelas@prosesSearch');

    
    //Controller GET identitas sekolah========================
    //Tampil Data Identitas Sekolah
    Route::get('/id', 'controllerid@tampilId');
    //Update Data Identitas Sekolah
    Route::get('/editid/{id_sklh}', 'controllerid@tampilEditid');
    // Controller post ===================================
    // Update Data Identitas Sekolah
    Route::post('/proses_edit_id', 'controllerid@editid');

});


