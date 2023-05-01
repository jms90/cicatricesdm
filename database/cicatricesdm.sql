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

 Date: 01/05/2023 22:33:14
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
  `proteccion` int(11) NOT NULL,
  `estorbo` int(11) NULL DEFAULT NULL,
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
INSERT INTO `armaduras` VALUES (1, 'Casco de gladiador', 4, 3, 13, 50.00, '2023-04-19 15:44:26', '2023-04-19 15:44:26', NULL, NULL);
INSERT INTO `armaduras` VALUES (2, 'Hombrera de gladiador', 3, 3, 12, 30.00, '2023-04-19 15:47:32', '2023-04-19 15:47:32', NULL, NULL);
INSERT INTO `armaduras` VALUES (3, 'Faldón de gladiador', 2, 2, 12, 40.00, '2023-04-19 15:49:39', '2023-04-19 15:49:39', NULL, NULL);

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
) ENGINE = InnoDB AUTO_INCREMENT = 5 CHARACTER SET = utf8mb4 COLLATE = utf8mb4_general_ci ROW_FORMAT = Dynamic;

-- ----------------------------
-- Records of armaduras_lugares_cuerpo
-- ----------------------------
INSERT INTO `armaduras_lugares_cuerpo` VALUES (1, 1, 1, NULL, NULL, NULL);
INSERT INTO `armaduras_lugares_cuerpo` VALUES (2, 4, 2, NULL, NULL, NULL);
INSERT INTO `armaduras_lugares_cuerpo` VALUES (3, 5, 3, NULL, NULL, NULL);
INSERT INTO `armaduras_lugares_cuerpo` VALUES (4, 6, 3, NULL, NULL, NULL);

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
  `danio` int(11) NOT NULL,
  `estorbo` int(11) NULL DEFAULT NULL,
  `tipo_id` int(11) NULL DEFAULT NULL,
  `precio` decimal(16, 2) NULL DEFAULT NULL,
  `alcance_max` int(11) NULL DEFAULT NULL,
  `alcance_min` int(11) NULL DEFAULT NULL,
  `created_at` timestamp(0) NULL DEFAULT NULL,
  `updated_at` timestamp(0) NULL DEFAULT NULL,
  `deleted_at` timestamp(0) NULL DEFAULT NULL,
  `descripcion` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NULL DEFAULT NULL,
  PRIMARY KEY (`id`) USING BTREE
) ENGINE = InnoDB AUTO_INCREMENT = 65 CHARACTER SET = utf8mb4 COLLATE = utf8mb4_general_ci ROW_FORMAT = Dynamic;

-- ----------------------------
-- Records of armas
-- ----------------------------
INSERT INTO `armas` VALUES (1, 'Espada corta', 3, 3, 21, 50.00, 0, 0, '2023-04-17 20:02:10', '2023-04-18 16:44:40', NULL, NULL);
INSERT INTO `armas` VALUES (2, 'Alabarda', 7, 4, 21, 170.00, 0, 0, '2023-04-18 15:16:28', '2023-04-18 16:44:46', NULL, NULL);
INSERT INTO `armas` VALUES (3, 'Espada larga', 5, 4, 21, 125.00, 0, 0, '2023-04-18 15:19:26', '2023-04-18 16:44:53', NULL, NULL);
INSERT INTO `armas` VALUES (4, 'Montante', 8, 4, 21, 200.00, 0, 0, '2023-04-18 15:20:42', '2023-04-18 16:45:01', NULL, NULL);
INSERT INTO `armas` VALUES (5, 'Estoque', 3, 3, 21, 75.00, NULL, NULL, '2023-04-18 15:22:09', '2023-04-18 16:45:09', NULL, NULL);
INSERT INTO `armas` VALUES (6, 'Bracamarte', 4, 3, 21, 50.00, NULL, NULL, '2023-04-18 15:22:43', '2023-04-18 16:45:16', NULL, NULL);
INSERT INTO `armas` VALUES (7, 'Sable', 3, 3, 21, 50.00, NULL, NULL, '2023-04-18 15:24:20', '2023-04-18 16:45:22', NULL, NULL);
INSERT INTO `armas` VALUES (8, 'Alfange', 3, 3, 21, 50.00, NULL, NULL, '2023-04-18 15:25:35', '2023-04-18 16:45:31', NULL, NULL);
INSERT INTO `armas` VALUES (9, 'Hacha', 3, 3, 5, 20.00, NULL, NULL, '2023-04-18 15:57:07', '2023-04-18 15:57:07', NULL, NULL);
INSERT INTO `armas` VALUES (10, 'Hacha de batalla', 6, 3, 5, 95.00, NULL, NULL, '2023-04-18 15:58:53', '2023-04-18 15:58:53', NULL, NULL);
INSERT INTO `armas` VALUES (11, 'Bardiche', 8, 4, 5, 150.00, NULL, NULL, '2023-04-18 15:59:41', '2023-04-18 20:41:15', NULL, NULL);
INSERT INTO `armas` VALUES (12, 'Ono', 2, 2, 5, 10.00, NULL, NULL, '2023-04-18 16:00:26', '2023-04-18 16:02:29', NULL, NULL);
INSERT INTO `armas` VALUES (13, 'Kama', 3, 3, 5, 30.00, NULL, NULL, '2023-04-18 16:01:52', '2023-04-18 16:01:52', NULL, NULL);
INSERT INTO `armas` VALUES (14, 'Parashu', 4, 3, 5, 55.00, NULL, NULL, '2023-04-18 16:03:51', '2023-04-18 16:03:51', NULL, NULL);
INSERT INTO `armas` VALUES (15, 'Garrote', 2, 2, 15, 1.00, NULL, NULL, '2023-04-18 16:04:55', '2023-04-18 16:05:06', NULL, NULL);
INSERT INTO `armas` VALUES (16, 'Maza de hierro', 3, 3, 15, 40.00, NULL, NULL, '2023-04-18 16:05:45', '2023-04-18 16:05:45', NULL, NULL);
INSERT INTO `armas` VALUES (17, 'Estrella de la mañana', 3, 3, 15, 60.00, NULL, NULL, '2023-04-18 16:06:37', '2023-04-18 16:06:37', NULL, NULL);
INSERT INTO `armas` VALUES (18, 'Macáhuitl', 4, 3, 15, 45.00, NULL, NULL, '2023-04-18 16:07:29', '2023-04-18 16:07:29', NULL, NULL);
INSERT INTO `armas` VALUES (19, 'Pico de cuervo', 3, 3, 15, 55.00, NULL, NULL, '2023-04-18 16:08:33', '2023-04-18 16:08:33', NULL, NULL);
INSERT INTO `armas` VALUES (20, 'Kanabo', 5, 4, 15, 65.00, NULL, NULL, '2023-04-18 16:09:46', '2023-04-18 16:09:46', NULL, NULL);
INSERT INTO `armas` VALUES (21, 'Martillo de guerra', 5, 4, 15, 80.00, NULL, NULL, '2023-04-18 16:11:05', '2023-04-18 16:11:05', NULL, NULL);
INSERT INTO `armas` VALUES (22, 'Goedendag', 9, 4, 15, 80.00, NULL, NULL, '2023-04-18 16:16:11', '2023-04-18 16:16:11', NULL, NULL);
INSERT INTO `armas` VALUES (23, 'Mayal', 6, 3, 15, 75.00, NULL, NULL, '2023-04-18 16:20:05', '2023-04-18 16:20:05', NULL, NULL);
INSERT INTO `armas` VALUES (24, 'Mangual', 10, 4, 15, 220.00, NULL, NULL, '2023-04-18 16:20:54', '2023-04-18 16:20:54', NULL, NULL);
INSERT INTO `armas` VALUES (25, 'Pico de batalla', 7, 3, 15, 75.00, NULL, NULL, '2023-04-18 16:21:59', '2023-04-18 16:22:44', NULL, NULL);
INSERT INTO `armas` VALUES (26, 'Bastón', 2, 3, 2, 5.00, NULL, NULL, '2023-04-18 16:23:50', '2023-04-18 16:23:50', NULL, NULL);
INSERT INTO `armas` VALUES (27, 'Lanza', 3, 3, 2, 15.00, NULL, NULL, '2023-04-18 16:24:33', '2023-04-18 20:41:22', NULL, NULL);
INSERT INTO `armas` VALUES (28, 'Tridente', 5, 4, 2, 75.00, NULL, NULL, '2023-04-18 16:25:43', '2023-04-18 16:25:43', NULL, NULL);
INSERT INTO `armas` VALUES (29, 'Guadaña de guerra', 8, 4, 2, 180.00, NULL, NULL, '2023-04-18 16:27:23', '2023-04-18 16:27:23', NULL, NULL);
INSERT INTO `armas` VALUES (30, 'Guja', 7, 4, 2, 150.00, NULL, NULL, '2023-04-18 16:28:23', '2023-04-18 16:28:23', NULL, NULL);
INSERT INTO `armas` VALUES (31, 'Bisarma', 3, 3, 2, 80.00, NULL, NULL, '2023-04-18 16:29:41', '2023-04-18 16:29:41', NULL, NULL);
INSERT INTO `armas` VALUES (32, 'Puño desnudo', 0, 0, 17, 0.00, NULL, NULL, '2023-04-18 16:30:13', '2023-04-18 20:41:30', NULL, NULL);
INSERT INTO `armas` VALUES (33, 'Puño de hierro', 1, 1, 17, 2.00, NULL, NULL, '2023-04-18 16:31:28', '2023-04-18 16:31:28', NULL, NULL);
INSERT INTO `armas` VALUES (34, 'Garra de acero', 3, 2, 17, 60.00, NULL, NULL, '2023-04-18 16:32:59', '2023-04-18 16:32:59', NULL, NULL);
INSERT INTO `armas` VALUES (35, 'Cesto', 2, 2, 17, 30.00, NULL, NULL, '2023-04-18 16:34:00', '2023-04-18 16:34:00', NULL, NULL);
INSERT INTO `armas` VALUES (36, 'Garra de gladiador', 3, 3, 17, 70.00, NULL, NULL, '2023-04-18 16:34:49', '2023-04-18 16:34:49', NULL, NULL);
INSERT INTO `armas` VALUES (37, 'katar', 3, 3, 17, 60.00, NULL, NULL, '2023-04-18 16:35:31', '2023-04-18 16:35:31', NULL, NULL);
INSERT INTO `armas` VALUES (38, 'Látigo', 2, 3, 18, 35.00, NULL, NULL, '2023-04-18 16:46:50', '2023-04-18 16:46:50', NULL, NULL);
INSERT INTO `armas` VALUES (39, 'Látigo de púas', 3, 4, 18, 90.00, NULL, NULL, '2023-04-18 16:50:06', '2023-04-18 16:50:06', NULL, NULL);
INSERT INTO `armas` VALUES (40, 'Atrapa-hombres', 4, 4, 22, 190.00, NULL, NULL, '2023-04-18 16:52:00', '2023-04-18 16:52:00', NULL, NULL);
INSERT INTO `armas` VALUES (41, 'Red', 0, 3, 22, 25.00, NULL, NULL, '2023-04-18 16:52:54', '2023-04-18 16:52:54', NULL, NULL);
INSERT INTO `armas` VALUES (42, 'Daga', 2, 2, 7, 5.00, NULL, NULL, '2023-04-18 16:53:38', '2023-04-18 16:53:38', NULL, NULL);
INSERT INTO `armas` VALUES (43, 'Daga larga', 2, 2, 7, 15.00, NULL, NULL, '2023-04-18 16:54:43', '2023-04-18 16:54:43', NULL, NULL);
INSERT INTO `armas` VALUES (44, 'Cuchillo de cazador', 2, 2, 7, 7.00, NULL, NULL, '2023-04-18 16:55:34', '2023-04-18 16:55:34', NULL, NULL);
INSERT INTO `armas` VALUES (45, 'Rompeespadas', 2, 2, 7, 30.00, NULL, NULL, '2023-04-18 16:56:10', '2023-04-18 16:56:10', NULL, NULL);
INSERT INTO `armas` VALUES (46, 'Urumi', 3, 3, 10, 65.00, NULL, NULL, '2023-04-18 16:57:22', '2023-04-18 16:57:22', NULL, NULL);
INSERT INTO `armas` VALUES (47, 'Kama con cadenas', 6, 4, 10, 70.00, NULL, NULL, '2023-04-18 16:59:01', '2023-04-18 16:59:01', NULL, NULL);
INSERT INTO `armas` VALUES (48, 'Arco corto', 6, 3, 6, 30.00, 4, 0, '2023-04-18 18:10:11', '2023-04-18 18:10:11', NULL, NULL);
INSERT INTO `armas` VALUES (49, 'Arco largo', 8, 4, 6, 120.00, 5, NULL, '2023-04-18 18:13:43', '2023-04-18 20:41:43', NULL, NULL);
INSERT INTO `armas` VALUES (50, 'Arco corto compuesto', 7, 3, 6, 60.00, NULL, NULL, '2023-04-18 18:14:42', '2023-04-18 18:14:42', NULL, NULL);
INSERT INTO `armas` VALUES (51, 'Arco largo compuesto', 9, 4, 6, 190.00, 5, NULL, '2023-04-18 18:16:18', '2023-04-18 18:16:18', NULL, NULL);
INSERT INTO `armas` VALUES (52, 'Ballesta', 8, 3, 8, 80.00, 5, NULL, '2023-04-18 18:18:32', '2023-04-18 18:18:32', NULL, NULL);
INSERT INTO `armas` VALUES (53, 'Ballesta de repetición', 7, 4, 8, 180.00, 4, NULL, '2023-04-18 18:23:12', '2023-04-18 18:23:12', NULL, 'Rafaga 3');
INSERT INTO `armas` VALUES (54, 'Pistola', 8, 2, 9, 180.00, 3, NULL, '2023-04-18 18:25:39', '2023-04-18 18:25:39', NULL, NULL);
INSERT INTO `armas` VALUES (55, 'Pistola de repetición', 7, 2, 9, 450.00, 2, NULL, '2023-04-18 18:27:57', '2023-04-18 18:29:18', NULL, 'Rafaga 4');
INSERT INTO `armas` VALUES (56, 'Arcabuz', 9, 4, 9, 350.00, 5, NULL, '2023-04-18 18:29:07', '2023-04-18 18:29:07', NULL, NULL);
INSERT INTO `armas` VALUES (57, 'Trabuco', 2, 3, 9, 220.00, 2, NULL, '2023-04-18 18:33:54', '2023-04-18 18:34:05', NULL, 'Daño 2+1d8');
INSERT INTO `armas` VALUES (58, 'Cerbatana', 0, 2, 10, 2.00, 3, NULL, '2023-04-18 18:35:19', '2023-04-18 18:35:19', NULL, NULL);
INSERT INTO `armas` VALUES (59, 'Cuchillo arrojadizo', 5, 2, 11, 5.00, 2, NULL, '2023-04-18 18:36:41', '2023-04-18 18:36:41', NULL, 'Daño combate cercano 2');
INSERT INTO `armas` VALUES (60, 'Hacha arrojadiza', 6, 3, 5, 8.00, 2, NULL, '2023-04-18 18:37:50', '2023-04-18 18:37:50', NULL, 'Daño CaC 3');
INSERT INTO `armas` VALUES (61, 'Boleadoras', 2, 2, 23, 7.00, 2, NULL, '2023-04-18 18:41:22', '2023-04-18 18:41:22', NULL, 'Daño CaC 2');
INSERT INTO `armas` VALUES (62, 'Javalina', 7, 3, 24, 15.00, 3, NULL, '2023-04-18 18:42:59', '2023-04-18 18:42:59', NULL, 'Daño CaC 3');
INSERT INTO `armas` VALUES (63, 'Honda', 5, 1, 14, 1.00, 3, NULL, '2023-04-18 18:43:42', '2023-04-18 18:43:42', NULL, NULL);
INSERT INTO `armas` VALUES (64, 'Honda de cayado', 6, 2, 14, 7.00, 4, NULL, '2023-04-18 18:44:26', '2023-04-18 18:44:26', NULL, NULL);

-- ----------------------------
-- Table structure for armas_propiedades
-- ----------------------------
DROP TABLE IF EXISTS `armas_propiedades`;
CREATE TABLE `armas_propiedades`  (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `propiedad_id` int(11) NOT NULL,
  `arma_id` int(11) NOT NULL,
  PRIMARY KEY (`id`) USING BTREE
) ENGINE = InnoDB AUTO_INCREMENT = 199 CHARACTER SET = utf8mb4 COLLATE = utf8mb4_general_ci ROW_FORMAT = Dynamic;

