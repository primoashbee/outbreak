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

insert  into `diseases`(`id`,`name`,`description`,`message`,`date_created`,`date_updated`,`isDeleted`,`isDeceased`) values (1,'Malaria','Malaria is a type of disease that bsaldkfjasdlkfjasdkfjsdlfaj','HERE ARE SOME TIPS TO PREVENT DENGUE:\r\n1.USE/WEAR INSECT REPELLENTS\r\n2.DRAIN AND DUMP STANDING WATERS FOUND IN CONTAINERS INSIDE AND AROUND THE HOUSE\r\n3.INSTALL OR FIX SCREENS ON WINDOWS AND DOORS\r\n4.SPRAY ADULTICIDE AROUND BARANGAY\r\nFOR MORE HEALTH TIPS, VISIT(PUBLIC WEBSITE).\r\nPLEASE BE AWARE AND KEEPSAFE!','2019-01-18 14:51:17','2019-01-18 14:51:17',1,0),(2,'Dengue','Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry\'s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum.','HERE ARE SOME TIPS TO PREVENT DENGUE:\n<br>\n1.USE/WEAR INSECT REPELLENTS <br>\n2.DRAIN AND DUMP STANDING WATERS FOUND IN CONTAINERS INSIDE AND AROUND THE HOUSE <br>\n3.INSTALL OR FIX SCREENS ON WINDOWS AND DOORS <br>\n4.SPRAY ADULTICIDE AROUND BARANGAY <br>\nPLEASE BE AWARE AND KEEPSAFE!','2019-01-18 14:51:29','2019-01-18 14:51:29',0,0),(3,'Malaria','Hahaha','HERE ARE SOME TIPS TO PREVENT DENGUE:\r\n1.USE/WEAR INSECT REPELLENTS\r\n2.DRAIN AND DUMP STANDING WATERS FOUND IN CONTAINERS INSIDE AND AROUND THE HOUSE\r\n3.INSTALL OR FIX SCREENS ON WINDOWS AND DOORS\r\n4.SPRAY ADULTICIDE AROUND BARANGAY\r\nFOR MORE HEALTH TIPS, VISIT(PUBLIC WEBSITE).\r\nPLEASE BE AWARE AND KEEPSAFE!','2019-01-18 20:46:03','2019-01-18 20:46:03',0,0),(4,'Test Disease','Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry\'s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum.\r\n','HERE ARE SOME TIPS TO PREVENT DENGUE:\r\n1.USE/WEAR INSECT REPELLENTS\r\n2.DRAIN AND DUMP STANDING WATERS FOUND IN CONTAINERS INSIDE AND AROUND THE HOUSE\r\n3.INSTALL OR FIX SCREENS ON WINDOWS AND DOORS\r\n4.SPRAY ADULTICIDE AROUND BARANGAY\r\nFOR MORE HEALTH TIPS, VISIT(PUBLIC WEBSITE).\r\nPLEASE BE AWARE AND KEEPSAFE!','2019-01-19 13:59:06','2019-01-19 13:59:06',0,0),(5,'Another 1','You gave it all for me\r\nMy soul desire my everything\r\nAll I am is devoted to You\r\nHow could I fail to see\r\nYou are the love that rescued me\r\nAll I am is devoted to You\r\nAnd oh, how could I not be moved\r\nLord here with You\r\nSo have Your way in me\r\n\'Cause Lord there is just one thing\r\nAnd that I will seek\r\nThis is my cry my one desire\r\nJust to be where You are Lord\r\nNow and forever it\'s more than a song\r\nMy one desire is to be with You\r\nIs to be with You Jesus\r\nHow could I fail to see\r\nYou are the love that rescued me\r\nAll I am is devoted to You\r\nAnd oh, how could I not be moved\r\nLord here with You\r\nSo have Your way in me\r\n\'Cause Lord there is just one thing\r\nAnd that I will seek\r\nThis is my cry my one desire\r\nJust to be where You are Lord\r\nNow and forever it\'s more than a song\r\nMy one desire is to be with You\r\nIs to be with You\r\nThis is my cry my one desire\r\nJust to be where You are Lord\r\nNow and forever it\'s more than a song\r\nMy one desire is to be with You\r\nIs to be with You Jesus\r\nThe one thing, the one thing\r\nThat I ask is to be with You\r\nThe one thing, the one thing\r\nThat I ask is to be with You\r\nThe one thing, the one thing\r\nThat I ask is to be with You\r\n(The one thing)\r\nThe one thing, the one thing\r\nThat I ask is to be with You\r\nIs to be with You\r\nThis is my cry my one desire\r\nJust to be where You are Lord\r\nNow and forever it\'s more than a song\r\nIt\'s my one desire is to be with You\r\nIs to be with You\r\nThis is my cry my one desire\r\nJust to be where You are Lord\r\nNow and forever it\'s more than a song\r\nMy one desire is to be with You\r\nIs to be with You Jesus, Jesus','HERE ARE SOME TIPS TO PREVENT DENGUE:\r\n1.USE/WEAR INSECT REPELLENTS\r\n2.DRAIN AND DUMP STANDING WATERS FOUND IN CONTAINERS INSIDE AND AROUND THE HOUSE\r\n3.INSTALL OR FIX SCREENS ON WINDOWS AND DOORS\r\n4.SPRAY ADULTICIDE AROUND BARANGAY\r\nFOR MORE HEALTH TIPS, VISIT(PUBLIC WEBSITE).\r\nPLEASE BE AWARE AND KEEPSAFE!','2019-01-19 14:00:03','2019-01-19 14:00:03',1,0),(6,'Katamaran','Ewan','HERE ARE SOME TIPS TO PREVENT DENGUE:\r\n1.USE/WEAR INSECT REPELLENTS\r\n2.DRAIN AND DUMP STANDING WATERS FOUND IN CONTAINERS INSIDE AND AROUND THE HOUSE\r\n3.INSTALL OR FIX SCREENS ON WINDOWS AND DOORS\r\n4.SPRAY ADULTICIDE AROUND BARANGAY\r\nFOR MORE HEALTH TIPS, VISIT(PUBLIC WEBSITE).\r\nPLEASE BE AWARE AND KEEPSAFE!','2019-02-28 11:28:13','2019-02-28 11:28:13',0,0),(7,'Dota2','Dota2 BLABBLHABLAHBALHBALBHALBHALHBDota2 BLABBLHABLAHBALHBALBHALBHALHBDota2 BLABBLHABLAHBALHBALBHALBHALHBDota2 BLABBLHABLAHBALHBALBHALBHALHBDota2 BLABBLHABLAHBALHBALBHALBHALHBDota2 BLABBLHABLAHBALHBALBHALBHALHBDota2 BLABBLHABLAHBALHBALBHALBHALHBDota2 BLABBLHABLAHBALHBALBHALBHALHBDota2 BLABBLHABLAHBALHBALBHALBHALHBDota2 BLABBLHABLAHBALHBALBHALBHALHBDota2 BLABBLHABLAHBALHBALBHALBHALHBDota2 BLABBLHABLAHBALHBALBHALBHALHBDota2 BLABBLHABLAHBALHBALBHALBHALHBDota2 BLABBLHABLAHBALHBALBHALBHALHB','HERE ARE SOME TIPS TO PREVENT DENGUE:\r\n1.USE/WEAR INSECT REPELLENTS\r\n2.DRAIN AND DUMP STANDING WATERS FOUND IN CONTAINERS INSIDE AND AROUND THE HOUSE\r\n3.INSTALL OR FIX SCREENS ON WINDOWS AND DOORS\r\n4.SPRAY ADULTICIDE AROUND BARANGAY\r\nFOR MORE HEALTH TIPS, VISIT(PUBLIC WEBSITE).\r\nPLEASE BE AWARE AND KEEPSAFE!','2019-03-01 10:11:31','2019-03-01 10:11:31',0,0);

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

