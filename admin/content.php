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

	// jika halaman konten yang dipilih tentang, panggil file view tentang
	if ($_GET['module']=='tentang') {
		include "modules/tentang/view.php";
	}
	// ---------------------------------------------------------------------------------

	// jika halaman konten yang dipilih layanan, panggil file view layanan
	if ($_GET['module']=='layanan') {
		include "modules/layanan/view.php";
	}
	// ---------------------------------------------------------------------------------

	// jika halaman konten yang dipilih supir, panggil file view supir
	elseif ($_GET['module']=='supir') {
		include "modules/supir/view.php";
	}

	// jika halaman konten yang dipilih form supir, panggil file form supir
	elseif ($_GET['module']=='form_supir') {
		include "modules/supir/form.php";
	}
	// ---------------------------------------------------------------------------------

	// jika halaman konten yang dipilih kendaraan, panggil file view kendaraan
	elseif ($_GET['module']=='kendaraan') {
		include "modules/kendaraan/view.php";
	}

	// jika halaman konten yang dipilih form kendaraan, panggil file form kendaraan
	elseif ($_GET['module']=='form_kendaraan') {
		include "modules/kendaraan/form.php";
	}
	// ---------------------------------------------------------------------------------

	// jika halaman konten yang dipilih pelanggan, panggil file view pelanggan
	elseif ($_GET['module']=='customers') {
		include "modules/customers/view.php";
	}

	// jika halaman konten yang dipilih form pelanggan, panggil file form pelanggan
	elseif ($_GET['module']=='form_customers') {
		include "modules/customers/form.php";
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
	elseif ($_GET['module']=='laporan') {
		include "modules/laporan/view.php";
	}
	// ---------------------------------------------------------------------------------
	
	// jika halaman konten yang dipilih pengguna, panggil file view pengguna
	elseif ($_GET['module']=='pengguna') {
		include "modules/pengguna/view.php";
	}

	// jika halaman konten yang dipilih form pengguna, panggil file form pengguna
	elseif ($_GET['module']=='form_pengguna') {
		include "modules/pengguna/form.php";
	}
	// ---------------------------------------------------------------------------------

	// jika halaman konten yang dipilih password, panggil file view password
	elseif ($_GET['module']=='password') {
		include "modules/password/view.php";
	}
	// ---------------------------------------------------------------------------------
}
?>