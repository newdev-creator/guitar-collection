-- phpMyAdmin SQL Dump
-- version 5.1.3
-- https://www.phpmyadmin.net/
--
-- Hôte : localhost:3306
-- Généré le : ven. 01 avr. 2022 à 16:00
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
(1, 'Lag', 'https://tse1.mm.bing.net/th?id=OIP.LYaS0JmPfKFGMWylzRW3-AHaC3&pid=Api', '2022-03-30 07:22:42', '2022-03-30 07:22:42'),
(2, 'Fender', 'https://tse1.mm.bing.net/th?id=OIP.6P0ZCOAwVPc8VyIzi_vQyQHaE4&pid=Api', '2022-03-30 07:22:42', '2022-03-30 07:22:42'),
(3, 'Gretsch', 'https://tse3.mm.bing.net/th?id=OIP.K706bL6gMPc_3rqF3f44mgHaBf&pid=Api', '2022-03-31 08:17:11', '2022-03-31 08:17:11'),
(4, 'Charvel', 'https://tse2.mm.bing.net/th?id=OIP.MCUY0khIF4aKzlWN-rzppgHaHa&pid=Api', '2022-03-31 10:00:29', '2022-03-31 10:00:29');

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
('DoctrineMigrations\\Version20220329093110', '2022-03-30 07:21:11', 59),
('DoctrineMigrations\\Version20220329093312', '2022-03-30 07:21:11', 117),
('DoctrineMigrations\\Version20220329094840', '2022-03-30 07:21:11', 267),
('DoctrineMigrations\\Version20220329095036', '2022-03-30 07:21:12', 141),
('DoctrineMigrations\\Version20220330071428', '2022-03-30 07:21:12', 69);

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
(1, 1, 'Roxanne', 2001, '2017-05-03 01:01:00', 'played', 'Red', 'HH', 'Mahogany', 'Mahogany', 'SG', 1, 22, 1, 'https://tse2.mm.bing.net/th?id=OIP.ZIscvIEAc9h4FJErktsYYwHaJ4&pid=Api', '2017-03-03 12:01:00', '2022-04-01 14:35:39', 1),
(2, 2, 'Deluxe', 2008, '2018-10-26 14:41:00', 'Nice', 'aged white', 'SSS', NULL, NULL, 'Stratocaster', 1, 22, 0, 'https://tse3.mm.bing.net/th?id=OIP.1L5PEco5K2AfQ97KwTuFbQHaE5&pid=Api', '2022-03-30 08:52:00', '2022-03-31 12:19:11', 2),
(4, 2, 'G6229TG Limited Edition Players Edition Sparkle Jet™ BT with Bigsby® and Gold Hardware', 2022, '2022-03-05 00:00:00', 'Splendid', 'Champagne Sparkle', 'Broad\'Tron™ BT-65 x 2', 'Mahogany', 'Mahogany', 'Jet™', 1, 22, 1, 'https://www.fmicassets.com/Damroot/xLg/10002/2403410816_gre_ins_frt_01_rr.png', '2017-01-01 00:00:00', '2017-01-01 00:00:00', 3),
(5, 1, 'Limited Edition Super Stock SC1', 2020, '2021-03-03 06:10:00', 'clean', 'Black Relic', 'EVH Wolfgang Humbucking Bridge & Seymour Duncan Li’l Screamin’ Demon Strat SLSD-1N Neck Pickups', 'Maple', 'Alder', 'Stratocaster', 0, 22, 0, 'https://www.fmicassets.com/Damroot/Original/10001/highlight_char_2966835503_overview.jpg', '2017-01-01 00:00:00', '2017-01-01 00:00:00', 4),
(7, 3, 'George Harrison Telecaster', 1972, '2017-06-05 03:01:00', 'Aged', 'Satin Urethane', 'Pure Vintage \'64 Gray-Bottom Single-Coil Tele® x 2', 'Rosewood', 'Chambered Rosewood', 'Telecaster', 1, 22, 0, 'https://tse4.mm.bing.net/th?id=OIP.AjM525KLvx_qUy2kPjmxuwHaJ_&pid=Api', '2017-01-01 00:00:00', '2017-01-01 00:00:00', 2);

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
(1, 'CHASE BLISS HABIT: IS THIS A NEW DELAY FROM THE EXPERIMENTAL PEDAL BUILDERS?', 'The brand is due to announce later this week its first new pedals since 2020.', 'On Sunday (27 March), users of The Gear Page forum flocked to a thread  “New Chase Bliss pedal…Habit Echo Collector” to discuss the allegedly upcoming pedal.\\r\\n\\r\\nThe image (above) shared by user DelayLover in the thread they started pictured a pedal with a yellow enclosure emblazoned with the moniker, Habit, and equipped with six knobs, four switches and two footswitches.\\r\\n\\r\\n“My thought is it’ll be some sort of digital experimental delay pedal,” speculated one user. “Maybe granular, pitch shift, little bit of ‘count to 5’, little bit of Red Panda stuff. Could be wrong but it’s making me feel this way.”\\r\\n\\r\\nA listing, now taken down, from US instrument retailer American Music appeared to reveal that the pedal will be an “Experimental Delay W/Memory” priced at $399.99. However, the page did not appear to provide any visuals relating to the one shared in the Gear Page post.', 'https://guitar.com/wp-content/uploads/2022/03/Chase-Bliss-Habit-Gear-Page@2000x1500-696x522.jpg', '2022-03-30 08:54:18', '2022-03-30 08:54:18', 1),
(2, 'THE ROLLING STONES’ LEGENDARY 1977 SECRET SHOWS AT THE EL MOCAMBO TO SEE FIRST-EVER OFFICIAL RELEASE', 'The recordings were taken in a tiny Toronto venue.', 'In 1977, fans appeared at the 300-capacity El Mocambo venue in Toronto, Canada, expecting to see April Wine supported by a band called The Cockroaches. In reality, April WIne were supporting, and The Cockroaches were actually The Rolling Stones. The band’s two nights at the venue are now set to be officially released for the first time in May.\\r\\n\\r\\nREAD MORE: Keith Richards confirms Rolling Stones are writing with drummer Steve Jordan: “We came up with eight or nine new pieces of material”\\r\\nThe setlists for the two nights spanned a range of the band’s catalogue, and some blues covers such as Little Red Rooster, Mannish Boy and Worried Life Blues. They touched on some hits, including Jumpin’ Jack Flash and Brown Sugar, as well as Hot Stuff, Hand Of Fate and Melody taken from their newly-released LP Black And Blue.\\r\\n\\r\\nAhead of the official release of the live album, the band have released two tracks: Rip This Joint and It’s Only Rock N’ Roll (But I Like It). Check them out below.', 'https://guitar.com/wp-content/uploads/2022/03/the-rolling-stones@2000x1500-696x522.jpg', '2022-03-30 08:54:18', '2022-03-30 08:54:18', 1);

