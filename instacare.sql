-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jul 13, 2023 at 03:51 PM
-- Server version: 10.4.27-MariaDB
-- PHP Version: 8.2.0

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `instacare`
--

-- --------------------------------------------------------

--
-- Table structure for table `availabilities`
--

CREATE TABLE `availabilities` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `emp_id` bigint(20) UNSIGNED NOT NULL,
  `facilities_id` bigint(20) UNSIGNED NOT NULL,
  `date` date NOT NULL,
  `start_time` time NOT NULL,
  `end_time` time NOT NULL,
  `is_available` tinyint(1) NOT NULL DEFAULT 1,
  `deleted_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `billing_settings`
--

CREATE TABLE `billing_settings` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `facilities_id` bigint(20) UNSIGNED NOT NULL,
  `max_billing_monthly` double(8,2) NOT NULL,
  `hourly_rate` double(8,2) NOT NULL,
  `weekend_hourly_rates` double(8,2) NOT NULL,
  `holiday_hourly_rates` double(8,2) NOT NULL,
  `max_monthly_incentive` double(8,2) NOT NULL,
  `max_monthly_incentive_per_hour` double(8,2) NOT NULL,
  `max_monthly_incentive_fixed` double(8,2) NOT NULL,
  `allow_overtime` tinyint(1) NOT NULL DEFAULT 0 COMMENT '0=false,1=true',
  `overtime_hourly_rate` double(8,2) NOT NULL,
  `overtime_percentage` double(8,2) NOT NULL,
  `invoice_delivery` enum('email','physical','both') NOT NULL,
  `invoice_statement` enum('daily','weekly','monthly','custom') NOT NULL,
  `invoice_statement_start_date` date DEFAULT NULL,
  `invoice_statement_end_date` date DEFAULT NULL,
  `invoice_frequency_delivery` enum('daily','weekly','monthly','custom') NOT NULL,
  `invoice_frequency_start_date` date DEFAULT NULL,
  `invoice_frequency_end_date` date DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `facilities`
--

CREATE TABLE `facilities` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) NOT NULL,
  `about` text NOT NULL,
  `guide` varchar(255) NOT NULL,
  `address` text NOT NULL,
  `city` varchar(255) NOT NULL,
  `state` varchar(255) NOT NULL,
  `country` varchar(255) NOT NULL,
  `zipcode` varchar(255) NOT NULL,
  `image` varchar(255) NOT NULL,
  `document` varchar(255) DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `facility_contact_infos`
--

CREATE TABLE `facility_contact_infos` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `facilities_id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `phone` varchar(255) NOT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NOT NULL DEFAULT current_timestamp()
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
-- Table structure for table `messages`
--

CREATE TABLE `messages` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `sender_id` bigint(20) UNSIGNED NOT NULL,
  `receiver_id` bigint(20) UNSIGNED NOT NULL,
  `type` enum('app','email','text','both') NOT NULL,
  `message` text NOT NULL,
  `has_media` tinyint(1) NOT NULL DEFAULT 0 COMMENT '0 - No media, 1 - media is available',
  `read_at` timestamp NULL DEFAULT NULL COMMENT 'when user read the message, else it will NULL',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `message_contacts`
--

CREATE TABLE `message_contacts` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `user_id` bigint(20) UNSIGNED NOT NULL,
  `receiver_id` bigint(20) UNSIGNED NOT NULL,
  `message_id` bigint(20) UNSIGNED NOT NULL COMMENT 'Last messages id',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `message_media`
--

