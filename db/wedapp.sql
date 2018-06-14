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

/*Table structure for table `service` */

DROP TABLE IF EXISTS `service`;

CREATE TABLE `service` (
  `Service_id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `Service_title` varchar(50) DEFAULT NULL,
  `Vendor_type_id` int(11) DEFAULT NULL,
  KEY `Service_id` (`Service_id`)
) ENGINE=InnoDB AUTO_INCREMENT=41 DEFAULT CHARSET=latin1;

/*Data for the table `service` */

insert  into `service`(`Service_id`,`Service_title`,`Vendor_type_id`) values (1,'People Accomodation\r\n',1),(2,'Rental fees per person',1),(3,'Hall or outdoor places\r',1),(4,'Parking space\r\n',1),(5,'Restrooms',1),(6,'Room for bride \r\n',1),(7,'Tenting Service',1),(8,'Cancellation Policy',1),(9,'First Aid Box',1),(10,'Food Authority license. \r\n',4),(11,'Food Quality \r\n',4),(12,'Ratio of servers to guest\r\n',4),(13,'Cancellation Policy',4),(14,'Type of Music',3),(15,'Any smoke or lighting effects\r\n',3),(16,'hours included in package \r\n',3),(17,'Any backup plan in case of equipement malfunction.',3),(18,'Cancellation Policy',3),(19,'Work on my location or yours ?\r\n',7),(20,'Cancellation Policy.\r\n',7),(21,'Guest with me',7),(22,'First Aid Box.',7),(23,'Charge per milage or hour.',9),(24,'Cancellation policy.\r\n',9),(25,'Auto Insurance\r\n',9),(26,'Driver avalable\r\n',9),(27,'First Aid Box.\r\n',9),(28,'time to setup.',2),(29,'Any lighting effects.\r\n',2),(30,'hours included in package. \r\n',2),(31,'Any backup plan in case of equipement malfunction.',2),(32,'Cancellation Policy.\r\n',2),(33,'Fresh flowers.\r\n',2),(34,'Camera Quality',5),(35,'Shoot Or Film.',5),(36,'Videographer ?',5),(37,'Photography style (traditional, photojournalistic,',5),(38,'Any backup plan in case of equipement malfunction.',5),(39,'Deliver of photos with album in no of days.',5),(40,'Copyright issue.\r\n',5);

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
  `User_name` varchar(255) DEFAULT NULL,
  `User_email` varchar(255) DEFAULT NULL,
  `User_phone_no` int(11) DEFAULT NULL,
  `User_password` varchar(128) DEFAULT NULL,
  `User_type_id` int(11) DEFAULT NULL,
  `CreatedBy` int(11) DEFAULT NULL,
  `CreatedOn` datetime DEFAULT NULL,
  `ModifiedBy` int(11) DEFAULT NULL,
  `ModifiedOn` datetime DEFAULT NULL,
  `isDeleted` int(1) DEFAULT NULL,
  PRIMARY KEY (`User_id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

/*Data for the table `users` */

/*Table structure for table `vendor_pictures` */

DROP TABLE IF EXISTS `vendor_pictures`;

CREATE TABLE `vendor_pictures` (
  `Vendor_picture_id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `Vendor_id` int(11) DEFAULT NULL,
  `Vendor_picture_path` varchar(50) DEFAULT NULL,
  KEY `Vendor_picture_id` (`Vendor_picture_id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

/*Data for the table `vendor_pictures` */

/*Table structure for table `vendor_service` */

DROP TABLE IF EXISTS `vendor_service`;

CREATE TABLE `vendor_service` (
  `Vendor_service_id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `Vendor_id` int(11) DEFAULT NULL,
  `Service_id` int(11) DEFAULT NULL,
  `creation_date` datetime DEFAULT NULL,
  `isdeleted` bit(1) DEFAULT b'0',
  KEY `Vendor_service_id` (`Vendor_service_id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

/*Data for the table `vendor_service` */

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
  `Vendor_contact_no` int(11) DEFAULT NULL,
  `Vendor_email_address` varchar(255) DEFAULT NULL,
  `Vendor_address` varchar(255) DEFAULT NULL,
  `Vendor_owner_name` varchar(255) DEFAULT NULL,
  `Vendor_owner_contact_no` int(11) DEFAULT NULL,
  `CreatedBy` int(11) DEFAULT NULL,
  `CreatedOn` datetime DEFAULT NULL,
  `ModifiedBy` int(11) DEFAULT NULL,
  `ModifiedOn` datetime DEFAULT NULL,
  `isDeleted` int(1) DEFAULT '0',
  `City` varchar(50) DEFAULT NULL,
  KEY `Vendor_id` (`Vendor_id`)
) ENGINE=InnoDB AUTO_INCREMENT=13 DEFAULT CHARSET=latin1;

/*Data for the table `vendors` */

insert  into `vendors`(`Vendor_id`,`Vendor_name`,`Vendor_type`,`Vendor_contact_no`,`Vendor_email_address`,`Vendor_address`,`Vendor_owner_name`,`Vendor_owner_contact_no`,`CreatedBy`,`CreatedOn`,`ModifiedBy`,`ModifiedOn`,`isDeleted`,`City`) values (1,'Gourmet Central Marquee',1,2147483647,NULL,'30 K, Mini Market, Gulberg II, Pakistan, Sir Syed Rd, Lahore','Gourmet',2147483647,NULL,NULL,NULL,NULL,0,'Lahore'),(2,'Eastern Marquee',1,2147483647,NULL,'210 Wafaqi Colony, Main Upper Canal Bank Road, Lahore - Pakistan','Eastern Marquee',2147483647,NULL,NULL,NULL,NULL,0,'Lahore'),(3,'Creative Zafar Marquee',1,2147483647,NULL,'Falcon Complex Gulberg III. Lahore, Pakistan','Zafar',2147483647,NULL,NULL,NULL,NULL,0,'Lahore'),(4,'Pakistan Rangers Marriage & Banquet Hall',1,2147483647,NULL,'Zarar Shaheed Road, Near Joray Bridge, Lahore Cantt, Lahore','Rangers',2147483647,NULL,NULL,NULL,NULL,0,'Lahore'),(5,'Taj Mahal Banquet Hall',1,966,NULL,'Ferozepur Road, Lahore',NULL,966,NULL,NULL,NULL,NULL,0,'Lahore'),(6,'Mughal-e-Azam Banquet Complex',1,321,NULL,'Usmani Rd, Lahore ',NULL,321,NULL,NULL,NULL,NULL,0,'Lahore '),(7,'Maharaja Palace',1,2147483647,NULL,'38 Maulana Shaukat Ali Road, Lahore 54770',NULL,2147483647,NULL,NULL,NULL,NULL,0,'Lahore '),(8,'Lahore Castle Banquet Hall',1,2147483647,NULL,'Block D1, Nespak Housing Society, Sutlej Ave, Lahore',NULL,2147483647,NULL,NULL,NULL,NULL,0,'Lahore '),(9,'Blessing Banquet Hall',1,2147483647,NULL,'9 civic center, Johar Town, Lahore',NULL,NULL,NULL,NULL,NULL,NULL,0,'Lahore '),(10,'Four Seasons Wedding & Banquet Halls',NULL,2147483647,NULL,'13 Raiwind Rd, Lahore',NULL,NULL,NULL,NULL,NULL,NULL,0,'Lahore '),(12,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,0,NULL);

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;
