CREATE TABLE IF NOT EXISTS `cache` (
	`key` varchar(255) NOT NULL,
	`value` text NOT NULL,
	`expiration` int NOT NULL,
	PRIMARY KEY(`key`)
);
CREATE TABLE IF NOT EXISTS `cache_locks` (
	`key` varchar(255) NOT NULL,
	`owner` varchar(255) NOT NULL,
	`expiration` int NOT NULL,
	PRIMARY KEY(`key`)
);
CREATE TABLE IF NOT EXISTS `news` (
	`id` int NOT NULL AUTO_INCREMENT,
	`title` varchar(255) NOT NULL,
	`content` text NOT NULL,
	`category` varchar(255) NOT NULL,
	`image` varchar(255),
	`created_at` datetime,
	`updated_at` datetime,
	PRIMARY KEY(`id`)
);
CREATE TABLE IF NOT EXISTS `users` (
	`id` int NOT NULL AUTO_INCREMENT,
	`name` varchar(255) NOT NULL,
	`email` varchar(255) NOT NULL,
	`email_verified_at` datetime,
	`password` varchar(255) NOT NULL,
	`is_admin` tinyint(1) NOT NULL DEFAULT '0',
	`remember_token` varchar(100),
	`created_at` datetime,
	`updated_at` datetime,
	PRIMARY KEY(`id`)
);
CREATE TABLE IF NOT EXISTS `comments` (
	`id` int NOT NULL AUTO_INCREMENT,
	`user_id` int NOT NULL,
	`news_id` int NOT NULL,
	`comment` text NOT NULL,
	`created_at` datetime,
	`updated_at` datetime,
	PRIMARY KEY(`id`),
	FOREIGN KEY(`news_id`) REFERENCES `news`(`id`) ON DELETE CASCADE,
	FOREIGN KEY(`user_id`) REFERENCES `users`(`id`) ON DELETE CASCADE
);
CREATE TABLE IF NOT EXISTS `failed_jobs` (
	`id` int NOT NULL AUTO_INCREMENT,
	`uuid` varchar(255) NOT NULL,
	`connection` text NOT NULL,
	`queue` text NOT NULL,
	`payload` text NOT NULL,
	`exception` text NOT NULL,
	`failed_at` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
	PRIMARY KEY(`id`)
);
CREATE TABLE IF NOT EXISTS `job_batches` (
	`id` varchar(255) NOT NULL,
	`name` varchar(255) NOT NULL,
	`total_jobs` int NOT NULL,
	`pending_jobs` int NOT NULL,
	`failed_jobs` int NOT NULL,
	`failed_job_ids` text NOT NULL,
	`options` text,
	`cancelled_at` int,
	`created_at` int NOT NULL,
	`finished_at` int,
	PRIMARY KEY(`id`)
);
CREATE TABLE IF NOT EXISTS `jobs` (
	`id` int NOT NULL AUTO_INCREMENT,
	`queue` varchar(255) NOT NULL,
	`payload` text NOT NULL,
	`attempts` int NOT NULL,
	`reserved_at` int,
	`available_at` int NOT NULL,
	`created_at` int NOT NULL,
	PRIMARY KEY(`id`)
);
CREATE TABLE IF NOT EXISTS `migrations` (
	`id` int NOT NULL AUTO_INCREMENT,
	`migration` varchar(255) NOT NULL,
	`batch` int NOT NULL,
	PRIMARY KEY(`id`)
);
CREATE TABLE IF NOT EXISTS `password_reset_tokens` (
	`email` varchar(255) NOT NULL,
	`token` varchar(255) NOT NULL,
	`created_at` datetime,
	PRIMARY KEY(`email`)
);
CREATE TABLE IF NOT EXISTS `sessions` (
	`id` varchar(255) NOT NULL,
	`user_id` int,
	`ip_address` varchar(45),
	`user_agent` text,
	`payload` text NOT NULL,
	`last_activity` int NOT NULL,
	PRIMARY KEY(`id`)
);
-- Tambah data dummy agar foreign key tidak error
INSERT INTO `news` (`id`, `title`, `content`, `category`, `image`, `created_at`, `updated_at`)
VALUES (1, 'Judul Dummy', 'Konten dummy', 'Umum', NULL, NOW(), NOW())
ON DUPLICATE KEY UPDATE id=id;

