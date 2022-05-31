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
    <title>Pertanian</title>
  </head>

  <body>

    <?php
      include 'koneksi.php';
          $carikode = mysqli_query($mysqli,"SELECT max(id) from pertanian") or die (mysql_error());
         
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
           $hasilkode = "P".str_pad($kode, 3, "0", STR_PAD_LEFT);
          } 
        ?>

    <div class="container" style="margin-top: 30px">
      <div class="row">
        <div class="col-md-8 offset-md-2">
          <img src="images/SINTA.jpg" width="730" height="220"><br>
          <div class="card">
            <div class="card-header">
              Pertanian
            </div>
            <div class="card-body">
              <h6>A. Data Administrasi/Harga Tanah</h6>
              <form action="simpan-pertanian2.php" method="POST" enctype="multipart/form-data">
                
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
                  <label>Kemiringan Tanah</label><br>
                  &nbsp  &nbsp  &nbsp<input type="radio" class="form-check-input" name="miring" value="0-8%">0-8% &nbsp  &nbsp  &nbsp
                  <input type="radio" class="form-check-input" name="miring" value="8-15%">8-15% &nbsp  &nbsp &nbsp
                  <input type="radio" class="form-check-input" name="miring" value="15-40%">15-40% &nbsp  &nbsp &nbsp
                  <input type="radio" class="form-check-input" name="miring" value=">40%"> >40%
                </div>

                <div class="form-group">
                  <label>Jenis Komoditi</label><br>
                  &nbsp  &nbsp  &nbsp<input type="radio" class="form-check-input" name="komoditi" value="Padi">Padi &nbsp  &nbsp  &nbsp
                  <input type="radio" class="form-check-input" name="komoditi" value="Tanaman Keras">Tanaman Keras &nbsp  &nbsp &nbsp
                </div>

                <div class="form-group">
                  <label>Kesesuaian Tanah Terhadap Komoditi</label><br>
                  &nbsp  &nbsp  &nbsp<input type="radio" class="form-check-input" name="kesesuaian" value="Sangat Sesuai">Sangat Sesuai &nbsp  &nbsp  &nbsp
                  <input type="radio" class="form-check-input" name="kesesuaian" value="Sesuai">Sesuai &nbsp  &nbsp &nbsp
                  <input type="radio" class="form-check-input" name="kesesuaian" value="Kurang Sesuai">Kurang Sesuai
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
                  <label>Irigasi</label><br>
                  &nbsp  &nbsp  &nbsp<input type="radio" class="form-check-input" name="irigasi" value="Sangat Baik">Sangat Baik &nbsp  &nbsp  &nbsp
                  <input type="radio" class="form-check-input" name="irigasi" value="Baik">Baik &nbsp  &nbsp &nbsp
                  <input type="radio" class="form-check-input" name="irigasi" value="Cukup">Cukup &nbsp  &nbsp &nbsp
                  <input type="radio" class="form-check-input" name="irigasi" value="Kurang">Kurang &nbsp  &nbsp &nbsp
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
                  <input type="radio" class="form-check-input" name="utilitas" value="lain">lain &nbsp  &nbsp &nbsp
                </div>

                <br><h6>D. Keterangan</h6>
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