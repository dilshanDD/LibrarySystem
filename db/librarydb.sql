-- phpMyAdmin SQL Dump
-- version 5.0.4
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jan 11, 2022 at 04:46 AM
-- Server version: 10.4.16-MariaDB
-- PHP Version: 7.4.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `librarydb`
--

-- --------------------------------------------------------

--
-- Table structure for table `books`
--

CREATE TABLE `books` (
  `book_id` varchar(20) NOT NULL,
  `book_tittle` varchar(35) NOT NULL,
  `edition` varchar(35) NOT NULL,
  `category` varchar(35) NOT NULL,
  `auth_firstname` varchar(35) NOT NULL,
  `auth_lastname` varchar(35) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `books`
--

INSERT INTO `books` (`book_id`, `book_tittle`, `edition`, `category`, `auth_firstname`, `auth_lastname`) VALUES
('BK-211202', ' tittle ', '  second  ', '  demo  ', ' jhone ', '   wicky '),
('BK-211203', 'tittle', ' second ', 'Entertainment ', 'jhone', 'qqqq'),
('BK-211204', '  tittle  ', ' 4 ', ' demo ', ' jhone ', 'dilshan'),
('BK-211205', 'tittle', ' second ', ' demo ', 'jhone', ' wick '),
('BK-220105', 'Dilshan', ' second ', ' demo ', 'jhone', '  wicky');

-- --------------------------------------------------------

--
-- Table structure for table `book_copy`
--

CREATE TABLE `book_copy` (
  `book_copyID` varchar(20) NOT NULL,
  `book_id` varchar(20) NOT NULL,
  `status` varchar(20) NOT NULL,
  `purchase_date` date NOT NULL,
  `price` float NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `book_copy`
--

INSERT INTO `book_copy` (`book_copyID`, `book_id`, `status`, `purchase_date`, `price`) VALUES
('BC-211209', 'BK-211202', 'available', '2021-12-22', 2500),
('BC-211211', 'BK-211205', 'not_available', '2021-12-31', 2500);

-- --------------------------------------------------------

--
-- Table structure for table `borrow_book`
--

CREATE TABLE `borrow_book` (
  `studentID` varchar(20) NOT NULL,
  `book_copyID` varchar(20) NOT NULL,
  `checkout_date` date NOT NULL,
  `return_date` date NOT NULL,
  `status` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `borrow_book`
--

INSERT INTO `borrow_book` (`studentID`, `book_copyID`, `checkout_date`, `return_date`, `status`) VALUES
('STU-220100', 'BC-211209', '2022-01-01', '2022-01-31', 'received');

-- --------------------------------------------------------

--
-- Table structure for table `damaged_books`
--

CREATE TABLE `damaged_books` (
  `damagedbook_ID` varchar(20) NOT NULL,
  `book_copyID` varchar(20) NOT NULL,
  `damaged_date` date NOT NULL,
  `description` varchar(80) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `damaged_books`
--

INSERT INTO `damaged_books` (`damagedbook_ID`, `book_copyID`, `damaged_date`, `description`) VALUES
('DBK-220101', 'BC-211211', '2022-01-02', 'lost');

-- --------------------------------------------------------

--
-- Table structure for table `late_return_fine`
--

CREATE TABLE `late_return_fine` (
  `late_returnID` varchar(20) NOT NULL,
  `student_id` varchar(20) NOT NULL,
  `book_copyID` varchar(20) NOT NULL,
  `fine_amount` float NOT NULL,
  `description` varchar(80) NOT NULL,
  `date` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `late_return_fine`
--

INSERT INTO `late_return_fine` (`late_returnID`, `student_id`, `book_copyID`, `fine_amount`, `description`, `date`) VALUES
('PAY-220101', 'STU-220100', 'BC-211209', 200, '  Lost Book ', '2022-01-07'),
('PAY-220102', 'STU-220100', 'BC-211209', 200, '  Lost Book', '2022-01-07');

-- --------------------------------------------------------

--
-- Table structure for table `membership_log`
--

CREATE TABLE `membership_log` (
  `membership_ID` varchar(20) NOT NULL,
  `student_id` varchar(20) NOT NULL,
  `expire_date` date NOT NULL,
  `renew_date` date NOT NULL,
  `renew_fee` float NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `staff`
--

CREATE TABLE `staff` (
  `staff_ID` varchar(20) NOT NULL,
  `name` varchar(35) NOT NULL,
  `email` varchar(35) NOT NULL,
  `NIC` int(14) NOT NULL,
  `phone` int(12) NOT NULL,
  `username` varchar(20) NOT NULL,
  `password` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `staff`
--

INSERT INTO `staff` (`staff_ID`, `name`, `email`, `NIC`, `phone`, `username`, `password`) VALUES
('SF-211202', 'test 3', 'test3@gmail.com', 2147483647, 2147483647, 'test3 user', '1'),
('SF-220103', 'testing', 'onebinancedilshan@gmail.com', 2147483647, 2147483647, 'dilshan', '1');

-- --------------------------------------------------------

--
-- Table structure for table `students`
--

CREATE TABLE `students` (
  `student_ID` varchar(20) NOT NULL,
  `staff_id` varchar(20) NOT NULL,
  `NIC` int(13) NOT NULL,
  `email` varchar(35) NOT NULL,
  `phone` int(13) NOT NULL,
  `address` varchar(80) NOT NULL,
  `first_name` varchar(35) NOT NULL,
  `last_name` varchar(35) NOT NULL,
  `registered_date` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `students`
--

INSERT INTO `students` (`student_ID`, `staff_id`, `NIC`, `email`, `phone`, `address`, `first_name`, `last_name`, `registered_date`) VALUES
('STU-220100', 'SF-220103', 2147483647, 'onebinancedilshan@gmail.com', 2147483647, 'No : 315/c', 'dilshan', 'kumarasinghe', '2022-01-28');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `books`
--
ALTER TABLE `books`
  ADD PRIMARY KEY (`book_id`);

--
-- Indexes for table `book_copy`
--
ALTER TABLE `book_copy`
  ADD PRIMARY KEY (`book_copyID`),
  ADD KEY `book_id` (`book_id`);

--
-- Indexes for table `borrow_book`
--
ALTER TABLE `borrow_book`
  ADD KEY `studentID` (`studentID`),
  ADD KEY `book_copyID` (`book_copyID`);

--
-- Indexes for table `damaged_books`
--
ALTER TABLE `damaged_books`
  ADD PRIMARY KEY (`damagedbook_ID`),
  ADD KEY `book_copyID` (`book_copyID`);

--
-- Indexes for table `late_return_fine`
--
ALTER TABLE `late_return_fine`
  ADD PRIMARY KEY (`late_returnID`),
  ADD KEY `student_id` (`student_id`),
  ADD KEY `book_copyID` (`book_copyID`);

--
-- Indexes for table `membership_log`
--
ALTER TABLE `membership_log`
  ADD PRIMARY KEY (`membership_ID`),
  ADD KEY `student_id` (`student_id`);

--
-- Indexes for table `staff`
--
ALTER TABLE `staff`
  ADD PRIMARY KEY (`staff_ID`);

--
-- Indexes for table `students`
--
ALTER TABLE `students`
  ADD PRIMARY KEY (`student_ID`),
  ADD KEY `staff_id` (`staff_id`);

--
-- Constraints for dumped tables
--

--
-- Constraints for table `book_copy`
--
ALTER TABLE `book_copy`
  ADD CONSTRAINT `book_copy_ibfk_1` FOREIGN KEY (`book_id`) REFERENCES `books` (`book_id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `borrow_book`
--
ALTER TABLE `borrow_book`
  ADD CONSTRAINT `borrow_book_ibfk_1` FOREIGN KEY (`studentID`) REFERENCES `students` (`student_ID`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `borrow_book_ibfk_2` FOREIGN KEY (`book_copyID`) REFERENCES `book_copy` (`book_copyID`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `damaged_books`
--
ALTER TABLE `damaged_books`
  ADD CONSTRAINT `damaged_books_ibfk_1` FOREIGN KEY (`book_copyID`) REFERENCES `book_copy` (`book_copyID`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `late_return_fine`
--
ALTER TABLE `late_return_fine`
  ADD CONSTRAINT `late_return_fine_ibfk_1` FOREIGN KEY (`student_id`) REFERENCES `students` (`student_ID`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `late_return_fine_ibfk_2` FOREIGN KEY (`book_copyID`) REFERENCES `book_copy` (`book_copyID`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `membership_log`
--
ALTER TABLE `membership_log`
  ADD CONSTRAINT `membership_log_ibfk_1` FOREIGN KEY (`student_id`) REFERENCES `students` (`student_ID`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `students`
--
ALTER TABLE `students`
  ADD CONSTRAINT `students_ibfk_1` FOREIGN KEY (`staff_id`) REFERENCES `staff` (`staff_ID`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