INSERT INTO `users` (`id`, `name`, `email`, `password`, `is_admin`, `created_at`, `updated_at`)
VALUES (3, 'User Dummy', 'user3@example.com', 'password', 0, NOW(), NOW())
ON DUPLICATE KEY UPDATE id=id;

-- Tambah data dummy agar foreign key tidak error untuk user_id=4
INSERT INTO `users` (`id`, `name`, `email`, `password`, `is_admin`, `created_at`, `updated_at`)
VALUES (4, 'User Dummy 4', 'user4@example.com', 'password', 0, NOW(), NOW())
ON DUPLICATE KEY UPDATE id=id;

INSERT INTO `comments` (`id`,`user_id`,`news_id`,`comment`,`created_at`,`updated_at`) VALUES (1,3,1,'asdasd','2025-06-13 11:35:34','2025-06-13 11:35:34');
INSERT INTO `comments` (`id`,`user_id`,`news_id`,`comment`,`created_at`,`updated_at`) VALUES (2,4,1,'ASDASD','2025-06-13 12:48:44','2025-06-13 12:48:44');
INSERT INTO `migrations` (`id`,`migration`,`batch`) VALUES (22,'0001_01_01_000000_create_users_table',1);
INSERT INTO `migrations` (`id`,`migration`,`batch`) VALUES (23,'0001_01_01_000001_create_cache_table',1);
INSERT INTO `migrations` (`id`,`migration`,`batch`) VALUES (24,'0001_01_01_000002_create_jobs_table',1);
INSERT INTO `migrations` (`id`,`migration`,`batch`) VALUES (25,'2025_06_03_000000_create_news_table',1);
INSERT INTO `migrations` (`id`,`migration`,`batch`) VALUES (26,'2025_06_03_000001_create_comments_table',1);
INSERT INTO `migrations` (`id`,`migration`,`batch`) VALUES (27,'2025_06_13_000002_remove_duplicate_is_admin_column',1);
INSERT INTO `news` (`id`,`title`,`content`,`category`,`image`,`created_at`,`updated_at`) VALUES (1,'Teknologi AI Mengubah Dunia','Artificial Intelligence (AI) kini semakin berkembang dan mulai diterapkan di berbagai bidang kehidupan, mulai dari kesehatan, pendidikan, hingga industri kreatif.','Business','news_images/ai.jpg','2025-06-13 11:13:11','2025-06-13 11:13:11')
ON DUPLICATE KEY UPDATE 
    `title`=VALUES(`title`),
    `content`=VALUES(`content`),
    `category`=VALUES(`category`),
    `image`=VALUES(`image`),
    `created_at`=VALUES(`created_at`),
    `updated_at`=VALUES(`updated_at`);
INSERT INTO `news` (`id`,`title`,`content`,`category`,`image`,`created_at`,`updated_at`) VALUES (2,'Pemilu Damai 2025','Pemilihan umum tahun 2025 berjalan dengan damai dan lancar di seluruh Indonesia, partisipasi masyarakat meningkat signifikan.','Politics','news_images/pemilu.jpg','2025-06-13 11:13:11','2025-06-13 11:13:11')
ON DUPLICATE KEY UPDATE 
    `title`=VALUES(`title`),
    `content`=VALUES(`content`),
    `category`=VALUES(`category`),
    `image`=VALUES(`image`),
    `created_at`=VALUES(`created_at`),
    `updated_at`=VALUES(`updated_at`);
