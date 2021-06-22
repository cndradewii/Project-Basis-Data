<div class="breadcrumbs breadcrumbs-fixed" id="breadcrumbs">
	<ul class="breadcrumb">
		<li class="active">
			<i class="ace-icon fa fa-home home-icon"></i>
			<a href="?module=beranda">Beranda</a>
		</li>
	</ul><!-- /.breadcrumb -->
</div>

<div class="page-content">
	<div class="row">
		<div class="col-xs-12">
			<!-- PAGE CONTENT BEGINS -->
			<div style="margin-top:10px" class="alert alert-block alert-info">
				<button type="button" class="close" data-dismiss="alert">
					<i class="ace-icon fa fa-times"></i>
				</button>
				<i class="ace-icon fa fa-user blue"></i>
				Selamat datang Admin
				
			</div>
			<!-- PAGE CONTENT ENDS -->
		</div><!-- /.col -->
	</div><!-- /.row -->

	<hr>

	<div class="row state-overview">
	<?php  
	if ($_SESSION['hak_akses']=='Pimpinan') { ?>
		<div class="col-lg-3 col-sm-6">
            <section style="background:#f1f2f7" class="panel">
                <div class="symbol red">
                    <a href="?module=laporan">
					    <i class="fa fa-file-text-o"></i>
					</a>
                </div>
                <div class="value">
                    <a href="?module=laporan">
	                    <h1 style="font-size:30px">+</h1>
	                    <p>Laporan</p>
                    </a>
                </div>
            </section>
       	</div>

       	<div class="col-lg-3 col-sm-6">
            <section style="background:#f1f2f7" class="panel">
                <div class="symbol red">
                    <a href="?module=pengguna">
					    <i class="fa fa-user"></i>
					</a>
                </div>
                <div class="value">
                    <a href="?module=form_pengguna&form=add">
	                    <h1 style="font-size:30px">+</h1>
	                    <p>Pengguna</p>
                    </a>
                </div>
            </section>
       	</div>
	<?php
	} else { ?>
		<div class="col-lg-3 col-sm-6">
            <section style="background:#f1f2f7" class="panel">
                <div class="symbol red">
                    <a href="?module=supir">
					    <i class="fa fa-user"></i>
					</a>
                </div>
                <div class="value">
                    <a href="?module=form_supir&form=add">
	                    <h1 style="font-size:30px">+</h1>
	                    <p>Supir</p>
                    </a>
                </div>
            </section>
        </div>

        <div class="col-lg-3 col-sm-6">
            <section style="background:#f1f2f7" class="panel">
                <div class="symbol red">
                    <a href="?module=kendaraan">
					    <i class="fa fa-truck"></i>
					</a>
                </div>
                <div class="value">
                    <a href="?module=form_kendaraan&form=add">
	                    <h1 style="font-size:30px">+</h1>
	                    <p>Kendaraan</p>
                    </a>
                </div>
            </section>
        </div>

		<div class="col-lg-3 col-sm-6">
            <section style="background:#f1f2f7" class="panel">
                <div class="symbol red">
                    <a href="?module=customers">
					    <i class="fa fa-user"></i>
					</a>
                </div>
                <div class="value">
                    <a href="?module=form_customers&form=add">
	                    <h1 style="font-size:30px">+</h1>
	                    <p>Customer Service</p>
                    </a>
                </div>
            </section>
        </div>

        <div class="col-lg-3 col-sm-6">
            <section style="background:#f1f2f7" class="panel">
                <div class="symbol red">
                    <a href="?module=pengiriman">
					    <i class="fa fa-clone"></i>
					</a>
                </div>
                <div class="value">
                    <a href="?module=form_pengiriman&form=add">
	                    <h1 style="font-size:30px">+</h1>
	                    <p>Pengiriman</p>
                    </a>
                </div>
            </section>
        </div>

		<div class="col-lg-3 col-sm-6">
            <section style="background:#f1f2f7" class="panel">
                <div class="symbol red">
                    <a href="?module=laporan">
					    <i class="fa fa-file-text-o"></i>
					</a>
                </div>
                <div class="value">
                    <a href="?module=laporan">
	                    <h1 style="font-size:30px">+</h1>
	                    <p>Laporan</p>
                    </a>
                </div>
            </section>
       	</div>
	<?php
	}
	?>
	</div>
</div><!-- /.page-content -->