insert  into `hospitals`(`id`,`name`,`address`,`created_at`,`updated_at`,`added_by`,`isDeleted`,`date_of_released`) values (1,'BATAAN GENERAL HOSPITAL AND MEDICAL CENTER ','1647 SFALDFKASLFKASLDKF','2019-02-12 09:26:12','2019-02-12 09:26:12',NULL,0,NULL),(2,'CENTRO MEDICO DE SANTISIMO ROSARIO','asdasd','2019-02-12 09:35:33','2019-02-12 09:35:33',NULL,0,NULL),(3,'ISAAC & CATALINA MEDICAL CENTER','asdad','2019-02-12 09:35:40','2019-02-12 09:35:40',NULL,0,NULL),(6,'WOMEN\'S HOSPITAL','asdasdasd','2019-02-12 09:35:58','2019-02-12 09:35:58',NULL,1,NULL);

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

insert  into `records`(`id`,`case_id`,`firstname`,`middlename`,`lastname`,`gender`,`birthday`,`barangay_id`,`date_of_sickness`,`date_of_release`,`hospital_id`,`created_at`,`updated_at`,`created_by`,`disease_id`,`isDeleted`,`status`) values (13,'Y2019-C100002','Chantal','Doe','Gomez','Female','1996-01-21',21,'2019-03-22',NULL,2,'2019-01-23 15:47:53','2019-03-19 13:45:40',14,1,0,'pending'),(14,'Y2019-C100003','Pablo','El Patron','Escobar','Male','1990-01-23',25,'2019-03-08',NULL,3,'2019-01-23 15:50:02','2019-03-19 13:40:02',14,1,0,'pending'),(15,'Y2019-C100004','Ashbee','Allego','Morgado','Male','1994-11-26',25,'2018-01-14','2019-02-12',3,'2019-01-28 08:08:52','2019-02-21 15:06:39',14,1,0,'healthy'),(16,'Y2019-C100005','Ashbee','Allego','Morgado','Male','1994-11-26',25,'2019-03-15','2019-02-12',6,'2019-02-12 09:42:57','2019-03-19 13:37:12',14,1,0,'deceased'),(17,'Y2019-C100006','Johne','Okay','Doe','Female','1990-01-05',25,'2019-01-28',NULL,2,'2019-02-13 15:25:43','2019-02-15 13:10:44',14,2,0,'pending'),(18,'Y2019-C100007','Tim','Ewan','Cook','Male','1989-01-27',6,'2018-02-25',NULL,1,'2019-02-13 15:26:05','2019-02-21 11:35:53',14,1,0,'pending'),(19,'Y2019-C100008','Tim','Ewan','Cooker','Male','1989-01-27',15,'2019-02-25',NULL,1,'2019-02-13 15:26:19','2019-02-21 14:03:16',14,2,0,'pending'),(20,'Y2019-C100009','Sansa','SSSSS','Stark','Male','1994-01-29',15,'2019-02-26',NULL,1,'2019-02-13 15:26:44','2019-02-21 11:35:53',14,1,0,'pending'),(21,'Y2019-C100010','Arya','SSSSS','Stark','Male','1994-01-29',21,'2019-03-26',NULL,1,'2019-02-13 15:26:57','2019-02-21 11:35:53',14,1,0,'pending'),(22,'Y2019-C100011','John ','Middle','Snow','Male','1985-05-26',21,'2019-01-29','2019-02-12',1,'2019-02-13 15:28:28','2019-02-21 11:35:53',14,1,0,'deceased'),(23,'Y2019-C100012','Cersei','Queen','Lannister','Female','1985-01-27',6,'2019-02-04',NULL,1,'2019-02-13 15:29:07','2019-02-21 11:35:53',14,1,0,'pending'),(24,'Y2019-C100013','Joffrey','Ampon','Baratheon','Female','1995-07-16',15,'2019-01-28',NULL,3,'2019-02-13 15:29:33','2019-02-21 11:35:53',14,1,0,'pending'),(25,'Y2019-C100014','Chantal','Doe','Gomez','Female','1996-01-21',21,'2019-01-21',NULL,2,'2019-02-14 09:32:38','2019-02-21 11:35:53',14,1,0,'pending'),(26,'Y2019-C100015','Leon','Sample','Kennedy','Male','1995-12-23',25,'2019-12-23',NULL,2,'2019-02-15 09:25:15','2019-02-15 13:13:45',14,2,0,'pending'),(27,'Y2019-C100016','Ada','RE','Wong','Female','1989-01-05',25,'2019-01-05',NULL,3,'2019-02-15 11:31:16','2019-02-15 13:13:44',14,2,0,'pending'),(28,'Y2019-C100017','Albert','John','Wesker','Male','1994-01-01',25,'2019-04-11',NULL,2,'2019-02-15 11:58:31','2019-02-21 11:35:53',14,1,0,'pending'),(29,'Y2019-C100018','test','test','test','Male','1994-01-29',16,'2019-02-13',NULL,3,'2019-02-15 14:11:13','2019-02-21 11:35:53',14,1,0,'pending'),(30,'Y2019-C100019','asd','asda','dsadasda','Female','2019-02-11',6,'2019-02-14',NULL,2,'2019-02-15 14:11:24','2019-02-21 11:35:53',14,1,0,'pending'),(31,'Y2019-C100020','ADA','DZCZX','CZXCASDASD','Male','1989-01-28',21,'2019-02-11',NULL,3,'2019-02-15 14:11:41','2019-02-21 11:35:53',14,1,0,'pending'),(49,'Y2019-C100021','El Chapo','Loera','Guzman','Male','1945-01-01',6,'2019-02-19',NULL,2,'2019-02-19 14:48:35','2019-02-21 11:35:53',14,1,0,'pending'),(50,'Y2019-C100022','Enefe','Beer','Kakarot','Male','1990-02-05',4,'2019-12-30',NULL,2,'2019-02-21 14:21:35','2019-02-21 14:21:35',22,2,0,'pending'),(51,'Y2019-C100023','t','qwe','qweqwewe','Male','1994-02-04',14,'2019-01-01',NULL,2,'2019-02-21 14:22:51','2019-02-21 14:22:51',22,2,0,'pending'),(52,'Y2019-C100024','asd','aa','dadad','Female','1995-02-05',21,'2019-01-07',NULL,2,'2019-02-21 14:24:03','2019-02-21 14:24:03',22,2,0,'pending'),(53,'Y2019-C100025','TEST ','TEST','TTEST','Male','1995-02-05',15,'2019-02-25',NULL,2,'2019-02-25 00:00:24','2019-02-25 00:00:24',22,4,0,'pending'),(54,'Y2019-C100026','asd','adada','dasdasd','Female','1992-01-29',17,'2019-02-20',NULL,3,'2019-02-28 11:28:48','2019-02-28 11:28:48',22,6,0,'pending');

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

