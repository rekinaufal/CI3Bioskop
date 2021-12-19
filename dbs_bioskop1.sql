-- phpMyAdmin SQL Dump
-- version 4.8.5
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Waktu pembuatan: 19 Des 2021 pada 06.15
-- Versi server: 10.1.38-MariaDB
-- Versi PHP: 7.3.2

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `dbs_bioskop1`
--

-- --------------------------------------------------------

--
-- Stand-in struktur untuk tampilan `qw_filmbelitayang1`
-- (Lihat di bawah untuk tampilan aktual)
--
CREATE TABLE `qw_filmbelitayang1` (
`kd_tayang` int(11)
,`judul_film` varchar(25)
,`nama_studio` varchar(25)
,`harga` int(25)
,`hari` varchar(10)
,`keterangan` int(2)
,`tanggal_tayang` date
,`jam_tayang` varchar(50)
,`status_tayang` int(2)
,`status_tampil` int(2)
);

-- --------------------------------------------------------

--
-- Struktur dari tabel `tbl_film`
--

CREATE TABLE `tbl_film` (
  `kd_film` int(11) NOT NULL,
  `judul_film` varchar(25) NOT NULL,
  `jenis_film` varchar(25) NOT NULL,
  `sutradara` varchar(25) NOT NULL,
  `gambar` text NOT NULL,
  `status_film` int(1) NOT NULL,
  `status_tampil` int(2) NOT NULL,
  `tanggal_delete` date NOT NULL,
  `user` varchar(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `tbl_film`
--

INSERT INTO `tbl_film` (`kd_film`, `judul_film`, `jenis_film`, `sutradara`, `gambar`, `status_film`, `status_tampil`, `tanggal_delete`, `user`) VALUES
(1, 'Malin kundang', 'Mitos', 'jarwan', '01.jpg', 1, 0, '0000-00-00', ''),
(2, 'happiness', 'Action', 'Irwan irawan', 'Screenshot_(230)1.png', 1, 0, '0000-00-00', ''),
(3, 'Dua Garis Biru', 'Romance', 'Irwan irawan', 'Screenshot_(267).png', 1, 0, '0000-00-00', ''),
(4, 'jaguar', 'kartunn', 'iwa', '02.jpg', 1, 0, '0000-00-00', '');

-- --------------------------------------------------------

--
-- Struktur dari tabel `tbl_haksiar`
--

CREATE TABLE `tbl_haksiar` (
  `kd_haksiar` int(5) NOT NULL,
  `kd_film` int(5) NOT NULL,
  `harga_beli` int(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Struktur dari tabel `tbl_harga`
--

CREATE TABLE `tbl_harga` (
  `kd_harga` int(11) NOT NULL,
  `kd_film` int(25) NOT NULL,
  `harga` int(25) NOT NULL,
  `hari` varchar(10) NOT NULL,
  `keterangan` int(2) NOT NULL,
  `status_tampil` int(2) NOT NULL,
  `tanggal_delete` date NOT NULL,
  `user` varchar(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `tbl_harga`
--

INSERT INTO `tbl_harga` (`kd_harga`, `kd_film`, `harga`, `hari`, `keterangan`, `status_tampil`, `tanggal_delete`, `user`) VALUES
(1, 1, 40000, 'Senin', 1, 0, '0000-00-00', ''),
(2, 3, 50000, 'Sabtu', 0, 0, '0000-00-00', ''),
(3, 3, 50000, 'Kamis', 1, 0, '0000-00-00', ''),
(4, 4, 50000, 'Senin', 1, 0, '0000-00-00', '');

-- --------------------------------------------------------

--
-- Struktur dari tabel `tbl_kursi`
--

CREATE TABLE `tbl_kursi` (
  `kd_kursi` int(11) NOT NULL,
  `kd_tayang` int(5) NOT NULL,
  `no_kursi` varchar(5) NOT NULL,
  `status_kursi` int(2) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `tbl_kursi`
--

INSERT INTO `tbl_kursi` (`kd_kursi`, `kd_tayang`, `no_kursi`, `status_kursi`) VALUES
(1, 1, 'A1', 1),
(2, 1, 'A2', 1),
(3, 1, 'A3', 0),
(4, 1, 'A4', 0),
(5, 1, 'A5', 0),
(6, 1, 'A6', 0),
(7, 1, 'A7', 0),
(8, 1, 'A8', 0),
(9, 1, 'A9', 0),
(10, 1, 'A10', 0),
(11, 1, 'B1', 0),
(12, 1, 'B2', 0),
(13, 1, 'B3', 0),
(14, 1, 'B4', 0),
(15, 1, 'B5', 0),
(16, 1, 'B6', 0),
(17, 1, 'B7', 0),
(18, 1, 'B8', 0),
(19, 1, 'B9', 0),
(20, 1, 'B10', 0),
(21, 1, 'C1', 0),
(22, 1, 'C2', 0),
(23, 1, 'C3', 0),
(24, 1, 'C4', 0),
(25, 1, 'C5', 0),
(26, 1, 'C6', 0),
(27, 1, 'C7', 0),
(28, 1, 'C8', 0),
(29, 1, 'C9', 0),
(30, 1, 'C10', 0),
(31, 1, 'D1', 0),
(32, 1, 'D2', 0),
(33, 1, 'D3', 0),
(34, 1, 'D4', 0),
(35, 1, 'D5', 0),
(36, 1, 'D6', 0),
(37, 1, 'D7', 0),
(38, 1, 'D8', 0),
(39, 1, 'D9', 0),
(40, 1, 'D10', 0),
(41, 2, 'A1', 0),
(42, 2, 'A2', 0),
(43, 2, 'A3', 0),
(44, 2, 'A4', 0),
(45, 2, 'A5', 0),
(46, 2, 'A6', 0),
(47, 2, 'A7', 0),
(48, 2, 'A8', 0),
(49, 2, 'A9', 0),
(50, 2, 'A10', 0),
(51, 2, 'B1', 0),
(52, 2, 'B2', 0),
(53, 2, 'B3', 0),
(54, 2, 'B4', 0),
(55, 2, 'B5', 0),
(56, 2, 'B6', 0),
(57, 2, 'B7', 0),
(58, 2, 'B8', 0),
(59, 2, 'B9', 0),
(60, 2, 'B10', 0),
(61, 2, 'C1', 0),
(62, 2, 'C2', 0),
(63, 2, 'C3', 0),
(64, 2, 'C4', 0),
(65, 2, 'C5', 0),
(66, 2, 'C6', 0),
(67, 2, 'C7', 0),
(68, 2, 'C8', 0),
(69, 2, 'C9', 0),
(70, 2, 'C10', 0),
(71, 2, 'D1', 0),
(72, 2, 'D2', 0),
(73, 2, 'D3', 0),
(74, 2, 'D4', 0),
(75, 2, 'D5', 0),
(76, 2, 'D6', 0),
(77, 2, 'D7', 0),
(78, 2, 'D8', 0),
(79, 2, 'D9', 0),
(80, 2, 'D10', 0);

-- --------------------------------------------------------

--
-- Struktur dari tabel `tbl_pembelian`
--

CREATE TABLE `tbl_pembelian` (
  `kd_pembelian` int(11) NOT NULL,
  `kd_tayang` int(11) NOT NULL,
  `harga` int(11) NOT NULL,
  `pilih_kursi` varchar(11) NOT NULL,
  `jumlah_kursi` int(2) NOT NULL,
  `tanggal_beli` date NOT NULL,
  `total` int(11) NOT NULL,
  `bayar` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `tbl_pembelian`
--

INSERT INTO `tbl_pembelian` (`kd_pembelian`, `kd_tayang`, `harga`, `pilih_kursi`, `jumlah_kursi`, `tanggal_beli`, `total`, `bayar`) VALUES
(1, 1, 40000, 'A1,A2', 2, '2019-08-02', 80000, 100000);

-- --------------------------------------------------------

--
-- Struktur dari tabel `tbl_studio`
--

CREATE TABLE `tbl_studio` (
  `kd_studio` int(11) NOT NULL,
  `nama_studio` varchar(25) NOT NULL,
  `status_tampil` int(2) NOT NULL,
  `tanggal_delete` date NOT NULL,
  `user` varchar(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `tbl_studio`
--

INSERT INTO `tbl_studio` (`kd_studio`, `nama_studio`, `status_tampil`, `tanggal_delete`, `user`) VALUES
(1, 'Studio 1', 0, '2019-07-29', 'admin'),
(2, 'Studio 2', 0, '2019-07-29', 'admin'),
(3, 'Studio 3', 0, '0000-00-00', ''),
(4, 'Studio 4', 0, '0000-00-00', '');

-- --------------------------------------------------------

--
-- Struktur dari tabel `tbl_tayang`
--

CREATE TABLE `tbl_tayang` (
  `kd_tayang` int(11) NOT NULL,
  `kd_film` int(5) NOT NULL,
  `kd_studio` int(5) NOT NULL,
  `tanggal_tayang` date NOT NULL,
  `jam_tayang` varchar(50) NOT NULL,
  `status_tayang` int(2) NOT NULL,
  `status_tampil` int(2) NOT NULL,
  `status_delete` int(2) NOT NULL,
  `tanggal_delete` date NOT NULL,
  `user` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `tbl_tayang`
--

INSERT INTO `tbl_tayang` (`kd_tayang`, `kd_film`, `kd_studio`, `tanggal_tayang`, `jam_tayang`, `status_tayang`, `status_tampil`, `status_delete`, `tanggal_delete`, `user`) VALUES
(1, 1, 1, '2019-08-02', '12:12', 1, 0, 0, '0000-00-00', ''),
(2, 2, 1, '2019-08-02', '12:12', 1, 0, 0, '0000-00-00', '');

--
-- Trigger `tbl_tayang`
--
DELIMITER $$
CREATE TRIGGER `trigger_kursi` AFTER INSERT ON `tbl_tayang` FOR EACH ROW BEGIN
	INSERT INTO tbl_kursi VALUE('',new.kd_tayang,'A1','0');
	INSERT INTO tbl_kursi VALUE('',new.kd_tayang,'A2','0');
	INSERT INTO tbl_kursi VALUE('',new.kd_tayang,'A3','0');
	INSERT INTO tbl_kursi VALUE('',new.kd_tayang,'A4','0');
	INSERT INTO tbl_kursi VALUE('',new.kd_tayang,'A5','0');
	INSERT INTO tbl_kursi VALUE('',new.kd_tayang,'A6','0');
	INSERT INTO tbl_kursi VALUE('',new.kd_tayang,'A7','0');
	INSERT INTO tbl_kursi VALUE('',new.kd_tayang,'A8','0');
	INSERT INTO tbl_kursi VALUE('',new.kd_tayang,'A9','0');
	INSERT INTO tbl_kursi VALUE('',new.kd_tayang,'A10','0');

	INSERT INTO tbl_kursi VALUE('',new.kd_tayang,'B1','0');
	INSERT INTO tbl_kursi VALUE('',new.kd_tayang,'B2','0');
	INSERT INTO tbl_kursi VALUE('',new.kd_tayang,'B3','0');
	INSERT INTO tbl_kursi VALUE('',new.kd_tayang,'B4','0');
	INSERT INTO tbl_kursi VALUE('',new.kd_tayang,'B5','0');
	INSERT INTO tbl_kursi VALUE('',new.kd_tayang,'B6','0');
	INSERT INTO tbl_kursi VALUE('',new.kd_tayang,'B7','0');
	INSERT INTO tbl_kursi VALUE('',new.kd_tayang,'B8','0');
	INSERT INTO tbl_kursi VALUE('',new.kd_tayang,'B9','0');
	INSERT INTO tbl_kursi VALUE('',new.kd_tayang,'B10','0');

	INSERT INTO tbl_kursi VALUE('',new.kd_tayang,'C1','0');
	INSERT INTO tbl_kursi VALUE('',new.kd_tayang,'C2','0');
	INSERT INTO tbl_kursi VALUE('',new.kd_tayang,'C3','0');
	INSERT INTO tbl_kursi VALUE('',new.kd_tayang,'C4','0');
	INSERT INTO tbl_kursi VALUE('',new.kd_tayang,'C5','0');
	INSERT INTO tbl_kursi VALUE('',new.kd_tayang,'C6','0');
	INSERT INTO tbl_kursi VALUE('',new.kd_tayang,'C7','0');
	INSERT INTO tbl_kursi VALUE('',new.kd_tayang,'C8','0');
	INSERT INTO tbl_kursi VALUE('',new.kd_tayang,'C9','0');
	INSERT INTO tbl_kursi VALUE('',new.kd_tayang,'C10','0');

	INSERT INTO tbl_kursi VALUE('',new.kd_tayang,'D1','0');
	INSERT INTO tbl_kursi VALUE('',new.kd_tayang,'D2','0');
	INSERT INTO tbl_kursi VALUE('',new.kd_tayang,'D3','0');
	INSERT INTO tbl_kursi VALUE('',new.kd_tayang,'D4','0');
	INSERT INTO tbl_kursi VALUE('',new.kd_tayang,'D5','0');
	INSERT INTO tbl_kursi VALUE('',new.kd_tayang,'D6','0');
	INSERT INTO tbl_kursi VALUE('',new.kd_tayang,'D7','0');
	INSERT INTO tbl_kursi VALUE('',new.kd_tayang,'D8','0');
	INSERT INTO tbl_kursi VALUE('',new.kd_tayang,'D9','0');
	INSERT INTO tbl_kursi VALUE('',new.kd_tayang,'D10','0');
    END
$$
DELIMITER ;

-- --------------------------------------------------------

--
-- Struktur dari tabel `tbl_user`
--

CREATE TABLE `tbl_user` (
  `kd_user` int(11) NOT NULL,
  `username` varchar(25) NOT NULL,
  `password` varchar(255) NOT NULL,
  `hak_akses` varchar(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `tbl_user`
--

INSERT INTO `tbl_user` (`kd_user`, `username`, `password`, `hak_akses`) VALUES
(1, 'admin', '21232f297a57a5a743894a0e4a801fc3', 'Admin'),
(2, 'kasir', 'c7911af3adbd12a035b289556d96470a', 'Kasir'),
(3, 'gudang', '202446dd1d6028084426867365b0c7a1', 'Gudang');

-- --------------------------------------------------------

--
-- Struktur untuk view `qw_filmbelitayang1`
--
DROP TABLE IF EXISTS `qw_filmbelitayang1`;

CREATE ALGORITHM=UNDEFINED DEFINER=`root`@`localhost` SQL SECURITY DEFINER VIEW `qw_filmbelitayang1`  AS  select `tbl_tayang`.`kd_tayang` AS `kd_tayang`,`tbl_film`.`judul_film` AS `judul_film`,`tbl_studio`.`nama_studio` AS `nama_studio`,`tbl_harga`.`harga` AS `harga`,`tbl_harga`.`hari` AS `hari`,`tbl_harga`.`keterangan` AS `keterangan`,`tbl_tayang`.`tanggal_tayang` AS `tanggal_tayang`,`tbl_tayang`.`jam_tayang` AS `jam_tayang`,`tbl_tayang`.`status_tayang` AS `status_tayang`,`tbl_tayang`.`status_tampil` AS `status_tampil` from (((`tbl_film` join `tbl_tayang` on((`tbl_tayang`.`kd_film` = `tbl_film`.`kd_film`))) join `tbl_harga` on((`tbl_harga`.`kd_film` = `tbl_film`.`kd_film`))) join `tbl_studio` on((`tbl_studio`.`kd_studio` = `tbl_tayang`.`kd_studio`))) ;

--
-- Indexes for dumped tables
--

--
-- Indeks untuk tabel `tbl_film`
--
ALTER TABLE `tbl_film`
  ADD PRIMARY KEY (`kd_film`);

--
-- Indeks untuk tabel `tbl_harga`
--
ALTER TABLE `tbl_harga`
  ADD PRIMARY KEY (`kd_harga`);

--
-- Indeks untuk tabel `tbl_kursi`
--
ALTER TABLE `tbl_kursi`
  ADD PRIMARY KEY (`kd_kursi`);

--
-- Indeks untuk tabel `tbl_pembelian`
--
ALTER TABLE `tbl_pembelian`
  ADD PRIMARY KEY (`kd_pembelian`);

--
-- Indeks untuk tabel `tbl_studio`
--
ALTER TABLE `tbl_studio`
  ADD PRIMARY KEY (`kd_studio`);

--
-- Indeks untuk tabel `tbl_tayang`
--
ALTER TABLE `tbl_tayang`
  ADD PRIMARY KEY (`kd_tayang`);

--
-- Indeks untuk tabel `tbl_user`
--
ALTER TABLE `tbl_user`
  ADD PRIMARY KEY (`kd_user`);

--
-- AUTO_INCREMENT untuk tabel yang dibuang
--

--
-- AUTO_INCREMENT untuk tabel `tbl_film`
--
ALTER TABLE `tbl_film`
  MODIFY `kd_film` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT untuk tabel `tbl_harga`
--
ALTER TABLE `tbl_harga`
  MODIFY `kd_harga` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT untuk tabel `tbl_kursi`
--
ALTER TABLE `tbl_kursi`
  MODIFY `kd_kursi` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=81;

--
-- AUTO_INCREMENT untuk tabel `tbl_pembelian`
--
ALTER TABLE `tbl_pembelian`
  MODIFY `kd_pembelian` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT untuk tabel `tbl_studio`
--
ALTER TABLE `tbl_studio`
  MODIFY `kd_studio` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT untuk tabel `tbl_tayang`
--
ALTER TABLE `tbl_tayang`
  MODIFY `kd_tayang` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT untuk tabel `tbl_user`
--
ALTER TABLE `tbl_user`
  MODIFY `kd_user` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
