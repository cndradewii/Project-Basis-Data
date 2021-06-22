<?php
session_start();

// Panggil koneksi database.php untuk koneksi database
require_once "../../../config/database.php";

// fungsi untuk pengecekan status login user 
// jika user belum login, alihkan ke halaman login dan tampilkan pesan = 1
if (empty($_SESSION['username']) && empty($_SESSION['password'])){
    echo "<meta http-equiv='refresh' content='0; url=index.php?alert=1'>";
}
// jika user sudah login, maka jalankan perintah untuk update
else {
    if (isset($_POST['simpan'])) {
        if (isset($_POST['id_informasi'])) {
            // ambil data hasil submit dari form
            $id    = mysqli_real_escape_string($mysqli, trim($_POST['id_informasi']));
            $judul = mysqli_real_escape_string($mysqli, trim($_POST['judul']));
            $isi   = mysqli_real_escape_string($mysqli, trim($_POST['isi']));

            // perintah query untuk mengubah data pada tabel infomarsi
            $query = mysqli_query($mysqli, "UPDATE informasi SET judul          = '$judul',
                                                                 isi            = '$isi'
                                                           WHERE id_informasi   = '$id'")
                                            or die('Ada kesalahan pada query update : '.mysqli_error($mysqli));
            
            // cek query
            if ($query) {
                // jika berhasil alihkan ke halaman tentang
                header("location: ../../main.php?module=tentang");
            }       
        }
    }   
}       
?>