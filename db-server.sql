/*
SQLyog Ultimate v12.09 (64 bit)
MySQL - 5.6.39-cll-lve : Database - outbreak
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

insert  into `barangays`(`id`,`name`,`contact`,`created_at`,`updated_at`,`isDeleted`) values (1,'Poblacion','09772862469','2019-01-22 21:11:43','2019-01-22 21:11:43',0),(2,'Cataning','09772862469','2019-01-22 21:11:43','2019-01-22 21:11:43',0),(3,'Bagumbayan','09772862469','2019-01-22 21:11:43','2019-01-22 21:11:43',0),(4,'Talisay','09772862469','2019-01-22 21:11:43','2019-01-22 21:11:43',0),(5,'Malabia','09772862469','2019-01-22 21:11:43','2019-01-22 21:11:43',0),(6,'San Jose\r\n','09772862469','2019-01-22 21:11:43','2019-01-22 21:11:43',0),(7,'Ibayo','09772862469','2019-01-22 21:11:43','2019-01-22 21:11:43',0),(8,'Dona Francisca','09772862469','2019-01-22 21:11:43','2019-01-22 21:11:43',0),(9,'Cupang Proper','09772862469','2019-01-22 21:11:43','2019-01-22 21:11:43',0),(10,'Cupang North','09772862469','2019-01-22 21:11:43','2019-01-22 21:11:43',0),(11,'Cupang West','09772862469','2019-01-22 21:11:43','2019-01-22 21:11:43',0),(12,'Sibacan','09772862469','2019-01-22 21:11:43','2019-01-22 21:11:43',0),(13,'Tuyo','09772862469','2019-01-22 21:11:43','2019-01-22 21:11:43',0),(14,'Puerto Rivas Ibaba','09772862469','2019-01-22 21:11:43','2019-01-22 21:11:43',0),(15,'Puerto Rivas Itaas','09772862469','2019-01-22 21:11:43','2019-01-22 21:11:43',0),(16,'Tortugas','09772862469','2019-01-22 21:11:43','2019-01-22 21:11:43',0),(17,'Cupang Central','09772862469','2019-01-22 21:11:43','2019-01-22 21:11:43',0),(18,'Tenejero','09772862469','2019-01-22 21:11:43','2019-01-22 21:11:43',0),(19,'Camacho','09772862469','2019-01-22 21:11:43','2019-01-22 21:11:43',0),(20,'Bagong Silang','09772862469','2019-01-22 21:11:43','2019-01-22 21:11:43',0),(21,'Puerto Rivas Lote','09772862469','2019-01-22 21:11:43','2019-01-22 21:11:43',0),(22,'Dangcol','09772862469','2019-01-22 21:11:43','2019-01-22 21:11:43',0),(23,'Cabog-Cabog','09772862469','2019-01-22 21:11:43','2019-01-22 21:11:43',0),(24,'Tanato','09772862469','2019-01-22 21:11:43','2019-01-22 21:11:43',0),(25,'Munting Batangas','09772862469','2019-01-22 21:11:43','2019-01-22 21:11:43',0);

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
) ENGINE=InnoDB AUTO_INCREMENT=10 DEFAULT CHARSET=latin1;

/*Data for the table `diseases` */

