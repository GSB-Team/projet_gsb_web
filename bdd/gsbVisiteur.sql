-- phpMyAdmin SQL Dump
-- version 4.9.7
-- https://www.phpmyadmin.net/
--
-- Hôte : localhost:8889
-- Généré le : lun. 28 mars 2022 à 08:45
-- Version du serveur :  5.7.32
-- Version de PHP : 7.4.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de données : `gsbVisiteur`
--

-- --------------------------------------------------------

--
-- Structure de la table `emprunter`
--

CREATE TABLE `emprunter` (
  `dateEmprunter` date NOT NULL,
  `dateRestituer` date DEFAULT NULL,
  `vis_matricule` char(10) NOT NULL,
  `idMateriel` int(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Déchargement des données de la table `emprunter`
--

INSERT INTO `emprunter` (`dateEmprunter`, `dateRestituer`, `vis_matricule`, `idMateriel`) VALUES
('2021-12-20', '2021-12-22', 'a17', 1),
('2021-12-27', '2021-12-30', 'a55', 5),
('2021-12-27', '2021-12-30', 'a93', 3),
('2021-11-08', '2021-11-18', 'b16', 5),
('2022-01-25', NULL, 'b28', 2),
('2021-10-11', '2021-12-15', 'b28', 4),
('2022-03-26', NULL, 'b28', 5),
('2022-01-20', '2022-03-25', 'b28', 6),
('2021-12-23', '2022-03-25', 'b4', 1),
('2021-12-20', '2021-12-29', 'b4', 4),
('2022-02-26', NULL, 'b4', 4),
('2022-01-01', NULL, 'c14', 3);

-- --------------------------------------------------------

--
-- Structure de la table `materiel`
--

CREATE TABLE `materiel` (
  `Id` int(30) NOT NULL,
  `Marque` varchar(120) DEFAULT NULL,
  `Dimension` varchar(50) DEFAULT NULL,
  `Modele` varchar(120) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Déchargement des données de la table `materiel`
--

INSERT INTO `materiel` (`Id`, `Marque`, `Dimension`, `Modele`) VALUES
(1, 'apple', '13 pouce', 'MacBook Air'),
(2, 'apple', '16 pouce', 'MacBook Air'),
(3, 'apple', '16 pouce', 'MacBook Pro'),
(4, 'apple', '13 pouce', 'MacBook Pro'),
(5, 'apple', '11 pouce', 'MacBook Pro'),
(6, 'apple', '20 pouce', 'MacBook PRO'),
(7, 'ACER', '13,3 pouce', 'chromebook'),
(8, 'ACER', '17 pouce', 'chromebook'),
(9, 'ACER', '13 pouce', 'chromebook');

-- --------------------------------------------------------

--
-- Structure de la table `visiteur`
--

CREATE TABLE `visiteur` (
  `VIS_MATRICULE` char(10) NOT NULL,
  `VIS_NOM` char(25) NOT NULL,
  `VIS_PRENOM` char(50) NOT NULL,
  `VIS_ADRESSE` char(50) DEFAULT NULL,
  `VIS_CP` char(5) DEFAULT NULL,
  `VIS_VILLE` char(30) DEFAULT NULL,
  `mdp` varchar(50) NOT NULL,
  `adresseMail` varchar(255) NOT NULL,
  `role` varchar(255) NOT NULL,
  `mdp1` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Déchargement des données de la table `visiteur`
--

INSERT INTO `visiteur` (`VIS_MATRICULE`, `VIS_NOM`, `VIS_PRENOM`, `VIS_ADRESSE`, `VIS_CP`, `VIS_VILLE`, `mdp`, `adresseMail`, `role`, `mdp1`) VALUES
('a17', 'Andre', 'David', '3 r Aimon de Chiss', '38100', 'Grenoble', '1234', 'andredavid@gmail.com', 'visiteur', '1234'),
('a55', 'Bedos', 'Christian', '1 r B', '65000', 'TARBES', '11111', 'bedoschristian@gmail.com', 'visiteur', '11111'),
('a93', 'Tusseau', 'Louis', '22 r Renou', '86000', 'POITIERS', '12345UG5I', 'tusseaulouis@gmail.com', 'visiteur', '12345UG5I'),
('b13', 'Bentot', 'Pascal', '11 av 6 Juin', '67000', 'STRASBOURG', 'qsdfghhj', 'bentotpascal@gmail.com', 'admin', 'qsdfghhj'),
('b16', 'Bioret', 'Luc', '1 r Linne', '35000', 'RENNES', 'AERTY', 'bioretluc@gmail.com', 'admin', 'AERTY'),
('b19', 'Bunisset', 'Francis', '10 r Nicolas Chorier', '85000', 'LA ROCHE SUR YON', 'wxcvbn,', 'bunissetfrancis@gmail.com', 'admin', 'wxcvbn,'),
('b25', 'Bunisset', 'Denise', '1 r Lionne', '49100', 'ANGERS', '123456789098', 'bunissetdenise@gmail.com', 'visiteur', '123456789098'),
('b28', 'Cacheux', 'Bernard', '114 r Authie', '34000', 'MONTPELLIER', 'qsdfghjklmù', 'cacheuxbernard@gmail.com', 'admin', 'qsdfghjklmù'),
('b34', 'Cadic', 'Eric', '123 r Caponi', '41000', 'BLOIS', 'mlkjhgf', 'cadiceric@gmail.com', 'admin', 'mlkjhgf'),
('b4', 'Charoze', 'Catherine', '100 pl G', '33000', 'BORDEAUX', 'poiuytrez', 'charoze@gmail.com', 'visiteur', 'poiuytrez'),
('b50', 'Clepkens', 'Christophe', '12 r F', '13000', 'MARSEILLE', 'nbvcxw', 'clepkens@gmail.com', 'visiteur', 'nbvcxw'),
('b59', 'Cottin', 'Vincenne', '36 sq Capucins', '5000', 'GAP', 'zertyuioiuyt', 'cottin@gmail.com', 'visiteur', 'zertyuioiuyt'),
('c14', 'Daburon', 'Fran', '13 r Champs Elys', '6000', 'NICE', '123456765432', 'daburon@gmail.com', 'visiteur', '123456765432'),
('c3', 'De', 'Philippe', '13 r Charles Peguy', '10000', 'TROYES', '09876567890', 'philippeDe@gmail.com', 'visiteur', '123456765432'),
('c54', 'Debelle', 'Michel', '181 r Caponi', '88000', 'EPINAL', '12345676543212', 'debelleMichel@gmail.com', 'visiteur', '12345676543212'),
('d13', 'Debelle', 'Jeanne', '134 r Stalingrad', '44000', 'NANTES', '1234543', 'debelleJeanne@gmail.com', 'visiteur', '1234543'),
('d51', 'Debroise', 'Michel', '2 av 6 Juin', '70000', 'VESOUL', '3432345', 'debroise@gmail.com', 'admin', '3432345'),
('e22', 'Desmarquest', 'Nathalie', '14 r F', '54000', 'NANCY', '0987898789', 'desmarquest@gmail.com', 'admin', '0987898789'),
('e24', 'Desnost', 'Pierre', '16 r Barral de Montferrat', '55000', 'VERDUN', '23432345', 'desnot@gmail.com', 'visiteur', '23432345'),
('e39', 'Dudouit', 'Fr', '18 quai Xavier Jouvin', '75000', 'PARIS', '34543', 'dubouit@gmail.com', 'admin', '34543'),
('e49', 'Duncombe', 'Claude', '19 av Alsace Lorraine', '9000', 'FOIX', '23EDE3E', 'duncombe@gmail.com', 'visiteur', '23EDE3E'),
('e5', 'Enault-Pascreau', 'C', '25B r Stalingrad', '40000', 'MONT DE MARSAN', '3E4R4R4', 'enaultc@gmail.com', 'visiteur', '3E4R4R4'),
('e52', 'Eynde', 'Val', '3 r Henri Moissan', '76000', 'ROUEN', '5R45TR5TR5', 'eynde@gmail.com', 'admin', '5R45TR5TR5'),
('f21', 'Finck', 'Jacques', 'rte Montreuil Bellay', '74000', 'ANNECY', '3EDEDER', 'finck@gmail.com', 'admin', '3EDEDER'),
('f39', 'Fr', 'Fernande', '4 r Jean Giono', '69000', 'LYON', '345RE4', 'fr@gmail.com', 'visiteur', '345RE4'),
('f4', 'Gest', 'Alain', '30 r Authie', '46000', 'FIGEAC', '67878U8', 'gest@gmail.com', 'visiteur', '67878U8'),
('g19', 'Gheysen', 'Galassus', '32 bd Mar Foch', '75000', 'PARIS', '98I9I9', 'gheysen@gmail.com', 'visiteur', '98I9I9'),
('g30', 'Girard', 'Yvon', '31 av 6 Juin', '80000', 'AMIENS', 'YTHYHYHY', 'girard@gmail.com', 'visiteur', 'YTHYHYHY'),
('g53', 'Gombert', 'Luc', '32 r Emile Gueymard', '56000', 'VANNES', 'RTGTRYUIU', 'gombert@gmail.com', 'visiteur', 'RTGTRYUIU'),
('g7', 'Guindon', 'Caroline', '40 r Mar Montgomery', '87000', 'LIMOGES', '12', 'guindon@gmail.com', 'visiteur', '12'),
('h13', 'Guindon', 'Fran', '44 r Picoti', '19000', 'TULLE', '123', 'duindonFran@gmail.com', 'visiteur', '123'),
('h30', 'Igigabel', 'Guy', '33 gal Arlequin', '94000', 'CRETEIL', '123Z', 'igigabel@gmail.com', 'admin', '123Z'),
('h35', 'Jourdren', 'Pierre', '34 av Jean Perrot', '15000', 'AURRILLAC', '123E', 'jourden@gmail.com', 'visiteur', '123E'),
('h40', 'Juttard', 'Pierre-Raoul', '34 cours Jean Jaur', '8000', 'SEDAN', '123S', 'juttard@gmail.com', 'admin', '123S'),
('j45', 'Labour', 'Saout', '38 cours Berriat', '52000', 'CHAUMONT', '123D', 'labour@gmail.com', 'visiteur', '123D'),
('j50', 'Landr', 'Philippe', '4 av G', '59000', 'LILLE', '123X', 'landr@gmail.com', 'admin', '123X'),
('j8', 'Langeard', 'Hugues', '39 av Jean Perrot', '93000', 'BAGNOLET', '123W', 'langeard@gmail.com', 'visiteur', '123W'),
('k4', 'Lanne', 'Bernard', '4 r Bayeux', '30000', 'NIMES', '123F', 'lanne@gmail.com', 'visiteur', '123F'),
('k53', 'Le', 'No', '4 av Beauvert', '68000', 'MULHOUSE', '123G', 'leNo@gmail.com', 'admin', '1234G'),
('l14', 'Le', 'Jean', '39 r Raspail', '53000', 'LAVAL', '12345', 'leJean@gmail.com', 'visiteur', '12345'),
('l23', 'Leclercq', 'Servane', '11 r Quinconce', '18000', 'BOURGES', '123456780°', 'leclercq@gmail.com', 'visiteur', '123456780°'),
('l46', 'Lecornu', 'Jean-Bernard', '4 bd Mar Foch', '72000', 'LA FERTE BERNARD', 'CV', 'lecornu@gmail.com', 'visiteur', 'CV'),
('l56', 'Lecornu', 'Ludovic', '4 r Abel Servien', '25000', 'BESANCON', 'CVB', 'lecornuLudovic@gmail.com', 'visiteur', 'CVB'),
('m35', 'Lejard', 'Agn', '4 r Anthoard', '82000', 'MONTAUBAN', 'CVBN', 'lejard@gmail.com', 'visiteur', 'CVBN'),
('m45', 'Lesaulnier', 'Pascal', '47 r Thiers', '57000', 'METZ', 'WXCV', 'lesaulnier@gmail.com', 'visiteur', 'WXCV'),
('n42', 'Letessier', 'St', '5 chem Capuche', '27000', 'EVREUX', 'WXCVB', 'letessier@gmail.com', 'visiteur', 'WXCVB'),
('n58', 'Loirat', 'Didier', 'Les P', '45000', 'ORLEANS', 'WXCVBN', 'loirat@gmail.com', 'visiteur', 'WXCVBN'),
('n59', 'Maffezzoli', 'Thibaud', '5 r Chateaubriand', '2000', 'LAON', 'AZERTY', 'maffezzoli@gmail.com', 'visiteur', 'AZERTY'),
('o26', 'Mancini', 'Anne', "5 r D\'Agier", '48000', 'MENDE', 'AZERTYU', 'mancini@gmail.com', 'visiteur', 'AZERTYU'),
('p32', 'Marcouiller', 'G', '7 pl St Gilles', '91000', 'ISSY LES MOULINEAUX', 'AZERTYUI', 'marcouiller@gmail.com', 'visiteur', 'AZERTYUI9'),
('p40', 'Michel', 'Jean-Claude', '5 r Gabriel P', '61000', 'FLERS', 'AZERTYUIO', 'michel@gmail.com', 'visiteur', 'AZERTYUIO'),
('p41', 'Montecot', 'Fran', '6 r Paul Val', '17000', 'SAINTES', 'AZERTYUIOP', 'montecot@gmail.com', 'admin', 'AZERTYUIOP'),
('p42', 'Notini', 'Veronique', '5 r Lieut Chabal', '60000', 'BEAUVAIS', 'QS', 'notini@gmail.com', 'admin', 'QS'),
('p49', 'Onfroy', 'Den', '5 r Sidonie Jacolin', '37000', 'TOURS', 'QSD', 'onfroy@gmail.com', 'admin', 'QSD'),
('p6', 'Pascreau', 'Charles', '57 bd Mar Foch', '64000', 'PAU', 'QSDF', 'pascreau@gmail.com', 'admin', 'QSDF'),
('p7', 'Pernot', 'Claude-No', '6 r Alexandre 1 de Yougoslavie', '11000', 'NARBONNE', 'QSDFG', 'pernot@gmail.com', 'admin', 'QSDFG'),
('p8', 'Perrier', 'Ma', '6 r Aubert Dubayet', '71000', 'CHALON SUR SAONE', 'QSDFGH', 'perrier@gmail.com', 'visiteur', 'QSDFGH'),
('q17', 'Petit', 'Jean-Louis', '7 r Ernest Renan', '50000', 'SAINT LO', 'QSDFGHJ', 'petit@gmail.com', 'visiteur', 'QSDFGHJ'),
('r24', 'Piquery', 'Patrick', '9 r Vaucelles', '14000', 'CAEN', 'QSDFGHJKL', 'piquery@gmail.com', 'visiteur', 'QSDFGHJKL'),
('r58', 'Quiquandon', 'Jo', '7 r Ernest Renan', '29000', 'QUIMPER', 'QSDFGHJK', 'quiquandon@gmail.com', 'visiteur', 'QSDFGHJK'),
('s10', 'Retailleau', 'Josselin', '88Bis r Saumuroise', '39000', 'DOLE', 'AZSEDRF', 'retailleau@gmail.com', 'visiteur', 'AQZSEDRF'),
('s21', 'Retailleau', 'Pascal', '32 bd Ayrault', '23000', 'MONTLUCON', 'AQZSEDRFTG', 'retailleauPascal@gmail.com', 'visiteur', 'AQZSEDRFTG'),
('t43', 'Souron', 'Maryse', '7B r Gay Lussac', '21000', 'DIJON', 'AQZSEDRFTGYH', 'souron@gmail.com', 'visiteur', 'AQZSEDRFTGYH'),
('t47', 'Tiphagne', 'Patrick', '7B r Gay Lussac', '62000', 'ARRAS', 'AQWZSX', 'tiphane@gmail.com', 'visiteur', 'AQWZSX'),
('t55', 'Tr', 'Alain', '7D chem Barral', '12000', 'RODEZ', 'AQWZSXE', 'tr@gmail.com', 'visiteur', 'AQWZSXE'),
('t60', 'Tusseau', 'Josselin', '63 r Bon Repos', '28000', 'CHARTRES', 'AQWZSXED', 'tusseau@gmail.com', 'visiteur', 'AQWZSXED');

--
-- Index pour les tables déchargées
--

--
-- Index pour la table `emprunter`
--
ALTER TABLE `emprunter`
  ADD PRIMARY KEY (`vis_matricule`,`idMateriel`,`dateEmprunter`) USING BTREE,
  ADD KEY `dateEmprunter` (`dateEmprunter`),
  ADD KEY `idMateriel` (`idMateriel`);

--
-- Index pour la table `materiel`
--
ALTER TABLE `materiel`
  ADD PRIMARY KEY (`Id`);

--
-- Index pour la table `visiteur`
--
ALTER TABLE `visiteur`
  ADD PRIMARY KEY (`VIS_MATRICULE`);

--
-- Contraintes pour les tables déchargées
--

--
-- Contraintes pour la table `emprunter`
--
ALTER TABLE `emprunter`
  ADD CONSTRAINT `emprunter_ibfk_1` FOREIGN KEY (`vis_matricule`) REFERENCES `visiteur` (`VIS_MATRICULE`),
  ADD CONSTRAINT `emprunter_ibfk_2` FOREIGN KEY (`idMateriel`) REFERENCES `materiel` (`Id`);

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;