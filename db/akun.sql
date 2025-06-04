/*
 Navicat Premium Data Transfer

 Source Server         : Local
 Source Server Type    : MySQL
 Source Server Version : 80403
 Source Host           : localhost:3306
 Source Schema         : tribite

 Target Server Type    : MySQL
 Target Server Version : 80403
 File Encoding         : 65001

 Date: 04/06/2025 21:52:32
*/

SET NAMES utf8mb4;
SET FOREIGN_KEY_CHECKS = 0;

-- ----------------------------
-- Table structure for akun
-- ----------------------------
DROP TABLE IF EXISTS `akun`;
CREATE TABLE `akun`  (
  `id` int(0) NOT NULL AUTO_INCREMENT,
  `nama` varchar(30) CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci NOT NULL,
  `password` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci NOT NULL,
  `email` varchar(100) CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci NOT NULL,
  `telepon` varchar(20) CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci NOT NULL,
  `role` tinyint(0) NOT NULL DEFAULT 0,
  `picture` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_bin NOT NULL DEFAULT '',
  `bitepay` int(0) NOT NULL DEFAULT 0,
  `point` int(0) NOT NULL DEFAULT 0,
  `date` datetime(0) NULL DEFAULT NULL,
  `status` enum('aktif','deleted') CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci NULL DEFAULT NULL,
  `created_at` datetime(0) NULL DEFAULT NULL,
  `deleted_at` datetime(0) NULL DEFAULT NULL,
  PRIMARY KEY (`id`) USING BTREE
) ENGINE = InnoDB AUTO_INCREMENT = 11 CHARACTER SET = utf8mb4 COLLATE = utf8mb4_0900_ai_ci ROW_FORMAT = Dynamic;

-- ----------------------------
-- Records of akun
-- ----------------------------
INSERT INTO `akun` VALUES (6, 'Rafly Anggara Putra', '$2y$10$bUX//96TupOBH/pvDBHP5e7hDHwpN/HASdAYRjjr48EoIZyIgbRzS', 'apewinaja@gmail.com', '+6285710789216', 1, '/tribite/assets/img/upload/profile/6..png', 0, 250, '2025-06-04 00:00:00', 'aktif', '2025-05-26 22:22:43', NULL);
INSERT INTO `akun` VALUES (7, 'Nabila Dwi Marsono', '$2y$10$xY4JwtBs6yclZDhSfPW.UuTA7iZlUj4w8lTeI.MD66A9JuCOU1Gxe', 'nabila@gmail.com', '+6281388502890', 1, '', 500000, 0, NULL, 'aktif', '2025-05-27 07:04:41', '2025-05-31 09:12:30');
INSERT INTO `akun` VALUES (8, 'Siti Aulia', '$2y$10$jQcTjp64sTAta9Nt0f4Wg.lSDcQpuQFE9PuKIMgI9HMBFlyWvPHza', 'sauliarr03@gmail.com', '+6285864510735', 0, '', 0, 0, NULL, 'deleted', '2025-05-31 18:48:09', '2025-06-02 14:23:10');
INSERT INTO `akun` VALUES (9, 'Rafly Anggara Putra', '$2y$10$zVN0g6XlHvWPvL7qgUdiVO05hyWzx3uZM84fskLrAMp4pJuZtlQg2', 'apewinaja2@gmail.com', '+62857107892216', 0, '', 0, 0, NULL, 'deleted', '2025-06-04 14:30:10', '2025-06-04 14:58:42');
INSERT INTO `akun` VALUES (10, 'Rafly Anggara Putra', '$2y$10$kq94n/W8252vXn8UXMW5ae0bSpJG4YVvsJ34m.AO8qjhRze4EEilu', 'apewinaja3@gmail.com', '+62857107892216', 0, '', 0, 0, NULL, 'deleted', '2025-06-04 14:35:34', '2025-06-04 14:58:39');

SET FOREIGN_KEY_CHECKS = 1;