insert  into `diseases`(`id`,`name`,`description`,`message`,`date_created`,`date_updated`,`isDeleted`,`isDeceased`) values (1,'Malaria','Malaria is a type of disease that bsaldkfjasdlkfjasdkfjsdlfaj','HERE ARE SOME TIPS TO PREVENT DENGUE:\r\n1.USE/WEAR INSECT REPELLENTS\r\n2.DRAIN AND DUMP STANDING WATERS FOUND IN CONTAINERS INSIDE AND AROUND THE HOUSE\r\n3.INSTALL OR FIX SCREENS ON WINDOWS AND DOORS\r\n4.SPRAY ADULTICIDE AROUND BARANGAY\r\nFOR MORE HEALTH TIPS, VISIT(PUBLIC WEBSITE).\r\nPLEASE BE AWARE AND KEEPSAFE!','2019-01-18 14:51:17','2019-01-18 14:51:17',1,0),(2,'Dengue','Dengue fever is a disease caused by a family of viruses that are transmitted by Aedes mosquitoes. Symptoms of dengue fever include severe joint and muscle pain, swollen lymph nodes, headache, fever, exhaustion, and rash. The presence of fever, rash, and headache (the \"dengue triad\") is characteristic of dengue fever.','HERE ARE SOME TIPS TO PREVENT DENGUE:\n<br>\n1.USE/WEAR INSECT REPELLENTS <br>\n2.DRAIN AND DUMP STANDING WATERS FOUND IN CONTAINERS INSIDE AND AROUND THE HOUSE <br>\n3.INSTALL OR FIX SCREENS ON WINDOWS AND DOORS <br>\n4.SPRAY ADULTICIDE AROUND BARANGAY <br>\nPLEASE BE AWARE AND KEEPSAFE!','2019-01-18 14:51:29','2019-01-18 14:51:29',0,0),(3,'Malaria','An infectious disease caused by protozoan parasites from the Plasmodium family that can be transmitted by the bite of the Anopheles mosquito or by a contaminated needle or transfusion.','HERE ARE SOME TIPS TO PREVENT MALARIA:\n1.USE/WEAR INSECT REPELLENTS\n2.DRAIN AND DUMP STANDING WATERS FOUND IN CONTAINERS INSIDE AND AROUND THE HOUSE\n3.INSTALL OR FIX SCREENS ON WINDOWS AND DOORS\n4.SPRAY ADULTICIDE AROUND BARANGAY\nFOR MORE HEALTH TIPS, VISIT(PUBLIC WEBSITE).\nPLEASE BE AWARE AND KEEPSAFE!','2019-01-18 20:46:03','2019-01-18 20:46:03',0,0),(4,'Chikungunya','Chikungunya is a viral disease transmitted to humans by infected mosquitoes. It causes fever and severe joint pain. Other symptoms include muscle pain, headache, nausea, fatigue and rash.','HERE ARE SOME TIPS TO PREVENT CHIKUNGUNYA\n1.USE/WEAR INSECT REPELLENTS\n2.DRAIN AND DUMP STANDING WATERS FOUND IN CONTAINERS INSIDE AND AROUND THE HOUSE\n3.INSTALL OR FIX SCREENS ON WINDOWS AND DOORS\n4.SPRAY ADULTICIDE AROUND BARANGAY\nFOR MORE HEALTH TIPS, VISIT(PUBLIC WEBSITE).\nPLEASE BE AWARE AND KEEPSAFE!','2019-01-19 13:59:06','2019-01-19 13:59:06',1,0),(5,'Another 1','You gave it all for me\r\nMy soul desire my everything\r\nAll I am is devoted to You\r\nHow could I fail to see\r\nYou are the love that rescued me\r\nAll I am is devoted to You\r\nAnd oh, how could I not be moved\r\nLord here with You\r\nSo have Your way in me\r\n\'Cause Lord there is just one thing\r\nAnd that I will seek\r\nThis is my cry my one desire\r\nJust to be where You are Lord\r\nNow and forever it\'s more than a song\r\nMy one desire is to be with You\r\nIs to be with You Jesus\r\nHow could I fail to see\r\nYou are the love that rescued me\r\nAll I am is devoted to You\r\nAnd oh, how could I not be moved\r\nLord here with You\r\nSo have Your way in me\r\n\'Cause Lord there is just one thing\r\nAnd that I will seek\r\nThis is my cry my one desire\r\nJust to be where You are Lord\r\nNow and forever it\'s more than a song\r\nMy one desire is to be with You\r\nIs to be with You\r\nThis is my cry my one desire\r\nJust to be where You are Lord\r\nNow and forever it\'s more than a song\r\nMy one desire is to be with You\r\nIs to be with You Jesus\r\nThe one thing, the one thing\r\nThat I ask is to be with You\r\nThe one thing, the one thing\r\nThat I ask is to be with You\r\nThe one thing, the one thing\r\nThat I ask is to be with You\r\n(The one thing)\r\nThe one thing, the one thing\r\nThat I ask is to be with You\r\nIs to be with You\r\nThis is my cry my one desire\r\nJust to be where You are Lord\r\nNow and forever it\'s more than a song\r\nIt\'s my one desire is to be with You\r\nIs to be with You\r\nThis is my cry my one desire\r\nJust to be where You are Lord\r\nNow and forever it\'s more than a song\r\nMy one desire is to be with You\r\nIs to be with You Jesus, Jesus','HERE ARE SOME TIPS TO PREVENT DENGUE:\r\n1.USE/WEAR INSECT REPELLENTS\r\n2.DRAIN AND DUMP STANDING WATERS FOUND IN CONTAINERS INSIDE AND AROUND THE HOUSE\r\n3.INSTALL OR FIX SCREENS ON WINDOWS AND DOORS\r\n4.SPRAY ADULTICIDE AROUND BARANGAY\r\nFOR MORE HEALTH TIPS, VISIT(PUBLIC WEBSITE).\r\nPLEASE BE AWARE AND KEEPSAFE!','2019-01-19 14:00:03','2019-01-19 14:00:03',1,0),(6,'Yellow Fever','Yellow fever is an acute viral haemorrhagic disease transmitted by infected mosquitoes. The \"yellow\" in the name refers to the jaundice that affects some patients.','HERE ARE SOME TIPS TO PREVENT YELLOW FEVER:\n1.USE/WEAR INSECT REPELLENTS\n2.DRAIN AND DUMP STANDING WATERS FOUND IN CONTAINERS INSIDE AND AROUND THE HOUSE\n3.INSTALL OR FIX SCREENS ON WINDOWS AND DOORS\n4.SPRAY ADULTICIDE AROUND BARANGAY\nFOR MORE HEALTH TIPS, VISIT(PUBLIC WEBSITE).\nPLEASE BE AWARE AND KEEPSAFE!','2019-02-28 11:28:13','2019-02-28 11:28:13',0,0),(7,'Zika Fever','Zika virus is a mosquito-borne flavivirus that was first identified in Uganda in 1947 in monkeys. It was later identified in humans in 1952 in Uganda and the United Republic of Tanzania.','HERE ARE SOME TIPS TO PREVENT ZIKA FEVER:\n1.USE/WEAR INSECT REPELLENTS\n2.DRAIN AND DUMP STANDING WATERS FOUND IN CONTAINERS INSIDE AND AROUND THE HOUSE\n3.INSTALL OR FIX SCREENS ON WINDOWS AND DOORS\n4.SPRAY ADULTICIDE AROUND BARANGAY\nFOR MORE HEALTH TIPS, VISIT(PUBLIC WEBSITE).\nPLEASE BE AWARE AND KEEPSAFE!','2019-03-01 10:11:31','2019-03-01 10:11:31',0,0),(8,'Japanese Encephalitis','Japan japan','mag ingat','2019-03-24 23:52:16','2019-03-24 23:52:16',1,0),(9,'Chikobuni','chikobuni is too much to ask.','Chikobuni outbreak','2019-03-25 03:07:35','2019-03-25 03:07:35',0,0);

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
) ENGINE=InnoDB AUTO_INCREMENT=8 DEFAULT CHARSET=latin1;

