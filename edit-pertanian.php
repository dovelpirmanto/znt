<?php 
// Menghubungkan file ini dengan file database
include 'koneksi.php';
// Mengecek apakah ID ada datanya atau tidak
if (isset($_POST['id'])) {
    if ($_POST['id'] != "") {
        // Mengambil data dari form lalu ditampung didalam variabel
        $id = $_POST['id'];
        $alamat = $_POST['alamat'];
        $x = $_POST['x'];
        $y = $_POST['y'];
        $status       = $_POST['status'];
        $jenis       = $_POST['jenis'];
        $tgl    = $_POST['tgl'];
        $harga       = $_POST['harga'];
        $responden       = $_POST['responden'];
        $dataresponden       = $_POST['dataresponden'];
        $luas   = $_POST['luas'];
        $lebar    = $_POST['lebar'];
        $panjang    = $_POST['panjang'];
        $bentuk   = $_POST['bentuk'];
        $miring   = $_POST['miring'];
        $komoditi   = $_POST['komoditi'];
        $kesesuaian   = $_POST['kesesuaian'];
        $kelas    = $_POST['kelas'];
        $lebarjalan   = $_POST['lebarjalan'];
        $aksebilitas    = $_POST['aksebilitas'];
        $irigasi    = $_POST['irigasi'];
        $drainase   = $_POST['drainase'];
        $utilitas   = $_POST['utilitas'];
        $ket    = $_POST['ket'];
        $foto_nama = $_FILES['pas_foto']['name'];
        $foto_size = $_FILES['pas_foto']['size'];

    }else{
        header("location:datapertanian.php");
    }

    // Mengecek apakah file lebih besar 2 MB atau tidak
    if ($foto_size > 2097152) {
       // Jika File lebih dari 2 MB maka akan gagal mengupload File
       header("location:datapertanian.php?pesan=size");

    }else{

       // Mengecek apakah Ada file yang diupload atau tidak
       if ($foto_nama != "") {

          // Ekstensi yang diperbolehkan untuk diupload boleh diubah sesuai keinginan
          $ekstensi_izin = array('png','jpg','jepg');
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

            // Mengambil data siswa_foto didalam table siswa
            $get_foto = "SELECT foto_depan FROM pertanian WHERE id='$id'";
            $data_foto = mysqli_query($mysqli, $get_foto); 
            // Mengubah data yang diambil menjadi Array
            $foto_lama = mysqli_fetch_array($data_foto);

            // Menghapus Foto lama didalam folder FOTO
            unlink("images/".$foto_lama['foto_depan']);    

            // Memindahkan File kedalam Folder "FOTO"
            move_uploaded_file($file_tmp, 'images/'.$foto_nama_new);

            // Query untuk memasukan data kedalam table SISWA
            $query = mysqli_query($mysqli, "UPDATE pertanian SET alamat='$alamat', x='$x', y='$y', status='$status', jenis='$jenis', tgl='$tgl', harga='$harga', responden='$responden', dataresponden='$dataresponden', luas='$luas', lebar='$lebar', panjang='$panjang', bentuk='$bentuk', miring='$miring', komoditi='$komoditi', kesesuaian='$kesesuaian', kelas='$kelas', lebarjalan='$lebarjalan', aksebilitas='$aksebilitas', irigasi='$irigasi', drainase='$drainase', utilitas='$utilitas', ket='$ket', foto_depan='$foto_nama_new' WHERE id='$id'");

            // Mengecek apakah data gagal diinput atau tidak
            if($query){
                header("location:datapertanian.php?pesan=berhasil");
            } else {
                header("location:formeditpertanian.php?pesan=gagal");
            }

        } else { 
            // Jika ekstensinya tidak sesuai dengan apa yg kita tetapkan maka error
            header("location:formeditpertanian.php?pesan=ekstensi");        }

        }else{

        // Apabila tidak ada file yang diupload maka akan menjalankan code dibawah ini
          $query = mysqli_query($mysqli, "UPDATE pertanian SET alamat='$alamat', x='$x', y='$y', status='$status', jenis='$jenis', tgl='$tgl', harga='$harga', responden='$responden', dataresponden='$dataresponden', luas='$luas', lebar='$lebar', panjang='$panjang', bentuk='$bentuk', miring='$miring', komoditi='$komoditi', kesesuaian='$kesesuaian', kelas='$kelas', lebarjalan='$lebarjalan', aksebilitas='$aksebilitas', irigasi='$irigasi', drainase='$drainase', utilitas='$utilitas', ket='$ket' WHERE id='$id'");

            // Mengecek apakah data gagal diinput atau tidak
            if($query){
                header("location:datapertanian.php?pesan=berhasil");
            }else {
                header("location:formeditpertanian.php?pesan=gagal");
            }
        }

    }
}else{
    // Apabila ID tidak ditemukan maka akan dikembalikan ke halaman index
    header("location:datapertanian.php");
}
?>