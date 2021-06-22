<?php
	// Konvesi yyyy-mm-dd -> dd-mm-yyyy dan memberi nama bulan
	function nama_hari($tanggal) {
		// format tanggal yyyy-mm-dd
		$tgl = substr($tanggal,8,2);
		$bln = substr($tanggal,5,2);
		$thn = substr($tanggal,0,4);

		$info = date('w', mktime(0,0,0,$bln,$tgl,$thn));

		switch ($info) {
			case '0': return "Minggu"; break;
			case '1': return "Senin"; break;
			case '2': return "Selasa"; break;
			case '3': return "Rabu"; break;
			case '4': return "Kamis"; break;
			case '5': return "Jumat"; break;
			case '6': return "Sabtu"; break;
		}
	}
?>
