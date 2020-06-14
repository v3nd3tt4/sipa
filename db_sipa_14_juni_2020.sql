-- Adminer 4.7.3 MySQL dump

SET NAMES utf8;
SET time_zone = '+00:00';
SET foreign_key_checks = 0;
SET sql_mode = 'NO_AUTO_VALUE_ON_ZERO';

SET NAMES utf8mb4;

CREATE DATABASE `db_sipa` /*!40100 DEFAULT CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci */ /*!80016 DEFAULT ENCRYPTION='N' */;
USE `db_sipa`;

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
(2,	'Linus Torvalds, SP. oG',	'Spesialis A'),
(3,	'Lia',	'Spesialis A'),
(4,	'dr. Fery, S.pA',	'Spesialis Anak'),
(5,	'dr. Marina, S.pD',	'Spesialis penyakit dalam');

DROP TABLE IF EXISTS `tb_obat`;
CREATE TABLE `tb_obat` (
  `id_obat` int(11) NOT NULL AUTO_INCREMENT,
  `kode_obat` varchar(255) NOT NULL,
  `nama_obat` varchar(255) NOT NULL,
  PRIMARY KEY (`id_obat`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

INSERT INTO `tb_obat` (`id_obat`, `kode_obat`, `nama_obat`) VALUES
(1,	'OBT001',	'Paracetamol'),
(2,	'OBT002',	'Biogesic'),
(4,	'OBT004',	'Enervon C'),
(5,	'OBT005',	'Neuralgin'),
(6,	'OBT014',	'Klorokuin'),
(7,	'OBT0015',	'Antasida');

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
  `jenis` enum('umum','pasien jaminan') CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci NOT NULL DEFAULT 'umum',
  PRIMARY KEY (`id_pasien`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

INSERT INTO `tb_pasien` (`id_pasien`, `nik`, `nama`, `foto`, `jk`, `tgl_lahir`, `agama`, `rt`, `rw`, `kelurahan`, `alamat`, `jenis`) VALUES
(1,	'92282',	'Okta Pilopa',	'20200323134243.png',	'Pria',	'2020-03-02',	'Islam',	'003',	'001',	'kakaka',	'kaak',	'umum'),
(3,	'636373',	'Rifky',	'20200323135426.png',	'Pria',	'2020-03-23',	'Islam',	'001',	'002',	'Sukarame',	'sukarame aja',	'umum'),
(4,	'46473722',	'ega ',	'20200405112411.png',	'Pria',	'2020-04-05',	'Kristen Protestan',	'001',	'002',	'hsh sjsjs',	'sukarame',	'pasien jaminan'),
(5,	'8766',	'rendy',	'20200409054131.jpg',	'Pria',	'2020-04-09',	'Islam',	'001',	'002',	'kakaja',	'ii',	'pasien jaminan'),
(6,	'6462727',	'putro',	'20200409060519.jpg',	'Pria',	'2020-04-09',	'Islam',	'001',	'002',	'kakaja',	'iikj',	'umum'),
(7,	'098765456712345678765466',	'Indah',	'20200425041834.jpg',	'Wanita',	'2020-04-25',	'Islam',	'001',	'007',	'kakaja',	'test',	'pasien jaminan');

DROP TABLE IF EXISTS `tb_pbf`;
CREATE TABLE `tb_pbf` (
  `id_pbf` int(11) NOT NULL AUTO_INCREMENT,
  `nama_pbf` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci NOT NULL,
  PRIMARY KEY (`id_pbf`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

INSERT INTO `tb_pbf` (`id_pbf`, `nama_pbf`) VALUES
(1,	'K24'),
(2,	'Kimia Farma');

DROP TABLE IF EXISTS `tb_resep`;
CREATE TABLE `tb_resep` (
  `id_resep` int(11) NOT NULL AUTO_INCREMENT,
  `kode_resep` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci DEFAULT NULL,
  `id_unit` int(11) DEFAULT NULL,
  `id_dokter` int(11) DEFAULT NULL,
  `id_pasien` int(11) DEFAULT NULL,
  `id_kasir` int(11) DEFAULT NULL,
  `nomor_rekam_medis` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci DEFAULT NULL,
  `tanggal` date DEFAULT NULL,
  `status` enum('dibuat','diberikan','dibayar','selesai') CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci DEFAULT NULL,
  `tanggal_bayar` date DEFAULT NULL,
  `tanggal_diberikan` date DEFAULT NULL,
  PRIMARY KEY (`id_resep`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

INSERT INTO `tb_resep` (`id_resep`, `kode_resep`, `id_unit`, `id_dokter`, `id_pasien`, `id_kasir`, `nomor_rekam_medis`, `tanggal`, `status`, `tanggal_bayar`, `tanggal_diberikan`) VALUES
(1,	'resep01',	4,	2,	1,	NULL,	'love',	'2020-03-30',	'dibuat',	NULL,	NULL),
(2,	'resep04',	4,	2,	3,	NULL,	'rkm006',	'2020-04-01',	'selesai',	'2020-04-01',	'2020-04-01'),
(3,	'resep05',	4,	2,	1,	8,	'2020.04.0005',	'2020-04-02',	'selesai',	'2020-04-02',	'2020-04-02'),
(4,	'resep06',	4,	2,	3,	3,	'2020.04.0006',	'2020-04-02',	'dibayar',	'2020-04-05',	NULL),
(5,	'resep07',	4,	2,	4,	3,	'2020.04.0007',	'2020-04-05',	'selesai',	NULL,	'2020-04-05'),
(6,	'resep08',	4,	3,	5,	NULL,	'2020.04.0008',	'2020-04-09',	'selesai',	NULL,	'2020-04-09'),
(7,	'resep0010',	4,	3,	6,	3,	'2020.04.0009',	'2020-04-09',	'selesai',	'2020-04-09',	'2020-04-09'),
(8,	'resep0014',	4,	4,	3,	3,	'2020.04.0015',	'2020-04-25',	'selesai',	'2020-04-25',	'2020-04-25'),
(9,	'resep047363',	4,	5,	7,	NULL,	'2020.04.0008998',	'2020-04-25',	'selesai',	NULL,	'2020-04-25');

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
(1,	1,	2,	20,	0,	0,	0,	0),
(2,	2,	2,	12,	26000,	29000,	312000,	348000),
(3,	2,	1,	9,	4300,	5200,	38700,	46800),
(4,	3,	4,	75,	4500,	6500,	337500,	487500),
(5,	3,	2,	5,	26000,	29000,	130000,	145000),
(6,	4,	4,	65,	4500,	6500,	292500,	422500),
(7,	4,	1,	43,	4300,	5200,	184900,	223600),
(8,	4,	2,	3,	26000,	29000,	78000,	87000),
(9,	5,	1,	3,	0,	0,	0,	0),
(10,	5,	2,	2,	0,	0,	0,	0),
(11,	5,	4,	4,	0,	0,	0,	0),
(12,	6,	5,	12,	0,	0,	0,	0),
(13,	6,	1,	5,	0,	0,	0,	0),
(14,	7,	5,	32,	5000,	7000,	160000,	224000),
(15,	7,	2,	1,	26000,	29000,	26000,	29000),
(16,	7,	4,	5,	4500,	6500,	22500,	32500),
(17,	8,	6,	30,	6000,	9000,	180000,	270000),
(18,	8,	7,	25,	2000,	4000,	50000,	100000),
(19,	9,	6,	4,	0,	0,	0,	0),
(20,	9,	7,	7,	0,	0,	0,	0),
(21,	9,	5,	8,	0,	0,	0,	0);

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
  `tanggal_transaksi` date NOT NULL,
  `tanggal_kadaluarsa` date DEFAULT NULL,
  `tanggal_jatuh_tempo` date DEFAULT NULL,
  `id_pbf` int(11) NOT NULL,
  `nomor_faktur` varchar(255) NOT NULL,
  `jumlah_unit` int(11) NOT NULL,
  `id_satuan` int(11) NOT NULL,
  `harga_beli` int(11) NOT NULL,
  `harga_jual` int(11) NOT NULL,
  `sum_harga_beli` int(11) NOT NULL,
  `sum_harga_jual` int(11) NOT NULL,
  `status` enum('stok awal','pembelian','penggunaan') NOT NULL,
  `terpakai` int(11) NOT NULL,
  `no_batch` varchar(255) NOT NULL,
  PRIMARY KEY (`id_stok`),
  KEY `id_obat` (`id_obat`),
  KEY `tb_satuan` (`id_satuan`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

INSERT INTO `tb_stok` (`id_stok`, `id_obat`, `tanggal_transaksi`, `tanggal_kadaluarsa`, `tanggal_jatuh_tempo`, `id_pbf`, `nomor_faktur`, `jumlah_unit`, `id_satuan`, `harga_beli`, `harga_jual`, `sum_harga_beli`, `sum_harga_jual`, `status`, `terpakai`, `no_batch`) VALUES
(1,	2,	'2020-03-29',	NULL,	NULL,	0,	'hhahaa.ai/aajaja',	4,	1,	25000,	28000,	100000,	112000,	'stok awal',	0,	''),
(2,	2,	'2020-03-30',	NULL,	NULL,	0,	'001/sjsjj',	15,	1,	26000,	29000,	390000,	435000,	'pembelian',	0,	''),
(3,	2,	'2020-03-29',	NULL,	NULL,	0,	'hhahaa.ai/aajaja',	4,	1,	25000,	28000,	100000,	112000,	'stok awal',	0,	''),
(4,	1,	'2020-04-01',	NULL,	NULL,	0,	'fak003',	125,	1,	4300,	5200,	537500,	650000,	'stok awal',	0,	''),
(5,	2,	'2020-04-01',	NULL,	NULL,	0,	'resep04',	12,	1,	26000,	29000,	312000,	348000,	'penggunaan',	0,	''),
(6,	1,	'2020-04-01',	NULL,	NULL,	0,	'resep04',	9,	1,	4300,	5200,	38700,	46800,	'penggunaan',	0,	''),
(7,	4,	'2020-04-01',	NULL,	NULL,	0,	'FAK007/kimia farma',	325,	2,	4000,	6000,	1300000,	1950000,	'stok awal',	0,	''),
(8,	4,	'2020-04-02',	NULL,	NULL,	0,	'FAK009/kimia farma',	100,	2,	4500,	6500,	450000,	650000,	'pembelian',	0,	''),
(9,	4,	'2020-04-02',	NULL,	NULL,	0,	'resep05',	75,	2,	4500,	6500,	337500,	487500,	'penggunaan',	0,	''),
(10,	2,	'2020-04-02',	NULL,	NULL,	0,	'resep05',	5,	1,	26000,	29000,	130000,	145000,	'penggunaan',	0,	''),
(11,	4,	'2020-04-02',	NULL,	NULL,	0,	'resep06',	65,	2,	4500,	6500,	292500,	422500,	'penggunaan',	0,	''),
(12,	1,	'2020-04-02',	NULL,	NULL,	0,	'resep06',	43,	1,	4300,	5200,	184900,	223600,	'penggunaan',	0,	''),
(13,	2,	'2020-04-02',	NULL,	NULL,	0,	'resep06',	3,	1,	26000,	29000,	78000,	87000,	'penggunaan',	0,	''),
(14,	1,	'2020-04-05',	NULL,	NULL,	0,	'resep07',	3,	1,	0,	0,	0,	0,	'penggunaan',	0,	''),
(15,	2,	'2020-04-05',	NULL,	NULL,	0,	'resep07',	2,	1,	0,	0,	0,	0,	'penggunaan',	0,	''),
(16,	4,	'2020-04-05',	NULL,	NULL,	0,	'resep07',	4,	2,	0,	0,	0,	0,	'penggunaan',	0,	''),
(17,	5,	'2020-04-09',	NULL,	NULL,	0,	'fak007',	254,	1,	5000,	7000,	1270000,	1778000,	'stok awal',	0,	''),
(18,	5,	'2020-04-09',	NULL,	NULL,	0,	'resep08',	12,	1,	0,	0,	0,	0,	'penggunaan',	0,	''),
(19,	1,	'2020-04-09',	NULL,	NULL,	0,	'resep08',	5,	1,	0,	0,	0,	0,	'penggunaan',	0,	''),
(20,	5,	'2020-04-09',	NULL,	NULL,	0,	'resep0010',	32,	1,	5000,	7000,	160000,	224000,	'penggunaan',	0,	''),
(21,	2,	'2020-04-09',	NULL,	NULL,	0,	'resep0010',	1,	1,	26000,	29000,	26000,	29000,	'penggunaan',	0,	''),
(22,	4,	'2020-04-09',	NULL,	NULL,	0,	'resep0010',	5,	2,	4500,	6500,	22500,	32500,	'penggunaan',	0,	''),
(23,	6,	'2020-04-25',	NULL,	NULL,	0,	'fak0014/kl',	500,	1,	6000,	8000,	3000000,	4000000,	'stok awal',	0,	''),
(24,	7,	'2020-04-25',	NULL,	NULL,	0,	'hhahaa.ai/aajajaiii',	450,	1,	1500,	3000,	675000,	1350000,	'stok awal',	0,	''),
(25,	7,	'2020-04-25',	NULL,	NULL,	0,	'001/sjsjj887',	100,	1,	2000,	4000,	200000,	400000,	'pembelian',	0,	''),
(26,	7,	'2020-04-05',	NULL,	NULL,	0,	'stok awal',	300,	1,	1000,	2000,	300000,	600000,	'pembelian',	0,	''),
(27,	6,	'2020-04-25',	NULL,	NULL,	0,	'resep0014',	30,	1,	6000,	9000,	180000,	270000,	'penggunaan',	0,	''),
(28,	7,	'2020-04-25',	NULL,	NULL,	0,	'resep0014',	25,	1,	2000,	4000,	50000,	100000,	'penggunaan',	0,	''),
(29,	6,	'2020-04-25',	NULL,	NULL,	0,	'resep047363',	4,	1,	0,	0,	0,	0,	'penggunaan',	0,	''),
(30,	7,	'2020-04-25',	NULL,	NULL,	0,	'resep047363',	7,	1,	0,	0,	0,	0,	'penggunaan',	0,	''),
(31,	5,	'2020-04-25',	NULL,	NULL,	0,	'resep047363',	8,	1,	0,	0,	0,	0,	'penggunaan',	0,	''),
(32,	7,	'2020-05-01',	'2020-07-02',	'2020-07-02',	1,	'hhahaa.ai/aajajaueyet',	540,	1,	2500,	4000,	1350000,	2160000,	'pembelian',	0,	''),
(33,	5,	'2020-05-02',	'2020-05-01',	'2020-05-22',	2,	'001/sjsjjfatet',	340,	1,	1450,	3400,	493000,	1156000,	'pembelian',	0,	''),
(34,	1,	'2020-07-28',	'2020-06-30',	'2020-06-30',	1,	'jjd',	3,	1,	2000,	3000,	6000,	9000,	'pembelian',	0,	'02929');

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

-- 2020-06-14 04:00:37
