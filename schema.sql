/*
SQLyog Ultimate v11.33 (32 bit)
MySQL - 5.5.45 : Database - error_detector
*********************************************************************
*/

/*!40101 SET NAMES utf8 */;

/*!40101 SET SQL_MODE=''*/;

/*!40014 SET @OLD_UNIQUE_CHECKS=@@UNIQUE_CHECKS, UNIQUE_CHECKS=0 */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;
/*!40111 SET @OLD_SQL_NOTES=@@SQL_NOTES, SQL_NOTES=0 */;
CREATE DATABASE /*!32312 IF NOT EXISTS*/`error_detector` /*!40100 DEFAULT CHARACTER SET latin1 */;

USE `error_detector`;

/*Table structure for table `error_metadata` */

DROP TABLE IF EXISTS `error_metadata`;

CREATE TABLE `error_metadata` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `err_id` int(11) DEFAULT NULL,
  `clientIP` varchar(50) DEFAULT NULL,
  `apiKey` varchar(50) DEFAULT NULL,
  `projectRoot` varchar(500) DEFAULT NULL,
  `webPageUrl` varchar(500) DEFAULT NULL,
  `fileUrl` varchar(500) DEFAULT NULL,
  `message` varchar(500) DEFAULT NULL,
  `rowNum` int(11) DEFAULT NULL,
  `colNum` int(11) DEFAULT NULL,
  `context` varchar(200) DEFAULT NULL,
  `userAgent` varchar(200) DEFAULT NULL,
  `language` varchar(50) DEFAULT NULL,
  `browswer` varchar(50) DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `err_id` (`err_id`),
  CONSTRAINT `error_metadata_ibfk_1` FOREIGN KEY (`err_id`) REFERENCES `errors` (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

/*Data for the table `error_metadata` */

/*Table structure for table `errors` */

DROP TABLE IF EXISTS `errors`;

CREATE TABLE `errors` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `project_id` int(11) DEFAULT NULL,
  `name` varchar(50) DEFAULT NULL,
  `count` int(11) DEFAULT NULL,
  `last_occurence` varchar(50) DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `project_id` (`project_id`),
  CONSTRAINT `errors_ibfk_1` FOREIGN KEY (`project_id`) REFERENCES `project` (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

/*Data for the table `errors` */

/*Table structure for table `login` */

DROP TABLE IF EXISTS `login`;

CREATE TABLE `login` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `u_id` int(11) DEFAULT NULL,
  `username` varchar(50) DEFAULT NULL,
  `password` varchar(50) DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `u_id` (`u_id`),
  CONSTRAINT `login_ibfk_1` FOREIGN KEY (`u_id`) REFERENCES `user` (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=latin1;

/*Data for the table `login` */

insert  into `login`(`id`,`u_id`,`username`,`password`) values (1,4,'snik','snik'),(2,7,'nvn','nvnv'),(3,8,'khiz','khiz');

/*Table structure for table `project` */

DROP TABLE IF EXISTS `project`;

CREATE TABLE `project` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(50) DEFAULT NULL,
  `u_id` int(11) DEFAULT NULL,
  `err_count` int(11) DEFAULT NULL,
  `apikey` varchar(50) DEFAULT NULL,
  `creation_date` varchar(50) DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `u_id` (`u_id`),
  CONSTRAINT `project_ibfk_1` FOREIGN KEY (`u_id`) REFERENCES `user` (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

/*Data for the table `project` */

/*Table structure for table `user` */

DROP TABLE IF EXISTS `user`;

CREATE TABLE `user` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `first_name` varchar(50) DEFAULT NULL,
  `last_name` varchar(50) DEFAULT NULL,
  `status` int(11) DEFAULT '1',
  `email` varchar(50) DEFAULT NULL,
  `trial_startDate` varchar(50) DEFAULT NULL,
  `trial_expirydate` varchar(50) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=9 DEFAULT CHARSET=latin1;

/*Data for the table `user` */

insert  into `user`(`id`,`first_name`,`last_name`,`status`,`email`,`trial_startDate`,`trial_expirydate`) values (4,'khizra','sarmad khan',1,'zxwe',NULL,NULL),(5,'nabeel','akhtar',1,'bander',NULL,NULL),(6,'khizra','khan',1,'khizra013@hotmail.com',NULL,NULL),(7,'hfh','bnvn',1,'nnnvn@hfnhj',NULL,NULL),(8,'khizra','khan',1,'khizra013@hotmail.com','2015/08/19','2015/09/02');

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;
