-- phpMyAdmin SQL Dump
-- version 4.0.4.1
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: Aug 20, 2015 at 10:05 AM
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
/* CREATE DATABASE IF NOT EXISTS `samplewebsite01_db` DEFAULT CHARACTER SET latin1 COLLATE latin1_swedish_ci; */
/* USE `samplewebsite01_db`; */

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
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=2 ;

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
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=3 ;

--
-- Dumping data for table `vii_banner`
--

INSERT INTO `vii_banner` (`id_banner`, `image_title`, `image_sub_title`, `image_sub_title2`, `image_desc`, `image_src`, `image_src2`, `image_link`, `status`, `date`, `date_add`, `date_upd`) VALUES
(1, 'Sample Title #1', 'Sample Sub Title #1', 'Sample Sub Title 2 #1', '<p><span style="font-weight: bold;">Sample Description #1</span><br></p>', 'c217d6af169131e978fd0cff999f9139.jpg', '2c260f41d62577af62e53633c1af12fd.jpg', 'Sample Link #1', 1, '2014-08-20', '2014-08-20 03:54:42', NULL),
(2, 'Sample Title #2', 'Sample Sub Title #2', 'Sample Sub Title 2 #2', '<p><span style="font-weight: bold;">Sample Description #2<br></span></p>', '140aca6c6cf1e7a79eb71a1e9864cae4.jpg', 'fbe95bc6739757f5571aca4754eac03e.jpg', 'Sample Link #2', 1, '2014-10-15', '2014-10-15 02:13:40', NULL);

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
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=49 ;

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
(14, 'Archive', 'bcNewsArchive', 6, 'newslettermanager', 'archive'),
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
(33, 'Social Media', 'bcSeoManSocialMedia', 24, 'settings', 'socialmedia'),
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
(48, 'Navigation Manager ', 'bcManageNav', 0, 'manage_navigation', 'index');

-- --------------------------------------------------------

--
-- Table structure for table `vii_blog_category`
--

