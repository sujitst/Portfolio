-- phpMyAdmin SQL Dump
-- version 5.2.2
-- https://www.phpmyadmin.net/
--
-- Host: localhost:3306
-- Generation Time: Feb 15, 2026 at 10:22 AM
-- Server version: 5.7.33
-- PHP Version: 8.2.7

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `omfolio`
--

-- --------------------------------------------------------

--
-- Table structure for table `abouts`
--

CREATE TABLE `abouts` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `info_id` bigint(20) UNSIGNED NOT NULL,
  `description` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `age` varchar(16) COLLATE utf8mb4_unicode_ci NOT NULL,
  `number` varchar(16) COLLATE utf8mb4_unicode_ci NOT NULL,
  `nationality` varchar(64) COLLATE utf8mb4_unicode_ci NOT NULL,
  `gender` varchar(32) COLLATE utf8mb4_unicode_ci NOT NULL,
  `marital_status` varchar(32) COLLATE utf8mb4_unicode_ci NOT NULL,
  `dob` date NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `abouts`
--

INSERT INTO `abouts` (`id`, `info_id`, `description`, `age`, `number`, `nationality`, `gender`, `marital_status`, `dob`, `created_at`, `updated_at`, `deleted_at`) VALUES
(1, 1, 'Sujit Das is a skilled Graphic Designer and Web & Mobile App Designer (UI/UX) with expertise in Front-end and Full Stack Development. He specializes in crafting intuitive user interfaces and developing scalable web applications using technologies like Laravel, JavaScript, and modern frameworks. With a strong design background, Sujit blends creativity and functionality to deliver visually appealing, performance-driven solutions. He has experience building dynamic modules, wallet systems, invoice tools, and business account management features. Passionate about continuous learning, he is enhancing his skills in DSA and Laravel-based systems while striving to become a leading web developer in the industry.\r\n\r\nKey Experience:\r\n 01.    Dynamic module development\r\n02.     Wallet systems integration\r\n03.     Invoice tools\r\n04.     Business account management features\r\n\r\nSujit Das is a skilled Graphic Designer and Web & Mobile App Designer (UI/UX) with expertise in Front-end and Full Stack Development. He specializes in crafting intuitive user interfaces and developing scalable web applications using technologies like Laravel, JavaScript, and modern frameworks. With a strong design background, Sujit blends creativity and functionality to deliver visually appealing, performance-driven solutions. He has experience building dynamic modules, wallet systems, invoice tools, and business account management features. Passionate about continuous learning, he is enhancing his skills in DSA and Laravel-based systems while striving to become a leading web developer in the industry.\r\n\r\nProfessional Highlights:\r\n05. Building custom dashboards and analytics tools\r\n06. Designing and implementing secure payment and wallet systems', '26', '+88 01323352320', 'Bangladeshi', 'Male', 'Un-Maried', '2000-04-21', '2026-01-19 20:12:23', '2026-01-24 23:48:39', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `blogs`
--

CREATE TABLE `blogs` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `user_id` bigint(20) UNSIGNED NOT NULL,
  `title` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `description` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `image` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `status` int(11) NOT NULL DEFAULT '1',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `blogs`
--

INSERT INTO `blogs` (`id`, `user_id`, `title`, `description`, `image`, `status`, `created_at`, `updated_at`) VALUES
(1, 1, 'Good day to take a photo', 'Welcome to my portfolio, where creativity meets functionality. I am a passionate designer and developer focused on building visually engaging and technically sound digital experiences. Over the years, I have worked on web and mobile projects that emphasize usability, performance, and modern design principles. My approach combines creative thinking with problem-solving to deliver meaningful results. Each project represents continuous learning, innovation, and attention to detail. I enjoy collaborating with clients and teams to transform ideas into impactful solutions. This portfolio reflects my dedication, skills, and commitment to delivering high-quality digital products.\r\n\r\nCreative designer and developer with a strong visual sense\r\nFocused on clean, modern, and user-friendly designs\r\nExperienced in web and mobile application projects\r\nStrong understanding of UI/UX principles\r\nCombines creativity with technical expertise\r\nBuilds responsive and performance-optimized interfaces\r\nSkilled in front-end and full-stack development\r\nProblem-solving mindset for real-world solutions', '[\"1769779093-697caf95683b5.png\",\"1769779099-697caf9b5ec03.png\",\"1769779106-697cafa2183c1.png\"]', 1, '2026-01-19 20:52:03', '2026-01-30 07:18:26'),
(2, 1, 'Digital Design & Development', 'Welcome to my portfolio! I am a passionate designer and developer dedicated to creating visually engaging and technically robust digital experiences. Over the years, I have worked on a wide range of projects, including websites, mobile applications, and full-stack development solutions, always combining creativity with practical functionality. My approach focuses on solving real-world problems while ensuring a seamless user experience and clean, modern design. Each project reflects my attention to detail, commitment to quality, and desire for continuous learning and improvement. Explore my work to see how I bring ideas to life with innovation, skill, and dedication.', '[\"1769779070-697caf7e66a08.png\",\"1769779078-697caf86d7dcd.png\",\"1769779084-697caf8c6fe69.png\"]', 1, '2026-01-22 07:29:05', '2026-01-30 07:18:04'),
(3, 1, 'Welcome to my portfolio', 'Welcome to my portfolio! Over the years, I have combined creativity, design expertise, and technical knowledge to craft web and mobile projects that deliver real value. My work spans UI/UX design, front-end and full-stack development, and digital problem-solving. Each project represents an opportunity to innovate, learn, and push boundaries, with a focus on usability, responsiveness, and modern design principles. I enjoy collaborating with clients and teams, turning ideas into impactful digital experiences. This portfolio reflects my dedication, skills, and passion for creating products that are not only functional but visually compelling.', '[\"1769779016-697caf48691e0.png\",\"1769779035-697caf5b09045.png\",\"1769779042-697caf6263c09.png\"]', 1, '2026-01-22 07:48:59', '2026-01-30 07:17:22');

-- --------------------------------------------------------

--
-- Table structure for table `cache`
--

CREATE TABLE `cache` (
  `key` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `value` mediumtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `expiration` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `cache_locks`
--

CREATE TABLE `cache_locks` (
  `key` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `owner` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `expiration` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `categories`
--

CREATE TABLE `categories` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `categories`
--

INSERT INTO `categories` (`id`, `name`, `created_at`, `updated_at`) VALUES
(1, 'Graphic', '2026-01-19 20:19:12', '2026-01-19 20:19:12'),
(2, 'Frontend', '2026-01-19 20:19:25', '2026-01-19 20:19:25'),
(3, 'UI/UX', '2026-01-19 20:19:36', '2026-01-19 20:19:36'),
(4, 'Full Stack', '2026-01-19 20:19:50', '2026-01-19 20:19:50'),
(5, 'PHP', '2026-01-19 20:20:11', '2026-01-19 20:20:11');

-- --------------------------------------------------------

--
-- Table structure for table `contacts`
--

CREATE TABLE `contacts` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `number` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `address` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `description` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `contacts`
--

INSERT INTO `contacts` (`id`, `name`, `number`, `email`, `address`, `description`, `created_at`, `updated_at`) VALUES
(1, 'Sujit das', '01236658952', 'sujit@gmail.com', 'Khulna , Bangladesh', 'Hi there', '2026-01-26 20:58:34', '2026-01-26 20:58:34');

-- --------------------------------------------------------

--
-- Table structure for table `experiencs`
--

CREATE TABLE `experiencs` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `exp_name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `exp_date_time` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `experiencs`
--

INSERT INTO `experiencs` (`id`, `exp_name`, `exp_date_time`, `deleted_at`, `created_at`, `updated_at`) VALUES
(3, 'Front End Developer', 'October 2019 - Running', NULL, '2026-01-19 20:14:44', '2026-01-19 20:14:44'),
(4, 'Back-End Developer', '2023 - Running', NULL, '2026-01-19 20:15:04', '2026-01-19 20:15:04'),
(5, 'Full Stack Developer', '2023 - Running', NULL, '2026-01-19 20:15:24', '2026-01-19 20:15:24'),
(6, 'Tech Expert', '2019 - Running', NULL, '2026-01-19 20:15:41', '2026-01-19 20:15:41'),
(7, 'Software Engineer', '2019 - Running', NULL, '2026-01-21 01:46:21', '2026-01-21 01:46:21');

-- --------------------------------------------------------

--
-- Table structure for table `failed_jobs`
--

CREATE TABLE `failed_jobs` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `uuid` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `connection` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `queue` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `payload` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `exception` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `failed_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `faqs`
--

CREATE TABLE `faqs` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `question` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `answer` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `faqs`
--

INSERT INTO `faqs` (`id`, `question`, `answer`, `created_at`, `updated_at`) VALUES
(4, 'Did we understand your requirements well?', 'Absolutely. Everything was Understood and implemented perfectly.', '2026-01-19 20:58:34', '2026-02-15 03:18:14'),
(5, 'How was the communication during the project?', 'Clear, fast, and very responsive throughout the process.', '2026-01-19 20:58:54', '2026-01-19 20:58:54'),
(6, 'Are you happy with the final result?', 'Yes, the final output exceeded my expectations.', '2026-01-19 20:59:12', '2026-01-19 20:59:12'),
(7, 'Would you recommend our services to others?', 'Definitely. Highly recommended.', '2026-01-19 20:59:29', '2026-01-19 20:59:29'),
(8, 'How was the technical expertise?', 'Very strong, especially in Laravel and frontend development.', '2026-01-19 20:59:46', '2026-01-19 20:59:46'),
(9, 'Did we provide support after delivery?', 'Yes, excellent support even after project completion.', '2026-01-19 21:00:03', '2026-01-19 21:00:03'),
(10, 'Would you like to work with us again?', 'Yes, I would love to collaborate again in the future.', '2026-01-19 21:00:23', '2026-01-20 03:35:19');

-- --------------------------------------------------------

--
-- Table structure for table `images`
--

CREATE TABLE `images` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `category_id` bigint(20) UNSIGNED NOT NULL,
  `image` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `video` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `images`
--

INSERT INTO `images` (`id`, `category_id`, `image`, `video`, `created_at`, `updated_at`) VALUES
(1, 1, '1770642356-6989dbb43576a.png', '1770642356-6989dbb435aa1.mp4', '2026-02-09 07:05:56', '2026-02-09 07:05:56'),
(2, 1, '1770642387-6989dbd35ada5.png', '1770642387-6989dbd35b0b2.mp4', '2026-02-09 07:06:27', '2026-02-09 07:06:27'),
(3, 1, '1770642401-6989dbe10af89.png', '1770642401-6989dbe10b25f.mp4', '2026-02-09 07:06:41', '2026-02-09 07:06:41'),
(4, 1, '1770642413-6989dbedd3b3d.png', '1770642413-6989dbedd3df8.mp4', '2026-02-09 07:06:53', '2026-02-09 07:06:53'),
(5, 1, '1770642425-6989dbf97f5b4.png', '1770642425-6989dbf97f899.mp4', '2026-02-09 07:07:05', '2026-02-09 07:07:05'),
(6, 1, '1770642441-6989dc0936dcd.png', '1770642441-6989dc0937117.mp4', '2026-02-09 07:07:21', '2026-02-09 07:07:21');

-- --------------------------------------------------------

--
-- Table structure for table `jobs`
--

CREATE TABLE `jobs` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `queue` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `payload` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `attempts` tinyint(3) UNSIGNED NOT NULL,
  `reserved_at` int(10) UNSIGNED DEFAULT NULL,
  `available_at` int(10) UNSIGNED NOT NULL,
  `created_at` int(10) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `job_batches`
--

CREATE TABLE `job_batches` (
  `id` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `total_jobs` int(11) NOT NULL,
  `pending_jobs` int(11) NOT NULL,
  `failed_jobs` int(11) NOT NULL,
  `failed_job_ids` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `options` mediumtext COLLATE utf8mb4_unicode_ci,
  `cancelled_at` int(11) DEFAULT NULL,
  `created_at` int(11) NOT NULL,
  `finished_at` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `migrations`
--

CREATE TABLE `migrations` (
  `id` int(10) UNSIGNED NOT NULL,
  `migration` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `batch` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `migrations`
--

INSERT INTO `migrations` (`id`, `migration`, `batch`) VALUES
(100, '0001_01_01_000000_create_users_table', 1),
(101, '0001_01_01_000001_create_cache_table', 1),
(102, '0001_01_01_000002_create_jobs_table', 1),
(103, '2025_11_20_144750_create_my_information_table', 1),
(104, '2025_12_02_130752_create_works_table', 1),
(105, '2026_01_03_103935_create_personal_access_tokens_table', 1),
(106, '2026_01_04_090733_create_abouts_table', 1),
(107, '2026_01_07_064519_create_experiencs_table', 1),
(108, '2026_01_13_090239_create_skills_table', 1),
(109, '2026_01_14_070023_create_categories_table', 1),
(111, '2026_01_15_091932_create_services_table', 1),
(113, '2026_01_16_121615_create_testimonials_table', 1),
(114, '2026_01_18_033237_create_blogs_table', 1),
(115, '2026_01_18_131205_create_faqs_table', 1),
(116, '2026_01_18_144517_create_contacts_table', 1),
(117, '2026_01_19_070854_create_social_media_table', 1),
(118, '2026_01_15_113426_create_projects_table', 2),
(119, '2026_01_22_135757_create_mycontacts_table', 3),
(124, '2026_01_14_144116_create_images_table', 5),
(126, '2026_01_23_023843_create_site_settings_table', 6);

-- --------------------------------------------------------

--
-- Table structure for table `mycontacts`
--

CREATE TABLE `mycontacts` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `icon` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `info` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `mycontacts`
--

INSERT INTO `mycontacts` (`id`, `icon`, `name`, `info`, `created_at`, `updated_at`) VALUES
(2, 'fa fa-map-marker', 'Location', 'Dhopakhola, Phultala, Khulna', '2026-01-22 09:12:57', '2026-01-22 20:18:05'),
(3, 'fa fa-envelope-o', 'E-mail', 'sujit111504@gmail.com', '2026-01-22 20:09:50', '2026-01-22 20:09:50'),
(4, 'fa fa-phone', 'Phone Number', '+88 01323 - 352320', '2026-01-22 20:10:41', '2026-01-22 20:17:42');

-- --------------------------------------------------------

--
-- Table structure for table `my_information`
--

CREATE TABLE `my_information` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(64) COLLATE utf8mb4_unicode_ci NOT NULL,
  `skills` varchar(256) COLLATE utf8mb4_unicode_ci NOT NULL,
  `title` varchar(256) COLLATE utf8mb4_unicode_ci NOT NULL,
  `description` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `cv` varchar(256) COLLATE utf8mb4_unicode_ci NOT NULL,
  `picture` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `my_information`
--

INSERT INTO `my_information` (`id`, `name`, `skills`, `title`, `description`, `cv`, `picture`, `created_at`, `updated_at`, `deleted_at`) VALUES
(1, 'Sujit das', '\"[\\\"Software Engineer\\\",\\\"Full Stack Developer\\\",\\\"UI\\\\\\/UX Designer\\\",\\\"Creative Thinker\\\",\\\"Speaker\\\"]\"', 'My world isn’t just mine — it’s built for you.', 'I use animation as a third dimension — not just to move, but to tell, guide, and simplify every interaction. Every motion has a purpose: to spark understanding, create delight, and turn digital experiences into something intuitive and memorable.', '1769780105-697cb38952eb4.pdf', '1769774071-697c9bf794782.png', '2026-01-19 20:03:57', '2026-01-30 07:35:05', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `password_reset_tokens`
--

CREATE TABLE `password_reset_tokens` (
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `password_reset_tokens`
--

INSERT INTO `password_reset_tokens` (`email`, `token`, `created_at`) VALUES
('admin@gmail.com', '$2y$12$csQMFKbDv5SQjnJr0lzxEuyvihf81uUBCfskli6kXf1IZreF8zgJK', '2026-01-23 21:43:25'),
('sujit111504@gmail.com', '$2y$12$12D6ILNkcOu/Rmm9sqeCzeArPhvObwcAOzbvvAHhIecdxfXkMVmM6', '2026-01-23 21:44:52');

-- --------------------------------------------------------

--
-- Table structure for table `personal_access_tokens`
--

CREATE TABLE `personal_access_tokens` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `tokenable_type` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `tokenable_id` bigint(20) UNSIGNED NOT NULL,
  `name` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(64) COLLATE utf8mb4_unicode_ci NOT NULL,
  `abilities` text COLLATE utf8mb4_unicode_ci,
  `last_used_at` timestamp NULL DEFAULT NULL,
  `expires_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `projects`
--

CREATE TABLE `projects` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `rating` decimal(2,1) DEFAULT NULL,
  `price` decimal(10,2) NOT NULL,
  `image` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `link` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `status` tinyint(1) NOT NULL DEFAULT '1',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `projects`
--

INSERT INTO `projects` (`id`, `name`, `rating`, `price`, `image`, `link`, `status`, `created_at`, `updated_at`) VALUES
(1, 'E-commerce Platform', 4.0, 300.00, '1769778879-697caebf7eea1.png', NULL, 1, '2026-01-22 01:42:11', '2026-01-30 07:14:39'),
(2, 'Learning Management System', 3.4, 100.00, '1769778874-697caebaeaaa1.png', NULL, 1, '2026-01-22 02:00:46', '2026-01-30 07:15:01'),
(3, 'Blog & Content Management System', 2.0, 50.00, '1769778870-697caeb62acb5.png', NULL, 1, '2026-01-22 02:03:27', '2026-01-30 07:14:30'),
(4, 'Real Estate Listing Platform', 5.0, 500.00, '1769778864-697caeb0e0fef.png', NULL, 1, '2026-01-22 02:04:55', '2026-01-30 07:14:24');

-- --------------------------------------------------------

--
-- Table structure for table `services`
--

CREATE TABLE `services` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `image` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `description` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `services`
--

INSERT INTO `services` (`id`, `name`, `image`, `description`, `created_at`, `updated_at`) VALUES
(2, 'UI/UX Design', '1769778534-697cad66548d5.png', 'User-focused design\r\nWireframe & prototype\r\nSmooth user flow', '2026-01-19 20:34:21', '2026-01-30 07:08:54'),
(3, 'Front-end Development', '1769778523-697cad5b522ce.png', 'HTML, CSS, JavaScript\r\nPixel-perfect design\r\nCross-browser support', '2026-01-19 20:35:09', '2026-01-30 07:08:43'),
(4, 'Laravel Backend Development', '1769778518-697cad5623eba.png', 'Secure authentication\r\nDatabase management\r\nREST API development\r\nRole & permission system', '2026-01-19 20:35:51', '2026-01-30 07:08:38'),
(5, 'Website Maintenance & Support', '1769778513-697cad510281a.png', 'Regular updates\r\nBug fixing', '2026-01-19 20:36:44', '2026-01-30 07:08:33'),
(6, 'E-commerce Development', '1769778506-697cad4a9a28d.png', 'Online store setup\r\nProduct & order management\r\nSecure payment gateway', '2026-01-19 20:37:19', '2026-01-30 07:08:26'),
(7, 'API Integration & Automation', '1769778500-697cad4480732.png', 'Third-party API integration\r\nPayment & SMS API\r\nData synchronization\r\nAutomation workflows', '2026-01-19 20:38:02', '2026-01-30 07:08:20');

-- --------------------------------------------------------

--
-- Table structure for table `sessions`
--

CREATE TABLE `sessions` (
  `id` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `user_id` bigint(20) UNSIGNED DEFAULT NULL,
  `ip_address` varchar(45) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `user_agent` text COLLATE utf8mb4_unicode_ci,
  `payload` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `last_activity` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `sessions`
--

INSERT INTO `sessions` (`id`, `user_id`, `ip_address`, `user_agent`, `payload`, `last_activity`) VALUES
('O0FlLemd9lYaxK6VH6KddMll3eZhybp2qB82WYI8', 1, '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/144.0.0.0 Safari/537.36', 'YTo3OntzOjY6Il90b2tlbiI7czo0MDoiWURkNlhuMXhlUmlUam9wZzN6YXBGcVkwZ2ZjYUdSWE96RXU5cTVUSyI7czo4OiJ0ZXh0X2RpciI7czozOiJsdHIiO3M6OToiX3ByZXZpb3VzIjthOjI6e3M6MzoidXJsIjtzOjM0OiJodHRwOi8vMTI3LjAuMC4xOjgwMDAvc29jaWFsLW1lZGlhIjtzOjU6InJvdXRlIjtzOjE4OiJzb2NpYWwtbWVkaWEuaW5kZXgiO31zOjY6Il9mbGFzaCI7YToyOntzOjM6Im9sZCI7YTowOnt9czozOiJuZXciO2E6MDp7fX1zOjM6InVybCI7YToxOntzOjg6ImludGVuZGVkIjtzOjMxOiJodHRwOi8vMTI3LjAuMC4xOjgwMDAvYWRtaW4vZmFxIjt9czo1MDoibG9naW5fd2ViXzU5YmEzNmFkZGMyYjJmOTQwMTU4MGYwMTRjN2Y1OGVhNGUzMDk4OWQiO2k6MTtzOjk6ImxhbmdfY29kZSI7czoyOiJlbiI7fQ==', 1771150806),
('tU1odcsyC6d0mNwELOSpVGSMmrd84mV70qk80pkA', 1, '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/144.0.0.0 Safari/537.36', 'YTo1OntzOjY6Il90b2tlbiI7czo0MDoiTjJUTHdDc2ZHcncxZjdPMGhVZldDQTRjcExVc2pYNmRNQ2dPV2ZFZiI7czo4OiJ0ZXh0X2RpciI7czozOiJsdHIiO3M6OToiX3ByZXZpb3VzIjthOjI6e3M6MzoidXJsIjtzOjMxOiJodHRwOi8vMTI3LjAuMC4xOjgwMDAvYWRtaW4vZmFxIjtzOjU6InJvdXRlIjtzOjk6ImZhcS5pbmRleCI7fXM6NjoiX2ZsYXNoIjthOjI6e3M6Mzoib2xkIjthOjA6e31zOjM6Im5ldyI7YTowOnt9fXM6NTA6ImxvZ2luX3dlYl81OWJhMzZhZGRjMmIyZjk0MDE1ODBmMDE0YzdmNThlYTRlMzA5ODlkIjtpOjE7fQ==', 1771144349);

-- --------------------------------------------------------

--
-- Table structure for table `site_settings`
--

CREATE TABLE `site_settings` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `title` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `sub_title` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `copyright_name` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `link` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `year` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `fave_icon` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `logo` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `site_settings`
--

INSERT INTO `site_settings` (`id`, `title`, `sub_title`, `copyright_name`, `link`, `year`, `fave_icon`, `logo`, `created_at`, `updated_at`) VALUES
(1, 'Sujit Portfolio Dashboard', 'Manage your personal portfolio statistics and activities from this dashboard.', 'ombit.net', 'https://www.ombyte.com', '2026', '1770971316_icon_698ee0b474e8e.png', '1770971316_logo_698ee0b474934.png', '2026-02-10 03:12:13', '2026-02-13 02:28:36');

-- --------------------------------------------------------

--
-- Table structure for table `skills`
--

CREATE TABLE `skills` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `percent` decimal(5,2) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `skills`
--

INSERT INTO `skills` (`id`, `name`, `percent`, `created_at`, `updated_at`) VALUES
(1, 'HTML', 25.00, '2026-01-19 20:16:23', '2026-01-19 20:16:23'),
(2, 'CSS', 50.00, '2026-01-19 20:16:36', '2026-01-19 20:16:36'),
(3, 'JavaScript', 15.00, '2026-01-19 20:17:53', '2026-01-19 20:17:53'),
(4, 'PHP', 40.00, '2026-01-19 20:18:06', '2026-01-19 20:18:06'),
(5, 'Ajax', 50.00, '2026-01-19 20:18:21', '2026-01-19 20:18:21'),
(6, 'JavaScript', 80.00, '2026-01-19 20:18:47', '2026-01-19 20:18:47'),
(7, 'Python', 15.00, '2026-01-21 22:30:41', '2026-01-21 22:30:41');

-- --------------------------------------------------------

--
-- Table structure for table `social_media`
--

CREATE TABLE `social_media` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `link` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `image` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `social_media`
--

INSERT INTO `social_media` (`id`, `name`, `link`, `image`, `created_at`, `updated_at`) VALUES
(3, 'Linkdin', 'https://www.linkdin.com/', '1770711096-698ae838c2ee0.png', '2026-01-19 21:02:37', '2026-02-15 04:17:08'),
(4, 'Github', 'https://www.github.com/', '1770711090-698ae832225d1.png', '2026-01-19 21:03:04', '2026-02-15 04:16:55'),
(5, 'Twitter', 'https://www.twitter.com', '1770711084-698ae82c62617.png', '2026-01-19 21:03:24', '2026-02-15 04:16:21'),
(6, 'Google', 'https://www.google.com', '1770711078-698ae8263d2ec.png', '2026-01-19 21:03:41', '2026-02-15 04:16:02'),
(7, 'YouTube', 'https://www.youtube.com', '1770711060-698ae8144c3ea.png', '2026-01-19 21:03:59', '2026-02-15 04:15:46'),
(8, 'Apple', 'https://www.apple.com', '1770711054-698ae80e25a2b.png', '2026-01-20 03:36:17', '2026-02-15 04:14:31');

-- --------------------------------------------------------

--
-- Table structure for table `testimonials`
--

CREATE TABLE `testimonials` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `position` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `rating` tinyint(4) NOT NULL COMMENT 'Rating from 1 to 5',
  `comment` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `image` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `status` tinyint(1) NOT NULL DEFAULT '1',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `testimonials`
--

INSERT INTO `testimonials` (`id`, `name`, `position`, `rating`, `comment`, `image`, `status`, `created_at`, `updated_at`) VALUES
(1, 'ohn Carter', 'CEO', 2, 'Outstanding service and excellent communication. The project was delivered on time with great attention to detail', '1769778973-697caf1d3d8a8.png', 1, '2026-01-19 20:47:02', '2026-01-30 07:16:13'),
(2, 'Sarah Williams', 'Marketing Manager', 5, 'Very professional and creative approach. Our brand design quality improved significantly after working together.', '1769778938-697caefa83c36.png', 1, '2026-01-19 20:47:57', '2026-01-30 07:15:38'),
(3, 'Michael Brown', 'Founder, Startup Grow', 3, 'Highly skilled and reliable. The user interface was clean, modern, and perfectly matched our business goals.', '1769778960-697caf101ae9d.png', 1, '2026-01-19 20:48:42', '2026-01-30 07:16:00'),
(4, 'Emily Johnson', 'Product Manager', 5, 'Great experience from start to finish. The design and development exceeded our expectations.', '1769778928-697caef0c8918.png', 1, '2026-01-19 20:49:27', '2026-01-30 07:15:28');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `phone` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `address` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `city` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `country` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `dob` date DEFAULT NULL,
  `zip_code` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL COMMENT 'Postal / Zip code',
  `photo` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `email_verify_token` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL COMMENT 'Token for email verification',
  `password` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `utype` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'usr' COMMENT 'adm = admin, usr = user/customer',
  `company_name` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `is_active` tinyint(1) NOT NULL DEFAULT '1',
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `name`, `phone`, `address`, `city`, `country`, `dob`, `zip_code`, `photo`, `email`, `email_verified_at`, `email_verify_token`, `password`, `utype`, `company_name`, `is_active`, `remember_token`, `created_at`, `updated_at`) VALUES
(1, 'Admin', '+1 (273) 639-4832', 'Est west road', 'Khulna', 'Bangladesh', NULL, '9210', '1769779168-697cafe0cf7a8.png', 'admin@gmail.com', NULL, NULL, '$2y$12$12DEOr1xLB1OcMGq1/hWmeiaLa2le/SI7P/x5Ot71EjK1mO3zB0HO', 'adm', NULL, 1, NULL, NULL, '2026-01-30 07:20:31');

-- --------------------------------------------------------

--
-- Table structure for table `works`
--

CREATE TABLE `works` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `number` int(11) NOT NULL,
  `picture` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `works`
--

INSERT INTO `works` (`id`, `name`, `number`, `picture`, `created_at`, `updated_at`) VALUES
(1, 'UI/UX Design', 250, '1769776794-697ca69a07e95.png', '2026-01-19 20:07:01', '2026-01-30 06:39:54'),
(2, 'Web Design', 100, '1769776788-697ca694c5ac3.png', '2026-01-19 20:07:27', '2026-01-30 06:39:48'),
(3, 'Web Research', 10, '1769776783-697ca68f59436.png', '2026-01-19 20:07:55', '2026-01-30 06:39:43'),
(4, 'Web Application', 100, '1769776777-697ca689c567b.png', '2026-01-19 20:08:19', '2026-01-30 06:39:37'),
(5, 'One Page SEO', 10, '1769776764-697ca67c6d483.png', '2026-01-19 20:08:58', '2026-01-30 06:39:24');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `abouts`
--
ALTER TABLE `abouts`
  ADD PRIMARY KEY (`id`),
  ADD KEY `abouts_info_id_foreign` (`info_id`);

--
-- Indexes for table `blogs`
--
ALTER TABLE `blogs`
  ADD PRIMARY KEY (`id`),
  ADD KEY `blogs_user_id_foreign` (`user_id`);

--
-- Indexes for table `cache`
--
ALTER TABLE `cache`
  ADD PRIMARY KEY (`key`);

--
-- Indexes for table `cache_locks`
--
ALTER TABLE `cache_locks`
  ADD PRIMARY KEY (`key`);

--
-- Indexes for table `categories`
--
ALTER TABLE `categories`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `contacts`
--
ALTER TABLE `contacts`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `experiencs`
--
ALTER TABLE `experiencs`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `failed_jobs_uuid_unique` (`uuid`);

--
-- Indexes for table `faqs`
--
ALTER TABLE `faqs`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `images`
--
ALTER TABLE `images`
  ADD PRIMARY KEY (`id`),
  ADD KEY `images_category_id_foreign` (`category_id`);

--
-- Indexes for table `jobs`
--
ALTER TABLE `jobs`
  ADD PRIMARY KEY (`id`),
  ADD KEY `jobs_queue_index` (`queue`);

--
-- Indexes for table `job_batches`
--
ALTER TABLE `job_batches`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `migrations`
--
ALTER TABLE `migrations`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `mycontacts`
--
ALTER TABLE `mycontacts`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `my_information`
--
ALTER TABLE `my_information`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `password_reset_tokens`
--
ALTER TABLE `password_reset_tokens`
  ADD PRIMARY KEY (`email`);

--
-- Indexes for table `personal_access_tokens`
--
ALTER TABLE `personal_access_tokens`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `personal_access_tokens_token_unique` (`token`),
  ADD KEY `personal_access_tokens_tokenable_type_tokenable_id_index` (`tokenable_type`,`tokenable_id`),
  ADD KEY `personal_access_tokens_expires_at_index` (`expires_at`);

--
-- Indexes for table `projects`
--
ALTER TABLE `projects`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `services`
--
ALTER TABLE `services`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `sessions`
--
ALTER TABLE `sessions`
  ADD PRIMARY KEY (`id`),
  ADD KEY `sessions_user_id_index` (`user_id`),
  ADD KEY `sessions_last_activity_index` (`last_activity`);

--
-- Indexes for table `site_settings`
--
ALTER TABLE `site_settings`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `skills`
--
ALTER TABLE `skills`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `social_media`
--
ALTER TABLE `social_media`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `social_media_name_unique` (`name`);

--
-- Indexes for table `testimonials`
--
ALTER TABLE `testimonials`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `users_email_unique` (`email`);

--
-- Indexes for table `works`
--
ALTER TABLE `works`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `abouts`
--
ALTER TABLE `abouts`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `blogs`
--
ALTER TABLE `blogs`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `categories`
--
ALTER TABLE `categories`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `contacts`
--
ALTER TABLE `contacts`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `experiencs`
--
ALTER TABLE `experiencs`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `faqs`
--
ALTER TABLE `faqs`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `images`
--
ALTER TABLE `images`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `jobs`
--
ALTER TABLE `jobs`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=127;

--
-- AUTO_INCREMENT for table `mycontacts`
--
ALTER TABLE `mycontacts`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `my_information`
--
ALTER TABLE `my_information`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `personal_access_tokens`
--
ALTER TABLE `personal_access_tokens`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `projects`
--
ALTER TABLE `projects`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `services`
--
ALTER TABLE `services`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `site_settings`
--
ALTER TABLE `site_settings`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `skills`
--
ALTER TABLE `skills`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `social_media`
--
ALTER TABLE `social_media`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `testimonials`
--
ALTER TABLE `testimonials`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `works`
--
ALTER TABLE `works`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `abouts`
--
ALTER TABLE `abouts`
  ADD CONSTRAINT `abouts_info_id_foreign` FOREIGN KEY (`info_id`) REFERENCES `my_information` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `blogs`
--
ALTER TABLE `blogs`
  ADD CONSTRAINT `blogs_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `images`
--
ALTER TABLE `images`
  ADD CONSTRAINT `images_category_id_foreign` FOREIGN KEY (`category_id`) REFERENCES `categories` (`id`) ON DELETE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
