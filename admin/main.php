<?php
session_start();      // memulai session
?>

<!DOCTYPE html>
<html lang="en">
	<head>
		<meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1" />
		<meta charset="utf-8" />
		<title>Admin | Pos Indonesia</title>

		<meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0" />
	    <meta name="description" content="Sistem Informasi Manajemen Pengiriman Barang" />
	    <meta name="author" content="PT. Pos Indonesia" />

	    <!-- favicon -->
    	<link rel="shortcut icon" href="assets/img/favicon.png">

		<!-- bootstrap & fontawesome -->
		<link rel="stylesheet" type="text/css" href="assets/css/bootstrap.min.css" />
		<link rel="stylesheet" type="text/css" href="assets/plugins/font-awesome-4.6.3/css/font-awesome.min.css" />
		
		<!-- page specific plugin styles -->
		<link rel="stylesheet" type="text/css" href="assets/plugins/chosen/css/chosen.min.css" />
		<link rel="stylesheet" type="text/css" href="assets/plugins/datepicker/css/datepicker.min.css" />

		<!--fonts-->
		<link rel="stylesheet" type="text/css" href="assets/fonts/fonts.googleapis.com.css" />

		<!--ace styles-->
		<link rel="stylesheet" type="text/css" href="assets/css/ace.min.css" class="ace-main-stylesheet" id="main-ace-style" />
		<link rel="stylesheet" type="text/css" href="assets/js/ace-extra.min.js" />

		<!-- custom css -->
		<link rel="stylesheet" type="text/css" href="assets/css/style.css" />

		<!-- Fungsi untuk membatasi karakter yang diinputkan -->
    	<script language="javascript">
      	function getkey(e)
      	{
	      	if (window.event)
	         	return window.event.keyCode;
	      	else if (e)
	         	return e.which;
	      	else
	         	return null;
      	}

      	function goodchars(e, goods, field)
      	{
	      	var key, keychar;
	      	key = getkey(e);
	      	if (key == null) return true;
	       
	      	keychar = String.fromCharCode(key);
	      	keychar = keychar.toLowerCase();
	      	goods = goods.toLowerCase();
	       
	      	// check goodkeys
	      	if (goods.indexOf(keychar) != -1)
	          	return true;
	      	// control keys
	      	if ( key==null || key==0 || key==8 || key==9 || key==27 )
	         	return true;
	          
	      	if (key == 13) {
	          	var i;
	          	for (i = 0; i < field.form.elements.length; i++)
	              	if (field == field.form.elements[i])
	                  	break;
	          	i = (i + 1) % field.form.elements.length;
	          	field.form.elements[i].focus();
	          	return false;
	          	};
	      	// else return false
	      	return false;
    	}
    	</script>
	</head>

	<body class="no-skin">
		<div class="navbar navbar-default navbar-fixed-top">
			<div class="navbar-container" id="navbar-container">
				<button type="button" class="navbar-toggle menu-toggler pull-left" id="menu-toggler" data-target="#sidebar">
					<span class="sr-only">Toggle sidebar</span>

					<span class="icon-bar"></span>

					<span class="icon-bar"></span>

					<span class="icon-bar"></span>
				</button>

				<div class="navbar-header pull-left">
					<a href="?module=beranda" class="navbar-brand">
						<small>
							Pos Indonesia
						</small>
					</a>
				</div>

				<div class="navbar-buttons navbar-header pull-right" role="navigation">
					<ul class="nav ace-nav">
						<li class="light-blue">
							<a data-toggle="dropdown" href="#" class="dropdown-toggle">
								<i class="ace-icon fa fa-user"></i>
								<span class="user-info">
									<?php echo $_SESSION['nama_pengguna']; ?>
								</span>

								<i class="ace-icon fa fa-caret-down"></i>
							</a>

							<ul class="user-menu dropdown-menu-right dropdown-menu dropdown-yellow dropdown-caret dropdown-close">
								<li>
									<a href="?module=password">
										<i class="ace-icon fa fa-lock"></i>
										Ubah Password
									</a>
								</li>

								<li class="divider"></li>

								<li>
									<a data-toggle="modal" href="#logout">
										<i class="ace-icon fa fa-power-off"></i>
										Logout
									</a>
								</li>
							</ul>
						</li>
					</ul>
				</div>
			</div><!-- /.navbar-container -->
		</div>

		<div class="main-container" id="main-container">
			<div id="sidebar" class="sidebar responsive sidebar-fixed sidebar-scroll" data-sidebar="true" data-sidebar-scroll="true" data-sidebar-hover="true">

				<!-- panggil file "sidebar-menu.php" untuk menampilkan menu -->
              	<?php include "sidebar-menu.php"; ?>

				<div class="sidebar-toggle sidebar-collapse" id="sidebar-collapse">
					<i class="ace-icon fa fa-angle-double-left" data-icon1="ace-icon fa fa-angle-double-left" data-icon2="ace-icon fa fa-angle-double-right"></i>
				</div>
			</div>

			<div class="main-content">
				<div class="main-content-inner">

					<!-- panggil file "content.php" untuk menampilkan halaman konten-->
              		<?php include "content.php"; ?>
					
					<!-- Modal Logout -->
					<div class="modal fade" id="logout">
						<div class="modal-dialog">
						  	<div class="modal-content">
						    	<div class="modal-header">
						      		<button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
						      		<h4 class="modal-title"><i class="ace-icon fa fa-sign-out"> Logout</i></h4>
						    	</div>
						    	<div class="modal-body">
						      		<p>Apakah Anda yakin ingin logout? </p>
						    	</div>
						    	<div class="modal-footer">
						      		<a type="button" class="btn btn-danger" href="logout.php">Ya, Logout</a>
						      		<button type="button" class="btn btn-default" data-dismiss="modal">Kembali</button>
						    	</div>
						  	</div><!-- /.modal-content -->
						</div><!-- /.modal-dialog -->
					</div><!-- /.modal -->
				</div>
			</div><!-- /.main-content -->

			<div class="footer">
				<div class="footer-inner">
					<div class="footer-content">
						<span class="bigger-120">
							&copy; 2021 -
							<span class="blue bolder">PT. Pos Indonesia</span>
						</span>
					</div>
				</div>
			</div>

			<a href="#" id="btn-scroll-up" class="btn-scroll-up btn btn-sm btn-inverse">
				<i class="ace-icon fa fa-angle-double-up icon-only bigger-110"></i>
			</a>
		</div><!-- /.main-container -->

		<!-- basic scripts -->

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

		<!-- page specific plugin scripts -->
		<script src="assets/plugins/chosen/js/chosen.jquery.min.js"></script>
		<script src="assets/plugins/datepicker/js/bootstrap-datepicker.min.js"></script>
		<!-- <script src="assets/js/jquery.maskedinput.min.js"></script> -->
        <script src="assets/js/jquery.maskMoney.min.js"></script>

		<script src="assets/plugins/dataTables/jquery.dataTables.min.js"></script>
		<script src="assets/plugins/dataTables/jquery.dataTables.bootstrap.min.js"></script>

		<!-- ace scripts -->
		<script src="assets/js/ace-elements.min.js"></script>
		<script src="assets/js/ace.min.js"></script>
		
		<!-- inline scripts related to this page -->
		<script type="text/javascript">
			jQuery(function($) {
				if(!ace.vars['touch']) {
					// chosen select
					$('.chosen-select').chosen({allow_single_deselect:true}); 
					//resize the chosen on window resize
			
					$(window)
					.off('resize.chosen')
					.on('resize.chosen', function() {
						$('.chosen-select').each(function() {
							 var $this = $(this);
							 $this.next().css({'width': $this.parent().width()});
						})
					}).trigger('resize.chosen');
					//resize chosen on sidebar collapse/expand
					$(document).on('settings.ace.chosen', function(e, event_name, event_val) {
						if(event_name != 'sidebar_collapsed') return;
						$('.chosen-select').each(function() {
							 var $this = $(this);
							 $this.next().css({'width': $this.parent().width()});
						})
					});
			
			
					$('#chosen-multiple-style .btn').on('click', function(e){
						var target = $(this).find('input[type=radio]');
						var which = parseInt(target.val());
						if(which == 2) $('#form-field-select-4').addClass('tag-input-style');
						 else $('#form-field-select-4').removeClass('tag-input-style');
					});
				}

				// tooltip
        		$('[data-rel=tooltip]').tooltip();

        		// input mask
				// $('.input-mask-pukul').mask('99.99-99.99');

                // mask money
                $('#biaya_kirim').maskMoney({thousands:'.', decimal:',', precision:0});

				// datepicker plugin
				$('.date-picker').datepicker({
					autoclose: true,
					todayHighlight: true
				})

				// initiate dataTables plugin
				var oTable1 = 
				$('#dynamic-table')
				//.wrap("<div class='dataTables_borderWrap' />")   //if you are applying horizontal scrolling (sScrollX)
				.dataTable( {
					bAutoWidth: false,
					"aaSorting": [[ 0, "asc" ]],
			
					//,
					//"sScrollY": "200px",
					//"bPaginate": false,
			
					//"sScrollX": "100%",
					//"sScrollXInner": "120%",
					//"bScrollCollapse": true,
					//Note: if you are applying horizontal scrolling (sScrollX) on a ".table-bordered"
					//you may want to wrap the table inside a "div.dataTables_borderWrap" element
			
					//"iDisplayLength": 50
			    } );
				//oTable1.fnAdjustColumnSizing();
				
				$('#data-table')
				//.wrap("<div class='dataTables_borderWrap' />")   //if you are applying horizontal scrolling (sScrollX)
				.dataTable( {
					bAutoWidth: false,
					"aaSorting": [[ 0, "asc" ]],
			
					//,
					//"sScrollY": "200px",
					//"bPaginate": false,
			
					"sScrollX": "100%",
					"sScrollXInner": "120%",
					//"bScrollCollapse": true,
					//Note: if you are applying horizontal scrolling (sScrollX) on a ".table-bordered"
					//you may want to wrap the table inside a "div.dataTables_borderWrap" element
			
					//"iDisplayLength": 50
			    } );
				//oTable1.fnAdjustColumnSizing();
				
				$('#id-input-file-1 , #id-input-file-2').ace_file_input({
					no_file:'Tidak ada file ...',
					btn_choose:'Browse',
					btn_change:'Change',
					droppable:false,
					onchange:null,
					thumbnail:false, //| true | large
					whitelist:'gif|png|jpg|jpeg'
					//blacklist:'exe|php'
					//onchange:''
					//
				});
				//pre-show a file name, for example a previously selected file
				//$('#id-input-file-1').ace_file_input('show_file_list', ['myfile.txt'])
				
				$('#myTab a[data-toggle="tab"]').on('shown.bs.tab', function (e) {
				//if($(e.target).attr('href') == "#home") doSomethingNow();
				})
			})
		</script>

		<script src="assets/plugins/ckeditor/ckeditor.js"></script>

		<script>
		    var roxyFileman = 'assets/plugins/ckeditor/plugins/fileman/index.html';
		    $(function () {
		        CKEDITOR.replace('ckeditor', {filebrowserBrowseUrl: roxyFileman,
		            filebrowserImageBrowseUrl: roxyFileman + '?type=image',
		            removeDialogTabs: 'link:upload;image:upload'});
		    });
		</script>
	</body>
</html>
