<br><br><br>

<!-- Page Heading/Breadcrumbs -->
<!-- <div class="row">
    <div class="col-lg-12">
        <div class="row">
            <div class="col-lg-12">

                <div class="panel panel-default">
                    <div style="background:#3c8dbc" class="panel-body">
                        <form class="form-inline" method="POST" action="?page=track">
							
			                <h4 style="margin-top:0;color:#fff;border-bottom:none" class="page-header">
			                    Lacak Pengiriman
			                </h4>

                            <div class="form-group">
                                <input type="text" class="form-control input-lg" name="harga" placeholder="No. Pengiriman" required>
                            </div>

                            <div class="form-group">
                                <a style="width:100px" class="btn btn-success btn-lg">Cek</a>
                            </div>
                        </form>
                        <br>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div> -->
<!-- /.row -->
<div class="row">
    <div class="col-lg-12">
        <div class="row">
            <div class="col-lg-12">

                <div class="panel panel-default">
                    <div style="background:#3c8dbc" class="panel-body">
                        <form class="form-horizontal" method="POST" action="?page=track">
                            
                            <h4 style="margin-top:0;color:#fff;border-bottom:none" class="page-header">
                                Lacak Pengiriman
                            </h4>

                            <div class="form-group">
                                <div class="col-sm-10">
                                    <input type="text" class="form-control input-lg" name="no_pengiriman" placeholder="No. Pengiriman" autocomplete="off" required>
                                </div>
                            
                                <div class="col-sm-2">
                                    <button type="submit" class="btn btn-warning btn-lg">Cek</button>
                                </div>
                            </div>
                        </form>
                        <br>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<br>

<div class="row">
    <div class="col-lg-12">
        <h3 style="padding-bottom: 20px" class="page-header center">
            
        </h3>

        <br><br>
    </div>
    
    <?php
    // fungsi query untuk menampilkan data dari tabel informasi
    $query = mysqli_query($mysqli, "SELECT * FROM informasi WHERE id_informasi='1'")
                                    or die('Ada kesalahan pada query tampil data tentang : '.mysqli_error($mysqli));

    $data = mysqli_fetch_assoc($query);
    $isi = substr($data['isi'],0,800)
    ?>
    
    <!-- <div class="col-lg-4 daftar center">
        <i class="fa fa-user"></i>
        <h2>Layanan</h2>
        <p>Kesadaran akan kebutuhan kiriman yang cepat dan efektifitas biaya bagi pelanggan, menginspirasi kami untuk menyediakan layanan pengiriman dokumen dan barang ke berbagai wilayah di Indonesia.</p>
    </div>

    <div class="col-lg-4 pesan center">
        <i class="fa fa-send-o"></i>
        <h2>Track Pengiriman</h2>
        <p>Lacak pengiriman dengan mudah untuk mengetahui proses pengiriman.</p>
    </div>

    <div class="col-lg-4 bayar center">
        <i class="fa fa-map-marker"></i>
        <h2>Lokasi</h2>
        <p>Dengan lebih dari 500 cabang di seluruh wilayah Indonesia, Tiki memastikan kebutuhan anda akan pengiriman akan selalu terpenuhi, Cari lokasi terdekat Tiki di sini..</p>
    </div> -->

</div>
