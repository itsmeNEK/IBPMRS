/*
SQLyog Ultimate v11.11 (32 bit)
MySQL - 5.7.31 : Database - epiz_30959203_pmrs
*********************************************************************
*/


/*!40101 SET NAMES utf8 */;

/*!40101 SET SQL_MODE=''*/;

/*!40014 SET @OLD_UNIQUE_CHECKS=@@UNIQUE_CHECKS, UNIQUE_CHECKS=0 */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;
/*!40111 SET @OLD_SQL_NOTES=@@SQL_NOTES, SQL_NOTES=0 */;
CREATE DATABASE /*!32312 IF NOT EXISTS*/`epiz_30959203_pmrs` /*!40100 DEFAULT CHARACTER SET latin1 */;

USE `epiz_30959203_pmrs`;

/*Table structure for table `commodity_type` */

DROP TABLE IF EXISTS `commodity_type`;

CREATE TABLE `commodity_type` (
  `Id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(255) DEFAULT NULL,
  `category` int(1) DEFAULT NULL,
  `date_added` datetime DEFAULT NULL,
  `status` int(1) DEFAULT NULL,
  PRIMARY KEY (`Id`)
) ENGINE=MyISAM AUTO_INCREMENT=14 DEFAULT CHARSET=latin1;

/*Data for the table `commodity_type` */

insert  into `commodity_type`(`Id`,`name`,`category`,`date_added`,`status`) values (1,'Canned Sardines in Tomato Sauce',1,'2022-01-05 04:52:48',1),(2,'Powdered Milk',1,'2022-01-05 04:55:14',1),(3,'Coffee Refill',1,'2022-01-05 04:55:28',1),(4,'Coffee 3-in-1 Original',1,'2022-01-05 04:55:52',1),(5,'Bread',1,'2022-01-05 04:56:02',1),(6,'Instant Noodles - Chicken & Beef Flavor',1,'2022-01-05 04:56:32',1),(7,'Distilled Water',1,'2022-01-05 04:56:55',1),(8,'Purified Water',1,'2022-01-05 04:57:01',1),(9,'Mineralized Water',1,'2022-01-05 04:57:23',1),(10,'Luncheon Meat',2,'2022-01-05 05:14:13',1),(11,'Meat Loaf',2,'2022-01-05 05:25:23',1),(12,'Corned Beef',2,'2022-01-05 05:25:38',1),(13,'Beef Loaf',2,'2022-01-05 05:26:17',1);

/*Table structure for table `merchants` */

DROP TABLE IF EXISTS `merchants`;

CREATE TABLE `merchants` (
  `Id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(255) DEFAULT NULL,
  `address` varchar(255) DEFAULT NULL,
  `contact_no` varchar(20) DEFAULT NULL,
  `email_add` varchar(50) DEFAULT NULL,
  `date_added` datetime DEFAULT NULL,
  `status` int(1) DEFAULT NULL,
  PRIMARY KEY (`Id`)
) ENGINE=MyISAM AUTO_INCREMENT=4 DEFAULT CHARSET=latin1;

/*Data for the table `merchants` */

insert  into `merchants`(`Id`,`name`,`address`,`contact_no`,`email_add`,`date_added`,`status`) values (1,'Cheersmarts Inc.','Victory Norte Santiago City','305-6355','cheersmart@yahoo.com','2021-05-22 09:40:47',1),(2,'Savemore','Malvar Santiago City','3051234','Savemore2@gmail.com','2021-11-18 10:03:16',1);

/*Table structure for table `products` */

DROP TABLE IF EXISTS `products`;

