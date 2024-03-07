/*
SQLyog Community v13.1.6 (64 bit)
MySQL - 10.1.38-MariaDB : Database - drivingschool
*********************************************************************
*/

/*!40101 SET NAMES utf8 */;

/*!40101 SET SQL_MODE=''*/;

/*!40014 SET @OLD_UNIQUE_CHECKS=@@UNIQUE_CHECKS, UNIQUE_CHECKS=0 */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;
/*!40111 SET @OLD_SQL_NOTES=@@SQL_NOTES, SQL_NOTES=0 */;
CREATE DATABASE /*!32312 IF NOT EXISTS*/`drivingschool` /*!40100 DEFAULT CHARACTER SET latin1 */;

USE `drivingschool`;

/*Table structure for table `cars` */

DROP TABLE IF EXISTS `cars`;

CREATE TABLE `cars` (
  `id` int(45) NOT NULL AUTO_INCREMENT,
  `description` text,
  `brand` varchar(100) DEFAULT NULL,
  `model` varchar(100) DEFAULT NULL,
  `trans_type` varchar(100) DEFAULT NULL,
  `vehicle_type` varchar(100) DEFAULT NULL,
  `gas_type` varchar(100) DEFAULT NULL,
  `datearray` date DEFAULT NULL,
  `timearray` time DEFAULT NULL,
  `status` varchar(100) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

/*Table structure for table `customer` */

DROP TABLE IF EXISTS `customer`;

CREATE TABLE `customer` (
  `id` int(45) NOT NULL AUTO_INCREMENT,
  `customer_no` varchar(100) DEFAULT NULL,
  `lastname` varchar(100) DEFAULT NULL,
  `firstname` varchar(100) DEFAULT NULL,
  `middlename` varchar(100) DEFAULT NULL,
  `gender` varchar(100) DEFAULT NULL,
  `birthdate` date DEFAULT NULL,
  `address` text,
  `email` varchar(100) DEFAULT NULL,
  `contactno` varchar(100) DEFAULT NULL,
  `datearray` date DEFAULT NULL,
  `timearray` time DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

/*Table structure for table `enrollee` */

DROP TABLE IF EXISTS `enrollee`;

CREATE TABLE `enrollee` (
  `id` int(45) NOT NULL AUTO_INCREMENT,
  `regno` varchar(100) DEFAULT NULL,
  `customer_no` varchar(100) DEFAULT NULL,
  `payment_type` varchar(100) DEFAULT NULL,
  `amount` double DEFAULT NULL,
  `status` varchar(100) DEFAULT 'pending',
  `datearray` date DEFAULT NULL,
  `timearray` time DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

/*Table structure for table `payment` */

DROP TABLE IF EXISTS `payment`;

CREATE TABLE `payment` (
  `id` int(45) NOT NULL AUTO_INCREMENT,
  `regno` varchar(100) DEFAULT NULL,
  `amount` double DEFAULT NULL,
  `status` varchar(100) DEFAULT NULL,
  `remarks` varchar(100) DEFAULT NULL,
  `datearray` date DEFAULT NULL,
  `timearray` time DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

/*Table structure for table `schedule` */

DROP TABLE IF EXISTS `schedule`;

CREATE TABLE `schedule` (
  `id` int(45) NOT NULL AUTO_INCREMENT,
  `car_id` varchar(100) DEFAULT NULL,
  `regno` varchar(100) DEFAULT NULL,
  `datearray` date DEFAULT NULL,
  `starttime` time DEFAULT NULL,
  `endtime` time DEFAULT NULL,
  `status` varchar(100) DEFAULT NULL,
  `notify` int(11) DEFAULT '0',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

/*Table structure for table `user` */

DROP TABLE IF EXISTS `user`;

CREATE TABLE `user` (
  `id` int(45) NOT NULL AUTO_INCREMENT,
  `username` varchar(100) DEFAULT NULL,
  `password` varchar(100) DEFAULT NULL,
  `fullname` varchar(100) DEFAULT NULL,
  `datearray` date DEFAULT NULL,
  `timearray` time DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;
