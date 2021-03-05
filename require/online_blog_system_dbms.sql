/*
SQLyog Ultimate v12.5.0 (64 bit)
MySQL - 10.3.15-MariaDB : Database - online_blog_system_dbms
*********************************************************************
*/

/*!40101 SET NAMES utf8 */;

/*!40101 SET SQL_MODE=''*/;

/*!40014 SET @OLD_UNIQUE_CHECKS=@@UNIQUE_CHECKS, UNIQUE_CHECKS=0 */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;
/*!40111 SET @OLD_SQL_NOTES=@@SQL_NOTES, SQL_NOTES=0 */;
CREATE DATABASE /*!32312 IF NOT EXISTS*/`online_blog_system_dbms` /*!40100 DEFAULT CHARACTER SET latin1 */;

USE `online_blog_system_dbms`;

/*Table structure for table `attachment` */

DROP TABLE IF EXISTS `attachment`;

CREATE TABLE `attachment` (
  `attachment_type_id` int(11) NOT NULL AUTO_INCREMENT,
  `attachment_type` varchar(100) NOT NULL,
  PRIMARY KEY (`attachment_type_id`)
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=latin1;

/*Data for the table `attachment` */

insert  into `attachment`(`attachment_type_id`,`attachment_type`) values 
(1,'Image'),
(2,'Audio'),
(3,'Video'),
(4,'Document');

/*Table structure for table `blog_post` */

DROP TABLE IF EXISTS `blog_post`;

CREATE TABLE `blog_post` (
  `post_id` int(11) NOT NULL AUTO_INCREMENT,
  `user_id` int(11) NOT NULL,
  `category_id` int(11) NOT NULL,
  `title` longtext NOT NULL,
  `summary` longtext NOT NULL,
  `description` longtext NOT NULL,
  `added_on` varchar(50) NOT NULL,
  `updated_on` varchar(50) NOT NULL,
  PRIMARY KEY (`post_id`),
  KEY `user_id` (`user_id`),
  KEY `category_id` (`category_id`)
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=latin1;

/*Data for the table `blog_post` */

insert  into `blog_post`(`post_id`,`user_id`,`category_id`,`title`,`summary`,`description`,`added_on`,`updated_on`) values 
(1,1,1,'education is the passport to the future,for tomorrow belongs to those whoprepare for it today.','a program that focuses on the general theory and practice of learning and teaching the basic principles of educational psychology the art of teaching the planning and administration of educational activities school safety and health issues and the social foundations of education.','a program that focuses on the general theory and practice of learning and teaching the basic principles of educational psychology the art of teaching the planning and administration of educational activities school safety and health issues and the social foundations of education.A program that focuses on the general theory and practice of learning and teaching the basic principles of educational psychology the art of teaching the planning and administration of educational activities school safety and health issues and the social foundations of education.\r\n','','26 Sep 2019,11 AM'),
(2,1,1,'Agiving every child the right to education.','Aan estimated 22.8 million children aged 5-16 are out-of-school.','Apakistan is facing a serious challenge to ensure all children, particularly the most disadvantaged, attend, stay and learn in school. While enrollment and retention rates are improving, progress has been slow to improve education indicators in Pakistan.','','26 Sep 2019,11 AM'),
(3,1,4,'Coolest Office Gadgets and Products for Engineers','Here are the coolest office gadgets and products for engineers that can make being in the office a bit more interesting or at least productiv','Not every engineer gets to stand on the top of a hill on a sunny day wearing a hardhat,a blueprint in hand, and point out into the distance where they are going to build their next Big Thing.Most have to work in an office like the rest of us,so here\'s a bunch of office gadgets and products for engineers that can make being stuck inside a bit more interesting or at least productive.\r\n','',''),
(4,1,3,'RARE POLKA-DOTTED ZEBRA FOAL PHOTOGRAPHED IN KENYA','The eye-catching animal,seen in Kenya Masai Mara National Reserve,likely has a genetic mutation called pseudomelanism.','Talk about a horse of another colour a zebra foal with a dark coat and white polka dots has been spotted in Kenya Masai Mara National Reserve.Photographer Frank Liu was on the search for rhinos recently when he noticed the eye catching plains zebra, likely about a week old.At first glance he looked like a different species altogether,Liu says. Antony Tira, a Maasai guide who first spotted the foal, named him Tira.','',''),
(5,1,1,'What is Lorem Ipsum?','Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry&#039;s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book.','Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry&#039;s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum.','','');

/*Table structure for table `blog_setting` */

DROP TABLE IF EXISTS `blog_setting`;

CREATE TABLE `blog_setting` (
  `setting_id` int(11) NOT NULL AUTO_INCREMENT,
  `blog_title` varchar(300) DEFAULT NULL,
  `blog_pages` int(11) DEFAULT NULL,
  `background_color` varchar(100) DEFAULT NULL,
  `font_color` varchar(100) DEFAULT NULL,
  PRIMARY KEY (`setting_id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

/*Data for the table `blog_setting` */

/*Table structure for table `category` */

DROP TABLE IF EXISTS `category`;

CREATE TABLE `category` (
  `category_id` int(11) NOT NULL AUTO_INCREMENT,
  `category_name` varchar(300) NOT NULL,
  `status_id` int(11) NOT NULL DEFAULT 3,
  `added_on` varchar(50) NOT NULL,
  `updated_on` varchar(50) NOT NULL,
  `deleted_on` varchar(50) NOT NULL,
  PRIMARY KEY (`category_id`)
) ENGINE=InnoDB AUTO_INCREMENT=7 DEFAULT CHARSET=latin1;

/*Data for the table `category` */

insert  into `category`(`category_id`,`category_name`,`status_id`,`added_on`,`updated_on`,`deleted_on`) values 
(1,'EDUCATION',3,'Wednesday 18th September 2019 11:39:50 AM','Wednesday 18th September 2019 07:21:29 PM',''),
(2,'HUMAN RIGHTS',3,'Wednesday 18th September 2019 11:40:31 AM','',''),
(3,'ANIMAL',3,'Wednesday 18th September 2019 11:40:47 AM','',''),
(4,'TECHNOLOGIES',3,'Wednesday 18th September 2019 11:41:34 AM','',''),
(5,'POLITICS',3,'Wednesday 18th September 2019 11:42:03 AM','Tuesday 24th September 2019 10:39:09 PM',''),
(6,'Laptop',6,'Thursday 19th September 2019 01:11:09 AM','Thursday 19th September 2019 01:11:43 AM','Thursday 19th September 2019 01:11:54 AM');

/*Table structure for table `chat_message` */

DROP TABLE IF EXISTS `chat_message`;

CREATE TABLE `chat_message` (
  `message_id` int(11) NOT NULL AUTO_INCREMENT,
  `user_id` int(11) DEFAULT NULL,
  `message` varchar(500) DEFAULT NULL,
  `message_time` varchar(100) DEFAULT NULL,
  PRIMARY KEY (`message_id`),
  KEY `user_id` (`user_id`)
) ENGINE=InnoDB AUTO_INCREMENT=17 DEFAULT CHARSET=latin1;

/*Data for the table `chat_message` */

insert  into `chat_message`(`message_id`,`user_id`,`message`,`message_time`) values 
(1,1,'hello','25 Sep 2019,10 AM'),
(2,14,'g','25 Sep 2019,10 AM'),
(3,14,'assalam-aliakum','25 Sep 2019,10 AM'),
(4,1,'w/salam','25 Sep 2019,10 AM'),
(5,14,'how are you all','25 Sep 2019,10 AM'),
(6,9,'i am qurban ali','25 Sep 2019,10 AM'),
(7,9,'where you from Mr Qurban ali','25 Sep 2019,10 AM'),
(8,14,'I am Latif unar','25 Sep 2019,10 AM'),
(9,9,'what are you doing','25 Sep 2019,10 AM'),
(10,14,'working on project','25 Sep 2019,10 AM'),
(11,9,'ok thats great','25 Sep 2019,10 AM'),
(12,9,'ok ALLAHhafiz take care....','25 Sep 2019,10 AM'),
(13,14,'ok dear... thanks','25 Sep 2019,10 AM'),
(14,6,'hello i am DILSHAD kahar','25 Sep 2019,10 AM'),
(15,9,'welcome Dilshad Kahar','25 Sep 2019,10 AM'),
(16,14,'i am latif Unar Mr Dilshad','25 Sep 2019,10 AM');

/*Table structure for table `comment` */

DROP TABLE IF EXISTS `comment`;

CREATE TABLE `comment` (
  `comment_id` int(11) NOT NULL AUTO_INCREMENT,
  `user_id` int(11) NOT NULL,
  `post_id` int(11) NOT NULL,
  `message` longtext NOT NULL,
  `is_active` int(11) NOT NULL,
  `comment_time` varchar(50) NOT NULL,
  PRIMARY KEY (`comment_id`),
  KEY `user_id` (`user_id`),
  KEY `post_id` (`post_id`)
) ENGINE=InnoDB AUTO_INCREMENT=12 DEFAULT CHARSET=latin1;

/*Data for the table `comment` */

insert  into `comment`(`comment_id`,`user_id`,`post_id`,`message`,`is_active`,`comment_time`) values 
(1,2,1,'hi',5,'24 Sep 2019, 03 PM'),
(2,2,1,'hello',5,'24 Sep 2019, 03 PM'),
(3,2,1,'hi',5,'24 Sep 2019, 09 PM'),
(4,2,1,'s\n',2,'24 Sep 2019, 09 PM'),
(5,2,1,'a',3,'24 Sep 2019, 09 PM'),
(6,2,1,'l',2,'24 Sep 2019, 09 PM'),
(7,2,1,'d',5,'24 Sep 2019, 10 PM'),
(8,2,1,'khalid',3,'24 Sep 2019, 10 PM'),
(9,9,2,'Izhar',3,'24 Sep 2019, 11 PM'),
(10,1,5,'Nice',3,'26 Sep 2019, 12 PM'),
(11,1,5,'Nice',3,'26 Sep 2019, 12 PM');

/*Table structure for table `contact_us` */

DROP TABLE IF EXISTS `contact_us`;

CREATE TABLE `contact_us` (
  `contact_id` int(11) NOT NULL AUTO_INCREMENT,
  `full_name` varchar(100) NOT NULL,
  `email` varchar(100) NOT NULL,
  `subject` varchar(200) NOT NULL,
  `message` longtext NOT NULL,
  `added_on` varchar(100) NOT NULL,
  PRIMARY KEY (`contact_id`)
) ENGINE=InnoDB AUTO_INCREMENT=8 DEFAULT CHARSET=latin1;

/*Data for the table `contact_us` */

insert  into `contact_us`(`contact_id`,`full_name`,`email`,`subject`,`message`,`added_on`) values 
(1,'Muhammad Salam','salam@gmail.com','I want to meet You','I am Here.','Sunday 8th September 2019 07:52:25 PM'),
(2,'Muhammad Salam','salam@gmail.com','I want to meet You','I am here.','Sunday 8th September 2019 07:53:19 PM'),
(3,'Muhammad Salam','salam@gmail.com','I want to meet You','I am here.','Sunday 8th September 2019 07:55:24 PM'),
(4,'Muhammad Salam','qurban@gmail.com','I want to meet You','I am Qurban Ali Samon.','Sunday 8th September 2019 07:56:47 PM'),
(5,'Muhammad Salam','qurban@gmail.com','I want to meet You','Samon','Sunday 8th September 2019 07:58:45 PM'),
(6,'Dilshad Ahmed','dilshad@gmail.com','I have Visited Your Website','Nice Work.... Congrats','Sunday 8th September 2019 11:32:09 PM'),
(7,'Imran Ali','imran@gmail.com','Imran','I am here.','Monday 9th September 2019 12:13:35 AM');

/*Table structure for table `feedback` */

DROP TABLE IF EXISTS `feedback`;

CREATE TABLE `feedback` (
  `feedback_id` int(11) NOT NULL AUTO_INCREMENT,
  `user_id` int(11) NOT NULL,
  `email` varchar(100) NOT NULL,
  `feedback_msg` longtext NOT NULL,
  `feedback_time` varchar(50) NOT NULL,
  PRIMARY KEY (`feedback_id`),
  KEY `user_id` (`user_id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

/*Data for the table `feedback` */

/*Table structure for table `follow` */

DROP TABLE IF EXISTS `follow`;

CREATE TABLE `follow` (
  `follow_id` int(11) NOT NULL AUTO_INCREMENT,
  `user_id` int(11) DEFAULT NULL,
  `author_id` int(11) DEFAULT NULL,
  `author_role_id` int(11) DEFAULT NULL,
  PRIMARY KEY (`follow_id`),
  KEY `followers_id` (`user_id`),
  KEY `following_id` (`author_id`),
  KEY `following_role_id` (`author_role_id`),
  CONSTRAINT `follow_ibfk_3` FOREIGN KEY (`author_role_id`) REFERENCES `role` (`role_id`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

/*Data for the table `follow` */

/*Table structure for table `likes` */

DROP TABLE IF EXISTS `likes`;

CREATE TABLE `likes` (
  `like_id` int(11) NOT NULL AUTO_INCREMENT,
  `user_id` int(11) NOT NULL,
  `post_id` int(11) NOT NULL,
  `like_status` int(11) NOT NULL,
  `like_time` varchar(50) NOT NULL,
  `un_like_time` varchar(50) NOT NULL,
  PRIMARY KEY (`like_id`),
  KEY `user_id` (`user_id`),
  KEY `post_id` (`post_id`)
) ENGINE=InnoDB AUTO_INCREMENT=50 DEFAULT CHARSET=latin1;

/*Data for the table `likes` */

insert  into `likes`(`like_id`,`user_id`,`post_id`,`like_status`,`like_time`,`un_like_time`) values 
(1,9,4,0,'22 Sep 2019,09 PM','22 Sep 2019,09 PM'),
(2,9,4,0,'22 Sep 2019,09 PM','23 Sep 2019,12 AM'),
(3,9,3,0,'22 Sep 2019,09 PM','22 Sep 2019,09 PM'),
(4,9,3,0,'22 Sep 2019,09 PM','22 Sep 2019,09 PM'),
(5,7,3,1,'22 Sep 2019,09 PM',''),
(6,9,3,0,'22 Sep 2019,09 PM','22 Sep 2019,10 PM'),
(7,9,2,0,'22 Sep 2019,10 PM','22 Sep 2019,10 PM'),
(8,9,2,0,'22 Sep 2019,10 PM','22 Sep 2019,10 PM'),
(9,9,2,0,'22 Sep 2019,10 PM','22 Sep 2019,10 PM'),
(10,9,2,0,'22 Sep 2019,10 PM','22 Sep 2019,10 PM'),
(11,9,2,0,'22 Sep 2019,10 PM','22 Sep 2019,10 PM'),
(12,9,2,0,'22 Sep 2019,10 PM','22 Sep 2019,10 PM'),
(13,9,2,0,'22 Sep 2019,10 PM','22 Sep 2019,10 PM'),
(14,9,2,0,'22 Sep 2019,10 PM','22 Sep 2019,10 PM'),
(15,9,2,0,'22 Sep 2019,10 PM','22 Sep 2019,10 PM'),
(16,9,2,0,'22 Sep 2019,10 PM','22 Sep 2019,10 PM'),
(17,9,2,0,'22 Sep 2019,10 PM','22 Sep 2019,10 PM'),
(18,9,1,0,'22 Sep 2019,10 PM','22 Sep 2019,10 PM'),
(19,9,1,0,'22 Sep 2019,10 PM','22 Sep 2019,10 PM'),
(20,9,1,0,'22 Sep 2019,10 PM','22 Sep 2019,10 PM'),
(21,9,1,0,'22 Sep 2019,10 PM','22 Sep 2019,10 PM'),
(22,9,1,0,'22 Sep 2019,10 PM','22 Sep 2019,10 PM'),
(23,9,1,0,'22 Sep 2019,10 PM','22 Sep 2019,10 PM'),
(24,9,1,0,'22 Sep 2019,10 PM','22 Sep 2019,10 PM'),
(25,9,1,0,'22 Sep 2019,10 PM','22 Sep 2019,10 PM'),
(26,9,1,0,'22 Sep 2019,10 PM','22 Sep 2019,10 PM'),
(27,9,1,0,'22 Sep 2019,10 PM','22 Sep 2019,10 PM'),
(28,9,1,0,'22 Sep 2019,10 PM','22 Sep 2019,10 PM'),
(29,9,1,0,'22 Sep 2019,10 PM','22 Sep 2019,10 PM'),
(30,9,1,0,'22 Sep 2019,10 PM','22 Sep 2019,10 PM'),
(31,9,1,0,'22 Sep 2019,10 PM','22 Sep 2019,10 PM'),
(32,9,1,0,'22 Sep 2019,10 PM','22 Sep 2019,10 PM'),
(33,9,4,0,'23 Sep 2019,12 AM','23 Sep 2019,12 AM'),
(34,9,4,0,'23 Sep 2019,12 AM','23 Sep 2019,12 AM'),
(35,9,4,0,'23 Sep 2019,12 AM','23 Sep 2019,12 AM'),
(36,9,4,0,'23 Sep 2019,12 AM','23 Sep 2019,02 AM'),
(37,9,3,1,'23 Sep 2019,12 AM',''),
(38,9,2,0,'23 Sep 2019,01 AM','23 Sep 2019,01 AM'),
(39,9,2,0,'23 Sep 2019,01 AM','23 Sep 2019,01 AM'),
(40,9,1,1,'23 Sep 2019,01 AM',''),
(41,9,2,1,'23 Sep 2019,01 AM',''),
(42,9,4,0,'23 Sep 2019,02 AM','23 Sep 2019,09 AM'),
(43,9,4,0,'23 Sep 2019,09 AM','23 Sep 2019,09 AM'),
(44,9,4,0,'23 Sep 2019,09 AM','23 Sep 2019,12 PM'),
(45,9,4,0,'23 Sep 2019,12 PM','23 Sep 2019,08 PM'),
(46,9,4,0,'23 Sep 2019,08 PM','23 Sep 2019,10 PM'),
(47,9,4,1,'23 Sep 2019,10 PM',''),
(48,2,1,0,'24 Sep 2019,10 PM','24 Sep 2019,10 PM'),
(49,1,5,1,'26 Sep 2019,12 PM','');

/*Table structure for table `log_manage` */

DROP TABLE IF EXISTS `log_manage`;

CREATE TABLE `log_manage` (
  `log_id` int(11) NOT NULL AUTO_INCREMENT,
  `user_id` int(11) NOT NULL,
  `role_id` int(11) NOT NULL,
  `login_time` varchar(100) NOT NULL,
  `logout_time` varchar(100) NOT NULL,
  `is_active` int(11) NOT NULL,
  PRIMARY KEY (`log_id`)
) ENGINE=InnoDB AUTO_INCREMENT=26 DEFAULT CHARSET=latin1;

/*Data for the table `log_manage` */

insert  into `log_manage`(`log_id`,`user_id`,`role_id`,`login_time`,`logout_time`,`is_active`) values 
(1,1,1,'Wednesday 25th September 2019 03:24:08 AM','Wednesday 25th September 2019 03:24:16 AM',0),
(2,1,1,'Wednesday 25th September 2019 03:24:42 AM','Wednesday 25th September 2019 05:04:25 AM',0),
(3,9,3,'Wednesday 25th September 2019 03:25:37 AM','Wednesday 25th September 2019 05:04:25 AM',0),
(4,7,1,'Wednesday 25th September 2019 05:04:36 AM','Wednesday 25th September 2019 05:13:40 AM',0),
(5,1,1,'Wednesday 25th September 2019 05:08:50 AM','Wednesday 25th September 2019 05:13:08 AM',0),
(6,1,1,'Wednesday 25th September 2019 09:31:09 AM','Wednesday 25th September 2019 09:44:02 AM',0),
(7,1,1,'Wednesday 25th September 2019 09:46:01 AM','Wednesday 25th September 2019 10:22:22 AM',0),
(8,14,3,'Wednesday 25th September 2019 09:47:31 AM','Wednesday 25th September 2019 09:44:02 AM',0),
(9,14,1,'Wednesday 25th September 2019 09:51:08 AM','Wednesday 25th September 2019 09:44:02 AM',0),
(10,14,1,'Wednesday 25th September 2019 09:53:08 AM','Wednesday 25th September 2019 09:44:02 AM',0),
(11,14,3,'Wednesday 25th September 2019 09:53:15 AM','',0),
(12,14,1,'Wednesday 25th September 2019 09:53:18 AM','Wednesday 25th September 2019 10:42:11 AM',0),
(13,9,1,'Wednesday 25th September 2019 10:23:47 AM','Wednesday 25th September 2019 10:44:33 AM',0),
(14,6,1,'Wednesday 25th September 2019 10:38:26 AM','Wednesday 25th September 2019 10:42:36 AM',0),
(15,6,1,'Wednesday 25th September 2019 10:44:53 AM','Wednesday 25th September 2019 10:46:53 AM',0),
(16,9,1,'Wednesday 25th September 2019 10:45:35 AM','Wednesday 25th September 2019 10:46:59 AM',0),
(17,1,1,'Wednesday 25th September 2019 10:47:12 AM','',1),
(18,9,1,'Wednesday 25th September 2019 10:53:39 AM','',1),
(19,9,3,'Wednesday 25th September 2019 10:53:45 AM','Wednesday 25th September 2019 12:46:05 PM',0),
(20,1,1,'Wednesday 25th September 2019 12:43:15 PM','Wednesday 25th September 2019 01:24:40 PM',0),
(21,1,1,'Wednesday 25th September 2019 12:46:18 PM','Wednesday 25th September 2019 01:22:03 PM',0),
(22,1,1,'Thursday 26th September 2019 09:23:47 AM','Thursday 26th September 2019 11:53:03 AM',0),
(23,1,1,'Thursday 26th September 2019 12:07:15 PM','',1),
(24,1,3,'Thursday 26th September 2019 12:43:31 PM','',0),
(25,1,1,'Thursday 26th September 2019 12:46:11 PM','',1);

/*Table structure for table `post_attachment` */

DROP TABLE IF EXISTS `post_attachment`;

CREATE TABLE `post_attachment` (
  `p_attachment_id` int(11) NOT NULL AUTO_INCREMENT,
  `post_id` int(11) NOT NULL,
  `attachment_type_id` int(11) NOT NULL,
  `attachment_name` varchar(100) NOT NULL,
  PRIMARY KEY (`p_attachment_id`)
) ENGINE=InnoDB AUTO_INCREMENT=16 DEFAULT CHARSET=latin1;

/*Data for the table `post_attachment` */

insert  into `post_attachment`(`p_attachment_id`,`post_id`,`attachment_type_id`,`attachment_name`) values 
(1,1,1,'category_2.jpg'),
(2,1,1,'2.jpg'),
(3,1,1,'category_4.jpg'),
(4,2,1,'Office Gadgets.jpg'),
(5,3,1,'Office Gadgets.jpg'),
(6,4,1,'rare_polka.jpg'),
(7,1,1,'1.jpg'),
(8,1,1,'Office Gadgets.jpg'),
(9,1,1,'6.jpg'),
(10,1,1,'Office Gadgets.jpg'),
(11,1,1,'category_3.jpg'),
(12,1,1,'category_4.jpg'),
(13,1,1,'category_1.jpg'),
(14,5,1,'image_6.jpg'),
(15,5,1,'image_12.jpg');

/*Table structure for table `post_status` */

DROP TABLE IF EXISTS `post_status`;

CREATE TABLE `post_status` (
  `p_s_id` int(11) NOT NULL AUTO_INCREMENT,
  `post_id` int(11) NOT NULL,
  `status_id` int(11) NOT NULL DEFAULT 4,
  `added_on` varchar(100) NOT NULL,
  `updated_on` varchar(100) NOT NULL,
  PRIMARY KEY (`p_s_id`)
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=latin1;

/*Data for the table `post_status` */

insert  into `post_status`(`p_s_id`,`post_id`,`status_id`,`added_on`,`updated_on`) values 
(1,1,3,'19 Sep 2019,01 PM',''),
(2,2,3,'19 Sep 2019,01 PM',''),
(3,3,5,'19 Sep 2019,01 PM',''),
(4,4,5,'19 Sep 2019,01 PM',''),
(5,5,3,'26 Sep 2019,12 PM','');

/*Table structure for table `rating` */

DROP TABLE IF EXISTS `rating`;

CREATE TABLE `rating` (
  `rating_id` int(11) NOT NULL AUTO_INCREMENT,
  `user_id` int(11) NOT NULL,
  `post_id` int(11) DEFAULT NULL,
  `rating_status` int(11) NOT NULL,
  `rating_time` varchar(50) NOT NULL,
  `update_rating_time` varchar(50) NOT NULL,
  PRIMARY KEY (`rating_id`),
  KEY `user_id` (`user_id`),
  KEY `post_id` (`post_id`)
) ENGINE=InnoDB AUTO_INCREMENT=10 DEFAULT CHARSET=latin1;

/*Data for the table `rating` */

insert  into `rating`(`rating_id`,`user_id`,`post_id`,`rating_status`,`rating_time`,`update_rating_time`) values 
(1,9,4,4,'23 Sep 2019, 12 PM','23 Sep 2019, 10 PM'),
(2,7,4,5,'23 Sep 2019, 12 PM','23 Sep 2019, 12 PM'),
(3,9,3,2,'23 Sep 2019, 12 PM','23 Sep 2019, 12 PM'),
(4,9,2,2,'23 Sep 2019, 12 PM','25 Sep 2019, 10 AM'),
(5,9,2,2,'23 Sep 2019, 12 PM','25 Sep 2019, 10 AM'),
(6,2,3,3,'23 Sep 2019, 11 PM',''),
(7,2,2,2,'23 Sep 2019, 11 PM','24 Sep 2019, 10 PM'),
(8,2,1,3,'24 Sep 2019, 10 PM',''),
(9,9,1,2,'24 Sep 2019, 10 PM','');

/*Table structure for table `role` */

DROP TABLE IF EXISTS `role`;

CREATE TABLE `role` (
  `role_id` int(11) NOT NULL AUTO_INCREMENT,
  `role_type` varchar(200) NOT NULL,
  PRIMARY KEY (`role_id`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=latin1;

/*Data for the table `role` */

insert  into `role`(`role_id`,`role_type`) values 
(1,'ADMIN'),
(2,'CONTRIBUTAR'),
(3,'USER');

/*Table structure for table `status` */

DROP TABLE IF EXISTS `status`;

CREATE TABLE `status` (
  `status_id` int(11) NOT NULL AUTO_INCREMENT,
  `status_type` varchar(200) NOT NULL,
  PRIMARY KEY (`status_id`)
) ENGINE=InnoDB AUTO_INCREMENT=7 DEFAULT CHARSET=latin1;

/*Data for the table `status` */

insert  into `status`(`status_id`,`status_type`) values 
(1,'approve'),
(2,'unapprove'),
(3,'active'),
(4,'deactive'),
(5,'delete'),
(6,'pending');

/*Table structure for table `user` */

DROP TABLE IF EXISTS `user`;

CREATE TABLE `user` (
  `user_id` int(11) NOT NULL AUTO_INCREMENT,
  `first_name` varchar(200) NOT NULL,
  `middle_name` varchar(200) NOT NULL,
  `last_name` varchar(200) NOT NULL,
  `email` varchar(100) NOT NULL,
  `password` varchar(100) NOT NULL,
  `p_number` varchar(50) NOT NULL,
  `dob` varchar(100) NOT NULL,
  `cnic` varchar(15) NOT NULL,
  `home_town` longtext NOT NULL,
  `gender` char(6) NOT NULL,
  `image` varchar(100) NOT NULL,
  `added_on` varchar(50) NOT NULL,
  `updated_on` varchar(50) NOT NULL,
  PRIMARY KEY (`user_id`)
) ENGINE=InnoDB AUTO_INCREMENT=15 DEFAULT CHARSET=latin1;

/*Data for the table `user` */

insert  into `user`(`user_id`,`first_name`,`middle_name`,`last_name`,`email`,`password`,`p_number`,`dob`,`cnic`,`home_town`,`gender`,`image`,`added_on`,`updated_on`) values 
(1,'Muhammad','Salam','Samon','salam@gmail.com','12345','0331-2477922','10-MAR-1995','44102-5997976-2','MirpurKhas Sindh','Male','salam.png','Sunday 15th September 2019 11:22:03 PM','Monday 23rd September 2019 08:18:02 PM'),
(2,'Muhammad','Junaid','Shaikh','junaid@gmail.com','12345','0331-2477922','10-MAR-1995','44102-5997976-7','MirpurKhas Sindh','Male','junaid_shaikh.jpg','Sunday 15th September 2019 11:22:03 PM','Sunday 15th September 2019 11:04:24 PM'),
(3,'Afaque','Ahmed','Keerio','afaque@gmail.com','12345','0331-2477922','10-MAR-1995','44102-5997976-7','MirpurKhas Sindh','Male','afaque.jpg','Sunday 15th September 2019 11:22:03 PM','Sunday 15th September 2019 11:04:24 PM'),
(4,'Sohaib','Ali','Samon','sohaib@gmail.com','12345','0331-2477922','10-MAR-1995','44102-5997976-7','MirpurKhas Sindh','Male','ahsan.jpg','Sunday 15th September 2019 11:22:03 PM','Sunday 15th September 2019 11:04:24 PM'),
(5,'Karan','Kumar','Lohana','karan@gmail.com','12345','0304-2477922','2-JULY-1985','44102-5997976-3','Shikarpur Sindh','Male','junaid_shaikh.jpg','Monday 16th September 2019 02:47:58 AM','Wednesday 18th September 2019 12:59:56 AM'),
(6,'Dilshad','Ahmed','Kahar','dilshad@gmail.com','12345','0304-2477922','2-JULY-1985','44102-5997976-3','Shikarpur Sindh','Male','9.jpg','Monday 16th September 2019 02:49:16 AM',''),
(7,'Sajjad','Hussain','Gill','sajjad@gmail.com','12345','0336-2477922','07-MAY-1998','44103-5997976-9','Islamabad Pakistan','Male','ahsan.jpg','Monday 16th September 2019 02:55:20 AM','Monday 16th September 2019 03:41:51 AM'),
(8,'Muhammad','Waseem','Gill','waseem@gmail.com','12345','0333-2477922','10-JULY-1995','44102-5997476-7','NawabShah','Male','5.jpg','Monday 16th September 2019 11:39:07 AM','Monday 16th September 2019 12:11:36 PM'),
(9,'Qurban','Ali','Samon','qurban@gmail.com','12345','0335-3868495','22-JUN-2015','44102-5997975-7','Karachi Sindh','Male','t3.jpg','Monday 16th September 2019 11:50:38 AM','Monday 16th September 2019 12:26:54 PM'),
(10,'Raza','Ali','Rind','razaali@gmail.com','12345','0331-2477922','22-JULY-2015','44102-5997976-7','Dengan Bhurgri','Male','banner4.jpg','Monday 16th September 2019 11:54:07 AM',''),
(11,'Sarim','Khan','Samon','sarim@gmail.com','12345','0331-2477922','22-JULY-2015','44102-5997971-7','Dengan','Male','2.jpg','Monday 16th September 2019 11:56:31 AM',''),
(12,'Meer','Hassan','Samon','meer123@gmail.com','12345','0331-2477922','22-JULY-2015','44102-5997971-7','MirpurKhas Sindh','Male','8.jpg','Monday 16th September 2019 12:00:47 PM','Monday 16th September 2019 12:15:27 PM'),
(13,'Saif','Ali','Kayani','saifali@gmail.com','12345','0304-2477922','21-MARCH-1996','44102-5997976-9','Shikarpuri','Male','4.jpg','Tuesday 17th September 2019 04:55:59 AM','Wednesday 25th September 2019 12:52:36 PM'),
(14,'Abdul','Latif','Unar','lateefunar@gmail.com','12345','0301-3813945','07-MAY-1998','45403-5555555-1','Sakrand','Male','rare_polka.jpg','Friday 20th September 2019 10:17:42 PM','Monday 23rd September 2019 10:34:23 PM');

/*Table structure for table `user_role_assign` */

DROP TABLE IF EXISTS `user_role_assign`;

CREATE TABLE `user_role_assign` (
  `u_r_a_id` int(11) NOT NULL AUTO_INCREMENT,
  `user_id` int(11) NOT NULL,
  `role_id` int(11) NOT NULL DEFAULT 3,
  `is_active_status` int(11) NOT NULL DEFAULT 3,
  `role_assign_time` varchar(100) NOT NULL,
  `role_deactive_time` varchar(100) NOT NULL,
  PRIMARY KEY (`u_r_a_id`),
  KEY `user_id` (`user_id`),
  KEY `role_id` (`role_id`),
  CONSTRAINT `user_role_assign_ibfk_7` FOREIGN KEY (`role_id`) REFERENCES `role` (`role_id`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB AUTO_INCREMENT=38 DEFAULT CHARSET=latin1;

/*Data for the table `user_role_assign` */

insert  into `user_role_assign`(`u_r_a_id`,`user_id`,`role_id`,`is_active_status`,`role_assign_time`,`role_deactive_time`) values 
(1,1,1,3,'Saturday 14th September 2019 12:41:00 PM',''),
(2,1,2,3,'Saturday 14th September 2019 12:41:00 PM',''),
(3,1,3,3,'Saturday 14th September 2019 12:41:00 PM',''),
(4,2,1,4,'Saturday 14th September 2019 12:47:24 PM','Tuesday 24th September 2019 10:41:54 PM'),
(5,3,3,4,'Saturday 14th September 2019 12:50:25 PM','Sunday 15th September 2019 11:23:29 PM'),
(6,4,3,3,'Saturday 14th September 2019 12:52:19 PM','Monday 16th September 2019 12:37:34 PM'),
(7,4,2,4,'Sunday 15th September 2019 03:44:38 AM','Wednesday 18th September 2019 01:01:19 AM'),
(8,4,1,4,'Sunday 15th September 2019 03:45:18 AM','Wednesday 18th September 2019 01:01:17 AM'),
(9,3,2,4,'Sunday 15th September 2019 11:23:01 PM','Monday 16th September 2019 01:28:36 AM'),
(10,3,1,4,'Sunday 15th September 2019 11:23:03 PM','Wednesday 18th September 2019 01:02:46 AM'),
(11,5,3,3,'Monday 16th September 2019 02:47:59 AM',''),
(12,6,3,3,'Monday 16th September 2019 02:49:17 AM',''),
(13,7,3,3,'Monday 16th September 2019 02:55:20 AM',''),
(14,8,3,3,'Monday 16th September 2019 11:39:07 AM',''),
(15,9,3,3,'Monday 16th September 2019 11:50:38 AM',''),
(16,10,3,3,'Monday 16th September 2019 11:54:08 AM',''),
(17,11,3,3,'Monday 16th September 2019 11:56:31 AM',''),
(18,12,3,3,'Monday 16th September 2019 12:00:47 PM',''),
(19,13,3,3,'Tuesday 17th September 2019 04:56:00 AM',''),
(20,5,2,4,'Wednesday 18th September 2019 12:59:13 AM',''),
(21,5,1,4,'Wednesday 18th September 2019 12:59:16 AM','Wednesday 18th September 2019 04:55:33 AM'),
(22,4,3,4,'Wednesday 18th September 2019 01:02:39 AM',''),
(23,3,3,4,'Wednesday 18th September 2019 01:02:43 AM',''),
(24,4,1,4,'Wednesday 18th September 2019 04:53:24 AM',''),
(25,4,2,4,'Wednesday 18th September 2019 04:53:26 AM',''),
(26,4,3,4,'Wednesday 18th September 2019 04:53:26 AM',''),
(27,14,3,3,'Friday 20th September 2019 10:17:42 PM',''),
(28,2,3,4,'Sunday 22nd September 2019 04:01:35 PM','Tuesday 24th September 2019 10:47:50 PM'),
(29,2,1,4,'Tuesday 24th September 2019 10:42:48 PM','Wednesday 25th September 2019 09:34:05 AM'),
(30,2,2,4,'Tuesday 24th September 2019 10:42:51 PM','Tuesday 24th September 2019 10:47:48 PM'),
(31,7,1,4,'Wednesday 25th September 2019 05:04:14 AM','Wednesday 25th September 2019 09:34:20 AM'),
(32,2,3,3,'Wednesday 25th September 2019 09:34:03 AM',''),
(33,3,3,3,'Wednesday 25th September 2019 09:41:20 AM',''),
(34,14,1,3,'Wednesday 25th September 2019 09:50:58 AM',''),
(35,9,1,3,'Wednesday 25th September 2019 10:23:32 AM',''),
(36,7,1,4,'Wednesday 25th September 2019 10:34:35 AM','Wednesday 25th September 2019 10:36:32 AM'),
(37,6,1,3,'Wednesday 25th September 2019 10:37:47 AM','');

/*Table structure for table `user_status` */

DROP TABLE IF EXISTS `user_status`;

CREATE TABLE `user_status` (
  `u_s_id` int(11) NOT NULL AUTO_INCREMENT,
  `user_id` int(11) NOT NULL,
  `status_id` int(11) NOT NULL DEFAULT 6,
  `user_active_time` varchar(50) NOT NULL,
  `user_deactive_time` varchar(50) NOT NULL,
  `user_deleted_time` varchar(50) NOT NULL,
  PRIMARY KEY (`u_s_id`),
  KEY `user_id` (`user_id`),
  KEY `status_id` (`status_id`),
  CONSTRAINT `user_status_ibfk_2` FOREIGN KEY (`status_id`) REFERENCES `status` (`status_id`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB AUTO_INCREMENT=15 DEFAULT CHARSET=latin1;

/*Data for the table `user_status` */

insert  into `user_status`(`u_s_id`,`user_id`,`status_id`,`user_active_time`,`user_deactive_time`,`user_deleted_time`) values 
(1,1,1,'Saturday 14th September 2019 12:41:00 PM','',''),
(2,2,5,'Sunday 22nd September 2019 01:51:56 PM','Sunday 22nd September 2019 01:51:10 PM','Wednesday 25th September 2019 12:51:25 PM'),
(3,3,1,'Saturday 14th September 2019 12:50:25 PM','',''),
(4,4,6,'Monday 16th September 2019 11:27:39 PM','Wednesday 18th September 2019 04:54:04 AM',''),
(5,5,6,'Wednesday 18th September 2019 04:55:23 AM','Wednesday 18th September 2019 03:28:43 AM',''),
(6,6,1,'Monday 16th September 2019 02:49:17 AM','','Monday 16th September 2019 11:13:39 PM'),
(7,7,1,'Monday 16th September 2019 02:55:20 AM','','Monday 16th September 2019 10:59:08 AM'),
(8,8,6,'Monday 16th September 2019 11:39:07 AM','','Monday 16th September 2019 12:24:56 PM'),
(9,9,3,'Friday 20th September 2019 10:20:19 PM','Friday 20th September 2019 10:20:17 PM','Monday 16th September 2019 11:13:02 PM'),
(10,10,6,'Monday 16th September 2019 11:54:08 AM','','Monday 16th September 2019 11:54:44 AM'),
(11,11,6,'Monday 16th September 2019 11:56:31 AM','','Monday 16th September 2019 11:57:10 AM'),
(12,12,6,'Monday 16th September 2019 12:00:47 PM','','Monday 16th September 2019 12:23:35 PM'),
(13,13,3,'Wednesday 25th September 2019 01:02:07 PM','Wednesday 25th September 2019 01:00:10 PM','Tuesday 17th September 2019 04:56:33 AM'),
(14,14,3,'Wednesday 25th September 2019 12:59:11 PM','Wednesday 25th September 2019 12:58:42 PM','');

/*Table structure for table `user_status_timing` */

DROP TABLE IF EXISTS `user_status_timing`;

CREATE TABLE `user_status_timing` (
  `u_s_t_id` int(11) NOT NULL AUTO_INCREMENT,
  `user_id` int(11) NOT NULL,
  `role_id` int(11) NOT NULL,
  `status_id` int(11) NOT NULL,
  `user_status_time` varchar(100) NOT NULL,
  PRIMARY KEY (`u_s_t_id`)
) ENGINE=InnoDB AUTO_INCREMENT=11 DEFAULT CHARSET=latin1;

/*Data for the table `user_status_timing` */

insert  into `user_status_timing`(`u_s_t_id`,`user_id`,`role_id`,`status_id`,`user_status_time`) values 
(1,4,3,1,'Saturday 14th September 2019 12:54:40 PM'),
(2,3,3,1,'Saturday 14th September 2019 12:58:38 PM'),
(3,2,3,1,'Monday 16th September 2019 11:18:23 PM'),
(4,0,0,1,'Tuesday 17th September 2019 04:41:04 AM'),
(5,9,3,1,'Friday 20th September 2019 10:40:34 AM'),
(6,7,3,1,'Sunday 22nd September 2019 11:25:44 AM'),
(7,13,3,1,'Sunday 22nd September 2019 11:45:09 PM'),
(8,14,3,1,'Monday 23rd September 2019 08:18:42 PM'),
(9,3,3,1,'Wednesday 25th September 2019 09:38:03 AM'),
(10,6,3,1,'Wednesday 25th September 2019 10:37:10 AM');

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;