CREATE TABLE IF NOT EXISTS `vii_blog_category` (
  `id_blog_category` int(11) NOT NULL AUTO_INCREMENT,
  `id_parent` int(11) DEFAULT NULL,
  `category_title` text,
  `category_desc` text,
  `status` int(11) DEFAULT NULL,
  `date_add` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  PRIMARY KEY (`id_blog_category`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=2 ;

--
-- Dumping data for table `vii_blog_category`
--

INSERT INTO `vii_blog_category` (`id_blog_category`, `id_parent`, `category_title`, `category_desc`, `status`, `date_add`) VALUES
(1, 0, 'Uncategorized', 'Uncategorized', 1, '2014-08-21 07:48:24');

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
  `image_desc` text,
  `image_src` varchar(255) DEFAULT NULL,
  `image_meta_title` text,
  `image_meta_description` text,
  `image_meta_keywords` text,
  `status` int(11) DEFAULT NULL,
  `id_blog_category` int(11) NOT NULL DEFAULT '1',
  `date_add` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  PRIMARY KEY (`id_blog_item`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=3 ;

--
-- Dumping data for table `vii_blog_item`
--

INSERT INTO `vii_blog_item` (`id_blog_item`, `date`, `image_title`, `link_rewrite`, `image_sub_title`, `image_desc`, `image_src`, `image_meta_title`, `image_meta_description`, `image_meta_keywords`, `status`, `id_blog_category`, `date_add`) VALUES
(1, '2014-08-21', 'Sample Title #1', 'sample_title__1', 'Sample Sub Title #1', '<p><span style="font-weight: bold;">Sample Description #1<br></span></p>', 'c0d23ced57437f250a15f8cfa4979c9e.jpg', 'Sample Meta Title #1', 'Sample Meta Description #1', 'Sample Meta Keywords #1', 1, 1, '2015-03-16 10:46:20'),
(2, '2014-09-11', 'Sample Title #2', 'sample-title-2', 'Sample Sub Title #2', '<p>Sample Description #2<br></p>', '65291c48a336838d79b354aa5a5f30af.jpg', 'Sample Meta Title #2', 'Sample Meta Description #2', 'Sample Meta Keywords #2', 1, 1, '2015-01-07 04:43:51');

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
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=72 ;

--
-- Dumping data for table `vii_config`
--

INSERT INTO `vii_config` (`id`, `name`, `value`, `date_add`, `date_upd`) VALUES
(1, 'ADMIN_EMAIL', 'testviiworks@gmail.com', '2009-06-01 17:56:17', '2013-10-24 10:03:33'),
(2, 'ADMIN_NAME', 'Admin', '2009-06-01 17:56:17', '2013-10-24 10:03:33'),
(3, 'SITE_NAME', 'Samplewebsite14 db', '2010-01-14 10:25:50', '2013-10-24 10:03:33'),
(4, 'META_DESCRIPTION', 'ENTER DEFAULT META DESCRIPTION VIA ADMIN PANEL > SEO > SETTINGS', '2011-03-07 18:51:58', '2013-10-24 10:03:33'),
(5, 'META_AUTHOR', 'Admin', '2011-03-07 18:51:58', '2013-10-24 10:03:33'),
(6, 'META_TITLE', 'ENTER DEFAULT META TITLE VIA ADMIN PANEL > SEO > SETTINGS', '2011-03-29 11:55:32', '2013-10-24 10:03:33'),
(53, 'ADMIN_BCC', 'testviiworks@gmail.com', '2014-02-20 00:00:00', '2014-02-20 00:00:00'),
(10, 'SEO_GOOGLE_UA', 'ENTER SEO GOOGLE ANALYTICS VIA GOOGLE.COM', '2010-12-02 09:00:48', '2014-02-19 12:23:36'),
(11, 'SERVER_URL', 'http://10.10.1.12/samplewebsite14/', '2010-12-02 18:02:19', '2012-05-08 09:57:41'),
(12, 'SERVER_USERNAME', '', '2010-12-02 18:02:19', '2012-05-08 09:57:41'),
(13, 'SERVER_PASSWORD', '', '2010-12-02 18:02:19', '2012-05-08 09:57:41'),
(63, 'RECAPTCHA_PUBLIC_KEY', '', '2014-08-07 00:00:00', '2014-08-07 00:00:00'),
(23, 'CONTACT_EMAIL', 'testviiworks@gmail.com', '2011-04-14 08:08:32', '2012-10-03 14:49:40'),
(24, 'CONTACT_PASSWORD', 'A4yYzYvo0uqtDyUlqizn3dFAWJVt6BDxvWNoXdp0php7nPBRmIQzEE7KAVOS0WkQ2S1DjZK1OePMgkZGXErMtA==', '2011-05-03 08:51:17', '2011-05-03 08:53:52'),
(25, 'CONTACT_SMTP_HOST', 'ssl://smtp.googlemail.com', '2011-05-03 08:51:17', '2011-05-03 08:53:52'),
(26, 'CONTACT_SMTP_PORT', '465', '2011-05-03 08:51:17', '2011-05-03 08:53:52'),
(27, 'CONTACT_EMAIL_BODY', '', '2011-04-14 08:08:32', '2012-10-03 14:49:40'),
(28, 'NEWSLETTER_EMAIL', 'testviiworks@gmail.com', '2011-05-03 08:51:17', '2011-05-03 08:53:52'),
(29, 'NEWSLETTER_PASSWORD', '+iED3b/VlRgXdfwyVQU9lvTNISqRfahodQbTL9SsH03StctIlr18zs3vWn1mZfkOdahKNRyvErmhQweQyxyCtw==', '2011-05-03 08:51:17', '2011-05-03 08:53:52'),
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
(67, 'SITE_LOGO', 'd5eb447e9e4bdc58408e603db1bd68bb.jpg', '2014-08-20 00:00:00', '2014-08-20 00:00:00'),
(68, 'SITE_FAVICON', '5c71b58baf54cc8ea1ea888ef8626097.ico', '2014-08-21 00:00:00', '2014-08-21 00:00:00'),
(69, 'META_IMAGE', '', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(70, 'CONTACT_NO', '123-456-7890', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(71, 'CONTACT_ADDRESS', 'Viiworks Drive corner, Bonifacio Global City, 32nd St, Taguig City ', '0000-00-00 00:00:00', '0000-00-00 00:00:00');

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
(1, 'Sample One', 'testviiworks@gmail.com', '1234567890', 'SampleOne.com', 'testviiworks.gmail.com', 'Sample One Subject', 'Sample One Messages Here', '2014-10-16 07:08:31'),
(2, 'Sample Two', 'testviiworks@gmail.com', '1234567890', 'SampleTwo.com', 'Sample st. Two City', 'Sample Two Subject', 'Sample Two Messages Here', '2014-10-16 07:30:08');

-- --------------------------------------------------------

--
-- Table structure for table `vii_events_category`
--

CREATE TABLE IF NOT EXISTS `vii_events_category` (
  `id_events_category` int(11) NOT NULL AUTO_INCREMENT,
  `id_parent` int(11) DEFAULT '0',
  `category_title` text,
  `category_desc` text,
  `category_meta_title` text,
  `category_meta_description` text,
  `category_meta_keywords` text,
  `category_meta_image` varchar(255) DEFAULT NULL,
  `status` int(11) DEFAULT '1',
  `date_add` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  PRIMARY KEY (`id_events_category`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=2 ;

--
-- Dumping data for table `vii_events_category`
--

INSERT INTO `vii_events_category` (`id_events_category`, `id_parent`, `category_title`, `category_desc`, `category_meta_title`, `category_meta_description`, `category_meta_keywords`, `category_meta_image`, `status`, `date_add`) VALUES
(1, 0, 'Uncategorized', 'Uncategorized', NULL, NULL, NULL, NULL, 1, '2015-01-06 06:22:18');

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
  `image_desc` text,
  `image_src` varchar(255) DEFAULT NULL,
  `image_meta_title` text,
  `image_meta_description` text,
  `image_meta_keywords` text,
  `status` int(11) DEFAULT NULL,
  `id_events_category` int(11) DEFAULT '1',
  `date_add` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  PRIMARY KEY (`id_events_item`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=3 ;

--
-- Dumping data for table `vii_events_item`
--

INSERT INTO `vii_events_item` (`id_events_item`, `date`, `image_title`, `link_rewrite`, `image_sub_title`, `image_desc`, `image_src`, `image_meta_title`, `image_meta_description`, `image_meta_keywords`, `status`, `id_events_category`, `date_add`) VALUES
(1, '2014-12-29', 'Sample Title #1', NULL, 'Sample Sub Title #1', '<p>Sample Description #1<br></p>', '949c999ff75f6ef81ade90d987955a5f.jpg', '', '', '', 1, 1, '2015-01-06 07:37:24'),
(2, '2014-11-26', 'Sample Title #2', NULL, 'Sample Sub Title #2', '<p>Sample Description #2<br></p>', '7a03a4432714dcac24b02c92bb57a4fe.jpg', '', '', '', 1, 1, '2015-01-06 08:15:08');

-- --------------------------------------------------------

--
-- Table structure for table `vii_faq_category`
--

CREATE TABLE IF NOT EXISTS `vii_faq_category` (
  `id_faq_category` int(11) NOT NULL AUTO_INCREMENT,
  `category_title` varchar(250) CHARACTER SET utf8 NOT NULL,
  `category_description` text CHARACTER SET utf8 NOT NULL,
  `active` int(11) NOT NULL DEFAULT '1',
  PRIMARY KEY (`id_faq_category`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=2 ;

--
-- Dumping data for table `vii_faq_category`
--

INSERT INTO `vii_faq_category` (`id_faq_category`, `category_title`, `category_description`, `active`) VALUES
(1, 'Uncategorized', '', 1);

-- --------------------------------------------------------

--
-- Table structure for table `vii_faq_item`
--

CREATE TABLE IF NOT EXISTS `vii_faq_item` (
  `id_faq_item` int(11) NOT NULL AUTO_INCREMENT,
  `faq_question` varchar(250) CHARACTER SET utf8 NOT NULL,
  `faq_answer` text CHARACTER SET utf8 NOT NULL,
  `id_faq_category` int(11) NOT NULL,
  `active` int(11) NOT NULL DEFAULT '0',
  PRIMARY KEY (`id_faq_item`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=4 ;

--
-- Dumping data for table `vii_faq_item`
--

INSERT INTO `vii_faq_item` (`id_faq_item`, `faq_question`, `faq_answer`, `id_faq_category`, `active`) VALUES
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
  `date_add` timestamp NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`id_gallery_category`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=4 ;

--
-- Dumping data for table `vii_gallery_category`
--

INSERT INTO `vii_gallery_category` (`id_gallery_category`, `id_parent`, `category_title`, `link_rewrite`, `category_sub_title`, `category_desc`, `image_src`, `status`, `date_add`) VALUES
(1, 0, 'Uncategorized', 'uncategorized', 'Uncategorized', 'Uncategorized', 'c0e037d2f5d96215a848dc81f03883f6.jpg', 1, '2014-07-07 16:00:00'),
(3, 0, 'Sample Title #1', 'sample_title_1', 'Sample Sub Title #1', 'Sample Description #1', '5ba50fe4f129f8b885fbc1bec14f4b67.jpg', 1, '2014-08-19 09:31:24');

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
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=5 ;

--
-- Dumping data for table `vii_gallery_item`
--

INSERT INTO `vii_gallery_item` (`id_gallery_item`, `image_title`, `link_rewrite`, `image_sub_title`, `image_desc`, `image_src`, `image_meta_title`, `image_meta_description`, `image_meta_keywords`, `status`, `id_gallery_category`, `date_add`) VALUES
(1, 'Title #1', 'title_1', 'Subtitle#1', 'Description #1', '6c230ed26f01fd493645b4f397692fe7.jpg', 'Gallery Sample Meta Title  #1', 'Gallery Sample Meta Description  #1', 'Gallery Sample Meta Keywords  #1', 1, 1, '2014-08-19 09:09:46'),
(2, 'Title #2', 'title_2', 'Subtitle#2', 'Description #2', 'c89fedc788a87299c45efe1cf16c523f.jpg', NULL, NULL, NULL, 1, 1, '2014-08-19 09:09:46'),
(3, 'Sample Title #1', 'sample_title_1', 'Sample Sub Title #1', 'Sample Description #1', '550e356039d49ed4290dfdd9193cf0bb.jpg', NULL, NULL, NULL, 1, 3, '2014-10-16 02:56:47'),
(4, 'Sample Title #2', 'sample_title_2', 'Sample Sub Title #2', 'Sample Description #2', '11e562813d6057f56487153581332ecd.jpg', NULL, NULL, NULL, 1, 3, '2014-10-16 02:56:47');

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
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=3 ;

--
-- Dumping data for table `vii_newsletter`
--

INSERT INTO `vii_newsletter` (`id_newsletter`, `title`, `content`, `date_add`) VALUES
(1, 'Ensogo', '1.txt', '2014-02-13 05:35:05'),
(2, 'Buyanihan', '2.txt', '2014-02-13 05:37:40');

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
(1, 'testviiworks@gmail.com', 'LJT14e7KePle5VQ6mXLCYdLN4lIv+CkR1Y/Tari2BP+VpCGEsJU2eJoAniCBSgJEo2EXd/pH7/FsV5Ef2lXj6A==', '1', '2014-10-16 09:01:50');

-- --------------------------------------------------------

--
-- Table structure for table `vii_news_category`
--

CREATE TABLE IF NOT EXISTS `vii_news_category` (
  `id_news_category` int(11) NOT NULL AUTO_INCREMENT,
  `id_parent` int(11) DEFAULT '0',
  `category_title` text,
  `category_desc` text,
  `status` int(11) DEFAULT '1',
  `date_add` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`id_news_category`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=2 ;

--
-- Dumping data for table `vii_news_category`
--

INSERT INTO `vii_news_category` (`id_news_category`, `id_parent`, `category_title`, `category_desc`, `status`, `date_add`) VALUES
(1, 0, 'Uncategorized', 'Uncategorized', 1, '2014-05-29 10:46:04');

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
  `image_desc` text,
  `image_src` text,
  `image_meta_title` text,
  `image_meta_description` text,
  `image_meta_keywords` text,
  `status` int(11) DEFAULT '0',
  `id_news_category` int(11) DEFAULT '1',
  `date_add` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`id_news_item`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=3 ;

--
-- Dumping data for table `vii_news_item`
--

INSERT INTO `vii_news_item` (`id_news_item`, `date`, `image_title`, `link_rewrite`, `image_sub_title`, `image_desc`, `image_src`, `image_meta_title`, `image_meta_description`, `image_meta_keywords`, `status`, `id_news_category`, `date_add`) VALUES
(1, '2014-08-19', 'Sample Title #1', 'sample_title__1', 'Sample Sub Title #1', '<p><span style="font-weight: bold;">Sample Description #1</span><br></p>', '14f6771f68777eb6470a64b5997136ff.jpg', 'Sample Meta Title #1', 'Sample Meta Description #1', 'Sample Meta Keywords #1', 1, 1, '2014-08-19 03:14:27'),
(2, '2014-08-20', 'Sample Title #2', 'sample_title__2', 'Sample Sub Title #2', '<p><span style="font-weight: bold;">Sample Description #2</span></p>', '93b0d01cfae91fb43bbb55679af9706e.jpg', 'Sample  Meta Title #2', 'Sample  Meta Description #2', 'Sample  Meta Keywords #2', 1, 1, '2014-08-19 23:36:22');

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
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=27 ;

--
-- Dumping data for table `vii_page`
--

INSERT INTO `vii_page` (`id_page`, `title`, `sort_order`, `content`, `image_src`, `caption`, `class`, `function`, `link_rewrite`, `redirect`, `meta_title`, `meta_keywords`, `meta_description`, `meta_image`, `custom_theme`, `custom_layout`, `layout`, `sections`, `isAdmin`, `date_add`, `date_upd`) VALUES
(20, 'Sample 1.1.3', 6, '<p>Sample 1.1.3 Contents Here<br></p>', NULL, NULL, 'pages', 'index', 'sample113', 1, '', '', '', NULL, 'viidemo', 'inner.template.html', NULL, NULL, 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(19, 'Sample 1.1.2', 5, '<p>Sample 1.1.2 Contents Here<br></p>', NULL, NULL, 'pages', 'index', 'sample112', 1, '', '', '', NULL, 'viidemo', 'inner.template.html', NULL, NULL, 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(18, 'Sample 1.2', 7, '<p>Sample 1.2 Contents Here<br></p>', NULL, NULL, 'pages', 'index', 'sample12', 1, '', '', '', NULL, 'viidemo', 'inner.template.html', NULL, NULL, 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(17, 'Sample 1.1.1', 4, '<p>Sample 1.1.1 Contents Here<br></p>', NULL, NULL, 'pages', 'index', 'sample111', 1, '', '', '', NULL, 'viidemo', 'inner.template.html', NULL, NULL, 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(16, 'Sample 1.1', 3, '<p>Sample 1.1 Contents Here<br></p>', NULL, NULL, 'pages', 'index', 'sample11', 1, '', '', '', NULL, 'viidemo', 'inner.template.html', NULL, NULL, 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(15, 'Sample 1', 2, '<p><span style="font-weight: bold;">Sample 1 Contents Here</span><br></p>', '', '<p><span style="font-weight: bold;">Sample 1 Caption Here</span><br></p>', 'pages', 'index', 'sample1', 1, '', '', '', '', 'viidemo', 'inner.template.html', NULL, NULL, 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(14, 'Testimonials', 14, '', NULL, NULL, 'testimonial', 'index', 'testimonial', 1, '', '', '', NULL, 'viidemo', 'inner.template.html', NULL, NULL, 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(12, 'Home', 0, '', NULL, NULL, 'pages', 'index', ' ', 1, '', '', '', NULL, 'viidemo', 'main.template.html', NULL, NULL, 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(13, 'Blog', 11, '', NULL, NULL, 'blog', 'index', 'blog', 1, '', '', '', NULL, 'viidemo', 'inner.template.html', NULL, NULL, 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(11, 'News', 10, '', NULL, NULL, 'news', 'index', 'news', 1, '', '', '', NULL, 'viidemo', 'inner.template.html', NULL, NULL, 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(10, 'RSS Feed', 15, '', NULL, NULL, 'rssfeed', 'index', 'rssfeed', 1, '', '', '', NULL, 'viidemo', 'rssfeed.template.html', NULL, NULL, 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(6, 'Frequently Asked Questions', 13, '', NULL, NULL, 'faqs', 'index', 'faqs', 1, '', '', '', NULL, 'viidemo', 'inner.template.html', NULL, NULL, 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(7, 'Gallery', 9, '', NULL, NULL, 'gallery', 'index', 'gallery', 1, '', '', '', NULL, 'viidemo', 'inner.template.html', NULL, NULL, 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(4, 'Error Page', 19, 'This is ERROR message. Edit via CMS &gt; Pages &gt; Error.<br><br>', '', '', 'pages', 'error', 'error', 1, '', '', '', '', 'viidemo', 'inner.template.html', NULL, NULL, 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(1, 'Contact Us', 8, '', NULL, NULL, 'contactus', 'index', 'contactus', 1, '', '', '', NULL, 'viidemo', 'inner.template.html', NULL, NULL, 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(21, 'About Us', 1, '<p>About Us content here. Edit via CMS &gt; Pages &gt; About Us.<br></p>', '11d092cb857bbe2174d0b49315ba866a.jpg', 'Sample banner caption. Edit via CMS &gt; Pages &gt; About Us.', 'pages', 'index', 'about', 1, 'About Us Meta Title Here', 'About Us Meta Title Keywords', 'About Us Meta Title Description', '3007ec9ee04e1d545ed1ebc28f5e290f.jpg', 'viidemo', 'inner.template.html', NULL, NULL, 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(22, 'Promotion', 12, '<p><br></p>', NULL, NULL, 'promo', 'index', 'promo', 1, '', '', '', NULL, 'viidemo', 'inner.template.html', NULL, NULL, 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(23, 'Search', 17, '<p>search<br></p>', NULL, NULL, 'search', 'index', 'search', 0, '', '', '', NULL, 'viidemo', 'inner.template.html', NULL, NULL, 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(24, 'Newsletter', 18, '', NULL, NULL, 'newsletter', 'index', 'newsletter', 0, '', '', '', NULL, 'viidemo', 'inner.template.html', NULL, NULL, 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(25, 'Events', 16, '', '', NULL, 'events', 'index', 'events', 1, '', '', '', NULL, 'viidemo', 'inner.template.html', NULL, NULL, 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00');

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
(12, 0, 1, 1, ' '),
(13, 0, 1, 1, 'blog'),
(14, 0, 1, 1, 'testimonial'),
(15, 0, 1, 1, 'sample1'),
(16, 15, 2, 1, 'sample1/sample11'),
(17, 16, 3, 1, 'sample1/sample11/sample111'),
(18, 15, 2, 1, 'sample1/sample12'),
(19, 16, 3, 1, 'sample1/sample11/sample112'),
(20, 16, 3, 1, 'sample1/sample11/sample113'),
(21, 0, 1, 1, 'about'),
(22, 0, 1, 1, 'promo'),
(23, 0, 1, 0, 'search'),
(24, 0, 1, 0, 'newsletter'),
(25, 0, 1, 0, 'events');

-- --------------------------------------------------------

--
-- Table structure for table `vii_promo_category`
--

CREATE TABLE IF NOT EXISTS `vii_promo_category` (
  `id_promo_category` int(11) NOT NULL AUTO_INCREMENT,
  `id_parent` int(11) DEFAULT NULL,
  `category_title` text,
  `category_desc` text,
  `status` int(11) DEFAULT NULL,
  `date_add` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  PRIMARY KEY (`id_promo_category`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=2 ;

--
-- Dumping data for table `vii_promo_category`
--

INSERT INTO `vii_promo_category` (`id_promo_category`, `id_parent`, `category_title`, `category_desc`, `status`, `date_add`) VALUES
(1, 0, 'Uncategorized', 'Uncategorized', 1, '2014-10-15 09:23:42');

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
  `image_desc` text,
  `image_src` text,
  `image_meta_title` text,
  `image_meta_description` text,
  `image_meta_keywords` text,
  `status` int(11) DEFAULT NULL,
  `id_promo_category` int(11) DEFAULT '1',
  `date_add` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  PRIMARY KEY (`id_promo_item`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=3 ;

--
-- Dumping data for table `vii_promo_item`
--

INSERT INTO `vii_promo_item` (`id_promo_item`, `date`, `image_title`, `link_rewrite`, `image_sub_title`, `image_desc`, `image_src`, `image_meta_title`, `image_meta_description`, `image_meta_keywords`, `status`, `id_promo_category`, `date_add`) VALUES
(1, '2014-10-15', 'Sample Title #1', 'sample_title__1', 'Sample Sub Title #1', '<p><span style="font-weight: bold;">Sample Description #1<br></span></p>', 'cc625eeb0acc6c0bae406b890b32b0a9.jpg', 'Sample  Meta Title #1', 'Sample  Meta Description #1', 'Sample  Meta Keywords #1', 1, 1, '2015-03-17 05:13:43'),
(2, '2014-10-15', 'Sample Title #2', 'sample_title__2', 'Sample Sub Title #2', '<p><span style="font-weight: bold;">Sample Description #2<br></span></p>', '3517bdb8a403bbb0b9465b7d745d00b8.jpg', 'Sample  Meta Title #2', 'Sample Meta Description #2', 'Sample Meta Keywords #2', 1, 1, '2015-03-17 05:13:52');

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
(1, 'Sample Testimonial Title #1', 'SampleTestimonialEmail1@example.com', 'Sample Testimonial Message #1', '192.168.2.197', 1, '2014-10-15 08:21:56'),
(2, 'Sample Testimonial Title #2', 'SampleTestimonialEmail2@example.com', 'Sample Testimonial Message #2', '192.168.2.197', 1, '2014-08-26 04:47:05');

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
