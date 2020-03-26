-- phpMyAdmin SQL Dump
-- version 4.8.3
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Nov 29, 2018 at 04:03 AM
-- Server version: 10.1.36-MariaDB
-- PHP Version: 7.2.11

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `shop`
--

-- --------------------------------------------------------

--
-- Table structure for table `admins`
--

CREATE TABLE `admins` (
  `id` int(10) UNSIGNED NOT NULL,
  `name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `username` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `avatar` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `phone` varchar(20) COLLATE utf8mb4_unicode_ci NOT NULL,
  `address` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `facebook` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `role_id` int(10) UNSIGNED DEFAULT NULL,
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `password` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `admins`
--

INSERT INTO `admins` (`id`, `name`, `email`, `username`, `avatar`, `phone`, `address`, `facebook`, `role_id`, `email_verified_at`, `password`, `remember_token`, `created_at`, `updated_at`) VALUES
(1, 'Nguyễn Minh Quân', 'minhquan.k0r1@gmail.com', 'minhquan3197', '/files/1/Avatar/admin.jpg', '0938801071', '76 Phan Tây Hồ, Phường 7, Quận Phú Nhuận', 'https://www.facebook.com/Quan.K0r1', 1, NULL, '$2y$10$386YufpUKYP.hcwvSXAM0eUKMVXwuwu/PhZPFslGKI/a9RF6Vuw8K', NULL, NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `banners`
--

CREATE TABLE `banners` (
  `id` int(10) UNSIGNED NOT NULL,
  `image` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `description` text COLLATE utf8mb4_unicode_ci,
  `status` tinyint(1) NOT NULL DEFAULT '0',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `categories`
--

CREATE TABLE `categories` (
  `id` int(10) UNSIGNED NOT NULL,
  `name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `alias` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `display_order` int(11) NOT NULL,
  `meta_keyword` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `meta_description` text COLLATE utf8mb4_unicode_ci,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `categories`
--

INSERT INTO `categories` (`id`, `name`, `alias`, `display_order`, `meta_keyword`, `meta_description`, `created_at`, `updated_at`) VALUES
(1, 'Đồ ăn', 'do-an', 1, 'Đồ ăn', 'Đồ ăn', NULL, NULL),
(2, 'Đồ uống', 'do-uong', 2, 'Đồ uống', 'Đồ uống', NULL, NULL),
(3, 'Linh kiện', 'linh kien', 3, 'Linh kiện', 'Linh kiện', NULL, NULL),
(4, 'Sách', 'sach', 4, 'Sách', 'Sách', NULL, NULL),
(5, 'Thời trang', 'thoi-trang', 5, 'Thời trang', 'Thời trang', NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `contacts`
--

CREATE TABLE `contacts` (
  `id` int(10) UNSIGNED NOT NULL,
  `address` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `email` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `phone` varchar(20) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

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
(17, '2018_11_13_232717_create_slides_table', 1),
(82, '2013_11_09_052603_create_schools_table', 2),
(83, '2014_10_12_000000_create_users_table', 2),
(84, '2014_10_12_100000_create_password_resets_table', 2),
(85, '2018_11_09_052458_create_pages_table', 2),
(86, '2018_11_09_052735_create_banners_table', 2),
(87, '2018_11_09_052804_create_categories_table', 2),
(88, '2018_11_09_052821_create_products_table', 2),
(89, '2018_11_09_052855_create_contacts_table', 2),
(90, '2018_11_09_054342_create_roles_table', 2),
(91, '2018_11_09_054409_create_permission_categories_table', 2),
(92, '2018_11_09_054439_create_permissions_table', 2),
(93, '2018_11_09_054440_create_role_permissions_table', 2),
(94, '2018_11_09_054505_create_visitor_statistics_table', 2),
(95, '2018_11_09_062631_create_admins_table', 2),
(96, '2018_11_13_033645_create_rules_categories_table', 2),
(97, '2018_11_13_033715_create_rules_table', 2);

-- --------------------------------------------------------

--
-- Table structure for table `pages`
--

CREATE TABLE `pages` (
  `id` int(10) UNSIGNED NOT NULL,
  `name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `alias` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `content` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `image` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `meta_keyword` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `meta_description` text COLLATE utf8mb4_unicode_ci,
  `status` tinyint(1) NOT NULL DEFAULT '0',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

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
  `title` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `id_category` int(10) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `permissions`
--

INSERT INTO `permissions` (`id`, `title`, `name`, `id_category`, `created_at`, `updated_at`) VALUES
(1, 'Quản lý banner', 'banner', 1, NULL, NULL),
(2, 'Quản lý danh mục', 'category', 1, NULL, NULL),
(3, 'Quản lý liên hệ', 'contact', 1, NULL, NULL),
(4, 'Quản lý slide', 'slide', 1, NULL, NULL),
(5, 'Quản lý trường', 'school', 1, NULL, NULL),
(6, 'Kích hoạt người dùng', 'change_customer', 2, NULL, NULL),
(7, 'Kích hoạt sản phẩm người dùng', 'change_product', 2, NULL, NULL),
(8, 'Xóa sản phẩm người dùng', 'delete_product', 2, NULL, NULL),
(9, 'Kích hoạt cửa hàng người dùng', 'change_store', 2, NULL, NULL),
(10, 'Xóa cửa hàng người dùng', 'delete_store', 2, NULL, NULL),
(11, 'Quản lý trang', 'page', 3, NULL, NULL),
(12, 'Quản lý danh mục điều lệ', 'rule_category', 4, NULL, NULL),
(13, 'Quản lý điều lệ', 'rule', 4, NULL, NULL),
(14, 'Quản trị nhân sự', 'account', 5, NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `permission_categories`
--

CREATE TABLE `permission_categories` (
  `id` int(10) UNSIGNED NOT NULL,
  `name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `permission_categories`
--

INSERT INTO `permission_categories` (`id`, `name`, `created_at`, `updated_at`) VALUES
(1, 'Quản trị website', NULL, NULL),
(2, 'Quản trị khách hàng', NULL, NULL),
(3, 'Quản trị trang', NULL, NULL),
(4, 'Quản trị điều lệ', NULL, NULL),
(5, 'Quản trị nhân sự', NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `products`
--

CREATE TABLE `products` (
  `id` int(10) UNSIGNED NOT NULL,
  `name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `alias` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `content` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `gallery` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `price` int(11) NOT NULL,
  `facebook` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `phone` int(11) NOT NULL,
  `status` tinyint(1) NOT NULL DEFAULT '0',
  `meta_keyword` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `meta_description` text COLLATE utf8mb4_unicode_ci,
  `id_category` int(10) UNSIGNED DEFAULT NULL,
  `out_of_stock` tinyint(1) NOT NULL DEFAULT '1',
  `id_user` int(10) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `products`
--

INSERT INTO `products` (`id`, `name`, `alias`, `content`, `gallery`, `price`, `facebook`, `phone`, `status`, `meta_keyword`, `meta_description`, `id_category`, `out_of_stock`, `id_user`, `created_at`, `updated_at`) VALUES
(1, 'Mainboard Z97', 'mainboard-z97', '<p>H&agrave;ng n&oacute;ng hổi mới về</p>', '[\"images\\/products\\/hpnguyen545@gmail.com\\/15434596580.jpg\",\"images\\/products\\/hpnguyen545@gmail.com\\/15434596581.jpg\",\"images\\/products\\/hpnguyen545@gmail.com\\/15434596582.jpg\",\"images\\/products\\/hpnguyen545@gmail.com\\/15434596583.jpg\"]', 4000000, 'https://www.facebook.com/lang.tram.161', 962087540, 1, 'Mainboard Z97', 'Mainboard Z97', 3, 1, 2, '2018-11-29 02:47:38', '2018-11-29 02:52:12'),
(2, 'Chả cốm Mộc An', 'cha-com-moc-an', '<p>Cốm nếp c&aacute;i hoa v&agrave;ng với những hạt cốm xanh rờn vừa dẻo vừa thơm - c&aacute;i hương thơm rất ri&ecirc;ng của l&uacute;a nếp mới qua thời kỳ ngậm sữa&nbsp;🌾🌾🌾&nbsp;<br />\nChả cốm gi&ograve;n gi&ograve;n, dai dai, thơm thơm, ngọt ngọt&nbsp;😋😋</p>', '[\"images\\/products\\/hpnguyen545@gmail.com\\/15434599120.jpg\",\"images\\/products\\/hpnguyen545@gmail.com\\/15434599121.jpg\",\"images\\/products\\/hpnguyen545@gmail.com\\/15434599122.jpg\"]', 76000, 'https://www.facebook.com/Quan.K0r1', 915448858, 1, 'Chả cốm Mộc An', 'Chả cốm Mộc An', 1, 1, 2, '2018-11-29 02:51:52', '2018-11-29 02:52:02'),
(3, 'Go Camera', 'go-camera', '<p>Sản phẩm mới</p>', '[\"images\\/products\\/minhquan.k0r1@gmail.com\\/15434600930.jpg\"]', 2000000, 'https://www.facebook.com/Quan.K0r1', 938801071, 1, 'Go Camera', 'Go Camera', 3, 1, 1, '2018-11-29 02:54:53', '2018-11-29 02:55:06');

-- --------------------------------------------------------

--
-- Table structure for table `roles`
--

CREATE TABLE `roles` (
  `id` int(10) UNSIGNED NOT NULL,
  `name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `roles`
--

INSERT INTO `roles` (`id`, `name`, `created_at`, `updated_at`) VALUES
(1, 'Quản trị viên cấp cao', NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `role_permissions`
--

CREATE TABLE `role_permissions` (
  `role_id` int(10) UNSIGNED NOT NULL,
  `permission_id` int(10) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `role_permissions`
--

INSERT INTO `role_permissions` (`role_id`, `permission_id`, `created_at`, `updated_at`) VALUES
(1, 1, NULL, NULL),
(1, 2, NULL, NULL),
(1, 3, NULL, NULL),
(1, 4, NULL, NULL),
(1, 5, NULL, NULL),
(1, 6, NULL, NULL),
(1, 7, NULL, NULL),
(1, 8, NULL, NULL),
(1, 9, NULL, NULL),
(1, 10, NULL, NULL),
(1, 11, NULL, NULL),
(1, 12, NULL, NULL),
(1, 13, NULL, NULL),
(1, 14, NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `rules`
--

CREATE TABLE `rules` (
  `id` int(10) UNSIGNED NOT NULL,
  `title` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `alias` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `content` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `id_category` int(10) UNSIGNED DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `rules`
--

INSERT INTO `rules` (`id`, `title`, `alias`, `content`, `id_category`, `created_at`, `updated_at`) VALUES
(1, 'Quy định đăng tin trên Chợ Sinh Viên', 'quy-dinh-dang-tin-tren-cho-sinh-vien', '<p><strong>1. Th&ocirc;ng tin li&ecirc;n lạc</strong></p>\r\n\r\n                <ul>\r\n                    <li><strong>T&ecirc;n:&nbsp;</strong>Điền đầy đủ họ t&ecirc;n thật của người b&aacute;n.</li>\r\n                    <li><strong>Email:&nbsp;</strong>H&atilde;y cung cấp địa chỉ email thật. Ch&uacute;ng t&ocirc;i li&ecirc;n lạc với bạn chủ yếu qua email. Email của bạn sẽ được Chợ Sinh Viên bảo mật.</li>\r\n                    <li><strong>Số điện thoại:&nbsp;</strong>Để đảm bảo an to&agrave;n mua b&aacute;n, bạn cần x&aacute;c nhận sở hữu của số điện thoại d&ugrave;ng để đăng tin.</li>\r\n                </ul>\r\n                \r\n                <p><strong>2. Ti&ecirc;u đề tin đăng</strong></p>\r\n                \r\n                <ul>\r\n                    <li>Ti&ecirc;u đề cần thể hiện chi tiết ch&iacute;nh của mặt h&agrave;ng hoặc dịch vụ được quảng c&aacute;o, bao gồm c&aacute;c th&ocirc;ng tin như:\r\n                    <ul>\r\n                        <li>T&ecirc;n sản phẩm, model, t&igrave;nh trạng &hellip;. (V&iacute; dụ: Iphone 5S 16gb c&ograve;n bảo h&agrave;nh &hellip;)</li>\r\n                        <li>Loại nh&agrave; đất, t&ecirc;n đường, số ph&ograve;ng ngủ&hellip; (đối với bất động sản). V&iacute; dụ: Nh&agrave; 3 lầu 6 ph&ograve;ng ngủ đường Nguyễn Tr&atilde;i &hellip;)</li>\r\n                    </ul>\r\n                    </li>\r\n                    <li>Tr&ecirc;n ti&ecirc;u đề tin, kh&ocirc;ng sử dụng c&aacute;c th&ocirc;ng tin/ từ ngữ sau:\r\n                    <ul>\r\n                        <li>C&aacute;c từ kho&aacute; :&nbsp;<em>cần mua/ mua, cần b&aacute;n/ b&aacute;n, tuyển/t&igrave;m, thanh l&yacute;,&nbsp;</em>&hellip;</li>\r\n                        <li>Gi&aacute;, website, t&ecirc;n hoặc th&ocirc;ng tin li&ecirc;n lạc của người b&aacute;n.</li>\r\n                        <li>C&aacute;c từ ngữ mi&ecirc;u tả nhằm thu h&uacute;t sự ch&uacute; &yacute; của người mua như:&nbsp;<em>si&ecirc;u rẻ, si&ecirc;u hot, rất đẹp, đẹp, khuyến m&atilde;i</em>,&nbsp;<em>gấp, giảm gi&aacute;</em>&nbsp;hoặc c&aacute;c từ ngữ kh&ocirc;ng được ph&eacute;p theo luật quảng c&aacute;o như :&nbsp;<em>nhất, tốt nhất, rẻ nhất, số 1, h&agrave;ng đầu</em>&nbsp;hoặc từ ngữ c&oacute; &yacute; nghĩa tương tự.</li>\r\n                    </ul>\r\n                    </li>\r\n                </ul>\r\n                \r\n                <p><strong>3. H&igrave;nh ảnh trong tin đăng</strong></p>\r\n                \r\n                <p>H&igrave;nh ảnh trong tin đăng phải l&agrave; h&igrave;nh chụp từ mặt h&agrave;ng, dịch vụ bạn đăng b&aacute;n, v&agrave; phải thể hiện r&otilde; &amp; ch&acirc;n thực mặt h&agrave;ng dịch vụ đ&oacute;.</p>\r\n                \r\n                <p><strong>H&igrave;nh ảnh kh&ocirc;ng được ph&eacute;p đăng tr&ecirc;n&nbsp;</strong><strong>Chợ Sinh Viên</strong>&nbsp;<strong>bao gồm:</strong></p>\r\n                \r\n                <ul>\r\n                    <li>H&igrave;nh tải từ Internet hoặc tải từ&nbsp;Chợ Sinh Vi&ecirc;n.</li>\r\n                    <li>H&igrave;nh đ&atilde; bị chỉnh sửa qu&aacute; nhiều hoặc bị tẩy x&oacute;a, kh&ocirc;ng cho thấy được t&igrave;nh trạng thật của sản phẩm.</li>\r\n                    <li>H&igrave;nh c&oacute; chứa đường link li&ecirc;n kết, chữ, số điện thoại, t&ecirc;n cửa h&agrave;ng/c&ocirc;ng ty.</li>\r\n                    <li>H&igrave;nh mờ, nghi&ecirc;ng, kh&ocirc;ng đ&uacute;ng chiều, h&igrave;nh được gh&eacute;p từ nhiều h&igrave;nh kh&aacute;c, c&oacute; c&aacute;c k&yacute; tự hoặc k&yacute; hiệu lạ nhằm thu h&uacute;t sự ch&uacute; &yacute; của người xem.</li>\r\n                    <li>H&igrave;nh c&oacute; logo c&ocirc;ng ty, ngoại trừ trong c&aacute;c chuy&ecirc;n mục &ldquo;Dịch Vụ&rdquo;, &ldquo;Việc L&agrave;m&rdquo; v&agrave; hoạt động mua b&aacute;n thương hiệu trong chuy&ecirc;n mục &ldquo;Cơ sở thương mại&rdquo;.</li>\r\n                    <li>H&igrave;nh người mẫu mặc đồ l&oacute;t, đồ bơi.</li>\r\n                    <li>H&igrave;nh bị lỗi kh&ocirc;ng hiển thị.</li>\r\n                </ul>\r\n                \r\n                <p><strong>4. Nội dung tin đăng</strong></p>\r\n                \r\n                <p>Nội dung tin đăng cần c&oacute; đầy đủ th&ocirc;ng tin để người mua c&oacute; thể quyết định mua h&agrave;ng. Cụ thể như sau:</p>\r\n                \r\n                <ul>\r\n                    <li><em>Bất động sản</em>: Mi&ecirc;u tả chi tiết vị tr&iacute;, số ph&ograve;ng, diện t&iacute;ch, t&ecirc;n dự &aacute;n, căn hộ, t&ecirc;n đường, t&igrave;nh trạng sở hữu, &hellip;</li>\r\n                    <li><em>Xe cộ</em>: Mi&ecirc;u tả t&ecirc;n xe, h&atilde;ng xe, xuất xứ, m&agrave;u sắc, t&igrave;nh trạng sử dụng, số km đ&atilde; đi, năm đăng k&iacute;, hộp số, loại nhi&ecirc;n liệu, giấy tờ xe, &hellip;</li>\r\n                    <li><em>C&aacute;c sản phẩm kh&aacute;c</em>: T&ecirc;n sản phẩm, h&atilde;ng, xuất xứ, m&agrave;u sắc, chất liệu, t&igrave;nh trạng sử dụng, phụ kiện đi k&egrave;m, gi&aacute; tiền, t&igrave;nh trạng bảo h&agrave;nh, &hellip;</li>\r\n                </ul>\r\n                \r\n                <p>Số điện thoại, c&aacute;c đường dẫn kết nối đến trang kh&aacute;c, email c&oacute; chứa t&ecirc;n miền website kh&aacute;c kh&ocirc;ng được ph&eacute;p mi&ecirc;u tả ở nội dung.</p>\r\n                \r\n                <p>Nếu c&oacute; nhiều hơn một sản phẩm/dịch vụ, vui l&ograve;ng đăng tin ri&ecirc;ng biệt cho từng sản phẩm/dịch vụ.</p>\r\n                \r\n                <p>Chợ Sinh Viên chỉ đăng những tin mua b&aacute;n 1 sản phẩm hoặc dịch vụ cụ thể. Tin rao chỉ nhằm mục đ&iacute;ch quảng c&aacute;o về c&ocirc;ng ty sẽ kh&ocirc;ng được đăng. C&aacute;c tin rao kh&ocirc;ng nhằm mục đ&iacute;ch mua b&aacute;n kh&ocirc;ng được đăng.</p>\r\n                \r\n                <p>C&aacute;c tin đăng c&oacute; nội dung, h&igrave;nh ảnh mang t&iacute;nh x&uacute;c phạm li&ecirc;n quan đến t&ocirc;n gi&aacute;o, c&aacute;c nh&oacute;m sắc tộc, c&aacute; nh&acirc;n hoặc người nổi tiếng bị cấm.</p>\r\n                \r\n                <p>Theo điều 8 mục 11 của Luật Quảng c&aacute;o, kh&ocirc;ng được sử dụng c&aacute;c từ ngữ&nbsp;<em>&ldquo;nhất&rdquo;, &ldquo;duy nhất&rdquo;, &ldquo;tốt nhất&rdquo;, &ldquo;số một&rdquo;</em>&nbsp;hoặc từ ngữ c&oacute; &yacute; nghĩa tương tự trong nội dung tin đăng (nếu sử dụng phải c&oacute; t&agrave;i liệu chứng minh).</p>\r\n                \r\n                <p><strong>5. Gi&aacute;</strong></p>\r\n                \r\n                <p><strong>Chợ Sinh Vi&ecirc;n&nbsp;</strong>c&oacute; quyền từ chối c&aacute;c sản phẩm c&oacute; gi&aacute; b&aacute;n kh&ocirc;ng hợp l&yacute;.&nbsp;Gi&aacute; b&aacute;n phải được ni&ecirc;m yết bằng gi&aacute; Việt Nam Đồng. C&aacute;c tin đăng gi&aacute; ngoại tệ đều kh&ocirc;ng được đăng.</p>\r\n                \r\n                <p>Nếu sản phẩm/dịch vụ của bạn l&agrave; sản phẩm ch&iacute;nh h&atilde;ng nhưng rao b&aacute;n với gi&aacute; thấp hơn sản phẩm/dịch vụ tương tự tr&ecirc;n thị trường,&nbsp;vui l&ograve;ng sửa lại tin theo hướng dẫn sau:</p>\r\n                \r\n                <p>1. Th&ecirc;m h&igrave;nh để chứng thực sản phẩm h&agrave;ng ch&iacute;nh h&atilde;ng.<br />\r\n                2. Hoặc mi&ecirc;u tả chi tiết hơn về t&igrave;nh trạng sản phẩm:</p>\r\n                \r\n                <ul>\r\n                    <li>Thời gian sử dụng</li>\r\n                    <li>T&igrave;nh trạng sản phẩm</li>\r\n                    <li>Gi&aacute; tiền l&uacute;c bạn mua</li>\r\n                    <li>L&yacute; do bạn b&aacute;n rẻ hơn gi&aacute; thị trường.</li>\r\n                </ul>\r\n                \r\n                <p>Quy định về gi&aacute; được đặt ra nhằm bảo đảm an to&agrave;n v&agrave; hiệu quả cho cả người mua v&agrave; người b&aacute;n.</p>\r\n                \r\n                <p><strong>6. Ng&ocirc;n ngữ</strong></p>\r\n                \r\n                <p><strong>Chợ Sinh Vi&ecirc;n&nbsp;</strong>chỉ sử dụng hai ng&ocirc;n ngữ l&agrave; tiếng Anh v&agrave; tiếng Việt c&oacute; dấu.</p>\r\n                \r\n                <p>C&aacute;c tin viết bằng ng&ocirc;n ngữ kh&aacute;c, hoặc viết bằng tiếng Việt kh&ocirc;ng dấu, hoặc viết bằng tiếng Việt nhưng nội dung kh&oacute; hiểu (k&yacute; hiệu lạ, ph&ocirc;ng chữ lạ) cũng kh&ocirc;ng được ph&eacute;p đăng.</p>\r\n                \r\n                <p>Nếu vi phạm c&aacute;c quy định tr&ecirc;n, tin đăng của bạn c&oacute; thể bị từ chối. Bạn n&ecirc;n tham khảo&nbsp;<strong>C&aacute;c l&yacute; do tin bị từ chối</strong>&nbsp;ở mục C b&ecirc;n dưới.</p>', 1, NULL, NULL),
(2, 'Quy định về Hàng hoá/Dịch vụ trên website Chợ Sinh Viên', 'quy-dinh-ve-hang-hoadich-vu-tren-website-cho-sinh-vien', '<h3><strong>A. H&agrave;ng h&oacute;a v&agrave; dịch vụ bị cấm theo ph&aacute;p luật Việt Nam</strong></h3>\r\n\r\n                <ul>\r\n                    <li><strong>&nbsp;H&agrave;ng h&oacute;a bất hợp ph&aacute;p:&nbsp;</strong>C&aacute;c h&agrave;ng h&oacute;a bị cấm bu&ocirc;n b&aacute;n theo luật ph&aacute;p Việt Nam, bao gồm:\r\n                \r\n                    <ul>\r\n                        <li>Ma t&uacute;y.</li>\r\n                        <li>H&agrave;ng h&oacute;a c&oacute; chứa h&igrave;nh ảnh li&ecirc;n quan đến cần sa, hoa anh t&uacute;c.</li>\r\n                        <li>Vũ kh&iacute; v&agrave; c&aacute;c sản phẩm thuộc lĩnh vực qu&acirc;n sự, an ninh quốc ph&ograve;ng kh&aacute;c, bao gồm nhưng kh&ocirc;ng giới hạn bởi qu&acirc;n trang, qu&acirc;n hiệu, ph&ugrave; hiệu, thiết bị qu&acirc;n sự, cấp hiệu.</li>\r\n                        <li>Bộ phận cơ thể người.</li>\r\n                        <li>Thực vật, Động vật nguy cấp, qu&yacute; hiếm.</li>\r\n                        <li>Sản phẩm khi&ecirc;u d&acirc;m.</li>\r\n                        <li>Ph&aacute;o hoa v&agrave; chất nổ.</li>\r\n                        <li>Số xe v&agrave; giấy tờ xe.</li>\r\n                        <li>B&igrave;nh sữa, n&uacute;m v&uacute; b&igrave;nh sữa&nbsp;(Ngoại trừ sản phẩm cho mẹ v&agrave; b&eacute; chưa sử dụng: miếng thấm h&uacute;t sữa, t&uacute;i trữ sữa,&hellip; hoặc sản phẩm cho b&eacute;: m&aacute;y h&acirc;m sữa, m&aacute;y vắt sữa &hellip;)</li>\r\n                    </ul>\r\n                    </li>\r\n                    <li><strong>H&agrave;ng giả, h&agrave;ng nhập lậu, h&agrave;ng vi phạm bản quyền:&nbsp;</strong>Tất cả c&aacute;c sản phẩm sau đ&acirc;y khi đăng tin tr&ecirc;n&nbsp;<strong>Chợ Sinh Viên&nbsp;</strong>phải được chứng thực l&agrave; h&agrave;ng ch&iacute;nh h&atilde;ng:\r\n                    <ul>\r\n                        <li>Sản phẩm c&oacute; thương hiệu.</li>\r\n                        <li>CD/VCD/DVD.</li>\r\n                        <li>Chương tr&igrave;nh m&aacute;y vi t&iacute;nh/ m&aacute;y chơi tr&ograve; chơi.</li>\r\n                    </ul>\r\n                    </li>\r\n                </ul>\r\n                \r\n                <h3><strong>B. H&agrave;ng h&oacute;a v&agrave; dịch vụ bị cấm theo&nbsp;quy định của Chợ Sinh Vi&ecirc;n</strong></h3>\r\n                \r\n                <ul>\r\n                    <li><strong>C&aacute;c sản phẩm trong ng&agrave;nh y tế</strong>:\r\n                \r\n                    <ul>\r\n                        <li>C&aacute;c sản phẩm y tế, bao gồm cả m&aacute;y m&oacute;c y tế.</li>\r\n                        <li>Thuốc v&agrave; thuốc bổ cho người lớn/ trẻ em v&agrave; vật nu&ocirc;i.</li>\r\n                        <li>Dược phẩm, thảo dược&nbsp;(Ngoại trừ tinh dầu).</li>\r\n                        <li>Y học cổ truyền Ấn Độ.</li>\r\n                        <li>Thuốc theo đơn.</li>\r\n                    </ul>\r\n                    </li>\r\n                    <li><strong>C&aacute;c mặt h&agrave;ng dễ g&acirc;y dị ứng, c&oacute; thể ảnh hưởng đến sức khoẻ của người d&ugrave;ng:</strong>\r\n                    <ul>\r\n                        <li>Quần &aacute;o l&oacute;t đ&atilde; qua sử dụng.</li>\r\n                        <li>K&iacute;nh &aacute;p tr&ograve;ng, k&iacute;nh cận.</li>\r\n                        <li>Sữa d&ugrave;ng cho trẻ em dưới 24 th&aacute;ng tuổi, sản phẩm dinh dưỡng d&agrave;nh cho trẻ dưới 6 th&aacute;ng tuổi (Ngoại Trừ Sữa chưa sử dụng, dạng lỏng như sữa hộp, sữa tươi).</li>\r\n                        <li>Bia, cồn, rượu, thuốc l&aacute;, c&aacute;c chất k&iacute;ch th&iacute;ch, g&acirc;y nghiện kh&aacute;c.</li>\r\n                        <li>Mỹ phẩm dạng uống, ti&ecirc;m&nbsp;(Ngoại trừ Mỹ Phẩm chưa sử dụng dạng d&ugrave;ng ngo&agrave;i da, c&oacute; t&aacute;c dụng l&agrave;m sạch, l&agrave;m thơm, dưỡng, trang điểm).</li>\r\n                    </ul>\r\n                    </li>\r\n                    <li><strong>C&aacute;c sản phẩm c&oacute; nội dung người lớn:</strong>&nbsp;Đồ chơi t&igrave;nh dục, sản phẩm khi&ecirc;u d&acirc;m.</li>\r\n                    <li><strong>Sản phẩm được bảo vệ bởi luật sở hữu tr&iacute; tuệ:</strong>\r\n                    <ul>\r\n                        <li>Bản ghi Radio, bản thu TV v&agrave; bản thu từ Internet.</li>\r\n                        <li>S&aacute;ch điện tử.</li>\r\n                        <li>Địa chỉ email.</li>\r\n                    </ul>\r\n                    </li>\r\n                    <li><strong>C&aacute;c tin đăng kh&ocirc;ng nhằm mục đ&iacute;ch mua b&aacute;n h&agrave;ng ho&aacute;, dịch vụ:</strong>\r\n                    <ul>\r\n                        <li>Sự kiện hội họp.</li>\r\n                        <li>C&aacute;c t&agrave;i liệu tuy&ecirc;n truyền.</li>\r\n                        <li>Thư/ Lời ch&uacute;c mừng/ Th&ocirc;ng b&aacute;o.</li>\r\n                    </ul>\r\n                    </li>\r\n                    <li><strong>C&aacute;c sản phẩm m&ecirc; t&iacute;n:</strong>&nbsp;B&ugrave;a hộ mạng hoặc mi&ecirc;u tả m&ecirc; t&iacute;n (đuổi t&agrave;, đuổi quỷ &hellip;) v&agrave; tất cả c&aacute;c vật thần b&iacute;.</li>\r\n                    <li><strong>C&aacute;c sản phẩm phục vụ cho mục đ&iacute;ch cờ bạc</strong>&nbsp;(bao gồm cả m&aacute;y đ&aacute;nh b&agrave;i).</li>\r\n                    <li><strong>C&aacute;c sản phẩm thuộc về di t&iacute;ch lịch sử.</strong></li>\r\n                    <li><strong>Ho&aacute; chất:</strong>&nbsp;bao gồm nhưng kh&ocirc;ng giới hạn bởi a-x&iacute;t, chất ho&aacute; học n&ocirc;ng nghiệp, chất ph&oacute;ng xạ, sản phẩm ho&aacute; học diệt c&ocirc;n tr&ugrave;ng.</li>\r\n                    <li><strong>C&aacute;c sản phẩm c&oacute; chứa a-mi-ăng.</strong></li>\r\n                    <li><strong>C&aacute;c mặt h&agrave;ng kh&aacute;c:</strong>\r\n                    <ul>\r\n                        <li>Số điện thoại di động v&agrave; thẻ Sim.</li>\r\n                        <li>B&igrave;nh h&uacute;t shisa, cần sa, hoa anh t&uacute;c (bao gồm sản phẩm c&oacute; h&igrave;nh cần sa v&agrave; hoa anh t&uacute;c).</li>\r\n                        <li>V&agrave;ng thỏi, v&agrave;ng miếng (Ngoại trừ V&agrave;ng trang sức).</li>\r\n                        <li>C&aacute;c sản phẩm li&ecirc;n quan đến &ldquo;Bản đồ&rdquo; bao gồm sản phẩm bản đồ (bản đồ thế giới, bản đồ địa phương, &hellip;), quả địa cầu, đồ chơi li&ecirc;n quan đến bản đồ, sản phẩm c&oacute; h&igrave;nh ảnh hoặc mi&ecirc;u tả về bản đồ (đặc biệt l&agrave; về &ldquo;đường lưỡi b&ograve;&rdquo;).</li>\r\n                    </ul>\r\n                    </li>\r\n                    <li><strong>Mặt h&agrave;ng đ&atilde; hết hạn sử dụng tại thời điểm đăng tin.</strong></li>\r\n                </ul>\r\n                \r\n                <ul>\r\n                    <li><strong>Dịch vụ bị cấm theo quy định của Chợ Sinh Vi&ecirc;n:</strong>\r\n                \r\n                    <ul>\r\n                        <li>Cho vay v&agrave; t&aacute;i cấp vốn.</li>\r\n                        <li>Dịch vụ li&ecirc;n quan m&ecirc; t&iacute;n, yểm b&ugrave;a.</li>\r\n                        <li>Dịch vụ mai mối v&agrave; hẹn h&ograve;.</li>\r\n                        <li>C&aacute;c phương ph&aacute;p trị liệu.</li>\r\n                        <li>Kế hoạch l&agrave;m gi&agrave;u nhanh ch&oacute;ng, tiếp thị đơn cấp v&agrave; tiếp thị đa cấp.</li>\r\n                        <li>Dịch vụ đi chung xe.</li>\r\n                        <li>Dịch vụ bẻ kh&oacute;a, c&agrave;i c&aacute;c ứng dụng lậu cho c&aacute;c thiết bị.</li>\r\n                        <li>Bảo hiểm v&agrave; c&aacute;c chương tr&igrave;nh bảo hiểm y tế.</li>\r\n                        <li>Chăm s&oacute;c v&agrave; gi&aacute;m s&aacute;t trẻ em.</li>\r\n                        <li>Dịch vụ nhắn tin SMS.</li>\r\n                        <li>L&agrave;m người mẫu.</li>\r\n                        <li>Dịch vụ xăm h&igrave;nh.</li>\r\n                        <li>Dịch vụ l&agrave;m hoặc b&aacute;n chứng chỉ/bằng cấp.</li>\r\n                        <li>M&aacute;t-xa v&agrave; chăm s&oacute;c tại Spa (bao gồm cả phiếu Vouchers của c&aacute;c dịch vụ tr&ecirc;n).</li>\r\n                        <li>Dịch vụ th&aacute;m tử, theo d&otilde;i hoặc c&aacute;c dịch vụ kh&aacute;c vi phạm Quyền b&iacute; mật đời tư được quy định tại Điều 38 Bộ luật D&acirc;n sự 2005.</li>\r\n                    </ul>\r\n                    </li>\r\n                </ul>\r\n                \r\n                <ul>\r\n                    <li><strong>V&agrave; c&aacute;c mặt h&agrave;ng/ dịch vụ kh&aacute;c được quy định tại c&aacute;c thời điểm.</strong></li>\r\n                </ul>', 1, NULL, NULL),
(3, 'Mẹo cho người MUA', 'meo-cho-nguoi-mua', '<h3>Nguy&ecirc;n tắc &ldquo;v&agrave;ng&rdquo;:</h3>\r\n\r\n                <ul>\r\n                    <li><strong>Kh&ocirc;ng n&ecirc;n chuyển tiền trước khi nhận h&agrave;ng</strong>, đặc biệt đối với những h&agrave;ng ho&aacute; đắt tiền như: đồ điện tử, xe cộ, th&uacute; cưng.</li>\r\n                    <li><strong>Gặp nhau trực tiếp để mua b&aacute;n. Kiểm tra kỹ h&agrave;ng mới trả tiền.</strong></li>\r\n                    <li><strong>Lu&ocirc;n đi c&ugrave;ng 1 người bạn.</strong></li>\r\n                    <li>Giao dịch trực tiếp ở nơi quen thuộc như địa điểm gần nh&agrave;, c&ocirc;ng ty hoặc c&aacute;c trung t&acirc;m bảo h&agrave;nh c&oacute; thể kiểm tra được sản phẩm.</li>\r\n                    <li>Thận trọng đối với sản phẩm h&agrave;ng hiệu, đắt tiền nhưng c&oacute; gi&aacute; thấp đ&aacute;ng ngờ.</li>\r\n                    <li>Y&ecirc;u cầu giấy tờ để chứng minh sở hữu mặt h&agrave;ng hoặc giấy tờ cho việc giao dịch giữa bạn v&agrave; người b&aacute;n, đặc biệt c&aacute;c mặt h&agrave;ng c&oacute; gi&aacute; trị cao.<strong>&nbsp;</strong></li>\r\n                    <li>Kiểm tra kỹ c&aacute;c giấy tờ sản phẩm khi giao dịch, đặc biệt đối với những mặt h&agrave;ng như:\r\n                    <ul>\r\n                        <li>Xe m&aacute;y: C&agrave;-vẹt xe, bảo hiểm xe (nếu c&oacute;), bi&ecirc;n lai mua xe, giấy bảo h&agrave;nh xe cũng như giấy tờ t&ugrave;y th&acirc;n của người giao dịch với bạn: Chứng minh nh&acirc;n d&acirc;n, bằng l&aacute;i xe.</li>\r\n                        <li>Nh&agrave; đất: Giấy tờ ph&aacute;p l&yacute; (Giấy chứng nhận quyền sử dụng đất, quyền sở hữu nh&agrave; ở v&agrave; t&agrave;i sản).</li>\r\n                    </ul>\r\n                    </li>\r\n                    <li>Bảo quản t&agrave;i sản c&aacute; nh&acirc;n của bạn cẩn thận khi tham gia giao dịch.</li>\r\n                    <li>Đối với một số&nbsp;sản phẩm đặc th&ugrave; (gia cầm sống, động vật sống,&nbsp;sản phẩm ch&iacute;nh h&atilde;ng, thực phẩm, &hellip;), người mua cần y&ecirc;u cầu người b&aacute;n cung cấp c&aacute;c giấy tờ chứng minh nguồn gốc, chất lượng sản phẩm hoặc c&aacute;c giấy tờ kh&aacute;c theo quy định của Nh&agrave; nước nhằm&nbsp;đảm bảo quyền lợi v&agrave; sức khỏe của bản th&acirc;n.</li>\r\n                </ul>\r\n                \r\n                <h3>Những trường hợp gian lận cần cảnh gi&aacute;c</h3>\r\n                \r\n                <ul>\r\n                    <li><strong>Người mua đ&atilde; thanh to&aacute;n (chuyển khoản qua ng&acirc;n h&agrave;ng, chuyển qua bưu điện) nhưng kh&ocirc;ng nhận được h&agrave;ng do người b&aacute;n kh&ocirc;ng giao h&agrave;ng.</strong></li>\r\n                    <li>Tr&aacute;o điện thoại, m&aacute;y t&iacute;nh bảng, đồ điện tử kh&aacute;c: Người b&aacute;n mua h&agrave;ng sản phẩm ch&iacute;nh h&atilde;ng v&agrave; khi kiểm tra h&agrave;ng th&igrave; l&agrave; ch&iacute;nh h&atilde;ng, nhưng sau khi người mua trả tiền, người b&aacute;n nhanh tay tr&aacute;o bằng h&agrave;ng giả.</li>\r\n                </ul>', 2, NULL, NULL),
(4, 'Mẹo cho người BÁN', 'meo-cho-nguoi-ban', '<h3>Nguy&ecirc;n tắc &ldquo;v&agrave;ng&rdquo;:</h3>\r\n\r\n                <ul>\r\n                    <li><strong>Gặp nhau trực tiếp để mua b&aacute;n.</strong></li>\r\n                    <li><strong>Lu&ocirc;n đi c&ugrave;ng 1 người bạn.</strong></li>\r\n                    <li>Để tr&aacute;nh trường hợp ph&aacute;t sinh m&acirc;u thuẫn sau khi b&aacute;n, n&ecirc;n trao đổi chi tiết c&aacute;c điều khoản khi giao dịch v&agrave; y&ecirc;u cầu người mua kiểm tra h&agrave;ng h&oacute;a cẩn thận trong qu&aacute; tr&igrave;nh giao dịch.</li>\r\n                    <li>N&ecirc;n thận trọng đối với những giao dịch quốc tế hoặc y&ecirc;u cầu chuyển h&agrave;ng/chuyển tiền ra nước ngo&agrave;i.</li>\r\n                    <li>Chợ Sinh Viên&nbsp;<strong>KH&Ocirc;NG NHẬN</strong>&nbsp;k&yacute; gửi, b&aacute;n h&agrave;ng cho người d&ugrave;ng.</li>\r\n                    <li>Thận trọng nếu c&oacute; ai li&ecirc;n hệ với bạn để thu ph&iacute; dưới danh nghĩa Chợ Sinh Viên. H&atilde;y li&ecirc;n lạc ngay với ch&uacute;ng t&ocirc;i để được hỗ trợ kịp thời.</li>\r\n                    <li>Bảo quản h&agrave;ng ho&aacute; v&agrave; t&agrave;i sản c&aacute; nh&acirc;n của bạn cẩn thận khi tham gia giao dịch.</li>\r\n                    <li>Kh&ocirc;ng giao h&agrave;ng h&oacute;a khi chưa c&oacute; g&igrave; đảm bảo như giấy tờ t&ugrave;y th&acirc;n hoặc tiền đặt cọc.</li>\r\n                </ul>\r\n                \r\n                <h3>Những trường hợp gian lận cần cảnh gi&aacute;c</h3>\r\n                \r\n                <ul>\r\n                    <li>Người mua l&agrave;m giả giấy chuyển khoản, khiến người b&aacute;n giao h&agrave;ng nhưng kh&ocirc;ng nhận được tiền.</li>\r\n                    <li>Người mua phương tiện di chuyển (xe đạp, xe m&aacute;y, &hellip;) xin được d&ugrave;ng thử v&agrave; kh&ocirc;ng trả lại cho người b&aacute;n sau khi d&ugrave;ng.</li>\r\n                </ul>', 2, NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `rules_categories`
--

CREATE TABLE `rules_categories` (
  `id` int(10) UNSIGNED NOT NULL,
  `title` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `alias` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `rules_categories`
--

INSERT INTO `rules_categories` (`id`, `title`, `alias`, `created_at`, `updated_at`) VALUES
(1, 'Quy định cần biết', 'quy-dinh-can-biet', NULL, NULL),
(2, 'An toàn mua bán', 'an-toan-mua-ban', NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `schools`
--

CREATE TABLE `schools` (
  `id` int(10) UNSIGNED NOT NULL,
  `name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `alias` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `address` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `image` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `meta_keyword` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `meta_description` text COLLATE utf8mb4_unicode_ci,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `schools`
--

INSERT INTO `schools` (`id`, `name`, `alias`, `address`, `image`, `meta_keyword`, `meta_description`, `created_at`, `updated_at`) VALUES
(1, 'Đại học HUTECH cơ sở Điện Biên Phủ', 'dai-hoc-hutech-co-so-dien-bien-phu', '475 A Điện Biên Phủ, Phường 25, Bình Thạnh, Hồ Chí Minh', '/files/1/School/Hutech.png', 'Đại học HUTECH cơ sở Điện Biên Phủ', 'Đại học HUTECH cơ sở Điện Biên Phủ', NULL, NULL),
(2, 'Đại học HUTECH cơ sở Ung Văn Khiêm', 'dai-hoc-hutech-co-so-ung-van-khiem', '31/36 Ung Văn Khiêm, Phường 25, Bình Thạnh, Hồ Chí Minh', '/files/1/School/Hutech.png', 'Đại học HUTECH cơ sở Ung Văn Khiêm', 'Đại học HUTECH cơ sở Ung Văn Khiêm', NULL, NULL),
(3, 'Trung Tâm Đào Tạo Nhân Lực Chất Lượng Cao - HUTECH', 'trung-tam-dao-tao-nhan-luc-chat-luong-cao-hutech', 'Phường Tân Phú, Quận 9, Hồ Chí Minh', '/files/1/School/Hutech.png', 'Trung Tâm Đào Tạo Nhân Lực Chất Lượng Cao - HUTECH', 'Trung Tâm Đào Tạo Nhân Lực Chất Lượng Cao - HUTECH', NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `slides`
--

CREATE TABLE `slides` (
  `id` int(10) UNSIGNED NOT NULL,
  `name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `description` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `image` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `url` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `display_order` int(11) NOT NULL,
  `status` tinyint(1) NOT NULL DEFAULT '0',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `slides`
--

INSERT INTO `slides` (`id`, `name`, `description`, `image`, `url`, `display_order`, `status`, `created_at`, `updated_at`) VALUES
(1, 'Chợ Sinh Viên', 'Nơi trao đổi sản phẩm handmade của sinh viên các trường', '/files/1/Slide/foodwallpaper.jpg', 'danh-muc', 1, 1, NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(10) UNSIGNED NOT NULL,
  `name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `avatar` varchar(500) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'avatar.jpg',
  `phone` varchar(20) COLLATE utf8mb4_unicode_ci NOT NULL,
  `status` tinyint(1) NOT NULL DEFAULT '1',
  `id_school` int(10) UNSIGNED DEFAULT NULL,
  `facebook` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `instagram` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `about` text COLLATE utf8mb4_unicode_ci,
  `activation_code` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `password` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `name`, `email`, `avatar`, `phone`, `status`, `id_school`, `facebook`, `instagram`, `about`, `activation_code`, `password`, `remember_token`, `created_at`, `updated_at`) VALUES
(1, 'Nguyễn Minh Quân', 'minhquan.k0r1@gmail.com', '/files/1/Avatar/admin.jpg', '0938801071', 1, 1, 'https://www.facebook.com/Quan.K0r1', 'https://www.facebook.com/Quan.K0r1', 'Hello, World !', NULL, '$2y$10$ngdmOfuw2tAr5MVjaIqV7ujypCj4dmcsLMBjD5bBdQt4oFj2VRKvq', 'rOGWzW45XqhHhwdBovJ2Z2BK7N15ukOI4jDls8HCwqyXKj9wcrGVMVEgdn3H', NULL, NULL),
(2, 'Nguyễn Hoàng Phong', 'hpnguyen545@gmail.com', 'images/avatars/hpnguyen545@gmail.com/1543460544.jpg', '962087540', 1, 3, 'https://www.facebook.com/lang.tram.161', 'https://www.facebook.com/lang.tram.161', 'Ha ha', NULL, '$2y$10$U71dmqBvUyR7gZV3Mo/9du/dLG7fFFx/vmhaGntOtKOhBCgwsZKEy', 'VBmQDt6V4txXIpsF6sTd4UiZsPyN3o1ZFpogAFrPq0yBORNQCpp3zIK6kiwO', '2018-11-29 02:43:47', '2018-11-29 03:02:24');

-- --------------------------------------------------------

--
-- Table structure for table `visitor_statistics`
--

CREATE TABLE `visitor_statistics` (
  `id` int(10) UNSIGNED NOT NULL,
  `visted_date` date NOT NULL,
  `ip_address` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admins`
--
ALTER TABLE `admins`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `admins_email_unique` (`email`),
  ADD KEY `admins_role_id_foreign` (`role_id`);

--
-- Indexes for table `banners`
--
ALTER TABLE `banners`
  ADD PRIMARY KEY (`id`);

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
-- Indexes for table `migrations`
--
ALTER TABLE `migrations`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `pages`
--
ALTER TABLE `pages`
  ADD PRIMARY KEY (`id`);

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
  ADD KEY `permissions_id_category_foreign` (`id_category`);

--
-- Indexes for table `permission_categories`
--
ALTER TABLE `permission_categories`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `products`
--
ALTER TABLE `products`
  ADD PRIMARY KEY (`id`),
  ADD KEY `products_id_category_foreign` (`id_category`),
  ADD KEY `products_id_user_foreign` (`id_user`);

--
-- Indexes for table `roles`
--
ALTER TABLE `roles`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `role_permissions`
--
ALTER TABLE `role_permissions`
  ADD PRIMARY KEY (`role_id`,`permission_id`),
  ADD KEY `role_permissions_permission_id_foreign` (`permission_id`);

--
-- Indexes for table `rules`
--
ALTER TABLE `rules`
  ADD PRIMARY KEY (`id`),
  ADD KEY `rules_id_category_foreign` (`id_category`);

--
-- Indexes for table `rules_categories`
--
ALTER TABLE `rules_categories`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `schools`
--
ALTER TABLE `schools`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `slides`
--
ALTER TABLE `slides`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `users_email_unique` (`email`),
  ADD KEY `users_id_school_foreign` (`id_school`);

--
-- Indexes for table `visitor_statistics`
--
ALTER TABLE `visitor_statistics`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `admins`
--
ALTER TABLE `admins`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `banners`
--
ALTER TABLE `banners`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `categories`
--
ALTER TABLE `categories`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `contacts`
--
ALTER TABLE `contacts`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=98;

--
-- AUTO_INCREMENT for table `pages`
--
ALTER TABLE `pages`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `permissions`
--
ALTER TABLE `permissions`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;

--
-- AUTO_INCREMENT for table `permission_categories`
--
ALTER TABLE `permission_categories`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `products`
--
ALTER TABLE `products`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `roles`
--
ALTER TABLE `roles`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `rules`
--
ALTER TABLE `rules`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `rules_categories`
--
ALTER TABLE `rules_categories`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `schools`
--
ALTER TABLE `schools`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `slides`
--
ALTER TABLE `slides`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `visitor_statistics`
--
ALTER TABLE `visitor_statistics`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `admins`
--
ALTER TABLE `admins`
  ADD CONSTRAINT `admins_role_id_foreign` FOREIGN KEY (`role_id`) REFERENCES `roles` (`id`) ON DELETE SET NULL;

--
-- Constraints for table `permissions`
--
ALTER TABLE `permissions`
  ADD CONSTRAINT `permissions_id_category_foreign` FOREIGN KEY (`id_category`) REFERENCES `permission_categories` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `products`
--
ALTER TABLE `products`
  ADD CONSTRAINT `products_id_category_foreign` FOREIGN KEY (`id_category`) REFERENCES `categories` (`id`) ON DELETE SET NULL,
  ADD CONSTRAINT `products_id_user_foreign` FOREIGN KEY (`id_user`) REFERENCES `users` (`id`);

--
-- Constraints for table `role_permissions`
--
ALTER TABLE `role_permissions`
  ADD CONSTRAINT `role_permissions_permission_id_foreign` FOREIGN KEY (`permission_id`) REFERENCES `permissions` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `role_permissions_role_id_foreign` FOREIGN KEY (`role_id`) REFERENCES `roles` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `rules`
--
ALTER TABLE `rules`
  ADD CONSTRAINT `rules_id_category_foreign` FOREIGN KEY (`id_category`) REFERENCES `rules_categories` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `users`
--
ALTER TABLE `users`
  ADD CONSTRAINT `users_id_school_foreign` FOREIGN KEY (`id_school`) REFERENCES `schools` (`id`) ON DELETE SET NULL;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
