/*
SQLyog Professional v12.09 (64 bit)
MySQL - 5.5.32 : Database - wedapp
*********************************************************************
*/

/*!40101 SET NAMES utf8 */;

/*!40101 SET SQL_MODE=''*/;

/*!40014 SET @OLD_UNIQUE_CHECKS=@@UNIQUE_CHECKS, UNIQUE_CHECKS=0 */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;
/*!40111 SET @OLD_SQL_NOTES=@@SQL_NOTES, SQL_NOTES=0 */;
CREATE DATABASE /*!32312 IF NOT EXISTS*/`wedapp` /*!40100 DEFAULT CHARACTER SET latin1 */;

USE `wedapp`;

/*Table structure for table `events` */

DROP TABLE IF EXISTS `events`;

CREATE TABLE `events` (
  `Event_id` int(11) NOT NULL AUTO_INCREMENT,
  `Event_title` varchar(128) DEFAULT NULL,
  `Event_type` int(11) DEFAULT NULL,
  `Event_start_date` datetime DEFAULT NULL,
  `Event_end_date` datetime DEFAULT NULL,
  `Event_expected_guest` varchar(50) DEFAULT NULL,
  `CreatedBy` int(11) DEFAULT NULL,
  `Created_datetime` datetime DEFAULT NULL,
  `Modified_by` int(11) DEFAULT NULL,
  `Modified_date` datetime DEFAULT NULL,
  `Is_Active` bit(1) DEFAULT b'1',
  `User_id` int(11) DEFAULT NULL,
  `Vendor_id` int(11) DEFAULT NULL,
  PRIMARY KEY (`Event_id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

/*Data for the table `events` */

/*Table structure for table `package` */

DROP TABLE IF EXISTS `package`;

CREATE TABLE `package` (
  `Package_id` int(11) NOT NULL AUTO_INCREMENT,
  `Package_title` varchar(255) DEFAULT NULL,
  `Package_description` longtext,
  `Package_Category` int(11) DEFAULT NULL,
  `Package_price` bigint(20) unsigned DEFAULT NULL,
  `Vendor_id` int(11) DEFAULT NULL,
  `IsActive` bit(1) DEFAULT b'1',
  `IsDeleted` bit(1) DEFAULT b'0',
  `CreatedOn` datetime DEFAULT NULL,
  `ModifiedOn` datetime DEFAULT NULL,
  KEY `Package_id` (`Package_id`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=latin1;

/*Data for the table `package` */

insert  into `package`(`Package_id`,`Package_title`,`Package_description`,`Package_Category`,`Package_price`,`Vendor_id`,`IsActive`,`IsDeleted`,`CreatedOn`,`ModifiedOn`) values (1,'qqqqqqqqqq','aaaaaaaaaaaaaaaaaaaaa',1,23,1,'','\0','2018-05-29 23:13:55',NULL),(2,'Catering Menu','Return to site	\r\nWedding Ceremony Description Step by Step\r\n\r\nMay 12, 2017\r\nThis page explains a typical day-of ceremony activities. It will help you visualize the ceremony, and it will give you ideas on what you might want to customize.\r\n\r\n \r\n\r\nWhatever you wish for your ceremony we will help you do. We\'ve done literally hundreds of weddings and can confidently say that we are very, very good at it. While all ceremonies follow a certain structure, anything is possible - your imagination is the limit. But then, you have us, so there is no limit. (We\'re also working on our modesty... but it\'s not easy). More tips and ideas further below, but first here is the engagement process for officiants',3,1234,1,'','\0','2018-05-29 23:17:36',NULL),(3,'I will arrange a wedding hall for you','adfsssssssssssssssssssssssssssssss',1,213,1,'','\0','2018-06-04 12:46:32',NULL);

/*Table structure for table `package_picture` */

DROP TABLE IF EXISTS `package_picture`;

CREATE TABLE `package_picture` (
  `package_picture_id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `package_id` int(11) DEFAULT NULL,
  `package_picture_path` varchar(500) DEFAULT NULL,
  `Is_Deleted` bit(1) DEFAULT b'0',
  KEY `package_picture_id` (`package_picture_id`)
) ENGINE=InnoDB AUTO_INCREMENT=14 DEFAULT CHARSET=latin1;

/*Data for the table `package_picture` */

insert  into `package_picture`(`package_picture_id`,`package_id`,`package_picture_path`,`Is_Deleted`) values (1,1,'package_1_0.jpg',''),(2,1,'package_1_1.jpg',''),(3,2,'package_2_0.jpg','\0'),(4,1,'package_1_01.jpg',''),(5,1,'package_1_1.jpg',''),(6,1,'package_1_0.jpg','\0'),(7,1,'package_1_1.jpg','\0'),(8,1,'package_1_01.jpg','\0'),(9,3,'package_3_0.jpg',''),(10,3,'package_3_1.jpg','\0'),(11,3,'package_3_2.jpg',''),(12,3,'package_3_01.jpg',''),(13,3,'package_3_0.jpg','\0');

/*Table structure for table `service` */

DROP TABLE IF EXISTS `service`;

CREATE TABLE `service` (
  `Service_id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `Service_title` varchar(50) DEFAULT NULL,
  `Vendor_type_id` int(11) DEFAULT NULL,
  KEY `Service_id` (`Service_id`)
) ENGINE=InnoDB AUTO_INCREMENT=41 DEFAULT CHARSET=latin1;

/*Data for the table `service` */

insert  into `service`(`Service_id`,`Service_title`,`Vendor_type_id`) values (1,'How much minimum people can accomodate?',1),(2,'How much maximum people can accomodate?',1),(3,'Do you have a hall or outdoor places\r?',1),(4,'Do you have a parking space\r\n?',1),(5,'Do you have restrooms/washrooms?',1),(6,'Is ther any room for bride?',1),(7,'Do you offer tenting service?',1),(8,'Any type of cancellation policy?',1),(9,'Do you have First Aid Box?',1),(10,'Do you have a Food Authority license?',4),(11,'Rate your Food Quality between 1-5? \r\n',4),(12,'Ratio of servers to guest\r\n?',4),(13,'Any type of Cancellation Policy?',4),(14,'What Type of Music of you play?',3),(15,'Any smoke or lighting effects\r\n?',3),(16,'How much hours included in package? \r\n',3),(17,'Any backup plan in case of equipement malfunction?',3),(18,'Any type of Cancellation Policy?',3),(19,'Do you work on user location or yours?\r\n',7),(20,'Any type of Cancellation Policy?',7),(21,'How much guest will come out with user?',7),(22,'Do you have First Aid Box?',7),(23,'Do you charge per milage or hour?',9),(24,'Any type of Cancellation Policy?',9),(25,'Does your Car has an auto Insurance\r\n?',9),(26,'Is the Driver available?\r\n',9),(27,'Do you have First Aid Box?',9),(28,'How much time you need to setup?',2),(29,'Any smoke or lighting effects\r\n?',2),(30,'How much hours included in package? \r\n',2),(31,'Any backup plan in case of equipement malfunction?',2),(32,'Any type of Cancellation Policy?',2),(33,'Do you offer fresh flowers?\r\n',2),(34,'What is your camera quality?',5),(35,'Did you just Photoshoot Or Film?',5),(36,'Are you a Videographer?',5),(37,'Photography style (traditional, photojournalistic)',5),(38,'Any backup plan in case of equipement malfunction?',5),(39,'Deliver of photos with album in no of days?',5),(40,'Copyright issue.\r\n',5);

/*Table structure for table `user_type` */

DROP TABLE IF EXISTS `user_type`;

CREATE TABLE `user_type` (
  `User_type_id` int(11) NOT NULL AUTO_INCREMENT,
  `USer_type_name` varchar(255) DEFAULT NULL,
  PRIMARY KEY (`User_type_id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

/*Data for the table `user_type` */

/*Table structure for table `users` */

DROP TABLE IF EXISTS `users`;

CREATE TABLE `users` (
  `User_id` int(11) NOT NULL AUTO_INCREMENT,
  `User_fname` varchar(255) DEFAULT NULL,
  `User_lname` varchar(255) DEFAULT NULL,
  `User_email` varchar(255) DEFAULT NULL,
  `User_phone_no` bigint(11) unsigned zerofill DEFAULT NULL,
  `User_password` varchar(128) DEFAULT NULL,
  `User_contact_preference` int(11) DEFAULT NULL,
  `CreatedBy` int(11) DEFAULT NULL,
  `CreatedOn` datetime DEFAULT NULL,
  `ModifiedBy` int(11) DEFAULT NULL,
  `ModifiedOn` datetime DEFAULT NULL,
  `isDeleted` int(1) DEFAULT '0',
  `IsVendor` int(1) DEFAULT '0',
  PRIMARY KEY (`User_id`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=latin1;

/*Data for the table `users` */

insert  into `users`(`User_id`,`User_fname`,`User_lname`,`User_email`,`User_phone_no`,`User_password`,`User_contact_preference`,`CreatedBy`,`CreatedOn`,`ModifiedBy`,`ModifiedOn`,`isDeleted`,`IsVendor`) values (1,'Tayyab ','Ahmed','test@gmail.com',03325020315,'202cb962ac59075b964b07152d234b70',1,NULL,'2018-05-28 13:27:22',NULL,NULL,0,1),(2,'Test','Ahmed','abc@gmail.com',03325020125,'202cb962ac59075b964b07152d234b70',1,NULL,'2018-06-14 10:10:15',NULL,NULL,0,1);

/*Table structure for table `vendor_pictures` */

DROP TABLE IF EXISTS `vendor_pictures`;

CREATE TABLE `vendor_pictures` (
  `Vendor_picture_id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `Vendor_id` int(11) DEFAULT NULL,
  `Vendor_picture_path` varchar(500) DEFAULT NULL,
  `Is_profile_pic` bit(1) DEFAULT b'0',
  `Is_Deleted` bit(1) DEFAULT b'0',
  KEY `Vendor_picture_id` (`Vendor_picture_id`)
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=latin1;

/*Data for the table `vendor_pictures` */

insert  into `vendor_pictures`(`Vendor_picture_id`,`Vendor_id`,`Vendor_picture_path`,`Is_profile_pic`,`Is_Deleted`) values (1,1,'vendor_1.jpg','','\0'),(2,1,'vendor_11.jpg','','\0'),(3,1,'vendor_12.jpg','','\0'),(4,1,'vendor_13.jpg','','\0'),(5,2,'vendor_2.jpg','','\0');

/*Table structure for table `vendor_service` */

DROP TABLE IF EXISTS `vendor_service`;

CREATE TABLE `vendor_service` (
  `Vendor_service_id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `Vendor_id` int(11) DEFAULT NULL,
  `Service_id` int(11) DEFAULT NULL,
  `creation_date` datetime DEFAULT NULL,
  `isdeleted` bit(1) DEFAULT b'0',
  `result` varchar(50) DEFAULT NULL,
  KEY `Vendor_service_id` (`Vendor_service_id`)
) ENGINE=InnoDB AUTO_INCREMENT=20 DEFAULT CHARSET=latin1;

/*Data for the table `vendor_service` */

insert  into `vendor_service`(`Vendor_service_id`,`Vendor_id`,`Service_id`,`creation_date`,`isdeleted`,`result`) values (1,1,14,'2018-05-28 21:44:39','\0','Party'),(2,1,15,'2018-05-28 21:44:39','\0','Both'),(3,1,16,'2018-05-28 21:44:39','\0','4'),(4,1,17,'2018-05-28 21:44:39','\0','yes'),(5,1,18,'2018-05-28 21:44:39','\0','No'),(6,2,1,'2018-06-14 10:19:40','\0','500'),(7,2,2,'2018-06-14 10:19:40','\0','1000'),(8,2,3,'2018-06-14 10:19:40','\0','Hall'),(9,2,4,'2018-06-14 10:19:40','\0','Yes'),(10,2,5,'2018-06-14 10:19:40','\0','Yes'),(11,2,6,'2018-06-14 10:19:40','\0','Yes'),(12,2,7,'2018-06-14 10:19:41','\0','Yes'),(13,2,8,'2018-06-14 10:19:41','\0','No'),(14,2,9,'2018-06-14 10:19:41','\0','Yes'),(15,2,14,'2018-06-14 10:19:41','\0','Party'),(16,2,15,'2018-06-14 10:19:41','\0','Both'),(17,2,16,'2018-06-14 10:19:41','\0','4'),(18,2,17,'2018-06-14 10:19:41','\0','yes'),(19,2,18,'2018-06-14 10:19:41','\0','No');

/*Table structure for table `vendor_type` */

DROP TABLE IF EXISTS `vendor_type`;

CREATE TABLE `vendor_type` (
  `Vendor_type_id` int(11) NOT NULL AUTO_INCREMENT,
  `Vendor_type_name` varchar(50) DEFAULT NULL,
  PRIMARY KEY (`Vendor_type_id`)
) ENGINE=InnoDB AUTO_INCREMENT=11 DEFAULT CHARSET=latin1;

/*Data for the table `vendor_type` */

insert  into `vendor_type`(`Vendor_type_id`,`Vendor_type_name`) values (1,'Banquet Hall'),(2,'Decorators'),(3,'Dj'),(4,'Catering'),(5,'Photographer'),(6,'Bakeries'),(7,'Bridal Saloon'),(8,'Invitation'),(9,'Limousine'),(10,'Florist');

/*Table structure for table `vendors` */

DROP TABLE IF EXISTS `vendors`;

CREATE TABLE `vendors` (
  `Vendor_id` int(11) NOT NULL AUTO_INCREMENT,
  `Vendor_name` varchar(255) DEFAULT NULL,
  `Vendor_type` int(11) DEFAULT NULL,
  `Vendor_description` longtext,
  `Vendor_address` varchar(255) DEFAULT NULL,
  `CreatedBy` int(11) DEFAULT NULL,
  `CreatedOn` datetime DEFAULT NULL,
  `ModifiedBy` int(11) DEFAULT NULL,
  `ModifiedOn` datetime DEFAULT NULL,
  `isDeleted` int(1) DEFAULT '0',
  `City` varchar(50) DEFAULT NULL,
  `Vendor_lat` double DEFAULT NULL,
  `Vendor_long` double DEFAULT NULL,
  `User_id` int(11) DEFAULT NULL,
  `isBanquetHall` int(1) DEFAULT NULL,
  `isDecorators` int(1) DEFAULT NULL,
  `isDj` int(1) DEFAULT NULL,
  `isCatering` int(1) DEFAULT NULL,
  `isPhotographer` int(1) DEFAULT NULL,
  `isBakeries` int(1) DEFAULT NULL,
  `isBridalSaloon` int(1) DEFAULT NULL,
  `isInvitation` int(1) DEFAULT NULL,
  `isLimousine` int(1) DEFAULT NULL,
  `isFlorist` int(1) DEFAULT NULL,
  `Vendor_starting_price` int(11) DEFAULT NULL,
  KEY `Vendor_id` (`Vendor_id`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=latin1;

/*Data for the table `vendors` */

insert  into `vendors`(`Vendor_id`,`Vendor_name`,`Vendor_type`,`Vendor_description`,`Vendor_address`,`CreatedBy`,`CreatedOn`,`ModifiedBy`,`ModifiedOn`,`isDeleted`,`City`,`Vendor_lat`,`Vendor_long`,`User_id`,`isBanquetHall`,`isDecorators`,`isDj`,`isCatering`,`isPhotographer`,`isBakeries`,`isBridalSaloon`,`isInvitation`,`isLimousine`,`isFlorist`,`Vendor_starting_price`) values (1,'Tayyab Hall',NULL,'ddaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaa','Khursheed Alam Road, Falcon Complex, Lahore, Punjab, Pakistan',NULL,'2018-05-28 21:44:39',NULL,'2018-06-04 12:36:47',0,'Lahore',31.504214566890944,74.33143593652346,1,NULL,NULL,1,NULL,NULL,NULL,NULL,NULL,NULL,NULL,0),(2,'mughal e azam',NULL,'we are a team of professional event planners.','Kalma Underpass, Lahore, Punjab, Pakistan',NULL,'2018-06-14 10:19:40',NULL,'2018-06-14 10:21:15',0,'Lahore',31.504214566890944,74.33143593652346,2,1,NULL,1,NULL,NULL,NULL,NULL,NULL,NULL,NULL,0);

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;
