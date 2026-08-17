-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jun 27, 2026 at 04:16 PM
-- Server version: 10.4.32-MariaDB
-- PHP Version: 8.2.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `dbcommune`
--

-- --------------------------------------------------------

--
-- Table structure for table `activity_logs`
--

CREATE TABLE `activity_logs` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `user_id` bigint(20) UNSIGNED DEFAULT NULL,
  `activity_type` varchar(255) NOT NULL,
  `subject_type` varchar(255) NOT NULL,
  `subject_id` bigint(20) UNSIGNED DEFAULT NULL,
  `description` text NOT NULL,
  `ip_address` varchar(255) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `articles`
--

CREATE TABLE `articles` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `category_id` bigint(20) UNSIGNED NOT NULL,
  `created_by` bigint(20) UNSIGNED NOT NULL,
  `updated_by` bigint(20) UNSIGNED DEFAULT NULL,
  `title_fr` varchar(255) NOT NULL,
  `title_en` varchar(255) NOT NULL,
  `title_ar` varchar(255) NOT NULL,
  `slug` varchar(255) NOT NULL,
  `content_fr` text NOT NULL,
  `content_en` text NOT NULL,
  `content_ar` text NOT NULL,
  `summary_fr` text DEFAULT NULL,
  `summary_en` text DEFAULT NULL,
  `summary_ar` text DEFAULT NULL,
  `featured_image` varchar(255) DEFAULT NULL,
  `status` enum('draft','published','archived') NOT NULL DEFAULT 'draft',
  `published_at` timestamp NULL DEFAULT NULL,
  `views` int(11) NOT NULL DEFAULT 0,
  `seo_keywords` varchar(255) DEFAULT NULL,
  `seo_meta_description` varchar(255) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `articles`
--