CREATE TABLE `message_media` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `message_id` bigint(20) UNSIGNED NOT NULL,
  `type` enum('image') NOT NULL DEFAULT 'image',
  `path` varchar(100) NOT NULL,
  `size` varchar(10) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
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
(45, '2014_10_12_000000_create_users_table', 1),
(46, '2014_10_12_100000_create_password_reset_tokens_table', 1),
(47, '2019_08_19_000000_create_failed_jobs_table', 1),
(48, '2019_12_14_000001_create_personal_access_tokens_table', 1),
(49, '2023_06_26_061934_create_facilities_table', 1),
(50, '2023_06_26_062002_create_supports_table', 1),
(51, '2023_06_26_095803_create_user_other_infos_table', 1),
(52, '2023_06_26_101051_create_facility_contact_infos_table', 1),
(53, '2023_06_26_101706_create_availabilities_table', 1),
(54, '2023_06_26_102650_create_reminders_table', 1),
(55, '2023_06_26_103340_create_shifts_table', 1),
(56, '2023_06_26_103412_create_timecards_table', 1),
(57, '2023_06_27_063303_create_shifts_assigneds_table', 1),
(58, '2023_06_27_064033_create_billing_settings_table', 1),
(59, '2023_06_27_071024_create_template_settings_table', 1),
(60, '2023_06_27_071609_create_news_settings_table', 1),
(61, '2023_06_27_071733_create_reason_settings_table', 1),
(62, '2023_06_27_072017_create_point_settings_table', 1),
(63, '2023_06_27_093945_create_user_access_settings_table', 1),
(64, '2023_06_27_094655_create_user_permission_settings_table', 1),
(65, '2023_06_27_100727_create_user_notification_settings_table', 1),
(66, '2023_06_27_102238_create_user_other_settings_table', 1),
(67, '2023_07_05_213458_create_messages_table', 1),
(68, '2023_07_05_213951_create_message_media_table', 1),
(69, '2023_07_06_145142_create_user_docs_table', 1),
(70, '2023_07_07_225232_create_message_contacts_table', 1);

-- --------------------------------------------------------

--
-- Table structure for table `news_settings`
--

CREATE TABLE `news_settings` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `type` tinyint(4) NOT NULL COMMENT '1 = For Instacare Staff,2 = For Facilities,3 = For Employees,4 = For All',
  `title` varchar(255) NOT NULL,
  `description` text NOT NULL,
  `is_active` tinyint(1) NOT NULL DEFAULT 1,
  `deleted_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `password_reset_tokens`
--

CREATE TABLE `password_reset_tokens` (
  `email` varchar(255) NOT NULL,
  `token` varchar(255) NOT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `personal_access_tokens`
--

CREATE TABLE `personal_access_tokens` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `tokenable_type` varchar(255) NOT NULL,
  `tokenable_id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) NOT NULL,
  `token` varchar(64) NOT NULL,
  `abilities` text DEFAULT NULL,
  `last_used_at` timestamp NULL DEFAULT NULL,
  `expires_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `personal_access_tokens`
--

INSERT INTO `personal_access_tokens` (`id`, `tokenable_type`, `tokenable_id`, `name`, `token`, `abilities`, `last_used_at`, `expires_at`, `created_at`, `updated_at`) VALUES
(1, 'App\\Models\\User', 1, 'api_token', 'd9996471234820b023c617361035e399c803c4f6f2d67f0b189eeef2c5220f03', '[\"*\"]', '2023-07-13 05:03:59', NULL, '2023-07-13 04:46:59', '2023-07-13 05:03:59'),
(2, 'App\\Models\\User', 1, 'api_token', '30f128f391c4fd832a3ce0a677041a02c9e11712058243d3ef1102738b1ed859', '[\"*\"]', NULL, NULL, '2023-07-13 05:02:37', '2023-07-13 05:02:37'),
(3, 'App\\Models\\User', 1, 'api_token', '10700460470f8fa7723ab4bf9a84e20cebadcf004d712437299d9eebf543f547', '[\"*\"]', NULL, NULL, '2023-07-13 05:04:56', '2023-07-13 05:04:56');

-- --------------------------------------------------------

--
-- Table structure for table `point_settings`
--

CREATE TABLE `point_settings` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `reason` varchar(255) NOT NULL,
  `points` int(11) NOT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `reason_settings`
--

CREATE TABLE `reason_settings` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `reason` varchar(255) NOT NULL,
  `area` varchar(255) DEFAULT NULL,
  `is_active` tinyint(1) NOT NULL DEFAULT 1,
  `deleted_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `reminders`
--