/*Data for the table `hospitals` */

insert  into `hospitals`(`id`,`name`,`address`,`created_at`,`updated_at`,`added_by`,`isDeleted`,`date_of_released`) values (1,'BATAAN GENERAL HOSPITAL AND MEDICAL CENTER ','Manahan St, Tenejero Balanga City, 2100 Bataan','2019-02-12 09:26:12','2019-02-12 09:26:12',NULL,0,NULL),(2,'CENTRO MEDICO DE SANTISIMO ROSARIO','Roman Superhighway, City of Balanga Bataan','2019-02-12 09:35:33','2019-02-12 09:35:33',NULL,0,NULL),(3,'ISAAC & CATALINA MEDICAL CENTER','158 Calero Street, City of Balanga, Bataan','2019-02-12 09:35:40','2019-02-12 09:35:40',NULL,0,NULL),(6,'WOMEN\'S HOSPITAL','Palmera St., San Jose, City of Balanga Bataan','2019-02-12 09:35:58','2019-02-12 09:35:58',NULL,1,NULL),(7,'BATAAN DOCTORS HOSPITAL AND MEDICAL CENTER','DoÃ±a Francisca, City of Balanga Bataan','2019-03-24 20:50:52','2019-03-24 20:50:52',NULL,0,NULL);

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
) ENGINE=InnoDB AUTO_INCREMENT=118 DEFAULT CHARSET=latin1;

