-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Hôte : localhost:3306
-- Généré le : lun. 05 juin 2023 à 20:44
-- Version du serveur : 10.3.39-MariaDB
-- Version de PHP : 8.1.16

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de données : `calmette_resaweb`
--

-- --------------------------------------------------------

--
-- Structure de la table `destinations`
--

CREATE TABLE `destinations` (
  `id_destination` int(11) NOT NULL,
  `nom_destination` varchar(150) NOT NULL,
  `prix_destination` int(5) NOT NULL,
  `id_monde` int(11) NOT NULL,
  `image_destination` varchar(500) NOT NULL,
  `description_destination` varchar(2000) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Déchargement des données de la table `destinations`
--

INSERT INTO `destinations` (`id_destination`, `nom_destination`, `prix_destination`, `id_monde`, `image_destination`, `description_destination`) VALUES
(1, 'Plaine d\'Hyrule (OoT)', 200, 1, 'img/hyrule-field-oot.jpg', 'Profitez de paysages à couper le souffle, d\'épreuves palpitantes et de rencontres inoubliables. Avec notre offre, vous pourrez explorer les endroits les plus emblématiques de la Plaine d\'Hyrule et vivre des moments d\'aventure intenses en compagnie de guides expérimentés. Parcourez des paysages à couper le souffle, des prairies verdoyantes aux rivières scintillantes, en passant par les forêts mystérieuses. Rencontrez des personnages emblématiques, affrontez des créatures mythiques et explorez les secrets cachés de ce monde enchanteur. Réservez dès maintenant votre aventure inoubliable dans la Plaine d\'Hyrule et créez vos propres souvenirs légendaires !\"'),
(2, 'Plaine d\'Hyrule (TP)', 500, 2, 'img/hyrule-field-tp.jpg ', 'Parcourez des étendues verdoyantes à perte de vue, où les brins d\'herbe ondulent doucement sous la caresse du vent. Immergez-vous dans un paysage pittoresque, où les rivières sinueuses serpentent à travers les vallées et les collines verdoyantes. Explorez les mystères cachés de cette plaine emblématique, des ruines antiques aux grottes secrètes, en vous aventurant hors des sentiers battus.Plongez dans l\'univers envoûtant de Zelda Twilight Princess et laissez-vous porter par l\'atmosphère envoûtante de la Plaine d\'Hyrule, un lieu où la beauté et l\'aventure se rejoignent.\"'),
(3, 'Plaine d\'Hyrule (BotW)', 500, 4, 'img/hyrule-field.jpg ', 'Parcourez des étendues infinies, où les herbes ondulent au gré du vent et les fleurs sauvages colorent le paysage. Grimpez sur les sommets des collines pour contempler des panoramas à couper le souffle, des forêts luxuriantes aux rivières scintillantes en contrebas. Plongez dans les prairies verdoyantes, en suivant les chemins qui se frayent un chemin à travers les plaines, ou partez à l\'aventure et explorez les secrets cachés des ruines antiques. Rencontrez des animaux sauvages et observez les créatures mythiques qui peuplent ces terres enchantées. Respirez l\'air pur et ressentez l\'immensité de ce monde ouvert, où chaque recoin révèle une nouvelle surprise.'),
(4, 'Domaine Zora (OoT)', 700, 1, 'img/zora-domain-oot.jpg', 'Niché au bord d\'une cascade étincelante, ce lieu enchanteur abrite une civilisation aquatique avancée, les Zoras. Explorez les rives du lac Zora, où les eaux cristallines scintillent sous les rayons du soleil, créant une ambiance paisible et sereine. Admirez l\'architecture élégante des bâtiments zoras, mêlant harmonieusement les éléments naturels à l\'ingéniosité créative. Imprégnez-vous de l\'atmosphère enchanteresse de cet endroit unique, où la beauté naturelle se mêle à la magie de l\'univers de Zelda. Préparez vous à vivre une aventure aquatique inoubliable au cœur du Domaine Zora.\"'),
(5, 'Domaine Zora (TP)', 700, 2, 'img/zora-domain-tp.jpg', 'Niché au cœur d\'une vallée verdoyante, ce royaume des eaux abrite une race d\'êtres nobles et gracieux : les Zoras. Plongez dans les eaux cristallines du lac Zora, où les reflets de la lune se mêlent à la lumière des lucioles dansantes. Admirez l\'architecture majestueuse des bâtiments zoras, qui semblent surgir des profondeurs du lac. Rencontrez les habitants du domaine, des créatures aquatiques empreintes de sagesse et de noblesse, prêtes à vous guider dans votre quête. Embarquez pour une aventure palpitante en naviguant sur des embarcations ancestrales et en explorant des grottes sous-marines remplies de mystères'),
(6, 'Domaine Zora (BotW)', 700, 4, 'img/zora-domain.jpg', '\r\nNiché dans les montagnes enneigées, ce royaume aquatique regorge de merveilles à découvrir. Laissez-vous émerveiller par les cascades majestueuses qui dévalent les parois rocheuses, créant une symphonie apaisante. Traversez le pont ancestral qui relie les rives du domaine et entrez dans un monde aquatique enchanté. Rencontrez les Zoras, une race noble et gracieuse, qui veille sur ces terres avec sagesse et bienveillance. Leur architecture élégante se fond harmonieusement dans le paysage, offrant des vues panoramiques à couper le souffle. Explorez les eaux cristallines du lac Zora, où les reflets du soleil dansent avec les reflets des poissons colorés. '),
(7, 'Village Goron (OoT)', 200, 1, 'img/goron-city-oot.jpg', 'Plongez dans l\'ambiance vibrante de ce village pittoresque, où les Gorons, une tribu robuste et joviale, vaquent à leurs activités quotidiennes. Parcourez les ruelles sinueuses et admirez les maisons en pierre magnifiquement sculptées qui se fondent parfaitement dans le paysage montagneux. Entrez dans la salle de danse animée où les Gorons se réunissent pour célébrer leurs traditions ancestrales au son de la musique tribale. Explorez les cavernes souterraines qui abritent de précieuses gemmes et des secrets mystérieux. Le Village Goron vous attend avec son ambiance unique et son hospitalité chaleureuse, prêt à vous immerger dans l\'univers magique de Zelda: Ocarina of Time.'),
(8, 'Village Goron (BotW)', 200, 4, 'img/goron-city.jpg', ' Imprégnez-vous de l\'atmosphère chaleureuse de ce village pittoresque, où la lave coule en cascade le long des parois rocheuses. Les Gorons, une tribu robuste et puissante, vous accueilleront avec leur hospitalité légendaire. Découvrez leurs maisons taillées dans la pierre, qui semblent fusionner harmonieusement avec l\'environnement volcanique. Préparez-vous à relever des défis épiques, car les Gorons sont connus pour leur amour des épreuves de force et de l\'escalade des montagnes escarpées. Prenez le temps de vous relaxer dans les sources chaudes naturelles, qui offrent une guérison et une détente bien méritées après une journée d\'aventure. '),
(9, 'Village Cocorico', 300, 1, 'img/Cocorico_oot.jpg', 'Plongez-vous dans l\'atmosphère pittoresque de ce village perché au sommet d\'une colline, entouré de paysages enchanteurs. Vous aurez l\'occasion de rencontrer des habitants chaleureux et de découvrir leur mode de vie rural. Explorez les recoins du village, visitez la célèbre auberge de Talon ou assistez à un spectacle au théâtre local. Que vous soyez un passionné de culture, un amoureux de la nature ou simplement à la recherche d\'une escapade tranquille, notre offre saura répondre à vos attentes. '),
(10, 'Village Cocorico', 300, 4, 'img/Cocorico.jpg', 'Plongez-vous dans l\'atmosphère pittoresque de ce village perché au sommet d\'une colline, entouré de paysages enchanteurs. Vous aurez l\'occasion de rencontrer des habitants chaleureux et de découvrir leur mode de vie rural. Explorez les recoins du village, visitez la célèbre auberge de Talon ou assistez à un spectacle au théâtre local. Que vous soyez un passionné de culture, un amoureux de la nature ou simplement à la recherche d\'une escapade tranquille, notre offre saura répondre à vos attentes. '),
(11, 'Palais du Crépuscule', 0, 2, 'img/Palaceoftwilght.png', 'Ce palais majestueux est situé dans le royaume du Crépuscule, un monde mystérieux et sombre parallèle à Hyrule.\r\nIl est habité par des créatures étranges et des ennemis redoutables, ce qui en fait un endroit dangereux mais passionnant à explorer.\r\nÀ l\'intérieur du palais, vous trouverez des salles somptueuses remplies de pièges, d\'énigmes et de monstres à vaincre. Vous devrez utiliser toutes vos compétences pour surmonter ces obstacles et atteindre le cœur du palais.\r\nLe Palais du Crépuscule est une destination de choix pour les voyageurs cherchant une expérience de jeu immersive et intense, avec des défis stimulants à relever.'),
(12, 'Village d\'Ecaraille', 600, 4, 'img/Ecaraille.jpg', 'Situé sur la côte sud-est de la région, ce village pittoresque offre un cadre idyllique pour les voyageurs en quête de détente.\r\nLe village d\'Ecaraille est entouré de magnifiques plages de sable fin et de falaises spectaculaires, offrant de nombreuses opportunités de baignade, de pêche et de surf. Les habitants d\'Ecaraille sont des pêcheurs et des commerçants sympathiques qui vous accueilleront avec le sourire et vous proposeront des produits frais et des souvenirs locaux.\r\nQue vous soyez un voyageur en quête de détente ou un aventurier en quête de défis, le Village d\'Ecaraille est un endroit magnifique et accueillant à découvrir!\r\n'),
(13, 'Village d\'Elimith', 600, 4, 'img/Elimith.png', 'Plongez dans l\'atmosphère paisible de ce village pittoresque niché au cœur d\'une vallée verdoyante. Découvrez les maisons colorées, les jardins fleuris et les habitants chaleureux qui vous accueilleront à bras ouverts. Vous aurez l\'occasion de visiter le plus célèbre teinturier de la région, explorer les mystères du Sanctuaire d\'Elimith et déguster des spécialités locales. Que vous soyez en quête de détente, d\'artisanat ou d\'aventure à travers les collines environnantes, notre offre saura vous combler.'),
(14, 'Célesbourg', 900, 3, 'img/Celesbourg.jpg', ' Plongez dans les nuages et découvrez cette cité céleste magique et majestueuse. Admirez les architectures grandioses des temples flottants, explorez les jardins suspendus et profitez de vues à couper le souffle sur les terres d\'Hyrule. Rencontrez les habitants des cieux, les Oiseaux de la race céleste, et découvrez leurs coutumes et leurs secrets. Que vous soyez un explorateur avide ou simplement à la recherche d\'une escapade hors du commun, notre offre vous promet une expérience céleste exceptionnelle.'),
(15, 'Gorges de Lanelle', 200, 3, 'img/Gorges_de_Lanelle_.jpg', 'Plongez au cœur d\'un paysage aride et mystérieux, où les dunes sans fin et les ruines antiques vous attendent. Explorez les secrets enfouis sous le sable, découvrez des oasis cachées et affrontez les défis qui se dressent sur votre chemin. Que vous soyez un aventurier intrépide ou un amateur d\'histoire, notre offre vous promet des découvertes uniques et des rencontres fascinantes avec les habitants du désert.'),
(16, 'Forêt de Firone', 300, 3, 'img/Faron.jpg ', 'Plongez dans une végétation luxuriante, des arbres majestueux et des rivières cristallines. Explorez les recoins secrets de la forêt, découvrez des sanctuaires mystérieux et rencontrez des créatures fascinantes telles que les Koroks. Que vous soyez un amoureux de la nature, un aventurier avide de défis ou simplement en quête de sérénité, notre offre saura vous combler. '),
(17, 'Volcan d\'Ordinn', 100, 3, 'img/Ordinn.jpg ', 'Plongez dans un paysage spectaculaire où les flammes rugissent et où la lave en fusion coule dans les profondeurs. Explorez les sentiers escarpés, découvrez des cavernes mystérieuses et affrontez les défis ardus qui vous attendent. Vous aurez également l\'occasion de rencontrer les Gorons, une race de montagnards robustes et amicaux. Que vous soyez un aventurier aguerri ou un passionné de géologie, notre offre vous promet des sensations fortes et des panoramas à couper le souffle'),
(18, 'Tour des Cieux', 300, 3, 'img/Sky_Keep.jpg', 'Plongez dans les hauteurs vertigineuses de cette tour légendaire qui s\'élève dans les cieux. Montez les étages à couper le souffle, résolvez des énigmes complexes et admirez des panoramas à couper le souffle sur les terres d\'Hyrule. Vous découvrirez des sanctuaires sacrés et vous pourrez rencontrer les Gardiens célestes, des créatures mystérieuses. Que vous soyez un aventurier en quête de défis ou simplement un passionné de vues panoramiques, notre offre vous promet une expérience mémorable. '),
(19, 'Psysalis', 100, 3, 'img/Silent_Realm.jpg', 'Préparez-vous à une expérience mystérieuse et palpitante avec notre offre de voyage au Psysalis. Plongez dans un royaume éthéré, où le calme règne et où des épreuves uniques vous attendent. Explorez des paysages énigmatiques et découvrez les secrets cachés dans les recoins sombres de ce royaume éthéré. Vous devrez relever des défis spirituels et collecter des fragments d\'âme pour prouver votre valeur. Que vous soyez un aventurier courageux ou un passionné de mystère, notre offre vous promet une expérience hors du commun. ');

-- --------------------------------------------------------

--
-- Structure de la table `mondes`
--

CREATE TABLE `mondes` (
  `id_monde` int(11) NOT NULL,
  `nom_monde` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Déchargement des données de la table `mondes`
--

INSERT INTO `mondes` (`id_monde`, `nom_monde`) VALUES
(1, 'Ocarina of Time'),
(2, 'Twilight Princess'),
(3, 'Skyward Sword'),
(4, 'Breath of the Wild'),
(5, 'Tears of the Kingdom');

-- --------------------------------------------------------

--
-- Structure de la table `reservations`
--

CREATE TABLE `reservations` (
  `id_reservation` int(11) NOT NULL,
  `id_destination` int(11) NOT NULL,
  `nom` varchar(200) NOT NULL,
  `mail` varchar(200) NOT NULL,
  `telephone` varchar(10) NOT NULL,
  `date_arrivee` date NOT NULL,
  `date_depart` date NOT NULL,
  `nb_personnes` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Index pour les tables déchargées
--

--
-- Index pour la table `destinations`
--
ALTER TABLE `destinations`
  ADD PRIMARY KEY (`id_destination`);

--
-- Index pour la table `mondes`
--
ALTER TABLE `mondes`
  ADD PRIMARY KEY (`id_monde`);

--
-- Index pour la table `reservations`
--
ALTER TABLE `reservations`
  ADD PRIMARY KEY (`id_reservation`);

--
-- AUTO_INCREMENT pour les tables déchargées
--

--
-- AUTO_INCREMENT pour la table `destinations`
--
ALTER TABLE `destinations`
  MODIFY `id_destination` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=21;

--
-- AUTO_INCREMENT pour la table `mondes`
--
ALTER TABLE `mondes`
  MODIFY `id_monde` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT pour la table `reservations`
--
ALTER TABLE `reservations`
  MODIFY `id_reservation` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=70;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
