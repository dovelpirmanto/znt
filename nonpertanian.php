<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css">
    <link href="images/ATRBPN.png" rel="icon">
        <style>
          .container{width: 96%; max-width: 960px margin : 0auto;}
          img {width: 100%; height: auto;}
        </style>
    <title>Non Pertanian</title>
  </head>

  <body>

    <?php
      include 'koneksi.php';
          $carikode = mysqli_query($mysqli,"SELECT max(id) from nonpertanian") or die (mysql_error());
         
          // menjadikannya array
          $datakode = mysqli_fetch_array($carikode);
          // jika $datakode
          if ($datakode) {
           // membuat variabel baru untuk mengambil kode barang mulai dari 1
           $nilaikode = substr($datakode[0], 1);
           // menjadikan $nilaikode ( int )
           $kode = (int) $nilaikode;
           // setiap $kode di tambah 1
           $kode = $kode + 1;
           // hasil untuk menambahkan kode
           // angka 3 untuk menambahkan tiga angka setelah B dan angka 0 angka yang berada di tengah
           // atau angka sebelum $kode
           $hasilkode = "N".str_pad($kode, 3, "0", STR_PAD_LEFT);
          } 
        ?>

    <div class="container" style="margin-top: 30px">
      <div class="row">
        <div class="col-md-8 offset-md-2">
          <img src="images/SINTA.jpg" width="730" height="220"><br>
          <div class="card">
            <div class="card-header">
              Non Pertanian
            </div>
            <div class="card-body">
              <h6>A. Data Administrasi/Harga Tanah</h6>
              <form action="simpan-nonpertanian.php" method="POST" enctype="multipart/form-data">
                
                <div class="form-group">
                  <label>id</label>
                  <input type="text" name="id" placeholder="" class="form-control" required="required" value="<?php echo $hasilkode ?>" readonly>
                </div>

                <div class="form-group">
                  <label>Alamat</label>
                  <input type="text" name="alamat" placeholder="Jalan, Desa/Kelurahan, Kec, Kab/Kota" class="form-control">
                </div>

                <div class="form-group">
                  <label>Koordinat TM-3 (x) </label>
                  <input type="text" name="x" placeholder="" class="form-control">
                </div>

                <div class="form-group">
                  <label>Koordinat TM-3 (y) </label>
                  <input type="text" name="y" placeholder="" class="form-control">
                </div>

                <div class="form-group">
                  <label>Status Kepemilikan</label><br>
                  &nbsp  &nbsp  &nbsp<input type="radio" class="form-check-input" name="status" value="HM">HM &nbsp  &nbsp  &nbsp
                  <input type="radio" class="form-check-input" name="status" value="HGB">HGB &nbsp  &nbsp  &nbsp
                  <input type="radio" class="form-check-input" name="status" value="HP">HP &nbsp  &nbsp  &nbsp
                  <input type="radio" class="form-check-input" name="status" value="TMA">TMA &nbsp  &nbsp  &nbsp
                </div>

                <div class="form-group">
                  <label>Jenis Data</label><br>
                  &nbsp  &nbsp  &nbsp<input type="radio" class="form-check-input" name="jenis" value="Transaksi">Transaksi &nbsp  &nbsp  &nbsp
                  <input type="radio" class="form-check-input" name="jenis" value="Penawaran">Penawaran
                </div>

                <div class="form-group">
                  <label>Tanggal Transaksi</label>
                  <input type="text" name="tgl" placeholder="01/01/2022" class="form-control">
                </div>

                <div class="form-group">
                  <label>Harga Jual Beli</label>
                  <input type="text" name="harga" placeholder="Rp" class="form-control">
                </div>

                 <div class="form-group">
                  <label>Responden</label><br>
                  &nbsp  &nbsp  &nbsp<input type="radio" class="form-check-input" name="responden" value="Pemilik Tanah">Pemilik Tanah &nbsp  &nbsp  &nbsp
                  <input type="radio" class="form-check-input" name="responden" value="Real Estate">Real Estate
                </div>

                <div class="form-group">
                  <label>Nama, Alamat/No Telp</label>
                  <textarea class="form-control" name="dataresponden" placeholder="" rows="4"></textarea>
                </div>

                <br><h6>B. Data Fisik Tanah</h6>

                <div class="form-group">
                  <label>Luas Tanah</label>
                  <input type="text" name="luas" placeholder="m2" class="form-control">
                </div>

                <div class="form-group">
                  <label>Lebar Depan</label>
                  <input type="text" name="lebar" placeholder="m" class="form-control">
                </div>

                <div class="form-group">
                  <label>Panjang Belakang</label>
                  <input type="text" name="panjang" placeholder="m" class="form-control">
                </div>

                <div class="form-group">
                  <label>Bentuk Tanah</label><br>
                  &nbsp  &nbsp  &nbsp<input type="radio" class="form-check-input" name="bentuk" value="Persegi/Normal">Persegi/Normal &nbsp  &nbsp  &nbsp
                  <input type="radio" class="form-check-input" name="bentuk" value="Tidak Beraturan">Tidak Beraturan &nbsp  &nbsp  &nbsp
                  <input type="radio" class="form-check-input" name="bentuk" value="lain">lain
                </div>

                <div class="form-group">
                  <label>Elevasi dari Jalan</label><br>
                  &nbsp  &nbsp  &nbsp<input type="radio" class="form-check-input" name="elevasi" value="Lebih Tinggi">Lebih Tinggi &nbsp  &nbsp  &nbsp
                  <input type="radio" class="form-check-input" name="elevasi" value="Sama">Sama &nbsp  &nbsp &nbsp
                  <input type="radio" class="form-check-input" name="elevasi" value="Lebih Rendah">Lebih Rendah &nbsp  &nbsp &nbsp
                </div>

                <div class="form-group">
                  <label>Letak Tanah</label><br>
                  &nbsp  &nbsp  &nbsp<input type="radio" class="form-check-input" name="letak" value="Normal">Normal &nbsp  &nbsp  &nbsp
                  <input type="radio" class="form-check-input" name="letak" value="Tusuk Sate">Tusuk Sate &nbsp  &nbsp &nbsp
                  <input type="radio" class="form-check-input" name="letak" value="Hadap Taman">Hadap Taman &nbsp  &nbsp &nbsp
                  <input type="radio" class="form-check-input" name="letak" value="Huk">Huk &nbsp  &nbsp &nbsp
                  <input type="radio" class="form-check-input" name="letak" value="Lain">Lain-lain &nbsp  &nbsp &nbsp
                </div>

                <br><h6>C. Data Lingkungan</h6>
                <div class="form-group">
                  <label>Kelas Jalan</label><br>
                  &nbsp  &nbsp  &nbsp<input type="radio" class="form-check-input" name="kelas" value="Arteri">Arteri &nbsp  &nbsp  &nbsp
                  <input type="radio" class="form-check-input" name="kelas" value="Kolektor">Kolektor &nbsp  &nbsp &nbsp
                  <input type="radio" class="form-check-input" name="kelas" value="Lokal">Lokal &nbsp  &nbsp &nbsp
                  <input type="radio" class="form-check-input" name="kelas" value="Setapak">Setapak &nbsp  &nbsp &nbsp
                </div>

                <div class="form-group">
                  <label>Lebar Jalan</label>
                  <input type="text" name="lebarjalan" placeholder="m" class="form-control">
                </div>

                <div class="form-group">
                  <label>Aksebilitas</label><br>
                  &nbsp  &nbsp  &nbsp<input type="radio" class="form-check-input" name="aksebilitas" value="Sangat Baik">Sangat Baik &nbsp  &nbsp  &nbsp
                  <input type="radio" class="form-check-input" name="aksebilitas" value="Baik">Baik &nbsp  &nbsp &nbsp
                  <input type="radio" class="form-check-input" name="aksebilitas" value="Cukup">Cukup &nbsp  &nbsp &nbsp
                  <input type="radio" class="form-check-input" name="aksebilitas" value="Kurang">Kurang &nbsp  &nbsp &nbsp
                </div>

                <div class="form-group">
                  <label>Drainase</label><br>
                  &nbsp  &nbsp  &nbsp<input type="radio" class="form-check-input" name="drainase" value="Sangat Baik">Sangat Baik &nbsp  &nbsp  &nbsp
                  <input type="radio" class="form-check-input" name="drainase" value="Baik">Baik &nbsp  &nbsp &nbsp
                  <input type="radio" class="form-check-input" name="drainase" value="Cukup">Cukup &nbsp  &nbsp &nbsp
                  <input type="radio" class="form-check-input" name="drainase" value="Kurang">Kurang &nbsp  &nbsp &nbsp
                </div>

                <div class="form-group">
                  <label>Utilitas</label><br>
                  &nbsp  &nbsp  &nbsp<input type="radio" class="form-check-input" name="utilitas" value="Listrik">Listrik &nbsp  &nbsp  &nbsp
                  <input type="radio" class="form-check-input" name="utilitas" value="Gas">Gas &nbsp  &nbsp  &nbsp
                  <input type="radio" class="form-check-input" name="utilitas" value="Air Bersih">Air Bersih &nbsp  &nbsp  &nbsp
                  <input type="radio" class="form-check-input" name="utilitas" value="TV Kabel">TV Kabel &nbsp  &nbsp  &nbsp
                  <input type="radio" class="form-check-input" name="utilitas" value="Telepon">Telepon &nbsp  &nbsp  &nbsp
                  <input type="radio" class="form-check-input" name="utilitas" value="Lain">Lain-lain &nbsp  &nbsp &nbsp
                </div>

                <div class="form-group">
                  <label>Fasiilitas</label><br>
                  &nbsp  &nbsp  &nbsp<input type="checkbox" class="form-check-input" name="fasilitas[]" value="Sekolah">Sekolah &nbsp  &nbsp  &nbsp
                  <input type="checkbox" class="form-check-input" name="fasilitas[]" value="Tempat Ibadah">Tempat Ibadah &nbsp  &nbsp &nbsp
                  <input type="checkbox" class="form-check-input" name="fasilitas[]" value="Rumah Sakit">Rumah Sakit &nbsp  &nbsp &nbsp
                  <input type="checkbox" class="form-check-input" name="fasilitas[]" value="Pasar">Pasar &nbsp  &nbsp  &nbsp
                  <input type="checkbox" class="form-check-input" name="fasilitas[]" value="Lain">Lain &nbsp  &nbsp &nbsp 
                </div>

                <div class="form-group">
                  <label>Zoning/Peruntukan Kawasan</label><br>
                  &nbsp  &nbsp  &nbsp<input type="radio" class="form-check-input" name="zoning" value="Permukiman">Permukiman &nbsp  &nbsp  &nbsp
                  <input type="radio" class="form-check-input" name="zoning" value="Komersial">Komersial &nbsp  &nbsp  &nbsp
                  <input type="radio" class="form-check-input" name="zoning" value="Industri">Industri &nbsp  &nbsp  &nbsp
                  <input type="radio" class="form-check-input" name="zoning" value="Lain">Lain-lain &nbsp  &nbsp &nbsp
                </div>

               <br><h6>D. Data Bangunan</h6>
               <div class="form-group">
                  <label>Luas Bangunan 1</label>
                  <input type="text" name="luasbangunan1" placeholder="m2" class="form-control">
                </div>

                <div class="form-group">
                  <label>Luas Bangunan 2</label>
                  <input type="text" name="luasbangunan2" placeholder="m2" class="form-control">
                </div>

                <div class="form-group">
                  <label>Luas Bangunan</label>
                  <input type="text" name="luasbangunan" placeholder="m2" class="form-control">
                </div>

                <div class="form-group">
                  <label>Luas Bangunan Total</label>
                  <input type="text" name="luastotal" placeholder="m2" class="form-control">
                </div>

                <div class="form-group">
                  <label>Jenis</label><br>
                  &nbsp  &nbsp  &nbsp<input type="radio" class="form-check-input" name="jenisbangunan" value="Perumahan">Perumahan &nbsp  &nbsp  &nbsp
                  <input type="radio" class="form-check-input" name="jenisbangunan" value="Hotel/Wisma">Hotel/Wisma &nbsp  &nbsp  &nbsp
                  <input type="radio" class="form-check-input" name="jenisbangunan" value="Perkantoran">Perkantoran &nbsp  &nbsp  &nbsp
                  <input type="radio" class="form-check-input" name="jenisbangunan" value="Bengkel/Gudang">Bengkel/Gudang &nbsp  &nbsp  &nbsp
                  <input type="radio" class="form-check-input" name="jenisbangunan" value="Pabrik">Pabrik &nbsp  &nbsp  &nbsp <br>
                  &nbsp  &nbsp  &nbsp<input type="radio" class="form-check-input" name="jenisbangunan" value="Apartemen/Kondominium">Apartemen/Kondominium &nbsp  &nbsp  &nbsp
                  <input type="radio" class="form-check-input" name="jenisbangunan" value="Toko/Apotik/Pasar/Ruko">Toko/Apotik/Pasar/Ruko &nbsp  &nbsp  &nbsp
                  <input type="radio" class="form-check-input" name="jenisbangunan" value="Lain">Lain-lain &nbsp  &nbsp &nbsp
                </div>

                <div class="form-group">
                  <label>Jumlah Lantai</label><br>
                  &nbsp  &nbsp  &nbsp<input type="radio" class="form-check-input" name="jumlahlantai" value="1">1 &nbsp  &nbsp  &nbsp
                  <input type="radio" class="form-check-input" name="jumlahlantai" value="2">2 &nbsp  &nbsp &nbsp
                  <input type="radio" class="form-check-input" name="jumlahlantai" value="Lebih dari 2">Lebih dari 2 &nbsp  &nbsp &nbsp
                </div>

                <div class="form-group">
                  <label>Luas Bangunan Lantai Dasar</label>
                  <input type="text" name="luasdasar" placeholder="m2" class="form-control">
                </div>

                <div class="form-group">
                  <label>Luas Bangunan Lantai 2</label>
                  <input type="text" name="luaslantai2" placeholder="m2" class="form-control">
                </div>

                <div class="form-group">
                  <label>Luas Bangunan Lantai</label>
                  <input type="text" name="luaslantai" placeholder="m2" class="form-control">
                </div>

                <div class="form-group">
                  <label>Tahun Pembuatan</label>
                  <input type="text" name="pembuatan" placeholder="" class="form-control">
                </div>

                <div class="form-group">
                  <label>Tahun Renovasi</label>
                  <input type="text" name="renovasi" placeholder="" class="form-control">
                </div>
                
                <br><h6>Komponen Struktur</h6>
                <div class="form-group">
                  <label>Konstruksi/Kerangka</label><br>
                  <label>Atas</label><br>
                  &nbsp  &nbsp  &nbsp<input type="radio" class="form-check-input" name="atas" value="Kayu">Kayu &nbsp  &nbsp  &nbsp
                  <input type="radio" class="form-check-input" name="atas" value="Beton">Beton &nbsp  &nbsp &nbsp
                  <input type="radio" class="form-check-input" name="atas" value="Baja">Baja &nbsp  &nbsp &nbsp
                  <input type="radio" class="form-check-input" name="atas" value="Lain">Lain-lain &nbsp  &nbsp &nbsp
                </div>

                <div class="form-group">
                  <label>Bawah</label><br>
                  &nbsp  &nbsp  &nbsp<input type="radio" class="form-check-input" name="bawah" value="Beton">Beton &nbsp  &nbsp  &nbsp
                  <input type="radio" class="form-check-input" name="atas" value="Lain">Lain-lain &nbsp  &nbsp &nbsp
                </div>

                <br><h6>Komponen Material</h6>
                <div class="form-group">
                  <label>Atap</label><br>
                  &nbsp  &nbsp  &nbsp<input type="radio" class="form-check-input" name="atap" value="Genteng Beton">Genteng Beton &nbsp  &nbsp  &nbsp
                  <input type="radio" class="form-check-input" name="atap" value="Genteng Tanah Liat">Genteng Tanah Liat &nbsp  &nbsp &nbsp
                  <input type="radio" class="form-check-input" name="atap" value="Genteng Keramik">Genteng Keramik &nbsp  &nbsp &nbsp
                  <input type="radio" class="form-check-input" name="atap" value="Sirap">Sirap &nbsp  &nbsp  &nbsp
                  <input type="radio" class="form-check-input" name="atap" value="Metal Roof">Metal Roof &nbsp  &nbsp &nbsp <br>
                  &nbsp  &nbsp &nbsp<input type="radio" class="form-check-input" name="atap" value="Harflex">Harflex &nbsp  &nbsp &nbsp
                  <input type="radio" class="form-check-input" name="atap" value="Beton/Dak">Beton/Dak &nbsp  &nbsp  &nbsp
                  <input type="radio" class="form-check-input" name="atap" value="Asbes">Asbes &nbsp  &nbsp &nbsp
                  <input type="radio" class="form-check-input" name="atap" value="Seng">Seng &nbsp  &nbsp &nbsp
                  <input type="radio" class="form-check-input" name="atap" value="Aluminium/Spandek">Aluminium/Spandek &nbsp  &nbsp  &nbsp
                  <input type="radio" class="form-check-input" name="atap" value="Rumbia">Rumbia &nbsp  &nbsp &nbsp
                  <input type="radio" class="form-check-input" name="atap" value="Lain">Lain-lain &nbsp  &nbsp &nbsp
                </div>

                <div class="form-group">
                  <label>Dinding</label><br>
                  &nbsp  &nbsp  &nbsp<input type="radio" class="form-check-input" name="dinding" value="Bata Merah">Bata Merah &nbsp  &nbsp  &nbsp
                  <input type="radio" class="form-check-input" name="dinding" value="Papan Kayu">Papan Kayu &nbsp  &nbsp &nbsp
                  <input type="radio" class="form-check-input" name="dinding" value="Tripleks">Tripleks &nbsp  &nbsp &nbsp
                  <input type="radio" class="form-check-input" name="dinding" value="Hebel/Aerasi">Hebel/Aerasi &nbsp  &nbsp  &nbsp
                  <input type="radio" class="form-check-input" name="dinding" value="Partikel Board">Partikel Board &nbsp  &nbsp &nbsp <br>
                  &nbsp  &nbsp &nbsp<input type="radio" class="form-check-input" name="dinding" value="Seng">Seng &nbsp  &nbsp &nbsp
                  <input type="radio" class="form-check-input" name="dinding" value="Beton/Celcon">Beton/Celcon &nbsp  &nbsp  &nbsp
                  <input type="radio" class="form-check-input" name="dinding" value="Batako">Batako &nbsp  &nbsp &nbsp
                  <input type="radio" class="form-check-input" name="dinding" value="Asbes">Asbes &nbsp  &nbsp &nbsp
                  <input type="radio" class="form-check-input" name="dinding" value="Kaca/Glassblock">Kaca/Glassblock &nbsp  &nbsp  &nbsp
                  <input type="radio" class="form-check-input" name="dinding" value="Lain">Lain-lain &nbsp  &nbsp &nbsp
                </div>

                <div class="form-group">
                  <label>Langit-langit</label><br>
                  &nbsp  &nbsp  &nbsp<input type="radio" class="form-check-input" name="langit" value="Gypsum">Gypsum &nbsp  &nbsp  &nbsp
                  <input type="radio" class="form-check-input" name="langit" value="Tripleks">Tripleks &nbsp  &nbsp &nbsp
                  <input type="radio" class="form-check-input" name="langit" value="Akustik">Akustik &nbsp  &nbsp &nbsp
                  <input type="radio" class="form-check-input" name="langit" value="Papan Grc">Papan Grc &nbsp  &nbsp  &nbsp
                  <input type="radio" class="form-check-input" name="langit" value="Lambersiring">Lambersiring Board &nbsp  &nbsp &nbsp <br>
                  &nbsp  &nbsp &nbsp<input type="radio" class="form-check-input" name="langit" value="Papan Kayu">Papan Kayu &nbsp  &nbsp &nbsp
                  <input type="radio" class="form-check-input" name="langit" value="Ornamen">Ornamen &nbsp  &nbsp  &nbsp
                  <input type="radio" class="form-check-input" name="langit" value="Teak Wood">Teak Wood &nbsp  &nbsp &nbsp
                  <input type="radio" class="form-check-input" name="langit" value="Lain">Lain-lain &nbsp  &nbsp &nbsp
                </div>

                <div class="form-group">
                  <label>Lantai</label><br>
                  &nbsp  &nbsp  &nbsp<input type="radio" class="form-check-input" name="lantai" value="Marmer">Marmer &nbsp  &nbsp  &nbsp
                  <input type="radio" class="form-check-input" name="lantai" value="Keramik">Keramik &nbsp  &nbsp &nbsp
                  <input type="radio" class="form-check-input" name="lantai" value="Vinil">Vinil &nbsp  &nbsp &nbsp
                  <input type="radio" class="form-check-input" name="lantai" value="Granit">Granit &nbsp  &nbsp  &nbsp
                  <input type="radio" class="form-check-input" name="lantai" value="Lantai Beton">Lantai Beton &nbsp  &nbsp &nbsp 
                  <input type="radio" class="form-check-input" name="lantai" value="Ubin Pc">Ubin Pc &nbsp  &nbsp &nbsp
                  <input type="radio" class="form-check-input" name="lantai" value="Parkit">Parkit &nbsp  &nbsp &nbsp
                  <br>&nbsp  &nbsp &nbsp
                  <input type="radio" class="form-check-input" name="lantai" value="Papan Kayu">Papan Kayu &nbsp  &nbsp &nbsp
                  <input type="radio" class="form-check-input" name="lantai" value="Teraso">Teraso &nbsp  &nbsp &nbsp
                  <input type="radio" class="form-check-input" name="lantai" value="Kaca/Glassblock">Kaca/Glassblock &nbsp  &nbsp  &nbsp
                  <input type="radio" class="form-check-input" name="lantai" value="Multipleks">Multipleks &nbsp  &nbsp  &nbsp
                  <input type="radio" class="form-check-input" name="lantai" value="Granito">Granito &nbsp  &nbsp  &nbsp
                  <input type="radio" class="form-check-input" name="lantai" value="Lain">Lain-lain &nbsp  &nbsp &nbsp
                </div>

                <br><h6>Komponen Fasilitas</h6>
                <div class="form-group">
                  <label>Pagar</label><br>
                  &nbsp  &nbsp  &nbsp<input type="radio" class="form-check-input" name="pagar" value="Beton">Beton &nbsp  &nbsp  &nbsp
                  <input type="radio" class="form-check-input" name="pagar" value="Baja">Baja &nbsp  &nbsp &nbsp
                  <input type="radio" class="form-check-input" name="pagar" value="Kayu">Kayu &nbsp  &nbsp &nbsp
                  <input type="radio" class="form-check-input" name="pagar" value="Bata/Betako">Bata/Betako &nbsp  &nbsp  &nbsp
                  <input type="radio" class="form-check-input" name="pagar" value="Besi Cor">Besi Cor &nbsp  &nbsp &nbsp <br>
                  &nbsp  &nbsp &nbsp<input type="radio" class="form-check-input" name="pagar" value="Batu">Batu &nbsp  &nbsp &nbsp
                  <input type="radio" class="form-check-input" name="pagar" value="Besi Tempa">Besi Tempa &nbsp  &nbsp  &nbsp
                  <input type="radio" class="form-check-input" name="pagar" value="Pipa Besi">Pipa Besi &nbsp  &nbsp &nbsp
                  <input type="radio" class="form-check-input" name="pagar" value="Lain">Lain-lain &nbsp  &nbsp &nbsp
                </div>

                <div class="form-group">
                  <label>Panjang Pagar</label>
                  <input type="text" name="panjangpagar" placeholder="m" class="form-control">
                </div>

                <div class="form-group">
                  <label>Luas Carport/Parkir</label>
                  <input type="text" name="parkir" placeholder=" p x l = m2" class="form-control">
                </div>

                <div class="form-group">
                  <label>Pintu/Jendela</label><br>
                  &nbsp  &nbsp  &nbsp<input type="radio" class="form-check-input" name="pintu" value="Kayu">Kayu &nbsp  &nbsp  &nbsp
                  <input type="radio" class="form-check-input" name="pintu" value="Aluminium">Aluminium &nbsp  &nbsp  &nbsp
                  <input type="radio" class="form-check-input" name="pintu" value="Lain">Lain-lain &nbsp  &nbsp &nbsp
                </div>

                <div class="form-group">
                  <label>Fasiilitas</label><br>
                  &nbsp  &nbsp  &nbsp<input type="checkbox" class="form-check-input" name="fasilitasrumah[]" value="Listrik">Listrik &nbsp  &nbsp  &nbsp
                  <input type="checkbox" class="form-check-input" name="fasilitasrumah[]" value="Heater">Heater &nbsp  &nbsp &nbsp
                  <input type="checkbox" class="form-check-input" name="fasilitasrumah[]" value="Air Bersih (PAM)">Air Bersih (PAM) &nbsp  &nbsp &nbsp
                  <input type="checkbox" class="form-check-input" name="fasilitasrumah[]" value="Kolam Renang">Kolam Renang &nbsp  &nbsp  &nbsp
                  <input type="checkbox" class="form-check-input" name="fasilitasrumah[]" value="Telepon">Telepon &nbsp  &nbsp &nbsp <br>
                  &nbsp  &nbsp &nbsp<input type="checkbox" class="form-check-input" name="fasilitasrumah[]" value="Sumur Gali">Sumur Gali &nbsp  &nbsp &nbsp
                  <input type="checkbox" class="form-check-input" name="fasilitasrumah[]" value="Gas">Gas Tempa &nbsp  &nbsp  &nbsp
                  <input type="checkbox" class="form-check-input" name="fasilitasrumah[]" value="Sumur Petek">Sumur Petek &nbsp  &nbsp &nbsp
                  <input type="checkbox" class="form-check-input" name="fasilitasrumah[]" value="AC">AC &nbsp  &nbsp &nbsp
                  <input type="checkbox" class="form-check-input" name="fasilitasrumah[]" value="Lain">Lain-lain &nbsp  &nbsp &nbsp
                </div>

                <div class="form-group">
                  <label>Kondisi Fasilitas Umum</label><br>
                  &nbsp  &nbsp  &nbsp<input type="radio" class="form-check-input" name="umum" value="Baik Sekali">Baik Sekali &nbsp  &nbsp  &nbsp
                  <input type="radio" class="form-check-input" name="umum" value="Baik">Baik &nbsp  &nbsp  &nbsp
                  <input type="radio" class="form-check-input" name="umum" value="Sedang">Sedang &nbsp  &nbsp  &nbsp
                  <input type="radio" class="form-check-input" name="umum" value="Jelek">Jelek &nbsp  &nbsp  &nbsp
                  <input type="radio" class="form-check-input" name="umum" value="Jelek Sekali">Jelek Sekali &nbsp  &nbsp &nbsp
                </div>

                <div class="form-group">
                  <label>Survei Biaya Bangunan</label>
                  <input type="text" name="surveibiaya" placeholder="Sumber, Rp" class="form-control">
                </div>

                <div class="form-group">
                  <label>Kesimpulan Petugas untuk Biaya Bangunan</label>
                  <input type="text" name="kesimpulan" placeholder="Rp" class="form-control">
                </div>

                <div class="form-group">
                  <label>Keterangan</label>
                  <textarea class="form-control" name="ket" placeholder="" rows="4"></textarea>
                </div>

                <div class="mb-3">
                <label class="form-label">Foto Tampak Depan</label>
                <input type="file" name="pas_foto" class="form-control">
                </div>

                <button type="submit" class="btn btn-success">SIMPAN</button>
                <a href="Dashboard.php" class="btn btn-danger">BATAL</a> 

              </form>
            </div>
          </div>
        </div>
      </div>
    </div>

    <script src="https://code.jquery.com/jquery-3.4.1.slim.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js"></script>
  </body>
</html>