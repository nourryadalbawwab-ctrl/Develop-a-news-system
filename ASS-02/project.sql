-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: localhost:3306
-- Generation Time: May 31, 2026 at 02:22 PM
-- Server version: 10.4.32-MariaDB
-- PHP Version: 8.1.25

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `project`
--

-- --------------------------------------------------------

--
-- Table structure for table `categorys`
--

CREATE TABLE `categorys` (
  `id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `categorys`
--

INSERT INTO `categorys` (`id`, `name`) VALUES
(2, 'political'),
(6, 'sport'),
(7, 'Cultural');

-- --------------------------------------------------------

--
-- Table structure for table `news`
--

CREATE TABLE `news` (
  `id` int(11) NOT NULL,
  `new_title` varchar(255) NOT NULL,
  `new_details` varchar(255) NOT NULL,
  `image` varchar(255) NOT NULL,
  `id_category` int(11) DEFAULT NULL,
  `id_user` int(11) DEFAULT NULL,
  `status` varchar(40) DEFAULT 'active'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `news`
--

INSERT INTO `news` (`id`, `new_title`, `new_details`, `image`, `id_category`, `id_user`, `status`) VALUES
(1, 'ريال مدريد يتوج بلقب الدوري الإسباني رسمياً', 'حسم نادي ريال مدريد لقب الليغا الإسبانية لصالحه هذا الموسم بعد فوزه المثيرة في الجولة الأخيرة، ليعزز صدارته كأكثر الأندية تحقيقاً للقب المحلي وسط احتفالات عارمة من الجماهير في ساحة السيبيليس.', 'تنزيل.jfif', 1, 1, 'deleted'),
(2, 'ريال مدريد يتوج بلقب الدوري الإسباني رسمياً', 'حسم نادي ريال مدريد لقب الليغا الإسبانية لصالحه هذا الموسم بعد فوزه المثيرة في الجولة الأخيرة، ليعزز صدارته كأكثر الأندية تحقيقاً للقب المحلي وسط احتفالات عارمة من الجماهير في ساحة السيبيليس.', '1780143312_تنزيل.jfif', 2, 1, 'deleted'),
(3, 'معرض الكتاب', 'انطلاق المعرض السنوي للكتاب بمشاركة واسعة من دور النشر', 'معرض كتب.jfif', 7, 15, 'deleted'),
(4, 'قمة اقتصادية', 'بدء أعمال القمة الاقتصادية لبناء شراكات دولية جديدة وتعزيز التعاون الاقتصادي بين الدول المشاركة', 'اقتصاد.jfif', 2, 15, 'active'),
(5, 'الملكي في الصدارة', 'نادي ريال مدريد يواصل عروضه القوية ويحقق انتصاراً ثميناً يعزز به صدارته للدوري، وسط أداء استثنائي وتألق لافت من نجوم الفريق.', '1780228959_ريال مدريد.jpeg', 6, 15, 'active'),
(6, 'مباراة قادمة', 'استعدادات مكثفة من الفريقين للمباراة النهائية المرتقبة مساء غدٍ وسط ترقب جماهيري كبير.', 'رياضة.jfif', 6, 15, 'deleted'),
(7, 'معرض الكتاب', 'افتتاح معرض الكتاب الدولي بمشاركة واسعة من دور النشر العربية والعالمية وبتنوع ثقافي مميز', 'ثقافة.jfif', 7, 15, 'active');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `Password` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `name`, `email`, `Password`) VALUES
(2, 'hala', 'hala@gmail.com', '$2y$10$jj25cmPDLDhlSJGRSZdTauhrWbA3zFpVffQHqJd8I4WQ08nciUiDS'),
(5, 'maha', 'maha@gmail.com', '$2y$10$jmvgHPaGbAxniCADN9vXmOySqvkuqQeu69YTsYJKCjQYadz/L60QO'),
(9, 'ola', 'ola@gmail.com', '$2y$10$aixxa8dsupZmHJNndnp.3epusFTksu90Pl36m4vBOGoABPU7vWHV6'),
(11, 'ala', 'ala@gmail.com', '$2y$10$rnDtZlEgjg.7nnOqYbdNIO5jOKWUfg8ZWsxNKLWSjwWU3YMO1hAqy'),
(12, 'amal', 'amal@gmail.com', '$2y$10$MoJ9BWyTgFbMm3DPPReovOnltRyyKDmd6/8i9qCnZ9TAxV5O/ziMy'),
(13, 'amro', 'amro@gmail.com', '$2y$10$M4.1/4EGmMS9Y93HTzJX7.5fx.Ej3bZWTY41JxZTIPHDaHNYhNjZW'),
(14, 'ryad', 'ryad@gmail', '$2y$10$b08WX/YSXJNsxTjNSycW4Odz5Vjm6VfOqypNeMILo27hVfdwaPImy'),
(15, 'noor', 'Noor@gmail.com', '$2y$10$F14gX4qWgnx7Un4945EouugJ11x4ZrIsQF0SMCin3Z0BG8J4ZNau.');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `categorys`
--
ALTER TABLE `categorys`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `news`
--
ALTER TABLE `news`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `email` (`email`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `categorys`
--
ALTER TABLE `categorys`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `news`
--
ALTER TABLE `news`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