insert  into `sms`(`id`,`message`,`created_at`,`disease_id`,`barangay_id`,`count`,`barangay_name`,`disease_name`,`color`) values (16,'DENGUE ALERT! 2019-03-06 02:41:51 PM. THIS IS TO INFORM YOU THAT BARANGAY PUERTO RIVAS LOTE IS ON RED!\nPLEASE VISIT(PUBLIC WEBSITE) FOR MORE INFO.','2019-03-06 14:41:51',2,21,9,'PUERTO RIVAS LOTE','Dengue','RED'),(21,'ANOTHER 1 ALERT! 2019-03-06 02:56:57 PM. THIS IS TO INFORM YOU THAT BARANGAY PUERTO RIVAS ITAAS IS ON RED!\nPLEASE VISIT(PUBLIC WEBSITE) FOR MORE INFO.','2019-03-06 14:56:57',5,15,14,'PUERTO RIVAS ITAAS','Another 1','RED'),(23,'ANOTHER 1 ALERT! 2019-03-06 03:25:04 PM. THIS IS TO INFORM YOU THAT BARANGAY PUERTO RIVAS ITAAS IS ON RED!\nPLEASE VISIT(PUBLIC WEBSITE) FOR MORE INFO.','2019-03-06 15:25:04',5,15,14,'PUERTO RIVAS ITAAS','Another 1','RED'),(24,'ANOTHER 1 ALERT! 2019-03-06 03:26:44 PM. THIS IS TO INFORM YOU THAT BARANGAY PUERTO RIVAS ITAAS IS ON RED!\nPLEASE VISIT(PUBLIC WEBSITE) FOR MORE INFO.','2019-03-06 15:26:44',5,15,14,'PUERTO RIVAS ITAAS','Another 1','RED'),(25,'ANOTHER 1 ALERT! 2019-03-12 10:12:45 AM. THIS IS TO INFORM YOU THAT BARANGAY PUERTO RIVAS ITAAS IS ON RED!\nPLEASE VISIT(PUBLIC WEBSITE) FOR MORE INFO.','2019-03-12 10:12:45',5,15,14,'PUERTO RIVAS ITAAS','Another 1','RED'),(26,'ANOTHER 1 ALERT! 2019-03-17 05:41:34 PM. THIS IS TO INFORM YOU THAT BARANGAY PUERTO RIVAS ITAAS IS ON RED!\nPLEASE VISIT(PUBLIC WEBSITE) FOR MORE INFO.','2019-03-17 17:41:34',5,15,14,'PUERTO RIVAS ITAAS','Another 1','RED');

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
) ENGINE=InnoDB AUTO_INCREMENT=11 DEFAULT CHARSET=latin1;

