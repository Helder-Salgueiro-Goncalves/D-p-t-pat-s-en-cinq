-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Hôte : 127.0.0.1
-- Généré le : ven. 07 juin 2024 à 10:54
-- Version du serveur : 10.4.24-MariaDB
-- Version de PHP : 8.1.6

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de données : `lyceestvincent_pzc`
--

-- --------------------------------------------------------

--
-- Structure de la table `assistant`
--

CREATE TABLE `assistant` (
  `assistant_id` int(11) NOT NULL,
  `assistant_libelle` mediumtext NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Déchargement des données de la table `assistant`
--

INSERT INTO `assistant` (`assistant_id`, `assistant_libelle`) VALUES
(1, 'Ma famille plus précisément mon mari et mes enfants ! Ils sont présents pour la Pension Familiale Canine. Toujours partant pour jouer avec vos chiens, pour les balades et les caresses.');

-- --------------------------------------------------------

--
-- Structure de la table `assistant_canin`
--

CREATE TABLE `assistant_canin` (
  `assistant_canin_id` int(11) NOT NULL,
  `assistant_canin_libelle` mediumtext NOT NULL,
  `assistant_canin_nom` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Déchargement des données de la table `assistant_canin`
--

INSERT INTO `assistant_canin` (`assistant_canin_id`, `assistant_canin_libelle`, `assistant_canin_nom`) VALUES
(1, 'cocker née en 2000 qui a participé à l\'éducation et rééducation de mes deux autres chiennes, trop agé pour travailler de temps en temps elle pointe le bout de son nez.', 'Chance'),
(2, 'petite croisée. Chienne abandonnée avec un passé de maltraitance. Petite chienne avec du tempérament, vive et joyeuse. Née en 2008, elle m\'aide pour la rééducation des chiens réactifs congénères, à recadrer les chiens trop turbulents et montre le travail ', 'Chipie'),
(3, 'Femelle Léonberg née en 2012, elle m’aide pour le test de socialisation de pension, pour la rééducation des congénères réactifs, elle montre le travail et socialise votre chien.\r\n', 'Ficelle');

-- --------------------------------------------------------

--
-- Structure de la table `auteur`
--

CREATE TABLE `auteur` (
  `auteur_id` int(11) NOT NULL,
  `auteur_nom` varchar(25) NOT NULL,
  `auteur_prenom` varchar(25) NOT NULL,
  `auteur_mail` varchar(35) NOT NULL,
  `auteur_contenu` text NOT NULL,
  `auteur_date_publication` date DEFAULT NULL,
  `auteur_note` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Déchargement des données de la table `auteur`
--

INSERT INTO `auteur` (`auteur_id`, `auteur_nom`, `auteur_prenom`, `auteur_mail`, `auteur_contenu`, `auteur_date_publication`, `auteur_note`) VALUES
(2, 'Trouillet', 'Christine', 'christinetr60@gmail.com', 'Nous avons eu la chance de découvrir la pension de Patte z\'en cinq pour Pilou notre épagneul breton de 8 ans. Quel soulagement de le confier en toute tranquillité et de lui permettre d\'avoir l\'accueil chaleureux , familial et professionnel d\'Aurore. La fréquentation de la pension aide Pilou à plus de sociabilité avec ses congénères et il est manifestement content d\'y aller. Bref , c\'est la pension qu\'il lui fallait !', NULL, 5),
(3, 'Barbin', 'Nelly', 'nellyb33@hotmail.fr', 'Nous sommes plus qu\'heureux qu\'Aurore ai croisé notre route. Très professionnelle, elle travaille en harmonie avec humains et poilus pour que tout le monde se sente bien. Notre chienne qui à l\'époque était extrêmement craintive profite aujourd\'hui de sa vie de chien de famille plus sereinement. Aurore nous a beaucoup aidé et est encore présente à nos côtés quand il le faut. Merci à elle. Et surtout n\'hésitez pas!!\n\n', NULL, 5),
(4, 'Croquison', 'Laura', 'laura.croquison@gmail.com', 'J’ai eu l’occasion de rencontrer Aurore et ça famille au club canin de Senlis. Toujours de bons conseils, passionnée et pédagogue. Adepte de la méthode positive et de l’éducation dans le respect du chien, je recommande Patte z’en cinq pour vos poilus sans hésiter.', NULL, 4),
(5, 'Brulard', 'Melodie', 'melodie60800@gmail.com', 'Aurore est une éducatrice très à l\'écoute, patiente et travaillant dans le respect du chien! A conseiller!', NULL, 4),
(6, 'Chevalier', 'Bérangère', 'chevalierberangere@gmail.com', 'Nous avons contacté Aurore en Juin 2020 car nous avions des soucis avec notre jeune chienne Kyra adoptée dans un refuge au début du confinement. Aurore est venue chez nous et a pris le temps de nous écouter lui raconter l\'histoire de Kyra. Grâce à son écoute bienveillante et son esprit d\'analyse , Aurore nous a expliqué les raisons du comportement de Kyra (qui nous mordait quotidiennement) et elle nous a donné avec beaucoup de patience et de professionalisme, les conseils pour transformer les ma\n\n', NULL, 5),
(7, 'Meresse', 'Justine', 'mjustine@gmail.com', 'Educatrice que je recommande à 100%. Aurore est une personne extrêmement bienveillante, rempli de bons conseils. Elle nous a aidé à mieux comprendre notre chien et à mieux communiquer avec lui. Vous pouvez lui faire confiance les yeux fermés. En plus de tout cela, elle n’a pas aidé que notre chien. Mais nous également, elle nous a énormément fait évoluer. Merci à vous\n\n', NULL, 3),
(8, 'Vedovato', 'Catherine', 'vedo.cath@yahoo.fr', 'Pension canine familiale exceptionnelle. Aurore est très professionnelle et à l\'écoute des chiens. Notre Philomène s\'est épanouie au contact de ses congénères et adore aller là-bas. Pas de cages, de grands espaces, des balades, et vie en famille où les chiens sont chouchoutés. Nous avons une confiance absolue lorsque nous partons, nous ne pouvions rêver mieux pour notre doudou. Merci. Catherine et Jean-Claude\n\n', NULL, 5),
(9, 'Dumont', 'Virginie', 'virginid@gmail.com', 'Passage du certificat d’aptitude auprès de Aurore vendredi dernier, et j’en suis ressorti très contente, très bonne accueil, ont voit que les chiens se sentent bien… beaucoup d’informations très utiles et de bons conseils. Encore Merci à vous.\n\n\n', NULL, 5),
(10, 'Beccafico', 'Nathalie', 'nathbacca@hotmail.com', 'Patte s’en cinq nous avait été recommandé, et je ne regrette pas d’avoir sollicité Aurore qui nous a aidé à faire cohabiter nos deux chiennes et nos deux chatons. Merci beaucoup !\n\n', NULL, 5),
(11, 'Rop', 'Leslie', 'r-leslie@gmail.com', 'Voici mon expérience : Habitant dans les Vosges, avec une expérience de 4 chiens dont 2 bouviers bernois, nous étions décontenancés par Rubis, notre 3ème bouvier bernois car communication difficile. Nous avons eu recours à un éducateur canin qui nous a donné plein d\'enseignements pour devenir chef de meute, nous avons fréquenté un club canin où nous avons appris à donner des ordres moyennant une récompense mais malgré ceci, toujours pas de connivence avec Rubis. Notre fille habitant Compiégne, n\n\n', NULL, 5),
(12, 'Rhomer', 'Estelle', 'rhomer86est@yahoo.com', 'Bonjour, j’ai passé ma formation pour le certificat d’aptitude chien catégorisé samedi 21/01/2023. J’ai appris beaucoup de chose, la formation est complète et laisse place à l’échange. Ce n’est pas qu’une simple formalité pour Autore. C’est une femme passionnée et qui donne envie de réussir l’éducation de son chien avec les méthodes positives. Je recommande vivement ! Merci pour tous vos conseils et à bientôt je pense pour des ballades et/ou cours d’éducation ☺️\n\n', NULL, 5),
(13, 'Cotterot', 'Michael', 'michacoterot@gmail.com', 'bonjour suite a la formation faite hier avec madame di Felice aurore pour mon attestation d\'aptitude pour mon chiot rottweiler .se fut une excellente journée, accueil agréable ,très a l\'écoute et ma apprit beaucoup sur la categorie2... je recommande cette personne très sociable et de bon conseil. Mon chiot de 3 mois a directement apprécier cette personne et il a passer un bon moment en sa compagnie. je vous remercies madame di felice pour tout a bientot .', NULL, 5);

-- --------------------------------------------------------

--
-- Structure de la table `a_propos`
--

CREATE TABLE `a_propos` (
  `a_propos_id` int(11) NOT NULL,
  `a_propos_profil` longtext NOT NULL,
  `a_propos_histoire` longtext NOT NULL,
  `a_propos_profession` longtext NOT NULL,
  `formation_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Déchargement des données de la table `a_propos`
--

INSERT INTO `a_propos` (`a_propos_id`, `a_propos_profil`, `a_propos_histoire`, `a_propos_profession`, `formation_id`) VALUES
(1, 'De ma naissance jusqu\'à mon âge actuel, j\'ai vécu avec toute sorte d\'animaux. J\'ai toujours aimé leur compagnie en particulier celles des chiens. J\'avais une grande complicité avec nos chiens mais aussi ceux de mon entourage. Passionnée depuis toujours, le travail que j\'ai choisi associ plusieurs points très importants pour moi. Avoir un travail passionnant, évolutif et pouvoir aider les gens et les chiens. Pour pouvoir aider au mieux, j\'ai souhaité améliorer mes connaissances en effectuant une formation de 8 mois pour obtenir le Brevet Professionnel d\'Educateur Canin le seul diplôme reconnu d\'état d\'actuellement. Différents intervenants se sont succédés pour nous apprendre leur savoir et nous faire partager leur passion : vétérinaire, éducateurs Canins Professionnels en méthode positive ou pas, il y a aussi les intervenants pour le bien être animal Tiliton teuch et les nombreux stages chez les professionnels du milieu canin. Les clubs d\'éducation canine formés par la société centrale canine essaient d’améliorer l\'obéissance des chiens sur le terrain et les bénévoles essaient de vous aider au mieux ou pas (selon les personnes). Une fois rentré chez vous, vous êtes seul face à vos problèmes. Je veux proposer des séances d\'éducation et de comportement. Rien n’est figé, je m’adapte à vous et votre chien. Je souhaite que les familles et leur compagnon vivent en parfaite harmonie. Sensibiliser les propriétaires, les enfants afin de limiter les risques d\'abandon, d\'accidents suite à une mauvaise communication de l\'homme et son chien. Le comportement humain et ses codes sociaux n\'ont pas pour nos chiens le même sens. J\'interviens à domicile pour avoir une vision du milieu de vie du chien. Je propose des cours en extérieur (terrain clos sur Compiègne) ou en situation réel ville, campagne, forêt... en individuel ou/et collectifs pas plus de 6 chiens pour la socialisation des chiens et le bienêtre de tous.', 'J\'ai déjà poussé des portes pour avoir l\'aide de la dernière chance avec notre chienne Rika. Je sais ce que vous pouvez ressentir! Les sentiments de colère, de peine, d\'impuissance, de désespoir, la solitude, être à bout de force mentalement et physiquement, ne plus savoir quoi faire ! A l\'époque il n\'y avait pas autant de spécialistes que maintenant, dresseur, comportementaliste, coache, éducateur… la vision du chien n\'était pas la même! On parlait que de dominance ! A notre grand désespoir ! Si j\'ai un conseil à vous donnez N\'attendez pas! Rien ne se règlera tout seul ! Il y a des solutions en méthode positif dans le respect. Garder a l’esprit que c’est votre chien, c’est vous qui le protégé de l’humain. Ne croyez pas tout ce que l’on vous dit et posez vous la question est ce que mon chien est respecté avec telle ou telle méthode avec telle ou telle personne ?', 'J\'avais une grande complicité avec nos chiens mais aussi ceux de mon entourage. Passionnée depuis toujours, le travail que j\'ai choisi associ plusieurs points très importants pour moi. Avoir un travail passionnant, évolutif et pouvoir aider les gens et les chiens. Pour pouvoir aider au mieux, j\'ai souhaité améliorer mes connaissances en effectuant une formation de 8 mois pour obtenir le Brevet Professionnel d\'Educateur Canin le seul diplôme reconnu d\'état d\'actuellement. Différents intervenants se sont succédés pour nous apprendre leur savoir et nous faire partager leur passion : vétérinaire, éducateurs Canins Professionnels en méthode positive ou pas, il y a aussi les intervenants pour le bien être animal Tiliton teuch et les nombreux stages chez les professionnels du milieu canin. Les clubs d\'éducation canine formés par la société centrale canine essaient d’améliorer l\'obéissance des chiens sur le terrain et les bénévoles essaient de vous aider au mieux ou pas (selon les personnes). Une fois rentré chez vous, vous êtes seul face à vos problèmes. Je veux proposer des séances d\'éducation et de comportement. Rien n’est figé, je m’adapte à vous et votre chien. Je souhaite que les familles et leur compagnon vivent en parfaite harmonie. Sensibiliser les propriétaires, les enfants afin de limiter les risques d\'abandon, d\'accidents suite à une mauvaise communication de l\'homme et son chien. Le comportement humain et ses codes sociaux n\'ont pas pour nos chiens le même sens. J\'interviens à domicile pour avoir une vision du milieu de vie du chien. Je propose des cours en extérieur (terrain clos sur Compiègne) ou en situation réel ville, campagne, forêt... en individuel ou/et collectifs pas plus de 6 chiens pour la socialisation des chiens et le bienêtre de tous.', 0);

-- --------------------------------------------------------

--
-- Structure de la table `enfant`
--

CREATE TABLE `enfant` (
  `enf_id` int(11) NOT NULL,
  `enf_libelle` varchar(35) NOT NULL,
  `enf_lien` varchar(100) DEFAULT NULL,
  `enf_url` varchar(100) DEFAULT NULL,
  `enf_desciptif` varchar(250) NOT NULL,
  `enf_archive` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Déchargement des données de la table `enfant`
--

INSERT INTO `enfant` (`enf_id`, `enf_libelle`, `enf_lien`, `enf_url`, `enf_desciptif`, `enf_archive`) VALUES
(1, 'Espace Enfants', 'http://www.scc.asso.fr/loupy,510', '', 'Cet espace de partage est pour les enfants passionnés des chiens. On peut y mettre leurs dessins, poèmes, titres...Il y a aussi des liens pour des jeux interactifs avec animaux. Pour me transmettre vos dessins ou autres vous me les envoyez. ', 1),
(2, 'Jeux la maison de loupy', 'http://www.scc.asso.fr/loupy,510', '', 'Jeux ludique et interactif de la société centrale canine. pour apprendre à interragir avec un chien pour éviter les risques de morsures. Pour les enfants de 5/7 ans et 8/12 ans.', 0),
(3, 'carte postale', '', '', 'Carte de mon enfance', 0),
(4, 'Dessin de Stéphano 9 ans ', '', 'public/img/enfant/IMG-6187-1-.JPG', '', 0),
(5, 'dessin Stéphano 9 ans ', '', 'public/img/enfant/dessin-Sty-phano-9-ans.JPG', '', 1);

-- --------------------------------------------------------

--
-- Structure de la table `formation`
--

CREATE TABLE `formation` (
  `formation_id` int(11) NOT NULL,
  `formation_libelle` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Déchargement des données de la table `formation`
--

INSERT INTO `formation` (`formation_id`, `formation_libelle`) VALUES
(1, 'BP éducateur canin'),
(2, 'Certificat de capacité n°60-353'),
(3, 'Térapies comportementales du chiens de compagnie'),
(4, 'Entrainement et modification des comportements avec Jean Lessard'),
(5, 'Entrainement au \"clicker\" avec Jean Lessard');

-- --------------------------------------------------------

--
-- Structure de la table `livre_dor`
--

CREATE TABLE `livre_dor` (
  `livre_id` int(11) NOT NULL,
  `livre_archive` tinyint(1) NOT NULL DEFAULT 0,
  `livre_contenu` varchar(500) NOT NULL,
  `livre_note` int(11) NOT NULL DEFAULT 0,
  `livre_date_publication` date NOT NULL,
  `auteur_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Déchargement des données de la table `livre_dor`
--

INSERT INTO `livre_dor` (`livre_id`, `livre_archive`, `livre_contenu`, `livre_note`, `livre_date_publication`, `auteur_id`) VALUES
(2, 1, 'Nous avons eu la chance de découvrir la pension de Patte z\'en cinq pour Pilou notre épagneul breton de 8 ans. Quel soulagement de le confier en toute tranquillité et de lui permettre d\'avoir l\'accueil chaleureux , familial et professionnel d\'Aurore.\nLa fréquentation de la pension aide Pilou à plus de sociabilité avec ses congénères et il est manifestement content d\'y aller. \nBref , c\'est la pension qu\'il lui fallait !', 5, '2019-10-19', 2),
(3, 1, 'Nous sommes plus qu\'heureux qu\'Aurore ai croisé notre route.\nTrès professionnelle, elle travaille en harmonie avec humains et poilus pour que tout le monde se sente bien. \nNotre chienne qui à l\'époque était extrêmement craintive profite aujourd\'hui de sa vie de chien de famille plus sereinement. Aurore nous a beaucoup aidé et est encore présente à nos côtés quand il le faut.\nMerci à elle.\nEt surtout n\'hésitez pas!!', 5, '2019-10-22', 3),
(4, 1, 'J’ai eu l’occasion de rencontrer Aurore et ça famille au club canin de Senlis. Toujours de bons conseils, passionnée et pédagogue. Adepte de la méthode positive et de l’éducation dans le respect du chien, je recommande Patte z’en cinq pour vos poilus sans hésiter.', 5, '2019-10-24', 4),
(5, 1, 'Aurore est une éducatrice très à l\'écoute, patiente et travaillant dans le respect du chien! A conseiller!', 5, '2019-10-28', 5),
(6, 2, 'BRAVO à cette petite entreprise d\'éducateurs canins ! Leur expertise et leur dévouement sont exceptionnels. Les propriétaires de chiens peuvent compter sur leur professionnalisme et leurs méthodes d\'entraînement positives pour améliorer la relation avec leur animal. Une référence incontournable dans le domaine de l\'éducation canine ', 5, '2019-11-28', 6),
(7, 2, 'Une petite entreprise d\'éducateurs canins qui fait un excellent travail ! Leur expertise dans le domaine de l\'éducation canine est remarquable. Les propriétaires de chiens trouveront des méthodes d\'entraînement positives et des conseils utiles pour améliorer la relation avec leur animal de compagnie. Je les recommande vivement ', 3, '2019-11-28', 7);

-- --------------------------------------------------------

--
-- Structure de la table `methode`
--

CREATE TABLE `methode` (
  `meth_id` int(11) NOT NULL,
  `meth_libelle` varchar(35) NOT NULL,
  `meth_descriptif` varchar(2000) NOT NULL,
  `meth_archive` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Déchargement des données de la table `methode`
--

INSERT INTO `methode` (`meth_id`, `meth_libelle`, `meth_descriptif`, `meth_archive`) VALUES
(1, 'Méthode respectueuse positive', 'La méthode d\'éducation positive est dans le respect du chien. Basée sur le renforcement (chose qui motive le chien ex: gustatif, jouet, caresse, odeur, sortie...) pour déclencher, augmenter et fixer les comportements désirer. Si les mauvais comportements ne sont pas renforcés, ils éteindront. Le maître n\'est pas un dominant mais un guide. Pas de violence ! Mais un cadre. Votre chien vous obéira par envie et non par peur. Quelle que soit la taille, l\'âge ou la race. Le but est de construire une relation harmonieuse entre le maître et le chien de vous aidez à mieux comprendre et communiquer. Je vous apprendrai à décoder et analyser le \"langage canin\" Souvent les problèmes de comportement son dû a une mauvaise compréhension entre vous et des besoins qui ne sont pas comblés. Mes cours sont en particuliers et/ou en collectifs dans votre environnement, sur mon terrain ou autres endroits. Rien de figer que du modulable, je m\'adapte a vous et votre chien. On est tous unique a chacun son rythme. Je suis ouverte d\'esprit mais je ne tolère pas tout, aucunes violences verbales ou physiques ne sera accepté. On travail ensemble, je vous donne des clés, à vous de les utiliser au mieux car sans travail pas de résultat et oui je ne suis pas magicienne.  ', 1);

-- --------------------------------------------------------

--
-- Structure de la table `partenaire`
--

CREATE TABLE `partenaire` (
  `part_id` int(11) NOT NULL,
  `part_libelle` varchar(35) NOT NULL,
  `part_descriptif` varchar(250) NOT NULL,
  `part_type` varchar(35) NOT NULL,
  `part_site` varchar(75) NOT NULL,
  `part_adresse_rue` varchar(75) NOT NULL,
  `part_adresse_postal` varchar(5) NOT NULL,
  `part_adresse_ville` varchar(75) NOT NULL,
  `part_numero` varchar(10) NOT NULL,
  `part_mail` varchar(75) NOT NULL,
  `part_archive` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Déchargement des données de la table `partenaire`
--

INSERT INTO `partenaire` (`part_id`, `part_libelle`, `part_descriptif`, `part_type`, `part_site`, `part_adresse_rue`, `part_adresse_postal`, `part_adresse_ville`, `part_numero`, `part_mail`, `part_archive`) VALUES
(1, 'Brulard Mélodie', '*Nous travaillons en binôme sur les chiens réactifs.\r\n*Habilitée pour dispenser la formation de chien de catégorie dans l\'Oise 60, Somme 80, Aisne 02, Seine Maritime et L\'Eure.  \r\n', 'Éducatrice Canin   ', 'www.canifelin.fr', 'Aucune rue n', '', 'Aucun ville n', 'contact@ca', 'contact@canifelin.fr', 1),
(2, 'Club Canin de Senlis \"CSEC\"', 'Club d\'éducation canine dans le respect du chien. ', 'Aucun type n\'a été enregistré', 'www.club-canin-senlis.com', 'Aucune rue n\'a été enregistré', 'Aucun', 'Aucun ville n\'a été enregistré', 'Aucun adre', 'Aucun numéro de téléphone n\'a été enregistré', 1),
(3, 'Francine Broutin', 'Toiletteuse canin dans le rester de votre chien. ', 'Toilettage Canin', 'Aucun site internet n\'a été enregistré', 'Aucune rue n\'a été enregistré', 'Aucun', 'Aucun ville n\'a été enregistré', 'coeurdepoi', 'Aucun numéro de téléphone n\'a été enregistré', 1),
(4, 'Stéphanie Bréavoine', 'Conseillère et vendeuse en Fleur de Bach pour chien et humain.', 'Conseillère Fleur de Bach', 'Facebook.com', 'Aucune rue n\'a été enregistré', 'Aucun', 'Aucun ville n\'a été enregistré', 'Aucun adre', '0890391188', 1),
(5, 'Nadine Solé', 'Conseillère pour humain et animaux en Aloe Vera.', 'Monitrice forever Aloe Vera', 'Aucun site internet n\'a été enregistré', 'Aucune rue n\'a été enregistré', 'Aucun', 'Aucun ville n\'a été enregistré', 'nadinedese', '0781060492', 1),
(6, 'Julia Deubeul', 'Éducatrice dans le 78 et centre de formation. ', 'Éducatrice canin', 'education.canine.fr', 'Aucune rue n\'a été enregistré', 'Aucun', 'Aucun ville n\'a été enregistré', 'Aucun adre', 'Aucun numéro de téléphone n\'a été enregistré', 0),
(7, 'Jean Lessard', 'Éducateur et Formateur canin', 'Éducateur et Formateur canin', 'www.jeanlessard.com', 'Aucune rue n', '', 'Québec', 'Aucun adre', '', 1),
(8, 'Dr Lévêque', 'Vétérinaire dans le respect du chien.', 'Vétérinaire clinique SEQUOIA', 'Aucun site internet n', 'Aucune rue n', '', 'Nogent sur Oise', 'Aucun adre', '', 1),
(9, 'Dr Antoine Bouvresse', 'Peut faire passé les tests de comportement pour les chiens de catégorie. ', 'Vétérinaire Comportementaliste', 'Aucun site internet n\'a été enregistré', 'Aucune rue n\'a été enregistré', '92500', 'Reuil Malmaison', 'Aucun adre', '0147513158', 1),
(10, 'Dr Thierry Bedossa', 'Vétérinaire et responsable du refuge AVA', 'Vétérinaire ', 'Aucun site internet n\'a été enregistré', 'Aucune rue n\'a été enregistré', 'Aucun', 'Neuilly sur Seine ', 'Aucun adre', '0146240824', 0),
(11, 'Signalement Maltraitence', 'Prévenir les autorités gendarmerie, police, services de la préfecture et associations.', 'Aucun type n\'a été enregistré', 'Aucun site internet n\'a été enregistré', 'Aucune rue n\'a été enregistré', 'Aucun', 'Aucun ville n\'a été enregistré', 'Aucun adre', 'Aucun numéro de téléphone n\'a été enregistré', 1),
(12, 'Catherine Collignon', 'Ecole française de clicker training.\r\nVente d\'accessoires pour chiens.', 'Éducatrice et formatrice', 'www.animalin.net', 'Aucune rue n\'a été enregistré', 'Aucun', 'Aucun ville n\'a été enregistré', 'Aucun adre', 'Aucun numéro de téléphone n\'a été enregistré', 0),
(13, 'MFEC', 'Mouvement professionnel francophone des éducateurs de chiens de compagnie. Association qui regroupe des professionnels en éducation amicale et positive.', 'Aucun type n\'a été enregistré', 'www.mfec.fr', 'Aucune rue n\'a été enregistré', 'Aucun', 'Aucun ville n\'a été enregistré', 'Aucun adre', 'Aucun numéro de téléphone n\'a été enregistré', 1),
(14, 'AVA', 'Refuge aide aux vieux Animaux .', 'Refuge animaux', 'Aucun site internet n\'a été enregistré', 'Aucune rue n\'a été enregistré', 'Aucun', 'Aucun ville n\'a été enregistré', 'info@avare', '0677482792', 1),
(15, 'Truffes dorées ', 'Aliments sains et naturels pour chiens et chats, sans sous produits ni matières premières de mauvaises qualité. Mes chiens en raffolent, je les recommande a mes clients. Avec le code Ficelle 20% de remise à la première commande.  ', 'Nourriture pour chien et chat', 'www.truffesdorees.fr', 'Aucune rue n\'a été enregistré', 'Aucun', 'Aucun ville n\'a été enregistré', 'Aucun adre', '0619432491', 1);

-- --------------------------------------------------------

--
-- Structure de la table `photo`
--

CREATE TABLE `photo` (
  `photo_id` int(11) NOT NULL,
  `photo_libelle` varchar(35) NOT NULL,
  `photo_url` varchar(250) NOT NULL,
  `photo_date` date NOT NULL,
  `photo_archive` int(11) NOT NULL,
  `photo_type` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Déchargement des données de la table `photo`
--

INSERT INTO `photo` (`photo_id`, `photo_libelle`, `photo_url`, `photo_date`, `photo_archive`, `photo_type`) VALUES
(1, 'Chance', 'chance.jpg', '2014-06-01', 1, 1),
(2, 'Lima', 'lima.jpg', '2016-02-16', 1, 1),
(3, 'Boubou', 'boubou.jpg', '2015-04-01', 1, 3),
(4, 'Keshi et Boubou', 'Keshi-et-Boubou.jpg', '2015-04-01', 1, 3),
(5, 'Chipie', 'chipie.jpg', '2015-04-25', 1, 3),
(6, 'Ficelle', 'ficelle.jpg', '2014-07-10', 1, 3);

-- --------------------------------------------------------

--
-- Structure de la table `prestation`
--

CREATE TABLE `prestation` (
  `prestation_id` int(11) NOT NULL,
  `prestation_libelle` varchar(35) NOT NULL,
  `prestation_contenu` varchar(1000) NOT NULL,
  `prestation_prix` float NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Déchargement des données de la table `prestation`
--

INSERT INTO `prestation` (`prestation_id`, `prestation_libelle`, `prestation_contenu`, `prestation_prix`) VALUES
(1, 'ANALYSE ', 'Pour tous les chiens de tous âges. Avant tous cours d\'éducation ou balade co une analyse est réalisée. On discute de votre chien en sa présence ou pas. Cette analyse me permet de faire le tour des comportements de votre chien et de voir ce qu\'il est possible de faire et de mettre en place. L\'analyse dure entre 1h/ 1h30 sur rendez vous. Le lundi , mardi , mercredi, jeudi , vendredi et samedi. Frais de déplacement selon zone, frais 10€ du 1/4 supplémentaire.', 50),
(5, 'COURS PARTICULIERS', 'Cours Particuliers Education ou Rééducation. Pour tous les chiens dès 2 mois. Les propriétaires qui veulent réglés des problèmes ou continués a travailler, s\'amuser pour renforcer leur complicité. Les cours sont sur Compiègne ou dans l\'environnement adapté aux besoins de votre chien. Je répond a cette demande le lundi, mardi, jeudi , mercredi, vendredi et samedi. Sur rendez vous. Le cours sont de 1h. Prix : 45€ + frais de déplacement selon le secteur + frais de 10€ du 1/4 heure supplémentaire.', 45),
(6, 'COURS COLLECTIFS', 'Pour les clients que j\'ai déjà rencontrer avec une analyse faite et au moins un cours particulier. Tous les chiens de 2 mois et plus sont les bienvenus . Pas de chien réactif congénère ou humain où un travail est à faire avant. Les cours sont de 1h. Les groupes sont formés selon les tempéraments. Maximum 6 chiens par groupe. Cours sur Compiègne ou en pleine nature ou en ville... Mon terrain est clos avec un parcours des sens . Développer l\'homéostasie sensorielle (équilibre de l\'organisme dans un environnement), développer les sens, la confiance du maître et du chien, la socialisation... Sur réservations. Selon date donner. Tarifs: l\'unité 25€', 25),
(7, 'COURS CHIENS RÉACTIFS ', 'Pour améliorer votre quotidien et celui de votre chien. Une mauvaise compréhension de votre chien peut parfois aboutir à des situations conflictuelles. Les méthodes de dressage coercitives peuvent également rendre les chiens méfiants et nerveux. Les cours sont pour les chiens réactifs (agresses) congénères et humains. Nous travaillons sur Compiègne ou tout environnement qui pourrait aider votre chien. Sur rendez vous le lundi, mardi, mercredi, jeudi, vendredi, samedi. Frais de déplacement selon zone + 10€ du 1/4 heure supplémentaire.', 45),
(8, 'PROMENADES SOCIABLES', 'Les promenades sociables sont proposées pour renforcer la communication avec les congénères et la votre avec votre chien. Se sera l’occasion d\'observer les interactions et de mieux les comprendre. Je répondrais à vos questions. Pour tous les chiens un minimum éduqué et assez vieux pour marcher de 1h à 2h. Sur Réservation. Chiens à jour de leur identification et antiparasites interne et externe. Ils seront tenus en longe pour certain et en liberté pour autres. Il ne s\'agit pas d\'un cours classique mais de marcher en groupe avec des conseils. Durée 1h/2h. En forêts, villes, campagnes, lieux publics... 6 chiens maximums. Le harnais est l\'idéale, longe ou laisse longue, carnet et papier obligatoire de votre chien, de l\'eau, sac a crotte, récompense, pas d\'ustensiles blessants (collier étrangleur, électrique je refuse)... Pour les très réactifs ils pourront intégré les promenades après une rééducation en cours particuliers. Tarifs 1h/25€', 25),
(9, 'PENSION FAMILIALE CANINE', 'Pension familiale canine pour tous les chiens sociables congénères et humains. Ouverte toute l\'année sauf pendant mes vacances . La réservation est prise en compte à la réception du contrat complet et signé. Tarif unique peu importe la taille de votre poilu. Le tarif comprend les balades, les nouvelles, les soins, l\'entretien, les câlins, les caresses, le jeux...A vous de ramener les croquettes pour éviter tous problèmes digestifs. Le mieux est de se contacter par téléphone et de discuter dans un premier temps.', 25),
(10, 'PRÉVENTION MORSURE', 'Selon vos besoins, je peux intervenir auprès d\'enfants ou d\'adultes. l\'Intervention peut se faire dans les écoles maternelles, primaires, collèges, entreprises, PMI, institution, chez vous...Apprendre a communiquer avec un chien, comment éviter la morsure, comment se comporter, la citoyenneté, avoir un chien qu\'est ce que sa implique, les abandons... On peut aborder les métiers avec le chien, les sports...tous les thèmes sont possibles c\'est selon vos attentes. Sur réservation et devis.', 0),
(11, 'ATTESTATION D\'APTITUDE', 'Formation chiens de catégories. Je suis habilitée à dispenser cette formation dans l\'Oise. Elle est obligatoire pour tous les propriétaires ou détenteurs comme le dit la loi du 20 juin 2008. Les chiens concernés : chiens de 1ère et 2ème catégorie, les chiens mordeurs et les chiens susceptibles de représenter un danger à la demande du maire ou du préfet. Cette formation vise à sensibiliser les maître aux risques que représentent leur chien et a apprendre les bonnes pratiques. Je propose 7h de formation chez moi en groupe sur Compiègne pour 60€/personne sans votre chien ou en individuel chez vous ou chez moi pour 110€/personne (le couple 170€) frais de déplacement selon zone. Horaires a voir ensemble , peut se faire en deux fois. Sur rendez vous et réservation. L\'attestation vous sera délivrée en fin de journée après une présence assidue. L\'attestation d\'aptitude est indispensable pour monter votre dossier pour votre permis de détention de chien de catégorie.', 60);

-- --------------------------------------------------------

--
-- Structure de la table `utilisateur`
--

CREATE TABLE `utilisateur` (
  `utilisateur_id` int(11) NOT NULL,
  `utilisateur_username` varchar(25) NOT NULL,
  `utilisateur_mdp` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Déchargement des données de la table `utilisateur`
--

INSERT INTO `utilisateur` (`utilisateur_id`, `utilisateur_username`, `utilisateur_mdp`) VALUES
(1, 'Aurore', '$argon2i$v=19$m=16,t=2,p=1$T2RMdWV3OUJBQzBoWDhWcA$NxsX6+VGv0PsCEpmCxb6lg');

--
-- Index pour les tables déchargées
--

--
-- Index pour la table `assistant`
--
ALTER TABLE `assistant`
  ADD PRIMARY KEY (`assistant_id`);

--
-- Index pour la table `assistant_canin`
--
ALTER TABLE `assistant_canin`
  ADD PRIMARY KEY (`assistant_canin_id`);

--
-- Index pour la table `auteur`
--
ALTER TABLE `auteur`
  ADD PRIMARY KEY (`auteur_id`);

--
-- Index pour la table `a_propos`
--
ALTER TABLE `a_propos`
  ADD PRIMARY KEY (`a_propos_id`);

--
-- Index pour la table `enfant`
--
ALTER TABLE `enfant`
  ADD PRIMARY KEY (`enf_id`);

--
-- Index pour la table `formation`
--
ALTER TABLE `formation`
  ADD PRIMARY KEY (`formation_id`);

--
-- Index pour la table `livre_dor`
--
ALTER TABLE `livre_dor`
  ADD PRIMARY KEY (`livre_id`),
  ADD KEY `livre_auteur` (`auteur_id`);

--
-- Index pour la table `methode`
--
ALTER TABLE `methode`
  ADD PRIMARY KEY (`meth_id`);

--
-- Index pour la table `partenaire`
--
ALTER TABLE `partenaire`
  ADD PRIMARY KEY (`part_id`);

--
-- Index pour la table `photo`
--
ALTER TABLE `photo`
  ADD PRIMARY KEY (`photo_id`),
  ADD KEY `photo_type` (`photo_type`);

--
-- Index pour la table `prestation`
--
ALTER TABLE `prestation`
  ADD PRIMARY KEY (`prestation_id`);

--
-- Index pour la table `utilisateur`
--
ALTER TABLE `utilisateur`
  ADD PRIMARY KEY (`utilisateur_id`);

--
-- AUTO_INCREMENT pour les tables déchargées
--

--
-- AUTO_INCREMENT pour la table `assistant`
--
ALTER TABLE `assistant`
  MODIFY `assistant_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT pour la table `assistant_canin`
--
ALTER TABLE `assistant_canin`
  MODIFY `assistant_canin_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT pour la table `auteur`
--
ALTER TABLE `auteur`
  MODIFY `auteur_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=110;

--
-- AUTO_INCREMENT pour la table `a_propos`
--
ALTER TABLE `a_propos`
  MODIFY `a_propos_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT pour la table `enfant`
--
ALTER TABLE `enfant`
  MODIFY `enf_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT pour la table `formation`
--
ALTER TABLE `formation`
  MODIFY `formation_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT pour la table `livre_dor`
--
ALTER TABLE `livre_dor`
  MODIFY `livre_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=62;

--
-- AUTO_INCREMENT pour la table `methode`
--
ALTER TABLE `methode`
  MODIFY `meth_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT pour la table `partenaire`
--
ALTER TABLE `partenaire`
  MODIFY `part_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;

--
-- AUTO_INCREMENT pour la table `photo`
--
ALTER TABLE `photo`
  MODIFY `photo_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=21;

--
-- AUTO_INCREMENT pour la table `prestation`
--
ALTER TABLE `prestation`
  MODIFY `prestation_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- AUTO_INCREMENT pour la table `utilisateur`
--
ALTER TABLE `utilisateur`
  MODIFY `utilisateur_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- Contraintes pour les tables déchargées
--

--
-- Contraintes pour la table `livre_dor`
--
ALTER TABLE `livre_dor`
  ADD CONSTRAINT `LIVRE_DOR_ibfk_1` FOREIGN KEY (`auteur_id`) REFERENCES `auteur` (`auteur_id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
