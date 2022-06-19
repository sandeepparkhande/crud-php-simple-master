create database test;

use test;

CREATE TABLE `users` (
  `id` int(11) NOT NULL auto_increment,
  `name` varchar(100) NOT NULL,
  `age` int(3) NOT NULL,
  `email` varchar(100) NOT NULL,
  PRIMARY KEY  (`id`)
);

CREATE TABLE `Gen_Numbers` (
  `code` varchar(56) NOT NULL,
  `startdate` DATE NOT NULL,
  `enddate` DATE NOT NULL,
  PRIMARY KEY  (`code`)
);

UPDATE Gen_Numbers SET enddate = DATE_ADD(startdate, INTERVAL 1 YEAR) 
