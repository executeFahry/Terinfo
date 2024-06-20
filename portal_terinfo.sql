-- phpMyAdmin SQL Dump
-- version 5.0.3
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jun 20, 2024 at 08:55 AM
-- Server version: 10.4.14-MariaDB
-- PHP Version: 7.3.23

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `portal_terinfo`
--

-- --------------------------------------------------------

--
-- Table structure for table `berita`
--

CREATE TABLE `berita` (
  `id_berita` int(11) NOT NULL,
  `judul` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `slug` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `isi` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `gambar` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `id_kategori` int(11) NOT NULL,
  `total_views` int(11) NOT NULL DEFAULT 0,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `id_user` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `berita`
--

INSERT INTO `berita` (`id_berita`, `judul`, `slug`, `isi`, `gambar`, `id_kategori`, `total_views`, `created_at`, `updated_at`, `id_user`) VALUES
(2, 'KTT G20 Berlangsung Sukses, Kesepakatan Perdagangan Ditekan', 'ktt-g20-berlangsung-sukses-kesepakatan-perdagangan-ditekan', '<p>KTT G20 baru-baru ini berlangsung dengan sukses di kota besar Negara Y. Para pemimpin dari 20 negara terkemuka di dunia telah mencapai kesepakatan penting terkait kebijakan ekonomi global dan perdagangan internasional. Salah satu poin utama dari kesepakatan tersebut adalah peningkatan kerjasama dalam menghadapi tantangan ekonomi global yang terus berkembang. Selain itu, para pemimpin juga membahas upaya untuk mengatasi perubahan iklim dan menciptakan kestabilan finansial global, yang diharapkan dapat memberikan dampak positif bagi pertumbuhan ekonomi dunia dalam jangka panjang.</p>', 'JeTgkGzN2oyw9R8KluE3Sfk5WVk6dAOTD7UZDWDx.jpg', 1, 0, '2024-06-17 20:12:34', '2024-06-17 20:12:34', 5),
(5, 'Vaksin Baru untuk Virus X Memiliki Tingkat Keefektifan Tinggi', 'vaksin-baru-untuk-virus-x', '<p>Tim peneliti medis global telah berhasil mengembangkan vaksin baru yang mampu melawan Virus X dengan tingkat keefektifan yang sangat tinggi. Hasil uji klinis menunjukkan bahwa vaksin ini aman dan efektif dalam melindungi individu dari infeksi yang disebabkan oleh Virus X, membawa harapan baru dalam upaya pemberantasan penyakit menular global. Kehadiran vaksin ini diharapkan dapat mengurangi angka kematian akibat Virus X dan membatasi penyebaran penyakit secara global, dengan upaya untuk memproduksi dan mendistribusikan vaksin ke seluruh penjuru dunia dalam waktu singkat.</p>', 'IloiwyAzWI60pag6lfmjaUdousYnCe23a6K2sxAW.jpg', 2, 0, '2024-06-17 20:14:42', '2024-06-17 20:14:42', 4),
(6, 'Keamanan Siber di Era Digital: Tantangan dan Solusi Terbaru', 'keamanan-siber-di-era-digital', '<p>Dengan meningkatnya ancaman keamanan siber, industri teknologi fokus pada pengembangan solusi terbaru untuk melindungi data sensitif dan infrastruktur penting dari serangan cyber yang semakin canggih. Pendekatan baru termasuk kecerdasan buatan dan blockchain untuk memastikan keamanan digital yang lebih kuat.</p>', 'iizGZJ0lZ3O2qxXTJqfPQZxqIwF61VhklpSRKZjS.jpg', 3, 0, '2024-06-17 20:16:08', '2024-06-17 20:16:08', 5),
(9, 'Prestasi Gemilang di Kejuaraan Dunia: Rekor Baru dan Inspirasi Atlet Muda', 'prestasi-gemilang-di-kejuaraan-dunia', '<p>Kejuaraan dunia terbaru menjadi saksi prestasi gemilang atlet-atlet muda yang berhasil memecahkan rekor dan menginspirasi generasi mendatang dalam dunia olahraga internasional. Dedikasi dan latihan keras mereka membuktikan bahwa mimpi besar dapat tercapai dengan tekad yang kuat dan kerja keras yang tak kenal lelah.</p>', '313NHBcpFSl0tdrqxIN9HKaApF9oKUTukCyrVCqx.jpg', 4, 0, '2024-06-17 20:19:37', '2024-06-17 20:19:37', 4),
(11, 'Munculnya Masakan Berbasis Tanaman: Inovasi dalam Makanan Berkelanjutan', 'munculnya-masakan-berbasis-tanaman', '<p>Dengan meningkatnya kesadaran akan keberlanjutan lingkungan, popularitas masakan berbasis tanaman juga ikut meningkat. Mulai dari pengganti daging yang inovatif hingga penggunaan kreatif bahan berasal dari tanaman, para koki di seluruh dunia sedang mengubah definisi hidangan tradisional dan menawarkan alternatif lezat yang juga bergizi dan ramah lingkungan.</p>', 'D58ONPjd0RkRVgyAtNKtqETZLdBNYdMHpr7yiMfo.jpg', 5, 0, '2024-06-17 20:22:06', '2024-06-17 20:22:06', 4),
(12, 'Kesadaran Kesehatan Mental: Menghapus Stigma dan Mendorong Kesejahteraan', 'kesadaran-kesehatan-mental', '<p>Masyarakat semakin menyadari pentingnya kesehatan mental dan menghilangkan stigma yang melekat pada gangguan mental. Inisiatif yang mempromosikan kesadaran diri, terapi, dan dukungan komunitas bertujuan untuk menciptakan lingkungan yang lebih inklusif dan mendukung bagi individu yang mengalami masalah kesehatan mental.</p>', 'HyFUZP0V2kGtfs7FZRc5JQMnbheqZUTGv2MshbHM.jpg', 6, 0, '2024-06-17 20:23:20', '2024-06-17 20:23:20', 5),
(15, 'Evolusi Virtual Reality: Mengubah Gim dan Pengalaman Interaktif', 'evolusi-virtual-reality-mengubah-gim-dan-pengalaman-interaktif', '<p>Teknologi virtual reality (VR) terus memperluas batas dalam gim dan hiburan interaktif, menawarkan pengalaman yang imersif yang mengaburkan batas antara realitas dan fantasi digital. Dari simulasi realistis hingga aplikasi pendidikan, VR sedang membentuk masa depan hiburan dengan cara yang belum pernah terjadi sebelumnya.</p>', 'VbdIHdetkMoPWmTECXeCvg0NqeAGDexZOFXffYHA.jpg', 7, 2, '2024-06-17 20:28:24', '2024-06-17 22:47:42', 4),
(17, 'Pemilu dan Proses Demokratis: Memastikan Keadilan dan Transparansi', 'pemilu-dan-proses-demokratis-memastikan-keadilan-dan-transparansi', '<p>Pemilu merupakan pijakan utama dalam tata kelola demokrasi, memastikan bahwa warga memiliki suara dalam menentukan masa depan negara mereka. Upaya untuk meningkatkan integritas pemilu, mempromosikan pendidikan pemilih, dan mengatasi misinformasi sangat penting untuk menjaga prinsip demokrasi dan mempertahankan kepercayaan publik terhadap proses pemilu.</p>', '8zfthzzjxPRQJhwyU8PKPx2ETcYVdAVeuyZmMH99.jpg', 8, 21, '2024-06-17 20:35:08', '2024-06-19 22:51:39', 4),
(18, 'Masa Depan Kerja: Merangkul Model Kerja Jarak Jauh dan Hibrida', 'masa-depan-kerja-merangkul-model-kerja-jarak-jauh-dan-hibrida', '<p>Pandemi COVID-19 mempercepat adopsi kerja jarak jauh, mendorong bisnis untuk memikir ulang setup kantor tradisional dan menerima pola kerja yang fleksibel. Model hibrida yang menggabungkan kerja jarak jauh dan di kantor sedang mengubah lanskap tempat kerja dan menawarkan peluang baru untuk produktivitas dan keseimbangan kerja-hidup.</p>', 'argMWUoaDRldZ2FGhJ3up4qaw4aopQIJjkB3FCpy.jpg', 9, 10, '2024-06-17 20:36:20', '2024-06-19 22:38:21', 5),
(21, 'Back to Basic: Fenomena Klasik JDM di Industri Otomotif Modern', 'back-to-basic-fenomena-klasik-jdm-di-industri-otomotif-modern', '<p>Industri otomotif selalu dipenuhi dengan inovasi dan evolusi teknologi, tetapi pesona mobil klasik dari Jepang yang dikenal sebagai JDM (Japanese Domestic Market) kembali memikat hati para penggemar otomotif di seluruh dunia. Mobil-mobil legendaris seperti Toyota Supra, Nissan Skyline GT-R, dan Honda NSX telah menjadi ikon dalam budaya otomotif global. Dikenal dengan desain yang ikonik, performa yang mengagumkan, dan keandalan yang luar biasa, fenomena JDM menunjukkan bahwa kecantikan sejati dan keunggulan teknik bisa bersatu dalam satu paket yang memikat.</p>', 'M6T6jdRW4FpGurM548dCTP5GvcWR8xzYMv0C95ix.jpg', 10, 23, '2024-06-17 20:41:21', '2024-06-19 23:37:02', 4);

-- --------------------------------------------------------

--
-- Table structure for table `failed_jobs`
--

CREATE TABLE `failed_jobs` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `uuid` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `connection` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `queue` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `payload` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `exception` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `failed_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `kategori`
--

CREATE TABLE `kategori` (
  `id_kategori` int(11) NOT NULL,
  `nama_kategori` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `kategori`
--

INSERT INTO `kategori` (`id_kategori`, `nama_kategori`, `created_at`, `updated_at`) VALUES
(1, 'Internasional', '2024-06-17 19:30:14', '2024-06-17 19:30:14'),
(2, 'Sains', '2024-06-17 19:30:24', '2024-06-17 19:30:24'),
(3, 'Teknologi', '2024-06-17 19:30:31', '2024-06-17 19:30:31'),
(4, 'Olahraga', '2024-06-17 19:30:37', '2024-06-17 19:30:37'),
(5, 'Kuliner', '2024-06-17 19:31:04', '2024-06-17 19:37:47'),
(6, 'Kesehatan', '2024-06-17 19:32:03', '2024-06-17 19:32:03'),
(7, 'Hiburan', '2024-06-17 19:32:17', '2024-06-17 19:32:17'),
(8, 'Politik', '2024-06-17 19:32:33', '2024-06-17 19:32:33'),
(9, 'Bisnis', '2024-06-17 19:33:16', '2024-06-17 19:33:16'),
(10, 'Otomotif', '2024-06-17 19:33:28', '2024-06-17 19:33:28');

-- --------------------------------------------------------

--
-- Table structure for table `komentar`
--

CREATE TABLE `komentar` (
  `id_komentar` bigint(20) UNSIGNED NOT NULL,
  `isi` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `id_user` int(11) NOT NULL,
  `id_berita` int(11) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `comment_id` bigint(20) UNSIGNED DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `komentar`
--

INSERT INTO `komentar` (`id_komentar`, `isi`, `id_user`, `id_berita`, `created_at`, `updated_at`, `comment_id`) VALUES
(52, 'Test komentar', 4, 21, '2024-06-19 08:22:31', '2024-06-19 08:22:31', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `menu`
--

CREATE TABLE `menu` (
  `id_menu` int(11) NOT NULL,
  `nama_menu` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `jenis_menu` enum('url','page') COLLATE utf8mb4_unicode_ci NOT NULL,
  `link_menu` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `target_menu` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `urutan_menu` int(11) NOT NULL,
  `parent_menu` int(11) DEFAULT NULL,
  `status_menu` tinyint(1) NOT NULL DEFAULT 1,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `menu`
--

INSERT INTO `menu` (`id_menu`, `nama_menu`, `jenis_menu`, `link_menu`, `target_menu`, `urutan_menu`, `parent_menu`, `status_menu`, `created_at`, `updated_at`) VALUES
(1, 'Internasional', 'url', 'internasional', '_self', 1, NULL, 1, '2024-06-17 19:41:01', '2024-06-17 19:41:01'),
(2, 'Sains', 'url', 'sains', '_self', 2, NULL, 1, '2024-06-17 19:41:20', '2024-06-17 19:41:20'),
(3, 'Teknologi', 'url', 'teknologi', '_self', 3, NULL, 1, '2024-06-17 19:41:35', '2024-06-17 19:41:35'),
(4, 'Olahraga', 'url', 'olahraga', '_self', 4, NULL, 1, '2024-06-17 19:41:50', '2024-06-17 19:41:59'),
(5, 'Kuliner', 'url', 'kuliner', '_self', 5, NULL, 1, '2024-06-17 19:42:14', '2024-06-17 19:42:14'),
(6, 'Kesehatan', 'url', 'kesehatan', '_self', 6, NULL, 1, '2024-06-17 19:42:40', '2024-06-17 19:46:04'),
(7, 'Hiburan', 'url', 'hiburan', '_self', 7, NULL, 1, '2024-06-17 19:42:51', '2024-06-17 19:42:51'),
(8, 'Politik', 'url', 'politik', '_self', 8, NULL, 1, '2024-06-17 19:43:09', '2024-06-17 19:43:09'),
(9, 'Bisnis', 'url', 'bisnis', '_self', 9, NULL, 1, '2024-06-17 19:43:32', '2024-06-17 19:43:32'),
(10, 'Otomotif', 'url', 'otomotif', '_self', 10, NULL, 1, '2024-06-17 19:43:44', '2024-06-17 19:43:44');

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
(4, '2019_12_14_000001_create_personal_access_tokens_table', 1),
(5, '2024_06_04_234306_create_kategori_table', 1),
(6, '2024_06_05_163357_create_berita_table', 1),
(7, '2024_06_08_095855_create_page_table', 1),
(8, '2024_06_08_132524_create_menu_table', 1),
(9, '2024_06_17_091330_modify_berita_table', 1),
(10, '2024_06_18_014247_create_komentar_table', 1),
(11, '2024_06_18_015041_modify_password_length_in_users_table', 1),
(12, '2024_06_18_015758_add_total_views_to_berita_table', 1),
(13, '2024_06_18_020219_add_id_user_to_berita_table', 2),
(14, '2024_06_18_150301_modify_comment_id_field_in_komentar_table', 3);

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
-- Table structure for table `personal_access_tokens`
--

CREATE TABLE `personal_access_tokens` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `tokenable_type` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `tokenable_id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(64) COLLATE utf8mb4_unicode_ci NOT NULL,
  `abilities` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `last_used_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id_user` int(11) NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `role` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `password` varchar(64) COLLATE utf8mb4_unicode_ci NOT NULL,
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id_user`, `name`, `role`, `email`, `email_verified_at`, `password`, `remember_token`, `created_at`, `updated_at`) VALUES
(3, 'Admin', 'admin', 'admin@gmail.com', '2024-06-17 19:29:04', '$2y$10$/V8VPkAsUh92QRLe4ffWlefIjxebvwz63IlS5qbzZ2LgBzTRx5Z/W', 'JUOOBuJDNGl3HMTAV6TRSYKyaqpsKrugPpt1g3QTHRRJnPhdOX5q4QV1scpK', '2024-06-17 19:29:04', '2024-06-19 08:18:33'),
(4, 'Fahry', 'penulis', 'fahry@gmail.com', NULL, '$2y$10$mq8myN6ZA2l7v1RBwNTwLeydnKkYvhR0wUbKWgxhYiOubPiEM0AR.', NULL, '2024-06-17 19:29:40', '2024-06-17 19:29:40'),
(5, 'Rosyid', 'penulis', 'rosyid@gmail.com', NULL, '$2y$10$qym4cpkOHMy.aguPlze1CuOOru4kLRiv9hYNTQ6TZo6IWzFAkFS6.', NULL, '2024-06-17 19:53:37', '2024-06-18 20:36:48');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `berita`
--
ALTER TABLE `berita`
  ADD PRIMARY KEY (`id_berita`),
  ADD UNIQUE KEY `berita_slug_unique` (`slug`),
  ADD KEY `berita_id_kategori_foreign` (`id_kategori`),
  ADD KEY `berita_id_user_foreign` (`id_user`);

--
-- Indexes for table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `failed_jobs_uuid_unique` (`uuid`);

--
-- Indexes for table `kategori`
--
ALTER TABLE `kategori`
  ADD PRIMARY KEY (`id_kategori`);

--
-- Indexes for table `komentar`
--
ALTER TABLE `komentar`
  ADD PRIMARY KEY (`id_komentar`),
  ADD KEY `komentar_id_user_foreign` (`id_user`),
  ADD KEY `komentar_id_berita_foreign` (`id_berita`),
  ADD KEY `komentar_comment_id_foreign` (`comment_id`);

--
-- Indexes for table `menu`
--
ALTER TABLE `menu`
  ADD PRIMARY KEY (`id_menu`);

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
-- Indexes for table `personal_access_tokens`
--
ALTER TABLE `personal_access_tokens`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `personal_access_tokens_token_unique` (`token`),
  ADD KEY `personal_access_tokens_tokenable_type_tokenable_id_index` (`tokenable_type`,`tokenable_id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id_user`),
  ADD UNIQUE KEY `users_email_unique` (`email`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `berita`
--
ALTER TABLE `berita`
  MODIFY `id_berita` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=23;

--
-- AUTO_INCREMENT for table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `kategori`
--
ALTER TABLE `kategori`
  MODIFY `id_kategori` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- AUTO_INCREMENT for table `komentar`
--
ALTER TABLE `komentar`
  MODIFY `id_komentar` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=55;

--
-- AUTO_INCREMENT for table `menu`
--
ALTER TABLE `menu`
  MODIFY `id_menu` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT for table `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;

--
-- AUTO_INCREMENT for table `personal_access_tokens`
--
ALTER TABLE `personal_access_tokens`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id_user` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `berita`
--
ALTER TABLE `berita`
  ADD CONSTRAINT `berita_id_kategori_foreign` FOREIGN KEY (`id_kategori`) REFERENCES `kategori` (`id_kategori`),
  ADD CONSTRAINT `berita_id_user_foreign` FOREIGN KEY (`id_user`) REFERENCES `users` (`id_user`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `komentar`
--
ALTER TABLE `komentar`
  ADD CONSTRAINT `komentar_comment_id_foreign` FOREIGN KEY (`comment_id`) REFERENCES `komentar` (`id_komentar`),
  ADD CONSTRAINT `komentar_id_berita_foreign` FOREIGN KEY (`id_berita`) REFERENCES `berita` (`id_berita`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `komentar_id_user_foreign` FOREIGN KEY (`id_user`) REFERENCES `users` (`id_user`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
