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

 Date: 04/06/2025 14:26:03
*/

SET NAMES utf8mb4;
SET FOREIGN_KEY_CHECKS = 0;

-- ----------------------------
-- Table structure for akun
-- ----------------------------
DROP TABLE IF EXISTS `akun`;
CREATE TABLE `akun`  (
  `id` int(0) NOT NULL AUTO_INCREMENT,
  `nama` varchar(30) CHARACTER SET utf8mb4 COLLATE utf8mb4_bin NOT NULL,
  `password` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_bin NOT NULL,
  `email` varchar(100) CHARACTER SET utf8mb4 COLLATE utf8mb4_bin NOT NULL,
  `telepon` varchar(20) CHARACTER SET utf8mb4 COLLATE utf8mb4_bin NOT NULL,
  `role` tinyint(0) NOT NULL DEFAULT 0,
  `picture` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_bin NOT NULL,
  `bitepay` int(0) NOT NULL DEFAULT 0,
  `point` int(0) NOT NULL DEFAULT 0,
  `status` enum('aktif','deleted') CHARACTER SET utf8mb4 COLLATE utf8mb4_bin NULL DEFAULT NULL,
  `created_at` datetime(0) NULL DEFAULT NULL,
  `deleted_at` datetime(0) NULL DEFAULT NULL,
  PRIMARY KEY (`id`) USING BTREE
) ENGINE = InnoDB CHARACTER SET = utf8mb4 COLLATE = utf8mb4_bin ROW_FORMAT = Dynamic;

-- ----------------------------
-- Records of akun
-- ----------------------------
INSERT INTO `akun` VALUES (6, 'Rafly Anggara Putra', '$2y$10$bUX//96TupOBH/pvDBHP5e7hDHwpN/HASdAYRjjr48EoIZyIgbRzS', 'apewinaja@gmail.com', '+6285710789216', 1, '', 0, 0, 'aktif', '2025-05-26 22:22:43', NULL);
INSERT INTO `akun` VALUES (7, 'Nabila Dwi Marsono', '$2y$10$xY4JwtBs6yclZDhSfPW.UuTA7iZlUj4w8lTeI.MD66A9JuCOU1Gxe', 'nabila@gmail.com', '+6281388502890', 1, '', 500000, 0, 'aktif', '2025-05-27 07:04:41', '2025-05-31 09:12:30');
INSERT INTO `akun` VALUES (8, 'Siti Aulia', '$2y$10$jQcTjp64sTAta9Nt0f4Wg.lSDcQpuQFE9PuKIMgI9HMBFlyWvPHza', 'sauliarr03@gmail.com', '+6285864510735', 0, '', 0, 0, 'deleted', '2025-05-31 18:48:09', '2025-06-02 14:23:10');

SET FOREIGN_KEY_CHECKS = 1;
