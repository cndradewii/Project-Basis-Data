<?php
// panggil file database.php untuk koneksi ke database
require_once "../config/database.php";
// panggil fungsi untuk format tanggal
require_once "../config/fungsi_tanggal.php";
// panggil fungsi untuk format rupiah
require_once "../config/fungsi_rupiah.php";

// fungsi untuk pengecekan status login user 
// jika user belum login, alihkan ke halaman login dan tampilkan pesan = 1
if (empty($_SESSION['username']) && empty($_SESSION['password'])){
	echo "<meta http-equiv='refresh' content='0; url=index.php?alert=1'>";
}
// jika user sudah login, maka jalankan perintah untuk pemanggilan file halaman konten
else {
	// jika halaman konten yang dipilih beranda, panggil file view beranda
	if ($_GET['module']=='beranda') {
		include "modules/beranda/view.php";
	}
	// ---------------------------------------------------------------------------------

	// jika halaman konten yang dipilih pengiriman, panggil file view pengguna
	elseif ($_GET['module']=='pelanggan') {
		include "modules/pelanggan/view.php";
	}

	// jika halaman konten yang dipilih form pengiriman, panggil file form pengguna
	elseif ($_GET['module']=='form_pelanggan') {
		include "modules/pelanggan/form.php";
	}
	// ---------------------------------------------------------------------------------


	// jika halaman konten yang dipilih pengiriman, panggil file view pengiriman
	elseif ($_GET['module']=='pengiriman') {
		include "modules/pengiriman/view.php";
	}

	// jika halaman konten yang dipilih form pengiriman, panggil file form pengiriman
	elseif ($_GET['module']=='form_pengiriman') {
		include "modules/pengiriman/form.php";
	}
	// ---------------------------------------------------------------------------------

	// jika halaman konten yang dipilih laporan, panggil file view laporan
	if ($_GET['module']=='laporan') {
		include "modules/laporan/view.php";
	}

	// jika halaman konten yang dipilih laporan, panggil file view laporan
	elseif ($_GET['module']=='laporan') {
		include "modules/laporan/view.php";
	}
	// ---------------------------------------------------------------------------------
	
	// jika halaman konten yang dipilih laporan, panggil file view laporan
	if ($_GET['module']=='cetak') {
		include "modules/pengiriman/cetak.php";
	}

	// jika halaman konten yang dipilih laporan, panggil file view laporan
	elseif ($_GET['module']=='cetak') {
		include "modules/pengiriman/cetak.php";
	}
	// ---------------------------------------------------------------------------------

	// jika halaman konten yang dipilih password, panggil file view password
	elseif ($_GET['module']=='password') {
		include "modules/password/view.php";
	}
	// ---------------------------------------------------------------------------------
}
?>