-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Oct 31, 2022 at 10:32 AM
-- Server version: 10.4.24-MariaDB
-- PHP Version: 8.1.6

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `db_blog`
--

-- --------------------------------------------------------

--
-- Table structure for table `category`
--

CREATE TABLE `category` (
  `id` int(11) NOT NULL,
  `name` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `category`
--

INSERT INTO `category` (`id`, `name`) VALUES
(1, 'Potato'),
(2, 'Paddy'),
(4, 'Wheat'),
(5, 'Corn');

-- --------------------------------------------------------

--
-- Table structure for table `contact`
--

CREATE TABLE `contact` (
  `id` int(11) NOT NULL,
  `firstname` varchar(200) NOT NULL,
  `lastname` varchar(100) NOT NULL,
  `email` varchar(255) NOT NULL,
  `body` text NOT NULL,
  `status` int(11) NOT NULL DEFAULT 0,
  `date` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `contact`
--

INSERT INTO `contact` (`id`, `firstname`, `lastname`, `email`, `body`, `status`, `date`) VALUES
(2, 'Emon', 'Khan', 'emonkhan@gmail.com', 'There is a problem. Not a Number (NaN) represents an undefined number in floating-point operations. A Not a Number indicator may also be a sign that a variable that is supposed to be a numerical value has been corrupted by text characters or symbols.', 0, '2022-10-26 11:10:15'),
(3, 'Emon', 'Khan', 'emonkhan@gmail.com', 'There is a problem.', 1, '2022-10-26 11:10:15'),
(4, 'Habiba', 'Akter', 'habi@mail.com', 'Paddy Field\r\npost image\r\nA paddy field is a flooded field of arable land used for growing semiaquatic crops, most notably rice and taro. It .......\r\n\r\nPotato\r\npost image\r\nThe potato is a starchy tuber of the plant Solanum tuberosum and is a root vegetable and a fruit native to the .......\r\n\r\nMaize (Corn)\r\npost image\r\nMaize has become a staple food in many parts of the world, with the total production of maize .......', 0, '2022-10-27 16:06:24');

-- --------------------------------------------------------

--
-- Table structure for table `footer`
--

CREATE TABLE `footer` (
  `id` int(11) NOT NULL,
  `copyright` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `footer`
--

INSERT INTO `footer` (`id`, `copyright`) VALUES
(1, 'Md Jannatul Ferdhous Emon (19CSE049)');

-- --------------------------------------------------------

--
-- Table structure for table `page`
--

CREATE TABLE `page` (
  `id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  `body` varchar(8191) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `page`
--

INSERT INTO `page` (`id`, `name`, `body`) VALUES
(3, 'About Us ', '<p><strong>Lorem Ipsum</strong><span>&nbsp;is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry\'s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum</span></p>\r\n<p><span>Values in VARCHAR columns are variable-length strings. The length can be specified as a value from 0 to 65,535. The effective maximum length of a VARCHAR is subject to the maximum row size (</span><strong>65,535 bytes</strong><span>, which is shared among all columns) and the character set used. See Section 8.4.</span></p>'),
(4, 'Privacy Policy', '<p><span>Values in VARCHAR columns are variable-length strings. The length can be specified as a value from 0 to 65,535. The effective maximum length of a VARCHAR is subject to the maximum row size (</span><strong>65,535 bytes</strong><span>, which is shared among all columns) and the character set used. See Section 8.4.</span></p>\r\n<p><strong>Lorem Ipsum</strong><span>&nbsp;is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry\'s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum</span></p>\r\n<p><span>Values in VARCHAR columns are variable-length strings. The length can be specified as a value from 0 to 65,535. The effective maximum length of a VARCHAR is subject to the maximum row size (</span><strong>65,535 bytes</strong><span>, which is shared among all columns) and the character set used. See Section 8.4.</span></p>');

-- --------------------------------------------------------

--
-- Table structure for table `post`
--

CREATE TABLE `post` (
  `id` int(11) NOT NULL,
  `cat` int(11) NOT NULL,
  `title` varchar(255) NOT NULL,
  `body` text NOT NULL,
  `image` varchar(255) NOT NULL,
  `author` varchar(50) NOT NULL,
  `tag` varchar(255) NOT NULL,
  `date` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `userid` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `post`
--

INSERT INTO `post` (`id`, `cat`, `title`, `body`, `image`, `author`, `tag`, `date`, `userid`) VALUES
(1, 2, 'Paddy Field', '<p>A paddy field is a flooded field of arable land used for growing semiaquatic crops, most notably rice and taro. It originates from the Neolithic rice-farming cultures of the Yangtze River basin in southern China, associated with pre-Austronesian and Hmong-Mien cultures.</p>\r\n<p>Paddy, also called rice paddy, small, level, flooded field used to cultivate rice in southern and eastern Asia. Wet-rice cultivation is the most prevalent method of farming in the Far East, where it utilizes a small fraction of the total land yet feeds the majority of the rural population.</p>', 'upload/paddy.jpg', 'Emon', 'Paddy, Rice', '2022-10-29 06:03:12', 2),
(2, 1, 'Potato', '<p>The potato is a starchy tuber of the plant Solanum tuberosum and is a root vegetable and a fruit native to the Americas. The plant is a perennial in the nightshade family Solanaceae. Wild potato species can be found from the southern United States to southern Chile.</p>', 'upload/Potato.jpg', 'Emon', 'Potato, Alu', '2022-10-29 06:02:40', 2),
(3, 5, 'Maize (Corn)', '<p>Maize has become a&nbsp;staple food&nbsp;in many parts of the world, with the&nbsp;total production of maize surpassing&nbsp;that of&nbsp;wheat&nbsp;or&nbsp;rice. In addition to being consumed directly by humans (often in the form of&nbsp;masa), maize is also used for&nbsp;corn ethanol,&nbsp;animal feed&nbsp;and other&nbsp;maize products, such as&nbsp;corn starch&nbsp;and&nbsp;corn syrup.&nbsp;The six major types of maize are&nbsp;dent corn,&nbsp;flint corn,&nbsp;pod corn,&nbsp;popcorn,&nbsp;flour corn, and&nbsp;sweet corn.&nbsp;Sugar-rich varieties called sweet corn are usually grown for human consumption as kernels, while&nbsp;field corn&nbsp;varieties are used for animal feed, various corn-based human food uses (including grinding into&nbsp;cornmeal&nbsp;or&nbsp;masa, pressing into&nbsp;corn oil, fermentation and distillation into alcoholic beverages like&nbsp;bourbon whiskey), and as feedstocks for the chemical industry. Maize is also used in making&nbsp;ethanol&nbsp;and other&nbsp;biofuels.</p>', 'upload/01803777fb.jpg', 'Emon', 'Corn, Maize', '2022-10-29 06:03:19', 2),
(7, 4, 'Test post', '<p>This is a test post.&nbsp;</p>', 'upload/81a4c97b97.jpg', 'author', 'test', '2022-10-30 18:16:12', 2);

-- --------------------------------------------------------

--
-- Table structure for table `slider`
--

CREATE TABLE `slider` (
  `id` int(11) NOT NULL,
  `title` varchar(255) NOT NULL,
  `image` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `slider`
--

INSERT INTO `slider` (`id`, `title`, `image`) VALUES
(4, 'This is test slider', 'upload/slider/6ce071162c.png'),
(6, 'This is a new slider', 'upload/slider/967e76a1df.jpg'),
(9, 'New one', 'upload/slider/ee9ab85ef1.jpg');

-- --------------------------------------------------------

--
-- Table structure for table `social`
--

CREATE TABLE `social` (
  `id` int(11) NOT NULL,
  `facebook` varchar(255) NOT NULL,
  `twitter` varchar(255) NOT NULL,
  `linkedin` varchar(255) NOT NULL,
  `google` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `social`
--

INSERT INTO `social` (`id`, `facebook`, `twitter`, `linkedin`, `google`) VALUES
(1, 'https://www.facebook.com/officialemonfans', 'https://www.twitter.com', 'https://www.linkedin.com', 'https://www.google.com');

-- --------------------------------------------------------

--
-- Table structure for table `theme`
--

CREATE TABLE `theme` (
  `id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `theme`
--

INSERT INTO `theme` (`id`, `name`) VALUES
(1, 'selago');

-- --------------------------------------------------------

--
-- Table structure for table `title_slogan`
--

CREATE TABLE `title_slogan` (
  `id` int(11) NOT NULL,
  `title` varchar(255) NOT NULL,
  `slogan` varchar(255) NOT NULL,
  `logo` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `title_slogan`
--

INSERT INTO `title_slogan` (`id`, `title`, `slogan`, `logo`) VALUES
(1, 'Md Jannatul Ferdhous Emon', '19CSE049', 'upload/logo.png');

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE `user` (
  `id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  `username` varchar(50) NOT NULL,
  `password` varchar(32) NOT NULL,
  `email` varchar(255) NOT NULL,
  `details` text NOT NULL,
  `role` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`id`, `name`, `username`, `password`, `email`, `details`, `role`) VALUES
(2, 'Emon', 'emon', '81dc9bdb52d04dc20036dbd8313ed055', 'emon@gmail.com', '<p>fsdgsgaeherh</p>', 0),
(7, '', 'editor', '202cb962ac59075b964b07152d234b70', 'editor@gmail.com', '', 2),
(8, 'Author', 'author', '202cb962ac59075b964b07152d234b70', 'author@gmail.com', '<p>I am an author of this website.&nbsp;</p>', 1),
(10, '', 'rasul', '0f1aec497ce316c37281bd7d56b14a4b', 'rasul@gmail.com', '', 1),
(12, 'Habiba Akter', 'habiba', '5b91e7de95d0972d00ef0cb8321b1ec3', 'habi@mail.com', '', 0),
(17, '', 'user', 'ee11cbb19052e40b07aac0ca060c23ee', 'user@gmail.com', '', 3);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `category`
--
ALTER TABLE `category`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `contact`
--
ALTER TABLE `contact`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `footer`
--
ALTER TABLE `footer`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `page`
--
ALTER TABLE `page`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `post`
--
ALTER TABLE `post`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `slider`
--
ALTER TABLE `slider`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `social`
--
ALTER TABLE `social`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `theme`
--
ALTER TABLE `theme`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `title_slogan`
--
ALTER TABLE `title_slogan`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `username_2` (`username`),
  ADD KEY `username` (`username`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `category`
--
ALTER TABLE `category`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `contact`
--
ALTER TABLE `contact`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `footer`
--
ALTER TABLE `footer`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `page`
--
ALTER TABLE `page`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `post`
--
ALTER TABLE `post`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `slider`
--
ALTER TABLE `slider`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT for table `social`
--
ALTER TABLE `social`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `theme`
--
ALTER TABLE `theme`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `title_slogan`
--
ALTER TABLE `title_slogan`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `user`
--
ALTER TABLE `user`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=18;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
