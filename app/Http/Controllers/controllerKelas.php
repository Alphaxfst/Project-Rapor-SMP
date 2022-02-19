<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class controllerKelas extends Controller
{
    public function tampilKelas(){
        $tb_kelas = DB::table('tb_kelas')
        ->select('id_kelas', 'nama_kelas', 'wali_kelas')
        ->orderBy('nama_kelas')
        ->get();

        return view('tampilKelas', ['tb_kelas'=>$tb_kelas]);
    }

    public function prosesSearch(Request $rq){
        $tb_kelas = DB::table('tb_kelas')
        ->select('nama_kelas', 'wali_kelas')
        ->where('nama_kelas', $rq->key)
        ->orWhere('wali_kelas', $rq->key)
        ->get();
        return view('tampilKelas', ['tb_kelas'=>$tb_kelas]);
    }

    public function tambahKelas(Request $rq) {
        DB::table('tb_kelas')
        ->insert(
            [
                'nama_kelas'=>$rq->nama_kelas,
                'wali_kelas'=>$rq->wali_kelas,
            ]
        );        
        return redirect('/kelas')->withSuccess('Data berhasil ditambahkan!');
    }

    public function deleteKelas($nama_kelas){
        DB::table('tb_kelas')
        ->where('nama_kelas', $nama_kelas)
        ->delete();
        return redirect('/kelas')->withSuccess('Data berhasil dihapus!');
    }
    
    public function tampilEdit($nama_kelas){
        $tb_kelas = DB::table('tb_kelas')
        ->select('id_kelas','nama_kelas', 'wali_kelas')
        ->where('nama_kelas', $nama_kelas)
        ->get();

        return view('tampilEditKelas', ['hasil'=>$tb_kelas]);
    }
    
    public function editKelas(Request $rq){
        DB::table('tb_kelas')
        ->where('id_kelas', $rq->id_kelas) 
        ->update(
            [
                'nama_kelas'=> $rq->nama_kelas,
                'wali_kelas'=> $rq->wali_kelas,
            ]
        );  
        return redirect('/kelas')->withSuccess('Data berhasil diubah!');
    }


}
