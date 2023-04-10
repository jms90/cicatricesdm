/*
 Navicat Premium Data Transfer

 Source Server         : local
 Source Server Type    : MySQL
 Source Server Version : 100424
 Source Host           : localhost:3306
 Source Schema         : cicatricesdm

 Target Server Type    : MySQL
 Target Server Version : 100424
 File Encoding         : 65001

 Date: 10/04/2023 21:42:55
*/

SET NAMES utf8mb4;
SET FOREIGN_KEY_CHECKS = 0;

-- ----------------------------
-- Table structure for armaduras
-- ----------------------------
DROP TABLE IF EXISTS `armaduras`;
CREATE TABLE `armaduras`  (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `nombre` varchar(150) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `proteccion` int(10) NOT NULL,
  `estorbo` int(10) NULL DEFAULT NULL,
  `tipo_id` int(11) NULL DEFAULT NULL,
  `precio` decimal(16, 2) NULL DEFAULT NULL,
  `created_at` timestamp(0) NULL DEFAULT NULL,
  `updated_at` timestamp(0) NULL DEFAULT NULL,
  `deleted_at` timestamp(0) NULL DEFAULT NULL,
  `descripcion` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NULL DEFAULT NULL,
  PRIMARY KEY (`id`) USING BTREE
) ENGINE = InnoDB AUTO_INCREMENT = 4 CHARACTER SET = utf8mb4 COLLATE = utf8mb4_general_ci ROW_FORMAT = Dynamic;

-- ----------------------------
-- Records of armaduras
-- ----------------------------
INSERT INTO `armaduras` VALUES (1, 'Abrigo de cuero', 2, 2, 1, 50.00, '2023-04-06 20:15:43', '2023-04-06 20:16:25', NULL, NULL);
INSERT INTO `armaduras` VALUES (2, 'Abrigo de pieles', 1, 2, 1, 8.00, '2023-04-06 20:16:15', '2023-04-06 20:16:15', NULL, NULL);
INSERT INTO `armaduras` VALUES (3, 'Abrigo de pieles completo', 1, 2, 1, 14.00, '2023-04-06 20:17:08', '2023-04-06 20:17:08', NULL, NULL);

-- ----------------------------
-- Table structure for armaduras_lugares_cuerpo
-- ----------------------------
DROP TABLE IF EXISTS `armaduras_lugares_cuerpo`;
CREATE TABLE `armaduras_lugares_cuerpo`  (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `lugar_id` int(11) NOT NULL,
  `armadura_id` int(11) NOT NULL,
  `created_at` timestamp(0) NULL DEFAULT NULL,
  `updated_at` timestamp(0) NULL DEFAULT NULL,
  `deleted_at` timestamp(0) NULL DEFAULT NULL,
  PRIMARY KEY (`id`) USING BTREE
) ENGINE = InnoDB AUTO_INCREMENT = 7 CHARACTER SET = utf8mb4 COLLATE = utf8mb4_general_ci ROW_FORMAT = Dynamic;

-- ----------------------------
-- Records of armaduras_lugares_cuerpo
-- ----------------------------
INSERT INTO `armaduras_lugares_cuerpo` VALUES (1, 1, 1, NULL, NULL, NULL);
INSERT INTO `armaduras_lugares_cuerpo` VALUES (2, 3, 1, NULL, NULL, NULL);
INSERT INTO `armaduras_lugares_cuerpo` VALUES (3, 4, 1, NULL, NULL, NULL);
INSERT INTO `armaduras_lugares_cuerpo` VALUES (4, 1, 2, NULL, NULL, NULL);
INSERT INTO `armaduras_lugares_cuerpo` VALUES (5, 3, 2, NULL, NULL, NULL);
INSERT INTO `armaduras_lugares_cuerpo` VALUES (6, 3, 3, NULL, NULL, NULL);

-- ----------------------------
-- Table structure for armaduras_propiedades
-- ----------------------------
DROP TABLE IF EXISTS `armaduras_propiedades`;
CREATE TABLE `armaduras_propiedades`  (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `propiedad_id` int(11) NOT NULL,
  `armadura_id` int(11) NOT NULL,
  PRIMARY KEY (`id`) USING BTREE
) ENGINE = InnoDB AUTO_INCREMENT = 1 CHARACTER SET = utf8mb4 COLLATE = utf8mb4_general_ci ROW_FORMAT = Dynamic;

-- ----------------------------
-- Records of armaduras_propiedades
-- ----------------------------

-- ----------------------------
-- Table structure for armas
-- ----------------------------
DROP TABLE IF EXISTS `armas`;
CREATE TABLE `armas`  (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `nombre` varchar(150) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `danio` int(10) NOT NULL,
  `estorbo` int(10) NULL DEFAULT NULL,
  `tipo_id` int(11) NULL DEFAULT NULL,
  `precio` decimal(16, 2) NULL DEFAULT NULL,
  `alcance_max` int(10) NULL DEFAULT NULL,
  `alcance_min` int(10) NULL DEFAULT NULL,
  `created_at` timestamp(0) NULL DEFAULT NULL,
  `updated_at` timestamp(0) NULL DEFAULT NULL,
  `deleted_at` timestamp(0) NULL DEFAULT NULL,
  `descripcion` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NULL DEFAULT NULL,
  PRIMARY KEY (`id`) USING BTREE
) ENGINE = InnoDB AUTO_INCREMENT = 3 CHARACTER SET = utf8mb4 COLLATE = utf8mb4_general_ci ROW_FORMAT = Dynamic;

-- ----------------------------
-- Records of armas
-- ----------------------------
INSERT INTO `armas` VALUES (1, 'Alabarda', 4, 4, 5, 170.00, NULL, NULL, '2023-04-06 20:26:42', '2023-04-06 20:26:42', NULL, NULL);
INSERT INTO `armas` VALUES (2, 'Alabarda mas larga', 7, 5, 5, 120.00, 0, 0, '2023-04-08 18:49:48', '2023-04-08 18:49:48', NULL, 'asdasdasd');

-- ----------------------------
-- Table structure for armas_propiedades
-- ----------------------------
DROP TABLE IF EXISTS `armas_propiedades`;
CREATE TABLE `armas_propiedades`  (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `propiedad_id` int(11) NOT NULL,
  `arma_id` int(11) NOT NULL,
  PRIMARY KEY (`id`) USING BTREE
) ENGINE = InnoDB AUTO_INCREMENT = 6 CHARACTER SET = utf8mb4 COLLATE = utf8mb4_general_ci ROW_FORMAT = Dynamic;

