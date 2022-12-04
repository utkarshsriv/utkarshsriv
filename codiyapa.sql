-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: localhost:3306
-- Generation Time: Dec 04, 2022 at 06:46 AM
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
-- Database: `codiyapa`
--

-- --------------------------------------------------------

--
-- Table structure for table `categories`
--

CREATE TABLE `categories` (
  `categorie_id` int(11) NOT NULL,
  `categorie_name` varchar(255) NOT NULL,
  `categorie_description` varchar(255) NOT NULL,
  `create_time` datetime NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `categories`
--

INSERT INTO `categories` (`categorie_id`, `categorie_name`, `categorie_description`, `create_time`) VALUES
(1, 'C LANGUAGE', 'C is a general-purpose computer programming language. It was created in the 1970s by Dennis Ritchie, and remains very widely used and influential. By design, C\'s features cleanly reflect the capabilities of the targeted CPUs.', '2022-10-03 01:45:18'),
(2, 'C++', 'C++ is a general-purpose programming language created by Danish computer scientist Bjarne Stroustrup as an extension of the C programming language, or \"C with Classes\". ', '2022-08-30 15:33:24'),
(3, 'JAVA', 'Java is a high-level, class-based, object-oriented programming language that is designed to have as few implementation dependencies as possible.', '2022-08-30 15:34:09'),
(4, 'PYTHON', 'Python is a high-level, general-purpose programming language. Its design philosophy emphasizes code readability with the use of significant indentation. Python is dynamically-typed and garbage-collected. It supports multiple programming paradigms, includi', '2022-08-30 15:34:54'),
(5, 'JAVASCRIPT ', 'JavaScript, often abbreviated to JS, is a programming language that is one of the core technologies of the World Wide Web, alongside HTML and CSS. As of 2022, 98% of websites use JavaScript on the client side for ', '2022-09-03 18:48:46'),
(6, 'HTML', 'The HyperText Markup Language or HTML is the standard markup language for documents designed to be displayed in a web browser. It can be assisted by technologies such as Cascading Style Sheets and scripting languages such as JavaScript. Wikipedia\n', '2022-09-03 18:49:21'),
(7, 'CSS', 'Cascading Style Sheets is a style sheet language used for describing the presentation of a document written in a markup language such as HTML or XML. CSS is a cornerstone technology of the World Wide Web, alongside HTML and JavaScript. ', '2022-09-03 18:50:12');

-- --------------------------------------------------------

--
-- Table structure for table `comments`
--

CREATE TABLE `comments` (
  `comment_id` int(11) NOT NULL,
  `comment_content` text NOT NULL,
  `comment_by` varchar(255) NOT NULL,
  `thread_id` int(11) NOT NULL,
  `comment_time` datetime NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `thread`
--

CREATE TABLE `thread` (
  `thread_id` int(11) NOT NULL,
  `thread_title` varchar(255) NOT NULL,
  `thread_desc` text NOT NULL,
  `thread_cat_id` int(11) NOT NULL,
  `thread_user_id` varchar(255) NOT NULL,
  `timestamp` datetime NOT NULL DEFAULT current_timestamp(),
  `thread_img` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `thread`
--

INSERT INTO `thread` (`thread_id`, `thread_title`, `thread_desc`, `thread_cat_id`, `thread_user_id`, `timestamp`, `thread_img`) VALUES
(1, ' Why is C the best programming language?', '&lt;p&gt;Actually many people suggests me for learning c so i dont know the reason behind it can anyone explain here??&lt;/p&gt;\r\n\r\n&lt;p&gt;&nbsp;&lt;/p&gt;\r\n', 0, '', '2022-09-28 22:09:28', '1'),
(2, ' Why is C the best programming language?', '&lt;p&gt;Actually many people suggests me for learning c so i dont know the reason behind it can anyone explain here??&lt;/p&gt;\r\n\r\n&lt;p&gt;&nbsp;&lt;/p&gt;\r\n', 0, '', '2022-09-28 22:09:40', '1'),
(3, ' Why is C the best programming language?', '&lt;p&gt;Actually many people suggests me for learning c so i dont know the reason behind it can anyone explain here??&lt;/p&gt;\r\n\r\n&lt;p&gt;&nbsp;&lt;/p&gt;\r\n', 0, '', '2022-09-28 22:21:05', '1'),
(4, ' Why is C the best programming language?', '&lt;p&gt;Actually many people suggests me for learning c so i dont know the reason behind it can anyone explain here??&lt;/p&gt;\r\n\r\n&lt;p&gt;&nbsp;&lt;/p&gt;\r\n', 0, '', '2022-09-28 22:23:42', '1');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `user_id` int(11) NOT NULL,
  `user_firstname` varchar(30) NOT NULL,
  `user_lastname` varchar(30) NOT NULL,
  `user_emailid` varchar(52) NOT NULL,
  `user_password` varchar(255) NOT NULL,
  `user_username` varchar(10) NOT NULL,
  `user_city` varchar(255) NOT NULL,
  `user_state` varchar(255) NOT NULL,
  `time_created` datetime NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`user_id`, `user_firstname`, `user_lastname`, `user_emailid`, `user_password`, `user_username`, `user_city`, `user_state`, `time_created`) VALUES
(1, 'Utkarsh', 'Srivastava', 'hr@gmail.com', '$2y$10$mUMRHqfX7VVJWtARCgCOD.2SyYuHwfETCTkl98AnmnumO95UWLbPu', 'Utkarsh sr', 'Lucknow', 'Uttar Pradesh', '2022-10-04 12:50:25'),
(3, 'Utkarsh', 'Srivastava', 'lucky@gmail.com', '$2y$10$cWVNiH5b.Z8tJjIRgUbi.Oy5MSWUs83j.xZuAdHxV954f2iqhOTZ6', 'Arsh', 'Lucknow', 'Uttar Pradesh', '2022-10-04 12:52:21'),
(5, 'Utkarsh', 'Srivastava', 'lucky2@gmail.com', '$2y$10$vNp9nvZdMXP5YFPs5tgJnuu/mPGx5KPmbx61cS4hz8ma89V2pdIKq', 'Arsh0', 'Lucknow', 'Uttar Pradesh', '2022-10-04 13:24:22'),
(8, 'Utkarsh', 'Srivastava', 'vt87@gmail.com', '$2y$10$2AZ4thxX9D3oxV4DL0Eyoed01/1.YDvbiEZfHqEjXN8ZYbtPv6n1m', 'Lucky ', 'Lucknow', 'Uttar Pradesh', '2022-10-04 13:34:42'),
(16, 'Utkarsh', 'Srivastava', 'hr22@gmail.com', '$2y$10$EBBondb69Z0v9b0uasU./OnbQMTALCXXSE5t3XV.3CNPvMF9HbWlu', 'Arsh212', 'Lucknow', 'Uttar Pradesh', '2022-10-04 13:44:00'),
(34, 'Utkarsh', 'Srivastava', 'hr221@gmail.com', '$2y$10$LgMUPyk0L8NiFAYzjEyvgewV8TGLcs71IwkXbubbgrNvCuULZjY6K', 'Utkarsh0 s', 'Lucknow', 'Uttar Pradesh', '2022-10-04 14:08:07'),
(36, 'Utkarsh', 'Srivastava', 'lsri8462@gmail.com', '$2y$10$lARpkl36bHfnLMLOI5iS8O6h5Hng7S23vqiB0/sMdINkSOzGiWj96', 'Lucky01', 'Lucknow', 'Uttar Pradesh', '2022-10-04 14:57:35');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `categories`
--
ALTER TABLE `categories`
  ADD PRIMARY KEY (`categorie_id`),
  ADD UNIQUE KEY `categorie_id` (`categorie_id`);

--
-- Indexes for table `comments`
--
ALTER TABLE `comments`
  ADD PRIMARY KEY (`comment_id`);

--
-- Indexes for table `thread`
--
ALTER TABLE `thread`
  ADD PRIMARY KEY (`thread_id`);
ALTER TABLE `thread` ADD FULLTEXT KEY `thread_title` (`thread_title`,`thread_desc`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`user_id`),
  ADD UNIQUE KEY `user_username` (`user_username`),
  ADD UNIQUE KEY `user_emailid` (`user_emailid`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `categories`
--
ALTER TABLE `categories`
  MODIFY `categorie_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=25;

--
-- AUTO_INCREMENT for table `comments`
--
ALTER TABLE `comments`
  MODIFY `comment_id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `thread`
--
ALTER TABLE `thread`
  MODIFY `thread_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `user_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=40;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
