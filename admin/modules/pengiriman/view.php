<div class="breadcrumbs breadcrumbs-fixed" id="breadcrumbs">
	<ul class="breadcrumb">
		<li>
			<i class="ace-icon fa fa-home home-icon"></i>
			<a href="?module=beranda">Beranda</a>
		</li>

		<li class="active">Pengiriman</li>
	</ul><!-- /.breadcrumb -->
</div>

<div class="page-content">
	<div class="page-header">
		<h1 style="color:#585858">
			<i style="margin-right:7px" class="ace-icon fa fa-clone"></i> Data pengiriman
			<a href="?module=form_pengiriman&form=add">
                <button class="btn btn-primary pull-right">
					<i class="ace-icon fa fa-plus"></i> Tambah
				</button>
            </a>
		</h1>
	</div><!-- /.page-header -->

<?php
// fungsi untuk menampilkan pesan
// jika alert = "" (kosong)
// tampilkan pesan "" (kosong)
if (empty($_GET['alert'])) {
}
// jika alert = 1
// tampilkan pesan "data pengiriman berhasil disimpan"
elseif ($_GET['alert'] == 1) { ?>
	<div class="alert alert-success">
		<button type="button" class="close" data-dismiss="alert">
			<i class="ace-icon fa fa-times"></i>
		</button>
		<strong><i class="ace-icon fa fa-check-circle"></i> Sukses! </strong><br>
		data pengiriman berhasil disimpan.
		<br>
	</div>
<?php
} 
// jika alert = 2
// tampilkan pesan Sukses "pengiriman berhasil diubah"
elseif ($_GET['alert'] == 2) { ?>
	<div class="alert alert-success">
		<button type="button" class="close" data-dismiss="alert">
			<i class="ace-icon fa fa-times"></i>
		</button>
		<strong><i class="ace-icon fa fa-check-circle"></i> Sukses! </strong><br>
		data pengiriman berhasil diubah.
		<br>
	</div>
<?php
}
// jika alert = 3
// tampilkan pesan Sukses "pengiriman berhasil dihapus"
elseif ($_GET['alert'] == 3) { ?>
	<div class="alert alert-success">
		<button type="button" class="close" data-dismiss="alert">
			<i class="ace-icon fa fa-times"></i>
		</button>
		<strong><i class="ace-icon fa fa-check-circle"></i> Sukses! </strong><br>
		data pengiriman berhasil dihapus.
		<br>
	</div>
<?php
} 
?>

	<div class="row">
		<div class="col-xs-12">
			<!-- PAGE CONTENT BEGINS -->
			<div class="row">
				<div class="col-xs-12">
					<div class="table-header">
						Data Pengiriman Barang
					</div>
					<!-- div.table-responsive -->

					<!-- div.dataTables_borderWrap -->
					<div>
						<table id="dynamic-table" class="table table-striped table-bordered table-hover">
							<thead>
								<tr>
									<th>No.</th>
									<th>No. Pengiriman</th>
									<th>Tanggal</th>
									<th>Pengirim</th>
									<th>Penerima</th>
									<th>Barang</th>
									<th>Biaya Kirim</th>
									<th>Status</th>
									<th></th>
								</tr>
							</thead>

							<tbody>
							<?php
							$no = 1;
							// fungsi query untuk menampilkan data dari tabel pengiriman, ikan masuk, ikan, nelayan dan pembeli
							$query = mysqli_query($mysqli, "SELECT a.no_pengiriman,a.tgl_pengiriman,a.pengirim,a.penerima,a.alamat_penerima,a.nama_barang,a.jumlah_barang,a.berat_barang,a.biaya_kirim,a.kendaraan,a.status,
															b.no_ktp as id_pelanggan,b.nama_pelanggan,b.alamat,
															c.no_polisi,c.supir,
															d.no_ktp as id_supir,d.nama_supir
															FROM pengiriman as a INNER JOIN pelanggan as b INNER JOIN kendaraan as c INNER JOIN supir as d
															ON a.pengirim=b.no_ktp AND a.kendaraan=c.no_polisi AND c.supir=d.no_ktp
															ORDER BY a.no_pengiriman DESC")
															or die('Ada kesalahan pada query tampil data pengiriman: '.mysqli_error($mysqli));

                            while ($data = mysqli_fetch_assoc($query)) { 
								$tanggal        = $data['tgl_pengiriman'];
								$tgl            = explode('-',$tanggal);
								$tgl_pengiriman = $tgl[2]."-".$tgl[1]."-".$tgl[0];
                            ?>
                            	<tr>
									<td width="30" class="center"><?php echo $no; ?></td>
									<td width="100" class="center">
										<a href="?module=form_pengiriman&form=detail&id=<?php echo $data['no_pengiriman']; ?>"><?php echo $data['no_pengiriman']; ?></a>
									</td>
									<td width="40" class="center"><?php echo $tgl_pengiriman; ?></td>
									<td width="120"><?php echo $data['nama_pelanggan']; ?> <br></td>
									<td width="120"><?php echo $data['penerima']; ?> <br></td>
									<td width="120"><?php echo $data['nama_barang']; ?></td>
									<td width="100" align="right">Rp. <?php echo format_rupiah_nol($data['biaya_kirim']); ?></td>
									<td width="100"><?php echo $data['status']; ?></td>

									<td width="80" class="center">
										<div class="action-buttons">
											<a data-rel="tooltip" data-placement="top" title="Ubah" class="blue tooltip-info" href="?module=form_pengiriman&form=edit&id=<?php echo $data['no_pengiriman']; ?>">
												<i class="ace-icon fa fa-edit bigger-130"></i>
											</a>

											<a data-rel="tooltip" data-placement="top" title="Hapus" class="red tooltip-error" href="modules/pengiriman/proses.php?act=delete&id=<?php echo $data['no_pengiriman'];?>" onclick="return confirm('Anda yakin ingin menghapus pengiriman no. <?php echo $data['no_pengiriman']; ?> ?');">
												<i class="ace-icon fa fa-trash-o bigger-130"></i>
											</a>

											<a data-rel="tooltip" data-placement="top" title="Cetak" class="blue tooltip-info" href="modules/pengiriman/cetak.php?id=<?php echo $data['no_pengiriman'];?>" target="_blank">
												<i class="ace-icon fa fa-print bigger-130"></i>
											</a>
										</div>
									</td>
								</tr>
							<?php
                            	$no++;
                            } ?>
							</tbody>
						</table>
					</div>
				</div>
			</div><!-- PAGE CONTENT ENDS -->
		</div><!-- /.col -->
	</div><!-- /.row -->
</div><!-- /.page-content -->