-- ----------------------------
-- Records of armas_propiedades
-- ----------------------------
INSERT INTO `armas_propiedades` VALUES (1, 4, 1);
INSERT INTO `armas_propiedades` VALUES (2, 6, 1);
INSERT INTO `armas_propiedades` VALUES (3, 4, 2);
INSERT INTO `armas_propiedades` VALUES (4, 5, 2);
INSERT INTO `armas_propiedades` VALUES (5, 6, 2);

-- ----------------------------
-- Table structure for ascendencias
-- ----------------------------
DROP TABLE IF EXISTS `ascendencias`;
CREATE TABLE `ascendencias`  (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `nombre` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `created_at` timestamp(0) NULL DEFAULT NULL,
  `updated_at` timestamp(0) NULL DEFAULT NULL,
  `deleted_at` timestamp(0) NULL DEFAULT NULL,
  `descripcion` longtext CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NULL,
  `dominante_id` int(11) NULL DEFAULT NULL,
  `secundaria_id` int(11) NULL DEFAULT NULL,
  PRIMARY KEY (`id`) USING BTREE
) ENGINE = InnoDB AUTO_INCREMENT = 2 CHARACTER SET = utf8mb4 COLLATE = utf8mb4_general_ci ROW_FORMAT = Dynamic;

-- ----------------------------
-- Records of ascendencias
-- ----------------------------
INSERT INTO `ascendencias` VALUES (1, 'TEST1', '2023-04-09 17:02:31', '2023-04-09 17:03:55', NULL, 'asdasda1', NULL, 2);

-- ----------------------------
-- Table structure for atributos
-- ----------------------------
DROP TABLE IF EXISTS `atributos`;
CREATE TABLE `atributos`  (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `nombre` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `created_at` timestamp(0) NULL DEFAULT NULL,
  `updated_at` timestamp(0) NULL DEFAULT NULL,
  `deleted_at` timestamp(0) NULL DEFAULT NULL,
  `descripcion` longtext CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NULL,
  PRIMARY KEY (`id`) USING BTREE
) ENGINE = InnoDB AUTO_INCREMENT = 7 CHARACTER SET = utf8mb4 COLLATE = utf8mb4_general_ci ROW_FORMAT = Dynamic;

-- ----------------------------
-- Records of atributos
-- ----------------------------
INSERT INTO `atributos` VALUES (1, 'Fisicos', '2023-04-09 22:16:26', NULL, NULL, NULL);
INSERT INTO `atributos` VALUES (2, 'Mentales', '2023-04-09 22:16:26', NULL, NULL, NULL);
INSERT INTO `atributos` VALUES (3, 'Habilidades', '2023-04-09 22:16:26', NULL, NULL, NULL);
INSERT INTO `atributos` VALUES (4, 'Maestrias', '2023-04-09 22:16:26', NULL, NULL, NULL);
INSERT INTO `atributos` VALUES (5, 'Talentos', '2023-04-09 22:16:26', NULL, NULL, NULL);
INSERT INTO `atributos` VALUES (6, 'PV', '2023-04-09 22:16:26', NULL, NULL, NULL);

-- ----------------------------
-- Table structure for atributos_clases
-- ----------------------------
DROP TABLE IF EXISTS `atributos_clases`;
CREATE TABLE `atributos_clases`  (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `atributo_id` int(11) NOT NULL,
  `clase_id` int(11) NULL DEFAULT NULL,
  `created_at` timestamp(0) NULL DEFAULT NULL,
  `updated_at` timestamp(0) NULL DEFAULT NULL,
  `deleted_at` timestamp(0) NULL DEFAULT NULL,
  `nivel` int(1) NULL DEFAULT NULL,
  `cantidad_nivel` int(10) NULL DEFAULT NULL,
  PRIMARY KEY (`id`) USING BTREE
) ENGINE = InnoDB AUTO_INCREMENT = 1 CHARACTER SET = utf8mb4 COLLATE = utf8mb4_general_ci ROW_FORMAT = Dynamic;

-- ----------------------------
-- Records of atributos_clases
-- ----------------------------

-- ----------------------------
-- Table structure for bendiciones
-- ----------------------------
DROP TABLE IF EXISTS `bendiciones`;
CREATE TABLE `bendiciones`  (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `nombre` varchar(150) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `dificultad` int(10) NOT NULL,
  `objetivo` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NULL DEFAULT NULL,
  `coste` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NULL DEFAULT NULL,
  `duracion` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NULL DEFAULT NULL,
  `created_at` timestamp(0) NULL DEFAULT NULL,
  `updated_at` timestamp(0) NULL DEFAULT NULL,
  `deleted_at` timestamp(0) NULL DEFAULT NULL,
  `descripcion` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NULL DEFAULT NULL,
  `critico` longtext CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NULL,
  PRIMARY KEY (`id`) USING BTREE
) ENGINE = InnoDB AUTO_INCREMENT = 3 CHARACTER SET = utf8mb4 COLLATE = utf8mb4_general_ci ROW_FORMAT = Dynamic;

-- ----------------------------
-- Records of bendiciones
-- ----------------------------
INSERT INTO `bendiciones` VALUES (1, 'Pues algo', 6, 'Pues algún objetivo', 'Acción', NULL, '2023-04-08 17:40:12', '2023-04-08 17:40:12', NULL, 'asdasdasdasdasd', 'dasdasdasdasddasdasdasdasddasdasdasdasddasdasdasdasd');
INSERT INTO `bendiciones` VALUES (2, 'adasdasd', 1, '2313asdasda', '12', NULL, '2023-04-08 17:45:54', '2023-04-08 17:45:54', NULL, '123123123', '123123123123123123123123123123123123123123123123123123');

-- ----------------------------
-- Table structure for bendiciones_dioses
-- ----------------------------
DROP TABLE IF EXISTS `bendiciones_dioses`;
CREATE TABLE `bendiciones_dioses`  (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `dios_id` int(11) NOT NULL,
  `bendicion_id` int(11) NOT NULL,
  PRIMARY KEY (`id`) USING BTREE
) ENGINE = InnoDB AUTO_INCREMENT = 5 CHARACTER SET = utf8mb4 COLLATE = utf8mb4_general_ci ROW_FORMAT = Dynamic;

-- ----------------------------
-- Records of bendiciones_dioses
-- ----------------------------
INSERT INTO `bendiciones_dioses` VALUES (1, 1, 1);
INSERT INTO `bendiciones_dioses` VALUES (2, 2, 1);
INSERT INTO `bendiciones_dioses` VALUES (3, 1, 2);

