<?php
include('koneksi.php');
require_once("dompdf/autoload.inc.php");
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
use Dompdf\Dompdf;
require_once("dompdf/autoload.inc.php");
$dompdf = new Dompdf();
$query = mysqli_query($mysqli,"SELECT * from pertanian WHERE id='$id'");
$html = '<center>FORMULIR SURVEI NILAI TANAH PERTANIAN</font></center><hr/><br><br><br>';
$html .= '<table border="" width="100%">
 <tr>
 <td><b>A. Data Administrasi Tanah</b></td>
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
 <td>Kemiringan Tanah</td>
 <td>:<td>
 <td>'.$row['miring'].'</td>
 </tr>
 <tr>
 <td>Jenis Komoditi</td>
 <td>:<td>
 <td>'.$row['komoditi'].'</td>
 </tr>
 <tr>
 <td>Kesesuaian Tanah Terhadap Komoditi</td>
 <td>:<td>
 <td>'.$row['kesesuaian'].'</td>
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
 <td>'.$row['lebarjalan'].' M</td>
 </tr>
 <tr>
 <td>Aksebilitas</td>
 <td>:<td>
 <td>'.$row['aksebilitas'].'</td>
 </tr>
 <tr>
 <td>Irigasi</td>
 <td>:<td>
 <td>'.$row['irigasi'].'</td>
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
 <td>Keterangan</td>
 <td>:<td>
 <td>'.$row['ket'].'</td>
 </tr>
 <tr>
 <td>Foto Tampak Depan</td>
 <td>:</td>
 <td><img src="../images/'.$row['foto_depan'].'"></td>
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
$dompdf->stream('Pertanian.pdf');



?>
