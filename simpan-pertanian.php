<?php 
// Menghubungkan file ini dengan file database
include 'koneksi.php';

// Mengambil data dari form lalu ditampung didalam variabel
$id         = $_POST['id'];
$alamat     = $_POST['alamat'];
$x          = $_POST['x'];
$y       = $_POST['y'];
$status       = $_POST['status'];
$jenis       = $_POST['jenis'];
$tgl		= $_POST['tgl'];
$harga       = $_POST['harga'];
$responden       = $_POST['responden'];
$dataresponden       = $_POST['dataresponden'];
$luas		= $_POST['luas'];
$lebar		= $_POST['lebar'];
$panjang		= $_POST['panjang'];
$bentuk		= $_POST['bentuk'];
$miring		= $_POST['miring'];
$komoditi		= $_POST['komoditi'];
$kesesuaian		= $_POST['kesesuaian'];
$kelas		= $_POST['kelas'];
$lebarjalan		= $_POST['lebarjalan'];
$aksebilitas		= $_POST['aksebilitas'];
$irigasi		= $_POST['irigasi'];
$drainase		= $_POST['drainase'];
$utilitas		= $_POST['utilitas'];
$ket		= $_POST['ket'];
$foto_nama  = $_FILES['pas_foto']['name'];
$foto_size  = $_FILES['pas_foto']['size'];


// Mengecek apakah file lebih besar 2 MB atau tidak
if ($foto_size > 2097152) {
	// Jika File lebih dari 2 MB maka akan gagal mengupload File
	header("location:simpan-pertanian2.php?pesan=size");
}else{

	// Mengecek apakah Ada file yang diupload atau tidak
	if ($foto_nama != "") {

		// Ekstensi yang diperbolehkan untuk diupload boleh diubah sesuai keinginan
		$ekstensi_izin = array('png','jpg','jpeg');
		// Memisahkan nama file dengan Ekstensinya
		$pisahkan_ekstensi = explode('.', $foto_nama); 
		$ekstensi = strtolower(end($pisahkan_ekstensi));
		// Nama file yang berada di dalam direktori temporer server
		$file_tmp = $_FILES['pas_foto']['tmp_name'];   
		// Membuat angka/huruf acak berdasarkan waktu diupload
		$tanggal = md5(date('Y-m-d h:i:s'));
		// Menyatukan angka/huruf acak dengan nama file aslinya
		$foto_nama_new = $tanggal.'-'.$foto_nama; 

		// Mengecek apakah Ekstensi file sesuai dengan Ekstensi file yg diuplaod
		if(in_array($ekstensi, $ekstensi_izin) === true)  {
			// Memindahkan File kedalam Folder "FOTO"
            move_uploaded_file($file_tmp, 'images/'.$foto_nama_new);

            // Query untuk memasukan data kedalam table SISWA
            $query = mysqli_query($mysqli, "INSERT INTO pertanian(id, alamat, x, y, status, jenis, tgl, harga, responden, dataresponden, luas, lebar, panjang, bentuk, miring, komoditi, kesesuaian, kelas, lebarjalan, aksebilitas, irigasi, drainase, utilitas, ket, foto_depan) VALUES ('$id','$alamat', '$x', '$y', '$status', '$jenis', '$tgl', '$harga', '$responden', '$dataresponden', '$luas', '$lebar', '$panjang', '$bentuk', '$miring', '$komoditi','$kesesuaian', '$kelas', '$lebarjalan', '$aksebilitas', '$irigasi', '$drainase', '$utilitas', '$ket', '$foto_nama_new')");

            // Mengecek apakah data gagal diinput atau tidak
            if($query){
            	header("location:datapertanian1.php?pesan=berhasil");
            } else {
                header("location:datapertanian1.php?pesan=gagal");
            }

        } else { 
        	// Jika ekstensinya tidak sesuai dengan apa yg kita tetapkan maka error
        	header("location:datapertanian?pesan=ekstensi");        }

    }

}
?>