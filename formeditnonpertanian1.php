<?php 
include 'koneksi.php';
if (isset($_GET['id'])) {
  if ($_GET['id'] != "") {
    
    $id = $_GET['id'];

    $query = mysqli_query($mysqli,"SELECT * FROM nonpertanian WHERE id='$id'");
    $row = mysqli_fetch_array($query);

  }else{
    header("location:datanonpertanian1.php");
  }
}else{
  header("location:datanonpertanian1.php");
}

?>
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
              <form action="edit-nonpertanian1.php" method="POST" enctype="multipart/form-data">
                
                <div class="form-group">
                  <label>id</label>
                  <input type="text" name="id" placeholder="" class="form-control" required="required" value="<?php echo $id ?>" readonly>
                </div>

                <div class="form-group">
                  <label>Alamat</label>
                  <input type="text" name="alamat" placeholder="Jalan, Desa/Kelurahan, Kec, Kab/Kota" class="form-control" value="<?php echo $row['alamat']; ?>">
                </div>

                <div class="form-group">
                  <label>Koordinat TM-3 (x) </label>
                  <input type="text" name="x" placeholder="" class="form-control" value="<?php echo $row['x']; ?>">
                </div>

                <div class="form-group">
                  <label>Koordinat TM-3 (y) </label>
                  <input type="text" name="y" placeholder="" class="form-control" value="<?php echo $row['y']; ?>">
                </div>

                <div class="form-group">
                  <label>Status Kepemilikan</label><br>
                  &nbsp  &nbsp  &nbsp<input type="radio" class="form-check-input" name="status" value="HM" <?php if($row['status']=='HM') echo 'checked'?>>HM &nbsp  &nbsp  &nbsp
                  <input type="radio" class="form-check-input" name="status" value="HGB" <?php if($row['status']=='HGB') echo 'checked'?>>HGB &nbsp  &nbsp  &nbsp
                  <input type="radio" class="form-check-input" name="status" value="HP" <?php if($row['status']=='HP') echo 'checked'?>>HP &nbsp  &nbsp  &nbsp
                  <input type="radio" class="form-check-input" name="status" value="TMA" <?php if($row['status']=='TMA') echo 'checked'?>>TMA &nbsp  &nbsp  &nbsp
                </div>

                <div class="form-group">
                  <label>Jenis Data</label><br>
                  &nbsp  &nbsp  &nbsp<input type="radio" class="form-check-input" name="jenis" value="Transaksi" <?php if($row['jenis']=='Transaksi') echo 'checked'?>>Transaksi &nbsp  &nbsp  &nbsp
                  <input type="radio" class="form-check-input" name="jenis" value="Penawaran" <?php if($row['jenis']=='Penawaran') echo 'checked'?>>Penawaran
                </div>

                <div class="form-group">
                  <label>Tanggal Transaksi</label>
                  <input type="text" name="tgl" placeholder="01/01/2022" class="form-control" value="<?php echo $row['tgl']; ?>">
                </div>

                <div class="form-group">
                  <label>Harga Jual Beli</label>
                  <input type="text" name="harga" placeholder="Rp" class="form-control" value="<?php echo $row['harga']; ?>">
                </div>

                 <div class="form-group">
                  <label>Responden</label><br>
                  &nbsp  &nbsp  &nbsp<input type="radio" class="form-check-input" name="responden" value="Pemilik Tanah" <?php if($row['responden']=='Pemilik Tanah') echo 'checked'?>>Pemilik Tanah &nbsp  &nbsp  &nbsp
                  <input type="radio" class="form-check-input" name="responden" value="Real Estate" <?php if($row['responden']=='Real Estate') echo 'checked'?>>Real Estate
                </div>

                <div class="form-group">
                  <label>Nama, Alamat/No Telp</label>
                  <textarea class="form-control" name="dataresponden" placeholder="" rows="4"><?php echo $row['dataresponden']; ?></textarea>
                </div>

                <br><h6>B. Data Fisik Tanah</h6>

                <div class="form-group">
                  <label>Luas Tanah</label>
                  <input type="text" name="luas" placeholder="m2" class="form-control" value="<?php echo $row['luas']; ?>">
                </div>

                <div class="form-group">
                  <label>Lebar Depan</label>
                  <input type="text" name="lebar" placeholder="m" class="form-control" value="<?php echo $row['lebar']; ?>">
                </div>

                <div class="form-group">
                  <label>Panjang Belakang</label>
                  <input type="text" name="panjang" placeholder="m" class="form-control" value="<?php echo $row['panjang']; ?>">
                </div>

                <div class="form-group">
                  <label>Bentuk Tanah</label><br>
                  &nbsp  &nbsp  &nbsp<input type="radio" class="form-check-input" name="bentuk" value="Persegi/Normal" <?php if($row['bentuk']=='Persegi/Normal') echo 'checked'?>>Persegi/Normal &nbsp  &nbsp  &nbsp
                  <input type="radio" class="form-check-input" name="bentuk" value="Tidak Beraturan" <?php if($row['bentuk']=='Tidak Beraturan') echo 'checked'?>>Tidak Beraturan &nbsp  &nbsp  &nbsp
                  <input type="radio" class="form-check-input" name="bentuk" value="lain" <?php if($row['bentuk']=='lain') echo 'checked'?>>lain
                </div>

                <div class="form-group">
                  <label>Elevasi dari Jalan</label><br>
                  &nbsp  &nbsp  &nbsp<input type="radio" class="form-check-input" name="elevasi" value="Lebih Tinggi" <?php if($row['elevasi']=='Lebih Tinggi') echo 'checked'?>>Lebih Tinggi &nbsp  &nbsp  &nbsp
                  <input type="radio" class="form-check-input" name="elevasi" value="Sama" <?php if($row['elevasi']=='Sama') echo 'checked'?>>Sama &nbsp  &nbsp &nbsp
                  <input type="radio" class="form-check-input" name="elevasi" value="Lebih Rendah" <?php if($row['elevasi']=='Lebih Rendah') echo 'checked'?>>Lebih Rendah &nbsp  &nbsp &nbsp
                </div>

                <div class="form-group">
                  <label>Letak Tanah</label><br>
                  &nbsp  &nbsp  &nbsp<input type="radio" class="form-check-input" name="letak" value="Normal" <?php if($row['letak']=='Normal') echo 'checked'?>>Normal &nbsp  &nbsp  &nbsp
                  <input type="radio" class="form-check-input" name="letak" value="Tusuk Sate" <?php if($row['letak']=='Tusuk Sate') echo 'checked'?>>Tusuk Sate &nbsp  &nbsp &nbsp
                  <input type="radio" class="form-check-input" name="letak" value="Hadap Taman" <?php if($row['letak']=='Hadap Taman') echo 'checked'?>>Hadap Taman &nbsp  &nbsp &nbsp
                  <input type="radio" class="form-check-input" name="letak" value="Huk" <?php if($row['letak']=='Huk') echo 'checked'?>>Huk &nbsp  &nbsp &nbsp
                  <input type="radio" class="form-check-input" name="letak" value="Lain" <?php if($row['letak']=='lain') echo 'checked'?>>Lain-lain &nbsp  &nbsp &nbsp
                </div>

                <br><h6>C. Data Lingkungan</h6>
                <div class="form-group">
                  <label>Kelas Jalan</label><br>
                  &nbsp  &nbsp  &nbsp<input type="radio" class="form-check-input" name="kelas" value="Arteri" <?php if($row['kelas']=='Arteri') echo 'checked'?>>Arteri &nbsp  &nbsp  &nbsp
                  <input type="radio" class="form-check-input" name="kelas" value="Kolektor" <?php if($row['kelas']=='Kolektor') echo 'checked'?>>Kolektor &nbsp  &nbsp &nbsp
                  <input type="radio" class="form-check-input" name="kelas" value="Lokal" <?php if($row['kelas']=='Lokal') echo 'checked'?>>Lokal &nbsp  &nbsp &nbsp
                  <input type="radio" class="form-check-input" name="kelas" value="Setapak"<?php if($row['kelas']=='Setapak') echo 'checked'?>>Setapak &nbsp  &nbsp &nbsp
                </div>

                <div class="form-group">
                  <label>Lebar Jalan</label>
                  <input type="text" name="lebarjalan" placeholder="m" class="form-control" value="<?php echo $row['lebarjalan']; ?>">
                </div>

                <div class="form-group">
                  <label>Aksebilitas</label><br>
                  &nbsp  &nbsp  &nbsp<input type="radio" class="form-check-input" name="aksebilitas" value="Sangat Baik" <?php if($row['aksebilitas']=='Sangat Baik') echo 'checked'?>>Sangat Baik &nbsp  &nbsp  &nbsp
                  <input type="radio" class="form-check-input" name="aksebilitas" value="Baik" <?php if($row['aksebilitas']=='Baik') echo 'checked'?>>Baik &nbsp  &nbsp &nbsp
                  <input type="radio" class="form-check-input" name="aksebilitas" value="Cukup" <?php if($row['aksebilitas']=='Cukup') echo 'checked'?>>Cukup &nbsp  &nbsp &nbsp
                  <input type="radio" class="form-check-input" name="aksebilitas" value="Kurang" <?php if($row['aksebilitas']=='Kurang') echo 'checked'?>>Kurang &nbsp  &nbsp &nbsp
                </div>

                <div class="form-group">
                  <label>Drainase</label><br>
                  &nbsp  &nbsp  &nbsp<input type="radio" class="form-check-input" name="drainase" value="Sangat Baik" <?php if($row['drainase']=='Sangat Baik') echo 'checked'?>>Sangat Baik &nbsp  &nbsp  &nbsp
                  <input type="radio" class="form-check-input" name="drainase" value="Baik" <?php if($row['drainase']=='Baik') echo 'checked'?>>Baik &nbsp  &nbsp &nbsp
                  <input type="radio" class="form-check-input" name="drainase" value="Cukup" <?php if($row['drainase']=='Cukup') echo 'checked'?>>Cukup &nbsp  &nbsp &nbsp
                  <input type="radio" class="form-check-input" name="drainase" value="Kurang"<?php if($row['drainase']=='Kurang') echo 'checked'?>>Kurang &nbsp  &nbsp &nbsp
                </div>

                <div class="form-group">
                  <label>Utilitas</label><br>
                  &nbsp  &nbsp  &nbsp<input type="radio" class="form-check-input" name="utilitas" value="Listrik" <?php if($row['utilitas']=='Listrik') echo 'checked'?>>Listrik &nbsp  &nbsp  &nbsp
                  <input type="radio" class="form-check-input" name="utilitas" value="Gas" <?php if($row['utilitas']=='Gas') echo 'checked'?>>Gas &nbsp  &nbsp  &nbsp
                  <input type="radio" class="form-check-input" name="utilitas" value="Air Bersih" <?php if($row['utilitas']=='Air Bersih') echo 'checked'?>>Air Bersih &nbsp  &nbsp  &nbsp
                  <input type="radio" class="form-check-input" name="utilitas" value="TV Kabel" <?php if($row['utilitas']=='TV Kabel') echo 'checked'?>>TV Kabel &nbsp  &nbsp  &nbsp
                  <input type="radio" class="form-check-input" name="utilitas" value="Telepon" <?php if($row['utilitas']=='Telepon') echo 'checked'?>>Telepon &nbsp  &nbsp  &nbsp
                  <input type="radio" class="form-check-input" name="utilitas" value="Lain" <?php if($row['utilitas']=='Lain') echo 'checked'?>>Lain-lain &nbsp  &nbsp &nbsp
                </div>

                <div class="form-group">
                  <label>Fasiilitas</label><br>
                  &nbsp  &nbsp  &nbsp<input type="checkbox" class="form-check-input" name="fasilitas[]" value="Sekolah" <?php if($row['fasilitas']=='Sekolah') echo 'checked'?>>Sekolah &nbsp  &nbsp  &nbsp
                  <input type="checkbox" class="form-check-input" name="fasilitas[]" value="Tempat Ibadah" <?php if($row['fasilitas']=='Tempat Ibadah') echo 'checked'?>>Tempat Ibadah &nbsp  &nbsp &nbsp
                  <input type="checkbox" class="form-check-input" name="fasilitas[]" value="Rumah Sakit" <?php if($row['fasilitas']=='Rumah Sakit') echo 'checked'?>>Rumah Sakit &nbsp  &nbsp &nbsp
                  <input type="checkbox" class="form-check-input" name="fasilitas[]" value="Pasar" <?php if($row['fasilitas']=='Pasar') echo 'checked'?>>Pasar &nbsp  &nbsp  &nbsp
                  <input type="checkbox" class="form-check-input" name="fasilitas[]" value="Lain" <?php if($row['fasilitas']=='Lain') echo 'checked'?>>Lain &nbsp  &nbsp &nbsp 
                </div>

                <div class="form-group">
                  <label>Zoning/Peruntukan Kawasan</label><br>
                  &nbsp  &nbsp  &nbsp<input type="radio" class="form-check-input" name="zoning" value="Permukiman" <?php if($row['zoning']=='Permukiman') echo 'checked'?>>Permukiman &nbsp  &nbsp  &nbsp
                  <input type="radio" class="form-check-input" name="zoning" value="Komersial" <?php if($row['zoning']=='Komersial') echo 'checked'?>>Komersial &nbsp  &nbsp  &nbsp
                  <input type="radio" class="form-check-input" name="zoning" value="Industri" <?php if($row['zoning']=='Industri') echo 'checked'?>>Industri &nbsp  &nbsp  &nbsp
                  <input type="radio" class="form-check-input" name="zoning" value="Lain" <?php if($row['zoning']=='Lain') echo 'checked'?>>Lain-lain &nbsp  &nbsp &nbsp
                </div>

               <br><h6>D. Data Bangunan</h6>
               <div class="form-group">
                  <label>Luas Bangunan 1</label>
                  <input type="text" name="luasbangunan1" placeholder="m2" class="form-control" value="<?php echo $row['luasbangunan1']; ?>">
                </div>

                <div class="form-group">
                  <label>Luas Bangunan 2</label>
                  <input type="text" name="luasbangunan2" placeholder="m2" class="form-control" value="<?php echo $row['luasbangunan2']; ?>">
                </div>

                <div class="form-group">
                  <label>Luas Bangunan</label>
                  <input type="text" name="luasbangunan" placeholder="m2" class="form-control" value="<?php echo $row['luasbangunan']; ?>">
                </div>

                <div class="form-group">
                  <label>Luas Bangunan Total</label>
                  <input type="text" name="luastotal" placeholder="m2" class="form-control" value="<?php echo $row['luastotal']; ?>">
                </div>

                <div class="form-group">
                  <label>Jenis</label><br>
                  &nbsp  &nbsp  &nbsp<input type="radio" class="form-check-input" name="jenisbangunan" value="Perumahan" <?php if($row['jenisbangunan']=='Perumahan') echo 'checked'?>>Perumahan &nbsp  &nbsp  &nbsp
                  <input type="radio" class="form-check-input" name="jenisbangunan" value="Hotel/Wisma" <?php if($row['jenisbangunan']=='Hotel/Wisma') echo 'checked'?>>Hotel/Wisma &nbsp  &nbsp  &nbsp
                  <input type="radio" class="form-check-input" name="jenisbangunan" value="Perkantoran" <?php if($row['jenisbangunan']=='Perkantoran') echo 'checked'?>>Perkantoran &nbsp  &nbsp  &nbsp
                  <input type="radio" class="form-check-input" name="jenisbangunan" value="Bengkel/Gudang" <?php if($row['jenisbangunan']=='Bengkel/Gudang') echo 'checked'?>>Bengkel/Gudang &nbsp  &nbsp  &nbsp
                  <input type="radio" class="form-check-input" name="jenisbangunan" value="Pabrik" <?php if($row['jenisbangunan']=='Pabrik') echo 'checked'?>>Pabrik &nbsp  &nbsp  &nbsp <br>
                  &nbsp  &nbsp  &nbsp<input type="radio" class="form-check-input" name="jenisbangunan" value="Apartemen/Kondominium" <?php if($row['jenisbangunan']=='Apartemen/Kondominium') echo 'checked'?>>Apartemen/Kondominium &nbsp  &nbsp  &nbsp
                  <input type="radio" class="form-check-input" name="jenisbangunan" value="Toko/Apotik/Pasar/Ruko" <?php if($row['jenisbangunan']=='Toko/Apotik/Pasar/Ruko') echo 'checked'?>>Toko/Apotik/Pasar/Ruko &nbsp  &nbsp  &nbsp
                  <input type="radio" class="form-check-input" name="jenisbangunan" value="Lain" <?php if($row['jenisbangunan']=='Lain') echo 'checked'?>>Lain-lain &nbsp  &nbsp &nbsp
                </div>

                <div class="form-group">
                  <label>Jumlah Lantai</label><br>
                  &nbsp  &nbsp  &nbsp<input type="radio" class="form-check-input" name="jumlahlantai" value="1" <?php if($row['jumlahlantai']=='1') echo 'checked'?>>1 &nbsp  &nbsp  &nbsp
                  <input type="radio" class="form-check-input" name="jumlahlantai" value="2" <?php if($row['jumlahlantai']=='2') echo 'checked'?>>2 &nbsp  &nbsp &nbsp
                  <input type="radio" class="form-check-input" name="jumlahlantai" value="Lebih dari 2" <?php if($row['jumlahlantai']=='Lebih dari 2') echo 'checked'?>>Lebih dari 2 &nbsp  &nbsp &nbsp
                </div>

                <div class="form-group">
                  <label>Luas Bangunan Lantai Dasar</label>
                  <input type="text" name="luasdasar" placeholder="m2" class="form-control" value="<?php echo $row['luasdasar']; ?>">
                </div>

                <div class="form-group">
                  <label>Luas Bangunan Lantai 2</label>
                  <input type="text" name="luaslantai2" placeholder="m2" class="form-control" value="<?php echo $row['luaslantai2']; ?>">
                </div>

                <div class="form-group">
                  <label>Luas Bangunan Lantai</label>
                  <input type="text" name="luaslantai" placeholder="m2" class="form-control" value="<?php echo $row['luaslantai']; ?>">
                </div>

                <div class="form-group">
                  <label>Tahun Pembuatan</label>
                  <input type="text" name="pembuatan" placeholder="" class="form-control" value="<?php echo $row['pembuatan']; ?>">
                </div>

                <div class="form-group">
                  <label>Tahun Renovasi</label>
                  <input type="text" name="renovasi" placeholder="" class="form-control" value="<?php echo $row['renovasi']; ?>">
                </div>
                
                <br><h6>Komponen Struktur</h6>
                <div class="form-group">
                  <label>Konstruksi/Kerangka</label><br>
                  <label>Atas</label><br>
                  &nbsp  &nbsp  &nbsp<input type="radio" class="form-check-input" name="atas" value="Kayu" <?php if($row['atas']=='Kayu') echo 'checked'?>>Kayu &nbsp  &nbsp  &nbsp
                  <input type="radio" class="form-check-input" name="atas" value="Beton" <?php if($row['atas']=='Beton') echo 'checked'?>>Beton &nbsp  &nbsp &nbsp
                  <input type="radio" class="form-check-input" name="atas" value="Baja" <?php if($row['atas']=='Baja') echo 'checked'?>>Baja &nbsp  &nbsp &nbsp
                  <input type="radio" class="form-check-input" name="atas" value="Lain" <?php if($row['atas']=='Lain') echo 'checked'?>>Lain-lain &nbsp  &nbsp &nbsp
                </div>

                <div class="form-group">
                  <label>Bawah</label><br>
                  &nbsp  &nbsp  &nbsp<input type="radio" class="form-check-input" name="bawah" value="Beton" <?php if($row['bawah']=='Beton') echo 'checked'?>>Beton &nbsp  &nbsp  &nbsp
                  <input type="radio" class="form-check-input" name="atas" value="Lain" <?php if($row['bawah']=='Lain-lain') echo 'checked'?>>Lain-lain &nbsp  &nbsp &nbsp
                </div>

                <br><h6>Komponen Material</h6>
                <div class="form-group">
                  <label>Atap</label><br>
                  &nbsp  &nbsp  &nbsp<input type="radio" class="form-check-input" name="atap" value="Genteng Beton" <?php if($row['atap']=='Genteng Beton') echo 'checked'?>>Genteng Beton &nbsp  &nbsp  &nbsp
                  <input type="radio" class="form-check-input" name="atap" value="Genteng Tanah Liat" <?php if($row['atap']=='Genteng Tanah Liat') echo 'checked'?>>Genteng Tanah Liat &nbsp  &nbsp &nbsp
                  <input type="radio" class="form-check-input" name="atap" value="Genteng Keramik" <?php if($row['atap']=='Genteng Keramik') echo 'checked'?>>Genteng Keramik &nbsp  &nbsp &nbsp
                  <input type="radio" class="form-check-input" name="atap" value="Sirap" <?php if($row['atap']=='Sirap') echo 'checked'?>>Sirap &nbsp  &nbsp  &nbsp
                  <input type="radio" class="form-check-input" name="atap" value="Metal Roof" <?php if($row['atap']=='Metal Roof') echo 'checked'?>>Metal Roof &nbsp  &nbsp &nbsp <br>
                  &nbsp  &nbsp &nbsp<input type="radio" class="form-check-input" name="atap" value="Harflex" <?php if($row['atap']=='Harflex') echo 'checked'?>>Harflex &nbsp  &nbsp &nbsp
                  <input type="radio" class="form-check-input" name="atap" value="Beton/Dak" <?php if($row['atap']=='Beton/Dak') echo 'checked'?>>Beton/Dak &nbsp  &nbsp  &nbsp
                  <input type="radio" class="form-check-input" name="atap" value="Asbes" <?php if($row['atap']=='Asbes') echo 'checked'?>>Asbes &nbsp  &nbsp &nbsp
                  <input type="radio" class="form-check-input" name="atap" value="Seng" <?php if($row['atap']=='Seng') echo 'checked'?>>Seng &nbsp  &nbsp &nbsp
                  <input type="radio" class="form-check-input" name="atap" value="Aluminium/Spandek" <?php if($row['atap']=='Aluminium/Spandek') echo 'checked'?>>Aluminium/Spandek &nbsp  &nbsp  &nbsp
                  <input type="radio" class="form-check-input" name="atap" value="Rumbia" <?php if($row['atap']=='Rumbia') echo 'checked'?>>Rumbia &nbsp  &nbsp &nbsp
                  <input type="radio" class="form-check-input" name="atap" value="Lain" <?php if($row['atap']=='Lain') echo 'checked'?>>Lain-lain &nbsp  &nbsp &nbsp
                </div>

                <div class="form-group">
                  <label>Dinding</label><br>
                  &nbsp  &nbsp  &nbsp<input type="radio" class="form-check-input" name="dinding" value="Bata Merah"<?php if($row['dinding']=='Bata Merah') echo 'checked'?>>Bata Merah &nbsp  &nbsp  &nbsp
                  <input type="radio" class="form-check-input" name="dinding" value="Papan Kayu" <?php if($row['dinding']=='Papan Kayu') echo 'checked'?>>Papan Kayu &nbsp  &nbsp &nbsp
                  <input type="radio" class="form-check-input" name="dinding" value="Tripleks" <?php if($row['dinding']=='Tripleks') echo 'checked'?>>Tripleks &nbsp  &nbsp &nbsp
                  <input type="radio" class="form-check-input" name="dinding" value="Hebel/Aerasi" <?php if($row['dinding']=='Hebel/Aerasi') echo 'checked'?>>Hebel/Aerasi &nbsp  &nbsp  &nbsp
                  <input type="radio" class="form-check-input" name="dinding" value="Partikel Board" <?php if($row['dinding']=='Partikel Board') echo 'checked'?>>Partikel Board &nbsp  &nbsp &nbsp <br>
                  &nbsp  &nbsp &nbsp<input type="radio" class="form-check-input" name="dinding" value="Seng" <?php if($row['dinding']=='Seng') echo 'checked'?>>Seng &nbsp  &nbsp &nbsp
                  <input type="radio" class="form-check-input" name="dinding" value="Beton/Celcon" <?php if($row['dinding']=='Beton/Celcon') echo 'checked'?>>Beton/Celcon &nbsp  &nbsp  &nbsp
                  <input type="radio" class="form-check-input" name="dinding" value="Batako" <?php if($row['dinding']=='Batako') echo 'checked'?>>Batako &nbsp  &nbsp &nbsp
                  <input type="radio" class="form-check-input" name="dinding" value="Asbes" <?php if($row['dinding']=='Asbes') echo 'checked'?>>Asbes &nbsp  &nbsp &nbsp
                  <input type="radio" class="form-check-input" name="dinding" value="Kaca/Glassblock" <?php if($row['dinding']=='Kaca/Glassblock') echo 'checked'?>>Kaca/Glassblock &nbsp  &nbsp  &nbsp
                  <input type="radio" class="form-check-input" name="dinding" value="Lain" <?php if($row['dinding']=='Lain') echo 'checked'?>>Lain-lain &nbsp  &nbsp &nbsp
                </div>

                <div class="form-group">
                  <label>Langit-langit</label><br>
                  &nbsp  &nbsp  &nbsp<input type="radio" class="form-check-input" name="langit" value="Gypsum" <?php if($row['langit']=='Gypsum') echo 'checked'?>>Gypsum &nbsp  &nbsp  &nbsp
                  <input type="radio" class="form-check-input" name="langit" value="Tripleks" <?php if($row['langit']=='Tripleks') echo 'checked'?>>Tripleks &nbsp  &nbsp &nbsp
                  <input type="radio" class="form-check-input" name="langit" value="Akustik" <?php if($row['langit']=='Akustik') echo 'checked'?>>Akustik &nbsp  &nbsp &nbsp
                  <input type="radio" class="form-check-input" name="langit" value="Papan Grc" <?php if($row['langit']=='Papan Grc') echo 'checked'?>>Papan Grc &nbsp  &nbsp  &nbsp
                  <input type="radio" class="form-check-input" name="langit" value="Lambersiring" <?php if($row['langit']=='Lambersiring Board') echo 'checked'?>>Lambersiring Board &nbsp  &nbsp &nbsp <br>
                  &nbsp  &nbsp &nbsp<input type="radio" class="form-check-input" name="langit" value="Papan Kayu" <?php if($row['langit']=='Papan Kayu') echo 'checked'?>>Papan Kayu &nbsp  &nbsp &nbsp
                  <input type="radio" class="form-check-input" name="langit" value="Ornamen" <?php if($row['langit']=='Ornamen') echo 'checked'?>>Ornamen &nbsp  &nbsp  &nbsp
                  <input type="radio" class="form-check-input" name="langit" value="Teak Wood" <?php if($row['langit']=='Teak Wood') echo 'checked'?>>Teak Wood &nbsp  &nbsp &nbsp
                  <input type="radio" class="form-check-input" name="langit" value="Lain" <?php if($row['langit']=='Lain') echo 'checked'?>>Lain-lain &nbsp  &nbsp &nbsp
                </div>

                <div class="form-group">
                  <label>Lantai</label><br>
                  &nbsp  &nbsp  &nbsp<input type="radio" class="form-check-input" name="lantai" value="Marmer" <?php if($row['lantai']=='Marmer') echo 'checked'?>>Marmer &nbsp  &nbsp  &nbsp
                  <input type="radio" class="form-check-input" name="lantai" value="Keramik" <?php if($row['lantai']=='Keramik') echo 'checked'?>>Keramik &nbsp  &nbsp &nbsp
                  <input type="radio" class="form-check-input" name="lantai" value="Vinil" <?php if($row['lantai']=='Vinil') echo 'checked'?>>Vinil &nbsp  &nbsp &nbsp
                  <input type="radio" class="form-check-input" name="lantai" value="Granit" <?php if($row['lantai']=='Granit') echo 'checked'?>>Granit &nbsp  &nbsp  &nbsp
                  <input type="radio" class="form-check-input" name="lantai" value="Lantai Beton" <?php if($row['lantai']=='Lantai Beton') echo 'checked'?>>Lantai Beton &nbsp  &nbsp &nbsp 
                  <input type="radio" class="form-check-input" name="lantai" value="Ubin Pc" <?php if($row['lantai']=='Ubin Pc') echo 'checked'?>>Ubin Pc &nbsp  &nbsp &nbsp
                  <input type="radio" class="form-check-input" name="lantai" value="Parkit" <?php if($row['lantai']=='Parkit') echo 'checked'?>>Parkit &nbsp  &nbsp &nbsp
                  <br>&nbsp  &nbsp &nbsp
                  <input type="radio" class="form-check-input" name="lantai" value="Papan Kayu" <?php if($row['lantai']=='Papan Kayu') echo 'checked'?>>Papan Kayu &nbsp  &nbsp &nbsp
                  <input type="radio" class="form-check-input" name="lantai" value="Teraso" <?php if($row['lantai']=='Teraso') echo 'checked'?>>Teraso &nbsp  &nbsp &nbsp
                  <input type="radio" class="form-check-input" name="lantai" value="Kaca/Glassblock" <?php if($row['lantai']=='Kaca/Glassblock') echo 'checked'?>>Kaca/Glassblock &nbsp  &nbsp  &nbsp
                  <input type="radio" class="form-check-input" name="lantai" value="Multipleks" <?php if($row['lantai']=='Multipleks') echo 'checked'?>>Multipleks &nbsp  &nbsp  &nbsp
                  <input type="radio" class="form-check-input" name="lantai" value="Granito" <?php if($row['lantai']=='Granito') echo 'checked'?>>Granito &nbsp  &nbsp  &nbsp
                  <input type="radio" class="form-check-input" name="lantai" value="Lain" <?php if($row['lantai']=='Lain') echo 'checked'?>>Lain-lain &nbsp  &nbsp &nbsp
                </div>

                <br><h6>Komponen Fasilitas</h6>
                <div class="form-group">
                  <label>Pagar</label><br>
                  &nbsp  &nbsp  &nbsp<input type="radio" class="form-check-input" name="pagar" value="Beton" <?php if($row['pagar']=='Beton') echo 'checked'?>>Beton &nbsp  &nbsp  &nbsp
                  <input type="radio" class="form-check-input" name="pagar" value="Baja" <?php if($row['pagar']=='Baja') echo 'checked'?>>Baja &nbsp  &nbsp &nbsp
                  <input type="radio" class="form-check-input" name="pagar" value="Kayu" <?php if($row['pagar']=='Kayu') echo 'checked'?>>Kayu &nbsp  &nbsp &nbsp
                  <input type="radio" class="form-check-input" name="pagar" value="Bata/Betako" <?php if($row['pagar']=='Bata/Betako') echo 'checked'?>>Bata/Betako &nbsp  &nbsp  &nbsp
                  <input type="radio" class="form-check-input" name="pagar" value="Besi Cor" <?php if($row['pagar']=='Besi Cor') echo 'checked'?>>Besi Cor &nbsp  &nbsp &nbsp <br>
                  &nbsp  &nbsp &nbsp<input type="radio" class="form-check-input" name="pagar" value="Batu" <?php if($row['pagar']=='Batu') echo 'checked'?>>Batu &nbsp  &nbsp &nbsp
                  <input type="radio" class="form-check-input" name="pagar" value="Besi Tempa" <?php if($row['pagar']=='Besi Tempa') echo 'checked'?>>Besi Tempa &nbsp  &nbsp  &nbsp
                  <input type="radio" class="form-check-input" name="pagar" value="Pipa Besi" <?php if($row['pagar']=='Pipa Besi') echo 'checked'?>>Pipa Besi &nbsp  &nbsp &nbsp
                  <input type="radio" class="form-check-input" name="pagar" value="Lain" <?php if($row['pagar']=='Lain') echo 'checked'?>>Lain-lain &nbsp  &nbsp &nbsp
                </div>

                <div class="form-group">
                  <label>Panjang Pagar</label>
                  <input type="text" name="panjangpagar" placeholder="m" class="form-control" value="<?php echo $row['panjangpagar']; ?>">
                </div>

                <div class="form-group">
                  <label>Luas Carport/Parkir</label>
                  <input type="text" name="parkir" placeholder=" p x l = m2" class="form-control" value="<?php echo $row['parkir']; ?>">
                </div>

                <div class="form-group">
                  <label>Pintu/Jendela</label><br>
                  &nbsp  &nbsp  &nbsp<input type="radio" class="form-check-input" name="pintu" value="Kayu" <?php if($row['pintu']=='Kayu') echo 'checked'?>>Kayu &nbsp  &nbsp  &nbsp
                  <input type="radio" class="form-check-input" name="pintu" value="Aluminium" <?php if($row['pintu']=='Aluminium') echo 'checked'?>>Aluminium &nbsp  &nbsp  &nbsp
                  <input type="radio" class="form-check-input" name="pintu" value="Lain" <?php if($row['pintu']=='Lain') echo 'checked'?>>Lain-lain &nbsp  &nbsp &nbsp
                </div>

                <div class="form-group">
                  <label>Fasiilitas</label><br>
                  &nbsp  &nbsp  &nbsp<input type="checkbox" class="form-check-input" name="fasilitasrumah[]" value="Listrik" <?php if($row['fasilitasrumah']=='Listrik') echo 'checked'?>>Listrik &nbsp  &nbsp  &nbsp
                  <input type="checkbox" class="form-check-input" name="fasilitasrumah[]" value="Heater" <?php if($row['fasilitasrumah']=='Heater') echo 'checked'?>>Heater &nbsp  &nbsp &nbsp
                  <input type="checkbox" class="form-check-input" name="fasilitasrumah[]" value="Air Bersih (PAM)" <?php if($row['fasilitasrumah']=='Air Bersih (PAM)') echo 'checked'?>>Air Bersih (PAM) &nbsp  &nbsp &nbsp
                  <input type="checkbox" class="form-check-input" name="fasilitasrumah[]" value="Kolam Renang" <?php if($row['fasilitasrumah']=='Kolam Renang') echo 'checked'?>>Kolam Renang &nbsp  &nbsp  &nbsp
                  <input type="checkbox" class="form-check-input" name="fasilitasrumah[]" value="Telepon" <?php if($row['fasilitasrumah']=='Telepon') echo 'checked'?>>Telepon &nbsp  &nbsp &nbsp <br>
                  &nbsp  &nbsp &nbsp<input type="checkbox" class="form-check-input" name="fasilitasrumah[]" value="Sumur Gali" <?php if($row['fasilitasrumah']=='Sumur Gali') echo 'checked'?>>Sumur Gali &nbsp  &nbsp &nbsp
                  <input type="checkbox" class="form-check-input" name="fasilitasrumah[]" value="Gas" <?php if($row['fasilitasrumah']=='Gas') echo 'checked'?>>Gas Tempa &nbsp  &nbsp  &nbsp
                  <input type="checkbox" class="form-check-input" name="fasilitasrumah[]" value="Sumur Petek" <?php if($row['fasilitasrumah']=='Sumur Petek') echo 'checked'?>>Sumur Petek &nbsp  &nbsp &nbsp
                  <input type="checkbox" class="form-check-input" name="fasilitasrumah[]" value="AC" <?php if($row['fasilitasrumah']=='AC') echo 'checked'?>>AC &nbsp  &nbsp &nbsp
                  <input type="checkbox" class="form-check-input" name="fasilitasrumah[]" value="Lain" <?php if($row['fasilitasrumah']=='Lain') echo 'checked'?>>Lain-lain &nbsp  &nbsp &nbsp
                </div>

                <div class="form-group">
                  <label>Kondisi Fasilitas Umum</label><br>
                  &nbsp  &nbsp  &nbsp<input type="radio" class="form-check-input" name="umum" value="Baik Sekali" <?php if($row['umum']=='Baik Sekali') echo 'checked'?>>Baik Sekali &nbsp  &nbsp  &nbsp
                  <input type="radio" class="form-check-input" name="umum" value="Baik" <?php if($row['umum']=='Baik') echo 'checked'?>>Baik &nbsp  &nbsp  &nbsp
                  <input type="radio" class="form-check-input" name="umum" value="Sedang" <?php if($row['umum']=='Sedang') echo 'checked'?>>Sedang &nbsp  &nbsp  &nbsp
                  <input type="radio" class="form-check-input" name="umum" value="Jelek" <?php if($row['umum']=='Jelek') echo 'checked'?>>Jelek &nbsp  &nbsp  &nbsp
                  <input type="radio" class="form-check-input" name="umum" value="Jelek Sekali" <?php if($row['umum']=='Jelek Sekali') echo 'checked'?>>Jelek Sekali &nbsp  &nbsp &nbsp
                </div>

                <div class="form-group">
                  <label>Survei Biaya Bangunan</label>
                  <input type="text" name="surveibiaya" placeholder="Sumber, Rp" class="form-control" value="<?php echo $row['surveibiaya']; ?>">
                </div>

                <div class="form-group">
                  <label>Kesimpulan Petugas untuk Biaya Bangunan</label>
                  <input type="text" name="kesimpulan" placeholder="Rp" class="form-control" value="<?php echo $row['kesimpulan']; ?>">
                </div>

                <div class="form-group">
                  <label>Keterangan</label>
                  <textarea class="form-control" name="ket" placeholder="" rows="4"> <?php echo $row['ket'];?></textarea>
                </div>

                <div class="mb-3">
                <label class="form-label">Foto Tampak Depan</label>
                <input type="file" name="pas_foto" class="form-control">
                <br>
                <?php 
                if ($row['foto_depan'] == "") { ?>
                  <img src="https://via.placeholder.com/500x500.png?text=PAS+FOTO+SISWA" style="width:100px;height:100px;">
                <?php }else{ ?>
                  <img src="images/<?php echo $row['foto_depan']; ?>" style="width:100px;height:100px;">
                <?php } ?>
                </div>

                <button type="submit" class="btn btn-success">SIMPAN</button>
                <a href="datanonpertanian1.php" class="btn btn-danger">BATAL</a> 

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