CREATE TABLE `reminders` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `date` date NOT NULL,
  `time` time NOT NULL,
  `staff_type` tinyint(4) NOT NULL COMMENT '2=Instacare Staff, 3=Facility Staff, 4=Employee',
  `reminder_for` varchar(255) DEFAULT NULL,
  `user_id` bigint(20) UNSIGNED NOT NULL,
  `notes` text NOT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `shifts`
--

CREATE TABLE `shifts` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `type` tinyint(4) NOT NULL COMMENT '1=Single Shifts, 2=Recurring Shifts, 3=Bulk Upload, 4=Bulk Shifts',
  `facilities_id` bigint(20) UNSIGNED NOT NULL,
  `role` enum('rn','lpn','cna') NOT NULL,
  `positions` int(11) NOT NULL,
  `date` date NOT NULL,
  `shift_time` tinyint(4) NOT NULL COMMENT '1=Morning Shift: 7:00AM - 3:00PM, 2=Noon Shift: 3:00PM - 11:00PM, 3=Night Shift: 11:00PM - 7:00AM, 4=Custom',
  `duration` int(11) NOT NULL,
  `recurring_days` enum('sun','mon','tue','wed','thu','fri','sat') NOT NULL,
  `start_time` time NOT NULL,
  `end_time` time NOT NULL,
  `incentives` tinyint(1) NOT NULL DEFAULT 1,
  `incentive_type` tinyint(4) NOT NULL DEFAULT 0 COMMENT '0=Hourly,1=Fixed',
  `incentive_by` enum('instacare') NOT NULL,
  `incentive_amount` int(11) NOT NULL,
  `rate` int(11) DEFAULT NULL COMMENT 'per hour',
  `floor_number` varchar(255) NOT NULL,
  `cancellation_guarantee` tinyint(1) NOT NULL DEFAULT 1,
  `supervisior_id` int(11) NOT NULL,
  `notes` text NOT NULL,
  `status` tinyint(4) NOT NULL DEFAULT 1 COMMENT '1=Open Shifts, 2=Confirmed Shifts, 3=Shift in Progress, 4=Completed Shifts, 5=Call Offs Shifts, 6=Facility Cancellation, 7=Late',
  `deleted_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `shifts_assigneds`
--

CREATE TABLE `shifts_assigneds` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `shift_id` bigint(20) UNSIGNED NOT NULL,
  `emp_id` bigint(20) UNSIGNED NOT NULL,
  `is_clocked_in` tinyint(1) DEFAULT NULL,
  `is_clocked_out` tinyint(1) DEFAULT NULL,
  `clocked_in_time` time DEFAULT NULL,
  `clocked_out_time` time DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `supports`
--

CREATE TABLE `supports` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `reason` varchar(255) NOT NULL,
  `message` text NOT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `template_settings`
--

CREATE TABLE `template_settings` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `type` tinyint(4) NOT NULL COMMENT '1=Email, 2=Text',
  `subject` varchar(255) NOT NULL,
  `quick_message` longtext NOT NULL,
  `is_active` tinyint(1) NOT NULL DEFAULT 1 COMMENT '0=false,1=true',
  `deleted_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `timecards`
--

