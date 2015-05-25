/*
SQLyog Ultimate - MySQL GUI v8.2 
MySQL - 5.6.21 : Database - metromapper
*********************************************************************
*/

/*!40101 SET NAMES utf8 */;

/*!40101 SET SQL_MODE=''*/;

/*!40014 SET @OLD_UNIQUE_CHECKS=@@UNIQUE_CHECKS, UNIQUE_CHECKS=0 */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;
/*!40111 SET @OLD_SQL_NOTES=@@SQL_NOTES, SQL_NOTES=0 */;
/*Table structure for table `answers` */

DROP TABLE IF EXISTS `answers`;

CREATE TABLE `answers` (
  `id` int(10) NOT NULL AUTO_INCREMENT,
  `mapid` varchar(10) CHARACTER SET latin1 DEFAULT NULL,
  `time` decimal(6,2) DEFAULT NULL,
  `selected_stations` text CHARACTER SET latin1,
  `is_correct` tinyint(1) DEFAULT NULL,
  `events` text CHARACTER SET latin1,
  `sessid` varchar(100) CHARACTER SET latin1 DEFAULT NULL,
  `timestamp` datetime DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_german1_ci;

/*Data for the table `answers` */

/*Table structure for table `questions` */

DROP TABLE IF EXISTS `questions`;

CREATE TABLE `questions` (
  `mapid` varchar(20) NOT NULL,
  `count` int(5) DEFAULT NULL,
  PRIMARY KEY (`mapid`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

/*Data for the table `questions` */

insert  into `questions`(`mapid`,`count`) values ('deqzba6m',0),('pyf52d8w',0);

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;