-- ----------------------------
-- Table structure for clases
-- ----------------------------
DROP TABLE IF EXISTS `clases`;
CREATE TABLE `clases`  (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `nombre` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `created_at` timestamp(0) NULL DEFAULT NULL,
  `updated_at` timestamp(0) NULL DEFAULT NULL,
  `deleted_at` timestamp(0) NULL DEFAULT NULL,
  `descripcion` longtext CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NULL,
  `talento_id` int(11) NULL DEFAULT NULL,
  PRIMARY KEY (`id`) USING BTREE
) ENGINE = InnoDB AUTO_INCREMENT = 1 CHARACTER SET = utf8mb4 COLLATE = utf8mb4_general_ci ROW_FORMAT = Dynamic;

-- ----------------------------
-- Records of clases
-- ----------------------------

-- ----------------------------
-- Table structure for clases_petrechos
-- ----------------------------
DROP TABLE IF EXISTS `clases_petrechos`;
CREATE TABLE `clases_petrechos`  (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `petrecho_id` int(11) NOT NULL,
  `clase_id` int(11) NULL DEFAULT NULL,
  `created_at` timestamp(0) NULL DEFAULT NULL,
  `updated_at` timestamp(0) NULL DEFAULT NULL,
  `deleted_at` timestamp(0) NULL DEFAULT NULL,
  `cantidad` decimal(16, 2) NULL DEFAULT NULL,
  PRIMARY KEY (`id`) USING BTREE
) ENGINE = InnoDB AUTO_INCREMENT = 1 CHARACTER SET = utf8mb4 COLLATE = utf8mb4_general_ci ROW_FORMAT = Dynamic;

-- ----------------------------
-- Records of clases_petrechos
-- ----------------------------

-- ----------------------------
-- Table structure for dioses
-- ----------------------------
DROP TABLE IF EXISTS `dioses`;
CREATE TABLE `dioses`  (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `nombre` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `created_at` timestamp(0) NULL DEFAULT NULL,
  `updated_at` timestamp(0) NULL DEFAULT NULL,
  `deleted_at` timestamp(0) NULL DEFAULT NULL,
  `descripcion` longtext CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NULL,
  PRIMARY KEY (`id`) USING BTREE
) ENGINE = InnoDB AUTO_INCREMENT = 3 CHARACTER SET = utf8mb4 COLLATE = utf8mb4_general_ci ROW_FORMAT = Dynamic;

-- ----------------------------
-- Records of dioses
-- ----------------------------
INSERT INTO `dioses` VALUES (1, 'Therem', '2023-04-08 17:38:10', '2023-04-08 17:38:10', NULL, NULL);
INSERT INTO `dioses` VALUES (2, 'El vacio', '2023-04-08 17:39:40', '2023-04-08 17:39:40', NULL, NULL);

-- ----------------------------
-- Table structure for escuelas_magias
-- ----------------------------
DROP TABLE IF EXISTS `escuelas_magias`;
CREATE TABLE `escuelas_magias`  (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `nombre` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NULL DEFAULT NULL,
  `created_at` timestamp(0) NULL DEFAULT NULL,
  `updated_at` timestamp(0) NULL DEFAULT NULL,
  `deleted_at` timestamp(0) NULL DEFAULT NULL,
  PRIMARY KEY (`id`) USING BTREE
) ENGINE = InnoDB AUTO_INCREMENT = 4 CHARACTER SET = utf8mb4 COLLATE = utf8mb4_general_ci ROW_FORMAT = Dynamic;

-- ----------------------------
-- Records of escuelas_magias
-- ----------------------------
INSERT INTO `escuelas_magias` VALUES (1, 'Geomancia', '2023-04-07 09:27:04', '2023-04-07 09:27:10', NULL);
INSERT INTO `escuelas_magias` VALUES (2, 'Arcana', '2023-04-07 09:27:17', '2023-04-07 09:27:17', NULL);
INSERT INTO `escuelas_magias` VALUES (3, 'Druidica', '2023-04-07 09:27:21', '2023-04-07 09:28:05', NULL);

-- ----------------------------
-- Table structure for failed_jobs
-- ----------------------------
DROP TABLE IF EXISTS `failed_jobs`;
CREATE TABLE `failed_jobs`  (
  `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT,
  `uuid` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `connection` text CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `queue` text CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `payload` longtext CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `exception` longtext CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `failed_at` timestamp(0) NOT NULL DEFAULT current_timestamp(0),
  PRIMARY KEY (`id`) USING BTREE,
  UNIQUE INDEX `failed_jobs_uuid_unique`(`uuid`) USING BTREE
) ENGINE = InnoDB AUTO_INCREMENT = 1 CHARACTER SET = utf8mb4 COLLATE = utf8mb4_unicode_ci ROW_FORMAT = Dynamic;

-- ----------------------------
-- Records of failed_jobs
-- ----------------------------

-- ----------------------------
-- Table structure for lugares_cuerpo
-- ----------------------------
DROP TABLE IF EXISTS `lugares_cuerpo`;
CREATE TABLE `lugares_cuerpo`  (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `nombre` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NULL DEFAULT NULL,
  `created_at` timestamp(0) NULL DEFAULT NULL,
  `updated_at` timestamp(0) NULL DEFAULT NULL,
  `deleted_at` timestamp(0) NULL DEFAULT NULL,
  PRIMARY KEY (`id`) USING BTREE
) ENGINE = InnoDB AUTO_INCREMENT = 5 CHARACTER SET = utf8mb4 COLLATE = utf8mb4_general_ci ROW_FORMAT = Dynamic;

-- ----------------------------
-- Records of lugares_cuerpo
-- ----------------------------
INSERT INTO `lugares_cuerpo` VALUES (1, 'Brazos', '2023-04-06 11:56:51', '2023-04-06 11:57:29', NULL);
INSERT INTO `lugares_cuerpo` VALUES (2, 'Cabeza', '2023-04-06 11:57:34', '2023-04-06 11:57:34', NULL);
INSERT INTO `lugares_cuerpo` VALUES (3, 'Cuerpo', '2023-04-06 11:57:39', '2023-04-06 11:57:39', NULL);
INSERT INTO `lugares_cuerpo` VALUES (4, 'Piernas', '2023-04-06 11:57:56', '2023-04-06 11:57:56', NULL);

-- ----------------------------
-- Table structure for magias
-- ----------------------------
DROP TABLE IF EXISTS `magias`;
CREATE TABLE `magias`  (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `nombre` varchar(150) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `escuela_id` int(10) NOT NULL,
  `nivel` int(10) NULL DEFAULT NULL,
  `objetivo` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NULL DEFAULT NULL,
  `coste` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NULL DEFAULT NULL,
  `duracion` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NULL DEFAULT NULL,
  `requisitos` longtext CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NULL,
  `created_at` timestamp(0) NULL DEFAULT NULL,
  `updated_at` timestamp(0) NULL DEFAULT NULL,
  `deleted_at` timestamp(0) NULL DEFAULT NULL,
  `descripcion` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NULL DEFAULT NULL,
  `critico` longtext CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NULL,
  PRIMARY KEY (`id`) USING BTREE
) ENGINE = InnoDB AUTO_INCREMENT = 3 CHARACTER SET = utf8mb4 COLLATE = utf8mb4_general_ci ROW_FORMAT = Dynamic;

-- ----------------------------
-- Records of magias
-- ----------------------------
INSERT INTO `magias` VALUES (1, 'asdasdasd', 1, 1, '123', '123123', '123123123123', '123123123', '2023-04-07 10:26:48', '2023-04-07 10:29:59', '2023-04-07 10:29:59', '123123', '123123123');
INSERT INTO `magias` VALUES (2, '11111111', 1, 22222222, '333333333', '44444444', '55555555', '6666666666', '2023-04-07 10:30:10', '2023-04-07 10:32:20', NULL, '77777777', '888888888');

-- ----------------------------
-- Table structure for migrations
-- ----------------------------
DROP TABLE IF EXISTS `migrations`;
CREATE TABLE `migrations`  (
  `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT,
  `migration` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `batch` int(11) NOT NULL,
  PRIMARY KEY (`id`) USING BTREE
) ENGINE = InnoDB AUTO_INCREMENT = 7 CHARACTER SET = utf8mb4 COLLATE = utf8mb4_unicode_ci ROW_FORMAT = Dynamic;

