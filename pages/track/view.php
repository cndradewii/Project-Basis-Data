
<!-- Page Heading/Breadcrumbs -->
<div class="row">
    <div class="col-lg-12">
        <div class="row">
            <div class="col-lg-12">
                <h3 class="page-header">
                    <i style="margin-right:6px" class="fa fa-send-o"></i>
                    Lacak Pengiriman
                </h3>
                <ol class="breadcrumb">
                    <li><a href="?page=home">Beranda</a>
                    </li>
                    <li class="active">Track</li>
                </ol>
            </div>
        </div>

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
                
                <br> 

                <?php  
                if (isset($_POST['no_pengiriman'])) { 
                    $query = mysqli_query($mysqli, "SELECT a.no_pengiriman,a.tgl_pengiriman,a.pengirim,a.penerima,a.alamat_penerima,a.nama_barang,a.jumlah_barang,a.berat_barang,a.biaya_kirim,a.kendaraan,a.status,
                                                    b.no_ktp as id_pelanggan,b.nama_pelanggan,b.alamat,
                                                    c.no_polisi,c.supir,
                                                    d.no_ktp as id_supir,d.nama_supir
                                                    FROM pengiriman as a INNER JOIN pelanggan as b INNER JOIN kendaraan as c INNER JOIN supir as d
                                                    ON a.pengirim=b.no_ktp AND a.kendaraan=c.no_polisi AND c.supir=d.no_ktp
                                                    WHERE a.no_pengiriman='$_POST[no_pengiriman]'
                                                    ORDER BY a.no_pengiriman DESC")
                                                    or die('Ada kesalahan pada query tampil data pengiriman: '.mysqli_error($mysqli));

                    $data = mysqli_fetch_assoc($query);

                    $tanggal        = $data['tgl_pengiriman'];
                    $tgl            = explode('-',$tanggal);
                    $tgl_pengiriman = $tgl[2]."-".$tgl[1]."-".$tgl[0];
                ?>
                    <div class="alert alert-success">
                        <button type="button" class="close" data-dismiss="alert">
                            <i class="ace-icon fa fa-times"></i>
                        </button>
                        <strong><i class="ace-icon fa fa-info-circle"></i> Informasi Pengiriman </strong><br><br>
                        <table>
                            <tr>
                                <td width="150">No. Pengiriman</td>
                                <td width="15">:</td>
                                <td><strong><?php echo $data['no_pengiriman']; ?></strong></td>
                            </tr>
                            <tr>
                                <td>Tanggal Pengiriman</td>
                                <td>:</td>
                                <td><strong><?php echo tgl_eng_to_ind($tgl_pengiriman); ?></strong></td>
                            </tr>
                            <tr>
                                <td>Pengirim</td>
                                <td>:</td>
                                <td><strong><?php echo $data['nama_pelanggan']; ?></strong></td>
                            </tr>
                            <tr>
                                <td>Barang</td>
                                <td>:</td>
                                <td><strong><?php echo $data['nama_barang']; ?></strong></td>
                            </tr><tr>
                                <td>Status</td>
                                <td>:</td>
                                <td><strong><?php echo $data['status']; ?></strong></td>
                            </tr>
                        </table>
                        <br>
                    </div>
                <?php
                }
                ?>
            </div>
        </div>
    </div>
</div>
<!-- /.row -->
