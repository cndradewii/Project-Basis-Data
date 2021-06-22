<div class="breadcrumbs breadcrumbs-fixed" id="breadcrumbs">
	<ul class="breadcrumb">
		<li>
			<i class="ace-icon fa fa-home home-icon"></i>
			<a href="?module=beranda">Beranda</a>
		</li>

		<li class="active">Ubah Password</li>
	</ul><!-- /.breadcrumb -->
</div>

<div class="page-content">
	<div class="page-header">
		<h1 style="color:#585858">
			<i style="margin-right:7px" class="ace-icon fa fa-lock"></i>
			Ubah Password
		</h1>
	</div><!-- /.page-header -->
<?php
// fungsi untuk menampilkan pesan
// jika alert = "" (kosong)
// tampilkan pesan "" (kosong)
if (empty($_GET['alert'])) {
}
// jika alert = 1
// tampilkan pesan "paswword lama Anda salah"
elseif ($_GET['alert'] == 1) { ?>
	<div class="alert alert-danger">
		<button type="button" class="close" data-dismiss="alert">
			<i class="ace-icon fa fa-times"></i>
		</button>
		<strong><i class="ace-icon fa fa-times-circle"></i> Gagal! </strong><br>
		paswword lama Anda salah.
		<br>
	</div>
<?php
} 
// jika alert = 2
// tampilkan pesan "password baru dan ulangi password baru tidak cocok"
elseif ($_GET['alert'] == 2) { ?>
	<div class="alert alert-danger">
		<button type="button" class="close" data-dismiss="alert">
			<i class="ace-icon fa fa-times"></i>
		</button>
		<strong><i class="ace-icon fa fa-times-circle"></i> Gagal! </strong><br>
		password baru dan ulangi password baru tidak cocok.
		<br>
	</div>
<?php
}
// jika alert = 3
// tampilkan pesan "password tidak berhasil diubah"
elseif ($_GET['alert'] == 3) { ?>
	<div class="alert alert-success">
		<button type="button" class="close" data-dismiss="alert">
			<i class="ace-icon fa fa-times"></i>
		</button>
		<strong><i class="ace-icon fa fa-check-circle"></i> Sukses! </strong><br>
		password berhasil diubah.
		<br>
	</div>
<?php
} 
?>
	<div class="row">
		<div class="col-xs-12">
			<!--PAGE CONTENT BEGINS-->
			<form class="form-horizontal" role="form" action="modules/password/proses.php" method="POST" />
				
				<div class="form-group">
					<label class="col-sm-2 control-label no-padding-right">Password Lama</label>

					<div class="col-sm-9">
						<input type="password" class="col-xs-10 col-sm-5" name="old_pass" autocomplete="off" required />
					</div>
				</div>

				<div class="form-group">
					<label class="col-sm-2 control-label no-padding-right">Password Baru</label>

					<div class="col-sm-9">
						<input type="password" class="col-xs-10 col-sm-5" name="new_pass" autocomplete="off" required />
					</div>
				</div>

				<div class="form-group">
					<label class="col-sm-2 control-label no-padding-right">Ulangi Password Baru</label>

					<div class="col-sm-9">
						<input type="password" class="col-xs-10 col-sm-5" name="retype_pass" autocomplete="off" required />
					</div>
				</div>
							
				<div class="clearfix form-actions">
					<div class="col-md-offset-2 col-md-10">
						<input style="width:100px" type="submit" class="btn btn-primary" name="simpan" value="Simpan" />
						&nbsp; &nbsp; 
						<a style="width:100px" href="?module=beranda" class="btn">Batal</a>
					</div>
				</div>
			</form>
			<!--PAGE CONTENT ENDS-->
		</div><!--/.span-->
	</div><!--/.row-fluid-->
</div><!--/.page-content-->