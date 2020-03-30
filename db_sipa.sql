-- Adminer 4.7.3 MySQL dump

SET NAMES utf8;
SET time_zone = '+00:00';
SET foreign_key_checks = 0;
SET sql_mode = 'NO_AUTO_VALUE_ON_ZERO';

USE `db_sipa`;

SET NAMES utf8mb4;

DROP TABLE IF EXISTS `tb_barang`;
CREATE TABLE `tb_barang` (
  `id_barang` int(11) NOT NULL AUTO_INCREMENT,
  `kode_barang` varchar(255) NOT NULL,
  `nama_barang` varchar(255) NOT NULL,
  `tanggal` date NOT NULL,
  `nomor_faktur` varchar(255) NOT NULL,
  `jumlah_unit` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci NOT NULL,
  `id_satuan` int(11) NOT NULL,
  `harga_beli` int(11) NOT NULL,
  `harga_jual` int(11) NOT NULL,
  `sum_jumlah_beli` int(11) NOT NULL,
  `sum_jumlah_jual` int(11) NOT NULL,
  PRIMARY KEY (`id_barang`),
  KEY `id_satuan` (`id_satuan`),
  CONSTRAINT `tb_barang_ibfk_1` FOREIGN KEY (`id_satuan`) REFERENCES `tb_satuan` (`id_satuan`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

INSERT INTO `tb_barang` (`id_barang`, `kode_barang`, `nama_barang`, `tanggal`, `nomor_faktur`, `jumlah_unit`, `id_satuan`, `harga_beli`, `harga_jual`, `sum_jumlah_beli`, `sum_jumlah_jual`) VALUES
(2,	'brg01',	'Paracetamol',	'2020-03-25',	'001/sjsjj',	'250',	1,	980000,	1000000,	245000000,	250000000);

DROP TABLE IF EXISTS `tb_dokter`;
CREATE TABLE `tb_dokter` (
  `id_dokter` int(11) NOT NULL AUTO_INCREMENT,
  `nama_dokter` varchar(255) NOT NULL,
  `keterangan` text NOT NULL,
  PRIMARY KEY (`id_dokter`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

INSERT INTO `tb_dokter` (`id_dokter`, `nama_dokter`, `keterangan`) VALUES
(2,	'Linus Torvalds, SP. oG',	'Spesialis A');

DROP TABLE IF EXISTS `tb_obat`;
CREATE TABLE `tb_obat` (
  `id_obat` int(11) NOT NULL AUTO_INCREMENT,
  `kode_obat` varchar(255) NOT NULL,
  `nama_obat` varchar(255) NOT NULL,
  PRIMARY KEY (`id_obat`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

INSERT INTO `tb_obat` (`id_obat`, `kode_obat`, `nama_obat`) VALUES
(1,	'OBT001',	'Paracetamol'),
(2,	'OBT002',	'Biogesic');

DROP TABLE IF EXISTS `tb_pasien`;
CREATE TABLE `tb_pasien` (
  `id_pasien` int(11) NOT NULL AUTO_INCREMENT,
  `nik` varchar(255) NOT NULL,
  `nama` varchar(255) NOT NULL,
  `foto` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci NOT NULL,
  `jk` varchar(255) NOT NULL,
  `tgl_lahir` date NOT NULL,
  `agama` varchar(255) NOT NULL,
  `rt` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci NOT NULL,
  `rw` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci NOT NULL,
  `kelurahan` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci NOT NULL,
  `alamat` text NOT NULL,
  PRIMARY KEY (`id_pasien`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

INSERT INTO `tb_pasien` (`id_pasien`, `nik`, `nama`, `foto`, `jk`, `tgl_lahir`, `agama`, `rt`, `rw`, `kelurahan`, `alamat`) VALUES
(1,	'92282',	'Okta Pilopa',	'20200323134243.png',	'Pria',	'2020-03-02',	'Islam',	'003',	'001',	'kakaka',	'kaak'),
(3,	'636373',	'Rifky',	'20200323135426.png',	'Pria',	'2020-03-23',	'Islam',	'001',	'002',	'Sukarame',	'sukarame aja');

DROP TABLE IF EXISTS `tb_resep`;
CREATE TABLE `tb_resep` (
  `id_resep` int(11) NOT NULL AUTO_INCREMENT,
  `kode_resep` varchar(255) NOT NULL,
  `id_unit` int(11) NOT NULL,
  `id_dokter` int(11) NOT NULL,
  `id_pasien` int(11) NOT NULL,
  `nomor_rekam_medis` varchar(255) NOT NULL,
  `tanggal` date NOT NULL,
  `status` enum('dibuat','diberikan','dibayar') NOT NULL,
  PRIMARY KEY (`id_resep`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

INSERT INTO `tb_resep` (`id_resep`, `kode_resep`, `id_unit`, `id_dokter`, `id_pasien`, `nomor_rekam_medis`, `tanggal`, `status`) VALUES
(1,	'resep01',	4,	2,	1,	'love',	'2020-03-30',	'dibuat');

DROP TABLE IF EXISTS `tb_resep_detail`;
CREATE TABLE `tb_resep_detail` (
  `id_resep_detail` int(11) NOT NULL AUTO_INCREMENT,
  `id_resep` int(11) NOT NULL,
  `id_obat` int(11) NOT NULL,
  `jumlah` int(11) NOT NULL,
  `harga_beli` int(11) NOT NULL,
  `harga_jual` int(11) NOT NULL,
  `sum_harga_beli` int(11) NOT NULL,
  `sum_harga_jual` int(11) NOT NULL,
  PRIMARY KEY (`id_resep_detail`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

INSERT INTO `tb_resep_detail` (`id_resep_detail`, `id_resep`, `id_obat`, `jumlah`, `harga_beli`, `harga_jual`, `sum_harga_beli`, `sum_harga_jual`) VALUES
(1,	1,	2,	20,	0,	0,	0,	0);

DROP TABLE IF EXISTS `tb_satuan`;
CREATE TABLE `tb_satuan` (
  `id_satuan` int(11) NOT NULL AUTO_INCREMENT,
  `nama_satuan` varchar(255) NOT NULL,
  PRIMARY KEY (`id_satuan`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

INSERT INTO `tb_satuan` (`id_satuan`, `nama_satuan`) VALUES
(1,	'Sachet'),
(2,	'Botol');

DROP TABLE IF EXISTS `tb_stok`;
CREATE TABLE `tb_stok` (
  `id_stok` int(11) NOT NULL AUTO_INCREMENT,
  `id_obat` int(11) NOT NULL,
  `tanggal_transaksi` datetime NOT NULL,
  `nomor_faktur` varchar(255) NOT NULL,
  `jumlah_unit` int(11) NOT NULL,
  `id_satuan` int(11) NOT NULL,
  `harga_beli` int(11) NOT NULL,
  `harga_jual` int(11) NOT NULL,
  `sum_harga_beli` int(11) NOT NULL,
  `sum_harga_jual` int(11) NOT NULL,
  `status` enum('stok awal','pembelian','penggunaan') NOT NULL,
  `terpakai` int(11) NOT NULL,
  PRIMARY KEY (`id_stok`),
  KEY `id_obat` (`id_obat`),
  KEY `tb_satuan` (`id_satuan`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

INSERT INTO `tb_stok` (`id_stok`, `id_obat`, `tanggal_transaksi`, `nomor_faktur`, `jumlah_unit`, `id_satuan`, `harga_beli`, `harga_jual`, `sum_harga_beli`, `sum_harga_jual`, `status`, `terpakai`) VALUES
(1,	2,	'2020-03-29 00:00:00',	'hhahaa.ai/aajaja',	4,	1,	25000,	28000,	100000,	112000,	'stok awal',	0),
(2,	2,	'2020-03-30 00:00:00',	'001/sjsjj',	15,	1,	26000,	29000,	390000,	435000,	'pembelian',	0),
(3,	2,	'2020-03-29 00:00:00',	'hhahaa.ai/aajaja',	4,	1,	25000,	28000,	100000,	112000,	'stok awal',	0);

DROP TABLE IF EXISTS `tb_unit`;
CREATE TABLE `tb_unit` (
  `id_unit` int(11) NOT NULL AUTO_INCREMENT,
  `nama_unit` varchar(255) NOT NULL,
  PRIMARY KEY (`id_unit`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

INSERT INTO `tb_unit` (`id_unit`, `nama_unit`) VALUES
(1,	'Poli Gigi'),
(4,	'IGD'),
(5,	'Poli Anak'),
(6,	'Keuangan');

DROP TABLE IF EXISTS `tb_user`;
CREATE TABLE `tb_user` (
  `id_user` int(11) NOT NULL AUTO_INCREMENT,
  `nama_user` varchar(255) NOT NULL,
  `username` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `unit` int(11) NOT NULL,
  `level` varchar(255) NOT NULL,
  PRIMARY KEY (`id_user`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

INSERT INTO `tb_user` (`id_user`, `nama_user`, `username`, `password`, `unit`, `level`) VALUES
(1,	'Zuckerberg',	'fb',	'fb',	1,	'Admin'),
(2,	'Linuz Torvalds',	'linuz',	'linuz',	4,	'Operator'),
(3,	'Guido Van Rosum',	'guido',	'guido',	6,	'Kasir');

DROP VIEW IF EXISTS `view_total_stok`;
CREATE TABLE `view_total_stok` (`id_obat` int(11), `kode_obat` varchar(255), `nama_obat` varchar(255), `stok_awal` decimal(32,0), `pembelian` decimal(32,0), `penggunaan` decimal(32,0));


DROP TABLE IF EXISTS `view_total_stok`;
CREATE ALGORITHM=UNDEFINED SQL SECURITY DEFINER VIEW `view_total_stok` AS select `t1`.`id_obat` AS `id_obat`,`t1`.`kode_obat` AS `kode_obat`,`t1`.`nama_obat` AS `nama_obat`,(select sum(`t2`.`jumlah_unit`) from `tb_stok` `t2` where ((`t2`.`id_obat` = `t1`.`id_obat`) and (`t2`.`status` = 'stok awal'))) AS `stok_awal`,(select sum(`t3`.`jumlah_unit`) from `tb_stok` `t3` where ((`t3`.`id_obat` = `t1`.`id_obat`) and (`t3`.`status` = 'pembelian'))) AS `pembelian`,(select sum(`t4`.`jumlah_unit`) from `tb_stok` `t4` where ((`t4`.`id_obat` = `t1`.`id_obat`) and (`t4`.`status` = 'penggunaan'))) AS `penggunaan` from `tb_obat` `t1`;

-- 2020-03-30 14:26:12
