<?php 
include 'koneksi.php';
if (isset($_GET['id'])) {
  if ($_GET['id'] != "") {
    
    $id = $_GET['id'];

    $query = mysqli_query($mysqli,"SELECT * FROM pengguna WHERE id='$id'");
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
    <title>Pengguna</title>
  </head>

  <body>
    <div class="container" style="margin-top: 30px">
      <div class="row">
        <div class="col-md-8 offset-md-2">
          <img src="images/SINTA.jpg" width="730" height="220"><br>
          <div class="card">
            <div class="card-header">
              Pengguna
            </div>
            <div class="card-body">
              <form action="edit-pengguna.php" method="POST" enctype="multipart/form-data">
                
                <div class="form-group">
                  <label>id</label>
                  <input type="text" name="id" placeholder="" class="form-control" required="required" value="<?php echo $id ?>" readonly>
                </div>

                <div class="form-group">
                  <label>Username</label>
                  <input type="text" name="username" placeholder="" class="form-control" value="<?php echo $row['username']; ?>">
                </div>

                <div class="form-group">
                  <label>Password</label>
                  <input type="text" name="password" placeholder="" class="form-control" value="<?php echo $row['password']; ?>">
                </div>

                <div class="form-group">
                  <label>Level</label>
                  <input type="text" name="level" placeholder="" class="form-control" value="<?php echo $row['level']; ?>">
                </div>

                <button type="submit" class="btn btn-success">Update</button>
                <a href="dashboard_admin.php" class="btn btn-danger">Batal</a> 
                

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