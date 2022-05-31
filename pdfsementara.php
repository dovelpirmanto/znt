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
          <img src="images/SINTA.jpg" width="800" height="220"><br>
          <div class="card">
            <div class="card-body">
              <center><b>FORMULIR SURVEI NILAI TANAH PERTANIAN</b></center><br>
              <form action="edit-pertanian.php" method="POST" enctype="multipart/form-data">
                <table>
                  
                  <tr>
                   <td><b>A. Data Administrasi Tanah</b></td>
                   <td><td>
                   <td></td>
                   </tr>
                   <tr>
                   <td>Id</td>
                   <td>:<td>
                   <td><?php echo $row['id'] ?></td>
                   </tr>
                   <tr>
                   <td>Alamat</td>
                   <td>:<td>
                   <td><?php echo $row['alamat'] ?></td>
                   </tr>
                   <tr>
                   <td>Koordinat TM-3 (X)</td>
                   <td>:<td>
                   <td><?php echo $row['x'] ?></td>
                   </tr>
                   <tr>
                   <td>Koordinat TM-3 (Y)</td>
                   <td>:<td>
                   <td><?php echo $row['y'] ?></td>
                   </tr>
                   <tr>
                   <td>Status Kepemilikan</td>
                   <td>:<td>
                   <td><?php echo $row['status'] ?></td>
                   </tr>
                   <tr>
                   <td>Jenis Data</td>
                   <td>:<td>
                   <td><?php echo $row['jenis'] ?></td>
                   </tr>
                   <tr>
                   <td>Harga Jual Beli</td>
                   <td>:<td>
                   <td><?php echo $row['harga'] ?></td>
                   </tr>
                   <tr>
                   <td>Responden</td>
                   <td>:<td>
                   <td><?php echo $row['responden'] ?></td>
                   </tr>
                   <tr>
                   <td>Data Responden</td>
                   <td>:<td>
                   <td><?php echo $row['dataresponden'] ?></td>
                   </tr>
                   <tr>
                   <td>Tanggal Transaksi/Penawaran</td>
                   <td>:<td>
                   <td><?php echo $row['tgl'] ?></td>
                   </tr>
                   <tr>
                   <td><b>B. Data Fisik Tanah</b></td>
                   <td><td>
                   <td></td>
                   </tr>
                   <tr>
                   <td>Luas Tanah</td>
                   <td>:<td>
                   <td><?php echo $row['luas'] ?> M<sup>2</sup></td>
                   </tr>
                   <tr>
                   <td>Lebar Depan</td>
                   <td>:<td>
                   <td><?php echo $row['lebar'] ?> M</td>
                   </tr>
                   <tr>
                   <td>Panjang Kebelakang</td>
                   <td>:<td>
                   <td><?php echo $row['panjang'] ?></td>
                   </tr>
                   <tr>
                   <td>Bentuk Tanah</td>
                   <td>:<td>
                   <td><?php echo $row['bentuk'] ?></td>
                   </tr>
                   <tr>
                   <td>Kemiringan Tanah</td>
                   <td>:<td>
                   <td><?php echo $row['miring'] ?></td>
                   </tr>
                   <tr>
                   <td>Jenis Komoditi</td>
                   <td>:<td>
                   <td><?php echo $row['komoditi'] ?></td>
                   </tr>
                   <tr>
                   <td>Kesesuaian Tanah Terhadap Komoditi</td>
                   <td>:<td>
                   <td><?php echo $row['kesesuaian'] ?></td>
                   </tr>
                   <tr>
                   <td><b>C. Data Lingkungan</b></td>
                   <td><td>
                   <td></td>
                   </tr>
                   <tr>
                   <td>Kelas Jalan</td>
                   <td>:<td>
                   <td><?php echo $row['kelas'] ?></td>
                   </tr>
                   <tr>
                   <td>Lebar Jalan</td>
                   <td>:<td>
                   <td><?php echo $row['lebarjalan'] ?> M</td>
                   </tr>
                   <tr>
                   <td>Aksebilitas</td>
                   <td>:<td>
                   <td><?php echo $row['aksebilitas'] ?></td>
                   </tr>
                   <tr>
                   <td>Irigasi</td>
                   <td>:<td>
                   <td><?php echo $row['irigasi'] ?></td>
                   </tr>
                   <tr>
                   <td>Drainase</td>
                   <td>:<td>
                   <td><?php echo $row['drainase'] ?></td>
                   </tr>
                   <tr>
                   <td>Utilitas</td>
                   <td>:<td>
                   <td><?php echo $row['utilitas'] ?></td>
                   </tr>
                   <tr>
                   <td>Keterangan</td>
                   <td>:<td>
                   <td><?php echo $row['ket'] ?></td>
                   </tr>
                   <tr>
                   <td>Foto Tampak Depan</td>
                   <td>:</td>
                   <td></td>
                   </tr>


                </table>
                
                <div class="mb-3">
                
                <?php 
                if ($row['foto_depan'] == "") { ?>
                  <img src="https://via.placeholder.com/500x500.png?text=PAS+FOTO+SISWA" style="width:100px;height:100px;">
                <?php }else{ ?>
                  <img src="images/<?php echo $row['foto_depan']; ?>" style="width:400px;height:200px;">
                <?php } ?>
                </div>

                
                

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