CREATE TABLE `products` (
  `Id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(255) DEFAULT NULL,
  `commodity_id` int(11) DEFAULT NULL,
  `unit_id` int(11) DEFAULT NULL,
  `quantity` varchar(5) DEFAULT NULL,
  `srp` double(10,2) DEFAULT NULL,
  `date_added` datetime DEFAULT NULL,
  `status` int(1) DEFAULT NULL,
  PRIMARY KEY (`Id`)
) ENGINE=MyISAM AUTO_INCREMENT=12 DEFAULT CHARSET=latin1;

/*Data for the table `products` */

insert  into `products`(`Id`,`name`,`commodity_id`,`unit_id`,`quantity`,`srp`,`date_added`,`status`) values (1,'555 Bonus Pack',1,1,'155',16.00,'2022-01-05 05:29:43',1),(2,'King Cup Regular Lid',1,1,'155',16.50,'2022-01-05 05:30:24',1),(3,'Young\'s Town Bonus',1,1,'155',13.25,'2022-01-06 12:02:52',1),(4,'Bear Brand',2,1,'150',50.00,'2022-01-06 12:07:33',1),(5,'Birch Tree Full Cream Milk',2,1,'150',64.75,'2022-01-06 12:08:13',1),(6,'Pinoy',5,1,'1',20.00,'2022-01-08 07:51:39',1),(7,'mamon',5,1,'1',12.00,'2022-01-08 07:52:51',1),(8,'pancake',5,3,'1',221.00,'2022-01-08 08:41:41',1),(9,'fafa',11,3,'1',25.00,'2022-01-08 08:42:27',1),(10,'lolo',11,1,'1',11.00,'2022-01-08 08:44:40',1),(11,'555',12,1,'1',32.00,'2022-01-08 08:45:48',1);

/*Table structure for table `report` */

DROP TABLE IF EXISTS `report`;

CREATE TABLE `report` (
  `Id` int(11) NOT NULL AUTO_INCREMENT,
  `complaint_code` varchar(50) DEFAULT NULL,
  `user_id` int(11) DEFAULT NULL,
  `complaint_title` text,
  `complainant_info` text,
  `respondent_info` text,
  `own_mgr` varchar(200) DEFAULT NULL,
  `coa_option` int(1) DEFAULT NULL,
  `coa_details` text,
  `other_provision` text,
  `other_fair_trade` text,
  `coa_option2` int(1) DEFAULT NULL,
  `coa_naration` text,
  `relief_details` text,
  `relief_others` text,
  `witness_conf` text,
  `subs_sworn_conf` text,
  `evidence_image_link` text,
  `establishment_location` text,
  `idcard_image_link` text,
  `cedula_image_link` text,
  `signature_link` text,
  `date_reported` datetime DEFAULT NULL,
  `date_solved` datetime DEFAULT NULL,
  `to_endorsed` text,
  `status` int(1) DEFAULT NULL,
  PRIMARY KEY (`Id`)
) ENGINE=MyISAM AUTO_INCREMENT=9 DEFAULT CHARSET=latin1;

/*Data for the table `report` */

insert  into `report`(`Id`,`complaint_code`,`user_id`,`complaint_title`,`complainant_info`,`respondent_info`,`own_mgr`,`coa_option`,`coa_details`,`other_provision`,`other_fair_trade`,`coa_option2`,`coa_naration`,`relief_details`,`relief_others`,`witness_conf`,`subs_sworn_conf`,`evidence_image_link`,`establishment_location`,`idcard_image_link`,`cedula_image_link`,`signature_link`,`date_reported`,`date_solved`,`to_endorsed`,`status`) values (1,'43a2062',9,'Over price hamon de bola','{\"fullname\":\"Juan Tamad\",\"age\":\"25\",\"status\":\"Single\",\"telno\":\"1234567890\",\"email\":\"haha@haha.com\",\"address\":\"Di ko alam\"}','{\"fullname\":\"Sari Sari\",\"age\":\"45\",\"status\":\"Married\",\"telno\":\"0987654321\",\"email\":\"huhu@huhu.com\",\"address\":\"di ko din alam\"}','SM Supermarket',1,'{\"option1\":\"1\",\"option2\":\"1\",\"option3\":\"1\",\"option4\":null,\"option5\":null,\"option6\":null,\"option7\":null,\"option8\":null,\"option9\":null,\"option10\":null,\"option11\":null,\"option12\":null}','','',2,'Basta yun na yun','{\"option1\":\"1\",\"option2\":null,\"option3\":null}','','{\"day\":\"07\",\"month\":\"January\",\"year\":\"2022\",\"location\":\"Santiago City\"}','{\"day\":\"07\",\"month\":\"January\",\"cedula\":\"1234567\",\"date_issued\":\"01\\/03\\/2022\",\"loc_issued\":\"Santiago City\",\"govid_no\":\"3557575335\"}','img-a59e1e5c9e.png','14.6760413,121.0437003','img-39f48095e9.png','img-29bb689c31.png','61d7dced7a4f5.png','2021-12-27 02:26:47','2022-01-08 10:56:55','BFAD and NBI',3),(2,'44a3ba7',9,'Sample Complaint','{\"fullname\":\"Juan Tamad\",\"age\":\"24\",\"status\":\"Single\",\"telno\":\"123456789\",\"email\":\"hehe@hehe.com\",\"address\":\"Sapang bato\"}','{\"fullname\":\"Mushi Mushi\",\"age\":\"35\",\"status\":\"Single\",\"telno\":\"9876543\",\"email\":\"hihi@hihi.com\",\"address\":\"Anone\"}','Savemore',1,'{\"option1\":\"1\",\"option2\":\"1\",\"option3\":\"1\",\"option4\":null,\"option5\":null,\"option6\":null,\"option7\":null,\"option8\":null,\"option9\":null,\"option10\":null,\"option11\":null,\"option12\":null}','','',2,'hahuhahihahiaha','{\"option1\":null,\"option2\":\"1\",\"option3\":null}','','{\"day\":\"08\",\"month\":\"January\",\"year\":\"2022\",\"location\":\"Santiago City\"}','{\"day\":\"08\",\"month\":\"January\",\"cedula\":\"1234567\",\"date_issued\":\"01\\/04\\/2022\",\"loc_issued\":\"Santiago City\",\"govid_no\":\"482378462384\"}','img-8e3395d7e9.jpg','16.6899662,121.5463271','img-d88d5eeac9.png','img-bc3672b5bd.png','61d8fa97810cf.png','2022-01-07 10:45:25','2022-01-08 07:46:39',NULL,3),(3,'bdd7984',10,'Sample 2','{\"fullname\":\"Marites Ramones\",\"age\":\"31\",\"status\":\"Married\",\"telno\":\"123456789\",\"email\":\"aaa@aaa.com\",\"address\":\"Di ko po alam\"}','{\"fullname\":\"Marisol Puro Sulsol\",\"age\":\"36\",\"status\":\"Single\",\"telno\":\"1234567890\",\"email\":\"bbb@bbb.com\",\"address\":\"Di ko din po alam\"}','Robinsons',1,'{\"option1\":null,\"option2\":null,\"option3\":null,\"option4\":null,\"option5\":null,\"option6\":\"1\",\"option7\":null,\"option8\":\"1\",\"option9\":\"1\",\"option10\":null,\"option11\":null,\"option12\":null}','','',2,'Wala lng','{\"option1\":\"1\",\"option2\":null,\"option3\":null}','','{\"day\":\"08\",\"month\":\"January\",\"year\":\"2022\",\"location\":\"Cauayan City\"}','{\"day\":\"08\",\"month\":\"January\",\"cedula\":\"567345678\",\"date_issued\":\"01\\/05\\/2022\",\"loc_issued\":\"Cauayan City\",\"govid_no\":\"46583473847\"}','img-9d6bfe0e7e.jpg','16.6899661,121.5463319','img-3a57c0ed4c.png','img-d5452239dd.png','61d8fb6c72617.png','2022-01-08 10:48:55','2022-01-08 07:46:27',NULL,3),(4,'af161c6',9,'sobrang mahal ng bearbrand','{\"fullname\":\"qwerty\",\"age\":\"21\",\"status\":\"Single\",\"telno\":\"12345678\",\"email\":\"konuha25@gmail.com\",\"address\":\"san mateo, isabela\"}','{\"fullname\":\"janjan\",\"age\":\"32\",\"status\":\"Married\",\"telno\":\"23456789\",\"email\":\"qwerty25@gmail.com\",\"address\":\"asdfghj\"}','fafaf',1,'{\"option1\":null,\"option2\":null,\"option3\":null,\"option4\":null,\"option5\":null,\"option6\":null,\"option7\":null,\"option8\":null,\"option9\":null,\"option10\":null,\"option11\":null,\"option12\":null}','asdfg','asdfg',2,'asdf','{\"option1\":\"1\",\"option2\":null,\"option3\":null}','','{\"day\":\"january\",\"month\":\"8\",\"year\":\"2022\",\"location\":\"santiago\"}','{\"day\":\"january\",\"month\":\"8\",\"cedula\":\"2345\",\"date_issued\":\"january 8,2022\",\"loc_issued\":\"santiago\",\"govid_no\":\"23456\"}','img-6ffb65e695.jpg','16.8047074,121.5255704','img-908f21660e.jpg','img-45d748e271.jpg',NULL,'2022-01-08 07:39:47','2022-01-08 07:41:06',NULL,3),(5,'fddeaf7',9,'Overpiced Product','{\"fullname\":\"Robert\",\"age\":\"18\",\"status\":\"Single\",\"telno\":\"12345678\",\"email\":\"robertpalaming@outlook.com\",\"address\":\"san mateo, isabela\"}','{\"fullname\":\"janjan\",\"age\":\"na\",\"status\":\"Single\",\"telno\":\"23456789\",\"email\":\"qwerty25@gmail.com\",\"address\":\"asdfghj\"}','fafaf',NULL,'{\"option1\":null,\"option2\":null,\"option3\":null,\"option4\":null,\"option5\":null,\"option6\":null,\"option7\":null,\"option8\":null,\"option9\":null,\"option10\":null,\"option11\":null,\"option12\":null}','','',2,'Overpriced Product','{\"option1\":\"1\",\"option2\":null,\"option3\":null}','','{\"day\":\"january\",\"month\":\"8\",\"year\":\"2022\",\"location\":\"santiago\"}','{\"day\":\"january\",\"month\":\"8\",\"cedula\":\"2345\",\"date_issued\":\"january 8,2022\",\"loc_issued\":\"santiago\",\"govid_no\":\"23456\"}','img-86aa683574.PNG','16.8047074,121.5255704','img-e21d8fca41.png','img-111a85bcc4.png',NULL,'2022-01-08 08:08:44','0000-00-00 00:00:00',NULL,1),(6,'104a923',9,'Mahal ng argintina','{\"fullname\":\"Jay Julaton\",\"age\":\"11\",\"status\":\"Married\",\"telno\":\"09876543111\",\"email\":\"jayjulaton@icloud.com\",\"address\":\"Sinamar Sur, San Mateo, Isabela\"}','{\"fullname\":\"Peru mark\",\"age\":\"33\",\"status\":\"Widow\",\"telno\":\"098765432\",\"email\":\"Konuha22@gmail.com\",\"address\":\"Shipuden, aaaaa\"}','blabla',1,'{\"option1\":null,\"option2\":null,\"option3\":null,\"option4\":null,\"option5\":null,\"option6\":null,\"option7\":\"1\",\"option8\":null,\"option9\":null,\"option10\":null,\"option11\":null,\"option12\":null}','asdfghjk','',2,'blabla','{\"option1\":null,\"option2\":\"1\",\"option3\":null}','','{\"day\":\"january\",\"month\":\"8\",\"year\":\"2022\",\"location\":\"Burgos,Ramon\"}','{\"day\":\"january\",\"month\":\"8\",\"cedula\":\"0987654\",\"date_issued\":\"january 8,2022\",\"loc_issued\":\"Manila\",\"govid_no\":\"12345\"}','img-d423bb80ce.png','16.8047074,121.5255704','img-09cbbf27b1.PNG','img-0c5c27aeb7.PNG',NULL,'2022-01-08 08:18:24','0000-00-00 00:00:00','Department of Agriculture',2),(7,'6a82fb3',9,'s','{\"fullname\":\"s\",\"age\":\"s\",\"status\":\"Single\",\"telno\":\"s\",\"email\":\"s\",\"address\":\"s\"}','{\"fullname\":\"s\",\"age\":\"s\",\"status\":\"Single\",\"telno\":\"s\",\"email\":\"s\",\"address\":\"s\"}','s',NULL,'{\"option1\":null,\"option2\":null,\"option3\":null,\"option4\":null,\"option5\":null,\"option6\":null,\"option7\":null,\"option8\":null,\"option9\":null,\"option10\":null,\"option11\":null,\"option12\":null}','','',2,'ssss','{\"option1\":\"1\",\"option2\":null,\"option3\":null}','','{\"day\":\"s\",\"month\":\"s\",\"year\":\"s\",\"location\":\"s\"}','{\"day\":\"s\",\"month\":\"s\",\"cedula\":\"s\",\"date_issued\":\"s\",\"loc_issued\":\"s\",\"govid_no\":\"s\"}','img-ecd43bda60.png','16.8047074,121.5255704','img-ec9b67af8d.png','img-7d805b9505.png',NULL,'2022-01-08 08:50:51','0000-00-00 00:00:00',NULL,1),(8,'8cbd839',9,'fghj','{\"fullname\":\"asdfghnjmjhg\",\"age\":\"2\",\"status\":\"Single\",\"telno\":\"8765432\",\"email\":\"dfghjhg\",\"address\":\"dfgfd\"}','{\"fullname\":\"dfghggf\",\"age\":\"33\",\"status\":\"Single\",\"telno\":\"ghgfdfgh\",\"email\":\"sdfhdfdvd\",\"address\":\"fghkmnbsff\"}','nfgng',1,'{\"option1\":null,\"option2\":null,\"option3\":null,\"option4\":null,\"option5\":null,\"option6\":null,\"option7\":null,\"option8\":null,\"option9\":null,\"option10\":null,\"option11\":null,\"option12\":null}','','',NULL,'','{\"option1\":\"1\",\"option2\":null,\"option3\":null}','','{\"day\":\"january\",\"month\":\"8\",\"year\":\"2222\",\"location\":\"dfsdgd\"}','{\"day\":\"january\",\"month\":\"8\",\"cedula\":\"fsfhg\",\"date_issued\":\"sdfsfg\",\"loc_issued\":\"twt\",\"govid_no\":\"wtwt\"}',NULL,'16.8047074,121.5255704',NULL,NULL,NULL,'2022-01-08 09:42:19','0000-00-00 00:00:00',NULL,0);

/*Table structure for table `settings` */

DROP TABLE IF EXISTS `settings`;

CREATE TABLE `settings` (
  `setting_id` int(11) NOT NULL AUTO_INCREMENT,
  `type` text,
  `description` text,
  PRIMARY KEY (`setting_id`)
) ENGINE=MyISAM AUTO_INCREMENT=3 DEFAULT CHARSET=latin1;

/*Data for the table `settings` */

insert  into `settings`(`setting_id`,`type`,`description`) values (1,'system_name','PMRS'),(2,'system_title','Price Monitoring and Reporting System');

/*Table structure for table `units` */

DROP TABLE IF EXISTS `units`;

CREATE TABLE `units` (
  `Id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(50) DEFAULT NULL,
  `description` varchar(50) DEFAULT NULL,
  `status` int(1) DEFAULT NULL,
  PRIMARY KEY (`Id`)
) ENGINE=MyISAM AUTO_INCREMENT=5 DEFAULT CHARSET=latin1;

