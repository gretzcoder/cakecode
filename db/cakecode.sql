-- phpMyAdmin SQL Dump
-- version 4.9.2
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Mar 31, 2020 at 02:55 PM
-- Server version: 10.4.11-MariaDB
-- PHP Version: 7.4.1

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `cakecode`
--

-- --------------------------------------------------------

--
-- Table structure for table `product`
--

CREATE TABLE `product` (
  `id` int(11) NOT NULL,
  `title` varchar(50) NOT NULL,
  `description` varchar(1000) NOT NULL,
  `price` int(11) NOT NULL,
  `status` int(11) NOT NULL,
  `category` set('best-seller','snack','cake','bread') NOT NULL,
  `photo` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `product`
--

INSERT INTO `product` (`id`, `title`, `description`, `price`, `status`, `category`, `photo`) VALUES
(18, 'ChocoFla', 'Bread with choco. yup, this is a special choco!', 7000, 1, 'best-seller,bread', 'ChocoFla.jpg'),
(19, 'ChocoLong', 'This is a special choco, but very long.', 12000, 1, 'best-seller,cake', 'Choco-Long.jpg'),
(20, 'NewCafeUno', 'a special bread with special cheese too.', 5000, 1, 'best-seller,bread', 'NewCafeUno.jpg'),
(21, 'RichieChese', 'Bread with super duper delicious cheese', 7000, 1, 'best-seller,bread', 'RichieCheese.jpg'),
(22, 'ChickenPie', 'Yup this is a pie with SPECIAL chicken inside.', 8000, 1, 'best-seller,snack', 'Chicken-pie.jpg'),
(23, 'SoftChocoBar', 'its soft choco bar, with SPECIAL choco inside', 47000, 1, 'best-seller,cake', 'Soft-choco-bar.jpg'),
(24, 'Pastel Ayam', 'uhh, you must try this. pastel with SPECIAL ayam inside.', 8000, 1, 'best-seller,snack', 'PastelAyam.jpg'),
(25, 'SoftChocoCake', 'Yes, this is a cake with SPECIAL choco inside', 78000, 1, 'best-seller,cake', 'kue1.jpg');

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE `user` (
  `id` int(11) NOT NULL,
  `username` varchar(25) NOT NULL,
  `email` varchar(50) NOT NULL,
  `password` varchar(255) NOT NULL,
  `role_id` int(1) NOT NULL,
  `date_created` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`id`, `username`, `email`, `password`, `role_id`, `date_created`) VALUES
(3, 'Admin', 'admin@cakecode.co.id', '$2y$10$WMdYTrCJQSnq4nFyvQoF/.pDRIACvqYhezojcJV0REkhKFCEFktOW', 1, '2019-12-22'),
(6, 'Iqbal', 'iqbal@gmail.com', '$2y$10$7YR/yHFMekIhD736Q1Fe2.sOfT6r1dsvItuegX9FQTFfCy5.gZwNy', 2, '2019-12-25');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `product`
--
ALTER TABLE `product`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `product`
--
ALTER TABLE `product`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=26;

--
-- AUTO_INCREMENT for table `user`
--
ALTER TABLE `user`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
