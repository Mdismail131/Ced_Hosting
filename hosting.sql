-- phpMyAdmin SQL Dump
-- version 5.0.2
-- https://www.phpmyadmin.net/
--
-- Host: localhost
-- Generation Time: Dec 16, 2020 at 07:37 AM
-- Server version: 10.4.14-MariaDB
-- PHP Version: 7.3.21

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `hosting`
--

-- --------------------------------------------------------

--
-- Table structure for table `tbl_blog`
--

CREATE TABLE `tbl_blog` (
  `id` int(11) NOT NULL,
  `blog_title` varchar(44) NOT NULL,
  `blog_desc` text NOT NULL,
  `blog_date` datetime NOT NULL,
  `author_name` varchar(44) NOT NULL DEFAULT 'Anonymous',
  `caption_img` varchar(1000) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `tbl_company_info`
--

CREATE TABLE `tbl_company_info` (
  `id` int(11) NOT NULL,
  `comp_name` varchar(55) NOT NULL,
  `comp_logo` varchar(1000) NOT NULL,
  `comp_contact` varchar(33) NOT NULL,
  `comp_email` varchar(33) NOT NULL,
  `comp_address` varchar(88) NOT NULL,
  `comp_city` varchar(44) NOT NULL,
  `comp_state` int(11) NOT NULL,
  `comp_pincode` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `tbl_orders`
--

CREATE TABLE `tbl_orders` (
  `id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `user_billing_id` int(11) NOT NULL,
  `order_date` datetime NOT NULL,
  `status` int(11) NOT NULL,
  `promocode_applied_id` int(11) NOT NULL,
  `discount_amt` float NOT NULL,
  `total_amt_after_dis` float NOT NULL,
  `tax_amt` float NOT NULL,
  `final_invoice_amt` float NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `tbl_product`
--

CREATE TABLE `tbl_product` (
  `id` int(11) NOT NULL,
  `prod_parent_id` int(11) NOT NULL,
  `prod_name` varchar(100) NOT NULL,
  `link` longtext DEFAULT NULL,
  `prod_available` tinyint(1) NOT NULL DEFAULT 1,
  `prod_launch_date` datetime NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tbl_product`
--

INSERT INTO `tbl_product` (`id`, `prod_parent_id`, `prod_name`, `link`, `prod_available`, `prod_launch_date`) VALUES
(1, 0, 'Hosting', NULL, 1, '2020-12-09 14:34:49'),
(19, 1, 'Linux Hosting', '<ul>                     <li>                         <span>Unlimited </span>                          Domains, Disk Space, Bandwidth                          and Email Addresses                     </li>                     <li>                         <span>99.9% uptime </span>                         with dedicated 24/7 technical                          support                     </li>                     <li>                         <span>Powered by </span>                          CloudLinux, cPanel (demo),                          Apache, MySQL, PHP, Ruby & more                     </li>                     <li>                         <span>Launch  </span>                          your business with Rs. 2000* Google AdWords Credit *                     </li>                     <li><span>30 day </span> Money Back Guarantee</li>                 </ul>                     <a href=\"#\">view plans</a>                 </div>                 <div class=\"col-md-4 linux-grid1\">                     <img src=\"images/linux.png\" class=\"img-responsive\" alt=\"\"/>                 </div>', 1, '2020-12-12 15:27:25'),
(27, 1, 'CMS Hosting', '<ul>                     <li><span>Unlimited </span> domains, email and disk space</li>                     <li><span>99.9% uptime </span> with dedicated 24/7 technical support</li>                     <li><span>1 click</span> WordPress Installation with cPanel (demo) platform</li>                     <li><span>Launch  </span> your business with Rs. 1000* Google AdWords Credit *</li>                     <li><span>30 day </span> Money Back Guarantee</li>                 </ul>                     <a href=\"#\">view plans</a>                 </div>                 <div class=\"col-md-4 linux-grid1\">                     <img src=\"images/cms.png\" class=\"img-responsive\" alt=\"\"/>                 </div>', 1, '2020-12-15 10:32:57'),
(28, 1, 'WordPress Hosting', '<ul>                             <li><span>Unlimited </span> domains, email and disk space</li>                             <li><span>99.9% uptime </span> with dedicated 24/7 technical support</li>                             <li><span>1 click</span> WordPress Installation with cPanel (demo) platform</li>                             <li><span>Launch  </span> your business with Rs. 1000* Google AdWords Credit *</li>                             <li><span>30 day </span> Money Back Guarantee</li>                         </ul>                             <a href=\"#\">view plans</a>                         </div>                         <div class=\"col-md-4 linux-grid1\">                             <img src=\"images/word.png\" class=\"img-responsive\" alt=\"\"/>                         </div>', 1, '2020-12-15 10:33:06'),
(29, 1, 'Windows Hosting', '<ul>                             <li>Disk Space, Bandwidth and Email Addresses</li>                             <li><span>99.9% uptime </span> with dedicated 24/7 technical support</li>                             <li><span>Powered by </span> CloudLinux, cPanel (demo), Apache, MySQL, PHP, Ruby & more</li>                             <li><span>Launch  </span> your business with Rs. 2000* Google AdWords Credit *</li>                             <li><span>30 day </span> Money Back Guarantee</li>                         </ul>                             <a href=\"#\">view plans</a>                         </div>                         <div class=\"col-md-4 linux-grid1\">                             <img src=\"images/window.png\" class=\"img-responsive\" alt=\"\"/>                         </div>', 1, '2020-12-15 10:33:15'),
(31, 29, 'pro', '', 1, '2020-12-15 10:40:13'),
(32, 27, 'Pro', '', 1, '2020-12-15 10:40:59'),
(33, 19, 'Pro', '', 1, '2020-12-15 10:42:16'),
(34, 1, '', '', 1, '2020-12-15 19:26:13');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_product_description`
--

CREATE TABLE `tbl_product_description` (
  `id` int(11) NOT NULL,
  `prod_id` int(11) NOT NULL,
  `description` text DEFAULT NULL,
  `mon_price` float NOT NULL,
  `annual_price` float NOT NULL,
  `sku` varchar(55) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tbl_product_description`
--

INSERT INTO `tbl_product_description` (`id`, `prod_id`, `description`, `mon_price`, `annual_price`, `sku`) VALUES
(10, 27, '{\"web_space\":\"1\",\"bandwidth\":\"1\",\"domain\":\"0\",\"techno\":\"php,sdf,sdfds,pyth\",\"mail\":\"0\"}', 200, 600, 'uiyurfwbfuhw'),
(11, 29, '{\"web_space\":\"1\",\"bandwidth\":\"1\",\"domain\":\"0\",\"techno\":\"php,sdf,sdfds,pyth\",\"mail\":\"0\"}', 200, 600, 'uiyurfwbfuhw'),
(12, 19, '{\"web_space\":\"0.5\",\"bandwidth\":\"0.5\",\"domain\":\"0\",\"techno\":\"php,sdf,sdfds,sdfdsfds,afdsf\",\"mail\":\"0\"}', 499, 699, 'gbgbfdscadsa');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_promocode`
--

CREATE TABLE `tbl_promocode` (
  `id` int(11) NOT NULL,
  `type` varchar(50) NOT NULL,
  `value` varchar(22) NOT NULL,
  `max_discount` int(11) NOT NULL,
  `code` varchar(55) NOT NULL,
  `expiry_date` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `tbl_services`
--

CREATE TABLE `tbl_services` (
  `id` int(11) NOT NULL,
  `order_id` int(11) NOT NULL,
  `activation_time` datetime NOT NULL,
  `tenure` char(1) NOT NULL,
  `expiry_time` datetime NOT NULL,
  `prod_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `tbl_state`
--

CREATE TABLE `tbl_state` (
  `id` int(11) NOT NULL,
  `name` varchar(55) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `tbl_user`
--

CREATE TABLE `tbl_user` (
  `id` int(11) NOT NULL,
  `email` varchar(100) NOT NULL,
  `name` varchar(100) NOT NULL,
  `mobile` varchar(15) DEFAULT NULL,
  `email_approved` tinyint(1) DEFAULT 0,
  `phone_approved` tinyint(1) DEFAULT 0,
  `active` tinyint(1) NOT NULL DEFAULT 0,
  `is_admin` tinyint(1) NOT NULL,
  `sign_up_date` datetime DEFAULT current_timestamp(),
  `password` varchar(100) NOT NULL,
  `security_question` varchar(100) DEFAULT NULL,
  `security_answer` varchar(200) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tbl_user`
--

INSERT INTO `tbl_user` (`id`, `email`, `name`, `mobile`, `email_approved`, `phone_approved`, `active`, `is_admin`, `sign_up_date`, `password`, `security_question`, `security_answer`) VALUES
(1, 'mi0718839@gmail.com', 'Md Ismail', '9161220125', 1, 0, 1, 1, '2020-12-10 04:51:30', 'Ismail@123', 'What was your childhood nickname?', 'chiku'),
(2, 'shirinakhtar1998@gmail.com', 'shirin', '9161220125', 1, 0, 1, 0, '2020-12-12 05:40:30', 'shirin', 'What was your childhood nickname?', 'khushbu'),
(3, 'tufailahmad1001@gmail.com', 'Tufail Ahmad', '8896259924', 1, 0, 1, 0, '2020-12-12 05:48:27', 'tufail', 'What was your childhood nickname?', 'tuffu'),
(4, 'tufailahm.ad1001@gmail.com', 'dgfdsdfgs dfghh', '9988778877', 0, 0, 0, 0, '2020-12-14 11:46:35', 'Chirag@123', 'Choose', 'gfdgfh'),
(5, 'tufad1001@gmail.com', 'dgfdsdfgs dfghh', '9988778877', 0, 0, 0, 0, '2020-12-14 11:50:06', 'Chirag@123', 'Choose', 'gfdgfh');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_user_billing_add`
--

CREATE TABLE `tbl_user_billing_add` (
  `id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `billing_name` varchar(55) NOT NULL,
  `house_no` varchar(55) NOT NULL,
  `city` varchar(55) NOT NULL,
  `state` int(11) NOT NULL,
  `country` varchar(55) NOT NULL,
  `pincode` varchar(55) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Indexes for dumped tables
--

--
-- Indexes for table `tbl_blog`
--
ALTER TABLE `tbl_blog`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tbl_company_info`
--
ALTER TABLE `tbl_company_info`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tbl_orders`
--
ALTER TABLE `tbl_orders`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tbl_product`
--
ALTER TABLE `tbl_product`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tbl_product_description`
--
ALTER TABLE `tbl_product_description`
  ADD PRIMARY KEY (`id`),
  ADD KEY `prod_id` (`prod_id`);

--
-- Indexes for table `tbl_promocode`
--
ALTER TABLE `tbl_promocode`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tbl_services`
--
ALTER TABLE `tbl_services`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tbl_state`
--
ALTER TABLE `tbl_state`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tbl_user`
--
ALTER TABLE `tbl_user`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tbl_user_billing_add`
--
ALTER TABLE `tbl_user_billing_add`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `tbl_blog`
--
ALTER TABLE `tbl_blog`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `tbl_company_info`
--
ALTER TABLE `tbl_company_info`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `tbl_orders`
--
ALTER TABLE `tbl_orders`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `tbl_product`
--
ALTER TABLE `tbl_product`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=35;

--
-- AUTO_INCREMENT for table `tbl_product_description`
--
ALTER TABLE `tbl_product_description`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- AUTO_INCREMENT for table `tbl_promocode`
--
ALTER TABLE `tbl_promocode`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `tbl_services`
--
ALTER TABLE `tbl_services`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `tbl_state`
--
ALTER TABLE `tbl_state`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `tbl_user`
--
ALTER TABLE `tbl_user`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `tbl_user_billing_add`
--
ALTER TABLE `tbl_user_billing_add`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `tbl_product_description`
--
ALTER TABLE `tbl_product_description`
  ADD CONSTRAINT `tbl_product_description_ibfk_1` FOREIGN KEY (`prod_id`) REFERENCES `tbl_product` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
