-- phpMyAdmin SQL Dump
-- version 4.1.12
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: Oct 04, 2016 at 12:23 PM
-- Server version: 5.6.16
-- PHP Version: 5.5.11

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `prog_fitri_maryana`
--

-- --------------------------------------------------------

--
-- Table structure for table `informasi`
--

CREATE TABLE IF NOT EXISTS `informasi` (
  `id_informasi` int(2) NOT NULL AUTO_INCREMENT,
  `judul` varchar(100) NOT NULL,
  `isi` text NOT NULL,
  PRIMARY KEY (`id_informasi`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=3 ;

--
-- Dumping data for table `informasi`
--

INSERT INTO `informasi` (`id_informasi`, `judul`, `isi`) VALUES
(1, 'Tentang PT Multi Ekspres Transindo', '<p><span style="font-family:arial,helvetica,sans-serif"><strong>PT. Multi Ekspres Transindo Bandarlampung</strong></span></p>\r\n\r\n<p><span style="font-family:arial,helvetica,sans-serif">PT. Multi Ekspres Transindo Cabang Lampung merupakan perusahaan yang bergerak di bidang jasa ekspedisi pengiriman paket barang yang bertempat dipusat kota BandarLampung. melayani tujuan dengan menggunakan angkutan darat maupun laut. Dalam era globalisasi dan persaingan yang semakin sengit, setiap perusahaan dituntut untuk bisa mencermati segala situasi dan langkah-langkah efektif untuk menghadapinya. Ekspedisi ataupun Cargo adalah salah satu cara yang efektif untuk mentransportasikan produk/ barang suatu perusahaan kepada pelanggan maupun investornya. Untuk itu kami PT. Multi Ekspres Transindo terlahir untuk membantu Perusahaan tersebut dalam mengirimkan barang atau produknya ke luar Kota maupun keluar Pulau yang telah kami tentukan.</span></p>'),
(2, 'Layanan PT Multi Ekspres Transindo', '<p>Layanan jasa yang dimiliki oleh PT Multi Ekspres Transindo sebagai berikut :</p>\r\n\r\n<p>&nbsp;</p>\r\n\r\n<p><strong>Tagih Tujuan </strong></p>\r\n\r\n<p style="text-align: justify;">Layanan yang memberikan kesempatan untuk menagih biaya</p>\r\n\r\n<p style="text-align: justify;">kiriman kepada penerima, dengan sistem pembayaran dapat</p>\r\n\r\n<p style="text-align: justify;">dilakukan secara tunai pada saat penyerahan kiriman.</p>\r\n\r\n<p style="text-align: justify;">&nbsp;</p>\r\n\r\n<p style="text-align: justify;"><strong>PAC (Packing)</strong></p>\r\n\r\n<p style="text-align: justify;">PAC disediakan untuk melayani kebutuhan anda sebagai jaminan</p>\r\n\r\n<p style="text-align: justify;">kondisi dan keamanan barang / paket dengan kemasan yang memadai.</p>\r\n\r\n<p style="text-align: justify;">Layanan ini berupa tambahan kemasan pada sisi luarnya .</p>');

-- --------------------------------------------------------

--
-- Table structure for table `kendaraan`
--

CREATE TABLE IF NOT EXISTS `kendaraan` (
  `no_polisi` varchar(11) NOT NULL,
  `merk` varchar(20) NOT NULL,
  `no_mesin` varchar(17) NOT NULL,
  `tahun` char(4) NOT NULL,
  `warna` varchar(10) NOT NULL,
  `supir` varchar(16) NOT NULL,
  PRIMARY KEY (`no_polisi`),
  KEY `supir` (`supir`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `kendaraan`
--

INSERT INTO `kendaraan` (`no_polisi`, `merk`, `no_mesin`, `tahun`, `warna`, `supir`) VALUES
('BE 4442 ABC', 'Honda', 'MHRGD38506J501103', '2015', 'Hitam', '1234567890123451');

-- --------------------------------------------------------

--
-- Table structure for table `pelanggan`
--

CREATE TABLE IF NOT EXISTS `pelanggan` (
  `no_ktp` varchar(16) NOT NULL,
  `nama_pelanggan` varchar(30) NOT NULL,
  `jenis_kelamin` enum('Laki-laki','Perempuan') NOT NULL,
  `alamat` varchar(100) NOT NULL,
  `telepon` varchar(12) NOT NULL,
  PRIMARY KEY (`no_ktp`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `pelanggan`
--

INSERT INTO `pelanggan` (`no_ktp`, `nama_pelanggan`, `jenis_kelamin`, `alamat`, `telepon`) VALUES
('9876543212345671', 'Fitri Maryana', 'Perempuan', 'Jalan Pagar Alam No. 110, Kedaton, Bandar Lampung', '085858859500');

-- --------------------------------------------------------

--
-- Table structure for table `pengguna`
--

CREATE TABLE IF NOT EXISTS `pengguna` (
  `id_pengguna` int(2) NOT NULL AUTO_INCREMENT,
  `username` varchar(30) NOT NULL,
  `password` varchar(50) NOT NULL,
  `nama_pengguna` varchar(30) NOT NULL,
  `hak_akses` enum('Admin','Pimpinan') NOT NULL DEFAULT 'Admin',
  PRIMARY KEY (`id_pengguna`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=3 ;

--
-- Dumping data for table `pengguna`
--

INSERT INTO `pengguna` (`id_pengguna`, `username`, `password`, `nama_pengguna`, `hak_akses`) VALUES
(1, 'admin', '202cb962ac59075b964b07152d234b70', 'Admin', 'Admin'),
(2, 'pimpinan', '202cb962ac59075b964b07152d234b70', 'Pimpinan', 'Pimpinan');

-- --------------------------------------------------------

--
-- Table structure for table `pengiriman`
--

CREATE TABLE IF NOT EXISTS `pengiriman` (
  `no_pengiriman` varchar(5) NOT NULL,
  `tgl_pengiriman` date NOT NULL,
  `pengirim` varchar(16) NOT NULL,
  `penerima` varchar(30) NOT NULL,
  `alamat_penerima` varchar(100) NOT NULL,
  `nama_barang` varchar(30) NOT NULL,
  `jumlah_barang` int(11) NOT NULL,
  `berat_barang` int(11) NOT NULL,
  `biaya_kirim` int(11) NOT NULL,
  `kendaraan` varchar(11) NOT NULL,
  `status` enum('Proses Pengiriman','Barang Terkirim') NOT NULL DEFAULT 'Proses Pengiriman',
  PRIMARY KEY (`no_pengiriman`),
  KEY `pelanggan` (`pengirim`,`kendaraan`),
  KEY `kendaraan` (`kendaraan`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `pengiriman`
--

INSERT INTO `pengiriman` (`no_pengiriman`, `tgl_pengiriman`, `pengirim`, `penerima`, `alamat_penerima`, `nama_barang`, `jumlah_barang`, `berat_barang`, `biaya_kirim`, `kendaraan`, `status`) VALUES
('16001', '2016-10-04', '9876543212345671', 'Raisa Ariandini', 'Jalan Teuku Umar No. 52, Kedaton, Bandar Lampung', 'Motor', 1, 50, 500000, 'BE 4442 ABC', 'Proses Pengiriman');

-- --------------------------------------------------------

--
-- Table structure for table `supir`
--

CREATE TABLE IF NOT EXISTS `supir` (
  `no_ktp` varchar(16) NOT NULL,
  `nama_supir` varchar(30) NOT NULL,
  `alamat` varchar(100) NOT NULL,
  `telepon` varchar(12) NOT NULL,
  PRIMARY KEY (`no_ktp`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `supir`
--

INSERT INTO `supir` (`no_ktp`, `nama_supir`, `alamat`, `telepon`) VALUES
('1234567890123451', 'Paijo', 'Jalan Teuku Umar No. 52, Kedaton, Bandar Lampung', '081299883933'),
('1234567890123452', 'Bejo', 'Jalan Untung Suropati No. 10, Bandar Lampung', '081323121199');

--
-- Constraints for dumped tables
--

--
-- Table structure for table `customer servis`
--

CREATE TABLE IF NOT EXISTS `customers` (
  `no_ktp` varchar(16) NOT NULL,
  `nama` varchar(30) NOT NULL,
  `alamat` varchar(100) NOT NULL,
  `telepon` varchar(12) NOT NULL,
  PRIMARY KEY (`no_ktp`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `customer servis`
--

INSERT INTO `customers` (`no_ktp`, `nama`, `alamat`, `telepon`) VALUES
('1924361825364892', 'Nurul', 'Jalan Teuku Umar No.111', '085273648901'),
('1725362893516092', 'Ratna', 'Jalan Tukad Balian No 9', '081735462738');

--
-- Constraints for dumped tables
--
--
-- Constraints for table `kendaraan`
--
ALTER TABLE `kendaraan`
  ADD CONSTRAINT `kendaraan_ibfk_1` FOREIGN KEY (`supir`) REFERENCES `supir` (`no_ktp`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `pengiriman`
--
ALTER TABLE `pengiriman`
  ADD CONSTRAINT `pengiriman_ibfk_1` FOREIGN KEY (`pengirim`) REFERENCES `pelanggan` (`no_ktp`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `pengiriman_ibfk_2` FOREIGN KEY (`kendaraan`) REFERENCES `kendaraan` (`no_polisi`) ON DELETE CASCADE ON UPDATE CASCADE;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
