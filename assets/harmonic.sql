-- phpMyAdmin SQL Dump
-- version 4.9.5deb2
-- https://www.phpmyadmin.net/
--
-- Host: localhost:3306
-- Generation Time: Aug 30, 2020 at 12:51 AM
-- Server version: 8.0.21-0ubuntu0.20.04.4
-- PHP Version: 7.4.3

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `harmonic`
--

-- --------------------------------------------------------

--
-- Table structure for table `genres`
--

CREATE TABLE `genres` (
  `id` int NOT NULL,
  `tag` varchar(255) NOT NULL,
  `active` int NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `genres`
--

INSERT INTO `genres` (`id`, `tag`, `active`) VALUES
(1, 'Rap', 1),
(2, 'Pop\r\n', 1),
(3, 'HipHip', 1),
(4, 'KPop', 1);

-- --------------------------------------------------------

--
-- Table structure for table `matches`
--

CREATE TABLE `matches` (
  `id` int NOT NULL,
  `user1` int NOT NULL,
  `user2` int NOT NULL,
  `active` int NOT NULL DEFAULT '1'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `matches`
--

INSERT INTO `matches` (`id`, `user1`, `user2`, `active`) VALUES
(1, 2, 4, 1),
(2, 2, 5, 1),
(3, 5, 4, 1);

-- --------------------------------------------------------

--
-- Table structure for table `sessions`
--

CREATE TABLE `sessions` (
  `id` int NOT NULL,
  `userid` int NOT NULL,
  `ip` varchar(255) NOT NULL,
  `token` varchar(255) NOT NULL,
  `time` int NOT NULL,
  `active` int NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `sessions`
--

INSERT INTO `sessions` (`id`, `userid`, `ip`, `token`, `time`, `active`) VALUES
(1, 2, '127.0.0.1', '2a910556855b0743ae5d08d1951d23c1ea9c459cff47fdbd98c55ebc2b96f87a', 1598638946, 0),
(2, 2, '127.0.0.1', '72c9121297c5a7ffcf25281598681082501a94d4376824affc7ead6b5673fc06', 1598638959, 0),
(3, 2, '127.0.0.1', '80f580bb3ac5e5e0f338fe028fe16dac3d063721b16281462233eaad9bbfe000', 1598639186, 0),
(5, 2, '127.0.0.1', 'b856a49239edd9859d715af0b06869f4a64fbcecda8a3ed8acb7c54fee7681f6', 1598640480, 0),
(6, 2, '127.0.0.1', 'c8cfed3d0950f44033917c245bf36d386d1e116412c7d0bfcaf3c4b2a6eaf41e', 1, 0),
(7, 2, '127.0.0.1', 'b3a0de5609b10de41a7ff9b35c901786d8906f1eff64d8f9f4fa3cedfb69d62c', 1598640511, 0),
(8, 2, '127.0.0.1', 'a3b50b5a9b0b960cf80fac1734c0afe93edf3db35775827cc9c3cb80b9b5f5b1', 1598643632, 0),
(9, 2, '127.0.0.1', '4d6f3bb12fad16abaa82601a3cc048c7aaf34fc3066dc416b997abfacd8c397b', 1598653042, 0),
(10, 3, '127.0.0.1', '324d083a8e044cc878b59c7a36281090d5cbf2e0aaa2782ae329e5ae7c7c4c1e', 1598682560, 0),
(11, 2, '127.0.0.1', 'f5d2a9f69723bc7474f8586bb5c03eb0675d3ad1cb8ecc85e24aa883d60c74c3', 1598685253, 0),
(12, 2, '127.0.0.1', 'aa3fbed7e7a1b36725e7914c6d60aabccb3a406bac5ec95deeb09bd2da3fa0b6', 1598685618, 0),
(13, 2, '127.0.0.1', 'c26bb4d0de63ff25912759736259b2d03d16e6060437f7756600d4584423eac3', 1598685652, 0),
(14, 2, '127.0.0.1', 'dc55afc47533621d96ae2e8390932c520da40bb227b03b48d1fe26cb2da8a1a1', 1598687465, 0),
(15, 2, '127.0.0.1', '04a7fa52070edac947dd26457f9e38a00194ec9f71f2918cb956e6efb8859a8a', 1598689563, 0),
(16, 2, '127.0.0.1', 'cb0b3db365ed0c9450f13c997cd71ba78de93edbd5b88f7c2a2f52fcd454475b', 1598691745, 0),
(17, 2, '127.0.0.1', '35fe1d3a6d08222487cdeef04228ff23a7f37871b3f8817756b1c2f50b9574ad', 1598695838, 0),
(18, 2, '127.0.0.1', 'a6b34b8eb4361291aa0b6057fa372a155e2711b0acc1b3828e48ea88547020ac', 1598697993, 0),
(19, 2, '127.0.0.1', 'd36bca3fabd29bc186063097c02c3d3b1de21bb106b5eb0cb681e9c1fa0ba715', 1598700187, 0),
(20, 2, '127.0.0.1', '10b7e204338a0d837f2492585ddcb899dc0251b63b0d096c14f91481d380e808', 1598702118, 0),
(21, 4, '127.0.0.1', '58cd5532c989356470db4382670c1788ab6da4f0670551e1ae30e56e518588c5', 1598702653, 0),
(22, 2, '127.0.0.1', '206b92e22e20c988311aee7f11e4894483b3cbfda39dffda30e7054c6df134e7', 1598702676, 0),
(23, 5, '127.0.0.1', '9da204a36b9d18c63c6b1a9b190de071c5d8c0daf59c914f73037f650d1b3fd4', 1598704434, 0),
(24, 2, '127.0.0.1', 'd137822d4cea74ff2c9cbb0391bb97c00cae2834d9aec03fa01cf53ed4ff1933', 1598704454, 0),
(25, 2, '127.0.0.1', '4e125f017f0bc4fe42588b8ffd60939b4f2febebd3917bc1ce26eee743ca7685', 1598704511, 0),
(26, 4, '127.0.0.1', 'c1852da98780707728c8f46ad8e63973e540822fb79f6c210cf2401fe1ded3b4', 1598704560, 0),
(27, 5, '127.0.0.1', 'dcc8ab2e6cb99ba5db140e18f38e6a7cca01834640f1a60fadcdcd2bc7b89ae6', 1598704577, 0),
(28, 2, '127.0.0.1', '20551b38bdf012d50fcabc0f91a190e71b0db5e3105e3881e3ca2c9a816cd75a', 1598704787, 0),
(29, 2, '127.0.0.1', '19e3200c0542b603788974938e777141e4df8bdd3025d2651846a6d5b08b19bf', 1598705169, 0),
(30, 5, '127.0.0.1', 'c4a8f8801142cb8f8b64799fc409958149114c0df5a3a6792fc1a74390cca20d', 1598705213, 0),
(31, 2, '127.0.0.1', '3c79f089b18747a7935252e5b59779bffa1baf47fc207aeb2befeff80220475e', 1598705274, 0),
(32, 2, '127.0.0.1', '86d8fb091f3694548d5e7aba9aa032330346e711ce714a4ed4d35539092f0644', 1598709138, 0),
(33, 2, '127.0.0.1', 'd307b8653d7f847cd2d5c95fac8e87bdc37581308144dabae1b4661f1f52a726', 1598710238, 0),
(34, 2, '127.0.0.1', '2b9908189f775ccf447a2ae15d0bc00e1420cc6ac24d6167afc34f5877a5159f', 1598711374, 1);

-- --------------------------------------------------------

--
-- Table structure for table `swipes`
--

CREATE TABLE `swipes` (
  `id` int NOT NULL,
  `userid` int NOT NULL,
  `targetid` int NOT NULL,
  `swiped` int NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `swipes`
--

INSERT INTO `swipes` (`id`, `userid`, `targetid`, `swiped`) VALUES
(1, 123123, 1231231, 1),
(2, 1231231, 3123213, 1),
(3, 1232131, 123131, 1),
(4, 1231231, 12312312, 1),
(5, 21312312, 1123123, 1),
(6, 123123, 123131, 0),
(7, 1232131, 31231231, 1),
(8, 123123, 1, 1),
(9, 4123123, 2, 1),
(10, 4123123, 3, 1),
(11, 123123, 1, 1),
(12, 123123, 3, 1),
(13, 123123, 4, 1),
(14, 12312, 1, 1),
(15, 5123123, 2, 1),
(16, 1231, 3, 1),
(17, 512312, 4, 1),
(18, 123, 1, 1),
(19, 1231, 3, 1),
(20, 12312, 4, 1),
(21, 12312, 5, 1),
(22, 2, 1, 1),
(23, 2, 3, 1),
(24, 2, 4, 0),
(25, 2, 5, 0),
(26, 4, 1, 1),
(27, 4, 2, 1),
(28, 4, 3, 1),
(29, 4, 5, 1),
(30, 5, 1, 1),
(31, 5, 2, 1),
(32, 5, 3, 1),
(33, 5, 4, 1);

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int NOT NULL,
  `name` varchar(255) NOT NULL,
  `username` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `roles` int NOT NULL,
  `gender` int NOT NULL,
  `bio` varchar(999) NOT NULL,
  `pfp` varchar(255) NOT NULL,
  `genre` varchar(500) NOT NULL,
  `songs` varchar(999) NOT NULL,
  `level` int NOT NULL,
  `active` int NOT NULL DEFAULT '1'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `name`, `username`, `password`, `roles`, `gender`, `bio`, `pfp`, `genre`, `songs`, `level`, `active`) VALUES
(1, 'sdsad', '3123', '$2y$10$nTxDHxzjs4JaD2bRMieP/OboK6jTG89mKjxzlwQQwtgj/L9jLiPVi', 1, 1, 'asdas', 'asdas', 'asdasd', 'asdasd', 1, 1),
(2, 'jacky', 'jacky', '$2y$10$l5D7L7QmI/XiPzP5K9Zgq.AyQYXMdSicxM7LhHJU3YAYAEuIO3SQS', 1, 1, 'Jacky', 'Jacky', '[\"1\"]', '[\"jacky\"]', 2, 1),
(3, 'kite', 'kite', '$2y$10$vX8jG/3Oa8eo.f7WXglh6eB2dMaYq7xJ2puOYzZwHARZOlUcH2U4a', 2, 2, 'kite', 'kite', '2', 'kite', 1, 1),
(4, 'jacky2', 'jacky2', '$2y$10$MDg4awq7JwBTbqXXrbmA8uU7TeQkeYDJeYQ8WaucKEa4OnTdYJMDW', 3, 1, 'jacky2', 'jacky2', '1', 'jacky2', 1, 1),
(5, 'jacky', 'jacky3', '$2y$10$GiNcQjoiMiGr8tBu8po/Qu2KlaCh.Ngpk6aPZeOaurXXeipaIDEIS', 2, 1, 'jacky3', 'jacky3', '2', 'jacky3', 1, 1);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `genres`
--
ALTER TABLE `genres`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `matches`
--
ALTER TABLE `matches`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `sessions`
--
ALTER TABLE `sessions`
  ADD PRIMARY KEY (`id`),
  ADD KEY `id` (`id`);

--
-- Indexes for table `swipes`
--
ALTER TABLE `swipes`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `genres`
--
ALTER TABLE `genres`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `matches`
--
ALTER TABLE `matches`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `sessions`
--
ALTER TABLE `sessions`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=35;

--
-- AUTO_INCREMENT for table `swipes`
--
ALTER TABLE `swipes`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=34;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
