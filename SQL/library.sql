-- phpMyAdmin SQL Dump
-- version 4.2.7.1
-- http://www.phpmyadmin.net
--
-- Počítač: 127.0.0.1
-- Vytvořeno: Pát 28. lis 2014, 12:32
-- Verze serveru: 5.6.20
-- Verze PHP: 5.5.15

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Databáze: `library`
--

-- --------------------------------------------------------

--
-- Struktura tabulky `a_user`
--

CREATE TABLE IF NOT EXISTS `a_user` (
`id` int(5) NOT NULL,
  `username` varchar(50) NOT NULL,
  `password` varchar(255) NOT NULL,
  `role` varchar(20) NOT NULL,
  `name` varchar(255) NOT NULL
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=2 ;

--
-- Vypisuji data pro tabulku `a_user`
--

INSERT INTO `a_user` (`id`, `username`, `password`, `role`, `name`) VALUES
(1, 'admin', '$2y$10$RqaeQEeXaay8x87z.QN/8eazeAJAzpGCY.uA/UvDufCbH7ETVg/v.', 'admin', 'Martin');

-- --------------------------------------------------------

--
-- Struktura tabulky `new`
--

CREATE TABLE IF NOT EXISTS `new` (
`id` int(5) NOT NULL,
  `date` datetime NOT NULL,
  `title` varchar(255) NOT NULL,
  `content` text NOT NULL
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=12 ;

--
-- Vypisuji data pro tabulku `new`
--

INSERT INTO `new` (`id`, `date`, `title`, `content`) VALUES
(10, '2014-11-27 18:51:09', 'vhj', 'vmnbvmnbnkm fx tgfydt yfrdt ydrt xfg ft gftg fzg df dxyg f gfxy gtfxgt fxdt gfrtg grft gfg fxg hfxg f zgfxt gfxt drt '),
(11, '2014-11-28 12:30:00', 'dxfgvd', 'dyfg');

-- --------------------------------------------------------

--
-- Struktura tabulky `user`
--

CREATE TABLE IF NOT EXISTS `user` (
`id` int(5) NOT NULL,
  `password` varchar(150) CHARACTER SET utf8 COLLATE utf8_czech_ci DEFAULT NULL,
  `email` varchar(150) CHARACTER SET utf8 COLLATE utf8_czech_ci NOT NULL,
  `name` varchar(150) CHARACTER SET utf8 COLLATE utf8_czech_ci NOT NULL,
  `surname` varchar(255) NOT NULL,
  `role` varchar(50) CHARACTER SET utf8 COLLATE utf8_czech_ci NOT NULL,
  `fb_id` int(20) DEFAULT NULL,
  `fb_access_token` varchar(300) CHARACTER SET utf8 COLLATE utf8_czech_ci DEFAULT NULL
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=32 ;

--
-- Vypisuji data pro tabulku `user`
--

INSERT INTO `user` (`id`, `password`, `email`, `name`, `surname`, `role`, `fb_id`, `fb_access_token`) VALUES
(1, '$2y$10$RqaeQEeXaay8x87z.QN/8eazeAJAzpGCY.uA/UvDufCbH7ETVg/v.', 'cihak.mar@gmail.com', 'Martin', 'Čihák', 'user', 2147483647, 'CAAE0KnrC6M0BADeVWtRPIxeapJeOLcELZCVYjWmiRKvTbBwEW4mwT0rn4oFqn5lyYSAGQCoziexJP7g4t8pnZA9ZCd91lIaSIXF5yCEFfpI0ZBzLNkn0mzfFDn0fKDOqCSkhS8NDOVvkps4sckAffZBpRmLZAdyU0h7APhVMyyrHrQLNq4igYdxZCOPXeKyrZC9FhPakVOns1vZAL1EVdRnD0'),
(30, '$2y$10$GgYSm.SVTsC2MZXpK73O.eA8ieuJySCO7tcod3xiamaAv/dSNfvwa', 'test@test.cz', 'Martin test', '', 'user', NULL, NULL),
(31, '$2y$10$ZpyXYYyH2xy5RMJ56WuSWuH1ErK3t99FSgB6AFotmTT4Ed7no.7eG', 'mc@creox.cz', 'Martin', 'Čihák', 'user', NULL, NULL);

--
-- Klíče pro exportované tabulky
--

--
-- Klíče pro tabulku `a_user`
--
ALTER TABLE `a_user`
 ADD PRIMARY KEY (`id`);

--
-- Klíče pro tabulku `new`
--
ALTER TABLE `new`
 ADD PRIMARY KEY (`id`);

--
-- Klíče pro tabulku `user`
--
ALTER TABLE `user`
 ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT pro tabulky
--

--
-- AUTO_INCREMENT pro tabulku `a_user`
--
ALTER TABLE `a_user`
MODIFY `id` int(5) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT pro tabulku `new`
--
ALTER TABLE `new`
MODIFY `id` int(5) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=12;
--
-- AUTO_INCREMENT pro tabulku `user`
--
ALTER TABLE `user`
MODIFY `id` int(5) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=32;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
