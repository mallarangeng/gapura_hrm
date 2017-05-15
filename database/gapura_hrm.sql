-- phpMyAdmin SQL Dump
-- version 4.3.11
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: May 15, 2017 at 08:32 PM
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
) ENGINE=MyISAM AUTO_INCREMENT=10 DEFAULT CHARSET=latin1 COLLATE=latin1_general_ci;

--
-- Dumping data for table `datafile`
--

INSERT INTO `datafile` (`kode_file`, `nik`, `nama_file`, `gambar`) VALUES
(1, '2017000001', 'Scan Ktp', '2017000001_k_1.jpg'),
(2, '2017000001', 'Scan Ijazah', '2017000001_1.jpg'),
(3, '2017000001', 'Scan Kartu Keluarga', '2017000001_kk1.jpg'),
(4, '2017000004', 'Scan KTP', '2017000004_k_1.jpg'),
(5, '2017000004', 'Scan Ijazah', '2017000004_2.JPG'),
(6, '2017000004', 'Scan Kartu Keluarga', '2017000004_kk2.jpg'),
(7, '2017000005', 'Scan KTP', '2017000005_k_6.png'),
(8, '2017000005', 'Scan Ijazah', '2017000005_3.jpg'),
(9, '2017000005', 'Scan Kartu Keluarga', '2017000005_kk3.jpg');

-- --------------------------------------------------------

--
-- Table structure for table `data_lembur`
--

