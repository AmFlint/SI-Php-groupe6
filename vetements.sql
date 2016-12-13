-- phpMyAdmin SQL Dump
-- version 4.4.15.5
-- http://www.phpmyadmin.net
--
-- Host: localhost:3306
-- Generation Time: Dec 13, 2016 at 12:04 PM
-- Server version: 5.5.49-log
-- PHP Version: 7.0.9

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `whatsape`
--

-- --------------------------------------------------------

--
-- Table structure for table `vetements`
--

CREATE TABLE IF NOT EXISTS `vetements` (
  `id` int(11) NOT NULL,
  `img_chemin` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `img_dur` blob NOT NULL,
  `titre` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `description` text COLLATE utf8_unicode_ci NOT NULL,
  `taille` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `sexe` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `style` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `visible` int(11) NOT NULL DEFAULT '1'
) ENGINE=InnoDB AUTO_INCREMENT=42 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `vetements`
--

INSERT INTO `vetements` (`id`, `img_chemin`, `img_dur`, `titre`, `description`, `taille`, `sexe`, `style`, `visible`) VALUES
(2, 'accessoires-femme1.jpg', '', 'Collier clé', 'Collier féminin et discret', '', 'F', 'accessoires', 1),
(3, 'accessoires-femme2.jpg', '', 'Sac rose', 'Petit sac rose pratique', '', 'F', 'accessoires', 1),
(4, 'accessoires-femme3.jpg', '', 'Sac noir', 'Petit sac noir pratique', '', 'F', 'accessoires', 1),
(5, 'accessoires-femme4.jpg', '', 'Collier argent', 'Gros collier couleur argent', '', 'F', 'accessoires', 1),
(6, 'accessoires-femme5.jpg', '', 'Sac bleu', 'Petit sac bleu original', '', 'F', 'accessoires', 1),
(7, 'accessoires-homme1.jpg', '', 'Montre bleu et rouge', 'Montre à gros cadran et bracelet', '', 'H', 'accessoires', 1),
(8, 'accessoires-homme2.jpg', '', 'Montre épaisse', 'Montre à gros cadran avec bracelet cuir épais', '', 'H', 'accessoires', 1),
(9, 'accessoires-homme3.jpg', '', 'Sac de voyage', 'Sac de voyage pratique et résistant', '', 'H', 'accessoires', 1),
(10, 'accessoires-homme4.jpg', '', 'Bonnet South Park', 'Bonnet original inspiré de Stan', '', 'H', 'accessoires', 1),
(11, 'accessoires-homme5.jpg', '', 'Casquette classique', 'Casquette noire et jaune', '', 'H', 'accessoires', 1),
(12, 'casual-femme-chemise.jpg', '', 'Chemise à motifs', 'Petite chemise blanche à motifs', 'S', 'F', 'casual', 1),
(13, 'casual-femme-haut1.jpg', '', 'Haut d''été', 'Petit haut léger en dentelles', 'S', 'F', 'casual', 1),
(14, 'casual-femme-pull1.jpg', '', 'Hoodie rose', 'Pull à capuche rose pâle', 'M', 'F', 'casual', 1),
(15, 'casual-femme-pull2.jpg', '', 'Pull crème', 'Pull en mailles couleur crème', 'L', 'F', 'casual', 1),
(16, 'casual-femme-tshirt1.jpg', '', 'T-shirt à inscription', 'T-shirt avec inscription en anglais', 'S', 'F', 'casual', 1),
(17, 'casual-femme-veste1.jpg', '', 'Veste beige', 'Veste d''automne couleur beige', 'M', 'F', 'casual', 1),
(18, 'casual-femme-veste2.jpg', '', 'Veste noire', 'Veste d''automne avec détails en cuir', 'M', 'F', 'casual', 1),
(19, 'casual-homme-chemise1.jpg', '', 'Chemise à carreaux', 'Chemise simple à carreaux', 'M', 'H', 'casual', 1),
(20, 'casual-homme-chemise2.jpg', '', 'Chemise à carreaux foncée', 'Chemise à carreaux verte et bleue', 'L', 'H', 'casual', 1),
(21, 'casual-homme-veste1.jpg', '', 'Veste en jean', 'Veste large en jean', 'L', 'H', 'casual', 1),
(22, 'occasion-femme-ensemble1.jpg', '', 'Ensemble de soirée', 'Ensemble noir féminin et élégant', 'M', 'F', 'occasion', 1),
(23, 'occasion-femme-ensemble2.jpg', '', 'Robe et gilet', 'Un ensemble comprenant une robe couleur crème et un gilet épais gris', 'M', 'F', 'occasion', 1),
(24, 'occasion-femme-ensemble3.jpg', '', 'Jupe et chemise', 'Jupe tube à motifs et chemise en jean délavée', 'L', 'F', 'occasion', 1),
(25, 'occasion-femme-robe1.jpg', '', 'Robe à motifs', 'Robe d''été fine à motifs ', 'M', 'F', 'occasion', 1),
(26, 'occasion-femme-robe2.jpg', '', 'Robe de soirée', 'Robe noire légère à détails en dentelle', 'S', 'F', 'occasion', 1),
(27, 'occasion-homme-ensemble1.jpg', '', 'Veste et cravate', 'Veste bleue marine et sa cravate assortie à pois', 'M', 'H', 'occasion', 1),
(28, 'occasion-homme-ensemble2.jpg', '', 'Veste et cravate', 'Veste et cravate assorties classiques', 'L', 'H', 'occasion', 1),
(29, 'occasion-homme-ensemble3.jpg', '', 'Veste et chemise ', 'Veste grise et sa chemise blanche', 'S', 'H', 'occasion', 1),
(30, 'occasion-homme-ensemble4.jpg', '', 'Veste rouge', 'Veste élégante rouge épaisse', 'S', 'H', 'occasion', 1),
(31, 'occasion-homme-manteau1.jpg', '', 'Manteau long', 'Manteau long de couleur beige', 'L', 'H', 'occasion', 1),
(32, 'sport-femme1.jpg', '', 'Ensemble de sport', 'Ensemble jogging et veste bleu clair', 'M', 'F', 'sport', 1),
(33, 'sport-femme2.jpg', '', 'Ensemble équitation', 'Ensemble de sport pour pratiquer l''équitation', 'S', 'F', 'sport', 1),
(34, 'sport-femme-chaussures.jpg', '', 'Chaussures de sport', 'Chaussures rouges souples', '', 'F', 'sport', 1),
(35, 'sport-femme-combinaison.jpg', '', 'Combinaison', 'Combinaison grise et rose', 'M', 'F', 'sport', 1),
(36, 'sport-homme1.jpg', '', 'Ensemble judo', 'Veste et pantalon pour pratiquer le judo', 'L', 'H', 'sport', 1),
(37, 'sport-homme2.jpg', '', 'Casque de baseball', 'Casque de baseball blanc avec grilles de protection', '', 'H', 'sport', 1),
(38, 'sport-homme-combinaison1.jpg', '', 'Combinaison surf', 'Combinaison étanche', 'S', 'H', 'sport', 1),
(39, 'sport-homme-combinaison2.jpg', '', 'Combinaison courte', 'Combinaison blanche et bleue moulante', 'L', 'H', 'sport', 1),
(40, 'sport-homme-combinaison3.jpg', '', 'Combinaison de plongée', 'Combinaison noire et bleue', 'M', 'H', 'sport', 1),
(41, 'sport-homme-ensemble1.jpg', '', 'Ensemble moto', 'Ensemble protecteur blanc et rouge', 'L', 'H', 'sport', 1);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `vetements`
--
ALTER TABLE `vetements`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `vetements`
--
ALTER TABLE `vetements`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=42;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