-- ----------------------------
-- Records of armas_propiedades
-- ----------------------------
INSERT INTO `armas_propiedades` VALUES (1, 3, 2);
INSERT INTO `armas_propiedades` VALUES (2, 4, 2);
INSERT INTO `armas_propiedades` VALUES (3, 5, 2);
INSERT INTO `armas_propiedades` VALUES (4, 6, 2);
INSERT INTO `armas_propiedades` VALUES (5, 12, 2);
INSERT INTO `armas_propiedades` VALUES (6, 4, 1);
INSERT INTO `armas_propiedades` VALUES (7, 6, 1);
INSERT INTO `armas_propiedades` VALUES (8, 7, 1);
INSERT INTO `armas_propiedades` VALUES (9, 4, 3);
INSERT INTO `armas_propiedades` VALUES (10, 6, 3);
INSERT INTO `armas_propiedades` VALUES (11, 7, 3);
INSERT INTO `armas_propiedades` VALUES (12, 8, 3);
INSERT INTO `armas_propiedades` VALUES (13, 3, 4);
INSERT INTO `armas_propiedades` VALUES (14, 4, 4);
INSERT INTO `armas_propiedades` VALUES (15, 6, 4);
INSERT INTO `armas_propiedades` VALUES (16, 7, 4);
INSERT INTO `armas_propiedades` VALUES (17, 6, 5);
INSERT INTO `armas_propiedades` VALUES (18, 9, 5);
INSERT INTO `armas_propiedades` VALUES (19, 4, 6);
INSERT INTO `armas_propiedades` VALUES (20, 4, 7);
INSERT INTO `armas_propiedades` VALUES (21, 10, 7);
INSERT INTO `armas_propiedades` VALUES (22, 4, 8);
INSERT INTO `armas_propiedades` VALUES (23, 9, 8);
INSERT INTO `armas_propiedades` VALUES (24, 4, 9);
INSERT INTO `armas_propiedades` VALUES (25, 3, 10);
INSERT INTO `armas_propiedades` VALUES (26, 4, 10);
INSERT INTO `armas_propiedades` VALUES (27, 11, 10);
INSERT INTO `armas_propiedades` VALUES (28, 3, 11);
INSERT INTO `armas_propiedades` VALUES (29, 4, 11);
INSERT INTO `armas_propiedades` VALUES (30, 11, 11);
INSERT INTO `armas_propiedades` VALUES (31, 12, 11);
INSERT INTO `armas_propiedades` VALUES (32, 4, 12);
INSERT INTO `armas_propiedades` VALUES (33, 13, 12);
INSERT INTO `armas_propiedades` VALUES (34, 4, 13);
INSERT INTO `armas_propiedades` VALUES (35, 5, 13);
INSERT INTO `armas_propiedades` VALUES (36, 4, 14);
INSERT INTO `armas_propiedades` VALUES (37, 8, 14);
INSERT INTO `armas_propiedades` VALUES (38, 11, 14);
INSERT INTO `armas_propiedades` VALUES (39, 13, 15);
INSERT INTO `armas_propiedades` VALUES (40, 14, 15);
INSERT INTO `armas_propiedades` VALUES (41, 15, 15);
INSERT INTO `armas_propiedades` VALUES (42, 14, 16);
INSERT INTO `armas_propiedades` VALUES (43, 14, 17);
INSERT INTO `armas_propiedades` VALUES (44, 16, 17);
INSERT INTO `armas_propiedades` VALUES (45, 4, 18);
INSERT INTO `armas_propiedades` VALUES (46, 14, 18);
INSERT INTO `armas_propiedades` VALUES (47, 15, 18);
INSERT INTO `armas_propiedades` VALUES (48, 6, 19);
INSERT INTO `armas_propiedades` VALUES (49, 16, 19);
INSERT INTO `armas_propiedades` VALUES (50, 8, 20);
INSERT INTO `armas_propiedades` VALUES (51, 9, 20);
INSERT INTO `armas_propiedades` VALUES (52, 11, 20);
INSERT INTO `armas_propiedades` VALUES (53, 14, 20);
INSERT INTO `armas_propiedades` VALUES (54, 6, 21);
INSERT INTO `armas_propiedades` VALUES (55, 8, 21);
INSERT INTO `armas_propiedades` VALUES (56, 14, 21);
INSERT INTO `armas_propiedades` VALUES (57, 16, 21);
INSERT INTO `armas_propiedades` VALUES (58, 3, 22);
INSERT INTO `armas_propiedades` VALUES (59, 4, 22);
INSERT INTO `armas_propiedades` VALUES (60, 11, 22);
INSERT INTO `armas_propiedades` VALUES (61, 14, 22);
INSERT INTO `armas_propiedades` VALUES (62, 8, 23);
INSERT INTO `armas_propiedades` VALUES (63, 14, 23);
INSERT INTO `armas_propiedades` VALUES (64, 17, 23);
INSERT INTO `armas_propiedades` VALUES (65, 3, 24);
INSERT INTO `armas_propiedades` VALUES (66, 14, 24);
INSERT INTO `armas_propiedades` VALUES (67, 17, 24);
INSERT INTO `armas_propiedades` VALUES (68, 3, 25);
INSERT INTO `armas_propiedades` VALUES (69, 16, 25);
INSERT INTO `armas_propiedades` VALUES (70, 6, 25);
INSERT INTO `armas_propiedades` VALUES (71, 7, 26);
INSERT INTO `armas_propiedades` VALUES (72, 9, 26);
INSERT INTO `armas_propiedades` VALUES (73, 12, 26);
INSERT INTO `armas_propiedades` VALUES (74, 14, 26);
INSERT INTO `armas_propiedades` VALUES (75, 15, 26);
INSERT INTO `armas_propiedades` VALUES (76, 6, 27);
INSERT INTO `armas_propiedades` VALUES (77, 8, 27);
INSERT INTO `armas_propiedades` VALUES (78, 9, 27);
INSERT INTO `armas_propiedades` VALUES (79, 12, 27);
INSERT INTO `armas_propiedades` VALUES (80, 6, 28);
INSERT INTO `armas_propiedades` VALUES (81, 8, 28);
INSERT INTO `armas_propiedades` VALUES (82, 9, 28);
INSERT INTO `armas_propiedades` VALUES (83, 12, 28);
INSERT INTO `armas_propiedades` VALUES (84, 3, 29);
INSERT INTO `armas_propiedades` VALUES (85, 4, 29);
INSERT INTO `armas_propiedades` VALUES (86, 9, 29);
INSERT INTO `armas_propiedades` VALUES (87, 11, 29);
INSERT INTO `armas_propiedades` VALUES (88, 3, 30);
INSERT INTO `armas_propiedades` VALUES (89, 4, 30);
INSERT INTO `armas_propiedades` VALUES (90, 9, 30);
INSERT INTO `armas_propiedades` VALUES (91, 12, 30);
INSERT INTO `armas_propiedades` VALUES (92, 4, 31);
INSERT INTO `armas_propiedades` VALUES (93, 5, 31);
INSERT INTO `armas_propiedades` VALUES (94, 6, 31);
INSERT INTO `armas_propiedades` VALUES (95, 14, 32);
INSERT INTO `armas_propiedades` VALUES (96, 26, 32);
INSERT INTO `armas_propiedades` VALUES (97, 13, 33);
INSERT INTO `armas_propiedades` VALUES (98, 14, 33);
INSERT INTO `armas_propiedades` VALUES (99, 26, 33);
INSERT INTO `armas_propiedades` VALUES (100, 13, 32);
INSERT INTO `armas_propiedades` VALUES (101, 4, 34);
INSERT INTO `armas_propiedades` VALUES (102, 13, 34);
INSERT INTO `armas_propiedades` VALUES (103, 7, 35);
INSERT INTO `armas_propiedades` VALUES (104, 14, 35);
INSERT INTO `armas_propiedades` VALUES (105, 19, 35);
INSERT INTO `armas_propiedades` VALUES (106, 4, 36);
INSERT INTO `armas_propiedades` VALUES (107, 5, 36);
INSERT INTO `armas_propiedades` VALUES (108, 4, 37);
INSERT INTO `armas_propiedades` VALUES (109, 9, 37);
INSERT INTO `armas_propiedades` VALUES (110, 4, 38);
INSERT INTO `armas_propiedades` VALUES (111, 5, 38);
INSERT INTO `armas_propiedades` VALUES (112, 26, 38);
INSERT INTO `armas_propiedades` VALUES (113, 12, 38);
INSERT INTO `armas_propiedades` VALUES (114, 28, 38);
INSERT INTO `armas_propiedades` VALUES (115, 4, 39);
INSERT INTO `armas_propiedades` VALUES (116, 5, 39);
INSERT INTO `armas_propiedades` VALUES (117, 12, 39);
INSERT INTO `armas_propiedades` VALUES (118, 26, 39);
INSERT INTO `armas_propiedades` VALUES (119, 28, 39);
INSERT INTO `armas_propiedades` VALUES (120, 3, 40);
INSERT INTO `armas_propiedades` VALUES (121, 16, 40);
INSERT INTO `armas_propiedades` VALUES (122, 18, 40);
INSERT INTO `armas_propiedades` VALUES (123, 26, 40);
INSERT INTO `armas_propiedades` VALUES (124, 7, 41);
INSERT INTO `armas_propiedades` VALUES (125, 13, 41);
INSERT INTO `armas_propiedades` VALUES (126, 18, 41);
INSERT INTO `armas_propiedades` VALUES (127, 6, 42);
INSERT INTO `armas_propiedades` VALUES (128, 9, 42);
INSERT INTO `armas_propiedades` VALUES (129, 13, 42);
INSERT INTO `armas_propiedades` VALUES (130, 7, 43);
INSERT INTO `armas_propiedades` VALUES (131, 9, 43);
INSERT INTO `armas_propiedades` VALUES (132, 13, 43);
INSERT INTO `armas_propiedades` VALUES (133, 4, 44);
INSERT INTO `armas_propiedades` VALUES (134, 9, 44);
INSERT INTO `armas_propiedades` VALUES (135, 13, 44);
INSERT INTO `armas_propiedades` VALUES (136, 4, 45);
INSERT INTO `armas_propiedades` VALUES (137, 13, 45);
INSERT INTO `armas_propiedades` VALUES (138, 19, 45);
INSERT INTO `armas_propiedades` VALUES (139, 4, 46);
INSERT INTO `armas_propiedades` VALUES (140, 5, 46);
INSERT INTO `armas_propiedades` VALUES (141, 9, 46);
INSERT INTO `armas_propiedades` VALUES (142, 11, 46);
INSERT INTO `armas_propiedades` VALUES (143, 3, 47);
INSERT INTO `armas_propiedades` VALUES (144, 4, 47);
INSERT INTO `armas_propiedades` VALUES (145, 5, 47);
INSERT INTO `armas_propiedades` VALUES (146, 9, 47);
INSERT INTO `armas_propiedades` VALUES (147, 12, 47);
INSERT INTO `armas_propiedades` VALUES (148, 6, 48);
INSERT INTO `armas_propiedades` VALUES (149, 20, 48);
INSERT INTO `armas_propiedades` VALUES (150, 6, 49);
INSERT INTO `armas_propiedades` VALUES (151, 16, 49);
INSERT INTO `armas_propiedades` VALUES (152, 6, 50);
INSERT INTO `armas_propiedades` VALUES (153, 20, 50);
INSERT INTO `armas_propiedades` VALUES (154, 21, 50);
INSERT INTO `armas_propiedades` VALUES (155, 6, 51);
INSERT INTO `armas_propiedades` VALUES (156, 16, 51);
INSERT INTO `armas_propiedades` VALUES (157, 3, 52);
INSERT INTO `armas_propiedades` VALUES (158, 6, 52);
INSERT INTO `armas_propiedades` VALUES (159, 16, 52);
INSERT INTO `armas_propiedades` VALUES (160, 3, 51);
INSERT INTO `armas_propiedades` VALUES (161, 3, 50);
INSERT INTO `armas_propiedades` VALUES (162, 3, 49);
INSERT INTO `armas_propiedades` VALUES (163, 3, 48);
INSERT INTO `armas_propiedades` VALUES (164, 6, 53);
INSERT INTO `armas_propiedades` VALUES (165, 16, 53);
INSERT INTO `armas_propiedades` VALUES (166, 23, 53);
INSERT INTO `armas_propiedades` VALUES (167, 6, 54);
INSERT INTO `armas_propiedades` VALUES (168, 16, 54);
INSERT INTO `armas_propiedades` VALUES (169, 21, 54);
INSERT INTO `armas_propiedades` VALUES (170, 25, 54);
INSERT INTO `armas_propiedades` VALUES (171, 3, 53);
INSERT INTO `armas_propiedades` VALUES (172, 6, 55);
INSERT INTO `armas_propiedades` VALUES (173, 16, 55);
INSERT INTO `armas_propiedades` VALUES (174, 21, 55);
INSERT INTO `armas_propiedades` VALUES (175, 22, 55);
INSERT INTO `armas_propiedades` VALUES (176, 23, 55);
INSERT INTO `armas_propiedades` VALUES (177, 3, 56);
INSERT INTO `armas_propiedades` VALUES (178, 6, 56);
INSERT INTO `armas_propiedades` VALUES (179, 16, 56);
INSERT INTO `armas_propiedades` VALUES (180, 3, 57);
INSERT INTO `armas_propiedades` VALUES (181, 6, 57);
INSERT INTO `armas_propiedades` VALUES (182, 22, 57);
INSERT INTO `armas_propiedades` VALUES (183, 24, 57);
INSERT INTO `armas_propiedades` VALUES (184, 26, 58);
INSERT INTO `armas_propiedades` VALUES (185, 27, 58);
INSERT INTO `armas_propiedades` VALUES (186, 6, 59);
INSERT INTO `armas_propiedades` VALUES (187, 25, 59);
INSERT INTO `armas_propiedades` VALUES (188, 4, 60);
INSERT INTO `armas_propiedades` VALUES (189, 25, 60);
INSERT INTO `armas_propiedades` VALUES (190, 14, 61);
INSERT INTO `armas_propiedades` VALUES (191, 18, 61);
INSERT INTO `armas_propiedades` VALUES (192, 25, 61);
INSERT INTO `armas_propiedades` VALUES (193, 6, 62);
INSERT INTO `armas_propiedades` VALUES (194, 25, 62);
INSERT INTO `armas_propiedades` VALUES (195, 14, 63);
INSERT INTO `armas_propiedades` VALUES (196, 26, 63);
INSERT INTO `armas_propiedades` VALUES (197, 14, 64);
INSERT INTO `armas_propiedades` VALUES (198, 26, 64);

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
) ENGINE = InnoDB AUTO_INCREMENT = 9 CHARACTER SET = utf8mb4 COLLATE = utf8mb4_general_ci ROW_FORMAT = Dynamic;

-- ----------------------------
-- Records of ascendencias
-- ----------------------------
INSERT INTO `ascendencias` VALUES (1, 'Belana', '2023-04-17 23:04:39', '2023-04-17 23:04:39', NULL, NULL, 17, 18);
INSERT INTO `ascendencias` VALUES (2, 'Caronte', '2023-04-17 23:04:54', '2023-04-17 23:04:54', NULL, NULL, 15, 16);
INSERT INTO `ascendencias` VALUES (3, 'Fenrir', '2023-04-17 23:05:12', '2023-04-17 23:05:12', NULL, NULL, 13, 14);
INSERT INTO `ascendencias` VALUES (4, 'Manieth', '2023-04-17 23:05:32', '2023-04-17 23:05:32', NULL, NULL, 5, 6);
INSERT INTO `ascendencias` VALUES (5, 'Kurayami', '2023-04-17 23:05:49', '2023-04-17 23:05:49', NULL, NULL, 7, 8);
INSERT INTO `ascendencias` VALUES (6, 'Tie\'Tsuyin', '2023-04-17 23:07:05', '2023-04-17 23:07:05', NULL, NULL, 3, 4);
INSERT INTO `ascendencias` VALUES (7, 'Kraken', '2023-04-17 23:07:19', '2023-04-17 23:07:19', NULL, NULL, 9, 10);
INSERT INTO `ascendencias` VALUES (8, 'Frediant', '2023-04-17 23:07:49', '2023-04-17 23:07:49', NULL, NULL, 11, 12);

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
) ENGINE = InnoDB AUTO_INCREMENT = 9 CHARACTER SET = utf8mb4 COLLATE = utf8mb4_general_ci ROW_FORMAT = Dynamic;

-- ----------------------------
-- Records of atributos
-- ----------------------------
INSERT INTO `atributos` VALUES (1, 'Fisicos', '2023-04-09 22:16:26', NULL, NULL, NULL);
INSERT INTO `atributos` VALUES (2, 'Mentales', '2023-04-09 22:16:26', NULL, NULL, NULL);
INSERT INTO `atributos` VALUES (3, 'Habilidades', '2023-04-09 22:16:26', NULL, NULL, NULL);
INSERT INTO `atributos` VALUES (4, 'Maestrias', '2023-04-09 22:16:26', NULL, NULL, NULL);
INSERT INTO `atributos` VALUES (5, 'Talentos', '2023-04-09 22:16:26', NULL, NULL, NULL);
INSERT INTO `atributos` VALUES (6, 'PV', '2023-04-09 22:16:26', NULL, NULL, NULL);
INSERT INTO `atributos` VALUES (7, 'Hechizos', '2023-04-09 22:16:26', NULL, NULL, NULL);
INSERT INTO `atributos` VALUES (8, 'Bendiciones', '2023-04-09 22:16:26', NULL, NULL, NULL);

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
  `nivel` int(11) NULL DEFAULT NULL,
  `cantidad_nivel` int(11) NULL DEFAULT NULL,
  PRIMARY KEY (`id`) USING BTREE
) ENGINE = InnoDB AUTO_INCREMENT = 337 CHARACTER SET = utf8mb4 COLLATE = utf8mb4_general_ci ROW_FORMAT = Dynamic;

