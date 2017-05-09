-- phpMyAdmin SQL Dump
-- version 4.3.11
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: 09 Mei 2017 pada 02.03
-- Versi Server: 5.6.24
-- PHP Version: 5.6.8

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `gapura_hrm`
--

-- --------------------------------------------------------

--
-- Struktur dari tabel `menu`
--

CREATE TABLE IF NOT EXISTS `menu` (
  `id_menu` int(4) NOT NULL,
  `title` varchar(45) DEFAULT NULL,
  `folder` varchar(30) DEFAULT NULL,
  `link` varchar(45) DEFAULT NULL,
  `level` varchar(10) DEFAULT NULL,
  `parent` int(4) DEFAULT NULL,
  `icon` varchar(45) DEFAULT NULL,
  `urut` int(2) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data untuk tabel `menu`
--

INSERT INTO `menu` (`id_menu`, `title`, `folder`, `link`, `level`, `parent`, `icon`, `urut`) VALUES
(1, 'Recruitment', '#', '#', 'HRD', 0, 'glyphicon-cog', 1),
(3, 'Dokumen Peringatan', 'seleksi', 'hasil_seleksi', 'HRD', 15, 'glyphicon-file', 2),
(4, 'Permintaan Karyawan', 'fpk', 'fpk', 'DIVISI', 1, 'glyphicon-globe', 1),
(6, 'Home', 'home', 'home', 'Admin', 2, 'glyphicon-globe', 1),
(7, 'Master', 'Master', '#', 'HRD', 0, 'glyphicon-ok', 1),
(8, 'Menu', 'menu', 'menu', 'Desa', 7, 'glyphicon-equalizer', 4),
(10, 'Informasi  Recruitment', 'info', 'info', 'HRD', 1, 'glyphicon-comment', 1),
(11, 'Data Pelamar', 'pelamar', 'pelamar', 'HRD', 1, 'glyphicon glyphicon-user', 3),
(12, 'Kategori Training', 'ujian', 'soal', 'HRD', 7, 'glyphicon glyphicon-pencil', 4),
(13, 'Karyawan', 'karyawan', 'karyawan', 'HRD', 7, 'glyphicon-user', 3),
(14, 'Dokumen Penilaian', 'apply', 'apply_data', 'HRD', 15, 'glyphicon-send', 3),
(15, 'Dokumen', 'apply', 'apply', 'HRD', 0, 'glyphicon-th-list', 4),
(16, 'Dokumen Lembur', 'apply', 'apply', 'HRD', 15, 'glyphicon-blackboard', 2),
(17, 'Hendri', 'Hendri', 'Hendri', 'HRD', 0, 'glyphicon glyphicon-time', 5),
(18, 'Dokumen Training', 'Rofik', 'Rofik', 'HRD', 15, 'glyphicon glyphicon-ok', 1),
(19, 'Dokumen Karyawan', 'fpk', 'fpk', 'HRD', 15, 'glyphicon-user', 0);

-- --------------------------------------------------------

--
-- Struktur dari tabel `user`
--

CREATE TABLE IF NOT EXISTS `user` (
  `user_id` int(9) NOT NULL,
  `nm_lengkap` varchar(100) COLLATE latin1_general_ci NOT NULL,
  `email` varchar(100) COLLATE latin1_general_ci NOT NULL,
  `telp` varchar(12) COLLATE latin1_general_ci NOT NULL,
  `level` varchar(50) COLLATE latin1_general_ci NOT NULL,
  `date_reg` date NOT NULL,
  `password` varchar(150) COLLATE latin1_general_ci NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1 COLLATE=latin1_general_ci;

--
-- Dumping data untuk tabel `user`
--

INSERT INTO `user` (`user_id`, `nm_lengkap`, `email`, `telp`, `level`, `date_reg`, `password`) VALUES
(201383087, 'Hendri Y', 'hendrimamang@gmail.com', '085715887704', 'HRD', '2014-05-01', '202cb962ac59075b964b07152d234b70');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `menu`
--
ALTER TABLE `menu`
  ADD PRIMARY KEY (`id_menu`);

--
-- Indexes for table `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`user_id`);

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
