-- phpMyAdmin SQL Dump
-- version 4.9.0.1
-- https://www.phpmyadmin.net/
--
-- Host: localhost:3306
-- Generation Time: Nov 26, 2019 at 03:36 PM
-- Server version: 5.7.26
-- PHP Version: 7.3.7

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `membres`
--

-- --------------------------------------------------------

--
-- Table structure for table `membres`
--

CREATE TABLE `membres` (
  `id` int(11) NOT NULL,
  `pseudo` varchar(255) NOT NULL,
  `pass` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `date_inscription` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `membres`
--

INSERT INTO `membres` (`id`, `pseudo`, `pass`, `email`, `date_inscription`) VALUES
(9, 'Nathalie', '$2y$10$dm91XeBYWd4ZePhPoB2pZOYTwiyX9MLbjxDKT341fLVbn/Kk2K3/O', 'nathalie@hotmail.fr', '2019-11-14'),
(10, 'evan', '$2y$10$anRjl7yFYzu6ZxYV9yoN4.s1JV.ztb.a59UTlgYHzxjhP6VRiyc6G', 'evan@jus.info', '2019-11-14'),
(11, 'M@teo21', '$2y$10$Zu3ZjBt7ZaNWCkwM4hgLLOe1bhhpbVkzb9tYKbmzdWFE4RqXZh5/u', 'mateo@mail.com', '2019-11-14'),
(13, 'julie', '$2y$10$Z7QtnPnUq0tjRxNEWoQuh.9jVTczwcAqVX4KIDsfw1MjSB1vhz3W.', 'julie@mail.com', '2019-11-14'),
(14, 'chmou1', '$2y$10$F9zyqKJUdYbQsH5.IW63y.kH4C/r1A5yrCgZWni.ULta2IZOTdI.a', 'chmou@mail.com', '2019-11-14'),
(28, 'robert', '$2y$10$4KM8qvqV2c3heShk69ilK.SZJNgPQfRas2cqSdVWVUJiDTmBj3tsO', 'robert@mail.com', '2019-11-15'),
(29, 'pierre', '$2y$10$HD6axBeU6pj2QV3AkbfM0ukevqzv7ksKFIvLJ5z9/sz2ihJe2poGW', 'pierre@mail.fr', '2019-11-15'),
(32, 'Emilie', '$2y$10$rGMpCIGwlIXHnyQSK7tdpOkSUel2XutxT1WXM6ndjHFvuY32EK3/u', 'emilie@mail.com', '2019-11-15'),
(33, 'thierry', '$2y$10$qU3Dm4ENEuV1//K3TGSg4usSInBgAV1RwyViUHjeLv7DZytrvq2dK', 'thierry@mail.fr', '2019-11-15'),
(35, 'Zaid', '$2y$10$BlWGQYHGkcC.4yJrjppdcuMCjm3EEIOQ0ZQPR1TYhYMkGslSBJMAu', 'zaid@mail.com', '2019-11-15'),
(43, 'jared', '$2y$10$vn/b4MH7qlrC1xDx6j.wpeUFHkUKVmgNCg26kHij0bo8A/kR9UbwW', 'jared@mail.info', '2019-11-15'),
(52, 'jean-louis', '$2y$10$soUsNqTykPzWUzItDLG0jOyzO.o4uxg0ups4779x4G66h68/JeWR2', 'jean-louis@mail.com', '2019-11-15'),
(54, 'jean-michel', '$2y$10$k8Kde9nOucntXPpWZ6kDwuFW6gEkSkmKaqhoNvYmqldi3XQAY4RPa', 'jean-michel@mail.fr', '2019-11-15'),
(55, 'neon21', '$2y$10$ENvo.O4GEjYA1qaPeywdyOdnfdz048nVkyg9oj9k9bctD/J7WVpPG', 'neon@mail.com', '2019-11-15'),
(56, 'Emilie2', '$2y$10$C5YBUJ0ljNDpVB5.exNYRe5E8i.F6/aTqbVrO2G0SsT359kE9CGCW', 'emilie2@mail.fr', '2019-11-15'),
(57, 'lulu', '$2y$10$Cmr.YeaaIVHjbhoESn4LLusbkp.ruS5Aix/dZRJMmIXZdYLKcpKJC', 'lulu@mail.fr', '2019-11-15'),
(58, 'lolo', '$2y$10$7k2./gH.hzxoM7zX6.HfquYjvXAFc5BnegAPBTvhwoZqQzj/6yzkq', 'lolo@mail.com', '2019-11-15'),
(59, 'xavier', '$2y$10$.qmo0CkafCsGwgAI2uau6ucUkU38U4tXzZUfcVz5kPNJxdS/UET1S', 'xavier@mail.fr', '2019-11-15');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `membres`
--
ALTER TABLE `membres`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `membres`
--
ALTER TABLE `membres`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=60;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