INSERT INTO `articles` (`id`, `category_id`, `created_by`, `updated_by`, `title_fr`, `title_en`, `title_ar`, `slug`, `content_fr`, `content_en`, `content_ar`, `summary_fr`, `summary_en`, `summary_ar`, `featured_image`, `status`, `published_at`, `views`, `seo_keywords`, `seo_meta_description`, `created_at`, `updated_at`, `deleted_at`) VALUES
(1, 1, 2, NULL, 'Le Projet de Rénovation du Quartier Historique', 'Historic District Renovation Project', 'مشروع تجديد الحي التاريخي', 'historic-district-renovation-project', 'La municipalité a lancé un projet ambitieux de rénovation du quartier historique. Ce projet vise à préserver le patrimoine architectural tout en modernisant les infrastructures. Les travaux incluront la rénovation des façades, l\'amélioration de l\'éclairage public et la création d\'espaces piétons.', 'The municipality has launched an ambitious renovation project for the historic district. This project aims to preserve architectural heritage while modernizing infrastructure. Works will include facade renovation, public lighting improvement, and creation of pedestrian spaces.', 'أطلقت البلدية مشروعا طموحا لتجديد الحي التاريخي. يهدف هذا المشروع إلى الحفاظ على التراث المعماري مع تحديث البنية التحتية. ستشمل الأعمال تجديد الواجهات وتحسين الإضاءة العامة وإنشاء مسارات للمشاة.', NULL, NULL, NULL, NULL, 'published', '2026-06-13 09:23:02', 267, NULL, NULL, '2026-06-20 09:23:02', '2026-06-20 09:23:02', NULL),
(2, 3, 1, NULL, 'Initiative Verte: Plantation de 1000 Arbres', 'Green Initiative: Planting 1000 Trees', 'مبادرة خضراء: زراعة 1000 شجرة', 'green-initiative-planting-1000-trees', 'Dans le cadre de notre engagement envers l\'environnement, la municipalité s\'engage à planter 1000 arbres cette année. Cette initiative contribuera à améliorer la qualité de l\'air, réduire les îlots de chaleur urbaine et embellir notre ville.', 'As part of our commitment to the environment, the municipality pledges to plant 1000 trees this year. This initiative will help improve air quality, reduce urban heat islands, and beautify our city.', 'ضمن التزامنا بالبيئة، تتعهد البلدية بزراعة 1000 شجرة هذا العام. ستساهم هذه المبادرة في تحسين جودة الهواء وتقليل الجزر الحرارية الحضرية وتجميل مدينتنا.', NULL, NULL, NULL, NULL, 'published', '2026-06-06 09:23:02', 461, NULL, NULL, '2026-06-20 09:23:03', '2026-06-20 09:23:03', NULL),
(3, 4, 2, NULL, 'Nouveau Centre Culturel Ouvert au Public', 'New Cultural Center Open to Public', 'مركز ثقافي جديد مفتوح للجمهور', 'new-cultural-center-open-to-public', 'Le nouveau centre culturel est désormais ouvert au public. Ce espace moderne propose des ateliers d\'art, des expositions, des concerts et des conférences. L\'inscription aux activités est gratuite pour les résidents.', 'The new cultural center is now open to the public. This modern space offers art workshops, exhibitions, concerts, and conferences. Registration for activities is free for residents.', 'المركز الثقافي الجديد مفتوح الآن للجمهور. يقدم هذا الفضاء الحديث ورش عمل فنية ومعارض وحفلات ومحاضرات. التسجيل في الأنشطة مجاني للسكان.', NULL, NULL, NULL, NULL, 'published', '2026-05-30 09:23:02', 374, NULL, NULL, '2026-06-20 09:23:03', '2026-06-20 09:23:03', NULL),
(4, 1, 1, NULL, 'Modernisation du Système de Transport Public', 'Modernization of Public Transport System', 'تحديث نظام النقل العام', 'modernization-of-public-transport-system', 'La municipalité investit dans la modernisation de son système de transport public. Nouveaux bus électriques, stations intelligentes et application mobile pour suivre les bus en temps réel.', 'The municipality is investing in modernizing its public transport system. New electric buses, smart stations, and a mobile app to track buses in real-time.', 'تستثمر البلدية في تحديث نظام النقل العام. حافلات كهربائية جديدة ومحطات ذكية وتطبيق جوال لتتبع الحافلات في الوقت الفعلي.', NULL, NULL, NULL, NULL, 'published', '2026-05-23 09:23:02', 192, NULL, NULL, '2026-06-20 09:23:03', '2026-06-20 09:23:03', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `audit_logs`
--

CREATE TABLE `audit_logs` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `user_id` bigint(20) UNSIGNED NOT NULL,
  `action` varchar(255) NOT NULL,
  `model_type` varchar(255) NOT NULL,
  `model_id` bigint(20) UNSIGNED DEFAULT NULL,
  `changes` text DEFAULT NULL,
  `description` text DEFAULT NULL,
  `ip_address` varchar(255) DEFAULT NULL,
  `user_agent` varchar(255) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `budgets`
--

CREATE TABLE `budgets` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `budget_category_id` bigint(20) UNSIGNED NOT NULL,
  `fiscal_year` int(11) NOT NULL,
  `allocated_amount` decimal(15,2) NOT NULL,
  `spent_amount` decimal(15,2) NOT NULL DEFAULT 0.00,
  `remaining_amount` decimal(15,2) NOT NULL DEFAULT 0.00,
  `status` enum('draft','approved','active','closed') NOT NULL DEFAULT 'draft',
  `description_fr` text DEFAULT NULL,
  `description_en` text DEFAULT NULL,
  `description_ar` text DEFAULT NULL,
  `created_by` bigint(20) UNSIGNED NOT NULL,
  `approved_by` bigint(20) UNSIGNED DEFAULT NULL,
  `approved_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `budgets`
--

INSERT INTO `budgets` (`id`, `budget_category_id`, `fiscal_year`, `allocated_amount`, `spent_amount`, `remaining_amount`, `status`, `description_fr`, `description_en`, `description_ar`, `created_by`, `approved_by`, `approved_at`, `created_at`, `updated_at`, `deleted_at`) VALUES
(1, 1, 2024, 5000000.00, 3250000.00, 0.00, 'active', NULL, NULL, NULL, 1, NULL, NULL, '2026-06-20 09:23:02', '2026-06-20 09:23:02', NULL),
(2, 1, 2023, 4500000.00, 4420000.00, 0.00, 'closed', NULL, NULL, NULL, 1, NULL, NULL, '2026-06-20 09:23:02', '2026-06-20 09:23:02', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `budget_allocations`
--

CREATE TABLE `budget_allocations` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `budget_id` bigint(20) UNSIGNED NOT NULL,
  `department_name` varchar(255) NOT NULL,
  `allocated_amount` decimal(15,2) NOT NULL,
  `spent_amount` decimal(15,2) NOT NULL DEFAULT 0.00,
  `status` enum('allocated','spent','closed') NOT NULL DEFAULT 'allocated',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `budget_categories`
--

CREATE TABLE `budget_categories` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name_fr` varchar(255) NOT NULL,
  `name_en` varchar(255) NOT NULL,
  `name_ar` varchar(255) NOT NULL,
  `code` varchar(255) NOT NULL,
  `description_fr` text DEFAULT NULL,
  `description_en` text DEFAULT NULL,
  `description_ar` text DEFAULT NULL,
  `type` enum('revenue','expenditure') NOT NULL DEFAULT 'expenditure',
  `order` int(11) NOT NULL DEFAULT 0,
  `is_active` tinyint(1) NOT NULL DEFAULT 1,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `budget_categories`
--

INSERT INTO `budget_categories` (`id`, `name_fr`, `name_en`, `name_ar`, `code`, `description_fr`, `description_en`, `description_ar`, `type`, `order`, `is_active`, `created_at`, `updated_at`, `deleted_at`) VALUES
(1, 'Infrastructure', 'Infrastructure', 'البنية التحتية', 'INF', NULL, NULL, NULL, 'expenditure', 0, 1, '2026-06-20 09:23:02', '2026-06-20 09:23:02', NULL),
(2, 'Services Sociaux', 'Social Services', 'الخدمات الاجتماعية', 'SOC', NULL, NULL, NULL, 'expenditure', 0, 1, '2026-06-20 09:23:02', '2026-06-20 09:23:02', NULL),
(3, 'Sécurité', 'Security', 'الأمن', 'SEC', NULL, NULL, NULL, 'expenditure', 0, 1, '2026-06-20 09:23:02', '2026-06-20 09:23:02', NULL),
(4, 'Culture et Sports', 'Culture and Sports', 'الثقافة والرياضة', 'CUL', NULL, NULL, NULL, 'expenditure', 0, 1, '2026-06-20 09:23:02', '2026-06-20 09:23:02', NULL),
(5, 'Administration', 'Administration', 'الإدارة', 'ADM', NULL, NULL, NULL, 'expenditure', 0, 1, '2026-06-20 09:23:02', '2026-06-20 09:23:02', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `cache`
--

CREATE TABLE `cache` (
  `key` varchar(255) NOT NULL,
  `value` mediumtext NOT NULL,
  `expiration` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `cache_locks`
--

CREATE TABLE `cache_locks` (
  `key` varchar(255) NOT NULL,
  `owner` varchar(255) NOT NULL,
  `expiration` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `categories`
--

CREATE TABLE `categories` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name_fr` varchar(255) NOT NULL,
  `name_en` varchar(255) NOT NULL,
  `name_ar` varchar(255) NOT NULL,
  `slug` varchar(255) NOT NULL,
  `description_fr` text DEFAULT NULL,
  `description_en` text DEFAULT NULL,
  `description_ar` text DEFAULT NULL,
  `icon` varchar(255) DEFAULT NULL,
  `order` int(11) NOT NULL DEFAULT 0,
  `is_active` tinyint(1) NOT NULL DEFAULT 1,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `categories`
--

INSERT INTO `categories` (`id`, `name_fr`, `name_en`, `name_ar`, `slug`, `description_fr`, `description_en`, `description_ar`, `icon`, `order`, `is_active`, `created_at`, `updated_at`, `deleted_at`) VALUES
(1, 'Infrastructure', 'Infrastructure', 'البنية التحتية', 'infrastructure', 'Articles sur les projets d\'infrastructure municipale', 'Articles about municipal infrastructure projects', 'مقالات عن مشاريع البنية التحتية البلدية', NULL, 0, 1, '2026-06-20 09:23:01', '2026-06-20 09:23:01', NULL),
(2, 'Services Publics', 'Public Services', 'الخدمات العامة', 'public-services', 'Informations sur les services publics municipaux', 'Information about municipal public services', 'معلومات عن الخدمات العامة البلدية', NULL, 0, 1, '2026-06-20 09:23:01', '2026-06-20 09:23:01', NULL),
(3, 'Environnement', 'Environment', 'البيئة', 'environment', 'Initiatives et projets environnementaux', 'Environmental initiatives and projects', 'المبادرات والمشاريع البيئية', NULL, 0, 1, '2026-06-20 09:23:01', '2026-06-20 09:23:01', NULL),
(4, 'Culture', 'Culture', 'الثقافة', 'culture', 'Événements culturels et artistiques', 'Cultural and artistic events', 'الأحداث الثقافية والفنية', NULL, 0, 1, '2026-06-20 09:23:01', '2026-06-20 09:23:01', NULL),
(5, 'Sports', 'Sports', 'الرياضة', 'sports', 'Activités sportives et installations', 'Sports activities and facilities', 'الأنشطة الرياضية والمرافق', NULL, 0, 1, '2026-06-20 09:23:01', '2026-06-20 09:23:01', NULL),
(6, 'Éducation', 'Education', 'التعليم', 'education', 'Programmes éducatifs et écoles', 'Educational programs and schools', 'البرامج التعليمية والمدارس', NULL, 0, 1, '2026-06-20 09:23:01', '2026-06-20 09:23:01', NULL),
(7, 'Santé', 'Health', 'الصحة', 'health', 'Services de santé et initiatives de bien-être', 'Health services and wellness initiatives', 'خدمات الصحة ومبادرات العافية', NULL, 0, 1, '2026-06-20 09:23:01', '2026-06-20 09:23:01', NULL),
(8, 'Transport', 'Transportation', 'النقل', 'transportation', 'Réseaux de transport public et routes', 'Public transport networks and roads', 'شبكات النقل العام والطرق', NULL, 0, 1, '2026-06-20 09:23:01', '2026-06-20 09:23:01', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `citizen_requests`
--

CREATE TABLE `citizen_requests` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `user_id` bigint(20) UNSIGNED NOT NULL,
  `service_id` bigint(20) UNSIGNED NOT NULL,
  `request_number` varchar(255) NOT NULL,
  `status` enum('pending','in_progress','on_hold','completed','rejected','cancelled') NOT NULL DEFAULT 'pending',
  `priority` enum('low','medium','high','urgent') NOT NULL DEFAULT 'medium',
  `description_fr` text DEFAULT NULL,
  `description_en` text DEFAULT NULL,
  `description_ar` text DEFAULT NULL,
  `reference_number` varchar(255) DEFAULT NULL,
  `assigned_at` timestamp NULL DEFAULT NULL,
  `assigned_to` bigint(20) UNSIGNED DEFAULT NULL,
  `completed_at` timestamp NULL DEFAULT NULL,
  `notes` text DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `complaints`
--

CREATE TABLE `complaints` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `user_id` bigint(20) UNSIGNED NOT NULL,
  `complaint_number` varchar(255) NOT NULL,
  `category` enum('infrastructure','services','staff','cleanliness','security','other') NOT NULL DEFAULT 'other',
  `description_fr` text NOT NULL,
  `description_en` text NOT NULL,
  `description_ar` text NOT NULL,
  `location` varchar(255) DEFAULT NULL,
  `status` enum('new','acknowledged','in_investigation','resolved','dismissed','closed') NOT NULL DEFAULT 'new',
  `priority` enum('low','medium','high','urgent') NOT NULL DEFAULT 'medium',
  `reference_number` varchar(255) DEFAULT NULL,
  `assigned_at` timestamp NULL DEFAULT NULL,
  `assigned_to` bigint(20) UNSIGNED DEFAULT NULL,
  `response` text DEFAULT NULL,
  `resolved_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `complaints`
--

INSERT INTO `complaints` (`id`, `user_id`, `complaint_number`, `category`, `description_fr`, `description_en`, `description_ar`, `location`, `status`, `priority`, `reference_number`, `assigned_at`, `assigned_to`, `response`, `resolved_at`, `created_at`, `updated_at`, `deleted_at`) VALUES
(1, 4, 'CMP-2024-001', 'infrastructure', 'Nid-de-poule profond sur la rue Principale près de l\'école', 'Deep pothole on Main Street near the school', 'حفرة عميقة في الشارع الرئيسي بالقرب من المدرسة', '123 Main Street', 'resolved', 'high', NULL, NULL, 3, 'The pothole has been repaired. Thank you for reporting.', '2026-06-15 09:23:04', '2026-06-20 09:23:04', '2026-06-20 09:23:04', NULL),
(2, 4, 'CMP-2024-002', 'cleanliness', 'Déchets accumulés dans le parc public', 'Accumulated waste in the public park', 'تراكم النفايات في الحديقة العامة', 'Central Park', 'in_investigation', 'medium', NULL, NULL, 3, NULL, NULL, '2026-06-20 09:23:05', '2026-06-20 09:23:05', NULL),
(3, 4, 'CMP-2024-003', 'services', 'Le service de collecte des ordures n\'est pas passé cette semaine', 'Garbage collection service did not come this week', 'خدمة جمع القمامة لم تأتي هذا الأسبوع', '456 Oak Avenue', 'acknowledged', 'high', NULL, NULL, 3, NULL, NULL, '2026-06-20 09:23:05', '2026-06-20 09:23:05', NULL),
(4, 4, 'CMP-2024-004', 'security', 'Éclairage public défectueux dans le quartier', 'Faulty street lighting in the neighborhood', 'إنارة الشوارع معطلة في الحي', '789 Pine Street', 'new', 'medium', NULL, NULL, NULL, NULL, NULL, '2026-06-20 09:23:05', '2026-06-20 09:23:05', NULL),
(5, 4, 'CMP-2024-005', 'staff', 'Comportement impoli d\'un employé municipal au guichet', 'Rude behavior of a municipal employee at the counter', 'سلوك غير مهذب لموظف بلدي في النافذة', 'City Hall, Counter 3', 'in_investigation', 'low', NULL, NULL, 3, NULL, NULL, '2026-06-20 09:23:05', '2026-06-20 09:23:05', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `departments`
--

CREATE TABLE `departments` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name_fr` varchar(255) NOT NULL,
  `name_en` varchar(255) NOT NULL,
  `name_ar` varchar(255) NOT NULL,
  `slug` varchar(255) NOT NULL,
  `description_fr` text DEFAULT NULL,
  `description_en` text DEFAULT NULL,
  `description_ar` text DEFAULT NULL,
  `phone` varchar(255) DEFAULT NULL,
  `email` varchar(255) DEFAULT NULL,
  `location` varchar(255) DEFAULT NULL,
  `building_number` varchar(255) DEFAULT NULL,
  `floor` varchar(255) DEFAULT NULL,
  `responsibilities_fr` text DEFAULT NULL,
  `responsibilities_en` text DEFAULT NULL,
  `responsibilities_ar` text DEFAULT NULL,
  `head_id` bigint(20) UNSIGNED DEFAULT NULL,
  `order` int(11) NOT NULL DEFAULT 0,
  `is_active` tinyint(1) NOT NULL DEFAULT 1,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `events`
--

CREATE TABLE `events` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `title_fr` varchar(255) NOT NULL,
  `title_en` varchar(255) NOT NULL,
  `title_ar` varchar(255) NOT NULL,
  `slug` varchar(255) NOT NULL,
  `description_fr` text NOT NULL,
  `description_en` text NOT NULL,
  `description_ar` text NOT NULL,
  `location_fr` varchar(255) DEFAULT NULL,
  `location_en` varchar(255) DEFAULT NULL,
  `location_ar` varchar(255) DEFAULT NULL,
  `start_date` datetime NOT NULL,
  `end_date` datetime DEFAULT NULL,
  `featured_image` varchar(255) DEFAULT NULL,
  `created_by` bigint(20) UNSIGNED NOT NULL,
  `status` enum('draft','published','cancelled','archived') NOT NULL DEFAULT 'draft',
  `capacity` int(11) DEFAULT NULL,
  `registrations` int(11) NOT NULL DEFAULT 0,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `events`
--

INSERT INTO `events` (`id`, `title_fr`, `title_en`, `title_ar`, `slug`, `description_fr`, `description_en`, `description_ar`, `location_fr`, `location_en`, `location_ar`, `start_date`, `end_date`, `featured_image`, `created_by`, `status`, `capacity`, `registrations`, `created_at`, `updated_at`, `deleted_at`) VALUES
(1, 'Festival de Musique Municipal', 'Municipal Music Festival', 'مهرجان الموسيقى البلدي', 'municipal-music-festival', 'Rejoignez-nous pour le festival de musique annuel avec des artistes locaux et internationaux. Entrée gratuite pour tous.', 'Join us for the annual music festival featuring local and international artists. Free admission for everyone.', 'انضم إلينا في مهرجان الموسيقى السنوي مع فنانين محليين ودوليين. دخول مجاني للجميع.', 'Parc Central', 'Central Park', 'السنترال بارك', '2026-07-05 10:23:04', '2026-07-07 10:23:04', NULL, 2, 'published', 5000, 0, '2026-06-20 09:23:04', '2026-06-20 09:23:04', NULL),
(2, 'Marché des Fermiers', 'Farmers Market', 'سوق المزارعين', 'farmers-market', 'Marché hebdomadaire des produits frais locaux. Légumes, fruits, fromages et pains artisanaux.', 'Weekly market of fresh local products. Vegetables, fruits, cheeses, and artisanal breads.', 'سوق أسبوعي للمنتجات الطازجة المحلية. خضروات وفواكه وأجبان وخبز artisanal.', 'Place de la Ville', 'Town Square', 'ساحة المدينة', '2026-06-21 10:23:04', '2026-06-21 10:23:04', NULL, 2, 'published', 500, 0, '2026-06-20 09:23:04', '2026-06-20 09:23:04', NULL),
(3, 'Conférence sur le Développement Durable', 'Sustainable Development Conference', 'مؤتمر التنمية المستدامة', 'sustainable-development-conference', 'Conférence sur les pratiques de développement durable pour les municipalités. Experts et décideurs partageront leurs expériences.', 'Conference on sustainable development practices for municipalities. Experts and decision-makers will share their experiences.', 'مؤتمر حول ممارسات التنمية المستدامة للبلديات. سيشارك الخبراء وصناع القرار تجاربهم.', 'Centre de Conférences', 'Conference Center', 'مركز المؤتمرات', '2026-07-20 10:23:04', '2026-07-20 10:23:04', NULL, 1, 'published', 200, 0, '2026-06-20 09:23:04', '2026-06-20 09:23:04', NULL),
(4, 'Course de Charité', 'Charity Run', 'سباق الخير', 'charity-run', 'Course de 5km pour soutenir les œuvres caritatives locales. Tous les fonds collectés iront aux banques alimentaires.', '5km run to support local charities. All funds raised will go to food banks.', 'سباق 5 كم لدعم الجمعيات الخيرية المحلية. سذهب جميع الأموال المجمعة إلى بنوك الطعام.', 'Parc de la Ville', 'City Park', 'حديقة المدينة', '2026-08-04 10:23:04', '2026-08-04 10:23:04', NULL, 1, 'published', 1000, 0, '2026-06-20 09:23:04', '2026-06-20 09:23:04', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `event_registrations`
--

CREATE TABLE `event_registrations` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `event_id` bigint(20) UNSIGNED NOT NULL,
  `user_id` bigint(20) UNSIGNED NOT NULL,
  `email` varchar(255) NOT NULL,
  `phone` varchar(255) DEFAULT NULL,
  `number_of_participants` int(11) NOT NULL DEFAULT 1,
  `status` enum('registered','confirmed','cancelled','attended') NOT NULL DEFAULT 'registered',
  `notes` text DEFAULT NULL,
  `confirmed_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `expenses`
--

CREATE TABLE `expenses` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `budget_id` bigint(20) UNSIGNED NOT NULL,
  `description_fr` varchar(255) NOT NULL,
  `description_en` varchar(255) NOT NULL,
  `description_ar` varchar(255) NOT NULL,
  `amount` decimal(15,2) NOT NULL,
  `expense_date` date NOT NULL,
  `reference_number` varchar(255) NOT NULL,
  `status` enum('pending','approved','rejected','paid') NOT NULL DEFAULT 'pending',
  `created_by` bigint(20) UNSIGNED NOT NULL,
  `approved_by` bigint(20) UNSIGNED DEFAULT NULL,
  `approved_at` timestamp NULL DEFAULT NULL,
  `notes` text DEFAULT NULL,
  `receipt_file` varchar(255) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `failed_jobs`
--

CREATE TABLE `failed_jobs` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `uuid` varchar(255) NOT NULL,
  `connection` text NOT NULL,
  `queue` text NOT NULL,
  `payload` longtext NOT NULL,
  `exception` longtext NOT NULL,
  `failed_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `galleries`
--

CREATE TABLE `galleries` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `title_fr` varchar(255) NOT NULL,
  `title_en` varchar(255) NOT NULL,
  `title_ar` varchar(255) NOT NULL,
  `slug` varchar(255) NOT NULL,
  `description_fr` text DEFAULT NULL,
  `description_en` text DEFAULT NULL,
  `description_ar` text DEFAULT NULL,
  `created_by` bigint(20) UNSIGNED NOT NULL,
  `status` enum('draft','published','archived') NOT NULL DEFAULT 'draft',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `gallery_images`
--

CREATE TABLE `gallery_images` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `gallery_id` bigint(20) UNSIGNED NOT NULL,
  `image_url` varchar(255) NOT NULL,
  `thumbnail_url` varchar(255) DEFAULT NULL,
  `title_fr` varchar(255) DEFAULT NULL,
  `title_en` varchar(255) DEFAULT NULL,
  `title_ar` varchar(255) DEFAULT NULL,
  `caption_fr` text DEFAULT NULL,
  `caption_en` text DEFAULT NULL,
  `caption_ar` text DEFAULT NULL,
  `order` int(11) NOT NULL DEFAULT 0,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `jobs`
--

CREATE TABLE `jobs` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `queue` varchar(255) NOT NULL,
  `payload` longtext NOT NULL,
  `attempts` tinyint(3) UNSIGNED NOT NULL,
  `reserved_at` int(10) UNSIGNED DEFAULT NULL,
  `available_at` int(10) UNSIGNED NOT NULL,
  `created_at` int(10) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `job_batches`
--

CREATE TABLE `job_batches` (
  `id` varchar(255) NOT NULL,
  `name` varchar(255) NOT NULL,
  `total_jobs` int(11) NOT NULL,
  `pending_jobs` int(11) NOT NULL,
  `failed_jobs` int(11) NOT NULL,
  `failed_job_ids` longtext NOT NULL,
  `options` mediumtext DEFAULT NULL,
  `cancelled_at` int(11) DEFAULT NULL,
  `created_at` int(11) NOT NULL,
  `finished_at` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `messages`
--

CREATE TABLE `messages` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `from_user_id` bigint(20) UNSIGNED NOT NULL,
  `to_user_id` bigint(20) UNSIGNED NOT NULL,
  `citizen_request_id` bigint(20) UNSIGNED DEFAULT NULL,
  `content` text NOT NULL,
  `status` enum('sent','delivered','read') NOT NULL DEFAULT 'sent',
  `read_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `migrations`
--

CREATE TABLE `migrations` (
  `id` int(10) UNSIGNED NOT NULL,
  `migration` varchar(255) NOT NULL,
  `batch` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `migrations`
--

INSERT INTO `migrations` (`id`, `migration`, `batch`) VALUES
(1, '0001_01_01_000000_create_users_table', 1),
(2, '0001_01_01_000001_create_cache_table', 1),
(3, '0001_01_01_000002_create_jobs_table', 1),
(4, '2024_01_01_000002_create_content_tables', 1),
(5, '2024_01_01_000003_create_citizen_services_tables', 1),
(6, '2024_01_01_000004_create_directory_tables', 1),
(7, '2024_01_01_000005_create_financial_tables', 1),
(8, '2024_01_01_000006_create_roles_and_permissions', 1);

-- --------------------------------------------------------

--
-- Table structure for table `model_has_permissions`
--

CREATE TABLE `model_has_permissions` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `permission_id` bigint(20) UNSIGNED NOT NULL,
  `model_id` bigint(20) UNSIGNED NOT NULL,
  `model_type` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `model_has_roles`
--

CREATE TABLE `model_has_roles` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `role_id` bigint(20) UNSIGNED NOT NULL,
  `model_id` bigint(20) UNSIGNED NOT NULL,
  `model_type` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `model_has_roles`
--

INSERT INTO `model_has_roles` (`id`, `role_id`, `model_id`, `model_type`) VALUES
(1, 1, 1, 'App\\Models\\User'),
(2, 2, 2, 'App\\Models\\User'),
(3, 3, 3, 'App\\Models\\User'),
(4, 4, 4, 'App\\Models\\User'),
(5, 4, 5, 'App\\Models\\User'),
(6, 4, 6, 'App\\Models\\User'),
(7, 4, 7, 'App\\Models\\User'),
(8, 4, 8, 'App\\Models\\User'),
(9, 4, 9, 'App\\Models\\User');

-- --------------------------------------------------------

--
-- Table structure for table `municipal_services`
--

CREATE TABLE `municipal_services` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name_fr` varchar(255) NOT NULL,
  `name_en` varchar(255) NOT NULL,
  `name_ar` varchar(255) NOT NULL,
  `slug` varchar(255) NOT NULL,
  `description_fr` text DEFAULT NULL,
  `description_en` text DEFAULT NULL,
  `description_ar` text DEFAULT NULL,
  `icon` varchar(255) DEFAULT NULL,
  `requirements_fr` text DEFAULT NULL,
  `requirements_en` text DEFAULT NULL,
  `requirements_ar` text DEFAULT NULL,
  `phone` varchar(255) DEFAULT NULL,
  `email` varchar(255) DEFAULT NULL,
  `documents_required_fr` text DEFAULT NULL,
  `documents_required_en` text DEFAULT NULL,
  `documents_required_ar` text DEFAULT NULL,
  `processing_time` varchar(255) DEFAULT NULL,
  `cost` varchar(255) DEFAULT NULL,
  `is_active` tinyint(1) NOT NULL DEFAULT 1,
  `order` int(11) NOT NULL DEFAULT 0,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `municipal_services`
--

INSERT INTO `municipal_services` (`id`, `name_fr`, `name_en`, `name_ar`, `slug`, `description_fr`, `description_en`, `description_ar`, `icon`, `requirements_fr`, `requirements_en`, `requirements_ar`, `phone`, `email`, `documents_required_fr`, `documents_required_en`, `documents_required_ar`, `processing_time`, `cost`, `is_active`, `order`, `created_at`, `updated_at`, `deleted_at`) VALUES
(1, 'Permis de Construire', 'Building Permit', 'رخصة البناء', 'building-permit', 'Demande de permis de construire pour les projets résidentiels et commerciaux', 'Building permit application for residential and commercial projects', 'طلب رخصة بناء للمشاريع السكنية والتجارية', 'building', 'Plans du bâtiment, titre de propriété, photos du site', 'Building plans, property title, site photos', 'مخططات المبنى، عنوان الملكية، صور الموقع', '+1234567890', 'permis@commune.local', 'Formulaire de demande, plans, photos, pièce d\'identité', 'Application form, plans, photos, ID', 'نموذج الطلب، المخططات، الصور، الهوية', '15-20 business days', '50€ - 200€ depending on project size', 1, 1, '2026-06-20 09:23:02', '2026-06-20 09:23:02', NULL),
(2, 'Certificat de Résidence', 'Residence Certificate', 'شهادة الإقامة', 'residence-certificate', 'Certificat officiel prouvant votre résidence dans la commune', 'Official certificate proving your residence in the municipality', 'شهادة رسمية تثبت إقامتك في البلدية', 'house', 'Pièce d\'identité, justificatif de domicile', 'ID, proof of address', 'الهوية، إثبات العنوان', '+1234567891', 'certificat@commune.local', 'Pièce d\'identité, facture d\'électricité ou de gaz', 'ID, electricity or gas bill', 'الهوية، فاتورة الكهرباء أو الغاز', '2-3 business days', '10€', 1, 2, '2026-06-20 09:23:02', '2026-06-20 09:23:02', NULL),
(3, 'Inscription sur les Listes Électorales', 'Voter Registration', 'التسجيل في القوائم الانتخابية', 'voter-registration', 'Inscription sur les listes électorales pour les élections municipales', 'Registration on electoral lists for municipal elections', 'التسجيل في القوائم الانتخابية للانتخابات البلدية', 'person-check', 'Pièce d\'identité, justificatif de domicile', 'ID, proof of address', 'الهوية، إثبات العنوان', '+1234567892', 'elections@commune.local', 'Pièce d\'identité valide, justificatif de domicile récent', 'Valid ID, recent proof of address', 'هوية سارية المفعول، إثبات عنوان حديث', 'Immediate', 'Free', 1, 3, '2026-06-20 09:23:02', '2026-06-20 09:23:02', NULL),
(4, 'Demande de Subvention', 'Grant Application', 'طلب المنح', 'grant-application', 'Demande de subventions pour les associations et projets locaux', 'Grant application for local associations and projects', 'طلب منح للجمعيات والمشاريع المحلية', 'cash', 'Statuts de l\'association, budget prévisionnel, description du projet', 'Association statutes, projected budget, project description', 'نظام الجمعية، الميزانية المتوقعة، وصف المشروع', '+1234567893', 'subventions@commune.local', 'Dossier complet de l\'association, budget détaillé', 'Complete association file, detailed budget', 'ملف الجمعية الكامل، ميزانية مفصلة', '30-45 business days', 'Free', 1, 4, '2026-06-20 09:23:02', '2026-06-20 09:23:02', NULL),
(5, 'Déclaration de Naissance', 'Birth Registration', 'تسجيل الميلاد', 'birth-registration', 'Déclaration de naissance à l\'état civil', 'Birth registration at civil registry', 'تسجيل الميلاد في السجل المدني', 'baby', 'Certificat de naissance, pièce d\'identité des parents', 'Birth certificate, parents\' ID', 'شهادة الميلاد، هوية الوالدين', '+1234567894', 'etatcivil@commune.local', 'Certificat de naissance de l\'hôpital, pièces d\'identité des parents', 'Hospital birth certificate, parents\' ID', 'شهادة ميلاد من المستشفى، هويات الوالدين', 'Immediate', 'Free', 1, 5, '2026-06-20 09:23:02', '2026-06-20 09:23:02', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `news`
--

CREATE TABLE `news` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `title_fr` varchar(255) NOT NULL,
  `title_en` varchar(255) NOT NULL,
  `title_ar` varchar(255) NOT NULL,
  `slug` varchar(255) NOT NULL,
  `content_fr` text NOT NULL,
  `content_en` text NOT NULL,
  `content_ar` text NOT NULL,
  `featured_image` varchar(255) DEFAULT NULL,
  `created_by` bigint(20) UNSIGNED NOT NULL,
  `status` enum('draft','published','archived') NOT NULL DEFAULT 'draft',
  `published_at` timestamp NULL DEFAULT NULL,
  `views` int(11) NOT NULL DEFAULT 0,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `news`
--

INSERT INTO `news` (`id`, `title_fr`, `title_en`, `title_ar`, `slug`, `content_fr`, `content_en`, `content_ar`, `featured_image`, `created_by`, `status`, `published_at`, `views`, `created_at`, `updated_at`, `deleted_at`) VALUES
(1, 'Inauguration du Nouveau Parc Municipal', 'Inauguration of the New Municipal Park', 'افتتاح الحديقة البلدية الجديدة', 'inauguration-of-the-new-municipal-park', 'La municipalité est fière d\'annoncer l\'inauguration du nouveau parc municipal. Ce projet d\'une valeur de 2 millions d\'euros offre aux citoyens un espace vert moderne avec des aires de jeux pour enfants, des pistes de jogging et des zones de pique-nique.', 'The municipality is proud to announce the inauguration of the new municipal park. This €2 million project provides citizens with a modern green space featuring children\'s playgrounds, jogging tracks, and picnic areas.', 'تفتخر البلدية بالإعلان عن افتتاح الحديقة البلدية الجديدة. هذا المشروع بقيمة مليوني يورو يوفر للمواطنين مساحة خضراء حديثة تتمثل في ملاعب للأطفال ومسارات للجري ومناطق للتنزه.', NULL, 2, 'published', '2026-06-15 09:23:03', 421, '2026-06-20 09:23:03', '2026-06-20 09:23:03', NULL),
(2, 'Nouveau Service de Collecte des Déchets', 'New Waste Collection Service', 'خدمة جديدة لجمع القمامة', 'new-waste-collection-service', 'À partir du mois prochain, la municipalité mettra en place un nouveau système de collecte des déchets plus écologique. Les camions électriques remplaceront progressivement la flotte actuelle.', 'Starting next month, the municipality will implement a new, more eco-friendly waste collection system. Electric trucks will gradually replace the current fleet.', 'بدءا من الشهر المقبل، ستقوم البلدية بتطبيق نظام جديد أكثر صداقة للبيئة لجمع النفايات. ستستبدل الشاحانات الكهربائية تدريجيا الأسطول الحالي.', NULL, 2, 'published', '2026-06-10 09:23:03', 355, '2026-06-20 09:23:04', '2026-06-20 09:23:04', NULL),
(3, 'Journée Portes Ouvertes à la Mairie', 'Open House at City Hall', 'يوم الأبواب المفتوحة في البلدية', 'open-house-at-city-hall', 'La mairie organise une journée portes ouvertes le samedi 15 juillet. Venez découvrir les services municipaux, rencontrer les élus et participer aux ateliers interactifs.', 'City Hall is organizing an open house on Saturday, July 15th. Come discover municipal services, meet elected officials, and participate in interactive workshops.', 'تنظم البلدية يوما للأبواب المفتوحة يوم السبت 15 يوليو. تعال لاكتشاف الخدمات البلدية والقاء المسؤولين المنتخبين والمشاركة في ورش العمل التفاعلية.', NULL, 1, 'published', '2026-06-05 09:23:03', 285, '2026-06-20 09:23:04', '2026-06-20 09:23:04', NULL),
(4, 'Subventions pour les Entreprises Locales', 'Grants for Local Businesses', 'منح للشركات المحلية', 'grants-for-local-businesses', 'Un nouveau programme de subventions est lancé pour soutenir les entreprises locales. Les entreprises éligibles peuvent recevoir jusqu\'à 10 000€ pour développer leurs activités.', 'A new grant program has been launched to support local businesses. Eligible businesses can receive up to €10,000 to develop their activities.', 'تم إطلاق برنامج جديد للمنح لدعم الشركات المحلية. يمكن للشركات المؤهلة الحصول على ما يصل إلى 10000 يورو لتطوير أنشطتها.', NULL, 1, 'published', '2026-05-31 09:23:03', 289, '2026-06-20 09:23:04', '2026-06-20 09:23:04', NULL),
(5, 'Rénovation du Centre-Ville', 'Downtown Renovation', 'تجديد وسط المدينة', 'downtown-renovation', 'Les travaux de rénovation du centre-ville commenceront le mois prochain. Le projet comprend la réfection des routes, l\'installation de nouveaux éclairages et la création d\'espaces piétons.', 'Downtown renovation work will begin next month. The project includes road resurfacing, installation of new lighting, and creation of pedestrian spaces.', 'ستبدأ أعمال تجديد وسط المدينة الشهر المقبل. يشمل المشروع إعادة إصلاح الطرق وتركيب إضاءة جديدة وإنشاء مسارات للمشاة.', NULL, 2, 'published', '2026-05-26 09:23:03', 378, '2026-06-20 09:23:04', '2026-06-20 09:23:04', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `officials`
--

CREATE TABLE `officials` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `user_id` bigint(20) UNSIGNED NOT NULL,
  `department_id` bigint(20) UNSIGNED NOT NULL,
  `position_fr` varchar(255) NOT NULL,
  `position_en` varchar(255) NOT NULL,
  `position_ar` varchar(255) NOT NULL,
  `phone` varchar(255) DEFAULT NULL,
  `email` varchar(255) DEFAULT NULL,
  `office_location` varchar(255) DEFAULT NULL,
  `office_number` varchar(255) DEFAULT NULL,
  `bio_fr` text DEFAULT NULL,
  `bio_en` text DEFAULT NULL,
  `bio_ar` text DEFAULT NULL,
  `photo` varchar(255) DEFAULT NULL,
  `specializations` text DEFAULT NULL,
  `qualifications` text DEFAULT NULL,
  `status` enum('active','inactive','on_leave','retired') NOT NULL DEFAULT 'active',
  `start_date` timestamp NULL DEFAULT NULL,
  `end_date` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `opening_hours`
--

CREATE TABLE `opening_hours` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `department_id` bigint(20) UNSIGNED DEFAULT NULL,
  `day_of_week` varchar(255) NOT NULL,
  `opening_time` time DEFAULT NULL,
  `closing_time` time DEFAULT NULL,
  `is_closed` tinyint(1) NOT NULL DEFAULT 0,
  `notes` text DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `password_reset_tokens`
--

CREATE TABLE `password_reset_tokens` (
  `email` varchar(255) NOT NULL,
  `token` varchar(255) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `permissions`
--

CREATE TABLE `permissions` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) NOT NULL,
  `guard_name` varchar(255) NOT NULL DEFAULT 'web',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `permissions`
--

INSERT INTO `permissions` (`id`, `name`, `guard_name`, `created_at`, `updated_at`) VALUES
(1, 'view-articles', 'web', '2026-06-20 09:22:54', '2026-06-20 09:22:54'),
(2, 'create-articles', 'web', '2026-06-20 09:22:54', '2026-06-20 09:22:54'),
(3, 'edit-articles', 'web', '2026-06-20 09:22:54', '2026-06-20 09:22:54'),
(4, 'delete-articles', 'web', '2026-06-20 09:22:55', '2026-06-20 09:22:55'),
(5, 'publish-articles', 'web', '2026-06-20 09:22:55', '2026-06-20 09:22:55'),
(6, 'view-news', 'web', '2026-06-20 09:22:55', '2026-06-20 09:22:55'),
(7, 'create-news', 'web', '2026-06-20 09:22:55', '2026-06-20 09:22:55'),
(8, 'edit-news', 'web', '2026-06-20 09:22:55', '2026-06-20 09:22:55'),
(9, 'delete-news', 'web', '2026-06-20 09:22:55', '2026-06-20 09:22:55'),
(10, 'publish-news', 'web', '2026-06-20 09:22:55', '2026-06-20 09:22:55'),
(11, 'view-events', 'web', '2026-06-20 09:22:55', '2026-06-20 09:22:55'),
(12, 'create-events', 'web', '2026-06-20 09:22:55', '2026-06-20 09:22:55'),
(13, 'edit-events', 'web', '2026-06-20 09:22:55', '2026-06-20 09:22:55'),
(14, 'delete-events', 'web', '2026-06-20 09:22:55', '2026-06-20 09:22:55'),
(15, 'publish-events', 'web', '2026-06-20 09:22:55', '2026-06-20 09:22:55'),
(16, 'manage-registrations', 'web', '2026-06-20 09:22:55', '2026-06-20 09:22:55'),
(17, 'view-galleries', 'web', '2026-06-20 09:22:55', '2026-06-20 09:22:55'),
(18, 'create-galleries', 'web', '2026-06-20 09:22:55', '2026-06-20 09:22:55'),
(19, 'edit-galleries', 'web', '2026-06-20 09:22:56', '2026-06-20 09:22:56'),
(20, 'delete-galleries', 'web', '2026-06-20 09:22:56', '2026-06-20 09:22:56'),
(21, 'manage-images', 'web', '2026-06-20 09:22:56', '2026-06-20 09:22:56'),
(22, 'view-services', 'web', '2026-06-20 09:22:56', '2026-06-20 09:22:56'),
(23, 'create-services', 'web', '2026-06-20 09:22:56', '2026-06-20 09:22:56'),
(24, 'edit-services', 'web', '2026-06-20 09:22:56', '2026-06-20 09:22:56'),
(25, 'delete-services', 'web', '2026-06-20 09:22:56', '2026-06-20 09:22:56'),
(26, 'manage-requests', 'web', '2026-06-20 09:22:56', '2026-06-20 09:22:56'),
(27, 'view-citizen-requests', 'web', '2026-06-20 09:22:56', '2026-06-20 09:22:56'),
(28, 'create-citizen-requests', 'web', '2026-06-20 09:22:56', '2026-06-20 09:22:56'),
(29, 'edit-citizen-requests', 'web', '2026-06-20 09:22:56', '2026-06-20 09:22:56'),
(30, 'delete-citizen-requests', 'web', '2026-06-20 09:22:56', '2026-06-20 09:22:56'),
(31, 'respond-to-requests', 'web', '2026-06-20 09:22:56', '2026-06-20 09:22:56'),
(32, 'view-complaints', 'web', '2026-06-20 09:22:56', '2026-06-20 09:22:56'),
(33, 'respond-to-complaints', 'web', '2026-06-20 09:22:56', '2026-06-20 09:22:56'),
(34, 'assign-complaints', 'web', '2026-06-20 09:22:56', '2026-06-20 09:22:56'),
(35, 'close-complaints', 'web', '2026-06-20 09:22:56', '2026-06-20 09:22:56'),
(36, 'manage-departments', 'web', '2026-06-20 09:22:56', '2026-06-20 09:22:56'),
(37, 'manage-officials', 'web', '2026-06-20 09:22:56', '2026-06-20 09:22:56'),
(38, 'view-directory', 'web', '2026-06-20 09:22:56', '2026-06-20 09:22:56'),
(39, 'manage-budgets', 'web', '2026-06-20 09:22:56', '2026-06-20 09:22:56'),
(40, 'view-finances', 'web', '2026-06-20 09:22:56', '2026-06-20 09:22:56'),
(41, 'approve-expenses', 'web', '2026-06-20 09:22:56', '2026-06-20 09:22:56'),
(42, 'manage-revenues', 'web', '2026-06-20 09:22:56', '2026-06-20 09:22:56'),
(43, 'manage-users', 'web', '2026-06-20 09:22:56', '2026-06-20 09:22:56'),
(44, 'view-users', 'web', '2026-06-20 09:22:56', '2026-06-20 09:22:56'),
(45, 'edit-users', 'web', '2026-06-20 09:22:56', '2026-06-20 09:22:56'),
(46, 'delete-users', 'web', '2026-06-20 09:22:56', '2026-06-20 09:22:56'),
(47, 'view-audit-logs', 'web', '2026-06-20 09:22:57', '2026-06-20 09:22:57'),
(48, 'manage-roles', 'web', '2026-06-20 09:22:57', '2026-06-20 09:22:57'),
(49, 'manage-permissions', 'web', '2026-06-20 09:22:57', '2026-06-20 09:22:57'),
(50, 'system-settings', 'web', '2026-06-20 09:22:57', '2026-06-20 09:22:57');

-- --------------------------------------------------------

--
-- Table structure for table `request_documents`
--

CREATE TABLE `request_documents` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `citizen_request_id` bigint(20) UNSIGNED NOT NULL,
  `file_name` varchar(255) NOT NULL,
  `file_path` varchar(255) NOT NULL,
  `file_type` varchar(255) NOT NULL,
  `file_size` bigint(20) NOT NULL,
  `uploaded_by` varchar(255) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `revenues`
--

CREATE TABLE `revenues` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `budget_category_id` bigint(20) UNSIGNED NOT NULL,
  `description_fr` varchar(255) NOT NULL,
  `description_en` varchar(255) NOT NULL,
  `description_ar` varchar(255) NOT NULL,
  `amount` decimal(15,2) NOT NULL,
  `revenue_date` date NOT NULL,
  `reference_number` varchar(255) NOT NULL,
  `source` enum('taxes','permits','fees','donations','grants','other') NOT NULL DEFAULT 'other',
  `status` enum('pending','received','verified') NOT NULL DEFAULT 'pending',
  `created_by` bigint(20) UNSIGNED NOT NULL,
  `verified_by` bigint(20) UNSIGNED DEFAULT NULL,
  `verified_at` timestamp NULL DEFAULT NULL,
  `notes` text DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `roles`
--

CREATE TABLE `roles` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) NOT NULL,
  `guard_name` varchar(255) NOT NULL DEFAULT 'web',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `roles`
--

INSERT INTO `roles` (`id`, `name`, `guard_name`, `created_at`, `updated_at`) VALUES
(1, 'admin', 'web', '2026-06-20 09:22:57', '2026-06-20 09:22:57'),
(2, 'editor', 'web', '2026-06-20 09:22:57', '2026-06-20 09:22:57'),
(3, 'official', 'web', '2026-06-20 09:22:57', '2026-06-20 09:22:57'),
(4, 'citizen', 'web', '2026-06-20 09:22:57', '2026-06-20 09:22:57');

-- --------------------------------------------------------

--
-- Table structure for table `role_has_permissions`
--

CREATE TABLE `role_has_permissions` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `permission_id` bigint(20) UNSIGNED NOT NULL,
  `role_id` bigint(20) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `role_has_permissions`
--

INSERT INTO `role_has_permissions` (`id`, `permission_id`, `role_id`) VALUES
(1, 1, 1),
(51, 1, 2),
(80, 1, 4),
(2, 2, 1),
(52, 2, 2),
(3, 3, 1),
(53, 3, 2),
(4, 4, 1),
(54, 4, 2),
(5, 5, 1),
(55, 5, 2),
(6, 6, 1),
(56, 6, 2),
(81, 6, 4),
(7, 7, 1),
(57, 7, 2),
(8, 8, 1),
(58, 8, 2),
(9, 9, 1),
(59, 9, 2),
(10, 10, 1),
(60, 10, 2),
(11, 11, 1),
(61, 11, 2),
(82, 11, 4),
(12, 12, 1),
(62, 12, 2),
(13, 13, 1),
(63, 13, 2),
(14, 14, 1),
(64, 14, 2),
(15, 15, 1),
(65, 15, 2),
(16, 16, 1),
(72, 16, 3),
(17, 17, 1),
(66, 17, 2),
(83, 17, 4),
(18, 18, 1),
(67, 18, 2),
(19, 19, 1),
(68, 19, 2),
(20, 20, 1),
(21, 21, 1),
(69, 21, 2),
(22, 22, 1),
(73, 22, 3),
(84, 22, 4),
(23, 23, 1),
(24, 24, 1),
(25, 25, 1),
(26, 26, 1),
(27, 27, 1),
(74, 27, 3),
(85, 27, 4),
(28, 28, 1),
(86, 28, 4),
(29, 29, 1),
(30, 30, 1),
(31, 31, 1),
(75, 31, 3),
(32, 32, 1),
(76, 32, 3),
(33, 33, 1),
(77, 33, 3),
(34, 34, 1),
(35, 35, 1),
(36, 36, 1),
(37, 37, 1),
(38, 38, 1),
(70, 38, 2),
(78, 38, 3),
(87, 38, 4),
(39, 39, 1),
(40, 40, 1),
(79, 40, 3),
(41, 41, 1),
(42, 42, 1),
(43, 43, 1),
(44, 44, 1),
(45, 45, 1),
(46, 46, 1),
(47, 47, 1),
(71, 47, 2),
(48, 48, 1),
(49, 49, 1),
(50, 50, 1);

-- --------------------------------------------------------

--
-- Table structure for table `sessions`
--

CREATE TABLE `sessions` (
  `id` varchar(255) NOT NULL,
  `user_id` bigint(20) UNSIGNED DEFAULT NULL,
  `ip_address` varchar(45) DEFAULT NULL,
  `user_agent` text DEFAULT NULL,
  `payload` longtext NOT NULL,
  `last_activity` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `telephone_directory`
--

CREATE TABLE `telephone_directory` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name_fr` varchar(255) NOT NULL,
  `name_en` varchar(255) NOT NULL,
  `name_ar` varchar(255) NOT NULL,
  `phone` varchar(255) NOT NULL,
  `extension` varchar(255) DEFAULT NULL,
  `email` varchar(255) DEFAULT NULL,
  `department` varchar(255) DEFAULT NULL,
  `service` varchar(255) DEFAULT NULL,
  `type` enum('office','emergency','general','support','hotline') NOT NULL DEFAULT 'office',
  `description` text DEFAULT NULL,
  `is_active` tinyint(1) NOT NULL DEFAULT 1,
  `order` int(11) NOT NULL DEFAULT 0,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `password` varchar(255) NOT NULL,
  `remember_token` varchar(100) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `name`, `email`, `email_verified_at`, `password`, `remember_token`, `created_at`, `updated_at`, `deleted_at`) VALUES
(1, 'Admin User', 'admin@commune.local', NULL, '$2y$12$0jzrVgpgbMlvpcgk94RDUOQeHTbpVfr1wF7XJC0GZyjjuy386g2F.', 'uSasHWxNPASVylUjWYaiTmpj1Htnctq18wVVsmRJbtGRdLZOyIIqg9nPSIYQ', '2026-06-20 09:22:58', '2026-06-20 09:22:58', NULL),
(2, 'Jane Editor', 'editor@commune.local', NULL, '$2y$12$YLpgH9.MtU58wOcZrTI5UO5P9ADFdsJZpXwiGaHVWQquJppNt/eX2', NULL, '2026-06-20 09:22:59', '2026-06-20 09:22:59', NULL),
(3, 'Bob Official', 'official@commune.local', NULL, '$2y$12$o9QnpJegLcv6476i1sAeuOoUWnMlq7STV5QZ499p.ckMVqraIOq12', NULL, '2026-06-20 09:22:59', '2026-06-20 09:22:59', NULL),
(4, 'John Citizen', 'citizen@commune.local', NULL, '$2y$12$wXbtjLE8FhDeZXv4otOcrOefN.DE5zcsHPrl/fq305jEsyAJE.5aG', NULL, '2026-06-20 09:23:00', '2026-06-20 09:23:00', NULL),
(5, 'Citizen 1', 'citizen1@commune.local', NULL, '$2y$12$33BSl.JJE5Q1bVKyQmwvPeBNfw5Anx33OcgJvKZAMO5yNf5gAudh6', NULL, '2026-06-20 09:23:00', '2026-06-20 09:23:00', NULL),
(6, 'Citizen 2', 'citizen2@commune.local', NULL, '$2y$12$y.Ic0PcWLpm/3OVVK/9MrOWHYl8PNO9j60.w.6Gn2ehBJ.WXQbk7y', NULL, '2026-06-20 09:23:00', '2026-06-20 09:23:00', NULL),
(7, 'Citizen 3', 'citizen3@commune.local', NULL, '$2y$12$uJkKIVCyRoDkCZcfdT5qJOEZ01mErYrerx.chN/U1YCYCgyU3u2aq', NULL, '2026-06-20 09:23:01', '2026-06-20 09:23:01', NULL),
(8, 'Citizen 4', 'citizen4@commune.local', NULL, '$2y$12$X5TtUbL9XDpbqtBYM6vle.54C5/bQj6hfRDqt5BwYXZcGIXXrfUs6', NULL, '2026-06-20 09:23:01', '2026-06-20 09:23:01', NULL),
(9, 'Citizen 5', 'citizen5@commune.local', NULL, '$2y$12$pTs.vseeud0Cq7JZy17ciO1vhvFOCNqHTeAyEuhsg2UVaGmRx4bM2', NULL, '2026-06-20 09:23:01', '2026-06-20 09:23:01', NULL);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `activity_logs`
--
ALTER TABLE `activity_logs`
  ADD PRIMARY KEY (`id`),
  ADD KEY `activity_logs_user_id_foreign` (`user_id`);

--
-- Indexes for table `articles`
--
ALTER TABLE `articles`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `articles_slug_unique` (`slug`),
  ADD KEY `articles_category_id_foreign` (`category_id`),
  ADD KEY `articles_created_by_foreign` (`created_by`),
  ADD KEY `articles_updated_by_foreign` (`updated_by`);

--
-- Indexes for table `audit_logs`
--
ALTER TABLE `audit_logs`
  ADD PRIMARY KEY (`id`),
  ADD KEY `audit_logs_user_id_created_at_index` (`user_id`,`created_at`);

--
-- Indexes for table `budgets`
--
ALTER TABLE `budgets`
  ADD PRIMARY KEY (`id`),
  ADD KEY `budgets_budget_category_id_foreign` (`budget_category_id`),
  ADD KEY `budgets_created_by_foreign` (`created_by`),
  ADD KEY `budgets_approved_by_foreign` (`approved_by`);

--
-- Indexes for table `budget_allocations`
--
ALTER TABLE `budget_allocations`
  ADD PRIMARY KEY (`id`),
  ADD KEY `budget_allocations_budget_id_foreign` (`budget_id`);

--
-- Indexes for table `budget_categories`
--
ALTER TABLE `budget_categories`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `budget_categories_code_unique` (`code`);

--
-- Indexes for table `cache`
--
ALTER TABLE `cache`
  ADD PRIMARY KEY (`key`),
  ADD KEY `cache_expiration_index` (`expiration`);

--
-- Indexes for table `cache_locks`
--
ALTER TABLE `cache_locks`
  ADD PRIMARY KEY (`key`),
  ADD KEY `cache_locks_expiration_index` (`expiration`);

--
-- Indexes for table `categories`
--
ALTER TABLE `categories`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `categories_slug_unique` (`slug`);

--
-- Indexes for table `citizen_requests`
--
ALTER TABLE `citizen_requests`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `citizen_requests_request_number_unique` (`request_number`),
  ADD KEY `citizen_requests_user_id_foreign` (`user_id`),
  ADD KEY `citizen_requests_service_id_foreign` (`service_id`),
  ADD KEY `citizen_requests_assigned_to_foreign` (`assigned_to`);

--
-- Indexes for table `complaints`
--
ALTER TABLE `complaints`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `complaints_complaint_number_unique` (`complaint_number`),
  ADD KEY `complaints_user_id_foreign` (`user_id`),
  ADD KEY `complaints_assigned_to_foreign` (`assigned_to`);

--
-- Indexes for table `departments`
--
ALTER TABLE `departments`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `departments_slug_unique` (`slug`),
  ADD KEY `departments_head_id_foreign` (`head_id`);

--
-- Indexes for table `events`
--
ALTER TABLE `events`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `events_slug_unique` (`slug`),
  ADD KEY `events_created_by_foreign` (`created_by`);

--
-- Indexes for table `event_registrations`
--
ALTER TABLE `event_registrations`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `event_registrations_event_id_user_id_unique` (`event_id`,`user_id`),
  ADD KEY `event_registrations_user_id_foreign` (`user_id`);

--
-- Indexes for table `expenses`
--
ALTER TABLE `expenses`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `expenses_reference_number_unique` (`reference_number`),
  ADD KEY `expenses_budget_id_foreign` (`budget_id`),
  ADD KEY `expenses_created_by_foreign` (`created_by`),
  ADD KEY `expenses_approved_by_foreign` (`approved_by`);

--
-- Indexes for table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `failed_jobs_uuid_unique` (`uuid`);

--
-- Indexes for table `galleries`
--
ALTER TABLE `galleries`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `galleries_slug_unique` (`slug`),
  ADD KEY `galleries_created_by_foreign` (`created_by`);

--
-- Indexes for table `gallery_images`
--
ALTER TABLE `gallery_images`
  ADD PRIMARY KEY (`id`),
  ADD KEY `gallery_images_gallery_id_foreign` (`gallery_id`);

--
-- Indexes for table `jobs`
--
ALTER TABLE `jobs`
  ADD PRIMARY KEY (`id`),
  ADD KEY `jobs_queue_index` (`queue`);

--
-- Indexes for table `job_batches`
--
ALTER TABLE `job_batches`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `messages`
--
ALTER TABLE `messages`
  ADD PRIMARY KEY (`id`),
  ADD KEY `messages_from_user_id_foreign` (`from_user_id`),
  ADD KEY `messages_to_user_id_foreign` (`to_user_id`),
  ADD KEY `messages_citizen_request_id_foreign` (`citizen_request_id`);

--
-- Indexes for table `migrations`
--
ALTER TABLE `migrations`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `model_has_permissions`
--
ALTER TABLE `model_has_permissions`
  ADD PRIMARY KEY (`id`),
  ADD KEY `model_has_permissions_model_id_model_type_index` (`model_id`,`model_type`),
  ADD KEY `model_has_permissions_permission_id_foreign` (`permission_id`);

--
-- Indexes for table `model_has_roles`
--
ALTER TABLE `model_has_roles`
  ADD PRIMARY KEY (`id`),
  ADD KEY `model_has_roles_model_id_model_type_index` (`model_id`,`model_type`),
  ADD KEY `model_has_roles_role_id_foreign` (`role_id`);

--
-- Indexes for table `municipal_services`
--
ALTER TABLE `municipal_services`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `municipal_services_slug_unique` (`slug`);

--
-- Indexes for table `news`
--
ALTER TABLE `news`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `news_slug_unique` (`slug`),
  ADD KEY `news_created_by_foreign` (`created_by`);

--
-- Indexes for table `officials`
--
ALTER TABLE `officials`
  ADD PRIMARY KEY (`id`),
  ADD KEY `officials_user_id_foreign` (`user_id`),
  ADD KEY `officials_department_id_foreign` (`department_id`);

--
-- Indexes for table `opening_hours`
--
ALTER TABLE `opening_hours`
  ADD PRIMARY KEY (`id`),
  ADD KEY `opening_hours_department_id_foreign` (`department_id`);

--
-- Indexes for table `password_reset_tokens`
--
ALTER TABLE `password_reset_tokens`
  ADD PRIMARY KEY (`email`);

--
-- Indexes for table `permissions`
--
ALTER TABLE `permissions`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `permissions_name_unique` (`name`);

--
-- Indexes for table `request_documents`
--
ALTER TABLE `request_documents`
  ADD PRIMARY KEY (`id`),
  ADD KEY `request_documents_citizen_request_id_foreign` (`citizen_request_id`);

--
-- Indexes for table `revenues`
--
ALTER TABLE `revenues`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `revenues_reference_number_unique` (`reference_number`),
  ADD KEY `revenues_budget_category_id_foreign` (`budget_category_id`),
  ADD KEY `revenues_created_by_foreign` (`created_by`),
  ADD KEY `revenues_verified_by_foreign` (`verified_by`);

--
-- Indexes for table `roles`
--
ALTER TABLE `roles`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `roles_name_unique` (`name`);

--
-- Indexes for table `role_has_permissions`
--
ALTER TABLE `role_has_permissions`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `role_has_permissions_permission_id_role_id_unique` (`permission_id`,`role_id`),
  ADD KEY `role_has_permissions_role_id_foreign` (`role_id`);

--
-- Indexes for table `sessions`
--
ALTER TABLE `sessions`
  ADD PRIMARY KEY (`id`),
  ADD KEY `sessions_user_id_index` (`user_id`),
  ADD KEY `sessions_last_activity_index` (`last_activity`);

--
-- Indexes for table `telephone_directory`
--
ALTER TABLE `telephone_directory`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `users_email_unique` (`email`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `activity_logs`
--
ALTER TABLE `activity_logs`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `articles`
--
ALTER TABLE `articles`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `audit_logs`
--
ALTER TABLE `audit_logs`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `budgets`
--
ALTER TABLE `budgets`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `budget_allocations`
--
ALTER TABLE `budget_allocations`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `budget_categories`
--
ALTER TABLE `budget_categories`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `categories`
--
ALTER TABLE `categories`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `citizen_requests`
--
ALTER TABLE `citizen_requests`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `complaints`
--
ALTER TABLE `complaints`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `departments`
--
ALTER TABLE `departments`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `events`
--
ALTER TABLE `events`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `event_registrations`
--
ALTER TABLE `event_registrations`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `expenses`
--
ALTER TABLE `expenses`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `galleries`
--
ALTER TABLE `galleries`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `gallery_images`
--
ALTER TABLE `gallery_images`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `jobs`
--
ALTER TABLE `jobs`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `messages`
--
ALTER TABLE `messages`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `model_has_permissions`
--
ALTER TABLE `model_has_permissions`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `model_has_roles`
--
ALTER TABLE `model_has_roles`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT for table `municipal_services`
--
ALTER TABLE `municipal_services`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `news`
--
ALTER TABLE `news`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `officials`
--
ALTER TABLE `officials`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `opening_hours`
--
ALTER TABLE `opening_hours`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `permissions`
--
ALTER TABLE `permissions`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=51;

--
-- AUTO_INCREMENT for table `request_documents`
--
ALTER TABLE `request_documents`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `revenues`
--
ALTER TABLE `revenues`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `roles`
--
ALTER TABLE `roles`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `role_has_permissions`
--
ALTER TABLE `role_has_permissions`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=88;

--
-- AUTO_INCREMENT for table `telephone_directory`
--
ALTER TABLE `telephone_directory`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `activity_logs`
--
ALTER TABLE `activity_logs`
  ADD CONSTRAINT `activity_logs_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `articles`
--
ALTER TABLE `articles`
  ADD CONSTRAINT `articles_category_id_foreign` FOREIGN KEY (`category_id`) REFERENCES `categories` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `articles_created_by_foreign` FOREIGN KEY (`created_by`) REFERENCES `users` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `articles_updated_by_foreign` FOREIGN KEY (`updated_by`) REFERENCES `users` (`id`) ON DELETE SET NULL;

--
-- Constraints for table `audit_logs`
--
ALTER TABLE `audit_logs`
  ADD CONSTRAINT `audit_logs_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `budgets`
--
ALTER TABLE `budgets`
  ADD CONSTRAINT `budgets_approved_by_foreign` FOREIGN KEY (`approved_by`) REFERENCES `users` (`id`) ON DELETE SET NULL,
  ADD CONSTRAINT `budgets_budget_category_id_foreign` FOREIGN KEY (`budget_category_id`) REFERENCES `budget_categories` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `budgets_created_by_foreign` FOREIGN KEY (`created_by`) REFERENCES `users` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `budget_allocations`
--
ALTER TABLE `budget_allocations`
  ADD CONSTRAINT `budget_allocations_budget_id_foreign` FOREIGN KEY (`budget_id`) REFERENCES `budgets` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `citizen_requests`
--
ALTER TABLE `citizen_requests`
  ADD CONSTRAINT `citizen_requests_assigned_to_foreign` FOREIGN KEY (`assigned_to`) REFERENCES `users` (`id`) ON DELETE SET NULL,
  ADD CONSTRAINT `citizen_requests_service_id_foreign` FOREIGN KEY (`service_id`) REFERENCES `municipal_services` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `citizen_requests_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `complaints`
--
ALTER TABLE `complaints`
  ADD CONSTRAINT `complaints_assigned_to_foreign` FOREIGN KEY (`assigned_to`) REFERENCES `users` (`id`) ON DELETE SET NULL,
  ADD CONSTRAINT `complaints_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `departments`
--
ALTER TABLE `departments`
  ADD CONSTRAINT `departments_head_id_foreign` FOREIGN KEY (`head_id`) REFERENCES `users` (`id`) ON DELETE SET NULL;

--
-- Constraints for table `events`
--
ALTER TABLE `events`
  ADD CONSTRAINT `events_created_by_foreign` FOREIGN KEY (`created_by`) REFERENCES `users` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `event_registrations`
--
ALTER TABLE `event_registrations`
  ADD CONSTRAINT `event_registrations_event_id_foreign` FOREIGN KEY (`event_id`) REFERENCES `events` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `event_registrations_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `expenses`
--
ALTER TABLE `expenses`
  ADD CONSTRAINT `expenses_approved_by_foreign` FOREIGN KEY (`approved_by`) REFERENCES `users` (`id`) ON DELETE SET NULL,
  ADD CONSTRAINT `expenses_budget_id_foreign` FOREIGN KEY (`budget_id`) REFERENCES `budgets` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `expenses_created_by_foreign` FOREIGN KEY (`created_by`) REFERENCES `users` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `galleries`
--
ALTER TABLE `galleries`
  ADD CONSTRAINT `galleries_created_by_foreign` FOREIGN KEY (`created_by`) REFERENCES `users` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `gallery_images`
--
ALTER TABLE `gallery_images`
  ADD CONSTRAINT `gallery_images_gallery_id_foreign` FOREIGN KEY (`gallery_id`) REFERENCES `galleries` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `messages`
--
ALTER TABLE `messages`
  ADD CONSTRAINT `messages_citizen_request_id_foreign` FOREIGN KEY (`citizen_request_id`) REFERENCES `citizen_requests` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `messages_from_user_id_foreign` FOREIGN KEY (`from_user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `messages_to_user_id_foreign` FOREIGN KEY (`to_user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `model_has_permissions`
--
ALTER TABLE `model_has_permissions`
  ADD CONSTRAINT `model_has_permissions_permission_id_foreign` FOREIGN KEY (`permission_id`) REFERENCES `permissions` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `model_has_roles`
--
ALTER TABLE `model_has_roles`
  ADD CONSTRAINT `model_has_roles_role_id_foreign` FOREIGN KEY (`role_id`) REFERENCES `roles` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `news`
--
ALTER TABLE `news`
  ADD CONSTRAINT `news_created_by_foreign` FOREIGN KEY (`created_by`) REFERENCES `users` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `officials`
--
ALTER TABLE `officials`
  ADD CONSTRAINT `officials_department_id_foreign` FOREIGN KEY (`department_id`) REFERENCES `departments` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `officials_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `opening_hours`
--
ALTER TABLE `opening_hours`
  ADD CONSTRAINT `opening_hours_department_id_foreign` FOREIGN KEY (`department_id`) REFERENCES `departments` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `request_documents`
--
ALTER TABLE `request_documents`
  ADD CONSTRAINT `request_documents_citizen_request_id_foreign` FOREIGN KEY (`citizen_request_id`) REFERENCES `citizen_requests` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `revenues`
--
ALTER TABLE `revenues`
  ADD CONSTRAINT `revenues_budget_category_id_foreign` FOREIGN KEY (`budget_category_id`) REFERENCES `budget_categories` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `revenues_created_by_foreign` FOREIGN KEY (`created_by`) REFERENCES `users` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `revenues_verified_by_foreign` FOREIGN KEY (`verified_by`) REFERENCES `users` (`id`) ON DELETE SET NULL;

--
-- Constraints for table `role_has_permissions`
--
ALTER TABLE `role_has_permissions`
  ADD CONSTRAINT `role_has_permissions_permission_id_foreign` FOREIGN KEY (`permission_id`) REFERENCES `permissions` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `role_has_permissions_role_id_foreign` FOREIGN KEY (`role_id`) REFERENCES `roles` (`id`) ON DELETE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
