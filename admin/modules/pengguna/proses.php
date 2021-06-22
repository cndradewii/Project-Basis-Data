<?php
session_start();

// Panggil koneksi database.php untuk koneksi database
require_once "../../../config/database.php";

// fungsi untuk pengecekan status login user 
// jika user belum login, alihkan ke halaman login dan tampilkan pesan = 1
if (empty($_SESSION['username']) && empty($_SESSION['password'])){
    echo "<meta http-equiv='refresh' content='0; url=index.php?alert=1'>";
}
// jika user sudah login, maka jalankan perintah untuk insert, update, dan delete
else {
    if ($_GET['act']=='insert') {
        if (isset($_POST['simpan'])) {
            // ambil data hasil submit dari form
            $username      = mysqli_real_escape_string($mysqli, trim($_POST['username']));
            $password      = md5(mysqli_real_escape_string($mysqli, trim($_POST['password'])));
            $nama_pengguna = mysqli_real_escape_string($mysqli, trim($_POST['nama_pengguna']));

            // perintah query untuk menyimpan data ke tabel pengguna
            $query = mysqli_query($mysqli, "INSERT INTO pengguna(username,password,nama_pengguna)
                                            VALUES('$username','$password','$nama_pengguna')")
                                            or die('Ada kesalahan pada query insert : '.mysqli_error($mysqli));    

            // cek query
            if ($query) {
                // jika berhasil tampilkan pesan berhasil simpan data
                header("location: ../../main.php?module=pengguna&alert=1");
            }   
        }   
    }
    
    elseif ($_GET['act']=='update') {
        if (isset($_POST['simpan'])) {
            if (isset($_POST['id'])) {
                // ambil data hasil submit dari form
                $id_pengguna   = mysqli_real_escape_string($mysqli, trim($_POST['id']));
                $username      = mysqli_real_escape_string($mysqli, trim($_POST['username']));
                $password      = md5(mysqli_real_escape_string($mysqli, trim($_POST['password'])));
                $nama_pengguna = mysqli_real_escape_string($mysqli, trim($_POST['nama_pengguna']));

                // jika password tidak diubah
                if (empty($_POST['password'])) {
                    // perintah query untuk mengubah data pada tabel pengguna
                    $query = mysqli_query($mysqli, "UPDATE pengguna SET username        = '$username',
                                                                        nama_pengguna   = '$nama_pengguna'
                                                                  WHERE id_pengguna     = '$id_pengguna'")
                                                    or die('Ada kesalahan pada query update : '.mysqli_error($mysqli));

                    // cek query
                    if ($query) {
                        // jika berhasil tampilkan pesan berhasil update data
                        header("location: ../../main.php?module=pengguna&alert=2");
                    }   
                }
                // jika password diubah
                else {
                    // perintah query untuk mengubah data pada tabel pengguna
                    $query = mysqli_query($mysqli, "UPDATE pengguna SET username       = '$username',
                                                                        password       = '$password',
                                                                        nama_pengguna  = '$nama_pengguna'
                                                                  WHERE id_pengguna    = '$id_pengguna'")
                                                    or die('Ada kesalahan pada query update : '.mysqli_error($mysqli));

                    // cek query
                    if ($query) {
                        // jika berhasil tampilkan pesan berhasil update data
                        header("location: ../../main.php?module=pengguna&alert=2");
                    }   
                }
            }
        }
    }

    elseif ($_GET['act']=='delete') {
        if (isset($_GET['id'])) {
            $pengguna = $_GET['id'];
    
            // perintah query untuk menghapus data pada tabel pengguna
            $query = mysqli_query($mysqli, "DELETE FROM pengguna WHERE id_pengguna='$pengguna'")
                                            or die('Ada kesalahan pada query delete : '.mysqli_error($mysqli));

            // cek hasil query
            if ($query) {
                // jika berhasil tampilkan pesan berhasil delete data
                header("location: ../../main.php?module=pengguna&alert=3");
            }
        }
    }           
}       
?>