-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1:3306
-- Generation Time: Oct 11, 2023 at 01:56 PM
-- Server version: 5.7.36
-- PHP Version: 7.4.26

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `printly`
--

-- --------------------------------------------------------

--
-- Table structure for table `acceptorders`
--

DROP TABLE IF EXISTS `acceptorders`;
CREATE TABLE IF NOT EXISTS `acceptorders` (
  `id` int(255) NOT NULL AUTO_INCREMENT,
  `orderid` int(255) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `admins`
--

DROP TABLE IF EXISTS `admins`;
CREATE TABLE IF NOT EXISTS `admins` (
  `username` varchar(30) NOT NULL,
  `password` varchar(30) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `admins`
--

INSERT INTO `admins` (`username`, `password`) VALUES
('amersawan', 'ameramersawan'),
('nabilsawan', 'nabilnabilsawan'),
('tareqsawan', 'tareqtareqsawan');

-- --------------------------------------------------------

--
-- Table structure for table `archive`
--

DROP TABLE IF EXISTS `archive`;
CREATE TABLE IF NOT EXISTS `archive` (
  `aid` int(255) NOT NULL,
  `image` varchar(255) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `archive`
--

INSERT INTO `archive` (`aid`, `image`) VALUES
(903891388, 'uploads/17000342.jpg'),
(1593586069, 'uploads/17000342.jpg');

-- --------------------------------------------------------

--
-- Table structure for table `kids`
--

DROP TABLE IF EXISTS `kids`;
CREATE TABLE IF NOT EXISTS `kids` (
  `uniq` int(255) NOT NULL,
  `kname` varchar(255) NOT NULL,
  `price` int(255) NOT NULL,
  `image` varchar(255) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `kids`
--

INSERT INTO `kids` (`uniq`, `kname`, `price`, `image`) VALUES
(697976947, 'shirt', 25000, 'uploads/17000342.jpg'),
(1565407091, 'new', 1222, 'uploads/17a6e4f616cc9bff4b8a76b2f1f27bba.jpg'),
(716423315, 'new', 12235, 'uploads/thumb-1920-609249.jpg');

-- --------------------------------------------------------

--
-- Table structure for table `men`
--

DROP TABLE IF EXISTS `men`;
CREATE TABLE IF NOT EXISTS `men` (
  `mid` int(255) NOT NULL,
  `mname` varchar(255) NOT NULL,
  `price` int(255) NOT NULL,
  `image` varchar(255) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `men`
--

INSERT INTO `men` (`mid`, `mname`, `price`, `image`) VALUES
(648138072, 'sad', 6000, 'uploads/682670.jpg'),
(287465593, 'moussa moussa', 6000, 'uploads/17a6e4f616cc9bff4b8a76b2f1f27bba.jpg');

-- --------------------------------------------------------

--
-- Table structure for table `orders`
--

DROP TABLE IF EXISTS `orders`;
CREATE TABLE IF NOT EXISTS `orders` (
  `id` int(255) NOT NULL AUTO_INCREMENT,
  `user_id` int(255) NOT NULL,
  `product_id` int(255) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=53 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `orders`
--

INSERT INTO `orders` (`id`, `user_id`, `product_id`) VALUES
(34, 925786479, 1335347837),
(33, 925786479, 648138072),
(32, 925786479, 648138072),
(4, 776787465, 0),
(5, 272928218, 0),
(6, 272928218, 522055858),
(7, 272928218, 0),
(22, 272928218, 0),
(9, 272928218, 0),
(10, 272928218, 0),
(11, 272928218, 0),
(12, 272928218, 0),
(13, 272928218, 0),
(14, 272928218, 0),
(15, 272928218, 0),
(16, 272928218, 0),
(17, 272928218, 0),
(18, 272928218, 0),
(19, 272928218, 0),
(20, 272928218, 0),
(21, 272928218, 0),
(29, 272928218, 648138072),
(31, 272928218, 1335347837),
(35, 925786479, 1335347837),
(36, 1648408298, 648138072),
(37, 1648408298, 1565407091),
(38, 1648408298, 1565407091),
(39, 335776250, 1565407091),
(40, 335776250, 716423315),
(42, 927101766, 697976947),
(43, 927101766, 648138072),
(44, 927101766, 1335347837);

-- --------------------------------------------------------

--
-- Table structure for table `products`
--

DROP TABLE IF EXISTS `products`;
CREATE TABLE IF NOT EXISTS `products` (
  `name` varchar(255) NOT NULL,
  `price` int(255) NOT NULL,
  `image` varchar(255) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `products`
--

INSERT INTO `products` (`name`, `price`, `image`) VALUES
('moussa moussa', 0, 'uploads/17000342.jpg'),
('amer', 0, 'uploads/1809395.jpg'),
('hat', 2500, 'uploads/thumb-1920-609249.jpg');

-- --------------------------------------------------------

--
-- Table structure for table `request`
--

DROP TABLE IF EXISTS `request`;
CREATE TABLE IF NOT EXISTS `request` (
  `id` int(255) NOT NULL AUTO_INCREMENT,
  `uniqid` int(255) NOT NULL,
  `type` varchar(255) NOT NULL,
  `size` varchar(255) NOT NULL,
  `color` varchar(255) NOT NULL,
  `notes` varchar(255) NOT NULL,
  `image` varchar(255) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=25 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `request`
--

INSERT INTO `request` (`id`, `uniqid`, `type`, `size`, `color`, `notes`, `image`) VALUES
(12, 667685710, 't shirt', 'x large', 'red', '', 'uploads/17000342.jpg'),
(11, 1494798944, 't shirt', 'small', 'red', '', 'uploads/17000342.jpg'),
(8, 927101766, 't shirt', 'x large', 'red ', '', 'uploads/17000342.jpg'),
(17, 925786479, 'shoe', 'small', 'purple', '', 'uploads/1691682.jpg'),
(14, 776787465, 't shirt', 'large', 'red', '', 'uploads/17000342.jpg'),
(16, 925786479, 'hat', 'large', 'red', '', 'uploads/1691682.jpg'),
(18, 410278241, 't shirt', 'x large', 'red', '', 'uploads/17a6e4f616cc9bff4b8a76b2f1f27bba.jpg'),
(19, 927101766, 't shirt', 'x large', 'red', '', 'uploads/682670.jpg'),
(20, 927101766, 't shirt', 'x large', 'red', '', 'uploads/682670.jpg'),
(21, 927101766, 't shirt', 'x large', 'red', '', 'uploads/682670.jpg'),
(22, 927101766, 't shirt', 'x large', 'red', '', 'uploads/682670.jpg'),
(23, 927101766, 'hat', 'x', 'blue', 'blah sduuabd', 'uploads/17000342.jpg'),
(24, 272928218, 'hat', 'large', 'red', 'sdad', 'uploads/photo_2022-09-04_18-27-05.jpg');

-- --------------------------------------------------------

--
-- Table structure for table `signup`
--

DROP TABLE IF EXISTS `signup`;
CREATE TABLE IF NOT EXISTS `signup` (
  `unid` int(255) NOT NULL,
  `name` varchar(20) NOT NULL,
  `number` int(255) NOT NULL,
  `pass` varchar(50) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `signup`
--

INSERT INTO `signup` (`unid`, `name`, `number`, `pass`) VALUES
(927101766, 'nghm', 0, 'nghm123'),
(700666811, 'eman', 944420789, 'eman123'),
(667685710, 'anna', 99423135, 'annakendrick'),
(776787465, 'deacon', 9232321, 'fuckthisworld'),
(272928218, 'amer', 994637925, 'amer123'),
(925786479, 'tareq', 93232321, 'tareq123'),
(1648408298, 'samer', 992313123, 'samer123'),
(1530737792, 'alma', 923123, 'alma123'),
(431087798, 'amersaw', 944232, 'amersa'),
(927413749, 'amernabil', 21312, '23123'),
(569055134, 'amernasd', 21312, 'amersaz');

-- --------------------------------------------------------

--
-- Table structure for table `women`
--

DROP TABLE IF EXISTS `women`;
CREATE TABLE IF NOT EXISTS `women` (
  `wid` int(255) NOT NULL,
  `wname` varchar(255) NOT NULL,
  `price` int(255) NOT NULL,
  `image` varchar(255) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `women`
--

INSERT INTO `women` (`wid`, `wname`, `price`, `image`) VALUES
(1335347837, 'string', 2500, 'uploads/17000342.jpg');
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
