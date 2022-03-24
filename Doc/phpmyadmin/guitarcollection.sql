-- phpMyAdmin SQL Dump
-- version 5.1.3
-- https://www.phpmyadmin.net/
--
-- Hôte : localhost:3306
-- Généré le : jeu. 24 mars 2022 à 13:25
-- Version du serveur : 5.7.33
-- Version de PHP : 7.4.19

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de données : `guitarcollection`
--

-- --------------------------------------------------------

--
-- Structure de la table `aesthetic`
--

CREATE TABLE `aesthetic` (
  `id` int(11) NOT NULL,
  `wear` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `finition` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `pickups` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `model` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `neck_material` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `body_material` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `body_form` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Déchargement des données de la table `aesthetic`
--

INSERT INTO `aesthetic` (`id`, `wear`, `finition`, `pickups`, `model`, `neck_material`, `body_material`, `body_form`) VALUES
(1, 'Neuf', 'Aged White', 'sss', 'Deluxe', 'Chêne', 'Peuplié', 'Stratocaster'),
(2, 'très usé', 'Noir', 'HH model d\'usine', 'Custom', 'Acajou', 'Acajou', 'Les Paul'),
(3, 'Player', 'Rouge', 'HH Seymour h1, Oripur', 'Roxanne', 'Acajou', 'Acajou', 'SG'),
(4, 'Player', 'Transparent', 'sans', 'G series', 'ne sais pas', 'ne sais pas', 'Acoustique');

-- --------------------------------------------------------

--
-- Structure de la table `brand`
--

CREATE TABLE `brand` (
  `id` int(11) NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `guitar_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Déchargement des données de la table `brand`
--

INSERT INTO `brand` (`id`, `name`, `guitar_id`) VALUES
(1, 'Gibson', 2),
(2, 'Lag', 1),
(3, 'Fender', 3),
(4, 'Takamine', 4);

-- --------------------------------------------------------

--
-- Structure de la table `category`
--

CREATE TABLE `category` (
  `id` int(11) NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Déchargement des données de la table `category`
--

INSERT INTO `category` (`id`, `name`) VALUES
(1, 'Enquête'),
(2, 'Guitare'),
(3, 'Guitariste'),
(4, 'Luthier');

-- --------------------------------------------------------

--
-- Structure de la table `doctrine_migration_versions`
--

CREATE TABLE `doctrine_migration_versions` (
  `version` varchar(191) COLLATE utf8_unicode_ci NOT NULL,
  `executed_at` datetime DEFAULT NULL,
  `execution_time` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Déchargement des données de la table `doctrine_migration_versions`
--

INSERT INTO `doctrine_migration_versions` (`version`, `executed_at`, `execution_time`) VALUES
('DoctrineMigrations\\Version20220324093612', '2022-03-24 09:36:56', 137),
('DoctrineMigrations\\Version20220324100404', '2022-03-24 10:04:11', 495),
('DoctrineMigrations\\Version20220324100948', '2022-03-24 10:10:00', 151),
('DoctrineMigrations\\Version20220324102051', '2022-03-24 10:20:58', 160);

-- --------------------------------------------------------

--
-- Structure de la table `guitar`
--

CREATE TABLE `guitar` (
  `id` int(11) NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `year` int(11) DEFAULT NULL,
  `acquisition_at` datetime DEFAULT NULL COMMENT '(DC2Type:datetime_immutable)',
  `domination_hang` tinyint(1) NOT NULL,
  `nb_string` int(11) NOT NULL,
  `fixation` tinyint(1) NOT NULL,
  `created_at` datetime NOT NULL COMMENT '(DC2Type:datetime_immutable)',
  `updated_at` datetime NOT NULL COMMENT '(DC2Type:datetime_immutable)',
  `aesthetic_id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Déchargement des données de la table `guitar`
--

INSERT INTO `guitar` (`id`, `name`, `year`, `acquisition_at`, `domination_hang`, `nb_string`, `fixation`, `created_at`, `updated_at`, `aesthetic_id`, `user_id`) VALUES
(1, 'Roxanne', 2001, '2012-03-01 13:43:34', 1, 22, 1, '2022-03-24 12:43:34', '2022-03-24 12:43:34', 3, 1),
(2, 'Black beauty', 1970, '2012-01-03 06:43:34', 1, 22, 1, '2022-03-24 12:43:34', '2022-03-24 12:43:34', 2, 1),
(3, 'White', 2010, '2012-03-01 14:10:01', 1, 22, 2, '2022-03-24 13:10:01', '2022-03-24 13:10:01', 1, 1),
(4, 'Takamine', 2008, '2014-03-05 14:10:01', 1, 22, 1, '2022-03-24 13:10:01', '2022-03-24 13:10:01', 4, 1);

-- --------------------------------------------------------

--
-- Structure de la table `guitar_category`
--

CREATE TABLE `guitar_category` (
  `guitar_id` int(11) NOT NULL,
  `category_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Structure de la table `post`
--

CREATE TABLE `post` (
  `id` int(11) NOT NULL,
  `title` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `synopsis` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` datetime NOT NULL COMMENT '(DC2Type:datetime_immutable)',
  `updated_at` datetime NOT NULL COMMENT '(DC2Type:datetime_immutable)'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Déchargement des données de la table `post`
--

INSERT INTO `post` (`id`, `title`, `synopsis`, `created_at`, `updated_at`) VALUES
(1, 'RED HOT CHILI PEPPERS TO BE AWARDED A STAR ON THE HOLLYWOOD WALK OF FAME', 'Marking their four decades of music, the unveiling is scheduled for Thursday, 31 March at 11:30 AM.\r\n\r\nThe band will receive the 2,717th star on the Walk of Fame, which will be located in the second row at 6212 Hollywood Boulevard, next to TV producer Harry Friedman’s star, and adjacent to Amoeba Records.\r\n\r\nThe star will be unveiled by Parliament-Funkadelic’s George Clinton, who also produced the band’s second album in 1985, Freaky Styley. Woody Harrelson, Bob Forrest, and the Hollywood Chamber of Commerce chairwoman Nicole Mihalka will also attend.', '2022-03-24 13:18:13', '2022-03-24 13:18:13'),
(2, 'BOSS REVIVES THE ICONIC ROLAND SPACE ECHO IN THE RE-202 AND RE-2 DIGITAL PEDALS', 'The RE-202 is positioned as an accurate digital recreation of the original magnetic tape echo machine without the need for troublesome hardware maintenance. It’s said to replicate all the major features of the original – from its 12-position mode selector to subtle pitch fluctuations that come from tweaking the Repeat Rate knob – but adds some modern features too.\r\n\r\nDelay length has been doubled, and the RE-202 further accommodates tap tempo and onboard presets. Meanwhile, a fourth virtual tape head extends its sonic variety with five additional sound combinations. Players also have the option of using the warm and rounded preamp sound of the original, or opt for a completely clean signal with no processing. Further, the RE-202 also has a true stereo I/O to accommodate multi-amp setups.', '2022-03-24 13:18:13', '2022-03-24 13:18:13'),
(3, 'MARTIN GUITAR ANNOUNCES MATTHEW KENNEDY AS NEWEST BOARD OF DIRECTORS MEMBER', 'Martin Guitar has announced that it has elected Matthew Kennedy as a new member of its board of directors. Kennedy has been employed by Martin for almost 10 years, and has sat on the board of the Martin Guitar Charitable Foundation since December 2020.\r\n\r\nKennedy’s appointment follows the passing of Diane Martin. As well as being a board member, Diane was the wife of Executive Chairman Chris Martin IV, and chair of the Martin Guitar Charitable Foundation. She died in January following a lengthy battle with cancer.\r\n\r\nChris Martin explained in a press statement: “Matt will be assuming Diane’s position as a representative of the Martin family, along with me, on the board of our closely held family business.\r\n\r\n“Matt shares many of the values that made Diane an incredibly kind and beloved human being to everyone who knew her. She and Matt have always shared a fair and just outlook on life and business, carrying on their duties without privilege or ego. I look forward to helping Matt learn about how to guide our precious family business into the future.”\r\n\r\n“I’m truly honoured to accept a position on Martin’s Board of Directors,” added Kennedy. “I hope to make my aunt proud by ensuring that her never-ending voice for inclusivity and equality continues to resound with each decision that is made on behalf of the board. I feel a deep sense of responsibility to do what I can to make sure my family’s business and all of my coworkers continue to thrive for the foreseeable future.”', '2022-03-24 13:18:49', '2022-03-24 13:18:49'),
(4, 'FENDER’S JV MODIFIED SERIES TAKES CUES FROM THE JAPANESE VINTAGE REISSUES OF THE 80S', 'Dripping with vintage Fender DNA, this Stratocaster offers three vintage-style single-coils along with a push-pull pot on the second tone knob for more tonal variety; engaging it adds the neck pickup to positions one (bridge pickup only) and two (bridge and middle pickup) of the blade switch. Aside from that, it features a satin finished soft V maple neck with medium jumbo frets.', '2022-03-24 13:18:49', '2022-03-24 13:18:49');

-- --------------------------------------------------------

--
-- Structure de la table `post_category`
--

CREATE TABLE `post_category` (
  `post_id` int(11) NOT NULL,
  `category_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Structure de la table `user`
--

CREATE TABLE `user` (
  `id` int(11) NOT NULL,
  `first_name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `last_name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` datetime NOT NULL COMMENT '(DC2Type:datetime_immutable)',
  `updated_at` datetime NOT NULL COMMENT '(DC2Type:datetime_immutable)'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Déchargement des données de la table `user`
--

INSERT INTO `user` (`id`, `first_name`, `last_name`, `email`, `created_at`, `updated_at`) VALUES
(1, 'Julien', 'Freisa', 'moi@moi.com', '2022-03-24 12:35:05', '2022-03-24 12:35:05'),
(2, 'Jimmy', 'Page', 'Jimmy@jimmy.com', '2022-03-24 12:35:05', '2022-03-24 12:35:05'),
(5, 'John', 'Frusciante', 'john@john.com', '2022-03-24 12:36:17', '2022-03-24 12:36:17'),
(6, 'Brian', 'May', 'brian@brian.com', '2022-03-24 12:36:17', '2022-03-24 12:36:17');

--
-- Index pour les tables déchargées
--

--
-- Index pour la table `aesthetic`
--
ALTER TABLE `aesthetic`
  ADD PRIMARY KEY (`id`);

--
-- Index pour la table `brand`
--
ALTER TABLE `brand`
  ADD PRIMARY KEY (`id`),
  ADD KEY `IDX_1C52F95848420B1E` (`guitar_id`);

--
-- Index pour la table `category`
--
ALTER TABLE `category`
  ADD PRIMARY KEY (`id`);

--
-- Index pour la table `doctrine_migration_versions`
--
ALTER TABLE `doctrine_migration_versions`
  ADD PRIMARY KEY (`version`);

--
-- Index pour la table `guitar`
--
ALTER TABLE `guitar`
  ADD PRIMARY KEY (`id`),
  ADD KEY `IDX_423AC30D3712B658` (`aesthetic_id`),
  ADD KEY `IDX_423AC30DA76ED395` (`user_id`);

--
-- Index pour la table `guitar_category`
--
ALTER TABLE `guitar_category`
  ADD PRIMARY KEY (`guitar_id`,`category_id`),
  ADD KEY `IDX_6369AA5948420B1E` (`guitar_id`),
  ADD KEY `IDX_6369AA5912469DE2` (`category_id`);

--
-- Index pour la table `post`
--
ALTER TABLE `post`
  ADD PRIMARY KEY (`id`);

--
-- Index pour la table `post_category`
--
ALTER TABLE `post_category`
  ADD PRIMARY KEY (`post_id`,`category_id`),
  ADD KEY `IDX_B9A190604B89032C` (`post_id`),
  ADD KEY `IDX_B9A1906012469DE2` (`category_id`);

--
-- Index pour la table `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT pour les tables déchargées
--

--
-- AUTO_INCREMENT pour la table `aesthetic`
--
ALTER TABLE `aesthetic`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT pour la table `brand`
--
ALTER TABLE `brand`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT pour la table `category`
--
ALTER TABLE `category`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT pour la table `guitar`
--
ALTER TABLE `guitar`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT pour la table `post`
--
ALTER TABLE `post`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT pour la table `user`
--
ALTER TABLE `user`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- Contraintes pour les tables déchargées
--

--
-- Contraintes pour la table `brand`
--
ALTER TABLE `brand`
  ADD CONSTRAINT `FK_1C52F95848420B1E` FOREIGN KEY (`guitar_id`) REFERENCES `guitar` (`id`);

--
-- Contraintes pour la table `guitar`
--
ALTER TABLE `guitar`
  ADD CONSTRAINT `FK_423AC30D3712B658` FOREIGN KEY (`aesthetic_id`) REFERENCES `aesthetic` (`id`),
  ADD CONSTRAINT `FK_423AC30DA76ED395` FOREIGN KEY (`user_id`) REFERENCES `user` (`id`);

--
-- Contraintes pour la table `guitar_category`
--
ALTER TABLE `guitar_category`
  ADD CONSTRAINT `FK_6369AA5912469DE2` FOREIGN KEY (`category_id`) REFERENCES `category` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `FK_6369AA5948420B1E` FOREIGN KEY (`guitar_id`) REFERENCES `guitar` (`id`) ON DELETE CASCADE;

--
-- Contraintes pour la table `post_category`
--
ALTER TABLE `post_category`
  ADD CONSTRAINT `FK_B9A1906012469DE2` FOREIGN KEY (`category_id`) REFERENCES `category` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `FK_B9A190604B89032C` FOREIGN KEY (`post_id`) REFERENCES `post` (`id`) ON DELETE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
