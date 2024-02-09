-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: localhost:3306
-- Waktu pembuatan: 09 Feb 2024 pada 08.07
-- Versi server: 11.1.2-MariaDB-log
-- Versi PHP: 8.1.10

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `test`
--

-- --------------------------------------------------------

--
-- Struktur dari tabel `survey`
--

CREATE TABLE `survey` (
  `id_survey` int(11) NOT NULL,
  `nik` bigint(20) DEFAULT NULL,
  `layanan_kesehatan` enum('1','2','3','4','5') DEFAULT NULL,
  `layanan_pendidikan` enum('1','2','3','4','5') DEFAULT NULL,
  `layanan_kebersihan` enum('1','2','3','4','5') DEFAULT NULL,
  `layanan_pangan` enum('1','2','3','4','5') DEFAULT NULL,
  `layanan_informasi` enum('1','2','3','4','5') DEFAULT NULL,
  `saran_masukan` text DEFAULT NULL COMMENT 'Saran dan masukan',
  `created_at` timestamp NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

-- --------------------------------------------------------

--
-- Struktur dari tabel `users`
--

CREATE TABLE `users` (
  `id` int(11) NOT NULL,
  `nik` bigint(20) DEFAULT NULL,
  `nama` varchar(255) DEFAULT NULL,
  `alamat` varchar(255) DEFAULT NULL,
  `username` varchar(255) DEFAULT NULL,
  `password` varchar(255) DEFAULT NULL,
  `role` enum('user','admin') DEFAULT NULL,
  `update_at` timestamp NULL DEFAULT current_timestamp(),
  `created_at` timestamp NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Dumping data untuk tabel `users`
--

INSERT INTO `users` (`id`, `nik`, `nama`, `alamat`, `username`, `password`, `role`, `update_at`, `created_at`) VALUES
(1, 32027001, NULL, NULL, 'admin', '$2y$10$jDIyzpMV6TTX2rMylEPH0e336sBqYOqzbTjJG1V47eQNZRLvPAs1i', 'admin', '2024-02-09 07:49:44', '2024-02-09 07:49:44'),
(2, 3202780384, NULL, NULL, 'user', '$2y$10$nqAcRI3eFCqoH6yUtq66K.ASjS5yPOfATtAaIQzpAjReGLxb3HdHS', 'user', '2024-02-09 07:50:33', '2024-02-09 07:50:33');

--
-- Indexes for dumped tables
--

--
-- Indeks untuk tabel `survey`
--
ALTER TABLE `survey`
  ADD PRIMARY KEY (`id_survey`),
  ADD KEY `nik` (`nik`);

--
-- Indeks untuk tabel `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `nik` (`nik`);

--
-- AUTO_INCREMENT untuk tabel yang dibuang
--

--
-- AUTO_INCREMENT untuk tabel `survey`
--
ALTER TABLE `survey`
  MODIFY `id_survey` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT untuk tabel `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- Ketidakleluasaan untuk tabel pelimpahan (Dumped Tables)
--

--
-- Ketidakleluasaan untuk tabel `survey`
--
ALTER TABLE `survey`
  ADD CONSTRAINT `survey_ibfk_1` FOREIGN KEY (`nik`) REFERENCES `users` (`nik`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