/*Data for the table `records` */

insert  into `records`(`id`,`case_id`,`firstname`,`middlename`,`lastname`,`gender`,`birthday`,`barangay_id`,`date_of_sickness`,`date_of_release`,`hospital_id`,`created_at`,`updated_at`,`created_by`,`disease_id`,`isDeleted`,`status`) values (56,'Y2019-C100001','Kevin','Teodoro','Aquino','Male','1993-03-31',20,'2019-01-20',NULL,7,'2019-03-24 21:58:31','2019-03-24 21:58:31',27,2,0,'pending'),(57,'Y2019-C100002','Apple Pearl','Balor','Rayray','Female','1999-05-08',13,'2019-02-23',NULL,2,'2019-03-24 21:59:41','2019-03-24 21:59:41',27,3,0,'pending'),(58,'Y2019-C100003','Chantal Klewiz','X','Gomez','Female','1998-09-20',8,'2019-03-01',NULL,3,'2019-03-24 22:15:59','2019-03-24 22:15:59',27,4,0,'pending'),(59,'Y2019-C100004','Josua','X','Hermedia','Male','1998-02-21',2,'2019-01-25',NULL,1,'2019-03-24 22:18:24','2019-03-24 22:18:24',27,4,0,'pending'),(60,'Y2019-C100005','John','Middle','Doe','Male','1993-10-16',17,'2019-02-14',NULL,7,'2019-03-24 22:19:38','2019-03-24 22:19:38',27,4,0,'pending'),(61,'Y2019-C100006','Dwayne','Name','Wade','Male','1995-08-26',22,'2019-02-22',NULL,1,'2019-03-24 22:24:16','2019-03-24 22:24:16',27,6,0,'pending'),(62,'Y2019-C100007','Lebron','King','James','Male','1999-06-28',23,'2019-01-30',NULL,2,'2019-03-24 22:25:26','2019-03-24 22:25:26',27,2,0,'pending'),(63,'Y2019-C100008','Alice','Dy','Cruz','Female','1990-08-28',9,'2019-01-31',NULL,2,'2019-03-24 22:29:33','2019-03-24 22:29:33',27,2,0,'pending'),(64,'Y2019-C100009','Ben','Ty','Lador','Male','2000-03-23',22,'2019-01-22',NULL,7,'2019-03-24 22:31:15','2019-03-24 22:42:57',27,2,0,'pending'),(65,'Y2019-C100010','Kolin','Sy','Wang','Female','1999-10-11',10,'2019-02-16',NULL,2,'2019-03-24 22:33:47','2019-03-24 22:33:47',27,2,0,'pending'),(66,'Y2019-C100011','Jane','Wig','Doe','Female','1993-08-15',10,'2019-01-01',NULL,2,'2019-03-24 22:37:32','2019-03-24 22:37:32',27,7,0,'pending'),(67,'Y2019-C100012','Grace','Dela Cruz','Leoterio','Female','1985-03-04',10,'2019-02-28',NULL,2,'2019-03-24 22:38:03','2019-03-24 22:38:03',27,7,0,'pending'),(68,'Y2019-C100013','Gilberth','Militar','Dela Cruz','Male','1984-07-26',17,'2019-02-13',NULL,3,'2019-03-24 22:39:01','2019-03-24 22:39:01',27,7,0,'pending'),(69,'Y2019-C100014','Juan','Nacional','Dela Cruz','Male','1981-01-01',5,'2019-02-02',NULL,2,'2019-03-24 22:39:46','2019-03-24 22:39:46',27,6,0,'pending'),(70,'Y2019-C100015','Sarah','Wick','Potato','Female','1990-10-22',9,'2019-03-15',NULL,2,'2019-03-24 22:44:33','2019-03-24 22:44:33',27,2,0,'pending'),(71,'Y2019-C100016','Pearl','Rayray','Balor','Female','1995-12-25',10,'2019-02-12',NULL,3,'2019-03-24 22:45:24','2019-03-24 22:45:24',27,2,0,'pending'),(72,'Y2019-C100017','Josie','Lyn','Garcia','Female','1995-03-13',10,'2019-03-16',NULL,2,'2019-03-24 22:46:35','2019-03-24 22:46:35',27,2,0,'pending'),(73,'Y2019-C100018','Anna','Joy','Besin','Female','2002-06-27',20,'2019-03-24',NULL,7,'2019-03-24 22:48:39','2019-03-24 22:48:39',27,2,0,'pending'),(74,'Y2019-C100019','Icy','Mon','Dragon','Female','1998-03-26',20,'2019-03-21',NULL,1,'2019-03-24 22:49:41','2019-03-24 22:49:41',27,2,0,'pending'),(75,'Y2019-C100020','hannah','kin','der','Female','2010-05-31',20,'2019-03-24',NULL,2,'2019-03-24 22:50:20','2019-03-24 22:50:20',27,2,0,'pending'),(101,'Y2019-C100021','Johny','Ewan','Depp','Male','1990-02-27',20,'2019-03-25',NULL,1,'2019-03-24 23:30:41','2019-03-24 23:30:41',28,2,0,'pending'),(102,'Y2019-C100022','Jose','Mari','Saitama','Male','1985-02-27',20,'2019-03-19',NULL,2,'2019-03-24 23:35:24','2019-03-24 23:35:24',28,2,0,'pending'),(103,'Y2019-C100023','Billy','Luzame','De Mesa','Male','1991-05-22',7,'2019-01-06',NULL,2,'2019-03-24 23:37:36','2019-03-24 23:37:36',26,4,0,'pending'),(104,'Y2019-C100024','Jon Ray','Dong','Punzalan','Male','1999-05-16',7,'2019-01-31',NULL,6,'2019-03-24 23:38:27','2019-03-24 23:45:33',26,4,1,'pending'),(105,'Y2019-C100025','Eman','Dela Cruz','Manlapay','Male','2019-03-11',20,'2019-03-18',NULL,1,'2019-03-24 23:39:14','2019-03-24 23:39:14',28,2,0,'pending'),(106,'Y2019-C100026','Honey','Mo','Kho','Female','1999-07-26',7,'2019-02-22',NULL,7,'2019-03-24 23:39:58','2019-03-24 23:39:58',26,4,0,'pending'),(107,'Y2019-C100027','Les','Ter','Esconde','Male','1993-06-30',7,'2019-03-20',NULL,7,'2019-03-24 23:45:49','2019-03-24 23:45:49',27,4,0,'pending'),(108,'Y2019-C100028','Les','Ter','Esconde','Male','1993-06-25',7,'2019-03-20',NULL,7,'2019-03-24 23:45:59','2019-03-24 23:45:59',27,4,0,'pending'),(109,'Y2019-C100029','Sissy','Nia','Dao','Female','1996-02-15',7,'2019-03-16',NULL,7,'2019-03-24 23:46:33','2019-03-24 23:46:33',27,4,0,'pending'),(110,'Y2019-C100030','Tin','Dy','Mho','Female','1999-08-14',7,'2019-03-19',NULL,6,'2019-03-24 23:47:22','2019-03-24 23:47:22',27,4,0,'pending'),(111,'Y2019-C100031','John','John','John','Male','1997-02-03',2,'2019-03-24',NULL,7,'2019-03-25 01:25:39','2019-03-25 01:25:39',27,3,0,'pending'),(112,'Y2019-C100032','Kevin','Kevin','Kevin','Male','1999-02-22',2,'2019-03-22',NULL,3,'2019-03-25 01:26:07','2019-03-25 01:26:07',27,3,0,'pending'),(113,'Y2019-C100033','Jen','Jen','Jen','Female','1996-03-15',2,'2019-03-21',NULL,1,'2019-03-25 01:26:34','2019-03-25 01:26:34',27,3,0,'pending'),(114,'Y2019-C100034','','123','123','Male','2019-12-31',20,'2019-12-31',NULL,7,'2019-03-25 02:23:48','2019-03-25 02:23:48',27,4,0,'pending'),(115,'Y2019-C100035','123','123','123','Male','1990-12-03',20,'2019-03-25',NULL,7,'2019-03-25 02:26:48','2019-03-25 02:26:48',27,4,0,'pending'),(116,'Y2019-C100036','Kevin','Ulit ','Ulit','Male','1990-12-31',20,'2019-04-30',NULL,7,'2019-04-05 07:10:23','2019-04-05 07:10:23',27,9,0,'pending'),(117,'Y2019-C100037','K','K','K','Male','1996-02-01',20,'2019-01-02',NULL,7,'2019-04-05 07:11:03','2019-04-05 07:11:03',27,9,0,'pending');

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
) ENGINE=InnoDB AUTO_INCREMENT=41 DEFAULT CHARSET=latin1;

