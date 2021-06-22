<?php
session_start();
ob_start();

// panggil file database.php untuk koneksi ke database
require_once "../../../config/database.php";
// panggil fungsi untuk format tanggal
require_once "../../../config/fungsi_tanggal.php";
// panggil fungsi untuk format rupiah
require_once "../../../config/fungsi_rupiah.php";

$hari_ini = date("d-m-Y");
// ambil data dari submit form
$filter        = $_GET['filter'];

$tgl_awal      = $_GET['tgl_awal'];
$tgl1          = explode('-',$tgl_awal);
$tanggal_awal  = $tgl1[2]."-".$tgl1[1]."-".$tgl1[0];

$tgl_akhir     = $_GET['tgl_akhir'];
$tgl2          = explode('-',$tgl_akhir);
$tanggal_akhir = $tgl2[2]."-".$tgl2[1]."-".$tgl2[0];

if ($filter=='Seluruh') {
    // fungsi query untuk menampilkan data dari tabel siswa dan kelas
    $query = mysqli_query($mysqli, "SELECT a.no_pengiriman,a.tgl_pengiriman,a.pengirim,a.penerima,a.alamat_penerima,a.nama_barang,a.jumlah_barang,a.berat_barang,a.biaya_kirim,a.kendaraan,a.status,
                                    b.no_ktp as id_pelanggan,b.nama_pelanggan,b.alamat,
                                    c.no_polisi,c.supir,
                                    d.no_ktp as id_supir,d.nama_supir
                                    FROM pengiriman as a INNER JOIN pelanggan as b INNER JOIN kendaraan as c INNER JOIN supir as d
                                    ON a.pengirim=b.no_ktp AND a.kendaraan=c.no_polisi AND c.supir=d.no_ktp
                                    WHERE a.tgl_pengiriman BETWEEN '$tanggal_awal' AND '$tanggal_akhir'
                                    ORDER BY a.no_pengiriman ASC")
                                    or die('Ada kesalahan pada query tampil data transaksi: '.mysqli_error($mysqli));
} elseif ($filter=='Proses Pengiriman') {
    // fungsi query untuk menampilkan data dari tabel siswa dan kelas
    $query = mysqli_query($mysqli, "SELECT a.no_pengiriman,a.tgl_pengiriman,a.pengirim,a.penerima,a.alamat_penerima,a.nama_barang,a.jumlah_barang,a.berat_barang,a.biaya_kirim,a.kendaraan,a.status,
                                    b.no_ktp as id_pelanggan,b.nama_pelanggan,b.alamat,
                                    c.no_polisi,c.supir,
                                    d.no_ktp as id_supir,d.nama_supir
                                    FROM pengiriman as a INNER JOIN pelanggan as b INNER JOIN kendaraan as c INNER JOIN supir as d
                                    ON a.pengirim=b.no_ktp AND a.kendaraan=c.no_polisi AND c.supir=d.no_ktp
                                    WHERE a.status='Proses Pengiriman' AND a.tgl_pengiriman BETWEEN '$tanggal_awal' AND '$tanggal_akhir'
                                    ORDER BY a.no_pengiriman ASC")
                                    or die('Ada kesalahan pada query tampil data transaksi: '.mysqli_error($mysqli));
} elseif ($filter=='Barang Terkirim') {
    // fungsi query untuk menampilkan data dari tabel siswa dan kelas
    $query = mysqli_query($mysqli, "SELECT a.no_pengiriman,a.tgl_pengiriman,a.pengirim,a.penerima,a.alamat_penerima,a.nama_barang,a.jumlah_barang,a.berat_barang,a.biaya_kirim,a.kendaraan,a.status,
                                    b.no_ktp as id_pelanggan,b.nama_pelanggan,b.alamat,
                                    c.no_polisi,c.supir,
                                    d.no_ktp as id_supir,d.nama_supir
                                    FROM pengiriman as a INNER JOIN pelanggan as b INNER JOIN kendaraan as c INNER JOIN supir as d
                                    ON a.pengirim=b.no_ktp AND a.kendaraan=c.no_polisi AND c.supir=d.no_ktp
                                    WHERE a.status='Barang Terkirim' AND a.tgl_pengiriman BETWEEN '$tanggal_awal' AND '$tanggal_akhir'
                                    ORDER BY a.no_pengiriman ASC")
                                    or die('Ada kesalahan pada query tampil data transaksi: '.mysqli_error($mysqli));
}


$rows = mysqli_num_rows($query);
?>
<html xmlns="http://www.w3.org/1999/xhtml"> <!-- Bagian halaman HTML yang akan konvert -->
    <head>
        <meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1" />
        <title>LAPORAN PENGIRIMAN</title>
        <link rel="stylesheet" type="text/css" href="../../assets/css/laporan.css" />
    </head>
    <body>
        <div id="title">
            PT.Pos Indonesia
        </div>

        <div id="title-alamat">
            Alamat: Jl. Raya Puputan Renon, Denpasar Selatan, Denpasar, 80226
        </div>
        
        <div style="margin:-50px 0 0 200px">
        </div>

        <hr><br>
        
        <div id="title">
            LAPORAN PENGIRIMAN BARANG
        </div>
        <div id="title-alamat">
            Tanggal <?php echo $tgl_awal; ?> s.d. <?php echo $tgl_akhir; ?>
        </div>
        <br>
        <div id="isi">
            <table width="100%" border="0.5" cellpadding="0" cellspacing="0">
                <tr class="tr-title">
                    <th height="20" align="center" valign="middle">No.</th>
                    <th height="20" align="center" valign="middle">No. Pengiriman</th>
                    <th height="20" align="center" valign="middle">Tanggal</th>
                    <th height="20" align="center" valign="middle">Pengirim</th>
                    <th height="20" align="center" valign="middle">Penerima</th>
                    <th height="20" align="center" valign="middle">Barang</th>
                    <th height="20" align="center" valign="middle">Jumlah</th>
                    <th height="20" align="center" valign="middle">Berat</th>
                    <th height="20" align="center" valign="middle">Biaya Kirim</th>
                    <th height="20" align="center" valign="middle">Kendaraan</th>
                    <th height="20" align="center" valign="middle">Supir</th>
                </tr>

                <?php
                for($i=1; $i<=$rows; $i++) {
                    $data = mysqli_fetch_assoc($query);

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
                ?>  
                <tr>
                    <td width="30" height="13" align="center" valign="middle"><?=$i?></td>
                    <td width="100" height="13" align="center" valign="middle"><?=$no_pengiriman?></td>
                    <td width="70" height="13" align="center" valign="middle"><?=$tgl_pengiriman?></td>
                    <td style="padding-left:5px;" width="120" height="13" valign="middle"><?=$pengirim?></td>
                    <td style="padding-left:5px;" width="120" height="13" valign="middle"><?=$penerima?></td>
                    <td style="padding-left:5px;" width="120" height="13" valign="middle"><?=$nama_barang?></td>
                    <td style="padding-right:5px;" width="50" height="13" align="center" valign="middle"><?=$jumlah_barang?></td>
                    <td style="padding-right:5px;" width="50" height="13" align="right" valign="middle"><?=$berat_barang?> Kg</td>
                    <td style="padding-right:5px;" width="70" height="13" align="right" valign="middle">Rp. <?=$biaya_kirim?></td>
                    <td style="padding-left:5px;" width="100" height="13" valign="middle"><?=$no_polisi?></td>
                    <td style="padding-left:5px;" width="100" height="13" valign="middle"><?=$nama_supir?></td>
                </tr>
                <?php 
                } 

                if ($filter=='Seluruh') {
                     $query2 = mysqli_query($mysqli, "SELECT no_pengiriman,tgl_pengiriman,SUM(biaya_kirim) as total, status
                                                 FROM pengiriman
                                                 WHERE tgl_pengiriman BETWEEN '$tanggal_awal' AND '$tanggal_akhir'")
                                                 or die('Ada kesalahan pada query tampil data jumlah biaya: '.mysqli_error($mysqli));
                } elseif ($filter=='Proses Pengiriman') {
                     $query2 = mysqli_query($mysqli, "SELECT no_pengiriman,tgl_pengiriman,SUM(biaya_kirim) as total, status
                                                 FROM pengiriman
                                                 WHERE status='Proses Pengiriman' AND tgl_pengiriman BETWEEN '$tanggal_awal' AND '$tanggal_akhir'")
                                                 or die('Ada kesalahan pada query tampil data jumlah biaya: '.mysqli_error($mysqli));
                } elseif ($filter=='Barang Terkirim') {
                     $query2 = mysqli_query($mysqli, "SELECT no_pengiriman,tgl_pengiriman,SUM(biaya_kirim) as total, status
                                                 FROM pengiriman
                                                 WHERE status='Barang Terkirim' AND tgl_pengiriman BETWEEN '$tanggal_awal' AND '$tanggal_akhir'")
                                                 or die('Ada kesalahan pada query tampil data jumlah biaya: '.mysqli_error($mysqli));
                }

                $data2 = mysqli_fetch_assoc($query2);

                $total_biaya = $data2['total'];
                ?>
                <tr>
                    <td height="14" align="center" valign="middle" colspan="8"><strong>Jumlah Total</strong></td>
                    <td style="padding-right:5px;" height="14" align="right" valign="middle"><strong>Rp. <?=format_rupiah_nol($total_biaya)?></strong></td>
                </tr>
            </table>

            <div id="footer-tanggal">
                Bali, <?php echo tgl_eng_to_ind("$hari_ini"); ?> <br><br><br><br><br>
                PT.Pos Indonesia
            </div>
        </div>
    </body>
</html><!-- Akhir halaman HTML yang akan di konvert -->
<?php
$filename="LAPORAN PENGIRIMAN.pdf"; //ubah untuk menentukan nama file pdf yang dihasilkan nantinya
//==========================================================================================================
$content = ob_get_clean();
$content = '<page style="font-family: freeserif">'.($content).'</page>';
require_once('../../assets/html2pdf_v4.03/html2pdf.class.php');
try
{
    $html2pdf = new HTML2PDF('L','A4','en', false, 'ISO-8859-15',array(8, 10, 8, 10));
    $html2pdf->setDefaultFont('Arial');
    $html2pdf->writeHTML($content, isset($_GET['vuehtml']));
    $html2pdf->Output($filename);
}
catch(HTML2PDF_exception $e) { echo $e; }
?>