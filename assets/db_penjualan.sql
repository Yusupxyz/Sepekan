-- phpMyAdmin SQL Dump
-- version 4.8.4
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1:3307
-- Generation Time: Feb 19, 2020 at 01:22 AM
-- Server version: 10.1.37-MariaDB
-- PHP Version: 7.3.0

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `db_penjualan`
--

-- --------------------------------------------------------

--
-- Table structure for table `tbl_angsuran`
--

CREATE TABLE `tbl_angsuran` (
  `kode_angsuran` varchar(100) NOT NULL,
  `tanggal_angsuran` date NOT NULL,
  `kode_kredit` varchar(100) NOT NULL,
  `angsuran_ke` int(2) NOT NULL,
  `pembayaran` varchar(50) NOT NULL,
  `terima` varchar(50) NOT NULL,
  `kembalian` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbl_angsuran`
--

INSERT INTO `tbl_angsuran` (`kode_angsuran`, `tanggal_angsuran`, `kode_kredit`, `angsuran_ke`, `pembayaran`, `terima`, `kembalian`) VALUES
('AG000001', '2020-02-26', 'KK000001', 1, '50000', '50000', '0');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_barang`
--

CREATE TABLE `tbl_barang` (
  `barang_id` varchar(15) NOT NULL,
  `barang_nama` varchar(150) DEFAULT NULL,
  `barang_satuan_id` int(11) DEFAULT NULL,
  `barang_harpok` double DEFAULT NULL,
  `barang_harjul` double DEFAULT NULL,
  `barang_minimal` int(11) NOT NULL DEFAULT '0',
  `barang_stok` int(11) DEFAULT '0',
  `barang_tgl_input` timestamp NULL DEFAULT CURRENT_TIMESTAMP,
  `barang_tgl_last_update` datetime DEFAULT NULL,
  `barang_kategori_id` int(11) DEFAULT NULL,
  `id_suplier` int(11) NOT NULL,
  `barang_user_id` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbl_barang`
--

INSERT INTO `tbl_barang` (`barang_id`, `barang_nama`, `barang_satuan_id`, `barang_harpok`, `barang_harjul`, `barang_minimal`, `barang_stok`, `barang_tgl_input`, `barang_tgl_last_update`, `barang_kategori_id`, `id_suplier`, `barang_user_id`) VALUES
('BR000001', 'Semen Gresik', 2, 110000, 120000, 100, 16, '2019-12-21 11:27:36', '2020-02-09 12:15:37', 40, 1, 4),
('BR000002', 'Semen Padang', 2, 100000, 120000, 50, 46, '2019-12-21 15:34:35', '2020-01-29 20:06:46', 40, 1, 4),
('BR000003', 'Semen Tiga Roda', 2, 110000, 118000, 20, 40, '2020-01-26 07:31:18', '2020-01-29 20:06:54', 40, 1, 4),
('BR000004', 'Kayu', 2, 100000, 120000, 34, 44, '2020-02-03 10:17:07', '2020-02-03 17:17:21', 40, 1, 4);

-- --------------------------------------------------------

--
-- Table structure for table `tbl_barang_keluar`
--

CREATE TABLE `tbl_barang_keluar` (
  `id` varchar(30) NOT NULL,
  `id_barang` varchar(15) NOT NULL,
  `stok_awal` int(11) NOT NULL,
  `jumlah` int(200) NOT NULL,
  `tanggal_keluar` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbl_barang_keluar`
--

INSERT INTO `tbl_barang_keluar` (`id`, `id_barang`, `stok_awal`, `jumlah`, `tanggal_keluar`) VALUES
('OUT000001', 'BR000001', 99, 1, '2020-01-26 14:34:23'),
('OUT000002', 'BR000002', 49, 1, '2020-01-26 14:34:23'),
('OUT000003', 'BR000001', 98, 1, '2020-01-26 14:57:02'),
('OUT000004', 'BR000002', 47, 2, '2020-01-26 14:57:02'),
('OUT000005', 'BR000004', 44, 1, '2020-02-06 16:25:51'),
('OUT000006', 'BR000001', 25, 1, '2020-02-09 11:11:44'),
('OUT000007', 'BR000001', 24, 1, '2020-02-09 11:37:41'),
('OUT000008', 'BR000001', 23, 1, '2020-02-09 11:42:21'),
('OUT000009', 'BR000001', 22, 1, '2020-02-09 11:42:45'),
('OUT000010', 'BR000001', 21, 1, '2020-02-09 11:47:21'),
('OUT000011', 'BR000001', 20, 1, '2020-02-09 11:48:04'),
('OUT000012', 'BR000002', 46, 1, '2020-02-09 11:48:04'),
('OUT000013', 'BR000001', 20, 1, '2020-02-09 11:58:34'),
('OUT000014', 'BR000001', 19, 1, '2020-02-09 11:59:06'),
('OUT000015', 'BR000001', 18, 1, '2020-02-09 12:11:25'),
('OUT000016', 'BR000001', 18, 1, '2020-02-12 03:24:07'),
('OUT000017', 'BR000001', 17, 1, '2020-02-19 02:47:31');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_barang_masuk`
--

CREATE TABLE `tbl_barang_masuk` (
  `id` varchar(50) NOT NULL,
  `id_barang` varchar(15) NOT NULL,
  `stok_awal` int(11) NOT NULL,
  `jumlah` int(11) NOT NULL,
  `tanggal_input` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `user_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbl_barang_masuk`
--

INSERT INTO `tbl_barang_masuk` (`id`, `id_barang`, `stok_awal`, `jumlah`, `tanggal_input`, `user_id`) VALUES
('IN000001', 'BR000001', 0, 100, '2020-01-26 07:31:51', 4),
('IN000002', 'BR000002', 0, 50, '2020-01-26 07:31:57', 4),
('IN000003', 'BR000003', 0, 40, '2020-01-26 07:32:18', 4),
('IN000004', 'BR000001', 14, 12, '2020-01-29 14:04:52', 4),
('IN000005', 'BR000004', 0, 45, '2020-02-03 10:17:21', 4);

-- --------------------------------------------------------

--
-- Table structure for table `tbl_detail_jual`
--

CREATE TABLE `tbl_detail_jual` (
  `d_jual_id` int(11) NOT NULL,
  `d_jual_nofak` varchar(15) DEFAULT NULL,
  `d_jual_barang_id` varchar(15) DEFAULT NULL,
  `d_jual_barang_nama` varchar(150) DEFAULT NULL,
  `d_jual_barang_satuan` varchar(30) DEFAULT NULL,
  `d_jual_barang_harpok` double DEFAULT NULL,
  `d_jual_barang_harjul` double DEFAULT NULL,
  `d_jual_qty` int(11) DEFAULT NULL,
  `d_jual_diskon` double DEFAULT NULL,
  `d_jual_total` double DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbl_detail_jual`
--

INSERT INTO `tbl_detail_jual` (`d_jual_id`, `d_jual_nofak`, `d_jual_barang_id`, `d_jual_barang_nama`, `d_jual_barang_satuan`, `d_jual_barang_harpok`, `d_jual_barang_harjul`, `d_jual_qty`, `d_jual_diskon`, `d_jual_total`) VALUES
(1, '260120000001', 'BR000001', 'Semen Gresik', 'Unit', 110000, 118000, 1, 0, 118000),
(2, '260120000001', 'BR000002', 'Semen Padang', 'Unit', 100000, 118000, 1, 0, 118000),
(3, '260120000002', 'BR000001', 'Semen Gresik', 'Unit', 110000, 118000, 1, 0, 118000),
(4, '260120000002', 'BR000002', 'Semen Padang', 'Unit', 100000, 118000, 2, 0, 236000),
(5, '060220000001', 'BR000004', 'Kayu', 'Unit', 100000, 120000, 1, 0, 120000),
(6, '090220000001', 'BR000001', 'Semen Gresik', 'Unit', 110000, 120000, 1, 0, 120000),
(7, '120220000001', 'BR000001', 'Semen Gresik', 'Unit', 110000, 120000, 1, 0, 120000),
(8, '190220000001', 'BR000001', 'Semen Gresik', 'Unit', 110000, 120000, 1, 0, 120000);

-- --------------------------------------------------------

--
-- Table structure for table `tbl_detail_kredit`
--

CREATE TABLE `tbl_detail_kredit` (
  `kode_kredit` varchar(100) NOT NULL,
  `nama_pelanggan` varchar(100) NOT NULL,
  `nik` varchar(100) NOT NULL,
  `No_wa_hp` varchar(50) NOT NULL,
  `nofak_jual` varchar(100) NOT NULL,
  `uang_muka` double NOT NULL,
  `jml_uang` double NOT NULL,
  `jml_kembalian` double NOT NULL,
  `lama_angsuran` int(11) NOT NULL,
  `sisa` int(100) NOT NULL,
  `jatuh_tempo` date NOT NULL,
  `keterangan` text NOT NULL,
  `status` int(1) NOT NULL DEFAULT '0' COMMENT '0=belum lunas,1=lunas'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbl_detail_kredit`
--

INSERT INTO `tbl_detail_kredit` (`kode_kredit`, `nama_pelanggan`, `nik`, `No_wa_hp`, `nofak_jual`, `uang_muka`, `jml_uang`, `jml_kembalian`, `lama_angsuran`, `sisa`, `jatuh_tempo`, `keterangan`, `status`) VALUES
('KK000001', 'xyz', '6208017004960001', '6281254738486', '260120000002', 50000, 50000, 0, 6, 254000, '2020-02-07', '', 0),
('KK000002', 'xyz', '6208017004960001', '628', '190220000001', 30000, 50000, 20000, 3, 90000, '2020-02-17', '-', 0);

-- --------------------------------------------------------

--
-- Table structure for table `tbl_jual`
--

CREATE TABLE `tbl_jual` (
  `jual_nofak` varchar(15) NOT NULL,
  `jual_tanggal` timestamp NULL DEFAULT CURRENT_TIMESTAMP,
  `jual_total` double DEFAULT NULL,
  `jual_jml_uang` double DEFAULT NULL,
  `jual_kembalian` double DEFAULT NULL,
  `jual_user_id` int(11) DEFAULT NULL,
  `jual_keterangan` varchar(20) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbl_jual`
--

INSERT INTO `tbl_jual` (`jual_nofak`, `jual_tanggal`, `jual_total`, `jual_jml_uang`, `jual_kembalian`, `jual_user_id`, `jual_keterangan`) VALUES
('040220000001', '2020-02-04 15:24:55', 120000, 0, 0, 2, 'kredit'),
('060220000001', '2020-02-06 09:25:51', 120000, 0, 0, 2, 'kredit'),
('090220000001', '2020-02-09 04:11:44', 120000, 0, 0, 2, 'kredit'),
('120220000001', '2020-02-11 20:24:07', 120000, 0, 0, 2, 'kredit'),
('190220000001', '2020-02-18 19:47:31', 120000, 0, 0, 2, 'kredit'),
('260120000001', '2020-01-26 07:34:22', 236000, 250000, 14000, 2, 'cash'),
('260120000002', '2020-01-26 07:57:02', 354000, 0, 0, 2, 'kredit');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_kategori`
--

CREATE TABLE `tbl_kategori` (
  `kategori_id` int(11) NOT NULL,
  `kategori_nama` varchar(35) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbl_kategori`
--

INSERT INTO `tbl_kategori` (`kategori_id`, `kategori_nama`) VALUES
(40, 'Semen');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_notif_jatuh_tempo`
--

CREATE TABLE `tbl_notif_jatuh_tempo` (
  `id` int(11) NOT NULL,
  `kode_kredit` varchar(100) NOT NULL,
  `tanggal_terkirim` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `jatuh_tempo` date NOT NULL,
  `status_pesan` enum('terkirim','gagal','diproses') NOT NULL DEFAULT 'diproses'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbl_notif_jatuh_tempo`
--

INSERT INTO `tbl_notif_jatuh_tempo` (`id`, `kode_kredit`, `tanggal_terkirim`, `jatuh_tempo`, `status_pesan`) VALUES
(12, 'KK000001', '2020-02-17 22:11:21', '2020-02-07', 'diproses'),
(13, 'KK000002', '2020-02-18 20:25:09', '2020-02-19', 'diproses');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_satuan`
--

CREATE TABLE `tbl_satuan` (
  `id` int(11) NOT NULL,
  `nama` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbl_satuan`
--

INSERT INTO `tbl_satuan` (`id`, `nama`) VALUES
(2, 'Unit'),
(3, 'Botol');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_setting`
--

CREATE TABLE `tbl_setting` (
  `id` int(11) NOT NULL,
  `nama_setting` varchar(100) NOT NULL,
  `setting` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbl_setting`
--

INSERT INTO `tbl_setting` (`id`, `nama_setting`, `setting`) VALUES
(1, 'Maksimal Lama Cicilan (bulan)', '9'),
(2, 'API Key Notifikasi Whatsapp', 'KBN1E2ZUMEZ3PL2V37NY'),
(3, 'Waktu Kirim Notifikasi Jatuh Tempo (hari sebelum)', '3');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_suplier`
--

CREATE TABLE `tbl_suplier` (
  `suplier_id` int(11) NOT NULL,
  `suplier_nama` varchar(35) DEFAULT NULL,
  `suplier_alamat` varchar(60) DEFAULT NULL,
  `suplier_notelp` varchar(20) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbl_suplier`
--

INSERT INTO `tbl_suplier` (`suplier_id`, `suplier_nama`, `suplier_alamat`, `suplier_notelp`) VALUES
(1, 'Lokal', '-', '-');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_user`
--

CREATE TABLE `tbl_user` (
  `user_id` int(11) NOT NULL,
  `user_nama` varchar(35) DEFAULT NULL,
  `user_username` varchar(30) DEFAULT NULL,
  `user_password` varchar(35) DEFAULT NULL,
  `user_level` varchar(2) DEFAULT NULL COMMENT '1=admin, 2=kasir, 3=gudang, 4=pemilik',
  `user_status` varchar(2) DEFAULT '1'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbl_user`
--

INSERT INTO `tbl_user` (`user_id`, `user_nama`, `user_username`, `user_password`, `user_level`, `user_status`) VALUES
(1, 'Yusup H', 'admin', '21232f297a57a5a743894a0e4a801fc3', '1', '1'),
(2, 'mahfud', 'kasir', 'de28f8f7998f23ab4194b51a6029416f', '2', '1'),
(4, 'Tomi', 'gudang', 'cbb7449d78314665f9e7c7dd0a18a68a', '3', '1'),
(5, 'Andi', 'andi', '03339dc0dff443f15c254baccde9bece', '4', '1');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `tbl_angsuran`
--
ALTER TABLE `tbl_angsuran`
  ADD PRIMARY KEY (`kode_angsuran`),
  ADD KEY `kode_kredit` (`kode_kredit`);

--
-- Indexes for table `tbl_barang`
--
ALTER TABLE `tbl_barang`
  ADD PRIMARY KEY (`barang_id`),
  ADD KEY `barang_user_id` (`barang_user_id`),
  ADD KEY `barang_kategori_id` (`barang_kategori_id`),
  ADD KEY `id_suplier` (`id_suplier`),
  ADD KEY `barang_satuan_id` (`barang_satuan_id`);

--
-- Indexes for table `tbl_barang_keluar`
--
ALTER TABLE `tbl_barang_keluar`
  ADD PRIMARY KEY (`id`),
  ADD KEY `id_barang` (`id_barang`);

--
-- Indexes for table `tbl_barang_masuk`
--
ALTER TABLE `tbl_barang_masuk`
  ADD PRIMARY KEY (`id`),
  ADD KEY `id_barang` (`id_barang`),
  ADD KEY `user_id` (`user_id`);

--
-- Indexes for table `tbl_detail_jual`
--
ALTER TABLE `tbl_detail_jual`
  ADD PRIMARY KEY (`d_jual_id`),
  ADD KEY `d_jual_barang_id` (`d_jual_barang_id`),
  ADD KEY `d_jual_nofak` (`d_jual_nofak`);

--
-- Indexes for table `tbl_detail_kredit`
--
ALTER TABLE `tbl_detail_kredit`
  ADD PRIMARY KEY (`kode_kredit`),
  ADD KEY `nofak_jual` (`nofak_jual`);

--
-- Indexes for table `tbl_jual`
--
ALTER TABLE `tbl_jual`
  ADD PRIMARY KEY (`jual_nofak`),
  ADD KEY `jual_user_id` (`jual_user_id`);

--
-- Indexes for table `tbl_kategori`
--
ALTER TABLE `tbl_kategori`
  ADD PRIMARY KEY (`kategori_id`);

--
-- Indexes for table `tbl_notif_jatuh_tempo`
--
ALTER TABLE `tbl_notif_jatuh_tempo`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tbl_satuan`
--
ALTER TABLE `tbl_satuan`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tbl_setting`
--
ALTER TABLE `tbl_setting`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tbl_suplier`
--
ALTER TABLE `tbl_suplier`
  ADD PRIMARY KEY (`suplier_id`);

--
-- Indexes for table `tbl_user`
--
ALTER TABLE `tbl_user`
  ADD PRIMARY KEY (`user_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `tbl_detail_jual`
--
ALTER TABLE `tbl_detail_jual`
  MODIFY `d_jual_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `tbl_kategori`
--
ALTER TABLE `tbl_kategori`
  MODIFY `kategori_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=41;

--
-- AUTO_INCREMENT for table `tbl_notif_jatuh_tempo`
--
ALTER TABLE `tbl_notif_jatuh_tempo`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- AUTO_INCREMENT for table `tbl_satuan`
--
ALTER TABLE `tbl_satuan`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `tbl_setting`
--
ALTER TABLE `tbl_setting`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `tbl_suplier`
--
ALTER TABLE `tbl_suplier`
  MODIFY `suplier_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `tbl_user`
--
ALTER TABLE `tbl_user`
  MODIFY `user_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `tbl_angsuran`
--
ALTER TABLE `tbl_angsuran`
  ADD CONSTRAINT `tbl_angsuran_ibfk_1` FOREIGN KEY (`kode_kredit`) REFERENCES `tbl_detail_kredit` (`kode_kredit`);

--
-- Constraints for table `tbl_barang`
--
ALTER TABLE `tbl_barang`
  ADD CONSTRAINT `tbl_barang_ibfk_1` FOREIGN KEY (`barang_user_id`) REFERENCES `tbl_user` (`user_id`) ON UPDATE CASCADE,
  ADD CONSTRAINT `tbl_barang_ibfk_2` FOREIGN KEY (`barang_kategori_id`) REFERENCES `tbl_kategori` (`kategori_id`) ON UPDATE CASCADE,
  ADD CONSTRAINT `tbl_barang_ibfk_3` FOREIGN KEY (`id_suplier`) REFERENCES `tbl_suplier` (`suplier_id`),
  ADD CONSTRAINT `tbl_barang_ibfk_4` FOREIGN KEY (`barang_satuan_id`) REFERENCES `tbl_satuan` (`id`) ON UPDATE CASCADE;

--
-- Constraints for table `tbl_barang_keluar`
--
ALTER TABLE `tbl_barang_keluar`
  ADD CONSTRAINT `tbl_barang_keluar_ibfk_1` FOREIGN KEY (`id_barang`) REFERENCES `tbl_barang` (`barang_id`);

--
-- Constraints for table `tbl_barang_masuk`
--
ALTER TABLE `tbl_barang_masuk`
  ADD CONSTRAINT `tbl_barang_masuk_ibfk_1` FOREIGN KEY (`id_barang`) REFERENCES `tbl_barang` (`barang_id`),
  ADD CONSTRAINT `tbl_barang_masuk_ibfk_2` FOREIGN KEY (`user_id`) REFERENCES `tbl_user` (`user_id`);

--
-- Constraints for table `tbl_detail_jual`
--
ALTER TABLE `tbl_detail_jual`
  ADD CONSTRAINT `tbl_detail_jual_ibfk_1` FOREIGN KEY (`d_jual_barang_id`) REFERENCES `tbl_barang` (`barang_id`) ON UPDATE CASCADE,
  ADD CONSTRAINT `tbl_detail_jual_ibfk_2` FOREIGN KEY (`d_jual_nofak`) REFERENCES `tbl_jual` (`jual_nofak`) ON UPDATE CASCADE;

--
-- Constraints for table `tbl_detail_kredit`
--
ALTER TABLE `tbl_detail_kredit`
  ADD CONSTRAINT `tbl_detail_kredit_ibfk_1` FOREIGN KEY (`nofak_jual`) REFERENCES `tbl_jual` (`jual_nofak`);

--
-- Constraints for table `tbl_jual`
--
ALTER TABLE `tbl_jual`
  ADD CONSTRAINT `tbl_jual_ibfk_1` FOREIGN KEY (`jual_user_id`) REFERENCES `tbl_user` (`user_id`) ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
