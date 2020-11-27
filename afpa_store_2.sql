-- phpMyAdmin SQL Dump
-- version 4.8.5
-- https://www.phpmyadmin.net/
--
-- Hôte : 127.0.0.1:3306
-- Généré le :  mer. 04 sep. 2019 à 22:40
-- Version du serveur :  5.7.26
-- Version de PHP :  7.2.18

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de données :  `afpa0519_store_2`
--

-- --------------------------------------------------------

--
-- Structure de la table `st_addresses`
--

DROP TABLE IF EXISTS `st_addresses`;
CREATE TABLE IF NOT EXISTS `st_addresses` (
  `add_id` int(11) NOT NULL AUTO_INCREMENT,
  `st_customers_cus_id` int(11) NOT NULL,
  `add_address1` varchar(100) NOT NULL,
  `add_address2` varchar(100) DEFAULT NULL,
  `add_zipcode` varchar(5) NOT NULL,
  `add_city` varchar(45) NOT NULL,
  PRIMARY KEY (`add_id`),
  KEY `fk_st_addresses_st_customers1_idx` (`st_customers_cus_id`)
) ENGINE=InnoDB AUTO_INCREMENT=10 DEFAULT CHARSET=utf8;

--
-- Déchargement des données de la table `st_addresses`
--

INSERT INTO `st_addresses` (`add_id`, `st_customers_cus_id`, `add_address1`, `add_address2`, `add_zipcode`, `add_city`) VALUES
(1, 1, 'Wakana', 'complemen1', '75019', 'Paris'),
(2, 2, 'Elodie', NULL, '64002', 'Bayonne'),
(3, 3, 'Richard', 'Boulangerie', '75014', 'Paris'),
(4, 4, 'Pascal', NULL, '94200', 'Ivry'),
(5, 5, 'Planète Venus', NULL, '00000', 'Univers'),
(6, 6, 'Planète Jupiter', NULL, '00000', 'Univers'),
(7, 7, 'Planète Saturne', NULL, '00000', 'Univers'),
(8, 8, 'Planète Pluton', NULL, '00000', 'Univers');

-- --------------------------------------------------------

--
-- Structure de la table `st_caddies`
--

DROP TABLE IF EXISTS `st_caddies`;
CREATE TABLE IF NOT EXISTS `st_caddies` (
  `st_customers_cus_id` int(11) NOT NULL,
  `st_products_pro_id` int(11) NOT NULL,
  `cad_qt` int(11) NOT NULL,
  `cad_date` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`st_customers_cus_id`,`st_products_pro_id`) USING BTREE,
  KEY `fk_st_customers_has_st_products_st_products1_idx` (`st_products_pro_id`),
  KEY `fk_st_customers_has_st_products_st_customers_idx` (`st_customers_cus_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Structure de la table `st_categories`
--

DROP TABLE IF EXISTS `st_categories`;
CREATE TABLE IF NOT EXISTS `st_categories` (
  `cat_id` int(11) NOT NULL AUTO_INCREMENT,
  `cat_descr` varchar(45) NOT NULL,
  `cat_img_url` varchar(255) NOT NULL,
  PRIMARY KEY (`cat_id`)
) ENGINE=InnoDB AUTO_INCREMENT=12 DEFAULT CHARSET=utf8;

--
-- Déchargement des données de la table `st_categories`
--

INSERT INTO `st_categories` (`cat_id`, `cat_descr`, `cat_img_url`) VALUES
(1, 'Fruits', 'https://static-cms.carrefour.fr/sites/default/files/2018-11/pastille_mea_fruis_et_legumes.jpg'),
(2, 'Rayon frais', 'https://static-cms.carrefour.fr/sites/default/files/2019-08/r05_traiteur.png'),
(3, 'Epicerie sucrée', 'https://static-cms.carrefour.fr/sites/default/files/2019-08/r08_epicerie_sucree.png'),
(4, 'Boissons', 'https://static-cms.carrefour.fr/sites/default/files/2019-08/boissons_sans_alcool_hd.png'),
(5, 'Bébé', 'https://static-cms.carrefour.fr/sites/default/files/2019-08/le_monde_de_bebe_hd5.png'),
(6, 'Produits laitiers', 'https://static-cms.carrefour.fr/sites/default/files/2018-11/pastille_mea_cremerie.jpg'),
(7, 'Légumes', 'https://static-cms.carrefour.fr/sites/default/files/2018-11/pastille_mea_bio_et_ecologie.jpg'),
(8, 'Alcools', 'https://static-cms.carrefour.fr/sites/default/files/2019-08/alcools_et_aperitifs_hd.png'),
(9, 'Sodas', 'http://theloadedslice.net/image/cache/products/drinks/Drink-2liters-800x800.jpg'),
(10, 'Eaux minérales', 'https://www.sofiex.sn/IMG/arton19.jpg'),
(11, 'Spécial', 'http://laurieburtontraining.com/wp-content/uploads/2014/04/Special.png');

-- --------------------------------------------------------

--
-- Structure de la table `st_customers`
--

DROP TABLE IF EXISTS `st_customers`;
CREATE TABLE IF NOT EXISTS `st_customers` (
  `cus_id` int(11) NOT NULL AUTO_INCREMENT,
  `cus_civility` tinyint(4) NOT NULL DEFAULT '1',
  `cus_lastname` varchar(45) NOT NULL,
  `cus_firstname` varchar(45) NOT NULL,
  `cus_mail` varchar(80) NOT NULL,
  `cus_password` varchar(32) NOT NULL,
  `cus_subscriber` tinyint(1) NOT NULL DEFAULT '0',
  PRIMARY KEY (`cus_id`),
  UNIQUE KEY `cus_mail` (`cus_mail`)
) ENGINE=InnoDB AUTO_INCREMENT=9 DEFAULT CHARSET=utf8;

--
-- Déchargement des données de la table `st_customers`
--

INSERT INTO `st_customers` (`cus_id`, `cus_civility`, `cus_lastname`, `cus_firstname`, `cus_mail`, `cus_password`, `cus_subscriber`) VALUES
(1, 2, 'Wakana', 'Wakana', 'wakana@wakana.fr', 'ed2a4df9ee366abe3dec4513a5ac9577', 0),
(2, 2, 'Elodie', 'Elodie', 'elodie@elodie.fr', 'd9fb8a057fb2af1c9c9557e49eee7dd4', 0),
(3, 1, 'Richard', 'Richard', 'richard@richard.fr', '6ae199a93c381bf6d5de27491139d3f9', 0),
(4, 1, 'Pascal', 'Pascal', 'pascal@pascal.fr', '57c2877c1d84c4b49f3289657deca65c', 0),
(5, 2, 'Venus', 'Mme', 'venus@venus.fr', 'a5717a649d346ed0c51be68888c130cd', 0),
(6, 1, 'Jupiter', 'Mr', 'jupiter@jupiter.fr', '27a5148ea0fbddae22d902bea9a19531', 0),
(7, 2, 'Saturne', 'Mme', 'saturne@saturne.fr', 'e48f517bd21c8ca9a2adfb9c20851e2d', 0),
(8, 1, 'Pluton', 'Mr', 'pluton@pluton.fr', '87cb7e8a4e5334bb224f67e1cc6dff5e', 0);

-- --------------------------------------------------------

--
-- Structure de la table `st_orders`
--

DROP TABLE IF EXISTS `st_orders`;
CREATE TABLE IF NOT EXISTS `st_orders` (
  `ord_id` int(11) NOT NULL AUTO_INCREMENT,
  `st_customers_cus_id` int(11) NOT NULL,
  `st_types_of_logistics_typ_log_id` int(11) NOT NULL,
  `st_address_billing` int(11) NOT NULL,
  `st_address_delivery` int(11) NOT NULL,
  `ord_date` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `ord_total` decimal(10,2) NOT NULL,
  `ord_qt` int(11) NOT NULL,
  PRIMARY KEY (`ord_id`),
  KEY `fk_st_orders_st_customers1_idx` (`st_customers_cus_id`),
  KEY `fk_st_orders_st_types_of_logistics1_idx` (`st_types_of_logistics_typ_log_id`),
  KEY `fk_st_orders_st_addresses1_idx` (`st_address_billing`),
  KEY `fk_st_orders_st_addresses2_idx` (`st_address_delivery`)
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Structure de la table `st_orders_lines`
--

DROP TABLE IF EXISTS `st_orders_lines`;
CREATE TABLE IF NOT EXISTS `st_orders_lines` (
  `st_orders_ord_id` int(11) NOT NULL,
  `st_products_pro_id` int(11) NOT NULL,
  `ord_lines_qt` int(11) NOT NULL,
  `ord_lines_price` decimal(10,2) DEFAULT NULL,
  PRIMARY KEY (`st_orders_ord_id`,`st_products_pro_id`),
  KEY `fk_st_orders_has_st_products_st_products1_idx` (`st_products_pro_id`),
  KEY `fk_st_orders_has_st_products_st_orders1_idx` (`st_orders_ord_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Structure de la table `st_payments`
--

DROP TABLE IF EXISTS `st_payments`;
CREATE TABLE IF NOT EXISTS `st_payments` (
  `pay_id` int(11) NOT NULL AUTO_INCREMENT,
  `st_types_of_payments_typ_pay_id` int(11) NOT NULL,
  `st_customers_cus_id` int(11) NOT NULL,
  `pay_date` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `pay_amount` decimal(10,2) NOT NULL,
  `st_orders_ord_id` int(11) NOT NULL,
  PRIMARY KEY (`pay_id`),
  KEY `fk_st_payments_st_types_of_payments1_idx` (`st_types_of_payments_typ_pay_id`),
  KEY `fk_st_payments_st_customers1_idx` (`st_customers_cus_id`),
  KEY `fk_st_payments_st_orders1_idx` (`st_orders_ord_id`)
) ENGINE=InnoDB AUTO_INCREMENT=7 DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Structure de la table `st_products`
--

DROP TABLE IF EXISTS `st_products`;
CREATE TABLE IF NOT EXISTS `st_products` (
  `pro_id` int(11) NOT NULL AUTO_INCREMENT,
  `pro_title` varchar(200) NOT NULL,
  `pro_descr` mediumtext NOT NULL,
  `pro_img_url` varchar(255) NOT NULL,
  `pro_price` decimal(10,2) NOT NULL,
  `pro_date` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`pro_id`)
) ENGINE=InnoDB AUTO_INCREMENT=74 DEFAULT CHARSET=utf8;

