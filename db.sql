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
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `isDeleted` tinyint(1) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

/*Data for the table `barangays` */

insert  into `barangays`(`id`,`name`,`created_at`,`updated_at`,`isDeleted`) values (1,'Poblacion','2019-01-22 21:11:43','2019-01-22 21:11:43',0),(2,'Cataning','2019-01-22 21:11:43','2019-01-22 21:11:43',0),(3,'Bagumbayan','2019-01-22 21:11:43','2019-01-22 21:11:43',0),(4,'Talisay','2019-01-22 21:11:43','2019-01-22 21:11:43',0),(5,'Malabia','2019-01-22 21:11:43','2019-01-22 21:11:43',0),(6,'San Jose\r\n','2019-01-22 21:11:43','2019-01-22 21:11:43',0),(7,'Ibayo','2019-01-22 21:11:43','2019-01-22 21:11:43',0),(8,'Dona Francisca','2019-01-22 21:11:43','2019-01-22 21:11:43',0),(9,'Cupang Proper','2019-01-22 21:11:43','2019-01-22 21:11:43',0),(10,'Cupang North','2019-01-22 21:11:43','2019-01-22 21:11:43',0),(11,'Cupang West','2019-01-22 21:11:43','2019-01-22 21:11:43',0),(12,'Sibacan','2019-01-22 21:11:43','2019-01-22 21:11:43',0),(13,'Tuyo','2019-01-22 21:11:43','2019-01-22 21:11:43',0),(14,'Puerto Rivas Ibaba','2019-01-22 21:11:43','2019-01-22 21:11:43',0),(15,'Puerto Rivas Itaas','2019-01-22 21:11:43','2019-01-22 21:11:43',0),(16,'Tortugas','2019-01-22 21:11:43','2019-01-22 21:11:43',0),(17,'Central','2019-01-22 21:11:43','2019-01-22 21:11:43',0),(18,'Tenejero','2019-01-22 21:11:43','2019-01-22 21:11:43',0),(19,'Camacho','2019-01-22 21:11:43','2019-01-22 21:11:43',0),(20,'Bagong Silang','2019-01-22 21:11:43','2019-01-22 21:11:43',0),(21,'Puerto Rivas Lote','2019-01-22 21:11:43','2019-01-22 21:11:43',0),(22,'Dangcol','2019-01-22 21:11:43','2019-01-22 21:11:43',0),(23,'Cabog-Cabog','2019-01-22 21:11:43','2019-01-22 21:11:43',0),(24,'Tanato','2019-01-22 21:11:43','2019-01-22 21:11:43',0),(25,'Munting Batangas','2019-01-22 21:11:43','2019-01-22 21:11:43',0);

/*Table structure for table `diseases` */

DROP TABLE IF EXISTS `diseases`;

CREATE TABLE `diseases` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(255) DEFAULT NULL,
  `description` longtext,
  `date_created` datetime DEFAULT CURRENT_TIMESTAMP,
  `date_updated` datetime DEFAULT CURRENT_TIMESTAMP,
  `isDeleted` tinyint(1) DEFAULT '0',
  `isDeceased` tinyint(1) DEFAULT '0',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=latin1;

/*Data for the table `diseases` */

