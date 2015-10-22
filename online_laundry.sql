-- phpMyAdmin SQL Dump
-- version 4.2.7.1
-- http://www.phpmyadmin.net
--
-- Host: localhost
-- Generation Time: Jul 24, 2015 at 04:41 PM
-- Server version: 5.6.20
-- PHP Version: 5.5.15

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `online_laundry`
--

-- --------------------------------------------------------

--
-- Table structure for table `company`
--

CREATE TABLE IF NOT EXISTS `company` (
`c_id` int(11) NOT NULL,
  `c_name` varchar(100) NOT NULL,
  `c_zone` varchar(500) NOT NULL,
  `c_email` varchar(100) NOT NULL,
  `c_phone` text NOT NULL,
  `c_address` text NOT NULL,
  `c_logo` text NOT NULL
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=4 ;

--
-- Dumping data for table `company`
--

INSERT INTO `company` (`c_id`, `c_name`, `c_zone`, `c_email`, `c_phone`, `c_address`, `c_logo`) VALUES
(2, 'Go cleanup', 'uttora', 'zufapagiw@gmail.com', '+591-55-6874723', 'house-112,road-4,sector-4,uttora,dhaka', 'd1eb5ef54dbf4baa1ff90e8dae830e6c.jpg'),
(3, 'JM pressuse washing', 'dhanmondi', 'pujod@gmail.com', '+651-60-4340505', 'house-23,road-113,mohammadpur,dhaka-1207', '53b93a84bd4bbddf5a9bc072b923ad84.png');

-- --------------------------------------------------------

--
-- Table structure for table `company_services`
--

CREATE TABLE IF NOT EXISTS `company_services` (
`s_id` int(11) NOT NULL,
  `c_id` int(11) NOT NULL,
  `s_name` varchar(500) NOT NULL,
  `s_cost` varchar(100) NOT NULL
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=17 ;

--
-- Dumping data for table `company_services`
--

INSERT INTO `company_services` (`s_id`, `c_id`, `s_name`, `s_cost`) VALUES
(3, 4, 'sofa caution', '100'),
(4, 4, 'bed cover', '130'),
(5, 4, 'caution cleaning(per piece)', '100'),
(7, 5, 'BED COVER(PER)', '120'),
(8, 1, 'carpet(per)', '20'),
(9, 1, 'lagguge(per)', '200'),
(10, 1, 'sofa caution(per)', '100'),
(11, 1, 'bed cover(per)', '200'),
(12, 2, 'bed cover(per)', '200'),
(13, 2, 'pellow(per)', '100'),
(14, 3, 't-shirt', '113'),
(15, 3, 'jeans', '200'),
(16, 3, 'blazer', '400');

-- --------------------------------------------------------

--
-- Table structure for table `complain`
--

CREATE TABLE IF NOT EXISTS `complain` (
`complain_id` int(11) NOT NULL,
  `u_id` int(11) NOT NULL,
  `complain_date` varchar(100) NOT NULL,
  `complain` text NOT NULL,
  `complain_read` int(11) NOT NULL DEFAULT '1'
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Table structure for table `orders`
--

CREATE TABLE IF NOT EXISTS `orders` (
`o_id` int(11) NOT NULL,
  `c_id` int(11) NOT NULL,
  `u_id` int(11) NOT NULL,
  `o_date` varchar(100) NOT NULL,
  `p_date` varchar(100) NOT NULL,
  `p_time` varchar(100) NOT NULL,
  `d_date` varchar(100) NOT NULL,
  `d_time` varchar(100) NOT NULL,
  `o_services` text NOT NULL,
  `o_amount` int(11) NOT NULL,
  `o_read` int(11) NOT NULL DEFAULT '1'
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=4 ;

--
-- Dumping data for table `orders`
--

INSERT INTO `orders` (`o_id`, `c_id`, `u_id`, `o_date`, `p_date`, `p_time`, `d_date`, `d_time`, `o_services`, `o_amount`, `o_read`) VALUES
(2, 2, 2, '23-07-2015', '25/07/2015', '15:00', '27/07/2015', '16:00', '{"0":"{\\"key\\":0,\\"amount\\":1,\\"service\\":\\"bed cover(per)\\",\\"price\\":200}","1":"{\\"key\\":1,\\"amount\\":2,\\"service\\":\\"pellow(per)\\",\\"price\\":100}"}', 450, 0),
(3, 3, 2, '23-07-2015', '24/07/2015', '21:00', '27/07/2015', '21:00', '{"0":"{\\"key\\":0,\\"amount\\":1,\\"service\\":\\"t-shirt\\",\\"price\\":113}","1":"{\\"key\\":1,\\"amount\\":2,\\"service\\":\\"jeans\\",\\"price\\":200}"}', 563, 0);

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE IF NOT EXISTS `user` (
`u_id` int(11) NOT NULL,
  `u_email` varchar(100) NOT NULL,
  `u_password` varchar(100) NOT NULL,
  `u_fullname` varchar(100) NOT NULL,
  `u_phone` int(11) NOT NULL,
  `u_address` text NOT NULL
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=3 ;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`u_id`, `u_email`, `u_password`, `u_fullname`, `u_phone`, `u_address`) VALUES
(2, 'abdullah017196@gmail.com', '123456', 'ali abdullah khan', 1677408411, 'house-112,road-4,mohammadi housing limited,mohammadpur,dhaka-1207');

-- --------------------------------------------------------

--
-- Table structure for table `vote`
--

CREATE TABLE IF NOT EXISTS `vote` (
`v_id` int(11) NOT NULL,
  `u_id` int(11) NOT NULL,
  `c_rate` int(11) NOT NULL,
  `v_date` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

--
-- Indexes for dumped tables
--

--
-- Indexes for table `company`
--
ALTER TABLE `company`
 ADD PRIMARY KEY (`c_id`);

--
-- Indexes for table `company_services`
--
ALTER TABLE `company_services`
 ADD PRIMARY KEY (`s_id`);

--
-- Indexes for table `complain`
--
ALTER TABLE `complain`
 ADD PRIMARY KEY (`complain_id`);

--
-- Indexes for table `orders`
--
ALTER TABLE `orders`
 ADD PRIMARY KEY (`o_id`);

--
-- Indexes for table `user`
--
ALTER TABLE `user`
 ADD PRIMARY KEY (`u_id`);

--
-- Indexes for table `vote`
--
ALTER TABLE `vote`
 ADD PRIMARY KEY (`v_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `company`
--
ALTER TABLE `company`
MODIFY `c_id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=4;
--
-- AUTO_INCREMENT for table `company_services`
--
ALTER TABLE `company_services`
MODIFY `s_id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=17;
--
-- AUTO_INCREMENT for table `complain`
--
ALTER TABLE `complain`
MODIFY `complain_id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `orders`
--
ALTER TABLE `orders`
MODIFY `o_id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=4;
--
-- AUTO_INCREMENT for table `user`
--
ALTER TABLE `user`
MODIFY `u_id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=3;
--
-- AUTO_INCREMENT for table `vote`
--
ALTER TABLE `vote`
MODIFY `v_id` int(11) NOT NULL AUTO_INCREMENT;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
