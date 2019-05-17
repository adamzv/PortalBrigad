-- phpMyAdmin SQL Dump
-- version 4.7.4
-- https://www.phpmyadmin.net/
--
-- Hostiteľ: 127.0.0.1
-- Čas generovania: Pi 17.Máj 2019, 15:20
-- Verzia serveru: 10.1.28-MariaDB
-- Verzia PHP: 7.1.11

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Databáza: `brigadyzv`
--

-- --------------------------------------------------------

--
-- Štruktúra tabuľky pre tabuľku `brigady`
--

CREATE TABLE `brigady` (
  `idbrigady` int(11) NOT NULL,
  `nazov` varchar(40) NOT NULL,
  `popis` text NOT NULL,
  `hod_mzda` double NOT NULL,
  `od` date NOT NULL,
  `aktivna` tinyint(1) NOT NULL,
  `idzamestnavatelia` int(11) NOT NULL,
  `idkategorie` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Sťahujem dáta pre tabuľku `brigady`
--

INSERT INTO `brigady` (`idbrigady`, `nazov`, `popis`, `hod_mzda`, `od`, `aktivna`, `idzamestnavatelia`, `idkategorie`) VALUES
(10, 'Java programátor', '<b>Sed lorem erat</b>, finibus at pretium quis, tempor nec ipsum. Nam hendrerit tellus eu augue dapibus, ac rutrum leo pharetra. Donec scelerisque sit amet eros eget gravida. Maecenas vestibulum ipsum a elit sodales consectetur. Morbi vitae accumsan nisi. Mauris gravida mattis metus, sit amet imperdiet metus suscipit non. Donec nec leo lobortis, rutrum sapien nec, condimentum dui. Nam et erat ligula. Suspendisse bibendum eleifend sapien, eu porttitor libero dictum non. Sed accumsan, orci sit amet scelerisque maximus, justo augue tristique nisl, eu pharetra leo justo nec mi. Suspendisse potenti. Etiam nibh nibh, lobortis sit amet augue non, dictum finibus nisl. Sed auctor dui vitae ligula ultricies dictum.', 3.8, '2019-03-03', 1, 15, 5),
(11, 'Java Android programátor', 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Mauris quis risus dictum, auctor dui in, gravida elit. Sed non luctus leo, vel maximus eros. Nunc luctus tristique quam id lobortis. Nullam in ante sit amet lacus pharetra tincidunt eget aliquam metus. Nunc dapibus lorem lacinia neque sollicitudin, sit amet porta diam tincidunt. Pellentesque lobortis feugiat massa et efficitur. Donec tincidunt eget metus euismod ullamcorper. Nunc ante nibh, auctor in orci vel, laoreet viverra dolor. Vivamus magna massa, feugiat in lorem sit amet, lobortis vulputate dolor. Morbi facilisis viverra turpis ut consectetur. Morbi fermentum diam eu metus rutrum, in ultricies est aliquam. Integer tincidunt urna diam. Sed commodo, urna in feugiat tincidunt, justo dolor pulvinar libero, ut ultricies nisl lorem vitae erat. Cras posuere, ex a semper faucibus, urna quam vulputate nisi, et convallis mauris lacus malesuada turpis. Integer bibendum mattis elit rhoncus iaculis.\r\n\r\nSed lorem erat, finibus at pretium quis, tempor nec ipsum. Nam hendrerit tellus eu augue dapibus, ac rutrum leo pharetra. Donec scelerisque sit amet eros eget gravida. Maecenas vestibulum ipsum a elit sodales consectetur. Morbi vitae accumsan nisi. Mauris gravida mattis metus, sit amet imperdiet metus suscipit non. Donec nec leo lobortis, rutrum sapien nec, condimentum dui. Nam et erat ligula. Suspendisse bibendum eleifend sapien, eu porttitor libero dictum non. Sed accumsan, orci sit amet scelerisque maximus, justo augue tristique nisl, eu pharetra leo justo nec mi. Suspendisse potenti. Etiam nibh nibh, lobortis sit amet augue non, dictum finibus nisl. Sed auctor dui vitae ligula ultricies dictum.', 4.8, '2019-03-22', 1, 15, 4),
(12, 'Java EE developer', 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Mauris quis risus dictum, auctor dui in, gravida elit. Sed non luctus leo, vel maximus eros. Nunc luctus tristique quam id lobortis. Nullam in ante sit amet lacus pharetra tincidunt eget aliquam metus. Nunc dapibus lorem lacinia neque sollicitudin, sit amet porta diam tincidunt. Pellentesque lobortis feugiat massa et efficitur. Donec tincidunt eget metus euismod ullamcorper. Nunc ante nibh, auctor in orci vel, laoreet viverra dolor. Vivamus magna massa, feugiat in lorem sit amet, lobortis vulputate dolor. Morbi facilisis viverra turpis ut consectetur. Morbi fermentum diam eu metus rutrum, in ultricies est aliquam. Integer tincidunt urna diam.', 5.3, '2019-05-18', 1, 18, 5),
(13, 'Hľadáme grafika', 'Sed lorem erat, finibus at pretium quis, tempor nec ipsum. Nam hendrerit tellus eu augue dapibus, ac rutrum leo pharetra. Donec scelerisque sit amet eros eget gravida. Maecenas vestibulum ipsum a elit sodales consectetur. Morbi vitae accumsan nisi. Mauris gravida mattis metus, sit amet imperdiet metus suscipit non. Donec nec leo lobortis, rutrum sapien nec, condimentum dui. Nam et erat ligula. Suspendisse bibendum eleifend sapien, eu porttitor libero dictum non. Sed accumsan, orci sit amet scelerisque maximus, justo augue tristique nisl, eu pharetra leo justo nec mi. Suspendisse potenti. Etiam nibh nibh, lobortis sit amet augue non, dictum finibus nisl. Sed auctor dui vitae ligula ultricies dictum.\r\n\r\nQuisque a nulla sit amet velit luctus elementum nec nec est. In placerat purus ligula, a elementum purus vulputate sed. Integer sollicitudin blandit cursus. Sed commodo imperdiet est eu pretium. Ut efficitur risus vel vehicula sagittis. Sed laoreet nec ipsum euismod pretium. Duis finibus eleifend ipsum quis fringilla. Aliquam ut augue feugiat, vulputate neque varius, blandit felis. Aenean aliquam diam porttitor sagittis hendrerit.', 4, '2019-04-15', 0, 15, 10),
(14, 'Hľadáme šikovného PHP prográmatora', 'Integer mattis mauris at lorem mollis aliquet. Curabitur sit amet tincidunt lectus. Aliquam laoreet, dolor a aliquet pellentesque, elit lacus sollicitudin elit, aliquam gravida mi mi eu augue. Aliquam urna nisl, luctus id sem ut, aliquet feugiat sem. Morbi lorem ligula, lacinia a eros vitae, volutpat rutrum enim.\r\n\r\nPellentesque eget porta leo. Pellentesque in elementum urna. Morbi vel massa urna. Etiam nisi augue, ultrices imperdiet mollis at, pulvinar ac turpis. Integer commodo blandit ligula vulputate finibus. Suspendisse potenti. Curabitur elementum, nibh rutrum facilisis eleifend, leo orci semper enim, sed tristique magna augue at sem. Fusce eget tincidunt dolor, quis eleifend lacus. Vestibulum sit amet consectetur lorem. Donec vestibulum urna nisi, id ullamcorper risus vestibulum quis. Cras consectetur ex in magna tempor consectetur. Interdum et malesuada fames ac ante ipsum primis in faucibus. Sed dignissim auctor velit. Quisque mattis dictum nisi, a iaculis libero imperdiet quis. Vivamus ac posuere felis. Ut auctor ligula nulla, quis ultricies urna lobortis eget.', 4.9, '2019-05-03', 1, 17, 7),
(15, 'Hľadáme PHP programátora', 'Chocolate bar pastry bonbon powder jelly beans cupcake. Toffee jelly chocolate bar muffin cupcake carrot cake tiramisu. Candy canes gummies jujubes jelly-o liquorice gingerbread cupcake croissant. Lollipop chocolate powder. Gummies muffin chocolate tiramisu toffee. Sugar plum fruitcake muffin biscuit wafer candy cheesecake. Tiramisu gingerbread pastry. Dragée chocolate cake caramels bonbon bonbon chocolate bar sweet roll cookie. Gummies lollipop muffin. Cake wafer apple pie wafer. Donut tart jujubes candy powder gingerbread lollipop cake. Jelly-o chupa chups caramels sweet roll. Pastry toffee marzipan topping jelly-o sweet roll chocolate bar wafer ice cream. Tart sugar plum candy canes danish toffee carrot cake. <i>Cupcake Ipsum</i>.', 4.6, '2019-05-14', 1, 19, 7),
(16, 'Hľadáme Java Spring developera', 'Jujubes gummi bears lollipop caramels carrot cake cake. Sweet chocolate cake icing pie. Tiramisu dragée wafer jelly pudding wafer. Sesame snaps jelly gingerbread gummies chocolate cake biscuit candy canes. Sweet powder marshmallow jelly-o. Lollipop sweet tart halvah macaroon gummies cake donut. Chocolate cake chocolate cake gummies lemon drops toffee sesame snaps candy. Wafer dragée chocolate cake. Chocolate chocolate cake danish danish. Bonbon cookie tootsie roll cupcake marshmallow wafer. Chocolate bar dragée bear claw brownie. Jelly-o candy canes croissant gummies. Marshmallow danish jelly-o tart topping cupcake.\r\n\r\nSweet bear claw gummi bears donut chocolate cheesecake cheesecake. Liquorice chupa chups lollipop lollipop candy canes sugar plum caramels carrot cake chocolate cake. Gummi bears sesame snaps cookie liquorice halvah caramels tootsie roll cheesecake gummi bears. Dragée macaroon jelly cotton candy. Candy pudding brownie cotton candy powder. Gingerbread bonbon danish croissant cheesecake soufflé oat cake brownie. Toffee biscuit cookie. Brownie cheesecake sweet roll apple pie biscuit jelly beans chocolate liquorice gingerbread.', 6.9, '2019-05-15', 1, 16, 5);

-- --------------------------------------------------------

--
-- Štruktúra tabuľky pre tabuľku `brigady_has_studenti`
--

CREATE TABLE `brigady_has_studenti` (
  `id` int(11) NOT NULL,
  `idbrigady` int(11) NOT NULL,
  `idstudenti` int(11) NOT NULL,
  `nastup` date DEFAULT NULL,
  `ukoncenie` date DEFAULT NULL,
  `aktivna` tinyint(1) NOT NULL,
  `doh_hod_mzda` double NOT NULL,
  `provizia` double NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Sťahujem dáta pre tabuľku `brigady_has_studenti`
--

INSERT INTO `brigady_has_studenti` (`id`, `idbrigady`, `idstudenti`, `nastup`, `ukoncenie`, `aktivna`, `doh_hod_mzda`, `provizia`) VALUES
(3, 12, 16, '2019-06-03', '2019-11-30', 0, 5.3, 1),
(12, 13, 19, '2019-04-15', NULL, 1, 4.5, 0.5),
(14, 16, 18, '2019-05-28', NULL, 1, 6.9, 0.8),
(15, 11, 17, '2019-06-03', '2020-01-01', 1, 5, 0.5);

-- --------------------------------------------------------

--
-- Štruktúra tabuľky pre tabuľku `kategorie`
--

CREATE TABLE `kategorie` (
  `idkategorie` int(11) NOT NULL,
  `kategoria` varchar(25) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Sťahujem dáta pre tabuľku `kategorie`
--

INSERT INTO `kategorie` (`idkategorie`, `kategoria`) VALUES
(8, 'Administratívny pracovník'),
(4, 'Android programátor'),
(9, 'Databázový analytik'),
(10, 'Dizajnér'),
(5, 'Java programátor'),
(7, 'PHP programátor');

-- --------------------------------------------------------

--
-- Štruktúra tabuľky pre tabuľku `studenti`
--

CREATE TABLE `studenti` (
  `idstudenti` int(11) NOT NULL,
  `meno` varchar(20) NOT NULL,
  `priezvisko` varchar(20) NOT NULL,
  `email` varchar(30) NOT NULL,
  `telefon` varchar(16) NOT NULL,
  `vzdelanie` varchar(30) NOT NULL,
  `zivotopis` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Sťahujem dáta pre tabuľku `studenti`
--

INSERT INTO `studenti` (`idstudenti`, `meno`, `priezvisko`, `email`, `telefon`, `vzdelanie`, `zivotopis`) VALUES
(16, 'Adam', 'Zverka', 'a.zverka@student.ukf', '+421 789 456 321', 'gymnázium', 'zivotopis.pdf'),
(17, 'Jozef', 'Mrkva', 'j.mrkva@student.ukf', '+421 789 788 787', 'vysokoškolské I. stupňa', NULL),
(18, 'Peter', 'Paprika', 'ppaprika@student.ukf', '+421 654 456 654', 'vysokoškolské I. stupňa', 'zivotopis.pdf'),
(19, 'Frederika', 'Cibuľová', 'f.cibulova@student.ukf', '+421 123 654 987', 'stredoškolské s maturitou', NULL),
(20, 'Adam', 'Zverka', 'ad.zverka@student.ukf', '+421 000 000 000', 'vysokoškolské I. stupňa', 'zivotopis.pdf');

-- --------------------------------------------------------

--
-- Štruktúra tabuľky pre tabuľku `studenti_has_zrucnosti`
--

CREATE TABLE `studenti_has_zrucnosti` (
  `studenti_has_zrucnosti_id` int(11) NOT NULL,
  `studenti_idstudenti` int(11) NOT NULL,
  `zrucnosti_idzrucnosti` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Sťahujem dáta pre tabuľku `studenti_has_zrucnosti`
--

INSERT INTO `studenti_has_zrucnosti` (`studenti_has_zrucnosti_id`, `studenti_idstudenti`, `zrucnosti_idzrucnosti`) VALUES
(41, 16, 31),
(42, 16, 32),
(43, 16, 34),
(44, 16, 35),
(45, 16, 36),
(46, 17, 31),
(47, 17, 36),
(48, 18, 30),
(49, 18, 31),
(50, 18, 35),
(51, 19, 32),
(52, 20, 31),
(53, 20, 32),
(54, 20, 34);

-- --------------------------------------------------------

--
-- Štruktúra tabuľky pre tabuľku `zamestnavatelia`
--

CREATE TABLE `zamestnavatelia` (
  `id` int(11) NOT NULL,
  `nazov` varchar(30) NOT NULL,
  `adresa` varchar(45) NOT NULL,
  `email` varchar(30) NOT NULL,
  `telefon` varchar(16) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Sťahujem dáta pre tabuľku `zamestnavatelia`
--

INSERT INTO `zamestnavatelia` (`id`, `nazov`, `adresa`, `email`, `telefon`) VALUES
(15, 'Fermentum Ipsum', 'Tr. A. Hlinku 1, Nitra', 'hr.fermentum@ipsum.com', '+421 111 111 111'),
(16, 'Maecenas blandit', 'Tr. A. Hlinku 2, Nitra', 'blandit@maecenas.sk', '+421 212 121 211'),
(17, 'Fusce laoreet', 'Tr. A. Hlinku 3, Nitra', 'fusce.laoreet@laoreet.com', '+421 212 121 212'),
(18, 'Ipsum dolor', 'Tr. A. Hlinku 1, Nitra', 'dolori@ipsumo.sk', '+421 222 222 222'),
(19, 'Loremi Ips', 'Tr. A. Hlinku 2, Nitra', 'ips.hr@loremi.sk', '+421 777 777 777');

-- --------------------------------------------------------

--
-- Štruktúra tabuľky pre tabuľku `zrucnosti`
--

CREATE TABLE `zrucnosti` (
  `idzrucnosti` int(11) NOT NULL,
  `zrucnost` varchar(25) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Sťahujem dáta pre tabuľku `zrucnosti`
--

INSERT INTO `zrucnosti` (`idzrucnosti`, `zrucnost`) VALUES
(30, 'PHP'),
(31, 'Java'),
(32, 'Python'),
(33, '.NET'),
(34, 'práca s PC'),
(35, 'MS Office'),
(36, 'Skicár');

--
-- Kľúče pre exportované tabuľky
--

--
-- Indexy pre tabuľku `brigady`
--
ALTER TABLE `brigady`
  ADD PRIMARY KEY (`idbrigady`),
  ADD UNIQUE KEY `idbrigady_UNIQUE` (`idbrigady`),
  ADD KEY `fk_brigady_zamestnavatelia_idx` (`idzamestnavatelia`),
  ADD KEY `fk_brigady_kategorie1_idx` (`idkategorie`);

--
-- Indexy pre tabuľku `brigady_has_studenti`
--
ALTER TABLE `brigady_has_studenti`
  ADD PRIMARY KEY (`id`),
  ADD KEY `fk_brigady_has_studenti_studenti1_idx` (`idstudenti`),
  ADD KEY `fk_brigady_has_studenti_brigady1_idx` (`idbrigady`);

--
-- Indexy pre tabuľku `kategorie`
--
ALTER TABLE `kategorie`
  ADD PRIMARY KEY (`idkategorie`),
  ADD UNIQUE KEY `idkategorie_UNIQUE` (`idkategorie`),
  ADD UNIQUE KEY `kategoria_UNIQUE` (`kategoria`);

--
-- Indexy pre tabuľku `studenti`
--
ALTER TABLE `studenti`
  ADD PRIMARY KEY (`idstudenti`),
  ADD UNIQUE KEY `idstudenti_UNIQUE` (`idstudenti`),
  ADD UNIQUE KEY `email_UNIQUE` (`email`),
  ADD UNIQUE KEY `telefon_UNIQUE` (`telefon`);

--
-- Indexy pre tabuľku `studenti_has_zrucnosti`
--
ALTER TABLE `studenti_has_zrucnosti`
  ADD PRIMARY KEY (`studenti_has_zrucnosti_id`),
  ADD UNIQUE KEY `studenti_has_zrucnosti_id_UNIQUE` (`studenti_has_zrucnosti_id`),
  ADD KEY `fk_studenti_has_zrucnosti_zrucnosti1_idx` (`zrucnosti_idzrucnosti`),
  ADD KEY `fk_studenti_has_zrucnosti_studenti1_idx` (`studenti_idstudenti`);

--
-- Indexy pre tabuľku `zamestnavatelia`
--
ALTER TABLE `zamestnavatelia`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `idzamestnavatelia_UNIQUE` (`id`),
  ADD UNIQUE KEY `nazov_UNIQUE` (`nazov`),
  ADD UNIQUE KEY `email_UNIQUE` (`email`),
  ADD UNIQUE KEY `telefon_UNIQUE` (`telefon`);

--
-- Indexy pre tabuľku `zrucnosti`
--
ALTER TABLE `zrucnosti`
  ADD PRIMARY KEY (`idzrucnosti`),
  ADD UNIQUE KEY `idzrucnosti_UNIQUE` (`idzrucnosti`);

--
-- AUTO_INCREMENT pre exportované tabuľky
--

--
-- AUTO_INCREMENT pre tabuľku `brigady`
--
ALTER TABLE `brigady`
  MODIFY `idbrigady` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;

--
-- AUTO_INCREMENT pre tabuľku `brigady_has_studenti`
--
ALTER TABLE `brigady_has_studenti`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;

--
-- AUTO_INCREMENT pre tabuľku `kategorie`
--
ALTER TABLE `kategorie`
  MODIFY `idkategorie` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT pre tabuľku `studenti`
--
ALTER TABLE `studenti`
  MODIFY `idstudenti` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=21;

--
-- AUTO_INCREMENT pre tabuľku `studenti_has_zrucnosti`
--
ALTER TABLE `studenti_has_zrucnosti`
  MODIFY `studenti_has_zrucnosti_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=55;

--
-- AUTO_INCREMENT pre tabuľku `zamestnavatelia`
--
ALTER TABLE `zamestnavatelia`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=20;

--
-- AUTO_INCREMENT pre tabuľku `zrucnosti`
--
ALTER TABLE `zrucnosti`
  MODIFY `idzrucnosti` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=37;

--
-- Obmedzenie pre exportované tabuľky
--

--
-- Obmedzenie pre tabuľku `brigady`
--
ALTER TABLE `brigady`
  ADD CONSTRAINT `fk_brigady_kategorie1` FOREIGN KEY (`idkategorie`) REFERENCES `kategorie` (`idkategorie`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `fk_brigady_zamestnavatelia` FOREIGN KEY (`idzamestnavatelia`) REFERENCES `zamestnavatelia` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Obmedzenie pre tabuľku `brigady_has_studenti`
--
ALTER TABLE `brigady_has_studenti`
  ADD CONSTRAINT `fk_brigady_has_studenti_brigady1` FOREIGN KEY (`idbrigady`) REFERENCES `brigady` (`idbrigady`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `fk_brigady_has_studenti_studenti1` FOREIGN KEY (`idstudenti`) REFERENCES `studenti` (`idstudenti`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Obmedzenie pre tabuľku `studenti_has_zrucnosti`
--
ALTER TABLE `studenti_has_zrucnosti`
  ADD CONSTRAINT `fk_studenti_has_zrucnosti_studenti1` FOREIGN KEY (`studenti_idstudenti`) REFERENCES `studenti` (`idstudenti`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `fk_studenti_has_zrucnosti_zrucnosti1` FOREIGN KEY (`zrucnosti_idzrucnosti`) REFERENCES `zrucnosti` (`idzrucnosti`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
