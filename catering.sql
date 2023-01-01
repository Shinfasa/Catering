-- phpMyAdmin SQL Dump
-- version 4.7.9
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1:3306
-- Generation Time: Jan 01, 2023 at 11:44 AM
-- Server version: 5.7.21
-- PHP Version: 7.2.4

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `catering`
--

-- --------------------------------------------------------

--
-- Table structure for table `akses`
--

DROP TABLE IF EXISTS `akses`;
CREATE TABLE IF NOT EXISTS `akses` (
  `id_akses` int(11) NOT NULL AUTO_INCREMENT,
  `hak_akses` varchar(50) COLLATE utf8mb4_unicode_ci NOT NULL,
  PRIMARY KEY (`id_akses`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `akses`
--

INSERT INTO `akses` (`id_akses`, `hak_akses`) VALUES
(1, 'Admin'),
(2, 'Customer');

-- --------------------------------------------------------

--
-- Table structure for table `carousel`
--

DROP TABLE IF EXISTS `carousel`;
CREATE TABLE IF NOT EXISTS `carousel` (
  `id_car` int(11) NOT NULL AUTO_INCREMENT,
  `gambar` varchar(50) NOT NULL,
  PRIMARY KEY (`id_car`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `carousel`
--

INSERT INTO `carousel` (`id_car`, `gambar`) VALUES
(1, 'Carousel_1.png'),
(2, 'Carousel_2.png'),
(3, 'Carousel_3.png');

-- --------------------------------------------------------

--
-- Table structure for table `kategori`
--

DROP TABLE IF EXISTS `kategori`;
CREATE TABLE IF NOT EXISTS `kategori` (
  `id_kategori` int(11) NOT NULL AUTO_INCREMENT,
  `nama_kategori` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `deskripsi` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  PRIMARY KEY (`id_kategori`)
) ENGINE=InnoDB AUTO_INCREMENT=7 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `kategori`
--

INSERT INTO `kategori` (`id_kategori`, `nama_kategori`, `deskripsi`) VALUES
(1, 'Harian', 'Paket Harian dengan banyak pilihan menu setiap harinya'),
(2, 'Prasmanan', 'Paket Prasmanan dengan satu menu untuk bersama-sama'),
(3, 'Kotakan', 'Paket Kotakan dengan banyak pilihan menu untuk mendukung kegiatan anda');

-- --------------------------------------------------------

--
-- Table structure for table `keranjang`
--

DROP TABLE IF EXISTS `keranjang`;
CREATE TABLE IF NOT EXISTS `keranjang` (
  `id_keranjang` int(11) NOT NULL AUTO_INCREMENT,
  `id_user` int(11) NOT NULL,
  `id_menu` int(11) NOT NULL,
  `qty` varchar(10) NOT NULL,
  `total_harga` varchar(50) NOT NULL,
  PRIMARY KEY (`id_keranjang`),
  KEY `keranjang_ibfk_1` (`id_user`),
  KEY `id_menu` (`id_menu`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `keranjang`
--

INSERT INTO `keranjang` (`id_keranjang`, `id_user`, `id_menu`, `qty`, `total_harga`) VALUES
(1, 2, 1, '2', '30000'),
(2, 2, 15, '1', '15000');

-- --------------------------------------------------------

--
-- Table structure for table `menu`
--

DROP TABLE IF EXISTS `menu`;
CREATE TABLE IF NOT EXISTS `menu` (
  `id_menu` int(11) NOT NULL AUTO_INCREMENT,
  `nama_menu` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `harga` varchar(50) COLLATE utf8mb4_unicode_ci NOT NULL,
  `detail` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `gambar` varchar(50) COLLATE utf8mb4_unicode_ci NOT NULL,
  `id_kategori` int(11) NOT NULL,
  PRIMARY KEY (`id_menu`),
  KEY `id_kategori` (`id_kategori`)
) ENGINE=InnoDB AUTO_INCREMENT=16 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `menu`
--

INSERT INTO `menu` (`id_menu`, `nama_menu`, `harga`, `detail`, `gambar`, `id_kategori`) VALUES
(1, 'Ayam Brewok', '15000', 'Haloooo…..\r\n\r\nSiapa nih yang suka dengan ayam brewok, spesial menu dari kitaa\r\n\r\nYukk list menu ini di acaramu 🥰', 'ayam_brewok.jpg', 3),
(2, 'Ayam Geprek', '15000', 'Siapa yang kangen Ayam Geprek dari @wm.hanaasri???\r\n\r\nEnduls banget pedesnya sesuai selera, yukk chat untuk pemesanan 🤗', 'ayam_geprek.jpg', 3),
(3, 'Lele Terbang', '15000', 'Siapa yang suka lele? 😳\r\n\r\nMenu spesial kali ini adalah lele terbang atau bahasa gaulnya nih yee Flying catfish.\r\n\r\nDagingnya sudah di pisah untuk sayap jadi mudah untuk di makan apalagi untuk si kecil.\r\n', 'lele_terbang.jpg', 3),
(4, 'Nasi Kuning', '12000', 'Halo Gengss…..\r\n\r\nSiapa nih yang suka dengan Nasi Kuning ?\r\nKali ini @wm.hanaasri lagi bikin Paket 4 Nasi Kuning versi 12K ya ☺️☺️☺️\r\n\r\nYuk… Agendakan acaramu dengan catering di @wm.hanaasri\r\n', 'nasi_kuning.jpg', 3),
(5, 'Nasi Kuning Spesial', '15000', 'Selamat pagi Gengs !!\r\n\r\nGimana kabarnya hari ini? Awal taun, yuk bikin resolusi baru😘\r\n\r\nKali ini ada menu Nasi Kuning Spesial, yuk buruan cobain', 'nasi_kuning_spesial.jpg', 3),
(6, 'Ramen', '10000', 'Pingin ramen tapi bingung karna harga mahal? 😱\r\nMau bikin tapi takut salah resep? 👀\r\n\r\nTenang disini kamu bisa dapetin ramen dengan harga terjangkau dan bisa req sesuai selera\r\nDimana lagi kalo bukan di @wm.hanaasri 😆', 'ramen.jpg', 1),
(7, 'Semur Ayam', '15000', 'Morningggg......\r\nLumayan lama ya Mimin ga upld di medsos 😁😁\r\n\r\nMau cerita sedikit,\r\nJadi tadi pagi nyoba bikin semur ayam dan nyoba foto kaya orang di IG² walaupun agak riweh ternyata hasilnya lumayan juga wkwkw walaupun masih belum sama seperti yg lain. Oiya, kalo kalian suka sama menu yg satu ini boleh banget req buat catering lohhh atau bisa Dateng di lokasi untuk makan prasmanan. 🤭\r\n\r\nHARGA MURAH TAPI RASA & KUALITAS TERJAMIN!🤩🤩', 'semur_ayam.jpg', 1),
(8, 'Telur Geprek', '12000', 'Ada yang tau ini apa?🤔🤔\r\n\r\nMasakan baru dari @wm.hanaasri Catering Jember\r\nIni namanya Telur Geprek guys bisa banget buat kamu yang bosen makan telur gitu² aja 😄\r\n\r\nYukkk order sekarang juga di @wm.hanaasri', 'telur_geprek.jpg', 1),
(9, 'Tumis Kerang', '15000', 'Selamat pagi Gengs !!\r\n\r\nGimana kabarnya hari ini? Awal taun, yuk bikin resolusi baru😘\r\n\r\nKali ini ada menu Tumis Kerang, yuk buruan cobain', 'tumis_kerang.jpg', 1),
(10, 'Tumpeng Ayam', '150000', 'Mau bikin acara tumpengan tapi gaada waktu?\r\nMau pesen tapi mau yang bisa req isian makanan dan harga miring?\r\n\r\nDimana lagi kalo ga di @wm.hanaasri ,yuk simpan gambar ini untuk jadi referensi Tumpenganmu selanjutnya 🤗\r\n', 'tumpeng_ayam.jpg', 2),
(11, 'Telur Teriyaki', '12000', 'Telur Teriyaki???? 😮😮\r\n\r\nPernah denger ga gaiss?? Atau udah pernah coba ?\r\nKalau belum pas banget sih, kamu bisa bilang Mimin ya buat bikinin menu ini di catering kamu 🤗🤗', 'telur_teriyaki.jpg', 1),
(12, 'Kimlo Soup', '12000', 'Siapa nih yang suka Soup?🤔\r\nNah.... Kali ini mimin masak Kimlo Soup lohhh\r\n\r\nIsinya banyak banget ya, komplit lagi. Ada telur puyuh, wortel, jamur, brokoli, baso, tofu dll\r\n\r\nYukkk segera merapat ke mimin buat catering menu ini 😉😉', 'kimlo_soup.jpg', 1),
(15, 'Burger', '10000', 'Enak banget loh gess burgernya. Yuk langsung order dan cobain.', 'p-1.jpg', 1);

-- --------------------------------------------------------

--
-- Table structure for table `orderdetail`
--

DROP TABLE IF EXISTS `orderdetail`;
CREATE TABLE IF NOT EXISTS `orderdetail` (
  `id_ordetail` int(11) NOT NULL AUTO_INCREMENT,
  `id_order` int(11) NOT NULL,
  `total_harga` varchar(50) COLLATE utf8mb4_unicode_ci NOT NULL,
  `tgl_bayar` datetime DEFAULT NULL,
  `id_pembayaran` int(11) DEFAULT NULL,
  `catatan_order` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `status_pesanan` enum('Belum Dibayar','Sedang Diproses','Selesai') COLLATE utf8mb4_unicode_ci NOT NULL,
  `bukti_pembayaran` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  PRIMARY KEY (`id_ordetail`),
  KEY `id_order` (`id_order`),
  KEY `id_pengiriman` (`id_pembayaran`)
) ENGINE=InnoDB AUTO_INCREMENT=9 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `orderdetail`
--

INSERT INTO `orderdetail` (`id_ordetail`, `id_order`, `total_harga`, `tgl_bayar`, `id_pembayaran`, `catatan_order`, `status_pesanan`, `bukti_pembayaran`) VALUES
(5, 2, '75000', '2022-12-28 00:00:00', 1, 'Tepat waktu yaaaa hehe', 'Sedang Diproses', ''),
(8, 4, '72000', '2022-12-22 00:00:00', 2, NULL, 'Selesai', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `orders`
--

DROP TABLE IF EXISTS `orders`;
CREATE TABLE IF NOT EXISTS `orders` (
  `id_order` int(11) NOT NULL AUTO_INCREMENT,
  `tgl_pesan` datetime NOT NULL,
  `tgl_pakai` datetime NOT NULL,
  `harga_satuan` varchar(50) COLLATE utf8mb4_unicode_ci NOT NULL,
  `jumlah` varchar(50) COLLATE utf8mb4_unicode_ci NOT NULL,
  `id_user` int(11) NOT NULL,
  `id_menu` int(11) NOT NULL,
  `id_keranjang` int(11) NOT NULL,
  PRIMARY KEY (`id_order`),
  KEY `id_menu` (`id_menu`),
  KEY `id_user` (`id_user`)
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `orders`
--

INSERT INTO `orders` (`id_order`, `tgl_pesan`, `tgl_pakai`, `harga_satuan`, `jumlah`, `id_user`, `id_menu`, `id_keranjang`) VALUES
(2, '2022-12-28 00:00:00', '2023-01-02 10:14:33', '15000', '5', 2, 2, 0),
(4, '2022-12-30 00:00:00', '2023-01-04 10:16:24', '12000', '6', 2, 4, 0);

-- --------------------------------------------------------

--
-- Table structure for table `pembayaran`
--

DROP TABLE IF EXISTS `pembayaran`;
CREATE TABLE IF NOT EXISTS `pembayaran` (
  `id_pembayaran` int(11) NOT NULL AUTO_INCREMENT,
  `metode_pembayaran` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `no_rek` varchar(20) COLLATE utf8mb4_unicode_ci NOT NULL,
  PRIMARY KEY (`id_pembayaran`)
) ENGINE=InnoDB AUTO_INCREMENT=8 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `pembayaran`
--

INSERT INTO `pembayaran` (`id_pembayaran`, `metode_pembayaran`, `no_rek`) VALUES
(1, 'Bank Rakyat Indonesia (BRI)', '0021-01-196169-50-6'),
(2, 'Bank Central Asia (BCA)', '024-0653966'),
(3, 'Shopee Pay', '+62 858-1531-3767');

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

DROP TABLE IF EXISTS `user`;
CREATE TABLE IF NOT EXISTS `user` (
  `id_user` int(11) NOT NULL AUTO_INCREMENT,
  `nama_user` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `alamat` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `nohp` varchar(15) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `password` varchar(50) COLLATE utf8mb4_unicode_ci NOT NULL,
  `gambar` varchar(11) COLLATE utf8mb4_unicode_ci NOT NULL,
  `id_akses` int(11) NOT NULL,
  PRIMARY KEY (`id_user`),
  KEY `id_akses` (`id_akses`)
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`id_user`, `nama_user`, `email`, `alamat`, `nohp`, `password`, `gambar`, `id_akses`) VALUES
(1, 'Yasin Alfaruq', 'yasin@gmail.com', 'Jl.Sumatra Sumbersari Jember', '082334567890', '123', 'team-3.jpg', 1),
(2, 'Karisma Ayu', 'karisma@gmail.com', 'Jl.Jawa 6 Sumbersari Jember', '085678903422', '654', 'ivana-squar', 2),
(5, 'Laura Cantik', 'laura@gmail.com', 'Jl.Kaliurang Sumbersari Jember', '085604947847', '789', '', 2);

--
-- Constraints for dumped tables
--

--
-- Constraints for table `keranjang`
--
ALTER TABLE `keranjang`
  ADD CONSTRAINT `keranjang_ibfk_1` FOREIGN KEY (`id_user`) REFERENCES `user` (`id_user`) ON UPDATE CASCADE,
  ADD CONSTRAINT `keranjang_ibfk_2` FOREIGN KEY (`id_menu`) REFERENCES `menu` (`id_menu`) ON UPDATE CASCADE;

--
-- Constraints for table `menu`
--
ALTER TABLE `menu`
  ADD CONSTRAINT `menu_ibfk_1` FOREIGN KEY (`id_kategori`) REFERENCES `kategori` (`id_kategori`) ON UPDATE CASCADE;

--
-- Constraints for table `orderdetail`
--
ALTER TABLE `orderdetail`
  ADD CONSTRAINT `orderdetail_ibfk_1` FOREIGN KEY (`id_order`) REFERENCES `orders` (`id_order`) ON DELETE CASCADE,
  ADD CONSTRAINT `orderdetail_ibfk_2` FOREIGN KEY (`id_pembayaran`) REFERENCES `pembayaran` (`id_pembayaran`) ON DELETE CASCADE;

--
-- Constraints for table `orders`
--
ALTER TABLE `orders`
  ADD CONSTRAINT `orders_ibfk_1` FOREIGN KEY (`id_menu`) REFERENCES `menu` (`id_menu`) ON UPDATE CASCADE,
  ADD CONSTRAINT `orders_ibfk_2` FOREIGN KEY (`id_user`) REFERENCES `user` (`id_user`) ON UPDATE CASCADE;

--
-- Constraints for table `user`
--
ALTER TABLE `user`
  ADD CONSTRAINT `user_ibfk_1` FOREIGN KEY (`id_akses`) REFERENCES `akses` (`id_akses`) ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