INSERT INTO `news` (`id`,`title`,`content`,`category`,`image`,`created_at`,`updated_at`) VALUES (3,'Film Lokal Raih Penghargaan Internasional','Film karya anak bangsa berhasil meraih penghargaan di festival film internasional, membanggakan Indonesia di kancah dunia.','Entertainment','news_images/film.jpg','2025-06-13 11:13:12','2025-06-13 11:13:12');
INSERT INTO `sessions` (`id`,`user_id`,`ip_address`,`user_agent`,`payload`,`last_activity`) VALUES ('awppEPmaEDqOPiN4vEVnA72SUyxSB1f7epZVqMMo',2,'127.0.0.1','Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/137.0.0.0 Safari/537.36 Edg/137.0.0.0','YTo0OntzOjY6Il90b2tlbiI7czo0MDoiOEszanZZaVNpcFdCTDVnTmVDcWJ0UWppVEszeTU1Nk1VRGZvZjJ6cCI7czo5OiJfcHJldmlvdXMiO2E6MTp7czozOiJ1cmwiO3M6Mjc6Imh0dHA6Ly8xMjcuMC4wLjE6ODAwMC9hZG1pbiI7fXM6NjoiX2ZsYXNoIjthOjI6e3M6Mzoib2xkIjthOjA6e31zOjM6Im5ldyI7YTowOnt9fXM6NTA6ImxvZ2luX3dlYl81OWJhMzZhZGRjMmIyZjk0MDE1ODBmMDE0YzdmNThlYTRlMzA5ODlkIjtpOjI7fQ==',1750673921);
INSERT INTO `users` (`id`,`name`,`email`,`email_verified_at`,`password`,`is_admin`,`remember_token`,`created_at`,`updated_at`) VALUES (1,'Test User','test@example.com','2025-06-13 11:13:11','$2y$12$aDjAfmwq9cxsFHE4IHXBlOwJ/DOCIOnmZ1WEccnVkZL0hJ1sP8WQK',0,'QH4K5GgJX1','2025-06-13 11:13:11','2025-06-13 11:13:11');
INSERT INTO `users` (`id`,`name`,`email`,`email_verified_at`,`password`,`is_admin`,`remember_token`,`created_at`,`updated_at`) VALUES (2,'Admin','admin@example.com',NULL,'$2y$12$lOOhuTHaWelJT4mvYP3z1uTtMBoLY9z6ZHVHUzubaEzESm7yQ9pcq',1,NULL,'2025-06-13 11:13:11','2025-06-13 11:13:11');
INSERT INTO `users` (`id`,`name`,`email`,`email_verified_at`,`password`,`is_admin`,`remember_token`,`created_at`,`updated_at`) VALUES (3,'User','user@example.com',NULL,'$2y$12$4ot0j0WefAWjGJJXispTMumuYAnVmlL9UVVGG37OfQ0fOQS3urLkC',0,NULL,'2025-06-13 11:13:11','2025-06-13 11:13:11')
ON DUPLICATE KEY UPDATE 
    `name`=VALUES(`name`),
    `email`=VALUES(`email`),
    `email_verified_at`=VALUES(`email_verified_at`),
    `password`=VALUES(`password`),
    `is_admin`=VALUES(`is_admin`),
    `remember_token`=VALUES(`remember_token`),
    `created_at`=VALUES(`created_at`),
    `updated_at`=VALUES(`updated_at`);
INSERT INTO `users` (`id`,`name`,`email`,`email_verified_at`,`password`,`is_admin`,`remember_token`,`created_at`,`updated_at`) VALUES (4,'fadel','fadelpriyatnaa@gmail.com',NULL,'$2y$12$r0nU2BMEV5QF4HXw4t8bge022Ep4RUqnK6KkLYeK4XLCqny/alX4S',0,NULL,'2025-06-13 12:12:41','2025-06-13 12:12:41')
ON DUPLICATE KEY UPDATE 
    `name`=VALUES(`name`),
    `email`=VALUES(`email`),
    `email_verified_at`=VALUES(`email_verified_at`),
    `password`=VALUES(`password`),
    `is_admin`=VALUES(`is_admin`),
    `remember_token`=VALUES(`remember_token`),
    `created_at`=VALUES(`created_at`),
    `updated_at`=VALUES(`updated_at`);
CREATE UNIQUE INDEX IF NOT EXISTS `failed_jobs_uuid_unique` ON `failed_jobs` (
	`uuid`
);
CREATE INDEX IF NOT EXISTS `jobs_queue_index` ON `jobs` (
	`queue`
);
CREATE INDEX IF NOT EXISTS `sessions_last_activity_index` ON `sessions` (
	`last_activity`
);
CREATE INDEX IF NOT EXISTS `sessions_user_id_index` ON `sessions` (
	`user_id`
);
CREATE UNIQUE INDEX IF NOT EXISTS `users_email_unique` ON `users` (
	`email`
);
