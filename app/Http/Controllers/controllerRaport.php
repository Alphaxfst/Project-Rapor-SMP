<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class controllerRaport extends Controller
{
    public function tampilData(){
        $tb_raport = DB::table('tb_raport')
        ->select('tb_raport.kode_raport', 'tb_siswa.nama', 'tb_siswa.nis', 'tb_siswa.nama_kelas', 'tb_raport.semester')
        ->where(DB::raw('substr(kode_raport, 1, 1)'), '=', '7')
        ->join('tb_siswa', 'tb_raport.nis', 'tb_siswa.nis')
        ->get();
        return view('tampilRaport7', ['tb_raport'=>$tb_raport]);
    }
    
    public function tampilData8(){
        $tb_raport = DB::table('tb_raport')
        ->select('tb_raport.kode_raport', 'tb_siswa.nama', 'tb_siswa.nis', 'tb_siswa.nama_kelas', 'tb_raport.semester')
        ->where(DB::raw('substr(kode_raport, 1, 1)'), '=', '8')
        ->join('tb_siswa', 'tb_raport.nis', 'tb_siswa.nis')
        ->get();
        return view('tampilRaport8', ['tb_raport'=>$tb_raport]);
    }

    public function tampilData9(){
        $tb_raport = DB::table('tb_raport')
        ->select('tb_raport.kode_raport', 'tb_siswa.nama', 'tb_siswa.nis', 'tb_siswa.nama_kelas', 'tb_raport.semester')
        ->where(DB::raw('substr(kode_raport, 1, 1)'), '=', '9')
        ->join('tb_siswa', 'tb_raport.nis', 'tb_siswa.nis')
        ->get();
        return view('tampilRaport9', ['tb_raport'=>$tb_raport]);
    }

    public function searchRaport(Request $rq){
        $tb_raport = DB::table('tb_raport')
        ->select('tb_raport.kode_raport', 'tb_siswa.nama', 'tb_siswa.nis', 'tb_siswa.nama_kelas', 'tb_raport.semester')
        ->where('tb_siswa.nis', $rq->key)
        ->orWhere('tb_siswa.nama', $rq->key)
        ->join('tb_siswa', 'tb_raport.nis', 'tb_siswa.nis')
        ->get();
        return view('tampilSearchRaport', ['tb_raport'=>$tb_raport]);
    }

    public function tampilDetail($kode_raport){
        $tb_raport = DB::table('tb_raport')
        ->select('tb_raport.kode_raport',
                 'tb_siswa.nama',
                 'tb_siswa.nis', 
                 'tb_siswa.nama_kelas',
                 'tb_raport.semester',
                 'tb_raport.agama',
                 'tb_raport.pkn',
                 'tb_raport.indonesia',
                 'tb_raport.inggris',
                 'tb_raport.matematika',
                 'tb_raport.ipa',
                 'tb_raport.ips')
        ->join('tb_siswa', 'tb_raport.nis', 'tb_siswa.nis')
        ->where('tb_raport.kode_raport', $kode_raport)
        ->get();

        return view('tampilDetail', ['tb_raport'=>$tb_raport]);
    }

    public function tampilCetak($kode_raport){
        $tb_raport = DB::table('tb_raport')
        ->select('tb_raport.kode_raport',
                 'tb_siswa.nama',
                 'tb_siswa.nis', 
                 'tb_siswa.nama_kelas',
                 'tb_raport.semester',
                 'tb_raport.agama',
                 'tb_raport.pkn',
                 'tb_raport.indonesia',
                 'tb_raport.inggris',
                 'tb_raport.matematika',
                 'tb_raport.ipa',
                 'tb_raport.ips')
        ->join('tb_siswa', 'tb_raport.nis', 'tb_siswa.nis')
        ->where('tb_raport.kode_raport', $kode_raport)
        ->get();

        return view('tampilCetak', ['tb_raport'=>$tb_raport]);
    }

    public function tambahRaport(Request $rq) {
        DB::table('tb_raport')
        ->insert(
            [
                'tb_raport.nis'=>$rq->nis,
                'tb_raport.kode_raport'=>$rq->kode_raport, 
                'tb_raport.semester'=>$rq->semester,
                'tb_raport.agama'=>$rq->agama,
                'tb_raport.pkn'=>$rq->pkn,
                'tb_raport.indonesia'=>$rq->indonesia,
                'tb_raport.inggris'=>$rq->inggris,
                'tb_raport.matematika'=>$rq->matematika,
                'tb_raport.ipa'=>$rq->ipa,
                'tb_raport.ips'=>$rq->ips
            ]
        );     
        $kr = substr($rq->kode_raport, 0, 1);
        if($kr == '7'){
            return redirect('/raport-kelas-7')->withSuccess('Data berhasil ditambahkan!');
        } else if($kr == '8'){
            return redirect('/raport-kelas-8')->withSuccess('Data berhasil ditambahkan!');
        } else {
            return redirect('/raport-kelas-9')->withSuccess('Data berhasil ditambahkan!');
        }
    }

    public function deleteRaport($kode_raport){
        DB::table('tb_raport')->where('kode_raport', $kode_raport)->delete();
        $kr = substr($kode_raport, 0, 1);
        if($kr == '7'){
            return redirect('/raport-kelas-7')->withSuccess('Data berhasil dihapus!');
        } else if($kr == '8'){
            return redirect('/raport-kelas-8')->withSuccess('Data berhasil dihapus!');
        } else {
            return redirect('/raport-kelas-9')->withSuccess('Data berhasil dihapus!');
        }
    }

    public function tampilEdit($kode_raport){
        $tb_raport = DB::table('tb_raport')
        ->where('tb_raport.kode_raport', $kode_raport)
        ->select('tb_raport.nis',
                 'tb_raport.kode_raport', 
                 'tb_raport.semester',
                 'tb_raport.agama',
                 'tb_raport.pkn',
                 'tb_raport.indonesia',
                 'tb_raport.inggris',
                 'tb_raport.matematika',
                 'tb_raport.ipa',
                 'tb_raport.ips')
        ->get();  
        return view('tampilEditRaport', ['hasil'=>$tb_raport]);
    }

    public function editRaport(Request $rq) {
        DB::table('tb_raport')
        ->where('tb_raport.kode_raport', $rq->kode_raport)
        ->update(
            [
                'tb_raport.nis'=>$rq->nis,
                'tb_raport.kode_raport'=>$rq->kode_raport, 
                'tb_raport.semester'=>$rq->semester,
                'tb_raport.agama'=>$rq->agama,
                'tb_raport.pkn'=>$rq->pkn,
                'tb_raport.indonesia'=>$rq->indonesia,
                'tb_raport.inggris'=>$rq->inggris,
                'tb_raport.matematika'=>$rq->matematika,
                'tb_raport.ipa'=>$rq->ipa,
                'tb_raport.ips'=>$rq->ips
            ]
        );        
        $kr = substr($rq->kode_raport, 0, 1);
        if($kr == '7'){
            return redirect('/raport-kelas-7')->withSuccess('Data berhasil diubah!');
        } else if($kr == '8'){
            return redirect('/raport-kelas-8')->withSuccess('Data berhasil diubah!');
        } else {
            return redirect('/raport-kelas-9')->withSuccess('Data berhasil diubah!');
        }
    }
}
