-- MySQL dump 10.13  Distrib 5.7.9, for Win64 (x86_64)
--
-- Host: localhost    Database: unn_w16037204
-- ------------------------------------------------------
-- Server version	5.7.9-log

/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;
/*!40103 SET @OLD_TIME_ZONE=@@TIME_ZONE */;
/*!40103 SET TIME_ZONE='+00:00' */;
/*!40014 SET @OLD_UNIQUE_CHECKS=@@UNIQUE_CHECKS, UNIQUE_CHECKS=0 */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;
/*!40111 SET @OLD_SQL_NOTES=@@SQL_NOTES, SQL_NOTES=0 */;

--
-- Table structure for table `te_category`
--

DROP TABLE IF EXISTS `te_category`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `te_category` (
  `catID` varchar(6) NOT NULL DEFAULT '',
  `catDesc` varchar(30) DEFAULT NULL,
  PRIMARY KEY (`catID`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `te_category`
--

LOCK TABLES `te_category` WRITE;
/*!40000 ALTER TABLE `te_category` DISABLE KEYS */;
INSERT INTO `te_category` VALUES ('c1','Carnival'),('c2','Theatre'),('c3','Comedy'),('c4','Exhibition'),('c5','Festival'),('c6','Family'),('c7','Music'),('c8','Sport'),('c9','Dance');
/*!40000 ALTER TABLE `te_category` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `te_events`
--

DROP TABLE IF EXISTS `te_events`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `te_events` (
  `eventID` int(10) NOT NULL AUTO_INCREMENT,
  `eventTitle` varchar(256) NOT NULL,
  `eventDescription` varchar(256) DEFAULT NULL,
  `venueID` varchar(6) DEFAULT NULL,
  `catID` varchar(6) DEFAULT NULL,
  `eventStartDate` date DEFAULT NULL,
  `eventEndDate` date DEFAULT NULL,
  `eventPrice` decimal(4,2) DEFAULT NULL,
  PRIMARY KEY (`eventID`)
) ENGINE=MyISAM AUTO_INCREMENT=9 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `te_events`
--

LOCK TABLES `te_events` WRITE;
/*!40000 ALTER TABLE `te_events` DISABLE KEYS */;
INSERT INTO `te_events` VALUES (1,'A Christmas Carol','Visit the three ghosts of Christmas this November as the PLAYHOUSE Whitley Bay kicks off the festive season with a fantastic Disney-esque musical production of A Christmas Carol.','v9','c6','2016-11-25','2016-11-26',10.50),(2,'The Newcastle Triathlon 2017','VO2 Max Racing Events, supported by Triathlon England and Newcastle City Council, are delighted to announce a spectacular new event. The Newcastle Triathlon is a genuinely unique and exciting event held at the vibrant heart of the City, the Quayside.','v6','c8','2017-07-19','2017-07-19',30.00),(3,'CBeebies Live!','CBEEBIES LIVE! THE BIG BAND.\r\nShow starring Mr Tumble, Mister Maker and Mr Bloom.\r\nThe Big Band brings together some of your best loved CBeebies characters in a music - themed spectacle, which is sure to have pre-schoolers rocking in the aisle.','v7','c6','2017-04-10','2017-04-10',9.00),(4,'Little Black Rose Musical Variety Show','The PLAYHOUSE Whitley Bay is delighted to announce that Little Black Rose Productions will be presenting Little Black Rose Musical Variety Show this December.','v9','c7','2016-12-03','2016-12-03',8.00),(5,'Laurel & Hardy','Laurel & Hardy invented the modern comedy double-act and are still as influential today as ever they were. Affectionately regarded by millions, they made over 100 films together and the iconic moments they created still live long in the memory.','v9','c3','2017-02-21','2017-02-21',10.50),(6,'Peter Pan - Never Ending Story','See the boy who never grows up in a live adventure you will never forget. Starring Stacey Solomon (X Factor and winner of I\'m a Celebrity Get Me Out of Here).','v7','c6','2017-01-15','2017-01-16',12.50),(7,'Mamma Mia!','Set on a Greek island paradise, a story of love, friendship and identity is cleverly told through the timeless songs of Abba.','v1','c7','2017-03-28','2017-04-05',15.00),(8,'Pride and Prejudice','\'It is a truth universally acknowledged, that a single man in possession of a good fortune, must be in want of a wife\'. As the Bennet sisters haplessly search for love in Jane Austen\'s ultimate romantic comedy, it is Mr Darcy who unwittingly finds his matc','v1','c2','2017-02-14','2017-02-18',8.50);
/*!40000 ALTER TABLE `te_events` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `te_events_special_offers`
--

DROP TABLE IF EXISTS `te_events_special_offers`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `te_events_special_offers` (
  `eventID` int(10) NOT NULL AUTO_INCREMENT,
  `eventTitle` varchar(256) NOT NULL,
  `eventDescription` varchar(256) DEFAULT NULL,
  `venueID` varchar(6) DEFAULT NULL,
  `catID` varchar(6) DEFAULT NULL,
  `eventStartDate` date DEFAULT NULL,
  `eventEndDate` date DEFAULT NULL,
  `eventPrice` decimal(4,2) DEFAULT NULL,
  PRIMARY KEY (`eventID`)
) ENGINE=MyISAM AUTO_INCREMENT=9 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `te_events_special_offers`
--

LOCK TABLES `te_events_special_offers` WRITE;
/*!40000 ALTER TABLE `te_events_special_offers` DISABLE KEYS */;
INSERT INTO `te_events_special_offers` VALUES (1,'A Christmas Carol','Visit the three ghosts of Christmas this November as the PLAYHOUSE Whitley Bay kicks off the festive season with a fantastic Disney-esque musical production of A Christmas Carol.','v9','c6','2016-11-25','2016-11-26',10.50),(2,'The Newcastle Triathlon 2017','VO2 Max Racing Events, supported by Triathlon England and Newcastle City Council, are delighted to announce a spectacular new event. The Newcastle Triathlon is a genuinely unique and exciting event held at the vibrant heart of the City, the Quayside.','v6','c8','2017-07-19','2017-07-19',30.00),(3,'CBeebies Live!','CBEEBIES LIVE! THE BIG BAND.\r\nShow starring Mr Tumble, Mister Maker and Mr Bloom.\r\nThe Big Band brings together some of your best loved CBeebies characters in a music - themed spectacle, which is sure to have pre-schoolers rocking in the aisle.','v7','c6','2017-04-10','2017-04-10',9.00),(4,'Little Black Rose Musical Variety Show','The PLAYHOUSE Whitley Bay is delighted to announce that Little Black Rose Productions will be presenting Little Black Rose Musical Variety Show this December.','v9','c7','2016-12-03','2016-12-03',8.00),(5,'Laurel & Hardy','Laurel & Hardy invented the modern comedy double-act and are still as influential today as ever they were. Affectionately regarded by millions, they made over 100 films together and the iconic moments they created still live long in the memory.','v9','c3','2017-02-21','2017-02-21',10.50),(6,'Peter Pan - Never Ending Story','See the boy who never grows up in a live adventure you will never forget. Starring Stacey Solomon (X Factor and winner of I\'m a Celebrity Get Me Out of Here).','v7','c6','2017-01-15','2017-01-16',12.50),(7,'Mamma Mia!','Set on a Greek island paradise, a story of love, friendship and identity is cleverly told through the timeless songs of Abba.','v1','c7','2017-03-28','2017-04-05',15.00),(8,'Pride and Prejudice','\'It is a truth universally acknowledged, that a single man in possession of a good fortune, must be in want of a wife\'. As the Bennet sisters haplessly search for love in Jane Austen\'s ultimate romantic comedy, it is Mr Darcy who unwittingly finds his matc','v1','c2','2017-02-14','2017-02-18',8.50);
/*!40000 ALTER TABLE `te_events_special_offers` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `te_venue`
--

DROP TABLE IF EXISTS `te_venue`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `te_venue` (
  `venueID` varchar(6) NOT NULL DEFAULT '',
  `venueName` varchar(40) DEFAULT NULL,
  `location` varchar(30) DEFAULT NULL,
  PRIMARY KEY (`venueID`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `te_venue`
--

LOCK TABLES `te_venue` WRITE;
/*!40000 ALTER TABLE `te_venue` DISABLE KEYS */;
INSERT INTO `te_venue` VALUES ('v1','Theatre Royal','Newcastle upon Tyne'),('v2','BALTIC Centre for Contemporary Art','Gateshead'),('v3','Laing Art Gallery','Newcastle Upon Tyne'),('v4','The Biscuit Factory','Newcastle upon Tyne'),('v5','Discovery Museum','Newcastle upon Tyne'),('v6','HMS Calliope','Gateshead'),('v7','Metro Radio Arena','Newcastle upon Tyne'),('v8','Mill Volvo Tyne Theatre','Newcastle upon Tyne'),('v9','PLAYHOUSE Whitley Bay','Whitley Bay'),('v10','Shipley Art Gallery','Gateshead'),('v11','Seven Stories','Newcastle upon Tyne');
/*!40000 ALTER TABLE `te_venue` ENABLE KEYS */;
UNLOCK TABLES;
/*!40103 SET TIME_ZONE=@OLD_TIME_ZONE */;

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;

-- Dump completed on 2017-04-15  1:12:56
