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
            $no_polisi = mysqli_real_escape_string($mysqli, trim($_POST['no_polisi']));
            $merk      = mysqli_real_escape_string($mysqli, trim($_POST['merk']));
            $no_mesin  = mysqli_real_escape_string($mysqli, trim($_POST['no_mesin']));
            $tahun     = mysqli_real_escape_string($mysqli, trim($_POST['tahun']));
            $warna     = mysqli_real_escape_string($mysqli, trim($_POST['warna']));
            $supir     = mysqli_real_escape_string($mysqli, trim($_POST['no_ktp']));

            // perintah query untuk menyimpan data ke tabel kendaraan
            $query = mysqli_query($mysqli, "INSERT INTO kendaraan(no_polisi,merk,no_mesin,tahun,warna,supir)
                                            VALUES('$no_polisi','$merk','$no_mesin','$tahun','$warna','$supir')")
                                            or die('Ada kesalahan pada query insert : '.mysqli_error($mysqli));    

            // cek query
            if ($query) {
                // jika berhasil tampilkan pesan berhasil simpan data
                header("location: ../../main.php?module=kendaraan&alert=1");
            }   
        }   
    }
    
    elseif ($_GET['act']=='update') {
        if (isset($_POST['simpan'])) {
            if (isset($_POST['no_polisi'])) {
                // ambil data hasil submit dari form
                $no_polisi = mysqli_real_escape_string($mysqli, trim($_POST['no_polisi']));
                $merk      = mysqli_real_escape_string($mysqli, trim($_POST['merk']));
                $no_mesin  = mysqli_real_escape_string($mysqli, trim($_POST['no_mesin']));
                $tahun     = mysqli_real_escape_string($mysqli, trim($_POST['tahun']));
                $warna     = mysqli_real_escape_string($mysqli, trim($_POST['warna']));
                $supir     = mysqli_real_escape_string($mysqli, trim($_POST['no_ktp']));

                // perintah query untuk mengubah data pada tabel kendaraan
                $query = mysqli_query($mysqli, "UPDATE kendaraan SET merk       = '$merk',
                                                                     no_mesin   = '$no_mesin',
                                                                     tahun      = '$tahun',
                                                                     warna      = '$warna',
                                                                     supir      = '$supir'
                                                               WHERE no_polisi  = '$no_polisi'")
                                                or die('Ada kesalahan pada query update : '.mysqli_error($mysqli));

                // cek query
                if ($query) {
                    // jika berhasil tampilkan pesan berhasil update data
                    header("location: ../../main.php?module=kendaraan&alert=2");
                }       
            }
        }
    }

    elseif ($_GET['act']=='delete') {
        if (isset($_GET['id'])) {
            $no_polisi = $_GET['id'];
    
            // perintah query untuk menghapus data pada tabel kendaraan
            $query = mysqli_query($mysqli, "DELETE FROM kendaraan WHERE no_polisi='$no_polisi'")
                                            or die('Ada kesalahan pada query delete : '.mysqli_error($mysqli));

            // cek hasil query
            if ($query) {
                // jika berhasil tampilkan pesan berhasil delete data
                header("location: ../../main.php?module=kendaraan&alert=3");
            }
        }
    }       
}       
?>