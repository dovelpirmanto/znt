<!DOCTYPE html>
<html lang="en">
<head>
  <title>Dashboard</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet">
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js"></script>
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>
  <style>
          .container{width: 96%; max-width: 960px margin : auto;}
          img {width: 80%; height: auto;}
        </style>
  <link href="images/ATRBPN.png" rel="icon">
</head>
<body class="text-center">

<div>
  <img src="images/SINTA.jpg" width="800px">
</div>
  
<div class="container mt-5">
  <div class="row">

    <div class="col-sm-3">
      <div class="panel panel-success">
        <div class="panel-heading"><h4>Pertanian</h4></div>
        <div class="panel-body"><a href="pertanian1.php" class="btn btn-success">Input</a></div>
        <div class="panel-body"><a href="datapertanian1.php" class="btn btn-success">Data Pertanian</a></div>
      </div>
    </div>

    <div class="col-sm-3">
      <div class="panel panel-info">
        <div class="panel-heading"><h4>Non Pertanian</h4></div>
        <div class="panel-body"><a href="nonpertanian1.php" class="btn btn-info">Input</a></div>
        <div class="panel-body"><a href="datanonpertanian1.php" class="btn btn-info">Data Non Pertanian</a></div>
      </div>
    </div>

    <div class="col-sm-3">
      <div class="panel panel-danger">
        <div class="panel-heading"><h4>Pengguna</h4></div>
        <div class="panel-body"><a href="pengguna.php" class="btn btn-danger">Kelola Pengguna</a></div>
      </div>
    </div>

    <div class="col-sm-3">
      <div class="panel panel-warning">
        <div class="panel-heading"><h4>Logout</h4></div>
        <div class="panel-body"><a href="logout.php" class="btn btn-warning">Keluar</a></div>
      </div>
    </div>

  </div>
</div>

</body>
</html>