/*Data for the table `units` */

insert  into `units`(`Id`,`name`,`description`,`status`) values (1,'g','Grams',1),(2,'kg','Kilograms',1),(3,'mL','Milliliters',1),(4,'L','Liters',1);

/*Table structure for table `user_account` */

DROP TABLE IF EXISTS `user_account`;

CREATE TABLE `user_account` (
  `user_id` int(11) NOT NULL AUTO_INCREMENT,
  `firstname` varchar(255) DEFAULT NULL,
  `middlename` varchar(255) DEFAULT NULL,
  `lastname` varchar(255) DEFAULT NULL,
  `suffix` varchar(10) DEFAULT NULL,
  `address` text,
  `dob` date DEFAULT NULL,
  `contact_no` int(15) DEFAULT NULL,
  `gender` int(1) DEFAULT NULL,
  `username` varchar(50) DEFAULT NULL,
  `password` text,
  `email_address` text,
  `date_created` datetime DEFAULT NULL,
  `date_modify` datetime DEFAULT NULL,
  `login_type` int(1) DEFAULT NULL,
  `type` int(1) DEFAULT '0',
  `bo_type` int(1) DEFAULT '0',
  `status` int(1) DEFAULT '0',
  `is_verified` int(1) DEFAULT '0',
  `otp_code` varchar(50) DEFAULT NULL,
  PRIMARY KEY (`user_id`)
) ENGINE=MyISAM AUTO_INCREMENT=13 DEFAULT CHARSET=latin1;

