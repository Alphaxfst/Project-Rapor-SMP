<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class controllerid extends Controller
{
    public function tampilId(){
        $tb_identitas = DB::table('tb_identitas')
        ->select('id_sklh','nama_sklh', 'alamat_sklh', 'kota_sklh', 'email_sklh', 'kontak_sklh')
        ->get();

        return view('tampilIdentitas', ['tb_identitas'=>$tb_identitas]);
    }

    public function tampilEditid($id_sklh){
        $tb_identitas = DB::table('tb_identitas')
        ->select('id_sklh','nama_sklh', 'alamat_sklh', 'kota_sklh', 'email_sklh', 'kontak_sklh')
        ->where('id_sklh', $id_sklh)
        ->get();

        return view('tampilEditid', ['hasil'=>$tb_identitas]);
    }

    public function editid(Request $rq){
        DB::table('tb_identitas')
        ->where('id_sklh', $rq->id_sklh)
        ->update(
            [
                'id_sklh'=> $rq->id_sklh,
                'nama_sklh'=> $rq->nama_sklh,
                'alamat_sklh'=> $rq->alamat_sklh,
                'kota_sklh'=> $rq->kota_sklh,
                'email_sklh'=> $rq->email_sklh,
                'kontak_sklh'=> $rq->kontak_sklh
            ]
        );        
        return redirect('/id')->withSuccess('Data berhasil diubah!');
    }
}
