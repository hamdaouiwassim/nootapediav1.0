-- phpMyAdmin SQL Dump
-- version 4.9.1
-- https://www.phpmyadmin.net/
--
-- Host: localhost:3306
-- Generation Time: Jan 21, 2021 at 09:30 AM
-- Server version: 5.7.24
-- PHP Version: 7.2.19

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `noota-pedia`
--

-- --------------------------------------------------------

--
-- Table structure for table `categories`
--

CREATE TABLE `categories` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `image` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `description` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `categories`
--

INSERT INTO `categories` (`id`, `name`, `image`, `description`, `created_at`, `updated_at`) VALUES
(1, 'بحوث', NULL, 'بحوث', '2021-01-14 19:28:56', '2021-01-14 19:28:56'),
(2, 'أراء', NULL, 'أراء', '2021-01-14 19:29:24', '2021-01-14 19:29:24');

-- --------------------------------------------------------

--
-- Table structure for table `failed_jobs`
--

CREATE TABLE `failed_jobs` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `connection` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `queue` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `payload` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `exception` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `failed_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `migrations`
--

CREATE TABLE `migrations` (
  `id` int(10) UNSIGNED NOT NULL,
  `migration` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `batch` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `migrations`
--

INSERT INTO `migrations` (`id`, `migration`, `batch`) VALUES
(1, '2014_10_12_000000_create_users_table', 1),
(2, '2014_10_12_100000_create_password_resets_table', 1),
(3, '2019_08_19_000000_create_failed_jobs_table', 1),
(4, '2021_01_12_090141_create_posts_table', 1),
(5, '2021_01_12_090739_create_categories_table', 1);

-- --------------------------------------------------------

--
-- Table structure for table `password_resets`
--

CREATE TABLE `password_resets` (
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `posts`
--

CREATE TABLE `posts` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `iduser` int(11) NOT NULL,
  `title` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `content` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `idcategory` int(11) NOT NULL,
  `keywords` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `image` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `stat` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'trash',
  `soundfile` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `posts`
--

INSERT INTO `posts` (`id`, `iduser`, `title`, `content`, `idcategory`, `keywords`, `created_at`, `updated_at`, `image`, `stat`, `soundfile`) VALUES
(1, 1, 'ليوناردو دافنشي', '<p class=\"Standard\" dir=\"RTL\" style=\"text-align: right; direction: rtl; unicode-bidi: embed;\"><span lang=\"AR-TN\" style=\"font-size: 16.0pt; font-family: Tajawal; mso-ascii-font-family: \'Liberation Serif\'; mso-hansi-font-family: \'Liberation Serif\'; mso-bidi-language: AR-TN;\">الموناليزا تلك اللوحة الرائعة التي لا يختلف اثنان على أنها معجزة فنية بما تحمله الكلمة من معنى فبين غموض الهوّية وبين الابتسامة المحيرة استغرقت 7 سنوات من الجهد والعمل لفنان أقل ما يقال عنه أنه معجزة في حقبته، أنه الإيطالي ليوناردو دي سار بيارو دافنشي أو ليوناردو دافنشي عبقري عصر النهضة .</span></p>\r\n<p class=\"Standard\" dir=\"RTL\" style=\"text-align: right; direction: rtl; unicode-bidi: embed;\"><span dir=\"LTR\" lang=\"EN-US\" style=\"font-size: 16.0pt;\">&nbsp;</span></p>\r\n<p class=\"Standard\" dir=\"RTL\" style=\"text-align: right; direction: rtl; unicode-bidi: embed;\"><span lang=\"AR-TN\" style=\"font-size: 16.0pt; font-family: Tajawal; mso-ascii-font-family: \'Liberation Serif\'; mso-hansi-font-family: \'Liberation Serif\'; mso-bidi-language: AR-TN;\">ولد دافنشي في نيسان ابريل سنة 1452 عقب علاقة غير شرعية بين رجل ثري و إمراه من العامة، كان ليوناردو موسوعيا و هي كلمة تطلق على الشخص الذي تكون معارفه في مجالات متعددة فقد كان دافنشي رسّاما، مهندسا حربيا , عالم نبات , موسيقيا , جيولوجيا ,<span style=\"mso-spacerun: yes;\">&nbsp; </span>نحات و معماريا كذلك , إطلاع كبير و موهبة غير عادية جعلت منه و من أعماله مصدر إلهام جمع غفير من العلماء و المؤرخين </span><span lang=\"AR-TN\" style=\"font-size: 16.0pt; font-family: Tajawal; mso-ascii-font-family: \'Liberation Serif\'; mso-hansi-font-family: \'Liberation Serif\'; mso-ansi-language: FR; mso-bidi-language: AR-TN;\">الى حدّ الساعة .</span></p>\r\n<p class=\"Standard\" dir=\"RTL\" style=\"text-align: right; direction: rtl; unicode-bidi: embed;\">&nbsp;</p>\r\n<p class=\"Standard\" dir=\"RTL\" style=\"text-align: right; direction: rtl; unicode-bidi: embed;\"><span lang=\"AR-TN\" style=\"font-size: 16.0pt; font-family: Tajawal; mso-ascii-font-family: \'Liberation Serif\'; mso-hansi-font-family: \'Liberation Serif\'; mso-ansi-language: FR; mso-bidi-language: AR-TN;\">تعلم ليوناردو القراءة والكتابة حينما التحق بعائلة ابيه تحديدا على يد الفنان اشار فروكيو ليظهر فيما بعد تعطش دافنشي للتعلم وموهبته الفذة في القيام بالأشياء بشكل مختلف حيث يقال أن فيروكيو قد اعتزل الرسم بعد رؤية موهبة دافنشي في لوحتهم المشتركة تعميد المسيح سنة 1475 .</span></p>\r\n<p class=\"Standard\" dir=\"RTL\" style=\"text-align: right; direction: rtl; unicode-bidi: embed;\">&nbsp;</p>\r\n<p class=\"Standard\" dir=\"RTL\" style=\"text-align: right; direction: rtl; unicode-bidi: embed;\"><span lang=\"AR-TN\" style=\"font-size: 16.0pt; font-family: Tajawal; mso-ascii-font-family: \'Liberation Serif\'; mso-hansi-font-family: \'Liberation Serif\'; mso-ansi-language: FR; mso-bidi-language: AR-TN;\">لم يكن الرسم متعة ليوناردو الوحيدة فقد كان نادرا ما يكون راضيا عن نفسه، ربما هذا الشعور هو ما جعله رجلا من المستحيل إيقاف طموحاته أو لنقل جنونه في تلك الحقبة فما كان يقوم به جنون الفعل ومع تقدم دافنشي في العمر والمعرفة أصبح قادرا على صنع الأسلحة والمركبات المدرعة، كانت ثورية التصميم والأداء وظهر ذلك في العديد من أعماله ومخطوطاته.</span></p>\r\n<p class=\"Standard\" dir=\"RTL\" style=\"text-align: right; direction: rtl; unicode-bidi: embed;\"><span lang=\"AR-TN\" style=\"font-size: 16.0pt; font-family: Tajawal; mso-ascii-font-family: \'Liberation Serif\'; mso-hansi-font-family: \'Liberation Serif\'; mso-ansi-language: FR; mso-bidi-language: AR-TN;\">رأى بعض المؤرخين أنّ دافنشي كان مختلفا عن جلّ العلماء الذين سبقوه فقد كان فريدا من نوعه فقد دمج بين الرؤى الفنية والعلوم النظرية ساعدته في ذلك دقّة ملاحظته وبحثه المستمر في أغلب الأشياء فقيل عنه أنه كان قريبا جدّا من الكمال البشري الذي لم يطله أحد، وما أثار استياء البعض الأخر من العلماء والمؤرخين هو بعض أعماله الغير منجزة التي بقيت محفورة على الأوراق والمخطوطات لكنها كانت شبه مكتملة من حيث التصميم و لم ينقصها سوى التنفيذ.</span></p>\r\n<p class=\"Standard\" dir=\"RTL\" style=\"text-align: right; direction: rtl; unicode-bidi: embed;\">&nbsp;</p>\r\n<p class=\"Standard\" dir=\"RTL\" style=\"text-align: right; direction: rtl; unicode-bidi: embed;\"><span lang=\"AR-TN\" style=\"font-size: 16.0pt; font-family: Tajawal; mso-ascii-font-family: \'Liberation Serif\'; mso-hansi-font-family: \'Liberation Serif\'; mso-ansi-language: FR; mso-bidi-language: AR-TN;\">لدى دافنشي سجل حافل بالأعمال والإنجازات أولها لوحة الموناليزا التي حيرت العلماء والباحثين والمؤرخين لا بل كلّ ناظر الى تلك اللوحة لكن هذه اللوحة لم تكن الوحيدة في خزينة أعماله الفنية، العشاء الأخير، سيدة القرنفل والسيّدة بيونس كذلك لوحة عشق المجوس و غيرهم كانت أعمال مدهشة بالفعل أيضا اختراعاته الحربية كالرشّاش، المركبة المدرّعة، بزة الغوص و نموذج الطائرة كلها كانت عظيمة وقتها.</span></p>\r\n<p class=\"Standard\" dir=\"RTL\" style=\"text-align: right; direction: rtl; unicode-bidi: embed;\">&nbsp;</p>\r\n<p class=\"Standard\" dir=\"RTL\" style=\"text-align: right; direction: rtl; unicode-bidi: embed;\"><span lang=\"AR-TN\" style=\"font-size: 16.0pt; font-family: Tajawal; mso-ascii-font-family: \'Liberation Serif\'; mso-hansi-font-family: \'Liberation Serif\'; mso-ansi-language: FR; mso-bidi-language: AR-TN;\">في سنة 2013 قامت شبكة فوكس بإنتاج مسلسل من 3 مواسم حتى الان حول هذا العبقري حمل اسم \" شياطين دافنشي \" </span><span dir=\"LTR\" style=\"font-size: 16.0pt; mso-bidi-font-family: Tajawal; mso-ansi-language: FR; mso-bidi-language: AR-TN;\">Davencci demons</span><span lang=\"AR-TN\" style=\"font-size: 16.0pt; font-family: Tajawal; mso-ascii-font-family: \'Liberation Serif\'; mso-hansi-font-family: \'Liberation Serif\'; mso-ansi-language: FR; mso-bidi-language: AR-TN;\"> بالإنجليزية يعكس حياته وصراعته في ذلك العصر من بطولة توم رايلي ولورا هادوك.</span></p>\r\n<p class=\"Standard\" dir=\"RTL\" style=\"text-align: right; direction: rtl; unicode-bidi: embed;\">&nbsp;</p>\r\n<p class=\"Standard\" dir=\"RTL\" style=\"text-align: right; direction: rtl; unicode-bidi: embed;\"><span lang=\"AR-TN\" style=\"font-size: 16.0pt; font-family: Tajawal; mso-ascii-font-family: \'Liberation Serif\'; mso-hansi-font-family: \'Liberation Serif\'; mso-ansi-language: FR; mso-bidi-language: AR-TN;\">توفي دافنشي سنة 1519 مخلفا وراءه إنجازات عظيمة من لوحات فنية كالموناليزا والعشاء الأخير إلى كتب ومخطوطات كشيفرة دافنشي ومخطوطة ليستر، شخص عظيم أخر قدّم للبشرية أشياء لا تحصى ولا تعد.</span></p>', 1, 'دافنشي,الموناليزا,ليوناردو,عصر النهضة', '2021-01-18 09:50:12', '2021-01-19 19:29:02', '600567e4afedf.png', 'published', ''),
(2, 1, 'المفاعلات النووية', '<p>الأنشطار النووي نوع جديد من التفاعلات الكيميائية يجعل من المواد الصلبة&nbsp;</p>', 2, 'كيمياء', '2021-01-18 10:36:31', '2021-01-18 18:04:51', '600572bf8c805.png', 'published', NULL),
(4, 2, 'من العبودية إلى الرأسمالية الحديثة', '<p>من العبودية إلى الرأسمالية الحديثة: رحلة تطور النظام الاقتصادي الأكثر شيوعًا في العالم</p>\r\n<p>من العبودية إلى الرأسمالية الحديثة: رحلة تطور النظام الاقتصادي الأكثر شيوعًا في العالم</p>\r\n<p>من العبودية إلى الرأسمالية الحديثة: رحلة تطور النظام الاقتصادي الأكثر شيوعًا في العالم</p>\r\n<p>من العبودية إلى الرأسمالية الحديثة: رحلة تطور النظام الاقتصادي الأكثر شيوعًا في العالم</p>\r\n<p>من العبودية إلى الرأسمالية الحديثة: رحلة تطور النظام الاقتصادي الأكثر شيوعًا في العالم</p>\r\n<p>من العبودية إلى الرأسمالية الحديثة: رحلة تطور النظام الاقتصادي الأكثر شيوعًا في العالم</p>', 1, 'الرأس مالية', '2021-01-20 10:27:40', '2021-01-20 11:04:39', '600813ac6742c.png', 'published', '60081c57baddf.mp3');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `password` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `role` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'editor',
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `phone` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `name`, `email`, `email_verified_at`, `password`, `role`, `remember_token`, `created_at`, `updated_at`, `phone`) VALUES
(1, 'Admin', 'hamdaouiwassim@gmail.com', NULL, '$2y$10$OMTrTtslAGvlxGyAxa7mW.PMiwPQlbWzbuqtP3oeG2I.cWDtvgscC', 'admin', NULL, '2021-01-14 08:38:21', '2021-01-14 08:38:21', NULL),
(2, 'Editor', 'editor@gmail.com', NULL, '$2y$10$vEDUSFNrOuN37fdgL277eeuz9C/E3QHPCBmThPZGncnLW2PHoJaHe', 'editor', NULL, '2021-01-20 10:00:30', '2021-01-20 10:00:30', '92045389');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `categories`
--
ALTER TABLE `categories`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `migrations`
--
ALTER TABLE `migrations`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `password_resets`
--
ALTER TABLE `password_resets`
  ADD KEY `password_resets_email_index` (`email`);

--
-- Indexes for table `posts`
--
ALTER TABLE `posts`
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
-- AUTO_INCREMENT for table `categories`
--
ALTER TABLE `categories`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `posts`
--
ALTER TABLE `posts`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