CREATE TABLE `timecards` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `facilities_id` bigint(20) UNSIGNED NOT NULL,
  `role` enum('rn','lpa','cna') NOT NULL,
  `emp_id` bigint(20) UNSIGNED NOT NULL,
  `shift_id` bigint(20) UNSIGNED NOT NULL,
  `address` text NOT NULL,
  `start_time` time NOT NULL,
  `end_time` time NOT NULL,
  `notes` text NOT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `type` enum('1','2','3','4') NOT NULL COMMENT '1=Admin, 2=Instacare Staff, 3=Facility Member, 4=Employee',
  `role` enum('administrator','instacare_staff','facility_manager','facility_staff','front_desk','lpn','rn','cna') NOT NULL,
  `facility_id` int(11) DEFAULT NULL,
  `fname` varchar(255) NOT NULL,
  `lname` varchar(255) NOT NULL,
  `phone` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `city` varchar(255) NOT NULL,
  `state` varchar(255) NOT NULL,
  `country` varchar(255) NOT NULL,
  `zipcode` varchar(255) NOT NULL,
  `timezone` varchar(255) NOT NULL,
  `language` varchar(255) NOT NULL,
  `fcm_token` varchar(255) DEFAULT NULL,
  `image` varchar(255) NOT NULL DEFAULT 'default.jpg',
  `status` enum('1','2','3','4','5') NOT NULL DEFAULT '1' COMMENT '1=Available,2Away,3=Busy,4=DND,5=Offline',
  `is_web_login` tinyint(1) NOT NULL DEFAULT 0 COMMENT '0=false,1=true',
  `is_app_login` tinyint(1) NOT NULL DEFAULT 0 COMMENT '0=false,1=true',
  `is_login` tinyint(1) NOT NULL DEFAULT 0 COMMENT '0=false,1=true',
  `deleted_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `type`, `role`, `facility_id`, `fname`, `lname`, `phone`, `email`, `password`, `city`, `state`, `country`, `zipcode`, `timezone`, `language`, `fcm_token`, `image`, `status`, `is_web_login`, `is_app_login`, `is_login`, `deleted_at`, `created_at`, `updated_at`) VALUES
(1, '1', 'administrator', NULL, 'Super', 'Admin', '0123456789', 'superadmin@yopmail.com', '$2y$10$t1ZZywZmcCWVoeCHl3zXl.zPCj0jBm2qtqKAIk6hTI4D1/uMZG08i', 'Los Angeles', 'California', 'US', '90001', 'America/Los_Angeles', 'English', NULL, 'default.jpg', '1', 0, 0, 0, NULL, '2023-07-13 10:16:55', '2023-07-13 10:16:55');

-- --------------------------------------------------------

--
-- Table structure for table `user_access_settings`
--

CREATE TABLE `user_access_settings` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `user_id` bigint(20) UNSIGNED NOT NULL,
  `user_type` tinyint(4) NOT NULL COMMENT '1=Admin, 2=Instacare Staff, 3=Facility Member, 4=Employee',
  `dashboard` tinyint(1) DEFAULT NULL,
  `schedule` tinyint(1) DEFAULT NULL,
  `people` tinyint(1) DEFAULT NULL,
  `facilities` tinyint(1) DEFAULT NULL,
  `messaging` tinyint(1) DEFAULT NULL,
  `timecards` tinyint(1) DEFAULT NULL,
  `whos_on` tinyint(1) DEFAULT NULL,
  `total_billing` tinyint(1) DEFAULT NULL,
  `support` tinyint(1) DEFAULT NULL,
  `my_availability` tinyint(1) DEFAULT NULL,
  `payroll` tinyint(1) DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `user_docs`
--

CREATE TABLE `user_docs` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `user_id` bigint(20) UNSIGNED NOT NULL,
  `il_w4` varchar(255) DEFAULT NULL,
  `emp_verification` varchar(255) DEFAULT NULL,
  `bg_auth_form` varchar(255) DEFAULT NULL,
  `direct_deposit` varchar(255) DEFAULT NULL,
  `health_ins` varchar(255) DEFAULT NULL,
  `8850` varchar(255) DEFAULT NULL,
  `crp_certification` varchar(255) DEFAULT NULL,
  `emp_handbook` varchar(255) DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `user_notification_settings`
--

CREATE TABLE `user_notification_settings` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `user_id` bigint(20) UNSIGNED NOT NULL,
  `user_type` tinyint(4) NOT NULL COMMENT '1=Admin, 2=Instacare Staff, 3=Facility Member, 4=Employee',
  `text` tinyint(1) DEFAULT NULL,
  `email` tinyint(1) DEFAULT NULL,
  `in_app` tinyint(1) DEFAULT NULL,
  `text_confirm_shifts` tinyint(1) DEFAULT NULL,
  `text_schedule_shifts` tinyint(1) DEFAULT NULL,
  `text_cancelled_shifts` tinyint(1) DEFAULT NULL,
  `text_deleted_shifts` tinyint(1) DEFAULT NULL,
  `text_timecard_processed` tinyint(1) DEFAULT NULL,
  `text_late_clock_in` tinyint(1) DEFAULT NULL,
  `text_late_clock_out` tinyint(1) DEFAULT NULL,
  `text_shift_posted_by_instacare` tinyint(1) DEFAULT NULL,
  `text_shift_posted_by_facilitites` tinyint(1) DEFAULT NULL,
  `text_arriving_late` tinyint(1) DEFAULT NULL,
  `text_arriving_late_reported_by_employee` tinyint(1) DEFAULT NULL,
  `text_requested_to_work_at_a_certain_facility` tinyint(1) DEFAULT NULL,
  `text_message_sent` tinyint(1) DEFAULT NULL,
  `text_message_receive` tinyint(1) DEFAULT NULL,
  `text_person_added` tinyint(1) DEFAULT NULL,
  `text_facility_added` tinyint(1) DEFAULT NULL,
  `text_member_added` tinyint(1) DEFAULT NULL,
  `text_documents_uploaded` tinyint(1) DEFAULT NULL,
  `text_setting_changed` tinyint(1) DEFAULT NULL,
  `text_report_generated` tinyint(1) DEFAULT NULL,
  `text_support_request` tinyint(1) DEFAULT NULL,
  `text_change_in_billing_parameters` tinyint(1) DEFAULT NULL,
  `text_email_template_added` tinyint(1) DEFAULT NULL,
  `text_email_template_edited` tinyint(1) DEFAULT NULL,
  `text_email_and_text_template_added` tinyint(1) DEFAULT NULL,
  `text_email_and_text_template_edited` tinyint(1) DEFAULT NULL,
  `text_points_added` tinyint(1) DEFAULT NULL,
  `text_points_reason_added` tinyint(1) DEFAULT NULL,
  `text_shift_completed` tinyint(1) DEFAULT NULL,
  `text_call_of_shift` tinyint(1) DEFAULT NULL,
  `text_unassigned_shift` tinyint(1) DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `user_other_infos`
--

CREATE TABLE `user_other_infos` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `user_id` bigint(20) UNSIGNED NOT NULL,
  `driver_license_number` varchar(255) NOT NULL,
  `driver_license_status` varchar(255) NOT NULL,
  `ssn_tax_id` varchar(255) NOT NULL,
  `uniform_size` varchar(255) NOT NULL,
  `emr_contact_name` varchar(255) NOT NULL,
  `emr_contact_phone` varchar(255) NOT NULL,
  `emr_contact_relationship` varchar(255) NOT NULL,
  `emr_contact_license_number` varchar(255) NOT NULL,
  `emr_contact_miles` varchar(255) NOT NULL,
  `emp_w4` tinyint(1) NOT NULL,
  `emp_verification` tinyint(1) NOT NULL,
  `emp_background` tinyint(1) NOT NULL,
  `emp_direct` tinyint(1) NOT NULL,
  `emp_health_ins` tinyint(1) NOT NULL,
  `emp_8850` tinyint(1) NOT NULL,
  `emp_crp` tinyint(1) NOT NULL,
  `emp_handbook` tinyint(1) NOT NULL,
  `imm_tb_test` tinyint(1) NOT NULL,
  `start_tb_test_date` date NOT NULL,
  `end_tb_test_date` date NOT NULL,
  `imm_covid19_date` date NOT NULL,
  `imm_employee` tinyint(1) NOT NULL,
  `imm_religious` tinyint(1) NOT NULL,
  `imm_medical` tinyint(1) NOT NULL,
  `payroll_cycle` enum('weekly','daily') NOT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `user_other_settings`
--

CREATE TABLE `user_other_settings` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `user_id` bigint(20) UNSIGNED NOT NULL,
  `user_type` tinyint(4) NOT NULL COMMENT '1=Admin, 2=Instacare Staff, 3=Facility Member, 4=Employee',
  `automatic_clock_out` tinyint(1) DEFAULT NULL,
  `restrict_clock_in_before_shift` tinyint(1) DEFAULT NULL,
  `restrict_clock_in_before_shift_time_period` varchar(255) DEFAULT NULL COMMENT 'In Mins',
  `restrict_clock_in_during_the_shift` tinyint(1) DEFAULT NULL,
  `restrict_clock_in_during_the_shift_time_period` varchar(255) DEFAULT NULL COMMENT 'In Mins',
  `point_expiry_date` tinyint(1) DEFAULT NULL,
  `point_expiry_date_time_period` varchar(255) DEFAULT NULL COMMENT 'In Days',
  `incentives_who_havent_clock_in` tinyint(1) DEFAULT NULL,
  `incentives_who_havent_clock_in_time_period` varchar(255) DEFAULT NULL COMMENT 'In Days',
  `deleted_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `user_permission_settings`
