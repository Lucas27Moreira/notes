-- --------------------------------------------------------
-- Servidor:                     127.0.0.1
-- Versão do servidor:           8.0.30 - MySQL Community Server - GPL
-- OS do Servidor:               Win64
-- HeidiSQL Versão:              12.1.0.6537
-- --------------------------------------------------------

/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET NAMES utf8 */;
/*!50503 SET NAMES utf8mb4 */;
/*!40103 SET @OLD_TIME_ZONE=@@TIME_ZONE */;
/*!40103 SET TIME_ZONE='+00:00' */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;
/*!40111 SET @OLD_SQL_NOTES=@@SQL_NOTES, SQL_NOTES=0 */;


-- Copiando estrutura do banco de dados para laravel_notes
CREATE DATABASE IF NOT EXISTS `laravel_notes` /*!40100 DEFAULT CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci */ /*!80016 DEFAULT ENCRYPTION='N' */;
USE `laravel_notes`;

-- Copiando estrutura para tabela laravel_notes.migrations
CREATE TABLE IF NOT EXISTS `migrations` (
  `id` int unsigned NOT NULL AUTO_INCREMENT,
  `migration` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `batch` int NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Copiando dados para a tabela laravel_notes.migrations: ~0 rows (aproximadamente)
INSERT INTO `migrations` (`id`, `migration`, `batch`) VALUES
	(1, '2026_05_27_235527_create_users_table', 1),
	(2, '2026_05_27_235846_create_notes_table', 1);

-- Copiando estrutura para tabela laravel_notes.notes
CREATE TABLE IF NOT EXISTS `notes` (
  `id` bigint unsigned NOT NULL AUTO_INCREMENT,
  `user_id` int DEFAULT NULL,
  `title` varchar(200) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `content` varchar(3000) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=8 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Copiando dados para a tabela laravel_notes.notes: ~4 rows (aproximadamente)
INSERT INTO `notes` (`id`, `user_id`, `title`, `content`, `created_at`, `updated_at`, `deleted_at`) VALUES
	(1, 1, 'titulo 13', 'text conteudo 1333', '2026-05-31 21:33:38', '2026-06-03 03:32:41', NULL),
	(2, 1, 'titulo 2 ', 'conteúdo usuaro 1', '2026-05-31 21:34:11', '2026-05-31 21:34:12', NULL),
	(3, 2, 'titulo 2', 'conteudo usuario 2', '2026-05-31 21:34:37', '2026-05-31 21:34:38', NULL),
	(7, 1, 'lucas moreira', 'lucas moreira lucas moreira', '2026-06-02 03:15:48', '2026-06-02 03:15:48', NULL);

-- Copiando estrutura para tabela laravel_notes.users
CREATE TABLE IF NOT EXISTS `users` (
  `id` bigint unsigned NOT NULL AUTO_INCREMENT,
  `username` varchar(50) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `password` varchar(200) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `last_login` datetime DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Copiando dados para a tabela laravel_notes.users: ~3 rows (aproximadamente)
INSERT INTO `users` (`id`, `username`, `password`, `last_login`, `created_at`, `updated_at`, `deleted_at`) VALUES
	(1, 'user1@gmail.com', '$2y$12$XZP8EWTVvGIQtUzy0uZUnurIeoK834nprMfShjEhsx8N3wVCRaDSy', '2026-06-03 00:23:48', '2026-05-28 03:07:18', '2026-06-03 03:23:48', NULL),
	(2, 'user2@gmail.com', '$2y$12$UkQbNxqZa6OSHXc9Lb3/MOsmkCd6NLk7PEmXSsJwSu/dro/xWSG9G', NULL, '2026-05-28 03:07:18', NULL, NULL),
	(3, 'user3@gmail.com', '$2y$12$8cgZiaVbOw.ahyCnFAR7aeJU.t78fdWGFthidBeM6MN6m0Y3HH6Ke', NULL, '2026-05-28 03:07:19', NULL, NULL);

/*!40103 SET TIME_ZONE=IFNULL(@OLD_TIME_ZONE, 'system') */;
/*!40101 SET SQL_MODE=IFNULL(@OLD_SQL_MODE, '') */;
/*!40014 SET FOREIGN_KEY_CHECKS=IFNULL(@OLD_FOREIGN_KEY_CHECKS, 1) */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40111 SET SQL_NOTES=IFNULL(@OLD_SQL_NOTES, 1) */;
