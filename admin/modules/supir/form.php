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
				<a href="?module=supir">Supir</a>
			</li>

			<li class="active">Tambah</li>
		</ul><!-- /.breadcrumb -->
	</div>

	<div class="page-content">
		<div class="page-header">
			<h1 style="color:#585858">
				<i class="ace-icon fa fa-edit"></i>
				Input Data Supir
			</h1>
		</div><!-- /.page-header -->

		<div class="row">
			<div class="col-xs-12">
				<!--PAGE CONTENT BEGINS-->
				<form class="form-horizontal" role="form" action="modules/supir/proses.php?act=insert" method="POST" />

					<div class="form-group">
						<label class="col-sm-2 control-label no-padding-right">No. KTP</label>

						<div class="col-sm-9">
							<input type="text" class="col-xs-12 col-sm-5" name="no_ktp" maxlength="16" autocomplete="off" onKeyPress="return goodchars(event,'0123456789',this)" required />
						</div>
					</div>

					<div class="form-group">
						<label class="col-sm-2 control-label no-padding-right">Nama Supir</label>

						<div class="col-sm-9">
							<input type="text" class="col-xs-12 col-sm-5" name="nama_supir" autocomplete="off" required />
						</div>
					</div>

					<div class="form-group">
						<label class="col-sm-2 control-label no-padding-right">Alamat</label>

						<div class="col-sm-9">
							<textarea class="col-xs-12 col-sm-5" name="alamat" rows="2" required></textarea>
						</div>
					</div>

					<div class="form-group">
						<label class="col-sm-2 control-label no-padding-right">Telepon</label>

						<div class="col-sm-9">
							<input type="text" class="col-xs-12 col-sm-5" name="telepon" maxlength="12" autocomplete="off" onKeyPress="return goodchars(event,'0123456789',this)" required />
						</div>
					</div>

					<div class="clearfix form-actions">
						<div class="col-md-offset-2 col-md-10">
							<input style="width:100px" type="submit" class="btn btn-primary" name="simpan" value="Simpan" />
							&nbsp; &nbsp; 
							<a style="width:100px" href="?module=supir" class="btn">Batal</a>
						</div>
					</div>
				</form>
				<!--PAGE CONTENT ENDS-->
			</div><!--/.span-->
		</div><!--/.row-fluid-->
	</div><!--/.page-content-->
<?php
}
// jika form edit data yang dipilih
elseif ($_GET['form']=='edit') { 
	if (isset($_GET['id'])) {
	    // fungsi query untuk menampilkan data dari tabel supir
	    $query = mysqli_query($mysqli, "SELECT * FROM supir WHERE no_ktp='$_GET[id]'") 
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
				<a href="?module=supir">Supir</a>
			</li>

			<li class="active">Ubah</li>
		</ul><!-- /.breadcrumb -->
	</div>

	<div class="page-content">
		<div class="page-header">
			<h1 style="color:#585858">
				<i class="ace-icon fa fa-edit"></i>
				Ubah Data Supir
			</h1>
		</div><!-- /.page-header -->

		<div class="row">
			<div class="col-xs-12">
				<!--PAGE CONTENT BEGINS-->
				<form class="form-horizontal" role="form" action="modules/supir/proses.php?act=update" method="POST" />

					<div class="form-group">
						<label class="col-sm-2 control-label no-padding-right">No. KTP</label>

						<div class="col-sm-9">
							<input type="text" class="col-xs-12 col-sm-5" name="no_ktp" value="<?php echo $data['no_ktp']; ?>" readonly required />
						</div>
					</div>

					<div class="form-group">
						<label class="col-sm-2 control-label no-padding-right">Nama Supir</label>

						<div class="col-sm-9">
							<input type="text" class="col-xs-12 col-sm-5" name="nama_supir" autocomplete="off" value="<?php echo $data['nama_supir']; ?>" required />
						</div>
					</div>

					<div class="form-group">
						<label class="col-sm-2 control-label no-padding-right">Alamat</label>

						<div class="col-sm-9">
							<textarea class="col-xs-12 col-sm-5" name="alamat" rows="2" required><?php echo $data['alamat']; ?></textarea>
						</div>
					</div>

					<div class="form-group">
						<label class="col-sm-2 control-label no-padding-right">Telepon</label>

						<div class="col-sm-9">
							<input type="text" class="col-xs-12 col-sm-5" name="telepon" maxlength="12" autocomplete="off" onKeyPress="return goodchars(event,'0123456789',this)" value="<?php echo $data['telepon']; ?>" required />
						</div>
					</div>
								
					<div class="clearfix form-actions">
						<div class="col-md-offset-2 col-md-10">
							<input style="width:100px" type="submit" class="btn btn-primary" name="simpan" value="Simpan" />
							&nbsp; &nbsp; 
							<a style="width:100px" href="?module=supir" class="btn">Batal</a>
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