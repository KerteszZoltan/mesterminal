-- phpMyAdmin SQL Dump
-- version 4.6.6deb4+deb9u2
-- https://www.phpmyadmin.net/
--
-- Gép: localhost:3306
-- Létrehozás ideje: 2021. Aug 10. 12:49
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
(1, 'Habosítás');

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
(6, 0, 'Deckel Maho Fém CNC'),
(7, 0, 'Rehm Robothegesztő'),
(8, 0, 'Afros B System Habosítógép'),
(9, 0, 'Turbosol betonpumpa'),
(10, 0, 'Zártszelvény daraboló'),
(11, 0, 'Cinege féle vákuumformázó'),
(12, 0, '80 tonnás présgép'),
(13, 0, '50 tonnás présgép'),
(14, 0, '30 tonnás présgép'),
(15, 0, '15 tonnás présgép'),
(16, 0, 'Resina habosítógép'),
(17, 0, 'Canon habosítógép'),
(18, 0, 'Régi lézervágógép Powercontrol'),
(19, 0, 'Atem vákuumformázógép'),
(20, 0, 'ATT-1 sárga CNC gép'),
(21, 0, 'Biko Hengerítőgép'),
(22, 0, 'GLD CNC élhajlítógép'),
(23, 0, 'Geiss vákuumformázógép'),
(24, 0, 'Hennecke habosítógép'),
(25, 0, 'Hammer B3 fűrészgép'),
(26, 0, 'VHF táblamaró'),
(27, 0, 'Rehm Hegesztőgép'),
(28, 0, 'Fronius Hegesztőgép');

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
(1, '', 'MUV0372', 'Hab belövés', 1);

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
(3, '1', 1, 'VRR20210810T', 2, 1, 1, 1, 0, 0, 2);

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
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT a táblához `category`
--
ALTER TABLE `category`
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
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
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT a táblához `operation`
--
ALTER TABLE `operation`
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT a táblához `order`
--
ALTER TABLE `order`
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT a táblához `order_machine_error`
--
ALTER TABLE `order_machine_error`
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT a táblához `order_machine_tool`
--
ALTER TABLE `order_machine_tool`
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT a táblához `order_manufacturing_step_user`
--
ALTER TABLE `order_manufacturing_step_user`
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT;
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
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT;
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
