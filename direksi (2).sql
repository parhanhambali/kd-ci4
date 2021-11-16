-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Waktu pembuatan: 08 Nov 2021 pada 04.37
-- Versi server: 10.4.21-MariaDB
-- Versi PHP: 7.4.24

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `direksi`
--

-- --------------------------------------------------------

--
-- Struktur dari tabel `direction`
--

CREATE TABLE `direction` (
  `direction_id` int(11) NOT NULL,
  `status_id` int(11) NOT NULL,
  `script_number` varchar(100) DEFAULT NULL,
  `year_id` int(11) DEFAULT NULL,
  `regarding` text DEFAULT NULL,
  `determination_date` varchar(100) DEFAULT NULL,
  `description` text DEFAULT NULL,
  `replacement` text DEFAULT NULL,
  `file_pdf_valid` varchar(255) DEFAULT NULL,
  `file_pdf_invalid` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `direction`
--

INSERT INTO `direction` (`direction_id`, `status_id`, `script_number`, `year_id`, `regarding`, `determination_date`, `description`, `replacement`, `file_pdf_valid`, `file_pdf_invalid`) VALUES
(2, 1, 'DR12345', 2, 'lorem ipsum dolor sitamet', '15-10-2000', 'lorem ipsum dolor sitamet', 'Berubah', '2020.020.KD020 Perubahan Pertama Atas KD125Tahun 2017 ttg Reward Layanan Pos Assurance.pdf', '2020.022.KD022 ttg Layanan  QPOSin AJA.pdf'),
(3, 1, 'ahaha', 3, 'ashgshhshs', '20-10-2000', 'ahushjshbshbjhjs', NULL, '2020.010.KD010 ttg Tarif Q-Comm Di Luar Jawa.pdf', '2020.053.KD053 ttg Sistem Manajemen Kinerja Individu.pdf'),
(4, 1, 'assssssssssssss', 7, 'saaaaaaa', '2021-11-07', 'sssssssssssssss', 'sdddddddddd', 'php617C.tmp', 'php617C.tmp'),
(6, 1, 'akuganre', 1, 'xaxa', '1998-09-08', 'xzzzzzz', 'zxxxxx', '1636262723_cfb31eeefc31e684c1db.pdf', '1636262723_f584a5ca83a9182db4d7.pdf'),
(7, 1, 'wq', 4, 'ASq', '2021-11-25', '112wsdx', 'berubah Gaes', '1636262865_0c78e386a015b4bf0a5f.pdf', '1636262865_a52b7d10757e430e5503.pdf');

-- --------------------------------------------------------

--
-- Struktur dari tabel `status`
--

CREATE TABLE `status` (
  `status_id` int(11) NOT NULL,
  `status_name` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `status`
--

INSERT INTO `status` (`status_id`, `status_name`) VALUES
(1, 'Valid'),
(2, 'Invalid');

-- --------------------------------------------------------

--
-- Struktur dari tabel `user`
--

CREATE TABLE `user` (
  `user_id` int(11) NOT NULL,
  `email` varchar(100) NOT NULL,
  `username` varchar(100) NOT NULL,
  `password` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `user`
--

INSERT INTO `user` (`user_id`, `email`, `username`, `password`) VALUES
(1, 'admin@gmail.com', 'admin', 'admin'),
(2, 'tatakelola@gmail.com', 'tatakelola', '$2y$10$8AmEIRovQikGgyi/bJHoNudBafZ.eFz20IdWDNabJjOWs2/OoMuzy');

-- --------------------------------------------------------

--
-- Struktur dari tabel `year`
--

CREATE TABLE `year` (
  `year_id` int(11) NOT NULL,
  `year_name` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `year`
--

INSERT INTO `year` (`year_id`, `year_name`) VALUES
(1, 2020),
(4, 2023),
(6, 2017),
(7, 2021),
(8, 2019);

--
-- Indexes for dumped tables
--

--
-- Indeks untuk tabel `direction`
--
ALTER TABLE `direction`
  ADD PRIMARY KEY (`direction_id`);

--
-- Indeks untuk tabel `status`
--
ALTER TABLE `status`
  ADD PRIMARY KEY (`status_id`);

--
-- Indeks untuk tabel `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`user_id`);

--
-- Indeks untuk tabel `year`
--
ALTER TABLE `year`
  ADD PRIMARY KEY (`year_id`);

--
-- AUTO_INCREMENT untuk tabel yang dibuang
--

--
-- AUTO_INCREMENT untuk tabel `direction`
--
ALTER TABLE `direction`
  MODIFY `direction_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT untuk tabel `status`
--
ALTER TABLE `status`
  MODIFY `status_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT untuk tabel `user`
--
ALTER TABLE `user`
  MODIFY `user_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT untuk tabel `year`
--
ALTER TABLE `year`
  MODIFY `year_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
