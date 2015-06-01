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
  `schematization` varchar(100) COLLATE latin1_german1_ci DEFAULT NULL,
  `visualization` varchar(100) COLLATE latin1_german1_ci DEFAULT NULL,
  `arrowhints` tinyint(1) DEFAULT NULL,
  `ipaddress` varchar(100) COLLATE latin1_german1_ci DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_german1_ci;

/*Data for the table `answers` */

/*Table structure for table `final` */

DROP TABLE IF EXISTS `final`;

CREATE TABLE `final` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `sessid` varchar(100) DEFAULT NULL,
  `age` varchar(100) DEFAULT NULL,
  `education` varchar(100) DEFAULT NULL,
  `familiar` varchar(100) DEFAULT NULL,
  `comments` text,
  `timestamp` datetime DEFAULT CURRENT_TIMESTAMP,
  `ipaddress` varchar(100) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

/*Data for the table `final` */

/*Table structure for table `questions` */

DROP TABLE IF EXISTS `questions`;

CREATE TABLE `questions` (
  `mapid` varchar(20) NOT NULL,
  `count` int(5) DEFAULT NULL,
  PRIMARY KEY (`mapid`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

/*Data for the table `questions` */

insert  into `questions`(`mapid`,`count`) values ('0jck3khr',0),('11hsklvz',0),('1h7vet5g',0),('1k99yn2m',0),('1lvg9zvn',0),('1o8icfaf',0),('1uxxvhf3',0),('2e01f7lh',0),('2qh2tk0v',0),('3d8u03o5',0),('3vu4zo5b',0),('3xkev8sz',0),('4dvmb3jm',0),('6aok7zdn',0),('6m3en2c2',0),('7w0z32b0',0),('83thl72m',0),('8sb77aoi',0),('978u6xks',0),('9s8p1d3v',0),('aexco222',0),('akcbbyat',0),('aqx40x0g',0),('auf7rp1y',0),('c19ftfw4',0),('e5ip64aj',0),('e6kxvr2v',0),('ggl08w8j',0),('gpdyoi8r',0),('h7tmpels',0),('h9n5o6cn',0),('hgl2zfsb',0),('hnfgazx8',0),('hxr1ibvh',0),('i8sd9dx0',0),('iob2mirf',0),('iv5zkmbh',0),('ix4wlgoc',0),('j9ta3wdv',0),('jol5gs0o',0),('k86wuc0x',0),('k9chvd3h',0),('kbk7kyz1',0),('kutd83n9',0),('l9xaomzy',0),('lnm596na',0),('ls1boa8a',0),('ly2r2p8x',0),('m6ntbdvi',0),('mgp6fury',0),('mjuwus0v',0),('n19755nh',0),('n3n7i4k9',0),('oqn1n037',0),('or36v7az',0),('p4lbpd38',0),('pbo8hxzy',0),('phtpzwwq',0),('qmcbdf1a',0),('qqrfmp37',0),('r024s8z5',0),('rf01xrm2',0),('riynj4k4',0),('sq1oyjnk',0),('sq4uuh1o',0),('sqlu4iap',0),('svx1cdk8',0),('t854roec',0),('to0r060k',0),('tvwvr6mu',0),('up22wytf',0),('uwlk5btn',0),('wgh6j20x',0),('wzmxuh2v',0),('x4mvk2l7',0),('xqpfd9fq',0),('y94kyznd',0),('zgkgbycs',0);

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;
