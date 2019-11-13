-- phpMyAdmin SQL Dump
-- version 4.8.3
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Nov 13, 2019 at 05:45 PM
-- Server version: 10.1.37-MariaDB
-- PHP Version: 7.2.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `db_mvc`
--

-- --------------------------------------------------------

--
-- Table structure for table `tbl_category`
--

CREATE TABLE `tbl_category` (
  `id` int(11) NOT NULL,
  `name` varchar(255) DEFAULT NULL,
  `title` text,
  `status` int(11) DEFAULT NULL,
  `date_time` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbl_category`
--

INSERT INTO `tbl_category` (`id`, `name`, `title`, `status`, `date_time`) VALUES
(3, 'Technology', 'Technology Title', NULL, '2019-07-10 14:01:57'),
(4, 'Web Developer', 'Web Developer', NULL, '2019-07-10 14:26:05'),
(7, 'Category One', 'Category One Title', NULL, '2019-10-10 15:24:38');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_post`
--

CREATE TABLE `tbl_post` (
  `id` int(11) NOT NULL,
  `title` varchar(255) DEFAULT NULL,
  `content` text,
  `cat` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbl_post`
--

INSERT INTO `tbl_post` (`id`, `title`, `content`, `cat`) VALUES
(2, 'Post Title will be go Second Title Here.', '&lt;p&gt;Second Content will be go here. First Content will be go here. First Content will be go here. First Content will be go here. First Content will be go here. First Content will be go here. First Content will be go here. First Content will be go here. First Content will be go here.&lt;/p&gt;\r\n\r\n&lt;p&gt;Second Content will be go here. First Content will be go here. First Content will be go here. First Content will be go here. First Content will be go here. First Content will be go here. First Content will be go here. First Content will be go here. First Content will be go here.&lt;/p&gt;\r\n', 4),
(3, 'Post Title will be go Third Title Here.', '<p>Third Content will be go here. First Content will be go here. First Content will be go here. First Content will be go here. First Content will be go here. First Content will be go here. First Content will be go here. First Content will be go here. First Content will be go here. </p>\r\n\r\n<p>Third Content will be go here. First Content will be go here. First Content will be go here. First Content will be go here. First Content will be go here. First Content will be go here. First Content will be go here. First Content will be go here. First Content will be go here. </p>', 3),
(4, 'Post Title will be go Fourth Title Here.', '<p>Fourth Content will be go here. First Content will be go here. First Content will be go here. First Content will be go here. First Content will be go here. First Content will be go here. First Content will be go here. First Content will be go here. web Developer Imran Hosen First Content will be go here. </p>\r\n\r\n<p> Imran Hosen Fourth Content will be go here. First Content will be go here. First Content will be go here. First Content will be go here. First Content will be go here. First Content will be go here. First Content will be go here. First Content will be go here. First Content will be go here. </p>', 4),
(5, 'First test title here.', '<p>First insert content description here.</p>\r\n', 4),
(6, 'Second title here per testing ', '<p>Second content here for testing perpass.</p>\r\n', 3),
(7, 'check Title three ...', '<p>Content here</p>\r\n', 7),
(8, 'Test first title will be go here.', '&lt;p&gt;Test first title will be go here.Test first title will be go here.Test first title will be go here.Test first title will be go here.Test first title will be go here.Test first title will be go here.Test first title&lt;a href=&quot;#&quot; target=&quot;_blank&quot;&gt; will be g&lt;/a&gt;o here.Test first title will be go here.Test first title will be go here.Test first title will be go here.Test first title will be go here.Test first title will be go here.&lt;/p&gt;\r\n\r\n&lt;p&gt;Test first title will be go here.T&lt;strong&gt;est first title&lt;/strong&gt; will be go here.Test first title will be go here.Test first title will be go here.Test first title will be go here.Test first title will be go here.Test first title will be go here.Test first title will be go here.Test first title will be go here.Test first title will be go here.Test first title will be go here.Test first title will be go here.&lt;/p&gt;\r\n', 4);

-- --------------------------------------------------------

--
-- Table structure for table `tbl_ui`
--

CREATE TABLE `tbl_ui` (
  `id` int(11) NOT NULL,
  `color` varchar(50) DEFAULT NULL,
  `create_date_time` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbl_ui`
--

INSERT INTO `tbl_ui` (`id`, `color`, `create_date_time`) VALUES
(1, '#ca1333', '2019-11-13 14:38:45');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_user`
--

CREATE TABLE `tbl_user` (
  `id` int(11) NOT NULL,
  `username` varchar(255) DEFAULT NULL,
  `password` varchar(255) DEFAULT NULL,
  `level` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbl_user`
--

INSERT INTO `tbl_user` (`id`, `username`, `password`, `level`) VALUES
(1, 'admin', '25d55ad283aa400af464c76d713c07ad', 1),
(2, 'Author', '25d55ad283aa400af464c76d713c07ad', 2);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `tbl_category`
--
ALTER TABLE `tbl_category`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tbl_post`
--
ALTER TABLE `tbl_post`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tbl_ui`
--
ALTER TABLE `tbl_ui`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tbl_user`
--
ALTER TABLE `tbl_user`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `tbl_category`
--
ALTER TABLE `tbl_category`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `tbl_post`
--
ALTER TABLE `tbl_post`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `tbl_ui`
--
ALTER TABLE `tbl_ui`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `tbl_user`
--
ALTER TABLE `tbl_user`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