/*Data for the table `sms` */

insert  into `sms`(`id`,`message`,`created_at`,`disease_id`,`barangay_id`,`count`,`barangay_name`,`disease_name`,`color`) values (29,'DENGUE ALERT! 2019-03-25 02:23:52 PMTHIS IS TO INFORM YOU THAT BARANGAY BAGONG SILANG IS ON RED!\nPLEASE VISIT(PUBLIC WEBSITE) FOR MORE INFO.','2019-03-24 23:23:52',2,20,5,'BAGONG SILANG','Dengue','RED'),(34,'DENGUE ALERT! 2019-03-25 02:39:14 PMTHIS IS TO INFORM YOU THAT BARANGAY BAGONG SILANG IS ON RED!\nPLEASE VISIT(http://outbreakbalanga.online) FOR MORE INFO.','2019-03-24 23:39:14',2,20,7,'BAGONG SILANG','Dengue','RED'),(35,'CHIKUNGUNYA ALERT! 2019-03-25 02:39:58 PMTHIS IS TO INFORM YOU THAT BARANGAY IBAYO IS ON ORANGE!\nPLEASE VISIT(http://outbreakbalanga.online) FOR MORE INFO.','2019-03-24 23:39:58',4,7,3,'IBAYO','Chikungunya','ORANGE'),(36,'CHIKUNGUNYA ALERT! 2019-03-25 02:45:49 PMTHIS IS TO INFORM YOU THAT BARANGAY IBAYO IS ON ORANGE!\nPLEASE VISIT(http://outbreakbalanga.online) FOR MORE INFO.','2019-03-24 23:45:49',4,7,4,'IBAYO','Chikungunya','ORANGE'),(37,'CHIKUNGUNYA ALERT! 2019-03-25 02:45:59 PMTHIS IS TO INFORM YOU THAT BARANGAY IBAYO IS ON RED!\nPLEASE VISIT(http://outbreakbalanga.online) FOR MORE INFO.','2019-03-24 23:45:59',4,7,5,'IBAYO','Chikungunya','RED'),(38,'CHIKUNGUNYA ALERT! 2019-03-25 02:46:33 PMTHIS IS TO INFORM YOU THAT BARANGAY IBAYO IS ON RED!\nPLEASE VISIT(http://outbreakbalanga.online) FOR MORE INFO.','2019-03-24 23:46:33',4,7,6,'IBAYO','Chikungunya','RED'),(39,'CHIKUNGUNYA ALERT! 2019-03-25 02:47:22 PMTHIS IS TO INFORM YOU THAT BARANGAY IBAYO IS ON RED!\nPLEASE VISIT(http://outbreakbalanga.online) FOR MORE INFO.','2019-03-24 23:47:22',4,7,7,'IBAYO','Chikungunya','RED'),(40,'MALARIA ALERT! 2019-03-25 04:26:34 PMTHIS IS TO INFORM YOU THAT BARANGAY CATANING IS ON ORANGE WARNING!\nPLEASE VISIT(http://outbreakbalanga.online) FOR MORE INFO.','2019-03-25 01:26:35',3,2,3,'CATANING','Malaria','ORANGE');

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
) ENGINE=InnoDB AUTO_INCREMENT=16 DEFAULT CHARSET=latin1;