-- ----------------------------
-- Records of atributos_clases
-- ----------------------------
INSERT INTO `atributos_clases` VALUES (1, 1, 1, '2023-04-18 20:36:11', '2023-04-18 20:36:11', NULL, 1, 1);
INSERT INTO `atributos_clases` VALUES (2, 1, 1, '2023-04-18 20:36:11', '2023-04-18 20:36:11', NULL, 2, 2);
INSERT INTO `atributos_clases` VALUES (3, 1, 1, '2023-04-18 20:36:11', '2023-04-18 20:36:11', NULL, 3, 0);
INSERT INTO `atributos_clases` VALUES (4, 1, 1, '2023-04-18 20:36:11', '2023-04-18 20:36:11', NULL, 4, 2);
INSERT INTO `atributos_clases` VALUES (5, 1, 1, '2023-04-18 20:36:11', '2023-04-18 20:36:11', NULL, 5, 1);
INSERT INTO `atributos_clases` VALUES (6, 1, 1, '2023-04-18 20:36:11', '2023-04-18 20:36:11', NULL, 6, 2);
INSERT INTO `atributos_clases` VALUES (7, 2, 1, '2023-04-18 20:36:11', '2023-04-18 20:36:11', NULL, 1, 1);
INSERT INTO `atributos_clases` VALUES (8, 2, 1, '2023-04-18 20:36:11', '2023-04-18 20:36:11', NULL, 2, 0);
INSERT INTO `atributos_clases` VALUES (9, 2, 1, '2023-04-18 20:36:11', '2023-04-18 20:36:11', NULL, 3, 2);
INSERT INTO `atributos_clases` VALUES (10, 2, 1, '2023-04-18 20:36:11', '2023-04-18 20:36:11', NULL, 4, 1);
INSERT INTO `atributos_clases` VALUES (11, 2, 1, '2023-04-18 20:36:11', '2023-04-18 20:36:11', NULL, 5, 2);
INSERT INTO `atributos_clases` VALUES (12, 2, 1, '2023-04-18 20:36:11', '2023-04-18 20:36:11', NULL, 6, 2);
INSERT INTO `atributos_clases` VALUES (13, 3, 1, '2023-04-18 20:36:11', '2023-04-18 20:36:11', NULL, 1, 2);
INSERT INTO `atributos_clases` VALUES (14, 3, 1, '2023-04-18 20:36:11', '2023-04-18 20:36:11', NULL, 2, 2);
INSERT INTO `atributos_clases` VALUES (15, 3, 1, '2023-04-18 20:36:11', '2023-04-18 20:36:11', NULL, 3, 2);
INSERT INTO `atributos_clases` VALUES (16, 3, 1, '2023-04-18 20:36:11', '2023-04-18 20:36:11', NULL, 4, 3);
INSERT INTO `atributos_clases` VALUES (17, 3, 1, '2023-04-18 20:36:11', '2023-04-18 20:36:11', NULL, 5, 2);
INSERT INTO `atributos_clases` VALUES (18, 3, 1, '2023-04-18 20:36:11', '2023-04-18 20:36:11', NULL, 6, 2);
INSERT INTO `atributos_clases` VALUES (19, 4, 1, '2023-04-18 20:36:11', '2023-04-18 20:36:11', NULL, 1, 0);
INSERT INTO `atributos_clases` VALUES (20, 4, 1, '2023-04-18 20:36:11', '2023-04-18 20:36:11', NULL, 2, 0);
INSERT INTO `atributos_clases` VALUES (21, 4, 1, '2023-04-18 20:36:11', '2023-04-18 20:36:11', NULL, 3, 1);
INSERT INTO `atributos_clases` VALUES (22, 4, 1, '2023-04-18 20:36:11', '2023-04-18 20:36:11', NULL, 4, 1);
INSERT INTO `atributos_clases` VALUES (23, 4, 1, '2023-04-18 20:36:11', '2023-04-18 20:36:11', NULL, 5, 1);
INSERT INTO `atributos_clases` VALUES (24, 4, 1, '2023-04-18 20:36:11', '2023-04-18 20:36:11', NULL, 6, 1);
INSERT INTO `atributos_clases` VALUES (25, 5, 1, '2023-04-18 20:36:11', '2023-04-18 20:36:11', NULL, 1, 1);
INSERT INTO `atributos_clases` VALUES (26, 5, 1, '2023-04-18 20:36:11', '2023-04-18 20:36:11', NULL, 2, 1);
INSERT INTO `atributos_clases` VALUES (27, 5, 1, '2023-04-18 20:36:11', '2023-04-18 20:36:11', NULL, 3, 1);
INSERT INTO `atributos_clases` VALUES (28, 5, 1, '2023-04-18 20:36:11', '2023-04-18 20:36:11', NULL, 4, 1);
INSERT INTO `atributos_clases` VALUES (29, 5, 1, '2023-04-18 20:36:11', '2023-04-18 20:36:11', NULL, 5, 2);
INSERT INTO `atributos_clases` VALUES (30, 5, 1, '2023-04-18 20:36:11', '2023-04-18 20:36:11', NULL, 6, 2);
INSERT INTO `atributos_clases` VALUES (31, 6, 1, '2023-04-18 20:36:11', '2023-04-18 20:36:11', NULL, 1, 1);
INSERT INTO `atributos_clases` VALUES (32, 6, 1, '2023-04-18 20:36:11', '2023-04-18 20:36:11', NULL, 2, 2);
INSERT INTO `atributos_clases` VALUES (33, 6, 1, '2023-04-18 20:36:11', '2023-04-18 20:36:11', NULL, 3, 2);
INSERT INTO `atributos_clases` VALUES (34, 6, 1, '2023-04-18 20:36:11', '2023-04-18 20:36:11', NULL, 4, 1);
INSERT INTO `atributos_clases` VALUES (35, 6, 1, '2023-04-18 20:36:11', '2023-04-18 20:36:11', NULL, 5, 2);
INSERT INTO `atributos_clases` VALUES (36, 6, 1, '2023-04-18 20:36:11', '2023-04-18 20:36:11', NULL, 6, 2);
INSERT INTO `atributos_clases` VALUES (37, 7, 1, '2023-04-18 20:36:11', '2023-04-18 20:36:11', NULL, 1, NULL);
INSERT INTO `atributos_clases` VALUES (38, 7, 1, '2023-04-18 20:36:11', '2023-04-18 20:36:11', NULL, 2, NULL);
INSERT INTO `atributos_clases` VALUES (39, 7, 1, '2023-04-18 20:36:11', '2023-04-18 20:36:11', NULL, 3, NULL);
INSERT INTO `atributos_clases` VALUES (40, 7, 1, '2023-04-18 20:36:11', '2023-04-18 20:36:11', NULL, 4, NULL);
INSERT INTO `atributos_clases` VALUES (41, 7, 1, '2023-04-18 20:36:11', '2023-04-18 20:36:11', NULL, 5, NULL);
INSERT INTO `atributos_clases` VALUES (42, 7, 1, '2023-04-18 20:36:11', '2023-04-18 20:36:11', NULL, 6, NULL);
INSERT INTO `atributos_clases` VALUES (43, 8, 1, '2023-04-18 20:36:11', '2023-04-18 20:36:11', NULL, 1, NULL);
INSERT INTO `atributos_clases` VALUES (44, 8, 1, '2023-04-18 20:36:11', '2023-04-18 20:36:11', NULL, 2, NULL);
INSERT INTO `atributos_clases` VALUES (45, 8, 1, '2023-04-18 20:36:11', '2023-04-18 20:36:11', NULL, 3, NULL);
INSERT INTO `atributos_clases` VALUES (46, 8, 1, '2023-04-18 20:36:11', '2023-04-18 20:36:11', NULL, 4, NULL);
INSERT INTO `atributos_clases` VALUES (47, 8, 1, '2023-04-18 20:36:11', '2023-04-18 20:36:11', NULL, 5, NULL);
INSERT INTO `atributos_clases` VALUES (48, 8, 1, '2023-04-18 20:36:11', '2023-04-18 20:36:11', NULL, 6, NULL);
INSERT INTO `atributos_clases` VALUES (49, 1, 2, '2023-04-19 13:29:18', '2023-04-19 13:29:18', NULL, 1, 3);
INSERT INTO `atributos_clases` VALUES (50, 1, 2, '2023-04-19 13:29:18', '2023-04-19 13:29:18', NULL, 2, 2);
INSERT INTO `atributos_clases` VALUES (51, 1, 2, '2023-04-19 13:29:18', '2023-04-19 13:29:18', NULL, 3, 3);
INSERT INTO `atributos_clases` VALUES (52, 1, 2, '2023-04-19 13:29:18', '2023-04-19 13:29:18', NULL, 4, 2);
INSERT INTO `atributos_clases` VALUES (53, 1, 2, '2023-04-19 13:29:18', '2023-04-19 13:29:18', NULL, 5, 2);
INSERT INTO `atributos_clases` VALUES (54, 1, 2, '2023-04-19 13:29:18', '2023-04-19 13:29:18', NULL, 6, 1);
INSERT INTO `atributos_clases` VALUES (55, 2, 2, '2023-04-19 13:29:18', '2023-04-19 13:29:18', NULL, 1, NULL);
INSERT INTO `atributos_clases` VALUES (56, 2, 2, '2023-04-19 13:29:18', '2023-04-19 13:29:18', NULL, 2, 1);
INSERT INTO `atributos_clases` VALUES (57, 2, 2, '2023-04-19 13:29:18', '2023-04-19 13:29:18', NULL, 3, 1);
INSERT INTO `atributos_clases` VALUES (58, 2, 2, '2023-04-19 13:29:18', '2023-04-19 13:29:18', NULL, 4, 0);
INSERT INTO `atributos_clases` VALUES (59, 2, 2, '2023-04-19 13:29:18', '2023-04-19 13:29:18', NULL, 5, 1);
INSERT INTO `atributos_clases` VALUES (60, 2, 2, '2023-04-19 13:29:18', '2023-04-19 13:29:18', NULL, 6, 1);
INSERT INTO `atributos_clases` VALUES (61, 3, 2, '2023-04-19 13:29:18', '2023-04-19 13:29:18', NULL, 1, 1);
INSERT INTO `atributos_clases` VALUES (62, 3, 2, '2023-04-19 13:29:18', '2023-04-19 13:29:18', NULL, 2, 1);
INSERT INTO `atributos_clases` VALUES (63, 3, 2, '2023-04-19 13:29:18', '2023-04-19 13:29:18', NULL, 3, 1);
INSERT INTO `atributos_clases` VALUES (64, 3, 2, '2023-04-19 13:29:18', '2023-04-19 13:29:18', NULL, 4, 2);
INSERT INTO `atributos_clases` VALUES (65, 3, 2, '2023-04-19 13:29:18', '2023-04-19 13:29:18', NULL, 5, 2);
INSERT INTO `atributos_clases` VALUES (66, 3, 2, '2023-04-19 13:29:18', '2023-04-19 13:29:18', NULL, 6, 3);
INSERT INTO `atributos_clases` VALUES (67, 4, 2, '2023-04-19 13:29:18', '2023-04-19 13:29:18', NULL, 1, NULL);
INSERT INTO `atributos_clases` VALUES (68, 4, 2, '2023-04-19 13:29:18', '2023-04-19 13:29:18', NULL, 2, NULL);
INSERT INTO `atributos_clases` VALUES (69, 4, 2, '2023-04-19 13:29:18', '2023-04-19 13:29:18', NULL, 3, NULL);
INSERT INTO `atributos_clases` VALUES (70, 4, 2, '2023-04-19 13:29:18', '2023-04-19 13:29:18', NULL, 4, 1);
INSERT INTO `atributos_clases` VALUES (71, 4, 2, '2023-04-19 13:29:18', '2023-04-19 13:29:18', NULL, 5, 1);
INSERT INTO `atributos_clases` VALUES (72, 4, 2, '2023-04-19 13:29:18', '2023-04-19 13:29:18', NULL, 6, 2);
INSERT INTO `atributos_clases` VALUES (73, 5, 2, '2023-04-19 13:29:18', '2023-04-19 13:29:18', NULL, 1, 1);
INSERT INTO `atributos_clases` VALUES (74, 5, 2, '2023-04-19 13:29:18', '2023-04-19 13:29:18', NULL, 2, 1);
INSERT INTO `atributos_clases` VALUES (75, 5, 2, '2023-04-19 13:29:18', '2023-04-19 13:29:18', NULL, 3, 2);
INSERT INTO `atributos_clases` VALUES (76, 5, 2, '2023-04-19 13:29:18', '2023-04-19 13:29:18', NULL, 4, 2);
INSERT INTO `atributos_clases` VALUES (77, 5, 2, '2023-04-19 13:29:18', '2023-04-19 13:29:18', NULL, 5, 2);
INSERT INTO `atributos_clases` VALUES (78, 5, 2, '2023-04-19 13:29:18', '2023-04-19 13:29:18', NULL, 6, 2);
INSERT INTO `atributos_clases` VALUES (79, 6, 2, '2023-04-19 13:29:18', '2023-04-19 13:29:18', NULL, 1, 1);
INSERT INTO `atributos_clases` VALUES (80, 6, 2, '2023-04-19 13:29:18', '2023-04-19 13:29:18', NULL, 2, 2);
INSERT INTO `atributos_clases` VALUES (81, 6, 2, '2023-04-19 13:29:18', '2023-04-19 13:29:18', NULL, 3, 1);
INSERT INTO `atributos_clases` VALUES (82, 6, 2, '2023-04-19 13:29:18', '2023-04-19 13:29:18', NULL, 4, 2);
INSERT INTO `atributos_clases` VALUES (83, 6, 2, '2023-04-19 13:29:18', '2023-04-19 13:29:18', NULL, 5, 2);
INSERT INTO `atributos_clases` VALUES (84, 6, 2, '2023-04-19 13:29:18', '2023-04-19 13:29:18', NULL, 6, 2);
INSERT INTO `atributos_clases` VALUES (85, 7, 2, '2023-04-19 13:29:18', '2023-04-19 13:29:18', NULL, 1, NULL);
INSERT INTO `atributos_clases` VALUES (86, 7, 2, '2023-04-19 13:29:18', '2023-04-19 13:29:18', NULL, 2, NULL);
INSERT INTO `atributos_clases` VALUES (87, 7, 2, '2023-04-19 13:29:18', '2023-04-19 13:29:18', NULL, 3, NULL);
INSERT INTO `atributos_clases` VALUES (88, 7, 2, '2023-04-19 13:29:18', '2023-04-19 13:29:18', NULL, 4, NULL);
INSERT INTO `atributos_clases` VALUES (89, 7, 2, '2023-04-19 13:29:18', '2023-04-19 13:29:18', NULL, 5, NULL);
INSERT INTO `atributos_clases` VALUES (90, 7, 2, '2023-04-19 13:29:18', '2023-04-19 13:29:18', NULL, 6, NULL);
INSERT INTO `atributos_clases` VALUES (91, 8, 2, '2023-04-19 13:29:18', '2023-04-19 13:29:18', NULL, 1, NULL);
INSERT INTO `atributos_clases` VALUES (92, 8, 2, '2023-04-19 13:29:18', '2023-04-19 13:29:18', NULL, 2, NULL);
INSERT INTO `atributos_clases` VALUES (93, 8, 2, '2023-04-19 13:29:18', '2023-04-19 13:29:18', NULL, 3, NULL);
INSERT INTO `atributos_clases` VALUES (94, 8, 2, '2023-04-19 13:29:18', '2023-04-19 13:29:18', NULL, 4, NULL);
INSERT INTO `atributos_clases` VALUES (95, 8, 2, '2023-04-19 13:29:18', '2023-04-19 13:29:18', NULL, 5, NULL);
INSERT INTO `atributos_clases` VALUES (96, 8, 2, '2023-04-19 13:29:18', '2023-04-19 13:29:18', NULL, 6, NULL);
INSERT INTO `atributos_clases` VALUES (97, 1, 3, '2023-04-19 14:22:24', '2023-04-19 14:22:24', NULL, 1, 0);
INSERT INTO `atributos_clases` VALUES (98, 1, 3, '2023-04-19 14:22:24', '2023-04-19 14:22:24', NULL, 2, 1);
INSERT INTO `atributos_clases` VALUES (99, 1, 3, '2023-04-19 14:22:24', '2023-04-19 14:22:24', NULL, 3, 1);
INSERT INTO `atributos_clases` VALUES (100, 1, 3, '2023-04-19 14:22:24', '2023-04-19 14:22:24', NULL, 4, 0);
INSERT INTO `atributos_clases` VALUES (101, 1, 3, '2023-04-19 14:22:24', '2023-04-19 14:22:24', NULL, 5, 1);
INSERT INTO `atributos_clases` VALUES (102, 1, 3, '2023-04-19 14:22:24', '2023-04-19 14:22:24', NULL, 6, 2);
INSERT INTO `atributos_clases` VALUES (103, 2, 3, '2023-04-19 14:22:24', '2023-04-19 14:22:24', NULL, 1, 2);
INSERT INTO `atributos_clases` VALUES (104, 2, 3, '2023-04-19 14:22:24', '2023-04-19 14:22:24', NULL, 2, 1);
INSERT INTO `atributos_clases` VALUES (105, 2, 3, '2023-04-19 14:22:24', '2023-04-19 14:22:24', NULL, 3, 2);
INSERT INTO `atributos_clases` VALUES (106, 2, 3, '2023-04-19 14:22:24', '2023-04-19 14:22:24', NULL, 4, 3);
INSERT INTO `atributos_clases` VALUES (107, 2, 3, '2023-04-19 14:22:25', '2023-04-19 14:22:25', NULL, 5, 2);
INSERT INTO `atributos_clases` VALUES (108, 2, 3, '2023-04-19 14:22:25', '2023-04-19 14:22:25', NULL, 6, 1);
INSERT INTO `atributos_clases` VALUES (109, 3, 3, '2023-04-19 14:22:25', '2023-04-19 14:22:25', NULL, 1, 2);
INSERT INTO `atributos_clases` VALUES (110, 3, 3, '2023-04-19 14:22:25', '2023-04-19 14:22:25', NULL, 2, 2);
INSERT INTO `atributos_clases` VALUES (111, 3, 3, '2023-04-19 14:22:25', '2023-04-19 14:22:25', NULL, 3, 1);
INSERT INTO `atributos_clases` VALUES (112, 3, 3, '2023-04-19 14:22:25', '2023-04-19 14:22:25', NULL, 4, 2);
INSERT INTO `atributos_clases` VALUES (113, 3, 3, '2023-04-19 14:22:25', '2023-04-19 14:22:25', NULL, 5, 2);
INSERT INTO `atributos_clases` VALUES (114, 3, 3, '2023-04-19 14:22:25', '2023-04-19 14:22:25', NULL, 6, 2);
INSERT INTO `atributos_clases` VALUES (115, 4, 3, '2023-04-19 14:22:25', '2023-04-19 14:22:25', NULL, 1, 0);
INSERT INTO `atributos_clases` VALUES (116, 4, 3, '2023-04-19 14:22:25', '2023-04-19 14:22:25', NULL, 2, NULL);
INSERT INTO `atributos_clases` VALUES (117, 4, 3, '2023-04-19 14:22:25', '2023-04-19 14:22:25', NULL, 3, 1);
INSERT INTO `atributos_clases` VALUES (118, 4, 3, '2023-04-19 14:22:25', '2023-04-19 14:22:25', NULL, 4, 1);
INSERT INTO `atributos_clases` VALUES (119, 4, 3, '2023-04-19 14:22:25', '2023-04-19 14:22:25', NULL, 5, 0);
INSERT INTO `atributos_clases` VALUES (120, 4, 3, '2023-04-19 14:22:25', '2023-04-19 14:22:25', NULL, 6, 1);
INSERT INTO `atributos_clases` VALUES (121, 5, 3, '2023-04-19 14:22:25', '2023-04-19 14:22:25', NULL, 1, 1);
INSERT INTO `atributos_clases` VALUES (122, 5, 3, '2023-04-19 14:22:25', '2023-04-19 14:22:25', NULL, 2, 1);
INSERT INTO `atributos_clases` VALUES (123, 5, 3, '2023-04-19 14:22:25', '2023-04-19 14:22:25', NULL, 3, 1);
INSERT INTO `atributos_clases` VALUES (124, 5, 3, '2023-04-19 14:22:25', '2023-04-19 14:22:25', NULL, 4, 1);
INSERT INTO `atributos_clases` VALUES (125, 5, 3, '2023-04-19 14:22:25', '2023-04-19 14:22:25', NULL, 5, 2);
INSERT INTO `atributos_clases` VALUES (126, 5, 3, '2023-04-19 14:22:25', '2023-04-19 14:22:25', NULL, 6, 1);
INSERT INTO `atributos_clases` VALUES (127, 6, 3, '2023-04-19 14:22:25', '2023-04-19 14:22:25', NULL, 1, 1);
INSERT INTO `atributos_clases` VALUES (128, 6, 3, '2023-04-19 14:22:25', '2023-04-19 14:22:25', NULL, 2, 1);
INSERT INTO `atributos_clases` VALUES (129, 6, 3, '2023-04-19 14:22:25', '2023-04-19 14:22:25', NULL, 3, 1);
INSERT INTO `atributos_clases` VALUES (130, 6, 3, '2023-04-19 14:22:25', '2023-04-19 14:22:25', NULL, 4, 1);
INSERT INTO `atributos_clases` VALUES (131, 6, 3, '2023-04-19 14:22:25', '2023-04-19 14:22:25', NULL, 5, 1);
INSERT INTO `atributos_clases` VALUES (132, 6, 3, '2023-04-19 14:22:25', '2023-04-19 14:22:25', NULL, 6, 2);
INSERT INTO `atributos_clases` VALUES (133, 7, 3, '2023-04-19 14:22:25', '2023-04-19 14:22:25', NULL, 1, NULL);
INSERT INTO `atributos_clases` VALUES (134, 7, 3, '2023-04-19 14:22:25', '2023-04-19 14:22:25', NULL, 2, 1);
INSERT INTO `atributos_clases` VALUES (135, 7, 3, '2023-04-19 14:22:25', '2023-04-19 14:22:25', NULL, 3, NULL);
INSERT INTO `atributos_clases` VALUES (136, 7, 3, '2023-04-19 14:22:25', '2023-04-19 14:22:25', NULL, 4, 1);
INSERT INTO `atributos_clases` VALUES (137, 7, 3, '2023-04-19 14:22:25', '2023-04-19 14:22:25', NULL, 5, 1);
INSERT INTO `atributos_clases` VALUES (138, 7, 3, '2023-04-19 14:22:25', '2023-04-19 14:22:25', NULL, 6, 1);
INSERT INTO `atributos_clases` VALUES (139, 8, 3, '2023-04-19 14:22:25', '2023-04-19 14:22:25', NULL, 1, NULL);
INSERT INTO `atributos_clases` VALUES (140, 8, 3, '2023-04-19 14:22:25', '2023-04-19 14:22:25', NULL, 2, 0);
INSERT INTO `atributos_clases` VALUES (141, 8, 3, '2023-04-19 14:22:25', '2023-04-19 14:22:25', NULL, 3, 1);
INSERT INTO `atributos_clases` VALUES (142, 8, 3, '2023-04-19 14:22:25', '2023-04-19 14:22:25', NULL, 4, NULL);
INSERT INTO `atributos_clases` VALUES (143, 8, 3, '2023-04-19 14:22:25', '2023-04-19 14:22:25', NULL, 5, 1);
INSERT INTO `atributos_clases` VALUES (144, 8, 3, '2023-04-19 14:22:25', '2023-04-19 14:22:25', NULL, 6, 1);
INSERT INTO `atributos_clases` VALUES (145, 1, 4, '2023-04-19 16:02:22', '2023-04-19 16:02:22', NULL, 1, 3);
INSERT INTO `atributos_clases` VALUES (146, 1, 4, '2023-04-19 16:02:22', '2023-04-19 16:02:22', NULL, 2, 2);
INSERT INTO `atributos_clases` VALUES (147, 1, 4, '2023-04-19 16:02:22', '2023-04-19 16:02:22', NULL, 3, 2);
INSERT INTO `atributos_clases` VALUES (148, 1, 4, '2023-04-19 16:02:22', '2023-04-19 16:02:22', NULL, 4, 2);
INSERT INTO `atributos_clases` VALUES (149, 1, 4, '2023-04-19 16:02:22', '2023-04-19 16:02:22', NULL, 5, 3);
INSERT INTO `atributos_clases` VALUES (150, 1, 4, '2023-04-19 16:02:22', '2023-04-19 16:02:22', NULL, 6, 2);
INSERT INTO `atributos_clases` VALUES (151, 2, 4, '2023-04-19 16:02:22', '2023-04-19 16:02:22', NULL, 1, 0);
INSERT INTO `atributos_clases` VALUES (152, 2, 4, '2023-04-19 16:02:22', '2023-04-19 16:02:22', NULL, 2, 1);
INSERT INTO `atributos_clases` VALUES (153, 2, 4, '2023-04-19 16:02:22', '2023-04-19 16:02:22', NULL, 3, 1);
INSERT INTO `atributos_clases` VALUES (154, 2, 4, '2023-04-19 16:02:22', '2023-04-19 16:02:22', NULL, 4, 1);
INSERT INTO `atributos_clases` VALUES (155, 2, 4, '2023-04-19 16:02:22', '2023-04-19 16:02:22', NULL, 5, 0);
INSERT INTO `atributos_clases` VALUES (156, 2, 4, '2023-04-19 16:02:22', '2023-04-19 16:02:22', NULL, 6, 1);
INSERT INTO `atributos_clases` VALUES (157, 3, 4, '2023-04-19 16:02:22', '2023-04-19 16:02:22', NULL, 1, 1);
INSERT INTO `atributos_clases` VALUES (158, 3, 4, '2023-04-19 16:02:22', '2023-04-19 16:02:22', NULL, 2, 1);
INSERT INTO `atributos_clases` VALUES (159, 3, 4, '2023-04-19 16:02:22', '2023-04-19 16:02:22', NULL, 3, 1);
INSERT INTO `atributos_clases` VALUES (160, 3, 4, '2023-04-19 16:02:22', '2023-04-19 16:02:22', NULL, 4, 1);
INSERT INTO `atributos_clases` VALUES (161, 3, 4, '2023-04-19 16:02:22', '2023-04-19 16:02:22', NULL, 5, 2);
INSERT INTO `atributos_clases` VALUES (162, 3, 4, '2023-04-19 16:02:22', '2023-04-19 16:02:22', NULL, 6, 2);
INSERT INTO `atributos_clases` VALUES (163, 4, 4, '2023-04-19 16:02:22', '2023-04-19 16:02:22', NULL, 1, 0);
INSERT INTO `atributos_clases` VALUES (164, 4, 4, '2023-04-19 16:02:22', '2023-04-19 16:02:22', NULL, 2, 0);
INSERT INTO `atributos_clases` VALUES (165, 4, 4, '2023-04-19 16:02:22', '2023-04-19 16:02:22', NULL, 3, NULL);
INSERT INTO `atributos_clases` VALUES (166, 4, 4, '2023-04-19 16:02:22', '2023-04-19 16:02:22', NULL, 4, 1);
INSERT INTO `atributos_clases` VALUES (167, 4, 4, '2023-04-19 16:02:22', '2023-04-19 16:02:22', NULL, 5, 1);
INSERT INTO `atributos_clases` VALUES (168, 4, 4, '2023-04-19 16:02:22', '2023-04-19 16:02:22', NULL, 6, 1);
INSERT INTO `atributos_clases` VALUES (169, 5, 4, '2023-04-19 16:02:22', '2023-04-19 16:02:22', NULL, 1, 1);
INSERT INTO `atributos_clases` VALUES (170, 5, 4, '2023-04-19 16:02:22', '2023-04-19 16:02:22', NULL, 2, 2);
INSERT INTO `atributos_clases` VALUES (171, 5, 4, '2023-04-19 16:02:22', '2023-04-19 16:02:22', NULL, 3, 2);
INSERT INTO `atributos_clases` VALUES (172, 5, 4, '2023-04-19 16:02:22', '2023-04-19 16:02:22', NULL, 4, 2);
INSERT INTO `atributos_clases` VALUES (173, 5, 4, '2023-04-19 16:02:22', '2023-04-19 16:02:22', NULL, 5, 1);
INSERT INTO `atributos_clases` VALUES (174, 5, 4, '2023-04-19 16:02:22', '2023-04-19 16:02:22', NULL, 6, 3);
INSERT INTO `atributos_clases` VALUES (175, 6, 4, '2023-04-19 16:02:22', '2023-04-19 16:02:22', NULL, 1, 1);
INSERT INTO `atributos_clases` VALUES (176, 6, 4, '2023-04-19 16:02:22', '2023-04-19 16:02:22', NULL, 2, 1);
INSERT INTO `atributos_clases` VALUES (177, 6, 4, '2023-04-19 16:02:22', '2023-04-19 16:02:22', NULL, 3, 2);
INSERT INTO `atributos_clases` VALUES (178, 6, 4, '2023-04-19 16:02:22', '2023-04-19 16:02:22', NULL, 4, 3);
INSERT INTO `atributos_clases` VALUES (179, 6, 4, '2023-04-19 16:02:22', '2023-04-19 16:02:22', NULL, 5, 3);
INSERT INTO `atributos_clases` VALUES (180, 6, 4, '2023-04-19 16:02:22', '2023-04-19 16:02:22', NULL, 6, 3);
INSERT INTO `atributos_clases` VALUES (181, 7, 4, '2023-04-19 16:02:22', '2023-04-19 16:02:22', NULL, 1, NULL);
INSERT INTO `atributos_clases` VALUES (182, 7, 4, '2023-04-19 16:02:22', '2023-04-19 16:02:22', NULL, 2, NULL);
INSERT INTO `atributos_clases` VALUES (183, 7, 4, '2023-04-19 16:02:22', '2023-04-19 16:02:22', NULL, 3, NULL);
INSERT INTO `atributos_clases` VALUES (184, 7, 4, '2023-04-19 16:02:22', '2023-04-19 16:02:22', NULL, 4, NULL);
INSERT INTO `atributos_clases` VALUES (185, 7, 4, '2023-04-19 16:02:22', '2023-04-19 16:02:22', NULL, 5, NULL);
INSERT INTO `atributos_clases` VALUES (186, 7, 4, '2023-04-19 16:02:22', '2023-04-19 16:02:22', NULL, 6, NULL);
INSERT INTO `atributos_clases` VALUES (187, 8, 4, '2023-04-19 16:02:22', '2023-04-19 16:02:22', NULL, 1, NULL);
INSERT INTO `atributos_clases` VALUES (188, 8, 4, '2023-04-19 16:02:22', '2023-04-19 16:02:22', NULL, 2, NULL);
INSERT INTO `atributos_clases` VALUES (189, 8, 4, '2023-04-19 16:02:22', '2023-04-19 16:02:22', NULL, 3, NULL);
INSERT INTO `atributos_clases` VALUES (190, 8, 4, '2023-04-19 16:02:22', '2023-04-19 16:02:22', NULL, 4, NULL);
INSERT INTO `atributos_clases` VALUES (191, 8, 4, '2023-04-19 16:02:22', '2023-04-19 16:02:22', NULL, 5, NULL);
INSERT INTO `atributos_clases` VALUES (192, 8, 4, '2023-04-19 16:02:22', '2023-04-19 16:02:22', NULL, 6, NULL);
INSERT INTO `atributos_clases` VALUES (193, 1, 5, '2023-04-19 16:34:28', '2023-04-19 16:34:28', NULL, 1, 0);
INSERT INTO `atributos_clases` VALUES (194, 1, 5, '2023-04-19 16:34:28', '2023-04-19 16:34:28', NULL, 2, 0);
INSERT INTO `atributos_clases` VALUES (195, 1, 5, '2023-04-19 16:34:28', '2023-04-19 16:34:28', NULL, 3, 1);
INSERT INTO `atributos_clases` VALUES (196, 1, 5, '2023-04-19 16:34:28', '2023-04-19 16:34:28', NULL, 4, 1);
INSERT INTO `atributos_clases` VALUES (197, 1, 5, '2023-04-19 16:34:28', '2023-04-19 16:34:28', NULL, 5, 1);
INSERT INTO `atributos_clases` VALUES (198, 1, 5, '2023-04-19 16:34:28', '2023-04-19 16:34:28', NULL, 6, 2);
INSERT INTO `atributos_clases` VALUES (199, 2, 5, '2023-04-19 16:34:28', '2023-04-19 16:34:28', NULL, 1, 0);
INSERT INTO `atributos_clases` VALUES (200, 2, 5, '2023-04-19 16:34:28', '2023-04-19 16:34:28', NULL, 2, 1);
INSERT INTO `atributos_clases` VALUES (201, 2, 5, '2023-04-19 16:34:28', '2023-04-19 16:34:28', NULL, 3, 0);
INSERT INTO `atributos_clases` VALUES (202, 2, 5, '2023-04-19 16:34:28', '2023-04-19 16:34:28', NULL, 4, 1);
INSERT INTO `atributos_clases` VALUES (203, 2, 5, '2023-04-19 16:34:28', '2023-04-19 16:34:28', NULL, 5, 2);
INSERT INTO `atributos_clases` VALUES (204, 2, 5, '2023-04-19 16:34:28', '2023-04-19 16:34:28', NULL, 6, 1);
INSERT INTO `atributos_clases` VALUES (205, 3, 5, '2023-04-19 16:34:28', '2023-04-19 16:34:28', NULL, 1, 4);
INSERT INTO `atributos_clases` VALUES (206, 3, 5, '2023-04-19 16:34:28', '2023-04-19 16:34:28', NULL, 2, 4);
INSERT INTO `atributos_clases` VALUES (207, 3, 5, '2023-04-19 16:34:28', '2023-04-19 16:34:28', NULL, 3, 4);
INSERT INTO `atributos_clases` VALUES (208, 3, 5, '2023-04-19 16:34:28', '2023-04-19 16:34:28', NULL, 4, 4);
INSERT INTO `atributos_clases` VALUES (209, 3, 5, '2023-04-19 16:34:28', '2023-04-19 16:34:28', NULL, 5, 4);
INSERT INTO `atributos_clases` VALUES (210, 3, 5, '2023-04-19 16:34:28', '2023-04-19 16:34:28', NULL, 6, 4);
INSERT INTO `atributos_clases` VALUES (211, 4, 5, '2023-04-19 16:34:28', '2023-04-19 16:34:28', NULL, 1, 0);
INSERT INTO `atributos_clases` VALUES (212, 4, 5, '2023-04-19 16:34:28', '2023-04-19 16:34:28', NULL, 2, 0);
INSERT INTO `atributos_clases` VALUES (213, 4, 5, '2023-04-19 16:34:28', '2023-04-19 16:34:28', NULL, 3, 1);
INSERT INTO `atributos_clases` VALUES (214, 4, 5, '2023-04-19 16:34:28', '2023-04-19 16:34:28', NULL, 4, 1);
INSERT INTO `atributos_clases` VALUES (215, 4, 5, '2023-04-19 16:34:28', '2023-04-19 16:34:28', NULL, 5, 1);
INSERT INTO `atributos_clases` VALUES (216, 4, 5, '2023-04-19 16:34:28', '2023-04-19 16:34:28', NULL, 6, 2);
INSERT INTO `atributos_clases` VALUES (217, 5, 5, '2023-04-19 16:34:28', '2023-04-19 16:34:28', NULL, 1, 2);
INSERT INTO `atributos_clases` VALUES (218, 5, 5, '2023-04-19 16:34:28', '2023-04-19 16:34:28', NULL, 2, 1);
INSERT INTO `atributos_clases` VALUES (219, 5, 5, '2023-04-19 16:34:28', '2023-04-19 16:34:28', NULL, 3, 1);
INSERT INTO `atributos_clases` VALUES (220, 5, 5, '2023-04-19 16:34:28', '2023-04-19 16:34:28', NULL, 4, 1);
INSERT INTO `atributos_clases` VALUES (221, 5, 5, '2023-04-19 16:34:28', '2023-04-19 16:34:28', NULL, 5, 1);
INSERT INTO `atributos_clases` VALUES (222, 5, 5, '2023-04-19 16:34:28', '2023-04-19 16:34:28', NULL, 6, 1);
INSERT INTO `atributos_clases` VALUES (223, 6, 5, '2023-04-19 16:34:28', '2023-04-19 16:34:28', NULL, 1, 0);
INSERT INTO `atributos_clases` VALUES (224, 6, 5, '2023-04-19 16:34:28', '2023-04-19 16:34:28', NULL, 2, 1);
INSERT INTO `atributos_clases` VALUES (225, 6, 5, '2023-04-19 16:34:28', '2023-04-19 16:34:28', NULL, 3, 1);
INSERT INTO `atributos_clases` VALUES (226, 6, 5, '2023-04-19 16:34:28', '2023-04-19 16:34:28', NULL, 4, 1);
INSERT INTO `atributos_clases` VALUES (227, 6, 5, '2023-04-19 16:34:28', '2023-04-19 16:34:28', NULL, 5, 1);
INSERT INTO `atributos_clases` VALUES (228, 6, 5, '2023-04-19 16:34:28', '2023-04-19 16:34:28', NULL, 6, 1);
INSERT INTO `atributos_clases` VALUES (229, 7, 5, '2023-04-19 16:34:28', '2023-04-19 16:34:28', NULL, 1, NULL);
INSERT INTO `atributos_clases` VALUES (230, 7, 5, '2023-04-19 16:34:28', '2023-04-19 16:34:28', NULL, 2, NULL);
INSERT INTO `atributos_clases` VALUES (231, 7, 5, '2023-04-19 16:34:28', '2023-04-19 16:34:28', NULL, 3, NULL);
INSERT INTO `atributos_clases` VALUES (232, 7, 5, '2023-04-19 16:34:28', '2023-04-19 16:34:28', NULL, 4, NULL);
INSERT INTO `atributos_clases` VALUES (233, 7, 5, '2023-04-19 16:34:28', '2023-04-19 16:34:28', NULL, 5, NULL);
INSERT INTO `atributos_clases` VALUES (234, 7, 5, '2023-04-19 16:34:28', '2023-04-19 16:34:28', NULL, 6, NULL);
INSERT INTO `atributos_clases` VALUES (235, 8, 5, '2023-04-19 16:34:28', '2023-04-19 16:34:28', NULL, 1, NULL);
INSERT INTO `atributos_clases` VALUES (236, 8, 5, '2023-04-19 16:34:28', '2023-04-19 16:34:28', NULL, 2, NULL);
INSERT INTO `atributos_clases` VALUES (237, 8, 5, '2023-04-19 16:34:28', '2023-04-19 16:34:28', NULL, 3, NULL);
INSERT INTO `atributos_clases` VALUES (238, 8, 5, '2023-04-19 16:34:28', '2023-04-19 16:34:28', NULL, 4, NULL);
INSERT INTO `atributos_clases` VALUES (239, 8, 5, '2023-04-19 16:34:28', '2023-04-19 16:34:28', NULL, 5, NULL);
INSERT INTO `atributos_clases` VALUES (240, 8, 5, '2023-04-19 16:34:28', '2023-04-19 16:34:28', NULL, 6, NULL);
INSERT INTO `atributos_clases` VALUES (241, 1, 6, '2023-04-19 16:56:52', '2023-04-19 16:56:52', NULL, 1, 0);
INSERT INTO `atributos_clases` VALUES (242, 1, 6, '2023-04-19 16:56:52', '2023-04-19 16:56:52', NULL, 2, 1);
INSERT INTO `atributos_clases` VALUES (243, 1, 6, '2023-04-19 16:56:52', '2023-04-19 16:56:52', NULL, 3, 2);
INSERT INTO `atributos_clases` VALUES (244, 1, 6, '2023-04-19 16:56:52', '2023-04-19 16:56:52', NULL, 4, 1);
INSERT INTO `atributos_clases` VALUES (245, 1, 6, '2023-04-19 16:56:52', '2023-04-19 16:56:52', NULL, 5, 2);
INSERT INTO `atributos_clases` VALUES (246, 1, 6, '2023-04-19 16:56:52', '2023-04-19 16:56:52', NULL, 6, 2);
INSERT INTO `atributos_clases` VALUES (247, 2, 6, '2023-04-19 16:56:52', '2023-04-19 16:56:52', NULL, 1, 2);
INSERT INTO `atributos_clases` VALUES (248, 2, 6, '2023-04-19 16:56:52', '2023-04-19 16:56:52', NULL, 2, 1);
INSERT INTO `atributos_clases` VALUES (249, 2, 6, '2023-04-19 16:56:52', '2023-04-19 16:56:52', NULL, 3, 2);
INSERT INTO `atributos_clases` VALUES (250, 2, 6, '2023-04-19 16:56:53', '2023-04-19 16:56:53', NULL, 4, 2);
INSERT INTO `atributos_clases` VALUES (251, 2, 6, '2023-04-19 16:56:53', '2023-04-19 16:56:53', NULL, 5, 1);
INSERT INTO `atributos_clases` VALUES (252, 2, 6, '2023-04-19 16:56:53', '2023-04-19 16:56:53', NULL, 6, 2);
INSERT INTO `atributos_clases` VALUES (253, 3, 6, '2023-04-19 16:56:53', '2023-04-19 16:56:53', NULL, 1, 3);
INSERT INTO `atributos_clases` VALUES (254, 3, 6, '2023-04-19 16:56:53', '2023-04-19 16:56:53', NULL, 2, 3);
INSERT INTO `atributos_clases` VALUES (255, 3, 6, '2023-04-19 16:56:53', '2023-04-19 16:56:53', NULL, 3, 2);
INSERT INTO `atributos_clases` VALUES (256, 3, 6, '2023-04-19 16:56:53', '2023-04-19 16:56:53', NULL, 4, 3);
INSERT INTO `atributos_clases` VALUES (257, 3, 6, '2023-04-19 16:56:53', '2023-04-19 16:56:53', NULL, 5, 3);
INSERT INTO `atributos_clases` VALUES (258, 3, 6, '2023-04-19 16:56:53', '2023-04-19 16:56:53', NULL, 6, 3);
INSERT INTO `atributos_clases` VALUES (259, 4, 6, '2023-04-19 16:56:53', '2023-04-19 16:56:53', NULL, 1, 0);
INSERT INTO `atributos_clases` VALUES (260, 4, 6, '2023-04-19 16:56:53', '2023-04-19 16:56:53', NULL, 2, 1);
INSERT INTO `atributos_clases` VALUES (261, 4, 6, '2023-04-19 16:56:53', '2023-04-19 16:56:53', NULL, 3, 0);
INSERT INTO `atributos_clases` VALUES (262, 4, 6, '2023-04-19 16:56:53', '2023-04-19 16:56:53', NULL, 4, 1);
INSERT INTO `atributos_clases` VALUES (263, 4, 6, '2023-04-19 16:56:53', '2023-04-19 16:56:53', NULL, 5, 1);
INSERT INTO `atributos_clases` VALUES (264, 4, 6, '2023-04-19 16:56:53', '2023-04-19 16:56:53', NULL, 6, 1);
INSERT INTO `atributos_clases` VALUES (265, 5, 6, '2023-04-19 16:56:53', '2023-04-19 16:56:53', NULL, 1, 1);
INSERT INTO `atributos_clases` VALUES (266, 5, 6, '2023-04-19 16:56:53', '2023-04-19 16:56:53', NULL, 2, 1);
INSERT INTO `atributos_clases` VALUES (267, 5, 6, '2023-04-19 16:56:53', '2023-04-19 16:56:53', NULL, 3, 2);
INSERT INTO `atributos_clases` VALUES (268, 5, 6, '2023-04-19 16:56:53', '2023-04-19 16:56:53', NULL, 4, 1);
INSERT INTO `atributos_clases` VALUES (269, 5, 6, '2023-04-19 16:56:53', '2023-04-19 16:56:53', NULL, 5, 1);
INSERT INTO `atributos_clases` VALUES (270, 5, 6, '2023-04-19 16:56:53', '2023-04-19 16:56:53', NULL, 6, 1);
INSERT INTO `atributos_clases` VALUES (271, 6, 6, '2023-04-19 16:56:53', '2023-04-19 16:56:53', NULL, 1, 0);
INSERT INTO `atributos_clases` VALUES (272, 6, 6, '2023-04-19 16:56:53', '2023-04-19 16:56:53', NULL, 2, 0);
INSERT INTO `atributos_clases` VALUES (273, 6, 6, '2023-04-19 16:56:53', '2023-04-19 16:56:53', NULL, 3, 1);
INSERT INTO `atributos_clases` VALUES (274, 6, 6, '2023-04-19 16:56:53', '2023-04-19 16:56:53', NULL, 4, 1);
INSERT INTO `atributos_clases` VALUES (275, 6, 6, '2023-04-19 16:56:53', '2023-04-19 16:56:53', NULL, 5, 2);
INSERT INTO `atributos_clases` VALUES (276, 6, 6, '2023-04-19 16:56:53', '2023-04-19 16:56:53', NULL, 6, 2);
INSERT INTO `atributos_clases` VALUES (277, 7, 6, '2023-04-19 16:56:53', '2023-04-19 16:56:53', NULL, 1, NULL);
INSERT INTO `atributos_clases` VALUES (278, 7, 6, '2023-04-19 16:56:53', '2023-04-19 16:56:53', NULL, 2, NULL);
INSERT INTO `atributos_clases` VALUES (279, 7, 6, '2023-04-19 16:56:53', '2023-04-19 16:56:53', NULL, 3, NULL);
INSERT INTO `atributos_clases` VALUES (280, 7, 6, '2023-04-19 16:56:53', '2023-04-19 16:56:53', NULL, 4, NULL);
INSERT INTO `atributos_clases` VALUES (281, 7, 6, '2023-04-19 16:56:53', '2023-04-19 16:56:53', NULL, 5, NULL);
INSERT INTO `atributos_clases` VALUES (282, 7, 6, '2023-04-19 16:56:53', '2023-04-19 16:56:53', NULL, 6, NULL);
INSERT INTO `atributos_clases` VALUES (283, 8, 6, '2023-04-19 16:56:53', '2023-04-19 16:56:53', NULL, 1, NULL);
INSERT INTO `atributos_clases` VALUES (284, 8, 6, '2023-04-19 16:56:53', '2023-04-19 16:56:53', NULL, 2, NULL);
INSERT INTO `atributos_clases` VALUES (285, 8, 6, '2023-04-19 16:56:53', '2023-04-19 16:56:53', NULL, 3, NULL);
INSERT INTO `atributos_clases` VALUES (286, 8, 6, '2023-04-19 16:56:53', '2023-04-19 16:56:53', NULL, 4, NULL);
INSERT INTO `atributos_clases` VALUES (287, 8, 6, '2023-04-19 16:56:53', '2023-04-19 16:56:53', NULL, 5, NULL);
INSERT INTO `atributos_clases` VALUES (288, 8, 6, '2023-04-19 16:56:53', '2023-04-19 16:56:53', NULL, 6, NULL);
INSERT INTO `atributos_clases` VALUES (289, 1, 7, '2023-04-30 20:26:12', '2023-04-30 20:26:12', NULL, 1, NULL);
INSERT INTO `atributos_clases` VALUES (290, 1, 7, '2023-04-30 20:26:12', '2023-04-30 20:26:12', NULL, 2, NULL);
INSERT INTO `atributos_clases` VALUES (291, 1, 7, '2023-04-30 20:26:12', '2023-04-30 20:26:12', NULL, 3, NULL);
INSERT INTO `atributos_clases` VALUES (292, 1, 7, '2023-04-30 20:26:12', '2023-04-30 20:26:12', NULL, 4, NULL);
INSERT INTO `atributos_clases` VALUES (293, 1, 7, '2023-04-30 20:26:12', '2023-04-30 20:26:12', NULL, 5, NULL);
INSERT INTO `atributos_clases` VALUES (294, 1, 7, '2023-04-30 20:26:12', '2023-04-30 20:26:12', NULL, 6, NULL);
INSERT INTO `atributos_clases` VALUES (295, 2, 7, '2023-04-30 20:26:12', '2023-04-30 20:26:12', NULL, 1, NULL);
INSERT INTO `atributos_clases` VALUES (296, 2, 7, '2023-04-30 20:26:12', '2023-04-30 20:26:12', NULL, 2, NULL);
INSERT INTO `atributos_clases` VALUES (297, 2, 7, '2023-04-30 20:26:12', '2023-04-30 20:26:12', NULL, 3, NULL);
INSERT INTO `atributos_clases` VALUES (298, 2, 7, '2023-04-30 20:26:12', '2023-04-30 20:26:12', NULL, 4, NULL);
INSERT INTO `atributos_clases` VALUES (299, 2, 7, '2023-04-30 20:26:12', '2023-04-30 20:26:12', NULL, 5, NULL);
INSERT INTO `atributos_clases` VALUES (300, 2, 7, '2023-04-30 20:26:12', '2023-04-30 20:26:12', NULL, 6, NULL);
INSERT INTO `atributos_clases` VALUES (301, 3, 7, '2023-04-30 20:26:12', '2023-04-30 20:26:12', NULL, 1, NULL);
INSERT INTO `atributos_clases` VALUES (302, 3, 7, '2023-04-30 20:26:12', '2023-04-30 20:26:12', NULL, 2, NULL);
INSERT INTO `atributos_clases` VALUES (303, 3, 7, '2023-04-30 20:26:12', '2023-04-30 20:26:12', NULL, 3, NULL);
INSERT INTO `atributos_clases` VALUES (304, 3, 7, '2023-04-30 20:26:12', '2023-04-30 20:26:12', NULL, 4, NULL);
INSERT INTO `atributos_clases` VALUES (305, 3, 7, '2023-04-30 20:26:12', '2023-04-30 20:26:12', NULL, 5, NULL);
INSERT INTO `atributos_clases` VALUES (306, 3, 7, '2023-04-30 20:26:12', '2023-04-30 20:26:12', NULL, 6, NULL);
INSERT INTO `atributos_clases` VALUES (307, 4, 7, '2023-04-30 20:26:12', '2023-04-30 20:26:12', NULL, 1, NULL);
INSERT INTO `atributos_clases` VALUES (308, 4, 7, '2023-04-30 20:26:12', '2023-04-30 20:26:12', NULL, 2, NULL);
INSERT INTO `atributos_clases` VALUES (309, 4, 7, '2023-04-30 20:26:12', '2023-04-30 20:26:12', NULL, 3, NULL);
INSERT INTO `atributos_clases` VALUES (310, 4, 7, '2023-04-30 20:26:12', '2023-04-30 20:26:12', NULL, 4, NULL);
INSERT INTO `atributos_clases` VALUES (311, 4, 7, '2023-04-30 20:26:12', '2023-04-30 20:26:12', NULL, 5, NULL);
INSERT INTO `atributos_clases` VALUES (312, 4, 7, '2023-04-30 20:26:12', '2023-04-30 20:26:12', NULL, 6, NULL);
INSERT INTO `atributos_clases` VALUES (313, 5, 7, '2023-04-30 20:26:12', '2023-04-30 20:26:12', NULL, 1, NULL);
INSERT INTO `atributos_clases` VALUES (314, 5, 7, '2023-04-30 20:26:13', '2023-04-30 20:26:13', NULL, 2, NULL);
INSERT INTO `atributos_clases` VALUES (315, 5, 7, '2023-04-30 20:26:13', '2023-04-30 20:26:13', NULL, 3, NULL);
INSERT INTO `atributos_clases` VALUES (316, 5, 7, '2023-04-30 20:26:13', '2023-04-30 20:26:13', NULL, 4, NULL);
INSERT INTO `atributos_clases` VALUES (317, 5, 7, '2023-04-30 20:26:13', '2023-04-30 20:26:13', NULL, 5, NULL);
INSERT INTO `atributos_clases` VALUES (318, 5, 7, '2023-04-30 20:26:13', '2023-04-30 20:26:13', NULL, 6, NULL);
INSERT INTO `atributos_clases` VALUES (319, 6, 7, '2023-04-30 20:26:13', '2023-04-30 20:26:13', NULL, 1, NULL);
INSERT INTO `atributos_clases` VALUES (320, 6, 7, '2023-04-30 20:26:13', '2023-04-30 20:26:13', NULL, 2, NULL);
INSERT INTO `atributos_clases` VALUES (321, 6, 7, '2023-04-30 20:26:13', '2023-04-30 20:26:13', NULL, 3, NULL);
INSERT INTO `atributos_clases` VALUES (322, 6, 7, '2023-04-30 20:26:13', '2023-04-30 20:26:13', NULL, 4, NULL);
INSERT INTO `atributos_clases` VALUES (323, 6, 7, '2023-04-30 20:26:13', '2023-04-30 20:26:13', NULL, 5, NULL);
INSERT INTO `atributos_clases` VALUES (324, 6, 7, '2023-04-30 20:26:13', '2023-04-30 20:26:13', NULL, 6, NULL);
INSERT INTO `atributos_clases` VALUES (325, 7, 7, '2023-04-30 20:26:13', '2023-04-30 20:26:13', NULL, 1, NULL);
INSERT INTO `atributos_clases` VALUES (326, 7, 7, '2023-04-30 20:26:13', '2023-04-30 20:26:13', NULL, 2, NULL);
INSERT INTO `atributos_clases` VALUES (327, 7, 7, '2023-04-30 20:26:13', '2023-04-30 20:26:13', NULL, 3, NULL);
INSERT INTO `atributos_clases` VALUES (328, 7, 7, '2023-04-30 20:26:13', '2023-04-30 20:26:13', NULL, 4, NULL);
INSERT INTO `atributos_clases` VALUES (329, 7, 7, '2023-04-30 20:26:13', '2023-04-30 20:26:13', NULL, 5, NULL);
INSERT INTO `atributos_clases` VALUES (330, 7, 7, '2023-04-30 20:26:13', '2023-04-30 20:26:13', NULL, 6, NULL);
INSERT INTO `atributos_clases` VALUES (331, 8, 7, '2023-04-30 20:26:13', '2023-04-30 20:26:13', NULL, 1, NULL);
INSERT INTO `atributos_clases` VALUES (332, 8, 7, '2023-04-30 20:26:13', '2023-04-30 20:26:13', NULL, 2, NULL);
INSERT INTO `atributos_clases` VALUES (333, 8, 7, '2023-04-30 20:26:13', '2023-04-30 20:26:13', NULL, 3, NULL);
INSERT INTO `atributos_clases` VALUES (334, 8, 7, '2023-04-30 20:26:13', '2023-04-30 20:26:13', NULL, 4, NULL);
INSERT INTO `atributos_clases` VALUES (335, 8, 7, '2023-04-30 20:26:13', '2023-04-30 20:26:13', NULL, 5, NULL);
INSERT INTO `atributos_clases` VALUES (336, 8, 7, '2023-04-30 20:26:13', '2023-04-30 20:26:13', NULL, 6, NULL);