-- ----------------------------
-- Records of migrations
-- ----------------------------
INSERT INTO `migrations` VALUES (1, '2014_10_12_000000_create_users_table', 1);
INSERT INTO `migrations` VALUES (2, '2014_10_12_100000_create_password_reset_tokens_table', 1);
INSERT INTO `migrations` VALUES (3, '2019_08_19_000000_create_failed_jobs_table', 1);
INSERT INTO `migrations` VALUES (4, '2019_12_14_000001_create_personal_access_tokens_table', 1);
INSERT INTO `migrations` VALUES (5, '2014_10_12_100000_create_password_resets_table', 2);
INSERT INTO `migrations` VALUES (6, '2023_04_03_123041_laratrust_setup_tables', 3);

-- ----------------------------
-- Table structure for password_reset_tokens
-- ----------------------------
DROP TABLE IF EXISTS `password_reset_tokens`;
CREATE TABLE `password_reset_tokens`  (
  `email` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp(0) NULL DEFAULT NULL,
  PRIMARY KEY (`email`) USING BTREE
) ENGINE = InnoDB CHARACTER SET = utf8mb4 COLLATE = utf8mb4_unicode_ci ROW_FORMAT = Dynamic;

-- ----------------------------
-- Records of password_reset_tokens
-- ----------------------------

-- ----------------------------
-- Table structure for password_resets
-- ----------------------------
DROP TABLE IF EXISTS `password_resets`;
CREATE TABLE `password_resets`  (
  `email` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp(0) NULL DEFAULT NULL,
  INDEX `password_resets_email_index`(`email`) USING BTREE
) ENGINE = InnoDB CHARACTER SET = utf8mb4 COLLATE = utf8mb4_unicode_ci ROW_FORMAT = Dynamic;

-- ----------------------------
-- Records of password_resets
-- ----------------------------