/*Data for the table `tips` */

insert  into `tips`(`id`,`title`,`subtitle`,`img_src`,`body`,`created_at`,`created_by`,`isDeleted`) values (11,'Dengue Tips','Health Tips','img/tips/dengue-tips.jpg','Dengue fever is a disease caused by a family of viruses that are transmitted by Aedes mosquitoes. Symptoms of dengue fever include severe joint and muscle pain, swollen lymph nodes, headache, fever, exhaustion, and rash. The presence of fever, rash, and headache (the \"dengue triad\") is characteristic of dengue fever.','2019-03-24 20:53:43',22,0),(12,'Chikungunya','Health Tips','img/tips/chikungunya.jpg',' Chikungunya is a viral disease transmitted to humans by infected mosquitoes. It causes fever and severe joint pain. Other symptoms include muscle pain, headache, nausea, fatigue and rash.','2019-03-24 20:54:17',22,0),(13,'Malaria','Health Tips','img/tips/malaria.jpg','An infectious disease caused by protozoan parasites from the Plasmodium family that can be transmitted by the bite of the Anopheles mosquito or by a contaminated needle or transfusion.','2019-03-24 20:54:58',22,0),(14,'Zika Fever','Health Tips','img/tips/zika-fever.jpg','Zika virus is a mosquito-borne flavivirus that was first identified in Uganda in 1947 in monkeys. It was later identified in humans in 1952 in Uganda and the United Republic of Tanzania.','2019-03-24 20:55:34',22,0),(15,'aaaa','health tips','img/tips/aaaa.jpg','aaaaaaaaaa','2019-03-25 02:45:42',27,0);

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
  `forceLogout` tinyint(1) DEFAULT '0',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=31 DEFAULT CHARSET=latin1;