--

CREATE TABLE `user_permission_settings` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `user_id` bigint(20) UNSIGNED NOT NULL,
  `user_type` tinyint(4) NOT NULL COMMENT '1=Admin, 2=Instacare Staff, 3=Facility Member, 4=Employee',
  `create_reminders` tinyint(1) DEFAULT NULL,
  `create_schedule` tinyint(1) DEFAULT NULL,
  `delete_schedule` tinyint(1) DEFAULT NULL,
  `process_timecard` tinyint(1) DEFAULT NULL,
  `report_timecard` tinyint(1) DEFAULT NULL,
  `write_review` tinyint(1) DEFAULT NULL,
  `messaging` tinyint(1) DEFAULT NULL,
  `create_timecard` tinyint(1) DEFAULT NULL,
  `add_points` tinyint(1) DEFAULT NULL,
  `clock_in_shifts` tinyint(1) DEFAULT NULL,
  `clock_out_shifts` tinyint(1) DEFAULT NULL,
  `cancel_shifts` tinyint(1) DEFAULT NULL,
  `signature` tinyint(1) DEFAULT NULL,
  `accepting_shifts` tinyint(1) DEFAULT NULL,
  `download_timecard` tinyint(1) DEFAULT NULL,
  `report_an_issue` tinyint(1) DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Indexes for dumped tables
