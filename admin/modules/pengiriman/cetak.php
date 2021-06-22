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
$no_pengiriman = $_GET['id'];

// fungsi query untuk menampilkan data dari tabel siswa dan kelas
$query = mysqli_query($mysqli, "SELECT a.no_pengiriman,a.tgl_pengiriman,a.pengirim,a.penerima,a.alamat_penerima,a.nama_barang,a.jumlah_barang,a.berat_barang,a.biaya_kirim,a.kendaraan,a.status,
                                b.no_ktp as id_pelanggan,b.nama_pelanggan,b.alamat,
                                c.no_polisi,c.supir,
                                d.no_ktp as id_supir,d.nama_supir
                                FROM pengiriman as a INNER JOIN pelanggan as b INNER JOIN kendaraan as c INNER JOIN supir as d
                                ON a.pengirim=b.no_ktp AND a.kendaraan=c.no_polisi AND c.supir=d.no_ktp
                                WHERE a.no_pengiriman='$no_pengiriman'
                                ORDER BY a.no_pengiriman ASC")
                                or die('Ada kesalahan pada query tampil data transaksi: '.mysqli_error($mysqli));

$rows = mysqli_num_rows($query);
?>
<html xmlns="http://www.w3.org/1999/xhtml"> <!-- Bagian halaman HTML yang akan konvert -->
    <head>
        <meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1" />
        <title>BUKTI TANDA TERIMA TITIPAN BARANG</title>
        <link rel="stylesheet" type="text/css" href="../../assets/css/bukti.css" />
    </head>
    <body>
        <?php
            $data = mysqli_fetch_assoc($query);

            $no_pengiriman   = $data['no_pengiriman'];

            $tanggal         = $data['tgl_pengiriman'];
            $tgl             = explode('-',$tanggal);
            $tgl_pengiriman  = $tgl[2]."-".$tgl[1]."-".$tgl[0];

            $tggl = $tgl[2];
            $bln  = $tgl[1];
            $thn  = $tgl[0];
            
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
        
        <table border="0.2">
            <tr>
                <td style="border-left:none" colspan="3" rowspan="3">
                    <span style="font-size:18px"><strong>PT.Pos Indonesia</strong></span> <span style="color:#fff">....</span> <br>
                    <span style="font-size:11px">Alamat : Jl. Raya Puputan Renon <br>  Denpasar Selatan, Bali, 80226 <br>
                    Telp. 1500161 </span>
                </td>
                <td height="20" align="center" colspan="2"><strong>BUKTI TANDA TERIMA TITIPAN BARANG</strong></td>
            </tr>

            <tr>
                <td height="20" align="center"><strong>Bali</strong></td>
                <td align="center" rowspan="2"><span style="font-size:25px"><strong>ASLI</strong></span></td>
            </tr>

            <tr>
                <td height="45" align="center">No. <strong><?php echo $no_pengiriman; ?></strong> AD</td>
            </tr>

            <tr>
                <td style="padding-left:10px;" colspan="4" rowspan="3">
                    SI PENERIMA : <?php echo $penerima; ?><br>
                    ALAMAT : <?php echo $alamat_penerima; ?>
                </td>
                <td height="20" align="center">ISI PENGAKUAN</td>
                <td style="padding-left:3px;" height="20" align="center"><span style="color:#fff">..</span>BANYAK COLLY<span style="color:#fff">..</span></td>
            </tr>

            <tr>
                <td height="45" align="center"><strong><?php echo $nama_barang; ?></strong></td>
                <td height="45" align="center"><strong><?php echo $jumlah_barang; ?></strong></td>
            </tr>

            <tr>
                <td height="20" align="center" colspan="2">ISI TIDAK DIPERIKSA</td>
            </tr>

            <tr>
                <td style="padding-left:10px;" colspan="4" rowspan="3">
                    SI PENGIRIM : <?php echo $pengirim; ?><br>
                    ALAMAT : <?php echo $alamat_pengirim; ?>
                </td>
            </tr>

            <tr>
                <td height="20" align="center">PERINCIAN / BERAT</td>
                <td height="20" align="center">BIAYA</td>
            </tr>

            <tr>
                <td height="45" align="center"><strong><?php echo $berat_barang; ?> Kg</strong></td>
                <td style="padding-left:3px;" height="45" >Rp. <?php echo format_rupiah_nol(10000); ?></td>
            </tr>

            <tr>
                <td height="20" colspan="2" align="center"><strong>TAGIH PENERIMA</strong></td>
                <td height="20" colspan="2" align="center"><strong>LUNAS</strong></td>
                <td height="20" align="center"><strong>KREDIT</strong></td>
                <td style="padding-left:3px;" height="20" >JML. <strong>Rp. <?php echo format_rupiah_nol($biaya_kirim); ?></strong></td>
            </tr>

            <tr>
                <td height="20" align="center">PENERIMA</td>
                <td height="20" align="center">TGL</td>
                <td height="20" align="center">PENGIRIM</td>
                <td height="20" align="center">TGL</td>
                <td style="font-size:9px;padding-left:3px;" rowspan="4" valign="middle">
                    BARANG YG TIDAK DI ASURANSI JIKA <br> TERJADI : HURU HARA, PERAMPOKAN, <br> LAKALANTAS, FORCE MOUJER TIDAK <br> DIJAMIN <br>
                    KIRIMAN YG TDK DIAMBIL SETELAH <br> 15 HARI DARI TGL PENGIRIMAN, <br> KERUSAKAN & KEHILANGAN <br> DILUAR TANGGUNG JAWAB PT ME
                </td>
            </tr>

            <tr>
                <td align="center" rowspan="3"></td>
                <td align="center"></td>
                <td align="center" rowspan="3"></td>
                <td height="18" align="center"><?php echo $tggl; ?></td>
            </tr>

            <tr>
                <td align="center"></td>
                <td height="18" align="center"><?php echo $bln; ?></td>
            </tr>

            <tr>
                <td align="center"></td>
                <td height="18" align="center"><?php echo $thn; ?></td>
            </tr>

            <tr>
                <td height="20" colspan="6" align="center">CATATAN : ALAMAT PENERIMA ADALAH DIDALAM KOTA ATAU WILAYAH BATAS ANTARAN</td>
            </tr>

        </table>
    </body>
</html><!-- Akhir halaman HTML yang akan di konvert -->
<?php
$filename="BUKTI TANDA TERIMA TITIPAN BARANG.pdf"; //ubah untuk menentukan nama file pdf yang dihasilkan nantinya
//==========================================================================================================
$content = ob_get_clean();
$content = '<page style="font-family: freeserif">'.($content).'</page>';
require_once('../../assets/html2pdf_v4.03/html2pdf.class.php');
try
{
    $html2pdf = new HTML2PDF('P','A4','en', false, 'ISO-8859-15',array(5, 10, 5, 10));
    $html2pdf->setDefaultFont('Arial');
    $html2pdf->writeHTML($content, isset($_GET['vuehtml']));
    $html2pdf->Output($filename);
}
catch(HTML2PDF_exception $e) { echo $e; }
?>