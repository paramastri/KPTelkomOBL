-- phpMyAdmin SQL Dump
-- version 4.8.3
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Waktu pembuatan: 20 Jan 2020 pada 09.21
-- Versi server: 10.1.36-MariaDB
-- Versi PHP: 7.2.11

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `kptelkomobl`
--

-- --------------------------------------------------------

--
-- Struktur dari tabel `admin`
--

CREATE TABLE `admin` (
  `id` int(11) NOT NULL,
  `username` varchar(225) DEFAULT NULL,
  `password` varchar(225) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Potong tabel sebelum dimasukkan `admin`
--

TRUNCATE TABLE `admin`;
-- --------------------------------------------------------

--
-- Struktur dari tabel `file`
--

CREATE TABLE `file` (
  `id` int(11) NOT NULL,
  `id_obl` int(11) NOT NULL,
  `id_tipe` int(11) DEFAULT NULL,
  `file` varchar(225) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Potong tabel sebelum dimasukkan `file`
--

TRUNCATE TABLE `file`;
--
-- Dumping data untuk tabel `file`
--

INSERT DELAYED IGNORE INTO `file` (`id`, `id_obl`, `id_tipe`, `file`) VALUES
(1, 8, 1, NULL),
(2, 8, 1, NULL),
(3, 8, 1, NULL),
(4, 8, 1, NULL),
(5, 8, 1, NULL),
(6, 8, 1, NULL),
(7, 8, 1, NULL),
(8, 8, 1, NULL),
(9, 8, 1, NULL),
(10, 8, 1, NULL),
(11, 8, 1, NULL),
(12, 8, 1, NULL),
(13, 8, 1, NULL),
(14, 8, 1, NULL),
(15, 9, 1, NULL),
(16, 9, 1, NULL),
(17, 9, 1, NULL),
(18, 10, 1, 'kala-p1.pdf'),
(19, 10, 1, 'kala-p1-pdf'),
(20, 11, 1, 'lutfi-p1-pdf'),
(21, 12, 1, 'yanti-p1.pdf'),
(22, 13, 1, 'kadrun.pdf'),
(23, 14, 1, 'klk.pdf'),
(24, 15, 1, 'sama.pdf'),
(25, 16, 1, 'namaku.pdf'),
(26, 17, 1, 'kakala-p1.pdf'),
(27, 18, 1, 'kala-p1.docx'),
(28, 19, 1, 'mama-p1.pdf'),
(29, 20, 1, 'a-p0.pdf'),
(30, 21, 1, 'b-p0.pdf'),
(31, 22, 1, 'c-p0.pdf'),
(32, 23, 1, 'd-p0.pdf'),
(33, 24, 1, 'f-p0.pdf'),
(34, 23, 1, 'd-p0.pdf'),
(35, 25, 1, 'g-p0.pdf'),
(36, 25, 1, 'g-p0.pdf'),
(37, 25, 1, 'g-p1.'),
(38, 25, 1, 'g-p1.'),
(39, 25, 1, 'g-p1.'),
(40, 25, 1, 'g-p1.'),
(41, 25, 1, 'g-p1.'),
(42, 26, 2, 'g-p1.'),
(43, 26, 1, 'g-p0.pdf'),
(44, 27, 2, 'i-p1.pdf'),
(45, 27, 3, 'i-p6.pdf'),
(46, 27, 4, 'i-p8.pdf'),
(47, 27, 5, 'i-kl.pdf'),
(48, 27, 6, 'i-bast.pdf'),
(49, 28, 1, 'j-p0.pdf'),
(50, 28, 2, 'j-p1.pdf'),
(51, 28, 3, 'j-p6.pdf'),
(52, 28, 4, 'j-p8.pdf'),
(53, 28, 5, 'j-kl.pdf'),
(54, 28, 6, 'j-bast.pdf');

-- --------------------------------------------------------

--
-- Struktur dari tabel `keterangan`
--

CREATE TABLE `keterangan` (
  `id` int(11) NOT NULL,
  `id_obl` int(11) DEFAULT NULL,
  `id_tipe` int(11) DEFAULT NULL,
  `keterangan` varchar(1000) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Potong tabel sebelum dimasukkan `keterangan`
--

TRUNCATE TABLE `keterangan`;
--
-- Dumping data untuk tabel `keterangan`
--

INSERT DELAYED IGNORE INTO `keterangan` (`id`, `id_obl`, `id_tipe`, `keterangan`) VALUES
(3, 8, 1, 'belum benar'),
(4, 8, 1, 'jk'),
(5, 8, 1, 'z'),
(6, 8, 1, 's'),
(7, 8, 1, 's'),
(8, 8, 1, 's'),
(9, 8, 1, 's'),
(10, 8, 1, 's'),
(11, 8, 1, 'sz'),
(12, 8, 1, 'sz'),
(13, 8, 1, 'sz'),
(14, 8, 1, 'sz'),
(15, 8, 1, 'sz'),
(16, 8, 1, 'sz'),
(17, 8, 1, 'sz'),
(18, 8, 1, 'szjj'),
(19, 9, 1, 'kakakak'),
(20, 9, 1, 'kakakak'),
(21, 9, 1, 'kakakak'),
(22, 9, 1, 'kakakak'),
(23, 10, 1, 'jmdj'),
(24, 10, 1, 'jmdj'),
(25, 11, 1, 'lkllk'),
(26, 12, 1, 'hjdchdjs'),
(27, 13, 1, 'jdkje'),
(28, 14, 1, 'kjd'),
(29, 15, 1, 'mm'),
(30, 16, 1, 'jdkfj'),
(31, 17, 1, 'hjfsm'),
(32, 18, 1, 'ksksk'),
(33, 19, 1, 'kakak'),
(34, 19, 1, 'kk'),
(35, 20, 1, 'klk'),
(36, 21, 1, 'dokum p0'),
(37, 22, 1, 'kaka'),
(38, 23, 1, 'kaka'),
(39, 23, 2, 'kakak'),
(40, 24, 1, 'ini p0'),
(41, 24, 2, 'ini p1'),
(42, 23, 2, 'kaka'),
(43, 23, 2, 'ini p1'),
(44, 24, 2, 'ini p1'),
(45, 23, 1, 'ini p0'),
(46, 25, 1, 'dok p0'),
(47, 25, 1, 'ini p0'),
(48, 25, 2, 'ini p1'),
(49, 25, 2, 'ini p1'),
(50, 25, 2, 'ini p1 ya'),
(51, 25, 2, 'ini p1'),
(52, 25, 2, 'p1'),
(53, 25, 2, 'p1'),
(54, 25, 2, 'p1'),
(55, 25, 2, 'kkkk'),
(56, 25, 2, 'kkkk'),
(57, 25, 2, 'kkkk'),
(58, 25, 2, 'kkkk'),
(59, 25, 2, 'kakak'),
(60, 25, 2, 'ini p1 ya'),
(61, 26, 2, 'ini p1 lho'),
(62, 26, 1, 'ini p0'),
(63, 27, 2, 'ini p1'),
(64, 27, 2, 'ini p1'),
(65, 27, 2, 'ini p1'),
(66, 27, 3, 'ini p6'),
(67, 27, 6, 'yuhuu'),
(68, 28, 1, 'ini j p0'),
(69, 28, 2, 'ini j p1'),
(70, 28, 3, 'ini j p6'),
(71, 28, 4, 'ini j p8'),
(72, 28, 6, 'ini j bast');

-- --------------------------------------------------------

--
-- Struktur dari tabel `obl`
--

CREATE TABLE `obl` (
  `id` int(11) NOT NULL,
  `nama_cc` varchar(225) DEFAULT NULL,
  `nama_mitra` varchar(225) DEFAULT NULL,
  `nama_pekerjaan` varchar(225) DEFAULT NULL,
  `pic_mitra` varchar(225) DEFAULT NULL,
  `p0` int(11) DEFAULT NULL,
  `p1` int(11) DEFAULT NULL,
  `p6` int(11) DEFAULT NULL,
  `p8` int(11) DEFAULT NULL,
  `kl` int(11) DEFAULT NULL,
  `bast` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Potong tabel sebelum dimasukkan `obl`
--

TRUNCATE TABLE `obl`;
--
-- Dumping data untuk tabel `obl`
--

INSERT DELAYED IGNORE INTO `obl` (`id`, `nama_cc`, `nama_mitra`, `nama_pekerjaan`, `pic_mitra`, `p0`, `p1`, `p6`, `p8`, `kl`, `bast`) VALUES
(8, 'lutfi', 'yanti', 'lut', 'yt', 1, NULL, NULL, NULL, NULL, NULL),
(9, 'aaa', 'bbb', 'ccc', 'ddd', 2, NULL, NULL, NULL, NULL, NULL),
(10, 'kala', 'itu', 'bersama', 'family', 1, NULL, NULL, NULL, NULL, NULL),
(11, 'lutfi', 'kak', 'lllx', 'hdjsh', 2, NULL, NULL, NULL, NULL, NULL),
(12, 'yanti', 'klk', 'jkdsfj', 'hjdsk', 2, NULL, NULL, NULL, NULL, NULL),
(13, 'kadrun', 'bbb', 'ccc', 'ddd', 1, NULL, NULL, NULL, NULL, NULL),
(14, 'klk', 'jdsj', 'hjedj', 'jhdsf', 2, NULL, NULL, NULL, NULL, NULL),
(15, 'sama', 'jkc', 'knmdc', 'ncds', 1, NULL, NULL, NULL, NULL, NULL),
(16, 'namaku', 'siapa', 'ya', 'oalah', 2, NULL, NULL, NULL, NULL, NULL),
(17, 'kakala', 'hdsfjs', 'jhf', 'bfn', 2, NULL, NULL, NULL, NULL, NULL),
(18, 'kala', 'jhvf', 'hjd', 'gdfh', 0, NULL, NULL, NULL, NULL, NULL),
(19, 'mama', 'kaka', 'dede', 'papa', 1, NULL, NULL, NULL, NULL, NULL),
(20, 'a', 'b', 'c', 'd', 0, NULL, NULL, NULL, NULL, NULL),
(21, 'b', 'c', 'd', 'e', 1, NULL, NULL, NULL, NULL, NULL),
(22, 'c', 'd', 'e', 'k', 1, NULL, NULL, NULL, NULL, NULL),
(23, 'd', 'e', 'f', 'g', 2, 2, NULL, NULL, NULL, NULL),
(24, 'f', 'g', 'h', 'i', 2, 1, NULL, NULL, NULL, NULL),
(25, 'g', 'h', 'i', 'j', 2, 2, NULL, NULL, NULL, NULL),
(26, 'g', 'h', 'i', 'j', 1, 2, NULL, NULL, NULL, NULL),
(27, 'i', 'j', 'k', 'l', NULL, 1, 1, 0, 0, 1),
(28, 'j', 'k', 'l', 'm', 1, 1, 1, 1, 0, 1);

-- --------------------------------------------------------

--
-- Struktur dari tabel `tipe`
--

CREATE TABLE `tipe` (
  `id` int(11) NOT NULL,
  `nama_tipe` varchar(225) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Potong tabel sebelum dimasukkan `tipe`
--

TRUNCATE TABLE `tipe`;
--
-- Dumping data untuk tabel `tipe`
--

INSERT DELAYED IGNORE INTO `tipe` (`id`, `nama_tipe`) VALUES
(1, 'p0'),
(2, 'p1'),
(3, 'p6'),
(4, 'p8'),
(5, 'kl'),
(6, 'bast');

-- --------------------------------------------------------

--
-- Struktur dari tabel `user`
--

CREATE TABLE `user` (
  `id` int(11) NOT NULL,
  `username` varchar(225) DEFAULT NULL,
  `password` varchar(225) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Potong tabel sebelum dimasukkan `user`
--

TRUNCATE TABLE `user`;
--
-- Dumping data untuk tabel `user`
--

INSERT DELAYED IGNORE INTO `user` (`id`, `username`, `password`) VALUES
(1, 'lutfi', '$2y$12$V0hNKzVUK0R3Q2RtN0UyKujJkZC2QRmc8nYxFFhqtPr..MlbSDeS6');

--
-- Indexes for dumped tables
--

--
-- Indeks untuk tabel `admin`
--
ALTER TABLE `admin`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `file`
--
ALTER TABLE `file`
  ADD PRIMARY KEY (`id`),
  ADD KEY `id_obl` (`id_obl`),
  ADD KEY `id_tipe` (`id_tipe`);

--
-- Indeks untuk tabel `keterangan`
--
ALTER TABLE `keterangan`
  ADD PRIMARY KEY (`id`),
  ADD KEY `id_obl` (`id_obl`),
  ADD KEY `id_tipe` (`id_tipe`);

--
-- Indeks untuk tabel `obl`
--
ALTER TABLE `obl`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `tipe`
--
ALTER TABLE `tipe`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT untuk tabel yang dibuang
--

--
-- AUTO_INCREMENT untuk tabel `admin`
--
ALTER TABLE `admin`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT untuk tabel `file`
--
ALTER TABLE `file`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=55;

--
-- AUTO_INCREMENT untuk tabel `keterangan`
--
ALTER TABLE `keterangan`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=73;

--
-- AUTO_INCREMENT untuk tabel `obl`
--
ALTER TABLE `obl`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=29;

--
-- AUTO_INCREMENT untuk tabel `tipe`
--
ALTER TABLE `tipe`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT untuk tabel `user`
--
ALTER TABLE `user`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- Ketidakleluasaan untuk tabel pelimpahan (Dumped Tables)
--

--
-- Ketidakleluasaan untuk tabel `file`
--
ALTER TABLE `file`
  ADD CONSTRAINT `file_ibfk_1` FOREIGN KEY (`id_obl`) REFERENCES `obl` (`id`),
  ADD CONSTRAINT `file_ibfk_2` FOREIGN KEY (`id_tipe`) REFERENCES `tipe` (`id`);

--
-- Ketidakleluasaan untuk tabel `keterangan`
--
ALTER TABLE `keterangan`
  ADD CONSTRAINT `keterangan_ibfk_1` FOREIGN KEY (`id_obl`) REFERENCES `obl` (`id`),
  ADD CONSTRAINT `keterangan_ibfk_2` FOREIGN KEY (`id_tipe`) REFERENCES `tipe` (`id`),
  ADD CONSTRAINT `keterangan_ibfk_3` FOREIGN KEY (`id_obl`) REFERENCES `obl` (`id`),
  ADD CONSTRAINT `keterangan_ibfk_4` FOREIGN KEY (`id_tipe`) REFERENCES `tipe` (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
