-- phpMyAdmin SQL Dump
-- version 4.2.7.1
-- http://www.phpmyadmin.net
--
-- Počítač: 127.0.0.1
-- Vytvořeno: Pon 12. led 2015, 18:15
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
-- Struktura tabulky `author`
--

CREATE TABLE IF NOT EXISTS `author` (
`id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=7 ;

--
-- Vypisuji data pro tabulku `author`
--

INSERT INTO `author` (`id`, `name`) VALUES
(1, 'George R. R. Martin'),
(2, 'J. R. R. Tolkien'),
(3, 'S. Collins'),
(6, 'Hruška Láďa');

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
-- Struktura tabulky `book`
--

CREATE TABLE IF NOT EXISTS `book` (
`id` int(11) NOT NULL,
  `author_id` int(11) NOT NULL,
  `publisher_id` int(11) NOT NULL,
  `category_id` int(11) NOT NULL,
  `title` varchar(255) NOT NULL,
  `year` int(4) NOT NULL,
  `ean` varchar(50) NOT NULL,
  `isbn` varchar(50) NOT NULL,
  `url` varchar(255) NOT NULL,
  `page_count` int(11) NOT NULL,
  `borrow` int(11) DEFAULT NULL,
  `desc` text NOT NULL,
  `count` int(11) unsigned NOT NULL
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=6 ;

--
-- Vypisuji data pro tabulku `book`
--

INSERT INTO `book` (`id`, `author_id`, `publisher_id`, `category_id`, `title`, `year`, `ean`, `isbn`, `url`, `page_count`, `borrow`, `desc`, `count`) VALUES
(1, 1, 1, 2, 'Hra o trůny', 2011, '9788071974123', '978-80-7197-412-3', 'images/upload/1/thumb.jpg', 846, 31, '<p>Jako str&aacute;žce severu považuje lord Stark za proklet&iacute;, když ho kr&aacute;l Robert pověř&iacute; &uacute;řadem pobočn&iacute;ka vladaře a vy&scaron;le ho na jih, odkud se zat&iacute;m nikdo z jeho rodiny nevr&aacute;til. Bezejmenn&iacute; stař&iacute; bohov&eacute; nemaj&iacute; na jihu ž&aacute;dnou moc, Starkova rodina je brzy rozdělena a pobočn&iacute;k s&aacute;m je polapen do s&iacute;tě nebezpečn&yacute;ch intrik. Ba co hůř, v exilu ve Svobodn&yacute;ch městech za mořem dospěl pomstou posedl&yacute; chlapec. Jako dědic &scaron;&iacute;len&eacute;ho Drač&iacute;ho kr&aacute;le, jehož rodina byla vyvražděna, si děl&aacute; n&aacute;rok na trůn. A na severu, tam za Zd&iacute;, kde člověk nemůže nikdy ř&iacute;ct, co je živ&eacute; a co ne, se mezit&iacute;m houfuj&iacute; mrtv&eacute; arm&aacute;dy Jin&yacute;ch, kter&eacute; vyčk&aacute;vaj&iacute; na konec l&eacute;ta a nadvl&aacute;du dlouh&eacute; zimy. Př&iacute;běh zrady a ambic&iacute;, l&aacute;sky, čar a kouzel může zač&iacute;t. Zima přich&aacute;z&iacute;.</p>\n', 119),
(2, 1, 2, 1, 'Pán prstenů 1', 2012, '9788025707463', '978-80-257-0746-3', 'images/upload/2/thumb.jpg', 430, 12, '<p><span style="color:rgb(72, 72, 72); font-family:arial,sans-serif">Mlad&eacute;mu hobitovi z jedn&eacute; ospal&eacute; vesnice v Kraji je svěřen&uml;přetěžk&yacute; &uacute;kol: mus&iacute; podniknout nebezpečnou pouť přes celou Středozem až k Puklin&aacute;m osudu a tam zničit vl&aacute;dnouc&iacute; prsten Moci - jedině tak lze zabr&aacute;nit Temn&eacute;mu p&aacute;nu Sauronovi, aby si podmanil cel&yacute; svět. Tak zač&iacute;n&aacute; P&aacute;n prstenů, klasick&eacute; dobrodružn&eacute; vypr&aacute;věn&iacute; J. R. R. Tolkiena, kter&eacute; pokračuje v rom&aacute;nech Dvě věže a N&aacute;vrat kr&aacute;le.</span></p>\n', 0),
(3, 2, 2, 1, 'Hobbit', 2006, '9788025707418', '978-80-257-0741-8', 'images/upload/3/thumb.jpg', 270, 35, '<p><span style="color:rgb(72, 72, 72); font-family:arial,sans-serif">Toto je př&iacute;běh o tom, kterak se Pytl&iacute;k vydal za dobrodružstv&iacute;m a shledal, že n&aacute;hle děl&aacute; a ř&iacute;k&aacute; naprosto neoček&aacute;van&eacute; věci&hellip; Bilbo Pytl&iacute;k je hobit, kter&yacute; se tě&scaron;&iacute; z pohodln&eacute;h a skromn&eacute;ho života a jen zř&iacute;dkakdy putuje d&aacute;le než do sv&eacute; spiž&iacute;rny ve Dně pytle. Jeho spokojen&eacute; byt&iacute; je v&scaron;ak naru&scaron;eno, když se jednoho dne u jeho prahu objev&iacute; čaroděj Gandalf v doprovodu třin&aacute;cti trpasl&iacute;ků a vezmou ho s sebou na cestu &quot;tam a zase zp&aacute;tky&quot;. Maj&iacute; v &uacute;myslu uloupit poklad mocn&eacute;ho &Scaron;maka, velik&eacute;ho a velmi nebezpečn&eacute;ho draka...</span></p>\n', 24),
(4, 3, 3, 2, 'Hunger Games', 2010, '9788025311103', '978-80-253-1110-3', 'images/upload/4/thumb.jpg', 335, 152, '<p><span style="color:rgb(72, 72, 72); font-family:arial,sans-serif">Jste hladov&iacute; po dal&scaron;&iacute;m strhuj&iacute;c&iacute;m čten&iacute;? Nap&iacute;nav&yacute; př&iacute;běh dobrodružstv&iacute;, &uacute;tlaku a romantiky pokračuje! Katniss dos&aacute;hla v&iacute;tězstv&iacute; v Hladov&yacute;ch hr&aacute;ch aktem vzdoru proti v&scaron;emocn&eacute;mu Kapitolu a jeho krut&yacute;m pravidlům. Katniss s Peetou oček&aacute;vaj&iacute; pomstu mocn&yacute;ch. Překvapiv&eacute; v&yacute;sledky v drsn&eacute; reality show v&scaron;ak povzbudily obyvatele země Panem, aby se postavili k odporu...</span></p>\n', 53),
(5, 6, 4, 4, 'Vaříme s Láďou', 2014, '9788024926001', '978-80-249-2600-1', 'images/upload/5/thumb.jpg', 160, 10, '<p><span style="color:rgb(72, 72, 72); font-family:arial,sans-serif">Popul&aacute;rn&iacute; potravinov&yacute; inspektor a report&eacute;r TV NOVA L&aacute;ďa Hru&scaron;ka vstoupil do povědom&iacute; česk&yacute;ch div&aacute;ků tak&eacute; jako kuchař a dok&aacute;zal, že vařit se d&aacute; levně a přitom chutně. Sestavil sb&iacute;rku unik&aacute;tn&iacute;ch a vět&scaron;inou jednoduch&yacute;ch receptů na př&iacute;pravu dom&aacute;c&iacute;ho pečiva, ml&eacute;čn&yacute;ch v&yacute;robků, pol&eacute;vek, sladk&yacute;ch i slan&yacute;ch hlavn&iacute;ch j&iacute;del, dezertů, moučn&iacute;ků a dal&scaron;&iacute;ch dobrot doslova za p&aacute;r korun. Kuchařka obsahuje 63 receptů.</span></p>\n', 140);

-- --------------------------------------------------------

--
-- Struktura tabulky `book_borrow`
--

CREATE TABLE IF NOT EXISTS `book_borrow` (
`id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `book_id` int(11) NOT NULL,
  `date` date NOT NULL,
  `status` varchar(20) NOT NULL
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=55 ;

--
-- Vypisuji data pro tabulku `book_borrow`
--

INSERT INTO `book_borrow` (`id`, `user_id`, `book_id`, `date`, `status`) VALUES
(53, 1, 3, '2015-01-02', 'Vypůjčeno'),
(54, 1, 5, '2015-01-02', 'Vráceno');

-- --------------------------------------------------------

--
-- Struktura tabulky `category`
--

CREATE TABLE IF NOT EXISTS `category` (
`id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=5 ;

--
-- Vypisuji data pro tabulku `category`
--

INSERT INTO `category` (`id`, `name`) VALUES
(1, 'Dobrodružné'),
(2, 'Sci-fi a fantasy'),
(4, 'Kuchařky');

-- --------------------------------------------------------

--
-- Struktura tabulky `new`
--

CREATE TABLE IF NOT EXISTS `new` (
`id` int(5) NOT NULL,
  `date` datetime NOT NULL,
  `title` varchar(255) NOT NULL,
  `content` text NOT NULL
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=25 ;

--
-- Vypisuji data pro tabulku `new`
--

INSERT INTO `new` (`id`, `date`, `title`, `content`) VALUES
(22, '2014-12-01 17:36:22', 'dfg', 'fxg'),
(24, '2014-12-30 13:17:10', 'sdfsd', 'fgdsgfdsgg');

-- --------------------------------------------------------

--
-- Struktura tabulky `publisher`
--

CREATE TABLE IF NOT EXISTS `publisher` (
`id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=5 ;

--
-- Vypisuji data pro tabulku `publisher`
--

INSERT INTO `publisher` (`id`, `name`) VALUES
(1, 'Talpress'),
(2, 'Argo'),
(3, 'Fragment'),
(4, 'Euromedia Group - Ikar');

-- --------------------------------------------------------

--
-- Struktura tabulky `tax`
--

CREATE TABLE IF NOT EXISTS `tax` (
`id` int(11) NOT NULL,
  `content` text NOT NULL
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=2 ;

--
-- Vypisuji data pro tabulku `tax`
--

INSERT INTO `tax` (`id`, `content`) VALUES
(1, '<table>\n	<tbody>\n		<tr>\n			<th colspan="2">Registračn&iacute; poplatek na jeden rok (12 měs&iacute;ců)</th>\n		</tr>\n		<tr>\n			<td>Dospěl&iacute;</td>\n			<td>200,- Kč</td>\n		</tr>\n		<tr>\n			<td>Studenti do 26 let</td>\n			<td>100,- Kč</td>\n		</tr>\n		<tr>\n			<td>Senioři nad 60 let</td>\n			<td>100,- Kč</td>\n		</tr>\n		<tr>\n			<td>Osoby se zdravotn&iacute;m postižen&iacute;m (držitel&eacute; průkazu ZTP a ZTP-P)</td>\n			<td>100,- Kč</td>\n		</tr>\n		<tr>\n			<td>D&iacute;tě</td>\n			<td>55,- Kč</td>\n		</tr>\n	</tbody>\n</table>\n\n<table>\n	<tbody>\n		<tr>\n			<th colspan="2">Sankčn&iacute; poplatky za každou knihovn&iacute; jednotku zvl&aacute;&scaron;ť</th>\n		</tr>\n		<tr>\n			<td>Za nedodržen&iacute; v&yacute;půjčn&iacute; lhůty - 1. Upom&iacute;nka</td>\n			<td>10,- Kč</td>\n		</tr>\n		<tr>\n			<td>Za nedodržen&iacute; v&yacute;půjčn&iacute; lhůty - 2. Upom&iacute;nka</td>\n			<td>20,- Kč</td>\n		</tr>\n		<tr>\n			<td>Za nedodržen&iacute; v&yacute;půjčn&iacute; lhůty - 3. Upom&iacute;nka</td>\n			<td>30,- Kč</td>\n		</tr>\n	</tbody>\n</table>\n\n<table>\n	<tbody>\n		<tr>\n			<th colspan="2">Placen&eacute; informačn&iacute; služby</th>\n		</tr>\n		<tr>\n			<td>Poplatek při zad&aacute;n&iacute; re&scaron;er&scaron;e</td>\n			<td>40,- Kč</td>\n		</tr>\n		<tr>\n			<td>Kopie dř&iacute;ve zpracovan&eacute; re&scaron;er&scaron;e za 1 stranu A4</td>\n			<td>2,- Kč</td>\n		</tr>\n	</tbody>\n</table>\n');

-- --------------------------------------------------------

--
-- Struktura tabulky `text`
--

CREATE TABLE IF NOT EXISTS `text` (
`id` int(11) NOT NULL,
  `text` text NOT NULL,
  `key` varchar(255) NOT NULL
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=3 ;

--
-- Vypisuji data pro tabulku `text`
--

INSERT INTO `text` (`id`, `text`, `key`) VALUES
(1, '<p>Knihovna v Hradci Kr&aacute;lov&eacute; je veřejnou knihovnou, jej&iacute;mž&nbsp;&uacute;čelem je zabezpečovat v&scaron;em občanům rovn&yacute; př&iacute;stup k informac&iacute;m a kulturn&iacute;m hodnot&aacute;m, kter&eacute; jsou obsaženy ve fondech a informačn&iacute;ch datab&aacute;z&iacute;ch knihovny. Pom&aacute;h&aacute; zvy&scaron;ovat v&scaron;eobecn&eacute; a odborn&eacute; vzděl&aacute;n&iacute; občanů.</p>\n', 'welcome'),
(2, '<p>Registrací na našem webu získáte nejenom možnost vypůjčení knih.</p>', 'registration');

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
  `street` varchar(150) CHARACTER SET utf8 COLLATE utf8_czech_ci NOT NULL,
  `house_number` int(10) NOT NULL,
  `city` varchar(50) CHARACTER SET utf8 COLLATE utf8_czech_ci NOT NULL,
  `post_id` int(5) NOT NULL,
  `fb_id` int(20) DEFAULT NULL,
  `fb_access_token` varchar(300) CHARACTER SET utf8 COLLATE utf8_czech_ci DEFAULT NULL
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=32 ;

--
-- Vypisuji data pro tabulku `user`
--

INSERT INTO `user` (`id`, `password`, `email`, `name`, `surname`, `role`, `street`, `house_number`, `city`, `post_id`, `fb_id`, `fb_access_token`) VALUES
(1, '$2y$10$dp0aRYTede8r1JbeGrtYRu5RlfisP..ow2w9Xj/gyaj/RlefH2RIe', 'cihak.mar@gmail.com', 'Martin', 'Čihák', 'user', 'T.N.Kautníka', 1676, 'Choceň', 56502, 2147483647, 'CAAE0KnrC6M0BAL4ZBOC59ktMYFYUVioZBWPcHDnodUESGOIfFNKZAorZBElgoMFEus4V9cN5PnmNw8H7LTad8efAPJaPvJOJeGTNl96jSIYaGR1zlozIJdEX83mp19KQtEi4TAYSDTu8xVTmRyJ4yT3uByBhO93CUufZBqsMYEeoAvEXxHg1rQGY9he320MF1KIXKnH67gjkJ1TzZAYz9n'),
(30, '$2y$10$GgYSm.SVTsC2MZXpK73O.eA8ieuJySCO7tcod3xiamaAv/dSNfvwa', 'test@test.cz', 'Martin test', '', 'user', '', 0, '', 0, NULL, NULL),
(31, '$2y$10$RqaeQEeXaay8x87z.QN/8eazeAJAzpGCY.uA/UvDufCbH7ETVg/v.', 'mc@creox.cz', 'Martin', 'Čihák', 'user', '', 0, '', 0, NULL, NULL);

--
-- Klíče pro exportované tabulky
--

--
-- Klíče pro tabulku `author`
--
ALTER TABLE `author`
 ADD PRIMARY KEY (`id`);

--
-- Klíče pro tabulku `a_user`
--
ALTER TABLE `a_user`
 ADD PRIMARY KEY (`id`);

--
-- Klíče pro tabulku `book`
--
ALTER TABLE `book`
 ADD PRIMARY KEY (`id`), ADD KEY `author_id` (`author_id`,`publisher_id`,`category_id`), ADD KEY `publisher_id` (`publisher_id`), ADD KEY `category_id` (`category_id`);

--
-- Klíče pro tabulku `book_borrow`
--
ALTER TABLE `book_borrow`
 ADD PRIMARY KEY (`id`), ADD KEY `user_id` (`user_id`), ADD KEY `book_id` (`book_id`);

--
-- Klíče pro tabulku `category`
--
ALTER TABLE `category`
 ADD PRIMARY KEY (`id`);

--
-- Klíče pro tabulku `new`
--
ALTER TABLE `new`
 ADD PRIMARY KEY (`id`);

--
-- Klíče pro tabulku `publisher`
--
ALTER TABLE `publisher`
 ADD PRIMARY KEY (`id`);

--
-- Klíče pro tabulku `tax`
--
ALTER TABLE `tax`
 ADD PRIMARY KEY (`id`);

--
-- Klíče pro tabulku `text`
--
ALTER TABLE `text`
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
-- AUTO_INCREMENT pro tabulku `author`
--
ALTER TABLE `author`
MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=7;
--
-- AUTO_INCREMENT pro tabulku `a_user`
--
ALTER TABLE `a_user`
MODIFY `id` int(5) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT pro tabulku `book`
--
ALTER TABLE `book`
MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=6;
--
-- AUTO_INCREMENT pro tabulku `book_borrow`
--
ALTER TABLE `book_borrow`
MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=55;
--
-- AUTO_INCREMENT pro tabulku `category`
--
ALTER TABLE `category`
MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=5;
--
-- AUTO_INCREMENT pro tabulku `new`
--
ALTER TABLE `new`
MODIFY `id` int(5) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=25;
--
-- AUTO_INCREMENT pro tabulku `publisher`
--
ALTER TABLE `publisher`
MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=5;
--
-- AUTO_INCREMENT pro tabulku `tax`
--
ALTER TABLE `tax`
MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT pro tabulku `text`
--
ALTER TABLE `text`
MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=3;
--
-- AUTO_INCREMENT pro tabulku `user`
--
ALTER TABLE `user`
MODIFY `id` int(5) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=32;
--
-- Omezení pro exportované tabulky
--

--
-- Omezení pro tabulku `book`
--
ALTER TABLE `book`
ADD CONSTRAINT `book_ibfk_1` FOREIGN KEY (`author_id`) REFERENCES `author` (`id`),
ADD CONSTRAINT `book_ibfk_2` FOREIGN KEY (`publisher_id`) REFERENCES `publisher` (`id`),
ADD CONSTRAINT `book_ibfk_3` FOREIGN KEY (`category_id`) REFERENCES `category` (`id`);

--
-- Omezení pro tabulku `book_borrow`
--
ALTER TABLE `book_borrow`
ADD CONSTRAINT `book_borrow_ibfk_1` FOREIGN KEY (`user_id`) REFERENCES `user` (`id`),
ADD CONSTRAINT `book_borrow_ibfk_2` FOREIGN KEY (`book_id`) REFERENCES `book` (`id`);

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
