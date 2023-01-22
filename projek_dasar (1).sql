-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jan 22, 2023 at 08:11 AM
-- Server version: 10.4.24-MariaDB
-- PHP Version: 8.1.6

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `projek_dasar`
--

-- --------------------------------------------------------

--
-- Table structure for table `tb_about`
--

CREATE TABLE `tb_about` (
  `id_about` int(11) NOT NULL,
  `judul_about` varchar(255) NOT NULL,
  `deskripsi_about` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tb_about`
--

INSERT INTO `tb_about` (`id_about`, `judul_about`, `deskripsi_about`) VALUES
(1, 'Tentang Kampus', '<p>Kampus ini didirikan pada tahun 1998, dengan visi dan misi utama yakni menumbuhkan semangat untuk generasi penerus bangsa dalam membangun negeri agar lebih baik. Terima Kasih</p>\r\n');

-- --------------------------------------------------------

--
-- Table structure for table `tb_admin`
--

CREATE TABLE `tb_admin` (
  `id_admin` int(11) NOT NULL,
  `username` varchar(200) NOT NULL,
  `password` varchar(200) NOT NULL,
  `nama_lengkap` varchar(200) NOT NULL,
  `email` varchar(100) NOT NULL,
  `no_telp` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tb_admin`
--

INSERT INTO `tb_admin` (`id_admin`, `username`, `password`, `nama_lengkap`, `email`, `no_telp`) VALUES
(2, 'gafa akbar', '123', 'gafa akbar', 'gafa@gmail.com', '082923232');

-- --------------------------------------------------------

--
-- Table structure for table `tb_berita`
--

CREATE TABLE `tb_berita` (
  `id_berita` int(11) NOT NULL,
  `judul` varchar(255) NOT NULL,
  `slug` varchar(255) NOT NULL,
  `foto` varchar(255) NOT NULL,
  `penulis` varchar(255) NOT NULL,
  `tanggal` date NOT NULL,
  `deskripsi` varchar(1000) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tb_berita`
--

INSERT INTO `tb_berita` (`id_berita`, `judul`, `slug`, `foto`, `penulis`, `tanggal`, `deskripsi`) VALUES
(1, 'Miris Banget! Setiap 2-3 Jam Orang Meninggal Karena Kecelakaan', 'Miris-Banget!-Setiap-2-3-Jam-Orang-Meninggal-Karena-Kecelakaan', '1632715792_blog-recent-3.jpg', 'gafa', '2021-09-23', '<p>aku menjadi ini</p>\r\n'),
(3, 'jagdjasgdj', 'jagdjasgdj', '1632717204_blog-2.jpg', 'gag', '2021-09-18', 'msbdflkasflkasdgflkashdfk;ashf;kSHFD;AKSDHFAKSFHDAKSJDFHKSJDHFKJSHFJKSHDJFKHSKJFSKDJFSDJK'),
(4, 'LKUahLKUSHFD', 'LKUahLKUSHFD', '1632717228_blog-3.jpg', 'KhF', '2021-09-30', '.KLHFSDHF;KASDHF;ASDGHA;SKDHA.SKJDFHASD'),
(5, 'O8YEROIAEYR', 'O8YEROIAEYR', '1632717249_blog-1.jpg', '.JDSF', '2021-08-30', 'Z.,JFDG.DSJG;ADLFN'),
(6, '5 Orang tewas akibat bunuh diri', '5-Orang-tewas-akibat-bunuh-diri', '1632717280_blog-4.jpg', ',Kdsfhg,KSUFHLASKUFH', '2021-09-16', '.,jdvh.DSHG;ASKDGHALSIGHAS;DKGHA;SKDGHDFJKGNJNHG '),
(7, 'tERBARU', 'tERBARU', '1632717305_blog-3.jpg', '.shf', '2021-09-16', 'OIAHG8EUGA9E8YG9AP8ERY');

-- --------------------------------------------------------

--
-- Table structure for table `tb_dosen`
--

CREATE TABLE `tb_dosen` (
  `id_dosen` int(11) NOT NULL,
  `nama_dosen` varchar(255) NOT NULL,
  `nidn_dosen` varchar(255) NOT NULL,
  `jabatan` varchar(255) NOT NULL,
  `alamat` text NOT NULL,
  `foto_dosen` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tb_dosen`
--

INSERT INTO `tb_dosen` (`id_dosen`, `nama_dosen`, `nidn_dosen`, `jabatan`, `alamat`, `foto_dosen`) VALUES
(1, 'Sri Maharani, S.Kom, M.Sc, Phd.', '12245', 'Dekan ', 'Jakarta', '1632546152_team-4.jpg'),
(2, 'Prof. DR. Hendra B.Sc, M.Comp', '3274627462', 'Rektor', 'Munich', '1632642146_team-1.jpg'),
(4, 'DR. Ragil S.Kom, M.Kom', '2918923', 'Kaprodi', 'Jerman', '1632643186_ragill (2).jpg'),
(6, 'Romeo, S.Kom, M.Kom', '13233', 'Sekjur', 'Jerman Barat', '1632642641_wk.jpg'),
(9, 'Gafa ak', '73243276432', 'Lektor', 'Jakarta', '1632199706_aaasd.jpg');

-- --------------------------------------------------------

--
-- Table structure for table `tb_jurusan`
--

CREATE TABLE `tb_jurusan` (
  `id_jurusan` int(11) NOT NULL,
  `nama_jurusan` varchar(255) NOT NULL,
  `foto_jurusan` varchar(255) NOT NULL,
  `deskripsi` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tb_jurusan`
--

INSERT INTO `tb_jurusan` (`id_jurusan`, `nama_jurusan`, `foto_jurusan`, `deskripsi`) VALUES
(1, 'Sistem Informasi', '1632641655_SI.jpg', 'Perpaduan antara Komputer, Manajemen, dan Bisnis'),
(3, 'Teknik Informatika', '1632641729_IF.jpg', 'Coding is everything'),
(4, 'Sistem Komputer', '1632641822_SK.jpg', 'Segala hal yang berhubungan dengan komputer');

-- --------------------------------------------------------

--
-- Table structure for table `tb_kontak`
--

CREATE TABLE `tb_kontak` (
  `id_kontak` int(11) NOT NULL,
  `nama` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `nohp` varchar(255) NOT NULL,
  `tanggal` date NOT NULL,
  `deskripsi` varchar(1000) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tb_kontak`
--

INSERT INTO `tb_kontak` (`id_kontak`, `nama`, `email`, `nohp`, `tanggal`, `deskripsi`) VALUES
(1, 'Gafa', 'gafa@yahoo.com', '080898989', '2021-09-28', 'Be yourslef');

-- --------------------------------------------------------

--
-- Table structure for table `tb_produk`
--

CREATE TABLE `tb_produk` (
  `id_produk` int(11) NOT NULL,
  `nama_produk` varchar(100) NOT NULL,
  `stok` int(11) NOT NULL,
  `harga` double NOT NULL,
  `deskripsi_produk` text NOT NULL,
  `foto_produk` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tb_produk`
--

INSERT INTO `tb_produk` (`id_produk`, `nama_produk`, `stok`, `harga`, `deskripsi_produk`, `foto_produk`) VALUES
(1, 'Sabun', 0, 5000, 'Sabun Mandi', '1632545538_portfolio-3.jpg'),
(3, 'Shampoo', 494, 15000, 'Murah meriah', '1632545551_portfolio-6.jpg'),
(4, 'Biskuit', 668, 17000, 'Segar', '1632545578_portfolio-9.jpg'),
(7, 'Minyak', 100, 12000, 'bersih', '1632833266_'),
(8, 'Motor', 2, 150000000, 'Mahal', '1632903299_blog-author.jpg');

-- --------------------------------------------------------

--
-- Table structure for table `tb_testimoni`
--

CREATE TABLE `tb_testimoni` (
  `id_testimoni` int(11) NOT NULL,
  `nama` varchar(100) NOT NULL,
  `foto` varchar(255) NOT NULL,
  `pekerjaan` varchar(100) NOT NULL,
  `deskripsi` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tb_testimoni`
--

INSERT INTO `tb_testimoni` (`id_testimoni`, `nama`, `foto`, `pekerjaan`, `deskripsi`) VALUES
(1, 'Abdul', '1632645058_wk.jpg', 'PNS Asn', 'Kuliah disini sangat keren, saya sudah pernah coba'),
(2, 'Agus', '1632646080_SK.jpg', 'Freelance', 'Dosen nya sangat keren, dari jerman'),
(3, 'Hari', '1632646364_IF.jpg', 'Pengangguran', 'Saya sangat bangga menjadi alumni kampus ini'),
(4, 'Jeki', '1632646400_SI.jpg', 'Pengusaha', 'Saya sangat beruntung kuliah disini');

-- --------------------------------------------------------

--
-- Table structure for table `tb_transaksi`
--

CREATE TABLE `tb_transaksi` (
  `id_transaksi` int(11) NOT NULL,
  `id_produk` int(11) NOT NULL,
  `jumlah` int(11) NOT NULL,
  `total_harga` double NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tb_transaksi`
--

INSERT INTO `tb_transaksi` (`id_transaksi`, `id_produk`, `jumlah`, `total_harga`) VALUES
(6, 0, 3, 0),
(7, 0, 7, 105000),
(8, 0, 5, 75000),
(9, 0, 4, 60000),
(18, 8, 2, 300000000),
(19, 1, 4, 20000),
(20, 4, 2, 34000),
(21, 3, 3, 45000),
(22, 8, 1, 150000000),
(23, 3, 3, 45000);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `tb_about`
--
ALTER TABLE `tb_about`
  ADD PRIMARY KEY (`id_about`);

--
-- Indexes for table `tb_admin`
--
ALTER TABLE `tb_admin`
  ADD PRIMARY KEY (`id_admin`);

--
-- Indexes for table `tb_berita`
--
ALTER TABLE `tb_berita`
  ADD PRIMARY KEY (`id_berita`);

--
-- Indexes for table `tb_dosen`
--
ALTER TABLE `tb_dosen`
  ADD PRIMARY KEY (`id_dosen`);

--
-- Indexes for table `tb_jurusan`
--
ALTER TABLE `tb_jurusan`
  ADD PRIMARY KEY (`id_jurusan`);

--
-- Indexes for table `tb_kontak`
--
ALTER TABLE `tb_kontak`
  ADD PRIMARY KEY (`id_kontak`);

--
-- Indexes for table `tb_produk`
--
ALTER TABLE `tb_produk`
  ADD PRIMARY KEY (`id_produk`);

--
-- Indexes for table `tb_testimoni`
--
ALTER TABLE `tb_testimoni`
  ADD PRIMARY KEY (`id_testimoni`);

--
-- Indexes for table `tb_transaksi`
--
ALTER TABLE `tb_transaksi`
  ADD PRIMARY KEY (`id_transaksi`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `tb_about`
--
ALTER TABLE `tb_about`
  MODIFY `id_about` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `tb_admin`
--
ALTER TABLE `tb_admin`
  MODIFY `id_admin` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `tb_berita`
--
ALTER TABLE `tb_berita`
  MODIFY `id_berita` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `tb_dosen`
--
ALTER TABLE `tb_dosen`
  MODIFY `id_dosen` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT for table `tb_jurusan`
--
ALTER TABLE `tb_jurusan`
  MODIFY `id_jurusan` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `tb_kontak`
--
ALTER TABLE `tb_kontak`
  MODIFY `id_kontak` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `tb_produk`
--
ALTER TABLE `tb_produk`
  MODIFY `id_produk` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `tb_testimoni`
--
ALTER TABLE `tb_testimoni`
  MODIFY `id_testimoni` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `tb_transaksi`
--
ALTER TABLE `tb_transaksi`
  MODIFY `id_transaksi` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=24;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
