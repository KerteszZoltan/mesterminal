-- MySQL dump 10.16  Distrib 10.1.48-MariaDB, for debian-linux-gnu (x86_64)
--
-- Host: localhost    Database: mesterminal
-- ------------------------------------------------------
-- Server version	10.1.48-MariaDB-0+deb9u2

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
-- Table structure for table `attachment`
--

DROP TABLE IF EXISTS `attachment`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `attachment` (
  `ID` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(255) COLLATE utf8_hungarian_ci NOT NULL,
  PRIMARY KEY (`ID`)
) ENGINE=InnoDB AUTO_INCREMENT=14 DEFAULT CHARSET=utf8 COLLATE=utf8_hungarian_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `attachment`
--

LOCK TABLES `attachment` WRITE;
/*!40000 ALTER TABLE `attachment` DISABLE KEYS */;
INSERT INTO `attachment` VALUES (1,'612601823fadb-1629880706.jpg'),(2,'612601a9d0442-1629880745.jpg'),(3,'612602a14936d-1629880993.jpg'),(4,'612602c4b7459-1629881028.jpg'),(5,'612602d35430a-1629881043.jpg'),(6,'612602fa499af-1629881082.jpg'),(7,'61260307e61be-1629881095.jpg'),(8,'6126031ca03ab-1629881116.jpg'),(9,'61260326b2881-1629881126.jpg'),(10,'6126032f7f69e-1629881135.jpg'),(11,'6126033b2aa00-1629881147.jpg'),(12,'6126034517e94-1629881157.jpg'),(13,'6126034ed6cc9-1629881166.jpg');
/*!40000 ALTER TABLE `attachment` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `category`
--

DROP TABLE IF EXISTS `category`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `category` (
  `ID` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(255) COLLATE utf8_hungarian_ci NOT NULL,
  PRIMARY KEY (`ID`)
) ENGINE=InnoDB AUTO_INCREMENT=61 DEFAULT CHARSET=utf8 COLLATE=utf8_hungarian_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `category`
--

LOCK TABLES `category` WRITE;
/*!40000 ALTER TABLE `category` DISABLE KEYS */;
INSERT INTO `category` VALUES (1,'ADMINISZTRÁCIÓS MŰVELETEK'),(2,'ADMINISZTRÁCIÓS MŰVELETEK-Szállítási, számlázási dokumentum készítés'),(3,'ADMINISZTRÁCIÓS MŰVELETEK- Termelési dokumentáció készítés'),(4,'ANYAGMOZGATÁS'),(5,'ANYAGMOZGATÁS-Anyag előkészítés gyártáshoz'),(6,'ANYAGMOZGATÁS- Egyéb szállítás'),(7,'ANYAGMOZGATÁS-Raktári árurendezés'),(8,'ANYAGMOZGATÁS- Telephelyek közti szállítás'),(9,'ANYAGMOZGATÁS- Udvari árurendezés'),(10,'ANYAGMOZGATÁS- Üzemi árurendezés'),(11,'CSISZOLÁS'),(12,'CSOMAGOLÁS'),(13,'CSOMAGOLÁS- Csomagolás feliratozással'),(14,'DARABOLÁS'),(15,'DEKORÁCIÓS MUNKÁK'),(16,'DEKORÁCIÓS MUNKÁK- Digitális nyomtatás'),(17,'DEKORÁCIÓS MUNKÁK- Szitanyomás'),(18,'DEKORÁCIÓS MUNKÁK- Szitanyomás- Fólia kivágás'),(19,'DEKORÁCIÓS MUNKÁK- Szitanyomás- Lézertechnikák'),(20,'FELIRATOZÁSOK'),(21,'FESTÉS'),(22,'FESTÉS- Kézi festés'),(23,'FESTÉS- Oldószeres festés'),(24,'FESTÉS- Porfestés'),(25,'FÉM IPARI MUNKÁLATOK'),(26,'FÉM IPARI MUNKÁLATOK- Lemezmunkák'),(27,'FÚRÁS'),(28,'HABOSÍTÁS'),(29,'HABOSÍTÁS- Kemény poliuretán'),(30,'HABOSÍTÁS- Lágy poliuretán'),(31,'HEGESZTÉS, FORRASZTÁS'),(32,'HEGESZTÉS, FORRASZTÁS- Forrasztás'),(33,'HEGESZTÉS, FORRASZTÁS- Hegesztés'),(34,'HEGESZTÉS, FORRASZTÁS- Pont hegesztés'),(35,'HEGESZTÉS, FORRASZTÁS- Ultrahangos hegesztés'),(36,'KARBANTARTÁS'),(37,'KARBANTARTÁS- Gép, szerszám karbantartás'),(38,'KARBANTARTÁS- Épületgépészeti karbantartás'),(39,'KOOPERÁCIÓ'),(40,'KOOPERÁCIÓ- Gyártási kooperáció'),(41,'KOOPERÁCIÓ- Tervezési kooperáció'),(42,'MŰANYAGIPARI MUNKÁLATOK'),(43,'MŰANYAGIPARI MUNKÁLATOK- CNC marás'),(44,'MŰANYAGIPARI MUNKÁLATOK- Forgácsolásos megmunkálás'),(45,'MŰANYAGIPARI MUNKÁLATOK- Vákuumszívás'),(46,'MŰSZAKI SZELLEMI MUNKÁK'),(47,'MŰSZAKI SZELLEMI MUNKÁK- CNC programírás'),(48,'MŰSZAKI SZELLEMI MUNKÁK- Grafikai szerkesztés'),(49,'MŰSZAKI SZELLEMI MUNKÁK- Műszaki tervezés'),(50,'RAGASZTÁS'),(51,'RAGASZTÁS- Fémek ragasztása'),(52,'RAGASZTÁS- Kétnemű anyag összeragasztása'),(53,'RAGASZTÁS- Műanyagok ragasztása'),(54,'RESZELÉS'),(55,'SORJÁZÁS'),(56,'SZERELÉS'),(57,'SZERELÉS- Helyszíni felszerelés'),(58,'SZERELÉS- Üzemi összeszerelés'),(59,'ÁLTALÁNOS EGYÉB MŰVELETEK'),(60,'ÜZEM TAKARÍTÁS, RENDRAKÁS');
/*!40000 ALTER TABLE `category` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `error`
--

DROP TABLE IF EXISTS `error`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `error` (
  `ID` int(11) NOT NULL AUTO_INCREMENT,
  `barcode` varchar(11) COLLATE utf8_hungarian_ci DEFAULT NULL,
  `name` varchar(200) COLLATE utf8_hungarian_ci DEFAULT NULL,
  PRIMARY KEY (`ID`)
) ENGINE=InnoDB AUTO_INCREMENT=8 DEFAULT CHARSET=utf8 COLLATE=utf8_hungarian_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `error`
--

LOCK TABLES `error` WRITE;
/*!40000 ALTER TABLE `error` DISABLE KEYS */;
INSERT INTO `error` VALUES (1,'0','Géphiba'),(2,'1','Szerszámhiba'),(3,'2','Alapanyaghiba'),(4,'3','Anyagellátási Hiba'),(5,'4','Csomagoló, -segédanyag Hiba'),(6,'5','Szervezési Hiba'),(7,'6','Egyedi Hiba');
/*!40000 ALTER TABLE `error` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `machine`
--

DROP TABLE IF EXISTS `machine`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `machine` (
  `ID` int(11) NOT NULL AUTO_INCREMENT,
  `barcode` varchar(11) COLLATE utf8_hungarian_ci DEFAULT NULL,
  `name` varchar(255) COLLATE utf8_hungarian_ci NOT NULL,
  PRIMARY KEY (`ID`)
) ENGINE=InnoDB AUTO_INCREMENT=29 DEFAULT CHARSET=utf8 COLLATE=utf8_hungarian_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `machine`
--

LOCK TABLES `machine` WRITE;
/*!40000 ALTER TABLE `machine` DISABLE KEYS */;
INSERT INTO `machine` VALUES (1,'0','Egyéb'),(2,'0','Hongyuan ZL16 homlokrakodógép'),(3,'0','Fiber Lézervágógép G3015E-22Q'),(4,'0','AMADA HFE100-3 CNC élhajlító gép'),(5,'0','Eduturn 360 CNC gép'),(6,'0','Deckel Maho DMU 80T Fém CNC'),(7,'0','Rehm Megaplus 430 WS Robothegesztő'),(8,'0','Afros B System Habosítógép'),(9,'0','Turbosol betonpumpa'),(10,'0','Zártszelvény daraboló'),(11,'0','Cinege féle vákuumformázó'),(12,'0','80 tonnás présgép'),(13,'0','50 tonnás présgép'),(14,'0','30 tonnás présgép'),(15,'0','15 tonnás présgép'),(16,'0','Resina habosítógép'),(17,'0','Canon Poliuretán Habosítógép'),(18,'0','Régi lézervágógép Powercontrol'),(19,'0','Atem vákuumformázógép'),(20,'0','ATT-1 sárga CNC gép'),(21,'0','Biko SRL B4-2528 NC  Hengerítőgép'),(22,'0','GLD (wc67k-30t1600) CNC élhajlítógép'),(23,'0','Geiss vákuumformázógép'),(24,'0','Hennecke habosítógép'),(25,'0','Hammer B3 fűrészgép'),(26,'0','VHF 1 Táblamaró'),(27,'0','Rehm Synergic Pro 220-2 Hegesztőgép'),(28,'0','Fronius Tansplus Synergic 2700 Hegesztőgép');
/*!40000 ALTER TABLE `machine` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `machine_tool`
--

DROP TABLE IF EXISTS `machine_tool`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `machine_tool` (
  `ID` int(11) NOT NULL AUTO_INCREMENT,
  `barcode` varchar(11) COLLATE utf8_hungarian_ci DEFAULT NULL,
  `machine_ID` int(11) DEFAULT NULL,
  `name` varchar(255) COLLATE utf8_hungarian_ci NOT NULL,
  PRIMARY KEY (`ID`),
  KEY `machine_ID` (`machine_ID`),
  CONSTRAINT `machine_tool_ibfk_1` FOREIGN KEY (`machine_ID`) REFERENCES `machine` (`ID`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_hungarian_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `machine_tool`
--

LOCK TABLES `machine_tool` WRITE;
/*!40000 ALTER TABLE `machine_tool` DISABLE KEYS */;
/*!40000 ALTER TABLE `machine_tool` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `manufacturing_step`
--

DROP TABLE IF EXISTS `manufacturing_step`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `manufacturing_step` (
  `ID` int(11) NOT NULL AUTO_INCREMENT,
  `barcode` varchar(11) COLLATE utf8_hungarian_ci DEFAULT NULL,
  `step_code` varchar(7) COLLATE utf8_hungarian_ci NOT NULL,
  `name` varchar(255) COLLATE utf8_hungarian_ci NOT NULL,
  `category_ID` int(11) DEFAULT NULL,
  PRIMARY KEY (`ID`),
  KEY `category_ID` (`category_ID`),
  CONSTRAINT `manufacturing_step_ibfk_1` FOREIGN KEY (`category_ID`) REFERENCES `category` (`ID`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB AUTO_INCREMENT=168 DEFAULT CHARSET=utf8 COLLATE=utf8_hungarian_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `manufacturing_step`
--

LOCK TABLES `manufacturing_step` WRITE;
/*!40000 ALTER TABLE `manufacturing_step` DISABLE KEYS */;
INSERT INTO `manufacturing_step` VALUES (1,'','MUV0399','Acéllemez hajlítás',26),(2,'','MUV0400','Acéllemez lézervágás',26),(3,'','MUV0401','Aluminium hajlítás',26),(4,'','MUV0402','Aluminium lézervágás',26),(5,'','MUV0403','Rozsdamentes lemez hajlítás',26),(6,'','MUV0404','Rozsdamentes lemez lézervágás',26),(7,'','MUV0405','Horganyzott lemez hajlítás',26),(8,'','MUV0406','Horganyzott lemez lézervágás',26),(9,'','MUV0407','MDF darabolás',14),(10,'','MUV0408','3D-s alkatrészrajz',47),(11,'','MUV0409','3D-s CNC programírás',47),(12,'','MUV0410','3D-s tervezés',49),(13,'','MUV0411','2D-s alkatrészrajz',47),(14,'','MUV0412','2D-s CNC programírás',47),(15,'','MUV0413','2D-s tervezés',49),(16,'','MUV0414','Vákuumszívás',45),(17,'','MUV0415','Darabolás',14),(18,'','MUV0416','Ragasztás',53),(19,'','MUV0417','Cimkézés',13),(20,'','MUV0418','CNC marás',43),(21,'','MUV0419','Csiszolás',11),(22,'','MUV0420','Csomagolás raklapra',12),(23,'','MUV0421','Csomagolás papírdobozba',12),(24,'','MUV0422','Csomagolás polietilén zacskóba',12),(25,'','MUV0423','Csomagolás pufi fóliába',12),(26,'','MUV0424','Csomagolás hab fóliába',12),(27,'','MUV0425','Csomagoló doboz összeállítása',12),(28,'','MUV0426','Digitális nyomtatás',16),(29,'','MUV0427','Összeszerelés',59),(30,'','MUV0428','Szerszámbeállítás',59),(31,'','MUV0429','Napi karbantartás',37),(32,'','MUV0430','Előkészítés',59),(33,'','MUV0431','Felülettisztítás',59),(34,'','MUV0432','Fólia ragasztás',12),(35,'','MUV0433','Forgácseltávolítás, tisztítás',59),(36,'','MUV0434','Formaleválasztóval bekenni a szerszámot',59),(37,'','MUV0435','Fröccsöntés',59),(38,'','MUV0436','Furat CNC-n',43),(39,'','MUV0437','Fűrészelés',59),(40,'','MUV0438','Gépjavítás',59),(41,'','MUV0439','Hab belövés',28),(42,'','MUV0440','Plexi hajlítás',42),(43,'','MUV0441','Hegesztés',31),(44,'','MUV0442','Robothegesztés',31),(45,'','MUV0443','Hengerítés',26),(46,'','MUV0444','Hígító regenerálásához betöltés',28),(47,'','MUV0445','Hőhajlítás fűtőszállal',45),(48,'','MUV0446','Hőhajlítás',45),(49,'','MUV0447','Kábelezés',59),(50,'','MUV0448','Kettévágás CNC-n',43),(51,'','MUV0449','Kézi sorjázás',11),(52,'','MUV0450','Kilökőtüskékkel a behab. darab kivétele',21),(53,'','MUV0451','Festék bekeverése, pisztolyba töltése',21),(54,'','MUV0452','Körbe marás',26),(55,'','MUV0453','Körbe marás CNC-n',43),(56,'','MUV0454','Körbevágás',26),(57,'','MUV0455','Körbevágás CNC-vel',43),(58,'','MUV0456','Laminálás',17),(59,'','MUV0457','LED vezetékgyártás',59),(60,'','MUV0458','Lézervágás',26),(61,'','MUV0459','Lyukasztás',59),(62,'','MUV0460','Matricázás',13),(63,'','MUV0461','Menetmetszés',59),(64,'','MUV0462','Menet fúrás',59),(65,'','MUV0463','CNC esztergálás',43),(66,'','MUV0464','Pácolás',45),(67,'','MUV0465','Pakolás',60),(68,'','MUV0466','Pántolás',12),(69,'','MUV0467','Popszegecselés',59),(70,'','MUV0468','Porszórás',24),(71,'','MUV0469','Portalanítás',60),(72,'','MUV0470','Sarkazás',11),(73,'','MUV0471','Sorjázás',11),(74,'','MUV0472','Stancolás',26),(75,'','MUV0473','Szerelés, javítás',56),(76,'','MUV0474','Szitakészítés',17),(77,'','MUV0475','Szitamosás',17),(78,'','MUV0476','Szitanyomás',17),(79,'','MUV0477','Védőfólia lehúzás',59),(80,'','MUV0478','Védőfóliázás mindkét oldalon',12),(81,'','MUV0479','Irányítási feladatok',59),(82,'','MUV0480','Szerszámkészítés',59),(83,'','MUV0481','Szerszám tisztítás',59),(84,'','MUV0482','Egyéb',59),(85,'','MUV0483','Teherautó pakolás',4),(86,'','MUV0484','Targoncázás',4),(87,'','MUV0485','Készárú raktárba szállítása',4),(88,'','MUV0486','Raktárrendezés',4),(89,'','MUV0487','Öntapadós matricák felragasztása',15),(90,'','MUV0488','Film készítés',20),(91,'','MUV0489','Ponyva feliratozás',20),(92,'','MUV0490','Szitasablon készítése',17),(93,'','MUV0491','Szita készítés',17),(94,'','MUV0492','Szitanyomás géppekkel',17),(95,'','MUV0493','Ecsetes kézi festés',21),(96,'','MUV0494','Magasnyomású falfestés',21),(97,'','MUV0495','Kézi hengeres festés',21),(98,'','MUV0496','Lemez hengerítés',26),(99,'','MUV0497','Lemezkorcolás',26),(100,'','MUV0498','Lemezhajlítás',26),(101,'','MUV0499','Lemez lyukasztás',26),(102,'','MUV0500','Lemez nibbelés',26),(103,'','MUV0501','Lemez préselés',26),(104,'','MUV0502','Szegecsanya behúzás',42),(105,'','MUV0503','Szegecselés',42),(106,'','MUV0504','Csiszolás géppel',11),(107,'','MUV0505','Csiszolás kézzel',11),(108,'','MUV0506','Felsőmarás kézi géppel',11),(109,'','MUV0507','Felsőmarás oszlopos felsőmaróval',11),(110,'','MUV0508','Fúrás vezetékes pisztolyfúróval',27),(111,'','MUV0509','Fúrás akkumlátoros géppel',27),(112,'','MUV0510','Fúrás oszlopos fúrógéppel',27),(113,'','MUV0511','Gépi sorjázás',55),(114,'','MUV0512','Raklap és anyagmozgatás',10),(115,'','MUV0513','Csomagoláskori tisztítás',12),(116,'','MUV0514','Gyártás közti tisztítás',59),(117,'','MUV0515','Daraboláskori tisztítás',14),(118,'','MUV0516','Belső rezsi targoncázás',4),(119,'','MUV0517','Takarítás',60),(120,'','MUV0518','Általános bemintázás',15),(121,'','MUV0519','Habosítás',28),(122,'','MUV0520','Csomagolás sztreccs fóliába',12),(123,'','MUV0521','Süllyesztés',59),(124,'','MUV0522','Csomagoló anyag darabolás',12),(125,'','MUV0523','Fuvarozás',4),(126,'','MUV0524','Vasalás',59),(127,'','MUV0528','Szórógittelés (1 réteges)',21),(128,'','MUV0529','Szórógittelés (2 réteges)',21),(129,'','MUV0530','Víz leszárítás',21),(130,'','MUV0531','Mosott termékek dobozolása',21),(131,'','MUV0532','Árnyékolás',21),(132,'','MUV0533','Tálcára pakolás',21),(133,'','MUV0534','Raklapra helyezés',21),(134,'','MUV0535','Fóliázás',21),(135,'','MUV0536','Alapozás',21),(136,'','MUV0537','Alapozás visszacsiszolása',21),(137,'','MUV0538','Színre festés',21),(138,'','MUV0539','Habfóliázás',21),(139,'','MUV0540','Élvédők felhelyezése',21),(140,'','MUV0541','Légpárnás fóliázás',21),(141,'','MUV0542','Címkézés',21),(142,'','MUV0543','Előkészítés',21),(143,'','MUV0544','Festési előkészület',21),(144,'','MUV0545','Csiszolás',21),(145,'','MUV0546','Fúrás',21),(146,'','MUV0547','Dörzsizés',21),(147,'','MUV0548','Gépi mosás/zsírtalanítás',21),(148,'','MUV0549','Kézi mosás/zsírtalanítás',21),(149,'','MUV0550','Beégetés',21),(150,'','MUV0551','Porfestés',21),(151,'','MUV0552','Festés',21),(152,'','MUV0553','Színátállás',21),(153,'','MUV0554','Gittelés',21),(154,'','MUV0555','Csomagolás',21),(155,'','MUV0556','Fillerezés',21),(156,'','MUV0557','Törlés',21),(157,'','MUV0558','Fehér műanyag alapozó keverés',21),(158,'','MUV0559','Festék keverés (Színkeverés)',21),(159,'','MUV0560','Reszelés',54),(160,'','MUV0525','PU. hab szórógitt lecsiszolása',59),(161,'','MUV0526','PU. hab szórógittelésre előkészítés',59),(162,'','MUV0527','PVC festésre előkészítés',58),(163,'','MUV0561','Kiragasztás',59),(164,'','MUV0562','Festési anyagmozgatás',21),(165,'','MUV0563','Hab be töltés',28),(166,'','MUV0564','Nútolás',27),(167,'','MUV0565','Méretre vágás',14);
/*!40000 ALTER TABLE `manufacturing_step` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `operation`
--

DROP TABLE IF EXISTS `operation`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `operation` (
  `ID` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(255) COLLATE utf8_hungarian_ci NOT NULL,
  PRIMARY KEY (`ID`)
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=utf8 COLLATE=utf8_hungarian_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `operation`
--

LOCK TABLES `operation` WRITE;
/*!40000 ALTER TABLE `operation` DISABLE KEYS */;
INSERT INTO `operation` VALUES (1,'Értékteremtő Tevékenység'),(2,'Gépbeállítás'),(3,'Karbantartás'),(4,'TMK (takarítás, Stb.)'),(5,'Szünet, Egyéb Személyes Leállás');
/*!40000 ALTER TABLE `operation` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `order`
--

DROP TABLE IF EXISTS `order`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `order` (
  `ID` int(11) NOT NULL AUTO_INCREMENT,
  `barcode` varchar(11) COLLATE utf8_hungarian_ci DEFAULT NULL,
  `order_type_ID` int(11) NOT NULL,
  `customer_number` varchar(255) COLLATE utf8_hungarian_ci DEFAULT NULL,
  `site_ID` int(11) DEFAULT NULL,
  `product_ID` int(11) DEFAULT NULL,
  `total_count` int(11) NOT NULL,
  `expected_count` int(11) NOT NULL,
  `pass_count` int(11) DEFAULT NULL,
  `fail_count` int(11) DEFAULT NULL,
  `order_status_ID` int(11) DEFAULT NULL,
  PRIMARY KEY (`ID`),
  KEY `order_type_ID` (`order_type_ID`),
  KEY `site_ID` (`site_ID`),
  KEY `product_ID` (`product_ID`),
  KEY `order_status_ID` (`order_status_ID`),
  CONSTRAINT `order_ibfk_1` FOREIGN KEY (`order_type_ID`) REFERENCES `order_type` (`ID`) ON DELETE CASCADE ON UPDATE CASCADE,
  CONSTRAINT `order_ibfk_2` FOREIGN KEY (`site_ID`) REFERENCES `site` (`ID`) ON DELETE CASCADE ON UPDATE CASCADE,
  CONSTRAINT `order_ibfk_3` FOREIGN KEY (`product_ID`) REFERENCES `product` (`ID`) ON DELETE CASCADE ON UPDATE CASCADE,
  CONSTRAINT `order_ibfk_4` FOREIGN KEY (`order_status_ID`) REFERENCES `order_status` (`ID`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB AUTO_INCREMENT=41 DEFAULT CHARSET=utf8 COLLATE=utf8_hungarian_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `order`
--

LOCK TABLES `order` WRITE;
/*!40000 ALTER TABLE `order` DISABLE KEYS */;
INSERT INTO `order` VALUES (1,'',1,'VRR01518/2021/2',2,37,100,9,0,0,1),(3,'',1,'VRR01519/2021/2',2,38,100,9,0,0,1),(4,'',1,'VRR01772/2021/2',2,169,6,6,0,0,2),(5,'',1,'VRR01778/2021/2',2,104,200,40,0,0,2),(6,'',1,'VRR01781/2021/2',2,156,200,200,0,0,2),(10,'',3,'Rezsi',2,0,0,0,0,0,2),(11,'',1,'VRR01672/2021/2',2,170,3,3,0,0,1),(12,'',1,'VRR01672/2021/2',2,170,3,3,0,0,2),(13,'',1,'VRR01820/2021/2',2,170,2,2,2,0,2),(14,'',1,'VRR01644/2021/2',2,166,5,5,5,0,2),(15,'',1,'VRR01617/2021/2',2,166,31,31,0,0,2),(16,'',1,'VRR01792/2021/2',2,158,39,0,0,0,2),(17,'',1,'VRR01807/2021/2',2,158,40,0,0,0,2),(18,'',1,'VRR01905/2021/2',2,158,10,0,0,0,2),(19,'',1,'VRR01914/2021/2',2,639,7,7,7,0,2),(20,'',1,'VRR01852/2021/2',2,640,50,50,50,0,2),(21,'',1,'VRR01851/2021/2',2,641,40,40,40,0,2),(22,'',1,'VRR01846/2021/2',2,131,12,12,12,0,2),(23,'',1,'VRR01890/2021/2',2,98,24,24,24,0,2),(24,'',1,'VRR01715/2021/2',2,125,20,20,20,0,2),(25,'',1,'VRR01893/2021/2',2,125,20,20,20,0,2),(26,'',1,'VRR01913/2021/2',2,168,40,40,0,0,2),(27,'',1,'VRR01922/2021/2',2,642,250,250,0,0,2),(28,'',1,'VRR01922/2021/2',2,643,100,100,0,0,2),(29,'',1,'VRR01721/2021/2',2,37,55,55,0,0,2),(30,'',1,'VRR01722/2021/2',2,38,65,65,0,0,2),(32,'',1,'VRR01720/2021/2',2,29,30,30,0,0,2),(33,'',1,'VRR01607/2021/2',2,23,67,67,0,0,2),(34,'',1,'VRR01606/2021/2',2,30,69,10,0,0,2),(35,'',1,'VRR01900/2021/2',2,644,32,32,32,0,2),(36,'',1,'VRR01553/2021/2',2,3,39,39,0,0,2),(37,'',1,'VRR01906/2021/2',2,161,10,10,0,0,2),(38,'',1,'VRR01800/2021/2',2,113,9,0,0,0,2),(39,'',1,'VRR01792/2021/2',2,158,39,39,0,0,2),(40,'',1,'VRR01807/2021/2',2,158,40,40,0,0,2);
/*!40000 ALTER TABLE `order` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `order_manufacturing_step`
--

DROP TABLE IF EXISTS `order_manufacturing_step`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `order_manufacturing_step` (
  `ID` int(11) NOT NULL AUTO_INCREMENT,
  `barcode` varchar(11) COLLATE utf8_hungarian_ci DEFAULT NULL,
  `order_ID` int(11) NOT NULL,
  `manufacturing_step_ID` int(11) NOT NULL,
  `expected_count` int(11) NOT NULL,
  `pass_count` int(11) DEFAULT NULL,
  `fail_count` int(11) DEFAULT NULL,
  `normal_time` float NOT NULL,
  `preparation_time` float NOT NULL,
  `unit_of_time` float NOT NULL,
  PRIMARY KEY (`ID`),
  KEY `order_ID` (`order_ID`),
  KEY `manufacturing_step_ID` (`manufacturing_step_ID`),
  CONSTRAINT `order_manufacturing_step_ibfk_1` FOREIGN KEY (`order_ID`) REFERENCES `order` (`ID`) ON DELETE CASCADE ON UPDATE CASCADE,
  CONSTRAINT `order_manufacturing_step_ibfk_2` FOREIGN KEY (`manufacturing_step_ID`) REFERENCES `manufacturing_step` (`ID`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB AUTO_INCREMENT=111 DEFAULT CHARSET=utf8 COLLATE=utf8_hungarian_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `order_manufacturing_step`
--

LOCK TABLES `order_manufacturing_step` WRITE;
/*!40000 ALTER TABLE `order_manufacturing_step` DISABLE KEYS */;
INSERT INTO `order_manufacturing_step` VALUES (1,'MUV0439-1',1,41,9,0,0,0,0,0),(2,'MUV0418-4',4,20,6,0,0,0,0,0),(4,'MUV0414-5',5,16,6,0,0,10,0,0),(7,'MUV0453-5',5,55,20,0,0,0,0,0),(9,'MUV0505-4',4,107,3,0,0,0,0,0),(10,'MUV0423-4',4,25,4,0,0,0,0,0),(12,'MUV0512-5',5,114,10,0,0,0,0,0),(16,'MUV0415-6',6,17,200,0,0,0,0,0),(17,'MUV0446-6',6,48,50,0,0,0,0,0),(18,'MUV0421-6',6,23,200,0,0,0,0,0),(19,'MUV0420-5',5,22,10,0,0,0,0,0),(28,'MUV0517-10',10,119,0,0,0,0,0,0),(29,'MUV0430-12',12,32,3,3,0,28,84,28),(30,'MUV0519-12',12,121,3,3,0,30,90,30),(31,'MUV0519-12',12,121,3,3,0,30,90,30),(32,'MUV0430-13',13,32,2,2,0,28,56,28),(33,'MUV0519-13',13,121,2,2,0,30,60,30),(34,'MUV0430-14',14,32,5,5,0,28,140,28),(35,'MUV0519-14',14,121,5,5,0,32,160,32),(36,'MUV0430-15',15,32,31,3,0,28,84,28),(37,'MUV0519-15',15,121,31,3,0,32,96,32),(38,'MUV0420-15',15,22,31,7,0,0,0,0),(39,'MUV0414-16',16,16,39,30,0,14,546,14),(40,'MUV0414-17',17,16,40,0,0,14,560,14),(41,'MUV0414-18',18,16,10,0,0,14,140,14),(42,'MUV0418-19',19,20,7,7,0,32,224,32),(43,'MUV0418-20',20,20,50,50,0,3,160,3),(44,'MUV0418-21',21,20,40,40,0,2,105,2),(46,'MUV0415-23',23,17,24,24,0,1,24,1),(47,'MUV0415-24',24,17,20,20,0,1,20,1),(48,'MUV0415-25',25,17,20,20,0,1,20,1),(49,'MUV0430-20',20,32,50,0,0,0,30,0),(50,'MUV0415-20',20,17,50,50,0,0,30,0),(51,'MUV0430-26',26,32,40,0,0,0,15,0),(52,'MUV0415-26',26,17,40,30,0,0,15,0),(53,'MUV0430-20',20,32,50,0,0,0,15,0),(54,'MUV0510-20',20,112,50,50,0,1,60,1),(55,'MUV0449-20',20,51,50,50,0,1,80,1),(56,'MUV0449-21',21,51,40,40,0,1,64,1),(57,'MUV0512-20',20,114,0,0,0,0,30,0),(58,'MUV0421-20',20,23,50,50,0,0,8,0),(59,'MUV0421-21',21,23,40,40,0,0,7,0),(60,'MUV0415-26',26,17,40,40,0,0,15,0),(61,'MUV0430-26',26,32,40,30,0,0,30,0),(62,'MUV0415-26',26,17,40,30,0,2,60,2),(63,'MUV0421-26',26,23,40,30,0,0,30,0),(64,'MUV0430-22',22,32,12,12,0,0,5,0),(65,'MUV0430-23',23,32,24,24,0,0,10,0),(66,'MUV0430-24',24,32,20,20,0,0,8,0),(67,'MUV0430-25',25,32,20,20,0,0,8,0),(70,'MUV0415-22',22,17,12,12,0,0,10,0),(71,'MUV0415-22',22,17,12,12,0,2.2,26.4,2.2),(72,'MUV0415-23',23,17,24,24,0,2.2,52.8,2.2),(73,'MUV0415-24',24,17,20,20,0,2.2,44,2.2),(74,'MUV0415-25',25,17,20,20,0,2.2,44,2.2),(75,'MUV0510-22',22,112,12,12,0,1.1,13.2,1.1),(76,'MUV0510-23',23,112,24,24,0,1.1,26.4,1.1),(77,'MUV0510-24',24,112,20,20,0,1.1,22,1.1),(78,'MUV0510-25',25,112,20,20,0,1.1,22,1.1),(79,'MUV0449-22',22,51,12,12,0,2,24,2),(80,'MUV0449-23',23,51,24,24,0,2,48,2),(81,'MUV0449-24',24,51,20,20,0,2,40,2),(82,'MUV0449-25',25,51,20,20,0,2,40,2),(83,'MUV0420-22',22,22,12,12,0,0.8,9.6,0.8),(84,'MUV0420-23',23,22,24,24,0,0.8,19.2,0.8),(85,'MUV0420-24',24,22,20,20,0,0.8,16,0.8),(86,'MUV0420-25',25,22,20,20,0,0.8,16,0.8),(87,'MUV0431-27',27,33,250,0,0,0,0,0),(88,'MUV0430-29',29,32,0,0,0,30,0,0),(89,'MUV0549-29',29,148,9,9,0,0,0,0),(90,'MUV0519-29',29,121,9,0,0,0,0,0),(91,'MUV0419-29',29,21,9,0,0,0,0,0),(92,'MUV0430-30',30,32,0,0,0,30,0,0),(93,'MUV0549-30',30,148,9,0,0,0,0,0),(94,'MUV0519-30',30,121,9,0,0,0,0,0),(95,'MUV0419-30',30,21,9,0,0,0,0,0),(96,'MUV0519-32',32,121,10,0,0,0,0,0),(97,'MUV0519-33',33,121,10,0,0,0,0,0),(98,'MUV0519-34',34,121,10,0,0,0,0,0),(99,'MUV0449-35',35,51,32,32,0,1.4,45,1.4),(100,'MUV0431-35',35,33,32,32,0,0.47,15,0.47),(101,'MUV0423-35',35,25,32,32,0,0.47,15,0.47),(102,'MUV0424-36',36,26,39,0,0,2,60,2),(103,'MUV0421-36',36,23,39,0,0,0.5,15,0.5),(104,'MUV0430-37',37,32,0,0,0,0,0,0),(105,'MUV0449-37',37,51,10,34,0,2.2,75,2.2),(106,'MUV0420-37',37,22,10,59,0,0.25,15,0.25),(107,'MUV0449-38',38,51,9,3,0,5,15,5),(108,'MUV0430-39',39,32,0,0,0,0,15,0),(109,'MUV0449-40',40,51,39,39,0,2.4,93.6,2.4),(110,'MUV0449-40',40,51,40,9,0,2.4,21.6,2.4);
/*!40000 ALTER TABLE `order_manufacturing_step` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `order_manufacturing_step_machine_error`
--

DROP TABLE IF EXISTS `order_manufacturing_step_machine_error`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `order_manufacturing_step_machine_error` (
  `ID` int(11) NOT NULL AUTO_INCREMENT,
  `order_manufacturing_step_ID` int(11) DEFAULT NULL,
  `error_ID` int(11) NOT NULL,
  `machine_ID` int(11) DEFAULT NULL,
  `machine_tool_ID` int(11) DEFAULT NULL,
  `date_start` datetime DEFAULT NULL,
  `date_end` datetime DEFAULT NULL,
  `user_ID` int(11) DEFAULT NULL,
  `description` text COLLATE utf8_hungarian_ci,
  PRIMARY KEY (`ID`),
  KEY `order_manufacturing_step_ID` (`order_manufacturing_step_ID`),
  KEY `error_ID` (`error_ID`),
  KEY `machine_ID` (`machine_ID`),
  KEY `machine_tool_ID` (`machine_tool_ID`),
  KEY `user_ID` (`user_ID`),
  CONSTRAINT `order_machine_error_ibfk_1` FOREIGN KEY (`order_manufacturing_step_ID`) REFERENCES `order_manufacturing_step` (`ID`) ON DELETE CASCADE ON UPDATE CASCADE,
  CONSTRAINT `order_machine_error_ibfk_2` FOREIGN KEY (`error_ID`) REFERENCES `error` (`ID`) ON DELETE CASCADE ON UPDATE CASCADE,
  CONSTRAINT `order_machine_error_ibfk_3` FOREIGN KEY (`machine_ID`) REFERENCES `machine` (`ID`) ON DELETE CASCADE ON UPDATE CASCADE,
  CONSTRAINT `order_machine_error_ibfk_4` FOREIGN KEY (`machine_tool_ID`) REFERENCES `machine_tool` (`ID`) ON DELETE CASCADE ON UPDATE CASCADE,
  CONSTRAINT `order_machine_error_ibfk_5` FOREIGN KEY (`user_ID`) REFERENCES `user` (`ID`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_hungarian_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `order_manufacturing_step_machine_error`
--

LOCK TABLES `order_manufacturing_step_machine_error` WRITE;
/*!40000 ALTER TABLE `order_manufacturing_step_machine_error` DISABLE KEYS */;
/*!40000 ALTER TABLE `order_manufacturing_step_machine_error` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `order_manufacturing_step_machine_tool`
--

DROP TABLE IF EXISTS `order_manufacturing_step_machine_tool`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `order_manufacturing_step_machine_tool` (
  `ID` int(11) NOT NULL AUTO_INCREMENT,
  `order_manufacturing_step_ID` int(11) DEFAULT NULL,
  `machine_ID` int(11) DEFAULT NULL,
  `machine_tool_ID` int(11) DEFAULT NULL,
  PRIMARY KEY (`ID`),
  KEY `order_manufacturing_step_ID` (`order_manufacturing_step_ID`),
  KEY `machine_ID` (`machine_ID`),
  KEY `machine_tool_ID` (`machine_tool_ID`),
  CONSTRAINT `order_machine_tool_ibfk_1` FOREIGN KEY (`order_manufacturing_step_ID`) REFERENCES `order_manufacturing_step` (`ID`) ON DELETE CASCADE ON UPDATE CASCADE,
  CONSTRAINT `order_machine_tool_ibfk_2` FOREIGN KEY (`machine_ID`) REFERENCES `machine` (`ID`) ON DELETE CASCADE ON UPDATE CASCADE,
  CONSTRAINT `order_machine_tool_ibfk_3` FOREIGN KEY (`machine_tool_ID`) REFERENCES `machine_tool` (`ID`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_hungarian_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `order_manufacturing_step_machine_tool`
--

LOCK TABLES `order_manufacturing_step_machine_tool` WRITE;
/*!40000 ALTER TABLE `order_manufacturing_step_machine_tool` DISABLE KEYS */;
/*!40000 ALTER TABLE `order_manufacturing_step_machine_tool` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `order_status`
--

DROP TABLE IF EXISTS `order_status`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `order_status` (
  `ID` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(255) COLLATE utf8_hungarian_ci NOT NULL,
  PRIMARY KEY (`ID`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8 COLLATE=utf8_hungarian_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `order_status`
--

LOCK TABLES `order_status` WRITE;
/*!40000 ALTER TABLE `order_status` DISABLE KEYS */;
INSERT INTO `order_status` VALUES (1,'Teljesített'),(2,'Folyamatban');
/*!40000 ALTER TABLE `order_status` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `order_type`
--

DROP TABLE IF EXISTS `order_type`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `order_type` (
  `ID` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(255) COLLATE utf8_hungarian_ci NOT NULL,
  PRIMARY KEY (`ID`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8 COLLATE=utf8_hungarian_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `order_type`
--

LOCK TABLES `order_type` WRITE;
/*!40000 ALTER TABLE `order_type` DISABLE KEYS */;
INSERT INTO `order_type` VALUES (1,'Gyártás'),(2,'TMK'),(3,'Rezsi');
/*!40000 ALTER TABLE `order_type` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `product`
--

DROP TABLE IF EXISTS `product`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `product` (
  `ID` int(11) NOT NULL AUTO_INCREMENT,
  `barcode` varchar(11) COLLATE utf8_hungarian_ci DEFAULT NULL,
  `article_number` varchar(8) COLLATE utf8_hungarian_ci DEFAULT NULL,
  `name` varchar(255) COLLATE utf8_hungarian_ci NOT NULL,
  PRIMARY KEY (`ID`)
) ENGINE=InnoDB AUTO_INCREMENT=645 DEFAULT CHARSET=utf8 COLLATE=utf8_hungarian_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `product`
--

LOCK TABLES `product` WRITE;
/*!40000 ALTER TABLE `product` DISABLE KEYS */;
INSERT INTO `product` VALUES (0,'0','00000/2','Rezsi termék'),(1,'0','00001/2','Hátfal poliuret. modul H155 MED (30564650)'),(2,'0','00002/2','hátfal poliuret.modul H125 MED (30564640)'),(3,'0','00017/2','Standard késtartó szerelvény (30579270)'),(4,'0','00100/1','Fénycső világítás burkolat (3622219-01)'),(5,'0','00145/2','Éjszakai fedél -0,05 ABT (855303)'),(6,'0','00146/2','Éjszakai Takaró -0,15 ABT (855304)'),(7,'0','00172/1','Műanyag ABS fehér (3652809-06)'),(8,'0','00219/2','kapcs.doboz fedél ZEUS RAL7039 (30591430)'),(9,'0','00220/2','Éjszakai fedél 624 (30590860)'),(10,'0','00221/2','hátfal poliuret.modul H175 MED (30564660)'),(11,'0','00917/1','Elpárologtató tálca Multinor 1540/80 (4023740)'),(12,'0','00938/1','Elgőzölögtető tálca Presenter 1045 (817884)'),(13,'0','01005/2','El.dug. aljzat tartó CAFA0370 (814350)'),(14,'0','01006/2','Kapcs.doboz fedél CR03/DORIS/GLY (30457340)'),(15,'0','01135/2','Levegő kilépő RAL1018 Yellow (BM3659381-03)'),(16,'0','01226/2','Hátfal poliuret.modul IVEDA (30599820)'),(17,'0','01268/2','Végfal  SX 850 poliuretán DANAOS (30600360)'),(18,'0','01306/2','Végfal DX 850 poliuretán DANAOS (30600350)'),(19,'0','01495/2','Levegő kilépő fehér festett (3659381-01)'),(20,'0','01612/2','MEDEA hátfal hungarocell tömít (30475990)'),(21,'0','01819/2','BOARD Hőformázott Vezérlőpult (30363070)'),(22,'0','01846/2','Munkapult 900 modul 1250 (30444270)'),(23,'0','01847/2','Munkapult 900 modul  937 (30444280)'),(24,'0','01848/2','Munkapult 900 modul EC45 (30475430)'),(25,'0','01849/2','Munkapult 900 modul EC90 (30475440)'),(26,'0','01850/2','Munkapult 900 modul IC45 (30475450)'),(27,'0','01852/2','Munkapult 950 modul  937 (30479130)'),(28,'0','01853/2','Munkapult 950 modul 1250 (30479150)'),(29,'0','01854/2','Munkapult 850 modul 1250 (30528000)'),(30,'0','01855/2','Munkapult 850 modul 937 (30528010)'),(31,'0','01857/2','Munkapult 850 modul EC45 (30533680)'),(32,'0','01858/2','Munkapult 850 modul EC90 (30533690)'),(33,'0','01859/2','Munkapult 850 modul IC45 (30533700)'),(34,'0','01860/2','Oldalelem, intergrált DX  750 (30553050)'),(35,'0','01861/2','Oldalelem, intergrált SX  750 (30553060)'),(36,'0','01862/2','BUFFER TUB BT CARUCCO TUB (30570850)'),(37,'','01901/2','Oldalfal Jobb (30442900)'),(38,'0','01902/2','Oldalfal bal (30442910)'),(39,'0','02213/2','ANGOL.PROT. 937 MAKROL/CABR (30700050)'),(40,'0','02230/2','Levegő kilépő Fekete (BM3659381-04)'),(41,'0','02258/2','Csepptálca (3622180-01)'),(42,'0','02566/2','ANGOL.PROT. 1250 MAKROL/CABR (30700040)'),(43,'0','02572/2','Munkapult 950 modul IC45 (30493580)'),(44,'0','02581/2','Munkapult 850 MODULE Belső sarok 30° CARUCCO SCH (30601330)'),(45,'0','02611/2','EPS Hézagoló Lem. Felső M5 Gra. Bam. Slim (4147024)'),(46,'0','02612/2','EPS Hézagoló Lem. Alsó M5 Gra. Bam. Slim (4147025)'),(47,'0','02669/2','Csepptálca (4141883)'),(48,'0','02935/2','PVC átkötő elem M6 (4148374)'),(49,'0','03055/2','A/4 kék mágneskeretes laptartó'),(50,'0','03453/1','Multinor távtartó (4036230-0369)'),(51,'0','03622/2','Takarólemez DCC COLOR (4149395V-301)'),(52,'0','03883/2','Takaró Profil Mult. 15 bérmunka (BM4150346-0369)  +B'),(53,'0','03949/2','Canopy Maxima 6 (4152620)'),(54,'0','04323/2','Védőfólia üvegre FA0412 Presenter 06 (4153204)'),(55,'0','04376/2','Kábelvezető záró ABT-CA FA0370 (851467)'),(56,'0','04442/2','WORKPLATE 900 MODULE EXT.CORNER 45 munkapult (30642560)'),(57,'0','04960/2','Takaró Profil Danfoss Multinor 20 (BM4150348-0369)'),(58,'0','04961/2','Bérmunka Takaró profil Multinor 1040/80 (BM4023305-0369)'),(59,'0','05065/2','P/LAV.850 MODULO 1250 DX B (4156883)'),(60,'0','05070/2','PROF.ANT.P/LAV.2500 BIZERB (BM4156886)'),(61,'0','05071/2','PROF.POST.P/LAV.2500 BIZERB (BM4156885)'),(62,'0','05073/2','PROF.POST.P/LAV.3750 BIZER (BM4156953)'),(63,'0','05074/2','PROF.ANT.P/LAV.3750 BIZERB (BM4156971)'),(64,'0','05154/2','Tetőprofil 1250 CABRIO CRF C Marás, megmunkálás díja (BM30654100)'),(65,'0','05260/2','Végfal BAL 850 Poliuretán DANAOS CARUCCO Végfal SZÍNES (30600360V-233)'),(66,'0','05261/2','Végfal BAL 850 Poliuretán DANAOS CARUCCO Végfal SZÍNES (30600360V-301)'),(67,'0','05262/2','Végfal JOBB 850  Poliuretán DANAOS CARUCCO Végfal SZÍNES (30600350V-301)'),(68,'0','05288/1','Védőfólia üvegre jobb Presenter 06 S (4063510)'),(69,'0','05289/1','Védőfólia üvegre bal Presenter 06S (4063511)'),(70,'0','05373/2','burkolat (4155609)'),(71,'0','05553/2','Végfal JOBB 850  Poliuretán DANAOS CARUCCO Végfal SZÍNES (30600350V-104)'),(72,'0','05554/2','Végfal BAL 850 Poliuretán DANAOS CARUCCO Végfal SZÍNES (30600360V-104)'),(73,'0','05619/2','Takarólemez DCC COLOR RAL9006 (4149395V-006)'),(74,'0','06143/2','PROF.ANT.P/LAV.3750 SX BIZERBA (BM4156975)'),(75,'0','06180/2','Head Prof.Front Face Prof.Crio (BM30525940V-104)'),(76,'0','06181/2','Oldalelem MDT MEDEA BAL 750/1875 (30591240)'),(77,'0','06287/2','PROF.POST.P/LAV.3750 SX BIZERBA (BM4156959)'),(78,'0','06288/2','OLDALFAL JOBB CROWN END SEMIVERT 750/1875 SZÍNES CAR Végfal (30591230V-104)'),(79,'0','06289/2','OLDALFAL BAL CROWN END SEMIVERT 750/1875 SZÍNES CAR Végfal (30591240V-104)'),(80,'0','06291/2','Végfal JOBB 850  Poliuretán DANAOS CARUCCO Végfal SZÍNES (30600350V-006)'),(81,'0','06337/2','Végfal BAL 850 Poliuretán DANAOS CARUCCO Végfal SZÍNES (30600360V-006)'),(82,'0','06389/2','Élvédő ovális lábburkolat panelhez Kivágás díja (BM30617800)'),(83,'0','06661/2','Végfal JOBB 850  Poliuretán DANAOS CARUCCO Végfal SZÍNES (30600350V-233)'),(84,'0','06681/1','Fedél (4068513-0369)'),(85,'0','06806/2','Head Prof.Front Face Prof.Crio Festés díja (BM30525940V-301)'),(86,'0','07365/2','Prof.Corn.ALL.IN.FiancataMobDiTCarucco 750 Marás díja 958,5mm (BM30587070)'),(87,'0','07443/2','SZER.VÁGÓDESZKA FEHÉR (4164532)'),(88,'0','07457/2','Front Profil OPTIMER 19 LG E6 OEM 1793 mm Darabolás, marása díja (BM4162267-0632)'),(89,'0','07628/2','Prof. Corn. ALL.IN. Fiancata Mob Di Tes Carucco 1099 mm (BM30587060)'),(90,'0','07659/2','OLDALFAL JOBB CROWN END SEMIVERT 750/1875 SZÍNES CAR Végfal (30591230V-301)'),(91,'0','07660/2','OLDALFAL BAL CROWN END SEMIVERT 750/1875 SZÍNES CAR Végfal (30591240V-301)'),(92,'0','07702/2','TEST.PROF.CORN.CRIOS.MZD C (BM30525940V-017)'),(93,'0','07859/2','OLDALFAL JOBB CROWN END SEMIVERT 750/1875 SZÍNES CAR Végfal (30591230V-126)'),(94,'0','07860/2','OLDALFAL BAL CROWN END SEMIVERT 750/1875 SZÍNES CAR Végfal (30591240V-126)'),(95,'0','07872/2','Végfal JOBB 850  Poliuretán DANAOS CARUCCO Végfal SZÍNES (30600350V-266)'),(96,'0','08003/1','Olvadékvíz gyűjtő Optimer 19 L (4064870)'),(97,'0','08021/2','Takaró profil Danfoss Multinor 10 (BM4168477-0369)'),(98,'0','08024/2','Front Profil OPTIMER 13 LG E6 OEM 1168 mm Darabolás, marása díja (BM4160757-0632)'),(99,'0','08026/2','Végfal BAL 850 Poliuretán DANAOS CARUCCO Végfal SZÍNES (30600360V-017)'),(100,'0','08106/1','Presenter 06 Csepptálca (872707)'),(101,'0','08131/2','Végfal JOBB 850  Poliuretán DANAOS CARUCCO Végfal SZÍNES (30600350V-017)'),(102,'0','08223/1','Csepptálca Optimer 19 L (4066081)'),(103,'0','08276/2','Végfal JOBB 850  Poliuretán DANAOS CARUCCO Végfal SZÍNES (30600350V-123)'),(104,'0','08329/1','Csepptálca Optimer 13 L (4067105)'),(105,'0','08342/2','Üveglap elülső OPT13 LG 80x1162mm (4169402)'),(106,'0','08343/2','Végfal BAL 850 Poliuretán DANAOS CARUCCO Végfal SZÍNES (30600360V-266)'),(107,'0','08379/2','PROF.POST.P/LAV.625 BIZERBA (BM4156960)'),(108,'0','08394/2','Végfal JOBB 850  Poliuretán DANAOS CARUCCO Végfal SZÍNES (30600350V-163)'),(109,'0','08395/2','Végfal BAL 850 Poliuretán DANAOS CARUCCO Végfal SZÍNES (30600360V-163)'),(110,'0','08556/2','Végfal JOBB 850  Poliuretán DANAOS CARUCCO Végfal SZÍNES (30600350V-126)'),(111,'0','08557/2','Végfal BAL 850 Poliuretán DANAOS CARUCCO Végfal SZÍNES (30600360V-126)'),(112,'0','08982/2','SZER.MÁGNESES KÉSTARTÓ ALSÓ RÉSZ (4164547)'),(113,'0','09371/2','Takaró éjszakai 312 Carucco Tu (30590870)'),(114,'0','09596/2','Végfal SX 850 Hera PVC (30701870V-301)'),(115,'0','09600/2','Front Profil OPTIMER 19 LG E6 OEM 1793 mm Darabolás, marása díja (BM4162267-9005)'),(116,'0','09601/2','Front Profil OPTIMER 25 LG E6 OEM 2338 mm Darabolás, marása díja (BM4162286-0632)'),(117,'0','09602/2','Head Prof.Front Face Prof.Crio (BM30525940V-123)'),(118,'0','09647/2','OLDALFAL BAL CROWN END SEMIVERT 750/1875 SZÍNES CAR Végfal (30591240V-123)'),(119,'0','09671/2','OLDALFAL JOBB CROWN END SEMIVERT 750/1875 SZÍNES CAR Végfal (30591230V-123)'),(120,'0','09717/2','Front Profil OPTIMER 13 LG E6 OEM 1168 mm Darabolás, marása díja (BM4160757-9005)'),(121,'0','09885/2','Végfal festés (4143105)'),(122,'0','10219/2','Front Profil OPTIMER 09 LG E6 OEM  803 mm Darabolás, marása díja (BM4162295-9005)'),(123,'0','10373/2','Oldalmerevítő burkolat COP. MONTANT E LAT CABRIO CA Marás díja (BM30649940)'),(124,'0','10405/2','Ütköző végfalhoz FA0369 megmunkálási díja (BM4029318-0369)'),(125,'0','10448/2','Front Profil OPTIMER 25 LG E6 OEM 2338 mm Darabolás, marása díja (BM4162286-9005)'),(126,'0','10547/2','Végfal JOBB 850  Poliuretán DANAOS CARUCCO Végfal SZÍNES (30600350V-187)'),(127,'0','10548/2','Végfal BAL 850 Poliuretán DANAOS CARUCCO Végfal SZÍNES (30600360V-187)'),(128,'0','10590/1','Csepptálca Drip tray (3622569-01)'),(129,'0','10620/2','Kaufland profil L=3750 TUBO OVALE AP. Megmunkálás díja(BM30702680)'),(130,'0','10704/2','Oldalmerevítő burkolat COP. MONTANT E CX CABRIO CA Marás díja (BM30649950)'),(131,'0','10800/2','Front Profil OPTIMER 09 LG E6 OEM  803 mm Darabolás, marása díja (BM4162295-0632)'),(132,'0','10949/2','Takarólemez DCC COLOR (4149395V-233)'),(133,'0','10984/2','Head Prof.Front Face Prof.Crio Festés díja (BM30525940V-266)'),(134,'0','11282/2','850 hab modul RC90 (4177503)'),(135,'0','11283/2','Furatolt jobbos hab modul (4175081)'),(136,'0','11284/2','Furatolt balos hab modul (4175082)'),(137,'0','11378/1','Szellőzőrács FV  fekete mech. (4010205-01)'),(138,'0','11666/2','Alu. profil Cornice 2210 mm Megmunkálás díja (BM30526140)'),(139,'0','11840/1','Címke: \"óvatosan, forró!\" (4186681)'),(140,'0','11865/2','Front panel profil L=1793mm Megmunkálás díja (BM4157507-0632)'),(141,'0','11866/2','Front panel profil L=1793mm Megmunkálás díja (BM4157507-9005)'),(142,'0','11867/2','Front panel profil L=2338mm Megmunkálás díja (BM4158906-0632)'),(143,'0','11869/2','Front panel profil L=803mm Megmunkálás díja (BM4157502-9005)'),(144,'0','11870/2','Front panel profil L=1168mm Megmunkálás díja (BM4149208-0632)'),(145,'0','11871/2','Front panel profil L=1168 Megmunkálás díja (BM4149208-9005)'),(146,'0','12076/2','Takaró Profil MUL 25 DANFOSS Bérmunka (BM4180217-0369)'),(147,'0','12088/2','Head Prof.Front Face Prof.Crio (BM30525940V)'),(148,'0','12325/2','Front panel profil L=2338mm Megmunkálás díja (BM4158906-9005)'),(149,'0','12378/1','R290 Areor tartó (3627182-01)'),(150,'0','12451/2','Kirakótálca (4177362)'),(151,'0','12682/2','OLDALFAL JOBB CROWN END SEMIVERT 750/1875 SZÍNES CAR Végfal (30591230V-266)'),(152,'0','12683/2','OLDALFAL BAL CROWN END SEMIVERT 750/1875 SZÍNES CAR Végfal (30591240V-266)'),(153,'0','13083/1','Kaufland profil L=2500 TUBO OVALE AP. (BM30702690)'),(154,'0','13085/1','Kaufland profil L=1250 mm TUBO OVALE AP. (BM30702710)'),(155,'0','13086/1','Kaufland profil L= TUBO OVALE AP. (BM30702720)'),(156,'0','13128/1','Toldatcső III habosításhoz (3623652-02)'),(157,'0','13245/1','Csepptálca Optimer 19LG R290 (4100683)'),(158,'0','13554/1','Csepptálca Optimer 13 LG R290 (4102214)'),(159,'0','13834/1','Üveglap 80x830 mm (382035)'),(160,'0','13838/1','R290 Areor tartó (3627181-01)'),(161,'0','13955/1','Csepptálca Optimer 09 L R290 (4076591)'),(162,'0','13960/1','Üveglap 130x1050 mm (381757)'),(163,'0','13963/1','Árumegállító plexi 80x1248 mm (833104)'),(164,'0','13992/2','Csepptálca Elgözölögtető EASY CUBE (4183593)'),(165,'0','14015/1','Szellőzőrács FV550 Jobb Fekete Danfoss (4010205-17)'),(166,'0','14031/2','SZER.ALVÁZ RAL9005 ARTEMIS (4183976-9005)'),(167,'0','14078/1','Artemis Habosított test RAL9005 (3626731-01)'),(168,'0','14102/2','Sarok elem FA0369 L=391 Multinor (BM4073424-0369)'),(169,'0','14154/1','Takaró profil H-H kétirányú Aeror (3627031-01)'),(170,'0','14156/1','Artemis Habosított test RAL7042 (30420790)'),(171,'0','14224/1','Üveglap első 80x780 mm (4108153)'),(172,'0','14414/2','Kézkorlát fúrt Megmunkálás díja (BM4018283-0369)'),(173,'0','14461/2','HÁTSÓ MUNKAPULT KERET L=484 (951239)'),(174,'0','15099/2','Végfal JOBB 850  Poliuretán DANAOS CARUCCO Végfal SZÍNES (30600350V-173)'),(175,'0','15100/2','Végfal BAL 850 Poliuretán DANAOS CARUCCO Végfal SZÍNES (30600360V-173)'),(176,'0','15506/2','SZER.ALVÁZ RAL7042 ARTEMIS (4183976-7042)'),(177,'0','15509/2','Csepptálca (Elgözölögtető) Optimer 13 L (4192463)'),(178,'0','15514/2','VÉGFAL JOBB 75H MEDEA PVC (4191334V-123)'),(179,'0','15516/2','VÉGFAL JOBB 75H MEDEA PVC (4191334V-233)'),(180,'0','15517/2','VÉGFAL JOBB 75H MEDEA PVC (4191334V-266)'),(181,'0','15518/2','VÉGFAL JOBB 75H MEDEA PVC (4191334V-301)'),(182,'0','15520/2','VÉGFAL BAL 75H MEDEA PVC (4191335V-123)'),(183,'0','15522/2','VÉGFAL BAL 75H MEDEA PVC (4191335V-233)'),(184,'0','15523/2','VÉGFAL BAL 75H MEDEA PVC (4191335V-266)'),(185,'0','15524/2','VÉGFAL BAL 75H MEDEA PVC (4191335V-301)'),(186,'0','15531/2','VÉGFAL JOBB 90H MEDEA FLAT PVC (4191392V-123)'),(187,'0','15532/2','VÉGFAL BAL 90H MEDEA FLAT PVC (4191393V-123)'),(188,'0','15533/2','VÉGFAL JOBB 75H MED.TT ENH PVC (4192335V-126)'),(189,'0','15534/2','VÉGFAL BAL 75H MED.TT ENH PVC (4192336V-126)'),(190,'0','15700/2','VÉGFAL JOBB 85/90H DAN.TT PVC (4191338V-015)'),(191,'0','15701/2','VÉGFAL JOBB 85/90H DAN.TT PVC (4191338V-301)'),(192,'0','15703/2','VÉGFAL BAL 85/90H DAN.TT PVC (4191339V-015)'),(193,'0','15704/2','VÉGFAL BAL 85/90H DAN.TT PVC (4191339V-301)'),(194,'0','15705/2','VÉGFAL JOBB 85H DAN.FLAT E5 TÜKÖRREL PVC (4191372V-301)'),(195,'0','15706/2','VÉGFAL JOBB 90H MEDEA FLAT PVC (4191392V-301)'),(196,'0','15707/2','VÉGFAL BAL 90H MEDEA FLAT PVC (4191393V-301)'),(197,'0','15761/2','VÉGFAL JOBB 85/90H DAN.TT PVC (4191338V-187)'),(198,'0','15762/2','VÉGFAL JOBB 85H MED.TT PVC (4191651V-015)'),(199,'0','15763/2','KERET PVC HAB ML9 (951323)'),(200,'0','15764/2','VÉGFAL JOBB 85/90H DAN.TT PVC (4191338V-126)'),(201,'0','15767/2','Cabrio LED Profile 2500 New Marás és megmunkálás díja (BM4189783)'),(202,'0','15768/2','Cabrio LED Profile 3750 New Marás és megmunkálás díja (BM4189784)'),(203,'0','15769/2','Cabrio LED Profile 1250 New Marás és megmunkálás díja (BM4189781)'),(204,'0','15770/2','Cabrio LED Profile 1875 New Marás és megmunkálás díja (BM4189782)'),(205,'0','15781/2','VÉGFAL BAL 85/90H DAN.TT PVC (4191339V-187)'),(206,'0','15782/2','VÉGFAL BAL 85/90H DAN.TT PVC (4191339V-126)'),(207,'0','15783/2','VÉGFAL BAL 85H DAN.FLAT E5 TÜKÖRREL PVC (4191373V-301)'),(208,'0','15784/2','VÉGFAL BAL 85H MED.TT PVC (4191652V-015)'),(209,'0','15788/2','VÉGFAL JOBB 75H MED.TT PVC (4191344V-015)'),(210,'0','15824/2','VÉGFAL BAL 85H MED.TT PVC (4191652V-045)'),(211,'0','15826/2','VÉGFAL JOBB 75H MEDEA PVC (4191334V-015)'),(212,'0','15827/2','VÉGFAL BAL 75H MEDEA PVC (4191335V-015)'),(213,'0','15851/2','Végfal JOBB 850  Poliuretán DANAOS CARUCCO Végfal SZÍNES (30600350V-194)'),(214,'0','15852/2','Végfal BAL 850 Poliuretán DANAOS CARUCCO Végfal SZÍNES (30600360V-194)'),(215,'0','15960/2','Front panel profil L=1168mm Megmunkálás díja (BM4149208-7016)'),(216,'0','16015/2','TAKARÓ PLEXI CE 90H TT (4194630)'),(217,'0','16045/2','HÁTSÓ MUNKAPULT KERET (951274)'),(218,'0','16109/2','Front Profil OPTIMER 13 LG E6 OEM 1168 mm Darabolás, marása díja (BM4160757-7016)'),(219,'0','16110/2','Front panel profil L=1793mm Megmunkálás díja (BM4157507-7016)'),(220,'0','16111/2','Front Profil OPTIMER 19 LG E6 OEM 1793 mm Darabolás, marása díja (BM4162267-7016)'),(221,'0','16112/2','Front panel profil L=2338mm Megmunkálás díja (BM4158906-7016)'),(222,'0','16113/2','Front Profil OPTIMER 25 LG E6 OEM 2338 mm Darabolás, marása díja (BM4162286-7016)'),(223,'0','16140/2','TEMP. OLDAL ÜVEG TÜKRÖS 400 DAN. TT (4190354)'),(224,'0','16153/2','VÉGFAL BAL 75H MED.TT PVC (4191345V-015)'),(225,'0','16169/2','Front Profil OPTIMER 09 LG E6 OEM  803 mm Darabolás, marása díja (BM4162295-7016)'),(226,'0','16171/2','KONZOL CUVE ML2-- (951238)'),(227,'0','16172/2','KERET PVC HAB MN9 (951973)'),(228,'0','16504/2','VÉGFAL JOBB 75H MED.TT PVC (4191344V-126)'),(229,'0','16505/2','VÉGFAL BAL 75H MED.TT PVC (4191345V-126)'),(230,'0','16611/2','VÉGFAL JOBB 90H MED. TT ENH PVC (4192344V-126)'),(231,'0','16612/2','VÉGFAL BAL 90H MED. TT ENH PVC (4192345V-126)'),(232,'0','16630/2','VÉGFAL JOBB 95H CRF PVC (4191376V-301)'),(233,'0','16631/2','VÉGFAL BAL 95H CRF PVC (4191381V-301)'),(234,'0','16777/2','VÉGFAL JOBB 90H MEDEA FLAT PVC (4191392V-266)'),(235,'0','16778/2','VÉGFAL BAL 90H MEDEA FLAT PVC (4191393V-266)'),(236,'0','16797/2','Head Prof.Front Face Prof.Crio Festés díja (BM30525940V-273)'),(237,'0','16955/2','SZER. HŰTÖTT FIÓK (4189359)'),(238,'0','16968/2','VÉGFAL BAL 85H MED.TT PVC (4191652V-163)'),(239,'0','16969/2','VÉGFAL JOBB 85H MED.TT PVC (4191651V-163)'),(240,'0','16970/2','LEMEZ MOR-15 FA9005 (4197070-9005)'),(241,'0','17056/2','Front Profil OPT.13  E6 1168 mm Darabolása, marása(BM4194300-9005)'),(242,'0','17068/2','Front panel profil L=803mm Megmunkálás díja (BM4157502-7016)'),(243,'0','17419/2','Végfal BAL 850 Poliuretán DANAOS CARUCCO Végfal SZÍNES (30600360V-075)'),(244,'0','17423/2','VÉGFAL BAL 90H MEDEA FLAT PVC (4191393V-006)'),(245,'0','17424/2','VÉGFAL JOBB 85/90H DAN.TT PVC (4191338V-233)'),(246,'0','17541/2','VÉGFAL JOBB 75H DAN.TT PVC (4191340V-015)'),(247,'0','17663/2','Zöld színű vészkioldós nyakpánt'),(248,'0','17802/2','Takarólemez DCC COLOR (4149395V-104)'),(249,'0','17865/2','VÁGÓDESZKA 600x300 RAL6032 (4191367)'),(250,'0','17933/2','LEMEZ MOR-20 FA9005 (4197072-9005)'),(251,'0','17934/2','LEMEZ MOR-15 FA9005 (4198313-9005)'),(252,'0','17936/2','LEMEZ MOR-20 FA9005 (4198314-9005)'),(253,'0','18232/2','Méhsejt átalakítás Bérmunka (BM4197103)'),(254,'0','18432/2','VÉGFAL BAL 90H M2 ES PVC (4197096V-006)'),(255,'0','18433/2','VÉGFAL CX 90H M2 ES PVC (4197097V-006)'),(256,'0','18435/2','VÉGFAL JOBB 85H MED.TT PVC (4191651V-301)'),(257,'0','18471/2','VÉGFAL BAL 85H MED.TT PVC (4191652V-301)'),(258,'0','18494/2','VÉGFAL BAL 85/90H DAN.TT PVC (4191339V-123)'),(259,'0','18549/2','VÉGFAL JOBB 75H MED. LOW ENHANCED PVC (4199346V-126)'),(260,'0','18550/2','VÉGFAL BAL 75H MED. LOW ENHANCED PVC (4199347V-126)'),(261,'0','18757/2','VÉGFAL JOBB 90H MEDEA FLAT PVC (4191392V-126)'),(262,'0','18858/2','VÉGFAL BAL 90H M2 ES RAL9003 (4197096A)'),(263,'0','18859/2','VÉGFAL JOBB 85H DAN ES RAL9003 (2019120600)'),(264,'0','19005/2','KÖZTES OLDALFAL EASY OPENING (2020011300)'),(265,'0','19022/2','VÉGFAL JOBB 90H MEDEA FLAT PVC (4191392V-006)'),(266,'0','19023/2','VÉGFAL BAL 85H MED.TT PVC (4191652V-017)'),(267,'0','19024/2','VÉGFAL JOBB 90H CE MED. TT PVC (4194346V-017)'),(268,'0','19025/2','VÉGFAL BAL 90H CE MED. TT PVC (4194347V-017)'),(269,'0','19026/2','VÉGFAL JOBB 85H MED.TT PVC (4191651V-017)'),(270,'0','19039/2','VÉGFAL JOBB 85H DAN. FLAT TÜKRÖS PVC (4191342V-301)'),(271,'0','19040/2','VÉGFAL BAL 85H DAN. FLAT TÜKRÖS PVC (4191343V-301)'),(272,'0','19041/2','VÉGFAL JOBB 75H MEDEA PVC (4191334V-091)'),(273,'0','19042/2','VÉGFAL BAL 75H MEDEA PVC (4191335V-091)'),(274,'0','19088/2','VÉGFAL JOBB 75H DAN.FRA PVC (4193431V-266)'),(275,'0','19089/2','VÉGFAL BAL 75H DAN.FRA PVC (4193432V-266)'),(276,'0','19108/2','Medea Gen2 oldalfal festése'),(277,'0','19109/2','Medea Gen cladding'),(278,'0','19128/2','KÖZTES OLDALFAL EASY OPENING (2020011300_A)'),(279,'0','19151/2','MEDEA GEN2 GS 250ST GD  lemez alkatrészek'),(280,'0','19228/2','LAMINÁLT PVC BURKOLAT JOBB-BAL szett (FAO11010967_OLDAL)'),(281,'0','19237/2','VÉGFAL JOBB 85/90H DAN.TT PVC (4191338V-017)'),(282,'0','19238/2','VÉGFAL BAL 85/90H DAN.TT PVC (4191339V-017)'),(283,'0','19307/2','LAMINÁLT PVC BURKOLAT JOBB-BAL szett (FAO11010923_OLDAL)'),(284,'0','19355/2','VÉGFAL JOBB 90H MEDEA CRF ÜVEGGEL PVC (4191374V-017)'),(285,'0','19356/2','LAMINÁLT PVC BURKOLAT JOBB-BAL szett (FAO11011127_OLDAL)'),(286,'0','19579/2','VÉGFAL BAL 90H MEDEA FLAT PVC (4191393V-075)'),(287,'0','19597/2','Végfal JOBB 850  Poliuretán DANAOS CARUCCO Végfal SZÍNES (30600350V-075)'),(288,'0','19601/2','LAMINÁLT PVC BURKOLAT JOBB-BAL szett (FAO11011085_OLDAL)'),(289,'0','19633/2','OLDALFAL JOBB CROWN END SEMIVERT 750/1875 SZÍNES CAR Végfal (30591230V-274)'),(290,'0','19634/2','OLDALFAL BAL CROWN END SEMIVERT 750/1875 SZÍNES CAR Végfal (30591240V-274)'),(291,'0','19728/2','VÉGFAL JOBB 75H MEDEA PVC (4191334V-075)'),(292,'0','19729/2','VÉGFAL BAL 75H MEDEA PVC (4191335V-075)'),(293,'0','19730/2','Távtartó (3658166-01)'),(294,'0','19737/2','Polc elválasztó (4093870)'),(295,'0','19738/2','Polc elválasztó (4104772)'),(296,'0','19739/2','Polc elválasztó (4104774)'),(297,'0','19740/2','PLEXI POST.S6X505X645 DANA (30656220)'),(298,'0','19760/2','VÉGFAL JOBB 85/90H DAN.TT PVC (4191338V-123)'),(299,'0','19828/2','LAMINÁLT PVC BURKOLAT JOBB-BAL szett (FAO11011240_OLDAL)'),(300,'0','19829/2','LAMINÁLT PVC BURKOLAT JOBB-BAL szett (FAO11011238_OLDAL)'),(301,'0','20150/2','VÉGELEM TOP JOBB 85H ST M2 (4196654V-006)'),(302,'0','20151/2','VÉGELEM TOP BAL 85H ST M2 (4196655V-006)'),(303,'0','20152/2','VÉGFAL JOBB 85H M2 (4196648V-006)'),(304,'0','20153/2','VÉGFAL BAL 85H M2 (4196649V-006)'),(305,'0','20154/2','VÉGELEM MID ST M2 (4201711V-006)'),(306,'0','20172/2','HAB MODUL TETŐHÖZ 1875 M2 (4196794)'),(307,'0','20211/2','VÉGFAL JOBB 85H DAN.TT ENH PVC (4192330V-301)'),(308,'0','20212/2','VÉGFAL BAL 85H DAN.TT ENH PVC (4192331V-301)'),(309,'0','20249/2','VÉGELEM TOP JOBB 85H SD M2 (4196652V-194)'),(310,'0','20249/2','VÉGELEM TOP JOBB 85H SD M2 (4196652V-194)'),(311,'0','20250/2','VÉGELEM TOP BAL 85H SD M2 (4196653V-194)'),(312,'0','20251/2','VÉGELEM MID SD M2 (4201736V-194)'),(313,'0','20252/2','VÉGELEM TOP JOBB 85H ST M2 (4196654V-194)'),(314,'0','20253/2','VÉGELEM TOP BAL 85H ST M2 (4196655V-194)'),(315,'0','20254/2','VÉGELEM MID ST M2 (4201711V-194)'),(316,'0','20255/2','VÉGFAL JOBB 85H M2 (4196648V-194)'),(317,'0','20256/2','VÉGFAL BAL 85H M2 (4196649V-194)'),(318,'0','20318/2','VÉGFAL TÜKÖRREL JOBB 90H AP. PVC(4201708V-301)'),(319,'0','20319/2','VÉGFAL TÜKÖRREL BAL 90H AP. PVC(4201709V-301)'),(320,'0','20320/2','HAB MODUL TETŐHÖZ 1250 M2 (4196793)'),(321,'0','20328/2','PVC OLDALFAL JOBB-BAL szett (FAO11011367_OLDAL)'),(322,'0','20329/2','PVC OLDALFAL JOBB-BAL szett (FAO11011387_OLDAL)'),(323,'0','20330/2','Csomagolás'),(324,'0','20361/2','Carrier oval frosted hatású matrica'),(325,'0','20379/2','VÉGFAL BAL 90H MEDEA FLAT PVC (4191393V-126)'),(326,'0','20653/2','PVC OLDALFAL JOBB-BAL szett (FAO11011496_OLDAL)'),(327,'0','20708/2','VÉGFAL JOBB 75H DAN.TT PVC (4191340V-163)'),(328,'0','20709/2','VÉGFAL BAL 75H DAN.TT PVC (4191341V-163)'),(329,'0','20711/2','PVC OLDALFAL JOBB-BAL szett (FAO11011570_OLDAL)'),(330,'0','20740/2','PVC OLDALFAL JOBB-BAL szett (FAO11011517_OLDAL)'),(331,'0','20812/2','VÉGFAL JOBB 75H MEDEA PVC (4191334V-230)'),(332,'0','20813/2','VÉGFAL BAL 75H MEDEA PVC (4191335V-230)'),(333,'0','20932/2','VÉGFAL JOBB 75H MEDEA PVC (4191334V-163)'),(334,'0','20933/2','VÉGFAL BAL 75H MEDEA PVC (4191335V-163)'),(335,'0','20973/2','Lemez felszerelve 4 görgővel szerelt guruló 1800mm magas fehér színes porfestett táblatartóval'),(336,'0','21011/2','VÉGFAL JOBB 75H MED.TT PVC (4191344V-045)'),(337,'0','21012/2','VÉGFAL BAL 75H MED.TT PVC (4191345V-045)'),(338,'0','21099/2','Head Prof.Front Face Prof.Crio (BM30525940V-274)'),(339,'0','21102/2','VÉGFAL JOBB 75H MEDEA PVC(4191334V-126  )'),(340,'0','21103/2','VÉGFAL BAL 75H MEDEA PVC (4191335V-126)'),(341,'0','21150/2','Profil Optimer 19 LSG E6 OEM darabolás, marás (BM4202546-9005)'),(342,'0','21492/2','Végfal JOBB PVC (4198955V-123)'),(343,'0','21493/2','Végfal BAL PVC (4198962V-123)'),(344,'0','21609/2','VÉGFAL JOBB 90H MEDEA FLAT PVC (4191392V-273)'),(345,'0','21610/2','VÉGFAL BAL 90H MEDEA FLAT PVC (4191393V-273)'),(346,'0','21611/2','Végfal JOBB PVC (4198955V-233)'),(347,'0','21612/2','Végfal BAL PVC (4198962V-233)'),(348,'0','21619/2','VÉGFAL JOBB 75H MEDEA PVC (4191334V-104)'),(349,'0','21620/2','VÉGFAL BAL 75H MEDEA PVC (4191335V-104)'),(350,'0','21766/2','VÉGFAL JOBB 75H MED. LOW ENHANCED PVC (4199346V-233)'),(351,'0','21767/2','VÉGFAL BAL 75H MED. LOW ENHANCED PVC (4199347V-233)'),(352,'0','21781/2','Canopy hab teszt'),(353,'0','21782/2','HAB MODUL OLDAL (4201718)'),(354,'0','21871/2','VÉGFAL BAL 85H CB MED.ENHA PVC (4198988V-233)'),(355,'0','21872/2','VÉGFAL JOBB FIAN. MEDEA 750 CE COLOR PVC (4181988V-123)'),(356,'0','21873/2','VÉGFAL BAL FIAN. MEDEA 750 CE COLOR PVC (4181989V-123)'),(357,'0','22054/2','VÉGFAL JOBB FIAN. MEDEA 750 CE COLOR PVC (4181988V-266)'),(358,'0','22055/2','VÉGFAL BAL FIAN. MEDEA 750 CE COLOR PVC (4181989V-266)'),(359,'0','22056/2','VÉGFAL JOBB 75H MEDEA PVC (4191334V-017)'),(360,'0','22057/2','VÉGFAL BAL 75H MEDEA PVC (4191335V-017)'),(361,'0','22058/2','VÉGFAL JOBB 75H MEDEA PVC (4191334V-187)'),(362,'0','22068/2','VÉGFAL JOBB 90H MEDEA FLAT PVC (4191392V-194)'),(363,'0','22105/2','HAB MODUL OLDAL (4208230)'),(364,'0','22163/2','VÉGFAL JOBB 85H MED.TT PVC (4191651V-187)'),(365,'0','22225/2','VÉGFAL JOBB 75H DAN.TT PVC (4191340V-017)'),(366,'0','22226/2','VÉGFAL BAL 75H DAN.TT PVC (4191341V-017)'),(367,'0','22246/2','Vákuumszívott anyag minta PS-ből'),(368,'0','22255/2','Tartó T17 telszkópos szett'),(369,'0','22260/2','844877 Leürítő tálca vákkumformázó szerszám'),(370,'0','22277/2','Sárga színű nyakpánt, Carrier logóval, biztonsági csattal és fém karabinerrel'),(371,'0','22336/2','VÉGFAL JOBB 85/90H DAN.TT PVC (4191338V-266)'),(372,'0','22337/2','VÉGFAL BAL 85/90H DAN.TT PVC (4191339V-266)'),(373,'0','22339/2','OLDALFAL JOBB CROWN END SEMIVERT 750/1875 SZÍNES CAR Végfal (30591230V-233)'),(374,'0','22340/2','OLDALFAL BAL CROWN END SEMIVERT 750/1875 SZÍNES CAR Végfal (30591240V-233)'),(375,'0','22348/2','Leürítő tálca (844877)'),(376,'0','22349/2','PAPÍRTARTÓ TÁLCA (4163111)'),(377,'0','22353/2','KÁBELCSATORNA TAKARÓLEMEZZEL 1510LG. (4144116)'),(378,'0','22354/2','KÁBELCSATORNA TAKARÓLEMEZZEL 870LG. (4144115)'),(379,'0','22355/2','KÁBELCSATORNA TAKARÓLEMEZZEL1100LG. (4143984)'),(380,'0','22356/2','KÁBELCSATORNA TAKARÓLEMEZZEL 1740LG. (4143986)'),(381,'0','22358/2','Támasztórúd teleszkópos (4209040)'),(382,'0','22359/2','Tartósín PE reklámtáblával (4209041)'),(383,'0','22360/2','Tartó teleszkópos rúdhoz (4209042)'),(384,'0','22374/2','3659381-01 Levegő kilépő vákumformázó szerszám'),(385,'0','22401/2','Levegő kilépő RAL1018 Yellow (3659381-03)'),(386,'0','22402/2','Levegő kilépő Fekete RAL9005 (3659381-04)'),(387,'0','22415/2','VÉGFAL JOBB 75H MEDEA PVC (4191334V-273)'),(388,'0','22416/2','VÉGFAL BAL 75H MEDEA PVC (4191335V-273)'),(389,'0','22420/2','VÉGFAL JOBB 85/90H DAN.TT PVC (4191338V-104)'),(390,'0','22421/2','VÉGFAL BAL 85/90H DAN.TT PVC (4191339V-104)'),(391,'0','22430/2','VÉGFAL JOBB FIAN. MEDEA 750 CE COLOR PVC (4181988V-273)'),(392,'0','22431/2','VÉGFAL BAL FIAN. MEDEA 750 CE COLOR PVC (4181989V-273)'),(393,'0','22432/2','Kaufland profil L=601 TUBO OVALE AP. (BM30702940)'),(394,'0','22433/2','Kaufland profil L=601 TUBO OVALE AP. (BM30702950)'),(395,'0','22434/2','Kaufland profil L=769,5 TUBO OVALE AP. (BM30702960)'),(396,'0','22506/2','VÉGFAL JOBB 85/90H DAN.TT PVC (4191338V-163)'),(397,'0','22507/2','VÉGFAL BAL 85/90H DAN.TT PVC (4191339V-163)'),(398,'0','22508/2','VÉGFAL JOBB 85H CB MED.ENHA PVC (4198987V-233)'),(399,'0','22509/2','4163111 PAPÍRTARTÓ TÁLCA vákuum formázó szerszám'),(400,'0','22526/2','VÉGFAL JOBB 75H DAN.TT PVC (4191340V-301)'),(401,'0','22527/2','VÉGFAL BAL 75H DAN.TT PVC (4191341V-301)'),(402,'0','22528/2','VÉGFAL BAL 75H MEDEA PVC (4191335V-187)'),(403,'0','22540/2','Végfal JOBB PVC (4198955V-301)'),(404,'0','22541/2','Végfal BAL PVC (4198962V-301)'),(405,'0','22569/2','VÉGFAL JOBB 90H MEDEA FLAT PVC (4191392V-187)'),(406,'0','22577/2','PS lemez 1mm fehér mindkét oldalon matt, védőfólia nélkül 1000x2000mm'),(407,'0','22578/2','PS lemez 4mm fehér mindkét oldalon matt, védőfólia nélkül 1000x2000mm'),(408,'0','22593/2','Head Prof.Front Face Prof.Crio Festés díja (BM30525940V-233)'),(409,'0','22667/2','VÉGFAL JOBB 75H MED.TT PVC (4191344V-187)'),(410,'0','22668/2','VÉGFAL BAL 75H MED.TT PVC (4191345V-187)'),(411,'0','22669/2','VÉGFAL JOBB FIAN. MEDEA 750 CE COLOR PVC (4181988V-233)'),(412,'0','22670/2','VÉGFAL BAL FIAN. MEDEA 750 CE COLOR PVC (4181989V-233)'),(413,'0','22677/2','VÉGFAL JOBB 90H MEDEA FLAT PVC (4191392V-163)'),(414,'0','22678/2','VÉGFAL BAL 90H MEDEA FLAT PVC (4191393V-163)'),(415,'0','22693/2','VÉGFAL JOBB 90H MEDEA FLAT PVC (4191392V-233)'),(416,'0','22805/2','Tartó (2021041600)'),(417,'0','22826/2','VÉGFAL BAL 85/90H DAN.TT PVC (4191339V-233)'),(418,'0','22856/2','VÉGFAL BAL 90H MEDEA FLAT PVC (4191393V-233)'),(419,'0','22928/2','VÉGFAL JOBB 85H MED.TT PVC (4191651V-123)'),(420,'0','23006/2','B1-es posztertartóra 25m-es profilból'),(421,'0','23035/2','Végfal BAL 850 Poliuretán DANAOS CARUCCO Végfal SZÍNES (30600360V-334)'),(422,'0','23036/2','Végfal JOBB 850 Poliuretán DANAOS CARUCCO Végfal SZÍNES (30600350V-334)'),(423,'0','23052/2','Végfal DX 850 Hera PVC (30701860V-006)'),(424,'0','23053/2','Végfal SX 850 Hera PVC (30701870V-006)'),(425,'0','23205/2','914x1524 mm-es méretű poszterkeret'),(426,'0','23253/2','VÉGFAL JOBB 85H DAN. FLAT TÜKRÖS PVC (4191342V-194)'),(427,'0','23254/2','VÉGFAL JOBB 85/90H DAN.TT PVC (4191338V-075)'),(428,'0','23255/2','VÉGFAL BAL 85/90H DAN.TT PVC (4191339V-075)'),(429,'0','23257/2','VÉGFAL JOBB 75H MED.TT PVC (4191344V-075)'),(430,'0','23258/2','VÉGFAL BAL 75H MED.TT PVC (4191345V-075)'),(431,'0','23441/2','VÉGFAL BAL 85H MED.TT PVC (4191652V-233)'),(432,'0','23442/2','VÉGFAL JOBB 85/90H DAN.TT PVC (4191338V-333)'),(433,'0','23454/2','VÉGFAL JOBB 85H MED.TT PVC (4191651V-233)'),(434,'0','23456/2','ASE PROFILE TEST 2500'),(435,'0','00617/2','Label upper core door gap filler'),(436,'0','03264/2','Belépőkártya'),(437,'0','07458/1','Esőkabát feliratozás eleje és háta'),(438,'0','09710/2','1200*1800*3 mm Takarítóeszköz tároló tábla'),(439,'0','14435/1','445-0725069 Label-Insulator'),(440,'0','14721/2','Alkatrész feliratozás 445-0764003'),(441,'0','17150/2','Alkatrész feliratozás (445-0772283)'),(442,'0','22778/2','Plexi lapok 148x105mm'),(443,'0','23025/2','148x210x2 mm plexi'),(444,'0','23026/2','600x850x2 mm plexi'),(445,'0','23121/2','öntapadós matrica d=40 mm'),(446,'0','23191/2','Felirat készítés'),(447,'0','23429/2','PVC-BLOCK 45x40x40'),(448,'0','23482/2','NEOOM plexi'),(449,'0','23562/2',' A3-as méretű \"D\" típusú táblát'),(450,'0','21101/2','védőablak'),(451,'0','21608/2','3db 4mm PMMA marása alapanyaggal együtt'),(452,'0','21721/2','4mm ESD PC megmunkálás díja'),(453,'0','21722/2','4mm ESD PC alapanyag'),(454,'0','22020/2','CON-CME-1610-10 alkatrész gyártása, porfestése RAL 7035 ESD porfestékkel'),(455,'0','22021/2','2004-280-04 alkatrész gyártása, porfestése RAL 7035 ESD porfestékkel'),(456,'0','22093/2','7db 4mm PMMA marása alapanyaggal együtt'),(457,'0','22177/2','3mm ESD PC alapanyag'),(458,'0','22178/2','3mm ESD PC megmunkálás díja'),(459,'0','22215/2','171db 4mm PMMA marása alapanyaggal együtt'),(460,'0','22216/2','6db 4mm PMMA marása alapanyaggal együtt'),(461,'0','22256/2','Selejt karantén műanyag alkatrész garnitúra'),(462,'0','22446/2','2db 4mm PMMA marása alapanyaggal együtt'),(463,'0','22505/2','24db 4mm PMMA marása alapanyaggal együtt'),(464,'0','22582/2','1db 4mm PC marása alapanyaggal együtt'),(465,'0','20954/2','C02145 Film és szita készítés 1250x1800mm'),(466,'0','22676/2','2db 6mm Fekete PE marása alapanyaggal együtt'),(467,'0','22937/2','27db 6mm PC marása alapanyaggal együtt'),(468,'0','22939/2','18db 6mm PC marása alapanyaggal együtt'),(469,'0','22940/2','8db Fekete PE marása alapanyaggal együtt'),(470,'0','23010/2','Dúsító_rögzítő'),(471,'0','23011/2','Obo bilincs távtartó'),(472,'0','23012/2','Obo bilincstávtartó_dupla'),(473,'0','23019/2','1db 6mm PC marása alapanyaggal együtt'),(474,'0','23034/2','2db Fekete PE marása alapanyaggal együtt'),(475,'0','23058/2','6db 6mm PC marása alapanyaggal együtt'),(476,'0','23126/2','7db 6mm PC marása alapanyaggal együtt'),(477,'0','23127/2','6db 4mm PMMA marása alapanyaggal együtt'),(478,'0','23128/2','5db 4mm PMMA marása alapanyaggal együtt'),(479,'0','23405/2','3db 6mm PC marása alapanyaggal együtt'),(480,'0','23406/2','4db Fekete PE marása alapanyaggal együtt'),(481,'0','23559/2','10db 4mm PMMA marása alapanyaggal együtt'),(482,'0','23560/2','1db 6mm PMMA marása alapanyaggal együtt'),(483,'0','23563/2','12db alkatrész marása alapanyaggal együtt'),(484,'0','23586/2','8db 4mm PMMA marása alapanyaggal együtt'),(485,'0','02026/1','Barnaragasztó (50mmx66m)'),(486,'0','04517/2','D31637 Újragyártás 1250x1800mm'),(487,'0','05810/2','D48855 Újragyártás 700x900mm'),(488,'0','09438/2','D55334 Újragyártás 650x800mm'),(489,'0','09444/2','D55008 Film és szita készítés 550x450mm'),(490,'0','09590/2','D55572 Film és szita készítés 450x350mm'),(491,'0','10927/2','D30452 Újragyártás'),(492,'0','11274/2','SB00295 Újragyártás 550x650mm'),(493,'0','11276/2','D58817 1 Újragyártás 650x800mm'),(494,'0','11799/1','D26591 Újragyártás 1250x1800mm'),(495,'0','22644/2','14db 6mm Fekete PE marása alapanyaggal együtt'),(496,'0','14926/2','D63454 Újragyártás 1250x1800mm'),(497,'0','16799/2','D68277 Film és szita készítés 650x800mm'),(498,'0','17409/2','D68909 Film és szita készítés 650x800mm'),(499,'0','17796/2','D69281 Film és szita készítés 550x450mm'),(500,'0','19946/2','D64080 Újragyártás'),(501,'0','20143/2','D64433 Újragyártás 1250x1800mm'),(502,'0','20194/2','C00125 Film és szita készítés 650x800mm'),(503,'0','20210/2','C00124 Film és szita készítés 1250x1800mm'),(504,'0','20381/2','C01542 Film és szita készítés 1250x1800mm'),(505,'0','20423/2','D53044 Újra gyártás 1250x1800mm'),(506,'0','20425/2','D54440 Újra gyártás1250x1800mm'),(507,'0','20427/2','D30357 Újragyártás 1250x1800mm'),(508,'0','20469/2','C01311 Film és szita készítés 650x800mm'),(509,'0','20470/2','C01312 Film és szita készítés 650x800mm'),(510,'0','20471/2','C01707 Film és szita készítés 650x800mm'),(511,'0','20474/2','C01314 Film és szita készítés 650x800mm'),(512,'0','20495/2','C01774 Film és szita készítés 650x800mm'),(513,'0','20496/2','C01704 Film és szita készítés 1250x1800mm'),(514,'0','20540/2','C01763 Film és szita készítés 1250x1800mm'),(515,'0','20544/2','FNIL-4369 Film és szita készítés 650x800mm'),(516,'0','20644/2','D65178 Újragyártás 1250x1800mm'),(517,'0','20645/2','C01358 Film és szita készítés 1250x1800mm'),(518,'0','20728/2','C00532B Film és szita készítés 1250x1800mm'),(519,'0','20729/2','C00532A Film és szita készítés 1250x1800mm'),(520,'0','20758/2','C01188 Film és szita készítés 650x800mm'),(521,'0','20775/2','D44592 Film és szita készítés 650x800mm'),(522,'0','20822/2','C02073P01 Film és szita készítés 1250x1800mm'),(523,'0','20828/2','FDUR-4305 Film és szita készítés 1300x1000mm'),(524,'0','20861/2','H9012391 Film és szita készítés 1250x1800mm'),(525,'0','20862/2','H9012392 Film és szita készítés 1250x1800mm'),(526,'0','20863/2','H9012393 Film és szita készítés 1250x1800mm'),(527,'0','20864/2','H9012394 Film és szita készítés 1250x1800mm'),(528,'0','13577/2','D61352 Újragyártás 650x800mm'),(529,'0','14058/2','D62194 Újragyártás1250x1800mm'),(530,'0','14460/2','D62928 Újragyártás 1250x1800mm'),(531,'0','20955/2','D53909 Film és szita készítés 650x800mm'),(532,'0','20977/2','C00662 Film és szita készítés 650x800mm'),(533,'0','21016/2','C01849 Film és szita készítés 1250x1800mm'),(534,'0','21104/2','C02603 Film és szita készítés 1250x1800mm'),(535,'0','21114/2','C00955 Film és szita készítés 1250x1800mm'),(536,'0','21115/2','C01534A Film és szita készítés 1250x1800mm'),(537,'0','21116/2','C01534B Film és szita készítés 1250x1800mm'),(538,'0','21117/2','C01535A Film és szita készítés 1250x1800mm'),(539,'0','21118/2','C01535B Film és szita készítés 1250x1800mm'),(540,'0','21145/2','C01872 Film és szita készítés 1250x1800mm'),(541,'0','21206/2','C02663 Film és szita készítés 650x800mm'),(542,'0','21207/2','C02664 Film és szita készítés 650x800mm'),(543,'0','21257/2','C02328 Film és szita készítés 650x800mm'),(544,'0','21426/2','C02734 Film és szita készítés 1250x1800mm'),(545,'0','21427/2','C02741 Film és szita készítés 1230x1100mm és 1270x1170mm'),(546,'0','21498/2','C01770 Film és szita készítés 1250x1800mm'),(547,'0','21499/2','C02554 A Film és szita készítés 1250x1800mm'),(548,'0','21500/2','C02554 B Film és szita készítés 1250x1800mm'),(549,'0','21533/2','C02742 Film és szita készítés 1250x1800mm'),(550,'0','21621/2','C02984 Film és szita készítés 1250x1800mm'),(551,'0','21622/2','C01403 Film és szita készítés 1250x1800mm'),(552,'0','21664/2','D63822 Újragyártás 1240x1480mm'),(553,'0','21665/2','C01702 Film és szita készítés 650x800mm'),(554,'0','21666/2','C03071 Film és szita készítés 650x800mm'),(555,'0','21719/2','C02858 Film és szita készítés 1250x1800mm'),(556,'0','21720/2','C02854 Film és szita készítés 1250x1800mm'),(557,'0','21724/2','C02670 Film és szita készítés 650x800mm'),(558,'0','21816/2','C03429 Film és szita készítés 1250x1800mm'),(559,'0','21909/2','C02919 Film és szita készítés 1250x1800mm'),(560,'0','21910/2','C02921 Film és szita készítés 1250x1800mm'),(561,'0','21961/2','C03171P01 Film és szita készítés 1250x1800mm'),(562,'0','21981/2','C03179PA01 Film és szita készítés 1250x1800mm'),(563,'0','21982/2','C03179PB01 Film és szita készítés 1250x1800mm'),(564,'0','22081/2','C03638 Film és szita készítés 1250x1800mm'),(565,'0','22086/2','C03691 Film és szita készítés 1250x1800mm'),(566,'0','22087/2','C03692 Film és szita készítés 1250x1800mm'),(567,'0','22120/2','C01004P03A Film és szita készítés 1240x1480mm'),(568,'0','22121/2','C01004P03B Film és szita készítés 1240x1480mm'),(569,'0','22176/2','C03857 Film és szita készítés 650x800mm'),(570,'0','22212/2','C03856 Film és szita készítés 650x800mm'),(571,'0','22217/2','C01463 Film és szita készítés 650x800mm'),(572,'0','22258/2','C04036 Film és szita rendelés 1250x1800mm'),(573,'0','22278/2','D11461/1 Film és szita készítés 1250x1800mm'),(574,'0','22279/2','D11461/2 Film és szita készítés 1250x1800mm'),(575,'0','22333/2','C04154 Film és szita készítés 1250x1800mm'),(576,'0','22334/2','C04155 Film és szita készítés 1250x1800mm'),(577,'0','22338/2','C04182 Film és szita készítés 650x800mm'),(578,'0','22373/2','C04026 Film és szita készítés 1250x1800mm'),(579,'0','22417/2','C04202A Film és szita készítés 1250x1800mm'),(580,'0','22418/2','C04202B Film és szita készítés 1250x1800mm'),(581,'0','22423/2','D27004 Újragyártás 650x800mm'),(582,'0','22426/2','C04027 Film és szita készítés 550x650mm'),(583,'0','22469/2','C04285 Film és szita készítés 650x800mm'),(584,'0','22470/2','C04025 Film és szita készítés 650x800mm'),(585,'0','22471/2','C04115 Film és szita készítés 650x800mm'),(586,'0','22472/2','C03828_C04000_C04262 Film és szita készítés 650x800mm'),(587,'0','22574/2','C04554 Film és szita készítés 650x800mm'),(588,'0','22596/2','C04357 Film és szita készítés 1250x1800m'),(589,'0','22597/2','C04358 Film és szita készítés 1250x1800m'),(590,'0','22645/2','D43510 Film és szita készítés 450x350mm'),(591,'0','22646/2','C04084 Film és szita készítés 450x350mm'),(592,'0','22647/2','C04089 Film és szita készítés 1250x1800mm'),(593,'0','22648/2','C04090A Film és szita készítés 1250x1800mm'),(594,'0','22649/2','C04090B Film és szita készítés 1250x1800mm'),(595,'0','22796/2','C03395 Film és szita készítés 1250x1800mm'),(596,'0','22842/2','C03720 Film és szita készítés 1250x1800mm'),(597,'0','22853/2','C04092 Film és szita készítés 1250x1800mm'),(598,'0','22864/2','C04993 Film és szita készítés 650x800mm'),(599,'0','22865/2','C04432 Film és szita készítés 1000x800mm'),(600,'0','22866/2','C04433 Film és szita készítés 1000x800mm'),(601,'0','22867/2','C04434 Film és szita készítés 1300x1000mm'),(602,'0','22899/2','C04928 Film és szita készítés 1000x800mm'),(603,'0','22929/2','C04860 Film és szita készítés 1250x1800mm'),(604,'0','23005/2','C05043 Film és szita készítés 1250x1800mm'),(605,'0','23007/2','FNIL-4383 Film és szitakészítés 1250 mm x 1800 mm'),(606,'0','23215/2','C05332 Film és szita készítés 450x550mm'),(607,'0','23220/2','D64849 Újragyártás 1250x1800mm'),(608,'0','23259/2','C04991 Film és szita készítés 1250x1800mm'),(609,'0','23260/2','C04949A Film és szita készítés 1250x1800mm'),(610,'0','23261/2','C04949B Film és szita készítés 1250x1800mm'),(611,'0','23298/2','C05441 Film és szita készítés 650x800mm'),(612,'0','23330/2','C05415 Film és szita készítés 1250x1800mm'),(613,'0','23331/2','D65823 Film és szita készítés 1240x1480mm'),(614,'0','23336/2','C05409 Film és szita készítés 1250x1800mm'),(615,'0','23337/2','C05412 Film és szita készítés'),(616,'0','23407/2','C04890 1 szita Film és szita készítés 650x800mm'),(617,'0','23408/2','C04890 2 szita Film és szita készítés 650x800mm és 350x450mm'),(618,'0','23409/2','C04509 1 szita Film és szita készítés 650x800mm'),(619,'0','23410/2','C04509 2 szita Film és szita készítés 900x1100mm'),(620,'0','23411/2','C04892 Film és szita készítés 450x550mm'),(621,'0','23434/2','C05582 Film és szita készítés 1000x800mm és 650x800mm'),(622,'0','23435/2','C05580 Film és szita készítés 550x450mm'),(623,'0','23460/2','C05795 Film és szita készítés 650x800mm'),(624,'0','23478/2','C03160 Film és szita készítés 650x800mm'),(625,'0','23542/2','C05732 Film és szita készítés 650x800mm'),(626,'0','09336/2','8353201 LIFE FITNESS nyomat'),(627,'0','09337/2','9475701 HAMMER STRENGTH nyomat'),(628,'0','09338/2','9475702 HAMMER STRENGTH nyomat'),(629,'0','09339/2','9475704 HAMMER STRENGTH nyomat'),(630,'0','09340/2','9475705 HAMMER STRENGTH nyomat'),(631,'0','09341/2','9475706 HAMMER STRENGTH nyomat'),(632,'0','09342/2','9499701 HAMMER STRENGTH nyomat'),(633,'0','09356/2','8353302 LIFE FITNESS nyomat'),(634,'0','09360/2','8353301 LIFE FITNESS nyomat'),(635,'0','17071/2','7782401 LIFE FITNESS nyomat'),(636,'0','22385/2','3768371 esztergált alkatrész gyártása'),(637,'0','22572/2','C012264 CYBEX nyomat'),(638,'0','22573/2','C012268 CYBEX nyomat'),(639,'4195950',NULL,'4195950 Termék Megmunkálási Díja'),(640,'4171313-011',NULL,'KÜLSŐ TAKARÓ  L2410 TF 2580 Profil Megmunkálás Díja (4171313-0117)'),(641,'4171314-900',NULL,'KÜLSŐ TAKARÓ  L2010 FA9005 Profil Megmunkálás Díja (4171314-9005)'),(642,'23701/2',NULL,'Adattábla Felépítmény 200x80mm'),(643,'23700/2',NULL,'Adattábla Pótkocsi 200x80mm'),(644,'23695/2',NULL,'32db 6mm PMMA Marása Alapanyaggal Együtt');
/*!40000 ALTER TABLE `product` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `product_attachment`
--

DROP TABLE IF EXISTS `product_attachment`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `product_attachment` (
  `ID` int(11) NOT NULL AUTO_INCREMENT,
  `attachment_ID` int(11) NOT NULL,
  `product_ID` int(11) NOT NULL,
  PRIMARY KEY (`ID`),
  KEY `attachment_ID` (`attachment_ID`),
  KEY `product_ID` (`product_ID`),
  CONSTRAINT `product_attachment_ibfk_1` FOREIGN KEY (`attachment_ID`) REFERENCES `attachment` (`ID`) ON DELETE CASCADE ON UPDATE CASCADE,
  CONSTRAINT `product_attachment_ibfk_2` FOREIGN KEY (`product_ID`) REFERENCES `product` (`ID`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB AUTO_INCREMENT=14 DEFAULT CHARSET=utf8 COLLATE=utf8_hungarian_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `product_attachment`
--

LOCK TABLES `product_attachment` WRITE;
/*!40000 ALTER TABLE `product_attachment` DISABLE KEYS */;
INSERT INTO `product_attachment` VALUES (2,2,37),(3,3,38),(4,4,38),(5,5,37),(6,6,38),(7,7,37),(8,8,38),(9,9,38),(10,10,38),(11,11,37),(12,12,37),(13,13,37);
/*!40000 ALTER TABLE `product_attachment` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `role`
--

DROP TABLE IF EXISTS `role`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `role` (
  `ID` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(255) COLLATE utf8_hungarian_ci NOT NULL,
  PRIMARY KEY (`ID`)
) ENGINE=InnoDB AUTO_INCREMENT=22 DEFAULT CHARSET=utf8 COLLATE=utf8_hungarian_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `role`
--

LOCK TABLES `role` WRITE;
/*!40000 ALTER TABLE `role` DISABLE KEYS */;
INSERT INTO `role` VALUES (1,'Asszisztens'),(2,'Titkárnő'),(3,'Értékesítő'),(4,'Ügyfélszolgálatos'),(5,'Marketing'),(6,'Mérnök'),(7,'Cégvezető'),(8,'Karbantartó'),(9,'Üzemvezető'),(10,'Anyagbeszerző'),(11,'Projektmenedzser'),(12,'Designer'),(13,'Rendszergazda'),(14,'Betanított Munkás'),(15,'Szoftverfejlesztő'),(16,'Tanácsadó'),(17,'Számítógépes Adminisztrátor'),(18,'Műszakvezető'),(19,'Villanyszerelő'),(20,'Logisztikai Vezető'),(21,'Takarító');
/*!40000 ALTER TABLE `role` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `site`
--

DROP TABLE IF EXISTS `site`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `site` (
  `ID` int(11) NOT NULL AUTO_INCREMENT,
  `city` varchar(255) COLLATE utf8_hungarian_ci NOT NULL,
  `street` varchar(255) COLLATE utf8_hungarian_ci NOT NULL,
  `house_number` varchar(10) COLLATE utf8_hungarian_ci NOT NULL,
  PRIMARY KEY (`ID`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8 COLLATE=utf8_hungarian_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `site`
--

LOCK TABLES `site` WRITE;
/*!40000 ALTER TABLE `site` DISABLE KEYS */;
INSERT INTO `site` VALUES (1,'Jászapáti','Vasút út','10.'),(2,'Jászapáti','Vasút út','29.');
/*!40000 ALTER TABLE `site` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `user`
--

DROP TABLE IF EXISTS `user`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `user` (
  `ID` int(11) NOT NULL AUTO_INCREMENT,
  `barcode` varchar(11) COLLATE utf8_hungarian_ci DEFAULT NULL,
  `name` varchar(255) COLLATE utf8_hungarian_ci NOT NULL,
  `phone` varchar(12) COLLATE utf8_hungarian_ci NOT NULL,
  `email` varchar(255) COLLATE utf8_hungarian_ci NOT NULL,
  `password` varchar(100) COLLATE utf8_hungarian_ci NOT NULL,
  `type` varchar(100) COLLATE utf8_hungarian_ci DEFAULT NULL,
  PRIMARY KEY (`ID`)
) ENGINE=InnoDB AUTO_INCREMENT=60 DEFAULT CHARSET=utf8 COLLATE=utf8_hungarian_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `user`
--

LOCK TABLES `user` WRITE;
/*!40000 ALTER TABLE `user` DISABLE KEYS */;
INSERT INTO `user` VALUES (0,'0','Még nem definiált','','','','Dolgozó'),(1,'0','Kertesz Zoltán','','teszt@teszt.hu','6c90aa3760658846a86a263a4e92630e','Adminisztrátor'),(2,'0','Urbán Kristóf','','kristofurban41@gmail.com','de1914daf87531db1536dcf0974e6973','Adminisztrátor'),(3,'0','Szabó Helga','','szabo.helga@radius.hu','04cc3c87635817cbfe3826f6a62e9301','Adminisztrátor'),(4,'0','Borbás Nándor','','','','Dolgozó'),(5,'0','Birkásné Bősze Katalin','','','','Dolgozó'),(6,'0','Lebán József','','','','Dolgozó'),(7,'0','Nagy Ádám','','','','Dolgozó'),(8,'0','Németh Attila','','','','Dolgozó'),(9,'0','Birkás Éva','','birkaseva@radius.hu','eva','Dolgozó'),(10,'0','Borbás Ferenc','','ferenc.borbas@radius.hu','Ferenc','Adminisztrátor'),(11,'0','Ifj. Borbás Ferenc','','','','Dolgozó'),(12,'0','Bagi Sándorné Nikolett','','','','Dolgozó'),(13,'0','Barócsi Gergő','','','','Dolgozó'),(14,'0','Birkás Tibor','','','','Dolgozó'),(15,'0','Borbély Imre','','','','Dolgozó'),(16,'0','Budainé Stupek Edit','','budainestupekedit@radius.hu','de95b43bceeb4b998aed4aed5cef1ae7','Adminisztrátor'),(17,'0','Csajbók Ferenc','','','','Dolgozó'),(18,'0','Csajbók Róbert Ferenc','','','','Dolgozó'),(19,'0','Demeter Edina','','','','Dolgozó'),(20,'0','Járvás Miklós','','','','Dolgozó'),(21,'0','Kis Gábor Csaba','','','','Dolgozó'),(22,'0','Kiss László','','','','Dolgozó'),(23,'0','Kocsis Kálmán','','','','Dolgozó'),(24,'0','Major László','','','','Dolgozó'),(25,'0','Novák-Borbás János','','','','Dolgozó'),(26,'0','Peczek Erika','','','','Dolgozó'),(27,'0','Rózsa-Mauric Péter','','','','Dolgozó'),(28,'0','Serényi Gábor','','','','Dolgozó'),(29,'0','Stoklász Zoltán','','','','Dolgozó'),(30,'0','Szabari István','','','','Dolgozó'),(31,'0','Urbán Irén','','','','Dolgozó'),(32,'0','Zagyi László','','','','Dolgozó'),(33,'0','Zámbó Attila','','','','Dolgozó'),(34,'0','Báthor Pál','','','','Dolgozó'),(35,'0','Borbásné Budai Valéria','','','','Dolgozó'),(36,'0','Borbásné Rostás Anikó','','','','Dolgozó'),(37,'0','Bugyi Béla','','','','Dolgozó'),(38,'0','Tóth László','','','','Dolgozó'),(39,'0','Urbán István','','','','Dolgozó'),(40,'0','Balla-Tajti Ivett','','','','Dolgozó'),(41,'0','Horváth Tamás','','','','Dolgozó'),(42,'0','Erdei Gergő','','','','Dolgozó'),(43,'0','Léhiné Ádám Mária','','','','Dolgozó'),(44,'0','Nagy Imre Krisztián','','','','Dolgozó'),(45,'0','Lóczi Pál','','','','Dolgozó'),(46,'0','Major Andrásné','','','','Dolgozó'),(47,'0','Major Zsuzsanna','','','','Dolgozó'),(48,'0','Pataki László','','','','Dolgozó'),(49,'0','Mihályi Zoltán','','mihalyizoltan@radius.hu','9b2a08291b328fd80d8196926ba685ec','Adminisztrátor'),(51,'0','Németh Tamás','','','','Dolgozó'),(52,'0','Csete Mihály','','','','Dolgozó'),(53,'0','Csík Tibor','','','','Dolgozó'),(54,'0','Jász Borbála','','','','Dolgozó'),(55,'0','Kovács Mihály','','','','Dolgozó'),(56,'0','Szabariné Orosz Ágnes','','szabarineoroszagnes@radius.hu','agnes','Dolgozó'),(57,'0','Tóth Béla','','','','Dolgozó'),(58,'0','Szabari Edit','','','','Dolgozó');
/*!40000 ALTER TABLE `user` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `user_operation`
--

DROP TABLE IF EXISTS `user_operation`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `user_operation` (
  `ID` int(11) NOT NULL AUTO_INCREMENT,
  `user_ID` int(11) NOT NULL,
  `operation_ID` int(11) NOT NULL,
  `time` int(11) NOT NULL,
  `month` varchar(11) COLLATE utf8_hungarian_ci NOT NULL,
  PRIMARY KEY (`ID`),
  KEY `user_ID` (`user_ID`),
  KEY `operation_ID` (`operation_ID`),
  CONSTRAINT `user_operation_ibfk_1` FOREIGN KEY (`user_ID`) REFERENCES `user` (`ID`) ON DELETE CASCADE ON UPDATE CASCADE,
  CONSTRAINT `user_operation_ibfk_2` FOREIGN KEY (`operation_ID`) REFERENCES `operation` (`ID`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB AUTO_INCREMENT=90 DEFAULT CHARSET=utf8 COLLATE=utf8_hungarian_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `user_operation`
--

LOCK TABLES `user_operation` WRITE;
/*!40000 ALTER TABLE `user_operation` DISABLE KEYS */;
INSERT INTO `user_operation` VALUES (1,58,1,3810,'2021/09'),(2,58,4,600,'2021/09'),(3,58,2,30,'2021/09'),(4,54,2,30,'2021/09'),(5,54,1,4395,'2021/09'),(6,5,1,4515,'2021/09'),(7,54,4,75,'2021/09'),(8,44,1,3930,'2021/09'),(9,19,1,3600,'2021/09'),(10,46,1,2625,'2021/09'),(11,46,4,75,'2021/09'),(12,47,1,3795,'2021/09'),(13,47,4,255,'2021/09'),(14,8,1,3675,'2021/09'),(15,39,2,105,'2021/09'),(16,39,1,2505,'2021/09'),(17,47,5,75,'2021/09'),(18,26,1,2655,'2021/09'),(19,8,4,375,'2021/09'),(20,44,2,120,'2021/09'),(21,39,4,210,'2021/09'),(22,47,3,15,'2021/09'),(23,21,2,150,'2021/09'),(24,21,4,90,'2021/09'),(25,21,1,1560,'2021/09'),(26,24,4,75,'2021/09'),(27,24,1,3255,'2021/09'),(28,6,1,1980,'2021/09'),(29,18,1,1755,'2021/09'),(30,18,4,45,'2021/09'),(31,17,1,1320,'2021/09'),(32,32,1,2325,'2021/09'),(33,32,4,30,'2021/09'),(34,29,1,1785,'2021/09'),(35,23,1,2130,'2021/09'),(36,23,4,90,'2021/09'),(37,7,1,2190,'2021/09'),(38,7,3,45,'2021/09'),(39,33,2,360,'2021/09'),(40,33,4,15,'2021/09'),(41,33,5,15,'2021/09'),(42,33,1,1530,'2021/09'),(43,54,3,60,'2021/09'),(44,53,1,2055,'2021/09'),(45,53,3,15,'2021/09'),(46,58,3,45,'2021/09'),(47,53,4,135,'2021/09'),(48,53,5,45,'2021/09'),(49,13,1,1980,'2021/09'),(50,13,4,90,'2021/09'),(51,13,2,135,'2021/09'),(52,24,2,90,'2021/09'),(53,22,2,30,'2021/09'),(54,22,5,30,'2021/09'),(55,22,1,1215,'2021/09'),(56,6,2,270,'2021/09'),(57,32,2,60,'2021/09'),(58,37,4,90,'2021/09'),(59,37,2,105,'2021/09'),(61,30,1,1395,'2021/09'),(62,38,4,30,'2021/09'),(63,38,2,15,'2021/09'),(64,38,1,1725,'2021/09'),(65,20,1,450,'2021/09'),(67,28,2,45,'2021/09'),(68,28,1,1665,'2021/09'),(69,26,4,45,'2021/09'),(70,5,4,45,'2021/09'),(71,13,5,15,'2021/09'),(72,22,4,75,'2021/09'),(73,23,2,30,'2021/09'),(74,29,3,15,'2021/09'),(75,51,4,165,'2021/09'),(76,51,1,660,'2021/09'),(77,45,1,465,'2021/09'),(78,45,4,45,'2021/09'),(79,17,4,30,'2021/09'),(80,37,3,15,'2021/09'),(81,37,1,1260,'2021/09'),(82,30,4,90,'2021/09'),(83,31,4,300,'2021/09'),(84,31,1,600,'2021/09'),(85,7,4,15,'2021/09'),(86,8,5,120,'2021/09'),(87,51,2,180,'2021/09'),(88,28,5,15,'2021/09'),(89,30,5,30,'2021/09');
/*!40000 ALTER TABLE `user_operation` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `user_order`
--

DROP TABLE IF EXISTS `user_order`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `user_order` (
  `ID` int(11) NOT NULL AUTO_INCREMENT,
  `user_ID` int(11) NOT NULL,
  `order_ID` int(11) NOT NULL,
  `time` int(11) DEFAULT '0',
  PRIMARY KEY (`ID`),
  KEY `user_ID` (`user_ID`),
  KEY `order_ID` (`order_ID`),
  CONSTRAINT `user_order_ibfk_1` FOREIGN KEY (`user_ID`) REFERENCES `user` (`ID`) ON DELETE CASCADE ON UPDATE CASCADE,
  CONSTRAINT `user_order_ibfk_2` FOREIGN KEY (`order_ID`) REFERENCES `order` (`ID`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB AUTO_INCREMENT=51 DEFAULT CHARSET=utf8 COLLATE=utf8_hungarian_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `user_order`
--

LOCK TABLES `user_order` WRITE;
/*!40000 ALTER TABLE `user_order` DISABLE KEYS */;
INSERT INTO `user_order` VALUES (1,49,1,0),(2,44,4,0),(3,46,4,0),(4,47,4,0),(5,32,5,0),(6,22,5,0),(7,46,5,0),(8,8,6,0),(9,47,6,0),(11,5,12,0),(12,54,12,0),(13,58,12,0),(14,5,13,0),(15,54,13,0),(16,58,13,0),(17,5,14,0),(18,54,14,0),(19,58,14,0),(20,5,15,0),(21,54,15,0),(22,58,15,0),(23,19,15,0),(24,44,16,0),(25,44,17,0),(26,44,18,0),(27,44,19,0),(28,44,20,0),(29,44,21,0),(30,8,22,0),(31,8,23,0),(32,8,24,0),(33,8,25,0),(34,8,20,0),(35,8,26,0),(36,47,27,0),(37,57,27,0),(38,39,27,0),(39,21,29,0),(40,21,30,0),(41,24,32,0),(42,24,33,0),(43,24,34,0),(44,47,35,0),(45,46,36,0),(47,0,37,0),(48,46,38,0),(49,46,39,0),(50,46,40,0);
/*!40000 ALTER TABLE `user_order` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `user_order_manufacturing_step`
--

DROP TABLE IF EXISTS `user_order_manufacturing_step`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `user_order_manufacturing_step` (
  `ID` int(11) NOT NULL AUTO_INCREMENT,
  `user_ID` int(11) NOT NULL,
  `order_manufacturing_step_ID` int(11) NOT NULL,
  `time` float DEFAULT NULL,
  `pass_count` float DEFAULT NULL,
  `fail_count` float DEFAULT NULL,
  PRIMARY KEY (`ID`),
  KEY `user_ID` (`user_ID`),
  KEY `order_manufacturing_step_ID` (`order_manufacturing_step_ID`),
  CONSTRAINT `user_order_manufacturing_step_ibfk_1` FOREIGN KEY (`user_ID`) REFERENCES `user` (`ID`) ON DELETE CASCADE ON UPDATE CASCADE,
  CONSTRAINT `user_order_manufacturing_step_ibfk_2` FOREIGN KEY (`order_manufacturing_step_ID`) REFERENCES `order_manufacturing_step` (`ID`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB AUTO_INCREMENT=101 DEFAULT CHARSET=utf8 COLLATE=utf8_hungarian_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `user_order_manufacturing_step`
--

LOCK TABLES `user_order_manufacturing_step` WRITE;
/*!40000 ALTER TABLE `user_order_manufacturing_step` DISABLE KEYS */;
INSERT INTO `user_order_manufacturing_step` VALUES (1,47,9,0,0,0),(10,58,28,180,0,0),(11,46,28,15,0,0),(13,47,28,15,0,0),(14,54,28,15,0,0),(15,5,29,84,3,0),(16,54,30,96,3,0),(17,58,31,96,3,0),(18,5,32,56,2,0),(19,54,33,64,2,0),(20,58,33,64,2,0),(21,5,34,140,5,0),(22,54,35,160,5,0),(23,58,35,160,5,0),(24,5,36,84,3,0),(25,54,37,96,3,0),(26,58,37,96,3,0),(27,19,36,416,13,0),(28,5,36,420,7,0),(29,54,37,210,8,0),(30,58,37,210,8,0),(31,54,38,150,7,0),(32,58,38,150,7,0),(33,44,39,546,39,0),(34,44,40,560,40,0),(35,44,41,140,10,0),(36,44,42,224,7,0),(37,44,43,105,50,0),(39,8,46,24,24,0),(40,8,47,20,20,0),(41,8,48,20,20,0),(42,8,49,30,0,0),(43,8,50,30,50,0),(44,8,51,15,0,0),(45,8,52,15,30,0),(46,8,53,15,50,0),(47,8,54,60,50,0),(48,8,55,80,50,0),(49,8,56,64,40,0),(50,8,58,8,50,0),(51,8,59,7,40,0),(52,8,60,15,30,0),(53,8,61,30,30,0),(54,8,62,60,30,0),(55,8,63,30,30,0),(56,8,64,5,12,0),(57,8,65,10,24,0),(58,8,66,8,20,0),(59,8,67,8,20,0),(60,8,70,10,12,0),(61,8,71,26.4,12,0),(62,8,72,52.8,24,0),(63,8,73,44,20,0),(64,8,74,44,20,0),(65,8,75,13.2,12,0),(66,8,78,26.4,24,0),(67,8,77,22,20,0),(68,8,78,22,20,0),(69,8,79,24,12,0),(70,8,80,48,24,0),(71,8,81,40,20,0),(72,8,82,40,20,0),(73,8,83,9.6,12,0),(74,8,84,19.2,24,0),(75,8,84,16,20,0),(76,8,86,16,20,0),(77,47,87,30,164,0),(78,21,88,0,0,0),(79,21,89,0,0,0),(80,21,90,0,0,0),(81,21,91,0,0,0),(82,21,92,0,0,0),(83,21,93,0,0,0),(84,21,94,0,0,0),(85,21,95,0,0,0),(86,24,96,0,0,0),(87,24,97,0,0,0),(88,24,98,0,0,0),(89,47,99,45,32,0),(90,47,100,15,32,0),(91,47,101,15,32,0),(92,46,102,60,31,0),(93,46,103,15,31,0),(94,46,104,15,34,0),(95,46,105,75,34,0),(96,46,106,15,59,0),(97,46,107,15,3,0),(98,46,108,15,0,0),(99,46,109,93.6,39,0),(100,46,110,21.6,9,0);
/*!40000 ALTER TABLE `user_order_manufacturing_step` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `user_role`
--

DROP TABLE IF EXISTS `user_role`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `user_role` (
  `ID` int(11) NOT NULL AUTO_INCREMENT,
  `user_ID` int(11) NOT NULL,
  `role_ID` int(11) NOT NULL,
  PRIMARY KEY (`ID`),
  KEY `user_ID` (`user_ID`),
  KEY `post_ID` (`role_ID`),
  CONSTRAINT `user_role_ibfk_1` FOREIGN KEY (`user_ID`) REFERENCES `user` (`ID`) ON DELETE CASCADE ON UPDATE CASCADE,
  CONSTRAINT `user_role_ibfk_2` FOREIGN KEY (`role_ID`) REFERENCES `role` (`ID`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB AUTO_INCREMENT=76 DEFAULT CHARSET=utf8 COLLATE=utf8_hungarian_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `user_role`
--

LOCK TABLES `user_role` WRITE;
/*!40000 ALTER TABLE `user_role` DISABLE KEYS */;
INSERT INTO `user_role` VALUES (1,2,17),(2,49,18),(3,16,18),(4,1,15),(5,3,3),(6,3,4),(7,3,17),(8,10,7),(9,2,4),(10,4,7),(11,5,14),(12,6,14),(13,7,14),(14,8,14),(15,9,4),(16,9,3),(17,9,17),(18,12,2),(19,12,4),(20,12,10),(21,12,17),(22,13,14),(23,14,14),(24,15,14),(25,17,14),(26,18,14),(27,19,14),(28,20,14),(29,21,14),(30,22,14),(31,23,14),(32,24,14),(33,25,14),(34,26,14),(35,27,17),(36,27,14),(37,28,14),(38,29,14),(39,30,14),(40,32,14),(41,33,14),(42,34,10),(43,34,14),(44,35,20),(45,36,20),(46,37,14),(47,38,14),(48,39,14),(49,40,4),(50,40,17),(51,41,14),(53,43,3),(54,43,4),(55,43,17),(56,44,14),(57,45,14),(58,46,14),(59,47,14),(60,48,19),(62,51,14),(63,52,17),(64,52,14),(65,53,14),(66,54,14),(67,55,14),(68,56,3),(69,56,4),(70,56,10),(71,56,17),(72,57,14),(73,58,14);
/*!40000 ALTER TABLE `user_role` ENABLE KEYS */;
UNLOCK TABLES;
/*!40103 SET TIME_ZONE=@OLD_TIME_ZONE */;

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;

-- Dump completed on 2021-09-15 13:54:15
