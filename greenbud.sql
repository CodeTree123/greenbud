-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Oct 24, 2022 at 12:56 PM
-- Server version: 10.4.22-MariaDB
-- PHP Version: 8.0.13

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `greenbud`
--

-- --------------------------------------------------------

--
-- Table structure for table `admins`
--

CREATE TABLE `admins` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `role_id` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `first_name` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `last_name` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `phone` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `password` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `catagory_infos`
--

CREATE TABLE `catagory_infos` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `catagory_name` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `catstatus` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `catagory_infos`
--

INSERT INTO `catagory_infos` (`id`, `catagory_name`, `catstatus`, `created_at`, `updated_at`) VALUES
(1, 'Residential water purifying system', '1', '2022-10-11 07:24:17', '2022-10-11 07:24:17'),
(2, 'Office RO system', '1', '2022-10-11 07:24:33', '2022-10-11 07:24:33'),
(3, 'Mini Commercial water purifying system', '1', '2022-10-11 07:24:46', '2022-10-11 07:24:46'),
(4, 'Small bottle water plant', '1', '2022-10-11 07:25:01', '2022-10-11 07:25:01'),
(5, 'Commercial Jar Water Plant', '1', '2022-10-11 07:25:23', '2022-10-11 07:25:23'),
(6, 'Water ATM machine', '1', '2022-10-11 07:25:35', '2022-10-11 07:25:35'),
(7, 'Rainwater Harvesting systems', '1', '2022-10-11 07:25:51', '2022-10-11 07:25:51'),
(8, 'Process Water treatment', '1', '2022-10-11 07:26:02', '2022-10-11 07:26:02'),
(9, 'Iron Removal Plant', '1', '2022-10-11 07:26:13', '2022-10-11 07:26:13'),
(10, 'Salinity Removal Plant', '1', '2022-10-11 07:26:30', '2022-10-11 07:26:30'),
(11, 'Deionization (DI/DM) battery water plant', '1', '2022-10-11 07:26:49', '2022-10-11 07:26:49'),
(12, 'Filter media and Vessel of WTP', '1', '2022-10-11 07:27:06', '2022-10-11 07:27:06');

-- --------------------------------------------------------

--
-- Table structure for table `experiences`
--

CREATE TABLE `experiences` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `image` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `description` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `experiences`
--