CREATE TABLE IF NOT EXISTS `data_lembur` (
  `id` int(3) NOT NULL,
  `id_spl` varchar(10) NOT NULL,
  `nik` varchar(10) NOT NULL,
  `ket` varchar(20) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=23 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `data_lembur`
--

INSERT INTO `data_lembur` (`id`, `id_spl`, `nik`, `ket`) VALUES
(4, 'SPL0000002', '2017000004', '-'),
(5, 'SPL0000002', '2017000001', '-'),
(6, 'SPL0000002', '2017000004', ''),
(10, 'SPL0000001', '2017000001', ''),
(11, 'SPL0000001', '2017000003', ''),
(12, 'SPL0000001', '2017000004', ''),
(13, 'SPL0000003', '2017000001', ''),
(15, 'SPL0000003', '2017000003', ''),
(17, 'SPL0000004', '2017000006', ''),
(18, 'SPL0000004', '2017000005', ''),
(19, 'SPL0000005', '2017000010', ''),
(20, 'SPL0000005', '2017000005', ''),
(21, 'SPL0000005', '2017000013', ''),
(22, 'SPL0000005', '2017000006', '');

-- --------------------------------------------------------

--
-- Table structure for table `jabatan`
--

CREATE TABLE IF NOT EXISTS `jabatan` (
  `id_jabatan` int(5) NOT NULL,
  `nm_jabatan` varchar(20) NOT NULL,
  `ket` varchar(100) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=9 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `jabatan`
--

INSERT INTO `jabatan` (`id_jabatan`, `nm_jabatan`, `ket`) VALUES
(1, 'Manager', '-'),
(2, 'Asisten Manager', ''),
(3, 'Accounting', '-'),
(4, 'Kasir', '-'),
(5, 'Administrasi', '-'),
(6, 'Staff Perpajakan', '-'),
(7, 'IT Programmer', '-'),
(8, 'Database Administrat', '');

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
  `stat_kerja` varchar(20) NOT NULL,
  `id_jabatan` int(5) NOT NULL,
  `tgl_pensiun` date NOT NULL,
  `stat_karyawan` varchar(20) NOT NULL,
  `tgl_nonaktif` date NOT NULL,
  `catatan` varchar(200) NOT NULL,
  `foto` text NOT NULL,
  `date_input` datetime NOT NULL,
  `date_update` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `karyawan`
--

INSERT INTO `karyawan` (`nik`, `user_id`, `nama`, `tempat_lahir`, `tgl_lahir`, `jekel`, `alamat`, `agama`, `no_hp`, `tgl_masuk`, `tgl_efektif`, `stat_kerja`, `id_jabatan`, `tgl_pensiun`, `stat_karyawan`, `tgl_nonaktif`, `catatan`, `foto`, `date_input`, `date_update`) VALUES
('2017000001', '201383087', 'Hendri Yulianto', 'Rejo Agung', '1992-05-14', 'Laki Laki', 'Kp. Gebang RT. 002/002 Periuk Tangerang', 'Kristen', '021593091362', '2017-05-15', '2017-05-15', 'OutSourching', 2, '2017-05-15', 'Aktif', '0000-00-00', 'Tidak ada catatan', '2017000001_AR EKA.jpg', '2017-05-15 05:05:50', '2017-05-15 05:05:54'),
('2017000002', '201383087', 'Yoni Wibowo', 'Jakarta', '1980-02-15', 'Laki Laki', 'Kp. Gebang RT. 002/002', 'islam', '02159309136', '2017-05-15', '2017-05-18', 'Karyawan', 4, '2017-05-15', 'Non Aktif', '2017-05-17', '-', '2017000002_ENY KUSRINI.jpg', '2017-05-15 04:05:00', '2017-05-15 06:05:41'),
('2017000003', '201383087', 'Angga Dwi saputra', 'Lampung', '1987-06-04', 'Laki Laki', 'Kp. Gebang RT. 002/002', 'Budha', '02159309136', '2017-05-15', '2017-05-17', 'Karyawan', 4, '2017-05-25', 'Aktif', '0000-00-00', 'Aktif masuk pada tanggal 211 dana dimana sdia adaiaptmf', '2017000003_jk.jpg', '2017-05-15 06:05:31', '0000-00-00 00:00:00'),
('2017000004', '201383087', 'Ahmad Maulanan', 'Jakarta', '1984-04-03', 'Laki Laki', 'Kp. Gebang RT. 002/002 Periuk Tangerang', 'islam', '02159309136', '2017-05-16', '2017-05-15', 'Karyawan', 4, '2017-05-15', 'Aktif', '2017-05-15', '-', '2017000004_IMG.jpg', '2017-05-15 10:05:46', '2017-05-15 10:05:59'),
('2017000005', '201383087', 'Ariy Wildan Himanan', 'Lampung', '1989-05-03', 'Laki Laki', 'Cikupa tangerang', 'islam', '02159309136', '2017-05-10', '2017-05-17', 'Karyawan', 5, '2017-09-20', 'Pensiun', '2017-11-16', '-', '2017000005_IMG_0097.JPG', '2017-05-15 10:05:35', '2017-05-15 11:05:21'),
('2017000006', '201383087', 'Basuki Saputra', 'Lampung', '1986-05-08', 'Laki Laki', 'Kp. Gebang RT. 002/002 Periuk Tangerang', 'Kristen', '02159309136', '2017-05-15', '2017-05-25', 'Karyawan', 5, '2018-01-20', 'Aktif', '2017-05-18', '-', '2017000006_IMG_0129.JPG', '2017-05-15 10:05:45', '0000-00-00 00:00:00'),
('2017000007', '201383087', 'Rofiul Husna', 'Klaten', '1991-07-07', 'Laki Laki', 'Cikupa tangerang', 'islam', '02159309136', '2017-05-15', '2017-05-15', 'Karyawan', 7, '2017-05-16', 'Aktif', '2017-05-17', '-', '2017000007_IMG_0148.JPG', '2017-05-15 10:05:21', '0000-00-00 00:00:00'),
('2017000008', '201383087', 'Angga Dwi saputra', 'Jakarta', '1990-09-10', 'Laki Laki', 'Cikupa tangerang', 'Hindu', '02159309136', '2017-05-15', '2017-05-15', 'OutSourching', 7, '2017-05-17', 'Aktif', '2017-05-16', '-', '2017000008_IMG_0148.JPG', '2017-05-15 11:05:04', '0000-00-00 00:00:00'),
('2017000009', '201383087', 'Faisal Yakup', 'Jakarta', '1996-11-13', 'Laki Laki', 'Kp. Gebang ', 'Kristen', '0215254771', '2017-05-16', '2017-05-16', 'OutSourching', 6, '2017-05-15', 'Non Aktif', '2017-05-16', '-', '2017000009_jess.jpg', '2017-05-15 11:05:20', '0000-00-00 00:00:00'),
('2017000010', '201383087', 'Yoga Saputra', 'Jakarta', '1994-08-16', 'Perempuan', 'Cikupa tangerang', 'Kristen', '02159309136', '2017-05-16', '2017-05-16', 'OutSourching', 6, '2017-05-16', 'Non Aktif', '2017-05-16', '-', '2017000010_ENY KUSRINI.jpg', '2017-05-15 11:05:33', '0000-00-00 00:00:00'),
('2017000011', '201383087', 'Jaka Kurniawan', 'Jombang', '1990-07-14', 'Laki Laki', 'Kp. Pacitan jaya ', 'Hindu', '02159309136', '2017-05-15', '2017-05-15', 'Karyawan', 7, '2017-05-17', 'Non Aktif', '2017-05-17', '-', '2017000011_jk.jpg', '2017-05-15 11:05:35', '0000-00-00 00:00:00'),
('2017000012', '201383087', 'Dian Maskurin', 'Jakarta', '1993-05-16', 'Perempuan', 'Jakarta Barat', 'islam', '02159309136', '2017-05-16', '2017-05-16', 'OutSourching', 5, '2017-05-16', 'Pensiun', '2017-05-15', '-', '2017000012_ENY KUSRINI.jpg', '2017-05-15 11:05:42', '0000-00-00 00:00:00'),
('2017000013', '201383087', 'Azizah', 'Bandung', '1994-10-13', 'Laki Laki', 'Bandung Barat', 'islam', '02159309136', '2017-05-16', '2017-05-16', 'OutSourching', 4, '2017-05-16', 'Non Aktif', '2017-05-17', '-', '2017000013_ENY KUSRINI.jpg', '2017-05-15 11:05:53', '0000-00-00 00:00:00'),
('2017000014', '201383087', 'Rizki Muhammad', 'Tangerang', '1993-06-15', 'Laki Laki', 'Tangrang', 'islam', '02159309136', '2017-05-15', '2017-05-15', 'OutSourching', 5, '2017-05-16', 'Aktif', '2017-05-16', '-', '2017000014_jess.jpg', '2017-05-15 11:05:57', '0000-00-00 00:00:00'),
('2017000015', '201383087', 'Dwi Maulana', 'Jakarta', '1990-08-12', 'Perempuan', 'Jakarta Barat', 'islam', '02159309136', '2017-05-16', '2017-05-16', 'OutSourching', 5, '2017-05-16', 'Non Aktif', '2017-05-19', '-', '2017000015_jess.jpg', '2017-05-15 11:05:27', '0000-00-00 00:00:00'),
('2017000016', '201383087', 'Kayas Mubarok', 'Cikupa ', '1991-06-14', 'Laki Laki', 'Cisoka Tangerang', 'islam', '02159309136', '2017-05-16', '2017-05-17', 'OutSourching', 5, '2017-05-09', 'Aktif', '2017-05-16', '-', '2017000016_AR EKA.jpg', '2017-05-15 11:05:39', '0000-00-00 00:00:00');

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
(1, 'Data Karyawan', '#', '#', 'HRD', 0, 'glyphicon-user', 2),
(3, 'Dokumen Peringatan', 'sp', 'sp', 'HRD', 15, 'glyphicon-file', 2),
(4, 'Surat Perintah Lembur', 'splembur', 'sp_lembur', 'DIVISI', 15, 'glyphicon-hourglass', 1),
(6, 'Home', 'home', 'home', 'Admin', 2, 'glyphicon-globe', 1),
(7, 'Master', 'Master', '#', 'HRD', 0, 'glyphicon-ok', 1),
(8, 'Menu', 'menu', 'menu', 'Desa', 7, 'glyphicon-equalizer', 4),
(10, 'Semua Karyawan', 'Karyawan', 'karyawan_all', 'HRD', 1, 'glyphicon-comment', 1),
(11, 'Karyawan Aktif', 'karyawan', 'karyawan_sort&stat_karyawan=Aktif', 'HRD', 1, 'glyphicon glyphicon-user', 3),
(12, 'Kategori Training', 'ujian', 'soal', 'HRD', 7, 'glyphicon glyphicon-pencil', 4),
(13, 'Karyawan', 'karyawan', 'karyawan', 'HRD', 7, 'glyphicon-user', 3),
(14, 'Dokumen Penilaian', 'apply', 'apply_data', 'HRD', 15, 'glyphicon-send', 3),
(15, 'Dokumen', 'apply', 'apply', 'HRD', 0, 'glyphicon-th-list', 3),
(16, 'Karyawan Pensiun', 'karyawan', 'karyawan_sort&stat_karyawan=Pensiun', 'HRD', 1, 'glyphicon-blackboard', 2),
(17, 'Jabatan', 'jabatan', 'jabatan', 'HRD', 7, 'glyphicon glyphicon-time', 5),
(18, 'Dokumen Training', 'training', 'training', 'HRD', 15, 'glyphicon glyphicon-ok', 1),
(19, 'Dokumen Karyawan', 'karyawan', 'karyawan_dokumen', 'HRD', 15, 'glyphicon-user', 0),
(20, 'Karyawan Non Aktif', 'karyawan', 'karyawan_sort&stat_karyawan=Non Aktif', 'HRD', 1, 'glyphicon-hourglass', 4),
(21, 'Laporan', 'laporan', 'laporan', 'HRD', 0, 'glyphicon-print', 4),
(22, 'Laporan Lembur', 'laporan', 'lembur', 'HRD', 21, 'glyphicon-hourglass', 1);

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
('SP00001', '2017000001', '2017-05-11', '1', 'Telah melakukan pelanggaran dan perbaikana  Telah melakukan pelanggaran dan perbaikana Telah melakukan pelanggaran dan perbaikana Telah melakukan pelanggaran dan perbaikana Telah melakukan pelanggaran dan perbaikana Telah melakukan pelanggaran dan perbaikana Telah melakukan pelanggaran dan perbaikana Telah melakukan pelanggaran dan perbaikana Telah melakukan pelanggaran dan perbaikana Telah melakukan pelanggaran dan perbaikana Telah melakukan pelanggaran dan perbaikana Telah melakukan pelanggaran dan perbaikana Telah melakukan pelanggaran dan perbaikana Telah melakukan pelanggaran dan perbaikana Telah melakukan pelanggaran dan perbaikana Telah melakukan pelanggaran dan perbaikana Telah melakukan pelanggaran dan perbaikana '),
('SP00002', '2017000001', '2017-05-16', '1', '1111111111111111111111111111111111111111111111111111111111111111111111111111111111111111111111111111111111111111111111');

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
('SPL0000001', '2017-04-05', '12:00:00', '13:10:00', 'Pembuatan Laporan Pajak SPT Tahunan yang akan segera di laporkan                                                                                                                                        ', 'Hendri Yulianto2', 'Manager2', 'Proses2'),
('SPL0000002', '2017-05-15', '17:00:00', '19:00:00', 'Membuat laporan SPT Tahunan badan                                           ', 'Hendri Mamang', 'Asisten Manager', 'Progress'),
('SPL0000003', '2017-05-14', '17:00:00', '20:00:00', 'Pembuatan Laporan Pajak SPT Tahunan yang akan segera di laporkan ', 'Rofiul Husna', 'Manager', 'Prosess'),
('SPL0000004', '2017-05-15', '17:00:00', '19:00:00', 'Pembuatan Laporan Pajak SPT Tahunan yang akan segera di laporkan ', 'Rofiul Husna', 'Spv', 'Prores'),
('SPL0000005', '2017-05-15', '17:00:00', '19:00:00', 'untuk membuat gambar teknik berupa denah lokasi untuk tempat penyimpanan barang barang sementara ', 'Hendri Yulianto', 'SPV', 'Progress');

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
  MODIFY `kode_file` int(5) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=10;
--
-- AUTO_INCREMENT for table `data_lembur`
--
ALTER TABLE `data_lembur`
  MODIFY `id` int(3) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=23;
--
-- AUTO_INCREMENT for table `jabatan`
--
ALTER TABLE `jabatan`
  MODIFY `id_jabatan` int(5) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=9;
--
-- AUTO_INCREMENT for table `kat_training`
--
ALTER TABLE `kat_training`
  MODIFY `id_kat` int(3) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=4;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
