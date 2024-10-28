-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jun 08, 2024 at 03:16 PM
-- Server version: 10.4.32-MariaDB
-- PHP Version: 8.2.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `todolist`
--

-- --------------------------------------------------------

--
-- Table structure for table `todonotes`
--

CREATE TABLE `todonotes` (
  `notesID` varchar(200) NOT NULL,
  `user_Id` varchar(200) NOT NULL,
  `topic` varchar(200) NOT NULL,
  `expenses` int(11) NOT NULL,
  `initialDtTime` datetime NOT NULL DEFAULT current_timestamp(),
  `updateTime` datetime NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `todonotes`
--

INSERT INTO `todonotes` (`notesID`, `user_Id`, `topic`, `expenses`, `initialDtTime`, `updateTime`) VALUES
('notes-664daeadccdef', 'user-664dada1bafe2', 'laptop', 50000, '2024-05-22 14:07:01', '2024-05-22 14:07:01'),
('notes-664daebbaabb5', 'user-664dada1bafe2', 'phone', 25000, '2024-05-22 14:07:15', '2024-05-22 14:07:15'),
('notes-664daee9670d4', 'user-664dada1bafe2', 'laptop', 75000, '2024-05-22 14:08:01', '2024-05-22 14:08:01'),
('notes-6664201dd0a23', 'user-6664200be82bc', 'laptop', 100000, '2024-06-08 14:40:53', '2024-06-08 14:41:33');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `user_Id` varchar(150) NOT NULL,
  `email_id` varchar(200) NOT NULL,
  `password` text NOT NULL,
  `name` varchar(100) NOT NULL,
  `gender` varchar(10) NOT NULL,
  `profilePic` text NOT NULL,
  `createdAt` datetime NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`user_Id`, `email_id`, `password`, `name`, `gender`, `profilePic`, `createdAt`) VALUES
('user-664b59981c4fe', 'utsabsarkar00@gmail.com', '$2y$10$OsPZGKH79duw2rE8QB54FOECL12t8Hn0o./6z00sAjFHoCxTHOE1i', 'utsab sarkar', 'male', 'https://images.sftcdn.net/images/t_app-cover-l,f_auto/p/e76d4296-43f3-493b-9d50-f8e5c142d06c/2117667014/boys-profile-picture-screenshot.png', '2024-05-20 19:39:28'),
('user-664dada1bafe2', 'kabitadas67069@gmail.com', '$2y$10$sa2AjTuErS/8Fu/uJcUa..3aAyiyQDAa95v.cFz1y2b.npbyDpozq', 'Kabita Das', 'female', 'https://cdn4.sharechat.com/compressed_gm_40_img_781769_37704dec_1692977776995_sc.jpg?tenant=sc&referrer=pwa-sharechat-service&f=995_sc.jpg', '2024-05-22 14:02:33'),
('user-665aef514e407', 'routhr099@gmail.com', '$2y$10$4HVqGTlMQFqWY538n0C8cO2CKvjeussO5fhE/4tBzVysnjmj4hXIi', 'rahul', 'male', 'https://images.sftcdn.net/images/t_app-cover-l,f_auto/p/e76d4296-43f3-493b-9d50-f8e5c142d06c/2117667014/boys-profile-picture-screenshot.png', '2024-06-01 15:22:17'),
('user-6662aac7040a8', 'asimchakra60@gmail.com', '$2y$10$pjZz/ZuC0CKxMnbFEUY7lOzo3YVobMA7CZCx6cXDFobMTXdW99Oiy', 'Asim Chakraborty', 'male', 'https://images.sftcdn.net/images/t_app-cover-l,f_auto/p/e76d4296-43f3-493b-9d50-f8e5c142d06c/2117667014/boys-profile-picture-screenshot.png', '2024-06-07 12:07:59'),
('user-6664200be82bc', 'gourabbatabyal12345@gmail.com', '$2y$10$gNvm1btH30orms9KkklBQ.JcyF1W7FElDc6glgY012koNxQ0GIxLS', 'Grb', 'male', 'https://images.sftcdn.net/images/t_app-cover-l,f_auto/p/e76d4296-43f3-493b-9d50-f8e5c142d06c/2117667014/boys-profile-picture-screenshot.png', '2024-06-08 14:40:36');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `todonotes`
--
ALTER TABLE `todonotes`
  ADD PRIMARY KEY (`notesID`),
  ADD KEY `todonotes_ibfk_1` (`user_Id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`user_Id`),
  ADD UNIQUE KEY `email_id` (`email_id`);

--
-- Constraints for dumped tables
--

--
-- Constraints for table `todonotes`
--
ALTER TABLE `todonotes`
  ADD CONSTRAINT `todonotes_ibfk_1` FOREIGN KEY (`user_Id`) REFERENCES `users` (`user_Id`) ON DELETE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
