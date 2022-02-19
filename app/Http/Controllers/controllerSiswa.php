<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class controllerSiswa extends Controller
{
    public function tampilSemua(){
        $tb_siswa = DB::table('tb_siswa')
        ->select('nis', 'nama', 'nama_kelas', 'no_telp', 'alamat', 'wali_siswa')
        ->orderBy('nis')
        ->get();

        return view('tampilSiswa', ['tb_siswa'=>$tb_siswa]);
    }
    
    public function prosesSearch(Request $rq){
        $tb_siswa = DB::table('tb_siswa')
        ->select('nis', 'nama', 'nama_kelas', 'no_telp', 'alamat', 'wali_siswa')
        ->where('nis', $rq->key)
        ->orWhere('nama', $rq->key)
        ->orWhere('alamat', $rq->key)
        ->orWhere('wali_siswa', $rq->key)
        ->get();
        return view('tampilSiswa', ['tb_siswa'=>$tb_siswa]);
    }

    public function tambahSiswa(Request $rq) {
        DB::table('tb_siswa')
        ->insert(
            [
                'nis'=>$rq->nis,
                'nama'=>$rq->nama,
                'nama_kelas'=>$rq->nama_kelas,
                'no_telp'=>$rq->no_telp,
                'alamat'=>$rq->alamat,
                'wali_siswa'=>$rq->wali_siswa
            ]
        );        
        return redirect('/siswa')->withSuccess('Data berhasil ditambahkan!');
    }

    public function deleteSiswa($nis){
        DB::table('tb_siswa')->where('nis', $nis)->delete();
        return redirect('/siswa')->withSuccess('Data berhasil dihapus!');
    }

    public function tampilEdit($nis){
        $tb_siswa = DB::table('tb_siswa')
        ->select('nis', 'nama', 'nama_kelas', 'no_telp', 'alamat', 'wali_siswa')
        ->where('nis', $nis)
        ->get();

        return view('tampiledit', ['hasil'=>$tb_siswa]);
    }

    public function editSiswa(Request $rq){
        DB::table('tb_siswa')
        ->where('nis', $rq->nis)
        ->update(
            [
                'nis'=> $rq->nis,
                'nama'=> $rq->nama,
                'nama_kelas'=> $rq->nama_kelas,
                'no_telp'=> $rq->no_telp,
                'alamat'=> $rq->alamat,
                'wali_siswa'=> $rq->wali_siswa
            ]
        );        
        return redirect('/siswa')->withSuccess('Data berhasil diubah!');
    }


}
