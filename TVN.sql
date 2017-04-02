-- Adminer 4.2.5 MySQL dump

SET NAMES utf8;
SET time_zone = '+00:00';
SET foreign_key_checks = 0;
SET sql_mode = 'NO_AUTO_VALUE_ON_ZERO';

DROP TABLE IF EXISTS `TVN_apartments`;
CREATE TABLE `TVN_apartments` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `type_id` int(11) NOT NULL,
  `measurements` varchar(8) NOT NULL,
  `description` varchar(255) NOT NULL,
  `floors` int(8) NOT NULL,
  PRIMARY KEY (`id`),
  KEY `type_id` (`type_id`),
  CONSTRAINT `TVN_apartments_ibfk_2` FOREIGN KEY (`type_id`) REFERENCES `TVN_types` (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;


DROP TABLE IF EXISTS `TVN_beacons`;
CREATE TABLE `TVN_beacons` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `apartment_id` int(11) NOT NULL,
  `description` varchar(255) NOT NULL,
  PRIMARY KEY (`id`),
  KEY `apartment_id` (`apartment_id`),
  CONSTRAINT `TVN_beacons_ibfk_1` FOREIGN KEY (`apartment_id`) REFERENCES `TVN_apartments` (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;


DROP TABLE IF EXISTS `TVN_images`;
CREATE TABLE `TVN_images` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `uri` varchar(64) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;


DROP TABLE IF EXISTS `TVN_images_apartments`;
CREATE TABLE `TVN_images_apartments` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `apartments_id` int(11) NOT NULL,
  `images_id` int(11) NOT NULL,
  PRIMARY KEY (`id`),
  KEY `apartments_id` (`apartments_id`),
  KEY `images_id` (`images_id`),
  CONSTRAINT `TVN_images_apartments_ibfk_1` FOREIGN KEY (`apartments_id`) REFERENCES `TVN_apartments` (`id`),
  CONSTRAINT `TVN_images_apartments_ibfk_2` FOREIGN KEY (`images_id`) REFERENCES `TVN_images` (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;


DROP TABLE IF EXISTS `TVN_tracking`;
CREATE TABLE `TVN_tracking` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `beacon_id` int(11) NOT NULL,
  `start_time` datetime NOT NULL,
  `end_time` datetime NOT NULL,
  `mac_address` varchar(32) NOT NULL,
  PRIMARY KEY (`id`),
  KEY `beacon_id` (`beacon_id`),
  CONSTRAINT `TVN_tracking_ibfk_1` FOREIGN KEY (`beacon_id`) REFERENCES `TVN_beacons` (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;


DROP TABLE IF EXISTS `TVN_types`;
CREATE TABLE `TVN_types` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `type` varchar(32) NOT NULL,
  `description` varchar(255) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

INSERT INTO `TVN_types` (`id`, `type`, `description`) VALUES
(1,	'XS',	'Superkleine onzin');

DROP TABLE IF EXISTS `TVN_users`;
CREATE TABLE `TVN_users` (
  `id` int(11) NOT NULL,
  `username` varchar(32) NOT NULL,
  `password` varchar(32) NOT NULL,
  `salt` varchar(32) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;


-- 2017-04-02 12:26:39
