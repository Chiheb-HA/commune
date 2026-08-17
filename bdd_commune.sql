-- --------------------------------------------------------
-- Hôte :                        192.168.1.9
-- Version du serveur:           10.1.28-MariaDB - mariadb.org binary distribution
-- SE du serveur:                Win32
-- HeidiSQL Version:             10.2.0.5599
-- --------------------------------------------------------

/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET NAMES utf8 */;
/*!50503 SET NAMES utf8mb4 */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;


-- Listage de la structure de la base pour commune_makther
CREATE DATABASE IF NOT EXISTS `commune_makther` /*!40100 DEFAULT CHARACTER SET latin1 */;
USE `commune_makther`;

-- Listage de la structure de la table commune_makther. actualites
CREATE TABLE IF NOT EXISTS `actualites` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `titre_fr` text CHARACTER SET utf8 NOT NULL,
  `vignette` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `description_fr` text COLLATE utf8mb4_unicode_ci,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL,
  `titre_ar` text COLLATE utf8mb4_unicode_ci,
  `description_ar` text COLLATE utf8mb4_unicode_ci,
  `titre_en` text COLLATE utf8mb4_unicode_ci,
  `description_en` text COLLATE utf8mb4_unicode_ci,
  `alt` text COLLATE utf8mb4_unicode_ci,
  `seo_title` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `meta_description` text COLLATE utf8mb4_unicode_ci,
  `meta_keywords` text COLLATE utf8mb4_unicode_ci,
  `status` longtext CHARACTER SET utf8mb4 COLLATE utf8mb4_bin,
  `slug` varchar(150) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `featured` tinyint(4) DEFAULT NULL,
  `lien` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `date_publication` date DEFAULT NULL,
  `categorie` text COLLATE utf8mb4_unicode_ci,
  `carousel` text COLLATE utf8mb4_unicode_ci,
  `video` text COLLATE utf8mb4_unicode_ci,
  `nv_onglet` text COLLATE utf8mb4_unicode_ci,
  PRIMARY KEY (`id`),
  UNIQUE KEY `actualites_slug_unique` (`slug`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Listage des données de la table commune_makther.actualites : ~2 rows (environ)
/*!40000 ALTER TABLE `actualites` DISABLE KEYS */;
INSERT INTO `actualites` (`id`, `titre_fr`, `vignette`, `description_fr`, `created_at`, `updated_at`, `deleted_at`, `titre_ar`, `description_ar`, `titre_en`, `description_en`, `alt`, `seo_title`, `meta_description`, `meta_keywords`, `status`, `slug`, `featured`, `lien`, `date_publication`, `categorie`, `carousel`, `video`, `nv_onglet`) VALUES
	(2, 'actualite 3', '', NULL, '2019-08-20 09:55:01', '2019-12-17 09:08:55', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'ARCHIVE', 'actualite-3', 0, NULL, '2019-08-29', '1', '[]', '[]', '[]');
/*!40000 ALTER TABLE `actualites` ENABLE KEYS */;

-- Listage de la structure de la table commune_makther. admin
CREATE TABLE IF NOT EXISTS `admin` (
  `id` int(10) NOT NULL AUTO_INCREMENT,
  `name` varchar(100) NOT NULL,
  `username` varchar(100) NOT NULL,
  `email` varchar(150) NOT NULL,
  `password` varchar(100) NOT NULL,
  `lastvisitDate` datetime NOT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `id` (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=2 DEFAULT CHARSET=latin1;

-- Listage des données de la table commune_makther.admin : 1 rows
/*!40000 ALTER TABLE `admin` DISABLE KEYS */;
INSERT INTO `admin` (`id`, `name`, `username`, `email`, `password`, `lastvisitDate`) VALUES
	(1, 'Super admin', 'admin', 'walidhamda91@gmail.com', '988d0e71db936a4d1fe5ae14de8b29ca', '2016-12-15 00:00:00');
/*!40000 ALTER TABLE `admin` ENABLE KEYS */;

-- Listage de la structure de la table commune_makther. appels_offres
CREATE TABLE IF NOT EXISTS `appels_offres` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `titre_fr` text COLLATE utf8mb4_unicode_ci,
  `image` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `description_fr` text COLLATE utf8mb4_unicode_ci,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL,
  `titre_ar` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `description_ar` text COLLATE utf8mb4_unicode_ci,
  `titre_en` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `description_en` text COLLATE utf8mb4_unicode_ci,
  `alt` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `seo_title` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `meta_description` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `meta_keywords` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `status` longtext CHARACTER SET utf8mb4 COLLATE utf8mb4_bin,
  `slug` varchar(150) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `featured` tinyint(4) DEFAULT NULL,
  `pieces_jointes` text COLLATE utf8mb4_unicode_ci,
  `date_fin` date DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `appels_offres_slug_unique` (`slug`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Listage des données de la table commune_makther.appels_offres : ~1 rows (environ)
/*!40000 ALTER TABLE `appels_offres` DISABLE KEYS */;
/*!40000 ALTER TABLE `appels_offres` ENABLE KEYS */;

-- Listage de la structure de la table commune_makther. articles
CREATE TABLE IF NOT EXISTS `articles` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `titre_fr` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `titre_ar` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `titre_en` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `contenu_fr` text COLLATE utf8mb4_unicode_ci,
  `contenu_ar` text COLLATE utf8mb4_unicode_ci,
  `contenu_en` text COLLATE utf8mb4_unicode_ci,
  `fichiers` text COLLATE utf8mb4_unicode_ci,
  `images` text COLLATE utf8mb4_unicode_ci,
  `seo_title` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `meta_description` text COLLATE utf8mb4_unicode_ci,
  `meta_keywords` text COLLATE utf8mb4_unicode_ci,
  `slug` varchar(150) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `status` longtext CHARACTER SET utf8mb4 COLLATE utf8mb4_bin,
  `featured` tinyint(4) DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `articles_slug_unique` (`slug`)
) ENGINE=InnoDB AUTO_INCREMENT=54 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Listage des données de la table commune_makther.articles : ~30 rows (environ)
/*!40000 ALTER TABLE `articles` DISABLE KEYS */;
INSERT INTO `articles` (`id`, `titre_fr`, `titre_ar`, `titre_en`, `contenu_fr`, `contenu_ar`, `contenu_en`, `fichiers`, `images`, `seo_title`, `meta_description`, `meta_keywords`, `slug`, `status`, `featured`, `deleted_at`, `created_at`, `updated_at`) VALUES
	(5, 'Présentation de la ville', 'تقديم المدينة', NULL, NULL, NULL, NULL, '[]', '[]', 'Présentation de la ville', NULL, NULL, 'presentation-de-la-ville', 'PUBLISHED', 0, NULL, '2019-10-04 11:49:39', '2019-12-09 09:27:15'),
	(6, 'Situation géographique', 'الموقع الجغرافي', NULL, NULL, NULL, NULL, '[]', '[]', NULL, NULL, NULL, 'situation-geographique', 'PUBLISHED', 0, NULL, '2019-11-06 10:32:21', '2019-12-09 09:27:44'),
	(7, 'La ville en chiffres', 'المدينة بالأرقام', NULL, NULL, NULL, NULL, '[]', '[]', NULL, NULL, NULL, 'la-ville-en-chiffres', 'PUBLISHED', 0, NULL, '2019-11-06 10:32:42', '2019-12-09 09:27:59'),
	(8, 'Lieux touristiques', 'المواقع السياحية', NULL, NULL, NULL, NULL, '[]', '[]', NULL, NULL, NULL, 'lieux-touristiques', 'PUBLISHED', 0, NULL, '2019-11-06 10:35:25', '2019-11-06 10:35:25'),
	(9, 'Présentation de la mairie', 'تقديم البلدية', NULL, NULL, NULL, NULL, '[]', '[]', NULL, NULL, NULL, 'presentation-de-la-mairie', 'PUBLISHED', 0, NULL, '2019-11-06 10:40:48', '2020-01-13 10:50:29'),
	(10, 'Services municipaux', 'المصالح البلدية', NULL, NULL, NULL, NULL, '[]', '[]', NULL, NULL, NULL, 'services-municipaux', 'PUBLISHED', 0, NULL, '2019-11-06 10:41:13', '2019-11-06 10:41:13'),
	(11, 'Horaire de Travail', 'توقيت العمل', NULL, '<h5 class="uk-module-title-alt">&nbsp;</h5>\r\n<div class="col-md-12">\r\n<div class="col-md-4">\r\n<h5>Horaires d&rsquo;hivers</h5>\r\n<p><strong>Date effet/fin :&nbsp;Du 1er jan. au 30 juin&nbsp;et du 1er sept. au 31 d&eacute;c.</strong></p>\r\n<p><strong>Jours:<br /></strong><strong>Du lundi au jeudi&nbsp;<br /></strong>Matin: De 8h:30 &agrave; 12h&nbsp;:30<br />Apr&eacute;s-midi : De 13h&nbsp;:30 &agrave; 17h&nbsp;:30</p>\r\n<p><strong>Vendredi&nbsp;<br /></strong>Matin: De 8h:30 &agrave; 13h&nbsp;</p>\r\n<p>Apr&eacute;s-midi : De 14h:30 &agrave; 17h&nbsp;:30</p>\r\n</div>\r\n<div class="col-md-4">\r\n<h5>Horaires d\'&eacute;t&eacute;</h5>\r\n<p><strong>Date effet/fin :&nbsp;Du 1er juil. au 31 aout.</strong></p>\r\n<p><strong>Jours:&nbsp;</strong></p>\r\n<p><strong>Du lundi au jeudi&nbsp;<br /></strong>De 7h:30 &agrave; 14h</p>\r\n<p><strong>Vendredi</strong></p>\r\n<p>De 7h:30 &agrave; 13h</p>\r\n</div>\r\n<div class="col-md-4">\r\n<h5>Mois de Ramadan</h5>\r\n<p><strong>Du lundi au jeudi&nbsp;<br /></strong>De 7h:30 &agrave; 14h</p>\r\n<p><strong>Vendredi</strong></p>\r\n<p>De 7h:30 &agrave; 13h</p>\r\n</div>\r\n</div>', '<h5 class="uk-module-title-alt">&nbsp;</h5>\r\n<div class="col-md-12">\r\n<div class="col-md-4">\r\n<div class="uk-width-medium-1-3">\r\n<h5 class="uk-module-title-alt">التوقيت الشتوي</h5>\r\n<ul style="list-style-type: square;">\r\n<li style="font-weight: 300;">&nbsp;من الاثنين إلى الخميس :</li>\r\n</ul>\r\n<p>الحصة الصباحية:&nbsp; من س 8.30 إلى س 12.30</p>\r\n<p style="font-weight: 300;">الحصة المسائية:&nbsp; من س 13.30 إلى س 17.30</p>\r\n<ul style="list-style-type: square;">\r\n<li style="font-weight: 300;">&nbsp;الجمعة :</li>\r\n</ul>\r\n<p>الحصة الصباحية :&nbsp;من س 8.00 إلى س 13.00</p>\r\n<p>الحصة المسائية : من س 14.30 إلى س 17.30</p>\r\n</div>\r\n</div>\r\n<div class="col-md-4">\r\n<div class="uk-width-medium-1-3">\r\n<h5 class="uk-module-title-alt">التوقيت الصيفي</h5>\r\n<ul style="list-style-type: square;">\r\n<li style="font-weight: 300;">من الاثنين إلى الخميس :</li>\r\n</ul>\r\n<p>حصة واحدة :&nbsp;من س 7.30 إلى س 14.00</p>\r\n<ul style="list-style-type: square;">\r\n<li style="font-weight: 300;">&nbsp;الجمعة :</li>\r\n</ul>\r\n<p>حصة واحدة :&nbsp;من س 7.30 إلى س 13.00</p>\r\n</div>\r\n</div>\r\n<div class="col-md-4">\r\n<div class="uk-width-medium-1-3 uk-row-first">\r\n<h5 class="uk-module-title-alt">التوقيت خلال شهر رمضان</h5>\r\n<ul style="list-style-type: square;">\r\n<li style="font-weight: 300;">&nbsp;من الاثنين إلى الخميس :</li>\r\n</ul>\r\n<p>حصة واحدة :&nbsp;من س 8.00 إلى س 14.30</p>\r\n<ul style="list-style-type: square;">\r\n<li style="font-weight: 300;">&nbsp;الجمعة :</li>\r\n</ul>\r\n<p>حصة واحدة :&nbsp;من س 7.30 إلى س 13.00</p>\r\n<p>&nbsp;</p>\r\n</div>\r\n</div>\r\n</div>', NULL, '[]', '[]', NULL, NULL, NULL, 'horaire-de-travail', 'PUBLISHED', 0, NULL, '2019-11-06 10:42:28', '2019-11-06 10:54:20'),
	(12, 'Légalisation de signature', 'التعريف بالامضاء', NULL, '<p>&nbsp;</p>\r\n<ul>\r\n<li>\r\n<h5><span style="color: #ff0000;"><span style="font-family: Consolas, \'Lucida Console\', \'Courier New\', monospace; white-space: pre-wrap;">Formalit&eacute;s-obligatoires</span></span></h5>\r\n</li>\r\n</ul>\r\n<p><span style="font-family: \'Varela Round\'; font-size: 16px;">Le document est pr&eacute;sent&eacute; personnellement par l\'int&eacute;ress&eacute; aux agents du service de l\'Etat civil. Seul est exempt de cette obligation quiconque a d&eacute;pos&eacute; un sp&eacute;cimen de sa signature suivant les formalit&eacute;s ci-dessous d&eacute;sign&eacute;es.</span></p>\r\n<ul>\r\n<li>\r\n<h5><span style="color: #ff0000;"><span style="font-family: Consolas, \'Lucida Console\', \'Courier New\', monospace; white-space: pre-wrap;">Pi&egrave;ces d\'identit&eacute;s &agrave; pr&eacute;senter</span></span></h5>\r\n</li>\r\n</ul>\r\n<p>La l&eacute;galisation de signature est effectu&eacute;e apr&egrave;s pr&eacute;sentation de l\'une des pi&egrave;ces d\'identit&eacute; officielles suivantes en cours de validit&eacute;:</p>\r\n<ul>\r\n<li style="list-style-type: none;">\r\n<ul>\r\n<li>La carte d\'identit&eacute; nationale.</li>\r\n<li>La carte d\'identit&eacute; r&eacute;serv&eacute;e aux &eacute;trangers et d&eacute;livr&eacute;e par la direction de la s&ucirc;ret&eacute; nationale.</li>\r\n<li>Le passeport</li>\r\n</ul>\r\n</li>\r\n<li>\r\n<h5><span style="color: #ff0000;"><span style="font-family: Consolas, \'Lucida Console\', \'Courier New\', monospace; white-space: pre-wrap;">Le sp&eacute;cimen de signature</span></span></h5>\r\n</li>\r\n</ul>\r\n<table class="table-relation" style="width: 800px; border-style: solid; border-color: #000000; margin-left: auto; margin-right: auto; height: 169px;" border="1" align="center">\r\n<tbody>\r\n<tr class="table-TitreRelation" style="height: 13px;">\r\n<td style="width: 549px; height: 13px; text-align: center;"><span style="color: #000000;"><strong>Nombre de copies</strong></span></td>\r\n<td style="width: 235px; height: 13px; text-align: center;"><span style="color: #000000;"><strong>Taxe</strong></span></td>\r\n</tr>\r\n<tr style="height: 52px;">\r\n<td style="width: 549px; height: 52px; text-align: center;">jusqu\'&agrave; un maximum de 3 copies de la m&ecirc;me pi&egrave;ce</td>\r\n<td style="width: 235px; height: 52px; text-align: center;">1 Signature = 0,500 D<br />2 Signatures = 1,000 D<br />3 Signatures = 1,500 D<br />4 Signatures = 2,000 D</td>\r\n</tr>\r\n<tr style="height: 52px;">\r\n<td style="width: 549px; height: 52px; text-align: center;">de 4 &agrave; 6 copies de la m&ecirc;me pi&egrave;ce</td>\r\n<td style="width: 235px; height: 52px; text-align: center;">1 Signature = 1,000 D<br />2 Signatures = 2,000 D<br />3 Signatures = 3,000 D<br />4 Signatures = 4,000 D</td>\r\n</tr>\r\n<tr style="height: 52px;">\r\n<td style="width: 549px; height: 52px; text-align: center;">de 7 &agrave; 9 copies de la m&ecirc;me pi&egrave;ce</td>\r\n<td style="width: 235px; height: 52px; text-align: center;">1 Signature = 1,500 D<br />2 Signatures = 3,000 D<br />3 Signatures = 4,500 D<br />4 Signatures = 6,000 D</td>\r\n</tr>\r\n</tbody>\r\n</table>\r\n<ul>\r\n<li>\r\n<h5><span style="color: #ff0000;"><span style="font-family: Consolas, \'Lucida Console\', \'Courier New\', monospace; white-space: pre-wrap;">Taxes et redevances</span></span></h5>\r\n</li>\r\n</ul>\r\n<p>Tout particulier qui demande fr&eacute;quemment la l&eacute;galisation de sa signature peut en d&eacute;poser personnellement le sp&eacute;cimen aupr&egrave;s du service de l\'&eacute;tat civil.</p>\r\n<ul>\r\n<li>\r\n<h5><span style="color: #ff0000;"><span style="font-family: Consolas, \'Lucida Console\', \'Courier New\', monospace; white-space: pre-wrap;">Notes</span></span></h5>\r\n</li>\r\n</ul>\r\n<p><span style="color: #000000;"><strong>N.B :&nbsp;</strong></span></p>\r\n<p><span style="color: #000000;">La l&eacute;galisation de signature est interdite en ce qui concerne les documents contraires aux bonnes moeurs ou portant atteinte &agrave; l\'ordre public. Les documents administratifs pr&eacute;sent&eacute;s par les services de l\'&eacute;tat, des collectivit&eacute;s locales et des &eacute;tablissements publics &agrave; caract&egrave;re administratif sont exempt&eacute;s du payement des redevances.</span></p>', '<p>&nbsp;</p>\r\n<ul>\r\n<li>\r\n<h5><span style="color: #ff0000;">المراجع التشريعية و الترتيبية</span></h5>\r\n</li>\r\n</ul>\r\n<ol>\r\n<li style="list-style-type: none;">\r\n<ol>\r\n<li>القانون عدد 103 لسنة 1994 المؤرخ في غرة أوت 1994 المتعلق بتنظيــــم التعريف بالإمضاء والإشهاد بمطابقة النسخ للأصل كما وقع تنقيحه و إتمامه بالقانون عدد 19 لسنة 1999 المؤرخ في غرة مارس 1999</li>\r\n<li>القانون عدد 27 لسنــة 1993 المؤرخ في 22 مارس 1993 المتعلـق ببطاقة التعريــف الوطنيـــة كما وقــع تنقيحــه وإتمامــه بالقانــون عــــدد 18 لسنـــة 1999 المــؤرخ فــــي غرة مارس 1999</li>\r\n<li>الأمر عدد 1968 لسنة 1994 المؤرخ في 26 سبتمبر 1994 المتعلق بضبط قائمة</li>\r\n</ol>\r\n</li>\r\n</ol>\r\n<ul>\r\n<li>\r\n<h5><span style="color: #ff0000;">الوثائق الرسمية المعتمدة للتعريف بالإمضاء</span></h5>\r\n</li>\r\n</ul>\r\n<ol>\r\n<li style="list-style-type: none;">\r\n<ol>\r\n<li>الأمر عدد 1969 لسنة 1994 المؤرخ في 26 سبتمبر 1994 المتعلق بضبط تعريفة المعلوم المستخلص مقابل التعريف بالإمضاء والإشهاد بمطابقة النسخ للأصل</li>\r\n<li>الفصل 378 من مجلة الحقوق العينية.</li>\r\n<li>قرار وزير الداخلية المؤرخ في 16 ديسمبر 1995</li>\r\n</ol>\r\n</li>\r\n</ol>\r\n<ul>\r\n<li>\r\n<h5><span style="color: #ff0000;">شـــروط الانتفـــاع بالخدمــــة</span></h5>\r\n</li>\r\n</ul>\r\n<ol>\r\n<li style="list-style-type: none;">\r\n<ol>\r\n<li>أن تكون الوثيقة المقدمة للتعريف بالإمضاء\r\n<ul>\r\n<li>- غير منافية للأخلاق وغير مخلة بالنظام العام</li>\r\n<li>- محررة باللغة العربية أو بلغة مستعملة عموما بالإدارة</li>\r\n</ul>\r\n</li>\r\n<li>أن تتوفر في طالب الخدمة الشروط القانونية فيما يتعلق بالأهلية القانونية للإمضاء</li>\r\n<li>أن يكون حاملا لوثيقة رسمية تثبت هويته ( بطاقة تعريف وطنية أو جواز سفر ساري المفعول)</li>\r\n<li>أن يحضر ويمضي بنفسه أمام العون (باستثناء حالات الإمضاء المودعة بدفاتر البلدية(</li>\r\n<li>دفع المعلوم الموظف</li>\r\n</ol>\r\n</li>\r\n</ol>\r\n<ul>\r\n<li>\r\n<h5><span style="color: #ff0000;">الوثائــــق المطلوبــــة</span></h5>\r\n<ul>\r\n<li>الوثيقة المراد التعريف بها</li>\r\n<li>الوثيقة الرسمية لإثبات الهوية (بطاقة التعريف، جواز سفر)</li>\r\n</ul>\r\n</li>\r\n<li>\r\n<h5><span style="color: #ff0000;">مكـــــان إيــــداع الملــــف</span></h5>\r\n<ul>\r\n<li>قسم الحالة المدنية بالبلدية أو بالدائرة البلدية</li>\r\n<li>المعتمدية خارج المنطقة البلدية</li>\r\n</ul>\r\n</li>\r\n<li>\r\n<h5><span style="color: #ff0000;">أجل الحصول على الخدمة</span></h5>\r\n<ul>\r\n<li>فــــــورا</li>\r\n</ul>\r\n</li>\r\n<li>\r\n<h5><span style="color: #ff0000;">ملاحظــــات</span></h5>\r\n<ol>\r\n<li>تتم للأشخاص الأميين وغير القادرين على الإمضاء تلاوة الكتب عليهم بمحضر شاهدين من أهل الثقة مصحوبين ببطاقة التعريف والتنصيص على ذلك بالدفتر.</li>\r\n<li>الوثائق المقدمة من طرف مصالح الدولة والمؤسسات العمومية ذات الصبغة الإدارية معفية من دفع المعلوم المستوجب.</li>\r\n<li>التعريف بالإمضاء على الوثائق الخاصة بالتبرع بالأعضاء البشرية أو بالتراجع فيه تتم مجانا.</li>\r\n</ol>\r\n</li>\r\n</ul>', NULL, '[]', '[]', NULL, NULL, NULL, 'legalisation-de-signature', 'PUBLISHED', 0, NULL, '2019-11-06 11:03:47', '2019-11-06 14:54:30'),
	(13, 'Certification des copies', 'الإشهاد بمطابقة النسخ للأصل', NULL, '<h5><span style="font-family: Consolas, \'Lucida Console\', \'Courier New\', monospace; white-space: pre-wrap; color: #ff0000;">Formalit&eacute;s obligatoires</span></h5>\r\n<p>Le demandeur de cette prestation doit pr&eacute;senter aux agents de service de l\'&eacute;tat civil un original de chaque copie &agrave; certifier. Ces derniers sont obligatoirement tenus de s\'assurer de la conformit&eacute; totale de la copie &agrave; son original.</p>\r\n<h5><span style="color: #ff0000; font-family: Consolas, \'Lucida Console\', \'Courier New\', monospace; white-space: pre-wrap;">Taxes et redevances</span></h5>\r\n<p>La certification de conformit&eacute; des copies &agrave; l\'original est soumise &agrave; des redevances. Le montant de ces taxes est fix&eacute; comme suit:</p>\r\n<table class="table-relation" style="height: 52px; width: 784px; border-color: #000000; border-style: solid; margin-left: auto; margin-right: auto;" border="1" align="center">\r\n<tbody>\r\n<tr style="height: 13px;">\r\n<td class="table-TitreRelation" style="height: 13px; width: 554px; text-align: center;"><span style="color: #000000;"><strong>Nombre de copies</strong></span></td>\r\n<td class="table-TitreRelation" style="height: 13px; width: 214px; text-align: center;"><strong><span style="color: #000000;">Taxe</span></strong></td>\r\n</tr>\r\n<tr style="height: 13px;">\r\n<td style="height: 13px; width: 554px; text-align: center;">Par acte de certification et jusqu\'&agrave; un maximum de 3 copies de la m&ecirc;me pi&egrave;ce</td>\r\n<td style="height: 13px; width: 214px; text-align: center;">0,500 D</td>\r\n</tr>\r\n<tr style="height: 13px;">\r\n<td style="height: 13px; width: 554px; text-align: center;">de 4 &agrave; 6 copies</td>\r\n<td style="height: 13px; width: 214px; text-align: center;">1,000 D</td>\r\n</tr>\r\n<tr style="height: 13px;">\r\n<td style="height: 13px; width: 554px; text-align: center;">de 7 &agrave; 9 copies</td>\r\n<td style="height: 13px; width: 214px; text-align: center;">1,500 D</td>\r\n</tr>\r\n</tbody>\r\n</table>\r\n<h5><span style="color: #ff0000; font-family: Consolas, \'Lucida Console\', \'Courier New\', monospace; white-space: pre-wrap;">Notes</span></h5>\r\n<p>La certification de conformit&eacute; des copies &agrave; l\'original est interdite en ce qui concerne les documents contraires aux bonnes moeurs ou portant atteinte &agrave; l\'ordre public.</p>\r\n<p>Les documents administratifs pr&eacute;sent&eacute;s par les services de l\'&eacute;tat, des collectivit&eacute;s locales et des &eacute;tablissements publics &agrave; caract&egrave;re administratif sont exempt&eacute;s du payement des redevances.</p>', '<h5><span style="font-family: Consolas, \'Lucida Console\', \'Courier New\', monospace; white-space: pre-wrap; color: #ff0000;">المراجع التشريعية و الترتيبية:</span></h5>\r\n<ol>\r\n<li><span style="color: #000000;">القانون عدد 103 لسنة 1994 المؤرخ في غرة أوت 1994 المتعلـــق بتنظيم التعريـف بالإمضاء والإشهاد بمطابقة النسخ للأصل كما وقع تنقيحه و إتمامه بالقانون عدد 19 لسنة 1999 المؤرخ في غرة مارس 1999</span></li>\r\n<li><span style="color: #000000;">الأمر عــدد 1969 لسنة 1994 المـــؤرخ في 26 سبتمبر 1994 المتعلق بضبط تعريفة المعلوم المستخلص مقابل التعريف بالإمضاء والإشهاد بمطابقة النسخ للأصل.</span></li>\r\n<li><span style="color: #000000;">قرار وزير الداخلية مؤرخ في 16 ديسمبر 1995</span></li>\r\n</ol>\r\n<h5><span style="font-family: Consolas, \'Lucida Console\', \'Courier New\', monospace; white-space: pre-wrap; color: #ff0000;">شـروط الانتفاع بالخدمـة :</span></h5>\r\n<ol>\r\n<li><span style="color: #000000;">أن تكون الوثيقة المقدمة للإشهاد بمطابقة نسخها للأصل غير منافية للأخلاق و غير مخلة بالنظام العام</span></li>\r\n<li><span style="color: #000000;">أن تكون الوثيقة محررة باللغة العربية أو بلغة مستعملة عموما من طرف الإدارة المعنية بالخدمة.</span></li>\r\n<li><span style="color: #000000;">خــلاص المعلــوم المستوجـــب</span></li>\r\n</ol>\r\n<h5><span style="font-family: Consolas, \'Lucida Console\', \'Courier New\', monospace; white-space: pre-wrap; color: #ff0000;">الوثائق المطلوبـة:</span></h5>\r\n<ol>\r\n<li><span style="color: #000000;">الوثيقــــة الأصليـــــــة</span></li>\r\n<li><span style="color: #000000;">النسخ المراد الإشهاد بمطابقتها للأصل</span></li>\r\n<li><span style="color: #000000;">الإستظهار ببطاقة تعريف مقدم الوثيقة</span></li>\r\n</ol>\r\n<h5><span style="font-family: Consolas, \'Lucida Console\', \'Courier New\', monospace; white-space: pre-wrap; color: #ff0000;">مكان إيداع الملف:</span></h5>\r\n<ol>\r\n<li><span style="color: #000000;">البلدية أو الدائرة البلدية</span></li>\r\n<li><span style="color: #000000;">الإدارة السريعـــــــــة</span></li>\r\n<li><span style="color: #000000;">وكالة النهوض بالصناعة</span></li>\r\n<li><span style="color: #000000;">مكتب تسريح السيارات بالديوانة</span></li>\r\n<li><span style="color: #000000;">المعتمدية في المناطق غير البلدية</span></li>\r\n<li><span style="color: #000000;">السفارة أو القنصلية للمقيمين في الخارج.</span></li>\r\n</ol>\r\n<h5><span style="font-family: Consolas, \'Lucida Console\', \'Courier New\', monospace; white-space: pre-wrap; color: #ff0000;">أجل الحصول على الخدمة:</span></h5>\r\n<p><span style="color: #000000;">فــــــورا</span></p>\r\n<h5><span style="font-family: Consolas, \'Lucida Console\', \'Courier New\', monospace; white-space: pre-wrap; color: #ff0000;">ملاحظات:</span></h5>\r\n<p><span style="color: #000000;">الوثائق التي تستوجب مطابقتها للأصل حسب قرار وزير الداخلية والتنمية المحلية هي :</span></p>\r\n<p style="padding-left: 40px;"><span style="color: #000000;">- مختلف الشهادات ذات الطابع العلمي أو المدرسي</span></p>\r\n<p style="padding-left: 40px;"><span style="color: #000000;">- عقود الكراء</span></p>', NULL, '[]', '[]', NULL, NULL, NULL, 'certification-des-copies', 'PUBLISHED', 0, NULL, '2019-11-06 11:04:53', '2019-11-07 11:33:36'),
	(14, 'Naissance', 'ترسيم ولادة', NULL, '<h5><span style="font-family: Consolas, \'Lucida Console\', \'Courier New\', monospace; white-space: pre-wrap; color: #ff0000;">Formalit&eacute;s obligatoires</span></h5>\r\n<p>Vu l&rsquo;importance de cet &eacute;v&eacute;nement, il a &eacute;t&eacute; entour&eacute; d&rsquo;un ensemble de prescriptions en ce qui concerne la d&eacute;claration, le d&eacute;lai et le mode d&rsquo;&eacute;tablissement de l&rsquo;acte de naissance.</p>\r\n<h5><span style="color: #ff0000; font-family: Consolas, \'Lucida Console\', \'Courier New\', monospace; white-space: pre-wrap;">Qui d&eacute;clare ?</span></h5>\r\n<p>L&rsquo;une des personnes suivantes, par ordre de priorit&eacute; d&eacute;croissante, est tenue de d&eacute;clarer la naissance :</p>\r\n<ol>\r\n<li>Le p&egrave;re en premier lieu.</li>\r\n<li>Le m&eacute;decin ou la sage-femme.</li>\r\n<li>Toute personne qui a assist&eacute; &agrave; l&rsquo;accouchement.</li>\r\n<li>Toute autre personne chez laquelle &agrave; accouch&eacute; la femme.</li>\r\n</ol>\r\n<p>Est punie d&rsquo;une peine de 6 mois de prison assortie d&rsquo;une amende, toute personne qui ne d&eacute;clare pas la naissance.</p>\r\n<h5><span style="color: #ff0000; font-family: Consolas, \'Lucida Console\', \'Courier New\', monospace; white-space: pre-wrap;">Quand la d&eacute;claration doit-elle &ecirc;tre faite ?</span></h5>\r\n<p>La d&eacute;claration doit &ecirc;tre faite dans les 10 jours qui suivent l&rsquo;accouchement, sauf autorisation du juge du tribunal de premi&egrave;re instance du lieu de la naissance.</p>\r\n<h5><span style="color: #ff0000; font-family: Consolas, \'Lucida Console\', \'Courier New\', monospace; white-space: pre-wrap;">Qui re&ccedil;oit les d&eacute;clarations ?</span></h5>\r\n<p>Les agents du Service de l&rsquo;&eacute;tat civil.</p>\r\n<h5><span style="color: #ff0000; font-family: Consolas, \'Lucida Console\', \'Courier New\', monospace; white-space: pre-wrap;">Notes</span></h5>\r\n<p>NB:&nbsp;" le mort-n&eacute; n&rsquo;est pas enregistr&eacute; dans le registre des naissances, mais uniquement dans le registre des d&eacute;c&egrave;s ".</p>', '<h5><span style="font-family: Consolas, \'Lucida Console\', \'Courier New\', monospace; white-space: pre-wrap; color: #ff0000;">المراجع التشريعية و الترتيبية:</span></h5>\r\n<ol>\r\n<li><span style="color: #000000;">الفصـول 22 و 23 و 24 و 25 و 27 مـــن القانــــون عـــدد 3 لسنــة 1957 المؤرخ فـي 1 أوت 1957 المتعلق بتنظيم الحالة المدنية كما تم إتمامه و تنقيحـــه بالنصوص اللاحقـــة.</span></li>\r\n<li><span style="color: #000000;">&nbsp;منشور الوزير الأول عدد 15 المؤرخ في 14 فيفري 1989 المتعلق بتبسيط الإجراءات في خصوص وثائق الحالة المدنية.</span></li>\r\n</ol>\r\n<h5><span style="font-family: Consolas, \'Lucida Console\', \'Courier New\', monospace; white-space: pre-wrap; color: #ff0000;">شروط الانتفاع بالخدمة :</span></h5>\r\n<ol>\r\n<li><span style="color: #000000;">يقع الإعلام بالولادة خلال العشرة (10) أيام التي تلي الوضع.</span></li>\r\n<li><span style="color: #000000;">إذا لم يقع الإعلام بالولادة في الأجل القانوني فإنه لايمكن لضابط الحالة المدنية تضمينها بدفاتره إلا بمقتضي إذن صادر عن رئيس المحكمة الابتدائية بالجهة التي ولد بها المولود</span></li>\r\n<li><span style="color: #000000;">يقع الإعلام بالولادة من طرف الأب أو الطبيب أو القابلة أو غيرهم من الأشخاص الذين شهدوا الوضع.</span></li>\r\n</ol>\r\n<h5><span style="font-family: Consolas, \'Lucida Console\', \'Courier New\', monospace; white-space: pre-wrap; color: #ff0000;">الوثائق المطلوبة:</span></h5>\r\n<p><span style="color: #000000;">الإدلاء بالإرشادات المطلوبة ( تاريخ الولادة، مكانها، اسم المولود) و تقديم ملف يحتوي على الوثائق التي تثبت هوية أب وأم المولود و من بينها :</span></p>\r\n<ol>\r\n<li><span style="color: #000000;">&nbsp;بطاقة التعريف الوطنية للأب أو للأم</span></li>\r\n<li><span style="color: #000000;">&nbsp;أو الدفتر العائلي</span></li>\r\n<li><span style="color: #000000;">&nbsp;أو مضمون ولادة أحد الأبناء</span></li>\r\n<li><span style="color: #000000;">&nbsp;مضمون ولادة صادر عن ضابط الحالة المدنية الأجنبي(بالنسبة للمولودين خارج حدود الوطن)</span></li>\r\n</ol>\r\n<h5><span style="font-family: Consolas, \'Lucida Console\', \'Courier New\', monospace; white-space: pre-wrap; color: #ff0000;">مكان إيداع المـف :</span></h5>\r\n<ol>\r\n<li><span style="color: #000000;">قسم الحالة المدنية بالبلدية أو الدائرة البلدية</span></li>\r\n<li><span style="color: #000000;">السفارة أو القنصلية بالنسبة للمولودين بالخارج</span></li>\r\n</ol>\r\n<h5><span style="font-family: Consolas, \'Lucida Console\', \'Courier New\', monospace; white-space: pre-wrap; color: #ff0000;">مكان الحصول على الخدمة :</span></h5>\r\n<ol>\r\n<li><span style="color: #000000;">قسم الحالة المدنية بالبلدية أو الدائرة البلدية</span></li>\r\n<li><span style="color: #000000;">السفارة أو القنصلية بالنسبة للمولودين بالخارج</span></li>\r\n</ol>\r\n<h5><span style="font-family: Consolas, \'Lucida Console\', \'Courier New\', monospace; white-space: pre-wrap; color: #ff0000;">ملاحظات:</span></h5>\r\n<ol>\r\n<li><span style="color: #000000;">الهدف من الإدلاء بالوثائق هو لتفادي الغلط وللحرص على تطابق كتابة ألقاب أفراد العائلة الواحدة.</span></li>\r\n<li><span style="color: #000000;">يجب على العون المكلف بترسيم المولود أن يعيد قراءة بيانات الترسيم بصـــوت واضـــح للتثبت من مطابقة هذه البيانات للواقع.</span></li>\r\n<li><span style="color: #000000;">يجب على القائم بالتصريح أن يمضي على نظيرين من دفتر ترسيم الولادات.</span></li>\r\n</ol>', NULL, '[]', '[]', NULL, NULL, NULL, 'naissance', 'PUBLISHED', 0, NULL, '2019-11-07 09:12:01', '2019-11-07 11:51:38'),
	(15, 'Le décès', NULL, NULL, '<h6><strong><span style="font-family: Consolas, \'Lucida Console\', \'Courier New\', monospace; white-space: pre-wrap; color: #ff0000;">Conditions d&rsquo;obtention de la prestation&nbsp;</span></strong></h6>\r\n<p><span style="color: #000000;">Formulation d&rsquo;une demande orale ou par voie postale aupr&egrave;s de l\'officier d\'&eacute;tat civil :</span></p>\r\n<ul>\r\n<li><span style="color: #000000;">- Paiement des redevances dues (paiement en esp&egrave;ce ou par mandatpostal) au nom de l\'officier d\'&eacute;tat civil avec une enveloppe timbr&eacute;e portant l\'adresse du requ&eacute;rant, si la demande est faite par voie postal.</span></li>\r\n</ul>\r\n<h6><strong><span style="font-family: Consolas, \'Lucida Console\', \'Courier New\', monospace; white-space: pre-wrap; color: #ff0000;">Documents &agrave; fournir</span></strong></h6>\r\n<p><span style="color: #000000;">Fournir des renseignements relatifs &agrave; la date de d&eacute;c&egrave;s (num&eacute;ro, ann&eacute;e, jour et le lieu) ou un ancien extrait de d&eacute;c&egrave;s.</span></p>\r\n<h6><strong><span style="font-family: Consolas, \'Lucida Console\', \'Courier New\', monospace; white-space: pre-wrap; color: #ff0000;">D&eacute;lai</span></strong></h6>\r\n<p><span style="color: #000000;">Imm&eacute;diatement!!</span></p>\r\n<h6><strong><span style="font-family: Consolas, \'Lucida Console\', \'Courier New\', monospace; white-space: pre-wrap; color: #ff0000;">R&eacute;f&eacute;rences l&eacute;gislatives ou r&eacute;glementaires</span></strong></h6>\r\n<ol>\r\n<li><span style="color: #000000;">La circulaire du Premier Ministre n&deg;15 du 14 f&eacute;vrier 1989.</span></li>\r\n<li><span style="color: #000000;">La circulaire du Premier Ministre n&deg;15 du 14 f&eacute;vrier 1989.</span></li>\r\n</ol>\r\n<h6><strong><span style="font-family: Consolas, \'Lucida Console\', \'Courier New\', monospace; white-space: pre-wrap; color: #ff0000;">Proc&eacute;dures de r&eacute;alisation de la prestation</span></strong></h6>\r\n<ol>\r\n<li><span style="color: #000000;">Accueil du citoyen et r&eacute;ception des documents.</span></li>\r\n<li><span style="color: #000000;">R&eacute;daction ou impression d&rsquo;un exemplaire de l&rsquo;extrait de d&eacute;c&egrave;s.</span></li>\r\n<li><span style="color: #000000;">Paiement des droits dus par le citoyen.</span></li>\r\n<li><span style="color: #000000;">Remise de l&rsquo;extrait au citoyen.</span></li>\r\n</ol>\r\n<h6><strong><span style="font-family: Consolas, \'Lucida Console\', \'Courier New\', monospace; white-space: pre-wrap; color: #ff0000;">Service prestataire</span></strong></h6>\r\n<p><span style="color: #000000;">Service de l&rsquo;Etat Civil de la commune ou Arrondissement.</span></p>\r\n<h6><span style="font-family: Consolas, \'Lucida Console\', \'Courier New\', monospace; white-space: pre-wrap; color: #ff0000;"><strong>Lieu du d&eacute;p&ocirc;t de la demande</strong> </span></h6>\r\n<p><span style="color: #000000;">Service de l&rsquo;Etat Civil de la commune ou Arrondissement.</span></p>\r\n<h6><strong><span style="font-family: Consolas, \'Lucida Console\', \'Courier New\', monospace; white-space: pre-wrap; color: #ff0000;">Lieu du d&eacute;p&ocirc;t de la demande </span></strong></h6>\r\n<p><span style="color: #000000;">Service de l&rsquo;Etat Civil de la commune ou Arrondissement.</span></p>\r\n<h6><strong><span style="font-family: Consolas, \'Lucida Console\', \'Courier New\', monospace; white-space: pre-wrap; color: #ff0000;">Lieu d&rsquo;obtention de la prestation</span></strong></h6>\r\n<p><span style="color: #000000;">Service de l&rsquo;Etat Civil de la commune ou Arrondissement.</span></p>', NULL, NULL, '[]', '[]', NULL, NULL, NULL, 'le-deces', 'PUBLISHED', 0, NULL, '2019-11-07 09:47:10', '2019-11-07 10:26:40'),
	(16, 'Le mariage', NULL, NULL, '<p><span style="color: #000000;">Depuis la promulgation du code du statut personnel, le mariage ne peut plus &ecirc;tre dress&eacute; que sur un acte authentique de deux notaires ou d\'un officier d\'Etat Civil. Il est &eacute;galement exig&eacute; la pr&eacute;sence de 2 t&eacute;moins lors de la conclusion du contrat de mariage et l\'approbation du p&egrave;re et de la m&egrave;re pour les mineurs.</span></p>\r\n<h6><span style="color: #ff0000;">Les Conditions</span></h6>\r\n<ol>\r\n<li><span style="color: #000000;">Les deux &eacute;poux doivent &ecirc;tre de sexes diff&eacute;rents.</span></li>\r\n<li><span style="color: #000000;">L\'acceptation des deux &eacute;poux, quelque soit leur &acirc;ge, et ce, devant l\'officier de l\'Etat civil ou devant les notaires.</span></li>\r\n<li><span style="color: #000000;">Avoir l\'&acirc;ge l&eacute;gal de contracter mariage.</span></li>\r\n<li><span style="color: #000000;">Une d&eacute;cision judiciaire si l\'&eacute;poux est &acirc;g&eacute; de moins de vingt ans et l\'&eacute;pouse de moins de 17 ans.</span></li>\r\n<li><span style="color: #000000;">L\'approbation du tuteur pour l\'&eacute;poux &acirc;g&eacute; de moins de vingt ans.</span></li>\r\n<li><span style="color: #000000;">Le tuteur est le plus proche agnat (p&egrave;re, oncle paternel, fr&egrave;re...).</span></li>\r\n<li><span style="color: #000000;">Il doit &ecirc;tre de sexe masculin, sain d\'esprit et majeur.</span></li>\r\n<li><span style="color: #000000;">Il est en premier lieu le p&egrave;re ou celui qu\'il mandate.</span></li>\r\n<li><span style="color: #000000;">Les deux &eacute;poux ne doivent pas se trouver dans un des cas d\'emp&ecirc;chement au mariage ou d\'autres emp&ecirc;chements chor&eacute;iques.</span></li>\r\n</ol>\r\n<h6><span style="color: #ff0000;">Les pi&egrave;ces constitutives du dossier de mariage</span></h6>\r\n<ol>\r\n<li><span style="color: #000000;">Carte d\'identit&eacute; nationale des deux &eacute;poux.</span></li>\r\n<li><span style="color: #000000;">Extrait de naissance pour chacun d\'entre eux, sur lequel figure la mention en vue du mariage.</span></li>\r\n<li><span style="color: #000000;">certificat m&eacute;dical pr&eacute;nuptial.</span></li>\r\n<li><span style="color: #000000;">Autorisation du juge pour l\'homme de moins de 20 ans et pour la femme de moins de 17 ans.</span></li>\r\n<li><span style="color: #000000;">Accord, par acte authentique, du tuteur dans le cas o&ugrave; celui-ci serait absent lors de la conclusion du mariage de l\'un des deux &eacute;poux mineur ou des deux &agrave; la fois.</span></li>\r\n<li><span style="color: #000000;">Extrait du d&eacute;c&egrave;s du conjoint pour les veufs et veuves.</span></li>\r\n<li><span style="color: #000000;">Certificat de mention de divorce d&eacute;livr&eacute; par l\'officier d\'Etat Civil du lieu du mariage ou de naissance.</span></li>\r\n<li><span style="color: #000000;">Carte d\'identit&eacute; nationale des deux t&eacute;moins.</span></li>\r\n<li><span style="color: #000000;">Autorisation administrative si l\'un des &eacute;poux appartient au corps de la force de la s&eacute;curit&eacute; int&eacute;rieure (Garde Nationale, S&ucirc;ret&eacute; de Police, Prison et R&eacute;&eacute;ducation, Protection civile), &agrave; l\'arm&eacute;e, et la douane ou au corps diplomatique.</span></li>\r\n<li><span style="color: #000000;">Une d&eacute;claration relative au r&eacute;gime de la communaut&eacute; des biens entre &eacute;poux.</span></li>\r\n</ol>\r\n<h6><span style="color: #ff0000;">Le mariage des &eacute;trangers</span></h6>\r\n<p><span style="color: #000000;">Lorsqu\'il s\'agit de mariage d\'&eacute;trangers, ils doivent produire un certificat de leur consul certifiant leur capacit&eacute; de contracter mariage et aussi qu\'ils ne sont pas encore li&eacute;s par un pr&eacute;c&eacute;dent mariage.</span></p>\r\n<p><span style="color: #000000;">Etant donn&eacute; que la pratique de la polygamie est encore usit&eacute;e dans diff&eacute;rents pays, le certificat de divorce ou de d&eacute;c&egrave;s du conjoint n\'est pas suffisant.</span></p>', '<div id="accordion" class="panel-group accordion" role="tablist" aria-multiselectable="true">\r\n<div class="panel panel-default">\r\n<div id="headingOne" class="panel-heading" role="tab">\r\n<h4 class="panel-title" style="direction: rtl; text-align: right;"><a class="collapsed" role="button" href="#collapseOne" data-toggle="collapse" data-parent="#accordion" aria-expanded="false" aria-controls="collapseOne"> المراجع التشريعية و الترتيبية</a></h4>\r\n</div>\r\n<div id="collapseOne" class="panel-collapse collapse" style="height: 0px; text-align: right;" role="tabpanel" aria-labelledby="headingOne" aria-expanded="false">\r\n<div class="panel-body">\r\n<ol>\r\n<li style="direction: rtl;"><span style="color: #000000;">- الفصول من 15 إلى 32 من القانون عدد 3 لسنة 1957 المؤرخ في 1 أوت 1957 المتعلق بتنظيم الحالة المدنية كما تم إتمامه و تنقيحه بالنصوص اللاحقة</span></li>\r\n<li style="direction: rtl;"><span style="color: #000000;">- الأمر المؤرخ في 13 أوت 1956 المتعلق بإصدار مجلة الأحوال الشخصية كما تم إتمامه و تنقيحه بالنصوص اللاحقة .</span></li>\r\n<li style="direction: rtl;"><span style="color: #000000;">- القوانين الأساسية الخاصة بالأسلاك النشيطة وأعوان القمارق والجيش الوطني والأعوان الدبلوماسيين</span></li>\r\n</ol>\r\n</div>\r\n</div>\r\n</div>\r\n<div class="panel panel-default" style="text-align: right;">\r\n<div id="headingTwo" class="panel-heading" role="tab">\r\n<h4 class="panel-title" style="direction: rtl;"><a class="collapsed" role="button" href="#collapseTwo" data-toggle="collapse" data-parent="#accordion" aria-expanded="false" aria-controls="collapseTwo">شروط الانتفاع بالخدمة</a></h4>\r\n</div>\r\n<div id="collapseTwo" class="panel-collapse collapse" role="tabpanel" aria-labelledby="headingTwo" aria-expanded="false">\r\n<div class="panel-body">\r\n<ul>\r\n<li style="direction: rtl;"><span style="color: #000000;">-توفر كافة الشروط القانونية لدى الرجل والمرأة لإمكانية الزواج (بلوغ السن القانوني18 سنة أو ترخيص من المحكمة في خلاف ذلك) </span></li>\r\n<li style="direction: rtl;"><span style="color: #000000;">-رضا الزوجين</span></li>\r\n<li style="direction: rtl;"><span style="color: #000000;">-خلوهما من الموانع الشرعية بشهادة شاهدين من أهل الثقة </span></li>\r\n<li style="direction: rtl;"><span style="color: #000000;">- تسمية مهر الزوجة </span></li>\r\n</ul>\r\n</div>\r\n</div>\r\n</div>\r\n<div class="panel panel-default" style="text-align: right;">\r\n<div id="headingThree" class="panel-heading" role="tab">\r\n<h4 class="panel-title" style="direction: rtl;"><a class="collapsed" role="button" href="#collapseThree" data-toggle="collapse" data-parent="#accordion" aria-expanded="false" aria-controls="collapseThree">الوثائق المطلوبة</a></h4>\r\n</div>\r\n<div id="collapseThree" class="panel-collapse collapse" role="tabpanel" aria-labelledby="headingThree" aria-expanded="false">\r\n<div class="panel-body">\r\n<ol>\r\n<li style="direction: rtl;"><span style="color: #000000;">تقديم ملف يحتوى على الوثائق التالية:</span>\r\n<ol>\r\n<li style="direction: rtl;"><span style="color: #000000;">مضمون ولادة لكل من الزوجين</span></li>\r\n<li style="direction: rtl;"><span style="color: #000000;">شهادة طبية لإتمام الزواج</span></li>\r\n<li style="direction: rtl;"><span style="color: #000000;">نسخة من بطاقة التعريف أو جواز سفر ساري المفعول تثبت هوية كل من الزوجين</span></li>\r\n<li style="direction: rtl;"><span style="color: #000000;">إذن من المحكمة لمن هم دون السن القانوني</span></li>\r\n<li style="direction: rtl;"><span style="color: #000000;">موافقة كتابية معرف بها من الولي في صورة عدم حضوره مراسم إبرام العقد وذلك بالنسبة للحالات التي يكون فيها أحد الزوجين أو كلاهما غير بالغ لسن الرشد القانوني</span></li>\r\n<li style="direction: rtl;"><span style="color: #000000;">مضمون وفاة الزوج أو الزوجة بالنسبة للأرامل</span></li>\r\n<li style="direction: rtl;"><span style="color: #000000;"> مضمون ولادة منصوص به على الطلاق ( بالنسبة للمطلق أو المطلقة)</span></li>\r\n<li style="direction: rtl;"><span style="color: #000000;">توكيل لإبرام عقد الزواج عند الاقتضاء</span></li>\r\n<li style="direction: rtl;"><span style="color: #000000;">ترخيص من الإدارة بالنسبة للمنتمين إلى قوات الأمن الداخلي ( الشرطة الوطنية، وأعوان الحرس الوطني) وأعوان الحماية المدنية، و أعوان الديوانة والعسكريين وأعوان السلك الديبلوماسي</span></li>\r\n<li style="direction: rtl;"><span style="color: #000000;">شهادة من القنصلية أو السفارة في إمكانية إبرام عقد الزواج بالنسبة للأجانب</span></li>\r\n<li style="direction: rtl;"><span style="color: #000000;">شهادة في اعتناق الدين الإسلامي لغير المسلمين الراغبين في التزوج بتونسية مسلمة</span></li>\r\n<li style="direction: rtl;"><span style="color: #000000;">شهادة في عدم الارتباط بأي علاقة زوجية بالنسبة للأجانب</span></li>\r\n<li style="direction: rtl;"><span style="color: #000000;"> الاستظهار ببطاقة التعريف بالنسبة للشاهدين(مع وجوب توفر الشروط القانونية لكلا الشاهدين)</span></li>\r\n<li style="direction: rtl;"><span style="color: #000000;"> تعميـر وإمضـاء وثيقـة اختيار نظام الاشتراك أوعدم الاشتراك في الأملاك بين الزوجين ( اختياري)</span></li>\r\n</ol>\r\n</li>\r\n<li style="direction: rtl;"><span style="color: #000000;">تقرير المصالح الأمنية إن كانت الموت في ظروف غير عادية تثير الشك </span></li>\r\n</ol>\r\n</div>\r\n</div>\r\n</div>\r\n<div class="panel panel-default" style="text-align: right;">\r\n<div id="headingFour" class="panel-heading" role="tab">\r\n<h4 class="panel-title" style="direction: rtl;"><a class="collapsed" role="button" href="#collapseFour" data-toggle="collapse" data-parent="#accordion" aria-expanded="false" aria-controls="collapseFour"> مكــان إيـداع الملــف</a></h4>\r\n</div>\r\n<div id="collapseFour" class="panel-collapse collapse" style="height: 0px;" role="tabpanel" aria-labelledby="headingFour" aria-expanded="false">\r\n<div class="panel-body">\r\n<ol>\r\n<li style="direction: rtl;"><span style="color: #000000;"> قسم الحالة المدنية بالبلدية أو بالدائرة البلدية</span></li>\r\n</ol>\r\n</div>\r\n</div>\r\n</div>\r\n<div class="panel panel-default" style="text-align: right;">\r\n<div id="headingFive" class="panel-heading" role="tab">\r\n<h4 class="panel-title" style="direction: rtl;"><a class="collapsed" role="button" href="#collapseFive" data-toggle="collapse" data-parent="#accordion" aria-expanded="false" aria-controls="collapseFive">مكان الحصول على الخدمة</a></h4>\r\n</div>\r\n<div id="collapseFive" class="panel-collapse collapse" style="height: 0px;" role="tabpanel" aria-labelledby="headingFive" aria-expanded="false">\r\n<div class="panel-body">\r\n<ul>\r\n<li style="direction: rtl;"><span style="color: #000000;"> قسم الحالة المدنية بالبلدية أو بالدائرة البلدية</span></li>\r\n</ul>\r\n</div>\r\n</div>\r\n</div>\r\n<div class="panel panel-default" style="text-align: right;">\r\n<div id="headingSix" class="panel-heading" role="tab">\r\n<h4 class="panel-title" style="direction: rtl;"><a class="collapsed" role="button" href="#collapseSix" data-toggle="collapse" data-parent="#accordion" aria-expanded="false" aria-controls="collapseSix">أجل الحصول على الخدمة</a></h4>\r\n</div>\r\n<div id="collapseSix" class="panel-collapse collapse" style="height: 0px;" role="tabpanel" aria-labelledby="headingSix" aria-expanded="false">\r\n<div class="panel-body">\r\n<ul>\r\n<li style="direction: rtl;"><span style="color: #000000;">فورا</span></li>\r\n</ul>\r\n</div>\r\n</div>\r\n</div>\r\n<div class="panel panel-default" style="text-align: right;">\r\n<div id="headingSeven" class="panel-heading" role="tab">\r\n<h4 class="panel-title" style="direction: rtl;"><a class="collapsed" role="button" href="#collapseSeven" data-toggle="collapse" data-parent="#accordion" aria-expanded="false" aria-controls="collapseSeven"> ملاحظــــات</a></h4>\r\n</div>\r\n<div id="collapseSeven" class="panel-collapse collapse" style="height: 0px;" role="tabpanel" aria-labelledby="headingSeven" aria-expanded="false">\r\n<div class="panel-body">\r\n<ul>\r\n<li style="text-align: right;">يتوجب على الأطراف المعنية ( الزوجان أو من ينوبهما بمقتضى توكيل رسمي)&nbsp;</li>\r\n</ul>\r\n<p style="text-align: right;">-&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;تقديم طلب إلى ضابط الحالة المدنية،&nbsp;</p>\r\n<p style="text-align: right;">-&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;تقديم الوثائق اللازمة،&nbsp;</p>\r\n<p style="text-align: right;">-&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;تعيين موعد لعقد الزواج،&nbsp;</p>\r\n<ul>\r\n<li style="text-align: right;">يقوم كل من الشاهدين وضابط الحالة المدنية علاوة على الزوجين بالإمضاء على عقد الزواج.</li>\r\n</ul>\r\n<p dir="rtl" style="font-weight: 300; text-align: right;">&nbsp;</p>\r\n</div>\r\n</div>\r\n</div>\r\n</div>', NULL, '[]', '[]', NULL, NULL, NULL, 'le-mariage', 'PUBLISHED', 0, NULL, '2019-11-07 10:27:17', '2019-11-08 09:51:01'),
	(17, 'Les extraits d\'état civil', NULL, NULL, '<p><span style="color: #000000;">L&rsquo;obtention de copie conforme &agrave; l&rsquo;acte ou la consultation directe du registre par des tiers pouvant causer un pr&eacute;judice moral au titulaire de l&rsquo;acte ou des ayants-droit, pour y pallier, le l&eacute;gislateur a d&eacute;fini les conditions d&rsquo;obtention des documents d&rsquo;Etat civil.</span></p>\r\n<h5><span style="color: #ff0000;">Obtention des documents d&rsquo;Etat civil</span></h5>\r\n<p><span style="color: #000000;">Il est possible d&rsquo;obtenir des copies de l&rsquo;acte ou des extraits de cet acte, selon la qualit&eacute; du demandeur.</span></p>\r\n<p><span style="color: #000000;">Seul le titulaire de l&rsquo;acte, ses ascendants ou descendants en ligne directe, son conjoint ni divorc&eacute; ni s&eacute;par&eacute;, ou son tuteur, ou repr&eacute;sentant l&eacute;gal s\'il est mineur ou en &eacute;tat d\'incapacit&eacute;, ou le Procureur de la R&eacute;publique peuvent avoir une seule copie conforme ou un extrait des actes de l\'&eacute;tat civil (naissance, mariage, d&eacute;c&egrave;s). Une autorisation du juge est n&eacute;cessaire pour toute autre personne.</span></p>', NULL, NULL, '[]', '[]', NULL, NULL, NULL, 'les-extraits-d-etat-civil', 'PUBLISHED', 0, NULL, '2019-11-07 10:37:54', '2019-11-07 10:37:54'),
	(18, 'Réctification des actes d’état civil', 'التنصيص على رسم من الحالة المدنية', NULL, '<p><span style="color: #000000;">L&rsquo;officier d&rsquo;Etat civil ne peut rectifier un acte sauf sur autorisation du juge du tribunal de premi&egrave;re instance du lieu de r&eacute;daction de l&rsquo;acte. Pour les actes dress&eacute;s par les agents diplomatiques et les consuls, c&rsquo;est le tribunal de premi&egrave;re instance de Tunis qui est comp&eacute;tent.</span></p>\r\n<h6><span style="color: #ff0000;"><strong>Proc&eacute;dure :</strong></span></h6>\r\n<p><span style="color: #000000;">Le jugement de rectification est adress&eacute; par le procureur de la R&eacute;publique pr&egrave;s le tribunal &agrave; l&rsquo;officier de l&rsquo;Etat civil, pour que mention soit faite.</span></p>', NULL, NULL, '[]', '[]', NULL, NULL, NULL, 'rectification-des-actes-d-etat-civil', 'PUBLISHED', 0, NULL, '2019-11-07 10:39:52', '2019-11-08 09:52:01'),
	(19, 'Le livret de famille', 'الدفتر العائلي', NULL, '<p><span style="color: #000000;">Il constitue pour le chef de famille le document auquel il se r&eacute;f&egrave;re toutes les fois qu&rsquo;il y a lieu de produire une pi&egrave;ce d&rsquo;&eacute;tat civil concernant chacun des membres de la famille.</span></p>\r\n<h6><span style="color: #ff0000;"><strong>Qui le d&eacute;livre ?</strong></span></h6>\r\n<p><span style="color: #000000;">L&rsquo;Officier de l&rsquo;&eacute;tat civil du lieu de mariage, pour ceux qui ont contract&eacute; mariage apr&egrave;s le 01/08/1957. L&rsquo;Officier de l&rsquo;&eacute;tat civil du lieu de naissance de l&rsquo;&eacute;poux, pour ceux qui ont contract&eacute; mariage avant la publication de la loi de l&rsquo;&eacute;tat civil.</span></p>\r\n<h6><span style="color: #ff0000;"><strong>A qui le d&eacute;livre t-on ?</strong></span></h6>\r\n<ol>\r\n<li><span style="color: #000000;">Au chef de famille.</span></li>\r\n<li><span style="color: #000000;">A la divorc&eacute;e, si elle n&rsquo;est pas remari&eacute;e.</span></li>\r\n<li><span style="color: #000000;">A la veuve qui doit le garder, sauf d&eacute;cision judiciaire contraire.</span></li>\r\n</ol>\r\n<h6><span style="color: #ff0000;"><strong>Pi&egrave;ces N&eacute;cessaires</strong></span></h6>\r\n<ol>\r\n<li><span style="color: #000000;">Photo du chef de famille.</span></li>\r\n<li><span style="color: #000000;">Extrait de mariage.</span></li>\r\n<li><span style="color: #000000;">Extrait de naissance du conjoint.</span></li>\r\n<li><span style="color: #000000;">Extrait de naissance du reste de la famille, en cas d&rsquo;extrait d&rsquo;un duplicata.</span></li>\r\n<li><span style="color: #000000;">Extrait de d&eacute;c&egrave;s, en cas de remise de carnet &agrave; la m&egrave;re.</span></li>\r\n<li><span style="color: #000000;">Copie du jugement de divorce, pour la femme qui a la garde des enfants.</span></li>\r\n</ol>\r\n<h6><span style="color: #ff0000;"><strong>Delai</strong></span></h6>\r\n<p><span style="color: #000000;">Le livret de famille est d&eacute;livr&eacute; imm&eacute;diatement, si le mariage a &eacute;t&eacute; contract&eacute; &agrave; la mairie.</span></p>\r\n<h6><span style="color: #ff0000;"><strong>Notes</strong></span></h6>\r\n<p><strong><span style="color: #000000;">NB :</span></strong></p>\r\n<p><span style="color: #000000;">Il n&rsquo;est permis &agrave; aucune personne autre que l&rsquo;officier de l&rsquo;&eacute;tat civil d&ucirc;ment habilit&eacute; de porter une observation ou une mention quelconque sur le livret de famille. Celui-ci n&rsquo;est d&eacute;livr&eacute; qu\'aux Tunisiens.</span></p>', '<div id="accordion" class="panel-group accordion" role="tablist" aria-multiselectable="true">\r\n<div class="panel panel-default">\r\n<div id="headingOne" class="panel-heading" role="tab">\r\n<h4 class="panel-title" style="direction: rtl; text-align: right;"><a class="collapsed" role="button" href="#collapseOne" data-toggle="collapse" data-parent="#accordion" aria-expanded="false" aria-controls="collapseOne"> المراجع التشريعية و الترتيبية:</a></h4>\r\n</div>\r\n<div id="collapseOne" class="panel-collapse collapse" style="height: 0px; text-align: right;" role="tabpanel" aria-labelledby="headingOne" aria-expanded="false">\r\n<div class="panel-body">\r\n<p dir="rtl">&nbsp;- القانون عدد 28 لسنة 1967 المؤرخ في 30 جوان 1967 المتعلق بإحداث الدفتر العائلي كما تم إتمامه و تنقيحه بالنصوص اللاحقة</p>\r\n<p dir="rtl">- منشور الوزير الأول عدد 15 المؤرخ في 14 فيفري 1989 المتعلق بتبسيط الإجراءات في خصوص وثائق الحالة المدنية.</p>\r\n</div>\r\n</div>\r\n</div>\r\n<div class="panel panel-default" style="text-align: right;">\r\n<div id="headingTwo" class="panel-heading" role="tab">\r\n<h4 class="panel-title" style="direction: rtl;"><a class="collapsed" role="button" href="#collapseTwo" data-toggle="collapse" data-parent="#accordion" aria-expanded="false" aria-controls="collapseTwo">شروط الانتفاع بالخدمة</a></h4>\r\n</div>\r\n<div id="collapseTwo" class="panel-collapse collapse" role="tabpanel" aria-labelledby="headingTwo" aria-expanded="false">\r\n<div class="panel-body">\r\n<p dir="rtl"><strong>&nbsp;</strong>- أن يكون طالب الخدمة تونسيا ومتزوجا</p>\r\n<p dir="rtl">- يخول طلب الدفتر العائلي من طرف : رئيس العائلة، المطلقة إذا لم تتزوج ثانية، الأرملة التي تبقي مؤتمنة عليه إذا لم يصدر حكم مخالف لذلك.</p>\r\n<p dir="rtl">- يجب أن يكون عقد الزواج مبرما في دائرة مرجع النظر الترابي للبلدية سواء من طرف البلدية أو من عدول الإشهاد.</p>\r\n</div>\r\n</div>\r\n</div>\r\n<div class="panel panel-default" style="text-align: right;">\r\n<div id="headingThree" class="panel-heading" role="tab">\r\n<h4 class="panel-title" style="direction: rtl;"><a class="collapsed" role="button" href="#collapseThree" data-toggle="collapse" data-parent="#accordion" aria-expanded="false" aria-controls="collapseThree">الوثائق المطلوبة</a></h4>\r\n</div>\r\n<div id="collapseThree" class="panel-collapse collapse" role="tabpanel" aria-labelledby="headingThree" aria-expanded="false">\r\n<div class="panel-body">\r\n<p dir="rtl">&nbsp;تقديم ملف يحتوى على الوثائق التالية :</p>\r\n<p dir="rtl">&nbsp;- صورة شمسية لرئيس العائلة،</p>\r\n<p dir="rtl">&nbsp;- نسخة من بطاقة التعريف الوطنية للزوج،</p>\r\n<p dir="rtl">- مضمون زواج،</p>\r\n<p dir="rtl">&nbsp;- مضمون ولادة لكل من الزوجين،</p>\r\n<p dir="rtl">&nbsp;- مضامين لبقية أفراد العائلة (في حالة استخراج الدفتر بعد مدة من الزواج(،</p>\r\n<p dir="rtl">&nbsp;- المعلوم الموظف على الدفتر العائلي،</p>\r\n</div>\r\n</div>\r\n</div>\r\n<div class="panel panel-default" style="text-align: right;">\r\n<div id="headingFour" class="panel-heading" role="tab">\r\n<h4 class="panel-title" style="direction: rtl;"><a class="collapsed" role="button" href="#collapseFour" data-toggle="collapse" data-parent="#accordion" aria-expanded="false" aria-controls="collapseFour"> مكــان إيـداع الملــف:</a></h4>\r\n</div>\r\n<div id="collapseFour" class="panel-collapse collapse" style="height: 0px;" role="tabpanel" aria-labelledby="headingFour" aria-expanded="false">\r\n<div class="panel-body">\r\n<p dir="rtl">&nbsp;- قسم الحالة المدنية بالبلدية أو بالدائرة البلدية</p>\r\n<p dir="rtl">&nbsp;-السفارة أو القنصلية</p>\r\n<p dir="rtl">&nbsp;- المعتمدية خارج المناطق البلدية</p>\r\n</div>\r\n</div>\r\n</div>\r\n<div class="panel panel-default" style="text-align: right;">\r\n<div id="headingFive" class="panel-heading" role="tab">\r\n<h4 class="panel-title" style="direction: rtl;"><a class="collapsed" role="button" href="#collapseFive" data-toggle="collapse" data-parent="#accordion" aria-expanded="false" aria-controls="collapseFive">مكان الحصول على الخدمة :</a></h4>\r\n</div>\r\n<div id="collapseFive" class="panel-collapse collapse" style="height: 0px;" role="tabpanel" aria-labelledby="headingFive" aria-expanded="false">\r\n<div class="panel-body">\r\n<p dir="rtl">&nbsp;- قسم الحالة المدنية بالبلدية أو بالدائرة البلدية</p>\r\n<p dir="rtl">- السفارة أو القنصلية</p>\r\n<p dir="rtl">&nbsp;- المعتمدية خارج المناطق البلدية</p>\r\n</div>\r\n</div>\r\n</div>\r\n<div class="panel panel-default" style="text-align: right;">\r\n<div id="headingSix" class="panel-heading" role="tab">\r\n<h4 class="panel-title" style="direction: rtl;"><a class="collapsed" role="button" href="#collapseSix" data-toggle="collapse" data-parent="#accordion" aria-expanded="false" aria-controls="collapseSix">أجل الحصول على الخدمة</a></h4>\r\n</div>\r\n<div id="collapseSix" class="panel-collapse collapse" style="height: 0px;" role="tabpanel" aria-labelledby="headingSix" aria-expanded="false">\r\n<div class="panel-body">\r\n<p dir="rtl">&nbsp;- يسلّم الدفتر العائلي حينيا بمناسبة عقد الزواج أو خلال أسبوع في غير ذلك من الحالات</p>\r\n</div>\r\n</div>\r\n</div>\r\n<div class="panel panel-default" style="text-align: right;">\r\n<div id="headingSeven" class="panel-heading" role="tab">\r\n<h4 class="panel-title" style="direction: rtl;"><a class="collapsed" role="button" href="#collapseSeven" data-toggle="collapse" data-parent="#accordion" aria-expanded="false" aria-controls="collapseSeven"> ملاحظــــات:</a></h4>\r\n</div>\r\n<div id="collapseSeven" class="panel-collapse collapse" style="height: 0px;" role="tabpanel" aria-labelledby="headingSeven" aria-expanded="false">\r\n<div class="panel-body">\r\n<p dir="rtl">&nbsp;- عندما يكون مطلب استخراج دفتر عائلي متزامنا مع إبرام عقد الزواج أمام ضابط الحالة المدنية، يتم اعتماد نفس وثائق الحالة المدنية المعدة لإبرام عقد الزواج لإعداد الدفتر العائلي لأول مرة.</p>\r\n<p dir="rtl">&nbsp;- كل ما يدرج بالدفتر العائلي لا يتم إلا من طرف ضابط الحالة المدنية المؤهل لذلك ولا يجوز لغيره إدخال أي تعديلات أ</p>\r\n<p dir="rtl">&nbsp;<strong>ملاحظات على الدفتر العائلي</strong>.</p>\r\n<p dir="rtl">&nbsp;- في صورة وفاة رئيس العائلة المحتفظ بالدفتر العائلي أو صدور حكم بتجريده من حقوقه المدنية يرجع حق الاحتفاظ بالدفتر للزوجة ما لم يصدر حكم يناقض ذلك.</p>\r\n<p dir="rtl">&nbsp;- وثائق الحالة المدنية المستخرجة من الدفتر العائلي لها "قانونا " نفس قوة الإثبات التي للوثائق المستخرجة من الدفتر الأصلي.</p>\r\n<p dir="rtl">&nbsp;- يعاقب بالسجن مدة سنة وبخطية قدرها 240 دينارا كل من يتعمد استعمال وثائق محررة بمقتضي دفترعائلي يتضمن إرشادات ناقصة أو غير صحيحة.</p>\r\n<p dir="rtl">- بالنسبة للمتزوجين قبل قانون الحالة المدنية الصادر خلال سنة 1957 يسلم لهم الدفتر العائلي من مكان ولادة الزوج.</p>\r\n</div>\r\n</div>\r\n</div>\r\n</div>', NULL, '[]', '[]', NULL, NULL, NULL, 'le-livret-de-famille', 'PUBLISHED', 0, NULL, '2019-11-07 10:51:51', '2019-11-08 10:01:02'),
	(20, 'Rectification d\'extrait de naissance', 'إصلاح رسم ولادة', NULL, NULL, '<div id="accordion" class="panel-group accordion" role="tablist" aria-multiselectable="true">\r\n<div class="panel panel-default">\r\n<div id="headingOne" class="panel-heading" role="tab">\r\n<h4 class="panel-title"><a class="collapsed" role="button" href="#collapseOne" data-toggle="collapse" data-parent="#accordion" aria-expanded="false" aria-controls="collapseOne"> المراجع التشريعية و الترتيبية:</a></h4>\r\n</div>\r\n<div id="collapseOne" class="panel-collapse collapse" style="height: 0px;" role="tabpanel" aria-labelledby="headingOne" aria-expanded="false">\r\n<div class="panel-body">\r\n<ol>\r\n<li><span style="color: #000000;">القانون عدد 3 لسنة 1957 المؤرخ في 1 أوت 1957المنشور المتعلق بتنظيم الحالة المدنية كما تم إتمامه و تنقيحه بالنصوص اللاحقة.</span></li>\r\n<li><span style="color: #000000;">القانون عدد 59-130 المؤرخ في 5 أكتوبر 1959 المتعلــق بإصدار مجلـة المرافعـــات المدنية والتجارية كما تم إتمامه و تنقيحه بالنصوص اللاحقة</span></li>\r\n<li><span style="color: #000000;">المشترك بين وزيري العدل والداخلية تحت عدد 45 بتاريخ 29 سبتمبر 1984</span></li>\r\n</ol>\r\n</div>\r\n</div>\r\n</div>\r\n<div class="panel panel-default">\r\n<div id="headingTwo" class="panel-heading" role="tab">\r\n<h4 class="panel-title"><a class="collapsed" role="button" href="#collapseTwo" data-toggle="collapse" data-parent="#accordion" aria-expanded="false" aria-controls="collapseTwo"> شروط الانتفاع بالخدمة </a></h4>\r\n</div>\r\n<div id="collapseTwo" class="panel-collapse collapse" role="tabpanel" aria-labelledby="headingTwo" aria-expanded="false">\r\n<div class="panel-body">\r\n<ol>\r\n<li><span style="color: #000000;">-القانون عدد 3 لسنة 1957 المؤرخ في 1 أوت 1957 المتعلق بتنظيم الحالة المدنية كما تم إتمامه و تنقيحه بالنصوص اللاحقة.</span></li>\r\n<li><span style="color: #000000;">-القانون عدد 59-130 المؤرخ في 5 أكتوبر 1959 المتعلــق بإصدار مجلـة المرافعـــات المدنية والتجارية كما تم إتمامه و تنقيحه بالنصوص اللاحقة</span></li>\r\n<li><span style="color: #000000;">- المنشور المشترك بين وزيري العدل والداخلية تحت عدد 45 بتاريخ 29 سبتمبر 1984</span></li>\r\n</ol>\r\n</div>\r\n</div>\r\n</div>\r\n<div class="panel panel-default">\r\n<div id="headingThree" class="panel-heading" role="tab">\r\n<h4 class="panel-title"><a class="collapsed" role="button" href="#collapseThree" data-toggle="collapse" data-parent="#accordion" aria-expanded="false" aria-controls="collapseThree"> الوثائق المطلوبة</a></h4>\r\n</div>\r\n<div id="collapseThree" class="panel-collapse collapse" role="tabpanel" aria-labelledby="headingThree" aria-expanded="false">\r\n<div class="panel-body">\r\n<ol>\r\n<li><span style="color: #000000;">-القانون عدد 3 لسنة 1957 المؤرخ في 1 أوت 1957 المتعلق بتنظيم الحالة المدنية كما تم إتمامه و تنقيحه بالنصوص اللاحقة.</span></li>\r\n<li><span style="color: #000000;">-القانون عدد 59-130 المؤرخ في 5 أكتوبر 1959 المتعلــق بإصدار مجلـة المرافعـــات المدنية والتجارية كما تم إتمامه و تنقيحه بالنصوص اللاحقة</span></li>\r\n<li><span style="color: #000000;">- المنشور المشترك بين وزيري العدل والداخلية تحت عدد 45 بتاريخ 29 سبتمبر 1984</span></li>\r\n</ol>\r\n</div>\r\n</div>\r\n</div>\r\n<div class="panel panel-default">\r\n<div id="headingOne" class="panel-heading" role="tab">\r\n<h4 class="panel-title"><a class="collapsed" role="button" href="#collapseFour" data-toggle="collapse" data-parent="#accordion" aria-expanded="false" aria-controls="collapseFour"> مكـــــان إيــــداع الملــــف:</a></h4>\r\n</div>\r\n<div id="collapseFour" class="panel-collapse collapse" style="height: 0px;" role="tabpanel" aria-labelledby="headingOne" aria-expanded="false">\r\n<div class="panel-body">\r\n<ol>\r\n<li><span style="color: #000000;"> -قسم الحالة المدنية بالبلدية أو بالدائرة البلدية</span></li>\r\n<li><span style="color: #000000;">-مكان الحصول على الخدمة</span></li>\r\n</ol>\r\n</div>\r\n</div>\r\n</div>\r\n<div class="panel panel-default">\r\n<div id="headingOne" class="panel-heading" role="tab">\r\n<h4 class="panel-title"><a class="collapsed" role="button" href="#collapseFive" data-toggle="collapse" data-parent="#accordion" aria-expanded="false" aria-controls="collapseFive"> مكان الحصول على الخدمة :</a></h4>\r\n</div>\r\n<div id="collapseFive" class="panel-collapse collapse" style="height: 0px;" role="tabpanel" aria-labelledby="headingOne" aria-expanded="false">\r\n<div class="panel-body">\r\n<ul>\r\n<li><span style="color: #000000;"> قسم الحالة المدنية بالبلدية أو بالدائرة البلدية</span></li>\r\n<li><span style="color: #000000;">المعتمديــــة خــــارج المنطقــــة البلديـــــة </span></li>\r\n</ul>\r\n</div>\r\n</div>\r\n</div>\r\n<div class="panel panel-default">\r\n<div id="headingOne" class="panel-heading" role="tab">\r\n<h4 class="panel-title"><a class="collapsed" role="button" href="#collapseSix" data-toggle="collapse" data-parent="#accordion" aria-expanded="false" aria-controls="collapseSix"> أجل الحصول على الخدمة</a></h4>\r\n</div>\r\n<div id="collapseSix" class="panel-collapse collapse" style="height: 0px;" role="tabpanel" aria-labelledby="headingOne" aria-expanded="false">\r\n<div class="panel-body">\r\n<ul>\r\n<li><span style="color: #000000;"> -خلال شهرين من تسليم المطلب</span></li>\r\n</ul>\r\n</div>\r\n</div>\r\n</div>\r\n</div>', NULL, '[]', '[]', NULL, NULL, NULL, 'rectification-d-extrait-de-naissance', 'PUBLISHED', 0, NULL, '2019-11-07 11:56:58', '2019-11-12 11:57:34'),
	(21, 'Prestation de mort', 'مضمون الوفاة', NULL, NULL, '<div id="accordion" class="panel-group accordion" role="tablist" aria-multiselectable="true">\r\n<div class="panel panel-default">\r\n<div id="headingOne" class="panel-heading" role="tab">\r\n<h4 class="panel-title" style="direction: rtl; text-align: right;"><a class="collapsed" role="button" href="#collapseOne" data-toggle="collapse" data-parent="#accordion" aria-expanded="false" aria-controls="collapseOne"> المراجع التشريعية و الترتيبية:</a></h4>\r\n</div>\r\n<div id="collapseOne" class="panel-collapse collapse" style="height: 0px; text-align: right;" role="tabpanel" aria-labelledby="headingOne" aria-expanded="false">\r\n<div class="panel-body">\r\n<ol>\r\n<li style="direction: rtl;"><span style="color: #000000;">القانون عدد 3 لسنة 1957 المؤرخ في 1 أوت 1957المنشور المتعلق بتنظيم الحالة المدنية كما تم إتمامه و تنقيحه بالنصوص اللاحقة.</span></li>\r\n<li style="direction: rtl;"><span style="color: #000000;">القانون عدد 59-130 المؤرخ في 5 أكتوبر 1959 المتعلــق بإصدار مجلـة المرافعـــات المدنية والتجارية كما تم إتمامه و تنقيحه بالنصوص اللاحقة</span></li>\r\n<li style="direction: rtl;"><span style="color: #000000;">المشترك بين وزيري العدل والداخلية تحت عدد 45 بتاريخ 29 سبتمبر 1984</span></li>\r\n</ol>\r\n</div>\r\n</div>\r\n</div>\r\n<div class="panel panel-default" style="text-align: right;">\r\n<div id="headingTwo" class="panel-heading" role="tab">\r\n<h4 class="panel-title" style="direction: rtl;"><a class="collapsed" role="button" href="#collapseTwo" data-toggle="collapse" data-parent="#accordion" aria-expanded="false" aria-controls="collapseTwo">الوثائق المطلوبة </a></h4>\r\n</div>\r\n<div id="collapseTwo" class="panel-collapse collapse" role="tabpanel" aria-labelledby="headingTwo" aria-expanded="false">\r\n<div class="panel-body">\r\n<ol>\r\n<li style="direction: rtl;"><span style="color: #000000;">- الإدلاء بالمعلومات التي تخص الوفاة (عدد، سنة، اليوم و المكان)</span></li>\r\n</ol>\r\n</div>\r\n</div>\r\n</div>\r\n<div class="panel panel-default" style="text-align: right;">\r\n<div id="headingThree" class="panel-heading" role="tab">\r\n<h4 class="panel-title" style="direction: rtl;"><a class="collapsed" role="button" href="#collapseThree" data-toggle="collapse" data-parent="#accordion" aria-expanded="false" aria-controls="collapseThree">أجل الحصول على الخدمة</a></h4>\r\n</div>\r\n<div id="collapseThree" class="panel-collapse collapse" role="tabpanel" aria-labelledby="headingThree" aria-expanded="false">\r\n<div class="panel-body">\r\n<ol>\r\n<li style="direction: rtl;"><span style="color: #000000;">فورا!!</span></li>\r\n</ol>\r\n</div>\r\n</div>\r\n</div>\r\n<div class="panel panel-default" style="text-align: right;">\r\n<div id="headingFour" class="panel-heading" role="tab">\r\n<h4 class="panel-title" style="direction: rtl;"><a class="collapsed" role="button" href="#collapseFour" data-toggle="collapse" data-parent="#accordion" aria-expanded="false" aria-controls="collapseFour"> المراجع التشريعية و الترتيبية</a></h4>\r\n</div>\r\n<div id="collapseFour" class="panel-collapse collapse" style="height: 0px;" role="tabpanel" aria-labelledby="headingFour" aria-expanded="false">\r\n<div class="panel-body">\r\n<ol>\r\n<li style="direction: rtl;"><span style="color: #000000;"> - القانون عدد 3 لسنة 1957 المؤرخ في 1 أوت 1957 المتعلق بتنظيم الحالة المدنية.</span></li>\r\n<li style="direction: rtl;"><span style="color: #000000;">- منشور الوزير الأول عدد 15 المؤرخ في 14 فيفري 1989 المتعلق بتبسيط الإجراءات في خصوص وثائق الحالة المدنية.</span></li>\r\n</ol>\r\n</div>\r\n</div>\r\n</div>\r\n<div class="panel panel-default" style="text-align: right;">\r\n<div id="headingFive" class="panel-heading" role="tab">\r\n<h4 class="panel-title" style="direction: rtl;"><a class="collapsed" role="button" href="#collapseFive" data-toggle="collapse" data-parent="#accordion" aria-expanded="false" aria-controls="collapseFive">إجراءات إنجاز الخدمة</a></h4>\r\n</div>\r\n<div id="collapseFive" class="panel-collapse collapse" style="height: 0px;" role="tabpanel" aria-labelledby="headingFive" aria-expanded="false">\r\n<div class="panel-body">\r\n<ul>\r\n<li style="direction: rtl;"><span style="color: #000000;"> - استلام الوثائق</span></li>\r\n<li style="direction: rtl;"><span style="color: #000000;">- إعداد أو طباعة نظير من مضمون الوفاة</span></li>\r\n<li style="direction: rtl;"><span style="color: #000000;">- خلاص المعلوم الموظف على الخدمة</span></li>\r\n<li style="direction: rtl;"><span style="color: #000000;">- تسليم مضون الوفاة</span></li>\r\n</ul>\r\n</div>\r\n</div>\r\n</div>\r\n<div class="panel panel-default" style="text-align: right;">\r\n<div id="headingSix" class="panel-heading" role="tab">\r\n<h4 class="panel-title" style="direction: rtl;"><a class="collapsed" role="button" href="#collapseSix" data-toggle="collapse" data-parent="#accordion" aria-expanded="false" aria-controls="collapseSix"> المصلحة المسداة للخدمة</a></h4>\r\n</div>\r\n<div id="collapseSix" class="panel-collapse collapse" style="height: 0px;" role="tabpanel" aria-labelledby="headingSix" aria-expanded="false">\r\n<div class="panel-body">\r\n<ul>\r\n<li style="direction: rtl;"><span style="color: #000000;"> قسم الحالة المدنية بالبلدية أو الدائرة البلدية </span></li>\r\n</ul>\r\n</div>\r\n</div>\r\n</div>\r\n<div class="panel panel-default" style="text-align: right;">\r\n<div id="headingSeven" class="panel-heading" role="tab">\r\n<h4 class="panel-title" style="direction: rtl;"><a class="collapsed" role="button" href="#collapseSeven" data-toggle="collapse" data-parent="#accordion" aria-expanded="false" aria-controls="collapseSeven"> مكان إيداع الملف</a></h4>\r\n</div>\r\n<div id="collapseSeven" class="panel-collapse collapse" style="height: 0px;" role="tabpanel" aria-labelledby="headingSeven" aria-expanded="false">\r\n<div class="panel-body">\r\n<ul>\r\n<li style="direction: rtl;"><span style="color: #000000;"> قسم الحالة المدنية بالبلدية أو الدائرة البلدية </span></li>\r\n</ul>\r\n</div>\r\n</div>\r\n</div>\r\n<div class="panel panel-default">\r\n<div id="heading8" class="panel-heading" style="text-align: right;" role="tab">\r\n<h4 class="panel-title" style="direction: rtl;"><a class="collapsed" role="button" href="#collapse8" data-toggle="collapse" data-parent="#accordion" aria-expanded="false" aria-controls="collapse8">مكان الحصول على الخدمة</a></h4>\r\n</div>\r\n<div id="collapse8" class="panel-collapse collapse" style="height: 0px;" role="tabpanel" aria-labelledby="heading8" aria-expanded="false">\r\n<div class="panel-body">\r\n<ul>\r\n<li style="direction: rtl; text-align: right;"><span style="color: #000000;"> قسم الحالة المدنية بالبلدية أو الدائرة البلدية </span></li>\r\n</ul>\r\n</div>\r\n</div>\r\n</div>\r\n</div>', NULL, '[]', '[]', NULL, NULL, NULL, 'prestation-de-mort', 'PUBLISHED', 0, NULL, '2019-11-07 14:35:11', '2019-11-07 14:58:30'),
	(22, 'Permission d\'inhumation', 'إذن بالدفن', NULL, NULL, '<div id="accordion" class="panel-group accordion" role="tablist" aria-multiselectable="true">\r\n<div class="panel panel-default">\r\n<div id="headingOne" class="panel-heading" role="tab">\r\n<h4 class="panel-title" style="direction: rtl; text-align: right;"><a class="collapsed" role="button" href="#collapseOne" data-toggle="collapse" data-parent="#accordion" aria-expanded="false" aria-controls="collapseOne"> المراجع التشريعية و الترتيبية:</a></h4>\r\n</div>\r\n<div id="collapseOne" class="panel-collapse collapse" style="height: 0px; text-align: right;" role="tabpanel" aria-labelledby="headingOne" aria-expanded="false">\r\n<div class="panel-body">\r\n<ol>\r\n<li style="direction: rtl;"><span style="color: #000000;">الفصول 44 و 45 و 48 من القانون عدد 3 لسنة 1957 المؤرخ في 1 أوت 1957 المتعلق بتنظيم الحالة المدنية كما تم إتمامه و تنقيحه بالنصوص اللاحقة</span></li>\r\n<li style="direction: rtl;"><span style="color: #000000;">الفصل 76 من القانون الأساسي للبلديات عدد 33 المؤرخ في 14 ماي 1975 كما تم إتمامه وتنقيحه بالنصوص اللاحقة </span></li>\r\n<li style="direction: rtl;"><span style="color: #000000;">القانون عدد 12 لسنة 1997 المؤرخ في 25 فيفري 1997 حول المقابر و أماكن الدفن </span></li>\r\n<li style="direction: rtl;"><span style="color: #000000;">الأمر عدد 1326 لسنة 1997 المؤرخ في 7 جويلية 1997 المتعلق بكيفية إعداد القبور وبضبط تراتيب الدفن و تراتيب إخراج الرفات أو الجثث. </span></li>\r\n<li style="direction: rtl;"><span style="color: #000000;">منشور صادر عن وزارة الداخلية تحت عدد 86 مؤرخ في 3 نوفمبر 1997</span></li>\r\n</ol>\r\n</div>\r\n</div>\r\n</div>\r\n<div class="panel panel-default" style="text-align: right;">\r\n<div id="headingTwo" class="panel-heading" role="tab">\r\n<h4 class="panel-title" style="direction: rtl;"><a class="collapsed" role="button" href="#collapseTwo" data-toggle="collapse" data-parent="#accordion" aria-expanded="false" aria-controls="collapseTwo">شروط الانتفاع بالخدمة</a></h4>\r\n</div>\r\n<div id="collapseTwo" class="panel-collapse collapse" role="tabpanel" aria-labelledby="headingTwo" aria-expanded="false">\r\n<div class="panel-body">\r\n<ul>\r\n<li style="direction: rtl;"><span style="color: #000000;">إثر الوفاة وقبل القيام بالدفن</span></li>\r\n</ul>\r\n</div>\r\n</div>\r\n</div>\r\n<div class="panel panel-default" style="text-align: right;">\r\n<div id="headingThree" class="panel-heading" role="tab">\r\n<h4 class="panel-title" style="direction: rtl;"><a class="collapsed" role="button" href="#collapseThree" data-toggle="collapse" data-parent="#accordion" aria-expanded="false" aria-controls="collapseThree">الوثائق المطلوبة</a></h4>\r\n</div>\r\n<div id="collapseThree" class="panel-collapse collapse" role="tabpanel" aria-labelledby="headingThree" aria-expanded="false">\r\n<div class="panel-body">\r\n<ol>\r\n<li style="direction: rtl;"><span style="color: #000000;">شهادة طبية تفيد أن الموت تمت في ظروف طبيعية، </span></li>\r\n<li style="direction: rtl;"><span style="color: #000000;">إذن من وكيل الجمهورية إذا كانت الموت تمت في ظروف غير عادية أو غامضة، </span></li>\r\n<li style="direction: rtl;"><span style="color: #000000;">تقرير المصالح الأمنية في حالة الموت غير الطبيعية،</span></li>\r\n<li style="direction: rtl;"><span style="color: #000000;">المعلوم الموظف على الوثيقة المطلوبة. </span></li>\r\n</ol>\r\n</div>\r\n</div>\r\n</div>\r\n<div class="panel panel-default" style="text-align: right;">\r\n<div id="headingFour" class="panel-heading" role="tab">\r\n<h4 class="panel-title" style="direction: rtl;"><a class="collapsed" role="button" href="#collapseFour" data-toggle="collapse" data-parent="#accordion" aria-expanded="false" aria-controls="collapseFour"> مكــان إيـداع الملــف:</a></h4>\r\n</div>\r\n<div id="collapseFour" class="panel-collapse collapse" style="height: 0px;" role="tabpanel" aria-labelledby="headingFour" aria-expanded="false">\r\n<div class="panel-body">\r\n<ol>\r\n<li style="direction: rtl;"><span style="color: #000000;"> قسم الحالة المدنية بالبلدية أو بالدائرة البلدية </span></li>\r\n<li style="direction: rtl;"><span style="color: #000000;">-المعتمدية خارج المنطقة البلدية </span></li>\r\n</ol>\r\n</div>\r\n</div>\r\n</div>\r\n<div class="panel panel-default" style="text-align: right;">\r\n<div id="headingFive" class="panel-heading" role="tab">\r\n<h4 class="panel-title" style="direction: rtl;"><a class="collapsed" role="button" href="#collapseFive" data-toggle="collapse" data-parent="#accordion" aria-expanded="false" aria-controls="collapseFive">مكان الحصول على الخدمة :</a></h4>\r\n</div>\r\n<div id="collapseFive" class="panel-collapse collapse" style="height: 0px;" role="tabpanel" aria-labelledby="headingFive" aria-expanded="false">\r\n<div class="panel-body">\r\n<ul>\r\n<li style="direction: rtl;"><span style="color: #000000;">قسم الحالة المدنية بالبلدية أو بالدائرة البلدية </span></li>\r\n<li style="direction: rtl;"><span style="color: #000000;">المعتمديــــة خــــارج المنطقــــة البلديـــــة </span></li>\r\n</ul>\r\n</div>\r\n</div>\r\n</div>\r\n<div class="panel panel-default" style="text-align: right;">\r\n<div id="headingSix" class="panel-heading" role="tab">\r\n<h4 class="panel-title" style="direction: rtl;"><a class="collapsed" role="button" href="#collapseSix" data-toggle="collapse" data-parent="#accordion" aria-expanded="false" aria-controls="collapseSix">أجل الحصول على الخدمة</a></h4>\r\n</div>\r\n<div id="collapseSix" class="panel-collapse collapse" style="height: 0px;" role="tabpanel" aria-labelledby="headingSix" aria-expanded="false">\r\n<div class="panel-body">\r\n<ul>\r\n<li style="direction: rtl;"><span style="color: #000000;">فورا</span></li>\r\n</ul>\r\n</div>\r\n</div>\r\n</div>\r\n<div class="panel panel-default" style="text-align: right;">\r\n<div id="headingSeven" class="panel-heading" role="tab">\r\n<h4 class="panel-title" style="direction: rtl;"><a class="collapsed" role="button" href="#collapseSeven" data-toggle="collapse" data-parent="#accordion" aria-expanded="false" aria-controls="collapseSeven"> ملاحظــــات:</a></h4>\r\n</div>\r\n<div id="collapseSeven" class="panel-collapse collapse" style="height: 0px;" role="tabpanel" aria-labelledby="headingSeven" aria-expanded="false">\r\n<div class="panel-body">\r\n<ol>\r\n<li style="direction: rtl;"><span style="color: #000000;"> إذا كانت الموت مشبوها فيها أو ناتجة عن عنف أو حادث أو في أي ظرف من الظروف الأخرى غير الطبيعية فإن الإذن بالدفن لا يسلم إلا على ضوء المحضر المحرر من طرف مصالح الأمن الوطني.</span></li>\r\n<li><span style="color: #000000;"> في صورة نقل جثة من مكان لآخر يتولى ضابط الحالة المدنية الذي سيقبل الجثة بمقر جهته إعداد الإذن بالدفن استنادا على الوثائق المصاحبة للجثة (شهادة طبية ومضمون الوفاة) دون زيادة البحث عن أسباب الوفاة.</span></li>\r\n<li><span style="color: #000000;"> كل شخص يدفن ميتّا دون إذن بالدفن يعاقب بالسجن و الخطية.</span></li>\r\n</ol>\r\n</div>\r\n</div>\r\n</div>\r\n</div>', NULL, '[]', '[]', NULL, NULL, NULL, 'permission-d-inhumation', 'PUBLISHED', 0, NULL, '2019-11-07 15:12:14', '2019-11-07 15:20:37'),
	(23, 'Délimitation de la mort', 'ترسيم وفاة', NULL, NULL, '<div id="accordion" class="panel-group accordion" role="tablist" aria-multiselectable="true">\r\n<div class="panel panel-default">\r\n<div id="headingOne" class="panel-heading" role="tab">\r\n<h4 class="panel-title" style="direction: rtl; text-align: right;"><a class="collapsed" role="button" href="#collapseOne" data-toggle="collapse" data-parent="#accordion" aria-expanded="false" aria-controls="collapseOne"> المراجع التشريعية و الترتيبية</a></h4>\r\n</div>\r\n<div id="collapseOne" class="panel-collapse collapse" style="height: 0px; text-align: right;" role="tabpanel" aria-labelledby="headingOne" aria-expanded="false">\r\n<div class="panel-body">\r\n<ol>\r\n<li style="direction: rtl;"><span style="color: #000000;">- الفصول من 15 إلى 32 من القانون عدد 3 لسنة 1957 المؤرخ في 1 أوت 1957 المتعلق بتنظيم الحالة المدنية كما تم إتمامه و تنقيحه بالنصوص اللاحقة</span></li>\r\n<li style="direction: rtl;"><span style="color: #000000;">- الأمر المؤرخ في 13 أوت 1956 المتعلق بإصدار مجلة الأحوال الشخصية كما تم إتمامه و تنقيحه بالنصوص اللاحقة .</span></li>\r\n<li style="direction: rtl;"><span style="color: #000000;">- القوانين الأساسية الخاصة بالأسلاك النشيطة وأعوان القمارق والجيش الوطني والأعوان الدبلوماسيين</span></li>\r\n</ol>\r\n</div>\r\n</div>\r\n</div>\r\n<div class="panel panel-default" style="text-align: right;">\r\n<div id="headingTwo" class="panel-heading" role="tab">\r\n<h4 class="panel-title" style="direction: rtl;"><a class="collapsed" role="button" href="#collapseTwo" data-toggle="collapse" data-parent="#accordion" aria-expanded="false" aria-controls="collapseTwo">شروط الانتفاع بالخدمة</a></h4>\r\n</div>\r\n<div id="collapseTwo" class="panel-collapse collapse" role="tabpanel" aria-labelledby="headingTwo" aria-expanded="false">\r\n<div class="panel-body">\r\n<ul>\r\n<li style="direction: rtl;"><span style="color: #000000;">التصريح بالوفاة لدى ضابط الحالة المدنية لمكان الوفاة أو مكان اكتشاف الجثة إذا كان مكان الوفاة مجهولا. </span></li>\r\n<li style="direction: rtl;"><span style="color: #000000;">يجب التصريح بالوفاة في ظرف 3 أيام من حصولها. </span></li>\r\n<li style="direction: rtl;"><span style="color: #000000;">يتم التصريح بالوفاة من الأطراف التالي ذكرها :</span>\r\n<ol>\r\n<li style="direction: rtl;"><span style="color: #000000;">- أحد الأقارب أو ممن لديه معلومات صحيحة وكاملة قدر الإمكان، </span></li>\r\n<li style="direction: rtl;"><span style="color: #000000;">- مديــر المستشفى أو المستوصف مكـــان حصول الوفــــاة على أن يكون ذلك في ظرف 24 ساعة من حصول الوفاة. </span></li>\r\n<li style="direction: rtl;"><span style="color: #000000;">- آمر السجن إذ كانت الوفاة حاصلة في السجن أو بتنفيذ حكم الإعدام. </span></li>\r\n<li style="direction: rtl;"><span style="color: #000000;">- الحرس أو الأمن الوطني إذا كانت الوفاة ناتجة عن حادث مرور أو أعمال عنف. </span></li>\r\n</ol>\r\n</li>\r\n</ul>\r\n</div>\r\n</div>\r\n</div>\r\n<div class="panel panel-default" style="text-align: right;">\r\n<div id="headingThree" class="panel-heading" role="tab">\r\n<h4 class="panel-title" style="direction: rtl;"><a class="collapsed" role="button" href="#collapseThree" data-toggle="collapse" data-parent="#accordion" aria-expanded="false" aria-controls="collapseThree">الوثائق المطلوبة</a></h4>\r\n</div>\r\n<div id="collapseThree" class="panel-collapse collapse" role="tabpanel" aria-labelledby="headingThree" aria-expanded="false">\r\n<div class="panel-body">\r\n<ol>\r\n<li style="direction: rtl;"><span style="color: #000000;">أكثر ما يمكن من معلومات عن المتوفي (وإن أمكن مضمون ولادته أو بطاقة تعريفه)</span></li>\r\n<li style="direction: rtl;"><span style="color: #000000;">تقرير المصالح الأمنية إن كانت الموت في ظروف غير عادية تثير الشك </span></li>\r\n</ol>\r\n</div>\r\n</div>\r\n</div>\r\n<div class="panel panel-default" style="text-align: right;">\r\n<div id="headingFour" class="panel-heading" role="tab">\r\n<h4 class="panel-title" style="direction: rtl;"><a class="collapsed" role="button" href="#collapseFour" data-toggle="collapse" data-parent="#accordion" aria-expanded="false" aria-controls="collapseFour"> مكــان إيـداع الملــف</a></h4>\r\n</div>\r\n<div id="collapseFour" class="panel-collapse collapse" style="height: 0px;" role="tabpanel" aria-labelledby="headingFour" aria-expanded="false">\r\n<div class="panel-body">\r\n<ol>\r\n<li style="direction: rtl;"><span style="color: #000000;"> قسم الحالة المدنية بالبلدية أو بالدائرة البلدية مكان حصول الوفاة</span></li>\r\n</ol>\r\n</div>\r\n</div>\r\n</div>\r\n<div class="panel panel-default" style="text-align: right;">\r\n<div id="headingFive" class="panel-heading" role="tab">\r\n<h4 class="panel-title" style="direction: rtl;"><a class="collapsed" role="button" href="#collapseFive" data-toggle="collapse" data-parent="#accordion" aria-expanded="false" aria-controls="collapseFive">مكان الحصول على الخدمة</a></h4>\r\n</div>\r\n<div id="collapseFive" class="panel-collapse collapse" style="height: 0px;" role="tabpanel" aria-labelledby="headingFive" aria-expanded="false">\r\n<div class="panel-body">\r\n<ul>\r\n<li style="direction: rtl;"><span style="color: #000000;">قسم الحالة المدنية بالبلدية أو بالدائرة البلدية مكان حصول الوفاة</span></li>\r\n</ul>\r\n</div>\r\n</div>\r\n</div>\r\n<div class="panel panel-default" style="text-align: right;">\r\n<div id="headingSix" class="panel-heading" role="tab">\r\n<h4 class="panel-title" style="direction: rtl;"><a class="collapsed" role="button" href="#collapseSix" data-toggle="collapse" data-parent="#accordion" aria-expanded="false" aria-controls="collapseSix">أجل الحصول على الخدمة</a></h4>\r\n</div>\r\n<div id="collapseSix" class="panel-collapse collapse" style="height: 0px;" role="tabpanel" aria-labelledby="headingSix" aria-expanded="false">\r\n<div class="panel-body">\r\n<ul>\r\n<li style="direction: rtl;"><span style="color: #000000;">فورا</span></li>\r\n</ul>\r\n</div>\r\n</div>\r\n</div>\r\n<div class="panel panel-default" style="text-align: right;">\r\n<div id="headingSeven" class="panel-heading" role="tab">\r\n<h4 class="panel-title" style="direction: rtl;"><a class="collapsed" role="button" href="#collapseSeven" data-toggle="collapse" data-parent="#accordion" aria-expanded="false" aria-controls="collapseSeven"> ملاحظــــات</a></h4>\r\n</div>\r\n<div id="collapseSeven" class="panel-collapse collapse" style="height: 0px;" role="tabpanel" aria-labelledby="headingSeven" aria-expanded="false">\r\n<div class="panel-body">\r\n<ol>\r\n<li style="direction: rtl;"><span style="color: #000000;"> بعد فوات الأجل القانوني ( 3 أيام ) لا يمكن الترسيم إلا بإذن من المحكمة الابتدائية التي بدائرتها حصلت الوفاة. </span></li>\r\n<li><span style="color: #000000;"> الاكتفاء بالإعلام الوارد من المستشفى حتى لا يتم ترسيم الوفاة ثانية </span></li>\r\n</ol>\r\n</div>\r\n</div>\r\n</div>\r\n</div>', NULL, '[]', '[]', NULL, NULL, NULL, 'delimitation-de-la-mort', 'PUBLISHED', 0, NULL, '2019-11-07 15:22:36', '2019-11-08 09:31:00'),
	(24, 'Fiscalité Locale', 'الجباية المحلّية', NULL, NULL, '<div id="accordion" class="panel-group accordion" role="tablist" aria-multiselectable="true">\r\n<div class="panel panel-default">\r\n<div id="headingOne" class="panel-heading" role="tab">\r\n<h4 class="panel-title" style="direction: rtl; text-align: right;"><a class="collapsed" role="button" href="#collapseOne" data-toggle="collapse" data-parent="#accordion" aria-expanded="false" aria-controls="collapseOne"> المراجع القانونية</a></h4>\r\n</div>\r\n<div id="collapseOne" class="panel-collapse collapse" style="height: 0px; text-align: right;" role="tabpanel" aria-labelledby="headingOne" aria-expanded="false">\r\n<div class="panel-body">\r\n<ul style="text-align: right;">\r\n<li>قانون عدد 11 لسنة 1997 مؤرخ في 03 فيفري 1997 كما وقع تنقيحه واتمامه بالنصوص اللاحقة.</li>\r\n</ul>\r\n</div>\r\n</div>\r\n</div>\r\n<div class="panel panel-default" style="text-align: right;">\r\n<div id="headingTwo" class="panel-heading" role="tab">\r\n<h4 class="panel-title" style="direction: rtl;"><a class="collapsed" role="button" href="#collapseTwo" data-toggle="collapse" data-parent="#accordion" aria-expanded="false" aria-controls="collapseTwo">المعلوم على العقارات المبنية</a></h4>\r\n</div>\r\n<div id="collapseTwo" class="panel-collapse collapse" role="tabpanel" aria-labelledby="headingTwo" aria-expanded="false">\r\n<div class="panel-body">\r\n<p style="text-align: right;"><strong>التعريف</strong><br />تخضع العقارات المبنية الكائنة بالمنطقة البلدية لمعلوم سنوي يسمى "المعلوم على العقارات المبنية".</p>\r\n<p style="text-align: right;"><strong>آجـــــــــال الدفـــــــــع</strong><br />في غرة جانفي من كل سنة.</p>\r\n<p style="text-align: right;"><strong>يستوجب دفع المعلوم على</strong><strong>:</strong><br />- مالك العقار<br />- المنتفع به</p>\r\n<p style="text-align: right;">في صورة غياب المذكورين أعلاه يستوجب المعلوم على حائز العقار أو شاغله</p>\r\n<p style="text-align: right;"><strong>أساس المعلوم ونسبه</strong><strong>:</strong><br />يوظف المعلوم على العقارات المبنية على أساس 2% من الثمن المرجعي للمتر المربع لكل عقار تضرب في المساحة المغطاة للعقار. بين الأمر عدد 1185 المؤرخ في: 14-05-2007 الحد الأدنى والحد الأقصى للثمن المرجعي للمتر المربع المبني لكل صنف من أصناف العقارات على النحو التالي:</p>\r\n<table style="height: 279px; border-color: #000000; width: 790px; float: right;" border="1" width="790">\r\n<tbody>\r\n<tr>\r\n<td width="24%">\r\n<p><strong>الثمن المرجعي</strong></p>\r\n<p><strong>للمتر المربع (بالدينار</strong><strong>(</strong></p>\r\n</td>\r\n<td width="57%">\r\n<p><strong>المساحة المغطاة</strong></p>\r\n</td>\r\n<td width="16%">\r\n<p><strong>صنف العقار</strong></p>\r\n</td>\r\n</tr>\r\n<tr>\r\n<td width="24%">\r\n<p>من 100 إلى 162</p>\r\n</td>\r\n<td width="57%">\r\n<p>ويشمل العقارات التي لا تتعدى مساحتها المغطاة 100 م2.</p>\r\n</td>\r\n<td width="16%">\r\n<p>الصنف 1:</p>\r\n</td>\r\n</tr>\r\n<tr>\r\n<td width="24%">\r\n<p>من 163 إلى 216</p>\r\n</td>\r\n<td width="57%">\r\n<p>ويشمل العقارات التي تفوق مساحتها المغطاة 100 م2 ولا تتعدى 200 م2.</p>\r\n</td>\r\n<td width="16%">\r\n<p>الصنف 2:</p>\r\n</td>\r\n</tr>\r\n<tr>\r\n<td width="24%">\r\n<p>من 217 إلى 270</p>\r\n</td>\r\n<td width="57%">\r\n<p>ويشمل العقارات التي تفوق مساحتها المغطاة 200 م2 ولا تتعدى 400 م2.</p>\r\n</td>\r\n<td width="16%">\r\n<p>الصنف 3:</p>\r\n</td>\r\n</tr>\r\n<tr>\r\n<td width="24%">\r\n<p>من 271 إلى 324</p>\r\n</td>\r\n<td width="57%">\r\n<p>عقار تفوق مساحته المغطاة 500 متر مربع معد لتعاطي نشاط صناعي</p>\r\n</td>\r\n<td width="16%">\r\n<p>الصنف 4:</p>\r\n</td>\r\n</tr>\r\n</tbody>\r\n</table>\r\n<p style="text-align: right;"><strong>الثمــــــــــــن</strong><br />حددت نسبة المعلوم على العقارات المبنية على أساس مستوى الخدمات المسداة من قبل البلدية: مثل التنظيف، التنوير العمومي، تبليط الأرصفة ،تعبيد الطرقات، وجود قنوات تصريف المياه المستعملة وقنوات تصريف مياه الأمطار، خدمات أخرى ...<br />وهي تتفاوت بحسب الخدمات المنتفع بها:</p>\r\n<table style="border-color: #000000; float: right;" border="1">\r\n<tbody>\r\n<tr>\r\n<td width="205">\r\n<p><strong>النسبة</strong></p>\r\n</td>\r\n<td width="388">\r\n<p><strong>الخدمات المنتفع بها</strong></p>\r\n</td>\r\n</tr>\r\n<tr>\r\n<td width="205">\r\n<p>8 %</p>\r\n</td>\r\n<td width="388">\r\n<p>بالنسبة للعقارات المنتفعة بخدمة أو خدمتين</p>\r\n</td>\r\n</tr>\r\n<tr>\r\n<td width="205">\r\n<p>10 %</p>\r\n</td>\r\n<td width="388">\r\n<p>بالنسبة للعقارات المنتفعة بثلاث أو أربع خدمات</p>\r\n</td>\r\n</tr>\r\n<tr>\r\n<td width="205">\r\n<p>12 %</p>\r\n</td>\r\n<td width="388">\r\n<p>بالنسبة للعقارات المنتفعة باكثر من أربع خدمات</p>\r\n</td>\r\n</tr>\r\n<tr>\r\n<td width="205">\r\n<p>14 %</p>\r\n</td>\r\n<td width="388">\r\n<p>بالنسبة للعقارات المنتفعة باكثر من أربع خدمات و خدمات اخرى</p>\r\n</td>\r\n</tr>\r\n</tbody>\r\n</table>\r\n</div>\r\n</div>\r\n</div>\r\n<div class="panel panel-default" style="text-align: right;">\r\n<div id="headingThree" class="panel-heading" role="tab">\r\n<h4 class="panel-title" style="direction: rtl;"><a class="collapsed" role="button" href="#collapseThree" data-toggle="collapse" data-parent="#accordion" aria-expanded="false" aria-controls="collapseThree">المعلوم على الأراضي غير المبنية</a></h4>\r\n</div>\r\n<div id="collapseThree" class="panel-collapse collapse" role="tabpanel" aria-labelledby="headingThree" aria-expanded="false">\r\n<div class="panel-body">\r\n<p style="text-align: right;"><strong>التعريف</strong><br />تخضع الأراضي غير المبنية الكائنة بالمنطقة البلدية لمعلوم سنوي يسمى "المعلوم على الأراضي غير المبنية".</p>\r\n<p style="text-align: right;"><strong>آجال الدفع</strong><br />في غرة جانفي من كل سنة</p>\r\n<p style="text-align: right;"><strong>يستوجب دفع المعلوم على</strong><strong>:</strong><br />مالك الارض<br />المنتفع بها<br />و في صورة غياب مالك أو منتفع معروف يستوجب المعلوم من طرف حائز العقار أو شاغله .</p>\r\n<p style="text-align: right;"><strong>أساس المعلوم ونسبته</strong><br />يوظف المعلوم بنسبة 0,3 % على القيمة التجارية الحقيقية للأراضي.<br />وفي غياب القيمة التجارية المشار إليها بالفقرة الأولى من هذا الفصل يوظف معلوم بالمتر المربع تصاعديا حسب كثافة المناطق العمرانية المحددة بمثال التهيئة العمرانية يضبط بالنسبة لكل منطقة كل ثلاث سنوات بمقتضى أمر (عدد 1186 مؤرخ في 14-05-2007(</p>\r\n<p style="text-align: right;">&nbsp;</p>\r\n<p style="text-align: right;">&nbsp;</p>\r\n<table style="border-color: #000000; float: right;" border="1">\r\n<tbody>\r\n<tr>\r\n<td width="262">\r\n<p><strong>المعلوم على المتر المربع( بالدينار</strong>&nbsp;<strong>(</strong></p>\r\n</td>\r\n<td width="246">\r\n<p><strong>المنطقة</strong></p>\r\n</td>\r\n</tr>\r\n<tr>\r\n<td width="262">\r\n<p>0,318</p>\r\n</td>\r\n<td width="246">\r\n<p>منطقة ذات كثافة عمرانية مرتفعة</p>\r\n</td>\r\n</tr>\r\n<tr>\r\n<td width="262">\r\n<p>0,095</p>\r\n</td>\r\n<td width="246">\r\n<p>منطقة ذات كثافة عمرانية متوسطة</p>\r\n</td>\r\n</tr>\r\n<tr>\r\n<td width="262">\r\n<p>0,032</p>\r\n</td>\r\n<td width="246">\r\n<p>منطقة ذات كثافة عمرانية منخفضة</p>\r\n</td>\r\n</tr>\r\n</tbody>\r\n</table>\r\n</div>\r\n</div>\r\n</div>\r\n<div class="panel panel-default" style="text-align: right;">\r\n<div id="headingFour" class="panel-heading" role="tab">\r\n<h4 class="panel-title" style="direction: rtl;"><a class="collapsed" role="button" href="#collapseFour" data-toggle="collapse" data-parent="#accordion" aria-expanded="false" aria-controls="collapseFour"> المعلوم على المؤسسات ذات الصبغة الصناعية أو التجارية أو المهنية</a></h4>\r\n</div>\r\n<div id="collapseFour" class="panel-collapse collapse" style="height: 0px;" role="tabpanel" aria-labelledby="headingFour" aria-expanded="false">\r\n<div class="panel-body">\r\n<p style="text-align: right;"><strong>ميدان تطبيق المعلوم&nbsp;</strong><br />يستوجب دفع المعلوم على المؤسسات ذات الصبغة الصناعية أو التجارية أو المهنية على<br />الأشخاص الطبيعيين الخاضعين للضريبة على الدخل بعنوان الأرباح الصناعية والتجارية وأرباح المهن غير التجارية<br />الاشخاص المعنيين الخاضعين للضريبة على الشركات<br />شركات الأشخاص وشركات المحاصة التي تتعاطى نشاطا تجاريا أو مهنة غير تجارية</p>\r\n<p style="text-align: right;"><strong>المؤسسات المعفاة من الأداء</strong><br />يعفى من المعلوم:<br />المؤسسات السياحية الخاضعة للمعلوم على النزل.<br />المؤسسات المنتفعة بنظام خاص بمقتضى نصوص تشريعية خاصة أو بمقتضى اتفاقيات خاصة خاضعة للأحكام الواردة بها.</p>\r\n<p style="text-align: right;"><strong>أساس احتساب المعلوم</strong><br />يحسب المعلوم على المؤسسات ذات الصبغة الصناعية أو التجارية أو المهنية على أساس رقم المعاملات المحلي الخام المحقق من طرف المؤسسات الخاضعة للمعلوم .<br />يحسب المعلوم على أساس الضريبة على الدخل بالنسبة للأشخاص الطبيعيين الخاضعين للضريبة على الدخل بعنوان الأرباح أو الضريبة على الشركات.<br />المؤسسات التي لايتعدى هامش ربحها الخام 4% بموجب نص توثيقي.</p>\r\n<p style="text-align: right;"><strong>نسب المعلوم</strong><br />حددت نسبة المعلوم على المؤسسات ذات الصبغة الصناعية او التجارية او المهنية بـ&nbsp; 0.2 بالمائة.<br />غير أن هذه النسبة تحدد بـ25% بالنسبة للضريبة على الدخل او للضريبة على شركات</p>\r\n<p style="text-align: right;">&nbsp;</p>\r\n<p style="text-align: right;">&nbsp;</p>\r\n<p style="text-align: right;"><strong>للتأكيـــــد</strong><br />لا يقل المعلوم على المؤسسات عن المعلوم على العقارات المبنية المستوجب بعنوان العقارات المستغلة في نطاق نشاط المؤسسة يحتسب على اساس &nbsp;5% من الثمن المرجعي للمتر المربع المبني لكل صنف من أصناف العقارات تضرب في المساحة المغطاة.</p>\r\n<p style="text-align: right;">وقد حدد الأمر عدد 1187 المؤرخ في 14-05-2007 الحد الأدنى للمعلوم على المؤسسات لكل صنف من أصناف العقارات حسب نسب المعلوم على العقارات المبنية على النحو التالي:</p>\r\n<table style="height: 301px; border-color: #000000; width: 790px; float: right;" border="1" width="790">\r\n<tbody>\r\n<tr style="height: 45px;">\r\n<td style="height: 45px; width: 449px;" colspan="4">\r\n<p><strong>المعلوم بالمتر المربع المرجعي (بالدينار</strong><strong>(</strong></p>\r\n</td>\r\n<td style="height: 91px; width: 216px;" rowspan="2">\r\n<p><strong>خصوصية العقار</strong></p>\r\n<p><strong>&nbsp;</strong></p>\r\n</td>\r\n<td style="height: 91px; width: 103px;" rowspan="2">\r\n<p><strong>صنف العقار</strong></p>\r\n</td>\r\n</tr>\r\n<tr style="height: 46px;">\r\n<td style="height: 46px; width: 93px;">\r\n<p>نسبة 14%</p>\r\n</td>\r\n<td style="height: 46px; width: 93px;">\r\n<p>نسبة 12%</p>\r\n</td>\r\n<td style="height: 46px; width: 102px;">\r\n<p>نسبة 10%</p>\r\n</td>\r\n<td style="height: 46px; width: 143px;">\r\n<p>نسبة 8%</p>\r\n</td>\r\n</tr>\r\n<tr style="height: 59px;">\r\n<td style="height: 59px; width: 93px;">\r\n<p>1,425</p>\r\n</td>\r\n<td style="height: 59px; width: 93px;">\r\n<p>1,220</p>\r\n</td>\r\n<td style="height: 59px; width: 102px;">\r\n<p>1,020</p>\r\n</td>\r\n<td style="height: 59px; width: 143px;">\r\n<p>0,815</p>\r\n</td>\r\n<td style="height: 59px; width: 216px;">\r\n<p>عقار معد لإستعمال اداري أو لتعاطي نشاط تجاري أو غير تجاري</p>\r\n</td>\r\n<td style="height: 59px; width: 103px;">\r\n<p>الصنف 1:</p>\r\n</td>\r\n</tr>\r\n<tr style="height: 46px;">\r\n<td style="height: 46px; width: 93px;">\r\n<p>0,975</p>\r\n</td>\r\n<td style="height: 46px; width: 93px;">\r\n<p>0,835</p>\r\n</td>\r\n<td style="height: 46px; width: 102px;">\r\n<p>0,700</p>\r\n</td>\r\n<td style="height: 46px; width: 143px;">\r\n<p>0,560</p>\r\n</td>\r\n<td style="height: 46px; width: 216px;">\r\n<p>عقار ذو متانة خفيفة معد لتعاطي نشاط صناعي</p>\r\n</td>\r\n<td style="height: 46px; width: 103px;">\r\n<p>الصنف 2:</p>\r\n</td>\r\n</tr>\r\n<tr style="height: 46px;">\r\n<td style="height: 46px; width: 93px;">\r\n<p>1,200</p>\r\n</td>\r\n<td style="height: 46px; width: 93px;">\r\n<p>1,030</p>\r\n</td>\r\n<td style="height: 46px; width: 102px;">\r\n<p>0,860</p>\r\n</td>\r\n<td style="height: 46px; width: 143px;">\r\n<p>0,685</p>\r\n</td>\r\n<td style="height: 46px; width: 216px;">\r\n<p>عقار متين معد لتعاطي نشاط صناعي</p>\r\n</td>\r\n<td style="height: 46px; width: 103px;">\r\n<p>الصنف 3:</p>\r\n</td>\r\n</tr>\r\n<tr style="height: 59px;">\r\n<td style="height: 59px; width: 93px;">\r\n<p>1,575</p>\r\n</td>\r\n<td style="height: 59px; width: 93px;">\r\n<p>1,350</p>\r\n</td>\r\n<td style="height: 59px; width: 102px;">\r\n<p>1,125</p>\r\n</td>\r\n<td style="height: 59px; width: 143px;">\r\n<p>0,900</p>\r\n</td>\r\n<td style="height: 59px; width: 216px;">\r\n<p>عقار تفوق مساحته المغطاة 5000 متر مربع معد لتعاطي نشاط صناعي</p>\r\n</td>\r\n<td style="height: 59px; width: 103px;">\r\n<p>الصنف 4:</p>\r\n</td>\r\n</tr>\r\n</tbody>\r\n</table>\r\n</div>\r\n</div>\r\n</div>\r\n<div class="panel panel-default" style="text-align: right;">\r\n<div id="headingFive" class="panel-heading" role="tab">\r\n<h4 class="panel-title" style="direction: rtl;"><a class="collapsed" role="button" href="#collapseFive" data-toggle="collapse" data-parent="#accordion" aria-expanded="false" aria-controls="collapseFive">المعلوم على النزل</a></h4>\r\n</div>\r\n<div id="collapseFive" class="panel-collapse collapse" style="height: 0px;" role="tabpanel" aria-labelledby="headingFive" aria-expanded="false">\r\n<div class="panel-body">\r\n<p dir="RTL">يستوجب المعلوم على النزل على مستغلي المؤسسات السياحية كما وقع تعريفها بالتشريع الجاري به العمل.</p>\r\n<p dir="RTL"><strong>أساس احتساب المعلوم</strong><br />يحتسب المعلوم على النزل على أساس رقم المعاملات الجملي الخام المحقق.</p>\r\n<p dir="RTL"><strong>نسبة المعلوم</strong><br />حددت نسبة المعلوم على النزل بــ: 2%&nbsp;</p>\r\n</div>\r\n</div>\r\n</div>\r\n<div class="panel panel-default" style="text-align: right;">\r\n<div id="headingSix" class="panel-heading" role="tab">\r\n<h4 class="panel-title" style="direction: rtl;"><a class="collapsed" role="button" href="#collapseSix" data-toggle="collapse" data-parent="#accordion" aria-expanded="false" aria-controls="collapseSix">معلوم الإجازة على بيع المشروبات</a></h4>\r\n</div>\r\n<div id="collapseSix" class="panel-collapse collapse" style="height: 0px;" role="tabpanel" aria-labelledby="headingSix" aria-expanded="false">\r\n<div class="panel-body">\r\n<p style="text-align: right;">يستوجب المعلوم على مستغلي المقاهي والحانات وقاعات الشاي.</p>\r\n<p style="text-align: right;">وقد ضبط الأمر عدد 434 لسنة 1997 المؤرخ في 03 مارس 1997 التعريفة السنوية لمعلوم الإجازة الموظف على محلات بيع المشروبات كما يلي.</p>\r\n<table style="border-color: #000000; width: 71%; float: right;" border="1" width="71%">\r\n<tbody>\r\n<tr>\r\n<td width="38%">\r\n<p><strong>التعريفة بالدينار</strong></p>\r\n</td>\r\n<td width="60%">\r\n<p><strong>صنف المحل</strong></p>\r\n</td>\r\n</tr>\r\n<tr>\r\n<td width="38%">\r\n<p>25</p>\r\n</td>\r\n<td width="60%">\r\n<p>محلات من الصنف الأول</p>\r\n</td>\r\n</tr>\r\n<tr>\r\n<td width="38%">\r\n<p>150</p>\r\n</td>\r\n<td width="60%">\r\n<p>محلات من الصنف الثاني</p>\r\n</td>\r\n</tr>\r\n<tr>\r\n<td width="38%">\r\n<p>300</p>\r\n</td>\r\n<td width="60%">\r\n<p>محلات من الصنف الثالث</p>\r\n</td>\r\n</tr>\r\n</tbody>\r\n</table>\r\n<br /><br /><br /><br /><br /><br /><br /><br />\r\n<p>يستخلص المعلوم خلال شهر جانفي من كل سنة ويستوجب المعلوم على السنة كاملة مهما كان التاريخ الذي بدأ أو انتهى فيه النشاط.</p>\r\n</div>\r\n</div>\r\n</div>\r\n<div class="panel panel-default">\r\n<div id="heading7" class="panel-heading" role="tab">\r\n<h4 class="panel-title" style="direction: rtl; text-align: right;"><a class="collapsed" role="button" href="#collapse7" data-toggle="collapse" data-parent="#accordion" aria-expanded="false" aria-controls="collapse7"> سنة 2019</a></h4>\r\n</div>\r\n<div id="collapse7" class="panel-collapse collapse" style="height: 0px; text-align: right;" role="tabpanel" aria-labelledby="heading7" aria-expanded="false">\r\n<div class="panel-body"><a href="/storage/pages/الجباية%20المحلية2019.pdf" target="_blank" rel="noopener">الجباية المحلية </a></div>\r\n</div>\r\n</div>\r\n</div>', NULL, '[]', '[]', NULL, NULL, NULL, 'fiscalite-locale', 'PUBLISHED', 0, NULL, '2019-11-08 10:01:56', '2019-12-09 10:09:45'),
	(25, 'Copies d\'état civil', 'نسخ من رسم الحالة المدنية', NULL, NULL, NULL, NULL, '[]', '[]', NULL, NULL, NULL, 'copies-d-etat-civil', 'PUBLISHED', 0, NULL, '2019-11-08 10:03:03', '2019-11-08 10:03:03'),
	(26, 'Etablir l\'état civil', 'التنصيص على رسم من الحالة المدنية', NULL, NULL, NULL, NULL, '[]', '[]', NULL, NULL, NULL, 'etablir-l-etat-civil', 'PUBLISHED', 0, NULL, '2019-11-08 10:03:46', '2019-11-08 10:03:46'),
	(27, 'Dossier de Permis de bâtir', 'ملف رخصة بناء', NULL, NULL, '<div id="accordion" class="panel-group accordion" role="tablist" aria-multiselectable="true">\r\n<div class="panel panel-default">\r\n<div id="headingOne" class="panel-heading" role="tab">\r\n<h4 class="panel-title"><a class="collapsed" role="button" href="#collapseOne" data-toggle="collapse" data-parent="#accordion" aria-expanded="false" aria-controls="collapseOne"> الوثائق المكونة لملف رخصة بناء</a></h4>\r\n</div>\r\n<div id="collapseOne" class="panel-collapse collapse" style="height: 0px;" role="tabpanel" aria-labelledby="headingOne" aria-expanded="false">\r\n<div class="panel-body">\r\n<p style="text-align: right;">كل مواطن يرغب في إقامة بناء أو القيام بترميم بناء قديم , أو إجراء إصلاحات عليه مطالب باستخراج رخصة بناء.</p>\r\n<p style="text-align: right;">لأجل ذلك عليه الإستظهار بالوثائق التالية :</p>\r\n<ol style="text-align: right;">\r\n<li>مطلب على ورق عادي ممضى من قبل طالب الرخصة أو من ينوبه.(2 نظائر)</li>\r\n<li>شهادة ملكية أو حكم استحقاقي أو وثيقة أخرى تثبت أن قطعة الأرض المزمع إقامة البناء عليها ملك له.</li>\r\n<li>(2 نظائر(</li>\r\n<li>بطاقة إرشادات فنية تسلم من قبل الإدارة ممضاة من طرف المهندس المعماري مصمم المشروع.(2 نظائر(</li>\r\n<li>مشروع بناء في خمسة نظائر . (5 نظائر(</li>\r\n</ol>\r\n<p style="text-align: right;">&nbsp; وصل إيداع التصريح بالضريبة على دخل الأشخاص الطبيعيين أو الضريبة على الشركات . (5 نظائر(</p>\r\n<ol>\r\n<li style="text-align: right;">شهادة خلاص المعاليم الموظفة على صاحب العقار.</li>\r\n<li style="text-align: right;">دراسة فنية للنجاعة الحرارية للمباني المعدة للسكن الجماعي و للمباني المعدة للمكاتب و التي تفوق مساحتها 500م2 معدة من طرف مهندس معماري أو مكتب دراسات و مصادق عليها من طرف مكتب مراقب مرخص من وزارة التجهيز و الإسكان</li>\r\n<li style="text-align: right;">مذكرة تقديمية (2 نظائر(</li>\r\n<li style="text-align: right;">نسخة من بطاقة التعريف (2 نظائر(</li>\r\n</ol>\r\n</div>\r\n</div>\r\n</div>\r\n<div class="panel panel-default">\r\n<div id="headingTwo" class="panel-heading" role="tab">\r\n<h4 class="panel-title"><a class="collapsed" role="button" href="#collapseTwo" data-toggle="collapse" data-parent="#accordion" aria-expanded="false" aria-controls="collapseTwo"> معاليم رخص البناء </a></h4>\r\n</div>\r\n<div id="collapseTwo" class="panel-collapse collapse" role="tabpanel" aria-labelledby="headingTwo" aria-expanded="false">\r\n<div class="panel-body">\r\n<p style="text-align: right;">المعلوم الموظف على : البناء الفردي، بناء مزدوج أو جماعي وتمديد أو تجديد رخصة بناء.</p>\r\n<table style="border-color: #000000; width: 567px; float: right;" border="1" width="567">\r\n<tbody>\r\n<tr>\r\n<td width="228">\r\n<p>معلوم اضافي (دينار/ &nbsp; المتر المربع(</p>\r\n</td>\r\n<td width="177">\r\n<p>معلوم قار (د(</p>\r\n</td>\r\n<td width="162">\r\n<p>المساحة المغطاة</p>\r\n</td>\r\n</tr>\r\n<tr>\r\n<td width="228">\r\n<p>0,100 د /م &sup2;</p>\r\n</td>\r\n<td width="177">\r\n<p>15.000</p>\r\n</td>\r\n<td width="162">\r\n<p>1 إلى 100م2</p>\r\n</td>\r\n</tr>\r\n<tr>\r\n<td width="228">\r\n<p>0,300 د /م &sup2;</p>\r\n</td>\r\n<td width="177">\r\n<p>60.000</p>\r\n</td>\r\n<td width="162">\r\n<p>1 إلى 200م2</p>\r\n</td>\r\n</tr>\r\n<tr>\r\n<td width="228">\r\n<p>0,400 د /م &sup2;</p>\r\n</td>\r\n<td width="177">\r\n<p>120.000</p>\r\n</td>\r\n<td width="162">\r\n<p>1 إلى 300م2</p>\r\n</td>\r\n</tr>\r\n<tr>\r\n<td width="228">\r\n<p>0,600 د /م &sup2;</p>\r\n</td>\r\n<td width="177">\r\n<p>300.000</p>\r\n</td>\r\n<td width="162">\r\n<p>1 إلى 400م2</p>\r\n</td>\r\n</tr>\r\n<tr>\r\n<td width="228">\r\n<p>1,000 د /م &sup2;</p>\r\n</td>\r\n<td width="177">\r\n<p>750.000</p>\r\n</td>\r\n<td width="162">\r\n<p>أكثر من 400م2</p>\r\n</td>\r\n</tr>\r\n</tbody>\r\n</table>\r\n</div>\r\n</div>\r\n</div>\r\n</div>', NULL, '[]', '[]', NULL, NULL, NULL, 'dossier-de-permis-de-batir', 'PUBLISHED', 0, NULL, '2019-11-08 10:26:34', '2019-11-12 14:48:21'),
	(28, 'Autorisation de raccordement aux réseaux publics(SONEDE,STEG)', 'رخصة ربط بشبكة الكهرباء و الماء', NULL, NULL, '<div id="accordion" class="panel-group accordion" role="tablist" aria-multiselectable="true">\r\n<div class="panel panel-default">\r\n<div id="headingOne" class="panel-heading" role="tab">\r\n<h4 class="panel-title"><a class="collapsed" role="button" href="#collapseOne" data-toggle="collapse" data-parent="#accordion" aria-expanded="false" aria-controls="collapseOne"> المراجع التشريعية و الترتيبية:</a></h4>\r\n</div>\r\n<div id="collapseOne" class="panel-collapse collapse" style="height: 0px;" role="tabpanel" aria-labelledby="headingOne" aria-expanded="false">\r\n<div class="panel-body">\r\n<ol>\r\n<li>الفصل81 الفقرة الأولى من القانون الأساسي للبلديات عدد 33 لسنة 1975 المؤرخ في 14 ماي 1975 كما تم إتمامه وتنقيحه بالنصوص اللاحقة،</li>\r\n<li>القانون عدد 122 لسنة 1994 المؤرخ في 28 نوفمبر 1994 المتعلق بإصدار مجلة التهيئة الترابية والتعميركما تم إتمامه و تنقيحه بالنصوص اللاحقة</li>\r\n<li>القرار البلدي المتعلق بضبط تعريفة المعاليم المرخص للجماعات المحلية في استخلاصها.</li>\r\n</ol>\r\n</div>\r\n</div>\r\n</div>\r\n<div class="panel panel-default">\r\n<div id="headingTwo" class="panel-heading" role="tab">\r\n<h4 class="panel-title"><a class="collapsed" role="button" href="#collapseTwo" data-toggle="collapse" data-parent="#accordion" aria-expanded="false" aria-controls="collapseTwo"> شروط الانتفاع بالخدمة </a></h4>\r\n</div>\r\n<div id="collapseTwo" class="panel-collapse collapse" role="tabpanel" aria-labelledby="headingTwo" aria-expanded="false">\r\n<div class="panel-body">\r\n<ol>\r\n<li>يجب أن يكون المحل موضوع طلب الترخيص مبنيا وفقا لرخصة بناء.</li>\r\n<li>إذا كان المحل المعني غير مبني وفقا لرخصة بناء، فإنه يتم اتخاذ قرار اسناد الترخيص من عدمه عن طريق لجنة فنية خاصة مكونة للغرض.</li>\r\n</ol>\r\n</div>\r\n</div>\r\n</div>\r\n<div class="panel panel-default">\r\n<div id="headingOne" class="panel-heading" role="tab">\r\n<h4 class="panel-title"><a class="collapsed" role="button" href="#collapseFour" data-toggle="collapse" data-parent="#accordion" aria-expanded="false" aria-controls="collapseFour"> مكـــــان إيــــداع الملــــف:</a></h4>\r\n</div>\r\n<div id="collapseFour" class="panel-collapse collapse" style="height: 0px;" role="tabpanel" aria-labelledby="headingOne" aria-expanded="false">\r\n<div class="panel-body">\r\n<p>- المصلحة الفنية ذات النظر بالبلدية أو بالدائرة البلدية</p>\r\n</div>\r\n</div>\r\n</div>\r\n<div class="panel panel-default">\r\n<div id="headingOne" class="panel-heading" role="tab">\r\n<h4 class="panel-title"><a class="collapsed" role="button" href="#collapseFive" data-toggle="collapse" data-parent="#accordion" aria-expanded="false" aria-controls="collapseFive"> مكان الحصول على الخدمة :</a></h4>\r\n</div>\r\n<div id="collapseFive" class="panel-collapse collapse" style="height: 0px;" role="tabpanel" aria-labelledby="headingOne" aria-expanded="false">\r\n<div class="panel-body">\r\n<p>- المصلحة الفنية ذات النظر بالبلدية أو الدائرة البلدية</p>\r\n</div>\r\n</div>\r\n</div>\r\n<div class="panel panel-default">\r\n<div id="headingOne" class="panel-heading" role="tab">\r\n<h4 class="panel-title"><a class="collapsed" role="button" href="#collapseSix" data-toggle="collapse" data-parent="#accordion" aria-expanded="false" aria-controls="collapseSix"> أجل الحصول على الخدمة</a></h4>\r\n</div>\r\n<div id="collapseSix" class="panel-collapse collapse" style="height: 0px;" role="tabpanel" aria-labelledby="headingOne" aria-expanded="false">\r\n<div class="panel-body">\r\n<p>15 يوما من تاريخ إيداع المطلب.</p>\r\n</div>\r\n</div>\r\n</div>\r\n<div class="panel panel-default">\r\n<div id="heading7" class="panel-heading" role="tab">\r\n<h4 class="panel-title"><a class="collapsed" role="button" href="#collapse7" data-toggle="collapse" data-parent="#accordion" aria-expanded="false" aria-controls="collapse7">ملاحظــــات</a></h4>\r\n</div>\r\n<div id="collapse7" class="panel-collapse collapse" style="height: 0px;" role="tabpanel" aria-labelledby="heading7" aria-expanded="false">\r\n<div class="panel-body">\r\n<ul>\r\n<li>كل عقار يمثل وحدة مستقلة يمكن أن تسند في شأنه رخصة واحدة سواء للربط بشبكة الماء أو الكهرباء.</li>\r\n<li>كل رخصة مسندة تخول تركيز عداد واحد لا غير.</li>\r\n</ul>\r\n</div>\r\n</div>\r\n</div>\r\n</div>', NULL, '[]', '[]', NULL, NULL, NULL, 'autorisation-de-raccordement-aux-reseaux-publics-sonede-steg', 'PUBLISHED', 0, NULL, '2019-11-08 10:39:48', '2019-11-08 10:40:43'),
	(29, 'Autorisation de raccordement aux réseaux publics ONAS', 'رخصة ربط بشبكة التطهير', NULL, NULL, '<div id="accordion" class="panel-group accordion" role="tablist" aria-multiselectable="true">\r\n<div class="panel panel-default" style="text-align: right;">\r\n<div id="headingFour" class="panel-heading" role="tab">\r\n<h4 class="panel-title" style="direction: rtl;"><a class="collapsed" role="button" href="#collapseFour" data-toggle="collapse" data-parent="#accordion" aria-expanded="false" aria-controls="collapseFour">المراجع التشريعية و الترتيبية</a></h4>\r\n</div>\r\n<div id="collapseFour" class="panel-collapse collapse" style="height: 0px;" role="tabpanel" aria-labelledby="headingFour" aria-expanded="false">\r\n<div class="panel-body">\r\n<p style="text-align: right;">- القانون الأساسي للبلديات عدد 33 لسنة 1975 المؤرخ في 14 ماي 1975 و النصوص المنقحة و المتممة له و خاصة القانون الأساسي عدد 48 لسنة 2006 المؤرخ في 17 جويلية 2006.</p>\r\n<p style="text-align: right;">- القانون عدد 122 لمنة 1994 المؤرخ في 28 نوفمبر 1994 المتعلق بإصدار مجلة التهيئة الترابية و التعمير.</p>\r\n</div>\r\n</div>\r\n</div>\r\n<div class="panel panel-default">\r\n<div id="headingOne" class="panel-heading" role="tab">\r\n<h4 class="panel-title" style="direction: rtl; text-align: right;"><a class="collapsed" role="button" href="#collapseOne" data-toggle="collapse" data-parent="#accordion" aria-expanded="false" aria-controls="collapseOne"> شروط الانتفاع بالخدمة</a></h4>\r\n</div>\r\n<div id="collapseOne" class="panel-collapse collapse" style="height: 0px; text-align: right;" role="tabpanel" aria-labelledby="headingOne" aria-expanded="false">\r\n<div class="panel-body">\r\n<p style="text-align: right;">- المحل المبني وفقا لرخصة بناء ليس في حاجة إلى ترخيص. يمكن للمو١طن الإتصال مباشرة بالديوان الوطني للتطهير(ONAS).</p>\r\n<p style="text-align: right;">- إذا كان المحل المعني غير مبني وفقا لرخصة بناء، فإنه يتم اتخاذ قرار اسناد الترخيص من عدمه عن طريق لجنة فنية خاصة مكونة للغرض.</p>\r\n</div>\r\n</div>\r\n</div>\r\n<div class="panel panel-default" style="text-align: right;">\r\n<div id="headingTwo" class="panel-heading" role="tab">\r\n<h4 class="panel-title" style="direction: rtl;"><a class="collapsed" role="button" href="#collapseTwo" data-toggle="collapse" data-parent="#accordion" aria-expanded="false" aria-controls="collapseTwo">الوثائق المطلوبة</a></h4>\r\n</div>\r\n<div id="collapseTwo" class="panel-collapse collapse" role="tabpanel" aria-labelledby="headingTwo" aria-expanded="false">\r\n<div class="panel-body">\r\n<p style="text-align: right;">1. مطلب على ورق عادي ممضى من قبل الطالب ومتضمنا للبيانات الضرورية: العنوان و مراجع رخصة البناء.</p>\r\n<p style="text-align: right;">2. شهادة ملكية أو مايعادلها للعقار موضوع الطلب.</p>\r\n<p style="text-align: right;">٠3 شهادة ابراء في خلاص المعاليم البلدية آلموظفة على كل العقارات داخل المنطقة البلدية.</p>\r\n</div>\r\n</div>\r\n</div>\r\n<div class="panel panel-default" style="text-align: right;">\r\n<div id="headingThree" class="panel-heading" role="tab">\r\n<h4 class="panel-title" style="direction: rtl;"><a class="collapsed" role="button" href="#collapseThree" data-toggle="collapse" data-parent="#accordion" aria-expanded="false" aria-controls="collapseThree">الأجال</a></h4>\r\n</div>\r\n<div id="collapseThree" class="panel-collapse collapse" role="tabpanel" aria-labelledby="headingThree" aria-expanded="false">\r\n<div class="panel-body">\r\n<p style="text-align: right;">في أجل شهر بداية من تاريخ ايداع الملف.</p>\r\n</div>\r\n</div>\r\n</div>\r\n<div class="panel panel-default" style="text-align: right;">\r\n<div id="headingFive" class="panel-heading" role="tab">\r\n<h4 class="panel-title" style="direction: rtl;"><a class="collapsed" role="button" href="#collapseFive" data-toggle="collapse" data-parent="#accordion" aria-expanded="false" aria-controls="collapseFive">إجراءات إنجاز الخدمة</a></h4>\r\n</div>\r\n<div id="collapseFive" class="panel-collapse collapse" style="height: 0px;" role="tabpanel" aria-labelledby="headingFive" aria-expanded="false">\r\n<div class="panel-body">\r\n<p style="text-align: right;">- استلام الملف</p>\r\n<p style="text-align: right;">- دراسة الملف و اجراء المعاينات الميدانية</p>\r\n<p style="text-align: right;">- عرض الملف على اللجنة المحلية</p>\r\n<p style="text-align: right;">- تسليم الرخصة للمواطن</p>\r\n</div>\r\n</div>\r\n</div>\r\n</div>', NULL, '[]', '[]', NULL, NULL, NULL, 'autorisation-de-raccordement-aux-reseaux-publics-onas', 'PUBLISHED', 0, NULL, '2019-11-08 10:43:26', '2019-11-08 10:49:03'),
	(30, 'Autorisations D\'occupation', 'رخصة إشغال', NULL, NULL, NULL, NULL, '[]', '[]', NULL, NULL, NULL, 'autorisations-d-occupation', 'PUBLISHED', 0, NULL, '2019-11-08 10:50:56', '2019-11-08 10:52:31'),
	(31, 'Autorisations Économiques', 'التراخيص الإقتصادية', NULL, NULL, '<h5 dir="rtl">&nbsp;</h5>\r\n<h5 dir="rtl"><span style="color: #ff0000;">رخصة في الإشغال الوقتي للطريق العام :</span></h5>\r\n<p dir="rtl"><span style="color: #000000;">-مطلب باسم السيد رئيس البلدية محرر على ورق عادي يتضمن النشاطa , المساحة و فترة الإشغال.</span></p>\r\n<p dir="rtl"><span style="color: #000000;">-نسخة من بطاقة التعريف الوطنية .</span></p>\r\n<p dir="rtl"><span style="color: #000000;">-مثال موقعي لمكان المزمع الإنتصاب به .</span></p>\r\n<p dir="rtl"><span style="color: #000000;">-المعلوم : حسب المساحة المستغلة و فترة الإشغال ( 150 مليم بحساب المتر المربع في اليوم ).</span></p>\r\n<h5 dir="rtl"><span style="color: #ff0000;">رخصة تركيز العلامات الإشهارية ذات الصبغة التجارية على المحلات المفتوحة للعموم و على الملك العمومي البلدي :</span></h5>\r\n<p dir="rtl">&nbsp;<span style="color: #000000;">-مطلب باسم السيد رئيس البلدية محرر على ورق عادي يتضمن&nbsp; مساحة المعلقة الإشهارية و مكان المحل أو الملك العمومي البلدي .</span></p>\r\n<p dir="rtl"><span style="color: #000000;">-نسخة من بطاقة التعريف الوطنية .</span></p>\r\n<p dir="rtl"><span style="color: #000000;">-نسخة من بطاقة التعريف الجبائية .</span></p>', NULL, '[]', '[]', NULL, NULL, NULL, 'autorisations-economiques', 'PUBLISHED', 0, NULL, '2019-11-08 10:52:11', '2019-11-08 11:03:31'),
	(33, 'Les commissions des permis de bâtir', NULL, NULL, NULL, NULL, NULL, '[]', '[]', NULL, NULL, NULL, 'les-commissions-des-permis-de-batir', 'PUBLISHED', 0, NULL, '2019-11-08 11:09:49', '2019-11-08 11:09:49'),
	(34, 'Accès aux documents administratifs', 'النفاذ إلى الوثائق الإدراية', NULL, '<div id="accordion" class="panel-group accordion" role="tablist" aria-multiselectable="true">\r\n<div class="panel panel-default">\r\n<div id="headingOne" class="panel-heading" role="tab">\r\n<h4 class="panel-title"><a class="collapsed" role="button" href="#collapseFive" data-toggle="collapse" data-parent="#accordion" aria-expanded="false" aria-controls="collapseFive"> Le cadre r&eacute;glementaire d\'acc&egrave;s aux documents administratifs</a></h4>\r\n</div>\r\n<div id="collapseFive" class="panel-collapse collapse" style="height: 0px;" role="tabpanel" aria-labelledby="headingOne" aria-expanded="false">\r\n<div class="panel-body">D&eacute;cret-loi n&deg; 2011-41 du 26 mai 2011, relatif &agrave; l\'acc&egrave;s aux documents administratifs des organismes publics<br /><a href="/storage/Acces-aux-documents-administratifs/Decret-loi2011_54.pdf" target="_blank" rel="noopener noreferrer">D&eacute;cret-loi n&deg; 2011-54 du 11 juin 2011</a>, modifiant et compl&eacute;tant <a href="/storage/Acces-aux-documents-administratifs/Decret-loi2011_41.pdf" target="_blank" rel="noopener noreferrer">le d&eacute;cret-loi n&deg; 2011-41 du 26 mai 2011</a> relatif &agrave; l\'acc&egrave;s aux documents administratifs des organismes publics.<br /><a href="/storage/Acces-aux-documents-administratifs/circulaire25-05mai2012.pdf" target="_blank" rel="noopener noreferrer">Circulaire n&deg; 25 du 05 mai 2012</a> relative &agrave; l\'acc&egrave;s aux documents administratifs des organismes publics.<br /><a href="/storage/Acces-aux-documents-administratifs/loi22.pdf" target="_blank" rel="noopener noreferrer">Loi organique relative au droit d\'acc&egrave;s &agrave; l\'information (Ar)</a>.</div>\r\n</div>\r\n</div>\r\n<div class="panel panel-default">\r\n<div id="headingOne" class="panel-heading" role="tab">\r\n<h4 class="panel-title"><a class="collapsed" role="button" href="#collapseSix" data-toggle="collapse" data-parent="#accordion" aria-expanded="false" aria-controls="collapseSix"> Politique d\'acc&egrave;s aux documents administratifs</a></h4>\r\n</div>\r\n<div id="collapseSix" class="panel-collapse collapse" style="height: 0px;" role="tabpanel" aria-labelledby="headingOne" aria-expanded="false">\r\n<div class="panel-body">L\'Open Data d&eacute;signe le mouvement visant &agrave; rendre accessible &agrave; tous ,via le web ,les donn&eacute;es publiques non nominatives ne relevant ni de la vie priv&eacute;e et ni de la s&eacute;curit&eacute; collect&eacute;es par les organismes public<br />Pour d&eacute;finir ce concept on peut se r&eacute;f&eacute;rer &agrave; la d&eacute;finition avanc&eacute;e par le site <a href="http://www.opendefinition.org/government/" target="_blank" rel="noopener noreferrer">www.opendefinition.org/government/</a> qui la d&eacute;finit comme &eacute;tant : &laquo; Les donn&eacute;es qu\'on peut acc&eacute;der ; r&eacute;utiliser et redistribuer librement &raquo;. Ainsi une donn&eacute;e ouverte doit ob&eacute;ir &agrave; trois crit&egrave;res <br />Libre acc&egrave;s,<br />Libre r&eacute;utilisation,<br />Libre redistribution.<br />Les promoteurs de l\'OpenData &agrave; l\'&eacute;chelle internationale, ont d&eacute;velopp&eacute; des d&eacute;finitions formelles des crit&egrave;res qui caract&eacute;risent les donn&eacute;es ouvertes. Les crit&eacute;res les plus utilis&eacute;s sont ceux qui sont propos&eacute;es par l\'Open Knowledge Foundation (OKFN) et qui sont les suivants :<br />Compl&egrave;tes : Toutes les donn&eacute;es sont mises &agrave; disposition. Les donn&eacute;es publiques sont des donn&eacute;es qui ne sont pas sujettes &agrave; des limitations valables concernant la vie priv&eacute;e, la s&eacute;curit&eacute; ou des privil&egrave;ges d\'acc&egrave;s.<br />Primaires ou brutes : Les donn&eacute;es sont telles que collect&eacute;es &agrave; la source, avec la plus grande granularit&eacute; possible, et ne se pr&eacute;sentent pas sous des formes agr&eacute;g&eacute;es ou modifi&eacute;es.\r\n<p>&nbsp;</p>\r\n<p>&bull;Opportunes ou r&eacute;centes : Elles sont mises &agrave; disposition aussi rapidement que n&eacute;cessaire pour pr&eacute;server leur valeur.</p>\r\n<p>&bull;Accessibles : Les donn&eacute;es sont accessibles au plus grand &eacute;ventail d\'utilisateurs possible et pour des usages aussi divers que possible.</p>\r\n<p>&bull;Lisibles par des machines : Les donn&eacute;es sont structur&eacute;es pour permettre le traitement automatis&eacute; et disponibles sous une forme pratique et modifiable.</p>\r\n<p>&bull;Conditions non discriminatoires : les donn&eacute;es sont accessibles &agrave; quiconque sans aucune obligation pr&eacute;alable ni inscription, et sans discrimination entre les domaines d\'application. Les donn&eacute;es sont notamment disponibles aussi bien pour des r&eacute;utilisations commerciales que personnelles.</p>\r\n<p>&bull;Formats non-propri&eacute;taires : les donn&eacute;es sont accessibles dans un format sur lequel aucune entit&eacute; n\'a de contr&ocirc;le exclusif.</p>\r\n<p>&bull;Donn&eacute;es libres de droits : les donn&eacute;es ne sont pas soumises au droit d\'auteur, &agrave; un brevet, aux droits des marques, ou au secret commercial. Des r&egrave;gles raisonnables de confidentialit&eacute;, de s&eacute;curit&eacute; et de priorit&eacute; d\'acc&egrave;s peuvent &ecirc;tre admises.</p>\r\n<p>A cot&eacute; de ce bouquet de crit&egrave;res qui d&eacute;finissent une donn&eacute;e ouverte, d\'autres crit&egrave;res r&eacute;gissent la r&eacute;utilisation des donn&eacute;es ouvertes et qui doivent &ecirc;tre mentionn&eacute;s au niveau de la licence de r&eacute;utilisation. Ces crit&egrave;res sont :<br />Paternit&eacute; : la licence peut exiger, comme condition pour la redistribution et la r&eacute;utilisation des donn&eacute;es, d\'identifier clairement les cr&eacute;ateurs de l\'&oelig;uvre ou les contributeurs initiaux. Si cette condition est impos&eacute;e, elle ne doit pas &ecirc;tre ind&ucirc;ment complexe &agrave; remplir, et notamment la liste des contributeurs &agrave; citer doit &ecirc;tre clairement indiqu&eacute;e.<br />Distribution de la licence : les droits attach&eacute;s aux donn&eacute;es s\'appliquent &agrave; tous ceux &agrave; qui elles sont distribu&eacute;es.<br />Non-transitivit&eacute; de la licence : la licence ne peut exiger que toute donn&eacute;e distribu&eacute;e conjointement avec une donn&eacute;e sous licence libre soit aussi elle-m&ecirc;me sous licence libre, ce qui serait un frein &agrave; la r&eacute;utilisation de ces donn&eacute;es.<br />Droit d\'extraction : si les donn&eacute;es sont extraites d\'un jeu de donn&eacute;es, les utilisateurs de l\'extrait doivent b&eacute;n&eacute;ficier des m&ecirc;mes droits que ceux qui sont accord&eacute;s au jeu de donn&eacute;es dans son ensemble .Bien que ce mod&egrave;le des donn&eacute;es ouvertes puisse s\'appliquer &agrave; tous types de donn&eacute;es, qu\'elles soient produites par le secteur public ou non, l\'importance d&eacute;mocratique de l\'acc&egrave;s aux informations publiques a conduit &agrave; focaliser le d&eacute;bat sur l\'Open Government Data, ou la r&eacute;utilisation des donn&eacute;es publiques.</p>\r\n</div>\r\n</div>\r\n</div>\r\n<div class="panel panel-default">\r\n<div id="headingOne" class="panel-heading" role="tab">\r\n<h4 class="panel-title"><a class="collapsed" role="button" href="#collapseFour" data-toggle="collapse" data-parent="#accordion" aria-expanded="false" aria-controls="collapseFour"> Les demandes d\'acc&egrave;s aux documents administratifs</a></h4>\r\n</div>\r\n<div id="collapseFour" class="panel-collapse collapse" style="height: 0px;" role="tabpanel" aria-labelledby="headingOne" aria-expanded="false">\r\n<div class="panel-body">&bull; demande d\'acc&egrave;s a un document administratif<br />&bull; demande de contestation\r\n<p>&nbsp;</p>\r\n</div>\r\n</div>\r\n</div>\r\n<div class="panel panel-default">\r\n<div id="headingTwo" class="panel-heading" role="tab">\r\n<h4 class="panel-title"><a class="collapsed" role="button" href="#collapseTwo" data-toggle="collapse" data-parent="#accordion" aria-expanded="false" aria-controls="collapseTwo"> Donn&eacute;es sp&eacute;cifiques </a></h4>\r\n</div>\r\n<div id="collapseTwo" class="panel-collapse collapse" role="tabpanel" aria-labelledby="headingTwo" aria-expanded="false">\r\n<div class="panel-body">&bull;Liste des charg&eacute;s d\'acc&egrave;s aux documents administratifs (Ar)<br />pour plus de d&eacute;tails, visitez le site web de l\'open data <a href="http://www.data.gov.tn" target="_blank" rel="noopener noreferrer">www.data.gov.tn&nbsp;</a>\r\n<p>&nbsp;</p>\r\n</div>\r\n</div>\r\n</div>\r\n<div class="panel panel-default">\r\n<div id="heading10" class="panel-heading" role="tab">\r\n<h4 class="panel-title"><a class="collapsed" role="button" href="#collapse10" data-toggle="collapse" data-parent="#accordion" aria-expanded="false" aria-controls="collapse10"> Donn&eacute;es sp&eacute;cifiques </a></h4>\r\n</div>\r\n<div id="collapse10" class="panel-collapse collapse" role="tabpanel" aria-labelledby="heading10" aria-expanded="false">\r\n<div class="panel-body">\r\n<ul>\r\n<li><a href="/storage/demande_access/المكلفين%20بالنفاذ%20للمعلومة.pdf" target="_blank" rel="noopener">Donn&eacute;es de confidentialit&eacute;</a></li>\r\n</ul>\r\n</div>\r\n</div>\r\n</div>\r\n</div>', '<div id="accordion" class="panel-group accordion" role="tablist" aria-multiselectable="true">\r\n<div class="panel panel-default">\r\n<div id="headingOne" class="panel-heading" role="tab">\r\n<h4 class="panel-title"><a class="collapsed" role="button" href="#collapseOne" data-toggle="collapse" data-parent="#accordion" aria-expanded="false" aria-controls="collapseOne"> النصوص القانونية المتعلقة بالبيانات المفتوحة</a></h4>\r\n</div>\r\n<div id="collapseOne" class="panel-collapse collapse" style="height: 0px;" role="tabpanel" aria-labelledby="headingOne" aria-expanded="false">\r\n<div class="panel-body">\r\n<ol>\r\n<li dir="rtl" style="text-align: right;"><a style="line-height: 1.3em;" href="/storage/Acces-aux-documents-administratifs/loi22.pdf" target="_blank" rel="noopener noreferrer">القانون الأساسي عدد 22 المتعلق بالنفاذ إلي المعلومة</a></li>\r\n<li dir="rtl" style="text-align: right;"><a title="منشور عدد 19 الخاص بالنفاذ للمعلومة" href="/storage/Acces-aux-documents-administratifs/decret19.pdf" target="_blank" rel="noopener noreferrer">منشور عدد 19 الخاص بالنفاذ للمعلومة</a></li>\r\n<li><a href="/storage/Acces-aux-documents-administratifs/demande01.pdf" target="_blank" rel="noopener noreferrer">مطلب النفاذ للمعلومة</a></li>\r\n<li><a href="/storage/Acces-aux-documents-administratifs/demande02.pdf" target="_blank" rel="noopener noreferrer">مطلب تظلم</a></li>\r\n</ol>\r\n</div>\r\n</div>\r\n</div>\r\n<div class="panel panel-default">\r\n<div id="headingTwo" class="panel-heading" role="tab">\r\n<h4 class="panel-title"><a class="collapsed" role="button" href="#collapseTwo" data-toggle="collapse" data-parent="#accordion" aria-expanded="false" aria-controls="collapseTwo">بيانات خصوصية </a></h4>\r\n</div>\r\n<div id="collapseTwo" class="panel-collapse collapse" role="tabpanel" aria-labelledby="headingTwo" aria-expanded="false">\r\n<div class="panel-body">\r\n<ol>\r\n<li dir="rtl"><a title="المكلفين بالنفاذ للمعلومة" href="/storage/demande_access/المكلفين%20بالنفاذ%20للمعلومة.pdf" target="_blank" rel="noopener">المكلفين بالنفاذ للمعلومة</a></li>\r\n</ol>\r\n</div>\r\n</div>\r\n</div>\r\n</div>', NULL, '[]', '[]', NULL, NULL, NULL, 'acces-aux-documents-administratifs', 'PUBLISHED', 0, NULL, '2019-11-08 11:19:06', '2019-12-06 15:18:06'),
	(53, 'Protection socio-environnemental', 'حماية البيئة و المحيط', NULL, NULL, NULL, NULL, '[]', '[]', NULL, NULL, NULL, 'protection-socio-environnemental', 'PUBLISHED', 0, NULL, '2019-11-08 12:37:16', '2019-11-08 12:37:16');
/*!40000 ALTER TABLE `articles` ENABLE KEYS */;

-- Listage de la structure de la table commune_makther. articles_travaux_associations
CREATE TABLE IF NOT EXISTS `articles_travaux_associations` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `titre_fr` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `description_fr` text COLLATE utf8mb4_unicode_ci,
  `titre_ar` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `description_ar` text COLLATE utf8mb4_unicode_ci,
  `seo_title` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `meta_description` text COLLATE utf8mb4_unicode_ci,
  `meta_keywords` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `status` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `slug` varchar(150) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `featured` tinyint(4) DEFAULT NULL,
  `date_publication` date DEFAULT NULL,
  `lienDocument` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `nomAssociation` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Listage des données de la table commune_makther.articles_travaux_associations : ~0 rows (environ)
/*!40000 ALTER TABLE `articles_travaux_associations` DISABLE KEYS */;
/*!40000 ALTER TABLE `articles_travaux_associations` ENABLE KEYS */;

-- Listage de la structure de la table commune_makther. association
CREATE TABLE IF NOT EXISTS `association` (
  `matricule` varchar(20) NOT NULL,
  `num_autorisation` int(15) NOT NULL,
  `date_autorisation` date NOT NULL,
  `nom_societe` varchar(30) NOT NULL,
  `domaine_interet` varchar(30) NOT NULL,
  `adresse` varchar(20) NOT NULL,
  `email` varchar(30) NOT NULL,
  `president` varchar(20) NOT NULL,
  `banque` varchar(30) NOT NULL,
  `agence` varchar(30) NOT NULL,
  `RIB` varchar(20) NOT NULL,
  `tel` int(12) NOT NULL,
  `fax` int(12) NOT NULL,
  `gsm_president` int(12) NOT NULL,
  `Vis_president` varchar(20) NOT NULL,
  `gsm_vis_president` int(12) NOT NULL,
  `interlocuteur` varchar(20) NOT NULL,
  `fonction_interlocuteur` varchar(20) NOT NULL,
  `gsm_nterlocuteur` int(12) NOT NULL,
  `nbre_Membres` int(5) NOT NULL,
  `login` varchar(15) NOT NULL,
  `mot_passe` varchar(20) NOT NULL,
  `etat` int(2) NOT NULL,
  `confirmer_par` varchar(100) NOT NULL,
  `suspendu_par` varchar(100) NOT NULL,
  `date_confirmer` date NOT NULL,
  `date_suspension` date NOT NULL,
  `raison_suspension` text NOT NULL,
  PRIMARY KEY (`matricule`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- Listage des données de la table commune_makther.association : ~2 rows (environ)
/*!40000 ALTER TABLE `association` DISABLE KEYS */;
INSERT INTO `association` (`matricule`, `num_autorisation`, `date_autorisation`, `nom_societe`, `domaine_interet`, `adresse`, `email`, `president`, `banque`, `agence`, `RIB`, `tel`, `fax`, `gsm_president`, `Vis_president`, `gsm_vis_president`, `interlocuteur`, `fonction_interlocuteur`, `gsm_nterlocuteur`, `nbre_Membres`, `login`, `mot_passe`, `etat`, `confirmer_par`, `suspendu_par`, `date_confirmer`, `date_suspension`, `raison_suspension`) VALUES
	('123', 123, '2020-11-11', 'wxXS', 'SCSCSC', 'SCXSCSC', 'leradouen@hotmail.fr', 'ssdsdsd', 'sdSDsd', 'SDdsDSDS', '252252525', 0, 2147483647, 12312323, 'SQDQDSSD', 12323132, 'QSDFDFF', 'QFQDFQDF', 1232134134, 20, '123', '123', 2, 'admin', '', '2019-12-17', '0000-00-00', ''),
	('12345', 12354, '2000-02-02', 'societe test', 'domaine test', 'adresse test', 'walidhamda91@gmail.com', 'walid', 'zitouna', 'agence haidra', '1234567891234678911', 77112255, 77445566, 99669966, 'chedli', 22336655, 'mariem', 'ing', 55665588, 50, '12354', '12354', 2, 'admin', '', '2018-03-01', '0000-00-00', '');
/*!40000 ALTER TABLE `association` ENABLE KEYS */;

-- Listage de la structure de la table commune_makther. a_propos
CREATE TABLE IF NOT EXISTS `a_propos` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `titre_fr` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `titre_ar` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `titre_en` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `description_fr` text COLLATE utf8mb4_unicode_ci,
  `description_ar` text COLLATE utf8mb4_unicode_ci,
  `description_en` text COLLATE utf8mb4_unicode_ci,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Listage des données de la table commune_makther.a_propos : ~0 rows (environ)
/*!40000 ALTER TABLE `a_propos` DISABLE KEYS */;
/*!40000 ALTER TABLE `a_propos` ENABLE KEYS */;

-- Listage de la structure de la table commune_makther. budget_partcipatifs
CREATE TABLE IF NOT EXISTS `budget_partcipatifs` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `Annee` int(11) DEFAULT NULL,
  `titre_ar` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `titre_fr` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `TypeBudget` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `Document` text COLLATE utf8mb4_unicode_ci,
  `seo_title` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `meta_description` text COLLATE utf8mb4_unicode_ci,
  `meta_keywords` text COLLATE utf8mb4_unicode_ci,
  `slug` varchar(150) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `status` longtext COLLATE utf8mb4_unicode_ci,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Listage des données de la table commune_makther.budget_partcipatifs : ~0 rows (environ)
/*!40000 ALTER TABLE `budget_partcipatifs` DISABLE KEYS */;
/*!40000 ALTER TABLE `budget_partcipatifs` ENABLE KEYS */;

-- Listage de la structure de la table commune_makther. categories
CREATE TABLE IF NOT EXISTS `categories` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `parent_id` int(10) unsigned DEFAULT NULL,
  `order` int(11) NOT NULL DEFAULT '1',
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `slug` varchar(150) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `categories_slug_unique` (`slug`),
  KEY `categories_parent_id_foreign` (`parent_id`),
  CONSTRAINT `categories_parent_id_foreign` FOREIGN KEY (`parent_id`) REFERENCES `categories` (`id`) ON DELETE SET NULL ON UPDATE CASCADE
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Listage des données de la table commune_makther.categories : ~0 rows (environ)
/*!40000 ALTER TABLE `categories` DISABLE KEYS */;
INSERT INTO `categories` (`id`, `parent_id`, `order`, `name`, `slug`, `created_at`, `updated_at`) VALUES
	(5, NULL, 1, 'Avis', 'avis', '2019-10-11 16:21:15', '2019-10-11 16:21:15');
/*!40000 ALTER TABLE `categories` ENABLE KEYS */;

-- Listage de la structure de la table commune_makther. communes
CREATE TABLE IF NOT EXISTS `communes` (
  `id` int(11) NOT NULL,
  `email` varchar(100) DEFAULT '',
  `titre_fr` varchar(400) CHARACTER SET utf8 DEFAULT NULL,
  `titre_ar` varchar(400) CHARACTER SET utf8 DEFAULT NULL,
  `tel` varchar(15) DEFAULT NULL,
  `fax` varchar(15) DEFAULT NULL,
  `adresse_fr` varchar(400) CHARACTER SET utf8 DEFAULT NULL,
  `adresse_ar` varchar(400) CHARACTER SET utf8 DEFAULT NULL,
  `site_web` varchar(400) DEFAULT NULL,
  `email_contact` varchar(100) DEFAULT '',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- Listage des données de la table commune_makther.communes : ~0 rows (environ)
/*!40000 ALTER TABLE `communes` DISABLE KEYS */;
INSERT INTO `communes` (`id`, `email`, `titre_fr`, `titre_ar`, `tel`, `fax`, `adresse_fr`, `adresse_ar`, `site_web`, `email_contact`) VALUES
	(1, 'communemaakthar@gmail.com', 'Commune Makthar', 'بلدية مكثر', '', '', '', '', '', 'laabidimariem44@gmail.com');
/*!40000 ALTER TABLE `communes` ENABLE KEYS */;

-- Listage de la structure de la table commune_makther. conseil_municipales
CREATE TABLE IF NOT EXISTS `conseil_municipales` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `Annee` int(11) DEFAULT NULL,
  `titre_ar` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `titre_fr` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `TitreEN` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `TypeConseil` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `FichierConseil` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `seo_title` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `meta_description` text COLLATE utf8mb4_unicode_ci,
  `meta_keywords` text COLLATE utf8mb4_unicode_ci,
  `slug` varchar(150) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `status` longtext COLLATE utf8mb4_unicode_ci,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Listage des données de la table commune_makther.conseil_municipales : ~0 rows (environ)
/*!40000 ALTER TABLE `conseil_municipales` DISABLE KEYS */;
/*!40000 ALTER TABLE `conseil_municipales` ENABLE KEYS */;

-- Listage de la structure de la table commune_makther. contacts
CREATE TABLE IF NOT EXISTS `contacts` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `fax` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `telephone` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `adresse_fr` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `adresse_ar` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `adresse_en` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `seo_title` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `meta_description` text COLLATE utf8mb4_unicode_ci,
  `meta_keywords` text COLLATE utf8mb4_unicode_ci,
  `status` longtext CHARACTER SET utf8mb4 COLLATE utf8mb4_bin,
  `slug` varchar(150) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `featured` tinyint(4) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Listage des données de la table commune_makther.contacts : ~0 rows (environ)
/*!40000 ALTER TABLE `contacts` DISABLE KEYS */;
/*!40000 ALTER TABLE `contacts` ENABLE KEYS */;

-- Listage de la structure de la table commune_makther. data_rows
CREATE TABLE IF NOT EXISTS `data_rows` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `data_type_id` int(10) unsigned NOT NULL,
  `field` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `type` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `display_name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `required` tinyint(1) NOT NULL DEFAULT '0',
  `browse` tinyint(1) NOT NULL DEFAULT '1',
  `read` tinyint(1) NOT NULL DEFAULT '1',
  `edit` tinyint(1) NOT NULL DEFAULT '1',
  `add` tinyint(1) NOT NULL DEFAULT '1',
  `delete` tinyint(1) NOT NULL DEFAULT '1',
  `details` text COLLATE utf8mb4_unicode_ci,
  `order` int(11) NOT NULL DEFAULT '1',
  PRIMARY KEY (`id`),
  KEY `data_rows_data_type_id_foreign` (`data_type_id`),
  CONSTRAINT `data_rows_data_type_id_foreign` FOREIGN KEY (`data_type_id`) REFERENCES `data_types` (`id`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB AUTO_INCREMENT=746 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Listage des données de la table commune_makther.data_rows : ~357 rows (environ)
/*!40000 ALTER TABLE `data_rows` DISABLE KEYS */;
INSERT INTO `data_rows` (`id`, `data_type_id`, `field`, `type`, `display_name`, `required`, `browse`, `read`, `edit`, `add`, `delete`, `details`, `order`) VALUES
	(1, 1, 'id', 'number', 'ID', 1, 0, 0, 0, 0, 0, NULL, 1),
	(2, 1, 'name', 'text', 'Name', 1, 1, 1, 1, 1, 1, NULL, 2),
	(3, 1, 'email', 'text', 'Email', 1, 1, 1, 1, 1, 1, NULL, 3),
	(4, 1, 'password', 'password', 'Password', 1, 0, 0, 1, 1, 0, NULL, 4),
	(5, 1, 'remember_token', 'text', 'Remember Token', 0, 0, 0, 0, 0, 0, NULL, 5),
	(6, 1, 'created_at', 'timestamp', 'Created At', 0, 1, 1, 0, 0, 0, NULL, 6),
	(7, 1, 'updated_at', 'timestamp', 'Updated At', 0, 0, 0, 0, 0, 0, NULL, 7),
	(8, 1, 'avatar', 'image', 'Avatar', 0, 1, 1, 1, 1, 1, NULL, 8),
	(9, 1, 'user_belongsto_role_relationship', 'relationship', 'Role', 0, 1, 1, 1, 1, 0, '{"model":"TCG\\\\Voyager\\\\Models\\\\Role","table":"roles","type":"belongsTo","column":"role_id","key":"id","label":"display_name","pivot_table":"roles","pivot":0}', 10),
	(10, 1, 'user_belongstomany_role_relationship', 'relationship', 'Roles', 0, 1, 1, 1, 1, 0, '{"model":"TCG\\\\Voyager\\\\Models\\\\Role","table":"roles","type":"belongsToMany","column":"id","key":"id","label":"display_name","pivot_table":"user_roles","pivot":"1","taggable":"0"}', 11),
	(11, 1, 'settings', 'hidden', 'Settings', 0, 0, 0, 0, 0, 0, NULL, 12),
	(12, 2, 'id', 'number', 'ID', 1, 0, 0, 0, 0, 0, '{}', 1),
	(13, 2, 'name', 'text', 'Name', 1, 1, 1, 1, 1, 1, '{}', 2),
	(14, 2, 'created_at', 'timestamp', 'Created At', 0, 0, 0, 0, 0, 0, '{}', 3),
	(15, 2, 'updated_at', 'timestamp', 'Updated At', 0, 0, 0, 0, 0, 0, '{}', 4),
	(16, 3, 'id', 'number', 'ID', 1, 0, 0, 0, 0, 0, NULL, 1),
	(17, 3, 'name', 'text', 'Name', 1, 1, 1, 1, 1, 1, NULL, 2),
	(18, 3, 'created_at', 'timestamp', 'Created At', 0, 0, 0, 0, 0, 0, NULL, 3),
	(19, 3, 'updated_at', 'timestamp', 'Updated At', 0, 0, 0, 0, 0, 0, NULL, 4),
	(20, 3, 'display_name', 'text', 'Display Name', 1, 1, 1, 1, 1, 1, NULL, 5),
	(21, 1, 'role_id', 'text', 'Role', 1, 1, 1, 1, 1, 1, NULL, 9),
	(22, 4, 'id', 'number', 'ID', 1, 0, 0, 0, 0, 0, '{}', 1),
	(23, 4, 'parent_id', 'select_dropdown', 'Parent', 0, 0, 0, 0, 0, 0, '{"default":"","null":"","options":{"":"-- None --"},"relationship":{"key":"id","label":"name"}}', 2),
	(24, 4, 'order', 'text', 'Order', 1, 1, 1, 1, 1, 1, '{"default":1}', 3),
	(26, 4, 'slug', 'text', 'Slug', 1, 1, 1, 1, 1, 1, '{"slugify":{"origin":"name"}}', 7),
	(27, 4, 'created_at', 'timestamp', 'Created At', 0, 1, 1, 0, 0, 1, '{}', 8),
	(28, 4, 'updated_at', 'timestamp', 'Updated At', 0, 0, 1, 0, 0, 1, '{}', 9),
	(29, 5, 'id', 'number', 'ID', 1, 0, 0, 0, 0, 0, NULL, 1),
	(30, 5, 'author_id', 'text', 'Author', 1, 0, 1, 1, 0, 1, NULL, 2),
	(31, 5, 'category_id', 'text', 'Category', 1, 0, 1, 1, 1, 0, NULL, 3),
	(32, 5, 'title', 'text', 'Title', 1, 1, 1, 1, 1, 1, NULL, 4),
	(33, 5, 'excerpt', 'text_area', 'Excerpt', 1, 0, 1, 1, 1, 1, NULL, 5),
	(34, 5, 'body', 'rich_text_box', 'Body', 1, 0, 1, 1, 1, 1, NULL, 6),
	(35, 5, 'image', 'image', 'Post Image', 0, 1, 1, 1, 1, 1, '{"resize":{"width":"1000","height":"null"},"quality":"70%","upsize":true,"thumbnails":[{"name":"medium","scale":"50%"},{"name":"small","scale":"25%"},{"name":"cropped","crop":{"width":"300","height":"250"}}]}', 7),
	(36, 5, 'slug', 'text', 'Slug', 1, 0, 1, 1, 1, 1, '{"slugify":{"origin":"title","forceUpdate":true},"validation":{"rule":"unique:posts,slug"}}', 8),
	(37, 5, 'meta_description', 'text_area', 'Meta Description', 1, 0, 1, 1, 1, 1, NULL, 9),
	(38, 5, 'meta_keywords', 'text_area', 'Meta Keywords', 1, 0, 1, 1, 1, 1, NULL, 10),
	(39, 5, 'status', 'select_dropdown', 'Status', 1, 1, 1, 1, 1, 1, '{"default":"DRAFT","options":{"PUBLISHED":"published","DRAFT":"draft","PENDING":"pending"}}', 11),
	(40, 5, 'created_at', 'timestamp', 'Created At', 0, 1, 1, 0, 0, 0, NULL, 12),
	(41, 5, 'updated_at', 'timestamp', 'Updated At', 0, 0, 0, 0, 0, 0, NULL, 13),
	(42, 5, 'seo_title', 'text', 'SEO Title', 0, 1, 1, 1, 1, 1, NULL, 14),
	(43, 5, 'featured', 'checkbox', 'Featured', 1, 1, 1, 1, 1, 1, NULL, 15),
	(56, 8, 'id', 'text', 'Id', 1, 0, 0, 0, 0, 0, '{}', 1),
	(60, 8, 'created_at', 'timestamp', 'Date de création', 0, 1, 1, 0, 0, 1, '{}', 16),
	(61, 8, 'updated_at', 'timestamp', 'Updated At', 0, 0, 1, 0, 0, 1, '{}', 17),
	(62, 8, 'deleted_at', 'timestamp', 'Deleted At', 0, 0, 1, 0, 0, 1, '{}', 18),
	(63, 8, 'titre_fr', 'text', 'Titre', 1, 1, 1, 1, 1, 1, '{}', 4),
	(64, 8, 'description_fr', 'rich_text_box', 'Description', 0, 0, 1, 1, 1, 1, '{}', 5),
	(65, 8, 'titre_ar', 'text', 'العنوان', 0, 0, 1, 1, 1, 1, '{}', 6),
	(66, 8, 'description_ar', 'rich_text_box', 'Description', 0, 0, 1, 1, 1, 1, '{}', 7),
	(67, 8, 'titre_en', 'text', 'Title', 0, 0, 1, 1, 1, 1, '{}', 8),
	(68, 8, 'description_en', 'rich_text_box', 'Description', 0, 0, 1, 1, 1, 1, '{}', 9),
	(73, 8, 'alt', 'text', 'Alt', 0, 0, 1, 1, 1, 1, '{}', 3),
	(75, 8, 'vignette', 'media_picker', 'Vignette', 0, 1, 1, 1, 1, 1, '{"max":1,"min":0,"expanded":false,"base_path":"\\/","show_folders":true,"show_toolbar":true,"allow_upload":true,"allow_move":true,"allow_delete":true,"allow_create_folder":true,"allow_rename":true,"allow_crop":true,"allowed":["image","audio","video"],"hide_thumbnails":false,"quality":90,"watermark":{"source":"...","position":"top-left","x":0,"y":0}}', 2),
	(105, 13, 'id', 'text', 'Id', 1, 0, 0, 0, 0, 0, '{}', 1),
	(106, 13, 'fax', 'text', 'Fax', 0, 1, 1, 1, 1, 1, '{}', 2),
	(107, 13, 'telephone', 'text', 'Téléphone', 0, 1, 1, 1, 1, 1, 'null', 3),
	(108, 13, 'email', 'text', 'E-mail', 0, 1, 1, 1, 1, 1, '{}', 4),
	(109, 13, 'adresse_fr', 'text', 'Adresse', 0, 1, 1, 1, 1, 1, 'null', 5),
	(110, 13, 'deleted_at', 'timestamp', 'Deleted At', 0, 1, 1, 1, 1, 1, '{}', 8),
	(111, 13, 'created_at', 'timestamp', 'Date de création', 0, 1, 1, 1, 0, 1, '{}', 9),
	(112, 13, 'updated_at', 'timestamp', 'Updated At', 0, 0, 1, 1, 1, 1, '{}', 10),
	(113, 13, 'adresse_ar', 'text', 'العنوان', 0, 0, 1, 1, 1, 1, 'null', 6),
	(114, 13, 'adresse_en', 'text', 'Adress', 0, 0, 1, 1, 1, 1, 'null', 7),
	(115, 14, 'id', 'text', 'Id', 1, 0, 0, 0, 0, 0, '{}', 1),
	(116, 14, 'titre_fr', 'text', 'Titre', 0, 1, 1, 1, 1, 1, '{}', 3),
	(117, 14, 'Vignette', 'media_picker', 'Vignette', 0, 1, 1, 1, 1, 1, '{"max":1,"min":0,"expanded":false,"base_path":"\\/","show_folders":true,"show_toolbar":true,"allow_upload":true,"allow_move":true,"allow_delete":true,"allow_create_folder":true,"allow_rename":true,"allow_crop":true,"allowed":["image","audio","video"],"hide_thumbnails":false,"quality":90,"watermark":{"source":"...","position":"top-left","x":0,"y":0}}', 2),
	(118, 14, 'Alt', 'text', 'Alt', 0, 0, 1, 1, 1, 1, '{}', 4),
	(119, 14, 'date_debut', 'date', 'Date Début', 0, 1, 1, 1, 1, 1, '{}', 5),
	(120, 14, 'date_fin', 'date', 'Date Fin', 0, 1, 1, 1, 1, 1, '{}', 6),
	(121, 14, 'lieu_fr', 'text', 'Lieu', 0, 1, 1, 1, 1, 1, '{}', 7),
	(122, 14, 'created_at', 'timestamp', 'Date de création', 0, 1, 1, 0, 0, 1, '{}', 15),
	(123, 14, 'updated_at', 'timestamp', 'Updated At', 0, 0, 1, 0, 0, 1, '{}', 16),
	(124, 14, 'deleted_at', 'timestamp', 'Deleted At', 0, 0, 1, 0, 0, 1, '{}', 17),
	(125, 14, 'titre_ar', 'text', 'Titre', 0, 0, 1, 1, 1, 1, '{}', 12),
	(126, 14, 'lieu_ar', 'text', 'Lieu', 0, 0, 1, 1, 1, 1, '{}', 13),
	(127, 14, 'titre_en', 'text', 'Titre', 0, 0, 1, 1, 1, 1, '{}', 9),
	(128, 14, 'lieu_en', 'text', 'Lieu', 0, 0, 1, 1, 1, 1, '{}', 10),
	(129, 14, 'description_fr', 'rich_text_box', 'Description', 0, 0, 1, 1, 1, 1, '{}', 8),
	(130, 14, 'description_ar', 'rich_text_box', 'Description', 0, 0, 1, 1, 1, 1, '{}', 14),
	(131, 14, 'description_en', 'rich_text_box', 'Description', 0, 0, 1, 1, 1, 1, '{}', 11),
	(234, 23, 'id', 'text', 'Id', 1, 0, 0, 0, 0, 0, '{}', 1),
	(235, 23, 'titre_fr', 'text', 'Titre', 0, 1, 1, 1, 1, 1, '{}', 4),
	(236, 23, 'image', 'media_picker', 'Image', 0, 1, 1, 1, 1, 1, '{"max":1,"min":0,"expanded":false,"base_path":"\\/","show_folders":true,"show_toolbar":true,"allow_upload":true,"allow_move":true,"allow_delete":true,"allow_create_folder":true,"allow_rename":true,"allow_crop":true,"allowed":["image","audio","video"],"hide_thumbnails":false,"quality":90,"watermark":{"source":"...","position":"top-left","x":0,"y":0}}', 2),
	(237, 23, 'description_fr', 'rich_text_box', 'Description', 0, 0, 1, 1, 1, 1, '{}', 5),
	(238, 23, 'created_at', 'timestamp', 'Date de création', 0, 1, 1, 0, 0, 1, '{}', 7),
	(239, 23, 'updated_at', 'timestamp', 'Updated At', 0, 0, 1, 0, 0, 1, '{}', 8),
	(240, 23, 'deleted_at', 'timestamp', 'Deleted At', 0, 0, 1, 0, 0, 1, '{}', 9),
	(241, 23, 'titre_ar', 'text', 'العنوان', 0, 0, 1, 1, 1, 1, '{}', 10),
	(242, 23, 'description_ar', 'rich_text_box', 'تقديم طلب العروض', 0, 0, 1, 1, 1, 1, '{}', 11),
	(243, 23, 'titre_en', 'text', 'Title', 0, 0, 1, 1, 1, 1, '{}', 12),
	(244, 23, 'description_en', 'rich_text_box', 'Description', 0, 0, 1, 1, 1, 1, '{}', 13),
	(245, 23, 'alt', 'text', 'Alt', 0, 0, 1, 1, 1, 1, '{}', 3),
	(280, 8, 'seo_title', 'text', 'Seo Title', 0, 0, 1, 1, 1, 1, '{}', 19),
	(281, 8, 'meta_description', 'text_area', 'Meta Description', 0, 0, 1, 1, 1, 1, '{}', 20),
	(282, 8, 'meta_keywords', 'text_area', 'Meta Keywords', 0, 0, 1, 1, 1, 1, '{}', 21),
	(283, 8, 'status', 'select_dropdown', 'Status', 0, 1, 1, 1, 1, 1, '{"default":"Publi\\u00e9","options":{"PUBLISHED":"Publi\\u00e9","UNPUBLISHED":"D\\u00e9publi\\u00e9","ARCHIVE":"Archiv\\u00e9"}}', 24),
	(284, 8, 'slug', 'text', 'Slug', 0, 0, 1, 1, 1, 1, '{"slugify":{"origin":"titre_fr","forceUpdate":true},"validation":{"rule":"unique:actualites,slug"}}', 22),
	(285, 23, 'seo_title', 'text', 'Seo Title', 0, 0, 1, 1, 1, 1, '{}', 14),
	(286, 23, 'meta_description', 'text_area', 'Meta Description', 0, 0, 1, 1, 1, 1, '{}', 15),
	(287, 23, 'meta_keywords', 'text_area', 'Meta Keywords', 0, 0, 1, 1, 1, 1, '{}', 16),
	(288, 23, 'status', 'select_dropdown', 'Status', 0, 1, 1, 1, 1, 1, '{"default":"Publi\\u00e9","options":{"PUBLISHED":"Publi\\u00e9","UNPUBLISHED":"D\\u00e9publi\\u00e9","ARCHIVE":"Archiv\\u00e9"}}', 17),
	(289, 23, 'slug', 'text', 'Slug', 0, 0, 1, 1, 1, 1, '{"slugify":{"origin":"titre_fr","forceUpdate":true},"validation":{"rule":"unique:appels_offres,slug"}}', 18),
	(305, 14, 'seo_title', 'text', 'Seo Title', 0, 0, 1, 1, 1, 1, '{}', 18),
	(306, 14, 'meta_description', 'text_area', 'Meta Description', 0, 0, 1, 1, 1, 1, '{}', 19),
	(307, 14, 'meta_keywords', 'text_area', 'Meta Keywords', 0, 0, 1, 1, 1, 1, '{}', 20),
	(308, 14, 'status', 'select_dropdown', 'Status', 0, 1, 1, 1, 1, 1, '{"default":"Publi\\u00e9","options":{"PUBLISHED":"Publi\\u00e9","UNPUBLISHED":"D\\u00e9publi\\u00e9","ARCHIVE":"Archiv\\u00e9"}}', 21),
	(309, 14, 'slug', 'text', 'Slug', 0, 0, 1, 1, 1, 1, '{"slugify":{"origin":"titre_fr","forceUpdate":true},"validation":{"rule":"unique:evenements,slug"}}', 22),
	(335, 36, 'id', 'text', 'Id', 1, 0, 0, 0, 0, 0, '{}', 1),
	(336, 36, 'titre_fr', 'text', 'Titre', 0, 1, 1, 1, 1, 1, '{}', 2),
	(337, 36, 'titre_ar', 'text', 'العنوان', 0, 0, 1, 1, 1, 1, '{}', 3),
	(338, 36, 'titre_en', 'text', 'Title', 0, 0, 1, 1, 1, 1, '{}', 4),
	(339, 36, 'contenu_fr', 'rich_text_box', 'Contenu', 0, 0, 1, 1, 1, 1, '{}', 5),
	(340, 36, 'contenu_ar', 'rich_text_box', 'Contenu', 0, 0, 1, 1, 1, 1, '{}', 6),
	(341, 36, 'contenu_en', 'rich_text_box', 'Contenu', 0, 0, 1, 1, 1, 1, '{}', 7),
	(342, 36, 'fichiers', 'media_picker', 'Fichiers', 0, 0, 1, 1, 1, 1, '{"max":100,"min":0,"expanded":false,"base_path":"\\/","show_folders":true,"show_toolbar":true,"allow_upload":true,"allow_move":true,"allow_delete":true,"allow_create_folder":true,"allow_rename":true,"allow_crop":true,"hide_thumbnails":false,"quality":90,"watermark":{"source":"...","position":"top-left","x":0,"y":0}}', 8),
	(343, 36, 'images', 'media_picker', 'Images', 0, 0, 1, 1, 1, 1, '{"max":100,"min":0,"expanded":false,"base_path":"\\/","show_folders":true,"show_toolbar":true,"allow_upload":true,"allow_move":true,"allow_delete":true,"allow_create_folder":true,"allow_rename":true,"allow_crop":true,"allowed":["image","audio","video"],"hide_thumbnails":false,"quality":90,"watermark":{"source":"...","position":"top-left","x":0,"y":0}}', 9),
	(344, 36, 'seo_title', 'text', 'Seo Title', 0, 0, 1, 1, 1, 1, '{}', 10),
	(345, 36, 'meta_description', 'text_area', 'Meta Description', 0, 0, 1, 1, 1, 1, '{}', 11),
	(346, 36, 'meta_keywords', 'text_area', 'Meta Keywords', 0, 0, 1, 1, 1, 1, '{}', 12),
	(347, 36, 'slug', 'text', 'Slug', 0, 0, 1, 1, 1, 1, '{"slugify":{"origin":"titre_fr","forceUpdate":true},"validation":{"rule":"unique:articles,slug"}}', 13),
	(348, 36, 'status', 'select_dropdown', 'Status', 0, 1, 1, 1, 1, 1, '{"default":"Brouillon","options":{"PUBLISHED":"Publi\\u00e9","DRAFT":"Brouillon","PENDING":"En attendant","ARCHIVE":"Archiv\\u00e9"}}', 14),
	(349, 36, 'featured', 'checkbox', 'Mise en avant', 0, 0, 1, 1, 1, 1, '{}', 15),
	(350, 36, 'deleted_at', 'timestamp', 'Deleted At', 0, 0, 1, 0, 0, 1, '{}', 16),
	(351, 36, 'created_at', 'timestamp', 'Date de création', 0, 1, 1, 0, 0, 1, '{}', 17),
	(352, 36, 'updated_at', 'timestamp', 'Updated At', 0, 0, 1, 0, 0, 1, '{}', 18),
	(353, 8, 'featured', 'checkbox', 'Mise en avant', 0, 0, 1, 1, 1, 1, '{}', 23),
	(354, 23, 'featured', 'checkbox', 'Mise en avant', 0, 0, 1, 1, 1, 1, '{}', 19),
	(358, 13, 'seo_title', 'text', 'Seo Title', 0, 0, 1, 1, 1, 1, '{}', 11),
	(359, 13, 'meta_description', 'text_area', 'Meta Description', 0, 0, 1, 1, 1, 1, '{}', 12),
	(360, 13, 'meta_keywords', 'text_area', 'Meta Keywords', 0, 0, 1, 1, 1, 1, '{}', 13),
	(361, 13, 'status', 'select_dropdown', 'Status', 0, 1, 1, 1, 1, 1, '{"default":"Publi\\u00e9","options":{"PUBLISHED":"Publi\\u00e9","UNPUBLISHED":"D\\u00e9publi\\u00e9","ARCHIVE":"Archiv\\u00e9"}}', 14),
	(362, 13, 'slug', 'select_dropdown', 'Slug', 0, 0, 1, 1, 1, 1, '{"slugify":{"origin":"seo_title","forceUpdate":true},"validation":{"rule":"unique:contacts,slug"}}', 15),
	(363, 13, 'featured', 'checkbox', 'Mise en avant', 0, 0, 1, 1, 1, 1, '{}', 16),
	(364, 14, 'featured', 'checkbox', 'Mise en avant', 0, 0, 1, 1, 1, 1, '{}', 23),
	(382, 41, 'id', 'text', 'Id', 1, 0, 0, 0, 0, 0, '{}', 1),
	(383, 41, 'titre_fr', 'text', 'Titre', 0, 1, 1, 1, 1, 1, '{}', 2),
	(384, 41, 'date_debut', 'date', 'Date début', 0, 1, 1, 1, 1, 1, '{}', 3),
	(385, 41, 'date_fin', 'date', 'Date fin', 0, 1, 1, 1, 1, 1, '{}', 4),
	(386, 41, 'description_fr', 'rich_text_box', 'Description', 0, 0, 1, 1, 1, 1, '{}', 5),
	(387, 41, 'titre_ar', 'text', 'العنوان', 0, 0, 1, 1, 1, 1, '{}', 6),
	(388, 41, 'titre_en', 'text', 'Title', 0, 0, 1, 1, 1, 1, '{}', 7),
	(389, 41, 'description_ar', 'rich_text_box', 'Description', 0, 0, 1, 1, 1, 1, '{}', 8),
	(390, 41, 'description_en', 'rich_text_box', 'Description', 0, 0, 1, 1, 1, 1, '{}', 9),
	(391, 41, 'seo_title', 'text', 'Seo Title', 0, 0, 1, 1, 1, 1, '{}', 10),
	(392, 41, 'meta_description', 'text', 'Meta Description', 0, 0, 1, 1, 1, 1, '{}', 11),
	(393, 41, 'meta_keywords', 'text', 'Meta Keywords', 0, 0, 1, 1, 1, 1, '{}', 12),
	(394, 41, 'status', 'select_dropdown', 'Status', 0, 1, 1, 1, 1, 1, '{"default":"Publi\\u00e9","options":{"PUBLISHED":"Publi\\u00e9","UNPUBLISHED":"D\\u00e9publi\\u00e9","ARCHIVE":"Archiv\\u00e9"}}', 13),
	(395, 41, 'slug', 'text', 'Slug', 0, 1, 1, 1, 1, 1, '{"slugify":{"origin":"titre_fr","forceUpdate":true},"validation":{"rule":"unique:galleries,slug"}}', 14),
	(396, 41, 'featured', 'checkbox', 'Mise en avant', 0, 1, 1, 1, 1, 1, '{}', 15),
	(397, 41, 'deleted_at', 'timestamp', 'Deleted At', 0, 0, 1, 0, 0, 1, '{}', 16),
	(398, 41, 'created_at', 'timestamp', 'Date de création', 0, 1, 1, 0, 0, 1, '{}', 17),
	(399, 41, 'updated_at', 'timestamp', 'Updated At', 0, 0, 1, 0, 0, 1, '{}', 18),
	(419, 44, 'id', 'text', 'Id', 1, 0, 0, 0, 0, 0, '{}', 1),
	(420, 44, 'titre_fr', 'text', 'Titre', 0, 1, 1, 1, 1, 1, '{}', 2),
	(421, 44, 'titre_ar', 'text', 'العنوان', 0, 0, 1, 1, 1, 1, '{}', 3),
	(422, 44, 'titre_en', 'text', 'Title', 0, 0, 1, 1, 1, 1, '{}', 4),
	(423, 44, 'lien', 'text', 'Lien', 0, 1, 1, 1, 1, 1, 'null', 5),
	(424, 44, 'deleted_at', 'timestamp', 'Deleted At', 0, 0, 1, 0, 0, 1, '{}', 6),
	(425, 44, 'created_at', 'timestamp', 'Date de création', 0, 1, 1, 0, 0, 1, '{}', 7),
	(426, 44, 'updated_at', 'timestamp', 'Updated At', 0, 0, 1, 0, 0, 1, '{}', 8),
	(454, 46, 'id', 'text', 'Id', 1, 0, 0, 0, 0, 0, '{}', 1),
	(455, 46, 'titre_fr', 'text', 'Titre', 0, 1, 1, 1, 1, 1, '{}', 2),
	(456, 46, 'titre_ar', 'text', 'العنوان', 0, 0, 1, 1, 1, 1, '{}', 3),
	(457, 46, 'titre_en', 'text', 'Title', 0, 0, 1, 1, 1, 1, '{}', 4),
	(458, 46, 'description_fr', 'rich_text_box', 'Description', 0, 0, 1, 1, 1, 1, '{}', 5),
	(459, 46, 'description_ar', 'rich_text_box', 'التقديم', 0, 0, 1, 1, 1, 1, '{}', 6),
	(460, 46, 'description_en', 'rich_text_box', 'Description', 0, 0, 1, 1, 1, 1, '{}', 7),
	(462, 46, 'chiffre_1', 'text', 'Chiffre N°1', 0, 1, 1, 1, 1, 1, '{}', 9),
	(464, 46, 'chiffre_2', 'text', 'Chiffre N°2', 0, 1, 1, 1, 1, 1, '{}', 11),
	(466, 46, 'chiffre_3', 'text', 'Chiffre N°3', 0, 1, 1, 1, 1, 1, '{}', 13),
	(468, 46, 'chiffre_4', 'text', 'Chiffre N°4', 0, 1, 1, 1, 1, 1, '{}', 15),
	(469, 46, 'deleted_at', 'timestamp', 'Deleted At', 0, 0, 1, 0, 0, 1, '{}', 16),
	(470, 46, 'created_at', 'timestamp', 'Date de création', 0, 1, 1, 0, 0, 1, '{}', 17),
	(471, 46, 'updated_at', 'timestamp', 'Updated At', 0, 0, 1, 0, 0, 1, '{}', 18),
	(490, 49, 'id', 'text', 'Id', 1, 0, 0, 0, 0, 0, '{}', 1),
	(491, 49, 'titre_fr', 'text', 'Titre', 0, 1, 1, 1, 1, 1, '{}', 2),
	(492, 49, 'titre_ar', 'text', 'العنوان', 0, 0, 1, 1, 1, 1, '{}', 3),
	(493, 49, 'titre_en', 'text', 'Title', 0, 0, 1, 1, 1, 1, '{}', 4),
	(494, 49, 'description_fr', 'rich_text_box', 'Description', 0, 1, 1, 1, 1, 1, '{}', 5),
	(495, 49, 'description_ar', 'rich_text_box', 'التقديم', 0, 0, 1, 1, 1, 1, '{}', 6),
	(496, 49, 'description_en', 'rich_text_box', 'Description', 0, 0, 1, 1, 1, 1, '{}', 7),
	(497, 49, 'created_at', 'timestamp', 'Date de création', 0, 1, 1, 0, 0, 1, '{}', 8),
	(498, 49, 'updated_at', 'timestamp', 'Updated At', 0, 0, 1, 0, 0, 1, '{}', 9),
	(499, 49, 'deleted_at', 'timestamp', 'Deleted At', 0, 0, 1, 0, 0, 1, '{}', 10),
	(500, 50, 'id', 'text', 'Id', 1, 0, 0, 0, 0, 0, '{}', 1),
	(501, 50, 'titre_fr', 'text', 'Titre', 0, 1, 1, 1, 1, 1, '{}', 2),
	(502, 50, 'titre_ar', 'text', 'العنون', 0, 0, 1, 1, 1, 1, '{}', 3),
	(503, 50, 'titre_en', 'text', 'Title', 0, 0, 1, 1, 1, 1, '{}', 4),
	(504, 50, 'lien', 'text', 'Lien', 0, 1, 1, 1, 1, 1, '{}', 5),
	(505, 50, 'deleted_at', 'timestamp', 'Deleted At', 0, 0, 1, 0, 0, 1, '{}', 6),
	(506, 50, 'created_at', 'timestamp', 'Date de création', 0, 1, 1, 0, 0, 1, '{}', 7),
	(507, 50, 'updated_at', 'timestamp', 'Updated At', 0, 0, 1, 0, 0, 1, '{}', 8),
	(509, 8, 'lien', 'text', 'Lien', 0, 0, 1, 1, 1, 1, '{}', 11),
	(510, 8, 'date_publication', 'date', 'Date de publication', 0, 1, 1, 1, 1, 1, '{}', 15),
	(511, 8, 'categorie', 'select_dropdown', 'Catégorie', 0, 1, 1, 1, 1, 1, '{}', 12),
	(512, 8, 'carousel', 'media_picker', 'Carrousel d\'image', 0, 0, 1, 1, 1, 1, '{"max":100,"min":0,"expanded":false,"base_path":"\\/","show_folders":true,"show_toolbar":true,"allow_upload":true,"allow_move":true,"allow_delete":true,"allow_create_folder":true,"allow_rename":true,"allow_crop":true,"allowed":["image","audio","video"],"hide_thumbnails":false,"quality":90,"watermark":{"source":"...","position":"top-left","x":0,"y":0}}', 13),
	(513, 41, 'Images', 'media_picker', 'Images', 0, 1, 1, 1, 1, 1, '{"max":100,"min":0,"expanded":false,"base_path":"\\/","show_folders":true,"show_toolbar":true,"allow_upload":true,"allow_move":true,"allow_delete":true,"allow_create_folder":true,"allow_rename":true,"allow_crop":true,"allowed":["image","audio","video"],"hide_thumbnails":false,"quality":90,"watermark":{"source":"...","position":"top-left","x":0,"y":0}}', 19),
	(514, 41, 'videos', 'media_picker', 'Videos', 0, 1, 1, 1, 1, 1, '{"max":100,"min":0,"expanded":false,"base_path":"\\/","show_folders":true,"show_toolbar":true,"allow_upload":true,"allow_move":true,"allow_delete":true,"allow_create_folder":true,"allow_rename":true,"allow_crop":true,"allowed":["image","audio","video"],"hide_thumbnails":false,"quality":90,"watermark":{"source":"...","position":"top-left","x":0,"y":0}}', 20),
	(528, 14, 'carousel', 'media_picker', 'Carousel', 0, 0, 1, 1, 1, 1, '{"max":100,"min":0,"expanded":false,"base_path":"\\/","show_folders":true,"show_toolbar":true,"allow_upload":true,"allow_move":true,"allow_delete":true,"allow_create_folder":true,"allow_rename":true,"allow_crop":true,"allowed":["image","audio","video"],"hide_thumbnails":false,"quality":90,"watermark":{"source":"...","position":"top-left","x":0,"y":0}}', 24),
	(531, 54, 'id', 'text', 'Id', 1, 0, 0, 0, 0, 0, '{}', 1),
	(532, 54, 'photo', 'media_picker', 'Photo', 0, 1, 1, 1, 1, 1, '{"max":1,"min":0,"expanded":false,"base_path":"\\/","show_folders":true,"show_toolbar":true,"allow_upload":true,"allow_move":true,"allow_delete":true,"allow_create_folder":true,"allow_rename":true,"allow_crop":true,"allowed":["image","audio","video"],"hide_thumbnails":false,"quality":90,"watermark":{"source":"...","position":"top-left","x":0,"y":0}}', 2),
	(536, 54, 'deleted_at', 'timestamp', 'Deleted At', 0, 0, 1, 0, 0, 1, '{}', 6),
	(537, 54, 'created_at', 'timestamp', 'Date de création', 0, 1, 1, 0, 0, 1, '{}', 7),
	(538, 54, 'updated_at', 'timestamp', 'Updated At', 0, 0, 1, 0, 0, 1, '{}', 8),
	(543, 54, 'texte', 'rich_text_box', 'Texte', 0, 1, 1, 1, 1, 1, '{}', 3),
	(544, 54, 'langue', 'select_dropdown', 'Langue', 0, 1, 1, 1, 1, 1, '{"default":"TOUS","options":{"TOUS":"TOUS","FR":"fr","AR":"ar"}}', 7),
	(552, 23, 'pieces_jointes', 'media_picker', 'Pièces Jointes', 0, 0, 1, 1, 1, 1, '{"max":100,"min":0,"expanded":false,"base_path":"\\/","show_folders":true,"show_toolbar":true,"allow_upload":true,"allow_move":true,"allow_delete":true,"allow_create_folder":true,"allow_rename":true,"allow_crop":true,"hide_thumbnails":false,"quality":90,"watermark":{"source":"...","position":"top-left","x":0,"y":0}}', 20),
	(553, 23, 'date_fin', 'date', 'Date Fin', 0, 1, 1, 1, 1, 1, '{}', 6),
	(561, 46, 'titre_1_fr', 'text', 'Titre N°1', 0, 1, 1, 1, 1, 1, '{}', 8),
	(562, 46, 'titre_2_fr', 'text', 'Titre N°2', 0, 1, 1, 1, 1, 1, '{}', 10),
	(563, 46, 'titre_3_fr', 'text', 'Titre N°3', 0, 1, 1, 1, 1, 1, '{}', 12),
	(564, 46, 'titre_4_fr', 'text', 'Titre N°4', 0, 1, 1, 1, 1, 1, '{}', 14),
	(565, 46, 'titre_1_ar', 'text', 'العنوان الأول', 0, 0, 1, 1, 1, 1, '{}', 19),
	(566, 46, 'titre_2_ar', 'text', 'العنوان الثاني', 0, 0, 1, 1, 1, 1, '{}', 20),
	(567, 46, 'titre_3_ar', 'text', 'العنوان الثالث', 0, 0, 1, 1, 1, 1, '{}', 21),
	(568, 46, 'titre_4_ar', 'text', 'العنوان الرابع', 0, 0, 1, 1, 1, 1, '{}', 22),
	(569, 46, 'titre_1_en', 'text', 'Title N°1', 0, 0, 1, 1, 1, 1, '{}', 23),
	(570, 46, 'titre_2_en', 'text', 'Title N°2', 0, 0, 1, 1, 1, 1, '{}', 24),
	(571, 46, 'titre_3_en', 'text', 'Title N°3', 0, 0, 1, 1, 1, 1, '{}', 25),
	(572, 46, 'titre_4_en', 'text', 'Title N°4', 0, 0, 1, 1, 1, 1, '{}', 26),
	(573, 14, 'video', 'media_picker', 'Video', 0, 0, 1, 1, 1, 1, '{"max":100,"min":0,"expanded":false,"base_path":"\\/","show_folders":true,"show_toolbar":true,"allow_upload":true,"allow_move":true,"allow_delete":true,"allow_create_folder":true,"allow_rename":true,"allow_crop":true,"allowed":["image","audio","video"],"hide_thumbnails":false,"quality":90,"watermark":{"source":"...","position":"top-left","x":0,"y":0}}', 25),
	(574, 8, 'video', 'media_picker', 'Video', 0, 0, 1, 1, 1, 1, '{"max":100,"min":0,"expanded":false,"base_path":"\\/","show_folders":true,"show_toolbar":true,"allow_upload":true,"allow_move":true,"allow_delete":true,"allow_create_folder":true,"allow_rename":true,"allow_crop":true,"allowed":["image","audio","video"],"hide_thumbnails":false,"quality":90,"watermark":{"source":"...","position":"top-left","x":0,"y":0}}', 14),
	(584, 59, 'id', 'text', 'Id', 1, 0, 0, 0, 0, 0, '{}', 1),
	(585, 59, 'facebook', 'text', 'Facebook', 0, 1, 1, 1, 1, 1, '{}', 2),
	(586, 59, 'deleted_at', 'timestamp', 'Deleted At', 0, 0, 1, 1, 1, 1, '{}', 4),
	(587, 59, 'created_at', 'timestamp', 'Created At', 0, 1, 1, 1, 0, 1, '{}', 14),
	(588, 59, 'updated_at', 'timestamp', 'Updated At', 0, 0, 0, 0, 0, 0, '{}', 5),
	(589, 59, 'twitter', 'text', 'Twitter', 0, 1, 1, 1, 1, 1, '{}', 6),
	(590, 59, 'google_plus', 'text', 'Google Plus', 0, 1, 1, 1, 1, 1, '{}', 8),
	(591, 59, 'linkedin', 'text', 'Linkedin', 0, 1, 1, 1, 1, 1, '{}', 10),
	(592, 59, 'youtube', 'text', 'Youtube', 0, 1, 1, 1, 1, 1, '{}', 12),
	(601, 8, 'nv_onglet', 'select_multiple', 'Ouvrir dans', 0, 0, 1, 1, 1, 1, '{"default":"M\\u00eame onglet\\/fen\\u00eatre","options":{"_self":"M\\u00eame onglet\\/fen\\u00eatre","_blank":"Nouvel onglet\\/fen\\u00eatre"}}', 25),
	(602, 50, 'nv_onglet', 'select_dropdown', 'Ouvrir dans', 0, 1, 1, 1, 1, 1, '{"default":"M\\u00eame onglet\\/fen\\u00eatre","options":{"_self":"M\\u00eame onglet\\/fen\\u00eatre","_blank":"Nouvel onglet\\/fen\\u00eatre"}}', 9),
	(603, 44, 'nv_onglet', 'select_dropdown', 'Ouvrir dans', 0, 0, 1, 1, 1, 1, '{"default":"M\\u00eame onglet\\/fen\\u00eatre","options":{"_self":"M\\u00eame onglet\\/fen\\u00eatre","_blank":"Nouvel onglet\\/fen\\u00eatre"}}', 9),
	(604, 59, 'nv_onglet_facebook', 'select_dropdown', 'Ouvrir dans', 0, 0, 1, 1, 1, 1, '{"default":"M\\u00eame onglet\\/fen\\u00eatre","options":{"_self":"M\\u00eame onglet\\/fen\\u00eatre","_blank":"Nouvel onglet\\/fen\\u00eatre"}}', 3),
	(605, 59, 'nv_onglet_twitter', 'select_dropdown', 'Ouvrir dans', 0, 0, 1, 1, 1, 1, '{"default":"M\\u00eame onglet\\/fen\\u00eatre","options":{"_self":"M\\u00eame onglet\\/fen\\u00eatre","_blank":"Nouvel onglet\\/fen\\u00eatre"}}', 7),
	(606, 59, 'nv_onglet_google_plus', 'select_dropdown', 'Ouvrir dans', 0, 0, 1, 1, 1, 1, '{"default":"M\\u00eame onglet\\/fen\\u00eatre","options":{"_self":"M\\u00eame onglet\\/fen\\u00eatre","_blank":"Nouvel onglet\\/fen\\u00eatre"}}', 9),
	(607, 59, 'nv_onglet_linkedin', 'select_dropdown', 'Ouvrir dans', 0, 0, 1, 1, 1, 1, '{"default":"M\\u00eame onglet\\/fen\\u00eatre","options":{"_self":"M\\u00eame onglet\\/fen\\u00eatre","_blank":"Nouvel onglet\\/fen\\u00eatre"}}', 11),
	(608, 59, 'nv_onglet_youtube', 'select_dropdown', 'Ouvrir dans', 0, 0, 1, 1, 1, 1, '{"default":"M\\u00eame onglet\\/fen\\u00eatre","options":{"_self":"M\\u00eame onglet\\/fen\\u00eatre","_blank":"Nouvel onglet\\/fen\\u00eatre"}}', 13),
	(611, 60, 'id', 'text', 'Id', 1, 0, 0, 0, 0, 0, '{}', 1),
	(612, 60, 'created_at', 'timestamp', 'Date de création', 0, 1, 1, 0, 0, 1, '{}', 2),
	(613, 60, 'updated_at', 'timestamp', 'Updated At', 0, 0, 1, 0, 0, 1, '{}', 3),
	(614, 60, 'deleted_at', 'timestamp', 'Deleted At', 0, 0, 1, 0, 0, 1, '{}', 4),
	(615, 60, 'Couleurs', 'hidden', 'Couleurs', 0, 0, 1, 1, 1, 1, '{}', 5),
	(616, 60, 'AxeX', 'hidden', 'Axe X', 0, 0, 1, 1, 1, 1, '{}', 6),
	(617, 60, 'AxeY', 'hidden', 'Axe Y', 0, 0, 1, 1, 1, 1, '{}', 7),
	(618, 60, 'Titre_fr', 'text', 'Titre', 0, 1, 1, 1, 1, 1, '{}', 8),
	(619, 60, 'Titre_ar', 'text', 'العنوان', 0, 0, 1, 1, 1, 1, '{}', 9),
	(620, 60, 'Titre_en', 'text', 'Title', 0, 0, 1, 1, 1, 1, '{}', 10),
	(621, 60, 'Description_fr', 'rich_text_box', 'Description', 0, 0, 1, 1, 1, 1, '{}', 11),
	(622, 60, 'Description_ar', 'rich_text_box', 'التقديم', 0, 0, 1, 1, 1, 1, '{}', 12),
	(623, 60, 'Description_en', 'rich_text_box', 'Description', 0, 0, 1, 1, 1, 1, '{}', 13),
	(624, 60, 'Type_Stats', 'select_dropdown', 'Type Statistique', 0, 1, 1, 1, 1, 1, '{"default":"Line","options":{"line":"Line","bar":"Bar","pie":"Pie","doughnut":"Doughnut","radar":"Radar"}}', 14),
	(625, 60, 'seo_title', 'text', 'Seo Title', 0, 1, 1, 1, 1, 1, '{}', 15),
	(626, 60, 'meta_description', 'text', 'Meta Description', 0, 1, 1, 1, 1, 1, '{}', 16),
	(627, 60, 'meta_keywords', 'text', 'Meta Keywords', 0, 1, 1, 1, 1, 1, '{}', 17),
	(628, 60, 'slug', 'text', 'Slug', 0, 1, 1, 1, 1, 1, '{"slugify":{"origin":"Titre_fr","forceUpdate":true},"validation":{"rule":"unique:statistiques,slug"}}', 18),
	(629, 60, 'status', 'text', 'Status', 0, 1, 1, 1, 1, 1, '{"default":"Publi\\u00e9","options":{"PUBLISHED":"Publi\\u00e9","UNPUBLISHED":"D\\u00e9publi\\u00e9","ARCHIVE":"Archiv\\u00e9"}}', 19),
	(630, 60, 'featured', 'text', 'Featured', 0, 1, 1, 1, 1, 1, '{}', 20),
	(631, 50, 'afficher_dans', 'select_dropdown', 'Afficher Dans', 0, 1, 1, 1, 1, 1, '{"default":"Top header","options":{"top_header":"Top header","footer":"Footer","menu_side":"Menu side"}}', 10),
	(632, 4, 'name', 'text', 'Name', 1, 1, 1, 1, 1, 1, '{}', 4),
	(633, 50, 'ordre', 'number', 'Ordre', 0, 1, 1, 1, 1, 1, '{}', 11),
	(634, 41, 'cover', 'media_picker', 'Photos de couverture', 0, 0, 1, 1, 1, 1, '{"max":1,"min":0,"expanded":false,"base_path":"\\/","show_folders":true,"show_toolbar":true,"allow_upload":true,"allow_move":true,"allow_delete":true,"allow_create_folder":true,"allow_rename":true,"allow_crop":true,"allowed":["image","audio","video"],"hide_thumbnails":false,"quality":90,"watermark":{"source":"...","position":"top-left","x":0,"y":0}}', 21),
	(635, 41, 'type', 'select_dropdown', 'Type', 0, 0, 1, 1, 1, 1, '{"default":"Photos","options":{"photos":"Photos","webtv":"Web TV"}}', 22),
	(654, 62, 'id', 'text', 'Id', 1, 0, 0, 0, 0, 0, '{}', 1),
	(655, 62, 'created_at', 'timestamp', 'Created At', 0, 1, 1, 0, 0, 1, '{}', 2),
	(656, 62, 'updated_at', 'timestamp', 'Updated At', 0, 0, 0, 0, 0, 0, '{}', 3),
	(657, 62, 'Annee', 'text', 'Année', 0, 1, 1, 1, 1, 1, '{}', 8),
	(658, 62, 'titre_ar', 'text', 'إسم الجلسة', 0, 1, 1, 1, 1, 1, '{}', 4),
	(659, 62, 'titre_fr', 'text', 'Nom de conseil', 0, 1, 1, 1, 1, 1, '{}', 5),
	(660, 62, 'TitreEN', 'text', 'The title', 0, 1, 1, 1, 1, 1, '{}', 6),
	(661, 62, 'TypeConseil', 'select_dropdown', 'Type de réunion', 0, 1, 1, 1, 1, 1, '{"default":"\\u062a\\u0645\\u0647\\u064a\\u062f\\u064a\\u0629","options":{"PREP":"\\u062a\\u0645\\u0647\\u064a\\u062f\\u064a\\u0629","ORDINAIRE":"\\u0639\\u0627\\u062f\\u064a\\u0629","EXTRA":"\\u0625\\u0633\\u062a\\u062b\\u0646\\u0627\\u0626\\u064a\\u0629","GENERAL":"\\u0639\\u0627\\u0645\\u0629"}}', 7),
	(662, 62, 'FichierConseil', 'media_picker', 'Pv de réunion', 0, 0, 1, 1, 1, 1, '{"max":1,"min":0,"expanded":false,"base_path":"\\/","show_folders":true,"show_toolbar":true,"allow_upload":true,"allow_move":true,"allow_delete":true,"allow_create_folder":true,"allow_rename":true,"allow_crop":true,"hide_thumbnails":false,"quality":90,"watermark":{"source":"...","position":"top-left","x":0,"y":0}}', 9),
	(663, 62, 'seo_title', 'text', 'Seo Title', 0, 0, 1, 1, 1, 1, '{}', 10),
	(664, 62, 'meta_description', 'text', 'Meta Description', 0, 0, 1, 1, 1, 1, '{}', 11),
	(665, 62, 'meta_keywords', 'text', 'Meta Keywords', 0, 0, 1, 1, 1, 1, '{}', 12),
	(666, 62, 'slug', 'text', 'Slug', 0, 0, 1, 1, 1, 1, '{"slugify":{"origin":"titre_fr","forceUpdate":true},"validation":{"rule":"unique:conseil_municipales,slug"},"messages":{"unique":"This :attribute field is a must."}}', 13),
	(667, 62, 'status', 'select_dropdown', 'Status', 0, 0, 1, 1, 1, 1, '{"default":"Publi\\u00e9","options":{"PUBLISHED":"Publi\\u00e9","UNPUBLISHED":"D\\u00e9publi\\u00e9","ARCHIVE":"Archiv\\u00e9"}}', 14),
	(668, 64, 'id', 'text', 'Id', 1, 0, 0, 0, 0, 0, '{}', 1),
	(669, 64, 'created_at', 'timestamp', 'Created At', 0, 0, 1, 1, 0, 1, '{}', 2),
	(670, 64, 'updated_at', 'timestamp', 'Updated At', 0, 0, 0, 0, 0, 0, '{}', 3),
	(671, 64, 'Annee', 'text', 'Annee', 0, 1, 1, 1, 1, 1, '{}', 6),
	(672, 64, 'titre_ar', 'text', 'أسم الوثيقة', 0, 1, 1, 1, 1, 1, '{}', 4),
	(673, 64, 'titre_fr', 'text', 'Le titre', 0, 1, 1, 1, 1, 1, '{}', 5),
	(674, 64, 'TypeFinance', 'select_dropdown', 'Type de document', 0, 1, 1, 1, 1, 1, '{"default":"\\u0627\\u0644\\u0645\\u064a\\u0632\\u0627\\u0646\\u064a\\u0629","options":{"BUDGET":"\\u0627\\u0644\\u0645\\u064a\\u0632\\u0627\\u0646\\u064a\\u0629","COMPTEFINANCIER":"\\u0627\\u0644\\u062d\\u0633\\u0627\\u0628\\u0627\\u062a \\u0627\\u0644\\u0645\\u0627\\u0644\\u064a\\u0629","DETTES":"\\u0627\\u0644\\u062f\\u064a\\u0648\\u0646","RECOUVREMENT":"\\u0627\\u0644\\u062a\\u063a\\u0637\\u064a\\u0629","RESULTATPERFO":"\\u0646\\u062a\\u0627\\u0626\\u062c \\u062a\\u0642\\u064a\\u064a\\u0645 \\u0627\\u0644\\u0623\\u062f\\u0627\\u0621","PLANAPPELOFFRES":"\\u062c\\u062f\\u0648\\u0644 \\u0642\\u064a\\u0627\\u062f\\u0629 \\u0627\\u0644\\u0635\\u0641\\u0642\\u0627\\u062a \\u0627\\u0644\\u0639\\u0645\\u0648\\u0645\\u064a\\u0629"}}', 7),
	(675, 64, 'FichierFinance', 'media_picker', 'Document', 0, 0, 1, 1, 1, 1, '{"max":1,"min":0,"expanded":false,"base_path":"\\/","show_folders":true,"show_toolbar":true,"allow_upload":true,"allow_move":true,"allow_delete":true,"allow_create_folder":true,"allow_rename":true,"allow_crop":true,"hide_thumbnails":false,"quality":90,"watermark":{"source":"...","position":"top-left","x":0,"y":0}}', 8),
	(676, 64, 'seo_title', 'text', 'Seo Title', 0, 0, 1, 1, 1, 1, '{}', 9),
	(677, 64, 'meta_description', 'text', 'Meta Description', 0, 0, 1, 1, 1, 1, '{}', 10),
	(678, 64, 'meta_keywords', 'text', 'Meta Keywords', 0, 0, 1, 1, 1, 1, '{}', 11),
	(679, 64, 'slug', 'text', 'Slug', 0, 0, 1, 1, 1, 1, '{"slugify":{"origin":"titre_fr","forceUpdate":true},"validation":{"rule":"unique:finances,slug"}}', 12),
	(680, 64, 'status', 'select_dropdown', 'Status', 0, 1, 1, 1, 1, 1, '{"default":"Publi\\u00e9","options":{"PUBLISHED":"Publi\\u00e9","UNPUBLISHED":"D\\u00e9publi\\u00e9","ARCHIVE":"Archiv\\u00e9"}}', 13),
	(681, 65, 'id', 'text', 'Id', 1, 0, 0, 0, 0, 0, '{}', 1),
	(682, 65, 'created_at', 'timestamp', 'Created At', 0, 0, 1, 1, 0, 1, '{}', 2),
	(683, 65, 'updated_at', 'timestamp', 'Updated At', 0, 0, 0, 0, 0, 0, '{}', 3),
	(684, 65, 'Annee', 'text', 'Année', 0, 1, 1, 1, 1, 1, '{}', 4),
	(685, 65, 'titre_ar', 'text', 'إسم الوثيقة', 0, 1, 1, 1, 1, 1, '{}', 5),
	(686, 65, 'titre_fr', 'text', 'Le titre', 0, 1, 1, 1, 1, 1, '{}', 6),
	(687, 65, 'TypeProjet', 'select_dropdown', 'Type de document', 0, 1, 1, 1, 1, 1, '{"default":"\\u0645\\u0634\\u0627\\u0631\\u064a\\u0639 \\u062f\\u0627\\u062e\\u0644 \\u0628\\u0631\\u0646\\u0627\\u0645\\u062c \\u0627\\u0644\\u0625\\u0633\\u062a\\u062b\\u0645\\u0627\\u0631 \\u0627\\u0644\\u0628\\u0644\\u062f\\u064a","options":{"PROJETDANSPIC":"\\u0645\\u0634\\u0627\\u0631\\u064a\\u0639 \\u062f\\u0627\\u062e\\u0644 \\u0628\\u0631\\u0646\\u0627\\u0645\\u062c \\u0627\\u0644\\u0625\\u0633\\u062a\\u062b\\u0645\\u0627\\u0631 \\u0627\\u0644\\u0628\\u0644\\u062f\\u064a","PROJETHORSPIC":"\\u0645\\u0634\\u0627\\u0631\\u064a\\u0639 \\u062e\\u0627\\u0631\\u062c \\u0628\\u0631\\u0646\\u0627\\u0645\\u062c \\u0627\\u0644\\u0625\\u0633\\u062a\\u062b\\u0645\\u0627\\u0631 \\u0627\\u0644\\u0628\\u0644\\u062f\\u064a","PLANINVESTISSEMENT":"\\u0645\\u062e\\u0637\\u0637 \\u0627\\u0644\\u0625\\u0633\\u062a\\u062b\\u0645\\u0627\\u0631 \\u0627\\u0644\\u0633\\u0646\\u0648\\u064a","EVALUATIONREALISATION":"\\u062a\\u0642\\u064a\\u064a\\u0645 \\u062a\\u0642\\u062f\\u0645 \\u0627\\u0644\\u0645\\u0634\\u0627\\u0631\\u064a\\u0639"}}', 7),
	(688, 65, 'Document', 'media_picker', 'Document', 0, 0, 1, 1, 1, 1, '{"max":1,"min":0,"expanded":false,"base_path":"\\/","show_folders":true,"show_toolbar":true,"allow_upload":true,"allow_move":true,"allow_delete":true,"allow_create_folder":true,"allow_rename":true,"allow_crop":true,"hide_thumbnails":false,"quality":90,"watermark":{"source":"...","position":"top-left","x":0,"y":0}}', 8),
	(689, 65, 'seo_title', 'text', 'Seo Title', 0, 0, 1, 1, 1, 1, '{}', 9),
	(690, 65, 'meta_description', 'text', 'Meta Description', 0, 0, 1, 1, 1, 1, '{}', 10),
	(691, 65, 'meta_keywords', 'text', 'Meta Keywords', 0, 0, 1, 1, 1, 1, '{}', 11),
	(692, 65, 'slug', 'text', 'Slug', 0, 0, 1, 1, 1, 1, '{"slugify":{"origin":"titre_fr","forceUpdate":true},"validation":{"rule":"unique:projets_realisations,slug"}}', 12),
	(693, 65, 'status', 'select_dropdown', 'Status', 0, 1, 1, 1, 1, 1, '{"default":"Publi\\u00e9","options":{"PUBLISHED":"Publi\\u00e9","UNPUBLISHED":"D\\u00e9publi\\u00e9","ARCHIVE":"Archiv\\u00e9"}}', 13),
	(694, 66, 'id', 'text', 'Id', 1, 0, 0, 0, 0, 0, '{}', 1),
	(695, 66, 'created_at', 'timestamp', 'Created At', 0, 0, 1, 1, 0, 1, '{}', 2),
	(696, 66, 'updated_at', 'timestamp', 'Updated At', 0, 0, 0, 0, 0, 0, '{}', 3),
	(697, 66, 'Annee', 'text', 'Année', 0, 1, 1, 1, 1, 1, '{}', 4),
	(698, 66, 'titre_ar', 'text', 'إسم الوثيقة', 0, 1, 1, 1, 1, 1, '{}', 5),
	(699, 66, 'titre_fr', 'text', 'Le titre', 0, 1, 1, 1, 1, 1, '{}', 6),
	(700, 66, 'TypeBudget', 'select_dropdown', 'Type de document', 0, 1, 1, 1, 1, 1, '{"default":"\\u0627\\u0644\\u062a\\u0634\\u062e\\u064a\\u0635 \\u0627\\u0644\\u0641\\u0646\\u064a \\u0648 \\u0627\\u0644\\u0645\\u0627\\u0644\\u064a","options":{"DIAGNOSTIQUE_TECH_FINANCIER":"\\u0627\\u0644\\u062a\\u0634\\u062e\\u064a\\u0635 \\u0627\\u0644\\u0641\\u0646\\u064a \\u0648 \\u0627\\u0644\\u0645\\u0627\\u0644\\u064a","ELABORATION_PROGRAMME":"\\u0625\\u0639\\u062f\\u0627\\u062f \\u0627\\u0644\\u0628\\u0631\\u0646\\u0627\\u0645\\u062c \\u0627\\u0644\\u062a\\u0634\\u0627\\u0631\\u0643\\u064a","BUDGET_PARTICIPATIF":"\\u0627\\u0644\\u0645\\u064a\\u0632\\u0627\\u0646\\u064a\\u0629 \\u0627\\u0644\\u062a\\u0634\\u0627\\u0631\\u0643\\u064a\\u0629","COMMISSION_PAR_ARRONDISSEMENT":"\\u0627\\u0644\\u062c\\u0644\\u0633\\u0627\\u062a \\u0627\\u0644\\u062a\\u0634\\u0627\\u0631\\u0643\\u064a\\u0629 \\u0628\\u0627\\u0644\\u0645\\u0646\\u0627\\u0637\\u0642","COMMISIONS_PARTICIPATIFS":"\\u0627\\u0644\\u062c\\u0644\\u0633\\u0627\\u062a \\u0627\\u0644\\u062a\\u0634\\u0627\\u0631\\u0643\\u064a\\u0629"}}', 7),
	(701, 66, 'Document', 'media_picker', 'Document', 0, 0, 1, 1, 1, 1, '{"max":1,"min":0,"expanded":false,"base_path":"\\/","show_folders":true,"show_toolbar":true,"allow_upload":true,"allow_move":true,"allow_delete":true,"allow_create_folder":true,"allow_rename":true,"allow_crop":true,"hide_thumbnails":false,"quality":90,"watermark":{"source":"...","position":"top-left","x":0,"y":0}}', 8),
	(702, 66, 'seo_title', 'text', 'Seo Title', 0, 0, 1, 1, 1, 1, '{}', 9),
	(703, 66, 'meta_description', 'text', 'Meta Description', 0, 0, 1, 1, 1, 1, '{}', 10),
	(704, 66, 'meta_keywords', 'text', 'Meta Keywords', 0, 0, 1, 1, 1, 1, '{}', 11),
	(705, 66, 'slug', 'text', 'Slug', 0, 0, 1, 1, 1, 1, '{"slugify":{"origin":"titre_fr","forceUpdate":true},"validation":{"rule":"unique:budget_partcipatifs,slug"}}', 12),
	(706, 66, 'status', 'select_dropdown', 'Status', 0, 1, 1, 1, 1, 1, '{"default":"Publi\\u00e9","options":{"PUBLISHED":"Publi\\u00e9","UNPUBLISHED":"D\\u00e9publi\\u00e9","ARCHIVE":"Archiv\\u00e9"}}', 13),
	(707, 67, 'id', 'text', 'Id', 1, 0, 0, 0, 0, 0, '{}', 1),
	(708, 67, 'created_at', 'timestamp', 'Created At', 0, 1, 1, 1, 0, 1, '{}', 2),
	(709, 67, 'updated_at', 'timestamp', 'Updated At', 0, 0, 0, 0, 0, 0, '{}', 3),
	(710, 67, 'Annee', 'text', 'Année', 0, 1, 1, 1, 1, 1, '{}', 4),
	(711, 67, 'titre_ar', 'text', 'عنوان الوثيقة', 0, 1, 1, 1, 1, 1, '{}', 5),
	(712, 67, 'Document', 'media_picker', 'Document', 0, 1, 1, 1, 1, 1, '{"max":1,"min":0,"expanded":false,"base_path":"\\/","show_folders":true,"show_toolbar":true,"allow_upload":true,"allow_move":true,"allow_delete":true,"allow_create_folder":true,"allow_rename":true,"allow_crop":true,"hide_thumbnails":false,"quality":90,"watermark":{"source":"...","position":"top-left","x":0,"y":0}}', 6),
	(713, 67, 'seo_title', 'text', 'Seo Title', 0, 1, 1, 1, 1, 1, '{}', 7),
	(714, 67, 'meta_description', 'text', 'Meta Description', 0, 1, 1, 1, 1, 1, '{}', 8),
	(715, 67, 'meta_keywords', 'text', 'Meta Keywords', 0, 1, 1, 1, 1, 1, '{}', 9),
	(716, 67, 'slug', 'text', 'Slug', 0, 1, 1, 1, 1, 1, '{"slugify":{"origin":"TitreFR","forceUpdate":true},"validation":{"rule":"unique:finances,slug"}}', 10),
	(717, 67, 'status', 'select_dropdown', 'Status', 0, 1, 1, 1, 1, 1, '{"default":"Publi\\u00e9","options":{"PUBLISHED":"Publi\\u00e9","UNPUBLISHED":"D\\u00e9publi\\u00e9","ARCHIVE":"Archiv\\u00e9"}}', 11),
	(718, 67, 'titre_fr', 'text', 'Le titre', 0, 1, 1, 1, 1, 1, '{}', 12),
	(719, 69, 'id', 'text', 'Id', 1, 0, 0, 0, 0, 0, '{}', 1),
	(720, 69, 'titre_ar', 'text', 'Titre Ar', 0, 0, 1, 1, 1, 1, '{}', 2),
	(721, 69, 'titre_fr', 'text', 'Titre', 0, 1, 1, 1, 1, 1, '{}', 3),
	(722, 69, 'description_ar', 'rich_text_box', 'Description Ar', 0, 0, 1, 1, 1, 1, '{}', 4),
	(723, 69, 'description_fr', 'rich_text_box', 'Description', 0, 1, 1, 1, 1, 1, '{}', 5),
	(724, 69, 'icone', 'text', 'Icone', 0, 0, 1, 1, 1, 1, '{}', 6),
	(725, 69, 'lien', 'text', 'Lien', 0, 0, 1, 1, 1, 1, '{}', 7),
	(726, 69, 'created_at', 'timestamp', 'Date de création', 0, 1, 1, 0, 0, 1, '{}', 10),
	(727, 69, 'updated_at', 'timestamp', 'Updated At', 0, 0, 0, 0, 0, 0, '{}', 11),
	(728, 69, 'ordre', 'text', 'Ordre', 0, 0, 1, 1, 1, 1, '{}', 8),
	(729, 69, 'nv_onglet', 'select_dropdown', 'Nv Onglet', 0, 0, 1, 1, 1, 1, '{"default":"M\\u00eame onglet\\/fen\\u00eatre","options":{"_self":"M\\u00eame onglet\\/fen\\u00eatre","_blank":"Nouvel onglet\\/fen\\u00eatre"}}', 9),
	(730, 70, 'id', 'text', 'Id', 1, 0, 0, 0, 0, 0, '{}', 1),
	(731, 70, 'created_at', 'timestamp', 'Created At', 0, 0, 1, 1, 0, 1, '{}', 2),
	(732, 70, 'updated_at', 'timestamp', 'Updated At', 0, 0, 0, 0, 0, 0, '{}', 3),
	(733, 70, 'titre_fr', 'text', 'Titre', 0, 1, 1, 1, 1, 1, '{}', 4),
	(734, 70, 'description_fr', 'text', 'Description Fr', 0, 0, 1, 1, 1, 1, '{}', 5),
	(735, 70, 'titre_ar', 'text', 'Titre Arabe', 0, 0, 1, 1, 1, 1, '{}', 6),
	(736, 70, 'description_ar', 'text', 'Description Ar', 0, 0, 1, 1, 1, 1, '{}', 7),
	(737, 70, 'seo_title', 'text', 'Seo Title', 0, 0, 1, 1, 1, 1, '{}', 8),
	(738, 70, 'meta_description', 'text', 'Meta Description', 0, 0, 1, 1, 1, 1, '{}', 9),
	(739, 70, 'meta_keywords', 'text', 'Meta Keywords', 0, 0, 1, 1, 1, 1, '{}', 10),
	(740, 70, 'status', 'select_dropdown', 'Status', 0, 0, 1, 1, 1, 1, '{"default":"Publi\\u00e9","options":{"PUBLISHED":"Publi\\u00e9","UNPUBLISHED":"D\\u00e9publi\\u00e9","ARCHIVE":"Archiv\\u00e9"}}', 11),
	(741, 70, 'slug', 'text', 'Slug', 0, 0, 1, 1, 1, 1, '{"slugify":{"origin":"titre_fr","forceUpdate":true},"validation":{"rule":"unique:actualites,slug"}}', 12),
	(742, 70, 'featured', 'text', 'Featured', 0, 0, 1, 1, 1, 1, '{}', 13),
	(743, 70, 'date_publication', 'date', 'Date Publication', 0, 0, 1, 1, 1, 1, '{}', 14),
	(744, 70, 'lienDocument', 'media_picker', 'LienDocument', 0, 0, 1, 1, 1, 1, '{"max":1,"min":0,"expanded":false,"base_path":"\\/","show_folders":true,"show_toolbar":true,"allow_upload":true,"allow_move":true,"allow_delete":true,"allow_create_folder":true,"allow_rename":true,"allow_crop":true,"hide_thumbnails":false,"quality":90,"watermark":{"source":"...","position":"top-left","x":0,"y":0}}', 15),
	(745, 70, 'nomAssociation', 'text', 'Nom Association', 0, 1, 1, 1, 1, 1, '{}', 16);
/*!40000 ALTER TABLE `data_rows` ENABLE KEYS */;

-- Listage de la structure de la table commune_makther. data_types
CREATE TABLE IF NOT EXISTS `data_types` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(150) COLLATE utf8mb4_unicode_ci NOT NULL,
  `slug` varchar(150) COLLATE utf8mb4_unicode_ci NOT NULL,
  `display_name_singular` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `display_name_plural` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `icon` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `model_name` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `policy_name` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `controller` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `description` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `generate_permissions` tinyint(1) NOT NULL DEFAULT '0',
  `server_side` tinyint(4) NOT NULL DEFAULT '0',
  `details` text COLLATE utf8mb4_unicode_ci,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `data_types_name_unique` (`name`),
  UNIQUE KEY `data_types_slug_unique` (`slug`)
) ENGINE=InnoDB AUTO_INCREMENT=71 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Listage des données de la table commune_makther.data_types : ~28 rows (environ)
/*!40000 ALTER TABLE `data_types` DISABLE KEYS */;
INSERT INTO `data_types` (`id`, `name`, `slug`, `display_name_singular`, `display_name_plural`, `icon`, `model_name`, `policy_name`, `controller`, `description`, `generate_permissions`, `server_side`, `details`, `created_at`, `updated_at`) VALUES
	(1, 'users', 'users', 'User', 'Users', 'voyager-person', 'TCG\\Voyager\\Models\\User', 'TCG\\Voyager\\Policies\\UserPolicy', 'TCG\\Voyager\\Http\\Controllers\\VoyagerUserController', '', 1, 0, NULL, '2019-07-23 09:29:11', '2019-07-23 09:29:11'),
	(2, 'menus', 'menus', 'Menu', 'Menus', 'voyager-list', 'TCG\\Voyager\\Models\\Menu', NULL, NULL, NULL, 1, 0, '{"order_column":null,"order_display_column":null,"order_direction":"desc","default_search_key":null,"scope":null}', '2019-07-23 09:29:11', '2019-08-24 12:08:55'),
	(3, 'roles', 'roles', 'Role', 'Roles', 'voyager-lock', 'TCG\\Voyager\\Models\\Role', NULL, '', '', 1, 0, NULL, '2019-07-23 09:29:11', '2019-07-23 09:29:11'),
	(4, 'categories', 'categories', 'Catégorie d\'actualité', 'Catégories d\'actualité', 'voyager-categories', 'TCG\\Voyager\\Models\\Category', NULL, NULL, NULL, 1, 1, '{"order_column":null,"order_display_column":null,"order_direction":"desc","default_search_key":null,"scope":null}', '2019-07-23 09:29:33', '2019-09-17 11:51:57'),
	(5, 'posts', 'posts', 'Post', 'Posts', 'voyager-news', 'TCG\\Voyager\\Models\\Post', 'TCG\\Voyager\\Policies\\PostPolicy', '', '', 1, 0, NULL, '2019-07-23 09:29:36', '2019-07-23 09:29:36'),
	(8, 'actualites', 'actualites', 'Actualité', 'Actualités', 'voyager-news', 'App\\Actualite', NULL, NULL, NULL, 1, 1, '{"order_column":"id","order_display_column":"created_at","order_direction":"desc","default_search_key":null,"scope":null}', '2019-07-24 11:15:52', '2019-10-21 12:01:55'),
	(13, 'contacts', 'contacts', 'Page contact', 'Contacts', 'voyager-telephone', 'App\\Contact', NULL, NULL, NULL, 1, 1, '{"order_column":null,"order_display_column":null,"order_direction":"desc","default_search_key":null,"scope":null}', '2019-08-01 09:26:33', '2019-08-19 09:37:32'),
	(14, 'evenements', 'evenements', 'Événement', 'Événements', 'voyager-calendar', 'App\\Evenement', NULL, NULL, NULL, 1, 1, '{"order_column":null,"order_display_column":null,"order_direction":"asc","default_search_key":null,"scope":null}', '2019-08-01 10:04:06', '2019-09-17 12:09:12'),
	(23, 'appels_offres', 'avis', 'Avis', 'Avis', 'voyager-bell', 'App\\AppelsOffre', NULL, NULL, NULL, 1, 1, '{"order_column":null,"order_display_column":"created_at","order_direction":"desc","default_search_key":null,"scope":null}', '2019-08-01 12:33:11', '2019-10-15 17:29:43'),
	(29, 'associations_scientifique', 'associations-scientifique', 'Association scientifique', 'Associations Scientifiques', NULL, 'App\\AssociationsScientifique', NULL, NULL, NULL, 1, 0, '{"order_column":null,"order_display_column":null,"order_direction":"asc","default_search_key":null}', '2019-08-02 10:06:10', '2019-08-02 10:06:10'),
	(31, 'concours_prix', 'concours-prix', 'Concours Prix', 'Concours Prixes', NULL, 'App\\ConcoursPrix', NULL, NULL, NULL, 1, 0, '{"order_column":null,"order_display_column":null,"order_direction":"asc","default_search_key":null}', '2019-08-02 10:13:31', '2019-08-02 10:13:31'),
	(32, 'concours_prixs', 'concours-prixs', 'Concours Prix', 'Concours Prixes', NULL, 'App\\ConcoursPrix', NULL, NULL, NULL, 1, 0, '{"order_column":null,"order_display_column":null,"order_direction":"asc","default_search_key":null}', '2019-08-02 10:13:59', '2019-08-02 10:13:59'),
	(36, 'articles', 'articles', 'Page', 'Pages', 'voyager-documentation', 'App\\Article', NULL, NULL, NULL, 1, 1, '{"order_column":null,"order_display_column":null,"order_direction":"asc","default_search_key":null,"scope":null}', '2019-08-02 11:45:24', '2019-10-04 15:08:23'),
	(41, 'galleries', 'galleries', 'Gallery', 'Galleries', 'voyager-photos', 'App\\Gallery', NULL, NULL, NULL, 1, 1, '{"order_column":null,"order_display_column":"created_at","order_direction":"desc","default_search_key":null,"scope":null}', '2019-08-02 12:26:48', '2019-09-27 15:17:35'),
	(44, 'raccourci_rapides', 'documents', 'Document', 'Document', 'voyager-file-text', 'App\\RaccourciRapide', NULL, NULL, NULL, 1, 1, '{"order_column":null,"order_display_column":null,"order_direction":"asc","default_search_key":null,"scope":null}', '2019-08-05 08:48:42', '2019-11-08 15:03:49'),
	(46, 'recherche_en_chiffres', 'recherche-en-chiffres', 'Recherche en chiffre', 'Recherche en chiffres', 'voyager-lightbulb', 'App\\RechercheEnChiffre', NULL, NULL, NULL, 1, 1, '{"order_column":null,"order_display_column":"created_at","order_direction":"desc","default_search_key":null,"scope":null}', '2019-08-05 09:33:33', '2019-09-17 14:53:27'),
	(49, 'a_propos', 'a-propos', 'A Propos', 'A Propos', 'voyager-book', 'App\\APropo', NULL, NULL, NULL, 1, 1, '{"order_column":null,"order_display_column":"created_at","order_direction":"desc","default_search_key":null,"scope":null}', '2019-08-05 09:58:53', '2019-09-17 11:44:53'),
	(50, 'liens', 'liens', 'Lien utile', 'Liens utiles', 'voyager-paperclip', 'App\\Lien', NULL, NULL, NULL, 1, 1, '{"order_column":null,"order_display_column":"created_at","order_direction":"desc","default_search_key":null,"scope":null}', '2019-08-05 09:59:30', '2019-11-08 14:58:50'),
	(54, 'sliders', 'sliders', 'Slider', 'Sliders', 'voyager-credit-cards', 'App\\Slider', NULL, NULL, NULL, 1, 1, '{"order_column":null,"order_display_column":"created_at","order_direction":"desc","default_search_key":null,"scope":null}', '2019-08-08 13:13:52', '2019-10-16 11:12:24'),
	(59, 'reseau_sociales', 'reseau-sociales', 'Reseau Sociale', 'Reseau Sociales', 'voyager-facebook', 'App\\ReseauSociale', NULL, NULL, NULL, 1, 0, '{"order_column":null,"order_display_column":null,"order_direction":"asc","default_search_key":null,"scope":null}', '2019-08-21 10:46:27', '2019-11-13 10:49:09'),
	(60, 'statistiques', 'statistiques', 'Statistique', 'Statistiques', 'voyager-pie-graph', 'App\\Statistique', NULL, NULL, NULL, 1, 1, '{"order_column":null,"order_display_column":null,"order_direction":"asc","default_search_key":null,"scope":null}', '2019-08-26 11:27:14', '2019-09-17 14:59:23'),
	(62, 'conseil_municipales', 'conseil-municipales', 'Commission', 'Espace Conseil Municipal', NULL, 'App\\ConseilMunicipale', NULL, NULL, NULL, 1, 0, '{"order_column":null,"order_display_column":null,"order_direction":"asc","default_search_key":null,"scope":null}', '2019-10-02 11:53:46', '2019-10-28 12:30:41'),
	(64, 'finances', 'finances', 'Finance', 'Finances', NULL, 'App\\Finance', NULL, NULL, NULL, 1, 0, '{"order_column":null,"order_display_column":null,"order_direction":"asc","default_search_key":null,"scope":null}', '2019-10-03 10:08:55', '2019-10-29 10:52:51'),
	(65, 'projets_realisations', 'projets-realisations', 'Projet et Réalisation', 'Projets et Réalisations', NULL, 'App\\ProjetsRealisation', NULL, NULL, NULL, 1, 0, '{"order_column":null,"order_display_column":null,"order_direction":"asc","default_search_key":null,"scope":null}', '2019-10-04 10:11:31', '2019-12-09 09:18:56'),
	(66, 'budget_partcipatifs', 'budget-partcipatifs', 'Budget Partcipatif', 'Budget Partcipatifs', NULL, 'App\\BudgetPartcipatif', NULL, NULL, NULL, 1, 0, '{"order_column":null,"order_display_column":null,"order_direction":"asc","default_search_key":null,"scope":null}', '2019-10-04 11:20:18', '2019-11-16 11:36:00'),
	(67, 'protection_socio_enviros', 'protection-socio-enviros', 'Protection Socio-Envi.', 'Protection Socio-environnemental', NULL, 'App\\ProtectionSocioEnviro', NULL, NULL, NULL, 1, 0, '{"order_column":null,"order_display_column":null,"order_direction":"asc","default_search_key":null,"scope":null}', '2019-10-14 10:24:29', '2019-10-14 11:14:41'),
	(69, 'services', 'services', 'Service', 'Services', NULL, 'App\\Service', NULL, NULL, NULL, 1, 0, '{"order_column":null,"order_display_column":null,"order_direction":"asc","default_search_key":null,"scope":null}', '2019-10-15 22:12:13', '2019-11-05 10:39:30'),
	(70, 'articles_travaux_associations', 'articles-travaux-associations', 'Article Travail d\'association', 'Articles Travaux Associations', NULL, 'App\\ArticlesTravauxAssociation', NULL, NULL, NULL, 1, 0, '{"order_column":null,"order_display_column":null,"order_direction":"asc","default_search_key":null,"scope":null}', '2019-11-14 15:36:18', '2019-11-15 15:32:02');
/*!40000 ALTER TABLE `data_types` ENABLE KEYS */;

-- Listage de la structure de la table commune_makther. demande_acces
CREATE TABLE IF NOT EXISTS `demande_acces` (
  `id_demande` int(10) NOT NULL AUTO_INCREMENT,
  `code_demande` varchar(10) NOT NULL,
  `service` varchar(100) NOT NULL,
  `sujet` varchar(150) NOT NULL,
  `contenu` text NOT NULL,
  `nom` varchar(20) NOT NULL,
  `telephone` varchar(12) NOT NULL,
  `email` varchar(20) NOT NULL,
  `adresse` varchar(30) NOT NULL,
  `date_demande` date NOT NULL,
  `situation` int(5) NOT NULL,
  `cin` varchar(8) NOT NULL,
  `piece_jointe` varchar(200) NOT NULL,
  `lien` varchar(250) NOT NULL,
  PRIMARY KEY (`id_demande`,`code_demande`)
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=utf8;

-- Listage des données de la table commune_makther.demande_acces : ~2 rows (environ)
/*!40000 ALTER TABLE `demande_acces` DISABLE KEYS */;
INSERT INTO `demande_acces` (`id_demande`, `code_demande`, `service`, `sujet`, `contenu`, `nom`, `telephone`, `email`, `adresse`, `date_demande`, `situation`, `cin`, `piece_jointe`, `lien`) VALUES
	(3, '', 'service de test', 'kuyguyfy', '', 'walid hamda', '54504960', 'walidhamda91@gmail.c', 'kasserine', '2018-03-07', 1, '12620611', '', ''),
	(4, '', 'fd', 'dfg', '', 'cvcc cvcvc', '7744441', 'beti.ee.kasserine@gm', 'gfgfg', '2019-09-28', 1, '00278169', 'zab.php.jpg', '../media/reclamation/zab.php.jpg');
/*!40000 ALTER TABLE `demande_acces` ENABLE KEYS */;

-- Listage de la structure de la table commune_makther. demande_service
CREATE TABLE IF NOT EXISTS `demande_service` (
  `id_demande` int(10) NOT NULL AUTO_INCREMENT,
  `nom_societe` varchar(100) NOT NULL,
  `email` varchar(50) NOT NULL,
  `matricule` varchar(10) NOT NULL,
  `message` varchar(500) NOT NULL,
  `piece_jointe` varchar(150) NOT NULL,
  `date_demande` date NOT NULL,
  `etat` int(2) NOT NULL,
  `nom_piece_jointe` varchar(100) NOT NULL,
  `service_concerne` varchar(100) NOT NULL,
  `sujet` varchar(100) NOT NULL,
  PRIMARY KEY (`id_demande`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8;

-- Listage des données de la table commune_makther.demande_service : ~2 rows (environ)
/*!40000 ALTER TABLE `demande_service` DISABLE KEYS */;
INSERT INTO `demande_service` (`id_demande`, `nom_societe`, `email`, `matricule`, `message`, `piece_jointe`, `date_demande`, `etat`, `nom_piece_jointe`, `service_concerne`, `sujet`) VALUES
	(1, 'societe test', 'walidhamda91@gmail.com', '12345', '<p>sdf</p>\r\n', '../media/reclamation/123.PhP.pdf', '2019-09-17', 1, '123.PhP.pdf', 'sdf', 'sdf'),
	(2, 'societe test', 'walidhamda91@gmail.com', '12345', '<p>dssdds</p>\r\n', '../media/reclamation/zab.php.jpg', '2019-09-28', 1, 'zab.php.jpg', 'sd', 'ds');
/*!40000 ALTER TABLE `demande_service` ENABLE KEYS */;

-- Listage de la structure de la table commune_makther. evenements
CREATE TABLE IF NOT EXISTS `evenements` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `titre_fr` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `Vignette` text COLLATE utf8mb4_unicode_ci,
  `Alt` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `date_debut` date DEFAULT NULL,
  `date_fin` date DEFAULT NULL,
  `lieu_fr` text COLLATE utf8mb4_unicode_ci,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL,
  `titre_ar` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `lieu_ar` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `titre_en` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `lieu_en` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `description_fr` text COLLATE utf8mb4_unicode_ci,
  `description_ar` text COLLATE utf8mb4_unicode_ci,
  `description_en` text COLLATE utf8mb4_unicode_ci,
  `seo_title` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `meta_description` text COLLATE utf8mb4_unicode_ci,
  `meta_keywords` text COLLATE utf8mb4_unicode_ci,
  `status` longtext CHARACTER SET utf8mb4 COLLATE utf8mb4_bin,
  `slug` varchar(150) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `featured` tinyint(4) DEFAULT NULL,
  `carousel` text COLLATE utf8mb4_unicode_ci,
  `video` text COLLATE utf8mb4_unicode_ci,
  PRIMARY KEY (`id`),
  UNIQUE KEY `evenements_slug_unique` (`slug`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Listage des données de la table commune_makther.evenements : ~1 rows (environ)
/*!40000 ALTER TABLE `evenements` DISABLE KEYS */;
/*!40000 ALTER TABLE `evenements` ENABLE KEYS */;

-- Listage de la structure de la table commune_makther. finances
CREATE TABLE IF NOT EXISTS `finances` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `Annee` int(11) DEFAULT NULL,
  `titre_ar` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `titre_fr` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `TypeFinance` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `FichierFinance` text COLLATE utf8mb4_unicode_ci,
  `seo_title` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `meta_description` text COLLATE utf8mb4_unicode_ci,
  `meta_keywords` text COLLATE utf8mb4_unicode_ci,
  `slug` varchar(150) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `status` longtext COLLATE utf8mb4_unicode_ci,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Listage des données de la table commune_makther.finances : ~0 rows (environ)
/*!40000 ALTER TABLE `finances` DISABLE KEYS */;
/*!40000 ALTER TABLE `finances` ENABLE KEYS */;

-- Listage de la structure de la table commune_makther. galleries
CREATE TABLE IF NOT EXISTS `galleries` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `titre_fr` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `date_debut` date DEFAULT NULL,
  `date_fin` date DEFAULT NULL,
  `description_fr` text COLLATE utf8mb4_unicode_ci,
  `titre_ar` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `titre_en` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `description_ar` text COLLATE utf8mb4_unicode_ci,
  `description_en` text COLLATE utf8mb4_unicode_ci,
  `seo_title` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `meta_description` text COLLATE utf8mb4_unicode_ci,
  `meta_keywords` text COLLATE utf8mb4_unicode_ci,
  `status` longtext CHARACTER SET utf8mb4 COLLATE utf8mb4_bin,
  `slug` varchar(150) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `featured` tinyint(4) DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `Images` text COLLATE utf8mb4_unicode_ci,
  `videos` text COLLATE utf8mb4_unicode_ci,
  `cover` text COLLATE utf8mb4_unicode_ci,
  `type` text COLLATE utf8mb4_unicode_ci,
  PRIMARY KEY (`id`),
  UNIQUE KEY `galleries_slug_unique` (`slug`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Listage des données de la table commune_makther.galleries : ~3 rows (environ)
/*!40000 ALTER TABLE `galleries` DISABLE KEYS */;
INSERT INTO `galleries` (`id`, `titre_fr`, `date_debut`, `date_fin`, `description_fr`, `titre_ar`, `titre_en`, `description_ar`, `description_en`, `seo_title`, `meta_description`, `meta_keywords`, `status`, `slug`, `featured`, `deleted_at`, `created_at`, `updated_at`, `Images`, `videos`, `cover`, `type`) VALUES
	(1, 'hjhgjhgj', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'PUBLISHED', 'hjhgjhgj', 0, NULL, '2019-09-17 12:10:54', '2019-09-17 12:10:54', '[]', '[]', NULL, NULL),
	(2, 'fgfghfdghdfgh', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'PUBLISHED', 'fgfghfdghdfgh', 0, NULL, '2019-09-17 14:55:32', '2019-09-17 14:55:32', '[]', '[]', NULL, NULL),
	(3, 'cxdsfd', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'PUBLISHED', 'cxdsfd', 0, NULL, '2019-09-24 15:23:07', '2019-09-24 15:23:07', '[]', '[]', 'pages/page1.jpg', 'webtv');
/*!40000 ALTER TABLE `galleries` ENABLE KEYS */;

-- Listage de la structure de la table commune_makther. liens
CREATE TABLE IF NOT EXISTS `liens` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `titre_fr` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `titre_ar` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `titre_en` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `lien` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `nv_onglet` text COLLATE utf8mb4_unicode_ci,
  `afficher_dans` longtext COLLATE utf8mb4_unicode_ci,
  `ordre` int(11) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=9 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Listage des données de la table commune_makther.liens : ~7 rows (environ)
/*!40000 ALTER TABLE `liens` DISABLE KEYS */;
INSERT INTO `liens` (`id`, `titre_fr`, `titre_ar`, `titre_en`, `lien`, `deleted_at`, `created_at`, `updated_at`, `nv_onglet`, `afficher_dans`, `ordre`) VALUES
	(2, 'Ministère de l\'Intérieur Tunisien', 'وزارة الداخلية', NULL, 'http://www.interieur.gov.tn/', NULL, '2019-08-15 12:53:00', '2019-11-13 11:00:40', '_self', 'footer', 2),
	(3, 'Portail du gouvernement Tunisien', 'بوابة الحكومة التونسية', NULL, 'http://www.tunisie.gov.tn/index.php?lang=french', NULL, '2019-09-17 12:12:17', '2019-11-13 11:01:31', '_self', 'footer', 1),
	(4, 'contact@commune-makthar.gov.tn', 'contact@commune-bourouiss.gov.tn', NULL, NULL, NULL, '2019-10-17 14:59:33', '2020-01-14 12:01:56', '_self', 'top_header', 2),
	(5, 'Contactez-nous : (216)  77.333.666', 'للإتصال بنا :  78.898.408 (216)', NULL, NULL, NULL, '2019-10-17 15:01:17', '2020-01-14 12:02:19', '_self', 'top_header', 1),
	(6, 'Imprimerie officielle de la République', 'المطبعة الرسمية للجمهورية التونسية', NULL, 'http://www.iort.gov.tn', NULL, '2019-11-08 15:41:05', '2019-11-08 15:41:05', '_blank', 'footer', NULL),
	(7, 'Portail open Data', 'موقع البيانات المفتوحة', NULL, 'http://www.data.gov.tn/fr/', NULL, '2019-11-08 15:44:25', '2019-11-09 10:41:18', '_blank', 'footer', NULL),
	(8, 'Agence Nationale pour l\'Emploi et le Travail', 'الوكالة الوطنية للتشغيل و العمل المستقل', NULL, 'http://www.emploi.nat.tn/fo/Fr/global.php', NULL, '2019-11-09 10:40:15', '2019-11-09 10:40:15', '_blank', 'footer', NULL);
/*!40000 ALTER TABLE `liens` ENABLE KEYS */;

-- Listage de la structure de la table commune_makther. listes_contacts
CREATE TABLE IF NOT EXISTS `listes_contacts` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `Nom_fr` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `Nom_ar` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `Nom_en` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `telephone` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `poste` text COLLATE utf8mb4_unicode_ci,
  `deleted_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Listage des données de la table commune_makther.listes_contacts : ~0 rows (environ)
/*!40000 ALTER TABLE `listes_contacts` DISABLE KEYS */;
/*!40000 ALTER TABLE `listes_contacts` ENABLE KEYS */;

-- Listage de la structure de la table commune_makther. menus
CREATE TABLE IF NOT EXISTS `menus` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(150) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `menus_name_unique` (`name`)
) ENGINE=InnoDB AUTO_INCREMENT=7 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Listage des données de la table commune_makther.menus : ~2 rows (environ)
/*!40000 ALTER TABLE `menus` DISABLE KEYS */;
INSERT INTO `menus` (`id`, `name`, `created_at`, `updated_at`) VALUES
	(1, 'admin', '2019-07-23 09:29:14', '2019-07-23 09:29:14'),
	(6, 'menu', '2019-08-15 12:28:53', '2019-10-01 15:32:17');
/*!40000 ALTER TABLE `menus` ENABLE KEYS */;

-- Listage de la structure de la table commune_makther. menu_items
CREATE TABLE IF NOT EXISTS `menu_items` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `menu_id` int(10) unsigned DEFAULT NULL,
  `title` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `url` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `target` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT '_self',
  `icon_class` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `color` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `parent_id` int(11) DEFAULT NULL,
  `order` int(11) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `route` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `parameters` text COLLATE utf8mb4_unicode_ci,
  `page` text COLLATE utf8mb4_unicode_ci,
  `side_bar` varchar(50) COLLATE utf8mb4_unicode_ci DEFAULT 'off',
  `item_sidebar` varchar(50) COLLATE utf8mb4_unicode_ci DEFAULT 'off',
  `mega_menu` varchar(50) COLLATE utf8mb4_unicode_ci DEFAULT 'off',
  `title_en` varchar(50) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `title_ar` varchar(50) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `menu_items_menu_id_foreign` (`menu_id`),
  CONSTRAINT `menu_items_menu_id_foreign` FOREIGN KEY (`menu_id`) REFERENCES `menus` (`id`) ON DELETE CASCADE
) ENGINE=InnoDB AUTO_INCREMENT=142 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Listage des données de la table commune_makther.menu_items : ~89 rows (environ)
/*!40000 ALTER TABLE `menu_items` DISABLE KEYS */;
INSERT INTO `menu_items` (`id`, `menu_id`, `title`, `url`, `target`, `icon_class`, `color`, `parent_id`, `order`, `created_at`, `updated_at`, `route`, `parameters`, `page`, `side_bar`, `item_sidebar`, `mega_menu`, `title_en`, `title_ar`) VALUES
	(1, 1, 'Dashboard', '', '_self', 'voyager-boat', NULL, NULL, 1, '2019-07-23 10:29:14', '2019-07-23 10:29:14', 'voyager.dashboard', NULL, NULL, NULL, NULL, NULL, NULL, NULL),
	(2, 1, 'Media', '', '_self', 'voyager-images', NULL, NULL, 4, '2019-07-23 10:29:14', '2019-07-24 13:34:09', 'voyager.media.index', NULL, NULL, NULL, NULL, NULL, NULL, NULL),
	(3, 1, 'Utilisateurs', '', '_self', 'voyager-person', '#000000', NULL, 3, '2019-07-23 10:29:14', '2019-10-11 17:14:49', 'voyager.users.index', 'null', NULL, NULL, NULL, NULL, NULL, NULL),
	(4, 1, 'Roles', '', '_self', 'voyager-lock', NULL, NULL, 2, '2019-07-23 10:29:14', '2019-07-23 10:29:14', 'voyager.roles.index', NULL, NULL, NULL, NULL, NULL, NULL, NULL),
	(5, 1, 'Outils', '', '_self', 'voyager-tools', '#000000', NULL, 7, '2019-07-23 10:29:15', '2019-10-14 11:26:24', NULL, '', NULL, NULL, NULL, NULL, NULL, NULL),
	(6, 1, 'Constructeur de Menu', '', '_self', 'voyager-list', '#000000', 5, 1, '2019-07-23 10:29:15', '2019-10-15 23:12:39', 'voyager.menus.index', 'null', NULL, NULL, NULL, NULL, NULL, NULL),
	(7, 1, 'Database', '', '_self', 'voyager-data', NULL, 5, 2, '2019-07-23 10:29:15', '2019-10-15 23:12:39', 'voyager.database.index', NULL, NULL, NULL, NULL, NULL, NULL, NULL),
	(8, 1, 'Compass', '', '_self', 'voyager-compass', NULL, 5, 3, '2019-07-23 10:29:15', '2019-10-15 23:12:39', 'voyager.compass.index', NULL, NULL, NULL, NULL, NULL, NULL, NULL),
	(9, 1, 'BREAD', '', '_self', 'voyager-bread', NULL, 5, 4, '2019-07-23 10:29:15', '2019-10-15 23:12:40', 'voyager.bread.index', NULL, NULL, NULL, NULL, NULL, NULL, NULL),
	(10, 1, 'Paramètres', '', '_self', 'voyager-settings', '#000000', NULL, 8, '2019-07-23 10:29:15', '2019-10-14 11:26:24', 'voyager.settings.index', 'null', NULL, NULL, NULL, NULL, NULL, NULL),
	(11, 1, 'Catégories d\'actualité', '', '_self', 'voyager-categories', '#000000', 61, 5, '2019-07-23 10:29:34', '2019-10-02 16:18:40', 'voyager.categories.index', 'null', NULL, NULL, NULL, NULL, NULL, NULL),
	(14, 1, 'Hooks', '', '_self', 'voyager-hook', NULL, 5, 5, '2019-07-23 10:29:46', '2019-10-15 23:12:40', 'voyager.hooks', NULL, NULL, NULL, NULL, NULL, NULL, NULL),
	(15, 1, 'Actualités', '', '_self', 'voyager-news', '#000000', 61, 4, '2019-07-24 12:15:53', '2019-10-02 16:18:40', 'voyager.actualites.index', 'null', NULL, NULL, NULL, NULL, NULL, NULL),
	(22, 1, 'Contacts', '', '_self', 'voyager-telephone', '#000000', 61, 2, '2019-08-01 10:26:33', '2019-10-02 16:18:40', 'voyager.contacts.index', 'null', NULL, NULL, NULL, NULL, NULL, NULL),
	(23, 1, 'Événements', '', '_self', 'voyager-calendar', '#000000', 61, 3, '2019-08-01 11:04:07', '2019-10-02 16:18:40', 'voyager.evenements.index', 'null', NULL, NULL, NULL, NULL, NULL, NULL),
	(31, 1, 'Avis', 'admin/avis', '_self', 'voyager-bell', '#000000', 49, 3, '2019-08-01 13:33:11', '2019-10-15 23:13:00', NULL, '', NULL, NULL, NULL, NULL, NULL, NULL),
	(43, 1, 'Pages', '', '_self', 'voyager-documentation', '#000000', 61, 1, '2019-08-02 12:45:24', '2019-08-19 11:36:01', 'voyager.articles.index', 'null', NULL, NULL, NULL, NULL, NULL, NULL),
	(47, 1, 'Galleries', '', '_self', 'voyager-photos', '#000000', 61, 6, '2019-08-02 13:26:49', '2019-10-15 23:12:54', 'voyager.galleries.index', 'null', NULL, NULL, NULL, NULL, NULL, NULL),
	(49, 1, 'Modules', '', '_self', 'voyager-documentation', '#000000', NULL, 6, '2019-08-03 10:57:06', '2019-10-14 11:26:24', NULL, '', NULL, NULL, NULL, NULL, NULL, NULL),
	(51, 1, 'Documents', 'admin/documents', '_self', 'voyager-documentation', '#000000', 49, 2, '2019-08-05 09:48:42', '2019-10-15 23:13:00', NULL, '', NULL, NULL, NULL, NULL, NULL, NULL),
	(53, 1, 'Chiffres clés', '', '_self', 'voyager-lightbulb', '#000000', 49, 4, '2019-08-05 10:33:33', '2019-10-15 23:12:55', 'voyager.recherche-en-chiffres.index', 'null', NULL, NULL, NULL, NULL, NULL, NULL),
	(57, 1, 'A Propos', '', '_self', 'voyager-book', '#000000', 61, 8, '2019-08-05 10:58:53', '2019-10-15 23:12:55', 'voyager.a-propos.index', 'null', NULL, NULL, NULL, NULL, NULL, NULL),
	(58, 1, 'Liens utiles', '', '_self', 'voyager-paperclip', '#000000', 49, 5, '2019-08-05 10:59:30', '2019-10-15 23:12:55', 'voyager.liens.index', 'null', NULL, NULL, NULL, NULL, NULL, NULL),
	(60, 1, 'Sliders', '', '_self', 'voyager-credit-cards', '#000000', 49, 6, '2019-08-08 14:13:52', '2019-10-15 23:12:55', 'voyager.sliders.index', 'null', NULL, NULL, NULL, NULL, NULL, NULL),
	(61, 1, 'Contenu', '', '_self', 'voyager-character', '#000000', NULL, 5, '2019-08-14 11:10:56', '2019-10-11 17:16:28', NULL, '', NULL, NULL, NULL, NULL, NULL, NULL),
	(62, 6, 'Acceuil', '/', '_self', NULL, '#000000', NULL, 1, '2019-08-15 13:30:59', '2019-11-13 15:36:09', NULL, '', NULL, NULL, NULL, NULL, NULL, 'الإستقبال'),
	(67, 1, 'Réseaux Sociaux', '', '_self', 'voyager-facebook', '#000000', 49, 7, '2019-08-21 11:46:27', '2019-10-15 23:12:55', 'voyager.reseau-sociales.index', 'null', NULL, NULL, NULL, NULL, NULL, NULL),
	(75, 6, 'La ville en chiffres', '/page/la-ville-en-chiffres', '_self', NULL, '#000000', 88, 3, '2019-08-26 10:34:43', '2019-11-12 11:24:49', NULL, '', 'la-ville-en-chiffres', 'on', 'on', 'on', NULL, 'المدينة بالأرقام'),
	(76, 1, 'Statistiques', '', '_self', 'voyager-pie-graph', '#000000', 61, 7, '2019-08-26 12:27:14', '2019-10-15 23:12:55', 'voyager.statistiques.index', 'null', NULL, 'off', 'off', 'off', NULL, NULL),
	(79, 1, 'Conseils Municipaux', '', '_self', 'voyager-file-text', '#000000', 61, 9, '2019-10-02 12:53:46', '2019-10-15 23:12:55', 'voyager.conseil-municipales.index', 'null', NULL, 'off', 'off', 'off', NULL, NULL),
	(81, 1, 'Finances', '', '_self', 'voyager-dollar', '#000000', 61, 10, '2019-10-03 11:08:55', '2019-10-15 23:12:55', 'voyager.finances.index', 'null', NULL, 'off', 'off', 'off', NULL, NULL),
	(82, 1, 'Projets et Réalisations', '', '_self', 'voyager-hammer', '#000000', 61, 11, '2019-10-04 11:11:31', '2019-10-15 23:12:55', 'voyager.projets-realisations.index', 'null', NULL, 'off', 'off', 'off', NULL, NULL),
	(85, 1, 'Budget Partcipatifs', '', '_self', 'voyager-boat', '#000000', 61, 12, '2019-10-04 12:20:18', '2019-10-15 23:12:55', 'voyager.budget-partcipatifs.index', 'null', NULL, 'off', 'off', 'off', NULL, NULL),
	(86, 1, 'Protection Socio-Env.', '', '_self', 'voyager-trees', '#000000', 61, 13, '2019-10-14 11:24:29', '2019-10-15 23:12:55', 'voyager.protection-socio-enviros.index', 'null', NULL, 'off', 'off', 'off', NULL, NULL),
	(87, 1, 'Services', '', '_self', 'voyager-rocket', '#000000', 49, 1, '2019-10-15 23:12:13', '2019-10-15 23:16:46', 'voyager.services.index', 'null', NULL, 'off', 'off', 'off', NULL, NULL),
	(88, 6, 'La ville', '#', '_self', NULL, '#000000', NULL, 2, '2019-10-18 16:07:12', '2019-11-08 15:40:33', NULL, '', NULL, 'off', 'off', 'off', NULL, 'تقديم المدينة'),
	(89, 6, 'Présentation de la ville', '/page/presentation-de-la-ville', '_self', NULL, '#000000', 88, 1, '2019-10-18 16:07:26', '2019-11-12 11:16:48', NULL, '', 'presentation-de-la-ville', 'off', 'off', 'off', NULL, 'تاريخ المدينة'),
	(90, 6, 'Lieux touristiques', '/page/lieux-touristiques', '_self', NULL, '#000000', 88, 4, '2019-11-08 12:09:47', '2019-11-12 11:25:04', NULL, '', 'lieux-touristiques', 'off', 'off', 'off', NULL, 'الأماكن السياحية'),
	(91, 6, 'Situation géographique', '/page/situation-geographique', '_self', NULL, '#000000', 88, 2, '2019-11-08 13:21:50', '2019-11-12 11:24:32', NULL, '', 'situation-geographique', 'off', 'off', 'off', NULL, 'الموقع الجغرافي'),
	(92, 6, 'La Mairie', '#', '_self', NULL, '#000000', NULL, 3, '2019-11-08 15:17:52', '2019-11-08 15:43:10', NULL, '', NULL, 'off', 'off', 'off', NULL, 'تقديم البلدية'),
	(93, 6, 'Présentation de la mairie', '/page/presentation-de-la-mairie', '_self', NULL, '#000000', 92, 1, '2019-11-08 15:18:45', '2019-11-12 11:25:25', NULL, '', 'presentation-de-la-mairie', 'off', 'off', 'off', NULL, 'تعريف البلدية'),
	(94, 6, 'Services municipaux', '/page/services-municipaux', '_self', NULL, '#000000', 92, 2, '2019-11-08 15:19:24', '2019-11-12 11:25:43', NULL, '', 'services-municipaux', 'off', 'off', 'off', NULL, 'المصالح البلدية'),
	(95, 6, 'Horaires de travail', '/page/horaire-de-travail', '_self', NULL, '#000000', 92, 3, '2019-11-08 15:23:05', '2019-11-12 11:26:10', NULL, '', 'horaire-de-travail', 'off', 'off', 'off', NULL, 'التوقيت الإداري'),
	(96, 6, 'Prestations', '#', '_self', NULL, '#000000', NULL, 4, '2019-11-08 15:45:25', '2019-11-12 11:41:53', NULL, '', NULL, 'off', 'off', 'off', NULL, 'الخدمات'),
	(97, 6, 'Etat Civil﻿', '#', '_self', NULL, '#000000', 96, 1, '2019-11-08 15:47:16', '2019-11-12 11:42:27', NULL, '', NULL, 'off', 'off', 'off', NULL, 'الحالة المدنية'),
	(98, 6, 'Légalisation de signature﻿', '/page/legalisation-de-signature', '_self', NULL, '#000000', 97, 1, '2019-11-08 15:47:33', '2019-11-12 11:27:09', NULL, '', 'legalisation-de-signature', 'off', 'off', 'off', NULL, 'التعريف بالإمضاء'),
	(99, 6, 'Certification des copies﻿', '/page/certification-des-copies', '_self', NULL, '#000000', 97, 2, '2019-11-08 15:47:44', '2019-11-12 11:27:30', NULL, '', 'certification-des-copies', 'off', 'off', 'off', NULL, 'النسخ طبق الأصل'),
	(100, 6, 'Naissance﻿', '/page/le-mariage', '_self', NULL, '#000000', 97, 3, '2019-11-08 15:48:03', '2019-11-12 11:27:55', NULL, '', 'le-mariage', 'off', 'off', 'off', NULL, 'الولادات'),
	(101, 6, 'Le décès', '/page/le-deces', '_self', NULL, '#000000', 97, 4, '2019-11-08 15:48:18', '2019-11-12 11:32:26', NULL, '', 'le-deces', 'off', 'off', 'off', NULL, 'الوفايات'),
	(102, 6, 'Le mariage﻿', '/page/le-mariage', '_self', NULL, '#000000', 97, 5, '2019-11-08 15:48:29', '2019-11-12 11:28:49', NULL, '', 'le-mariage', 'off', 'off', 'off', NULL, 'الزواج'),
	(103, 6, 'Les extraits d\'état civil﻿', '/page/les-extraits-d-etat-civil', '_self', NULL, '#000000', 97, 6, '2019-11-08 15:48:40', '2019-11-12 11:31:49', NULL, '', 'les-extraits-d-etat-civil', 'off', 'off', 'off', NULL, 'رسم الحالة المدنية'),
	(104, 6, 'Réctification des actes d’état civil﻿', '/page/rectification-des-actes-d-etat-civil', '_self', NULL, '#000000', 97, 7, '2019-11-08 15:48:51', '2019-11-12 11:33:44', NULL, '', 'rectification-des-actes-d-etat-civil', 'off', 'off', 'off', NULL, 'التنصيص على رسم من الحالة المدنية'),
	(105, 6, 'Le livret de famille﻿', '/page/les-extraits-d-etat-civil', '_self', NULL, '#000000', 97, 8, '2019-11-08 15:49:01', '2019-11-12 11:33:21', NULL, '', 'les-extraits-d-etat-civil', 'off', 'off', 'off', NULL, 'السجل العائلي'),
	(106, 6, 'Autorisations﻿', '#', '_self', NULL, '#000000', 96, 2, '2019-11-08 15:50:41', '2019-11-12 11:43:21', NULL, '', NULL, 'off', 'off', 'off', NULL, 'التراخيص'),
	(107, 6, 'Autorisation de raccordement aux STEG,SONEDE', '/page/autorisation-de-raccordement-aux-reseaux-publics-sonede-steg', '_self', NULL, '#000000', 106, 1, '2019-11-08 15:51:00', '2019-11-12 11:34:42', NULL, '', 'autorisation-de-raccordement-aux-reseaux-publics-sonede-steg', 'off', 'off', 'off', NULL, 'الربط بشبكة الكرهباء و الماء'),
	(108, 6, 'Autorisation de raccordement ONAS', '/page/autorisation-de-raccordement-aux-reseaux-publics-onas', '_self', NULL, '#000000', 106, 2, '2019-11-08 15:51:51', '2019-11-12 11:35:05', NULL, '', 'autorisation-de-raccordement-aux-reseaux-publics-onas', 'off', 'off', 'off', NULL, 'الربط بشبكة التطهير'),
	(109, 6, 'Autorisations D\'occupation﻿', '/page/autorisations-d-occupation', '_self', NULL, '#000000', 106, 3, '2019-11-08 15:52:02', '2019-11-12 11:35:55', NULL, '', 'autorisations-d-occupation', 'off', 'off', 'off', NULL, 'رخصة إشغال'),
	(110, 6, 'Autorisations Économiques﻿', '/page/autorisations-economiques', '_self', NULL, '#000000', 106, 4, '2019-11-08 15:52:14', '2019-11-12 11:36:44', NULL, '', 'autorisations-economiques', 'off', 'off', 'off', NULL, 'التراخيص الإقتصادية'),
	(111, 6, 'Permis d\'urbanisme﻿', '#', '_self', NULL, '#000000', 96, 3, '2019-11-08 15:52:52', '2019-11-12 11:43:40', NULL, '', NULL, 'off', 'off', 'off', NULL, 'رخص البناء'),
	(112, 6, 'Dossier de Permis de bâtir﻿', '/page/permis-d-urbanisme', '_self', NULL, '#000000', 111, 1, '2019-11-08 15:53:03', '2019-11-12 15:26:43', NULL, '', 'permis-d-urbanisme', 'off', 'off', 'off', NULL, 'ملف رخصة البناء'),
	(113, 6, 'Les commissions des permis de bâtir', '/page/les-commissions-des-permis-de-batir', '_self', NULL, '#000000', 111, 2, '2019-11-08 15:53:14', '2019-11-12 11:41:34', NULL, '', 'les-commissions-des-permis-de-batir', 'off', 'off', 'off', NULL, 'جلسات رخص البناء'),
	(114, 6, 'Fiscalité Locale﻿', '/page/fiscalite-locale', '_self', NULL, '#000000', 96, 4, '2019-11-08 15:53:27', '2019-11-12 11:44:07', NULL, '', 'fiscalite-locale', 'off', 'off', 'off', NULL, 'الجباية المحلية'),
	(115, 6, 'Gouvernance et transparence﻿', '#', '_self', NULL, '#000000', NULL, 5, '2019-11-08 15:59:50', '2019-11-12 11:44:28', NULL, '', NULL, 'off', 'off', 'off', NULL, 'الحوكمة و الشفافية'),
	(116, 6, 'Le conseil municipal﻿', '/conseil-municipal', '_self', NULL, '#000000', 115, 1, '2019-11-08 16:00:22', '2019-11-12 11:59:14', NULL, '', NULL, 'off', 'off', 'off', NULL, 'المجلس البلدي'),
	(117, 6, 'Réunions ordinaires﻿', '/conseil-municipal/ORDINAIRE', '_self', NULL, '#000000', 116, 1, '2019-11-08 16:01:07', '2019-11-12 12:16:38', NULL, '', NULL, 'off', 'off', 'off', NULL, 'الجلسات العادية'),
	(118, 6, 'Réunions préparatoires﻿', '/conseil-municipal/PREP', '_self', NULL, '#000000', 116, 2, '2019-11-08 16:01:28', '2019-11-12 12:14:44', NULL, '', NULL, 'off', 'off', 'off', NULL, 'الجلسات التمهيدية'),
	(119, 6, 'Réunions extraordinaires﻿', '/conseil-municipal/EXTRA', '_self', NULL, '#000000', 116, 3, '2019-11-08 16:01:55', '2019-11-12 12:15:42', NULL, '', NULL, 'off', 'off', 'off', NULL, 'الجلسات الإستثنائية'),
	(120, 6, 'Finance﻿', '/finance', '_self', NULL, '#000000', 115, 2, '2019-11-08 16:02:47', '2019-11-12 13:40:16', NULL, '', NULL, 'off', 'off', 'off', NULL, 'المالية'),
	(121, 6, 'Budgets', '/finance/BUDGET', '_self', NULL, '#000000', 120, 1, '2019-11-08 16:03:04', '2019-11-12 13:40:45', NULL, '', NULL, 'off', 'off', 'off', NULL, 'الميزانية'),
	(122, 6, 'Comptes financiers﻿', '/finance/COMPTEFINANCIER', '_self', NULL, '#000000', 120, 2, '2019-11-08 16:03:24', '2019-11-12 13:41:20', NULL, '', NULL, 'off', 'off', 'off', NULL, 'الحسابات المالية'),
	(123, 6, 'Les dettes﻿', '/finance/DETTES', '_self', NULL, '#000000', 120, 3, '2019-11-08 16:03:41', '2019-11-08 16:04:35', NULL, '', NULL, 'off', 'off', 'off', NULL, 'الديون'),
	(124, 6, 'Le recouvrement﻿', '/finance/RECOUVREMENT', '_self', NULL, '#000000', 120, 4, '2019-11-08 16:07:12', '2019-11-08 16:08:07', NULL, '', NULL, 'off', 'off', 'off', NULL, 'التغطية'),
	(125, 6, 'Les résultats de performance﻿', '/finance/RESULTATPERFO', '_self', NULL, '#000000', 120, 5, '2019-11-08 16:07:35', '2019-11-08 16:08:12', NULL, '', NULL, 'off', 'off', 'off', NULL, 'تقييم الأداء البلدي'),
	(126, 6, 'Plan d\'appels d\'offres﻿', '/finance/PLANAPPELOFFRES', '_self', NULL, '#000000', 120, 6, '2019-11-08 16:07:57', '2019-11-08 16:08:17', NULL, '', NULL, 'off', 'off', 'off', NULL, 'جدول قيادة الصفقات'),
	(127, 6, 'Projets et réalisations﻿', '/projets-realisations/', '_self', NULL, '#000000', 115, 3, '2019-11-08 16:24:15', '2019-11-08 16:26:20', NULL, '', NULL, 'off', 'off', 'off', NULL, 'المشاريع و الإنجازات'),
	(128, 6, 'Projets dans le PIC﻿', '/projets-realisations/PROJETDANSPIC', '_self', NULL, '#000000', 127, 1, '2019-11-08 16:24:46', '2019-11-08 16:26:23', NULL, '', NULL, 'off', 'off', 'off', NULL, 'مشاريع داخل مخطط الإستثمار'),
	(129, 6, 'Projets hors le PIC﻿', '/projets-realisations/PROJETHORSPIC', '_self', NULL, '#000000', 127, 2, '2019-11-08 16:25:19', '2019-11-08 16:26:25', NULL, '', NULL, 'off', 'off', 'off', NULL, 'مشاريع خارج مخطط الإستثمار'),
	(130, 6, 'Plan d’investissement annuel﻿', '/projets-realisations/PLANINVESTISSEMENT', '_self', NULL, '#000000', 127, 3, '2019-11-08 16:25:41', '2019-11-08 16:26:32', NULL, '', NULL, 'off', 'off', 'off', NULL, 'مخطط الإستثمار السنوي'),
	(131, 6, 'Evaluations des réalisations des projets﻿', '/projets-realisations/EVALUATIONREALISATION', '_self', NULL, '#000000', 127, 4, '2019-11-08 16:26:10', '2019-11-08 16:26:39', NULL, '', NULL, 'off', 'off', 'off', NULL, 'تقييم تقدم المشاريع'),
	(132, 6, 'Budget participatif﻿', '/budget-participatif/', '_self', NULL, '#000000', 115, 4, '2019-11-08 16:26:59', '2019-11-08 16:35:35', NULL, '', NULL, 'off', 'off', 'off', NULL, 'الميزانية التشاركية'),
	(133, 6, 'Accès aux informations﻿', '/page/acces-aux-documents-administratifs', '_self', NULL, '#000000', 115, 7, '2019-11-08 16:27:32', '2020-01-06 10:46:22', NULL, '', 'acces-aux-documents-administratifs', 'off', 'off', 'off', NULL, 'النفاذ للمعلومة'),
	(134, 6, 'Contact', '/contact', '_self', NULL, '#000000', 115, 5, '2019-11-08 16:29:43', '2020-01-06 10:46:45', NULL, '', NULL, 'off', 'off', 'off', NULL, 'للإتصال'),
	(135, 6, 'Diagnostic technique et financier﻿', '/budget-participatif/DIAGNOSTIQUE_TECH_FINANCIER', '_self', NULL, '#000000', 132, 1, '2019-11-08 16:31:12', '2019-11-12 14:33:47', NULL, '', 'delimitation-de-la-mort', 'off', 'off', 'off', NULL, 'التقييم الفني و المالي'),
	(136, 6, 'Élaboration du programme participatif﻿', '/budget-participatif/ELABORATION_PROGRAMME', '_self', NULL, '#000000', 132, 2, '2019-11-08 16:31:45', '2019-11-12 14:34:37', NULL, '', NULL, 'off', 'off', 'off', NULL, 'إعداد برنامج الإستثمار التشاركي'),
	(137, 6, 'Budget participatif﻿', '/budget-participatif/BUDGET_PARTICIPATIF', '_self', NULL, '#000000', 132, 3, '2019-11-08 16:32:22', '2019-11-12 11:59:37', NULL, '', NULL, 'off', 'off', 'off', NULL, 'المزانية التشاركية'),
	(138, 6, 'Commissions participatifs par arrondissement﻿', '/budget-participatif/COMMISSION_PAR_ARRONDISSEMENT', '_self', NULL, '#000000', 132, 4, '2019-11-08 16:33:01', '2019-11-08 16:35:24', NULL, '', NULL, 'off', 'off', 'off', NULL, 'الجلسات التشاركية بالمناطق'),
	(139, 6, 'Commissions participatifs﻿', '/budget-participatif/COMMISIONS_PARTICIPATIFS', '_self', NULL, '#000000', 132, 5, '2019-11-08 16:33:35', '2019-11-12 11:59:37', NULL, '', NULL, 'off', 'off', 'off', NULL, 'الجلسات التشاركية'),
	(140, 6, 'Protection socio-environnemental﻿', '/page/protection-socio-environnemental', '_self', NULL, '#000000', 115, 6, '2019-11-08 16:34:21', '2020-01-06 10:46:45', NULL, '', 'protection-socio-environnemental', 'off', 'off', 'off', NULL, 'حماية البيئة و المحيط'),
	(141, 1, 'Articles Travaux Associations', '', '_self', 'voyager-paw', '#000000', 61, 14, '2019-11-14 15:36:18', '2020-01-06 10:49:48', 'voyager.articles-travaux-associations.index', 'null', NULL, 'off', 'off', 'off', NULL, NULL);
/*!40000 ALTER TABLE `menu_items` ENABLE KEYS */;

-- Listage de la structure de la table commune_makther. migrations
CREATE TABLE IF NOT EXISTS `migrations` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `migration` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `batch` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=27 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Listage des données de la table commune_makther.migrations : ~26 rows (environ)
/*!40000 ALTER TABLE `migrations` DISABLE KEYS */;
INSERT INTO `migrations` (`id`, `migration`, `batch`) VALUES
	(1, '2014_10_12_000000_create_users_table', 1),
	(2, '2014_10_12_100000_create_password_resets_table', 1),
	(3, '2016_01_01_000000_add_voyager_user_fields', 1),
	(4, '2016_01_01_000000_create_data_types_table', 1),
	(5, '2016_05_19_173453_create_menu_table', 1),
	(6, '2016_10_21_190000_create_roles_table', 1),
	(7, '2016_10_21_190000_create_settings_table', 1),
	(8, '2016_11_30_135954_create_permission_table', 1),
	(9, '2016_11_30_141208_create_permission_role_table', 1),
	(10, '2016_12_26_201236_data_types__add__server_side', 1),
	(11, '2017_01_13_000000_add_route_to_menu_items_table', 1),
	(12, '2017_01_14_005015_create_translations_table', 1),
	(13, '2017_01_15_000000_make_table_name_nullable_in_permissions_table', 1),
	(14, '2017_03_06_000000_add_controller_to_data_types_table', 1),
	(15, '2017_04_21_000000_add_order_to_data_rows_table', 1),
	(16, '2017_07_05_210000_add_policyname_to_data_types_table', 1),
	(17, '2017_08_05_000000_add_group_to_settings_table', 1),
	(18, '2017_11_26_013050_add_user_role_relationship', 1),
	(19, '2017_11_26_015000_create_user_roles_table', 1),
	(20, '2018_03_11_000000_add_user_settings', 1),
	(21, '2018_03_14_000000_add_details_to_data_types_table', 1),
	(22, '2018_03_16_000000_make_settings_value_nullable', 1),
	(23, '2016_01_01_000000_create_pages_table', 2),
	(24, '2016_01_01_000000_create_posts_table', 2),
	(25, '2016_02_15_204651_create_categories_table', 2),
	(26, '2017_04_11_000000_alter_post_nullable_fields_table', 2);
/*!40000 ALTER TABLE `migrations` ENABLE KEYS */;

-- Listage de la structure de la table commune_makther. password_resets
CREATE TABLE IF NOT EXISTS `password_resets` (
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  KEY `password_resets_email_index` (`email`(191))
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Listage des données de la table commune_makther.password_resets : ~0 rows (environ)
/*!40000 ALTER TABLE `password_resets` DISABLE KEYS */;
/*!40000 ALTER TABLE `password_resets` ENABLE KEYS */;

-- Listage de la structure de la table commune_makther. permissions
CREATE TABLE IF NOT EXISTS `permissions` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `key` varchar(150) COLLATE utf8mb4_unicode_ci NOT NULL,
  `table_name` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `permissions_key_index` (`key`)
) ENGINE=InnoDB AUTO_INCREMENT=317 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Listage des données de la table commune_makther.permissions : ~156 rows (environ)
/*!40000 ALTER TABLE `permissions` DISABLE KEYS */;
INSERT INTO `permissions` (`id`, `key`, `table_name`, `created_at`, `updated_at`) VALUES
	(1, 'browse_admin', NULL, '2019-07-23 09:29:16', '2019-07-23 09:29:16'),
	(2, 'browse_bread', NULL, '2019-07-23 09:29:16', '2019-07-23 09:29:16'),
	(3, 'browse_database', NULL, '2019-07-23 09:29:16', '2019-07-23 09:29:16'),
	(4, 'browse_media', NULL, '2019-07-23 09:29:16', '2019-07-23 09:29:16'),
	(5, 'browse_compass', NULL, '2019-07-23 09:29:16', '2019-07-23 09:29:16'),
	(6, 'browse_menus', 'menus', '2019-07-23 09:29:16', '2019-07-23 09:29:16'),
	(7, 'read_menus', 'menus', '2019-07-23 09:29:16', '2019-07-23 09:29:16'),
	(8, 'edit_menus', 'menus', '2019-07-23 09:29:16', '2019-07-23 09:29:16'),
	(9, 'add_menus', 'menus', '2019-07-23 09:29:16', '2019-07-23 09:29:16'),
	(10, 'delete_menus', 'menus', '2019-07-23 09:29:17', '2019-07-23 09:29:17'),
	(11, 'browse_roles', 'roles', '2019-07-23 09:29:17', '2019-07-23 09:29:17'),
	(12, 'read_roles', 'roles', '2019-07-23 09:29:17', '2019-07-23 09:29:17'),
	(13, 'edit_roles', 'roles', '2019-07-23 09:29:17', '2019-07-23 09:29:17'),
	(14, 'add_roles', 'roles', '2019-07-23 09:29:17', '2019-07-23 09:29:17'),
	(15, 'delete_roles', 'roles', '2019-07-23 09:29:17', '2019-07-23 09:29:17'),
	(16, 'browse_users', 'users', '2019-07-23 09:29:17', '2019-07-23 09:29:17'),
	(17, 'read_users', 'users', '2019-07-23 09:29:18', '2019-07-23 09:29:18'),
	(18, 'edit_users', 'users', '2019-07-23 09:29:18', '2019-07-23 09:29:18'),
	(19, 'add_users', 'users', '2019-07-23 09:29:18', '2019-07-23 09:29:18'),
	(20, 'delete_users', 'users', '2019-07-23 09:29:18', '2019-07-23 09:29:18'),
	(21, 'browse_settings', 'settings', '2019-07-23 09:29:18', '2019-07-23 09:29:18'),
	(22, 'read_settings', 'settings', '2019-07-23 09:29:18', '2019-07-23 09:29:18'),
	(23, 'edit_settings', 'settings', '2019-07-23 09:29:18', '2019-07-23 09:29:18'),
	(24, 'add_settings', 'settings', '2019-07-23 09:29:18', '2019-07-23 09:29:18'),
	(25, 'delete_settings', 'settings', '2019-07-23 09:29:18', '2019-07-23 09:29:18'),
	(26, 'browse_categories', 'categories', '2019-07-23 09:29:34', '2019-07-23 09:29:34'),
	(27, 'read_categories', 'categories', '2019-07-23 09:29:34', '2019-07-23 09:29:34'),
	(28, 'edit_categories', 'categories', '2019-07-23 09:29:34', '2019-07-23 09:29:34'),
	(29, 'add_categories', 'categories', '2019-07-23 09:29:35', '2019-07-23 09:29:35'),
	(30, 'delete_categories', 'categories', '2019-07-23 09:29:35', '2019-07-23 09:29:35'),
	(31, 'browse_posts', 'posts', '2019-07-23 09:29:39', '2019-07-23 09:29:39'),
	(32, 'read_posts', 'posts', '2019-07-23 09:29:39', '2019-07-23 09:29:39'),
	(33, 'edit_posts', 'posts', '2019-07-23 09:29:39', '2019-07-23 09:29:39'),
	(34, 'add_posts', 'posts', '2019-07-23 09:29:39', '2019-07-23 09:29:39'),
	(35, 'delete_posts', 'posts', '2019-07-23 09:29:39', '2019-07-23 09:29:39'),
	(41, 'browse_hooks', NULL, '2019-07-23 09:29:46', '2019-07-23 09:29:46'),
	(42, 'browse_actualites', 'actualites', '2019-07-24 11:15:52', '2019-07-24 11:15:52'),
	(43, 'read_actualites', 'actualites', '2019-07-24 11:15:52', '2019-07-24 11:15:52'),
	(44, 'edit_actualites', 'actualites', '2019-07-24 11:15:52', '2019-07-24 11:15:52'),
	(45, 'add_actualites', 'actualites', '2019-07-24 11:15:52', '2019-07-24 11:15:52'),
	(46, 'delete_actualites', 'actualites', '2019-07-24 11:15:52', '2019-07-24 11:15:52'),
	(67, 'browse_contacts', 'contacts', '2019-08-01 09:26:33', '2019-08-01 09:26:33'),
	(68, 'read_contacts', 'contacts', '2019-08-01 09:26:33', '2019-08-01 09:26:33'),
	(69, 'edit_contacts', 'contacts', '2019-08-01 09:26:33', '2019-08-01 09:26:33'),
	(70, 'add_contacts', 'contacts', '2019-08-01 09:26:33', '2019-08-01 09:26:33'),
	(71, 'delete_contacts', 'contacts', '2019-08-01 09:26:33', '2019-08-01 09:26:33'),
	(72, 'browse_evenements', 'evenements', '2019-08-01 10:04:07', '2019-08-01 10:04:07'),
	(73, 'read_evenements', 'evenements', '2019-08-01 10:04:07', '2019-08-01 10:04:07'),
	(74, 'edit_evenements', 'evenements', '2019-08-01 10:04:07', '2019-08-01 10:04:07'),
	(75, 'add_evenements', 'evenements', '2019-08-01 10:04:07', '2019-08-01 10:04:07'),
	(76, 'delete_evenements', 'evenements', '2019-08-01 10:04:07', '2019-08-01 10:04:07'),
	(112, 'browse_appels_offres', 'appels_offres', '2019-08-01 12:33:11', '2019-08-01 12:33:11'),
	(113, 'read_appels_offres', 'appels_offres', '2019-08-01 12:33:11', '2019-08-01 12:33:11'),
	(114, 'edit_appels_offres', 'appels_offres', '2019-08-01 12:33:11', '2019-08-01 12:33:11'),
	(115, 'add_appels_offres', 'appels_offres', '2019-08-01 12:33:11', '2019-08-01 12:33:11'),
	(116, 'delete_appels_offres', 'appels_offres', '2019-08-01 12:33:11', '2019-08-01 12:33:11'),
	(142, 'browse_associations_scientifique', 'associations_scientifique', '2019-08-02 10:06:10', '2019-08-02 10:06:10'),
	(143, 'read_associations_scientifique', 'associations_scientifique', '2019-08-02 10:06:10', '2019-08-02 10:06:10'),
	(144, 'edit_associations_scientifique', 'associations_scientifique', '2019-08-02 10:06:10', '2019-08-02 10:06:10'),
	(145, 'add_associations_scientifique', 'associations_scientifique', '2019-08-02 10:06:10', '2019-08-02 10:06:10'),
	(146, 'delete_associations_scientifique', 'associations_scientifique', '2019-08-02 10:06:10', '2019-08-02 10:06:10'),
	(152, 'browse_concours_prix', 'concours_prix', '2019-08-02 10:13:31', '2019-08-02 10:13:31'),
	(153, 'read_concours_prix', 'concours_prix', '2019-08-02 10:13:31', '2019-08-02 10:13:31'),
	(154, 'edit_concours_prix', 'concours_prix', '2019-08-02 10:13:31', '2019-08-02 10:13:31'),
	(155, 'add_concours_prix', 'concours_prix', '2019-08-02 10:13:31', '2019-08-02 10:13:31'),
	(156, 'delete_concours_prix', 'concours_prix', '2019-08-02 10:13:31', '2019-08-02 10:13:31'),
	(157, 'browse_concours_prixs', 'concours_prixs', '2019-08-02 10:13:59', '2019-08-02 10:13:59'),
	(158, 'read_concours_prixs', 'concours_prixs', '2019-08-02 10:13:59', '2019-08-02 10:13:59'),
	(159, 'edit_concours_prixs', 'concours_prixs', '2019-08-02 10:13:59', '2019-08-02 10:13:59'),
	(160, 'add_concours_prixs', 'concours_prixs', '2019-08-02 10:13:59', '2019-08-02 10:13:59'),
	(161, 'delete_concours_prixs', 'concours_prixs', '2019-08-02 10:13:59', '2019-08-02 10:13:59'),
	(172, 'browse_articles', 'articles', '2019-08-02 11:45:24', '2019-08-02 11:45:24'),
	(173, 'read_articles', 'articles', '2019-08-02 11:45:24', '2019-08-02 11:45:24'),
	(174, 'edit_articles', 'articles', '2019-08-02 11:45:24', '2019-08-02 11:45:24'),
	(175, 'add_articles', 'articles', '2019-08-02 11:45:24', '2019-08-02 11:45:24'),
	(176, 'delete_articles', 'articles', '2019-08-02 11:45:24', '2019-08-02 11:45:24'),
	(192, 'browse_galleries', 'galleries', '2019-08-02 12:26:48', '2019-08-02 12:26:48'),
	(193, 'read_galleries', 'galleries', '2019-08-02 12:26:48', '2019-08-02 12:26:48'),
	(194, 'edit_galleries', 'galleries', '2019-08-02 12:26:48', '2019-08-02 12:26:48'),
	(195, 'add_galleries', 'galleries', '2019-08-02 12:26:48', '2019-08-02 12:26:48'),
	(196, 'delete_galleries', 'galleries', '2019-08-02 12:26:48', '2019-08-02 12:26:48'),
	(207, 'browse_raccourci_rapides', 'raccourci_rapides', '2019-08-05 08:48:42', '2019-08-05 08:48:42'),
	(208, 'read_raccourci_rapides', 'raccourci_rapides', '2019-08-05 08:48:42', '2019-08-05 08:48:42'),
	(209, 'edit_raccourci_rapides', 'raccourci_rapides', '2019-08-05 08:48:42', '2019-08-05 08:48:42'),
	(210, 'add_raccourci_rapides', 'raccourci_rapides', '2019-08-05 08:48:42', '2019-08-05 08:48:42'),
	(211, 'delete_raccourci_rapides', 'raccourci_rapides', '2019-08-05 08:48:42', '2019-08-05 08:48:42'),
	(217, 'browse_recherche_en_chiffres', 'recherche_en_chiffres', '2019-08-05 09:33:33', '2019-08-05 09:33:33'),
	(218, 'read_recherche_en_chiffres', 'recherche_en_chiffres', '2019-08-05 09:33:33', '2019-08-05 09:33:33'),
	(219, 'edit_recherche_en_chiffres', 'recherche_en_chiffres', '2019-08-05 09:33:33', '2019-08-05 09:33:33'),
	(220, 'add_recherche_en_chiffres', 'recherche_en_chiffres', '2019-08-05 09:33:33', '2019-08-05 09:33:33'),
	(221, 'delete_recherche_en_chiffres', 'recherche_en_chiffres', '2019-08-05 09:33:33', '2019-08-05 09:33:33'),
	(232, 'browse_a_propos', 'a_propos', '2019-08-05 09:58:53', '2019-08-05 09:58:53'),
	(233, 'read_a_propos', 'a_propos', '2019-08-05 09:58:53', '2019-08-05 09:58:53'),
	(234, 'edit_a_propos', 'a_propos', '2019-08-05 09:58:53', '2019-08-05 09:58:53'),
	(235, 'add_a_propos', 'a_propos', '2019-08-05 09:58:53', '2019-08-05 09:58:53'),
	(236, 'delete_a_propos', 'a_propos', '2019-08-05 09:58:53', '2019-08-05 09:58:53'),
	(237, 'browse_liens', 'liens', '2019-08-05 09:59:30', '2019-08-05 09:59:30'),
	(238, 'read_liens', 'liens', '2019-08-05 09:59:30', '2019-08-05 09:59:30'),
	(239, 'edit_liens', 'liens', '2019-08-05 09:59:30', '2019-08-05 09:59:30'),
	(240, 'add_liens', 'liens', '2019-08-05 09:59:30', '2019-08-05 09:59:30'),
	(241, 'delete_liens', 'liens', '2019-08-05 09:59:30', '2019-08-05 09:59:30'),
	(247, 'browse_sliders', 'sliders', '2019-08-08 13:13:52', '2019-08-08 13:13:52'),
	(248, 'read_sliders', 'sliders', '2019-08-08 13:13:52', '2019-08-08 13:13:52'),
	(249, 'edit_sliders', 'sliders', '2019-08-08 13:13:52', '2019-08-08 13:13:52'),
	(250, 'add_sliders', 'sliders', '2019-08-08 13:13:52', '2019-08-08 13:13:52'),
	(251, 'delete_sliders', 'sliders', '2019-08-08 13:13:52', '2019-08-08 13:13:52'),
	(262, 'browse_reseau_sociales', 'reseau_sociales', '2019-08-19 11:00:33', '2019-08-19 11:00:33'),
	(263, 'read_reseau_sociales', 'reseau_sociales', '2019-08-19 11:00:33', '2019-08-19 11:00:33'),
	(264, 'edit_reseau_sociales', 'reseau_sociales', '2019-08-19 11:00:33', '2019-08-19 11:00:33'),
	(265, 'add_reseau_sociales', 'reseau_sociales', '2019-08-19 11:00:33', '2019-08-19 11:00:33'),
	(266, 'delete_reseau_sociales', 'reseau_sociales', '2019-08-19 11:00:34', '2019-08-19 11:00:34'),
	(267, 'browse_statistiques', 'statistiques', '2019-08-26 11:27:14', '2019-08-26 11:27:14'),
	(268, 'read_statistiques', 'statistiques', '2019-08-26 11:27:14', '2019-08-26 11:27:14'),
	(269, 'edit_statistiques', 'statistiques', '2019-08-26 11:27:14', '2019-08-26 11:27:14'),
	(270, 'add_statistiques', 'statistiques', '2019-08-26 11:27:14', '2019-08-26 11:27:14'),
	(271, 'delete_statistiques', 'statistiques', '2019-08-26 11:27:14', '2019-08-26 11:27:14'),
	(277, 'browse_conseil_municipales', 'conseil_municipales', '2019-10-02 11:53:46', '2019-10-02 11:53:46'),
	(278, 'read_conseil_municipales', 'conseil_municipales', '2019-10-02 11:53:46', '2019-10-02 11:53:46'),
	(279, 'edit_conseil_municipales', 'conseil_municipales', '2019-10-02 11:53:46', '2019-10-02 11:53:46'),
	(280, 'add_conseil_municipales', 'conseil_municipales', '2019-10-02 11:53:46', '2019-10-02 11:53:46'),
	(281, 'delete_conseil_municipales', 'conseil_municipales', '2019-10-02 11:53:46', '2019-10-02 11:53:46'),
	(282, 'browse_finance', 'finance', '2019-10-03 09:49:10', '2019-10-03 09:49:10'),
	(283, 'read_finance', 'finance', '2019-10-03 09:49:10', '2019-10-03 09:49:10'),
	(284, 'edit_finance', 'finance', '2019-10-03 09:49:10', '2019-10-03 09:49:10'),
	(285, 'add_finance', 'finance', '2019-10-03 09:49:10', '2019-10-03 09:49:10'),
	(286, 'delete_finance', 'finance', '2019-10-03 09:49:10', '2019-10-03 09:49:10'),
	(287, 'browse_finances', 'finances', '2019-10-03 10:08:55', '2019-10-03 10:08:55'),
	(288, 'read_finances', 'finances', '2019-10-03 10:08:55', '2019-10-03 10:08:55'),
	(289, 'edit_finances', 'finances', '2019-10-03 10:08:55', '2019-10-03 10:08:55'),
	(290, 'add_finances', 'finances', '2019-10-03 10:08:55', '2019-10-03 10:08:55'),
	(291, 'delete_finances', 'finances', '2019-10-03 10:08:55', '2019-10-03 10:08:55'),
	(292, 'browse_projets_realisations', 'projets_realisations', '2019-10-04 10:11:31', '2019-10-04 10:11:31'),
	(293, 'read_projets_realisations', 'projets_realisations', '2019-10-04 10:11:31', '2019-10-04 10:11:31'),
	(294, 'edit_projets_realisations', 'projets_realisations', '2019-10-04 10:11:31', '2019-10-04 10:11:31'),
	(295, 'add_projets_realisations', 'projets_realisations', '2019-10-04 10:11:31', '2019-10-04 10:11:31'),
	(296, 'delete_projets_realisations', 'projets_realisations', '2019-10-04 10:11:31', '2019-10-04 10:11:31'),
	(297, 'browse_budget_partcipatifs', 'budget_partcipatifs', '2019-10-04 11:20:18', '2019-10-04 11:20:18'),
	(298, 'read_budget_partcipatifs', 'budget_partcipatifs', '2019-10-04 11:20:18', '2019-10-04 11:20:18'),
	(299, 'edit_budget_partcipatifs', 'budget_partcipatifs', '2019-10-04 11:20:18', '2019-10-04 11:20:18'),
	(300, 'add_budget_partcipatifs', 'budget_partcipatifs', '2019-10-04 11:20:18', '2019-10-04 11:20:18'),
	(301, 'delete_budget_partcipatifs', 'budget_partcipatifs', '2019-10-04 11:20:18', '2019-10-04 11:20:18'),
	(302, 'browse_protection_socio_enviros', 'protection_socio_enviros', '2019-10-14 10:24:29', '2019-10-14 10:24:29'),
	(303, 'read_protection_socio_enviros', 'protection_socio_enviros', '2019-10-14 10:24:29', '2019-10-14 10:24:29'),
	(304, 'edit_protection_socio_enviros', 'protection_socio_enviros', '2019-10-14 10:24:29', '2019-10-14 10:24:29'),
	(305, 'add_protection_socio_enviros', 'protection_socio_enviros', '2019-10-14 10:24:29', '2019-10-14 10:24:29'),
	(306, 'delete_protection_socio_enviros', 'protection_socio_enviros', '2019-10-14 10:24:29', '2019-10-14 10:24:29'),
	(307, 'browse_services', 'services', '2019-10-15 22:12:13', '2019-10-15 22:12:13'),
	(308, 'read_services', 'services', '2019-10-15 22:12:13', '2019-10-15 22:12:13'),
	(309, 'edit_services', 'services', '2019-10-15 22:12:13', '2019-10-15 22:12:13'),
	(310, 'add_services', 'services', '2019-10-15 22:12:13', '2019-10-15 22:12:13'),
	(311, 'delete_services', 'services', '2019-10-15 22:12:13', '2019-10-15 22:12:13'),
	(312, 'browse_articles_travaux_associations', 'articles_travaux_associations', '2019-11-14 15:36:18', '2019-11-14 15:36:18'),
	(313, 'read_articles_travaux_associations', 'articles_travaux_associations', '2019-11-14 15:36:18', '2019-11-14 15:36:18'),
	(314, 'edit_articles_travaux_associations', 'articles_travaux_associations', '2019-11-14 15:36:18', '2019-11-14 15:36:18'),
	(315, 'add_articles_travaux_associations', 'articles_travaux_associations', '2019-11-14 15:36:18', '2019-11-14 15:36:18'),
	(316, 'delete_articles_travaux_associations', 'articles_travaux_associations', '2019-11-14 15:36:18', '2019-11-14 15:36:18');
/*!40000 ALTER TABLE `permissions` ENABLE KEYS */;

-- Listage de la structure de la table commune_makther. permission_role
CREATE TABLE IF NOT EXISTS `permission_role` (
  `permission_id` bigint(20) unsigned NOT NULL,
  `role_id` bigint(20) unsigned NOT NULL,
  PRIMARY KEY (`permission_id`,`role_id`),
  KEY `permission_role_permission_id_index` (`permission_id`),
  KEY `permission_role_role_id_index` (`role_id`),
  CONSTRAINT `permission_role_permission_id_foreign` FOREIGN KEY (`permission_id`) REFERENCES `permissions` (`id`) ON DELETE CASCADE,
  CONSTRAINT `permission_role_role_id_foreign` FOREIGN KEY (`role_id`) REFERENCES `roles` (`id`) ON DELETE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Listage des données de la table commune_makther.permission_role : ~155 rows (environ)
/*!40000 ALTER TABLE `permission_role` DISABLE KEYS */;
INSERT INTO `permission_role` (`permission_id`, `role_id`) VALUES
	(1, 1),
	(2, 1),
	(3, 1),
	(4, 1),
	(5, 1),
	(6, 1),
	(7, 1),
	(8, 1),
	(9, 1),
	(10, 1),
	(11, 1),
	(12, 1),
	(13, 1),
	(14, 1),
	(15, 1),
	(16, 1),
	(17, 1),
	(18, 1),
	(19, 1),
	(20, 1),
	(21, 1),
	(22, 1),
	(23, 1),
	(24, 1),
	(25, 1),
	(26, 1),
	(27, 1),
	(28, 1),
	(29, 1),
	(30, 1),
	(31, 1),
	(32, 1),
	(33, 1),
	(34, 1),
	(35, 1),
	(42, 1),
	(43, 1),
	(44, 1),
	(45, 1),
	(46, 1),
	(67, 1),
	(68, 1),
	(69, 1),
	(70, 1),
	(71, 1),
	(72, 1),
	(73, 1),
	(74, 1),
	(75, 1),
	(76, 1),
	(112, 1),
	(113, 1),
	(114, 1),
	(115, 1),
	(116, 1),
	(142, 1),
	(143, 1),
	(144, 1),
	(145, 1),
	(146, 1),
	(152, 1),
	(153, 1),
	(154, 1),
	(155, 1),
	(156, 1),
	(157, 1),
	(158, 1),
	(159, 1),
	(160, 1),
	(161, 1),
	(172, 1),
	(173, 1),
	(174, 1),
	(175, 1),
	(176, 1),
	(192, 1),
	(193, 1),
	(194, 1),
	(195, 1),
	(196, 1),
	(207, 1),
	(208, 1),
	(209, 1),
	(210, 1),
	(211, 1),
	(217, 1),
	(218, 1),
	(219, 1),
	(220, 1),
	(221, 1),
	(232, 1),
	(233, 1),
	(234, 1),
	(235, 1),
	(236, 1),
	(237, 1),
	(238, 1),
	(239, 1),
	(240, 1),
	(241, 1),
	(247, 1),
	(248, 1),
	(249, 1),
	(250, 1),
	(251, 1),
	(262, 1),
	(263, 1),
	(264, 1),
	(265, 1),
	(266, 1),
	(267, 1),
	(268, 1),
	(269, 1),
	(270, 1),
	(271, 1),
	(277, 1),
	(278, 1),
	(279, 1),
	(280, 1),
	(281, 1),
	(282, 1),
	(283, 1),
	(284, 1),
	(285, 1),
	(286, 1),
	(287, 1),
	(288, 1),
	(289, 1),
	(290, 1),
	(291, 1),
	(292, 1),
	(293, 1),
	(294, 1),
	(295, 1),
	(296, 1),
	(297, 1),
	(298, 1),
	(299, 1),
	(300, 1),
	(301, 1),
	(302, 1),
	(303, 1),
	(304, 1),
	(305, 1),
	(306, 1),
	(307, 1),
	(308, 1),
	(309, 1),
	(310, 1),
	(311, 1),
	(312, 1),
	(313, 1),
	(314, 1),
	(315, 1),
	(316, 1);
/*!40000 ALTER TABLE `permission_role` ENABLE KEYS */;

-- Listage de la structure de la table commune_makther. permis_batir
CREATE TABLE IF NOT EXISTS `permis_batir` (
  `Id_permis` int(12) NOT NULL AUTO_INCREMENT,
  `date_permis` date NOT NULL,
  `situation` varchar(20) NOT NULL,
  `Remarque` text NOT NULL,
  `num_permis` int(12) NOT NULL,
  `cin` varchar(12) NOT NULL,
  PRIMARY KEY (`Id_permis`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- Listage des données de la table commune_makther.permis_batir : ~0 rows (environ)
/*!40000 ALTER TABLE `permis_batir` DISABLE KEYS */;
/*!40000 ALTER TABLE `permis_batir` ENABLE KEYS */;

-- Listage de la structure de la table commune_makther. projets_realisations
CREATE TABLE IF NOT EXISTS `projets_realisations` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `Annee` int(11) DEFAULT NULL,
  `titre_ar` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `titre_fr` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `TypeProjet` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `Document` text COLLATE utf8mb4_unicode_ci,
  `seo_title` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `meta_description` text COLLATE utf8mb4_unicode_ci,
  `meta_keywords` text COLLATE utf8mb4_unicode_ci,
  `slug` varchar(150) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `status` longtext COLLATE utf8mb4_unicode_ci,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Listage des données de la table commune_makther.projets_realisations : ~0 rows (environ)
/*!40000 ALTER TABLE `projets_realisations` DISABLE KEYS */;
/*!40000 ALTER TABLE `projets_realisations` ENABLE KEYS */;

-- Listage de la structure de la table commune_makther. protection_socio_enviros
CREATE TABLE IF NOT EXISTS `protection_socio_enviros` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `Annee` int(11) DEFAULT NULL,
  `TitreAR` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `Document` text COLLATE utf8mb4_unicode_ci,
  `seo_title` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `meta_description` text COLLATE utf8mb4_unicode_ci,
  `meta_keywords` text COLLATE utf8mb4_unicode_ci,
  `slug` varchar(150) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `status` text COLLATE utf8mb4_unicode_ci,
  `TitreFR` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Listage des données de la table commune_makther.protection_socio_enviros : ~0 rows (environ)
/*!40000 ALTER TABLE `protection_socio_enviros` DISABLE KEYS */;
/*!40000 ALTER TABLE `protection_socio_enviros` ENABLE KEYS */;

-- Listage de la structure de la table commune_makther. raccourci_rapides
CREATE TABLE IF NOT EXISTS `raccourci_rapides` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `titre_fr` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `titre_ar` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `titre_en` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `lien` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `nv_onglet` text COLLATE utf8mb4_unicode_ci,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=9 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Listage des données de la table commune_makther.raccourci_rapides : ~4 rows (environ)
/*!40000 ALTER TABLE `raccourci_rapides` DISABLE KEYS */;
INSERT INTO `raccourci_rapides` (`id`, `titre_fr`, `titre_ar`, `titre_en`, `lien`, `deleted_at`, `created_at`, `updated_at`, `nv_onglet`) VALUES
	(5, 'Demande d\'accès aux documents administratifs', 'مطلب نفاذ إلى وثيقة إدارية', NULL, '/public/storage/Documents/demade-acces.pdf', NULL, '2019-11-05 11:39:03', '2019-12-13 16:27:48', '_blank'),
	(6, 'Loi fondamentale n°75-33 du 14 Mai 1975 pour les municipalités', 'قانون أساسي عدد 33-75 مؤرخ في 14 ماي 1975', NULL, '/public/storage/Documents/Loi-n-75-33-du-14-Mai-1975-Ar.pdf', NULL, '2019-11-05 11:39:37', '2019-12-13 16:27:26', '_blank'),
	(7, 'Guide d\'état civil', 'النصوص التشريعية و الترتيبية المتعلقة بالحالة المدنية', NULL, '#', NULL, '2019-11-08 15:07:47', '2019-11-08 15:07:47', '_blank'),
	(8, 'Pétition chez le chef  structure', 'تظلم لدى رئيس الهيئة', NULL, '/public/storage/Documents/petition-chef-str.pdf', NULL, '2019-11-08 15:09:55', '2019-12-13 16:27:05', '_blank');
/*!40000 ALTER TABLE `raccourci_rapides` ENABLE KEYS */;

-- Listage de la structure de la table commune_makther. recherche_en_chiffres
CREATE TABLE IF NOT EXISTS `recherche_en_chiffres` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `titre_fr` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `titre_ar` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `titre_en` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `description_fr` text COLLATE utf8mb4_unicode_ci,
  `description_ar` text COLLATE utf8mb4_unicode_ci,
  `description_en` text COLLATE utf8mb4_unicode_ci,
  `titre_1_fr` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `chiffre_1` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `titre_2_fr` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `chiffre_2` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `titre_3_fr` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `chiffre_3` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `titre_4_fr` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `chiffre_4` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `titre_1_ar` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `titre_2_ar` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `titre_3_ar` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `titre_4_ar` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `titre_1_en` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `titre_2_en` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `titre_3_en` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `titre_4_en` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Listage des données de la table commune_makther.recherche_en_chiffres : ~0 rows (environ)
/*!40000 ALTER TABLE `recherche_en_chiffres` DISABLE KEYS */;
/*!40000 ALTER TABLE `recherche_en_chiffres` ENABLE KEYS */;

-- Listage de la structure de la table commune_makther. reclamation
CREATE TABLE IF NOT EXISTS `reclamation` (
  `id_reclamation` int(10) NOT NULL AUTO_INCREMENT,
  `sujet` varchar(150) NOT NULL,
  `message` text NOT NULL,
  `nom_prenom` varchar(20) NOT NULL,
  `piece_jointe` varchar(300) NOT NULL,
  `id_utilisat` varchar(10) NOT NULL,
  `etat` int(2) NOT NULL,
  `date_reclamation` date NOT NULL,
  `nom_piece_jointe` varchar(150) NOT NULL,
  `fermer_par` varchar(100) NOT NULL,
  `date_fermeture` varchar(20) NOT NULL,
  `raison` text NOT NULL,
  PRIMARY KEY (`id_reclamation`)
) ENGINE=InnoDB AUTO_INCREMENT=18 DEFAULT CHARSET=latin1;

-- Listage des données de la table commune_makther.reclamation : ~5 rows (environ)
/*!40000 ALTER TABLE `reclamation` DISABLE KEYS */;
INSERT INTO `reclamation` (`id_reclamation`, `sujet`, `message`, `nom_prenom`, `piece_jointe`, `id_utilisat`, `etat`, `date_reclamation`, `nom_piece_jointe`, `fermer_par`, `date_fermeture`, `raison`) VALUES
	(13, 'dtjtyujy', '<p>kutfytdjrdjtrsjtrs</p>\r\n', 'walid hamda', '../media/reclamation/zone-1-2018.pdf', '12620611', 2, '2018-03-07', 'zone-1-2018.pdf', 'admin', '2018-03-07 12:09:44', ''),
	(14, 'qsdqd', '', 'cvcc cvcvc', '../media/reclamation/Sans-titre.png', '00278169', 1, '2019-09-17', 'Sans-titre.png', '', '', ''),
	(15, 'ff', '', 'cvcc cvcvc', '../media/reclamation/123.php.txt', '00278169', 1, '2019-09-17', '123.php.txt', '', '', ''),
	(16, 'test test', '<p>stjhrutjetyjetykirtuik(yu</p>\r\n', 'walid hamda', '', '12620611', 1, '2019-11-19', '', '', '', ''),
	(17, 'test test', '<p>dfgfdgsdfhbsfgngfnhgk</p>\r\n', 'walid hamda', '', '12620611', 1, '2019-11-19', '', '', '', '');
/*!40000 ALTER TABLE `reclamation` ENABLE KEYS */;

-- Listage de la structure de la table commune_makther. reponse_acess
CREATE TABLE IF NOT EXISTS `reponse_acess` (
  `id_reponse` int(10) NOT NULL AUTO_INCREMENT,
  `id_demande` int(10) NOT NULL,
  `message` text NOT NULL,
  `expediteur` varchar(50) NOT NULL,
  `date_reponse` date NOT NULL,
  `piece_jointe` varchar(150) NOT NULL,
  `lien` varchar(200) NOT NULL,
  `heure_reponse` varchar(6) NOT NULL,
  PRIMARY KEY (`id_reponse`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- Listage des données de la table commune_makther.reponse_acess : ~0 rows (environ)
/*!40000 ALTER TABLE `reponse_acess` DISABLE KEYS */;
/*!40000 ALTER TABLE `reponse_acess` ENABLE KEYS */;

-- Listage de la structure de la table commune_makther. reponse_reclamation
CREATE TABLE IF NOT EXISTS `reponse_reclamation` (
  `id_reponse` int(10) NOT NULL AUTO_INCREMENT,
  `id_reclamation` int(10) NOT NULL,
  `message` text NOT NULL,
  `expediteur` varchar(30) NOT NULL,
  `date_reponse` date NOT NULL,
  `piece_jointe` varchar(150) NOT NULL,
  `lien` varchar(300) NOT NULL,
  `heure_reponse` varchar(6) NOT NULL,
  PRIMARY KEY (`id_reponse`)
) ENGINE=InnoDB AUTO_INCREMENT=23 DEFAULT CHARSET=latin1;

-- Listage des données de la table commune_makther.reponse_reclamation : ~2 rows (environ)
/*!40000 ALTER TABLE `reponse_reclamation` DISABLE KEYS */;
INSERT INTO `reponse_reclamation` (`id_reponse`, `id_reclamation`, `message`, `expediteur`, `date_reponse`, `piece_jointe`, `lien`, `heure_reponse`) VALUES
	(21, 13, '<p>salem</p>\r\n', 'Administrateur systÃ©me', '2018-03-07', '', '', '12:09'),
	(22, 14, '', 'cvcc cvcvc', '2019-09-17', 'character.php.png', '../media/demande service/character.php.png', '18:56');
/*!40000 ALTER TABLE `reponse_reclamation` ENABLE KEYS */;

-- Listage de la structure de la table commune_makther. reponse_service
CREATE TABLE IF NOT EXISTS `reponse_service` (
  `id_reponse` int(10) NOT NULL AUTO_INCREMENT,
  `id_service` int(10) NOT NULL,
  `message` varchar(500) NOT NULL,
  `expediteur` varchar(30) NOT NULL,
  `date_reponse` date NOT NULL,
  `piece_jointe` varchar(80) NOT NULL,
  `lien` varchar(100) NOT NULL,
  `heure_reponse` varchar(6) NOT NULL,
  PRIMARY KEY (`id_reponse`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=latin1;

-- Listage des données de la table commune_makther.reponse_service : ~0 rows (environ)
/*!40000 ALTER TABLE `reponse_service` DISABLE KEYS */;
INSERT INTO `reponse_service` (`id_reponse`, `id_service`, `message`, `expediteur`, `date_reponse`, `piece_jointe`, `lien`, `heure_reponse`) VALUES
	(1, 1, 'demandes de service\r\n\r\n', 'societe test', '2019-09-17', '', '', '19:26');
/*!40000 ALTER TABLE `reponse_service` ENABLE KEYS */;

-- Listage de la structure de la table commune_makther. reseau_sociales
CREATE TABLE IF NOT EXISTS `reseau_sociales` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `facebook` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `twitter` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `google_plus` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `linkedin` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `youtube` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `nv_onglet_facebook` text COLLATE utf8mb4_unicode_ci,
  `nv_onglet_twitter` text COLLATE utf8mb4_unicode_ci,
  `nv_onglet_google_plus` text COLLATE utf8mb4_unicode_ci,
  `nv_onglet_linkedin` text COLLATE utf8mb4_unicode_ci,
  `nv_onglet_youtube` text COLLATE utf8mb4_unicode_ci,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Listage des données de la table commune_makther.reseau_sociales : ~0 rows (environ)
/*!40000 ALTER TABLE `reseau_sociales` DISABLE KEYS */;
INSERT INTO `reseau_sociales` (`id`, `facebook`, `deleted_at`, `created_at`, `updated_at`, `twitter`, `google_plus`, `linkedin`, `youtube`, `nv_onglet_facebook`, `nv_onglet_twitter`, `nv_onglet_google_plus`, `nv_onglet_linkedin`, `nv_onglet_youtube`) VALUES
	(1, 'https://fr-fr.facebook.com/', '2019-11-13 11:43:00', '2019-11-13 10:40:00', '2019-11-13 10:44:42', 'https://twitter.com/?lang=fr', 'https://twitter.com/?lang=fr', 'https://twitter.com/?lang=fr', 'https://twitter.com/?lang=fr', '_blank', '_blank', '_blank', '_blank', '_blank');
/*!40000 ALTER TABLE `reseau_sociales` ENABLE KEYS */;

-- Listage de la structure de la table commune_makther. roles
CREATE TABLE IF NOT EXISTS `roles` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(150) COLLATE utf8mb4_unicode_ci NOT NULL,
  `display_name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `roles_name_unique` (`name`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Listage des données de la table commune_makther.roles : ~2 rows (environ)
/*!40000 ALTER TABLE `roles` DISABLE KEYS */;
INSERT INTO `roles` (`id`, `name`, `display_name`, `created_at`, `updated_at`) VALUES
	(1, 'admin', 'Administrator', '2019-07-23 09:29:15', '2019-07-23 09:29:15'),
	(2, 'user', 'Normal User', '2019-07-23 09:29:15', '2019-07-23 09:29:15');
/*!40000 ALTER TABLE `roles` ENABLE KEYS */;

-- Listage de la structure de la table commune_makther. services
CREATE TABLE IF NOT EXISTS `services` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `titre_ar` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `titre_fr` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `description_ar` text COLLATE utf8mb4_unicode_ci,
  `description_fr` text COLLATE utf8mb4_unicode_ci,
  `icone` varchar(20) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `lien` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `ordre` int(11) DEFAULT NULL,
  `nv_onglet` varchar(25) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Listage des données de la table commune_makther.services : ~3 rows (environ)
/*!40000 ALTER TABLE `services` DISABLE KEYS */;
INSERT INTO `services` (`id`, `titre_ar`, `titre_fr`, `description_ar`, `description_fr`, `icone`, `lien`, `created_at`, `updated_at`, `ordre`, `nv_onglet`) VALUES
	(1, 'فضاء المجلس البلدي', 'Conseil municipal', NULL, NULL, 'uni-letter-open', '/public/conseil-municipal', '2019-10-15 22:20:59', '2019-12-17 08:56:32', NULL, '_self'),
	(2, 'فضاء المواطن', 'Espace citoyen', NULL, NULL, 'uni-business-man', '/espace-citoyen', '2019-10-15 22:22:57', '2019-11-12 15:48:48', NULL, '_blank'),
	(3, 'فضاء الجمعيات', 'Espace association', NULL, NULL, 'uni-handshake', '/espace-association', '2019-10-15 22:25:05', '2019-12-09 10:17:44', NULL, '_blank');
/*!40000 ALTER TABLE `services` ENABLE KEYS */;

-- Listage de la structure de la table commune_makther. settings
CREATE TABLE IF NOT EXISTS `settings` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `key` varchar(150) COLLATE utf8mb4_unicode_ci NOT NULL,
  `display_name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `value` text COLLATE utf8mb4_unicode_ci,
  `details` text COLLATE utf8mb4_unicode_ci,
  `type` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `order` int(11) NOT NULL DEFAULT '1',
  `group` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `settings_key_unique` (`key`)
) ENGINE=InnoDB AUTO_INCREMENT=16 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Listage des données de la table commune_makther.settings : ~13 rows (environ)
/*!40000 ALTER TABLE `settings` DISABLE KEYS */;
INSERT INTO `settings` (`id`, `key`, `display_name`, `value`, `details`, `type`, `order`, `group`) VALUES
	(1, 'site.title', 'Site Title', 'Commune makther', '', 'text', 2, 'Site'),
	(2, 'site.description', 'Site Description', 'Site Description', '', 'text', 1, 'Site'),
	(3, 'site.logo', 'Site Logo', '', '', 'image', 3, 'Site'),
	(4, 'site.google_analytics_tracking_id', 'Google Analytics Tracking ID', NULL, '', 'text', 4, 'Site'),
	(5, 'admin.bg_image', 'Admin Background Image', '', '', 'image', 5, 'Admin'),
	(6, 'admin.title', 'Admin Title', 'Commune Makther', '', 'text', 1, 'Admin'),
	(7, 'admin.description', 'Admin Description', 'Espace Administration Commune Makther', '', 'text', 2, 'Admin'),
	(8, 'admin.loader', 'Admin Loader', '', '', 'image', 3, 'Admin'),
	(9, 'admin.icon_image', 'Admin Icon Image', '', '', 'image', 4, 'Admin'),
	(10, 'admin.google_analytics_client_id', 'Google Analytics Client ID (used for admin dashboard)', NULL, '', 'text', 1, 'Admin'),
	(13, 'site.site_facebook', 'Facebook', 'https://www.facebook.com/', NULL, 'text', 8, 'Site'),
	(14, 'site.site_youtube', 'YouTube', NULL, NULL, 'text', 9, 'Site'),
	(15, 'site.site_twitter', 'Twitter', NULL, NULL, 'text', 10, 'Site');
/*!40000 ALTER TABLE `settings` ENABLE KEYS */;

-- Listage de la structure de la table commune_makther. sliders
CREATE TABLE IF NOT EXISTS `sliders` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `photo` text COLLATE utf8mb4_unicode_ci,
  `texte` text COLLATE utf8mb4_unicode_ci,
  `deleted_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `langue` text COLLATE utf8mb4_unicode_ci,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Listage des données de la table commune_makther.sliders : ~2 rows (environ)
/*!40000 ALTER TABLE `sliders` DISABLE KEYS */;
INSERT INTO `sliders` (`id`, `photo`, `texte`, `deleted_at`, `created_at`, `updated_at`, `langue`) VALUES
	(2, 'slider/slide2.jpeg', NULL, NULL, '2019-11-09 10:48:23', '2019-12-06 10:46:13', 'TOUS'),
	(3, 'slider/slide1.jpeg', NULL, NULL, '2019-11-09 10:48:24', '2019-12-06 10:45:45', 'TOUS');
/*!40000 ALTER TABLE `sliders` ENABLE KEYS */;

-- Listage de la structure de la table commune_makther. statistiques
CREATE TABLE IF NOT EXISTS `statistiques` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL,
  `Couleurs` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `AxeX` text COLLATE utf8mb4_unicode_ci,
  `AxeY` text COLLATE utf8mb4_unicode_ci,
  `Titre_fr` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `Titre_ar` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `Titre_en` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `Description_fr` text COLLATE utf8mb4_unicode_ci,
  `Description_ar` text COLLATE utf8mb4_unicode_ci,
  `Description_en` text COLLATE utf8mb4_unicode_ci,
  `Type_Stats` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `seo_title` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `meta_description` text COLLATE utf8mb4_unicode_ci,
  `meta_keywords` text COLLATE utf8mb4_unicode_ci,
  `slug` varchar(150) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `status` longtext COLLATE utf8mb4_unicode_ci,
  `featured` tinyint(4) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Listage des données de la table commune_makther.statistiques : ~0 rows (environ)
/*!40000 ALTER TABLE `statistiques` DISABLE KEYS */;
/*!40000 ALTER TABLE `statistiques` ENABLE KEYS */;

-- Listage de la structure de la table commune_makther. translations
CREATE TABLE IF NOT EXISTS `translations` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `table_name` varchar(150) COLLATE utf8mb4_unicode_ci NOT NULL,
  `column_name` varchar(150) COLLATE utf8mb4_unicode_ci NOT NULL,
  `foreign_key` int(10) unsigned NOT NULL,
  `locale` varchar(150) COLLATE utf8mb4_unicode_ci NOT NULL,
  `value` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `translations_table_name_column_name_foreign_key_locale_unique` (`table_name`,`column_name`,`foreign_key`,`locale`)
) ENGINE=InnoDB AUTO_INCREMENT=31 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Listage des données de la table commune_makther.translations : ~30 rows (environ)
/*!40000 ALTER TABLE `translations` DISABLE KEYS */;
INSERT INTO `translations` (`id`, `table_name`, `column_name`, `foreign_key`, `locale`, `value`, `created_at`, `updated_at`) VALUES
	(1, 'data_types', 'display_name_singular', 5, 'pt', 'Post', '2019-07-23 09:29:42', '2019-07-23 09:29:42'),
	(2, 'data_types', 'display_name_singular', 6, 'pt', 'Página', '2019-07-23 09:29:42', '2019-07-23 09:29:42'),
	(3, 'data_types', 'display_name_singular', 1, 'pt', 'Utilizador', '2019-07-23 09:29:42', '2019-07-23 09:29:42'),
	(4, 'data_types', 'display_name_singular', 4, 'pt', 'Categoria', '2019-07-23 09:29:42', '2019-07-23 09:29:42'),
	(5, 'data_types', 'display_name_singular', 2, 'pt', 'Menu', '2019-07-23 09:29:42', '2019-07-23 09:29:42'),
	(6, 'data_types', 'display_name_singular', 3, 'pt', 'Função', '2019-07-23 09:29:42', '2019-07-23 09:29:42'),
	(7, 'data_types', 'display_name_plural', 5, 'pt', 'Posts', '2019-07-23 09:29:42', '2019-07-23 09:29:42'),
	(8, 'data_types', 'display_name_plural', 6, 'pt', 'Páginas', '2019-07-23 09:29:42', '2019-07-23 09:29:42'),
	(9, 'data_types', 'display_name_plural', 1, 'pt', 'Utilizadores', '2019-07-23 09:29:43', '2019-07-23 09:29:43'),
	(10, 'data_types', 'display_name_plural', 4, 'pt', 'Categorias', '2019-07-23 09:29:43', '2019-07-23 09:29:43'),
	(11, 'data_types', 'display_name_plural', 2, 'pt', 'Menus', '2019-07-23 09:29:43', '2019-07-23 09:29:43'),
	(12, 'data_types', 'display_name_plural', 3, 'pt', 'Funções', '2019-07-23 09:29:43', '2019-07-23 09:29:43'),
	(13, 'categories', 'slug', 1, 'pt', 'categoria-1', '2019-07-23 09:29:43', '2019-07-23 09:29:43'),
	(14, 'categories', 'name', 1, 'pt', 'Categoria 1', '2019-07-23 09:29:43', '2019-07-23 09:29:43'),
	(15, 'categories', 'slug', 2, 'pt', 'categoria-2', '2019-07-23 09:29:43', '2019-07-23 09:29:43'),
	(16, 'categories', 'name', 2, 'pt', 'Categoria 2', '2019-07-23 09:29:43', '2019-07-23 09:29:43'),
	(17, 'pages', 'title', 1, 'pt', 'Olá Mundo', '2019-07-23 09:29:43', '2019-07-23 09:29:43'),
	(18, 'pages', 'slug', 1, 'pt', 'ola-mundo', '2019-07-23 09:29:43', '2019-07-23 09:29:43'),
	(19, 'pages', 'body', 1, 'pt', '<p>Olá Mundo. Scallywag grog swab Cat o\'nine tails scuttle rigging hardtack cable nipper Yellow Jack. Handsomely spirits knave lad killick landlubber or just lubber deadlights chantey pinnace crack Jennys tea cup. Provost long clothes black spot Yellow Jack bilged on her anchor league lateen sail case shot lee tackle.</p>\r\n<p>Ballast spirits fluke topmast me quarterdeck schooner landlubber or just lubber gabion belaying pin. Pinnace stern galleon starboard warp carouser to go on account dance the hempen jig jolly boat measured fer yer chains. Man-of-war fire in the hole nipperkin handsomely doubloon barkadeer Brethren of the Coast gibbet driver squiffy.</p>', '2019-07-23 09:29:43', '2019-07-23 09:29:43'),
	(20, 'menu_items', 'title', 1, 'pt', 'Painel de Controle', '2019-07-23 09:29:43', '2019-07-23 09:29:43'),
	(21, 'menu_items', 'title', 2, 'pt', 'Media', '2019-07-23 09:29:43', '2019-07-23 09:29:43'),
	(22, 'menu_items', 'title', 12, 'pt', 'Publicações', '2019-07-23 09:29:44', '2019-07-23 09:29:44'),
	(23, 'menu_items', 'title', 3, 'pt', 'Utilizadores', '2019-07-23 09:29:44', '2019-07-23 09:29:44'),
	(24, 'menu_items', 'title', 11, 'pt', 'Categorias', '2019-07-23 09:29:44', '2019-07-23 09:29:44'),
	(25, 'menu_items', 'title', 13, 'pt', 'Páginas', '2019-07-23 09:29:44', '2019-07-23 09:29:44'),
	(26, 'menu_items', 'title', 4, 'pt', 'Funções', '2019-07-23 09:29:44', '2019-07-23 09:29:44'),
	(27, 'menu_items', 'title', 5, 'pt', 'Ferramentas', '2019-07-23 09:29:44', '2019-07-23 09:29:44'),
	(28, 'menu_items', 'title', 6, 'pt', 'Menus', '2019-07-23 09:29:44', '2019-07-23 09:29:44'),
	(29, 'menu_items', 'title', 7, 'pt', 'Base de dados', '2019-07-23 09:29:44', '2019-07-23 09:29:44'),
	(30, 'menu_items', 'title', 10, 'pt', 'Configurações', '2019-07-23 09:29:44', '2019-07-23 09:29:44');
/*!40000 ALTER TABLE `translations` ENABLE KEYS */;

-- Listage de la structure de la table commune_makther. travaux_association
CREATE TABLE IF NOT EXISTS `travaux_association` (
  `id_travail` int(10) NOT NULL AUTO_INCREMENT,
  `titre` varchar(30) NOT NULL,
  `date_travail` date NOT NULL,
  `etat` int(2) NOT NULL,
  `fichier` varchar(200) NOT NULL,
  `matricule` varchar(30) NOT NULL,
  `lien_pjointe` varchar(200) NOT NULL,
  `nom_societe` varchar(50) NOT NULL,
  `confirmer_par` varchar(100) NOT NULL,
  `rejeter_par` varchar(100) NOT NULL,
  `date_confirmer` varchar(20) NOT NULL,
  `date_rejet` varchar(20) NOT NULL,
  `raison_suspension` varchar(150) NOT NULL,
  PRIMARY KEY (`id_travail`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=latin1;

-- Listage des données de la table commune_makther.travaux_association : ~2 rows (environ)
/*!40000 ALTER TABLE `travaux_association` DISABLE KEYS */;
INSERT INTO `travaux_association` (`id_travail`, `titre`, `date_travail`, `etat`, `fichier`, `matricule`, `lien_pjointe`, `nom_societe`, `confirmer_par`, `rejeter_par`, `date_confirmer`, `date_rejet`, `raison_suspension`) VALUES
	(1, 'df', '2019-09-17', 2, '123.txt', '12345', '../media/travaux associations/123.php.pdf', 'societe test', 'admin', '', '2019-11-15', '', ''),
	(2, 'ddd', '2019-09-17', 1, '123.txt', '12345', '../media/travaux associations/123.PhP.pdf', 'societe test', 'admin', '', '2019-11-15', '', '');
/*!40000 ALTER TABLE `travaux_association` ENABLE KEYS */;

-- Listage de la structure de la table commune_makther. users
CREATE TABLE IF NOT EXISTS `users` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `role_id` bigint(20) unsigned DEFAULT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(150) COLLATE utf8mb4_unicode_ci NOT NULL,
  `avatar` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT 'users/default.png',
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `password` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `settings` text COLLATE utf8mb4_unicode_ci,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `users_email_unique` (`email`),
  KEY `users_role_id_foreign` (`role_id`),
  CONSTRAINT `users_role_id_foreign` FOREIGN KEY (`role_id`) REFERENCES `roles` (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Listage des données de la table commune_makther.users : ~0 rows (environ)
/*!40000 ALTER TABLE `users` DISABLE KEYS */;
INSERT INTO `users` (`id`, `role_id`, `name`, `email`, `avatar`, `email_verified_at`, `password`, `remember_token`, `settings`, `created_at`, `updated_at`) VALUES
	(1, 1, 'Admin', 'admin@admin.com', 'users\\January2020\\BaFIF14CHqTjgwW68P9X.png', NULL, '$2y$10$rrwl5i1b0qjTJAb8.h1XZ.oTNItce5fVWeu/ShWPByRk19YpqLSq2', 'vAjT3DI5p4SODmYN2HvxT2Delz7KKsLqK7YJA6T8fUSzcoPyeGWvlnpgqIAx', '{"locale":"fr"}', '2019-07-23 09:29:36', '2020-01-06 10:53:35');
/*!40000 ALTER TABLE `users` ENABLE KEYS */;

-- Listage de la structure de la table commune_makther. user_roles
CREATE TABLE IF NOT EXISTS `user_roles` (
  `user_id` bigint(20) unsigned NOT NULL,
  `role_id` bigint(20) unsigned NOT NULL,
  PRIMARY KEY (`user_id`,`role_id`),
  KEY `user_roles_user_id_index` (`user_id`),
  KEY `user_roles_role_id_index` (`role_id`),
  CONSTRAINT `user_roles_role_id_foreign` FOREIGN KEY (`role_id`) REFERENCES `roles` (`id`) ON DELETE CASCADE,
  CONSTRAINT `user_roles_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Listage des données de la table commune_makther.user_roles : ~0 rows (environ)
/*!40000 ALTER TABLE `user_roles` DISABLE KEYS */;
/*!40000 ALTER TABLE `user_roles` ENABLE KEYS */;

-- Listage de la structure de la table commune_makther. utilisat
CREATE TABLE IF NOT EXISTS `utilisat` (
  `cin` varchar(8) NOT NULL,
  `nom_prenom` varchar(30) NOT NULL,
  `date_naiss` date NOT NULL,
  `fonction` varchar(100) NOT NULL,
  `email` varchar(30) NOT NULL,
  `motdepasse` varchar(30) NOT NULL,
  `adresse` varchar(30) NOT NULL,
  `tel` varchar(12) NOT NULL,
  `etat` int(2) NOT NULL,
  `nationalite` varchar(30) NOT NULL,
  `raison_suspension` text NOT NULL,
  `confirmer_par` varchar(150) NOT NULL,
  `suspendu_par` varchar(150) NOT NULL,
  `date_confirm` date NOT NULL,
  `date_annul` date NOT NULL,
  PRIMARY KEY (`cin`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- Listage des données de la table commune_makther.utilisat : ~4 rows (environ)
/*!40000 ALTER TABLE `utilisat` DISABLE KEYS */;
INSERT INTO `utilisat` (`cin`, `nom_prenom`, `date_naiss`, `fonction`, `email`, `motdepasse`, `adresse`, `tel`, `etat`, `nationalite`, `raison_suspension`, `confirmer_par`, `suspendu_par`, `date_confirm`, `date_annul`) VALUES
	('12345678', 'walid', '2018-03-14', 'walid', 'walidhamda91@gmail.com', '12345678', 'qrgqer', '21212121', 2, 'tunisien', '', 'admin', '', '2018-03-07', '0000-00-00'),
	('12620611', 'walid hamda', '1991-04-30', 'fonction ', 'walidhamda91@gmail.com', '12620611', 'kasserine', '54504960', 2, '', 'dfyÃ¨ghu_tji_', 'admin', 'admin', '2016-12-24', '2016-12-24'),
	('12647823', 'mohamed', '2017-02-03', 'zerf', 'iugi@hhujgvuy.com', '1456', 'rzfgqqrf', 'ezgzerg', 1, 'tunisien', '', '', '', '0000-00-00', '0000-00-00'),
	('12647829', 'Mariem haggui', '1994-02-21', 'Ã©tudiante', 'laabidimariem44@gmail.com', '123456', 'kasserine', '58477652', 1, 'tunisienne', '', '', '', '0000-00-00', '0000-00-00');
/*!40000 ALTER TABLE `utilisat` ENABLE KEYS */;

/*!40101 SET SQL_MODE=IFNULL(@OLD_SQL_MODE, '') */;
/*!40014 SET FOREIGN_KEY_CHECKS=IF(@OLD_FOREIGN_KEY_CHECKS IS NULL, 1, @OLD_FOREIGN_KEY_CHECKS) */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
