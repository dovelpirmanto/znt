<?php 
// Menghubungkan file ini dengan file database
include 'koneksi.php';
// Mengecek apakah ID ada datanya atau tidak
if (isset($_POST['id'])) {
    if ($_POST['id'] != "") {
        // Mengambil data dari form lalu ditampung didalam variabel
        $id         = $_POST['id'];
        $alamat     = $_POST['alamat'];
        $x          = $_POST['x'];
        $y       = $_POST['y'];
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
        $elevasi    = $_POST['elevasi'];
        $letak    = $_POST['letak'];
        $kelas    = $_POST['kelas'];
        $lebarjalan   = $_POST['lebarjalan'];
        $aksebilitas    = $_POST['aksebilitas'];
        $drainase   = $_POST['drainase'];
        $utilitas   = $_POST['utilitas'];
        $fasilitas    = implode(",", $_POST['fasilitas']);
        $zoning   = $_POST['zoning'];
        $luasbangunan1  = $_POST['luasbangunan1'];
        $luasbangunan2  = $_POST['luasbangunan2'];
        $luasbangunan = $_POST['luasbangunan'];
        $luastotal  = $_POST['luastotal'];
        $jenisbangunan  = $_POST['jenisbangunan'];
        $jumlahlantai = $_POST['jumlahlantai'];
        $luasdasar  = $_POST['luasdasar'];
        $luaslantai2  = $_POST['luaslantai2'];
        $luaslantai = $_POST['luaslantai'];
        $pembuatan  = $_POST['pembuatan'];
        $renovasi = $_POST['renovasi'];
        $atas = $_POST['atas'];
        $bawah  = $_POST['bawah'];
        $atap = $_POST['atap'];
        $dinding  = $_POST['dinding'];
        $langit = $_POST['langit'];
        $lantai = $_POST['lantai'];
        $pagar  = $_POST['pagar'];
        $panjangpagar = $_POST['panjangpagar'];
        $parkir   = $_POST['parkir'];
        $pintu    = $_POST['pintu'];
        $fasilitasrumah = implode(",", $_POST['fasilitasrumah']);
        $umum   = $_POST['umum'];
        $surveibiaya    = $_POST['surveibiaya'];
        $kesimpulan   = $_POST['kesimpulan'];
        $ket    = $_POST['ket'];
        $foto_nama  = $_FILES['pas_foto']['name'];
        $foto_size  = $_FILES['pas_foto']['size'];

    }else{
        header("location:datanonpertanian1.php");
    }

    // Mengecek apakah file lebih besar 2 MB atau tidak
    if ($foto_size > 2097152) {
       // Jika File lebih dari 2 MB maka akan gagal mengupload File
       header("location:datanonpertanian1.php?pesan=size");

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
            $get_foto = "SELECT foto_depan FROM nonpertanian WHERE id='$id'";
            $data_foto = mysqli_query($mysqli, $get_foto); 
            // Mengubah data yang diambil menjadi Array
            $foto_lama = mysqli_fetch_array($data_foto);

            // Menghapus Foto lama didalam folder FOTO
            unlink("images/".$foto_lama['foto_depan']);    

            // Memindahkan File kedalam Folder "FOTO"
            move_uploaded_file($file_tmp, 'images/'.$foto_nama_new);

            // Query untuk memasukan data kedalam table SISWA
            $query = mysqli_query($mysqli, "UPDATE nonpertanian SET
             alamat='$alamat',
              x='$x', 
              y='$y', 
              status='$status', 
              jenis='$jenis', 
              tgl='$tgl', 
              harga='$harga', 
              responden='$responden', 
              dataresponden='$dataresponden', 
              luas='$luas', 
              lebar='$lebar', 
              panjang='$panjang', 
              bentuk='$bentuk', 
              elevasi='$elevasi', 
              letak='$letak', 
              kelas='$kelas', 
              lebarjalan='$lebarjalan', 
              aksebilitas='$aksebilitas', 
              drainase='$drainase', 
              utilitas='$utilitas', 
              fasilitas='$fasilitas', 
              zoning='$zoning', 
              luasbangunan1='$luasbangunan1', 
              luasbangunan2='$luasbangunan2', 
              luasbangunan='$luasbangunan', 
              luastotal='$luastotal', 
              jenisbangunan='$jenisbangunan', 
              jumlahlantai='$jumlahlantai', 
              luasdasar='$luasdasar', 
              luaslantai2='$luaslantai2', 
              luaslantai='$luaslantai', 
              pembuatan='$pembuatan', 
              renovasi='$renovasi', 
              atas='$atas', 
              bawah='$bawah', 
              atap='$atap', 
              dinding='$dinding', 
              langit='$langit', 
              lantai='$lantai', 
              pagar='$pagar', 
              panjangpagar='$panjangpagar', 
              parkir='$parkir', 
              pintu='$pintu', 
              fasilitasrumah='$fasilitasrumah', 
              umum='$umum', 
              surveibiaya='$surveibiaya', 
              kesimpulan='$kesimpulan', 
              ket='$ket', 
              foto_depan='$foto_nama_new' WHERE id='$id'");

            // Mengecek apakah data gagal diinput atau tidak
            if($query){
                header("location:datanonpertanian1.php?pesan=berhasil");
            } else {
                header("location:formeditnonpertanian1.php?pesan=gagal");
            }

        } else { 
            // Jika ekstensinya tidak sesuai dengan apa yg kita tetapkan maka error
            header("location:formeditnonpertanian1.php?pesan=ekstensi");        }

        }else{

        // Apabila tidak ada file yang diupload maka akan menjalankan code dibawah ini
          $query = mysqli_query($mysqli, "UPDATE nonpertanian SET
             alamat='$alamat',
              x='$x', 
              y='$y', 
              status='$status', 
              jenis='$jenis', 
              tgl='$tgl', 
              harga='$harga', 
              responden='$responden', 
              dataresponden='$dataresponden', 
              luas='$luas', 
              lebar='$lebar', 
              panjang='$panjang', 
              bentuk='$bentuk', 
              elevasi='$elevasi', 
              letak='$letak', 
              kelas='$kelas', 
              lebarjalan='$lebarjalan', 
              aksebilitas='$aksebilitas', 
              drainase='$drainase', 
              utilitas='$utilitas', 
              fasilitas='$fasilitas', 
              zoning='$zoning', 
              luasbangunan1='$luasbangunan1', 
              luasbangunan2='$luasbangunan2', 
              luasbangunan='$luasbangunan', 
              luastotal='$luastotal', 
              jenisbangunan='$jenisbangunan', 
              jumlahlantai='$jumlahlantai', 
              luasdasar='$luasdasar', 
              luaslantai2='$luaslantai2', 
              luaslantai='$luaslantai', 
              pembuatan='$pembuatan', 
              renovasi='$renovasi', 
              atas='$atas', 
              bawah='$bawah', 
              atap='$atap', 
              dinding='$dinding', 
              langit='$langit', 
              lantai='$lantai', 
              pagar='$pagar', 
              panjangpagar='$panjangpagar', 
              parkir='$parkir', 
              pintu='$pintu', 
              fasilitasrumah='$fasilitasrumah', 
              umum='$umum', 
              surveibiaya='$surveibiaya', 
              kesimpulan='$kesimpulan', 
              ket='$ket', WHERE id='$id'");

            // Mengecek apakah data gagal diinput atau tidak
            if($query){
                header("location:datanonpertanian1.php?pesan=berhasil");
            }else {
                header("location:formeditnonpertanian1.php?pesan=gagal");
            }
        }

    }
}else{
    // Apabila ID tidak ditemukan maka akan dikembalikan ke halaman index
    header("location:datanonpertanian1.php");
}
?>