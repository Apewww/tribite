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

 Date: 02/06/2025 05:23:08
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
  `created_at` datetime(0) NULL DEFAULT NULL,
  `deleted_at` datetime(0) NULL DEFAULT NULL,
  `active` tinyint(0) NULL DEFAULT NULL,
  PRIMARY KEY (`id`) USING BTREE
) ENGINE = InnoDB AUTO_INCREMENT = 8 CHARACTER SET = utf8mb4 COLLATE = utf8mb4_0900_ai_ci ROW_FORMAT = Dynamic;

-- ----------------------------
-- Records of akun
-- ----------------------------
INSERT INTO `akun` VALUES (6, 'Rafly Anggara Putra', '$2y$10$bUX//96TupOBH/pvDBHP5e7hDHwpN/HASdAYRjjr48EoIZyIgbRzS', 'apewinaja@gmail.com', '+6285710789216', 1, '2025-05-26 22:22:43', NULL, 1);
INSERT INTO `akun` VALUES (7, 'Nabila Dwi Marsono', '$2y$10$xY4JwtBs6yclZDhSfPW.UuTA7iZlUj4w8lTeI.MD66A9JuCOU1Gxe', 'nabila@gmail.com', '+6281388502890', 0, '2025-05-27 07:04:41', '2025-05-31 09:12:30', 1);
INSERT INTO `akun` VALUES (8, 'Siti Aulia', '$2y$10$jQcTjp64sTAta9Nt0f4Wg.lSDcQpuQFE9PuKIMgI9HMBFlyWvPHza', 'sauliarr03@gmail.com', '+6285864510735', 0, '2025-05-31 18:48:09', NULL, 1);

-- ----------------------------
-- Table structure for katalog
-- ----------------------------
DROP TABLE IF EXISTS `katalog`;
CREATE TABLE `katalog`  (
  `id` int(0) NOT NULL AUTO_INCREMENT,
  `nama` varchar(100) CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci NOT NULL,
  `deskripsi` text CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci NULL,
  `harga` decimal(10, 0) NOT NULL,
  `gambar` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci NOT NULL DEFAULT '',
  `kategori_id` int(0) NOT NULL DEFAULT 0,
  `rating` float NOT NULL DEFAULT 0,
  `status` enum('aktif','nonaktif') CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci NOT NULL,
  `created_at` datetime(0) NOT NULL DEFAULT CURRENT_TIMESTAMP(0) ON UPDATE CURRENT_TIMESTAMP(0),
  `updated_at` datetime(0) NULL DEFAULT NULL ON UPDATE CURRENT_TIMESTAMP(0),
  PRIMARY KEY (`id`) USING BTREE,
  INDEX `kategori`(`kategori_id`) USING BTREE,
  CONSTRAINT `kategori` FOREIGN KEY (`kategori_id`) REFERENCES `kategori` (`id`) ON DELETE RESTRICT ON UPDATE RESTRICT
) ENGINE = InnoDB AUTO_INCREMENT = 8 CHARACTER SET = utf8mb4 COLLATE = utf8mb4_0900_ai_ci ROW_FORMAT = Dynamic;

-- ----------------------------
-- Records of katalog
-- ----------------------------
INSERT INTO `katalog` VALUES (7, 'Test', 'Test', 1000, '/tribite/assets/img/upload/Untitled.png', 1, 0, 'aktif', '2025-05-31 23:34:00', '2025-05-31 23:34:00');

-- ----------------------------
-- Table structure for kategori
-- ----------------------------
DROP TABLE IF EXISTS `kategori`;
CREATE TABLE `kategori`  (
  `id` int(0) NOT NULL AUTO_INCREMENT,
  `nama` varchar(100) CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci NOT NULL,
  `deskripsi` text CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci NULL,
  `created_at` datetime(0) NULL DEFAULT CURRENT_TIMESTAMP(0),
  PRIMARY KEY (`id`) USING BTREE,
  UNIQUE INDEX `nama`(`nama`) USING BTREE
) ENGINE = InnoDB AUTO_INCREMENT = 2 CHARACTER SET = utf8mb4 COLLATE = utf8mb4_0900_ai_ci ROW_FORMAT = Dynamic;

-- ----------------------------
-- Records of kategori
-- ----------------------------
INSERT INTO `kategori` VALUES (1, 'Makanan', 'Jenis Kategori untuk makanan', '2025-05-31 21:08:22');
INSERT INTO `kategori` VALUES (2, 'Minuman', 'Jenis Kategori minuman untuk minuman', '2025-05-31 21:52:50');