insert  into `diseases`(`id`,`name`,`description`,`date_created`,`date_updated`,`isDeleted`,`isDeceased`) values (1,'Malaria','Malaria is a type of disease that bsaldkfjasdlkfjasdkfjsdlfaj','2019-01-18 14:51:17','2019-01-18 14:51:17',1,0),(2,'Dengue','Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry\'s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum.','2019-01-18 14:51:29','2019-01-18 14:51:29',0,0),(3,'Malaria','Hahaha','2019-01-18 20:46:03','2019-01-18 20:46:03',0,0),(4,'Test Disease','Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry\'s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum.\r\n','2019-01-19 13:59:06','2019-01-19 13:59:06',0,0),(5,'Another 1','You gave it all for me\r\nMy soul desire my everything\r\nAll I am is devoted to You\r\nHow could I fail to see\r\nYou are the love that rescued me\r\nAll I am is devoted to You\r\nAnd oh, how could I not be moved\r\nLord here with You\r\nSo have Your way in me\r\n\'Cause Lord there is just one thing\r\nAnd that I will seek\r\nThis is my cry my one desire\r\nJust to be where You are Lord\r\nNow and forever it\'s more than a song\r\nMy one desire is to be with You\r\nIs to be with You Jesus\r\nHow could I fail to see\r\nYou are the love that rescued me\r\nAll I am is devoted to You\r\nAnd oh, how could I not be moved\r\nLord here with You\r\nSo have Your way in me\r\n\'Cause Lord there is just one thing\r\nAnd that I will seek\r\nThis is my cry my one desire\r\nJust to be where You are Lord\r\nNow and forever it\'s more than a song\r\nMy one desire is to be with You\r\nIs to be with You\r\nThis is my cry my one desire\r\nJust to be where You are Lord\r\nNow and forever it\'s more than a song\r\nMy one desire is to be with You\r\nIs to be with You Jesus\r\nThe one thing, the one thing\r\nThat I ask is to be with You\r\nThe one thing, the one thing\r\nThat I ask is to be with You\r\nThe one thing, the one thing\r\nThat I ask is to be with You\r\n(The one thing)\r\nThe one thing, the one thing\r\nThat I ask is to be with You\r\nIs to be with You\r\nThis is my cry my one desire\r\nJust to be where You are Lord\r\nNow and forever it\'s more than a song\r\nIt\'s my one desire is to be with You\r\nIs to be with You\r\nThis is my cry my one desire\r\nJust to be where You are Lord\r\nNow and forever it\'s more than a song\r\nMy one desire is to be with You\r\nIs to be with You Jesus, Jesus','2019-01-19 14:00:03','2019-01-19 14:00:03',1,0);

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
  `created_at` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `created_by` int(11) NOT NULL,
  `disease_id` int(11) unsigned DEFAULT NULL,
  `isDeleted` tinyint(1) DEFAULT '0',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=16 DEFAULT CHARSET=latin1;

/*Data for the table `records` */

insert  into `records`(`id`,`case_id`,`firstname`,`middlename`,`lastname`,`gender`,`birthday`,`barangay_id`,`date_of_sickness`,`created_at`,`updated_at`,`created_by`,`disease_id`,`isDeleted`) values (13,'Y2019-C100002','Chantal','Doe','Gomez','Female','1996-01-21',21,'2018-01-21','2019-01-23 15:47:53','2019-01-28 08:07:19',14,3,0),(14,'Y2019-C100003','Pablo','El Patron','Escobar','Male','1990-01-23',20,'2019-01-06','2019-01-23 15:50:02','2019-01-28 10:47:02',14,4,0),(15,'Y2019-C100004','Ashbee','Allego','Morgado','Male','1994-11-26',21,'2018-01-14','2019-01-28 08:08:52','2019-01-28 10:57:02',14,3,0);

/*Table structure for table `users` */

DROP TABLE IF EXISTS `users`;

CREATE TABLE `users` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `username` varchar(255) DEFAULT NULL,
  `firstname` varchar(255) DEFAULT NULL,
  `lastname` varchar(255) DEFAULT NULL,
  `password` varchar(255) DEFAULT NULL,
  `date_created` datetime DEFAULT CURRENT_TIMESTAMP,
  `date_updated` datetime DEFAULT CURRENT_TIMESTAMP,
  `isDeleted` tinyint(1) DEFAULT '0',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=16 DEFAULT CHARSET=latin1;

/*Data for the table `users` */

insert  into `users`(`id`,`username`,`firstname`,`lastname`,`password`,`date_created`,`date_updated`,`isDeleted`) values (14,'admin','Administrator','Account','$2y$10$tZAMuNlwtrTT1A8Ks4a8oOjzI1Xf/vbpYZX98YwBwx0L4jEmVfVFu','2019-01-24 10:08:36','2019-01-24 10:08:36',0),(15,'chantal.gomez','Chantal','Gomez','$2y$10$vSkHOHYs9G95BAI6gD65q.o5Sfhfqbwtdju7ACM2P80XkyXQeQeBm','2019-01-24 10:09:19','2019-01-24 10:09:19',0);

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;