INSERT INTO `experiences` (`id`, `image`, `description`, `created_at`, `updated_at`) VALUES
(1, 'experiences20221024061042.jpg', 'sdgsdgfsdCFGHBDZFHDFSH', '2022-10-23 23:41:00', '2022-10-24 00:39:43');

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
  `failed_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `filter_processes`
--

CREATE TABLE `filter_processes` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `cat_id` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `product_id` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `Stage_1` longtext COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `Stage_2` longtext COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `Stage_3` longtext COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `Stage_4` longtext COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `Stage_5` longtext COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `Stage_6` longtext COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `Stage_7` longtext COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `Stage_8` longtext COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `Stage_9` longtext COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `Stage_10` longtext COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `filter_processes`
--

INSERT INTO `filter_processes` (`id`, `cat_id`, `product_id`, `Stage_1`, `Stage_2`, `Stage_3`, `Stage_4`, `Stage_5`, `Stage_6`, `Stage_7`, `Stage_8`, `Stage_9`, `Stage_10`, `created_at`, `updated_at`) VALUES
(3, '1', '19', 'Sediment Filter: The Sediment filter cartridge is manufactured from pure 100% polypropylene fibers. The fibers have been carefully spun together to form a true gradient density from outer to inner surfaces. It is effective in removing dust, mud, rust and sand particles.', 'Granular Activated Carbon Filter: This granular activated carbon filter is composed of high-performance activated carbon that effectively reduces unwanted tastes, odor, organic contaminants, chlorine, pesticides and chemicals that contributed to taste and odor. It is designed to allow maximum contact between the water and carbon, ensuring maximum adsorption.', 'Activated Block Carbon Filter: This block carbon filter is composed of high-performance Coconut Shell carbon using a patented process and made entirely from FDA-compliant materials that are highly effective at reducing 17 hazardous metals: such as lead, radon, mercury, insecticides, odor, and chlorine: taste & odor, from potable drinking water. The unique structure of the carbon block enables it to reduce Giardia, Cryptosporidium, amoeba, and Toxoplasma cysts and fine sediment particles down to 0.5 microns. It is an ideal choice for a wide range of residential, food service, commercial and industrial applications.', 'Reverse Osmosis (RO) Filter: A thin film composite (TFC) high quality membranes. It removes the hard water contaminants and any type bacteria and viruses that may be present in your water: Arsenic, Iron, lead, cooper, barium, chromium, mercury, sodium, cadmium, fluoride, nitrite, nitrate, and selenium.', 'Taste and odor Filter: This granular activated carbon filter is composed of high-performance activated carbon that effectively reduces unwanted tastes, odor, organic contaminants, chlorine, pesticides, and chemicals that contributed to taste and odor. It is designed to allow maximum contact between the water and carbon, ensuring maximum adsorption. We are using NSF-approved post carbon to guarantee the taste of water.', 'Mineral Filter: This series of mineral cartridges is designed to raise the pH of influent waters. These cartridges contain sparingly soluble sacrificial media that are only acted upon by acidic waters. They will have little effect on neutral or alkaline water. Mineral Cartridge is an all-inclusive mineral and pH balance system for drinking water that purifies, revitalizes, disinfects, and fortifies the water. The mineralized water after the mineralized filter has perfectly balanced proportions of minerals necessary for the healthy development of the human body. This filter improves the quality of clean water by adding necessary for proper human development and health minerals, such as Calcium, Magnesium, Sodium, Potassium, and others readily found in many natural mineral drinks of water.', 'Alkaline Filter: The Alkaline filter changes the acidic RO water into a perfect Natural Alkali Calcium Ionized Water. The Alkaline filter simply gives back minerals such as ionized calcium, magnesium, sodium, and potassium ion, which were taken away while purifying the water.', NULL, NULL, NULL, '2022-10-16 08:03:06', '2022-10-16 08:14:14'),
(4, '4', '20', 'Sediment Filter: The Sediment filter cartridge is manufactured from pure 100% polypropylene fibers. The fibers have been carefully spun together to form a true gradient density from outer to inner surfaces. It is effective in removing dust, mud, rust and sand particles.', 'Granular Activated Carbon Filter: This granular activated carbon filter is composed of high-performance activated carbon that effectively reduces unwanted tastes, odor, organic contaminants, chlorine, pesticides and chemicals that contributed to taste and odor. It is designed to allow maximum contact between the water and carbon, ensuring maximum adsorption.', 'Activated Block Carbon Filter: This block carbon filter is composed of high-performance Coconut Shell carbon using a patented process and made entirely from FDA-compliant materials that are highly effective at reducing 17 hazardous metals: such as lead, radon, mercury, insecticides, odor, and chlorine: taste & odor, from potable drinking water. The unique structure of the carbon block enables it to reduce Giardia, Cryptosporidium, amoeba, and Toxoplasma cysts and fine sediment particles down to 0.5 microns. It is an ideal choice for a wide range of residential, food service, commercial and industrial applications.', 'Reverse Osmosis (RO) Filter: A thin film composite (TFC) high quality membranes. It removes the hard water contaminants and any type bacteria and viruses that may be present in your water: Arsenic, Iron, lead, cooper, barium, chromium, mercury, sodium, cadmium, fluoride, nitrite, nitrate, and selenium.', 'Taste and odor Filter: This granular activated carbon filter is composed of high-performance activated carbon that effectively reduces unwanted tastes, odor, organic contaminants, chlorine, pesticides, and chemicals that contributed to taste and odor. It is designed to allow maximum contact between the water and carbon, ensuring maximum adsorption. We are using NSF-approved post carbon to guarantee the taste of water.', 'Mineral Filter: This series of mineral cartridges is designed to raise the pH of influent waters. These cartridges contain sparingly soluble sacrificial media that are only acted upon by acidic waters. They will have little effect on neutral or alkaline water. Mineral Cartridge is an all-inclusive mineral and pH balance system for drinking water that purifies, revitalizes, disinfects, and fortifies the water. The mineralized water after the mineralized filter has perfectly balanced proportions of minerals necessary for the healthy development of the human body. This filter improves the quality of clean water by adding necessary for proper human development and health minerals, such as Calcium, Magnesium, Sodium, Potassium, and others readily found in many natural mineral drinks of water.', 'Alkaline Filter: The Alkaline filter changes the acidic RO water into a perfect Natural Alkali Calcium Ionized Water. The Alkaline filter simply gives back minerals such as ionized calcium, magnesium, sodium, and potassium ion, which were taken away while purifying the water.', NULL, NULL, NULL, '2022-10-16 08:20:38', '2022-10-16 08:20:38');

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
(1, '2014_10_12_000000_create_users_table', 1),
(2, '2014_10_12_100000_create_password_resets_table', 1),
(3, '2019_08_19_000000_create_failed_jobs_table', 1),
(4, '2019_12_14_000001_create_personal_access_tokens_table', 1),
(5, '2022_09_27_144232_create_roles_table', 1),
(6, '2022_09_28_065303_create_catagory_infos_table', 1),
(7, '2022_09_28_065454_create_products_table', 1),
(8, '2022_10_05_205211_create_orders_table', 1),
(9, '2022_10_05_211042_create_suborders_table', 1),
(10, '2022_10_15_115143_create_filter_processes_table', 2),
(11, '2022_10_15_192602_create_admins_table', 3),
(12, '2022_10_23_152200_create_experiences_table', 3),
(13, '2022_10_24_071459_create_teams_table', 4);

-- --------------------------------------------------------

--
-- Table structure for table `orders`
--

CREATE TABLE `orders` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `user_id` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `address` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `notes` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `total_items` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `total_price` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `order_status` tinyint(1) NOT NULL DEFAULT 0,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `orders`
--

INSERT INTO `orders` (`id`, `user_id`, `address`, `notes`, `total_items`, `total_price`, `order_status`, `created_at`, `updated_at`) VALUES
(1, '2', NULL, NULL, '2', '694.45', 1, '2022-10-16 23:11:18', '2022-10-16 23:49:23'),
(2, '3', 'Bashai Aisha setup koira dite parle taka dibo naile na', NULL, '5', '1736.13', 0, '2022-10-16 23:53:55', '2022-10-16 23:53:55'),
(3, '5', 'Bashai Aisha setup koira dite parle taka dibo naile na', NULL, '0', '0.00', 0, '2022-10-16 23:54:46', '2022-10-16 23:54:46'),
(10, '16', 'asdasasdasdasdas', NULL, '1', '347.23', 0, '2022-10-17 01:09:46', '2022-10-17 01:09:46'),
(12, '19', 'sddlfjkgnslkjdgfn', NULL, '1', '347.23', 0, '2022-10-17 01:37:54', '2022-10-17 01:37:54'),
(13, '20', 'sddlfjkgnslkjdgfn', NULL, '0', '0.00', 0, '2022-10-17 01:38:16', '2022-10-17 01:38:16'),
(14, '21', 'sddlfjkgnslkjdgfn', NULL, '0', '0.00', 0, '2022-10-17 01:51:27', '2022-10-17 01:51:27'),
(15, '22', 'sddlfjkgnslkjdgfn', NULL, '0', '0.00', 0, '2022-10-17 01:52:05', '2022-10-17 01:52:05'),
(16, '23', 'sddlfjkgnslkjdgfn', NULL, '0', '0.00', 0, '2022-10-17 01:53:17', '2022-10-17 01:53:17'),
(17, '24', 'sddlfjkgnslkjdgfn', NULL, '0', '0.00', 0, '2022-10-17 01:54:00', '2022-10-17 01:54:00'),
(18, '25', 'sddlfjkgnslkjdgfn', NULL, '0', '0.00', 0, '2022-10-17 01:54:36', '2022-10-17 01:54:36'),
(19, '26', 'sddlfjkgnslkjdgfn', NULL, '0', '0.00', 0, '2022-10-17 01:57:06', '2022-10-17 01:57:06'),
(20, '27', 'sddlfjkgnslkjdgfn', NULL, '0', '0.00', 0, '2022-10-17 01:57:44', '2022-10-17 01:57:44'),
(21, '29', 'sddlfjkgnslkjdgfn', NULL, '0', '0.00', 0, '2022-10-17 02:58:27', '2022-10-17 02:58:27'),
(22, '30', 'sddlfjkgnslkjdgfn', NULL, '0', '0.00', 0, '2022-10-17 03:01:52', '2022-10-17 03:01:52'),
(23, '31', 'sddlfjkgnslkjdgfn', NULL, '0', '0.00', 0, '2022-10-17 03:02:13', '2022-10-17 03:02:13');

-- --------------------------------------------------------

--
-- Table structure for table `password_resets`
--

CREATE TABLE `password_resets` (
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `personal_access_tokens`
--

CREATE TABLE `personal_access_tokens` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `tokenable_type` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `tokenable_id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(64) COLLATE utf8mb4_unicode_ci NOT NULL,
  `abilities` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `last_used_at` timestamp NULL DEFAULT NULL,
  `expires_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `products`
--

CREATE TABLE `products` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `cat_id` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `product_code` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `product_name` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `description` longtext COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `price` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `quantity` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `color` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `size` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `m_image` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `h_image` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `other_images` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `prostatus` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `products`
--

INSERT INTO `products` (`id`, `cat_id`, `product_code`, `product_name`, `description`, `price`, `quantity`, `color`, `size`, `m_image`, `h_image`, `other_images`, `prostatus`, `created_at`, `updated_at`) VALUES
(19, '1', NULL, 'Xerxes Yates', 'Made in Vietnam\r\n7-Stage with Mineral & Alkaline\r\nProduction capacity: 100GPD [15LPH]\r\nReservoir: 19 Liter/5 Gallon plasteel\r\nSolenoid valve: Kojine\r\nTDS Mixer, All quick fitting\r\nAmerican type faucet\r\nPureFlo is Trademark brand of Greenbud, Manufactured from Vietnam.', '323', '415', NULL, NULL, 'product20221016021039.png', NULL, 'other_pro2022101602104145.png,other_pro2022101602104345.png,other_pro2022101602104317.png', '1', '2022-10-16 05:51:14', '2022-10-16 08:00:43'),
(20, '4', NULL, 'PureFlo SE Slim with basin', 'Made in Vietnam\r\n7-Stage with Mineral & Alkaline\r\nProduction capacity: 100GPD [15LPH]\r\nReservoir: 16 Liter/4.2 Gallon plasteel\r\nSolenoid valve: Kojine\r\nTDS Mixer, All quick fitting\r\nAmerican type faucet\r\nPureFlo is Trademark brand of Greenbud, Manufactured from Vietnam.', '5000', '99', NULL, NULL, 'product20221016021032.png', NULL, '', '1', '2022-10-16 08:17:36', '2022-10-16 08:27:01');

-- --------------------------------------------------------

--
-- Table structure for table `roles`
--

CREATE TABLE `roles` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `role` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `roles`
--

INSERT INTO `roles` (`id`, `role`) VALUES
(1, 'Admin'),
(2, 'customer');

-- --------------------------------------------------------

--
-- Table structure for table `suborders`
--

CREATE TABLE `suborders` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `user_id` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `order_id` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `product_id` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `product_name` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `image` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `order_quantity` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `sub_total` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `suborders`
--

INSERT INTO `suborders` (`id`, `user_id`, `order_id`, `product_id`, `product_name`, `image`, `order_quantity`, `sub_total`, `created_at`, `updated_at`) VALUES
(1, '2', '1', '19', 'Xerxes Yates', 'product20221016021039.png', '2', '646', '2022-10-16 23:11:18', '2022-10-16 23:11:18'),
(2, '3', '2', '19', 'Xerxes Yates', 'product20221016021039.png', '5', '1615', '2022-10-16 23:53:55', '2022-10-16 23:53:55'),
(9, '16', '10', '19', 'Xerxes Yates', 'product20221016021039.png', '1', '323', '2022-10-17 01:09:46', '2022-10-17 01:09:46'),
(10, '17', '11', '19', 'Xerxes Yates', 'product20221016021039.png', '1', '323', '2022-10-17 01:34:47', '2022-10-17 01:34:47'),
(11, '19', '12', '19', 'Xerxes Yates', 'product20221016021039.png', '1', '323', '2022-10-17 01:37:54', '2022-10-17 01:37:54');

-- --------------------------------------------------------

--
-- Table structure for table `teams`
--

CREATE TABLE `teams` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `qualification` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `designation` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `image` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `teams`
--

INSERT INTO `teams` (`id`, `name`, `qualification`, `designation`, `image`, `created_at`, `updated_at`) VALUES
(1, 'Sayed Najmul Hossain', 'B.Com (Hon\'s)', 'Chairman', 'Najmul.jpg', '2022-10-24 02:07:15', '2022-10-24 02:07:15'),
(2, 'Engr. Md. Rajib Ahmed', 'B.Sc. Eng. (Civil & Environmental, SUST), MBA, FIEB', 'Managing Director and CEO', 'team20221024081037-jpg', '2022-10-24 02:07:15', '2022-10-24 04:20:04'),
(3, 'Engr. Syed Tasnem Mahmood', ' B.Sc. Eng. (Civil & Environmental, SUST), MIEB', 'Director', 'Engr.-Syed-Tasnem-Mahmood_Director.jpg', '2022-10-24 02:07:15', '2022-10-24 02:07:15'),
(4, 'Dr. Khokon Debnath', '', 'Advisor', 'Dr. Khokon Debnath.jpg', '2022-10-24 02:07:15', '2022-10-24 02:07:15'),
(5, ' Krishibid Md. Anwar Hossain', '', 'Advisor', 'Krishibid Md. Anwar Hossain.jpg', '2022-10-24 02:07:15', '2022-10-24 02:07:15'),
(6, 'Syeed Jesan Mahmood', '', 'Head Of Marketing & Brand Development', 'Syeed-Jesan-Mahmood-Head-of-Marketing-min-scaled.jpg', '2022-10-24 02:07:15', '2022-10-24 02:07:15'),
(7, 'Md. Biplab Hossain', '', ' Sr. Executive (Accounts & Admin)', 'Biplab.jpg', '2022-10-24 02:07:15', '2022-10-24 02:07:15'),
(8, ' Engr. Syed Zubair Bin Hasan', 'B.Sc. (Textile Engineering)', 'Asst. Manager, Operations', 'Zubair.JPG', '2022-10-24 02:07:15', '2022-10-24 02:07:15'),
(9, '  Abdul Ali', '', 'Supervisor, Service dept.', 'Abdul_ALi.JPG', '2022-10-24 02:07:15', '2022-10-24 02:07:15'),
(10, 'Farhad Hossain Milon', 'Diploma-in-Electrical Engineering', 'Junior Engineer', 'Farhad.jpg', '2022-10-24 02:07:15', '2022-10-24 02:07:15'),
(11, 'Nazmul Hawlader Razu', 'Diploma-in-Environmental Engineering', 'Junior Engineer', 'Nazmul.jpg', '2022-10-24 02:07:15', '2022-10-24 02:07:15'),
(12, 'Md Shuvo Mollah', 'Diploma-in-Electrical Engineering', 'Junior Engineer', 'Shuvo.jpg', '2022-10-24 02:07:15', '2022-10-24 02:07:15'),
(13, 'Md. Masud Rana', '', 'Senior Technician', 'Masud (2).jpg', '2022-10-24 02:07:15', '2022-10-24 02:07:15'),
(14, 'Md. Nayeem Hossain', '', 'Senior Technician', 'Nayeem.JPG', '2022-10-24 02:07:15', '2022-10-24 02:07:15'),
(15, 'Amir Hossain', '', ' Senior Technician', 'Amir.jpg', '2022-10-24 02:07:15', '2022-10-24 02:07:15'),
(16, 'Riaz Hossain ', '', 'Technician cum Support Staff ', 'Rakib.jpg', '2022-10-24 02:07:15', '2022-10-24 02:07:15'),
(17, ' Md. Rakibul Islam', '', ' Driver', 'Md. Rakibul Islam.jpg', '2022-10-24 02:07:15', '2022-10-24 02:07:15');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `role_id` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `first_name` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `last_name` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `phone` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `password` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `role_id`, `first_name`, `last_name`, `email`, `phone`, `email_verified_at`, `password`, `remember_token`, `created_at`, `updated_at`) VALUES
(1, '1', 'Greenbud', 'Admin', 'admin@greenbud.com', '01*********', NULL, '$2y$10$jvrv/.CM6y5IbVLM7Zhu0uD/T0Pu35ynWnafmtdb22wHhXWHfPQqG', NULL, '2022-10-11 07:23:02', '2022-10-11 07:23:02'),
(2, '2', 'Dev', 'User', 'user@greenbud.com', '01988888888', NULL, '$2y$10$y2o/RgBAXn7dYwrv0BicV.s8cIlJL8AuPx5M3e7uIi/IT5Then/Hm', NULL, '2022-10-11 07:23:02', '2022-10-11 07:23:02'),
(15, '2', 'dfdfghh', 'dgshsdgh', 'mahadimonna01@gmail.com', '425245254234', NULL, '$2y$10$EtGCU9Z9d2fjE4.OjFoOrO/TVKVXdnZMRIbdm9LO38e3Bhkfc0oDi', NULL, '2022-10-17 01:00:55', '2022-10-17 01:00:55'),
(16, '2', 'imrul', 'aksdfb', 'imrulkayes560@gmail.com', '351650', NULL, '$2y$10$aMviJXAHg5ba8syCh/995OUwrvFSmo97TqLBfslw992572.oS8pFK', NULL, '2022-10-17 01:09:46', '2022-10-17 01:09:46'),
(31, '2', 'sadf', 'sdf', 'ksajdgf@gmail.com', '32103', NULL, '$2y$10$U9pXiMQLVD3hM1v1FKAGae351YoI1hgzd3XjZK9sfSAL6tsDYExba', NULL, '2022-10-17 03:02:13', '2022-10-17 03:02:13');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admins`
--
ALTER TABLE `admins`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `admins_email_unique` (`email`);

