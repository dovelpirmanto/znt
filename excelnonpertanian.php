<?php
header("Content-type: application/vnd-ms-excel");
header("Content-Disposition: attachment; filename=Data Non Pertanian.xls");
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
                  <th>Tanggal Transaksi</th>
                  <th>Harga Jual Beli</th>
                  <th>Responden</th>
                  <th>Data Responden</th>
                  <th>Luas Tanah</th>
                  <th>Lebar Depan</th>
                  <th>Panjang Kebelakang</th>
                  <th>Bentuk Tanah</th>
                  <th>Elevasi dari Jalan</th>
                  <th>Letak Tanah</th>
                  <th>Kelas Jalan</th>
                  <th>Lebar Jalan</th>
                  <th>Aksebilitas</th>
                  <th>Drainase</th>
                  <th>Utilitas</th>
                  <th>Fasilitas</th>
                  <th>Zoning</th>
                  <th>Luas Bangunan 1</th>
                  <th>Luas Bangunan 2</th>
                  <th>Luas Bangunan</th>
                  <th>Luas Bangunan Total</th>
                  <th>Jenis Bangunan</th>
                  <th>Jumlah Lantai</th>
                  <th>Luas Bangunan Lantai Dasar</th>
                  <th>Luas Bangunan Lantai 2</th>
                  <th>Luas Bangunan Lantai</th>
                  <th>Tahun Pembuatan</th>
                  <th>Tahun Renovasi</th>
                  <th>Kostruksi Atas</th>
                  <th>Kostruksi Bawah</th>
                  <th>Atap</th>
                  <th>Dinding</th>
                  <th>Langit-langit</th>
                  <th>Lantai</th>
                  <th>Pagar</th>
                  <th>Panjang Pagar</th>
                  <th>Luas Carport/Parkir</th>
                  <th>Pintu/Jendela</th>
                  <th>Fasilitas</th>
                  <th>Keadaan Fisik Umumnya</th>
                  <th>Survei Biaya Bangunan</th>
                  <th>Kesimpulan Petugas untuk Biaya Bangunan</th>
                  <th>Keterangan</th>
                  
            </tr>           
          
            <?php 
            $sql="SELECT * FROM nonpertanian";
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
            <td><?php echo $data['tgl']; ?></td>
            <td><?php echo $data['harga']; ?></td>
            <td><?php echo $data['responden'];?></td>
            <td><?php echo $data['dataresponden'];?></td>
            <td><?php echo $data['luas'];?></td>
            <td><?php echo $data['lebar']; ?></td>
            <td><?php echo $data['panjang'];?></td>
            <td><?php echo $data['bentuk'];?></td>
            <td><?php echo $data['elevasi'];?></td>
            <td><?php echo $data['letak']; ?></td>
            <td><?php echo $data['kelas'];?></td>
            <td><?php echo $data['lebarjalan']; ?></td>
            <td><?php echo $data['aksebilitas'];?></td>
            <td><?php echo $data['drainase']; ?></td>
            <td><?php echo $data['utilitas'];?></td>
            <td><?php echo $data['fasilitas'];?></td>
            <td><?php echo $data['zoning'];?></td>
            <td><?php echo $data['luasbangunan1']; ?></td>
            <td><?php echo $data['luasbangunan2'];?></td>
            <td><?php echo $data['luasbangunan'];?></td>
            <td><?php echo $data['luastotal'];?></td>
            <td><?php echo $data['Jenisbangunan']; ?></td>
            <td><?php echo $data['jumlahlantai'];?></td>
            <td><?php echo $data['luasdasar'];?></td>
            <td><?php echo $data['luaslantai2'];?></td>
            <td><?php echo $data['luaslantai']; ?></td>
            <td><?php echo $data['pembuatan'];?></td>
            <td><?php echo $data['renovasi'];?></td>
            <td><?php echo $data['atas'];?></td>
            <td><?php echo $data['bawah']; ?></td>
            <td><?php echo $data['atap'];?></td>
            <td><?php echo $data['dinding'];?></td>
            <td><?php echo $data['langit'];?></td>
            <td><?php echo $data['pagar']; ?></td>
            <td><?php echo $data['panjangpagar'];?></td>
            <td><?php echo $data['parkir'];?></td>
            <td><?php echo $data['pintu'];?></td>
            <td><?php echo $data['fasilitasrumah']; ?></td>
            <td><?php echo $data['umum'];?></td>
            <td><?php echo $data['surveibiaya'];?></td>
            <td><?php echo $data['kesimpulan'];?></td>
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
