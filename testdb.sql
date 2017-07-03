CREATE DATABASE `testdb`;
USE `testdb`;

CREATE TABLE IF NOT EXISTS `users` (
`id` int(8) NOT NULL AUTO_INCREMENT,
`name` varchar(30) NOT NULL,
`email` varchar(60) NOT NULL,
`password` varchar(100) NOT NULL,
`dateofbirth` varchar(40) NOT NULL,
`age` varchar(4) NOT NULL,
`form` varchar(10) NOT NULL,
`status` tinyint(4) NOT NULL DEFAULT '0',
PRIMARY KEY (`id`),
UNIQUE KEY `email` (`email`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

DROP TABLE IF EXISTS `confirm`;
CREATE TABLE `confirm` (
`cid` int(10) NOT NULL AUTO_INCREMENT,
`email` varchar(50) NOT NULL,
`confirm_key` varchar(300) NOT NULL,
PRIMARY KEY (`cid`),
UNIQUE KEY `email` (`email`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=latin1;

DROP TABLE IF EXISTS `recovery_keys`;
CREATE TABLE `recovery_keys` (
`rid` int(11) NOT NULL AUTO_INCREMENT,
`userID` int(11) NOT NULL,
`token` varchar(50) NOT NULL,
`timestamp` varchar(50) NOT NULL,
`valid` tinyint(4) NOT NULL DEFAULT '1',
PRIMARY KEY (`rid`)
);

CREATE TABLE IF NOT EXISTS `books` (
`id` int(8) NOT NULL AUTO_INCREMENT,
`title` varchar(100) NOT NULL,
`description` varchar(500) NOT NULL,
`condition` varchar(30) NOT NULL,
`contact` varchar(15) NOT NULL,
`pricing` varchar(20) NOT NULL,
`date` varchar(40) NOT NULL,
`form` varchar(10) NOT NULL,
`usr_id` varchar(10) NOT NULL,
`paid` varchar(10) NOT NULL DEFAULT '0',
`key` varchar(100) NOT NULL,
PRIMARY KEY (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

CREATE TABLE IF NOT EXISTS `checklist` (
`id` int(8) NOT NULL AUTO_INCREMENT,
`chi_s1_1_sc` tinyint(4) NOT NULL DEFAULT '0',
`chi_s1_2_sc` tinyint(4) NOT NULL DEFAULT '0',
`chi_j1_1_sc` tinyint(4) NOT NULL DEFAULT '0',
`chi_j1_2_sc` tinyint(4) NOT NULL DEFAULT '0',
`kupasan_s1_sc` tinyint(4) NOT NULL DEFAULT '0',
`jaket_s1_sc` tinyint(4) NOT NULL DEFAULT '0',
`dinara_s1_sc` tinyint(4) NOT NULL DEFAULT '0',
`think_s1_sc` tinyint(4) NOT NULL DEFAULT '0',
`poems_s1_sc` tinyint(4) NOT NULL DEFAULT '0',
`sejarah_s1_sc` tinyint(4) NOT NULL DEFAULT '0',
`nexus_s1_sc` tinyint(4) NOT NULL DEFAULT '0',
`comp_s1_sc` tinyint(4) NOT NULL DEFAULT '0',
`addmaths_s1_1_sc` tinyint(4) NOT NULL DEFAULT '0',
`addmaths_s1_2_sc` tinyint(4) NOT NULL DEFAULT '0',
`bio_s1_sc` tinyint(4) NOT NULL DEFAULT '0',
`chem_s1_sc` tinyint(4) NOT NULL DEFAULT '0',
`phy_s1_sc` tinyint(4) NOT NULL DEFAULT '0',
`key` varchar(100) NOT NULL,
PRIMARY KEY (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

CREATE TABLE IF NOT EXISTS `watchlist` (
`id` int(8) NOT NULL AUTO_INCREMENT,
`chi_s1_1_sc` tinyint(4) NOT NULL DEFAULT '0',
`chi_s1_2_sc` tinyint(4) NOT NULL DEFAULT '0',
`chi_j1_1_sc` tinyint(4) NOT NULL DEFAULT '0',
`chi_j1_2_sc` tinyint(4) NOT NULL DEFAULT '0',
`kupasan_s1_sc` tinyint(4) NOT NULL DEFAULT '0',
`jaket_s1_sc` tinyint(4) NOT NULL DEFAULT '0',
`dinara_s1_sc` tinyint(4) NOT NULL DEFAULT '0',
`think_s1_sc` tinyint(4) NOT NULL DEFAULT '0',
`poems_s1_sc` tinyint(4) NOT NULL DEFAULT '0',
`sejarah_s1_sc` tinyint(4) NOT NULL DEFAULT '0',
`nexus_s1_sc` tinyint(4) NOT NULL DEFAULT '0',
`comp_s1_sc` tinyint(4) NOT NULL DEFAULT '0',
`addmaths_s1_1_sc` tinyint(4) NOT NULL DEFAULT '0',
`addmaths_s1_2_sc` tinyint(4) NOT NULL DEFAULT '0',
`bio_s1_sc` tinyint(4) NOT NULL DEFAULT '0',
`chem_s1_sc` tinyint(4) NOT NULL DEFAULT '0',
`phy_s1_sc` tinyint(4) NOT NULL DEFAULT '0',
`key` varchar(100) NOT NULL,
PRIMARY KEY (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

DROP TABLE IF EXISTS `watchlist_keys`;
CREATE TABLE `watchlist_keys` (
`id` int(11) NOT NULL AUTO_INCREMENT,
`key` varchar(10000) NOT NULL,
`no` int(20) NOT NULL DEFAULT '0',
`new_no` int(20) NOT NULL DEFAULT '0',
`usr_id` varchar(10) NOT NULL,
PRIMARY KEY (`id`)
);

DROP TABLE IF EXISTS `path_keys`;
CREATE TABLE `path_keys` (
`id` int(11) NOT NULL AUTO_INCREMENT,
`name` varchar(1000) NOT NULL,
`path` varchar(1000) NOT NULL,
`key` varchar(100) NOT NULL,
`usr_id` varchar(10) NOT NULL,
PRIMARY KEY (`id`)
);