-- ----------------------------
-- Table structure for kupon
-- ----------------------------
DROP TABLE IF EXISTS `kupon`;
CREATE TABLE `kupon`  (
  `id` int(0) NOT NULL AUTO_INCREMENT,
  `kode` varchar(50) CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci NOT NULL,
  `deskripsi` text CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci NULL,
  `tipe_diskon` enum('persen','nominal') CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci NOT NULL,
  `nilai_diskon` decimal(10, 2) NOT NULL,
  `minimal_belanja` decimal(10, 2) NULL DEFAULT 0.00,
  `tanggal_mulai` datetime(0) NOT NULL,
  `tanggal_berakhir` datetime(0) NOT NULL,
  `status` enum('aktif','nonaktif') CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci NULL DEFAULT 'aktif',
  `created_at` datetime(0) NULL DEFAULT CURRENT_TIMESTAMP(0),
  `updated_at` datetime(0) NULL DEFAULT CURRENT_TIMESTAMP(0) ON UPDATE CURRENT_TIMESTAMP(0),
  PRIMARY KEY (`id`) USING BTREE,
  UNIQUE INDEX `kode`(`kode`) USING BTREE
) ENGINE = InnoDB CHARACTER SET = utf8mb4 COLLATE = utf8mb4_0900_ai_ci ROW_FORMAT = Dynamic;

-- ----------------------------
-- Records of kupon
-- ----------------------------
INSERT INTO `kupon` VALUES (1, 'KUPON01', '', 'nominal', 20000.00, 250000.00, '2025-06-01 00:00:00', '2025-07-03 00:00:00', 'aktif', '2025-06-01 19:52:33', '2025-06-01 19:52:33');

-- ----------------------------
-- Procedure structure for AddKatalog
-- ----------------------------
DROP PROCEDURE IF EXISTS `AddKatalog`;
delimiter ;;
CREATE PROCEDURE `AddKatalog`(IN k_nama VARCHAR(100),
  IN k_deskripsi TEXT,
  IN k_harga INT,
  IN k_gambar VARCHAR(255),
  IN k_kategori_id INT,
  IN k_status ENUM('aktif', 'nonaktif'))
BEGIN
  INSERT INTO katalog (nama, deskripsi, harga, gambar, kategori_id, status, created_at)
  VALUES (k_nama, k_deskripsi, k_harga, k_gambar, k_kategori_id, k_status, NOW());
END
;;
delimiter ;

-- ----------------------------
-- Procedure structure for AddKategori
-- ----------------------------
DROP PROCEDURE IF EXISTS `AddKategori`;
delimiter ;;
CREATE PROCEDURE `AddKategori`(IN k_nama VARCHAR(100),
  IN k_deskripsi TEXT)
BEGIN
  INSERT INTO kategori (nama, deskripsi, created_at)
  VALUES (k_nama, k_deskripsi, NOW());
END
;;
delimiter ;

-- ----------------------------
-- Procedure structure for AddKupon
-- ----------------------------
DROP PROCEDURE IF EXISTS `AddKupon`;
delimiter ;;
CREATE PROCEDURE `AddKupon`(IN k_kode VARCHAR(50),
  IN k_deskripsi TEXT,
  IN k_tipediskon ENUM('persen', 'nominal'),
  IN k_nilai_diskon DECIMAL(10,2),
  IN k_minimal_belanja DECIMAL(10,2),
  IN k_tanggal_mulai DATE,
  IN k_tanggal_berakhir DATE,
  IN k_status ENUM('aktif', 'nonaktif'))
BEGIN
  INSERT INTO kupon (kode, deskripsi, tipe_diskon, nilai_diskon, minimal_belanja, tanggal_mulai, tanggal_berakhir, status, created_at)
  VALUES (k_kode, k_deskripsi, k_tipediskon, k_nilai_diskon, k_minimal_belanja, k_tanggal_mulai, k_tanggal_berakhir, k_status, NOW());
END
;;
delimiter ;

-- ----------------------------
-- Procedure structure for CreateAkun
-- ----------------------------
DROP PROCEDURE IF EXISTS `CreateAkun`;
delimiter ;;
CREATE PROCEDURE `CreateAkun`(IN p_nama VARCHAR(100),
  IN p_email VARCHAR(100),
  IN p_password VARCHAR(255),
  IN p_telepon VARCHAR(20))
BEGIN
	IF EXISTS (SELECT 1 FROM akun WHERE email = p_email) THEN
    SIGNAL SQLSTATE '45000' SET MESSAGE_TEXT = 'Email sudah terdaftar, gunakan email lain';
  ELSE
    INSERT INTO akun (nama, email, password, telepon, created_at, active)
    VALUES (p_nama, p_email, p_password, p_telepon, NOW(), 1);
  END IF;
END
;;
delimiter ;

