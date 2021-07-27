-- phpMyAdmin SQL Dump
-- version 4.5.1
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: Dec 23, 2019 at 01:10 PM
-- Server version: 10.1.19-MariaDB
-- PHP Version: 7.0.13

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `lpdkunew`
--

-- --------------------------------------------------------

--
-- Table structure for table `admin`
--

CREATE TABLE `admin` (
  `id_admin` int(2) NOT NULL,
  `nama_admin` varchar(50) NOT NULL,
  `jk_admin` varchar(40) NOT NULL,
  `telp_admin` varchar(15) NOT NULL,
  `email_admin` varchar(40) NOT NULL,
  `foto_admin` varchar(40) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `admin`
--

INSERT INTO `admin` (`id_admin`, `nama_admin`, `jk_admin`, `telp_admin`, `email_admin`, `foto_admin`) VALUES
(1, 'Gevin Janitto Pradana Putraa', 'Laki-laki', '089686380483', 'admin', '3.png');

--
-- Triggers `admin`
--
DELIMITER $$
CREATE TRIGGER `hapus_admin` AFTER DELETE ON `admin` FOR EACH ROW BEGIN
DELETE FROM berita WHERE id_admin = old.id_admin;
DELETE FROM foto WHERE id_admin = old.id_admin;
END
$$
DELIMITER ;

-- --------------------------------------------------------

--
-- Table structure for table `berita`
--

CREATE TABLE `berita` (
  `id_berita` int(11) NOT NULL,
  `isi_berita` varchar(10000) NOT NULL,
  `judul_berita` varchar(50) NOT NULL,
  `tgl_berita` date NOT NULL,
  `id_admin` varchar(2) NOT NULL,
  `id_foto` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `berita`
--

INSERT INTO `berita` (`id_berita`, `isi_berita`, `judul_berita`, `tgl_berita`, `id_admin`, `id_foto`) VALUES
(1, '  Dalam rangka ulang tahun LPD kesiman yang ke 57 maka LPD Kesiman mengadakan acara perayaan yang digelar di kantor LPD Kesiman. Dalam kegiatan desa Binaan di Desa Pinggan Lembaga Pengabdian kepada Masyarakat membina LPD (Lembaga Perkreditan Desa) yang ada di Desa Adat Pinggan. Mitra 1 dalam pogram ini adalah Pengurus LPD Desa Pinggan dan Mitra 2 adalah Pengawas LPD. Persoalan LPD di desa Pinggan ditemukan bahwa Pengurus LPD belum mampu membuat perjanjian sesuai dengan peraturan perundang-undangan', 'ULANG TAHUN LPD KESIMAN KE 57', '2019-12-23', '1', 2),
(2, 'LPD Kesiman mengadakan kegiatan kerja bakti dalam rangka memperingati ulang tahunnya yang ke 57. LPD Kesiman mengundang nasabah setiaKedudukan LPD setelah masuk dalam ranah Perda akan lebih kuat, karena berada dibawah hukum adat. Penegasan ini disampaikan Gubernur Bali Wayan Koster dihadapan Ketua LP LPD se Bali dan BKS LPD Provinsi Bali, saat menggelar ramah tamah di Rumah Jabatan Gubernur Bali, Jayasabha, Senin (15/4) sore. Dengan ditetapkannya Ranperda Desa Adat menjadi Perda, ke depan desa adat di Bali berhak menyusun awig-awignya sendiri dan sah dimata hukum, termasuk menyusun awig-awig pengembangan LPD. Perda akan memperkuat hukum adat, dan LPD yang berada dibawah hukum adat pun akan lebih kuat. Inilah cara kita memproteksi lembaga ekonomi yang ada di desa adat, untuk mempkuat kedudukan LPD sendiri, tegas Koster yang juga selaku Ketua DPD PDI Perjuangan Bali ini. Perubahan nama LPD pun menurut Koster sejatinya sebagai pembentukan jati diri LPD sebagai lembaga ekonomi adat yang berkarakter lokal, karena seperti diketahui selama ini LPD dikelola layaknya perbankan. LPD saat ini masih menggunakan nomenklatur perbankan, dengan diatur Perda maka desa adat bisa mensinergikan programnya sehingga bisa berkembang secara bersama-sama, urainya.', 'KEGIATAN KERJA BAKTI', '2019-12-23', '1', 3),
(3, 'Dalam rangka Ulang tahunnya LPD Kesiman membuat promo cicilan 0%. Promo ini berlaku dari tanggal 18 Oktober 2019 sampai 31 Desember 2019.Gianyar (Bisnis Bali) Persaingan Lembaga Perkreditan Desa (LPD) dengan lembaga keuangan mikro seperti koperasi dan lainnya sudah makin ketat. Apalagi saat ini sektor perbankan masuk desa sehingga mendorong LPD menawarkan suku bunga yang makin bersaing. Ketua BKS LPD Provinsi Bali, Nyoman Cendikiawan, Senin (25/6) mengatakan, perbankan sudah menurunkan suku bunga dana pihak ketiga (DPK). Strategi ini diambil perbankan untuk menurunkan suku bunga kredit guna mengoptimalkan fungsi intermediasi. Ia menjelaskan, tidak hanya lembaga perbankan lembaga keuangan mikro juga menurun suku bunga. LPD tentunya juga menerapkan suku bunga yang fleksibel. Dipaparkannya, LPD juga selalu suku bunga dana pihak ketiga (DPK) dengan perkembangan sektor perbankan. Hal ini diharapkan suku bunga kredit dari LPD tetap memiliki daya saing. (kup). LPD Desa Adat Pangsan merupakan salah satu LPD yang berada di wilayah Kecamatan Petang Kabupaten Badung. berdiri tahun 1991. Desa Adat Pangsan melingkupi tiga Banjar dengan jumlah penduduk sebanyak 2.550 jiwa dari 771 kepala keluarga (KK). Dari hasil obsersasi yang telah dilakukan melalui wawancara langsung dengan Pengurus LPD, ternyata LPD Desa Adat Pangsan mengalami pasang surut sebagaimana banyak dialami LPD, terutana yang berada di wilayah Kecamatan Petang.', 'PROMO CICILAN 0 %', '2019-12-23', '1', 5);

-- --------------------------------------------------------

--
-- Table structure for table `deposito`
--

CREATE TABLE `deposito` (
  `id_deposit` int(11) NOT NULL,
  `nomor_saldo` int(11) NOT NULL,
  `waktu_deposito` datetime DEFAULT NULL,
  `jumlah_deposito` int(9) NOT NULL,
  `id_jdeposit` varchar(1) NOT NULL,
  `waktu_penarikan` datetime NOT NULL,
  `status_deposito` varchar(15) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `deposito`
--

INSERT INTO `deposito` (`id_deposit`, `nomor_saldo`, `waktu_deposito`, `jumlah_deposito`, `id_jdeposit`, `waktu_penarikan`, `status_deposito`) VALUES
(1, 1, '2019-12-23 06:38:43', 5000000, '1', '2020-01-23 06:38:43', 'Aktif'),
(2, 2, '2019-12-23 09:36:49', 5000000, '3', '2020-06-23 09:36:49', 'Aktif');

--
-- Triggers `deposito`
--
DELIMITER $$
CREATE TRIGGER `tambah_deposito` AFTER INSERT ON `deposito` FOR EACH ROW UPDATE saldo SET saldo.total_saldo = saldo.total_saldo - new.jumlah_deposito WHERE new.nomor_saldo = saldo.nomor_saldo
$$
DELIMITER ;

-- --------------------------------------------------------

--
-- Table structure for table `foto`
--

CREATE TABLE `foto` (
  `id_foto` int(11) NOT NULL,
  `foto` varchar(40) NOT NULL,
  `id_admin` varchar(2) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `foto`
--

INSERT INTO `foto` (`id_foto`, `foto`, `id_admin`) VALUES
(1, 'model-2.JPG', '1'),
(2, '1.png', '1'),
(3, '2.png', '1'),
(4, 'model-1.JPG', '1'),
(5, 'model-3.jpg', '1'),
(6, 'model-4.JPG', '1'),
(7, 'model-5.jpg', '1'),
(8, 'model-6.jpg', '1'),
(9, 'model-7.jpg', '1'),
(10, 'model-8.jpg', '1'),
(11, 'model-9.jpg', ''),
(12, 'model-10.jpg', ''),
(13, 'model-11.jpg', ''),
(14, 'model-12.jpg', ''),
(15, 'about.jpg', '1');

--
-- Triggers `foto`
--
DELIMITER $$
CREATE TRIGGER `hapus_foto` AFTER DELETE ON `foto` FOR EACH ROW DELETE FROM berita WHERE id_foto = old.id_foto
$$
DELIMITER ;

-- --------------------------------------------------------

--
-- Table structure for table `jenis_deposito`
--

CREATE TABLE `jenis_deposito` (
  `id_jdeposit` int(1) NOT NULL,
  `nama_deposito` varchar(40) NOT NULL,
  `jumlah_bulan` int(2) NOT NULL,
  `persen_deposito` float NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `jenis_deposito`
--

INSERT INTO `jenis_deposito` (`id_jdeposit`, `nama_deposito`, `jumlah_bulan`, `persen_deposito`) VALUES
(1, 'Depostio Rendah', 3, 0.3),
(2, 'Depostio Menengah', 6, 0.6),
(3, 'Depostio Tinggi', 12, 1);

-- --------------------------------------------------------

--
-- Table structure for table `jenis_pembayaran`
--

CREATE TABLE `jenis_pembayaran` (
  `id_jenis` varchar(5) NOT NULL,
  `keterangan` varchar(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `jenis_pembayaran`
--

INSERT INTO `jenis_pembayaran` (`id_jenis`, `keterangan`) VALUES
('1', 'Pulsa'),
('2', 'Listrik'),
('3', 'transfer');

-- --------------------------------------------------------

--
-- Table structure for table `jenis_provider`
--

CREATE TABLE `jenis_provider` (
  `id_provider` varchar(5) NOT NULL,
  `nama_provider` varchar(25) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `jenis_provider`
--

INSERT INTO `jenis_provider` (`id_provider`, `nama_provider`) VALUES
('1', 'Telkomsel'),
('2', 'Indosat'),
('3', 'XL'),
('4', '3'),
('5', 'Smartfren');

-- --------------------------------------------------------

--
-- Table structure for table `jenis_role`
--

CREATE TABLE `jenis_role` (
  `id_role` int(11) NOT NULL,
  `nama_role` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `jenis_role`
--

INSERT INTO `jenis_role` (`id_role`, `nama_role`) VALUES
(1, 'admin'),
(2, 'nasabah');

-- --------------------------------------------------------

--
-- Table structure for table `nasabah`
--

CREATE TABLE `nasabah` (
  `id_nsb` int(8) NOT NULL,
  `nama_nsb` varchar(50) DEFAULT NULL,
  `email_nsb` varchar(40) NOT NULL,
  `telp_nsb` varchar(15) NOT NULL,
  `pekerjaan_nsb` varchar(30) NOT NULL,
  `alamat_nsb` varchar(50) NOT NULL,
  `kabkot_nsb` varchar(30) NOT NULL,
  `jk_nsb` varchar(20) NOT NULL,
  `tgllahir_nsb` date NOT NULL,
  `tmplahir_nsb` varchar(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `nasabah`
--

INSERT INTO `nasabah` (`id_nsb`, `nama_nsb`, `email_nsb`, `telp_nsb`, `pekerjaan_nsb`, `alamat_nsb`, `kabkot_nsb`, `jk_nsb`, `tgllahir_nsb`, `tmplahir_nsb`) VALUES
(1, 'Gevin Janitto Pradana Putra', 'gevinjanitto@gmail.com', '089686380483', 'bos', 'jl kusuma dewa no 7', 'Buleleng', 'Laki-laki', '2019-12-11', 'bandung'),
(2, 'jarwok', 'jarwok@gmail.com', '089686380483', '', '', '', '', '0000-00-00', '');

--
-- Triggers `nasabah`
--
DELIMITER $$
CREATE TRIGGER `hapus user` AFTER DELETE ON `nasabah` FOR EACH ROW BEGIN
DELETE FROM saldo WHERE id_nsb = old.id_nsb;
END
$$
DELIMITER ;
DELIMITER $$
CREATE TRIGGER `tambah_saldo` AFTER INSERT ON `nasabah` FOR EACH ROW INSERT INTO saldo(total_saldo,id_nsb) VALUES('0',new.id_nsb)
$$
DELIMITER ;

-- --------------------------------------------------------

--
-- Table structure for table `pembayaran`
--

CREATE TABLE `pembayaran` (
  `id_pembayaran` int(11) NOT NULL,
  `nomor_saldo` int(11) DEFAULT NULL,
  `id_jenis` int(11) NOT NULL,
  `waktu_pembayaran` datetime NOT NULL,
  `jumlah_pembayaran` varchar(15) NOT NULL,
  `diskon_pembayaran` int(9) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `pembayaran`
--

INSERT INTO `pembayaran` (`id_pembayaran`, `nomor_saldo`, `id_jenis`, `waktu_pembayaran`, `jumlah_pembayaran`, `diskon_pembayaran`) VALUES
(1, 1, 3, '2019-12-23 16:33:56', '10000', 0);

--
-- Triggers `pembayaran`
--
DELIMITER $$
CREATE TRIGGER `hapus_pembayaran` AFTER DELETE ON `pembayaran` FOR EACH ROW BEGIN
DELETE FROM pembayaran_pulsa_detail WHERE id_pembayaran = old.id_pembayaran;
DELETE FROM pembayaran_transfer_detail WHERE id_pembayaran = old.id_pembayaran;
DELETE FROM pembayaran_listrik_detail WHERE id_pembayaran = old.id_pembayaran;
UPDATE saldo SET saldo.total_saldo = saldo.total_saldo + (old.jumlah_pembayaran-old.diskon_pembayaran) WHERE old.nomor_saldo = saldo.nomor_saldo;
END
$$
DELIMITER ;
DELIMITER $$
CREATE TRIGGER `potong_saldo` AFTER INSERT ON `pembayaran` FOR EACH ROW UPDATE saldo SET saldo.total_saldo = saldo.total_saldo - (new.jumlah_pembayaran - new.diskon_pembayaran) WHERE new.nomor_saldo = saldo.nomor_saldo
$$
DELIMITER ;

-- --------------------------------------------------------

--
-- Table structure for table `pembayaran_listrik_detail`
--

CREATE TABLE `pembayaran_listrik_detail` (
  `id_PListrik` int(11) NOT NULL,
  `id_pembayaran` int(11) NOT NULL,
  `no_meteran` int(25) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `pembayaran_pulsa_detail`
--

CREATE TABLE `pembayaran_pulsa_detail` (
  `id_PPulsa` int(11) NOT NULL,
  `id_pembayaran` int(11) NOT NULL,
  `id_provider` varchar(25) NOT NULL,
  `no_telepon` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `pembayaran_transfer_detail`
--

CREATE TABLE `pembayaran_transfer_detail` (
  `id_PTransfer` int(11) NOT NULL,
  `id_pembayaran` int(11) NOT NULL,
  `id_penerima` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `pembayaran_transfer_detail`
--

INSERT INTO `pembayaran_transfer_detail` (`id_PTransfer`, `id_pembayaran`, `id_penerima`) VALUES
(1, 1, 2);

-- --------------------------------------------------------

--
-- Table structure for table `saldo`
--

CREATE TABLE `saldo` (
  `nomor_saldo` int(11) NOT NULL,
  `id_nsb` varchar(8) NOT NULL,
  `NoKTP` varchar(25) NOT NULL,
  `FotoKTP` varchar(50) NOT NULL,
  `total_saldo` int(9) NOT NULL,
  `pin_saldo` varchar(15) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `saldo`
--

INSERT INTO `saldo` (`nomor_saldo`, `id_nsb`, `NoKTP`, `FotoKTP`, `total_saldo`, `pin_saldo`) VALUES
(1, '1', '5615615615', 'bg-1.jpg', 4990000, '223532'),
(2, '2', '2', '1.png', 5000000, '123456');

--
-- Triggers `saldo`
--
DELIMITER $$
CREATE TRIGGER `hapus_saldo` AFTER DELETE ON `saldo` FOR EACH ROW BEGIN
DELETE FROM deposito WHERE nomor_saldo = old.nomor_saldo;
DELETE FROM pembayaran WHERE nomor_saldo = old.nomor_saldo;
END
$$
DELIMITER ;

-- --------------------------------------------------------

--
-- Table structure for table `user_login`
--

CREATE TABLE `user_login` (
  `email_user` varchar(40) NOT NULL,
  `password_user` varchar(25) NOT NULL,
  `id_role` int(11) NOT NULL,
  `waktu_daftar` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `user_login`
--

INSERT INTO `user_login` (`email_user`, `password_user`, `id_role`, `waktu_daftar`) VALUES
('admin', 'admin', 1, '2019-12-23'),
('gevinjanitto@gmail.com', 'gevin345', 2, '2019-12-23'),
('jarwok@gmail.com', '123456', 2, '2019-12-23');

--
-- Triggers `user_login`
--
DELIMITER $$
CREATE TRIGGER `hapus_user` AFTER DELETE ON `user_login` FOR EACH ROW BEGIN
DELETE FROM admin WHERE email_admin = old.email_user;
DELETE FROM nasabah WHERE email_nsb = old.email_user;
END
$$
DELIMITER ;
DELIMITER $$
CREATE TRIGGER `tambah_user` AFTER INSERT ON `user_login` FOR EACH ROW BEGIN
IF (new.id_role != '1') THEN
	INSERT INTO nasabah(email_nsb) VALUES(new.email_user);
ELSE
	INSERT INTO admin(email_admin) VALUES(new.email_user);
END IF;
END
$$
DELIMITER ;

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admin`
--
ALTER TABLE `admin`
  ADD PRIMARY KEY (`id_admin`);

--
-- Indexes for table `berita`
--
ALTER TABLE `berita`
  ADD PRIMARY KEY (`id_berita`);

--
-- Indexes for table `deposito`
--
ALTER TABLE `deposito`
  ADD PRIMARY KEY (`id_deposit`);

--
-- Indexes for table `foto`
--
ALTER TABLE `foto`
  ADD PRIMARY KEY (`id_foto`);

--
-- Indexes for table `jenis_deposito`
--
ALTER TABLE `jenis_deposito`
  ADD PRIMARY KEY (`id_jdeposit`);

--
-- Indexes for table `jenis_pembayaran`
--
ALTER TABLE `jenis_pembayaran`
  ADD PRIMARY KEY (`id_jenis`);

--
-- Indexes for table `jenis_provider`
--
ALTER TABLE `jenis_provider`
  ADD PRIMARY KEY (`id_provider`);

--
-- Indexes for table `jenis_role`
--
ALTER TABLE `jenis_role`
  ADD PRIMARY KEY (`id_role`);

--
-- Indexes for table `nasabah`
--
ALTER TABLE `nasabah`
  ADD PRIMARY KEY (`id_nsb`);

--
-- Indexes for table `pembayaran`
--
ALTER TABLE `pembayaran`
  ADD PRIMARY KEY (`id_pembayaran`);

--
-- Indexes for table `pembayaran_listrik_detail`
--
ALTER TABLE `pembayaran_listrik_detail`
  ADD PRIMARY KEY (`id_PListrik`);

--
-- Indexes for table `pembayaran_pulsa_detail`
--
ALTER TABLE `pembayaran_pulsa_detail`
  ADD PRIMARY KEY (`id_PPulsa`);

--
-- Indexes for table `pembayaran_transfer_detail`
--
ALTER TABLE `pembayaran_transfer_detail`
  ADD PRIMARY KEY (`id_PTransfer`);

--
-- Indexes for table `saldo`
--
ALTER TABLE `saldo`
  ADD PRIMARY KEY (`nomor_saldo`);

--
-- Indexes for table `user_login`
--
ALTER TABLE `user_login`
  ADD PRIMARY KEY (`email_user`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `admin`
--
ALTER TABLE `admin`
  MODIFY `id_admin` int(2) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT for table `berita`
--
ALTER TABLE `berita`
  MODIFY `id_berita` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
--
-- AUTO_INCREMENT for table `deposito`
--
ALTER TABLE `deposito`
  MODIFY `id_deposit` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
--
-- AUTO_INCREMENT for table `foto`
--
ALTER TABLE `foto`
  MODIFY `id_foto` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;
--
-- AUTO_INCREMENT for table `jenis_deposito`
--
ALTER TABLE `jenis_deposito`
  MODIFY `id_jdeposit` int(1) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
--
-- AUTO_INCREMENT for table `nasabah`
--
ALTER TABLE `nasabah`
  MODIFY `id_nsb` int(8) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
--
-- AUTO_INCREMENT for table `pembayaran`
--
ALTER TABLE `pembayaran`
  MODIFY `id_pembayaran` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT for table `pembayaran_listrik_detail`
--
ALTER TABLE `pembayaran_listrik_detail`
  MODIFY `id_PListrik` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `pembayaran_pulsa_detail`
--
ALTER TABLE `pembayaran_pulsa_detail`
  MODIFY `id_PPulsa` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `pembayaran_transfer_detail`
--
ALTER TABLE `pembayaran_transfer_detail`
  MODIFY `id_PTransfer` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT for table `saldo`
--
ALTER TABLE `saldo`
  MODIFY `nomor_saldo` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