/*Data for the table `tips` */

insert  into `tips`(`id`,`title`,`subtitle`,`img_src`,`body`,`created_at`,`created_by`,`isDeleted`) values (4,'Chikugunya','Virus','img/tips/chikugunya.jpg','Chikungunya virus is spread to people by the bite of an infected mosquito. The most common symptoms of infection are fever and joint pain. Other symptoms may include headache, muscle pain, joint swelling, or rash. Outbreaks have occurred in countries in Africa, Asia, Europe, and the Indian and Pacific Oceans. In late 2013, chikungunya virus was found for the first time in the Americas on islands in the Caribbean. There is a risk that the virus will be imported to new areas by infected travelers. There is no vaccine to prevent or medicine to treat chikungunya virus infection. Travelers can protect themselves by preventing mosquito bites. When traveling to countries with chikungunya virus, use insect repellent, wear long sleeves and pants, and stay in places with air conditioning or that use window and door screens.','2019-02-13 11:08:18',15,0),(5,'Dengue','Virus','img/tips/dengue.jpg','Dengue is an infection caused by a virus. You can get it if an infected mosquito bites you. Dengue does not spread from person to person. It is common in warm, wet areas of the world. Outbreaks occur in the rainy season. Dengue is rare in the United States.\r\n\r\nSymptoms include a high fever, headaches, joint and muscle pain, vomiting, and a rash. In some cases, dengue turns into dengue hemorrhagic fever, which causes bleeding from your nose, gums, or under your skin. It can also become dengue shock syndrome, which causes massive bleeding and shock. These forms of dengue are life-threatening.\r\n\r\nThere is no specific treatment. Most people with dengue recover within 2 weeks. Until then, drinking lots of fluids, resting and taking non-aspirin fever-reducing medicines might help. People with the more severe forms of dengue usually need to go to the hospital and get fluids.\r\n\r\nTo lower your risk when traveling to areas where dengue is found\r\n\r\nWear insect repellent with DEET\r\nWear clothes that cover your arms, legs and feet\r\nClose unscreened doors and windows','2019-02-13 11:22:10',15,0),(6,'Dengue 2','Virus','img/tips/dengue-2.jpg','Dengue is a mosquito-borne viral disease that has rapidly spread in all regions of WHO in recent years. Dengue virus is transmitted by female mosquitoes mainly of the species Aedes aegypti and, to a lesser extent, Ae. albopictus. This mosquito also transmits chikungunya, yellow fever and Zika infection. Dengue is widespread throughout the tropics, with local variations in risk influenced by rainfall, temperature and unplanned rapid urbanization.\r\n\r\nSevere dengue (also known as Dengue Haemorrhagic Fever) was first recognized in the 1950s during dengue epidemics in the Philippines and Thailand. Today, severe dengue affects most Asian and Latin American countries and has become a leading cause of hospitalization and death among children and adults in these regions.\r\n\r\nThere are 4 distinct, but closely related, serotypes of the virus that cause dengue (DEN-1, DEN-2, DEN-3 and DEN-4). Recovery from infection by one provides lifelong immunity against that particular serotype. However, cross-immunity to the other serotypes after recovery is only partial and temporary. Subsequent infections by other serotypes increase the risk of ','2019-02-13 11:25:36',15,0),(7,'Dengue 3','Virus','img/tips/dengue-3.jpg','Dengue is a mosquito-borne viral disease that has rapidly spread in all regions of WHO in recent years. Dengue virus is transmitted by female mosquitoes mainly of the species Aedes aegypti and, to a lesser extent, Ae. albopictus. This mosquito also transmits chikungunya, yellow fever and Zika infection. Dengue is widespread throughout the tropics, with local variations in risk influenced by rainfall, temperature and unplanned rapid urbanization.\r\n\r\nSevere dengue (also known as Dengue Haemorrhagic Fever) was first recognized in the 1950s during dengue epidemics in the Philippines and Thailand. Today, severe dengue affects most Asian and Latin American countries and has become a leading cause of hospitalization and death among children and adults in these regions.\r\n\r\nThere are 4 distinct, but closely related, serotypes of the virus that cause dengue (DEN-1, DEN-2, DEN-3 and DEN-4). Recovery from infection by one provides lifelong immunity against that particular serotype. However, cross-immunity to the other serotypes after recovery is only partial and temporary. Subsequent infections by other serotypes increase the risk of ','2019-02-13 11:25:47',15,0),(8,'test','test','img/tips/test.jpg','sadfsafasdfasdfa','2019-02-20 15:26:25',14,0),(9,'asfasdf','sdfsadfasf','img/tips/asfasdf.jpg','asdasdadasdasdasdasdsadasdasdasdasdasdadasdasdasdasdsadasdasdasdasdasdadasdasdasdasdsadasdasdasdasdasdadasdasdasdasdsadasdasdasdasdasdadasdasdasdasdsadasdasdasdasdasdadasdasdasdasdsadasdasdasdasdasdadasdasdasdasdsadasdasdasdasdasdadasdasdasdasdsadasdasdasd','2019-02-20 15:26:38',14,0),(10,'asdsad','zczxc','img/tips/asdsad.jpg','adasdsadasda','2019-02-20 15:26:45',14,0);

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
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=26 DEFAULT CHARSET=latin1;