-- ----------------------------
-- Procedure structure for DeleteAkun
-- ----------------------------
DROP PROCEDURE IF EXISTS `DeleteAkun`;
delimiter ;;
CREATE PROCEDURE `DeleteAkun`(IN p_id INT)
BEGIN
	IF EXISTS (SELECT 1 FROM akun WHERE id = p_id) THEN
			UPDATE akun
				SET 
					deleted_at = NOW(),
					active = 0
      WHERE id = p_id;
	ELSE
		SIGNAL SQLSTATE '45000' 
        SET MESSAGE_TEXT = 'ID Tidak ditemukan, terjadi kesalahan!';
	END IF;
END
;;
delimiter ;

-- ----------------------------
-- Procedure structure for GetAkun
-- ----------------------------
DROP PROCEDURE IF EXISTS `GetAkun`;
delimiter ;;
CREATE PROCEDURE `GetAkun`()
BEGIN
  SELECT * FROM Akun where active = 1;
END
;;
delimiter ;

-- ----------------------------
-- Procedure structure for GetKatalog
-- ----------------------------
DROP PROCEDURE IF EXISTS `GetKatalog`;
delimiter ;;
CREATE PROCEDURE `GetKatalog`()
BEGIN
  SELECT * FROM katalog;
END
;;
delimiter ;

-- ----------------------------
-- Procedure structure for GetKategori
-- ----------------------------
DROP PROCEDURE IF EXISTS `GetKategori`;
delimiter ;;
CREATE PROCEDURE `GetKategori`()
BEGIN
  SELECT id,nama FROM kategori;
END
;;
delimiter ;

-- ----------------------------
-- Procedure structure for GetKupon
-- ----------------------------
DROP PROCEDURE IF EXISTS `GetKupon`;
delimiter ;;
CREATE PROCEDURE `GetKupon`()
BEGIN
  SELECT * FROM kupon;
END
;;
delimiter ;

-- ----------------------------
-- Procedure structure for GetLogin
-- ----------------------------
DROP PROCEDURE IF EXISTS `GetLogin`;
delimiter ;;
CREATE PROCEDURE `GetLogin`(IN p_email VARCHAR(100))
BEGIN
  SELECT id, nama, email, role, password
  FROM akun
  WHERE email = p_email and active != 0
  LIMIT 1;
END
;;
delimiter ;

-- ----------------------------
-- Procedure structure for UpdateAkun
-- ----------------------------
DROP PROCEDURE IF EXISTS `UpdateAkun`;
delimiter ;;
CREATE PROCEDURE `UpdateAkun`(IN p_id INT,
    IN p_nama VARCHAR(100),
    IN p_email VARCHAR(100),
    IN p_role INT,
    IN p_password VARCHAR(255))
BEGIN
	IF EXISTS (SELECT 1 FROM akun WHERE id = p_id) THEN
        IF p_password IS NULL OR p_password = '' THEN
            UPDATE akun
            SET 
                nama = p_nama,
                email = p_email,
                role = p_role
            WHERE id = p_id;
        ELSE
            UPDATE akun
            SET 
                nama = p_nama,
                email = p_email,
                role = p_role,
                password = p_password
            WHERE id = p_id;
        END IF;
	ELSE
		SIGNAL SQLSTATE '45000' 
        SET MESSAGE_TEXT = 'ID Tidak ditemukan, terjadi kesalahan!';
	END IF;
END
;;
delimiter ;

-- ----------------------------
-- Procedure structure for UpdateKatalog
-- ----------------------------
DROP PROCEDURE IF EXISTS `UpdateKatalog`;
delimiter ;;
CREATE PROCEDURE `UpdateKatalog`(IN k_id INT,
  IN k_nama VARCHAR(100),
  IN k_deskripsi TEXT,
  IN k_harga INT,
  IN k_gambar VARCHAR(255),
  IN k_kategori_id INT,
  IN k_status ENUM('aktif', 'nonaktif'))
BEGIN
  IF EXISTS (SELECT 1 FROM katalog WHERE id = k_id) THEN


    IF (k_gambar IS NULL OR k_gambar = '') THEN
      UPDATE katalog
      SET nama = k_nama,
          deskripsi = k_deskripsi,
          harga = k_harga,
          kategori_id = k_kategori_id,
          status = k_status
      WHERE id = k_id;
    ELSE
      UPDATE katalog
      SET nama = k_nama,
          deskripsi = k_deskripsi,
          harga = k_harga,
          gambar = k_gambar,
          kategori_id = k_kategori_id,
          status = k_status
      WHERE id = k_id;
    END IF;

  ELSE
    SIGNAL SQLSTATE '45000'
      SET MESSAGE_TEXT = 'ID Tidak ditemukan, terjadi kesalahan!';
  END IF;
END
;;
delimiter ;

SET FOREIGN_KEY_CHECKS = 1;
