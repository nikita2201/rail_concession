-- phpMyAdmin SQL Dump
-- version 4.9.0.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: May 17, 2021 at 09:49 AM
-- Server version: 10.4.6-MariaDB
-- PHP Version: 7.1.32

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `lt_con`
--

-- --------------------------------------------------------

--
-- Table structure for table `admin`
--

CREATE TABLE `admin` (
  `id` int(11) NOT NULL,
  `login` varchar(50) NOT NULL,
  `pswd` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `admin`
--

INSERT INTO `admin` (`id`, `login`, `pswd`) VALUES
(1, 'admin', 'admin');

-- --------------------------------------------------------

--
-- Table structure for table `form`
--

CREATE TABLE `form` (
  `fid` int(11) NOT NULL,
  `erp_id` int(15) NOT NULL,
  `name_of_railway` enum('Western','Central') NOT NULL,
  `from_stn` varchar(50) NOT NULL,
  `to_stn` varchar(50) NOT NULL,
  `duration` enum('Monthly','Quarterly') NOT NULL,
  `tclass` enum('First','Second') NOT NULL,
  `valid_till` date NOT NULL,
  `ssn_ticket_no` varchar(20) NOT NULL,
  `vch_no` varchar(20) NOT NULL,
  `application_date` timestamp NOT NULL DEFAULT current_timestamp(),
  `status` varchar(40) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `form`
--

INSERT INTO `form` (`fid`, `erp_id`, `name_of_railway`, `from_stn`, `to_stn`, `duration`, `tclass`, `valid_till`, `ssn_ticket_no`, `vch_no`, `application_date`, `status`) VALUES
(15, 170600085, 'Central', 'dombivli', 'KOPARKHAIRANE', 'Monthly', 'First', '2019-11-12', '1qaz2ws', '123we45r', '2020-02-14 09:25:22', 'approved'),
(17, 170600067, 'Central', 'kalyan', 'KOPARKHAIRANE', 'Monthly', 'First', '2019-11-11', '12w45r', '23edft', '2020-02-17 09:15:25', 'approved'),
(18, 170600067, 'Western', 'kalyan', 'KOPARKHAIRANE', 'Quarterly', 'First', '2020-03-04', 'asdfghj', '23456', '2020-03-04 17:21:08', 'approved'),
(19, 170600067, 'Central', 'kalyan', 'KOPARKHAIRANE', 'Monthly', 'First', '2019-12-14', 'q2w3e4r5', '2345', '2020-05-02 06:12:47', 'pending');

-- --------------------------------------------------------

--
-- Table structure for table `stud_det`
--

CREATE TABLE `stud_det` (
  `erp_id` double NOT NULL,
  `sname` varchar(200) NOT NULL,
  `gender` enum('Male','Female') NOT NULL,
  `addr` varchar(250) NOT NULL,
  `contact` double NOT NULL,
  `dob` date NOT NULL,
  `age` int(11) NOT NULL,
  `month` int(2) NOT NULL,
  `class` enum('First','Second','Third','Final') NOT NULL,
  `branch` varchar(150) NOT NULL,
  `roll` int(11) NOT NULL,
  `password` varchar(300) NOT NULL,
  `email` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `stud_det`
--

INSERT INTO `stud_det` (`erp_id`, `sname`, `gender`, `addr`, `contact`, `dob`, `age`, `month`, `class`, `branch`, `roll`, `password`, `email`) VALUES
(170600067, 'Nikita Singh', 'Female', ' kalyan', 1234567890, '2000-01-22', 21, 1, 'Third', 'computer', 11, '$2y$12$nk3iLoE5PKUjhwi6IbvJheBKEJdAsZRy.FuHjUdF9t2WpTg4UW3ku', 'nikita@gmail.com'),
(170600085, 'Shweta Tripathi', 'Female', ' palava ,dombivli.', 7896540321, '2000-09-12', 19, 5, 'Third', 'comps', 21, '$2y$12$F59uygCzO29yzUpJREYH5uXgxhGfc9.7kjYy6T4z8GqSEbkUeh6ey', 'shweta@gmail.com');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admin`
--
ALTER TABLE `admin`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `form`
--
ALTER TABLE `form`
  ADD PRIMARY KEY (`fid`);

--
-- Indexes for table `stud_det`
--
ALTER TABLE `stud_det`
  ADD PRIMARY KEY (`erp_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `admin`
--
ALTER TABLE `admin`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `form`
--
ALTER TABLE `form`
  MODIFY `fid` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=20;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
