/*
SQLyog Enterprise - MySQL GUI v6.15
MySQL - 5.5.5-10.1.38-MariaDB : Database - myz
*********************************************************************
*/

/*!40101 SET NAMES utf8 */;

/*!40101 SET SQL_MODE=''*/;

create database if not exists `myz`;

USE `myz`;

/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;

/*Table structure for table `admins` */

DROP TABLE IF EXISTS `admins`;

CREATE TABLE `admins` (
  `adminName` varchar(20) COLLATE utf8_unicode_ci NOT NULL,
  `username` varchar(40) COLLATE utf8_unicode_ci NOT NULL,
  `adminPwd` varchar(20) COLLATE utf8_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

/*Data for the table `admins` */

insert  into `admins`(`adminName`,`username`,`adminPwd`) values ('11','11@qq.com','11'),('22','22@qq.com','22'),('123','123@1.com','123'),('12311','qwe@qq.com','qwe'),('123','123@qq.com','123'),('000','000@qq.com','000'),('33','33@163.com','33');

/*Table structure for table `message` */

DROP TABLE IF EXISTS `message`;

CREATE TABLE `message` (
  `messageId` int(100) NOT NULL AUTO_INCREMENT,
  `content` varchar(200) COLLATE utf8_unicode_ci NOT NULL,
  `admin` varchar(20) COLLATE utf8_unicode_ci NOT NULL,
  `reply` smallint(5) NOT NULL,
  PRIMARY KEY (`messageId`)
) ENGINE=InnoDB AUTO_INCREMENT=126 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

/*Data for the table `message` */

insert  into `message`(`messageId`,`content`,`admin`,`reply`) values (16,'asdasd','11',0),(29,'    ds','11',0),(34,'asda','11',0),(35,'asdwwww','11',0),(46,'212','22',1),(93,'asd.','12311',0),(94,'22163sa2','12311',0),(95,'123','12311',0),(96,'22','12311',0),(97,'学习','123',0),(109,'123','123',0),(110,'456','123',0),(111,'shopping','123',0),(119,'123','000',0),(120,'123','000',0),(121,'123','000',0),(123,'123','11',0),(124,'1212','11',0),(125,'1212','22',1);

/*Table structure for table `pengyou` */

DROP TABLE IF EXISTS `pengyou`;

CREATE TABLE `pengyou` (
  `messageId` int(100) NOT NULL AUTO_INCREMENT,
  `toadmin` varchar(20) COLLATE utf8_unicode_ci NOT NULL,
  `textarea` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `ziji` varchar(20) COLLATE utf8_unicode_ci NOT NULL,
  `reply` smallint(5) NOT NULL,
  PRIMARY KEY (`messageId`)
) ENGINE=InnoDB AUTO_INCREMENT=13 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

/*Data for the table `pengyou` */

insert  into `pengyou`(`messageId`,`toadmin`,`textarea`,`ziji`,`reply`) values (2,'000','123','123',1),(3,'000','11','11',1),(4,'000','123','123',1),(9,'22','i am 33','33',1),(12,'11','','22',1);

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
