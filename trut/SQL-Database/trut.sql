-- phpMyAdmin SQL Dump
-- version 4.8.5
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1:3306
-- Generation Time: Jan 22, 2020 at 10:58 PM
-- Server version: 5.7.26
-- PHP Version: 7.2.18

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `trut`
--

-- --------------------------------------------------------

--
-- Table structure for table `addresses`
--

DROP TABLE IF EXISTS `addresses`;
CREATE TABLE IF NOT EXISTS `addresses` (
  `address_id` int(3) NOT NULL AUTO_INCREMENT,
  `country` varchar(100) NOT NULL,
  `city` varchar(50) NOT NULL,
  `location` varchar(50) NOT NULL,
  `street` varchar(100) NOT NULL,
  `building` varchar(100) NOT NULL,
  `customer_id` varchar(100) NOT NULL,
  PRIMARY KEY (`address_id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `admin`
--

DROP TABLE IF EXISTS `admin`;
CREATE TABLE IF NOT EXISTS `admin` (
  `admin_id` int(3) NOT NULL AUTO_INCREMENT,
  `admin_email` varchar(100) NOT NULL,
  `admin_password` varchar(50) NOT NULL,
  `fullname` varchar(50) NOT NULL,
  `admin_image` varchar(255) NOT NULL,
  PRIMARY KEY (`admin_id`)
) ENGINE=MyISAM AUTO_INCREMENT=12 DEFAULT CHARSET=utf8;

--
-- Dumping data for table `admin`
--

INSERT INTO `admin` (`admin_id`, `admin_email`, `admin_password`, `fullname`, `admin_image`) VALUES
(7, 'aaa@bbb.com', '1234', 'qwertyuio', 'Lighthouse.jpg'),
(8, 't@b.com', '1234', 'edfghjkl', 'Desert.jpg');

-- --------------------------------------------------------

--
-- Table structure for table `category`
--

DROP TABLE IF EXISTS `category`;
CREATE TABLE IF NOT EXISTS `category` (
  `cat_id` int(3) NOT NULL AUTO_INCREMENT,
  `cat_name` varchar(100) NOT NULL,
  `cat_image` varchar(255) NOT NULL,
  PRIMARY KEY (`cat_id`)
) ENGINE=MyISAM AUTO_INCREMENT=16 DEFAULT CHARSET=utf8;

--
-- Dumping data for table `category`
--

INSERT INTO `category` (`cat_id`, `cat_name`, `cat_image`) VALUES
(12, 'clothes', 'clothes.jpg'),
(10, 'Smartphones', 'smartphones.jpg'),
(11, 'cameras', 'cameras.jpg'),
(13, 'laptops', 'laptops.jpg'),
(14, 'foods', 'foods.jpg');

-- --------------------------------------------------------

--
-- Table structure for table `customer`
--

DROP TABLE IF EXISTS `customer`;
CREATE TABLE IF NOT EXISTS `customer` (
  `customer_id` int(3) NOT NULL AUTO_INCREMENT,
  `name` varchar(100) NOT NULL,
  `email` varchar(100) NOT NULL,
  `password` varchar(100) NOT NULL,
  `mobile` varchar(100) NOT NULL,
  `country` varchar(255) NOT NULL,
  `address` varchar(255) NOT NULL,
  `city` varchar(255) NOT NULL,
  PRIMARY KEY (`customer_id`)
) ENGINE=MyISAM AUTO_INCREMENT=20 DEFAULT CHARSET=utf8;

--
-- Dumping data for table `customer`
--

INSERT INTO `customer` (`customer_id`, `name`, `email`, `password`, `mobile`, `country`, `address`, `city`) VALUES
(16, 'jj', 'g@b.com', '123', '078', '', 'amman', 'jghj'),
(17, 'jafar', 'rama@s.com', '123', '987654345678', '', 'amman', 'amman');

-- --------------------------------------------------------

--
-- Table structure for table `deal`
--

DROP TABLE IF EXISTS `deal`;
CREATE TABLE IF NOT EXISTS `deal` (
  `deal_id` int(50) NOT NULL AUTO_INCREMENT,
  `product_id` int(50) NOT NULL,
  `customer_id` int(50) NOT NULL,
  `provider_id` int(50) NOT NULL,
  `price` varchar(50) NOT NULL,
  PRIMARY KEY (`deal_id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `offers`
--

DROP TABLE IF EXISTS `offers`;
CREATE TABLE IF NOT EXISTS `offers` (
  `offer_id` int(4) NOT NULL AUTO_INCREMENT,
  `product_name` varchar(255) NOT NULL,
  `cat_id` int(4) NOT NULL,
  `description` text NOT NULL,
  `customer_id` int(50) NOT NULL,
  `price` varchar(50) NOT NULL,
  `prvider_id` int(50) NOT NULL,
  PRIMARY KEY (`offer_id`)
) ENGINE=MyISAM AUTO_INCREMENT=7 DEFAULT CHARSET=utf8;

--
-- Dumping data for table `offers`
--

INSERT INTO `offers` (`offer_id`, `product_name`, `cat_id`, `description`, `customer_id`, `price`, `prvider_id`) VALUES
(6, 'borgar ', 14, 'medum', 17, '50$', 1),
(4, 'canon', 11, '710', 16, '545', 1),
(5, 'fxhgfttyu', 12, 'yyufyvhvu', 16, '500', 1);

-- --------------------------------------------------------

--
-- Table structure for table `orders`
--

DROP TABLE IF EXISTS `orders`;
CREATE TABLE IF NOT EXISTS `orders` (
  `order_id` int(3) NOT NULL AUTO_INCREMENT,
  `order_date` date NOT NULL,
  `customer_id` int(3) NOT NULL,
  `address_id` int(3) NOT NULL,
  PRIMARY KEY (`order_id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `order_details`
--

DROP TABLE IF EXISTS `order_details`;
CREATE TABLE IF NOT EXISTS `order_details` (
  `order_details_id` int(3) NOT NULL AUTO_INCREMENT,
  `order_id` int(3) NOT NULL,
  `product_id` int(3) NOT NULL,
  `qty` varchar(100) NOT NULL,
  `total_price` varchar(100) NOT NULL,
  `payment_method` varchar(100) NOT NULL,
  `card_name` varchar(100) NOT NULL,
  `card_number` int(100) NOT NULL,
  `vcc` varchar(15) NOT NULL,
  PRIMARY KEY (`order_details_id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `product`
--

DROP TABLE IF EXISTS `product`;
CREATE TABLE IF NOT EXISTS `product` (
  `product_id` int(3) NOT NULL AUTO_INCREMENT,
  `product_name` varchar(100) NOT NULL,
  `product_price` varchar(100) NOT NULL,
  `product_desc` varchar(100) NOT NULL,
  `cat_id` int(3) NOT NULL,
  `product_image` varchar(255) NOT NULL,
  PRIMARY KEY (`product_id`)
) ENGINE=MyISAM AUTO_INCREMENT=32 DEFAULT CHARSET=utf8;

--
-- Dumping data for table `product`
--

INSERT INTO `product` (`product_id`, `product_name`, `product_price`, `product_desc`, `cat_id`, `product_image`) VALUES
(31, 'sony', '78', 'iuytrertyuiop', 10, 'product_1.jpg'),
(30, 'oppo', '400', 'blue', 10, 'oppo.cms'),
(29, 'huawei', '678', 'p 30 pro', 10, 'huawei.jpg'),
(27, 'samsung', '667', 'note 10 plus', 10, 'samsung.jpg'),
(25, 'iphonex', '999', 'gold', 10, 'iphonx.jpg');

-- --------------------------------------------------------

--
-- Table structure for table `product_images`
--

DROP TABLE IF EXISTS `product_images`;
CREATE TABLE IF NOT EXISTS `product_images` (
  `image_id` int(3) NOT NULL AUTO_INCREMENT,
  `product_id` int(3) NOT NULL,
  `product_image` varchar(250) NOT NULL,
  UNIQUE KEY `image` (`image_id`)
) ENGINE=MyISAM AUTO_INCREMENT=7 DEFAULT CHARSET=utf8;

--
-- Dumping data for table `product_images`
--

INSERT INTO `product_images` (`image_id`, `product_id`, `product_image`) VALUES
(6, 25, 'cart_1.jpg'),
(5, 25, 'details_3.jpg'),
(4, 25, 'product_1.jpg');

-- --------------------------------------------------------

--
-- Table structure for table `providers`
--

DROP TABLE IF EXISTS `providers`;
CREATE TABLE IF NOT EXISTS `providers` (
  `prvider_id` int(4) NOT NULL AUTO_INCREMENT,
  `name` text NOT NULL,
  `email` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `mobile` int(255) NOT NULL,
  `country` varchar(255) NOT NULL,
  `address` varchar(255) NOT NULL,
  `city` varchar(255) NOT NULL,
  PRIMARY KEY (`prvider_id`)
) ENGINE=MyISAM AUTO_INCREMENT=3 DEFAULT CHARSET=utf8;

--
-- Dumping data for table `providers`
--

INSERT INTO `providers` (`prvider_id`, `name`, `email`, `password`, `mobile`, `country`, `address`, `city`) VALUES
(1, 'truted', 'truted@g.com', '1', 23456789, '', 'amman', 'amman'),
(2, 'oiuytgfghjkl', 's@s.com', '123', 3456789, '', 'jhytrtyui', 'uytrtyuio');
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
