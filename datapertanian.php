<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css">
    <link rel="stylesheet" href="//cdn.datatables.net/1.10.20/css/jquery.dataTables.min.css">
    <link href="images/ATRBPN.png" rel="icon">
    <style>
          .container{width: 96%; max-width: 960px margin : 0auto;}
          img {width: 100%; height: auto;}
        </style>
    <title>Data Pertanian</title>
  </head>

  <body>

    <div class="container" style="margin-top: 20px">
      <div class="row">
        <div class="col-md-12">
          <img src="images/SINTA.jpg" width="730" height="220"><br>
          <div class="card">
            <div class="card-header">
              DATA PERTANIAN
            </div>
            <div class="card-body">
              <a href="pertanian1.php" class="btn btn-md btn-warning" style="margin-bottom: 10px">Tambah Data</a>
              <a href="excelpertanian.php" class="btn btn-md btn-success" style="margin-bottom: 10px">Eksport Excel</a>
              <a href="Dashboard.php" class="btn btn-md btn-dark" style="margin-bottom: 10px">Dashboard</a>
              <table class="table-responsive" id="myTable" border="1" bordercolor="gainsboro">
                <thead>
                  <tr>
                    <th>NO.</th>
                    <th>Alamat</th>
                    <th>X</th>
                    <th>Y</th>
                    <th>Status</th>
                    <th>Jenis</th>
                    <th>Harga</th>
                    <th>Responden</th>
                    <th>Data Responden</th>
                    <th>Foto Tampak Depan</th>
                    <th>Aksi</th>
                  </tr>
                </thead>
                <tbody>
                  <?php 
                      include('koneksi.php');
                      $no = 1;
                      $query = mysqli_query($mysqli,"SELECT * FROM pertanian");
                      while($row = mysqli_fetch_array($query)){
                  ?>

                  <tr>
                      <td><?php echo $row['id'] ?></td>
                      <td><?php echo $row['alamat'] ?></td>
                      <td><?php echo $row['x'] ?></td>
                      <td><?php echo $row['y'] ?></td>
                      <td><?php echo $row['status'] ?></td>
                      <td><?php echo $row['jenis'] ?></td>
                      <td><?php echo $row['harga'] ?></td>
                      <td><?php echo $row['responden'] ?></td>
                      <td><?php echo $row['dataresponden'] ?></td>
                      <td>
              <?php 
              if ($row['foto_depan'] == "") { ?>
                <img src="https://via.placeholder.com/500x500.png?text=PAS+FOTO+SISWA" style="width:100px;height:100px;">
              <?php }else{ ?>
                <img src="images/<?php echo $row['foto_depan']; ?>" style="width:100px;height:100px;">
              <?php } ?>
            </td>
                      <td class="text-center">
                        <a href="formeditpertanian.php?id=<?php echo $row['id'] ?>" class="btn btn-sm btn-info">EDIT</a>
                        <a href="hapus-pertanian.php?id=<?php echo $row['id'] ?>" class="btn btn-sm btn-danger">HAPUS</a>
                        <a href="pdf.php?id=<?php echo $row['id'] ?>" target="_blank" class="btn btn-sm btn-primary">CETAK</a>
                      </td>
                  </tr>

                <?php } ?>
                </tbody>
              </table>
            </div>
          </div>
      </div>
    </div>

    <script src="https://code.jquery.com/jquery-3.4.1.slim.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js"></script>
    <script src="//cdn.datatables.net/1.10.20/js/jquery.dataTables.min.js"></script>
    <script>
      $(document).ready( function () {
          $('#myTable').DataTable();
      } );
    </script>
  </body>
</html>