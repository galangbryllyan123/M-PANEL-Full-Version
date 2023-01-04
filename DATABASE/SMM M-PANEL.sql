-- phpMyAdmin SQL Dump
-- version 4.0.10.14
-- http://www.phpmyadmin.net
--
-- Inang: localhost:3306
-- Waktu pembuatan: 23 Sep 2016 pada 06.25
-- Versi Server: 5.6.30
-- Versi PHP: 5.4.31

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Basis data: `mpanel_database`
--

-- --------------------------------------------------------

--
-- Struktur dari tabel `chat`
--

CREATE TABLE IF NOT EXISTS `chat` (
  `id` varchar(5) NOT NULL,
  `nama` varchar(400) NOT NULL,
  `fbid` varchar(400) NOT NULL,
  `pesan` varchar(1000) NOT NULL,
  `tanggal` datetime NOT NULL,
  UNIQUE KEY `id` (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Struktur dari tabel `historyall`
--

CREATE TABLE IF NOT EXISTS `historyall` (
  `id` int(10) NOT NULL AUTO_INCREMENT,
  `no` varchar(100) COLLATE utf8_swedish_ci NOT NULL,
  `pembeli` varchar(100) COLLATE utf8_swedish_ci NOT NULL,
  `barang` varchar(100) COLLATE utf8_swedish_ci NOT NULL,
  `harga` varchar(100) COLLATE utf8_swedish_ci NOT NULL,
  `status` enum('Sukses','Belum','Gagal') COLLATE utf8_swedish_ci NOT NULL,
  `data` varchar(1000) COLLATE utf8_swedish_ci NOT NULL,
  `tanggal` date NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 COLLATE=utf8_swedish_ci AUTO_INCREMENT=107 ;

-- --------------------------------------------------------

--
-- Struktur dari tabel `stockcash`
--

CREATE TABLE IF NOT EXISTS `stockcash` (
  `id` int(10) NOT NULL AUTO_INCREMENT,
  `jenis` enum('Gemscool Cash','SHELL','MI Cash','Lyto Cash','Digicash','NC') COLLATE utf8_swedish_ci NOT NULL,
  `isi` varchar(100) COLLATE utf8_swedish_ci NOT NULL,
  `harga` varchar(100) COLLATE utf8_swedish_ci NOT NULL,
  `kodecash` varchar(100) COLLATE utf8_swedish_ci NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 COLLATE=utf8_swedish_ci AUTO_INCREMENT=15 ;

--
-- Dumping data untuk tabel `stockcash`
--

INSERT INTO `stockcash` (`id`, `jenis`, `isi`, `harga`, `kodecash`) VALUES
(10, 'Gemscool Cash', '1000', '12000', '11233-12323-12345-12345'),
(9, 'Gemscool Cash', '2000', '24000', '2132-12321-2432-4324dsf'),
(11, 'Gemscool Cash', '10000', '12000', 'Cumapercobaan'),
(12, 'Gemscool Cash', '1000', '12.000', 'Test-ajaya-fuxk-anjiay'),
(13, 'Gemscool Cash', '10', 'test', '134'),
(14, 'Gemscool Cash', '123', '12', '123');

-- --------------------------------------------------------

--
-- Struktur dari tabel `user`
--

CREATE TABLE IF NOT EXISTS `user` (
  `id` int(10) NOT NULL AUTO_INCREMENT,
  `fbid` varchar(100) COLLATE utf8_swedish_ci NOT NULL,
  `username` varchar(100) COLLATE utf8_swedish_ci NOT NULL,
  `password` varchar(100) COLLATE utf8_swedish_ci NOT NULL,
  `nama` varchar(100) COLLATE utf8_swedish_ci NOT NULL,
  `level` enum('Admin','Reseller','Member') COLLATE utf8_swedish_ci NOT NULL,
  `saldo` varchar(100) COLLATE utf8_swedish_ci NOT NULL,
  `uplink` varchar(100) COLLATE utf8_swedish_ci NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 COLLATE=utf8_swedish_ci AUTO_INCREMENT=1000001 ;

--
-- Dumping data untuk tabel `user`
--

INSERT INTO `user` (`id`, `fbid`, `username`, `password`, `nama`, `level`, `saldo`, `uplink`) VALUES
(1, '100002149510490', 'renardo', 'semvak110302', 'Renardo Eka Saputra', 'Admin', '200000000000', 'Server'),
(1000000, '0', 'demo', 'demo', 'Demo', 'Member', '0', 'Server');

-- --------------------------------------------------------

--
-- Struktur dari tabel `vouchersaldo`
--

CREATE TABLE IF NOT EXISTS `vouchersaldo` (
  `id` varchar(11) NOT NULL,
  `isi` varchar(11) NOT NULL,
  `kode` varchar(11) NOT NULL,
  KEY `Id` (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

--
-- Dumping data untuk tabel `vouchersaldo`
--

INSERT INTO `vouchersaldo` (`id`, `isi`, `kode`) VALUES
('', 'Mau Bug Yaa', '123'),
('', '1000', '2345'),
('', '1000', '6777'),
('', '1000000', '1234'),
('', '1000000', '12345'),
('', '1000000', '123456'),
('', '1000', '12'),
('', '10000', 'NINE-H4TR-H'),
('', '10000', 'NINE-H4TR-H'),
('', '10000', 'NINE-H4TR-H'),
('', '10000', 'NINE-H4TR-H'),
('', '100', '1');

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