-- --------------------------------------------------------

--
-- Structure de la table `user`
--

CREATE TABLE `user` (
  `id` int(11) NOT NULL,
  `first_name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `last_name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(180) COLLATE utf8mb4_unicode_ci NOT NULL,
  `image` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `roles` json NOT NULL,
  `password` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `create_at` datetime NOT NULL COMMENT '(DC2Type:datetime_immutable)',
  `update_at` datetime NOT NULL COMMENT '(DC2Type:datetime_immutable)'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Déchargement des données de la table `user`
--

INSERT INTO `user` (`id`, `first_name`, `last_name`, `email`, `image`, `roles`, `password`, `create_at`, `update_at`) VALUES
(1, 'Lomahn', 'Stern', 'stern@stern.com', NULL, '1', 'stern', '2022-03-30 08:12:31', '2022-03-30 08:12:31'),
(2, 'Céline', 'Pool', 'pool@pool.com', 'https://cdn.pixabay.com/photo/2015/09/17/14/24/woman-944261__340.jpg', '2', 'pool', '2022-03-30 08:49:13', '2022-03-30 08:49:13'),
(3, 'George', 'Harrison', 'harrison@harrison.com', NULL, '2', 'harrison', '2022-03-31 10:07:30', '2022-03-31 10:07:30');

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
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `UNIQ_8D93D649E7927C74` (`email`);

--
-- AUTO_INCREMENT pour les tables déchargées
--

--
-- AUTO_INCREMENT pour la table `brand`
--
ALTER TABLE `brand`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT pour la table `category`
--
ALTER TABLE `category`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT pour la table `guitar`
--
ALTER TABLE `guitar`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT pour la table `post`
--
ALTER TABLE `post`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT pour la table `user`
--
ALTER TABLE `user`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

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
