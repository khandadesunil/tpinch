-- phpMyAdmin SQL Dump
-- version 4.0.4
-- http://www.phpmyadmin.net
--
-- Host: localhost
-- Generation Time: May 20, 2014 at 09:03 AM
-- Server version: 5.6.12-log
-- PHP Version: 5.4.16

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `taskpinch`
--

-- --------------------------------------------------------

--
-- Table structure for table `admin_user`
--

CREATE TABLE IF NOT EXISTS `admin_user` (
  `user_admin_id` int(11) NOT NULL AUTO_INCREMENT,
  `created_date` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `admin_name` varchar(255) NOT NULL,
  `admin_email` varchar(50) NOT NULL,
  `admin_password` varchar(50) NOT NULL,
  `admin_role` int(11) NOT NULL,
  `admin_status` varchar(20) NOT NULL DEFAULT 'Active',
  PRIMARY KEY (`user_admin_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=2 ;

--
-- Dumping data for table `admin_user`
--

INSERT INTO `admin_user` (`user_admin_id`, `created_date`, `admin_name`, `admin_email`, `admin_password`, `admin_role`, `admin_status`) VALUES
(1, '2014-05-20 03:17:00', 'Taskpinch Admin', 'admin@taskpinch.com', 'cc03e747a6afbbcbf8be7668acfebee5', 1, 'Active');

-- --------------------------------------------------------

--
-- Table structure for table `ads`
--

CREATE TABLE IF NOT EXISTS `ads` (
  `ads_id` int(11) NOT NULL AUTO_INCREMENT,
  `created_date` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `ad_name` varchar(200) NOT NULL,
  `ad_company` varchar(200) NOT NULL,
  `ad_email` varchar(200) NOT NULL,
  `ad_contact` varchar(200) NOT NULL,
  `ad_link` varchar(200) NOT NULL,
  `ad_banner` varchar(200) NOT NULL,
  `ad_position` varchar(200) NOT NULL,
  `ad_type` varchar(200) NOT NULL,
  `ad_from` datetime NOT NULL,
  `ad_upto` datetime NOT NULL,
  `ad_price` decimal(9,2) NOT NULL,
  `status` varchar(20) NOT NULL DEFAULT 'Pending',
  PRIMARY KEY (`ads_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=5 ;

--
-- Dumping data for table `ads`
--

INSERT INTO `ads` (`ads_id`, `created_date`, `ad_name`, `ad_company`, `ad_email`, `ad_contact`, `ad_link`, `ad_banner`, `ad_position`, `ad_type`, `ad_from`, `ad_upto`, `ad_price`, `status`) VALUES
(1, '2014-05-20 04:49:52', 'BI', 'BI', 'test@test.com', '1234567890', 'http://www.example1.com', 'ads1.png', 'Right', 'Promotion', '2014-05-01 00:00:00', '2014-05-16 00:00:00', '8000.00', 'Active'),
(2, '2014-05-20 04:49:52', 'SMC', 'SMC', '', '', 'http://www.example2.com', 'ads2.png', 'Right', 'Launch', '2014-05-01 00:00:00', '2014-05-16 00:00:00', '10000.00', 'Active'),
(3, '2014-05-20 04:49:52', 'CANNES', 'CANNES', '', '', 'http://www.example3.com', 'ads3.png', 'Right', 'Promotion', '2014-05-01 00:00:00', '2014-05-16 00:00:00', '10000.00', 'Active'),
(4, '2014-05-20 04:49:52', 'UNITY', 'UNITY', '', '', 'http://www.example4.com', 'ads4.png', 'Right', 'Promotion', '2014-05-01 00:00:00', '2014-05-16 00:00:00', '12000.00', 'Active');

-- --------------------------------------------------------

--
-- Table structure for table `ads_request`
--

CREATE TABLE IF NOT EXISTS `ads_request` (
  `ad_req_id` int(11) NOT NULL AUTO_INCREMENT,
  `created_date` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `req_name` varchar(200) NOT NULL,
  `req_email` varchar(200) NOT NULL,
  `req_desc` varchar(200) NOT NULL,
  `status` varchar(20) NOT NULL DEFAULT 'Active',
  PRIMARY KEY (`ad_req_id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Table structure for table `email_log`
--

CREATE TABLE IF NOT EXISTS `email_log` (
  `email_log_id` int(11) NOT NULL AUTO_INCREMENT,
  `created_date` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `email_type` varchar(200) NOT NULL,
  `email_to` varchar(200) NOT NULL,
  `email_cc` varchar(200) NOT NULL,
  `email_subject` varchar(200) NOT NULL,
  PRIMARY KEY (`email_log_id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Table structure for table `email_template`
--

CREATE TABLE IF NOT EXISTS `email_template` (
  `email_template_id` int(11) NOT NULL AUTO_INCREMENT,
  `created_date` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `email_type` varchar(2000) NOT NULL,
  `email_from` varchar(1000) NOT NULL,
  `email_cc` varchar(1000) NOT NULL,
  `email_subject` varchar(255) NOT NULL,
  `email_body` text NOT NULL,
  `status` varchar(20) NOT NULL DEFAULT 'Active',
  PRIMARY KEY (`email_template_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=14 ;

--
-- Dumping data for table `email_template`
--

INSERT INTO `email_template` (`email_template_id`, `created_date`, `email_type`, `email_from`, `email_cc`, `email_subject`, `email_body`, `status`) VALUES
(1, '2014-05-19 03:12:29', 'Registration', 'Taskpinch.com <support@taskpinch.com>', 'khandade.sunil@gmail.com', 'Thanks For Signing up on Taskpinch.com', '<html>\r\n<head>\r\n<title>Thanks For Signing up on Taskpinch.com</title>\r\n<style>\r\nhtml {font: 100%/1.5 tahoma, arial, helvetica, lucida sans, sans-serif;font-size : 12px;position: relative;}\r\n</style>\r\n</head>\r\n<body>\r\n	<div style="border:1px solid;width:97%;padding:0.5em;">\r\n		<div class="email_header">\r\n			<img alt="" src="http://www.taskpinch.com/email/taskpinch-logo.png"/>\r\n		</div>\r\n		<div style="padding-left:3em">\r\n			<h3>Congratulations [USERNAME] !!</h3>\r\n			Just click on below link to activate your account and there you go......<br /><br />\r\n			<a href="[LINK]" style="border-radius:10px;border:2px solid #ffffff;background-color:#009900;font-weight:bold;color:#ffffff;text-decoration:none;font-size:12px;padding:0.7em" target="_blank">\r\n				Activate My Account\r\n			</a><br /><br />\r\n			OR alternatively, You can copy below link and paste in your browser''s address bar <br /><br />\r\n			<a href="[LINK]">[LINK]</a><br /><br />\r\n		</div>\r\n		<div style="font-size:12px;background:none repeat scroll 0 0 rgba(0, 0, 0, 0.7);padding:1em;color:#fff">\r\n			© 2014 <a href="http://www.taskpinch.com" target="_blank" style="color:#4EC7B8">Taskpinch.com</a>. All rights reserved |\r\n			Call Us : +91 99169 61639 | \r\n			<a href="mailto:support@taskpinch.com" style="color:#4EC7B8">Email Us</a> | \r\n			<a href="http://www.taskpinch.com/feedback" target="_blank" style="color:#4EC7B8">Feedback</a> | \r\n			Connect : <a href="http://www.facebook.com/taskpinch" target="_blank" style="color:#4EC7B8">Facebook</a> \r\n			<a href="http://www.linkedin.com/taskpinch" target="_blank" style="color:#4EC7B8">LinkedIn</a> \r\n			<a href="http://www.twitter.com/taskpinch" target="_blank" style="color:#4EC7B8">Twitter</a>\r\n		</div>\r\n	</div>\r\n</body>\r\n</html>', 'Active'),
(2, '2014-05-19 03:16:00', 'Bid', 'Taskpinch.com <support@taskpinch.com>', 'khandade.sunil@gmail.com', 'Thanks For Bidding', '<html>\r\n<head>\r\n<title>Thanks For Bidding</title>\r\n<style>\r\nhtml {font: 100%/1.5 tahoma, arial, helvetica, lucida sans, sans-serif;font-size : 12px;position: relative;}\r\n</style>\r\n</head>\r\n<body>\r\n	<div style="border:1px solid;width:97%;padding:0.5em;">\r\n		<div class="email_header">\r\n			<img src="http://www.taskpinch.com/email/taskpinch-logo.png">\r\n		</div>\r\n		<div style="padding-left:3em">\r\n			<h3>Dear [USERNAME],</h3>\r\n			Just now you bid for a job with bid amount <a href="javascript:void(0);" style="border-radius:10px;border:2px solid #ffffff;background-color:#009900;font-weight:bold;color:#ffffff;text-decoration:none;font-size:12px;padding:0.7em">&#x20B9; [BIDAMOUNT]</a><br /><br />\r\n			Task details are below<br /><br />\r\n			<div style="width:10%;float:left;">Task Name</div><div style="width:90%;float:left;">: &nbsp; [JOBNAME]</div><br />\r\n			<div style="width:10%;float:left;">Posted By</div><div style="width:90%;float:left;">: &nbsp; [POSTER] on [POSTDATE]</div><br />\r\n			<div style="width:10%;float:left;">Task Price</div><div style="width:90%;float:left;">: &nbsp; &#x20B9; [PRICE]</div><br />\r\n			<br />\r\n		</div>\r\n		<div style="font-size:12px;background:none repeat scroll 0 0 rgba(0, 0, 0, 0.7);padding:1em;color:#fff">\r\n			© 2014 <a href="http://www.taskpinch.com" target="_blank" style="color:#4EC7B8">Taskpinch.com</a>. All rights reserved |\r\n			Call Us : +91 99169 61639 | \r\n			<a href="mailto:support@taskpinch.com" style="color:#4EC7B8">Email Us</a> | \r\n			<a href="http://www.taskpinch.com/feedback" target="_blank" style="color:#4EC7B8">Feedback</a> | \r\n			Connect : <a href="http://www.facebook.com/taskpinch" target="_blank" style="color:#4EC7B8">Facebook</a> \r\n			<a href="http://www.linkedin.com/taskpinch" target="_blank" style="color:#4EC7B8">LinkedIn</a> \r\n			<a href="http://www.twitter.com/taskpinch" target="_blank" style="color:#4EC7B8">Twitter</a>\r\n		</div>\r\n	</div>\r\n</body>\r\n</html>', 'Active'),
(3, '2014-05-19 03:16:00', 'BidReceived', 'Taskpinch.com <support@taskpinch.com>', 'khandade.sunil@gmail.com', 'You have received bid for your posted job', '<html>\r\n<head>\r\n<title>You have received bid for your posted job</title>\r\n<style>\r\nhtml {font: 100%/1.5 tahoma, arial, helvetica, lucida sans, sans-serif;font-size : 12px;position: relative;}\r\n</style>\r\n</head>\r\n<body>\r\n	<div style="border:1px solid;width:97%;padding:0.5em;">\r\n		<div class="email_header">\r\n			<img src="http://www.taskpinch.com/email/taskpinch-logo.png">\r\n		</div>\r\n		<div style="padding-left:3em">\r\n			<h3>Dear Jobposter,</h3>\r\n			You have received bid for your posted job with bid amount <a href="javascript:void(0);" style="border-radius:10px;border:2px solid #ffffff;background-color:#009900;font-weight:bold;color:#ffffff;text-decoration:none;font-size:12px;padding:0.7em">&#x20B9; [BIDAMOUNT]</a> by [BIDDER]<br /><br />\r\n			Your Task details are below<br /><br />\r\n			<div style="width:10%;float:left;">Task Name</div><div style="width:90%;float:left;">: &nbsp; [JOBNAME]</div><br />\r\n			<div style="width:10%;float:left;">Task Price</div><div style="width:90%;float:left;">: &nbsp; &#x20B9; [PRICE]</div><br />\r\n			<br />\r\n		</div>\r\n		<div style="font-size:12px;background:none repeat scroll 0 0 rgba(0, 0, 0, 0.7);padding:1em;color:#fff">\r\n			© 2014 <a href="http://www.taskpinch.com" target="_blank" style="color:#4EC7B8">Taskpinch.com</a>. All rights reserved |\r\n			Call Us : +91 99169 61639 | \r\n			<a href="mailto:support@taskpinch.com" style="color:#4EC7B8">Email Us</a> | \r\n			<a href="http://www.taskpinch.com/feedback" target="_blank" style="color:#4EC7B8">Feedback</a> | \r\n			Connect : <a href="http://www.facebook.com/taskpinch" target="_blank" style="color:#4EC7B8">Facebook</a> \r\n			<a href="http://www.linkedin.com/taskpinch" target="_blank" style="color:#4EC7B8">LinkedIn</a> \r\n			<a href="http://www.twitter.com/taskpinch" target="_blank" style="color:#4EC7B8">Twitter</a>\r\n		</div>\r\n	</div>\r\n</body>\r\n</html>', 'Active'),
(4, '2014-05-19 03:16:00', 'Feedback', 'Taskpinch.com <support@taskpinch.com>', 'khandade.sunil@gmail.com', 'Thank you for your feedback', '<html>\r\n<head>\r\n<title>Thank you for your feedback</title>\r\n<style>\r\nhtml {font: 100%/1.5 tahoma, arial, helvetica, lucida sans, sans-serif;font-size : 12px;position: relative;}\r\n</style>\r\n</head>\r\n<body>\r\n	<div style="border:1px solid;width:97%;padding:0.5em;">\r\n		<div class="email_header">\r\n			<img src="http://www.taskpinch.com/email/taskpinch-logo.png">\r\n		</div>\r\n		<div style="padding-left:3em">\r\n			<h3>Dear [USERNAME],</h3>\r\n			Thank you very much for your feedback, Your view is important to us.<br /><br />\r\n			Surely we will get back to you on your query/issues<br /><br />\r\n			<br />\r\n		</div>\r\n		<div style="font-size:12px;background:none repeat scroll 0 0 rgba(0, 0, 0, 0.7);padding:1em;color:#fff">\r\n			© 2014 <a href="http://www.taskpinch.com" target="_blank" style="color:#4EC7B8">Taskpinch.com</a>. All rights reserved |\r\n			Call Us : +91 99169 61639 | \r\n			<a href="mailto:support@taskpinch.com" style="color:#4EC7B8">Email Us</a> | \r\n			<a href="http://www.taskpinch.com/feedback" target="_blank" style="color:#4EC7B8">Feedback</a> | \r\n			Connect : <a href="http://www.facebook.com/taskpinch" target="_blank" style="color:#4EC7B8">Facebook</a> \r\n			<a href="http://www.linkedin.com/taskpinch" target="_blank" style="color:#4EC7B8">LinkedIn</a> \r\n			<a href="http://www.twitter.com/taskpinch" target="_blank" style="color:#4EC7B8">Twitter</a>\r\n		</div>\r\n	</div>\r\n</body>\r\n</html>', 'Active'),
(5, '2014-05-19 03:16:00', 'GetInTouch', 'Taskpinch.com <support@taskpinch.com>', 'khandade.sunil@gmail.com', 'Get in Touch', '<html>\r\n<head>\r\n<title>Get in Touch</title>\r\n<style>\r\nhtml {font: 100%/1.5 tahoma, arial, helvetica, lucida sans, sans-serif;font-size : 12px;position: relative;}\r\n</style>\r\n</head>\r\n<body>\r\n	<div style="border:1px solid;width:97%;padding:0.5em;">\r\n		<div class="email_header">\r\n			<img src="http://www.taskpinch.com/email/taskpinch-logo.png">\r\n		</div>\r\n		<div style="padding-left:3em">\r\n			<h3>Dear User,</h3>\r\n			Here are details to get in touch <br />\r\n			<div style="bigdiv"><h4>Task Poster details</h4></div>\r\n			<div style="width:6%;float:left;">Name</div><div style="width:94%;float:left;">: &nbsp; [POSTERNAME]</div><br />\r\n			<div style="width:6%;float:left;">Email</div><div style="width:94%;float:left;">: &nbsp; [POSTEREMAIL]</div><br />\r\n			<div style="width:6%;float:left;">Contact</div><div style="width:94%;float:left;">: &nbsp; [POSTERCONTACT]</div><br />\r\n			<div style="width:6%;float:left;">Address</div><div style="width:94%;float:left;">: &nbsp; [POSTERADDRESS]</div><br /><br />\r\n			<div style="bigdiv"><h4>Task Bidder details</h4></div>\r\n			<div style="width:6%;float:left;">Name</div><div style="width:94%;float:left;">: &nbsp; [BIDDERNAME]</div><br />\r\n			<div style="width:6%;float:left;">Email</div><div style="width:94%;float:left;">: &nbsp; [BIDDEREMAIL]</div><br />\r\n			<div style="width:6%;float:left;">Contact</div><div style="width:94%;float:left;">: &nbsp; [BIDDERCONTACT]</div><br />\r\n			<div style="width:6%;float:left;">Address</div><div style="width:94%;float:left;">: &nbsp; [BIDDERADDRESS]</div><br />\r\n		</div>\r\n		<div style="clear:both"></div>\r\n		<br />\r\n		<div style="font-size:12px;background:none repeat scroll 0 0 rgba(0, 0, 0, 0.7);padding:1em;color:#fff">\r\n			© 2014 <a href="http://www.taskpinch.com" target="_blank" style="color:#4EC7B8">Taskpinch.com</a>. All rights reserved |\r\n			Call Us : +91 99169 61639 | \r\n			<a href="mailto:support@taskpinch.com" style="color:#4EC7B8">Email Us</a> | \r\n			<a href="http://www.taskpinch.com/feedback" target="_blank" style="color:#4EC7B8">Feedback</a> | \r\n			Connect : <a href="http://www.facebook.com/taskpinch" target="_blank" style="color:#4EC7B8">Facebook</a> \r\n			<a href="http://www.linkedin.com/taskpinch" target="_blank" style="color:#4EC7B8">LinkedIn</a> \r\n			<a href="http://www.twitter.com/taskpinch" target="_blank" style="color:#4EC7B8">Twitter</a>\r\n		</div>\r\n	</div>\r\n</body>\r\n</html>', 'Active'),
(6, '2014-05-19 03:16:00', 'OfferaPinch', 'Taskpinch.com <support@taskpinch.com>', 'khandade.sunil@gmail.com', 'Thanks For Offering a Pinch on Taskpinch.com', '<html>\r\n<head>\r\n<title>Thanks For Offering a Pinch on Taskpinch.com</title>\r\n<style>\r\nhtml {font: 100%/1.5 tahoma, arial, helvetica, lucida sans, sans-serif;font-size : 12px;position: relative;}\r\n</style>\r\n</head>\r\n<body>\r\n	<div style="border:1px solid;width:97%;padding:0.5em;">\r\n		<div class="email_header">\r\n			<img src="http://www.taskpinch.com/email/taskpinch-logo.png">\r\n		</div>\r\n		<div style="padding-left:3em">\r\n			<h3>Congratulations [USERNAME] !!</h3>\r\n			You have successfully posted a pinch. Please find the details of your Pinch.<br /><br />\r\n			<div style="bigdiv"><h4>Pinch details</h4></div>\r\n			<div style="width:10%;float:left;">Pinch Name</div><div style="width:90%;float:left;">: &nbsp; [PINCHNAME]</div><br />\r\n			<div style="width:10%;float:left;">Category</div><div style="width:90%;float:left;">: &nbsp; [PINCHCAT]</div><br />\r\n			<div style="width:10%;float:left;">Budget</div><div style="width:90%;float:left;">: &nbsp; [PINCHBUDGET]</div><br />\r\n			<div style="width:10%;float:left;">Area</div><div style="width:90%;float:left;">: &nbsp; [PINCHAREA]</div><br />\r\n			<div style="width:10%;float:left;">City</div><div style="width:90%;float:left;">: &nbsp; [PINCHCITY]</div><br />\r\n			<div style="width:10%;float:left;">Pincode</div><div style="width:90%;float:left;">: &nbsp; [PINCHPINCODE]</div><br />\r\n			<br />\r\n		</div>\r\n		<div style="font-size:12px;background:none repeat scroll 0 0 rgba(0, 0, 0, 0.7);padding:1em;color:#fff">\r\n			© 2014 <a href="http://www.taskpinch.com" target="_blank" style="color:#4EC7B8">Taskpinch.com</a>. All rights reserved |\r\n			Call Us : +91 99169 61639 | \r\n			<a href="mailto:support@taskpinch.com" style="color:#4EC7B8">Email Us</a> | \r\n			<a href="http://www.taskpinch.com/feedback" target="_blank" style="color:#4EC7B8">Feedback</a> | \r\n			Connect : <a href="http://www.facebook.com/taskpinch" target="_blank" style="color:#4EC7B8">Facebook</a> \r\n			<a href="http://www.linkedin.com/taskpinch" target="_blank" style="color:#4EC7B8">LinkedIn</a> \r\n			<a href="http://www.twitter.com/taskpinch" target="_blank" style="color:#4EC7B8">Twitter</a>\r\n		</div>\r\n	</div>\r\n</body>\r\n</html>', 'Active'),
(7, '2014-05-19 03:16:00', 'PostaJob', 'Taskpinch.com <support@taskpinch.com>', 'khandade.sunil@gmail.com', 'Thanks For Posting a Task on Taskpinch.com', '<html>\r\n<head>\r\n<title>Thanks For Posting a Task on Taskpinch.com</title>\r\n<style>\r\nhtml {font: 100%/1.5 tahoma, arial, helvetica, lucida sans, sans-serif;font-size : 12px;position: relative;}\r\n</style>\r\n</head>\r\n<body>\r\n	<div style="border:1px solid;width:97%;padding:0.5em;">\r\n		<div style="email_header">\r\n			<img src="http://www.taskpinch.com/email/taskpinch-logo.png">\r\n		</div>\r\n		<div style="padding-left:3em">\r\n			<h3>Congratulations [USERNAME] !!</h3>\r\n			You have successfully posted a job. Please find the details of your job.<br /><br />\r\n			<div style="bigdiv"><h4>Task details</h4></div>\r\n			<div style="width:10%;float:left;">Task Name</div><div style="width:90%;float:left;">: &nbsp; [JOBNAME]</div><br />\r\n			<div style="width:10%;float:left;">Description</div><div style="width:90%;float:left;">: &nbsp; [JOBDESC]</div><br />\r\n			<div style="width:10%;float:left;">Category</div><div style="width:90%;float:left;">: &nbsp; [JOBCAT]</div><br />\r\n			<div style="width:10%;float:left;">Budget</div><div style="width:90%;float:left;">: &nbsp; [JOBBUDGET]</div><br />\r\n			<div style="width:10%;float:left;">Required Days</div><div style="width:90%;float:left;">: &nbsp; [JOBDAYS]</div><br />\r\n			<div style="width:10%;float:left;">Area</div><div style="width:90%;float:left;">: &nbsp; [JOBAREA]</div><br />\r\n			<div style="width:10%;float:left;">City</div><div style="width:90%;float:left;">: &nbsp; [JOBCITY]</div><br />\r\n			<div style="width:10%;float:left;">Pincode</div><div style="width:90%;float:left;">: &nbsp; [JOBPINCODE]</div><br />\r\n			<br />\r\n		</div>\r\n		<div style="font-size:12px;background:none repeat scroll 0 0 rgba(0, 0, 0, 0.7);padding:1em;color:#fff">\r\n			© 2014 <a href="http://www.taskpinch.com" target="_blank" style="color:#4EC7B8">Taskpinch.com</a>. All rights reserved |\r\n			Call Us : +91 99169 61639 | \r\n			<a href="mailto:support@taskpinch.com" style="color:#4EC7B8">Email Us</a> | \r\n			<a href="http://www.taskpinch.com/feedback" target="_blank" style="color:#4EC7B8">Feedback</a> | \r\n			Connect : <a href="http://www.facebook.com/taskpinch" target="_blank" style="color:#4EC7B8">Facebook</a> \r\n			<a href="http://www.linkedin.com/taskpinch" target="_blank" style="color:#4EC7B8">LinkedIn</a> \r\n			<a href="http://www.twitter.com/taskpinch" target="_blank" style="color:#4EC7B8">Twitter</a>\r\n		</div>\r\n	</div>\r\n</body>\r\n</html>', 'Active'),
(8, '2014-05-19 03:16:00', 'Share', 'Taskpinch.com <support@taskpinch.com>', 'khandade.sunil@gmail.com', 'Thank you for Sharing the link', '<html>\r\n<head>\r\n<title>Thank you for Sharing the link</title>\r\n<style>\r\nhtml {font: 100%/1.5 tahoma, arial, helvetica, lucida sans, sans-serif;font-size : 12px;position: relative;}\r\n</style>\r\n</head>\r\n<body>\r\n	<div style="border:1px solid;width:97%;padding:0.5em;">\r\n		<div class="email_header">\r\n			<img src="http://www.taskpinch.com/email/taskpinch-logo.png">\r\n		</div>\r\n		<div style="padding-left:3em">\r\n			<h3>Dear [USERNAME],</h3>\r\n			Thank you very much for Sharing the link.<br /><br />\r\n			We will help your closed one to earn by doing their favourite job.<br /><br />\r\n			<br />\r\n		</div>\r\n		<div style="font-size:12px;background:none repeat scroll 0 0 rgba(0, 0, 0, 0.7);padding:1em;color:#fff">\r\n			© 2014 <a href="http://www.taskpinch.com" target="_blank" style="color:#4EC7B8">Taskpinch.com</a>. All rights reserved |\r\n			Call Us : +91 99169 61639 | \r\n			<a href="mailto:support@taskpinch.com" style="color:#4EC7B8">Email Us</a> | \r\n			<a href="http://www.taskpinch.com/feedback" target="_blank" style="color:#4EC7B8">Feedback</a> | \r\n			Connect : <a href="http://www.facebook.com/taskpinch" target="_blank" style="color:#4EC7B8">Facebook</a> \r\n			<a href="http://www.linkedin.com/taskpinch" target="_blank" style="color:#4EC7B8">LinkedIn</a> \r\n			<a href="http://www.twitter.com/taskpinch" target="_blank" style="color:#4EC7B8">Twitter</a>\r\n		</div>\r\n	</div>\r\n</body>\r\n</html>', 'Active'),
(9, '2014-05-19 03:16:00', 'SubscriptionExpiry', 'Taskpinch.com <support@taskpinch.com>', 'khandade.sunil@gmail.com', 'Your Subscription is Expired!', '<html>\r\n<head>\r\n<title>Your Subscription is Expired!</title>\r\n<style>\r\nhtml {font: 100%/1.5 tahoma, arial, helvetica, lucida sans, sans-serif;font-size : 12px;position: relative;}\r\n</style>\r\n</head>\r\n<body>\r\n	<div style="border:1px solid;width:97%;padding:0.5em;">\r\n		<div style="email_header">\r\n			<img src="http://www.taskpinch.com/email/taskpinch-logo.png">\r\n		</div>\r\n		<div style="padding-left:3em">\r\n			<h3>Dear [USERNAME],</h3>\r\n			Your subscription is expired! Kindly get it <a href="[LINK]">renewed</a> to continue using the Taskpinch advanced features.<br /><br />\r\n			Your subscription details are<br /><br />\r\n			<div style="width:10%;float:left;">Subscription from</div><div style="width:90%;float:left;">: &nbsp; [SUBFROM]</div><br />\r\n			<div style="width:10%;float:left;">Subscription upto</div><div style="width:90%;float:left;">: &nbsp; [SUBUPTO]</div><br /><br />			\r\n			<br />\r\n		</div>\r\n		<div style="font-size:12px;background:none repeat scroll 0 0 rgba(0, 0, 0, 0.7);padding:1em;color:#fff">\r\n			© 2014 <a href="http://www.taskpinch.com" target="_blank" style="color:#4EC7B8">Taskpinch.com</a>. All rights reserved |\r\n			Call Us : +91 99169 61639 | \r\n			<a href="mailto:support@taskpinch.com" style="color:#4EC7B8">Email Us</a> | \r\n			<a href="http://www.taskpinch.com/feedback" target="_blank" style="color:#4EC7B8">Feedback</a> | \r\n			Connect : <a href="http://www.facebook.com/taskpinch" target="_blank" style="color:#4EC7B8">Facebook</a> \r\n			<a href="http://www.linkedin.com/taskpinch" target="_blank" style="color:#4EC7B8">LinkedIn</a> \r\n			<a href="http://www.twitter.com/taskpinch" target="_blank" style="color:#4EC7B8">Twitter</a>\r\n		</div>\r\n	</div>\r\n</body>\r\n</html>', 'Active'),
(10, '2014-05-19 03:16:00', 'SubscriptionExpiryReminder', 'Taskpinch.com <support@taskpinch.com>', 'khandade.sunil@gmail.com', 'Subscription Expiration Reminder!', '<html>\r\n<head>\r\n<title>Subscription Expiration Reminder!</title>\r\n<style>\r\nhtml {font: 100%/1.5 tahoma, arial, helvetica, lucida sans, sans-serif;font-size : 12px;position: relative;}\r\n</style>\r\n</head>\r\n<body>\r\n	<div style="border:1px solid;width:97%;padding:0.5em;">\r\n		<div style="email_header">\r\n			<img src="http://www.taskpinch.com/email/taskpinch-logo.png">\r\n		</div>\r\n		<div style="padding-left:3em">\r\n			<h3>Dear [USERNAME],</h3>\r\n			Your subscription with details below is expiring in <strong>[DAYS]</strong> day(s)<br /><br />\r\n			Your subscription details are below<br /><br />\r\n			<div style="width:10%;float:left;">Subscription from</div><div style="width:90%;float:left;">: &nbsp; [SUBFROM]</div><br />\r\n			<div style="width:10%;float:left;">Subscription upto</div><div style="width:90%;float:left;">: &nbsp; [SUBUPTO]</div><br /><br />\r\n			Kindly get it <a href="[LINK]">renewed</a> to continue using the Taskpinch advanced features.<br /><br />\r\n			<br />\r\n		</div>\r\n		<div style="font-size:12px;background:none repeat scroll 0 0 rgba(0, 0, 0, 0.7);padding:1em;color:#fff">\r\n			© 2014 <a href="http://www.taskpinch.com" target="_blank" style="color:#4EC7B8">Taskpinch.com</a>. All rights reserved |\r\n			Call Us : +91 99169 61639 | \r\n			<a href="mailto:support@taskpinch.com" style="color:#4EC7B8">Email Us</a> | \r\n			<a href="http://www.taskpinch.com/feedback" target="_blank" style="color:#4EC7B8">Feedback</a> | \r\n			Connect : <a href="http://www.facebook.com/taskpinch" target="_blank" style="color:#4EC7B8">Facebook</a> \r\n			<a href="http://www.linkedin.com/taskpinch" target="_blank" style="color:#4EC7B8">LinkedIn</a> \r\n			<a href="http://www.twitter.com/taskpinch" target="_blank" style="color:#4EC7B8">Twitter</a>\r\n		</div>\r\n	</div>\r\n</body>\r\n</html>', 'Active'),
(11, '2014-05-19 03:16:00', 'AdsUserRequest', 'Taskpinch.com <support@taskpinch.com>', 'khandade.sunil@gmail.com', 'Thank you for Showing an interest to Advertise with Us', '<html>\r\n<head>\r\n<title>Thank you for Showing an interest to Advertise with Us</title>\r\n<style>\r\nhtml {font: 100%/1.5 tahoma, arial, helvetica, lucida sans, sans-serif;font-size : 12px;position: relative;}\r\n</style>\r\n</head>\r\n<body>\r\n	<div style="border:1px solid;width:97%;padding:0.5em;">\r\n		<div class="email_header">\r\n			<img src="http://www.taskpinch.com/email/taskpinch-logo.png">\r\n		</div>\r\n		<div style="padding-left:3em">\r\n			<h3>Dear [USERNAME],</h3>\r\n			Thank you for Showing an interest to Advertise with Us.<br /><br />\r\n			We will get in touch with you shortly to get more details and plans for advertising with us.<br /><br />\r\n			<br />\r\n		</div>\r\n		<div style="font-size:12px;background:none repeat scroll 0 0 rgba(0, 0, 0, 0.7);padding:1em;color:#fff">\r\n			© 2014 <a href="http://www.taskpinch.com" target="_blank" style="color:#4EC7B8">Taskpinch.com</a>. All rights reserved |\r\n			Call Us : +91 99169 61639 | \r\n			<a href="mailto:support@taskpinch.com" style="color:#4EC7B8">Email Us</a> | \r\n			<a href="http://www.taskpinch.com/feedback" target="_blank" style="color:#4EC7B8">Feedback</a> | \r\n			Connect : <a href="http://www.facebook.com/taskpinch" target="_blank" style="color:#4EC7B8">Facebook</a> \r\n			<a href="http://www.linkedin.com/taskpinch" target="_blank" style="color:#4EC7B8">LinkedIn</a> \r\n			<a href="http://www.twitter.com/taskpinch" target="_blank" style="color:#4EC7B8">Twitter</a>\r\n		</div>\r\n	</div>\r\n</body>\r\n</html>', 'Active'),
(12, '2014-05-19 03:16:00', 'AdsRequest', 'Taskpinch.com <support@taskpinch.com>', 'khandade.sunil@gmail.com', 'You have received an Advertisement Request', '<html>\r\n<head>\r\n<title>You have received an Advertisement Request</title>\r\n<style>\r\nhtml {font: 100%/1.5 tahoma, arial, helvetica, lucida sans, sans-serif;font-size : 12px;position: relative;}\r\n</style>\r\n</head>\r\n<body>\r\n	<div style="border:1px solid;width:97%;padding:0.5em;">\r\n		<div class="email_header">\r\n			<img src="http://www.taskpinch.com/email/taskpinch-logo.png">\r\n		</div>\r\n		<div style="padding-left:3em">\r\n			<h3>Dear Admin,</h3>\r\n			You have received an Advertisement Request.<br /><br />\r\n			Here are the requester''s details.<br /><br />\r\n			<div style="width:10%;float:left;">Requester Name</div><div style="width:90%;float:left;">: &nbsp; [REQNAME]</div><br />\r\n			<div style="width:10%;float:left;">Requester Email</div><div style="width:90%;float:left;">: &nbsp; [REQEMAIL]</div><br />\r\n			<br />\r\n		</div>\r\n		<div style="font-size:12px;background:none repeat scroll 0 0 rgba(0, 0, 0, 0.7);padding:1em;color:#fff">\r\n			© 2014 <a href="http://www.taskpinch.com" target="_blank" style="color:#4EC7B8">Taskpinch.com</a>. All rights reserved |\r\n			Call Us : +91 99169 61639 | \r\n			<a href="mailto:support@taskpinch.com" style="color:#4EC7B8">Email Us</a> | \r\n			<a href="http://www.taskpinch.com/feedback" target="_blank" style="color:#4EC7B8">Feedback</a> | \r\n			Connect : <a href="http://www.facebook.com/taskpinch" target="_blank" style="color:#4EC7B8">Facebook</a> \r\n			<a href="http://www.linkedin.com/taskpinch" target="_blank" style="color:#4EC7B8">LinkedIn</a> \r\n			<a href="http://www.twitter.com/taskpinch" target="_blank" style="color:#4EC7B8">Twitter</a>\r\n		</div>\r\n	</div>\r\n</body>\r\n</html>', 'Active'),
(13, '2014-05-19 03:24:54', 'ForgotPassword', 'Taskpinch.com <support@taskpinch.com>', 'khandade.sunil@gmail.com', 'Password Reset Request', '<html>\r\n<head>\r\n<title>Password Reset Request</title>\r\n<style>\r\nhtml {font: 100%/1.5 tahoma, arial, helvetica, lucida sans, sans-serif;font-size : 12px;position: relative;}\r\n</style>\r\n</head>\r\n<body>\r\n	<div style="border:1px solid;width:97%;padding:0.5em;">\r\n		<div class="email_header">\r\n			<img alt="" src="http://www.taskpinch.com/email/taskpinch-logo.png"/>\r\n		</div>\r\n		<div style="padding-left:3em">\r\n			<h3>Reset your Password</h3>\r\n			Please click on below button to reset your password<br /><br />\r\n			<a href="[LINK]" style="border-radius:10px;border:2px solid #ffffff;background-color:#009900;font-weight:bold;color:#ffffff;text-decoration:none;font-size:12px;padding:0.7em" target="_blank">\r\n				Reset My Password\r\n			</a><br /><br />\r\n			OR alternatively, You can copy below link and paste in your browser''s address bar <br /><br />\r\n			<a href="[LINK]">[LINK]</a><br /><br /><br />\r\n			Note : If you have NOT requested for Password reset for your account, Kindly email us immediately to <a href="mailto:support@taskpinch.com">support@taskpinch.com</a> <br /><br /><br />\r\n		</div>\r\n		<div style="font-size:12px;background:none repeat scroll 0 0 rgba(0, 0, 0, 0.7);padding:1em;color:#fff">\r\n			© 2014 <a href="http://www.taskpinch.com" target="_blank" style="color:#4EC7B8">Taskpinch.com</a>. All rights reserved |\r\n			Call Us : +91 99169 61639 | \r\n			<a href="mailto:support@taskpinch.com" style="color:#4EC7B8">Email Us</a> | \r\n			<a href="http://www.taskpinch.com/feedback" target="_blank" style="color:#4EC7B8">Feedback</a> | \r\n			Connect : <a href="http://www.facebook.com/taskpinch" target="_blank" style="color:#4EC7B8">Facebook</a> \r\n			<a href="http://www.linkedin.com/taskpinch" target="_blank" style="color:#4EC7B8">LinkedIn</a> \r\n			<a href="http://www.twitter.com/taskpinch" target="_blank" style="color:#4EC7B8">Twitter</a>\r\n		</div>\r\n	</div>\r\n</body>\r\n</html>', 'Active');

-- --------------------------------------------------------

--
-- Table structure for table `feedback`
--

CREATE TABLE IF NOT EXISTS `feedback` (
  `feedback_id` int(11) NOT NULL AUTO_INCREMENT,
  `created_date` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `name` varchar(200) NOT NULL,
  `email` varchar(255) NOT NULL,
  `type` varchar(255) NOT NULL,
  `comments` varchar(255) NOT NULL,
  PRIMARY KEY (`feedback_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=2 ;

--
-- Dumping data for table `feedback`
--

INSERT INTO `feedback` (`feedback_id`, `created_date`, `name`, `email`, `type`, `comments`) VALUES
(1, '2014-05-20 08:40:29', 'Anil', 'khandade.anil@gmail.com', 'feedback', 'This is nice portal, its very unique and worthy.');

-- --------------------------------------------------------

--
-- Table structure for table `job`
--

CREATE TABLE IF NOT EXISTS `job` (
  `job_id` int(11) NOT NULL AUTO_INCREMENT,
  `created_date` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `title` varchar(255) NOT NULL,
  `description` text NOT NULL,
  `job_type` varchar(20) NOT NULL,
  `job_picture` varchar(200) NOT NULL,
  `user_id` int(11) NOT NULL,
  `job_cat_id` int(11) NOT NULL,
  `city` varchar(50) NOT NULL,
  `area` varchar(50) NOT NULL,
  `pincode` varchar(20) NOT NULL,
  `budget` int(11) NOT NULL,
  `required_days` int(11) NOT NULL,
  `status` varchar(20) NOT NULL DEFAULT 'Moderation',
  `close_comments` varchar(500) NOT NULL,
  PRIMARY KEY (`job_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=8 ;

--
-- Dumping data for table `job`
--

INSERT INTO `job` (`job_id`, `created_date`, `title`, `description`, `job_type`, `job_picture`, `user_id`, `job_cat_id`, `city`, `area`, `pincode`, `budget`, `required_days`, `status`, `close_comments`) VALUES
(1, '2014-05-20 08:30:41', 'I can write amazing queries in SQL server 2012', 'I can write amazing queries in SQL server 2012 and fine tune the Database faster performance', 'pinch', '', 1, 59, 'Bangalore', 'Mysore Road', '560026', 5000, 0, 'Active', ''),
(2, '2014-05-20 08:30:41', 'I can design and develop the website', 'I can design and develop the website of your choice within 5 days', 'pinch', '', 1, 68, 'Bangalore', 'Mysore Road', '560026', 10000, 0, 'Active', ''),
(3, '2014-05-20 08:30:41', 'I can customize the wordpreass website', 'I can customize the wordpreass website as per your need', 'pinch', '', 1, 69, 'Bangalore', 'Mysore Road', '560026', 10000, 0, 'Active', ''),
(4, '2014-05-20 08:30:41', 'I can do online marketing for your product', 'I can do online marketing for your product at your budget', 'pinch', '', 3, 161, 'Pune City', 'Akurdi', '413512', 10000, 0, 'Active', ''),
(5, '2014-05-20 08:30:41', 'I can create a nice corporate presentation', 'I can create a nice corporate presentation for your business need', 'pinch', '', 3, 47, 'Pune City', 'Akurdi', '413512', 2500, 0, 'Active', ''),
(6, '2014-05-20 08:45:22', 'Looking for social plugins for my website', 'Looking for social plugins for my website', 'job', '', 1, 68, 'Bangalore', 'Mysore Road', '560026', 1000, 3, 'Active', ''),
(7, '2014-05-20 08:45:23', 'Need RSS feeds script for the php website', 'I Need RSS feeds script for the php website', 'job', '', 1, 68, 'Bangalore', 'Mysore Road', '560026', 2500, 5, 'Active', '');

-- --------------------------------------------------------

--
-- Table structure for table `job_area`
--

CREATE TABLE IF NOT EXISTS `job_area` (
  `job_area_id` int(11) NOT NULL AUTO_INCREMENT,
  `created_date` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `parent_job_id` int(11) NOT NULL,
  `area_name` varchar(255) NOT NULL,
  `status` varchar(20) NOT NULL DEFAULT 'Pending',
  PRIMARY KEY (`job_area_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=3 ;

--
-- Dumping data for table `job_area`
--

INSERT INTO `job_area` (`job_area_id`, `created_date`, `parent_job_id`, `area_name`, `status`) VALUES
(1, '2014-01-21 10:15:41', 0, 'South Zone', 'Active'),
(2, '2014-01-21 10:15:41', 1, 'Koramangala', 'Active');

-- --------------------------------------------------------

--
-- Table structure for table `job_bid`
--

CREATE TABLE IF NOT EXISTS `job_bid` (
  `job_bid_id` int(11) NOT NULL AUTO_INCREMENT,
  `created_date` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `job_id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `bid_amount` int(11) NOT NULL,
  `status` varchar(20) NOT NULL DEFAULT 'Active',
  PRIMARY KEY (`job_bid_id`),
  KEY `fk_job_job_bid_id` (`job_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=2 ;

--
-- Dumping data for table `job_bid`
--

INSERT INTO `job_bid` (`job_bid_id`, `created_date`, `job_id`, `user_id`, `bid_amount`, `status`) VALUES
(1, '2014-05-20 08:32:41', 2, 3, 10000, 'Active');

-- --------------------------------------------------------

--
-- Table structure for table `job_category`
--

CREATE TABLE IF NOT EXISTS `job_category` (
  `job_cat_id` int(11) NOT NULL AUTO_INCREMENT,
  `created` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `parent_cat_id` int(11) NOT NULL,
  `category_name` varchar(50) NOT NULL,
  `status` varchar(20) NOT NULL DEFAULT 'Pending',
  PRIMARY KEY (`job_cat_id`),
  UNIQUE KEY `category_name` (`category_name`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=185 ;

--
-- Dumping data for table `job_category`
--

INSERT INTO `job_category` (`job_cat_id`, `created`, `parent_cat_id`, `category_name`, `status`) VALUES
(1, '2014-01-30 05:02:33', 0, 'Advertising', 'Active'),
(2, '2014-01-30 10:05:22', 0, 'Business&nbsp;Assist', 'Active'),
(3, '2014-01-30 05:02:33', 0, 'Classes', 'Active'),
(4, '2014-01-30 10:07:03', 0, 'Computer&nbsp;Assist', 'Active'),
(5, '2014-01-30 10:07:03', 0, 'Event&nbsp;Assist', 'Active'),
(6, '2014-01-30 10:07:03', 0, 'Fun&nbsp;Bizarre', 'Active'),
(7, '2014-01-30 05:02:33', 0, 'Gifts', 'Active'),
(8, '2014-01-30 10:07:03', 0, 'Graphics&nbsp;Design', 'Active'),
(9, '2014-01-30 10:07:03', 0, 'Legal&nbsp;Assist', 'Active'),
(10, '2014-01-30 05:02:33', 0, 'Lifestyle', 'Active'),
(11, '2014-01-30 05:02:33', 0, 'Maintenance', 'Active'),
(12, '2014-01-30 10:07:03', 0, 'Music&nbsp;Audio', 'Active'),
(13, '2014-01-30 10:07:03', 0, 'Office&nbsp;Tasks', 'Active'),
(14, '2014-01-30 10:07:03', 0, 'Online&nbsp;Marketing', 'Active'),
(15, '2014-01-30 10:07:03', 0, 'Spiritual&nbsp;Healing', 'Active'),
(16, '2014-01-30 10:07:03', 0, 'Video&nbsp;Animation', 'Active'),
(17, '2014-01-30 10:07:03', 0, 'Writing&nbsp;Translation', 'Active'),
(18, '2014-01-30 10:03:10', 0, 'Other', 'Pending'),
(19, '2014-01-30 05:02:49', 0, 'Other1', 'Pending'),
(20, '2014-01-30 05:03:25', 0, 'Other2', 'Pending'),
(21, '2014-01-30 05:03:25', 0, 'Other3', 'Pending'),
(22, '2014-01-30 05:03:25', 0, 'Other4', 'Pending'),
(23, '2014-01-30 05:03:25', 0, 'Other5', 'Pending'),
(24, '2014-01-30 05:03:25', 0, 'Other6', 'Pending'),
(25, '2014-01-30 05:03:25', 0, 'Other7', 'Pending'),
(26, '2014-01-30 06:20:04', 0, 'Other8', 'Pending'),
(27, '2014-01-30 06:20:46', 0, 'Other9', 'Pending'),
(28, '2014-01-30 06:20:47', 0, 'Other10', 'Pending'),
(29, '2014-01-30 06:20:47', 0, 'Other11', 'Pending'),
(30, '2014-01-30 06:20:47', 0, 'Other12', 'Pending'),
(31, '2014-01-30 06:36:00', 1, 'Banner Advertising', 'Active'),
(32, '2014-01-08 04:29:54', 1, 'Flyers &amp; Handouts', 'Active'),
(33, '2014-01-08 04:29:54', 1, 'Hold Your Sign', 'Active'),
(34, '2014-01-08 04:29:54', 1, 'Human Billboards', 'Active'),
(35, '2014-01-08 04:29:54', 1, 'Music Promotion', 'Active'),
(36, '2014-01-08 04:29:54', 1, 'Outdoor Advertising', 'Active'),
(37, '2014-01-08 04:29:54', 1, 'Pet Models', 'Active'),
(38, '2014-01-08 04:29:54', 1, 'Radio', 'Active'),
(39, '2014-01-30 06:43:12', 1, 'Advertising Other', 'Active'),
(40, '2014-01-08 04:29:54', 2, 'Branding Services', 'Active'),
(41, '2014-01-08 04:29:54', 2, 'Business Plans', 'Active'),
(42, '2014-01-08 04:29:54', 2, 'Business Tips', 'Active'),
(43, '2014-01-08 04:29:54', 2, 'Career Advice', 'Active'),
(44, '2014-01-08 04:29:54', 2, 'Financial Consulting', 'Active'),
(45, '2014-01-08 04:29:54', 2, 'Legal Consulting', 'Active'),
(46, '2014-01-08 04:29:54', 2, 'Market Research', 'Active'),
(47, '2014-01-08 04:29:54', 2, 'Presentations', 'Active'),
(48, '2014-01-08 04:29:54', 2, 'Virtual Assistant', 'Active'),
(49, '2014-01-08 04:29:54', 2, 'Business Assist Other', 'Active'),
(50, '2014-01-08 04:29:54', 3, 'Acting Classes', 'Active'),
(51, '2014-01-08 04:29:54', 3, 'Dance Classes', 'Active'),
(52, '2014-01-08 04:29:54', 3, 'Language Classes', 'Active'),
(53, '2014-01-08 04:29:54', 3, 'Maths Classes', 'Active'),
(54, '2014-01-08 04:29:54', 3, 'Singing Classes', 'Active'),
(55, '2014-01-08 04:29:54', 3, 'Classes Other', 'Active'),
(56, '2014-01-08 04:29:54', 4, '.Net', 'Active'),
(57, '2014-01-08 04:29:54', 4, 'Buy & Assemble', 'Active'),
(58, '2014-01-08 04:29:54', 4, 'C++', 'Active'),
(59, '2014-01-08 04:29:54', 4, 'Databases', 'Active'),
(60, '2014-01-08 04:29:54', 4, 'Flash', 'Active'),
(61, '2014-01-08 04:29:54', 4, 'Hardware faults', 'Active'),
(62, '2014-01-08 04:29:54', 4, 'iOS, Android &amp; Mobile', 'Active'),
(63, '2014-01-08 04:29:54', 4, 'Java', 'Active'),
(64, '2014-01-08 04:29:54', 4, 'JavaScript', 'Active'),
(65, '2014-01-08 04:29:54', 4, 'PSD to HTML', 'Active'),
(66, '2014-01-08 04:29:54', 4, 'QA &amp; Software Testing', 'Active'),
(67, '2014-01-08 04:29:54', 4, 'Technology', 'Active'),
(68, '2014-01-08 04:29:54', 4, 'Web development', 'Active'),
(69, '2014-01-08 04:29:54', 4, 'WordPress', 'Active'),
(70, '2014-01-08 04:29:54', 4, 'Computer Assist Other', 'Active'),
(71, '2014-01-08 04:29:54', 5, 'Corporate activities', 'Active'),
(72, '2014-01-08 04:29:54', 5, 'Event management', 'Active'),
(73, '2014-01-08 04:29:54', 5, 'Master of Ceremonies(MC)', 'Active'),
(74, '2014-01-08 04:29:54', 5, 'Product Promotion', 'Active'),
(75, '2014-01-08 04:29:54', 5, 'Road Shows', 'Active'),
(76, '2014-01-08 04:29:54', 5, 'Event Assist Other', 'Active'),
(77, '2014-01-08 04:29:54', 6, 'Cartoons', 'Active'),
(78, '2014-01-08 04:29:54', 6, 'Celebrity Impersonators', 'Active'),
(79, '2014-01-08 04:29:54', 6, 'Dancers', 'Active'),
(80, '2014-01-08 04:29:54', 6, 'Extremely Bizarre', 'Active'),
(81, '2014-01-08 04:29:54', 6, 'Funny Images', 'Active'),
(82, '2014-01-08 04:29:54', 6, 'Jokes', 'Active'),
(83, '2014-01-08 04:29:54', 6, 'Pranks', 'Active'),
(84, '2014-01-08 04:29:54', 6, 'Fun &amp; Bizarre Other', 'Active'),
(85, '2014-01-08 04:29:54', 7, 'Arts &amp; Crafts', 'Active'),
(86, '2014-01-08 04:29:54', 7, 'Gifts for Geeks', 'Active'),
(87, '2014-01-08 04:29:54', 7, 'Greeting Cards', 'Active'),
(88, '2014-01-08 04:29:54', 7, 'Handmade Jewelry', 'Active'),
(89, '2014-01-08 04:29:54', 7, 'Postcards From...', 'Active'),
(90, '2014-01-08 04:29:54', 7, 'Recycled Crafts', 'Active'),
(91, '2014-01-08 04:29:54', 7, 'Unusual Gifts', 'Active'),
(92, '2014-01-08 04:29:54', 7, 'Video Greetings', 'Active'),
(93, '2014-01-08 04:29:54', 7, 'Gifts Other', 'Active'),
(94, '2014-01-08 04:29:54', 8, 'Architecture', 'Active'),
(95, '2014-01-08 04:29:54', 8, 'Banners &amp; Headers', 'Active'),
(96, '2014-01-08 04:29:54', 8, 'Business Cards', 'Active'),
(97, '2014-01-08 04:29:54', 8, 'Cartoons &amp; Caricatures', 'Active'),
(98, '2014-01-08 04:29:54', 8, 'Ebook Covers &amp; Packages', 'Active'),
(99, '2014-01-08 04:29:54', 8, 'Flyers &amp; Brochures ', 'Active'),
(100, '2014-01-08 04:29:54', 8, 'Illustration', 'Active'),
(101, '2014-01-08 04:29:54', 8, 'Landing Pages', 'Active'),
(102, '2014-01-08 04:29:54', 8, 'Logo Design', 'Active'),
(103, '2014-01-08 04:29:54', 8, 'Photography &amp; Photoshopping', 'Active'),
(104, '2014-01-08 04:29:54', 8, 'Presentation Design', 'Active'),
(105, '2014-01-08 04:29:54', 8, 'Web Design &amp; UI', 'Active'),
(106, '2014-01-08 04:29:54', 8, 'Graphics &amp; Design Other', 'Active'),
(107, '2014-01-08 04:29:54', 9, 'Bookkeeping Services', 'Active'),
(108, '2014-01-08 04:29:54', 9, 'Compliance & Management', 'Active'),
(109, '2014-01-08 04:29:54', 9, 'Drafting Services', 'Active'),
(110, '2014-01-08 04:29:54', 9, 'Incorporation Services', 'Active'),
(111, '2014-01-08 04:29:54', 9, 'Legal Adviser', 'Active'),
(112, '2014-01-08 04:29:54', 9, 'Legal Documentation', 'Active'),
(113, '2014-01-08 04:29:54', 9, 'Money Planner', 'Active'),
(114, '2014-01-08 04:29:54', 9, 'Tax Adviser', 'Active'),
(115, '2014-01-08 04:29:54', 9, 'Legal Assist Other', 'Active'),
(116, '2014-01-08 04:29:54', 10, 'Cooking Recipes', 'Active'),
(117, '2014-01-08 04:29:54', 10, 'Diet &amp; Weight Loss', 'Active'),
(118, '2014-01-08 04:29:54', 10, 'Fitness Tips', 'Active'),
(119, '2014-01-08 04:29:54', 10, 'Health &amp; Fitness', 'Active'),
(120, '2014-01-08 04:29:54', 10, 'Makeup, Styling &amp; Beauty', 'Active'),
(121, '2014-01-08 04:29:54', 10, 'Parenting Tips', 'Active'),
(122, '2014-01-08 04:29:54', 10, 'Personal Yoga Tips', 'Active'),
(123, '2014-01-08 04:29:54', 10, 'Pet Care', 'Active'),
(124, '2014-01-08 04:29:54', 10, 'Relationship Advice', 'Active'),
(125, '2014-01-08 04:29:54', 10, 'Travel', 'Active'),
(126, '2014-01-08 04:29:54', 10, 'Lifestyle Other', 'Active'),
(127, '2014-01-08 04:29:54', 11, 'Carpentry', 'Active'),
(128, '2014-01-08 04:29:54', 11, 'Electrical', 'Active'),
(129, '2014-01-08 04:29:54', 11, 'Mechanic', 'Active'),
(130, '2014-01-08 04:29:54', 11, 'Office Maintenance', 'Active'),
(131, '2014-01-08 04:29:54', 11, 'Plumbing', 'Active'),
(132, '2014-01-08 04:29:54', 11, 'Maintenance Other', 'Active'),
(133, '2014-01-08 04:29:54', 12, 'Audio Editing &amp; Mastering', 'Active'),
(134, '2014-01-08 04:29:54', 12, 'Custom Ringtones', 'Active'),
(135, '2014-01-08 04:29:54', 12, 'Custom Songs', 'Active'),
(136, '2014-01-08 04:29:54', 12, 'Hip-Hop Music', 'Active'),
(137, '2014-01-08 04:29:54', 12, 'Jingles ', 'Active'),
(138, '2014-01-08 04:29:54', 12, 'Music Lessons', 'Active'),
(139, '2014-01-08 04:29:54', 12, 'Narration &amp; Voice-Over', 'Active'),
(140, '2014-01-08 04:29:54', 12, 'Rap Music', 'Active'),
(141, '2014-01-08 04:29:54', 12, 'Songwriting', 'Active'),
(142, '2014-01-08 04:29:54', 12, 'Sound Effects &amp; Loops', 'Active'),
(143, '2014-01-08 04:29:54', 12, 'Voicemail Greetings', 'Active'),
(144, '2014-01-08 04:29:54', 12, 'Music &amp; Audio Other', 'Active'),
(145, '2014-01-08 04:29:54', 13, 'Accounting', 'Active'),
(146, '2014-01-08 04:29:54', 13, 'Administrative', 'Active'),
(147, '2014-01-08 04:29:54', 13, 'Data Entry', 'Active'),
(148, '2014-01-08 04:29:54', 13, 'Office Cleaning', 'Active'),
(149, '2014-01-08 04:29:54', 13, 'Office Tasks Other', 'Active'),
(150, '2014-01-08 04:29:54', 14, 'Article &amp; PR Submission', 'Active'),
(151, '2014-01-08 04:29:54', 14, 'Blog Mentions', 'Active'),
(152, '2014-01-08 04:29:54', 14, 'Bookmarking &amp; Links', 'Active'),
(153, '2014-01-08 04:29:54', 14, 'Domain Research', 'Active'),
(154, '2014-01-08 04:29:54', 14, 'Fan Pages', 'Active'),
(155, '2014-01-08 04:29:54', 14, 'Get Traffic', 'Active'),
(156, '2014-01-08 04:29:54', 14, 'Keywords Research', 'Active'),
(157, '2014-01-08 04:29:54', 14, 'SEO', 'Active'),
(158, '2014-01-08 04:29:54', 14, 'Social Marketing', 'Active'),
(159, '2014-01-08 04:29:54', 14, 'Video Marketing', 'Active'),
(160, '2014-01-08 04:29:54', 14, 'Web Analytics', 'Active'),
(161, '2014-01-08 04:29:54', 14, 'Online Marketing Other', 'Active'),
(162, '2014-01-08 04:29:54', 15, 'Astrology &amp; Fortune Telling', 'Active'),
(163, '2014-01-08 04:29:54', 15, 'Vastu/Feng-shui', 'Active'),
(164, '2014-01-08 04:29:54', 15, 'Spiritual &amp; Healing Other', 'Active'),
(165, '2014-01-08 04:29:54', 16, 'Animation &amp; 3D', 'Active'),
(166, '2014-01-08 04:29:54', 16, 'Commercials', 'Active'),
(167, '2014-01-08 04:29:54', 16, 'Editing &amp; Post Production', 'Active'),
(168, '2014-01-08 04:29:54', 16, 'Intros', 'Active'),
(169, '2014-01-08 04:29:54', 16, 'Puppets', 'Active'),
(170, '2014-01-08 04:29:54', 16, 'Stop Motion', 'Active'),
(171, '2014-01-08 04:29:54', 16, 'Testimonials &amp; Reviews by Actors', 'Active'),
(172, '2014-01-08 04:29:54', 16, 'Video &amp; Animation Other', 'Active'),
(173, '2014-01-08 04:29:54', 17, 'Copywriting', 'Active'),
(174, '2014-01-08 04:29:54', 17, 'Creative Writing &amp; Scripting', 'Active'),
(175, '2014-01-08 04:29:54', 17, 'Press Releases', 'Active'),
(176, '2014-01-08 04:29:54', 17, 'Proofreading &amp; Editing', 'Active'),
(177, '2014-01-08 04:29:54', 17, 'Resumes &amp; Cover Letters', 'Active'),
(178, '2014-01-08 04:29:54', 17, 'Reviews', 'Active'),
(179, '2014-01-08 04:29:54', 17, 'SEO Keyword Optimization', 'Active'),
(180, '2014-01-08 04:29:54', 17, 'Speech Writing', 'Active'),
(181, '2014-01-08 04:29:54', 17, 'Transcripts', 'Active'),
(182, '2014-01-08 04:29:54', 17, 'Translation', 'Active'),
(183, '2014-01-08 04:29:54', 17, 'Website Content', 'Active'),
(184, '2014-01-08 04:29:54', 17, 'Writing &amp; Translation Other', 'Active');

-- --------------------------------------------------------

--
-- Table structure for table `share_link`
--

CREATE TABLE IF NOT EXISTS `share_link` (
  `share_link_id` int(11) NOT NULL AUTO_INCREMENT,
  `created_date` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `name` varchar(200) NOT NULL,
  `email` varchar(200) NOT NULL,
  `friend_email` varchar(255) NOT NULL,
  `link` varchar(255) NOT NULL,
  `comments` varchar(255) NOT NULL,
  PRIMARY KEY (`share_link_id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE IF NOT EXISTS `user` (
  `user_id` int(14) NOT NULL AUTO_INCREMENT,
  `created_date` datetime NOT NULL,
  `email` varchar(100) NOT NULL,
  `password` varchar(100) NOT NULL,
  `gender` varchar(100) NOT NULL,
  `occupation` varchar(100) NOT NULL,
  `alt_email` varchar(100) NOT NULL,
  `linkedin_link` varchar(300) NOT NULL,
  `first_name` varchar(50) NOT NULL,
  `last_name` varchar(50) NOT NULL,
  `about_me` text NOT NULL,
  `skills` text NOT NULL,
  `address` varchar(250) NOT NULL,
  `city` varchar(50) NOT NULL,
  `pin_code` varchar(20) NOT NULL,
  `contact` varchar(50) NOT NULL,
  `photo` varchar(255) NOT NULL,
  `status` varchar(50) NOT NULL DEFAULT 'Pending',
  `sms_subscribe` varchar(5) NOT NULL DEFAULT 'Yes',
  `mob_veri_code` varchar(20) NOT NULL,
  PRIMARY KEY (`user_id`),
  UNIQUE KEY `email` (`email`),
  UNIQUE KEY `contact` (`contact`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=4 ;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`user_id`, `created_date`, `email`, `password`, `gender`, `occupation`, `alt_email`, `linkedin_link`, `first_name`, `last_name`, `about_me`, `skills`, `address`, `city`, `pin_code`, `contact`, `photo`, `status`, `sms_subscribe`, `mob_veri_code`) VALUES
(1, '2014-05-20 08:20:31', 'khandade.sunil@gmail.com', 'cc03e747a6afbbcbf8be7668acfebee5', 'male', '', '', '', 'Sunil', 'Khandade', 'I am experienced PHP developer', 'PHP, MySQL, Ajax, JQuery, HTML', '', '', '', '9916961639', '', 'Pinch2', 'Yes', ''),
(2, '2014-05-20 08:21:09', 'sulekha.pichare@gmail.com', 'cc03e747a6afbbcbf8be7668acfebee5', 'female', '', '', '', 'Sulekha', 'Pichare', '', '', '', '', '', '9880485938', '', 'Pinch2', 'Yes', ''),
(3, '2014-05-20 08:22:04', 'khandade.anil@gmail.com', 'cc03e747a6afbbcbf8be7668acfebee5', 'male', '', '', '', 'Anil', 'Khandade', '', '', '', '', '', '9850429966', '', 'Pinch2', 'Yes', '');

-- --------------------------------------------------------

--
-- Table structure for table `user_badges`
--

CREATE TABLE IF NOT EXISTS `user_badges` (
  `user_badge_id` int(11) NOT NULL AUTO_INCREMENT,
  `created_date` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `user_id` int(11) NOT NULL,
  `badge` varchar(50) NOT NULL,
  `status` varchar(20) NOT NULL DEFAULT 'Pending',
  PRIMARY KEY (`user_badge_id`),
  KEY `fk_user_badges_user_id` (`user_id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Table structure for table `user_likes`
--

CREATE TABLE IF NOT EXISTS `user_likes` (
  `user_like_id` int(11) NOT NULL AUTO_INCREMENT,
  `created_date` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `user_id` int(11) NOT NULL,
  `liked_to_user_id` int(11) NOT NULL,
  PRIMARY KEY (`user_like_id`),
  KEY `fk_user_likes_user_id` (`user_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=7 ;

--
-- Dumping data for table `user_likes`
--

INSERT INTO `user_likes` (`user_like_id`, `created_date`, `user_id`, `liked_to_user_id`) VALUES
(1, '2014-05-20 08:34:32', 3, 2),
(2, '2014-05-20 08:34:35', 3, 1),
(3, '2014-05-20 08:34:41', 3, 3),
(4, '2014-05-20 08:35:19', 1, 1),
(5, '2014-05-20 08:35:27', 1, 2),
(6, '2014-05-20 08:35:49', 1, 3);

-- --------------------------------------------------------

--
-- Table structure for table `user_rating`
--

CREATE TABLE IF NOT EXISTS `user_rating` (
  `user_rating_id` int(11) NOT NULL AUTO_INCREMENT,
  `created_date` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `user_id` int(11) DEFAULT NULL,
  `rating_to_user_id` int(11) DEFAULT NULL,
  `rating` int(11) DEFAULT NULL,
  PRIMARY KEY (`user_rating_id`),
  KEY `fk_user_rating_user_id` (`user_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=7 ;

--
-- Dumping data for table `user_rating`
--

INSERT INTO `user_rating` (`user_rating_id`, `created_date`, `user_id`, `rating_to_user_id`, `rating`) VALUES
(1, '2014-05-20 08:34:22', 3, 1, 4),
(2, '2014-05-20 08:34:28', 3, 2, 5),
(3, '2014-05-20 08:35:25', 1, 2, 5),
(4, '2014-05-20 08:35:52', 1, 3, 4),
(5, '2014-05-20 08:37:49', 3, 1, 4),
(6, '2014-05-20 08:37:54', 3, 1, 4);

-- --------------------------------------------------------

--
-- Table structure for table `user_session`
--

CREATE TABLE IF NOT EXISTS `user_session` (
  `user_sess_id` int(11) NOT NULL AUTO_INCREMENT,
  `user_id` int(11) NOT NULL,
  `ip_addr` varchar(100) NOT NULL,
  `time` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  PRIMARY KEY (`user_sess_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=6 ;

--
-- Dumping data for table `user_session`
--

INSERT INTO `user_session` (`user_sess_id`, `user_id`, `ip_addr`, `time`) VALUES
(1, 1, '::1', '2014-05-20 08:23:11'),
(2, 3, '::1', '2014-05-20 08:27:08'),
(3, 1, '::1', '2014-05-20 08:35:07'),
(4, 3, '::1', '2014-05-20 08:36:35'),
(5, 1, '::1', '2014-05-20 08:41:22');

-- --------------------------------------------------------

--
-- Table structure for table `user_subscription`
--

CREATE TABLE IF NOT EXISTS `user_subscription` (
  `sub_id` int(11) NOT NULL AUTO_INCREMENT,
  `user_id` int(11) NOT NULL,
  `sub_from` datetime NOT NULL,
  `sub_to` datetime NOT NULL,
  `status` varchar(20) NOT NULL DEFAULT 'Active',
  PRIMARY KEY (`sub_id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Table structure for table `user_testimonials`
--

CREATE TABLE IF NOT EXISTS `user_testimonials` (
  `user_testimonials_id` int(11) NOT NULL AUTO_INCREMENT,
  `created_date` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `user_id` int(11) NOT NULL,
  `testimonials_to_user_id` int(11) NOT NULL,
  `testimonials` varchar(255) NOT NULL,
  `status` varchar(20) NOT NULL DEFAULT 'Pending',
  PRIMARY KEY (`user_testimonials_id`),
  KEY `fk_user_testimonials_user_id` (`user_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=4 ;

--
-- Dumping data for table `user_testimonials`
--

INSERT INTO `user_testimonials` (`user_testimonials_id`, `created_date`, `user_id`, `testimonials_to_user_id`, `testimonials`, `status`) VALUES
(1, '2014-05-20 08:37:38', 1, 2, 'This is nice Profile', 'Active'),
(2, '2014-05-20 08:37:38', 1, 3, 'Impressive profile indeed.', 'Active'),
(3, '2014-05-20 08:37:38', 3, 1, 'Techno-commercial profile, very much impressive', 'Active');

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
