-- phpMyAdmin SQL Dump
-- version 4.5.2
-- http://www.phpmyadmin.net
--
-- Host: localhost
-- Generation Time: May 23, 2019 at 05:12 PM
-- Server version: 10.1.16-MariaDB
-- PHP Version: 5.6.24

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `db_ara`
--

-- --------------------------------------------------------

--
-- Table structure for table `admin_users`
--

CREATE TABLE `admin_users` (
  `id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `role` int(2) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `admin_users`
--

INSERT INTO `admin_users` (`id`, `name`, `email`, `password`, `role`) VALUES
(1, 'Admin', 'admin@ara.com', 'e10adc3949ba59abbe56e057f20f883e', 1),
(4, 'test nameg', 'tanveeraljami@gmail.com', 'e10adc3949ba59abbe56e057f20f883e', 2);

-- --------------------------------------------------------

--
-- Table structure for table `architects`
--

CREATE TABLE `architects` (
  `id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  `subtitle` varchar(255) NOT NULL,
  `description` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `architects`
--

INSERT INTO `architects` (`id`, `name`, `subtitle`, `description`) VALUES
(1, 'Salauddin Ahmed', 'The subtitle here', 'Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum. ');

-- --------------------------------------------------------

--
-- Table structure for table `architect_images`
--

CREATE TABLE `architect_images` (
  `id` int(11) NOT NULL,
  `architect_id` int(11) NOT NULL,
  `image_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `architect_images`
--

INSERT INTO `architect_images` (`id`, `architect_id`, `image_id`) VALUES
(7, 1, 65);

-- --------------------------------------------------------

--
-- Table structure for table `awards`
--

CREATE TABLE `awards` (
  `award_id` int(11) NOT NULL,
  `award_name` varchar(255) NOT NULL,
  `location` varchar(255) DEFAULT NULL,
  `description` text NOT NULL,
  `image_url` varchar(255) DEFAULT NULL,
  `year` int(11) NOT NULL,
  `month` int(11) NOT NULL,
  `day` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `awards`
--

INSERT INTO `awards` (`award_id`, `award_name`, `location`, `description`, `image_url`, `year`, `month`, `day`) VALUES
(6, 'Test Award', 'Dhaka', 'Test description of the award. Test description of the award.', NULL, 2016, 1, 1);

-- --------------------------------------------------------

--
-- Table structure for table `categories`
--

CREATE TABLE `categories` (
  `category_id` int(11) NOT NULL,
  `category_name` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `categories`
--

INSERT INTO `categories` (`category_id`, `category_name`) VALUES
(2, 'Architecture'),
(3, 'Interior'),
(4, 'Graphics'),
(5, 'Sketches'),
(6, 'Collage'),
(7, 'Installation');

-- --------------------------------------------------------

--
-- Table structure for table `category_projects`
--

CREATE TABLE `category_projects` (
  `category_id` int(11) NOT NULL,
  `project_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `category_projects`
--

INSERT INTO `category_projects` (`category_id`, `project_id`) VALUES
(2, 3),
(4, 3),
(2, 2),
(7, 2),
(5, 3),
(5, 2),
(6, 4),
(3, 4),
(4, 4),
(2, 5),
(4, 5),
(7, 5),
(4, 1),
(2, 1),
(6, 2),
(2, 9),
(4, 9);

-- --------------------------------------------------------

--
-- Table structure for table `gallery`
--

CREATE TABLE `gallery` (
  `image_id` int(11) NOT NULL,
  `image_path` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `gallery`
--

INSERT INTO `gallery` (`image_id`, `image_path`) VALUES
(1, '68485f8f61cb25aecb876e8d31116cd8.jpg'),
(2, '31da1a61046e9223333ca9764f2eb7b9.jpg'),
(13, '04bc1c5364d9ad30059a725d532abd4a.jpeg'),
(14, '456f2c014bf3fe38b90768fd5812af81.jpeg'),
(63, '9a6f50aa40f339e59f6ae72b0d37ca86.jpg'),
(64, 'dd1d623bc3ce927358f0a54ba551e802.jpg'),
(65, 'd75517d7013dc1f0568aab039d5ff455.JPG'),
(66, 'b4ff6e1ab543b666ad3252b7aa837782.JPG'),
(68, '55ceae4e1616dca86a04acd662374b64.png'),
(69, 'edb0339bd8a2e9b94f42320d27119cab.png'),
(70, '1d9a1abe291d0039c96643e29730be65.png'),
(72, 'd0d90af94bb16914f3e92e13dc6dab28.jpg');

-- --------------------------------------------------------

--
-- Table structure for table `landing_slider_images`
--

CREATE TABLE `landing_slider_images` (
  `id` int(11) NOT NULL,
  `img_path` varchar(255) NOT NULL,
  `serial` int(11) NOT NULL,
  `display` tinyint(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `lectures`
--

CREATE TABLE `lectures` (
  `id` int(11) NOT NULL,
  `title` varchar(255) NOT NULL,
  `description` text NOT NULL,
  `year` int(11) NOT NULL,
  `month` int(11) NOT NULL,
  `day` int(11) NOT NULL,
  `address` varchar(255) DEFAULT NULL,
  `city` varchar(255) DEFAULT NULL,
  `published` tinyint(1) DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `lectures`
--

INSERT INTO `lectures` (`id`, `title`, `description`, `year`, `month`, `day`, `address`, `city`, `published`) VALUES
(2, 'First Lecture', 'This is the description of the first lecture', 2017, 5, 1, 'house 25, baridhara 2', 'Dhaka nd', 0),
(3, 'Second Lecture', 'Embracing the culture of Japan with Salaudding Ahmed''s works.', 2016, 1, 1, 'house 25, baridhara 2', 'Dhaka', 1);

-- --------------------------------------------------------

--
-- Table structure for table `lecture_images`
--

CREATE TABLE `lecture_images` (
  `id` int(11) NOT NULL,
  `lecture_id` int(11) NOT NULL,
  `image_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `lecture_images`
--

INSERT INTO `lecture_images` (`id`, `lecture_id`, `image_id`) VALUES
(2, 3, 68),
(4, 2, 72);

-- --------------------------------------------------------

--
-- Table structure for table `news`
--

CREATE TABLE `news` (
  `id` int(11) NOT NULL,
  `title` varchar(255) NOT NULL,
  `description` text NOT NULL,
  `year` int(11) NOT NULL,
  `month` int(11) NOT NULL,
  `day` int(11) NOT NULL,
  `address` varchar(255) DEFAULT NULL,
  `city` varchar(255) DEFAULT NULL,
  `published` tinyint(1) DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `news`
--

INSERT INTO `news` (`id`, `title`, `description`, `year`, `month`, `day`, `address`, `city`, `published`) VALUES
(10, 'Dhaka Tribune', 'Embracing the culture of Japan with Salaudding Ahmed''s works.', 2017, 5, 7, 'Dhaka', 'Dhaka', 0),
(11, 'Dhaka Live', 'Book Launch, exhibition at Dhaka Art Centre', 2017, 5, 7, 'The Independent, Dhaka Live', 'Dhaka', 0),
(12, 'New Age', 'Architect Salauddin Ahmed''s Sketch Book launched', 2017, 5, 7, 'Dhaka', 'Dhaka', 0),
(15, 'jhgvkhj', 'jhgkj', 2017, 6, 5, 'liyoikl', 'khjgjkh', 1);

-- --------------------------------------------------------

--
-- Table structure for table `news_images`
--

CREATE TABLE `news_images` (
  `id` int(11) NOT NULL,
  `news_id` int(11) NOT NULL,
  `image_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `news_images`
--

INSERT INTO `news_images` (`id`, `news_id`, `image_id`) VALUES
(1, 15, 63),
(2, 10, 66);

-- --------------------------------------------------------

--
-- Table structure for table `projects`
--

CREATE TABLE `projects` (
  `id` int(11) NOT NULL,
  `project_name` varchar(255) NOT NULL,
  `description` text NOT NULL,
  `location` varchar(255) NOT NULL,
  `start_year` int(4) DEFAULT NULL,
  `start_month` int(2) DEFAULT NULL,
  `start_day` int(2) DEFAULT NULL,
  `end_year` int(4) DEFAULT NULL,
  `end_month` int(11) DEFAULT NULL,
  `end_day` int(11) DEFAULT NULL,
  `published` tinyint(1) NOT NULL DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `projects`
--

INSERT INTO `projects` (`id`, `project_name`, `description`, `location`, `start_year`, `start_month`, `start_day`, `end_year`, `end_month`, `end_day`, `published`) VALUES
(1, 'asjhj', 'Area : asdfasdf\r\nasdasdfsad\r\nasdfasdfasdfasdfasdf\r\nasdfasdfasdf', 'kl;jk;', 2016, 11, 15, 1970, 1, 1, 0),
(2, 'Test Project Title', 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Pellentesque hendrerit magna sapien, ac mattis leo rhoncus vitae. Nunc quis sapien magna. Cras consequat fringilla dui, eu cursus urna efficitur at. Phasellus nec quam sit amet risus commodo tempus. Vestibulum ante dolor, venenatis non erat ac, pharetra tincidunt orci. In cursus ante eu massa facilisis laoreet. Curabitur posuere nisi eget sapien vehicula vehicula. Maecenas rutrum leo cursus porttitor tristique. Quisque pretium mauris et justo luctus rhoncus. Integer quis neque velit. Pellentesque at pretium erat, ut lacinia felis. Praesent maximus diam sit amet orci feugiat, eget finibus nibh placerat. Sed varius felis a egestas pulvinar. Sed congue neque eget ligula imperdiet, eu bibendum sem fermentum. Cras tincidunt, metus a lacinia tincidunt, purus tellus laoreet massa, quis sodales risus diam id nulla.\r\n\r\nQuisque dignissim tincidunt magna, rhoncus auctor diam convallis et. Integer euismod tempor purus ut sollicitudin. Cras felis erat, pellentesque quis dui sit amet, tempor lacinia erat. Integer sed purus convallis, malesuada risus at, egestas neque. Quisque malesuada, mauris ut viverra posuere, nunc urna aliquam risus, vel aliquam felis nulla in lorem. Aenean fringilla lorem nec semper auctor. Ut id facilisis orci, tincidunt rutrum quam. Ut tempus rutrum nisl, id lacinia elit vehicula et. Maecenas vehicula velit sed lacus gravida, id cursus nibh euismod. Nulla tincidunt, eros sed condimentum fringilla, odio felis consectetur tellus, eget convallis massa erat ac elit. Mauris sed malesuada turpis. Nullam non elit vel purus interdum fringilla.', 'Dhaka, Bangladesh, jj', 2007, 6, 7, 2016, 12, 21, 0),
(3, 'test 3', 'asdasd', 'asdasdad', 2010, 6, 16, 2017, 1, 10, 0),
(4, 'skdfjasldkfjadf', 'asd.f,ja sfjkd faskjf ;kasd', 'asdfag adsg ads d', 2016, 7, 7, NULL, NULL, NULL, 0),
(5, 'asdfsdf', 'asdfsdf', 'fsdfadsf', 2017, 5, 9, 2017, 5, 16, 0),
(9, 'Test Name', 'Test Description', 'Test Location', 2015, 1, 1, 2017, 9, 8, 1);

-- --------------------------------------------------------

--
-- Table structure for table `project_images`
--

CREATE TABLE `project_images` (
  `project_id` int(11) NOT NULL,
  `image_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `project_images`
--

INSERT INTO `project_images` (`project_id`, `image_id`) VALUES
(1, 64),
(9, 69),
(9, 70);

-- --------------------------------------------------------

--
-- Table structure for table `publications`
--

CREATE TABLE `publications` (
  `publication_id` int(11) NOT NULL,
  `publication_name` varchar(255) NOT NULL,
  `description` text NOT NULL,
  `image_url` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `team_members`
--

CREATE TABLE `team_members` (
  `id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  `designation` varchar(255) NOT NULL,
  `phone` varchar(11) NOT NULL,
  `email` varchar(255) NOT NULL,
  `avatar` varchar(255) NOT NULL DEFAULT 'uploads/avatar.jpg'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `team_members`
--

INSERT INTO `team_members` (`id`, `name`, `designation`, `phone`, `email`, `avatar`) VALUES
(5, 'Mikel Jossssssssss', 'nice', '1971727296', 'apps.chondrobindu@gmail.com', 'uploads/744c679180b485e1107805cf7fdc8cf4.jpg');

-- --------------------------------------------------------

--
-- Table structure for table `videoAlbums`
--

CREATE TABLE `videoAlbums` (
  `id` int(11) NOT NULL,
  `album_name` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `videoAlbums`
--

INSERT INTO `videoAlbums` (`id`, `album_name`) VALUES
(4, 'Interviews');

-- --------------------------------------------------------

--
-- Table structure for table `videos`
--

CREATE TABLE `videos` (
  `id` int(11) NOT NULL,
  `file_name` varchar(255) NOT NULL,
  `title` varchar(255) NOT NULL,
  `description` varchar(255) NOT NULL,
  `published` date NOT NULL,
  `display` tinyint(1) NOT NULL,
  `thumb` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `videos`
--

INSERT INTO `videos` (`id`, `file_name`, `title`, `description`, `published`, `display`, `thumb`) VALUES
(2, '962cf329a51a9f14f6678cf1efa87ddb.mov', 'Test video', 'Test video', '2019-03-07', 1, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `video_to_album`
--

CREATE TABLE `video_to_album` (
  `album_id` int(11) NOT NULL,
  `video_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admin_users`
--
ALTER TABLE `admin_users`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `architects`
--
ALTER TABLE `architects`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `architect_images`
--
ALTER TABLE `architect_images`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `awards`
--
ALTER TABLE `awards`
  ADD PRIMARY KEY (`award_id`);

--
-- Indexes for table `categories`
--
ALTER TABLE `categories`
  ADD PRIMARY KEY (`category_id`);

--
-- Indexes for table `gallery`
--
ALTER TABLE `gallery`
  ADD PRIMARY KEY (`image_id`);

--
-- Indexes for table `landing_slider_images`
--
ALTER TABLE `landing_slider_images`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `lectures`
--
ALTER TABLE `lectures`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `lecture_images`
--
ALTER TABLE `lecture_images`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `news`
--
ALTER TABLE `news`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `news_images`
--
ALTER TABLE `news_images`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `projects`
--
ALTER TABLE `projects`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `publications`
--
ALTER TABLE `publications`
  ADD PRIMARY KEY (`publication_id`);

--
-- Indexes for table `team_members`
--
ALTER TABLE `team_members`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `videoAlbums`
--
ALTER TABLE `videoAlbums`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `videos`
--
ALTER TABLE `videos`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `admin_users`
--
ALTER TABLE `admin_users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;
--
-- AUTO_INCREMENT for table `architects`
--
ALTER TABLE `architects`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT for table `architect_images`
--
ALTER TABLE `architect_images`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;
--
-- AUTO_INCREMENT for table `awards`
--
ALTER TABLE `awards`
  MODIFY `award_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;
--
-- AUTO_INCREMENT for table `categories`
--
ALTER TABLE `categories`
  MODIFY `category_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;
--
-- AUTO_INCREMENT for table `gallery`
--
ALTER TABLE `gallery`
  MODIFY `image_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=73;
--
-- AUTO_INCREMENT for table `landing_slider_images`
--
ALTER TABLE `landing_slider_images`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `lectures`
--
ALTER TABLE `lectures`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
--
-- AUTO_INCREMENT for table `lecture_images`
--
ALTER TABLE `lecture_images`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;
--
-- AUTO_INCREMENT for table `news`
--
ALTER TABLE `news`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;
--
-- AUTO_INCREMENT for table `news_images`
--
ALTER TABLE `news_images`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
--
-- AUTO_INCREMENT for table `projects`
--
ALTER TABLE `projects`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;
--
-- AUTO_INCREMENT for table `publications`
--
ALTER TABLE `publications`
  MODIFY `publication_id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `team_members`
--
ALTER TABLE `team_members`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;
--
-- AUTO_INCREMENT for table `videoAlbums`
--
ALTER TABLE `videoAlbums`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;
--
-- AUTO_INCREMENT for table `videos`
--
ALTER TABLE `videos`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
