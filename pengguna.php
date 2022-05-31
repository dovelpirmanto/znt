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
    <title>Pengguna</title>
  </head>

  <body>

    <div class="container" style="margin-top: 20px">
      <div class="row">
        <div class="col-md-12">
          <img src="images/SINTA.jpg" width="730" height="220"><br>
          <div class="card">
            <div class="card-header">
              DATA PENGGUNA
            </div>
            <div class="card-body">
              <a href="formtambahpengguna.php" class="btn btn-md btn-warning" style="margin-bottom: 10px">Tambah Data</a>
              <a href="dashboard_admin.php" class="btn btn-md btn-dark" style="margin-bottom: 10px">Dashboard</a>
              <table class="table-responsive" id="myTable" border="1" bordercolor="gainsboro">
                <thead>
                  <tr>
                    <th>NO.</th>
                    <th>Username</th>
                    <th>Password</th>
                    <th>Level</th>
                    <th>Aksi</th>
                  </tr>
                </thead>
                <tbody>
                  <?php 
                      include('koneksi.php');
                      $no = 1;
                      $query = mysqli_query($mysqli,"SELECT * FROM pengguna");
                      while($row = mysqli_fetch_array($query)){
                  ?>

                  <tr>
                      <td><?php echo $row['id'] ?></td>
                      <td><?php echo $row['username'] ?></td>
                      <td><?php echo $row['password'] ?></td>
                      <td><?php echo $row['level'] ?></td>
                      
                      <td class="text-center">
                        <a href="formeditpengguna.php?id=<?php echo $row['id'] ?>" class="btn btn-sm btn-primary">EDIT</a>
                        <a href="hapus-pengguna.php?id=<?php echo $row['id'] ?>" class="btn btn-sm btn-danger">HAPUS</a>
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