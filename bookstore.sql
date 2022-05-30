-- phpMyAdmin SQL Dump
-- version 5.1.3
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: May 30, 2022 at 08:08 AM
-- Server version: 10.4.24-MariaDB
-- PHP Version: 7.4.29

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `bookstore`
--

-- --------------------------------------------------------

--
-- Table structure for table `book`
--

CREATE TABLE `book` (
  `ISBN_13` varchar(13) NOT NULL,
  `bookName` varchar(255) NOT NULL,
  `author` varchar(255) DEFAULT NULL,
  `publicationDate` date DEFAULT NULL,
  `bookDescription` varchar(255) DEFAULT NULL,
  `bookCover` blob DEFAULT NULL,
  `bookCategory` varchar(4) NOT NULL,
  `retailPrice` float(10,2) NOT NULL,
  `tradePrice` float(10,2) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `book`
--

INSERT INTO `book` (`ISBN_13`, `bookName`, `author`, `publicationDate`, `bookDescription`, `bookCover`, `bookCategory`, `retailPrice`, `tradePrice`) VALUES
('1945673581649', 'DARK PSYCHOLOGY: Dark Hypnosis Technique To Manipulation Human Psychology, Deception, Subliminal Persuasion And Mind Control', 'Ryan Watson', '2020-12-16', 'Unveil the world of dark psychology and discover the secrets of the Dark Triad.\r\nDo you want to delve into the depths of human psychology and uncover the manipulation tactics that are used against us every day? Are you interested in learning more about th', NULL, 'C08', 50.00, 60.00),
('4598657482153', 'THE ART OF A LAWYER - CROSS EXAMINATION | ADVOCACY | COURTMANSHIP', ' Chief Justice M. Monir , Dr. B. Malik', '2017-11-13', 'The Art Of A Lawyer - Cross Examination | Advocacy | Courtmanship by Chief Justice Dr. B. Malik with Commentary on The Art of Cross Examination by Chief Justice M. Monir  by Universal Law Publishing. This book is a collection of enlightening and enriching', NULL, 'C08', 255.00, 250.00),
('6845785132415', 'MODERN ADVOCACY - MORE PERSPECTIVES FROM SINGAPORE', 'Elearnor Wong, Lok Vi Ming, The Honourable Justice Vinodh Coomaraswamy', '2019-04-17', 'While the first volume covered a wide range of basic advocacy topics from a uniquely Singapore perspective, this companion volume, Modern Advocacy – More Perspectives from Singapore, focuses on specialist topics of interest to Singapore practitioners, inc', NULL, 'C08', 315.00, 310.00),
('9780455241135', 'FUNDAMENTALS OF TRIAL TECHNIQUE 4TH AUSTRALIAN ED\r\n', 'Thomas A Mauet, Les A. McCrimmon\r\n', '2018-09-13', 'The \'art of persuasion\' has been defined as advocacy, and this book equips the advocate with the skills needed to prepare for and present the trial in the most compelling manner possible. The writers not only discuss what to do and how to do it, but they ', NULL, 'C08', 325.00, 350.00);

-- --------------------------------------------------------

--
-- Table structure for table `category`
--

CREATE TABLE `category` (
  `categoryID` varchar(4) NOT NULL,
  `categoryName` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `category`
--

INSERT INTO `category` (`categoryID`, `categoryName`) VALUES
('C01', 'Action and Adventure'),
('C02', 'Classics'),
('C03', 'Comic Book'),
('C04', 'Detective and Mystery'),
('C05', 'Fantasy'),
('C06', 'Horror'),
('C07', 'Romance'),
('C08', 'Education');

-- --------------------------------------------------------

--
-- Table structure for table `invoice`
--

CREATE TABLE `invoice` (
  `invoiceID` varchar(255) NOT NULL,
  `invoiceDate` date NOT NULL,
  `userID` varchar(255) NOT NULL,
  `totalPrice` float(10,2) NOT NULL,
  `postageAddress` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `invoicedetails`
--

CREATE TABLE `invoicedetails` (
  `invoiceID` varchar(255) NOT NULL,
  `ISBN_13` varchar(13) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `payment`
--

CREATE TABLE `payment` (
  `paymentID` varchar(255) NOT NULL,
  `timeStamp` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `userid` varchar(255) NOT NULL,
  `totalprice` float(10,2) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `shoppingcart`
--

CREATE TABLE `shoppingcart` (
  `cartID` varchar(255) NOT NULL,
  `userID` varchar(255) NOT NULL,
  `totalPrice` float(10,2) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `shoppingcartdetails`
--

CREATE TABLE `shoppingcartdetails` (
  `cartID` varchar(255) NOT NULL,
  `ISBN_13` varchar(13) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `stock`
--

CREATE TABLE `stock` (
  `ISBN_13` varchar(13) NOT NULL,
  `stockLevel` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `stock`
--

INSERT INTO `stock` (`ISBN_13`, `stockLevel`) VALUES
('1945673581649', 5),
('4598657482153', 7),
('6845785132415', 9),
('9780455241135', 18);

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `userID` varchar(255) NOT NULL,
  `userType` varchar(255) NOT NULL,
  `password` varchar(18) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Indexes for dumped tables
--

--
-- Indexes for table `book`
--
ALTER TABLE `book`
  ADD PRIMARY KEY (`ISBN_13`),
  ADD KEY `bookCategory` (`bookCategory`);

--
-- Indexes for table `category`
--
ALTER TABLE `category`
  ADD PRIMARY KEY (`categoryID`);

--
-- Indexes for table `invoice`
--
ALTER TABLE `invoice`
  ADD PRIMARY KEY (`invoiceID`),
  ADD KEY `userID` (`userID`);

--
-- Indexes for table `invoicedetails`
--
ALTER TABLE `invoicedetails`
  ADD KEY `invoiceID` (`invoiceID`),
  ADD KEY `ISBN_13` (`ISBN_13`);

--
-- Indexes for table `payment`
--
ALTER TABLE `payment`
  ADD PRIMARY KEY (`paymentID`),
  ADD KEY `userid` (`userid`);

--
-- Indexes for table `shoppingcart`
--
ALTER TABLE `shoppingcart`
  ADD PRIMARY KEY (`cartID`),
  ADD KEY `userID` (`userID`);

--
-- Indexes for table `shoppingcartdetails`
--
ALTER TABLE `shoppingcartdetails`
  ADD KEY `cartID` (`cartID`),
  ADD KEY `ISBN_13` (`ISBN_13`);

--
-- Indexes for table `stock`
--
ALTER TABLE `stock`
  ADD KEY `ISBN_13` (`ISBN_13`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`userID`);

--
-- Constraints for dumped tables
--

--
-- Constraints for table `book`
--
ALTER TABLE `book`
  ADD CONSTRAINT `book_ibfk_1` FOREIGN KEY (`bookCategory`) REFERENCES `category` (`categoryID`);

--
-- Constraints for table `invoice`
--
ALTER TABLE `invoice`
  ADD CONSTRAINT `invoice_ibfk_1` FOREIGN KEY (`userID`) REFERENCES `users` (`userID`);

--
-- Constraints for table `invoicedetails`
--
ALTER TABLE `invoicedetails`
  ADD CONSTRAINT `invoicedetails_ibfk_1` FOREIGN KEY (`invoiceID`) REFERENCES `invoice` (`invoiceID`),
  ADD CONSTRAINT `invoicedetails_ibfk_2` FOREIGN KEY (`ISBN_13`) REFERENCES `book` (`ISBN_13`);

--
-- Constraints for table `payment`
--
ALTER TABLE `payment`
  ADD CONSTRAINT `payment_ibfk_1` FOREIGN KEY (`userid`) REFERENCES `users` (`userID`);

--
-- Constraints for table `shoppingcart`
--
ALTER TABLE `shoppingcart`
  ADD CONSTRAINT `shoppingcart_ibfk_1` FOREIGN KEY (`userID`) REFERENCES `users` (`userID`);

--
-- Constraints for table `shoppingcartdetails`
--
ALTER TABLE `shoppingcartdetails`
  ADD CONSTRAINT `shoppingcartdetails_ibfk_1` FOREIGN KEY (`cartID`) REFERENCES `shoppingcart` (`cartID`),
  ADD CONSTRAINT `shoppingcartdetails_ibfk_2` FOREIGN KEY (`ISBN_13`) REFERENCES `book` (`ISBN_13`);

--
-- Constraints for table `stock`
--
ALTER TABLE `stock`
  ADD CONSTRAINT `stock_ibfk_1` FOREIGN KEY (`ISBN_13`) REFERENCES `book` (`ISBN_13`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
