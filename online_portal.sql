-- phpMyAdmin SQL Dump
-- version 4.8.2
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1:3300
-- Generation Time: Jan 09, 2019 at 06:57 PM
-- Server version: 5.5.60-log
-- PHP Version: 7.2.7

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `online_portal`
--

-- --------------------------------------------------------

--
-- Table structure for table `author`
--

CREATE TABLE `author` (
  `product_id` int(11) DEFAULT NULL,
  `author` char(30) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `author`
--

INSERT INTO `author` (`product_id`, `author`) VALUES
(6, 'tandon'),
(6, 'safis'),
(15, 'A'),
(15, 'A'),
(15, 'A'),
(15, 'A');

-- --------------------------------------------------------

--
-- Table structure for table `book`
--

CREATE TABLE `book` (
  `product_id` int(11) DEFAULT NULL,
  `name` char(30) DEFAULT NULL,
  `expected_price` char(20) DEFAULT NULL,
  `cond` char(10) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `book`
--

INSERT INTO `book` (`product_id`, `name`, `expected_price`, `cond`) VALUES
(6, 'optandon', '1500', 'average'),
(6, 'optandon', '1500', 'average'),
(15, 'AA', '20000', 'good');

-- --------------------------------------------------------

--
-- Table structure for table `laptop`
--

CREATE TABLE `laptop` (
  `product_id` int(11) DEFAULT NULL,
  `manufacturer` char(30) DEFAULT NULL,
  `model_name` char(30) DEFAULT NULL,
  `year_of_purchase` year(4) DEFAULT NULL,
  `battery_status` char(30) DEFAULT NULL,
  `expected_price` char(10) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `laptop`
--

INSERT INTO `laptop` (`product_id`, `manufacturer`, `model_name`, `year_of_purchase`, `battery_status`, `expected_price`) VALUES
(5, 'dell', 'd1', 2000, 'no back up', '3000');

-- --------------------------------------------------------

--
-- Table structure for table `message`
--

CREATE TABLE `message` (
  `sno` int(11) NOT NULL,
  `price` char(20) NOT NULL,
  `product_id` int(11) DEFAULT NULL,
  `buyer_id` char(30) DEFAULT NULL,
  `name` char(30) DEFAULT NULL,
  `email_id` char(40) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `message`
--

INSERT INTO `message` (`sno`, `price`, `product_id`, `buyer_id`, `name`, `email_id`) VALUES
(5, '2000', 5, 'f160747cs', 'jagadeesh chedurupally', 'jagadeesh@gmail.com'),
(6, '200', 1, 'b160865cs', 'lingamaneni divya', 'lingamanenidivya369@gmail.com'),
(7, '2500', 1, 'b160865cs', 'bharath', 'bharath@gmail.com'),
(8, '2000', 5, 'f160747cs', 'jagadeesh chedurupally', 'jagadeesh@gmail.com'),
(9, '2500', 1, 'b160865cs', 'bharath', 'bharath@gmail.com'),
(10, '2000', 5, 'f160747cs', 'jagadeesh chedurupally', 'jagadeesh@gmail.com'),
(12, '1000', 6, 's160665cs', 'jagadeesh chedurupally', 'jagadeesh@gmail.com'),
(13, '2300', 2, 'b160668cs', 'ALLU SAI PRUDHVI', 'allusaiprudhvi111@gmail.com'),
(14, 'gj;kg', 2, 'b160865cs', 'jhg', 'gj;g;'),
(15, 'gj;kg', 2, 'b160865cs', 'jhg', 'gj;g;'),
(16, 'gj;kg', 2, 'b160865cs', 'jhg', 'gj;g;'),
(18, '0', 5, 'b160865cs', 'hi', 'allu'),
(19, '', 5, 'b160865cs', '', 'allusaiprudhvi111@gmail.com'),
(20, '100', 5, 'B160865CS', 'ALLU SAI PRUDHVI', 'allusaiprudhvi111@gmail.com'),
(21, 'saa', 5, 'B160865CS', 'sda', 'allusaiprudhvi111@gmail.com'),
(22, '0', 5, 'B160865CS', 'sai', 'allusaiprudhvi111@gmail.com');

-- --------------------------------------------------------

--
-- Table structure for table `mobile_phone`
--

CREATE TABLE `mobile_phone` (
  `product_id` int(11) DEFAULT NULL,
  `manufacturer` char(20) DEFAULT NULL,
  `model_name` char(20) DEFAULT NULL,
  `year_of_purchase` year(4) DEFAULT NULL,
  `expected_price` char(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `mobile_phone`
--

INSERT INTO `mobile_phone` (`product_id`, `manufacturer`, `model_name`, `year_of_purchase`, `expected_price`) VALUES
(2, 'vivo', 'v7 plus', 2017, '2500');

-- --------------------------------------------------------

--
-- Table structure for table `phone_numbers`
--

CREATE TABLE `phone_numbers` (
  `sno` int(11) NOT NULL,
  `user_id` char(30) NOT NULL,
  `number` char(20) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `phone_numbers`
--

INSERT INTO `phone_numbers` (`sno`, `user_id`, `number`) VALUES
(1, 'b160865cs', '9533244333'),
(2, 'b160668cs', '9494559090'),
(3, 'b160865cs', '8639290644'),
(4, 's160999cs', '1234567899'),
(5, 's160999cs', '8756672921'),
(6, 's160665cs', '3137357137'),
(7, 's160665cs', '9876543212'),
(8, 'f160747cs', '1305865565');

-- --------------------------------------------------------

--
-- Table structure for table `prod`
--

CREATE TABLE `prod` (
  `sno` int(11) NOT NULL,
  `name` char(100) DEFAULT NULL,
  `place` char(100) DEFAULT NULL,
  `phone_number` char(20) DEFAULT NULL,
  `i1` char(50) DEFAULT NULL,
  `i2` char(50) DEFAULT NULL,
  `i3` char(50) DEFAULT NULL,
  `i4` char(50) DEFAULT NULL,
  `i5` char(50) DEFAULT NULL,
  `i6` char(50) DEFAULT NULL,
  `i7` char(50) DEFAULT NULL,
  `i8` char(50) DEFAULT NULL,
  `i9` char(50) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `prod`
--

INSERT INTO `prod` (`sno`, `name`, `place`, `phone_number`, `i1`, `i2`, `i3`, `i4`, `i5`, `i6`, `i7`, `i8`, `i9`) VALUES
(1, 'ALLU SAI PRUDHVI', '9533244333', 'B-127', '0', '1', '0', '0', '0', '0', '0', '0', '0'),
(2, 'sdasd', 'sdsad', 'asdsad', '1', '0', '0', '0', '0', '0', '0', '0', '0'),
(3, '456', '4', '4466', '0', '1', '0', '0', '0', '0', '0', '0', '0'),
(4, 'n;', 'b', 'hgljl', '1', '1', '1', '1', '0', '0', '1', '1', '1'),
(5, 'sadsd', 'ASFAS', 'SDAS', '1', '0', '0', '0', '0', '0', '0', '0', '0'),
(6, 'sadsd', 'ASFAS', 'SDAS', '1', '0', '0', '0', '0', '0', '0', '0', '0'),
(7, 'klgg', 'glkgl', 'jklgkjg', '1', '1', '1', '1', '0', '0', '1', '1', '1'),
(8, 'klgg', 'glkgl', 'jklgkjg', '1', '1', '1', '1', '0', '0', '1', '1', '1'),
(9, 'zxz', 'zxzc', 'zcc', '1', '0', '0', '0', '0', '0', '0', '0', '0'),
(10, 'zxz', 'zxzc', 'zcc', '1', '0', '0', '0', '0', '0', '0', '0', '0'),
(11, 'hglkh', 'lkhgkgl', 'lkhgkl', '1', '0', '0', '0', '0', '0', '0', '0', '0'),
(12, 'hjHL', 'GLGK', 'GLKGL', '2', '0', '0', '0', '0', '0', '0', '0', '0'),
(13, 'KHLGKL', 'LKHFKL', 'LKGLFH', '0', '0', '0', '0', '0', '0', '0', '0', '0'),
(14, 'KHLGKL', 'LKHFKL', 'LKGLFH', '0', '0', '0', '0', '0', '0', '0', '0', '0'),
(15, 'HGLG', 'GLKLK', 'GLLKG', '1', '1', '1', '1', '0', '0', '1', '1', '1'),
(16, 'JKLG;K', ';G;G', 'G;KG', '2', '0', '0', '0', '0', '0', '0', '0', '0'),
(17, 'JKLG;K', ';G;G', 'G;KG', '2', '0', '0', '0', '0', '0', '0', '0', '0'),
(18, 'HGLG', 'GLKLK', 'GLLKG', '1', '1', '1', '1', '0', '0', '1', '1', '1'),
(19, 'KHLGKL', 'LKHFKL', 'LKGLFH', '0', '0', '0', '0', '0', '0', '0', '0', '0'),
(20, 'KHLGKL', 'LKHFKL', 'LKGLFH', '0', '0', '0', '0', '0', '0', '0', '0', '0'),
(21, 'jkgk', 'kgggk', 'gkgk', '0', '0', '0', '0', '0', '0', '0', '0', '0'),
(22, 'jkgk', 'kgggk', 'gkgk', '0', '0', '0', '0', '0', '0', '0', '0', '0'),
(23, 'hgkg', 'k.ghl', 'hgl', '2', '1', '1', '1', '0', '0', '1', '1', '1'),
(24, 'hi', 'ho', '78', '1', '0', '0', '0', '0', '0', '0', '0', '0'),
(25, 'khgG', 'KG', 'KGK', '1', '0', '0', '0', '0', '0', '0', '0', '0'),
(26, '66', '99', '77', '1', '0', '0', '0', '0', '0', '0', '0', '0');

-- --------------------------------------------------------

--
-- Table structure for table `product`
--

CREATE TABLE `product` (
  `product_id` int(11) NOT NULL,
  `buyer_id` char(30) DEFAULT NULL,
  `seller_id` char(30) NOT NULL,
  `date_of_initiation` date NOT NULL,
  `date_of_expiry` date NOT NULL,
  `product_type` char(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `product`
--

INSERT INTO `product` (`product_id`, `buyer_id`, `seller_id`, `date_of_initiation`, `date_of_expiry`, `product_type`) VALUES
(1, NULL, 'b160865cs', '2017-10-01', '2018-02-02', 'book'),
(2, 'b160865cs', 'b160668cs', '2016-10-10', '2019-10-10', 'mobile'),
(5, NULL, 'f160747cs', '2014-03-03', '2018-01-01', 'laptop'),
(6, 's160999cs', 's160665cs', '2017-01-01', '2018-10-10', 'book'),
(8, NULL, 'b160865cs', '2018-10-03', '2018-10-13', 'laptop'),
(12, NULL, 'b160865cs', '2018-10-03', '2018-10-13', 'mobilephone'),
(13, NULL, 'b160865cs', '2018-11-01', '2018-11-11', 'laptop'),
(15, NULL, 'B160865CS', '2019-01-09', '2019-01-19', 'book');

-- --------------------------------------------------------

--
-- Table structure for table `products`
--

CREATE TABLE `products` (
  `product_id` char(100) NOT NULL,
  `buyer_id` char(30) DEFAULT NULL,
  `seller_id` char(30) NOT NULL,
  `date_of_initiation` date NOT NULL,
  `date_of_expiry` date NOT NULL,
  `product_type` char(30) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `products`
--

INSERT INTO `products` (`product_id`, `buyer_id`, `seller_id`, `date_of_initiation`, `date_of_expiry`, `product_type`) VALUES
('01', NULL, 'b160865cs', '2017-10-01', '2018-02-02', 'book'),
('02', 'b160865cs', 'b160668cs', '2016-10-10', '2019-10-10', 'mobile'),
('03', NULL, 's160999cs', '2017-01-01', '2018-01-01', 'laptop'),
('04', 'b160668cs', 'b160865cs', '2016-01-01', '2019-01-01', 'mobile'),
('05', NULL, 'f160747cs', '2014-03-03', '2018-01-01', 'laptop'),
('06', 's160999cs', 's160665cs', '2017-01-01', '2018-10-10', 'book'),
('10', NULL, 'b160865cs', '2018-10-02', '2018-10-12', 'laptop'),
('7', NULL, 'b160668cs', '2018-10-02', '2018-10-12', 'laptop'),
('8', NULL, 'b160668cs', '2018-10-02', '2018-10-12', 'laptop'),
('9', NULL, 'b160668cs', '2018-10-02', '2018-10-12', 'laptop');

-- --------------------------------------------------------

--
-- Table structure for table `reg`
--

CREATE TABLE `reg` (
  `f1` char(50) DEFAULT NULL,
  `p1` char(30) DEFAULT NULL,
  `f2` char(50) DEFAULT NULL,
  `p2` char(30) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `reg`
--

INSERT INTO `reg` (`f1`, `p1`, `f2`, `p2`) VALUES
('allu', '9533244333', 'divvu', '9494559090'),
('allu', '9533244333', 'divvu', '9494559090'),
('bharath', '546789009876', 'rahul', 'kjhgf'),
('lkjgkjl', 'glkglk', 'lglkl', 'glglgl'),
('hkglgklhgkl', 'lghhlkgl', 'hlglk', 'lkglk'),
('jhlkgg', 'lkglkg', 'glkgk', 'glglg'),
('hjfjHLFJ', '', 'F', 'JLJ'),
('hjfjHLFJ', '', 'F', 'JLJ'),
('hjfjHLFJ', '', 'F', 'JLJ'),
('GLHLG', 'LGHLG', 'HLGJ', 'HGLGL'),
('HJFJ', 'HJJF', 'JFL', 'LF'),
('HJFJ', 'HJJF', 'JFL', 'LF'),
('KGHLGG', 'GHLKG', 'FLJF', 'FLJ');

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE `user` (
  `user_id` char(100) NOT NULL,
  `email_id` char(100) NOT NULL,
  `name` char(30) NOT NULL,
  `user_type` char(20) NOT NULL,
  `password` char(50) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`user_id`, `email_id`, `name`, `user_type`, `password`) VALUES
('asasdasd', 'allusaiprudhvi111@gmail.com', 'sddas', 'faculty', 'HFDSGLFSDGL'),
('b160111ee', 'mahesh@nitc.ac.in', 'mahesh', 'student', 'om'),
('b160349cs', 'botta@gmail.com', 'botta', 'faculty', 'HFDSGLFSDGL'),
('b160668cs', 'lingamanenidivya369@gmail.com', 'lingamaneni divya', 'student', NULL),
('b160745cs', 'hsgdal@gmail.com', 'lam', 'faculty', 'HFDSGLFSDGL'),
('b160755cs', 's@gmail.com', 'kug;kg', 'faculty', 'HFDSGLFSDGL'),
('b160865cs', 'allusaiprudhvi111@gmail.com', 'ALLU SAI PRUDHVI', 'student', 'omshiridisai'),
('b160999cs', 'name@gmail.com', 'name', 'student', 'lkjsdsl'),
('b234234', 'allusaiprudhvi111@gmail.com', 'sd', 'f', 'HFDSGLFSDGL'),
('botta', 'allusaiprudhvi111@gmail.com', 'asdas', 'faculty', 'HFDSGLFSDGL'),
('f160747cs', 'bharath@gmail.com', 'bharath', 'faculty', NULL),
('s160665cs', 'pachipulusuv@gmail.com', 'vineela pachipulusu', 'staff', NULL),
('s160999cs', 'jagadeesh@gmail.com', 'jagadeesh chedurupally', 'staff', NULL);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `author`
--
ALTER TABLE `author`
  ADD KEY `product_id` (`product_id`);

--
-- Indexes for table `book`
--
ALTER TABLE `book`
  ADD KEY `product_id` (`product_id`);

--
-- Indexes for table `laptop`
--
ALTER TABLE `laptop`
  ADD KEY `product_id` (`product_id`);

--
-- Indexes for table `message`
--
ALTER TABLE `message`
  ADD PRIMARY KEY (`sno`),
  ADD KEY `product_id` (`product_id`),
  ADD KEY `buyer_id` (`buyer_id`);

--
-- Indexes for table `mobile_phone`
--
ALTER TABLE `mobile_phone`
  ADD KEY `product_id` (`product_id`);

--
-- Indexes for table `phone_numbers`
--
ALTER TABLE `phone_numbers`
  ADD PRIMARY KEY (`sno`),
  ADD UNIQUE KEY `number` (`number`),
  ADD KEY `user_id` (`user_id`);

--
-- Indexes for table `prod`
--
ALTER TABLE `prod`
  ADD PRIMARY KEY (`sno`);

--
-- Indexes for table `product`
--
ALTER TABLE `product`
  ADD PRIMARY KEY (`product_id`),
  ADD UNIQUE KEY `product_id` (`product_id`),
  ADD KEY `buyer_id` (`buyer_id`),
  ADD KEY `seller_id` (`seller_id`);

--
-- Indexes for table `products`
--
ALTER TABLE `products`
  ADD PRIMARY KEY (`product_id`),
  ADD UNIQUE KEY `product_id` (`product_id`),
  ADD KEY `buyer_id` (`buyer_id`),
  ADD KEY `seller_id` (`seller_id`);

--
-- Indexes for table `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`user_id`),
  ADD UNIQUE KEY `user_id` (`user_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `message`
--
ALTER TABLE `message`
  MODIFY `sno` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=23;

--
-- AUTO_INCREMENT for table `phone_numbers`
--
ALTER TABLE `phone_numbers`
  MODIFY `sno` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `prod`
--
ALTER TABLE `prod`
  MODIFY `sno` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=27;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `author`
--
ALTER TABLE `author`
  ADD CONSTRAINT `author_ibfk_1` FOREIGN KEY (`product_id`) REFERENCES `product` (`product_id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `book`
--
ALTER TABLE `book`
  ADD CONSTRAINT `book_ibfk_1` FOREIGN KEY (`product_id`) REFERENCES `product` (`product_id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `laptop`
--
ALTER TABLE `laptop`
  ADD CONSTRAINT `laptop_ibfk_1` FOREIGN KEY (`product_id`) REFERENCES `product` (`product_id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `message`
--
ALTER TABLE `message`
  ADD CONSTRAINT `message_ibfk_1` FOREIGN KEY (`product_id`) REFERENCES `product` (`product_id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `message_ibfk_2` FOREIGN KEY (`buyer_id`) REFERENCES `user` (`user_id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `mobile_phone`
--
ALTER TABLE `mobile_phone`
  ADD CONSTRAINT `mobile_phone_ibfk_1` FOREIGN KEY (`product_id`) REFERENCES `product` (`product_id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `phone_numbers`
--
ALTER TABLE `phone_numbers`
  ADD CONSTRAINT `phone_numbers_ibfk_1` FOREIGN KEY (`user_id`) REFERENCES `user` (`user_id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `product`
--
ALTER TABLE `product`
  ADD CONSTRAINT `product_ibfk_1` FOREIGN KEY (`buyer_id`) REFERENCES `user` (`user_id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `product_ibfk_2` FOREIGN KEY (`seller_id`) REFERENCES `user` (`user_id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `products`
--
ALTER TABLE `products`
  ADD CONSTRAINT `products_ibfk_1` FOREIGN KEY (`buyer_id`) REFERENCES `user` (`user_id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `products_ibfk_2` FOREIGN KEY (`seller_id`) REFERENCES `user` (`user_id`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