/*Data for the table `users` */

insert  into `users`(`id`,`username`,`firstname`,`isAdmin`,`lastname`,`password`,`date_created`,`date_updated`,`isDeleted`,`isLoggedIn`) values (15,'chantal.gomez','Chantal',1,'Gomez','$2y$10$vSkHOHYs9G95BAI6gD65q.o5Sfhfqbwtdju7ACM2P80XkyXQeQeBm','2019-01-24 10:09:19','2019-01-24 10:09:19',0,0),(16,'johndoe','John',0,'Doe','$2y$10$mOyT0l2E7vpAdADEs2XBye8S63fd5cayQjjYinQ/l.2bbmtcBNbKG','2019-02-14 09:20:03','2019-02-14 09:20:03',0,0),(22,'admin','Administrator',1,'Account','$2y$10$e7IOgjI1zA2SkntoohMzS.PHT3pThqbm2QUprb0h6cKV364Cv7aMu','2019-02-21 10:35:48','2019-02-21 10:35:48',0,1),(23,'tesklsdak','Chris',0,'Pratt','$2y$10$laBVtxgTBYtS3Z4Ql/SxyOdRIJxvan4mT2LDzzmXLs0jvbgf6kYNm','2019-02-28 10:34:14','2019-02-28 10:34:14',0,0),(24,'rhu','RHU',0,'One','$2y$10$tHGX3ZBMog8C5gBvDwS/I.7iGtmu9jS4O73ANE3MHD0eyCxVj.Phe','2019-03-06 10:26:35','2019-03-06 10:26:35',0,0),(25,'bee','Ashbee',0,'Morgado','$2y$10$g.ZlV/QYg1vGxnPNkhcuFOHJvUUAc98m4oZhyjugnvrzDHuxA6DEC','2019-03-08 13:15:09','2019-03-08 13:15:09',0,0);

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;
