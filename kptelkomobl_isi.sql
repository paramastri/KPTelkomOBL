-- phpMyAdmin SQL Dump
-- version 4.7.4
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jan 21, 2020 at 10:29 AM
-- Server version: 10.1.30-MariaDB
-- PHP Version: 7.2.1

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
-- Table structure for table `admin`
--

CREATE TABLE `admin` (
  `id` int(11) NOT NULL,
  `username` varchar(225) DEFAULT NULL,
  `password` varchar(225) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `file`
--

CREATE TABLE `file` (
  `id` int(11) NOT NULL,
  `id_obl` int(11) NOT NULL,
  `id_tipe` int(11) DEFAULT NULL,
  `file` varchar(225) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `file`
--

INSERT INTO `file` (`id`, `id_obl`, `id_tipe`, `file`) VALUES
(1, 1, 1, 'cc-p0.pdf');

-- --------------------------------------------------------

--
-- Table structure for table `keterangan`
--

CREATE TABLE `keterangan` (
  `id` int(11) NOT NULL,
  `id_obl` int(11) DEFAULT NULL,
  `id_tipe` int(11) DEFAULT NULL,
  `keterangan` varchar(1000) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `keterangan`
--

INSERT INTO `keterangan` (`id`, `id_obl`, `id_tipe`, `keterangan`) VALUES
(1, 1, 1, 'keterangan edit');

-- --------------------------------------------------------

--
-- Table structure for table `obl`
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
-- Dumping data for table `obl`
--

INSERT INTO `obl` (`id`, `nama_cc`, `nama_mitra`, `nama_pekerjaan`, `pic_mitra`, `p0`, `p1`, `p6`, `p8`, `kl`, `bast`) VALUES
(1, 'cc', 'mitra', 'pekerjaan', 'pic', 0, NULL, NULL, NULL, NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `tipe`
--

CREATE TABLE `tipe` (
  `id` int(11) NOT NULL,
  `nama_tipe` varchar(225) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tipe`
--

INSERT INTO `tipe` (`id`, `nama_tipe`) VALUES
(1, 'p0'),
(2, 'p1'),
(3, 'p6'),
(4, 'p8'),
(5, 'kl'),
(6, 'bast');

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE `user` (
  `id` int(11) NOT NULL,
  `username` varchar(225) DEFAULT NULL,
  `password` varchar(225) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admin`
--
ALTER TABLE `admin`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `file`
--
ALTER TABLE `file`
  ADD PRIMARY KEY (`id`),
  ADD KEY `id_obl` (`id_obl`),
  ADD KEY `id_tipe` (`id_tipe`);

--
-- Indexes for table `keterangan`
--
ALTER TABLE `keterangan`
  ADD PRIMARY KEY (`id`),
  ADD KEY `id_obl` (`id_obl`),
  ADD KEY `id_tipe` (`id_tipe`);

--
-- Indexes for table `obl`
--
ALTER TABLE `obl`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tipe`
--
ALTER TABLE `tipe`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `admin`
--
ALTER TABLE `admin`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `file`
--
ALTER TABLE `file`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `keterangan`
--
ALTER TABLE `keterangan`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `obl`
--
ALTER TABLE `obl`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `tipe`
--
ALTER TABLE `tipe`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `user`
--
ALTER TABLE `user`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `file`
--
ALTER TABLE `file`
  ADD CONSTRAINT `file_ibfk_1` FOREIGN KEY (`id_obl`) REFERENCES `obl` (`id`),
  ADD CONSTRAINT `file_ibfk_2` FOREIGN KEY (`id_tipe`) REFERENCES `tipe` (`id`);

--
-- Constraints for table `keterangan`
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