-- ----------------------------
-- Table structure for atributos_paraficha
-- ----------------------------
DROP TABLE IF EXISTS `atributos_paraficha`;
CREATE TABLE `atributos_paraficha`  (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `nombre` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `created_at` timestamp(0) NULL DEFAULT NULL,
  `updated_at` timestamp(0) NULL DEFAULT NULL,
  `deleted_at` timestamp(0) NULL DEFAULT NULL,
  `tipo` tinyint(4) NULL DEFAULT NULL COMMENT '0 fisico 1 mental',
  PRIMARY KEY (`id`) USING BTREE
) ENGINE = InnoDB AUTO_INCREMENT = 9 CHARACTER SET = utf8mb4 COLLATE = utf8mb4_general_ci ROW_FORMAT = DYNAMIC;

-- ----------------------------
-- Records of atributos_paraficha
-- ----------------------------
INSERT INTO `atributos_paraficha` VALUES (1, 'Destreza', '2023-04-09 22:16:26', NULL, NULL, 0);
INSERT INTO `atributos_paraficha` VALUES (2, 'Fuerza', '2023-04-09 22:16:26', NULL, NULL, 0);
INSERT INTO `atributos_paraficha` VALUES (3, 'Resistencia', '2023-04-09 22:16:26', NULL, NULL, 0);
INSERT INTO `atributos_paraficha` VALUES (4, 'Agilidad', '2023-04-09 22:16:26', NULL, NULL, 0);
INSERT INTO `atributos_paraficha` VALUES (5, 'Inteligencia', '2023-04-09 22:16:26', NULL, NULL, 1);
INSERT INTO `atributos_paraficha` VALUES (6, 'Coraje', '2023-04-09 22:16:26', NULL, NULL, 1);
INSERT INTO `atributos_paraficha` VALUES (7, 'Percepción', '2023-04-09 22:16:26', NULL, NULL, 1);
INSERT INTO `atributos_paraficha` VALUES (8, 'Carisma', '2023-04-09 22:16:26', NULL, NULL, 1);

