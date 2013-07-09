-- phpMyAdmin SQL Dump
-- version 4.0.4.1
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: Jul 09, 2013 at 03:03 PM
-- Server version: 5.6.10
-- PHP Version: 5.3.15

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `orderweb`
--
CREATE DATABASE IF NOT EXISTS `orderweb` DEFAULT CHARACTER SET utf8 COLLATE utf8_general_ci;
USE `orderweb`;

-- --------------------------------------------------------

--
-- Table structure for table `category`
--

CREATE TABLE IF NOT EXISTS `category` (
  `id` int(11) NOT NULL,
  `name` varchar(256) NOT NULL,
  `sort` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `category`
--

INSERT INTO `category` (`id`, `name`, `sort`) VALUES
(1, '砂锅面', 1),
(2, '米线', 2),
(3, '饮料', 3),
(4, '汤类', 4);

-- --------------------------------------------------------

--
-- Table structure for table `order`
--

CREATE TABLE IF NOT EXISTS `order` (
  `id` bigint(20) NOT NULL,
  `seq` int(11) NOT NULL AUTO_INCREMENT,
  `finish_time` bigint(20) DEFAULT NULL,
  `price` float DEFAULT NULL,
  `amount` int(11) DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `seq` (`seq`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=31 ;

--
-- Dumping data for table `order`
--

INSERT INTO `order` (`id`, `seq`, `finish_time`, `price`, `amount`) VALUES
(1, 2, NULL, NULL, NULL),
(1373350427, 20, 1373350427, NULL, 0),
(1373350479, 21, 1373350479, NULL, 0),
(1373350505, 22, 1373350505, NULL, 0),
(1373350637, 23, 1373350637, NULL, 0),
(1373350710, 24, 1373350710, NULL, 3),
(1373350877, 25, 1373350877, NULL, 2),
(1373350881, 26, 1373350881, NULL, 0),
(1373351001, 27, 1373351001, NULL, 0),
(1373351006, 28, 1373351006, NULL, 0),
(1373351112, 29, 1373351112, NULL, 1),
(1373351133, 30, 1373351133, NULL, 4);

-- --------------------------------------------------------

--
-- Table structure for table `order_product`
--

CREATE TABLE IF NOT EXISTS `order_product` (
  `id` int(11) NOT NULL,
  `order_id` bigint(20) NOT NULL,
  `product_id` int(11) NOT NULL,
  `amount` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `order_product`
--

INSERT INTO `order_product` (`id`, `order_id`, `product_id`, `amount`) VALUES
(1373350637, 1373350637, 1, NULL),
(1373350637, 1373350637, 2, NULL),
(1373350637, 1373350637, 4, NULL),
(1373350710, 1373350710, 1, 1),
(1373350710, 1373350710, 2, 1),
(1373350710, 1373350710, 4, 1),
(1373350877, 1373350877, 1, 1),
(1373350877, 1373350877, 2, 1),
(1373351112, 1373351112, 2, 1),
(1373351133, 1373351133, 4, 1),
(1373351133, 1373351133, 4, 3);

-- --------------------------------------------------------

--
-- Table structure for table `product`
--

CREATE TABLE IF NOT EXISTS `product` (
  `id` int(11) NOT NULL,
  `name` varchar(100) NOT NULL,
  `price` float NOT NULL,
  `pic` varchar(256) NOT NULL,
  `category_id` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `product`
--

INSERT INTO `product` (`id`, `name`, `price`, `pic`, `category_id`) VALUES
(1, '鱼丸砂锅面', 10, 'p1.jpeg', 1),
(2, '大肉砂锅面', 13, 'p2.jpeg', 1),
(3, '素砂锅面', 8, 'p3.jpeg', 1),
(4, '雪碧', 1.5, 'xb.jpg', 3),
(5, '可乐', 1.5, 'kl.jpg', 3),
(6, '紫菜蛋花汤', 5, 'p6.jpg', 4);

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
