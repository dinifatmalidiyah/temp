/*
SQLyog Community v13.2.0 (64 bit)
MySQL - 8.0.30 : Database - db_2
*********************************************************************
*/

/*!40101 SET NAMES utf8 */;

/*!40101 SET SQL_MODE=''*/;

/*!40014 SET @OLD_UNIQUE_CHECKS=@@UNIQUE_CHECKS, UNIQUE_CHECKS=0 */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;
/*!40111 SET @OLD_SQL_NOTES=@@SQL_NOTES, SQL_NOTES=0 */;
CREATE DATABASE /*!32312 IF NOT EXISTS*/`db_2` /*!40100 DEFAULT CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci */ /*!80016 DEFAULT ENCRYPTION='N' */;

USE `db_2`;

/*Table structure for table `analisis` */

DROP TABLE IF EXISTS `analisis`;

CREATE TABLE `analisis` (
  `id` int NOT NULL AUTO_INCREMENT,
  `pelaporan_id` int NOT NULL,
  `pemohon_id` int NOT NULL,
  `petugas_id` int NOT NULL,
  `tanggal_analisa` date NOT NULL,
  `analisa` varchar(225) DEFAULT NULL,
  `tindakan` varchar(225) DEFAULT NULL,
  `saran` varchar(225) DEFAULT NULL,
  `created_at` timestamp NOT NULL,
  `updated_at` timestamp NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

/*Data for the table `analisis` */

insert  into `analisis`(`id`,`pelaporan_id`,`pemohon_id`,`petugas_id`,`tanggal_analisa`,`analisa`,`tindakan`,`saran`,`created_at`,`updated_at`) values 
(1,1,51,54,'2023-12-07','Terlalu banyak muatan','Ganti ban','Kurangi beban','2023-12-07 06:09:25','2023-12-07 06:09:25');

/*Table structure for table `data_anggotas` */

DROP TABLE IF EXISTS `data_anggotas`;

CREATE TABLE `data_anggotas` (
  `id` bigint unsigned NOT NULL AUTO_INCREMENT,
  `nik` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `nama` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `jabatan` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `image` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=235 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

/*Data for the table `data_anggotas` */

/*Table structure for table `data_bukus` */

DROP TABLE IF EXISTS `data_bukus`;

CREATE TABLE `data_bukus` (
  `id` bigint unsigned NOT NULL AUTO_INCREMENT,
  `no_mesin` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `nama_mesin` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `data_kategori_id` bigint unsigned NOT NULL,
  `book_image` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `spek` text CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `jumlah` int NOT NULL,
  `user_id` bigint unsigned DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `data_bukus_data_kategori_id_foreign` (`data_kategori_id`),
  KEY `data_bukus_user_id_foreign` (`user_id`),
  CONSTRAINT `data_bukus_data_kategori_id_foreign` FOREIGN KEY (`data_kategori_id`) REFERENCES `data_kategoris` (`id`),
  CONSTRAINT `data_bukus_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

/*Data for the table `data_bukus` */

insert  into `data_bukus`(`id`,`no_mesin`,`nama_mesin`,`data_kategori_id`,`book_image`,`spek`,`jumlah`,`user_id`,`created_at`,`updated_at`) values 
(1,'847484748','Naruto Shipuden Vol 30',1,'','p',2,1,NULL,NULL);

/*Table structure for table `data_kategoris` */

DROP TABLE IF EXISTS `data_kategoris`;

CREATE TABLE `data_kategoris` (
  `id` bigint unsigned NOT NULL AUTO_INCREMENT,
  `nama_kategori` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `deskripsi` text CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

/*Data for the table `data_kategoris` */

insert  into `data_kategoris`(`id`,`nama_kategori`,`deskripsi`,`created_at`,`updated_at`) values 
(1,'mesin 1','Komik merupakan cerita yang menonjolkan pada gambar statis yang ditampilkan sesuai urutan peristiwa.',NULL,NULL),
(2,'mesin 2','Suatu buku yang menceritakan tentang rangkaian kehidupan seorang tokoh dan orang-orang \r\n                             disekitarnya dengan berbagai macam watak yang ditonjolkan',NULL,NULL);

/*Table structure for table `datakategori` */

DROP TABLE IF EXISTS `datakategori`;

CREATE TABLE `datakategori` (
  `id` bigint unsigned NOT NULL AUTO_INCREMENT,
  `nama_kategori` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `kode_kategori` text CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

/*Data for the table `datakategori` */

/*Table structure for table `datamesin` */

DROP TABLE IF EXISTS `datamesin`;

CREATE TABLE `datamesin` (
  `id` bigint unsigned NOT NULL AUTO_INCREMENT,
  `no_mesin` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `klas_mesin` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `nama_mesin` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `type_mesin` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `merk_mesin` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `lok_ws` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `gambar_mesin` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `spek_min` text CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci,
  `spek_max` text CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci,
  `pabrik` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `kapasitas` int DEFAULT NULL,
  `tahun_mesin` int DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` timestamp NULL DEFAULT CURRENT_TIMESTAMP,
  `kodeJenis` int DEFAULT NULL,
  `nama_kategori` varchar(225) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `nama_klasifikasi` varchar(225) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `kode_klasifikasi` varchar(225) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `kode_kategori` varchar(225) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `kode_jenis` varchar(2250) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=824 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

/*Data for the table `datamesin` */

insert  into `datamesin`(`id`,`no_mesin`,`klas_mesin`,`nama_mesin`,`type_mesin`,`merk_mesin`,`lok_ws`,`gambar_mesin`,`spek_min`,`spek_max`,`pabrik`,`kapasitas`,`tahun_mesin`,`created_at`,`updated_at`,`kodeJenis`,`nama_kategori`,`nama_klasifikasi`,`kode_klasifikasi`,`kode_kategori`,`kode_jenis`) values 
(1,NULL,'19','JETBROACH1',NULL,NULL,'TAMBUN - WS  02 A',NULL,NULL,NULL,NULL,NULL,NULL,'2023-11-17 04:34:54','2023-05-21 03:39:42',NULL,'2',NULL,NULL,NULL,'MP-JBR-045-20XX'),
(2,NULL,'19','JETBROACH2',NULL,NULL,'TAMBUN - WS  02 A',NULL,NULL,NULL,NULL,NULL,NULL,'2023-11-17 04:34:54','2023-05-21 03:39:42',NULL,'2',NULL,NULL,NULL,'MP-JBR-045-20XX'),
(3,NULL,'19','JETBROACH3',NULL,NULL,'TAMBUN - WS  02 A',NULL,NULL,NULL,NULL,NULL,NULL,'2023-11-17 04:34:54','2023-05-21 03:39:42',NULL,'2',NULL,NULL,NULL,'MP-JBR-045-20XX'),
(500,NULL,'19','JETBROACH',NULL,NULL,'TAMBUN - WS  02 A',NULL,NULL,NULL,NULL,NULL,NULL,'2023-11-17 04:34:54','2023-05-21 03:39:42',NULL,'2',NULL,NULL,NULL,'MP-JBR-045-20XX'),
(822,NULL,'16','test1','fewfe','fefewf','BALARAJA','datamesin/xKrasHqVn1LORkUoYlGU20Lc5RtQDYWkzKi9ETHi.jpg','232','323','testneg',10,2001,'2023-12-03 00:17:05','2023-12-06 02:58:00',1,'1',NULL,NULL,NULL,'MU - SKR - 001 - 2001'),
(823,NULL,'1','CNC Nyaaaa','Auto','Krisbow','BALARAJA','datamesin/8OJ9XpEp5sLHlVk60pTxPCDMTIqmWuvZYNnnVp0t.png','121','321','Jepang',113,2013,'2023-12-04 12:01:10','2023-12-06 05:06:11',1,'1',NULL,NULL,NULL,'MU - CAN - 001 - 2013');

/*Table structure for table `departemen` */

DROP TABLE IF EXISTS `departemen`;

CREATE TABLE `departemen` (
  `id` bigint unsigned NOT NULL AUTO_INCREMENT,
  `nama_departemen` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=34 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

/*Data for the table `departemen` */

insert  into `departemen`(`id`,`nama_departemen`,`created_at`,`updated_at`) values 
(1,'PJU',NULL,NULL),
(2,'WS  01 B',NULL,NULL),
(3,'WS  01 C',NULL,NULL),
(4,'WS  02',NULL,NULL),
(5,'WS  02 A',NULL,NULL),
(6,'WS  02 B',NULL,NULL),
(7,'WS  03',NULL,NULL),
(8,'WS  03 B',NULL,NULL),
(9,'WS  04',NULL,NULL),
(10,'WS  05',NULL,NULL),
(11,'WS  05 A',NULL,NULL),
(12,'WS  05 B',NULL,NULL),
(13,'WS  06',NULL,NULL),
(14,'WS  06 A',NULL,NULL),
(15,'WS  06 B',NULL,NULL),
(16,'WS  07',NULL,NULL),
(17,'WS  08',NULL,NULL),
(18,'WS  09',NULL,NULL),
(19,'WS  10',NULL,NULL),
(20,'WS  11',NULL,NULL),
(21,'WS  11 A',NULL,NULL),
(22,'WS  11 B',NULL,NULL),
(23,'WS  11 C ',NULL,NULL),
(24,'WS  12',NULL,NULL),
(25,'WS  14 A',NULL,NULL),
(26,'WS  14 B',NULL,NULL),
(27,'WS  14B',NULL,NULL),
(28,'BLOK A',NULL,NULL),
(29,'BLOK B ',NULL,NULL),
(30,'BLOK C ',NULL,NULL),
(31,'BLOK D ',NULL,NULL),
(32,'BLOK E ',NULL,NULL),
(33,'BLOK F ',NULL,NULL);

/*Table structure for table `failed_jobs` */

DROP TABLE IF EXISTS `failed_jobs`;

CREATE TABLE `failed_jobs` (
  `id` bigint unsigned NOT NULL AUTO_INCREMENT,
  `uuid` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `connection` text CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `queue` text CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `payload` longtext CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `exception` longtext CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `failed_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`),
  UNIQUE KEY `failed_jobs_uuid_unique` (`uuid`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

/*Data for the table `failed_jobs` */

/*Table structure for table `feedback` */

DROP TABLE IF EXISTS `feedback`;

CREATE TABLE `feedback` (
  `id` bigint unsigned NOT NULL AUTO_INCREMENT,
  `hasil_perbaikan` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `uraian_perbaikan` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `pelaporan_id` bigint unsigned NOT NULL,
  `petugas_id` int NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`) USING BTREE
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci ROW_FORMAT=DYNAMIC;

/*Data for the table `feedback` */

insert  into `feedback`(`id`,`hasil_perbaikan`,`uraian_perbaikan`,`pelaporan_id`,`petugas_id`,`created_at`,`updated_at`) values 
(1,'normal','Mantap normal',1,51,'2023-12-07 07:39:01','2023-12-07 07:39:01');

/*Table structure for table `feedback_replies` */

DROP TABLE IF EXISTS `feedback_replies`;

CREATE TABLE `feedback_replies` (
  `id` bigint unsigned NOT NULL AUTO_INCREMENT,
  `feedback_replies` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `feedback_id` bigint unsigned NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`) USING BTREE
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci ROW_FORMAT=DYNAMIC;

/*Data for the table `feedback_replies` */

insert  into `feedback_replies`(`id`,`feedback_replies`,`feedback_id`,`created_at`,`updated_at`) values 
(1,'baik terima kasih balasannya',1,'2023-11-28 02:53:11','2023-11-28 02:53:11'),
(2,'Baik om',2,'2023-11-28 03:28:09','2023-11-28 03:28:09'),
(3,'terimakasih',3,'2023-11-29 01:46:26','2023-11-29 01:46:26');

/*Table structure for table `kategori` */

DROP TABLE IF EXISTS `kategori`;

CREATE TABLE `kategori` (
  `id` bigint unsigned NOT NULL AUTO_INCREMENT,
  `nama` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

/*Data for the table `kategori` */

insert  into `kategori`(`id`,`nama`,`created_at`,`updated_at`) values 
(1,'Mesin Pendukung',NULL,NULL),
(2,'Kendaraan Operasional',NULL,NULL),
(3,'Mesin Utama',NULL,NULL),
(4,'Kendaraan Inventaris',NULL,NULL);

/*Table structure for table `kategorimesin` */

DROP TABLE IF EXISTS `kategorimesin`;

CREATE TABLE `kategorimesin` (
  `id` bigint unsigned NOT NULL AUTO_INCREMENT,
  `nama_kategori` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `kode_kategori` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=8 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

/*Data for the table `kategorimesin` */

insert  into `kategorimesin`(`id`,`nama_kategori`,`kode_kategori`,`created_at`,`updated_at`) values 
(1,'Mesin Utama','MU','0000-00-00 00:00:00','2023-11-13 08:22:32'),
(2,'Mesin Pendukung','MP','0000-00-00 00:00:00','0000-00-00 00:00:00'),
(3,'Kendaraan Operasional','KO','0000-00-00 00:00:00','0000-00-00 00:00:00'),
(4,'Kendaraan Inventaris','KI','0000-00-00 00:00:00','0000-00-00 00:00:00');

/*Table structure for table `klasifikasi` */

DROP TABLE IF EXISTS `klasifikasi`;

CREATE TABLE `klasifikasi` (
  `id` bigint unsigned NOT NULL AUTO_INCREMENT,
  `nama` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `kategori_id` bigint unsigned NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `klasifikasi_kategori_id_foreign` (`kategori_id`),
  CONSTRAINT `klasifikasi_kategori_id_foreign` FOREIGN KEY (`kategori_id`) REFERENCES `kategori` (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

/*Data for the table `klasifikasi` */

insert  into `klasifikasi`(`id`,`nama`,`kategori_id`,`created_at`,`updated_at`) values 
(1,'CNC ANGLE',4,NULL,NULL),
(2,'CNC PLATE',1,NULL,NULL);

/*Table structure for table `klasmesin` */

DROP TABLE IF EXISTS `klasmesin`;

CREATE TABLE `klasmesin` (
  `id` bigint unsigned NOT NULL AUTO_INCREMENT,
  `nama_klasifikasi` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `kode_klasifikasi` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `kategorimesin_id` int DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=73 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

/*Data for the table `klasmesin` */

insert  into `klasmesin`(`id`,`nama_klasifikasi`,`kode_klasifikasi`,`created_at`,`updated_at`,`kategorimesin_id`) values 
(1,'CNC ANGLE','CAN','0000-00-00 00:00:00','2023-11-16 07:20:46',1),
(2,'CNC PLATE','CPL','0000-00-00 00:00:00','0000-00-00 00:00:00',1),
(3,'BENDING','BEN','0000-00-00 00:00:00','2023-11-16 02:19:13',1),
(4,'TRAVO LAS','LAS',NULL,NULL,1),
(5,'CNC GAS CUTTING','CGC','0000-00-00 00:00:00','0000-00-00 00:00:00',1),
(6,'CNC DRILLING','CDR','0000-00-00 00:00:00','0000-00-00 00:00:00',1),
(7,'CNC PUNCH','CPC','0000-00-00 00:00:00','0000-00-00 00:00:00',1),
(8,'SHEARING','SHR','0000-00-00 00:00:00','0000-00-00 00:00:00',1),
(9,'PRESS ','PRS','0000-00-00 00:00:00','0000-00-00 00:00:00',1),
(10,'MULTI CUTTING','MCT','0000-00-00 00:00:00','0000-00-00 00:00:00',1),
(11,'ROLL PLATE','RPL','0000-00-00 00:00:00','0000-00-00 00:00:00',1),
(12,'BAND SAW','BSW','0000-00-00 00:00:00','0000-00-00 00:00:00',1),
(13,'BOR DUDUK','BRD','0000-00-00 00:00:00','0000-00-00 00:00:00',1),
(14,'RADIAL BOR','BRR','0000-00-00 00:00:00','0000-00-00 00:00:00',1),
(15,'BUBUT','BBT','0000-00-00 00:00:00','0000-00-00 00:00:00',1),
(16,'SEKRAP','SKR','0000-00-00 00:00:00','0000-00-00 00:00:00',1),
(17,'HOIST CRANE','HOC','0000-00-00 00:00:00','0000-00-00 00:00:00',2),
(18,'FORKLIFT','FRL','0000-00-00 00:00:00','0000-00-00 00:00:00',2),
(19,'JET BROACH','JBR','0000-00-00 00:00:00','0000-00-00 00:00:00',2),
(20,'GERINDA TANGAN','GRT','0000-00-00 00:00:00','0000-00-00 00:00:00',2),
(21,'PELURUSAN TIANG','PLT','0000-00-00 00:00:00','0000-00-00 00:00:00',2),
(22,'GERINDA POTONG','DRP','0000-00-00 00:00:00','0000-00-00 00:00:00',2),
(23,'MAGNET DRILL','MGD','0000-00-00 00:00:00','0000-00-00 00:00:00',2),
(24,'FAN','FAN','0000-00-00 00:00:00','0000-00-00 00:00:00',2),
(25,'LAIN-LAIN','LAN','0000-00-00 00:00:00','0000-00-00 00:00:00',2),
(26,'TRUK + CRANE','TRK','0000-00-00 00:00:00','0000-00-00 00:00:00',3),
(27,'TRONTON + CRANE','TRT','0000-00-00 00:00:00','0000-00-00 00:00:00',3),
(28,'MOBILE CRANE','MBC','0000-00-00 00:00:00','0000-00-00 00:00:00',3),
(29,'PICK UP','PIK','0000-00-00 00:00:00','0000-00-00 00:00:00',3),
(30,'MOTOR RODA 3','MRT','0000-00-00 00:00:00','0000-00-00 00:00:00',3),
(31,'MOBIL PENUMPANG','MOB','0000-00-00 00:00:00','0000-00-00 00:00:00',4),
(32,'MOTOR','MOT','0000-00-00 00:00:00','0000-00-00 00:00:00',4),
(64,'GERINDA BOTOL','GRB','2023-11-16 09:51:23','2023-11-16 09:51:23',2),
(65,'MOTOR RODA 4','MRT','2023-11-16 09:54:15','2023-11-16 09:54:15',3);

/*Table structure for table `mesins` */

DROP TABLE IF EXISTS `mesins`;

CREATE TABLE `mesins` (
  `id` bigint unsigned NOT NULL AUTO_INCREMENT,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

/*Data for the table `mesins` */

/*Table structure for table `migrations` */

DROP TABLE IF EXISTS `migrations`;

CREATE TABLE `migrations` (
  `id` int unsigned NOT NULL AUTO_INCREMENT,
  `migration` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `batch` int NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=24 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

/*Data for the table `migrations` */

insert  into `migrations`(`id`,`migration`,`batch`) values 
(1,'2014_10_12_000000_create_users_table',1),
(2,'2014_10_12_100000_create_password_resets_table',1),
(3,'2019_08_19_000000_create_failed_jobs_table',1),
(4,'2019_12_14_000001_create_personal_access_tokens_table',1),
(5,'2022_06_04_030329_create_data_anggotas_table',1),
(6,'2022_06_04_030704_create_data_kategoris_table',1),
(7,'2022_06_04_030728_create_data_bukus_table',1),
(8,'2022_06_22_091944_peminjaman',1),
(9,'2022_06_23_063053_create_pengembalians_table',1),
(10,'2023_10_18_080736_create_datamesin_table',1),
(11,'2023_10_18_091419_create_mesins_table',1),
(12,'2023_10_18_160911_create_workshop_table',1),
(13,'2023_10_25_045812_create_datakategori_table',2),
(14,'2023_10_25_060216_create_noregistrasi_table',2),
(15,'2023_10_25_071508_create_noregistrasi_table',3),
(16,'2023_10_25_071738_create_kategorimesin_table',4),
(17,'2023_10_25_075130_create_klasmesin_table',5),
(18,'2023_10_25_080012_create_klasmesin_table',6),
(19,'2023_11_21_042230_create__pengajuan__tables',7),
(20,'2023_11_21_042410_create__validasi_tables',8),
(21,'2023_11_24_065546_create_plant_tables',8),
(22,'2023_11_24_075038_create_departemen_tables',9),
(23,'2023_11_27_071345_add_approved_to_users_table',10);

/*Table structure for table `noregistrasi` */

DROP TABLE IF EXISTS `noregistrasi`;

CREATE TABLE `noregistrasi` (
  `id` bigint unsigned NOT NULL AUTO_INCREMENT,
  `kode_registrasi` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

/*Data for the table `noregistrasi` */

/*Table structure for table `password_resets` */

DROP TABLE IF EXISTS `password_resets`;

CREATE TABLE `password_resets` (
  `email` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  KEY `password_resets_email_index` (`email`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

/*Data for the table `password_resets` */

/*Table structure for table `pelaporans` */

DROP TABLE IF EXISTS `pelaporans`;

CREATE TABLE `pelaporans` (
  `id` bigint unsigned NOT NULL AUTO_INCREMENT,
  `no_registrasi` varchar(20) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `id_pemohon` int NOT NULL DEFAULT '0',
  `tanggal_permintaan` date NOT NULL,
  `tanggal_kerusakan` datetime NOT NULL,
  `judul` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `gambar_laporan` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `deskripsi` text CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `status` enum('menunggu','sedang diperbaiki','selesai','menunggu feedback') CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'menunggu',
  `datamesin_id` bigint unsigned NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

/*Data for the table `pelaporans` */

insert  into `pelaporans`(`id`,`no_registrasi`,`id_pemohon`,`tanggal_permintaan`,`tanggal_kerusakan`,`judul`,`gambar_laporan`,`deskripsi`,`status`,`datamesin_id`,`created_at`,`updated_at`) values 
(1,'001/WS/XII/20230824',51,'2023-12-05','2023-12-06 05:38:00',NULL,'laporan/WgfEbwLaEzEW4OjWBVoI3MlgkYTy7mjNrteRIj8p.png','Rusak banget gan','selesai',823,'2023-12-05 22:42:18','2023-12-07 07:39:01'),
(2,'002/WS/XII/20230824',51,'2023-12-06','2023-12-06 10:03:00',NULL,'laporan/NWZLRe27CCuV3r6Gi3EumOPL9e0tQ6DGPrXQ9YZF.jpg','Rusak lagi anjirrr','sedang diperbaiki',822,'2023-12-06 03:03:52','2023-12-07 08:08:08'),
(4,'003/WS/XII/20230824',51,'2023-12-07','2023-12-07 10:28:00',NULL,'laporan/NELPcKvFhrywyqzGMSRLXssDgkSb3jMh3DeBowWu.jpg','Ngetes lagi anjirr','menunggu',822,'2023-12-07 03:28:34','2023-12-07 04:18:54');

/*Table structure for table `peminjaman` */

DROP TABLE IF EXISTS `peminjaman`;

CREATE TABLE `peminjaman` (
  `id` bigint unsigned NOT NULL AUTO_INCREMENT,
  `anggotas_id` bigint unsigned DEFAULT NULL,
  `bukus_id` bigint unsigned DEFAULT NULL,
  `tanggal_pinjam` date NOT NULL,
  `lama_peminjaman` int NOT NULL,
  `user_id` bigint unsigned NOT NULL,
  `status` int NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `peminjaman_anggotas_id_foreign` (`anggotas_id`),
  KEY `peminjaman_bukus_id_foreign` (`bukus_id`),
  KEY `peminjaman_user_id_foreign` (`user_id`),
  CONSTRAINT `peminjaman_anggotas_id_foreign` FOREIGN KEY (`anggotas_id`) REFERENCES `data_anggotas` (`id`),
  CONSTRAINT `peminjaman_bukus_id_foreign` FOREIGN KEY (`bukus_id`) REFERENCES `data_bukus` (`id`),
  CONSTRAINT `peminjaman_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

/*Data for the table `peminjaman` */

/*Table structure for table `pengajuan` */

DROP TABLE IF EXISTS `pengajuan`;

CREATE TABLE `pengajuan` (
  `id` bigint unsigned NOT NULL AUTO_INCREMENT,
  `user_id` int NOT NULL,
  `dari_tanggal` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `ke_tanggal` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `keterangan` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `st_pengajuan` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `nama_ws` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `nama_alatmesink3` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

/*Data for the table `pengajuan` */

insert  into `pengajuan`(`id`,`user_id`,`dari_tanggal`,`ke_tanggal`,`keterangan`,`st_pengajuan`,`nama_ws`,`nama_alatmesink3`,`created_at`,`updated_at`) values 
(4,51,'2023-11-15','p','p','S','p','p','2023-11-28 06:09:03','2023-11-28 06:09:34'),
(5,51,'2023-11-23','p','p','R','p','p','2023-11-28 06:50:05','2023-11-28 06:50:05');

/*Table structure for table `pengembalians` */

DROP TABLE IF EXISTS `pengembalians`;

CREATE TABLE `pengembalians` (
  `id` bigint unsigned NOT NULL AUTO_INCREMENT,
  `peminjaman_id` bigint unsigned DEFAULT NULL,
  `tanggal_kembali` date NOT NULL,
  `denda` int DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `pengembalians_peminjaman_id_foreign` (`peminjaman_id`),
  CONSTRAINT `pengembalians_peminjaman_id_foreign` FOREIGN KEY (`peminjaman_id`) REFERENCES `peminjaman` (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

/*Data for the table `pengembalians` */

/*Table structure for table `personal_access_tokens` */

DROP TABLE IF EXISTS `personal_access_tokens`;

CREATE TABLE `personal_access_tokens` (
  `id` bigint unsigned NOT NULL AUTO_INCREMENT,
  `tokenable_type` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `tokenable_id` bigint unsigned NOT NULL,
  `name` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(64) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `abilities` text CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci,
  `last_used_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `personal_access_tokens_token_unique` (`token`),
  KEY `personal_access_tokens_tokenable_type_tokenable_id_index` (`tokenable_type`,`tokenable_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

/*Data for the table `personal_access_tokens` */

/*Table structure for table `plant` */

DROP TABLE IF EXISTS `plant`;

CREATE TABLE `plant` (
  `id` bigint unsigned NOT NULL AUTO_INCREMENT,
  `nama_plant` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=9 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

/*Data for the table `plant` */

insert  into `plant`(`id`,`nama_plant`,`created_at`,`updated_at`) values 
(1,'Tambun',NULL,NULL),
(2,'Setu',NULL,NULL),
(3,'Cilengsi',NULL,NULL),
(4,'Cikarang',NULL,NULL),
(5,'Pusat',NULL,NULL),
(6,'RAB',NULL,NULL),
(7,'TJI',NULL,NULL),
(8,'Traya',NULL,NULL);

/*Table structure for table `users` */

DROP TABLE IF EXISTS `users`;

CREATE TABLE `users` (
  `id` bigint unsigned NOT NULL AUTO_INCREMENT,
  `foto` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `nama` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `nik` varchar(19) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `plant` varchar(225) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `departemen` varchar(225) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `password` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `level` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `tanggal_join` date DEFAULT NULL,
  `remember_token` varchar(100) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `approved` tinyint(1) NOT NULL DEFAULT '0',
  PRIMARY KEY (`id`),
  UNIQUE KEY `users_email_unique` (`email`)
) ENGINE=InnoDB AUTO_INCREMENT=55 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

/*Data for the table `users` */

insert  into `users`(`id`,`foto`,`nama`,`nik`,`plant`,`departemen`,`email`,`email_verified_at`,`password`,`level`,`tanggal_join`,`remember_token`,`created_at`,`updated_at`,`approved`) values 
(1,'users/qOhoYiVw5iiOkc71KxJRsnzZWWtndBYfnVDPRZbT.png','Muhamad Widyantoro','8888888','Tambun','WS  01 B','admin@admin.com',NULL,'$2y$10$7n4tSFJXESkefqrenEmC2uQD2sUyL0G2JZiQMzzZm1q8GGYOcG4Pa','Admin','2023-11-23',NULL,'2023-11-27 02:15:07','2023-11-28 04:24:18',1),
(51,NULL,'budiman','4444444','Cikarang','WS  01 C',NULL,NULL,'$2y$10$YUQvcUi.EuwbLuAVm7rlh.gJmpt99UzBAGzh1.9Go6ne0UeVmpDNO','Karyawan',NULL,NULL,'2023-11-28 04:30:10','2023-11-29 07:35:47',1),
(54,NULL,'Samuel','1111111','Cilengsi','BLOK A','samuel@example.com',NULL,'$2y$10$9MMY6WV4bLme7X2RapaoY.0MwPb9ggSBPZ9jlJYmeiUUO8KVZD/86','Petugas',NULL,NULL,'2023-12-07 01:17:51','2023-12-07 01:20:26',1);

/*Table structure for table `validasi` */

DROP TABLE IF EXISTS `validasi`;

CREATE TABLE `validasi` (
  `id` bigint unsigned NOT NULL AUTO_INCREMENT,
  `user_id` int NOT NULL,
  `pengajuan_id` int NOT NULL,
  `action_to_do` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `keterangan` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

/*Data for the table `validasi` */

insert  into `validasi`(`id`,`user_id`,`pengajuan_id`,`action_to_do`,`keterangan`,`created_at`,`updated_at`) values 
(4,51,4,'S','p','2023-11-28 06:09:03','2023-11-28 06:09:34'),
(5,51,5,'R','','2023-11-28 06:50:05','2023-11-28 06:50:05');

/*Table structure for table `workshop` */

DROP TABLE IF EXISTS `workshop`;

CREATE TABLE `workshop` (
  `id` bigint unsigned NOT NULL AUTO_INCREMENT,
  `nama_workshop` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `keterangan` text CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=88 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

/*Data for the table `workshop` */

insert  into `workshop`(`id`,`nama_workshop`,`keterangan`,`created_at`,`updated_at`) values 
(1,'BALARAJA','1','0000-00-00 00:00:00','0000-00-00 00:00:00'),
(2,'CIKARANG / KCB','1','0000-00-00 00:00:00','0000-00-00 00:00:00'),
(3,'CILEUNGSI',NULL,'0000-00-00 00:00:00','0000-00-00 00:00:00'),
(4,'SETU',NULL,'0000-00-00 00:00:00','0000-00-00 00:00:00'),
(5,'TAMBUN - ACC BAUT','','0000-00-00 00:00:00','0000-00-00 00:00:00'),
(6,'TAMBUN - MAINTENANCE','','0000-00-00 00:00:00','0000-00-00 00:00:00'),
(7,'TAMBUN - WS  01 B','','0000-00-00 00:00:00','0000-00-00 00:00:00'),
(8,'TAMBUN - WS  01 C','','0000-00-00 00:00:00','0000-00-00 00:00:00'),
(9,'TAMBUN - WS  02','','0000-00-00 00:00:00','0000-00-00 00:00:00'),
(10,'TAMBUN - WS  02 A','','0000-00-00 00:00:00','0000-00-00 00:00:00'),
(11,'nama_workshop','keterangan','0000-00-00 00:00:00','0000-00-00 00:00:00'),
(12,'TAMBUN - WS  03','','0000-00-00 00:00:00','0000-00-00 00:00:00'),
(13,'TAMBUN - WS  03 B','','0000-00-00 00:00:00','0000-00-00 00:00:00'),
(14,'TAMBUN - WS  04','','0000-00-00 00:00:00','0000-00-00 00:00:00'),
(15,'TAMBUN - WS  05','','0000-00-00 00:00:00','0000-00-00 00:00:00'),
(16,'TAMBUN - WS  05 A','','0000-00-00 00:00:00','0000-00-00 00:00:00'),
(17,'TAMBUN - WS  05 B','','0000-00-00 00:00:00','0000-00-00 00:00:00'),
(18,'TAMBUN - WS  06','','0000-00-00 00:00:00','0000-00-00 00:00:00'),
(19,'TAMBUN - WS  06 A','','0000-00-00 00:00:00','0000-00-00 00:00:00'),
(20,'TAMBUN - WS  06 B','','0000-00-00 00:00:00','0000-00-00 00:00:00'),
(21,'TAMBUN - WS  07','','0000-00-00 00:00:00','0000-00-00 00:00:00'),
(22,'TAMBUN - WS  08','','0000-00-00 00:00:00','0000-00-00 00:00:00'),
(23,'TAMBUN - WS  09','','0000-00-00 00:00:00','0000-00-00 00:00:00'),
(24,'TAMBUN - WS  10','','0000-00-00 00:00:00','0000-00-00 00:00:00'),
(25,'TAMBUN - WS  11','','0000-00-00 00:00:00','0000-00-00 00:00:00'),
(26,'TAMBUN - WS  11 A','','0000-00-00 00:00:00','0000-00-00 00:00:00'),
(27,'TAMBUN - WS  11 B','','0000-00-00 00:00:00','0000-00-00 00:00:00'),
(28,'TAMBUN - WS  11 C ','','0000-00-00 00:00:00','0000-00-00 00:00:00'),
(29,'TAMBUN - WS  12','','0000-00-00 00:00:00','0000-00-00 00:00:00'),
(30,'TAMBUN - WS  13','','0000-00-00 00:00:00','0000-00-00 00:00:00'),
(31,'TAMBUN - WS  14 A','','0000-00-00 00:00:00','0000-00-00 00:00:00'),
(32,'TAMBUN - WS  14 B','','0000-00-00 00:00:00','0000-00-00 00:00:00'),
(33,'TRAYA - BLOK A','','0000-00-00 00:00:00','0000-00-00 00:00:00'),
(34,'TRAYA - BLOK B ','','0000-00-00 00:00:00','0000-00-00 00:00:00'),
(35,'TRAYA - BLOK C ','','0000-00-00 00:00:00','0000-00-00 00:00:00'),
(36,'TRAYA - BLOK D ','','0000-00-00 00:00:00','0000-00-00 00:00:00'),
(37,'TRAYA - BLOK E ','','0000-00-00 00:00:00','0000-00-00 00:00:00'),
(38,'TRAYA - BLOK F ','','0000-00-00 00:00:00','0000-00-00 00:00:00'),
(39,'TRAYA - PJU','','0000-00-00 00:00:00','0000-00-00 00:00:00'),
(40,'AAN','','0000-00-00 00:00:00','0000-00-00 00:00:00'),
(41,'ABDUL RAHMAN','','0000-00-00 00:00:00','0000-00-00 00:00:00'),
(42,'AGUS AFSIAN','','0000-00-00 00:00:00','0000-00-00 00:00:00'),
(43,'AGUS TRIONO','','0000-00-00 00:00:00','0000-00-00 00:00:00'),
(44,'AHMAD SUJAI','','0000-00-00 00:00:00','0000-00-00 00:00:00'),
(45,'ANDREAS M BOGIA','','0000-00-00 00:00:00','0000-00-00 00:00:00'),
(46,'ARIEF DHARMAWAN','','0000-00-00 00:00:00','0000-00-00 00:00:00'),
(47,'ARIEF YULIANTO','','0000-00-00 00:00:00','0000-00-00 00:00:00'),
(48,'ASYIK FAUZI','','0000-00-00 00:00:00','0000-00-00 00:00:00'),
(49,'BAMBANG E RUSWANTO','','0000-00-00 00:00:00','0000-00-00 00:00:00'),
(50,'BAMBANG SETIAJI','','0000-00-00 00:00:00','0000-00-00 00:00:00'),
(51,'BANGUN PRASENO','','0000-00-00 00:00:00','0000-00-00 00:00:00'),
(52,'CUSWANTO','','0000-00-00 00:00:00','0000-00-00 00:00:00'),
(53,'DADANG JUHENDA','','0000-00-00 00:00:00','0000-00-00 00:00:00'),
(54,'DEDE SUMARNI','','0000-00-00 00:00:00','0000-00-00 00:00:00'),
(55,'EEP SUANDI','','0000-00-00 00:00:00','0000-00-00 00:00:00'),
(56,'EGI TRI  UTOMO','','0000-00-00 00:00:00','0000-00-00 00:00:00'),
(57,'EVA OLIVIA','','0000-00-00 00:00:00','0000-00-00 00:00:00'),
(58,'FERDIAN WIBISONO','','0000-00-00 00:00:00','0000-00-00 00:00:00'),
(59,'FIRJADI','','0000-00-00 00:00:00','0000-00-00 00:00:00'),
(60,'GENTARIO AMRINA','','0000-00-00 00:00:00','0000-00-00 00:00:00'),
(61,'GIN GIN RIVALGIANA','','0000-00-00 00:00:00','0000-00-00 00:00:00'),
(62,'HENDRI TJUKRI','','0000-00-00 00:00:00','0000-00-00 00:00:00'),
(63,'HENDRIK','','0000-00-00 00:00:00','0000-00-00 00:00:00'),
(64,'HERI HERIYATNA','','0000-00-00 00:00:00','0000-00-00 00:00:00'),
(65,'HERI S','','0000-00-00 00:00:00','0000-00-00 00:00:00'),
(66,'INAWATY','','0000-00-00 00:00:00','0000-00-00 00:00:00'),
(67,'IRWAN PRIHAGONO','','0000-00-00 00:00:00','0000-00-00 00:00:00'),
(68,'IRWAN SEPTIADI','','0000-00-00 00:00:00','0000-00-00 00:00:00'),
(69,'JOHAN ANDRIANTO','','0000-00-00 00:00:00','0000-00-00 00:00:00'),
(70,'LIA R','','0000-00-00 00:00:00','0000-00-00 00:00:00'),
(71,'MAIZON','','0000-00-00 00:00:00','0000-00-00 00:00:00'),
(72,'MEGAWATI','','0000-00-00 00:00:00','0000-00-00 00:00:00'),
(73,'MUMUN MUNAWIR','','0000-00-00 00:00:00','0000-00-00 00:00:00'),
(74,'NONO PRAYITNO','','0000-00-00 00:00:00','0000-00-00 00:00:00'),
(75,'RAJANTO','','0000-00-00 00:00:00','0000-00-00 00:00:00'),
(76,'RIZAL','','0000-00-00 00:00:00','0000-00-00 00:00:00'),
(77,'RUDI SISWANTO','','0000-00-00 00:00:00','0000-00-00 00:00:00'),
(78,'SAMSUL MA\'ARIF','','0000-00-00 00:00:00','0000-00-00 00:00:00'),
(79,'SANEN','','0000-00-00 00:00:00','0000-00-00 00:00:00'),
(80,'SOLEH SUPRIATNA','','0000-00-00 00:00:00','0000-00-00 00:00:00'),
(81,'SOLIKIN','','0000-00-00 00:00:00','0000-00-00 00:00:00'),
(82,'SONNY NIRWAN','','0000-00-00 00:00:00','0000-00-00 00:00:00'),
(83,'STEVAN FRANKLIN','','0000-00-00 00:00:00','0000-00-00 00:00:00'),
(84,'SUGIATMAN','','0000-00-00 00:00:00','0000-00-00 00:00:00'),
(85,'UNGGUL JAKA S','','0000-00-00 00:00:00','0000-00-00 00:00:00'),
(86,'YUDHI. M','','0000-00-00 00:00:00','0000-00-00 00:00:00'),
(87,'YUDI TRI CAHYONO','','0000-00-00 00:00:00','0000-00-00 00:00:00');

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;
