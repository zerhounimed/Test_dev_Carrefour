-- phpMyAdmin SQL Dump
-- version 4.9.2
-- https://www.phpmyadmin.net/
--
-- Hôte : 127.0.0.1:3306
-- Généré le :  jeu. 22 oct. 2020 à 16:15
-- Version du serveur :  10.4.10-MariaDB
-- Version de PHP :  7.4.0

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de données :  `db_api_rest_v2`
--

-- --------------------------------------------------------

--
-- Structure de la table `doctrine_migration_versions`
--

DROP TABLE IF EXISTS `doctrine_migration_versions`;
CREATE TABLE IF NOT EXISTS `doctrine_migration_versions` (
  `version` varchar(191) COLLATE utf8_unicode_ci NOT NULL,
  `executed_at` datetime DEFAULT NULL,
  `execution_time` int(11) DEFAULT NULL,
  PRIMARY KEY (`version`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Déchargement des données de la table `doctrine_migration_versions`
--

INSERT INTO `doctrine_migration_versions` (`version`, `executed_at`, `execution_time`) VALUES
('DoctrineMigrations\\Version20201020151144', '2020-10-20 15:12:20', 284);

-- --------------------------------------------------------

--
-- Structure de la table `user`
--

DROP TABLE IF EXISTS `user`;
CREATE TABLE IF NOT EXISTS `user` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `email` varchar(180) COLLATE utf8mb4_unicode_ci NOT NULL,
  `roles` longtext COLLATE utf8mb4_unicode_ci NOT NULL COMMENT '(DC2Type:json)',
  `password` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `username` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `UNIQ_8D93D649E7927C74` (`email`),
  UNIQUE KEY `UNIQ_8D93D649F85E0677` (`username`)
) ENGINE=InnoDB AUTO_INCREMENT=41 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Déchargement des données de la table `user`
--

INSERT INTO `user` (`id`, `email`, `roles`, `password`, `username`) VALUES
(21, 'marty.marc@gmail.com', '[\"ROLE_USER\"]', '6*p-N2f6,xY]t', 'paris.valentine'),
(22, 'honore.ramos@orange.fr', '[\"ROLE_USER\"]', '8I,)Nq/?af|J', 'frederic98'),
(23, 'alice.lucas@yahoo.fr', '[\"ROLE_USER\"]', 'OWYG^^3\'=;&ftye|Q3g', 'cbenoit'),
(24, 'maryse39@lejeune.com', '[\"ROLE_USER\"]', 'T10[^D+(,~\"i4;vI\'__', 'leduc.laetitia'),
(25, 'rene00@wanadoo.fr', '[\"ROLE_USER\"]', '1#ty1WcAO@85fxDO', 'gosselin.olivie'),
(26, 'michele.simon@live.com', '[\"ROLE_USER\"]', '-HI(*]+.', 'lebreton.gilles'),
(27, 'hbonnin@hotmail.fr', '[\"ROLE_USER\"]', '0e!_|y8d,>Xh', 'alexandria62'),
(28, 'alex.dupuis@jacquot.com', '[\"ROLE_USER\"]', 's(!)AZsx|', 'celina98'),
(29, 'astrid26@pottier.fr', '[\"ROLE_USER\"]', 'O<+pRpD/~%', 'henriette.barbier'),
(30, 'egauthier@dbmail.com', '[\"ROLE_USER\"]', 'dP\'u(#U-~N4TS', 'lcoulon'),
(31, 'gerard.guy@noos.fr', '[\"ROLE_ADMIN\"]', 'izkz<8R]OWACv6m,orb5', 'maggie09'),
(32, 'pcousin@live.com', '[\"ROLE_ADMIN\"]', '/@zb!I,r', 'hhamel'),
(33, 'allain.xavier@club-internet.fr', '[\"ROLE_ADMIN\"]', ':<=L63O!Kg', 'denis.alix'),
(34, 'jeannine.leduc@martineau.com', '[\"ROLE_ADMIN\"]', '2q6c.%Ku', 'adelaide17'),
(35, 'william.legall@bernier.com', '[\"ROLE_ADMIN\"]', 'J8p{:@?i64=*gemW', 'william.robert'),
(36, 'pcharrier@club-internet.fr', '[\"ROLE_ADMIN\"]', 'ZpW$m\\QC%~b{kWO', 'loiseau.chantal'),
(37, 'xbegue@laposte.net', '[\"ROLE_ADMIN\"]', 'uA,P?}hXs1I]-a3-=', 'gilbert02'),
(38, 'abreton@live.com', '[\"ROLE_ADMIN\"]', 'X(u{RN)>dSP6?h~[XV1i', 'bschneider'),
(39, 'eugene84@free.fr', '[\"ROLE_ADMIN\"]', '\\)$V.9PSb', 'amelie33'),
(40, 'michelle.perrin@free.fr', '[\"ROLE_ADMIN\"]', 'test1234', 'aimee.riou');
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
