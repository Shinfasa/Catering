-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jan 08, 2023 at 06:00 PM
-- Server version: 10.4.25-MariaDB
-- PHP Version: 8.1.10

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
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

CREATE TABLE `akses` (
  `id_akses` int(11) NOT NULL,
  `hak_akses` varchar(50) COLLATE utf8mb4_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

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

CREATE TABLE `carousel` (
  `id_car` int(11) NOT NULL,
  `gambar` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `carousel`
--

INSERT INTO `carousel` (`id_car`, `gambar`) VALUES
(1, 'Carousel1.png'),
(2, 'Carousel2.png'),
(3, 'Carousel3.png');

-- --------------------------------------------------------

--
-- Table structure for table `kategori`
--

CREATE TABLE `kategori` (
  `id_kategori` int(11) NOT NULL,
  `nama_kategori` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `deskripsi` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `kategori`
--

INSERT INTO `kategori` (`id_kategori`, `nama_kategori`, `deskripsi`) VALUES
(1, 'Harian', 'Kita ada menu harian nih gaes.\r\nJadi disini kita menyediakan menu yang berbeda setiap harinya.\r\nKali'),
(2, 'Prasmanan', 'Menu prasmanan ini kita sediakan untuk para kalian yang mau ada acara nih!!!\r\nYuk buruan kepoin menu'),
(3, 'Kotakan', 'Seperti makanan pada umumnya kita menyediakan kotakan, jadi kalian juga bisa order langsung menu yan');

-- --------------------------------------------------------

--
-- Table structure for table `keranjang`
--

CREATE TABLE `keranjang` (
  `id_keranjang` int(11) NOT NULL,
  `id_user` int(11) NOT NULL,
  `id_menu` int(11) NOT NULL,
  `nama_menu` varchar(50) NOT NULL,
  `qty` varchar(10) NOT NULL,
  `total_harga` varchar(50) NOT NULL,
  `gambar` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `menu`
--

CREATE TABLE `menu` (
  `id_menu` int(11) NOT NULL,
  `nama_menu` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `harga` varchar(50) COLLATE utf8mb4_unicode_ci NOT NULL,
  `detail` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `gambar` varchar(50) COLLATE utf8mb4_unicode_ci NOT NULL,
  `id_kategori` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

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
(12, 'Kimlo Soupp', '12000', 'Siapa nih yang suka Soup?🤔\r\nNah.... Kali ini mimin masak Kimlo Soup lohhh\r\n\r\nIsinya banyak banget ya, komplit lagi. Ada telur puyuh, wortel, jamur, brokoli, baso, tofu dll\r\n\r\nYukkk segera merapat ke mimin buat catering menu ini 😉😉', 'kimlo_soup.jpg', 1),
(16, 'Burger', '11000', 'Enak banget loh gess burgernya. Yuk langsung order dan cobain.', 'p-1.jpg', 1);

-- --------------------------------------------------------

--
-- Table structure for table `orders`
--

CREATE TABLE `orders` (
  `id_order` int(11) NOT NULL,
  `no_pesanan` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `tgl_pesan` date NOT NULL,
  `tgl_pakai` datetime NOT NULL,
  `harga_satuan` varchar(50) COLLATE utf8mb4_unicode_ci NOT NULL,
  `qty` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `total_harga` varchar(50) COLLATE utf8mb4_unicode_ci NOT NULL,
  `alamat` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `nohp` varchar(15) COLLATE utf8mb4_unicode_ci NOT NULL,
  `catatan` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `tgl_bayar` date DEFAULT NULL,
  `bukti_pembayaran` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `status_pesanan` enum('Belum Dibayar','Sedang Diproses','Selesai') COLLATE utf8mb4_unicode_ci NOT NULL,
  `id_user` int(11) NOT NULL,
  `id_menu` int(11) NOT NULL,
  `id_pembayaran` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `orders`
--

INSERT INTO `orders` (`id_order`, `no_pesanan`, `tgl_pesan`, `tgl_pakai`, `harga_satuan`, `qty`, `total_harga`, `alamat`, `nohp`, `catatan`, `tgl_bayar`, `bukti_pembayaran`, `status_pesanan`, `id_user`, `id_menu`, `id_pembayaran`) VALUES
(14, '', '2023-01-06', '2023-01-08 10:30:00', '15000', '1', '15000', 'Jl.Kaliurang Sumbersari Jember', '085604947847', '', NULL, NULL, 'Belum Dibayar', 5, 1, 1),
(15, 'HNSR2023017175327', '2023-01-08', '2023-01-09 13:00:00', '15000', '1', '15000', 'Jl.Kaliurang Sumbersari Jember', '085604947847', '', NULL, NULL, 'Belum Dibayar', 5, 1, 1),
(16, 'HNSR2023017175542', '2023-01-08', '2023-01-09 13:00:00', '15000', '1', '15000', 'Jl.Kaliurang Sumbersari Jember', '085604947847', '', NULL, NULL, 'Belum Dibayar', 5, 1, 1);

-- --------------------------------------------------------

--
-- Table structure for table `pembayaran`
--

CREATE TABLE `pembayaran` (
  `id_pembayaran` int(11) NOT NULL,
  `metode_pembayaran` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `no_rek` varchar(20) COLLATE utf8mb4_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

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

CREATE TABLE `user` (
  `id_user` int(11) NOT NULL,
  `nama_user` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `alamat` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `nohp` varchar(15) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `password` varchar(50) COLLATE utf8mb4_unicode_ci NOT NULL,
  `gambar` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `id_akses` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`id_user`, `nama_user`, `email`, `alamat`, `nohp`, `password`, `gambar`, `id_akses`) VALUES
(1, 'Yasin Alfaruq', 'yasin@gmail.com', 'Jl.Sumatra Sumbersari Jember', '082334567890', '123', 'team-3.jpg', 1),
(2, 'Karisma Ayu', 'karisma@gmail.com', 'Jl.Jawa 6 Sumbersari Jember', '085678903422', '654', 'ivana-square.jpg', 2),
(5, 'Laura Cantik', 'laura@gmail.com', 'Jl.Kaliurang Sumbersari Jember', '085604947847', '789', '', 2),
(6, 'Kresna', 'kresna@gmail.com', 'Jl.Kaki Sumbersari Jember', '085434567889', '098', 'bruce-mars.jpg', 2),
(8, 'Rehan', 'rehan@gmail.com', 'Jl.Mastrip  Pancoran Mas Jember', '085678900223', '67890', '', 2),
(10, 'Gevin Oktoval', 'gevin@gmail.com', 'Jl.Mastrip gang 3 Sumbersari Jember', '085678009432', '6789', '', 2);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `akses`
--
ALTER TABLE `akses`
  ADD PRIMARY KEY (`id_akses`);

--
-- Indexes for table `carousel`
--
ALTER TABLE `carousel`
  ADD PRIMARY KEY (`id_car`);

--
-- Indexes for table `kategori`
--
ALTER TABLE `kategori`
  ADD PRIMARY KEY (`id_kategori`);

--
-- Indexes for table `keranjang`
--
ALTER TABLE `keranjang`
  ADD PRIMARY KEY (`id_keranjang`),
  ADD KEY `keranjang_ibfk_1` (`id_user`),
  ADD KEY `id_menu` (`id_menu`);

--
-- Indexes for table `menu`
--
ALTER TABLE `menu`
  ADD PRIMARY KEY (`id_menu`),
  ADD KEY `id_kategori` (`id_kategori`);

--
-- Indexes for table `orders`
--
ALTER TABLE `orders`
  ADD PRIMARY KEY (`id_order`),
  ADD KEY `id_menu` (`id_menu`),
  ADD KEY `id_user` (`id_user`),
  ADD KEY `id_pembayaran` (`id_pembayaran`);

--
-- Indexes for table `pembayaran`
--
ALTER TABLE `pembayaran`
  ADD PRIMARY KEY (`id_pembayaran`);

--
-- Indexes for table `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`id_user`),
  ADD KEY `id_akses` (`id_akses`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `akses`
--
ALTER TABLE `akses`
  MODIFY `id_akses` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `carousel`
--
ALTER TABLE `carousel`
  MODIFY `id_car` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `kategori`
--
ALTER TABLE `kategori`
  MODIFY `id_kategori` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `keranjang`
--
ALTER TABLE `keranjang`
  MODIFY `id_keranjang` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `menu`
--
ALTER TABLE `menu`
  MODIFY `id_menu` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;

--
-- AUTO_INCREMENT for table `orders`
--
ALTER TABLE `orders`
  MODIFY `id_order` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;

--
-- AUTO_INCREMENT for table `pembayaran`
--
ALTER TABLE `pembayaran`
  MODIFY `id_pembayaran` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `user`
--
ALTER TABLE `user`
  MODIFY `id_user` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

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
-- Constraints for table `orders`
--
ALTER TABLE `orders`
  ADD CONSTRAINT `orders_ibfk_1` FOREIGN KEY (`id_menu`) REFERENCES `menu` (`id_menu`) ON UPDATE CASCADE,
  ADD CONSTRAINT `orders_ibfk_2` FOREIGN KEY (`id_user`) REFERENCES `user` (`id_user`) ON UPDATE CASCADE,
  ADD CONSTRAINT `orders_ibfk_3` FOREIGN KEY (`id_pembayaran`) REFERENCES `pembayaran` (`id_pembayaran`) ON UPDATE CASCADE;

--
-- Constraints for table `user`
--
ALTER TABLE `user`
  ADD CONSTRAINT `user_ibfk_1` FOREIGN KEY (`id_akses`) REFERENCES `akses` (`id_akses`) ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