-- ----------------------------
-- Table structure for avances_personajes
-- ----------------------------
DROP TABLE IF EXISTS `avances_personajes`;
CREATE TABLE `avances_personajes`  (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `atributo_id` int(11) NOT NULL,
  `personaje_id` int(11) NULL DEFAULT NULL,
  `created_at` timestamp(0) NULL DEFAULT NULL,
  `updated_at` timestamp(0) NULL DEFAULT NULL,
  `deleted_at` timestamp(0) NULL DEFAULT NULL,
  `nivel` int(11) NULL DEFAULT NULL,
  `cantidad_nivel` int(11) NULL DEFAULT NULL,
  `segundoNivel` tinyint(4) NULL DEFAULT NULL,
  PRIMARY KEY (`id`) USING BTREE
) ENGINE = InnoDB AUTO_INCREMENT = 52 CHARACTER SET = utf8mb4 COLLATE = utf8mb4_general_ci ROW_FORMAT = Dynamic;

-- ----------------------------
-- Records of avances_personajes
-- ----------------------------
INSERT INTO `avances_personajes` VALUES (51, 1, 2, '2023-05-01 20:17:33', '2023-05-01 20:17:33', NULL, 1, 1, 0);

-- ----------------------------
-- Table structure for bendiciones
-- ----------------------------
DROP TABLE IF EXISTS `bendiciones`;
CREATE TABLE `bendiciones`  (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `nombre` varchar(150) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `dificultad` int(11) NOT NULL,
  `objetivo` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NULL DEFAULT NULL,
  `coste` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NULL DEFAULT NULL,
  `duracion` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NULL DEFAULT NULL,
  `created_at` timestamp(0) NULL DEFAULT NULL,
  `updated_at` timestamp(0) NULL DEFAULT NULL,
  `deleted_at` timestamp(0) NULL DEFAULT NULL,
  `descripcion` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NULL DEFAULT NULL,
  `critico` longtext CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NULL,
  PRIMARY KEY (`id`) USING BTREE
) ENGINE = InnoDB AUTO_INCREMENT = 1 CHARACTER SET = utf8mb4 COLLATE = utf8mb4_general_ci ROW_FORMAT = Dynamic;

-- ----------------------------
-- Records of bendiciones
-- ----------------------------

-- ----------------------------
-- Table structure for bendiciones_dioses
-- ----------------------------
DROP TABLE IF EXISTS `bendiciones_dioses`;
CREATE TABLE `bendiciones_dioses`  (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `dios_id` int(11) NOT NULL,
  `bendicion_id` int(11) NOT NULL,
  PRIMARY KEY (`id`) USING BTREE
) ENGINE = InnoDB AUTO_INCREMENT = 1 CHARACTER SET = utf8mb4 COLLATE = utf8mb4_general_ci ROW_FORMAT = Dynamic;

-- ----------------------------
-- Records of bendiciones_dioses
-- ----------------------------

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
) ENGINE = InnoDB AUTO_INCREMENT = 8 CHARACTER SET = utf8mb4 COLLATE = utf8mb4_general_ci ROW_FORMAT = Dynamic;

-- ----------------------------
-- Records of clases
-- ----------------------------
INSERT INTO `clases` VALUES (1, 'Buscador de tesoros', '2023-04-18 20:36:11', '2023-04-18 20:38:35', NULL, 'Habilidades representativas: Percibir, Supervivencia, Folklore, Saber (historia),\nArmas iniciales: Daga, Espada corta', 19);
INSERT INTO `clases` VALUES (2, 'Ballenero', '2023-04-19 13:29:18', '2023-04-19 13:37:49', NULL, 'Habilidades representativas: Armas a distancia, Aguante, Navegar, Percibir.\nArmas: 3 javalinas (arpones), 1 Alfanje, Justillo de cuero.', 20);
INSERT INTO `clases` VALUES (3, 'Buho', '2023-04-19 14:22:24', '2023-04-19 14:22:24', NULL, 'Habilidades representativas: Conversar, Liderazgo, Sigilo, Intimidar. \nArmas: Espada corta.', 21);
INSERT INTO `clases` VALUES (4, 'Gladiador', '2023-04-19 16:02:22', '2023-04-19 16:02:22', NULL, 'Habilidades representativas: Armas CaC, Pelea, Brio, Actuar.\nArmas: Tridente, red, casco de gladiador, hombrera de gladiador, faldones de gladiador.', 22);
INSERT INTO `clases` VALUES (5, 'Ladrón', '2023-04-19 16:34:28', '2023-04-19 16:34:28', NULL, 'Habilidades representativas: Hurtar, Trastear, Sigilo, Evaluar\nArmas iniciales: Daga, Espada corta.', 23);
INSERT INTO `clases` VALUES (6, 'Mercader ambulante', '2023-04-19 16:56:52', '2023-04-19 16:57:02', NULL, 'Habilidades representativas: Conversar, Evaluar, Folklore, Oficio (uno cualquiera)\nArmas iniciales: Maza, Daga en la bota.', 24);
INSERT INTO `clases` VALUES (7, 'Mercenario', '2023-04-30 20:26:12', '2023-04-30 20:26:12', NULL, NULL, 24);

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
  `descripcion` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NULL DEFAULT NULL,
  PRIMARY KEY (`id`) USING BTREE
) ENGINE = InnoDB AUTO_INCREMENT = 26 CHARACTER SET = utf8mb4 COLLATE = utf8mb4_general_ci ROW_FORMAT = Dynamic;

-- ----------------------------
-- Records of clases_petrechos
-- ----------------------------
INSERT INTO `clases_petrechos` VALUES (1, 3, 1, NULL, NULL, NULL, 1.00, 'Región a elejir');
INSERT INTO `clases_petrechos` VALUES (2, 4, 1, NULL, NULL, NULL, 1.00, NULL);
INSERT INTO `clases_petrechos` VALUES (3, 5, 1, NULL, NULL, NULL, 1.00, NULL);
INSERT INTO `clases_petrechos` VALUES (4, 6, 1, NULL, NULL, NULL, 1.00, NULL);
INSERT INTO `clases_petrechos` VALUES (5, 7, 1, NULL, NULL, NULL, 25.00, NULL);
INSERT INTO `clases_petrechos` VALUES (6, 8, 1, NULL, NULL, NULL, 1.00, NULL);
INSERT INTO `clases_petrechos` VALUES (7, 13, 2, NULL, NULL, NULL, 1.00, NULL);
INSERT INTO `clases_petrechos` VALUES (8, 12, 2, NULL, NULL, NULL, 1.00, NULL);
INSERT INTO `clases_petrechos` VALUES (9, 11, 2, NULL, NULL, NULL, 1.00, NULL);
INSERT INTO `clases_petrechos` VALUES (10, 10, 2, NULL, NULL, NULL, 3.00, 'Arenques para dias');
INSERT INTO `clases_petrechos` VALUES (11, 9, 2, NULL, NULL, NULL, 1.00, NULL);
INSERT INTO `clases_petrechos` VALUES (12, 7, 2, NULL, NULL, NULL, 3.00, 'Los restos de la paga tras el ultimo atraque.');
INSERT INTO `clases_petrechos` VALUES (13, 16, 3, NULL, NULL, NULL, 1.00, 'Escrito en codigo.');
INSERT INTO `clases_petrechos` VALUES (14, 15, 3, NULL, NULL, NULL, 1.00, 'Orden del Búho, Para identificarse ante otros miembros de la orden.');
INSERT INTO `clases_petrechos` VALUES (15, 14, 3, NULL, NULL, NULL, 1.00, 'Tela de calidad, sin adornos llamativos.');
INSERT INTO `clases_petrechos` VALUES (16, 7, 3, NULL, NULL, NULL, 40.00, 'Monedero abultado.');
INSERT INTO `clases_petrechos` VALUES (17, 17, 4, NULL, NULL, NULL, 1.00, 'Documento de libertad');
INSERT INTO `clases_petrechos` VALUES (18, 21, 5, NULL, NULL, NULL, 1.00, NULL);
INSERT INTO `clases_petrechos` VALUES (19, 20, 5, NULL, NULL, NULL, 1.00, NULL);
INSERT INTO `clases_petrechos` VALUES (20, 19, 5, NULL, NULL, NULL, 1.00, NULL);
INSERT INTO `clases_petrechos` VALUES (21, 12, 5, NULL, NULL, NULL, 3.00, NULL);
INSERT INTO `clases_petrechos` VALUES (22, 7, 5, NULL, NULL, NULL, 5.00, NULL);
INSERT INTO `clases_petrechos` VALUES (23, 24, 6, NULL, NULL, NULL, 1.00, 'Carro com innumerables bagatelas como puesto ambulante');
INSERT INTO `clases_petrechos` VALUES (24, 23, 6, NULL, NULL, NULL, 1.00, NULL);
INSERT INTO `clases_petrechos` VALUES (25, 22, 6, NULL, NULL, NULL, 1.00, 'Objetos para comercio por valor de 50 áureos (herramientas, armas, ropa, cachivaches...)');

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
) ENGINE = InnoDB AUTO_INCREMENT = 11 CHARACTER SET = utf8mb4 COLLATE = utf8mb4_general_ci ROW_FORMAT = Dynamic;

-- ----------------------------
-- Records of dioses
-- ----------------------------
INSERT INTO `dioses` VALUES (1, 'Shevat', '2023-04-17 19:57:43', '2023-04-17 19:57:43', NULL, 'Dios de la magia.');
INSERT INTO `dioses` VALUES (2, 'El Vacío', '2023-04-17 22:35:54', '2023-04-17 22:35:54', NULL, NULL);
INSERT INTO `dioses` VALUES (3, 'Therem', '2023-04-17 22:36:04', '2023-04-17 22:36:04', NULL, NULL);
INSERT INTO `dioses` VALUES (4, 'Rogatrax', '2023-04-17 22:36:15', '2023-04-17 22:36:15', NULL, NULL);
INSERT INTO `dioses` VALUES (5, 'Grishnek', '2023-04-17 22:36:23', '2023-04-17 22:36:23', NULL, NULL);
INSERT INTO `dioses` VALUES (6, 'Ma\'ath', '2023-04-17 22:36:32', '2023-04-17 22:36:32', NULL, NULL);
INSERT INTO `dioses` VALUES (7, 'Tremill', '2023-04-17 22:36:42', '2023-04-17 22:36:42', NULL, NULL);
INSERT INTO `dioses` VALUES (8, 'Loth', '2023-04-17 22:37:00', '2023-04-17 22:37:00', NULL, NULL);
INSERT INTO `dioses` VALUES (9, 'Zullmekar', '2023-04-17 22:37:09', '2023-04-17 22:37:09', NULL, NULL);
INSERT INTO `dioses` VALUES (10, 'Mowci', '2023-04-18 14:20:30', '2023-04-18 14:20:30', NULL, NULL);

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
) ENGINE = InnoDB AUTO_INCREMENT = 8 CHARACTER SET = utf8mb4 COLLATE = utf8mb4_general_ci ROW_FORMAT = Dynamic;

