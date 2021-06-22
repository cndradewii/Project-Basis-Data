<?php
/* panggil file database.php untuk koneksi ke database */
require_once "config/database.php";
/* panggil file untuk format nama hari */
require_once "config/fungsi_nama_hari.php";
/* panggil file untuk format tanggal */
require_once "config/fungsi_tanggal.php";

// fungsi untuk pemanggilan file halaman konten
// jika halaman konten yang dipilih home, panggil file view home
if ($_GET['page'] == 'home') {
	include "pages/home/view.php";
}

// jika halaman konten yang dipilih tentang, panggil file view tentang
if ($_GET['page'] == 'tentang') {
	include "pages/tentang/view.php";
}

// jika halaman konten yang dipilih layanan, panggil file view layanan
if ($_GET['page'] == 'layanan') {
	include "pages/layanan/view.php";
}

// jika halaman konten yang dipilih track, panggil file view track
if ($_GET['page'] == 'track') {
	include "pages/track/view.php";
}

// jika halaman konten yang dipilih track, panggil file view track
if ($_GET['page'] == 'cektarif') {
	include "rajaongkir/cektarif/index.php";
}
// jika halaman konten yang dipilih kontak, panggil file view kontak
if ($_GET['page'] == 'kontak') {
	include "pages/kontak/view.php";
}
?>