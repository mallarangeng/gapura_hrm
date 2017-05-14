-- phpMyAdmin SQL Dump
-- version 4.3.11
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: May 14, 2017 at 10:43 AM
-- Server version: 5.6.24
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
-- Table structure for table `datafile`
--

CREATE TABLE IF NOT EXISTS `datafile` (
  `kode_file` int(5) NOT NULL,
  `nik` varchar(20) COLLATE latin1_general_ci NOT NULL,
  `nama_file` varchar(100) COLLATE latin1_general_ci NOT NULL,
  `gambar` text COLLATE latin1_general_ci NOT NULL
) ENGINE=MyISAM AUTO_INCREMENT=3 DEFAULT CHARSET=latin1 COLLATE=latin1_general_ci;

--
-- Dumping data for table `datafile`
--

INSERT INTO `datafile` (`kode_file`, `nik`, `nama_file`, `gambar`) VALUES
(1, '2017000001', 'Scan KTP', '2017000001_04. KTP.JPG'),
(2, '2017000001', 'Scan Iajazah', '2017000001_TRANSKIP NILAI HENDRI ESA UNGGUL.jpg');

-- --------------------------------------------------------

--
-- Table structure for table `data_lembur`
--

CREATE TABLE IF NOT EXISTS `data_lembur` (
  `id` int(3) NOT NULL,
  `id_spl` varchar(10) NOT NULL,
  `nik` varchar(10) NOT NULL,
  `ket` varchar(20) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=8 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `data_lembur`
--

INSERT INTO `data_lembur` (`id`, `id_spl`, `nik`, `ket`) VALUES
(1, 'SPL0000001', '2017000003', '123'),
(2, 'SPL0000001', '2017000001', '-'),
(3, 'SPL0000001', '2017000004', ''),
(4, 'SPL0000002', '2017000004', '-'),
(5, 'SPL0000002', '2017000001', '-'),
(6, 'SPL0000002', '2017000004', ''),
(7, 'SPL0000001', '2017000003', '-');

-- --------------------------------------------------------

--
-- Table structure for table `jabatan`
--

CREATE TABLE IF NOT EXISTS `jabatan` (
  `id_jabatan` int(5) NOT NULL,
  `nm_jabatan` varchar(20) NOT NULL,
  `ket` varchar(100) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `jabatan`
--

INSERT INTO `jabatan` (`id_jabatan`, `nm_jabatan`, `ket`) VALUES
(1, 'Manager', '-'),
(2, 'Asisten Manager', ''),
(3, 'Accounting', '-'),
(4, 'Kasir', '-');

-- --------------------------------------------------------

--
-- Table structure for table `karyawan`
--

CREATE TABLE IF NOT EXISTS `karyawan` (
  `nik` varchar(10) NOT NULL,
  `user_id` varchar(10) NOT NULL,
  `nama` varchar(100) NOT NULL,
  `tempat_lahir` varchar(100) NOT NULL,
  `tgl_lahir` date NOT NULL,
  `jekel` varchar(20) NOT NULL,
  `alamat` varchar(200) NOT NULL,
  `agama` varchar(20) NOT NULL,
  `no_hp` varchar(20) NOT NULL,
  `tgl_masuk` date NOT NULL,
  `tgl_efektif` date NOT NULL,
  `tgl_keluar` date NOT NULL,
  `id_jabatan` int(5) NOT NULL,
  `status_kerja` varchar(20) NOT NULL,
  `tgl_pensiun` date NOT NULL,
  `catatan` varchar(200) NOT NULL,
  `foto` text NOT NULL,
  `date_input` datetime NOT NULL,
  `date_update` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `karyawan`
--

INSERT INTO `karyawan` (`nik`, `user_id`, `nama`, `tempat_lahir`, `tgl_lahir`, `jekel`, `alamat`, `agama`, `no_hp`, `tgl_masuk`, `tgl_efektif`, `tgl_keluar`, `id_jabatan`, `status_kerja`, `tgl_pensiun`, `catatan`, `foto`, `date_input`, `date_update`) VALUES
('2017000001', '201383087', 'Hendri Yulianto', 'Rejo Agung', '1992-05-14', 'Laki Laki', 'Kp. Gebang RT. 002/002 Tangerang', 'islam', '085715887704', '2017-05-13', '2017-05-13', '2017-09-22', 3, 'Karyawan', '2017-05-13', 'Penempatan posisi karyawan ', '2017000001_2016 2.jpg', '2017-05-13 05:05:23', '0000-00-00 00:00:00'),
('2017000002', '201383087', 'Rofiul Husna', 'Jakarta', '1992-05-11', 'Laki Laki', 'Tangerang Indonesia', 'islam', '085715888744', '2017-05-13', '2017-05-13', '2017-05-12', 2, 'OutSourching', '2017-05-03', '-', '2017000002_20160506_09571212.jpg', '2017-05-13 06:05:53', '0000-00-00 00:00:00'),
('2017000003', '201383087', 'Rudi Hermanto', 'Jakarta', '1983-04-03', 'Perempuan', 'Jakarta Barat - Indonesia', 'Hindu', '02159309136', '2017-05-14', '2017-05-14', '2017-05-07', 2, 'Karyawan', '2017-05-17', '-', '2017000003_AR EKA.jpg', '2017-05-14 02:05:42', '0000-00-00 00:00:00'),
('2017000004', '201383087', 'Eni Kusrini', 'Jakarta', '1995-05-16', 'Perempuan', 'Kp. Gebang RT. 002/002', 'islam', '02159309136', '2017-05-14', '2017-05-12', '2017-05-04', 4, 'OutSourching', '2017-05-11', '-', '2017000004_ENY KUSRINI.jpg', '2017-05-14 02:05:59', '0000-00-00 00:00:00');

-- --------------------------------------------------------

--
-- Table structure for table `kat_training`
--

CREATE TABLE IF NOT EXISTS `kat_training` (
  `id_kat` int(3) NOT NULL,
  `nm_kat` varchar(20) NOT NULL,
  `ket` varchar(50) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `kat_training`
--

INSERT INTO `kat_training` (`id_kat`, `nm_kat`, `ket`) VALUES
(1, 'Mandatori', '-'),
(2, 'Non Mandatori', ''),
(3, 'Awerenes', '');

-- --------------------------------------------------------

--
-- Table structure for table `menu`
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
-- Dumping data for table `menu`
--

INSERT INTO `menu` (`id_menu`, `title`, `folder`, `link`, `level`, `parent`, `icon`, `urut`) VALUES
(1, 'Penggajian', '#', '#', 'HRD', 0, 'glyphicon-list-alt', 3),
(3, 'Dokumen Peringatan', 'sp', 'sp', 'HRD', 15, 'glyphicon-file', 2),
(4, 'Surat Perintah Lembur', 'splembur', 'sp_lembur', 'DIVISI', 1, 'glyphicon-hourglass', 1),
(6, 'Home', 'home', 'home', 'Admin', 2, 'glyphicon-globe', 1),
(7, 'Master', 'Master', '#', 'HRD', 0, 'glyphicon-ok', 1),
(8, 'Menu', 'menu', 'menu', 'Desa', 7, 'glyphicon-equalizer', 4),
(10, 'Informasi  Recruitment', 'info', 'info', 'HRD', 1, 'glyphicon-comment', 1),
(11, 'Data Pelamar', 'pelamar', 'pelamar', 'HRD', 1, 'glyphicon glyphicon-user', 3),
(12, 'Kategori Training', 'ujian', 'soal', 'HRD', 7, 'glyphicon glyphicon-pencil', 4),
(13, 'Karyawan', 'karyawan', 'karyawan', 'HRD', 7, 'glyphicon-user', 3),
(14, 'Dokumen Penilaian', 'apply', 'apply_data', 'HRD', 15, 'glyphicon-send', 3),
(15, 'Dokumen', 'apply', 'apply', 'HRD', 0, 'glyphicon-th-list', 2),
(16, 'Dokumen Lembur', 'apply', 'apply', 'HRD', 15, 'glyphicon-blackboard', 2),
(17, 'Jabatan', 'jabatan', 'jabatan', 'HRD', 7, 'glyphicon glyphicon-time', 5),
(18, 'Dokumen Training', 'training', 'training', 'HRD', 15, 'glyphicon glyphicon-ok', 1),
(19, 'Dokumen Karyawan', 'karyawan', 'karyawan_dokumen', 'HRD', 15, 'glyphicon-user', 0);

-- --------------------------------------------------------

--
-- Table structure for table `peringatan`
--

CREATE TABLE IF NOT EXISTS `peringatan` (
  `id_peringatan` varchar(7) NOT NULL,
  `nik` varchar(10) NOT NULL,
  `tanggal` date NOT NULL,
  `ke` varchar(4) NOT NULL,
  `keterangan` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `peringatan`
--

INSERT INTO `peringatan` (`id_peringatan`, `nik`, `tanggal`, `ke`, `keterangan`) VALUES
('SP00001', '2017000001', '2017-05-12', '1', 'Telah melakukan pelanggaran dan perbaikana  Telah melakukan pelanggaran dan perbaikana Telah melakukan pelanggaran dan perbaikana Telah melakukan pelanggaran dan perbaikana Telah melakukan pelanggaran dan perbaikana Telah melakukan pelanggaran dan perbaikana Telah melakukan pelanggaran dan perbaikana Telah melakukan pelanggaran dan perbaikana Telah melakukan pelanggaran dan perbaikana Telah melakukan pelanggaran dan perbaikana Telah melakukan pelanggaran dan perbaikana Telah melakukan pelanggaran dan perbaikana Telah melakukan pelanggaran dan perbaikana Telah melakukan pelanggaran dan perbaikana Telah melakukan pelanggaran dan perbaikana Telah melakukan pelanggaran dan perbaikana Telah melakukan pelanggaran dan perbaikana ');

-- --------------------------------------------------------

--
-- Table structure for table `sp_lembur`
--

CREATE TABLE IF NOT EXISTS `sp_lembur` (
  `id_spl` varchar(10) NOT NULL,
  `tanggal` date NOT NULL,
  `jam_awal` time NOT NULL,
  `jam_akhir` time NOT NULL,
  `tujuan` varchar(200) NOT NULL,
  `pemberi_tugas` varchar(20) NOT NULL,
  `jabatan` varchar(20) NOT NULL,
  `status_spl` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `sp_lembur`
--

INSERT INTO `sp_lembur` (`id_spl`, `tanggal`, `jam_awal`, `jam_akhir`, `tujuan`, `pemberi_tugas`, `jabatan`, `status_spl`) VALUES
('SPL0000001', '2017-05-25', '12:00:00', '12:00:00', 'Pembuatan Laporan Pajak SPT Tahunan yang akan segera di laporkan                                                                                                                                        ', 'Hendri Yulianto2', 'Manager2', 'Proses2'),
('SPL0000002', '2017-05-15', '17:00:00', '19:00:00', 'Membuat laporan SPT Tahunan badan                                           ', 'Hendri Mamang', 'Asisten Manager', 'Progress');

-- --------------------------------------------------------

--
-- Table structure for table `training`
--

CREATE TABLE IF NOT EXISTS `training` (
  `id_training` varchar(5) NOT NULL,
  `id_kat` int(3) NOT NULL,
  `nik` varchar(10) NOT NULL,
  `keterangan` text NOT NULL,
  `tgl_awal` date NOT NULL,
  `tgl_akhir` date NOT NULL,
  `nilai` varchar(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `training`
--

INSERT INTO `training` (`id_training`, `id_kat`, `nik`, `keterangan`, `tgl_awal`, `tgl_akhir`, `nilai`) VALUES
('T0001', 1, '2017000001', 'Pelatihan Sumberdaya Manusia', '2017-05-13', '2017-05-15', '-'),
('T0002', 2, '2017000001', 'Pelatihan Perpajakan dan kewira swastaan', '2017-05-12', '2017-05-18', '-');

-- --------------------------------------------------------

--
-- Table structure for table `user`
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
-- Dumping data for table `user`
--

INSERT INTO `user` (`user_id`, `nm_lengkap`, `email`, `telp`, `level`, `date_reg`, `password`) VALUES
(201383087, 'Hendri Y', 'hendrimamang@gmail.com', '085715887704', 'HRD', '2014-05-01', '202cb962ac59075b964b07152d234b70');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `datafile`
--
ALTER TABLE `datafile`
  ADD PRIMARY KEY (`kode_file`);

--
-- Indexes for table `data_lembur`
--
ALTER TABLE `data_lembur`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `jabatan`
--
ALTER TABLE `jabatan`
  ADD PRIMARY KEY (`id_jabatan`);

--
-- Indexes for table `karyawan`
--
ALTER TABLE `karyawan`
  ADD PRIMARY KEY (`nik`);

--
-- Indexes for table `kat_training`
--
ALTER TABLE `kat_training`
  ADD PRIMARY KEY (`id_kat`);

--
-- Indexes for table `menu`
--
ALTER TABLE `menu`
  ADD PRIMARY KEY (`id_menu`);

--
-- Indexes for table `peringatan`
--
ALTER TABLE `peringatan`
  ADD PRIMARY KEY (`id_peringatan`);

--
-- Indexes for table `sp_lembur`
--
ALTER TABLE `sp_lembur`
  ADD PRIMARY KEY (`id_spl`);

--
-- Indexes for table `training`
--
ALTER TABLE `training`
  ADD PRIMARY KEY (`id_training`);

--
-- Indexes for table `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`user_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `datafile`
--
ALTER TABLE `datafile`
  MODIFY `kode_file` int(5) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=3;
--
-- AUTO_INCREMENT for table `data_lembur`
--
ALTER TABLE `data_lembur`
  MODIFY `id` int(3) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=8;
--
-- AUTO_INCREMENT for table `jabatan`
--
ALTER TABLE `jabatan`
  MODIFY `id_jabatan` int(5) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=5;
--
-- AUTO_INCREMENT for table `kat_training`
--
ALTER TABLE `kat_training`
  MODIFY `id_kat` int(3) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=4;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
