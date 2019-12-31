-- phpMyAdmin SQL Dump
-- version 4.2.11
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: Apr 08, 2018 at 01:18 PM
-- Server version: 5.6.21
-- PHP Version: 5.6.3

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `db_blog`
--

-- --------------------------------------------------------

--
-- Table structure for table `tbl_category`
--

CREATE TABLE IF NOT EXISTS `tbl_category` (
`id` int(11) NOT NULL,
  `name` varchar(50) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbl_category`
--

INSERT INTO `tbl_category` (`id`, `name`) VALUES
(1, 'JAVA'),
(2, 'PHP'),
(3, 'HTML'),
(4, 'CSS'),
(5, 'JAVASCRIPT');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_contact`
--

CREATE TABLE IF NOT EXISTS `tbl_contact` (
`id` int(11) NOT NULL,
  `firstname` varchar(255) NOT NULL,
  `lastname` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `body` text NOT NULL,
  `status` int(11) NOT NULL DEFAULT '0',
  `date` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB AUTO_INCREMENT=19 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbl_contact`
--

INSERT INTO `tbl_contact` (`id`, `firstname`, `lastname`, `email`, `body`, `status`, `date`) VALUES
(18, 'c', 'd', 'tanzim06@ymail.com', 'this is a test message', 1, '2018-03-26 08:34:07');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_footer`
--

CREATE TABLE IF NOT EXISTS `tbl_footer` (
`id` int(11) NOT NULL,
  `footernote` varchar(255) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbl_footer`
--

INSERT INTO `tbl_footer` (`id`, `footernote`) VALUES
(1, 'Sayed Tanzim Ishteaque');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_page`
--

CREATE TABLE IF NOT EXISTS `tbl_page` (
`id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  `body` text NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbl_page`
--

INSERT INTO `tbl_page` (`id`, `name`, `body`) VALUES
(1, 'About Company', '<p>Halo my name is tanzim</p>\r\n\r\n<p>About Company...some text will go here some text will go here some text will go here some text will go here some text will go heresome text will go here some text will go here some text will go here some text will go here some text will go here some text will go here some text will go heresome text will go here some text will go here some text will go here some text will go here some text will go here some text will go here some text will go heresome text will go here some text will go here</p>\r\n\r\n<p>About Company...some text will go here some text will go here some text will go here some text will go here some text will go heresome text will go here some text will go here some text will go here some text will go here some text will go here some text will go here some text will go heresome text will go here some text will go here some text will go here some text will go here some text will go here some text will go here some text will go heresome text will go here some text will go here</p>\r\n\r\n<p>&nbsp;</p>\r\n\r\n<p>&nbsp;</p>\r\n\r\n<p>About Company...some text will go here some text will go here some text will go here some text will go here some text will go heresome text will go here some text will go here some text will go here some text will go here some text will go here some text will go here some text will go heresome text will go here some text will go here some text will go here some text will go here some text will go here some text will go here some text will go heresome text will go here some text will go here</p>\r\n\r\n<p>&nbsp;</p>\r\n');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_post`
--

CREATE TABLE IF NOT EXISTS `tbl_post` (
`id` int(11) NOT NULL,
  `cat` int(11) NOT NULL,
  `title` varchar(255) NOT NULL,
  `body` text NOT NULL,
  `image` varchar(255) NOT NULL,
  `author` varchar(50) NOT NULL,
  `tags` varchar(255) NOT NULL,
  `date` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `userrank` int(11) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=20 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbl_post`
--

INSERT INTO `tbl_post` (`id`, `cat`, `title`, `body`, `image`, `author`, `tags`, `date`, `userrank`) VALUES
(1, 1, 'Java', '<p>Our post...some text will go here some text will go here some text will go here some text will go here some text will go heresome text will go here some text will go here some text will go here some text will go here some text will go here some text will go here some text will go heresome text will go here some text will go here some text will go here some text will go here some text will go here some text will go here some text will go heresome text will go here some text will go here</p> <p>Our post...some text will go here some text will go here some text will go here some text will go here some text will go heresome text will go here some text will go here some text will go here some text will go here some text will go here some text will go here some text will go heresome text will go here some text will go here some text will go here some text will go here some text will go here some text will go here some text will go heresome text will go here some text will go here</p><p>Our post...some text will go here some text will go here some text will go here some text will go here some text will go heresome text will go here some text will go here some text will go here some text will go here some text will go here some text will go here some text will go heresome text will go here some text will go here some text will go here some text will go here some text will go here some text will go here some text will go heresome text will go here some text will go here</p>', '../../../Uploads/images/post1.jpg', 'Tanzim', 'Java, programming', '2018-02-17 02:34:34', 0),
(2, 2, 'PHP', '<p>Our post...some text will go here some text will go here some text will go here some text will go here some text will go heresome text will go here some text will go here some text will go here some text will go here some text will go here some text will go here some text will go heresome text will go here some text will go here some text will go here some text will go here some text will go here some text will go here some text will go heresome text will go here some text will go here</p> \r\n\r\n<p>Our post...some text will go here some text will go here some text will go here some text will go here some text will go heresome text will go here some text will go here some text will go here some text will go here some text will go here some text will go here some text will go heresome text will go here some text will go here some text will go here some text will go here some text will go here some text will go here some text will go heresome text will go here some text will go here</p>\r\n\r\n<p>Our post...some text will go here some text will go here some text will go here some text will go here some text will go heresome text will go here some text will go here some text will go here some text will go here some text will go here some text will go here some text will go heresome text will go here some text will go here some text will go here some text will go here some text will go here some text will go here some text will go heresome text will go here some text will go here</p>', '../../../Uploads/images/post1.jpg', 'Tanzim', 'PHP, programming', '2018-02-17 02:34:34', 0),
(3, 3, 'HTML', '<p>Our post...some text will go here some text will go here some text will go here some text will go here some text will go heresome text will go here some text will go here some text will go here some text will go here some text will go here some text will go here some text will go heresome text will go here some text will go here some text will go here some text will go here some text will go here some text will go here some text will go heresome text will go here some text will go here</p>\r\n\r\n<p>Our post...some text will go here some text will go here some text will go here some text will go here some text will go heresome text will go here some text will go here some text will go here some text will go here some text will go here some text will go here some text will go heresome text will go here some text will go here some text will go here some text will go here some text will go here some text will go here some text will go heresome text will go here some text will go here</p>\r\n\r\n<p>Our post...some text will go here some text will go here some text will go here some text will go here some text will go heresome text will go here some text will go here some text will go here some text will go here some text will go here some text will go here some text will go heresome text will go here some text will go here some text will go here some text will go here some text will go here some text will go here some text will go heresome text will go here some text will go here</p>\r\n', '../../../Uploads/images/post1.jpg', 'admin', 'HTML, programming', '2018-02-17 02:37:03', 0),
(4, 4, 'CSS', '<p>&nbsp;Our post...some text will go here some text will go here some text will go here some text will go here some text will go heresome text will go here some text will go here some text will go here some text will go here some text will go here some text will go here some text will go heresome text will go here some text will go here some text will go here some text will go here some text will go here some text will go here some text will go heresome text will go here some text will go here</p>\r\n\r\n<p>Our post...some text will go here some text will go here some text will go here some text will go here some text will go heresome text will go here some text will go here some text will go here some text will go here some text will go here some text will go here some text will go heresome text will go here some text will go here some text will go here some text will go here some text will go here some text will go here some text will go heresome text will go here some text will go here</p>\r\n\r\n<p>Our post...some text will go here some text will go here some text will go here some text will go here some text will go heresome text will go here some text will go here some text will go here some text will go here some text will go here some text will go here some text will go heresome text will go here some text will go here some text will go here some text will go here some text will go here some text will go here some text will go heresome text will go here some text will go here</p>\r\n\r\n<p>&nbsp;</p>\r\n', '../../../Uploads/images/f86e7c3ad2.jpg', 'Tanzim', 'CSS, programming', '2018-02-17 02:37:03', 0),
(5, 1, 'J2EE', '<p>Our post...some text will go here some text will go here some text will go here some text will go here some text will go heresome text will go here some text will go here some text will go here some text will go here some text will go here some text will go here some text will go heresome text will go here some text will go here some text will go here some text will go here some text will go here some text will go here some text will go heresome text will go here some text will go here</p> \r\n\r\n<p>Our post...some text will go here some text will go here some text will go here some text will go here some text will go heresome text will go here some text will go here some text will go here some text will go here some text will go here some text will go here some text will go heresome text will go here some text will go here some text will go here some text will go here some text will go here some text will go here some text will go heresome text will go here some text will go here</p>\r\n\r\n<p>Our post...some text will go here some text will go here some text will go here some text will go here some text will go heresome text will go here some text will go here some text will go here some text will go here some text will go here some text will go here some text will go heresome text will go here some text will go here some text will go here some text will go here some text will go here some text will go here some text will go heresome text will go here some text will go here</p>', '../../../Uploads/images/post1.jpg', 'Tanzim', 'Java, programming', '2018-02-17 02:38:46', 0),
(6, 2, 'Laravel', '<p>Our post...some text will go here some text will go here some text will go here some text will go here some text will go heresome text will go here some text will go here some text will go here some text will go here some text will go here some text will go here some text will go heresome text will go here some text will go here some text will go here some text will go here some text will go here some text will go here some text will go heresome text will go here some text will go here</p> <p>Our post...some text will go here some text will go here some text will go here some text will go here some text will go heresome text will go here some text will go here some text will go here some text will go here some text will go here some text will go here some text will go heresome text will go here some text will go here some text will go here some text will go here some text will go here some text will go here some text will go heresome text will go here some text will go here</p><p>Our post...some text will go here some text will go here some text will go here some text will go here some text will go heresome text will go here some text will go here some text will go here some text will go here some text will go here some text will go here some text will go heresome text will go here some text will go here some text will go here some text will go here some text will go here some text will go here some text will go heresome text will go here some text will go here</p>', '../../../Uploads/images/post1.jpg', 'Tanzim', 'PHP, programming', '2018-02-17 02:38:46', 0),
(18, 5, 'viewjs', '<p>viewjsOur post...some text will go here some text will go here some text will go here some text will go here some text will go heresome text will go here some text will go here some text will go here some text will go here some text will go here some text will go here some text will go heresome text will go here some text will go here some text will go here some text will go here some text will go here some text will go here some text will go heresome text will go here some text will go here&lt;/p&gt; &lt;p&gt;Our post...some text will go here some text will go here some text will go here some text will go here some text will go heresome text will go here some text will go here some text will go here some text will go here some text will go here some text will go here some text will go heresome text will go here some text will go here some text will go here some text will go here some text will go here some text will go here some text will go heresome text will go here some text will go here&lt;/p&gt;&lt;p&gt;Our post...some text will go here some text will go here some text will go here some text will go here some text will go heresome text will go here some text will go here some text will go here some text will go here some text will go here some text will go here some text will go heresome text will go here some text will go here some text will go here some text will go here some text will go here some text will go here some text will go heresome text will go here some text will go here&lt;/p&gt;</p><p><canvas :netbeans_generated="true" height="200" id="netbeans_glasspane" style="position: fixed; top: 0px; left: 0px; z-index: 50000; pointer-events: none;" width="576"></canvas></p>', '../../../Uploads/images/659a569581.png', 'Tanzim', 'javascript, viewjs', '2018-03-17 06:29:52', 0),
(19, 5, 'viewjs', '<p>My post...Some text will go here.Some text will go here.Some text will go here.Some text will go here.Some text will go here.Some text will go here.Some text will go here. Some text will go here.Some text will go here.Some text will go here.Some text will go here.Some text will go here.Some text will go here.Some text will go here. Some text will go here.Some text will go here.Some text will go here.Some text will go here.Some text will go here.Some text will go here.Some text will go here.</p>\r\n\r\n<p>Our post...some text will go here some text will go here some text will go here some text will go here some text will go heresome text will go here some text will go here some text will go here some text will go here some text will go here some text will go here some text will go heresome text will go here some text will go here some text will go here some text will go here some text will go here some text will go here some text will go heresome text will go here some text will go here</p>\r\n\r\n<p>Our post...some text will go here some text will go here some text will go here some text will go here some text will go heresome text will go here some text will go here some text will go here some text will go here some text will go here some text will go here some text will go heresome text will go here some text will go here some text will go here some text will go here some text will go here some text will go here some text will go heresome text will go here some text will go here</p>\r\n\r\n<p>Our post...some text will go here some text will go here some text will go here some text will go here some text will go heresome text will go here some text will go here some text will go here some text will go here some text will go here some text will go here some text will go heresome text will go here some text will go here some text will go here some text will go here some text will go here some text will go here some text will go heresome text will go here some text will go here</p>\r\n', '../../../Uploads/images/8ee5758b76.png', 'Tanzim', 'javascript', '2018-03-23 17:55:05', 0);

-- --------------------------------------------------------

--
-- Table structure for table `tbl_slider`
--

CREATE TABLE IF NOT EXISTS `tbl_slider` (
`id` int(11) NOT NULL,
  `title` varchar(255) NOT NULL,
  `image` varchar(255) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=9 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbl_slider`
--

INSERT INTO `tbl_slider` (`id`, `title`, `image`) VALUES
(5, 'This is slider 1 title', '../../../Uploads/images/slider/0773b06985.jpg'),
(6, 'this is slider 2 title', '../../../Uploads/images/slider/69daf0982d.jpg'),
(7, 'this is slider 3 title', '../../../Uploads/images/slider/d69eb6533e.jpg'),
(8, 'this is slider 4 title', '../../../Uploads/images/slider/e03177d0ec.jpg');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_social`
--

CREATE TABLE IF NOT EXISTS `tbl_social` (
`id` int(11) NOT NULL,
  `facebook` varchar(255) NOT NULL,
  `twitter` varchar(255) NOT NULL,
  `linkedin` varchar(255) NOT NULL,
  `googleplus` varchar(255) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbl_social`
--

INSERT INTO `tbl_social` (`id`, `facebook`, `twitter`, `linkedin`, `googleplus`) VALUES
(1, 'https://www.facebook.com/', 'https://twitter.com/', 'https://www.linkedin.com/', 'https://plus.google.com/');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_theme`
--

CREATE TABLE IF NOT EXISTS `tbl_theme` (
`id` int(11) NOT NULL,
  `theme` varchar(255) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbl_theme`
--

INSERT INTO `tbl_theme` (`id`, `theme`) VALUES
(1, 'default');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_user`
--

CREATE TABLE IF NOT EXISTS `tbl_user` (
`id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  `username` varchar(50) NOT NULL,
  `password` varchar(32) NOT NULL,
  `email` varchar(255) NOT NULL,
  `details` text NOT NULL,
  `role` int(11) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=10 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbl_user`
--

INSERT INTO `tbl_user` (`id`, `name`, `username`, `password`, `email`, `details`, `role`) VALUES
(9, 'Tanzim', 'admin', '202cb962ac59075b964b07152d234b70', 'tanzim06@hotmail.com', '<p>Assalamu Alaikum</p>\r\n\r\n<p><canvas :netbeans_generated="true" height="200" id="netbeans_glasspane" style="position: fixed; top: 0px; left: 0px; z-index: 50000; pointer-events: none;" width="576"></canvas></p>\r\n', 1);

-- --------------------------------------------------------

--
-- Table structure for table `title_slogan`
--

CREATE TABLE IF NOT EXISTS `title_slogan` (
`id` int(11) NOT NULL,
  `title` varchar(255) NOT NULL,
  `slogan` varchar(255) NOT NULL,
  `logo` varchar(255) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `title_slogan`
--

INSERT INTO `title_slogan` (`id`, `title`, `slogan`, `logo`) VALUES
(1, 'Our Site Title', 'Our Site Slogan', '../../../Uploads/images/logo.png');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `tbl_category`
--
ALTER TABLE `tbl_category`
 ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tbl_contact`
--
ALTER TABLE `tbl_contact`
 ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tbl_footer`
--
ALTER TABLE `tbl_footer`
 ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tbl_page`
--
ALTER TABLE `tbl_page`
 ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tbl_post`
--
ALTER TABLE `tbl_post`
 ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tbl_slider`
--
ALTER TABLE `tbl_slider`
 ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tbl_social`
--
ALTER TABLE `tbl_social`
 ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tbl_theme`
--
ALTER TABLE `tbl_theme`
 ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tbl_user`
--
ALTER TABLE `tbl_user`
 ADD PRIMARY KEY (`id`);

--
-- Indexes for table `title_slogan`
--
ALTER TABLE `title_slogan`
 ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `tbl_category`
--
ALTER TABLE `tbl_category`
MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=6;
--
-- AUTO_INCREMENT for table `tbl_contact`
--
ALTER TABLE `tbl_contact`
MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=19;
--
-- AUTO_INCREMENT for table `tbl_footer`
--
ALTER TABLE `tbl_footer`
MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT for table `tbl_page`
--
ALTER TABLE `tbl_page`
MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT for table `tbl_post`
--
ALTER TABLE `tbl_post`
MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=20;
--
-- AUTO_INCREMENT for table `tbl_slider`
--
ALTER TABLE `tbl_slider`
MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=9;
--
-- AUTO_INCREMENT for table `tbl_social`
--
ALTER TABLE `tbl_social`
MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT for table `tbl_theme`
--
ALTER TABLE `tbl_theme`
MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT for table `tbl_user`
--
ALTER TABLE `tbl_user`
MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=10;
--
-- AUTO_INCREMENT for table `title_slogan`
--
ALTER TABLE `title_slogan`
MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=2;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
