# koperasi
Pendeteksi Kelayakan Peminjaman Uang dengan Algoritma Fuzzy

## Requirements
- Php (Min v5.6)
- MariaDB 10.1.30
---

## CARA INSTALL

clone repository ini

```
git clone https://github.com/fatkulnurk/koperasi/
```

Jalankan Dump Query Berikut.

```
-- phpMyAdmin SQL Dump
-- version 4.7.7
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Waktu pembuatan: 20 Jul 2018 pada 16.23
-- Versi server: 10.1.30-MariaDB
-- Versi PHP: 7.2.2

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `koperasi`
--

-- --------------------------------------------------------

--
-- Struktur dari tabel `peminjaman`
--

CREATE TABLE `peminjaman` (
  `peminjaman_id` int(10) NOT NULL,
  `peminjaman_user_id` int(10) NOT NULL,
  `peminjaman_nama_lengkap` varchar(150) NOT NULL,
  `peminjaman_nominal` int(15) NOT NULL,
  `peminjaman_jangka_waktu` varchar(50) NOT NULL,
  `peminjaman_kelayakan` varchar(50) NOT NULL,
  `peminjaman_status` varchar(20) NOT NULL DEFAULT 'menunggu',
  `peminjaman_lunas` varchar(20) NOT NULL DEFAULT 'belum',
  `peminjaman_timestap` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Struktur dari tabel `user`
--

CREATE TABLE `user` (
  `user_id` int(10) NOT NULL,
  `user_email` varchar(255) NOT NULL,
  `user_namalengkap` varchar(150) NOT NULL,
  `user_kelamin` varchar(13) NOT NULL,
  `user_gaji` int(15) NOT NULL,
  `user_umur` date NOT NULL,
  `user_pekerjaan` varchar(100) NOT NULL,
  `user_password` varchar(255) NOT NULL,
  `user_tipe_akun` varchar(25) NOT NULL DEFAULT '3',
  `user_timestamp` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Indexes for dumped tables
--

--
-- Indeks untuk tabel `peminjaman`
--
ALTER TABLE `peminjaman`
  ADD PRIMARY KEY (`peminjaman_id`);

--
-- Indeks untuk tabel `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`user_id`),
  ADD UNIQUE KEY `user_email` (`user_email`);

--
-- AUTO_INCREMENT untuk tabel yang dibuang
--

--
-- AUTO_INCREMENT untuk tabel `peminjaman`
--
ALTER TABLE `peminjaman`
  MODIFY `peminjaman_id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT untuk tabel `user`
--
ALTER TABLE `user`
  MODIFY `user_id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
```