--

--
-- Indexes for table `availabilities`
--
ALTER TABLE `availabilities`
  ADD PRIMARY KEY (`id`),
  ADD KEY `availabilities_emp_id_foreign` (`emp_id`),
  ADD KEY `availabilities_facilities_id_foreign` (`facilities_id`);

--
-- Indexes for table `billing_settings`
--
ALTER TABLE `billing_settings`
  ADD PRIMARY KEY (`id`),
  ADD KEY `billing_settings_facilities_id_foreign` (`facilities_id`);

--
-- Indexes for table `facilities`
--
ALTER TABLE `facilities`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `facility_contact_infos`
--
ALTER TABLE `facility_contact_infos`
  ADD PRIMARY KEY (`id`),
  ADD KEY `facility_contact_infos_facilities_id_foreign` (`facilities_id`);

--
-- Indexes for table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `failed_jobs_uuid_unique` (`uuid`);

--
-- Indexes for table `messages`
--
ALTER TABLE `messages`
  ADD PRIMARY KEY (`id`),
  ADD KEY `messages_sender_id_foreign` (`sender_id`),
  ADD KEY `messages_receiver_id_foreign` (`receiver_id`);

--
-- Indexes for table `message_contacts`
--
ALTER TABLE `message_contacts`
  ADD PRIMARY KEY (`id`),
  ADD KEY `message_contacts_user_id_foreign` (`user_id`),
  ADD KEY `message_contacts_receiver_id_foreign` (`receiver_id`),
  ADD KEY `message_contacts_message_id_foreign` (`message_id`);

--
-- Indexes for table `message_media`
--
ALTER TABLE `message_media`
  ADD PRIMARY KEY (`id`),
  ADD KEY `message_media_message_id_foreign` (`message_id`);

