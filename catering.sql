-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jan 10, 2023 at 08:29 AM
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
(1, 'Harian', 'Menyediakan pilihan menu berbeda setiap harinya'),
(2, 'Prasmanan', 'Menyediakan berbagai macam menu atau bisa request menu favorit anda'),
(3, 'Kotakan', 'Menyediakan berbagai pilihan menu untuk berbagai acara dan instansi'),
(4, 'Tumpeng', 'Menyediakan paket lengkap dengan dekorasi menu pilihan untuk menemani acara anda');

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
(1, 'Paket Ayam 1', '12000', '• AYAM GORENG / BAKAR/ BREWOK (LENGKUAS)\r\n• LALAPAN + TIMUN\r\n• TEMPE / TAHU\r\n• SAMBAL\r\n• NASI PUTIH\r\n\r\n', 'ayam_brewok.jpg', 3),
(2, 'Ayam Nasi Kuning 1', '12000', '• AYAM BAKAR/BREWOK/GORENG\r\n• OSENG KERING\r\n• TEMPE\r\n• SERUNDENG\r\n• SAMBAL + TIMUN\r\n• NASI KUNING', 'nasi_kuning.jpg', 3),
(3, 'Nasi Bakar Spesial', '12000', '• NASI BAKAR\r\n• AYAM / TONGKOL BUMBU KEMANGI\r\n\r\n', 'nasi_bakar.jpg', 3),
(4, 'Ayam Geprek', '12000', '• AYAM GEPREK\r\n• LALAPAN + TIMUN\r\n• TEMPE / TAHU\r\n• NASI PUTIH\r\n\r\n', 'ayam_geprek.jpg', 3),
(5, 'Ayam Crispy', '12000', '• AYAM CRISPY\r\n• LALAPAN + TIMUN\r\n• TEMPE / TAHU\r\n• SAMBAL / SAOS\r\n• NASI PUTIH\r\n', 'ayam_crispy.jpg', 3),
(6, 'Chiken Katzu', '12000', '• CHICKEN KATZU\r\n• SALAD SAYUR\r\n• TELUR ORAK ARIK\r\n• SAOS\r\n• NASI PUTIH\r\n', 'chiken_katzu.jpeg', 3),
(7, 'Soto Babat', '12000', '• SOTO BABAT\r\n• KERUPUK \r\n• KETUPAT / NASI\r\n• SAMBAL / CABE\r\n• RAWIT\r\n', 'soto_babat.jpeg', 3),
(8, 'Paket Telur', '12000', '• TELUR CETAK\r\n• TUMIS SAYUR\r\n• MIE GORENG\r\n• TEMPE / TAHU \r\n• SAMBAL\r\n', 'paket_telur.jpg', 3),
(9, 'Paket Ayam 2\r\n', '15000', '• AYAM BAKAR / BREWOK / GORENG / TERIYAKI\r\n• SAMBAL GORENG KENTANG\r\n• TEMPE GORENG TEPUNG\r\n• CAH SAYUR\r\n• SAMBAL\r\n', 'ayam_brewok.jpg', 3),
(10, 'Paket Nasi Kuning 1\r\n', '150000', '• AYAM BAKAR\r\n• TELUR BUMBU MERAH\r\n• PERKEDEL\r\n• OSENG TEMPE\r\n• SERUNDENG\r\n• SAMBAL\r\n', 'nasi_kuning.jpg', 3),
(11, 'Nasi Gurih\r\n', '15000', '• NASI GURIH\r\n• AYAM GORENG / AYAM BREWOK ( LENGKUAS)\r\n• TELUR BELAH BUMBU MERAH / GORENG\r\n• TIMUN\r\n• CAPCAY / PERKEDEL\r\n', 'nasi_gurih.jpg', 3),
(12, 'Ayam Nasi Kuning 2', '12000', '• SAMBAL GORENG KENTANG \r\n• TELUR\r\n• SAMBAL GORENG TEMPE\r\n• SERUNDENG \r\n• NASI KUNING\r\n', 'nasi_kuning.jpg', 3),
(19, 'Lalapan Lele', '15000', '• LELE BUMBU GORENG\r\n• LALAPAN + TIMUN\r\n• TEMPE / TAHU\r\n• SAMBAL / SAOS\r\n• MIE GORENG \r\n• NASI PUTIH\r\n', 'lele_terbang.jpg', 3),
(20, 'Paket Ayam 3', '18000', '• AYAM BAKAR/GORENG/BREWOK / TERIYAKI\r\n• CAH SAYUR/ CAPCAY\r\n• TELUR BUMBU MERAH / TELUR ASIN\r\n• MIE GORENG\r\n• SAMBAL \r\n• NASI PUTIH\r\n', 'ayam_brewok.jpg', 3),
(21, 'Paket Nasi Pecel', '18000', '• SAMBAL GORENG KERING KENTANG \r\n• SAYUR PECEL\r\n• TELUR BUMBU KUNING / MERAH\r\n• TEMPE GORENG\r\n• BUMBU PECEL\r\n• SERUNDENG\r\n', 'nasi_pecel.jpg', 3),
(22, 'Paket Udang', '18000', '• UDANG BUMBU MERAH / GORENG\r\n• OSENG TEMPE\r\n• TUMIS JAGUNG MUDA\r\n• SAMBAL\r\n• NASI PUTIH / KUNING / GURIH\r\n', 'udang.jpe', 3),
(23, 'Paket Sate', '18000', '• SATE AYAM ( 3 TUSUK)\r\n• ACAR\r\n• CAPCAY\r\n• TELUR AYAM/TELUR ASIN\r\n', 'sate.jpg', 3),
(24, 'Paket Rolade', '18000', '• ROLADE \r\n• CAPCAY\r\n• MIE GORENG\r\n• SAMBAL / SAOS\r\n• NASI PUTIH/NASI GURIH\r\n• KERUPUK\r\n', 'rolade.jpe', 3),
(25, 'Paket Bakar Spesial', '25000', '• AYAM / BEBEK / DARA BAKAR\r\n• SAMBAL GORENG\r\n• KENTANG\r\n• TELUR \r\n• SERUNDENG\r\n• OREK TEMPE\r\n• NUGET AYAM\r\n• MIE GORENG \r\n• NASI KUNING / PUTIH\r\n', 'ayam_bakar.jpg', 3),
(26, 'Paket Paru', '25000', '• NASI PUTIH\r\n• PARU \r\n• BAKWAN SAYUR\r\n• TELUR BALADO\r\n• MIE GORENG / OSENG TEMPE\r\n• SAMBAL\r\n• KERUPUK\r\n', 'paru.jpeg', 3),
(27, 'Paket Rendang', '25000', '• NASI PUTIH\r\n• RENDANG DAGING\r\n• KRUPUK UDANG\r\n• SAYUR BAKSO\r\n• KENTANG SAMBAL\r\n• GORENG\r\n• SAMBAL\r\n', 'rendang.jpg', 3),
(28, 'Paket Ayam 4', '25000', '• NASI KUNING\r\n• AYAM BAKAR\r\n• OREK TEMPE\r\n• BALADO KENTANG\r\n• TERI KACANG\r\n• DADAR TELUR\r\n• SERUNDENG\r\n• KERUPUK\r\n• SAMBAL\r\n', 'nasikuning_ayambakar.jpeg', 3),
(29, 'Paket Semur', '25000', '• NASI PUTIH\r\n• SEMUR AYAM\r\n• SAYUR KACANG\r\n• KERUPUK UDANG\r\n• KENTANG SAMBAL GORENG / OSENG\r\n• TEMPE\r\n• SAMBAL\r\n', 'semur_ayam.jpg', 3),
(30, 'Senin (Pagi)', '15000', '• TELUR BUMBU MERAH \r\n• OSENG TOGE \r\n• GRENGSENG TEMPE\r\n', 'harian.png', 1),
(31, 'Selasa (Pagi)', '15000', '• MIE GORENG\r\n• AYAM SAUS TIRAM \r\n• GORENGAN\r\n', 'harian.png', 1),
(32, 'Rabu (Pagi)', '15000', '• BAKSO ENDULS ( AGAK PEDES )\r\n• TUMIS BUNCIS \r\n• TEMPE\r\n', 'harian.png', 1),
(33, 'Kamis (Pagi)', '15000', '• IKAN DORI BUMBU TEPUNG\r\n• OSENG PEPAYA\r\n• SAMBAL\r\n', 'harian.png', 1),
(34, 'Jum\'at (Pagi)', '15000', '• AYAM KOLOKE \r\n• BIHUN\r\n• SAMBAL\r\n• TEMPE\r\n\r\n', 'harian.png', 1),
(35, 'Sabtu (Pagi)', '15000', '• TONGKOL GORENG TEPUNG \r\n• TEMPE GEPREK / PENYET \r\n• MIE GORENG', 'harian.png', 1),
(36, 'Senin (Malam)', '15000', '• NUGGET UDANG \r\n• SOUP \r\n• TAHU\r\n', 'harian.png', 1),
(37, 'Selasa (Malam)', '15000', '• CAPCAY\r\n• CHICKEN KATZU \r\n• SAOS\r\n\r\n', 'harian.png', 1),
(38, 'Rabu (Malam)', '15000', 'LALAPAN LELE\r\n', 'harian.png', 1),
(39, 'Kamis (Malam)', '15000', '• NASI GORENG AYAM CINCANG \r\n• TELUR DADAR \r\n• ABON\r\n', 'harian.png', 1),
(40, 'Jum\'at (Malam)', '15000', '• TELUR GEPREK \r\n• GORENGAN TEMPE \r\n• TUMIS KANGKUNG\r\n', 'harian.png', 1),
(41, 'Sabtu (Malam)', '15000', '• RAWON \r\n• SAMBAL \r\n• TEMPE GORENG', 'harian.png', 1),
(43, 'Paket Sedap', '20000', '• SAYUR ASAM JAKARTA\r\n• PEPES IKAN TONGKOL\r\n• AYAM GORENG\r\n• TEMPE TAHU BACEM\r\n• IKAN ASIN\r\n• NASI PUTIH\r\n• KERUPUK\r\n• SAMBAL\r\n• ES BUAH / ES TEH & KOPI\r\n', 'harian.png', 2),
(44, 'Paket Nikmat', '20000', '• NASI PUTIH\r\n• AYAM SAUS TIRAM\r\n• CAPCAY SOSIS\r\n• MIE GORENG\r\n• TELUR FYUNGHAI\r\n• TUMIS PARU\r\n• ACAR TIMUN\r\n• KERUPUK\r\n• SAMBAL\r\n• ES BUAH / ES TEH & KOPI\r\n', 'harian.png', 2),
(45, 'Paket Enak', '25000', '• NASI PUTIH\r\n• NASI GORENG\r\n• AYAM KOLOKE\r\n• BIHUN GORENG\r\n• ROLADE AYAM\r\n• CAPCAY MERAH\r\n• SATE AYAM\r\n• ACAR TIMUN\r\n• SAMBAL\r\n• ES BUAH / ES TEH & KOPI\r\n', 'harian.png', 2),
(46, 'Paket Mantap', '30000', '1. NASI PUTIH\r\n2. ANEKA SAYUR BERKUAH (PILIHAN)\r\n• Soup Kimlo\r\n• Soup ayam sosis\r\n• Lodeh Campur\r\n• Sayur asem Jakarta\r\n3. ANEKA OLAHAN AYAM (PILIHAN)\r\n• Ayam Goreng\r\n• Ayam Goreng Mentega\r\n• Opor / Kari ayam\r\n4. PILIHAN\r\n• Sambal goreng kentang + hati ayam\r\n• Rolade ayam\r\n• Mie Goreng\r\n• Bihun Goreng\r\n5. KERUPUK\r\n6. ES BUAH / KOPI & TEH\r\n7. AIR MINERAL\r\n\r\nNB : PILIHAN menu catat di kolom catatan!', 'harian.png', 2),
(47, 'Paket Spesial', '35000', '1. NASI PUTIH\r\n2. ANEKA SAYUR BERKUAH (PILIHAN)\r\n• Soup Kimlo\r\n• Soup ayam sosis\r\n• Lodeh Campur\r\n• Sayur Asem\r\n3. ANEKA OLAHAN AYAM (PILIHAN)\r\n• Ayam Goreng Mentega\r\n• Opor / kari ayam\r\n• Sate Ayam\r\n• Ayam bumbu bali\r\n4. PILIHAN\r\n• Sambal goreng kentang + hati ayam\r\n• Rolade ayam\r\n• Udang Goreng / Udang asam manis\r\n5. KERUPUK UDANG\r\n6. ES BUAH / KOPI & TEH DAN BUAH POTONG\r\n7. AIR MINERAL\r\n\r\nNB : PILIHAN menu catat di kolom catatan!', 'harian.png', 2),
(48, 'Paket Royal', '40000', '1. NASI PUTIH / NASI GORENG\r\n2. ANEKA SAYURAN (PILIHAN)\r\n• CapJay\r\n• Cah Sayur\r\n• Lodeh Campur\r\n3. ANEKA SAYUR BERKUAH (PILIHAN)\r\n• Sayur Asam Jakarta\r\n• Soup Kimlo\r\n4. OLAHAN AYAM (PILIHAN)\r\n• Ayam Bakar\r\n• Ayam Bumbu Mentega\r\n• Ayam Bumbu Bali\r\n• Sate Ayam\r\n5. OLAHAN DAGING SAPI (PILIHAN)\r\n• Semur Lapis Daging Sapi\r\n• Daging Krengsengan\r\n• Rawon\r\n• Bakso\r\n6. OLAHAN MIE (PILIHAN)\r\n• Mie Goreng\r\n• Bihun Goreng\r\n7. ES BUAH / KOPI & THE\r\n8. KERUPUK\r\n9. AIR MINERAL\r\n10. POTONGAN PUDDING / BUAH\r\n\r\nNB : PILIHAN menu catat di kolom catatan!', 'harian.png', 2),
(49, 'Menu Jajanan Pasar', '50000', '• EDAMAME\r\n• KACANG TANAH REBUS\r\n• UBI\r\n• PISANG REBUS\r\n• TALAS\r\n\r\nNB : Harga/Tampah', 'harian.png', 2),
(50, 'Tumpeng Nasi Kuning/Gurih (6 Orang)', '150000', 'Pilihan Menu A\r\n• Nasi Kuning / Gurih / Putih \r\n• Ayam Bakar / Goreng / Crispy / Nugget Ayam\r\n• Sambal Goreng Kentang / Perkedel Kentang\r\n• Serundeng / Abon \r\n• Oseng Tempe\r\n• Telur Bumbu Merah / Telur bagi 2 digoreng ( Khusus 100K keatas)\r\n• Sambal\r\n• Mie Goreng\r\n\r\nPilihan Menu B\r\n• Nasi Kuning / Gurih / Putih \r\n• Ayam Bakar / Goreng / Crispy / Nugget Ayam\r\n• Urap - Urap\r\n• Orem tempe tahu\r\n• Telur Bumbu Merah / Telur bagi 2 digoreng ( Khusus 100K Keatas)\r\n• Mie Goreng\r\n• Sambal\r\n• Serundeng / Abon\r\n\r\nNB :\r\n• Untuk Pemesanan diatas 100K bisa request Kertas Ucapan tanpa biaya tambahan \r\n• Menu bisa request diluar pilihan sesuai keinginan costumer\r\n', 'tumpeng_nasikuning.jpeg', 4),
(51, 'Tumpeng Nasi Kuning/Gurih (4-5 Orang)', '100000', 'Pilihan Menu A\r\n• Nasi Kuning / Gurih / Putih \r\n• Ayam Bakar / Goreng / Crispy / Nugget Ayam\r\n• Sambal Goreng Kentang / Perkedel Kentang\r\n• Serundeng / Abon \r\n• Oseng Tempe\r\n• Telur Bumbu Merah / Telur bagi 2 digoreng ( Khusus 100K keatas)\r\n• Sambal\r\n• Mie Goreng\r\n\r\nPilihan Menu B\r\n• Nasi Kuning / Gurih / Putih \r\n• Ayam Bakar / Goreng / Crispy / Nugget Ayam\r\n• Urap - Urap\r\n• Orem tempe tahu\r\n• Telur Bumbu Merah / Telur bagi 2 digoreng ( Khusus 100K Keatas)\r\n• Mie Goreng\r\n• Sambal\r\n• Serundeng / Abon\r\n\r\nNB :\r\n• Untuk Pemesanan diatas 100K bisa request Kertas Ucapan tanpa biaya tambahan \r\n• Menu bisa request diluar pilihan sesuai keinginan costumer\r\n', 'tumpeng_nasikuning.jpeg', 4),
(52, 'Tumpeng Nasi Kuning/Gurih (20 Orang)', '300000', 'Pilihan Menu A\r\n• Nasi Kuning / Gurih / Putih \r\n• Ayam Bakar / Goreng / Crispy / Nugget Ayam\r\n• Sambal Goreng Kentang / Perkedel Kentang\r\n• Serundeng / Abon \r\n• Oseng Tempe\r\n• Telur Bumbu Merah / Telur bagi 2 digoreng ( Khusus 100K keatas)\r\n• Sambal\r\n• Mie Goreng\r\n\r\nPilihan Menu B\r\n• Nasi Kuning / Gurih / Putih \r\n• Ayam Bakar / Goreng / Crispy / Nugget Ayam\r\n• Urap - Urap\r\n• Orem tempe tahu\r\n• Telur Bumbu Merah / Telur bagi 2 digoreng ( Khusus 100K Keatas)\r\n• Mie Goreng\r\n• Sambal\r\n• Serundeng / Abon\r\n\r\nNB :\r\n• Untuk Pemesanan diatas 100K bisa request Kertas Ucapan tanpa biaya tambahan \r\n• Menu bisa request diluar pilihan sesuai keinginan costumer\r\n', 'tumpeng_nasikuning.jpeg', 4),
(53, 'Tumpeng Nasi Kuning/Gurih (15 Orang)', '250000', 'Pilihan Menu A\r\n• Nasi Kuning / Gurih / Putih \r\n• Ayam Bakar / Goreng / Crispy / Nugget Ayam\r\n• Sambal Goreng Kentang / Perkedel Kentang\r\n• Serundeng / Abon \r\n• Oseng Tempe\r\n• Telur Bumbu Merah / Telur bagi 2 digoreng ( Khusus 100K keatas)\r\n• Sambal\r\n• Mie Goreng\r\n\r\nPilihan Menu B\r\n• Nasi Kuning / Gurih / Putih \r\n• Ayam Bakar / Goreng / Crispy / Nugget Ayam\r\n• Urap - Urap\r\n• Orem tempe tahu\r\n• Telur Bumbu Merah / Telur bagi 2 digoreng ( Khusus 100K Keatas)\r\n• Mie Goreng\r\n• Sambal\r\n• Serundeng / Abon\r\n\r\nNB :\r\n• Untuk Pemesanan diatas 100K bisa request Kertas Ucapan tanpa biaya tambahan \r\n• Menu bisa request diluar pilihan sesuai keinginan costumer\r\n', 'tumpeng_nasikuning.jpeg', 4),
(54, 'Tumpeng Nasi Kuning/Gurih (8 Orang)', '200000', 'Pilihan Menu A\r\n• Nasi Kuning / Gurih / Putih \r\n• Ayam Bakar / Goreng / Crispy / Nugget Ayam\r\n• Sambal Goreng Kentang / Perkedel Kentang\r\n• Serundeng / Abon \r\n• Oseng Tempe\r\n• Telur Bumbu Merah / Telur bagi 2 digoreng ( Khusus 100K keatas)\r\n• Sambal\r\n• Mie Goreng\r\n\r\nPilihan Menu B\r\n• Nasi Kuning / Gurih / Putih \r\n• Ayam Bakar / Goreng / Crispy / Nugget Ayam\r\n• Urap - Urap\r\n• Orem tempe tahu\r\n• Telur Bumbu Merah / Telur bagi 2 digoreng ( Khusus 100K Keatas)\r\n• Mie Goreng\r\n• Sambal\r\n• Serundeng / Abon\r\n\r\nNB :\r\n• Untuk Pemesanan diatas 100K bisa request Kertas Ucapan tanpa biaya tambahan \r\n• Menu bisa request diluar pilihan sesuai keinginan costumer\r\n', 'tumpeng_nasikuning.jpeg', 4),
(55, 'Tumpeng Nasi Putih (6 Orang)', '150000', 'Pilihan Menu A\r\n• Nasi Kuning / Gurih / Putih \r\n• Ayam Bakar / Goreng / Crispy / Nugget Ayam\r\n• Sambal Goreng Kentang / Perkedel Kentang\r\n• Serundeng / Abon \r\n• Oseng Tempe\r\n• Telur Bumbu Merah / Telur bagi 2 digoreng ( Khusus 100K keatas)\r\n• Sambal\r\n• Mie Goreng\r\n\r\nPilihan Menu B\r\n• Nasi Kuning / Gurih / Putih \r\n• Ayam Bakar / Goreng / Crispy / Nugget Ayam\r\n• Urap - Urap\r\n• Orem tempe tahu\r\n• Telur Bumbu Merah / Telur bagi 2 digoreng ( Khusus 100K Keatas)\r\n• Mie Goreng\r\n• Sambal\r\n• Serundeng / Abon\r\n\r\nNB :\r\n• Untuk Pemesanan diatas 100K bisa request Kertas Ucapan tanpa biaya tambahan \r\n• Menu bisa request diluar pilihan sesuai keinginan costumer\r\n', 'tumpeng_nasiputih.jpeg', 4),
(56, 'Tumpeng Nasi Putih (4-5 Orang)', '100000', 'Pilihan Menu A\r\n• Nasi Kuning / Gurih / Putih \r\n• Ayam Bakar / Goreng / Crispy / Nugget Ayam\r\n• Sambal Goreng Kentang / Perkedel Kentang\r\n• Serundeng / Abon \r\n• Oseng Tempe\r\n• Telur Bumbu Merah / Telur bagi 2 digoreng ( Khusus 100K keatas)\r\n• Sambal\r\n• Mie Goreng\r\n\r\nPilihan Menu B\r\n• Nasi Kuning / Gurih / Putih \r\n• Ayam Bakar / Goreng / Crispy / Nugget Ayam\r\n• Urap - Urap\r\n• Orem tempe tahu\r\n• Telur Bumbu Merah / Telur bagi 2 digoreng ( Khusus 100K Keatas)\r\n• Mie Goreng\r\n• Sambal\r\n• Serundeng / Abon\r\n\r\nNB :\r\n• Untuk Pemesanan diatas 100K bisa request Kertas Ucapan tanpa biaya tambahan \r\n• Menu bisa request diluar pilihan sesuai keinginan costumer\r\n', 'tumpeng_nasiputih.jpeg', 4),
(57, 'Tumpeng Nasi Putih (20 Orang)', '300000', 'Pilihan Menu A\r\n• Nasi Kuning / Gurih / Putih \r\n• Ayam Bakar / Goreng / Crispy / Nugget Ayam\r\n• Sambal Goreng Kentang / Perkedel Kentang\r\n• Serundeng / Abon \r\n• Oseng Tempe\r\n• Telur Bumbu Merah / Telur bagi 2 digoreng ( Khusus 100K keatas)\r\n• Sambal\r\n• Mie Goreng\r\n\r\nPilihan Menu B\r\n• Nasi Kuning / Gurih / Putih \r\n• Ayam Bakar / Goreng / Crispy / Nugget Ayam\r\n• Urap - Urap\r\n• Orem tempe tahu\r\n• Telur Bumbu Merah / Telur bagi 2 digoreng ( Khusus 100K Keatas)\r\n• Mie Goreng\r\n• Sambal\r\n• Serundeng / Abon\r\n\r\nNB :\r\n• Untuk Pemesanan diatas 100K bisa request Kertas Ucapan tanpa biaya tambahan \r\n• Menu bisa request diluar pilihan sesuai keinginan costumer\r\n', 'tumpeng_nasiputih.jpeg', 4),
(58, 'Tumpeng Nasi Putih (15 Orang)', '250000', 'Pilihan Menu A\r\n• Nasi Kuning / Gurih / Putih \r\n• Ayam Bakar / Goreng / Crispy / Nugget Ayam\r\n• Sambal Goreng Kentang / Perkedel Kentang\r\n• Serundeng / Abon \r\n• Oseng Tempe\r\n• Telur Bumbu Merah / Telur bagi 2 digoreng ( Khusus 100K keatas)\r\n• Sambal\r\n• Mie Goreng\r\n\r\nPilihan Menu B\r\n• Nasi Kuning / Gurih / Putih \r\n• Ayam Bakar / Goreng / Crispy / Nugget Ayam\r\n• Urap - Urap\r\n• Orem tempe tahu\r\n• Telur Bumbu Merah / Telur bagi 2 digoreng ( Khusus 100K Keatas)\r\n• Mie Goreng\r\n• Sambal\r\n• Serundeng / Abon\r\n\r\nNB :\r\n• Untuk Pemesanan diatas 100K bisa request Kertas Ucapan tanpa biaya tambahan \r\n• Menu bisa request diluar pilihan sesuai keinginan costumer\r\n', 'tumpeng_nasiputih.jpeg', 4),
(59, 'Tumpeng Nasi Putih (8 Orang)', '200000', 'Pilihan Menu A\r\n• Nasi Kuning / Gurih / Putih \r\n• Ayam Bakar / Goreng / Crispy / Nugget Ayam\r\n• Sambal Goreng Kentang / Perkedel Kentang\r\n• Serundeng / Abon \r\n• Oseng Tempe\r\n• Telur Bumbu Merah / Telur bagi 2 digoreng ( Khusus 100K keatas)\r\n• Sambal\r\n• Mie Goreng\r\n\r\nPilihan Menu B\r\n• Nasi Kuning / Gurih / Putih \r\n• Ayam Bakar / Goreng / Crispy / Nugget Ayam\r\n• Urap - Urap\r\n• Orem tempe tahu\r\n• Telur Bumbu Merah / Telur bagi 2 digoreng ( Khusus 100K Keatas)\r\n• Mie Goreng\r\n• Sambal\r\n• Serundeng / Abon\r\n\r\nNB :\r\n• Untuk Pemesanan diatas 100K bisa request Kertas Ucapan tanpa biaya tambahan \r\n• Menu bisa request diluar pilihan sesuai keinginan costumer\r\n', 'tumpeng_nasiputih.jpeg', 4),
(60, 'Tumpeng Mini', '25000', 'Pilihan Menu A\r\n• Nasi Kuning / Gurih / Putih \r\n• Ayam Bakar / Goreng / Crispy / Nugget Ayam\r\n• Sambal Goreng Kentang / Perkedel Kentang\r\n• Serundeng / Abon \r\n• Oseng Tempe\r\n• Telur Bumbu Merah / Telur bagi 2 digoreng ( Khusus 100K keatas)\r\n• Sambal\r\n• Mie Goreng\r\n\r\nPilihan Menu B\r\n• Nasi Kuning / Gurih / Putih \r\n• Ayam Bakar / Goreng / Crispy / Nugget Ayam\r\n• Urap - Urap\r\n• Orem tempe tahu\r\n• Telur Bumbu Merah / Telur bagi 2 digoreng ( Khusus 100K Keatas)\r\n• Mie Goreng\r\n• Sambal\r\n• Serundeng / Abon\r\n\r\nNB :\r\n• Untuk Pemesanan diatas 100K bisa request Kertas Ucapan tanpa biaya tambahan \r\n• Menu bisa request diluar pilihan sesuai keinginan costumer\r\n', 'tumpeng_mini.jpeg', 4);

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
  `subtotal_harga` varchar(50) COLLATE utf8mb4_unicode_ci NOT NULL,
  `total_harga` varchar(50) COLLATE utf8mb4_unicode_ci NOT NULL,
  `alamat_lengkap` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `no_hp` varchar(15) COLLATE utf8mb4_unicode_ci NOT NULL,
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

