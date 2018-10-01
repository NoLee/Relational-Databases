-- phpMyAdmin SQL Dump
-- version 4.1.14
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: Mar 17, 2015 at 11:23 AM
-- Server version: 5.6.17
-- PHP Version: 5.5.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `ideal home`
--

-- --------------------------------------------------------

--
-- Table structure for table `company`
--

CREATE TABLE IF NOT EXISTS `company` (
  `Owner_ID` int(10) NOT NULL,
  `Company Name` varchar(20) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `Company Type` varchar(25) CHARACTER SET utf8 COLLATE utf8_unicode_ci DEFAULT NULL,
  PRIMARY KEY (`Owner_ID`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `company`
--

INSERT INTO `company` (`Owner_ID`, `Company Name`, `Company Type`) VALUES
(11, 'Ideal Home', 'LTE'),
(12, 'Rito', 'TM'),
(13, 'Monsters', 'Inc');

-- --------------------------------------------------------

--
-- Table structure for table `contract`
--

CREATE TABLE IF NOT EXISTS `contract` (
  `Contract_ID` int(10) NOT NULL AUTO_INCREMENT,
  `Starts` date NOT NULL,
  `Duration` int(10) NOT NULL,
  `Rent` int(10) NOT NULL,
  `Payment Method` varchar(15) NOT NULL,
  `Customer_ID` int(10) NOT NULL,
  `Estate_ID` int(10) NOT NULL,
  PRIMARY KEY (`Contract_ID`),
  UNIQUE KEY `Estate_ID` (`Estate_ID`),
  KEY `Customer_ID` (`Customer_ID`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=5 ;

--
-- Dumping data for table `contract`
--

INSERT INTO `contract` (`Contract_ID`, `Starts`, `Duration`, `Rent`, `Payment Method`, `Customer_ID`, `Estate_ID`) VALUES
(1, '2015-01-05', 12, 1000, 'Bank Deposit', 8, 29),
(2, '2014-08-29', 16, 2900, 'Check', 9, 35),
(3, '2015-04-24', 8, 750, 'Cash', 17, 32),
(4, '2015-03-15', 32, 1250, 'Bank Deposit', 14, 33);

-- --------------------------------------------------------

--
-- Table structure for table `customer`
--

CREATE TABLE IF NOT EXISTS `customer` (
  `Customer_ID` int(10) NOT NULL AUTO_INCREMENT,
  `Street` varchar(15) DEFAULT NULL,
  `Street Num` int(10) DEFAULT NULL,
  `Postal Code` int(10) DEFAULT NULL,
  `Name` varchar(15) NOT NULL,
  `Surname` varchar(20) NOT NULL,
  `Maximum Rent` int(10) NOT NULL,
  `Home Type` varchar(25) DEFAULT NULL,
  `E-Mail` varchar(40) NOT NULL,
  `Telephone` bigint(20) NOT NULL,
  PRIMARY KEY (`Customer_ID`),
  KEY `FullName` (`Name`,`Surname`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=19 ;

--
-- Dumping data for table `customer`
--

INSERT INTO `customer` (`Customer_ID`, `Street`, `Street Num`, `Postal Code`, `Name`, `Surname`, `Maximum Rent`, `Home Type`, `E-Mail`, `Telephone`) VALUES
(5, 'Moscow St.', 5, 123123, 'Diana', 'Cyka', 420, 'Small Appartment', 'giffmemana@dota2.ru', 4567886),
(6, 'London St.', 143, 52000, 'Tom', 'Hardy', 1600, 'Appartment', 'tomas.h@gmail.com', 6931234567),
(7, 'Akergatan', 55, 84453, 'Maria', 'Larsson', 700, 'Bungalow', '-', 6983897656),
(8, 'Baker Blvd', 500, 42322, 'Howard', 'Snyder', 1300, 'Flat', 'pinsky@phottut.com', 211),
(9, 'Elgin', 20, 32540, 'Luigi', 'Yoshi', 3000, 'Mansion', 'itame@hotmai.com', 6955476890),
(10, 'Johnstown Road', 8, 15523, 'Helena', 'Bonham Carter', 850, 'Appartment', 'hbc@gmail.com', 2110105633),
(11, 'Oak Str.', 83, 12232, 'Clara', 'Lago', 2005, 'Chalet', 'clago@yaho.ru', 6975567339),
(12, 'Meteos', 3, 87001, 'John', 'Steel', 1000, 'Flat', 'ballsof@steel.com', 6957746780),
(13, 'Doctor', 52, 10003, 'Hector', 'Wheatly', 1200, 'Flat', 'hector@salamanca@.com', 6978455203),
(14, 'Poker Str.', 11, 48523, 'Jason', 'Somerville', 9000, 'Manor', 'jcarver@contact.com', 523314852),
(15, 'Chow', 21, 74100, 'Amaz', 'Chan', 650, 'Shack', 'amazhs@yahoo.gr', 2118754233),
(16, 'Ermou', 8, 11235, 'Maria', 'Callas', 3000, 'Chalet', 'opera@firefox.chrome', 6944474814),
(17, 'Karageorgou', 5, 17236, 'George', 'Chatzikyriakos', 1420, 'Appartment', 'nismo75@hotmail.com', 6978455231),
(18, 'Tataoulon', 12, 17452, 'John', 'Steel', 450, 'Flatlet', 'j_s1990@yahoo.gr', 6978452133);

-- --------------------------------------------------------

--
-- Table structure for table `employee`
--

CREATE TABLE IF NOT EXISTS `employee` (
  `Employee_ID` int(10) NOT NULL AUTO_INCREMENT,
  `Street` varchar(20) CHARACTER SET ascii DEFAULT NULL,
  `Street Num` int(10) DEFAULT NULL,
  `Postal Code` int(10) DEFAULT NULL,
  `Name` varchar(15) CHARACTER SET ascii NOT NULL,
  `Surname` varchar(20) CHARACTER SET ascii NOT NULL,
  `Salary` int(15) NOT NULL,
  `Sex` char(1) CHARACTER SET ascii NOT NULL,
  `E-Mail` varchar(40) NOT NULL,
  `Telephone` bigint(20) NOT NULL,
  `Supervisor` int(11) DEFAULT NULL,
  PRIMARY KEY (`Employee_ID`),
  KEY `Supervisor` (`Supervisor`),
  KEY `fullName` (`Name`,`Surname`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=62 ;

--
-- Dumping data for table `employee`
--

INSERT INTO `employee` (`Employee_ID`, `Street`, `Street Num`, `Postal Code`, `Name`, `Surname`, `Salary`, `Sex`, `E-Mail`, `Telephone`, `Supervisor`) VALUES
(54, 'Obere Str.', 37, 12209, 'Johnny', 'Depp', 8000, 'M', 'johnny@gmail.com', 2106789550, NULL),
(55, 'Mataderos', 2312, 5023, 'Natalie', 'Portman', 4000, 'F', 'nat.port@yahoo.uk', 6975677809, 54),
(56, 'Forster', 15, 67000, 'Christina', 'Berglund', 3500, 'F', 'tinatina@gmail.com', 6994677587, 54),
(57, 'Cerrito', 333, 10000, 'Patricio', 'Simpson', 1500, 'M', 'argentina110@hotmail.com', 2107648900, 56),
(58, 'Haup', 29, 16232, 'Yang', 'Wang', 3000, 'M', 'GEtigers@in.com', 304675688946, 56),
(59, 'Av. dos Lusiadas', 23, 5432, 'Pedro', 'Alfonso', 1620, 'M', 'brazilnum1@hue.br', 6945690123, 55);

--
-- Triggers `employee`
--
DROP TRIGGER IF EXISTS `deleteEmployee`;
DELIMITER //
CREATE TRIGGER `deleteEmployee` BEFORE DELETE ON `employee`
 FOR EACH ROW UPDATE `estate` SET Employee_ID= (select m.Employee_ID from (  select e.Employee_ID,count(w.Estate_ID) as Number
									from `employee`as e
									left join `estate`as w
									on w.Employee_ID=e.Employee_ID
									where e.Employee_ID <>old.Employee_ID
									group by e.Employee_ID
									order by Number ASC
									limit 0,1)as m)
WHERE Employee_ID=old.Employee_ID
//
DELIMITER ;
DROP TRIGGER IF EXISTS `insertMinSalary`;
DELIMITER //
CREATE TRIGGER `insertMinSalary` BEFORE INSERT ON `employee`
 FOR EACH ROW IF new.Salary < 600
THEN 
	SET new.Salary = 600;
END IF
//
DELIMITER ;
DROP TRIGGER IF EXISTS `updateMinSalary`;
DELIMITER //
CREATE TRIGGER `updateMinSalary` BEFORE UPDATE ON `employee`
 FOR EACH ROW IF new.Salary < 600
THEN 
	SET new.Salary = 600;
END IF
//
DELIMITER ;

-- --------------------------------------------------------

--
-- Stand-in structure for view `employee-customer`
--
CREATE TABLE IF NOT EXISTS `employee-customer` (
`EmployeeName` varchar(15)
,`EmployeeSurname` varchar(20)
,`CustomerName` varchar(15)
,`CustomerSurname` varchar(20)
);
-- --------------------------------------------------------

--
-- Table structure for table `estate`
--

CREATE TABLE IF NOT EXISTS `estate` (
  `Estate_ID` int(10) NOT NULL AUTO_INCREMENT,
  `Street` varchar(15) NOT NULL,
  `Street Num` int(10) NOT NULL,
  `Postal Code` int(10) NOT NULL,
  `Monthly Rent` int(10) NOT NULL,
  `Estate Type` varchar(25) NOT NULL,
  `Room Num` int(10) NOT NULL,
  `Square Meters` int(10) NOT NULL,
  `Employee_ID` int(10) DEFAULT NULL,
  `Owner_ID` int(10) NOT NULL,
  PRIMARY KEY (`Estate_ID`),
  KEY `Owner_ID` (`Owner_ID`),
  KEY `Employee_ID` (`Employee_ID`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=36 ;

--
-- Dumping data for table `estate`
--

INSERT INTO `estate` (`Estate_ID`, `Street`, `Street Num`, `Postal Code`, `Monthly Rent`, `Estate Type`, `Room Num`, `Square Meters`, `Employee_ID`, `Owner_ID`) VALUES
(29, 'Laurent', 54, 15423, 1000, 'Flat', 3, 83, 57, 8),
(30, 'Bering St.', 10, 16232, 300, 'Flatlet', 1, 35, 58, 10),
(31, 'Hollywood ', 3, 53000, 6500, 'Villa', 8, 350, 54, 11),
(32, 'Wadhurst', 42, 15001, 750, 'Appartment', 3, 77, 56, 12),
(33, 'Jayce St.', 36, 74332, 1300, 'Bungalow', 2, 70, 58, 8),
(34, 'John Ken Av.', 55, 48533, 900, 'Small Appartment', 2, 70, 59, 9),
(35, 'Yolo', 2, 12352, 3200, 'Cottage', 4, 101, 56, 11);

-- --------------------------------------------------------

--
-- Stand-in structure for view `luxuryestates`
--
CREATE TABLE IF NOT EXISTS `luxuryestates` (
`Estate_ID` int(10)
,`Street` varchar(15)
,`Street Num` int(10)
,`Postal Code` int(10)
,`Monthly Rent` int(10)
,`Estate Type` varchar(25)
,`Room Num` int(10)
,`Square Meters` int(10)
);
-- --------------------------------------------------------

--
-- Table structure for table `owner`
--

CREATE TABLE IF NOT EXISTS `owner` (
  `Owner_ID` int(10) NOT NULL AUTO_INCREMENT,
  `Street` varchar(15) CHARACTER SET ascii DEFAULT NULL,
  `Street Num` int(10) DEFAULT NULL,
  `Postal Code` int(10) DEFAULT NULL,
  `E-Mail` varchar(40) NOT NULL,
  `Telephone` bigint(20) NOT NULL,
  `Tax Registration Number` bigint(20) NOT NULL,
  PRIMARY KEY (`Owner_ID`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=14 ;

--
-- Dumping data for table `owner`
--

INSERT INTO `owner` (`Owner_ID`, `Street`, `Street Num`, `Postal Code`, `E-Mail`, `Telephone`, `Tax Registration Number`) VALUES
(8, 'Karaoli', 34, 16232, 'manolios93@hotmail.com', 697895432, 1608789909),
(9, 'Polk', 23, 52301, 'brownies@gmail.com', 6978455321, 5677489003),
(10, 'Blvd of BD', 1, 123025, 'kevout@gmail.com', 6974511023, 5477802312),
(11, 'Queensbridge', 38, 16354, 'idealhome@support.com', 211111111, 5411398785),
(12, 'Milton Dr.', 54, 936000, 'riotgames@support.com', 1200487955, 4203601234),
(13, 'Hell Av.', 6, 17453, 'unleash@thebeast.gr', 2116566036, 6666966666);

-- --------------------------------------------------------

--
-- Table structure for table `private`
--

CREATE TABLE IF NOT EXISTS `private` (
  `Owner_ID` int(10) NOT NULL,
  `Name` varchar(15) NOT NULL,
  `Surname` varchar(20) NOT NULL,
  PRIMARY KEY (`Owner_ID`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `private`
--

INSERT INTO `private` (`Owner_ID`, `Name`, `Surname`) VALUES
(8, 'Manolis', 'Pentarakis'),
(9, 'Chris', 'Brown'),
(10, 'John', 'Kevin');

-- --------------------------------------------------------

--
-- Table structure for table `registration`
--

CREATE TABLE IF NOT EXISTS `registration` (
  `Registration Date` date NOT NULL,
  `Customer_ID` int(11) NOT NULL,
  `Employee_ID` int(11) DEFAULT NULL,
  PRIMARY KEY (`Customer_ID`),
  KEY `Employee_ID` (`Employee_ID`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `registration`
--

INSERT INTO `registration` (`Registration Date`, `Customer_ID`, `Employee_ID`) VALUES
('2014-12-15', 5, 54),
('2014-06-26', 6, 55),
('2012-03-28', 7, 56),
('2014-03-16', 8, 59),
('2005-08-24', 9, 59),
('2015-03-02', 10, 58),
('2015-03-28', 11, 57),
('2015-03-28', 12, 58),
('2015-04-09', 13, 57),
('2015-03-16', 14, 58),
('2015-03-04', 15, 58),
('2014-02-18', 16, 56),
('2014-11-03', 17, 55),
('2015-03-31', 18, 57);

-- --------------------------------------------------------

--
-- Table structure for table `serves`
--

CREATE TABLE IF NOT EXISTS `serves` (
  `Customer_ID` int(10) NOT NULL,
  `Employee_ID` int(10) NOT NULL,
  PRIMARY KEY (`Customer_ID`,`Employee_ID`),
  KEY `Employee_ID` (`Employee_ID`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `serves`
--

INSERT INTO `serves` (`Customer_ID`, `Employee_ID`) VALUES
(5, 54),
(6, 55),
(7, 55),
(13, 57),
(17, 57),
(18, 57),
(8, 58),
(13, 58),
(14, 58),
(17, 58),
(18, 58),
(10, 59),
(16, 59);

-- --------------------------------------------------------

--
-- Table structure for table `visit`
--

CREATE TABLE IF NOT EXISTS `visit` (
  `Customer_ID` int(10) NOT NULL,
  `Estate_ID` int(10) NOT NULL,
  `Visit Date` date NOT NULL,
  `Comments` varchar(60) DEFAULT NULL,
  PRIMARY KEY (`Customer_ID`,`Estate_ID`),
  KEY `Estate_ID` (`Estate_ID`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `visit`
--

INSERT INTO `visit` (`Customer_ID`, `Estate_ID`, `Visit Date`, `Comments`) VALUES
(5, 29, '2016-03-25', '(Future visit, will add comments later)'),
(5, 34, '2016-03-17', '(Future visit, will add comments later)'),
(10, 35, '2015-01-05', 'Nice and big, could be a little cheaper. Will think about it'),
(11, 29, '2015-03-08', 'Too much noise pollution, will consider'),
(13, 30, '2015-08-13', '(Future visit, will add comments later)'),
(14, 30, '2014-04-22', 'Just like my old basement. LOVE IT. '),
(14, 33, '2015-03-16', 'Not my type'),
(15, 30, '2015-03-09', 'It`s all i can afford BibleThump'),
(16, 31, '2015-03-25', 'That`s what my wallet can buy.And I will');

-- --------------------------------------------------------

--
-- Structure for view `employee-customer`
--
DROP TABLE IF EXISTS `employee-customer`;

CREATE ALGORITHM=UNDEFINED DEFINER=`root`@`localhost` SQL SECURITY DEFINER VIEW `employee-customer` AS select `e`.`Name` AS `EmployeeName`,`e`.`Surname` AS `EmployeeSurname`,`c`.`Name` AS `CustomerName`,`c`.`Surname` AS `CustomerSurname` from ((`serves` `s` join `employee` `e` on((`e`.`Employee_ID` = `s`.`Employee_ID`))) join `customer` `c` on((`c`.`Customer_ID` = `s`.`Customer_ID`))) WITH LOCAL CHECK OPTION;

-- --------------------------------------------------------

--
-- Structure for view `luxuryestates`
--
DROP TABLE IF EXISTS `luxuryestates`;

CREATE ALGORITHM=UNDEFINED DEFINER=`root`@`localhost` SQL SECURITY DEFINER VIEW `luxuryestates` AS select `e`.`Estate_ID` AS `Estate_ID`,`e`.`Street` AS `Street`,`e`.`Street Num` AS `Street Num`,`e`.`Postal Code` AS `Postal Code`,`e`.`Monthly Rent` AS `Monthly Rent`,`e`.`Estate Type` AS `Estate Type`,`e`.`Room Num` AS `Room Num`,`e`.`Square Meters` AS `Square Meters` from `estate` `e` where (`e`.`Monthly Rent` > 1500) order by `e`.`Monthly Rent`;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `company`
--
ALTER TABLE `company`
  ADD CONSTRAINT `company_ibfk_1` FOREIGN KEY (`Owner_ID`) REFERENCES `owner` (`Owner_ID`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `contract`
--
ALTER TABLE `contract`
  ADD CONSTRAINT `contract_ibfk_3` FOREIGN KEY (`Customer_ID`) REFERENCES `customer` (`Customer_ID`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `contract_ibfk_4` FOREIGN KEY (`Estate_ID`) REFERENCES `estate` (`Estate_ID`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `employee`
--
ALTER TABLE `employee`
  ADD CONSTRAINT `employee_ibfk_1` FOREIGN KEY (`Supervisor`) REFERENCES `employee` (`Employee_ID`) ON DELETE SET NULL ON UPDATE CASCADE;

--
-- Constraints for table `estate`
--
ALTER TABLE `estate`
  ADD CONSTRAINT `estate_ibfk_3` FOREIGN KEY (`Employee_ID`) REFERENCES `employee` (`Employee_ID`) ON DELETE SET NULL ON UPDATE CASCADE,
  ADD CONSTRAINT `estate_ibfk_4` FOREIGN KEY (`Owner_ID`) REFERENCES `owner` (`Owner_ID`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `private`
--
ALTER TABLE `private`
  ADD CONSTRAINT `private_ibfk_1` FOREIGN KEY (`Owner_ID`) REFERENCES `owner` (`Owner_ID`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `registration`
--
ALTER TABLE `registration`
  ADD CONSTRAINT `registration_ibfk_1` FOREIGN KEY (`Customer_ID`) REFERENCES `customer` (`Customer_ID`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `registration_ibfk_2` FOREIGN KEY (`Employee_ID`) REFERENCES `employee` (`Employee_ID`) ON DELETE SET NULL ON UPDATE CASCADE;

--
-- Constraints for table `serves`
--
ALTER TABLE `serves`
  ADD CONSTRAINT `serves_ibfk_1` FOREIGN KEY (`Employee_ID`) REFERENCES `employee` (`Employee_ID`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `serves_ibfk_2` FOREIGN KEY (`Customer_ID`) REFERENCES `customer` (`Customer_ID`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `visit`
--
ALTER TABLE `visit`
  ADD CONSTRAINT `visit_ibfk_3` FOREIGN KEY (`Customer_ID`) REFERENCES `customer` (`Customer_ID`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `visit_ibfk_4` FOREIGN KEY (`Estate_ID`) REFERENCES `estate` (`Estate_ID`) ON DELETE CASCADE ON UPDATE CASCADE;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
