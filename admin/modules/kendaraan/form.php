<?php  
// fungsi untuk pengecekan tampilan form
// jika form add data yang dipilih
if ($_GET['form']=='add') { ?>
 	<!-- tampilkan form add data -->
	<div class="breadcrumbs breadcrumbs-fixed" id="breadcrumbs">
		<ul class="breadcrumb">
			<li>
				<i class="ace-icon fa fa-home home-icon"></i>
				<a href="?module=beranda">Beranda</a>
			</li>

			<li>
				<a href="?module=kendaraan">Kendaraan</a>
			</li>

			<li class="active">Tambah</li>
		</ul><!-- /.breadcrumb -->
	</div>

	<div class="page-content">
		<div class="page-header">
			<h1 style="color:#585858">
				<i class="ace-icon fa fa-edit"></i>
				Input Data Kendaraan
			</h1>
		</div><!-- /.page-header -->

		<div class="row">
			<div class="col-xs-12">
				<!--PAGE CONTENT BEGINS-->
				<form class="form-horizontal" role="form" action="modules/kendaraan/proses.php?act=insert" method="POST" />

					<div class="form-group">
						<label class="col-sm-2 control-label no-padding-right">No. Polisi</label>

						<div class="col-sm-9">
							<input type="text" class="col-xs-12 col-sm-5" name="no_polisi" maxlength="11" autocomplete="off" required />
						</div>
					</div>

					<div class="form-group">
						<label class="col-sm-2 control-label no-padding-right">Merk</label>

						<div class="col-sm-9">
							<input type="text" class="col-xs-12 col-sm-5" name="merk" autocomplete="off" required />
						</div>
					</div>

					<div class="form-group">
						<label class="col-sm-2 control-label no-padding-right">No. Mesin</label>

						<div class="col-sm-9">
							<input type="text" class="col-xs-12 col-sm-5" name="no_mesin" maxlength="17" autocomplete="off" required />
						</div>
					</div>

					<div class="form-group">
						<label class="col-sm-2 control-label no-padding-right">Tahun</label>

						<div class="col-sm-9">
							<input type="text" class="col-xs-12 col-sm-5" name="tahun" maxlength="4" autocomplete="off" onKeyPress="return goodchars(event,'0123456789',this)" required />
						</div>
					</div>
					
					<div class="form-group">
						<label class="col-sm-2 control-label no-padding-right">Warna</label>

						<div class="col-sm-9">
							<input type="text" class="col-xs-12 col-sm-5" name="warna" autocomplete="off" required />
						</div>
					</div>

					<div class="form-group">
						<label class="col-sm-2 control-label no-padding-right">Supir</label>

						<div style="padding-right:24px" class="col-sm-4">
							<div class="input-group">
								<input type="hidden" id="no_ktp" name="no_ktp" />
								<input type="text" class="form-control" id="nama_supir" name="nama_supir" readonly required />
								<a class="input-group-addon" data-toggle="modal" href="#modal-form">
									<i class="ace-icon fa fa-search"></i>
								</a>
							</div>
						</div>
					</div>

					<div class="clearfix form-actions">
						<div class="col-md-offset-2 col-md-10">
							<input style="width:100px" type="submit" class="btn btn-primary" name="simpan" value="Simpan" />
							&nbsp; &nbsp; 
							<a style="width:100px" href="?module=kendaraan" class="btn">Batal</a>
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
					<h4 class="blue bigger">Data Supir</h4>
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
										<th>Telepon</th>
										<th></th>
									</tr>
								</thead>

								<tbody>
								<?php
								$no = 1;
								// fungsi query untuk menampilkan data dari tabel supir
								$query = mysqli_query($mysqli, "SELECT * FROM supir ORDER BY nama_supir ASC")
																or die('Ada kesalahan pada query tampil data supir: '.mysqli_error($mysqli));

	                            while ($data = mysqli_fetch_assoc($query)) { ?>
	                            	<tr>
										<td width="30" class="center"><?php echo $no; ?></td>
										<td width="70" class="center"><?php echo $data['no_ktp']; ?></td>
										<td width="150"><?php echo $data['nama_supir']; ?></td>
										<td width="200"><?php echo $data['alamat']; ?></td>
										<td width="60" class="center"><?php echo $data['telepon']; ?></td>

										<td width="50" class="center">
											<div class="action-buttons">
												<button data-rel="tooltip" data-placement="top" title="Pilih" class="pilih tooltip-info btn btn-primary btn-xs" data-id="<?php echo $data['no_ktp']; ?>" data-nama="<?php echo $data['nama_supir']; ?>">
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

	<!-- Javascript untuk popup modal dokumen--> 
	<script type="text/javascript">
	   	$(document).on('click','.pilih',function(){
	   		
			var no_ktp     = $(this).attr('data-id');
			var nama_supir = $(this).attr('data-nama');

			$('#no_ktp').val(no_ktp);
			$('#nama_supir').val(nama_supir);

  		   	$("#modal-form").modal('hide');
	    });
	</script>
<?php
}
// jika form edit data yang dipilih
elseif ($_GET['form']=='edit') { 
	if (isset($_GET['id'])) {
	    // fungsi query untuk menampilkan data dari tabel kendaraan
	    $query = mysqli_query($mysqli, "SELECT * FROM kendaraan as a INNER JOIN supir as b 
										ON a.supir=b.no_ktp 
										WHERE no_polisi='$_GET[id]'") 
	    								or die('Ada kesalahan pada query tampil data ubah : '.mysqli_error($mysqli));
	    $data  = mysqli_fetch_assoc($query);
  	}
?>
	<div class="breadcrumbs breadcrumbs-fixed" id="breadcrumbs">
		<ul class="breadcrumb">
			<li>
				<i class="ace-icon fa fa-home home-icon"></i>
				<a href="?module=beranda">Beranda</a>
			</li>

			<li>
				<a href="?module=kendaraan">Kendaraan</a>
			</li>

			<li class="active">Ubah</li>
		</ul><!-- /.breadcrumb -->
	</div>

	<div class="page-content">
		<div class="page-header">
			<h1 style="color:#585858">
				<i class="ace-icon fa fa-edit"></i>
				Ubah Data Kendaraan
			</h1>
		</div><!-- /.page-header -->

		<div class="row">
			<div class="col-xs-12">
				<!--PAGE CONTENT BEGINS-->
				<form class="form-horizontal" role="form" action="modules/kendaraan/proses.php?act=update" method="POST" />

					<div class="form-group">
						<label class="col-sm-2 control-label no-padding-right">No. Polisi</label>

						<div class="col-sm-9">
							<input type="text" class="col-xs-12 col-sm-5" name="no_polisi" value="<?php echo $data['no_polisi']; ?>" readonly required />
						</div>
					</div>

					<div class="form-group">
						<label class="col-sm-2 control-label no-padding-right">Merk</label>

						<div class="col-sm-9">
							<input type="text" class="col-xs-12 col-sm-5" name="merk" autocomplete="off" value="<?php echo $data['merk']; ?>" required />
						</div>
					</div>

					<div class="form-group">
						<label class="col-sm-2 control-label no-padding-right">No. Mesin</label>

						<div class="col-sm-9">
							<input type="text" class="col-xs-12 col-sm-5" name="no_mesin" maxlength="17" autocomplete="off" onKeyPress="return goodchars(event,'0123456789',this)" value="<?php echo $data['no_mesin']; ?>" required />
						</div>
					</div>

					<div class="form-group">
						<label class="col-sm-2 control-label no-padding-right">Tahun</label>

						<div class="col-sm-9">
							<input type="text" class="col-xs-12 col-sm-5" name="tahun" maxlength="4" autocomplete="off" onKeyPress="return goodchars(event,'0123456789',this)" value="<?php echo $data['tahun']; ?>" required />
						</div>
					</div>
					
					<div class="form-group">
						<label class="col-sm-2 control-label no-padding-right">Warna</label>

						<div class="col-sm-9">
							<input type="text" class="col-xs-12 col-sm-5" name="warna" autocomplete="off" value="<?php echo $data['warna']; ?>" required />
						</div>
					</div>

					<div class="form-group">
						<label class="col-sm-2 control-label no-padding-right">Supir</label>

						<div style="padding-right:24px" class="col-sm-4">
							<div class="input-group">
								<input type="hidden" id="no_ktp" name="no_ktp" value="<?php echo $data['no_ktp']; ?>" />
								<input type="text" class="form-control" id="nama_supir" name="nama_supir" value="<?php echo $data['nama_supir']; ?>" readonly required />
								<a class="input-group-addon" data-toggle="modal" href="#modal-form">
									<i class="ace-icon fa fa-search"></i>
								</a>
							</div>
						</div>
					</div>

					<div class="clearfix form-actions">
						<div class="col-md-offset-2 col-md-10">
							<input style="width:100px" type="submit" class="btn btn-primary" name="simpan" value="Simpan" />
							&nbsp; &nbsp; 
							<a style="width:100px" href="?module=kendaraan" class="btn">Batal</a>
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
					<h4 class="blue bigger">Data Supir</h4>
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
										<th>Telepon</th>
										<th></th>
									</tr>
								</thead>

								<tbody>
								<?php
								$no = 1;
								// fungsi query untuk menampilkan data dari tabel supir
								$query = mysqli_query($mysqli, "SELECT * FROM supir ORDER BY nama_supir ASC")
																or die('Ada kesalahan pada query tampil data supir: '.mysqli_error($mysqli));

	                            while ($data = mysqli_fetch_assoc($query)) { ?>
	                            	<tr>
										<td width="30" class="center"><?php echo $no; ?></td>
										<td width="70" class="center"><?php echo $data['no_ktp']; ?></td>
										<td width="150"><?php echo $data['nama_supir']; ?></td>
										<td width="200"><?php echo $data['alamat']; ?></td>
										<td width="60" class="center"><?php echo $data['telepon']; ?></td>

										<td width="50" class="center">
											<div class="action-buttons">
												<button data-rel="tooltip" data-placement="top" title="Pilih" class="pilih tooltip-info btn btn-primary btn-xs" data-id="<?php echo $data['no_ktp']; ?>" data-nama="<?php echo $data['nama_supir']; ?>">
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

	<!-- Javascript untuk popup modal dokumen--> 
	<script type="text/javascript">
	   	$(document).on('click','.pilih',function(){
	   		
			var no_ktp     = $(this).attr('data-id');
			var nama_supir = $(this).attr('data-nama');

			$('#no_ktp').val(no_ktp);
			$('#nama_supir').val(nama_supir);

  		   	$("#modal-form").modal('hide');
	    });
	</script>
<?php
}
?>