-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Hôte : 127.0.0.1
-- Généré le : sam. 31 mai 2025 à 19:22
-- Version du serveur : 10.4.32-MariaDB
-- Version de PHP : 8.2.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de données : `traiteur_db`
--

-- --------------------------------------------------------

--
-- Structure de la table `admin`
--

CREATE TABLE `admin` (
  `id` int(11) NOT NULL,
  `password` varchar(255) NOT NULL,
  `user_name` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Déchargement des données de la table `admin`
--

INSERT INTO `admin` (`id`, `password`, `user_name`) VALUES
(1, 'AAAA', 'Admin1'),
(2, 'BBBB', 'Admin2'),
(3, '2004', 'takoua'),
(4, '0000', 'raid');

-- --------------------------------------------------------

--
-- Structure de la table `avis`
--

CREATE TABLE `avis` (
  `id` int(100) NOT NULL,
  `nom_client` varchar(100) DEFAULT NULL,
  `commentaire` text DEFAULT NULL,
  `date_creation` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `id_repas` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Déchargement des données de la table `avis`
--

INSERT INTO `avis` (`id`, `nom_client`, `commentaire`, `date_creation`, `id_repas`) VALUES
(1, 'ali', 'wow', '2025-05-25 21:58:24', NULL),
(2, 'Mohamed', 'hhhh', '2025-05-27 16:22:41', NULL),
(3, 'Mohamed', 'jjkkkkkkkkk', '2025-05-27 16:22:46', NULL),
(4, 'Mohamed', 'ddddd', '2025-05-27 16:46:29', 0),
(5, 'Mohamed', 'xxxxxx', '2025-05-27 16:48:44', 0),
(6, 'Mohamed', 'hhhhhhhh', '2025-05-27 16:50:02', 0),
(7, 'Mohamed', 'hhhhhhhh', '2025-05-27 16:50:48', 0),
(8, 'Mohamed', 'ddddd', '2025-05-27 16:51:46', 0),
(9, 'Mohamed', 'ddddd', '2025-05-27 16:53:48', 0),
(10, 'Mohamed', 'hhh', '2025-05-27 16:54:02', 27),
(11, 'Mohamed', 'hhjjuu', '2025-05-27 16:55:06', 27),
(12, 'Mohamed', 'dddss', '2025-05-27 16:56:19', 27),
(13, 'Mohamed', 'ggtt', '2025-05-27 16:59:11', 28),
(14, 'Mohamed', 'wee', '2025-05-27 17:02:44', 28);

-- --------------------------------------------------------

--
-- Structure de la table `categories`
--

CREATE TABLE `categories` (
  `id` int(11) NOT NULL,
  `nom` enum('Pizza','Pasta','Grille','Boisson','Sucré') NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Déchargement des données de la table `categories`
--

INSERT INTO `categories` (`id`, `nom`) VALUES
(4, 'Pizza'),
(5, 'Pasta'),
(3, 'Grille'),
(2, 'Boisson'),
(1, 'Sucré');

-- --------------------------------------------------------

--
-- Structure de la table `client`
--

CREATE TABLE `client` (
  `id_client` int(11) NOT NULL,
  `adresse` varchar(255) NOT NULL,
  `telephone` varchar(10) NOT NULL,
  `password` varchar(255) NOT NULL,
  `nom` text NOT NULL,
  `email` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Déchargement des données de la table `client`
--

INSERT INTO `client` (`id_client`, `adresse`, `telephone`, `password`, `nom`, `email`) VALUES
(3, 'hhhhh', '3333333333', '$2y$10$ExyfgHmUfjW0/vCVUO7m3eZgPoKikYKEuLRN2gBGtaZC/0rycRhxa', 'mmmm', 'mmmm@gmail.com'),
(4, 'annaba', '0666666', '$2y$10$YPTFFIsutYvn3LrcBeqSp.IKAOHIHtyfriBgNpXTXaNv12UqAkKhG', 'takoua', 'takoua99@gmail.com'),
(5, 'berrahal', '078543335', '$2y$10$kXAZZ.2ge74jV1oI80MAn.IeYyfks.BSwVmz6AjjGe0AwEzONqEsq', 'hassina', 'hassina5@gmail.com'),
(6, 'elbouni', '037467464', '$2y$10$yCjLn/0jxjChD6YfBkNA9O1k4a6HIJ3RjRI93XECqDEF85zWAP80O', 'roza', 'noussa44@gmail.com'),
(10, 'annaba', '0655432452', '$2y$10$vnN3koh7Sud48eKkUSzueO22hatochaTWG1a.PUA/r2xGrvkJogAC', 'oussoua', 'oussoua23@gmail.com'),
(11, 'annaba', '0654356890', '$2y$10$w/Ra.jqc7.E9.s.wRncuJuPWdOAikElrPajNDJPOwco8QPLyZ0//i', 'islam', 'islam23@gmail.com'),
(12, 'annaba', '6666666', '$2y$10$QLEud9sj5I5biVwM96ly8eRQn96zEP9oArC279cpYgvsSMqDxAVS6', 'mamoun', 'minou77@gmail.com'),
(13, 'annaba', '08656678', '$2y$10$/m.Nv8ZQVeyl1pG6K4IuYOYxVNhah2AcYBSkvZJP1H3ubbgVG3iN6', 'ali', 'ali@gmail.com'),
(15, 'annaba', '0876543', '$2y$10$9o.Umk1Auosj9XmRA238Uu79gjS9CqWIa97D0Rh4vz1nKyOSqD2Uq', 'ammar', 'ammar23@gmail.com'),
(16, 'annaba', '0659206244', 'takoua', 'takoua', 'takoua@gmail.com'),
(19, 'Reymonta', '333', '$2y$10$UvCtVZ/XCId4awxzQ/9eZ.PP9MJy93dCut5tiokKTB0JiIwBlXAEO', 'Mohamed', 'mohamedmezghiche19@gmail.com'),
(20, 'annaba', '0666666', '$2y$10$aTp/2NXtgqTryLdYJSoKfuredKJjT0bG9IaZWPibkzVtl/vNc8p/u', 'takoua', 'touta@gmail.com');

-- --------------------------------------------------------

--
-- Structure de la table `commandes`
--

CREATE TABLE `commandes` (
  `id_commande` int(11) NOT NULL,
  `date_commande` datetime DEFAULT NULL,
  `paiement` varchar(50) DEFAULT NULL,
  `statut` enum('En attente','Validée','Refusée') DEFAULT 'En attente',
  `id_client` int(11) DEFAULT NULL,
  `id_repas` int(11) DEFAULT NULL,
  `Qauntite` int(100) NOT NULL,
  `prix` double NOT NULL,
  `session_active` tinyint(1) DEFAULT 1
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Déchargement des données de la table `commandes`
--

INSERT INTO `commandes` (`id_commande`, `date_commande`, `paiement`, `statut`, `id_client`, `id_repas`, `Qauntite`, `prix`, `session_active`) VALUES
(3, '2025-05-15 00:00:00', 'Espèces', 'En attente', 20, 36, 1, 300, 1),
(4, '2025-05-15 00:00:00', 'Espèces', 'En attente', 20, 39, 1, 40, 1),
(5, '2025-05-30 00:00:00', 'Espèces', 'En attente', 20, 40, 1, 350, 1),
(6, '2025-06-07 00:00:00', 'Espèces', 'En attente', 20, 41, 2, 100, 1),
(7, '2025-05-23 00:00:00', 'Espèces', 'En attente', 20, 37, 1, 400, 1),
(8, '2025-06-06 00:00:00', 'Espèces', 'En attente', 13, 37, 1, 400, 1),
(9, '2025-06-06 00:00:00', 'Espèces', 'En attente', 13, 36, 2, 600, 1),
(12, '2025-05-15 21:01:00', 'Espèces', 'En attente', 20, 34, 1, 350, 1),
(13, '2025-05-03 23:24:00', 'Espèces', 'Refusée', 20, 37, 6, 2400, 1);

-- --------------------------------------------------------

--
-- Structure de la table `repas`
--

CREATE TABLE `repas` (
  `id_repas` int(11) NOT NULL,
  `nom` varchar(255) NOT NULL,
  `description` varchar(255) NOT NULL,
  `prix` double NOT NULL,
  `disponibilte` tinyint(1) NOT NULL,
  `quantite` int(11) NOT NULL,
  `image` varchar(255) NOT NULL,
  `category` enum('boisson','sucré','grille','pizza','pasta') NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Déchargement des données de la table `repas`
--

INSERT INTO `repas` (`id_repas`, `nom`, `description`, `prix`, `disponibilte`, `quantite`, `image`, `category`) VALUES
(34, 'Tiramisu', 'Un dessert italien onctueux à base de mascarpone, de biscuits imbibés de café et saupoudré de cacao. ', 350, 1, 1000, 'uploads/1748437025_tiramisu.jpg', 'sucré'),
(35, 'Gauffre au chocolat noir', 'Gaufre croustillante, nappée de chocolat noir fondant.', 450, 1, 300, 'uploads/1748444503_gauffre chocolat noir.jpg', 'sucré'),
(36, 'Pizza fromage', 'Pizza avec fromage fondu et mozzarella, sur une base sauce tomate ou crème', 300, 1, 300, 'uploads/1748444612_delicieuse-pizza-au-fromage-isolee-blanc_495423-81807.jpg', 'pizza'),
(37, 'Tagliatelle Bolognaise', 'Pâtes avec sauce bolognaise à la viande hachée, tomate et oignons', 400, 1, 1000, 'uploads/1748444988_delicious-tagliatelle-bolognese-pasta-dish-recette-nourriture-italienne_84443-35408.avif', 'pasta'),
(39, 'Brochette viande', 'Brochettes de viande grillé.\r\nCombo Disponible :\r\nBrochette + Frites/Salade + Sauce au choix\r\n\r\n\r\n', 40, 1, 10000, 'uploads/1748445457_delicieuses-brochettes-viande-grillee-legumes-colores_191095-83568.avif', 'grille'),
(40, 'Crepe au chocolat', 'Crêpe croustillante garnie de chocolat fondu\r\nOption Complète\r\n\r\nCrêpe chocolat + boule de glace vanille + chantilly', 350, 1, 10000, 'uploads/1748445680_crepe-au-chocolat-amandes-plaque-blanche_587392-96.avif', 'sucré'),
(41, 'Ifri', 'Eau minéral 1,5L', 50, 1, 10000, 'uploads/1748447342_Ifri-Eau-Minerales-1.5L.jpg', 'boisson'),
(42, 'Rouiba Jus', 'Jus d\'orange 1L', 100, 1, 10000, 'uploads/1748447635_rouiba.jpg', 'boisson'),
(43, 'Coca-Cola', 'Boisson Gazeuse 1L', 150, 1, 10000, 'uploads/1748447686_coca.jpg', 'boisson'),
(44, 'Poisson Grillé', 'Dorade fraîche, délicatement assaisonné et grillé à la perfection. Servi avec un accompagnement au choix : riz parfumé, légumes sautés ou frites maison', 1000, 1, 1500, 'uploads/1748553260_poiss.avif', 'grille'),
(45, 'Pizza au champignon', 'Sauce tomate maison, mozzarella fondante et généreuse garniture de champignons frais sur une pâte croustillante.', 500, 1, 1000, 'uploads/1748553595_pizza shomp.avif', 'pizza'),
(46, 'Pizza au thon', 'Sauce tomate, mozzarella fondue, thon émietté et olives noires sur pâte croustillante.', 400, 1, 1000, 'uploads/1748553673_th.avif', 'pizza');

--
-- Index pour les tables déchargées
--

--
-- Index pour la table `admin`
--
ALTER TABLE `admin`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `user_name` (`user_name`) USING HASH;

--
-- Index pour la table `avis`
--
ALTER TABLE `avis`
  ADD PRIMARY KEY (`id`),
  ADD KEY `id_repas` (`id_repas`);

--
-- Index pour la table `categories`
--
ALTER TABLE `categories`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `nom` (`nom`);

--
-- Index pour la table `client`
--
ALTER TABLE `client`
  ADD PRIMARY KEY (`id_client`),
  ADD UNIQUE KEY `email` (`email`);

--
-- Index pour la table `commandes`
--
ALTER TABLE `commandes`
  ADD PRIMARY KEY (`id_commande`),
  ADD KEY `fk_client` (`id_client`),
  ADD KEY `fk_repas` (`id_repas`);

--
-- Index pour la table `repas`
--
ALTER TABLE `repas`
  ADD PRIMARY KEY (`id_repas`);

--
-- AUTO_INCREMENT pour les tables déchargées
--

--
-- AUTO_INCREMENT pour la table `admin`
--
ALTER TABLE `admin`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT pour la table `avis`
--
ALTER TABLE `avis`
  MODIFY `id` int(100) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;

--
-- AUTO_INCREMENT pour la table `categories`
--
ALTER TABLE `categories`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT pour la table `client`
--
ALTER TABLE `client`
  MODIFY `id_client` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=21;

--
-- AUTO_INCREMENT pour la table `commandes`
--
ALTER TABLE `commandes`
  MODIFY `id_commande` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- AUTO_INCREMENT pour la table `repas`
--
ALTER TABLE `repas`
  MODIFY `id_repas` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=47;

--
-- Contraintes pour les tables déchargées
--

--
-- Contraintes pour la table `commandes`
--
ALTER TABLE `commandes`
  ADD CONSTRAINT `fk_client` FOREIGN KEY (`id_client`) REFERENCES `client` (`id_client`),
  ADD CONSTRAINT `fk_repas` FOREIGN KEY (`id_repas`) REFERENCES `repas` (`id_repas`) ON DELETE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
