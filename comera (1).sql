-- phpMyAdmin SQL Dump
-- version 5.0.4
-- https://www.phpmyadmin.net/
--
-- Host: localhost
-- Generation Time: Aug 07, 2021 at 12:51 AM
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
(5, 'CM210718001', 'TXP210731001', '2021-07-01', '2021-07-31', 'Y', 1000000, 4500000, 0, '2021-07-31 23:13:39', 'CM210701001', '2021-07-31 23:13:39', 'CM210701001');

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
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
