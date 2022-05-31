<?php 
include 'koneksi.php';
if (isset($_GET['id'])) {
  if ($_GET['id'] != "") {
    
    $id = $_GET['id'];

    $query = mysqli_query($mysqli,"SELECT * FROM pertanian WHERE id='$id'");
    $row = mysqli_fetch_array($query);

  }else{
    header("location:index.php");
  }
}else{
  header("location:index.php");
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
    <title>Pertanian</title>
  </head>

  <body>
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
              <form action="edit-pertanian1.php" method="POST" enctype="multipart/form-data">
                
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
                  &nbsp  &nbsp  &nbsp<input type="radio" class="form-check-input" name="status" value="HM" 
                  <?php if($row['status']=='HM') echo 'checked'?>>HM &nbsp  &nbsp  &nbsp
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
                  <input type="text" name="tgl" placeholder="01/01/2022" class="form-control" 
                  value="<?php echo $row['tgl']; ?>">
                </div>

                <div class="form-group">
                  <label>Harga Jual Beli</label>
                  <input type="text" name="harga" placeholder="Rp" class="form-control" 
                  value="<?php echo $row['harga']; ?>">
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
                  &nbsp  &nbsp  &nbsp<input type="radio" class="form-check-input" name="bentuk" 
                  value="Persegi/Normal" <?php if($row['bentuk']=='Persegi/Normal') echo 'checked'?>>Persegi/Normal &nbsp  &nbsp  &nbsp
                  <input type="radio" class="form-check-input" name="bentuk"
                  value="Tidak Beraturan" <?php if($row['bentuk']=='Tidak Beraturan') echo 'checked'?>>Tidak Beraturan &nbsp  &nbsp  &nbsp
                  <input type="radio" class="form-check-input" name="bentuk" value="lain"  <?php if($row['bentuk']=='lain') echo 'checked'?>>lain
                </div>

                <div class="form-group">
                  <label>Kemiringan Tanah</label><br>
                  &nbsp  &nbsp  &nbsp<input type="radio" class="form-check-input" name="miring" value="0-8%" <?php if($row['miring']=='0-8%') echo 'checked'?>>0-8% &nbsp  &nbsp  &nbsp
                  <input type="radio" class="form-check-input" name="miring" value="8-15%" <?php if($row['miring']=='8-15%') echo 'checked'?>>8-15% &nbsp  &nbsp &nbsp
                  <input type="radio" class="form-check-input" name="miring" value="15-40%" <?php if($row['miring']=='15-40%') echo 'checked'?>>15-40% &nbsp  &nbsp &nbsp
                  <input type="radio" class="form-check-input" name="miring" value=">40%" <?php if($row['miring']=='>40%') echo 'checked'?>>40%
                </div>

                <div class="form-group">
                  <label>Jenis Komoditi</label><br>
                  &nbsp  &nbsp  &nbsp<input type="radio" class="form-check-input" name="komoditi" value="Padi" <?php if($row['komoditi']=='Padi') echo 'checked'?>>Padi &nbsp  &nbsp  &nbsp
                  <input type="radio" class="form-check-input" name="komoditi" value="Tanaman Keras" <?php if($row['komoditi']=='Tanaman Keras') echo 'checked'?>>Tanaman Keras &nbsp  &nbsp &nbsp
                </div>

                <div class="form-group">
                  <label>Kesesuaian Tanah Terhadap Komoditi</label><br>
                  &nbsp  &nbsp  &nbsp<input type="radio" class="form-check-input" name="kesesuaian" value="Sangat Sesuai" <?php if($row['kesesuaian']=='Sangat Sesuai') echo 'checked'?>>Sangat Sesuai &nbsp  &nbsp  &nbsp
                  <input type="radio" class="form-check-input" name="kesesuaian" value="Sesuai" <?php if($row['kesesuaian']=='Sesuai') echo 'checked'?>>Sesuai &nbsp  &nbsp &nbsp
                  <input type="radio" class="form-check-input" name="kesesuaian" value="Kurang Sesuai" <?php if($row['kesesuaian']=='Kurang Sesuai') echo 'checked'?>>Kurang Sesuai
                </div>

                <br><h6>C. Data Lingkungan</h6>
                <div class="form-group">
                  <label>Kelas Jalan</label><br>
                  &nbsp  &nbsp  &nbsp<input type="radio" class="form-check-input" name="kelas" value="Arteri" <?php if($row['kelas']=='Arteri') echo 'checked'?>>Arteri &nbsp  &nbsp  &nbsp
                  <input type="radio" class="form-check-input" name="kelas" value="Kolektor" <?php if($row['kelas']=='Kolektor') echo 'checked'?>>Kolektor &nbsp  &nbsp &nbsp
                  <input type="radio" class="form-check-input" name="kelas" value="Lokal" <?php if($row['kelas']=='Lokal') echo 'checked'?>>Lokal &nbsp  &nbsp &nbsp
                  <input type="radio" class="form-check-input" name="kelas" value="Setapak" <?php if($row['kelas']=='Setapak') echo 'checked'?>>Setapak &nbsp  &nbsp &nbsp
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
                  <label>Irigasi</label><br>
                  &nbsp  &nbsp  &nbsp<input type="radio" class="form-check-input" name="irigasi" value="Sangat Baik" <?php if($row['irigasi']=='Sangat Baik') echo 'checked'?>>Sangat Baik &nbsp  &nbsp  &nbsp
                  <input type="radio" class="form-check-input" name="irigasi" value="Baik" <?php if($row['irigasi']=='Baik') echo 'checked'?>>Baik &nbsp  &nbsp &nbsp
                  <input type="radio" class="form-check-input" name="irigasi" value="Cukup" <?php if($row['irigasi']=='Cukup') echo 'checked'?>>Cukup &nbsp  &nbsp &nbsp
                  <input type="radio" class="form-check-input" name="irigasi" value="Kurang" <?php if($row['irigasi']=='Kurang') echo 'checked'?>>Kurang &nbsp  &nbsp &nbsp
                </div>

                <div class="form-group">
                  <label>Drainase</label><br>
                  &nbsp  &nbsp  &nbsp<input type="radio" class="form-check-input" name="drainase" value="Sangat Baik" <?php if($row['drainase']=='Sangat Baik') echo 'checked'?>>Sangat Baik &nbsp  &nbsp  &nbsp
                  <input type="radio" class="form-check-input" name="drainase" value="Baik"<?php if($row['drainase']=='Baik') echo 'checked'?>>Baik &nbsp  &nbsp &nbsp
                  <input type="radio" class="form-check-input" name="drainase" value="Cukup" <?php if($row['drainase']=='Cukup') echo 'checked'?>>Cukup &nbsp  &nbsp &nbsp
                  <input type="radio" class="form-check-input" name="drainase" value="Kurang" <?php if($row['drainase']=='Kurang') echo 'checked'?>>Kurang &nbsp  &nbsp &nbsp
                </div>

                <div class="form-group">
                  <label>Utilitas</label><br>
                  &nbsp  &nbsp  &nbsp<input type="radio" class="form-check-input" name="utilitas" value="Listrik" <?php if($row['utilitas']=='Listrik') echo 'checked'?>>Listrik &nbsp  &nbsp  &nbsp
                  <input type="radio" class="form-check-input" name="utilitas" value="lain" <?php if($row['utilitas']=='lain') echo 'checked'?>>lain &nbsp  &nbsp &nbsp
                </div>

                <br><h6>D. Keterangan</h6>
                <div class="form-group">
                  <label>Keterangan</label>
                  <textarea class="form-control" name="ket" placeholder="" rows="4"><?php echo $row['ket']; ?></textarea>
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

                <button type="submit" class="btn btn-success">Update</button>
                <a href="datapertanian1.php" class="btn btn-danger">Batal</a> 
                

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