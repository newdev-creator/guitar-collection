-- phpMyAdmin SQL Dump
-- version 5.1.3
-- https://www.phpmyadmin.net/
--
-- Hôte : localhost:3306
-- Généré le : mar. 29 mars 2022 à 13:29
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
-- Structure de la table `brand`
--

CREATE TABLE `brand` (
  `id` int(11) NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `image` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` datetime NOT NULL COMMENT '(DC2Type:datetime_immutable)',
  `updated_at` datetime NOT NULL COMMENT '(DC2Type:datetime_immutable)'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Déchargement des données de la table `brand`
--

INSERT INTO `brand` (`id`, `name`, `image`, `created_at`, `updated_at`) VALUES
(1, 'Lag', 'https://tse1.mm.bing.net/th?id=OIP.LYaS0JmPfKFGMWylzRW3-AHaC3&pid=Api', '2022-03-29 11:20:08', '2022-03-29 11:20:08'),
(2, 'Fender', 'https://tse1.mm.bing.net/th?id=OIP.6P0ZCOAwVPc8VyIzi_vQyQHaE4&pid=Api', '2022-03-29 11:20:08', '2022-03-29 11:20:08');

-- --------------------------------------------------------

--
-- Structure de la table `category`
--

CREATE TABLE `category` (
  `id` int(11) NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `image` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Déchargement des données de la table `category`
--

INSERT INTO `category` (`id`, `name`, `image`) VALUES
(1, 'new', NULL),
(2, 'people', NULL);

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
('DoctrineMigrations\\Version20220329093110', '2022-03-29 09:31:32', 55),
('DoctrineMigrations\\Version20220329093312', '2022-03-29 09:33:16', 114),
('DoctrineMigrations\\Version20220329094840', '2022-03-29 09:48:44', 230),
('DoctrineMigrations\\Version20220329095036', '2022-03-29 09:50:41', 185);

-- --------------------------------------------------------

--
-- Structure de la table `guitar`
--

CREATE TABLE `guitar` (
  `id` int(11) NOT NULL,
  `user_id` int(11) DEFAULT NULL,
  `model` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `year` int(11) DEFAULT NULL,
  `acquisition_at` datetime DEFAULT NULL COMMENT '(DC2Type:datetime_immutable)',
  `wear` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `finition` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `pickups` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `neck_material` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `body_material` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `body_form` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `domination_hand` tinyint(1) NOT NULL,
  `nb_frets` int(11) NOT NULL,
  `fixation` tinyint(1) NOT NULL,
  `image` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` datetime NOT NULL COMMENT '(DC2Type:datetime_immutable)',
  `updated_at` datetime NOT NULL COMMENT '(DC2Type:datetime_immutable)',
  `brand_id` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Déchargement des données de la table `guitar`
--

INSERT INTO `guitar` (`id`, `user_id`, `model`, `year`, `acquisition_at`, `wear`, `finition`, `pickups`, `neck_material`, `body_material`, `body_form`, `domination_hand`, `nb_frets`, `fixation`, `image`, `created_at`, `updated_at`, `brand_id`) VALUES
(1, 1, 'Roxanne', 2001, '2022-03-02 13:20:57', 'played', 'Red', 'HH', 'Mahogany', 'Mahogany', 'SG', 1, 22, 1, 'https://tse2.mm.bing.net/th?id=OIP.ZIscvIEAc9h4FJErktsYYwHaJ4&pid=Api', '2022-03-29 11:20:57', '2022-03-29 11:20:57', 1),
(2, 2, 'American Vintage 62\' Custom', 2018, '2018-03-15 13:20:57', 'New', 'Sunburn', 'SS', NULL, NULL, 'Telcaster', 1, 21, 2, 'https://tse1.mm.bing.net/th?id=OIP.JAuuw9sm56z0i0qvp3PYzQHaFj&pid=Api', '2022-03-29 11:20:57', '2022-03-29 11:20:57', 2),
(3, 1, 'Deluxe', 2008, '2010-10-26 14:41:23', 'Nice', 'aged white', 'SSS', NULL, NULL, 'Stratocaster', 1, 22, 2, 'https://tse3.mm.bing.net/th?id=OIP.1L5PEco5K2AfQ97KwTuFbQHaE5&pid=Api', '2022-03-29 12:41:23', '2022-03-29 12:41:23', 2);

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
  `presentation` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `synopsis` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `image` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` datetime NOT NULL COMMENT '(DC2Type:datetime_immutable)',
  `updated_at` datetime NOT NULL COMMENT '(DC2Type:datetime_immutable)',
  `category_id` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Déchargement des données de la table `post`
--

INSERT INTO `post` (`id`, `title`, `presentation`, `synopsis`, `image`, `created_at`, `updated_at`, `category_id`) VALUES
(1, 'CHASE BLISS HABIT: IS THIS A NEW DELAY FROM THE EXPERIMENTAL PEDAL BUILDERS?', 'The brand is due to announce later this week its first new pedals since 2020.', 'On Sunday (27 March), users of The Gear Page forum flocked to a thread  “New Chase Bliss pedal…Habit Echo Collector” to discuss the allegedly upcoming pedal.\r\n\r\nThe image (above) shared by user DelayLover in the thread they started pictured a pedal with a yellow enclosure emblazoned with the moniker, Habit, and equipped with six knobs, four switches and two footswitches.\r\n\r\n“My thought is it’ll be some sort of digital experimental delay pedal,” speculated one user. “Maybe granular, pitch shift, little bit of ‘count to 5’, little bit of Red Panda stuff. Could be wrong but it’s making me feel this way.”\r\n\r\nA listing, now taken down, from US instrument retailer American Music appeared to reveal that the pedal will be an “Experimental Delay W/Memory” priced at $399.99. However, the page did not appear to provide any visuals relating to the one shared in the Gear Page post.', 'https://guitar.com/wp-content/uploads/2022/03/Chase-Bliss-Habit-Gear-Page@2000x1500-696x522.jpg', '2022-03-29 09:59:21', '2022-03-29 09:59:21', 1),
(2, 'THE ROLLING STONES’ LEGENDARY 1977 SECRET SHOWS AT THE EL MOCAMBO TO SEE FIRST-EVER OFFICIAL RELEASE', 'The recordings were taken in a tiny Toronto venue.', 'In 1977, fans appeared at the 300-capacity El Mocambo venue in Toronto, Canada, expecting to see April Wine supported by a band called The Cockroaches. In reality, April WIne were supporting, and The Cockroaches were actually The Rolling Stones. The band’s two nights at the venue are now set to be officially released for the first time in May.\r\n\r\nREAD MORE: Keith Richards confirms Rolling Stones are writing with drummer Steve Jordan: “We came up with eight or nine new pieces of material”\r\nThe setlists for the two nights spanned a range of the band’s catalogue, and some blues covers such as Little Red Rooster, Mannish Boy and Worried Life Blues. They touched on some hits, including Jumpin’ Jack Flash and Brown Sugar, as well as Hot Stuff, Hand Of Fate and Melody taken from their newly-released LP Black And Blue.\r\n\r\nAhead of the official release of the live album, the band have released two tracks: Rip This Joint and It’s Only Rock N’ Roll (But I Like It). Check them out below.', 'https://guitar.com/wp-content/uploads/2022/03/the-rolling-stones@2000x1500-696x522.jpg', '2022-03-29 09:59:21', '2022-03-29 09:59:21', 1),
(3, 'PLINI UNVEILS TWO NEW-AND-UPDATED SIGNATURE GUITARS WITH STRANDBERG: THE PROG NX 6 AND NECK-THRU BLACK', 'The prog guitarist teams up with the company once more to reconstruct his signature designs and launch his third and fourth models for the brand.', 'Australian guitar virtuoso Plini has recently re-teamed up with Strandberg to debut the new, overhauled version of his two flagship models: the Boden Plini Edition and the Neck-Thru Natural.\r\n\r\nREAD MORE: Gibson Revives A Lost Ted McCarty Design From the 1950s With The Theodore\r\nRedesigning and upgrading the spec sheet of the original designs, the Boden Prog NX 6 and Neck-Thru Black boast an all-new look for the signature designs, yet maintain the vital aspects that made the originals quite so highly acclaimed.\r\n\r\nFirst looking at the Boden Prog NX 6, the remake of the initial Boden Plini Edition, the upgraded spec redesigns the original blueprint to showcase a new body, neck and fretboard materials and incorporates the newly-debuted Plini humbuckers.\r\n\r\nNow upgrading the initial swamp ash body with a chambered mahogany alternative and redesigning the neck as mahogany rather than the original roasted maple, the new launch overhauls the first edition as a new, lighter-weight alternative.', 'https://guitar.com/wp-content/uploads/2022/03/Plini-Signature-Strandberg-Boden-Models@JPEG-696x392.jpeg', '2022-03-29 12:53:18', '2022-03-29 12:53:18', 1);

-- --------------------------------------------------------

--
-- Structure de la table `user`
--

CREATE TABLE `user` (
  `id` int(11) NOT NULL,
  `first_name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `last_name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `image` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` datetime NOT NULL COMMENT '(DC2Type:datetime_immutable)',
  `updated_at` datetime NOT NULL COMMENT '(DC2Type:datetime_immutable)'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Déchargement des données de la table `user`
--

INSERT INTO `user` (`id`, `first_name`, `last_name`, `email`, `image`, `created_at`, `updated_at`) VALUES
(1, 'Lomahn', 'Stern', 'stern@stern', 'https://cdn.pixabay.com/photo/2015/08/16/12/36/man-890877__340.jpg', '2022-03-29 11:17:09', '2022-03-29 11:17:09'),
(2, 'Céline', 'Pool', 'pool@pool.com', 'https://cdn.pixabay.com/photo/2015/09/17/14/24/woman-944261__340.jpg', '2022-03-29 11:17:09', '2022-03-29 11:17:09');

--
-- Index pour les tables déchargées
--

--
-- Index pour la table `brand`
--
ALTER TABLE `brand`
  ADD PRIMARY KEY (`id`);

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
  ADD KEY `IDX_423AC30DA76ED395` (`user_id`),
  ADD KEY `IDX_423AC30D44F5D008` (`brand_id`);

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
  ADD PRIMARY KEY (`id`),
  ADD KEY `IDX_5A8A6C8D12469DE2` (`category_id`);

--
-- Index pour la table `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT pour les tables déchargées
--

--
-- AUTO_INCREMENT pour la table `brand`
--
ALTER TABLE `brand`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT pour la table `category`
--
ALTER TABLE `category`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT pour la table `guitar`
--
ALTER TABLE `guitar`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT pour la table `post`
--
ALTER TABLE `post`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT pour la table `user`
--
ALTER TABLE `user`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- Contraintes pour les tables déchargées
--

--
-- Contraintes pour la table `guitar`
--
ALTER TABLE `guitar`
  ADD CONSTRAINT `FK_423AC30D44F5D008` FOREIGN KEY (`brand_id`) REFERENCES `brand` (`id`),
  ADD CONSTRAINT `FK_423AC30DA76ED395` FOREIGN KEY (`user_id`) REFERENCES `user` (`id`);

--
-- Contraintes pour la table `guitar_category`
--
ALTER TABLE `guitar_category`
  ADD CONSTRAINT `FK_6369AA5912469DE2` FOREIGN KEY (`category_id`) REFERENCES `category` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `FK_6369AA5948420B1E` FOREIGN KEY (`guitar_id`) REFERENCES `guitar` (`id`) ON DELETE CASCADE;

--
-- Contraintes pour la table `post`
--
ALTER TABLE `post`
  ADD CONSTRAINT `FK_5A8A6C8D12469DE2` FOREIGN KEY (`category_id`) REFERENCES `category` (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