--
-- Indexes for table `migrations`
--
ALTER TABLE `migrations`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `news_settings`
--
ALTER TABLE `news_settings`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `password_reset_tokens`
--
ALTER TABLE `password_reset_tokens`
  ADD PRIMARY KEY (`email`);

--
-- Indexes for table `personal_access_tokens`
--
ALTER TABLE `personal_access_tokens`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `personal_access_tokens_token_unique` (`token`),
  ADD KEY `personal_access_tokens_tokenable_type_tokenable_id_index` (`tokenable_type`,`tokenable_id`);

--
-- Indexes for table `point_settings`
--
ALTER TABLE `point_settings`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `reason_settings`
--
ALTER TABLE `reason_settings`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `reminders`
--
ALTER TABLE `reminders`
  ADD PRIMARY KEY (`id`),
  ADD KEY `reminders_user_id_foreign` (`user_id`);

--
-- Indexes for table `shifts`
--
ALTER TABLE `shifts`
  ADD PRIMARY KEY (`id`),
  ADD KEY `shifts_facilities_id_foreign` (`facilities_id`);

--
-- Indexes for table `shifts_assigneds`
--
ALTER TABLE `shifts_assigneds`
  ADD PRIMARY KEY (`id`),
  ADD KEY `shifts_assigneds_shift_id_foreign` (`shift_id`),
  ADD KEY `shifts_assigneds_emp_id_foreign` (`emp_id`);

