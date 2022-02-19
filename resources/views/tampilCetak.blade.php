<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="{{asset('plugins/overlayScrollbars/css/OverlayScrollbars.min.css')}}">
  <style type="text/css">body {width: 100%;} </style>
  <style>
      .identitas{
          display: inline-flex;
          margin-top:  20px;
      }

      .ttd{
        display: inline-flex;   
      }

      .ortu{
          margin-left: 750px;
      }

      .i2 {
        margin-left: 250px;
      }
      .tabel {
        width: 1000px;
        margin-top: 50px;
        align-items: left;
        }

        .tabel .td {
            padding: 5px;
        }
  </style>
  <body OnLoad="window.print()" OnFocus="window.close()">
</head>
<body class="hold-transition sidebar-mini layout-fixed">
  <?php
  function cetakNilai($nilai){
    if($nilai >= 80){
      $huruf = 'A';
    }
    else if($nilai >= 70){
      $huruf = 'B';
    }
    else if($nilai >= 60){
      $huruf = 'C';
    }
    else if($nilai >= 50){
      $huruf = 'D';
    } else {
      $huruf = 'E';
    }
    return $huruf;
    }
    ?>
    @foreach($tb_raport as $r)
    <center>
        <h1>Laporan Hasil Belajar</h1>
    </center>
    <table class="identitas">
        <tr>
            <td>Nama Sekolah</td>
            <td> : SMPN ABCD Salatiga</td>
        </tr>
        <tr>
            <td>Alamat</td>
            <td> : Jalan Diponegoro No. 46</td>
        </tr> 
        <tr>
            <td>Nama Siswa</td>
            <td> : {{$r->nama}}</td>
        </tr> 
    </table>
    <table class="identitas i2">
        <tr>
            <td>Kelas</td>
            <td> : {{$r->nama_kelas}}</td>
        </tr>
        <tr>
            <td>Semester</td>
            <td> : {{$r->semester}}</td>
        </tr> 
        <tr>
            <td>Tahun Ajaran</td>
            <td> : 2021/2022</td>
        </tr> 
    </table>
    <hr><hr>
    <table border="1px" class="tabel">
        <thead>
        <tr>
            <th rowspan=2>Mata Pelajaran</th>
            <th colspan="2">Nilai</th>
        </tr>
        <tr>
            <th>Angka</th>
            <th>Huruf</th>
        </tr>
        </thead>
        <tbody>
        <tr>
        <td>Pendidikan Agama</td>
        <td>{{$r->agama}}</td>
        <td>{{cetakNilai($r->agama)}}</td>
        </tr>
        <tr>
        <td>Pendidikan Kewarganegaraan</td>
        <td>{{$r->pkn}}</td>
        <td>{{cetakNilai($r->pkn)}}</td>
        </tr>
        <tr>
        <td>Bahasa Indonesia</td>
        <td>{{$r->indonesia}}</td>
        <td>{{cetakNilai($r->indonesia)}}</td>
        </tr>
        <tr>
        <td>Bahasa Inggris</td>
        <td>{{$r->inggris}}</td>
        <td>{{cetakNilai($r->inggris)}}</td>
        </tr>
        <tr>
        <td>Matematika</td>
        <td>{{$r->matematika}}</td>
        <td>{{cetakNilai($r->matematika)}}</td>
        </tr>
        <tr>
        <td>Ilmu Pengetahuan Alam</td>
        <td>{{$r->ipa}}</td>
        <td>{{cetakNilai($r->ipa)}}</td>
        </tr>
        <tr>
        <td>Ilmu Pengetahuan Sosial</td>
        <td>{{$r->ips}}</td>
        <td>{{cetakNilai($r->ips)}}</td>
        </tr>
        <tr>
        <td>Rata - rata</td>
        <td>{{$rata=round(($r->agama+$r->pkn+$r->indonesia+$r->inggris+$r->matematika+$r->ipa+$r->ips)/7, 2)}}</td>
        <td>{{cetakNilai($rata)}}</td>
        </tr>
        @endforeach
        </tbody>
    </table>
    <p>
        Diberikan di : ................<br>
        Pada tanggal : ................ <br>
    </p>
    <div class="ttd">
        <p>
            Yang memberikan,<br>
            Bapak/Ibu Guru<br><br><br><br>
            (.........................)
        </p>
        <p class="ortu">
            Mengetahui,<br>
            Orang Tua/Wali<br><br><br><br>
            (.........................)
        </p>
    </div>
</body>
</html>
