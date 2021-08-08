-- phpMyAdmin SQL Dump
-- version 5.0.4
-- https://www.phpmyadmin.net/
--
-- Host: localhost
-- Generation Time: Aug 08, 2021 at 06:56 PM
-- Server version: 10.4.17-MariaDB
-- PHP Version: 7.2.34

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `comera`
--
CREATE DATABASE IF NOT EXISTS `comera` DEFAULT CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci;
USE `comera`;

-- --------------------------------------------------------

--
-- Table structure for table `tbl_absensi`
--

CREATE TABLE `tbl_absensi` (
  `abs_id` int(15) UNSIGNED NOT NULL,
  `kry_id` int(15) DEFAULT NULL,
  `kry_no` varchar(15) DEFAULT NULL,
  `kry_nama` varchar(100) DEFAULT NULL,
  `abs_in` time DEFAULT NULL,
  `abs_out` time DEFAULT NULL,
  `abs_tanggal` date NOT NULL,
  `abs_deskripsi` text DEFAULT NULL,
  `abs_status` varchar(15) DEFAULT NULL,
  `abs_dokumen` text NOT NULL,
  `abs_created_at` date DEFAULT NULL,
  `abs_created_by` varchar(15) DEFAULT NULL,
  `abs_updated_at` datetime NOT NULL,
  `abs_updated_by` varchar(15) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tbl_absensi`
--

INSERT INTO `tbl_absensi` (`abs_id`, `kry_id`, `kry_no`, `kry_nama`, `abs_in`, `abs_out`, `abs_tanggal`, `abs_deskripsi`, `abs_status`, `abs_dokumen`, `abs_created_at`, `abs_created_by`, `abs_updated_at`, `abs_updated_by`) VALUES
(18, 2, 'CM210718001', 'Roni Jakarianto     ', '15:26:00', NULL, '2021-07-20', '', 'H', '', '2021-07-20', 'CR210701001', '2021-07-20 18:05:02', 'CR210701001'),
(19, 2, 'CM210718001', 'Roni Jakarianto     ', '15:27:00', NULL, '2021-07-20', '', 'S', 'uploads/absensi_file/Screen_Shot_2021-07-13_at_13_20_391.png', '2021-07-20', 'CR210701001', '0000-00-00 00:00:00', ''),
(20, 8, 'CM210725001', ' Deni', '07:16:00', NULL, '2021-07-25', '', 'H', 'uploads/absensi_file/', '2021-07-25', 'CM210701001', '2021-07-25 23:16:54', 'CM210701001');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_lemburan`
--

CREATE TABLE `tbl_lemburan` (
  `lbr_id` int(15) UNSIGNED NOT NULL,
  `kry_no` varchar(15) DEFAULT NULL,
  `kry_nama` varchar(100) DEFAULT NULL,
  `lbr_tanggal` date DEFAULT NULL,
  `lbr_jam_mulai` time DEFAULT NULL,
  `lbr_jam_selesai` time DEFAULT NULL,
  `lbr_qty` int(15) DEFAULT NULL,
  `lbr_deskripsi` text DEFAULT NULL,
  `lbr_created_at` datetime DEFAULT NULL,
  `lbr_created_by` varchar(15) DEFAULT NULL,
  `lbr_updated_at` datetime DEFAULT NULL,
  `lbr_updated_by` varchar(15) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tbl_lemburan`
--

INSERT INTO `tbl_lemburan` (`lbr_id`, `kry_no`, `kry_nama`, `lbr_tanggal`, `lbr_jam_mulai`, `lbr_jam_selesai`, `lbr_qty`, `lbr_deskripsi`, `lbr_created_at`, `lbr_created_by`, `lbr_updated_at`, `lbr_updated_by`) VALUES
(3, 'CM210718001', 'Roni Jakarianto     ', '2021-07-31', '14:18:00', '15:18:00', 1, '', '2021-07-31 14:18:08', 'CM210701001', '2021-07-31 14:18:08', 'CM210701001');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_m_dept`
--

CREATE TABLE `tbl_m_dept` (
  `dept_id` int(11) UNSIGNED NOT NULL,
  `dept_nama` varchar(100) DEFAULT NULL,
  `dept_code` varchar(5) DEFAULT NULL,
  `dept_deskripsi` text DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tbl_m_dept`
--

INSERT INTO `tbl_m_dept` (`dept_id`, `dept_nama`, `dept_code`, `dept_deskripsi`) VALUES
(1, 'IT', 'D001', '    '),
(6, 'Quality Control', 'D002', '');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_m_jabatan`
--

CREATE TABLE `tbl_m_jabatan` (
  `jbt_id` int(11) UNSIGNED NOT NULL,
  `jbt_code` varchar(5) DEFAULT NULL,
  `jbt_nama` varchar(100) DEFAULT NULL,
  `jbt_deskripsi` varchar(100) DEFAULT NULL,
  `jbt_created_at` datetime DEFAULT NULL,
  `jbt_created_by` varchar(15) DEFAULT NULL,
  `jbt_updated_at` datetime DEFAULT NULL,
  `jbt_updated_by` varchar(15) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tbl_m_jabatan`
--

INSERT INTO `tbl_m_jabatan` (`jbt_id`, `jbt_code`, `jbt_nama`, `jbt_deskripsi`, `jbt_created_at`, `jbt_created_by`, `jbt_updated_at`, `jbt_updated_by`) VALUES
(12, 'J001', 'Manager', '', '2021-07-18 07:07:17', 'CR210701001', NULL, NULL),
(13, 'J002', 'Senior Manager', '', '2021-07-18 07:07:25', 'CR210701001', NULL, NULL),
(14, 'J003', 'Staff', '', '2021-07-18 07:07:31', 'CR210701001', NULL, NULL),
(15, 'J004', 'Senior Staff', '', '2021-07-18 07:07:38', 'CR210701001', NULL, NULL),
(16, 'J005', 'Assisten Manager', '', '2021-07-25 11:14:37', 'CM210701001', '2021-07-25 11:14:47', 'CM210701001');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_m_karyawan`
--

CREATE TABLE `tbl_m_karyawan` (
  `kry_id` int(15) UNSIGNED NOT NULL,
  `kry_no` varchar(15) DEFAULT NULL,
  `kry_nama` varchar(100) DEFAULT NULL,
  `kry_tempat_lahir` varchar(50) DEFAULT NULL,
  `kry_tgl_lahir` date DEFAULT NULL,
  `kry_alamat` text DEFAULT NULL,
  `kry_status_perkawinan` varchar(20) DEFAULT NULL,
  `kry_agama` varchar(20) DEFAULT NULL,
  `kry_jenis_kelamin` varchar(20) DEFAULT '',
  `kry_email` varchar(25) DEFAULT NULL,
  `kry_telepon` varchar(15) NOT NULL,
  `kry_tgl_gabung` date DEFAULT NULL,
  `kry_image` text DEFAULT NULL,
  `kry_jabatan` varchar(100) DEFAULT NULL,
  `kry_jabatan_id` varchar(15) DEFAULT NULL,
  `kry_pend_terakhir` varchar(10) DEFAULT NULL,
  `kry_dept_code` varchar(15) DEFAULT NULL,
  `kry_dept_nama` varchar(100) DEFAULT NULL,
  `kry_no_rekening` varchar(25) DEFAULT NULL,
  `kry_bank` varchar(25) DEFAULT NULL,
  `kry_nama_rekening` varchar(100) DEFAULT NULL,
  `kry_created_at` datetime DEFAULT NULL,
  `kry_created_by` varchar(15) DEFAULT NULL,
  `kry_updated_at` datetime DEFAULT NULL,
  `kry_updated_by` varchar(15) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tbl_m_karyawan`
--

INSERT INTO `tbl_m_karyawan` (`kry_id`, `kry_no`, `kry_nama`, `kry_tempat_lahir`, `kry_tgl_lahir`, `kry_alamat`, `kry_status_perkawinan`, `kry_agama`, `kry_jenis_kelamin`, `kry_email`, `kry_telepon`, `kry_tgl_gabung`, `kry_image`, `kry_jabatan`, `kry_jabatan_id`, `kry_pend_terakhir`, `kry_dept_code`, `kry_dept_nama`, `kry_no_rekening`, `kry_bank`, `kry_nama_rekening`, `kry_created_at`, `kry_created_by`, `kry_updated_at`, `kry_updated_by`) VALUES
(1, 'CM210701001', 'Admin', 'Bandung', '2020-06-02', 'Bandung', NULL, NULL, '', NULL, '', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(2, 'CM210718001', 'Roni Jakarianto     ', 'Subang', '2021-07-18', 'Bandung Cimahi', 'Y', 'islam', 'L', 'ronijanuarsn01@gmail.com', '0092093232', '2021-07-18', 'uploads/foto/2234124529.jpg', 'Staff', '14', 'sma', 'D001', 'IT', ' 2321412     ', ' BCA     ', ' Roni Jakarianto     ', '2021-07-20 15:52:46', 'CR210701001', '2021-07-24 15:44:41', 'CR210701001'),
(8, 'CM210725001', ' Deni', 'Bandung', '1994-07-13', 'Bandung', 'Y', 'islam', 'L', 'deni@gmail.com', '08222200909', '2021-07-25', 'uploads/foto/1968946964.jpg', 'Senior Staff', '15', 'S1', 'D001', 'IT', ' 32131231', 'BCA', ' Deni', '2021-07-25 23:10:18', 'CM210701001', '2021-07-25 23:10:51', 'CM210701001');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_m_penggajian`
--

CREATE TABLE `tbl_m_penggajian` (
  `pg_id` int(11) NOT NULL,
  `kry_no` varchar(15) NOT NULL,
  `kry_nama` varchar(100) NOT NULL,
  `pg_status` varchar(10) NOT NULL,
  `pg_created_at` datetime NOT NULL,
  `pg_created_by` varchar(15) NOT NULL,
  `pg_updated_at` datetime NOT NULL,
  `pg_updated_by` varchar(15) NOT NULL,
  `pg_gaji_pokok` int(15) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tbl_m_penggajian`
--

INSERT INTO `tbl_m_penggajian` (`pg_id`, `kry_no`, `kry_nama`, `pg_status`, `pg_created_at`, `pg_created_by`, `pg_updated_at`, `pg_updated_by`, `pg_gaji_pokok`) VALUES
(2, 'CM210718001', 'Roni Jakarianto     ', 'Y', '2021-07-24 13:56:04', 'CR210701001', '2021-07-24 15:40:06', 'CR210701001', 4500000),
(3, 'CM210725001', ' Deni', 'Y', '2021-07-25 23:13:01', 'CM210701001', '2021-07-25 23:13:14', 'CM210701001', 6000000);

-- --------------------------------------------------------

--
-- Table structure for table `tbl_m_potongan`
--

CREATE TABLE `tbl_m_potongan` (
  `tp_id` int(11) NOT NULL,
  `tp_code` varchar(5) NOT NULL,
  `tp_nama` varchar(100) NOT NULL,
  `tp_nilai` int(15) NOT NULL,
  `tp_level` int(15) NOT NULL,
  `tp_created_at` datetime NOT NULL,
  `tp_created_by` varchar(15) NOT NULL,
  `tp_updated_at` datetime DEFAULT NULL,
  `tp_updated_by` varchar(15) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tbl_m_potongan`
--

INSERT INTO `tbl_m_potongan` (`tp_id`, `tp_code`, `tp_nama`, `tp_nilai`, `tp_level`, `tp_created_at`, `tp_created_by`, `tp_updated_at`, `tp_updated_by`) VALUES
(2, 'P001', 'Test', 1000000, 14, '2021-07-24 22:48:05', 'CR210701001', '2021-07-24 22:48:16', 'CR210701001'),
(3, 'P002', 'Sakit', 55000, 15, '2021-07-25 23:13:47', 'CM210701001', '2021-07-25 23:13:59', 'CM210701001');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_m_user`
--

CREATE TABLE `tbl_m_user` (
  `usr_id` int(11) UNSIGNED NOT NULL,
  `usr_username` varchar(15) DEFAULT NULL,
  `usr_password` text DEFAULT NULL,
  `usr_type` varchar(20) DEFAULT NULL,
  `usr_log_terakhir` datetime DEFAULT NULL,
  `usr_status` varchar(10) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tbl_m_user`
--

INSERT INTO `tbl_m_user` (`usr_id`, `usr_username`, `usr_password`, `usr_type`, `usr_log_terakhir`, `usr_status`) VALUES
(1, 'CM210701001', '21232f297a57a5a743894a0e4a801fc3', 'admin', NULL, 'active'),
(2, 'CM210718001', '45f07e5c8dfe3ce3eab1b77cb98a8116', 'karyawan', NULL, 'active'),
(9, 'CM210725001', 'c518643164c88ec73528ea2ec5069adc', 'karyawan', NULL, 'active');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_tunjangan`
--

CREATE TABLE `tbl_tunjangan` (
  `tj_id` int(15) NOT NULL,
  `tj_code` varchar(5) NOT NULL,
  `tj_nama` varchar(100) NOT NULL,
  `tj_nilai` int(15) NOT NULL,
  `tj_level` varchar(10) NOT NULL,
  `tj_keterangan` text DEFAULT NULL,
  `tj_created_at` datetime NOT NULL,
  `tj_created_by` varchar(15) NOT NULL,
  `tj_updated_at` datetime NOT NULL,
  `tj_updated_by` varchar(15) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tbl_tunjangan`
--

INSERT INTO `tbl_tunjangan` (`tj_id`, `tj_code`, `tj_nama`, `tj_nilai`, `tj_level`, `tj_keterangan`, `tj_created_at`, `tj_created_by`, `tj_updated_at`, `tj_updated_by`) VALUES
(2, 'T002', 'Tunjangan Makan', 500000, '14', '', '2021-07-24 15:37:07', 'CR210701001', '0000-00-00 00:00:00', ''),
(3, 'T003', 'Tunjangan Makan', 500000, '15', '', '2021-07-25 23:11:47', 'CM210701001', '0000-00-00 00:00:00', ''),
(4, 'T004', 'Tunjangan Transport', 200000, '15', '', '2021-07-25 23:12:05', 'CM210701001', '0000-00-00 00:00:00', ''),
(5, 'T005', 'Tunjangan Jabatan', 250000, '15', '', '2021-07-25 23:12:21', 'CM210701001', '0000-00-00 00:00:00', '');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_txn_penggajian`
--

CREATE TABLE `tbl_txn_penggajian` (
  `txp_id` int(15) NOT NULL,
  `kry_no` varchar(15) NOT NULL,
  `txp_code` varchar(15) NOT NULL,
  `txp_periode` date DEFAULT NULL,
  `txp_tanggal_bayar` date DEFAULT NULL,
  `txp_status` varchar(20) DEFAULT NULL,
  `txp_potongan` int(15) DEFAULT NULL,
  `txp_gaji_total` int(15) DEFAULT NULL,
  `txp_nilai_lemburan` int(15) DEFAULT NULL,
  `txp_created_at` datetime DEFAULT NULL,
  `txp_created_by` varchar(15) DEFAULT NULL,
  `txp_updated_at` datetime DEFAULT NULL,
  `txp_updated_by` varchar(15) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tbl_txn_penggajian`
--

INSERT INTO `tbl_txn_penggajian` (`txp_id`, `kry_no`, `txp_code`, `txp_periode`, `txp_tanggal_bayar`, `txp_status`, `txp_potongan`, `txp_gaji_total`, `txp_nilai_lemburan`, `txp_created_at`, `txp_created_by`, `txp_updated_at`, `txp_updated_by`) VALUES
(5, 'CM210718001', 'TXP210808001', '2021-07-01', '2021-07-31', 'Y', 1000000, 4750000, 250000, '2021-08-08 21:03:50', 'CM210701001', '2021-08-08 21:03:50', 'CM210701001');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_txn_pinjaman`
--

CREATE TABLE `tbl_txn_pinjaman` (
  `txj_id` int(15) NOT NULL,
  `txj_code` varchar(15) NOT NULL,
  `kry_no` varchar(15) NOT NULL,
  `kry_nama` varchar(100) NOT NULL,
  `txj_tanggal_pinjam` date NOT NULL,
  `txj_nilai_pinjam` int(15) NOT NULL,
  `txj_tanggal_bayar` date DEFAULT NULL,
  `txj_nilai_bayar` int(15) DEFAULT NULL,
  `txj_deskripsi` text DEFAULT NULL,
  `txj_jatuh_tempo` date NOT NULL,
  `txj_created_at` datetime DEFAULT NULL,
  `txj_created_by` varchar(15) DEFAULT NULL,
  `txj_updated_at` datetime DEFAULT NULL,
  `txj_updated_by` varchar(15) DEFAULT NULL,
  `txj_parent_id` int(15) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tbl_txn_pinjaman`
--

INSERT INTO `tbl_txn_pinjaman` (`txj_id`, `txj_code`, `kry_no`, `kry_nama`, `txj_tanggal_pinjam`, `txj_nilai_pinjam`, `txj_tanggal_bayar`, `txj_nilai_bayar`, `txj_deskripsi`, `txj_jatuh_tempo`, `txj_created_at`, `txj_created_by`, `txj_updated_at`, `txj_updated_by`, `txj_parent_id`) VALUES
(2, 'PJ210725001', 'CM210718001', 'Roni Jakarianto     ', '2021-07-22', 2000000, NULL, NULL, '', '2021-07-25', '2021-07-25 12:46:41', 'CR210701001', '2021-07-25 23:17:51', 'CM210701001', 0),
(15, 'PB210725001', 'CM210718001', 'Roni Jakarianto     ', '2021-07-22', 0, '2021-07-25', 1000000, '', '2021-07-25', '2021-07-25 16:17:49', 'CR210701001', NULL, NULL, 2),
(16, 'PB210725002', 'CM210718001', 'Roni Jakarianto     ', '2021-07-22', 0, '2021-07-26', 500000, '', '2021-07-25', '2021-07-25 16:18:00', 'CR210701001', NULL, NULL, 2),
(18, 'PB210725003', 'CM210718001', 'Roni Jakarianto     ', '2021-07-22', 0, '2021-07-25', 500000, '', '2021-07-25', '2021-07-25 16:22:15', 'CR210701001', NULL, NULL, 2),
(19, 'PJ210725004', 'CM210725001', ' Deni', '2021-07-25', 1000000, NULL, NULL, '', '2021-07-31', '2021-07-25 23:17:40', 'CM210701001', NULL, NULL, 0),
(21, 'PB210725005', 'CM210725001', ' Deni', '2021-07-25', 0, '2021-07-30', 600000, '', '2021-07-31', '2021-07-25 23:20:13', 'CM210701001', NULL, NULL, 19);

-- --------------------------------------------------------

--
-- Table structure for table `tbl_txn_potongan`
--

CREATE TABLE `tbl_txn_potongan` (
  `txg_id` int(15) NOT NULL,
  `txp_id` int(15) NOT NULL,
  `tp_id` int(15) NOT NULL,
  `txg_qty` int(15) NOT NULL,
  `txg_nilai` int(15) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tbl_txn_potongan`
--

INSERT INTO `tbl_txn_potongan` (`txg_id`, `txp_id`, `tp_id`, `txg_qty`, `txg_nilai`) VALUES
(3, 4, 2, 1, 1000000),
(4, 5, 2, 1, 1000000);

-- --------------------------------------------------------

--
-- Table structure for table `tbl_txn_tunjangan`
--

CREATE TABLE `tbl_txn_tunjangan` (
  `txt_id` int(15) NOT NULL,
  `kry_no` varchar(15) NOT NULL,
  `kry_nama` varchar(100) NOT NULL,
  `tj_id` varchar(10) NOT NULL,
  `tj_nilai` int(15) NOT NULL,
  `txp_created_at` datetime NOT NULL,
  `txp_created_by` varchar(15) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tbl_txn_tunjangan`
--

INSERT INTO `tbl_txn_tunjangan` (`txt_id`, `kry_no`, `kry_nama`, `tj_id`, `tj_nilai`, `txp_created_at`, `txp_created_by`) VALUES
(8, 'CM210718001', 'Roni Jakarianto     ', '2', 500000, '0000-00-00 00:00:00', ''),
(10, 'CM210725001', ' Deni', '5', 250000, '0000-00-00 00:00:00', ''),
(11, 'CM210725001', ' Deni', '4', 200000, '0000-00-00 00:00:00', ''),
(12, 'CM210725001', ' Deni', '3', 500000, '0000-00-00 00:00:00', ''),
(13, 'CM210718001', 'Roni Jakarianto     ', '2', 500000, '0000-00-00 00:00:00', '');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `tbl_absensi`
--
ALTER TABLE `tbl_absensi`
  ADD PRIMARY KEY (`abs_id`);

--
-- Indexes for table `tbl_lemburan`
--
ALTER TABLE `tbl_lemburan`
  ADD PRIMARY KEY (`lbr_id`);

--
-- Indexes for table `tbl_m_dept`
--
ALTER TABLE `tbl_m_dept`
  ADD PRIMARY KEY (`dept_id`);

--
-- Indexes for table `tbl_m_jabatan`
--
ALTER TABLE `tbl_m_jabatan`
  ADD PRIMARY KEY (`jbt_id`);

--
-- Indexes for table `tbl_m_karyawan`
--
ALTER TABLE `tbl_m_karyawan`
  ADD PRIMARY KEY (`kry_id`),
  ADD KEY `id` (`kry_id`);

--
-- Indexes for table `tbl_m_penggajian`
--
ALTER TABLE `tbl_m_penggajian`
  ADD PRIMARY KEY (`pg_id`);

--
-- Indexes for table `tbl_m_potongan`
--
ALTER TABLE `tbl_m_potongan`
  ADD PRIMARY KEY (`tp_id`);

--
-- Indexes for table `tbl_m_user`
--
ALTER TABLE `tbl_m_user`
  ADD PRIMARY KEY (`usr_id`);

--
-- Indexes for table `tbl_tunjangan`
--
ALTER TABLE `tbl_tunjangan`
  ADD PRIMARY KEY (`tj_id`);

--
-- Indexes for table `tbl_txn_penggajian`
--
ALTER TABLE `tbl_txn_penggajian`
  ADD PRIMARY KEY (`txp_id`);

--
-- Indexes for table `tbl_txn_pinjaman`
--
ALTER TABLE `tbl_txn_pinjaman`
  ADD PRIMARY KEY (`txj_id`);

--
-- Indexes for table `tbl_txn_potongan`
--
ALTER TABLE `tbl_txn_potongan`
  ADD PRIMARY KEY (`txg_id`);

--
-- Indexes for table `tbl_txn_tunjangan`
--
ALTER TABLE `tbl_txn_tunjangan`
  ADD PRIMARY KEY (`txt_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `tbl_absensi`
--
ALTER TABLE `tbl_absensi`
  MODIFY `abs_id` int(15) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=21;

--
-- AUTO_INCREMENT for table `tbl_lemburan`
--
ALTER TABLE `tbl_lemburan`
  MODIFY `lbr_id` int(15) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `tbl_m_dept`
--
ALTER TABLE `tbl_m_dept`
  MODIFY `dept_id` int(11) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `tbl_m_jabatan`
--
ALTER TABLE `tbl_m_jabatan`
  MODIFY `jbt_id` int(11) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;

--
-- AUTO_INCREMENT for table `tbl_m_karyawan`
--
ALTER TABLE `tbl_m_karyawan`
  MODIFY `kry_id` int(15) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `tbl_m_penggajian`
--
ALTER TABLE `tbl_m_penggajian`
  MODIFY `pg_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `tbl_m_potongan`
--
ALTER TABLE `tbl_m_potongan`
  MODIFY `tp_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `tbl_m_user`
--
ALTER TABLE `tbl_m_user`
  MODIFY `usr_id` int(11) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT for table `tbl_tunjangan`
--
ALTER TABLE `tbl_tunjangan`
  MODIFY `tj_id` int(15) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `tbl_txn_penggajian`
--
ALTER TABLE `tbl_txn_penggajian`
  MODIFY `txp_id` int(15) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `tbl_txn_pinjaman`
--
ALTER TABLE `tbl_txn_pinjaman`
  MODIFY `txj_id` int(15) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=22;

--
-- AUTO_INCREMENT for table `tbl_txn_potongan`
--
ALTER TABLE `tbl_txn_potongan`
  MODIFY `txg_id` int(15) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `tbl_txn_tunjangan`
--
ALTER TABLE `tbl_txn_tunjangan`
  MODIFY `txt_id` int(15) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;
--
-- Database: `db_sigaka`
--
CREATE DATABASE IF NOT EXISTS `db_sigaka` DEFAULT CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci;
USE `db_sigaka`;

-- --------------------------------------------------------

--
-- Table structure for table `sigaka_absen`
--

CREATE TABLE `sigaka_absen` (
  `absen_id` varchar(20) NOT NULL,
  `absen_karyawan_id` varchar(20) NOT NULL,
  `absen_hari` varchar(10) NOT NULL,
  `absen_status` enum('lembur','normal') NOT NULL DEFAULT 'normal',
  `absen_date_created` datetime NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `sigaka_absen`
--

INSERT INTO `sigaka_absen` (`absen_id`, `absen_karyawan_id`, `absen_hari`, `absen_status`, `absen_date_created`) VALUES
('ABS-45434', 'PEG-76226', 'Sabtu', 'lembur', '2019-08-03 22:17:14'),
('ABS-74757', 'PEG-74722', 'Senin', 'lembur', '2019-07-15 14:12:37'),
('ABS-76293', 'PEG-76226', 'Senin', 'lembur', '2019-07-15 14:38:13');

-- --------------------------------------------------------

--
-- Table structure for table `sigaka_gaji`
--

CREATE TABLE `sigaka_gaji` (
  `gaji_id` varchar(20) NOT NULL,
  `gaji_karyawan_id` varchar(20) NOT NULL,
  `gaji_lembur` int(20) DEFAULT 0,
  `gaji_total` int(20) NOT NULL,
  `gaji_bayar_pinjaman` int(20) NOT NULL,
  `gaji_tanggal` date DEFAULT NULL,
  `gaji_bulan_ke` int(11) DEFAULT NULL,
  `gaji_status` enum('sudah','belum') NOT NULL DEFAULT 'belum',
  `gaji_date_created` datetime NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `sigaka_gaji`
--

INSERT INTO `sigaka_gaji` (`gaji_id`, `gaji_karyawan_id`, `gaji_lembur`, `gaji_total`, `gaji_bayar_pinjaman`, `gaji_tanggal`, `gaji_bulan_ke`, `gaji_status`, `gaji_date_created`) VALUES
('GJI-74757', 'PEG-74722', 35000, 35000, 0, '2019-07-15', 1, 'sudah', '2019-07-15 14:12:37'),
('GJI-76293', 'PEG-76226', 70000, 70000, 30000, '2019-08-03', 1, 'sudah', '2019-07-15 14:38:13');

-- --------------------------------------------------------

--
-- Table structure for table `sigaka_jabatan`
--

CREATE TABLE `sigaka_jabatan` (
  `jabatan_id` varchar(20) NOT NULL,
  `jabatan_nama` varchar(255) DEFAULT NULL,
  `jabatan_gaji` int(20) DEFAULT NULL,
  `jabatan_date_created` datetime NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `sigaka_jabatan`
--

INSERT INTO `sigaka_jabatan` (`jabatan_id`, `jabatan_nama`, `jabatan_gaji`, `jabatan_date_created`) VALUES
('JAB-74569', 'Frontliner', 35000, '2019-07-15 14:09:29'),
('JAB-76143', 'frontliner', 35000, '2019-07-15 14:35:43');

-- --------------------------------------------------------

--
-- Table structure for table `sigaka_karyawan`
--

CREATE TABLE `sigaka_karyawan` (
  `karyawan_id` varchar(20) NOT NULL,
  `karyawan_jabatan_id` varchar(20) DEFAULT NULL,
  `karyawan_nama` varchar(255) DEFAULT NULL,
  `karyawan_tempat_lahir` varchar(255) DEFAULT NULL,
  `karyawan_tanggal_lahir` date DEFAULT NULL,
  `karyawan_alamat` text DEFAULT NULL,
  `karyawan_tanggal_gabung` date DEFAULT NULL,
  `karyawan_nomor_hp` varchar(20) DEFAULT NULL,
  `karyawan_no_rekening` varchar(30) DEFAULT NULL,
  `karyawan_date_created` datetime DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `sigaka_karyawan`
--

INSERT INTO `sigaka_karyawan` (`karyawan_id`, `karyawan_jabatan_id`, `karyawan_nama`, `karyawan_tempat_lahir`, `karyawan_tanggal_lahir`, `karyawan_alamat`, `karyawan_tanggal_gabung`, `karyawan_nomor_hp`, `karyawan_no_rekening`, `karyawan_date_created`) VALUES
('PEG-74722', 'JAB-74569', 'Cucu', 'Pekanbaru', '1997-09-04', 'Disana', '2014-06-14', '081234567890', '', '2019-07-15 14:12:02'),
('PEG-76226', 'JAB-76143', 'widi', 'pku', '2000-07-09', 'pku', '2019-08-03', '081233444433', '', '2019-07-15 14:37:06');

-- --------------------------------------------------------

--
-- Table structure for table `sigaka_pengguna`
--

CREATE TABLE `sigaka_pengguna` (
  `pengguna_id` int(20) NOT NULL,
  `pengguna_username` varchar(255) DEFAULT NULL,
  `pengguna_password` varchar(255) DEFAULT NULL,
  `pengguna_nama` varchar(255) DEFAULT NULL,
  `pengguna_foto` text DEFAULT NULL,
  `pengguna_hak_akses` enum('manajer','owner') DEFAULT NULL,
  `pengguna_date_created` datetime DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `sigaka_pengguna`
--

INSERT INTO `sigaka_pengguna` (`pengguna_id`, `pengguna_username`, `pengguna_password`, `pengguna_nama`, `pengguna_foto`, `pengguna_hak_akses`, `pengguna_date_created`) VALUES
(1, 'admin', '21232f297a57a5a743894a0e4a801fc3', 'Abdul Mustaqim', NULL, 'manajer', '2019-06-28 21:06:43'),
(2, 'owner', '5be057accb25758101fa5eadbbd79503', 'Saptoni Khusni', NULL, 'owner', '2019-07-15 12:27:55');

-- --------------------------------------------------------

--
-- Table structure for table `sigaka_pinjam`
--

CREATE TABLE `sigaka_pinjam` (
  `pinjam_id` varchar(20) NOT NULL,
  `pinjam_karyawan_id` varchar(20) NOT NULL,
  `pinjam_jumlah` int(20) NOT NULL,
  `pinjam_bayar` int(20) NOT NULL DEFAULT 0,
  `pinjam_date_created` datetime NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `sigaka_pinjam`
--

INSERT INTO `sigaka_pinjam` (`pinjam_id`, `pinjam_karyawan_id`, `pinjam_jumlah`, `pinjam_bayar`, `pinjam_date_created`) VALUES
('PJM-44503', 'PEG-76226', 30000, 30000, '2019-08-03 22:01:43'),
('PJM-74863', 'PEG-74722', 50000, 50000, '2019-07-15 14:14:23');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `sigaka_absen`
--
ALTER TABLE `sigaka_absen`
  ADD PRIMARY KEY (`absen_id`);

--
-- Indexes for table `sigaka_gaji`
--
ALTER TABLE `sigaka_gaji`
  ADD PRIMARY KEY (`gaji_id`);

--
-- Indexes for table `sigaka_jabatan`
--
ALTER TABLE `sigaka_jabatan`
  ADD PRIMARY KEY (`jabatan_id`);

--
-- Indexes for table `sigaka_karyawan`
--
ALTER TABLE `sigaka_karyawan`
  ADD PRIMARY KEY (`karyawan_id`);

--
-- Indexes for table `sigaka_pengguna`
--
ALTER TABLE `sigaka_pengguna`
  ADD PRIMARY KEY (`pengguna_id`);

--
-- Indexes for table `sigaka_pinjam`
--
ALTER TABLE `sigaka_pinjam`
  ADD PRIMARY KEY (`pinjam_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `sigaka_pengguna`
--
ALTER TABLE `sigaka_pengguna`
  MODIFY `pengguna_id` int(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
--
-- Database: `ospos`
--
CREATE DATABASE IF NOT EXISTS `ospos` DEFAULT CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci;
USE `ospos`;

-- --------------------------------------------------------

--
-- Table structure for table `ospos_migrations`
--

CREATE TABLE `ospos_migrations` (
  `version` bigint(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `ospos_migrations`
--

INSERT INTO `ospos_migrations` (`version`) VALUES
(0);
--
-- Database: `payroll_test`
--
CREATE DATABASE IF NOT EXISTS `payroll_test` DEFAULT CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci;
USE `payroll_test`;

-- --------------------------------------------------------

--
-- Table structure for table `gaji`
--

CREATE TABLE `gaji` (
  `id_gaji` int(11) NOT NULL,
  `tgl` date DEFAULT NULL,
  `nik` varchar(30) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `gaji`
--

INSERT INTO `gaji` (`id_gaji`, `tgl`, `nik`) VALUES
(4, '2017-11-10', '68657537683');

-- --------------------------------------------------------

--
-- Table structure for table `karyawan`
--

CREATE TABLE `karyawan` (
  `id_karyawan` int(11) NOT NULL,
  `nik` varchar(20) DEFAULT NULL,
  `username` varchar(50) DEFAULT NULL,
  `password` varchar(50) DEFAULT NULL,
  `nama` varchar(100) DEFAULT NULL,
  `alamat` text DEFAULT NULL,
  `jenis_kelamin` varchar(10) DEFAULT NULL,
  `agama` varchar(20) DEFAULT NULL,
  `pendidikan` varchar(50) DEFAULT NULL,
  `asal_sekolah` varchar(100) DEFAULT NULL,
  `id_pekerjaan` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `karyawan`
--

INSERT INTO `karyawan` (`id_karyawan`, `nik`, `username`, `password`, `nama`, `alamat`, `jenis_kelamin`, `agama`, `pendidikan`, `asal_sekolah`, `id_pekerjaan`) VALUES
(1, '68657537683', 'user', 'user', 'Joni Saputra', 'jambi', 'Laki-laki', 'Islam', '', '', 1);

-- --------------------------------------------------------

--
-- Table structure for table `pekerjaan`
--

CREATE TABLE `pekerjaan` (
  `id_pekerjaan` int(11) NOT NULL,
  `pekerjaan` varchar(30) DEFAULT NULL,
  `gapok` int(11) DEFAULT NULL,
  `tukes` int(11) DEFAULT NULL,
  `tutra` int(11) DEFAULT NULL,
  `tupen` int(11) DEFAULT NULL,
  `tukel` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `pekerjaan`
--

INSERT INTO `pekerjaan` (`id_pekerjaan`, `pekerjaan`, `gapok`, `tukes`, `tutra`, `tupen`, `tukel`) VALUES
(1, 'Supervisor', 1800000, 125000, 50000, 0, NULL),
(2, 'Karyawan Tetap', 1500000, 125000, 100000, 50000, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE `user` (
  `id_user` int(11) NOT NULL,
  `nama` varchar(50) DEFAULT NULL,
  `username` varchar(50) DEFAULT NULL,
  `password` varchar(50) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`id_user`, `nama`, `username`, `password`) VALUES
(1, 'Administrator', 'admin', 'admin');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `gaji`
--
ALTER TABLE `gaji`
  ADD PRIMARY KEY (`id_gaji`);

--
-- Indexes for table `karyawan`
--
ALTER TABLE `karyawan`
  ADD PRIMARY KEY (`id_karyawan`);

--
-- Indexes for table `pekerjaan`
--
ALTER TABLE `pekerjaan`
  ADD PRIMARY KEY (`id_pekerjaan`);

--
-- Indexes for table `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`id_user`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `gaji`
--
ALTER TABLE `gaji`
  MODIFY `id_gaji` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `karyawan`
--
ALTER TABLE `karyawan`
  MODIFY `id_karyawan` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `pekerjaan`
--
ALTER TABLE `pekerjaan`
  MODIFY `id_pekerjaan` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `user`
--
ALTER TABLE `user`
  MODIFY `id_user` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
--
-- Database: `phpmyadmin`
--
CREATE DATABASE IF NOT EXISTS `phpmyadmin` DEFAULT CHARACTER SET utf8 COLLATE utf8_bin;
USE `phpmyadmin`;

-- --------------------------------------------------------

--
-- Table structure for table `pma__bookmark`
--

CREATE TABLE `pma__bookmark` (
  `id` int(11) NOT NULL,
  `dbase` varchar(255) COLLATE utf8_bin NOT NULL DEFAULT '',
  `user` varchar(255) COLLATE utf8_bin NOT NULL DEFAULT '',
  `label` varchar(255) CHARACTER SET utf8 NOT NULL DEFAULT '',
  `query` text COLLATE utf8_bin NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin COMMENT='Bookmarks';

-- --------------------------------------------------------

--
-- Table structure for table `pma__central_columns`
--

CREATE TABLE `pma__central_columns` (
  `db_name` varchar(64) COLLATE utf8_bin NOT NULL,
  `col_name` varchar(64) COLLATE utf8_bin NOT NULL,
  `col_type` varchar(64) COLLATE utf8_bin NOT NULL,
  `col_length` text COLLATE utf8_bin DEFAULT NULL,
  `col_collation` varchar(64) COLLATE utf8_bin NOT NULL,
  `col_isNull` tinyint(1) NOT NULL,
  `col_extra` varchar(255) COLLATE utf8_bin DEFAULT '',
  `col_default` text COLLATE utf8_bin DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin COMMENT='Central list of columns';

-- --------------------------------------------------------

--
-- Table structure for table `pma__column_info`
--

CREATE TABLE `pma__column_info` (
  `id` int(5) UNSIGNED NOT NULL,
  `db_name` varchar(64) COLLATE utf8_bin NOT NULL DEFAULT '',
  `table_name` varchar(64) COLLATE utf8_bin NOT NULL DEFAULT '',
  `column_name` varchar(64) COLLATE utf8_bin NOT NULL DEFAULT '',
  `comment` varchar(255) CHARACTER SET utf8 NOT NULL DEFAULT '',
  `mimetype` varchar(255) CHARACTER SET utf8 NOT NULL DEFAULT '',
  `transformation` varchar(255) COLLATE utf8_bin NOT NULL DEFAULT '',
  `transformation_options` varchar(255) COLLATE utf8_bin NOT NULL DEFAULT '',
  `input_transformation` varchar(255) COLLATE utf8_bin NOT NULL DEFAULT '',
  `input_transformation_options` varchar(255) COLLATE utf8_bin NOT NULL DEFAULT ''
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin COMMENT='Column information for phpMyAdmin';

-- --------------------------------------------------------

--
-- Table structure for table `pma__designer_settings`
--

CREATE TABLE `pma__designer_settings` (
  `username` varchar(64) COLLATE utf8_bin NOT NULL,
  `settings_data` text COLLATE utf8_bin NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin COMMENT='Settings related to Designer';

-- --------------------------------------------------------

--
-- Table structure for table `pma__export_templates`
--

CREATE TABLE `pma__export_templates` (
  `id` int(5) UNSIGNED NOT NULL,
  `username` varchar(64) COLLATE utf8_bin NOT NULL,
  `export_type` varchar(10) COLLATE utf8_bin NOT NULL,
  `template_name` varchar(64) COLLATE utf8_bin NOT NULL,
  `template_data` text COLLATE utf8_bin NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin COMMENT='Saved export templates';

-- --------------------------------------------------------

--
-- Table structure for table `pma__favorite`
--

CREATE TABLE `pma__favorite` (
  `username` varchar(64) COLLATE utf8_bin NOT NULL,
  `tables` text COLLATE utf8_bin NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin COMMENT='Favorite tables';

-- --------------------------------------------------------

--
-- Table structure for table `pma__history`
--

CREATE TABLE `pma__history` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `username` varchar(64) COLLATE utf8_bin NOT NULL DEFAULT '',
  `db` varchar(64) COLLATE utf8_bin NOT NULL DEFAULT '',
  `table` varchar(64) COLLATE utf8_bin NOT NULL DEFAULT '',
  `timevalue` timestamp NOT NULL DEFAULT current_timestamp(),
  `sqlquery` text COLLATE utf8_bin NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin COMMENT='SQL history for phpMyAdmin';

-- --------------------------------------------------------

--
-- Table structure for table `pma__navigationhiding`
--

CREATE TABLE `pma__navigationhiding` (
  `username` varchar(64) COLLATE utf8_bin NOT NULL,
  `item_name` varchar(64) COLLATE utf8_bin NOT NULL,
  `item_type` varchar(64) COLLATE utf8_bin NOT NULL,
  `db_name` varchar(64) COLLATE utf8_bin NOT NULL,
  `table_name` varchar(64) COLLATE utf8_bin NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin COMMENT='Hidden items of navigation tree';

-- --------------------------------------------------------

--
-- Table structure for table `pma__pdf_pages`
--

CREATE TABLE `pma__pdf_pages` (
  `db_name` varchar(64) COLLATE utf8_bin NOT NULL DEFAULT '',
  `page_nr` int(10) UNSIGNED NOT NULL,
  `page_descr` varchar(50) CHARACTER SET utf8 NOT NULL DEFAULT ''
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin COMMENT='PDF relation pages for phpMyAdmin';

-- --------------------------------------------------------

--
-- Table structure for table `pma__recent`
--

CREATE TABLE `pma__recent` (
  `username` varchar(64) COLLATE utf8_bin NOT NULL,
  `tables` text COLLATE utf8_bin NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin COMMENT='Recently accessed tables';

--
-- Dumping data for table `pma__recent`
--

INSERT INTO `pma__recent` (`username`, `tables`) VALUES
('root', '[{\"db\":\"comera\",\"table\":\"tbl_m_karyawan\"},{\"db\":\"comera\",\"table\":\"tbl_m_user\"},{\"db\":\"comera\",\"table\":\"tbl_txn_pinjaman\"},{\"db\":\"comera\",\"table\":\"tbl_txn_penggajian\"},{\"db\":\"comera\",\"table\":\"tbl_absensi\"},{\"db\":\"comera\",\"table\":\"tbl_m_penggajian\"},{\"db\":\"comera\",\"table\":\"tbl_m_potongan\"},{\"db\":\"comera\",\"table\":\"tbl_tunjangan\"},{\"db\":\"comera\",\"table\":\"tbl_txn_potongan\"},{\"db\":\"comera\",\"table\":\"tbl_txn_tunjangan\"}]');

-- --------------------------------------------------------

--
-- Table structure for table `pma__relation`
--

CREATE TABLE `pma__relation` (
  `master_db` varchar(64) COLLATE utf8_bin NOT NULL DEFAULT '',
  `master_table` varchar(64) COLLATE utf8_bin NOT NULL DEFAULT '',
  `master_field` varchar(64) COLLATE utf8_bin NOT NULL DEFAULT '',
  `foreign_db` varchar(64) COLLATE utf8_bin NOT NULL DEFAULT '',
  `foreign_table` varchar(64) COLLATE utf8_bin NOT NULL DEFAULT '',
  `foreign_field` varchar(64) COLLATE utf8_bin NOT NULL DEFAULT ''
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin COMMENT='Relation table';

-- --------------------------------------------------------

--
-- Table structure for table `pma__savedsearches`
--

CREATE TABLE `pma__savedsearches` (
  `id` int(5) UNSIGNED NOT NULL,
  `username` varchar(64) COLLATE utf8_bin NOT NULL DEFAULT '',
  `db_name` varchar(64) COLLATE utf8_bin NOT NULL DEFAULT '',
  `search_name` varchar(64) COLLATE utf8_bin NOT NULL DEFAULT '',
  `search_data` text COLLATE utf8_bin NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin COMMENT='Saved searches';

-- --------------------------------------------------------

--
-- Table structure for table `pma__table_coords`
--

CREATE TABLE `pma__table_coords` (
  `db_name` varchar(64) COLLATE utf8_bin NOT NULL DEFAULT '',
  `table_name` varchar(64) COLLATE utf8_bin NOT NULL DEFAULT '',
  `pdf_page_number` int(11) NOT NULL DEFAULT 0,
  `x` float UNSIGNED NOT NULL DEFAULT 0,
  `y` float UNSIGNED NOT NULL DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin COMMENT='Table coordinates for phpMyAdmin PDF output';

-- --------------------------------------------------------

--
-- Table structure for table `pma__table_info`
--

CREATE TABLE `pma__table_info` (
  `db_name` varchar(64) COLLATE utf8_bin NOT NULL DEFAULT '',
  `table_name` varchar(64) COLLATE utf8_bin NOT NULL DEFAULT '',
  `display_field` varchar(64) COLLATE utf8_bin NOT NULL DEFAULT ''
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin COMMENT='Table information for phpMyAdmin';

-- --------------------------------------------------------

--
-- Table structure for table `pma__table_uiprefs`
--

CREATE TABLE `pma__table_uiprefs` (
  `username` varchar(64) COLLATE utf8_bin NOT NULL,
  `db_name` varchar(64) COLLATE utf8_bin NOT NULL,
  `table_name` varchar(64) COLLATE utf8_bin NOT NULL,
  `prefs` text COLLATE utf8_bin NOT NULL,
  `last_update` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin COMMENT='Tables'' UI preferences';

-- --------------------------------------------------------

--
-- Table structure for table `pma__tracking`
--

CREATE TABLE `pma__tracking` (
  `db_name` varchar(64) COLLATE utf8_bin NOT NULL,
  `table_name` varchar(64) COLLATE utf8_bin NOT NULL,
  `version` int(10) UNSIGNED NOT NULL,
  `date_created` datetime NOT NULL,
  `date_updated` datetime NOT NULL,
  `schema_snapshot` text COLLATE utf8_bin NOT NULL,
  `schema_sql` text COLLATE utf8_bin DEFAULT NULL,
  `data_sql` longtext COLLATE utf8_bin DEFAULT NULL,
  `tracking` set('UPDATE','REPLACE','INSERT','DELETE','TRUNCATE','CREATE DATABASE','ALTER DATABASE','DROP DATABASE','CREATE TABLE','ALTER TABLE','RENAME TABLE','DROP TABLE','CREATE INDEX','DROP INDEX','CREATE VIEW','ALTER VIEW','DROP VIEW') COLLATE utf8_bin DEFAULT NULL,
  `tracking_active` int(1) UNSIGNED NOT NULL DEFAULT 1
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin COMMENT='Database changes tracking for phpMyAdmin';

-- --------------------------------------------------------

--
-- Table structure for table `pma__userconfig`
--

CREATE TABLE `pma__userconfig` (
  `username` varchar(64) COLLATE utf8_bin NOT NULL,
  `timevalue` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `config_data` text COLLATE utf8_bin NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin COMMENT='User preferences storage for phpMyAdmin';

--
-- Dumping data for table `pma__userconfig`
--

INSERT INTO `pma__userconfig` (`username`, `timevalue`, `config_data`) VALUES
('root', '2021-08-08 16:56:27', '{\"Console\\/Mode\":\"collapse\"}');

-- --------------------------------------------------------

--
-- Table structure for table `pma__usergroups`
--

CREATE TABLE `pma__usergroups` (
  `usergroup` varchar(64) COLLATE utf8_bin NOT NULL,
  `tab` varchar(64) COLLATE utf8_bin NOT NULL,
  `allowed` enum('Y','N') COLLATE utf8_bin NOT NULL DEFAULT 'N'
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin COMMENT='User groups with configured menu items';

-- --------------------------------------------------------

--
-- Table structure for table `pma__users`
--

CREATE TABLE `pma__users` (
  `username` varchar(64) COLLATE utf8_bin NOT NULL,
  `usergroup` varchar(64) COLLATE utf8_bin NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin COMMENT='Users and their assignments to user groups';

--
-- Indexes for dumped tables
--

--
-- Indexes for table `pma__bookmark`
--
ALTER TABLE `pma__bookmark`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `pma__central_columns`
--
ALTER TABLE `pma__central_columns`
  ADD PRIMARY KEY (`db_name`,`col_name`);

--
-- Indexes for table `pma__column_info`
--
ALTER TABLE `pma__column_info`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `db_name` (`db_name`,`table_name`,`column_name`);

--
-- Indexes for table `pma__designer_settings`
--
ALTER TABLE `pma__designer_settings`
  ADD PRIMARY KEY (`username`);

--
-- Indexes for table `pma__export_templates`
--
ALTER TABLE `pma__export_templates`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `u_user_type_template` (`username`,`export_type`,`template_name`);

--
-- Indexes for table `pma__favorite`
--
ALTER TABLE `pma__favorite`
  ADD PRIMARY KEY (`username`);

--
-- Indexes for table `pma__history`
--
ALTER TABLE `pma__history`
  ADD PRIMARY KEY (`id`),
  ADD KEY `username` (`username`,`db`,`table`,`timevalue`);

--
-- Indexes for table `pma__navigationhiding`
--
ALTER TABLE `pma__navigationhiding`
  ADD PRIMARY KEY (`username`,`item_name`,`item_type`,`db_name`,`table_name`);

--
-- Indexes for table `pma__pdf_pages`
--
ALTER TABLE `pma__pdf_pages`
  ADD PRIMARY KEY (`page_nr`),
  ADD KEY `db_name` (`db_name`);

--
-- Indexes for table `pma__recent`
--
ALTER TABLE `pma__recent`
  ADD PRIMARY KEY (`username`);

--
-- Indexes for table `pma__relation`
--
ALTER TABLE `pma__relation`
  ADD PRIMARY KEY (`master_db`,`master_table`,`master_field`),
  ADD KEY `foreign_field` (`foreign_db`,`foreign_table`);

--
-- Indexes for table `pma__savedsearches`
--
ALTER TABLE `pma__savedsearches`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `u_savedsearches_username_dbname` (`username`,`db_name`,`search_name`);

--
-- Indexes for table `pma__table_coords`
--
ALTER TABLE `pma__table_coords`
  ADD PRIMARY KEY (`db_name`,`table_name`,`pdf_page_number`);

--
-- Indexes for table `pma__table_info`
--
ALTER TABLE `pma__table_info`
  ADD PRIMARY KEY (`db_name`,`table_name`);

--
-- Indexes for table `pma__table_uiprefs`
--
ALTER TABLE `pma__table_uiprefs`
  ADD PRIMARY KEY (`username`,`db_name`,`table_name`);

--
-- Indexes for table `pma__tracking`
--
ALTER TABLE `pma__tracking`
  ADD PRIMARY KEY (`db_name`,`table_name`,`version`);

--
-- Indexes for table `pma__userconfig`
--
ALTER TABLE `pma__userconfig`
  ADD PRIMARY KEY (`username`);

--
-- Indexes for table `pma__usergroups`
--
ALTER TABLE `pma__usergroups`
  ADD PRIMARY KEY (`usergroup`,`tab`,`allowed`);

--
-- Indexes for table `pma__users`
--
ALTER TABLE `pma__users`
  ADD PRIMARY KEY (`username`,`usergroup`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `pma__bookmark`
--
ALTER TABLE `pma__bookmark`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `pma__column_info`
--
ALTER TABLE `pma__column_info`
  MODIFY `id` int(5) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `pma__export_templates`
--
ALTER TABLE `pma__export_templates`
  MODIFY `id` int(5) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `pma__history`
--
ALTER TABLE `pma__history`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `pma__pdf_pages`
--
ALTER TABLE `pma__pdf_pages`
  MODIFY `page_nr` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `pma__savedsearches`
--
ALTER TABLE `pma__savedsearches`
  MODIFY `id` int(5) UNSIGNED NOT NULL AUTO_INCREMENT;
--
-- Database: `test`
--
CREATE DATABASE IF NOT EXISTS `test` DEFAULT CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci;
USE `test`;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
