/*
SQLyog Ultimate v12.09 (64 bit)
MySQL - 5.7.19 : Database - outbreak
*********************************************************************
*/

/*!40101 SET NAMES utf8 */;

/*!40101 SET SQL_MODE=''*/;

/*!40014 SET @OLD_UNIQUE_CHECKS=@@UNIQUE_CHECKS, UNIQUE_CHECKS=0 */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;
/*!40111 SET @OLD_SQL_NOTES=@@SQL_NOTES, SQL_NOTES=0 */;
CREATE DATABASE /*!32312 IF NOT EXISTS*/`outbreak` /*!40100 DEFAULT CHARACTER SET latin1 */;

USE `outbreak`;

/*Table structure for table `barangays` */

DROP TABLE IF EXISTS `barangays`;

CREATE TABLE `barangays` (
  `id` int(15) DEFAULT NULL,
  `name` varchar(765) DEFAULT NULL,
  `contact` varchar(255) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `isDeleted` tinyint(1) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

/*Data for the table `barangays` */

insert  into `barangays`(`id`,`name`,`contact`,`created_at`,`updated_at`,`isDeleted`) values (1,'Poblacion','09335277757','2019-01-22 21:11:43','2019-01-22 21:11:43',0),(2,'Cataning','09335277757','2019-01-22 21:11:43','2019-01-22 21:11:43',0),(3,'Bagumbayan','09335277757','2019-01-22 21:11:43','2019-01-22 21:11:43',0),(4,'Talisay','09335277757','2019-01-22 21:11:43','2019-01-22 21:11:43',0),(5,'Malabia','09335277757','2019-01-22 21:11:43','2019-01-22 21:11:43',0),(6,'San Jose\r\n','09335277757','2019-01-22 21:11:43','2019-01-22 21:11:43',0),(7,'Ibayo','09335277757','2019-01-22 21:11:43','2019-01-22 21:11:43',0),(8,'Dona Francisca','09335277757','2019-01-22 21:11:43','2019-01-22 21:11:43',0),(9,'Cupang Proper','09335277757','2019-01-22 21:11:43','2019-01-22 21:11:43',0),(10,'Cupang North','09335277757','2019-01-22 21:11:43','2019-01-22 21:11:43',0),(11,'Cupang West','09335277757','2019-01-22 21:11:43','2019-01-22 21:11:43',0),(12,'Sibacan','09335277757','2019-01-22 21:11:43','2019-01-22 21:11:43',0),(13,'Tuyo','09335277757','2019-01-22 21:11:43','2019-01-22 21:11:43',0),(14,'Puerto Rivas Ibaba','09335277757','2019-01-22 21:11:43','2019-01-22 21:11:43',0),(15,'Puerto Rivas Itaas','09335277757','2019-01-22 21:11:43','2019-01-22 21:11:43',0),(16,'Tortugas','09335277757','2019-01-22 21:11:43','2019-01-22 21:11:43',0),(17,'Cupang Central','09335277757','2019-01-22 21:11:43','2019-01-22 21:11:43',0),(18,'Tenejero','09335277757','2019-01-22 21:11:43','2019-01-22 21:11:43',0),(19,'Camacho','09335277757','2019-01-22 21:11:43','2019-01-22 21:11:43',0),(20,'Bagong Silang','09171101126','2019-01-22 21:11:43','2019-01-22 21:11:43',0),(21,'Puerto Rivas Lote','09335277757','2019-01-22 21:11:43','2019-01-22 21:11:43',0),(22,'Dangcol','09335277757','2019-01-22 21:11:43','2019-01-22 21:11:43',0),(23,'Cabog-Cabog','09335277757','2019-01-22 21:11:43','2019-01-22 21:11:43',0),(24,'Tanato','09335277757','2019-01-22 21:11:43','2019-01-22 21:11:43',0),(25,'Munting Batangas','09335277757','2019-01-22 21:11:43','2019-01-22 21:11:43',0);

/*Table structure for table `diseases` */

DROP TABLE IF EXISTS `diseases`;

CREATE TABLE `diseases` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(255) DEFAULT NULL,
  `description` longtext,
  `message` longtext,
  `date_created` datetime DEFAULT CURRENT_TIMESTAMP,
  `date_updated` datetime DEFAULT CURRENT_TIMESTAMP,
  `isDeleted` tinyint(1) DEFAULT '0',
  `isDeceased` tinyint(1) DEFAULT '0',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=8 DEFAULT CHARSET=latin1;

/*Data for the table `diseases` */

/*Table structure for table `hospitals` */

DROP TABLE IF EXISTS `hospitals`;

CREATE TABLE `hospitals` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(255) DEFAULT NULL,
  `address` varchar(255) DEFAULT NULL,
  `created_at` datetime DEFAULT CURRENT_TIMESTAMP,
  `updated_at` datetime DEFAULT CURRENT_TIMESTAMP,
  `added_by` int(15) DEFAULT NULL,
  `isDeleted` tinyint(1) DEFAULT '0',
  `date_of_released` date DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=7 DEFAULT CHARSET=latin1;

/*Data for the table `hospitals` */

/*Table structure for table `records` */

DROP TABLE IF EXISTS `records`;

CREATE TABLE `records` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `case_id` varbinary(255) NOT NULL,
  `firstname` varchar(255) NOT NULL,
  `middlename` varchar(255) NOT NULL,
  `lastname` varchar(255) NOT NULL,
  `gender` varchar(255) NOT NULL,
  `birthday` date DEFAULT NULL,
  `barangay_id` int(11) NOT NULL,
  `date_of_sickness` date NOT NULL,
  `date_of_release` date DEFAULT NULL,
  `hospital_id` int(15) DEFAULT NULL,
  `created_at` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `created_by` int(11) NOT NULL,
  `disease_id` int(11) unsigned DEFAULT NULL,
  `isDeleted` tinyint(1) DEFAULT '0',
  `status` varchar(255) DEFAULT 'pending',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=55 DEFAULT CHARSET=latin1;

/*Data for the table `records` */

/*Table structure for table `sms` */

DROP TABLE IF EXISTS `sms`;

CREATE TABLE `sms` (
  `id` int(15) NOT NULL AUTO_INCREMENT,
  `message` longtext,
  `created_at` datetime DEFAULT CURRENT_TIMESTAMP,
  `disease_id` int(15) DEFAULT NULL,
  `barangay_id` int(15) DEFAULT NULL,
  `count` int(11) DEFAULT NULL,
  `barangay_name` varchar(255) DEFAULT NULL,
  `disease_name` varchar(255) DEFAULT NULL,
  `color` varbinary(255) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=27 DEFAULT CHARSET=latin1;

/*Data for the table `sms` */

/*Table structure for table `tips` */

DROP TABLE IF EXISTS `tips`;

CREATE TABLE `tips` (
  `id` int(15) unsigned NOT NULL AUTO_INCREMENT,
  `title` varchar(255) DEFAULT NULL,
  `subtitle` varchar(255) DEFAULT NULL,
  `img_src` varchar(255) DEFAULT NULL,
  `body` longtext,
  `created_at` datetime DEFAULT CURRENT_TIMESTAMP,
  `created_by` int(15) DEFAULT NULL,
  `isDeleted` tinyint(1) DEFAULT '0',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=15 DEFAULT CHARSET=latin1;

/*Data for the table `tips` */

/*Table structure for table `users` */

DROP TABLE IF EXISTS `users`;

CREATE TABLE `users` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `username` varchar(255) DEFAULT NULL,
  `firstname` varchar(255) DEFAULT NULL,
  `isAdmin` tinyint(1) DEFAULT '0',
  `lastname` varchar(255) DEFAULT NULL,
  `password` varchar(255) DEFAULT NULL,
  `date_created` datetime DEFAULT CURRENT_TIMESTAMP,
  `date_updated` datetime DEFAULT CURRENT_TIMESTAMP,
  `isDeleted` tinyint(1) DEFAULT '0',
  `isLoggedIn` tinyint(1) DEFAULT '0',
  `forceLogOut` tinyint(1) DEFAULT '0',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=27 DEFAULT CHARSET=latin1;

/*Data for the table `users` */

insert  into `users`(`id`,`username`,`firstname`,`isAdmin`,`lastname`,`password`,`date_created`,`date_updated`,`isDeleted`,`isLoggedIn`,`forceLogOut`) values (26,'admin','Administrator',0,'Account','$2y$10$aTi2GoINEhKtm.A.msfTT.hZU5Znmy.ZijWAJpsxxAq72a8Fvb.C.','2019-03-21 17:16:36','2019-03-21 17:16:36',0,0,0);

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;
