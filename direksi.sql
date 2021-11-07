-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Waktu pembuatan: 12 Okt 2021 pada 05.35
-- Versi server: 10.4.20-MariaDB
-- Versi PHP: 7.4.21

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
  `year_id` int(11) NOT NULL,
  `script_number` varchar(100) NOT NULL,
  `regarding` text NOT NULL,
  `determination_date` varchar(100) NOT NULL,
  `description` text NOT NULL,
  `replacement` text NOT NULL,
  `pdf_valid_id` int(11) NOT NULL,
  `pdf_invalid_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Struktur dari tabel `pdf_invalid`
--

CREATE TABLE `pdf_invalid` (
  `pdf_invalid_id` int(11) NOT NULL,
  `pdf_invalid_name` varchar(255) NOT NULL,
  `file_size_invalid` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `pdf_invalid`
--

INSERT INTO `pdf_invalid` (`pdf_invalid_id`, `pdf_invalid_name`, `file_size_invalid`) VALUES
(1, '2020.001.KD001 ttg Shared Service Centre Keuangan.pdf', 2512);

-- --------------------------------------------------------

--
-- Struktur dari tabel `pdf_valid`
--

CREATE TABLE `pdf_valid` (
  `pdf_valid_id` int(11) NOT NULL,
  `pdf_valid_name` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

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
(1, 'admin@gmail.com', 'admin', 'admin');

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
(4, 2021);

--
-- Indexes for dumped tables
--

--
-- Indeks untuk tabel `direction`
--
ALTER TABLE `direction`
  ADD PRIMARY KEY (`direction_id`);

--
-- Indeks untuk tabel `pdf_invalid`
--
ALTER TABLE `pdf_invalid`
  ADD PRIMARY KEY (`pdf_invalid_id`);

--
-- Indeks untuk tabel `pdf_valid`
--
ALTER TABLE `pdf_valid`
  ADD PRIMARY KEY (`pdf_valid_id`);

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
  MODIFY `direction_id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT untuk tabel `pdf_invalid`
--
ALTER TABLE `pdf_invalid`
  MODIFY `pdf_invalid_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT untuk tabel `pdf_valid`
--
ALTER TABLE `pdf_valid`
  MODIFY `pdf_valid_id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT untuk tabel `status`
--
ALTER TABLE `status`
  MODIFY `status_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT untuk tabel `user`
--
ALTER TABLE `user`
  MODIFY `user_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT untuk tabel `year`
--
ALTER TABLE `year`
  MODIFY `year_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
