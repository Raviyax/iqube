-- MariaDB dump 10.19  Distrib 10.4.32-MariaDB, for Win64 (AMD64)
--
-- Host: localhost    Database: iqube
-- ------------------------------------------------------
-- Server version	10.4.32-MariaDB

/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;
/*!40103 SET @OLD_TIME_ZONE=@@TIME_ZONE */;
/*!40103 SET TIME_ZONE='+00:00' */;
/*!40014 SET @OLD_UNIQUE_CHECKS=@@UNIQUE_CHECKS, UNIQUE_CHECKS=0 */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;
/*!40111 SET @OLD_SQL_NOTES=@@SQL_NOTES, SQL_NOTES=0 */;

--
-- Table structure for table `admins`
--

DROP TABLE IF EXISTS `admins`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `admins` (
  `admin_id` int(11) NOT NULL AUTO_INCREMENT,
  `user_id` int(11) DEFAULT NULL,
  `email` varchar(50) NOT NULL,
  `password` varchar(255) NOT NULL,
  `username` varchar(100) NOT NULL,
  PRIMARY KEY (`admin_id`),
  UNIQUE KEY `user_id` (`user_id`),
  CONSTRAINT `admins_ibfk_1` FOREIGN KEY (`user_id`) REFERENCES `users` (`user_id`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `admins`
--

LOCK TABLES `admins` WRITE;
/*!40000 ALTER TABLE `admins` DISABLE KEYS */;
INSERT INTO `admins` VALUES (1,NULL,'admin@gmail.com','$2y$10$kU1GwmV/eWJJSz1ryUoMLuqI0mu2L1a5DSM./WVb/NyQBtBdF.g9m','SysAdmin');
/*!40000 ALTER TABLE `admins` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `chapters`
--

DROP TABLE IF EXISTS `chapters`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `chapters` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `subject` varchar(100) NOT NULL,
  `chapter_level_1` varchar(255) NOT NULL,
  `chapter_level_2` varchar(255) NOT NULL,
  `Weight` int(11) NOT NULL DEFAULT 0,
  `model_paper_duration` int(11) NOT NULL DEFAULT 0,
  `last_edited_date` datetime NOT NULL DEFAULT current_timestamp(),
  `last_edited_subject_admin` varchar(50) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=197 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `chapters`
--

LOCK TABLES `chapters` WRITE;
/*!40000 ALTER TABLE `chapters` DISABLE KEYS */;
INSERT INTO `chapters` VALUES (1,'physics','Measurement','Introduction to physics',2,0,'2024-04-21 00:00:00','2'),(5,'physics','Measurement','Dimensions\n',4,0,'2024-04-21 00:00:00',NULL),(6,'physics','Measurement','Measuring instruments',12,0,'2024-04-22 00:00:00','2'),(7,'physics','Measurement','Scalars and vectors',8,0,'2024-04-22 00:00:00','2'),(8,'physics','Mechanics','Kinematics\n',15,0,'2024-04-22 00:00:00','2'),(9,'physics','Mechanics','Resultant of forces',15,0,'2024-04-22 00:00:00','2'),(10,'physics','Mechanics','Force and motion',20,0,'2024-04-22 00:00:00','2'),(13,'physics','Mechanics','Equilibrium',10,0,'2024-04-21 00:00:00',NULL),(15,'physics','Mechanics','Work, energy and power',15,0,'2024-04-21 00:00:00',NULL),(16,'physics','Mechanics','Rotational motion',15,0,'2024-04-21 00:00:00',NULL),(19,'physics','Oscillations and Waves','Oscillations',15,0,'2024-04-21 00:00:00',NULL),(20,'physics','Oscillations and Waves','Mechanical waves',8,0,'2024-04-21 00:00:00',NULL),(21,'physics','Oscillations and Waves','Properties of waves',15,0,'2024-04-21 00:00:00',NULL),(22,'physics','Oscillations and Waves','Stationary waves in strings ',15,0,'2024-04-21 00:00:00',NULL),(23,'physics','Oscillations and Waves','Waves in gases',10,0,'2024-04-21 00:00:00',NULL),(24,'physics','Oscillations and Waves','Doppler effect',5,0,'2024-04-21 00:00:00',NULL),(25,'physics','Oscillations and Waves','Nature of sound',5,0,'2024-04-21 00:00:00',NULL),(26,'physics','Oscillations and Waves','Electromagnetic waves',5,0,'2024-04-21 00:00:00',NULL),(27,'physics','Oscillations and Waves','Geometrical optics',15,0,'2024-04-21 00:00:00',NULL),(30,'physics','Oscillations and Waves','Human eye\n',4,0,'2024-04-21 00:00:00',NULL),(31,'physics','Oscillations and Waves','Optical instruments',6,0,'2024-04-21 00:00:00',NULL),(32,'physics','Thermal Physics','Temperature\n',6,0,'2024-04-21 00:00:00',NULL),(33,'physics','Thermal Physics','Thermal expansion',6,0,'2024-04-21 00:00:00',NULL),(34,'chemistry','Atomic Structure','Reviews the\nmodels of atomic\nstructure',6,0,'2024-04-21 00:00:00',NULL),(35,'chemistry','Atomic Structure','Different types of electromagnetic radiation',4,30,'2024-04-23 00:00:00','5'),(41,'physics','Measurement','Physical quantities and units',4,0,'2024-04-21 00:00:00',NULL),(42,'physics','Gravitational Field','Gravitational force field',8,13,'2024-04-22 00:00:00','2'),(43,'physics','Gravitational Field','Earth\'s gravitational field',12,0,'2024-04-21 00:00:00',NULL),(44,'physics','Gravitational Field','Electrostatic force',15,0,'2024-04-21 00:00:00',NULL),(45,'physics','Gravitational Field','Flux model',15,0,'2024-04-21 00:00:00',NULL),(48,'physics','Mechanics','Hydrostatics',12,0,'2024-04-23 00:00:00',NULL),(49,'physics','Mechanics','Fluid dynamics',8,0,'2024-04-23 00:00:00',NULL),(50,'physics','Thermal Physics','Kinetic theory of gases',4,0,'2024-04-23 00:00:00',NULL),(51,'physics','Thermal Physics','Gas Laws',10,0,'2024-04-23 00:00:00',NULL),(52,'physics','Thermal Physics','Heat exchange',8,0,'2024-04-23 00:00:00',NULL),(53,'physics','Thermal Physics','Change of state',8,0,'2024-04-23 00:00:00',NULL),(54,'physics','Thermal Physics','Vapour and humidity',8,0,'2024-04-23 00:00:00',NULL),(55,'physics','Thermal Physics','Thermodynamics',4,0,'2024-04-23 00:00:00',NULL),(56,'physics','Thermal Physics','Transfer of heat',6,0,'2024-04-23 00:00:00',NULL),(57,'physics','Gravitational Field',' Electric potentia',15,0,'2024-04-23 00:00:00',NULL),(58,'physics','Gravitational Field','Electric capacitance',15,0,'2024-04-23 00:00:00',NULL),(59,'physics','Magnetic Fields','Magnetic force',12,0,'2024-04-23 00:00:00',NULL),(60,'physics','Magnetic Fields','Magnetic force field',15,0,'2024-04-23 00:00:00',NULL),(61,'physics','Magnetic Fields','Torque acting on a current loop',15,0,'2024-04-23 00:00:00',NULL),(63,'physics','Magnetic Fields','Energy and power',6,0,'2024-04-23 00:00:00',NULL),(66,'physics','Current Electricity','Fundamental concepts',12,0,'2024-04-23 00:00:00',NULL),(67,'physics','Current Electricity','Energy and power',6,10,'2024-04-23 00:00:00','2'),(68,'physics','Current Electricity','Electromotive force',12,0,'2024-04-23 00:00:00',NULL),(69,'physics','Current Electricity','Electric circuits',8,0,'2024-04-23 00:00:00',NULL),(70,'physics','Current Electricity','Uses of Ammeter, Voltmeter and\nMultimeter',12,0,'2024-04-23 00:00:00',NULL),(71,'physics','Current Electricity','Electromagnetic induction',20,0,'2024-04-23 00:00:00',NULL),(72,'chemistry','Atomic Structure','Evidence\nfor electronic energy\nlevels of atoms',9,0,'2024-04-23 00:00:00',NULL),(73,'chemistry','Atomic Structure','Electronic\nconfiguration of\nisolated (gaseous)\natoms and ions',6,0,'2024-04-23 00:00:00',NULL),(74,'chemistry','Atomic Structure','Periodic table',8,0,'2024-04-23 00:00:00',NULL),(75,'chemistry','Bonding and Structure','Structure and\nproperties of matter',12,0,'2024-04-23 00:00:00',NULL),(76,'chemistry','Bonding and Structure','covalent\nand polar covalent\nmolecules',16,0,'2024-04-23 00:00:00',NULL),(77,'chemistry','Bonding and Structure','secondary\ninteractions',7,0,'2024-04-23 00:00:00',NULL),(78,'chemistry','Bonding and Structure','chemical formulae\nusing physical\nquantities',13,0,'2024-04-23 00:00:00',NULL),(79,'chemistry','Bonding and Structure','Balancing chemical equations',10,0,'2024-04-23 00:00:00',NULL),(80,'chemistry','Bonding and Structure','Calculations in chemical reactions',14,0,'2024-04-23 00:00:00',NULL),(81,'chemistry','State of matter; Gaseous State','Principal states of matter',2,0,'2024-04-23 00:00:00',NULL),(82,'chemistry','State of matter; Gaseous State','Introduction to an ideal gas',10,0,'2024-04-23 00:00:00',NULL),(83,'chemistry','State of matter; Gaseous State','Molecular kinetic theory of gases',8,0,'2024-04-23 00:00:00',NULL),(84,'chemistry','State of matter; Gaseous State',' Total pressure and partial pressure',6,0,'2024-04-23 00:00:00',NULL),(85,'chemistry','State of matter; Gaseous State','Compressibility factor',6,0,'2024-04-23 00:00:00',NULL),(86,'chemistry','Energetics','Extensive and intensive properties',5,0,'2024-04-23 00:00:00',NULL),(88,'chemistry','Energetics','Calculation of heat changes ',23,0,'2024-04-23 00:00:00',NULL),(89,'chemistry','Energetics','Born - Haber\ncycle',8,0,'2024-04-23 00:00:00',NULL),(90,'chemistry','Energetics','Entropy (S) and entropy change (ΔS)',5,0,'2024-04-23 00:00:00',NULL),(91,'combined-mathematics','Test Unit','Test Sub unit',10,0,'2024-04-23 00:00:00',NULL),(93,'ict','Introduction to Computer','History of computing',4,0,'2024-04-25 05:30:42',NULL),(94,'ict','Introduction to Computer','Functionality \nof a computer',6,0,'2024-04-25 05:32:05',NULL),(95,'ict','Introduction to Computer','The Von\nNeumann Architecture ',6,0,'2024-04-25 05:33:43',NULL),(98,'ict','Data Representation','Basic arithmetic and \nlogic operations on binary \nnumbers ',4,0,'2024-04-25 05:36:25',NULL),(99,'ict','Data Representation','How characters \nare represented in \ncomputers ',4,0,'2024-04-25 05:36:45',NULL),(100,'ict','Data Representation','How numbers are \nrepresented in computers',10,0,'2024-04-25 05:38:07',NULL),(101,'ict','Fundamental of Digital Circuits','Combinational logic gates',6,0,'2024-04-25 05:38:58',NULL),(102,'ict','Fundamental of Digital Circuits','Simple digital \ncircuits ',6,0,'2024-04-25 05:39:20',NULL),(103,'ict','Fundamental of Digital Circuits','Laws of \nBoolean algebra and \nKarnaugh map ',8,0,'2024-04-25 05:39:41',NULL),(104,'ict','Fundamental of Digital Circuits','Basic digital \nlogic gates  ',6,0,'2024-04-25 05:39:58',NULL),(105,'ict','Computer Operating System','Evolution of OS ',4,10,'2024-04-25 05:41:02',NULL),(106,'ict','Computer Operating System','File types',6,0,'2024-04-25 05:41:41',NULL),(107,'ict','Computer Operating System','Memory management ',6,0,'2024-04-25 05:42:02',NULL),(109,'ict','Data Communication and Networking','Signal Types ',4,0,'2024-04-25 05:43:50',NULL),(110,'ict','Data Communication and Networking',' Topologies',2,0,'2024-04-25 05:44:28',NULL),(111,'ict','Data Communication and Networking','Modulation and Demodulation',4,0,'2024-04-25 05:45:32',NULL),(112,'ict','Data Communication and Networking','Sub-netting ',6,0,'2024-04-25 05:46:09',NULL),(113,'ict','Data Communication and Networking','Domain Name System',4,0,'2024-04-25 05:46:39',NULL),(114,'ict','Data Communication and Networking','TCP/IP model ',4,0,'2024-04-25 05:46:59',NULL),(115,'ict','Data Communication and Networking','Encryption and digital signature',4,0,'2024-04-25 05:47:17',NULL),(116,'ict','Data Communication and Networking','ISPs',4,0,'2024-04-25 05:47:39',NULL),(117,'ict','System Analysis and Design','SSADM',2,0,'2024-04-25 05:48:28',NULL),(120,'ict','System Analysis and Design','Characteristics \nof Systems',4,0,'2024-04-25 05:54:07',NULL),(121,'ict','System Analysis and Design','Different \ninformation system \ndevelopment models and \nmethods',8,0,'2024-04-25 05:54:29',NULL),(122,'ict','Database Management',' ER diagrams',6,0,'2024-04-25 05:55:33',NULL),(123,'ict','Database Management','Normalization',6,0,'2024-04-25 05:55:58',NULL),(125,'ict','Database Management','Logical \nschema of a database',6,10,'2024-04-25 11:41:43','13'),(126,'ict','Database Management','The conceptual \nschema of a database ',12,0,'2024-04-25 05:58:19',NULL),(127,'ict','Database Management','The main \ncomponents of a \ndatabase system ',12,0,'2024-04-25 05:58:50',NULL),(128,'ict','Database Management','The main \ncomponents of the \nrelational database model',4,0,'2024-04-25 05:59:15',NULL),(129,'ict','Database Management','The basics of \ninformation and data, and \nthe need for databases',2,0,'2024-04-25 05:59:45',NULL),(130,'ict','Programming','Problem-solving \nprocess',2,0,'2024-04-25 06:00:58',NULL),(131,'ict','Programming','Algorithmic \napproach to solve \nproblems ',6,0,'2024-04-25 06:01:21',NULL),(132,'ict','Programming','Different programming \nparadigms ',2,0,'2024-04-25 06:01:46',NULL),(133,'ict','Programming','Types of program \ntranslators ',2,0,'2024-04-25 06:02:00',NULL),(134,'ict','Programming','IDEs and  basic features ',4,0,'2024-04-25 06:02:19',NULL),(135,'ict','Programming','Encode algorithms ',10,0,'2024-04-25 06:02:36',NULL),(136,'ict','Programming','Control structures ',12,0,'2024-04-25 06:02:55',NULL),(137,'ict','Web Development','The world wide web',8,0,'2024-04-25 06:03:43',NULL),(138,'ict','Web Development','Analysing user \nrequirements',4,0,'2024-04-25 06:04:00',NULL),(139,'ict','Web Development','Using HTML to create \nlinked  web pages ',16,0,'2024-04-25 06:04:13',NULL),(140,'ict','Web Development','Introduction to dynamic web pages ',6,0,'2024-04-25 06:04:36',NULL),(141,'ict','Web Development','Introduction to style sheet',8,0,'2024-04-25 06:04:52',NULL),(142,'ict','Web Development','Publishing and maintaining web sites ',4,0,'2024-04-25 06:05:07',NULL),(145,'ict','ICT in Business','The relationship \nbetween ICT and ',4,0,'2024-04-25 06:06:43',NULL),(146,'ict','ICT in Business','The role of ICT in \nthe world of business ',4,0,'2024-04-25 06:07:05',NULL),(147,'ict','ICT in Business','E-Commerce and e-business ',4,0,'2024-04-25 06:07:15',NULL),(148,'ict','ICT in Business',' E-marketing',4,0,'2024-04-25 06:07:30',NULL),(150,'biology','Introduction to Biology','Scope and importance of biology',2,0,'2024-04-25 06:20:18',NULL),(151,'biology','Introduction to Biology','Diversity of organisms – size, shape, form, \nhabitat ',3,0,'2024-04-25 06:20:29',NULL),(152,'biology','Introduction to Biology','Hierarchical levels of organization of  living \nthings ',3,0,'2024-04-25 06:20:42',NULL),(153,'biology','Introduction to Biology',' Cell as the basic structural and functional \nunit of life ',1,0,'2024-04-25 06:20:58',NULL),(158,'biology','Chemical & cellular basis of life','Elemental composition of living matter ',2,0,'2024-04-25 06:25:21',NULL),(159,'biology','Chemical & cellular basis of life','Importance of water for life ',4,0,'2024-04-25 06:25:34',NULL),(160,'biology','Chemical & cellular basis of life','Microscopes as  tools  in biology',7,0,'2024-04-25 06:25:51',NULL),(161,'biology','Chemical & cellular basis of life','Cell cycle ',9,0,'2024-04-25 06:26:11',NULL),(162,'biology','Chemical & cellular basis of life','Metabolism ',2,0,'2024-04-25 06:26:27',NULL),(163,'biology','Chemical & cellular basis of life','Importance of photosynthesis',12,0,'2024-04-25 06:26:42',NULL),(164,'biology','Chemical & cellular basis of life','Cellular respiration ',12,0,'2024-04-25 06:26:57',NULL),(165,'biology','Evolution and diversity of organisms','Origin of life on earth',7,0,'2024-04-25 06:41:42',NULL),(166,'biology','Evolution and diversity of organisms','Identification of organisms, classification \nand nomenclature',12,0,'2024-04-25 06:41:58',NULL),(167,'biology','Evolution and diversity of organisms','Domain - Bacteria',5,0,'2024-04-25 06:42:18',NULL),(168,'biology','Evolution and diversity of organisms',' Key morphological characteristics of \nkingdom Protista',6,0,'2024-04-25 06:42:37',NULL),(169,'biology','Evolution and diversity of organisms','Kingdom – Plantae',8,0,'2024-04-25 06:42:58',NULL),(170,'biology','Evolution and diversity of organisms',' Kingdom – Fungi  ',6,0,'2024-04-25 06:43:18',NULL),(171,'biology','Evolution and diversity of organisms',' Kingdom –Animalia',9,0,'2024-04-25 06:43:56',NULL),(172,'biology','Evolution and diversity of organisms','Characteristic features of classes  of  \nphylum Chordata',8,0,'2024-04-25 06:44:15',NULL),(173,'biology','Plant form and function','Meristems, their locations and role in \nplant growth ',8,0,'2024-04-25 06:45:09',NULL),(174,'biology','Plant form and function','Primary structure of monocotyledonous and \ndicotyledonous stems ',10,0,'2024-04-25 06:45:38',NULL),(175,'biology','Plant form and function',' Structure and functional adaptations of        \nleaf    for efficient  photosynthesis ',2,0,'2024-04-25 06:45:51',NULL),(177,'biology','Plant form and function','Process of gaseous \nexchange in plants ',4,0,'2024-04-25 06:47:05',NULL),(178,'biology','Plant form and function','Concepts of acquisition of \nwater and minerals',8,0,'2024-04-25 06:47:25',NULL),(179,'biology','Plant form and function',' Process \ninvolved in transport of \nmaterials in plants ',4,0,'2024-04-25 06:47:43',NULL),(180,'biology','Animal form and function','Structure, \ngrowth and \ndevelopment \nof animals',10,0,'2024-04-25 06:52:15',NULL),(181,'biology','Animal form and function','Nutrition in \nanimals  ',8,0,'2024-04-25 06:52:36',NULL),(182,'biology','Animal form and function','Organization of \ncirculatory systems in \nanimals ',3,0,'2024-04-25 06:53:10',NULL),(183,'biology','Animal form and function','Structure of \nthe human circulatory \nsystem to its functions. ',11,0,'2024-04-25 06:54:25',NULL),(184,'biology','Animal form and function','The role of \nblood',8,0,'2024-04-25 06:54:51',NULL),(185,'biology','Genetics','Scientific basis \nof Mendel’s Experiments ',7,0,'2024-04-25 06:55:55',NULL),(186,'biology','Genetics','Evolution of \nlife by using changes in \ngene frequencies.',4,0,'2024-04-25 06:56:34',NULL),(187,'biology','Genetics',' Patterns of \ninheritance of Mendelian \ncharacters in human',4,0,'2024-04-25 06:57:17',NULL),(188,'biology','Molecular Biology & Recombinant DNA Technology','Structures \nand functions of genetic \nmaterials',6,0,'2024-04-25 06:58:06',NULL),(189,'biology','Molecular Biology & Recombinant DNA Technology','The molecular \nbasis of mutations  ',7,0,'2024-04-25 06:58:35',NULL),(190,'biology','Molecular Biology & Recombinant DNA Technology',' Tools, \ntechniques and methods \nof gene technology',9,0,'2024-04-25 06:59:01',NULL),(191,'biology','Molecular Biology & Recombinant DNA Technology','Applications of gene \ntechnology ',4,0,'2024-04-25 06:59:32',NULL),(192,'biology','Environmental Biology',' Components  \nof an ecosystem ',2,0,'2024-04-25 07:00:40',NULL),(193,'biology','Environmental Biology','Ecosystems \nof Sri Lanka ',12,0,'2024-04-25 07:01:10',NULL),(194,'biology','Environmental Biology','Biodiversity \nand  threats due to \nhuman actions ',7,0,'2024-04-25 07:01:37',NULL),(195,'biology','Environmental Biology','Methods of \nBiodiversity  \nand \nenvironmental \nconservation',5,0,'2024-04-25 07:02:10',NULL),(196,'ict','Introduction to Computer','Different \ntypes of memory and their \nmain characteristics',6,0,'2024-04-25 07:30:26',NULL);
/*!40000 ALTER TABLE `chapters` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `do_progress_tracking_paper`
--

DROP TABLE IF EXISTS `do_progress_tracking_paper`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `do_progress_tracking_paper` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `subunit_id` varchar(100) NOT NULL,
  `student_id` varchar(100) NOT NULL,
  `score` int(11) DEFAULT NULL,
  `started` tinyint(1) NOT NULL DEFAULT 0,
  `completed` tinyint(1) NOT NULL DEFAULT 0,
  `last_attempted_time` datetime(5) NOT NULL DEFAULT current_timestamp(5),
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `do_progress_tracking_paper`
--

LOCK TABLES `do_progress_tracking_paper` WRITE;
/*!40000 ALTER TABLE `do_progress_tracking_paper` DISABLE KEYS */;
INSERT INTO `do_progress_tracking_paper` VALUES (1,'42','1',20,0,1,'2024-04-22 13:55:59.00000'),(2,'42','4',20,0,1,'2024-04-22 19:56:06.00000'),(3,'42','5',20,0,1,'2024-04-24 04:54:06.00000'),(4,'35','1',NULL,1,0,'2024-04-24 08:33:41.00000');
/*!40000 ALTER TABLE `do_progress_tracking_paper` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `essays_for_model_paper`
--

DROP TABLE IF EXISTS `essays_for_model_paper`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `essays_for_model_paper` (
  `essay_id` int(11) NOT NULL AUTO_INCREMENT,
  `model_paper_content_id` varchar(100) NOT NULL,
  `tutor_id` varchar(10) NOT NULL,
  `essay_questions` varchar(100) NOT NULL,
  PRIMARY KEY (`essay_id`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `essays_for_model_paper`
--

LOCK TABLES `essays_for_model_paper` WRITE;
/*!40000 ALTER TABLE `essays_for_model_paper` DISABLE KEYS */;
INSERT INTO `essays_for_model_paper` VALUES (1,'cb68d0c43687829a','2','65e2aaacd85ad9.31522326.pdf'),(2,'a6a82d5878b568f7','11','6616158a8fe5c4.57466581.pdf'),(3,'03be9338cb3bb706','5','661936a3c01ad2.55381646.pdf');
/*!40000 ALTER TABLE `essays_for_model_paper` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `iqube_support`
--

DROP TABLE IF EXISTS `iqube_support`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `iqube_support` (
  `iqube_support_id` varchar(100) NOT NULL,
  `user_id` varchar(100) DEFAULT NULL,
  `subject_admin_user_id` varchar(100) DEFAULT NULL,
  `support_request` varchar(512) DEFAULT NULL,
  `date` datetime(5) NOT NULL DEFAULT current_timestamp(5),
  `completed` tinyint(1) NOT NULL DEFAULT 0,
  PRIMARY KEY (`iqube_support_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `iqube_support`
--

LOCK TABLES `iqube_support` WRITE;
/*!40000 ALTER TABLE `iqube_support` DISABLE KEYS */;
INSERT INTO `iqube_support` VALUES ('','1','8','testdata','2024-04-19 16:43:53.04069',0),('1','1','8','test','2024-04-19 14:55:28.66597',0),('1YIG0yX2Ae','1','8','frraertyetryu','2024-04-19 18:13:14.34728',0),('2','1','8','test case','2024-04-19 15:58:40.02224',0),('3','1','8','hiiiii hekp','2024-04-19 16:12:08.50500',0),('6CKbSUG8D1','1','8','sdgfawdegwrg','2024-04-19 17:53:31.77509',0),('6ehxipXbfk','37','15','im nisal. need a help','2024-04-20 15:39:38.69584',0),('9T20sCjVNF','1','7','need a help to me','2024-04-19 20:22:48.79029',0),('A9NCmIBWzc','1','8','fhasetujtrswju','2024-04-19 18:05:16.61180',0),('AJq086KezC','1','26','aneee meee','2024-04-19 18:20:52.09337',0),('As8KQO6PvM','1','8','58ws6ii9','2024-04-19 18:08:33.26645',0),('CiH3sFgR6P','1','8','tusetuywetywty','2024-04-19 18:14:25.85256',0),('Dol4aCuQ2k','1','8','erqt3artewr','2024-04-19 18:15:30.73616',0),('DVHMSaEYZ5','1','8','FSUJTUJTU','2024-04-19 17:36:23.37182',0),('dzQKNptiIk','1','8','tuw4u','2024-04-19 18:19:40.03246',0),('eMKED4dy5F','1','8','dyaRHYreatuj','2024-04-19 17:42:40.54162',0),('eqYJ5Cgiw7','1','8','rarw','2024-04-19 18:12:52.46677',0),('ikrh0DMLJ6','1','8','reawreywray','2024-04-19 17:53:59.47008',0),('jDFkglmvKa','1','8','r7ua365tu4yijk','2024-04-19 17:45:02.76766',0),('JWwx03rG1m','1','8','eqatrwegarg','2024-04-19 17:49:09.61500',0),('oKwpVnW58j','1','8','start','2024-04-19 17:00:50.11506',0),('oubfDgqeY5','1','2','hello','2024-04-24 22:54:24.31509',0),('Qi5eYc4GVE','1','8','rfuyhq3ar5tuy','2024-04-19 18:07:19.29459',0),('RqYfBe32rL','1','8','hii machan2','2024-04-19 17:04:08.92327',0),('SM8Vz0swYR','1','8','retgargerg','2024-04-19 17:50:20.28177',0),('TrJXiHUDwz','1','26','hiiii','2024-04-19 18:24:47.70553',0),('v48XpSIR2w','1','26','tuws44tw','2024-04-19 18:21:32.58283',0),('vJlGQHSfKZ','1','8','weqsfedt','2024-04-19 18:17:51.49375',0),('w7gIQU8oy6','1','15','start chatting','2024-04-20 14:54:13.99931',0),('wdE4AlWrzt','1','7','new request','2024-04-20 13:28:02.30164',0),('WE91BHmV4R','1','8','hellooo machan','2024-04-19 17:02:19.29924',0),('WHtqycznsi','1','26','hellooo','2024-04-19 20:18:00.94999',0),('Z1XR9MQdpl','1','8','rfjueaztgkjyr','2024-04-19 17:57:00.66723',0);
/*!40000 ALTER TABLE `iqube_support` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `mcq_for_video`
--

DROP TABLE IF EXISTS `mcq_for_video`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `mcq_for_video` (
  `mcq_id` int(11) NOT NULL AUTO_INCREMENT,
  `video_content_id` varchar(100) NOT NULL,
  `tutor_id` varchar(100) NOT NULL,
  `question` varchar(500) NOT NULL,
  `option1` varchar(500) NOT NULL,
  `option2` varchar(500) NOT NULL,
  `option3` varchar(500) NOT NULL,
  `option4` varchar(500) NOT NULL,
  `option5` varchar(500) DEFAULT NULL,
  `correct` enum('option1','option2','option3','option4','option5') NOT NULL,
  `date` datetime NOT NULL DEFAULT current_timestamp(),
  PRIMARY KEY (`mcq_id`)
) ENGINE=InnoDB AUTO_INCREMENT=24 DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `mcq_for_video`
--

LOCK TABLES `mcq_for_video` WRITE;
/*!40000 ALTER TABLE `mcq_for_video` DISABLE KEYS */;
INSERT INTO `mcq_for_video` VALUES (1,'c112e3359ece1921','2','what is the lc of vernier calliper','1mm','5mm','3mm','6mm',NULL,'option3','2024-02-28 21:22:17'),(2,'c112e3359ece1921','2','this is a test question','ans a','ans b','ans c','ans d',NULL,'option3','2024-02-28 21:22:17'),(3,'4a9f27646239b5df','2','what is the lc of vernier calliper','1mm','5mm','3mm','6mm',NULL,'option2','2024-03-02 09:36:33'),(4,'4a9f27646239b5df','2','this is a test question','ans a','ans b','ans c','ans d',NULL,'option4','2024-03-02 09:36:33'),(5,'958a2a8ed979111d','4','Another name for force of gravity acting on an object is','friction','air resistance','weight','mass',NULL,'option3','2024-04-10 09:20:51'),(6,'958a2a8ed979111d','4','If an apple is taken to mountain top then its weight is','decreased','increased','constant','infinite',NULL,'option1','2024-04-10 09:20:51'),(7,'d4b21b948644c031','12',' How many orbitals can have the following set of quantum numbers, n = 3, l = 1, m1 = 0 ?','3','1','4','2','8','option2','2024-04-17 20:30:52'),(9,'d4b21b948644c031','12','Maximum number of electrons in a subshell can be','2l + 6','4l + 2','4l – 2','2n2','2l + 1','option2','2024-04-17 20:30:52'),(10,'d4b21b948644c031','12','The orientation of atomic orbitals depends on their','spin quantum number','None','magnetic quantum number','azimuthal quantum number','principal quantum number','option3','2024-04-17 20:30:52'),(11,'d4b21b948644c031','12',' The excitation energy of a hydrogen atom from its ground state to its third excited state is','12.75 eV','0.85 eV','10.2 eV','12.1 eV','None of above','option1','2024-04-17 20:30:52'),(12,'b4e30099beea69cf','12','Which of the following statements about the behavior of gases is true?','Gases have definite volume and shape.','Gases are compressible and expand to fill their containers.','Gases have high densities compared to liquids.','Gases always remain in a condensed state.','Gases do not exert pressure on the walls of their containers.','option2','2024-04-25 11:02:08'),(13,'7e7a1616b492aefb','9','Which area of the brain is primarily responsible for processing visual information received from the eyes?','Frontal lobe','Temporal lobe','Occipital lobe','Parietal lobe','Cerebellum','option3','2024-04-25 12:04:23'),(14,'7e7a1616b492aefb','9','What is the name of the specific region within the occipital lobe that is responsible for processing visual stimuli?',' Thalamus','Cerebellum','Hippocampus','Visual cortex','Amygdala','option4','2024-04-25 12:04:23'),(15,'7e7a1616b492aefb','9','Damage to which part of the brain is most likely to result in visual impairment, such as difficulty recognizing faces or objects?','Thalamus',' Medulla oblongata','Hypothalamus','Optic nerve',' Visual association area','option5','2024-04-25 12:04:24'),(16,'7e7a1616b492aefb','9','Which of the following statements about the visual area in the brain is true?','The visual area is primarily located in the frontal lobe.',' It processes auditory information received from the ears.','The visual area is responsible for controlling voluntary muscle movements.','Damage to the visual area does not affect vision','The visual area interprets information about shape, color, and motion.','option5','2024-04-25 12:04:24'),(17,'7e7a1616b492aefb','9','What term refers to the phenomenon where different regions of the visual cortex respond to specific features of visual stimuli, such as orientation or movement?','Visual accommodation',' Visual acuity','Visual field','Topographic organization','Visual perception','option4','2024-04-25 12:04:25'),(18,'90510608c3e3dde8','9','Which of the following is NOT considered a biotic component of an ecosystem?','Plants','Animals',' Soil','Bacteria',' Fungi','option3','2024-04-25 13:25:50'),(19,'90510608c3e3dde8','9','What term is used to describe the physical and chemical factors of an ecosystem that influence living organisms?',' Biotic factors','Producers','Abiotic factors','Consumers',' Decomposers','option3','2024-04-25 13:25:51'),(20,'90510608c3e3dde8','9','Which of the following is an example of an abiotic component of an aquatic ecosystem?','Fish','Algae','Sunlight',' Plankton','Coral reefs','option3','2024-04-25 13:25:51'),(21,'90510608c3e3dde8','9','What role do decomposers play in an ecosystem?','They produce oxygen through photosynthesis.','They break down dead organic matter and recycle nutrients.','They capture sunlight energy to produce food.','They serve as primary consumers in the food chain.','They provide shelter for other organisms','option2','2024-04-25 13:25:52'),(22,'90510608c3e3dde8','9','Which of the following best describes the relationship between producers and consumers in an ecosystem?','Producers obtain energy by consuming other organisms.','Consumers convert sunlight into energy through photosynthesis.','Producers are always primary consumers.','Consumers obtain energy by consuming producers or other consumers','Producers and consumers have no interdependence in an ecosystem.','option4','2024-04-25 13:25:52'),(23,'d4b21b948644c031','',' Which of the following models does not correspond to the Thomson Model of Atom?','Plum pudding model ','watermelon model','raisin pudding model','nuclear model  ','None of the above','option3','2024-04-26 17:26:19');
/*!40000 ALTER TABLE `mcq_for_video` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `mcqs_for_model_paper`
--

DROP TABLE IF EXISTS `mcqs_for_model_paper`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `mcqs_for_model_paper` (
  `mcq_id` int(11) NOT NULL AUTO_INCREMENT,
  `model_paper_content_id` varchar(100) NOT NULL,
  `tutor_id` varchar(10) NOT NULL,
  `question` varchar(500) NOT NULL,
  `option1` varchar(500) NOT NULL,
  `option2` varchar(500) NOT NULL,
  `option3` varchar(500) NOT NULL,
  `option4` varchar(500) NOT NULL,
  `option5` varchar(500) NOT NULL,
  `correct` enum('option1','option2','option3','option4','option5') NOT NULL,
  `date` datetime NOT NULL DEFAULT current_timestamp(),
  PRIMARY KEY (`mcq_id`)
) ENGINE=InnoDB AUTO_INCREMENT=15 DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `mcqs_for_model_paper`
--

LOCK TABLES `mcqs_for_model_paper` WRITE;
/*!40000 ALTER TABLE `mcqs_for_model_paper` DISABLE KEYS */;
INSERT INTO `mcqs_for_model_paper` VALUES (1,'cb68d0c43687829a','2','what is the lc of vernier calliper','1mm','5mm','3mm','6mm','6 mm','option3','2024-03-02 09:57:24'),(2,'cb68d0c43687829a','2','this is a test question','ans a','ans b','ans c','ans d','545','option3','2024-03-02 09:57:24'),(3,'a6a82d5878b568f7','11',' Which of the following has a positive charge?',' proton',' neutron','anion','electron',' atom','option3','2024-04-10 09:58:58'),(4,'a6a82d5878b568f7','11','Rutherford carried out experiments in which a beam of alpha particles was directed at a thin piece of metal foil. From these experiments he concluded that:','electrons are massive particles.','the positively charged parts of atoms are moving about with a velocity approaching the speed of light.',' the positively charged parts of atoms are extremely small and extremely heavy particles.','the diameter of an electron is approximately equal to that of the nucleus.','electrons travel in circular orbits around the nucleus.','option3','2024-04-10 09:58:58'),(5,'a6a82d5878b568f7','11','Consider the species 72Zn, 75As and 74Ge. These species have:',' the same number of electrons.','the same number of protons.','the same number of neutrons.','the same number of protons and neutrons.','the same mass number.','option1','2024-04-10 09:58:58'),(6,'03be9338cb3bb706','5','In SHM, choose the right statement for a particle’s force.','It is proportional to velocity in a linear manner.','It is proportional to position in a linear way.','It is angled away from the centre of gravity.','It’s moving in the right direction.','All above','option2','2024-04-12 18:56:59'),(7,'03be9338cb3bb706','5','F= -kx is the force on a particle of mass ‘m’ undergoing SHM. What is the relationship between x and in terms of angular frequency?','k = ?2 ?','k = m?? ','m = k/?2 ','m = k2/? ','none','option3','2024-04-12 18:56:59'),(8,'03be9338cb3bb706','5','The force applied on a 1kg particle is -2x, where x is the displacement from SHM’s mean location. What will be the time period of the oscillations?','2 ?s','??2 s ','none','? s','2?2? s   Answer: b) ','option2','2024-04-12 18:56:59'),(9,'03be9338cb3bb706','5','A particle is now executing SHM and moving towards the amplitude. What is the relationship between the direction of velocity and acceleration if it is at A/2?','Both vectors are pointing in the direction of the amplitude.','The direction of velocity is towards the amplitude, whereas the direction of acceleration is towards the mean position.','Acceleration is directed towards the amplitude, while velocity is directed towards the mean position.','none','Both vectors are pointing in the direction of the mean position.','option2','2024-04-12 18:56:59'),(10,'03be9338cb3bb706','5','Will the magnitude of maximum acceleration in a SHM be greater than the magnitude of maximum velocity for what value of w? The angular frequency is denoted by w.','none','? > 1 ','? < 1','? = 0','Not possible for any value of ?','option2','2024-04-12 18:56:59'),(11,'a3a8938ced19a67f','12','According to the ideal gas law, PV = nRT, where P is pressure, V is volume, n is the number of moles, R is the gas constant, and T is temperature. Which of the following statements is correct?','Increasing pressure decreases the volume of a gas. ','Increasing temperature increases the pressure of a gas.',' Increasing the number of moles decreases the volume of a gas.','Decreasing the temperature increases the volume of a gas.','Increasing the gas constant decreases the pressure of a gas','option1','2024-04-25 11:42:06'),(12,'68558af6995c609e','9','Which region of the brain is primarily responsible for processing visual information received from the eyes?','Frontal lobe','Temporal lobe','Occipital lobe',' Parietal lobe','Cerebellum','option3','2024-04-25 12:26:24'),(14,'a3a8938ced19a67f','','Which of the following gases is used in the production of chloroform?','Methane','Propane','Butane','Acetylene','None','option1','2024-04-26 13:39:45');
/*!40000 ALTER TABLE `mcqs_for_model_paper` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `mcqs_for_progress_tracking`
--

DROP TABLE IF EXISTS `mcqs_for_progress_tracking`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `mcqs_for_progress_tracking` (
  `mcq_id` int(11) NOT NULL AUTO_INCREMENT,
  `subunit_id` varchar(50) NOT NULL,
  `question` varchar(1024) NOT NULL,
  `option1` varchar(512) NOT NULL,
  `option2` varchar(512) NOT NULL,
  `option3` varchar(512) NOT NULL,
  `option4` varchar(512) NOT NULL,
  `option5` varchar(512) NOT NULL,
  `correct` varchar(100) NOT NULL,
  PRIMARY KEY (`mcq_id`)
) ENGINE=InnoDB AUTO_INCREMENT=22 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `mcqs_for_progress_tracking`
--

LOCK TABLES `mcqs_for_progress_tracking` WRITE;
/*!40000 ALTER TABLE `mcqs_for_progress_tracking` DISABLE KEYS */;
INSERT INTO `mcqs_for_progress_tracking` VALUES (1,'42','The value of gravitational acceleration on Earth is',' 9.8 m/s','9.8 m/s2','8.9 m/s','8.9 m/s2','None of the above','option2'),(2,'42','What would be the height of an artificial satellite so that it remains stationary with respect to earth’s surface?','36000 km above the earth surface','40000 km above the earth surface','26000 km above the earth surface','63000 km above the earth surface','None','option1'),(7,'42','The centripetal force required by the artificial satellite to revolve around earth is provided by','fuel contained in the satellite','gravitational force due to sun','gravitational force due to earth','Thrust produced by burning fuel','Non','option3'),(9,'42','What is the value of the escape velocity of eearth?',' 9.8 km/sec','10 km/sec','11.2 km/sec','12 km/sec','None','option3'),(11,'42','test question','1','2','3','4','5','option2'),(12,'67','A 68 Ω resistor is connected across the terminals of a 3 V battery. The power dissipation of the resistor is','132 mW','13.2 mW','22.6 mW','226 mW','2260 mW','option1'),(13,'67','A 120 Ω resistor must carry a maximum current of 25 mA. Its rating should be at least','4.8 W','150 mW','15 mW','480 mW','180 mW','option2'),(14,'67','When the pointer of an analog ohmmeter reads close to zero, the resistor being measured is','Overheated','Shorted','Open','Reversed','None','option2'),(15,'67','In 40 kW, there are','0.4 mW','40,000 W','400 W','5,000 W','6,000 W','option5'),(16,'35','Electromagnetic waves are produced by','A static charge','An accelerated charge','A moving charge','Charged particles','None of the above','option5'),(17,'125','What is a candidate key in a relational database?','A key for sorting data','A potential primary key','A reserved keyword in SQL','A key used for encryption','Representing a foreign entity','option2'),(18,'125','Which concept defines the logical structure of a database?','ER diagram','Relational schema','Database model','Data type','Primary key','option3'),(19,'125','What is the purpose of a relational database?','To store unstructured data','To establish relationships between tables','To execute complex algorithms','To execute complex algorithms','To manage hierarchical structures','option2'),(20,'125','How are ER diagrams transformed into a logical schema?','By converting attributes to data types','By using complex algorithms','By establishing relationships','By creating tables directly','By defining primary and foreign keys','option5'),(21,'125','Which database model is based on tables with rows and columns?','Flat file system','Relational model','Object Relational model','Network model','Hierarchical model','option2');
/*!40000 ALTER TABLE `mcqs_for_progress_tracking` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `model_paper_content`
--

DROP TABLE IF EXISTS `model_paper_content`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `model_paper_content` (
  `model_paper_content_id` varchar(100) NOT NULL,
  `tutor_id` varchar(50) NOT NULL,
  `thumbnail` varchar(100) NOT NULL,
  `price` int(11) NOT NULL,
  `name` varchar(100) NOT NULL,
  `subject` varchar(100) NOT NULL DEFAULT 'none',
  `description` varchar(1024) NOT NULL,
  `covering_chapters` varchar(500) NOT NULL,
  `time_duration` int(11) NOT NULL,
  `active` int(11) NOT NULL,
  `date` datetime NOT NULL DEFAULT current_timestamp(),
  PRIMARY KEY (`model_paper_content_id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `model_paper_content`
--

LOCK TABLES `model_paper_content` WRITE;
/*!40000 ALTER TABLE `model_paper_content` DISABLE KEYS */;
INSERT INTO `model_paper_content` VALUES ('03be9338cb3bb706','5','6619359b1a0260.60097924.jpeg',500,'Waves with mechanics fast revision paper','physics','A wave is essentially an oscillation that travels (picture a pendulum that always pays attention in class, asks relevant questions and gets straight A’s).\r\n\r\nThe recurring conversion of potential energy to kinetic energy and back to potential energy distinguishes SHM. Consider the following to go back to our pendulum: As you bring the pendulum back, its gravitational potential energy grows. When you let go, the gravitational potential energy is transformed to kinetic energy. The kinetic energy i','12][13][14][19][20][21',1,1,'2024-04-12 00:00:00'),('68558af6995c609e','9','662a4b8af05303.26343210.pdf',500,'Visual area ','biology','model paper on Visual area part','180',30,1,'2024-04-25 12:24:42'),('a3a8938ced19a67f','12','662b5284b5ea0images.png',500,'Gaseous state','chemistry','Gases have a lower density and are highly compressible as compared to solids and liquids. They exert an equal amount of pressure in all directions. The space between gas particles is a lot, and they have high kinetic energy. The intermolecular forces between these gas particles are negligible','82',40,1,'2024-04-25 11:39:10'),('a6a82d5878b568f7','11','661614ea81ba97.07873597.png',120,'Atomic structure cover paper','chemistry','Atomic Structure\r\n\r\nExamples of\r\nMultiple Choice Questions','34][35',2147483647,1,'2024-04-10 00:00:00'),('cb68d0c43687829a','2','65e2aa90f2de48.81165142.jpg',300,'model paper 1','chemistry','this is a test description','32][33',2147483647,1,'2024-04-10 00:00:00');
/*!40000 ALTER TABLE `model_paper_content` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `premium_students`
--

DROP TABLE IF EXISTS `premium_students`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `premium_students` (
  `pro_id` int(11) NOT NULL AUTO_INCREMENT,
  `student_id` int(11) NOT NULL,
  `fname` varchar(100) NOT NULL,
  `lname` varchar(100) NOT NULL,
  `address` varchar(200) NOT NULL,
  `city` varchar(50) NOT NULL,
  `cno` varchar(10) NOT NULL,
  `purchased_date` datetime(5) NOT NULL DEFAULT current_timestamp(5),
  `purchased_video` varchar(1024) DEFAULT NULL,
  `purchased_model_paper` varchar(1024) DEFAULT NULL,
  PRIMARY KEY (`pro_id`)
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `premium_students`
--

LOCK TABLES `premium_students` WRITE;
/*!40000 ALTER TABLE `premium_students` DISABLE KEYS */;
INSERT INTO `premium_students` VALUES (1,1,'Madasha','Liyanage','302/8, Gamini Mawatha, Batuwatta','Ragama','0711426031','2024-04-10 00:00:00.00000','4a9f27646239b5df,d4b21b948644c031,c112e3359ece1921,958a2a8ed979111d','cb68d0c43687829a,03be9338cb3bb706'),(2,3,'Saman','Perera','305/2','colombo','1234567890','2024-04-10 00:00:00.00000',NULL,NULL),(3,2,'Ravishan','Jayathilake','308/5, Mihindu mawatha, sooriyapaluwa,','kadawatha','+947692865','2024-04-10 00:00:00.00000',NULL,NULL),(4,4,'Nisal','Wishwajith','305','kottawa','123456789','2024-04-10 00:00:00.00000','d4b21b948644c031','03be9338cb3bb706');
/*!40000 ALTER TABLE `premium_students` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `purchased_model_papers`
--

DROP TABLE IF EXISTS `purchased_model_papers`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `purchased_model_papers` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `model_paper_content_id` varchar(100) NOT NULL,
  `student_id` int(11) NOT NULL,
  `started` tinyint(1) NOT NULL DEFAULT 0,
  `completed` int(11) NOT NULL DEFAULT 0,
  `purchased_date` datetime NOT NULL DEFAULT current_timestamp(),
  `score` int(11) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `purchased_model_papers`
--

LOCK TABLES `purchased_model_papers` WRITE;
/*!40000 ALTER TABLE `purchased_model_papers` DISABLE KEYS */;
INSERT INTO `purchased_model_papers` VALUES (1,'cb68d0c43687829a',1,0,1,'2024-04-12 00:00:00',0),(2,'03be9338cb3bb706',1,0,1,'2024-04-12 00:00:00',0),(3,'03be9338cb3bb706',4,1,1,'2024-04-18 00:00:00',0);
/*!40000 ALTER TABLE `purchased_model_papers` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `purchased_videos`
--

DROP TABLE IF EXISTS `purchased_videos`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `purchased_videos` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `video_content_id` varchar(100) NOT NULL,
  `student_id` varchar(100) NOT NULL,
  `completed` tinyint(1) NOT NULL DEFAULT 0,
  `score` int(11) DEFAULT NULL,
  `purchased_date` datetime NOT NULL DEFAULT current_timestamp(),
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `purchased_videos`
--

LOCK TABLES `purchased_videos` WRITE;
/*!40000 ALTER TABLE `purchased_videos` DISABLE KEYS */;
INSERT INTO `purchased_videos` VALUES (1,'4a9f27646239b5df','1',1,0,'2024-04-12 00:00:00'),(2,'d4b21b948644c031','1',1,0,'2024-04-17 00:00:00'),(3,'d4b21b948644c031','4',0,NULL,'2024-04-18 00:00:00'),(4,'c112e3359ece1921','1',1,0,'2024-04-20 00:00:00'),(5,'958a2a8ed979111d','1',1,1,'2024-04-22 00:00:00');
/*!40000 ALTER TABLE `purchased_videos` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `student_answers_for_model_paper_mcq`
--

DROP TABLE IF EXISTS `student_answers_for_model_paper_mcq`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `student_answers_for_model_paper_mcq` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `student_id` varchar(100) NOT NULL,
  `mcq_id` varchar(100) NOT NULL,
  `model_paper_content_id` varchar(100) NOT NULL,
  `answer` varchar(100) NOT NULL,
  `last_attempt_date` datetime NOT NULL DEFAULT current_timestamp(),
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=13 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `student_answers_for_model_paper_mcq`
--

LOCK TABLES `student_answers_for_model_paper_mcq` WRITE;
/*!40000 ALTER TABLE `student_answers_for_model_paper_mcq` DISABLE KEYS */;
INSERT INTO `student_answers_for_model_paper_mcq` VALUES (1,'1','6','03be9338cb3bb706','option1','2024-04-16 00:00:00'),(2,'1','7','03be9338cb3bb706','option1','2024-04-16 00:00:00'),(3,'1','8','03be9338cb3bb706','null','2024-04-16 00:00:00'),(4,'1','9','03be9338cb3bb706','null','2024-04-16 00:00:00'),(5,'1','10','03be9338cb3bb706','null','2024-04-16 00:00:00'),(6,'1','1','cb68d0c43687829a','null','2024-04-17 00:00:00'),(7,'1','2','cb68d0c43687829a','null','2024-04-17 00:00:00'),(8,'4','6','03be9338cb3bb706','option3','2024-04-18 00:00:00'),(9,'4','7','03be9338cb3bb706','null','2024-04-18 00:00:00'),(10,'4','8','03be9338cb3bb706','null','2024-04-18 00:00:00'),(11,'4','9','03be9338cb3bb706','null','2024-04-18 00:00:00'),(12,'4','10','03be9338cb3bb706','null','2024-04-18 00:00:00');
/*!40000 ALTER TABLE `student_answers_for_model_paper_mcq` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `student_answers_for_video_mcq`
--

DROP TABLE IF EXISTS `student_answers_for_video_mcq`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `student_answers_for_video_mcq` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `mcq_id` varchar(100) NOT NULL,
  `video_content_id` varchar(100) NOT NULL,
  `student_id` varchar(100) NOT NULL,
  `answer` varchar(100) NOT NULL,
  `last_attempt_date` date NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=12 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `student_answers_for_video_mcq`
--

LOCK TABLES `student_answers_for_video_mcq` WRITE;
/*!40000 ALTER TABLE `student_answers_for_video_mcq` DISABLE KEYS */;
INSERT INTO `student_answers_for_video_mcq` VALUES (1,'7','d4b21b948644c031','1','option3','0000-00-00'),(2,'8','d4b21b948644c031','1','option2','0000-00-00'),(3,'9','d4b21b948644c031','1','null','0000-00-00'),(4,'10','d4b21b948644c031','1','null','0000-00-00'),(5,'11','d4b21b948644c031','1','null','0000-00-00'),(6,'5','958a2a8ed979111d','1','option3','0000-00-00'),(7,'6','958a2a8ed979111d','1','option3','0000-00-00'),(8,'3','4a9f27646239b5df','1','option3','0000-00-00'),(9,'4','4a9f27646239b5df','1','option1','0000-00-00'),(10,'1','c112e3359ece1921','1','option2','0000-00-00'),(11,'2','c112e3359ece1921','1','option1','0000-00-00');
/*!40000 ALTER TABLE `student_answers_for_video_mcq` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `students`
--

DROP TABLE IF EXISTS `students`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `students` (
  `student_id` int(11) NOT NULL AUTO_INCREMENT,
  `user_id` int(11) DEFAULT NULL,
  `username` text DEFAULT NULL,
  `email` varchar(100) NOT NULL,
  `premium` tinyint(1) NOT NULL DEFAULT 0,
  `image` varchar(500) NOT NULL DEFAULT 'user.jpg',
  `completed` tinyint(1) NOT NULL DEFAULT 0,
  `subjects` varchar(255) DEFAULT NULL,
  `verify` tinyint(1) NOT NULL DEFAULT 0,
  `token` varchar(100) NOT NULL DEFAULT 'no token',
  PRIMARY KEY (`student_id`),
  UNIQUE KEY `user_id` (`user_id`),
  CONSTRAINT `students_ibfk_1` FOREIGN KEY (`user_id`) REFERENCES `users` (`user_id`)
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `students`
--

LOCK TABLES `students` WRITE;
/*!40000 ALTER TABLE `students` DISABLE KEYS */;
INSERT INTO `students` VALUES (1,1,'madasha','dewliyanage123@gmail.com',1,'user.jpg',1,'1,2,5',1,'no token'),(2,4,'Attendance jaye','jayathilakeravishan@gmail.com',1,'user.jpg',1,'5,6,7',1,'no token'),(3,6,'saman','freshhackrip@gmail.com',1,'user.jpg',0,'1,2,6',1,'no token'),(4,37,'wishwajith','wishwajithnisal@gmail.com',1,'user.jpg',1,'1,2,5',1,'no token'),(5,38,'gayan','medsupplyxinfo@gmail.com',0,'user.jpg',1,'1,2,6',1,'no token');
/*!40000 ALTER TABLE `students` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `subject_admins`
--

DROP TABLE IF EXISTS `subject_admins`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `subject_admins` (
  `subject_admin_id` int(11) NOT NULL AUTO_INCREMENT,
  `user_id` int(11) DEFAULT NULL,
  `email` text DEFAULT NULL,
  `subject` varchar(100) NOT NULL,
  `fname` varchar(255) DEFAULT NULL,
  `lname` varchar(255) DEFAULT NULL,
  `username` varchar(50) DEFAULT NULL,
  `cno` varchar(20) DEFAULT NULL,
  `image` varchar(500) NOT NULL DEFAULT 'user.jpg',
  PRIMARY KEY (`subject_admin_id`),
  UNIQUE KEY `user_id` (`user_id`),
  CONSTRAINT `subject_admins_ibfk_1` FOREIGN KEY (`user_id`) REFERENCES `users` (`user_id`)
) ENGINE=InnoDB AUTO_INCREMENT=22 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `subject_admins`
--

LOCK TABLES `subject_admins` WRITE;
/*!40000 ALTER TABLE `subject_admins` DISABLE KEYS */;
INSERT INTO `subject_admins` VALUES (1,2,'danuj@gmail.com','physics','Danujaya','Liyanage','danuj','0712345678','user.jpg'),(2,7,'shantha@gmail.com','physics','Shantha','Walpolage','Shantha','1234567890','user.jpg'),(3,8,'ishan@gmail.com','physics','Ishan','Anurudda','Ishan','1234567890','user.jpg'),(4,12,'dilan@gmail.com','chemistry','Dilan','gamage','dilan','1234567890','user.jpg'),(5,13,'dinesh@gmail.com','chemistry','Dinesh','Pandithavidana','Dinesh','1234567890','user.jpg'),(6,14,'chandana@gmail.com','combined-mathematics','Chandana','Mahesh','Chandana','1234567890','user.jpg'),(7,15,'upul@gmail.com','combined-mathematics','Upul','Kodikara','Upul','1234567890','user.jpg'),(8,16,'dinitha@gmail.com','biology','Dinitha','Gangodavila','Dinitha','1234567890','user.jpg'),(9,17,'buddi@gmail.com','biology','Buddi','bandara','buddi','1234567890','user.jpg'),(10,18,'siluni@gmail.com','financial-accounting','Siluni','Vethmini','Siluni','1234567890','user.jpg'),(11,19,'kasun@gmail.com','financial-accounting','Kasun','Hansamal','Kasun','1234567890','user.jpg'),(12,20,'vinupa@gmail.com','ict','Vinupa','Thenuka','1234567890','1234567890','user.jpg'),(13,21,'ravien@gmail.com','ict','Ravien','Dalpatadu','Ravien','123456789','user.jpg'),(14,22,'dewmini@gmail.com','logic','Dewmini','Liyanage','Dewmini','1234567890','user.jpg'),(15,23,'hasitha@gmail.com','logic','Hasitha','Gimhana','Perera','1234567890','user.jpg'),(16,24,'Wishwajith@gmail.com','political-science','Nisal','Wishwajith','Nisal','1234567890','user.jpg'),(17,25,'ravindu@gmail.com','political-science','Ravindu','Nadeesha','Ravindu','1234567890','user.jpg'),(18,26,'anjani@gmail.com','media-studies','Anjani','wickrama','Anjani','1234567890','user.jpg'),(19,27,'udula@gmail.com','media-studies','Udula','Perea','Udula','1234567890','user.jpg'),(20,28,'bandula@gmail.com','Economics','Bandula','Gunawardhana','Bandula','1234567890','user.jpg'),(21,29,'pasindi@gmail.com','Economics','Pasindi','Vindula','Pasindi','1234567890','user.jpg');
/*!40000 ALTER TABLE `subject_admins` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `subjects`
--

DROP TABLE IF EXISTS `subjects`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `subjects` (
  `subject_id` int(11) NOT NULL AUTO_INCREMENT,
  `subject_name` varchar(50) NOT NULL,
  PRIMARY KEY (`subject_id`)
) ENGINE=InnoDB AUTO_INCREMENT=21 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `subjects`
--

LOCK TABLES `subjects` WRITE;
/*!40000 ALTER TABLE `subjects` DISABLE KEYS */;
INSERT INTO `subjects` VALUES (1,'physics'),(2,'chemistry'),(5,'combined-mathematics'),(6,'biology'),(7,'financial-accounting'),(11,'ict'),(12,'logic'),(13,'political-science'),(14,'media-studies'),(15,'Economics');
/*!40000 ALTER TABLE `subjects` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `support_messages`
--

DROP TABLE IF EXISTS `support_messages`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `support_messages` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `iqube_support_id` varchar(10) NOT NULL,
  `sender_user_id` int(11) NOT NULL,
  `reciever_user_id` int(11) NOT NULL,
  `message` text NOT NULL,
  `received` datetime NOT NULL,
  `status` tinyint(1) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=51 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `support_messages`
--

LOCK TABLES `support_messages` WRITE;
/*!40000 ALTER TABLE `support_messages` DISABLE KEYS */;
INSERT INTO `support_messages` VALUES (1,'DVHMSaEYZ5',1,8,'FSUJTUJTU','0000-00-00 00:00:00',0),(2,'eMKED4dy5F',1,8,'dyaRHYreatuj','0000-00-00 00:00:00',0),(3,'jDFkglmvKa',1,8,'r7ua365tu4yijk','0000-00-00 00:00:00',0),(4,'JWwx03rG1m',1,8,'eqatrwegarg','0000-00-00 00:00:00',0),(5,'SM8Vz0swYR',1,8,'retgargerg','0000-00-00 00:00:00',0),(6,'6CKbSUG8D1',1,8,'sdgfawdegwrg','0000-00-00 00:00:00',0),(7,'ikrh0DMLJ6',1,8,'reawreywray','0000-00-00 00:00:00',0),(8,'Z1XR9MQdpl',1,8,'rfjueaztgkjyr','0000-00-00 00:00:00',0),(9,'A9NCmIBWzc',1,8,'fhasetujtrswju','0000-00-00 00:00:00',0),(10,'Qi5eYc4GVE',1,8,'rfuyhq3ar5tuy','0000-00-00 00:00:00',0),(11,'As8KQO6PvM',1,8,'58ws6ii9','0000-00-00 00:00:00',0),(12,'eqYJ5Cgiw7',1,8,'rarw','0000-00-00 00:00:00',0),(13,'1YIG0yX2Ae',1,8,'frraertyetryu','0000-00-00 00:00:00',0),(14,'CiH3sFgR6P',1,8,'tusetuywetywty','0000-00-00 00:00:00',0),(15,'Dol4aCuQ2k',1,8,'erqt3artewr','0000-00-00 00:00:00',0),(16,'vJlGQHSfKZ',1,8,'weqsfedt','0000-00-00 00:00:00',0),(17,'dzQKNptiIk',1,8,'tuw4u','0000-00-00 00:00:00',0),(18,'dzQKNptiIk',1,8,'hiiii','0000-00-00 00:00:00',0),(19,'AJq086KezC',1,26,'aneee meee','0000-00-00 00:00:00',0),(20,'v48XpSIR2w',1,26,'tuws44tw','0000-00-00 00:00:00',0),(21,'v48XpSIR2w',1,26,'hiii','0000-00-00 00:00:00',0),(22,'TrJXiHUDwz',1,26,'hiiii','0000-00-00 00:00:00',0),(23,'WHtqycznsi',1,26,'hellooo','0000-00-00 00:00:00',0),(24,'WHtqycznsi',1,26,'fhfszffdff','0000-00-00 00:00:00',0),(25,'WHtqycznsi',1,26,'rekhwbikl','0000-00-00 00:00:00',0),(26,'WHtqycznsi',1,26,'tuturty','0000-00-00 00:00:00',0),(27,'9T20sCjVNF',1,7,'need a help to me','0000-00-00 00:00:00',0),(28,'9T20sCjVNF',1,7,'hellooo','0000-00-00 00:00:00',0),(29,'wdE4AlWrzt',1,7,'new request','0000-00-00 00:00:00',0),(30,'wdE4AlWrzt',1,7,'hiiiiiii','0000-00-00 00:00:00',0),(31,'wdE4AlWrzt',1,7,'where are uu','0000-00-00 00:00:00',0),(32,'wdE4AlWrzt',1,7,'hellooo','0000-00-00 00:00:00',0),(33,'wdE4AlWrzt',1,7,'again','0000-00-00 00:00:00',0),(34,'9T20sCjVNF',1,7,'this is reply from subject admin','0000-00-00 00:00:00',0),(35,'wdE4AlWrzt',1,7,'hellooo','0000-00-00 00:00:00',0),(36,'9T20sCjVNF',7,1,'this is reply from subject admin','0000-00-00 00:00:00',0),(37,'w7gIQU8oy6',1,15,'start chatting','0000-00-00 00:00:00',0),(38,'w7gIQU8oy6',15,1,'hii yes','0000-00-00 00:00:00',0),(39,'w7gIQU8oy6',15,1,'yes i am upil','0000-00-00 00:00:00',0),(40,'w7gIQU8oy6',15,1,'how can i help you','0000-00-00 00:00:00',0),(41,'w7gIQU8oy6',1,15,'have a issue regarding a purchase','0000-00-00 00:00:00',0),(42,'w7gIQU8oy6',15,1,'may i know the issue','0000-00-00 00:00:00',0),(43,'w7gIQU8oy6',15,1,'message from upul','0000-00-00 00:00:00',0),(44,'w7gIQU8oy6',15,1,'message from upul','0000-00-00 00:00:00',0),(45,'w7gIQU8oy6',15,1,'test message from upul','0000-00-00 00:00:00',0),(46,'6ehxipXbfk',37,15,'im nisal. need a help','0000-00-00 00:00:00',0),(47,'w7gIQU8oy6',15,1,'helloo','0000-00-00 00:00:00',0),(48,'6ehxipXbfk',15,37,'hellooo','0000-00-00 00:00:00',0),(49,'oubfDgqeY5',1,2,'hello','0000-00-00 00:00:00',0),(50,'oubfDgqeY5',1,2,'hiii','0000-00-00 00:00:00',0);
/*!40000 ALTER TABLE `support_messages` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `tutor_requests`
--

DROP TABLE IF EXISTS `tutor_requests`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `tutor_requests` (
  `request_id` int(11) NOT NULL AUTO_INCREMENT,
  `email` varchar(50) NOT NULL,
  `subject` varchar(50) NOT NULL,
  `fname` varchar(50) NOT NULL,
  `lname` varchar(50) NOT NULL,
  `username` varchar(50) NOT NULL,
  `cno` varchar(15) NOT NULL,
  `declined` tinyint(1) NOT NULL DEFAULT 0,
  `cv` varchar(100) NOT NULL,
  `qualification` varchar(100) NOT NULL,
  `message` varchar(512) DEFAULT NULL,
  `requested_date` datetime NOT NULL DEFAULT current_timestamp(),
  PRIMARY KEY (`request_id`)
) ENGINE=InnoDB AUTO_INCREMENT=28 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `tutor_requests`
--

LOCK TABLES `tutor_requests` WRITE;
/*!40000 ALTER TABLE `tutor_requests` DISABLE KEYS */;
INSERT INTO `tutor_requests` VALUES (20,'malan@gmail.com','physics','Malan','Pathirage','Malan','1234567890',0,'65f49d31a0cdb9.16363059.pdf','highschool','hello im malan','2024-03-16 00:40:41');
/*!40000 ALTER TABLE `tutor_requests` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `tutors`
--

DROP TABLE IF EXISTS `tutors`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `tutors` (
  `tutor_id` int(11) NOT NULL AUTO_INCREMENT,
  `user_id` int(11) DEFAULT NULL,
  `email` varchar(100) NOT NULL,
  `subject` varchar(100) NOT NULL,
  `fname` varchar(100) NOT NULL,
  `lname` varchar(100) NOT NULL,
  `username` varchar(100) NOT NULL,
  `cno` varchar(100) NOT NULL,
  `image` varchar(500) NOT NULL DEFAULT 'user.jpg',
  `about_me` varchar(1024) DEFAULT NULL,
  `cv` varchar(100) NOT NULL,
  `qualification` varchar(50) DEFAULT NULL,
  `approved_date` datetime NOT NULL DEFAULT current_timestamp(),
  `active` tinyint(1) NOT NULL DEFAULT 0,
  `flagged` tinyint(1) NOT NULL DEFAULT 0,
  PRIMARY KEY (`tutor_id`),
  UNIQUE KEY `user_id` (`user_id`),
  CONSTRAINT `tutors_ibfk_1` FOREIGN KEY (`user_id`) REFERENCES `users` (`user_id`)
) ENGINE=InnoDB AUTO_INCREMENT=13 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `tutors`
--

LOCK TABLES `tutors` WRITE;
/*!40000 ALTER TABLE `tutors` DISABLE KEYS */;
INSERT INTO `tutors` VALUES (2,5,'2021is043@stu.ucsc.cmb.ac.lk','physics','Ravishan','Jayathilake','2021is043@stu.ucsc.cmb.ac.lk','+94769286535','user.jpg',NULL,'65df4d4ade8cd8.22373139.pdf','masters','2024-02-28 20:43:29',1,0),(3,9,'test@gmail.com','physics','Harsha','Mahamalage','Harsha','1234567890','user.jpg',NULL,'65f49c016b7f15.42966324.pdf','degree','2024-03-16 00:43:25',1,1),(4,10,'nuwan@gmail.com','physics','Nuwan','Sampath','Nuwan','1234567890','user.jpg',NULL,'65f49c4ac940b2.29894655.pdf','degree','2024-03-16 00:48:46',1,0),(5,11,'nilantha@gmail.com','physics','Nilantha','Jayasuriya','Nilantha','1234567890','user.jpg',NULL,'65f49cd376b1f3.19600899.pdf','phd','2024-03-16 00:50:40',1,0),(6,30,'shanil@gmail.com','combined-mathematics','Shanil','Perera','Shanil','1234567890','user.jpg',NULL,'65f4a8f0157cd1.29291562.pdf','degree','2024-03-16 01:33:49',1,0),(7,31,'dushyantha@gmail.com','combined-mathematics','Dushyantha','Mahabaduge','Dushyantha','1234567890','6629c48cee97d7.46518540.jpg',NULL,'65f4a926a4e029.61082909.pdf','degree','2024-03-16 01:34:02',1,0),(8,32,'dineshmuthugala@gmail.com','biology','Dinesh','Muthugala','Dineshmuthugala','1234567890','user.jpg',NULL,'65f4a83fc8a402.69327330.pdf','highschool','2024-03-16 01:34:49',1,0),(9,33,'thissa@gmail.com','biology','thissa','jananayake','thissa','1234567890','user.jpg',NULL,'65f4a88b5a41c4.75589773.pdf','diploma','2024-03-16 01:35:01',1,0),(10,34,'janaka@gmail.com','chemistry','Janaka','Abewansha','Janaka','1234567890','user.jpg',NULL,'65f4a73ff2cf71.63790386.pdf','masters','2024-03-16 01:36:13',1,0),(11,35,'hiranga@gmail.com','chemistry','Hiranga','Sovis','Hiranga','1234567890','user.jpg',NULL,'65f4a772dfda24.13989071.pdf','phd','2024-03-16 01:36:24',1,0),(12,36,'nirandaka@gmail.com','chemistry','Nirandaka','Jayawardana','Nirandaka','1234567890','user.jpg',NULL,'65f4a7a86a0543.97636250.pdf','diploma','2024-03-16 01:36:35',1,0);
/*!40000 ALTER TABLE `tutors` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `users`
--

DROP TABLE IF EXISTS `users`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `users` (
  `user_id` int(11) NOT NULL AUTO_INCREMENT,
  `username` varchar(50) NOT NULL,
  `password` varchar(255) NOT NULL,
  `email` varchar(100) NOT NULL,
  `role` enum('student','admin','tutor','subject_admin') NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `online` tinyint(1) NOT NULL DEFAULT 0,
  `gender` enum('male','female','none','') NOT NULL DEFAULT 'none',
  `image` varchar(100) NOT NULL DEFAULT 'user.jpg',
  `current_session` varchar(100) NOT NULL DEFAULT '0',
  `is_typing` enum('yes','no','','') NOT NULL DEFAULT 'no',
  `last_activity` timestamp NOT NULL DEFAULT current_timestamp(),
  PRIMARY KEY (`user_id`),
  UNIQUE KEY `username` (`username`)
) ENGINE=InnoDB AUTO_INCREMENT=39 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `users`
--

LOCK TABLES `users` WRITE;
/*!40000 ALTER TABLE `users` DISABLE KEYS */;
INSERT INTO `users` VALUES (1,'madasha','$2y$10$M4dX1DvAbOlpeDti6iOq4eQ1hHnNirg2GJycyjkgSjEwXrifDX0QO','dewliyanage123@gmail.com','student','2024-02-27 16:44:54','2024-04-18 16:11:06',1,'none','user.jpg','6','no','2024-03-14 12:09:39'),(2,'danuj','$2y$10$wLiLmDOavyXPZ21mVAPEQ.0xNfhOsiYaDOsQ.98huq4/lzWiwLoZC','danuj@gmail.com','subject_admin','2024-02-28 04:23:43','2024-02-28 04:23:43',0,'none','user.jpg','0','no','2024-03-14 12:09:39'),(4,'Attendance jaye','$2y$10$gHulqGIfIUHHe9jBcPvWmuZ.adg.khv/S6rpia6incBnrvsOiJG6q','jayathilakeravishan@gmail.com','student','2024-02-28 06:23:02','2024-03-14 17:54:08',1,'none','user.jpg','6','no','2024-03-14 12:09:39'),(5,'2021is043@stu.ucsc.cmb.ac.lk','$2y$10$z4d1.jcq3DrUbUEf6qT5zeoJ1rBLF6dK1sjOROQE6GAcfldC2fk.6','2021is043@stu.ucsc.cmb.ac.lk','tutor','2024-02-28 15:13:29','2024-02-28 15:33:31',0,'none','user.jpg','0','no','2024-03-14 12:09:39'),(6,'saman','$2y$10$H2SAUaM5qyDm65c12a1Uaexz9R/bctmr28rI2rmDZMkYp4xODeazq','freshhackrip@gmail.com','student','2024-02-28 16:10:18','2024-03-14 18:08:22',1,'none','user.jpg','4','no','2024-03-14 12:09:39'),(7,'Shantha','$2y$10$M4dX1DvAbOlpeDti6iOq4eQ1hHnNirg2GJycyjkgSjEwXrifDX0QO','shantha@gmail.com','subject_admin','2024-03-15 19:11:49','2024-04-20 07:17:10',1,'none','user.jpg','1','no','2024-03-15 19:11:49'),(8,'Ishan','$2y$10$gZhrcYj9nawWyAstH1nXwuMOXI0rMK7H1oU.hvE4sLmJCnP5ZdP9i','ishan@gmail.com','subject_admin','2024-03-15 19:12:30','2024-04-08 11:11:34',0,'none','user.jpg','0','no','2024-03-15 19:12:30'),(9,'Harsha','$2y$10$dZvy/cFLMxaD0XFNe0MZMOQuCKm.d6lLiY62GY7rwhXNoe9WVja96','test@gmail.com','tutor','2024-03-15 19:13:25','2024-03-15 19:18:12',0,'none','user.jpg','0','no','2024-03-15 19:13:25'),(10,'Nuwan','$2y$10$9Di99hblOchrmdCuSE3vseV7rHlB/RmhiFxCDd3XBomyiqV47hDXu','nuwan@gmail.com','tutor','2024-03-15 19:18:46','2024-03-15 19:19:35',0,'none','user.jpg','0','no','2024-03-15 19:18:46'),(11,'Nilantha','$2y$10$6AnA2C13ahFJi/slrKBxCuyr/SbpeLwXIyGR1N7/H1hJkVS0qggLS','nilantha@gmail.com','tutor','2024-03-15 19:20:40','2024-03-15 19:22:04',0,'none','user.jpg','0','no','2024-03-15 19:20:40'),(12,'dilan','$2y$10$M4dX1DvAbOlpeDti6iOq4eQ1hHnNirg2GJycyjkgSjE...','dilan@gmail.com','subject_admin','2024-03-15 19:25:40','2024-04-23 10:04:21',0,'none','user.jpg','0','no','2024-03-15 19:25:40'),(13,'Dinesh','$2y$10$rVieOCu8HzTWAPz2eXI1d.c8LKUTpnOdy6FBlVHgf07gKCY3izZn6','dinesh@gmail.com','subject_admin','2024-03-15 19:27:54','2024-03-15 19:27:54',0,'none','user.jpg','0','no','2024-03-15 19:27:54'),(14,'Chandana','$2y$10$eqmEOOL4mND9cDUiBRaiQ.jqeem2TghU1qIWX3LvBnkaRgDNjGQIO','chandana@gmail.com','subject_admin','2024-03-15 19:28:37','2024-03-15 19:28:37',0,'none','user.jpg','0','no','2024-03-15 19:28:37'),(15,'Upul','$2y$10$I/CQkgQ1IWCGsXg86vOwQucDRnF7w7i7bsddN2cKU1rTHtfEF1z8G','upul@gmail.com','subject_admin','2024-03-15 19:29:18','2024-03-15 19:29:18',0,'none','user.jpg','0','no','2024-03-15 19:29:18'),(16,'Dinitha','$2y$10$lXdtZaBjdRAonQl1UvSYB.EP4eMBTipdIsew59MMOt.1kI41SJTnG','dinitha@gmail.com','subject_admin','2024-03-15 19:30:08','2024-03-15 19:30:08',0,'none','user.jpg','0','no','2024-03-15 19:30:08'),(17,'buddi','$2y$10$xwNAifRKD.y9s8X9x7swrugBr2qGYbamUNVjxvk/vB1flOeXMBT8u','buddi@gmail.com','subject_admin','2024-03-15 19:31:01','2024-03-15 19:31:01',0,'none','user.jpg','0','no','2024-03-15 19:31:01'),(18,'Siluni','$2y$10$NKZqEVe53maWwhOfRrYQkeCgAvTI3B/FeYoV3KZuo7YIusIiOzAn6','siluni@gmail.com','subject_admin','2024-03-15 19:31:54','2024-03-15 19:31:54',0,'none','user.jpg','0','no','2024-03-15 19:31:54'),(19,'Kasun','$2y$10$XVD/zqJPiOdHZNKWkJi0K.zsJ564ZXuviS1kms3vOplV2InLN4WWS','kasun@gmail.com','subject_admin','2024-03-15 19:35:59','2024-03-15 19:35:59',0,'none','user.jpg','0','no','2024-03-15 19:35:59'),(20,'1234567890','$2y$10$C24XgxeT0F4sGjEJFCCWn.5kA0DKC09TLnV9QzVw3/1AVLXpXgVse','vinupa@gmail.com','subject_admin','2024-03-15 19:43:14','2024-03-15 19:43:14',0,'none','user.jpg','0','no','2024-03-15 19:43:14'),(21,'Ravien','$2y$10$BmCDe46pbRPNsEtpPRjRzeoWM5v4mL/Z8hDqKBQVZmr.1v3pi/8D2','ravien@gmail.com','subject_admin','2024-03-15 19:44:30','2024-03-15 19:44:30',0,'none','user.jpg','0','no','2024-03-15 19:44:30'),(22,'Dewmini','$2y$10$tME2BxKHtHWmOW4AYs7Y/.ZM4QWfdvGo.THQ/ukiUvI7RswnI63Fu','dewmini@gmail.com','subject_admin','2024-03-15 19:45:26','2024-03-15 19:45:26',0,'none','user.jpg','0','no','2024-03-15 19:45:26'),(23,'Perera','$2y$10$rilYqud9g5z3.RpVLPfhjenX0cqrGO7D394MCdgci4ssSTZGRFuNO','hasitha@gmail.com','subject_admin','2024-03-15 19:46:34','2024-03-15 19:46:34',0,'none','user.jpg','0','no','2024-03-15 19:46:34'),(24,'Nisal','$2y$10$iAl1DRMVildlXWZst1TLm.3HPyy/S5D2QhTVt10CE0vQmlg59XcrK','Wishwajith@gmail.com','subject_admin','2024-03-15 19:47:24','2024-03-15 19:47:24',0,'none','user.jpg','0','no','2024-03-15 19:47:24'),(25,'Ravindu','$2y$10$Yj8pCGan2B9isl7ZhRi8MOcjNC6MzoUqvPO/80jk70/jFp9zWnszK','ravindu@gmail.com','subject_admin','2024-03-15 19:48:04','2024-03-15 19:48:04',0,'none','user.jpg','0','no','2024-03-15 19:48:04'),(26,'Anjani','$2y$10$1qo9LwiX0rCx4QUMAMDd9O1OPfcVCzhqrZ1FcG401qJ152TSILx6K','anjani@gmail.com','subject_admin','2024-03-15 19:48:46','2024-03-15 19:48:46',0,'none','user.jpg','0','no','2024-03-15 19:48:46'),(27,'Udula','$2y$10$7RXozgZpYZwlUcBX6rD.J.5kvPnhwLMv4C5NHvcIDGSAwNCx.bW5C','udula@gmail.com','subject_admin','2024-03-15 19:49:28','2024-03-15 19:49:28',0,'none','user.jpg','0','no','2024-03-15 19:49:28'),(28,'Bandula','$2y$10$57KCdsRvqtsEJZpBlCbp9ez5OgdQ9Q5HxbZ.zW3tKbV/u8pNoY6F2','bandula@gmail.com','subject_admin','2024-03-15 19:50:23','2024-03-15 19:50:23',0,'none','user.jpg','0','no','2024-03-15 19:50:23'),(29,'Pasindi','$2y$10$fPC87xDAkv4kEOzxY3DMFuRggpao9Mo80Pucgtxf8MoJSWYVGRNVW','pasindi@gmail.com','subject_admin','2024-03-15 19:51:15','2024-03-15 19:51:15',0,'none','user.jpg','0','no','2024-03-15 19:51:15'),(30,'Shanil','$2y$10$eplCDSzQOyx8pojyeC.gp.pE6JA1soULaQ0mSVdIQQnx32.SEXILu','shanil@gmail.com','tutor','2024-03-15 20:03:49','2024-03-15 20:19:47',0,'none','user.jpg','0','no','2024-03-15 20:03:49'),(31,'Dushyantha','$2y$10$eplCDSzQOyx8pojyeC.gp.pE6JA1soULaQ0mSVdIQQnx32.SEXILu','dushyantha@gmail.com','tutor','2024-03-15 20:04:02','2024-03-15 20:19:52',0,'none','user.jpg','0','no','2024-03-15 20:04:02'),(32,'Dineshmuthugala','$2y$10$eplCDSzQOyx8pojyeC.gp.pE6JA1soULaQ0mSVdIQQnx32.SEXILu','dineshmuthugala@gmail.com','tutor','2024-03-15 20:04:49','2024-03-15 20:19:56',0,'none','user.jpg','0','no','2024-03-15 20:04:49'),(33,'thissa','$2y$10$eplCDSzQOyx8pojyeC.gp.pE6JA1soULaQ0mSVdIQQnx32.SEXILu','thissa@gmail.com','tutor','2024-03-15 20:05:01','2024-03-15 20:19:59',0,'none','user.jpg','0','no','2024-03-15 20:05:01'),(34,'Janaka','$2y$10$eplCDSzQOyx8pojyeC.gp.pE6JA1soULaQ0mSVdIQQnx32.SEXILu','janaka@gmail.com','tutor','2024-03-15 20:06:13','2024-03-15 20:20:03',0,'none','user.jpg','0','no','2024-03-15 20:06:13'),(35,'Hiranga','$2y$10$eplCDSzQOyx8pojyeC.gp.pE6JA1soULaQ0mSVdIQQnx32.SEXILu','hiranga@gmail.com','tutor','2024-03-15 20:06:24','2024-03-15 20:20:06',0,'none','user.jpg','0','no','2024-03-15 20:06:24'),(36,'Nirandaka','$2y$10$eplCDSzQOyx8pojyeC.gp.pE6JA1soULaQ0mSVdIQQnx32.SEXILu','nirandaka@gmail.com','tutor','2024-03-15 20:06:35','2024-03-15 20:20:09',0,'none','user.jpg','0','no','2024-03-15 20:06:35'),(37,'wishwajith','$2y$10$AZ8WQCR9h9xM1bNOqHN4AeAb2gz/6gwytt1xyUg0dYx/rY0SY7TUK','wishwajithnisal@gmail.com','student','2024-04-18 03:13:55','2024-04-18 03:24:40',1,'none','user.jpg','6','no','2024-04-18 03:13:55'),(38,'gayan','$2y$10$kBVYMphRUZ50.pIllhiCReMWdkEGW44TuO35YIMi6n08kEc2xEHBu','medsupplyxinfo@gmail.com','student','2024-04-23 16:23:48','2024-04-23 16:23:48',0,'none','user.jpg','0','no','2024-04-23 16:23:48');
/*!40000 ALTER TABLE `users` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `video_content`
--

DROP TABLE IF EXISTS `video_content`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `video_content` (
  `video_content_id` varchar(100) NOT NULL,
  `tutor_id` varchar(10) NOT NULL,
  `name` varchar(255) NOT NULL,
  `subject` varchar(100) NOT NULL DEFAULT 'none',
  `description` varchar(1024) NOT NULL,
  `video` varchar(100) NOT NULL,
  `thumbnail` varchar(100) NOT NULL,
  `price` int(11) NOT NULL,
  `covering_chapters` varchar(255) NOT NULL,
  `active` tinyint(1) NOT NULL DEFAULT 0,
  `date` datetime NOT NULL DEFAULT current_timestamp(),
  `duration` varchar(10) DEFAULT NULL,
  PRIMARY KEY (`video_content_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `video_content`
--

LOCK TABLES `video_content` WRITE;
/*!40000 ALTER TABLE `video_content` DISABLE KEYS */;
INSERT INTO `video_content` VALUES ('4a9f27646239b5df','2','Vernier Caliper','physics','This video is about vernier caliper','65e2a5ba4db384.78380424.mp4','65e2a5ba4dfb05.24091956.png',300,'3][4][6',1,'2024-04-10 00:00:00',NULL),('7e7a1616b492aefb','9','visual area','biology','this is an introductory video on visual area.','662a4535d5e7a6.16234644.wmv','662a4535d683e3.88130631.png',1000,'180',1,'2024-04-25 11:57:41',NULL),('90510608c3e3dde8','9','Components of an ecosystem ','biology','This is an introductory video on Components of an ecosystem.','662a587a522616.99430244.wmv','662a587a52d335.33992661.png',1500,'192',1,'2024-04-25 13:19:54',NULL),('958a2a8ed979111d','4','How Earth\'s Gravitational Field Works','physics','In physics, a gravitational field or gravitational acceleration field is a vector field used to explain the influences that a body extends into the space around itself. A gravitational field is used to explain gravitational phenomena, such as the gravitational force field exerted on another massive body','66160bcc3132f9.45195065.mp4','66160bcc317644.14678011.png',3200,'42][43',1,'2024-04-10 00:00:00',NULL),('b4e30099beea69cf','12','Gaseous state','chemistry','this is an introductory video ','662a3718b77a09.87973544.wmv','662a3718b847a5.39371789.png',1000,'81',1,'2024-04-25 10:57:28',NULL),('c112e3359ece1921','2','Vernier Caliper','physics','This video contains about vernier caliper','65df5665ade289.33283203.mp4','65df5665ae3ed3.04446191.png',2500,'5][6',1,'2024-04-10 00:00:00',NULL),('d4b21b948644c031','12','Atomic theory introduction','chemistry','Atomic theory is the scientific theory that matter is composed of particles called atoms. The definition of the word \"atom\" has changed over the years in response to scientific discoveries.','661fe317d26c21.65168620.mp4','662b94aab8978',350,'34][35',1,'2024-04-17 00:00:00',NULL);
/*!40000 ALTER TABLE `video_content` ENABLE KEYS */;
UNLOCK TABLES;
/*!40103 SET TIME_ZONE=@OLD_TIME_ZONE */;

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;

-- Dump completed on 2024-04-27 15:47:17
