-- phpMyAdmin SQL Dump
-- version 4.7.7
-- https://www.phpmyadmin.net/
--
-- Host: localhost:3306
-- Generation Time: May 23, 2018 at 05:26 PM
-- Server version: 5.6.38
-- PHP Version: 5.6.30

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `digitali_kivi`
--

-- --------------------------------------------------------

--
-- Table structure for table `about`
--

CREATE TABLE `about` (
  `ID` int(10) UNSIGNED NOT NULL,
  `image` varchar(255) NOT NULL,
  `text` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `about`
--

INSERT INTO `about` (`ID`, `image`, `text`) VALUES
(1, '67d2d7235492d5c281ac4082ea031920.jpg', 'Latvijas UniversitÄtes SociÄlo zinÄtÅ†u fakultÄtÄ“ (LU SZF) veidots televÄ«zijas raidÄ«jums, ko katru piektdienu demonstrÄ“ Facebook un YouTube plkst. 18.00.\r\n\r\nDirected By\r\nRolands Tjarve, Roberts VÄ«ksne\r\n\r\nWritten By\r\nRolands Tjarve');

-- --------------------------------------------------------

--
-- Table structure for table `comments`
--

CREATE TABLE `comments` (
  `ID` int(10) UNSIGNED NOT NULL,
  `scenes_id` int(10) UNSIGNED NOT NULL,
  `user_id` int(10) UNSIGNED NOT NULL,
  `timestamp` int(10) UNSIGNED NOT NULL,
  `text` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `comments`
--

INSERT INTO `comments` (`ID`, `scenes_id`, `user_id`, `timestamp`, `text`) VALUES
(1, 1, 6, 1526404480, 'mega super test'),
(2, 2, 6, 1525404480, 'asdasdas'),
(3, 2, 6, 1526414480, 'adsasdas'),
(4, 1, 6, 1525403460, 'asfsadfsdfsd'),
(5, 2, 6, 1526404480, 'comm lastest'),
(6, 2, 6, 1525404480, 'comm lastest2'),
(7, 1, 6, 1526491830, 'asd'),
(8, 2, 6, 1526491893, 'test'),
(9, 1, 6, 1526826080, 'dgdfg'),
(10, 1, 6, 1526826919, 'asdssadasdasdas\r\nasdasd'),
(11, 1, 6, 1526827047, 'gfg'),
(12, 3, 6, 1526827586, 'jhjhh'),
(13, 5, 11, 1526892072, 'ads'),
(14, 5, 11, 1526901958, 'Test admin'),
(15, 5, 11, 1526911032, 'labs'),
(16, 5, 11, 1526970114, 'heya'),
(17, 3, 15, 1526977703, 'smile\r\n\r\nsmile');

-- --------------------------------------------------------

--
-- Table structure for table `contacts`
--

CREATE TABLE `contacts` (
  `ID` int(10) UNSIGNED NOT NULL,
  `facebook` varchar(255) NOT NULL,
  `youtube` varchar(255) NOT NULL,
  `instagram` varchar(255) NOT NULL,
  `latitude` varchar(255) NOT NULL,
  `longitude` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `address` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `contacts`
--

INSERT INTO `contacts` (`ID`, `facebook`, `youtube`, `instagram`, `latitude`, `longitude`, `email`, `address`) VALUES
(1, 'https://lv-lv.facebook.com/KiviTV', 'https://www.youtube.com/user/KIVITVLv', 'https://www.instagram.com/kivi_tv/', '56.939890', '24.156814', 'info@kivi.lv', 'RÄ«ga, Lomonosova iela');

-- --------------------------------------------------------

--
-- Table structure for table `friends`
--

CREATE TABLE `friends` (
  `ID` int(10) UNSIGNED NOT NULL,
  `image` varchar(255) NOT NULL,
  `name` varchar(255) NOT NULL,
  `url` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `friends`
--

INSERT INTO `friends` (`ID`, `image`, `name`, `url`) VALUES
(2, 'de920edd50fed01fbfdc924e6a58fd05.png', 'Lu', ''),
(4, '9bf5678ea7060720233ba926c7e73fe8.png', 's', 'www.google.com'),
(5, 'ee17e64750e295994282871bb7c1ed4a.png', '1', ''),
(7, 'd0224aa96a401953b723eeab39e03587.jpg', 'asdasd', ''),
(8, '89f41bef97b8472b2f5646fc1afa9989.jpg', 'asdas', 'sdsf'),
(9, 'db52af3ac967ac81daa171510cbc85c9.jpg', 'asdasd', 'http://www.president.lv/');

-- --------------------------------------------------------

--
-- Table structure for table `gallery`
--

CREATE TABLE `gallery` (
  `ID` int(10) UNSIGNED NOT NULL,
  `name` varchar(255) NOT NULL,
  `image` varchar(255) NOT NULL,
  `description` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `gallery`
--

INSERT INTO `gallery` (`ID`, `name`, `image`, `description`) VALUES
(1, 'first', '1.jpg', 'asdas dasd as'),
(2, 'second23', '59786a71d46fc4841e40f2d83c7b59a6.jpg', 'ad asdasas ads sa23 iaperugnpfwdcmk'),
(5, 'asdasd', '8b5837ae0801550cabed70185532b532.jpg', 'asdas'),
(6, 'asfsasfsasfsasfsasfsasfsasfsasfsa', '138c183994261877c3dd5650b4209722.jpg', 'asdsfasdsfasdsfasdsfasdsfasdsfasdsfasdsfasdsfasdsfasdsfasdsfasdsfasdsfasdsfasdsfasdsfasdsfasdsfasdsfasdsfasdsfasdsfasdsfasdsfasdsfasdsfasdsfasdsfasdsfasdsfasdsfasdsfasdsfasdsfasdsfasdsfasdsfasdsfasdsfasdsfasdsfasdsfasdsfasdsfasdsfasdsfasdsfasdsf'),
(7, 'asdsa', 'a1ec2e2d7ac4439286d543210015df83.jpg', 'asdsad'),
(9, 'Koala', '392480288d456afc54d29a9e1dd7e2e2.jpg', 'Koalas apraksts');

-- --------------------------------------------------------

--
-- Table structure for table `members`
--

CREATE TABLE `members` (
  `ID` int(10) UNSIGNED NOT NULL,
  `image` varchar(255) NOT NULL,
  `name` varchar(255) NOT NULL,
  `description` varchar(255) NOT NULL,
  `season_id` int(10) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `members`
--

INSERT INTO `members` (`ID`, `image`, `name`, `description`, `season_id`) VALUES
(1, '3b6e2087f5dde0b2eabc397b505eba97.png', 'Laura Vizule', 'Lorem ipsum lala', 6),
(2, 'faadb7f54d17b3e45ebd56dddb32afaf.jpg', 'second2', 'ad asdasas ads sa2', 2),
(4, '762a084e76f3e2a92fa3fe39c1b39ccf.png', 'Laura Vizule', 'Laura Vizule', 6),
(5, '033a9d77edad23f3163c565ed7443149.png', 'Laura Vizule', 'Laura Vizule', 6),
(8, 'ca5922bf4996079ed1aae41f60ed86db.jpg', 'Laura Vizule', 'Laura Vizule', 5);

-- --------------------------------------------------------

--
-- Table structure for table `scenes`
--

CREATE TABLE `scenes` (
  `ID` int(10) UNSIGNED NOT NULL,
  `title` varchar(255) NOT NULL,
  `youtube` varchar(255) NOT NULL,
  `text` text NOT NULL,
  `season_id` int(10) UNSIGNED NOT NULL,
  `categories` varchar(255) NOT NULL,
  `counter` int(10) UNSIGNED NOT NULL,
  `rating` int(10) UNSIGNED NOT NULL,
  `timestamp` int(10) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `scenes`
--

INSERT INTO `scenes` (`ID`, `title`, `youtube`, `text`, `season_id`, `categories`, `counter`, `rating`, `timestamp`) VALUES
(1, 'scene1', 'https://www.youtube.com/watch?v=bKFwcGahCAA', 'simple texht\r\nsimple texht\r\nasdas', 2, 'lal,baba,ads', 183, 4, 1525404480),
(2, 'scene2', 'https://www.youtube.com/watch?v=OcQ_SY1WuXs', 'adsasds', 2, 'lal,baba', 14, 1, 1525404480),
(3, 'scene3', 'https://www.youtube.com/watch?v=bKFwcGahCAA', 'adsasds', 2, 'lal,baba', 60, 1, 1525404480);

-- --------------------------------------------------------

--
-- Table structure for table `seasons`
--

CREATE TABLE `seasons` (
  `ID` int(10) UNSIGNED NOT NULL,
  `name` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `seasons`
--

INSERT INTO `seasons` (`ID`, `name`) VALUES
(2, '13.sezona'),
(5, '14.sezona'),
(6, '15.sezona'),
(10, '10 sezona');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `ID` int(10) UNSIGNED NOT NULL,
  `name` varchar(255) NOT NULL,
  `surname` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `status` int(10) UNSIGNED NOT NULL,
  `role` int(10) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`ID`, `name`, `surname`, `email`, `password`, `status`, `role`) VALUES
(9, 'asfdfasd', 'fasf', 'asdas@asd', '7e240de74fb1ed08fa08d38063f6a6a91462a815', 0, 1),
(10, 'sdfddsf', 'sdfd', 'sdfkjk@okjg.lv', '6216f8a75fd5bb3d5f22b6f9958cdede3fc086c2', 1, 2),
(11, 'Admin', 'Admin', 'admin@admin.lv', 'f865b53623b121fd34ee5426c792e5c33af8c227', 1, 3),
(12, 'Test', 'Test', 'test@test.lv', 'a94a8fe5ccb19ba61c4c0873d391e987982fbbd3', 1, 2),
(13, 'Banis', 'Berzins', 'jberzins@example.com', '5c2dd944dde9e08881bef0894fe7b22a5c9c4b06', 1, 2),
(15, 'Test', 'Moderators', 'mod@info.com', '7288edd0fc3ffcbe93a0cf06e3568e28521687bc', 1, 2),
(16, 'a', 'a', 'asdasd@asdad.lv', 'f7a9e24777ec23212c54d7a350bc5bea5477fdbb', 1, 1),
(17, 'a2', 'a2', 'asdasd@asdad.lv2', 'f7a9e24777ec23212c54d7a350bc5bea5477fdbb', 1, 1),
(18, 'a22', 'a22', 'asdasd@asdad.lv22', 'f7a9e24777ec23212c54d7a350bc5bea5477fdbb', 1, 1),
(19, 'aa', 'aa', 'bb@bb.lv', 'f7a9e24777ec23212c54d7a350bc5bea5477fdbb', 1, 1),
(20, 'a', 'a', 'asdasd@asdad222.lv', 'f7a9e24777ec23212c54d7a350bc5bea5477fdbb', 1, 1),
(21, 'a', 'a', 'asdasd@asdad.lv222', 'f7a9e24777ec23212c54d7a350bc5bea5477fdbb', 1, 1),
(25, 'asd', 'asd', 'asd@asd.lv', '7c4a8d09ca3762af61e59520943dc26494f8941b', 1, 1),
(26, 'User', 'One', 'user@info.com', '9ac20922b054316be23842a5bca7d69f29f69d77', 1, 1);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `about`
--
ALTER TABLE `about`
  ADD PRIMARY KEY (`ID`);

--
-- Indexes for table `comments`
--
ALTER TABLE `comments`
  ADD PRIMARY KEY (`ID`);

--
-- Indexes for table `contacts`
--
ALTER TABLE `contacts`
  ADD PRIMARY KEY (`ID`);

--
-- Indexes for table `friends`
--
ALTER TABLE `friends`
  ADD PRIMARY KEY (`ID`);

--
-- Indexes for table `gallery`
--
ALTER TABLE `gallery`
  ADD PRIMARY KEY (`ID`);

--
-- Indexes for table `members`
--
ALTER TABLE `members`
  ADD PRIMARY KEY (`ID`);

--
-- Indexes for table `scenes`
--
ALTER TABLE `scenes`
  ADD PRIMARY KEY (`ID`);

--
-- Indexes for table `seasons`
--
ALTER TABLE `seasons`
  ADD PRIMARY KEY (`ID`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`ID`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `about`
--
ALTER TABLE `about`
  MODIFY `ID` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `comments`
--
ALTER TABLE `comments`
  MODIFY `ID` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=18;

--
-- AUTO_INCREMENT for table `contacts`
--
ALTER TABLE `contacts`
  MODIFY `ID` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `friends`
--
ALTER TABLE `friends`
  MODIFY `ID` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT for table `gallery`
--
ALTER TABLE `gallery`
  MODIFY `ID` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `members`
--
ALTER TABLE `members`
  MODIFY `ID` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `scenes`
--
ALTER TABLE `scenes`
  MODIFY `ID` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `seasons`
--
ALTER TABLE `seasons`
  MODIFY `ID` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `ID` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=27;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
