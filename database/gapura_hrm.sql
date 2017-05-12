-- phpMyAdmin SQL Dump
-- version 4.3.11
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: 12 Mei 2017 pada 03.36
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
-- Struktur dari tabel `datafile`
--

CREATE TABLE IF NOT EXISTS `datafile` (
  `kode_file` int(5) NOT NULL,
  `nik` varchar(20) COLLATE latin1_general_ci NOT NULL,
  `nama_file` varchar(100) COLLATE latin1_general_ci NOT NULL,
  `gambar` text COLLATE latin1_general_ci NOT NULL
) ENGINE=MyISAM AUTO_INCREMENT=9 DEFAULT CHARSET=latin1 COLLATE=latin1_general_ci;

--
-- Dumping data untuk tabel `datafile`
--

INSERT INTO `datafile` (`kode_file`, `nik`, `nama_file`, `gambar`) VALUES
(5, '2017000001', 'ijazah', '2017000001_25771351.pdf'),
(4, '2017000001', 'kacamata', '2017000001_23512102 - ENDA ESYUDHA (REVISI).pdf'),
(6, '2017000002', 'Scan Ijazah', '2017000002_Picture 012.jpg'),
(8, '2017000002', 'Scan Ijazah', '2017000002_TUgas 6 individu.pdf');

-- --------------------------------------------------------

--
-- Struktur dari tabel `jabatan`
--

