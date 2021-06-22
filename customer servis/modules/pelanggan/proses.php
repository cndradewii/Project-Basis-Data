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
            $no_ktp         = mysqli_real_escape_string($mysqli, trim($_POST['no_ktp']));
            $nama_pelanggan = mysqli_real_escape_string($mysqli, trim($_POST['nama_pelanggan']));
            $jenis_kelamin  = mysqli_real_escape_string($mysqli, trim($_POST['jenis_kelamin']));
            $alamat         = mysqli_real_escape_string($mysqli, trim($_POST['alamat']));
            $telepon        = mysqli_real_escape_string($mysqli, trim($_POST['telepon']));

            // perintah query untuk menyimpan data ke tabel pelanggan
            $query = mysqli_query($mysqli, "INSERT INTO pelanggan(no_ktp,nama_pelanggan,jenis_kelamin,alamat,telepon)
                                            VALUES('$no_ktp','$nama_pelanggan','$jenis_kelamin','$alamat','$telepon')")
                                            or die('Ada kesalahan pada query insert : '.mysqli_error($mysqli));    

            // cek query
            if ($query) {
                // jika berhasil tampilkan pesan berhasil simpan data
                header("location: ../../main.php?module=pelanggan&alert=1");
            }   
        }   
    }
    
    elseif ($_GET['act']=='update') {
        if (isset($_POST['simpan'])) {
            if (isset($_POST['no_ktp'])) {
                // ambil data hasil submit dari form
                $no_ktp         = mysqli_real_escape_string($mysqli, trim($_POST['no_ktp']));
                $nama_pelanggan = mysqli_real_escape_string($mysqli, trim($_POST['nama_pelanggan']));
                $jenis_kelamin  = mysqli_real_escape_string($mysqli, trim($_POST['jenis_kelamin']));
                $alamat         = mysqli_real_escape_string($mysqli, trim($_POST['alamat']));
                $telepon        = mysqli_real_escape_string($mysqli, trim($_POST['telepon']));


                // perintah query untuk mengubah data pada tabel pelanggan
                $query = mysqli_query($mysqli, "UPDATE pelanggan SET nama_pelanggan = '$nama_pelanggan',
                                                                     jenis_kelamin  = '$jenis_kelamin',
                                                                     alamat         = '$alamat',
                                                                     telepon        = '$telepon'
                                                               WHERE no_ktp         = '$no_ktp'")
                                                or die('Ada kesalahan pada query update : '.mysqli_error($mysqli));

                // cek query
                if ($query) {
                    // jika berhasil tampilkan pesan berhasil update data
                    header("location: ../../main.php?module=pelanggan&alert=2");
                }       
            }
        }
    }

    elseif ($_GET['act']=='delete') {
        if (isset($_GET['id'])) {
            $no_ktp = $_GET['id'];
    
            // perintah query untuk menghapus data pada tabel pelanggan
            $query = mysqli_query($mysqli, "DELETE FROM pelanggan WHERE no_ktp='$no_ktp'")
                                            or die('Ada kesalahan pada query delete : '.mysqli_error($mysqli));

            // cek hasil query
            if ($query) {
                // jika berhasil tampilkan pesan berhasil delete data
                header("location: ../../main.php?module=pelanggan&alert=3");
            }
        }
    }       
}       
?>