-- phpMyAdmin SQL Dump
-- version 4.0.10deb1
-- http://www.phpmyadmin.net
--
-- Host: localhost
-- Generation Time: Mar 25, 2018 at 02:24 AM
-- Server version: 5.5.38-0ubuntu0.14.04.1
-- PHP Version: 5.5.9-1ubuntu4.5

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `integravita`
--

-- --------------------------------------------------------

--
-- Table structure for table `ashu`
--

CREATE TABLE IF NOT EXISTS `ashu` (
  `medicine_name` varchar(255) DEFAULT NULL,
  `quantity` int(11) DEFAULT NULL,
  `price` float DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `ashu2`
--

CREATE TABLE IF NOT EXISTS `ashu2` (
  `medicine_name` varchar(255) DEFAULT NULL,
  `quantity` int(11) DEFAULT NULL,
  `price` float DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `blood_bank`
--

CREATE TABLE IF NOT EXISTS `blood_bank` (
  `bank_id` int(11) NOT NULL AUTO_INCREMENT,
  `username` varchar(255) NOT NULL,
  `bank_name` varchar(255) NOT NULL,
  `address` varchar(255) NOT NULL,
  `contact` varchar(15) NOT NULL,
  `lat` float(10,6) NOT NULL,
  `lng` float(10,6) NOT NULL,
  `Ap` int(11) NOT NULL,
  `An` int(11) NOT NULL,
  `ABp` int(11) NOT NULL,
  `ABn` int(11) NOT NULL,
  `Op` int(11) NOT NULL,
  `On` int(11) NOT NULL,
  `Bp` int(11) NOT NULL,
  `Bn` int(11) NOT NULL,
  PRIMARY KEY (`bank_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=6 ;

--
-- Dumping data for table `blood_bank`
--

INSERT INTO `blood_bank` (`bank_id`, `username`, `bank_name`, `address`, `contact`, `lat`, `lng`, `Ap`, `An`, `ABp`, `ABn`, `Op`, `On`, `Bp`, `Bn`) VALUES
(1, 'user17', 'RADHE SHYAM BB', ' PO Nag Nagar Chanchani Colony Dhanbad, Jharkhand 826004 ', '9898765432', 23.825512, 86.435455, 1, 2, 3, 4, 5, 6, 7, 8),
(2, 'user18', 'NITIN BB', 'Barwaada Rd, Dhaiya, Dhanbad, Jharkhand 826004', '9876543211', 23.825092, 86.435730, 8, 7, 4, 5, 6, 1, 2, 3),
(3, 'user19', 'CALL ME BB', 'Rahargora Rd, Chanchani Colony, Dhanbad, Jharkhand 826004', '9287345678', 23.825092, 86.435730, 9, 8, 14, 23, 10, 0, 2, 2),
(4, 'user20', 'LCI BB', ' Jharudih\r\nDhanbad, Jharkhand 826001 ', '8767545632', 23.815475, 86.433617, 2, 4, 8, 16, 32, 64, 0, 0),
(5, 'user21', 'RAJDHANI BB', 'Dhaiya, Dhanbad, Jharkhand 826004', '9685746322', 23.814812, 86.429314, 7, 11, 17, 19, 23, 17, 0, 5);

-- --------------------------------------------------------

--
-- Table structure for table `dfdsfds`
--

CREATE TABLE IF NOT EXISTS `dfdsfds` (
  `medicine_name` varchar(255) DEFAULT NULL,
  `quantity` int(11) DEFAULT NULL,
  `price` float DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `diagnosis`
--

CREATE TABLE IF NOT EXISTS `diagnosis` (
  `dia_id` int(11) NOT NULL AUTO_INCREMENT,
  `username` varchar(255) NOT NULL,
  `dia_name` varchar(255) NOT NULL,
  `address` varchar(255) NOT NULL,
  `contact` varchar(15) NOT NULL,
  `lat` float(10,6) NOT NULL,
  `lng` float(10,6) NOT NULL,
  `test_type` varchar(255) NOT NULL,
  PRIMARY KEY (`dia_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=6 ;

--
-- Dumping data for table `diagnosis`
--

INSERT INTO `diagnosis` (`dia_id`, `username`, `dia_name`, `address`, `contact`, `lat`, `lng`, `test_type`) VALUES
(1, 'user22', 'RADHE SHYAM TC', ' PO Nag Nagar Chanchani Colony Dhanbad, Jharkhand 826004 ', '9898765432', 23.825512, 86.435455, 'urine test'),
(2, 'user23', 'NITIN TC', 'Barwaada Rd, Dhaiya, Dhanbad, Jharkhand 826004', '9876543211', 23.825092, 86.435730, 'blood test'),
(3, 'user24', 'CALL ME TC', 'Rahargora Rd, Chanchani Colony, Dhanbad, Jharkhand 826004', '9287345678', 23.825092, 86.435730, 'x-ray'),
(4, 'user25', 'LCI TC', ' Jharudih\r\nDhanbad, Jharkhand 826001 ', '8767545632', 23.815475, 85.435135, 'x-ray'),
(5, 'user26', 'RAJDHANI TC', 'Dhaiya, Dhanbad, Jharkhand 826004', '9685746322', 23.814812, 83.429314, 'CT scan');

-- --------------------------------------------------------

--
-- Table structure for table `doctor`
--

CREATE TABLE IF NOT EXISTS `doctor` (
  `doc_id` int(11) NOT NULL AUTO_INCREMENT,
  `doc_name` varchar(255) NOT NULL,
  `speciality` varchar(255) NOT NULL,
  `contact` varchar(15) NOT NULL,
  `email` varchar(255) NOT NULL,
  `lat` float(10,6) NOT NULL,
  `lng` float(10,6) NOT NULL,
  `username` varchar(255) NOT NULL,
  `address` varchar(255) NOT NULL,
  PRIMARY KEY (`doc_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=7 ;

--
-- Dumping data for table `doctor`
--

INSERT INTO `doctor` (`doc_id`, `doc_name`, `speciality`, `contact`, `email`, `lat`, `lng`, `username`, `address`) VALUES
(1, 'Nitin Jha', 'surgeon', '9876543211', 'nitin@gmail.com', 23.825092, 86.435730, 'user11', 'B.R.M.B Rd, Chanchani Colony, Dhanbad, Jharkhand 826004, India'),
(2, 'Aditya Chaurasia', 'cardiologist', '9287345678', 'adityach@gmail.com', 23.823196, 86.436478, 'user12', 'Ramson Residency, Khatal Rd, Vinay Vihar Colony, Chanchani Colony, Dhanbad, Jharkhand 826004, India'),
(3, 'Piyush Chaudhary', 'physician', '7895638414', 'lcimedicals@gmail.com', 23.815475, 86.433617, 'user13', 'Tundi - Govindpur - Dhanbad Rd, Dhaiya, Dhanbad, Jharkhand 826004, India'),
(4, 'Ram Nath', 'surgeon', '7765038414', 'rajdhanimedi@gmail.com', 23.814812, 86.429314, 'user14', 'Krishna Nagar Road, CIMFR Colony, Dhanbad, Jharkhand 826001, India'),
(5, 'Rituraj Kumar', 'neurologist', '7765038414', 'rituraj@gmail.com', 22.765600, 87.010796, 'user15', 'KSN Hospital Road, Sarenga, West Bengal 722150, India'),
(6, 'Tyrion Lanister', 'physician', '7765038414', 'everyone@gmail.com', 19.138765, 72.866165, 'user16', '4, Jogeshwari - Vikhroli Link Rd, Oberoi Splendor, Jogeshwari East, Mumbai, Maharashtra 400065, India');

-- --------------------------------------------------------

--
-- Table structure for table `login`
--

CREATE TABLE IF NOT EXISTS `login` (
  `username` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `type` varchar(255) NOT NULL,
  PRIMARY KEY (`username`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `login`
--

INSERT INTO `login` (`username`, `password`, `type`) VALUES
('ashu', '147', 'pharmacy_info'),
('ashu2', '147', 'pharmacy_info'),
('dfdsfds', 'dfsdfs', 'pharmacy_info'),
('Rituraj Kumar', 'qwerty', 'doctor'),
('user1', 'qwerty', 'pharmacy_info'),
('user10', 'qwerty', 'pharmacy_info'),
('user11', 'qwerty', 'doctor'),
('user12', 'qwerty', 'doctor'),
('user13', 'qwerty', 'doctor'),
('user14', 'qwerty', 'doctor'),
('user15', 'qwerty', 'doctor'),
('user16', 'qwerty', 'doctor'),
('user17', 'qwerty', 'blood_bank'),
('user18', 'qwerty', 'blood_bank'),
('user19', 'qwerty', 'blood_bank'),
('user2', 'qwerty', 'pharmacy_info'),
('user20', 'qwerty', 'blood_bank'),
('user21', 'qwerty', 'blood_bank'),
('user22', 'qwerty', 'diagonsis'),
('user23', 'qwerty', 'diagonsis'),
('user24', 'qwerty', 'diagonsis'),
('user25', 'qwerty', 'diagonsis'),
('user26', 'qwerty', 'diagonsis'),
('user3', 'qwerty', 'pharmacy_info'),
('user35o', 'vfvf', 'pharmacy_info'),
('user4', 'qwerty', 'pharmacy_info'),
('user5', 'qwerty', 'pharmacy_info'),
('user6', 'qwerty', 'pharmacy_info'),
('user7', 'qwerty', 'pharmacy_info'),
('user8', 'qwerty', 'pharmacy_info'),
('user9', 'qwerty', 'pharmacy_info');

-- --------------------------------------------------------

--
-- Table structure for table `pharmacy_info`
--

CREATE TABLE IF NOT EXISTS `pharmacy_info` (
  `username` varchar(255) NOT NULL,
  `shop_name` varchar(255) NOT NULL,
  `address` varchar(255) NOT NULL,
  `s_contact` varchar(15) NOT NULL,
  `o_contact` varchar(15) NOT NULL,
  `s_email` varchar(255) NOT NULL,
  `owner_name` varchar(255) NOT NULL,
  `lat` float(10,6) NOT NULL,
  `lng` float(10,6) NOT NULL,
  `o_email` varchar(255) NOT NULL,
  PRIMARY KEY (`username`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `pharmacy_info`
--

INSERT INTO `pharmacy_info` (`username`, `shop_name`, `address`, `s_contact`, `o_contact`, `s_email`, `owner_name`, `lat`, `lng`, `o_email`) VALUES
('user1', 'RADHE SHYAM MEDICALS', ' PO Nag Nagar Chanchani Colony Dhanbad, Jharkhand 826004 ', '9898765432', '7765038414', 'radheshyam@gmail.com', 'Piyush Chaudhary', 23.825512, 86.435455, 'radhe@hotmail.com'),
('user10', 'BUGS BUNNIES MEDICALS', 'Pirojshanagar, Hariyali, Mumbai, Maharashtra 400079', '6789123455', '7765038414', 'bugsbunnies@gmail.com', 'Tyrion Lanister', 19.138765, 72.866165, 'buggies@gmail.com'),
('user2', 'Niranjan Medicals', 'Bramdev Chambers, Near Big Bazar, Chanakya Nagar, Dhanbad, Jharkhand 828127', '7201345891', '9875043217', 'nirumed@gmail.com', 'Niranjan Kumawat', 23.823086, 86.447983, 'niru@gmail.com'),
('user3', 'CALL ME MEDICALS', 'Rahargora Rd, Chanchani Colony, Dhanbad, Jharkhand 826004', '9287345678', '9760038414', 'callme@gmail.com', 'Aditya Chaurasia', 22.825092, 86.435730, 'callies@gmail.com'),
('user4', 'LCI MEDICALS', ' Jharudih\r\nDhanbad, Jharkhand 826001 ', '8767545632', '7895638414', 'lcimedicals@gmail.com', 'Piyush Chaudhary', 23.815475, 86.433617, 'lcimeds@gmail.com'),
('user5', 'RAJDHANI MEDICALS', 'Dhaiya, Dhanbad, Jharkhand 826004', '9685746322', '7765038414', 'rajdhanimedi@gmail.com', 'Ram Nath', 23.814812, 86.429314, 'rajdhani@gmail.com'),
('user6', 'SHIVAJI MEDICALS', 'Unnamed Road, Bhuli,, Wassepur, Dhanbad, Jharkhand 828105', '8978675645', '9965038414', 'shivajimedi@gmail.com', 'Shivaji Boss', 23.807775, 86.407616, 'user5@gmail.com@gmail.com'),
('user7', 'HACKFEST MEDICALS', 'ADM Building , Bokaro Steel City, Bokaro Steel City, Jharkhand 8003702', '9182736466', '7654038414', 'hackfestmedi@gmail.com', 'Ritvij Aib', 23.665094, 86.100281, 'wearethebest@gmail.com'),
('user8', 'RAJ MEDICALS', 'Sarenga, West Bengal 722150', '9499442222', '7765038414', 'rajmedi@gmail.com', 'Raj Gupta', 22.765600, 87.010796, 'bestiesmeds@gmail.com'),
('user9', 'RITURAJ MEDICALS', 'NH116B, Sarenga, West Bengal 722150', '8866655441', '7765038414', 'rituraj@gmail.com', 'Rituraj Kumar', 22.765600, 87.010796, 'shatabdi@gmail.com');

-- --------------------------------------------------------

--
-- Table structure for table `user1`
--

CREATE TABLE IF NOT EXISTS `user1` (
  `medicine_name` varchar(255) NOT NULL,
  `quantity` int(11) NOT NULL,
  `price` float NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `user1`
--

INSERT INTO `user1` (`medicine_name`, `quantity`, `price`) VALUES
('Lipitor', 16, 7),
('Nexium', 69, 6),
('Plavix', 61, 6),
('Advair Diskus', 20, 4),
('Abilify', 61, 4),
('Seroquel', 93, 4),
('Singulair', 77, 4),
('Crestor', 55, 3),
('Actos', 43, 3),
('Epogen', 22, 3),
('crocin', 40, 21),
('paracetamol', 30, 15),
('digene', 50, 15),
('zintac', 14, 10);

-- --------------------------------------------------------

--
-- Table structure for table `user2`
--

CREATE TABLE IF NOT EXISTS `user2` (
  `medicine_name` varchar(255) NOT NULL,
  `quantity` int(11) NOT NULL,
  `price` float NOT NULL,
  PRIMARY KEY (`medicine_name`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `user2`
--

INSERT INTO `user2` (`medicine_name`, `quantity`, `price`) VALUES
('Abilify', 6, 4),
('Actos', 43, 3),
('Advair Diskus', 20, 4),
('Crestor', 55, 3),
('Epogen', 22, 3),
('Lipitor', 45, 7),
('Nexium', 69, 6),
('Plavix', 61, 6),
('Seroquel', 93, 4),
('Singulair', 77, 4);

-- --------------------------------------------------------

--
-- Table structure for table `user3`
--

CREATE TABLE IF NOT EXISTS `user3` (
  `medicine_name` varchar(255) NOT NULL,
  `quantity` int(11) NOT NULL,
  `price` float NOT NULL,
  PRIMARY KEY (`medicine_name`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `user3`
--

INSERT INTO `user3` (`medicine_name`, `quantity`, `price`) VALUES
('Abilify', 21, 4),
('Actos', 875, 40),
('Advair Diskus', 20, 4),
('Crestor', 55, 3),
('Epogen', 22, 3),
('Item Name', 0, 8),
('Lipitor', -10, 8),
('Nexium', 69, 6),
('Plavix', 61, 6),
('Seroquel', 93, 4),
('Singulair', 77, 4),
('torex', 20, 100),
('xyz', 815, 8);

-- --------------------------------------------------------

--
-- Table structure for table `user4`
--

CREATE TABLE IF NOT EXISTS `user4` (
  `medicine_name` varchar(255) NOT NULL,
  `quantity` int(11) NOT NULL,
  `price` float NOT NULL,
  PRIMARY KEY (`medicine_name`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `user4`
--

INSERT INTO `user4` (`medicine_name`, `quantity`, `price`) VALUES
('Abilify', 50, 4),
('Actos', 33, 3),
('Advair Diskus', 20, 4),
('Crestor', 55, 3),
('Epogen', 22, 3),
('Lipitor', 12, 7),
('Nexium', 69, 6),
('Plavix', 61, 6),
('rituraj', 50, 54),
('Seroquel', 93, 4),
('Singulair', 77, 4),
('skfjskdf', 10, 10000);

-- --------------------------------------------------------

--
-- Table structure for table `user5`
--

CREATE TABLE IF NOT EXISTS `user5` (
  `medicine_name` varchar(255) NOT NULL,
  `quantity` int(11) NOT NULL,
  `price` float NOT NULL,
  PRIMARY KEY (`medicine_name`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `user5`
--

INSERT INTO `user5` (`medicine_name`, `quantity`, `price`) VALUES
('Abilify', 19, 4),
('Actos', -2, 3),
('Advair Diskus', 20, 4),
('Crestor', 55, 3),
('Epogen', 22, 3),
('Lipitor', 30, 10),
('Nexium', 69, 6),
('Plavix', 61, 6),
('Seroquel', 93, 4),
('Singulair', 77, 4);

-- --------------------------------------------------------

--
-- Table structure for table `user6`
--

CREATE TABLE IF NOT EXISTS `user6` (
  `medicine_name` varchar(255) NOT NULL,
  `quantity` int(11) NOT NULL,
  `price` float NOT NULL,
  PRIMARY KEY (`medicine_name`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `user6`
--

INSERT INTO `user6` (`medicine_name`, `quantity`, `price`) VALUES
('Abilify', 40, 4),
('Actos', 43, 3),
('Advair Diskus', 20, 4),
('Crestor', 55, 3),
('Epogen', 22, 3),
('Lipitor', 25, 7),
('Nexium', 69, 6),
('Plavix', 61, 6),
('Seroquel', 93, 4),
('Singulair', 77, 4);

-- --------------------------------------------------------

--
-- Table structure for table `user7`
--

CREATE TABLE IF NOT EXISTS `user7` (
  `medicine_name` varchar(255) NOT NULL,
  `quantity` int(11) NOT NULL,
  `price` float NOT NULL,
  PRIMARY KEY (`medicine_name`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `user7`
--

INSERT INTO `user7` (`medicine_name`, `quantity`, `price`) VALUES
('Abilify', 30, 4),
('Actos', 43, 3),
('Advair Diskus', 20, 4),
('Crestor', 55, 3),
('Epogen', 22, 3),
('Lipitor', 19, 7),
('Nexium', 69, 6),
('Plavix', 61, 6),
('Seroquel', 93, 4),
('Singulair', 77, 4);

-- --------------------------------------------------------

--
-- Table structure for table `user8`
--

CREATE TABLE IF NOT EXISTS `user8` (
  `medicine_name` varchar(255) NOT NULL,
  `quantity` int(11) NOT NULL,
  `price` float NOT NULL,
  PRIMARY KEY (`medicine_name`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `user8`
--

INSERT INTO `user8` (`medicine_name`, `quantity`, `price`) VALUES
('Abilify', 50, 4),
('Actos', 43, 3),
('Advair Diskus', 20, 4),
('Crestor', 55, 3),
('Epogen', 22, 3),
('Lipitor', 67, 7),
('Nexium', 69, 6),
('Plavix', 61, 6),
('Seroquel', 93, 4),
('Singulair', 77, 4);

-- --------------------------------------------------------

--
-- Table structure for table `user9`
--

CREATE TABLE IF NOT EXISTS `user9` (
  `medicine_name` varchar(255) NOT NULL,
  `quantity` int(11) NOT NULL,
  `price` float NOT NULL,
  PRIMARY KEY (`medicine_name`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `user9`
--

INSERT INTO `user9` (`medicine_name`, `quantity`, `price`) VALUES
('Abilify', 14, 4),
('Actos', 43, 3),
('Advair Diskus', 20, 4),
('Crestor', 55, 3),
('Epogen', 22, 3),
('Lipitor', 200, 7),
('Nexium', 69, 6),
('Plavix', 61, 6),
('Seroquel', 93, 4),
('Singulair', 77, 4);

-- --------------------------------------------------------

--
-- Table structure for table `user10`
--

CREATE TABLE IF NOT EXISTS `user10` (
  `medicine_name` varchar(255) NOT NULL,
  `quantity` int(11) NOT NULL,
  `price` float NOT NULL,
  PRIMARY KEY (`medicine_name`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `user10`
--

INSERT INTO `user10` (`medicine_name`, `quantity`, `price`) VALUES
('Abilify', 25, 4),
('Actos', 43, 3),
('Advair Diskus', 20, 4),
('Crestor', 55, 3),
('Epogen', 22, 3),
('Lipitor', 30, 7),
('Nexium', 69, 6),
('Plavix', 0, 6),
('Seroquel', 93, 4),
('Singulair', 77, 4);

-- --------------------------------------------------------

--
-- Table structure for table `user35o`
--

CREATE TABLE IF NOT EXISTS `user35o` (
  `medicine_name` varchar(255) DEFAULT NULL,
  `quantity` int(11) DEFAULT NULL,
  `price` float DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
