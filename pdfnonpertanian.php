<?php
include('koneksi.php');
require_once("dompdf/autoload.inc.php");
if (isset($_GET['id'])) {
  if ($_GET['id'] != "") {
    
    $id = $_GET['id'];

    $query = mysqli_query($mysqli,"SELECT * FROM nonpertanian WHERE id='$id'");
    $row = mysqli_fetch_array($query);

  }else{
    header("location:index.php");
  }
}else{
  header("location:index.php");
}
use Dompdf\Dompdf;
require_once("dompdf/autoload.inc.php");
$dompdf = new Dompdf();
$query = mysqli_query($mysqli,"SELECT * from nonpertanian WHERE id='$id'");
$html = '<center>FORMULIR SURVEI NILAI TANAH NON PERTANIAN</font></center><hr/><br><br><br>';
$html .= '<table border="" width="100%">
 <tr>
 <td><b>A. Data Administrasi/Harga Tanah</b></td>
 <td><td>
 <td></td>
 </tr>
 <tr>
 <td>Id</td>
 <td>:<td>
 <td>'.$row['id'].'</td>
 </tr>
 <tr>
 <td>Alamat</td>
 <td>:<td>
 <td>'.$row['alamat'].'</td>
 </tr>
 <tr>
 <td>Koordinat TM-3 (X)</td>
 <td>:<td>
 <td>'.$row['x'].'</td>
 </tr>
 <tr>
 <td>Koordinat TM-3 (Y)</td>
 <td>:<td>
 <td>'.$row['y'].'</td>
 </tr>
 <tr>
 <td>Status Kepemilikan</td>
 <td>:<td>
 <td>'.$row['status'].'</td>
 </tr>
 <tr>
 <td>Jenis Data</td>
 <td>:<td>
 <td>'.$row['jenis'].'</td>
 </tr>
 <tr>
 <td>Harga Jual Beli</td>
 <td>:<td>
 <td>Rp '.$row['harga'].'</td>
 </tr>
 <tr>
 <td>Responden</td>
 <td>:<td>
 <td>'.$row['responden'].'</td>
 </tr>
 <tr>
 <td>Data Responden</td>
 <td>:<td>
 <td>'.$row['dataresponden'].'</td>
 </tr>
 <tr>
 <td>Tanggal Transaksi/Penawaran</td>
 <td>:<td>
 <td>'.$row['tgl'].'</td>
 </tr>
 <tr>
 <td></td>
 <td></td>
 <td></td>
 </tr>
 <tr>
 <td><b>B. Data Fisik Tanah</b></td>
 <td><td>
 <td></td>
 </tr>
 <tr>
 <td>Luas Tanah</td>
 <td>:<td>
 <td>'.$row['luas'].' M<sup>2</sup></td>
 </tr>
 <tr>
 <td>Lebar Depan</td>
 <td>:<td>
 <td>'.$row['lebar'].' M</td>
 </tr>
 <tr>
 <td>Panjang Kebelakang</td>
 <td>:<td>
 <td>'.$row['panjang'].'</td>
 </tr>
 <tr>
 <td>Bentuk Tanah</td>
 <td>:<td>
 <td>'.$row['bentuk'].'</td>
 </tr>
 <tr>
 <td>Elevasi dari Jalan</td>
 <td>:<td>
 <td>'.$row['elevasi'].'</td>
 </tr>
 <tr>
 <td>Letak Tanah</td>
 <td>:<td>
 <td>'.$row['letak'].'</td>
 </tr>
 <tr>
 <td><b>C. Data Lingkungan</b></td>
 <td><td>
 <td></td>
 </tr>
 <tr>
 <td>Kelas Jalan</td>
 <td>:<td>
 <td>'.$row['kelas'].'</td>
 </tr>
 <tr>
 <td>Lebar Jalan</td>
 <td>:<td>
 <td>'.$row['lebarjalan'].'</td>
 </tr>
 <tr>
 <td>Aksebilitas</td>
 <td>:<td>
 <td>'.$row['aksebilitas'].'</td>
 </tr>
 <tr>
 <td>Drainase</td>
 <td>:<td>
 <td>'.$row['drainase'].'</td>
 </tr>
 <tr>
 <td>Utilitas</td>
 <td>:<td>
 <td>'.$row['utilitas'].'</td>
 </tr>
 <tr>
 <td>Fasilitas</td>
 <td>:<td>
 <td>'.$row['fasilitas'].'</td>
 </tr>
 <tr>
 <td>Zoning/Peruntukan Kawasan</td>
 <td>:<td>
 <td>'.$row['zoning'].'</td>
 </tr>
 <tr>
 <td><b>D. Data Bangunan</b></td>
 <td><td>
 <td></td>
 </tr>
 <tr>
 <td>Luas Bangunan 1</td>
 <td>:<td>
 <td>'.$row['luasbangunan1'].'</td>
 </tr>
 <tr>
 <td>Luas Bangunan 2</td>
 <td>:<td>
 <td>'.$row['luasbangunan2'].'</td>
 </tr>
 <tr>
 <td>Luas Bangunan</td>
 <td>:<td>
 <td>'.$row['luasbangunan'].'</td>
 </tr>
 <tr>
 <td>Luas Bangunan Total</td>
 <td>:<td>
 <td>'.$row['luastotal'].'</td>
 </tr>
 <tr>
 <td>Jenis Bangunan</td>
 <td>:<td>
 <td>'.$row['jenisbangunan'].'</td>
 </tr>
 <tr>
 <td>Jumlah Lantai</td>
 <td>:<td>
 <td>'.$row['jumlahlantai'].'</td>
 </tr>
 <tr>
 <td>Luas Bangunan Lantai Dasar</td>
 <td>:<td>
 <td>'.$row['luasdasar'].'</td>
 </tr>
 <tr>
 <td>Luas Bangunan Lantai 2</td>
 <td>:<td>
 <td>'.$row['luaslantai2'].'</td>
 </tr>
 <tr>
 <td>Luas Bangunan Lantai</td>
 <td>:<td>
 <td>'.$row['luaslantai'].'</td>
 </tr>
 <tr>
 <td>Tahun Pembuatan</td>
 <td>:<td>
 <td>'.$row['pembuatan'].'</td>
 </tr>
 <tr>
 <td>Tahun Renovasi</td>
 <td>:<td>
 <td>'.$row['renovasi'].'</td>
 </tr>
 <tr>
 <td><b>Komponen Struktur</b></td>
 <td>:<td>
 <td></td>
 </tr>
 <tr>
 <td>a. Konstruksi/Kerangka Atas</td>
 <td>:<td>
 <td>'.$row['atas'].'</td>
 </tr>
 <tr>
 <td>b. Konstruksi/Kerangka BawahLu</td>
 <td>:<td>
 <td>'.$row['bawah'].'</td>
 </tr>
 <tr>
 <td><b>Komponen Material</b></td>
 <td><td>
 <td></td>
 </tr>
 <tr>
 <td>Atap</td>
 <td>:<td>
 <td>'.$row['atap'].'</td>
 </tr>
 <tr>
 <td>Dinding</td>
 <td>:<td>
 <td>'.$row['dinding'].'</td>
 </tr>
 <tr>
 <td>Langit-langit</td>
 <td>:<td>
 <td>'.$row['langit'].'</td>
 </tr>
 <tr>
 <td>Lantai</td>
 <td>:<td>
 <td>'.$row['lantai'].'</td>
 </tr>
 <tr>
 <td><b>Komoponen Fasilitas</b></td>
 <td><td>
 <td></td>
 </tr>
 <tr>
 <td>Pagar</td>
 <td>:<td>
 <td>'.$row['pagar'].'</td>
 </tr>
 <tr>
 <td>Panjang Pagar</td>
 <td>:<td>
 <td>'.$row['panjangpagar'].'</td>
 </tr>
 <tr>
 <td>Luas Carport/Parkir</td>
 <td>:<td>
 <td>'.$row['parkir'].'</td>
 </tr>
 <tr>
 <td>Pintu/Jendela</td>
 <td>:<td>
 <td>'.$row['pintu'].'</td>
 </tr>
 <tr>
 <td>Fasilitas</td>
 <td>:<td>
 <td>'.$row['fasilitasrumah'].'</td>
 </tr>
 <tr>
 <td>Keadaan Fisik Umumnya</td>
 <td>:<td>
 <td>'.$row['umum'].'</td>
 </tr>
 <tr>
 <td>Survei Biaya Bangunan</td>
 <td>:<td>
 <td>'.$row['surveibiaya'].'</td>
 </tr>
 <tr>
 <td>Kesimpulan</td>
 <td>:<td>
 <td>'.$row['kesimpulan'].'</td>
 </tr>
 <tr>
 <td>Keterangan</td>
 <td>:<td>
 <td>'.$row['ket'].'</td>
 </tr>
 <tr>
 <td>Foto Tampak Depan</td>
 <td>:</td>
 <td></td>
 </tr>

   <?php 
              if ($row["foto_depan"] == "") { ?>
                <img src="https://via.placeholder.com/500x500.png?text=PAS+FOTO+SISWA" style="width:100px;height:100px;">
              <?php }else{ ?>
                <img src="images/<?php echo $row["foto_depan"]; ?>" style="width:100px;height:100px;">
              <?php } ?>

 ';


$html .= "</html>";

$dompdf->loadHtml($html);
// Setting ukuran dan orientasi kertas
$dompdf->setPaper('A4', 'potrait');
// Rendering dari HTML Ke PDF
$dompdf->render();
// Melakukan output file Pdf
$dompdf->stream('NonPertanian.pdf');



?>