--
-- Déchargement des données de la table `st_products`
--

INSERT INTO `st_products` (`pro_id`, `pro_title`, `pro_descr`, `pro_img_url`, `pro_price`, `pro_date`) VALUES
(1, 'Carottes', 'Carottes Sable REFLETS DE FRANCE<br>\r\nla barquette de 1 kg<br>\r\norigine FRANCE', 'https://www.carrefour.fr/media/540x540/Photosite/PRODUITS_FRAIS_TRANSFORMATION/FRUITS_ET_LEGUMES/3276558746791_PHOTOSITE_20150617_162739_0.jpg', '2.15', '2019-08-06 12:30:41'),
(2, 'Pommes de terre', 'Pommes de terre Primaline<br>\r\nla bourriche de 1,5 kg<br>\r\norigine FRANCE', 'https://www.carrefour.fr/media/540x540/Photosite/PRODUITS_FRAIS_TRANSFORMATION/FRUITS_ET_LEGUMES/3523680404977_PHOTOSITE_20180717_162300_0.jpg', '3.50', '2019-08-06 14:30:41'),
(3, 'Courgettes', 'Courgettes rondes BIO<br>\r\nla barquette de 3 pièces<br>\r\norigine C.E.E.', 'https://www.carrefour.fr/media/540x540/Photosite/PRODUITS_FRAIS_TRANSFORMATION/FRUITS_ET_LEGUMES/3270190218418_PHOTOSITE_20140416_171428_0.jpg', '2.49', '2019-08-06 14:31:26'),
(4, 'Framboises', 'Framboises BIO<br>\r\nla barquette de 125 g<br>\r\norigine FRANCE', 'https://www.carrefour.fr/media/540x540/Photosite/PRODUITS_FRAIS_TRANSFORMATION/FRUITS_ET_LEGUMES/3276558887517_PHOTOSITE_20160318_163540_0.jpg', '1.91', '2019-08-06 14:31:26'),
(5, 'Evian', 'Eau minérale naturelle EVIAN<br>\r\nla bouteille de 50 cl', 'https://www.carrefour.fr/media/540x540/Photosite/PGC/BOISSONS/3068320099651_PHOTOSITE_20181130_160745_0.jpg', '1.20', '2019-08-06 14:33:37'),
(6, 'Vittel', 'Eau minérale naturelle VITTEL<br>\r\nla bouteille de 50 cl', 'https://www.carrefour.fr/media/280x280/Photosite/PGC/BOISSONS/3179732326911_PHOTOSITE_20190107_184948_0.jpg', '1.20', '2019-08-06 14:34:37'),
(7, 'Coca-Cola', 'Soda COCA-COLA<br>\r\nle pack de 15 canettes de 33 cl', 'https://www.carrefour.fr/media/540x540/Photosite/PGC/BOISSONS/5000112609608_PHOTOSITE_20190730_135621_0.jpg', '7.12', '2019-08-06 14:37:25'),
(8, 'Schweppes', 'Soda indian tonic SCHWEPPES<br>\r\nle pack de 4 bouteilles de 50 cl<br>\r\n<br>\r\nBoisson gazeuse rafraîchissante à l\'extrait d\'écorces de quinquina, avec sucre et édulcorants.', 'https://www.carrefour.fr/media/540x540/Photosite/PGC/BOISSONS/3124480151490_PHOTOSITE_20190626_053408_0.jpg', '3.54', '2019-08-06 14:37:25'),
(9, 'Couches Pampers', 'Couches baby-dry pants PAMPERS<br>\r\nle paquet de 29 couches<br>\r\n<br>\r\nLorsque bébé commence à marcher à quatre pattes et à gigoter pendant le change, les couches peuvent être difficiles à mettre. Et si vous passiez aux couches-culottes Baby-Dry Pants. Les couches-culottes Pampers Baby-Dry Pants sont faciles à enfiler et à enlever en déchirant les côtés. La ceinture ultra-extensible permet à la couche-culotte de s’adapter aux mouvements de votre bébé pour lui offrir un confort et un ajustement optimal. Les canaux d’air permettent à l’air de circuler librement dans la couche-culotte. Ils gardent la peau de votre bébé bien au sec et la laissent respirer jusqu’à 12 heures. ', 'https://www.carrefour.fr/media/540x540/Photosite/PGC/PARFUMERIE_HYGIENE/8001090968142_PHOTOSITE_20190525_061949_0.jpg', '13.45', '2019-08-06 14:38:26'),
(10, 'Talc Bebe Cadum', 'Talc de toilette BEBE CADUM<br>\r\nla boite de 300 g<br>\r\n<br>\r\nSpécialement adapté à la toilette quotidienne des bébés et des peaux délicates, le talc de toilette Cadum prévient les risques de rougeurs et d\'irritation, grâce à son fort pouvoir d\'absorption.\r\nSa poudre fine protège et adoucit la peau.\r\nTesté pour son inocuité dermatologique.nocuité dermatologique.', 'https://www.carrefour.fr/media/540x540/Photosite/PGC/PARFUMERIE_HYGIENE/3760099590628_PHOTOSITE_20180210_050245_0.jpg', '1.80', '2019-08-06 14:38:26'),
(11, 'Kinder Bueno', 'Barres chocolatées lait et noisette KINDER BUENO<br>\r\nFines gaufrettes enrobées de chocolat au lait, fourrées lait et noisettes broyées\r\nles 12 sachets de 2 barres - 516 g<br>\r\n<br>\r\nEnvie de vous faire vraiment plaisir ? Avec son goût unique de noisette, son bon chocolat et son côté à la fois fondant et croustillant, laissez-vous (re)tenter par la recette de Kinder Bueno.', 'https://www.carrefour.fr/media/540x540/Photosite/PGC/EPICERIE/8000500290392_PHOTOSITE_20190703_170804_0.jpg', '6.69', '2019-08-06 14:43:17'),
(12, 'Fraises Tagada', 'Bonbons Tagada l\'original HARIBO<br>\r\nla boite de 500 g<br>\r\n<br>\r\nIngrédients: sucre; sirop de glucose; gélatine; acidifiant: acide citrique; arôme; colorants: curcumine, carmins, carotènes végétaux. Tenir à l\'abri de la chaleur et de l\'humidité.', 'https://www.carrefour.fr/media/540x540/Photosite/PGC/EPICERIE/3103220040867_PHOTOSITE_20190328_161136_0.jpg', '3.94', '2019-08-06 14:43:17'),
(13, 'Yaourts La Laitière', 'Yaourts nature LA LAITIERE<br>\r\nles 4 pots de 125 g<br>\r\n<br>\r\nDécouvrez la texture unique et toute la douceur des yaourts en pot de verre de La Laitière.', 'https://www.carrefour.fr/media/1500x1500/Photosite/PGC/P.L.S./3023290234860_PHOTOSITE_20190618_172641_0.jpg', '1.32', '2019-08-06 14:44:07'),
(14, 'Mont Blanc praliné', 'Crème dessert praliné MONT BLANC<br>\r\nla boite de 570 g<br>\r\n<br>\r\nLe praliné, c’est pour toute la famille ! Qui dira le contraire ? Un dessert savoureux et gourmand élaboré à partir d’ingrédients de qualité comme du bon lait et un mélange d’amandes et de noisettes notamment. Il suffit d’en goûter pour ne plus pouvoir s’en passer.', 'https://www.carrefour.fr/media/540x540/Photosite/PGC/EPICERIE/3700279301484_PHOTOSITE_20190627_050034_0.jpg', '1.95', '2019-08-06 14:44:07'),
(15, 'Whiskey Togouchi', 'Whisky japonais mélange TOGOUCHI<br>\r\nla bouteille de 70 cl + l\'étui<br>\r\n<br>\r\nTaux alcool : 40% vol<br>\r\n<br>\r\nL\'abus d\'alcool est dangereux pour la santé. Vendre ou offrir à des mineurs de moins de dix-huit (18) ans des boissons alcoolisées est interdit. Déconseillé aux femmes enceintes.', 'https://www.carrefour.fr/media/540x540/Photosite/PGC/BOISSONS/4901903064105_PHOTOSITE_20170324_160644_0.jpg', '39.35', '2019-08-06 14:45:02'),
(16, 'Vin Jean Geiler', 'Vin blanc vin d\'Alsace Gewurztraminer 2013 JEAN GEILER<br>\r\nla bouteille de 75 cl<br>\r\n<br>\r\nvin d\'Alsace Gewurztraminer médaillé<br>\r\ncontient des sulfites<br>\r\ntaux alcool : 12,5% vol<br>\r\n<br>\r\nL\'abus d\'alcool est dangereux pour la santé. Vendre ou offrir à des mineurs de moins de dix-huit (18) ans des boissons alcoolisées est interdit. Déconseillé aux femmes enceintes', 'https://www.carrefour.fr/media/540x540/Photosite/PGC/BOISSONS/3273577200044_PHOTOSITE_20150911_164032_0.jpg', '7.60', '2019-08-06 14:45:02'),
(17, 'Vin Saint-Emilion', 'Vin rouge Saint-Emilion Prestige 2015 CHATEAU DE SARENCEAU<br>\r\nla bouteille de 75 cl<br>\r\n<br>\r\nGrand vin de Bordeaux<br>\r\ncontient des sulfites<br>\r\ntaux alcool : 13%<br>\r\n<br>\r\nL\'abus d\'alcool est dangereux pour la santé. Vendre ou offrir à des mineurs de moins de dix-huit (18) ans des boissons alcoolisées est interdit. Déconseillé aux femmes enceintes.', 'https://www.carrefour.fr/media/540x540/Photosite/PGC/BOISSONS/3760072847329_PHOTOSITE_20180821_162953_0.jpg', '8.95', '2019-08-06 14:45:51'),
(18, 'Yaourts Velouté', 'Yaourts brassés nature VELOUTE<br>\r\nles 8 pots de 125 g<br>\r\n<br>\r\nAvec son lait entier, sa touche de crème et ses ferments, Velouté vous offre une texture délicieusement onctueuse et un goût particulièrement doux.', 'https://www.carrefour.fr/media/540x540/Photosite/PGC/P.L.S./3033490004590_PHOTOSITE_20190619_160835_0.jpg?placeholder=1', '1.91', '2019-08-06 14:45:51'),
(19, 'Pêches blanches', 'Pêches blanches BIO<br>\r\nla barquette de 500 g<br>\r\norigine FRANCE', 'https://www.carrefour.fr/media/540x540/Photosite/PRODUITS_FRAIS_TRANSFORMATION/FRUITS_ET_LEGUMES/3276550485391_PHOTOSITE_20180605_163911_0.jpg', '3.81', '2019-08-06 14:47:42'),
(20, 'Melon', 'Melon jaune<br>\r\nla pièce<br>\r\norigine ESPAGNE', 'https://www.carrefour.fr/media/540x540/Photosite/PRODUITS_FRAIS_TRANSFORMATION/FRUITS_ET_LEGUMES/3000001033646_PHOTOSITE_20150616_083459_0.jpg', '2.50', '2019-08-06 14:47:42'),
(21, 'Volvic', 'Eau minérale naturelle VOLVIC<br>\r\nla bouteille d\'1.5 L', 'https://www.carrefour.fr/media/540x540/Photosite/PGC/BOISSONS/3057640257773_PHOTOSITE_20180529_043916_0.jpg', '0.48', '2019-08-06 14:49:02'),
(22, 'Orangina', 'Soda à l\'orange ORANGINA<br>\r\nla bouteille de 2 L<br>\r\n<br>\r\nIngrédients : eau gazéifiée, jus d\'orange et autres agrumes à base de concentrés 12% (orange 10%, citron, mandarine, pamplemousse), sucre, pulpe 2% (orange, mandarine), extrait de zeste d\'orange, conservateurs : benzoate de sodium et sorbate de potassium, arômes naturels d\'orange.', 'https://www.carrefour.fr/media/540x540/Photosite/PGC/BOISSONS/3124480183538_PHOTOSITE_20190704_161832_0.jpg', '1.50', '2019-08-06 14:49:02'),
(23, 'Baleine', 'C\'est un terme générique qui s\'applique aux espèces appartenant au sous-ordre des mysticètes, les cétacés à fanons ainsi que, improprement, à certaines espèces appartenant aux odontocètes, les cétacés à dents. Le petit de la baleine s\'appelle le baleineau.<br>\r\n<br>\r\nSuper baleine fraîche de ce matin pêchée dans un p\'tit lac français.', 'https://bytebucket.org/afpa0519_store_2/e-store/raw/cbed168644979161e847459efdcdf38576019fc5/front-office/webroot/image/balaine.jpg?token=7f124ae70b52a46f49673370083f116172cc1986', '1000000.00', '2019-08-30 20:56:17'),
(24, 'Mont Roucous', 'Eau minérale naturelle MONT ROUCOUS<br>\r\nle pack de 6 bouteilles d\'1 L<br>\r\n<br>\r\nL\'Eau Minérale Naturelle Mont Roucous est une eau pure et légère. Très faiblement minéralisée et pauvre en sodium, elle convient parfaitement à l’alimentation des nourrissons.', 'https://www.carrefour.fr/media/540x540/Photosite/PGC/BOISSONS/3257971091316_PHOTOSITE_20161010_082835_0.jpg', '2.64', '2019-08-30 21:21:18'),
(25, 'Jus Tropicana', 'Jus d\'orange avec pulpe sans sucres ajoutés TROPICANA<br>\r\nla bouteille de 900 ml<br>\r\n<br>\r\nDes fruits soigneusement sélectionnées et comme vous ne les avez jamais bus.\r\nQuoi de plus agréable pour bien commencer la journée ?', 'https://www.carrefour.fr/media/540x540/Photosite/PGC/P.L.S./3168930156741_PHOTOSITE_20190605_134215_0.jpg', '2.25', '2019-08-30 21:25:37'),
(26, 'Nutella', 'Pâte à tartiner noisettes et cacao NUTELLA<br>\r\nle pot de 400 g<br>\r\n<br>\r\nVous êtes nombreux à apprécier le goût unique du Nutella sur une tranche de pain mais il existe aussi beaucoup d’autres recettes originales à essayer ! Pourquoi ne pas laisser place à votre créativité et tenter l’expérience avec Nutella ? Essayez quelque chose de nouveau pour réveiller votre enthousiasme !', 'https://www.carrefour.fr/media/540x540/Photosite/PGC/EPICERIE/3017620422003_PHOTOSITE_20180315_160204_0.jpg', '2.55', '2019-08-30 21:30:08'),
(27, 'Mozzarella Galbani', 'Mozzarella bio GALBANI<br>\r\nle sachet de 125 g<br>\r\n<br>\r\nDécouvrez la Mozzarella Bio Galbani, une texture moelleuse et fondante en bouche et au doux goût de lait.', 'https://www.carrefour.fr/media/540x540/Photosite/PGC/P.L.S./8000430133356_PHOTOSITE_20190629_052022_0.jpg?', '1.50', '2019-08-30 21:32:33'),
(28, 'Lait Candia', 'Lait demi-écrémé CANDIA<br>\r\nle pack de 4 bouteilles d\'1,5 L<br>\r\n<br>\r\nLait demi écrémé stérilisé U.H.T.<br>\r\nGrandlait, un lait Origine France, collecté dans des Fermes Sélectionnées.', 'https://www.carrefour.fr/media/540x540/Photosite/PGC/P.L.S./3176571673008_PHOTOSITE_20190423_163444_0.jpg', '5.12', '2019-08-30 21:36:13'),
(29, 'Orezza', 'Eau gazeuse OREZZA<br>\r\nla bouteille d\'1 L<br>\r\n<br>\r\nL\'eau d\'Orezza est une eau minérale gazeuse corse dont la source se trouve à Rapaggio, en Haute-Corse. La source se situe au lieu-dit Acqua acitosa, au N-NO du village de Rapaggio en Castagniccia, à 410 m d\'altitude, dominant le Fium\'Alto, à environ 800 m (distance orthodromique) du village de Piedicroce sur l\'autre rive du fleuve.\r\nLe site des Eaux d\'Orezza se trouve dans l\'ancienne piève d\'Orezza d\'où elle tient son nom.', 'https://www.carrefour.fr/media/540x540/Photosite/PGC/BOISSONS/3700088911119_PHOTOSITE_20180519_065053_0.jpg', '2.45', '2019-08-30 21:39:05'),
(30, 'Voss', 'Eau plate de Norvège VOSS<br>\r\nla bouteille cylindrique de 50 cl<br>\r\n<br>\r\nCette eau unique jaillit sous la glace sous une couche aquifère vierge de Norvège\r\net est dépourvue de minéraux, sa pureté est extraordinaire.', 'https://www.carrefour.fr/media/540x540/Photosite/PGC/BOISSONS/0682430400102_PHOTOSITE_20190618_175625_0.jpg', '1.49', '2019-08-30 21:40:14'),
(31, 'Icelandic', 'Eau minérale naturelle ICELANDIC<br>\r\nla bouteille de 50 cl<br>\r\n<br>\r\nFjords, aurores boréales, vikings... À la liste des mots magiques qui nous viennent d\'Islande, nous pouvons maintenant rajouter Icelandic, eau plate de glacier aux propriétés exceptionnelles. \r\nPuisée aux légendaires sources Olfus en Islande, elle ne consomme que 0.1% des eaux remontant naturellement à la surface afin de préserver le renouvellement des ressources et de l\'écosystème. La mise en bouteille a lieu en Islande et par des Islandais, dans des emballages et bouteilles plastique 100% recyclés. Tout cela lui vaut d\'être la première au monde à obtenir la certification d\'un bilan zéro carbone.', 'https://www.carrefour.fr/media/540x540/Photosite/PGC/BOISSONS/5690351233834_PHOTOSITE_20190618_062257_0.jpg', '1.14', '2019-08-30 21:42:01'),
(32, 'Plancoet', 'Eau minérale naturelle PLANCOET<br>\r\nle pack de 6 bouteilles de 50 cl<br>\r\n<br>\r\nAu coeur du Tertre de Brandefer, classé îlot exceptionnel de biodiversité ordinaire, les 96 hectares de nature préservée qui entourent la source Plancoët garantissent une eau minérale naturelle sans nitrate, au goût équilibré.', 'https://www.carrefour.fr/media/540x540/Photosite/PGC/BOISSONS/3179750930091_PHOTOSITE_20190702_054354_0.jpg', '1.63', '2019-08-30 21:43:41'),
(33, 'Speyside Glenlivet', 'Eau minérale naturelle SPEYSIDE GLENLIVET<br>\r\nla bouteille de 75 cl<br>\r\n<br>\r\nSituée à plus de 1000 pieds d’altitude au cœur des régions de Speyside et Glenlivet dans le nord-est de l’Écosse, cette source est la plus haute du Royaume Uni. Son apport calorique très bas et sa faible teneur en sodium en font l’alliée idéale...', 'https://www.carrefour.fr/media/540x540/Photosite/PGC/BOISSONS/5060075100017_PHOTOSITE_20190125_044710_0.jpg', '1.90', '2019-08-30 21:45:25'),
(34, 'Abatilles', 'Eau minérale naturelle ABATILLES<br>\r\nle pack de 6 bouteilles d\'1,5 L<br>\r\n<br>\r\nL’Eau des Abatilles en bouteille bordelaise, plate ou finement pétillante, a beaucoup de succès à table. Sa forme a l’élégance de la bouteille bordelaise. Sa douceur, sa neutralité et ses fines bulles respectent toutes les saveurs et en font le partenaire des amateurs de vin et des gastronomes.', 'https://www.carrefour.fr/media/540x540/Photosite/PGC/BOISSONS/3048431061990_PHOTOSITE_20190618_055324_0.jpg', '2.58', '2019-08-30 21:47:59'),
(35, 'Couches Lotus', 'Couches culottes taille 5 : 13-20 kg LOTUS BABY<br>\r\nle paquet de 36<br>\r\n<br>\r\nLOTUS BABY NATURAL TOUCH, une gamme complète de couches ouvertes pour bébés alliant ultra-confort & protection pour un confort maximal des bébés et de leurs parents.<br>\r\nUne qualité inégalée centrée sur l\'ultra-douceur & l\'ajustement parfait.<br>\r\nDes barrières antifuites ultra-douces et un matelas absorbant offrant jusqu\'à 12h de protection pour que bébé reste bien au sec.<br>\r\nNOUVEAU : un indicateur qui vous informe quand il est temps de changer la couche de bébé.<br>\r\nTesté dermatologiquement et accrédité par la Skin Health Alliance.<br>\r\n0% lotion – parfum – colorant en contact avec la peau<br>\r\nComposition garantie : évaluation de toutes les matières par des experts et innocuité démontrée par des tests en laboratoire indépendant<br>\r\nCouches certifiées Ecolabel et ouate de cellulose certifiée FSC', 'https://www.carrefour.fr/media/540x540/Photosite/PGC/PARFUMERIE_HYGIENE/7322540840322_PHOTOSITE_20190523_053211_0.jpg', '12.80', '2019-08-30 21:51:03'),
(36, 'Viennois Nestle', 'Liégeois café viennois Nestle<br>\r\nles 4 pots de 100 g<br>\r\n<br>\r\nLe Viennois Original, le spécialiste des liégeois, n°1 en GMS, Le plaisir raffiné de l’alliance parfaite entre un délicat tourbillon fouetté et une onctueuse crème dessert au café.<br>\r\n4 saveurs : chocolat, café, vanille sur lit de caramel, et fraise.<br>\r\n<br>\r\nContient 151 mg de calcium par pot individuel adapté à la RHF<br>\r\nFabriqué en France, dans notre laiterie de Vallet.', 'https://www.carrefour.fr/media/540x540/Photosite/PGC/P.L.S./3023290021217_PHOTOSITE_20190621_045743_0.jpg', '1.15', '2019-08-30 21:53:51'),
(37, 'Kombu Algamar', 'Algues Kombu Bio Algamar<br>\r\nle sachet de 100 g<br>\r\nLes algues Kombu sont de grande taille et de couleur brune. Ce sont des algues que l\'on retrouve à une profondeur moyenne de 12 mètres. Particulièrement riche en acide alginique elles ont une consistance charnue et sont utilisées en cuisine pour donner du goût ou comme un légume en plus dans vos plats. La présence d\'acide glutamique dans sa composition ramollit les légumes. Ces algues produisent un effet rassasiant et sont riches en minéraux, notamment en calcium et magnésium.', 'https://www.smartfooding.com/fr/6496-large_default_2x/algues-kombu-bio-100-gr.jpg', '4.88', '2019-08-30 22:00:07'),
(38, 'La Fournée Dorée', 'Gâches beurre et crème, tranchées LA FOURNEE DOREE<br>\r\nle sachet de 500 g ', 'https://www.carrefour.fr/media/540x540/Photosite/PGC/P.L.S./3587220002252_PHOTOSITE_20190628_050456_0.jpg', '1.99', '2019-08-30 22:08:51'),
(39, 'Extraterrestre', 'La vie extraterrestre (du latin extra, « au-dehors, à l\'extérieur ») désigne toute forme de vie présente ailleurs que sur la planète Terre. Une soucoupe volante atterrit en pleine nuit près de Los Angeles. Quelques extraterrestres, envoyés sur Terre en mission d\'exploration botanique, sortent de l\'engin, mais un des leurs s\'aventure au-delà de la clairière où se trouve la navette. Celui-ci se dirige alors vers la ville. C\'est sa première découverte de la civilisation humaine.<br>\r\n<br>\r\nVotre propre E.T. téléphone maison pour un billet vert.', 'https://bytebucket.org/afpa0519_store_2/e-store/raw/cbed168644979161e847459efdcdf38576019fc5/back-office/webroot/image/extra.jpg?token=9631338590aea96394300019bfd9c9f800ed337e', '100.00', '2019-08-30 22:27:51'),
(40, 'Kaki Persimon', 'Kaki bio Persimon<br>\r\nla barquette de 2 fruits<br>\r\norigine C.E.E.', 'https://www.carrefour.fr/media/540x540/Photosite/PRODUITS_FRAIS_TRANSFORMATION/FRUITS_ET_LEGUMES/3276550322429_PHOTOSITE_20180605_163950_0.jpg', '2.79', '2019-08-30 22:35:01'),
(41, 'Citrons Primofiori', 'Citrons jaunes bio Primofiori<br>\r\nla barquette de 4 fruits - 500 g<br>\r\norigine C.E.E.', 'https://www.carrefour.fr/media/540x540/Photosite/PRODUITS_FRAIS_TRANSFORMATION/FRUITS_ET_LEGUMES/3523680258341_PHOTOSITE_20160318_163753_0.jpg', '1.69', '2019-08-30 22:36:28'),
(42, 'Cerises Burlat', 'Cerises rouges bio Burlat<br>\r\nla barquette de 250 g<br>\r\norigine PAYS TIERS', 'https://www.carrefour.fr/media/540x540/Photosite/PRODUITS_FRAIS_TRANSFORMATION/FRUITS_ET_LEGUMES/3276555060180_PHOTOSITE_20160318_163516_0.jpg', '3.21', '2019-08-30 22:37:45'),
(43, 'Ananas Extra Sweet', 'Ananas Extra Sweet<br>\r\nla pièce<br>\r\norigine COSTA RICA ', 'https://www.carrefour.fr/media/540x540/Photosite/PRODUITS_FRAIS_TRANSFORMATION/FRUITS_ET_LEGUMES/3000001033257_PHOTOSITE_20150616_083145_0.jpg', '1.69', '2019-08-30 22:38:43'),
(44, 'Figue fraîche violette', 'Figue fraîche violette<br>\r\nla barquette de 500 g<br>\r\norigine FRANCE', 'https://www.carrefour.fr/media/540x540/Photosite/PRODUITS_FRAIS_TRANSFORMATION/FRUITS_ET_LEGUMES/3245390160638_PHOTOSITE_20190726_170426_0.jpg', '4.50', '2019-08-30 22:40:19'),
(45, 'Légumes anciens', 'Légumes anciens : panais, tompinanbourg, rutabaga<br>\r\nla barquette de 1 K<br>\r\norigine FRANCE', 'https://www.carrefour.fr/media/540x540/Photosite/PRODUITS_FRAIS_TRANSFORMATION/FRUITS_ET_LEGUMES/3276550143918_PHOTOSITE_20150616_083433_0.jpg', '3.49', '2019-08-30 22:44:34'),
(46, 'Légumes Bioleyre', 'Panier de légumes bio BIOLEYRE<br>\r\nle panier de 3 K<br>\r\norigine FRANCE<br>\r\n<br>\r\nComposition mensuelle de légumes Bio<br>\r\n<br>\r\nCourgettes bio 500 g<br>\r\nPoireaux bio 500 g<br>\r\nPommes de terre bio 1 K<br>\r\nCarottes non lavées bio 1 K<br>', 'https://www.carrefour.fr/media/540x540/Photosite/PRODUITS_FRAIS_TRANSFORMATION/FRUITS_ET_LEGUMES/3700651516086_PHOTOSITE_20190808_065527_0.jpg', '6.85', '2019-08-30 22:45:55'),
(47, 'Tomates en grappe', 'Tomates rondes en grappe<br>\r\nle kilo<br>\r\norigine FRANCE ', 'https://www.carrefour.fr/media/540x540/Photosite/PRODUITS_FRAIS_TRANSFORMATION/FRUITS_ET_LEGUMES/3276552413026_PHOTOSITE_20160323_163718_0.jpg', '1.99', '2019-08-30 22:46:49'),
(48, 'Endives ', 'Endives<br>\r\nle sachet de 500 g<br>\r\norigine FRANCE', 'https://www.carrefour.fr/media/540x540/Photosite/PRODUITS_FRAIS_TRANSFORMATION/FRUITS_ET_LEGUMES/3276554549501_PHOTOSITE_20180911_161248_0.jpg', '1.00', '2019-08-30 22:47:43'),
(49, 'Tomates coeur', 'Tomates allongées coeur<br>\r\nle lot de 4 - 800 g<br>\r\norigine FRANCE', 'https://www.carrefour.fr/media/540x540/Photosite/PRODUITS_FRAIS_TRANSFORMATION/FRUITS_ET_LEGUMES/3523680304352_PHOTOSITE_20160629_082550_0.jpg', '4.23', '2019-08-30 22:48:50'),
(50, 'Tomates anciennes', 'Tomates anciennes mélangées<br>\r\nle plateau de 1,5 K<br>\r\norigine FRANCE ', 'https://www.carrefour.fr/media/540x540/Photosite/PRODUITS_FRAIS_TRANSFORMATION/FRUITS_ET_LEGUMES/3523680239944_PHOTOSITE_20180727_162748_0.jpg', '20.00', '2019-08-30 22:50:22'),
(51, 'Tomates rouges', 'Tomates cerise rouges rondes<br>\r\nla barquette de 1 K<br>\r\norigine FRANCE', 'https://www.carrefour.fr/media/540x540/Photosite/PRODUITS_FRAIS_TRANSFORMATION/FRUITS_ET_LEGUMES/3276550083665_PHOTOSITE_20170627_162131_0.jpg', '7.01', '2019-08-30 22:51:11'),
(52, 'Tomates noires', 'Tomates rondes noires<br>\r\nle kilo<br>\r\norigine FRANCE', 'https://www.carrefour.fr/media/540x540/Photosite/PRODUITS_FRAIS_TRANSFORMATION/FRUITS_ET_LEGUMES/3276556776875_PHOTOSITE_20180727_162808_0.jpg', '4.05', '2019-08-30 22:52:47'),
(53, 'Tomates jaunes', 'Tomates côtelées jaunes<br>\r\nle kilo<br>\r\norigine FRANCE', 'https://www.carrefour.fr/media/540x540/Photosite/PRODUITS_FRAIS_TRANSFORMATION/FRUITS_ET_LEGUMES/3276552413774_PHOTOSITE_20180828_160755_0.jpg', '4.05', '2019-08-30 22:53:35'),
(54, 'Tomates panachées', 'Tomates cerise rondes panachées (rouges, oranges)<br>\r\nla barquette de 350 g<br>\r\norigine FRANCE', 'https://www.carrefour.fr/media/540x540/Photosite/PRODUITS_FRAIS_TRANSFORMATION/FRUITS_ET_LEGUMES/3276555327306_PHOTOSITE_20180828_160844_0.jpg', '2.00', '2019-08-30 22:55:44'),
(55, 'Chou fleur bio', 'Chou fleur bio<br>\r\nla pièce<br>\r\norigine FRANCE', 'https://www.carrefour.fr/media/540x540/Photosite/PRODUITS_FRAIS_TRANSFORMATION/FRUITS_ET_LEGUMES/3276552691752_PHOTOSITE_20180605_164149_0.jpg', '2.96', '2019-08-30 22:57:07'),
(56, 'Chou vert', 'Chou vert<br>\r\nla pièce<br>\r\norigine FRANCE', 'https://www.carrefour.fr/media/540x540/Photosite/PRODUITS_FRAIS_TRANSFORMATION/FRUITS_ET_LEGUMES/3000001038528_PHOTOSITE_20180701_091745_0.jpg', '2.25', '2019-08-30 22:57:45'),
(57, 'Chou chinois', 'Chou chinois<br>\r\nla pièce<br>\r\norigine ESPAGNE\r\n', 'https://www.carrefour.fr/media/540x540/Photosite/PRODUITS_FRAIS_TRANSFORMATION/FRUITS_ET_LEGUMES/3000001030652_PHOTOSITE_20150616_083000_0.jpg', '2.45', '2019-08-30 22:58:44'),
(58, 'Chou rouge ', 'Chou rouge<br>\r\nla pièce<br>\r\norigine FRANCE', 'https://www.carrefour.fr/media/540x540/Photosite/PRODUITS_FRAIS_TRANSFORMATION/FRUITS_ET_LEGUMES/3000001038511_PHOTOSITE_20160318_163712_0.jpg', '2.89', '2019-08-30 22:59:50'),
(59, 'Chou kale', 'Chou kale<br>\r\nla pièce de 250 g<br>\r\norigine FRANCE', 'https://www.carrefour.fr/media/540x540/Photosite/PRODUITS_FRAIS_TRANSFORMATION/FRUITS_ET_LEGUMES/3523680245495_PHOTOSITE_20180427_161124_0.jpg', '3.29', '2019-08-30 23:00:50'),
(60, 'Chou fleur violet', 'Chou fleur violet<br>\r\nla pièce<br>\r\norigine FRANCE', 'https://www.carrefour.fr/media/540x540/Photosite/PRODUITS_FRAIS_TRANSFORMATION/FRUITS_ET_LEGUMES/3276552459758_PHOTOSITE_20180427_161113_0.jpg', '2.85', '2019-08-30 23:01:48'),
(61, 'Chou fleur orange', 'Chou fleur orange<br>\r\nla pièce<br>\r\norigine FRANCE', 'https://www.carrefour.fr/media/540x540/Photosite/PRODUITS_FRAIS_TRANSFORMATION/FRUITS_ET_LEGUMES/3276552459765_PHOTOSITE_20180427_161253_0.jpg', '2.31', '2019-08-30 23:02:35'),
(62, 'Schtroumpfs Haribo', 'Bonbons Les Schtroumpfs Pik HARIBO<br>\r\nle paquet de 275 g<br>\r\n<br>\r\nVous adorez quand ça PIK?<br>\r\nAlors retrouvez vos héros préférés en version Pik !<br>\r\nRedécouvrez le Grand Schtroumpf, la Schtroumpfette et tous les autres Schtroumpfs en version acidulée !<br>\r\nC\'est Schtroumpfement piquant !', 'https://www.carrefour.fr/media/540x540/Photosite/PGC/EPICERIE/3103220035771_PHOTOSITE_20190828_215318_0.jpg', '1.39', '2019-08-30 23:07:16'),
(63, 'Crêpes Even', 'Crêpes bretonnes EVEN<br>\r\nSachet de 12 crêpes bretonnes (350 g)<br>\r\n<br>\r\nIngrédients: LAIT frais pasteurisé (43%), farine de BLE, sucre, OEUFS, BEURRE frais (1,8%), sel, farine de sarrasin, LACTOSE', 'https://www.carrefour.fr/media/540x540/Photosite/PGC/P.L.S./3218930311005_PHOTOSITE_20171208_123527_0.jpg', '2.24', '2019-08-30 23:09:57'),
(64, 'Biscuits L\'abbaye', 'Biscuits carré caramel beurre salé BISCUITERIE L\'ABBAYE<br>\r\nle paquet de 9 biscuits - 140 g<br>\r\n<br>\r\nLa Carré Normand, le biscuit carrément gourmand, c\'est la générosité d\'un bon biscuit du terroir réalisé avec nos partenaires régionaux garants d\'une démarche authentique.<br>\r\nFarine, beurre, caramel...<br>\r\nSavourez tous les trésors de la Normandie!', 'https://www.carrefour.fr/media/540x540/Photosite/PGC/EPICERIE/3226219009864_PHOTOSITE_20180710_045255_0.jpg', '2.05', '2019-08-30 23:11:41'),
(65, 'Crêpes Crêperie Robin', 'Crêpes de froment CREPERIE ROBIN<br>\r\nle paquet de 12 crêpes - 400 g<br>\r\n<br> \r\nFarine de BLE 25% (GLUTEN), sucre, LAIT entier frais, ŒUF frais, huile de tournesol, huiles végétales (conservateur, sorbate de potassium), BEURRE concentré, colorant : bêta carotène, sel.', 'https://www.carrefour.fr/media/540x540/Photosite/PGC/P.L.S./3584480000011_PHOTOSITE_20151017_084906_0.jpg', '2.50', '2019-08-30 23:13:09'),
(66, 'Crêpes La Quimperloise', 'Crêpes faites à la main LA QUIMPERLOISE<br>\r\nle paquet de 12<br>\r\n<br>\r\nLAIT cru 53%, farine de BLE (froment), sucre, ŒUFS frais, BEURRE concentré 1%, farine de blé noir, sel, conservateur : propionate de calcium.<br>\r\nContient du gluten, des œufs et des produits à base de lait.', 'https://www.carrefour.fr/media/540x540/Photosite/PGC/P.L.S./3353703850036_PHOTOSITE_20151212_085258_0.jpg', '3.40', '2019-08-30 23:14:45'),
(67, 'Lait en poudre Gallia', 'Lait bébé en poudre 1er âge Calisma GALLIA<br>\r\nla boite de 900 g<br>\r\n<br>\r\nLe Laboratoire Gallia a mis au point Calisma 1, une formule quotidienne qui accompagne votre bébé de la naissance jusqu\'à 6 mois, lorsqu\'il n\'est pas allaité, conformément à la réglementation. Calisma 1 contient une association d\'ingrédients : - des prébiotiques qui sont des fibres alimentaires de type FOS/GOS (Fructo-Oligosaccharides et Galacto-Oligosaccharides) - des omégas 3 (DHA : acide docosahexaénoïque).', 'https://www.carrefour.fr/media/540x540/Photosite/PGC/EPICERIE/3041090900389_PHOTOSITE_20190801_141333_0.jpg', '17.54', '2019-08-30 23:17:20'),
(68, 'Compotes Babybio', 'Compotes bébé dès 4 mois, mirabelle pomme BABYBIO<br>\r\nles 2 pots de 130 g<br>\r\n<br>\r\nBelle belle belle la mirabelle<br>\r\n<br>\r\nBébé va adorer finir son repas sur les notes délicieusement sucrées de la mirabelle de Lorraine et de la pomme d\'Aquitaine : une gourmandise qui va mettre d’accord tous les petits gourmets !', 'https://www.carrefour.fr/media/540x540/Photosite/PGC/EPICERIE/3288131510927_PHOTOSITE_20190702_053908_0.jpg', '1.87', '2019-08-30 23:20:02'),
(69, 'Terre', 'La Terre est une planète du système solaire, la troisième plus proche du soleil et la cinquième plus grande, tant en taille qu\'en masse, de ce système planétaire dont elle est également la plus massive des planètes telluriques.<br>\r\n<br>\r\nSuper promo : on n\'en veut plus et vous pouvez l\'obtenir pour une bouchée de pain !', 'https://upload.wikimedia.org/wikipedia/commons/d/d9/Earth_by_the_EPIC_Team_on_21_April_2018.png', '0.00', '2019-08-30 23:24:09'),
(70, 'Vénus', 'Vénus est une des quatre planètes telluriques du système solaire. Elle est la deuxième planète par ordre d\'éloignement au soleil, et la sixième par masse ou par taille décroissantes.\r\n\r\nLa planète Vénus a été baptisée du nom de la déesse Vénus de la mythologie romaine.', 'https://upload.wikimedia.org/wikipedia/commons/e/e5/Venus-real_color.jpg', '100000.00', '2019-08-30 23:27:06'),
(71, 'Pluton', 'Pluton, officiellement désignée par (134340) Pluton (désignation internationale : (134340) Pluto), est une planète naine, la plus volumineuse connue dans le système solaire (2 372 km de diamètre, contre 2 326 km pour Éris), et la deuxième en termes de masse (après Éris). Pluton est ainsi le neuvième plus gros objet connu orbitant autour du soleil (exception faite des lunes des géantes gazeuses) et le dixième par la masse. Premier objet transneptunien identifié, Pluton orbite autour du soleil à une distance variant entre 30 et 49 unités astronomiques et appartient à la ceinture de Kuiper, ceinture dont il est (tant par la taille que par la masse) le plus grand membre connu.<br>\r\n<br>\r\nSignez notre pétition pour réinstaurer officiellement Pluton en tant que planète numéro 9 du système solaire !!!', 'https://upload.wikimedia.org/wikipedia/commons/8/80/Nh-pluto-in-true-color_2x_JPEG.jpg', '900000.00', '2019-08-30 23:28:51'),
(72, 'Saturne', 'Saturne est la sixième planète du système solaire par ordre de distance au soleil et la deuxième après Jupiter tant par sa taille que par sa masse.\r\n\r\nSaturne est une planète géante, au même titre que Jupiter, Uranus et Neptune, et plus précisément une géante gazeuse de type Jupiter froid comme Jupiter. D\'un diamètre d\'environ neuf fois et demi celui de la Terre, elle est majoritairement composée d\'hydrogène et d\'hélium. Sa masse vaut 95 fois celle de la Terre et son volume 900 fois celui de notre planète. Sa période de révolution est d\'environ 29 ans. Elle était au périhélie le 26 juillet 2003 et à l\'aphélie le 17 avril 2018.', 'https://www.imagesdoc.com/wp-content/uploads/sites/33/2018/10/Saturne.jpg', '85623.00', '2019-08-30 23:33:03'),
(73, 'Jupiter', 'Jupiter est une planète géante gazeusea. Il s\'agit de la plus grosse planète du Système solaire, plus volumineuse et massive que toutes les autres planètes réunies, et la cinquième planète par sa distance au Soleil (après Mercure, Vénus, la Terre et Mars).', 'https://upload.wikimedia.org/wikipedia/commons/e/e2/Jupiter.jpg', '999.00', '2019-08-30 23:34:56');

