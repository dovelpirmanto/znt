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
$elevasi		= $_POST['elevasi'];
$letak		= $_POST['letak'];
$kelas		= $_POST['kelas'];
$lebarjalan		= $_POST['lebarjalan'];
$aksebilitas		= $_POST['aksebilitas'];
$drainase		= $_POST['drainase'];
$utilitas		= $_POST['utilitas'];
$fasilitas		= implode(",", $_POST['fasilitas']);
$zoning		= $_POST['zoning'];
$luasbangunan1	= $_POST['luasbangunan1'];
$luasbangunan2	= $_POST['luasbangunan2'];
$luasbangunan	= $_POST['luasbangunan'];
$luastotal	= $_POST['luastotal'];
$jenisbangunan	= $_POST['jenisbangunan'];
$jumlahlantai	= $_POST['jumlahlantai'];
$luasdasar	= $_POST['luasdasar'];
$luaslantai2	= $_POST['luaslantai2'];
$luaslantai	= $_POST['luaslantai'];
$pembuatan	= $_POST['pembuatan'];
$renovasi	= $_POST['renovasi'];
$atas	= $_POST['atas'];
$bawah	= $_POST['bawah'];
$atap	= $_POST['atap'];
$dinding	= $_POST['dinding'];
$langit	= $_POST['langit'];
$lantai	= $_POST['lantai'];
$pagar	= $_POST['pagar'];
$panjangpagar	= $_POST['panjangpagar'];
$parkir		= $_POST['parkir'];
$pintu		= $_POST['pintu'];
$fasilitasrumah = implode(",", $_POST['fasilitasrumah']);
$umum		= $_POST['umum'];
$surveibiaya		= $_POST['surveibiaya'];
$kesimpulan		= $_POST['kesimpulan'];
$ket		= $_POST['ket'];
$foto_nama  = $_FILES['pas_foto']['name'];
$foto_size  = $_FILES['pas_foto']['size'];



// Mengecek apakah file lebih besar 2 MB atau tidak
if ($foto_size > 2097152) {
	// Jika File lebih dari 2 MB maka akan gagal mengupload File
	header("location:simpan-nonpertanian.php?pesan=size");
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
            $query = mysqli_query($mysqli, "INSERT INTO nonpertanian(id, alamat, x, y, status, jenis, tgl, harga, responden, dataresponden, luas, lebar, panjang, bentuk, elevasi, letak, kelas, lebarjalan, aksebilitas, drainase, utilitas, fasilitas, zoning, luasbangunan1, luasbangunan2, luasbangunan, luastotal, jenisbangunan, jumlahlantai, luasdasar, luaslantai2, luaslantai, pembuatan, renovasi, atas, bawah, atap, dinding, langit, lantai, pagar, panjangpagar, parkir, pintu, fasilitasrumah, umum, surveibiaya, kesimpulan, ket, foto_depan) VALUES ('$id', '$alamat', '$x', '$y', '$status', '$jenis', '$tgl', '$harga', '$responden', '$dataresponden', '$luas', '$lebar', '$panjang', '$bentuk', '$elevasi', '$letak', '$kelas', '$lebarjalan', '$aksebilitas', '$drainase', '$utilitas', '$fasilitas', '$zoning', '$luasbangunan1', '$luasbangunan2', '$luasbangunan', '$luastotal', '$jenisbangunan', '$jumlahlantai', '$luasdasar', '$luaslantai2', '$luaslantai', '$pembuatan', '$renovasi', '$atas', '$bawah', '$atap', '$dinding', '$langit', '$lantai', '$pagar', '$panjangpagar', '$parkir', '$pintu', '$fasilitasrumah', '$umum', '$surveibiaya', '$kesimpulan', '$ket','$foto_nama_new')");

            // Mengecek apakah data gagal diinput atau tidak
            if($query){
            	header("location:datanonpertanian.php?pesan=berhasil");
            } else {
                header("location:datanonpertanian.php?pesan=gagal");
            }

        } else { 
        	// Jika ekstensinya tidak sesuai dengan apa yg kita tetapkan maka error
        	header("location:datanonpertanian?pesan=ekstensi");        }

    }

}
?>