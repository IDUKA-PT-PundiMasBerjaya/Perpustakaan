-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Mar 15, 2024 at 08:45 AM
-- Server version: 10.4.32-MariaDB
-- PHP Version: 8.0.30

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `perpustakaan`
--

-- --------------------------------------------------------

--
-- Table structure for table `buku`
--

CREATE TABLE `buku` (
  `id_buku` int(11) NOT NULL,
  `judul` varchar(100) DEFAULT NULL,
  `penulis` varchar(100) DEFAULT NULL,
  `keterangan` varchar(100) DEFAULT NULL,
  `stok` int(11) DEFAULT NULL,
  `gambar` varchar(100) DEFAULT NULL,
  `matapelajaran_idpelajaran` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `buku`
--

INSERT INTO `buku` (`id_buku`, `judul`, `penulis`, `keterangan`, `stok`, `gambar`, `matapelajaran_idpelajaran`) VALUES
(1, 'Buku Sakti Pemrograman Web Seri PHP', 'Mundzir MF', 'Buku terbitan Start-up ini memaparkan pemrograman web berbasis PHP', 45, 'PHP.jpg', 2),
(2, 'Introduction to IoT', 'Sudip Misra', 'IOT is a system of interrelated things, computing devices, mechanical and digital machines', 40, 'IoT.jpeg', 3),
(3, 'Bimbingan dan Konseling di Sekolah', 'Dr. Ahmad Susanto', 'Pemberian layanan bimbingan dan konseling bagi siswa sangat penting dalam rangka untuk keberhasilan ', 45, 'BK.jpg', 4),
(4, 'Buku Sakti HTML, CSS & Javascript : Pemrograman Web Itu Gampang', 'Adam Saputra', 'HTML atau Hyper Text Markup Language merupakan sebuah bahasa pemrograman terstruktur yang dikembangk', 45, 'HTML, CSS dan PHP.jpg', 2),
(5, 'Cyber Security Using Modern Technologies Artificial Intelligence, Blockchain and Quantum Cryptograph', 'Dr. Om Pal', 'The main objective of this book is to introduce cyber security using modern technologies such as Art', 45, 'Cyber security.jpg', 1),
(6, 'Hacking the Hacker: Learn From the Experts Who Take Down Hackers', 'Roger A. Grimes', 'Hacking the Hacker takes you inside the world of cybersecurity to show you what goes on behind the s', 45, 'Hacking.jpg', 5);

-- --------------------------------------------------------

--
-- Table structure for table `guru`
--

CREATE TABLE `guru` (
  `idguru` int(11) NOT NULL,
  `nama` varchar(255) DEFAULT NULL,
  `alamat` text DEFAULT NULL,
  `email` varchar(100) DEFAULT NULL,
  `no_hp` varchar(20) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `guru`
--

INSERT INTO `guru` (`idguru`, `nama`, `alamat`, `email`, `no_hp`) VALUES
(1, 'Buk Helmidah', 'Piayu', 'helmidah@gmail.com', '+6281935101371'),
(2, 'Sir Rivet', 'Uknown', 'tevirchan@gmail.com', '+1170320072021'),
(3, 'Pak Misriyadi', 'Tunas 2', 'misriyadi@gmail.com', '+6285608518902'),
(4, 'Pak Senu', 'Barelang', 'senu@gmail.com', '+62895631045649'),
(5, 'Pak Wahid', 'Sagulung', 'wahid@gmail.com', '+6289643200429');

-- --------------------------------------------------------

--
-- Table structure for table `kelas`
--

CREATE TABLE `kelas` (
  `id_kelas` int(11) NOT NULL,
  `namakelas` varchar(100) DEFAULT NULL,
  `kursi` int(11) DEFAULT NULL,
  `meja` int(11) DEFAULT NULL,
  `gambar_kelas` varchar(500) DEFAULT NULL,
  `guru_idguru` int(11) DEFAULT NULL,
  `siswa_idsiswa` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `matapelajaran`
--

CREATE TABLE `matapelajaran` (
  `idpelajaran` int(11) NOT NULL,
  `namapelajaran` varchar(100) DEFAULT NULL,
  `guru_idguru` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `matapelajaran`
--

INSERT INTO `matapelajaran` (`idpelajaran`, `namapelajaran`, `guru_idguru`) VALUES
(1, 'Cyber Security', 4),
(2, 'Web Programming', 3),
(3, 'Internet Of Things', 5),
(4, 'BK', 1),
(5, 'Hacking', 2);

-- --------------------------------------------------------

--
-- Table structure for table `peminjaman`
--

CREATE TABLE `peminjaman` (
  `id_peminjaman` int(11) NOT NULL,
  `tanggal_pinjam` date DEFAULT NULL,
  `tanggal_kembali` date DEFAULT NULL,
  `guru_idguru` int(11) DEFAULT NULL,
  `siswa_idsiswa` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `peminjaman`
--

INSERT INTO `peminjaman` (`id_peminjaman`, `tanggal_pinjam`, `tanggal_kembali`, `guru_idguru`, `siswa_idsiswa`) VALUES
(1, '2024-03-01', '2024-03-17', 2, NULL),
(2, '2024-03-13', '2024-03-24', NULL, 1);

-- --------------------------------------------------------

--
-- Table structure for table `peminjaman_buku`
--

CREATE TABLE `peminjaman_buku` (
  `id_peminjaman` int(11) NOT NULL,
  `jumlah_buku` int(11) DEFAULT NULL,
  `buku_id_buku` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `peminjaman_buku`
--

INSERT INTO `peminjaman_buku` (`id_peminjaman`, `jumlah_buku`, `buku_id_buku`) VALUES
(1, 5, 1),
(1, 5, 2);

--
-- Triggers `peminjaman_buku`
--
DELIMITER $$
CREATE TRIGGER `peminjaman` AFTER INSERT ON `peminjaman_buku` FOR EACH ROW BEGIN
	UPDATE buku SET stok = stok - NEW.jumlah_buku
    WHERE id_buku = NEW.buku_id_buku;
END
$$
DELIMITER ;

-- --------------------------------------------------------

--
-- Table structure for table `pengembalian_buku`
--

CREATE TABLE `pengembalian_buku` (
  `id_pengembalian` int(11) NOT NULL,
  `jumlah_buku` int(11) DEFAULT NULL,
  `tanggal_pengembalian` date DEFAULT NULL,
  `buku_id_buku` int(11) DEFAULT NULL,
  `peminjaman_id_peminjaman` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `pengembalian_buku`
--

INSERT INTO `pengembalian_buku` (`id_pengembalian`, `jumlah_buku`, `tanggal_pengembalian`, `buku_id_buku`, `peminjaman_id_peminjaman`) VALUES
(1, 5, '2024-03-15', 1, 1);

--
-- Triggers `pengembalian_buku`
--
DELIMITER $$
CREATE TRIGGER `pengembalian` AFTER INSERT ON `pengembalian_buku` FOR EACH ROW BEGIN 
	UPDATE buku SET stok = stok + NEW.jumlah_buku
    WHERE id_buku = NEW.buku_id_buku;
END
$$
DELIMITER ;

-- --------------------------------------------------------

--
-- Table structure for table `siswa`
--

CREATE TABLE `siswa` (
  `idsiswa` int(11) NOT NULL,
  `nama` varchar(255) DEFAULT NULL,
  `alamat` text DEFAULT NULL,
  `email` varchar(100) DEFAULT NULL,
  `no_hp` varchar(20) DEFAULT NULL,
  `users_id` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `siswa`
--

INSERT INTO `siswa` (`idsiswa`, `nama`, `alamat`, `email`, `no_hp`, `users_id`) VALUES
(1, 'Enno', 'Perum Griya Kpn', 'kanekitouru2@gmail.com', '+6282388310607', 1),
(2, 'Naafi', 'Pelita', 'mnaafi@gmail.com', '+6281534478244', 1),
(3, 'Brilliant', 'Sagulung', 'liant@gmail.com', '+6288708027306', 1),
(4, 'Hamza', 'Cendana', 'hamza@gmail.com', '+6285658562774', 1),
(5, 'Irrahman', 'Bengkong', 'irrahman@gmail.com', '+6282388310607', 1);

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(11) NOT NULL,
  `username` varchar(255) DEFAULT NULL,
  `password` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `username`, `password`) VALUES
(1, 'Enno', 'Drags421');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `buku`
--
ALTER TABLE `buku`
  ADD PRIMARY KEY (`id_buku`),
  ADD KEY `buku_ibfk_1` (`matapelajaran_idpelajaran`);

--
-- Indexes for table `guru`
--
ALTER TABLE `guru`
  ADD PRIMARY KEY (`idguru`);

--
-- Indexes for table `kelas`
--
ALTER TABLE `kelas`
  ADD PRIMARY KEY (`id_kelas`),
  ADD KEY `guru_idguru` (`guru_idguru`),
  ADD KEY `siswa_idsiswa` (`siswa_idsiswa`);

--
-- Indexes for table `matapelajaran`
--
ALTER TABLE `matapelajaran`
  ADD PRIMARY KEY (`idpelajaran`),
  ADD KEY `matapelajaran_ibfk_1` (`guru_idguru`);

--
-- Indexes for table `peminjaman`
--
ALTER TABLE `peminjaman`
  ADD PRIMARY KEY (`id_peminjaman`),
  ADD KEY `guru_idguru` (`guru_idguru`),
  ADD KEY `siswa_idsiswa` (`siswa_idsiswa`);

--
-- Indexes for table `peminjaman_buku`
--
ALTER TABLE `peminjaman_buku`
  ADD KEY `buku_id_buku` (`buku_id_buku`),
  ADD KEY `id_peminjaman` (`id_peminjaman`);

--
-- Indexes for table `pengembalian_buku`
--
ALTER TABLE `pengembalian_buku`
  ADD PRIMARY KEY (`id_pengembalian`),
  ADD KEY `buku_id_buku` (`buku_id_buku`),
  ADD KEY `peminjaman_id_peminjaman` (`peminjaman_id_peminjaman`);

--
-- Indexes for table `siswa`
--
ALTER TABLE `siswa`
  ADD PRIMARY KEY (`idsiswa`),
  ADD KEY `users_id` (`users_id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `pengembalian_buku`
--
ALTER TABLE `pengembalian_buku`
  MODIFY `id_pengembalian` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `buku`
--
ALTER TABLE `buku`
  ADD CONSTRAINT `buku_ibfk_1` FOREIGN KEY (`matapelajaran_idpelajaran`) REFERENCES `matapelajaran` (`idpelajaran`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Constraints for table `kelas`
--
ALTER TABLE `kelas`
  ADD CONSTRAINT `kelas_ibfk_1` FOREIGN KEY (`guru_idguru`) REFERENCES `guru` (`idguru`),
  ADD CONSTRAINT `kelas_ibfk_2` FOREIGN KEY (`siswa_idsiswa`) REFERENCES `siswa` (`idsiswa`);

--
-- Constraints for table `matapelajaran`
--
ALTER TABLE `matapelajaran`
  ADD CONSTRAINT `matapelajaran_ibfk_1` FOREIGN KEY (`guru_idguru`) REFERENCES `guru` (`idguru`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Constraints for table `peminjaman`
--
ALTER TABLE `peminjaman`
  ADD CONSTRAINT `peminjaman_ibfk_1` FOREIGN KEY (`guru_idguru`) REFERENCES `guru` (`idguru`),
  ADD CONSTRAINT `peminjaman_ibfk_2` FOREIGN KEY (`siswa_idsiswa`) REFERENCES `siswa` (`idsiswa`);

--
-- Constraints for table `peminjaman_buku`
--
ALTER TABLE `peminjaman_buku`
  ADD CONSTRAINT `peminjaman_buku_ibfk_1` FOREIGN KEY (`buku_id_buku`) REFERENCES `buku` (`id_buku`),
  ADD CONSTRAINT `peminjaman_buku_ibfk_2` FOREIGN KEY (`id_peminjaman`) REFERENCES `peminjaman` (`id_peminjaman`);

--
-- Constraints for table `pengembalian_buku`
--
ALTER TABLE `pengembalian_buku`
  ADD CONSTRAINT `pengembalian_buku_ibfk_1` FOREIGN KEY (`buku_id_buku`) REFERENCES `buku` (`id_buku`),
  ADD CONSTRAINT `pengembalian_buku_ibfk_2` FOREIGN KEY (`peminjaman_id_peminjaman`) REFERENCES `peminjaman` (`id_peminjaman`);

--
-- Constraints for table `siswa`
--
ALTER TABLE `siswa`
  ADD CONSTRAINT `siswa_ibfk_1` FOREIGN KEY (`users_id`) REFERENCES `users` (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
