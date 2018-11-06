-- phpMyAdmin SQL Dump
-- version 4.8.3
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Nov 06, 2018 at 05:09 PM
-- Server version: 10.1.35-MariaDB
-- PHP Version: 7.2.9

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `db_itpress`
--

-- --------------------------------------------------------

--
-- Table structure for table `tbl_article`
--

CREATE TABLE `tbl_article` (
  `id` int(11) NOT NULL,
  `title` varchar(500) CHARACTER SET utf8 NOT NULL,
  `writer` varchar(200) CHARACTER SET utf8 NOT NULL,
  `article_type` int(11) NOT NULL,
  `description` varchar(1000) CHARACTER SET utf8 NOT NULL,
  `article` mediumtext CHARACTER SET utf8 NOT NULL,
  `edited` enum('no','yes') NOT NULL,
  `date_published` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  `status` enum('saved','deleted') NOT NULL,
  `editor_date_modified` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  `created_by` int(11) NOT NULL,
  `modified_by` int(11) NOT NULL,
  `date_created` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `date_modified` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00'
) ENGINE=InnoDB DEFAULT CHARSET=latin1 ROW_FORMAT=COMPACT;

-- --------------------------------------------------------

--
-- Table structure for table `tbl_article_editor`
--

CREATE TABLE `tbl_article_editor` (
  `id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `article_id` int(11) NOT NULL,
  `status` enum('saved','deleted') NOT NULL,
  `created_by` int(11) NOT NULL,
  `modified_by` int(11) NOT NULL,
  `date_created` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `date_modified` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00'
) ENGINE=InnoDB DEFAULT CHARSET=latin1 ROW_FORMAT=COMPACT;

-- --------------------------------------------------------

--
-- Table structure for table `tbl_article_type`
--

CREATE TABLE `tbl_article_type` (
  `id` int(11) NOT NULL,
  `type` varchar(50) CHARACTER SET utf8 NOT NULL,
  `status` enum('saved','deleted') NOT NULL,
  `created_by` int(11) NOT NULL,
  `modified_by` int(11) NOT NULL,
  `date_created` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `date_modified` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00'
) ENGINE=InnoDB DEFAULT CHARSET=latin1 ROW_FORMAT=COMPACT;

--
-- Dumping data for table `tbl_article_type`
--

INSERT INTO `tbl_article_type` (`id`, `type`, `status`, `created_by`, `modified_by`, `date_created`, `date_modified`) VALUES
(1, 'All', 'saved', 1, 0, '2018-11-06 15:41:54', '0000-00-00 00:00:00'),
(2, 'News', 'saved', 1, 0, '2018-11-06 15:41:54', '0000-00-00 00:00:00'),
(3, 'Entertainment', 'saved', 1, 0, '2018-11-06 15:41:54', '0000-00-00 00:00:00'),
(4, 'Sports', 'saved', 1, 0, '2018-11-06 15:41:54', '0000-00-00 00:00:00');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_user`
--

CREATE TABLE `tbl_user` (
  `id` int(11) NOT NULL,
  `username` varchar(50) CHARACTER SET utf8 NOT NULL,
  `password` varchar(50) CHARACTER SET utf8 NOT NULL,
  `user_type` enum('admin','editor','writer','student') NOT NULL,
  `status` enum('saved','deleted') NOT NULL,
  `created_by` int(11) NOT NULL,
  `modified_by` int(11) NOT NULL,
  `date_created` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `date_modified` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbl_user`
--

INSERT INTO `tbl_user` (`id`, `username`, `password`, `user_type`, `status`, `created_by`, `modified_by`, `date_created`, `date_modified`) VALUES
(1, 'admin', 'SWJzL1czTnpGY1BnRTFWQzZER0FzZz09 ', 'admin', '', 0, 0, '2018-11-06 15:40:33', '0000-00-00 00:00:00');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_user_article_type`
--

CREATE TABLE `tbl_user_article_type` (
  `id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `article_type_id` int(11) NOT NULL,
  `status` enum('saved','deleted') NOT NULL,
  `created_by` int(11) NOT NULL,
  `modified_by` int(11) NOT NULL,
  `date_created` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `date_modified` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00'
) ENGINE=InnoDB DEFAULT CHARSET=latin1 ROW_FORMAT=COMPACT;

-- --------------------------------------------------------

--
-- Table structure for table `tbl_user_info`
--

CREATE TABLE `tbl_user_info` (
  `id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `fname` varchar(50) CHARACTER SET utf8 NOT NULL,
  `mname` varchar(50) CHARACTER SET utf8 NOT NULL,
  `lname` varchar(50) CHARACTER SET utf8 NOT NULL,
  `email` varchar(50) CHARACTER SET utf8 NOT NULL,
  `status` enum('saved','deleted') NOT NULL,
  `created_by` int(11) NOT NULL,
  `modified_by` int(11) NOT NULL,
  `date_created` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `date_modified` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00'
) ENGINE=InnoDB DEFAULT CHARSET=latin1 ROW_FORMAT=COMPACT;

--
-- Dumping data for table `tbl_user_info`
--

INSERT INTO `tbl_user_info` (`id`, `user_id`, `fname`, `mname`, `lname`, `email`, `status`, `created_by`, `modified_by`, `date_created`, `date_modified`) VALUES
(1, 1, 'Admin', 'A.', 'Admin', 'admin@admin', 'saved', 1, 0, '2018-11-06 15:40:57', '0000-00-00 00:00:00');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_user_logs`
--

CREATE TABLE `tbl_user_logs` (
  `id` int(11) NOT NULL,
  `transaction` varchar(500) CHARACTER SET utf8 NOT NULL,
  `created_by` int(11) NOT NULL,
  `modified_by` int(11) NOT NULL DEFAULT '0',
  `date_created` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `date_modified` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00'
) ENGINE=InnoDB DEFAULT CHARSET=latin1 ROW_FORMAT=COMPACT;

--
-- Indexes for dumped tables
--

--
-- Indexes for table `tbl_article`
--
ALTER TABLE `tbl_article`
  ADD PRIMARY KEY (`id`),
  ADD KEY `created_by_modified_by` (`created_by`,`modified_by`),
  ADD KEY `article_type` (`article_type`);

--
-- Indexes for table `tbl_article_editor`
--
ALTER TABLE `tbl_article_editor`
  ADD PRIMARY KEY (`id`),
  ADD KEY `created_by_modified_by` (`created_by`,`modified_by`),
  ADD KEY `user_id` (`user_id`),
  ADD KEY `article_type_id` (`article_id`);

--
-- Indexes for table `tbl_article_type`
--
ALTER TABLE `tbl_article_type`
  ADD PRIMARY KEY (`id`),
  ADD KEY `created_by_modified_by` (`created_by`,`modified_by`);

--
-- Indexes for table `tbl_user`
--
ALTER TABLE `tbl_user`
  ADD PRIMARY KEY (`id`),
  ADD KEY `created_by_modified_by` (`created_by`,`modified_by`);

--
-- Indexes for table `tbl_user_article_type`
--
ALTER TABLE `tbl_user_article_type`
  ADD PRIMARY KEY (`id`),
  ADD KEY `created_by_modified_by` (`created_by`,`modified_by`),
  ADD KEY `user_id` (`user_id`),
  ADD KEY `article_type_id` (`article_type_id`);

--
-- Indexes for table `tbl_user_info`
--
ALTER TABLE `tbl_user_info`
  ADD PRIMARY KEY (`id`),
  ADD KEY `created_by_modified_by` (`created_by`,`modified_by`),
  ADD KEY `user_id` (`user_id`);

--
-- Indexes for table `tbl_user_logs`
--
ALTER TABLE `tbl_user_logs`
  ADD PRIMARY KEY (`id`),
  ADD KEY `created_by_modified_by` (`created_by`,`modified_by`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `tbl_article`
--
ALTER TABLE `tbl_article`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `tbl_article_editor`
--
ALTER TABLE `tbl_article_editor`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `tbl_article_type`
--
ALTER TABLE `tbl_article_type`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `tbl_user`
--
ALTER TABLE `tbl_user`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `tbl_user_article_type`
--
ALTER TABLE `tbl_user_article_type`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `tbl_user_info`
--
ALTER TABLE `tbl_user_info`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `tbl_user_logs`
--
ALTER TABLE `tbl_user_logs`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `tbl_article`
--
ALTER TABLE `tbl_article`
  ADD CONSTRAINT `FK_tbl_article_tbl_article_type` FOREIGN KEY (`article_type`) REFERENCES `tbl_article_type` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `tbl_article_editor`
--
ALTER TABLE `tbl_article_editor`
  ADD CONSTRAINT `FK_tbl_article_editor_tbl_article` FOREIGN KEY (`article_id`) REFERENCES `tbl_article` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `tbl_article_editor_ibfk_2` FOREIGN KEY (`user_id`) REFERENCES `tbl_user` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `tbl_user_article_type`
--
ALTER TABLE `tbl_user_article_type`
  ADD CONSTRAINT `FK_tbl_user_article_type_tbl_article_type` FOREIGN KEY (`article_type_id`) REFERENCES `tbl_article_type` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `FK_tbl_user_article_type_tbl_user` FOREIGN KEY (`user_id`) REFERENCES `tbl_user` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `tbl_user_info`
--
ALTER TABLE `tbl_user_info`
  ADD CONSTRAINT `FK_tbl_user_info_tbl_user` FOREIGN KEY (`user_id`) REFERENCES `tbl_user` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
