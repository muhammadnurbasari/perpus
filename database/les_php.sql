-- phpMyAdmin SQL Dump
-- version 4.8.3
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Feb 09, 2019 at 08:15 AM
-- Server version: 10.1.37-MariaDB
-- PHP Version: 7.1.24

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `les_php`
--

-- --------------------------------------------------------

--
-- Table structure for table `anggota`
--

CREATE TABLE `anggota` (
  `id_anggota` int(11) NOT NULL,
  `npm` varchar(25) NOT NULL,
  `nama` varchar(255) NOT NULL,
  `jenis_kelamin` char(1) NOT NULL,
  `alamat` varchar(255) NOT NULL,
  `no_tlp` varchar(13) NOT NULL,
  `jurusan` varchar(50) NOT NULL,
  `created_by` int(11) NOT NULL,
  `update_by` int(11) DEFAULT NULL,
  `created_date` datetime NOT NULL,
  `update_date` datetime DEFAULT NULL,
  `is_active` tinyint(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `anggota`
--

INSERT INTO `anggota` (`id_anggota`, `npm`, `nama`, `jenis_kelamin`, `alamat`, `no_tlp`, `jurusan`, `created_by`, `update_by`, `created_date`, `update_date`, `is_active`) VALUES
(123, '111', 'nama', 'P', 'alamat', '111', 'jurusan', 1, 2, '2019-01-28 00:00:00', '0000-00-00 00:00:00', 0),
(1547952787, '2016804129', 'Diah Maelani', 'P', 'Ds Minden Ploso Kec Jumapolo kab Karanganyar', '081291234567', 'sistem informasi', 2, 0, '2020-01-19 00:00:00', '0000-00-00 00:00:00', 1),
(1547953043, '2016102123', 'Nur Amanah', 'P', 'Citra Raya, Belakang Square', '081562341234', 'manajemen', 2, 1, '2020-01-19 00:00:00', '2025-01-19 00:00:00', 1),
(1547953154, '2015804222', 'Suwendri Wijaya', 'L', 'Kp Sempur', '081112341256', 'komputer akuntansi', 2, 1, '2020-01-19 00:00:00', '2025-01-19 00:00:00', 1),
(1547976211, '2015804244', 'Muhammad Nur basari', 'L', 'Desa Banjaran Rt 02 Rw 05 no36 taman - pemalang', '081293245820', 'sistem informasi', 1, 1, '2020-01-19 00:00:00', '2025-01-19 00:00:00', 0),
(1548680151, '2018204244', 'babas', 'L', 'ssss', '081298120912', 'sistem informasi', 2, 2, '2028-01-19 00:00:00', '0000-00-00 00:00:00', 0),
(1549414198, '2016804122', 'Nurahman', 'L', 'Palembang', '081232141234', 'sistem informasi', 1, 0, '2006-02-19 00:00:00', '0000-00-00 00:00:00', 1),
(1549414239, '2015102111', 'Rohman Hidayat', 'L', 'Cirebon', '087893245820', 'manajemen', 1, 0, '2006-02-19 00:00:00', '0000-00-00 00:00:00', 1),
(1549414278, '2017804133', 'Sulastri', 'P', 'Madiun', '081711771188', 'sistem informasi', 1, 0, '2006-02-19 00:00:00', '0000-00-00 00:00:00', 1);

-- --------------------------------------------------------

--
-- Table structure for table `buku`
--

CREATE TABLE `buku` (
  `id_buku` int(11) NOT NULL,
  `judul` varchar(255) NOT NULL,
  `penerbit` varchar(255) NOT NULL,
  `pengarang` varchar(255) NOT NULL,
  `tahun_terbit` int(11) NOT NULL,
  `kategori` varchar(255) NOT NULL,
  `isbn` varchar(255) DEFAULT NULL,
  `photo` varchar(255) DEFAULT NULL,
  `qty` int(11) NOT NULL,
  `created_by` int(11) NOT NULL,
  `update_by` int(11) DEFAULT NULL,
  `created_date` date NOT NULL,
  `update_date` date DEFAULT NULL,
  `is_active` tinyint(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `buku`
--

INSERT INTO `buku` (`id_buku`, `judul`, `penerbit`, `pengarang`, `tahun_terbit`, `kategori`, `isbn`, `photo`, `qty`, `created_by`, `update_by`, `created_date`, `update_date`, `is_active`) VALUES
(1547132478, 'Object Oriented Programing Php', 'Erlangga', 'Sandhika Galih', 2106, 'sistem informasi', '', '5c43441506552.png', 6, 1, 1, '0000-00-00', '2019-02-08', 1),
(1547134437, 'Belajar Php Pemula', 'Gramedia', 'Nurahman', 2018, 'komputer akuntansi', '', '5c4337cc2cf04.png', 2, 1, 0, '0000-00-00', '2019-01-19', 1),
(1547135223, 'Bisnis Dengan Modal Kecil', 'Erlangga', 'Nur amanah', 2105, 'manajemen', '', '5c3768f7158f5.png', 6, 1, 0, '0000-00-00', '0000-00-00', 0),
(1547135363, 'Pengantar Akuntansi 1', 'Gramedia', 'Muhammad Nur Basari', 2011, 'akuntansi', '', '5c376983a19cc.png', 2, 1, 0, '0000-00-00', '0000-00-00', 1),
(1547208284, 'Framework Laravel', 'Gramedia', 'Sandhika Galih', 2014, 'sistem informasi', '', '5c38865c21d09.png', 6, 1, 0, '0000-00-00', '0000-00-00', 1),
(1547366487, 'Eccomerce Indonesia', 'Gramedia', 'Jaenuri', 2017, 'sistem informasi', '', '5c3af05725501.png', 2, 1, 0, '2019-01-13', '0000-00-00', 1),
(1547640365, 'Belajar Codeigniter', 'Gramedia', 'Sandhika Galih', 2016, 'sistem informasi', '', '5c3f1e2e028d8.png', 1, 1, 0, '2019-01-16', '0000-00-00', 1),
(1547640460, 'Mengahadapi Era Teknologi', 'Erlangga', 'Joko', 2012, 'komputer akuntansi', '', '5c3f1e8c07418.png', 5, 1, 0, '2019-01-16', '0000-00-00', 1),
(1547640618, 'Era Ekonomi Kreatif', 'Gramedia', 'Tubagus', 2018, 'manajemen', '', '5c3f1f2a2545f.png', 6, 1, 0, '2019-01-16', '0000-00-00', 1),
(1547640677, 'Cara Mudah Belajar MVC', 'Erlangga', 'Tiar Agisti', 2019, 'sistem informasi', '', '5c3f1f65e71ed.png', 4, 1, 0, '2019-01-16', '0000-00-00', 1),
(1547642517, 'Cara Cepat Belajar Yii', 'Gramedia', 'abas', 2016, 'sistem informasi', '', '5c3f26955e7f5.png', 1, 1, 0, '2019-01-16', '0000-00-00', 1),
(1547642713, 'Mengahadapi Era Ekonomi Modern', 'Erlangga', 'winanti', 2017, 'manajemen', '', '5c3f27591db98.png', 1, 1, 1, '2019-01-16', '2019-01-25', 1),
(1547909759, 'Menjadi Programer Handal', 'Erlangga', 'Nurahman', 2017, 'sistem informasi', '', '5c433f68d6a3e.png', 3, 2, 1, '2019-01-19', '2019-01-20', 0),
(1548557810, 'manejemen warehouse', 'Erlangga', 'abas', 2019, 'komputer akuntansi', '', '5c4d74ee93eac.jpg', 1, 2, 1, '2019-01-27', '2019-01-27', 1),
(1548865924, 'Belajar Menjadi Pengusaha Sukses', 'Gramedia', 'Susilo Pranyoto', 2001, 'manajemen', '', '5c51d1844938a.png', 2, 1, 0, '2019-01-30', '0000-00-00', 1),
(1548866490, 'Belajar Php Dengan Mudah', 'Gramedia', 'Sandhika Galih', 2017, 'sistem informasi', '', '5c51d3ba174ba.png', 4, 1, 0, '2019-01-30', '0000-00-00', 1),
(1548866792, 'Cara Cepat Menjadi Programer', 'Erlangga', 'Sandhika Galih', 2018, 'sistem informasi', '', '5c51d5083310d.png', 3, 1, 1, '2019-01-30', '2019-01-30', 1);

-- --------------------------------------------------------

--
-- Table structure for table `peminjaman_detail`
--

CREATE TABLE `peminjaman_detail` (
  `id_pinjam` int(11) NOT NULL,
  `id_buku` int(11) NOT NULL,
  `qty` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `peminjaman_detail`
--

INSERT INTO `peminjaman_detail` (`id_pinjam`, `id_buku`, `qty`) VALUES
(121311, 1547134437, 1),
(121311, 1547208284, 1),
(1548861523, 1547642517, 1),
(1548861523, 1548557810, 1),
(1548861721, 1547366487, 1),
(1548862018, 1547640365, 1),
(1548862018, 1547642517, 1),
(1548862018, 1548557810, 1);

-- --------------------------------------------------------

--
-- Table structure for table `peminjaman_header`
--

CREATE TABLE `peminjaman_header` (
  `id_pinjam` int(11) NOT NULL,
  `tgl_pinjam` date NOT NULL,
  `tgl_jatuh_tempo` date NOT NULL,
  `id_anggota` int(11) NOT NULL,
  `created_by` int(11) NOT NULL,
  `update_by` int(11) DEFAULT NULL,
  `created_date` datetime NOT NULL,
  `update_date` datetime DEFAULT NULL,
  `status` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `peminjaman_header`
--

INSERT INTO `peminjaman_header` (`id_pinjam`, `tgl_pinjam`, `tgl_jatuh_tempo`, `id_anggota`, `created_by`, `update_by`, `created_date`, `update_date`, `status`) VALUES
(121311, '2019-01-26', '2019-01-31', 1547953043, 2, NULL, '2019-01-26 00:00:00', NULL, 1),
(1548861523, '2019-01-30', '2019-01-31', 1547952787, 1, 0, '2019-01-30 00:00:00', '0000-00-00 00:00:00', 1),
(1548861721, '2019-01-30', '2019-02-06', 1547952787, 1, 0, '2019-01-30 00:00:00', '0000-00-00 00:00:00', 1),
(1548862018, '2019-01-30', '2019-01-31', 1547953154, 1, 0, '2019-01-30 00:00:00', '0000-00-00 00:00:00', 1);

-- --------------------------------------------------------

--
-- Table structure for table `pengembalian_detail`
--

CREATE TABLE `pengembalian_detail` (
  `id_pengembalian` int(11) NOT NULL,
  `id_buku` int(11) NOT NULL,
  `qty` int(11) NOT NULL,
  `denda` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `pengembalian_header`
--

CREATE TABLE `pengembalian_header` (
  `id_pengembalian` int(11) NOT NULL,
  `tgl_kembali` date NOT NULL,
  `id_pinjam` int(11) NOT NULL,
  `created_by` int(11) NOT NULL,
  `update_by` int(11) DEFAULT NULL,
  `created_date` datetime NOT NULL,
  `update_date` datetime DEFAULT NULL,
  `status` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE `user` (
  `id_user` int(11) NOT NULL,
  `nama_user` varchar(255) NOT NULL,
  `password_user` varchar(255) NOT NULL,
  `hak_akses` int(11) NOT NULL,
  `created_by` int(11) NOT NULL,
  `update_by` int(11) DEFAULT NULL,
  `created_date` datetime NOT NULL,
  `update_date` datetime DEFAULT NULL,
  `is_active` tinyint(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`id_user`, `nama_user`, `password_user`, `hak_akses`, `created_by`, `update_by`, `created_date`, `update_date`, `is_active`) VALUES
(1, 'abas', '12345', 1, 1, NULL, '2019-01-31 04:17:29', '0000-00-00 00:00:00', 1),
(2, 'nurahman', '12345', 1, 1, NULL, '2019-01-19 02:11:00', NULL, 1);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `anggota`
--
ALTER TABLE `anggota`
  ADD PRIMARY KEY (`id_anggota`),
  ADD KEY `created_by` (`created_by`,`update_by`);

--
-- Indexes for table `buku`
--
ALTER TABLE `buku`
  ADD PRIMARY KEY (`id_buku`);

--
-- Indexes for table `peminjaman_detail`
--
ALTER TABLE `peminjaman_detail`
  ADD PRIMARY KEY (`id_pinjam`,`id_buku`),
  ADD KEY `id_buku` (`id_buku`);

--
-- Indexes for table `peminjaman_header`
--
ALTER TABLE `peminjaman_header`
  ADD PRIMARY KEY (`id_pinjam`),
  ADD KEY `id_anggota` (`id_anggota`);

--
-- Indexes for table `pengembalian_detail`
--
ALTER TABLE `pengembalian_detail`
  ADD PRIMARY KEY (`id_pengembalian`,`id_buku`),
  ADD KEY `id_buku` (`id_buku`);

--
-- Indexes for table `pengembalian_header`
--
ALTER TABLE `pengembalian_header`
  ADD PRIMARY KEY (`id_pengembalian`);

--
-- Indexes for table `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`id_user`);

--
-- Constraints for dumped tables
--

--
-- Constraints for table `peminjaman_detail`
--
ALTER TABLE `peminjaman_detail`
  ADD CONSTRAINT `peminjaman_detail_ibfk_1` FOREIGN KEY (`id_pinjam`) REFERENCES `peminjaman_header` (`id_pinjam`),
  ADD CONSTRAINT `peminjaman_detail_ibfk_2` FOREIGN KEY (`id_buku`) REFERENCES `buku` (`id_buku`);

--
-- Constraints for table `peminjaman_header`
--
ALTER TABLE `peminjaman_header`
  ADD CONSTRAINT `peminjaman_header_ibfk_1` FOREIGN KEY (`id_anggota`) REFERENCES `anggota` (`id_anggota`);

--
-- Constraints for table `pengembalian_detail`
--
ALTER TABLE `pengembalian_detail`
  ADD CONSTRAINT `pengembalian_detail_ibfk_1` FOREIGN KEY (`id_pengembalian`) REFERENCES `pengembalian_header` (`id_pengembalian`),
  ADD CONSTRAINT `pengembalian_detail_ibfk_2` FOREIGN KEY (`id_buku`) REFERENCES `buku` (`id_buku`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