-- --------------------------------------------------------

--
-- Structure de la table `st_products_has_st_categories`
--

DROP TABLE IF EXISTS `st_products_has_st_categories`;
CREATE TABLE IF NOT EXISTS `st_products_has_st_categories` (
  `st_products_pro_id` int(11) NOT NULL,
  `st_categories_cat_id` int(11) NOT NULL,
  PRIMARY KEY (`st_products_pro_id`,`st_categories_cat_id`),
  KEY `fk_st_products_has_st_categories_st_categories1_idx` (`st_categories_cat_id`),
  KEY `fk_st_products_has_st_categories_st_products1_idx` (`st_products_pro_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Déchargement des données de la table `st_products_has_st_categories`
--

INSERT INTO `st_products_has_st_categories` (`st_products_pro_id`, `st_categories_cat_id`) VALUES
(4, 1),
(19, 1),
(20, 1),
(40, 1),
(41, 1),
(42, 1),
(43, 1),
(44, 1),
(47, 1),
(49, 1),
(50, 1),
(51, 1),
(52, 1),
(53, 1),
(54, 1),
(13, 2),
(14, 2),
(18, 2),
(23, 2),
(25, 2),
(27, 2),
(36, 2),
(11, 3),
(12, 3),
(26, 3),
(37, 3),
(38, 3),
(62, 3),
(63, 3),
(64, 3),
(65, 3),
(66, 3),
(5, 4),
(6, 4),
(7, 4),
(8, 4),
(15, 4),
(16, 4),
(17, 4),
(21, 4),
(22, 4),
(25, 4),
(28, 4),
(29, 4),
(30, 4),
(31, 4),
(32, 4),
(33, 4),
(34, 4),
(9, 5),
(10, 5),
(24, 5),
(35, 5),
(67, 5),
(68, 5),
(13, 6),
(14, 6),
(18, 6),
(27, 6),
(28, 6),
(36, 6),
(1, 7),
(2, 7),
(3, 7),
(45, 7),
(46, 7),
(47, 7),
(48, 7),
(49, 7),
(50, 7),
(51, 7),
(52, 7),
(53, 7),
(54, 7),
(55, 7),
(56, 7),
(57, 7),
(58, 7),
(59, 7),
(60, 7),
(61, 7),
(15, 8),
(16, 8),
(17, 8),
(7, 9),
(8, 9),
(22, 9),
(5, 10),
(6, 10),
(21, 10),
(24, 10),
(29, 10),
(30, 10),
(31, 10),
(32, 10),
(33, 10),
(34, 10),
(23, 11),
(39, 11),
(69, 11),
(70, 11),
(71, 11),
(72, 11),
(73, 11);

-- --------------------------------------------------------

--
-- Structure de la table `st_types_of_logistics`
--

DROP TABLE IF EXISTS `st_types_of_logistics`;
CREATE TABLE IF NOT EXISTS `st_types_of_logistics` (
  `typ_log_id` int(11) NOT NULL AUTO_INCREMENT,
  `typ_log_descr` varchar(45) NOT NULL,
  `typ_log_price` decimal(10,2) NOT NULL,
  PRIMARY KEY (`typ_log_id`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8;

--
-- Déchargement des données de la table `st_types_of_logistics`
--

INSERT INTO `st_types_of_logistics` (`typ_log_id`, `typ_log_descr`, `typ_log_price`) VALUES
(1, 'Colissimo', '5.00'),
(2, 'UPS', '15.00'),
(3, 'Retrait en magasin', '0.00');

-- --------------------------------------------------------

--
-- Structure de la table `st_types_of_payments`
--

DROP TABLE IF EXISTS `st_types_of_payments`;
CREATE TABLE IF NOT EXISTS `st_types_of_payments` (
  `typ_pay_id` int(11) NOT NULL AUTO_INCREMENT,
  `typ_pay_descr` varchar(45) NOT NULL,
  PRIMARY KEY (`typ_pay_id`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8;

--
-- Déchargement des données de la table `st_types_of_payments`
--

INSERT INTO `st_types_of_payments` (`typ_pay_id`, `typ_pay_descr`) VALUES
(1, 'CB'),
(2, 'Paypal'),
(3, 'Chèque');

--
-- Contraintes pour les tables déchargées
--

--
-- Contraintes pour la table `st_addresses`
--
ALTER TABLE `st_addresses`
  ADD CONSTRAINT `fk_st_addresses_st_customers1` FOREIGN KEY (`st_customers_cus_id`) REFERENCES `st_customers` (`cus_id`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Contraintes pour la table `st_caddies`
--
ALTER TABLE `st_caddies`
  ADD CONSTRAINT `fk_st_customers_has_st_products_st_customers` FOREIGN KEY (`st_customers_cus_id`) REFERENCES `st_customers` (`cus_id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `fk_st_customers_has_st_products_st_products1` FOREIGN KEY (`st_products_pro_id`) REFERENCES `st_products` (`pro_id`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Contraintes pour la table `st_orders`
--
ALTER TABLE `st_orders`
  ADD CONSTRAINT `fk_st_orders_st_addresses1` FOREIGN KEY (`st_address_billing`) REFERENCES `st_addresses` (`add_id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `fk_st_orders_st_addresses2` FOREIGN KEY (`st_address_delivery`) REFERENCES `st_addresses` (`add_id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `fk_st_orders_st_customers1` FOREIGN KEY (`st_customers_cus_id`) REFERENCES `st_customers` (`cus_id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `fk_st_orders_st_types_of_logistics1` FOREIGN KEY (`st_types_of_logistics_typ_log_id`) REFERENCES `st_types_of_logistics` (`typ_log_id`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Contraintes pour la table `st_orders_lines`
--
ALTER TABLE `st_orders_lines`
  ADD CONSTRAINT `fk_st_orders_has_st_products_st_orders1` FOREIGN KEY (`st_orders_ord_id`) REFERENCES `st_orders` (`ord_id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `fk_st_orders_has_st_products_st_products1` FOREIGN KEY (`st_products_pro_id`) REFERENCES `st_products` (`pro_id`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Contraintes pour la table `st_payments`
--
ALTER TABLE `st_payments`
  ADD CONSTRAINT `fk_st_payments_st_customers1` FOREIGN KEY (`st_customers_cus_id`) REFERENCES `st_customers` (`cus_id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `fk_st_payments_st_orders1` FOREIGN KEY (`st_orders_ord_id`) REFERENCES `st_orders` (`ord_id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `fk_st_payments_st_types_of_payments1` FOREIGN KEY (`st_types_of_payments_typ_pay_id`) REFERENCES `st_types_of_payments` (`typ_pay_id`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Contraintes pour la table `st_products_has_st_categories`
--
ALTER TABLE `st_products_has_st_categories`
  ADD CONSTRAINT `fk_st_products_has_st_categories_st_categories1` FOREIGN KEY (`st_categories_cat_id`) REFERENCES `st_categories` (`cat_id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `fk_st_products_has_st_categories_st_products1` FOREIGN KEY (`st_products_pro_id`) REFERENCES `st_products` (`pro_id`) ON DELETE NO ACTION ON UPDATE NO ACTION;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
