-- phpMyAdmin SQL Dump
-- version 4.0.4.1
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: Oct 27, 2015 at 09:23 AM
-- Server version: 5.5.32
-- PHP Version: 5.4.19

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `samplewebsite01_db`
--
CREATE DATABASE IF NOT EXISTS `samplewebsite01_db` DEFAULT CHARACTER SET latin1 COLLATE latin1_swedish_ci;
USE `samplewebsite01_db`;

-- --------------------------------------------------------

--
-- Table structure for table `vii_admin`
--

CREATE TABLE IF NOT EXISTS `vii_admin` (
  `id_admin` int(11) NOT NULL AUTO_INCREMENT,
  `id_admin_group` int(11) NOT NULL,
  `username` varchar(32) NOT NULL,
  `password` varchar(32) NOT NULL,
  `email_address` varchar(128) NOT NULL,
  `firstname` varchar(32) NOT NULL,
  `lastname` varchar(32) NOT NULL,
  `age` varchar(10) DEFAULT NULL,
  `occupation` varchar(100) DEFAULT NULL,
  `image` varchar(500) DEFAULT NULL,
  `isActive` tinyint(4) NOT NULL DEFAULT '1',
  `date_add` datetime NOT NULL,
  `date_upd` datetime NOT NULL,
  PRIMARY KEY (`id_admin`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=58 ;

--
-- Dumping data for table `vii_admin`
--

INSERT INTO `vii_admin` (`id_admin`, `id_admin_group`, `username`, `password`, `email_address`, `firstname`, `lastname`, `age`, `occupation`, `image`, `isActive`, `date_add`, `date_upd`) VALUES
(1, 1, 'admin', '098f6bcd4621d373cade4e832627b4f6', 'info@viiworks.com', 'Admin', 'Viiworks', NULL, NULL, NULL, 1, '2013-10-21 08:43:42', '2014-02-13 05:06:45'),
(56, 9, 'webadmin', '33dfa77a638de63d9655f8854a805703', '', 'Web Admin', 'User', NULL, NULL, NULL, 1, '2015-06-17 09:21:29', '2015-06-17 09:38:30'),
(57, 10, 'staffuser', '33dfa77a638de63d9655f8854a805703', '', 'Staff', 'User', NULL, NULL, NULL, 1, '2015-06-17 09:21:52', '2015-06-17 09:54:05');

-- --------------------------------------------------------

--
-- Table structure for table `vii_admin_group`
--

CREATE TABLE IF NOT EXISTS `vii_admin_group` (
  `id_admin_group` int(11) NOT NULL AUTO_INCREMENT,
  `group_name` varchar(64) NOT NULL,
  `group_description` text NOT NULL,
  `date_add` datetime NOT NULL,
  `date_upd` datetime NOT NULL,
  PRIMARY KEY (`id_admin_group`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=11 ;

--
-- Dumping data for table `vii_admin_group`
--

INSERT INTO `vii_admin_group` (`id_admin_group`, `group_name`, `group_description`, `date_add`, `date_upd`) VALUES
(1, 'Administrator', 'Admin Group Description', '2011-03-15 10:39:34', '2011-03-15 10:39:34'),
(9, 'Website Admin Manager', 'Website Admin Manager', '2015-06-17 09:19:53', '2015-06-17 09:32:58'),
(10, 'Staff Group', 'Staff Group', '2015-06-17 09:20:34', '2015-06-17 09:20:34');

-- --------------------------------------------------------

--
-- Table structure for table `vii_admin_log`
--

CREATE TABLE IF NOT EXISTS `vii_admin_log` (
  `id_admin_log` int(11) NOT NULL AUTO_INCREMENT,
  `ip_address` varchar(255) NOT NULL,
  `id_admin` int(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  `date_add` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  PRIMARY KEY (`id_admin_log`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=15 ;

--
-- Dumping data for table `vii_admin_log`
--

INSERT INTO `vii_admin_log` (`id_admin_log`, `ip_address`, `id_admin`, `name`, `date_add`) VALUES
(2, '10.10.1.12', 1, 'Admin Viiworks', '2015-08-24 03:01:36'),
(3, '10.10.1.2', 1, 'Admin Viiworks', '2015-08-24 03:26:57'),
(4, '10.10.1.12', 56, 'Web Admin User', '2015-08-24 03:41:17'),
(5, '10.10.1.12', 1, 'Admin Viiworks', '2015-08-26 02:28:53'),
(6, '10.10.1.12', 56, 'Web Admin User', '2015-08-27 05:06:52'),
(7, '10.10.1.5', 1, 'Admin Viiworks', '2015-08-28 03:01:33'),
(8, '10.10.1.5', 1, 'Admin Viiworks', '2015-09-01 03:00:38'),
(9, '10.10.1.12', 56, 'Web Admin User', '2015-09-01 07:52:52'),
(10, '10.10.1.231', 1, 'Admin Viiworks', '2015-09-02 03:37:03'),
(11, '10.10.1.12', 56, 'Web Admin User', '2015-09-03 03:59:51'),
(12, '10.10.1.5', 1, 'Admin Viiworks', '2015-09-03 09:47:34'),
(13, '10.10.1.12', 1, 'Admin Viiworks', '2015-09-07 02:58:19'),
(14, '10.10.1.12', 1, 'Admin Viiworks', '2015-09-10 01:54:23');

-- --------------------------------------------------------

--
-- Table structure for table `vii_admin_permission`
--

CREATE TABLE IF NOT EXISTS `vii_admin_permission` (
  `id_admin_permission` int(11) NOT NULL AUTO_INCREMENT,
  `id_admin_group` int(11) NOT NULL,
  `id_module` int(11) NOT NULL,
  `sort_order` tinyint(4) NOT NULL,
  `isActive` tinyint(4) NOT NULL DEFAULT '1',
  PRIMARY KEY (`id_admin_permission`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=201 ;

--
-- Dumping data for table `vii_admin_permission`
--

INSERT INTO `vii_admin_permission` (`id_admin_permission`, `id_admin_group`, `id_module`, `sort_order`, `isActive`) VALUES
(1, 1, 1, 1, 1),
(2, 1, 2, 2, 1),
(3, 1, 3, 3, 1),
(4, 1, 6, 4, 1),
(5, 1, 7, 5, 1),
(6, 1, 10, 6, 1),
(7, 1, 11, 7, 1),
(8, 1, 12, 8, 1),
(9, 1, 15, 9, 1),
(10, 1, 17, 10, 1),
(11, 1, 18, 11, 1),
(12, 1, 20, 12, 1),
(13, 1, 23, 13, 1),
(14, 1, 24, 14, 1),
(167, 9, 1, 1, 1),
(168, 9, 2, 2, 1),
(190, 10, 11, 11, 1),
(192, 10, 15, 15, 0),
(193, 10, 17, 17, 1),
(191, 10, 12, 12, 0),
(189, 10, 10, 10, 0),
(186, 10, 3, 3, 1),
(184, 10, 1, 1, 1),
(194, 10, 18, 18, 0),
(196, 10, 23, 23, 0),
(198, 10, 25, 25, 0),
(197, 10, 24, 24, 0),
(200, 10, 32, 32, 0),
(169, 9, 3, 3, 1),
(170, 9, 6, 6, 1),
(183, 9, 32, 32, 0),
(171, 9, 7, 7, 1),
(187, 10, 6, 6, 0),
(172, 9, 10, 10, 0),
(173, 9, 11, 11, 1),
(181, 9, 25, 25, 1),
(174, 9, 12, 12, 1),
(188, 10, 7, 7, 1),
(175, 9, 15, 15, 1),
(185, 10, 2, 2, 0),
(176, 9, 17, 17, 1),
(182, 9, 30, 30, 1),
(177, 9, 18, 18, 1),
(195, 10, 20, 20, 0),
(178, 9, 20, 20, 1),
(179, 9, 23, 23, 1),
(180, 9, 24, 24, 1),
(16, 1, 30, 4, 1),
(199, 10, 30, 30, 0),
(15, 1, 25, 3, 1),
(166, 1, 32, 32, 0);

-- --------------------------------------------------------

--
-- Table structure for table `vii_banner`
--

CREATE TABLE IF NOT EXISTS `vii_banner` (
  `id_banner` int(11) NOT NULL AUTO_INCREMENT,
  `image_title` text,
  `image_sub_title` text,
  `image_sub_title2` text,
  `image_desc` text,
  `image_src` varchar(255) DEFAULT NULL,
  `image_src2` varchar(255) DEFAULT NULL,
  `image_link` varchar(255) DEFAULT NULL,
  `status` int(11) DEFAULT '0',
  `date` date DEFAULT NULL,
  `date_add` timestamp NULL DEFAULT NULL,
  `date_upd` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id_banner`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=7 ;

--
-- Dumping data for table `vii_banner`
--

INSERT INTO `vii_banner` (`id_banner`, `image_title`, `image_sub_title`, `image_sub_title2`, `image_desc`, `image_src`, `image_src2`, `image_link`, `status`, `date`, `date_add`, `date_upd`) VALUES
(5, 'Sample Title', 'Sample Title', 'Sample Title', '<p>Sample description<br></p>', '70219004b209ec090a8f1bc61e4a4157.png', '', 'http://www.sample.com/', 1, '2015-08-27', '2015-08-27 22:52:19', NULL),
(6, 'Sample banner 2', 'Sample banner 2', 'Sample banner 2', '<p>Sample banner 2<br></p>', 'bad1b9fa04223b8fb729fd2cf26ce79b.png', '', 'Sample banner 2', 1, '2015-09-01', '2015-08-31 23:03:59', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `vii_bc`
--

CREATE TABLE IF NOT EXISTS `vii_bc` (
  `id_bc` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(20) NOT NULL,
  `date_add` datetime NOT NULL,
  PRIMARY KEY (`id_bc`),
  UNIQUE KEY `name` (`name`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=3 ;

--
-- Dumping data for table `vii_bc`
--

INSERT INTO `vii_bc` (`id_bc`, `name`, `date_add`) VALUES
(1, 'admin', '2014-02-17 00:00:00'),
(2, 'dashboard', '2014-02-18 00:00:00');

-- --------------------------------------------------------

--
-- Table structure for table `vii_bc_admin`
--

CREATE TABLE IF NOT EXISTS `vii_bc_admin` (
  `id_bc_admin` int(3) NOT NULL AUTO_INCREMENT,
  `name` varchar(30) NOT NULL,
  `html_id` varchar(30) NOT NULL,
  `parent_id` int(3) NOT NULL DEFAULT '1',
  `module` varchar(30) NOT NULL,
  `method` varchar(30) NOT NULL,
  PRIMARY KEY (`id_bc_admin`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=50 ;

--
-- Dumping data for table `vii_bc_admin`
--

INSERT INTO `vii_bc_admin` (`id_bc_admin`, `name`, `html_id`, `parent_id`, `module`, `method`) VALUES
(2, 'Home', 'bcHome', 0, 'admindashboard', 'index'),
(3, 'Settings', 'bcSettings', 0, '', ''),
(4, 'CMS', 'bcCMS', 0, 'cms', ''),
(5, 'Contact Us', 'bcContact', 0, '', ''),
(6, 'Newsletter', 'bcNews', 0, '', ''),
(7, 'General', 'bcSettingsGeneral', 3, 'settings', 'index'),
(8, 'Users', 'bcSettingsUsers', 3, 'settings', 'users'),
(9, 'Groups', 'bcSettingsGroups', 3, 'settings', 'groups'),
(10, 'Modules', 'bcSettingsModules', 3, 'settings', 'modules'),
(11, 'Permissions', 'bcSettingsPermissions', 3, 'settings', 'permissions'),
(12, 'Server', 'bcSettingsServer', 3, 'settings', 'server'),
(13, 'Subscribers', 'bcNewsSub', 6, 'newslettermanager', 'index'),
(14, 'Campaigns', 'bcNewsCampaigns', 6, 'newslettermanager', 'campaigns'),
(15, 'Settings', 'bcNewsSettings', 6, 'newslettermanager', 'settings'),
(16, 'Messages', 'bcContactIndex', 5, 'contactusmanager', 'index'),
(17, 'Settings', 'bcContactSettings', 5, 'contactusmanager', 'settings'),
(18, 'Breadcrumbs', 'bcBc', 0, '', ''),
(19, 'Admin', 'bcBcAdmin', 18, 'breadcrumbs', 'index'),
(21, 'FAQ', 'bcFAQManager', 0, '', ''),
(22, 'Items', 'bcFAQItems', 21, 'faqmanager', 'index'),
(23, 'Categories', 'bcFAQCategories', 21, 'faqmanager', 'category'),
(24, 'SEO', 'bcSeoManager', 0, '', ''),
(25, 'Settings', 'bcSeoManSettings', 24, 'seomanager', 'settings'),
(26, 'Statistics', 'bcSeoManStat', 24, 'seomanager', 'index'),
(27, 'Gallery', 'bcGallery', 0, '', ''),
(28, 'Items', 'bcGalleryItems', 27, 'gallery_manager', 'index'),
(29, 'Categories', 'bcGalleryCategories', 27, 'gallery_manager', 'category'),
(30, 'News Manager', 'bcNews', 0, '', ''),
(31, 'Items', 'bcNewsItems', 30, 'news_manager', 'index'),
(32, 'Categories', 'bcNewsCategories', 30, 'news_manager', 'category'),
(33, 'Social Media', 'bcSeoManSocialMedia', 24, 'seomanager', 'socialmedia'),
(34, 'Banner', 'bcBanner', 0, 'bannermanager', 'index'),
(35, 'Blog Manager', 'bcBlog', 0, '', ''),
(36, 'Items', 'bcBlogItems', 35, 'blog_manager', 'index'),
(37, 'Categories', 'bcNewsCategories', 35, 'blog_manager', 'category'),
(38, 'Testimonial Manager', 'bcTestimonial', 0, '', ''),
(39, 'Items', 'bcTestimonialItems', 38, 'testimonial_manager', 'index'),
(41, 'Pages', 'bcPages', 4, 'cms', 'index'),
(42, 'Promo Manager', 'bcPromo', 0, '', ''),
(43, 'Items', 'bcPromoItems', 42, 'promo_manager', 'index'),
(44, 'Categories', 'bcPromoCategories', 0, 'promo_manager', 'category'),
(45, 'Events Manager', 'bcEventsItems', 0, '', ''),
(46, 'Items', 'bcEventsItems', 45, 'events_manager', 'index'),
(47, 'Category', 'bcEventsCategories', 45, 'events_manager', 'categories'),
(48, 'Navigation Manager ', 'bcManageNav', 0, 'manage_navigation', 'index'),
(49, 'Section', 'bcSection', 4, 'cms', 'section');

-- --------------------------------------------------------

--
-- Table structure for table `vii_blog_category`
--

CREATE TABLE IF NOT EXISTS `vii_blog_category` (
  `id_blog_category` int(11) NOT NULL AUTO_INCREMENT,
  `id_parent` int(11) DEFAULT NULL,
  `category_title` text,
  `category_desc` text,
  `category_root` text,
  `status` int(11) DEFAULT NULL,
  `date_add` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  PRIMARY KEY (`id_blog_category`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=20 ;

--
-- Dumping data for table `vii_blog_category`
--

INSERT INTO `vii_blog_category` (`id_blog_category`, `id_parent`, `category_title`, `category_desc`, `category_root`, `status`, `date_add`) VALUES
(1, 0, 'Uncategorized', 'Uncategorized', NULL, 1, '2014-08-21 07:48:24'),
(17, 0, 'test', 'test', ' - test', 1, '2015-08-25 09:47:05'),
(18, 17, 'test1.0', 'test1.0', 'test - test1.0', 1, '2015-08-25 09:47:21'),
(19, 17, 'test2.0', 'test2.0', 'test - test2.0', 1, '2015-08-25 09:47:34');

-- --------------------------------------------------------

--
-- Table structure for table `vii_blog_item`
--

CREATE TABLE IF NOT EXISTS `vii_blog_item` (
  `id_blog_item` int(11) NOT NULL AUTO_INCREMENT,
  `date` date DEFAULT NULL,
  `image_title` text,
  `link_rewrite` text,
  `image_sub_title` text,
  `image_author` varchar(255) DEFAULT NULL,
  `image_desc` text,
  `image_src` varchar(255) DEFAULT NULL,
  `image_meta_title` text,
  `image_meta_description` text,
  `image_meta_keywords` text,
  `status` int(11) DEFAULT NULL,
  `id_blog_category` int(11) NOT NULL DEFAULT '1',
  `date_add` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  PRIMARY KEY (`id_blog_item`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=7 ;

--
-- Dumping data for table `vii_blog_item`
--

INSERT INTO `vii_blog_item` (`id_blog_item`, `date`, `image_title`, `link_rewrite`, `image_sub_title`, `image_author`, `image_desc`, `image_src`, `image_meta_title`, `image_meta_description`, `image_meta_keywords`, `status`, `id_blog_category`, `date_add`) VALUES
(1, '2014-08-21', 'Sample Title 6', 'sample_title_6', 'Sample Title 6', 'admin', '<p>Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.<span style="font-weight: bold;"><br></span></p>', 'ccc02bd6b408df40d4c981d6020c0778.JPG', 'Sample Meta Title #1', 'Sample Meta Description #1', 'Sample Meta Keywords #1', 1, 1, '2015-09-01 08:09:16'),
(2, '2014-09-11', 'Sample Title 5', 'sample_title_5', 'Sample Title 5', 'admin', '<p>Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.<br></p>', '0f99706afd302b50a596c4846bf3961a.JPG', 'Sample Meta Title #2 blog', 'Sample Meta Description #2 blog', 'Sample Meta Keywords #2 blog', 1, 1, '2015-09-01 08:09:16'),
(3, '2015-06-26', 'Sample Title 1', 'sample_title_1', 'qweqweqw', 'admin', '<p>Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.</p>', 'b1a659c258d688cb5a9da0b93de2b38d.JPG', '', '', '', 1, 1, '2015-09-01 08:09:16'),
(4, '2015-06-26', 'Sample Title 2', 'sample_title_2', 'Sample Title 2', 'admin', '<p>Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.<br></p>', '357b4f4491fe6fd338cc2b1b0eb877b2.JPG', '', '', '', 1, 1, '2015-09-01 08:09:16'),
(5, '2015-06-26', 'Sample Title 3', 'sample_title_3', 'Sample Title 3', 'admin', '<p>Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.<br></p>', '490ff91e054cbbdf199ecefb9abcd79a.JPG', '', '', '', 1, 1, '2015-09-01 08:09:16'),
(6, '2015-06-26', 'Sample Title 4', 'sample_title_4', 'Sample Title 4', 'admin', '<p>Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.<br></p>', '33abfafd11275242969a58bce6387068.JPG', '', '', '', 1, 1, '2015-09-01 08:09:16');

-- --------------------------------------------------------

--
-- Table structure for table `vii_config`
--

CREATE TABLE IF NOT EXISTS `vii_config` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(128) NOT NULL,
  `value` text NOT NULL,
  `date_add` datetime NOT NULL,
  `date_upd` datetime NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=76 ;

--
-- Dumping data for table `vii_config`
--

INSERT INTO `vii_config` (`id`, `name`, `value`, `date_add`, `date_upd`) VALUES
(1, 'ADMIN_EMAIL', 'testviiworks@gmail.com', '2009-06-01 17:56:17', '2013-10-24 10:03:33'),
(2, 'ADMIN_NAME', 'Admin', '2009-06-01 17:56:17', '2013-10-24 10:03:33'),
(3, 'SITE_NAME', 'Sample Web', '2010-01-14 10:25:50', '2013-10-24 10:03:33'),
(4, 'META_DESCRIPTION', 'ENTER DEFAULT META DESCRIPTION VIA ADMIN PANEL > SEO > SETTINGS', '2011-03-07 18:51:58', '2013-10-24 10:03:33'),
(5, 'META_AUTHOR', 'Admin', '2011-03-07 18:51:58', '2013-10-24 10:03:33'),
(6, 'META_TITLE', 'ENTER DEFAULT META TITLE VIA ADMIN PANEL > SEO > SETTINGS', '2011-03-29 11:55:32', '2013-10-24 10:03:33'),
(53, 'ADMIN_BCC', 'testviiworks@gmail.com', '2014-02-20 00:00:00', '2014-02-20 00:00:00'),
(10, 'SEO_GOOGLE_UA', 'ENTER SEO GOOGLE ANALYTICS VIA GOOGLE.COM', '2010-12-02 09:00:48', '2014-02-19 12:23:36'),
(11, 'SERVER_URL', 'http://10.10.1.12/samplewebsite24/', '2010-12-02 18:02:19', '2012-05-08 09:57:41'),
(12, 'SERVER_USERNAME', '', '2010-12-02 18:02:19', '2012-05-08 09:57:41'),
(13, 'SERVER_PASSWORD', '', '2010-12-02 18:02:19', '2012-05-08 09:57:41'),
(63, 'RECAPTCHA_PUBLIC_KEY', '', '2014-08-07 00:00:00', '2014-08-07 00:00:00'),
(23, 'CONTACT_EMAIL', 'testviiworks@gmail.com', '2011-04-14 08:08:32', '2012-10-03 14:49:40'),
(24, 'CONTACT_PASSWORD', 'x8fQDted5mQw45OOMmdOik7Fdn3pQMGqabKrGwKAmLZZcz3YUUEKHoQHOWmit2fKkPgQxzjiwVHGV2xrN869PA==', '2011-05-03 08:51:17', '2011-05-03 08:53:52'),
(25, 'CONTACT_SMTP_HOST', 'ssl://smtp.googlemail.com', '2011-05-03 08:51:17', '2011-05-03 08:53:52'),
(26, 'CONTACT_SMTP_PORT', '465', '2011-05-03 08:51:17', '2011-05-03 08:53:52'),
(27, 'CONTACT_EMAIL_BODY', '', '2011-04-14 08:08:32', '2012-10-03 14:49:40'),
(28, 'NEWSLETTER_EMAIL', 'testviiworks@gmail.com', '2011-05-03 08:51:17', '2011-05-03 08:53:52'),
(29, 'NEWSLETTER_PASSWORD', '8W3BPOgfdaH+siUZMg7pwZb0wd4wwwLTBXjHy+mYFsp/UszVqTHbHuTSEcBvuV2m4/Zlvs6SQHruIFhpWJeXcQ==', '2011-05-03 08:51:17', '2011-05-03 08:53:52'),
(30, 'NEWSLETTER_SMTP_HOST', 'ssl://smtp.googlemail.com', '2011-05-03 08:51:17', '2011-05-03 08:53:52'),
(31, 'NEWSLETTER_SMTP_PORT', '465', '2011-05-03 08:51:17', '2011-05-03 08:53:52'),
(32, 'NEWSLETTER_EMAIL_BODY', '', '2011-05-03 08:51:17', '2011-05-03 08:53:52'),
(33, 'META_TAGS', 'ENTER DEFAULT META TAGS VIA ADMIN PANEL > SEO > SETTINGS', '2011-05-12 07:10:38', '2013-10-24 10:03:33'),
(34, 'META_ROBOTS', 'noindex, nofollow', '2011-05-12 07:10:38', '2013-10-24 10:03:33'),
(36, 'PAYPAL_PAYMENT_URL', '', '2011-08-01 16:18:51', '2011-08-01 16:18:51'),
(37, 'PAYPAL_API_USERNAME', '', '2011-08-01 16:18:51', '2011-08-01 16:18:51'),
(38, 'PAYPAL_API_PASSWORD', '', '2011-08-01 16:18:51', '2011-08-01 16:18:51'),
(39, 'PAYPAL_API_SIGNATURE', '', '2011-08-01 16:18:51', '2011-08-01 16:18:51'),
(40, 'PAYPAL_ENDPOINT_URL', '', '2011-08-01 16:18:51', '2011-08-01 16:18:51'),
(44, 'PAYEASY_MERCHANT', '', '2011-09-26 17:47:13', '2011-09-26 17:47:13'),
(45, 'PAYEASY_PASSWORD', '', '2011-09-26 17:47:13', '2011-09-26 17:47:13'),
(54, 'ADMIN_SMTP_HOST', 'ssl://smtp.googlemail.com', '2014-02-20 00:00:00', '2014-02-20 00:00:00'),
(55, 'ADMIN_SMTP_PORT', '465', '2014-02-20 00:00:00', '2014-02-20 00:00:00'),
(56, 'ADMIN_EMAIL_PASS', '+iED3b/VlRgXdfwyVQU9lvTNISqRfahodQbTL9SsH03StctIlr18zs3vWn1mZfkOdahKNRyvErmhQweQyxyCtw==', '2014-02-20 00:00:00', '2014-02-20 00:00:00'),
(57, 'SMEDIA_FACEBOOK', 'https://www.facebook.com/viiworks', '2014-08-01 00:00:00', '2014-08-01 00:00:00'),
(58, 'SMEDIA_TWITTER', 'https://twitter.com/ViiWorks', '2014-08-01 00:00:00', '2014-08-01 00:00:00'),
(59, 'SMEDIA_GOOGLEPLUS', 'https://plus.google.com/+ViiworksInc/posts', '2014-08-01 00:00:00', '2014-08-01 00:00:00'),
(60, 'SMEDIA_PINTEREST', 'http://www.pinterest.com/viiworks/', '2014-08-01 00:00:00', '2014-08-01 00:00:00'),
(61, 'SMEDIA_LINKEDIN', 'https://www.linkedin.com/company/viiworks', '2014-08-01 00:00:00', '2014-08-01 00:00:00'),
(62, 'SMEDIA_INSTAGRAM', 'https://www.instagram.com/viiworks', '2014-08-01 00:00:00', '2014-08-01 00:00:00'),
(64, 'RECAPTCHA_PUBLIC_KEY', '', '2014-08-07 00:00:00', '2014-08-07 00:00:00'),
(65, 'RECAPTCHA_PRIVATE_KEY', '', '2014-08-07 00:00:00', '2014-08-07 00:00:00'),
(66, 'SITE_CSS', '', '2014-08-20 00:00:00', '2014-08-20 00:00:00'),
(67, 'SITE_LOGO', '70ac706701c9e9dab0043089cbaec127.jpg', '2014-08-20 00:00:00', '2014-08-20 00:00:00'),
(68, 'SITE_FAVICON', 'a20bd63452b227254b8fe936257ff079.png', '2014-08-21 00:00:00', '2014-08-21 00:00:00'),
(69, 'META_IMAGE', '', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(70, 'CONTACT_NO', '123-456-7890', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(71, 'CONTACT_ADDRESS', 'Viiworks Drive corner, Bonifacio Global City, 32nd St, Taguig City ', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(72, 'THEME_CSS', 'theme_darkly.min.css', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(73, 'GOOGLE_MAP', 'https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3861.677339703551!2d121.01264199999997!3d14.560435!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x0:0x0!2zMTTCsDMzJzM3LjYiTiAxMjHCsDAwJzQ1LjUiRQ!5e0!3m2!1sen!2sph!4v1441255499552', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(75, 'IMAGE_DIMENSIONS', '', '2015-10-12 00:00:00', '2015-10-12 00:00:00');

-- --------------------------------------------------------

--
-- Table structure for table `vii_config_style`
--

CREATE TABLE IF NOT EXISTS `vii_config_style` (
  `id_config_style` int(11) NOT NULL AUTO_INCREMENT,
  `color_schemes` varchar(255) DEFAULT NULL,
  `color_skin` varchar(255) DEFAULT NULL,
  `layout_style` varchar(255) DEFAULT NULL,
  `layout_rtl` varchar(255) DEFAULT NULL,
  `patterns` varchar(255) DEFAULT NULL,
  `boxed_background` varchar(255) DEFAULT NULL,
  PRIMARY KEY (`id_config_style`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=2 ;

--
-- Dumping data for table `vii_config_style`
--

INSERT INTO `vii_config_style` (`id_config_style`, `color_schemes`, `color_skin`, `layout_style`, `layout_rtl`, `patterns`, `boxed_background`) VALUES
(1, '', '', '', '', '', '');

-- --------------------------------------------------------

--
-- Table structure for table `vii_contact_us`
--

CREATE TABLE IF NOT EXISTS `vii_contact_us` (
  `id_contact_us` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(100) NOT NULL,
  `email` varchar(100) NOT NULL,
  `phone` varchar(32) DEFAULT NULL,
  `website` varchar(255) DEFAULT NULL,
  `address` text,
  `subject` text,
  `message` text NOT NULL,
  `date_add` datetime NOT NULL,
  PRIMARY KEY (`id_contact_us`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=3 ;

--
-- Dumping data for table `vii_contact_us`
--

INSERT INTO `vii_contact_us` (`id_contact_us`, `name`, `email`, `phone`, `website`, `address`, `subject`, `message`, `date_add`) VALUES
(1, 'Sample One', 'testviiworks@gmail.com', '1234567890', 'SampleOne.com', 'testviiworks.gmail.com', 'Sample One Subject', 'Sample One Messages Here', '2014-10-16 07:08:31');

-- --------------------------------------------------------

--
-- Table structure for table `vii_events_category`
--

CREATE TABLE IF NOT EXISTS `vii_events_category` (
  `id_events_category` int(11) NOT NULL AUTO_INCREMENT,
  `id_parent` int(11) DEFAULT '0',
  `category_title` text,
  `category_desc` text,
  `category_root` text,
  `category_meta_title` text,
  `category_meta_description` text,
  `category_meta_keywords` text,
  `category_meta_image` varchar(255) DEFAULT NULL,
  `status` int(11) DEFAULT '1',
  `date_add` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  PRIMARY KEY (`id_events_category`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=4 ;

--
-- Dumping data for table `vii_events_category`
--

INSERT INTO `vii_events_category` (`id_events_category`, `id_parent`, `category_title`, `category_desc`, `category_root`, `category_meta_title`, `category_meta_description`, `category_meta_keywords`, `category_meta_image`, `status`, `date_add`) VALUES
(1, 0, 'Uncategorized', 'Uncategorized', NULL, NULL, NULL, NULL, NULL, 1, '2015-01-06 06:22:18'),
(2, 0, 'test', 'test', ' - test', NULL, NULL, NULL, NULL, 1, '2015-08-26 04:30:15'),
(3, 2, 'test1.1', 'test1.1', 'test - test1.1', NULL, NULL, NULL, NULL, 1, '2015-08-26 04:30:28');

-- --------------------------------------------------------

--
-- Table structure for table `vii_events_item`
--

CREATE TABLE IF NOT EXISTS `vii_events_item` (
  `id_events_item` int(11) NOT NULL AUTO_INCREMENT,
  `date` date DEFAULT NULL,
  `image_title` text,
  `link_rewrite` text,
  `image_sub_title` text,
  `image_author` varchar(255) DEFAULT NULL,
  `image_desc` text,
  `image_src` varchar(255) DEFAULT NULL,
  `image_meta_title` text,
  `image_meta_description` text,
  `image_meta_keywords` text,
  `status` int(11) DEFAULT NULL,
  `id_events_category` int(11) DEFAULT '1',
  `date_add` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  PRIMARY KEY (`id_events_item`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=4 ;

--
-- Dumping data for table `vii_events_item`
--

INSERT INTO `vii_events_item` (`id_events_item`, `date`, `image_title`, `link_rewrite`, `image_sub_title`, `image_author`, `image_desc`, `image_src`, `image_meta_title`, `image_meta_description`, `image_meta_keywords`, `status`, `id_events_category`, `date_add`) VALUES
(1, '2014-12-29', 'Sample Title #1', 'sample_title__1', 'Sample Sub Title #1', 'admin', '<p>Sample Description #1<br></p>', '430e2a9a9d2131d27de8026f447b2657.JPG', '', '', '', 1, 1, '2015-09-01 08:09:24'),
(2, '2014-11-26', 'Sample Title #2', 'sample_title__2', 'Sample Sub Title #2', 'admin', '<p>Sample Description #2<br></p>', '7f3b1197563643f3d07a5f0117fe3fa1.JPG', '', '', '', 1, 1, '2015-09-01 08:09:24'),
(3, '2015-07-01', 'Events 3', 'events_3', 'Sample Events 3', 'admin', '<p>Sample Events 3<br></p>', '64d89d4e0556c3e3ba9fd5b1fd13187d.JPG', '', '', '', 1, 1, '2015-09-01 08:09:24');

-- --------------------------------------------------------

--
-- Table structure for table `vii_faq_category`
--

CREATE TABLE IF NOT EXISTS `vii_faq_category` (
  `id_faq_category` int(11) NOT NULL AUTO_INCREMENT,
  `category_title` varchar(250) CHARACTER SET utf8 NOT NULL,
  `category_description` text CHARACTER SET utf8 NOT NULL,
  `status` int(11) DEFAULT NULL,
  PRIMARY KEY (`id_faq_category`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=3 ;

--
-- Dumping data for table `vii_faq_category`
--

INSERT INTO `vii_faq_category` (`id_faq_category`, `category_title`, `category_description`, `status`) VALUES
(1, 'Uncategorized', '', 1),
(2, 'test', 'testtesttesttesttesttest', 1);

-- --------------------------------------------------------

--
-- Table structure for table `vii_faq_item`
--

CREATE TABLE IF NOT EXISTS `vii_faq_item` (
  `id_faq_item` int(11) NOT NULL AUTO_INCREMENT,
  `faq_question` varchar(250) CHARACTER SET utf8 NOT NULL,
  `faq_answer` text CHARACTER SET utf8 NOT NULL,
  `id_faq_category` int(11) NOT NULL,
  `status` int(11) DEFAULT NULL,
  PRIMARY KEY (`id_faq_item`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=5 ;

--
-- Dumping data for table `vii_faq_item`
--

INSERT INTO `vii_faq_item` (`id_faq_item`, `faq_question`, `faq_answer`, `id_faq_category`, `status`) VALUES
(1, 'Question #1?', 'Answer #1. Lorem ipsum dolor sit amet.', 1, 1),
(2, 'Question #2?', 'Answer #2. Lorem ipsum dolor sit amet.', 1, 1),
(3, 'Question #3?', 'Answer #3. Lorem ipsum dolor sit amet.', 1, 1);

-- --------------------------------------------------------

--
-- Table structure for table `vii_gallery_category`
--

CREATE TABLE IF NOT EXISTS `vii_gallery_category` (
  `id_gallery_category` int(11) NOT NULL AUTO_INCREMENT,
  `id_parent` int(11) DEFAULT '0',
  `category_title` text,
  `link_rewrite` text,
  `category_sub_title` text,
  `category_desc` text,
  `image_src` varchar(255) DEFAULT NULL,
  `status` int(11) DEFAULT '1',
  `category_meta_title` text,
  `category_meta_description` text,
  `category_meta_keywords` text,
  `date_add` timestamp NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`id_gallery_category`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=4 ;

--
-- Dumping data for table `vii_gallery_category`
--

INSERT INTO `vii_gallery_category` (`id_gallery_category`, `id_parent`, `category_title`, `link_rewrite`, `category_sub_title`, `category_desc`, `image_src`, `status`, `category_meta_title`, `category_meta_description`, `category_meta_keywords`, `date_add`) VALUES
(1, 0, 'Uncategorized', 'uncategorized', 'Uncategorized', 'Uncategorized', '91199dd47ec13243b6b0032ee63dc40a.png', 1, NULL, NULL, NULL, '2014-07-07 16:00:00'),
(3, 0, 'Sample Title #1', 'sample_title_1', 'Sample Sub Title #1', 'Sample Description #1', '5dd0f7e410b267fe2c7587f701b8e5bf.png', 1, NULL, NULL, NULL, '2014-08-19 09:31:24');

-- --------------------------------------------------------

--
-- Table structure for table `vii_gallery_item`
--

CREATE TABLE IF NOT EXISTS `vii_gallery_item` (
  `id_gallery_item` int(11) NOT NULL AUTO_INCREMENT,
  `image_title` text,
  `link_rewrite` text,
  `image_sub_title` text,
  `image_desc` text,
  `image_src` text,
  `image_meta_title` text,
  `image_meta_description` text,
  `image_meta_keywords` text,
  `status` int(11) DEFAULT '0',
  `id_gallery_category` int(11) DEFAULT '1',
  `date_add` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`id_gallery_item`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=13 ;

--
-- Dumping data for table `vii_gallery_item`
--

INSERT INTO `vii_gallery_item` (`id_gallery_item`, `image_title`, `link_rewrite`, `image_sub_title`, `image_desc`, `image_src`, `image_meta_title`, `image_meta_description`, `image_meta_keywords`, `status`, `id_gallery_category`, `date_add`) VALUES
(1, 'Title #1', 'title__1', 'Subtitle#1', 'Description #1', '8c79f1d9b194d2c9752fcb8152ea8816.png', 'Gallery Sample Meta Title  #1', 'Gallery Sample Meta Description  #1', 'Gallery Sample Meta Keywords  #1', 1, 1, '2014-08-19 09:09:46'),
(2, 'Title #2', 'title__2', 'Subtitle#2', 'Description #2', '5a5c4b36d5ec54f81104347dfdc4f768.png', '', '', '', 1, 1, '2014-08-19 09:09:46'),
(3, 'Sample Title #1', 'sample_title__1', 'Sample Sub Title #1', 'Sample Description #1', 'f8bcbe968eda9a83b08864e4e9ca6497.png', '', '', '', 1, 3, '2014-10-16 02:56:47'),
(4, 'Sample Title #2', 'sample_title__2', 'Sample Sub Title #2', 'Sample Description #2', '923e61384441918d9232a56c92408656.png', '', '', '', 1, 3, '2014-10-16 02:56:47');

-- --------------------------------------------------------

--
-- Table structure for table `vii_module`
--

CREATE TABLE IF NOT EXISTS `vii_module` (
  `id_module` int(11) NOT NULL AUTO_INCREMENT,
  `module_name` varchar(128) NOT NULL,
  `module_description` text NOT NULL,
  `module_class` varchar(64) NOT NULL,
  `link_rewrite` varchar(128) NOT NULL,
  `isAdmin` tinyint(4) NOT NULL,
  `isActive` tinyint(1) NOT NULL,
  `date_add` datetime NOT NULL,
  `date_upd` datetime NOT NULL,
  PRIMARY KEY (`id_module`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=31 ;

--
-- Dumping data for table `vii_module`
--

INSERT INTO `vii_module` (`id_module`, `module_name`, `module_description`, `module_class`, `link_rewrite`, `isAdmin`, `isActive`, `date_add`, `date_upd`) VALUES
(1, 'Dashboard', '', 'admindashboard', 'dashboard', 1, 1, '2012-09-28 09:54:19', '2011-03-14 14:36:46'),
(2, 'Settings', '', 'settings', 'settings', 1, 1, '2012-09-28 10:28:19', '2011-03-15 11:15:59'),
(3, 'CMS', '', 'cms', 'pages', 1, 1, '2012-09-28 09:55:16', '2011-03-15 18:44:40'),
(4, 'Pages', 'Generic modules for pages with content', 'pages', '', 0, 1, '2011-03-25 17:06:30', '2011-03-25 17:06:30'),
(6, 'Newsletter Manager', 'Newsletter Manager Description', 'newslettermanager', 'newsletter', 1, 1, '2014-01-13 22:14:13', '2014-01-13 22:14:16'),
(7, 'Contact Us Manager', 'Contact Us Manager Description', 'contactusmanager', 'contactus', 1, 1, '2014-01-13 22:14:45', '2014-01-13 22:14:48'),
(9, 'Contact Us', 'Contact Us Front End', 'contactus', 'contactus', 0, 1, '2014-02-13 05:00:06', '2015-01-09 10:12:57'),
(10, 'Breadcrumbs', 'Breadcrumbs Manager', 'breadcrumbs', 'breadcrumbs', 1, 1, '2014-02-17 10:33:07', '2014-02-17 10:45:24'),
(11, 'FAQ Manager', 'Manages FAQ items', 'faqmanager', 'faq', 1, 1, '2014-02-19 03:10:29', '2014-02-19 03:12:05'),
(12, 'SEO Manager', 'SEO Manager Description', 'seomanager', 'seo', 1, 1, '2014-02-19 11:42:59', '2014-02-19 12:49:30'),
(13, 'Frequently Asked Questions', 'Frequently Asked Questions Front End', 'faqs', 'faqs', 0, 1, '2014-04-21 08:46:03', '2014-04-21 08:46:03'),
(14, 'News Page', 'News Front', 'news', 'news', 0, 1, '2014-07-08 00:00:00', '2014-07-08 00:00:00'),
(15, 'News Manager', 'News Dashboard', 'news_manager', 'news_manager', 1, 1, '2014-07-08 00:00:00', '2014-07-08 00:00:00'),
(16, 'Gallery', 'Gallery Front', 'gallery', 'gallery', 0, 1, '2014-07-08 00:00:00', '2014-10-16 10:01:18'),
(17, 'Gallery Manager', 'Gallery Dashboard', 'gallery_manager', 'gallery_manager', 1, 1, '2014-07-08 00:00:00', '2014-10-16 10:01:29'),
(18, 'Banner', 'Setup banner contents', 'bannermanager', 'bannermanager', 1, 1, '2014-08-01 08:32:01', '2014-08-12 09:48:11'),
(19, 'RSS Feed', 'RSS Feed', 'rssfeed', 'rssfeed', 0, 1, '2014-08-19 10:43:17', '2014-08-19 10:43:17'),
(20, 'Blog Manager', 'Blog Manager', 'blog_manager', 'blog_manager', 1, 1, '2014-08-21 09:34:44', '2014-08-21 09:34:44'),
(21, 'Blog Page', 'Blog Front', 'blog', 'blog', 0, 1, '2014-08-21 09:35:50', '2014-08-21 09:35:50'),
(22, 'Testimonial', 'Testimonial Front', 'testimonial', 'testimonial', 0, 1, '2014-08-21 11:01:12', '2014-09-05 12:02:58'),
(23, 'Testimonial Manager', 'Testimonial Dashboard', 'testimonial_manager', 'testimonial_manager', 1, 1, '2014-08-21 11:02:20', '2014-08-21 11:02:20'),
(24, 'Navigation Manager', 'Navigation Manager', 'manage_navigation', 'manage_navigation', 1, 1, '2014-09-01 06:15:32', '2014-09-01 06:15:32'),
(25, 'Promotion Manager', 'Promotions Dashboard', 'promo_manager', 'promo_manager', 1, 1, '2014-10-15 10:20:32', '2014-10-15 10:20:32'),
(26, 'Promotion', 'Promotion Front', 'promo', 'promo', 0, 1, '2014-10-15 10:21:05', '2014-10-15 10:21:05'),
(27, 'Search', 'Search Front', 'search', 'search', 0, 1, '2014-10-16 06:09:21', '2014-10-16 06:09:21'),
(28, 'Newsletter', 'Newsletter Front', 'newsletter', 'newsletter', 0, 1, '2014-10-16 08:43:01', '2014-10-16 08:43:01'),
(29, 'Events Page', 'Events Page Frontend', 'events', 'events', 0, 1, '2015-01-06 05:24:55', '2015-01-06 05:24:55'),
(30, 'Events Manager', 'Events Manager Dashboard', 'events_manager', 'events_manager', 1, 1, '2015-01-06 05:25:31', '2015-01-06 05:25:31');

-- --------------------------------------------------------

--
-- Table structure for table `vii_newsletter`
--

CREATE TABLE IF NOT EXISTS `vii_newsletter` (
  `id_newsletter` int(11) NOT NULL AUTO_INCREMENT,
  `title` tinytext NOT NULL,
  `content` varchar(15) NOT NULL,
  `date_add` datetime NOT NULL,
  PRIMARY KEY (`id_newsletter`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=11 ;

--
-- Dumping data for table `vii_newsletter`
--

INSERT INTO `vii_newsletter` (`id_newsletter`, `title`, `content`, `date_add`) VALUES
(1, 'Ensogo', '1.txt', '2014-02-13 05:35:05'),
(2, 'Buyanihan', '2.txt', '2014-02-13 05:37:40'),
(9, 'hhhh', '9.txt', '2015-09-01 05:30:54'),
(10, 'ggg', '10.txt', '2015-09-01 05:31:40');

-- --------------------------------------------------------

--
-- Table structure for table `vii_newsletter_subscribers`
--

CREATE TABLE IF NOT EXISTS `vii_newsletter_subscribers` (
  `id_subscriber` int(11) NOT NULL AUTO_INCREMENT,
  `email` varchar(100) NOT NULL,
  `code` varchar(100) DEFAULT NULL,
  `status` varchar(10) DEFAULT NULL,
  `date_add` datetime NOT NULL,
  PRIMARY KEY (`id_subscriber`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=2 ;

--
-- Dumping data for table `vii_newsletter_subscribers`
--

INSERT INTO `vii_newsletter_subscribers` (`id_subscriber`, `email`, `code`, `status`, `date_add`) VALUES
(1, 'kirby.lagunda@viiworks.com', 'LJT14e7KePle5VQ6mXLCYdLN4lIv+CkR1Y/Tari2BP+VpCGEsJU2eJoAniCBSgJEo2EXd/pH7/FsV5Ef2lXj6A==', '1', '2014-10-16 09:01:50');

-- --------------------------------------------------------

--
-- Table structure for table `vii_news_category`
--

CREATE TABLE IF NOT EXISTS `vii_news_category` (
  `id_news_category` int(11) NOT NULL AUTO_INCREMENT,
  `id_parent` int(11) DEFAULT '0',
  `category_title` text,
  `category_desc` text,
  `category_root` text,
  `status` int(11) DEFAULT '1',
  `date_add` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`id_news_category`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=4 ;

--
-- Dumping data for table `vii_news_category`
--

INSERT INTO `vii_news_category` (`id_news_category`, `id_parent`, `category_title`, `category_desc`, `category_root`, `status`, `date_add`) VALUES
(1, 0, 'Uncategorized', 'Uncategorized', NULL, 1, '2014-05-29 10:46:04'),
(2, 0, 'aaaaa', 'aaaaaaaaaaaa', ' - aaaaa', 1, '2015-08-26 09:52:13'),
(3, 2, 'a.a', 'a.a', 'aaaaa - a.a', 1, '2015-08-26 09:52:26');

-- --------------------------------------------------------

--
-- Table structure for table `vii_news_item`
--

CREATE TABLE IF NOT EXISTS `vii_news_item` (
  `id_news_item` int(11) NOT NULL AUTO_INCREMENT,
  `date` date DEFAULT NULL,
  `image_title` text,
  `link_rewrite` text,
  `image_sub_title` text,
  `image_author` varchar(255) DEFAULT NULL,
  `image_desc` text,
  `image_src` text,
  `image_meta_title` text,
  `image_meta_description` text,
  `image_meta_keywords` text,
  `status` int(11) DEFAULT '0',
  `id_news_category` int(11) DEFAULT '1',
  `date_add` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`id_news_item`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=7 ;

--
-- Dumping data for table `vii_news_item`
--

INSERT INTO `vii_news_item` (`id_news_item`, `date`, `image_title`, `link_rewrite`, `image_sub_title`, `image_author`, `image_desc`, `image_src`, `image_meta_title`, `image_meta_description`, `image_meta_keywords`, `status`, `id_news_category`, `date_add`) VALUES
(1, '2014-08-19', 'Sample Title 4', 'sample_title_4', 'Sample Title 4', 'admin', '<p>Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.<br></p>', '449cbb7d34fbaedaa4c5ffdfec7b3ea7.JPG', 'Sample Meta Title #1 news', 'Sample Meta Description #1 news', 'Sample Meta Keywords #1 news', 1, 1, '2014-08-19 03:14:27'),
(2, '2014-08-20', 'Sample Title 5', 'sample_title_5', 'Sample Title 5', 'admin', '<p>Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.<br></p>', '30cd879df10f860c455c36f4256fd256.JPG', 'Sample  Meta Title #2', 'Sample  Meta Description #2', 'Sample  Meta Keywords #2', 1, 1, '2014-08-19 23:36:22'),
(3, '2015-06-26', 'Sample Title 3', 'sample_title_3', 'Sample Title 3', 'admin', '<p>Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.<br></p>', 'b22b2f818c76b909be51300ae36b27da.JPG', '', '', '', 1, 1, '2015-06-26 00:55:06'),
(4, '2015-06-26', 'Sample Title 6', 'sample_title_6', 'Sample Title 6', 'admin', '<p>Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.<br></p>', '46361f088d02e8ffce2e609e06e039e7.JPG', '', '', '', 1, 1, '2015-06-26 00:55:21'),
(5, '2015-06-26', 'Sample Title 2', 'sample_title_2', 'Sample Title 2', 'admin', '<p>Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.<br></p>', '1300101ce400facc56fa9f4ac9b756f5.JPG', '', '', '', 1, 1, '2015-06-26 00:55:36'),
(6, '2015-06-26', 'Sample Title 1', 'sample_title_1', 'Sample Title 1', 'admin', '<p>Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.<br></p>', '541e63d04f7618237647a6ee61dfb3dc.JPG', '', '', '', 1, 1, '2015-06-26 00:55:51');

-- --------------------------------------------------------

--
-- Table structure for table `vii_page`
--

CREATE TABLE IF NOT EXISTS `vii_page` (
  `id_page` int(11) NOT NULL AUTO_INCREMENT,
  `title` varchar(128) NOT NULL,
  `sort_order` int(5) NOT NULL,
  `content` longtext NOT NULL,
  `image_src` varchar(255) DEFAULT NULL,
  `caption` text,
  `class` varchar(64) NOT NULL,
  `function` varchar(64) NOT NULL,
  `link_rewrite` varchar(128) NOT NULL,
  `absolute_link` varchar(255) NOT NULL,
  `redirect` int(11) DEFAULT NULL,
  `meta_title` varchar(128) NOT NULL,
  `meta_keywords` varchar(255) NOT NULL,
  `meta_description` varchar(255) NOT NULL,
  `meta_image` varchar(255) DEFAULT NULL,
  `custom_theme` varchar(32) NOT NULL,
  `custom_layout` varchar(128) NOT NULL,
  `layout` text,
  `sections` text,
  `isAdmin` tinyint(1) NOT NULL DEFAULT '0',
  `date_add` datetime NOT NULL,
  `date_upd` datetime NOT NULL,
  PRIMARY KEY (`id_page`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=40 ;

--
-- Dumping data for table `vii_page`
--

INSERT INTO `vii_page` (`id_page`, `title`, `sort_order`, `content`, `image_src`, `caption`, `class`, `function`, `link_rewrite`, `absolute_link`, `redirect`, `meta_title`, `meta_keywords`, `meta_description`, `meta_image`, `custom_theme`, `custom_layout`, `layout`, `sections`, `isAdmin`, `date_add`, `date_upd`) VALUES
(20, 'Sample 1.1.3', 14, '<p>Sample 1.1.3 Contents Here<br></p>', NULL, NULL, 'pages', 'index', 'sample113', 'sample113', 1, '', '', '', NULL, 'viidemo', 'inner.template.html', NULL, NULL, 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(19, 'Sample 1.1.2', 13, '<p>Sample 1.1.2 Contents Here<br></p>', NULL, NULL, 'pages', 'index', 'sample112', 'sample112', 1, '', '', '', NULL, 'viidemo', 'inner.template.html', NULL, NULL, 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(18, 'Sample 1.2', 21, '<p>Sample 1.2 Contents Here<br></p>', NULL, NULL, 'pages', 'index', 'sample12', 'sample12', 1, '', '', '', NULL, 'viidemo', 'inner.template.html', NULL, NULL, 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(17, 'Sample 1.1.1', 11, '<p>Sample 1.1.1 Contents Here<br></p>', NULL, NULL, 'pages', 'index', 'sample111', 'sample111', 1, '', '', '', NULL, 'viidemo', 'inner.template.html', NULL, NULL, 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(16, 'Sample 1.1', 12, '<p>Sample 1.1 Contents Here<br></p>', NULL, NULL, 'pages', 'index', 'sample11', 'sample11', 1, '', '', '', NULL, 'viidemo', 'inner.template.html', NULL, NULL, 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(15, 'Sample 1', 16, '<p><span style="font-weight: bold;">Sample 1 Contents Here</span><br></p>', '', '<p><span style="font-weight: bold;">Sample 1 Caption Here</span><br></p>', 'pages', 'index', 'sample1', 'sample1', 1, '', '', '', '', 'viidemo', 'inner.template.html', NULL, NULL, 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(14, 'Testimonials', 8, '', NULL, NULL, 'testimonial', 'index', 'testimonial', 'testimonial', 1, '', '', '', NULL, 'viidemo', 'inner.template.html', NULL, NULL, 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(12, 'Home', 15, '', NULL, NULL, 'pages', 'index', ' ', '', 1, '', '', '', NULL, 'viidemo', 'main.template.html', '{"columns":"4","filename":"layout_template_col4_v9_4","format":"3_3_3_3"}', '{"col0":{"0":{"section_title":"1stcoltitle","section_subtitle":"1stcolsubtitle","section_class":"ignore","isActive":"1","content_type":"page","pages":{"0":"21"},"limit":"","template_name":"item_with_colmd2image_title_caption_description_1"}},"col1":{"0":{"section_title":"2ndcoltitle","section_subtitle":"2ndcolsubtitle","section_class":"","isActive":"1","content_type":"page","pages":{"0":"21"},"limit":"","template_name":"item_with_title_caption_description_image_1"}},"col2":{"0":{"section_title":"3rdtitle","section_subtitle":"3rdsubtitle","section_class":"","isActive":"1","content_type":"page","pages":{"0":"21"},"limit":"","template_name":"item_with_title_caption_description_image_1"}},"col3":{"0":{"section_title":"4thtitle","section_subtitle":"4thsubtitle","section_class":"","isActive":"1","content_type":"page","pages":{"0":"21"},"limit":"","template_name":"item_with_colmd5image_title_caption_description_1"}}}', 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(13, 'Blog', 3, '', NULL, NULL, 'blog', 'index', 'blog', 'blog', 1, '', '', '', NULL, 'viidemo', 'inner.template.html', NULL, NULL, 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(11, 'News', 5, '', NULL, NULL, 'news', 'index', 'news', 'news', 1, '', '', '', NULL, 'viidemo', 'inner.template.html', NULL, NULL, 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(10, 'RSS Feed', 23, '', NULL, NULL, 'rssfeed', 'index', 'rssfeed', 'rssfeed', 1, '', '', '', NULL, 'viidemo', 'rssfeed.template.html', NULL, NULL, 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(6, 'Frequently Asked Questions', 9, '', NULL, NULL, 'faqs', 'index', 'faqs', 'faqs', 1, '', '', '', NULL, 'viidemo', 'inner.template.html', NULL, NULL, 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(7, 'Gallery', 4, '', NULL, NULL, 'gallery', 'index', 'gallery', 'gallery', 1, '', '', '', NULL, 'viidemo', 'inner.template.html', NULL, NULL, 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(4, 'Error Page', 13, ' <div class="container">\n  \n        <div class="row">\n            <div class="col-lg-12 text-center">\n            <div class="well">\n                <h1>Oooops! Something missing</h1>\n                <p class="lead">ERROR 404</p>\n                <p>Fusce imperdiet, risus eget viverra faucibus, diam mi vestibulum libero, ut vestibulum tellus magna nec enim. Nunc dapibus varius interdum.</p>\n            </div>\n            </div>\n        </div>\n        &lt;!-- /.row --&gt;\n\n    </div>', '', '', 'pages', 'error', 'error', 'error', 1, '', '', '', '', 'viidemo', 'inner.template.html', NULL, NULL, 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(1, 'Contact Us', 10, '', '', '', 'contactus', 'index', 'contactus', 'contactus', 1, '', '', '', '', 'viidemo', 'inner.template.html', NULL, NULL, 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(21, 'About Us', 22, '<p>About Us content here. Edit via CMS &gt; Pages &gt; About Us. Lorem ipsum dolor sit amet, consectetur adipiscing elit. Vestibulum \nrisus purus, scelerisque ut nisi vel, egestas congue ex. In pharetra \nurna vitae orci eleifend, commodo congue sem fringilla. Etiam vulputate \npharetra leo, eget congue est. Integer ipsum ligula, euismod id quam a, \nconvallis volutpat nisi. Aliquam erat volutpat. Nullam venenatis erat \ntincidunt sapien volutpat, sed laoreet ante blandit. Aliquam ullamcorper\n erat et aliquam fermentum. Nunc eget tortor eu ipsum finibus vulputate \nut tristique metus. Nam dignissim sollicitudin justo eget imperdiet. \nPellentesque volutpat, erat sed consequat lobortis, augue felis \nmalesuada tortor, in pellentesque dui nisl sed velit. Nullam hendrerit \ndolor non ligula tristique scelerisque quis eget lacus. Nunc convallis \nfaucibus ligula, quis condimentum quam aliquet sed. Pellentesque \nultrices mauris nec velit sagittis hendrerit. Curabitur at rhoncus nisl,\n eget eleifend urna.\n</p>', '11d092cb857bbe2174d0b49315ba866a.jpg', 'Sample banner caption. Edit via CMS &gt; Pages &gt; About Us.', 'pages', 'index', 'about', 'about', 1, 'About Us Meta Title Here', 'About Us Meta Title Keywords', 'About Us Meta Title Description', '3007ec9ee04e1d545ed1ebc28f5e290f.jpg', 'viidemo', 'inner.template.html', '{"columns":"1","filename":"layout_template_col1_v1_1","format":"12_0_0_0"}', '', 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(22, 'Promotion', 7, '', '', '<p><br></p>', 'promo', 'index', 'promo', 'promo', 1, '', '', '', '', 'viidemo', 'inner.template.html', NULL, NULL, 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(23, 'Search', 24, '<p>search<br></p>', NULL, NULL, 'search', 'index', 'search', 'search', 0, '', '', '', NULL, 'viidemo', 'inner.template.html', NULL, NULL, 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(24, 'Newsletter', 25, '', NULL, NULL, 'newsletter', 'index', 'newsletter', 'newsletter', 0, '', '', '', NULL, 'viidemo', 'inner.template.html', NULL, NULL, 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(25, 'Events', 6, '', '', NULL, 'events', 'index', 'events', 'events', 1, '', '', '', NULL, 'viidemo', 'inner.template.html', NULL, NULL, 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(27, 'Elements', 0, '<p><br></p>', '', '<p><br></p>', 'pages', 'index', 'elements', 'elements', 1, '', '', '', '', 'viidemo', 'element.template.html', NULL, NULL, 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(31, 'Font', 1, '<p><br></p>', '', '<p><br></p>', 'pages', 'index', 'font', 'font', 1, '', '', '', '', 'viidemo', 'font.template.html', NULL, NULL, 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(30, 'Form', 2, '<p><br></p>', '', '<p><br></p>', 'pages', 'index', 'form', 'form', 1, '', '', '', '', 'viidemo', 'form.template.html', NULL, NULL, 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(33, 'Privacy Policy', 0, '<p style="margin: 0in 0in 7.5pt; line-height: 15pt; background-image: initial; background-attachment: initial; background-size: initial; background-origin: initial; background-clip: initial; background-position: initial; background-repeat: initial;"><b><span style="font-size:10.5pt;\nfont-family:"Tahoma","sans-serif"">On our site we collect the following:</span></b><span style="font-size:10.5pt;font-family:"Tahoma","sans-serif""><o:p></o:p></span></p><p style="margin: 0in 0in 7.5pt; line-height: 15pt; box-sizing: border-box; background-image: initial; background-attachment: initial; background-size: initial; background-origin: initial; background-clip: initial; background-position: initial; background-repeat: initial;"><span style="font-size:10.5pt;font-family:"Tahoma","sans-serif"">Name<o:p></o:p></span></p><p style="margin: 0in 0in 7.5pt; line-height: 15pt; box-sizing: border-box; background-image: initial; background-attachment: initial; background-size: initial; background-origin: initial; background-clip: initial; background-position: initial; background-repeat: initial;"><span style="font-size:10.5pt;font-family:"Tahoma","sans-serif"">Email address<o:p></o:p></span></p><p style="margin: 0in 0in 7.5pt; line-height: 15pt; box-sizing: border-box; background-image: initial; background-attachment: initial; background-size: initial; background-origin: initial; background-clip: initial; background-position: initial; background-repeat: initial;"><span style="font-size:10.5pt;font-family:"Tahoma","sans-serif"">Phone number<o:p></o:p></span></p><p style="margin: 0in 0in 7.5pt; line-height: 15pt; box-sizing: border-box; background-image: initial; background-attachment: initial; background-size: initial; background-origin: initial; background-clip: initial; background-position: initial; background-repeat: initial;"><span style="font-size:10.5pt;font-family:"Tahoma","sans-serif""><o:p>&nbsp;</o:p></span></p><p style="margin: 0in 0in 7.5pt; line-height: 15pt; box-sizing: border-box; background-image: initial; background-attachment: initial; background-size: initial; background-origin: initial; background-clip: initial; background-position: initial; background-repeat: initial;"><span style="box-sizing: border-box"><b><span style="font-size:10.5pt;font-family:\n"Tahoma","sans-serif"">Information is collected from you when you:</span></b></span><span style="font-size:10.5pt;font-family:"Tahoma","sans-serif""><o:p></o:p></span></p><p style="margin: 0in 0in 7.5pt; line-height: 15pt; box-sizing: border-box; background-image: initial; background-attachment: initial; background-size: initial; background-origin: initial; background-clip: initial; background-position: initial; background-repeat: initial;"><span style="font-size:10.5pt;font-family:"Tahoma","sans-serif"">Register on our site<o:p></o:p></span></p><p style="margin: 0in 0in 7.5pt; line-height: 15pt; box-sizing: border-box; background-image: initial; background-attachment: initial; background-size: initial; background-origin: initial; background-clip: initial; background-position: initial; background-repeat: initial;"><span style="font-size:10.5pt;font-family:"Tahoma","sans-serif"">Subscribe to a\nnewsletter<o:p></o:p></span></p><p style="margin: 0in 0in 7.5pt; line-height: 15pt; box-sizing: border-box; background-image: initial; background-attachment: initial; background-size: initial; background-origin: initial; background-clip: initial; background-position: initial; background-repeat: initial;"><span style="font-size:10.5pt;font-family:"Tahoma","sans-serif""><o:p>&nbsp;</o:p></span></p><p style="margin: 0in 0in 7.5pt; line-height: 15pt; box-sizing: border-box; background-image: initial; background-attachment: initial; background-size: initial; background-origin: initial; background-clip: initial; background-position: initial; background-repeat: initial;"><span style="box-sizing: border-box"><b><span style="font-size:10.5pt;font-family:\n"Tahoma","sans-serif"">The information collected from you is used in the\nfollowing ways:</span></b></span><span style="font-size:10.5pt;font-family:\n"Tahoma","sans-serif""><o:p></o:p></span></p><p style="margin: 0in 0in 7.5pt; line-height: 15pt; box-sizing: border-box; background-image: initial; background-attachment: initial; background-size: initial; background-origin: initial; background-clip: initial; background-position: initial; background-repeat: initial;"><span style="font-size:10.5pt;font-family:"Tahoma","sans-serif"">To personalize\nuser''s experience<o:p></o:p></span></p><p style="margin: 0in 0in 7.5pt; line-height: 15pt; box-sizing: border-box; background-image: initial; background-attachment: initial; background-size: initial; background-origin: initial; background-clip: initial; background-position: initial; background-repeat: initial;"><span style="font-size:10.5pt;font-family:"Tahoma","sans-serif"">To improve customer\nservice<o:p></o:p></span></p><p style="margin: 0in 0in 7.5pt; line-height: 15pt; box-sizing: border-box; background-image: initial; background-attachment: initial; background-size: initial; background-origin: initial; background-clip: initial; background-position: initial; background-repeat: initial;"><span style="font-size:10.5pt;font-family:"Tahoma","sans-serif"">To process\ntransactions<o:p></o:p></span></p><p style="margin: 0in 0in 7.5pt; line-height: 15pt; box-sizing: border-box; background-image: initial; background-attachment: initial; background-size: initial; background-origin: initial; background-clip: initial; background-position: initial; background-repeat: initial;"><span style="font-size:10.5pt;font-family:"Tahoma","sans-serif""><o:p>&nbsp;</o:p></span></p><p style="margin: 0in 0in 7.5pt; line-height: 15pt; box-sizing: border-box; background-image: initial; background-attachment: initial; background-size: initial; background-origin: initial; background-clip: initial; background-position: initial; background-repeat: initial;"><span style="box-sizing: border-box"><b><span style="font-size:10.5pt;font-family:\n"Tahoma","sans-serif"">Do we use ''cookies''?</span></b></span><span style="font-size:10.5pt;font-family:"Tahoma","sans-serif""><o:p></o:p></span></p><p style="margin: 0in 0in 7.5pt; line-height: 15pt; box-sizing: border-box; background-image: initial; background-attachment: initial; background-size: initial; background-origin: initial; background-clip: initial; background-position: initial; background-repeat: initial;"><span style="font-size:10.5pt;font-family:"Tahoma","sans-serif"">We do not use\ncookies for tracking purposes<o:p></o:p></span></p><p style="margin: 0in 0in 7.5pt; line-height: 15pt; box-sizing: border-box; background-image: initial; background-attachment: initial; background-size: initial; background-origin: initial; background-clip: initial; background-position: initial; background-repeat: initial;"><span style="font-size:10.5pt;font-family:"Tahoma","sans-serif""><o:p>&nbsp;</o:p></span></p><p style="margin: 0in 0in 7.5pt; line-height: 15pt; box-sizing: border-box; background-image: initial; background-attachment: initial; background-size: initial; background-origin: initial; background-clip: initial; background-position: initial; background-repeat: initial;"><span style="box-sizing: border-box"><b><span style="font-size:10.5pt;font-family:\n"Tahoma","sans-serif"">Third Party Disclosure</span></b></span><span style="font-size:10.5pt;font-family:"Tahoma","sans-serif""><o:p></o:p></span></p><p style="margin: 0in 0in 7.5pt; line-height: 15pt; box-sizing: border-box; background-image: initial; background-attachment: initial; background-size: initial; background-origin: initial; background-clip: initial; background-position: initial; background-repeat: initial;"><span style="font-size:10.5pt;font-family:"Tahoma","sans-serif"">We do not sell,\ntrade, or otherwise transfer Personally Identifiable Information.<o:p></o:p></span></p><p style="margin: 0in 0in 7.5pt; line-height: 15pt; box-sizing: border-box; background-image: initial; background-attachment: initial; background-size: initial; background-origin: initial; background-clip: initial; background-position: initial; background-repeat: initial;"><span style="font-size:10.5pt;font-family:"Tahoma","sans-serif""><o:p>&nbsp;</o:p></span></p><p style="margin: 0in 0in 7.5pt; line-height: 15pt; box-sizing: border-box; background-image: initial; background-attachment: initial; background-size: initial; background-origin: initial; background-clip: initial; background-position: initial; background-repeat: initial;"><span style="box-sizing: border-box"><b><span style="font-size:10.5pt;font-family:\n"Tahoma","sans-serif"">Third party links</span></b></span><span style="font-size:10.5pt;font-family:"Tahoma","sans-serif""><o:p></o:p></span></p><p style="margin: 0in 0in 7.5pt; line-height: 15pt; box-sizing: border-box; background-image: initial; background-attachment: initial; background-size: initial; background-origin: initial; background-clip: initial; background-position: initial; background-repeat: initial;"><span style="font-size:10.5pt;font-family:"Tahoma","sans-serif"">We do not include or\noffer third party products or services on our website.<o:p></o:p></span></p><p style="margin: 0in 0in 7.5pt; line-height: 15pt; box-sizing: border-box; background-image: initial; background-attachment: initial; background-size: initial; background-origin: initial; background-clip: initial; background-position: initial; background-repeat: initial;"><span style="font-size:10.5pt;font-family:"Tahoma","sans-serif""><o:p>&nbsp;</o:p></span></p><p style="margin: 0in 0in 7.5pt; line-height: 15pt; box-sizing: border-box; background-image: initial; background-attachment: initial; background-size: initial; background-origin: initial; background-clip: initial; background-position: initial; background-repeat: initial;"><span style="box-sizing: border-box"><b><span style="font-size:10.5pt;font-family:\n"Tahoma","sans-serif"">Google</span></b></span><span style="font-size:10.5pt;\nfont-family:"Tahoma","sans-serif""><o:p></o:p></span></p><p style="margin: 0in 0in 7.5pt; line-height: 15pt; box-sizing: border-box; background-image: initial; background-attachment: initial; background-size: initial; background-origin: initial; background-clip: initial; background-position: initial; background-repeat: initial;"><span style="font-size:10.5pt;font-family:"Tahoma","sans-serif"">We have not enable\nGoogle Adwords on our site but we may do so on the future.<o:p></o:p></span></p><p style="margin: 0in 0in 7.5pt; line-height: 15pt; box-sizing: border-box; background-image: initial; background-attachment: initial; background-size: initial; background-origin: initial; background-clip: initial; background-position: initial; background-repeat: initial;"><span style="font-size:10.5pt;font-family:"Tahoma","sans-serif""><o:p>&nbsp;</o:p></span></p><p style="margin: 0in 0in 7.5pt; line-height: 15pt; box-sizing: border-box; background-image: initial; background-attachment: initial; background-size: initial; background-origin: initial; background-clip: initial; background-position: initial; background-repeat: initial;"><span style="box-sizing: border-box"><b><span style="font-size:10.5pt;font-family:\n"Tahoma","sans-serif"">Users will be notified of any privacy policy changes:</span></b></span><span style="font-size:10.5pt;font-family:"Tahoma","sans-serif""><o:p></o:p></span></p><p style="margin: 0in 0in 7.5pt; line-height: 15pt; box-sizing: border-box; background-image: initial; background-attachment: initial; background-size: initial; background-origin: initial; background-clip: initial; background-position: initial; background-repeat: initial;"><span style="font-size:10.5pt;font-family:"Tahoma","sans-serif"">On our Privacy\nPolicy Page<o:p></o:p></span></p><p style="margin: 0in 0in 7.5pt; line-height: 15pt; box-sizing: border-box; background-image: initial; background-attachment: initial; background-size: initial; background-origin: initial; background-clip: initial; background-position: initial; background-repeat: initial;"><span style="font-size:10.5pt;font-family:"Tahoma","sans-serif""><o:p>&nbsp;</o:p></span></p><p style="margin: 0in 0in 7.5pt; line-height: 15pt; box-sizing: border-box; background-image: initial; background-attachment: initial; background-size: initial; background-origin: initial; background-clip: initial; background-position: initial; background-repeat: initial;"><span style="box-sizing: border-box"><b><span style="font-size:10.5pt;font-family:\n"Tahoma","sans-serif"">How does our site handle do not track signals?</span></b></span><span style="font-size:10.5pt;font-family:"Tahoma","sans-serif""><o:p></o:p></span></p><p style="margin: 0in 0in 7.5pt; line-height: 15pt; box-sizing: border-box; background-image: initial; background-attachment: initial; background-size: initial; background-origin: initial; background-clip: initial; background-position: initial; background-repeat: initial;"><span style="font-size:10.5pt;font-family:"Tahoma","sans-serif"">We honor them and do\nnot track, plant cookies, or use advertising when a Do Not Track (DNT) browser\nmechanism is in place.<o:p></o:p></span></p><p style="margin: 0in 0in 7.5pt; line-height: 15pt; box-sizing: border-box; background-image: initial; background-attachment: initial; background-size: initial; background-origin: initial; background-clip: initial; background-position: initial; background-repeat: initial;"><span style="font-size:10.5pt;font-family:"Tahoma","sans-serif""><o:p>&nbsp;</o:p></span></p><p style="margin: 0in 0in 7.5pt; line-height: 15pt; box-sizing: border-box; background-image: initial; background-attachment: initial; background-size: initial; background-origin: initial; background-clip: initial; background-position: initial; background-repeat: initial;"><span style="box-sizing: border-box"><b><span style="font-size:10.5pt;font-family:\n"Tahoma","sans-serif"">Does our site allow third party behavioral tracking?</span></b></span><span style="font-size:10.5pt;font-family:"Tahoma","sans-serif""><o:p></o:p></span></p><p style="margin: 0in 0in 7.5pt; line-height: 15pt; box-sizing: border-box; background-image: initial; background-attachment: initial; background-size: initial; background-origin: initial; background-clip: initial; background-position: initial; background-repeat: initial;"><span style="font-size:10.5pt;font-family:"Tahoma","sans-serif"">We do not allow<o:p></o:p></span></p><p style="margin: 0in 0in 7.5pt; line-height: 15pt; box-sizing: border-box; background-image: initial; background-attachment: initial; background-size: initial; background-origin: initial; background-clip: initial; background-position: initial; background-repeat: initial;"><span style="font-size:10.5pt;font-family:"Tahoma","sans-serif""><o:p>&nbsp;</o:p></span></p><p style="margin: 0in 0in 7.5pt; line-height: 15pt; box-sizing: border-box; background-image: initial; background-attachment: initial; background-size: initial; background-origin: initial; background-clip: initial; background-position: initial; background-repeat: initial;"><span style="box-sizing: border-box"><b><span style="font-size:10.5pt;font-family:\n"Tahoma","sans-serif"">COPPA (Children Online Privacy Protection Act)</span></b></span><span style="font-size:10.5pt;font-family:"Tahoma","sans-serif""><o:p></o:p></span></p><p style="margin: 0in 0in 7.5pt; line-height: 15pt; box-sizing: border-box; background-image: initial; background-attachment: initial; background-size: initial; background-origin: initial; background-clip: initial; background-position: initial; background-repeat: initial;"><span style="font-size:10.5pt;font-family:"Tahoma","sans-serif"">We do not specifically\nmarket to children under 13<o:p></o:p></span></p><p style="margin: 0in 0in 7.5pt; line-height: 15pt; box-sizing: border-box; background-image: initial; background-attachment: initial; background-size: initial; background-origin: initial; background-clip: initial; background-position: initial; background-repeat: initial;"><span style="font-size:10.5pt;font-family:"Tahoma","sans-serif""><o:p>&nbsp;</o:p></span></p><p style="margin: 0in 0in 7.5pt; line-height: 15pt; box-sizing: border-box; background-image: initial; background-attachment: initial; background-size: initial; background-origin: initial; background-clip: initial; background-position: initial; background-repeat: initial;"><span style="box-sizing: border-box"><b><span style="font-size:10.5pt;font-family:\n"Tahoma","sans-serif"">Fair Information Practices</span></b></span><span style="font-size:10.5pt;font-family:"Tahoma","sans-serif""><o:p></o:p></span></p><p style="margin: 0in 0in 7.5pt; line-height: 15pt; box-sizing: border-box; background-image: initial; background-attachment: initial; background-size: initial; background-origin: initial; background-clip: initial; background-position: initial; background-repeat: initial;"><span style="font-size:10.5pt;font-family:"Tahoma","sans-serif"">In order to be in\nline with Fair Information Practices we will take the following responsive\naction, should a data breach occur:<o:p></o:p></span></p><p style="margin: 0in 0in 7.5pt; line-height: 15pt; box-sizing: border-box; background-image: initial; background-attachment: initial; background-size: initial; background-origin: initial; background-clip: initial; background-position: initial; background-repeat: initial;"><span style="box-sizing: border-box"><b><span style="font-size:10.5pt;font-family:\n"Tahoma","sans-serif"">We will notify the users via email</span></b></span><span style="font-size:10.5pt;font-family:"Tahoma","sans-serif""><o:p></o:p></span></p><p style="margin: 0in 0in 7.5pt; line-height: 15pt; box-sizing: border-box; background-image: initial; background-attachment: initial; background-size: initial; background-origin: initial; background-clip: initial; background-position: initial; background-repeat: initial;"><span style="font-size:10.5pt;font-family:"Tahoma","sans-serif"">&nbsp; &nbsp; &nbsp;\n• Within 7 business days<o:p></o:p></span></p><p style="margin: 0in 0in 7.5pt; line-height: 15pt; box-sizing: border-box; background-image: initial; background-attachment: initial; background-size: initial; background-origin: initial; background-clip: initial; background-position: initial; background-repeat: initial;"><span style="box-sizing: border-box"><b><span style="font-size:10.5pt;font-family:\n"Tahoma","sans-serif"">We will notify the users via in site notification</span></b></span><span style="font-size:10.5pt;font-family:"Tahoma","sans-serif""><o:p></o:p></span></p><p style="margin: 0in 0in 7.5pt; line-height: 15pt; box-sizing: border-box; background-image: initial; background-attachment: initial; background-size: initial; background-origin: initial; background-clip: initial; background-position: initial; background-repeat: initial;"><span style="font-size:10.5pt;font-family:"Tahoma","sans-serif"">&nbsp; &nbsp; &nbsp;\n• Within 7 business days<o:p></o:p></span></p><p style="margin: 0in 0in 7.5pt; line-height: 15pt; box-sizing: border-box; background-image: initial; background-attachment: initial; background-size: initial; background-origin: initial; background-clip: initial; background-position: initial; background-repeat: initial;"><span style="font-size:10.5pt;font-family:"Tahoma","sans-serif"">We agree to the\nindividual redress principle, which requires that individuals have a right to\npursue legally enforceable rights against data collectors and processors who\nfail to adhere to the law. This principle requires not only that individuals\nhave enforceable rights against data users, but also that individuals have\nrecourse to courts or a government agency to investigate and/or prosecute\nnon-compliance by data processors.<o:p></o:p></span></p><p style="margin: 0in 0in 7.5pt; line-height: 15pt; box-sizing: border-box; background-image: initial; background-attachment: initial; background-size: initial; background-origin: initial; background-clip: initial; background-position: initial; background-repeat: initial;"><span style="font-size:10.5pt;font-family:"Tahoma","sans-serif""><o:p>&nbsp;</o:p></span></p><p style="margin: 0in 0in 7.5pt; line-height: 15pt; box-sizing: border-box; background-image: initial; background-attachment: initial; background-size: initial; background-origin: initial; background-clip: initial; background-position: initial; background-repeat: initial;"><span style="box-sizing: border-box"><b><span style="font-size:10.5pt;font-family:\n"Tahoma","sans-serif"">Contact Information</span></b></span><span style="font-size:10.5pt;font-family:"Tahoma","sans-serif""><o:p></o:p></span></p><p style="margin: 0in 0in 7.5pt; line-height: 15pt; box-sizing: border-box; background-image: initial; background-attachment: initial; background-size: initial; background-origin: initial; background-clip: initial; background-position: initial; background-repeat: initial;"><span style="font-size:10.5pt;font-family:"Tahoma","sans-serif"">&nbsp;<o:p></o:p></span></p><p style="margin: 0in 0in 7.5pt; line-height: 15pt; box-sizing: border-box; background-image: initial; background-attachment: initial; background-size: initial; background-origin: initial; background-clip: initial; background-position: initial; background-repeat: initial;"><span style="box-sizing: border-box"><b><span style="font-size:10.5pt;font-family:\n"Tahoma","sans-serif"">Address:</span></b></span><span style="font-size:10.5pt;\nfont-family:"Tahoma","sans-serif"">&nbsp;Unit G104, West of Ayala Tower, 252\nSen. Gil Puyat Avenue, Makati City, 1223<o:p></o:p></span></p><p style="margin: 0in 0in 7.5pt; line-height: 15pt; box-sizing: border-box; background-image: initial; background-attachment: initial; background-size: initial; background-origin: initial; background-clip: initial; background-position: initial; background-repeat: initial;"><span style="box-sizing: border-box"><b><span style="font-size:10.5pt;font-family:\n"Tahoma","sans-serif"">Phone:</span></b></span><span style="font-size:10.5pt;\nfont-family:"Tahoma","sans-serif"">&nbsp;+63.2.12.34.56<o:p></o:p></span></p><p style="margin: 0in 0in 7.5pt; line-height: 15pt; box-sizing: border-box; background-image: initial; background-attachment: initial; background-size: initial; background-origin: initial; background-clip: initial; background-position: initial; background-repeat: initial;"><span style="box-sizing: border-box"><b><span style="font-size:10.5pt;font-family:\n"Tahoma","sans-serif"">Fax:</span></b></span><span style="font-size:10.5pt;\nfont-family:"Tahoma","sans-serif"">&nbsp;+63.123.456.78.910<o:p></o:p></span></p><p style="margin: 0in 0in 7.5pt; line-height: 15pt; box-sizing: border-box; background-image: initial; background-attachment: initial; background-size: initial; background-origin: initial; background-clip: initial; background-position: initial; background-repeat: initial;"><span style="box-sizing: border-box"><b><span style="font-size:10.5pt;font-family:\n"Tahoma","sans-serif"">Email:</span></b></span><span style="font-size:10.5pt;\nfont-family:"Tahoma","sans-serif"">&nbsp;test@gmail.com<o:p></o:p></span></p><p style="box-sizing: border-box; color: rgb(83, 91, 96); font-family: tahoma; font-size: 14px;">\n\n\n\n\n\n\n\n\n\n\n\n\n\n\n\n\n\n\n\n\n\n\n\n\n\n\n\n\n\n\n\n\n\n\n\n\n\n\n\n\n\n\n\n\n\n\n\n\n\n\n\n\n\n\n\n\n\n\n\n\n\n\n\n\n\n\n\n\n\n\n\n\n\n\n\n\n\n\n\n\n\n\n\n\n\n\n\n\n\n\n\n\n\n\n\n\n\n\n\n\n\n\n\n</p><p class="MsoNormal"><o:p>&nbsp;</o:p></p>', '', '<p><br></p>', 'pages', 'index', 'privacypolicy', 'privacypolicy', 1, '', '', '', '', 'viidemo', 'inner.template.html', NULL, NULL, 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00');
INSERT INTO `vii_page` (`id_page`, `title`, `sort_order`, `content`, `image_src`, `caption`, `class`, `function`, `link_rewrite`, `absolute_link`, `redirect`, `meta_title`, `meta_keywords`, `meta_description`, `meta_image`, `custom_theme`, `custom_layout`, `layout`, `sections`, `isAdmin`, `date_add`, `date_upd`) VALUES
(34, 'Terms and Condition', 1, '<p style="margin: 0in 0in 7.5pt; line-height: 15pt; background-image: initial; background-attachment: initial; background-size: initial; background-origin: initial; background-clip: initial; background-position: initial; background-repeat: initial;"><b><span style="font-size:10.5pt;\nfont-family:"Tahoma","sans-serif"">Terms and Conditions of Use of (WEBSITE\nTITLE).</span></b><span style="font-size:10.5pt;font-family:"Tahoma","sans-serif""><o:p></o:p></span></p><p style="margin: 0in 0in 7.5pt; line-height: 15pt; box-sizing: border-box; background-image: initial; background-attachment: initial; background-size: initial; background-origin: initial; background-clip: initial; background-position: initial; background-repeat: initial;"><span style="font-size:10.5pt;font-family:"Tahoma","sans-serif"">&nbsp;<o:p></o:p></span></p><p style="margin: 0in 0in 7.5pt; line-height: 15pt; box-sizing: border-box; background-image: initial; background-attachment: initial; background-size: initial; background-origin: initial; background-clip: initial; background-position: initial; background-repeat: initial;"><span style="box-sizing: border-box"><b><span style="font-size:10.5pt;font-family:\n"Tahoma","sans-serif"">1 &nbsp;Acceptance The Use Of&nbsp;(WEBSITE\nTITLE)&nbsp;Terms and Conditions</span></b></span><span style="font-size:10.5pt;\nfont-family:"Tahoma","sans-serif""><o:p></o:p></span></p><p style="margin: 0in 0in 7.5pt; line-height: 15pt; box-sizing: border-box; background-image: initial; background-attachment: initial; background-size: initial; background-origin: initial; background-clip: initial; background-position: initial; background-repeat: initial;"><span style="font-size:10.5pt;font-family:"Tahoma","sans-serif"">&nbsp;<o:p></o:p></span></p><p style="margin: 0in 0in 7.5pt; line-height: 15pt; box-sizing: border-box; background-image: initial; background-attachment: initial; background-size: initial; background-origin: initial; background-clip: initial; background-position: initial; background-repeat: initial;"><span style="font-size:10.5pt;font-family:"Tahoma","sans-serif"">Your access to and\nuse of PDBTech Enterprise Inc. is subject exclusively to these Terms and\nConditions. You will not use the Website for any purpose that is unlawful or\nprohibited by these Terms and Conditions. By using the Website you are fully\naccepting the terms, conditions and disclaimers contained in this notice. If\nyou do not accept these Terms and Conditions you must immediately stop using\nthe Website.<o:p></o:p></span></p><p style="margin: 0in 0in 7.5pt; line-height: 15pt; box-sizing: border-box; background-image: initial; background-attachment: initial; background-size: initial; background-origin: initial; background-clip: initial; background-position: initial; background-repeat: initial;"><span style="font-size:10.5pt;font-family:"Tahoma","sans-serif"">&nbsp;<o:p></o:p></span></p><p style="margin: 0in 0in 7.5pt; line-height: 15pt; box-sizing: border-box; background-image: initial; background-attachment: initial; background-size: initial; background-origin: initial; background-clip: initial; background-position: initial; background-repeat: initial;"><span style="box-sizing: border-box"><b><span style="font-size:10.5pt;font-family:\n"Tahoma","sans-serif"">2 Credit Card</span></b></span><span style="font-size:\n10.5pt;font-family:"Tahoma","sans-serif""><o:p></o:p></span></p><p style="margin: 0in 0in 7.5pt; line-height: 15pt; box-sizing: border-box; background-image: initial; background-attachment: initial; background-size: initial; background-origin: initial; background-clip: initial; background-position: initial; background-repeat: initial;"><span style="font-size:10.5pt;font-family:"Tahoma","sans-serif"">&nbsp;<o:p></o:p></span></p><p style="margin: 0in 0in 7.5pt; line-height: 15pt; box-sizing: border-box; background-image: initial; background-attachment: initial; background-size: initial; background-origin: initial; background-clip: initial; background-position: initial; background-repeat: initial;"><span style="font-size:10.5pt;font-family:"Tahoma","sans-serif"">Details (WEBSITE\nTITLE) will never ask for Credit Card details and request that you do not enter\nit on any of the forms on PDBTech Enterprise Inc..<o:p></o:p></span></p><p style="margin: 0in 0in 7.5pt; line-height: 15pt; box-sizing: border-box; background-image: initial; background-attachment: initial; background-size: initial; background-origin: initial; background-clip: initial; background-position: initial; background-repeat: initial;"><span style="font-size:10.5pt;font-family:"Tahoma","sans-serif"">&nbsp;<o:p></o:p></span></p><p style="margin: 0in 0in 7.5pt; line-height: 15pt; box-sizing: border-box; background-image: initial; background-attachment: initial; background-size: initial; background-origin: initial; background-clip: initial; background-position: initial; background-repeat: initial;"><span style="box-sizing: border-box"><b><span style="font-size:10.5pt;font-family:\n"Tahoma","sans-serif"">3 &nbsp;Advice</span></b></span><span style="font-size:\n10.5pt;font-family:"Tahoma","sans-serif""><o:p></o:p></span></p><p style="margin: 0in 0in 7.5pt; line-height: 15pt; box-sizing: border-box; background-image: initial; background-attachment: initial; background-size: initial; background-origin: initial; background-clip: initial; background-position: initial; background-repeat: initial;"><span style="font-size:10.5pt;font-family:"Tahoma","sans-serif"">&nbsp;<o:p></o:p></span></p><p style="margin: 0in 0in 7.5pt; line-height: 15pt; box-sizing: border-box; background-image: initial; background-attachment: initial; background-size: initial; background-origin: initial; background-clip: initial; background-position: initial; background-repeat: initial;"><span style="font-size:10.5pt;font-family:"Tahoma","sans-serif"">The contents\nof&nbsp;(WEBSITE TITLE)&nbsp;website do not constitute advice and should not be\nrelied upon in making or refraining from making, any decision.<o:p></o:p></span></p><p style="margin: 0in 0in 7.5pt; line-height: 15pt; box-sizing: border-box; background-image: initial; background-attachment: initial; background-size: initial; background-origin: initial; background-clip: initial; background-position: initial; background-repeat: initial;"><span style="font-size:10.5pt;font-family:"Tahoma","sans-serif"">&nbsp;<o:p></o:p></span></p><p style="margin: 0in 0in 7.5pt; line-height: 15pt; box-sizing: border-box; background-image: initial; background-attachment: initial; background-size: initial; background-origin: initial; background-clip: initial; background-position: initial; background-repeat: initial;"><span style="box-sizing: border-box"><b><span style="font-size:10.5pt;font-family:\n"Tahoma","sans-serif"">4 &nbsp;Change of Use</span></b></span><span style="font-size:10.5pt;font-family:"Tahoma","sans-serif""><o:p></o:p></span></p><p style="margin: 0in 0in 7.5pt; line-height: 15pt; box-sizing: border-box; background-image: initial; background-attachment: initial; background-size: initial; background-origin: initial; background-clip: initial; background-position: initial; background-repeat: initial;"><span style="font-size:10.5pt;font-family:"Tahoma","sans-serif"">&nbsp;<o:p></o:p></span></p><p style="margin: 0in 0in 7.5pt; line-height: 15pt; box-sizing: border-box; background-image: initial; background-attachment: initial; background-size: initial; background-origin: initial; background-clip: initial; background-position: initial; background-repeat: initial;"><span style="box-sizing: border-box"><b><span style="font-size:10.5pt;font-family:\n"Tahoma","sans-serif"">PDBTech Enterprise Inc. reserves the right to:</span></b></span><span style="font-size:10.5pt;font-family:"Tahoma","sans-serif""><o:p></o:p></span></p><p style="margin: 0in 0in 7.5pt; line-height: 15pt; box-sizing: border-box; background-image: initial; background-attachment: initial; background-size: initial; background-origin: initial; background-clip: initial; background-position: initial; background-repeat: initial;"><span style="box-sizing: border-box"><b><span style="font-size:10.5pt;font-family:\n"Tahoma","sans-serif"">4.1</span></b></span><span style="font-size:10.5pt;\nfont-family:"Tahoma","sans-serif"">&nbsp;&nbsp;change or remove (temporarily or\npermanently) the Website or any part of it without notice and you confirm\nthat&nbsp;(WEBSITE TITLE)&nbsp;shall not be liable to&nbsp;you for any such\nchange or removal and.<o:p></o:p></span></p><p style="margin: 0in 0in 7.5pt; line-height: 15pt; box-sizing: border-box; background-image: initial; background-attachment: initial; background-size: initial; background-origin: initial; background-clip: initial; background-position: initial; background-repeat: initial;"><span style="box-sizing: border-box"><b><span style="font-size:10.5pt;font-family:\n"Tahoma","sans-serif"">4.2</span></b></span><span style="font-size:10.5pt;\nfont-family:"Tahoma","sans-serif"">&nbsp;&nbsp;change these Terms and\nConditions at any time, and your continued use of the Website following any\nchanges shall be deemed to be your acceptance of such change.<o:p></o:p></span></p><p style="margin: 0in 0in 7.5pt; line-height: 15pt; box-sizing: border-box; background-image: initial; background-attachment: initial; background-size: initial; background-origin: initial; background-clip: initial; background-position: initial; background-repeat: initial;"><span style="font-size:10.5pt;font-family:"Tahoma","sans-serif"">&nbsp;<o:p></o:p></span></p><p style="margin: 0in 0in 7.5pt; line-height: 15pt; box-sizing: border-box; background-image: initial; background-attachment: initial; background-size: initial; background-origin: initial; background-clip: initial; background-position: initial; background-repeat: initial;"><span style="box-sizing: border-box"><b><span style="font-size:10.5pt;font-family:\n"Tahoma","sans-serif"">5 &nbsp;Links to Third Party Websites</span></b></span><span style="font-size:10.5pt;font-family:"Tahoma","sans-serif""><o:p></o:p></span></p><p style="margin: 0in 0in 7.5pt; line-height: 15pt; box-sizing: border-box; background-image: initial; background-attachment: initial; background-size: initial; background-origin: initial; background-clip: initial; background-position: initial; background-repeat: initial;"><span style="font-size:10.5pt;font-family:"Tahoma","sans-serif"">&nbsp;<o:p></o:p></span></p><p style="margin: 0in 0in 7.5pt; line-height: 15pt; box-sizing: border-box; background-image: initial; background-attachment: initial; background-size: initial; background-origin: initial; background-clip: initial; background-position: initial; background-repeat: initial;"><span style="font-size:10.5pt;font-family:"Tahoma","sans-serif"">PDBTech Enterprise\nInc. Website may include links to third party websites that are controlled and\nmaintained by others. Any link to other websites is not an endorsement of such\nwebsites and you acknowledge and agree that we are not responsible for the\ncontent or availability of any such sites.<o:p></o:p></span></p><p style="margin: 0in 0in 7.5pt; line-height: 15pt; box-sizing: border-box; background-image: initial; background-attachment: initial; background-size: initial; background-origin: initial; background-clip: initial; background-position: initial; background-repeat: initial;"><span style="font-size:10.5pt;font-family:"Tahoma","sans-serif"">&nbsp;<o:p></o:p></span></p><p style="margin: 0in 0in 7.5pt; line-height: 15pt; box-sizing: border-box; background-image: initial; background-attachment: initial; background-size: initial; background-origin: initial; background-clip: initial; background-position: initial; background-repeat: initial;"><span style="box-sizing: border-box"><b><span style="font-size:10.5pt;font-family:\n"Tahoma","sans-serif"">6 &nbsp;Copyright</span></b></span><span style="font-size:10.5pt;font-family:"Tahoma","sans-serif""><o:p></o:p></span></p><p style="margin: 0in 0in 7.5pt; line-height: 15pt; box-sizing: border-box; background-image: initial; background-attachment: initial; background-size: initial; background-origin: initial; background-clip: initial; background-position: initial; background-repeat: initial;"><span style="font-size:10.5pt;font-family:"Tahoma","sans-serif"">&nbsp;<o:p></o:p></span></p><p style="margin: 0in 0in 7.5pt; line-height: 15pt; box-sizing: border-box; background-image: initial; background-attachment: initial; background-size: initial; background-origin: initial; background-clip: initial; background-position: initial; background-repeat: initial;"><span style="box-sizing: border-box"><b><span style="font-size:10.5pt;font-family:\n"Tahoma","sans-serif"">6.1</span></b></span><span style="font-size:10.5pt;\nfont-family:"Tahoma","sans-serif"">&nbsp;&nbsp;All copyright, trade marks and\nall other intellectual property rights in the Website and its content\n(including without limitation the Website design, text, graphics and all\nsoftware and source codes connected with the Website) are owned by or licensed\nto&nbsp;(WEBSITE TITLE). or otherwise used&nbsp;by&nbsp;(WEBSITE TITLE)&nbsp;as\npermitted by law.<o:p></o:p></span></p><p style="margin: 0in 0in 7.5pt; line-height: 15pt; box-sizing: border-box; background-image: initial; background-attachment: initial; background-size: initial; background-origin: initial; background-clip: initial; background-position: initial; background-repeat: initial;"><span style="box-sizing: border-box"><b><span style="font-size:10.5pt;font-family:\n"Tahoma","sans-serif"">6.2</span></b></span><span style="font-size:10.5pt;\nfont-family:"Tahoma","sans-serif"">&nbsp;&nbsp;In accessing the Website you\nagree that you will access the content solely for your personal, non-commercial\nuse. None of the content may be downloaded, copied, reproduced, transmitted,\nstored, sold or distributed without the prior written consent of the copyright\nholder. This excludes the downloading, copying and/or printing of pages of the\nWebsite for personal, non-commercial home use only.<o:p></o:p></span></p><p style="margin: 0in 0in 7.5pt; line-height: 15pt; box-sizing: border-box; background-image: initial; background-attachment: initial; background-size: initial; background-origin: initial; background-clip: initial; background-position: initial; background-repeat: initial;"><span style="font-size:10.5pt;font-family:"Tahoma","sans-serif"">&nbsp;<o:p></o:p></span></p><p style="margin: 0in 0in 7.5pt; line-height: 15pt; box-sizing: border-box; background-image: initial; background-attachment: initial; background-size: initial; background-origin: initial; background-clip: initial; background-position: initial; background-repeat: initial;"><span style="box-sizing: border-box"><b><span style="font-size:10.5pt;font-family:\n"Tahoma","sans-serif"">7 &nbsp;Disclaimers and Limitation of Liability</span></b></span><span style="font-size:10.5pt;font-family:"Tahoma","sans-serif""><o:p></o:p></span></p><p style="margin: 0in 0in 7.5pt; line-height: 15pt; box-sizing: border-box; background-image: initial; background-attachment: initial; background-size: initial; background-origin: initial; background-clip: initial; background-position: initial; background-repeat: initial;"><span style="font-size:10.5pt;font-family:"Tahoma","sans-serif"">&nbsp;<o:p></o:p></span></p><p style="margin: 0in 0in 7.5pt; line-height: 15pt; box-sizing: border-box; background-image: initial; background-attachment: initial; background-size: initial; background-origin: initial; background-clip: initial; background-position: initial; background-repeat: initial;"><span style="box-sizing: border-box"><b><span style="font-size:10.5pt;font-family:\n"Tahoma","sans-serif"">7.1</span></b></span><span style="font-size:10.5pt;\nfont-family:"Tahoma","sans-serif"">&nbsp;&nbsp;The Website is provided on an AS\nIS and AS AVAILABLE basis without any representation or endorsement made and\nwithout warranty of any kind whether express or implied, including but not\nlimited to the implied warranties of satisfactory quality, fitness for a\nparticular purpose, non-infringement, compatibility, security and accuracy.<o:p></o:p></span></p><p style="margin: 0in 0in 7.5pt; line-height: 15pt; box-sizing: border-box; background-image: initial; background-attachment: initial; background-size: initial; background-origin: initial; background-clip: initial; background-position: initial; background-repeat: initial;"><span style="box-sizing: border-box"><b><span style="font-size:10.5pt;font-family:\n"Tahoma","sans-serif"">7.2</span></b></span><span style="font-size:10.5pt;\nfont-family:"Tahoma","sans-serif"">&nbsp;&nbsp;To the extent permitted by\nlaw,&nbsp;(WEBSITE TITLE)&nbsp;will not be liable for any indirect or\nconsequential loss or damage whatever (including without limitation&nbsp;loss\nof business, opportunity, data, profits) arising out of or in connection with\nthe use of the Website.<o:p></o:p></span></p><p style="margin: 0in 0in 7.5pt; line-height: 15pt; box-sizing: border-box; background-image: initial; background-attachment: initial; background-size: initial; background-origin: initial; background-clip: initial; background-position: initial; background-repeat: initial;"><span style="box-sizing: border-box"><b><span style="font-size:10.5pt;font-family:\n"Tahoma","sans-serif"">7.3</span></b></span><span style="font-size:10.5pt;\nfont-family:"Tahoma","sans-serif"">&nbsp;&nbsp;(WEBSITE TITLE)&nbsp;makes no\nwarranty that the functionality of the Website will be uninterrupted or error\nfree, that defects will be corrected or that the Website or the server that\nmakes it available are free of viruses or anything else which may be harmful or\ndestructive.<o:p></o:p></span></p><p style="margin: 0in 0in 7.5pt; line-height: 15pt; box-sizing: border-box; background-image: initial; background-attachment: initial; background-size: initial; background-origin: initial; background-clip: initial; background-position: initial; background-repeat: initial;"><span style="box-sizing: border-box"><b><span style="font-size:10.5pt;font-family:\n"Tahoma","sans-serif"">7.4</span></b></span><span style="font-size:10.5pt;\nfont-family:"Tahoma","sans-serif"">&nbsp;&nbsp;Nothing in these Terms and\nConditions shall be construed so as to exclude or limit the liability\nof&nbsp;(WEBSITE TITLE)&nbsp;for death or personal injury as a result&nbsp;of\nthe negligence of Viiworks or that of its employees or agents.<o:p></o:p></span></p><p style="margin: 0in 0in 7.5pt; line-height: 15pt; box-sizing: border-box; background-image: initial; background-attachment: initial; background-size: initial; background-origin: initial; background-clip: initial; background-position: initial; background-repeat: initial;"><span style="font-size:10.5pt;font-family:"Tahoma","sans-serif"">&nbsp;<o:p></o:p></span></p><p style="margin: 0in 0in 7.5pt; line-height: 15pt; box-sizing: border-box; background-image: initial; background-attachment: initial; background-size: initial; background-origin: initial; background-clip: initial; background-position: initial; background-repeat: initial;"><span style="box-sizing: border-box"><b><span style="font-size:10.5pt;font-family:\n"Tahoma","sans-serif"">8 &nbsp;Indemnity</span></b></span><span style="font-size:10.5pt;font-family:"Tahoma","sans-serif""><o:p></o:p></span></p><p style="margin: 0in 0in 7.5pt; line-height: 15pt; box-sizing: border-box; background-image: initial; background-attachment: initial; background-size: initial; background-origin: initial; background-clip: initial; background-position: initial; background-repeat: initial;"><span style="font-size:10.5pt;font-family:"Tahoma","sans-serif"">&nbsp;<o:p></o:p></span></p><p style="margin: 0in 0in 7.5pt; line-height: 15pt; box-sizing: border-box; background-image: initial; background-attachment: initial; background-size: initial; background-origin: initial; background-clip: initial; background-position: initial; background-repeat: initial;"><span style="font-size:10.5pt;font-family:"Tahoma","sans-serif"">You agree to\nindemnify and hold&nbsp;(WEBSITE TITLE)&nbsp;and its employees and agents\nharmless from and against all liabilities, legal fees, damages, losses, costs\nand&nbsp;other expenses in relation to any claims or actions brought\nagainst&nbsp;(WEBSITE TITLE)&nbsp;arising out of any breach by you of\nthese&nbsp;Terms and Conditions or other liabilities arising out of your use of\nthis Website.<o:p></o:p></span></p><p style="margin: 0in 0in 7.5pt; line-height: 15pt; box-sizing: border-box; background-image: initial; background-attachment: initial; background-size: initial; background-origin: initial; background-clip: initial; background-position: initial; background-repeat: initial;"><span style="font-size:10.5pt;font-family:"Tahoma","sans-serif"">&nbsp;<o:p></o:p></span></p><p style="margin: 0in 0in 7.5pt; line-height: 15pt; box-sizing: border-box; background-image: initial; background-attachment: initial; background-size: initial; background-origin: initial; background-clip: initial; background-position: initial; background-repeat: initial;"><span style="box-sizing: border-box"><b><span style="font-size:10.5pt;font-family:\n"Tahoma","sans-serif"">9 &nbsp;Severance</span></b></span><span style="font-size:10.5pt;font-family:"Tahoma","sans-serif""><o:p></o:p></span></p><p style="margin: 0in 0in 7.5pt; line-height: 15pt; box-sizing: border-box; background-image: initial; background-attachment: initial; background-size: initial; background-origin: initial; background-clip: initial; background-position: initial; background-repeat: initial;"><span style="font-size:10.5pt;font-family:"Tahoma","sans-serif"">&nbsp;<o:p></o:p></span></p><p style="margin: 0in 0in 7.5pt; line-height: 15pt; box-sizing: border-box; background-image: initial; background-attachment: initial; background-size: initial; background-origin: initial; background-clip: initial; background-position: initial; background-repeat: initial;"><span style="font-size:10.5pt;font-family:"Tahoma","sans-serif"">If any of these\nTerms and Conditions should be determined to be invalid, illegal or\nunenforceable for any reason by any court of competent jurisdiction then such\nTerm or Condition shall be severed and the remaining Terms and Conditions shall\nsurvive and remain in full force and effect and continue to be binding and\nenforceable.<o:p></o:p></span></p><p style="margin: 0in 0in 7.5pt; line-height: 15pt; box-sizing: border-box; background-image: initial; background-attachment: initial; background-size: initial; background-origin: initial; background-clip: initial; background-position: initial; background-repeat: initial;"><span style="font-size:10.5pt;font-family:"Tahoma","sans-serif"">&nbsp;<o:p></o:p></span></p><p style="margin: 0in 0in 7.5pt; line-height: 15pt; box-sizing: border-box; background-image: initial; background-attachment: initial; background-size: initial; background-origin: initial; background-clip: initial; background-position: initial; background-repeat: initial;"><span style="box-sizing: border-box"><b><span style="font-size:10.5pt;font-family:\n"Tahoma","sans-serif"">10 &nbsp;Governing Law</span></b></span><span style="font-size:10.5pt;font-family:"Tahoma","sans-serif""><o:p></o:p></span></p><p style="margin: 0in 0in 7.5pt; line-height: 15pt; box-sizing: border-box; background-image: initial; background-attachment: initial; background-size: initial; background-origin: initial; background-clip: initial; background-position: initial; background-repeat: initial;"><span style="font-size:10.5pt;font-family:"Tahoma","sans-serif"">&nbsp;<o:p></o:p></span></p><p style="margin: 0in 0in 7.5pt; line-height: 15pt; box-sizing: border-box; background-image: initial; background-attachment: initial; background-size: initial; background-origin: initial; background-clip: initial; background-position: initial; background-repeat: initial;"><span style="font-size:10.5pt;font-family:"Tahoma","sans-serif"">These Terms and\nConditions shall be governed by and construed in accordance with the law of The\nRepublic of the Philippines and you hereby submit to the exclusive jurisdiction\nof the Philippine courts.<o:p></o:p></span></p><p style="margin: 0in 0in 7.5pt; line-height: 15pt; box-sizing: border-box; background-image: initial; background-attachment: initial; background-size: initial; background-origin: initial; background-clip: initial; background-position: initial; background-repeat: initial;"><span style="font-size:10.5pt;font-family:"Tahoma","sans-serif"">&nbsp;<o:p></o:p></span></p><p style="margin: 0in 0in 7.5pt; line-height: 15pt; box-sizing: border-box; background-image: initial; background-attachment: initial; background-size: initial; background-origin: initial; background-clip: initial; background-position: initial; background-repeat: initial;"><span style="font-size:10.5pt;font-family:"Tahoma","sans-serif"">For any further\ninformation please email webmaster<o:p></o:p></span></p><p style="box-sizing: border-box; font-family: tahoma; font-size: 14px;">\n\n\n\n\n\n\n\n\n\n\n\n\n\n\n\n\n\n\n\n\n\n\n\n\n\n\n\n\n\n\n\n\n\n\n\n\n\n\n\n\n\n\n\n\n\n\n\n\n\n\n\n\n\n\n\n\n\n\n\n\n\n\n\n\n\n\n\n\n\n\n\n\n\n\n\n\n\n\n\n\n\n\n\n\n\n\n\n\n\n\n\n\n\n\n\n\n\n</p><p class="MsoNormal"><b>&nbsp;</b></p>', '', '<p><br></p>', 'pages', 'index', 'termscondition', 'termscondition', 1, '', '', '', '', 'viidemo', 'inner.template.html', NULL, NULL, 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00');

-- --------------------------------------------------------

--
-- Table structure for table `vii_page_tree`
--

CREATE TABLE IF NOT EXISTS `vii_page_tree` (
  `id_page` int(11) NOT NULL,
  `id_parent` int(11) NOT NULL,
  `depth` tinyint(1) NOT NULL,
  `isActive` int(11) NOT NULL,
  `absolute_link` varchar(512) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `vii_page_tree`
--

INSERT INTO `vii_page_tree` (`id_page`, `id_parent`, `depth`, `isActive`, `absolute_link`) VALUES
(1, 0, 1, 1, 'contactus'),
(4, 0, 1, 0, 'error'),
(6, 0, 1, 1, 'faqs'),
(7, 0, 1, 1, 'gallery'),
(10, 0, 1, 0, 'rssfeed'),
(11, 0, 1, 1, 'news'),
(12, 0, 1, 0, ' '),
(13, 0, 1, 1, 'blog'),
(14, 0, 1, 1, 'testimonial'),
(15, 0, 1, 0, 'sample1'),
(16, 0, 2, 0, 'sample1/sample11'),
(17, 0, 3, 0, 'sample1/sample11/sample111'),
(18, 15, 2, 0, 'sample1/sample12'),
(19, 16, 3, 0, 'sample1/sample11/sample112'),
(20, 16, 3, 0, 'sample1/sample11/sample113'),
(21, 0, 1, 0, 'about'),
(22, 0, 1, 1, 'promo'),
(23, 0, 1, 0, 'search'),
(24, 0, 1, 0, 'newsletter'),
(25, 0, 1, 1, 'events'),
(27, 0, 1, 1, 'elements'),
(33, 0, 1, 0, 'privacypolicy'),
(31, 0, 1, 1, 'font'),
(30, 0, 1, 1, 'form'),
(34, 0, 1, 0, 'termscondition');

-- --------------------------------------------------------

--
-- Table structure for table `vii_promo_category`
--

CREATE TABLE IF NOT EXISTS `vii_promo_category` (
  `id_promo_category` int(11) NOT NULL AUTO_INCREMENT,
  `id_parent` int(11) DEFAULT NULL,
  `category_title` text,
  `category_desc` text,
  `category_root` text,
  `status` int(11) DEFAULT NULL,
  `date_add` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  PRIMARY KEY (`id_promo_category`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=3 ;

--
-- Dumping data for table `vii_promo_category`
--

INSERT INTO `vii_promo_category` (`id_promo_category`, `id_parent`, `category_title`, `category_desc`, `category_root`, `status`, `date_add`) VALUES
(1, 0, 'Uncategorized', 'Uncategorized', NULL, 1, '2014-10-15 09:23:42'),
(2, 0, 'aaaaaaaaaaaaaaaaa', 'aaaaaaaaa', ' - aaaaaaaaaaaaaaaaa', 1, '2015-08-26 09:59:01');

-- --------------------------------------------------------

--
-- Table structure for table `vii_promo_item`
--

CREATE TABLE IF NOT EXISTS `vii_promo_item` (
  `id_promo_item` int(11) NOT NULL AUTO_INCREMENT,
  `date` date DEFAULT NULL,
  `image_title` text,
  `link_rewrite` text,
  `image_sub_title` text,
  `image_author` varchar(255) DEFAULT NULL,
  `image_desc` text,
  `image_src` text,
  `image_meta_title` text,
  `image_meta_description` text,
  `image_meta_keywords` text,
  `status` int(11) DEFAULT NULL,
  `id_promo_category` int(11) DEFAULT '1',
  `date_add` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  PRIMARY KEY (`id_promo_item`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=4 ;

--
-- Dumping data for table `vii_promo_item`
--

INSERT INTO `vii_promo_item` (`id_promo_item`, `date`, `image_title`, `link_rewrite`, `image_sub_title`, `image_author`, `image_desc`, `image_src`, `image_meta_title`, `image_meta_description`, `image_meta_keywords`, `status`, `id_promo_category`, `date_add`) VALUES
(1, '2014-10-15', 'Sample Title #1', 'sample_title__1', 'Sample Sub Title #1', 'admin', '<p><span style="font-weight: bold;">Sample Description #1<br></span></p>', 'd7f928657304acfade624f4d5d552648.JPG', 'Sample  Meta Title #1', 'Sample  Meta Description #1', 'Sample  Meta Keywords #1', 1, 1, '2015-09-01 08:10:02'),
(2, '2014-10-15', 'Sample Title #2', 'sample_title__2', 'Sample Sub Title #2', 'admin', '<p><span style="font-weight: bold;">Sample Description #2<br></span></p>', '767798d7cc8716150f239650782a1f8c.JPG', 'Sample  Meta Title #2', 'Sample Meta Description #2', 'Sample Meta Keywords #2', 1, 1, '2015-09-01 08:10:02'),
(3, '2015-07-01', 'Promo 3', 'promo_3', 'Sample Promo 3', 'admin', '<p>Sample Promo 3<br></p>', 'd694a690c799fc3ec8c16a9995d08a14.JPG', '', '', '', 1, 1, '2015-09-01 08:10:02');

-- --------------------------------------------------------

--
-- Table structure for table `vii_testimonial`
--

CREATE TABLE IF NOT EXISTS `vii_testimonial` (
  `id_testimonial` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(255) DEFAULT NULL,
  `email` varchar(255) DEFAULT NULL,
  `message` text,
  `ip_address` varchar(255) DEFAULT NULL,
  `status` int(11) DEFAULT '0',
  `date_add` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  PRIMARY KEY (`id_testimonial`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=3 ;

--
-- Dumping data for table `vii_testimonial`
--

INSERT INTO `vii_testimonial` (`id_testimonial`, `name`, `email`, `message`, `ip_address`, `status`, `date_add`) VALUES
(1, 'Sample Testimonial Title #1', 'SampleTestimonialEmail1@example.com', 'Sample Testimonial Message #1', '192.168.2.197', 1, '2015-08-26 10:14:34'),
(2, 'Sample Testimonial Title #2', 'SampleTestimonialEmail2@example.com', 'Sample Testimonial Message #2', '192.168.2.197', 1, '2014-08-26 04:47:05');

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