-- ----------------------------
-- Table structure for permission_role
-- ----------------------------
DROP TABLE IF EXISTS `permission_role`;
CREATE TABLE `permission_role`  (
  `permission_id` bigint(20) UNSIGNED NOT NULL,
  `role_id` bigint(20) UNSIGNED NOT NULL,
  PRIMARY KEY (`permission_id`, `role_id`) USING BTREE,
  INDEX `permission_role_role_id_foreign`(`role_id`) USING BTREE,
  CONSTRAINT `permission_role_permission_id_foreign` FOREIGN KEY (`permission_id`) REFERENCES `permissions` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  CONSTRAINT `permission_role_role_id_foreign` FOREIGN KEY (`role_id`) REFERENCES `roles` (`id`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE = InnoDB CHARACTER SET = utf8mb4 COLLATE = utf8mb4_unicode_ci ROW_FORMAT = Dynamic;

-- ----------------------------
-- Records of permission_role
-- ----------------------------
INSERT INTO `permission_role` VALUES (1, 1);
INSERT INTO `permission_role` VALUES (2, 1);
INSERT INTO `permission_role` VALUES (3, 1);
INSERT INTO `permission_role` VALUES (4, 1);
INSERT INTO `permission_role` VALUES (5, 1);
INSERT INTO `permission_role` VALUES (8, 1);
INSERT INTO `permission_role` VALUES (9, 1);
INSERT INTO `permission_role` VALUES (10, 1);
INSERT INTO `permission_role` VALUES (11, 1);
INSERT INTO `permission_role` VALUES (12, 1);
INSERT INTO `permission_role` VALUES (13, 1);
INSERT INTO `permission_role` VALUES (14, 1);
INSERT INTO `permission_role` VALUES (15, 1);
INSERT INTO `permission_role` VALUES (16, 1);
INSERT INTO `permission_role` VALUES (17, 1);
INSERT INTO `permission_role` VALUES (18, 1);
INSERT INTO `permission_role` VALUES (19, 1);
INSERT INTO `permission_role` VALUES (20, 1);
INSERT INTO `permission_role` VALUES (21, 1);
INSERT INTO `permission_role` VALUES (22, 1);
INSERT INTO `permission_role` VALUES (23, 1);
INSERT INTO `permission_role` VALUES (24, 1);
INSERT INTO `permission_role` VALUES (25, 1);
INSERT INTO `permission_role` VALUES (26, 1);
INSERT INTO `permission_role` VALUES (27, 1);
INSERT INTO `permission_role` VALUES (28, 1);
INSERT INTO `permission_role` VALUES (29, 1);
INSERT INTO `permission_role` VALUES (30, 1);
INSERT INTO `permission_role` VALUES (31, 1);
INSERT INTO `permission_role` VALUES (32, 1);
INSERT INTO `permission_role` VALUES (33, 1);
INSERT INTO `permission_role` VALUES (34, 1);
INSERT INTO `permission_role` VALUES (35, 1);
INSERT INTO `permission_role` VALUES (36, 1);
INSERT INTO `permission_role` VALUES (37, 1);
INSERT INTO `permission_role` VALUES (38, 1);
INSERT INTO `permission_role` VALUES (39, 1);
INSERT INTO `permission_role` VALUES (40, 1);
INSERT INTO `permission_role` VALUES (41, 1);
INSERT INTO `permission_role` VALUES (42, 1);
INSERT INTO `permission_role` VALUES (43, 1);
INSERT INTO `permission_role` VALUES (44, 1);
INSERT INTO `permission_role` VALUES (45, 1);
INSERT INTO `permission_role` VALUES (46, 1);
INSERT INTO `permission_role` VALUES (48, 1);
INSERT INTO `permission_role` VALUES (49, 1);
INSERT INTO `permission_role` VALUES (50, 1);
INSERT INTO `permission_role` VALUES (51, 1);
INSERT INTO `permission_role` VALUES (52, 1);
INSERT INTO `permission_role` VALUES (53, 1);
INSERT INTO `permission_role` VALUES (54, 1);
INSERT INTO `permission_role` VALUES (55, 1);

-- ----------------------------
-- Table structure for permission_user
-- ----------------------------
DROP TABLE IF EXISTS `permission_user`;
CREATE TABLE `permission_user`  (
  `permission_id` bigint(20) UNSIGNED NOT NULL,
  `user_id` bigint(20) UNSIGNED NOT NULL,
  `user_type` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  PRIMARY KEY (`user_id`, `permission_id`, `user_type`) USING BTREE,
  INDEX `permission_user_permission_id_foreign`(`permission_id`) USING BTREE,
  CONSTRAINT `permission_user_permission_id_foreign` FOREIGN KEY (`permission_id`) REFERENCES `permissions` (`id`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE = InnoDB CHARACTER SET = utf8mb4 COLLATE = utf8mb4_unicode_ci ROW_FORMAT = Dynamic;

-- ----------------------------
-- Records of permission_user
-- ----------------------------
INSERT INTO `permission_user` VALUES (1, 1, 'App\\Models\\User');
INSERT INTO `permission_user` VALUES (1, 2, 'App\\Models\\User');
INSERT INTO `permission_user` VALUES (2, 2, 'App\\Models\\User');
INSERT INTO `permission_user` VALUES (3, 2, 'App\\Models\\User');
INSERT INTO `permission_user` VALUES (4, 2, 'App\\Models\\User');
INSERT INTO `permission_user` VALUES (5, 2, 'App\\Models\\User');
INSERT INTO `permission_user` VALUES (8, 2, 'App\\Models\\User');
INSERT INTO `permission_user` VALUES (9, 2, 'App\\Models\\User');
INSERT INTO `permission_user` VALUES (10, 2, 'App\\Models\\User');
INSERT INTO `permission_user` VALUES (11, 2, 'App\\Models\\User');
INSERT INTO `permission_user` VALUES (12, 2, 'App\\Models\\User');
INSERT INTO `permission_user` VALUES (13, 2, 'App\\Models\\User');
INSERT INTO `permission_user` VALUES (14, 2, 'App\\Models\\User');
INSERT INTO `permission_user` VALUES (15, 2, 'App\\Models\\User');
INSERT INTO `permission_user` VALUES (16, 2, 'App\\Models\\User');
INSERT INTO `permission_user` VALUES (17, 2, 'App\\Models\\User');
INSERT INTO `permission_user` VALUES (18, 2, 'App\\Models\\User');
INSERT INTO `permission_user` VALUES (19, 2, 'App\\Models\\User');
INSERT INTO `permission_user` VALUES (20, 2, 'App\\Models\\User');
INSERT INTO `permission_user` VALUES (21, 2, 'App\\Models\\User');
INSERT INTO `permission_user` VALUES (22, 2, 'App\\Models\\User');
INSERT INTO `permission_user` VALUES (23, 2, 'App\\Models\\User');
INSERT INTO `permission_user` VALUES (24, 2, 'App\\Models\\User');
INSERT INTO `permission_user` VALUES (25, 2, 'App\\Models\\User');
INSERT INTO `permission_user` VALUES (26, 2, 'App\\Models\\User');
INSERT INTO `permission_user` VALUES (27, 2, 'App\\Models\\User');
INSERT INTO `permission_user` VALUES (28, 2, 'App\\Models\\User');
INSERT INTO `permission_user` VALUES (29, 2, 'App\\Models\\User');
INSERT INTO `permission_user` VALUES (30, 2, 'App\\Models\\User');
INSERT INTO `permission_user` VALUES (31, 2, 'App\\Models\\User');
INSERT INTO `permission_user` VALUES (32, 2, 'App\\Models\\User');
INSERT INTO `permission_user` VALUES (33, 2, 'App\\Models\\User');
INSERT INTO `permission_user` VALUES (34, 2, 'App\\Models\\User');
INSERT INTO `permission_user` VALUES (35, 2, 'App\\Models\\User');
INSERT INTO `permission_user` VALUES (36, 2, 'App\\Models\\User');
INSERT INTO `permission_user` VALUES (37, 2, 'App\\Models\\User');
INSERT INTO `permission_user` VALUES (38, 2, 'App\\Models\\User');

-- ----------------------------
-- Table structure for permissions
-- ----------------------------
DROP TABLE IF EXISTS `permissions`;
CREATE TABLE `permissions`  (
  `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT,
  `name` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `display_name` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NULL DEFAULT NULL,
  `description` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NULL DEFAULT NULL,
  `created_at` timestamp(0) NULL DEFAULT NULL,
  `updated_at` timestamp(0) NULL DEFAULT NULL,
  PRIMARY KEY (`id`) USING BTREE,
  UNIQUE INDEX `permissions_name_unique`(`name`) USING BTREE
) ENGINE = InnoDB AUTO_INCREMENT = 56 CHARACTER SET = utf8mb4 COLLATE = utf8mb4_unicode_ci ROW_FORMAT = Dynamic;

-- ----------------------------
-- Records of permissions
-- ----------------------------
INSERT INTO `permissions` VALUES (1, 'acceso-tipo-objetos', 'acceso tipo objetos', NULL, '2023-04-04 14:29:06', '2023-04-04 14:29:06');
INSERT INTO `permissions` VALUES (2, 'borrar-tipo-objetos', 'borrar tipo objetos', NULL, '2023-04-04 16:21:42', '2023-04-04 16:21:42');
INSERT INTO `permissions` VALUES (3, 'editar-tipo-objetos', 'editar tipo objetos', NULL, '2023-04-04 17:03:26', '2023-04-04 17:03:26');
INSERT INTO `permissions` VALUES (4, 'crear-tipo-objetos', 'crear tipo objetos', NULL, '2023-04-04 17:26:31', '2023-04-04 17:26:31');
INSERT INTO `permissions` VALUES (5, 'acceso-propiedad-objetos', 'accesp a propiedades', NULL, NULL, NULL);
INSERT INTO `permissions` VALUES (8, 'borrar-propiedad-objetos', 'borrar propuedades', NULL, NULL, NULL);
INSERT INTO `permissions` VALUES (9, 'editar-propiedad-objetos', 'editar propiedades', NULL, NULL, NULL);
INSERT INTO `permissions` VALUES (10, 'crear-propiedad-objetos', 'crear propiedades de objetos', NULL, NULL, NULL);
INSERT INTO `permissions` VALUES (11, 'acceso-armas', 'acceso armas', NULL, NULL, NULL);
INSERT INTO `permissions` VALUES (12, 'borrar-armas', 'borrar armas', NULL, NULL, NULL);
INSERT INTO `permissions` VALUES (13, 'editar-armas', 'editar armas', NULL, NULL, NULL);
INSERT INTO `permissions` VALUES (14, 'crear-armas', 'crear armas', NULL, NULL, NULL);
INSERT INTO `permissions` VALUES (15, 'acceso-petrechos', 'acceso petrecho', NULL, NULL, NULL);
INSERT INTO `permissions` VALUES (16, 'borrar-petrechos', 'borrar un petrecho', NULL, NULL, NULL);
INSERT INTO `permissions` VALUES (17, 'editar-petrechos', 'editar un petrecho', NULL, NULL, NULL);
INSERT INTO `permissions` VALUES (18, 'crear-petrechos', 'Crear un petrecho', NULL, NULL, NULL);
INSERT INTO `permissions` VALUES (19, 'acceso-lugares-cuerpo', NULL, NULL, NULL, NULL);
INSERT INTO `permissions` VALUES (20, 'crear-lugares-cuerpo', NULL, NULL, NULL, NULL);
INSERT INTO `permissions` VALUES (21, 'editar-lugares-cuerpo', NULL, NULL, NULL, NULL);
INSERT INTO `permissions` VALUES (22, 'borrar-lugares-cuerpo', NULL, NULL, NULL, NULL);
INSERT INTO `permissions` VALUES (23, 'acceso-armaduras', NULL, NULL, NULL, NULL);
INSERT INTO `permissions` VALUES (24, 'crear-armaduras', NULL, NULL, NULL, NULL);
INSERT INTO `permissions` VALUES (25, 'editar-armaduras', NULL, NULL, NULL, NULL);
INSERT INTO `permissions` VALUES (26, 'borrar-armaduras', NULL, NULL, NULL, NULL);
INSERT INTO `permissions` VALUES (27, 'acceso-escuelas-magia', NULL, NULL, NULL, NULL);
INSERT INTO `permissions` VALUES (28, 'crear-escuelas-magia', NULL, NULL, NULL, NULL);
INSERT INTO `permissions` VALUES (29, 'editar-escuelas-magia', NULL, NULL, NULL, NULL);
INSERT INTO `permissions` VALUES (30, 'borrar-escuelas-magia', NULL, NULL, NULL, NULL);
INSERT INTO `permissions` VALUES (31, 'acceso-magias', NULL, NULL, NULL, NULL);
INSERT INTO `permissions` VALUES (32, 'borrar-magias', NULL, NULL, NULL, NULL);
INSERT INTO `permissions` VALUES (33, 'editar-magias', NULL, NULL, NULL, NULL);
INSERT INTO `permissions` VALUES (34, 'crear-magias', NULL, NULL, NULL, NULL);
INSERT INTO `permissions` VALUES (35, 'acceso-dioses', NULL, NULL, NULL, NULL);
INSERT INTO `permissions` VALUES (36, 'borrar-dioses', NULL, NULL, NULL, NULL);
INSERT INTO `permissions` VALUES (37, 'editar-dioses', NULL, NULL, NULL, NULL);
INSERT INTO `permissions` VALUES (38, 'crear-dioses', NULL, NULL, NULL, NULL);
INSERT INTO `permissions` VALUES (39, 'acceso-bendiciones', NULL, NULL, NULL, NULL);
INSERT INTO `permissions` VALUES (40, 'borrar-bendiciones', NULL, NULL, NULL, NULL);
INSERT INTO `permissions` VALUES (41, 'editar-bendiciones', NULL, NULL, NULL, NULL);
INSERT INTO `permissions` VALUES (42, 'crear-bendiciones', NULL, NULL, NULL, NULL);
INSERT INTO `permissions` VALUES (43, 'acceso-talentos', NULL, NULL, NULL, NULL);
INSERT INTO `permissions` VALUES (44, 'borrar-talentos', NULL, NULL, NULL, NULL);
INSERT INTO `permissions` VALUES (45, 'editar-talentos', NULL, NULL, NULL, NULL);
INSERT INTO `permissions` VALUES (46, 'crear-talentos', NULL, NULL, NULL, NULL);
INSERT INTO `permissions` VALUES (48, 'acceso-ascendencias', NULL, NULL, NULL, NULL);
INSERT INTO `permissions` VALUES (49, 'borrar-ascendencias', NULL, NULL, NULL, NULL);
INSERT INTO `permissions` VALUES (50, 'editar-ascendencias', NULL, NULL, NULL, NULL);
INSERT INTO `permissions` VALUES (51, 'crear-ascendencias', NULL, NULL, NULL, NULL);
INSERT INTO `permissions` VALUES (52, 'acceso-clases', NULL, NULL, NULL, NULL);
INSERT INTO `permissions` VALUES (53, 'borrar-clases', NULL, NULL, NULL, NULL);
INSERT INTO `permissions` VALUES (54, 'editar-clases', NULL, NULL, NULL, NULL);
INSERT INTO `permissions` VALUES (55, 'crear-clases', NULL, NULL, NULL, NULL);

-- ----------------------------
-- Table structure for personal_access_tokens
-- ----------------------------
DROP TABLE IF EXISTS `personal_access_tokens`;
CREATE TABLE `personal_access_tokens`  (
  `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT,
  `tokenable_type` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `tokenable_id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(64) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `abilities` text CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NULL,
  `last_used_at` timestamp(0) NULL DEFAULT NULL,
  `expires_at` timestamp(0) NULL DEFAULT NULL,
  `created_at` timestamp(0) NULL DEFAULT NULL,
  `updated_at` timestamp(0) NULL DEFAULT NULL,
  PRIMARY KEY (`id`) USING BTREE,
  UNIQUE INDEX `personal_access_tokens_token_unique`(`token`) USING BTREE,
  INDEX `personal_access_tokens_tokenable_type_tokenable_id_index`(`tokenable_type`, `tokenable_id`) USING BTREE
) ENGINE = InnoDB AUTO_INCREMENT = 1 CHARACTER SET = utf8mb4 COLLATE = utf8mb4_unicode_ci ROW_FORMAT = Dynamic;

-- ----------------------------
-- Records of personal_access_tokens
-- ----------------------------

-- ----------------------------
-- Table structure for petrechos
-- ----------------------------
DROP TABLE IF EXISTS `petrechos`;
CREATE TABLE `petrechos`  (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `nombre` varchar(150) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `danio` int(10) NOT NULL,
  `estorbo` int(10) NULL DEFAULT NULL,
  `tipo_id` int(11) NULL DEFAULT NULL,
  `precio` decimal(16, 2) NULL DEFAULT NULL,
  `alcance_max` int(10) NULL DEFAULT NULL,
  `alcance_min` int(10) NULL DEFAULT NULL,
  `created_at` timestamp(0) NULL DEFAULT NULL,
  `updated_at` timestamp(0) NULL DEFAULT NULL,
  `deleted_at` timestamp(0) NULL DEFAULT NULL,
  `descripcion` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NULL DEFAULT NULL,
  PRIMARY KEY (`id`) USING BTREE
) ENGINE = InnoDB AUTO_INCREMENT = 4 CHARACTER SET = utf8mb4 COLLATE = utf8mb4_general_ci ROW_FORMAT = Dynamic;

-- ----------------------------
-- Records of petrechos
-- ----------------------------
INSERT INTO `petrechos` VALUES (1, 'Alabarda', 4, 4, 5, 170.00, NULL, NULL, '2023-04-06 20:26:42', '2023-04-07 10:52:58', '2023-04-07 10:52:58', NULL);
INSERT INTO `petrechos` VALUES (2, 'Lamparade aceite', 0, 2, 6, 20.00, 5, 0, '2023-04-07 10:51:48', '2023-04-07 10:53:08', NULL, NULL);
INSERT INTO `petrechos` VALUES (3, 'Pocima de vida', 2, 1, 7, 120.00, 0, 0, '2023-04-08 18:49:01', '2023-04-08 18:49:01', NULL, 'Te cura +2 de vida');

-- ----------------------------
-- Table structure for petrechos_propiedades
-- ----------------------------
DROP TABLE IF EXISTS `petrechos_propiedades`;
CREATE TABLE `petrechos_propiedades`  (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `propiedad_id` int(11) NOT NULL,
  `petrecho_id` int(11) NOT NULL,
  PRIMARY KEY (`id`) USING BTREE
) ENGINE = InnoDB AUTO_INCREMENT = 2 CHARACTER SET = utf8mb4 COLLATE = utf8mb4_general_ci ROW_FORMAT = Dynamic;

-- ----------------------------
-- Records of petrechos_propiedades
-- ----------------------------
INSERT INTO `petrechos_propiedades` VALUES (1, 7, 2);

-- ----------------------------
-- Table structure for propiedades
-- ----------------------------
DROP TABLE IF EXISTS `propiedades`;
CREATE TABLE `propiedades`  (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `nombre` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NULL DEFAULT NULL,
  `descripcion` longtext CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NULL,
  `created_at` timestamp(0) NULL DEFAULT NULL,
  `updated_at` timestamp(0) NULL DEFAULT NULL,
  `deleted_at` timestamp(0) NULL DEFAULT NULL,
  `bonificador` int(10) NULL DEFAULT NULL,
  `penalizador` int(10) NULL DEFAULT NULL,
  PRIMARY KEY (`id`) USING BTREE
) ENGINE = InnoDB AUTO_INCREMENT = 8 CHARACTER SET = utf8mb4 COLLATE = utf8mb4_general_ci ROW_FORMAT = Dynamic;

-- ----------------------------
-- Records of propiedades
-- ----------------------------
INSERT INTO `propiedades` VALUES (1, 'Agotadora', 'Todos los resultados de 1 en los dados de atributo al usar esta arma restan 1 PEF', '2023-04-06 20:18:49', '2023-04-06 20:18:49', NULL, 0, 1);
INSERT INTO `propiedades` VALUES (2, 'Bloqueo', 'Si esta arma se usa para bloquear ataques, el penalizador a la tirada de ataque del enemigo aumenta a +2, en lugar del habitual +1. No se acumula con el bonus de bloqueo de otras armas o de un escudo.', '2023-04-06 20:19:52', '2023-04-06 20:19:52', NULL, 2, 0);
INSERT INTO `propiedades` VALUES (3, 'Caballeria', 'Siempre que esta arma sea usada por un personaje sobre una montura, obtiene un bonificador de -1 a la dificultad de las tiradas de ataque.', '2023-04-06 20:20:43', '2023-04-06 20:20:43', NULL, 1, 0);
INSERT INTO `propiedades` VALUES (4, 'Corte', 'Estas armas están diseñadas para seccionar la carne y hacer profundos tajos en las víctimas con la intención de provocar heridas incapacitantes. Son especialmente  efectivas contra oponentes que no porten demasiada armadura', '2023-04-06 20:22:05', '2023-04-06 20:22:05', NULL, 0, 0);
INSERT INTO `propiedades` VALUES (5, 'Contundente', 'estar armas están diseñadas para aplastar al oponente y quebrar sus huesos. Aunque no tienen la capacidad de las armas de corte o punzada para provocar heridas mortales con facilidad, un buen\ngolpe puede destrozar al rival a pesar de la armadura, en especial en la cabeza, donde pueden ser mortales o dejar sin sentido al oponente sin dificultad', '2023-04-06 20:24:38', '2023-04-06 20:24:38', NULL, 0, 0);
INSERT INTO `propiedades` VALUES (6, 'Dos Manos', 'estas armas solo pueden usarse de manera efectiva a dos manos. Usar una de estas armas a una mano conlleva un penalizador a la dificultad de los ataques de +3.', '2023-04-06 20:25:01', '2023-04-06 20:25:01', NULL, 0, 3);
INSERT INTO `propiedades` VALUES (7, 'Especial', 'esta arma tiene una capacidad única, especificada en la descripción del arma', '2023-04-06 20:25:23', '2023-04-06 20:25:23', NULL, 0, 0);

-- ----------------------------
-- Table structure for role_user
-- ----------------------------
DROP TABLE IF EXISTS `role_user`;
CREATE TABLE `role_user`  (
  `role_id` bigint(20) UNSIGNED NOT NULL,
  `user_id` bigint(20) UNSIGNED NOT NULL,
  `user_type` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  PRIMARY KEY (`user_id`, `role_id`, `user_type`) USING BTREE,
  INDEX `role_user_role_id_foreign`(`role_id`) USING BTREE,
  CONSTRAINT `role_user_role_id_foreign` FOREIGN KEY (`role_id`) REFERENCES `roles` (`id`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE = InnoDB CHARACTER SET = utf8mb4 COLLATE = utf8mb4_unicode_ci ROW_FORMAT = Dynamic;

-- ----------------------------
-- Records of role_user
-- ----------------------------
INSERT INTO `role_user` VALUES (1, 1, 'App\\Models\\User');
INSERT INTO `role_user` VALUES (1, 2, 'App\\Models\\User');

-- ----------------------------
-- Table structure for roles
-- ----------------------------
DROP TABLE IF EXISTS `roles`;
CREATE TABLE `roles`  (
  `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT,
  `name` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `display_name` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NULL DEFAULT NULL,
  `description` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NULL DEFAULT NULL,
  `created_at` timestamp(0) NULL DEFAULT NULL,
  `updated_at` timestamp(0) NULL DEFAULT NULL,
  PRIMARY KEY (`id`) USING BTREE,
  UNIQUE INDEX `roles_name_unique`(`name`) USING BTREE
) ENGINE = InnoDB AUTO_INCREMENT = 2 CHARACTER SET = utf8mb4 COLLATE = utf8mb4_unicode_ci ROW_FORMAT = Dynamic;

-- ----------------------------
-- Records of roles
-- ----------------------------
INSERT INTO `roles` VALUES (1, 'admin', 'Admin', 'Administrador', NULL, NULL);

-- ----------------------------
-- Table structure for talentos
-- ----------------------------
DROP TABLE IF EXISTS `talentos`;
CREATE TABLE `talentos`  (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `nombre` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `created_at` timestamp(0) NULL DEFAULT NULL,
  `updated_at` timestamp(0) NULL DEFAULT NULL,
  `deleted_at` timestamp(0) NULL DEFAULT NULL,
  `descripcion` longtext CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NULL,
  PRIMARY KEY (`id`) USING BTREE
) ENGINE = InnoDB AUTO_INCREMENT = 3 CHARACTER SET = utf8mb4 COLLATE = utf8mb4_general_ci ROW_FORMAT = Dynamic;

-- ----------------------------
-- Records of talentos
-- ----------------------------
INSERT INTO `talentos` VALUES (1, 'Acumular poderasd', '2023-04-08 18:00:14', '2023-04-08 18:00:20', NULL, 'Acumular poderasd');
INSERT INTO `talentos` VALUES (2, 'TEST', '2023-04-09 17:02:42', '2023-04-09 17:02:42', NULL, 'asdasd');

-- ----------------------------
-- Table structure for tipos_objetos
-- ----------------------------
DROP TABLE IF EXISTS `tipos_objetos`;
CREATE TABLE `tipos_objetos`  (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `nombre` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `created_at` timestamp(0) NULL DEFAULT NULL,
  `updated_at` timestamp(0) NULL DEFAULT NULL,
  `deleted_at` timestamp(0) NULL DEFAULT NULL,
  `propiedades` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NULL DEFAULT NULL,
  `arma` tinyint(4) NULL DEFAULT NULL,
  `armadura` tinyint(4) NULL DEFAULT NULL,
  `petrecho` tinyint(4) NULL DEFAULT NULL,
  PRIMARY KEY (`id`) USING BTREE
) ENGINE = InnoDB AUTO_INCREMENT = 8 CHARACTER SET = utf8mb4 COLLATE = utf8mb4_general_ci ROW_FORMAT = Dynamic;

-- ----------------------------
-- Records of tipos_objetos
-- ----------------------------
INSERT INTO `tipos_objetos` VALUES (1, 'Ligera', '2023-04-06 20:14:01', '2023-04-06 20:14:01', NULL, NULL, 0, 1, 0);
INSERT INTO `tipos_objetos` VALUES (2, 'Media', '2023-04-06 20:14:09', '2023-04-06 20:14:09', NULL, NULL, 0, 1, 0);
INSERT INTO `tipos_objetos` VALUES (3, 'Pesada', '2023-04-06 20:14:14', '2023-04-06 20:14:14', NULL, NULL, 0, 1, 0);
INSERT INTO `tipos_objetos` VALUES (4, 'Hacha', '2023-04-06 20:14:33', '2023-04-06 20:28:15', NULL, NULL, 1, 0, 0);
INSERT INTO `tipos_objetos` VALUES (5, 'Asta', '2023-04-06 20:14:57', '2023-04-06 20:28:06', NULL, NULL, 1, 0, 0);
INSERT INTO `tipos_objetos` VALUES (6, 'Lamparas', '2023-04-07 10:51:20', '2023-04-07 10:51:20', NULL, NULL, 0, 0, 1);
INSERT INTO `tipos_objetos` VALUES (7, 'Pociones', '2023-04-08 18:48:30', '2023-04-08 18:48:30', NULL, NULL, 0, 0, 1);

-- ----------------------------
-- Table structure for users
-- ----------------------------
DROP TABLE IF EXISTS `users`;
CREATE TABLE `users`  (
  `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT,
  `name` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `email_verified_at` timestamp(0) NULL DEFAULT NULL,
  `password` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `remember_token` varchar(100) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NULL DEFAULT NULL,
  `created_at` timestamp(0) NULL DEFAULT NULL,
  `updated_at` timestamp(0) NULL DEFAULT NULL,
  PRIMARY KEY (`id`) USING BTREE,
  UNIQUE INDEX `users_email_unique`(`email`) USING BTREE
) ENGINE = InnoDB AUTO_INCREMENT = 4 CHARACTER SET = utf8mb4 COLLATE = utf8mb4_unicode_ci ROW_FORMAT = Dynamic;

-- ----------------------------
-- Records of users
-- ----------------------------
INSERT INTO `users` VALUES (1, 'jmedina', 'justom78@gmail.com', NULL, '$2y$10$vhbtaUaip7i0d6iUSrbsjOOjAtedR9r0DGbmbgITjEYVpcl2uf/JO', NULL, '2023-04-03 12:07:22', '2023-04-03 12:07:22');
INSERT INTO `users` VALUES (2, 'jmedina@mail.com', 'jmedina@mail.com', NULL, '$2y$10$SSVrR9nhBTjF21G45PETJ.CWTdg6g2VnsN/HQ6wVkRFBw8sVT3zbC', NULL, '2023-04-04 12:05:00', '2023-04-04 12:05:00');
INSERT INTO `users` VALUES (3, 'Justo', 'justom78@mail.com', NULL, '$2y$10$QaZGha0bFf93tyGDt5c9NeZ2oXUPb6Pn/n9j3rCYbuYJe/ob12Ug.', NULL, '2023-04-08 11:54:27', '2023-04-08 11:54:27');

SET FOREIGN_KEY_CHECKS = 1;
