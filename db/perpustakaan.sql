-- phpMyAdmin SQL Dump
-- version 5.1.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jan 14, 2022 at 01:58 AM
-- Server version: 10.4.18-MariaDB
-- PHP Version: 7.3.27

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `perpustakaan`
--

-- --------------------------------------------------------

--
-- Table structure for table `tb_admin`
--

DROP TABLE IF EXISTS `tb_admin`;
CREATE TABLE `tb_admin` (
  `nama` varchar(20) NOT NULL,
  `password` varchar(20) NOT NULL,
  `id_admin` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tb_admin`
--

INSERT INTO `tb_admin` (`nama`, `password`, `id_admin`) VALUES
('admin', 'admin123', 84828882);

-- --------------------------------------------------------

--
-- Table structure for table `tb_book`
--

DROP TABLE IF EXISTS `tb_book`;
CREATE TABLE `tb_book` (
  `id` varchar(30) NOT NULL,
  `nama_buku` varchar(30) NOT NULL,
  `judul_buku` varchar(30) NOT NULL,
  `tanggal_rilis` date NOT NULL,
  `author` varchar(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tb_book`
--

INSERT INTO `tb_book` (`id`, `nama_buku`, `judul_buku`, `tanggal_rilis`, `author`) VALUES
('13ihu0Uo1gzhvJh', 'Leader Of Exploration', 'Leader Of Exploration', '2017-01-11', 'Devon Knight'),
('37NHKWBrt7bvEgB', 'Creatures And Assassins', 'Creatures And Assassins', '2020-01-07', 'Ammar Doherty'),
('37xe8B1INhCiCVas', 'Warlocks And Monks', 'Warlocks And Monks', '2020-01-15', 'Bella-Rose Mcgregor'),
('37xe8B1INhCiCVg', 'Warlocks And Monks', 'Warlocks And Monks', '0000-00-00', 'Bella-Rose Mcgregor'),
('47pbzYxVejgTiRP', 'Rat Of The Gods', 'Rat Of The Gods', '2014-01-08', 'Kaycee Lindsay'),
('5ZQNojGxiAhejHf', 'Child Of The Crash', 'Child Of The Crash', '2021-05-17', 'Jazmyn Cresswell'),
('bj5afyYg9nM6UQC', 'Director Of Our Legacy', 'Director Of Our Legacy', '2018-03-12', 'Nathan Cash'),
('GpTf92JU0fB33M92-M', 'Axe and the Lily', 'Axe and the Lily', '2014-12-09', 'Sam Martines'),
('IWl5UzqKTge_3bDAPL', 'The Crystal in the March', 'The Crystal in the March', '2021-12-07', 'Sung Jin Woo'),
('jRlxlYWNO4VcTQ3iK5', 'Silent Vice', 'Silent Vice', '2013-08-20', 'Ler sam'),
('KJHDW7364jhebff', 'Tales of Demon and God', 'Tales Demon of God', '2019-06-18', 'Mad Snail'),
('LAWEA5oXoZSASq3', 'Fairies Of The Undead', 'Fairies Of The Undead', '2017-01-16', 'Rebeca David'),
('LAWEA5oXoZSASq5', 'Fairies Of The Undead', 'Fairies Of The Undead', '0000-00-00', 'Rebeca David'),
('LLwf8qqT3Woa6zd', 'Invader Of Nowhere', 'Invader Of Nowhere', '2012-12-12', 'Kirsty Flynn'),
('LxvkKv6xwPrVbxs', 'Heroes Of Earth\'s Legacy', 'Heroes Of Earth\'s Legacy', '2021-07-19', 'Elis Cuevas'),
('o6E2vWv4ZadLt6Z', 'Spire Without Flaws', 'Spire Without Flaws', '2018-03-14', 'Carolyn Ayala'),
('OxiFvu66LD9ekB4', 'Vanish In The Past', 'Vanish In The Past', '2015-01-01', 'Victor Ahmed'),
('pkWeP68DrqRMu8I', 'Women Of Death', 'Women Of Death', '2017-08-07', 'Sheikh Fenton'),
('QmNuGn5f0BRep85', 'Gangsters And Werewolves', 'Gangsters And Werewolves', '2013-08-20', 'Lillie Pike'),
('Ri80YT5DrC218CH', 'Figures From The Portal', 'Figures From The Portal', '2018-10-24', 'Bjorn Reyna'),
('TJ2Vrn7i1nykESM', 'Snakes Of Time', 'Snakes Of Time', '2021-08-10', 'Ella Davey'),
('TxR8KljCw7XElJk', 'Medics Of Space', 'Medics Of Space', '2014-09-09', 'Allen Mcgee'),
('u35mYSvdECYqzX2', 'Medics And Veterans', 'Medics And Veterans', '2013-08-13', 'Charleigh Petty'),
('xEINvAL1DDE5e02', 'Decay Of Summer', 'Decay Of Summer', '2013-07-17', 'Tye Keith'),
('ZID73zfDT626O5N', ' Dwarf Of Dusk', ' Dwarf Of Dusk', '2021-01-12', 'Hendrix Morrow');

-- --------------------------------------------------------

--
-- Table structure for table `tb_member`
--

DROP TABLE IF EXISTS `tb_member`;
CREATE TABLE `tb_member` (
  `id_member` varchar(30) NOT NULL,
  `nama_member` varchar(30) NOT NULL,
  `jenis_kelamin` enum('L','P') NOT NULL,
  `nomor_telp` varchar(15) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tb_member`
--

INSERT INTO `tb_member` (`id_member`, `nama_member`, `jenis_kelamin`, `nomor_telp`) VALUES
('1836534sg', 'fakih', 'L', '085324831'),
('1937483grgr', 'fano', 'L', '09862232'),
('1939743fdf', 'hulu', 'L', '023896923'),
('1983659ffdf', 'gundul', 'L', '066244232'),
('1h5agAa7wC', 'shopee', 'P', '625-331-6622'),
('3095jhfwefergr', 'galih', 'L', '0865645623'),
('3286482342', 'aji', 'L', '6544265423'),
('3753nfogrerger', 'mutiah', 'P', '0082543232'),
('3bJUcaimXf', 'Reteng', 'L', '453-26-4826'),
('3bJUcaimXH', 'Ratu', 'P', '453-26-48143'),
('8877H366', 'Irgi', 'L', '09999665544'),
('888ddhhfy6', 'fulul', 'L', '08255443232'),
('8SSR8h1rSI', 'Sinyo', 'L', '826-42-5551'),
('EXyMnLJlVi', 'Gunawan', 'L', '725-36-93636'),
('Fup5NEEFLg', 'lilia', 'P', '118-56-9116'),
('Fup5NEEFLQ', 'Akbar', 'L', '118-56-91638'),
('jKBaUdewES', 'Mahput', 'L', '826-8266-52'),
('JLJC0MCG04', 'Jandha', 'P', '625-725-6666'),
('jsfiafr97if', 'Lukman', 'L', '725-31-9373'),
('jwebg8wy98', 'andrik', 'L', '085426232323'),
('O3W_INmOLC', 'Asih', 'P', '627-07-00704'),
('O3W_INmOLfg', 'Bhinn', 'P', '627-05-92726'),
('QDlKR3OSFp', 'Wakhid', 'L', '726-82627-72'),
('QJnkxgKIXy', 'Alya', 'P', '979-78-31130'),
('r53LhjPhSP', 'Guns', 'L', '926-32-5555'),
('sf7sefsfj', 'rixa', 'P', '2579342434'),
('UhbKdflNCL', 'Irul', 'L', '7262-27-282'),
('y9qBIRMQkS', 'Helka', 'L', '826-157-1972'),
('yytyw566', 'cain', 'L', '09342544323'),
('yyytte556', 'yeti', 'P', '039809824');

-- --------------------------------------------------------

--
-- Table structure for table `tb_peminjaman`
--

DROP TABLE IF EXISTS `tb_peminjaman`;
CREATE TABLE `tb_peminjaman` (
  `id_pinjam` varchar(30) NOT NULL,
  `id_buku` varchar(30) NOT NULL,
  `id_member` varchar(30) NOT NULL,
  `tanggal_pinjam` date NOT NULL,
  `tanggal_pengembalian` date NOT NULL,
  `aksi` varchar(1) NOT NULL DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Triggers `tb_peminjaman`
--
DROP TRIGGER IF EXISTS `pengembalian`;
DELIMITER $$
CREATE TRIGGER `pengembalian` BEFORE DELETE ON `tb_peminjaman` FOR EACH ROW BEGIN
    INSERT INTO tb_pengembalian(id_pinjam, id_buku, id_member, tanggal_pengembalian)
       SELECT 
           OLD.id_pinjam, OLD.id_buku, OLD.id_member, OLD.tanggal_pengembalian;
           END
$$
DELIMITER ;

-- --------------------------------------------------------

--
-- Table structure for table `tb_pengembalian`
--

DROP TABLE IF EXISTS `tb_pengembalian`;
CREATE TABLE `tb_pengembalian` (
  `id_pinjam` varchar(30) NOT NULL,
  `id_buku` varchar(30) NOT NULL,
  `id_member` varchar(30) NOT NULL,
  `tanggal_pengembalian` date NOT NULL,
  `aksi` varchar(1) NOT NULL DEFAULT '1'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tb_pengembalian`
--

INSERT INTO `tb_pengembalian` (`id_pinjam`, `id_buku`, `id_member`, `tanggal_pengembalian`, `aksi`) VALUES
('0161e059dbd0f59', 'IWl5UzqKTge_3bDAPL', '3095jhfwefergr', '2022-01-20', '1');

-- --------------------------------------------------------

--
-- Table structure for table `tb_pinjam`
--

DROP TABLE IF EXISTS `tb_pinjam`;
CREATE TABLE `tb_pinjam` (
  `id_pinjam` varchar(30) NOT NULL,
  `id_buku` varchar(30) NOT NULL,
  `id_member` varchar(30) NOT NULL,
  `tanggal_pinjam` date NOT NULL,
  `tanggal_pengembalian` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tb_pinjam`
--

INSERT INTO `tb_pinjam` (`id_pinjam`, `id_buku`, `id_member`, `tanggal_pinjam`, `tanggal_pengembalian`) VALUES
('0161e01f6dccd29', '13ihu0Uo1gzhvJh', '1836534sg', '2022-01-13', '2022-01-20'),
('0161e02ace971bf', 'OxiFvu66LD9ekB4', '3bJUcaimXf', '2022-01-13', '2022-01-20'),
('0161e03ee56b499', '37xe8B1INhCiCVas', '1h5agAa7wC', '2022-01-13', '2022-01-20'),
('0161e0504533da8', '5ZQNojGxiAhejHf', '1983659ffdf', '2022-01-13', '2022-01-20'),
('0161e059dbd0f59', 'IWl5UzqKTge_3bDAPL', '3095jhfwefergr', '2022-01-13', '2022-01-20');

--
-- Triggers `tb_pinjam`
--
DROP TRIGGER IF EXISTS `pinjam`;
DELIMITER $$
CREATE TRIGGER `pinjam` AFTER INSERT ON `tb_pinjam` FOR EACH ROW BEGIN
INSERT INTO tb_peminjaman
SET id_pinjam=NEW.id_pinjam,
	id_buku=NEW.id_buku,
    id_member=NEW.id_member,
    tanggal_pinjam=NEW.tanggal_pinjam,
    tanggal_pengembalian=NEW.tanggal_pengembalian;
END
$$
DELIMITER ;

--
-- Indexes for dumped tables
--

--
-- Indexes for table `tb_book`
--
ALTER TABLE `tb_book`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tb_member`
--
ALTER TABLE `tb_member`
  ADD PRIMARY KEY (`id_member`);

--
-- Indexes for table `tb_pengembalian`
--
ALTER TABLE `tb_pengembalian`
  ADD PRIMARY KEY (`id_pinjam`);

--
-- Indexes for table `tb_pinjam`
--
ALTER TABLE `tb_pinjam`
  ADD PRIMARY KEY (`id_pinjam`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
