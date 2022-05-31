<?php 
include 'koneksi.php';
if (isset($_GET['id'])) {
	if ($_GET['id'] != "") {
		
		// Mengambil ID diURL
		$id = $_GET['id'];

		// Mengambil data siswa_foto didalam table siswa
		$get_foto = "SELECT foto_depan FROM nonpertanian WHERE id='$id'";
		$data_foto = mysqli_query($mysqli, $get_foto); 
        // Mengubah data yang diambil menjadi Array
		$foto_lama = mysqli_fetch_array($data_foto);

        // Menghapus Foto lama didalam folder FOTO
		unlink("images/".$foto_lama['foto_depan']);    

		// Mengapus data siswa berdasarkan ID
		$query = mysqli_query($mysqli,"DELETE FROM nonpertanian WHERE id='$id'");
		if ($query) {
			header("location:datanonpertanian.php?pesan=hapus");
		}else{
			header("location:datanonpertanian.php?pesan=gagalhapus");
		}
		
	}else{
		// Apabila ID nya kosong maka akan dikembalikan kehalaman index
		header("location:datanonpertanian.php");
	}
}else{
	// Jika tidak ada Data ID maka akan dikembalikan kehalaman index
	header("location:datanonpertanian.php");
}

?>