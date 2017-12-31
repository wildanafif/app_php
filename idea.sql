-- phpMyAdmin SQL Dump
-- version 4.6.5.2
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: 31 Des 2017 pada 20.08
-- Versi Server: 10.1.21-MariaDB
-- PHP Version: 5.6.30

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `idea`
--

-- --------------------------------------------------------

--
-- Struktur dari tabel `product_category`
--

CREATE TABLE `product_category` (
  `id` int(11) NOT NULL,
  `id_product_category` varchar(255) NOT NULL,
  `product_category` varchar(255) NOT NULL,
  `description` varchar(255) NOT NULL,
  `dtm_created` datetime NOT NULL,
  `dtm_last_updated` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `product_category`
--

INSERT INTO `product_category` (`id`, `id_product_category`, `product_category`, `description`, `dtm_created`, `dtm_last_updated`) VALUES
(3, '03965f81-b487-3192-aceb-b66e3c920963', 'dsadas', 'dsad', '0000-00-00 00:00:00', '2017-12-31 12:52:15'),
(9, '0d142768-280c-34c1-ae9b-16f754ecdd7a', 'vdx', 'dfbf', '2017-12-31 14:28:18', '2017-12-31 14:28:18'),
(5, '10dcd4f5-e1d1-3494-a5d6-fd6e07fc6445', 'dgsvd', 'dsbds', '2017-12-31 14:27:52', '2017-12-31 14:27:52'),
(8, '5bd33521-4095-39f4-aec5-13d593204a4e', 'dvsd', 'vsdvsd', '2017-12-31 14:28:12', '2017-12-31 14:28:12'),
(7, '78c7b50b-fd85-3fb4-b855-e74e00e4e76c', 'vsdvsd', 'vsdvsd', '2017-12-31 14:28:05', '2017-12-31 14:28:05'),
(2, '79af3042-65ee-3fd4-a2ea-b89086051c13', 'sadas', 'dsad', '0000-00-00 00:00:00', '2017-12-31 12:52:10'),
(15, '9e4edf14-c45f-3c5f-a88b-4b872a15038e', 'sdvsd', 'sdvs', '2017-12-31 17:40:20', '2017-12-31 17:40:20'),
(10, 'd512fc03-4bbd-318d-b20c-526feb89a809', 'sacsa', 'casc', '2017-12-31 14:28:26', '2017-12-31 14:28:26'),
(6, 'e579d40f-4ae3-351f-b4f5-2e5b5cfd1126', 'sdvcsdv', 'sdvsd', '2017-12-31 14:27:58', '2017-12-31 14:27:58'),
(1, 'ec9d7117-515b-3171-bf2a-4f6b3453ed5c', 'Aad', 'ada', '0000-00-00 00:00:00', '2017-12-31 12:52:05'),
(4, 'ed982f06-6851-3c89-a73e-26cb7a447a96', 'fas', 'asfas', '2017-12-31 12:53:38', '2017-12-31 12:53:38');

-- --------------------------------------------------------

--
-- Struktur dari tabel `vendor`
--

CREATE TABLE `vendor` (
  `id` int(11) NOT NULL,
  `id_vendor` varchar(255) NOT NULL,
  `username` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `image` varchar(255) NOT NULL,
  `cover_image` varchar(255) NOT NULL,
  `vendor_name` varchar(255) NOT NULL,
  `profit` decimal(10,0) NOT NULL,
  `address` varchar(255) NOT NULL,
  `latitude` double NOT NULL,
  `longitude` double NOT NULL,
  `dtm_created` datetime NOT NULL,
  `dtm_last_updated` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `vendor`
--

INSERT INTO `vendor` (`id`, `id_vendor`, `username`, `password`, `image`, `cover_image`, `vendor_name`, `profit`, `address`, `latitude`, `longitude`, `dtm_created`, `dtm_last_updated`) VALUES
(4, '2ad387c7-cdcf-3c5d-a115-3dd850c8b0cd', 'dsvvsd', 'b8748230ff5006a899516fd9af296490', '', '', 'sdvdsv', '12', 'Jl. Embong Trengguli No.2 A, Embong Kaliasin, Genteng, Kota SBY, Jawa Timur 60271, Indonesia', -7.265102600000001, 112.74500009999997, '2017-12-31 18:27:09', '2017-12-31 18:27:50'),
(1, '3231d5cf-c4ed-3ccd-973b-fc06d0add93a', 'username', '5f48cbb6b60a5c3dcd1bb022bba910f0', '', '', 'Nmaaaa edit', '10', 'Jl. Monumen Pancasila Sakti No.10C, Lubang Buaya, Cipayung, Kota Jakarta Timur, Daerah Khusus Ibukota Jakarta 13810, Indonesia', 0, 0, '2017-12-31 17:51:55', '2017-12-31 17:51:55'),
(5, '472b3e9f-de62-3b69-af27-61de55947e0a', 'sdbsdsvsd', 'b71b02d15a366b3b36161ac5b4fa87ee', '', '', 'fvsdvcsdv', '12', 'Jl. Ridan No.27, Pinang Ranti, Makasar, Kota Jakarta Timur, Daerah Khusus Ibukota Jakarta 13560, Indonesia', -6.2778135, 106.8825013, '2017-12-31 19:24:06', '2017-12-31 19:24:06');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `product_category`
--
ALTER TABLE `product_category`
  ADD PRIMARY KEY (`id_product_category`),
  ADD UNIQUE KEY `idx` (`id`);

--
-- Indexes for table `vendor`
--
ALTER TABLE `vendor`
  ADD PRIMARY KEY (`id_vendor`),
  ADD UNIQUE KEY `idx` (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `product_category`
--
ALTER TABLE `product_category`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;
--
-- AUTO_INCREMENT for table `vendor`
--
ALTER TABLE `vendor`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
