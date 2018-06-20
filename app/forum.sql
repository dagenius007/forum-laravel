-- phpMyAdmin SQL Dump
-- version 4.7.2
-- https://www.phpmyadmin.net/
--
-- Host: localhost:8889
-- Generation Time: Jun 13, 2018 at 02:45 PM
-- Server version: 5.6.35
-- PHP Version: 7.1.6

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";

--
-- Database: `forum`
--

-- --------------------------------------------------------

--
-- Table structure for table `activities`
--

CREATE TABLE `activities` (
  `id` int(10) UNSIGNED NOT NULL,
  `user_id` int(10) UNSIGNED NOT NULL,
  `subject_id` int(10) UNSIGNED NOT NULL,
  `subject_type` varchar(50) COLLATE utf8mb4_unicode_ci NOT NULL,
  `type` varchar(50) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `activities`
--

INSERT INTO `activities` (`id`, `user_id`, `subject_id`, `subject_type`, `type`, `created_at`, `updated_at`) VALUES
(2, 1, 4, 'App\\Thread', 'created_thread', '2018-06-10 11:10:48', '2018-06-10 11:10:48'),
(3, 1, 5, 'App\\Thread', 'created_thread', '2018-06-10 11:12:29', '2018-06-10 11:12:29'),
(4, 1, 1, 'App\\Reply', 'created_reply', '2018-06-12 10:04:46', '2018-06-12 10:04:46');

-- --------------------------------------------------------

--
-- Table structure for table `categories`
--

CREATE TABLE `categories` (
  `id` int(10) UNSIGNED NOT NULL,
  `parent_id` int(10) UNSIGNED DEFAULT NULL,
  `order` int(11) NOT NULL DEFAULT '1',
  `name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `slug` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `categories`
--

INSERT INTO `categories` (`id`, `parent_id`, `order`, `name`, `slug`, `created_at`, `updated_at`) VALUES
(1, NULL, 1, 'Category 1', 'category-1', '2018-06-10 14:33:23', '2018-06-10 14:33:23'),
(2, NULL, 1, 'Category 2', 'category-2', '2018-06-10 14:33:23', '2018-06-10 14:33:23');

-- --------------------------------------------------------

--
-- Table structure for table `channels`
--

CREATE TABLE `channels` (
  `id` int(10) UNSIGNED NOT NULL,
  `name` varchar(50) COLLATE utf8mb4_unicode_ci NOT NULL,
  `slug` varchar(50) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `channels`
--

INSERT INTO `channels` (`id`, `name`, `slug`, `created_at`, `updated_at`) VALUES
(2, 'tempora', 'tempora', '2018-06-09 11:05:13', '2018-06-09 11:05:13'),
(3, 'eos', 'eos', '2018-06-09 11:05:13', '2018-06-09 11:05:13'),
(4, 'qui', 'qui', '2018-06-09 11:05:13', '2018-06-09 11:05:13'),
(5, 'eligendi', 'eligendi', '2018-06-09 11:05:13', '2018-06-09 11:05:13'),
(6, 'veritatis', 'veritatis', '2018-06-09 11:05:13', '2018-06-09 11:05:13'),
(7, 'sed', 'sed', '2018-06-09 11:05:13', '2018-06-09 11:05:13'),
(8, 'dolor', 'dolor', '2018-06-09 11:05:13', '2018-06-09 11:05:13'),
(9, 'dolores', 'dolores', '2018-06-09 11:05:13', '2018-06-09 11:05:13'),
(10, 'nam', 'nam', '2018-06-09 11:05:13', '2018-06-09 11:05:13'),
(11, 'rerum', 'rerum', '2018-06-09 11:05:13', '2018-06-09 11:05:13'),
(12, 'molestiae', 'molestiae', '2018-06-09 11:11:10', '2018-06-09 11:11:10'),
(13, 'dolore', 'dolore', '2018-06-09 11:11:10', '2018-06-09 11:11:10'),
(14, 'quia', 'quia', '2018-06-09 11:13:15', '2018-06-09 11:13:15'),
(15, 'enim', 'enim', '2018-06-09 11:13:15', '2018-06-09 11:13:15'),
(16, 'quos', 'quos', '2018-06-09 11:13:31', '2018-06-09 11:13:31'),
(17, 'mollitia', 'mollitia', '2018-06-09 11:13:31', '2018-06-09 11:13:31'),
(18, 'ut', 'ut', '2018-06-09 11:13:56', '2018-06-09 11:13:56'),
(19, 'earum', 'earum', '2018-06-09 11:13:56', '2018-06-09 11:13:56'),
(20, 'repellat', 'repellat', '2018-06-09 11:14:04', '2018-06-09 11:14:04'),
(21, 'ullam', 'ullam', '2018-06-09 11:14:04', '2018-06-09 11:14:04');

-- --------------------------------------------------------

--
-- Table structure for table `data_rows`
--

CREATE TABLE `data_rows` (
  `id` int(10) UNSIGNED NOT NULL,
  `data_type_id` int(10) UNSIGNED NOT NULL,
  `field` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `type` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `display_name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `required` tinyint(1) NOT NULL DEFAULT '0',
  `browse` tinyint(1) NOT NULL DEFAULT '1',
  `read` tinyint(1) NOT NULL DEFAULT '1',
  `edit` tinyint(1) NOT NULL DEFAULT '1',
  `add` tinyint(1) NOT NULL DEFAULT '1',
  `delete` tinyint(1) NOT NULL DEFAULT '1',
  `details` text COLLATE utf8mb4_unicode_ci,
  `order` int(11) NOT NULL DEFAULT '1'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `data_rows`
--

INSERT INTO `data_rows` (`id`, `data_type_id`, `field`, `type`, `display_name`, `required`, `browse`, `read`, `edit`, `add`, `delete`, `details`, `order`) VALUES
(1, 1, 'id', 'number', 'ID', 1, 0, 0, 0, 0, 0, '', 1),
(2, 1, 'name', 'text', 'Name', 1, 1, 1, 1, 1, 1, '', 2),
(3, 1, 'email', 'text', 'Email', 1, 1, 1, 1, 1, 1, '', 3),
(4, 1, 'password', 'password', 'Password', 1, 0, 0, 1, 1, 0, '', 4),
(5, 1, 'remember_token', 'text', 'Remember Token', 0, 0, 0, 0, 0, 0, '', 5),
(6, 1, 'created_at', 'timestamp', 'Created At', 0, 1, 1, 0, 0, 0, '', 6),
(7, 1, 'updated_at', 'timestamp', 'Updated At', 0, 0, 0, 0, 0, 0, '', 7),
(8, 1, 'avatar', 'image', 'Avatar', 0, 1, 1, 1, 1, 1, '', 8),
(9, 1, 'user_belongsto_role_relationship', 'relationship', 'Role', 0, 1, 1, 1, 1, 0, '{\"model\":\"TCG\\\\Voyager\\\\Models\\\\Role\",\"table\":\"roles\",\"type\":\"belongsTo\",\"column\":\"role_id\",\"key\":\"id\",\"label\":\"display_name\",\"pivot_table\":\"roles\",\"pivot\":\"0\"}', 10),
(10, 1, 'user_belongstomany_role_relationship', 'relationship', 'Roles', 0, 1, 1, 1, 1, 0, '{\"model\":\"TCG\\\\Voyager\\\\Models\\\\Role\",\"table\":\"roles\",\"type\":\"belongsToMany\",\"column\":\"id\",\"key\":\"id\",\"label\":\"display_name\",\"pivot_table\":\"user_roles\",\"pivot\":\"1\",\"taggable\":\"0\"}', 11),
(11, 1, 'locale', 'text', 'Locale', 0, 1, 1, 1, 1, 0, '', 12),
(12, 1, 'settings', 'hidden', 'Settings', 0, 0, 0, 0, 0, 0, '', 12),
(13, 2, 'id', 'number', 'ID', 1, 0, 0, 0, 0, 0, '', 1),
(14, 2, 'name', 'text', 'Name', 1, 1, 1, 1, 1, 1, '', 2),
(15, 2, 'created_at', 'timestamp', 'Created At', 0, 0, 0, 0, 0, 0, '', 3),
(16, 2, 'updated_at', 'timestamp', 'Updated At', 0, 0, 0, 0, 0, 0, '', 4),
(17, 3, 'id', 'number', 'ID', 1, 0, 0, 0, 0, 0, '', 1),
(18, 3, 'name', 'text', 'Name', 1, 1, 1, 1, 1, 1, '', 2),
(19, 3, 'created_at', 'timestamp', 'Created At', 0, 0, 0, 0, 0, 0, '', 3),
(20, 3, 'updated_at', 'timestamp', 'Updated At', 0, 0, 0, 0, 0, 0, '', 4),
(21, 3, 'display_name', 'text', 'Display Name', 1, 1, 1, 1, 1, 1, '', 5),
(22, 1, 'role_id', 'text', 'Role', 1, 1, 1, 1, 1, 1, '', 9),
(23, 4, 'id', 'number', 'ID', 1, 0, 0, 0, 0, 0, '', 1),
(24, 4, 'parent_id', 'select_dropdown', 'Parent', 0, 0, 1, 1, 1, 1, '{\"default\":\"\",\"null\":\"\",\"options\":{\"\":\"-- None --\"},\"relationship\":{\"key\":\"id\",\"label\":\"name\"}}', 2),
(25, 4, 'order', 'text', 'Order', 1, 1, 1, 1, 1, 1, '{\"default\":1}', 3),
(26, 4, 'name', 'text', 'Name', 1, 1, 1, 1, 1, 1, '', 4),
(27, 4, 'slug', 'text', 'Slug', 1, 1, 1, 1, 1, 1, '{\"slugify\":{\"origin\":\"name\"}}', 5),
(28, 4, 'created_at', 'timestamp', 'Created At', 0, 0, 1, 0, 0, 0, '', 6),
(29, 4, 'updated_at', 'timestamp', 'Updated At', 0, 0, 0, 0, 0, 0, '', 7),
(30, 5, 'id', 'number', 'ID', 1, 0, 0, 0, 0, 0, '', 1),
(31, 5, 'author_id', 'text', 'Author', 1, 0, 1, 1, 0, 1, '', 2),
(32, 5, 'category_id', 'text', 'Category', 1, 0, 1, 1, 1, 0, '', 3),
(33, 5, 'title', 'text', 'Title', 1, 1, 1, 1, 1, 1, '', 4),
(34, 5, 'excerpt', 'text_area', 'Excerpt', 1, 0, 1, 1, 1, 1, '', 5),
(35, 5, 'body', 'rich_text_box', 'Body', 1, 0, 1, 1, 1, 1, '', 6),
(36, 5, 'image', 'image', 'Post Image', 0, 1, 1, 1, 1, 1, '{\"resize\":{\"width\":\"1000\",\"height\":\"null\"},\"quality\":\"70%\",\"upsize\":true,\"thumbnails\":[{\"name\":\"medium\",\"scale\":\"50%\"},{\"name\":\"small\",\"scale\":\"25%\"},{\"name\":\"cropped\",\"crop\":{\"width\":\"300\",\"height\":\"250\"}}]}', 7),
(37, 5, 'slug', 'text', 'Slug', 1, 0, 1, 1, 1, 1, '{\"slugify\":{\"origin\":\"title\",\"forceUpdate\":true},\"validation\":{\"rule\":\"unique:posts,slug\"}}', 8),
(38, 5, 'meta_description', 'text_area', 'Meta Description', 1, 0, 1, 1, 1, 1, '', 9),
(39, 5, 'meta_keywords', 'text_area', 'Meta Keywords', 1, 0, 1, 1, 1, 1, '', 10),
(40, 5, 'status', 'select_dropdown', 'Status', 1, 1, 1, 1, 1, 1, '{\"default\":\"DRAFT\",\"options\":{\"PUBLISHED\":\"published\",\"DRAFT\":\"draft\",\"PENDING\":\"pending\"}}', 11),
(41, 5, 'created_at', 'timestamp', 'Created At', 0, 1, 1, 0, 0, 0, '', 12),
(42, 5, 'updated_at', 'timestamp', 'Updated At', 0, 0, 0, 0, 0, 0, '', 13),
(43, 5, 'seo_title', 'text', 'SEO Title', 0, 1, 1, 1, 1, 1, '', 14),
(44, 5, 'featured', 'checkbox', 'Featured', 1, 1, 1, 1, 1, 1, '', 15),
(45, 6, 'id', 'number', 'ID', 1, 0, 0, 0, 0, 0, '', 1),
(46, 6, 'author_id', 'text', 'Author', 1, 0, 0, 0, 0, 0, '', 2),
(47, 6, 'title', 'text', 'Title', 1, 1, 1, 1, 1, 1, '', 3),
(48, 6, 'excerpt', 'text_area', 'Excerpt', 1, 0, 1, 1, 1, 1, '', 4),
(49, 6, 'body', 'rich_text_box', 'Body', 1, 0, 1, 1, 1, 1, '', 5),
(50, 6, 'slug', 'text', 'Slug', 1, 0, 1, 1, 1, 1, '{\"slugify\":{\"origin\":\"title\"},\"validation\":{\"rule\":\"unique:pages,slug\"}}', 6),
(51, 6, 'meta_description', 'text', 'Meta Description', 1, 0, 1, 1, 1, 1, '', 7),
(52, 6, 'meta_keywords', 'text', 'Meta Keywords', 1, 0, 1, 1, 1, 1, '', 8),
(53, 6, 'status', 'select_dropdown', 'Status', 1, 1, 1, 1, 1, 1, '{\"default\":\"INACTIVE\",\"options\":{\"INACTIVE\":\"INACTIVE\",\"ACTIVE\":\"ACTIVE\"}}', 9),
(54, 6, 'created_at', 'timestamp', 'Created At', 1, 1, 1, 0, 0, 0, '', 10),
(55, 6, 'updated_at', 'timestamp', 'Updated At', 1, 0, 0, 0, 0, 0, '', 11),
(56, 6, 'image', 'image', 'Page Image', 0, 1, 1, 1, 1, 1, '', 12);

-- --------------------------------------------------------

--
-- Table structure for table `data_types`
--

CREATE TABLE `data_types` (
  `id` int(10) UNSIGNED NOT NULL,
  `name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `slug` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `display_name_singular` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `display_name_plural` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `icon` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `model_name` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `policy_name` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `controller` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `description` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `generate_permissions` tinyint(1) NOT NULL DEFAULT '0',
  `server_side` tinyint(4) NOT NULL DEFAULT '0',
  `details` text COLLATE utf8mb4_unicode_ci,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `data_types`
--

INSERT INTO `data_types` (`id`, `name`, `slug`, `display_name_singular`, `display_name_plural`, `icon`, `model_name`, `policy_name`, `controller`, `description`, `generate_permissions`, `server_side`, `details`, `created_at`, `updated_at`) VALUES
(1, 'users', 'users', 'User', 'Users', 'voyager-person', 'TCG\\Voyager\\Models\\User', 'TCG\\Voyager\\Policies\\UserPolicy', '', '', 1, 0, NULL, '2018-06-10 14:33:22', '2018-06-10 14:33:22'),
(2, 'menus', 'menus', 'Menu', 'Menus', 'voyager-list', 'TCG\\Voyager\\Models\\Menu', NULL, '', '', 1, 0, NULL, '2018-06-10 14:33:22', '2018-06-10 14:33:22'),
(3, 'roles', 'roles', 'Role', 'Roles', 'voyager-lock', 'TCG\\Voyager\\Models\\Role', NULL, '', '', 1, 0, NULL, '2018-06-10 14:33:22', '2018-06-10 14:33:22'),
(4, 'categories', 'categories', 'Category', 'Categories', 'voyager-categories', 'TCG\\Voyager\\Models\\Category', NULL, '', '', 1, 0, NULL, '2018-06-10 14:33:23', '2018-06-10 14:33:23'),
(5, 'posts', 'posts', 'Post', 'Posts', 'voyager-news', 'TCG\\Voyager\\Models\\Post', 'TCG\\Voyager\\Policies\\PostPolicy', '', '', 1, 0, NULL, '2018-06-10 14:33:23', '2018-06-10 14:33:23'),
(6, 'pages', 'pages', 'Page', 'Pages', 'voyager-file-text', 'TCG\\Voyager\\Models\\Page', NULL, '', '', 1, 0, NULL, '2018-06-10 14:33:23', '2018-06-10 14:33:23');

-- --------------------------------------------------------

--
-- Table structure for table `favorites`
--

CREATE TABLE `favorites` (
  `id` int(10) UNSIGNED NOT NULL,
  `user_id` int(10) UNSIGNED NOT NULL,
  `favorited_id` int(10) UNSIGNED NOT NULL,
  `favorited_type` varchar(50) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `favorites`
--

INSERT INTO `favorites` (`id`, `user_id`, `favorited_id`, `favorited_type`, `created_at`, `updated_at`) VALUES
(1, 1, 1, 'App\\Reply', '2018-06-12 10:04:50', '2018-06-12 10:04:50');

-- --------------------------------------------------------

--
-- Table structure for table `menus`
--

CREATE TABLE `menus` (
  `id` int(10) UNSIGNED NOT NULL,
  `name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `menus`
--

INSERT INTO `menus` (`id`, `name`, `created_at`, `updated_at`) VALUES
(1, 'admin', '2018-06-10 14:33:22', '2018-06-10 14:33:22');

-- --------------------------------------------------------

--
-- Table structure for table `menu_items`
--

CREATE TABLE `menu_items` (
  `id` int(10) UNSIGNED NOT NULL,
  `menu_id` int(10) UNSIGNED DEFAULT NULL,
  `title` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `url` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `target` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT '_self',
  `icon_class` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `color` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `parent_id` int(11) DEFAULT NULL,
  `order` int(11) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `route` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `parameters` text COLLATE utf8mb4_unicode_ci
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `menu_items`
--

INSERT INTO `menu_items` (`id`, `menu_id`, `title`, `url`, `target`, `icon_class`, `color`, `parent_id`, `order`, `created_at`, `updated_at`, `route`, `parameters`) VALUES
(1, 1, 'Dashboard', '', '_self', 'voyager-boat', NULL, NULL, 1, '2018-06-10 14:33:22', '2018-06-10 14:33:22', 'voyager.dashboard', NULL),
(2, 1, 'Media', '', '_self', 'voyager-images', NULL, NULL, 5, '2018-06-10 14:33:22', '2018-06-10 14:33:22', 'voyager.media.index', NULL),
(3, 1, 'Users', '', '_self', 'voyager-person', NULL, NULL, 3, '2018-06-10 14:33:22', '2018-06-10 14:33:22', 'voyager.users.index', NULL),
(4, 1, 'Roles', '', '_self', 'voyager-lock', NULL, NULL, 2, '2018-06-10 14:33:22', '2018-06-10 14:33:22', 'voyager.roles.index', NULL),
(5, 1, 'Tools', '', '_self', 'voyager-tools', NULL, NULL, 9, '2018-06-10 14:33:22', '2018-06-10 14:33:22', NULL, NULL),
(6, 1, 'Menu Builder', '', '_self', 'voyager-list', NULL, 5, 10, '2018-06-10 14:33:22', '2018-06-10 14:33:22', 'voyager.menus.index', NULL),
(7, 1, 'Database', '', '_self', 'voyager-data', NULL, 5, 11, '2018-06-10 14:33:22', '2018-06-10 14:33:22', 'voyager.database.index', NULL),
(8, 1, 'Compass', '', '_self', 'voyager-compass', NULL, 5, 12, '2018-06-10 14:33:22', '2018-06-10 14:33:22', 'voyager.compass.index', NULL),
(9, 1, 'BREAD', '', '_self', 'voyager-bread', NULL, 5, 13, '2018-06-10 14:33:22', '2018-06-10 14:33:22', 'voyager.bread.index', NULL),
(10, 1, 'Settings', '', '_self', 'voyager-settings', NULL, NULL, 14, '2018-06-10 14:33:22', '2018-06-10 14:33:22', 'voyager.settings.index', NULL),
(11, 1, 'Categories', '', '_self', 'voyager-categories', NULL, NULL, 8, '2018-06-10 14:33:23', '2018-06-10 14:33:23', 'voyager.categories.index', NULL),
(12, 1, 'Posts', '', '_self', 'voyager-news', NULL, NULL, 6, '2018-06-10 14:33:23', '2018-06-10 14:33:23', 'voyager.posts.index', NULL),
(13, 1, 'Pages', '', '_self', 'voyager-file-text', NULL, NULL, 7, '2018-06-10 14:33:23', '2018-06-10 14:33:23', 'voyager.pages.index', NULL),
(14, 1, 'Hooks', '', '_self', 'voyager-hook', NULL, 5, 13, '2018-06-10 14:33:23', '2018-06-10 14:33:23', 'voyager.hooks', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `migrations`
--

CREATE TABLE `migrations` (
  `id` int(10) UNSIGNED NOT NULL,
  `migration` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `batch` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `migrations`
--

INSERT INTO `migrations` (`id`, `migration`, `batch`) VALUES
(1, '2014_10_12_000000_create_users_table', 1),
(2, '2014_10_12_100000_create_password_resets_table', 1),
(3, '2017_04_21_224745_create_threads_table', 1),
(4, '2017_04_21_233654_create_replies_table', 1),
(5, '2017_05_29_025659_create_channels_table', 1),
(6, '2017_06_30_195457_create_favorites_table', 1),
(7, '2017_07_05_151909_create_activities_table', 1),
(8, '2017_10_24_160355_create_thread_subscriptions_table', 1),
(9, '2017_10_31_171936_create_notifications_table', 1),
(10, '2018_05_31_235807_add_category_to_threads', 2),
(12, '2018_06_09_092918_add_image_to_threads', 3),
(13, '2018_06_09_220227_drop_age_column_from_threads', 4),
(14, '2016_01_01_000000_add_voyager_user_fields', 5),
(15, '2016_01_01_000000_create_data_types_table', 5),
(16, '2016_05_19_173453_create_menu_table', 5),
(17, '2016_10_21_190000_create_roles_table', 5),
(18, '2016_10_21_190000_create_settings_table', 5),
(19, '2016_11_30_135954_create_permission_table', 5),
(20, '2016_11_30_141208_create_permission_role_table', 5),
(21, '2016_12_26_201236_data_types__add__server_side', 5),
(22, '2017_01_13_000000_add_route_to_menu_items_table', 5),
(23, '2017_01_14_005015_create_translations_table', 5),
(24, '2017_01_15_000000_make_table_name_nullable_in_permissions_table', 5),
(25, '2017_03_06_000000_add_controller_to_data_types_table', 5),
(26, '2017_04_21_000000_add_order_to_data_rows_table', 5),
(27, '2017_07_05_210000_add_policyname_to_data_types_table', 5),
(28, '2017_08_05_000000_add_group_to_settings_table', 5),
(29, '2017_11_26_013050_add_user_role_relationship', 5),
(30, '2017_11_26_015000_create_user_roles_table', 5),
(31, '2018_03_11_000000_add_user_settings', 5),
(32, '2018_03_14_000000_add_details_to_data_types_table', 5),
(33, '2018_03_16_000000_make_settings_value_nullable', 5),
(34, '2016_01_01_000000_create_pages_table', 6),
(35, '2016_01_01_000000_create_posts_table', 6),
(36, '2016_02_15_204651_create_categories_table', 6),
(37, '2017_04_11_000000_alter_post_nullable_fields_table', 6);

-- --------------------------------------------------------

--
-- Table structure for table `notifications`
--

CREATE TABLE `notifications` (
  `id` char(36) COLLATE utf8mb4_unicode_ci NOT NULL,
  `type` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `notifiable_id` int(10) UNSIGNED NOT NULL,
  `notifiable_type` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `data` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `read_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `pages`
--

CREATE TABLE `pages` (
  `id` int(10) UNSIGNED NOT NULL,
  `author_id` int(11) NOT NULL,
  `title` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `excerpt` text COLLATE utf8mb4_unicode_ci,
  `body` text COLLATE utf8mb4_unicode_ci,
  `image` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `slug` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `meta_description` text COLLATE utf8mb4_unicode_ci,
  `meta_keywords` text COLLATE utf8mb4_unicode_ci,
  `status` enum('ACTIVE','INACTIVE') COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'INACTIVE',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `pages`
--

INSERT INTO `pages` (`id`, `author_id`, `title`, `excerpt`, `body`, `image`, `slug`, `meta_description`, `meta_keywords`, `status`, `created_at`, `updated_at`) VALUES
(1, 0, 'Hello World', 'Hang the jib grog grog blossom grapple dance the hempen jig gangway pressgang bilge rat to go on account lugger. Nelsons folly gabion line draught scallywag fire ship gaff fluke fathom case shot. Sea Legs bilge rat sloop matey gabion long clothes run a shot across the bow Gold Road cog league.', '<p>Hello World. Scallywag grog swab Cat o\'nine tails scuttle rigging hardtack cable nipper Yellow Jack. Handsomely spirits knave lad killick landlubber or just lubber deadlights chantey pinnace crack Jennys tea cup. Provost long clothes black spot Yellow Jack bilged on her anchor league lateen sail case shot lee tackle.</p>\n<p>Ballast spirits fluke topmast me quarterdeck schooner landlubber or just lubber gabion belaying pin. Pinnace stern galleon starboard warp carouser to go on account dance the hempen jig jolly boat measured fer yer chains. Man-of-war fire in the hole nipperkin handsomely doubloon barkadeer Brethren of the Coast gibbet driver squiffy.</p>', 'pages/page1.jpg', 'hello-world', 'Yar Meta Description', 'Keyword1, Keyword2', 'ACTIVE', '2018-06-10 14:33:23', '2018-06-10 14:33:23');

-- --------------------------------------------------------

--
-- Table structure for table `password_resets`
--

CREATE TABLE `password_resets` (
  `email` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `permissions`
--

CREATE TABLE `permissions` (
  `id` int(10) UNSIGNED NOT NULL,
  `key` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `table_name` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `permissions`
--

INSERT INTO `permissions` (`id`, `key`, `table_name`, `created_at`, `updated_at`) VALUES
(1, 'browse_admin', NULL, '2018-06-10 14:33:22', '2018-06-10 14:33:22'),
(2, 'browse_bread', NULL, '2018-06-10 14:33:22', '2018-06-10 14:33:22'),
(3, 'browse_database', NULL, '2018-06-10 14:33:22', '2018-06-10 14:33:22'),
(4, 'browse_media', NULL, '2018-06-10 14:33:22', '2018-06-10 14:33:22'),
(5, 'browse_compass', NULL, '2018-06-10 14:33:22', '2018-06-10 14:33:22'),
(6, 'browse_menus', 'menus', '2018-06-10 14:33:22', '2018-06-10 14:33:22'),
(7, 'read_menus', 'menus', '2018-06-10 14:33:22', '2018-06-10 14:33:22'),
(8, 'edit_menus', 'menus', '2018-06-10 14:33:22', '2018-06-10 14:33:22'),
(9, 'add_menus', 'menus', '2018-06-10 14:33:22', '2018-06-10 14:33:22'),
(10, 'delete_menus', 'menus', '2018-06-10 14:33:22', '2018-06-10 14:33:22'),
(11, 'browse_roles', 'roles', '2018-06-10 14:33:22', '2018-06-10 14:33:22'),
(12, 'read_roles', 'roles', '2018-06-10 14:33:22', '2018-06-10 14:33:22'),
(13, 'edit_roles', 'roles', '2018-06-10 14:33:22', '2018-06-10 14:33:22'),
(14, 'add_roles', 'roles', '2018-06-10 14:33:22', '2018-06-10 14:33:22'),
(15, 'delete_roles', 'roles', '2018-06-10 14:33:22', '2018-06-10 14:33:22'),
(16, 'browse_users', 'users', '2018-06-10 14:33:22', '2018-06-10 14:33:22'),
(17, 'read_users', 'users', '2018-06-10 14:33:22', '2018-06-10 14:33:22'),
(18, 'edit_users', 'users', '2018-06-10 14:33:22', '2018-06-10 14:33:22'),
(19, 'add_users', 'users', '2018-06-10 14:33:22', '2018-06-10 14:33:22'),
(20, 'delete_users', 'users', '2018-06-10 14:33:22', '2018-06-10 14:33:22'),
(21, 'browse_settings', 'settings', '2018-06-10 14:33:22', '2018-06-10 14:33:22'),
(22, 'read_settings', 'settings', '2018-06-10 14:33:22', '2018-06-10 14:33:22'),
(23, 'edit_settings', 'settings', '2018-06-10 14:33:22', '2018-06-10 14:33:22'),
(24, 'add_settings', 'settings', '2018-06-10 14:33:22', '2018-06-10 14:33:22'),
(25, 'delete_settings', 'settings', '2018-06-10 14:33:22', '2018-06-10 14:33:22'),
(26, 'browse_categories', 'categories', '2018-06-10 14:33:23', '2018-06-10 14:33:23'),
(27, 'read_categories', 'categories', '2018-06-10 14:33:23', '2018-06-10 14:33:23'),
(28, 'edit_categories', 'categories', '2018-06-10 14:33:23', '2018-06-10 14:33:23'),
(29, 'add_categories', 'categories', '2018-06-10 14:33:23', '2018-06-10 14:33:23'),
(30, 'delete_categories', 'categories', '2018-06-10 14:33:23', '2018-06-10 14:33:23'),
(31, 'browse_posts', 'posts', '2018-06-10 14:33:23', '2018-06-10 14:33:23'),
(32, 'read_posts', 'posts', '2018-06-10 14:33:23', '2018-06-10 14:33:23'),
(33, 'edit_posts', 'posts', '2018-06-10 14:33:23', '2018-06-10 14:33:23'),
(34, 'add_posts', 'posts', '2018-06-10 14:33:23', '2018-06-10 14:33:23'),
(35, 'delete_posts', 'posts', '2018-06-10 14:33:23', '2018-06-10 14:33:23'),
(36, 'browse_pages', 'pages', '2018-06-10 14:33:23', '2018-06-10 14:33:23'),
(37, 'read_pages', 'pages', '2018-06-10 14:33:23', '2018-06-10 14:33:23'),
(38, 'edit_pages', 'pages', '2018-06-10 14:33:23', '2018-06-10 14:33:23'),
(39, 'add_pages', 'pages', '2018-06-10 14:33:23', '2018-06-10 14:33:23'),
(40, 'delete_pages', 'pages', '2018-06-10 14:33:23', '2018-06-10 14:33:23'),
(41, 'browse_hooks', NULL, '2018-06-10 14:33:23', '2018-06-10 14:33:23');

-- --------------------------------------------------------

--
-- Table structure for table `permission_role`
--

CREATE TABLE `permission_role` (
  `permission_id` int(10) UNSIGNED NOT NULL,
  `role_id` int(10) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `permission_role`
--

INSERT INTO `permission_role` (`permission_id`, `role_id`) VALUES
(1, 1),
(2, 1),
(3, 1),
(4, 1),
(5, 1),
(6, 1),
(7, 1),
(8, 1),
(9, 1),
(10, 1),
(11, 1),
(12, 1),
(13, 1),
(14, 1),
(15, 1),
(16, 1),
(17, 1),
(18, 1),
(19, 1),
(20, 1),
(21, 1),
(22, 1),
(23, 1),
(24, 1),
(25, 1),
(26, 1),
(27, 1),
(28, 1),
(29, 1),
(30, 1),
(31, 1),
(32, 1),
(33, 1),
(34, 1),
(35, 1),
(36, 1),
(37, 1),
(38, 1),
(39, 1),
(40, 1);

-- --------------------------------------------------------

--
-- Table structure for table `posts`
--

CREATE TABLE `posts` (
  `id` int(10) UNSIGNED NOT NULL,
  `author_id` int(11) NOT NULL,
  `category_id` int(11) DEFAULT NULL,
  `title` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `seo_title` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `excerpt` text COLLATE utf8mb4_unicode_ci,
  `body` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `image` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `slug` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `meta_description` text COLLATE utf8mb4_unicode_ci,
  `meta_keywords` text COLLATE utf8mb4_unicode_ci,
  `status` enum('PUBLISHED','DRAFT','PENDING') COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'DRAFT',
  `featured` tinyint(1) NOT NULL DEFAULT '0',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `posts`
--

INSERT INTO `posts` (`id`, `author_id`, `category_id`, `title`, `seo_title`, `excerpt`, `body`, `image`, `slug`, `meta_description`, `meta_keywords`, `status`, `featured`, `created_at`, `updated_at`) VALUES
(1, 0, NULL, 'Lorem Ipsum Post', NULL, 'This is the excerpt for the Lorem Ipsum Post', '<p>This is the body of the lorem ipsum post</p>', 'posts/post1.jpg', 'lorem-ipsum-post', 'This is the meta description', 'keyword1, keyword2, keyword3', 'PUBLISHED', 0, '2018-06-10 14:33:23', '2018-06-10 14:33:23'),
(2, 0, NULL, 'My Sample Post', NULL, 'This is the excerpt for the sample Post', '<p>This is the body for the sample post, which includes the body.</p>\n                <h2>We can use all kinds of format!</h2>\n                <p>And include a bunch of other stuff.</p>', 'posts/post2.jpg', 'my-sample-post', 'Meta Description for sample post', 'keyword1, keyword2, keyword3', 'PUBLISHED', 0, '2018-06-10 14:33:23', '2018-06-10 14:33:23'),
(3, 0, NULL, 'Latest Post', NULL, 'This is the excerpt for the latest post', '<p>This is the body for the latest post</p>', 'posts/post3.jpg', 'latest-post', 'This is the meta description', 'keyword1, keyword2, keyword3', 'PUBLISHED', 0, '2018-06-10 14:33:23', '2018-06-10 14:33:23'),
(4, 0, NULL, 'Yarr Post', NULL, 'Reef sails nipperkin bring a spring upon her cable coffer jury mast spike marooned Pieces of Eight poop deck pillage. Clipper driver coxswain galleon hempen halter come about pressgang gangplank boatswain swing the lead. Nipperkin yard skysail swab lanyard Blimey bilge water ho quarter Buccaneer.', '<p>Swab deadlights Buccaneer fire ship square-rigged dance the hempen jig weigh anchor cackle fruit grog furl. Crack Jennys tea cup chase guns pressgang hearties spirits hogshead Gold Road six pounders fathom measured fer yer chains. Main sheet provost come about trysail barkadeer crimp scuttle mizzenmast brig plunder.</p>\n<p>Mizzen league keelhaul galleon tender cog chase Barbary Coast doubloon crack Jennys tea cup. Blow the man down lugsail fire ship pinnace cackle fruit line warp Admiral of the Black strike colors doubloon. Tackle Jack Ketch come about crimp rum draft scuppers run a shot across the bow haul wind maroon.</p>\n<p>Interloper heave down list driver pressgang holystone scuppers tackle scallywag bilged on her anchor. Jack Tar interloper draught grapple mizzenmast hulk knave cable transom hogshead. Gaff pillage to go on account grog aft chase guns piracy yardarm knave clap of thunder.</p>', 'posts/post4.jpg', 'yarr-post', 'this be a meta descript', 'keyword1, keyword2, keyword3', 'PUBLISHED', 0, '2018-06-10 14:33:23', '2018-06-10 14:33:23');

-- --------------------------------------------------------

--
-- Table structure for table `replies`
--

CREATE TABLE `replies` (
  `id` int(10) UNSIGNED NOT NULL,
  `thread_id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `body` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `replies`
--

INSERT INTO `replies` (`id`, `thread_id`, `user_id`, `body`, `created_at`, `updated_at`) VALUES
(1, 1, 1, 'wqdhsbdhbdhe', '2018-06-12 10:04:46', '2018-06-12 10:04:46');

-- --------------------------------------------------------

--
-- Table structure for table `roles`
--

CREATE TABLE `roles` (
  `id` int(10) UNSIGNED NOT NULL,
  `name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `display_name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `roles`
--

INSERT INTO `roles` (`id`, `name`, `display_name`, `created_at`, `updated_at`) VALUES
(1, 'admin', 'Administrator', '2018-06-10 14:33:22', '2018-06-10 14:33:22'),
(2, 'user', 'Normal User', '2018-06-10 14:33:22', '2018-06-10 14:33:22');

-- --------------------------------------------------------

--
-- Table structure for table `settings`
--

CREATE TABLE `settings` (
  `id` int(10) UNSIGNED NOT NULL,
  `key` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `display_name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `value` text COLLATE utf8mb4_unicode_ci,
  `details` text COLLATE utf8mb4_unicode_ci,
  `type` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `order` int(11) NOT NULL DEFAULT '1',
  `group` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `settings`
--

INSERT INTO `settings` (`id`, `key`, `display_name`, `value`, `details`, `type`, `order`, `group`) VALUES
(1, 'site.title', 'Site Title', 'Site Title', '', 'text', 1, 'Site'),
(2, 'site.description', 'Site Description', 'Site Description', '', 'text', 2, 'Site'),
(3, 'site.logo', 'Site Logo', '', '', 'image', 3, 'Site'),
(4, 'site.google_analytics_tracking_id', 'Google Analytics Tracking ID', '', '', 'text', 4, 'Site'),
(5, 'admin.bg_image', 'Admin Background Image', '', '', 'image', 5, 'Admin'),
(6, 'admin.title', 'Admin Title', 'Voyager', '', 'text', 1, 'Admin'),
(7, 'admin.description', 'Admin Description', 'Welcome to Voyager. The Missing Admin for Laravel', '', 'text', 2, 'Admin'),
(8, 'admin.loader', 'Admin Loader', '', '', 'image', 3, 'Admin'),
(9, 'admin.icon_image', 'Admin Icon Image', '', '', 'image', 4, 'Admin'),
(10, 'admin.google_analytics_client_id', 'Google Analytics Client ID (used for admin dashboard)', '', '', 'text', 1, 'Admin');

-- --------------------------------------------------------

--
-- Table structure for table `threads`
--

CREATE TABLE `threads` (
  `id` int(10) UNSIGNED NOT NULL,
  `user_id` int(10) UNSIGNED NOT NULL,
  `channel_id` int(10) UNSIGNED NOT NULL,
  `replies_count` int(10) UNSIGNED NOT NULL DEFAULT '0',
  `title` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `body` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `thread_img` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `threads`
--

INSERT INTO `threads` (`id`, `user_id`, `channel_id`, `replies_count`, `title`, `body`, `created_at`, `updated_at`, `thread_img`) VALUES
(1, 10, 20, 1, 'Dolorum soluta asperiores et praesentium est voluptatem.', 'Ad enim voluptatem dolores dolor quam dolor qui temporibus. Autem omnis qui et. Est culpa aut quia iusto voluptas ullam. Et consectetur totam doloremque ab dicta pariatur.', '2018-06-09 11:14:04', '2018-06-12 10:04:46', ''),
(2, 11, 21, 0, 'Minus dignissimos tempora ullam provident molestias placeat.', 'Assumenda dolorem facilis quia eveniet aperiam. Quo sint corporis et praesentium quisquam voluptatem tempore. Totam porro reiciendis dolorem incidunt laboriosam.', '2018-06-09 11:14:04', '2018-06-09 11:14:04', ''),
(4, 1, 3, 0, 'Because I love you', 'pls pls pls', '2018-06-10 11:10:48', '2018-06-10 11:10:48', '1528632648.png'),
(5, 1, 5, 0, 'Why always useee', 'skanjabjbdschj bchjdsbchds bbscjbsjcbdcedc sbndj', '2018-06-10 11:12:29', '2018-06-13 09:52:17', '1528841908.jpg');

-- --------------------------------------------------------

--
-- Table structure for table `thread_subscriptions`
--

CREATE TABLE `thread_subscriptions` (
  `id` int(10) UNSIGNED NOT NULL,
  `user_id` int(10) UNSIGNED NOT NULL,
  `thread_id` int(10) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `translations`
--

CREATE TABLE `translations` (
  `id` int(10) UNSIGNED NOT NULL,
  `table_name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `column_name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `foreign_key` int(10) UNSIGNED NOT NULL,
  `locale` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `value` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `translations`
--

INSERT INTO `translations` (`id`, `table_name`, `column_name`, `foreign_key`, `locale`, `value`, `created_at`, `updated_at`) VALUES
(1, 'data_types', 'display_name_singular', 5, 'pt', 'Post', '2018-06-10 14:33:23', '2018-06-10 14:33:23'),
(2, 'data_types', 'display_name_singular', 6, 'pt', 'Página', '2018-06-10 14:33:23', '2018-06-10 14:33:23'),
(3, 'data_types', 'display_name_singular', 1, 'pt', 'Utilizador', '2018-06-10 14:33:23', '2018-06-10 14:33:23'),
(4, 'data_types', 'display_name_singular', 4, 'pt', 'Categoria', '2018-06-10 14:33:23', '2018-06-10 14:33:23'),
(5, 'data_types', 'display_name_singular', 2, 'pt', 'Menu', '2018-06-10 14:33:23', '2018-06-10 14:33:23'),
(6, 'data_types', 'display_name_singular', 3, 'pt', 'Função', '2018-06-10 14:33:23', '2018-06-10 14:33:23'),
(7, 'data_types', 'display_name_plural', 5, 'pt', 'Posts', '2018-06-10 14:33:23', '2018-06-10 14:33:23'),
(8, 'data_types', 'display_name_plural', 6, 'pt', 'Páginas', '2018-06-10 14:33:23', '2018-06-10 14:33:23'),
(9, 'data_types', 'display_name_plural', 1, 'pt', 'Utilizadores', '2018-06-10 14:33:23', '2018-06-10 14:33:23'),
(10, 'data_types', 'display_name_plural', 4, 'pt', 'Categorias', '2018-06-10 14:33:23', '2018-06-10 14:33:23'),
(11, 'data_types', 'display_name_plural', 2, 'pt', 'Menus', '2018-06-10 14:33:23', '2018-06-10 14:33:23'),
(12, 'data_types', 'display_name_plural', 3, 'pt', 'Funções', '2018-06-10 14:33:23', '2018-06-10 14:33:23'),
(13, 'categories', 'slug', 1, 'pt', 'categoria-1', '2018-06-10 14:33:23', '2018-06-10 14:33:23'),
(14, 'categories', 'name', 1, 'pt', 'Categoria 1', '2018-06-10 14:33:23', '2018-06-10 14:33:23'),
(15, 'categories', 'slug', 2, 'pt', 'categoria-2', '2018-06-10 14:33:23', '2018-06-10 14:33:23'),
(16, 'categories', 'name', 2, 'pt', 'Categoria 2', '2018-06-10 14:33:23', '2018-06-10 14:33:23'),
(17, 'pages', 'title', 1, 'pt', 'Olá Mundo', '2018-06-10 14:33:23', '2018-06-10 14:33:23'),
(18, 'pages', 'slug', 1, 'pt', 'ola-mundo', '2018-06-10 14:33:23', '2018-06-10 14:33:23'),
(19, 'pages', 'body', 1, 'pt', '<p>Olá Mundo. Scallywag grog swab Cat o\'nine tails scuttle rigging hardtack cable nipper Yellow Jack. Handsomely spirits knave lad killick landlubber or just lubber deadlights chantey pinnace crack Jennys tea cup. Provost long clothes black spot Yellow Jack bilged on her anchor league lateen sail case shot lee tackle.</p>\r\n<p>Ballast spirits fluke topmast me quarterdeck schooner landlubber or just lubber gabion belaying pin. Pinnace stern galleon starboard warp carouser to go on account dance the hempen jig jolly boat measured fer yer chains. Man-of-war fire in the hole nipperkin handsomely doubloon barkadeer Brethren of the Coast gibbet driver squiffy.</p>', '2018-06-10 14:33:23', '2018-06-10 14:33:23'),
(20, 'menu_items', 'title', 1, 'pt', 'Painel de Controle', '2018-06-10 14:33:23', '2018-06-10 14:33:23'),
(21, 'menu_items', 'title', 2, 'pt', 'Media', '2018-06-10 14:33:23', '2018-06-10 14:33:23'),
(22, 'menu_items', 'title', 12, 'pt', 'Publicações', '2018-06-10 14:33:23', '2018-06-10 14:33:23'),
(23, 'menu_items', 'title', 3, 'pt', 'Utilizadores', '2018-06-10 14:33:23', '2018-06-10 14:33:23'),
(24, 'menu_items', 'title', 11, 'pt', 'Categorias', '2018-06-10 14:33:23', '2018-06-10 14:33:23'),
(25, 'menu_items', 'title', 13, 'pt', 'Páginas', '2018-06-10 14:33:23', '2018-06-10 14:33:23'),
(26, 'menu_items', 'title', 4, 'pt', 'Funções', '2018-06-10 14:33:23', '2018-06-10 14:33:23'),
(27, 'menu_items', 'title', 5, 'pt', 'Ferramentas', '2018-06-10 14:33:23', '2018-06-10 14:33:23'),
(28, 'menu_items', 'title', 6, 'pt', 'Menus', '2018-06-10 14:33:23', '2018-06-10 14:33:23'),
(29, 'menu_items', 'title', 7, 'pt', 'Base de dados', '2018-06-10 14:33:23', '2018-06-10 14:33:23'),
(30, 'menu_items', 'title', 10, 'pt', 'Configurações', '2018-06-10 14:33:23', '2018-06-10 14:33:23');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(10) UNSIGNED NOT NULL,
  `role_id` int(10) UNSIGNED DEFAULT NULL,
  `name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `avatar` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT 'users/default.png',
  `password` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `settings` text COLLATE utf8mb4_unicode_ci,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `role_id`, `name`, `email`, `avatar`, `password`, `remember_token`, `settings`, `created_at`, `updated_at`) VALUES
(1, NULL, 'Joshua Oluikpe', 'joshuaoluikpe@gmail.com', 'users/default.png', '$2y$10$lskfVNOVNJXsNL74wC394uDVClBg3fOAws/YPsHSzAb634Mcm0zwW', 'tPeh9SGatZ6XUwpOsT0Z2ZD4ioWfh3jl142po2LRDHdNrKzv5TqhhP0nQOhl', NULL, '2018-05-27 11:52:10', '2018-05-27 11:52:10'),
(2, NULL, 'Noe Botsford', 'boyer.annabelle@example.com', 'users/default.png', '$2y$10$CbAi.oVAv7AHF16hwoKuEe7scUOg74hsOBk5Gq.qRA8dZdGnSsD/u', 'jRXA6xhiYu', NULL, '2018-06-09 11:11:10', '2018-06-09 11:11:10'),
(3, NULL, 'Prof. Brendon Brekke III', 'yroberts@example.org', 'users/default.png', '$2y$10$CbAi.oVAv7AHF16hwoKuEe7scUOg74hsOBk5Gq.qRA8dZdGnSsD/u', 'FuQvEk3Wdz', NULL, '2018-06-09 11:11:10', '2018-06-09 11:11:10'),
(4, NULL, 'Paula Batz', 'kgrant@example.net', 'users/default.png', '$2y$10$CbAi.oVAv7AHF16hwoKuEe7scUOg74hsOBk5Gq.qRA8dZdGnSsD/u', 'yLQwndsqZC', NULL, '2018-06-09 11:13:15', '2018-06-09 11:13:15'),
(5, NULL, 'King Schmitt Sr.', 'katherine.zulauf@example.org', 'users/default.png', '$2y$10$CbAi.oVAv7AHF16hwoKuEe7scUOg74hsOBk5Gq.qRA8dZdGnSsD/u', 'owfhkA9bDa', NULL, '2018-06-09 11:13:15', '2018-06-09 11:13:15'),
(6, NULL, 'Abe Gutmann', 'rose.farrell@example.com', 'users/default.png', '$2y$10$XKqpOcHaluSs50TNJrhXKO8L70gWmtgSEKPRTfagom5kR9VzJ34vy', 'GIyyZyldeO', NULL, '2018-06-09 11:13:31', '2018-06-09 11:13:31'),
(7, NULL, 'Cayla Thompson', 'clarissa.lueilwitz@example.net', 'users/default.png', '$2y$10$XKqpOcHaluSs50TNJrhXKO8L70gWmtgSEKPRTfagom5kR9VzJ34vy', 'X1A0UPuxXQ', NULL, '2018-06-09 11:13:31', '2018-06-09 11:13:31'),
(8, NULL, 'Jaunita Connelly', 'lester.schultz@example.net', 'users/default.png', '$2y$10$XKqpOcHaluSs50TNJrhXKO8L70gWmtgSEKPRTfagom5kR9VzJ34vy', 'BiV6HEGMV1', NULL, '2018-06-09 11:13:56', '2018-06-09 11:13:56'),
(9, NULL, 'Alyson Buckridge', 'doug.hackett@example.net', 'users/default.png', '$2y$10$XKqpOcHaluSs50TNJrhXKO8L70gWmtgSEKPRTfagom5kR9VzJ34vy', 'chWWGrMLqJ', NULL, '2018-06-09 11:13:56', '2018-06-09 11:13:56'),
(10, NULL, 'Prof. Abigail Upton', 'gaston51@example.org', 'users/default.png', '$2y$10$FghSvCdZyrBnKtqAt53g0OCWa7iJ3KI/7LNj91tUj0hPqhbbKLc3a', 'iB0ALJZCYQ', NULL, '2018-06-09 11:14:04', '2018-06-09 11:14:04'),
(11, NULL, 'Mr. Camden Thiel Jr.', 'bbailey@example.org', 'users/default.png', '$2y$10$FghSvCdZyrBnKtqAt53g0OCWa7iJ3KI/7LNj91tUj0hPqhbbKLc3a', 'UNAcXANbm0', NULL, '2018-06-09 11:14:04', '2018-06-09 11:14:04');

-- --------------------------------------------------------

--
-- Table structure for table `user_roles`
--

CREATE TABLE `user_roles` (
  `user_id` int(10) UNSIGNED NOT NULL,
  `role_id` int(10) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Indexes for dumped tables
--

--
-- Indexes for table `activities`
--
ALTER TABLE `activities`
  ADD PRIMARY KEY (`id`),
  ADD KEY `activities_user_id_index` (`user_id`),
  ADD KEY `activities_subject_id_index` (`subject_id`);

--
-- Indexes for table `categories`
--
ALTER TABLE `categories`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `categories_slug_unique` (`slug`),
  ADD KEY `categories_parent_id_foreign` (`parent_id`);

--
-- Indexes for table `channels`
--
ALTER TABLE `channels`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `data_rows`
--
ALTER TABLE `data_rows`
  ADD PRIMARY KEY (`id`),
  ADD KEY `data_rows_data_type_id_foreign` (`data_type_id`);

--
-- Indexes for table `data_types`
--
ALTER TABLE `data_types`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `data_types_name_unique` (`name`),
  ADD UNIQUE KEY `data_types_slug_unique` (`slug`);

--
-- Indexes for table `favorites`
--
ALTER TABLE `favorites`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `favorites_user_id_favorited_id_favorited_type_unique` (`user_id`,`favorited_id`,`favorited_type`);

--
-- Indexes for table `menus`
--
ALTER TABLE `menus`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `menus_name_unique` (`name`);

--
-- Indexes for table `menu_items`
--
ALTER TABLE `menu_items`
  ADD PRIMARY KEY (`id`),
  ADD KEY `menu_items_menu_id_foreign` (`menu_id`);

--
-- Indexes for table `migrations`
--
ALTER TABLE `migrations`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `notifications`
--
ALTER TABLE `notifications`
  ADD PRIMARY KEY (`id`),
  ADD KEY `notifications_notifiable_id_notifiable_type_index` (`notifiable_id`,`notifiable_type`);

--
-- Indexes for table `pages`
--
ALTER TABLE `pages`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `pages_slug_unique` (`slug`);

--
-- Indexes for table `password_resets`
--
ALTER TABLE `password_resets`
  ADD KEY `password_resets_email_index` (`email`);

--
-- Indexes for table `permissions`
--
ALTER TABLE `permissions`
  ADD PRIMARY KEY (`id`),
  ADD KEY `permissions_key_index` (`key`);

--
-- Indexes for table `permission_role`
--
ALTER TABLE `permission_role`
  ADD PRIMARY KEY (`permission_id`,`role_id`),
  ADD KEY `permission_role_permission_id_index` (`permission_id`),
  ADD KEY `permission_role_role_id_index` (`role_id`);

--
-- Indexes for table `posts`
--
ALTER TABLE `posts`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `posts_slug_unique` (`slug`);

--
-- Indexes for table `replies`
--
ALTER TABLE `replies`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `roles`
--
ALTER TABLE `roles`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `roles_name_unique` (`name`);

--
-- Indexes for table `settings`
--
ALTER TABLE `settings`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `settings_key_unique` (`key`);

--
-- Indexes for table `threads`
--
ALTER TABLE `threads`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `thread_subscriptions`
--
ALTER TABLE `thread_subscriptions`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `thread_subscriptions_user_id_thread_id_unique` (`user_id`,`thread_id`),
  ADD KEY `thread_subscriptions_thread_id_foreign` (`thread_id`);

--
-- Indexes for table `translations`
--
ALTER TABLE `translations`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `translations_table_name_column_name_foreign_key_locale_unique` (`table_name`,`column_name`,`foreign_key`,`locale`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `users_email_unique` (`email`),
  ADD KEY `users_role_id_foreign` (`role_id`);

--
-- Indexes for table `user_roles`
--
ALTER TABLE `user_roles`
  ADD PRIMARY KEY (`user_id`,`role_id`),
  ADD KEY `user_roles_user_id_index` (`user_id`),
  ADD KEY `user_roles_role_id_index` (`role_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `activities`
--
ALTER TABLE `activities`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;
--
-- AUTO_INCREMENT for table `categories`
--
ALTER TABLE `categories`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
--
-- AUTO_INCREMENT for table `channels`
--
ALTER TABLE `channels`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=22;
--
-- AUTO_INCREMENT for table `data_rows`
--
ALTER TABLE `data_rows`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=57;
--
-- AUTO_INCREMENT for table `data_types`
--
ALTER TABLE `data_types`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;
--
-- AUTO_INCREMENT for table `favorites`
--
ALTER TABLE `favorites`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT for table `menus`
--
ALTER TABLE `menus`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT for table `menu_items`
--
ALTER TABLE `menu_items`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;
--
-- AUTO_INCREMENT for table `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=38;
--
-- AUTO_INCREMENT for table `pages`
--
ALTER TABLE `pages`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT for table `permissions`
--
ALTER TABLE `permissions`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=42;
--
-- AUTO_INCREMENT for table `posts`
--
ALTER TABLE `posts`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;
--
-- AUTO_INCREMENT for table `replies`
--
ALTER TABLE `replies`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT for table `roles`
--
ALTER TABLE `roles`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
--
-- AUTO_INCREMENT for table `settings`
--
ALTER TABLE `settings`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;
--
-- AUTO_INCREMENT for table `threads`
--
ALTER TABLE `threads`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;
--
-- AUTO_INCREMENT for table `thread_subscriptions`
--
ALTER TABLE `thread_subscriptions`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `translations`
--
ALTER TABLE `translations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=31;
--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;
--
-- Constraints for dumped tables
--

--
-- Constraints for table `categories`
--
ALTER TABLE `categories`
  ADD CONSTRAINT `categories_parent_id_foreign` FOREIGN KEY (`parent_id`) REFERENCES `categories` (`id`) ON DELETE SET NULL ON UPDATE CASCADE;

--
-- Constraints for table `data_rows`
--
ALTER TABLE `data_rows`
  ADD CONSTRAINT `data_rows_data_type_id_foreign` FOREIGN KEY (`data_type_id`) REFERENCES `data_types` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `menu_items`
--
ALTER TABLE `menu_items`
  ADD CONSTRAINT `menu_items_menu_id_foreign` FOREIGN KEY (`menu_id`) REFERENCES `menus` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `permission_role`
--
ALTER TABLE `permission_role`
  ADD CONSTRAINT `permission_role_permission_id_foreign` FOREIGN KEY (`permission_id`) REFERENCES `permissions` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `permission_role_role_id_foreign` FOREIGN KEY (`role_id`) REFERENCES `roles` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `thread_subscriptions`
--
ALTER TABLE `thread_subscriptions`
  ADD CONSTRAINT `thread_subscriptions_thread_id_foreign` FOREIGN KEY (`thread_id`) REFERENCES `threads` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `users`
--
ALTER TABLE `users`
  ADD CONSTRAINT `users_role_id_foreign` FOREIGN KEY (`role_id`) REFERENCES `roles` (`id`);

--
-- Constraints for table `user_roles`
--
ALTER TABLE `user_roles`
  ADD CONSTRAINT `user_roles_role_id_foreign` FOREIGN KEY (`role_id`) REFERENCES `roles` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `user_roles_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE;