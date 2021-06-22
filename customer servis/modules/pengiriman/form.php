<?php
// fungsi untuk pengecekan tampilan form
// jika form add data yang dipilih
if ($_GET['form']=='add') { ?>
	<script type="text/javascript">
		function hitung_berat() {
	        bil1 = document.frmpengiriman.berat_barang.value;
	        if (bil1=='') {
	            var hasil = 0;
	        } 
	        else {
	            var hasil = eval(bil1) * 10000;
	        };
	        document.frmpengiriman.biaya_kirim.value=(hasil);
	    }
	</script>
 	<!-- tampilkan form add data -->
	<div class="breadcrumbs breadcrumbs-fixed" id="breadcrumbs">
		<ul class="breadcrumb">
			<li>
				<i class="ace-icon fa fa-home home-icon"></i>
				<a href="?module=beranda">Beranda</a>
			</li>

			<li>
				<a href="?module=pengiriman">Pengiriman</a>
			</li>

			<li class="active">Tambah</li>
		</ul><!-- /.breadcrumb -->
	</div>

	<div class="page-content">
		<div class="page-header">
			<h1 style="color:#585858">
				<i class="ace-icon fa fa-edit"></i>
				Input Pengiriman
			</h1>
		</div><!-- /.page-header -->

		<div class="row">
			<div class="col-xs-12">
				<!--PAGE CONTENT BEGINS-->
				<form class="form-horizontal" role="form" action="modules/pengiriman/proses.php?act=insert" method="POST" name="frmpengiriman" />

					<div class="form-group">
						<?php  
						// fungsi untuk membuat no pengiriman
			            $query_id = mysqli_query($mysqli, "SELECT RIGHT(no_pengiriman,3) as kode FROM pengiriman
			                                            ORDER BY no_pengiriman DESC LIMIT 1")
			                                            or die('Ada kesalahan pada query tampil no penerimaan : '.mysqli_error($mysqli));

			            $count = mysqli_num_rows($query_id);

			            if ($count <> 0) {
			                // mengambil data no_pengiriman
			                $data_id = mysqli_fetch_assoc($query_id);

			                $kode = $data_id['kode']+1;
			            } else {
			                $kode = 1;
			            }

			            // buat no_pengiriman
						$year          = gmdate("y");
						$buat_id       = str_pad($kode, 3, "0", STR_PAD_LEFT);
						$no_pengiriman = "$year$buat_id";
						?>
						<label class="col-sm-2 control-label no-padding-right">No. Pengiriman</label>

						<div class="col-sm-4">
							<input type="text" class="form-control" name="no_pengiriman" value="<?php echo $no_pengiriman; ?>" readonly required />
						</div>
					</div>

					<div class="form-group">
						<label class="col-sm-2 control-label no-padding-right">Tanggal</label>

						<div class="col-sm-4">
							<div class="input-group">
								<input class="form-control date-picker" type="text" data-date-format="dd-mm-yyyy" name="tgl_pengiriman" value="<?php echo date("d-m-Y"); ?>" required />
								<span class="input-group-addon">
									<i class="fa fa-calendar bigger-110"></i>
								</span>
							</div>
						</div>
					</div>

					<div class="hr hr-16 dotted"></div>

					<div class="form-group">
						<label class="col-sm-2 control-label no-padding-right">Nama Pengirim</label>

						<div class="col-sm-4">
							<div class="input-group">
								<input type="hidden" id="id_pengirim" name="id_pengirim" />
								<input type="text" class="form-control" id="pengirim" name="pengirim" readonly required />
								<a class="input-group-addon" data-toggle="modal" href="#modal-form">
									<i class="ace-icon fa fa-search"></i>
								</a>
							</div>
						</div>
					</div>

					<div class="form-group">
						<label class="col-sm-2 control-label no-padding-right">Alamat</label>

						<div class="col-sm-4">
							<textarea class="form-control" id="alamat_pengirim" name="alamat_pengirim" rows="2" readonly required></textarea>
						</div>
					</div>

					<div class="hr hr-16 dotted"></div>

					<div class="form-group">
						<label class="col-sm-2 control-label no-padding-right">Penerima</label>

						<div class="col-sm-4">
							<input type="text" class="form-control" name="penerima" autocomplete="off" required />
						</div>
					</div>

					<div class="form-group">
						<label class="col-sm-2 control-label no-padding-right">Alamat</label>

						<div class="col-sm-4">
							<textarea class="form-control" name="alamat_penerima" rows="2" required></textarea>
						</div>
					</div>

					<div class="hr hr-16 dotted"></div>

					<div class="form-group">
						<label class="col-sm-2 control-label no-padding-right">Nama Barang</label>

						<div class="col-sm-4">
							<input type="text" class="form-control" name="nama_barang" autocomplete="off" required />
						</div>
					</div>

					<div class="form-group">
						<label class="col-sm-2 control-label no-padding-right">Jumlah</label>

						<div class="col-sm-4">
							<input type="text" class="form-control" name="jumlah_barang"  autocomplete="off" onKeyPress="return goodchars(event,'0123456789',this)" required />
						</div>
					</div>

					<div class="form-group">
						<label class="col-sm-2 control-label no-padding-right">Berat</label>

						<div class="col-sm-4">
							<div class="input-group">
								<input type="text" class="form-control" id="berat_barang" name="berat_barang" autocomplete="off" onKeyPress="return goodchars(event,'0123456789',this)" onkeyup="hitung_berat(this)" required />
								<span class="input-group-addon">Kg</span>
							</div>
						</div>
					</div>

					<div class="form-group">
						<label class="col-sm-2 control-label no-padding-right">Biaya Kirim</label>

						<div class="col-sm-4">
							<div class="input-group">
								<span class="input-group-addon">Rp</span>
								<input type="text" class="form-control" id="biaya_kirim" name="biaya_kirim" autocomplete="off" onKeyPress="return goodchars(event,'0123456789',this)" readonly required />
							</div>
						</div>
					</div>

					<div class="hr hr-16 dotted"></div>

					<div class="form-group">
						<label class="col-sm-2 control-label no-padding-right">Kendaraan</label>

						<div class="col-sm-4">
							<div class="input-group">
								<input type="text" class="form-control" id="no_polisi" name="no_polisi" readonly required />
								<a class="input-group-addon" data-toggle="modal" href="#modal-form1">
									<i class="ace-icon fa fa-search"></i>
								</a>
							</div>
						</div>
					</div>

					<div class="form-group">
						<label class="col-sm-2 control-label no-padding-right">Supir</label>

						<div class="col-sm-4">
							<input type="text" class="form-control" id="nama_supir" name="nama_supir" autocomplete="off" readonly required />
						</div>
					</div>

					<div class="clearfix form-actions">
						<div class="col-md-offset-2 col-md-10">
							<input style="width:100px" type="submit" class="btn btn-primary" name="simpan" value="Simpan" />
							&nbsp; &nbsp;
							<a style="width:100px" href="?module=pengiriman" class="btn">Batal</a>
						</div>
					</div>
				</form>
				<!--PAGE CONTENT ENDS-->
			</div><!--/.span-->
		</div><!--/.row-fluid-->
	</div><!--/.page-content-->
	
	<div id="modal-form" class="modal" tabindex="-1">
		<div style="width:800px" class="modal-dialog">
			<div class="modal-content">
				<div class="modal-header">
					<button type="button" class="close" data-dismiss="modal">&times;</button>
					<h4 class="blue bigger">Data Pelanggan</h4>
				</div>

				<div class="modal-body">
					<div class="row">
						<div class="col-xs-12">
							<table id="dynamic-table" class="table table-striped table-bordered table-hover">
								<thead>
									<tr>
										<th>No.</th>
										<th>No. KTP</th>
										<th>Nama</th>
										<th>Alamat</th>
										<th></th>
									</tr>
								</thead>

								<tbody>
								<?php
								$no = 1;
								// fungsi query untuk menampilkan data dari tabel ikan masuk, ikan dan nelayan
								$query = mysqli_query($mysqli, "SELECT no_ktp,nama_pelanggan,alamat FROM pelanggan
																ORDER BY nama_pelanggan ASC")
																or die('Ada kesalahan pada query tampil data pelanggan: '.mysqli_error($mysqli));

	                            while ($data = mysqli_fetch_assoc($query)) { 
									$no_ktp         = $data['no_ktp'];
									$nama_pelanggan = $data['nama_pelanggan'];
									$alamat         = $data['alamat'];
	                            ?>
	                            	<tr>
										<td width="30" class="center"><?php echo $no; ?></td>
										<td width="100" class="center"><?php echo $no_ktp; ?></td>
										<td width="150"><?php echo $nama_pelanggan; ?></td>
										<td width="200"><?php echo $alamat; ?></td>

										<td width="50" class="center">
											<div class="action-buttons">
												<button data-rel="tooltip" data-placement="top" title="Pilih" class="pilih_pelanggan tooltip-info btn btn-primary btn-xs" data-id-p="<?php echo $no_ktp; ?>" data-nama-p="<?php echo $nama_pelanggan; ?>" data-alamat-p="<?php echo $alamat; ?>">
													<i class="ace-icon fa fa-check bigger-130 icon-only"></i>
												</button>
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
				</div>
			</div>
		</div>
	</div>

	<div id="modal-form1" class="modal" tabindex="-1">
		<div style="width:800px" class="modal-dialog">
			<div class="modal-content">
				<div class="modal-header">
					<button type="button" class="close" data-dismiss="modal">&times;</button>
					<h4 class="blue bigger">Data Kendaraan</h4>
				</div>

				<div class="modal-body">
					<div class="row">
						<div class="col-xs-12">
							<table id="dynamic-table" class="table table-striped table-bordered table-hover">
								<thead>
									<tr>
										<th>No.</th>
										<th>No. Kendaraan</th>
										<th>Merk</th>
										<th>Supir</th>
										<th></th>
									</tr>
								</thead>

								<tbody>
								<?php
								$no = 1;
								// fungsi query untuk menampilkan data dari tabel ikan masuk, ikan dan nelayan
								$query = mysqli_query($mysqli, "SELECT * FROM kendaraan as a INNER JOIN supir as b 
																ON a.supir=b.no_ktp 
																ORDER BY a.no_polisi DESC")
																or die('Ada kesalahan pada query tampil data pelanggan: '.mysqli_error($mysqli));

	                            while ($data = mysqli_fetch_assoc($query)) { 
									$no_polisi  = $data['no_polisi'];
									$merk       = $data['merk'];
									$nama_supir = $data['nama_supir'];
	                            ?>
	                            	<tr>
										<td width="30" class="center"><?php echo $no; ?></td>
										<td width="100" class="center"><?php echo $no_polisi; ?></td>
										<td width="150"><?php echo $merk; ?></td>
										<td width="150"><?php echo $nama_supir; ?></td>

										<td width="50" class="center">
											<div class="action-buttons">
												<button data-rel="tooltip" data-placement="top" title="Pilih" class="pilih_kendaraan tooltip-info btn btn-primary btn-xs" data-id-k="<?php echo $no_polisi; ?>" data-nama-s="<?php echo $nama_supir; ?>">
													<i class="ace-icon fa fa-check bigger-130 icon-only"></i>
												</button>
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
				</div>
			</div>
		</div>
	</div>

	<script type="text/javascript" src="assets/js/jquery.min.js"></script>

	<!-- Javascript untuk popup modal Edit--> 
	<script type="text/javascript">
	   	$(document).on('click','.pilih_pelanggan',function(){
			var id_pengirim     = $(this).attr('data-id-p');
			var nama_pengirim   = $(this).attr('data-nama-p');
			var alamat_pengirim = $(this).attr('data-alamat-p');

			$('#id_pengirim').val(id_pengirim);
			$('#pengirim').val(nama_pengirim);
			$('#alamat_pengirim').val(alamat_pengirim);

  		   	$("#modal-form").modal('hide');
	    });
	</script>

	<!-- Javascript untuk popup modal Edit--> 
	<script type="text/javascript">
	   	$(document).on('click','.pilih_kendaraan',function(){
			var no_polisi  = $(this).attr('data-id-k');
			var nama_supir = $(this).attr('data-nama-s');

			$('#no_polisi').val(no_polisi);
			$('#nama_supir').val(nama_supir);

  		   	$("#modal-form1").modal('hide');
	    });
	</script>
<?php
}
// jika form edit data yang dipilih
elseif ($_GET['form']=='edit') {
	if (isset($_GET['id'])) {
	    // fungsi query untuk menampilkan data dari tabel pengiriman
	    $query = mysqli_query($mysqli, "SELECT a.no_pengiriman,a.tgl_pengiriman,a.pengirim,a.penerima,a.alamat_penerima,a.nama_barang,a.jumlah_barang,a.berat_barang,a.biaya_kirim,a.kendaraan,a.status,
										b.no_ktp as id_pelanggan,b.nama_pelanggan,b.alamat,
										c.no_polisi,c.supir,
										d.no_ktp as id_supir,d.nama_supir
										FROM pengiriman as a INNER JOIN pelanggan as b INNER JOIN kendaraan as c INNER JOIN supir as d
										ON a.pengirim=b.no_ktp AND a.kendaraan=c.no_polisi AND c.supir=d.no_ktp
										WHERE a.no_pengiriman='$_GET[id]'")
	    								or die('Ada kesalahan pada query tampil data ubah : '.mysqli_error($mysqli));
	    $data  = mysqli_fetch_assoc($query);

		$no_pengiriman   = $data['no_pengiriman'];
		
		$tanggal         = $data['tgl_pengiriman'];
		$tgl             = explode('-',$tanggal);
		$tgl_pengiriman  = $tgl[2]."-".$tgl[1]."-".$tgl[0];
		
		$no_ktp          = $data['id_pelanggan'];
		$pengirim        = $data['nama_pelanggan'];
		$alamat_pengirim = $data['alamat'];
		$penerima        = $data['penerima'];
		$alamat_penerima = $data['alamat_penerima'];
		$nama_barang     = $data['nama_barang'];
		$jumlah_barang   = $data['jumlah_barang'];
		$berat_barang    = $data['berat_barang'];
		$biaya_kirim     = $data['biaya_kirim'];
		$no_polisi       = $data['no_polisi'];
		$nama_supir      = $data['nama_supir'];
		$status          = $data['status'];
	}
?>
	<script type="text/javascript">
		function hitung_berat() {
	        bil1 = document.frmpengiriman.berat_barang.value;
	        if (bil1=='') {
	            var hasil = 0;
	        } 
	        else {
	            var hasil = eval(bil1) * 10000;
	        };
	        document.frmpengiriman.biaya_kirim.value=(hasil);
	    }
	</script>

	<div class="breadcrumbs breadcrumbs-fixed" id="breadcrumbs">
		<ul class="breadcrumb">
			<li>
				<i class="ace-icon fa fa-home home-icon"></i>
				<a href="?module=beranda">Beranda</a>
			</li>

			<li>
				<a href="?module=pengiriman">Pengiriman</a>
			</li>

			<li class="active">Ubah</li>
		</ul><!-- /.breadcrumb -->
	</div>

	<div class="page-content">
		<div class="page-header">
			<h1 style="color:#585858">
				<i class="ace-icon fa fa-edit"></i>
				Ubah Pengiriman
			</h1>
		</div><!-- /.page-header -->

		<div class="row">
			<div class="col-xs-12">
				<!--PAGE CONTENT BEGINS-->
				<form class="form-horizontal" role="form" action="modules/pengiriman/proses.php?act=update" method="POST" name="frmpengiriman" />
					
					<div class="form-group">
						<label class="col-sm-2 control-label no-padding-right">No. Pengiriman</label>

						<div class="col-sm-4">
							<input type="text" class="form-control" name="no_pengiriman" value="<?php echo $no_pengiriman; ?>" readonly required />
						</div>
					</div>

					<div class="form-group">
						<label class="col-sm-2 control-label no-padding-right">Tanggal</label>

						<div class="col-sm-4">
							<div class="input-group">
								<input class="form-control date-picker" type="text" data-date-format="dd-mm-yyyy" name="tgl_pengiriman" value="<?php echo $tgl_pengiriman; ?>" required />
								<span class="input-group-addon">
									<i class="fa fa-calendar bigger-110"></i>
								</span>
							</div>
						</div>
					</div>

					<div class="hr hr-16 dotted"></div>

					<div class="form-group">
						<label class="col-sm-2 control-label no-padding-right">Nama Pengirim</label>

						<div class="col-sm-4">
							<div class="input-group">
								<input type="hidden" id="id_pengirim" name="id_pengirim" value="<?php echo $no_ktp; ?>" />
								<input type="text" class="form-control" id="pengirim" name="pengirim" value="<?php echo $pengirim; ?>" readonly required />
								<a class="input-group-addon" data-toggle="modal" href="#modal-form">
									<i class="ace-icon fa fa-search"></i>
								</a>
							</div>
						</div>
					</div>

					<div class="form-group">
						<label class="col-sm-2 control-label no-padding-right">Alamat</label>

						<div class="col-sm-4">
							<textarea class="form-control" id="alamat_pengirim" name="alamat_pengirim" rows="2" readonly required><?php echo $alamat_pengirim; ?></textarea>
						</div>
					</div>

					<div class="hr hr-16 dotted"></div>

					<div class="form-group">
						<label class="col-sm-2 control-label no-padding-right">Penerima</label>

						<div class="col-sm-4">
							<input type="text" class="form-control" name="penerima" autocomplete="off" value="<?php echo $penerima; ?>" required />
						</div>
					</div>

					<div class="form-group">
						<label class="col-sm-2 control-label no-padding-right">Alamat</label>

						<div class="col-sm-4">
							<textarea class="form-control" name="alamat_penerima" rows="2" required><?php echo $alamat_penerima; ?></textarea>
						</div>
					</div>

					<div class="hr hr-16 dotted"></div>

					<div class="form-group">
						<label class="col-sm-2 control-label no-padding-right">Nama Barang</label>

						<div class="col-sm-4">
							<input type="text" class="form-control" value="<?php echo $nama_barang; ?>" name="nama_barang" autocomplete="off" required />
						</div>
					</div>

					<div class="form-group">
						<label class="col-sm-2 control-label no-padding-right">Jumlah</label>

						<div class="col-sm-4">
							<input type="text" class="form-control" name="jumlah_barang"  autocomplete="off" onKeyPress="return goodchars(event,'0123456789',this)" value="<?php echo $jumlah_barang; ?>" required />
						</div>
					</div>

					<div class="form-group">
						<label class="col-sm-2 control-label no-padding-right">Berat</label>

						<div class="col-sm-4">
							<div class="input-group">
								<input type="text" class="form-control" name="berat_barang" autocomplete="off" onKeyPress="return goodchars(event,'0123456789',this)" onkeyup="hitung_berat(this)" value="<?php echo $berat_barang; ?>" required />
								<span class="input-group-addon">Kg</span>
							</div>
						</div>
					</div>

					<div class="form-group">
						<label class="col-sm-2 control-label no-padding-right">Biaya Kirim</label>

						<div class="col-sm-4">
							<div class="input-group">
								<span class="input-group-addon">Rp</span>
								<input type="text" class="form-control" id="biaya_kirim" name="biaya_kirim" autocomplete="off" onKeyPress="return goodchars(event,'0123456789',this)" value="<?php echo format_rupiah_nol($biaya_kirim); ?>" readonly required />
							</div>
						</div>
					</div>

					<div class="hr hr-16 dotted"></div>

					<div class="form-group">
						<label class="col-sm-2 control-label no-padding-right">Kendaraan</label>

						<div class="col-sm-4">
							<div class="input-group">
								<input type="text" class="form-control" id="no_polisi" name="no_polisi" value="<?php echo $no_polisi; ?>" readonly required />
								<a class="input-group-addon" data-toggle="modal" href="#modal-form1">
									<i class="ace-icon fa fa-search"></i>
								</a>
							</div>
						</div>
					</div>

					<div class="form-group">
						<label class="col-sm-2 control-label no-padding-right">Supir</label>

						<div class="col-sm-4">
							<input type="text" class="form-control" id="nama_supir" name="nama_supir" autocomplete="off" value="<?php echo $nama_supir; ?>" readonly required />
						</div>
					</div>
					
					<div class="hr hr-16 dotted"></div>

					<div class="form-group">
						<label class="col-sm-2 control-label no-padding-right">Status</label>

						<div class="col-sm-9">
							<div class="radio">
							<?php  
							if ($status=='Proses Pengiriman') { ?>
								<label>
									<input type="radio" class="ace" name="status" value="Proses Pengiriman" checked="" />
									<span class="lbl"> Proses Pengiriman</span>
								</label>

								<label>
									<input type="radio" class="ace" name="status" value="Barang Terkirim" />
									<span class="lbl"> Barang Terkirim</span>
								</label>
							<?php
							} else { ?>
								<label>
									<input type="radio" class="ace" name="status" value="Proses Pengiriman" />
									<span class="lbl"> Proses Pengiriman</span>
								</label>

								<label>
									<input type="radio" class="ace" name="status" value="Barang Terkirim" checked="" />
									<span class="lbl"> Barang Terkirim</span>
								</label>
							<?php
							}
							?>
							</div>
						</div>
					</div>

					<div class="clearfix form-actions">
						<div class="col-md-offset-2 col-md-10">
							<input style="width:100px" type="submit" class="btn btn-primary" name="simpan" value="Simpan" />
							&nbsp; &nbsp;
							<a style="width:100px" href="?module=pengiriman" class="btn">Batal</a>
						</div>
					</div>
				</form>
				<!--PAGE CONTENT ENDS-->
			</div><!--/.span-->
		</div><!--/.row-fluid-->
	</div><!--/.page-content-->
	
	<div id="modal-form" class="modal" tabindex="-1">
		<div style="width:800px" class="modal-dialog">
			<div class="modal-content">
				<div class="modal-header">
					<button type="button" class="close" data-dismiss="modal">&times;</button>
					<h4 class="blue bigger">Data Pelanggan</h4>
				</div>

				<div class="modal-body">
					<div class="row">
						<div class="col-xs-12">
							<table id="dynamic-table" class="table table-striped table-bordered table-hover">
								<thead>
									<tr>
										<th>No.</th>
										<th>No. KTP</th>
										<th>Nama</th>
										<th>Alamat</th>
										<th></th>
									</tr>
								</thead>

								<tbody>
								<?php
								$no = 1;
								// fungsi query untuk menampilkan data dari tabel ikan masuk, ikan dan nelayan
								$query = mysqli_query($mysqli, "SELECT no_ktp,nama_pelanggan,alamat FROM pelanggan
																ORDER BY nama_pelanggan ASC")
																or die('Ada kesalahan pada query tampil data pelanggan: '.mysqli_error($mysqli));

	                            while ($data = mysqli_fetch_assoc($query)) { 
									$no_ktp         = $data['no_ktp'];
									$nama_pelanggan = $data['nama_pelanggan'];
									$alamat         = $data['alamat'];
	                            ?>
	                            	<tr>
										<td width="30" class="center"><?php echo $no; ?></td>
										<td width="100" class="center"><?php echo $no_ktp; ?></td>
										<td width="150"><?php echo $nama_pelanggan; ?></td>
										<td width="200"><?php echo $alamat; ?></td>

										<td width="50" class="center">
											<div class="action-buttons">
												<button data-rel="tooltip" data-placement="top" title="Pilih" class="pilih_pelanggan tooltip-info btn btn-primary btn-xs" data-id-p="<?php echo $no_ktp; ?>" data-nama-p="<?php echo $nama_pelanggan; ?>" data-alamat-p="<?php echo $alamat; ?>">
													<i class="ace-icon fa fa-check bigger-130 icon-only"></i>
												</button>
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
				</div>
			</div>
		</div>
	</div>

	<div id="modal-form1" class="modal" tabindex="-1">
		<div style="width:800px" class="modal-dialog">
			<div class="modal-content">
				<div class="modal-header">
					<button type="button" class="close" data-dismiss="modal">&times;</button>
					<h4 class="blue bigger">Data Kendaraan</h4>
				</div>

				<div class="modal-body">
					<div class="row">
						<div class="col-xs-12">
							<table id="dynamic-table" class="table table-striped table-bordered table-hover">
								<thead>
									<tr>
										<th>No.</th>
										<th>No. Kendaraan</th>
										<th>Merk</th>
										<th>Supir</th>
										<th></th>
									</tr>
								</thead>

								<tbody>
								<?php
								$no = 1;
								// fungsi query untuk menampilkan data dari tabel ikan masuk, ikan dan nelayan
								$query = mysqli_query($mysqli, "SELECT * FROM kendaraan as a INNER JOIN supir as b 
																ON a.supir=b.no_ktp 
																ORDER BY a.no_polisi DESC")
																or die('Ada kesalahan pada query tampil data pelanggan: '.mysqli_error($mysqli));

	                            while ($data = mysqli_fetch_assoc($query)) { 
									$no_polisi  = $data['no_polisi'];
									$merk       = $data['merk'];
									$nama_supir = $data['nama_supir'];
	                            ?>
	                            	<tr>
										<td width="30" class="center"><?php echo $no; ?></td>
										<td width="100" class="center"><?php echo $no_polisi; ?></td>
										<td width="150"><?php echo $merk; ?></td>
										<td width="150"><?php echo $nama_supir; ?></td>

										<td width="50" class="center">
											<div class="action-buttons">
												<button data-rel="tooltip" data-placement="top" title="Pilih" class="pilih_kendaraan tooltip-info btn btn-primary btn-xs" data-id-k="<?php echo $no_polisi; ?>" data-nama-s="<?php echo $nama_supir; ?>">
													<i class="ace-icon fa fa-check bigger-130 icon-only"></i>
												</button>
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
				</div>
			</div>
		</div>
	</div>

	<script type="text/javascript" src="assets/js/jquery.min.js"></script>

	<!-- Javascript untuk popup modal Edit--> 
	<script type="text/javascript">
	   	$(document).on('click','.pilih_pelanggan',function(){
			var id_pengirim     = $(this).attr('data-id-p');
			var nama_pengirim   = $(this).attr('data-nama-p');
			var alamat_pengirim = $(this).attr('data-alamat-p');

			$('#id_pengirim').val(id_pengirim);
			$('#pengirim').val(nama_pengirim);
			$('#alamat_pengirim').val(alamat_pengirim);

  		   	$("#modal-form").modal('hide');
	    });
	</script>

	<!-- Javascript untuk popup modal Edit--> 
	<script type="text/javascript">
	   	$(document).on('click','.pilih_kendaraan',function(){
			var no_polisi  = $(this).attr('data-id-k');
			var nama_supir = $(this).attr('data-nama-s');

			$('#no_polisi').val(no_polisi);
			$('#nama_supir').val(nama_supir);

  		   	$("#modal-form1").modal('hide');
	    });
	</script>
<?php
}
// jika form edit data yang dipilih
elseif ($_GET['form']=='detail') {
	if (isset($_GET['id'])) {
	    // fungsi query untuk menampilkan data dari tabel pengiriman
	    $query = mysqli_query($mysqli, "SELECT a.no_pengiriman,a.tgl_pengiriman,a.pengirim,a.penerima,a.alamat_penerima,a.nama_barang,a.jumlah_barang,a.berat_barang,a.biaya_kirim,a.kendaraan,a.status,
										b.no_ktp as id_pelanggan,b.nama_pelanggan,b.alamat,
										c.no_polisi,c.supir,
										d.no_ktp as id_supir,d.nama_supir
										FROM pengiriman as a INNER JOIN pelanggan as b INNER JOIN kendaraan as c INNER JOIN supir as d
										ON a.pengirim=b.no_ktp AND a.kendaraan=c.no_polisi AND c.supir=d.no_ktp
										WHERE a.no_pengiriman='$_GET[id]'")
	    								or die('Ada kesalahan pada query tampil data ubah : '.mysqli_error($mysqli));
	    $data  = mysqli_fetch_assoc($query);

		$no_pengiriman   = $data['no_pengiriman'];
		
		$tanggal         = $data['tgl_pengiriman'];
		$tgl             = explode('-',$tanggal);
		$tgl_pengiriman  = $tgl[2]."-".$tgl[1]."-".$tgl[0];
		
		$no_ktp          = $data['id_pelanggan'];
		$pengirim        = $data['nama_pelanggan'];
		$alamat_pengirim = $data['alamat'];
		$penerima        = $data['penerima'];
		$alamat_penerima = $data['alamat_penerima'];
		$nama_barang     = $data['nama_barang'];
		$jumlah_barang   = $data['jumlah_barang'];
		$berat_barang    = $data['berat_barang'];
		$biaya_kirim     = $data['biaya_kirim'];
		$no_polisi       = $data['no_polisi'];
		$nama_supir      = $data['nama_supir'];
		$status          = $data['status'];
	}
?>

	<div class="breadcrumbs breadcrumbs-fixed" id="breadcrumbs">
		<ul class="breadcrumb">
			<li>
				<i class="ace-icon fa fa-home home-icon"></i>
				<a href="?module=beranda">Beranda</a>
			</li>

			<li>
				<a href="?module=pengiriman">Pengiriman</a>
			</li>

			<li class="active">Detail</li>
		</ul><!-- /.breadcrumb -->
	</div>

	<div class="page-content">
		<div class="page-header">
			<h1 style="color:#585858">
				<i class="ace-icon fa fa-edit"></i>
				Detail Pengiriman
			</h1>
		</div><!-- /.page-header -->

		<div class="row">
			<div class="col-xs-12">
				<!--PAGE CONTENT BEGINS-->
				<form class="form-horizontal" role="form" action="modules/pengiriman/proses.php?act=update" method="POST" name="frmpengiriman" />
					
					<div class="form-group">
						<label class="col-sm-2 control-label no-padding-right">No. Pengiriman</label>

						<div class="col-sm-4">
							<input type="text" class="form-control" name="no_pengiriman" value="<?php echo $no_pengiriman; ?>" readonly required />
						</div>
					</div>

					<div class="form-group">
						<label class="col-sm-2 control-label no-padding-right">Tanggal</label>

						<div class="col-sm-4">
							<input class="form-control date-picker" type="text" data-date-format="dd-mm-yyyy" name="tgl_pengiriman" value="<?php echo $tgl_pengiriman; ?>" readonly required />
						</div>
					</div>

					<div class="hr hr-16 dotted"></div>

					<div class="form-group">
						<label class="col-sm-2 control-label no-padding-right">Nama Pengirim</label>

						<div class="col-sm-4">
							<input type="hidden" id="id_pengirim" name="id_pengirim" value="<?php echo $no_ktp; ?>" />
							<input type="text" class="form-control" id="pengirim" name="pengirim" value="<?php echo $pengirim; ?>" readonly required />
						</div>
					</div>

					<div class="form-group">
						<label class="col-sm-2 control-label no-padding-right">Alamat</label>

						<div class="col-sm-4">
							<textarea class="form-control" id="alamat_pengirim" name="alamat_pengirim" rows="2" readonly required><?php echo $alamat_pengirim; ?></textarea>
						</div>
					</div>

					<div class="hr hr-16 dotted"></div>

					<div class="form-group">
						<label class="col-sm-2 control-label no-padding-right">Penerima</label>

						<div class="col-sm-4">
							<input type="text" class="form-control" name="penerima" autocomplete="off" value="<?php echo $penerima; ?>" readonly required />
						</div>
					</div>

					<div class="form-group">
						<label class="col-sm-2 control-label no-padding-right">Alamat</label>

						<div class="col-sm-4">
							<textarea class="form-control" name="alamat_penerima" rows="2" readonly required><?php echo $alamat_penerima; ?></textarea>
						</div>
					</div>

					<div class="hr hr-16 dotted"></div>

					<div class="form-group">
						<label class="col-sm-2 control-label no-padding-right">Nama Barang</label>

						<div class="col-sm-4">
							<input type="text" class="form-control" value="<?php echo $nama_barang; ?>" name="nama_barang" autocomplete="off" readonly required />
						</div>
					</div>

					<div class="form-group">
						<label class="col-sm-2 control-label no-padding-right">Jumlah</label>

						<div class="col-sm-4">
							<input type="text" class="form-control" name="jumlah_barang"  autocomplete="off" onKeyPress="return goodchars(event,'0123456789',this)" value="<?php echo $jumlah_barang; ?>" readonly required />
						</div>
					</div>

					<div class="form-group">
						<label class="col-sm-2 control-label no-padding-right">Berat</label>

						<div class="col-sm-4">
							<div class="input-group">
								<input type="text" class="form-control" name="berat_barang" autocomplete="off" onKeyPress="return goodchars(event,'0123456789',this)" value="<?php echo $berat_barang; ?>" readonly required />
								<span class="input-group-addon">Kg</span>
							</div>
						</div>
					</div>

					<div class="form-group">
						<label class="col-sm-2 control-label no-padding-right">Biaya Kirim</label>

						<div class="col-sm-4">
							<div class="input-group">
								<span class="input-group-addon">Rp</span>
								<input type="text" class="form-control" id="biaya_kirim" name="biaya_kirim" autocomplete="off" onKeyPress="return goodchars(event,'0123456789',this)" value="<?php echo format_rupiah_nol($biaya_kirim); ?>" readonly required />
							</div>
						</div>
					</div>

					<div class="hr hr-16 dotted"></div>

					<div class="form-group">
						<label class="col-sm-2 control-label no-padding-right">Kendaraan</label>

						<div class="col-sm-4">
							<input type="text" class="form-control" id="no_polisi" name="no_polisi" value="<?php echo $no_polisi; ?>" readonly required />
						</div>
					</div>

					<div class="form-group">
						<label class="col-sm-2 control-label no-padding-right">Supir</label>

						<div class="col-sm-4">
							<input type="text" class="form-control" id="nama_supir" name="nama_supir" autocomplete="off" value="<?php echo $nama_supir; ?>" readonly required />
						</div>
					</div>

					<div class="hr hr-16 dotted"></div>

					<div class="form-group">
						<label class="col-sm-2 control-label no-padding-right">Status</label>

						<div class="col-sm-9">
							<div class="radio">
							<?php  
							if ($status=='Proses Pengiriman') { ?>
								<label>
									<input type="radio" class="ace" name="status" value="Proses Pengiriman" checked="" />
									<span class="lbl"> Proses Pengiriman</span>
								</label>

								<label>
									<input type="radio" class="ace" name="status" value="Barang Terkirim" />
									<span class="lbl"> Barang Terkirim</span>
								</label>
							<?php
							} else { ?>
								<label>
									<input type="radio" class="ace" name="status" value="Proses Pengiriman" />
									<span class="lbl"> Proses Pengiriman</span>
								</label>

								<label>
									<input type="radio" class="ace" name="status" value="Barang Terkirim" checked="" />
									<span class="lbl"> Barang Terkirim</span>
								</label>
							<?php
							}
							?>
							</div>
						</div>
					</div>

					<div class="clearfix form-actions">
						<div class="col-md-offset-2 col-md-10">
							<a style="width:100px" href="?module=pengiriman" class="btn">Kembali</a>
						</div>
					</div>
				</form>
				<!--PAGE CONTENT ENDS-->
			</div><!--/.span-->
		</div><!--/.row-fluid-->
	</div><!--/.page-content-->
<?php
}
?>