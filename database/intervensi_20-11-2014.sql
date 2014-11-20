-- phpMyAdmin SQL Dump
-- version 3.5.2.2
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: Nov 20, 2014 at 08:27 AM
-- Server version: 5.5.27
-- PHP Version: 5.4.7

SET SQL_MODE="NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `intervensi`
--
CREATE DATABASE `intervensi` DEFAULT CHARACTER SET latin1 COLLATE latin1_swedish_ci;
USE `intervensi`;

-- --------------------------------------------------------

--
-- Table structure for table `data_penduduk`
--

CREATE TABLE IF NOT EXISTS `data_penduduk` (
  `NoKK` varchar(30) NOT NULL,
  `NamaKep` varchar(50) NOT NULL,
  `Alamat` varchar(30) NOT NULL,
  `RT` int(5) NOT NULL,
  `RW` int(5) NOT NULL,
  `Dusun` varchar(30) NOT NULL,
  `KodePos` varchar(10) NOT NULL,
  `NIK` varchar(30) NOT NULL,
  `NamaLengkap` varchar(60) NOT NULL,
  `JK` varchar(20) NOT NULL,
  `TempatLahir` varchar(40) NOT NULL,
  `TglLahir` date NOT NULL,
  `NoAkta` varchar(30) NOT NULL,
  `GolDarah` varchar(3) NOT NULL,
  `Agama` varchar(15) NOT NULL,
  `Pekerjaan` varchar(30) NOT NULL,
  `NamaIbu` varchar(50) NOT NULL,
  `NamaAyah` varchar(50) NOT NULL,
  `Status` varchar(25) NOT NULL,
  `Kelurahan` varchar(20) NOT NULL,
  PRIMARY KEY (`NIK`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `data_penduduk`
--

INSERT INTO `data_penduduk` (`NoKK`, `NamaKep`, `Alamat`, `RT`, `RW`, `Dusun`, `KodePos`, `NIK`, `NamaLengkap`, `JK`, `TempatLahir`, `TglLahir`, `NoAkta`, `GolDarah`, `Agama`, `Pekerjaan`, `NamaIbu`, `NamaAyah`, `Status`, `Kelurahan`) VALUES
('009090909', 'tes', 'tes', 9, 10, 'cimahi', '40132', '0909909', 'ratih', 'Perempuan', 'garut', '2013-11-04', '34343', 'A', 'Islam', 'ttt', 'trtrt', 'trtrt', 'Belum Menikah', 'Cibeber'),
('3277020811060392', 'RIZAL SULAEMAN', 'JL WARUNG CONTONG', 2, 9, '-', '40524', '3277000202020001', 'MUHAMMAD MAESA M JELIWANG', 'Laki-laki', 'CIMAHI', '2002-02-02', '-', 'O', 'Islam', '-', 'TITI SUGIYATI', 'RIZAL SULAEMAN', '-', 'SETIAMANAH'),
('327702088888888', 'RIZAL SULAEMAN', 'CIBEBER', 9, 8, 'CIBEBER', '877', '3277000202020012', 'TES', 'laki-laki', 'CIMAHI', '2002-02-02', '788888', 'O', 'Islam', 'MAHASISWA', 'NUNUNG', 'UTAR', 'Menikah', 'CIBEBER'),
('3277020811060235', 'T. SINAGA', 'JL. WARUNG CONTONG TIMUR NO. 1', 2, 9, 'KP KIHAPIT TIMUR', '40524', '3277000611760001 ', 'NOVIK HOTMAN ', 'Laki-laki', 'CIMAHI ', '2000-01-01', '41.949/1988  ', 'AB', 'KRISTEN ', 'KARYAWAN SWASTA ', 'T. SINAGA ', 'J. SITUMORANG ', 'BELUM KAWIN', 'SETIAMANAH '),
('3277020811060235 ', 'T. SINAGA ', 'JL. WARUNG CONTONG TIMUR NO. 1', 2, 9, '-', '40524 ', '3277000812740001 ', 'ARIFIN ', 'Laki-laki', 'CIMAHI ', '1976-06-11', ' 992/2006', 'O', 'KRISTEN ', 'KARYAWAN SWASTA ', 'T. SINAGA ', 'J. SITUMORANG ', 'BELUM KAWIN', 'SETIAMANAH '),
('3277012602080004 ', 'HASMAR YUSUF PANJAITAN', 'CIBEBER', 7, 8, 'CIBEBER', '40531 ', '3277002006070001 ', 'YEHEZKIEL ARDIAN PANJAITAN ', 'Laki-laki', 'CIMAHI ', '1974-08-12', '-', 'A', 'KRISTEN', 'BELUM/TIDAK BEKERJA ', 'TETTY SIHOMBING', 'HASMAR YUSUF PANJAITAN ', 'BELUM KAWIN', 'CIBEBER '),
('3277012910060894 ', 'SUTONO', 'KP HUJUNG KULON ', 8, 5, '-', '40533 ', '3277010101000001 ', 'H E R U ', 'Laki-laki', 'BANDUNG ', '2007-01-01', '-', 'B', 'ISLAM', 'PELAJAR/MAHASISWA ', 'JASIAH ', 'SUTONO', 'BELUM KAWIN', 'UTAMA '),
('3277011501100161', 'WARTISAH', 'KIHAPIT TIMUR', 5, 20, '-', '40532', '3277010101000002', 'FAHRIZAL MUHAMAD RIZKI', 'Laki-laki', 'CIMAHI', '2000-01-01', '-', 'A', 'ISLAM', 'BELUM/TIDAK BEKERJA', 'WARTISAH', ' HERI PARID JAENUDIN', 'BELUM KAWIN', 'LEUWIGAJAH'),
('3277012910061037 ', 'SURYO TRI HARTONO ', 'KP HUJUNG KIDUL ', 4, 7, '-', '40533 ', '3277010101000003', 'SYAUQI IQBAL FARABI SP ', 'Laki-laki', 'CIMAHI', '2000-01-01', '5358/2007', 'B', 'ISLAM', 'PELAJAR/MAHASISWA', 'YENI RUSMIYATI ', 'SURYO TRI HARTONO ', 'BELUM KAWIN', 'UTAMA'),
('3277010111060799 ', 'BUSIDIN', 'BLOK SUKAMAJU ', 2, 6, '-', '40534 ', '3277010101000004', 'DENDI SETIAWAN ', 'Laki-laki', 'PURWOKERTO', '2000-01-01', '-', 'O', 'ISLAM', 'PELAJAR/MAHASISWA', 'SITI ', 'BUSIDIN ', 'BELUM KAWIN', 'MELONG'),
('3277010410060681 ', 'AGUS SUBANDAR ', 'JL KEBON KOPI NO188 ', 4, 8, 'CIBEUREUM', '40535 ', '3277010101000042', 'REZA MELDIAN ', 'Laki-laki', 'BANDUNG ', '2000-01-01', '-', 'AB', 'ISLAM', 'PELAJAR/MAHASISWA', 'SEPTIKA WATI ', 'AGUS SUBANDAR ', 'BELUM KAWIN', 'CIBEUREUM'),
('3277011610061370 ', 'PAIJAN ', 'KIHAPIT TIMUR ', 10, 8, '-', '40532 ', '3277010101000045', 'RAMDAN ARIF FIRMANSYAH ', 'Laki-laki', 'BANDUNG', '2000-01-01', '-', 'O', 'ISLAM', 'PELAJAR/MAHASISWA', 'TUMI ARIYANTI ', 'PAIJAN ', 'BELUM KAWIN', 'LEUWIGAJAH'),
('3277010311062245', 'A. BADRUDIN', 'BLOK 17 NO 109 MELONG', 2, 15, '-', '40534', '3277010101000049', 'MUHAMAD IMAM HARMAEN', 'Laki-laki', 'BANDUNG', '2000-01-01', '3606/2005', 'A', 'ISLAM', 'BELUM/TIDAK BEKERJA', ' IMAS JULAEHA', 'A BADRUDIN', 'BELUM KAWIN', 'MELONG'),
('3277010811060311', 'RIAN NURYADIN', 'JL KEBON KOPI GG  H SAFEI II N', 3, 7, '-', '40534 ', '3277010101000052', 'AGUNG RAMDANI', 'Laki-laki', 'BANYUMAS', '2000-01-01', '-', 'A', 'ISLAM', 'BELUM/TIDAK BEKERJA', 'SUGINI', 'TASLAM', 'ISLAM', 'MELONG'),
('3277012205070020', 'TASLAM KOSMANA', 'BLOK HEGARMANAH NO  241 ', 1, 7, '-', '40533 ', '3277010101000058', 'FEBI RAMDHAN KOSMANA', 'Laki-laki', 'CIREBON', '2000-01-01', '-', 'O', 'ISLAM', 'BELUM/TIDAK BEKERJA', 'ROHIDAH', 'KOSMANA', 'ISLAM', 'UTAMA'),
('3277011001080002', 'BUBUN BUNYAMIN ', 'JL JOYODIKROMO HUJUNG KIDUL ', 6, 7, '-', '40534 ', '3277010101000059', 'RIZKI', 'Laki-laki', 'TASIKMALAYA', '2000-01-01', '-', 'B', 'ISLAM', 'BELUM/TIDAK BEKERJA', 'LILIS', 'BUBUN BUNYAMIN', 'ISLAM', 'MELONG'),
('3277012001100083', 'AMINAH', 'BLOK HEGARMANAH NO 314 CIBOGO ', 5, 6, '-', '40532 ', '3277010101000075', 'Y PAHMI PRATAMA', 'Laki-laki', 'CIMAHI', '2000-01-01', '-', 'AB', 'ISLAM', 'PELAJAR/MAHASISWA', 'AMINAH', 'YUDI NAUVAL', 'ISLAM', 'LEUWIGAJAH'),
('3277011001070048', 'EKO PATMONO ', 'RANCA BENTANG UTARA ', 3, 25, '-', '40535 ', '3277010101000078', 'MUHAMAD PADLAN', 'Laki-laki', 'G.HALU', '2000-01-01', '-', 'O', 'ISLAM', 'PELAJAR/MAHASISWA', 'DWI BUDI ROKHAYATI', 'EKO PATMONO', 'ISLAM', 'CIBEUREUM'),
('3277012204070468', 'AA KURNIA ', 'KP CIBODAS ', 5, 11, '-', '40533', '3277010101000081', 'MUKLIS AKBAR KURNIANSAH', 'Laki-laki', 'CIMAHI', '2000-01-01', '-', 'O', 'ISLAM', 'BELUM/TIDAK BEKERJA', 'MIMING', 'AA KURNIA', 'ISLAM', 'UTAMA'),
('3277012204070468', 'AA KURNIA ', 'KP CIBODAS ', 5, 11, '-', '40533', '3277010101000082', 'SAEPUL RAJIP', 'Laki-laki', 'CIMAHI', '2000-01-01', '-', 'O', 'ISLAM', 'BELUM/TIDAK BEKERJA', 'MIMING', 'AA KURNIA', 'ISLAM', 'UTAMA'),
('3277011110061311', 'RIAN NURYADIN', 'JL KEBON KOPI GG  H SAFEI II N', 3, 28, '-', '40535', '3277010101010001', 'ALDITIA', 'Laki-laki', 'BANDUNG', '2000-01-01', '1958/2008', 'B', 'ISLAM', 'BELUM/TIDAK BEKERJA', 'RIAWATI', 'RIAN N', 'ISLAM', 'CIBEUREUM'),
('3277012001100108', 'YUDI KEMAL ', 'JL ROROJONGGRANG UTARA I BLOK ', 4, 36, '-', '40534 ', '3277012001570004', 'MUHAMAD ADIFIO BAHI', 'Laki-laki', 'BANDUNG', '2000-01-01', '-', 'A', 'ISLAM', 'PELAJAR/MAHASISWA', 'FINY FITRIANY', 'YUDI KEMAL', 'ISLAM', 'MELONG');

-- --------------------------------------------------------

--
-- Table structure for table `form_isian_kelurahan`
--

CREATE TABLE IF NOT EXISTS `form_isian_kelurahan` (
  `id_form_isian_kelurahan` int(11) NOT NULL AUTO_INCREMENT,
  `id_indikator` int(20) NOT NULL,
  `kode_kelurahan` int(20) NOT NULL,
  `nilai_kelurahan` int(20) NOT NULL,
  PRIMARY KEY (`id_form_isian_kelurahan`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=36 ;

--
-- Dumping data for table `form_isian_kelurahan`
--

INSERT INTO `form_isian_kelurahan` (`id_form_isian_kelurahan`, `id_indikator`, `kode_kelurahan`, `nilai_kelurahan`) VALUES
(1, 5, 32770101, 0),
(2, 3, 0, 0),
(3, 4, 0, 0),
(5, 6, 0, 0),
(6, 5, 32770102, 0),
(7, 5, 32770103, 0),
(8, 5, 32770104, 0),
(9, 5, 32770105, 0),
(10, 5, 32770201, 0),
(11, 5, 32770202, 0),
(12, 5, 32770203, 0),
(13, 5, 32770204, 0),
(14, 5, 32770205, 0),
(15, 5, 32770206, 0),
(16, 5, 32770301, 0),
(17, 5, 32770302, 0),
(18, 5, 32770303, 0),
(19, 5, 32770304, 0),
(20, 1, 32770101, 0),
(21, 1, 32770102, 0),
(22, 1, 32770103, 0),
(23, 1, 32770104, 0),
(25, 1, 32770201, 0),
(26, 1, 32770202, 0),
(27, 1, 32770203, 0),
(28, 1, 32770204, 0),
(29, 1, 32770105, 0),
(30, 1, 32770206, 0),
(31, 1, 32770301, 0),
(32, 1, 32770302, 0),
(33, 1, 32770304, 0),
(34, 1, 32770205, 0),
(35, 1, 32770303, 0);

-- --------------------------------------------------------

--
-- Table structure for table `form_isian_target`
--

CREATE TABLE IF NOT EXISTS `form_isian_target` (
  `id_form_isian_target` int(11) NOT NULL AUTO_INCREMENT,
  `id_indikator` int(20) NOT NULL,
  `target` int(20) NOT NULL,
  `nasional` int(20) NOT NULL,
  `jawa_barat` int(20) NOT NULL,
  `cimahi` int(20) NOT NULL,
  PRIMARY KEY (`id_form_isian_target`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=6 ;

--
-- Dumping data for table `form_isian_target`
--

INSERT INTO `form_isian_target` (`id_form_isian_target`, `id_indikator`, `target`, `nasional`, `jawa_barat`, `cimahi`) VALUES
(1, 1, 0, 0, 0, 0),
(2, 3, 0, 0, 0, 0),
(3, 4, 0, 0, 0, 0),
(4, 5, 0, 0, 0, 0),
(5, 6, 0, 0, 0, 0);

-- --------------------------------------------------------

--
-- Table structure for table `kegiatan`
--

CREATE TABLE IF NOT EXISTS `kegiatan` (
  `KodeKegiatan` varchar(25) NOT NULL,
  `NamaKegiatan` varchar(300) NOT NULL,
  `JadwalAwal` date NOT NULL,
  `JadwalAkhir` date NOT NULL,
  `KodeInstansi` varchar(200) NOT NULL,
  `KodeKomponen` varchar(20) NOT NULL,
  `KodeSubKomponen` varchar(20) NOT NULL,
  `KodeDetailSubKomponen` varchar(20) NOT NULL,
  `Anggaran` bigint(15) NOT NULL,
  PRIMARY KEY (`KodeKegiatan`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `kegiatan`
--

INSERT INTO `kegiatan` (`KodeKegiatan`, `NamaKegiatan`, `JadwalAwal`, `JadwalAkhir`, `KodeInstansi`, `KodeKomponen`, `KodeSubKomponen`, `KodeDetailSubKomponen`, `Anggaran`) VALUES
('E-0112014010819', 'Dana Bantuan Bulan Februari', '2014-02-03', '2014-02-07', '16', 'E', 'E-04', 'E-011', 135000000),
('E-0112014010853', 'Dana Bantuan Bulan Januari', '2014-01-06', '2014-01-13', '16', 'E', 'E-04', 'E-011', 134000000),
('L-0122014010930', 'Perbaikan Jalan', '2014-01-01', '2014-01-08', '18', 'L', 'L-01', 'L-012', 25000000),
('L-0212014011433', 'Perbaikan Saluran Air', '2014-01-16', '2014-01-23', '18', 'L', 'L-02', 'L-021', 40000000),
('L-0342014010901', 'Perbaikan Jalan', '2014-01-10', '2014-01-16', '8', 'L', 'L-01', 'L-034', 10000000),
('L-0412014010833', 'Bedah Rumah Kelurahan Cibeber', '2014-02-10', '2014-02-14', '18', 'L', 'L-04', 'L-041', 150000000),
('L-0412014091734', 'Bantuan Pendidikan', '2014-09-14', '2014-09-19', '16', 'E', 'L-12', 'L-041', 300000000),
('S-0242014010806', 'Bedah Rumah Kelurahan Setiamanah', '2014-01-01', '2014-01-03', '18', 'L', 'L-04', 'L-041', 50000000);

-- --------------------------------------------------------

--
-- Table structure for table `m_goal`
--

CREATE TABLE IF NOT EXISTS `m_goal` (
  `id_goal` int(15) NOT NULL AUTO_INCREMENT,
  `goal` varchar(400) NOT NULL,
  PRIMARY KEY (`id_goal`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=8 ;

--
-- Dumping data for table `m_goal`
--

INSERT INTO `m_goal` (`id_goal`, `goal`) VALUES
(1, 'Menanggangi Kemiskinan dan Kelaparan'),
(2, 'Mencapai Pendidikan Dasar untuk Semua'),
(3, 'Mendorong Kesetaraan Gender dan Pemberdayaan Perempuan'),
(4, 'Menurunkan Angka Kematian Anak'),
(5, 'Meningkatkan Kesehatan Ibu'),
(6, 'Memerangi HIV / AIDS, Malaria, dan Penyakir Menular Lainnya'),
(7, 'Menjamin Kelestarian Lingkungan Hidup');

-- --------------------------------------------------------

--
-- Table structure for table `m_indikator`
--

CREATE TABLE IF NOT EXISTS `m_indikator` (
  `id_indikator` int(11) NOT NULL AUTO_INCREMENT,
  `kode_indikator` varchar(10) NOT NULL,
  `id_goal` int(15) NOT NULL,
  `nama_indikator` varchar(300) NOT NULL,
  `definisi` text NOT NULL,
  `manfaat` text NOT NULL,
  `sumber_data` varchar(200) NOT NULL,
  `nilai_target` float NOT NULL,
  `kategori` int(3) NOT NULL,
  PRIMARY KEY (`id_indikator`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=94 ;

--
-- Dumping data for table `m_indikator`
--

INSERT INTO `m_indikator` (`id_indikator`, `kode_indikator`, `id_goal`, `nama_indikator`, `definisi`, `manfaat`, `sumber_data`, `nilai_target`, `kategori`) VALUES
(1, '1.1.x', 1, 'Proporsi penduduk dengan tingkat kosumsi di bawah garis kemiskinan *', 'Rasio kesenjangan kemiskinan adalah jumlah rasio antara selisih pendapatan orang miskin dengan garis kemiskinan terhadap garis kemiskinan itu sendiri, dibagi dengan jumlah penduduk.  Pada tahun 1990,  Index Kedalaman kemiskinan/rasio kesenjangan kemiskinan Indonesia adalah 2,70%  sementara sampai tahun 2010 pencapaian adalah 2,21% dan diharapkan terus menurun di tahun 2015.', 'Indeks Kedalaman Kemiskinan (Poverty Gap Index-P1) merupakan ukuran rata-rata kesenjangan pengeluaran masing-masing penduduk miskin terhadap GK. Semakin tinggi nilai indeks, semakin jauh rata-rata pengeluaran penduduk dari Garis Kemiskinan. \r\n                                                                                                                                                                                     Indikator ini digunakan untuk mengukur "defisit kemiskinan" sehingga dapat diketahui besar dana per kapita yang diperlukan untuk mengangkat penduduk miskin ke garis kemiskinan.', 'BPS Susenas Modul Konsumsi', 7.55, 0),
(3, '1.2', 1, 'Index kedalaman kemiskinan atau rasio kesenjangan kemiskinan *', 'Rasio kesenjangan kemiskinan adalah jumlah rasio antara selisih pendapatan orang miskin dengan garis kemiskinan terhadap garis kemiskinan itu sendiri, dibagi dengan jumlah penduduk.  Pada tahun 1990,  Index Kedalaman kemiskinan/rasio kesenjangan kemiskinan Indonesia adalah 2,70%  sementara sampai tahun 2010 pencapaian adalah 2,21% dan diharapkan terus menurun di tahun 2015.', 'Indeks Kedalaman Kemiskinan (Poverty Gap Index-P1) merupakan ukuran rata-rata kesenjangan pengeluaran masing-masing penduduk miskin terhadap GK. Semakin tinggi nilai indeks, semakin jauh rata-rata pengeluaran penduduk dari Garis Kemiskinan. \n                                                                                                                                                                                     Indikator ini digunakan untuk mengukur "defisit kemiskinan" sehingga dapat diketahui besar dana per kapita yang diperlukan untuk mengangkat penduduk miskin ke garis kemiskinan.', 'BPS Susenas Modul Konsumsi', 0, 0),
(4, '1.4.x', 1, 'Pertumbuhan PDRB per penduduk yang bekerja', '', '', 'BPS PODES', 0, 0),
(5, '1.5', 1, 'Rasion kesempatan kerja terhadap total penduduk usia 15 tahun ke atas', '', '', '(Tingkat Kesempatan Kerja/TKK, Sakernas)', 95, 1),
(6, '1.5.x', 1, 'Tingkat pengangguran terbuka penduduk remaja berusia 15-24 tahun', 'Rasio antara jumlah pencari kerja dengan jumlah angkatan kerja.  Angkatan kerja adalah penduduk usia kerja atau yang berusia 15 tahun ke atas yang tidak dalam kegiatan sekolah, mengurus rumah tangga, dan sebagainya.', 'Indikator ini memberikan indikasi tentang penduduk usia kerja yang termasuk kelompok pengangguran', 'BPS, Sakernas, Data Kabupaten', 0, 0),
(9, '1.7', 1, 'Proporsi penduduk yang bekerja dengan status pekerja bebas dan pekerja keluarga terhadap total penduduk yang bekerja', '', '', 'BPS, Sakernas, Data Kabupaten', 0, 0),
(10, '1.7.x', 1, 'Proporsi penduduk yang setengah menganggur', 'Penduduk yang setengah menganggur adalah penduduk yang berkerja dalam rentang waktu di bawah jam kerja normal walaupun yang bersangkutan belum bekerja optimal, karena masih ingin bekerja lebih lama.  Karena jumlah jam kerja normal adalah 35 jam, seminggu, maka yang dimaksud dengan setengah penganggur adalah penduduk yang bekerja di bawah 35 jam per minggu dan yang bersangkutan masih mencari pekerjaan', '', 'BPS, Sakernas, Data Kabupaten', 0, 0),
(11, '1.8', 1, 'Prevalensi balita kurang gizi *', 'BKG adalah perbandingan antara balita berstatus kurang glzl dan gizi buruk dengan balita seluruhnya. Prevalensl status glzl balita diperoleh melalul indeks berat badan, umur, dan jenis kelamin. Kategorl status gizi ditentukan dengan menggunakan standar NCHS-WHO, yang dibagi menjadi 4 kelas berdasarkan Z-score yaitu:\r\n(1)    gizi lebih (Z-score >= +2)\r\n(2)    gizi normal (-2 < Z-score <:+2)\r\n(3)    gizi kurang (-3 < Z-score <-2)\r\n(4)    gizi buruk (Z-score <=-3)\r\nTarget Indonesia untuk tahun 2015 adalah 15,5%  (dari 31% di tahun 1989) dengan rincian Balita Gizi Kurang:  3,6%  Balita Gizi Buruk:  11,9%.', 'Anak kurang gizi memiliki kemungkinan risiko kematian yang tinggi, menghambat pertumbuhan dan mempengaruhi status kesehatannya dikemudian hari. Privalensi balita kurang gizi secara universal digunakan sebagai indikator untuk memonitor status kesehatan penduduk.', 'SDKI, BPS & Kementerian Kesehatan, Data Provinsi;  SKPD Kesehatan, Data Kecamatan', 15.5, 0),
(12, '1.9', 1, 'Proporsi penduduk dengan asupan kalori di bawah tingkat konsumsi minimum (2.000 kkal kapita per hari)', 'Indikator global yang dipakai sebagai ukuran kelaparan adalah proporsi penduduk yang berada di bawah garis konsumsi energi minimum  (2.100 kkal) per kapita per hari.  Sementara itu  dalam Widyakarya Pangan dan Gizi Tahun 2004 dikemukakan bahwa ukuran kelaparan adalah 89% dari konsumsi energi minimum.  Oleh karena itu diusulkan untuk memakai indikator berikut pada tataran lokal yaitu: angka kecukupan gizi minimum atau proporsi penduduk yang kelaparan berada di bawah garis konsumsi energi minimum (di bawah 1.869 kkal  per kapita per hari).\r\nTarget 2015 untuk proporsi penduduk dengan asupan kalori di bawah tingkat konsumsi minimum 2.000 kkal kapita per hari adalah 35,32%  dari 64,21% pada tahun 1990,  Sementara pencapaian tahun 2010 adalah  61,86%', 'Indikator ini digunakan untuk mengukur banyaknya penduduk yang mempunyai konsumsi energy yang sangat rendah sehingga memerlukan prioritas di dalam upaya perbaikan pangan dan gizi.  Pembangunan berkelanjutan memerlukan usaha konkrit untuk mengurangi kemiskinan serta mencari solusi menghilangkan kelaparan dan kekurangan gizi.', 'BPS, Modul Konsumsi Susenas, Data Kabupaten', 35.32, 0),
(13, '1.a', 1, 'Proporsi penduduk miskin berdasarkan PPLS *', 'Pendataan Program Perlindungan Sosial (PPLS),  merupakan pendataan yang dilakukan BPS dalam rangka menyokong Program Bantuan Langsung Tunai bersama berbagai aparat pemerintah lain baik di pusat maupun daerah.  Selain itu hasil pendataan ini akan memberikan akses data bagi program kesejahteraan sosial.  Metodologi yang digunakan adalah mendata rumah tangga sasaran dengan menggunakan kriteria akses terhadap kebutuhan dasar yang tercermin dalam 16 Kriteria Rumah Tangga Miskin (variable non-monetary). Untuk mengetahui intensitas kemiskinan dari Rumah Tangga Sasaran (RTS), RTS dikelompokkan menjadi rumah tangga sangat miskin (RTSM), rumah tangga miskin (RTM) dan rumah tangga hampir miskin/near poor (RTHM). \r\nDalam kategori diatas, penduduk dalam Rumah Tangga Hampir Miskin (RTHM) dapat diklasifikasikan sebagai penduduk yang berada sedikit diatas garis kemiskinan namun sangat rentan terhadap guncangan ekonomi.\r\n\r\nData Mikro Kemiskinan ini dihasilkan BPS melalui survey Pendataan Sosial Ekonomi tahun 2005 (PSE-05) dan telah diupdate dengan Survey Pendataan Program Perlindungan Sosial tahun 2008 (PPLS-08). Survey PSE-05 dan PPLS-08 mengidentifikasi keluarga miskin sampai pada identitas kepala rumah tangga dan alamat tempat tinggalnya.', 'Data Makro Kemiskinan dari Pendataan Program Perlindungan Sosial dapat digunakan sebagai dasar untuk melaksanakan pemberian bantuan sosial  yang bersifat langsung ditujukan kepada masyarakat miskin (targeting), terutama untuk program-program yang ditujukan untuk memenuhi akses terhadap pelayanan dasar (kemiskinan non pendapatan).  \r\n\r\nBantuan pada Program-Program Perlindungan Sosial yang masuk dalam Klaster-I seperti Raskin dan Jamkesmas diberikan kepada seluruh Rumah Tangga Sasaran (RTS), termasuk Rumah Tangga Hampir Miskin (RTHM), walaupun kategori ini berada diatas garis kemiskinan. Hal ini dilakukan dengan pertimbangan bahwa RTHM sangat rentan terhadap kondisi perekonomian yang dalam beberapa tahun terakhir ini mengalami perubahan-perubahan yang signifikan. Ini sesuai dengan tujuan dari Program Klaster-I yaitu untuk memberikan perlindungan terhadap seluruh penduduk miskin dan penduduk yang rentan terhadap kemiskinan. \r\n\r\nKarena data yang dihasilkan hingga ke rumah tangga, maka untuk kabupaten data PPLS akan sangat berguna untuk melihat peta kantong-kantong kemiskinan baik di kecamatan sampai ke tingkat desa baik untuk katagori rumah tangga sangat miskin, rumah tangga miskin maupun dengan mengikutsertakan rumah tangga hampir miskin.', 'sangat miskin, rumah tangga miskin maupun dengan mengikutsertakan rumah tangga hampir miskin.', 7.55, 0),
(14, '1.b', 1, 'Proporsi keluarga yang termasuk dalam kategori Pra-Sejatera dan Sejahtera 1', 'Pendataan Program Perlindungan Sosial (PPLS),  merupakan pendataan yang dilakukan BPS dalam rangka menyokong Program Bantuan Langsung Tunai bersama berbagai aparat pemerintah lain baik di pusat maupun daerah.  Selain itu hasil pendataan ini akan memberikan akses data bagi program kesejahteraan sosial.  Metodologi yang digunakan adalah mendata rumah tangga sasaran dengan menggunakan kriteria akses terhadap kebutuhan dasar yang tercermin dalam 16 Kriteria Rumah Tangga Miskin (variable non-monetary). Untuk mengetahui intensitas kemiskinan dari Rumah Tangga Sasaran (RTS), RTS dikelompokkan menjadi rumah tangga sangat miskin (RTSM), rumah tangga miskin (RTM) dan rumah tangga hampir miskin/near poor (RTHM). \r\nDalam kategori diatas, penduduk dalam Rumah Tangga Hampir Miskin (RTHM) dapat diklasifikasikan sebagai penduduk yang berada sedikit diatas garis kemiskinan namun sangat rentan terhadap guncangan ekonomi.\r\n\r\nData Mikro Kemiskinan ini dihasilkan BPS melalui survey Pendataan Sosial Ekonomi tahun 2005 (PSE-05) dan telah diupdate dengan Survey Pendataan Program Perlindungan Sosial tahun 2008 (PPLS-08). Survey PSE-05 dan PPLS-08 mengidentifikasi keluarga miskin sampai pada identitas kepala rumah tangga dan alamat tempat tinggalnya.', 'Data Makro Kemiskinan dari Pendataan Program Perlindungan Sosial dapat digunakan sebagai dasar untuk melaksanakan pemberian bantuan sosial  yang bersifat langsung ditujukan kepada masyarakat miskin (targeting), terutama untuk program-program yang ditujukan untuk memenuhi akses terhadap pelayanan dasar (kemiskinan non pendapatan).  \r\n\r\nBantuan pada Program-Program Perlindungan Sosial yang masuk dalam Klaster-I seperti Raskin dan Jamkesmas diberikan kepada seluruh Rumah Tangga Sasaran (RTS), termasuk Rumah Tangga Hampir Miskin (RTHM), walaupun kategori ini berada diatas garis kemiskinan. Hal ini dilakukan dengan pertimbangan bahwa RTHM sangat rentan terhadap kondisi perekonomian yang dalam beberapa tahun terakhir ini mengalami perubahan-perubahan yang signifikan. Ini sesuai dengan tujuan dari Program Klaster-I yaitu untuk memberikan perlindungan terhadap seluruh penduduk miskin dan penduduk yang rentan terhadap kemiskinan. \r\n\r\nKarena data yang dihasilkan hingga ke rumah tangga, maka untuk kabupaten data PPLS akan sangat berguna untuk melihat peta kantong-kantong kemiskinan baik di kecamatan sampai ke tingkat desa baik untuk katagori rumah tangga sangat miskin, rumah tangga miskin maupun dengan mengikutsertakan rumah tangga hampir miskin.', 'BPS, Pendataan Program Perlindungan Sosial (2008, 2011)', 7.55, 0),
(15, '1.d', 1, 'Proporsi pencari kerja usia > 15 tahun / Tingkat Pengganguran terbuka', '', '', 'Naketrans', 5.1, 0),
(16, '1.f', 1, 'Persentase Balita yang berada di Bawah Garis Merah (BGM) *', 'Balita dengan BGM adalah balita dengan berat badan menurut umur (BB/U) berada pada dan di bawah garis merah pada kartu menuju sehat (KMS)', '', '', 15.5, 0),
(17, '2.1.a', 2, 'Angka Partisipasi Murni Sekolah Dasar (APM-SD/MI) *', 'Angka partisipasi murni sekolah dasar adalah perbandingan antara murid sekalah dasar (SD), usia 7-12 tahun termasuk madrasah Ibtidayah (MI), Ula, dan paket A setara SD, dengan penduduk usia 7-12 tahun, dinyatakan dalam persentase.', 'Indikator ini dipakai untuk memonitor pencapaian tujuan pendidikan dasar yang diindentifikasi oleh MDGs, khususnya pendidikan sekolah dasar atau setingkat termasuk MI, Ula, dan paket A setara SD.\r\n\r\nAPM menunjukkan partisipasi sekolah penduduk usia sekolah di tingkat pendidikan tertentu. Seperti APK, APM juga merupakan indikator daya serap penduduk usia sekolah di setiap jenjang pendidikan. \r\n\r\nTetapi, jika dibandingkan APK, APM merupakan indikator daya serap yang lebih baik karena APM melihat partisipasi penduduk kelompok usia standar di jenjang pendidikan yang sesuai dengan standar tersebut.', 'SKPD Pendidikan & BPS, Data Kecamatan', 100, 1),
(18, '2.1.b', 2, 'Angka Partisipasi Murni Sekolah Menengah Pertama (APM-SMP/MTs) *', 'APM di SMP adalah perbandingan antara murid SMP usia 13-15 tahun termasuk Madrasah Tsanawiyah (MTs), Wutsha, dan paket B setara SMP dengan penduduk usia 13-15 tahun, dinyatakan dalam persentase.', 'Indikator ini dipakai untuk memonitor pencapaian tujuan pendidikan dasar yang diidentifikasi oleh MDGs, khususnya pendidikan sekolah dasar atau setingkat, termasuk MTs, Wutsha, dan Paket B setara SMP.\r\n\r\nAPM menunjukkan partisipasi sekolah penduduk usia sekolah di tingkat pendidikan tertentu. Seperti APK, APM juga merupakan indikator daya serap penduduk usia sekolah di setiap jenjang pendidikan.\r\n\r\nTetapi, jika dibandingkan APK, APM merupakan indikator daya serap yang lebih baik karena APM melihat partisipasi penduduk kelompok usia standar di jenjang pendidikan yang sesuai dengan standar tersebut.', 'SKPD Pendidikan & BPS, Data Kecamatan', 100, 1),
(19, '2.1.x', 2, 'Angka Parstisipasi Kasar Sekolah Dasar (APK SD/MI) *', 'Angka partisipasi kasar sekolah dasar adalah rasio antara jumlah murid sekolah dasar/madrasah ibtidaiyah (SD/MI), Ula, dan Paket A setara SD dan sekolah lainnya sederajat SD tanpa memandang usia dengan jumlah seluruh penduduk usia 7 - 12 tahun, dinyatakan dalam persentase', 'APK menunjukkan tingkat partisipasi penduduk secara umum di suatu tingkat pendidikan. APK merupakan indikator yang paling sederhana untuk mengukur daya serap penduduk usia sekolah di masing-masing jenjang pendidikan, khususnya pendidikan sekolah dasar atau setingkat, termasuk MI, Ula, dan paket A setara SD.', 'SKPD Pendidikan & BPS, Data Kecamatan', 100, 1),
(20, '2.1.y', 2, 'Angka Partisipasi Kasar Menengah Pertama (APK SMP/MTs) *', 'Angka partisipasi kasar sekolah dasar adalah rasio antara jumlah murid sekolah dasar/madrasah ibtidaiyah (SD/MI), Ula, dan Paket A setara SD dan jumlah murid sekolah menengah pertama/ Madrasah Tsanawiyah (MTs), Wutsha, dan paket B setara SMP dan sekolah lainnya sederajat SMP tanpa memandang usia dengan jumlah seluruh penduduk usia 13 - 15 tahun, dinyatakan dalam persentase.', 'APK menunjukkan tingkat partisipasi penduduk secara umum di suatu tingkat pendidikan. APK merupakan indikator yang paling sederhana untuk mengukur daya serap penduduk usia sekolah di masing-masing jenjang pendidikan, khususnya murid sekolah dasar/madrasah ibtidaiyah (SD/MI), Ula, dan Paket A setara SD dan sekolah menengah tingkat pertama atau setingkat, termasuk Madrasah Tsanawiyah (MTs), Wutsha, dan paket B setara SMP.', 'SKPD Pendidikan & BPS, Data Kecamatan', 100, 1),
(21, '2.1.z', 2, 'Angka Partisipasi Sekolah (APS) anak 7 - 15 tahun', 'Angka partisipasi kasar sekolah dasar adalah rasio antara jumlah murid sekolah menengah pertama/ Madrasah Tsanawiyah (MTs), Wutsha, dan paket B setara SMP dan sekolah lainnya sederajat SMP tanpa memandang usia dengan jumlah seluruh penduduk usia 7 - 15 tahun, dinyatakan dalam persentase.', 'APK menunjukkan tingkat partisipasi penduduk secara umum di suatu tingkat pendidikan. APK merupakan indikator yang paling sederhana untuk mengukur daya serap penduduk usia sekolah di masing-masing jenjang pendidikan, khususnya pendidikan sekolah menengah tingkat pertama atau setingkat, termasuk Madrasah Tsanawiyah (MTs), Wutsha, dan paket B setara SMP.', 'SKPD Pendidikan & BPS, Data Kecamatan', 100, 1),
(22, '2.2', 2, 'Proporsi murid kelas 1 yang berhasil mencapai kelas 6 *', 'Proporsi murid kelas 1 yang berhasil mencapai kelas 6 atau yang biasa disebut  dengan angka bertahan di SD adalah proporsi  murid pada cohort murid kelas 1 yang memasuki sekolah dasar pada tahun ajaran tertentu dan berhasil mencapai kelas 6, dinyatakan dalam persentase.', 'Indikator ini digunakan untuk mengukur keberhasilan sistem pendidikan yang dapat mengantarkan murid naik dari satu kelas ke kelas berikutnya.', 'SKPD Pendidikan & BPS, Data Kecamatan', 100, 1),
(23, '2.2.z', 2, 'Angka putus sekolah (DO) anak usia 7.15 tahun', 'Angka putus sekolah atau DO (drop out) adalah proporsi penduduk berusia 7 - 15 tahun yang pernah bersekolah tetapi karena suatu hal tidak dapat lagi melanjutkan sekolah sebelum tamat Wajar 9 Tahun atau lulus SMP/MTs, dalam persentase', '', 'SKPD Pendidikan & BPS, Data Kecamatan', 1, 0),
(24, '2.3', 2, 'Angka melek huruf penduduk usia 15-24 tahun *', 'AMH penduduk usia 15-24 tahun adalah perbandingan jumlah penduduk berusia 15-24 tahun yang dapat membaca dan menulis kalimat sederhana dengan huruf latin dengan jumlah penduduk usia 15-24 tahun.', 'AMH pemuda merefleksikan out come pendidikan dasar sejak 10 tahun terakhir sebagai ukuran efektifnya sistem pendidikan dasar. Indikator ini kerap dilihat sebagai proksi untuk mengukur kemajuan pembangunan sosial dan ekonomi.', 'BPS, Kor Susenas, Data Kabupaten', 100, 1),
(25, '2.a', 2, 'APM Pendidikan Prasekolah', 'Angka partisipasi murni Pra sekolah adalah perbandingan antara murid Pra sekolah termasuk TK, RA, BA, usia 4-6 tahun, dengan penduduk usia 4-6 tahun, dinyatakan dalam persentase.', '', 'SKPD Pendidikan & BPS, Data Kecamatan', 100, 1),
(26, '2.b', 2, 'APM Anak Kebutuhan Khusus', '', '', 'SKPD Pendidikan & BPS, Data Kabupaten', 100, 1),
(27, '2.c', 2, 'Proporsi siswa tingkat 1 SD yang berhasil menyelesaikan pendidikan dasar 9 tahun', 'Proporsi murid kelas 1 yang berhasil menyelesaikan sembilan tahun pendidikan dasar (PMT-SMP) adalah banyaknya murid kelas 1 yang berhasil menyelesaikan pendidikan 9 tahun (tamat SMP termasuk MTs) pada tahun tertentu tertiadap jumlah penduduk berusia 15 tahun, dinyatakan dalam persentase.', 'Indikator ini digunakan untuk memonitor cakupan pendidikan dan kemajuan murid untuk menamatkan pendidikan hingga tingkat SMP (wajib belajar 9 tahun dari program pemerintah Indonesia), tanpa memperhatikan apakah pemah mengulang di suatu kelas.', 'SKPD Pendidikan & BPS, Data Kabupaten', 100, 1),
(28, '2.d', 2, 'Angka kelulusan SD', 'Angka lulusan SD adalah perbandingan antara siswa SD dan yang sederajat (MI, Ula, dan Paket A) yang lulus dibandingkan dengan siswa tingkat kelas 6 SD tersebut, dalam persentase', 'Angka kelulusan merupakan indikator output yang meberikan gambaran tentang efisiensi proses pendidikan di SD.  Indikator ini digunakan juga untuk memonitor kemajuan siswa dalam menamatkan pendidikannya di SD', 'SKPD Pendidikan & BPS, Data Kecamatan', 100, 1),
(29, '2.e', 2, 'Angka kelulusan SMP', 'Angka lulusan SMP adalah perbandingan antara siswa SMP dan yang sederajat (MTs, Wusha, dan Paket B) yang lulus dibandingkan dengan siswa tingkat kelas 3 SMP tersebut, dalam persentase', 'Angka kelulusan merupakan indikator output yang meberikan gambaran tentang efisiensi proses pendidikan di SMP.  Indikator ini digunakan juga untuk memonitor kemajuan siswa dalam menamatkan pendidikannya di SMP.', 'SKPD Pendidikan & BPS, Data Kecamatan', 100, 1),
(30, '2.f', 2, 'Angka putus sekolah SD', 'Angka putus sekolah SD adalah perbandingan antara siswa SD yang putus sekolah terhadap jumlah seluruh siswa SD, termasuk (MI, Ula, dan Paket A) dalam persentase', 'Indikator ini digunakan untuk memonitor kemajuan siswa SD dalam menyelesaikan pendidikannya.  Dengan mengetahui angka putus sekolah, dapat dilakukan upaya pencegahan bagi siswa yang memiliki potensi untuk putus sekolah dan mengembalikan ke sekolah bagi siswa yang putus sekolah', 'SKPD Pendidikan, Data Kabupaten', 1, 0),
(31, '2.g', 2, 'Angka putus sekolah SMP', 'Angka putus sekolah SMP adalah perbandingan antara siswa SMP yang putus sekolah terhadap jumlah seluruh siswa SMP termasuk (MTs, Wusha, dan Paket B), dalam persentase', 'Indikator ini digunakan untuk memonitor kemajuan siswa SMP dalam menyelesaikan pendidikannya.  Dengan mengetahui angka putus sekolah, dapat dilakukan upaya pencegahan bagi siswa yang memiliki potensi untuk putus sekolah dan mengembalikan ke sekolah bagi siswa yang putus sekolah', 's', 1, 0),
(32, '2.h', 2, 'Angka melanjutkan ke SMP', 'Angka melanjutkan ke SMP adalah perbandingan antara lulusan jenjang SD dan sederajat, terhadap siswa tingkat 1 pada jenjang SMP sederajat dinyatakan dalam persentase', 'Indikator ini untuk memantau kemajuan siswa yang telah meneylesaikan pendidikan pada jenjang SD untuk melanjutkan ke jenjang SMP', 'SKPD Pendidikan & BPS, Data Kecamatan', 100, 1),
(33, '2.i', 2, 'Angka melanjutkan ke SMA', '', '', 'SKPD Pendidikan & BPS, Data Kecamatan', 100, 1),
(34, '3.1.a', 3, 'Rasio jenis kelamin Angka Partisipasi Murni (RAPM) anak perempuan terhadap anak laki-laki di jenjang pendidikan Sekolah Dasar  *', 'RAPM anak perempuan terhadap anak laki-laki di tingkat pendidikan dasar, adalah perbandingan APM murid perempuan yang bersekolah pada setiap jenjang pendidikan di sekolah negeri dan swasta terhadap APM murid laki-laki.', 'Indikator kesempatan memperoleh pendidikan antara perempuan dan laki-laki diukur dari rasio APM yang menunjukkan kesetaraan dan keadilan gender di bidang pendidikan. Pendidikan adalah salah satu aspek penting dari jembangunan manusia. Menghilangkan ketimpangan gender di semua enjang pendidikan akan meningkatkan status dan kemampuan perempuan. karena jumlah penduduk perempuan adalah separuh dari seluruh jumlah penduduk, pendidikan perempuan merupakan determinan yang penting dalam pembangunan ekonomi.', 'SKPD Pendidikan & BPS, Data Kecamatan', 100, 1),
(35, '3.1.b', 3, 'Rasio jenis kelamin Angka Partisipasi Murni (RAPM) anak perempuan terhadap anak laki-laki di jenjang pendidikan di SMP  *', 'RAPM anak perempuan terhadap anak laki-laki di tingkat pendidikan menengah pertama  adalah perbandingan APM murid/mahasiswa perempuan yang bersekolah pada setiap jenjang pendidikan di sekolah negeri dan swasta terhadap APM murid/mahasiswa laki-laki.', 'Indikator kesempatan memperoleh pendidikan antara perempuan dan laki-laki diukur dari rasio APM yang menunjukkan kesetaraan dan keadilan gender di bidang pendidikan. Pendidikan adalah salah satu aspek penting dari jembangunan manusia. Menghilangkan ketimpangan gender di semua enjang pendidikan akan meningkatkan status dan kemampuan perempuan. karena jumlah penduduk perempuan adalah separuh dari seluruh jumlah penduduk, pendidikan perempuan merupakan determinan yang penting dalam pe', 'SKPD Pendidikan & BPS, Data Kabupaten', 100, 1),
(36, '3.1.c', 3, 'Rasio jenis kelamin Angka Partisipasi Murni (RAPM) anak perempuan terhadap anak laki-laki di jenjang pendidikan di SM  *', 'RAPM anak perempuan terhadap anak laki-laki di tingkat pendidikan menengah atas adalah perbandingan APM murid/mahasiswa perempuan yang bersekolah pada setiap jenjang pendidikan di sekolah negeri dan swasta terhadap APM murid/mahasiswa laki-laki.', 'Indikator kesempatan memperoleh pendidikan antara perempuan dan laki-laki diukur dari rasio APM yang menunjukkan kesetaraan dan keadilan gender di bidang pendidikan. Pendidikan adalah salah satu aspek penting dari jembangunan manusia. Menghilangkan ketimpangan gender di semua enjang pendidikan akan meningkatkan status dan kemampuan perempuan. karena jumlah penduduk perempuan adalah separuh dari seluruh jumlah penduduk, pendidikan perempuan merupakan determinan yang penting dalam pembangunan ekonomi.', 'SKPD Pendidikan & BPS, Data Kabupaten', 100, 1),
(37, '3.1.x', 3, 'Rasio perempuan/laki-laki melek huruf berusia 15-24 tahun  *', 'RAMH perempuan terhadap laki-laki usia 15-24 tahun adalah perbandingan antara RAMH penduduk perempuan terhadap RAMH penduduk laki-laki yang berumur 15-24 tahun, dinyatakan dalam persentase.', 'Indikator kesempatan memperoleh pendidikan antara perempuan dan laki-laki diukur dari RAMH yang menunjukkan kesetaraan dan keadilan gender di bidang pendidikan. Indikator ini merupakan indikator kunci pemberdayaan perempuan di masyarakat.', 'BPS, Kor Susenas, Data Kabupaten', 100, 1),
(38, '3.2', 3, 'Kontribusi perempuan dalam pekerja upahan di sektor non pertanian  *', '', '', 'BPS, Sakernas, Data Kabupaten', 50, 1),
(39, '3.3', 3, 'Proporsi anggota parlemen perempuan  *', 'Proporsi kursi DPR atau DPRD yang diduduki perempuan adalah perbandingan banyaknya kursi DPR atau DPRD yang diduduki perempuan terhadap total kursi DPR atau DPRD, dan dinyatakan dalam persentase.', 'Perwakilan perempuan di parlemen merupakan salah satu aspek kesempatan perempuan untuk berpartisipasi dalam kehidupan politik.', 'KPUD', 30, 1),
(40, '3.a', 3, 'Proporsi camat perempuan  *', '', '', 'BPS/SETDA/BPD/PP, Data Kecamatan', 30, 1),
(41, '3.b', 3, 'Proporsi lurah/kepala desa perempuan  *', '', '', 'BPS/SETDA/BPD/PP, Data Kecamatan', 30, 1),
(42, '3.c', 3, 'Proporsi anggota baperjakat perempuan  *', '', '', 'BPS/SETDA/BPD/PP, Data Kab', 30, 1),
(43, '3.d', 3, 'Proporsi pejabat perempuan di lingkungan PEMDA  *', '', '', 'BPS/SETDA/BPD/PP, Data Kab', 30, 1),
(44, '4.1', 4, 'Angka Kematian Balita (AKABA) per 1.000 kelahiran hidup  *', 'AKABA adalah jumlah anakyang dilahirkan pada tahun tertentu dan meninggal sebelum mencapai usia 5 tahun, dinyatakan sebagai angka per 1000 kelahiran hidup. Nilai normatif AKABA > 140 sangat tinggi, antara 71 - 140 sedang dan < 20 rendah.', 'Indikator ini terkait langsung dengan target kelangsungan hidup anak dan merefleksikan kondisi sosial, ekonomi dan lingkungan anak-anak bertempat tinggal termasuk pemeliharaan kesehatannya. AKABA kerap dipakai untuk mengidentifikasi kesulitan ekonomi penduduk.\r\nMengingat kegiatan registrasi penduduk di Indonesia belum sempurna sumber data ini belum dapat dipakai untuk menghitung AKABA. Sebagai gantinya Akaba dihitung berdasarkan estimasi tidak langsung dari berbagai survei Brass', 'BPS, SDKI,  Data Provinsi', 32, 0),
(45, '4.1.x', 4, 'Kasus Kematian Balita  *', '', '', 'SKPD Kesehatan, Data Kecamatan', 32, 0),
(46, '4.2', 4, 'Angka Kematian Bayi (AKB) per 1.000 kelahiran hidup  *', 'AKB adalah banyaknya bayi yang meninggal sebelum mencapai usia 1 tahun\r\nAKB per 1000 kelahiran hidup pada tahun yang sama.\r\nNilai normatif AKB kurang dari 40 sangat sulit diupayakan penurunannya (hard\r\nrock), antara 40-70 tergolong sedang namun sulit untuk diturunkan, dan lebih\r\nbesardari70tergolongmudahuntukditurunkan', 'Indikator ini terkait langsung dengan target kelangsungan hidup anak dan merefleksikan kondisi sosial, ekonomi dan lingkungan anak-anak bertempat tinggal termasuk pemeliharaan kesehatannya. AKB cenderung lebih menggambarkan kesehatan reproduksi dari pada Akaba. Meskipun target program terkait khusus dengan kematian balita, AKB relevan dipakai untuk memonitor pencapaian target program karena mewakili komponen penting pada kematian balita. Brass', 'BPS, SDKI,  Data Provinsi', 23, 0),
(47, '4.2.x', 4, 'Kasus Kematian Bayi  *', '', '', 'SKPD Kesehatan, Data Kecamatan', 23, 0),
(48, '4.3', 4, 'Proporsi anak usia 1 tahun diimunisasi campak  *', 'PIC adalah perbandingan antara banyaknya anak berumur 1 tahun yang telah menerima paling sedikit satu kali imunisasi campak terhadap jumlah anak berumur 1 tahun, dan dinyatakan dalam persentase.', 'Indikator ini merupakan suatu ukuran cakupan dan kualitas sistem pemeliharaan kesehatan anak di suatu wilayah. Imunisasi adalah unsur penting untuk mengurangi kematian balita.', 'SKPD Kesehatan, Data Kecamatan - BPS Kor Susenas', 100, 1),
(49, '4.a', 4, 'Persentase pemberian Air Susu Ibu (ASI) ekslusif', '', '', '', 100, 1),
(50, '4.b', 4, 'Desa/kelurahan Universal Child Immunization (UCI)', '', '', '', 100, 1),
(51, '5.1', 5, 'Angka Kematian Ibu (AKI) per-100.000 kelahiran hidup  *', 'AKI adalah banyaknya wanita yang meninggal dari suatu penyebab kematian terkait dengan gangguan kehamilan atau penanganannya (tidak termasuk kecelakaan atau kasus Insldentll) selama kehamilan, melahlrkan dan dalam masa nifas (42 hari setelah melahlrkan) tanpa memperhltungkan lama kehamilan per 100 000 kelahiran hldup. AKI diperhitungkan pula pada jangka waktu 6 mlnggu hlnggasetahun setelah melahlrkan.', 'Indikator ini secara langsung digunakan untuk memonitor kematian terkait dengan kehamilan. AKI dipengaruhi oleh beberapa faktor termasuk status kesehatan secara umum, pendidikan dan pelayanan selama kehamilan dan melahirkan.', 'BPS SDKI, Data Kabupaten', 102, 0),
(52, '5.2', 5, 'Proporsi kelahiran yang ditolong oleh tenaga kesehatan terlatih  *', 'PPK oleh TKT adalah perbandlngan antara persalinan yang ditolong oleh tenaga kesehatan terlatih, seperti dokter, bidan, perawat, dan tenaga medls lainnya dengan jumlah persalinan seluruhnya, dan dinyatakan dalam persentase.', 'Mengukur kematian ibu secara akurat adalah sulit, kecuali tersedia data registrasi yang sempurna tentang kematian dan penyebab kematian. Oleh karena itu sebagai proksi indikator digunakan proporsi pertolongan kelahiran oleh tenaga kesehatan terlatih.', 'SKPD Kesehatan atau BPS Kor Susenas, Data Kecamatan', 90, 1),
(53, '5.3', 5, 'Angka pemakaian kontrasepsi (CPR) bagi  PUS (Pasangan Usia Subur) usia 15-49 tahun semua cara  *', '', '', 'SKPD Kesehatan, KB, BPS Kor Susenas', 100, 1),
(54, '5.4', 5, 'Angka kelahiran pada remaja perempuan usia 15-19 tahun/Age Specific Fertility Rate (ASFR) per 1.000 perempuan usia 15-19 tahun)  *', '', '', 'SKPD Kesehatan, Data Kecamatan atau BPS SDKI data Kabupaten', 0, 0),
(55, '5.5.a', 5, 'Cakupan pelayanan antenatal sedikitnya satu kali kunjungan  *', '', '', 'SKPD Kesehatan, Data Kecamatan atau BPS SDKI data Kabupaten', 100, 1),
(56, '5.5.b', 5, 'Cakupan pelayanan antenatal 4 kali kunjungan  *', '', '', 'SKPD Kesehatan, Data Kecamatan atau BPS SDKI data Kabupaten', 100, 1),
(57, '5.6', 5, 'Kebutuhan ber-KB yang tidak terpenuhi (unmet need)  *', '', '', 'BPS SDKI data Kabupaten', 6, 0),
(58, '5.a', 5, ' Cakupan ibu hamil dengan komplikasi yang ditangani', '', '', 'SKPD Kesehatan, Data Kecamatan', 100, 1),
(59, '5.b', 5, 'Persentase remaja yang mendapat penyuluhan tentang kesehatan reproduksi', '', '', 'Sektor Kesehatan/KB', 100, 1),
(60, '5.x', 5, 'Kasus kematian ibu  *', '', '', 'SKPD Kesehatan, Data Kecamatan', 102, 0),
(61, '6.1.x', 6, 'Prevalensi HIV dan AIDS dari total populasi  *', '', '', 'SKPD Kesehatan/KPA', 0, 0),
(62, '6.10.a', 6, 'Proporsi jumlah kasus tuberculosis yang terdeteksi dan diobati  dalam program DOTs (Directly Observed Treatment shortcourse Chemotherapy) /Angka penemuan pasien Tb paru BTA Positif (Case Detection Rate Tb BTA+)  *', 'AKP tuberkulosis adalah persentase kasus penderita baru yang tercatat positif terinfeksi tuberkulosis yang berobat sendiri atau berobat melalui strategi DOTS secara lengkap dan selesai. Angka keberhasilan pengobatan dapat secara langsung dipantau serta akurat dalam kontrol pasien yang diobati melalui DOTS.', 'Pengawasan yang efektif melaui penemuan dan penanganan kasus infeksi akan membatasi risiko penyebarannya. Pendekatan yang direkomendasikan untuk pengawasan melalui strategi DOTS sebuah strategi murah dan dapat mencegah jutaan penderita dari kematian.', '', 70, 0),
(63, '6.10.b', 6, 'Proporsi kasus tuberculosis yang diobati dan sembuh melalui DOTs (Directly Observed Treatment shortcourse Chemotherapy)/ Angka kesembuhan pasien Tb paru BTA positif  *', 'Angka penemuan penderita tuberkulosis BTA positif baru (APTBC) adalah persentase penderita baru tuberkulosis yang diobati melalui directly observed treatment short course (DOTS).', 'Indikator ini memberikan informasi tentang perkembangan penderita tuberkulosis dan penanganan pengobatannya yang tuntas atau tidak. Penyaklt tuberkulosis berjangklt melalui udara. Pengawasan yang efektif melalui penemuan dan penanganan kasus Infeksi akan membatasi risiko penyebarannya. Pendekatan yang direkomendasikan untuk pengawasan adalah melalui strategi DOTS sebuah strategi murah dan dapat mencegah jutaan penderita darl kematlan.', '', 85, 1),
(64, '6.5', 6, 'Proporsi penduduk yang terkena infeksi HIV tingkat lanjut yang mempunyai akses pada obat antiretroviral  *', '', '', 'SKPD Kesehatan, Data Kab', 100, 1),
(65, '6.6.a', 6, ' Angka kejadian malaria (per 1.000 penduduk)  *', '', '', 'SKPD Kesehatan, Data Kec', 0, 0),
(66, '6.6.b', 6, 'Angka kematian malaria  *', 'Angka kematian (AKM) yang disebabkan oleh malaria adalah banyaknya kematian per 100.000 penduduk karena malaria.', '', 'SKPD Kesehatan, Data Kec', 0, 0),
(67, '6.7', 6, 'Proporsi Balita yang tidur dengan kelambu yang telah diproteksi dengan insektisida  *', 'Cara pencegahan yang efektif untuk memerangi malaria adalah memakai kelambu yang telah diproteksi dengan insektisida. Indikator ini dihitung dengan membagi banyaknya balita yang pada malam sebelum survei tidur menggunakan kelambu dengan jumlah balita, dinyatakan dalam persen.', 'Mengukur cakupan pemakaian kelambu yang terbukti efektif untuk mencegah penyebaran penyakit malaria di daerah yang berisiko tinggi epidemi malaria terutama pada balita.', 'SKPD Kesehatan, Data Kec, BPS SDKI, Data Kab', 0, 0),
(68, '6.9.a', 6, 'Prevalensi TB (insidens per 100.000 penduduk)  *', 'Prevalensi TBC (PTBC) adalah banyaknya kasus TBC per 100.000 penduduk.  Kasus TBC didefinisikan sebagai pasien yang secara klinis telah positif terdiagnosis mengidapTBC.', 'Mendeteksi dan mengobati TBC merupakan kunci intervensi untuk mengurangi kemiskinan dan ketimpangan pendapatan. Prevalensi  karena TBC merupakan indikator yang lebih sensitif dibanding dengan kasus baru.', 'SKPD Kesehatan, Data Kecamatan', 0, 0),
(69, '6.9.b', 6, 'Angka kematian karena tuberkulosis', 'Angka kematian karena TBC (AKTBC) adalah banyaknya kematian karena TBC per 100.000 penduduk. Kasus TBC didefinisikan sebagai pasien yang secara klinis telah positif terdiagnosis mengidapTBC.', 'Mendeteksi dan mengobati TBC merupakan kunci intervensi untuk mengurangi kemiskinan dan ketimpangan pendapatan. Kematian karena TBC merupakan indikator yang lebih sensitif dibanding dengan kasus baru.', 'SKPD Kesehatan, Data Kecamatan', 0, 0),
(70, '6.a', 6, 'Kasus Kematian Pasien AIDs', '', '', 'SKPD Kesehatan/KPA, data kecamatan', 0, 0),
(71, '6.b', 6, 'Rasio pemakai kondom pada pasangan usia subur (PUS) usia 15-49 tahun  *', '', '', 'SKPD Kesehatan/KB, data kecamatan', 0, 0),
(72, '6.c', 6, 'Annual Parasite Incidence (API) (‰) - Jawa dan Bali', '', '', 'SKPD Kesehatan, Data Kecamatan', 0, 0),
(73, '6.d', 6, 'Annual Malaria Incidence (AMI) (‰) Luar Jawa dan Bali', '', '', 'SKPD Kesehatan, Data Kecamatan', 0, 0),
(74, '6.e.a', 6, 'Angka kesakitan penyakit kusta per 10.000 penduduk', '', '', 'SKPD Kesehatan, Data Kecamatan', 0, 0),
(75, '6.e.b', 6, 'Angka penemuan penderita kusta (NCDR) (per 100.000 penduduk)', '', '', 'SKPD Kesehatan, Data Kecamatan', 0, 0),
(76, '6.f.a', 6, 'Incidence Rate Demam Berdarah Dengue (DBD) per 100.000 penduduk', '', '', '', 0, 0),
(77, '6.f.b', 6, ' Case Fatality Rate (CFR) DBD', '', '', 'Sektor Kesehatan', 0, 0),
(78, '6.g', 6, 'Angka kesakitan filariasis', '', '', '', 0, 0),
(79, '6.h', 6, 'Case Fatality Rate (CFR) Diare saat KLB', '', '', '', 0, 0),
(80, '7.1.x', 7, 'Rasio luas lahan hasil kegiatan rehabilitasi terhadap luas area yang perlu di rehabilitasi', '', '', '', 30, 0),
(81, '7.10', 7, 'Proporsi rumah tangga kumuh perkotaan', '', '', '', 6, 0),
(82, '7.5.x', 7, 'Rasio luas kawasan lindung terhadap luas wilayah', '', '', '', 30, 0),
(83, '7.8', 7, 'Proporsi rumah tangga dengan  akses berkelanjutan terhadap air minum layak  *', 'Air minum terlindung adalah air leding, keran umum, air hujan atau mata air dan sumur tertutup yang jaraknya lebih dari 10 m dari pembuangan kotoran dan pembuangan sampan. Sumber air terlindung tidak termasuk air dari penjual keliling, airyang dijual melalui tanki, air sumur dan mata air tidak terlindung. Proporsi penduduk atau rumah tangga dengan akses terhadap sumber air minum yang terlindung adalah perbandingan antara penduduk atau rumah tangga dengan akses terhadap sumber air minum yang terlindung dengan penduduk atau rumah tangga seluruhnya, dinyatakan dalam persentase.', 'Indikator ini digunakan untuk memonitor akses terhadap sumber air berdasarkan asumsi bahwa sumber air terlindung menyediakan airyang aman untuk diminum. Air yang tidak aman diminum adalah penyebab langsung berbagai sumber penyakit.', '', 68.87, 1),
(84, '7.9', 7, 'Proporsi rumah tangga dengan akses berkelanjutan terhadap sanitasi dasar', 'Fasilitas sanitasi yang layak adalah fasilitas sanitasi yang memenuhi syarat kesehatan antara lain dllengkapl dengan leher angsa dan tankl septlk. Proporsi penduduk atau rumah tangga dengan akses terhadap fasilitas sanitasi yang layak adalah perbandingan antara penduduk atau rumah tangga yang memiliki akses terhadap fasilitas sanitasi yang layak dengan penduduk atau rumah tangga seluruhnya yang dinyatakan dalam persentase.', 'Sanitasi yang layak penting bagi pendudukatau rumah tangga di daerah urban maupun rural, meskipun risikonya lebih besardi daerah urban karena lebih sulit menghindari kontak dengan pembuangan kotoran. Indikator ini  menggambarkan  tingkat kesejahteraan  rakyat dari aspek kesehatan.', '', 62.41, 0),
(85, '7.a', 7, 'Proporsi penduduk yang menggunakan bahan bakar padat', 'Bahan bakar padat adalah kayu bakar, arang, batu bara, sekam, batang padi, tandan kelapa, tempurung kelapa, dll.', 'Indikator ini untuk mengetahui polusi dalam ruangan dan pengurangan sumber daya hutan karena pemakaian bahan bakar padat.', 'BPS PODES', 0, 0),
(86, '7.b', 7, 'Proporsi pabrik yang mempunyai pengolahan limbah', '', '', '', 100, 1),
(87, '7.c', 7, 'Proporsi luas konservasi daratan', '', '', '', 30, 0),
(88, '7.d', 7, 'Proporsi luas konservasi laut', '', '', '', 30, 0),
(89, '7.e', 7, 'Proporsi mata air di kabupaten yang digunakan sebagai sumber air minum', '', '', '', 68.87, 0),
(90, '7.f', 7, 'Ketersediaan debit air alam bagi penduduk', '', '', '', 0, 0),
(91, '7.g', 7, 'Proporsi rumah tangga di kawasan kumuh', '', '', '', 6, 0),
(92, '7.h', 7, 'Persentase rumah tangga di kawasan rawan bencana  *', '', '', '', 6, 0),
(93, '7.i', 7, 'Proporsi penduduk dengan status rumah tangga tetap dan terjamin', 'Status rumah tetap dan terjamin adalah rumah dengan status milik sendiri, sewa atau kontrak. Indikator ini dihitung dari perbandingan antara penduduk atau rumah tangga dengan akses terhadap tempat tinggal tetap dan jumlah penduduk atau rumah tangga, yang dinyatakan dalam persentase.', 'Indikator ini untuk memperoleh gambaran umum tentang kemampuan penduduk atau rumah tangga untuk memenuhi salah satu kebutuhan dasar manusia (papan).', 'BPS SUSENAS', 6, 0);

-- --------------------------------------------------------

--
-- Table structure for table `m_instansi`
--

CREATE TABLE IF NOT EXISTS `m_instansi` (
  `KodeInstansi` varchar(200) NOT NULL,
  `Instansi` varchar(250) NOT NULL,
  PRIMARY KEY (`KodeInstansi`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `m_instansi`
--

INSERT INTO `m_instansi` (`KodeInstansi`, `Instansi`) VALUES
('0', 'Administrator'),
('1', 'Sekretaris Daerah Kota Cimahi'),
('10', 'Kabag Administrasi Perekonomian Setda Kota Cimahi'),
('11', 'Sekretaris Bappeda Kota Cimahi'),
('12', 'Sekretaris BMPPKB Kota Cimahi'),
('13', 'Sekretaris Inspektorat Kota Cimahi'),
('14', 'Kepala KAPPDE Kota Cimahi'),
('15', 'Kepala BPS Kota Cimahi'),
('16', 'Kabid Ekonomi Bappeda Kota Cimahi'),
('17', 'Kabid Fisik Bappeda Kota Cimahi'),
('18', 'Kabid Sosial dan Budaya Bappeda Kota Cimahi'),
('19', 'Kabid Pemberdayaan Masyarakat BPMPPKB Kota Cimahi'),
('2', 'Asisten Perekonomian dan Pembangunan Setda Kota Cimahi'),
('20', 'Kasubid Sosial dan Budaya Bappeda Kota Cimahi'),
('21', 'Kasubid Program Bappeda Kota Cimahi'),
('22', 'Kasubid Pemerintahan Bappeda Kota Cimahi'),
('23', 'Kasubid Tata Ruang Bappeda Kota Cimahi'),
('24', 'Kasubid Indagpar Bappeda Kota Cimahi'),
('25', 'Kasubid Kopkumtan Bappeda Kota Cimahi'),
('3', 'Asisten Pemerintahan Setda Kota Cimahi'),
('4', 'Asisten Administrasi Umum Setda Kota Cimahi'),
('5', 'Kepala Bappeda Kota Cimahi'),
('6', 'Kepala BMPPKB Kota Cimahi'),
('7', 'Kepala Disnakertransos Kota Cimahi'),
('8', 'Kepala Dinas PU Kota Cimahi'),
('9', 'Kepala Dinas Kopindagtan Kota Cimahi');

-- --------------------------------------------------------

--
-- Table structure for table `m_kabupaten`
--

CREATE TABLE IF NOT EXISTS `m_kabupaten` (
  `kode_kabupaten` int(15) NOT NULL,
  `nama_kabupaten` varchar(250) NOT NULL,
  PRIMARY KEY (`kode_kabupaten`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `m_kecamatan`
--

CREATE TABLE IF NOT EXISTS `m_kecamatan` (
  `kode_kecamatan` int(15) NOT NULL,
  `nama_kecamatan` varchar(30) NOT NULL,
  PRIMARY KEY (`kode_kecamatan`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `m_kecamatan`
--

INSERT INTO `m_kecamatan` (`kode_kecamatan`, `nama_kecamatan`) VALUES
(327701, 'CIMAHI SELATAN'),
(327702, 'CIMAHI TENGAH'),
(327703, 'CIMAHI UTARA');

-- --------------------------------------------------------

--
-- Table structure for table `m_kelurahan`
--

CREATE TABLE IF NOT EXISTS `m_kelurahan` (
  `kode_kelurahan` int(15) NOT NULL,
  `kode_kecamatan` int(15) NOT NULL,
  `Kelurahan` varchar(50) NOT NULL,
  PRIMARY KEY (`kode_kelurahan`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `m_kelurahan`
--

INSERT INTO `m_kelurahan` (`kode_kelurahan`, `kode_kecamatan`, `Kelurahan`) VALUES
(32770101, 327701, 'CIBEBER'),
(32770102, 327701, 'CIBEUREUM'),
(32770103, 327701, 'LEUWIGAJAH'),
(32770104, 327701, 'MELONG'),
(32770105, 327701, 'UTAMA'),
(32770201, 327702, 'BAROS'),
(32770202, 327702, 'CIGUGUR TENGAH'),
(32770203, 327702, 'CIMAHI'),
(32770204, 327702, 'KARANG MEKAR'),
(32770205, 327702, 'PADASUKA'),
(32770206, 327702, 'SETIAMANAH'),
(32770301, 327703, 'CIBABAT'),
(32770302, 327703, 'CIPAGERAN'),
(32770303, 327703, 'CITEUREUP'),
(32770304, 327703, 'PASIRKALIKI');

-- --------------------------------------------------------

--
-- Table structure for table `m_komponen`
--

CREATE TABLE IF NOT EXISTS `m_komponen` (
  `KodeKomponen` varchar(1) NOT NULL DEFAULT '',
  `Komponen` varchar(50) DEFAULT NULL,
  `Urut` varchar(50) DEFAULT NULL,
  PRIMARY KEY (`KodeKomponen`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `m_komponen`
--

INSERT INTO `m_komponen` (`KodeKomponen`, `Komponen`, `Urut`) VALUES
('L', 'Infrastruktur', '1'),
('S', 'Sosial', '2'),
('E', 'Ekonomi ', '9');

-- --------------------------------------------------------

--
-- Table structure for table `m_komponen_sub`
--

CREATE TABLE IF NOT EXISTS `m_komponen_sub` (
  `KodeSubKomponen` varchar(4) NOT NULL DEFAULT '',
  `SubKomponen` varchar(29) DEFAULT NULL,
  `KodeKomponen` varchar(50) DEFAULT NULL,
  PRIMARY KEY (`KodeSubKomponen`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `m_komponen_sub`
--

INSERT INTO `m_komponen_sub` (`KodeSubKomponen`, `SubKomponen`, `KodeKomponen`) VALUES
('E-02', 'Home Industry', 'E'),
('E-04', 'Human Resources Development', 'E'),
('E-99', 'Lain-Lain', 'E'),
('L-01', 'Road', 'L'),
('L-02', 'Drainage', 'L'),
('L-03', 'Bridge', 'L'),
('L-04', 'Housing', 'L'),
('L-05', 'Public Toilets', 'L'),
('L-06', 'Waste Disposal', 'L'),
('L-07', 'Water Supply', 'L'),
('L-08', 'Public Lightning', 'L'),
('L-09', 'Building School', 'L'),
('L-10', 'Irigasi', 'L'),
('L-11', 'Healthcare Facility', 'L'),
('L-12', 'Retail Trading Facility', 'L'),
('L-13', 'Waste Water Canal', 'L'),
('L-14', 'Tambatan Perahu', 'L'),
('L-99', 'Other In Infrastructure', 'L'),
('S-01', 'Santunan Sosial/Hibah', 'S'),
('S-02', 'Peningkatan SDM', 'S'),
('S-03', 'Scholarship', 'S'),
('S-04', 'Health', 'S'),
('S-99', 'Other in Social', 'S');

-- --------------------------------------------------------

--
-- Table structure for table `m_komponen_sub_detail`
--

CREATE TABLE IF NOT EXISTS `m_komponen_sub_detail` (
  `KodeDetailSubKomponen` varchar(5) NOT NULL DEFAULT '',
  `SubKomponenDetail` tinytext,
  `Satuan` varchar(50) DEFAULT NULL,
  `KodeSubKomponen` varchar(50) DEFAULT NULL,
  `TotalQuality` double DEFAULT NULL,
  `IDRTotalCost` double DEFAULT NULL,
  `USDTotalCost` double DEFAULT NULL,
  `IDBUSDShare` double DEFAULT NULL,
  PRIMARY KEY (`KodeDetailSubKomponen`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `m_komponen_sub_detail`
--

INSERT INTO `m_komponen_sub_detail` (`KodeDetailSubKomponen`, `SubKomponenDetail`, `Satuan`, `KodeSubKomponen`, `TotalQuality`, `IDRTotalCost`, `USDTotalCost`, `IDBUSDShare`) VALUES
('E-011', 'Retail Trading', 'person', 'E-02', 55364, 99999990, 2330910, 9000),
('L-012', 'Concrete Road', 'meter', 'L-01', 1367318, 98683804560, 8971255, 6237775),
('L-014', 'Macadam Road', 'meter', 'L-01', 15369, 737690300, 67063, 47125),
('L-015', 'Telford Road', 'meter', 'L-01', 74321, 2714754900, 246796, 181263),
('L-016', 'Retaining Wall', 'meter', 'L-01', 65507, 7459092835, 678099, 511474),
('L-021', 'Drainage', 'meter', 'L-02', 642319, 36763542208, 3342140, 2383721),
('L-031', 'Wood Bridge', 'meter', 'L-03', 2556, 392354000, 35669, 24055),
('L-032', 'Iron Bridge', 'meter', 'L-03', 2675, 1407315500, 127938, 81050),
('L-033', 'Concrete Bridge', 'meter', 'L-03', 14499, 7528937018, 684449, 473763),
('L-034', 'Road Drains', 'meter', 'L-03', 25119, 7888795521, 717163, 475245),
('L-041', 'Housing', 'unit', 'L-04', 11810, 49844427591, 4531312, 2930908),
('L-051', 'Public Toilets', 'unit', 'L-05', 22298, 31222525479, 2838411, 1944948),
('L-052', 'Toilet', 'unit', 'L-05', 497, 1152010750, 104728, 67080),
('L-061', 'Waste Disposal', 'unit', 'L-06', 19732, 9120183900, 829108, 521173),
('L-071', 'Dug Well', 'unit', 'L-07', 698, 1661323950, 151029, 95726),
('L-072', 'Hand Pump', 'unit', 'L-07', 2793, 3706486600, 336953, 199104),
('L-073', 'Rain Collector', 'unit', 'L-07', 330, 876345100, 79668, 48618),
('L-074', 'Public Hydrant', 'unit', 'L-07', 6106, 4459408400, 405401, 278493),
('L-075', 'Water Pipeline', 'meter', 'L-07', 207419, 10189534850, 926321, 723440),
('L-076', 'Bone Capthing', 'unit', 'L-07', 1274, 585955100, 53269, 38097),
('L-077', 'Surface Water Collector', 'unit', 'L-07', 91, 554717200, 50429, 37274),
('L-081', 'Public Lighting', 'unit', 'L-08', 6825, 3660615100, 332783, 239371),
('L-091', 'Education Facilities', 'unit\r\nunit', 'L-09', 3294, 6991046300, 635550, 453112),
('L-101', 'Saluran Irigasi', 'meter', 'L-10', NULL, NULL, NULL, NULL),
('L-102', 'Waduk/Embung', 'unit', 'L-10', NULL, NULL, NULL, NULL),
('L-111', 'Healthcare Facilities', 'unit', 'L-11', 111942, 16870368050, 1533670, 1070039),
('L-121', 'Kiosk', 'unit', 'L-12', 473, 890250000, 80932, 40046),
('L-131', 'Waste Water Canal', 'meter', 'L-13', 99703, 6257660960, 568878, 382987),
('L-141', 'Tambatan Perahu', 'unit/meter', 'L-14', NULL, NULL, NULL, NULL),
('L-991', 'Other In Infrastructure', 'meter', 'S-99', 5205, 214000000, 19455, 12645),
('S-011', 'Pemberian Uang Tunai', 'orang', 'S-01', NULL, NULL, NULL, NULL),
('S-012', 'Bazar', 'person', 'S-01', 55342, 2234018200, 203093, NULL),
('S-021', 'Agriculture Training', 'person', 'S-02', 23404, 3175617500, 288693, NULL),
('S-022', 'Husbandry Training', 'person', 'S-02', 4732, 589036400, 53549, NULL),
('S-023', 'Vocational Training', 'person', 'S-02', 97355, 15034730464, 1366794, NULL),
('S-024', 'Pelatihan bidang Pendidikan', 'orang', 'S-02', NULL, NULL, NULL, NULL),
('S-025', 'Pelatihan bidang Kesehatan', 'orang', 'S-02', NULL, NULL, NULL, NULL),
('S-026', 'Pelatihan bidang Keselamatan', 'orang', 'S-02', NULL, NULL, NULL, NULL),
('S-027', 'Pelatihan Ketrampilan', 'orang', 'S-02', NULL, NULL, NULL, NULL),
('S-031', 'Scholarship', 'person', 'S-03', 64789, 13443684275, 1222153, NULL),
('S-041', 'Imunization', 'person', 'S-04', 78972, 4096457750, 372405, NULL),
('S-042', 'Mother and Child Health', 'person', 'S-04', 67152, 3614607600, 328601, NULL),
('S-043', 'Nutrition', 'person', 'S-04', 83262, 7368802500, 669891, NULL),
('S-991', 'Other in Social', 'person', 'S-99', 293, 44500000, 4045, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `m_kota`
--

CREATE TABLE IF NOT EXISTS `m_kota` (
  `kode_kota` int(100) NOT NULL,
  `kota` varchar(200) NOT NULL,
  PRIMARY KEY (`kode_kota`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `m_kota`
--

INSERT INTO `m_kota` (`kode_kota`, `kota`) VALUES
(3277, 'KOTA CIMAHI');

-- --------------------------------------------------------

--
-- Table structure for table `m_provinsi`
--

CREATE TABLE IF NOT EXISTS `m_provinsi` (
  `kode_provinsi` int(100) NOT NULL,
  `provinsi` varchar(200) NOT NULL,
  PRIMARY KEY (`kode_provinsi`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `m_provinsi`
--

INSERT INTO `m_provinsi` (`kode_provinsi`, `provinsi`) VALUES
(32, 'JAWA BARAT ');

-- --------------------------------------------------------

--
-- Table structure for table `pendaftaran`
--

CREATE TABLE IF NOT EXISTS `pendaftaran` (
  `IdPendaftaran` int(11) NOT NULL AUTO_INCREMENT,
  `NIK` varchar(30) NOT NULL,
  `NamaLengkap` varchar(200) NOT NULL,
  `Alamat` varchar(300) NOT NULL,
  `Status` varchar(30) NOT NULL,
  `Kelurahan` varchar(200) NOT NULL,
  `KodeKegiatan` varchar(25) NOT NULL,
  `Ket` varchar(300) NOT NULL,
  PRIMARY KEY (`IdPendaftaran`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=52 ;

--
-- Dumping data for table `pendaftaran`
--

INSERT INTO `pendaftaran` (`IdPendaftaran`, `NIK`, `NamaLengkap`, `Alamat`, `Status`, `Kelurahan`, `KodeKegiatan`, `Ket`) VALUES
(18, '3277000202020012', 'RIZA FAIZO RAJA,AM', 'CIBEBER', 'Menikah', 'CIBEBER', 'L-0612013112650', 'A,A,A'),
(19, '3277000202020012', 'TES', 'CIBEBER aja', 'Menikah', 'CIBEBER', 'E-0112013112742', '-'),
(20, '0909909', 'ratih AJAJAJA', 'Jalan jalan', 'Mahasiswa', 'CIBEBER', 'L-0612013112650', 'belum selesai'),
(22, '3277000202020001', 'MUHAMMAD MAESA M JELIWANG', 'JL WARUNG CONTONG', 'Belum Menikah', 'SETIAMANAH', 'E-0112013112704', '-'),
(23, '3277000611760001 ', 'NOVIK HOTMAN ', 'JL. WARUNG CONTONG TIMUR NO. 1', 'BELUM KAWIN', 'SETIAMANAH ', 'E-0112013112704', '-'),
(24, '3277010101000001 ', 'H E R U ', 'KP HUJUNG KULON ', 'BELUM KAWIN', 'UTAMA ', 'E-0112013112704', '-'),
(25, '3277010101000003', 'SYAUQI IQBAL FARABI SP ', 'KP HUJUNG KIDUL ', 'BELUM KAWIN', 'UTAMA', 'E-0112013112704', '-'),
(26, '3277010101000002', 'FAHRIZAL MUHAMAD RIZKI', 'KIHAPIT TIMUR', 'BELUM KAWIN', 'LEUWIGAJAH', 'E-0112013112704', '-'),
(28, '0909909', 'ratih', 'cibeber aja', 'Belum Menikah', 'Cibeber', 'E-0112013112742', '-'),
(29, '3277010101000042', 'REZA MELDIAN', 'JL KEBON KOPI NO188', 'BELUM KAWIN', 'CIBEUREUM', 'E-0112013112742', '-'),
(30, '3277000202020001', 'MUHAMMAD MAESA M JELIWANG', 'JL WARUNG CONTONG', 'KAWIN', 'SETIAMANAH', 'S-0242014010806', '-'),
(31, '3277000611760001', 'NOVIK HOTMAN', 'JL. WARUNG CONTONG TIMUR NO. 1', 'BELUM KAWIN', 'SETIAMANAH', 'S-0242014010806', '-'),
(32, '3277000812740001', 'ARIFIN', 'JL. WARUNG CONTONG TIMUR NO. 1', 'BELUM KAWIN', 'SETIAMANAH', 'S-0242014010806', '-'),
(34, '3277000202020001', 'MUHAMMAD MAESA M JELIWANG', 'JL WARUNG CONTONG', '-', 'SETIAMANAH', 'E-0112014010819', '-'),
(35, '3277000812740001', 'ARIFIN', 'JL. WARUNG CONTONG TIMUR NO. 1', 'BELUM KAWIN', 'SETIAMANAH', 'E-0112014010819', '-'),
(38, '3277002006070001', 'YEHEZKIEL ARDIAN PANJAITAN', 'CIBEBER', 'BELUM KAWIN', 'CIBEBER', 'L-0412014010833', '-'),
(39, '3277010101000042', 'REZA MELDIAN', 'JL KEBON KOPI NO188', 'BELUM KAWIN', 'CIBEUREUM', 'E-0112014010853', '-'),
(41, '3277000202020001', 'MUHAMMAD MAESA M JELIWANG', 'JL WARUNG CONTONG', '-', 'SETIAMANAH', 'L-0212014011433', '-'),
(42, '3277000812740001', 'ARIFIN', 'JL. WARUNG CONTONG TIMUR NO. 1', 'BELUM KAWIN', 'SETIAMANAH', 'L-0212014011433', '-'),
(44, '0909909', 'ratih', 'tes', 'Belum Menikah', 'Cibeber', 'L-0122014011523', '-'),
(45, '009090909', 'iwan', 'cimahi', 'kawin', 'cibeber', 'L-0122014011523', 'ketua rt.10'),
(46, '0909909', 'ratih', 'tes', 'Belum Menikah', 'Cibeber', 'L-0412014010833', '-'),
(47, '3277000611760001', 'NOVIK HOTMAN', 'JL. WARUNG CONTONG TIMUR NO. 1', 'BELUM KAWIN', 'SETIAMANAH', 'E-0112014010819', 'Bantuan'),
(48, '123', 'Ratih', 'Cimahi', '-', '-', 'E-0112014010819', '-'),
(49, '3277000202020001', 'MUHAMMAD MAESA M JELIWANG', 'JL WARUNG CONTONG', '-', 'SETIAMANAH', 'L-0412014091734', 'tes'),
(50, '0909909', 'ratih', 'tes', 'Belum Menikah', 'Cibeber', 'L-0412014091734', '-'),
(51, '3277000611760001', 'NOVIK HOTMAN', 'JL. WARUNG CONTONG TIMUR NO. 1', 'BELUM KAWIN', 'SETIAMANAH', 'L-0412014091734', '-');

-- --------------------------------------------------------

--
-- Table structure for table `pengguna`
--

CREATE TABLE IF NOT EXISTS `pengguna` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `pengguna` varchar(100) NOT NULL,
  `password` varchar(30) NOT NULL,
  `KodeInstansi` varchar(200) NOT NULL,
  `level` varchar(30) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=11 ;

--
-- Dumping data for table `pengguna`
--

INSERT INTO `pengguna` (`id`, `pengguna`, `password`, `KodeInstansi`, `level`) VALUES
(1, 'admin', '123', '0', 'Admin'),
(4, 'KSBB', 'sosial1234', '18', 'Pengunjung'),
(6, 'KEB', 'ekonomi1234', '16', 'Pengunjung'),
(10, 'KabidPU', '1234', '8', 'Pengunjung');

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
