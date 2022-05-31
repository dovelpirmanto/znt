<?php
include('koneksi.php');
$query = mysqli_query($mysqli,"SELECT * FROM pertanian");
    $row = mysqli_fetch_array($query);
?>
<?php
$html='
<!doctype html>
<html lang="en">
<head>
  <meta charset="utf-8">
</head>
<body>

  <table>
      <tr>
        <th>No.</th>
        <th>Name</th>
        <th>Alama</th>
      </tr>
      <tr>
        <td>'.$row['foto_depan'].'</td>
        <td><img src="images/<?php echo $row["foto_depan"]; ?>"</td>
        <td>3</td>
      </tr>
      <tr>
        <td>1</td>
        <td>2</td>
        <td>3</td>
      </tr>
  </table>
</body>
</html>';

require 'dompdf\dompdf\vendor\autoload.php';
use Dompdf\Dompdf;
$dompdf = new Dompdf();
$dompdf->loadHtml($html);
// Setting ukuran dan orientasi kertas
$dompdf->setPaper('A4', 'potrait');
// Rendering dari HTML Ke PDF
$dompdf->render();
// Melakukan output file Pdf
$dompdf->stream("playerofcode", array ("Attachment"=>0));

?>
