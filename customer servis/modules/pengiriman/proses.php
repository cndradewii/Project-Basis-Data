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
            $no_pengiriman   = mysqli_real_escape_string($mysqli, trim($_POST['no_pengiriman']));
            
            $tanggal         = $_POST['tgl_pengiriman'];
            $tgl             = explode('-',$tanggal);
            $tgl_pengiriman  = $tgl[2]."-".$tgl[1]."-".$tgl[0];

            $id_pengirim     = mysqli_real_escape_string($mysqli, trim($_POST['id_pengirim']));
            $penerima        = mysqli_real_escape_string($mysqli, trim($_POST['penerima']));
            $alamat_penerima = mysqli_real_escape_string($mysqli, trim($_POST['alamat_penerima']));
            $nama_barang     = mysqli_real_escape_string($mysqli, trim($_POST['nama_barang']));
            $jumlah_barang   = mysqli_real_escape_string($mysqli, trim($_POST['jumlah_barang']));
            $berat_barang    = mysqli_real_escape_string($mysqli, trim($_POST['berat_barang']));
            $biaya_kirim     = str_replace('.','', mysqli_real_escape_string($mysqli, trim($_POST['biaya_kirim'])));
            $no_polisi       = mysqli_real_escape_string($mysqli, trim($_POST['no_polisi']));

            // perintah query untuk menyimpan data ke tabel pengiriman
            $query = mysqli_query($mysqli, "INSERT INTO pengiriman(no_pengiriman,tgl_pengiriman,pengirim,penerima,alamat_penerima,nama_barang,jumlah_barang,berat_barang,biaya_kirim,kendaraan)
                                            VALUES('$no_pengiriman','$tgl_pengiriman','$id_pengirim','$penerima','$alamat_penerima','$nama_barang','$jumlah_barang','$berat_barang','$biaya_kirim','$no_polisi')")
                                            or die('Ada kesalahan pada query insert : '.mysqli_error($mysqli));    

            // cek query
            if ($query) {
                // jika berhasil tampilkan pesan berhasil simpan data
                header("location: ../../main.php?module=pengiriman&alert=1");
            }   
        }   
    }
    
    elseif ($_GET['act']=='update') {
        if (isset($_POST['simpan'])) {
            if (isset($_POST['no_pengiriman'])) {
                // ambil data hasil submit dari form
                $no_pengiriman   = mysqli_real_escape_string($mysqli, trim($_POST['no_pengiriman']));
                
                $tanggal         = $_POST['tgl_pengiriman'];
                $tgl             = explode('-',$tanggal);
                $tgl_pengiriman  = $tgl[2]."-".$tgl[1]."-".$tgl[0];
                
                $id_pengirim     = mysqli_real_escape_string($mysqli, trim($_POST['id_pengirim']));
                $penerima        = mysqli_real_escape_string($mysqli, trim($_POST['penerima']));
                $alamat_penerima = mysqli_real_escape_string($mysqli, trim($_POST['alamat_penerima']));
                $nama_barang     = mysqli_real_escape_string($mysqli, trim($_POST['nama_barang']));
                $jumlah_barang   = mysqli_real_escape_string($mysqli, trim($_POST['jumlah_barang']));
                $berat_barang    = mysqli_real_escape_string($mysqli, trim($_POST['berat_barang']));
                $biaya_kirim     = str_replace('.','', mysqli_real_escape_string($mysqli, trim($_POST['biaya_kirim'])));
                $no_polisi       = mysqli_real_escape_string($mysqli, trim($_POST['no_polisi']));
                $status          = mysqli_real_escape_string($mysqli, trim($_POST['status']));
                
                // perintah query untuk mengubah data pada tabel pengiriman
                $query = mysqli_query($mysqli, "UPDATE pengiriman SET   tgl_pengiriman  = '$tgl_pengiriman',
                                                                        pengirim        = '$id_pengirim',
                                                                        penerima        = '$penerima',
                                                                        alamat_penerima = '$alamat_penerima',
                                                                        nama_barang     = '$nama_barang',
                                                                        jumlah_barang   = '$jumlah_barang',
                                                                        berat_barang    = '$berat_barang',
                                                                        biaya_kirim     = '$biaya_kirim',
                                                                        kendaraan       = '$no_polisi',
                                                                        status          = '$status'
                                                                  WHERE no_pengiriman   = '$no_pengiriman'")
                                                or die('Ada kesalahan pada query update : '.mysqli_error($mysqli));
                
                // cek query
                if ($query) {
                    // jika berhasil tampilkan pesan berhasil update data
                    header("location: ../../main.php?module=pengiriman&alert=2");
                }       
            }
        }
    }

    elseif ($_GET['act']=='delete') {
        if (isset($_GET['id'])) {
            $no_pengiriman = $_GET['id'];
    
            // perintah query untuk menghapus data pada tabel pengiriman
            $query = mysqli_query($mysqli, "DELETE FROM pengiriman WHERE no_pengiriman='$no_pengiriman'")
                                            or die('Ada kesalahan pada query delete : '.mysqli_error($mysqli));

            // cek hasil query
            if ($query) {
                // jika berhasil tampilkan pesan berhasil delete data
                header("location: ../../main.php?module=pengiriman&alert=3");
            }
        }
    }       
}       
?>