/*Data for the table `user_account` */

insert  into `user_account`(`user_id`,`firstname`,`middlename`,`lastname`,`suffix`,`address`,`dob`,`contact_no`,`gender`,`username`,`password`,`email_address`,`date_created`,`date_modify`,`login_type`,`type`,`bo_type`,`status`,`is_verified`,`otp_code`) values (1,'System','','Administrator',NULL,'','2021-07-01',0,1,'admin','R3CmZA8V+MTesb8P4gVE2A==','service.pmrs@gmail.com','2021-11-07 11:03:18',NULL,1,0,0,0,1,NULL),(12,'kb may','r','Bombarda','','sasasas','4333-02-23',87654,2,'daa','sX66g0xEXcRT5lAThRfhhw==','dassfdds8s76ada@gmail.com','2022-01-08 10:02:58',NULL,2,1,0,0,0,'2435'),(9,'Jay','Jose','Julaton','','Sinamar Sur, San Mateo, Isabela','2000-05-25',2147483647,1,'jay25','JF5ej5yeKKJhSAMb3NdCIw==','jayjulaton25@gmail.com','2021-12-13 09:11:41',NULL,2,2,2,0,1,'1431'),(10,'Robert','l','palaming','','san andress','0000-00-00',12,1,'benben','JrG+TZ8i4zjtGO+f3BKJHg==','robertpalaming@gmail.com','2021-12-13 09:41:13',NULL,2,1,0,0,1,'3078');

/*Table structure for table `user_log` */

DROP TABLE IF EXISTS `user_log`;

CREATE TABLE `user_log` (
  `log_id` int(11) NOT NULL AUTO_INCREMENT,
  `user_id` int(11) DEFAULT NULL,
  `action` varchar(255) DEFAULT NULL,
  `description` text,
  `date_trans` datetime DEFAULT NULL,
  PRIMARY KEY (`log_id`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

/*Data for the table `user_log` */

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;
