-- phpMyAdmin SQL Dump
-- version 4.8.5
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jul 31, 2020 at 01:46 PM
-- Server version: 10.1.38-MariaDB
-- PHP Version: 7.3.3

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `log_book`
--

-- --------------------------------------------------------

--
-- Table structure for table `barang`
--

CREATE TABLE `barang` (
  `kode_brg` char(16) NOT NULL,
  `nama_brg` varchar(255) NOT NULL,
  `no_seri` varchar(255) NOT NULL,
  `stok` bigint(11) NOT NULL,
  `satuan_id` int(11) NOT NULL,
  `jenis_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `barang`
--

INSERT INTO `barang` (`kode_brg`, `nama_brg`, `no_seri`, `stok`, `satuan_id`, `jenis_id`) VALUES
('AC001', 'ACTINOGRAPH', 'MC.45', 357, 4, 4),
('CS001', 'CAMPBELL STOKES', 'SIAP - 6101/ MC.1a', 711, 4, 1),
('CS002', 'CAMPBELL STOKES', 'SIAP - 6103/ MC.1c', 123, 4, 2),
('CS003', 'CAMPBELL STOKES', 'SIAP - 6102/ MC.1b', 192, 4, 3),
('HL001', 'HILLMAN', 'P.23/Mc.01', 124, 4, 4),
('HV001', 'HV SAMPLER', 'Whatman 1820-9932', 62, 4, 4),
('PP001', 'PENA PIAS', 'F51105-o6R-01', 10, 3, 6),
('SA001', 'SAMPEL AIR HUJAN', '-', 10, 4, 8),
('SA002', 'SAMPEL AIR HUJAN', '-', 15, 4, 9),
('TH001', 'THERMOHYGROGRAPH', 'FL.60877', 251, 4, 5),
('TP001', 'TINTA PIAS', '-', 12, 4, 7);

-- --------------------------------------------------------

--
-- Table structure for table `barang_keluar`
--

CREATE TABLE `barang_keluar` (
  `id_barang_keluar` varchar(16) NOT NULL,
  `user_id` int(11) NOT NULL,
  `barang_id` varchar(10) NOT NULL,
  `jumlah_keluar` bigint(20) NOT NULL,
  `tanggal_keluar` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `barang_keluar`
--

INSERT INTO `barang_keluar` (`id_barang_keluar`, `user_id`, `barang_id`, `jumlah_keluar`, `tanggal_keluar`) VALUES
('T-BK-20032800001', 0, 'CS001', 11, '2020-03-28'),
('T-BK-20032800002', 0, 'SA002', 11, '2020-03-28'),
('T-BK-20032800003', 0, 'SA001', 12, '2020-03-28'),
('T-BK-20032800004', 3, 'CS003', 7, '2020-03-28'),
('T-BK-20040600001', 3, 'TH001', 10, '2020-04-06'),
('T-BK-20040600002', 3, 'HL001', 8, '2020-04-06'),
('T-BK-2007230001', 3, 'TH001', 8, '2020-07-23');

--
-- Triggers `barang_keluar`
--
DELIMITER $$
CREATE TRIGGER `update_stok_keluar` BEFORE INSERT ON `barang_keluar` FOR EACH ROW BEGIN 
UPDATE barang SET barang.stok = barang.stok - NEW.jumlah_keluar WHERE barang.kode_brg = NEW.barang_id ;
END
$$
DELIMITER ;

-- --------------------------------------------------------

--
-- Table structure for table `barang_masuk`
--

CREATE TABLE `barang_masuk` (
  `id_barang_masuk` varchar(168) NOT NULL,
  `user_id` int(11) NOT NULL,
  `barang_id` varchar(10) NOT NULL,
  `jumlah_masuk` bigint(20) NOT NULL,
  `tanggal_masuk` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `barang_masuk`
--

INSERT INTO `barang_masuk` (`id_barang_masuk`, `user_id`, `barang_id`, `jumlah_masuk`, `tanggal_masuk`) VALUES
('T-BM-20032800001', 3, 'SA001', 10, '2020-03-28'),
('T-BM-20040200001', 3, 'SA002', 5, '2020-04-02'),
('T-BM-20040600001', 3, 'SA002', 10, '2020-04-06'),
('T-BM-2007230001', 3, 'TP001', 5, '2020-07-23'),
('T-BM-2007250001', 20, 'CS003', 12, '2020-07-25');

--
-- Triggers `barang_masuk`
--
DELIMITER $$
CREATE TRIGGER `update_stok_masuk` BEFORE INSERT ON `barang_masuk` FOR EACH ROW BEGIN 
UPDATE barang SET barang.stok = barang.stok + NEW.jumlah_masuk WHERE barang.kode_brg = NEW.barang_id ;
END
$$
DELIMITER ;

-- --------------------------------------------------------

--
-- Table structure for table `data_alat`
--

CREATE TABLE `data_alat` (
  `id` int(11) NOT NULL,
  `nama_alat` varchar(128) NOT NULL,
  `merk` varchar(128) NOT NULL,
  `type` varchar(128) NOT NULL,
  `sn` varchar(128) NOT NULL,
  `lokasi` varchar(255) NOT NULL,
  `rentang` double NOT NULL,
  `resolusi` double NOT NULL,
  `keterangan` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `data_alat`
--

INSERT INTO `data_alat` (`id`, `nama_alat`, `merk`, `type`, `sn`, `lokasi`, `rentang`, `resolusi`, `keterangan`) VALUES
(2, 'Actinograph', 'qwerty', '', '123456', 'Taman alat, Stasiun Klimatologi Lombok Barat', 0.5, 0.2, '-'),
(3, 'Campbell  Stokes', 'qwerty', '', '123456', 'Taman alat, Stasiun Klimatologi Lombok Barat', 0.5, 0.2, '-'),
(4, 'Digital Pyranometer', 'qwerty', '', '123456', 'Taman alat, Stasiun Klimatologi Lombok Barat', 0.5, 0.2, '-'),
(5, 'Digital Shunsine Recorder ', 'qwerty', '', '123456', 'Taman alat, Stasiun Klimatologi Lombok Barat', 0.5, 0.2, '-'),
(6, 'Thermometer BB-BK', 'qwerty', '', '12345', 'Taman alat, Stasiun Klimatologi Lombok Barat', 0.5, 0.2, '-'),
(7, 'Thermometer Max-Min ', 'qwerty', '', '123456', 'Taman alat, Stasiun Klimatologi Lombok Barat', 0.5, 0.2, '-'),
(8, 'Digital Thermometer ', 'qwerty', '', '123456', 'Taman alat, Stasiun Klimatologi Lombok Barat', 0.5, 0.2, '-'),
(9, 'Thermohygrograph ', 'qwerty', '', '123456', 'Taman alat, Stasiun Klimatologi Lombok Barat', 0.5, 0.2, '-'),
(10, 'Thermometer Tanah', 'qwerty', '', '123456', 'Taman alat, Stasiun Klimatologi Lombok Barat', 0.5, 0.2, '-'),
(11, 'Lysimeter', 'qwerty', '', '123456', 'Taman alat, Stasiun Klimatologi Lombok Barat', 0.5, 0.2, '-'),
(12, 'Open Pan Evaporimeter', 'qwerty', '', '123456', 'Taman alat, Stasiun Klimatologi Lombok Barat', 0.5, 0.2, '-'),
(13, 'Digital Barometer', 'qwerty', '', '123456', 'Taman alat, Stasiun Klimatologi Lombok Barat', 0.5, 0.2, '-'),
(14, 'Anemometer ', 'qwerty', '', '123456', 'Taman alat, Stasiun Klimatologi Lombok Barat', 0.5, 0.2, '-'),
(15, 'Cup Counter Anemometer 2 m ', 'qwerty', '', '12345', 'Taman alat, Stasiun Klimatologi Lombok Barat', 0.5, 0.2, '-'),
(16, 'Cup Counter Anemometer 0.5 m ', 'qwerty', '', '123456', 'Taman alat, Stasiun Klimatologi Lombok Barat', 0.5, 0.2, '-'),
(17, 'ARG Lambrecht ', 'qwerty', '', '123456', 'Taman alat, Stasiun Klimatologi Lombok Barat', 0.5, 0.2, ''),
(18, 'Penakar Hujan Obs ', 'qwerty', '', '123456', 'Taman alat, Stasiun Klimatologi Lombok Barat', 0.5, 0.2, '-'),
(19, 'Penakar Hujan Hellman ', 'qwert', '', '123456', 'Taman alat, Stasiun Klimatologi Lombok Barat', 0.5, 0.2, '-'),
(20, 'AAWS', 'QWERTY', '', '12345', 'Taman alat, Stasiun Klimatologi Lombok Barat', 0.5, 0.2, ''),
(21, 'ASRS', 'qwerty', '', '123456', 'Taman alat, Stasiun Klimatologi Lombok Barat', 0.5, 0.2, '-'),
(22, 'HVA Sampler', 'qwerty', '', '123456', 'Taman alat, Stasiun Klimatologi Lombok Barat', 0.5, 0.2, '-'),
(23, 'ARWS', 'qwerty', '', '123456', 'Taman alat, Stasiun Klimatologi Lombok Barat', 0.5, 0.2, '-'),
(27, 'Iklim Mikro', 'campbell', '', '123456', 'Taman alat, Stasiun Klimatologi Lombok Barat', 0, 0, '-');

-- --------------------------------------------------------

--
-- Table structure for table `data_lokasi`
--

CREATE TABLE `data_lokasi` (
  `id` int(255) NOT NULL,
  `id_stasiun` varchar(18) NOT NULL,
  `tipe` varchar(55) NOT NULL,
  `nama_stasiun` varchar(255) NOT NULL,
  `alamat` varchar(255) NOT NULL,
  `kab` varchar(255) NOT NULL,
  `latitude` float(10,6) NOT NULL,
  `longitude` float(10,6) NOT NULL,
  `elevasi` int(225) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `data_lokasi`
--

INSERT INTO `data_lokasi` (`id`, `id_stasiun`, `tipe`, `nama_stasiun`, `alamat`, `kab`, `latitude`, `longitude`, `elevasi`) VALUES
(1, '150319', '', 'ARG Tambora', 'Jl. Lintas Santoda Desa Rasabou', 'Bima', -8.160000, 118.000000, 24),
(2, '150320', '', 'ARG Donggo', 'BPP Donggo, Jl. Pesanggrahan depan UPT Puskesmas Donggo', 'Bima', -8.424250, 118.595779, 677);

-- --------------------------------------------------------

--
-- Table structure for table `detail_transaksi`
--

CREATE TABLE `detail_transaksi` (
  `id` int(11) NOT NULL,
  `transaksi_id` int(11) NOT NULL,
  `kode_barang` varchar(168) NOT NULL,
  `jumlah` bigint(15) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `entry_log`
--

CREATE TABLE `entry_log` (
  `id_entry` int(11) NOT NULL,
  `tanggal` date NOT NULL,
  `user_id` int(11) NOT NULL,
  `jenis_pkj` varchar(125) NOT NULL,
  `alat_id` int(11) NOT NULL,
  `jadwal_dns` varchar(125) NOT NULL,
  `keterangan` varchar(255) NOT NULL,
  `image` varchar(125) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `jenis`
--

CREATE TABLE `jenis` (
  `id_jenis` int(11) NOT NULL,
  `nama_jenis` varchar(216) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `jenis`
--

INSERT INTO `jenis` (`id_jenis`, `nama_jenis`) VALUES
(1, 'LURUS'),
(2, 'LENGKUNG PANJANG'),
(3, 'LENGKUNG PENDEK'),
(4, 'PIAS HARIAN'),
(5, 'PIAS MINGGUAN'),
(6, 'PENA'),
(7, 'CAIRAN'),
(8, 'TABUNG'),
(9, 'BOTOL'),
(10, 'NONE');

-- --------------------------------------------------------

--
-- Table structure for table `kondisi`
--

CREATE TABLE `kondisi` (
  `id` int(11) NOT NULL,
  `nama_kondisi` varchar(55) NOT NULL,
  `bobot` double NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `kondisi`
--

INSERT INTO `kondisi` (`id`, `nama_kondisi`, `bobot`) VALUES
(1, 'Pasti ya', 1),
(2, 'Hampir pasti ya', 0.8),
(3, 'Kemungkinan besar ya', 0.6),
(4, 'Mungkin ya', 0.4),
(5, 'Tidak tahu', 0.2),
(6, 'Pasti tidak', 0);

-- --------------------------------------------------------

--
-- Table structure for table `meta_dt`
--

CREATE TABLE `meta_dt` (
  `id` int(11) NOT NULL,
  `nama_sta` varchar(100) NOT NULL,
  `type_sta` varchar(100) NOT NULL,
  `id_sta` varchar(100) NOT NULL,
  `lat` float(10,6) NOT NULL,
  `lng` float(10,6) NOT NULL,
  `elevasi` int(100) NOT NULL,
  `desa` varchar(100) NOT NULL,
  `kec` varchar(100) NOT NULL,
  `kab` varchar(100) NOT NULL,
  `prov` varchar(100) NOT NULL,
  `th_pasang` int(4) NOT NULL,
  `thn_insp` int(4) NOT NULL,
  `status` varchar(65) NOT NULL,
  `kondisi` varchar(20) NOT NULL,
  `pengamat` varchar(30) NOT NULL,
  `telp` varchar(30) NOT NULL,
  `alamat` varchar(225) NOT NULL,
  `kirim_data` varchar(10) NOT NULL,
  `bmkgsoft` varchar(5) NOT NULL,
  `periode` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `meta_dt`
--

INSERT INTO `meta_dt` (`id`, `nama_sta`, `type_sta`, `id_sta`, `lat`, `lng`, `elevasi`, `desa`, `kec`, `kab`, `prov`, `th_pasang`, `thn_insp`, `status`, `kondisi`, `pengamat`, `telp`, `alamat`, `kirim_data`, `bmkgsoft`, `periode`) VALUES
(1, 'Ampenan', 'Obs', '52710401a', -8.618000, 116.083000, 28, 'Jempong Baru', 'Sekarbela', 'Kota Mataram', 'NTB', 2018, 2018, 'BMKG', 'B', 'Sirwan ', '8175758406', 'BPP  Sekarbela, Jl. Dr. Soejono No. 10 Lingkar Selatan', 'AKTIF', 'YA', '1992-2019'),
(2, 'Cakranegara', 'Obs', '52710301a', -8.567000, 116.134003, 58, 'Sayang-sayang', 'Cakranegara', 'Kota Mataram', 'NTB', 2012, 2018, 'BMKG', 'B', 'I Komang Wiartha S.', '81917160161', 'BP3K Cakranegara,  Jl. Ahmad Yani, Sayang-sayang', 'AKTIF', 'YA', '1993-2019'),
(3, 'Majeluk', 'Obs', '52710501a', -8.580000, 116.121002, 28, 'Monjok Timur', 'Selaparang', 'Kota Mataram', 'NTB', 2012, 2018, 'BMKG', 'B', 'Gusti Ayu ', '87864359303', 'Dinas Pertanian Kota Mataram, Jl. Transmigrasi No. 72', 'AKTIF', 'YA', '1993-2019'),
(4, 'Selaparang', 'Obs', '52710502a', -8.559000, 116.107002, 12, 'Rembiga', 'Selaparang', 'Kota Mataram', 'NTB', 2017, 2018, 'BMKG', 'B', 'M. Hasanaen Haikal', '81803626048', 'Komplek Perumahan TNI AU Rembiga, TK Angkasa', 'AKTIF', 'YA', '1971-2019'),
(5, 'Batulayar', 'Obs', '52011401a', -8.540000, 116.081001, 13, 'Meninting', 'Batu Layar', 'Lombok Barat', 'NTB', 2012, 2018, 'BMKG', 'B', 'Saadudin', '087765067833 / 081933153893', 'Puskeswan Batulayar, Jl. Sandik Raya Dusun Penyangget', 'AKTIF', 'YA', '2009-2019'),
(6, 'Buwun Mas', 'Obs', '52010703a', -8.856000, 116.082001, 46, 'Buwun Mas', 'Sekotong', 'Lombok Barat', 'NTB', 2013, 2018, 'BMKG', 'B', 'Saharudin/Fatimah', '82340941275', 'Rumah Pak Saharudin Buwun Mas (Dekat Belokan dan Masjid setelah SD 3 Buwun Mas)', 'AKTIF', 'YA', '2014-2019'),
(7, 'Banyu Urip/Banter', 'Obs', '52010102a', -8.730000, 116.154999, 36, 'Banyu Urip', 'Gerung', 'Lombok Barat', 'NTB', 2014, 2018, 'BMKG', 'B', 'Aripin', '85243401910', 'Rumah Pak Aripin, Dusun Banter, Desa Banyu Urip (depan Musholla)', 'AKTIF', 'YA', '2015-2019'),
(8, 'Gerung', 'Obs', '52010101a', -8.678000, 116.116997, 59, 'Gerung Utara', 'Gerung', 'Lombok Barat', 'NTB', 2012, 2018, 'BMKG', 'B', 'Nurul Aini', '085904316392 / 081805208518', 'Dinas Pertanian dan Perkebunan Lombok Barat, Gerung', 'AKTIF', 'YA', '1995-2019'),
(9, 'Gunung Sari', 'Obs', '52010901a', -8.540000, 116.098999, 12, 'Gunung Sari', 'Gunung sari', 'Lombok Barat', 'NTB', 2012, 2018, 'BMKG', 'B', 'Sidik Rahman', '81907666464', 'BP3K Gunung Sari,  Jl. Pariwisata, Gunung Sari', 'AKTIF', 'YA', '1992-2019'),
(10, 'Labuapi', 'Obs', '52010801a', -8.628000, 116.122002, 69, 'Labuapi', 'Labuapi', 'Lombok Barat', 'NTB', 2014, 2018, 'BMKG', 'B', 'Jaswandi, SP', '81917901405', 'UPTD Pertanian Kec. Labuapi, Lombok Barat', 'AKTIF', 'YA', '2014-2019'),
(11, 'Lembar', 'Obs', '52011301a', -8.734000, 116.087997, 43, 'Labuan Tereng', 'Lembar', 'Lombok Barat', 'NTB', 2012, 2018, 'BMKG', 'B', 'Syarif Hidayatullah', '83142619439', 'UPTD Pertanian dan Peternakan Lembar, Desa Kebon Talo, Labuan Tereng ', 'AKTIF', 'YA', '2002-2019'),
(12, 'Narmada', 'Obs', '52010301a', -8.597000, 116.221001, 142, 'Peresak', 'Narmada', 'Lombok Barat', 'NTB', 2012, 2018, 'BMKG', 'B', 'L. Hamdan F, M.Si', '08175789102 / 085287187673', 'BPTPH Propinsi NTB, Jl. Raya Peninjauan Narmada', 'AKTIF', 'YA', '1997-2019'),
(13, 'Pelangan', 'Obs', '52010702a', -8.794000, 116.933998, 37, 'Pelangan', 'Sekotong', 'Lombok Barat', 'NTB', 2013, 2018, 'BMKG', 'B', 'I Ketut Diarsa', '8175700577', 'Rumah Pak Ketut Diarsa,Dusun Pelangan Tengah, Desa Pelangan (setelah bengkel Honda)', 'AKTIF', 'YA', '2013-2019'),
(14, 'Rumak', 'Obs', '52010201a', -8.698000, 116.403000, 43, 'Rumak', 'Kediri', 'Lombok Barat', 'NTB', 2012, 2018, 'BMKG', 'B', 'Pardan Mulyono', '87865600085', 'BPP Rumak Kecamatan Kediri (Jl. Kediri-Labuapi)', 'AKTIF', 'YA', '2009-2019'),
(15, 'Sekotong', 'Obs', '52010701a', -8.773000, 116.053001, 14, 'Candi Manik', 'Sekotong', 'Lombok Barat', 'NTB', 2012, 2018, 'BMKG', 'B', 'Sodiq', '81907075108', 'UPTD Sekotong, Desa Candimanik, Empol (setelah SMKN 1 Sekotong masuk gang di utara jalan)', 'AKTIF', 'YA', '2009-2019'),
(16, 'Sigerongan', 'Obs', '52011201a', -8.566000, 116.163002, 43, 'Sigerongan', 'Lingsar', 'Lombok Barat', 'NTB', 2012, 2018, 'BMKG', 'B', 'Sukomo', '8175772546', 'Pusat Pengembangan Agribisnis (SMK PP Sigerongan Lingsar)', 'AKTIF', 'YA', '2004-2019'),
(17, 'Kediri', 'Obs', '52010202a', -8.636000, 116.170998, 52, 'Montong Are', 'Kediri', 'Lombok Barat', 'NTB', 2012, 2018, 'BMKG', 'B', 'Staklim LOBAR', '87865660555', 'Stasiun Klimatologi Kediri', 'AKTIF', 'YA', '1998-2019'),
(18, 'Bayan', 'Obs', '52080401a', -8.245000, 116.431999, 55, 'Anyar', 'Bayan', 'Lombok Utara', 'NTB', 2012, 2018, 'BMKG', 'B', 'Hidayati, S.Sos', '87864618038', 'UPTD KPP Kec. Bayan, Jl. Raya Bayan ? Snaru', 'AKTIF', 'YA', '1997-2019'),
(19, 'Gangga', 'Obs', '52080201a', -8.349000, 116.431999, 13, 'Gondang', 'Gangga', 'Lombok Utara', 'NTB', 2012, 2018, 'BMKG', 'B', 'Gunatih/Rhezna ', '0819076377259 / 082340221546', 'Disperta Lombok Utara, Jl. Raya Tanjung - Gondang ', 'AKTIF', 'YA', '2009-2019'),
(20, 'Pemenang', 'Obs', '52080501a', -8.400000, 116.100998, 7, 'Pemenang Barat', 'Pemenang', 'Lombok Utara', 'NTB', 2012, 2018, 'BMKG', 'B', 'Endarung Simon, SP', '81237825762', 'Dinas Ketahanan Pangan dan Pertanian Lombok Utara, Jalan Bangsal Baru, Pemenang', 'AKTIF', 'YA', '2009-2019'),
(21, 'Pemenang Timur', 'Obs', '52080502a', -8.461000, 116.236000, 20, 'Pemenang Timur', 'Pemenang', 'Lombok Utara', 'NTB', 2014, 2018, 'BMKG', 'B', 'Hulaepi/Masud', '8.23E+11', 'SDN NO 2 Pemenang Timur, Dusun Trengan Tanak Ampar, Pemenang Timur', 'AKTIF', 'YA', '2017-2019'),
(22, 'Sambik Bangkol', 'Obs', '52080202a', -8.323000, 116.262001, 336, 'Sambik Bangkol', 'Gangga', 'Lombok Utara', 'NTB', 2013, 2018, 'BMKG', 'B', 'Ahmad Lahirudin/Dewi A.', '085337886220 / 082340992669', 'Rumah Pengamat Ketua Kelompok Tani Desa Sambik Bangkol, Gangga', 'AKTIF', 'YA', '2014-2019'),
(23, 'Senaru', 'Obs', '52080402a', -8.291000, 116.431999, 433, 'Senaru', 'Bayan', 'Lombok Utara', 'NTB', 2018, 2018, 'BMKG', 'B', 'Ayusan', '82340711015', 'Rumah Pengamat, Jl. Raya Tanjung Dusun Lendang Cempaka, Desa Senaru', 'AKTIF', 'YA', '2014-2019'),
(24, 'Tanjung', 'Obs', '52080101a', -8.356000, 116.151001, 13, 'sokong', 'Tanjung', 'Lombok Utara', 'NTB', 2018, 2018, 'BMKG', 'B', 'Wayan T. Sujendra', '817368164', 'Puskeswan Tanjung, Jl. Raya Tanjung (Belakang Terminal Tanjung)', 'AKTIF', 'YA', '1995-2019'),
(25, 'Santong', 'Obs', 'STA3251', -8.318000, 116.285004, 450, 'Santong', 'Kayangan', 'Lombok Utara', 'NTB', 2011, 2018, 'BMKG', 'B', 'Diantip', '085238881302 / 081917951383', 'UPB Santong (Unit Produksi Benih), Santong Timer Desa Santong', 'AKTIF', 'YA', '2014-2019'),
(26, 'Btukliang Utara', 'Obs', '52021201a', -8.626000, 116.306000, 346, 'Tratak', 'Batukliang', 'Lombok Tengah', 'NTB', 2012, 2018, 'BMKG', 'B', 'Aripin', '87765273771', 'UPT HAPENTAN dan KESWAN ,Kec. Batukliang Utara', 'AKTIF', 'YA', '2009-2019'),
(27, 'Batu Nyala', 'Obs', '52021001A', -8.732000, 116.311996, 3, 'Batu Nyala', 'Praya Tengah', 'Lombok Tengah', 'NTB', 2016, 2018, 'BMKG', 'B', 'Suprayanti ', '8175792296', 'UPT HTP DINKESWAN Praya Tengah, Jl. Batu Nyala - Sengkol', 'AKTIF', 'YA', '2016-2019'),
(28, 'Darek', 'Obs', '52021101a', -8.735000, 116.203003, 58, 'Darek', 'Praya Barat Daya', 'Lombok Tengah', 'NTB', 2014, 2018, 'BMKG', 'B', 'Aspari Endi ', '81805738345', 'UPT HAPENTAN dan KESWAN, PBD Darek Baleluwah ', 'AKTIF', 'YA', '2015-2019'),
(29, 'Janapria', 'Obs', '52020701a', -8.698000, 116.403000, 283, 'Janapria', 'Janapria', 'Lombok Tengah', 'NTB', 2012, 2018, 'BMKG', 'B', 'L. Sulaiman ', '81917155549', 'UPT BPP Kec. Janapria, Dsn  Batu Bungus Desa Janapria', 'AKTIF', 'YA', '1997-2019'),
(30, 'Kopang', 'Obs', '52020901a', -8.636000, 116.372002, 343, 'Montong Gamang', 'Kopang', 'Lombok Tengah', 'NTB', 2012, 2018, 'BMKG', 'B', 'Muhidin', '81907201804', 'UPT HAPENTAN dan KESWAN, Jl. H.M. Saleh Montong Gamang, Kopang', 'AKTIF', 'YA', '1997-2019'),
(31, 'Mantang', 'Obs', '52020301a', -8.626000, 116.306000, 0, 'Barabali', 'Batukliang', 'Lombok Tengah', 'NTB', 2012, 2018, 'BMKG', 'B', 'Sugeng Sugianto', '81805716672', 'UPT HAPENTAN & KESWAN Desa Barabali, Kec. Batukliang', 'AKTIF', 'YA', '2009-2019'),
(32, 'Mertak', 'Obs', '52020402a', -8.818000, 116.393997, 36, 'Mertak', 'Praya Timur', 'Lombok Tengah', 'NTB', 2013, 2018, 'BMKG', 'B', 'Wari ', '85205200725', 'Rumah Pak Wari, Jl. Kuta Arang, Dusun Sengkrang, Mertak, Praya Timur', 'AKTIF', 'YA', '2014-2019'),
(33, 'Mujur', 'Obs', '52020601a', -8.732000, 116.311996, 3, 'Mujur', 'Praya Timur', 'Lombok Tengah', 'NTB', 2012, 2018, 'BMKG', 'B', 'Lalu Aulia Rahman', '81703316690', 'UPT BKP3 Praya Timur, Jl. Mujur-Keruak (Dekat Pertamina)', 'AKTIF', 'YA', '1992-2019'),
(34, 'Mujur2/Bilelando', 'Obs', '52020602a', -8.818000, 116.393997, 47, 'Bilelando', 'Praya Timur', 'Lombok Tengah', 'NTB', 2013, 2018, 'BMKG', 'B', 'Fajar Sidik', '87952841595', 'Rumah Pengamat, Jl. Ganti Batunampak, Ds. Kubur Batu, Bilelando', 'AKTIF', 'YA', '2016-2019'),
(35, 'Praya', 'Obs', '52020101a', -8.696000, 116.280998, 124, 'Aikmual', 'Praya', 'Lombok Tengah', 'NTB', 2012, 2018, 'BMKG', 'B', 'Bq. Annisya Desiana, SP', '81933161610', 'UPT HPT & KESWAN Kec. Praya Dusun Ketejer', 'AKTIF', 'YA', '1992-2019'),
(36, 'Penujak', 'Obs', '52020501a', -8.742000, 116.240997, 60, 'Penujak', 'Praya Barat', 'Lombok Tengah', 'NTB', 2012, 2018, 'BMKG', 'B', 'Hariady Sunarno', '87865879797', 'UPT HAPENTAN dan KESWAN, Aikmual', 'AKTIF', 'YA', '1995-2019'),
(37, 'Pringgarata', 'Obs', '52020801a', -8.614000, 116.240997, 161, 'Pringgarata', 'Pringgarata', 'Lombok Tengah', 'NTB', 2012, 2018, 'BMKG', 'B', 'Muhanan ', '081805295208 / 087864219255', 'UPT HAPENTAN dan KESWAN Pringgarata, Jl. Raya Pringgarata', 'AKTIF', 'YA', '2009-2019'),
(38, 'Pujut', 'Obs', '52020401a', -8.813000, 116.292000, 98, 'Sengkol', 'Pujut', 'Lombok Tengah', 'NTB', 2012, 2018, 'BMKG', 'B', 'Herlianjaya', '87862796583', 'UPTH HPT dan KESWAN Kec. Pujut, Jl. Raya Kuta (Dekat lapangan sengkol)', 'AKTIF', 'YA', '2007-2019'),
(39, 'Puyung', 'Obs', '52020201a', -8.681000, 116.236000, 115, 'Puyung', 'Jonggat', 'Lombok Tengah', 'NTB', 2012, 2018, 'BMKG', 'B', 'Juliati ', '87865904715', 'BBI Puyung, depan SPBU Puyung', 'AKTIF', 'YA', '1997-2019'),
(40, 'Selong Belanak', 'Obs', '52020502a', -8.857000, 116.153999, 15, 'Selong belanak', 'Praya Barat', 'Lombok Tengah', 'NTB', 2016, 2018, 'BMKG', 'B', 'Haji Lalu Anwar', '82145347128', 'Rumah Pengamat, Ds. Tomangomang, Selong Belanak', 'AKTIF', 'YA', '2016-2019'),
(41, 'Stamet BIL', 'Obs', '52020403a', -8.561000, 116.094002, 13, 'Tanak Awu', 'Pujut', 'Lombok Tengah', 'NTB', 0, 2018, 'BMKG', 'B', 'Stamet BIL', '8113901079', 'Kantor Stasiun Meteorologi BIL Praya', 'AKTIF', 'YA', '2011-2019'),
(42, 'Aikmel', 'Obs', '52030901a', -8.585000, 116.510002, 284, 'Lenek', 'Aikmel', 'Lombok Timur', 'NTB', 2012, 2018, 'BMKG', 'B', 'Abdul Hakim ', '81997766774', 'UPTPP Kecamatan Aikmel, Jalan Raya Mataram-Labuhan Lombok Km 53 ', 'AKTIF', 'YA', '2009-2019'),
(43, 'Jerowaru/Sepapan', 'Obs', '52032001a', -8.774000, 116.476997, 15, 'Sepapan', 'Jerowaru', 'Lombok Timur', 'NTB', 2012, 2018, 'BMKG', 'B', 'Baiq Mariana, STP', '82340082205', 'BP3K Kec. Jerowaru, Desa Sepapan', 'AKTIF', 'YA', '2009-2019'),
(44, 'Kr Baru Timur/Wanasaba', 'Obs', '52031401a', -8.530000, 116.544998, 400, 'Karang Baru Timur', 'Wanasaba', 'Lombok Timur', 'NTB', 2014, 2018, 'BMKG', 'B', 'Zuhratul Anwariah', '81907297793', 'Kelompok Tani Paok Nangka IV, Karang Baru Timur', 'AKTIF', 'YA', '2015-2019'),
(45, 'Keruak', 'Obs', '52030101a', -8.733000, 116.452003, 106, 'Setungkep Lingsar', 'Keruak', 'Lombok Timur', 'NTB', 2014, 2018, 'BMKG', 'B', 'Solihin', '81805442209', 'Sawah Pengamat, Desa Setungkep Lingsar, Keruak', 'AKTIF', 'YA', '2015-2019'),
(46, 'Kokok Putih/Sembalun', 'Obs', '52031502a', -8.261000, 116.481003, 127, 'Bilok Petung', 'Sembalun', 'Lombok Timur', 'NTB', 2013, 2018, 'BMKG', 'B', 'Suaib', '81997983411', 'Rumah Pengamat, Jl. Raya Sembalun Pariwisata, Desa Bilok Petung, Sembalun', 'AKTIF', 'YA', '2014-2019'),
(47, 'Kotaraja/Montong Gading', 'Obs', '52031101a', -8.595000, 116.407997, 380, 'Pringga Jurang', 'Montong Gading', 'Lombok Timur', 'NTB', 2012, 2018, 'BMKG', 'B', 'Muhammad', '818541141', 'Puskeswan Mt. Gading (sebelah Polsek Mt. Gading)', 'AKTIF', 'YA', '1997-2019'),
(48, 'Labuhan Haji', 'Obs', '52031701a', -8.694000, 116.569000, 51, 'Labuhan Haji', 'Labuhan Haji', 'Lombok Timur', 'NTB', 2014, 2018, 'BMKG', 'B', 'Baiq Sulfitriana, SP', '85937030202', 'Sawah Pengamat (Belakang Koramil Labuhan Haji)', 'AKTIF', 'YA', '2007-2019'),
(49, 'Labuhan Pandan', 'Obs', '52031002a', -8.307000, 116.639999, 71, 'Labuhan Pandan', 'Sambelia', 'Lombok Timur', 'NTB', 2013, 2018, 'BMKG', 'B', 'Kasriadi', '81918203033', 'Kantor Desa Labuhan Pandan', 'AKTIF', 'YA', '2014-2019'),
(50, 'Lenek Duren', 'Obs', '52030902a', -8.533000, 116.481003, 600, 'Lenek Duren', 'Aikmel', 'Lombok Timur', 'NTB', 2013, 2018, 'BMKG', 'B', 'Hasri Wulan ', '8191725814', 'Kantor Desa Lenek Duren', 'AKTIF', 'YA', '2014-2019'),
(51, 'Masbagik', 'Obs', '52030501a', -8.616000, 116.487000, 215, 'Masbagik Barat', 'Masbagik', 'Lombok Timur', 'NTB', 2012, 2018, 'BMKG', 'B', 'H. Husnul Yakin', '87865123300', 'UPT PP Kec. Masbagik (Jalan Masbagik-Labuan Lombok)', 'AKTIF', 'YA', '2009-2019'),
(52, 'Montong Baan/Sikur', 'Obs', '52030401a', -8.637000, 116.427002, 292, 'Montong Baan Selatan', 'Sikur', 'Lombok Timur', 'NTB', 2012, 2018, 'BMKG', 'B', 'Syahrullah/Muhammad', '081917941918 / 0818541141', 'UPT - PP Kec. Sikur (BPP Montong Are) Kec. Sikur, Lombok Timur', 'AKTIF', 'YA', '1995-2019'),
(53, 'Perigi', 'Obs', '52031602a', -8.509000, 116.614998, 156, 'Perigi', 'Swela', 'Lombok Timur', 'NTB', 2013, 2018, 'BMKG', 'B', 'Irwandi', '081803660982 / 087861710864', 'Rumah amak Sandy Desa Perigi', 'AKTIF', 'YA', '2014-2019'),
(54, 'Pringgabaya', 'Obs', '52030801a', -8.531000, 116.638000, 20, 'Pringgabayan Utara', 'Pringgabayan', 'Lombok Timur', 'NTB', 2012, 2018, 'BMKG', 'B', 'L. Hadiarta Wiguna', '81916816006', 'UPT-PP Pringgabayan, Desa Pringgabayan Utara', 'AKTIF', 'YA', '2009-2019'),
(55, 'Pringgasela', 'Obs', '52031201a', -8.576000, 116.455002, 380, 'Pringgasela', 'Pringgasela', 'Lombok Timur', 'NTB', 2014, 2018, 'BMKG', 'B', 'Mudjianto', '087743265939 / 081997988198', 'UPT-PP Pringgasela', 'AKTIF', 'YA', '2015-2019'),
(56, 'Rarang Selatan', 'Obs', '52030302a', -8.662000, 116.389000, 308, 'Rarang Selatan', 'Terara', 'Lombok Timur', 'NTB', 2013, 2018, 'BMKG', 'B', 'Suwandi', '8175783602', 'Rumah Pengamat, Dusun Seganteng-Rarang Selatan', 'AKTIF', 'YA', '2015-2019'),
(57, 'Rensing Sakra Barat', 'Obs', '52031901a', -8.726000, 116.464996, 220, 'Rensing', 'Sakra Barat', 'Lombok Timur', 'NTB', 2014, 2018, 'BMKG', 'B', 'Baiq Dinia Ulviana, SP', '081933158904 / 085244658167', 'UPP Kec. Sakra Barat ', 'AKTIF', 'YA', '2015-2019'),
(58, 'Sambelia', 'Obs', '52031001a', -8.388000, 116.706001, 92, 'Senang Galih', 'Sambelia', 'Lombok Timur', 'NTB', 2012, 2018, 'BMKG', 'B', 'Salam Wijaya ', '81915778893', 'BP3K Kec. Sambelia', 'AKTIF', 'YA', '2009-2019'),
(59, 'Sembalun', 'Obs', '52031501a', -8.044000, 116.527000, 1151, 'Sembalun Lawang', 'Sembalun', 'Lombok Timur', 'NTB', 2012, 2018, 'BMKG', 'B', 'Muhammad Yuna', '082340980248 / 087762849161', 'UPT-PP Kec. Sembalun, Jl. Pariwisata Gg. Pasar Mentagi Sembalun', 'AKTIF', 'YA', '2009-2019'),
(60, 'Sukamulia/Dasan Lekong', 'Obs', '52030601a', -8.639000, 116.490997, 276, 'Dasan Lekong', 'Sukamulia', 'Lombok Timur', 'NTB', 2012, 2018, 'BMKG', 'B', 'Endayani', '8175735182', 'UPP Sukamulia, Jalan Raya Padamasa Dasan Lekong ', 'AKTIF', 'YA', '1997-2019'),
(61, 'Swela', 'Obs', '52031601a', -8.525000, 116.578003, 200, 'Swela', 'Swela', 'Lombok Timur', 'NTB', 2012, 2018, 'BMKG', 'B', 'Muhammad Amin', '81803662771', 'Kantor UPTD Kec. Swela', 'AKTIF', 'YA', '2007-2019'),
(62, 'Terara', 'Obs', '52030301a', -8.657000, 116.424004, 286, 'Terara', 'Terara', 'Lombok Timur', 'NTB', 2012, 2018, 'BMKG', 'B', 'Sodikin Agani', '81997773939', 'UPT-PP Kec. Terara, Jalan Terara Pandan Duri Km 3', 'AKTIF', 'YA', '2015-2019'),
(63, 'Brang Ene', 'Obs', '52070701a', -8.773000, 116.869003, 0, 'Kalimontong', 'Brang Ene', 'Sumbawa Barat', 'NTB', 2015, 2018, 'BMKG', 'B', 'Tomy Nofriansah, SP', '82146666701', 'Kantor Cabang Dinas Pertanian, Desa Kalimontong, Brang Ene ', 'AKTIF', 'YA', '2017-2019'),
(64, 'Brang Rea', 'Obs', '52070501a', -8.697000, 116.990997, 0, 'Bru', 'Brang Rea', 'Sumbawa Barat', 'NTB', 2015, 2018, 'BMKG', 'B', 'Nurfadilah', '087863762772 / 081239349136', 'BP3K Brang Rea, Jl. Raya Brang Rea, Desa Bru, Sumbawa Barat', 'AKTIF', 'YA', '2016-2019'),
(65, 'Maluk', 'Obs', '52070801a', -8.918000, 116.758003, 0, 'Maluk', 'Maluk', 'Sumbawa Barat', 'NTB', 2014, 2018, 'BMKG', 'B', 'Bunamin', '085238732764 / 085338905944', 'Rumah Pengamat, Jl Raya Maluk Loka, Desa Maluk, Sumbawa Barat', 'AKTIF', 'YA', '2017-2019'),
(66, 'Tano', 'Obs', '52070601a', -8.583000, 116.845001, 25, 'Senayan', 'Poto Tano', 'Sumbawa Barat', 'NTB', 2012, 2018, 'BMKG', 'B', 'Ramli', '085253923623 / 087863514960', 'BBI Kec. Pototano, Jl. Lintas Seteluk - Pototano, Desa Senayan', 'AKTIF', 'YA', '2011-2019'),
(67, 'Tapir/Seteluk', 'Obs', '52070301a', -8.633000, 116.859001, 0, 'Tapir', 'Seteluk', 'Sumbawa Barat', 'NTB', 2012, 2018, 'BMKG', 'B', 'Risal/Syafarudin, SP', '087882078976 / 081909281833', 'BP3K Seteluk, Jl. Lintas Taliwang, Desa Tapir, Seteluk', 'AKTIF', 'YA', '1998-2019'),
(68, 'Jereweh', 'Obs', '52070101a', -8.867000, 116.822998, 6, 'Belo', 'Jereweh', 'Sumbawa Barat', 'NTB', 2012, 2018, 'BMKG', 'B', 'Baharudin, SP', '085338059443 / 081935937973', 'DISHUTBUNTAN KCD Pertanian Jereweh, Jl. Lintas Taliwang-Maluk', 'AKTIF', 'YA', '2011-2019'),
(69, 'Taliwang', 'Obs', '52070202a', -8.756000, 116.853996, 0, 'Taliwang', 'Taliwang', 'Sumbawa Barat', 'NTB', 2015, 2018, 'BMKG', 'B', 'Haris Bawadiman', '081935934920 / 085238577782', 'Komplek PEMKAB Sumbawa Barat Kota Taliwang', 'AKTIF', 'YA', '2015-2019'),
(70, 'Sekongkang', 'Obs', '52070401a', -8.967000, 116.746002, 42, 'Sekongkang Bawah', 'Sekongkang', 'Sumbawa Barat', 'NTB', 2012, 2018, 'BMKG', 'B', 'Marijan/Zakiah, SP', '081998975202 / 085338925562', 'BP3K Sekongkang,  Jl. Lingkar Selatan, Desa Sekongkang Bawah, Sumbawa Barat', 'AKTIF', 'YA', '2011-2019'),
(71, 'Alas', 'Obs', '52040501a', -8.514000, 117.994003, 42, 'Dalam', 'Alas', 'Sumbawa', 'NTB', 2012, 2018, 'BMKG', 'B', 'Agus Salim/Husen', '087865614646 / 087864777064', 'BPP Alas, Jl Lintas Alas, Desa Dalam, Sumbawa', 'AKTIF', 'YA', '1998-2019'),
(72, 'Alas Barat', 'Obs', '52041701a', -8.518000, 117.967003, 42, 'Lekong', 'Alas', 'Sumbawa', 'NTB', 2014, 2018, 'BMKG', 'B', 'Zaenal Abidin', '81915841843', 'BPP Alas Barat, Jl. Lintas Tano, Desa Lekong, Alas, Sumbawa', 'AKTIF', 'YA', '2015-2019'),
(73, 'Buer', 'Obs', '52042001a', -8.466000, 117.036003, 7, 'Labuhan Burung', 'Buer', 'Sumbawa', 'NTB', 2012, 2018, 'BMKG', 'B', 'Sujito, SP ', '85239577142', 'BPP Kec. Buer, Jl. Raya Sumbawa-Alas, Desa Labuhan Burung, Sumbawa', 'AKTIF', 'YA', '2010-2019'),
(74, 'Diperta SBW', 'Obs', '52040801a', -8.491000, 117.420998, 36, 'Brang Bara', 'Sumbawa', 'Sumbawa', 'NTB', 2012, 2018, 'BMKG', 'B', 'Ayu Rosmayuningsih ', '81336658257', 'Kantor DIPERTA Sumbawa, Jl. Raya Diponegoro', 'AKTIF', 'YA', '1998-2019'),
(75, 'Empang', 'Obs', '52041401a', -8.770000, 118.000000, 2, 'Empang Atas', 'Empang', 'Sumbawa', 'NTB', 2012, 2018, 'BMKG', 'B', 'Novita Ariza ', '081907154885 / 085337136427', 'BP3K Empang, Jl. Lintas Sumbawa-Bima', 'AKTIF', 'YA', '1998-2019'),
(76, 'Lab. Badas', 'Obs', '52041801a', -8.471000, 117.377998, 72, 'Lab Badas', 'Lab. Badas', 'Sumbawa', 'NTB', 2012, 2018, 'BMKG', 'B', 'Rusmini, SP', '085239852267 / 085339332061', 'Kantor Camat Lab. Badas, Jl. Garuda Km 7, Sumbawa', 'AKTIF', 'YA', '2011-2019'),
(77, 'Lape', 'Obs', '52041201a', -8.625000, 117.616997, 0, 'Dete', 'Lape', 'Sumbawa', 'NTB', 2012, 2018, 'BMKG', 'B', 'Marwan', '82341584087', 'BBU Lape, Desa Dete', 'AKTIF', 'YA', '1998-2019'),
(78, 'Lenangguar', 'Obs', '52042701a', -8.734000, 117.362000, 225, 'Lenangguar', 'Lenangguar', 'Sumbawa', 'NTB', 2012, 2018, 'BMKG', 'B', 'A. Majid', '085237187194 / 082339082100', 'BP3K Lenangguar, Jl. Raya Sumbawa-lunyuk, Desa Lenangguar', 'AKTIF', 'YA', '1998-2019'),
(79, 'Lunyuk ', 'Obs', '52040201a', -8.995000, 117.204002, 0, 'Pada Suka', 'Lunyuk', 'Sumbawa', 'NTB', 2012, 2018, 'BMKG', 'B', 'Tri Marsinta/Warni ', '85337397405', 'BP3K/ P4SDP Lunyuk, Jl. Padasuka-Emang, Lunyuk, Sumbawa', 'AKTIF', 'YA', '2010-2019'),
(80, 'Moyo Hilir', 'Obs', '52040901a', -8.526000, 117.500000, 65, 'Keleiang', 'MoyoHilir', 'Sumbawa', 'NTB', 2012, 2018, 'BMKG', 'B', 'Muslim ', '87863813959', 'BPPK Moyohilir, Dusun Pengenyar, Desa Keleiang, Moyo Hilir, Sumbawa', 'AKTIF', 'YA', '1998-2019'),
(81, 'Moyo Hulu', 'Obs', '52041001a', -8.642000, 117.440002, 65, 'Semanung', 'MoyoHulu', 'Sumbawa', 'NTB', 2012, 2018, 'BMKG', 'B', 'Malik, SP', '81909207571', 'BP3K Moyo Hulu, Desa Semanung, Sumbawa', 'AKTIF', 'YA', '1998-2019'),
(82, 'Orong Telu', 'Obs', '52042801a', -8.770000, 117.179001, 222, 'Pelita Kelawis', 'Orong Telu', 'Sumbawa', 'NTB', 2017, 2018, 'BMKG', 'B', 'Chairil Wandi', '85337732790', 'Kantor Camat Orong Telu, Desa Pelita Kelawis, Orong Telu, Sumbawa', 'AKTIF', 'YA', '2017-2019'),
(83, 'Plampang', 'Obs', '52041301a', -8.777000, 117.759003, 39, 'Plampang', 'Plampang', 'Sumbawa', 'NTB', 2012, 2018, 'BMKG', 'B', 'Budi Irawan/Hirkan', '81933168708', 'BPP Plampang, Jl. Raya Sumbawa- Bima, Plampang, Sumbawa', 'AKTIF', 'YA', '1998-2019'),
(84, 'Rhee', 'Obs', '52042101a', -8.420000, 117.248001, 20, 'Rhee', 'Rhee', 'Sumbawa', 'NTB', 2014, 2018, 'BMKG', 'B', 'Sulaiman', '85239882131', 'Rumah Pengamat, Ds. Eoto Tedu Desa Rhee (Depan SMA 01 Rhee)', 'AKTIF', 'YA', '2015-2019'),
(85, 'Sebewe/Moyo Utara', 'Obs', '52042301a', -8.483000, 117.473999, 60, 'Sebewe', 'Moyo Utara', 'Sumbawa', 'NTB', 2014, 2018, 'BMKG', 'B', 'M. Yamin', '82340108567', 'BP3K Moyo Utara, Desa Sebewe, Sumbawa', 'AKTIF', 'YA', '2015-2019'),
(86, 'Semongkat', 'Obs', '52040702b', -8.573000, 117.320000, 244, 'Semongkat', 'Batulanteh', 'Sumbawa', 'NTB', 2016, 2018, 'BMKG', 'B', 'Endang S/Samsudin', '85338915184', 'Rumah Pengamat, Jl. Raya Semongkat Batu Dulang, Dusun Semongkat, Batu Lanteh ', 'AKTIF', 'YA', '2016-2019'),
(87, 'Sukadamai/Labangka', 'Obs', '52041901a', -8.907000, 117.739998, 43, 'Sukadamai', 'Labangka', 'Sumbawa', 'NTB', 2014, 2018, 'BMKG', 'B', 'Erniwati/Malik', '85338935257', 'KCD Pertanian Labangka (Samping Puskesmas Labangka), Sumbawa', 'AKTIF', 'YA', '2015-2019'),
(88, 'Terano', 'Obs', '52042501a', -8.747000, 117.994003, 56, 'Labuan Bontong', 'Terano', 'Sumbawa', 'NTB', 2012, 2018, 'BMKG', 'B', 'Doni', '82341475700', 'BP3K Tarano Jl. Lintas Sumbawa-Bima', 'AKTIF', 'YA', '2011-2019'),
(89, 'Utan', 'Obs', '52040601a', -8.417000, 117.120003, 5, 'Stowe Brang', 'Utan', 'Sumbawa', 'NTB', 2012, 2018, 'BMKG', 'B', 'Lusi Lestari', '82340912265', 'BP3K Utan, Jl. Raya Sumbawa', 'AKTIF', 'YA', '1998-2019'),
(90, 'Unter Iwes', 'Obs', '52040701a', -8.504000, 117.402000, 42, 'Unter Iwes', 'Batulanteh', 'Sumbawa', 'NTB', 2016, 2018, 'BMKG', 'B', 'Nazaruddin', '085337620062/087863782287', 'BP3K Unter Iwes, Jl. Sumbawa-Semongkat', 'AKTIF', 'YA', '2017-2019'),
(91, 'Stamet Sumbawa', 'Obs', '52040802a', -8.488000, 117.412003, 9, 'Lampe', 'Sumbawa', 'Sumbawa', 'NTB', 2012, 2018, 'BMKG', 'B', 'Stamet SBW', '87860715969', 'Stamet Sumbawa, Jl. Garuda 43 ', 'AKTIF', 'YA', '1976-2019'),
(92, 'Dompu', 'Obs', '52050101a', -8.519000, 118.464996, 112, 'Bali I', 'Dompu', 'Dompu', 'NTB', 2012, 0, 'BMKG', 'B', 'M. Ridwan ', '87766843425', 'BPP Dompu, Jl. Lingkar Bali I', 'AKTIF', 'YA', '2014-2019'),
(93, 'Huu', 'Obs', '52050301a', -8.738000, 118.440002, 30, 'Rasabou', 'Hu\'u', 'Dompu', 'NTB', 2012, 0, 'BMKG', 'B', 'Siti Akmal/Ramik', '85239660550', 'BPP Hu\'u Desa Rasabou', 'AKTIF', 'YA', '2010-2019'),
(94, 'Kilo', 'Obs', '52050401a', -8.311000, 118.398003, 38, 'Malaju', 'Kilo', 'Dompu', 'NTB', 2012, 0, 'BMKG', 'B', 'Dewi Anggriani', '82340090772', 'BPP Kilo Desa Melaju', 'AKTIF', 'YA', '2014-2019'),
(95, 'Manggalewa', 'Obs', '52050701a', -8.481000, 118.299004, 119, 'Nusa Jaya', 'Manggalewa', 'Dompu', 'NTB', 2012, 0, 'BMKG', 'B', 'Nurhasanah/Roni Nurahman', '085333913007 / 081917622722', 'BPP Manggalewa, Jl. Lintas Sanggar', 'AKTIF', 'YA', '2009-2019'),
(96, 'Pajo', 'Obs', '52050801a', -8.640000, 118.510002, 260, 'Ranggo', 'Pajo', 'Dompu', 'NTB', 2012, 0, 'BMKG', 'B', 'Abdul Rasul', '82339180276', 'BPP Pajo', 'AKTIF', 'YA', '2014-2019'),
(97, 'Pekat/Calabai', 'Obs', '52050601a', -8.227000, 117.723000, 0, 'Calabai', 'Pekat', 'Dompu', 'NTB', 2016, 2018, 'BMKG', 'B', 'Sukardin/Haeril', '082341441455 / 087766845000', 'BPP Pekat, Jl. Lintas Pekat - Dompu', 'AKTIF', 'YA', '2016-2019'),
(98, 'Saneo Woja', 'Obs', '52050501a', -8.452000, 118.449997, 910, 'Saneo', 'Woja', 'Dompu', 'NTB', 2012, 0, 'BMKG', 'B', 'Junaidin', '8.52E+11', 'Rumah Kepala Desa Saneo', 'AKTIF', 'YA', '2014-2019'),
(99, 'Kempo', 'Obs', '52050201a', -8.500000, 118.239998, 0, 'Kempo', 'Kempo', 'Dompu', 'NTB', 2017, 2017, 'BMKG', 'B', 'Amin Sada', '85238006917', 'BPP Kempo Jl. Diponegoro/L;intas Calabai', 'AKTIF', 'YA', '2017-2019'),
(100, 'Bolo', 'Obs', '52060201a', -8.490000, 118.570000, 22, 'Bolo', 'Bolo', 'Bima', 'NTB', 2012, 0, 'BMKG', 'B', 'Rudi Hartono', '81237186139', 'Ktr. Camat Bolo, Jl. Kesehatan', 'AKTIF', 'YA', '2006-2019'),
(101, 'Donggo', 'Obs', '52060801a', -8.430000, 118.603996, 663, 'O\'o', 'Donggo', 'Bima', 'NTB', 2013, 0, 'BMKG', 'B', 'Sariah, Amd/Sahrudin', '82339790041', 'BPP Donggo, Jl. Pesanggrahan', 'AKTIF', 'YA', '2006-2019'),
(102, 'Donggo2/Ndano', 'Obs', '52060802a', -8.500000, 118.540001, 0, 'Ndano nae', 'Donggo', 'Bima', 'NTB', 2017, 2017, 'BMKG', 'B', 'Jaenab/Najamudin', '82359058834', 'Rumah Pengamat (Ds. Ndano Mango, Desa Ndano Nae)', 'AKTIF', 'YA', '2017-2019'),
(103, 'Lambu', 'Obs', '52061201a', -8.660000, 119.089996, 25, 'Lambu', 'Lambu', 'Bima', 'NTB', 2013, 0, 'BMKG', 'B', 'Arif Rahman ', '82339872384', 'BPP lambu', 'AKTIF', 'YA', '2014-2019'),
(104, 'Madapangga', 'Obs', '52061301a', -8.511000, 118.578003, 42, 'Rato', 'Madapangga', 'Bima', 'NTB', 2012, 0, 'BMKG', 'B', 'Ikhwal ', '82236480096', 'UPTD Pertanian Kec. Madapangga', 'AKTIF', 'YA', '2009-2019'),
(105, 'Madapangga 2', 'Obs', '52061302a', -8.519000, 118.600998, 34, 'Bolo', 'Madapangga', 'Bima', 'NTB', 2013, 0, 'BMKG', 'B', 'Supratman  ', '85339226750', 'BP3K Madapangga', 'AKTIF', 'YA', '2015-2019'),
(106, 'Monta', 'Obs', '52060101a', -8.640000, 118.693001, 30, 'Sekuru', 'Monta', 'Bima', 'NTB', 2012, 0, 'BMKG', 'B', 'Rusian ', '82340112014', 'BPP Monta Jl. Lintas Parado', 'AKTIF', 'YA', '1998-2019'),
(107, 'Palibelo Panda', 'Obs', '52061801a', -8.519000, 118.694000, 2, 'Panda', 'Palibelo', 'Bima', 'NTB', 2013, 0, 'BMKG', 'B', 'Khairunnisyah', '85205102806', 'Kantor SAR Bima, Jl. Lintas SBW Bima', 'AKTIF', 'YA', '1998-2019'),
(108, 'Palibelo (Teke)', 'Obs', '52061802a', -8.540000, 118.735001, 411, 'Teke', 'Palibelo', 'Bima', 'NTB', 2013, 0, 'BMKG', 'B', 'Ahmad ', '81237487793', 'BP3K Palibelo, Jl. Lintas Teke-Nata', 'AKTIF', 'YA', '2014-2019'),
(109, 'Sanggar', 'Obs', '52060901a', -8.377000, 118.310997, 20, 'Sandue', 'Sanggar', 'Bima', 'NTB', 2012, 0, 'BMKG', 'B', 'La Ode M. Fadlin ', '82359070949', 'UPTD Perta Tanaman Pangan dan Horti. Sanggar', 'AKTIF', 'YA', '1998-2019'),
(110, 'Sape', 'Obs', '52060601a', -8.590000, 118.989998, 30, 'Naru', 'Sape', 'Bima', 'NTB', 2012, 0, 'BMKG', 'B', 'M. Kasyim', '81237890783', 'Dinas Pertanian + PU Pengairan', 'AKTIF', 'YA', '1998-2019'),
(111, 'Sape 2', 'Obs', '52060602a', -8.590000, 118.889999, 26, 'Sari', 'Sape', 'Bima', 'NTB', 2013, 0, 'BMKG', 'B', 'Syarifudin', '085218492220 / 085333975666', 'BPP Sape, Jl. Mutiara No. 15', 'AKTIF', 'YA', '2015-2019'),
(112, 'Soromandi', 'Obs', '52061501a', -8.390000, 118.695999, 56, 'Kananta', 'Soromandi', 'Bima', 'NTB', 2013, 0, 'BMKG', 'B', 'Khaerullah', '085339520664 / 081238090949', 'BP3K Kec. Soromandi', 'AKTIF', 'YA', '2014-2019'),
(113, 'Wawo', 'Obs', '52060501a', -8.552000, 118.856003, 422, 'kombo', 'wawo', 'Bima', 'NTB', 2013, 0, 'BMKG', 'B', 'Nur Hafidah', '85338505855', 'UPTD Kec. Wawo, Jl. Lintas Bima - Sape KM 21', 'AKTIF', 'YA', '2014-2019'),
(114, 'Belo', 'Obs', '52060401a', -8.360000, 118.421997, 56, 'Cenggu', 'Belo', 'Bima', 'NTB', 2017, 2017, 'BMKG', 'B', 'Ahmadin', '085205393704 / 085205292234', 'Rumah Pengamat', 'AKTIF', 'YA', '1993-2019'),
(115, 'Wera', 'Obs', '52060701a', -8.349000, 118.917000, 67, 'Nunggi', 'Wera', 'Bima', 'NTB', 2013, 0, 'BMKG', 'B', 'Nurdin', '85253957417', 'UPTD Pertanian Kec. Wera, Jl. Lintas Nunggi', 'AKTIF', 'YA', '2014-2019'),
(116, 'Woha', 'Obs', '52060301a', -8.569000, 118.668999, 80, 'Kalampa ', 'Woha', 'Bima', 'NTB', 2013, 0, 'BMKG', 'B', 'Ilyas Husein', '85337242818', 'BP3K Kec. Woha, Jl. Lintas Tente - Gado', 'AKTIF', 'YA', '2014-2019'),
(117, 'Tambora', 'Obs', '52061401a', -8.160000, 118.000000, 0, 'Rasabou', 'Tambora', 'Bima', 'NTB', 2017, 2017, 'BMKG', 'B', 'Firlana/Dede Bahtiar', '82340149892', 'Rumah Pengamat (ds. Nangarao, RW 01 / RT 03)', 'AKTIF', 'YA', '2017-2019'),
(118, 'Doro Oo', 'Obs', '52061101a', -8.690000, 118.760002, 0, 'Doro O\'o', 'Langgudu', 'Bima', 'NTB', 2017, 2017, 'BMKG', 'B', 'Ashar S.Pd', '85338882994', 'Rumah Pengamat Profesi Guru (Dusun Ta\'a sera, Desa Doro O\'o)', 'AKTIF', 'YA', '2017-2019'),
(119, 'Lambitu', 'Obs', '52061701a', -8.661000, 118.824997, 548, 'Kaowa', 'Lambitu', 'Bima', 'NTB', 2019, 0, 'BMKG', 'B', 'Umar', '82340533510', 'Rumah Pengamat (Pegawai Kantor Camat Lambitu) Jl. Lintas Telkom', 'AKTIF', 'TIDAK', '06-Jan-19'),
(120, 'Parado', 'Obs', '52061601a', -8.853000, 118.694000, 251, 'Paradowane', 'Parado', 'Bima', 'NTB', 2019, 0, 'BMKG', 'B', 'Nining Elisa', '081353206303 / 085333907684', 'Rumah Pegawai BPP Parado, Jl. Soekarno Hatta No. 29 RT. 12/05', 'AKTIF', 'TIDAK', '06-Jan-19'),
(121, 'Stamet BIMA', 'Obs', '52061803a', -8.542000, 118.692001, 3, 'Belo', 'Palibelo', 'Bima', 'NTB', 0, 2018, 'BMKG', 'B', 'Stamet Bima', '85333271675', 'Stamet Bima, Jl. ST. M. Salahudin', 'AKTIF', 'YA', '1982-2019'),
(122, 'Asakota/Jatiwangi', 'Obs', '52720301a', -8.448000, 118.740997, 14, 'Jatiwangi', 'Asakota', 'Kota Bima', 'NTB', 2012, 0, 'BMKG', 'B', 'Taufik', '85239562962', 'BPP Asakota, Jl. Dati Dipanta', 'AKTIF', 'YA', '2014-2019'),
(123, 'Asakota/Kolo', 'Obs', '52720302a', -8.378000, 118.724998, 5, 'Kolo', 'Asakota', 'Kota Bima', 'NTB', 2013, 2017, 'BMKG', 'B', 'Feri Fadlin/Yunus ', '85237300476', 'SMPN 10 Kolo Kota Bima', 'AKTIF', 'YA', '2015-2019'),
(124, 'Raba', 'Obs', '52720401a', -8.472000, 118.754997, 34, 'Rabangodu Utara', 'Raba', 'Kota Bima', 'NTB', 2012, 0, 'BMKG', 'B', 'Siti Marjan, SP', '81339688688', 'BPP Raba', 'AKTIF', 'YA', '1998-2019'),
(125, 'Rasanae Timur', 'Obs', '52720201a', -8.490000, 118.769997, 57, 'Kumbe', 'Rasanae Timur', 'Kota Bima', 'NTB', 2012, 0, 'BMKG', 'B', 'Fitriati', '85333348446', 'BPP Rasa Na\'e Timur, Jl. Lintas Kumbe', 'AKTIF', 'YA', '2014-2019');

-- --------------------------------------------------------

--
-- Table structure for table `satuan`
--

CREATE TABLE `satuan` (
  `id_satuan` int(11) NOT NULL,
  `nama_satuan` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `satuan`
--

INSERT INTO `satuan` (`id_satuan`, `nama_satuan`) VALUES
(2, 'dus'),
(3, 'unit'),
(4, 'pcs');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_barang`
--

CREATE TABLE `tbl_barang` (
  `kode_brg` varchar(125) NOT NULL,
  `nama_brg` varchar(168) NOT NULL,
  `jenis` varchar(125) NOT NULL,
  `no_seri` varchar(125) NOT NULL,
  `stok` bigint(15) UNSIGNED NOT NULL,
  `satuan_id` int(11) NOT NULL,
  `jenis_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbl_barang`
--

INSERT INTO `tbl_barang` (`kode_brg`, `nama_brg`, `jenis`, `no_seri`, `stok`, `satuan_id`, `jenis_id`) VALUES
('CS001', 'CAMPBELL STOKES', 'LURUS', 'SIAP - 6101/ MC.1a', 722, 0, 0),
('CS002', 'CAMPBELL STOKES', 'LENGKUNG PANJANG', 'SIAP - 6103/ MC.1c', 123, 0, 0),
('CS003', 'CAMPBELL STOKES', 'LENGKUNG PENDEK', 'SIAP - 6102/ MC.1b', 187, 0, 0),
('AC001', 'ACTINOGRAPH', 'PIAS HARIAN', 'MC.45', 330, 0, 0),
('HL001', 'HILLMAN', 'PIAS HARIAN', 'P.23/Mc.01', 132, 0, 0),
('TH001', 'THERMOHYGROGRAPH', 'PIAS MINGGUAN', 'FL.60877', 269, 0, 0),
('PP001', 'PENA PIAS', 'PENA', 'F51105-o6R-01', 10, 0, 0),
('HV001', 'HV SAMPLER', 'PIAS HARIAN', 'Whatman 1820-9932', 62, 0, 0),
('TP001', 'TINTA PIAS', 'CAIRAN', 'QWERTY', 7, 0, 0),
('SA001', 'SAMPEL AIR HUJAN', 'TABUNG', 'QWERTY', 12, 0, 0),
('SA002', 'SAMPEL AIR HUJAN', 'BOTOL', 'QWERTY', 11, 0, 0);

-- --------------------------------------------------------

--
-- Table structure for table `tbl_kab`
--

CREATE TABLE `tbl_kab` (
  `id` int(10) NOT NULL,
  `prov_id` int(10) NOT NULL,
  `kab` varchar(55) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbl_kab`
--

INSERT INTO `tbl_kab` (`id`, `prov_id`, `kab`) VALUES
(1, 18, 'Bima'),
(2, 18, 'Dompu'),
(3, 18, 'Lombok Barat'),
(4, 18, 'Lombok Tengah'),
(5, 18, 'Lombok Timur'),
(6, 18, 'Lombok Utara'),
(7, 18, 'Sumbawa'),
(8, 18, 'Sumbawa Barat'),
(9, 18, 'Kota Bima'),
(10, 18, 'Kota Mataram');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_kec`
--

CREATE TABLE `tbl_kec` (
  `id` int(11) NOT NULL,
  `kab_id` int(11) NOT NULL,
  `prov_id` int(11) NOT NULL,
  `kec` varchar(128) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbl_kec`
--

INSERT INTO `tbl_kec` (`id`, `kab_id`, `prov_id`, `kec`) VALUES
(1, 1, 18, 'Ambalawi'),
(2, 1, 18, 'Belo'),
(3, 1, 18, 'Bolo'),
(4, 1, 18, 'Donggo'),
(5, 1, 18, 'Lambitu'),
(6, 1, 18, 'Lambu'),
(7, 1, 18, 'Langgudu'),
(8, 1, 18, 'Madapangga'),
(9, 1, 18, 'Monta'),
(10, 1, 18, 'Palibelo'),
(11, 1, 18, 'Parado'),
(12, 1, 18, 'Sanggar'),
(13, 1, 18, 'Sape'),
(14, 1, 18, 'Soromandi'),
(15, 1, 18, 'Tambora'),
(16, 1, 18, 'Wawo'),
(17, 1, 18, 'Wera'),
(18, 1, 18, 'Woha'),
(19, 2, 18, 'Dompu'),
(20, 2, 18, 'Hu\'u'),
(21, 2, 18, 'Kempo'),
(22, 2, 18, 'Kilo'),
(23, 2, 18, 'Manggalewa'),
(24, 2, 18, 'Pajo'),
(25, 2, 18, 'Pekat'),
(26, 2, 18, 'Woja'),
(27, 3, 18, 'Batu Layar'),
(28, 3, 18, 'Gerung'),
(29, 3, 18, 'Gunung Sari'),
(30, 3, 18, 'Kediri'),
(31, 3, 18, 'Kuripan'),
(32, 3, 18, 'Labu Api'),
(33, 3, 18, 'Lembar'),
(34, 3, 18, 'Lingsar'),
(35, 3, 18, 'Narmada'),
(36, 3, 18, 'Sekotong'),
(37, 4, 18, 'Batukliang'),
(38, 4, 18, 'Batukliang Utara'),
(39, 4, 18, 'Janapria'),
(40, 4, 18, 'Jonggat'),
(41, 4, 18, 'Kopang'),
(42, 4, 18, 'Praya'),
(43, 4, 18, 'Praya Barat Daya'),
(44, 4, 18, 'Praya Tengah'),
(45, 4, 18, 'Praya Timur'),
(46, 4, 18, 'Pringgarata'),
(47, 4, 18, 'Pujut'),
(48, 5, 18, 'Aikmel'),
(49, 5, 18, 'Jerowaru'),
(50, 5, 18, 'Keruak'),
(51, 5, 18, 'Labuhan Haji'),
(52, 5, 18, 'Masbagik'),
(53, 5, 18, 'Montong Gading'),
(54, 5, 18, 'Pringgabaya'),
(55, 5, 18, 'Pringgasela'),
(56, 5, 18, 'Sakra'),
(57, 5, 18, 'Sakra Barat'),
(58, 5, 18, 'Sakra Timur'),
(59, 5, 18, 'Sambelia'),
(60, 5, 18, 'Selong'),
(61, 5, 18, 'Sembalun'),
(62, 5, 18, 'Sikur'),
(63, 5, 18, 'Suwela'),
(64, 5, 18, 'Sukamulia'),
(65, 5, 18, 'Suralaga'),
(66, 5, 18, 'Terara'),
(67, 5, 18, 'Wanasaba'),
(68, 6, 18, 'Bayan'),
(69, 6, 18, 'Gangga'),
(70, 6, 18, 'Kayangan'),
(71, 6, 18, 'Pemenang'),
(72, 6, 18, 'Tanjung'),
(73, 7, 18, 'Alas'),
(74, 7, 18, 'Alas Barat'),
(75, 7, 18, 'Batulanteh'),
(76, 7, 18, 'Buer'),
(77, 7, 18, 'Empang'),
(78, 7, 18, 'Labangka'),
(79, 7, 18, 'Labuhan Badas'),
(80, 7, 18, 'Lantung'),
(81, 7, 18, 'Lape'),
(82, 7, 18, 'Lenangguar'),
(83, 7, 18, 'Lopok'),
(84, 7, 18, 'Lunyuk'),
(85, 7, 18, 'Maronge'),
(86, 7, 18, 'Moyo Hilir'),
(87, 7, 18, 'Moyo Hulu'),
(88, 7, 18, 'Moyo Utara'),
(89, 7, 18, 'Orong Telu'),
(90, 7, 18, 'Plampang'),
(91, 7, 18, 'Rhee'),
(92, 7, 18, 'Ropang'),
(93, 7, 18, 'Sumbawa'),
(94, 7, 18, 'Tarano'),
(95, 7, 18, 'Unter Iwes'),
(96, 7, 18, 'Utan'),
(97, 8, 18, 'Brang Ene'),
(98, 8, 18, 'Brang Rea'),
(99, 8, 18, 'Jereweh'),
(100, 8, 18, 'Maluk'),
(101, 8, 18, 'Poto Tano'),
(102, 8, 18, 'Seteluk'),
(103, 8, 18, 'Sekongkang'),
(104, 8, 18, 'Taliwang'),
(105, 9, 18, 'Asakota'),
(106, 9, 18, 'Mpunda'),
(107, 9, 18, 'Raba'),
(108, 9, 18, 'Rasanae Barat'),
(109, 9, 18, 'Rasanae Timur'),
(110, 10, 18, 'Ampenan'),
(111, 10, 18, 'Cakranegara'),
(112, 10, 18, 'Mataram'),
(113, 10, 18, 'Sandubaya '),
(114, 10, 18, 'Sekarbela'),
(115, 10, 18, 'Selaparang ');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_provinsi`
--

CREATE TABLE `tbl_provinsi` (
  `id` int(10) NOT NULL,
  `prov` varchar(128) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbl_provinsi`
--

INSERT INTO `tbl_provinsi` (`id`, `prov`) VALUES
(1, 'Nanggroe Aceh Darussalam'),
(2, 'Sumatera Utara'),
(3, 'Sumatera Barat'),
(4, 'Riau'),
(5, 'Kepulauan Riau'),
(6, 'Jambi'),
(7, 'Bengkulu'),
(8, 'Sumatera Selatan'),
(9, 'Kepulauan Bangka Belitung'),
(10, 'Lampung'),
(11, 'Banten'),
(12, 'Jawa Barat'),
(13, 'DKI Jakarta'),
(14, 'Jawa Tengah'),
(15, 'DI Yogyakarta'),
(16, 'Jawa Timur'),
(17, 'Bali'),
(18, 'Nusa Tenggara Barat'),
(19, 'Nusa Tenggara Timur'),
(20, 'Kalimantan Utara'),
(21, 'Kalimantan Barat'),
(22, 'Kalimantan Tengah'),
(23, 'Kalimantan Selatan'),
(24, 'Kalimantan Timur'),
(25, 'Gorontalo'),
(26, 'Sulawesi Utara'),
(27, 'Sulawesi Barat'),
(28, 'Sulawesi Tengah'),
(29, 'Sulawesi Selatan'),
(30, 'Sulawesi Tenggara'),
(31, 'Maluku Utara'),
(32, 'Maluku'),
(33, 'Papua Barat'),
(34, 'Papua');

-- --------------------------------------------------------

--
-- Table structure for table `transaksi`
--

CREATE TABLE `transaksi` (
  `id` int(11) NOT NULL,
  `tgl` datetime NOT NULL,
  `user_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `type_sta`
--

CREATE TABLE `type_sta` (
  `id` int(255) NOT NULL,
  `sta` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `type_sta`
--

INSERT INTO `type_sta` (`id`, `sta`) VALUES
(1, 'Pos Hujan'),
(2, 'Stasiun ARG'),
(3, 'Stasiun AWS'),
(4, 'Stasiun AAWS');

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE `user` (
  `id` int(11) NOT NULL,
  `name` varchar(128) NOT NULL,
  `email` varchar(128) NOT NULL,
  `last_login` int(11) NOT NULL,
  `nomor` bigint(13) NOT NULL,
  `image` varchar(128) NOT NULL,
  `password` varchar(256) NOT NULL,
  `role_id` int(11) NOT NULL,
  `is_active` int(1) NOT NULL,
  `date_created` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`id`, `name`, `email`, `last_login`, `nomor`, `image`, `password`, `role_id`, `is_active`, `date_created`) VALUES
(3, 'Dwi Rizky A', 'dwirizky04@gmail.com', 0, 0, 'alwi.PNG', '$2y$10$3PIaIxlhBx8axJY.hdSUjOniqTe42SQNc.MT9PBqOGkJ32nMdYOoq', 1, 1, 1554274038),
(4, 'Wanda Hara', 'wanda_hara@yahoo.com', 0, 0, 'default.jpg', '$2y$10$lP6GfokJ16BdsgKdyGgxj.ctZaBAzVu3DFVBU/LpQN2VAxe6.gT8W', 2, 1, 1554300251),
(14, 'Fajar Pratama', 'blancoblood8@gmail.com', 0, 0, 'default.jpg', '$2y$10$d2tj3af8ulCJSMVMzucCROV/.QmavPAazdxv0l/gingbEWW0s/XRS', 2, 1, 1555471379),
(16, 'asri', 'asri.susilawati@bmkg.go.id', 0, 0, 'default.jpg', '$2y$10$xmHnHS7dKwBJH8TWxuOGSem6I9O5u847PCd.gkWbuug0qp6.u5MeG', 1, 1, 1561432285),
(17, 'asri', 'asri.susilawati@hotmail.com', 0, 0, 'default.jpg', '$2y$10$HaXwk2WkkF8eqcg430sw1OLFTM3LP.G2gWwhDZbej2C1GGVyniurm', 2, 1, 1561432436),
(18, 'asri', 'asrisusilawati@gmail.com', 0, 0, 'default.jpg', '$2y$10$SCz80bQCgb/pyuFmmLfBku4ZPK2WZbqM3Ae/FBLKHrsMJOtagB4kK', 2, 1, 1561432506),
(19, 'Fajar Pratama', 'fajarmerdeka22@gmail.com', 0, 85707382168, 'default.jpg', '$2y$10$D/TS/DXZdtPd0nBCPt1n4uIR5AHK.v7q6s4LKONry/klrCnFjiynW', 2, 1, 1578449864),
(20, 'Kyriz Dwi, S.Tr', 'kyriz@gmail.com', 0, 852346234, 'default.jpg', '$2y$10$4DyCY/O6xQYcQtNCh.Os3.l2pYbHOmk.UV3Po/DfY/6lPL2IDHncO', 2, 1, 1595639981);

-- --------------------------------------------------------

--
-- Table structure for table `user_access_menu`
--

CREATE TABLE `user_access_menu` (
  `id` int(11) NOT NULL,
  `role_id` int(11) NOT NULL,
  `menu_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `user_access_menu`
--

INSERT INTO `user_access_menu` (`id`, `role_id`, `menu_id`) VALUES
(1, 1, 1),
(4, 1, 5),
(7, 1, 2),
(8, 0, 2),
(9, 2, 2);

-- --------------------------------------------------------

--
-- Table structure for table `user_menu`
--

CREATE TABLE `user_menu` (
  `id` int(11) NOT NULL,
  `menu` varchar(128) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `user_menu`
--

INSERT INTO `user_menu` (`id`, `menu`) VALUES
(1, 'Admin'),
(2, 'User'),
(5, 'Pengaturan');

-- --------------------------------------------------------

--
-- Table structure for table `user_role`
--

CREATE TABLE `user_role` (
  `id` int(11) NOT NULL,
  `role` varchar(128) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `user_role`
--

INSERT INTO `user_role` (`id`, `role`) VALUES
(1, 'Administrator'),
(2, 'User');

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
  `is_main_menu` int(10) DEFAULT NULL,
  `is_active` int(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `user_sub_menu`
--

INSERT INTO `user_sub_menu` (`id`, `menu_id`, `title`, `url`, `icon`, `is_main_menu`, `is_active`) VALUES
(1, 1, 'Dashboard', 'admin', 'fas fa-fw fa-tachometer-alt', 0, 1),
(2, 2, 'Home', 'user', 'fas fa-fw fa-home', NULL, 1),
(4, 1, 'Data Peralatan', 'alat', 'fas fa-fw fa-cogs', 0, 0),
(6, 1, 'Data Pengguna', 'pengguna', 'fas fa-fw fa-users', 0, 1),
(7, 2, 'Entry Log-Book', 'entry', 'fa fa-fw fa-hourglass-half', NULL, 1),
(8, 2, 'Hasil Konsultasi', 'user/hslkonsul', 'fas fa-fw fa-file-alt', NULL, 0),
(9, 1, 'Manajemen Menu', 'admin/manajemen', 'fas fa-fw fa-folder-plus', NULL, 0),
(11, 5, 'Level Akses', 'role', 'fas fa-fw fa-chalkboard-teacher', 0, 1),
(12, 5, 'Menu Manajemen', 'menu', 'fas fa-fw fa-folder-plus', NULL, 1),
(13, 5, 'Submenu Manajemen', 'submenu', 'fas fa-fw fa-folder-open', NULL, 1),
(14, 2, 'My Profile', 'user/profile', 'fas fa-fw fa-user', NULL, 0),
(15, 2, 'Riwayat', 'konsul/riwayat', 'fas fa-fw fa-share-square', NULL, 0),
(16, 1, 'Daftar Riwayat', 'riwayat', 'fas fa-fw fa-clipboard-list', NULL, 0),
(17, 2, 'Informasi', 'user/info', 'fas fa-fw fa-satellite-dish', NULL, 0),
(18, 2, 'Petunjuk Penggunaan', 'user/petunjuk', 'fas fa-fw fa-lightbulb', NULL, 0),
(19, 1, 'Data Lokasi', 'lokasi', 'fas fa-fw fa-map-pin', 0, 1),
(20, 1, 'Data Barang', 'barang', 'fas fa-fw fa-check-square', NULL, 1),
(21, 1, 'Transaksi', 'transaksi/tambah', 'fas fa-fw fa-cart-plus', NULL, 0),
(22, 1, 'Riwayat Transaksi', 'transaksi', 'fas fa-fw fa-cart-arrow-down', NULL, 0),
(23, 2, 'Barang Masuk', 'barangmasuk', 'fas fa-fw fa-arrow-down', NULL, 1),
(24, 2, 'Barang Keluar', 'barangkeluar', 'fas fa-fw fa-arrow-up', NULL, 1),
(25, 2, 'Laporan', 'laporan', 'fas fa-fw fa-file', NULL, 1);

-- --------------------------------------------------------

--
-- Table structure for table `user_token`
--

CREATE TABLE `user_token` (
  `id` int(11) NOT NULL,
  `email` varchar(128) NOT NULL,
  `token` varchar(128) NOT NULL,
  `date_created` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `user_token`
--

INSERT INTO `user_token` (`id`, `email`, `token`, `date_created`) VALUES
(1, 'siskaass@gmail.com', '/oj09QvEfQgNOhBANamysQB4XFqauk8KZZRzvBiIuTU=', 1561359458),
(2, 'asri.susilawati@bmkg.go.id', 'XdSKk3AzonuRcIFp1Z75cJgKQh4j85xoBRibf5lY2aU=', 1561432285),
(3, 'asri.susilawati@hotmail.com', 'yxUkHfD9hkS5EqCC4nMRo7wittDw9MtLKt//JpYWGwU=', 1561432436),
(4, 'asrisusilawati@gmail.com', 'ao69JHYQJnm6OmZCyMSjFTdSuwV684U4q+YTUC/lq90=', 1561432506),
(5, 'nearwie@gmail.com', '8gT+U/732kv65I5RywxivKROZ+YcdD5QPBLHpU8/d0o=', 1561432609),
(6, 'fajarmerdekaa@gmail.com', 'Ya1GH41DSmZxxv83wuTQU6iHnBmfk5CuVRA+XPtD0EE=', 1561432893),
(7, 'titanlagoon@gmail.com', 'bs5G/w+inoG8mLEdwANO7EekGjRantoUPcBxkBie10M=', 1561433053),
(8, 'alwicempaka@gmail.com', 'EWt2RMrNUtHdUuu76Nyv+I8OW4415pgLP/XZU3MRqy4=', 1561433429),
(9, 'nearwie@gmail.com', 'cf5+eMo/fZC7/exo/dJ0XhMaB9GLvam1TePNqih1DSE=', 1561473987);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `barang`
--
ALTER TABLE `barang`
  ADD PRIMARY KEY (`kode_brg`),
  ADD KEY `satuan_id` (`satuan_id`),
  ADD KEY `jenis_id` (`jenis_id`);

--
-- Indexes for table `barang_keluar`
--
ALTER TABLE `barang_keluar`
  ADD PRIMARY KEY (`id_barang_keluar`);

--
-- Indexes for table `barang_masuk`
--
ALTER TABLE `barang_masuk`
  ADD PRIMARY KEY (`id_barang_masuk`);

--
-- Indexes for table `data_alat`
--
ALTER TABLE `data_alat`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `data_lokasi`
--
ALTER TABLE `data_lokasi`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `detail_transaksi`
--
ALTER TABLE `detail_transaksi`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `entry_log`
--
ALTER TABLE `entry_log`
  ADD PRIMARY KEY (`id_entry`);

--
-- Indexes for table `jenis`
--
ALTER TABLE `jenis`
  ADD PRIMARY KEY (`id_jenis`);

--
-- Indexes for table `kondisi`
--
ALTER TABLE `kondisi`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `meta_dt`
--
ALTER TABLE `meta_dt`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `satuan`
--
ALTER TABLE `satuan`
  ADD PRIMARY KEY (`id_satuan`);

--
-- Indexes for table `tbl_kab`
--
ALTER TABLE `tbl_kab`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tbl_kec`
--
ALTER TABLE `tbl_kec`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tbl_provinsi`
--
ALTER TABLE `tbl_provinsi`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `transaksi`
--
ALTER TABLE `transaksi`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `type_sta`
--
ALTER TABLE `type_sta`
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
-- AUTO_INCREMENT for table `data_alat`
--
ALTER TABLE `data_alat`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=28;

--
-- AUTO_INCREMENT for table `data_lokasi`
--
ALTER TABLE `data_lokasi`
  MODIFY `id` int(255) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `detail_transaksi`
--
ALTER TABLE `detail_transaksi`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `entry_log`
--
ALTER TABLE `entry_log`
  MODIFY `id_entry` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `jenis`
--
ALTER TABLE `jenis`
  MODIFY `id_jenis` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `kondisi`
--
ALTER TABLE `kondisi`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `meta_dt`
--
ALTER TABLE `meta_dt`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=126;

--
-- AUTO_INCREMENT for table `satuan`
--
ALTER TABLE `satuan`
  MODIFY `id_satuan` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `tbl_kab`
--
ALTER TABLE `tbl_kab`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `tbl_kec`
--
ALTER TABLE `tbl_kec`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=116;

--
-- AUTO_INCREMENT for table `tbl_provinsi`
--
ALTER TABLE `tbl_provinsi`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=35;

--
-- AUTO_INCREMENT for table `transaksi`
--
ALTER TABLE `transaksi`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `type_sta`
--
ALTER TABLE `type_sta`
  MODIFY `id` int(255) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `user`
--
ALTER TABLE `user`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=21;

--
-- AUTO_INCREMENT for table `user_access_menu`
--
ALTER TABLE `user_access_menu`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT for table `user_menu`
--
ALTER TABLE `user_menu`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `user_role`
--
ALTER TABLE `user_role`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `user_sub_menu`
--
ALTER TABLE `user_sub_menu`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=26;

--
-- AUTO_INCREMENT for table `user_token`
--
ALTER TABLE `user_token`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
