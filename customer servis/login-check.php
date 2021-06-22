<?php
// panggil file untuk koneksi ke database
require_once "../config/database.php";

// ambil data hasil submit dari form
$username = mysqli_real_escape_string($mysqli, stripslashes(strip_tags(htmlspecialchars(trim($_POST['username'])))));
$password = mysqli_real_escape_string($mysqli, stripslashes(strip_tags(htmlspecialchars(trim(md5($_POST['password']))))));

// pastikan username dan password adalah berupa huruf atau angka.
if (!ctype_alnum($username) OR !ctype_alnum($password)) {
	header("Location: index.php?alert=1");
}
else {
	// ambil data dari tabel pengguna untuk pengecekan berdasarkan inputan username dan passrword
	$query = mysqli_query($mysqli, "SELECT * FROM pengguna WHERE username='$username' AND password='$password'")
									or die('Ada kesalahan pada query pengguna: '.mysqli_error($mysqli));
	$rows  = mysqli_num_rows($query);

	// jika data ada, jalankan perintah untuk membuat session
	if ($rows > 0) {
		$data  = mysqli_fetch_assoc($query);

		session_start();
		$_SESSION['id_pengguna']   = $data['id_pengguna'];
		$_SESSION['username']      = $data['username'];
		$_SESSION['password']      = $data['password'];
		$_SESSION['nama_pengguna'] = $data['nama_pengguna'];
		$_SESSION['hak_akses']     = $data['hak_akses'];
		
		// lalu alihkan ke halaman admin
		header("Location: main.php?module=beranda");
	}

	// jika data tidak ada, alihkan ke halaman login dan tampilkan pesan = 1
	else {
		header("Location: index.php?alert=1");
	}
}
?>