--
-- Indexes for table `catagory_infos`
--
ALTER TABLE `catagory_infos`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `experiences`
--
ALTER TABLE `experiences`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `failed_jobs_uuid_unique` (`uuid`);

--
-- Indexes for table `filter_processes`
--
ALTER TABLE `filter_processes`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `migrations`
--
ALTER TABLE `migrations`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `orders`
--
ALTER TABLE `orders`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `password_resets`
--
ALTER TABLE `password_resets`
  ADD KEY `password_resets_email_index` (`email`);

--
-- Indexes for table `personal_access_tokens`
--
ALTER TABLE `personal_access_tokens`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `personal_access_tokens_token_unique` (`token`),
  ADD KEY `personal_access_tokens_tokenable_type_tokenable_id_index` (`tokenable_type`,`tokenable_id`);

--
-- Indexes for table `products`
--
ALTER TABLE `products`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `roles`
--
ALTER TABLE `roles`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `suborders`
--
ALTER TABLE `suborders`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `teams`
--
ALTER TABLE `teams`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `users_email_unique` (`email`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `admins`
--
ALTER TABLE `admins`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `catagory_infos`
--
ALTER TABLE `catagory_infos`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT for table `experiences`
--
ALTER TABLE `experiences`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `filter_processes`
--
ALTER TABLE `filter_processes`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- AUTO_INCREMENT for table `orders`
--
ALTER TABLE `orders`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=24;

--
-- AUTO_INCREMENT for table `personal_access_tokens`
--
ALTER TABLE `personal_access_tokens`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `products`
--
ALTER TABLE `products`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=21;

--
-- AUTO_INCREMENT for table `roles`
--
ALTER TABLE `roles`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `suborders`
--
ALTER TABLE `suborders`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT for table `teams`
--
ALTER TABLE `teams`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=19;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=32;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