-- ----------------------------
-- Records of escuelas_magias
-- ----------------------------
INSERT INTO `escuelas_magias` VALUES (1, 'Geomancia', '2023-04-17 19:45:51', '2023-04-17 19:45:51', NULL);
INSERT INTO `escuelas_magias` VALUES (2, 'Piromancia', '2023-04-17 19:45:58', '2023-04-17 19:45:58', NULL);
INSERT INTO `escuelas_magias` VALUES (3, 'Umbramancia', '2023-04-17 19:46:10', '2023-04-17 19:46:10', NULL);
INSERT INTO `escuelas_magias` VALUES (4, 'Magia arcana', '2023-04-17 19:46:26', '2023-04-17 19:46:26', NULL);
INSERT INTO `escuelas_magias` VALUES (5, 'Magia druidica', '2023-04-17 19:46:45', '2023-04-17 19:46:45', NULL);
INSERT INTO `escuelas_magias` VALUES (6, 'Nigromancia', '2023-04-17 19:47:00', '2023-04-17 19:47:00', NULL);
INSERT INTO `escuelas_magias` VALUES (7, 'Sangromancia', '2023-04-17 19:47:10', '2023-04-17 19:47:10', NULL);

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
-- Table structure for habilidades
-- ----------------------------
DROP TABLE IF EXISTS `habilidades`;
CREATE TABLE `habilidades`  (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `nombre` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `created_at` timestamp(0) NULL DEFAULT NULL,
  `updated_at` timestamp(0) NULL DEFAULT NULL,
  `deleted_at` timestamp(0) NULL DEFAULT NULL,
  `descripcion` longtext CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NULL,
  `tipo` int(11) NULL DEFAULT NULL COMMENT '0 para habilidades, 1 para lengua, 2 para saberes y 3 para oficios',
  PRIMARY KEY (`id`) USING BTREE
) ENGINE = InnoDB AUTO_INCREMENT = 46 CHARACTER SET = utf8mb4 COLLATE = utf8mb4_general_ci ROW_FORMAT = Dynamic;

-- ----------------------------
-- Records of habilidades
-- ----------------------------
INSERT INTO `habilidades` VALUES (1, 'Actuar', '2023-04-17 20:47:35', '2023-04-17 20:47:35', NULL, NULL, 0);
INSERT INTO `habilidades` VALUES (2, 'Acrobacias', '2023-04-18 18:45:48', '2023-04-18 19:05:13', NULL, NULL, 0);
INSERT INTO `habilidades` VALUES (3, 'Aguante', '2023-04-18 19:05:22', '2023-04-18 19:05:22', NULL, NULL, 0);
INSERT INTO `habilidades` VALUES (4, 'Armas a distancia', '2023-04-18 19:05:32', '2023-04-18 19:05:32', NULL, NULL, 0);
INSERT INTO `habilidades` VALUES (5, 'Armas CaC', '2023-04-18 19:05:42', '2023-04-18 19:05:42', NULL, NULL, 0);
INSERT INTO `habilidades` VALUES (6, 'Autocontrol', '2023-04-18 19:05:53', '2023-04-18 19:05:53', NULL, NULL, 0);
INSERT INTO `habilidades` VALUES (7, 'Brio', '2023-04-18 19:06:08', '2023-04-18 19:06:08', NULL, NULL, 0);
INSERT INTO `habilidades` VALUES (8, 'Conversar', '2023-04-18 19:06:16', '2023-04-18 19:06:16', NULL, NULL, 0);
INSERT INTO `habilidades` VALUES (9, 'Curar', '2023-04-18 19:06:24', '2023-04-18 19:06:24', NULL, NULL, 0);
INSERT INTO `habilidades` VALUES (10, 'Evaluar', '2023-04-18 19:06:50', '2023-04-18 19:06:50', NULL, NULL, 0);
INSERT INTO `habilidades` VALUES (11, 'Folklore', '2023-04-18 19:06:59', '2023-04-18 19:06:59', NULL, NULL, 0);
INSERT INTO `habilidades` VALUES (12, 'Hurtar', '2023-04-18 19:07:14', '2023-04-18 19:07:14', NULL, NULL, 0);
INSERT INTO `habilidades` VALUES (13, 'Intimidar', '2023-04-18 19:07:22', '2023-04-18 19:07:22', NULL, NULL, 0);
INSERT INTO `habilidades` VALUES (14, 'Liderazgo', '2023-04-18 19:07:34', '2023-04-18 19:07:34', NULL, NULL, 0);
INSERT INTO `habilidades` VALUES (15, 'Montar', '2023-04-18 19:07:40', '2023-04-18 19:07:40', NULL, NULL, 0);
INSERT INTO `habilidades` VALUES (16, 'Navegar', '2023-04-18 19:07:46', '2023-04-18 19:07:46', NULL, NULL, 0);
INSERT INTO `habilidades` VALUES (17, 'Percibir', '2023-04-18 19:07:55', '2023-04-18 19:07:55', NULL, NULL, 0);
INSERT INTO `habilidades` VALUES (18, 'Pelea', '2023-04-18 19:08:02', '2023-04-18 19:08:02', NULL, NULL, 0);
INSERT INTO `habilidades` VALUES (19, 'Sigilo', '2023-04-18 19:08:31', '2023-04-18 19:08:31', NULL, NULL, 0);
INSERT INTO `habilidades` VALUES (20, 'Supervivencia', '2023-04-18 19:08:39', '2023-04-18 19:08:39', NULL, NULL, 0);
INSERT INTO `habilidades` VALUES (21, 'Trastear', '2023-04-18 19:08:47', '2023-04-18 19:08:47', NULL, NULL, 0);
INSERT INTO `habilidades` VALUES (22, 'Trato animal', '2023-04-18 19:08:56', '2023-04-18 19:08:56', NULL, NULL, 0);
INSERT INTO `habilidades` VALUES (23, 'Lengua (común)', '2023-04-18 19:09:22', '2023-04-18 19:09:22', NULL, NULL, 1);
INSERT INTO `habilidades` VALUES (24, 'Lengua (Krell)', '2023-04-18 19:09:33', '2023-04-18 19:09:33', NULL, NULL, 1);
INSERT INTO `habilidades` VALUES (25, 'Lengua (Ni-go)', '2023-04-18 19:09:45', '2023-04-18 19:09:45', NULL, NULL, 1);
INSERT INTO `habilidades` VALUES (26, 'Lengua (trival)', '2023-04-18 19:09:57', '2023-04-18 19:09:57', NULL, NULL, 1);
INSERT INTO `habilidades` VALUES (27, 'Saber (Ciencias)', '2023-04-18 19:10:20', '2023-04-18 19:10:20', NULL, NULL, 2);
INSERT INTO `habilidades` VALUES (28, 'Saber (Artes)', '2023-04-18 19:10:30', '2023-04-18 19:10:30', NULL, NULL, 2);
INSERT INTO `habilidades` VALUES (29, 'Saber (arcano)', '2023-04-18 19:10:39', '2023-04-18 19:10:39', NULL, NULL, 2);
INSERT INTO `habilidades` VALUES (30, 'Saber (teologia)', '2023-04-18 19:10:49', '2023-04-18 19:10:49', NULL, NULL, 2);
INSERT INTO `habilidades` VALUES (31, 'Saber (mundo espiritual)', '2023-04-18 19:11:27', '2023-04-18 19:11:27', NULL, NULL, 2);
INSERT INTO `habilidades` VALUES (32, 'Saber (historia)', '2023-04-18 19:12:04', '2023-04-18 19:12:04', NULL, NULL, 2);
INSERT INTO `habilidades` VALUES (33, 'Conjurar', '2023-04-18 19:12:12', '2023-04-18 19:12:12', NULL, NULL, 2);
INSERT INTO `habilidades` VALUES (34, 'Rezar', '2023-04-18 19:12:18', '2023-04-18 19:12:18', NULL, NULL, 2);
INSERT INTO `habilidades` VALUES (35, 'Oficio (trampero)', '2023-04-18 19:12:27', '2023-04-18 19:12:27', NULL, NULL, 3);
INSERT INTO `habilidades` VALUES (36, 'oficio (alquimista)', '2023-04-18 19:12:35', '2023-04-18 19:12:35', NULL, NULL, 3);
INSERT INTO `habilidades` VALUES (37, 'Oficio (herrero)', '2023-04-18 19:12:47', '2023-04-18 19:12:47', NULL, NULL, 3);
INSERT INTO `habilidades` VALUES (38, 'Oficio (constructor)', '2023-04-18 19:12:57', '2023-04-18 19:12:57', NULL, NULL, 3);
INSERT INTO `habilidades` VALUES (39, 'oficio (cartografo)', '2023-04-18 19:13:06', '2023-04-18 19:13:06', NULL, NULL, 3);
INSERT INTO `habilidades` VALUES (40, 'Oficio (pirotécnico)', '2023-04-18 19:13:41', '2023-04-18 19:13:41', NULL, NULL, 3);
INSERT INTO `habilidades` VALUES (41, 'Oficio (crear venenos)', '2023-04-18 19:13:52', '2023-04-18 19:13:52', NULL, NULL, 3);
INSERT INTO `habilidades` VALUES (42, 'Oficio (cocinero)', '2023-04-18 19:14:10', '2023-04-18 19:14:10', NULL, NULL, 3);
INSERT INTO `habilidades` VALUES (43, 'Oficio (bufón)', '2023-04-18 19:14:19', '2023-04-18 19:14:19', NULL, NULL, 3);
INSERT INTO `habilidades` VALUES (44, 'oficio (granjero)', '2023-04-18 19:14:52', '2023-04-18 19:14:52', NULL, NULL, 3);
INSERT INTO `habilidades` VALUES (45, 'Oficio (sastre)', '2023-04-18 19:15:01', '2023-04-18 19:15:01', NULL, NULL, 3);

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
) ENGINE = InnoDB AUTO_INCREMENT = 7 CHARACTER SET = utf8mb4 COLLATE = utf8mb4_general_ci ROW_FORMAT = Dynamic;

-- ----------------------------
-- Records of lugares_cuerpo
-- ----------------------------
INSERT INTO `lugares_cuerpo` VALUES (1, 'Cabeza', '2023-04-17 19:44:37', '2023-04-17 19:44:37', NULL);
INSERT INTO `lugares_cuerpo` VALUES (2, 'Cuerpo', '2023-04-17 19:44:43', '2023-04-17 19:44:43', NULL);
INSERT INTO `lugares_cuerpo` VALUES (3, 'Brazo derecho', '2023-04-17 19:44:53', '2023-04-17 19:44:53', NULL);
INSERT INTO `lugares_cuerpo` VALUES (4, 'Brazo izquierdo', '2023-04-17 19:45:00', '2023-04-17 19:45:00', NULL);
INSERT INTO `lugares_cuerpo` VALUES (5, 'Pierna derecha', '2023-04-17 19:45:09', '2023-04-17 19:45:09', NULL);
INSERT INTO `lugares_cuerpo` VALUES (6, 'Pierna izquierda', '2023-04-17 19:45:18', '2023-04-17 19:45:18', NULL);

-- ----------------------------
-- Table structure for magias
-- ----------------------------
DROP TABLE IF EXISTS `magias`;
CREATE TABLE `magias`  (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `nombre` varchar(150) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `escuela_id` int(11) NOT NULL,
  `nivel` int(11) NULL DEFAULT NULL,
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
) ENGINE = InnoDB AUTO_INCREMENT = 1 CHARACTER SET = utf8mb4 COLLATE = utf8mb4_general_ci ROW_FORMAT = Dynamic;

-- ----------------------------
-- Records of magias
-- ----------------------------

