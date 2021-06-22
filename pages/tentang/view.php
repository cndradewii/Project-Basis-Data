<?php
// fungsi query untuk menampilkan data dari tabel tantang tpi
$query = mysqli_query($mysqli, "SELECT * FROM informasi WHERE id_informasi='1'")
                                or die('Ada kesalahan pada query tampil data informasi : '.mysqli_error($mysqli));

$data = mysqli_fetch_assoc($query);
?>
<!-- Page Heading/Breadcrumbs -->
<div class="row">
    <div class="col-lg-12">
        <div class="row">
            <div class="col-lg-12">
                <h3 class="page-header">
                    <i style="margin-right:6px" class="fa fa-leaf"></i>
                    Tentang Kami
                </h3>
                <ol class="breadcrumb">
                    <li><a href="?page=home">Beranda</a>
                    </li>
                    <li class="active">Tentang Kami</li>
                </ol>
            </div>
        </div>

        <div class="row">
            <div class="col-lg-12">
                <div style="padding: 0 10px;text-align:justify"> 
                    <p style="margin-bottom:5px;font-size:20px"><?php echo $data['judul']; ?></p>
                    <p><?php echo $data['isi']; ?></p>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- /.row -->
