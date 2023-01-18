-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Hôte : localhost
-- Généré le : mer. 18 jan. 2023 à 15:43
-- Version du serveur : 10.4.27-MariaDB
-- Version de PHP : 8.0.25

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de données : `loja`
--

-- --------------------------------------------------------

--
-- Structure de la table `produits`
--

CREATE TABLE `produits` (
  `id` int(11) NOT NULL,
  `nom` varchar(30) NOT NULL,
  `description` varchar(40) NOT NULL,
  `description_en` varchar(20) NOT NULL,
  `prix` int(10) NOT NULL,
  `url_img` varchar(255) NOT NULL,
  `type` varchar(20) NOT NULL,
  `userAdm` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Déchargement des données de la table `produits`
--

INSERT INTO `produits` (`id`, `nom`, `description`, `description_en`, `prix`, `url_img`, `type`, `userAdm`) VALUES
(6, 'mustang shelby', 'kp\"vbhznvip\"n\"rhbv', 'kbvh\'erbvprvj', 3000, 'https://www.largus.fr/images/images/ford-mustang-shelby-gt500-5.jpg', 'voiture', '1'),
(7, 'mustang eletric', 'hjefjvipfejvpbf', 'epvnjfn,vkn\"jvnirb', 5000, 'https://www.automobile-magazine.fr/asset/cms/168590/config/117397/ford-mustang-mach-e-03.jpg', 'voiture', '1'),
(8, 'titan 160', 'hujzhuurghuvhzuo', 'zrkgnjzrhgzhour', 1000, 'https://1.bp.blogspot.com/-tGUFmYpg5Zs/XdrZrT-0YmI/AAAAAAAAZJc/-22AHL2XWggNX28_FXSnpmejJfzVyF3-QCLcBGAsYHQ/s1600/Honda-CG-160-Titan-2020%2B%252810%2529.jpg', 'moto', '1'),
(9, 'falcon', 'evtbhnrgber', 'gfrvbygdbevfevv', 2000, 'https://i0.wp.com/www.blogdecoches.net/wp-content/uploads/2017/03/Nueva-Honda-Falcon-NX-400-2017-Datos-Precio-Ficha-T%C3%A9cnica-Consumo-03.jpg?ssl=1', 'moto', '1'),
(10, 'santana', 'evvbnjehbve', 'evbefhbvhefbhv', 5000, 'https://1.bp.blogspot.com/-y5UCQ2F4fWo/Xwn5bOYkxEI/AAAAAAACz_U/YPmSTtHJB3gequbS56BF5npyD-y-P9tigCLcBGAsYHQ/s1600/IMG_2768.JPG', 'voiture', '1'),
(11, 'fusca', 'zvrnovozripvbzpur', 'zjhfhrbvbzrh', 10000, 'https://i.pinimg.com/originals/84/6a/d1/846ad159c9fdb65dd15637d0675bf289.jpg', 'voiture', '1'),
(12, 'jeep willys', 'rv\"thrtutdrgb', 'r\"vbrbvhi\"rv', 20000, 'https://www.flashrc.com/images/produits/39110/FMS_1-12-JeepWillysMB-RTR_FMS11201RTR-08.jpg', 'voiture', '1'),
(13, 'boulevard M800', 'bhveuofbv', 'epvnfjn,vkefbj', 7000, 'https://moto-station.com/wp-content/uploads/2018/02/Suzuki_M800_st5pz-1.jpg', 'moto', '1');

-- --------------------------------------------------------

--
-- Structure de la table `Types`
--

CREATE TABLE `Types` (
  `id` int(11) NOT NULL,
  `nom` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Déchargement des données de la table `Types`
--

INSERT INTO `Types` (`id`, `nom`) VALUES
(1, 'voiture'),
(2, 'moto');

-- --------------------------------------------------------

--
-- Structure de la table `user`
--

CREATE TABLE `user` (
  `id` int(11) NOT NULL,
  `nom` varchar(30) NOT NULL,
  `email` varchar(30) NOT NULL,
  `password` varchar(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Déchargement des données de la table `user`
--

INSERT INTO `user` (`id`, `nom`, `email`, `password`) VALUES
(1, 'nubmitos', 'lecnam@gmail.com', 'nubmitos'),
(2, 'juan', 'cnam@gmail.com', 'nubmitos'),
(6, 'teste2', 'cnam@gmail.com', 'nubmitos');

--
-- Index pour les tables déchargées
--

--
-- Index pour la table `produits`
--
ALTER TABLE `produits`
  ADD PRIMARY KEY (`id`);

--
-- Index pour la table `Types`
--
ALTER TABLE `Types`
  ADD PRIMARY KEY (`id`);

--
-- Index pour la table `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT pour les tables déchargées
--

--
-- AUTO_INCREMENT pour la table `produits`
--
ALTER TABLE `produits`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=31;

--
-- AUTO_INCREMENT pour la table `Types`
--
ALTER TABLE `Types`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT pour la table `user`
--
ALTER TABLE `user`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
