/*
SQLyog Ultimate v12.5.1 (64 bit)
MySQL - 10.1.32-MariaDB : Database - db_sipa
*********************************************************************
*/

/*!40101 SET NAMES utf8 */;

/*!40101 SET SQL_MODE=''*/;

/*!40014 SET @OLD_UNIQUE_CHECKS=@@UNIQUE_CHECKS, UNIQUE_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;
/*!40111 SET @OLD_SQL_NOTES=@@SQL_NOTES, SQL_NOTES=0 */;
/*Data for the table `tb_barang` */

/*Data for the table `tb_dokter` */

insert  into `tb_dokter`(`id_dokter`,`nama_dokter`,`keterangan`) values 
(1,'Abraham','Spesialis penyakit dalam'),
(2,'Lincoln','Spesialis Kulit');

/*Data for the table `tb_obat` */

insert  into `tb_obat`(`id_obat`,`kode_obat`,`nama_obat`) values 
(1,'obat001','Paracetamol'),
(2,'obat002','Amoxilin');

/*Data for the table `tb_pasien` */

insert  into `tb_pasien`(`id_pasien`,`nik`,`nama`,`foto`,`jk`,`tgl_lahir`,`agama`,`rt`,`rw`,`kelurahan`,`alamat`) values 
(1,'12345','Ridho','20200331041519.jpg','Pria','2020-03-31','Islam','001','003','Sukarame','Sukarame'),
(2,'09876554','Arief','20200331041552.JPG','Pria','2020-03-31','Islam','002','003','Kemiling','Kemiling');

/*Data for the table `tb_resep` */

insert  into `tb_resep`(`id_resep`,`kode_resep`,`id_unit`,`id_dokter`,`id_pasien`,`nomor_rekam_medis`,`tanggal`,`status`,`tanggal_bayar`,`tanggal_diberikan`) values 
(1,'resep001',4,1,1,'rm001','2020-03-31','dibayar','2020-04-01',NULL),
(2,'resep002',4,2,2,'rm002','2020-03-31','dibayar','2020-04-01',NULL);

/*Data for the table `tb_resep_detail` */

insert  into `tb_resep_detail`(`id_resep_detail`,`id_resep`,`id_obat`,`jumlah`,`harga_beli`,`harga_jual`,`sum_harga_beli`,`sum_harga_jual`) values 
(1,1,1,9,3700,4200,0,0),
(2,1,2,6,8500,9500,0,0),
(3,2,1,10,3700,4200,37000,42000),
(4,2,2,15,8500,9500,127500,142500);

/*Data for the table `tb_satuan` */

insert  into `tb_satuan`(`id_satuan`,`nama_satuan`) values 
(1,'Sachet'),
(2,'Botol');

/*Data for the table `tb_stok` */

insert  into `tb_stok`(`id_stok`,`id_obat`,`tanggal_transaksi`,`nomor_faktur`,`jumlah_unit`,`id_satuan`,`harga_beli`,`harga_jual`,`sum_harga_beli`,`sum_harga_jual`,`status`,`terpakai`) values 
(1,1,'2020-03-31 00:00:00','fk0001',250,1,3500,4000,875000,1000000,'stok awal',0),
(2,1,'2020-04-01 00:00:00','fk002',100,1,3700,4200,370000,420000,'pembelian',0),
(3,2,'2020-03-31 00:00:00','fk004',200,2,8000,9000,1600000,1800000,'stok awal',0),
(4,2,'2020-04-01 00:00:00','fk004',250,2,8500,9500,2125000,2375000,'pembelian',0),
(5,1,'2020-03-31 00:00:00','resep001',9,1,3700,4200,0,0,'penggunaan',0),
(6,2,'2020-03-31 00:00:00','resep001',6,2,8500,9500,0,0,'penggunaan',0),
(7,1,'2020-03-31 00:00:00','resep002',10,1,3700,4200,37000,42000,'penggunaan',0),
(8,2,'2020-03-31 00:00:00','resep002',15,2,8500,9500,127500,142500,'penggunaan',0);

/*Data for the table `tb_unit` */

insert  into `tb_unit`(`id_unit`,`nama_unit`) values 
(1,'Poli Gigi'),
(4,'IGD'),
(5,'Poli Anak'),
(6,'Keuangan');

/*Data for the table `tb_user` */

insert  into `tb_user`(`id_user`,`nama_user`,`username`,`password`,`unit`,`level`) values 
(1,'Zuckerberg','fb','fb',1,'Admin'),
(2,'Linuz Torvalds','linuz','linuz',4,'Operator'),
(3,'Guido Van Rosum','guido','guido',6,'Kasir');

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;
