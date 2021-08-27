-- phpMyAdmin SQL Dump
-- version 4.6.6deb4+deb9u2
-- https://www.phpmyadmin.net/
--
-- Gép: localhost:3306
-- Létrehozás ideje: 2021. Aug 12. 06:15
-- Kiszolgáló verziója: 10.1.48-MariaDB-0+deb9u2
-- PHP verzió: 7.0.33-0+deb9u10

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Adatbázis: `mesterminal`
--

-- --------------------------------------------------------

--
-- Tábla szerkezet ehhez a táblához `attachment`
--

CREATE TABLE `attachment` (
  `ID` int(11) NOT NULL,
  `name` varchar(255) COLLATE utf8_hungarian_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_hungarian_ci;

--
-- A tábla adatainak kiíratása `attachment`
--

INSERT INTO `attachment` (`ID`, `name`) VALUES
(2, '61139ce61da0a-1628675302.jpg'),
(3, '61139cf906054-1628675321.jpg'),
(4, '61139d0285fed-1628675330.jpg'),
(5, '61139d12e7b6c-1628675346.jpg'),
(6, '6113ae750790c-1628679797.jpg');

-- --------------------------------------------------------

--
-- Tábla szerkezet ehhez a táblához `category`
--

CREATE TABLE `category` (
  `ID` int(11) NOT NULL,
  `name` varchar(255) COLLATE utf8_hungarian_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_hungarian_ci;

--
-- A tábla adatainak kiíratása `category`
--

INSERT INTO `category` (`ID`, `name`) VALUES
(1, 'Habosítás'),
(2, 'Anyagmozgatás');

-- --------------------------------------------------------

--
-- Tábla szerkezet ehhez a táblához `error`
--

CREATE TABLE `error` (
  `ID` int(11) NOT NULL,
  `barcode` int(11) DEFAULT NULL,
  `name` varchar(200) COLLATE utf8_hungarian_ci DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_hungarian_ci;

-- --------------------------------------------------------

--
-- Tábla szerkezet ehhez a táblához `machine`
--

CREATE TABLE `machine` (
  `ID` int(11) NOT NULL,
  `barcode` int(11) DEFAULT NULL,
  `name` varchar(255) COLLATE utf8_hungarian_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_hungarian_ci;

--
-- A tábla adatainak kiíratása `machine`
--

INSERT INTO `machine` (`ID`, `barcode`, `name`) VALUES
(1, 0, 'Egyéb'),
(2, 0, 'Hongyuan ZL16 homlokrakodógép'),
(3, 0, 'Fiber Lézervágógép G3015E-22Q'),
(4, 0, 'AMADA HFE100-3 CNC élhajlító gép'),
(5, 0, 'Eduturn 360 CNC gép'),
(6, 0, 'Deckel Maho DMU 80T Fém CNC'),
(7, 0, 'Rehm Megaplus 430 WS Robothegesztő'),
(8, 0, 'Afros B System Habosítógép'),
(9, 0, 'Turbosol betonpumpa'),
(10, 0, 'Zártszelvény daraboló'),
(11, 0, 'Cinege féle vákuumformázó'),
(12, 0, '80 tonnás présgép'),
(13, 0, '50 tonnás présgép'),
(14, 0, '30 tonnás présgép'),
(15, 0, '15 tonnás présgép'),
(16, 0, 'Resina habosítógép'),
(17, 0, 'Canon Poliuretán Habosítógép'),
(18, 0, 'Régi lézervágógép Powercontrol'),
(19, 0, 'Atem vákuumformázógép'),
(20, 0, 'ATT-1 sárga CNC gép'),
(21, 0, 'Biko SRL B4-2528 NC  Hengerítőgép'),
(22, 0, 'GLD (wc67k-30t1600) CNC élhajlítógép'),
(23, 0, 'Geiss vákuumformázógép'),
(24, 0, 'Hennecke habosítógép'),
(25, 0, 'Hammer B3 fűrészgép'),
(26, 0, 'VHF 1 Táblamaró'),
(27, 0, 'Rehm Synergic Pro 220-2 Hegesztőgép'),
(28, 0, 'Fronius Tansplus Synergic 2700 Hegesztőgép');

-- --------------------------------------------------------

--
-- Tábla szerkezet ehhez a táblához `machine_tool`
--

CREATE TABLE `machine_tool` (
  `ID` int(11) NOT NULL,
  `barcode` int(11) DEFAULT NULL,
  `machine_ID` int(11) DEFAULT NULL,
  `name` varchar(255) COLLATE utf8_hungarian_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_hungarian_ci;

--
-- A tábla adatainak kiíratása `machine_tool`
--

INSERT INTO `machine_tool` (`ID`, `barcode`, `machine_ID`, `name`) VALUES
(1, 0, 8, 'Habosítófej');

-- --------------------------------------------------------

--
-- Tábla szerkezet ehhez a táblához `manufacturing_step`
--

CREATE TABLE `manufacturing_step` (
  `ID` int(11) NOT NULL,
  `barcode` varchar(255) COLLATE utf8_hungarian_ci DEFAULT NULL,
  `step_code` varchar(7) COLLATE utf8_hungarian_ci NOT NULL,
  `name` varchar(255) COLLATE utf8_hungarian_ci NOT NULL,
  `category_ID` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_hungarian_ci;

--
-- A tábla adatainak kiíratása `manufacturing_step`
--

INSERT INTO `manufacturing_step` (`ID`, `barcode`, `step_code`, `name`, `category_ID`) VALUES
(1, '', 'MUV0399', 'Acéllemez hajlítás', 1),
(2, '', 'MUV0400', 'Acéllemez lézervágás', 1),
(3, '', 'MUV0401', 'Aluminium hajlítás', 1),
(4, '', 'MUV0402', 'Aluminium lézervágás', 1),
(5, '', 'MUV0403', 'Rozsdamentes lemez hajlítás', 1),
(6, '', 'MUV0404', 'Rozsdamentes lemez lézervágás', 1),
(7, '', 'MUV0405', 'Horganyzott lemez hajlítás', 1),
(8, '', 'MUV0406', 'Horganyzott lemez lézervágás', 1),
(9, '', 'MUV0407', 'MDF darabolás', 1),
(10, '', 'MUV0408', '3D-s alkatrészrajz', 1),
(11, '', 'MUV0409', '3D-s CNC programírás', 1),
(12, '', 'MUV0410', '3D-s tervezés', 1),
(13, '', 'MUV0411', '2D-s alkatrészrajz', 1),
(14, '', 'MUV0412', '2D-s CNC programírás', 1),
(15, '', 'MUV0413', '2D-s tervezés', 1),
(16, '', 'MUV0414', 'Vákuumszívás', 1),
(17, '', 'MUV0415', 'Darabolás', 1),
(18, '', 'MUV0416', 'Ragasztás', 1),
(19, '', 'MUV0417', 'Cimkézés', 1),
(20, '', 'MUV0418', 'CNC marás', 1),
(21, '', 'MUV0419', 'Csiszolás', 1),
(22, '', 'MUV0420', 'Csomagolás raklapra', 1),
(23, '', 'MUV0421', 'Csomagolás papírdobozba', 1),
(24, '', 'MUV0422', 'Csomagolás polietilén zacskóba', 1),
(25, '', 'MUV0423', 'Csomagolás pufi fóliába', 1),
(26, '', 'MUV0424', 'Csomagolás hab fóliába', 1),
(27, '', 'MUV0425', 'Csomagoló doboz összeállítása', 1),
(28, '', 'MUV0426', 'Digitális nyomtatás', 1),
(29, '', 'MUV0427', 'Összeszerelés', 1),
(30, '', 'MUV0428', 'Szerszámbeállítás', 1),
(31, '', 'MUV0429', 'Napi karbantartás', 1),
(32, '', 'MUV0430', 'Előkészítés', 1),
(33, '', 'MUV0431', 'Felülettisztítás', 1),
(34, '', 'MUV0432', 'Fólia ragasztás', 1),
(35, '', 'MUV0433', 'Forgácseltávolítás, tisztítás', 1),
(36, '', 'MUV0434', 'Formaleválasztóval bekenni a szerszámot', 1),
(37, '', 'MUV0435', 'Fröccsöntés', 1),
(38, '', 'MUV0436', 'Furat CNC-n', 1),
(39, '', 'MUV0437', 'Fűrészelés', 1),
(40, '', 'MUV0438', 'Gépjavítás', 1),
(41, '', 'MUV0439', 'Hab belövés', 1),
(42, '', 'MUV0440', 'Plexi hajlítás', 1),
(43, '', 'MUV0441', 'Hegesztés', 1),
(44, '', 'MUV0442', 'Robothegesztés', 1),
(45, '', 'MUV0443', 'Hengerítés', 1),
(46, '', 'MUV0444', 'Hígító regenerálásához betöltés', 1),
(47, '', 'MUV0445', 'Hőhajlítás fűtőszállal', 1),
(48, '', 'MUV0446', 'Hőhajlítás', 1),
(49, '', 'MUV0447', 'Kábelezés', 1),
(50, '', 'MUV0448', 'Kettévágás CNC-n', 1),
(51, '', 'MUV0449', 'Kézi sorjázás', 1),
(52, '', 'MUV0450', 'Kilökőtüskékkel a behab. darab kivétele', 1),
(53, '', 'MUV0451', 'Festék bekeverése, pisztolyba töltése', 1),
(54, '', 'MUV0452', 'Körbe marás', 1),
(55, '', 'MUV0453', 'Körbe marás CNC-n', 1),
(56, '', 'MUV0454', 'Körbevágás', 1),
(57, '', 'MUV0455', 'Körbevágás CNC-vel', 1),
(58, '', 'MUV0456', 'Laminálás', 1),
(59, '', 'MUV0457', 'LED vezetékgyártás', 1),
(60, '', 'MUV0458', 'Lézervágás', 1),
(61, '', 'MUV0459', 'Lyukasztás', 1),
(62, '', 'MUV0460', 'Matricázás', 1),
(63, '', 'MUV0461', 'Menetmetszés', 1),
(64, '', 'MUV0462', 'Menet fúrás', 1),
(65, '', 'MUV0463', 'CNC esztergálás', 1),
(66, '', 'MUV0464', 'Pácolás', 1),
(67, '', 'MUV0465', 'Pakolás', 1),
(68, '', 'MUV0466', 'Pántolás', 1),
(69, '', 'MUV0467', 'Popszegecselés', 1),
(70, '', 'MUV0468', 'Porszórás', 1),
(71, '', 'MUV0469', 'Portalanítás', 1),
(72, '', 'MUV0470', 'Sarkazás', 1),
(73, '', 'MUV0471', 'Sorjázás', 1),
(74, '', 'MUV0472', 'Stancolás', 1),
(75, '', 'MUV0473', 'Szerelés, javítás', 1),
(76, '', 'MUV0474', 'Szitakészítés', 1),
(77, '', 'MUV0475', 'Szitamosás', 1),
(78, '', 'MUV0476', 'Szitanyomás', 1),
(79, '', 'MUV0477', 'Védőfólia lehúzás', 1),
(80, '', 'MUV0478', 'Védőfóliázás mindkét oldalon', 1),
(81, '', 'MUV0479', 'Irányítási feladatok', 1),
(82, '', 'MUV0480', 'Szerszámkészítés', 1),
(83, '', 'MUV0481', 'Szerszám tisztítás', 1);

-- --------------------------------------------------------

--
-- Tábla szerkezet ehhez a táblához `operation`
--

CREATE TABLE `operation` (
  `ID` int(11) NOT NULL,
  `name` varchar(255) COLLATE utf8_hungarian_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_hungarian_ci;

-- --------------------------------------------------------

--
-- Tábla szerkezet ehhez a táblához `order`
--

CREATE TABLE `order` (
  `ID` int(11) NOT NULL,
  `barcode` varchar(255) COLLATE utf8_hungarian_ci DEFAULT NULL,
  `order_type_ID` int(11) NOT NULL,
  `customer_number` varchar(255) COLLATE utf8_hungarian_ci DEFAULT NULL,
  `site_ID` int(11) DEFAULT NULL,
  `product_ID` int(11) DEFAULT NULL,
  `total_count` int(11) NOT NULL,
  `expected_count` int(11) NOT NULL,
  `pass_count` int(11) DEFAULT NULL,
  `fail_count` int(11) DEFAULT NULL,
  `order_status_ID` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_hungarian_ci;

--
-- A tábla adatainak kiíratása `order`
--

INSERT INTO `order` (`ID`, `barcode`, `order_type_ID`, `customer_number`, `site_ID`, `product_ID`, `total_count`, `expected_count`, `pass_count`, `fail_count`, `order_status_ID`) VALUES
(3, '0', 1, 'VRR20210810T', 2, 1, 10, 10, 10, 2, 2);

-- --------------------------------------------------------

--
-- Tábla szerkezet ehhez a táblához `order_machine_error`
--

CREATE TABLE `order_machine_error` (
  `ID` int(11) NOT NULL,
  `order_ID` int(11) DEFAULT NULL,
  `error_ID` int(11) NOT NULL,
  `machine_ID` int(11) DEFAULT NULL,
  `machine_tool_ID` int(11) DEFAULT NULL,
  `date_start` datetime DEFAULT NULL,
  `date_end` datetime DEFAULT NULL,
  `user_ID` int(11) DEFAULT NULL,
  `description` text COLLATE utf8_hungarian_ci
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_hungarian_ci;

-- --------------------------------------------------------

--
-- Tábla szerkezet ehhez a táblához `order_machine_tool`
--

CREATE TABLE `order_machine_tool` (
  `ID` int(11) NOT NULL,
  `order_ID` int(11) DEFAULT NULL,
  `machine_ID` int(11) DEFAULT NULL,
  `machine_tool_ID` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_hungarian_ci;

--
-- A tábla adatainak kiíratása `order_machine_tool`
--

INSERT INTO `order_machine_tool` (`ID`, `order_ID`, `machine_ID`, `machine_tool_ID`) VALUES
(1, 3, 17, 1);

-- --------------------------------------------------------

--
-- Tábla szerkezet ehhez a táblához `order_manufacturing_step_user`
--

CREATE TABLE `order_manufacturing_step_user` (
  `ID` int(11) NOT NULL,
  `order_ID` int(11) NOT NULL,
  `manufacturing_step_ID` int(11) NOT NULL,
  `user_ID` int(11) NOT NULL,
  `expected_count` int(11) NOT NULL,
  `pass_count` int(11) DEFAULT NULL,
  `fail_count` int(11) DEFAULT NULL,
  `time` int(11) DEFAULT NULL,
  `normal_time` float NOT NULL,
  `preparation_time` float NOT NULL,
  `unit_of_time` float NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_hungarian_ci;

--
-- A tábla adatainak kiíratása `order_manufacturing_step_user`
--

INSERT INTO `order_manufacturing_step_user` (`ID`, `order_ID`, `manufacturing_step_ID`, `user_ID`, `expected_count`, `pass_count`, `fail_count`, `time`, `normal_time`, `preparation_time`, `unit_of_time`) VALUES
(1, 3, 1, 0, 1, 1, 0, 0, 3, 0.1, 4),
(2, 3, 3, 0, 0, 0, 0, 0, 0.2, 0, 0.2),
(3, 3, 4, 0, 0, 0, 0, 0, 0, 60, 0);

-- --------------------------------------------------------

--
-- Tábla szerkezet ehhez a táblához `order_status`
--

CREATE TABLE `order_status` (
  `ID` int(11) NOT NULL,
  `name` varchar(255) COLLATE utf8_hungarian_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_hungarian_ci;

--
-- A tábla adatainak kiíratása `order_status`
--

INSERT INTO `order_status` (`ID`, `name`) VALUES
(1, 'Teljesített'),
(2, 'Folyamatban');

-- --------------------------------------------------------

--
-- Tábla szerkezet ehhez a táblához `order_type`
--

CREATE TABLE `order_type` (
  `ID` int(11) NOT NULL,
  `name` varchar(255) COLLATE utf8_hungarian_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_hungarian_ci;

--
-- A tábla adatainak kiíratása `order_type`
--

INSERT INTO `order_type` (`ID`, `name`) VALUES
(1, 'Gyártás'),
(2, 'TMK');

-- --------------------------------------------------------

--
-- Tábla szerkezet ehhez a táblához `product`
--

CREATE TABLE `product` (
  `ID` int(11) NOT NULL,
  `barcode` int(11) DEFAULT NULL,
  `name` varchar(255) COLLATE utf8_hungarian_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_hungarian_ci;

--
-- A tábla adatainak kiíratása `product`
--

INSERT INTO `product` (`ID`, `barcode`, `name`) VALUES
(1, 0, 'Habosított Oldalelem');

-- --------------------------------------------------------

--
-- Tábla szerkezet ehhez a táblához `product_attachment`
--

CREATE TABLE `product_attachment` (
  `ID` int(11) NOT NULL,
  `attachment_ID` int(11) NOT NULL,
  `product_ID` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_hungarian_ci;

--
-- A tábla adatainak kiíratása `product_attachment`
--

INSERT INTO `product_attachment` (`ID`, `attachment_ID`, `product_ID`) VALUES
(2, 2, 1),
(4, 4, 1),
(5, 5, 1),
(6, 6, 1);

-- --------------------------------------------------------

--
-- Tábla szerkezet ehhez a táblához `role`
--

CREATE TABLE `role` (
  `ID` int(11) NOT NULL,
  `name` varchar(255) COLLATE utf8_hungarian_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_hungarian_ci;

-- --------------------------------------------------------

--
-- Tábla szerkezet ehhez a táblához `site`
--

CREATE TABLE `site` (
  `ID` int(11) NOT NULL,
  `city` varchar(255) COLLATE utf8_hungarian_ci NOT NULL,
  `street` varchar(255) COLLATE utf8_hungarian_ci NOT NULL,
  `house_number` varchar(10) COLLATE utf8_hungarian_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_hungarian_ci;

--
-- A tábla adatainak kiíratása `site`
--

INSERT INTO `site` (`ID`, `city`, `street`, `house_number`) VALUES
(1, 'Jászapáti', 'Vasút út', '10.'),
(2, 'Jászapáti', 'Vasút út', '29.');

-- --------------------------------------------------------

--
-- Tábla szerkezet ehhez a táblához `user`
--

CREATE TABLE `user` (
  `ID` int(11) NOT NULL,
  `barcode` int(11) DEFAULT NULL,
  `name` varchar(255) COLLATE utf8_hungarian_ci NOT NULL,
  `phone` varchar(12) COLLATE utf8_hungarian_ci NOT NULL,
  `email` varchar(255) COLLATE utf8_hungarian_ci NOT NULL,
  `password` varchar(100) COLLATE utf8_hungarian_ci NOT NULL,
  `type` varchar(100) COLLATE utf8_hungarian_ci DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_hungarian_ci;

--
-- A tábla adatainak kiíratása `user`
--

INSERT INTO `user` (`ID`, `barcode`, `name`, `phone`, `email`, `password`, `type`) VALUES
(0, 0, 'Még nem definiált', '', '', '', 'Dolgozó'),
(1, 0, 'Kertesz Zoltán', '', 'teszt@teszt.hu', '6c90aa3760658846a86a263a4e92630e', 'Adminisztrátor'),
(2, 0, 'Urbán Kristóf', '', 'kristofurban41@gmail.com', 'de1914daf87531db1536dcf0974e6973', 'Adminisztrátor'),
(3, 0, 'Szabó Helga', '', 'szabo.helga@radius.hu', 'Helga', 'Adminisztrátor'),
(4, 0, 'Borbás Nándor', '', '', '', 'Dolgozó'),
(5, 0, 'Birkásné Bőzse Katalin', '', '', '', 'Dolgozó'),
(6, 0, 'Lebán József', '', '', '', 'Dolgozó'),
(7, 0, 'Nagy Ádám', '', '', '', 'Dolgozó'),
(8, 0, 'Németh Attila', '', '', '', 'Dolgozó'),
(9, 0, 'Birkás Éva', '', '', '', 'Dolgozó'),
(10, 0, 'Borbás Ferenc', '', 'ferenc.borbas@radius.hu', 'Ferenc', 'Adminisztrátor'),
(11, 0, 'Ifj. Borbás Ferenc', '', '', '', 'Dolgozó'),
(12, 0, 'Bagi Sándorné Nikolett', '', '', '', 'Dolgozó'),
(13, 0, 'Barócsi Gergő', '', '', '', 'Dolgozó'),
(14, 0, 'Birkás Tibor', '', '', '', 'Dolgozó'),
(15, 0, 'Borbély Imre', '', '', '', 'Dolgozó'),
(16, 0, 'Budainé Stupek Edit', '', '', '', 'Dolgozó'),
(17, 0, 'Csajbók Ferenc', '', '', '', 'Dolgozó'),
(18, 0, 'Csajbók Róbert Ferenc', '', '', '', 'Dolgozó'),
(19, 0, 'Demeter Edina', '', '', '', 'Dolgozó'),
(20, 0, 'Járvás Miklós', '', '', '', 'Dolgozó'),
(21, 0, 'Kis Gábor Csaba', '', '', '', 'Dolgozó'),
(22, 0, 'Kiss László', '', '', '', 'Dolgozó'),
(23, 0, 'Kocsis Kálmán', '', '', '', 'Dolgozó'),
(24, 0, 'Major László', '', '', '', 'Dolgozó'),
(25, 0, 'Novák-Borbás János', '', '', '', 'Dolgozó'),
(26, 0, 'Peczek Erika', '', '', '', 'Dolgozó'),
(27, 0, 'Rózsa-Mauric Péter', '', '', '', 'Dolgozó'),
(28, 0, 'Serényi Gábor', '', '', '', 'Dolgozó'),
(29, 0, 'Stoklász Zoltán', '', '', '', 'Dolgozó'),
(30, 0, 'Szabari István', '', '', '', 'Dolgozó'),
(31, 0, 'Urbán Irén', '', '', '', 'Dolgozó'),
(32, 0, 'Zagyi László', '', '', '', 'Dolgozó'),
(33, 0, 'Zámbó Attila', '', '', '', 'Dolgozó'),
(34, 0, 'Báthor Pál', '', '', '', 'Dolgozó'),
(35, 0, 'Borbásné Budai Valéria', '', '', '', 'Dolgozó'),
(36, 0, 'Borbásné Rostás Anikó', '', '', '', 'Dolgozó'),
(37, 0, 'Bugyi Béla', '', '', '', 'Dolgozó'),
(38, 0, 'Tóth László', '', '', '', 'Dolgozó'),
(39, 0, 'Urbán István', '', '', '', 'Dolgozó'),
(40, 0, 'Balla-Tajti Ivett', '', '', '', 'Dolgozó'),
(41, 0, 'Horváth Tamás', '', '', '', 'Dolgozó'),
(42, 0, 'Erdei Gergő', '', '', '', 'Dolgozó'),
(43, 0, 'Léhiné Ádám Mária', '', '', '', 'Dolgozó'),
(44, 0, 'Nagy Imre Krisztián', '', '', '', 'Dolgozó'),
(45, 0, 'Lóczi Pál', '', '', '', 'Dolgozó'),
(46, 0, 'Major Andrásné', '', '', '', 'Dolgozó'),
(47, 0, 'Major Zsuzsanna', '', '', '', 'Dolgozó'),
(48, 0, 'Pataki László', '', '', '', 'Dolgozó'),
(49, 0, 'Mihályi Zoltán', '', '', '', 'Dolgozó'),
(50, 0, 'Pethő Edit', '', '', '', 'Dolgozó'),
(51, 0, 'Németh Tamás', '', '', '', 'Dolgozó'),
(52, 0, 'Csete Mihály', '', '', '', 'Dolgozó'),
(53, 0, 'Csík Tibor', '', '', '', 'Dolgozó'),
(54, 0, 'Jász Borbála', '', '', '', 'Dolgozó'),
(55, 0, 'Kovács Mihály', '', '', '', 'Dolgozó'),
(56, 0, 'Szabariné Orosz Ágnes', '', '', '', 'Dolgozó'),
(57, 0, 'Tóth Béla', '', '', '', 'Dolgozó'),
(58, 0, 'Szabari Edit', '', '', '', 'Dolgozó');

-- --------------------------------------------------------

--
-- Tábla szerkezet ehhez a táblához `user_operation`
--

CREATE TABLE `user_operation` (
  `ID` int(11) NOT NULL,
  `user_ID` int(11) NOT NULL,
  `operation_ID` int(11) NOT NULL,
  `time` int(11) NOT NULL,
  `month` varchar(11) COLLATE utf8_hungarian_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_hungarian_ci;

-- --------------------------------------------------------

--
-- Tábla szerkezet ehhez a táblához `user_order`
--

CREATE TABLE `user_order` (
  `ID` int(11) NOT NULL,
  `user_ID` int(11) NOT NULL,
  `order_ID` int(11) NOT NULL,
  `time` int(11) DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_hungarian_ci;

-- --------------------------------------------------------

--
-- Tábla szerkezet ehhez a táblához `user_role`
--

CREATE TABLE `user_role` (
  `ID` int(11) NOT NULL,
  `user_ID` int(11) NOT NULL,
  `role_ID` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_hungarian_ci;

--
-- Indexek a kiírt táblákhoz
--

--
-- A tábla indexei `attachment`
--
ALTER TABLE `attachment`
  ADD PRIMARY KEY (`ID`);

--
-- A tábla indexei `category`
--
ALTER TABLE `category`
  ADD PRIMARY KEY (`ID`);

--
-- A tábla indexei `error`
--
ALTER TABLE `error`
  ADD PRIMARY KEY (`ID`);

--
-- A tábla indexei `machine`
--
ALTER TABLE `machine`
  ADD PRIMARY KEY (`ID`);

--
-- A tábla indexei `machine_tool`
--
ALTER TABLE `machine_tool`
  ADD PRIMARY KEY (`ID`),
  ADD KEY `machine_ID` (`machine_ID`);

--
-- A tábla indexei `manufacturing_step`
--
ALTER TABLE `manufacturing_step`
  ADD PRIMARY KEY (`ID`),
  ADD KEY `category_ID` (`category_ID`);

--
-- A tábla indexei `operation`
--
ALTER TABLE `operation`
  ADD PRIMARY KEY (`ID`);

--
-- A tábla indexei `order`
--
ALTER TABLE `order`
  ADD PRIMARY KEY (`ID`),
  ADD KEY `order_type_ID` (`order_type_ID`),
  ADD KEY `site_ID` (`site_ID`),
  ADD KEY `product_ID` (`product_ID`),
  ADD KEY `order_status_ID` (`order_status_ID`);

--
-- A tábla indexei `order_machine_error`
--
ALTER TABLE `order_machine_error`
  ADD PRIMARY KEY (`ID`),
  ADD KEY `order_ID` (`order_ID`),
  ADD KEY `error_ID` (`error_ID`),
  ADD KEY `machine_ID` (`machine_ID`),
  ADD KEY `machine_tool_ID` (`machine_tool_ID`),
  ADD KEY `user_ID` (`user_ID`);

--
-- A tábla indexei `order_machine_tool`
--
ALTER TABLE `order_machine_tool`
  ADD PRIMARY KEY (`ID`),
  ADD KEY `order_ID` (`order_ID`),
  ADD KEY `machine_ID` (`machine_ID`),
  ADD KEY `machine_tool_ID` (`machine_tool_ID`);

--
-- A tábla indexei `order_manufacturing_step_user`
--
ALTER TABLE `order_manufacturing_step_user`
  ADD PRIMARY KEY (`ID`),
  ADD KEY `order_ID` (`order_ID`),
  ADD KEY `manufacturing_step_ID` (`manufacturing_step_ID`),
  ADD KEY `user_ID` (`user_ID`);

--
-- A tábla indexei `order_status`
--
ALTER TABLE `order_status`
  ADD PRIMARY KEY (`ID`);

--
-- A tábla indexei `order_type`
--
ALTER TABLE `order_type`
  ADD PRIMARY KEY (`ID`);

--
-- A tábla indexei `product`
--
ALTER TABLE `product`
  ADD PRIMARY KEY (`ID`);

--
-- A tábla indexei `product_attachment`
--
ALTER TABLE `product_attachment`
  ADD PRIMARY KEY (`ID`),
  ADD KEY `attachment_ID` (`attachment_ID`),
  ADD KEY `product_ID` (`product_ID`);

--
-- A tábla indexei `role`
--
ALTER TABLE `role`
  ADD PRIMARY KEY (`ID`);

--
-- A tábla indexei `site`
--
ALTER TABLE `site`
  ADD PRIMARY KEY (`ID`);

--
-- A tábla indexei `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`ID`);

--
-- A tábla indexei `user_operation`
--
ALTER TABLE `user_operation`
  ADD PRIMARY KEY (`ID`),
  ADD KEY `user_ID` (`user_ID`),
  ADD KEY `operation_ID` (`operation_ID`);

--
-- A tábla indexei `user_order`
--
ALTER TABLE `user_order`
  ADD PRIMARY KEY (`ID`),
  ADD KEY `user_ID` (`user_ID`),
  ADD KEY `order_ID` (`order_ID`);

--
-- A tábla indexei `user_role`
--
ALTER TABLE `user_role`
  ADD PRIMARY KEY (`ID`),
  ADD KEY `user_ID` (`user_ID`),
  ADD KEY `post_ID` (`role_ID`);

--
-- A kiírt táblák AUTO_INCREMENT értéke
--

--
-- AUTO_INCREMENT a táblához `attachment`
--
ALTER TABLE `attachment`
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;
--
-- AUTO_INCREMENT a táblához `category`
--
ALTER TABLE `category`
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
--
-- AUTO_INCREMENT a táblához `error`
--
ALTER TABLE `error`
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT a táblához `machine`
--
ALTER TABLE `machine`
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=29;
--
-- AUTO_INCREMENT a táblához `machine_tool`
--
ALTER TABLE `machine_tool`
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT a táblához `manufacturing_step`
--
ALTER TABLE `manufacturing_step`
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=84;
--
-- AUTO_INCREMENT a táblához `operation`
--
ALTER TABLE `operation`
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT a táblához `order`
--
ALTER TABLE `order`
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;
--
-- AUTO_INCREMENT a táblához `order_machine_error`
--
ALTER TABLE `order_machine_error`
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT a táblához `order_machine_tool`
--
ALTER TABLE `order_machine_tool`
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT a táblához `order_manufacturing_step_user`
--
ALTER TABLE `order_manufacturing_step_user`
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
--
-- AUTO_INCREMENT a táblához `order_status`
--
ALTER TABLE `order_status`
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
--
-- AUTO_INCREMENT a táblához `order_type`
--
ALTER TABLE `order_type`
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
--
-- AUTO_INCREMENT a táblához `product`
--
ALTER TABLE `product`
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT a táblához `product_attachment`
--
ALTER TABLE `product_attachment`
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;
--
-- AUTO_INCREMENT a táblához `role`
--
ALTER TABLE `role`
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT a táblához `site`
--
ALTER TABLE `site`
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
--
-- AUTO_INCREMENT a táblához `user`
--
ALTER TABLE `user`
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=59;
--
-- AUTO_INCREMENT a táblához `user_operation`
--
ALTER TABLE `user_operation`
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT a táblához `user_order`
--
ALTER TABLE `user_order`
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT a táblához `user_role`
--
ALTER TABLE `user_role`
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT;
--
-- Megkötések a kiírt táblákhoz
--

--
-- Megkötések a táblához `machine_tool`
--
ALTER TABLE `machine_tool`
  ADD CONSTRAINT `machine_tool_ibfk_1` FOREIGN KEY (`machine_ID`) REFERENCES `machine` (`ID`);

--
-- Megkötések a táblához `manufacturing_step`
--
ALTER TABLE `manufacturing_step`
  ADD CONSTRAINT `manufacturing_step_ibfk_1` FOREIGN KEY (`category_ID`) REFERENCES `category` (`ID`);

--
-- Megkötések a táblához `order`
--
ALTER TABLE `order`
  ADD CONSTRAINT `order_ibfk_1` FOREIGN KEY (`order_type_ID`) REFERENCES `order_type` (`ID`),
  ADD CONSTRAINT `order_ibfk_2` FOREIGN KEY (`site_ID`) REFERENCES `site` (`ID`),
  ADD CONSTRAINT `order_ibfk_3` FOREIGN KEY (`product_ID`) REFERENCES `product` (`ID`),
  ADD CONSTRAINT `order_ibfk_4` FOREIGN KEY (`order_status_ID`) REFERENCES `order_status` (`ID`);

--
-- Megkötések a táblához `order_machine_error`
--
ALTER TABLE `order_machine_error`
  ADD CONSTRAINT `order_machine_error_ibfk_1` FOREIGN KEY (`order_ID`) REFERENCES `order` (`ID`),
  ADD CONSTRAINT `order_machine_error_ibfk_2` FOREIGN KEY (`error_ID`) REFERENCES `error` (`ID`),
  ADD CONSTRAINT `order_machine_error_ibfk_3` FOREIGN KEY (`machine_ID`) REFERENCES `machine` (`ID`),
  ADD CONSTRAINT `order_machine_error_ibfk_4` FOREIGN KEY (`machine_tool_ID`) REFERENCES `machine_tool` (`ID`),
  ADD CONSTRAINT `order_machine_error_ibfk_5` FOREIGN KEY (`user_ID`) REFERENCES `user` (`ID`);

--
-- Megkötések a táblához `order_machine_tool`
--
ALTER TABLE `order_machine_tool`
  ADD CONSTRAINT `order_machine_tool_ibfk_1` FOREIGN KEY (`order_ID`) REFERENCES `order` (`ID`),
  ADD CONSTRAINT `order_machine_tool_ibfk_2` FOREIGN KEY (`machine_ID`) REFERENCES `machine` (`ID`),
  ADD CONSTRAINT `order_machine_tool_ibfk_3` FOREIGN KEY (`machine_tool_ID`) REFERENCES `machine_tool` (`ID`);

--
-- Megkötések a táblához `order_manufacturing_step_user`
--
ALTER TABLE `order_manufacturing_step_user`
  ADD CONSTRAINT `order_manufacturing_step_user_ibfk_1` FOREIGN KEY (`order_ID`) REFERENCES `order` (`ID`),
  ADD CONSTRAINT `order_manufacturing_step_user_ibfk_2` FOREIGN KEY (`manufacturing_step_ID`) REFERENCES `manufacturing_step` (`ID`),
  ADD CONSTRAINT `order_manufacturing_step_user_ibfk_3` FOREIGN KEY (`user_ID`) REFERENCES `user` (`ID`);

--
-- Megkötések a táblához `product_attachment`
--
ALTER TABLE `product_attachment`
  ADD CONSTRAINT `product_attachment_ibfk_1` FOREIGN KEY (`attachment_ID`) REFERENCES `attachment` (`ID`),
  ADD CONSTRAINT `product_attachment_ibfk_2` FOREIGN KEY (`product_ID`) REFERENCES `product` (`ID`);

--
-- Megkötések a táblához `user_operation`
--
ALTER TABLE `user_operation`
  ADD CONSTRAINT `user_operation_ibfk_1` FOREIGN KEY (`user_ID`) REFERENCES `user` (`ID`),
  ADD CONSTRAINT `user_operation_ibfk_2` FOREIGN KEY (`operation_ID`) REFERENCES `operation` (`ID`);

--
-- Megkötések a táblához `user_order`
--
ALTER TABLE `user_order`
  ADD CONSTRAINT `user_order_ibfk_1` FOREIGN KEY (`user_ID`) REFERENCES `user` (`ID`),
  ADD CONSTRAINT `user_order_ibfk_2` FOREIGN KEY (`order_ID`) REFERENCES `order` (`ID`);

--
-- Megkötések a táblához `user_role`
--
ALTER TABLE `user_role`
  ADD CONSTRAINT `user_role_ibfk_1` FOREIGN KEY (`user_ID`) REFERENCES `user` (`ID`),
  ADD CONSTRAINT `user_role_ibfk_2` FOREIGN KEY (`role_ID`) REFERENCES `role` (`ID`);

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