-- ----------------------------
-- Table structure for migrations
-- ----------------------------
DROP TABLE IF EXISTS `migrations`;
CREATE TABLE `migrations`  (
  `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT,
  `migration` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `batch` int(11) NOT NULL,
  PRIMARY KEY (`id`) USING BTREE
) ENGINE = InnoDB AUTO_INCREMENT = 2 CHARACTER SET = utf8mb4 COLLATE = utf8mb4_unicode_ci ROW_FORMAT = Dynamic;

-- ----------------------------
-- Records of migrations
-- ----------------------------
INSERT INTO `migrations` VALUES (1, '0000_00_00_000000_create_websockets_statistics_entries_table', 1);

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
INSERT INTO `permission_role` VALUES (56, 1);
INSERT INTO `permission_role` VALUES (57, 1);
INSERT INTO `permission_role` VALUES (58, 1);
INSERT INTO `permission_role` VALUES (59, 1);
INSERT INTO `permission_role` VALUES (60, 1);
INSERT INTO `permission_role` VALUES (61, 1);
INSERT INTO `permission_role` VALUES (62, 1);
INSERT INTO `permission_role` VALUES (63, 1);

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
INSERT INTO `permission_user` VALUES (39, 2, 'App\\Models\\User');
INSERT INTO `permission_user` VALUES (40, 2, 'App\\Models\\User');
INSERT INTO `permission_user` VALUES (41, 2, 'App\\Models\\User');
INSERT INTO `permission_user` VALUES (42, 2, 'App\\Models\\User');
INSERT INTO `permission_user` VALUES (43, 2, 'App\\Models\\User');
INSERT INTO `permission_user` VALUES (44, 2, 'App\\Models\\User');
INSERT INTO `permission_user` VALUES (45, 2, 'App\\Models\\User');
INSERT INTO `permission_user` VALUES (46, 2, 'App\\Models\\User');
INSERT INTO `permission_user` VALUES (48, 2, 'App\\Models\\User');
INSERT INTO `permission_user` VALUES (49, 2, 'App\\Models\\User');
INSERT INTO `permission_user` VALUES (50, 2, 'App\\Models\\User');
INSERT INTO `permission_user` VALUES (51, 2, 'App\\Models\\User');
INSERT INTO `permission_user` VALUES (52, 2, 'App\\Models\\User');
INSERT INTO `permission_user` VALUES (53, 2, 'App\\Models\\User');
INSERT INTO `permission_user` VALUES (54, 2, 'App\\Models\\User');
INSERT INTO `permission_user` VALUES (55, 2, 'App\\Models\\User');

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
) ENGINE = InnoDB AUTO_INCREMENT = 64 CHARACTER SET = utf8mb4 COLLATE = utf8mb4_unicode_ci ROW_FORMAT = Dynamic;

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
INSERT INTO `permissions` VALUES (56, 'acceso-habilidades', NULL, NULL, NULL, NULL);
INSERT INTO `permissions` VALUES (57, 'borrar-habilidades', NULL, NULL, NULL, NULL);
INSERT INTO `permissions` VALUES (58, 'editar-habilidades', NULL, NULL, NULL, NULL);
INSERT INTO `permissions` VALUES (59, 'crear-habilidades', NULL, NULL, NULL, NULL);
INSERT INTO `permissions` VALUES (60, 'acceso-personajes', NULL, NULL, NULL, NULL);
INSERT INTO `permissions` VALUES (61, 'borrar-personajes', NULL, NULL, NULL, NULL);
INSERT INTO `permissions` VALUES (62, 'editar-personajes', NULL, NULL, NULL, NULL);
INSERT INTO `permissions` VALUES (63, 'crear-personajes', NULL, NULL, NULL, NULL);

-- ----------------------------
-- Table structure for personaje_atributo
-- ----------------------------
DROP TABLE IF EXISTS `personaje_atributo`;
CREATE TABLE `personaje_atributo`  (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `personaje_id` int(11) NOT NULL,
  `created_at` timestamp(0) NULL DEFAULT NULL,
  `updated_at` timestamp(0) NULL DEFAULT NULL,
  `deleted_at` timestamp(0) NULL DEFAULT NULL,
  `atributo_id` int(11) NULL DEFAULT NULL,
  `valor` int(11) NULL DEFAULT NULL,
  PRIMARY KEY (`id`) USING BTREE
) ENGINE = InnoDB AUTO_INCREMENT = 409 CHARACTER SET = utf8mb4 COLLATE = utf8mb4_general_ci ROW_FORMAT = Dynamic;

-- ----------------------------
-- Records of personaje_atributo
-- ----------------------------
INSERT INTO `personaje_atributo` VALUES (401, 2, NULL, NULL, NULL, 1, 3);
INSERT INTO `personaje_atributo` VALUES (402, 2, NULL, NULL, NULL, 2, 4);
INSERT INTO `personaje_atributo` VALUES (403, 2, NULL, NULL, NULL, 3, 4);
INSERT INTO `personaje_atributo` VALUES (404, 2, NULL, NULL, NULL, 4, 2);
INSERT INTO `personaje_atributo` VALUES (405, 2, NULL, NULL, NULL, 5, 2);
INSERT INTO `personaje_atributo` VALUES (406, 2, NULL, NULL, NULL, 6, 2);
INSERT INTO `personaje_atributo` VALUES (407, 2, NULL, NULL, NULL, 7, 1);
INSERT INTO `personaje_atributo` VALUES (408, 2, NULL, NULL, NULL, 8, 3);

-- ----------------------------
-- Table structure for personaje_habilidad
-- ----------------------------
DROP TABLE IF EXISTS `personaje_habilidad`;
CREATE TABLE `personaje_habilidad`  (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `personaje_id` int(11) NOT NULL,
  `created_at` timestamp(0) NULL DEFAULT NULL,
  `updated_at` timestamp(0) NULL DEFAULT NULL,
  `deleted_at` timestamp(0) NULL DEFAULT NULL,
  `habilidad_id` int(11) NULL DEFAULT NULL,
  `valor` int(11) NULL DEFAULT NULL,
  PRIMARY KEY (`id`) USING BTREE
) ENGINE = InnoDB AUTO_INCREMENT = 2296 CHARACTER SET = utf8mb4 COLLATE = utf8mb4_general_ci ROW_FORMAT = Dynamic;

-- ----------------------------
-- Records of personaje_habilidad
-- ----------------------------
INSERT INTO `personaje_habilidad` VALUES (2251, 2, NULL, NULL, NULL, 1, 0);
INSERT INTO `personaje_habilidad` VALUES (2252, 2, NULL, NULL, NULL, 2, 0);
INSERT INTO `personaje_habilidad` VALUES (2253, 2, NULL, NULL, NULL, 3, 0);
INSERT INTO `personaje_habilidad` VALUES (2254, 2, NULL, NULL, NULL, 4, 1);
INSERT INTO `personaje_habilidad` VALUES (2255, 2, NULL, NULL, NULL, 5, 2);
INSERT INTO `personaje_habilidad` VALUES (2256, 2, NULL, NULL, NULL, 6, 0);
INSERT INTO `personaje_habilidad` VALUES (2257, 2, NULL, NULL, NULL, 7, 1);
INSERT INTO `personaje_habilidad` VALUES (2258, 2, NULL, NULL, NULL, 8, 1);
INSERT INTO `personaje_habilidad` VALUES (2259, 2, NULL, NULL, NULL, 9, 0);
INSERT INTO `personaje_habilidad` VALUES (2260, 2, NULL, NULL, NULL, 10, 1);
INSERT INTO `personaje_habilidad` VALUES (2261, 2, NULL, NULL, NULL, 11, 0);
INSERT INTO `personaje_habilidad` VALUES (2262, 2, NULL, NULL, NULL, 12, 0);
INSERT INTO `personaje_habilidad` VALUES (2263, 2, NULL, NULL, NULL, 13, 0);
INSERT INTO `personaje_habilidad` VALUES (2264, 2, NULL, NULL, NULL, 14, 0);
INSERT INTO `personaje_habilidad` VALUES (2265, 2, NULL, NULL, NULL, 15, 0);
INSERT INTO `personaje_habilidad` VALUES (2266, 2, NULL, NULL, NULL, 16, 0);
INSERT INTO `personaje_habilidad` VALUES (2267, 2, NULL, NULL, NULL, 17, 0);
INSERT INTO `personaje_habilidad` VALUES (2268, 2, NULL, NULL, NULL, 18, 0);
INSERT INTO `personaje_habilidad` VALUES (2269, 2, NULL, NULL, NULL, 19, 0);
INSERT INTO `personaje_habilidad` VALUES (2270, 2, NULL, NULL, NULL, 20, 0);
INSERT INTO `personaje_habilidad` VALUES (2271, 2, NULL, NULL, NULL, 21, 0);
INSERT INTO `personaje_habilidad` VALUES (2272, 2, NULL, NULL, NULL, 22, 0);
INSERT INTO `personaje_habilidad` VALUES (2273, 2, NULL, NULL, NULL, 23, 1);
INSERT INTO `personaje_habilidad` VALUES (2274, 2, NULL, NULL, NULL, 24, 0);
INSERT INTO `personaje_habilidad` VALUES (2275, 2, NULL, NULL, NULL, 25, 0);
INSERT INTO `personaje_habilidad` VALUES (2276, 2, NULL, NULL, NULL, 26, 0);
INSERT INTO `personaje_habilidad` VALUES (2277, 2, NULL, NULL, NULL, 27, 0);
INSERT INTO `personaje_habilidad` VALUES (2278, 2, NULL, NULL, NULL, 28, 0);
INSERT INTO `personaje_habilidad` VALUES (2279, 2, NULL, NULL, NULL, 29, 0);
INSERT INTO `personaje_habilidad` VALUES (2280, 2, NULL, NULL, NULL, 30, 0);
INSERT INTO `personaje_habilidad` VALUES (2281, 2, NULL, NULL, NULL, 31, 0);
INSERT INTO `personaje_habilidad` VALUES (2282, 2, NULL, NULL, NULL, 32, 0);
INSERT INTO `personaje_habilidad` VALUES (2283, 2, NULL, NULL, NULL, 33, 0);
INSERT INTO `personaje_habilidad` VALUES (2284, 2, NULL, NULL, NULL, 34, 0);
INSERT INTO `personaje_habilidad` VALUES (2285, 2, NULL, NULL, NULL, 35, 0);
INSERT INTO `personaje_habilidad` VALUES (2286, 2, NULL, NULL, NULL, 36, 0);
INSERT INTO `personaje_habilidad` VALUES (2287, 2, NULL, NULL, NULL, 37, 0);
INSERT INTO `personaje_habilidad` VALUES (2288, 2, NULL, NULL, NULL, 38, 0);
INSERT INTO `personaje_habilidad` VALUES (2289, 2, NULL, NULL, NULL, 39, 0);
INSERT INTO `personaje_habilidad` VALUES (2290, 2, NULL, NULL, NULL, 40, 0);
INSERT INTO `personaje_habilidad` VALUES (2291, 2, NULL, NULL, NULL, 41, 0);
INSERT INTO `personaje_habilidad` VALUES (2292, 2, NULL, NULL, NULL, 42, 0);
INSERT INTO `personaje_habilidad` VALUES (2293, 2, NULL, NULL, NULL, 43, 0);
INSERT INTO `personaje_habilidad` VALUES (2294, 2, NULL, NULL, NULL, 44, 0);
INSERT INTO `personaje_habilidad` VALUES (2295, 2, NULL, NULL, NULL, 45, 0);

-- ----------------------------
-- Table structure for personaje_talento
-- ----------------------------
DROP TABLE IF EXISTS `personaje_talento`;
CREATE TABLE `personaje_talento`  (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `personaje_id` int(11) NOT NULL,
  `talento_id` int(11) NOT NULL,
  `created_at` timestamp(0) NULL DEFAULT NULL,
  `updated_at` timestamp(0) NULL DEFAULT NULL,
  `deleted_at` timestamp(0) NULL DEFAULT NULL,
  PRIMARY KEY (`id`) USING BTREE
) ENGINE = InnoDB AUTO_INCREMENT = 151 CHARACTER SET = utf8mb4 COLLATE = utf8mb4_general_ci ROW_FORMAT = Dynamic;

-- ----------------------------
-- Records of personaje_talento
-- ----------------------------
INSERT INTO `personaje_talento` VALUES (148, 2, 9, NULL, NULL, NULL);
INSERT INTO `personaje_talento` VALUES (149, 2, 16, NULL, NULL, NULL);
INSERT INTO `personaje_talento` VALUES (150, 2, 24, NULL, NULL, NULL);

-- ----------------------------
-- Table structure for personajes
-- ----------------------------
DROP TABLE IF EXISTS `personajes`;
CREATE TABLE `personajes`  (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `nombre` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `clase_id` longtext CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NULL,
  `user_id` int(11) NULL DEFAULT NULL,
  `segunda_clase_id` int(11) NULL DEFAULT NULL,
  `genero` varchar(50) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NULL DEFAULT NULL,
  `ascendencia_id` int(11) NULL DEFAULT NULL,
  `segunda_ascendencia_id` int(11) NULL DEFAULT NULL,
  `concepto` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NULL DEFAULT NULL,
  `experiencia_total` int(11) NULL DEFAULT NULL,
  `experiencia_gastada` int(11) NULL DEFAULT NULL,
  `puntos_vida` int(11) NULL DEFAULT NULL,
  `puntos_vida_restantes` int(11) NULL DEFAULT NULL,
  `pef_total` int(11) NULL DEFAULT NULL,
  `pef_restantes` int(11) NULL DEFAULT NULL,
  `pem_total` int(11) NULL DEFAULT NULL,
  `pem_restantes` int(11) NULL DEFAULT NULL,
  `defensa_acac` int(11) NULL DEFAULT NULL,
  `defensa_pelea` int(11) NULL DEFAULT NULL,
  `control` int(11) NULL DEFAULT NULL,
  `iluminacion` int(11) NULL DEFAULT NULL,
  `cordura` int(11) NULL DEFAULT NULL,
  `edad` int(11) NULL DEFAULT NULL,
  `peso` decimal(19, 2) NULL DEFAULT NULL,
  `altura` decimal(10, 2) NULL DEFAULT NULL,
  `complexion` varchar(100) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NULL DEFAULT NULL,
  `peculiaridad` varchar(100) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NULL DEFAULT NULL,
  `procedencia` varchar(100) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NULL DEFAULT NULL,
  `created_at` timestamp(0) NULL DEFAULT NULL,
  `updated_at` timestamp(0) NULL DEFAULT NULL,
  `deleted_at` timestamp(0) NULL DEFAULT NULL,
  PRIMARY KEY (`id`) USING BTREE
) ENGINE = InnoDB AUTO_INCREMENT = 3 CHARACTER SET = utf8mb4 COLLATE = utf8mb4_general_ci ROW_FORMAT = Dynamic;

-- ----------------------------
-- Records of personajes
-- ----------------------------
INSERT INTO `personajes` VALUES (1, 'Marcus Saltwater', '3', 1, 2, 'M', 7, 2, NULL, 5, 5, 13, 13, 8, 8, 4, 4, 5, 3, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2023-04-30 19:42:54', '2023-04-30 19:42:54', NULL);
INSERT INTO `personajes` VALUES (2, 'Marcus Saltwater', '3', 1, 2, 'M', 7, 2, NULL, 5, 5, 13, 13, 8, 8, 4, 4, 5, 3, 100, 0, 100, NULL, NULL, NULL, NULL, NULL, NULL, '2023-04-30 19:44:51', '2023-05-01 20:17:33', NULL);

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
  `danio` int(11) NOT NULL,
  `estorbo` int(11) NULL DEFAULT NULL,
  `tipo_id` int(11) NULL DEFAULT NULL,
  `precio` decimal(16, 2) NULL DEFAULT NULL,
  `estorbo_2` int(11) NULL DEFAULT NULL,
  `estorbo_3` int(11) NULL DEFAULT NULL,
  `created_at` timestamp(0) NULL DEFAULT NULL,
  `updated_at` timestamp(0) NULL DEFAULT NULL,
  `deleted_at` timestamp(0) NULL DEFAULT NULL,
  `descripcion` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NULL DEFAULT NULL,
  `empresa_id` int(11) NULL DEFAULT NULL,
  PRIMARY KEY (`id`) USING BTREE
) ENGINE = InnoDB AUTO_INCREMENT = 25 CHARACTER SET = utf8mb4 COLLATE = utf8mb4_general_ci ROW_FORMAT = Dynamic;

-- ----------------------------
-- Records of petrechos
-- ----------------------------
INSERT INTO `petrechos` VALUES (0, 'Herramientas de galeno', 0, 2, 30, 50.00, 0, 0, '2023-04-17 19:53:34', '2023-04-19 13:21:11', NULL, '-1 a las tiradas de sanar.', NULL);
INSERT INTO `petrechos` VALUES (2, 'mochila pequeña', 0, 0, 1, 5.00, 2, 0, '2023-04-17 20:06:48', '2023-04-23 10:56:45', NULL, 'Recipiente barato.', NULL);
INSERT INTO `petrechos` VALUES (3, 'Mapa viejo', 0, 0, 34, 5.00, 0, 0, '2023-04-18 20:10:07', '2023-04-18 20:10:07', NULL, 'Mapa viejo e impreciso de una región', NULL);
INSERT INTO `petrechos` VALUES (4, 'Cuaderno en blanco', 0, 0, 34, 3.00, 0, 0, '2023-04-18 20:10:51', '2023-04-18 20:10:51', NULL, NULL, NULL);
INSERT INTO `petrechos` VALUES (5, 'Material de escritura', 0, 0, 34, 5.00, 0, 0, '2023-04-18 20:16:53', '2023-04-19 13:21:00', NULL, 'Pluma de oca y tintero', NULL);
INSERT INTO `petrechos` VALUES (6, 'Ropa de Viaje', 0, 0, 33, 0.00, 0, 0, '2023-04-18 20:20:04', '2023-04-18 20:20:04', NULL, 'Ropa resistente, sucia y gastada.', NULL);
INSERT INTO `petrechos` VALUES (7, 'Aúreos', 0, 0, 34, 0.00, 0, 0, '2023-04-18 20:21:50', '2023-04-18 20:21:50', NULL, 'Moneda divisible de uso común', NULL);
INSERT INTO `petrechos` VALUES (8, 'Brujula', 0, 0, 34, 10.00, 0, 0, '2023-04-18 20:31:52', '2023-04-18 20:31:52', NULL, NULL, NULL);
INSERT INTO `petrechos` VALUES (9, 'Licor potente', 0, 2, 35, 5.00, 0, 0, '2023-04-19 13:06:46', '2023-04-19 13:06:46', NULL, '+1 a las tiradas de aguante para no embriagarse.', NULL);
INSERT INTO `petrechos` VALUES (10, 'Ración de viaje', 0, 2, 35, 0.00, 0, 0, '2023-04-19 13:14:47', '2023-04-19 13:15:05', NULL, 'Cecina, queso, pan asentado, frutos deshidratados, pescado en salazón y embutidos forman la dieta del viajero sin talento con la sartén. Puede mantener a una persona alimentada por un dia... siempre que no sea de sangre Fenrir.', NULL);
INSERT INTO `petrechos` VALUES (11, 'Odre', 0, 2, 1, 4.00, 0, 0, '2023-04-19 13:17:03', '2023-04-19 13:17:03', NULL, 'pequeño recipiente para líquidos, generalmente fabricado a partir de pellejos y vejigas de animales. Puede contener aproximadamente un litro y medio.', NULL);
INSERT INTO `petrechos` VALUES (12, 'Cuerda (2 metros)', 0, 2, 29, 1.00, 0, 0, '2023-04-19 13:18:52', '2023-04-19 13:21:27', NULL, 'Cuerda de fibras duras, como esparto o cáñamo. Más resistente de lo que aparenta.', NULL);
INSERT INTO `petrechos` VALUES (13, 'Gancho', 0, 2, 34, 5.00, 0, 0, '2023-04-19 13:20:46', '2023-04-19 13:20:46', NULL, 'Gancho de metal resistente, perfecto para anclar una cuerda o colgar algo (o alguien) de el.', NULL);
INSERT INTO `petrechos` VALUES (14, 'Toga', 0, 2, 33, 8.00, 0, 0, '2023-04-19 14:04:18', '2023-04-19 14:04:18', NULL, 'Ropa ligera y cómoda  para climas cálidos.', NULL);
INSERT INTO `petrechos` VALUES (15, 'Emblema de orden.', 0, 1, 34, 0.00, 0, 0, '2023-04-19 14:09:37', '2023-04-19 14:09:37', NULL, 'Joya o placa decorativa con iconografía grabada que identifica al portador como miembro de una orden.', NULL);
INSERT INTO `petrechos` VALUES (16, 'Grimorio pequeño', 0, 1, 36, 50.00, 0, 0, '2023-04-19 14:12:14', '2023-04-19 14:12:14', NULL, 'Libro pequeño, pergamino o cuaderno que contiene un hechizo (puede estar determinado al azar o por el Dj).', NULL);
INSERT INTO `petrechos` VALUES (17, 'Documentos', 0, 0, 34, 0.00, 0, 0, '2023-04-19 15:51:53', '2023-04-19 15:51:53', NULL, 'Documentación varia', NULL);
INSERT INTO `petrechos` VALUES (18, 'Manto', 0, 2, 33, 8.00, 0, 0, '2023-04-19 16:17:18', '2023-04-19 16:17:18', NULL, 'Manto resistente.', NULL);
INSERT INTO `petrechos` VALUES (19, 'Manto con capucha', 0, 0, 33, 8.00, 0, 0, '2023-04-19 16:18:26', '2023-04-19 16:18:26', NULL, 'Protege de la intemperie y de ojos curiosos.', NULL);
INSERT INTO `petrechos` VALUES (20, 'Lámpara de aceite', 0, 0, 38, 15.00, 0, 0, '2023-04-19 16:25:36', '2023-04-19 16:25:36', NULL, 'Ilumina con claridad hasta rango 3, tenuemente hasta rango 4. Requiere 1/2 botella de aceite cada 8 horas.', NULL);
INSERT INTO `petrechos` VALUES (21, 'Mochila grande', 0, 0, 1, 10.00, 6, 2, '2023-04-19 16:27:00', '2023-04-23 10:55:45', NULL, 'Añade 6 huecos de estorbo 2 y 2 de estorbo 3.', NULL);
INSERT INTO `petrechos` VALUES (22, 'Mercancía varia', 0, 4, 34, 0.00, 0, 0, '2023-04-19 16:47:19', '2023-04-19 16:47:19', NULL, 'Objetos varios.', NULL);
INSERT INTO `petrechos` VALUES (23, 'Ábaco', 0, 0, 30, 5.00, 0, 0, '2023-04-19 16:49:40', '2023-04-19 16:49:40', NULL, 'Ayuda a llevar las cuentas... usando cuentas de madera.', NULL);
INSERT INTO `petrechos` VALUES (24, 'Carro de mano', 0, 5, 28, 30.00, 0, 0, '2023-04-19 16:51:25', '2023-04-19 16:51:25', NULL, 'Carro de madera inestable, usado para que un hombre o un animal de tiro pequeño lleve mercancía de un lado a otro.', NULL);

-- ----------------------------
-- Table structure for petrechos_propiedades
-- ----------------------------
DROP TABLE IF EXISTS `petrechos_propiedades`;
CREATE TABLE `petrechos_propiedades`  (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `propiedad_id` int(11) NOT NULL,
  `petrecho_id` int(11) NOT NULL,
  PRIMARY KEY (`id`) USING BTREE
) ENGINE = InnoDB AUTO_INCREMENT = 3 CHARACTER SET = utf8mb4 COLLATE = utf8mb4_general_ci ROW_FORMAT = Dynamic;

-- ----------------------------
-- Records of petrechos_propiedades
-- ----------------------------
INSERT INTO `petrechos_propiedades` VALUES (2, 30, 20);

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
  `bonificador` int(11) NULL DEFAULT NULL,
  `penalizador` int(11) NULL DEFAULT NULL,
  PRIMARY KEY (`id`) USING BTREE
) ENGINE = InnoDB AUTO_INCREMENT = 31 CHARACTER SET = utf8mb4 COLLATE = utf8mb4_general_ci ROW_FORMAT = Dynamic;

-- ----------------------------
-- Records of propiedades
-- ----------------------------
INSERT INTO `propiedades` VALUES (1, 'Material de oficio (galeno)', '-1 a la dificultad de las tiradas de sanar.', '2023-04-17 19:49:40', '2023-04-18 18:45:31', '2023-04-18 18:45:31', 1, 0);
INSERT INTO `propiedades` VALUES (2, 'volatil', 'Tiende a explotar.', '2023-04-17 20:08:21', '2023-04-18 18:45:35', '2023-04-18 18:45:35', 0, 0);
INSERT INTO `propiedades` VALUES (3, 'Dos manos', '+2 a las tiradas de ataque si es usada con una sola mano, puede usarse para bloquear.', '2023-04-18 14:25:05', '2023-04-18 14:35:09', NULL, 0, 0);
INSERT INTO `propiedades` VALUES (4, 'Corte', NULL, '2023-04-18 14:25:18', '2023-04-18 14:25:18', NULL, 0, 0);
INSERT INTO `propiedades` VALUES (5, 'Gancho', 'Puede realizar ataques de presa.', '2023-04-18 14:25:28', '2023-04-18 14:35:35', NULL, 0, 0);
INSERT INTO `propiedades` VALUES (6, 'Punzante', NULL, '2023-04-18 14:25:51', '2023-04-18 14:25:51', NULL, 0, 0);
INSERT INTO `propiedades` VALUES (7, 'Defensiva', 'Bloquear con este arma otorga un +2 a la defensa en lugar del habitual +1.', '2023-04-18 14:26:39', '2023-04-18 14:36:18', NULL, 0, 0);
INSERT INTO `propiedades` VALUES (8, 'Mano y media', '-1 al DC al usarlo con una sola mano.', '2023-04-18 14:27:34', '2023-04-18 14:27:34', NULL, 0, 0);
INSERT INTO `propiedades` VALUES (9, 'Rápida', '-1 a la defensa del enemigo si realiza una acción de esquivar.', '2023-04-18 14:28:21', '2023-04-18 14:28:21', NULL, 0, 0);
INSERT INTO `propiedades` VALUES (10, 'Caballeria.', '+1 al daño al usarse sobre una montura, +2 durante una carga sobre una montura.', '2023-04-18 14:29:37', '2023-04-18 14:29:37', NULL, 0, 0);
INSERT INTO `propiedades` VALUES (11, 'Ejecución', '-1 a las tiradas de ataque brutal.', '2023-04-18 14:30:34', '2023-04-18 14:30:34', NULL, 0, 0);
INSERT INTO `propiedades` VALUES (12, 'Alcance', 'El personaje puede atacar cuerpo a cuerpo a 2 metros del objetivo y a través de aliados.', '2023-04-18 14:31:48', '2023-04-18 14:31:48', NULL, 0, 0);
INSERT INTO `propiedades` VALUES (13, 'Ligera', 'el modificador por usar este arma en la mano torpe es de +1 en lugar del +2 habitual, puede acumularse con el talento ambidiestro.', '2023-04-18 14:33:15', '2023-04-18 14:33:15', NULL, 0, 0);
INSERT INTO `propiedades` VALUES (14, 'Contundente', NULL, '2023-04-18 14:36:32', '2023-04-18 14:36:32', NULL, 0, 0);
INSERT INTO `propiedades` VALUES (15, 'Fragil', 'Si es utilizada para bloquear o recibe un golpe directo, este objeto tiene un 50% de probabilidades de romperse.', '2023-04-18 14:37:56', '2023-04-18 14:37:56', NULL, 0, 0);
INSERT INTO `propiedades` VALUES (16, 'Perforante', 'Reduce la puntuación de armadura del enemigo en 1.', '2023-04-18 14:38:36', '2023-04-18 14:38:36', NULL, 0, 0);
INSERT INTO `propiedades` VALUES (17, 'Agotadora', 'El coste de los ataque adicionales con esta arma es de 3 pef (en lugar de 2)', '2023-04-18 14:40:26', '2023-04-18 14:40:26', NULL, 0, 0);
INSERT INTO `propiedades` VALUES (18, 'Apresadora', 'El jugador puede declarar antes de realizar la tirada que pretende atrapar al rival en lugar de dañarlo. Si esta arma tiene éxito en su tirada de ataque se considerará un ataque de presa a todos los efectos. Todas las tiradas para liberarse añaden +1 a la dificultad de la presa)', '2023-04-18 14:43:16', '2023-04-18 15:10:29', NULL, 0, 0);
INSERT INTO `propiedades` VALUES (19, 'Desarme', '-1 al desarmar.', '2023-04-18 14:44:06', '2023-04-18 14:44:06', NULL, 0, 0);
INSERT INTO `propiedades` VALUES (20, 'Disparo a caballo', 'Este arma no sufre penalizadores al disparar sobre una montura al trote.', '2023-04-18 14:45:13', '2023-04-18 14:45:13', NULL, 0, 0);
INSERT INTO `propiedades` VALUES (21, 'Imprecisa', '+1 a la dificultad de los disparos a más de la mitad del rango del arma, redondeando hacia arriba (por ejemplo, rango 2 o más para pistolas)', '2023-04-18 14:50:11', '2023-04-18 14:50:11', NULL, 0, 0);
INSERT INTO `propiedades` VALUES (22, 'Poco fiable', 'Si la tirada contiene dos resultados de 1, la pistola se atasca y falla, no pudiendo disparar más hasta que supere una tirada de destreza + trastear (dificultad 8) para desatascarla.', '2023-04-18 14:55:46', '2023-04-18 14:55:46', NULL, 0, 0);
INSERT INTO `propiedades` VALUES (23, 'Rafaga (X)', 'Usando una acción y una maniobra, personaje puede declarar cuantos disparos va a realizar (siendo el máximo indicado junto a la propiedad), por cada disparo adicional al primero añade un +1 a la dificultad de la tirada y la mitad del daño del arma usada. (por ejemplo, una ballesta de repetición disparando una rafaga de tres flechas añadiria un +2 a la dificultad de la tirada y  +6 al daño)', '2023-04-18 15:02:23', '2023-04-18 15:02:52', NULL, 0, 0);
INSERT INTO `propiedades` VALUES (24, 'Metralla', 'Todos los personajes a rango 0 (amigos y enemigos) del objetivo se ven afectados por el ataque salvo que el disparo sea efectuado a quemarropa.', '2023-04-18 15:05:16', '2023-04-18 15:05:16', NULL, 0, 0);
INSERT INTO `propiedades` VALUES (25, 'Combate cuerpo a cuerpo', 'Este arma puede ser utilizada para disparar cuerpo a cuerpo (usando la habilidad Armas Cuerpo a cuerpo en lugar de Armas a distancia)', '2023-04-18 15:07:18', '2023-04-18 15:07:18', NULL, 0, 0);
INSERT INTO `propiedades` VALUES (26, 'Ineficaz', 'El valor de armadura del rival se duplica contra ataques con esta propiedad.', '2023-04-18 15:08:01', '2023-04-18 15:08:01', NULL, 0, 0);
INSERT INTO `propiedades` VALUES (27, 'Dardos envenenados', 'La munición de este arma puede ser envenenada con anterioridad. El valor de armadura del objetivo se suma a la dificultad del disparo.  Si un disparo con este arma impacta, el objetivo se verá afectado por el veneno aplicado.', '2023-04-18 15:13:04', '2023-04-18 15:13:04', NULL, 0, 0);
INSERT INTO `propiedades` VALUES (28, 'Dolorosa', 'Si esta arma provoca la pérdida de Pv, la víctima perderá 1 Pef y 1 Pem adicionales.', '2023-04-18 16:48:18', '2023-04-18 16:48:18', NULL, 0, 0);
INSERT INTO `propiedades` VALUES (29, 'Arrojadiza/Apresadora', NULL, '2023-04-18 18:38:20', '2023-04-18 18:39:18', '2023-04-18 18:39:18', 0, 0);
INSERT INTO `propiedades` VALUES (30, 'volatil', 'Si el objetivo sufre daño por fuego en la parte del cuerpo donde esté el objeto, hay un 30% de probabilidades de que estalle en llamas, añadiendo +3 al daño.', '2023-04-19 16:21:48', '2023-04-19 16:21:48', NULL, 0, 0);

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
INSERT INTO `role_user` VALUES (1, 3, 'App\\Models\\User');

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
) ENGINE = InnoDB AUTO_INCREMENT = 25 CHARACTER SET = utf8mb4 COLLATE = utf8mb4_general_ci ROW_FORMAT = Dynamic;

-- ----------------------------
-- Records of talentos
-- ----------------------------
INSERT INTO `talentos` VALUES (1, 'Acumular poder', '2023-04-17 19:33:26', '2023-04-17 19:33:26', NULL, 'El personaje atrae hacia sí mismo toda la magia que le rodea y la concentra para potenciar un hechizo. Puede declarar el uso de este talento antes de conjurar un hechizo y tirar 1d8, cuyo resultado se sumará al nivel total del hechizo.\nSi el conjuro es completado con éxito, todos los efectos de daño se duplicarán, y las dificultades para resistir el hechizo aumentarán en +2. En caso de fallo, siempre causará un efecto de Poder Desatado, aunque no haya salido un resultado de pifia. A discreción del DJ, es posible alterar los efectos de ciertos hechizos a conveniencia. Este talento se puede declarar al realizar un sortilegio, en su caso la dificultad de la tirada de conjuración aumentará en +2.');
INSERT INTO `talentos` VALUES (2, 'Reflejos felinos', '2023-04-17 19:58:27', '2023-04-17 19:58:27', NULL, '-1 a la dificultad de las tiradas de acrobacias.');
INSERT INTO `talentos` VALUES (3, 'Furia incontrolable.', '2023-04-17 22:44:57', '2023-04-17 22:44:57', NULL, 'A discreción del Dj, cuando el personaje sufra un insulto, agravio o se vea e inferioridad en combate, puede requerir que el personaje supere una tirada de coraje + autocontrol (dificultad 8), que el jugador puede decidir fallar. Si falla, el personaje se verá sujeto a la condición de \"furia\"');
INSERT INTO `talentos` VALUES (4, 'Recio', '2023-04-17 22:45:42', '2023-04-17 22:45:42', NULL, 'El personaje aumenta sus Pv máximos en 2, pero disminuye sus Pem máximos en 2.');
INSERT INTO `talentos` VALUES (5, 'Hijo del sol', '2023-04-17 22:49:33', '2023-04-17 22:49:33', NULL, 'Siempre que esté bajo la luz del sol, el personaje obtiene  un modificador de -1 a las tiradas físicas. Siempre que no esté bajo ella, sufre un +1 a las tiradas mentales.');
INSERT INTO `talentos` VALUES (6, 'Indoblegable', '2023-04-17 22:50:50', '2023-04-17 22:50:50', NULL, '-1 a las tiradas de autocontrol, pierde 2 pem si fracasa la tirada.');
INSERT INTO `talentos` VALUES (7, 'Código de honor', '2023-04-17 22:52:03', '2023-04-17 22:52:03', NULL, '+1 a la dificultad de forzar al kurayami a actuar en contra de sus principios, si lo consiguen perderá 1d10 de cordura.');
INSERT INTO `talentos` VALUES (8, 'Sombra', '2023-04-17 22:52:40', '2023-04-17 22:52:40', NULL, '-1 a todas las tiradas de sigilo, pierde 2 pem si son descubiertos.');
INSERT INTO `talentos` VALUES (9, 'Impaciente', '2023-04-17 22:53:37', '2023-04-17 22:53:37', NULL, '+3 a la iniciativa, pierde 1 pem si repite una acción fallida que no sea un ataque.');
INSERT INTO `talentos` VALUES (10, 'charlatán', '2023-04-17 22:54:16', '2023-04-17 22:54:48', NULL, '-1 a las tiradas de embaucar. +1 a las de liderazgo');
INSERT INTO `talentos` VALUES (11, 'Afinidad con la magia', '2023-04-17 22:56:08', '2023-04-17 22:56:08', NULL, '-1 a las tiradas de conjurar, el penalizador de estresado es de +3');
INSERT INTO `talentos` VALUES (12, 'obsesivo y paranoide', '2023-04-17 22:57:02', '2023-04-17 22:57:02', NULL, 'si supera una tirada de percepción recupera 1 pem, si falla pierde 1 pem.');
INSERT INTO `talentos` VALUES (13, 'Incapacidad mágica.', '2023-04-17 22:57:46', '2023-04-17 22:57:46', NULL, 'No puede conjurar, obtiene el talento resistencia a la magia.');
INSERT INTO `talentos` VALUES (14, 'Apetito salvaje', '2023-04-17 22:58:25', '2023-04-17 22:58:25', NULL, 'Puede alimentarse de carne cruda sin peligro, requiere el doble de alimento.');
INSERT INTO `talentos` VALUES (15, 'supersticioso', '2023-04-17 22:59:19', '2023-04-17 22:59:19', NULL, 'pierde la mitad de control por los pactos, pero pierde el doble de cordura por fuentes sobrenaturales.');
INSERT INTO `talentos` VALUES (16, 'Desconfiado', '2023-04-17 22:59:57', '2023-04-17 22:59:57', NULL, '-1 a las tiradas de percibir, +1 a las tiradas de conversar.--');
INSERT INTO `talentos` VALUES (17, 'Hijo de la naturaleza.', '2023-04-17 23:01:20', '2023-04-17 23:01:20', NULL, 'recupera el doble de Pv, Pef Y Pem al descansar,  Sufre fobia al fuego.');
INSERT INTO `talentos` VALUES (18, 'Constitución saludable', '2023-04-17 23:03:46', '2023-04-17 23:03:46', NULL, '-1 a las tiradas de aguante, pierden el doble de Pef y Pem por hambre y sed.');
INSERT INTO `talentos` VALUES (19, 'Orientación', '2023-04-18 20:02:04', '2023-04-18 20:23:15', NULL, '-1 a todas las tiradas de supervivencia y percepción relacionadas con la orientación.');
INSERT INTO `talentos` VALUES (20, 'Caza mayor', '2023-04-19 13:03:25', '2023-04-19 13:03:25', NULL, 'Si el objetivo tiene un máximo  de Pv mayor a 20, todos los ataques del personaje suman +2 al DC.');
INSERT INTO `talentos` VALUES (21, 'Maestro de intrigas', '2023-04-19 14:01:36', '2023-04-19 14:01:36', NULL, '-1 a las tiradas de carisma, actuar, intimidar y liderazgo que tengan como objetivo manipular a alguien en contra de sus superiores o aliados.');
INSERT INTO `talentos` VALUES (22, 'Entrenamiento (Apresadoras)', '2023-04-19 15:42:58', '2023-04-19 15:52:44', NULL, 'Todos los ataques realizados con un arma de la categoría seleccionada obtienen un -1.');
INSERT INTO `talentos` VALUES (23, 'Dedos rápidos', '2023-04-19 16:28:45', '2023-04-19 16:28:45', NULL, '-1 a las tiradas de trastear y hurtar.');
INSERT INTO `talentos` VALUES (24, 'Regateador hábil', '2023-04-19 16:46:04', '2023-04-19 16:46:04', NULL, '-1 a toda las tiradas de conversar relacionadas con negociación y comercio.');

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
) ENGINE = InnoDB AUTO_INCREMENT = 39 CHARACTER SET = utf8mb4 COLLATE = utf8mb4_general_ci ROW_FORMAT = Dynamic;

-- ----------------------------
-- Records of tipos_objetos
-- ----------------------------
INSERT INTO `tipos_objetos` VALUES (1, 'Almacenamiento', '2023-04-17 19:27:26', '2023-04-17 19:27:26', NULL, NULL, 0, 0, 1);
INSERT INTO `tipos_objetos` VALUES (2, 'Asta', '2023-04-17 19:27:32', '2023-04-17 19:27:32', NULL, NULL, 1, 0, 0);
INSERT INTO `tipos_objetos` VALUES (3, 'Espadas', '2023-04-17 19:44:10', '2023-04-18 16:42:55', '2023-04-18 16:42:55', NULL, 1, 0, 0);
INSERT INTO `tipos_objetos` VALUES (4, 'Material de oficio', '2023-04-17 19:50:18', '2023-04-18 16:43:19', '2023-04-18 16:43:19', NULL, 0, 0, 1);
INSERT INTO `tipos_objetos` VALUES (5, 'Hachas', '2023-04-18 15:26:30', '2023-04-18 15:26:30', NULL, NULL, 1, 0, 0);
INSERT INTO `tipos_objetos` VALUES (6, 'Arcos', '2023-04-18 15:26:38', '2023-04-18 15:26:38', NULL, NULL, 1, 0, 0);
INSERT INTO `tipos_objetos` VALUES (7, 'Ligera', '2023-04-18 15:28:11', '2023-04-18 15:31:41', NULL, NULL, 1, 0, 0);
INSERT INTO `tipos_objetos` VALUES (8, 'Ballesta', '2023-04-18 15:31:23', '2023-04-18 15:31:37', NULL, NULL, 1, 0, 0);
INSERT INTO `tipos_objetos` VALUES (9, 'Polvora', '2023-04-18 15:31:32', '2023-04-18 15:31:32', NULL, NULL, 1, 0, 0);
INSERT INTO `tipos_objetos` VALUES (10, 'Especial', '2023-04-18 15:31:54', '2023-04-18 15:31:54', NULL, NULL, 1, 0, 0);
INSERT INTO `tipos_objetos` VALUES (11, 'Arrojadiza', '2023-04-18 15:33:28', '2023-04-18 15:33:28', NULL, NULL, 1, 0, 0);
INSERT INTO `tipos_objetos` VALUES (12, 'Intermedia', '2023-04-18 15:33:35', '2023-04-18 15:33:35', NULL, NULL, 0, 1, 0);
INSERT INTO `tipos_objetos` VALUES (13, 'Pesada', '2023-04-18 15:33:42', '2023-04-18 15:33:42', NULL, NULL, 0, 1, 0);
INSERT INTO `tipos_objetos` VALUES (14, 'Honda', '2023-04-18 15:33:59', '2023-04-18 15:33:59', NULL, NULL, 1, 0, 0);
INSERT INTO `tipos_objetos` VALUES (15, 'Mazas', '2023-04-18 15:34:08', '2023-04-18 15:34:08', NULL, NULL, 1, 0, 0);
INSERT INTO `tipos_objetos` VALUES (16, 'Ligera.', '2023-04-18 15:35:03', '2023-04-18 15:35:03', NULL, NULL, 0, 1, 0);
INSERT INTO `tipos_objetos` VALUES (17, 'Puño', '2023-04-18 15:35:39', '2023-04-18 15:35:39', NULL, NULL, 1, 0, 0);
INSERT INTO `tipos_objetos` VALUES (18, 'Apresadora', '2023-04-18 16:36:55', '2023-04-18 16:36:55', NULL, NULL, 1, 0, 0);
INSERT INTO `tipos_objetos` VALUES (19, 'Hacha/Ligera', '2023-04-18 16:42:21', '2023-04-18 16:42:21', NULL, NULL, 1, 0, 0);
INSERT INTO `tipos_objetos` VALUES (20, 'Apresadora.', '2023-04-18 16:42:42', '2023-04-18 16:43:53', '2023-04-18 16:43:53', NULL, 1, 0, 0);
INSERT INTO `tipos_objetos` VALUES (21, 'Espadas', '2023-04-18 16:44:20', '2023-04-18 16:44:20', NULL, NULL, 1, 0, 0);
INSERT INTO `tipos_objetos` VALUES (22, 'Apresadora/Asta', '2023-04-18 16:50:46', '2023-04-18 16:50:46', NULL, NULL, 1, 0, 0);
INSERT INTO `tipos_objetos` VALUES (23, 'Arrojadiza/Apresadora', '2023-04-18 18:39:34', '2023-04-18 18:39:34', NULL, NULL, 1, 0, 0);
INSERT INTO `tipos_objetos` VALUES (24, 'Arrojadiza/Asta', '2023-04-18 18:42:01', '2023-04-18 18:42:01', NULL, NULL, 1, 0, 0);
INSERT INTO `tipos_objetos` VALUES (25, 'Veneno', '2023-04-18 19:16:01', '2023-04-18 19:16:01', NULL, NULL, 0, 0, 1);
INSERT INTO `tipos_objetos` VALUES (26, 'Medicina', '2023-04-18 19:16:11', '2023-04-18 19:17:16', NULL, NULL, 0, 0, 1);
INSERT INTO `tipos_objetos` VALUES (27, 'Animal', '2023-04-18 19:16:25', '2023-04-18 19:17:13', NULL, NULL, 0, 0, 1);
INSERT INTO `tipos_objetos` VALUES (28, 'Vehiculo', '2023-04-18 19:16:41', '2023-04-18 19:17:09', NULL, NULL, 0, 0, 1);
INSERT INTO `tipos_objetos` VALUES (29, 'Herramienta', '2023-04-18 19:16:49', '2023-04-18 19:17:06', NULL, NULL, 0, 0, 1);
INSERT INTO `tipos_objetos` VALUES (30, 'Herramienta de oficio', '2023-04-18 19:16:59', '2023-04-18 19:16:59', NULL, NULL, 0, 0, 1);
INSERT INTO `tipos_objetos` VALUES (31, 'Compuestos', '2023-04-18 19:17:42', '2023-04-18 19:17:42', NULL, NULL, 0, 0, 1);
INSERT INTO `tipos_objetos` VALUES (32, 'Instrumentos', '2023-04-18 19:17:59', '2023-04-18 19:17:59', NULL, NULL, 0, 0, 1);
INSERT INTO `tipos_objetos` VALUES (33, 'Ropa', '2023-04-18 19:18:08', '2023-04-18 19:18:08', NULL, NULL, 0, 0, 1);
INSERT INTO `tipos_objetos` VALUES (34, 'Misceláneos', '2023-04-18 20:01:17', '2023-04-18 20:01:17', NULL, NULL, 0, 0, 1);
INSERT INTO `tipos_objetos` VALUES (35, 'Comida', '2023-04-19 13:04:44', '2023-04-19 13:04:44', NULL, NULL, 0, 0, 1);
INSERT INTO `tipos_objetos` VALUES (36, 'Grimorio', '2023-04-19 14:09:58', '2023-04-19 14:09:58', NULL, NULL, 0, 0, 1);
INSERT INTO `tipos_objetos` VALUES (37, 'Escrituras sagradas', '2023-04-19 14:10:10', '2023-04-19 14:10:10', NULL, NULL, 0, 0, 0);
INSERT INTO `tipos_objetos` VALUES (38, 'Iluminación', '2023-04-19 16:19:01', '2023-04-19 16:19:01', NULL, NULL, 0, 0, 1);

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
INSERT INTO `users` VALUES (1, 'Medi', 'justom78@gmail.com', NULL, '$2y$10$Xud6TAe.u7bQqlebQfAg6OkaozgYODLzX.DWYySE04PdFmriVNTLm', NULL, '2023-04-17 19:21:05', '2023-04-17 19:21:05');
INSERT INTO `users` VALUES (2, 'Admin', 'Admin@mail.com', NULL, '$2y$10$oGzySRyCSThD.3/swBnxy.sPTUIqjpYKSOYgTW0.1RIHknoNXwca.', 'Vhn5uKC6vxdPYq4BAJLq6Vv1zSRtmWHmtZ9GLalnPzyoGVeDtVW22EuJSjbv', '2023-04-17 19:26:07', '2023-04-17 19:26:07');
INSERT INTO `users` VALUES (3, 'TheremDM', 'lascicatricesdelmundo@gmail.com', NULL, '$2y$10$afhUEJFWIyqcW9o5EJm2CeWpJTPQEP/MzR5Q/a.t.e9is84Mx7gxW', 'kdEksqwp7bGdVHXpGJh7qVh5N4oGHOxCO8gfA4mISwMmLFzZANwLl6ODaalY', '2023-04-17 19:39:59', '2023-04-17 19:39:59');

-- ----------------------------
-- Table structure for websockets_statistics_entries
-- ----------------------------
DROP TABLE IF EXISTS `websockets_statistics_entries`;
CREATE TABLE `websockets_statistics_entries`  (
  `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT,
  `app_id` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `peak_connection_count` int(11) NOT NULL,
  `websocket_message_count` int(11) NOT NULL,
  `api_message_count` int(11) NOT NULL,
  `created_at` timestamp(0) NULL DEFAULT NULL,
  `updated_at` timestamp(0) NULL DEFAULT NULL,
  PRIMARY KEY (`id`) USING BTREE
) ENGINE = InnoDB AUTO_INCREMENT = 1 CHARACTER SET = utf8mb4 COLLATE = utf8mb4_unicode_ci ROW_FORMAT = Dynamic;

-- ----------------------------
-- Records of websockets_statistics_entries
-- ----------------------------

SET FOREIGN_KEY_CHECKS = 1;