--
-- Indexes for table `supports`
--
ALTER TABLE `supports`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `template_settings`
--
ALTER TABLE `template_settings`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `timecards`
--
ALTER TABLE `timecards`
  ADD PRIMARY KEY (`id`),
  ADD KEY `timecards_facilities_id_foreign` (`facilities_id`),
  ADD KEY `timecards_emp_id_foreign` (`emp_id`),
  ADD KEY `timecards_shift_id_foreign` (`shift_id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `users_phone_unique` (`phone`),
  ADD UNIQUE KEY `users_email_unique` (`email`);

--
-- Indexes for table `user_access_settings`
--
ALTER TABLE `user_access_settings`
  ADD PRIMARY KEY (`id`),
  ADD KEY `user_access_settings_user_id_foreign` (`user_id`);

--
-- Indexes for table `user_docs`
--
ALTER TABLE `user_docs`
  ADD PRIMARY KEY (`id`),
  ADD KEY `user_docs_user_id_foreign` (`user_id`);

--
-- Indexes for table `user_notification_settings`
--
ALTER TABLE `user_notification_settings`
  ADD PRIMARY KEY (`id`),
  ADD KEY `user_notification_settings_user_id_foreign` (`user_id`);

--
-- Indexes for table `user_other_infos`
--
ALTER TABLE `user_other_infos`
  ADD PRIMARY KEY (`id`),
  ADD KEY `user_other_infos_user_id_foreign` (`user_id`);

--
-- Indexes for table `user_other_settings`
--
ALTER TABLE `user_other_settings`
  ADD PRIMARY KEY (`id`),
  ADD KEY `user_other_settings_user_id_foreign` (`user_id`);

--
-- Indexes for table `user_permission_settings`
--
ALTER TABLE `user_permission_settings`
  ADD PRIMARY KEY (`id`),
  ADD KEY `user_permission_settings_user_id_foreign` (`user_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `availabilities`
--
ALTER TABLE `availabilities`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `billing_settings`
--
ALTER TABLE `billing_settings`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `facilities`
--
ALTER TABLE `facilities`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `facility_contact_infos`
--
ALTER TABLE `facility_contact_infos`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `messages`
--
ALTER TABLE `messages`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `message_contacts`
--
ALTER TABLE `message_contacts`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `message_media`
--
ALTER TABLE `message_media`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=71;

--
-- AUTO_INCREMENT for table `news_settings`
--
ALTER TABLE `news_settings`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `personal_access_tokens`
--
ALTER TABLE `personal_access_tokens`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `point_settings`
--
ALTER TABLE `point_settings`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `reason_settings`
--
ALTER TABLE `reason_settings`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `reminders`
--
ALTER TABLE `reminders`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `shifts`
--
ALTER TABLE `shifts`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `shifts_assigneds`
--
ALTER TABLE `shifts_assigneds`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `supports`
--
ALTER TABLE `supports`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `template_settings`
--
ALTER TABLE `template_settings`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `timecards`
--
ALTER TABLE `timecards`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `user_access_settings`
--
ALTER TABLE `user_access_settings`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `user_docs`
--
ALTER TABLE `user_docs`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `user_notification_settings`
--
ALTER TABLE `user_notification_settings`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `user_other_infos`
--
ALTER TABLE `user_other_infos`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `user_other_settings`
--
ALTER TABLE `user_other_settings`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `user_permission_settings`
--
ALTER TABLE `user_permission_settings`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `availabilities`
--
ALTER TABLE `availabilities`
  ADD CONSTRAINT `availabilities_emp_id_foreign` FOREIGN KEY (`emp_id`) REFERENCES `users` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `availabilities_facilities_id_foreign` FOREIGN KEY (`facilities_id`) REFERENCES `facilities` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `billing_settings`
--
ALTER TABLE `billing_settings`
  ADD CONSTRAINT `billing_settings_facilities_id_foreign` FOREIGN KEY (`facilities_id`) REFERENCES `facilities` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `facility_contact_infos`
--
ALTER TABLE `facility_contact_infos`
  ADD CONSTRAINT `facility_contact_infos_facilities_id_foreign` FOREIGN KEY (`facilities_id`) REFERENCES `facilities` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `messages`
--
ALTER TABLE `messages`
  ADD CONSTRAINT `messages_receiver_id_foreign` FOREIGN KEY (`receiver_id`) REFERENCES `users` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `messages_sender_id_foreign` FOREIGN KEY (`sender_id`) REFERENCES `users` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `message_contacts`
--
ALTER TABLE `message_contacts`
  ADD CONSTRAINT `message_contacts_message_id_foreign` FOREIGN KEY (`message_id`) REFERENCES `messages` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `message_contacts_receiver_id_foreign` FOREIGN KEY (`receiver_id`) REFERENCES `users` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `message_contacts_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `message_media`
--
ALTER TABLE `message_media`
  ADD CONSTRAINT `message_media_message_id_foreign` FOREIGN KEY (`message_id`) REFERENCES `messages` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `reminders`
--
ALTER TABLE `reminders`
  ADD CONSTRAINT `reminders_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `shifts`
--
ALTER TABLE `shifts`
  ADD CONSTRAINT `shifts_facilities_id_foreign` FOREIGN KEY (`facilities_id`) REFERENCES `facilities` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `shifts_assigneds`
--
ALTER TABLE `shifts_assigneds`
  ADD CONSTRAINT `shifts_assigneds_emp_id_foreign` FOREIGN KEY (`emp_id`) REFERENCES `users` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `shifts_assigneds_shift_id_foreign` FOREIGN KEY (`shift_id`) REFERENCES `shifts` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `timecards`
--
ALTER TABLE `timecards`
  ADD CONSTRAINT `timecards_emp_id_foreign` FOREIGN KEY (`emp_id`) REFERENCES `users` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `timecards_facilities_id_foreign` FOREIGN KEY (`facilities_id`) REFERENCES `facilities` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `timecards_shift_id_foreign` FOREIGN KEY (`shift_id`) REFERENCES `shifts` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `user_access_settings`
--
ALTER TABLE `user_access_settings`
  ADD CONSTRAINT `user_access_settings_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `user_docs`
--
ALTER TABLE `user_docs`
  ADD CONSTRAINT `user_docs_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `user_notification_settings`
--
ALTER TABLE `user_notification_settings`
  ADD CONSTRAINT `user_notification_settings_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `user_other_infos`
--
ALTER TABLE `user_other_infos`
  ADD CONSTRAINT `user_other_infos_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `user_other_settings`
--
ALTER TABLE `user_other_settings`
  ADD CONSTRAINT `user_other_settings_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `user_permission_settings`
--
ALTER TABLE `user_permission_settings`
  ADD CONSTRAINT `user_permission_settings_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
