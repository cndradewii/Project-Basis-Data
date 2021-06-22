<!DOCTYPE html>
<html lang="en">
	<head>
		<meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1" />
		<meta charset="utf-8" />
		<title>Admin | PT.Pos Indonesia</title>

		<meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0" />
	    <meta name="description" content="Sistem Informasi Manajemen Pengiriman Barang" />
	    <meta name="author" content="PT Pos Indonesia" />

	    <!-- favicon -->
    	<link rel="shortcut icon" href="assets/img/favicon.png">

		<!-- bootstrap & fontawesome -->
		<link rel="stylesheet" type="text/css" href="assets/css/bootstrap.min.css" />
		<link rel="stylesheet" type="text/css" href="assets/plugins/font-awesome-4.6.3/css/font-awesome.min.css" />

		<!--fonts-->
		<link rel="stylesheet" type="text/css" href="assets/fonts/fonts.googleapis.com.css" />

		<!--ace styles-->
		<link rel="stylesheet" type="text/css" href="assets/css/ace.min.css" />
		<link rel="stylesheet" type="text/css" href="assets/css/ace-rtl.min.css" />
	</head>

	<body class="login-layout">
		<div class="main-container">
			<div class="main-content">
				<div class="row">
					<div class="col-sm-10 col-sm-offset-1">
						<div class="login-container">

							<div class="space-20"></div>
							<div class="space-20"></div>
							<div class="space-20"></div>
							<div class="space-20"></div>

							<div class="row-fluid">
								<div class="space-16"></div>
							<?php  
				            // fungsi untuk menampilkan pesan
				            // jika alert = "" (kosong)
				            // tampilkan pesan "" (kosong)
				            if (empty($_GET['alert'])) { ?>
				              	<div></div>
				            <?php
				            }
				            // jika alert = 1
				            // tampilkan pesan Gagal "username atau password salah, cek kembali username dan password Anda"
				            elseif ($_GET['alert'] == 1) { ?>
								<div class="alert alert-danger">
									<button type="button" class="close" data-dismiss="alert">
										<i class="ace-icon fa fa-times"></i>
									</button>
									<strong><i class="ace-icon fa fa-times-circle"></i> Gagal Login! </strong><br>
									username atau password salah, cek kembali username dan password Anda.
									<br>
								</div>
							<?php
							} 
							// jika alert = 2
				            // tampilkan pesan Sukses "Anda telah berhasil logout"
				            elseif ($_GET['alert'] == 2) { ?>
					        	<div class="alert alert-success">
									<button type="button" class="close" data-dismiss="alert">
										<i class="ace-icon fa fa-times"></i>
									</button>
									<strong><i class="ace-icon fa fa-check-circle"></i> Sukses! </strong><br>
									Anda telah berhasil logout.
									<br>
								</div>
				            <?php
				            }
				            ?>

							<div class="space-20"></div>
							
							<div class="position-relative">
								<div id="login-box" class="login-box visible widget-box no-border">
									<div class="widget-body">
										<div class="widget-main">
											<h4 style="font-size:20px" class="header lighter bigger">
												<i style="color:#777" class="ace-icon fa fa-user"></i>
												Silahkan Login
											</h4>

											<div class="space-6"></div>

											<form action="login-check.php" method="POST">
												<fieldset>
													<label class="block clearfix">
														<span class="block input-icon input-icon-right">
															<input type="text" class="form-control" name="username" placeholder="Username" required />
															<i class="ace-icon fa fa-user"></i>
														</span>
													</label>

													<label class="block clearfix">
														<span class="block input-icon input-icon-right">
															<input type="password" class="form-control" name="password" placeholder="Password" required />
															<i class="ace-icon fa fa-lock"></i>
														</span>
													</label>

													<div class="space"></div>

													<div class="clearfix">
														<button style="font-size:15px" type="submit" class="btn btn-primary btn-block">
															<i class="ace-icon fa fa-key"></i>
															<span class="bigger-110">Login</span>
														</button>
													</div>

													<div class="space-4"></div>
												</fieldset>
											</form>
										</div><!-- /.widget-main -->
									</div><!-- /.widget-body -->
								</div><!-- /.login-box -->
							</div><!-- /.position-relative -->
						</div>
					</div><!-- /.col -->
				</div><!-- /.row -->
			</div><!-- /.main-content -->
		</div><!-- /.main-container -->

		<!--basic scripts-->

		<!--[if !IE]> -->
		<script src="assets/js/jquery.2.1.1.min.js"></script>
		<!-- <![endif]-->

		<!--[if !IE]> -->
		<script type="text/javascript">
			window.jQuery || document.write("<script src='assets/js/jquery.min.js'>"+"<"+"/script>");
		</script>
		<!-- <![endif]-->
		
		<script type="text/javascript">
			if('ontouchstart' in document.documentElement) document.write("<script src='assets/js/jquery.mobile.custom.min.js'>"+"<"+"/script>");
		</script>

		<script src="assets/js/bootstrap.min.js"></script>
		
		<!--inline scripts related to this page-->
		<script type="text/javascript">
			jQuery(function($) {
			 	$(document).on('click', '.toolbar a[data-target]', function(e) {
					e.preventDefault();
					var target = $(this).data('target');
					$('.widget-box.visible').removeClass('visible');//hide others
					$(target).addClass('visible');//show target
			 	});
			});
		</script>
	</body>
</html>