/*Data for the table `users` */

insert  into `users`(`id`,`username`,`firstname`,`isAdmin`,`lastname`,`password`,`date_created`,`date_updated`,`isDeleted`,`isLoggedIn`,`forceLogout`) values (26,'admin','Administrator',1,'Account','$2y$10$mFvQcn/SQb1KnY0tYAtie.QT1iExZxpwV/hg7lMymb.IW/LpEcAPC','2019-03-24 21:00:04','2019-03-24 21:00:04',0,1,0),(27,'RHU-User','Rural Health Unit -',0,'III','$2y$10$l2SvHGhOgFj/Ula3tHeo0uxXKtEma8CNwenFzp5MPz./iNk1Pnoq6','2019-03-24 21:07:41','2019-03-24 21:07:41',0,1,0),(28,'Rural Health','Rural',0,'Cupang','$2y$10$B1gWc8c.oDQbJQo.N3vaBumd2/24mBzFlU4/P4/m3UNJwWg/svR6.','2019-03-24 22:56:32','2019-03-24 22:56:32',1,1,1),(29,'user-rhu','user ',0,'rhu','$2y$10$rzeBaA7wt/bCrIMia49C3eWfNrNwSdw0qKdAUkZj2ISu8NhTkbdwa','2019-03-24 23:50:39','2019-03-24 23:50:39',1,0,1),(30,'rusty','rusty',0,'pogi','$2y$10$HnpNlmLGdwGiYwZTmnV1sOp.d0JBE0Sj8vXHTeNxvK9DYZGI90yga','2019-03-25 03:01:50','2019-03-25 03:01:50',0,1,0);

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;