CREATE TABLE IF NOT EXISTS `jabatan` (
  `id_jabatan` int(5) NOT NULL,
  `nm_jabatan` varchar(20) NOT NULL,
  `ket` varchar(100) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `jabatan`
--

INSERT INTO `jabatan` (`id_jabatan`, `nm_jabatan`, `ket`) VALUES
(1, 'Manager', '-'),
(2, 'Asisten Manager', ''),
(3, 'Accounting', '-'),
(4, 'Kasir', '-');

-- --------------------------------------------------------

--
-- Struktur dari tabel `karyawan`
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
-- Dumping data untuk tabel `karyawan`
--

INSERT INTO `karyawan` (`nik`, `user_id`, `nama`, `tempat_lahir`, `tgl_lahir`, `jekel`, `alamat`, `agama`, `no_hp`, `tgl_masuk`, `tgl_efektif`, `tgl_keluar`, `id_jabatan`, `status_kerja`, `tgl_pensiun`, `catatan`, `foto`, `date_input`, `date_update`) VALUES
('2017000001', '201383087', 'Hendri Yulianto', 'Rejo Agung', '1990-05-14', '0', 'Kp. Gebang RT. 002/002 Kl. Sangiang Jaya Kec. Periuk Kota Tangerang', 'islam', '085715887704', '2017-05-10', '0000-00-00', '2017-05-10', 1, 'Karyawan', '2017-05-10', '-', '2017000001_index3.jpg', '2017-05-10 07:05:13', '0000-00-00 00:00:00'),
('2017000002', '201383087', 'Fuad Aris Sugiarto', 'Jakarta', '1990-04-11', '0', 'Cikupa tangerang banten', 'Kristen', '0857158877440', '2017-05-10', '0000-00-00', '2017-05-10', 3, 'OutSourching', '2017-05-10', '-', '2017000002_chaudhary-DCmotor.png', '2017-05-10 08:05:05', '0000-00-00 00:00:00'),
('2017000003', '201383087', 'Ariy Wildan', 'Jakarta', '1990-05-12', '0', 'Kp. Baru', 'Hindu', '085715887704', '2017-05-10', '0000-00-00', '2017-05-10', 2, 'OutSourching', '2017-05-10', 'Noted', '2017000003_SAM_4267.JPG', '2017-05-10 09:05:19', '0000-00-00 00:00:00'),
('2017000004', '201383087', 'Ahmad Maulana', 'Jakarta', '1989-06-12', '0', 'Kp. Sawah Bali', 'Kristen', '02159309136', '2017-05-10', '2017-05-10', '2017-05-10', 3, 'OutSourching', '2017-05-10', '-', '2017000004_SAM_4269.JPG', '2017-05-10 09:05:31', '0000-00-00 00:00:00'),
('2017000005', '201383087', 'Richard Ade', 'Lamongan', '1994-04-14', 'Perempuan', 'Lamongan Makmur', 'Hindu', '0215690254', '2017-05-10', '2017-05-10', '2017-05-10', 1, 'OutSourching', '2017-05-10', '-', '2017000005_WhatsApp Image 2016-12-25 at 07.52.32.jpeg', '2017-05-10 09:05:29', '0000-00-00 00:00:00');

-- --------------------------------------------------------

--
-- Struktur dari tabel `kat_training`
--

CREATE TABLE IF NOT EXISTS `kat_training` (
  `id_kat` int(3) NOT NULL,
  `nm_kat` varchar(20) NOT NULL,
  `ket` varchar(50) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `kat_training`
--

INSERT INTO `kat_training` (`id_kat`, `nm_kat`, `ket`) VALUES
(1, 'Mandatori', '-'),
(2, 'Non Mandatori', ''),
(3, 'Awerenes', '');

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
-- Struktur dari tabel `peringatan`
--

CREATE TABLE IF NOT EXISTS `peringatan` (
  `id_peringatan` varchar(7) NOT NULL,
  `nik` varchar(10) NOT NULL,
  `tanggal` date NOT NULL,
  `ke` varchar(4) NOT NULL,
  `keterangan` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `peringatan`
--

INSERT INTO `peringatan` (`id_peringatan`, `nik`, `tanggal`, `ke`, `keterangan`) VALUES
('SP00001', '2017000001', '2017-05-11', '2', 'Sering di temukan melakukan pelangaran yang di lakukan secara bersama sama dengan temanya sehingga membuat perusahaan rugi miliaran rupiah'),
('SP00002', '2017000002', '2017-05-11', '1', ' Surat peringatan ini bertujuan untuk memberikan pengarahan sekaligus sebagai peringatan kepada yang bersangkutan agar kembali menjalankan tata tertib perusahaan yang berlaku dan tidak mengulangi kesalahan yang sama. Dan apabila mengulangi kesalahan yang sama maka akan diberlakukan tindakan yang sesuai dengan ketentuan peraturan perusahaan yang berlaku.\r\n\r\nSehubungan dengan pelanggaran yang terjadi maka perusahaan memberikan sanksi kepada yang bersangkutan berupa pemotongan tunjangan kehadiran selama 3x. Sanksi ini mulai diberlakukan sejak dibuatnya surat peringatan ini sampai bulan Juni 2016.'),
('SP00003', '2017000001', '2017-05-11', '2', 'Di beri sp 3 karena telah melakukan pelanggaran berupa keterlambatan masuk kerja pada tanggal berikut ini dan jika masi di ulangi makan akan kekanekan sp selanjutnya'),
('SP00004', '2017000002', '2017-05-11', '1', 'Memberikan peringatan kepada sodara karena telah melakukan pelanggartan berupa perbuatan yang tidak seharusnya di lakukan'),
('SP00005', '2017000004', '2017-05-11', '1', 'Sehubungan dengan pelanggaran yang terjadi maka perusahaan memberikan sanksi kepada yang bersangkutan berupa pemotongan tunjangan kehadiran selama 3x. Sanksi ini mulai diberlakukan sejak dibuatnya surat peringatan ini sampai bulan Juni 2016.'),
('SP00006', '2017000004', '2017-05-11', '2', 'Sehubungan dengan pelanggaran yang terjadi maka perusahaan memberikan sanksi kepada yang bersangkutan berupa pemotongan tunjangan kehadiran selama 3x. Sanksi ini mulai diberlakukan sejak dibuatnya surat peringatan ini sampai bulan Juni 2016. 2');

-- --------------------------------------------------------

--
-- Struktur dari tabel `training`
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
-- Dumping data untuk tabel `training`
--

INSERT INTO `training` (`id_training`, `id_kat`, `nik`, `keterangan`, `tgl_awal`, `tgl_akhir`, `nilai`) VALUES
('T0001', 1, '2017000001', 'Training TOT', '2017-05-11', '2017-05-11', '100'),
('T0002', 2, '2017000002', 'Training keselamatan kerja', '2017-05-11', '2017-05-30', '10'),
('T0003', 2, '2017000003', 'Training keselamatan kerja', '2017-05-11', '2017-05-30', '100'),
('T0004', 3, '2017000004', 'Keselamatan Kerja', '2017-05-11', '2017-05-30', '100'),
('T0005', 1, '2017000001', 'Pelatihan Perpajakan', '2017-05-11', '2017-06-11', '100'),
('T0006', 3, '2017000005', 'Pelatihan Sumberdaya manusia dan pemanfaatan tenaga kerja', '2017-05-11', '2017-06-01', '100');

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
  MODIFY `kode_file` int(5) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=9;
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