INSERT INTO `orders` (`id_order`, `no_pesanan`, `tgl_pesan`, `tgl_pakai`, `harga_satuan`, `qty`, `subtotal_harga`, `total_harga`, `alamat_lengkap`, `no_hp`, `catatan`, `tgl_bayar`, `bukti_pembayaran`, `status_pesanan`, `id_user`, `id_menu`, `id_pembayaran`) VALUES
(24, 'HNSR2023019044642', '2023-01-10', '2023-01-11 10:46:00', '15000', '3', '45000', '45000', 'Jl.Kalimantan Sumbersari Jember', '085486789003', 'buat ayang', NULL, 'bruce-mars.jpg', 'Belum Dibayar', 12, 1, 1);

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
  `gambar` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `id_akses` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`id_user`, `nama_user`, `email`, `alamat`, `nohp`, `password`, `gambar`, `id_akses`) VALUES
(1, 'Admin', 'admin@gmail.com', 'phpMyAdmin', '082334567890', 'admin', 'team-3.jpg', 1),
(12, 'Customer', 'customer@gmail.com', 'Jl.Kalimantan Sumbersari Jember', '085486789003', 'customer', 'ivana-square.jpg', 2);

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
  MODIFY `id_car` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `kategori`
--
ALTER TABLE `kategori`
  MODIFY `id_kategori` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `keranjang`
--
ALTER TABLE `keranjang`
  MODIFY `id_keranjang` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT for table `menu`
--
ALTER TABLE `menu`
  MODIFY `id_menu` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=61;

--
-- AUTO_INCREMENT for table `orders`
--
ALTER TABLE `orders`
  MODIFY `id_order` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=25;

--
-- AUTO_INCREMENT for table `pembayaran`
--
ALTER TABLE `pembayaran`
  MODIFY `id_pembayaran` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT for table `user`
--
ALTER TABLE `user`
  MODIFY `id_user` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;

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
