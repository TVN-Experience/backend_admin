-- Adminer 4.2.5 MySQL dump

SET NAMES utf8;
SET time_zone = '+00:00';
SET foreign_key_checks = 0;
SET sql_mode = 'NO_AUTO_VALUE_ON_ZERO';

DROP TABLE IF EXISTS `tvn_apartments`;
CREATE TABLE `tvn_apartments` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `type_id` int(11) NOT NULL,
  `measurements` varchar(255) NOT NULL,
  `description` varchar(2048) NOT NULL,
  `floors` int(8) NOT NULL,
  `price` int(8) NOT NULL,
  PRIMARY KEY (`id`),
  KEY `type_id` (`type_id`),
  CONSTRAINT `tvn_apartments_ibfk_2` FOREIGN KEY (`type_id`) REFERENCES `tvn_types` (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;


DROP TABLE IF EXISTS `tvn_beacons`;
CREATE TABLE `tvn_beacons` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `apartment_id` int(11) NOT NULL,
  `description` varchar(255) NOT NULL,
  PRIMARY KEY (`id`),
  KEY `apartment_id` (`apartment_id`),
  CONSTRAINT `tvn_beacons_ibfk_1` FOREIGN KEY (`apartment_id`) REFERENCES `tvn_apartments` (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;


DROP TABLE IF EXISTS `tvn_images`;
CREATE TABLE `tvn_images` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `uri` varchar(255) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;


DROP TABLE IF EXISTS `tvn_images_apartments`;
CREATE TABLE `tvn_images_apartments` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `apartments_id` int(11) NOT NULL,
  `images_id` int(11) NOT NULL,
  PRIMARY KEY (`id`),
  KEY `apartments_id` (`apartments_id`),
  KEY `images_id` (`images_id`),
  CONSTRAINT `tvn_images_apartments_ibfk_1` FOREIGN KEY (`apartments_id`) REFERENCES `tvn_apartments` (`id`),
  CONSTRAINT `tvn_images_apartments_ibfk_2` FOREIGN KEY (`images_id`) REFERENCES `tvn_images` (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

INSERT INTO `tvn_images_apartments` (`id`, `apartments_id`, `images_id`) VALUES
(2,	3,	1);

DROP TABLE IF EXISTS `tvn_tracking`;
CREATE TABLE `tvn_tracking` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `beacon_id` int(11) NOT NULL,
  `start_time` datetime NOT NULL,
  `end_time` datetime NOT NULL,
  `mac_address` varchar(32) NOT NULL,
  PRIMARY KEY (`id`),
  KEY `beacon_id` (`beacon_id`),
  CONSTRAINT `tvn_tracking_ibfk_1` FOREIGN KEY (`beacon_id`) REFERENCES `tvn_beacons` (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;


DROP TABLE IF EXISTS `tvn_types`;
CREATE TABLE `tvn_types` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `type` varchar(32) NOT NULL,
  `description` varchar(255) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;


DROP TABLE IF EXISTS `tvn_users`;
CREATE TABLE `tvn_users` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `username` varchar(32) NOT NULL,
  `password` varchar(32) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;


-- 2017-04-02 18:48:56
