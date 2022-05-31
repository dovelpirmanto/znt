<?php
header("Content-type: application/vnd-ms-excel");
header("Content-Disposition: attachment; filename=Data Pertanian.xls");
//parameter koneksi
$host="localhost";
$user="root";
$pass="";
$db="znt";
$koneksi=mysqli_connect($host, $user, $pass, $db);
if($koneksi==false):
      die("Gagal melakukan koneksi".mysqli_connect_error());
endif;

?>
<html>
<head>
      <title>Export Database MySQL ke Excel Menggunakan PHP - ROO93</title>
</head>
<body>

<table border="1">
             <tr>
                  <th>No</th>
                  <th>Alamat</th>
                  <th>X</th>
                  <th>Y</th>
                  <th>Status Kepemilikan</th>
                  <th>Jenis Data</th>
                  <th>Harga Jual Beli</th>
                  <th>Responden</th>
                  <th>Data Responden</th>
                  <th>Tanggal</th>
                  <th>Luas Tanah</th>
                  <th>Panjang Depan</th>
                  <th>Lebar Kebelakang</th>
                  <th>Bentuk Tanah</th>
                  <th>Kemiring Tanah</th>
                  <th>Jenis Komoditi</th>
                  <th>Kesesuaian Tanah Terhadap Komoditi</th>
                  <th>Kelas Jalan</th>
                  <th>Lebar Jalan</th>
                  <th>Aksebilitas</th>
                  <th>Irigasi</th>
                  <th>Drainase</th>
                  <th>Utilitas</th>
                  <th>Keterangan</th>
                 
            </tr>           
          
            <?php 
            $sql="SELECT * FROM pertanian";
            $perintah=mysqli_query($koneksi,$sql);           
            if(mysqli_num_rows($perintah)>0){
                  while($data=mysqli_fetch_array($perintah)){
            ?>
      
      <tr>
            <td><?php echo $data['id']; ?></td>
            <td><?php echo $data['alamat'];?></td>
            <td><?php echo $data['x'];?></td>
            <td><?php echo $data['y']; ?></td>
            <td><?php echo $data['status'];?></td>
            <td><?php echo $data['jenis'];?></td>
            <td><?php echo $data['harga']; ?></td>
            <td><?php echo $data['responden'];?></td>
            <td><?php echo $data['dataresponden'];?></td>
            <td><?php echo $data['tgl']; ?></td>
            <td><?php echo $data['luas'];?></td>
            <td><?php echo $data['panjang'];?></td>
            <td><?php echo $data['lebar']; ?></td>
            <td><?php echo $data['bentuk'];?></td>
            <td><?php echo $data['miring'];?></td>
            <td><?php echo $data['komoditi']; ?></td>
            <td><?php echo $data['kesesuaian'];?></td>
            <td><?php echo $data['kelas'];?></td>
            <td><?php echo $data['lebarjalan']; ?></td>
            <td><?php echo $data['aksebilitas'];?></td>
            <td><?php echo $data['irigasi'];?></td>
            <td><?php echo $data['drainase']; ?></td>
            <td><?php echo $data['utilitas'];?></td>
            <td><?php echo $data['ket'];?></td>

            
      </tr>
            <?php      
            }

            }else{
                die("Belum ada data");
            }

          

            ?>
</table>
</body>
</html>
