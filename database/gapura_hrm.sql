-- phpMyAdmin SQL Dump
-- version 4.5.1
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: May 13, 2017 at 07:22 AM
-- Server version: 10.1.9-MariaDB
-- PHP Version: 5.6.15

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `gapura_hrm`
--

-- --------------------------------------------------------

--
-- Table structure for table `datafile`
--

CREATE TABLE `datafile` (
  `kode_file` int(5) NOT NULL,
  `nik` varchar(20) COLLATE latin1_general_ci NOT NULL,
  `nama_file` varchar(100) COLLATE latin1_general_ci NOT NULL,
  `gambar` text COLLATE latin1_general_ci NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1 COLLATE=latin1_general_ci;

--
-- Dumping data for table `datafile`
--

INSERT INTO `datafile` (`kode_file`, `nik`, `nama_file`, `gambar`) VALUES
(1, '2017000001', 'Scan File KTP', '2017000001_k_1.jpg'),
(2, '2017000001', 'Scan File Ijazah', '2017000001_1.jpg'),
(3, '2017000001', 'Scan File Kartu Keluarga', '2017000001_kk1.jpg'),
(4, '2017000002', 'Scan File KTP', '2017000002_k_2.jpg'),
(5, '2017000002', 'Scan File Ijazah', '2017000002_2.JPG'),
(6, '2017000002', 'Scan File Kartu Keluarga', '2017000002_kk1.jpg'),
(7, '2017000003', 'Scan File KTP', '2017000003_k_4.jpg'),
(8, '2017000003', 'Scan File Ijazah', '2017000003_3.jpg'),
(9, '2017000003', 'Scan File Kartu Keluarga', '2017000003_kk2.jpg'),
(10, '2017000004', 'Scan File KTP', '2017000004_k_4.jpg'),
(11, '2017000004', 'Scan File Ijazah', '2017000004_4.jpg'),
(12, '2017000004', 'Scan File Kartu Keluarga', '2017000004_kk4.jpg');

-- --------------------------------------------------------

--
-- Table structure for table `jabatan`
--

CREATE TABLE `jabatan` (
  `id_jabatan` int(5) NOT NULL,
  `nm_jabatan` varchar(20) NOT NULL,
  `ket` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `jabatan`
--

INSERT INTO `jabatan` (`id_jabatan`, `nm_jabatan`, `ket`) VALUES
(1, 'Manager', 'Manager 2'),
(2, 'Asisten Manager', 'Asisten Manager'),
(3, 'Accounting', 'Accounting'),
(4, 'Kasir', 'Kasir'),
(5, 'Programmer', 'Programmer');

-- --------------------------------------------------------

--
-- Table structure for table `karyawan`
--

CREATE TABLE `karyawan` (
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
('2017000003', '201383087', 'Efull Firmansyah', 'Tangerang', '1983-03-03', 'Laki Laki', 'Kp.  Gebang RT. 002/002', 'islam', '082158474569', '2017-05-13', '2017-05-13', '2017-05-21', 2, 'OutSourching', '2017-05-11', '-', '2017000003_IMG.jpg', '2017-05-13 10:05:03', '0000-00-00 00:00:00'),
('2017000004', '201383087', 'Adi Gunawan', 'Jakarta', '1981-08-07', 'Laki Laki', 'Cikarang Bekasi Indonesia', 'islam', '02159309136', '2017-05-13', '2017-05-13', '2017-05-13', 3, 'Karyawan', '2017-05-12', '-', '2017000004_IMG_0129.JPG', '2017-05-13 10:05:27', '0000-00-00 00:00:00');

-- --------------------------------------------------------

--
-- Table structure for table `kat_training`
--

CREATE TABLE `kat_training` (
  `id_kat` int(3) NOT NULL,
  `nm_kat` varchar(20) NOT NULL,
  `ket` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

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

CREATE TABLE `menu` (
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
(1, 'Recruitment', '#', '#', 'HRD', 0, 'glyphicon-cog', 1),
(3, 'Dokumen Peringatan', 'sp', 'sp', 'HRD', 15, 'glyphicon-file', 2),
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
(17, 'Jabatan', 'jabatan', 'jabatan', 'HRD', 7, 'glyphicon glyphicon-time', 5),
(18, 'Dokumen Training', 'training', 'training', 'HRD', 15, 'glyphicon glyphicon-ok', 1),
(19, 'Dokumen Karyawan', 'karyawan', 'karyawan_dokumen', 'HRD', 15, 'glyphicon-user', 0);

-- --------------------------------------------------------

--
-- Table structure for table `peringatan`
--

CREATE TABLE `peringatan` (
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
('SP00001', '2017000001', '2017-05-19', '1', 'Surat peringatan ini bertujuan untuk memberikan pengarahan sekaligus sebagai peringatan kepada yang bersangkutan agar kembali menjalankan tata tertib perusahaan yang berlaku dan tidak mengulangi kesalahan yang sama. Dan apabila mengulangi kesalahan yang sama maka akan diberlakukan tindakan yang sesuai dengan ketentuan peraturan perusahaan yang berlaku.\r\n\r\nSehubungan dengan pelanggaran yang terjadi maka perusahaan memberikan sanksi kepada yang bersangkutan berupa pemotongan tunjangan kehadiran selama 3x. Sanksi ini mulai diberlakukan sejak dibuatnya surat peringatan ini sampai bulan Juni 2016.');

-- --------------------------------------------------------

--
-- Table structure for table `training`
--

CREATE TABLE `training` (
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
('', 0, '', '', '0000-00-00', '0000-00-00', ''),
('T0001', 1, '2017000001', 'Pelatihan Sumberdaya Manusia', '2017-05-13', '2017-05-15', '-'),
('T0002', 2, '2017000001', 'Pelatihan Perpajakan dan kewira swastaan', '2017-05-12', '2017-05-18', '-');

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE `user` (
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
  MODIFY `kode_file` int(5) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;
--
-- AUTO_INCREMENT for table `jabatan`
--
ALTER TABLE `jabatan`
  MODIFY `id_jabatan` int(5) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;
--
-- AUTO_INCREMENT for table `kat_training`
--
ALTER TABLE `kat_training`
  MODIFY `id_kat` int(3) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
