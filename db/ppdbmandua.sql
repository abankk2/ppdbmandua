-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Mar 02, 2023 at 07:09 AM
-- Server version: 10.4.25-MariaDB
-- PHP Version: 7.4.30

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `ppdbmandua`
--

-- --------------------------------------------------------

--
-- Table structure for table `detail_siswa`
--

CREATE TABLE `detail_siswa` (
  `id` int(11) NOT NULL,
  `nis` varchar(20) DEFAULT NULL,
  `no_daftar` varchar(20) DEFAULT NULL,
  `kelas` varchar(5) DEFAULT NULL,
  `nama_siswa` varchar(256) DEFAULT NULL,
  `nisn` varchar(10) DEFAULT NULL,
  `warga_siswa` varchar(256) DEFAULT NULL,
  `nik` varchar(30) DEFAULT NULL,
  `tempat_lahir` varchar(256) DEFAULT NULL,
  `tgl_lahir` date DEFAULT NULL,
  `jk` varchar(1) DEFAULT NULL,
  `anak_ke` int(2) DEFAULT NULL,
  `saudara` int(11) DEFAULT NULL,
  `agama` varchar(256) DEFAULT NULL,
  `cita` varchar(256) DEFAULT NULL,
  `no_hp` varchar(256) DEFAULT NULL,
  `emails` varchar(256) DEFAULT NULL,
  `hobi` varchar(256) DEFAULT NULL,
  `status_tinggal_siswa` varchar(256) DEFAULT NULL,
  `prov` varchar(256) DEFAULT NULL,
  `kab` varchar(256) DEFAULT NULL,
  `kec` varchar(256) DEFAULT NULL,
  `desa` varchar(256) DEFAULT NULL,
  `alamat_siswa` varchar(256) DEFAULT NULL,
  `kordinat` varchar(256) DEFAULT NULL,
  `kodepos_siswa` varchar(6) DEFAULT NULL,
  `transportasi` varchar(256) DEFAULT NULL,
  `jarak` varchar(256) DEFAULT NULL,
  `waktu` varchar(256) DEFAULT NULL,
  `biaya_sekolah` varchar(256) DEFAULT NULL,
  `keb_khusus` varchar(256) DEFAULT NULL,
  `keb_disabilitas` varchar(256) DEFAULT NULL,
  `tk` varchar(1) DEFAULT NULL,
  `paud` varchar(1) DEFAULT NULL,
  `hepatitis` varchar(1) DEFAULT NULL,
  `polio` varchar(1) DEFAULT NULL,
  `bcg` varchar(1) DEFAULT NULL,
  `campak` varchar(1) DEFAULT NULL,
  `dpt` varchar(1) DEFAULT NULL,
  `covid` varchar(1) DEFAULT NULL,
  `no_kip` varchar(256) DEFAULT NULL,
  `no_kks` varchar(256) DEFAULT NULL,
  `no_pkh` varchar(256) DEFAULT NULL,
  `no_kk` varchar(16) DEFAULT NULL,
  `kepala_keluarga` varchar(100) DEFAULT NULL,
  `nama_ayah` varchar(100) DEFAULT NULL,
  `status_ayah` varchar(100) DEFAULT NULL,
  `warga_ayah` varchar(100) DEFAULT NULL,
  `nik_ayah` varchar(16) DEFAULT NULL,
  `tempat_lahir_ayah` varchar(100) DEFAULT NULL,
  `tgl_lahir_ayah` date DEFAULT NULL,
  `pendidikan_ayah` varchar(100) DEFAULT NULL,
  `pekerjaan_ayah` varchar(100) DEFAULT NULL,
  `penghasilan_ayah` varchar(100) DEFAULT NULL,
  `no_hp_ayah` varchar(20) DEFAULT NULL,
  `domisili_ayah` varchar(100) DEFAULT NULL,
  `status_tmp_tinggal_ayah` varchar(100) DEFAULT NULL,
  `prov_ayah` varchar(100) DEFAULT NULL,
  `kab_ayah` varchar(100) DEFAULT NULL,
  `kec_ayah` varchar(100) DEFAULT NULL,
  `desa_ayah` varchar(100) DEFAULT NULL,
  `alamat_ayah` varchar(200) DEFAULT NULL,
  `kodepos_ayah` varchar(6) DEFAULT NULL,
  `nama_ibu` varchar(100) DEFAULT NULL,
  `status_ibu` varchar(100) DEFAULT NULL,
  `warga_ibu` varchar(100) DEFAULT NULL,
  `nik_ibu` varchar(100) DEFAULT NULL,
  `tempat_lahir_ibu` varchar(100) DEFAULT NULL,
  `tgl_lahir_ibu` date DEFAULT NULL,
  `pendidikan_ibu` varchar(100) DEFAULT NULL,
  `pekerjaan_ibu` varchar(100) DEFAULT NULL,
  `penghasilan_ibu` varchar(100) DEFAULT NULL,
  `no_hp_ibu` varchar(100) DEFAULT NULL,
  `status_tinggal_ibu` varchar(100) DEFAULT NULL,
  `domisili_ibu` varchar(100) DEFAULT NULL,
  `status_tmp_tinggal_ibu` varchar(100) DEFAULT NULL,
  `prov_ibu` varchar(100) DEFAULT NULL,
  `kab_ibu` varchar(100) DEFAULT NULL,
  `kec_ibu` varchar(100) DEFAULT NULL,
  `desa_ibu` varchar(100) DEFAULT NULL,
  `alamat_ibu` varchar(100) DEFAULT NULL,
  `kodepos_ibu` varchar(6) DEFAULT NULL,
  `status_wali` varchar(256) DEFAULT NULL,
  `nama_wali` varchar(256) DEFAULT NULL,
  `warga_wali` varchar(256) DEFAULT NULL,
  `nik_wali` varchar(16) DEFAULT NULL,
  `tempat_lahir_wali` varchar(256) DEFAULT NULL,
  `tgl_lahir_wali` text DEFAULT NULL,
  `pendidikan_wali` varchar(256) DEFAULT NULL,
  `pekerjaan_wali` varchar(256) DEFAULT NULL,
  `penghasilan_wali` varchar(256) DEFAULT NULL,
  `no_hp_wali` varchar(16) DEFAULT NULL,
  `domisili_wali` varchar(256) DEFAULT NULL,
  `prov_wali` varchar(256) DEFAULT NULL,
  `kab_wali` varchar(256) DEFAULT NULL,
  `kec_wali` varchar(256) DEFAULT NULL,
  `desa_wali` varchar(256) DEFAULT NULL,
  `alamat_wali` varchar(256) DEFAULT NULL,
  `kodepos_wali` varchar(256) DEFAULT NULL,
  `foto` varchar(128) DEFAULT NULL,
  `jurusan` varchar(256) DEFAULT NULL,
  `file_kip` varchar(256) DEFAULT NULL,
  `file_ktp` text DEFAULT NULL,
  `file_kk` varchar(256) DEFAULT NULL,
  `file_ijazah` varchar(256) DEFAULT NULL,
  `file_akte` varchar(256) DEFAULT NULL,
  `file_shun` varchar(256) DEFAULT NULL,
  `tgl_mutasi` text DEFAULT NULL,
  `surat_masuk` text DEFAULT NULL,
  `alasan_mutasi` varchar(100) DEFAULT NULL,
  `asal_sekolah` text DEFAULT NULL,
  `npsn_sekolah` text DEFAULT NULL,
  `seri_ijazah` text DEFAULT NULL,
  `sekolah_mutasi` varchar(255) DEFAULT NULL,
  `level` varchar(10) DEFAULT NULL,
  `aktif` int(1) DEFAULT 0,
  `status` int(1) DEFAULT 0,
  `tgl_siswa` date DEFAULT NULL,
  `online` int(1) DEFAULT 0,
  `password` text DEFAULT NULL,
  `jenis` int(11) DEFAULT NULL,
  `kelasmutasi` text DEFAULT NULL,
  `konfirmasi` int(11) DEFAULT NULL,
  `tahun_lulus` text DEFAULT NULL,
  `no_ijazahalumni` varchar(128) DEFAULT NULL,
  `golongandarah` text DEFAULT NULL,
  `penyakit` text DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `detail_siswa`
--

INSERT INTO `detail_siswa` (`id`, `nis`, `no_daftar`, `kelas`, `nama_siswa`, `nisn`, `warga_siswa`, `nik`, `tempat_lahir`, `tgl_lahir`, `jk`, `anak_ke`, `saudara`, `agama`, `cita`, `no_hp`, `emails`, `hobi`, `status_tinggal_siswa`, `prov`, `kab`, `kec`, `desa`, `alamat_siswa`, `kordinat`, `kodepos_siswa`, `transportasi`, `jarak`, `waktu`, `biaya_sekolah`, `keb_khusus`, `keb_disabilitas`, `tk`, `paud`, `hepatitis`, `polio`, `bcg`, `campak`, `dpt`, `covid`, `no_kip`, `no_kks`, `no_pkh`, `no_kk`, `kepala_keluarga`, `nama_ayah`, `status_ayah`, `warga_ayah`, `nik_ayah`, `tempat_lahir_ayah`, `tgl_lahir_ayah`, `pendidikan_ayah`, `pekerjaan_ayah`, `penghasilan_ayah`, `no_hp_ayah`, `domisili_ayah`, `status_tmp_tinggal_ayah`, `prov_ayah`, `kab_ayah`, `kec_ayah`, `desa_ayah`, `alamat_ayah`, `kodepos_ayah`, `nama_ibu`, `status_ibu`, `warga_ibu`, `nik_ibu`, `tempat_lahir_ibu`, `tgl_lahir_ibu`, `pendidikan_ibu`, `pekerjaan_ibu`, `penghasilan_ibu`, `no_hp_ibu`, `status_tinggal_ibu`, `domisili_ibu`, `status_tmp_tinggal_ibu`, `prov_ibu`, `kab_ibu`, `kec_ibu`, `desa_ibu`, `alamat_ibu`, `kodepos_ibu`, `status_wali`, `nama_wali`, `warga_wali`, `nik_wali`, `tempat_lahir_wali`, `tgl_lahir_wali`, `pendidikan_wali`, `pekerjaan_wali`, `penghasilan_wali`, `no_hp_wali`, `domisili_wali`, `prov_wali`, `kab_wali`, `kec_wali`, `desa_wali`, `alamat_wali`, `kodepos_wali`, `foto`, `jurusan`, `file_kip`, `file_ktp`, `file_kk`, `file_ijazah`, `file_akte`, `file_shun`, `tgl_mutasi`, `surat_masuk`, `alasan_mutasi`, `asal_sekolah`, `npsn_sekolah`, `seri_ijazah`, `sekolah_mutasi`, `level`, `aktif`, `status`, `tgl_siswa`, `online`, `password`, `jenis`, `kelasmutasi`, `konfirmasi`, `tahun_lulus`, `no_ijazahalumni`, `golongandarah`, `penyakit`) VALUES
(1, '123456789', 'PPDB2023-001', '1', 'Siswa PPDB 2023', '123456789', 'Indonesia', '123456', 'Majalengka', '2023-03-01', '1', 2, 1, 'Islam', 'Presiden', '089660642666', 'abank@kaduacompany.or.id', 'Petualang', 'Orang tua', 'Jawa Barat', 'Kota Cirebon', 'Harjamukti', 'Kecapi', 'Jl. Cirebon Permai III No. 370 Dukuh Semar', '43235252', '41142', 'Gojek', '2 KM', '15 Menit', 'Mandiri', '-', '-', '1', '1', '0', '0', '0', '0', '0', '0', '098765432', '098765432', 'AngHTRbt', '12345668969643', 'Ayahanda', 'Ayahanda', 'Hidup', 'Indonesia', '2464663753783', 'Majalengka', '2023-03-01', 'S1', 'Petani', '500.000', '08912345678', '????', 'Sendiri', 'Jawa Barat', 'Kab. Majalengka', 'Jatitujuh', 'Panyingkiran', 'Gg. Desa no 13', '45458', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '', NULL, NULL, NULL, NULL, NULL, NULL, NULL, 0, 0, NULL, 0, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE `user` (
  `id` int(11) NOT NULL,
  `id_siswa` varchar(100) NOT NULL,
  `name` varchar(128) NOT NULL,
  `email` varchar(128) NOT NULL,
  `image` varchar(128) NOT NULL,
  `password` varchar(256) NOT NULL,
  `role_id` int(11) NOT NULL,
  `is_active` int(1) NOT NULL,
  `date_created` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`id`, `id_siswa`, `name`, `email`, `image`, `password`, `role_id`, `is_active`, `date_created`) VALUES
(6, '', 'Ade Hamiludin', '089660642666', 'default.jpg', '$2y$10$EhccWtjGg.JIpwySYGJ3TOxTfsxcl.ImB8j5YacAzjq/oxcouNJnK', 1, 1, 1552285263),
(12, '123456', 'Siswa PPDB 2023', '123456789', 'avatar-051.jpg', '$2y$10$A/Xe7kP9LXuy4pqggyfTNOPzx98f/uDZW8xxtq67.R2erMlAJ/nVi', 2, 1, 1677724494);

-- --------------------------------------------------------

--
-- Table structure for table `user_access_menu`
--

CREATE TABLE `user_access_menu` (
  `id` int(11) NOT NULL,
  `role_id` int(11) NOT NULL,
  `menu_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `user_access_menu`
--

INSERT INTO `user_access_menu` (`id`, `role_id`, `menu_id`) VALUES
(1, 1, 1),
(3, 2, 2),
(7, 1, 3),
(8, 1, 2);

-- --------------------------------------------------------

--
-- Table structure for table `user_menu`
--

CREATE TABLE `user_menu` (
  `id` int(11) NOT NULL,
  `menu` varchar(128) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `user_menu`
--

INSERT INTO `user_menu` (`id`, `menu`) VALUES
(1, 'Admin'),
(2, 'User'),
(3, 'Menu');

-- --------------------------------------------------------

--
-- Table structure for table `user_role`
--

CREATE TABLE `user_role` (
  `id` int(11) NOT NULL,
  `role` varchar(128) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `user_role`
--

INSERT INTO `user_role` (`id`, `role`) VALUES
(1, 'Administrator'),
(2, 'Member');

-- --------------------------------------------------------

--
-- Table structure for table `user_sub_menu`
--

CREATE TABLE `user_sub_menu` (
  `id` int(11) NOT NULL,
  `menu_id` int(11) NOT NULL,
  `title` varchar(128) NOT NULL,
  `url` varchar(128) NOT NULL,
  `icon` varchar(128) NOT NULL,
  `is_active` int(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `user_sub_menu`
--

INSERT INTO `user_sub_menu` (`id`, `menu_id`, `title`, `url`, `icon`, `is_active`) VALUES
(1, 1, 'Dashboard', 'admin', 'fas fa-fw fa-tachometer-alt', 1),
(2, 2, 'Informasi', 'user/info', 'fas-fa fa-solid fa-volume-high', 1),
(4, 3, 'Menu Management', 'menu', 'fas fa-fw fa-folder', 1),
(5, 3, 'Submenu Management', 'menu/submenu', 'fas fa-fw fa-folder-open', 1),
(7, 1, 'Role', 'admin/role', 'fas fa-fw fa-user-tie', 1),
(8, 2, 'Change Password', 'user/changepassword', 'fas fa-fw fa-key', 0),
(22, 2, 'My Profile', 'user', 'fas fa-fw fa-user', 1),
(23, 2, 'Edit Profile', 'user/edit', 'fas fa-fw fa-user-edit', 1);

-- --------------------------------------------------------

--
-- Table structure for table `user_token`
--

CREATE TABLE `user_token` (
  `id` int(11) NOT NULL,
  `email` varchar(128) NOT NULL,
  `token` varchar(128) NOT NULL,
  `date_created` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `user_token`
--

INSERT INTO `user_token` (`id`, `email`, `token`, `date_created`) VALUES
(9, 'siswa@gmail.com', 'if/c45L0oVOk61p/dzBihpC2bqViRDR1nz9WHhTdxXY=', 1677724494);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `detail_siswa`
--
ALTER TABLE `detail_siswa`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `user_access_menu`
--
ALTER TABLE `user_access_menu`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `user_menu`
--
ALTER TABLE `user_menu`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `user_role`
--
ALTER TABLE `user_role`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `user_sub_menu`
--
ALTER TABLE `user_sub_menu`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `user_token`
--
ALTER TABLE `user_token`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `detail_siswa`
--
ALTER TABLE `detail_siswa`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `user`
--
ALTER TABLE `user`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT for table `user_access_menu`
--
ALTER TABLE `user_access_menu`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT for table `user_menu`
--
ALTER TABLE `user_menu`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `user_role`
--
ALTER TABLE `user_role`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `user_sub_menu`
--
ALTER TABLE `user_sub_menu`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=25;

--
-- AUTO_INCREMENT for table `user_token`
--
ALTER TABLE `user_token`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
